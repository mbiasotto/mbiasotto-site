# Google Analytics 4 - Eventos Configurados
## Programador PHP Freelancer - Tracking de Conversões

### 📊 **ID do GA4**: `G-RGVCBGF67P`

---

## 🎯 **Eventos de Conversão Principal**

### 1. **Cliques em Botões de Orçamento**
- **Nome do Evento**: `click_quote_button`
- **Categoria**: `Conversion`
- **Gatilho**: Cliques em botões "Solicitar Orçamento", "Vamos Conversar", etc.
- **Valores**: 100 (botão principal) / 50 (botões secundários)
- **Conversão GA4**: `generate_lead`

### 2. **Envio de Formulário de Contato**
- **Nome do Evento**: `form_submit`
- **Categoria**: `Conversion`
- **Gatilho**: Submissão de qualquer formulário
- **Valor**: 200
- **Conversão GA4**: `contact_form_submit`

### 3. **Cliques no WhatsApp**
- **Botão Flutuante**: `click_whatsapp_button` (valor: 75)
- **Footer**: `click_whatsapp_footer` (valor: 50)
- **Categoria**: `Contact`

---

## 🔍 **Eventos de Engajamento**

### 4. **Navegação por Serviços**
- **Nome do Evento**: `click_service`
- **Categoria**: `Engagement`
- **Detalhes**: Identifica qual serviço foi clicado (PHP, Laravel, API, etc.)

### 5. **Profundidade de Scroll**
- **Nome do Evento**: `scroll_depth`
- **Categoria**: `Engagement`
- **Marcos**: 25%, 50%, 75%, 100%
- **Evento Especial**: `engaged_user` (75%+ scroll)

### 6. **Tempo na Página**
- **Nome do Evento**: `time_on_page`
- **Categoria**: `Engagement`
- **Marcos**: 30s, 60s, 120s
- **Evento Especial**: `highly_engaged_user` (2+ minutos)

---

## 🧭 **Eventos de Navegação**

### 7. **Menu de Navegação**
- **Nome do Evento**: `click_navigation`
- **Categoria**: `Navigation`
- **Rastreia**: Cliques no menu principal

### 8. **Logo (Home)**
- **Nome do Evento**: `click_logo`
- **Categoria**: `Navigation`

### 9. **Links Externos**
- **Nome do Evento**: `click_external_link`
- **Categoria**: `Outbound`
- **Rastreia**: GitHub, LinkedIn, Instagram

---

## 📄 **Eventos Específicos por Página**

### 10. **Página Inicial**
- `page_view` - Visualização com dados customizados
- Tracking automático de CTAs principais

### 11. **Página do Freelancer**
- **Perfil**: `view_freelancer_profile`
- **Especialidades**: `click_expertise`
- **"Por que escolher"**: `view_why_choose`

### 12. **Página de Serviços**
- **Visualização**: `view_services`
- **Features**: `click_service_feature`

### 13. **Página de Contato**
- **Chegada**: `reach_contact_page`
- **Foco em campos**: `form_field_focus`

---

## 🚨 **Eventos de Comportamento**

### 14. **Exit Intent**
- **Nome do Evento**: `exit_intent`
- **Categoria**: `Behavior`
- **Gatilho**: Mouse sai da área da página

### 15. **Erros JavaScript**
- **Nome do Evento**: `javascript_error`
- **Categoria**: `Error`
- **Auto-tracking**: Erros de código

### 16. **Contato Direto**
- **Email**: `click_email`
- **Telefone**: Integrado com WhatsApp

---

## 📈 **Configurações Avançadas**

### Content Groups:
- **Group 1**: Nome da página (Index, Servicos, Contato, etc.)
- **Group 2**: "Programador PHP Freelancer"

### Custom Parameters:
- `button_location`: Localização do botão clicado
- `service_type`: Tipo de serviço (PHP, Laravel, API)
- `field_type`: Tipo de campo do formulário
- `external_url`: URL de links externos

---

## 🎯 **Eventos de Conversão para Configurar no GA4**

### Eventos Principais (marcar como conversões):
1. ✅ `generate_lead` - Lead gerado
2. ✅ `contact_form_submit` - Formulário enviado
3. ✅ `click_whatsapp_button` - WhatsApp clicado
4. ✅ `reach_contact_page` - Chegou na página de contato

### Eventos de Engajamento (para audiências):
1. `engaged_user` - Usuário engajado (75%+ scroll)
2. `highly_engaged_user` - Altamente engajado (2+ min)
3. `view_freelancer_profile` - Visualizou perfil

---

## 📊 **Relatórios Recomendados**

### 1. **Funil de Conversão**
```
Page View → Service Click → Contact Page → Form Submit
```

### 2. **Análise de Engajamento**
```
Time on Page → Scroll Depth → Service Interest → Contact Action
```

### 3. **Origem do Contato**
```
WhatsApp Button vs Form vs Email vs Footer
```

### 4. **Performance por Serviço**
```
PHP vs Laravel vs API vs Sites
```

---

## 🔧 **Configuração no Google Analytics**

### Passos para configurar conversões:
1. **GA4 Admin → Events**
2. **Mark as conversion**: `generate_lead`, `contact_form_submit`
3. **Create Audiences**: Engaged Users, Service Interested
4. **Custom Reports**: Conversion Funnel, Service Performance

### Campos Customizados Importantes:
- `event_category` - Categoria do evento
- `event_label` - Detalhes específicos
- `service_type` - Tipo de serviço
- `button_location` - Localização do CTA

---

## 📱 **Eventos Mobile vs Desktop**

O tracking automaticamente diferencia:
- Cliques em botões mobile vs desktop
- Scroll behavior diferente
- WhatsApp (mais comum no mobile)
- Formulário vs WhatsApp preference

---

## 🎉 **Eventos Especiais**

### High-Value Actions:
- `generate_lead` (valor: 100 BRL)
- `contact_form_submit` (valor: 200 BRL)
- `click_whatsapp_button` (valor: 75 BRL)

### Micro-Conversions:
- Service page visits
- Profile page engagement
- Social media clicks
- Email clicks

---

**Data de Implementação**: 15 de Janeiro de 2024  
**Desenvolvido por**: Claude AI Assistant  
**Foco**: Conversões de programador PHP freelancer 