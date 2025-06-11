#!/bin/bash

# ===========================================
# 🚀 TESTE AUTOMATIZADO DE PERFORMANCE MOBILE
# ===========================================

echo "🚀 Iniciando testes de performance mobile..."
echo "======================================"

# Cores para output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Configurações
SITE_URL="http://localhost/mbiasotto"
API_KEY="YOUR_PAGESPEED_API_KEY"  # Opcional
MOBILE_UA="Mozilla/5.0 (Linux; Android 10; SM-G973F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Mobile Safari/537.36"

# ===========================================
# 1. TESTES BÁSICOS DE CONECTIVIDADE
# ===========================================

echo -e "\n${BLUE}1. Testando conectividade básica...${NC}"

# Teste de resposta HTTP
echo "📡 Testando resposta HTTP..."
HTTP_STATUS=$(curl -s -o /dev/null -w "%{http_code}" "$SITE_URL")

if [ "$HTTP_STATUS" = "200" ]; then
    echo -e "   ✅ Site respondendo: ${GREEN}HTTP $HTTP_STATUS${NC}"
else
    echo -e "   ❌ Erro: ${RED}HTTP $HTTP_STATUS${NC}"
    exit 1
fi

# Teste de tempo de resposta
echo "⏱️  Testando tempo de resposta..."
RESPONSE_TIME=$(curl -s -o /dev/null -w "%{time_total}" "$SITE_URL")
echo -e "   📊 Tempo total: ${YELLOW}${RESPONSE_TIME}s${NC}"

# ===========================================
# 2. TESTES DE COMPRESSÃO
# ===========================================

echo -e "\n${BLUE}2. Testando compressão de arquivos...${NC}"

# Teste Gzip
echo "🗜️  Testando compressão Gzip..."
GZIP_TEST=$(curl -s -H "Accept-Encoding: gzip" -I "$SITE_URL" | grep -i "content-encoding: gzip")

if [ -n "$GZIP_TEST" ]; then
    echo -e "   ✅ Gzip: ${GREEN}Ativado${NC}"
else
    echo -e "   ⚠️  Gzip: ${YELLOW}Não detectado${NC}"
fi

# Teste recursos CSS/JS
echo "📄 Testando compressão de recursos..."

# Bootstrap CSS
BOOTSTRAP_SIZE=$(curl -s -H "Accept-Encoding: gzip" "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" | wc -c)
echo -e "   📊 Bootstrap CSS comprimido: ${YELLOW}${BOOTSTRAP_SIZE} bytes${NC}"

# Font Awesome CSS  
FONTAWESOME_SIZE=$(curl -s -H "Accept-Encoding: gzip" "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" | wc -c)
echo -e "   📊 Font Awesome comprimido: ${YELLOW}${FONTAWESOME_SIZE} bytes${NC}"

# ===========================================
# 3. TESTES DE RECURSOS CRÍTICOS
# ===========================================

echo -e "\n${BLUE}3. Testando carregamento de recursos críticos...${NC}"

# Teste se CSS crítico está inline
echo "🎨 Verificando CSS crítico inline..."
CRITICAL_CSS=$(curl -s "$SITE_URL" | grep -c "hero-section\|hero-subtitle")

if [ "$CRITICAL_CSS" -gt 0 ]; then
    echo -e "   ✅ CSS crítico: ${GREEN}Inline detectado${NC}"
else
    echo -e "   ❌ CSS crítico: ${RED}Não encontrado${NC}"
fi

# Teste se logo otimizado está presente
echo "🖼️  Verificando logo otimizado..."
LOGO_SVG=$(curl -s "$SITE_URL" | grep -c "<svg.*logo")

if [ "$LOGO_SVG" -gt 0 ]; then
    echo -e "   ✅ Logo SVG: ${GREEN}Detectado${NC}"
else
    echo -e "   ⚠️  Logo SVG: ${YELLOW}PNG ainda em uso${NC}"
fi

# ===========================================
# 4. TESTES DE JAVASCRIPT
# ===========================================

echo -e "\n${BLUE}4. Testando JavaScript otimizado...${NC}"

