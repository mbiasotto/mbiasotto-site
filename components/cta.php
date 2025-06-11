<?php
/**
 * Componente CTA (Call to Action)
 * 
 * @param string $title - Título da CTA (opcional)
 * @param string $subtitle - Subtítulo da CTA (opcional)
 * @param string $buttonText - Texto do botão (opcional)
 * @param string $buttonUrl - URL do botão (opcional)
 */

$title = $title ?? 'Pronto para transformar sua ideia em realidade?';
$subtitle = $subtitle ?? 'Entre em contato para receber um orçamento personalizado e descobrir como posso ajudar a desenvolver a solução perfeita para seu negócio.';
$buttonText = $buttonText ?? 'Solicitar Orçamento Gratuito';
$buttonUrl = $buttonUrl ?? url('contato');
?>

<!-- CTA Section -->
<section class="cta-section py-5">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="cta-content" data-aos="fade-up">
                    <h2 class="cta-title mb-4"><?php echo $title; ?></h2>
                    <p class="cta-subtitle mb-5"><?php echo $subtitle; ?></p>
                    <a href="<?php echo $buttonUrl; ?>" class="btn-cta-enhanced">
                        <span class="btn-text"><?php echo $buttonText; ?></span>
                        <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section> 