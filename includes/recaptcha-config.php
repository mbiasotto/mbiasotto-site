<?php
/**
 * Google reCAPTCHA v3 Configuration
 * Programador PHP Freelancer - Anti-spam Protection
 */

// reCAPTCHA v3 Keys
define('RECAPTCHA_SITE_KEY', '6LebUF0rAAAAAH2K0WX2mVhxUugPn8pPAbtEQiqQ');
define('RECAPTCHA_SECRET_KEY', '6LebUF0rAAAAAGAjrNvLdyyxeg944MZ1Boy-rkJX');

// Score mínimo para considerar humano (0.0 = bot, 1.0 = humano)
define('RECAPTCHA_MIN_SCORE', 0.5);

/**
 * Função alternativa para validar reCAPTCHA usando cURL
 * 
 * @param array $postData Dados para enviar
 * @return string|false Resposta ou false em caso de erro
 */
function validateRecaptchaWithCurl($postData) {
    $ch = curl_init();
    
    curl_setopt_array($ch, [
        CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($postData),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 20,
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_MAXREDIRS => 3,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (compatible; reCAPTCHA-Validator/1.0)'
    ]);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    curl_close($ch);
    
    if ($response === false || $httpCode !== 200) {
        return false;
    }
    
    return $response;
}

/**
 * Valida token do reCAPTCHA v3
 * 
 * @param string $token Token do reCAPTCHA
 * @param string $action Ação executada (ex: 'contact_form', 'newsletter')
 * @return array Resultado da validação
 */
function validateRecaptcha($token, $action = '') {
    $result = [
        'success' => false,
        'score' => 0,
        'action' => '',
        'error' => '',
        'is_human' => false
    ];

    // Verificar se token foi enviado
    if (empty($token)) {
        $result['error'] = 'Token reCAPTCHA não encontrado';
        return $result;
    }

    // Preparar dados para verificação
    $postData = [
        'secret' => RECAPTCHA_SECRET_KEY,
        'response' => $token,
        'remoteip' => $_SERVER['REMOTE_ADDR'] ?? ''
    ];

    // Fazer requisição para Google com múltiplas tentativas
    $maxRetries = 3;
    $response = false;
    
    for ($i = 0; $i < $maxRetries; $i++) {
        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/x-www-form-urlencoded',
                'content' => http_build_query($postData),
                'timeout' => 15,
                'ignore_errors' => true
            ]
        ]);

        $response = @file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
        
        if ($response !== false) {
            break; // Sucesso, sair do loop
        }
        
        // Se não é a última tentativa, aguardar um pouco
        if ($i < $maxRetries - 1) {
            sleep(1);
        }
    }
    
    if ($response === false) {
        // Tentar método alternativo com cURL se disponível
        if (function_exists('curl_init')) {
            $response = validateRecaptchaWithCurl($postData);
        }
        
        if ($response === false) {
            $result['error'] = 'Erro ao conectar com o servidor reCAPTCHA após múltiplas tentativas';
            return $result;
        }
    }

    $responseData = json_decode($response, true);

    if (!$responseData) {
        $result['error'] = 'Resposta inválida do servidor reCAPTCHA';
        return $result;
    }

    // Processar resposta
    $result['success'] = $responseData['success'] ?? false;
    $result['score'] = $responseData['score'] ?? 0;
    $result['action'] = $responseData['action'] ?? '';

    // Validações adicionais
    if (!$result['success']) {
        $errors = $responseData['error-codes'] ?? ['unknown-error'];
        $result['error'] = 'Verificação reCAPTCHA falhou: ' . implode(', ', $errors);
        return $result;
    }

    // Verificar se a ação confere
    if (!empty($action) && $result['action'] !== $action) {
        $result['error'] = 'Ação do reCAPTCHA não confere';
        return $result;
    }

    // Verificar score
    $result['is_human'] = $result['score'] >= RECAPTCHA_MIN_SCORE;

    if (!$result['is_human']) {
        $result['error'] = 'Score muito baixo (possível bot)';
    }

    return $result;
}