# Verificar se bundle minificado existe
if [ -f "assets/js/critical-bundle.min.js" ]; then
    BUNDLE_SIZE=$(stat -f%z "assets/js/critical-bundle.min.js" 2>/dev/null || stat -c%s "assets/js/critical-bundle.min.js" 2>/dev/null)
    echo -e "   ✅ Bundle JS: ${GREEN}${BUNDLE_SIZE} bytes${NC}"
else
    echo -e "   ⚠️  Bundle JS: ${YELLOW}Não encontrado${NC}"
fi

# Verificar se scripts são carregados de forma assíncrona
echo "⚡ Verificando carregamento assíncrono..."
ASYNC_SCRIPTS=$(curl -s "$SITE_URL" | grep -c "loadCSS\|addEventListener.*load")

if [ "$ASYNC_SCRIPTS" -gt 0 ]; then
    echo -e "   ✅ Carregamento assíncrono: ${GREEN}Implementado${NC}"
else
    echo -e "   ❌ Carregamento assíncrono: ${RED}Não implementado${NC}"
fi

# ===========================================
# 5. TESTES MOBILE-SPECIFIC
# ===========================================

echo -e "\n${BLUE}5. Testes específicos para mobile...${NC}"

# User-Agent mobile
echo "📱 Testando com User-Agent mobile..."
MOBILE_RESPONSE=$(curl -s -H "User-Agent: $MOBILE_UA" "$SITE_URL" | wc -c)
echo -e "   📊 Tamanho resposta mobile: ${YELLOW}${MOBILE_RESPONSE} bytes${NC}"

# Viewport meta tag
echo "🔍 Verificando viewport meta tag..."
VIEWPORT_META=$(curl -s "$SITE_URL" | grep -c 'meta name="viewport"')

if [ "$VIEWPORT_META" -gt 0 ]; then
    echo -e "   ✅ Viewport meta: ${GREEN}Presente${NC}"
else
    echo -e "   ❌ Viewport meta: ${RED}Ausente${NC}"
fi

# ===========================================
# 6. LIGHTHOUSE LOCAL (se disponível)
# ===========================================

echo -e "\n${BLUE}6. Testando com Lighthouse (se disponível)...${NC}"

if command -v lighthouse &> /dev/null; then
    echo "🔍 Executando Lighthouse mobile..."
    
    # Criar diretório para reports
    mkdir -p reports
    
    # Executar Lighthouse
    lighthouse "$SITE_URL" \
        --chrome-flags="--headless --no-sandbox" \
        --form-factor=mobile \
        --throttling-method=simulate \
        --throttling.cpuSlowdownMultiplier=4 \
        --throttling.requestLatencyMs=150 \
        --throttling.downloadThroughputKbps=1600 \
        --throttling.uploadThroughputKbps=750 \
        --output=json \
        --output-path=reports/lighthouse-mobile.json \
        --quiet
    
    if [ -f "reports/lighthouse-mobile.json" ]; then
        # Extrair métricas principais
        PERFORMANCE_SCORE=$(cat reports/lighthouse-mobile.json | jq '.categories.performance.score * 100')
        FCP=$(cat reports/lighthouse-mobile.json | jq '.audits["first-contentful-paint"].numericValue / 1000')
        LCP=$(cat reports/lighthouse-mobile.json | jq '.audits["largest-contentful-paint"].numericValue / 1000')
        SPEED_INDEX=$(cat reports/lighthouse-mobile.json | jq '.audits["speed-index"].numericValue / 1000')
        
        echo -e "   📊 Performance Score: ${YELLOW}${PERFORMANCE_SCORE}/100${NC}"
        echo -e "   📊 First Contentful Paint: ${YELLOW}${FCP}s${NC}"
        echo -e "   📊 Largest Contentful Paint: ${YELLOW}${LCP}s${NC}"
        echo -e "   📊 Speed Index: ${YELLOW}${SPEED_INDEX}s${NC}"
        
        # Avaliar resultados
        if (( $(echo "$PERFORMANCE_SCORE >= 85" | bc -l) )); then
            echo -e "   🎉 Performance: ${GREEN}EXCELENTE!${NC}"
        elif (( $(echo "$PERFORMANCE_SCORE >= 70" | bc -l) )); then
            echo -e "   👍 Performance: ${YELLOW}BOM${NC}"
        else
            echo -e "   ⚠️  Performance: ${RED}PRECISA MELHORAR${NC}"
        fi
    fi
