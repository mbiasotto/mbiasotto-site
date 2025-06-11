#!/bin/bash

# 📱 Script de Teste de Performance Mobile
# Uso: ./test-mobile-performance.sh [URL_DO_SITE]

echo "🚀 ===== TESTE DE PERFORMANCE MOBILE ===== 🚀"
echo ""

# Definir URL (usar argumento ou padrão)
if [ -z "$1" ]; then
    echo "⚠️  Por favor, forneça a URL do site:"
    echo "   ./test-mobile-performance.sh https://seusite.com"
    exit 1
fi

URL="$1"
echo "🔍 Testando: $URL"
echo "📱 Plataforma: Mobile"
echo ""

# Verificar se curl e jq estão instalados
if ! command -v curl &> /dev/null; then
    echo "❌ curl não encontrado. Instale: brew install curl"
    exit 1
fi

if ! command -v jq &> /dev/null; then
    echo "❌ jq não encontrado. Instale: brew install jq"
    exit 1
fi

echo "⏳ Executando teste Google PageSpeed Insights..."
echo ""

# Fazer requisição para PageSpeed Insights API
RESPONSE=$(curl -s "https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=${URL}&category=performance&strategy=mobile")

# Verificar se a resposta é válida
if [ $? -ne 0 ]; then
    echo "❌ Erro ao fazer requisição para PageSpeed Insights"
    exit 1
fi

# Verificar se há erro na API
ERROR=$(echo "$RESPONSE" | jq -r '.error.message // empty')
if [ ! -z "$ERROR" ]; then
    echo "❌ Erro da API: $ERROR"
    exit 1
fi

echo "📊 ===== RESULTADOS DE PERFORMANCE MOBILE ====="
echo ""

# Performance Score
SCORE=$(echo "$RESPONSE" | jq -r '.lighthouseResult.categories.performance.score * 100')
echo "🎯 Performance Score: ${SCORE}/100"

# Core Web Vitals
echo ""
echo "📈 ===== CORE WEB VITALS ====="

# LCP
LCP=$(echo "$RESPONSE" | jq -r '.lighthouseResult.audits["largest-contentful-paint"].displayValue // "N/A"')
LCP_SCORE=$(echo "$RESPONSE" | jq -r '.lighthouseResult.audits["largest-contentful-paint"].score // 0')
if (( $(echo "$LCP_SCORE < 0.5" | bc -l) )); then
    LCP_STATUS="❌ RUIM"
elif (( $(echo "$LCP_SCORE < 0.9" | bc -l) )); then
    LCP_STATUS="⚠️  PRECISA MELHORAR"
else
    LCP_STATUS="✅ BOM"
fi
echo "• LCP (Largest Contentful Paint): $LCP $LCP_STATUS"

# FID/TBT (Total Blocking Time é usado como proxy)
TBT=$(echo "$RESPONSE" | jq -r '.lighthouseResult.audits["total-blocking-time"].displayValue // "N/A"')
TBT_SCORE=$(echo "$RESPONSE" | jq -r '.lighthouseResult.audits["total-blocking-time"].score // 0')
if (( $(echo "$TBT_SCORE < 0.5" | bc -l) )); then
    TBT_STATUS="❌ RUIM"
elif (( $(echo "$TBT_SCORE < 0.9" | bc -l) )); then
    TBT_STATUS="⚠️  PRECISA MELHORAR"
else
    TBT_STATUS="✅ BOM"
fi
echo "• TBT (Total Blocking Time): $TBT $TBT_STATUS"

# CLS
CLS=$(echo "$RESPONSE" | jq -r '.lighthouseResult.audits["cumulative-layout-shift"].displayValue // "N/A"')
CLS_SCORE=$(echo "$RESPONSE" | jq -r '.lighthouseResult.audits["cumulative-layout-shift"].score // 0')
if (( $(echo "$CLS_SCORE < 0.5" | bc -l) )); then
    CLS_STATUS="❌ RUIM"
