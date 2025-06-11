// Mobile JavaScript Bundle - Otimizado para Performance
// Combina: main.js + navbar-scroll.js + form-masks.js

// === MAIN JS ESSENCIAL ===
document.addEventListener('DOMContentLoaded', function() {
    // Back to top button
    const backToTopBtn = document.querySelector('.back-to-top');
    if (backToTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        });
        
        backToTopBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
    
    // Smooth scroll para links internos
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
});

// === NAVBAR SCROLL OTIMIZADO ===
let lastScrollTop = 0;
const navbar = document.querySelector('.navbar');

function handleNavbarScroll() {
    const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
    
    if (currentScroll > 50) {
        navbar?.classList.add('scrolled');
    } else {
        navbar?.classList.remove('scrolled');
    }
    
    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
}

// Throttle scroll para performance
let ticking = false;
window.addEventListener('scroll', function() {
    if (!ticking) {
        requestAnimationFrame(function() {
            handleNavbarScroll();
            ticking = false;
        });
        ticking = true;
    }
}, { passive: true });

// === FORM MASKS ESSENCIAL (MOBILE) ===
document.addEventListener('DOMContentLoaded', function() {
    // Telefone mask simples
    const phoneInputs = document.querySelectorAll('input[type="tel"], input[name*="phone"], input[name*="telefone"], input[name*="celular"]');
    phoneInputs.forEach(function(input) {
        input.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 11) {
                value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
            } else if (value.length >= 6) {
                value = value.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
            } else if (value.length >= 2) {
                value = value.replace(/(\d{2})(\d{0,5})/, '($1) $2');
            }
            e.target.value = value;
        });
    });
    
    // CEP mask simples
    const cepInputs = document.querySelectorAll('input[name*="cep"]');
    cepInputs.forEach(function(input) {
        input.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 5) {
                value = value.replace(/(\d{5})(\d{0,3})/, '$1-$2');
            }
            e.target.value = value;
        });
    });
});

// === MOBILE TOUCH OPTIMIZATIONS ===
document.addEventListener('DOMContentLoaded', function() {
    // Melhorar touch em botões
    const buttons = document.querySelectorAll('.btn, .service-card, .testimonial-btn');
    buttons.forEach(function(btn) {
        btn.addEventListener('touchstart', function() {
            this.classList.add('touch-active');
        }, { passive: true });
        
        btn.addEventListener('touchend', function() {
            setTimeout(() => {
                this.classList.remove('touch-active');
            }, 150);
        }, { passive: true });
    });
    
    // Lazy loading de imagens mobile
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        observer.unobserve(img);
                    }
                }
            });
        }, { rootMargin: '50px 0px' });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
});

// === PERFORMANCE MONITORING ===
if (typeof performance !== 'undefined' && performance.navigation) {
    window.addEventListener('load', function() {
        // Medir LCP para debug
        if ('PerformanceObserver' in window) {
            const observer = new PerformanceObserver((list) => {
                for (const entry of list.getEntries()) {
                    if (entry.entryType === 'largest-contentful-paint') {
                        console.log('LCP:', entry.startTime + 'ms');
                        // Se LCP > 2500ms, log para analytics
                        if (entry.startTime > 2500 && typeof gtag !== 'undefined') {
                            gtag('event', 'poor_lcp_mobile', {
                                'custom_parameter': Math.round(entry.startTime)
                            });
                        }
                    }
                }
            });
            observer.observe({entryTypes: ['largest-contentful-paint']});
        }
    });
}

console.log('📱 Mobile Bundle JS carregado - Performance otimizada'); 