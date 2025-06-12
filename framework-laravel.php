<?php
// Configurações da página - Long tail apenas no title HTML para SEO
$pageTitle = 'Desenvolvimento Laravel Sorocaba | Framework PHP Especialista Freelancer';
$pageDescription = 'Desenvolvimento Laravel profissional: APIs, sistemas web, autenticação. Framework PHP especialista em Sorocaba. Orçamento gratuito!';
$pageKeywords = 'desenvolvimento laravel, framework laravel, programador laravel, apis laravel, sistemas laravel';

// Configurações do Hero interno
$heroTitle = 'Framework Laravel';
$heroSubtitle = 'O framework PHP mais popular e robusto do mercado';
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
                            <h1 class="service-page-title">Framework Laravel</h1>
                            <p class="service-page-subtitle">O framework PHP mais popular e robusto do mercado</p>
                        </div>

                        <!-- Service Description -->
                        <div class="row mb-5">
                            <div class="col-lg-8 mx-auto">
                                <p class="lead text-center">
                                    Desenvolvimento de sistemas e aplicações web com Laravel, o framework PHP mais popular 
                                    e robusto do mercado. Utilizo todo o potencial do Laravel para criar soluções elegantes 
                                    e de fácil manutenção.
                                </p>
                            </div>
                        </div>

                        <!-- Service Features -->
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <h3 class="mb-4">Recursos do Laravel</h3>
                                <ul class="service-features-list">
                                    <li><i class="fas fa-check-circle text-primary"></i> Laravel versão mais recente</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> APIs RESTful</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Eloquent ORM</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Autenticação Sanctum</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Filas e jobs</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Testes automatizados</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-4">Vantagens</h3>
                                <ul class="service-features-list">
                                    <li><i class="fas fa-check-circle text-primary"></i> Desenvolvimento rápido</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Código elegante</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Comunidade ativa</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Documentação completa</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Ecosystem robusto</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Performance otimizada</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Call to Action -->
                        <div class="text-center">
                            <h3 class="mb-4">Quer um sistema Laravel profissional?</h3>
                            <p class="mb-4">Entre em contato para discutir seu projeto e receber um orçamento personalizado.</p>
                            <div class="d-flex justify-content-center gap-3 flex-wrap">
                                <a href="<?php echo url('contato'); ?>" class="btn btn-primary btn-lg">
                                    <i class="fas fa-envelope me-2"></i> Solicitar Orçamento
                                </a>
                                <a href="https://wa.me/5515981187063?text=Olá! Gostaria de saber mais sobre desenvolvimento Laravel." 
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