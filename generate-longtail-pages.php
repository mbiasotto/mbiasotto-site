<?php
/**
 * Script para gerar automaticamente todas as páginas de longtail
 * Execute este script para criar todas as páginas baseadas na configuração
 */

require_once 'includes/config.php';
require_once 'includes/longtail-config.php';

// Template base para as páginas
$pageTemplate = '<?php
// Include config first
require_once \'includes/config.php\';
require_once \'includes/longtail-config.php\';

// Obter dados da página
$pageData = getLongtailPage(\'{SLUG}\');

if (!$pageData) {
    header(\'HTTP/1.0 404 Not Found\');
    include \'404.php\';
    exit;
}

// Configurações da página - SEO otimizado
$pageTitle = $pageData[\'meta_title\'];
$pageDescription = $pageData[\'meta_description\'];
$pageKeywords = $pageData[\'keywords\'];

// Include header
include \'includes/header.php\';
include \'includes/navigation.php\';

// Include template simples
include \'components/materia-template.php\';

include \'includes/footer.php\';
?>';

// Obter todas as páginas configuradas
$allPages = getAllLongtailPages();
$generatedPages = [];
$existingPages = [];

echo "<h1>Gerador de Páginas de Longtail</h1>\n";
echo "<p>Gerando páginas automaticamente...</p>\n";

foreach ($allPages as $slug => $pageData) {
    $filename = $slug . '.php';
    
    // Verificar se a página já existe
    if (file_exists($filename)) {
        $existingPages[] = $filename;
        echo "<p>✓ Página já existe: <strong>{$filename}</strong></p>\n";
        continue;
    }
    
    // Gerar conteúdo da página
    $pageContent = str_replace('{SLUG}', $slug, $pageTemplate);
    
    // Criar arquivo
    if (file_put_contents($filename, $pageContent)) {
        $generatedPages[] = $filename;
        echo "<p>✅ Página criada: <strong>{$filename}</strong></p>\n";
    } else {
        echo "<p>❌ Erro ao criar: <strong>{$filename}</strong></p>\n";
    }
}

echo "\n<hr>\n";
echo "<h2>Resumo da Geração</h2>\n";
echo "<p><strong>Páginas criadas:</strong> " . count($generatedPages) . "</p>\n";
echo "<p><strong>Páginas já existentes:</strong> " . count($existingPages) . "</p>\n";
echo "<p><strong>Total de páginas:</strong> " . count($allPages) . "</p>\n";

if (!empty($generatedPages)) {
    echo "\n<h3>Páginas Criadas:</h3>\n<ul>\n";
    foreach ($generatedPages as $page) {
        echo "<li>{$page}</li>\n";
    }
    echo "</ul>\n";
}

if (!empty($existingPages)) {
    echo "\n<h3>Páginas já Existentes:</h3>\n<ul>\n";
    foreach ($existingPages as $page) {
        echo "<li>{$page}</li>\n";
    }
    echo "</ul>\n";
}

echo "\n<hr>\n";
echo "<h2>Próximos Passos</h2>\n";
echo "<ol>\n";
echo "<li>Verifique se todas as páginas foram criadas corretamente</li>\n";
echo "<li>Teste cada página para verificar se está funcionando</li>\n";
echo "<li>Substitua as imagens placeholder por imagens profissionais</li>\n";
echo "<li>Adicione as páginas ao sitemap.xml</li>\n";
echo "<li>Configure redirects se necessário</li>\n";
echo "</ol>\n";

echo "\n<h2>URLs das Páginas Criadas</h2>\n";
echo "<ul>\n";
foreach ($allPages as $slug => $pageData) {
    $url = url($slug);
    echo "<li><a href=\"{$url}\" target=\"_blank\">{$pageData['title']}</a></li>\n";
}
echo "</ul>\n";

// Gerar entradas para sitemap
echo "\n<hr>\n";
echo "<h2>Entradas para Sitemap.xml</h2>\n";
echo "<textarea rows=\"15\" cols=\"80\" style=\"width: 100%; font-family: monospace;\">\n";
foreach ($allPages as $slug => $pageData) {
    $url = 'https://seudominio.com/' . $slug; // Substitua pelo seu domínio
    echo "<url>\n";
    echo "  <loc>{$url}</loc>\n";
    echo "  <lastmod>" . date('Y-m-d') . "</lastmod>\n";
    echo "  <changefreq>monthly</changefreq>\n";
    echo "  <priority>0.8</priority>\n";
    echo "</url>\n";
}
echo "</textarea>\n";

echo "\n<hr>\n";
echo "<p><strong>Geração concluída!</strong> Todas as páginas de longtail foram criadas com sucesso.</p>\n";
?> 