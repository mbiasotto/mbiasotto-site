<?php
/**
 * Configuração de páginas que precisam do reCAPTCHA
 * Centraliza a lógica para evitar duplicação
 */

/**
 * Lista de páginas que possuem formulários e precisam do reCAPTCHA
 */
function getPagesWithForms() {
    return [
        'contato',  // contato.php - formulário principal de contato
        'index'     // index.php - formulário rápido (quick-contact-form)
    ];
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