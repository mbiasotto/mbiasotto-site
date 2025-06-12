<?php
/**
 * Template simples para páginas de matérias
 */

// Verificar se $pageData foi definido
if (!isset($pageData)) {
    header('HTTP/1.0 404 Not Found');
    include '404.php';
    exit;
}

// Configurar hero
$heroTitle = $pageData['title'];
$heroSubtitle = $pageData['hero_subtitle'];
$isInternal = true;

// Include hero
include 'components/hero.php';
?>

    <!-- Conteúdo da Matéria -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Conteúdo principal 100% -->
                <div class="col-lg-10">
                    <article class="bg-white p-5 rounded shadow-sm">
                        <!-- Introdução -->
                        <div class="mb-5">
                            <p class="lead"><?php echo $pageData['content']['intro']; ?></p>
                        </div>

                        <!-- Conteúdo das seções -->
                        <?php foreach ($pageData['content']['sections'] as $section): ?>
                            <div class="mb-5">
                                <h2 class="mb-4 text-primary">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <?php echo $section['title']; ?>
                                </h2>
                                
                                <p class="mb-4"><?php echo $section['content']; ?></p>
                                
                                <?php if (isset($section['tips']) && !empty($section['tips'])): ?>
                                    <div class="bg-light p-4 rounded">
                                        <h5 class="mb-3"><i class="fas fa-lightbulb text-warning me-2"></i>Dicas importantes:</h5>
                                        <ul class="mb-0">
                                            <?php foreach ($section['tips'] as $tip): ?>
                                                <li class="mb-2"><?php echo $tip; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </article>
                </div>
            </div>
        </div>
    </section>

<?php 
// Configurar formulário no estilo da home
$formTitle = $pageData['cta_title'];
$formSubtitle = $pageData['cta_text'];
$formId = 'materiaContactForm';
include 'components/home-contact-form.php'; 
?>

<?php include 'components/cta-section.php'; ?> 