/**
 * Máscaras e Validações para Formulários
 * Programador PHP Freelancer - Sorocaba SP
 * 
 * Script reutilizável para aplicar máscaras e validações
 */

document.addEventListener('DOMContentLoaded', function() {
    initializeFormMasks();
    initializeFormValidations();
});

/**
 * Inicializar máscaras dos formulários
 */
function initializeFormMasks() {
    // Máscara para telefone
    const phoneInputs = document.querySelectorAll('input[name="telefone"]');
    phoneInputs.forEach(input => {
        applyPhoneMask(input);
    });
}

/**
 * Aplicar máscara de telefone
 */
function applyPhoneMask(input) {
    input.addEventListener('input', function() {
        let value = this.value.replace(/\D/g, '');
        
        if (value.length <= 10) {
            // Telefone fixo: (15) 3333-4444
            value = value.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
        } else {
            // Celular: (15) 99999-9999
            value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
        }
        
        this.value = value;
    });

    // Permitir apenas números, parênteses, espaço e hífen
    input.addEventListener('keypress', function(e) {
        const char = String.fromCharCode(e.which);
        if (!/[\d\(\)\s\-]/.test(char)) {
            e.preventDefault();
        }
    });
}

/**
 * Inicializar validações em tempo real
 */
function initializeFormValidations() {
    // Validação de nome
    const nomeInputs = document.querySelectorAll('input[name="nome"]');
    nomeInputs.forEach(input => {
        input.addEventListener('blur', function() {
            validateNome(this);
        });
        
        input.addEventListener('input', function() {
            clearFieldError(this);
        });
    });

    // Validação de email
    const emailInputs = document.querySelectorAll('input[name="email"]');
    emailInputs.forEach(input => {
        input.addEventListener('blur', function() {
            validateEmail(this);
        });
        
        input.addEventListener('input', function() {
            clearFieldError(this);
        });
    });

    // Validação de telefone
    const telefoneInputs = document.querySelectorAll('input[name="telefone"]');
    telefoneInputs.forEach(input => {
        input.addEventListener('blur', function() {
            validateTelefone(this);
        });
        
        input.addEventListener('input', function() {
            clearFieldError(this);
        });
    });

    // Validação de mensagem
    const mensagemInputs = document.querySelectorAll('textarea[name="mensagem"]');
    mensagemInputs.forEach(input => {
        input.addEventListener('blur', function() {
            validateMensagem(this);
        });
        
        input.addEventListener('input', function() {
            clearFieldError(this);
            updateCharacterCount(this);
        });
    });

    // Validação de select tipo_projeto
    const tipoProjetoSelects = document.querySelectorAll('select[name="tipo_projeto"]');
    tipoProjetoSelects.forEach(select => {
        select.addEventListener('change', function() {
            validateTipoProjeto(this);
        });
    });
}

/**
 * Validações individuais
 */
function validateNome(input) {
    const value = input.value.trim();
    
    if (!value) {
        showFieldError(input, 'Nome é obrigatório');
        return false;
    }
    
    if (value.length < 2) {
        showFieldError(input, 'Nome deve ter pelo menos 2 caracteres');
        return false;
    }
    
    if (!/^[a-zA-ZÀ-ÿ\s]+$/.test(value)) {
        showFieldError(input, 'Nome deve conter apenas letras');
        return false;
    }
    
    clearFieldError(input);
    return true;
}

function validateEmail(input) {
    const value = input.value.trim();
    
    if (!value) {
        showFieldError(input, 'E-mail é obrigatório');
        return false;
    }
    
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(value)) {
        showFieldError(input, 'Digite um e-mail válido');
        return false;
    }
    
    clearFieldError(input);
    return true;
}

function validateTelefone(input) {
    const value = input.value.trim();
    
    // Telefone é opcional, mas se preenchido deve ser válido
    if (value && value.length > 0) {
        const phoneRegex = /^\(\d{2}\)\s\d{4,5}-\d{4}$/;
        if (!phoneRegex.test(value)) {
            showFieldError(input, 'Digite um telefone válido: (15) 99999-9999');
            return false;
        }
    }
    
    clearFieldError(input);
    return true;
}

