<?php
/**
 * Form Fields Component
 * Componente reutilizável para campos de formulário
 * 
 * Uso: include 'components/form-fields.php';
 */

// Configurações padrão (podem ser sobrescritas)
$showCompany = $showCompany ?? true;
$showBudget = $showBudget ?? true;
$messageRows = $messageRows ?? 5;
$isSimplified = $isSimplified ?? false;
?>

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
    <label for="tipo_projeto" class="form-label">Tipo de Projeto *</label>
    <select name="tipo_projeto" id="tipo_projeto" class="form-select" required aria-describedby="tipo_projeto_help">
        <option value="">O que você precisa?</option>
        <option value="desenvolvimento-php">Desenvolvimento PHP</option>
        <option value="laravel">Sistema Laravel</option>
        <option value="site">Site Profissional</option>
        <option value="api">API REST</option>
        <option value="app">Aplicativo</option>
        <option value="sistema">Sistema Personalizado</option>
        <option value="automacao">Automação com IA</option>
        <option value="gestor-ia">Gestor de IA</option>
        <option value="agentes-ia">Agentes de IA</option>
        <option value="consultoria">Consultoria</option>
        <option value="outro">Outro</option>
    </select>
    <div id="tipo_projeto_help" class="form-text">Selecione o tipo de projeto que melhor se adapta às suas necessidades</div>
</div>

<?php if ($showBudget): ?>
<div class="mb-3">
    <label for="orcamento" class="form-label">Orçamento Previsto</label>
    <select name="orcamento" id="orcamento" class="form-select" aria-describedby="orcamento_help">
        <option value="">Qual seu orçamento? (opcional)</option>
        <option value="ate-5k">Até R$ 5.000</option>
        <option value="5k-10k">R$ 5.000 - R$ 10.000</option>
        <option value="10k-20k">R$ 10.000 - R$ 20.000</option>
        <option value="20k-mais">Acima de R$ 20.000</option>
        <option value="nao-definido">Ainda não defini</option>
    </select>
    <div id="orcamento_help" class="form-text">Informe o orçamento previsto para ajudarmos na proposta (opcional)</div>
</div>
<?php endif; ?>

<div class="mb-4">
    <label class="form-label">Descrição do Projeto *</label>
    <textarea name="mensagem" class="form-control" rows="<?php echo $messageRows; ?>" placeholder="Conte-me sobre seu projeto, objetivos e funcionalidades desejadas..." required minlength="10"></textarea>
</div> 