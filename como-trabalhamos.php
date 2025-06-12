<?php
// Include config first
require_once 'includes/config.php';

// Configurações da página
$pageTitle = 'Contratando um Programador PHP Freelancer | Especialista Laravel, APPs, APIs, N8N, MCP, ChatBots e automações';
$pageDescription = 'Metodologia profissional e transparente para desenvolvimento de projetos PHP em Sorocaba. Conheça nosso processo estruturado.';

// Configurações do Hero interno
$isInternal = true;

// Include header
include 'includes/header.php';
?>

<?php include 'includes/navigation.php'; ?>

<?php
// Configurações do Hero interno
$heroTitle = 'Metodologia comprovada de um Programador Freelancer de sucesso';
$heroSubtitle = 'Processo estruturado e transparente que garante entregas de qualidade dentro do prazo';
$isInternal = true;

// Incluir Hero
include 'components/hero.php';
?>

<!-- Metodologia Overview -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title fade-up">Nossa Metodologia</h2>
            <p class="section-subtitle fade-up">
                Processo estruturado e transparente que garante qualidade e satisfação em cada projeto
            </p>
        </div>

        <div class="row mb-5">
            <div class="col-lg-4 mb-4 fade-up">
                <div class="metodologia-card text-center">
                    <div class="metodologia-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="metodologia-title">Colaborativo</h3>
                    <p class="metodologia-desc">Trabalhamos em parceria com você durante todo o processo</p>
                </div>
            </div>

            <div class="col-lg-4 mb-4 fade-left">
                <div class="metodologia-card text-center">
                    <div class="metodologia-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3 class="metodologia-title">Inovador</h3>
                    <p class="metodologia-desc">Utilizamos as tecnologias mais modernas e eficientes</p>
                </div>
            </div>

            <div class="col-lg-4 mb-4 fade-right">
                <div class="metodologia-card text-center">
                    <div class="metodologia-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3 class="metodologia-title">Eficiente</h3>
                    <p class="metodologia-desc">Entregas no prazo com qualidade garantida</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Steps -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title fade-up">Processo de Desenvolvimento</h2>
            <p class="section-subtitle fade-up">
                6 etapas estruturadas para o sucesso do seu projeto
            </p>
        </div>

        <!-- Step 1 -->
        <div class="process-step-detailed fade-up">
            <div class="row align-items-start">
                <div class="col-lg-2 col-md-3">
                    <div class="step-number-large">1</div>
                </div>
                <div class="col-lg-10 col-md-9">
                    <h3 class="step-title-large">Descoberta e Análise</h3>
                    <p class="step-description-large">
                        Entendemos profundamente seu negócio, objetivos e necessidades específicas. Esta fase é fundamental
                        para alinharmos expectativas e definirmos a melhor estratégia para seu projeto.
                    </p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="step-feature-box">
                                <h4 class="step-feature-title">Reuniões de Descoberta</h4>
                                <ul class="step-feature-list">
                                    <li>• Análise do modelo de negócio</li>
                                    <li>• Identificação de objetivos</li>
                                    <li>• Mapeamento de requisitos</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="step-feature-box">
                                <h4 class="step-feature-title">Análise Técnica</h4>
                                <ul class="step-feature-list">
                                    <li>• Viabilidade técnica</li>
                                    <li>• Definição de arquitetura</li>
                                    <li>• Escolha de tecnologias</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 2 -->
        <div class="process-step-detailed fade-left">
            <div class="row align-items-start">
                <div class="col-lg-2 col-md-3">
                    <div class="step-number-large">2</div>
                </div>
                <div class="col-lg-10 col-md-9">
                    <h3 class="step-title-large">Planejamento Estratégico</h3>
                    <p class="step-description-large">
                        Elaboramos um plano detalhado com cronograma, marcos de entrega e orçamento transparente. Definimos
                        a arquitetura do sistema e as tecnologias que serão utilizadas.
                    </p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="step-feature-box">
                                <h4 class="step-feature-title">Documentação</h4>
                                <ul class="step-feature-list">
                                    <li>• Especificação funcional</li>
                                    <li>• Cronograma detalhado</li>
                                    <li>• Proposta comercial</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="step-feature-box">
                                <h4 class="step-feature-title">Arquitetura</h4>
                                <ul class="step-feature-list">
                                    <li>• Modelagem do banco de dados</li>
                                    <li>• Estrutura do sistema</li>
                                    <li>• Integrações necessárias</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 3 -->
        <div class="process-step-detailed fade-right">
            <div class="row align-items-start">
                <div class="col-lg-2 col-md-3">
                    <div class="step-number-large">3</div>
                </div>
                <div class="col-lg-10 col-md-9">
                    <h3 class="step-title-large">Design e Prototipagem</h3>
                    <p class="step-description-large">
                        Criamos protótipos interativos e wireframes para visualizar a interface e experiência do usuário.
                        Esta etapa permite validar conceitos antes do desenvolvimento.
                    </p>

                    <div class="step-feature-box-single">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="step-feature-title">UX/UI Design</h4>
                                <p class="step-feature-desc">Interface intuitiva e responsiva</p>
                            </div>
                            <div class="col-md-4">
                                <h4 class="step-feature-title">Protótipos</h4>
                                <p class="step-feature-desc">Validação de conceitos</p>
                            </div>
                            <div class="col-md-4">
                                <h4 class="step-feature-title">Aprovação</h4>
                                <p class="step-feature-desc">Alinhamento final</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 4 -->
        <div class="process-step-detailed fade-up">
            <div class="row align-items-start">
                <div class="col-lg-2 col-md-3">
                    <div class="step-number-large">4</div>
                </div>
                <div class="col-lg-10 col-md-9">
                    <h3 class="step-title-large">Desenvolvimento</h3>
                    <p class="step-description-large">
                        Fase de codificação utilizando as melhores práticas de desenvolvimento. Mantemos comunicação
                        constante com atualizações regulares sobre o progresso.
                    </p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="step-feature-box">
                                <h4 class="step-feature-title">Tecnologias</h4>
                                <ul class="step-feature-list">
                                    <li>• PHP 8+ e Laravel</li>
                                    <li>• APIs RESTful</li>
                                    <li>• Banco de dados otimizado</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="step-feature-box">
                                <h4 class="step-feature-title">Qualidade</h4>
                                <ul class="step-feature-list">
                                    <li>• Código limpo e documentado</li>
                                    <li>• Testes automatizados</li>
                                    <li>• Versionamento com Git</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 5 -->
        <div class="process-step-detailed fade-up">
            <div class="row align-items-start">
                <div class="col-lg-2 col-md-3">
                    <div class="step-number-large">5</div>
                </div>
                <div class="col-lg-10 col-md-9">
                    <h3 class="step-title-large">Testes e Validação</h3>
                    <p class="step-description-large">
                        Realizamos testes rigorosos para garantir que tudo funcione perfeitamente. Incluímos testes de
                        funcionalidade, performance e segurança.
                    </p>

                    <div class="step-feature-box-single">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="step-feature-title">Funcionalidade</h4>
                                <p class="step-feature-desc">Todos os recursos funcionando</p>
                            </div>
                            <div class="col-md-4">
                                <h4 class="step-feature-title">Performance</h4>
                                <p class="step-feature-desc">Velocidade otimizada</p>
                            </div>
                            <div class="col-md-4">
                                <h4 class="step-feature-title">Segurança</h4>
                                <p class="step-feature-desc">Proteção contra vulnerabilidades</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 6 -->
        <div class="process-step-detailed fade-up">
            <div class="row align-items-start">
                <div class="col-lg-2 col-md-3">
                    <div class="step-number-large">6</div>
                </div>
                <div class="col-lg-10 col-md-9">
                    <h3 class="step-title-large">Entrega e Suporte</h3>
                    <p class="step-description-large">
                        Realizamos o deploy em produção e fornecemos treinamento para uso do sistema. Oferecemos suporte
                        contínuo e manutenção.
                    </p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="step-feature-box">
                                <h4 class="step-feature-title">Deploy</h4>
                                <ul class="step-feature-list">
                                    <li>• Configuração do servidor</li>
                                    <li>• Migração de dados</li>
                                    <li>• Testes em produção</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="step-feature-box">
                                <h4 class="step-feature-title">Suporte</h4>
                                <ul class="step-feature-list">
                                    <li>• Treinamento da equipe</li>
                                    <li>• Documentação completa</li>
                                    <li>• Suporte pós-entrega</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'components/cta-section.php'; ?>

<?php include 'includes/footer.php'; ?>
