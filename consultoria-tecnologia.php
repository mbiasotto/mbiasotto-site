<?php
// Configurações da página - Long tail apenas no title HTML para SEO
$pageTitle = 'Consultoria em Tecnologia Freelancer Sorocaba / São Paulo | Consultor de TI Freelancer Estratégia';
$pageDescription = 'Consultoria em tecnologia e TI para empresas: análise técnica, estratégia digital, modernização de sistemas. Consultor freelancer Sorocaba. Orçamento gratuito!';
$pageKeywords = 'consultoria tecnologia, consultor ti, estratégia digital, modernização sistemas, análise técnica';

// Configurações do Hero interno
$heroTitle = 'Consultoria em Tecnologia <BR><span class="text-blue-200">Freelancer - Sorocaba / São Paulo</span>';
$heroSubtitle = 'Estratégia e soluções tecnológicas para empresas';
$isInternal = true;

// Include header
include 'includes/header.php';
include 'includes/navigation.php';

// Incluir Hero
include 'components/hero.php';
?>

    <!-- Service Detail Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="service-page-content bg-white p-5 rounded shadow-sm">
                        
                        <!-- Service Icon & Intro -->
                        <div class="text-center mb-5">
                            <h1 class="service-page-title">Consultoria em Tecnologia <BR><span class="text-blue-200">Freelancer - Sorocaba / São Paulo</span></h1>
                            <p class="service-page-subtitle">Estratégia e soluções tecnológicas para empresas</p>
                        </div>

                        <!-- Service Description -->
                        <div class="row mb-5">
                            <div class="col-lg-8 mx-auto">
                                <p class="lead text-center">
                                    Consultoria especializada em tecnologia para empresas que precisam modernizar seus processos, 
                                    escolher as melhores ferramentas ou definir estratégias digitais. Análise técnica completa 
                                    e orientação profissional para decisões tecnológicas assertivas.
                                </p>
                            </div>
                        </div>

                        <!-- Service Features -->
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <h3 class="mb-4">Serviços de Consultoria</h3>
                                <ul class="service-features-list">
                                    <li><i class="fas fa-check-circle text-primary"></i> Análise técnica de sistemas</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Estratégia digital</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Modernização de tecnologia</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Escolha de ferramentas</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Auditoria de segurança</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Planejamento de migração</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-4">Benefícios</h3>
                                <ul class="service-features-list">
                                    <li><i class="fas fa-check-circle text-primary"></i> Decisões mais assertivas</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Redução de custos</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Processos mais eficientes</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Tecnologia alinhada ao negócio</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Riscos minimizados</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Visão estratégica clara</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Call to Action -->
                        <div class="text-center">
                            <h3 class="mb-4">Precisa de orientação tecnológica?</h3>
                            <p class="mb-4">Entre em contato para discutir seu projeto e receber um orçamento personalizado.</p>
                            <div class="d-flex justify-content-center gap-3 flex-wrap">
                                <a href="<?php echo url('contato'); ?>" class="btn btn-primary btn-lg">
                                    <i class="fas fa-envelope me-2"></i> Solicitar Orçamento
                                </a>
                                <a href="https://wa.me/5515981187063?text=Olá! Gostaria de saber mais sobre consultoria em tecnologia." 
                                   class="btn btn-success btn-lg" target="_blank">
                                    <i class="fab fa-whatsapp me-2"></i> WhatsApp
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php 
    $formTitle = 'Solicite uma consultoria em tecnologia';
    $formSubtitle = 'Descreva seu desafio ou projeto e receba uma proposta personalizada de consultoria.';
    $formId = 'servicoConsultoriaContactForm';
    include 'components/home-contact-form.php'; 
    ?>

    <?php include 'components/servicos-relacionados.php'; ?>

<?php include 'components/cta-section.php'; ?>

<style>
.service-page-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.service-page-icon i {
    font-size: 2.5rem;
    color: white;
}

.service-page-title {
    color: var(--primary-color);
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.service-page-subtitle {
    font-size: 1.2rem;
    color: #666;
    margin-bottom: 0;
}

.service-features-list {
    list-style: none;
    padding: 0;
}

.service-features-list li {
    padding: 0.5rem 0;
    display: flex;
    align-items: center;
}

.service-features-list i {
    margin-right: 0.75rem;
    width: 20px;
}

.related-service-card {
    padding: 2rem;
    border-radius: 10px;
    border: 1px solid #eee;
    transition: all 0.3s ease;
}

.related-service-card:hover {
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transform: translateY(-5px);
}

.related-service-card i {
    font-size: 2.5rem;
}
</style>

<?php include 'includes/footer.php'; ?> 