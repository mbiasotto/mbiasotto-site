    <!-- Footer -->
    <footer class="footer bg-dark text-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="mb-3">
                        <img src="<?php echo asset('assets/images/logo-white.png'); ?>" alt="DevPHP Solutions - Programador PHP Freelancer Sorocaba SP" height="50">
                    </div>
                    <p>Desenvolvedor PHP Freelancer com 20 anos de experiência, especializado em Laravel, SlimPHP, APIs e automações. Transformando ideias em soluções digitais eficientes para empresas de todos os portes.</p>
                    
                    <div class="social-links">
                        <a href="https://github.com/mbiasotto" class="social-link me-3" target="_blank" rel="noopener noreferrer" 
                           onclick="trackExternalLink('https://github.com/mbiasotto', 'GitHub Profile')">
                            <i class="fab fa-github" aria-hidden="true"></i>
                            <span class="sr-only">GitHub do Maurício Biasotto</span>
                        </a>
                        <a href="https://www.linkedin.com/in/mauriciobiasotto/" class="social-link me-3" target="_blank" rel="noopener noreferrer"
                           onclick="trackExternalLink('https://www.linkedin.com/in/mauriciobiasotto/', 'LinkedIn Profile')">
                            <i class="fab fa-linkedin" aria-hidden="true"></i>
                            <span class="sr-only">LinkedIn do Maurício Biasotto</span>
                        </a>
                        <a href="https://www.instagram.com/mbiasotto/" class="social-link" target="_blank" rel="noopener noreferrer"
                           onclick="trackExternalLink('https://www.instagram.com/mbiasotto/', 'Instagram Profile')">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                            <span class="sr-only">Instagram do Maurício Biasotto</span>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-3">Serviços</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="<?php echo url('servicos'); ?>">Desenvolvimento PHP</a></li>
                        <li class="mb-2"><a href="<?php echo url('servicos'); ?>">Framework Laravel</a></li>
                        <li class="mb-2"><a href="<?php echo url('servicos'); ?>">Desenvolvimento de Sites</a></li>
                        <li class="mb-2"><a href="<?php echo url('servicos'); ?>">Construção de APIs</a></li>
                        <li class="mb-2"><a href="<?php echo url('servicos'); ?>">Desenvolvimento de Sistemas</a></li>
                        <li class="mb-2"><a href="<?php echo url('servicos'); ?>">Automações com n8n e IA</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="mb-3">Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="<?php echo url(''); ?>">Home</a></li>
                        <li class="mb-2"><a href="<?php echo url('servicos'); ?>">Serviços</a></li>
                        <li class="mb-2"><a href="<?php echo url('como-trabalhamos'); ?>">Como Trabalhamos</a></li>
                        <li class="mb-2"><a href="<?php echo url('programador-php-freelancer'); ?>">Quem Sou</a></li>
                        <li class="mb-2"><a href="<?php echo url('contato'); ?>">Contato</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 mb-4">
                    <h5 class="mb-3">Contato</h5>
                    <div class="contact-info">
                        <div class="contact-item mb-2">
                            <i class="fas fa-envelope me-2" aria-hidden="true"></i>
                            <span><a href="mailto:mauricio@mbiasotto.com" style="color: inherit; text-decoration: none;" 
                                     onclick="gtag('event', 'click_email', {event_category: 'Contact', event_label: 'Email Click'});">mauricio@mbiasotto.com</a></span>
                        </div>
                        <div class="contact-item mb-2">
                            <i class="fas fa-phone me-2" aria-hidden="true"></i>
                            <span><a href="https://wa.me/5515981187063" target="_blank" style="color: inherit; text-decoration: none;"
                                     onclick="gtag('event', 'click_whatsapp_footer', {event_category: 'Contact', event_label: 'WhatsApp Footer Click', value: 50});">(15) 98118-7063</a></span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt me-2" aria-hidden="true"></i>
                            <span>Sorocaba, SP - Brasil</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <p class="mb-0">&copy; <?php echo date('Y'); ?> Programador PHP Freelancer. Todos os direitos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Button -->
    <a href="https://wa.me/5515981187063?text=Olá! Gostaria de solicitar um orçamento." class="whatsapp-btn" target="_blank"
       onclick="gtag('event', 'click_whatsapp_button', {event_category: 'Contact', event_label: 'WhatsApp Floating Button', value: 75});">
        <i class="fab fa-whatsapp" aria-hidden="true"></i>
        <span class="sr-only">Contato via WhatsApp</span>
    </a>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop" aria-label="Voltar ao topo">
        <i class="fas fa-chevron-up" aria-hidden="true"></i>
    </button>

    <!-- jQuery (carregamento imediato para estabilidade) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Custom JS -->
    <script src="<?php echo asset('assets/js/main.js'); ?>"></script>
    <script src="<?php echo asset('assets/js/navbar-scroll.js'); ?>"></script>
    
    <!-- Google Analytics Events Tracking (carregado após 1 segundo) -->
    <script>
        // Carrega analytics events após 1 segundo para não bloquear
        setTimeout(function() {
            const script = document.createElement('script');
            script.src = '<?php echo asset('assets/js/analytics-events.js'); ?>';
            script.async = true;
            document.head.appendChild(script);
        }, 1000);
    </script>
    
    <!-- Form Masks and Validations Script (carregado apenas em páginas com formulários) -->
    <?php
    // Incluir configuração de páginas se não foi incluída ainda
    if (!function_exists('needsRecaptcha')) {
        require_once __DIR__ . '/recaptcha-pages.php';
    }
    
    if (needsRecaptcha()): ?>
        <script src="<?php echo asset('assets/js/form-masks.js'); ?>"></script>
        <script src="<?php echo asset('assets/js/recaptcha-forms.js'); ?>"></script>
    <?php endif; ?>
    
    <!-- Form Submission System (carregado em todas as páginas com formulários) -->
    <?php if (needsRecaptcha()): ?>
        <script src="<?php echo asset('assets/js/form-submission.js'); ?>"></script>
    <?php endif; ?>
    
    <?php if (isset($additionalJS)): ?>
        <?php foreach ($additionalJS as $js): ?>
            <script src="<?php echo asset($js); ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html> 