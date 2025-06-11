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

<!-- 404 Content -->
<section class="py-5 bg-light" style="margin-top: 100px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="error-content" data-aos="fade-up">
                    <h1 class="display-4 fw-bold text-dark mb-4">Ops! Página não encontrada</h1>
                    <p class="lead text-muted mb-4">A página que você está procurando não existe ou foi movida.</p>
                    <div class="error-number mb-4">
                        <span style="font-size: 8rem; font-weight: 800; color: var(--accent); opacity: 0.3;">404</span>
                    </div>
                    
                    <h2 class="section-title mb-4">Vamos te ajudar a encontrar o que procura</h2>
                    
                    <p class="section-subtitle mb-5">
                        Talvez você tenha digitado o endereço incorretamente ou a página foi movida. 
                        Não se preocupe, temos várias opções para você:
                    </p>
                    
                    <div class="row mb-5">
                        <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="100">
                            <div class="suggestion-card">
                                <i class="fas fa-home fa-2x text-primary mb-3"></i>
                                <h4>Página Inicial</h4>
                                <p>Volte ao início e conheça nossos serviços</p>
                                <a href="<?php echo url('index'); ?>" class="btn btn-outline-primary">Ir para Home</a>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="200">
                            <div class="suggestion-card">
                                <i class="fas fa-code fa-2x text-primary mb-3"></i>
                                <h4>Nossos Serviços</h4>
                                <p>Conheça nossas soluções em PHP e Laravel</p>
                                <a href="<?php echo url('servicos'); ?>" class="btn btn-outline-primary">Ver Serviços</a>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="300">
                            <div class="suggestion-card">
                                <i class="fas fa-envelope fa-2x text-primary mb-3"></i>
                                <h4>Entre em Contato</h4>
                                <p>Fale conosco sobre seu projeto</p>
                                <a href="<?php echo url('contato'); ?>" class="btn btn-outline-primary">Contato</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="search-section mb-5" data-aos="fade-up" data-aos-delay="400">
                        <h3 class="mb-3">Ou navegue por nossas páginas:</h3>
                        <div class="quick-links">
                            <a href="<?php echo url('index'); ?>" class="btn btn-link">Home</a> |
                            <a href="<?php echo url('servicos'); ?>" class="btn btn-link">Serviços</a> |
                            <a href="<?php echo url('como-trabalhamos'); ?>" class="btn btn-link">Como Trabalhamos</a> |
                            <a href="<?php echo url('programador-php-freelancer'); ?>" class="btn btn-link">Quem Sou</a> |
                            <a href="<?php echo url('contato'); ?>" class="btn btn-link">Contato</a>
                        </div>
                    </div>
                    
                    <div class="cta-section" data-aos="fade-up" data-aos-delay="500">
                        <h3 class="mb-4">Precisa de ajuda com seu projeto?</h3>
                        <p class="mb-4">Somos especialistas em desenvolvimento PHP e Laravel em Sorocaba</p>
                        <a href="<?php echo url('contato'); ?>" class="btn btn-primary btn-lg">
                            Solicitar Orçamento Gratuito
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.suggestion-card {
    background: white;
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    height: 100%;
    text-align: center;
    transition: transform 0.3s ease;
}

.suggestion-card:hover {
    transform: translateY(-5px);
}

.quick-links .btn-link {
    color: var(--primary);
    text-decoration: none;
    padding: 0.5rem;
}

.quick-links .btn-link:hover {
    color: var(--accent);
    text-decoration: underline;
}
</style>

<?php include 'includes/footer.php'; ?> 