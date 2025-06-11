<?php
/**
 * Correções de Acessibilidade - Implementação Básica
 * 
 * Este arquivo implementa as correções básicas de acessibilidade identificadas
 * no relatório PageSpeed Insights para melhorar a pontuação de 88 para 95+
 */

// ===========================================
// 1. BOTÕES DO CAROUSEL SEM NOME ACESSÍVEL
// ===========================================

/**
 * Correção: Adicionar aria-label aos botões do carousel de testimoniais
 * 
 * Problema: Botões #prevTestimonial e #nextTestimonial sem texto ou aria-label
 * Solução: Adicionar aria-label descritivos
 */
?>

<!-- Correção para index.php - Botões do Carousel de Testimoniais -->
<div class="testimonial-controls">
    <button class="testimonial-btn" id="prevTestimonial" aria-label="Depoimento anterior">
        <i class="fas fa-chevron-left" aria-hidden="true"></i>
    </button>
    <button class="testimonial-btn" id="nextTestimonial" aria-label="Próximo depoimento">
        <i class="fas fa-chevron-right" aria-hidden="true"></i>
    </button>
</div>

<?php
// ===========================================
// 2. SELECTS SEM LABELS ASSOCIADOS
// ===========================================

/**
 * Correção: Adicionar labels adequados aos elementos select
 * 
 * Problema: Select name="tipo_projeto" e name="orcamento" sem labels
 * Solução: Usar labels com for= ou aria-labelledby
 */
?>

<!-- Correção para components/form-fields.php - Selects com Labels -->
<div class="mb-3">
    <label for="tipo_projeto" class="form-label">Tipo de Projeto *</label>
    <select name="tipo_projeto" id="tipo_projeto" class="form-select" required 
            aria-describedby="tipo_projeto_help">
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
    <div id="tipo_projeto_help" class="form-text">Selecione o tipo de projeto que melhor se adapta às suas necessidades</div>
</div>

<div class="mb-3">
    <label for="orcamento" class="form-label">Orçamento Previsto</label>
    <select name="orcamento" id="orcamento" class="form-select" 
            aria-describedby="orcamento_help">
        <option value="">Qual seu orçamento? (opcional)</option>
        <option value="ate-5k">Até R$ 5.000</option>
        <option value="5k-10k">R$ 5.000 - R$ 10.000</option>
        <option value="10k-20k">R$ 10.000 - R$ 20.000</option>
        <option value="20k-mais">Acima de R$ 20.000</option>
        <option value="nao-definido">Ainda não defini</option>
    </select>
    <div id="orcamento_help" class="form-text">Informe o orçamento previsto para ajudarmos na proposta (opcional)</div>
</div>

<?php
// ===========================================
// 3. ESTRUTURA DE HEADINGS SEQUENCIAL
// ===========================================

/**
 * Correção: Ajustar hierarquia de headings
 * 
 * Problema: Headings não estão em ordem sequencial descendente
 * Solução: Corrigir estrutura H1 > H2 > H3 > H4
 */
?>

<!-- Correção para index.php - Estrutura de Headings -->
<!-- Hero: H1 -->
<h1 class="hero-title">Programador PHP Freelancer Sorocaba, SP</h1>

<!-- Seção de Serviços: H2 -->
<h2 class="section-title">Serviços Especializados</h2>

<!-- Cada Serviço: H3 -->
<h3 class="service-title">Desenvolvimento PHP</h3>
<h3 class="service-title">Framework Laravel</h3>

<!-- Estatísticas: H2 -->
<h2 class="section-title">Resultados que Falam por Si</h2>

<!-- Estatística Individual: H3 em vez de H3 com classe stat-number -->
<h3 class="stat-number" aria-live="polite">20+</h3>

<!-- Depoimentos: H2 -->
<h2 class="section-title">O que dizem nossos clientes</h2>

<!-- Nome do cliente: H4 em vez de H5 -->
<h4 class="author-name-modern">João Silva</h4>

<?php
// ===========================================
// 4. PROBLEMAS DE CONTRASTE
// ===========================================

/**
 * Correção: Melhorar contraste de cores
 * 
 * Problema: section-subtitle com contraste insuficiente
 * Solução: Escurecer cor do texto
 */
?>

<style>
/* Correção de Contraste - CSS Adicional */
.section-subtitle {
    color: #4a5568; /* Escurecer de #718096 para melhor contraste */
    font-weight: 400; /* Aumentar peso da fonte */
}

/* Melhorar contraste dos textos secundários */
.author-position-modern,
.testimonial-text-modern {
    color: #2d3748; /* Escurecer para melhor legibilidade */
}

/* Garantir contraste mínimo de 4.5:1 */
.text-muted,
.text-light {
    color: #4a5568 !important;
}
</style>

<?php
// ===========================================
// 5. CANONICAL URL ABSOLUTA
// ===========================================

/**
 * Correção: URL canônica absoluta
 * 
 * Problema: rel=canonical com URL relativa (/)
 * Solução: URL absoluta completa
 */
?>

<!-- Correção para includes/header.php - Canonical URL -->
<link rel="canonical" href="<?php echo url('/'); ?>">

<?php
// ===========================================
// 6. PLACEHOLDER IMAGES MOCK
// ===========================================

