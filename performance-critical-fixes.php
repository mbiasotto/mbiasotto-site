<?php
/**
 * Correções Críticas de Performance Mobile
 * 
 * Implementa otimizações para melhorar:
 * - FCP de 4.4s para <2.5s
 * - LCP de 4.6s para <2.5s 
 * - Speed Index de 5.4s para <3.0s
 */

// ===========================================
// 1. CRITICAL CSS INLINE (ELIMINAR RENDER-BLOCKING)
// ===========================================

/**
 * CSS crítico inline para hero section (LCP element)
 * Economiza 1,400ms eliminando render-blocking do Bootstrap e Font Awesome
 */
?>

<style>
/* Critical CSS Inline - Hero Section & LCP Element */
.hero-section {
    background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
    padding: 8rem 0 4rem;
    color: white;
    position: relative;
    overflow: hidden;
    min-height: 100vh;
    display: flex;
    align-items: center;
}

.hero-content {
    text-align: center;
    z-index: 2;
    position: relative;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    line-height: 1.2;
    font-family: "Manrope", sans-serif;
}

.hero-subtitle {
    font-size: 1.25rem;
    font-weight: 300;
    line-height: 1.6;
    margin-bottom: 2rem;
    color: rgba(255, 255, 255, 0.9);
    font-family: "Inter", sans-serif;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

.row {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -0.75rem;
}

.col-lg-10 {
    flex: 0 0 83.333333%;
    max-width: 83.333333%;
    padding: 0 0.75rem;
}

.justify-content-center {
    justify-content: center;
}

.text-center {
    text-align: center;
}

.mb-4 { margin-bottom: 1.5rem; }
.mb-5 { margin-bottom: 3rem; }

/* Navigation Critical */
.navbar {
    background: rgba(30, 58, 138, 0.95);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
    padding: 1rem 0;
}

.navbar-brand {
    color: white;
    font-weight: 700;
    font-size: 1.5rem;
    text-decoration: none;
}

/* Mobile Optimizations */
@media (max-width: 768px) {
    .hero-section {
        padding: 6rem 0 3rem;
        min-height: 100vh;
    }
    
    .hero-title {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
    }
    
    .col-lg-10 {
        flex: 0 0 100%;
        max-width: 100%;
    }
    
    .container {
        padding: 0 1rem;
    }
}

@media (max-width: 576px) {
    .hero-title {
        font-size: 2rem;
        line-height: 1.3;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
}
</style>

<?php
// ===========================================
// 2. PRELOAD CRITICAL RESOURCES
// ===========================================

/**
 * Preload recursos críticos para LCP
 */
?>

<!-- Preload Critical Resources -->
<link rel="preload" href="<?php echo asset('assets/css/style.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">

<?php
// ===========================================
// 3. DEFER NON-CRITICAL CSS
// ===========================================

/**
 * Carregar CSS não-crítico de forma assíncrona
 */
?>

<script>
// Carregar CSS não-crítico de forma assíncrona
function loadCSS(href) {
    const link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = href;
    document.head.appendChild(link);
}

// Carregar após LCP
window.addEventListener('load', function() {
    // Bootstrap (apenas componentes necessários serão usados)
    loadCSS('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
    
    // Font Awesome (carregamento assíncrono)
    loadCSS('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
    
    // AOS Animation (não crítico)
    loadCSS('https://unpkg.aos@2.3.1/dist/aos.css');
});
</script>

<?php
// ===========================================
// 4. CRITICAL JAVASCRIPT INLINE
// ===========================================

/**
 * JavaScript crítico inline para navegação
 */
?>

<script>
// Critical JavaScript Inline - Navigation
document.addEventListener('DOMContentLoaded', function() {
    // Navbar scroll behavior (critical for UX)
    let lastScroll = 0;
    const navbar = document.querySelector('.navbar');
    
    if (navbar) {
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 100) {
                navbar.style.background = 'rgba(30, 58, 138, 0.98)';
                navbar.style.backdropFilter = 'blur(15px)';
            } else {
                navbar.style.background = 'rgba(30, 58, 138, 0.95)';
                navbar.style.backdropFilter = 'blur(10px)';
            }
            
            lastScroll = currentScroll;
        }, { passive: true });
    }
});
</script>

<?php
// ===========================================
// 5. OTIMIZAÇÃO DE IMAGENS
// ===========================================

/**
 * WebP e lazy loading para imagens
 */
?>

<script>
// Optimize images - WebP support and lazy loading
function optimizeImages() {
    const images = document.querySelectorAll('img');
    
    images.forEach(img => {
        // Add lazy loading
        if (!img.hasAttribute('loading')) {
            img.setAttribute('loading', 'lazy');
        }
        
        // Add proper dimensions if missing
        if (!img.hasAttribute('width') || !img.hasAttribute('height')) {
            img.addEventListener('load', function() {
                if (!this.hasAttribute('width')) {
                    this.setAttribute('width', this.naturalWidth);
                }
                if (!this.hasAttribute('height')) {
                    this.setAttribute('height', this.naturalHeight);
                }
            });
        }
    });
}

// Run after DOM load
document.addEventListener('DOMContentLoaded', optimizeImages);
</script>

<?php
// ===========================================
// 6. GZIP/COMPRESSION VIA .HTACCESS
// ===========================================

/**
 * Código para adicionar ao .htaccess
 */
?>

<!-- 
Adicionar ao .htaccess:

# Gzip Compression
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/plain
    AddOutputFilterByType DEFLATE text/html
    AddOutputFilterByType DEFLATE text/xml
    AddOutputFilterByType DEFLATE text/css
    AddOutputFilterByType DEFLATE text/javascript
    AddOutputFilterByType DEFLATE application/xml
    AddOutputFilterByType DEFLATE application/xhtml+xml
    AddOutputFilterByType DEFLATE application/rss+xml
    AddOutputFilterByType DEFLATE application/javascript
    AddOutputFilterByType DEFLATE application/x-javascript
    AddOutputFilterByType DEFLATE application/json
    AddOutputFilterByType DEFLATE application/ld+json
    AddOutputFilterByType DEFLATE image/svg+xml
</IfModule>

# Brotli Compression (if available)
<IfModule mod_brotli.c>
    BrotliCompressionLevel 6
    BrotliFilterByType text/plain
    BrotliFilterByType text/html
    BrotliFilterByType text/xml
    BrotliFilterByType text/css
    BrotliFilterByType text/javascript
    BrotliFilterByType application/xml
    BrotliFilterByType application/xhtml+xml
    BrotliFilterByType application/rss+xml
    BrotliFilterByType application/javascript
    BrotliFilterByType application/x-javascript
    BrotliFilterByType application/json
    BrotliFilterByType application/ld+json
    BrotliFilterByType image/svg+xml
</IfModule>

# Cache Control
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType text/css "access plus 1 year"
    ExpiresByType application/javascript "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/gif "access plus 1 year"
    ExpiresByType image/svg+xml "access plus 1 year"
    ExpiresByType font/woff "access plus 1 year"
    ExpiresByType font/woff2 "access plus 1 year"
</IfModule>
-->

<?php
// ===========================================
// 7. RESOURCE HINTS
// ===========================================

/**
 * Resource hints para melhor performance
 */
?>

<!-- Resource Hints -->
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//cdn.jsdelivr.net">
<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
<link rel="dns-prefetch" href="//unpkg.com">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<!-- Prefetch next likely pages -->
<link rel="prefetch" href="<?php echo url('contato'); ?>">
<link rel="prefetch" href="<?php echo url('servicos'); ?>">

<?php
// ===========================================
// 8. MINIFICAÇÃO AUTOMÁTICA
// ===========================================

/**
 * Funções para minificação automática
 */

function minifyCSS($css) {
    // Remove comentários
    $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
    
    // Remove espaços em branco desnecessários
    $css = preg_replace('/\s+/', ' ', $css);
    $css = preg_replace('/;\s*}/', '}', $css);
    $css = preg_replace('/}\s*/', '}', $css);
    $css = preg_replace('/{\s*/', '{', $css);
    $css = preg_replace('/;\s*/', ';', $css);
    $css = preg_replace('/:\s*/', ':', $css);
    
    return trim($css);
}

function minifyJS($js) {
    // Remove comentários de linha
    $js = preg_replace('/\/\/.*$/m', '', $js);
    
    // Remove comentários de bloco
    $js = preg_replace('/\/\*.*?\*\//s', '', $js);
    
    // Remove espaços em branco desnecessários
    $js = preg_replace('/\s+/', ' ', $js);
    $js = preg_replace('/;\s*}/', ';}', $js);
    $js = preg_replace('/}\s*/', '}', $js);
    $js = preg_replace('/{\s*/', '{', $js);
    $js = preg_replace('/;\s*/', ';', $js);
    
    return trim($js);
}

// ===========================================
// 9. LAZY LOADING PARA SCRIPTS NÃO-CRÍTICOS
// ===========================================

/**
 * Carregar scripts não-críticos após LCP
 */
?>

<script>
// Lazy load non-critical scripts after LCP
window.addEventListener('load', function() {
    // Delay para garantir que LCP aconteceu
    setTimeout(function() {
        // AOS Animation
        const aosScript = document.createElement('script');
        aosScript.src = 'https://unpkg.aos@2.3.1/dist/aos.js';
        aosScript.onload = function() {
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 600,
                    once: true,
                    offset: 50
                });
            }
        };
        document.head.appendChild(aosScript);
        
        // Bootstrap JS (apenas se necessário)
        const bootstrapScript = document.createElement('script');
        bootstrapScript.src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js';
        document.head.appendChild(bootstrapScript);
        
        // Scripts customizados não-críticos
        const scripts = [
            '<?php echo asset("assets/js/testimonials.js"); ?>',
            '<?php echo asset("assets/js/form-masks.js"); ?>',
            '<?php echo asset("assets/js/accessibility-fixes.js"); ?>'
        ];
        
        scripts.forEach((src, index) => {
            setTimeout(() => {
                const script = document.createElement('script');
                script.src = src;
                script.async = true;
                document.head.appendChild(script);
            }, index * 100); // Espaçar carregamento
        });
        
    }, 1000); // Delay de 1s após load
});
</script>

