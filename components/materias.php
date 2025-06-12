<?php
/**
 * Componente reutilizável para mostrar matérias
 * Pode ser incluído em qualquer página
 */

// Incluir configuração das páginas se não foi incluída ainda
if (!function_exists('getAllLongtailPages')) {
    require_once __DIR__ . '/../includes/longtail-config.php';
}

// Configuração padrão se não definida
$showTitle = isset($showTitle) ? $showTitle : true;
$showButton = isset($showButton) ? $showButton : true;
$sectionClass = isset($sectionClass) ? $sectionClass : 'py-5 bg-light';
$limitMaterias = isset($limitMaterias) ? $limitMaterias : 4;

// Selecionar as matérias principais para mostrar
$homeMaterias = [
    'contratar-programador-php-freelancer-especialista',
    'freelancer-vs-agencia-php',
    'bom-programador-php-entregas',
    'automacao-php-chatbot-whatsapp-n8n-processos',
    'php-vale-pena-2025',
    'preco-site-sistema-php'
];

$allPages = getAllLongtailPages();
$featuredMaterias = [];

// Pegar as matérias limitadas
$contador = 0;
foreach ($homeMaterias as $slug) {
    if (isset($allPages[$slug]) && $contador < $limitMaterias) {
        $featuredMaterias[$slug] = $allPages[$slug];
        $contador++;
    }
}
?>

<!-- Matérias -->
<section class="<?php echo $sectionClass; ?>" role="complementary">
    <div class="container">
        <?php if ($showTitle): ?>
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <h2 class="section-title fade-up">Matérias</h2>
                <p class="section-subtitle fade-up">
                    Guias práticos para empresários sobre desenvolvimento PHP, automação e tecnologia
                </p>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="row g-4 <?php echo $showButton ? 'mb-5' : ''; ?>">
            <?php foreach ($featuredMaterias as $slug => $materia): ?>
                <div class="col-lg-<?php echo 12 / $limitMaterias; ?> col-md-6 fade-up">
                    <article class="materia-card h-100">
                        <div class="materia-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <h3 class="materia-title"><?php echo $materia['title']; ?></h3>
                        <p class="materia-description">
                            <?php echo substr($materia['content']['intro'], 0, 120) . '...'; ?>
                        </p>
                        <a href="<?php echo url($slug); ?>" class="materia-link">
                            Ler matéria <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
        
        <?php if ($showButton): ?>
        <!-- Botão ver todas -->
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center fade-up">
                <a href="<?php echo url('materias'); ?>" class="btn btn-primary btn-lg">
                    <i class="fas fa-th-list me-2"></i>
                    Ver Todas as Matérias
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<style>
.materia-card {
    background: white;
    padding: 2.5rem 2rem;
    border-radius: 15px;
    border: 1px solid #eee;
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
    text-align: center;
}

.materia-card:hover {
    box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    transform: translateY(-8px);
    border-color: var(--primary-color);
}

.materia-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    transition: all 0.3s ease;
}

.materia-icon i {
    font-size: 2rem;
    color: white;
}

.materia-card:hover .materia-icon {
    transform: scale(1.1);
}

.materia-title {
    color: var(--primary-color);
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 1rem;
    line-height: 1.4;
}

.materia-description {
    color: #666;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    flex-grow: 1;
}

.materia-link {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    margin-top: auto;
}

.materia-link:hover {
    color: var(--accent-color);
    text-decoration: none;
}

.materia-link i {
    transition: transform 0.3s ease;
}

.materia-link:hover i {
    transform: translateX(5px);
}

@media (max-width: 768px) {
    .materia-card {
        padding: 2rem 1.5rem;
    }
    
    .materia-icon {
        width: 60px;
        height: 60px;
    }
    
    .materia-icon i {
        font-size: 1.5rem;
    }
    
    .materia-title {
        font-size: 1.2rem;
    }
}
</style> 