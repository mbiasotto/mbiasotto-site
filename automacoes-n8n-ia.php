<?php
// Configurações da página - Long tail apenas no title HTML para SEO
$pageTitle = 'Automação N8N e ChatBots com IA Freelancer Sorocaba / São Paulo | Automação de Processos Freelancer';
$pageDescription = 'Automação de processos com N8N, chatbots inteligentes e integração de sistemas. Freelancer especialista em automação Sorocaba. Orçamento gratuito!';
$pageKeywords = 'automação n8n, chatbot ia, automação processos, workflow, integração sistemas';

// Configurações do Hero interno
$heroTitle = 'Automação N8N e ChatBots com IA <span class="text-blue-200">Freelancer - Sorocaba / São Paulo</span>';
$heroSubtitle = 'Automação de processos e chatBots inteligentes';
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
                            <h1 class="service-page-title">Automação N8N e ChatBots com IA <BR><span class="text-blue-200">Freelancer - Sorocaba / São Paulo</span></h1>
                            <p class="service-page-subtitle">Automação de processos e chatbots inteligentes</p>
                        </div>

                        <!-- Service Description -->
                        <div class="row mb-5">
                            <div class="col-lg-8 mx-auto">
                                <p class="lead text-center">
                                    Automação de processos empresariais com N8N, desenvolvimento de chatbots inteligentes 
                                    e integração de sistemas. Elimine tarefas repetitivas e otimize seus workflows com 
                                    soluções de automação personalizadas e tecnologia de inteligência artificial.
                                </p>
                            </div>
                        </div>

                        <!-- Service Features -->
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <h3 class="mb-4">Automação e Chatbots com IA</h3>
                                <ul class="service-features-list">
                                    <li><i class="fas fa-check-circle text-primary"></i> Workflows N8N</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Chatbots inteligentes</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Integração de APIs</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Automação WhatsApp</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Processamento de dados</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Notificações automáticas</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-4">Benefícios</h3>
                                <ul class="service-features-list">
                                    <li><i class="fas fa-check-circle text-primary"></i> Economia de tempo</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Redução de erros humanos</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Atendimento 24/7</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Processos mais eficientes</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Escalabilidade automática</li>
                                    <li><i class="fas fa-check-circle text-primary"></i> Integração completa</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Call to Action -->
                        <div class="text-center">
                            <h3 class="mb-4">Quer automatizar seus processos?</h3>
                            <p class="mb-4">Entre em contato para discutir seu projeto e receber um orçamento personalizado.</p>
                            <div class="d-flex justify-content-center gap-3 flex-wrap">
                                <a href="<?php echo url('contato'); ?>" class="btn btn-primary btn-lg">
                                    <i class="fas fa-envelope me-2"></i> Solicitar Orçamento
                                </a>
                                <a href="https://wa.me/5515981187063?text=Olá! Gostaria de saber mais sobre automação N8N e chatbots." 
                                   class="btn btn-success btn-lg" target="_blank">
                                    <i class="fab fa-whatsapp me-2"></i> WhatsApp
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php 
    $formTitle = 'Solicite um orçamento para Automação e IA';
    $formSubtitle = 'Conte sobre o processo que deseja automatizar e receba uma proposta personalizada.';
    $formId = 'servicoAutomacoesContactForm';
    include 'components/home-contact-form.php'; 
    ?>

    <?php include 'components/servicos-relacionados.php'; ?>

<?php include 'components/cta-section.php'; ?>

<style>
.service-page-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.service-page-icon i {
    font-size: 2.5rem;
    color: white;
}

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

.related-service-card {
    padding: 2rem;
    border-radius: 10px;
    border: 1px solid #eee;
    transition: all 0.3s ease;
}

.related-service-card:hover {
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transform: translateY(-5px);
}

.related-service-card i {
    font-size: 2.5rem;
}
</style>

<?php include 'includes/footer.php'; ?> 