else
    echo -e "   ⚠️  Lighthouse não instalado. Instale com: ${YELLOW}npm install -g lighthouse${NC}"
fi

# ===========================================
# 7. PAGESPEED INSIGHTS API (se API key disponível)
# ===========================================

if [ -n "$API_KEY" ] && [ "$API_KEY" != "YOUR_PAGESPEED_API_KEY" ]; then
    echo -e "\n${BLUE}7. Testando com PageSpeed Insights API...${NC}"
    
    echo "🌐 Consultando PageSpeed Insights..."
    PAGESPEED_URL="https://www.googleapis.com/pagespeedonline/v5/runPagespeed"
    PAGESPEED_PARAMS="?url=${SITE_URL}&strategy=mobile&key=${API_KEY}"
    
    PAGESPEED_RESULT=$(curl -s "${PAGESPEED_URL}${PAGESPEED_PARAMS}")
    
    if [ $? -eq 0 ]; then
        echo "   ✅ PageSpeed API consultada com sucesso"
        echo "$PAGESPEED_RESULT" > reports/pagespeed-api-result.json
    else
        echo -e "   ❌ Erro ao consultar PageSpeed API: ${RED}Verifique API key${NC}"
    fi
fi

# ===========================================
# 8. RELATÓRIO FINAL
# ===========================================

echo -e "\n${BLUE}📋 RELATÓRIO FINAL${NC}"
echo "======================================"

# Calcular score geral baseado nos testes
TOTAL_TESTS=6
PASSED_TESTS=0

# Contabilizar testes passados
[ "$HTTP_STATUS" = "200" ] && ((PASSED_TESTS++))
[ -n "$GZIP_TEST" ] && ((PASSED_TESTS++))
[ "$CRITICAL_CSS" -gt 0 ] && ((PASSED_TESTS++))
[ "$LOGO_SVG" -gt 0 ] && ((PASSED_TESTS++))
[ "$ASYNC_SCRIPTS" -gt 0 ] && ((PASSED_TESTS++))
[ "$VIEWPORT_META" -gt 0 ] && ((PASSED_TESTS++))

SCORE_PERCENTAGE=$((PASSED_TESTS * 100 / TOTAL_TESTS))

echo -e "📊 Score dos Testes: ${YELLOW}${PASSED_TESTS}/${TOTAL_TESTS} (${SCORE_PERCENTAGE}%)${NC}"

if [ "$SCORE_PERCENTAGE" -ge 85 ]; then
    echo -e "🎉 Status: ${GREEN}OTIMIZAÇÕES IMPLEMENTADAS COM SUCESSO!${NC}"
elif [ "$SCORE_PERCENTAGE" -ge 70 ]; then
    echo -e "👍 Status: ${YELLOW}BOAS OTIMIZAÇÕES, ALGUMAS MELHORIAS PENDENTES${NC}"
else
    echo -e "⚠️  Status: ${RED}VÁRIAS OTIMIZAÇÕES AINDA PRECISAM SER IMPLEMENTADAS${NC}"
fi

# Recomendações
echo -e "\n💡 ${BLUE}PRÓXIMOS PASSOS:${NC}"

if [ "$HTTP_STATUS" != "200" ]; then
    echo -e "   🔧 Corrigir problema de conectividade (HTTP $HTTP_STATUS)"
fi

if [ -z "$GZIP_TEST" ]; then
    echo -e "   🔧 Ativar compressão Gzip no .htaccess"
fi

if [ "$CRITICAL_CSS" -eq 0 ]; then
    echo -e "   🔧 Implementar CSS crítico inline com header-performance.php"
fi

if [ "$LOGO_SVG" -eq 0 ]; then
    echo -e "   🔧 Substituir logo PNG por SVG otimizado"
fi

if [ "$ASYNC_SCRIPTS" -eq 0 ]; then
    echo -e "   🔧 Implementar carregamento assíncrono de CSS/JS"
fi

if [ "$VIEWPORT_META" -eq 0 ]; then
    echo -e "   🔧 Adicionar viewport meta tag para mobile"
fi

echo -e "\n📁 Logs salvos em: ${YELLOW}reports/${NC}"
echo -e "🔗 Para testes completos: ${YELLOW}https://pagespeed.web.dev/analysis?url=${SITE_URL}&form_factor=mobile${NC}"

echo -e "\n✨ Teste concluído!" 