/**
 * Sistema de Envio de Formulários
 * Proteção contra duplo clique, validação e feedback visual
 */

// Estado global para controle de envios
let formSubmissionState = {
    submitted: false,
    activeSubmissions: new Set()
};

/**
 * Função principal para envio do formulário de contato
 */
function submitContactForm() {
    console.log('submitContactForm called');
    
    const form = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    
    if (!form || !submitBtn) {
        console.error('Form ou button não encontrado');
        return false;
    }
    
    return handleFormSubmission(form, submitBtn, 'contact_form');
}

/**
 * Função principal para envio do formulário rápido
 */
function submitQuickForm(formId) {
    console.log('submitQuickForm called with ID:', formId);
    
    const form = document.getElementById(formId);
    const submitBtn = document.getElementById(formId + 'Btn');
    
    if (!form || !submitBtn) {
        console.error('Form ou button não encontrado para ID:', formId);
        return false;
    }
    
    return handleFormSubmission(form, submitBtn, 'quick_contact');
}

/**
 * Manipular envio do formulário com proteção e validação
 */
function handleFormSubmission(form, button, recaptchaAction) {
    const formId = form.id;
    
    // Verificar se já está sendo enviado
    if (formSubmissionState.activeSubmissions.has(formId)) {
        console.log('Formulário já está sendo enviado:', formId);
        return false;
    }
    
    // Validar formulário
    if (!validateFormBeforeSubmit(form)) {
        console.log('Validação falhou para:', formId);
        return false;
    }
    
    // Marcar como ativo
    formSubmissionState.activeSubmissions.add(formId);
    
    // Aplicar estado de loading
    setButtonLoadingState(button, true);
    
    // Tentar envio com reCAPTCHA (se disponível)
    if (typeof executeRecaptcha === 'function') {
        console.log('Executando reCAPTCHA...');
        executeRecaptcha(recaptchaAction, function(token) {
            if (token && !token.includes('error_')) {
                addRecaptchaToForm(form, token, recaptchaAction);
                submitFormDirectly(form, button);
            } else {
                console.log('Erro no reCAPTCHA, enviando sem token');
                submitFormDirectly(form, button);
            }
        });
    } else {
        // Enviar diretamente se reCAPTCHA não estiver disponível
        console.log('reCAPTCHA não disponível, enviando diretamente');
        submitFormDirectly(form, button);
    }
    
    return true;
}

/**
 * Enviar formulário diretamente
 */
function submitFormDirectly(form, button) {
    const formId = form.id;
    
    try {
        // Analytics
        if (typeof gtag !== 'undefined') {
            gtag('event', 'form_submit_attempt', {
                event_category: 'Form Submission',
                event_label: formId,
                value: 1
            });
        }
        
        // Enviar formulário
        form.submit();
        
    } catch (error) {
        console.error('Erro ao enviar formulário:', error);
        
        // Restaurar estado em caso de erro
        formSubmissionState.activeSubmissions.delete(formId);
        setButtonLoadingState(button, false);
        
        // Mostrar mensagem de erro
        showFormNotification('Erro ao enviar formulário. Tente novamente.', 'error');
    }
}

/**
 * Validar formulário antes do envio
 */
function validateFormBeforeSubmit(form) {
    // Usar validação centralizada se disponível
    if (typeof validateCompleteForm === 'function') {
        return validateCompleteForm(form);
    }
    
    // Validação básica como fallback
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            isValid = false;
        } else {
            field.classList.remove('is-invalid');
        }
    });
    
    return isValid;
}

/**
 * Controlar estado de loading do botão
 */
