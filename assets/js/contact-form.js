/**
 * Script para o formulário de contato
 * Validação frontend e envio via AJAX
 */

// Máscara para telefone
function phoneMask(value) {
    if (!value) return '';
    
    value = value.replace(/\D/g, '');
    
    if (value.length <= 2) {
        return `(${value}`;
    }
    if (value.length <= 7) {
        return `(${value.slice(0, 2)}) ${value.slice(2)}`;
    }
    if (value.length <= 11) {
        return `(${value.slice(0, 2)}) ${value.slice(2, 7)}-${value.slice(7)}`;
    }
    
    return `(${value.slice(0, 2)}) ${value.slice(2, 7)}-${value.slice(7, 11)}`;
}

// Validação de email
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Validação de nome (mínimo 2 caracteres)
function validateName(name) {
    return name.trim().length >= 2;
}

// Função para inicializar formulários rápidos
function initializeQuickForm(form) {
    const submitBtn = form.querySelector('.btn[type="submit"]');
    if (!submitBtn) return;
    
    const btnText = submitBtn.querySelector('.btn-text');
    const spinner = submitBtn.querySelector('.spinner-border');
    
    // Adicionar validação em tempo real
    const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
    inputs.forEach(input => {
        input.addEventListener('blur', function(e) {
            validateQuickField(e, form);
        });
        input.addEventListener('input', function(e) {
            clearQuickValidation(e);
        });
    });
    
    // Envio do formulário
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        handleQuickSubmit(e, form, submitBtn, btnText, spinner);
    });
}

// Validar campo nos formulários rápidos
function validateQuickField(e, form) {
    const field = e.target;
    const value = field.value.trim();
    
    clearQuickValidation(e);
    
    let isValid = true;
    let message = '';
    
    if (field.hasAttribute('required') && !value) {
        isValid = false;
        message = 'Este campo é obrigatório';
    } else if (field.type === 'email' && value && !validateEmail(value)) {
        isValid = false;
        message = 'Digite um email válido';
    } else if (field.name === 'nome' && value && value.length < 2) {
        isValid = false;
        message = 'Nome deve ter pelo menos 2 caracteres';
    } else if (field.name === 'mensagem' && value && value.length < 10) {
        isValid = false;
        message = 'Mensagem deve ter pelo menos 10 caracteres';
    }
    
    if (isValid) {
        field.classList.remove('is-invalid');
        field.classList.add('is-valid');
    } else {
        field.classList.remove('is-valid');
        field.classList.add('is-invalid');
        showQuickFieldError(field, message);
    }
    
    return isValid;
}

// Limpar validação nos formulários rápidos
function clearQuickValidation(e) {
    const field = e.target;
    field.classList.remove('is-valid', 'is-invalid');
    
    const existingError = field.parentNode.querySelector('.invalid-feedback');
    if (existingError) {
        existingError.remove();
    }
}

// Mostrar erro nos formulários rápidos
function showQuickFieldError(field, message) {
    let errorDiv = field.parentNode.querySelector('.invalid-feedback');
    
    if (!errorDiv) {
        errorDiv = document.createElement('div');
        errorDiv.className = 'invalid-feedback';
        field.parentNode.appendChild(errorDiv);
    }
    
    errorDiv.textContent = message;
}

