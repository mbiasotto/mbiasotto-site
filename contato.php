<?php
// Configurações da página
$pageTitle = 'Contato | Maurício Biasotto';
$pageDescription = 'Entre em contato para solicitar seu orçamento. Desenvolvimento PHP, Laravel, APIs e automações para sua empresa.';

// Include header
include 'includes/header.php';
include 'includes/navigation.php';
?>

    <!-- Hero Section -->
    <section class="hero-section hero-internal">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="hero-content" data-aos="fade-up">
                        <h1 class="hero-title mb-4">Vamos Transformar Sua Ideia em Realidade</h1>
                        <p class="hero-subtitle mb-5">Conte-me sobre seu projeto e receba uma proposta personalizada em até 24 horas</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
    <!-- Contact Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- Informações de Contato -->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="contact-info-simple p-4 h-100">
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
                                <p class="mb-0">Sorocaba, SP - Brasil</p>
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
                    <div class="contact-form-modern">
                        
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
                                    <label class="form-label">Telefone</label>
                                    <input type="tel" name="telefone" class="form-control" placeholder="(15) 99999-9999">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Empresa</label>
                                    <input type="text" name="empresa" class="form-control" placeholder="Nome da empresa">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Tipo de Projeto *</label>
                                <select name="tipo_projeto" class="form-select" required>
                                    <option value="">Selecione o tipo de projeto</option>
                                    <option value="desenvolvimento-php">Desenvolvimento PHP</option>
                                    <option value="laravel">Sistema Laravel</option>
                                    <option value="site">Desenvolvimento de Site</option>
                                    <option value="api">Construção de API</option>
                                    <option value="app">Desenvolvimento de APP</option>
                                    <option value="sistema">Sistema Personalizado</option>
                                    <option value="automacao">Automação com n8n</option>
                                    <option value="consultoria">Consultoria</option>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Orçamento Previsto</label>
                                <select name="orcamento" class="form-select">
                                    <option value="">Selecione uma faixa de orçamento</option>
                                    <option value="ate-5k">Até R$ 5.000</option>
                                    <option value="5k-10k">R$ 5.000 - R$ 10.000</option>
                                    <option value="10k-20k">R$ 10.000 - R$ 20.000</option>
                                    <option value="20k-mais">Acima de R$ 20.000</option>
                                    <option value="nao-definido">Ainda não defini</option>
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label">Descrição do Projeto *</label>
                                <textarea name="mensagem" class="form-control" rows="5" placeholder="Descreva seu projeto, objetivos e funcionalidades desejadas..." required minlength="10"></textarea>
                            </div>
                            
                            <div class="text-center">
                                <button type="button" class="btn-form-submit" id="submitBtn" onclick="submitContactForm()">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    <span class="btn-text">Enviar Mensagem</span>
                                    <span class="spinner-border spinner-border-sm d-none ms-2" role="status"></span>
                                </button>
                            </div>
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
                <div class="col-lg-8 text-center mb-5">
                    <h2 class="section-title">Perguntas Frequentes</h2>
                    <p class="section-subtitle">Respostas para as dúvidas mais comuns sobre meus serviços</p>
                </div>
                
                <div class="col-lg-10">
                    <div class="accordion" id="faqAccordion">
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
// Adicionar JavaScript específico para a página de contato
$additionalJS = ['assets/js/contact-form.js'];
include 'includes/footer.php'; 
?>
