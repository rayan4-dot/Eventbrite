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


// Sample event data
const events = [
    {
        category: 'Music',
        date: 'June 15, 2024',
        title: 'Summer Music Festival',
        location: 'Downtown Central Park',
        price: '$75',
        image: 'https://via.placeholder.com/400x250?text=Music+Festival'
    },
    {
        category: 'Technology',
        date: 'July 22, 2024',
        title: 'Tech Innovation Summit',
        location: 'Convention Center',
        price: '$150',
        image: 'https://via.placeholder.com/400x250?text=Tech+Summit'
    },
    {
        category: 'Arts',
        date: 'August 5, 2024',
        title: 'Contemporary Art Exhibition',
        location: 'Modern Art Gallery',
        price: '$40',
        image: 'https://via.placeholder.com/400x250?text=Art+Exhibition'
    },
    {
        category: 'Sports',
        date: 'September 12, 2024',
        title: 'Marathon Running Event',
        location: 'City Stadium',
        price: '$60',
        image: 'https://via.placeholder.com/400x250?text=Marathon+Event'
    },
    {
        category: 'Music',
        date: 'October 20, 2024',
        title: 'Jazz Night',
        location: 'Downtown Jazz Club',
        price: '$45',
        image: 'https://via.placeholder.com/400x250?text=Jazz+Night'
    },
    {
        category: 'Technology',
        date: 'November 8, 2024',
        title: 'AI and Future Tech Conference',
        location: 'Tech Center',
        price: '$200',
        image: 'https://via.placeholder.com/400x250?text=AI+Conference'
    }
];

// Pagination variables
let currentPage = 1;
const eventsPerPage = 3;
const totalPages = Math.ceil(events.length / eventsPerPage);

// Function to render events
// function renderEvents(page) {
//     const eventGrid = document.getElementById('eventGrid');
//     eventGrid.innerHTML = ''; // Clear previous events
//
//     const start = (page - 1) * eventsPerPage;
//     const end = start + eventsPerPage;
//     const pageEvents = events.slice(start, end);
//
//     pageEvents.forEach(event => {
//         const eventCard = `
//                     <div class="event-card bg-gray-800 rounded-xl overflow-hidden border border-gray-700">
//                         <img
//                             src="${event.image}"
//                             alt="Event Image"
//                             class="w-full h-56 object-cover"
//                         >
//                         <div class="p-6">
//                             <div class="flex justify-between items-center mb-2">
//                                 <span class="text-orange-500 font-medium">${event.category}</span>
//                                 <span class="text-gray-400">${event.date}</span>
//                             </div>
//                             <h3 class="text-xl font-bold mb-2">${event.title}</h3>
//                             <p class="text-gray-400 mb-4">${event.location}</p>
//                             <div class="flex justify-between items-center">
//                                 <span class="text-lg font-bold text-orange-500">${event.price}</span>
//                                 <button class="bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
//                                     View Details
//                                 </button>
//                             </div>
//                         </div>
//                     </div>
//                 `;
//         eventGrid.innerHTML += eventCard;
//     });
//
//     // Update pagination buttons
//     document.getElementById('currentPage').textContent = `Page ${page}`;
//     document.getElementById('prevPage').disabled = page === 1;
//     document.getElementById('nextPage').disabled = page === totalPages;
// }

// Event listeners for pagination
// document.getElementById('prevPage').addEventListener('click', () => {
//     if (currentPage > 1) {
//         currentPage--;
//         renderEvents(currentPage);
//     }
// });
//
// document.getElementById('nextPage').addEventListener('click', () => {
//     if (currentPage < totalPages) {
//         currentPage++;
//         renderEvents(currentPage);
//     }
// });

// Initial render
// renderEvents(currentPage);
