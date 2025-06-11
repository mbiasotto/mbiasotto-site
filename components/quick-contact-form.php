<?php
/**
 * Quick Contact Form Component
 * 
 * Uso: include 'components/quick-contact-form.php';
 */

// Configurações padrão (podem ser sobrescritas)
$formTitle = $formTitle ?? 'Solicite seu Orçamento Gratuito';
$formSubtitle = $formSubtitle ?? 'Preencha o formulário e receba uma proposta personalizada em até 24 horas';
$formClass = $formClass ?? 'quick-contact-form';
$formId = $formId ?? 'quickContactForm';
$showBudget = $showBudget ?? true;
$showCompany = $showCompany ?? false;
$isSimplified = $isSimplified ?? true;
?>

<div class="<?php echo $formClass; ?>">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="quick-form-card" data-aos="fade-up">
                    <div class="text-center mb-4">
                        <h3 class="quick-form-title"><?php echo $formTitle; ?></h3>
                        <p class="quick-form-subtitle"><?php echo $formSubtitle; ?></p>
                    </div>
                    
                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
                    <?php endif; ?>
                    
                    <form method="POST" action="<?php echo url('process-form'); ?>" id="<?php echo $formId; ?>" class="quick-form">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <input type="hidden" name="form_type" value="quick_contact">
                        <!-- Honeypot field -->
                        <input type="text" name="website" style="display:none;" tabindex="-1" autocomplete="off">
                        
                        <?php 
                        // Configurar variáveis para o componente de campos
                        $showCompany = true; // Agora o quick form também terá empresa
                        $messageRows = $isSimplified ? 3 : 5;
                        include __DIR__ . '/form-fields.php'; 
                        ?>
                        
                        <?php 
                        // Configurar variáveis para o componente de botão
                        $buttonText = 'Solicitar Orçamento';
                        $buttonIcon = 'fas fa-paper-plane';
                        $onClickFunction = "submitQuickForm('$formId')";
                        include __DIR__ . '/form-submit-button.php'; 
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.quick-contact-form {
    padding: 5rem 0;
}

.quick-form-card {
    background: white;
    padding: 3rem 2.5rem;
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
    border: 1px solid #e9ecef;
}

.quick-form-title {
    color: var(--text-dark);
    font-weight: 700;
    font-size: 2rem;
    margin-bottom: 1rem;
}

.quick-form-subtitle {
    color: var(--text-muted);
    font-size: 1.1rem;
    margin-bottom: 0;
}

.quick-form .form-label {
    font-weight: 600;
    color: #4a5568;
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
}

.quick-form .form-control,
.quick-form .form-select {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 0.875rem 1rem;
    font-size: 0.95rem;
    font-weight: 400;
    transition: all 0.3s ease;
    background-color: #ffffff;
}

.quick-form .form-control:focus,
.quick-form .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.1);
    background-color: #ffffff;
}

@media (max-width: 768px) {
    .quick-form-card {
        padding: 2rem 1.5rem;
    }
    
    .quick-form-title {
        font-size: 1.5rem;
    }
}
</style> 