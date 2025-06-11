# 🚀 Como Ativar as Otimizações Mobile

## ⚠️ IMPORTANTE: Substituir chamadas CSS/JS no header.php

### 1. **Localizar no header.php** (linha ~200-300):
Procure por tags como:
```html
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/...">
```

### 2. **SUBSTITUIR por:**
```php
<?php 
// CSS otimizado para mobile
loadOptimizedCSS(); 
?>
```

### 3. **Localizar scripts no final do header.php:**
Procure por:
```html
<script src="assets/js/main.js"></script>
<script src="assets/js/navbar-scroll.js"></script>
```

### 4. **SUBSTITUIR por:**
```php
<?php 
// JavaScript otimizado para mobile
loadOptimizedJS(); 
?>
```

### 5. **Ou usar bundle direto:**
```html
<!-- Para mobile apenas -->
<?php if (isMobile()): ?>
    <script src="assets/js/mobile-bundle.js" defer></script>
<?php else: ?>
    <!-- Scripts desktop normais -->
    <script src="assets/js/main.js" defer></script>
    <script src="assets/js/navbar-scroll.js" defer></script>
<?php endif; ?>
```

## 🎯 Resultado Esperado:
- **LCP mobile**: 6.1s → <2.5s  
- **Performance**: 67 → 75+ pontos
- **FCP**: 3.8s → <1.8s

## ✅ Teste após implementar:
```bash
./quick-test.sh
``` 