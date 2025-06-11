/**
 * Google Analytics 4 - Event Tracking
 * Programador PHP Freelancer - Eventos de Conversão
 */

// Aguardar carregamento completo da página
document.addEventListener('DOMContentLoaded', function() {
    
    // ===========================================
    // EVENTOS DE CONVERSÃO PRINCIPAL
    // ===========================================
    
    // 1. Cliques nos botões "Solicitar Orçamento"
    const quoteButtons = document.querySelectorAll('a[href*="contato"], .btn-cta-primary, .btn-cta-navbar, .btn-primary-standard');
    quoteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            const buttonText = this.textContent.trim();
            const isMainCTA = this.classList.contains('btn-cta-primary') || buttonText.includes('Orçamento');
            
            gtag('event', 'click_quote_button', {
                event_category: 'Conversion',
                event_label: buttonText,
                button_location: isMainCTA ? 'Hero Section' : 'Secondary',
                value: isMainCTA ? 100 : 50
            });
            
            // Evento de conversão no GA4
            gtag('event', 'generate_lead', {
                currency: 'BRL',
                value: 100
            });
            
            console.log('GA4: Quote button clicked -', buttonText);
        });
    });
    
    // 2. Cliques nos links de serviços específicos
    const serviceLinks = document.querySelectorAll('.service-link, .service-card a, [href*="servicos"]');
    serviceLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const serviceTitle = this.closest('.service-card')?.querySelector('.service-title')?.textContent ||
                               this.querySelector('.service-title')?.textContent ||
                               'Service Link';
            
            gtag('event', 'click_service', {
                event_category: 'Engagement',
                event_label: serviceTitle,
                service_type: serviceTitle.includes('PHP') ? 'PHP Development' : 
                             serviceTitle.includes('Laravel') ? 'Laravel Development' :
                             serviceTitle.includes('API') ? 'API Development' : 'Other'
            });
            
            console.log('GA4: Service clicked -', serviceTitle);
        });
    });
    
    // 3. Cliques no logo (navegação para home)
    const logoLinks = document.querySelectorAll('.navbar-brand, [href="/"], [href="./"]');
    logoLinks.forEach(logo => {
        logo.addEventListener('click', function(e) {
            gtag('event', 'click_logo', {
                event_category: 'Navigation',
                event_label: 'Logo Click - Back to Home'
            });
        });
    });
    
    // 4. Cliques no menu de navegação
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const pageName = this.textContent.trim();
            
            gtag('event', 'click_navigation', {
                event_category: 'Navigation',
                event_label: pageName,
                destination_page: this.getAttribute('href')
            });
        });
    });
    
    // ===========================================
    // EVENTOS DE ENGAJAMENTO
    // ===========================================
    
    // 5. Scroll depth tracking (25%, 50%, 75%, 100%)
    let scrollMarks = {25: false, 50: false, 75: false, 100: false};
    
    window.addEventListener('scroll', function() {
        const scrollPercent = Math.round((window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100);
        
        Object.keys(scrollMarks).forEach(mark => {
            if (scrollPercent >= mark && !scrollMarks[mark]) {
                scrollMarks[mark] = true;
                
                gtag('event', 'scroll_depth', {
                    event_category: 'Engagement',
                    event_label: `${mark}% Scrolled`,
                    value: parseInt(mark)
                });
                
                // Marco importante: usuário leu mais de 75% da página
                if (mark == 75) {
                    gtag('event', 'engaged_user', {
                        event_category: 'Engagement',
                        event_label: 'High Scroll Engagement'
                    });
                }
            }
        });
    });
    
    // 6. Tempo na página (marcos: 30s, 60s, 120s)
    const timeMarks = [30, 60, 120]; // segundos
    timeMarks.forEach(seconds => {
        setTimeout(() => {
            gtag('event', 'time_on_page', {
                event_category: 'Engagement',
                event_label: `${seconds}s on page`,
                value: seconds
            });
            
            // Usuário altamente engajado (2+ minutos)
            if (seconds >= 120) {
                gtag('event', 'highly_engaged_user', {
                    event_category: 'Engagement',
                    event_label: 'Long Time on Page'
                });
            }
        }, seconds * 1000);
    });
    
    // ===========================================
    // EVENTOS ESPECÍFICOS POR PÁGINA
    // ===========================================
    
    // 7. Eventos específicos da página de serviços
    if (window.location.pathname.includes('servicos')) {
        // Clique em features dos serviços
        const featureItems = document.querySelectorAll('.service-features-list li');
        featureItems.forEach(item => {
            item.addEventListener('click', function() {
                gtag('event', 'click_service_feature', {
                    event_category: 'Engagement',
                    event_label: this.textContent.trim()
                });
            });
        });
    }
    
    // 8. Eventos da página do programador
    if (window.location.pathname.includes('programador-php-freelancer')) {
        // Clique nas especialidades
        const especialidades = document.querySelectorAll('.especialidade-item');
        especialidades.forEach(item => {
            item.addEventListener('click', function() {
                gtag('event', 'click_expertise', {
                    event_category: 'Engagement',
                    event_label: this.textContent.trim()
                });
            });
        });
        
        // Visualização da seção "Por que me escolher"
        const whyChooseSection = document.querySelector('.porque-escolher');
        if (whyChooseSection) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        gtag('event', 'view_why_choose', {
                            event_category: 'Engagement',
                            event_label: 'Why Choose Section Viewed'
                        });
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            observer.observe(whyChooseSection);
        }
    }
    
    // ===========================================
    // DETECÇÃO DE SAÍDA (EXIT INTENT)
    // ===========================================
    
    // 9. Exit intent - quando usuário move mouse para sair da página
    let exitIntentTriggered = false;
    document.addEventListener('mouseleave', function(e) {
        if (e.clientY <= 0 && !exitIntentTriggered) {
            exitIntentTriggered = true;
            
            gtag('event', 'exit_intent', {
                event_category: 'Behavior',
                event_label: 'User about to leave page',
                page_path: window.location.pathname
            });
        }
    });
    
    // ===========================================
    // EVENTOS DE FORMULÁRIO (quando houver)
    // ===========================================
    
    // 10. Foco nos campos de formulário
    const formInputs = document.querySelectorAll('input[type="text"], input[type="email"], textarea');
    formInputs.forEach(input => {
        input.addEventListener('focus', function() {
            gtag('event', 'form_field_focus', {
                event_category: 'Conversion',
                event_label: this.name || this.id || 'form_field',
                field_type: this.type
            });
        });
    });
    
    // 11. Submissão de formulários
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            gtag('event', 'form_submit', {
                event_category: 'Conversion',
                event_label: 'Contact Form Submitted',
                value: 200
            });
            
            // Evento de conversão principal
            gtag('event', 'contact_form_submit', {
                event_category: 'Lead Generation',
                currency: 'BRL',
                value: 200
            });
            
            console.log('GA4: Form submitted');
        });
    });
    
    // ===========================================
    // EVENTOS DE ERRO (OPCIONAL)
    // ===========================================
    
    // 12. Capturar erros JavaScript
    window.addEventListener('error', function(e) {
        gtag('event', 'javascript_error', {
            event_category: 'Error',
            event_label: e.message,
            error_file: e.filename,
            error_line: e.lineno
        });
    });
    
    console.log('GA4 Event Tracking: Initialized for Programador PHP Freelancer');
});

// ===========================================
// FUNÇÕES UTILITÁRIAS
// ===========================================

// Função para rastrear cliques externos (se houver links para portfolio, GitHub, etc.)
function trackExternalLink(url, linkText) {
    gtag('event', 'click_external_link', {
        event_category: 'Outbound',
        event_label: linkText,
        external_url: url
    });
}

// Função para rastrear downloads (se houver CV, portfólio, etc.)
function trackDownload(fileName, fileType) {
    gtag('event', 'file_download', {
        event_category: 'Download',
        event_label: fileName,
        file_type: fileType
    });
} 