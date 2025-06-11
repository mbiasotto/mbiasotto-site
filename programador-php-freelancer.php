<?php
// Include config first
require_once 'includes/config.php';

// Configurações da página
$pageTitle = 'Programador PHP Freelancer Sorocaba SP | Quem Sou';
$pageDescription = 'Conheça o programador PHP freelancer em Sorocaba. Mais de 8 anos de experiência em desenvolvimento Laravel, APIs e automações.';

// Configurações do Hero interno
$isInternal = true;

// Include header
include 'includes/header.php';
?>

<?php include 'includes/navigation.php'; ?>

<?php
// Configurações do Hero interno
$heroTitle = 'Maurício Biasotto - Desenvolvedor PHP';
$heroSubtitle = '8+ anos transformando ideias em soluções digitais eficientes para empresas de todos os portes';
$isInternal = true;

// Incluir Hero
include 'components/hero.php';
?>

<!-- About Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-up">
                <h2 class="section-title mb-4">Quem Sou</h2>
                <div class="about-text">
                    <p class="mb-4">
                        Sou um programador PHP freelancer baseado em Sorocaba, SP, com mais de 8 anos de experiência no
                        desenvolvimento de soluções web personalizadas. Atendo empresas em Sorocaba, região metropolitana e
                        todo o interior de São Paulo, oferecendo serviços especializados em PHP, Laravel e automações.
                    </p>

                    <p class="mb-4">
                        Como freelancer em Sorocaba, trabalho diretamente com empresários e gestores que buscam soluções
                        digitais eficientes. Minha experiência inclui desenvolvimento de sistemas para diversos segmentos:
                        e-commerce, gestão empresarial, automação de processos e integração de sistemas.
                    </p>

                    <p class="mb-4">
                        Atualmente, além do desenvolvimento tradicional, estou trabalhando com automações utilizando n8n e
                        integrações com inteligência artificial, ajudando empresas a otimizar seus processos e aumentar sua
                        produtividade.
                    </p>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="especialidades-card">
                    <h3 class="especialidades-title">Especialidades</h3>
                    <div class="especialidades-list">
                        <div class="especialidade-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Desenvolvimento de aplicações web com PHP moderno (7.4+)</span>
                        </div>
                        <div class="especialidade-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Criação de sistemas com Laravel (6.x até a versão mais recente)</span>
                        </div>
                        <div class="especialidade-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Desenvolvimento de APIs RESTful seguindo as melhores práticas</span>
                        </div>
                        <div class="especialidade-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Integração com bancos de dados MySQL, PostgreSQL e MongoDB</span>
                        </div>
                        <div class="especialidade-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Automação de processos com n8n e integrações com IA</span>
                        </div>
                        <div class="especialidade-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Implementação de boas práticas de SEO em aplicações web</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Metodologia Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-aos="fade-up">Metodologia de Trabalho</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                Processo estruturado e transparente que garante qualidade e satisfação em cada projeto
            </p>
        </div>

        <div class="row align-items-center mb-5">
            <div class="col-lg-6" data-aos="fade-up">
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

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="metodologia-feature-card text-center">
                            <i class="fas fa-clock metodologia-feature-icon"></i>
                            <h4 class="metodologia-feature-title">Agilidade</h4>
                            <p class="metodologia-feature-desc">Entregas rápidas e eficientes</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="metodologia-feature-card text-center">
                            <i class="fas fa-users metodologia-feature-icon"></i>
                            <h4 class="metodologia-feature-title">Colaboração</h4>
                            <p class="metodologia-feature-desc">Trabalho em parceria</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="metodologia-feature-card text-center">
                            <i class="fas fa-bolt metodologia-feature-icon"></i>
                            <h4 class="metodologia-feature-title">Inovação</h4>
                            <p class="metodologia-feature-desc">Tecnologias modernas</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="metodologia-feature-card text-center">
                            <i class="fas fa-award metodologia-feature-icon"></i>
                            <h4 class="metodologia-feature-title">Qualidade</h4>
                            <p class="metodologia-feature-desc">Código limpo e documentado</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Atendimento em Sorocaba -->
        <div class="atendimento-sorocaba-card" data-aos="fade-up" data-aos-delay="300">
            <h3 class="atendimento-title">Atendimento em Sorocaba e Além</h3>
            <p class="atendimento-text mb-4">
                Localizado em Sorocaba, ofereço atendimento presencial para empresas da cidade e região. Também atendo
                remotamente clientes de diversas cidades do Brasil, Portugal, Estados Unidos e Japão, mantendo sempre a
                qualidade e proximidade no relacionamento.
            </p>

            <div class="porque-escolher">
                <h4 class="porque-escolher-title">Por que me escolher?</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="porque-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Experiência comprovada em projetos de diferentes complexidades</span>
                        </div>
                        <div class="porque-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Foco em código limpo, bem documentado e de fácil manutenção</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="porque-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Compromisso com prazos e comunicação transparente</span>
                        </div>
                        <div class="porque-item">
                            <i class="fas fa-check-circle"></i>
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
