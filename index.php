<?php
// Include config first
require_once 'includes/config.php';

// Configurações da página
$pageTitle = 'Programador PHP Freelancer Sorocaba SP | DevPHP Solutions';
$pageDescription = 'Programador PHP Freelancer em Sorocaba SP. Desenvolvimento Laravel, APIs, sistemas web e automações n8n. Soluções profissionais para seu negócio.';

// Configurações do Hero
$heroTitle = 'Programador PHP Freelancer<span class="d-block text-blue-200">Sorocaba, SP</span>';
$heroSubtitle = 'Desenvolvimento profissional em PHP, Framework Laravel, APIs e automações com n8n. Soluções personalizadas para impulsionar o seu negócio em Sorocaba e região.';
$heroButtons = [
    [
        'text' => 'Solicitar Orçamento Gratuito',
        'url' => url('contato'),
        'class' => 'btn btn-primary btn-lg me-3 mb-3 btn-pulse'
    ],
    [
        'text' => 'Conhecer Serviços',
        'url' => url('servicos'),
        'class' => 'btn btn-secondary btn-lg mb-3'
    ]
];
$heroBadges = ['PHP Moderno', 'Framework Laravel Expert', 'APIs RESTful', 'Automações n8n'];
$showScrollBtn = true;

// JavaScript adicional
$additionalJS = ['assets/js/testimonials.js'];

// Include header
include 'includes/header.php';
?>

<?php include 'includes/navigation.php'; ?>

    <!-- Hero Section -->
<section class="hero-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10">
                    <div class="hero-content" data-aos="fade-up" data-aos-duration="1000">
                        <h1 class="hero-title mb-4">
                        Programador PHP Freelancer<br>
                        <span class="text-blue-200">Sorocaba, SP</span>
                        </h1>
                        <p class="hero-subtitle mb-5">
                            Desenvolvimento profissional em PHP, Framework Laravel, APIs e automações com n8n. 
                            Soluções personalizadas para impulsionar o seu negócio em Sorocaba e região.
                        </p>
                    
                    <!-- Hero Buttons -->
                        <div class="hero-buttons mb-5" data-aos="fade-up" data-aos-delay="200">
                        <a href="<?php echo url('contato'); ?>" class="btn btn-cta-primary me-3 mb-3">
                                <i class="fas fa-rocket me-2"></i>
                                Solicitar Orçamento
                            </a>
                            <!-- 
                            <a href="<?php echo url('servicos'); ?>" class="btn btn-cta-secondary mb-3">
                                <i class="fas fa-eye me-2"></i>
                                Conhecer Serviços
                            </a>-->
                        </div>
                        
                    <!-- Hero Badges -->
                        <div class="hero-badges" data-aos="fade-up" data-aos-delay="400">
                            <span class="badge-custom">PHP</span>
                            <span class="badge-custom">Framework Laravel</span>
                            <span class="badge-custom">APIs RESTful</span>
                            <span class="badge-custom">Automações N8N</span>
                            <span class="badge-custom">MCP</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Scroll Button -->
            <a href="#stats-section" class="scroll-section-btn">
                <i class="fas fa-chevron-down"></i>
            </a>
        </div>
    </section>

