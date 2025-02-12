<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventbrite - Discover Events</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .event-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .event-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
    <!-- Navbar -->
    <nav class="bg-gray-800 p-4 fixed w-full top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-orange-600 text-2xl font-bold">Eventbrite</div>
            <div class="flex space-x-4">
                <div class="relative">
                    <input 
                        type="text" 
                        placeholder="Search events" 
                        class="bg-gray-700 text-white px-4 py-2 rounded-lg pl-10 w-64"
                    >
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
                <button class="bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700">
                    Find Events
                </button>
            </div>
        </div>
    </nav>

    <!-- Filters -->
    <div class="container mx-auto mt-24 px-4">
        <div class="bg-gray-800 p-6 rounded-lg">
            <div class="flex space-x-4 justify-between items-center">
                <!-- Category Filter -->
                <div class="relative w-full">
                    <select class="w-full bg-gray-700 text-white px-4 py-2 rounded-lg">
                        <option>All Categories</option>
                        <option>Music</option>
                        <option>Sports</option>
                        <option>Technology</option>
                        <option>Arts</option>
                    </select>
                </div>

                <!-- Price Filter -->
                <div class="relative w-full">
                    <select class="w-full bg-gray-700 text-white px-4 py-2 rounded-lg">
                        <option>Price Range</option>
                        <option>Free</option>
                        <option>$0 - $50</option>
                        <option>$50 - $100</option>
                        <option>$100+</option>
                    </select>
                </div>

                <!-- Date Filter -->
                <div class="relative w-full">
                    <select class="w-full bg-gray-700 text-white px-4 py-2 rounded-lg">
                        <option>Date</option>
                        <option>This Week</option>
                        <option>Next Week</option>
                        <option>This Month</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Events Grid -->
    <div id="eventsContainer" class="container mx-auto px-4 mt-8">
        <div id="eventGrid" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Event cards will be dynamically populated here -->
        </div>
    </div>

    <!-- Pagination -->
    <div class="container mx-auto px-4 mt-8 flex justify-center">
        <div id="pagination" class="join">
            <button id="prevPage" class="join-item btn">«</button>
            <button id="currentPage" class="join-item btn">Page 1</button>
            <button id="nextPage" class="join-item btn">»</button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12 py-12">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">Eventbrite</h3>
                <p class="text-gray-400">Discover and explore exciting events near you.</p>
            </div>
            <div>
                <h4 class="font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white">Browse Events</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Create Event</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Categories</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-4">Connect</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white">Facebook</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Twitter</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Instagram</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-4">Newsletter</h4>
                <div class="flex">
                    <input 
                        type="email" 
                        placeholder="Your email" 
                        class="bg-gray-700 text-white px-4 py-2 rounded-l-lg w-full"
                    >
                    <button class="bg-orange-600 text-white px-4 py-2 rounded-r-lg">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
    </footer>

    <script>
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
        function renderEvents(page) {
            const eventGrid = document.getElementById('eventGrid');
            eventGrid.innerHTML = ''; // Clear previous events

            const start = (page - 1) * eventsPerPage;
            const end = start + eventsPerPage;
            const pageEvents = events.slice(start, end);

            pageEvents.forEach(event => {
                const eventCard = `
                    <div class="event-card bg-gray-800 rounded-xl overflow-hidden border border-gray-700">
                        <img 
                            src="${event.image}" 
                            alt="Event Image" 
                            class="w-full h-56 object-cover"
                        >
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-orange-500 font-medium">${event.category}</span>
                                <span class="text-gray-400">${event.date}</span>
                            </div>
                            <h3 class="text-xl font-bold mb-2">${event.title}</h3>
                            <p class="text-gray-400 mb-4">${event.location}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-orange-500">${event.price}</span>
                                <button class="bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                eventGrid.innerHTML += eventCard;
            });

            // Update pagination buttons
            document.getElementById('currentPage').textContent = `Page ${page}`;
            document.getElementById('prevPage').disabled = page === 1;
            document.getElementById('nextPage').disabled = page === totalPages;
        }

        // Event listeners for pagination
        document.getElementById('prevPage').addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                renderEvents(currentPage);
            }
        });

        document.getElementById('nextPage').addEventListener('click', () => {
            if (currentPage < totalPages) {
                currentPage++;
                renderEvents(currentPage);
            }
        });

        // Initial render
        renderEvents(currentPage);
    </script>
</body>
</html>