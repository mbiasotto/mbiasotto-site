/**
 * Correções Automáticas de Acessibilidade
 * Script para aplicar melhorias de acessibilidade via JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('Aplicando correções de acessibilidade...');
    
    // ===== 1. ADICIONAR ARIA-LABELS AOS BOTÕES DO CAROUSEL =====
    addCarouselAccessibility();
    
    // ===== 2. ASSOCIAR LABELS AOS SELECTS =====
    fixSelectLabels();
    
    // ===== 3. MELHORAR ACESSIBILIDADE DOS DOTS =====
    enhanceCarouselDots();
    
    // ===== 4. ADICIONAR SKIP LINK =====
    addSkipLink();
    
    // ===== 5. MARCAR CONTEÚDO PRINCIPAL =====
    markMainContent();
    
    // ===== 6. MELHORAR NAVEGAÇÃO POR TECLADO =====
    enhanceKeyboardNavigation();
    
    console.log('Correções de acessibilidade aplicadas com sucesso!');
});

/**
 * Adicionar acessibilidade aos botões do carousel
 */
function addCarouselAccessibility() {
    const prevBtn = document.getElementById('prevTestimonial');
    const nextBtn = document.getElementById('nextTestimonial');
    
    if (prevBtn && !prevBtn.hasAttribute('aria-label')) {
        prevBtn.setAttribute('aria-label', 'Depoimento anterior');
        prevBtn.setAttribute('tabindex', '0');
    }
    
    if (nextBtn && !nextBtn.hasAttribute('aria-label')) {
        nextBtn.setAttribute('aria-label', 'Próximo depoimento');
        nextBtn.setAttribute('tabindex', '0');
    }
}

/**
 * Corrigir associação de labels aos selects
 */
function fixSelectLabels() {
    // Tipo de projeto
    const tipoProjetoSelect = document.querySelector('select[name="tipo_projeto"]');
    if (tipoProjetoSelect && !tipoProjetoSelect.id) {
        tipoProjetoSelect.id = 'tipo_projeto';
        
        // Buscar ou criar label
        let label = document.querySelector('label[for="tipo_projeto"]');
        if (!label) {
            label = tipoProjetoSelect.parentNode.querySelector('.form-label');
            if (label) {
                label.setAttribute('for', 'tipo_projeto');
            }
        }
        
        // Adicionar aria-describedby se não existir
        if (!tipoProjetoSelect.hasAttribute('aria-describedby')) {
            tipoProjetoSelect.setAttribute('aria-describedby', 'tipo_projeto_help');
        }
    }
    
    // Orçamento
    const orcamentoSelect = document.querySelector('select[name="orcamento"]');
    if (orcamentoSelect && !orcamentoSelect.id) {
        orcamentoSelect.id = 'orcamento';
        
        // Buscar ou criar label
        let label = document.querySelector('label[for="orcamento"]');
        if (!label) {
            label = orcamentoSelect.parentNode.querySelector('.form-label');
            if (label) {
                label.setAttribute('for', 'orcamento');
            }
        }
        
        // Adicionar aria-describedby se não existir
        if (!orcamentoSelect.hasAttribute('aria-describedby')) {
            orcamentoSelect.setAttribute('aria-describedby', 'orcamento_help');
        }
    }
}

/**
 * Melhorar acessibilidade dos dots do carousel
 */
function enhanceCarouselDots() {
    const dots = document.querySelectorAll('.testimonial-dot');
    dots.forEach((dot, index) => {
        if (!dot.hasAttribute('aria-label')) {
            dot.setAttribute('aria-label', `Ir para depoimento ${index + 1}`);
            dot.setAttribute('role', 'button');
            dot.setAttribute('tabindex', '0');
            
            // Adicionar navegação por teclado
            dot.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    dot.click();
                }
            });
        }
    });
}

/**
 * Adicionar skip link para navegação por teclado
 */
