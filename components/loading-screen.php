<?php
/**
 * Loading Screen Component
 * 
 * Uso: include 'components/loading-screen.php';
 */
?>

<!-- Loading Screen -->
<div id="loading-screen">
    <div class="loading-content">
        <div class="loading-logo">
            <img src="<?php echo asset('assets/images/logo-white.png'); ?>" alt="Maurício Biasotto" height="60" class="loading-logo-img">
            <p class="loading-subtitle">Programador PHP Freelancer</p>
        </div>
        <div class="loading-spinner">
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Carregando...</span>
            </div>
        </div>
    </div>
</div> 