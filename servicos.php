<?php
// Configurações da página
$pageTitle = 'Serviços Especializados em PHP | DevPHP Solutions';
$pageDescription = 'Soluções completas para o desenvolvimento do seu projeto web com tecnologias modernas. Desenvolvimento PHP, Laravel, APIs e automações.';

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

    <!-- Services Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h2 class="section-title" data-aos="fade-up">Nossos Serviços</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Soluções personalizadas para cada necessidade do seu negócio
                    </p>
                </div>
            </div>

            <div class="row g-4">
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
                        'delay' => '100'
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
                        'delay' => '200'
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
                        'delay' => '300'
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
                        'delay' => '400'
                    ]
                ];

                foreach ($detailedServices as $service):
                ?>
                    <!-- Service -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="<?php echo $service['delay']; ?>">
                    <div class="service-detail-card">
                        <div class="service-detail-header">
                            <div class="service-detail-icon">
                                    <i class="<?php echo $service['icon']; ?>"></i>
                            </div>
                            <div>
                                    <h3 class="service-detail-title"><?php echo $service['title']; ?></h3>
                                    <p class="service-detail-subtitle"><?php echo $service['subtitle']; ?></p>
                            </div>
                        </div>
                        <div class="service-detail-body">
                                <p><?php echo $service['description']; ?></p>
                            
                            <div class="service-features">
                                <div class="row">
                                        <?php foreach ($service['features'] as $featureGroup): ?>
                                    <div class="col-md-6">
                                        <ul class="service-features-list">
                                                    <?php foreach ($featureGroup as $feature): ?>
                                                        <li><i class="fas fa-check-circle text-accent"></i> <?php echo $feature; ?></li>
                                                    <?php endforeach; ?>
                                        </ul>
                                    </div>
                                        <?php endforeach; ?>
                                </div>
                            </div>
                            
                            <div class="service-detail-footer">
                                    <a href="<?php echo url('contato'); ?>" class="btn-primary-standard">
                                        <i class="fas fa-calculator me-2"></i>
                                        Solicitar Orçamento
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php include 'components/cta-section.php'; ?>

<?php include 'includes/footer.php'; ?>
