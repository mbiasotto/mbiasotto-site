<?php
// Include config first
require_once 'includes/config.php';
require_once 'includes/longtail-config.php';

// Configurações da página
$pageTitle = 'Matérias | Programador PHP Freelancer - Guias para Empresários';
$pageDescription = 'Guias práticos sobre desenvolvimento PHP, contratação de freelancers, preços e automações. Conteúdo especializado para empresários tomarem decisões inteligentes.';
$pageKeywords = 'materias php, desenvolvimento php, contratar programador, automação chatbot, guias empresários';

// Include header
include 'includes/header.php';
include 'includes/navigation.php';

// Hero simples
$heroTitle = 'Matérias';
$heroSubtitle = 'Guias práticos para empresários sobre desenvolvimento PHP, automação e tecnologia';
$isInternal = true;

include 'components/hero.php';
?>

    <!-- Matérias Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <?php 
                $allPages = getAllLongtailPages();
                foreach ($allPages as $slug => $materia):
                ?>
                    <div class="col-lg-6 fade-up">
                        <article class="service-detail-card">
                            <div class="service-detail-header">
                                <div class="service-detail-icon">
                                    <i class="fas fa-newspaper"></i>
                                </div>
                                <div>
                                    <h2 class="service-detail-title"><?php echo $materia['title']; ?></h2>
                                </div>
                            </div>
                            <div class="service-detail-body">
                                <p><?php echo substr($materia['content']['intro'], 0, 180) . '...'; ?></p>
                                
                                <div class="service-detail-footer">
                                    <a href="<?php echo url($slug); ?>" class="service-link">
                                        Ler matéria <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php include 'components/cta-section.php'; ?>

<?php include 'includes/footer.php'; ?> 