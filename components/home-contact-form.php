<?php
/**
 * Home Contact Form Component - Modelo igual ao da home
 * 
 * Uso: include 'components/home-contact-form.php';
 */

// Configurações padrão (podem ser sobrescritas)
$formTitle = $formTitle ?? 'Solicite um orçamento';
$formSubtitle = $formSubtitle ?? 'Preencha o formulário abaixo para receber uma análise gratuita do seu projeto.';
$formClass = $formClass ?? 'lead-conversion-form-home';
$formId = $formId ?? 'homeContactForm';
$showBudget = $showBudget ?? true;
$showCompany = $showCompany ?? false;
$isSimplified = $isSimplified ?? true;
?>

<section class="py-5 bg-white" role="complementary" aria-labelledby="lead-capture-title">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row align-items-center">
                    <div class="col-lg-5 mb-4 mb-lg-0 fade-left">
                        <h2 id="lead-capture-title" class="section-title mb-4"><?php echo $formTitle; ?></h2>
                        <p class="mb-4"><?php echo $formSubtitle; ?></p>
                        
                        <div class="mb-4" role="list" aria-label="Benefícios do orçamento gratuito">
                            <div class="lead-feature-item" role="listitem">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                                <span>Orçamento detalhado sem compromisso</span>
                            </div>
                            <div class="lead-feature-item" role="listitem">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                                <span>Resposta em até 24 horas úteis</span>
                            </div>
                            <div class="lead-feature-item" role="listitem">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                                <span>Consultoria inicial gratuita</span>
                            </div>
                            <div class="lead-feature-item" role="listitem">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                                <span>Seu projeto em mãos experientes</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 fade-right">
                        <?php
                        // Configurações do formulário
                        $formTitle = 'Solicite um orçamento';
                        $formSubtitle = 'Preencha o formulário abaixo para receber uma análise gratuita do seu projeto.';
                        $formClass = 'lead-conversion-form-home';
                        $formId = $formId;
                        $isSimplified = true;
                        $showCompany = false;
                        
                        // Incluir componente
                        include 'components/quick-contact-form.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 