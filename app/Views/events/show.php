<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details - Tailwind AI</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Light mode styles */
        html[data-theme='light'] body {
            background: linear-gradient(90deg, rgba(247, 135, 6, 0.8) 0%, rgba(222, 110, 5, 0.4) 100%),
                        theme('colors.orange.600');
            color: #333;
        }

        /* Dark mode styles */
        html[data-theme='dark'] body {
            background: linear-gradient(90deg, rgba(194, 65, 12, 0.8) 0%, rgba(154, 52, 18, 0.4) 100%),
                        theme('colors.orange.900');
            color: #e5e5e5;
        }

        /* Theme transition */
        .theme-transition {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Dark mode text and background colors */
        html[data-theme='dark'] .text-gray-700 {
            color: #a0a0a0;
        }

        html[data-theme='dark'] .bg-base-100 {
            background-color: #1f1f1f;
        }

        html[data-theme='dark'] .bg-base-200 {
            background-color: #2c2c2c;
        }

        html[data-theme='dark'] .text-orange-600 {
            color: #ff8f00;
        }

        html[data-theme='dark'] .btn-primary {
            background-color: #ff8f00;
            border-color: #ff8f00;
        }

        html[data-theme='dark'] .btn-primary:hover {
            background-color: #e67e00;
            border-color: #e67e00;
        }
    </style>
</head>
<body class="min-h-screen p-12 bg-base-100 theme-transition">
    <!-- Theme Toggle Button -->
    <div class="fixed top-4 right-4 z-50">
        <button id="theme-toggle" class="btn btn-circle">
            <i class="fas fa-sun text-xl"></i>
        </button>
    </div>

    <div class="max-w-7xl mx-auto bg-base-100/90 rounded-2xl shadow-2xl overflow-hidden theme-transition">
        <!-- Hero Section with Large Image -->
        <div class="relative h-[500px] w-full">
            <img src="https://via.placeholder.com/1600x500" alt="Event Banner" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/40 flex items-end p-8">
                <div class="text-white max-w-4xl mx-auto w-full">
                    <h1 class="text-5xl font-bold mb-4 drop-shadow-lg">Tech Innovation Summit 2024</h1>
                    <div class="flex items-center space-x-6 text-lg">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-calendar"></i>
                            <span>March 15, 2024</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>San Francisco Convention Center</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid md:grid-cols-3 gap-12 p-12 theme-transition">
            <!-- Left Column: Event Details -->
            <div class="md:col-span-2 space-y-8">
                <!-- Event Description -->
                <div>
                    <h2 class="text-3xl font-bold mb-4 text-orange-600 dark:text-orange-400">About This Event</h2>
                    <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed theme-transition">
                        Join us for the most anticipated Tech Innovation Summit of 2024!
                        Discover cutting-edge technologies, network with industry leaders,
                        and explore the future of innovation. This full-day event brings
                        together thought leaders, entrepreneurs, and tech enthusiasts from
                        around the globe to share insights, showcase groundbreaking innovations,
                        and discuss the transformative potential of emerging technologies.
                    </p>
                </div>

                <!-- Event Highlights -->
                <div>
                    <h3 class="text-2xl font-semibold mb-4 text-orange-600 dark:text-orange-400">Event Highlights</h3>
                    <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-orange-600 dark:text-orange-400 mr-3"></i>
                            Keynote speeches from industry leaders
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-orange-600 dark:text-orange-400 mr-3"></i>
                            Interactive technology showcases
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-orange-600 dark:text-orange-400 mr-3"></i>
                            Networking opportunities
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-orange-600 dark:text-orange-400 mr-3"></i>
                            Panel discussions on future tech trends
                        </li>
                    </ul>
                </div>

                <!-- Sponsors Section -->
                <div>
                    <h3 class="text-2xl font-semibold mb-4 text-orange-600 dark:text-orange-400">Event Sponsors</h3>
                    <div class="flex flex-wrap gap-6">
                        <div class="avatar">
                            <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                <img src="https://via.placeholder.com/150" alt="Sponsor 1" />
                            </div>
                        </div>
                        <div class="avatar">
                            <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                <img src="https://via.placeholder.com/150" alt="Sponsor 2" />
                            </div>
                        </div>
                        <div class="avatar">
                            <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                <img src="https://via.placeholder.com/150" alt="Sponsor 3" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Ticket and Organizer -->
            <div class="space-y-8">
                <!-- Ticket Section -->
                <div class="card bg-base-100 shadow-xl p-6 theme-transition">
                    <div class="text-center">
                        <span class="text-3xl font-bold text-orange-600 dark:text-orange-400">$99.99</span>
                        <p class="text-gray-500 dark:text-gray-400">per ticket</p>
                    </div>
                    <div class="divider"></div>
                    <div class="space-y-4">
                        <div class="flex justify-between">
                            <span>Seats Available</span>
                            <span class="font-bold">150</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Event Type</span>
                            <span class="font-bold">Face to Face</span>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block mt-6">
                        <i class="fas fa-ticket-alt mr-2"></i>
                        Get Ticket
                    </button>
                </div>

                <!-- Organizer Section -->
                <div class="card bg-base-100 shadow-xl theme-transition">
                    <figure class="px-10 pt-10">
                        <img src="https://via.placeholder.com/250" alt="Organizer" class="rounded-xl" />
                    </figure>
                    <div class="card-body items-center text-center">
                        <h3 class="card-title text-2xl">Emily Rodriguez</h3>
                        <p class="text-gray-500 dark:text-gray-400">Event Director</p>
                        <div class="card-actions mt-4">
                            <a href="#" class="btn btn-primary">
                                <i class="fab fa-linkedin mr-2"></i>Contact Organizer
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Location Section -->
        <div class="p-12 theme-transition">
            <h3 class="text-3xl font-bold mb-6 text-orange-600 dark:text-orange-400">Event Location</h3>
            <div class="bg-base-200 rounded-2xl overflow-hidden shadow-lg theme-transition">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0716054812777!2d-122.40375792410484!3d37.78356791975438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085807f40fc7cc5%3A0x9c7977167e7366f!2sSan%20Francisco%20Convention%20Center!5e0!3m2!1sen!2sus!4v1697654321000!5m2!1sen!2sus"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
            <div class="mt-6 bg-base-200 p-6 rounded-2xl theme-transition">
                <h4 class="text-2xl font-semibold mb-4 text-orange-600 dark:text-orange-400">Venue Details</h4>
                <div class="flex items-center space-x-4">
                    <i class="fas fa-map-marker-alt text-orange-600 dark:text-orange-400 text-2xl"></i>
                    <div>
                        <p class="text-lg font-medium">San Francisco Convention Center</p>
                        <p class="text-gray-600 dark:text-gray-400">747 Howard St, San Francisco, CA 94103, United States</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer p-12 bg-base-200 text-base-content theme-transition">
            <div class="container mx-auto grid md:grid-cols-4 gap-8">
                <div>
                    <span class="footer-title">Event</span>
                    <a class="link link-hover">About</a>
                    <a class="link link-hover">Speakers</a>
                    <a class="link link-hover">Schedule</a>
                    <a class="link link-hover">Tickets</a>
                </div>
                <div>
                    <span class="footer-title">Company</span>
                    <a class="link link-hover">About us</a>
                    <a class="link link-hover">Contact</a>
                    <a class="link link-hover">Press kit</a>
                </div>
                <div>
                    <span class="footer-title">Legal</span>
                    <a class="link link-hover">Terms of use</a>
                    <a class="link link-hover">Privacy policy</a>
                    <a class="link link-hover">Cookie policy</a>
                </div>
                <div>
                    <span class="footer-title">Social</span>
                    <div class="grid grid-flow-col gap-4">
                        <a href="#" class="text-2xl text-orange-600 dark:text-orange-400 hover:text-orange-700">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-2xl text-orange-600 dark:text-orange-400 hover:text-orange-700">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="text-2xl text-orange-600 dark:text-orange-400 hover:text-orange-700">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-2xl text-orange-600 dark:text-orange-400 hover:text-orange-700">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Theme toggle functionality
        const themeToggleBtn = document.getElementById('theme-toggle');
        const html = document.documentElement;
        const icon = themeToggleBtn.querySelector('i');

        // Check for saved theme preference, default to light
        const savedTheme = localStorage.getItem('theme') || 'light';
        html.setAttribute('data-theme', savedTheme);
        updateIcon(savedTheme);

        // Toggle theme
        themeToggleBtn.addEventListener('click', () => {
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';

            html.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateIcon(newTheme);
        });

        // Update icon based on theme
        function updateIcon(theme) {
            icon.className = theme === 'light'
                ? 'fas fa-moon text-xl'
                : 'fas fa-sun text-xl';
        }
    </script>
</body>
</html>
