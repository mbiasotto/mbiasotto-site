<?php
/**
 * Componente de Estatísticas
 * 
 * @param array $stats - Array de estatísticas [['icon' => '', 'number' => '', 'label' => '']]
 */

$stats = $stats ?? [
    ['icon' => 'fas fa-star', 'number' => '20', 'label' => 'Anos de Experiência'],
    ['icon' => 'fas fa-users', 'number' => '900', 'label' => 'Projetos Entregues'],
    ['icon' => 'fas fa-map-marker-alt', 'number' => '35', 'label' => 'Cidades Atendidas'],
    ['icon' => 'fas fa-globe', 'number' => '4', 'label' => 'Países']
];
?>

<!-- Stats Section -->
<section class="stats-section py-5 bg-white" id="stats-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row text-center">
                    <?php foreach ($stats as $index => $stat): ?>
                        <div class="col-md-3 mb-4 fade-up">
                            <div class="stat-item">
                                <div class="stat-icon mb-3">
                                    <i class="<?php echo $stat['icon']; ?>"></i>
                                </div>
                                <h3 class="stat-number counter" data-target="<?php echo $stat['number']; ?>">0</h3>
                                <p class="stat-label"><?php echo $stat['label']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section> 