<?php
// Incluir Stats
include 'components/stats.php';
?>

    <!-- Services Section -->
    <section class="services-section py-5 services-bg">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h2 class="section-title" data-aos="fade-up">Serviços Especializados</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Soluções completas em desenvolvimento web e mobile com foco em PHP e tecnologias modernas 
                        para empresas em Sorocaba e região
                    </p>
                </div>
            </div>
            
            <div class="row">
                <?php
                $services = [
                    [
                        'icon' => 'fas fa-code',
                        'title' => 'Desenvolvimento PHP',
                        'description' => 'Desenvolvimento de aplicações web robustas e escaláveis utilizando PHP moderno e boas práticas para empresas em Sorocaba.',
                        'delay' => '100'
                    ],
                    [
                        'icon' => 'fas fa-layer-group',
                        'title' => 'Framework Laravel',
                        'description' => 'Desenvolvimento de sistemas e aplicações web com Framework Laravel, o framework PHP mais popular e robusto do mercado.',
                        'delay' => '200'
                    ],
                    [
                        'icon' => 'fas fa-database',
                        'title' => 'Desenvolvimento de Sites',
                        'description' => 'Criação de sites institucionais, portfólios e landing pages responsivas com foco em conversão e experiência do usuário.',
                        'delay' => '300'
                    ],
                    [
                        'icon' => 'fas fa-mobile-alt',
                        'title' => 'Desenvolvimento de APP',
                        'description' => 'Criação de aplicativos móveis para Android e iOS com integração completa aos seus sistemas web e APIs.',
                        'delay' => '400'
                    ],
                    [
                        'icon' => 'fas fa-server',
                        'title' => 'Construção de APIs',
                        'description' => 'Desenvolvimento de APIs RESTful seguras e bem documentadas para integração com aplicativos móveis e web.',
                        'delay' => '500'
                    ],
                    [
                        'icon' => 'fas fa-database',
                        'title' => 'Desenvolvimento de Sistemas',
                        'description' => 'Criação de sistemas web personalizados para gestão empresarial, e-commerce e automação de processos.',
                        'delay' => '600'
                    ],
                    [
                        'icon' => 'fas fa-bolt',
                        'title' => 'Automações com n8n e IA',
                        'description' => 'Criação de fluxos de automação com n8n e integração com inteligência artificial para otimizar processos.',
                        'delay' => '700'
                    ],
                    [
                        'icon' => 'fas fa-palette',
                        'title' => 'Criação de Identidade Visual',
                        'description' => 'Desenvolvimento de logos, materiais de marketing e identidade visual completa para fortalecer sua marca no mercado digital.',
                        'delay' => '800'
                    ],
                    [
                        'icon' => 'fas fa-lightbulb',
                        'title' => 'Consultoria em Tecnologia',
                        'description' => 'Consultoria estratégica para escolha de tecnologias, arquitetura de projetos e otimização de processos.',
                        'delay' => '900'
                    ]
                ];
                
                foreach ($services as $service):
                ?>
                    <!-- Service -->
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $service['delay']; ?>">
                    <div class="service-card h-100">
                        <div class="service-icon">
                                <i class="<?php echo $service['icon']; ?>"></i>
                        </div>
                            <h3 class="service-title"><?php echo $service['title']; ?></h3>
                            <p class="service-description"><?php echo $service['description']; ?></p>
                            <a href="<?php echo url('servicos'); ?>" class="service-link">
                            Saiba mais <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Lead Capture Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row align-items-center">
                        <div class="col-lg-5 mb-4 mb-lg-0" data-aos="fade-right">
                            <h2 class="section-title mb-4">Pronto para transformar sua ideia em realidade?</h2>
                            <p class="mb-4">Receba uma análise gratuita do seu projeto e descubra como posso ajudar a impulsionar seu negócio com soluções tecnológicas personalizadas.</p>
                            
                            <div class="mb-4">
                                <div class="lead-feature-item">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Orçamento detalhado sem compromisso</span>
                                </div>
                                <div class="lead-feature-item">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Resposta em até 24 horas úteis</span>
                                </div>
                                <div class="lead-feature-item">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Consultoria inicial gratuita</span>
                                </div>
                                <div class="lead-feature-item">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Seu projeto em mãos experientes</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7" data-aos="fade-left">
                            <?php
                            // Configurações do formulário para home
                            $formTitle = 'Solicite um orçamento';
                            $formSubtitle = 'Preencha o formulário abaixo para receber uma análise gratuita do seu projeto.';
                            $formClass = 'lead-conversion-form-home';
                            $formId = 'homeContactForm';
                            $isSimplified = true;
                            $showCompany = false;
                            
                            // Incluir componente
                            include 'components/quick-contact-form.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mb-5">
                    <h2 class="section-title" data-aos="fade-up">O que dizem nossos clientes</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Experiências reais de clientes satisfeitos com nossos serviços
                    </p>
                </div>
                
                <div class="col-lg-10">
                    <div class="testimonial-carousel" data-aos="fade-up" data-aos-delay="200">
                        <div class="testimonial-slides" id="testimonialSlides">
                            <!-- Depoimento 1 -->
                            <div class="testimonial-slide">
                                <div class="testimonial-card-modern">
                                    <div class="testimonial-quote-modern">"</div>
                                    <p class="testimonial-text-modern">
                                        Trabalhar com o DevPHP Solutions foi uma experiência excepcional. O projeto foi 
                                        entregue no prazo, com qualidade superior e total transparência no processo. 
                                        Recomendo para qualquer empresa que busca excelência em desenvolvimento web.
                                    </p>
                                    <div class="testimonial-author-modern">
                                        <div class="author-avatar">JS</div>
                                        <div class="author-info">
                                            <h5 class="author-name-modern">João Silva</h5>
                                            <p class="author-position-modern">CEO, TechCorp Sorocaba</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Depoimento 2 -->
                            <div class="testimonial-slide">
                                <div class="testimonial-card-modern">
                                    <div class="testimonial-quote-modern">"</div>
                                    <p class="testimonial-text-modern">
                                        Precisava de uma solução em Laravel para minha empresa e o resultado superou todas as expectativas. 
                                        Código limpo, documentado e com suporte excepcional. Definitivamente voltarei a contratar.
                                    </p>
                                    <div class="testimonial-author-modern">
                                        <div class="author-avatar">MF</div>
                                        <div class="author-info">
                                            <h5 class="author-name-modern">Maria Fernanda</h5>
                                            <p class="author-position-modern">Diretora, Inovação Digital</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Depoimento 3 -->
                            <div class="testimonial-slide">
                                <div class="testimonial-card-modern">
                                    <div class="testimonial-quote-modern">"</div>
                                    <p class="testimonial-text-modern">
                                        A automação com n8n transformou nossos processos. Economizamos horas de trabalho manual 
                                        e ganhamos muito mais eficiência. O investimento se pagou em menos de 2 meses.
                                    </p>
                                    <div class="testimonial-author-modern">
                                        <div class="author-avatar">CA</div>
                                        <div class="author-info">
                                            <h5 class="author-name-modern">Carlos Andrade</h5>
                                            <p class="author-position-modern">Gestor de TI, LogiSys</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="testimonial-controls">
                            <button class="testimonial-btn" id="prevTestimonial">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="testimonial-btn" id="nextTestimonial">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                        
                        <div class="testimonial-dots" id="testimonialDots">
                            <div class="testimonial-dot active" data-slide="0"></div>
                            <div class="testimonial-dot" data-slide="1"></div>
                            <div class="testimonial-dot" data-slide="2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Clients Logos Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-4">
                <div class="col-lg-8">
                    <h2 class="section-title" data-aos="fade-up">Empresas que confiam em nosso trabalho</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Mais de 50 projetos entregues para empresas de diversos segmentos
                    </p>
                </div>
            </div>
            
            <div class="clients-carousel" data-aos="fade-up" data-aos-delay="200">
                <div class="clients-track">
                    <!-- Duplicamos os logos para loop infinito -->
                    <div class="client-logo-modern">
                        <img src="https://via.placeholder.com/100x40/1e3a8a/ffffff?text=TechCorp" alt="TechCorp">
                    </div>
                    <div class="client-logo-modern">
                        <img src="https://via.placeholder.com/100x40/1e3a8a/ffffff?text=Inovação" alt="Inovação Digital">
                    </div>
                    <div class="client-logo-modern">
                        <img src="https://via.placeholder.com/100x40/1e3a8a/ffffff?text=LogiSys" alt="LogiSys">
                    </div>
                    <div class="client-logo-modern">
                        <img src="https://via.placeholder.com/100x40/1e3a8a/ffffff?text=StartupSP" alt="StartupSP">
                    </div>
                    <div class="client-logo-modern">
                        <img src="https://via.placeholder.com/100x40/1e3a8a/ffffff?text=DevShop" alt="DevShop">
                    </div>
                    <div class="client-logo-modern">
                        <img src="https://via.placeholder.com/100x40/1e3a8a/ffffff?text=WebCorp" alt="WebCorp">
                    </div>
                    <div class="client-logo-modern">
                        <img src="https://via.placeholder.com/100x40/1e3a8a/ffffff?text=CloudTech" alt="CloudTech">
                    </div>
                    <div class="client-logo-modern">
                        <img src="https://via.placeholder.com/100x40/1e3a8a/ffffff?text=DataSoft" alt="DataSoft">
                    </div>
                    <!-- Duplicate for infinite loop -->
                    <div class="client-logo-modern">
                        <img src="https://via.placeholder.com/100x40/1e3a8a/ffffff?text=TechCorp" alt="TechCorp">
                    </div>
                    <div class="client-logo-modern">
                        <img src="https://via.placeholder.com/100x40/1e3a8a/ffffff?text=Inovação" alt="Inovação Digital">
                    </div>
                    <div class="client-logo-modern">
                        <img src="https://via.placeholder.com/100x40/1e3a8a/ffffff?text=LogiSys" alt="LogiSys">
                    </div>
                    <div class="client-logo-modern">
                        <img src="https://via.placeholder.com/100x40/1e3a8a/ffffff?text=StartupSP" alt="StartupSP">
                    </div>
                    <div class="client-logo-modern">
                        <img src="https://via.placeholder.com/100x40/1e3a8a/ffffff?text=DevShop" alt="DevShop">
                    </div>
                    <div class="client-logo-modern">
                        <img src="https://via.placeholder.com/100x40/1e3a8a/ffffff?text=WebCorp" alt="WebCorp">
                    </div>
                    <div class="client-logo-modern">
                        <img src="https://via.placeholder.com/100x40/1e3a8a/ffffff?text=CloudTech" alt="CloudTech">
                    </div>
                    <div class="client-logo-modern">
                        <img src="https://via.placeholder.com/100x40/1e3a8a/ffffff?text=DataSoft" alt="DataSoft">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'components/cta-section.php'; ?>

<?php include 'includes/footer.php'; ?>
