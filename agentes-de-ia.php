<?php
// Configurações da página
$pageTitle = 'Desenvolvimento de Agentes de IA | Especialista em Automação Inteligente';
$pageDescription = 'Criação e implementação de Agentes de IA autônomos para prospecção, pesquisa, análise de dados e automação de fluxos de trabalho complexos.';
$pageKeywords = 'agentes de ia, ia autônoma, automação com agentes, especialista em agentes de ia, desenvolvimento de ia, automação de processos';

// Configurações do Hero interno
$heroTitle = 'Agentes de IA <BR><span class="text-blue-200">Automação Inteligente</span>';
$heroSubtitle = 'Crie agentes autônomos para executar tarefas complexas no seu negócio.';
$isInternal = true;

// Include header
include 'includes/header.php';
include 'includes/navigation.php';

// Incluir Hero
include 'components/hero.php';
?>

    <!-- Service Detail Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="service-page-content bg-white p-5 rounded shadow-sm">
                        
                        <!-- Service Icon & Intro -->
                        <div class="text-center mb-5">
                            <h1 class="service-page-title">Agentes de IA<BR><span class="text-blue-200">Automação de Tarefas Complexas</span></h1>
                            <p class="service-page-subtitle">Soluções para criar agentes autônomos que trabalham por você.</p>
                        </div>

                        <!-- Service Description -->
                        <div class="row mb-5">
                            <div class="col-lg-8 mx-auto">
                                <p class="lead text-center">
                                    Um Agente de IA é um sistema autônomo que não apenas executa uma tarefa, mas planeja, raciocina e executa sequências de ações para atingir um objetivo complexo, como prospectar clientes ou analisar concorrentes.
                                </p>
                            </div>
                        </div>

                        <!-- Service Features -->
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <h3 class="mb-4">Exemplos de Agentes de IA</h3>
                                <ul class="service-features-list">
                                    <li><i class="fas fa-user-tie text-primary"></i> <strong>Agente de Prospecção:</strong> Encontra e qualifica leads.</li>
                                    <li><i class="fas fa-chart-pie text-primary"></i> <strong>Agente de Pesquisa:</strong> Coleta e analisa dados de mercado.</li>
                                    <li><i class="fas fa-file-invoice text-primary"></i> <strong>Agente Financeiro:</strong> Monitora faturas e pagamentos.</li>
                                    <li><i class="fas fa-headset text-primary"></i> <strong>Agente de Suporte:</strong> Resolve problemas complexos de clientes.</li>
                                    <li><i class="fas fa-clipboard-check text-primary"></i> <strong>Agente de RH:</strong> Faz a triagem inicial de currículos.</li>
                                    <li><i class="fas fa-sync-alt text-primary"></i> <strong>Agente de Processos:</strong> Gerencia fluxos de trabalho internos.</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-4">Benefícios dos Agentes Autônomos</h3>
                                <ul class="service-features-list">
                                    <li><i class="fas fa-check-circle text-primary"></i> Automação de ponta a ponta</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Execução de tarefas 24/7</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Redução drástica de trabalho manual</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Escalabilidade de operações</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Análise de dados em tempo real</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Vantagem competitiva com inovação</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Call to Action -->
                        <div class="text-center">
                            <h3 class="mb-4">Pronto para ter uma equipe de agentes autônomos?</h3>
                            <p class="mb-4">Vamos discutir como os Agentes de IA podem automatizar as tarefas mais complexas da sua empresa.</p>
                            <div class="d-flex justify-content-center gap-3 flex-wrap">
                                <a href="<?php echo url('contato'); ?>" class="btn btn-primary btn-lg">
                                    <i class="fas fa-envelope me-2"></i> Agendar Análise
                                </a>
                                <a href="https://wa.me/5515981187063?text=Olá! Gostaria de saber mais sobre o serviço de Agentes de IA." 
                                   class="btn btn-success btn-lg" target="_blank">
                                    <i class="fab fa-whatsapp me-2"></i> Falar com Especialista
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php 
    $formTitle = 'Vamos criar seu primeiro Agente de IA?';
    $formSubtitle = 'Preencha o formulário e receba uma análise gratuita de como os agentes autônomos podem ajudar sua empresa.';
    $formId = 'servicoAgentesIAContactForm';
    include 'components/home-contact-form.php'; 
    ?>

    <?php include 'components/servicos-relacionados.php'; ?>

<?php include 'components/cta-section.php'; ?>

<style>
.service-page-title {
    color: var(--primary-color);
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.service-page-subtitle {
    font-size: 1.2rem;
    color: #666;
    margin-bottom: 0;
}

.service-features-list {
    list-style: none;
    padding: 0;
}

.service-features-list li {
    padding: 0.5rem 0;
    display: flex;
    align-items: center;
}

.service-features-list i {
    margin-right: 0.75rem;
    width: 20px;
}
</style>

<?php include 'includes/footer.php'; ?> 