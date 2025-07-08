<?php
// Configurações da página
$pageTitle = 'Gestor de IA | Otimização e Automação com Inteligência Artificial';
$pageDescription = 'Contrate um Gestor de IA para otimizar processos, automatizar tarefas e integrar chatbots com n8n e ChatGPT. Aumente a eficiência da sua empresa.';
$pageKeywords = 'gestor de ia, especialista em ia, automação com ia, consultor ia, implementação de ia, chatbot com ia, n8n, chatgpt';

// Configurações do Hero interno
$heroTitle = 'Gestor de IA <BR><span class="text-blue-200">Especialista em Automação</span>';
$heroSubtitle = 'Integre Inteligência Artificial nos seus processos e ganhe eficiência.';
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
                            <h1 class="service-page-title">Gestor de IA<BR><span class="text-blue-200">Otimização e Automação de Processos</span></h1>
                            <p class="service-page-subtitle">Soluções personalizadas para integrar Inteligência Artificial no seu negócio.</p>
                        </div>

                        <!-- Service Description -->
                        <div class="row mb-5">
                            <div class="col-lg-8 mx-auto">
                                <p class="lead text-center">
                                    Um Gestor de IA analisa seus processos de negócio e implementa soluções de automação e inteligência artificial para aumentar a produtividade, reduzir custos e melhorar a experiência do cliente.
                                </p>
                            </div>
                        </div>

                        <!-- Service Features -->
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <h3 class="mb-4">O que faz um Gestor de IA?</h3>
                                <ul class="service-features-list">
                                    <li><i class="fas fa-robot text-primary"></i> Análise de Processos para Automação</li>
                                    <li><i class="fas fa-cogs text-primary"></i> Implementação de Chatbots (WhatsApp, Sites)</li>
                                    <li><i class="fas fa-network-wired text-primary"></i> Integração com Sistemas via API</li>
                                    <li><i class="fas fa-brain text-primary"></i> Uso de Modelos como ChatGPT</li>
                                    <li><i class="fas fa-project-diagram text-primary"></i> Automação de Tarefas com n8n</li>
                                    <li><i class="fas fa-chart-line text-primary"></i> Monitoramento e Otimização Contínua</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-4">Benefícios para sua Empresa</h3>
                                <ul class="service-features-list">
                                    <li><i class="fas fa-check-circle text-primary"></i> Redução de custos operacionais</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Aumento da produtividade da equipe</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Atendimento ao cliente 24/7</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Redução de erros humanos</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Tomada de decisão baseada em dados</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Vantagem competitiva no mercado</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Call to Action -->
                        <div class="text-center">
                            <h3 class="mb-4">Pronto para transformar seu negócio com IA?</h3>
                            <p class="mb-4">Vamos conversar sobre como a automação e a inteligência artificial podem impulsionar seus resultados.</p>
                            <div class="d-flex justify-content-center gap-3 flex-wrap">
                                <a href="<?php echo url('contato'); ?>" class="btn btn-primary btn-lg">
                                    <i class="fas fa-envelope me-2"></i> Agendar Consultoria
                                </a>
                                <a href="https://wa.me/5515981187063?text=Olá! Gostaria de saber mais sobre o serviço de Gestor de IA." 
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
    $formTitle = 'Pronto para começar?';
    $formSubtitle = 'Preencha o formulário e receba uma análise gratuita de como a IA pode ajudar sua empresa.';
    $formId = 'servicoGestorIAContactForm';
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