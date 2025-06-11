<?php
// Configurações da página
$pageTitle = 'Mensagem Enviada com Sucesso | Maurício Biasotto';
$pageDescription = 'Sua mensagem foi enviada com sucesso. Retornarei em breve para discutir seu projeto.';

// Include header
include 'includes/header.php';
include 'includes/navigation.php';
?>

    <!-- Success Section -->
    <section class="py-5 bg-light" style="margin-top: 100px; min-height: calc(100vh - 100px);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="success-content" data-aos="fade-up">
                        <!-- Success Icon -->
                        <div class="success-icon mb-4">
                            <div class="success-circle">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                        
                        <h2 class="success-title mb-4">Sua mensagem foi enviada!</h2>
                        
                        <div class="success-details">
                            <p class="lead mb-4">
                                Recebemos sua solicitação e estou analisando os detalhes do seu projeto. 
                                Você receberá uma resposta personalizada em seu email em até <strong>24 horas</strong>.
                            </p>
                            
                            <div class="row text-center mb-5">
                                <div class="col-md-4 mb-3">
                                    <div class="next-step-card">
                                        <div class="step-icon">
                                            <i class="fas fa-search"></i>
                                        </div>
                                        <h5>1. Análise</h5>
                                        <p>Analisarei sua solicitação e necessidades</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                    <div class="next-step-card">
                                        <div class="step-icon">
                                            <i class="fas fa-file-invoice"></i>
                                        </div>
                                        <h5>2. Proposta</h5>
                                        <p>Enviarei uma proposta detalhada por email</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                    <div class="next-step-card">
                                        <div class="step-icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <h5>3. Conversa</h5>
                                        <p>Agendaremos uma conversa para alinhar detalhes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        
                        <!-- Navigation -->
                        <div class="success-navigation">
                            <a href="<?php echo url(''); ?>" class="btn btn-outline-primary me-3">
                                <i class="fas fa-home me-2"></i>
                                Voltar ao Início
                            </a>
                            <a href="<?php echo url('servicos'); ?>" class="btn btn-outline-secondary">
                                <i class="fas fa-cogs me-2"></i>
                                Ver Serviços
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Info Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-md-4 text-center mb-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="info-card">
                                <i class="fas fa-shield-alt text-primary mb-3"></i>
                                <h5>Segurança e Qualidade</h5>
                                <p>Desenvolvimento com as melhores práticas de segurança e qualidade do mercado.</p>
                            </div>
                        </div>
                        
                        <div class="col-md-4 text-center mb-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="info-card">
                                <i class="fas fa-rocket text-primary mb-3"></i>
                                <h5>Entrega Rápida</h5>
                                <p>Metodologia ágil com entregas parciais para acompanhar o progresso do projeto.</p>
                            </div>
                        </div>
                        
                        <div class="col-md-4 text-center mb-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="info-card">
                                <i class="fas fa-headset text-primary mb-3"></i>
                                <h5>Suporte Contínuo</h5>
                                <p>30 dias de suporte gratuito e planos de manutenção para seu projeto.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Analytics Event Tracking -->
    <script>
        // Event tracking para Google Analytics
        if (typeof gtag !== 'undefined') {
            gtag('event', 'form_submit', {
                'event_category': 'Contact',
                'event_label': 'Contact Form Success',
                'value': 1
            });
            
            // Evento de conversão
            gtag('event', 'conversion', {
                'send_to': 'AW-CONVERSION-ID/CONVERSION-LABEL', // Substituir pelos dados reais
                'event_category': 'Lead',
                'event_label': 'Contact Form Conversion'
            });
        }
        
        // Tracking para Facebook Pixel (se houver)
        if (typeof fbq !== 'undefined') {
            fbq('track', 'Lead');
        }
    </script>

<?php include 'includes/footer.php'; ?> 