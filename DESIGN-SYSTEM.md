# Sistema de Design Padronizado - Maurício Biasotto

## 📋 Índice
1. [Visão Geral](#visão-geral)
2. [Paleta de Cores](#paleta-de-cores)
3. [Tipografia](#tipografia)
4. [Sistema de Botões](#sistema-de-botões)
5. [Sistema de Ícones](#sistema-de-ícones)
6. [Sistema de Cards](#sistema-de-cards)
7. [Gradientes e Sombras](#gradientes-e-sombras)
8. [Espaçamentos](#espaçamentos)
9. [Responsividade](#responsividade)
10. [Exemplos de Uso](#exemplos-de-uso)

---

## 🎨 Visão Geral

Este sistema de design padronizado foi criado para garantir consistência visual e facilitar a manutenção do projeto. Todas as classes são reutilizáveis e seguem um padrão de nomenclatura intuitivo.

### Princípios do Design System:
- **Consistência**: Cores, tamanhos e espaçamentos padronizados
- **Reutilização**: Classes que podem ser aplicadas em diferentes contextos
- **Manutenibilidade**: Fácil de atualizar e modificar
- **Responsividade**: Adaptação automática para diferentes dispositivos
- **Performance**: CSS otimizado com variáveis CSS

---

## 🎯 Paleta de Cores

### Cores Primárias
```css
--primary: #1e3a8a           /* Azul escuro principal */
--primary-light: #3b82f6     /* Azul médio */
--accent: #3b82f6            /* Azul de destaque */
--accent-light: #60a5fa      /* Azul claro */
```

### Cores Neutras
```css
--dark: #212529              /* Footer/Header (igual ao Bootstrap bg-dark) */
--text: #0f172a              /* Texto principal (preto) */
--text-light: #64748b        /* Texto secundário (cinza médio) */
--background: #ffffff        /* Fundo principal (branco) */
--background-alt: #f8fafc    /* Fundo alternativo (cinza muito claro) */
```

### Classes Utilitárias de Cor
```css
.text-primary     /* Cor primária para texto */
.text-accent      /* Cor de destaque para texto */
.text-light       /* Cor clara para texto */
.bg-primary       /* Fundo primário */
.bg-gradient-primary /* Fundo com gradiente primário */
.bg-dark          /* Fundo escuro (header/footer) */
```

---

## ✍️ Tipografia

### Hierarquia de Títulos

#### Títulos Principais
- **`.title-hero`** - Títulos de hero (3.5rem / 56px)
- **`.title-section`** - Títulos de seção (2.5rem / 40px)
- **`.title-card`** - Títulos de cards (1.5rem / 24px)
- **`.title-small`** - Títulos pequenos (1.125rem / 18px)

#### Subtítulos
- **`.subtitle-hero`** - Subtítulos de hero (1.25rem / 20px)
- **`.subtitle-section`** - Subtítulos de seção (1.125rem / 18px)
- **`.subtitle-card`** - Subtítulos de card (1rem / 16px)

### Fontes
- **Títulos**: "Manrope", "Inter", sans-serif (font-weight: 600-800)
- **Corpo**: "Inter", "Poppins", sans-serif (font-weight: 300-400)

### Exemplo de Uso
```html
<h1 class="title-hero">Título Principal</h1>
<p class="subtitle-hero">Subtítulo explicativo</p>

<h2 class="title-section">Título de Seção</h2>
<p class="subtitle-section">Descrição da seção</p>
```

---

## 🔲 Sistema de Botões

### Tipos de Botão

#### 1. Botão Primário (`btn-primary-standard`)
- **Uso**: Ações principais, CTAs importantes
- **Estilo**: Gradiente azul com sombra
- **Hover**: Elevação + sombra aumentada

```html
<button class="btn-primary-standard">
  <i class="fas fa-check me-2"></i>
  Confirmar
</button>
```

#### 2. Botão Secundário (`btn-secondary-standard`)
- **Uso**: Ações secundárias, cancelar
- **Estilo**: Outline azul, fundo transparente
- **Hover**: Fundo azul + texto branco

```html
<button class="btn-secondary-standard">
  <i class="fas fa-times me-2"></i>
  Cancelar
</button>
```

#### 3. Botão de Formulário (`btn-form-submit`)
- **Uso**: Submissão de formulários
- **Estilo**: Gradiente azul, padding maior
- **Hover**: Elevação sutil

```html
<button type="submit" class="btn-form-submit">
  <i class="fas fa-paper-plane me-2"></i>
  Enviar Mensagem
</button>
```

#### 4. Botão CTA Especial (`btn-cta-enhanced`)
- **Uso**: CTAs de destaque em seções especiais
- **Estilo**: Glassmorphism, efeito shimmer
- **Hover**: Brilho + elevação

```html
<a href="/contato" class="btn-cta-enhanced">
  <i class="fas fa-rocket me-2"></i>
  Solicitar Orçamento
</a>
```

#### 5. Botão Redondo (`btn-icon-round`)
- **Uso**: Ações com ícone único
- **Estilo**: Circular, gradiente azul
- **Hover**: Elevação

```html
<button class="btn-icon-round">
  <i class="fas fa-chevron-down"></i>
</button>
```

---

## 🎯 Sistema de Ícones

### Containers de Ícone

#### 1. Container Primário (`icon-container-primary`)
- **Uso**: Ícones principais, destaques
- **Estilo**: Gradiente azul + sombra
- **Tamanho**: 60x60px

```html
<div class="icon-container-primary">
  <i class="fas fa-code"></i>
</div>
```

#### 2. Container Secundário (`icon-container-secondary`)
- **Uso**: Ícones secundários, informações
- **Estilo**: Fundo claro + borda azul
- **Hover**: Fundo azul + ícone branco

```html
<div class="icon-container-secondary">
  <i class="fas fa-users"></i>
</div>
```

#### 3. Container de Destaque (`icon-container-accent`)
- **Uso**: Ícones de destaque
- **Estilo**: Azul sólido + sombra
- **Hover**: Azul claro + elevação

```html
<div class="icon-container-accent">
  <i class="fas fa-star"></i>
</div>
```

#### 4. Container Glassmorphism (`icon-container-glass`)
- **Uso**: Ícones em fundos escuros/gradientes
- **Estilo**: Transparente + blur + borda sutil
- **Hover**: Mais opacidade + elevação

```html
<div class="icon-container-glass">
  <i class="fas fa-shield-alt"></i>
</div>
```

---

## 🃏 Sistema de Cards

### Tipos de Card

#### 1. Card Padrão (`card-standard`)
- **Uso**: Conteúdo geral, informações
- **Estilo**: Fundo branco + sombra sutil + borda

```html
<div class="card-standard p-4">
  <h3 class="title-card">Título do Card</h3>
  <p class="subtitle-card">Descrição do conteúdo</p>
</div>
```

#### 2. Card com Hover (`card-hover`)
- **Uso**: Cards interativos, serviços
- **Estilo**: Igual ao padrão + efeito hover
- **Hover**: Elevação + sombra aumentada

```html
<div class="card-hover p-4">
  <div class="icon-container-primary mb-3">
    <i class="fas fa-laptop-code"></i>
  </div>
  <h3 class="title-card">Desenvolvimento</h3>
  <p class="subtitle-card">Soluções personalizadas</p>
</div>
```

#### 3. Card com Gradiente (`card-gradient`)
- **Uso**: Cards de destaque, CTAs
- **Estilo**: Gradiente azul + texto branco
- **Conteúdo**: Texto branco

```html
<div class="card-gradient p-4">
  <h3 class="title-card text-white">Destaque</h3>
  <p class="subtitle-card text-white-75">Conteúdo importante</p>
</div>
```

#### 4. Card Glassmorphism (`card-glass`)
- **Uso**: Cards em fundos especiais
- **Estilo**: Transparente + blur + borda sutil
- **Conteúdo**: Texto branco

```html
<div class="card-glass p-4">
  <h3 class="title-card text-white">Título</h3>
  <p class="subtitle-card text-white-75">Descrição</p>
</div>
```

---

## 🌈 Gradientes e Sombras

### Gradientes
```css
--gradient-primary: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%)
--gradient-subtle: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%)
```

### Sombras
```css
--shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1)              /* Padrão */
--shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1)         /* Grande */
--shadow-hover: 0 8px 25px 0 rgba(59, 130, 246, 0.4)     /* Hover azul */
--shadow-subtle: 0 2px 8px rgba(0, 0, 0, 0.1)            /* Sutil */
```

### Bordas
```css
--border-radius: 16px        /* Padrão */
--border-radius-sm: 8px      /* Pequeno */
--border-radius-lg: 20px     /* Grande */
--border-radius-xl: 25px     /* Extra grande */
```

---

## 📏 Espaçamentos

### Sistema de Espaçamento
```css
--spacing-xs: 0.5rem    /* 8px */
--spacing-sm: 1rem      /* 16px */
--spacing-md: 1.5rem    /* 24px */
--spacing-lg: 2rem      /* 32px */
--spacing-xl: 3rem      /* 48px */
```

### Uso nos Componentes
- **Margins**: Use as variáveis de espaçamento
- **Paddings**: Componentes já incluem padding adequado
- **Gaps**: Para flexbox e grid

---

## 📱 Responsividade

### Breakpoints
- **Desktop**: > 768px
- **Tablet**: ≤ 768px
- **Mobile**: ≤ 576px

### Adaptações Automáticas

#### Tablet (≤ 768px)
- Títulos reduzidos
- Botões com padding menor
- Ícones menores (50x50px)

#### Mobile (≤ 576px)
- Títulos ainda menores
- Espaçamentos reduzidos
- Layout mais compacto

---

## 💡 Exemplos de Uso

### 1. Seção de Serviços
```html
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="title-section">Nossos Serviços</h2>
      <p class="subtitle-section">Soluções completas para seu negócio</p>
    </div>
    
    <div class="row g-4">
      <div class="col-lg-4">
        <div class="card-hover p-4 text-center">
          <div class="icon-container-primary mx-auto mb-3">
            <i class="fas fa-code"></i>
          </div>
          <h3 class="title-card">Desenvolvimento PHP</h3>
          <p class="subtitle-card">Aplicações robustas e escaláveis</p>
          <a href="#" class="btn-secondary-standard">
            Saiba Mais
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
```

### 2. CTA de Destaque
```html
<section class="py-5 bg-gradient-primary position-relative">
  <div class="container">
    <div class="text-center">
      <h2 class="title-section text-white">Pronto para começar?</h2>
      <p class="subtitle-section text-white-75">Entre em contato hoje mesmo</p>
      <a href="/contato" class="btn-cta-enhanced">
        <i class="fas fa-rocket me-2"></i>
        Solicitar Orçamento
      </a>
    </div>
  </div>
</section>
```

### 3. Card de Informações
```html
<div class="card-standard p-4">
  <div class="d-flex align-items-start">
    <div class="icon-container-accent me-3">
      <i class="fas fa-phone"></i>
    </div>
    <div>
      <h4 class="title-small">Telefone</h4>
      <p class="subtitle-card mb-0">(15) 98118-7063</p>
    </div>
  </div>
</div>
```

---

## 🔧 Manutenção

### Alterando Cores
Para alterar as cores do sistema, modifique as variáveis CSS no `:root`:

```css
:root {
  --primary: #sua-nova-cor;
  --accent: #sua-cor-destaque;
}
```

### Adicionando Novos Componentes
1. Siga a nomenclatura padrão: `tipo-variante`
2. Use as variáveis CSS existentes
3. Inclua estado hover quando apropriado
4. Adicione responsividade
5. Documente o novo componente

### Boas Práticas
- Sempre use as classes padronizadas
- Evite CSS inline
- Teste em diferentes dispositivos
- Mantenha a documentação atualizada
- Use as variáveis CSS para consistência

---

## ⚡ Performance

- **Variáveis CSS**: Mudanças globais rápidas
- **Classes reutilizáveis**: Menos CSS duplicado
- **Otimização**: Apenas os estilos necessários carregados
- **Cache-friendly**: Estrutura de classes estável

---

*Última atualização: 2024*
*Versão: 1.0* 