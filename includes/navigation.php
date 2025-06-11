<?php
$currentPage = basename($_SERVER['PHP_SELF'], '.php');

function isActive($page, $current) {
    return $page === $current ? 'active' : '';
}
?>

<!-- SEO: Comentário HTML - Navegação principal otimizada para SEO -->
<!-- Header Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" role="navigation" aria-label="Navegação principal" itemscope itemtype="https://schema.org/SiteNavigationElement">
    <div class="container">
        <!-- SEO: Logo otimizado com alt text descritivo -->
        <a class="navbar-brand fw-bold" href="<?php echo url(''); ?>" aria-label="DevPHP Solutions - Página inicial" itemprop="url">
            <img src="<?php echo asset('assets/images/logo-white.png'); ?>" 
                 alt="DevPHP Solutions - Programador PHP Freelancer Sorocaba SP" 
                 height="40" 
                 width="auto"
                 class="d-inline-block align-text-top"
                 itemprop="logo">
        </a>
        
        <!-- SEO: Botão do menu mobile com aria-labels -->
        <button class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarNav"
                aria-controls="navbarNav" 
                aria-expanded="false" 
                aria-label="Alternar menu de navegação">
            <span class="navbar-toggler-icon" aria-hidden="true"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- SEO: Lista de navegação com roles e aria-labels -->
            <ul class="navbar-nav ms-auto align-items-center" role="menubar" aria-label="Menu principal">
                <li class="nav-item" role="none">
                    <a class="nav-link <?php echo isActive('index', $currentPage); ?>" 
                       href="<?php echo url(''); ?>" 
                       role="menuitem"
                       aria-label="Ir para página inicial"
                       <?php echo isActive('index', $currentPage) ? 'aria-current="page"' : ''; ?>>HOME</a>
                </li>
                <li class="nav-item" role="none">
                    <a class="nav-link <?php echo isActive('servicos', $currentPage); ?>" 
                       href="<?php echo url('servicos'); ?>" 
                       role="menuitem"
                       aria-label="Ver serviços de desenvolvimento PHP"
                       <?php echo isActive('servicos', $currentPage) ? 'aria-current="page"' : ''; ?>>SOLUÇÕES</a>
                </li>
                <li class="nav-item" role="none">
                    <a class="nav-link <?php echo isActive('como-trabalhamos', $currentPage); ?>" 
                       href="<?php echo url('como-trabalhamos'); ?>" 
                       role="menuitem"
                       aria-label="Conhecer metodologia de trabalho"
                       <?php echo isActive('como-trabalhamos', $currentPage) ? 'aria-current="page"' : ''; ?>>COMO TRABALHAMOS</a>
                </li>
                <li class="nav-item" role="none">
                    <a class="nav-link <?php echo isActive('programador-php-freelancer', $currentPage); ?>" 
                       href="<?php echo url('programador-php-freelancer'); ?>" 
                       role="menuitem"
                       aria-label="Conhecer o programador PHP freelancer"
                       <?php echo isActive('programador-php-freelancer', $currentPage) ? 'aria-current="page"' : ''; ?>>QUEM SOU</a>
                </li>
                <li class="nav-item" role="none">
                    <a class="nav-link <?php echo isActive('contato', $currentPage); ?>" 
                       href="<?php echo url('contato'); ?>" 
                       role="menuitem"
                       aria-label="Entrar em contato para solicitar orçamento"
                       <?php echo isActive('contato', $currentPage) ? 'aria-current="page"' : ''; ?>>CONTATO</a>
                </li>
                <li class="nav-item ms-2" role="none">
                    <a class="btn btn-cta-navbar" 
                       href="<?php echo url('contato'); ?>" 
                       role="menuitem"
                       aria-label="Solicitar orçamento de desenvolvimento PHP">Vamos Conversar?</a>
                </li>
            </ul>
        </div>
    </div>
</nav> 