<?php
/**
 * ==============================================
 * Configuration Example File
 * Programador PHP Freelancer - mbiasotto.com
 * ==============================================
 * 
 * IMPORTANTE: Este arquivo serve apenas como exemplo!
 * Copie para includes/config-local.php e configure com seus valores reais.
 * NUNCA commite arquivos com credenciais reais no Git!
 */

// ==============================================
// CONFIGURAÇÕES BÁSICAS
// ==============================================

// Ambiente (local, development, staging, production)
define('APP_ENV', 'production');
define('APP_DEBUG', false);
define('APP_URL', 'https://mbiasotto.com');

// Timezone
date_default_timezone_set('America/Sao_Paulo');

// ==============================================
// BANCO DE DADOS (se usar)
// ==============================================

/*
define('DB_HOST', 'localhost');
define('DB_PORT', 3306);
define('DB_DATABASE', 'seu_database');
define('DB_USERNAME', 'seu_usuario');
define('DB_PASSWORD', 'sua_senha_super_segura');
*/

// ==============================================
// EMAIL/SMTP
// ==============================================

// Configurações SMTP
define('MAIL_HOST', 'smtp.gmail.com');
define('MAIL_PORT', 587);
define('MAIL_USERNAME', 'seu.email@gmail.com');
define('MAIL_PASSWORD', 'sua_senha_ou_app_password');
define('MAIL_ENCRYPTION', 'tls');

// Email remetente padrão
define('MAIL_FROM_ADDRESS', 'mauricio@mbiasotto.com');
define('MAIL_FROM_NAME', 'Maurício Biasotto - Programador PHP');

// Email destino para formulários
define('CONTACT_EMAIL', 'mauricio@mbiasotto.com');

// ==============================================
// GOOGLE SERVICES
// ==============================================

// Google Analytics 4
define('GOOGLE_ANALYTICS_ID', 'G-RGVCBGF67P');

// Google reCAPTCHA v3 (já configurado no projeto)
define('RECAPTCHA_SITE_KEY', '6LebUF0rAAAAAH2K0WX2mVhxUugPn8pPAbtEQiqQ');
define('RECAPTCHA_SECRET_KEY', '6LebUF0rAAAAAGAjrNvLdyyxeg944MZ1Boy-rkJX');

// ==============================================
// APIS EXTERNAS
// ==============================================

// WhatsApp Business API (se usar)
// define('WHATSAPP_TOKEN', 'seu_token_whatsapp');
define('WHATSAPP_PHONE', '5515981187063');

// ==============================================
// SEGURANÇA
// ==============================================

// Chave de criptografia (gerar com: openssl rand -base64 32)
// define('APP_KEY', 'base64:sua_chave_de_32_caracteres_aqui');

// Rate Limiting
define('RATE_LIMIT_ATTEMPTS', 5);
define('RATE_LIMIT_WINDOW', 60); // segundos

// reCAPTCHA Score mínimo
define('RECAPTCHA_MIN_SCORE', 0.5);

// ==============================================
// SOCIAL MEDIA
// ==============================================

// URLs das redes sociais
define('GITHUB_URL', 'https://github.com/mbiasotto');
define('LINKEDIN_URL', 'https://www.linkedin.com/in/mauriciobiasotto/');
define('INSTAGRAM_URL', 'https://www.instagram.com/mbiasotto/');

// ==============================================
// CONFIGURAÇÕES DE PRODUÇÃO
// ==============================================

// Error Reporting (configurar adequadamente)
if (APP_ENV === 'production') {
    error_reporting(0);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

// Performance
ini_set('memory_limit', '256M');
ini_set('max_execution_time', '30');
ini_set('upload_max_filesize', '10M');

// ==============================================
// HELPER FUNCTIONS
// ==============================================

/**
 * Função para URLs do site
 */
function url($path = '') {
    $baseUrl = rtrim(APP_URL, '/');
    $path = ltrim($path, '/');
    return $path ? $baseUrl . '/' . $path : $baseUrl;
}

/**
 * Função para assets
 */
function asset($path) {
    return url($path);
}

/**
 * Função para obter configuração com fallback
 */
function config($key, $default = null) {
    return defined($key) ? constant($key) : $default;
}

/**
 * Função para verificar se é ambiente de produção
 */
function isProduction() {
    return APP_ENV === 'production';
}

/**
 * Função para verificar se é ambiente local
 */
function isLocal() {
    return APP_ENV === 'local';
}

// ==============================================
// VALIDAÇÕES DE SEGURANÇA
// ==============================================

// Verificar se HTTPS está ativado em produção
if (isProduction() && !isset($_SERVER['HTTPS'])) {
    // Redirecionar para HTTPS se necessário
    // header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], true, 301);
    // exit;
}

// Headers de segurança
if (isProduction()) {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: DENY');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    
    // CSP básico (ajustar conforme necessário)
    header("Content-Security-Policy: default-src 'self' 'unsafe-inline' 'unsafe-eval' *.google.com *.googleapis.com *.gstatic.com *.googletagmanager.com *.google-analytics.com data: blob:;");
}

// ==============================================
// NOTAS IMPORTANTES
// ==============================================

/*
INSTRUÇÕES DE USO:

1. Copie este arquivo para includes/config-local.php
2. Configure os valores reais (senhas, chaves, etc.)
3. NUNCA commite o arquivo config-local.php
4. Use senhas fortes e únicas
5. Rotacione chaves regularmente
6. Use HTTPS sempre em produção
7. Configure firewall no servidor
8. Monitore logs regularmente

PARA GERAR CHAVES SEGURAS:
- openssl rand -base64 32
- Use geradores de senha seguros
- Configure 2FA sempre que possível
*/
?> 