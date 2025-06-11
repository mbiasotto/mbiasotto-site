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
    
    // Verificação do reCAPTCHA v3
    $recaptchaResult = processRecaptchaSubmission($_POST);
    if (!$recaptchaResult['success']) {
        throw new Exception('Erro na verificação de segurança: ' . $recaptchaResult['error']);
    }
    
    if (!$recaptchaResult['is_human']) {
        throw new Exception('Score de segurança muito baixo. Tente novamente.');
    }
    
    // Verificação de rate limiting simples
    $ipFile = 'tmp/rate_limit_' . md5($_SERVER['REMOTE_ADDR']);
    if (file_exists($ipFile)) {
        $lastSubmit = file_get_contents($ipFile);
        if (time() - $lastSubmit < 60) { // 1 minuto entre envios
            throw new Exception('Aguarde 1 minuto antes de enviar outro formulário');
        }
    }
    
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