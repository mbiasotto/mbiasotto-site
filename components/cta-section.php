<?php
/**
 * CTA Section Component
 * 
 * Uso: include 'components/cta-section.php';
 */

// Configurações padrão (sempre iguais)
$ctaTitle = 'Vamos Transformar Sua Ideia em Realidade';
$ctaSubtitle = 'Conte-me sobre seu projeto e receba uma proposta personalizada em até 24 horas';
$ctaButtonText = 'Solicitar Orçamento';
$ctaButtonUrl = url('contato');
$ctaClass = 'cta-section-default';
?>

<!-- CTA Section -->
<section class="<?php echo $ctaClass; ?> py-5 position-relative overflow-hidden">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="cta-content" data-aos="fade-up">
                    <h2 class="cta-title text-white mb-4"><?php echo $ctaTitle; ?></h2>
                    <p class="cta-subtitle text-white-50 mb-5"><?php echo $ctaSubtitle; ?></p>
                    <a href="<?php echo $ctaButtonUrl; ?>" class="btn btn-cta-enhanced">
                        <i class="fas fa-rocket me-2"></i>
                        <?php echo $ctaButtonText; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

 