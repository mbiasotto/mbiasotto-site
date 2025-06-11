<?php
// Configurações da página
$pageTitle = 'Mensagem Enviada com Sucesso | Mauricio Biasotto';
$pageDescription = 'Sua mensagem foi enviada com sucesso. Retornarei em breve para discutir seu projeto.';
$bodyClass = 'success-page'; // Classe específica para a página

// Include header
include 'includes/header.php';
include 'includes/navigation.php';
?>

<?php
// Configurações do Hero interno
$heroTitle = 'Mensagem Enviada com Sucesso!';
$heroSubtitle = 'Obrigado pelo seu contato. Em breve retornaremos com uma proposta personalizada para seu projeto.';
$isInternal = true;

// Incluir Hero
include 'components/hero.php';
?>

    <!-- Success Details Section -->
    <section class="py-5 bg-light success-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="success-content" data-aos="fade-up">
                        <!-- Ícone de Sucesso -->
                        <div class="text-center mb-5">
                            <div class="success-icon mb-4" style="display: block;">
                                <div class="success-circle" style="width: 80px; height: 80px; background: linear-gradient(135deg, #28a745, #20c997); border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 2rem; color: white; box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);">
                                    <i class="fas fa-check" style="line-height: 1;"></i>
                                </div>
                            </div>
                            <h2 class="title-section mb-4">Próximos Passos</h2>
                        
                        </div>
                        <div class="success-details">
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
                        <div class="success-navigation text-center">
                            <a href="<?php echo url(''); ?>" class="btn btn-cta-primary me-3">
                                <i class="fas fa-home me-2"></i>
                                Voltar ao Início
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
            // Evento principal de sucesso do formulário
            gtag('event', 'contact_form_submit', {
                'event_category': 'Conversion',
                'event_label': 'Contact Form Success',
                'value': 200
            });
            
            // Evento de geração de lead
            gtag('event', 'generate_lead', {
                'event_category': 'Conversion',
                'event_label': 'Lead Generated - Contact Form',
                'value': 200
            });

            // Evento de conversão customizado
            gtag('event', 'form_conversion_success', {
                'event_category': 'Contact',
                'event_label': 'Contact Form Converted Successfully',
                'conversion_type': 'contact_form',
                'recaptcha_protected': true
            });
        }
        
        // Tracking para Facebook Pixel (se houver)
        if (typeof fbq !== 'undefined') {
            fbq('track', 'Lead');
        }
    </script>

<?php include 'includes/footer.php'; ?> 