<?php
include 'includes/config.php';

echo "<h1>Teste de Configuração</h1>";
echo "<p><strong>Base Path:</strong> " . BASE_PATH . "</p>";
echo "<p><strong>Base URL:</strong> " . BASE_URL . "</p>";
echo "<p><strong>URL para 'servicos':</strong> " . url('servicos') . "</p>";
echo "<p><strong>Asset CSS:</strong> " . asset('assets/css/style.css') . "</p>";
echo "<p><strong>Caminho do script atual:</strong> " . $_SERVER['SCRIPT_NAME'] . "</p>";
echo "<p><strong>Diretório do script:</strong> " . dirname($_SERVER['SCRIPT_NAME']) . "</p>";

echo "<hr>";
echo "<h2>Links de Teste</h2>";
echo "<a href='" . url('index') . "'>Home</a> | ";
echo "<a href='" . url('servicos') . "'>Serviços</a> | ";
echo "<a href='" . url('contato') . "'>Contato</a>";
?> 