// Manipular envio dos formulários rápidos
async function handleQuickSubmit(e, form, submitBtn, btnText, spinner) {
    // Validar todos os campos obrigatórios
    const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
    let isValid = true;
    
    inputs.forEach(input => {
        const fieldValid = validateQuickField({ target: input }, form);
        if (!fieldValid) isValid = false;
    });
    
    if (!isValid) {
        return;
    }
    
    // Estado de carregamento
    submitBtn.disabled = true;
    btnText.textContent = 'Enviando...';
    spinner.classList.remove('d-none');
    
    try {
        const formData = new FormData(form);
        
        const response = await fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        
        if (response.ok) {
            window.location.href = 'sucesso';
        } else {
            throw new Error('Erro no envio');
        }
        
    } catch (error) {
        console.error('Erro:', error);
        alert('Erro ao enviar mensagem. Tente novamente.');
        
        // Restaurar botão
        submitBtn.disabled = false;
        btnText.textContent = 'Solicitar Orçamento Gratuito';
        spinner.classList.add('d-none');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Máscara para telefone em todos os formulários
    const phoneInputs = document.querySelectorAll('input[type="tel"], input[name="telefone"]');
    phoneInputs.forEach(input => {
        input.addEventListener('input', function(e) {
            e.target.value = phoneMask(e.target.value);
        });
    });
    
    // Inicializar todos os formulários rápidos
    const quickForms = document.querySelectorAll('#quickContactForm, #homeContactForm');
    quickForms.forEach(form => {
        initializeQuickForm(form);
    });
    
    const form = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    
    if (!form || !submitBtn) return;
    
    const btnText = submitBtn.querySelector('.btn-text');
    const spinner = submitBtn.querySelector('.spinner-border');
    
    // Validação em tempo real
    const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
    inputs.forEach(input => {
        input.addEventListener('blur', validateField);
        input.addEventListener('input', clearValidation);
    });
    
    // Envio do formulário
    form.addEventListener('submit', handleSubmit);
    
    /**
     * Validar campo individual
     */
    function validateField(e) {
        const field = e.target;
        const value = field.value.trim();
        
        // Limpar validações anteriores
        clearValidation(e);
        
        // Validações específicas
        let isValid = true;
        let message = '';
        
        if (field.hasAttribute('required') && !value) {
            isValid = false;
            message = 'Este campo é obrigatório';
        } else if (field.type === 'email' && value && !validateEmail(value)) {
            isValid = false;
            message = 'Digite um email válido';
        } else if (field.name === 'nome' && value && value.length < 2) {
            isValid = false;
            message = 'Nome deve ter pelo menos 2 caracteres';
        } else if (field.name === 'mensagem' && value && value.length < 10) {
            isValid = false;
            message = 'Mensagem deve ter pelo menos 10 caracteres';
        }
        
        // Aplicar estado de validação
        if (isValid) {
            field.classList.remove('is-invalid');
            field.classList.add('is-valid');
        } else {
            field.classList.remove('is-valid');
            field.classList.add('is-invalid');
            showFieldError(field, message);
        }
        
        return isValid;
    }
    
    /**
     * Limpar validação de um campo
     */
    function clearValidation(e) {
        const field = e.target;
        field.classList.remove('is-valid', 'is-invalid');
        
        // Remover mensagem de erro
        const existingError = field.parentNode.querySelector('.invalid-feedback');
        if (existingError) {
            existingError.remove();
        }
    }
    
    /**
     * Mostrar erro em um campo
     */
    function showFieldError(field, message) {
        let errorDiv = field.parentNode.querySelector('.invalid-feedback');
        
        if (!errorDiv) {
            errorDiv = document.createElement('div');
            errorDiv.className = 'invalid-feedback';
            field.parentNode.appendChild(errorDiv);
        }
        
        errorDiv.textContent = message;
    }
    
    /**
     * Validar formulário completo
     */
    function validateForm() {
        let isValid = true;
        
        inputs.forEach(input => {
            const fieldValid = validateField({ target: input });
            if (!fieldValid) isValid = false;
        });
        
        return isValid;
    }
    
    /**
     * Manipular envio do formulário
     */
    async function handleSubmit(e) {
        e.preventDefault();
        
        // Validar formulário
        if (!validateForm()) {
            showAlert('Por favor, corrija os erros antes de enviar.', 'danger');
            return;
        }
        
        // Estado de carregamento
        setLoadingState(true);
        
        try {
            const formData = new FormData(form);
            
            // Adicionar header para AJAX
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            
            const result = await response.json();
            
            if (result.success) {
                showAlert(result.message, 'success');
                form.reset();
                
                // Redirecionar após 2 segundos
                setTimeout(() => {
                    window.location.href = result.redirect;
                }, 2000);
                
            } else {
                showAlert(result.message, 'danger');
            }
            
        } catch (error) {
            console.error('Erro no envio:', error);
            showAlert('Erro ao enviar mensagem. Tente novamente.', 'danger');
        } finally {
            setLoadingState(false);
        }
    }
    
    /**
     * Definir estado de carregamento
     */
    function setLoadingState(loading) {
        if (loading) {
            submitBtn.disabled = true;
            btnText.textContent = 'Enviando...';
            spinner.classList.remove('d-none');
        } else {
            submitBtn.disabled = false;
            btnText.textContent = 'Enviar Mensagem';
            spinner.classList.add('d-none');
        }
    }
    
    /**
     * Mostrar alerta
     */
    function showAlert(message, type) {
        // Remover alertas existentes
        const existingAlerts = form.querySelectorAll('.alert');
        existingAlerts.forEach(alert => alert.remove());
        
        // Criar novo alerta
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type}`;
        alertDiv.textContent = message;
        
        // Inserir no início do formulário
        form.insertBefore(alertDiv, form.firstChild);
        
        // Scroll para o alerta
        alertDiv.scrollIntoView({ behavior: 'smooth' });
        
        // Remover após 5 segundos
        setTimeout(() => {
            if (alertDiv.parentNode) {
                alertDiv.remove();
            }
        }, 5000);
    }
    
    // Analytics - Rastrear eventos do formulário
    if (typeof gtag !== 'undefined') {
        form.addEventListener('submit', function() {
            gtag('event', 'form_start', {
                'event_category': 'Contact',
                'event_label': 'Contact Form'
            });
        });
        
        inputs.forEach(input => {
            input.addEventListener('focus', function(e) {
                gtag('event', 'form_field_focus', {
                    'event_category': 'Contact',
                    'event_label': e.target.name || e.target.type
                });
            });
        });
    }
}); 