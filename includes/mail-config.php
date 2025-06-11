<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Classe para envio de emails
 */
class MailService
{
    private $mail;
    
    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->configureMail();
    }
    
    private function configureMail()
    {
        try {
            // Configurações do servidor
            $this->mail->isSMTP();
            $this->mail->Host = 'mbiasotto.com';
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'sendrevenda@mbiasotto.com';
            $this->mail->Password = 'mBsend$20';
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port = 587;
            $this->mail->CharSet = 'UTF-8';
            
            // Configurações padrão
            $this->mail->setFrom('sendrevenda@mbiasotto.com', 'Site Maurício Biasotto');
            $this->mail->addReplyTo('mauricio@mbiasotto.com', 'Mauricio Biasotto');
            
        } catch (Exception $e) {
            error_log("Erro na configuração do email: " . $e->getMessage());
        }
    }
    
    /**
     * Envia email de contato do site
     */
    public function sendContactForm($data)
    {
        try {
            // Validar dados
            $this->validateContactData($data);
            
            // Configurar destinatário
            $this->mail->addAddress('mauricio@mbiasotto.com');
            
            // Configurar email
            $this->mail->isHTML(true);
            $this->mail->Subject = 'Novo contato do site - ' . $data['nome'];
            
            // Template do email
            $this->mail->Body = $this->getContactEmailTemplate($data);
            $this->mail->AltBody = $this->getContactEmailPlain($data);
            
            // Enviar
            $result = $this->mail->send();
            
            // Limpar para próximo envio
            $this->mail->clearAddresses();
            
            return [
                'success' => true,
                'message' => 'Email enviado com sucesso!'
            ];
            
        } catch (Exception $e) {
            error_log("Erro no envio do email: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Erro ao enviar email: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Validar dados do formulário de contato
     */
    private function validateContactData($data)
    {
        $required = ['nome', 'email', 'tipo_projeto', 'mensagem'];
        
        foreach ($required as $field) {
            if (empty($data[$field])) {
                throw new Exception("Campo obrigatório não preenchido: {$field}");
            }
        }
        
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email inválido");
        }
        
        // Sanitizar dados
        foreach ($data as $key => $value) {
            $data[$key] = htmlspecialchars(strip_tags(trim($value)));
        }
        
        return $data;
    }
    
    /**
     * Template HTML do email de contato
     */
    private function getContactEmailTemplate($data)
    {
        $telefone = !empty($data['telefone']) ? $data['telefone'] : 'Não informado';
        $empresa = !empty($data['empresa']) ? $data['empresa'] : 'Não informado';
        $orcamento = !empty($data['orcamento']) ? $data['orcamento'] : 'Não definido';
        
        return "
        <html>
        <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
            <div style='max-width: 600px; margin: 0 auto; padding: 20px;'>
                <h2 style='color: #0066cc; border-bottom: 2px solid #0066cc; padding-bottom: 10px;'>
                    Novo Contato do Site
                </h2>
                
                <div style='background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;'>
                    <h3 style='margin-top: 0; color: #333;'>Dados do Cliente:</h3>
                    <p><strong>Nome:</strong> {$data['nome']}</p>
                    <p><strong>Email:</strong> {$data['email']}</p>
                    <p><strong>Telefone:</strong> {$telefone}</p>
                    <p><strong>Empresa:</strong> {$empresa}</p>
                </div>
                
                <div style='background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;'>
                    <h3 style='margin-top: 0; color: #333;'>Detalhes do Projeto:</h3>
                    <p><strong>Tipo de Projeto:</strong> {$data['tipo_projeto']}</p>
                    <p><strong>Orçamento Previsto:</strong> {$orcamento}</p>
                </div>
                
                <div style='background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;'>
                    <h3 style='margin-top: 0; color: #333;'>Mensagem:</h3>
                    <p style='white-space: pre-wrap;'>{$data['mensagem']}</p>
                </div>
                
                <div style='margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; font-size: 12px; color: #666;'>
                    <p>Este email foi enviado através do formulário de contato do site mbiasotto.com</p>
                    <p>Data/Hora: " . date('d/m/Y H:i:s') . "</p>
                </div>
            </div>
        </body>
        </html>";
    }
    
    /**
     * Template texto plano do email de contato
     */
    private function getContactEmailPlain($data)
    {
        $telefone = !empty($data['telefone']) ? $data['telefone'] : 'Não informado';
        $empresa = !empty($data['empresa']) ? $data['empresa'] : 'Não informado';
        $orcamento = !empty($data['orcamento']) ? $data['orcamento'] : 'Não definido';
        
        return "NOVO CONTATO DO SITE\n\n" .
               "Dados do Cliente:\n" .
               "Nome: {$data['nome']}\n" .
               "Email: {$data['email']}\n" .
               "Telefone: {$telefone}\n" .
               "Empresa: {$empresa}\n\n" .
               "Detalhes do Projeto:\n" .
               "Tipo de Projeto: {$data['tipo_projeto']}\n" .
               "Orçamento Previsto: {$orcamento}\n\n" .
               "Mensagem:\n{$data['mensagem']}\n\n" .
               "---\n" .
               "Enviado em: " . date('d/m/Y H:i:s') . "\n" .
               "Site: mbiasotto.com";
    }
} 