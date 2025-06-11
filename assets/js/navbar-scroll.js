// Navbar Scroll Effect
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar');
    const heroSection = document.querySelector('.hero-section');
    
    // Function to handle navbar styles based on scroll
    function handleNavbarScroll() {
        const scrolled = window.pageYOffset;
        const heroHeight = heroSection ? heroSection.offsetHeight : 0;
        
        if (scrolled > 50) {
            navbar.classList.add('scrolled');
            navbar.classList.remove('hero-bg');
        } else {
            navbar.classList.remove('scrolled');
            
            // Add hero background if we're on a page with hero
            if (heroSection) {
                navbar.classList.add('hero-bg');
            }
        }
    }
    
    // Initialize navbar state
    if (heroSection) {
        navbar.classList.add('hero-bg');
    } else {
        navbar.classList.add('scrolled');
    }
    
    // Listen to scroll events
    window.addEventListener('scroll', handleNavbarScroll);
    
    // Handle resize for responsive
    window.addEventListener('resize', function() {
        handleNavbarScroll();
    });
}); 