<?php
// Include config first
require_once 'includes/config.php';

// Configurações da página - Otimizadas para SEO de perfil profissional
$pageTitle = 'Programador PHP Freelancer | 20+ Anos Experiência | Especialista Laravel, APIs, N8N, MCP e automações';
$pageDescription = 'Maurício Biasotto: Desenvolvedor PHP freelancer com +20 anos experiência. Especialista Laravel, SlimPHP, APIs REST. Projetos para Votorantim, Cargill, SabeSP, MasterCard Brasil.';
$pageKeywords = 'mauricio biasotto, programador php freelancer, desenvolvedor php experiente, laravel especialista, slimphp, apis rest, sorocaba sp, freelancer php brasil, desenvolvimento sob demanda';

// Configurações do Hero interno
$isInternal = true;

// Include header
include 'includes/header.php';
?>

<?php include 'includes/navigation.php'; ?>

<?php
// Configurações do Hero interno
$heroTitle = 'Mauricio Biasotto - Desenvolvedor PHP Freelancer';
$heroSubtitle = '20+ anos transformando ideias em soluções digitais eficientes para empresas de todos os portes';
$isInternal = true;

// Incluir Hero
include 'components/hero.php';
?>

<!-- SEO: Comentário HTML - Perfil profissional do desenvolvedor PHP -->
<!-- About Section -->
<section class="py-5 bg-white" role="main" aria-labelledby="about-title">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 fade-up">
                <!-- SEO: H1 principal da página -->
                <h1 id="about-title" class="section-title mb-4">Quem Sou</h1>
                <div class="about-text" itemscope itemtype="https://schema.org/Person">
                    <p class="mb-4" itemprop="description">
                        Sou um desenvolvedor PHP com 20 anos de experiência em Full Stack PHP Development, especializado nos frameworks SlimPHP e Laravel. Baseado em Sorocaba (São Paulo), tenho o privilégio de trabalhar em projetos para empresas renomadas como Grupo Votorantim, Cargill, SabeSP e MasterCard Brasil.
                    </p>

                    <p class="mb-4">
                        Minha experiência abrange diferentes tipos de projetos, incluindo automação de processos, APIs REST, e-commerce, SAAS e aplicações híbridas. Trabalho diretamente com empresários e gestores que buscam soluções digitais eficientes e escaláveis para seus negócios.
                    </p>

                    <p class="mb-4">
                        Atualmente, além do desenvolvimento tradicional, estou trabalhando com automações utilizando n8n e integrações com inteligência artificial, sempre aplicando as melhores práticas de desenvolvimento que aprendi ao longo de duas décadas na área.
                    </p>
                    
                    <!-- SEO: Dados estruturados para pessoa -->
                    <meta itemprop="name" content="Mauricio Biasotto">
                    <meta itemprop="jobTitle" content="Programador PHP Freelancer">
                    <meta itemprop="address" content="Sorocaba, SP, Brasil">
                    <meta itemprop="email" content="mauricio@mbiasotto.com">
                    <meta itemprop="telephone" content="+55-15-98118-7063">
                </div>
            </div>

            <div class="col-lg-6 fade-right">
                <div class="especialidades-card">
                    <!-- SEO: H2 para especialidades técnicas -->
                    <h2 class="especialidades-title">Especialidades</h2>
                    <div class="especialidades-list" role="list" aria-label="Lista de especialidades técnicas">
                        <div class="especialidade-item" role="listitem">
                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                            <span>Desenvolvimento de aplicações web com PHP moderno (7.4+)</span>
                        </div>
                        <div class="especialidade-item" role="listitem">
                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                            <span>Criação de sistemas com Laravel (6.x até a versão mais recente)</span>
                        </div>
                        <div class="especialidade-item" role="listitem">
                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                            <span>Desenvolvimento especializado com SlimPHP para APIs robustas</span>
                        </div>
                        <div class="especialidade-item" role="listitem">
                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                            <span>Desenvolvimento de APIs RESTful seguindo as melhores práticas</span>
                        </div>
                        <div class="especialidade-item" role="listitem">
                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                            <span>Integração com bancos de dados MySQL, PostgreSQL e MongoDB</span>
                        </div>
                        <div class="especialidade-item" role="listitem">
                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                            <span>Desenvolvimento de aplicações SAAS escaláveis</span>
                        </div>
                        <div class="especialidade-item" role="listitem">
                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                            <span>Automação de processos com n8n e integrações com IA</span>
                        </div>
                        <div class="especialidade-item" role="listitem">
                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                            <span>Implementação de boas práticas de SEO em aplicações web</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SEO: Comentário HTML - Metodologia de trabalho do programador PHP -->
