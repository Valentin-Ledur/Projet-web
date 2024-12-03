// JavaScript pour faire défiler automatiquement les diapositives du carrousel
document.addEventListener('DOMContentLoaded', function() {
    var slides = document.querySelectorAll('.carousel-item');
    var currentSlide = 0;
    
    function nextSlide() {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.add('active');
    }

    setInterval(nextSlide, 5000); // Changer de diapositive toutes les 10 secondes
});