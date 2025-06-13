<?php
/**
 * Configuração de páginas que precisam do reCAPTCHA
 * Centraliza a lógica para evitar duplicação
 */

/**
 * Lista de páginas que possuem formulários e precisam do reCAPTCHA
 */
function getPagesWithForms() {
    // Páginas fixas
    $pages = [
        'contato',  // contato.php - formulário principal de contato
        'index',    // index.php - formulário rápido (quick-contact-form)
        'desenvolvimento-php',
        'framework-laravel',
        'desenvolvimento-sites',
        'desenvolvimento-app',
        'construcao-apis',
        'desenvolvimento-sistemas',
        'automacoes-n8n-ia',
        'identidade-visual',
        'otimizacao-seo',
        'consultoria-tecnologia'
    ];
    // Incluir todas as matérias (longtail)
    if (function_exists('getAllLongtailPages')) {
        $materias = array_keys(getAllLongtailPages());
        $pages = array_merge($pages, $materias);
    } else {
        // fallback: tentar incluir config
        if (file_exists(__DIR__ . '/longtail-config.php')) {
            require_once __DIR__ . '/longtail-config.php';
            if (function_exists('getAllLongtailPages')) {
                $materias = array_keys(getAllLongtailPages());
                $pages = array_merge($pages, $materias);
            }
        }
    }
    return $pages;
}

/**
 * Verifica se a página atual precisa do reCAPTCHA
 * 
 * @return bool
 */
function needsRecaptcha() {
    $currentPage = basename($_SERVER['PHP_SELF'], '.php');
    $pagesWithForms = getPagesWithForms();
    
    return in_array($currentPage, $pagesWithForms);
}

/**
 * Obter o nome da página atual
 * 
 * @return string
 */
function getCurrentPage() {
    return basename($_SERVER['PHP_SELF'], '.php');
}

/**
 * Listar páginas com formulários para debug
 * 
 * @return array
 */
function debugRecaptchaPages() {
    return [
        'current_page' => getCurrentPage(),
        'pages_with_forms' => getPagesWithForms(),
        'needs_recaptcha' => needsRecaptcha(),
        'recaptcha_site_key' => defined('RECAPTCHA_SITE_KEY') ? RECAPTCHA_SITE_KEY : 'NOT_DEFINED'
    ];
}
?>