function validateTipoProjeto(select) {
    if (!select.value) {
        showFieldError(select, 'Selecione o tipo de projeto');
        return false;
    }
    
    clearFieldError(select);
    return true;
}

function validateMensagem(textarea) {
    const value = textarea.value.trim();
    
    if (!value) {
        showFieldError(textarea, 'Descrição do projeto é obrigatória');
        return false;
    }
    
    if (value.length < 10) {
        showFieldError(textarea, 'Descrição deve ter pelo menos 10 caracteres');
        return false;
    }
    
    if (value.length > 1000) {
        showFieldError(textarea, 'Descrição deve ter no máximo 1000 caracteres');
        return false;
    }
    
    clearFieldError(textarea);
    return true;
}

/**
 * Mostrar erro em campo
 */
function showFieldError(field, message) {
    clearFieldError(field);
    
    field.classList.add('is-invalid');
    
    const errorDiv = document.createElement('div');
    errorDiv.className = 'invalid-feedback';
    errorDiv.textContent = message;
    
    field.parentNode.appendChild(errorDiv);
}

/**
 * Limpar erro de campo
 */
function clearFieldError(field) {
    field.classList.remove('is-invalid');
    
    const errorDiv = field.parentNode.querySelector('.invalid-feedback');
    if (errorDiv) {
        errorDiv.remove();
    }
}

/**
 * Atualizar contador de caracteres (para textarea)
 */
function updateCharacterCount(textarea) {
    const maxLength = 1000;
    const currentLength = textarea.value.length;
    
    let counter = textarea.parentNode.querySelector('.char-counter');
    if (!counter) {
        counter = document.createElement('small');
        counter.className = 'char-counter text-muted';
        textarea.parentNode.appendChild(counter);
    }
    
    counter.textContent = `${currentLength}/${maxLength} caracteres`;
    
    if (currentLength > maxLength) {
        counter.classList.add('text-danger');
        counter.classList.remove('text-muted');
    } else {
        counter.classList.add('text-muted');
        counter.classList.remove('text-danger');
    }
}

/**
 * Validar formulário completo
 */
function validateCompleteForm(form) {
    const nomeInput = form.querySelector('input[name="nome"]');
    const emailInput = form.querySelector('input[name="email"]');
    const telefoneInput = form.querySelector('input[name="telefone"]');
    const tipoProjetoSelect = form.querySelector('select[name="tipo_projeto"]');
    const mensagemTextarea = form.querySelector('textarea[name="mensagem"]');
    
    let isValid = true;
    
    // Validar todos os campos
    if (nomeInput && !validateNome(nomeInput)) isValid = false;
    if (emailInput && !validateEmail(emailInput)) isValid = false;
    if (telefoneInput && !validateTelefone(telefoneInput)) isValid = false;
    if (tipoProjetoSelect && !validateTipoProjeto(tipoProjetoSelect)) isValid = false;
    if (mensagemTextarea && !validateMensagem(mensagemTextarea)) isValid = false;
    
    return isValid;
}

/**
 * Adicionar feedback visual ao envio
 */
function addFormSubmitFeedback(form) {
    const submitBtn = form.querySelector('button[type="submit"], button[onclick*="submit"]');
    
    if (submitBtn) {
        submitBtn.addEventListener('click', function(e) {
            // Pequeno delay para permitir que as validações sejam executadas
            setTimeout(() => {
                if (!validateCompleteForm(form)) {
                    // Scroll para o primeiro campo com erro
                    const firstError = form.querySelector('.is-invalid');
                    if (firstError) {
                        firstError.scrollIntoView({ 
                            behavior: 'smooth', 
                            block: 'center' 
                        });
                        firstError.focus();
                    }
                }
            }, 100);
        });
    }
} 