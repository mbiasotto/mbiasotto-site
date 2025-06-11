<?php
/**
 * Form Submit Button Component
 * Componente reutilizável para botão de envio
 * 
 * Uso: include 'components/form-submit-button.php';
 */

// Configurações padrão (podem ser sobrescritas)
$buttonText = $buttonText ?? 'Solicitar Orçamento';
$buttonIcon = $buttonIcon ?? 'fas fa-paper-plane';
$formId = $formId ?? 'contactForm';
$onClickFunction = $onClickFunction ?? 'submitContactForm()';
?>

<div class="form-submit-container">
    <button type="button" class="btn-form-submit" id="<?php echo $formId; ?>Btn" onclick="<?php echo $onClickFunction; ?>">
        <i class="<?php echo $buttonIcon; ?> me-2"></i>
        <span class="btn-text"><?php echo $buttonText; ?></span>
        <span class="spinner-border spinner-border-sm d-none ms-2" role="status"></span>
    </button>
</div>

<style>
/* Estilo do botão responsivo seguindo padrão do projeto */
.form-submit-container {
    /* Desktop: alinhado à direita */
    text-align: right;
}

.btn-form-submit {
    background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
    border: none;
    color: white;
    padding: 1rem 2rem;
    border-radius: 10px;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(30, 58, 138, 0.3);
    position: relative;
    overflow: hidden;
    min-width: 200px;
    font-family: "Inter", sans-serif;
}

.btn-form-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(30, 58, 138, 0.4);
    background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%);
}

.btn-form-submit:active {
    transform: translateY(0);
}

.btn-form-submit:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

/* Estados de loading aprimorados */
.btn-form-submit.btn-loading {
    position: relative;
    pointer-events: none;
}

.btn-form-submit.btn-loading::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    animation: pulse-loading 1.5s infinite;
}

@keyframes pulse-loading {
    0% { opacity: 0.3; }
    50% { opacity: 0.6; }
    100% { opacity: 0.3; }
}

/* Spinner personalizado */
.btn-form-submit .spinner-border {
    width: 1rem;
    height: 1rem;
    border-width: 2px;
    animation: spinner-custom 0.8s linear infinite;
}

@keyframes spinner-custom {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Feedback visual para estados */
.btn-form-submit:not(:disabled):hover {
    box-shadow: 0 8px 25px rgba(30, 58, 138, 0.4);
}

.btn-form-submit.btn-loading:hover {
    box-shadow: 0 4px 15px rgba(30, 58, 138, 0.3);
    transform: none;
}

/* Responsividade Mobile */
@media (max-width: 767.98px) {
    .form-submit-container {
        /* Mobile: centralizado com largura máxima */
        text-align: center;
        max-width: 700px;
        margin: 0 auto;
    }
    
    .btn-form-submit {
        width: 100%;
        max-width: 700px;
        padding: 1.2rem 2rem;
        font-size: 1.1rem;
    }
}

/* Tablets */
@media (min-width: 768px) and (max-width: 991.98px) {
    .form-submit-container {
        text-align: left;
    }
    
    .btn-form-submit {
        min-width: 250px;
    }
}

/* Desktop grande */
@media (min-width: 1200px) {
    .btn-form-submit {
        min-width: 280px;
        padding: 1.1rem 2.5rem;
        font-size: 1.05rem;
    }
}
</style> 