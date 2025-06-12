<?php
// Include config first
require_once 'includes/config.php';

// Configurações da página - Otimizadas para SEO
$pageTitle = 'Programador PHP Freelancer Sorocaba SP | Especialista Laravel & APIs';
$pageDescription = 'Programador PHP freelancer Sorocaba SP com +20 anos experiência. Desenvolvimento Laravel, APIs REST, automações n8n, sistemas web sob demanda. Orçamento gratuito!';
$pageKeywords = 'programador php freelancer, desenvolvedor php, desenvolvimento php sob demanda, manutenção sistemas php, especialista php, freelancer php brasil, integração api php, laravel freelancer, programador php sorocaba';

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
<section class="hero-section" role="banner" aria-labelledby="hero-title">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10">
                    <div class="hero-content">
                        
                        <h1 id="hero-title" class="hero-title mb-4" itemprop="headline">
                        Programador PHP Freelancer<br>
                        <span class="text-blue-200">Sorocaba, SP</span>
                        </h1>
                        <p class="hero-subtitle mb-5" itemprop="description">
                            Desenvolvimento profissional em PHP, Framework Laravel, APIs e automações com n8n. 
                            Soluções personalizadas para impulsionar o seu negócio em Sorocaba e região.
                        </p>
                    
                    <!-- Hero Buttons -->
                        <div class="hero-buttons mb-5" role="group" aria-label="Ações principais">
                        <a href="<?php echo url('contato'); ?>" class="btn btn-cta-primary me-3 mb-3" 
                           aria-label="Solicitar orçamento gratuito para desenvolvimento PHP">
                                <i class="fas fa-rocket me-2" aria-hidden="true"></i>
                                Solicitar Orçamento
                            </a>
                            <!-- 
                            <a href="<?php echo url('servicos'); ?>" class="btn btn-cta-secondary mb-3">
                                <i class="fas fa-eye me-2"></i>
                                Conhecer Serviços
                            </a>-->
                        </div>
                        
                                            <!-- Hero Badges -->
                        <div class="hero-badges" role="list" aria-label="Tecnologias especializadas">
                            <span class="badge-custom" role="listitem">PHP</span>
                            <span class="badge-custom" role="listitem">Framework Laravel</span>
                            <span class="badge-custom" role="listitem">APIs RESTful</span>
                            <span class="badge-custom" role="listitem">Automações N8N</span>
                            <span class="badge-custom" role="listitem">MCP</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Scroll Button -->
            <a href="#stats-section" class="scroll-section-btn" aria-label="Rolar para estatísticas">
                <i class="fas fa-chevron-down" aria-hidden="true"></i>
            </a>
        </div>
    </section>

