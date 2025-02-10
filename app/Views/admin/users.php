<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventbrite Admin - Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    .gradient-bg {
        background: linear-gradient(135deg, #F05537, #F07167);
    }
    
    .logo-spin {
        transition: transform 0.3s ease;
    }
    
    .logo-spin:hover {
        transform: rotate(360deg);
    }
    
    .action-button {
        transition: all 0.2s ease;
    }
    
    .action-button:hover {
        transform: translateY(-2px);
    }
    
    .table-row-animate {
        transition: all 0.2s ease;
    }
    
    .table-row-animate:hover {
        background-color: #F8FAFC;
    }
    
    .nav-item {
        transition: all 0.2s ease;
    }
    
    .nav-item:hover {
        transform: translateY(-2px);
    }
</style>
<body class="bg-gray-50">
    <nav class="gradient-bg text-white p-4 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <a href="./dashboard" class="flex items-center space-x-4 group">
                    <div class="bg-white p-2.5 rounded-xl shadow-lg group-hover:shadow-2xl transition-all duration-300">
                        <i class="fas fa-ticket-alt text-2xl text-orange-500 logo-spin"></i>
                    </div>
                    <span class="text-2xl font-bold">Eventbrite Admin</span>
                </a>
            </div>
            <div class="flex items-center space-x-8">
                <div class="nav-item flex items-center">
                    <i class="fas fa-home mr-2"></i>
                    <a href="/dashboard" class="hover:text-orange-200">Dashboard</a>
                </div>
                <div class="nav-item flex items-center">
                    <i class="fas fa-th-large mr-2"></i>
                    <a href="/categories" class="hover:text-orange-200">Categories</a>
                </div>
                <div class="nav-item flex items-center">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    <a href="/events" class="hover:text-orange-200">Events</a>
                </div>
                <div class="nav-item flex items-center">
                    <i class="fas fa-user-shield mr-2"></i>
                    <a href="/profile" class="hover:text-orange-200">Admin Profile</a>
                </div>
                <div class="flex items-center space-x-4 ml-6 border-l pl-6">
                    <a href="/logout" class="bg-white text-orange-500 hover:bg-orange-100 px-4 py-2 rounded-lg flex items-center action-button">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-6 space-y-8">
        <!-- Event Organizer Verification Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-user-check mr-3 text-orange-500"></i>
                    Event Organizer Verification
                </h2>
                <span class="bg-orange-100 text-orange-800 px-4 py-2 rounded-lg">
                    Pending Requests: 0
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gradient-to-r from-orange-50 to-orange-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-gray-700">Profile</th>
                            <th class="px-6 py-3 text-left text-gray-700">Organizer Details</th>
                            <th class="px-6 py-3 text-left text-gray-700">Status</th>
                            <th class="px-6 py-3 text-left text-gray-700">Request Date</th>
                            <th class="px-6 py-3 text-left text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="table-row-animate">
                            <td class="px-6 py-4">
                                <img src="profile-image.jpg" class="h-20 w-20 rounded-full border-2 border-orange-200 object-cover" alt="Profile">
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-800">John Doe</div>
                                <div class="text-sm text-gray-500">john.doe@example.com</div>
                                <div class="text-xs text-orange-600 mt-1">
                                    <i class="fas fa-building mr-1"></i>
                                    Organization: Example Corp
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full flex items-center w-fit">
                                    <i class="fas fa-clock mr-2"></i>Pending Verification
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full flex items-center w-fit">
                                    <i class="far fa-calendar-alt mr-2"></i>2025-02-01
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 flex items-center action-button">
                                        <i class="fas fa-check mr-2"></i>Approve
                                    </button>
                                    <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 flex items-center action-button">
                                        <i class="fas fa-times mr-2"></i>Disapprove
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- All Users Management Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-users mr-3 text-orange-500"></i>
                    Platform Users Management
                </h2>
                <div class="flex space-x-4">
                    <div class="bg-green-100 text-green-800 px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-user-check mr-2"></i>
                        Active Users: 10
                    </div>
                    <div class="bg-red-100 text-red-800 px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-user-slash mr-2"></i>
                        Blocked Users: 5
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gradient-to-r from-orange-50 to-orange-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-gray-700">Profile</th>
                            <th class="px-6 py-3 text-left text-gray-700">User Info</th>
                            <th class="px-6 py-3 text-left text-gray-700">Join Date</th>
                            <th class="px-6 py-3 text-left text-gray-700">User Type</th>
                            <th class="px-6 py-3 text-left text-gray-700">Status</th>
                            <th class="px-6 py-3 text-left text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="table-row-animate">
                            <td class="px-6 py-4">
                                <img src="profile-image.jpg" class="h-16 w-16 rounded-full border-2 border-orange-200 object-cover" alt="Profile">
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-800">Jane Doe</div>
                                <div class="text-sm text-gray-500">jane.doe@example.com</div>
                                <div class="text-xs text-gray-400 mt-1">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    Location: City, Country
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full flex items-center w-fit">
                                    <i class="far fa-calendar-alt mr-2"></i>2025-01-15
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full flex items-center w-fit">
                                    <i class="fas fa-user-tie mr-2"></i>Organizer
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full flex items-center w-fit">
                                    <i class="fas fa-check-circle mr-2"></i>Active
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 flex items-center action-button">
                                        <i class="fas fa-ban mr-2"></i>Block User
                                    </button>
                                    <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 flex items-center action-button">
                                        <i class="fas fa-user-check mr-2"></i>Unblock User
                                    </button>
                                </div>  
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
