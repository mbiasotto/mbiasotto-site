<?php
// Include config first
require_once 'includes/config.php';

// Configurações da página
$pageTitle = 'Página não encontrada - 404 | Maurício Biasotto';
$pageDescription = 'A página que você está procurando não foi encontrada. Navegue pelas nossas soluções em desenvolvimento PHP e Laravel.';

// Set 404 status
http_response_code(404);

// Include header
include 'includes/header.php';
?>

<?php include 'includes/navigation.php'; ?>

<?php
// Configurações do Hero interno
$heroTitle = 'Página Não Encontrada';
$heroSubtitle = 'A página que você está procurando não existe ou foi movida. Vamos te ajudar a encontrar o que precisa.';
$isInternal = true;

// Incluir Hero
include 'components/hero.php';
?>

<!-- 404 Content -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="error-content fade-up">
                    <!-- Número 404 -->
                    <div class="text-center mb-5">
                        <div class="error-number">404</div>
                        <h2 class="title-section mb-4">Vamos te ajudar a encontrar o que procura</h2>
                    </div>
                    
                    <div class="row mb-5">
                        <div class="col-md-4 mb-3 fade-left">
                            <div class="suggestion-card">
                                <i class="fas fa-home fa-2x text-primary mb-3"></i>
                                <h4>Página Inicial</h4>
                                <p>Volte ao início e conheça nossos serviços</p>
                                <a href="<?php echo url('index'); ?>" class="btn btn-cta-primary">Ir para Home</a>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-3 fade-up">
                            <div class="suggestion-card">
                                <i class="fas fa-code fa-2x text-primary mb-3"></i>
                                <h4>Nossos Serviços</h4>
                                <p>Conheça nossas soluções em PHP e Laravel</p>
                                <a href="<?php echo url('servicos'); ?>" class="btn btn-cta-primary">Ver Serviços</a>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-3 fade-right">
                            <div class="suggestion-card">
                                <i class="fas fa-envelope fa-2x text-primary mb-3"></i>
                                <h4>Entre em Contato</h4>
                                <p>Fale conosco sobre seu projeto</p>
                                <a href="<?php echo url('contato'); ?>" class="btn btn-cta-primary">Contato</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include 'includes/footer.php'; ?> 