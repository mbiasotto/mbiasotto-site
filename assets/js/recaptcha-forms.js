/**
 * reCAPTCHA v3 Form Handlers
 * Programador PHP Freelancer - Sorocaba SP
 * Integração com Google Analytics
 * 
 * Este script só executa em páginas com formulários
 */

// Verificar se reCAPTCHA é necessário nesta página
function isRecaptchaPage() {
    const currentPage = window.location.pathname.split('/').pop().replace('.php', '') || 'index';
    // Manter sincronizado com getPagesWithForms() em includes/recaptcha-pages.php
    const pagesWithForms = ['contato', 'index'];
    return pagesWithForms.includes(currentPage);
}

// Só continuar se for uma página que precisa de reCAPTCHA
if (!isRecaptchaPage()) {
    console.log('reCAPTCHA não necessário nesta página');
} else {
    console.log('Inicializando reCAPTCHA para página com formulários');
}

// Configuração
const RECAPTCHA_SITE_KEY = '6LebUF0rAAAAAH2K0WX2mVhxUugPn8pPAbtEQiqQ';

// Variável para controlar tentativas de erro
let recaptchaErrorCount = 0;
const MAX_RECAPTCHA_ERRORS = 3;

// Só definir funções se for uma página que precisa de reCAPTCHA
if (isRecaptchaPage()) {

/**
 * Submeter formulário de contato principal
 */
function submitContactForm() {
    const form = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    
    if (!validateContactForm(form)) {
        return false;
    }

    // Desabilitar botão e mostrar loading
    toggleFormSubmitting(submitBtn, true);

    // Executar reCAPTCHA e submeter
    executeRecaptcha('contact_form', function(token) {
        // Verificar se houve erro no reCAPTCHA
        if (token.includes('error_')) {
            recaptchaErrorCount++;
            
            if (recaptchaErrorCount >= MAX_RECAPTCHA_ERRORS) {
                // Após muitos erros, permitir submissão sem reCAPTCHA
                showNotification('Sistema de segurança temporariamente indisponível. Seu formulário será processado normalmente.', 'warning');
                
                // Adicionar flag indicando problema de reCAPTCHA
                const errorFlag = document.createElement('input');
                errorFlag.type = 'hidden';
                errorFlag.name = 'recaptcha_bypass';
                errorFlag.value = '1';
                form.appendChild(errorFlag);
                
                form.submit();
                return;
            } else {
                showNotification('Erro na verificação de segurança. Tente novamente em alguns segundos.', 'error');
                toggleFormSubmitting(submitBtn, false);
                return;
            }
        }

        addRecaptchaToForm(form, token, 'contact_form');
        
        // Track no Google Analytics - Tentativa de envio
        if (typeof gtag !== 'undefined') {
            gtag('event', 'contact_form_attempt', {
                event_category: 'Form Submission',
                event_label: 'Contact Form - reCAPTCHA Success'
            });
        }

        // Submeter formulário
        form.submit();
    });
}

/**
 * Submeter formulário rápido
 */
function submitQuickForm(formId) {
    const form = document.getElementById(formId);
    const submitBtn = document.getElementById(formId + 'Btn');
    
    if (!validateQuickForm(form)) {
        return false;
    }

    // Desabilitar botão e mostrar loading
    toggleFormSubmitting(submitBtn, true);

    // Executar reCAPTCHA e submeter
    executeRecaptcha('quick_contact', function(token) {
        // Verificar se houve erro no reCAPTCHA
        if (token.includes('error_')) {
            recaptchaErrorCount++;
            
            if (recaptchaErrorCount >= MAX_RECAPTCHA_ERRORS) {
                // Após muitos erros, permitir submissão sem reCAPTCHA
                showNotification('Sistema de segurança temporariamente indisponível. Seu formulário será processado normalmente.', 'warning');
                
                // Adicionar flag indicando problema de reCAPTCHA
                const errorFlag = document.createElement('input');
                errorFlag.type = 'hidden';
                errorFlag.name = 'recaptcha_bypass';
                errorFlag.value = '1';
                form.appendChild(errorFlag);
                
                form.submit();
                return;
            } else {
                showNotification('Erro na verificação de segurança. Tente novamente em alguns segundos.', 'error');
                toggleFormSubmitting(submitBtn, false);
                return;
            }
        }

        addRecaptchaToForm(form, token, 'quick_contact');
        
        // Track no Google Analytics - Tentativa de envio
        if (typeof gtag !== 'undefined') {
            gtag('event', 'quick_form_attempt', {
                event_category: 'Form Submission',
                event_label: 'Quick Contact Form - reCAPTCHA Success',
                value: 100
            });
        }

        // Submeter formulário
        form.submit();
    });
}

/**
 * Adicionar token e action do reCAPTCHA ao formulário
 */
function addRecaptchaToForm(form, token, action) {
    // Remover campos existentes se houver
    const existingToken = form.querySelector('input[name="recaptcha_token"]');
    const existingAction = form.querySelector('input[name="recaptcha_action"]');
    
    if (existingToken) existingToken.remove();
    if (existingAction) existingAction.remove();

    // Adicionar token
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
 * Validar formulário de contato
 */
function validateContactForm(form) {
    const nome = form.querySelector('input[name="nome"]');
    const email = form.querySelector('input[name="email"]');
    const tipoProj = form.querySelector('select[name="tipo_projeto"]');
    const mensagem = form.querySelector('textarea[name="mensagem"]');

    // Reset classes de erro
    clearFormErrors(form);

    let isValid = true;

    // Validar nome
    if (!nome.value.trim() || nome.value.length < 2) {
        showFieldError(nome, 'Nome deve ter pelo menos 2 caracteres');
        isValid = false;
    }

    // Validar email
    if (!isValidEmail(email.value)) {
        showFieldError(email, 'Digite um e-mail válido');
        isValid = false;
    }

    // Validar tipo de projeto
    if (!tipoProj.value) {
        showFieldError(tipoProj, 'Selecione o tipo de projeto');
        isValid = false;
    }

    // Validar mensagem
    if (!mensagem.value.trim() || mensagem.value.length < 10) {
        showFieldError(mensagem, 'Mensagem deve ter pelo menos 10 caracteres');
        isValid = false;
    }

    // Track erro de validação
    if (!isValid) {
        gtag('event', 'form_validation_error', {
            event_category: 'Form Error',
            event_label: 'Contact Form Validation Failed'
        });
    }

    return isValid;
}

/**
 * Validar formulário rápido
 */
function validateQuickForm(form) {
    const nome = form.querySelector('input[name="nome"]');
    const email = form.querySelector('input[name="email"]');
    const tipoProj = form.querySelector('select[name="tipo_projeto"]');
    const mensagem = form.querySelector('textarea[name="mensagem"]');

    clearFormErrors(form);

    let isValid = true;

    if (!nome.value.trim() || nome.value.length < 2) {
        showFieldError(nome, 'Nome obrigatório');
        isValid = false;
    }

    if (!isValidEmail(email.value)) {
        showFieldError(email, 'E-mail inválido');
        isValid = false;
    }

    if (!tipoProj.value) {
        showFieldError(tipoProj, 'Selecione o tipo de projeto');
        isValid = false;
    }

    if (!mensagem.value.trim() || mensagem.value.length < 10) {
        showFieldError(mensagem, 'Descreva seu projeto (min. 10 caracteres)');
        isValid = false;
    }

    if (!isValid) {
        gtag('event', 'form_validation_error', {
            event_category: 'Form Error',
            event_label: 'Quick Form Validation Failed'
        });
    }

    return isValid;
}

/**
 * Helpers de validação
 */
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function showFieldError(field, message) {
    field.classList.add('is-invalid');
    
    // Remover mensagem de erro existente
    const existingError = field.parentNode.querySelector('.invalid-feedback');
    if (existingError) {
        existingError.remove();
    }
    
    // Adicionar nova mensagem
    const errorDiv = document.createElement('div');
    errorDiv.className = 'invalid-feedback';
    errorDiv.textContent = message;
    field.parentNode.appendChild(errorDiv);
}

function clearFormErrors(form) {
    const invalidFields = form.querySelectorAll('.is-invalid');
    const errorMessages = form.querySelectorAll('.invalid-feedback');
    
    invalidFields.forEach(field => field.classList.remove('is-invalid'));
    errorMessages.forEach(error => error.remove());
}

/**
 * Toggle estado de submissão do botão
 */
function toggleFormSubmitting(button, isSubmitting) {
    const btnText = button.querySelector('.btn-text');
    const spinner = button.querySelector('.spinner-border');
    
    if (isSubmitting) {
        button.disabled = true;
        btnText.textContent = 'Enviando...';
        spinner.classList.remove('d-none');
        
        // Analytics - Form Submit Start
        gtag('event', 'form_submit_start', {
            event_category: 'Form Interaction',
            event_label: 'Form Submission Started'
        });
        
    } else {
        button.disabled = false;
        spinner.classList.add('d-none');
        
        // Restaurar texto baseado no tipo de formulário
        if (button.id.includes('contactForm')) {
            btnText.textContent = 'Enviar Mensagem';
        } else {
            btnText.textContent = 'Solicitar Orçamento Gratuito';
        }
    }
}

/**
 * Proteção contra múltiplos cliques
 */
document.addEventListener('DOMContentLoaded', function() {
    // Prevent double submission
    let formSubmitted = false;
    
    const forms = document.querySelectorAll('form[method="POST"]');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            if (formSubmitted) {
                return false;
            }
            formSubmitted = true;
            
            // Reset após 5 segundos (caso haja erro)
            setTimeout(() => {
                formSubmitted = false;
            }, 5000);
        });
    });

    // Track quando reCAPTCHA carrega
    if (typeof grecaptcha !== 'undefined') {
        grecaptcha.ready(function() {
            gtag('event', 'recaptcha_loaded', {
                event_category: 'Security',
                event_label: 'reCAPTCHA v3 Ready'
            });
        });
    }

    // Detectar bot behavior patterns
    let suspiciousActivity = 0;
    
    // Formulários preenchidos muito rápido
    const formFillStartTime = Date.now();
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            const fillTime = Date.now() - formFillStartTime;
            if (fillTime < 3000) { // Menos de 3 segundos
                suspiciousActivity++;
                gtag('event', 'suspicious_form_speed', {
                    event_category: 'Security Alert',
                    event_label: 'Form Filled Too Fast',
                    fill_time: fillTime
                });
            }
        });
    });

    // Track campos honeypot
    const honeypotFields = document.querySelectorAll('input[name="website"]');
    honeypotFields.forEach(field => {
        field.addEventListener('input', function() {
            if (this.value.length > 0) {
                gtag('event', 'honeypot_triggered', {
                    event_category: 'Security Alert',
                    event_label: 'Bot Detected - Honeypot'
                });
            }
        });
    });
});

/**
 * Monitoramento de qualidade dos leads
 */
function trackLeadQuality(formData) {
    const qualityIndicators = {
        hasPhone: !!formData.telefone,
        hasCompany: !!formData.empresa,
        hasBudget: !!formData.orcamento,
        messageLength: formData.mensagem ? formData.mensagem.length : 0,
        projectType: formData.tipo_projeto
    };

    let qualityScore = 0;
    
    if (qualityIndicators.hasPhone) qualityScore += 20;
    if (qualityIndicators.hasCompany) qualityScore += 15;
    if (qualityIndicators.hasBudget) qualityScore += 25;
    if (qualityIndicators.messageLength > 50) qualityScore += 25;
    if (qualityIndicators.messageLength > 100) qualityScore += 15;

    gtag('event', 'lead_quality_analysis', {
        event_category: 'Lead Scoring',
        event_label: qualityScore >= 60 ? 'High Quality Lead' : 'Standard Lead',
        quality_score: qualityScore,
        project_type: qualityIndicators.projectType
    });

    return qualityScore;
}

} // Fim do bloco isRecaptchaPage()