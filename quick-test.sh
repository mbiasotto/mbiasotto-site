#!/bin/bash

echo "🚀 TESTE RÁPIDO DE PERFORMANCE MOBILE 📱"
echo "========================================"
echo ""

# Verificar se está no localhost
if [[ $(pwd) == *"MAMP"* ]]; then
    echo "🔍 Ambiente: LOCALHOST (MAMP)"
    BASE_URL="http://localhost"
    
    # Tentar detectar porta automaticamente
    if [[ $(pwd) == *"mbiasotto"* ]]; then
        BASE_URL="$BASE_URL/mbiasotto"
    fi
    
    echo "📍 URL de teste: $BASE_URL"
    echo ""
    
    # Teste 1: Verificar se o servidor está rodando
    echo "1️⃣ Verificando servidor..."
    if curl -s "$BASE_URL" > /dev/null; then
        echo "✅ Servidor está rodando"
    else
        echo "❌ Servidor não encontrado. Verifique se o MAMP está rodando."
        exit 1
    fi
    
    # Teste 2: Verificar tamanho do CSS
    echo ""
    echo "2️⃣ Verificando tamanho do CSS..."
    CSS_SIZE=$(stat -f%z "assets/css/style.css" 2>/dev/null || stat -c%s "assets/css/style.css" 2>/dev/null)
    if [ $CSS_SIZE -gt 80000 ]; then
        echo "⚠️  CSS muito grande: $(($CSS_SIZE / 1024))KB"
        echo "   💡 Recomendação: Implementar CSS crítico"
    else
        echo "✅ CSS ok: $(($CSS_SIZE / 1024))KB"
    fi
    
    # Teste 3: Verificar arquivos JS
    echo ""
    echo "3️⃣ Verificando arquivos JavaScript..."
    JS_COUNT=$(ls assets/js/*.js 2>/dev/null | wc -l | tr -d ' ')
    if [ $JS_COUNT -gt 5 ]; then
        echo "⚠️  Muitos arquivos JS: $JS_COUNT arquivos"
        echo "   💡 Recomendação: Concatenar arquivos"
    else
        echo "✅ JS ok: $JS_COUNT arquivos"
    fi
    
    # Teste 4: Verificar otimizações implementadas
    echo ""
    echo "4️⃣ Verificando otimizações implementadas..."
    
    if [ -f "includes/critical-css-mobile.php" ]; then
        echo "✅ CSS crítico mobile criado"
    else
        echo "❌ CSS crítico mobile não encontrado"
    fi
    
    if grep -q "loadOptimizedCSS" includes/config.php; then
        echo "✅ Funções de otimização implementadas"
    else
        echo "❌ Funções de otimização não encontradas"
    fi
    
    if grep -q "MOBILE PERFORMANCE" .htaccess; then
        echo "✅ Otimizações .htaccess implementadas"
    else
        echo "❌ Otimizações .htaccess não encontradas"
    fi
    
    echo ""
    echo "📊 RECOMENDAÇÕES:"
    echo "=================="
    
    # Recomendações baseadas nos testes
    if [ $CSS_SIZE -gt 80000 ]; then
        echo "🔧 1. Implementar CSS crítico inline"
        echo "   Execute: Seguir mobile-performance-fixes.md"
    fi
    
    if [ $JS_COUNT -gt 5 ]; then
        echo "🔧 2. Concatenar arquivos JavaScript"
        echo "   Execute: cd assets/js && cat main.js navbar-scroll.js > mobile-bundle.js"
    fi
    
    echo "🔧 3. Teste online quando implementado:"
    echo "   - PageSpeed Insights: https://pagespeed.web.dev/"
    echo "   - GTmetrix: https://gtmetrix.com/"
    
    echo ""
    echo "🎯 META: LCP < 2.5s (atual: ~6.1s)"
    echo "💪 Com as otimizações: Esperado 70+ pontos mobile"
    
else
    echo "❌ Execute este script na pasta do projeto MAMP"
fi

echo ""
echo "✅ Teste concluído!" 