<?php
/**
 * Configuração automática de caminhos
 * Funciona tanto em localhost/subpasta quanto em produção
 */

// Detectar automaticamente o caminho base
function getBasePath() {
    $scriptName = $_SERVER['SCRIPT_NAME'];
    $pathInfo = pathinfo($scriptName);
    $basePath = $pathInfo['dirname'];
    
    // Se estiver na pasta raiz, basePath será '/'
    if ($basePath === '/' || $basePath === '\\') {
        return '';
    }
    
    // Remove barras duplas e normaliza
    $basePath = str_replace('\\', '/', $basePath);
    $basePath = rtrim($basePath, '/');
    
    return $basePath;
}

// Função para criar URLs
function url($path = '') {
    $basePath = getBasePath();
    $path = ltrim($path, '/');
    
    if (empty($path)) {
        return $basePath . '/';
    }
    
    return $basePath . '/' . $path;
}

// Função para assets (CSS, JS, imagens)
function asset($path) {
    $basePath = getBasePath();
    $path = ltrim($path, '/');
    return $basePath . '/' . $path;
}

// === FUNÇÕES DE PERFORMANCE MOBILE ===

// Função para detectar dispositivos móveis
function isMobile() {
    return isset($_SERVER['HTTP_USER_AGENT']) && 
           preg_match('/(android|iphone|ipad|mobile|tablet|blackberry|windows phone)/i', $_SERVER['HTTP_USER_AGENT']);
}

// Função para carregar CSS otimizado (resolve LCP de 6.1s)
function loadOptimizedCSS() {
    if (isMobile()) {
        // CSS crítico inline primeiro (above-the-fold)
        if (file_exists(__DIR__ . '/critical-css-mobile.php')) {
            include __DIR__ . '/critical-css-mobile.php';
        }
        
        // CSS não crítico com lazy loading
        echo '<link rel="preload" href="' . asset('assets/css/style.css') . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'" id="main-styles">';
        echo '<noscript><link rel="stylesheet" href="' . asset('assets/css/style.css') . '"></noscript>';
        
        // CSS externo com preload
        echo '<link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
        echo '<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
        
    } else {
        // Desktop - carregamento normal
        echo '<link rel="stylesheet" href="' . asset('assets/css/style.css') . '">';
        echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">';
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">';
    }
}

// Função para carregar JavaScript otimizado
function loadOptimizedJS() {
    if (isMobile()) {
        // JS crítico apenas
        echo '<script src="' . asset('assets/js/main.js') . '" defer></script>';
        echo '<script src="' . asset('assets/js/navbar-scroll.js') . '" defer></script>';
        
        // JS não crítico em background
        echo '<script>
        window.addEventListener("load", function() {
            setTimeout(function() {
                var scripts = [
                    "' . asset('assets/js/form-masks.js') . '",
                    "' . asset('assets/js/analytics-events.js') . '"
                ];
                scripts.forEach(function(src) {
                    var script = document.createElement("script");
                    script.src = src;
                    script.defer = true;
                    document.head.appendChild(script);
                });
            }, 1000);
        });
        </script>';
    } else {
        // Desktop - carregamento normal
        echo '<script src="' . asset('assets/js/main.js') . '" defer></script>';
        echo '<script src="' . asset('assets/js/navbar-scroll.js') . '" defer></script>';
        echo '<script src="' . asset('assets/js/form-masks.js') . '" defer></script>';
        echo '<script src="' . asset('assets/js/analytics-events.js') . '" defer></script>';
    }
}

// Constantes úteis
define('BASE_PATH', getBasePath());
define('BASE_URL', url());
?> 