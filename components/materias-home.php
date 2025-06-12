<?php
/**
 * Componente simples para mostrar matérias na home
 */

// Incluir configuração das páginas
require_once 'includes/longtail-config.php';

// Selecionar as 4 primeiras matérias para mostrar na home
$homeMaterias = [
    'contratar-programador-php-freelancer-especialista',
    'freelancer-vs-agencia-php',
    'bom-programador-php-entregas',
    'automacao-php-chatbot-whatsapp-n8n-processos'
];

$allPages = getAllLongtailPages();
$featuredMaterias = [];

foreach ($homeMaterias as $slug) {
    if (isset($allPages[$slug])) {
        $featuredMaterias[$slug] = $allPages[$slug];
    }
}
?>

<!-- Matérias -->
<section class="py-5 bg-light" role="complementary">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <h2 class="section-title fade-up">Matérias</h2>
                <p class="section-subtitle fade-up">
                    Guias práticos para empresários sobre desenvolvimento PHP, automação e tecnologia
                </p>
            </div>
        </div>
        
        <div class="row g-4 mb-5">
            <?php foreach ($featuredMaterias as $slug => $materia): ?>
                <div class="col-lg-3 fade-up">
                    <article class="service-card h-100">
                        <div class="service-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <h3 class="service-title"><?php echo $materia['title']; ?></h3>
                        <p class="service-description">
                            <?php echo substr($materia['content']['intro'], 0, 120) . '...'; ?>
                        </p>
                        <a href="<?php echo url($slug); ?>" class="service-link">
                            Ler matéria <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Botão ver todas -->
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center fade-up">
                <a href="<?php echo url('materias'); ?>" class="btn btn-cta-enhanced">
                    <i class="fas fa-th-list me-2"></i>
                    Ver Todas as Matérias
                </a>
            </div>
        </div>
    </div>
</section> 