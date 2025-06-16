<?php
// Configurações da página
$pageTitle = 'Contato Programador PHP Freelancer Sorocaba / São Paulo | Especialista Laravel, APPs, APIs, N8N, MCP, ChatBots e automações para sua empresa ';
$pageDescription = 'Entre em contato para solicitar seu orçamento. Desenvolvimento PHP, Laravel, APIs N8N e automações para sua empresa.';

// Include header
include 'includes/header.php';
include 'includes/navigation.php';

// Configurações do Hero interno
$heroTitle = 'Vamos Transformar Sua Ideia em Realidade';
$heroSubtitle = 'Conte-me sobre seu projeto e receba uma proposta personalizada em até 24 horas';
$isInternal = true;

// Incluir Hero
include 'components/hero.php';
?>

    <!-- Contact Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- Informações de Contato -->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="contact-info-simple p-4 h-100 fade-left">
                        <h3 class="contact-info-title-simple mb-4">Informações de Contato</h3>
                        
                        <div class="contact-info-item-simple mb-4">
                            <div class="contact-info-icon-simple">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5 class="mb-2">Telefone/WhatsApp</h5>
                                <p class="mb-0"><a href="https://wa.me/5515981187063" target="_blank" class="contact-link-simple">(15) 98118-7063</a></p>
                            </div>
                        </div>
                        
                        <div class="contact-info-item-simple mb-4">
                            <div class="contact-info-icon-simple">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5 class="mb-2">E-mail</h5>
                                <p class="mb-0"><a href="mailto:mauricio@mbiasotto.com" class="contact-link-simple">mauricio@mbiasotto.com</a></p>
                            </div>
                        </div>
                        
                        <div class="contact-info-item-simple mb-4">
                            <div class="contact-info-icon-simple">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5 class="mb-2">Localização</h5>
                                <p class="mb-0">Sorocaba / São Paulo - Brasil</p>
                            </div>
                        </div>
                        
                        <div class="contact-info-item-simple">
                            <div class="contact-info-icon-simple">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5 class="mb-2">Horário de Atendimento</h5>
                                <p class="mb-0">Segunda a Sexta: 9h às 18h</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Formulário de Contato -->
                <div class="col-lg-8">
                    <div class="contact-form-modern fade-right">
                        
                        <?php
                        // Exibir mensagem de erro se houver
                        if (isset($_GET['error'])) {
                            echo '<div class="alert alert-danger">' . htmlspecialchars($_GET['error']) . '</div>';
                        }
                        ?>
                    
                        <form class="contact-form" method="POST" action="<?php echo url('process-form'); ?>" id="contactForm">
                            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                            <!-- Honeypot field (hidden) -->
                            <input type="text" name="website" style="display:none;" tabindex="-1" autocomplete="off">
                            
                            <?php 
                            // Configurar variáveis para o componente de campos
                            $showCompany = true;
                            $showBudget = true;
                            $messageRows = 5;
                            include 'components/form-fields.php'; 
                            ?>
                            
                            <?php 
                            // Configurar variáveis para o componente de botão
                            $buttonText = 'Enviar Mensagem';
                            $buttonIcon = 'fas fa-paper-plane';
                            $formId = 'contactForm';
                            $onClickFunction = 'submitContactForm()';
                            include 'components/form-submit-button.php'; 
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mb-5 fade-up">
                    <h2 class="section-title">Perguntas Frequentes</h2>
                    <p class="section-subtitle">Respostas para as dúvidas mais comuns sobre meus serviços</p>
                </div>
                
                <div class="col-lg-10">
                    <div class="accordion fade-up" id="faqAccordion">
                        <!-- Pergunta 1 -->
                        <div class="accordion-item mb-3 border-0 shadow-sm rounded">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    Quanto tempo leva para desenvolver um projeto?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    O prazo varia de acordo com a complexidade do projeto. Sites simples podem levar de 1-2 semanas, 
                                    sistemas em Laravel de 3-6 semanas, e projetos complexos podem levar 2-3 meses. 
                                    Sempre definimos prazos realistas durante o planejamento.
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pergunta 2 -->
                        <div class="accordion-item mb-3 border-0 shadow-sm rounded">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    Qual é o processo de desenvolvimento?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Começamos com uma análise detalhada dos requisitos, seguida pelo planejamento da arquitetura, 
                                    desenvolvimento iterativo com entregas parciais, testes rigorosos e implantação. 
                                    Mantenho comunicação constante durante todo o processo.
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pergunta 3 -->
                        <div class="accordion-item mb-3 border-0 shadow-sm rounded">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    Trabalha com quais tecnologias?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Especializo-me em PHP moderno, Framework Laravel, APIs REST, bancos de dados MySQL/PostgreSQL, 
                                    JavaScript, HTML5/CSS3, Bootstrap e automações com n8n. Também trabalho com integração de 
                                    serviços e deploy em servidores Linux.
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pergunta 4 -->
                        <div class="accordion-item mb-3 border-0 shadow-sm rounded">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                    Oferece suporte pós-entrega?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Sim! Ofereço 30 dias de suporte gratuito para correção de bugs após a entrega. 
                                    Também disponibilizo planos de manutenção mensal para atualizações, melhorias e 
                                    suporte técnico contínuo.
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pergunta 5 -->
                        <div class="accordion-item border-0 shadow-sm rounded">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                                    Como funciona o pagamento?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Geralmente divido o pagamento em parcelas: 30% no início, 40% na entrega parcial e 30% na finalização. 
                                    Para projetos menores, pode ser 50% no início e 50% na entrega. Aceito PIX, transferência bancária 
                                    e cartão de crédito.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<style>
.contact-info-simple {
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
    border: 1px solid #e9ecef;
}

.contact-info-title-simple {
    color: #1e3a8a;
    font-weight: 700;
    font-size: 1.5rem;
}

.contact-info-item-simple {
    display: flex;
    align-items: flex-start;
    padding: 0.5rem 0;
}

.contact-info-icon-simple {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
    flex-shrink: 0;
}

.contact-info-icon-simple i {
    font-size: 1.5rem;
    color: white;
}

.contact-info-content h5 {
    color: #1e3a8a;
    font-weight: 600;
}

.contact-info-content p {
    color: #64748b;
    margin: 0;
}

.contact-link-simple {
    color: #1e3a8a;
    text-decoration: none;
    transition: color 0.3s ease;
}

.contact-link-simple:hover {
    color: #3b82f6;
}

.contact-form-modern {
    background: white;
    padding: 2rem;
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
    border: 1px solid #e9ecef;
}
</style>

<?php 
// Remover JavaScript específico antigo que está causando conflito
// $additionalJS = ['assets/js/contact-form.js'];
include 'includes/footer.php'; 
?>