function addSkipLink() {
    if (!document.querySelector('.skip-link')) {
        const skipLink = document.createElement('a');
        skipLink.href = '#main-content';
        skipLink.className = 'skip-link';
        skipLink.textContent = 'Pular para o conteúdo principal';
        
        // Inserir no início do body
        document.body.insertBefore(skipLink, document.body.firstChild);
    }
}

/**
 * Marcar o conteúdo principal
 */
function markMainContent() {
    let mainContent = document.querySelector('#main-content');
    
    if (!mainContent) {
        // Tentar diferentes seletores para o conteúdo principal
        mainContent = document.querySelector('section.services-section') ||
                     document.querySelector('main') ||
                     document.querySelector('.hero-section').nextElementSibling;
        
        if (mainContent && !mainContent.id) {
            mainContent.id = 'main-content';
        }
    }
}

/**
 * Melhorar navegação por teclado
 */
function enhanceKeyboardNavigation() {
    // Adicionar navegação por teclado aos botões do carousel
    const carouselButtons = document.querySelectorAll('.testimonial-btn');
    carouselButtons.forEach(button => {
        button.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                button.click();
            }
        });
    });
    
    // Melhorar navegação por teclado nos formulários
    const formElements = document.querySelectorAll('input, select, textarea, button');
    formElements.forEach(element => {
        // Adicionar evento de foco para melhor feedback visual
        element.addEventListener('focus', function() {
            this.setAttribute('data-focused', 'true');
        });
        
        element.addEventListener('blur', function() {
            this.removeAttribute('data-focused');
        });
    });
}

/**
 * Adicionar anúncios para leitores de tela
 */
function addAriaLiveRegions() {
    // Criar região de anúncios para mudanças dinâmicas
    if (!document.querySelector('#aria-live-region')) {
        const liveRegion = document.createElement('div');
        liveRegion.id = 'aria-live-region';
        liveRegion.setAttribute('aria-live', 'polite');
        liveRegion.setAttribute('aria-atomic', 'true');
        liveRegion.className = 'sr-only';
        document.body.appendChild(liveRegion);
    }
}

/**
 * Anunciar mudanças para leitores de tela
 */
function announceChange(message) {
    const liveRegion = document.querySelector('#aria-live-region');
    if (liveRegion) {
        liveRegion.textContent = message;
        
        // Limpar após um tempo para não poluir
        setTimeout(() => {
            liveRegion.textContent = '';
        }, 1000);
    }
}

/**
 * Adicionar suporte para high contrast mode
 */
function addHighContrastSupport() {
    // Detectar se o usuário está usando modo de alto contraste
    if (window.matchMedia && window.matchMedia('(prefers-contrast: high)').matches) {
        document.body.classList.add('high-contrast');
    }
    
    // Escutar mudanças
    if (window.matchMedia) {
        window.matchMedia('(prefers-contrast: high)').addListener(function(e) {
            if (e.matches) {
                document.body.classList.add('high-contrast');
            } else {
                document.body.classList.remove('high-contrast');
            }
        });
    }
}

/**
 * Inicializar todas as melhorias
 */
function initializeAccessibilityEnhancements() {
    addAriaLiveRegions();
    addHighContrastSupport();
    
    // Adicionar evento para carousel changes
    const carousel = document.querySelector('.testimonial-carousel');
    if (carousel) {
        // Observer para mudanças no carousel
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    const activeSlide = carousel.querySelector('.testimonial-slide.active');
                    if (activeSlide) {
                        const slideNumber = Array.from(carousel.querySelectorAll('.testimonial-slide')).indexOf(activeSlide) + 1;
                        announceChange(`Depoimento ${slideNumber} de 3`);
                    }
                }
            });
        });
        
        observer.observe(carousel, {
            attributes: true,
            subtree: true,
            attributeFilter: ['class']
        });
    }
}

// Inicializar melhorias adicionais após carregamento completo
window.addEventListener('load', initializeAccessibilityEnhancements); 