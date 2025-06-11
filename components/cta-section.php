<?php
/**
 * CTA Section Component
 * 
 * Uso: include 'components/cta-section.php';
 */

// Configurações padrão (sempre iguais)
$ctaTitle = 'Vamos Transformar Sua Ideia em Realidade';
$ctaSubtitle = 'Conte-me sobre seu projeto e receba uma proposta personalizada em até 24 horas';
$ctaButtonText = 'Solicitar Orçamento Gratuito';
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
                    <a href="<?php echo $ctaButtonUrl; ?>" class="btn btn-cta-enhanced btn-lg">
                        <i class="fas fa-rocket me-2"></i>
                        <?php echo $ctaButtonText; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.cta-section-default {
    background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
    position: relative;
    overflow: hidden;
}

.cta-section-default::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cdefs%3E%3Cpattern id='cta-pattern' x='0' y='0' width='100' height='100' patternUnits='userSpaceOnUse'%3E%3Cg fill='%23ffffff' fill-opacity='0.02'%3E%3Ctext x='5' y='15' font-family='monospace' font-size='8'%3E%3Fphp%3C/text%3E%3Ctext x='5' y='25' font-family='monospace' font-size='6'%3Eclass User%3C/text%3E%3Ctext x='5' y='35' font-family='monospace' font-size='6'%3E%7B%3C/text%3E%3Ctext x='8' y='45' font-family='monospace' font-size='6'%3Epublic function%3C/text%3E%3Ctext x='8' y='55' font-family='monospace' font-size='6'%3Eget()%3C/text%3E%3Ctext x='8' y='65' font-family='monospace' font-size='6'%3E%7B%3C/text%3E%3Ctext x='12' y='75' font-family='monospace' font-size='5'%3Ereturn %24this%3C/text%3E%3Ctext x='8' y='85' font-family='monospace' font-size='6'%3E%7D%3C/text%3E%3Ctext x='5' y='95' font-family='monospace' font-size='6'%3E%7D%3C/text%3E%3Ccircle cx='75' cy='20' r='2' fill='%2300d4ff' fill-opacity='0.3'/%3E%3Ccircle cx='85' cy='40' r='1.5' fill='%2300ff88' fill-opacity='0.3'/%3E%3Cpath d='M65,60 L70,65 L65,70' stroke='%2300d4ff' stroke-width='1' fill='none' stroke-opacity='0.2'/%3E%3Cpath d='M75,75 L80,70 L85,75' stroke='%23ff6b6b' stroke-width='1' fill='none' stroke-opacity='0.2'/%3E%3Crect x='70' y='30' width='8' height='1' fill='%2300ff88' fill-opacity='0.2'/%3E%3Crect x='75' y='50' width='12' height='1' fill='%23ffd93d' fill-opacity='0.2'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect width='100' height='100' fill='url(%23cta-pattern)'/%3E%3C/svg%3E");
    opacity: 0.4;
    animation: float 20s ease-in-out infinite;
}

.cta-section-default::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 25% 75%, rgba(0, 212, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 25%, rgba(0, 255, 136, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(255, 109, 107, 0.06) 0%, transparent 70%);
}

.cta-content {
    position: relative;
    z-index: 2;
}

.cta-title {
    font-size: 3rem;
    font-weight: 800;
    line-height: 1.2;
}

.cta-subtitle {
    font-size: 1.2rem;
    font-weight: 300;
    line-height: 1.6;
}

.btn-cta-enhanced {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
    padding: 1rem 2.5rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1.1rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.btn-cta-enhanced::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.btn-cta-enhanced:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    color: white;
}

.btn-cta-enhanced:hover::before {
    left: 100%;
}

@media (max-width: 768px) {
    .cta-title {
        font-size: 2rem;
    }
    
    .cta-subtitle {
        font-size: 1rem;
    }
    
    .btn-cta-enhanced {
        padding: 0.875rem 2rem;
        font-size: 1rem;
    }
}
</style> 