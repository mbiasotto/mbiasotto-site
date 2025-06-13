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
        // Antes de enviar, identificar origem
        const origem = form.getAttribute('id') || window.location.pathname;
        
        // Analytics (se disponível)
        if (typeof gtag !== 'undefined') {
            gtag('event', 'contact_form_submit', {
                'event_category': 'Conversion',
                'event_label': origem,
                'value': 200
            });
            gtag('event', 'generate_lead', {
                'event_category': 'Conversion',
                'event_label': 'Lead Generated - ' + origem,
                'value': 200
            });
            gtag('event', 'form_conversion_success', {
                'event_category': 'Contact',
                'event_label': 'Contact Form Converted Successfully',
                'conversion_type': 'contact_form',
                'recaptcha_protected': true,
                'form_origem': origem
            });
        }
        if (typeof fbq !== 'undefined') {
            fbq('track', 'Lead', { origem: origem });
        }
        
        // Definir ação do reCAPTCHA baseada no formulário
        const action = form.id === 'contactForm' ? 'contact_form' : 'quick_contact';
        
        // Verificar se reCAPTCHA está disponível
        if (typeof executeRecaptcha === 'function') {
            console.log('Executando reCAPTCHA para ação:', action);
            
            executeRecaptcha(action, function(token) {
                if (token && token !== 'error_loading_recaptcha' && token !== 'error_generating_token') {
                    // Adicionar token reCAPTCHA ao formulário
                    addRecaptchaToForm(form, token, action);
                    
                    // Enviar formulário
                    setTimeout(() => {
                        console.log('Enviando formulário com reCAPTCHA:', form.id);
                        form.submit();
                    }, 200);
                } else {
                    console.warn('Erro no reCAPTCHA, enviando sem proteção');
                    // Adicionar bypass para casos de erro no reCAPTCHA
                    addRecaptchaBypass(form);
                    
                    setTimeout(() => {
                        console.log('Enviando formulário com bypass:', form.id);
                        form.submit();
                    }, 200);
                }
            });
        } else {
            console.warn('reCAPTCHA não disponível, enviando com bypass');
            // Adicionar bypass se reCAPTCHA não estiver disponível
            addRecaptchaBypass(form);
            
            setTimeout(() => {
                console.log('Enviando formulário sem reCAPTCHA:', form.id);
                form.submit();
            }, 500);
        }
        
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
 * Adicionar dados do reCAPTCHA ao formulário
 */
function addRecaptchaToForm(form, token, action) {
    // Adicionar token
    let tokenInput = form.querySelector('input[name="recaptcha_token"]');
    if (!tokenInput) {
        tokenInput = document.createElement('input');
        tokenInput.type = 'hidden';
        tokenInput.name = 'recaptcha_token';
        form.appendChild(tokenInput);
    }
    tokenInput.value = token;
    
    // Adicionar action
    let actionInput = form.querySelector('input[name="recaptcha_action"]');
    if (!actionInput) {
        actionInput = document.createElement('input');
        actionInput.type = 'hidden';
        actionInput.name = 'recaptcha_action';
        form.appendChild(actionInput);
    }
    actionInput.value = action;
    
    console.log('reCAPTCHA adicionado ao formulário:', action);
}

/**
 * Adicionar bypass do reCAPTCHA para casos de erro
 */
function addRecaptchaBypass(form) {
    let bypassInput = form.querySelector('input[name="recaptcha_bypass"]');
    if (!bypassInput) {
        bypassInput = document.createElement('input');
        bypassInput.type = 'hidden';
        bypassInput.name = 'recaptcha_bypass';
        form.appendChild(bypassInput);
    }
    bypassInput.value = '1';
    
    console.log('reCAPTCHA bypass adicionado ao formulário');
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