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
$pageTitle = $pageTitle ?? 'Programador PHP Freelancer Sorocaba - SP | Especialista Laravel & APIs';
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
    
    <!-- DNS Prefetch para melhor performance mobile -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//www.google-analytics.com">
    <link rel="dns-prefetch" href="//www.googletagmanager.com">
    
    <!-- Preconnect para recursos críticos -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Google Analytics 4 (otimizado para mobile - LCP) -->
    <script>
        // Delay Analytics para melhorar LCP (carrega após hero render)
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
                    content_group2: 'Programador PHP Freelancer',
                    send_page_view: true
                });
            };
        }
        
        // Mobile: Carrega Analytics após LCP (5s) ou interação do usuário
        <?php if (isMobile()): ?>
        setTimeout(loadGoogleAnalytics, 5000);
        ['scroll', 'click', 'touchstart'].forEach(event => {
            window.addEventListener(event, loadGoogleAnalytics, { once: true, passive: true });
        });
        <?php else: ?>
        // Desktop: Carrega mais rápido
        setTimeout(loadGoogleAnalytics, 2000);
        window.addEventListener('scroll', loadGoogleAnalytics, { once: true });
        <?php endif; ?>
    </script>
    <script>
        // Funções globais para Analytics (definidas quando o script carregar)
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        
        // Função para capturar eventos de conversão
        function trackConversion(action, category, label, value) {
            if (typeof gtag !== 'undefined') {
                gtag('event', action, {
                    event_category: category,
                    event_label: label,
                    value: value || 0
                });
            }
        }
    </script>
    
    <?php if ($needsRecaptcha): ?>
    <!-- Google reCAPTCHA v3 (carregado APENAS quando necessário - mobile optimization) -->
    <script>
        // Carregar reCAPTCHA sob demanda para melhorar LCP
        function loadRecaptcha() {
            if (window.recaptchaLoaded) return;
            window.recaptchaLoaded = true;
            
            const script = document.createElement('script');
            script.src = 'https://www.google.com/recaptcha/api.js?render=<?php echo $recaptcha_site_key; ?>';
            script.async = true;
            script.defer = true;
            document.head.appendChild(script);
        }
        
        // Mobile: Carrega reCAPTCHA apenas quando usuário interage com formulário
        <?php if (isMobile()): ?>
        document.addEventListener('DOMContentLoaded', function() {
            // Carregar apenas quando focar em campo de formulário
            const formInputs = document.querySelectorAll('input, textarea, select');
            formInputs.forEach(input => {
                input.addEventListener('focus', loadRecaptcha, { once: true });
            });
            
            // Fallback: carregar após 10s se não houver interação
            setTimeout(loadRecaptcha, 10000);
        });
        <?php else: ?>
        // Desktop: Carrega mais cedo
        window.addEventListener('load', function() {
            setTimeout(loadRecaptcha, 3000);
        });
        <?php endif; ?>
    </script>
    <script>
        // reCAPTCHA v3 Setup
        function initRecaptcha() {
            if (typeof grecaptcha !== 'undefined') {
                grecaptcha.ready(function() {
                    // Gerar token inicial para a página
                    grecaptcha.execute('<?php echo $recaptcha_site_key; ?>', {action: 'page_load'})
                        .then(function(token) {
                            console.log('reCAPTCHA v3: Page token generated for <?php echo $currentPage; ?>');
                        })
                        .catch(function(error) {
                            console.error('Erro ao gerar token inicial reCAPTCHA:', error);
                        });
                });
            } else {
                console.warn('reCAPTCHA não carregado, tentando novamente em 2 segundos...');
                setTimeout(initRecaptcha, 2000);
            }
        }
        
        // Tentar inicializar o reCAPTCHA quando a página carregar
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initRecaptcha);
        } else {
            initRecaptcha();
        }

        // Função para executar reCAPTCHA em formulários
        function executeRecaptcha(action, callback) {
            // Verificar se grecaptcha está disponível
            if (typeof grecaptcha === 'undefined') {
                console.error('reCAPTCHA não carregado');
                
                // Tentar recarregar o script
                var script = document.createElement('script');
                script.src = 'https://www.google.com/recaptcha/api.js?render=<?php echo $recaptcha_site_key; ?>';
                script.onload = function() {
                    setTimeout(function() {
                        executeRecaptcha(action, callback);
                    }, 1000);
                };
                script.onerror = function() {
                    console.error('Erro ao carregar reCAPTCHA');
                    if (callback) callback('error_loading_recaptcha');
                };
                document.head.appendChild(script);
                return;
            }

            grecaptcha.ready(function() {
                grecaptcha.execute('<?php echo $recaptcha_site_key; ?>', {action: action})
                    .then(function(token) {
                        if (callback && typeof callback === 'function') {
                            callback(token);
                        }
                        
                        // Track no Google Analytics
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'recaptcha_executed', {
                                event_category: 'Security',
                                event_label: action,
                                recaptcha_action: action
                            });
                        }
                        
                        console.log('reCAPTCHA v3: Token generated for action:', action);
                    })
                    .catch(function(error) {
                        console.error('Erro reCAPTCHA:', error);
                        if (callback) callback('error_generating_token');
                    });
            });
        }

        // Função para submeter formulário com reCAPTCHA
        function submitFormWithRecaptcha(formElement, action = 'contact_form') {
            executeRecaptcha(action, function(token) {
                // Adicionar token ao formulário
                let tokenInput = formElement.querySelector('input[name="recaptcha_token"]');
                if (!tokenInput) {
                    tokenInput = document.createElement('input');
                    tokenInput.type = 'hidden';
                    tokenInput.name = 'recaptcha_token';
                    formElement.appendChild(tokenInput);
                }
                tokenInput.value = token;

                // Adicionar action ao formulário
                let actionInput = formElement.querySelector('input[name="recaptcha_action"]');
                if (!actionInput) {
                    actionInput = document.createElement('input');
                    actionInput.type = 'hidden';
                    actionInput.name = 'recaptcha_action';
                    formElement.appendChild(actionInput);
                }
                actionInput.value = action;

                // Submeter formulário
                formElement.submit();
            });
        }
    </script>
    <?php else: ?>
    <script>
        // Funções stub para páginas sem reCAPTCHA (evita erros JavaScript)
        function executeRecaptcha(action, callback) {
            console.warn('reCAPTCHA não carregado nesta página (sem formulários)');
            if (callback) callback('no_recaptcha_needed');
        }
        
        function submitFormWithRecaptcha(formElement, action = 'contact_form') {
            console.warn('submitFormWithRecaptcha chamado em página sem reCAPTCHA');
            formElement.submit();
        }
    </script>
    <?php endif; ?>
    
    <!-- Meta tags essenciais -->
    <title><?php echo $pageTitle; ?> - Sorocaba, SP</title>
    <meta name="description" content="<?php echo $pageDescription; ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo $canonicalUrl; ?>">
    
    <!-- Open Graph básico -->
    <meta property="og:title" content="<?php echo $pageTitle; ?>">
    <meta property="og:description" content="<?php echo $pageDescription; ?>">
    <meta property="og:url" content="<?php echo $canonicalUrl; ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo asset('assets/images/favicon.png'); ?>">
    
    <!-- Preload resources -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo asset('assets/css/style.css'); ?>">
    
    <!-- Schema.org básico -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Maurício Biasotto",
        "jobTitle": "Programador PHP Freelancer",
        "url": "<?php echo url(); ?>",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Sorocaba",
            "addressRegion": "SP",
            "addressCountry": "BR"
        }
    }
    </script>

</head>
<body itemscope itemtype="https://schema.org/WebPage">
 