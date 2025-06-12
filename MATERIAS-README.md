# Sistema de Matérias para SEO - Versão Simplificada

Sistema simples de páginas de longtail para SEO, usando os componentes existentes do projeto.

## 📁 Arquivos Criados

### Componentes
- `components/materias-home.php` - Mostra matérias na home
- `components/materia-template.php` - Template simples das páginas individuais

### Páginas
- `materias.php` - Página que lista todas as matérias
- 11 páginas individuais de matérias (automáticas)

### Configuração
- `includes/longtail-config.php` - Todos os textos das matérias
- `generate-longtail-pages.php` - Script para gerar páginas automaticamente

## 🚀 Como Usar

### 1. Adicionar na Home Page
Inclua acima do footer na `index.php`:
```php
<?php include 'components/materias-home.php'; ?>
```

### 2. Gerar Páginas Restantes
Se precisar gerar mais páginas:
```
http://localhost/mbiasotto/generate-longtail-pages.php
```

### 3. Acessar Páginas
- **Lista de matérias:** `http://localhost/mbiasotto/materias`
- **Páginas individuais:** `http://localhost/mbiasotto/[slug-da-materia]`

## 📋 Matérias Criadas (11 total)

**Contratação:**
1. Como contratar um programador PHP freelancer sem entender de tecnologia
2. Freelancer ou agência? Veja qual é melhor para seu projeto em PHP
3. 5 erros comuns ao contratar um programador PHP e como evitá-los
4. O que um bom programador PHP precisa entregar além do código

**Preços:**
5. Quanto custa um site ou sistema feito em PHP?
6. Sistema pronto ou sob medida? Entenda quando vale a pena criar do zero

**Tecnologia:**
7. PHP ainda é uma boa escolha em 2025? Veja quando vale a pena usar
8. Integrações em PHP: como conectar seu sistema com WhatsApp, PagSeguro, etc.
9. Tem um sistema antigo em PHP? Veja como modernizar sem começar do zero
10. Checklist para saber se seu sistema em PHP precisa de manutenção urgente
11. **Automação com ChatBot e n8n: como PHP pode revolucionar seus processos**

## 🎯 Características do Sistema

✅ **Simples** - Usa componentes existentes do projeto
✅ **Limpo** - Sem complexidades desnecessárias  
✅ **Responsivo** - Layout 75/25 funciona bem no mobile
✅ **SEO** - Meta tags otimizadas para longtail
✅ **Conversão** - CTAs estratégicos e formulário de contato

## 🔧 Estrutura das Páginas

### Home Component
- Mostra 3 matérias em destaque
- Usa `service-card` existente
- Botão "Ver Todas" leva para `/materias`

### Página de Listagem  
- Lista todas as 11 matérias
- Usa `service-detail-card` existente
- Inclui `cta-section` no final

### Páginas Individuais
- **Hero:** Título da matéria
- **Layout:** 75% conteúdo + 25% sidebar
- **Sidebar:** `quick-contact-form` + link para outras matérias
- **Final:** `cta-section` existente

## 🖼️ Imagens

Por enquanto usa `materia-default.svg` para todas as páginas.
Substitua por imagens específicas depois se quiser.

## ⚡ Próximos Passos

1. **Incluir na home:** Adicione o componente na `index.php`
2. **Testar páginas:** Acesse algumas matérias para verificar
3. **Melhorar imagens:** Crie imagens específicas se quiser
4. **Sitemap:** Adicione as URLs no sitemap.xml
5. **Analytics:** Configure tracking para as páginas

---

**Versão Simplificada** - Janeiro 2025  
Sistema criado focando em simplicidade e aproveitamento dos componentes existentes. 