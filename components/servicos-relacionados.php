<?php
/**
 * Componente de Serviços Relacionados
 * Exibe outros serviços baseado no serviço atual
 *
 * Atualizado para exibir 4 serviços relacionados e centralizar o CSS no style.css
 */

// Configuração dos serviços principais com ícones e descrições
$servicos = [
    'desenvolvimento-php' => [
        'title' => 'Desenvolvimento PHP',
        'description' => 'Aplicações robustas com PHP moderno',
        'icon' => 'fas fa-code',
        'slug' => 'desenvolvimento-php'
    ],
    'desenvolvimento-sites' => [
        'title' => 'Desenvolvimento de Sites',
        'description' => 'Sites responsivos e otimizados',
        'icon' => 'fas fa-globe',
        'slug' => 'desenvolvimento-sites'
    ],
    'automacoes-n8n-ia' => [
        'title' => 'Automações com N8N e IA',
        'description' => 'Automação inteligente de processos',
        'icon' => 'fas fa-robot',
        'slug' => 'automacoes-n8n-ia'
    ],
    'desenvolvimento-app' => [
        'title' => 'Desenvolvimento de APP',
        'description' => 'Apps nativos para Android e iOS',
        'icon' => 'fas fa-mobile-alt',
        'slug' => 'desenvolvimento-app'
    ],
    'framework-laravel' => [
        'title' => 'Framework Laravel',
        'description' => 'Desenvolvimento com Laravel',
        'icon' => 'fas fa-layer-group',
        'slug' => 'framework-laravel'
    ],
    'construcao-apis' => [
        'title' => 'Construção de APIs',
        'description' => 'APIs REST seguras e documentadas',
        'icon' => 'fas fa-server',
        'slug' => 'construcao-apis'
    ],
    'desenvolvimento-sistemas' => [
        'title' => 'Desenvolvimento de Sistemas',
        'description' => 'Sistemas personalizados para seu negócio',
        'icon' => 'fas fa-database',
        'slug' => 'desenvolvimento-sistemas'
    ],
    'otimizacao-seo' => [
        'title' => 'Otimização SEO',
        'description' => 'Melhore sua visibilidade online',
        'icon' => 'fas fa-search',
        'slug' => 'otimizacao-seo'
    ]
];

// Pegar o serviço atual da URL
$currentPage = basename($_SERVER['PHP_SELF'], '.php');

// Filtrar serviços relacionados (excluir o atual e pegar 3 principais)
$servicosRelacionados = [];
$contador = 0;

foreach ($servicos as $key => $servico) {
    if ($key !== $currentPage && $contador < 3) {
        $servicosRelacionados[$key] = $servico;
        $contador++;
    }
}

// Se não tiver 3, completar com os restantes
if (count($servicosRelacionados) < 3) {
    foreach ($servicos as $key => $servico) {
        if ($key !== $currentPage && !isset($servicosRelacionados[$key]) && count($servicosRelacionados) < 3) {
            $servicosRelacionados[$key] = $servico;
        }
    }
}
?>

<!-- Related Services -->
<section class="py-5 bg-white" role="complementary">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <h2 class="section-title fade-up">Outros Serviços</h2>
                <p class="section-subtitle fade-up">Conheça outras soluções que oferecemos</p>
            </div>
        </div>
        <div class="row" role="list" aria-label="Lista de serviços relacionados">
            <?php foreach ($servicosRelacionados as $key => $servico): ?>
                <div class="col-lg-4 col-md-6 mb-4" role="listitem">
                    <article class="service-card h-100" itemscope itemtype="https://schema.org/Service">
                        <div class="service-icon" aria-hidden="true">
                            <i class="<?php echo $servico['icon']; ?>"></i>
                        </div>
                        <h3 class="service-title" itemprop="name"><?php echo $servico['title']; ?></h3>
                        <p class="service-description" itemprop="description"><?php echo $servico['description']; ?></p>
                        <a href="<?php echo url($servico['slug']); ?>" class="btn-primary-standard" itemprop="url">
                            Saiba mais <i class="fas fa-arrow-right ms-2" aria-hidden="true"></i>
                        </a>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!--
    Os estilos deste componente foram movidos para o arquivo style.css para manter o padrão do projeto e evitar duplicidade de código.
    Certifique-se de que o style.css está sendo carregado corretamente no projeto.
--> 