<?php
// Configurações da página - Otimizadas para SEO
$pageTitle = 'Serviços Desenvolvimento PHP Freelancer | Especialista Laravel, APIs, N8N, MCP e automações';
$pageDescription = 'Serviços especializados em desenvolvimento PHP: Laravel, APIs REST, sistemas web, apps móveis, automações n8n. Programador PHP freelancer Sorocaba SP. Orçamento gratuito!';
$pageKeywords = 'desenvolvimento php, laravel framework, apis rest, sistemas web, manutenção php, programador php freelancer, desenvolvimento sob demanda, sorocaba sp';

// Configurações do Hero interno
$heroTitle = 'Soluções Personalizadas para Seu Negócio';
$heroSubtitle = 'Desenvolvimento PHP, Laravel, APIs e automações que transformam suas ideias em realidade digital';
$isInternal = true;

// Include header
include 'includes/header.php';
include 'includes/navigation.php';

// Incluir Hero
include 'components/hero.php';
?>

    <!-- SEO: Comentário HTML - Página de serviços especializados em PHP -->
    <!-- Services Section -->
    <section class="py-5 bg-light" role="main" aria-labelledby="services-main-title">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8 fade-up">
                    <!-- SEO: H1 principal da página otimizado -->
                    <h1 id="services-main-title" class="section-title">Nossos Serviços</h1>
                    <p class="section-subtitle">
                        Soluções personalizadas para cada necessidade do seu negócio
                    </p>
                </div>
            </div>

            <div class="row g-4" role="list" aria-label="Lista detalhada de serviços de desenvolvimento">
                <?php
                $detailedServices = [
                    [
                        'icon' => 'fas fa-code',
                        'title' => 'Desenvolvimento PHP',
                        'subtitle' => 'Aplicações robustas e escaláveis',
                        'description' => 'Desenvolvimento de aplicações web robustas e escaláveis utilizando PHP moderno e boas práticas de programação. Crio soluções personalizadas que atendem às necessidades específicas do seu negócio.',
                        'features' => [
                            ['PHP 7.4+ e PHP 8.x', 'Orientação a objetos', 'Integração com bancos'],
                            ['Autenticação segura', 'Otimização de performance', 'Código documentado']
                        ],
                        'animation' => 'fade-up',
                        'aria_label' => 'Desenvolvimento PHP moderno para aplicações web robustas'
                    ],
                    [
                        'icon' => 'fas fa-layer-group',
                        'title' => 'Laravel',
                        'subtitle' => 'Framework PHP mais popular',
                        'description' => 'Desenvolvimento de sistemas e aplicações web com Laravel, o framework PHP mais popular e robusto do mercado. Utilizo todo o potencial do Laravel para criar soluções elegantes e de fácil manutenção.',
                        'features' => [
                            ['Laravel mais recente', 'APIs RESTful', 'Eloquent ORM'],
                            ['Autenticação Sanctum', 'Filas e jobs', 'Testes automatizados']
                        ],
                        'animation' => 'fade-left',
                        'aria_label' => 'Desenvolvimento com Framework Laravel para sistemas profissionais'
                    ],
                    [
                        'icon' => 'fas fa-globe',
                        'title' => 'Desenvolvimento de Sites',
                        'subtitle' => 'Sites responsivos e modernos',
                        'description' => 'Criação de sites institucionais, portfólios e landing pages com design responsivo e foco na experiência do usuário e conversão. Desenvolvimento com as melhores práticas de SEO e performance.',
                        'features' => [
                            ['Design responsivo', 'Otimização SEO', 'Alta performance'],
                            ['UX/UI moderno', 'Formulários de contato', 'Integração com Analytics']
                        ],
                        'animation' => 'fade-right',
                        'aria_label' => 'Criação de sites responsivos com foco em SEO e conversão'
                    ],
                    [
                        'icon' => 'fas fa-mobile-alt',
                        'title' => 'Desenvolvimento de APP (Android e iOS)',
                        'subtitle' => 'Apps nativos e híbridos',
                        'description' => 'Criação de aplicativos móveis nativos e híbridos para Android e iOS com integração completa aos seus sistemas web e APIs.',
                        'features' => [
                            ['React Native', 'Flutter', 'Nativo'],
                            ['API Integration', 'Push Notifications', 'App Store']
                        ],
                        'animation' => 'fade-up',
                        'aria_label' => 'Desenvolvimento de aplicativos móveis para Android e iOS'
                    ]
                ];

                foreach ($detailedServices as $index => $service):
                ?>
                    <!-- Service -->
                    <div class="col-lg-6 <?php echo $service['animation']; ?>" role="listitem">
                    <article class="service-detail-card" itemscope itemtype="https://schema.org/Service">
                        <div class="service-detail-header">
                            <div class="service-detail-icon" aria-hidden="true">
                                    <i class="<?php echo $service['icon']; ?>"></i>
                            </div>
                            <div>
                                    <!-- SEO: H2 para cada serviço com palavras-chave específicas -->
                                    <h2 class="service-detail-title" itemprop="name"><?php echo $service['title']; ?></h2>
                                    <p class="service-detail-subtitle" itemprop="category"><?php echo $service['subtitle']; ?></p>
                            </div>
                        </div>
                        <div class="service-detail-body">
                                <p itemprop="description"><?php echo $service['description']; ?></p>
                            
                            <div class="service-features" role="list" aria-label="Recursos do serviço <?php echo $service['title']; ?>">
                                <div class="row">
                                        <?php foreach ($service['features'] as $featureGroup): ?>
                                    <div class="col-md-6">
                                        <ul class="service-features-list">
                                                    <?php foreach ($featureGroup as $feature): ?>
                                                        <li role="listitem"><i class="fas fa-check-circle text-accent" aria-hidden="true"></i> <?php echo $feature; ?></li>
                                                    <?php endforeach; ?>
                                        </ul>
                                    </div>
                                        <?php endforeach; ?>
                                </div>
                            </div>
                            
                            <div class="service-detail-footer">
                                    <a href="<?php echo url('contato'); ?>" class="btn-primary-standard" 
                                       aria-label="<?php echo $service['aria_label']; ?> - Solicitar orçamento" 
                                       itemprop="url">
                                        <i class="fas fa-calculator me-2" aria-hidden="true"></i>
                                        Solicitar Orçamento
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- SEO: Seção adicional com mais serviços -->
            <div class="row mt-5">
                <div class="col-12 text-center fade-up">
                    <h2 class="section-title mb-4">Outros Serviços Especializados</h2>
                    <div class="row g-3">
                        <div class="col-md-4 fade-left">
                            <div class="additional-service-card" itemscope itemtype="https://schema.org/Service">
                                <i class="fas fa-server service-extra-icon" aria-hidden="true"></i>
                                <h3 class="service-extra-title" itemprop="name">APIs RESTful</h3>
                                <p class="service-extra-desc" itemprop="description">Integração e desenvolvimento de APIs seguras</p>
                            </div>
                        </div>
                        <div class="col-md-4 fade-up">
                            <div class="additional-service-card" itemscope itemtype="https://schema.org/Service">
                                <i class="fas fa-bolt service-extra-icon" aria-hidden="true"></i>
                                <h3 class="service-extra-title" itemprop="name">Automações n8n</h3>
                                <p class="service-extra-desc" itemprop="description">Automação de processos com IA</p>
                            </div>
                        </div>
                        <div class="col-md-4 fade-right">
                            <div class="additional-service-card" itemscope itemtype="https://schema.org/Service">
                                <i class="fas fa-tools service-extra-icon" aria-hidden="true"></i>
                                <h3 class="service-extra-title" itemprop="name">Manutenção PHP</h3>
                                <p class="service-extra-desc" itemprop="description">Suporte e manutenção de sistemas existentes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'components/cta-section.php'; ?>

<?php include 'includes/footer.php'; ?>
