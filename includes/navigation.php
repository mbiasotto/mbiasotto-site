<?php
$currentPage = basename($_SERVER['PHP_SELF'], '.php');

function isActive($page, $current) {
    return $page === $current ? 'active' : '';
}
?>

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?php echo url(''); ?>">
            <img src="<?php echo asset('assets/images/logo-white.png'); ?>" alt="Maurício Biasotto" height="40" class="d-inline-block align-text-top">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('index', $currentPage); ?>" href="<?php echo url(''); ?>">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('servicos', $currentPage); ?>" href="<?php echo url('servicos'); ?>">SOLUÇÕES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('como-trabalhamos', $currentPage); ?>" href="<?php echo url('como-trabalhamos'); ?>">COMO TRABALHAMOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('programador-php-freelancer', $currentPage); ?>" href="<?php echo url('programador-php-freelancer'); ?>">QUEM SOU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('contato', $currentPage); ?>" href="<?php echo url('contato'); ?>">CONTATO</a>
                </li>
                <li class="nav-item ms-2">
                    <a class="btn btn-cta-navbar" href="<?php echo url('contato'); ?>">Vamos Conversar?</a>
                </li>
            </ul>
        </div>
    </div>
</nav> 