/**
 * Log de tentativas de spam/bot
 * 
 * @param array $recaptchaResult Resultado da validação
 * @param array $formData Dados do formulário (sem dados sensíveis)
 */
function logRecaptchaAttempt($recaptchaResult, $formData = []) {
    $logData = [
        'timestamp' => date('Y-m-d H:i:s'),
        'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
        'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
        'score' => $recaptchaResult['score'],
        'action' => $recaptchaResult['action'],
        'is_human' => $recaptchaResult['is_human'],
        'success' => $recaptchaResult['success'],
        'error' => $recaptchaResult['error'],
        'form_fields' => array_keys($formData) // Só nomes dos campos, não valores
    ];

    // Log apenas tentativas suspeitas (score baixo)
    if ($recaptchaResult['score'] < RECAPTCHA_MIN_SCORE) {
        $logFile = __DIR__ . '/../storage/logs/recaptcha-suspicious.log';
        
        // Criar diretório se não existir
        $logDir = dirname($logFile);
        if (!is_dir($logDir)) {
            mkdir($logDir, 0755, true);
        }

        $logLine = json_encode($logData) . "\n";
        file_put_contents($logFile, $logLine, FILE_APPEND | LOCK_EX);
    }

    // Log no Google Analytics para monitoramento
    if (function_exists('gtag')) {
        echo "<script>";
        echo "gtag('event', 'recaptcha_validation', {";
        echo "event_category: 'Security',";
        echo "event_label: '" . ($recaptchaResult['is_human'] ? 'Human' : 'Bot') . "',";
        echo "recaptcha_score: " . $recaptchaResult['score'] . ",";
        echo "recaptcha_action: '" . $recaptchaResult['action'] . "'";
        echo "});";
        echo "</script>";
    }
}

/**
 * Função helper para uso em formulários
 * 
 * @param array $postData Dados do POST ($_POST)
 * @param string $expectedAction Ação esperada
 * @return array Resultado da validação
 */
function processRecaptchaSubmission($postData, $expectedAction = 'contact_form') {
    $token = $postData['recaptcha_token'] ?? '';
    $action = $postData['recaptcha_action'] ?? $expectedAction;

    $result = validateRecaptcha($token, $action);
    
    // Log da tentativa
    logRecaptchaAttempt($result, $postData);

    return $result;
}

/**
 * Gera badge de proteção reCAPTCHA (opcional)
 */
function getRecaptchaBadge() {
    return '
    <div class="recaptcha-badge" style="font-size: 12px; color: #666; margin-top: 10px;">
        <i class="fas fa-shield-alt me-1"></i>
        Protegido por <a href="https://www.google.com/recaptcha/intro/v3.html" target="_blank" rel="noopener">reCAPTCHA</a>
    </div>';
}

/**
 * Estatísticas de spam bloqueado (para dashboard)
 */
function getRecaptchaStats($days = 30) {
    $logFile = __DIR__ . '/../storage/logs/recaptcha-suspicious.log';
    
    if (!file_exists($logFile)) {
        return [
            'total_attempts' => 0,
            'blocked_bots' => 0,
            'avg_score' => 0,
            'period_days' => $days
        ];
    }

    $logs = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $cutoffDate = date('Y-m-d', strtotime("-{$days} days"));
    
    $totalAttempts = 0;
    $blockedBots = 0;
    $totalScore = 0;

    foreach ($logs as $log) {
        $data = json_decode($log, true);
        if ($data && $data['timestamp'] >= $cutoffDate) {
            $totalAttempts++;
            $totalScore += $data['score'];
            
            if (!$data['is_human']) {
                $blockedBots++;
            }
        }
    }

    return [
        'total_attempts' => $totalAttempts,
        'blocked_bots' => $blockedBots,
        'avg_score' => $totalAttempts > 0 ? round($totalScore / $totalAttempts, 2) : 0,
        'period_days' => $days,
        'protection_rate' => $totalAttempts > 0 ? round(($blockedBots / $totalAttempts) * 100, 1) : 0
    ];
}
?> 