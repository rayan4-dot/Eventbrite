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


document.addEventListener('DOMContentLoaded', (event) => {
    const modal = document.getElementById('sponsorModal');
    const openButton = document.getElementById('openSponsorModal');
    const closeButton = document.getElementById('closeSponsorModal');
    const addSponsorBtn = document.getElementById('addSponsorBtn');
    const eventTypeSelect = document.getElementById('eventType');
    const googleMeetSection = document.getElementById('googleMeetSection');
    const f2fEvent = document.getElementById('f2fEvent');
    const isPaidEventToggle = document.getElementById('isPaidEvent');
    const pricingSection = document.getElementById('pricingSection');
    const existingSponsorsSelect = document.getElementById('existingSponsors');

    let sponsors = [];

    eventTypeSelect.addEventListener('change', (e) => {
        const isRemote = e.target.value === 'online';
        googleMeetSection.classList.toggle('hidden', !isRemote);
        f2fEvent.classList.toggle('hidden', isRemote);
    });

    isPaidEventToggle.addEventListener('change', (e) => {
        pricingSection.classList.toggle('hidden', !e.target.checked);
    });

    openButton.addEventListener('click', () => modal.showModal());
    closeButton.addEventListener('click', () => modal.close());

    addSponsorBtn.addEventListener('click', () => {
        const sponsorName = document.getElementById('sponsorName').value;
        const sponsorLogo = document.getElementById('sponsorLogo').files[0];

        if (sponsorName) {
            sponsors.push({
                name: sponsorName,
                logo: sponsorLogo ? URL.createObjectURL(sponsorLogo) : null
            });

            updateSponsorsDropdown();

            document.getElementById('sponsorName').value = '';
            document.getElementById('sponsorLogo').value = '';

            modal.close();
        }
    });

    function updateSponsorsDropdown() {
        existingSponsorsSelect.innerHTML = '<option disabled selected>Select Existing Sponsors</option>';
        sponsors.forEach((sponsor, index) => {
            const option = document.createElement('option');
            option.value = index;
            option.textContent = sponsor.name;
            existingSponsorsSelect.appendChild(option);
        });
    }
});