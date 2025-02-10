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
        body {
            background: linear-gradient(90deg, rgba(247, 135, 6, 0.8) 0%, rgba(222, 110, 5, 0.4) 100%), 
                        theme('colors.orange.600');
        }
    </style>
</head>
<body class="min-h-screen p-8 bg-base-100">
    <div class="max-w-6xl mx-auto bg-white/90 rounded-xl shadow-2xl p-8">
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Event Image -->
            <div>
                <img src="https://via.placeholder.com/600x400" alt="Event Image" class="w-full h-96 object-cover rounded-xl">
                
                <!-- Sponsors Section -->
                <div class="mt-6">
                    <h3 class="text-xl font-semibold mb-4 text-orange-600">Event Sponsors</h3>
                    <div class="flex flex-wrap gap-4">
                        <div class="avatar">
                            <div class="w-16 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                <img src="https://via.placeholder.com/150" alt="Sponsor 1" />
                            </div>
                        </div>
                        <div class="avatar">
                            <div class="w-16 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                <img src="https://via.placeholder.com/150" alt="Sponsor 2" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Detail -->
            <div>
                <h1 class="text-4xl font-bold mb-4 text-orange-600">Tech Innovation Summit 2024</h1>
                
                <!-- Event Meta Information -->
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <i class="fas fa-calendar text-orange-600"></i>
                        <span class="text-lg">March 15, 2024 | 9:00 AM - 5:00 PM</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <i class="fas fa-map-marker-alt text-orange-600"></i>
                        <span class="text-lg">San Francisco Convention Center</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <i class="fas fa-users text-orange-600"></i>
                        <span class="text-lg">150 Seats Available</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <i class="fas fa-globe text-orange-600"></i>
                        <span class="text-lg">Event Type: Face to Face</span>
                    </div>
                </div>

                <!-- Event Description -->
                <div class="mt-6">
                    <h3 class="text-xl font-semibold mb-2 text-orange-600">Event Description</h3>
                    <p class="text-gray-700">
                        Join us for the most anticipated Tech Innovation Summit of 2024! 
                        Discover cutting-edge technologies, network with industry leaders, 
                        and explore the future of innovation. This full-day event brings 
                        together thought leaders, entrepreneurs, and tech enthusiasts.
                    </p>
                </div>

                <!-- Ticket Pricing -->
                <div class="mt-6 flex items-center justify-between">
                    <div>
                        <span class="text-2xl font-bold text-orange-600">$99.99</span>
                        <span class="text-gray-500 ml-2">per ticket</span>
                    </div>
                    <button class="btn btn-primary">
                        <i class="fas fa-ticket-alt mr-2"></i>
                        Get Ticket
                    </button>
                </div>

                <!-- Additional Event Links -->
                <div class="mt-6 flex gap-4">
                    <button class="btn btn-outline btn-primary">
                        <i class="fas fa-share-alt mr-2"></i>
                        Share Event
                    </button>
                    <button class="btn btn-ghost">
                        <i class="fas fa-heart mr-2"></i>
                        Save Event
                    </button>
                </div>
            </div>
        </div>

        <!-- Event Organizers Section -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-6 text-orange-600">Event Organizer</h2>
            <div class="flex justify-center">
                <div class="card w-96 bg-base-100 shadow-xl">
                    <figure class="px-10 pt-10">
                        <img src="https://via.placeholder.com/250" alt="Organizer" class="rounded-xl" />
                    </figure>
                    <div class="card-body items-center text-center">
                        <h3 class="card-title">Emily Rodriguez</h3>
                        <p>Event Director</p>
                        <div class="card-actions">
                            <a href="#" class="btn btn-ghost btn-sm">
                                <i class="fab fa-linkedin mr-2"></i>Contact
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>