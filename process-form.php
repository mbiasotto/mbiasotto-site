<?php
require_once 'includes/config.php';
require_once 'includes/mail-config.php';
require_once 'includes/recaptcha-config.php';

// Verificar se é uma requisição POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . url(''));
    exit;
}

// Verificar se é uma requisição AJAX
$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
          strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

try {
    // Validações básicas de segurança
    if (empty($_POST)) {
        throw new Exception('Dados não recebidos');
    }
    
    // Verificação de CSRF (básica)
    session_start();
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'] ?? '', $_POST['csrf_token'])) {
        throw new Exception('Token de segurança inválido');
    }
    
    // Verificação de honeypot (anti-spam)
    if (!empty($_POST['website'])) {
        throw new Exception('Spam detectado');
    }
    
    // Verificação do reCAPTCHA v3 (com bypass para problemas de conectividade)
    $bypassRecaptcha = isset($_POST['recaptcha_bypass']) && $_POST['recaptcha_bypass'] === '1';
    
    if (!$bypassRecaptcha) {
        $recaptchaResult = processRecaptchaSubmission($_POST);
        if (!$recaptchaResult['success']) {
            // Log do erro para debug
            error_log("Erro reCAPTCHA: " . $recaptchaResult['error'] . " - IP: " . $_SERVER['REMOTE_ADDR']);
            
            // Mensagem mais amigável para problemas de conexão
            if (strpos($recaptchaResult['error'], 'conectar') !== false) {
                throw new Exception('Erro temporário na verificação de segurança. Tente novamente em alguns segundos.');
            }
            
            throw new Exception('Erro na verificação de segurança: ' . $recaptchaResult['error']);
        }
        
        if (!$recaptchaResult['is_human']) {
            error_log("reCAPTCHA score baixo: " . $recaptchaResult['score'] . " - IP: " . $_SERVER['REMOTE_ADDR']);
            throw new Exception('Score de segurança muito baixo. Tente novamente.');
        }
    } else {
        // Log quando bypass é usado
        error_log("reCAPTCHA bypass usado devido a problemas de conectividade - IP: " . $_SERVER['REMOTE_ADDR']);
        
        // Validações de segurança alternativas quando reCAPTCHA falha
        // Verificar rate limiting mais rigoroso
        if (file_exists($ipFile)) {
            $lastSubmit = file_get_contents($ipFile);
            if (time() - $lastSubmit < 300) { // 5 minutos entre envios quando sem reCAPTCHA
                throw new Exception('Aguarde 5 minutos antes de enviar outro formulário (sistema de segurança temporariamente indisponível)');
            }
        }
    }
    
    // Rate limiting removido a pedido do cliente
    $ipFile = 'tmp/rate_limit_' . md5($_SERVER['REMOTE_ADDR']);
    
    // Processar dados do formulário
    $formData = [
        'nome' => $_POST['nome'] ?? '',
        'email' => $_POST['email'] ?? '',
        'telefone' => $_POST['telefone'] ?? '',
        'empresa' => $_POST['empresa'] ?? '',
        'tipo_projeto' => $_POST['tipo_projeto'] ?? '',
        'orcamento' => $_POST['orcamento'] ?? '',
        'mensagem' => $_POST['mensagem'] ?? ''
    ];
    
    // Validações específicas
    if (strlen($formData['nome']) < 2) {
        throw new Exception('Nome deve ter pelo menos 2 caracteres');
    }
    
    if (strlen($formData['mensagem']) < 10) {
        throw new Exception('Mensagem deve ter pelo menos 10 caracteres');
    }
    
    // Enviar email
    $mailService = new MailService();
    $result = $mailService->sendContactForm($formData);
    
    if (!$result['success']) {
        throw new Exception($result['message']);
    }
    
    // Salvar rate limiting
    if (!is_dir('tmp')) {
        mkdir('tmp', 0755, true);
    }
    file_put_contents($ipFile, time());
    
    // Log do envio (opcional)
    error_log("Formulário enviado com sucesso - Nome: {$formData['nome']}, Email: {$formData['email']}");
    
    // Resposta de sucesso
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'message' => 'Mensagem enviada com sucesso! Retornaremos em breve.',
            'redirect' => url('sucesso')
        ]);
    } else {
        header('Location: ' . url('sucesso') . '?status=success');
    }
    
} catch (Exception $e) {
    // Log do erro
    error_log("Erro no formulário: " . $e->getMessage());
    
    if ($isAjax) {
        header('Content-Type: application/json');
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    } else {
        header('Location: ' . url('contato') . '?error=' . urlencode($e->getMessage()));
    }
}
exit; 