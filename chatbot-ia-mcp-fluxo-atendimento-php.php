<?php
// Include config first
require_once 'includes/config.php';
require_once 'includes/longtail-config.php';

// Obter dados da página
$pageData = getLongtailPage('chatbot-ia-mcp-fluxo-atendimento-php');

if (!$pageData) {
    header('HTTP/1.0 404 Not Found');
    include '404.php';
    exit;
}

// Configurações da página
$pageTitle = $pageData['meta_title'];
$pageDescription = $pageData['meta_description'];
$pageKeywords = $pageData['keywords'];

// Include header
include 'includes/header.php';
include 'includes/navigation.php';

// Include template
include 'components/materia-template.php';

include 'includes/footer.php';
?> 