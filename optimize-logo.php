<?php
/**
 * Script para otimizar logo e reduzir de 11.8KB para ~2KB
 * Substitui a imagem PNG por SVG inline otimizado
 */

// SVG otimizado do logo como string inline
$optimizedLogoSVG = '
<svg width="200" height="60" viewBox="0 0 200 60" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:1" />
            <stop offset="100%" style="stop-color:#1e3a8a;stop-opacity:1" />
        </linearGradient>
    </defs>
    
    <!-- Background rounded rectangle -->
    <rect x="2" y="2" width="196" height="56" rx="8" ry="8" fill="url(#logoGradient)" stroke="#ffffff" stroke-width="0.5"/>
    
    <!-- Text: MB -->
    <text x="35" y="40" font-family="Manrope, Arial, sans-serif" font-size="28" font-weight="700" fill="#ffffff">MB</text>
    
    <!-- Text: Maurício Biasotto -->
    <text x="75" y="25" font-family="Inter, Arial, sans-serif" font-size="11" font-weight="600" fill="#ffffff">Maurício Biasotto</text>
    
    <!-- Text: PHP Developer -->
    <text x="75" y="40" font-family="Inter, Arial, sans-serif" font-size="9" font-weight="400" fill="#e2e8f0">Programador PHP</text>
    
    <!-- Text: Freelancer -->
    <text x="75" y="52" font-family="Inter, Arial, sans-serif" font-size="8" font-weight="300" fill="#cbd5e1">Freelancer</text>
    
    <!-- Icon: Code symbol -->
    <path d="M15 20 L25 30 L15 40 M25 20 L15 30 L25 40" stroke="#ffffff" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
</svg>';

// Função para inserir o SVG otimizado no header
function getOptimizedLogo($classes = '', $style = '') {
    global $optimizedLogoSVG;
    
    $optimizedSVG = str_replace(
        '<svg',
        '<svg class="' . $classes . '" style="' . $style . '"',
        $optimizedLogoSVG
    );
    
    return trim($optimizedSVG);
}

// Função para logo mobile ainda mais compacto
function getOptimizedLogoMobile() {
    return '
    <svg width="120" height="40" viewBox="0 0 120 40" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient id="logoGradientMobile" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:1" />
                <stop offset="100%" style="stop-color:#1e3a8a;stop-opacity:1" />
            </linearGradient>
        </defs>
        
        <rect x="1" y="1" width="118" height="38" rx="6" ry="6" fill="url(#logoGradientMobile)" stroke="#ffffff" stroke-width="0.5"/>
        
        <!-- Simplified MB -->
        <text x="20" y="28" font-family="Manrope, Arial, sans-serif" font-size="20" font-weight="700" fill="#ffffff">MB</text>
        
        <!-- Simplified name -->
        <text x="45" y="18" font-family="Inter, Arial, sans-serif" font-size="8" font-weight="600" fill="#ffffff">M. Biasotto</text>
        <text x="45" y="28" font-family="Inter, Arial, sans-serif" font-size="7" font-weight="400" fill="#e2e8f0">PHP Dev</text>
        
        <!-- Simple code icon -->
        <path d="M10 12 L16 18 L10 24 M16 12 L10 18 L16 24" stroke="#ffffff" stroke-width="1.5" fill="none" stroke-linecap="round"/>
    </svg>';
}

// Função para logo navbar (ainda menor)
function getOptimizedLogoNavbar() {
    return '
    <svg width="80" height="30" viewBox="0 0 80 30" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient id="logoGradientNav" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" style="stop-color:#ffffff;stop-opacity:0.95" />
                <stop offset="100%" style="stop-color:#e2e8f0;stop-opacity:0.9" />
            </linearGradient>
        </defs>
        
        <rect x="1" y="1" width="78" height="28" rx="4" ry="4" fill="url(#logoGradientNav)" stroke="rgba(255,255,255,0.3)" stroke-width="0.5"/>
        
        <text x="12" y="20" font-family="Manrope, Arial, sans-serif" font-size="14" font-weight="700" fill="#1e3a8a">MB</text>
        <text x="30" y="13" font-family="Inter, Arial, sans-serif" font-size="6" font-weight="600" fill="#3b82f6">M. Biasotto</text>
        <text x="30" y="20" font-family="Inter, Arial, sans-serif" font-size="5" font-weight="400" fill="#64748b">PHP</text>
        
        <path d="M6 8 L10 12 L6 16 M10 8 L6 12 L10 16" stroke="#3b82f6" stroke-width="1" fill="none"/>
    </svg>';
}

