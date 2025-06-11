/**
 * Sistema Simplificado de Envio de Formulários
 * Versão robusta e funcional
 */

// Estado global simples
window.formSubmissionActive = false;

/**
 * Função principal para envio do formulário de contato
 */
function submitContactForm() {
    console.log('submitContactForm executada');
    
    const form = document.getElementById('contactForm');
    const button = document.getElementById('contactFormBtn');
    
    if (!form) {
        console.error('Formulário contactForm não encontrado');
        return false;
    }
    
    if (!button) {
        console.error('Botão contactFormBtn não encontrado');  
        return false;
    }
    
    return processFormSubmission(form, button);
}

/**
 * Função principal para envio do formulário rápido
 */
function submitQuickForm(formId) {
    console.log('submitQuickForm executada com ID:', formId);
    
    const form = document.getElementById(formId);
    const button = document.getElementById(formId + 'Btn');
    
    if (!form) {
        console.error('Formulário não encontrado:', formId);
        return false;
    }
    
    if (!button) {
        console.error('Botão não encontrado:', formId + 'Btn');
        return false;
    }
    
    return processFormSubmission(form, button);
}

/**
 * Processar envio do formulário
 */
function processFormSubmission(form, button) {
    // Verificar se já está enviando
    if (window.formSubmissionActive) {
        console.log('Envio já em andamento');
        return false;
    }
    
    // Validar formulário
    if (!validateForm(form)) {
        console.log('Validação falhou');
        return false;
    }
    
    // Marcar como ativo
    window.formSubmissionActive = true;
    
    // Aplicar estado de loading
    setButtonLoading(button, true);
    
    try {
        // Analytics (se disponível)
        if (typeof gtag !== 'undefined') {
            gtag('event', 'form_submit', {
                event_category: 'Form',
                event_label: form.id
            });
        }
        
        // Enviar formulário após pequeno delay para UX
        setTimeout(() => {
            console.log('Enviando formulário:', form.id);
            form.submit();
        }, 500);
        
    } catch (error) {
        console.error('Erro no envio:', error);
        
        // Restaurar estado
        window.formSubmissionActive = false;
        setButtonLoading(button, false);
        showMessage('Erro ao enviar formulário. Tente novamente.', 'error');
        
        return false;
    }
    
    return true;
}

/**
 * Validar formulário
 */
function validateForm(form) {
    // Usar validação centralizada se disponível
    if (typeof validateCompleteForm === 'function') {
        return validateCompleteForm(form);
    }
    
    // Validação básica
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        field.classList.remove('is-invalid');
        
        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            isValid = false;
        }
    });
    
    if (!isValid) {
        showMessage('Por favor, preencha todos os campos obrigatórios.', 'warning');
    }
    
    return isValid;
}

/**
 * Controlar estado de loading do botão
 */
function setButtonLoading(button, isLoading) {
    const btnText = button.querySelector('.btn-text');
    const spinner = button.querySelector('.spinner-border');
    
    if (isLoading) {
        // Estado de loading
        button.disabled = true;
        button.classList.add('btn-loading');
        
        if (btnText) {
            btnText.setAttribute('data-original-text', btnText.textContent);
            btnText.textContent = 'Enviando...';
        }
        
        if (spinner) {
            spinner.classList.remove('d-none');
        }
        
        // Estilo visual
        button.style.opacity = '0.8';
        button.style.cursor = 'not-allowed';
        
    } else {
        // Estado normal
        button.disabled = false;
        button.classList.remove('btn-loading');
        
        if (btnText) {
            const originalText = btnText.getAttribute('data-original-text');
            if (originalText) {
                btnText.textContent = originalText;
            } else {
                // Fallback para textos padrão
                if (button.id.includes('contactForm')) {
                    btnText.textContent = 'Enviar Mensagem';
                } else {
                    btnText.textContent = 'Solicitar Orçamento';
                }
            }
        }
        
        if (spinner) {
            spinner.classList.add('d-none');
        }
        
        // Restaurar estilo
        button.style.opacity = '1';
        button.style.cursor = 'pointer';
    }
}

/**
 * Mostrar mensagem ao usuário
 */
function showMessage(message, type = 'info') {
    // Remover mensagens existentes
    const existing = document.querySelectorAll('.form-message');
    existing.forEach(el => el.remove());
    
    // Criar nova mensagem
    const alertClass = type === 'error' ? 'danger' : type;
    const messageEl = document.createElement('div');
    messageEl.className = `alert alert-${alertClass} form-message`;
    messageEl.textContent = message;
    messageEl.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    `;
    
    document.body.appendChild(messageEl);
    
    // Auto-remover
    setTimeout(() => {
        if (messageEl.parentNode) {
            messageEl.remove();
        }
    }, 5000);
}

/**
 * Resetar estado (para debug)
 */
function resetFormState() {
    window.formSubmissionActive = false;
    
    const buttons = document.querySelectorAll('.btn-form-submit');
    buttons.forEach(button => {
        setButtonLoading(button, false);
    });
    
    console.log('Estado do formulário resetado');
}

/**
 * Inicialização
 */
document.addEventListener('DOMContentLoaded', function() {
    console.log('Sistema de envio simplificado carregado');
    
    // Reset automático de segurança
    setInterval(() => {
        if (window.formSubmissionActive) {
            console.log('Reset automático de segurança');
            resetFormState();
        }
    }, 30000); // 30 segundos
    
    // Proteção contra duplo clique nos formulários
    const forms = document.querySelectorAll('form[method="POST"]');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (window.formSubmissionActive) {
                e.preventDefault();
                console.log('Duplo envio prevenido');
                return false;
            }
        });
    });
});

// Exportar função de reset para console
window.resetFormState = resetFormState; 