<?php
// Incluir Stats
include 'components/stats.php';
?>

    <!-- Services Section -->
    <section class="services-section py-5 services-bg" role="main" aria-labelledby="services-title">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">

                    <h2 id="services-title" class="section-title fade-up">Serviços Especializados</h2>
                    <p class="section-subtitle fade-up">
                        Soluções completas em desenvolvimento web e mobile com foco em PHP e tecnologias modernas 
                        para empresas em Sorocaba e região
                    </p>
                </div>
            </div>
            
            <div class="row" role="list" aria-label="Lista de serviços de desenvolvimento">
                <?php
                $services = [
                    [
                        'icon' => 'fas fa-code',
                        'title' => 'Desenvolvimento PHP',
                        'description' => 'Desenvolvimento de aplicações web robustas e escaláveis utilizando PHP moderno e boas práticas para empresas em Sorocaba.',
                        'delay' => '100',
                        'aria_label' => 'Serviço de desenvolvimento PHP para aplicações web'
                    ],
                    [
                        'icon' => 'fas fa-layer-group', 
                        'title' => 'Framework Laravel',
                        'description' => 'Desenvolvimento de sistemas e aplicações web com Framework Laravel, o framework PHP mais popular e robusto do mercado.',
                        'delay' => '200',
                        'aria_label' => 'Desenvolvimento com Framework Laravel para sistemas web'
                    ],
                    [
                        'icon' => 'fas fa-database',
                        'title' => 'Desenvolvimento de Sites',
                        'description' => 'Criação de sites institucionais, portfólios e landing pages responsivas com foco em conversão e experiência do usuário.',
                        'delay' => '300',
                        'aria_label' => 'Criação de sites responsivos e otimizados'
                    ],
                    [
                        'icon' => 'fas fa-mobile-alt',
                        'title' => 'Desenvolvimento de APP',
                        'description' => 'Criação de aplicativos móveis para Android e iOS com integração completa aos seus sistemas web e APIs.',
                        'delay' => '400',
                        'aria_label' => 'Desenvolvimento de aplicativos móveis Android e iOS'
                    ],
                    [
                        'icon' => 'fas fa-server',
                        'title' => 'Construção de APIs',
                        'description' => 'Desenvolvimento de APIs RESTful seguras e bem documentadas para integração com aplicativos móveis e web.',
                        'delay' => '500',
                        'aria_label' => 'Desenvolvimento de APIs RESTful para integração'
                    ],
                    [
                        'icon' => 'fas fa-database',
                        'title' => 'Desenvolvimento de Sistemas',
                        'description' => 'Criação de sistemas web personalizados para gestão empresarial, e-commerce e automação de processos.',
                        'delay' => '600',
                        'aria_label' => 'Desenvolvimento de sistemas web personalizados'
                    ],
                    [
                        'icon' => 'fas fa-bolt',
                        'title' => 'Automações com n8n e IA',
                        'description' => 'Criação de fluxos de automação com n8n e integração com inteligência artificial para otimizar processos.',
                        'delay' => '700',
                        'aria_label' => 'Automações empresariais com n8n e inteligência artificial'
                    ],
                    [
                        'icon' => 'fas fa-palette',
                        'title' => 'Criação de Identidade Visual',
                        'description' => 'Desenvolvimento de logos, materiais de marketing e identidade visual completa para fortalecer sua marca no mercado digital.',
                        'delay' => '800',
                        'aria_label' => 'Criação de identidade visual e branding'
                    ],
                    [
                        'icon' => 'fas fa-lightbulb',
                        'title' => 'Consultoria em Tecnologia',
                        'description' => 'Consultoria estratégica para escolha de tecnologias, arquitetura de projetos e otimização de processos.',
                        'delay' => '900',
                        'aria_label' => 'Consultoria especializada em tecnologia e arquitetura'
                    ]
                ];
                
                foreach ($services as $service):
                ?>
                    <!-- Service -->
                    <div class="col-lg-4 col-md-6 mb-4" role="listitem">
                    <article class="service-card h-100" itemscope itemtype="https://schema.org/Service">
                        <div class="service-icon" aria-hidden="true">
                                <i class="<?php echo $service['icon']; ?>"></i>
                        </div>

                            <h3 class="service-title" itemprop="name"><?php echo $service['title']; ?></h3>
                            <p class="service-description" itemprop="description"><?php echo $service['description']; ?></p>
                            <a href="<?php echo url('servicos'); ?>" class="service-link" 
                               aria-label="<?php echo $service['aria_label']; ?>" itemprop="url">
                            Saiba mais <i class="fas fa-arrow-right ms-2" aria-hidden="true"></i>
                        </a>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Lead Capture Section -->
    <section class="py-5 bg-white" role="complementary" aria-labelledby="lead-capture-title">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row align-items-center">
                        <div class="col-lg-5 mb-4 mb-lg-0 fade-left">

                            <h2 id="lead-capture-title" class="section-title mb-4">Pronto para transformar sua ideia em realidade?</h2>
                            <p class="mb-4">Receba uma análise gratuita do seu projeto e descubra como posso ajudar a impulsionar seu negócio com soluções tecnológicas personalizadas.</p>
                            
                            <div class="mb-4" role="list" aria-label="Benefícios do orçamento gratuito">
                                <div class="lead-feature-item" role="listitem">
                                    <i class="fas fa-check-circle" aria-hidden="true"></i>
                                    <span>Orçamento detalhado sem compromisso</span>
                                </div>
                                <div class="lead-feature-item" role="listitem">
                                    <i class="fas fa-check-circle" aria-hidden="true"></i>
                                    <span>Resposta em até 24 horas úteis</span>
                                </div>
                                <div class="lead-feature-item" role="listitem">
                                    <i class="fas fa-check-circle" aria-hidden="true"></i>
                                    <span>Consultoria inicial gratuita</span>
                                </div>
                                <div class="lead-feature-item" role="listitem">
                                    <i class="fas fa-check-circle" aria-hidden="true"></i>
                                    <span>Seu projeto em mãos experientes</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 fade-right">
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
    <section class="py-5 bg-white" role="complementary" aria-labelledby="testimonials-title">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mb-5">

                    <h2 id="testimonials-title" class="section-title fade-up">O que dizem nossos clientes</h2>
                    <p class="section-subtitle fade-up">
                        Experiências reais de clientes satisfeitos com nossos serviços
                    </p>
                </div>
                
                <div class="col-lg-10">
                    <div class="testimonial-carousel" role="region" aria-label="Carrossel de depoimentos de clientes">
                        <div class="testimonial-slides" id="testimonialSlides">
                            <!-- Depoimento 1 -->
                            <div class="testimonial-slide">
                                <article class="testimonial-card-modern" itemscope itemtype="https://schema.org/Review">
                                    <div class="testimonial-quote-modern" aria-hidden="true">"</div>
                                    <blockquote class="testimonial-text-modern" itemprop="reviewBody">
                                        Trabalhar o MB foi uma experiência excepcional. O projeto foi 
                                        entregue no prazo, com qualidade superior e total transparência no processo. 
                                        Recomendo para qualquer empresa que busca excelência em desenvolvimento web.
                                    </blockquote>
                                    <div class="testimonial-author-modern">
                                        <div class="author-avatar">JS</div>
                                        <div class="author-info">
                                            <h4 class="author-name-modern">João Silva</h4>
                                            <p class="author-position-modern">CEO, TechCorp Sorocaba</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            
                            <!-- Depoimento 2 -->
                            <div class="testimonial-slide">
                                <article class="testimonial-card-modern" itemscope itemtype="https://schema.org/Review">
                                    <div class="testimonial-quote-modern" aria-hidden="true">"</div>
                                    <blockquote class="testimonial-text-modern" itemprop="reviewBody">
                                        Precisava de uma solução em Laravel para minha empresa e o resultado superou todas as expectativas. 
                                        Código limpo, documentado e com suporte excepcional. Definitivamente voltarei a contratar.
                                    </blockquote>
                                    <div class="testimonial-author-modern">
                                        <div class="author-avatar">MF</div>
                                        <div class="author-info">
                                            <h4 class="author-name-modern">Maria Fernanda</h4>
                                            <p class="author-position-modern">Diretora, Inovação Digital</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            
                            <!-- Depoimento 3 -->
                            <div class="testimonial-slide">
                                <article class="testimonial-card-modern" itemscope itemtype="https://schema.org/Review">
                                    <div class="testimonial-quote-modern" aria-hidden="true">"</div>
                                    <blockquote class="testimonial-text-modern" itemprop="reviewBody">
                                        A automação com n8n transformou nossos processos. Economizamos horas de trabalho manual 
                                        e ganhamos muito mais eficiência. O investimento se pagou em menos de 2 meses.
                                    </blockquote>
                                    <div class="testimonial-author-modern">
                                        <div class="author-avatar">CA</div>
                                        <div class="author-info">
                                            <h4 class="author-name-modern">Carlos Andrade</h4>
                                            <p class="author-position-modern">Gestor de TI, LogiSys</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        
                        <div class="testimonial-controls">
                            <button class="testimonial-btn" id="prevTestimonial" aria-label="Depoimento anterior">
                                <i class="fas fa-chevron-left" aria-hidden="true"></i>
                            </button>
                            <button class="testimonial-btn" id="nextTestimonial" aria-label="Próximo depoimento">
                                <i class="fas fa-chevron-right" aria-hidden="true"></i>
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
                    <h2 class="section-title fade-up">Empresas que confiam em nosso trabalho</h2>
                    <p class="section-subtitle fade-up">
                        Mais de 50 projetos entregues para empresas de diversos segmentos
                    </p>
                </div>
            </div>
            
            <div class="clients-carousel">
                <div class="clients-track">
                    <!-- Duplicamos os logos para loop infinito -->
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
                    <div class="client-logo-modern">
                        <svg width="100" height="40" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg" aria-labelledby="logisys-title">
                            <title id="logisys-title">LogiSys</title>
                            <rect width="100" height="40" fill="#1e3a8a" rx="4"/>
                            <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-size="12" font-weight="bold">LogiSys</text>
                        </svg>
                    </div>
                    <div class="client-logo-modern">
                        <svg width="100" height="40" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg" aria-labelledby="startupsp-title">
                            <title id="startupsp-title">StartupSP</title>
                            <rect width="100" height="40" fill="#1e3a8a" rx="4"/>
                            <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-size="11" font-weight="bold">StartupSP</text>
                        </svg>
                    </div>
                    <div class="client-logo-modern">
                        <svg width="100" height="40" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg" aria-labelledby="devshop-title">
                            <title id="devshop-title">DevShop</title>
                            <rect width="100" height="40" fill="#1e3a8a" rx="4"/>
                            <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-size="12" font-weight="bold">DevShop</text>
                        </svg>
                    </div>
                    <div class="client-logo-modern">
                        <svg width="100" height="40" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg" aria-labelledby="webcorp-title">
                            <title id="webcorp-title">WebCorp</title>
                            <rect width="100" height="40" fill="#1e3a8a" rx="4"/>
                            <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-size="12" font-weight="bold">WebCorp</text>
                        </svg>
                    </div>
                    <div class="client-logo-modern">
                        <svg width="100" height="40" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg" aria-labelledby="cloudtech-title">
                            <title id="cloudtech-title">CloudTech</title>
                            <rect width="100" height="40" fill="#1e3a8a" rx="4"/>
                            <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-size="11" font-weight="bold">CloudTech</text>
                        </svg>
                    </div>
                    <div class="client-logo-modern">
                        <svg width="100" height="40" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg" aria-labelledby="datasoft-title">
                            <title id="datasoft-title">DataSoft</title>
                            <rect width="100" height="40" fill="#1e3a8a" rx="4"/>
                            <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-size="11" font-weight="bold">DataSoft</text>
                        </svg>
                    </div>
                    <!-- Duplicate for infinite loop -->
                    <div class="client-logo-modern">
                        <svg width="100" height="40" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg" aria-labelledby="techcorp-title2">
                            <title id="techcorp-title2">TechCorp</title>
                            <rect width="100" height="40" fill="#1e3a8a" rx="4"/>
                            <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-size="12" font-weight="bold">TechCorp</text>
                        </svg>
                    </div>
                    <div class="client-logo-modern">
                        <svg width="100" height="40" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg" aria-labelledby="inovacao-title2">
                            <title id="inovacao-title2">Inovação Digital</title>
                            <rect width="100" height="40" fill="#1e3a8a" rx="4"/>
                            <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-size="10" font-weight="bold">Inovação</text>
                        </svg>
                    </div>
                    <div class="client-logo-modern">
                        <svg width="100" height="40" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg" aria-labelledby="logisys-title2">
                            <title id="logisys-title2">LogiSys</title>
                            <rect width="100" height="40" fill="#1e3a8a" rx="4"/>
                            <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-size="12" font-weight="bold">LogiSys</text>
                        </svg>
                    </div>
                    <div class="client-logo-modern">
                        <svg width="100" height="40" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg" aria-labelledby="startupsp-title2">
                            <title id="startupsp-title2">StartupSP</title>
                            <rect width="100" height="40" fill="#1e3a8a" rx="4"/>
                            <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-size="11" font-weight="bold">StartupSP</text>
                        </svg>
                    </div>
                    <div class="client-logo-modern">
                        <svg width="100" height="40" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg" aria-labelledby="devshop-title2">
                            <title id="devshop-title2">DevShop</title>
                            <rect width="100" height="40" fill="#1e3a8a" rx="4"/>
                            <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-size="12" font-weight="bold">DevShop</text>
                        </svg>
                    </div>
                    <div class="client-logo-modern">
                        <svg width="100" height="40" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg" aria-labelledby="webcorp-title2">
                            <title id="webcorp-title2">WebCorp</title>
                            <rect width="100" height="40" fill="#1e3a8a" rx="4"/>
                            <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-size="12" font-weight="bold">WebCorp</text>
                        </svg>
                    </div>
                    <div class="client-logo-modern">
                        <svg width="100" height="40" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg" aria-labelledby="cloudtech-title2">
                            <title id="cloudtech-title2">CloudTech</title>
                            <rect width="100" height="40" fill="#1e3a8a" rx="4"/>
                            <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-size="11" font-weight="bold">CloudTech</text>
                        </svg>
                    </div>
                    <div class="client-logo-modern">
                        <svg width="100" height="40" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg" aria-labelledby="datasoft-title2">
                            <title id="datasoft-title2">DataSoft</title>
                            <rect width="100" height="40" fill="#1e3a8a" rx="4"/>
                            <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-size="11" font-weight="bold">DataSoft</text>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'components/cta-section.php'; ?>

<?php include 'includes/footer.php'; ?>
