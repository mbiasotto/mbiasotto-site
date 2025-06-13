<?php
// Configurações da página - Long tail apenas no title HTML para SEO
$pageTitle = 'Desenvolvimento PHP Freelancer Sorocaba | Especialista PHP Moderno Laravel';
$pageDescription = 'Desenvolvimento PHP profissional com Laravel, APIs REST, sistemas web. Freelancer PHP experiente em Sorocaba. Orçamento gratuito!';
$pageKeywords = 'desenvolvimento php, freelancer php, programador php, laravel, apis, sistemas web';

// Configurações do Hero interno
$heroTitle = 'Construção de APIs';
$heroSubtitle = 'APIs RESTful seguras e bem documentadas';
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
                            <h1 class="service-page-title">Construção de APIs</h1>
                            <p class="service-page-subtitle">APIs RESTful seguras e bem documentadas</p>
                        </div>

                        <!-- Service Description -->
                        <div class="row mb-5">
                            <div class="col-lg-8 mx-auto">
                                <p class="lead text-center">
                                    Desenvolvimento de aplicações web robustas e escaláveis utilizando PHP moderno (7.4+ e 8.x) 
                                    e boas práticas de programação. Crio soluções personalizadas que atendem às necessidades 
                                    específicas do seu negócio.
                                </p>
                            </div>
                        </div>

                        <!-- Service Features -->
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <h3 class="mb-4">Tecnologias e Recursos</h3>
                                <ul class="service-features-list">
                                    <li><i class="fas fa-check-circle text-primary"></i> PHP 7.4+ e PHP 8.x</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Programação orientada a objetos</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Integração com bancos de dados</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Autenticação segura</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Otimização de performance</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Código documentado</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-4">Benefícios</h3>
                                <ul class="service-features-list">
                                    <li><i class="fas fa-check-circle text-primary"></i> Aplicações mais rápidas</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Código limpo e organizado</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Fácil manutenção</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Escalabilidade garantida</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Segurança robusta</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Suporte completo</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Call to Action -->
                        <div class="text-center">
                            <h3 class="mb-4">Precisa de desenvolvimento PHP profissional?</h3>
                            <p class="mb-4">Entre em contato para discutir seu projeto e receber um orçamento personalizado.</p>
                            <div class="d-flex justify-content-center gap-3 flex-wrap">
                                <a href="<?php echo url('contato'); ?>" class="btn btn-primary btn-lg">
                                    <i class="fas fa-envelope me-2"></i> Solicitar Orçamento
                                </a>
                                <a href="https://wa.me/5515981187063?text=Olá! Gostaria de saber mais sobre desenvolvimento PHP." 
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
    $formTitle = 'Solicite um orçamento para Construção de APIs';
    $formSubtitle = 'Explique a API que precisa e receba uma proposta personalizada para integração ou desenvolvimento.';
    $formId = 'servicoApisContactForm';
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