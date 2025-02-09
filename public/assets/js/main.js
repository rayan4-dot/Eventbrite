document.addEventListener('DOMContentLoaded', function () {
    // Hero Section Carousel
    const heroImages = document.querySelectorAll('.hero-image');
    const heroPaginationDots = document.querySelectorAll('.hero-pagination-dot');
    const heroPrevBtn = document.querySelector('.hero-prev-btn');
    const heroNextBtn = document.querySelector('.hero-next-btn');
    let heroCurrentIndex = 0;

    function updateHeroCarousel() {
        heroImages.forEach((image, index) => {
            if (index === heroCurrentIndex) {
                image.classList.add('active');
            } else {
                image.classList.remove('active');
            }
        });

        heroPaginationDots.forEach((dot, index) => {
            if (index === heroCurrentIndex) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }

    heroPrevBtn.addEventListener('click', function () {
        heroCurrentIndex = (heroCurrentIndex - 1 + heroImages.length) % heroImages.length;
        updateHeroCarousel();
    });

    heroNextBtn.addEventListener('click', function () {
        heroCurrentIndex = (heroCurrentIndex + 1) % heroImages.length;
        updateHeroCarousel();
    });

    heroPaginationDots.forEach((dot, index) => {
        dot.addEventListener('click', function () {
            heroCurrentIndex = index;
            updateHeroCarousel();
        });
    });

    updateHeroCarousel();

    // Top Cities Carousel
    const cityCards = document.querySelectorAll('.city-card');
    const cityPaginationDots = document.querySelectorAll('.city-pagination-dot');
    const cityPrevBtn = document.querySelector('.city-prev-btn');
    const cityNextBtn = document.querySelector('.city-next-btn');
    let cityCurrentIndex = 0;
    const cardsPerPage = 4;

    function updateCityCarousel() {
        cityCards.forEach((card, index) => {
            if (index >= cityCurrentIndex * cardsPerPage && index < (cityCurrentIndex + 1) * cardsPerPage) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });

        cityPaginationDots.forEach((dot, index) => {
            if (index === cityCurrentIndex) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }

    cityPrevBtn.addEventListener('click', function () {
        cityCurrentIndex = (cityCurrentIndex - 1 + Math.ceil(cityCards.length / cardsPerPage)) % Math.ceil(cityCards.length / cardsPerPage);
        updateCityCarousel();
    });

    cityNextBtn.addEventListener('click', function () {
        cityCurrentIndex = (cityCurrentIndex + 1) % Math.ceil(cityCards.length / cardsPerPage);
        updateCityCarousel();
    });

    cityPaginationDots.forEach((dot, index) => {
        dot.addEventListener('click', function () {
            cityCurrentIndex = index;
            updateCityCarousel();
        });
    });

    updateCityCarousel();
});