function setButtonLoadingState(button, isLoading) {
    const btnText = button.querySelector('.btn-text');
    const spinner = button.querySelector('.spinner-border');
    
    if (isLoading) {
        // Estado de loading
        button.disabled = true;
        button.classList.add('btn-loading');
        
        if (btnText) btnText.textContent = 'Enviando...';
        if (spinner) spinner.classList.remove('d-none');
        
        // Adicionar classe para animação visual
        button.style.cursor = 'not-allowed';
        button.style.opacity = '0.8';
        
    } else {
        // Estado normal
        button.disabled = false;
        button.classList.remove('btn-loading');
        
        // Restaurar texto original
        if (btnText) {
            if (button.id.includes('contactForm')) {
                btnText.textContent = 'Enviar Mensagem';
            } else {
                btnText.textContent = 'Solicitar Orçamento';
            }
        }
        
        if (spinner) spinner.classList.add('d-none');
        
        // Restaurar estilo
        button.style.cursor = 'pointer';
        button.style.opacity = '1';
    }
}

/**
 * Mostrar notificação ao usuário
 */
function showFormNotification(message, type = 'info') {
    // Remover notificações existentes
    const existingNotifications = document.querySelectorAll('.form-notification');
    existingNotifications.forEach(notification => notification.remove());
    
    // Criar nova notificação
    const notification = document.createElement('div');
    notification.className = `alert alert-${type === 'error' ? 'danger' : type} form-notification`;
    notification.textContent = message;
    notification.style.position = 'fixed';
    notification.style.top = '20px';
    notification.style.right = '20px';
    notification.style.zIndex = '9999';
    notification.style.minWidth = '300px';
    
    document.body.appendChild(notification);
    
    // Remover após 5 segundos
    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 5000);
}

/**
 * Adicionar token reCAPTCHA ao formulário
 */
function addRecaptchaToForm(form, token, action) {
    // Remover tokens existentes
    const existingToken = form.querySelector('input[name="recaptcha_token"]');
    const existingAction = form.querySelector('input[name="recaptcha_action"]');
    
    if (existingToken) existingToken.remove();
    if (existingAction) existingAction.remove();
    
    // Adicionar novo token
    const tokenInput = document.createElement('input');
    tokenInput.type = 'hidden';
    tokenInput.name = 'recaptcha_token';
    tokenInput.value = token;
    form.appendChild(tokenInput);
    
    // Adicionar action
    const actionInput = document.createElement('input');
    actionInput.type = 'hidden';
    actionInput.name = 'recaptcha_action';
    actionInput.value = action;
    form.appendChild(actionInput);
}

/**
 * Reset de segurança para liberação de formulários travados
 */
function resetFormSubmissionState() {
    formSubmissionState.submitted = false;
    formSubmissionState.activeSubmissions.clear();
    
    // Restaurar todos os botões
    const buttons = document.querySelectorAll('.btn-form-submit');
    buttons.forEach(button => {
        setButtonLoadingState(button, false);
    });
    
    console.log('Estado de envio resetado');
}

/**
 * Inicialização e proteções globais
 */
document.addEventListener('DOMContentLoaded', function() {
    console.log('Form submission system initialized');
    
    // Proteção contra saída da página durante envio
    window.addEventListener('beforeunload', function(e) {
        if (formSubmissionState.activeSubmissions.size > 0) {
            e.preventDefault();
            e.returnValue = 'Formulário sendo enviado. Tem certeza que deseja sair?';
            return e.returnValue;
        }
    });
    
    // Reset automático após timeout (segurança)
    setInterval(() => {
        if (formSubmissionState.activeSubmissions.size > 0) {
            console.log('Timeout de segurança - resetando estado');
            resetFormSubmissionState();
        }
    }, 30000); // 30 segundos
    
    // Adicionar eventos de submit aos formulários
    const forms = document.querySelectorAll('form[method="POST"]');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const formId = form.id;
            if (formSubmissionState.activeSubmissions.has(formId)) {
                e.preventDefault();
                console.log('Prevented double submission for:', formId);
                return false;
            }
        });
    });
});

// Exportar função de reset para debug
window.resetFormSubmissionState = resetFormSubmissionState; 