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
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nome *</label>
                                <input type="text" name="nome" class="form-control" required minlength="2" placeholder="Seu nome completo">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">E-mail *</label>
                                <input type="email" name="email" class="form-control" required placeholder="seu@email.com">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Telefone/WhatsApp</label>
                                <input type="tel" name="telefone" class="form-control" placeholder="(15) 99999-9999">
                            </div>
                            <?php if ($showCompany): ?>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Empresa</label>
                                <input type="text" name="empresa" class="form-control" placeholder="Nome da empresa">
                            </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Tipo de Projeto *</label>
                            <select name="tipo_projeto" class="form-select" required>
                                <option value="">O que você precisa?</option>
                                <option value="desenvolvimento-php">Desenvolvimento PHP</option>
                                <option value="laravel">Sistema Laravel</option>
                                <option value="site">Site Profissional</option>
                                <option value="api">API REST</option>
                                <option value="app">Aplicativo</option>
                                <option value="sistema">Sistema Personalizado</option>
                                <option value="automacao">Automação com IA</option>
                                <option value="consultoria">Consultoria</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>
                        
                        <?php if ($showBudget): ?>
                        <div class="mb-3">
                            <label class="form-label">Orçamento Previsto</label>
                            <select name="orcamento" class="form-select">
                                <option value="">Qual seu orçamento? (opcional)</option>
                                <option value="ate-5k">Até R$ 5.000</option>
                                <option value="5k-10k">R$ 5.000 - R$ 10.000</option>
                                <option value="10k-20k">R$ 10.000 - R$ 20.000</option>
                                <option value="20k-mais">Acima de R$ 20.000</option>
                                <option value="nao-definido">Ainda não defini</option>
                            </select>
                        </div>
                        <?php endif; ?>
                        
                        <div class="mb-4">
                            <label class="form-label">Descrição do Projeto *</label>
                            <textarea name="mensagem" class="form-control" rows="<?php echo $isSimplified ? '3' : '5'; ?>" placeholder="Conte-me sobre seu projeto, objetivos e funcionalidades desejadas..." required minlength="10"></textarea>
                        </div>
                        
                        <div class="text-end">
                            <button type="submit" class="btn-form-submit px-5" id="<?php echo $formId; ?>Btn">
                                <i class="fas fa-paper-plane me-2"></i>
                                <span class="btn-text">Solicitar Orçamento Gratuito</span>
                                <span class="spinner-border spinner-border-sm d-none ms-2" role="status"></span>
                            </button>
                        </div>
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

.quick-form .btn-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
    border: none;
    border-radius: 10px;
    padding: 1rem 2.5rem;
    font-weight: 600;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    min-width: 250px;
}

.quick-form .btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(0, 123, 255, 0.3);
}

@media (max-width: 768px) {
    .quick-form-card {
        padding: 2rem 1.5rem;
    }
    
    .quick-form-title {
        font-size: 1.5rem;
    }
    
    .quick-form .btn-primary {
        min-width: auto;
        width: 100%;
    }
}
</style> 