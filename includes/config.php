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

// Constantes úteis
define('BASE_PATH', getBasePath());
define('BASE_URL', url());
?> 