/**
 * Correção: Remover imagens placeholder.com
 * 
 * Problema: Falha ao carregar imagens do placeholder.com
 * Solução: Criar imagens locais ou usar dados SVG
 */
?>

<!-- Correção para index.php - Logos de Clientes -->
<div class="client-logo-modern">
    <svg width="100" height="40" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg" aria-labelledby="techcorp-title">
        <title id="techcorp-title">TechCorp</title>
        <rect width="100" height="40" fill="#1e3a8a" rx="4"/>
        <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-size="12" font-weight="bold">TechCorp</text>
    </svg>
</div>

<div class="client-logo-modern">
    <svg width="100" height="40" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg" aria-labelledby="inovacao-title">
        <title id="inovacao-title">Inovação Digital</title>
        <rect width="100" height="40" fill="#1e3a8a" rx="4"/>
        <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-size="10" font-weight="bold">Inovação</text>
    </svg>
</div>

<?php
// ===========================================
// 7. SCRIPT DE APLICAÇÃO DAS CORREÇÕES
// ===========================================

/**
 * Script JavaScript para aplicar correções dinâmicas
 */
?>

<script>
// Aplicar correções de acessibilidade após carregamento da página
document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Adicionar aria-labels aos botões do carousel se não existirem
    const prevBtn = document.getElementById('prevTestimonial');
    const nextBtn = document.getElementById('nextTestimonial');
    
    if (prevBtn && !prevBtn.hasAttribute('aria-label')) {
        prevBtn.setAttribute('aria-label', 'Depoimento anterior');
    }
    
    if (nextBtn && !nextBtn.hasAttribute('aria-label')) {
        nextBtn.setAttribute('aria-label', 'Próximo depoimento');
    }
    
    // 2. Associar labels aos selects se não estiverem associados
    const tipoProjetoSelect = document.querySelector('select[name="tipo_projeto"]');
    const orcamentoSelect = document.querySelector('select[name="orcamento"]');
    
    if (tipoProjetoSelect && !tipoProjetoSelect.id) {
        tipoProjetoSelect.id = 'tipo_projeto';
        const label = document.querySelector('label[for="tipo_projeto"]');
        if (!label) {
            const newLabel = document.createElement('label');
            newLabel.setAttribute('for', 'tipo_projeto');
            newLabel.className = 'form-label';
            newLabel.textContent = 'Tipo de Projeto *';
            tipoProjetoSelect.parentNode.insertBefore(newLabel, tipoProjetoSelect);
        }
    }
    
    if (orcamentoSelect && !orcamentoSelect.id) {
        orcamentoSelect.id = 'orcamento';
        const label = document.querySelector('label[for="orcamento"]');
        if (!label) {
            const newLabel = document.createElement('label');
            newLabel.setAttribute('for', 'orcamento');
            newLabel.className = 'form-label';
            newLabel.textContent = 'Orçamento Previsto';
            orcamentoSelect.parentNode.insertBefore(newLabel, orcamentoSelect);
        }
    }
    
    // 3. Melhorar acessibilidade dos dots do carousel
    const dots = document.querySelectorAll('.testimonial-dot');
    dots.forEach((dot, index) => {
        if (!dot.hasAttribute('aria-label')) {
            dot.setAttribute('aria-label', `Ir para depoimento ${index + 1}`);
            dot.setAttribute('role', 'button');
            dot.setAttribute('tabindex', '0');
        }
    });
    
    // 4. Adicionar skip link se não existir
    if (!document.querySelector('.skip-link')) {
        const skipLink = document.createElement('a');
        skipLink.href = '#main-content';
        skipLink.className = 'skip-link visually-hidden-focusable';
        skipLink.textContent = 'Pular para o conteúdo principal';
        document.body.insertBefore(skipLink, document.body.firstChild);
    }
    
    // 5. Marcar main content
    const mainContent = document.querySelector('section.services-section') || document.querySelector('main');
    if (mainContent && !mainContent.id) {
        mainContent.id = 'main-content';
    }
    
    console.log('Correções de acessibilidade aplicadas com sucesso!');
});
</script>

<style>
/* CSS adicional para acessibilidade */
.skip-link {
    position: absolute;
    top: -40px;
    left: 6px;
    background: #000;
    color: #fff;
    padding: 8px;
    text-decoration: none;
    z-index: 1000;
    border-radius: 4px;
}

.skip-link:focus {
    top: 6px;
}

.visually-hidden-focusable:not(:focus):not(:focus-within) {
    position: absolute !important;
    width: 1px !important;
    height: 1px !important;
    padding: 0 !important;
    margin: -1px !important;
    overflow: hidden !important;
    clip: rect(0, 0, 0, 0) !important;
    white-space: nowrap !important;
    border: 0 !important;
}

/* Melhorar contraste geral */
.section-subtitle {
    color: #4a5568 !important;
    font-weight: 400;
}

.author-position-modern,
.testimonial-text-modern {
    color: #2d3748;
}

/* Melhorar foco visível */
.testimonial-btn:focus,
.testimonial-dot:focus,
select:focus,
input:focus,
textarea:focus {
    outline: 2px solid #3b82f6;
    outline-offset: 2px;
}
</style> 