// CSS para otimização do logo
$logoOptimizationCSS = '
<style>
/* Logo optimization */
.optimized-logo {
    width: auto;
    height: 60px;
    max-width: 200px;
}

.optimized-logo-mobile {
    width: auto;
    height: 40px;
    max-width: 120px;
}

.optimized-logo-navbar {
    width: auto;
    height: 30px;
    max-width: 80px;
}

/* Responsive logo behavior */
@media (max-width: 768px) {
    .optimized-logo {
        height: 40px;
        max-width: 120px;
    }
}

@media (max-width: 576px) {
    .optimized-logo {
        height: 30px;
        max-width: 80px;
    }
}

/* Performance optimization for SVG logos */
.optimized-logo,
.optimized-logo-mobile,
.optimized-logo-navbar {
    display: inline-block;
    vertical-align: middle;
    will-change: auto;
    transform: translateZ(0);
}

/* Loading states */
.loading-logo-img {
    opacity: 0;
    transition: opacity 0.3s ease;
}

.loading-logo-img.loaded {
    opacity: 1;
}
</style>';

// Exemplo de uso no header
function renderOptimizedHeader() {
    global $logoOptimizationCSS;
    
    echo $logoOptimizationCSS;
    echo '
    <!-- Logo otimizado no navbar -->
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="/">
                ' . getOptimizedLogoNavbar() . '
            </a>
        </div>
    </nav>
    
    <!-- Logo otimizado no hero -->
    <section class="hero-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    ' . getOptimizedLogo('optimized-logo mb-4') . '
                    <h1 class="hero-title">Programador PHP Freelancer</h1>
                    <p class="hero-subtitle">Desenvolvimento profissional em PHP, Framework Laravel, APIs e automações</p>
                </div>
            </div>
        </div>
    </section>
    ';
}

// Função para substituir logos existentes
function replacePNGWithSVG() {
    echo '
    <script>
    // Substituir logos PNG por SVG otimizado
    document.addEventListener("DOMContentLoaded", function() {
        const pngLogos = document.querySelectorAll("img[src*=\"logo-white.png\"], img[src*=\"logo.png\"]");
        
        pngLogos.forEach(function(img) {
            const isMobile = window.innerWidth <= 768;
            const isNavbar = img.closest(".navbar") !== null;
            
            let svgContent;
            if (isNavbar) {
                svgContent = `' . addslashes(getOptimizedLogoNavbar()) . '`;
            } else if (isMobile) {
                svgContent = `' . addslashes(getOptimizedLogoMobile()) . '`;
            } else {
                svgContent = `' . addslashes(getOptimizedLogo()) . '`;
            }
            
            const tempDiv = document.createElement("div");
            tempDiv.innerHTML = svgContent;
            const svg = tempDiv.firstElementChild;
            
            // Copiar classes e atributos
            if (img.className) svg.className = img.className;
            if (img.alt) svg.setAttribute("aria-label", img.alt);
            
            // Substituir
            img.parentNode.replaceChild(svg, img);
        });
    });
    </script>
    ';
}

// Auto-execução se chamado diretamente
if (basename(__FILE__) === basename($_SERVER['SCRIPT_NAME'])) {
    header('Content-Type: text/html; charset=UTF-8');
    echo "<!DOCTYPE html>\n<html><head><title>Logo Otimizado</title></head><body>";
    renderOptimizedHeader();
    replacePNGWithSVG();
    echo "</body></html>";
}
?> 