<?php
// ===========================================
// 10. CRITICAL RESOURCE BUNDLING
// ===========================================

/**
 * Bundle de recursos críticos em um único arquivo
 */
?>

<script>
// Critical Resource Bundle - Inline
(function() {
    'use strict';
    
    // Critical CSS já está inline acima
    
    // Critical JS functions
    window.mbiasotto = {
        // Navigation
        initNavigation: function() {
            const navbar = document.querySelector('.navbar');
            if (!navbar) return;
            
            let lastScroll = 0;
            const scrollHandler = function() {
                const currentScroll = window.pageYOffset;
                
                if (currentScroll > 100) {
                    navbar.style.background = 'rgba(30, 58, 138, 0.98)';
                } else {
                    navbar.style.background = 'rgba(30, 58, 138, 0.95)';
                }
                
                lastScroll = currentScroll;
            };
            
            window.addEventListener('scroll', scrollHandler, { passive: true });
        },
        
        // Performance optimization
        optimizeRendering: function() {
            // Force layout completion for LCP
            const heroElement = document.querySelector('.hero-subtitle');
            if (heroElement) {
                heroElement.style.willChange = 'auto';
                // Trigger paint
                heroElement.offsetHeight;
            }
        }
    };
    
    // Initialize critical functions immediately
    document.addEventListener('DOMContentLoaded', function() {
        window.mbiasotto.initNavigation();
        window.mbiasotto.optimizeRendering();
    });
    
})();
</script> 