elif (( $(echo "$CLS_SCORE < 0.9" | bc -l) )); then
    CLS_STATUS="⚠️  PRECISA MELHORAR"
else
    CLS_STATUS="✅ BOM"
fi
echo "• CLS (Cumulative Layout Shift): $CLS $CLS_STATUS"

echo ""
echo "⚡ ===== MÉTRICAS ADICIONAIS ====="

# FCP
FCP=$(echo "$RESPONSE" | jq -r '.lighthouseResult.audits["first-contentful-paint"].displayValue // "N/A"')
echo "• FCP (First Contentful Paint): $FCP"

# Speed Index
SI=$(echo "$RESPONSE" | jq -r '.lighthouseResult.audits["speed-index"].displayValue // "N/A"')
echo "• Speed Index: $SI"

echo ""
echo "🔧 ===== PRINCIPAIS PROBLEMAS ENCONTRADOS ====="

# Oportunidades de melhoria
OPPORTUNITIES=$(echo "$RESPONSE" | jq -r '.lighthouseResult.audits | to_entries[] | select(.value.scoreDisplayMode == "numeric" and .value.score < 0.9) | .value.title' | head -5)

if [ ! -z "$OPPORTUNITIES" ]; then
    echo "$OPPORTUNITIES" | while read -r line; do
        echo "• $line"
    done
else
    echo "✅ Nenhum problema crítico encontrado!"
fi

echo ""
echo "📋 ===== RECOMENDAÇÕES RÁPIDAS ====="

# Verificar problemas específicos
RENDER_BLOCKING=$(echo "$RESPONSE" | jq -r '.lighthouseResult.audits["render-blocking-resources"].score // 1')
if (( $(echo "$RENDER_BLOCKING < 0.9" | bc -l) )); then
    echo "🚨 CRÍTICO: Eliminar recursos que bloqueiam renderização"
fi

UNUSED_CSS=$(echo "$RESPONSE" | jq -r '.lighthouseResult.audits["unused-css-rules"].score // 1')
if (( $(echo "$UNUSED_CSS < 0.9" | bc -l) )); then
    echo "⚠️  Remover CSS não utilizado"
fi

LARGE_JS=$(echo "$RESPONSE" | jq -r '.lighthouseResult.audits["unminified-javascript"].score // 1')
if (( $(echo "$LARGE_JS < 0.9" | bc -l) )); then
    echo "⚠️  Minificar JavaScript"
fi

IMAGES=$(echo "$RESPONSE" | jq -r '.lighthouseResult.audits["modern-image-formats"].score // 1')
if (( $(echo "$IMAGES < 0.9" | bc -l) )); then
    echo "🖼️  Usar formatos de imagem modernos (WebP)"
fi

echo ""
echo "🎯 ===== PRÓXIMOS PASSOS ====="
echo "1. 📊 Ver relatório detalhado: https://pagespeed.web.dev/analysis?url=${URL}"
echo "2. 📋 Seguir plano: mobile-optimization-plan.md"
echo "3. 🔄 Executar teste novamente após otimizações"
echo ""

# Interpretação do Score
if (( $(echo "$SCORE >= 90" | bc -l) )); then
    echo "🎉 EXCELENTE! Site com ótima performance mobile"
elif (( $(echo "$SCORE >= 70" | bc -l) )); then
    echo "👍 BOM! Algumas otimizações podem melhorar ainda mais"
elif (( $(echo "$SCORE >= 50" | bc -l) )); then
    echo "⚠️  MÉDIO! Otimizações são necessárias para melhor UX"
else
    echo "🚨 CRÍTICO! Performance mobile precisa de atenção urgente"
    echo "   💡 Sugestão: Implemente primeiro as correções em mobile-optimization-plan.md"
fi

echo ""
echo "✅ Teste concluído em $(date)"
echo "==================================================" 