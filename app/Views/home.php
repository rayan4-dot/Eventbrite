
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Eventbrite Clone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .hero-gradient {
            background: linear-gradient(90deg, rgba(17,24,39,0.8) 0%, rgba(17,24,39,0.4) 100%);
        }

        .event-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .event-card:hover {
            transform: translateY(-4px);
        }

        .interest-tag {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .interest-tag:hover {
            transform: translateY(-1px);
        }

        .city-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(180deg, rgba(0,0,0,0) 50%, rgba(0,0,0,0.8) 100%);
            z-index: 1;
        }

        .hero-image {
            display: none;
        }

        .hero-image.active {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
    <!-- Enhanced Navbar -->
    <nav class="bg-gray-900/80 backdrop-blur-md border-b border-gray-800 fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16 items-center">
                <div class="text-orange-600 font-bold text-2xl">eventbrite</div>
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <input type="text" placeholder="Search events" class="px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg pl-10 text-white placeholder-gray-400">
                        <svg class="w-5 h-5 absolute left-3 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <div class="relative">
                        <input type="text" placeholder="Location" class="px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg pl-10 text-white placeholder-gray-400">
                        <svg class="w-5 h-5 absolute left-3 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                    </div>
                    <a href="#" class="text-gray-300 hover:text-white transition-colors">Browse Events</a>
                    <button class="px-4 py-2 bg-orange-600 text-white rounded-md hover:bg-orange-700 transition-colors">Sign In</button>
                    <button class="px-4 py-2 bg-orange-600 text-white rounded-md hover:bg-orange-700 transition-colors">Sign Up</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                <div class="hero-gradient absolute inset-0 z-10"></div>
                <video src="./assets/video/even2.mp4" class="w-full h-[480px] object-cover hero-image active" autoplay muted loop></video>
                <video src="./assets/video/event.mp4" class="w-full h-[480px] object-cover hero-image" autoplay muted loop></video>
                <video src="./assets/video/ucl.mp4" class="w-full h-[480px] object-cover hero-image" autoplay muted loop></video>
                <div class="absolute top-1/2 left-12 transform -translate-y-1/2 z-20 space-y-6">
                    <h1 class="text-5xl font-extrabold leading-tight max-w-2xl">
                        Discover Your Next<br>
                        <span class="bg-gradient-to-r from-orange-600 to-pink-500 bg-clip-text text-transparent">
                            Unforgettable Experience
                        </span>
                    </h1>
                    <button class="bg-orange-600 hover:bg-orange-700 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 transform hover:scale-105">
                        Explore Events →
                    </button>
                </div>
                <!-- Pagination Dots -->
                <div class="flex justify-center mt-6 space-x-2 absolute bottom-4 left-1/2 transform -translate-x-1/2 z-30">
                    <span class="w-2.5 h-2.5 bg-white rounded-full hero-pagination-dot active"></span>
                    <span class="w-2.5 h-2.5 bg-gray-500 hover:bg-gray-400 rounded-full cursor-pointer transition-colors hero-pagination-dot"></span>
                    <span class="w-2.5 h-2.5 bg-gray-500 hover:bg-gray-400 rounded-full cursor-pointer transition-colors hero-pagination-dot"></span>
                </div>
                <!-- Navigation arrows -->
                <button class="absolute left-0 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/20 p-2 rounded-full z-30 hero-prev-btn">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button class="absolute right-0 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/20 p-2 rounded-full z-30 hero-next-btn">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Location Select -->
    <div class="max-w-7xl mx-auto px-4 pt-6">
        <div class="flex items-center space-x-2 mb-4">
            <span class="text-gray-300">Browsing events in</span>
            <?php if (!empty($locations)): ?>
            <select class="bg-gray-800 text-blue-500 border-none rounded-md px-4 py-2 focus:ring-2 focus:ring-orange-600">
                <?php foreach ($locations as $location): ?>
                <option value="<?php echo htmlspecialchars($location['id']); ?>">
                    <?php echo htmlspecialchars($location['name']); ?>
                </option>
                <?php endforeach; ?>
            </select>
            <?php else: ?>
            <p class="text-gray-400">No locations available.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Search Section -->
    <div class="bg-gray-800/30 py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex gap-4 items-center">
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" placeholder="Search events" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg pl-10 text-white placeholder-gray-400">
                        <svg class="w-5 h-5 absolute left-3 top-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" placeholder="Location" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg pl-10 text-white placeholder-gray-400">
                        <svg class="w-5 h-5 absolute left-3 top-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                    </div>
                </div>
                <button class="bg-orange-600 text-white px-8 py-3 rounded-lg hover:bg-orange-700 transition-colors">
                    Find Events
                </button>
            </div>
        </div>
    </div>

    <!-- Categories -->
    <div class="border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex space-x-8 overflow-x-auto py-4">
                <a href="#" class="text-white border-b-2 border-orange-600 pb-4 whitespace-nowrap">All</a>
                <a href="#" class="text-gray-400 hover:text-white whitespace-nowrap">For you</a>
                <a href="#" class="text-gray-400 hover:text-white whitespace-nowrap">Online</a>
                <a href="#" class="text-gray-400 hover:text-white whitespace-nowrap">Today</a>
                <a href="#" class="text-gray-400 hover:text-white whitespace-nowrap">This weekend</a>
                <a href="#" class="text-gray-400 hover:text-white whitespace-nowrap">Free</a>
                <a href="#" class="text-gray-400 hover:text-white whitespace-nowrap">Music</a>
                <a href="#" class="text-gray-400 hover:text-white whitespace-nowrap">Food & Drink</a>
            </div>
        </div>
    </div>

    <!-- Events Grid -->
    <div class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-12">Popular Events</h2>
            <?php if (!empty($events)): ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($events as $event): ?>
                <div class="event-card bg-gray-800 rounded-xl overflow-hidden border border-gray-700">
                    <div class="relative">
                    <!--   <img src="<?php echo htmlspecialchars($event['image_url']); ?>" alt="<?php echo htmlspecialchars($event['title']); ?>" class="w-full h-56 object-cover">--> 
                        <div class="absolute top-4 right-4 bg-gray-900/80 px-3 py-1 rounded-full text-sm">
                       <!--🔥 <?php echo htmlspecialchars($event['going']); ?> Going-->     
                        </div>
                    </div>
                    <div class="p-6 space-y-3">
                        <div class="flex items-center gap-2 text-sm">
                            <span class="text-orange-500 font-medium"><?php echo htmlspecialchars($event['category']); ?></span>
                            <span class="text-gray-500">•</span>
                            <span class="text-gray-400"><?php echo htmlspecialchars($event['date']); ?></span>
                        </div>
                        <h3 class="font-bold text-xl"><?php echo htmlspecialchars($event['title']); ?></h3>
                        <p class="text-gray-400"><?php echo htmlspecialchars($event['location']); ?></p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-lg font-bold text-orange-500"><?php echo htmlspecialchars($event['price']); ?></span>
                            <button class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg transition-colors">
                                Details
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <p class="text-center text-gray-400">No events available.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Interests Section -->
    <section class="py-16 bg-gray-800/20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-14">
                <h2 class="text-3xl font-bold mb-4">Personalize Your Experience</h2>
                <p class="text-gray-400 max-w-xl mx-auto">Select your interests to discover events tailored just for you</p>
            </div>
            <?php if (!empty($categories)): ?>
            <div class="flex flex-wrap justify-center gap-4">
                <?php foreach ($categories as $category): ?>
                <button class="interest-tag px-6 py-3 rounded-full bg-gray-800 text-gray-300 hover:bg-orange-600 hover:text-white font-medium">
                    <?php echo htmlspecialchars($category['icon']); ?> <?php echo htmlspecialchars($category['name']); ?>
                </button>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <p class="text-center text-gray-400">No categories available.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Top Cities -->
    <section class="py-12 bg-gray-800/30">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8">Top Cities</h2>
         <!--   <?php if (!empty($cities)): ?>-->
            <div class="relative">
                <div class="flex space-x-6 overflow-x-auto scrollbar-hide">
               <!--     <?php foreach ($cities as $index => $city): ?>-->
                    <div class="city-card w-1/4 flex-shrink-0">
                        <div class="relative h-64 rounded-lg overflow-hidden">
                        <!--     <img src="<?php echo htmlspecialchars($city['image_url']); ?>" alt="<?php echo htmlspecialchars($city['name']); ?>" class="w-full h-full object-cover">-->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                            <h3 class="absolute bottom-4 left-4 text-2xl font-bold"><!--<?php echo htmlspecialchars($city['name']); ?>--></h3>
                        </div>
                    </div>
                <!--    <?php endforeach; ?>-->
                </div>

                <!-- Navigation arrows -->
                <button class="absolute left-0 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/20 p-2 rounded-full city-prev-btn">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button class="absolute right-0 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/20 p-2 rounded-full city-next-btn">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Pagination Dots -->
            <div class="flex justify-center mt-6 space-x-2 city-pagination-dots">
            <!--    <?php for ($i = 0; $i < ceil(count($cities) / 4); $i++): ?>-->
                <span class="w-2.5 h-2.5 bg-gray-500 hover:bg-gray-400 rounded-full cursor-pointer transition-colors city-pagination-dot <?php echo $i === 0 ? 'active' : ''; ?>"></span>
              <!--  <?php endfor; ?>-->
            </div>
        <!--    <?php else: ?>-->
            <p class="text-center text-gray-400">No top cities available.</p>
        <!--    <?php endif; ?>-->
        </div>
    </section>
    <footer class="bg-gray-800 text-white py-12 mt-16">
    <div class="container mx-auto px-4">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            <!-- Company Info -->
            <div>
                <h3 class="text-xl font-bold mb-4">Eventbrite</h3>
                <p class="text-gray-400 mb-4">Creating unforgettable experiences, one event at a time.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="/events" class="text-gray-400 hover:text-white">Browse Events</a></li>
                    <li><a href="/create" class="text-gray-400 hover:text-white">Create Event</a></li>
                    <li><a href="/pricing" class="text-gray-400 hover:text-white">Pricing</a></li>
                    <li><a href="/resources" class="text-gray-400 hover:text-white">Resources</a></li>
                    <li><a href="/blog" class="text-gray-400 hover:text-white">Blog</a></li>
                    <li><a href="/help" class="text-gray-400 hover:text-white">Help Center</a></li>
                </ul>
            </div>

            <!-- Categories -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Event Categories</h3>
                <ul class="space-y-2">
                    <li><a href="/music" class="text-gray-400 hover:text-white">Music</a></li>
                    <li><a href="/business" class="text-gray-400 hover:text-white">Business</a></li>
                    <li><a href="/food" class="text-gray-400 hover:text-white">Food & Drink</a></li>
                    <li><a href="/arts" class="text-gray-400 hover:text-white">Arts & Culture</a></li>
                    <li><a href="/sports" class="text-gray-400 hover:text-white">Sports & Fitness</a></li>
                    <li><a href="/workshops" class="text-gray-400 hover:text-white">Workshops</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                <ul class="space-y-2 text-gray-400">
                    <li>
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        123 Event Street, San Francisco, CA 94105
                    </li>
                    <li>
                        <i class="fas fa-phone mr-2"></i>
                        +1 (555) 123-4567
                    </li>
                    <li>
                        <i class="fas fa-envelope mr-2"></i>
                        support@eventbrite.com
                    </li>
                </ul>
            </div>
        </div>

        <!-- Newsletter Signup -->
        <div class="border-t border-gray-700 py-8">
            <div class="max-w-xl mx-auto text-center">
                <h3 class="text-lg font-semibold mb-4">Subscribe to Our Newsletter</h3>
                <form class="flex flex-col md:flex-row gap-4">
                    <input 
                        type="email" 
                        placeholder="Enter your email" 
                        class="flex-1 px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                    <button 
                        type="submit" 
                        class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300"
                    >
                        Subscribe
                    </button>
                </form>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-700 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 mb-4 md:mb-0">
                    &copy; <?php echo date('Y'); ?> Eventbrite. All rights reserved.
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-gray-400">
                    <a href="/terms" class="hover:text-white">Terms of Service</a>
                    <a href="/privacy" class="hover:text-white">Privacy Policy</a>
                    <a href="/cookies" class="hover:text-white">Cookie Policy</a>
                    <a href="/accessibility" class="hover:text-white">Accessibility</a>
                </div>
            </div>
        </div>
    </div>
</footer>

    <script src="/public/assets/js/main.js">
 
    </script>
</body>
</html>