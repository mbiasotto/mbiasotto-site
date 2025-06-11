<?php
// Incluir configurações
include_once 'includes/config.php';

// Iniciar session antes de qualquer output
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Gerar CSRF token se não existir
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Configurações padrão da página - Otimizado para SEO
$pageTitle = $pageTitle ?? 'Programador PHP Freelancer Sorocaba SP | Especialista Laravel & APIs';
$pageDescription = $pageDescription ?? 'Programador PHP freelancer em Sorocaba SP com +20 anos experiência. Desenvolvimento Laravel, APIs REST, automações n8n e sistemas web sob demanda. Orçamento gratuito!';
$pageKeywords = $pageKeywords ?? 'programador php freelancer, desenvolvedor php, desenvolvimento php sob demanda, manutenção sistemas php, especialista php, freelancer php brasil, integração api php, laravel freelancer, programador php sorocaba';
$canonicalUrl = $canonicalUrl ?? url();

// Incluir configuração de páginas com reCAPTCHA
require_once __DIR__ . '/recaptcha-pages.php';

// SEO: Determinar tipo de página para structured data otimizado
$currentPage = getCurrentPage();
$isServicePage = in_array($currentPage, ['servicos', 'programador-php-freelancer']);
$isContactPage = $currentPage === 'contato';

// Determinar se a página precisa do reCAPTCHA (centralizado)
$needsRecaptcha = needsRecaptcha();

