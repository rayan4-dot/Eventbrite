<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventbrite Admin - Events Management</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <nav class="bg-gradient-to-r from-orange-500 to-red-500 text-white p-4 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <a href="./dashboard" class="flex items-center space-x-4 group">
                    <div class="bg-white p-2.5 rounded-xl shadow-lg group-hover:shadow-2xl transition-all duration-300">
                        <i class="fas fa-calendar-alt text-2xl text-orange-500"></i>
                    </div>
                    <span class="text-2xl font-bold">Events Management</span>
                </a>
            </div>
            <div class="flex items-center space-x-8">
                <div class="nav-item flex items-center">
                    <i class="fas fa-calendar-check mr-2"></i>
                    <a href="/dashboard" class="hover:text-orange-200">Dashboard</a>
                </div>
                <div class="nav-item flex items-center">
                    <i class="fas fa-plus-circle mr-2"></i>
                    <a href="/events/events" class="hover:text-orange-200">All Events</a>
                </div>
                <div class="nav-item flex items-center">
                    <i class="fas fa-chart-pie mr-2"></i>
                    <a href="/events/analytics" class="hover:text-orange-200">Event Analytics</a>
                </div>
                <div class="flex items-center space-x-4 ml-6 border-l pl-6">
                    <a href="/logout" class="bg-white text-orange-500 hover:bg-orange-100 px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-6 space-y-8">
        <!-- Event Overview Section -->
        <div class="grid grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 flex items-center">
                <div class="bg-green-100 text-green-600 p-4 rounded-full mr-4">
                    <i class="fas fa-calendar-check text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-gray-500 text-sm">Total Events</h3>
                    <p class="text-2xl font-bold text-gray-800">150</p>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 flex items-center">
                <div class="bg-blue-100 text-blue-600 p-4 rounded-full mr-4">
                    <i class="fas fa-users text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-gray-500 text-sm">Total Attendees</h3>
                    <p class="text-2xl font-bold text-gray-800">5,420</p>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 flex items-center">
                <div class="bg-yellow-100 text-yellow-600 p-4 rounded-full mr-4">
                    <i class="fas fa-hourglass-half text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-gray-500 text-sm">Upcoming Events</h3>
                    <p class="text-2xl font-bold text-gray-800">42</p>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 flex items-center">
                <div class="bg-orange-100 text-orange-600 p-4 rounded-full mr-4">
                    <i class="fas fa-pause-circle text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-gray-500 text-sm">Pending Events</h3>
                    <p class="text-2xl font-bold text-gray-800">12</p>
                </div>
            </div>
        </div>

        <!-- Pending Events Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-pause-circle mr-3 text-orange-500"></i>
                    Pending Event Approvals
                </h2>
                <div class="badge badge-warning">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    12 Pending Events
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-gray-700">Event Details</th>
                            <th class="px-6 py-3 text-left text-gray-700">Organizer</th>
                            <th class="px-6 py-3 text-left text-gray-700">Date</th>
                            <th class="px-6 py-3 text-left text-gray-700">Ticket Info</th>
                            <th class="px-6 py-3 text-left text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img src="event-image.jpg" class="h-16 w-16 rounded-lg mr-4 object-cover" alt="Event">
                                    <div>
                                        <div class="font-bold text-gray-800">Music Festival 2024</div>
                                        <div class="text-sm text-gray-500">Entertainment</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img src="organizer-avatar.jpg" class="h-10 w-10 rounded-full mr-3 object-cover" alt="Organizer">
                                    <div>
                                        <div class="text-sm font-medium text-gray-800">Sarah Johnson</div>
                                        <div class="text-xs text-gray-500">Rhythm Productions</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600">
                                    <i class="fas fa-calendar mr-2 text-blue-500"></i>
                                    June 15, 2024
                                </div>
                                <div class="text-xs text-gray-500">
                                    <i class="fas fa-clock mr-2 text-green-500"></i>
                                    7:00 PM - 11:00 PM
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600">
                                    <i class="fas fa-ticket-alt mr-2 text-purple-500"></i>
                                    Capacity: 1000
                                </div>
                                <div class="text-xs text-gray-500">
                                    <i class="fas fa-dollar-sign mr-2 text-green-500"></i>
                                    Price: $50 - $150
                                </div>
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                <button class="btn btn-sm btn-success">
                                    <i class="fas fa-check mr-2"></i>Approve
                                </button>
                                <button class="btn btn-sm btn-error">
                                    <i class="fas fa-times mr-2"></i>Reject
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- All Events Management Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-calendar-alt mr-3 text-orange-500"></i>
                    All Events Management
                </h2>

            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-gray-700">Event Details</th>
                            <th class="px-6 py-3 text-left text-gray-700">Organizer</th>
                            <th class="px-6 py-3 text-left text-gray-700">Date</th>
                            <th class="px-6 py-3 text-left text-gray-700">Tickets</th>
                            <th class="px-6 py-3 text-left text-gray-700">Status</th>
                            <th class="px-6 py-3 text-left text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img src="event-image1.jpg" class="h-16 w-16 rounded-lg mr-4 object-cover" alt="Event">
                                    <div>
                                        <div class="font-bold text-gray-800">Tech Conference 2024</div>
                                        <div class="text-sm text-gray-500">Technology & Innovation</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img src="organizer-avatar1.jpg" class="h-10 w-10 rounded-full mr-3 object-cover" alt="Organizer">
                                    <div>
                                        <div class="text-sm font-medium text-gray-800">Michael Chen</div>
                                        <div class="text-xs text-gray-500">Tech Innovators</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600">
                                    <i class="fas fa-calendar mr-2 text-blue-500"></i>
                                    March 15, 2024
                                </div>
                                <div class="text-xs text-gray-500">
                                    <i class="fas fa-clock mr-2 text-green-500"></i>
                                    9:00 AM - 5:00 PM
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600">
                                    <i class="fas fa-ticket-alt mr-2 text-purple-500"></i>
                                    Total: 500
                                </div>
                                <div class="text-xs text-green-600">
                                    <i class="fas fa-check-circle mr-2"></i>
                                    Sold: 350
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="badge badge-success">Active</span>
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                <button class="btn btn-sm btn-outline btn-info">
                                    <i class="fas fa-ban mr-2"></i>Block
                                </button>
                                <button class="btn btn-sm btn-outline btn-error">
                                    <i class="fa-solid fa-check"></i>Unblock
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img src="event-image2.jpg" class="h-16 w-16 rounded-lg mr-4 object-cover" alt="Event">
                                    <div>
                                        <div class="font-bold text-gray-800">Art Exhibition</div>
                                        <div class="text-sm text-gray-500">Cultural Event</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img src="organizer-avatar2.jpg" class="h-10 w-10 rounded-full mr-3 object-cover" alt="Organizer">
                                    <div>
                                        <div class="text-sm font-medium text-gray-800">Emily Rodriguez</div>
                                        <div class="text-xs text-gray-500">Creative Spaces</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600">
                                    <i class="fas fa-calendar mr-2 text-blue-500"></i>
                                    April 20, 2024
                                </div>
                                <div class="text-xs text-gray-500">
                                    <i class="fas fa-clock mr-2 text-green-500"></i>
                                    2:00 PM - 8:00 PM
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600">
                                    <i class="fas fa-ticket-alt mr-2 text-purple-500"></i>
                                    Total: 200
                                </div>
                                <div class="text-xs text-green-600">
                                    <i class="fas fa-check-circle mr-2"></i>
                                    Sold: 150
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="badge badge-warning">Pending</span>
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                <button class="btn btn-sm btn-outline btn-info">
                                    <i class="fas fa-ban mr-2"></i>Block
                                </button>
                                <button class="btn btn-sm btn-outline btn-error">
                                    <i class="fa-solid fa-check"></i>Unblock
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>