<!-- Metodologia Section -->
<section class="py-5 bg-light" role="complementary" aria-labelledby="metodologia-title">
    <div class="container">
        <div class="text-center mb-5">
            <!-- SEO: H2 para metodologia -->
            <h2 id="metodologia-title" class="section-title fade-up">Metodologia de Trabalho</h2>
            <p class="section-subtitle fade-up">
                Processo estruturado e transparente que garante qualidade e satisfação em cada projeto
            </p>
        </div>

        <div class="row align-items-center mb-5">
            <div class="col-lg-6 fade-left">
                <!-- SEO: H3 para abordagem -->
                <h3 class="metodologia-section-title">Abordagem Centrada no Cliente</h3>
                <p class="metodologia-section-text mb-4">
                    Minha abordagem é centrada no cliente e nos resultados. Trabalho de forma transparente, com
                    comunicação clara e constante durante todo o processo de desenvolvimento. Meu objetivo é não apenas
                    entregar um produto final de qualidade, mas também garantir que ele atenda às necessidades específicas
                    do seu negócio.
                </p>
                <p class="metodologia-section-text">
                    Utilizo metodologias ágeis para garantir entregas incrementais e permitir ajustes ao longo do projeto,
                    assegurando que o resultado final esteja alinhado com suas expectativas e objetivos de negócio.
                </p>
            </div>

            <div class="col-lg-6 fade-right">
                <div class="row g-3" role="list" aria-label="Características da metodologia de trabalho">
                    <div class="col-6">
                        <div class="metodologia-feature-card text-center" role="listitem">
                            <i class="fas fa-clock metodologia-feature-icon" aria-hidden="true"></i>
                            <h4 class="metodologia-feature-title">Agilidade</h4>
                            <p class="metodologia-feature-desc">Entregas rápidas e eficientes</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="metodologia-feature-card text-center" role="listitem">
                            <i class="fas fa-users metodologia-feature-icon" aria-hidden="true"></i>
                            <h4 class="metodologia-feature-title">Colaboração</h4>
                            <p class="metodologia-feature-desc">Trabalho em parceria</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="metodologia-feature-card text-center" role="listitem">
                            <i class="fas fa-bolt metodologia-feature-icon" aria-hidden="true"></i>
                            <h4 class="metodologia-feature-title">Inovação</h4>
                            <p class="metodologia-feature-desc">Tecnologias modernas</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="metodologia-feature-card text-center" role="listitem">
                            <i class="fas fa-award metodologia-feature-icon" aria-hidden="true"></i>
                            <h4 class="metodologia-feature-title">Qualidade</h4>
                            <p class="metodologia-feature-desc">Código limpo e documentado</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Atendimento em Sorocaba -->
        <div class="atendimento-sorocaba-card fade-up">
            <!-- SEO: H3 para localização e diferencial -->
            <h3 class="atendimento-title">Atendimento em Sorocaba e Além</h3>
            <p class="atendimento-text mb-4">
                Localizado em Sorocaba, ofereço atendimento presencial para empresas da cidade e região. Também atendo
                remotamente clientes de diversas cidades do Brasil, Portugal, Estados Unidos e Japão, mantendo sempre a
                qualidade e proximidade no relacionamento.
            </p>

            <div class="porque-escolher">
                <!-- SEO: H4 para diferenciais -->
                <h4 class="porque-escolher-title">Por que me escolher?</h4>
                <div class="row" role="list" aria-label="Motivos para escolher este programador PHP">
                    <div class="col-md-6">
                        <div class="porque-item" role="listitem">
                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                            <span>20 anos de experiência com projetos para grandes empresas</span>
                        </div>
                        <div class="porque-item" role="listitem">
                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                            <span>Foco em código limpo, bem documentado e de fácil manutenção</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="porque-item" role="listitem">
                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                            <span>Compromisso com prazos e comunicação transparente</span>
                        </div>
                        <div class="porque-item" role="listitem">
                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                            <span>Suporte contínuo após a entrega do projeto</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'components/cta-section.php'; ?>

<?php include 'includes/footer.php'; ?>
