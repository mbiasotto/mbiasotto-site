<?php
/**
 * Componente Hero
 * 
 * @param string $title - Título principal
 * @param string $subtitle - Subtítulo
 * @param array $buttons - Array de botões [['text' => '', 'url' => '', 'class' => '']]
 * @param array $badges - Array de badges de texto
 * @param bool $isInternal - Se é página interna (hero menor)
 * @param bool $showScrollBtn - Se mostra botão de scroll
 */

$title = $heroTitle ?? $title ?? 'Título Padrão';
$subtitle = $heroSubtitle ?? $subtitle ?? 'Subtítulo padrão';
$buttons = $buttons ?? [];
$badges = $badges ?? [];
$isInternal = $isInternal ?? false;
$showScrollBtn = $showScrollBtn ?? false;

$heroClass = $isInternal ? 'hero-section hero-internal' : 'hero-section';
?>

<!-- Hero Section -->
<section class="<?php echo $heroClass; ?>">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-<?php echo $isInternal ? '8' : '10'; ?>">
                <div class="hero-content" data-aos="fade-up" data-aos-duration="1000">
                    <h1 class="hero-title mb-4"><?php echo $title; ?></h1>
                    <p class="hero-subtitle mb-5"><?php echo $subtitle; ?></p>
                    
                    <?php if (!empty($buttons)): ?>
                        <div class="hero-buttons mb-5" data-aos="fade-up" data-aos-delay="200">
                            <?php foreach ($buttons as $button): ?>
                                <a href="<?php echo $button['url']; ?>" class="<?php echo $button['class']; ?>">
                                    <?php echo $button['text']; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($badges)): ?>
                        <!-- Badges -->
                        <div class="hero-badges" data-aos="fade-up" data-aos-delay="400">
                            <?php foreach ($badges as $badge): ?>
                                <span class="badge-custom"><?php echo $badge; ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <?php if ($showScrollBtn): ?>
            <!-- Scroll Button -->
            <a href="#stats-section" class="scroll-section-btn">
                <i class="fas fa-chevron-down"></i>
            </a>
        <?php endif; ?>
    </div>
</section> 