<?php 
// Definir função inline se não existir
if (!function_exists('isMobile')) {
    function isMobile() {
        return isset($_SERVER['HTTP_USER_AGENT']) && 
               preg_match('/(android|iphone|ipad|mobile|tablet|blackberry|windows phone)/i', $_SERVER['HTTP_USER_AGENT']);
    }
}

if (isMobile()): 
?>
<style>
/* CSS CRÍTICO MOBILE - Inline para LCP < 2.5s */
:root {
  --primary: #1e3a8a;
  --primary-light: #3b82f6;
  --text: #0f172a;
  --background: #ffffff;
  --text-light: #64748b;
}

/* Reset crítico */
* { margin: 0; padding: 0; box-sizing: border-box; }

body {
  font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
  color: var(--text);
  background: var(--background);
  overflow-x: hidden;
  line-height: 1.6;
}

/* Navbar crítico - above fold */
.navbar {
  background: rgba(30, 58, 138, 0.95) !important;
  backdrop-filter: blur(10px);
  padding: 0.5rem 0;
  position: fixed;
  width: 100%;
  z-index: 1000;
  top: 0;
  border-bottom: 1px solid rgba(255,255,255,0.1);
}

.navbar-brand {
  color: white !important;
  font-weight: 700;
  font-size: 1.25rem;
}

.navbar-nav .nav-link {
  color: rgba(255,255,255,0.9) !important;
  font-weight: 500;
  padding: 0.75rem 1rem !important;
  min-height: 48px;
  display: flex;
  align-items: center;
}

/* HERO SECTION - ELEMENTO CRÍTICO LCP */
.hero-section {
  min-height: 100vh;
  background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
  display: flex;
  align-items: center;
  color: white;
  padding-top: 80px;
  position: relative;
}

.hero-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: radial-gradient(circle at 30% 20%, rgba(59, 130, 246, 0.3) 0%, transparent 50%);
  pointer-events: none;
}

/* HERO CONTENT - OTIMIZADO PARA LCP */
.hero-content {
  position: relative;
  z-index: 2;
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 1rem;
  text-align: center;
}

/* HERO TITLE - ELEMENTO LCP */
.hero-title {
  font-size: 2.5rem;
  line-height: 1.2;
  margin-bottom: 1rem;
  font-weight: 700;
  font-family: "Manrope", "Inter", sans-serif;
  text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

/* HERO SUBTITLE - ELEMENTO CRÍTICO DO LCP */
.hero-subtitle {
  font-size: 1.125rem;
  line-height: 1.6;
  margin-bottom: 2rem;
  font-weight: 300;
  opacity: 0.95;
  max-width: 800px;
  margin-left: auto;
  margin-right: auto;
}

/* BOTÕES DO HERO */
.hero-buttons {
  margin-bottom: 2rem;
}

.btn-cta-primary {
  background: rgba(255,255,255,0.2);
  border: 2px solid rgba(255,255,255,0.3);
  color: white;
  padding: 12px 24px;
  border-radius: 8px;
  text-decoration: none;
  display: inline-block;
  min-height: 48px;
  touch-action: manipulation;
  font-weight: 600;
  transition: all 0.3s ease;
  backdrop-filter: blur(10px);
}

.btn-cta-primary:hover {
  background: rgba(255,255,255,0.3);
  border-color: rgba(255,255,255,0.5);
  color: white;
  text-decoration: none;
  transform: translateY(-2px);
}

/* BADGES DO HERO */
.hero-badges {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 0.5rem;
}

.badge-custom {
  background: rgba(255,255,255,0.15);
  border: 1px solid rgba(255,255,255,0.2);
  color: white;
  padding: 0.5rem 1rem;
  border-radius: 25px;
  font-size: 0.875rem;
  font-weight: 500;
  backdrop-filter: blur(10px);
}

/* CONTAINER E UTILS */
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 1rem;
}

.text-center { text-align: center; }
.mb-4 { margin-bottom: 1.5rem; }
.mb-5 { margin-bottom: 2rem; }
.d-block { display: block; }
.text-blue-200 { color: #bfdbfe; }

/* RESPONSIVO CRÍTICO */
@media (max-width: 768px) {
  .hero-title {
    font-size: 2rem;
    margin-bottom: 1rem;
  }
  
  .hero-subtitle {
    font-size: 1rem;
    margin-bottom: 1.5rem;
  }
  
  .btn-cta-primary {
    padding: 14px 20px;
    font-size: 1rem;
  }
  
  .badge-custom {
    font-size: 0.8rem;
    padding: 0.4rem 0.8rem;
  }
}

@media (max-width: 576px) {
  .hero-title {
    font-size: 1.75rem;
  }
  
  .hero-subtitle {
    font-size: 0.95rem;
  }
  
  .hero-badges {
    gap: 0.3rem;
  }
}
</style>
<?php endif; ?> 