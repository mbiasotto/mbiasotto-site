<?php
// Configurações da página - Otimizadas para SEO
$pageTitle = 'Serviços Desenvolvimento PHP Freelancer Sorocaba / São Paulo | Especialista Laravel, APPs, APIs, N8N, MCP, ChatBots e automações';
$pageDescription = 'Serviços especializados em desenvolvimento PHP: Laravel, APIs REST, sistemas web, apps móveis, automações N8N. Programador PHP freelancer Sorocaba SP. Orçamento gratuito!';
$pageKeywords = 'desenvolvimento php, laravel framework, apis rest, sistemas web, manutenção php, programador php freelancer, desenvolvimento sob demanda, sorocaba sp';

// Configurações do Hero interno
$heroTitle = 'Soluções personalizadas para seu negócio (PHP, Laravel, APPs, APIs, N8N, MCP, ChatBots e automações)';
$heroSubtitle = 'Desenvolvimento PHP Freelancer, Laravel, APIs, N8N, MCP, ChatBots e automações que transformam suas ideias em realidade digital';
$isInternal = true;

// Include header
include 'includes/header.php';
include 'includes/navigation.php';

// Incluir Hero
include 'components/hero.php';
?>

    <!-- Services Section -->
    <section class="py-5 bg-light" role="main" aria-labelledby="services-main-title">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8 fade-up">
                    <h1 id="services-main-title" class="section-title">Nossos Serviços <BR><span class="text-blue-200">Freelancer - Sorocaba / São Paulo</span></h1>
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
                        'aria_label' => 'Desenvolvimento PHP moderno para aplicações web robustas',
                        'link' => 'desenvolvimento-php'
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
                        'aria_label' => 'Desenvolvimento com Framework Laravel para sistemas profissionais',
                        'link' => 'framework-laravel'
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
                        'aria_label' => 'Criação de sites responsivos com foco em SEO e conversão',
                        'link' => 'desenvolvimento-sites'
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
                        'aria_label' => 'Desenvolvimento de aplicativos móveis para Android e iOS',
                        'link' => 'desenvolvimento-app'
                    ],
                    [
                        'icon' => 'fas fa-server',
                        'title' => 'Construção de APIs',
                        'subtitle' => 'APIs RESTful seguras',
                        'description' => 'Desenvolvimento de APIs RESTful seguras e bem documentadas para integração com aplicativos móveis e web.',
                        'features' => [
                            ['RESTful', 'Autenticação JWT', 'Documentação'],
                            ['Rate limiting', 'Versionamento', 'Testes unitários']
                        ],
                        'animation' => 'fade-left',
                        'aria_label' => 'Desenvolvimento de APIs RESTful para integração',
                        'link' => 'construcao-apis'
                    ],
                    [
                        'icon' => 'fas fa-database',
                        'title' => 'Desenvolvimento de Sistemas',
                        'subtitle' => 'Sistemas personalizados',
                        'description' => 'Criação de sistemas web personalizados para gestão empresarial, e-commerce e automação de processos.',
                        'features' => [
                            ['Gestão empresarial', 'E-commerce', 'CRM/ERP'],
                            ['Relatórios', 'Dashboards', 'Integração']
                        ],
                        'animation' => 'fade-right',
                        'aria_label' => 'Desenvolvimento de sistemas web personalizados',
                        'link' => 'desenvolvimento-sistemas'
                    ],
                    [
                        'icon' => 'fas fa-robot',
                        'title' => 'Automações com N8N e IA',
                        'subtitle' => 'Automação inteligente',
                        'description' => 'Criação de fluxos de automação com N8N e integração com inteligência artificial para otimizar processos.',
                        'features' => [
                            ['N8N workflows', 'IA integrada', 'WhatsApp Bot'],
                            ['Automação processos', 'Integração APIs', 'ChatBots']
                        ],
                        'animation' => 'fade-up',
                        'aria_label' => 'Automações empresariais com N8N e inteligência artificial',
                        'link' => 'automacoes-n8n-ia'
                    ],
                    [
                        'icon' => 'fas fa-brain',
                        'title' => 'Gestor de IA',
                        'subtitle' => 'Inteligência Artificial para Negócios',
                        'description' => 'Análise e implementação de soluções de IA para otimizar processos, automatizar tarefas e melhorar a tomada de decisão na sua empresa.',
                        'features' => [
                            ['Análise de Processos', 'Implementação de Chatbots', 'Automação com n8n'],
                            ['Integração com ChatGPT', 'Otimização de Custos', 'Suporte Especializado']
                        ],
                        'animation' => 'fade-right',
                        'aria_label' => 'Serviços de Gestor de IA para otimização de negócios',
                        'link' => 'gestor-de-ia'
                    ],
                    [
                        'icon' => 'fas fa-cogs',
                        'title' => 'Agentes de IA',
                        'subtitle' => 'Automação de Tarefas Complexas',
                        'description' => 'Desenvolvimento de agentes autônomos que planejam e executam tarefas de ponta a ponta, como prospecção, pesquisa e análise de dados.',
                        'features' => [
                            ['Agentes de Prospecção', 'Pesquisa de Mercado', 'Análise de Concorrentes'],
                            ['Gerenciamento de Processos', 'Suporte Inteligente', 'Execução 24/7']
                        ],
                        'animation' => 'fade-left',
                        'aria_label' => 'Desenvolvimento de Agentes de IA autônomos',
                        'link' => 'agentes-de-ia'
                    ],
                    [
                        'icon' => 'fas fa-palette',
                        'title' => 'Criação de Identidade Visual',
                        'subtitle' => 'Branding completo',
                        'description' => 'Desenvolvimento de logos, materiais de marketing e identidade visual completa para fortalecer sua marca no mercado digital.',
                        'features' => [
                            ['Logo profissional', 'Manual da marca', 'Paleta de cores'],
                            ['Materiais gráficos', 'Cartão de visita', 'Papelaria']
                        ],
                        'animation' => 'fade-left',
                        'aria_label' => 'Criação de identidade visual e branding',
                        'link' => 'identidade-visual'
                    ],
                    [
                        'icon' => 'fas fa-search',
                        'title' => 'Otimização SEO para Sites',
                        'subtitle' => 'Melhore seu posicionamento',
                        'description' => 'Otimização SEO completa para melhorar o posicionamento do seu site nos mecanismos de busca e aumentar o tráfego orgânico.',
                        'features' => [
                            ['Auditoria SEO', 'Meta tags', 'Schema markup'],
                            ['Velocidade', 'Tráfego orgânico', 'Relatórios']
                        ],
                        'animation' => 'fade-right',
                        'aria_label' => 'Otimização SEO para melhor posicionamento no Google',
                        'link' => 'otimizacao-seo'
                    ],
                    [
                        'icon' => 'fas fa-lightbulb',
                        'title' => 'Consultoria em Tecnologia',
                        'subtitle' => 'Orientação estratégica',
                        'description' => 'Consultoria estratégica para escolha de tecnologias, arquitetura de projetos e otimização de processos.',
                        'features' => [
                            ['Análise técnica', 'Arquitetura', 'Escolha de tecnologias'],
                            ['Code review', 'Performance', 'Modernização']
                        ],
                        'animation' => 'fade-left',
                        'aria_label' => 'Consultoria especializada em tecnologia e arquitetura',
                        'link' => 'consultoria-tecnologia'
                    ]
                ];

                foreach ($detailedServices as $index => $service):
                ?>
                    <div class="col-lg-6 <?php echo $service['animation']; ?>" role="listitem">
                    <article class="service-detail-card" itemscope itemtype="https://schema.org/Service">
                        <div class="service-detail-header">
                            <div class="service-detail-icon" aria-hidden="true">
                                    <i class="<?php echo $service['icon']; ?>"></i>
                            </div>
                            <div>
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
                                    <a href="<?php echo url($service['link']); ?>" class="btn-primary-standard" 
                                       aria-label="<?php echo $service['aria_label']; ?> - Solicitar orçamento" 
                                       itemprop="url">
                                        <i class="fas fa-arrow-right me-2" aria-hidden="true"></i>
                                        Saiba mais
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php include 'components/cta-section.php'; ?>

<?php include 'includes/footer.php'; ?>
