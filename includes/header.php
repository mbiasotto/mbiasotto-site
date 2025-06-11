<?php
// Incluir configurações
include_once 'includes/config.php';

// Iniciar session antes de qualquer output
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Gerar CSRF token se não existir
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Configurações padrão da página
$pageTitle = $pageTitle ?? 'Programador PHP Freelancer - Sorocaba/SP';
$pageDescription = $pageDescription ?? 'Desenvolvimento profissional em PHP, Framework Laravel, APIs e automações com N8N / MCP. Soluções personalizadas para impulsionar o seu negócio em Sorocaba e região.';
$pageKeywords = $pageKeywords ?? 'programador php freelancer, desenvolvedor laravel, api rest, automação n8n, mcp, sorocaba, php developer';
$canonicalUrl = $canonicalUrl ?? url();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - MBiasotto</title>
    <meta name="description" content="<?php echo $pageDescription; ?>">
    <meta name="keywords" content="<?php echo $pageKeywords; ?>">
    <meta name="author" content="Maurício Biasotto">
    <link rel="canonical" href="<?php echo $canonicalUrl; ?>">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo $pageTitle; ?>">
    <meta property="og:description" content="<?php echo $pageDescription; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $canonicalUrl; ?>">
    <meta property="og:image" content="<?php echo url('assets/images/og-image.jpg'); ?>">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $pageTitle; ?>">
    <meta name="twitter:description" content="<?php echo $pageDescription; ?>">
    <meta name="twitter:image" content="<?php echo url('assets/images/twitter-card.jpg'); ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo asset('assets/images/favicon.png'); ?>">
    <link rel="apple-touch-icon" href="<?php echo asset('assets/images/favicon.png'); ?>">
    <link rel="shortcut icon" href="<?php echo asset('assets/images/favicon.png'); ?>" type="image/png">
    <meta name="msapplication-TileImage" content="<?php echo asset('assets/images/favicon.png'); ?>">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo asset('assets/css/style.css'); ?>">
    
    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ProfessionalService",
        "name": "Maurício Biasotto - Programador PHP",
        "description": "<?php echo $pageDescription; ?>",
        "url": "<?php echo url(); ?>",
        "telephone": "+55-15-98118-7063",
        "email": "mauricio@mbiasotto.com",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Sorocaba",
            "addressRegion": "SP",
            "addressCountry": "BR"
        },
        "serviceArea": {
            "@type": "Place",
            "name": "Sorocaba e Região"
        },
        "priceRange": "$$",
        "areaServed": ["Sorocaba", "São Paulo", "Brasil"],
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Serviços de Desenvolvimento",
            "itemListElement": [
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Desenvolvimento PHP"
                    }
                },
                {
                    "@type": "Offer", 
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Desenvolvimento Laravel"
                    }
                }
            ]
        }
    }
    </script>
</head>
<body>
    <?php include 'components/loading-screen.php'; ?> 