// reCAPTCHA v3 Configuration
$recaptcha_site_key = '6LebUF0rAAAAAH2K0WX2mVhxUugPn8pPAbtEQiqQ';
?>
<!DOCTYPE html>
<html lang="pt-BR" itemscope itemtype="https://schema.org/WebPage">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== CRITICAL CSS INLINE ===== -->
    <style>
        /* Critical CSS para LCP - Hero Section */
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
            font-family: "Manrope", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        
        .hero-subtitle {
            font-size: 1.25rem;
            font-weight: 300;
            line-height: 1.6;
            margin-bottom: 2rem;
            color: rgba(255, 255, 255, 0.9);
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        
        /* Layout crítico */
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
        
        /* Navigation crítica */
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
        
        /* Otimizações mobile críticas */
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
        
        /* Loading prevention */
        .hero-subtitle {
            will-change: auto;
            transform: translateZ(0);
        }
    </style>
    
    <!-- ===== PRELOAD CRITICAL RESOURCES ===== -->
    <!-- Preconnect para fontes críticas -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Preload fontes críticas -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap"></noscript>
    
    <!-- Preload CSS próprio -->
    <link rel="preload" href="<?php echo asset('assets/css/style.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?php echo asset('assets/css/style.css'); ?>"></noscript>
    
    <!-- ===== DEFER NON-CRITICAL CSS ===== -->
    <script>
        // Função para carregar CSS não-crítico
        function loadCSS(href, media) {
            const link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = href;
            link.media = media || 'all';
            document.head.appendChild(link);
        }
        
        // Carregar CSS não-crítico após LCP
        window.addEventListener('load', function() {
            // Bootstrap - apenas após carregamento
            loadCSS('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
            
            // Font Awesome - apenas após carregamento  
            loadCSS('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
            
            // AOS - não crítico
            loadCSS('https://unpkg.aos@2.3.1/dist/aos.css');
            
            // Accessibility fixes
            loadCSS('<?php echo asset('assets/css/accessibility-fixes.css'); ?>');
        });
    </script>
    
    <!-- ===== ANALYTICS OTIMIZADO ===== -->
    <script>
        // Analytics com delay para melhorar LCP
        function loadGoogleAnalytics() {
            if (window.analyticsLoaded) return;
            window.analyticsLoaded = true;
            
            const script = document.createElement('script');
            script.async = true;
            script.src = 'https://www.googletagmanager.com/gtag/js?id=G-RGVCBGF67P';
            document.head.appendChild(script);
            
            script.onload = function() {
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', 'G-RGVCBGF67P', {
                    page_title: '<?php echo addslashes($pageTitle); ?>',
                    page_location: '<?php echo $canonicalUrl; ?>',
                    content_group1: '<?php echo ucfirst($currentPage); ?>',
                    send_page_view: true
                });
            };
        }
        
        // Mobile: Carregar Analytics após 3s ou interação
        <?php if (isMobile()): ?>
        setTimeout(loadGoogleAnalytics, 3000);
        ['scroll', 'click', 'touchstart'].forEach(event => {
            window.addEventListener(event, loadGoogleAnalytics, { once: true, passive: true });
        });
        <?php else: ?>
        // Desktop: Carregar mais rápido
        setTimeout(loadGoogleAnalytics, 1500);
        window.addEventListener('scroll', loadGoogleAnalytics, { once: true });
        <?php endif; ?>
    </script>
    
    <!-- ===== META TAGS OTIMIZADAS ===== -->
    <title><?php echo $pageTitle; ?></title>
    <meta name="description" content="<?php echo $pageDescription; ?>">
    <meta name="keywords" content="<?php echo $pageKeywords; ?>">
    <meta name="author" content="Maurício Biasotto - Programador PHP Freelancer">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="<?php echo $canonicalUrl; ?>">
    
    <!-- SEO: Geo-targeting para Sorocaba SP -->
    <meta name="geo.region" content="BR-SP">
    <meta name="geo.placename" content="Sorocaba">
    <meta name="geo.position" content="-23.5015;-47.4526">
    <meta name="ICBM" content="-23.5015, -47.4526">
    
    <!-- SEO: Open Graph otimizado -->
    <meta property="og:title" content="<?php echo $pageTitle; ?>">
    <meta property="og:description" content="<?php echo $pageDescription; ?>">
    <meta property="og:type" content="<?php echo $isServicePage ? 'service' : 'website'; ?>">
    <meta property="og:url" content="<?php echo $canonicalUrl; ?>">
    <meta property="og:image" content="<?php echo url('assets/images/og-programador-php-freelancer.jpg'); ?>">
    <meta property="og:image:alt" content="Maurício Biasotto - Programador PHP Freelancer Sorocaba SP">
    <meta property="og:site_name" content="DevPHP Solutions - Programador PHP Freelancer">
    <meta property="og:locale" content="pt_BR">
    
    <!-- SEO: Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $pageTitle; ?>">
    <meta name="twitter:description" content="<?php echo $pageDescription; ?>">
    <meta name="twitter:image" content="<?php echo url('assets/images/twitter-programador-php.jpg'); ?>">
    <meta name="twitter:creator" content="@mbiasotto">
    
    <!-- ===== FAVICON OTIMIZADO ===== -->
    <link rel="icon" type="image/png" href="<?php echo asset('assets/images/favicon.png'); ?>" sizes="32x32">
    <link rel="apple-touch-icon" href="<?php echo asset('assets/images/favicon.png'); ?>">
    
    <!-- ===== RESOURCE HINTS ===== -->
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="//unpkg.com">
    
    <!-- Prefetch páginas importantes -->
    <link rel="prefetch" href="<?php echo url('contato'); ?>">
    <link rel="prefetch" href="<?php echo url('servicos'); ?>">
    
    <!-- ===== RECAPTCHA OTIMIZADO ===== -->
    <?php if ($needsRecaptcha): ?>
    <script>
        // reCAPTCHA carregado apenas quando necessário
        function loadRecaptcha() {
            if (window.recaptchaLoaded) return;
            window.recaptchaLoaded = true;
            
            const script = document.createElement('script');
            script.src = 'https://www.google.com/recaptcha/api.js?render=<?php echo $recaptcha_site_key; ?>';
            script.async = true;
            document.head.appendChild(script);
        }
        
        // Carregar reCAPTCHA ao interagir com formulário
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('focus', loadRecaptcha, { once: true });
                form.addEventListener('click', loadRecaptcha, { once: true });
            });
        });
        
        function executeRecaptcha(action, callback) {
            if (typeof grecaptcha !== 'undefined') {
                grecaptcha.ready(function() {
                    grecaptcha.execute('<?php echo $recaptcha_site_key; ?>', {action: action}).then(callback);
                });
            } else {
                loadRecaptcha();
                setTimeout(() => executeRecaptcha(action, callback), 1000);
            }
        }
    </script>
    <?php endif; ?>
    
    <!-- ===== CRITICAL JAVASCRIPT INLINE ===== -->
    <script>
        // Performance critical functions
        (function() {
            'use strict';
            
            // Critical navigation
            window.mbiasotto = {
                initNavigation: function() {
                    const navbar = document.querySelector('.navbar');
                    if (!navbar) return;
                    
                    let ticking = false;
                    const scrollHandler = function() {
                        if (!ticking) {
                            requestAnimationFrame(function() {
                                const currentScroll = window.pageYOffset;
                                
                                if (currentScroll > 100) {
                                    navbar.style.background = 'rgba(30, 58, 138, 0.98)';
                                } else {
                                    navbar.style.background = 'rgba(30, 58, 138, 0.95)';
                                }
                                ticking = false;
                            });
                            ticking = true;
                        }
                    };
                    
                    window.addEventListener('scroll', scrollHandler, { passive: true });
                },
                
                optimizeLCP: function() {
                    // Force layout completion for LCP element
                    const heroElement = document.querySelector('.hero-subtitle');
                    if (heroElement) {
                        heroElement.style.willChange = 'auto';
                        heroElement.offsetHeight; // Force layout
                    }
                }
            };
            
            // Initialize immediately
            document.addEventListener('DOMContentLoaded', function() {
                window.mbiasotto.initNavigation();
                window.mbiasotto.optimizeLCP();
            });
            
        })();
    </script>
    
    <!-- ===== SCHEMA.ORG OTIMIZADO ===== -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Maurício Biasotto",
        "jobTitle": "Programador PHP Freelancer",
        "description": "Desenvolvedor PHP freelancer especializado em Laravel, APIs REST e automações",
        "url": "<?php echo url(); ?>",
        "sameAs": [
            "https://www.linkedin.com/in/mauriciobiasotto/",
            "https://github.com/mbiasotto"
        ],
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Sorocaba",
            "addressRegion": "SP",
            "addressCountry": "BR"
        },
        "offers": {
            "@type": "Offer",
            "itemOffered": {
                "@type": "Service",
                "name": "Desenvolvimento PHP",
                "description": "Desenvolvimento de aplicações web com PHP e Laravel"
            }
        }
    }
    </script>
</head>
<body itemscope itemtype="https://schema.org/WebPage">
    <!-- Loading spinner crítico -->
    <div id="loading-spinner" style="position:fixed;top:0;left:0;width:100%;height:100%;background:#1e3a8a;z-index:9999;display:flex;align-items:center;justify-content:center;">
        <div style="color:white;font-size:1.2rem;font-family:Inter,sans-serif;">Carregando...</div>
    </div>
    
    <script>
        // Remove loading spinner após LCP
        window.addEventListener('load', function() {
            const spinner = document.getElementById('loading-spinner');
            if (spinner) {
                spinner.style.opacity = '0';
                spinner.style.transition = 'opacity 0.3s ease';
                setTimeout(() => {
                    spinner.remove();
                }, 300);
            }
        });
    </script>
</body>
</html> 