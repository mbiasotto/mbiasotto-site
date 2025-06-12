<?php
// Configurações da página - Long tail apenas no title HTML para SEO
$pageTitle = 'Otimização SEO Sorocaba | Especialista SEO Freelancer Sites WordPress';
$pageDescription = 'Otimização SEO profissional para sites. Melhore posicionamento no Google, aumente tráfego orgânico. SEO técnico e conteúdo. Orçamento gratuito!';
$pageKeywords = 'otimização seo, seo sites, posicionamento google, seo wordpress, consultor seo';

// Configurações do Hero interno
$heroTitle = 'Otimização SEO para Sites';
$heroSubtitle = 'Melhore o posicionamento do seu site no Google';
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
                            <h1 class="service-page-title">Otimização SEO para Sites</h1>
                            <p class="service-page-subtitle">Melhore o posicionamento do seu site no Google</p>
                        </div>

                        <!-- Service Description -->
                        <div class="row mb-5">
                            <div class="col-lg-8 mx-auto">
                                <p class="lead text-center">
                                    Otimização SEO completa para melhorar o posicionamento do seu site nos mecanismos 
                                    de busca. Aumento do tráfego orgânico, melhoria da velocidade e experiência do usuário 
                                    para conquistar as primeiras posições no Google.
                                </p>
                            </div>
                        </div>

                        <!-- Service Features -->
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <h3 class="mb-4">SEO Técnico</h3>
                                <ul class="service-features-list">
                                    <li><i class="fas fa-check-circle text-primary"></i> Auditoria SEO completa</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Otimização de velocidade</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Meta tags otimizadas</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Schema markup</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Sitemap XML</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> URLs amigáveis</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-4">Resultados</h3>
                                <ul class="service-features-list">
                                    <li><i class="fas fa-check-circle text-primary"></i> Melhor posicionamento no Google</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Aumento do tráfego orgânico</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Mais visitantes qualificados</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Maior taxa de conversão</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Redução do custo por clique</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Relatórios mensais</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Call to Action -->
                        <div class="text-center">
                            <h3 class="mb-4">Quer aparecer na primeira página do Google?</h3>
                            <p class="mb-4">Entre em contato para uma análise gratuita do seu site e receber um orçamento personalizado.</p>
                            <div class="d-flex justify-content-center gap-3 flex-wrap">
                                <a href="<?php echo url('contato'); ?>" class="btn btn-primary btn-lg">
                                    <i class="fas fa-envelope me-2"></i> Solicitar Orçamento
                                </a>
                                <a href="https://wa.me/5515981187063?text=Olá! Gostaria de saber mais sobre otimização SEO." 
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