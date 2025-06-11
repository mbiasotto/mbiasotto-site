// Carrossel de Depoimentos
class TestimonialCarousel {
    constructor() {
        this.currentSlide = 0;
        this.totalSlides = 3;
        this.slides = document.getElementById('testimonialSlides');
        this.dots = document.querySelectorAll('.testimonial-dot');
        this.prevBtn = document.getElementById('prevTestimonial');
        this.nextBtn = document.getElementById('nextTestimonial');
        this.autoplayInterval = null;
        
        this.init();
    }
    
    init() {
        if (!this.slides) return;
        
        // Event listeners
        this.prevBtn?.addEventListener('click', () => this.prevSlide());
        this.nextBtn?.addEventListener('click', () => this.nextSlide());
        
        // Dots navigation
        this.dots.forEach((dot, index) => {
            dot.addEventListener('click', () => this.goToSlide(index));
        });
        
        // Auto-play
        this.startAutoplay();
        
        // Pause on hover
        this.slides.addEventListener('mouseenter', () => this.stopAutoplay());
        this.slides.addEventListener('mouseleave', () => this.startAutoplay());
    }
    
    updateSlide() {
        const translateX = -this.currentSlide * 100;
        this.slides.style.transform = `translateX(${translateX}%)`;
        
        // Update dots
        this.dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === this.currentSlide);
        });
    }
    
    nextSlide() {
        this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
        this.updateSlide();
    }
    
    prevSlide() {
        this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
        this.updateSlide();
    }
    
    goToSlide(index) {
        this.currentSlide = index;
        this.updateSlide();
    }
    
    startAutoplay() {
        this.stopAutoplay();
        this.autoplayInterval = setInterval(() => {
            this.nextSlide();
        }, 5000);
    }
    
    stopAutoplay() {
        if (this.autoplayInterval) {
            clearInterval(this.autoplayInterval);
            this.autoplayInterval = null;
        }
    }
}

// Initialize carousel when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new TestimonialCarousel();
}); 