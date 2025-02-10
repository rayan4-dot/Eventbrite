<?php
?>


<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - EventHub</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chart.js/3.7.0/chart.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    backgroundImage: {
                        'gradient-dark': 'linear-gradient(90deg, rgba(17,24,39,0.8) 0%, rgba(17,24,39,0.4) 100%)',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-900 text-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-dark border-r border-gray-800">
            <div class="p-6 border-b border-gray-800">
                <div class="flex items-center space-x-3">
                    <svg class="h-8 w-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <h1 class="text-2xl font-bold text-white">EventHub</h1>
                </div>
            </div>
            <nav class="py-4">
                <a href="#" class="flex items-center px-6 py-3 bg-orange-600/10 text-orange-500 border-r-4 border-orange-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-400 hover:bg-gray-800 hover:text-orange-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Users
                    <span class="ml-auto bg-orange-600 text-white text-xs px-2 py-1 rounded-full">New</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-400 hover:bg-gray-800 hover:text-orange-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Events
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-400 hover:bg-gray-800 hover:text-orange-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Analytics
                </a>
            </nav>
        </aside>

        <main class="flex-1 overflow-y-auto bg-gray-900">
            <!-- Header -->
            <header class="sticky top-0 z-10 bg-gradient-dark border-b border-gray-800">
                <div class="px-6 py-4">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <h1 class="text-2xl font-bold text-white">Dashboard Overview</h1>
                            <span class="px-3 py-1 bg-orange-600/10 text-orange-500 rounded-full text-sm">All Systems Active</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button class="p-2 hover:bg-gray-800 rounded-full relative">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                <span class="absolute top-0 right-0 h-4 w-4 bg-orange-600 rounded-full text-xs text-white flex items-center justify-center">3</span>
                            </button>
                            <div class="flex items-center space-x-2">
                                <img src="https://www.tailwindai.dev/placeholder/32/32" alt="Admin" class="h-8 w-8 rounded-full ring-2 ring-orange-600">
                                <div>
                                    <span class="text-sm font-medium text-white">Admin User</span>
                                    <p class="text-xs text-gray-400">Super Admin</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="p-6 space-y-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-700 hover:border-orange-600 transition-all">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-gray-400 text-sm font-medium">Total Users</h3>
                                <p class="text-3xl font-bold text-white mt-2">12,345</p>
                            </div>
                            <div class="p-2 bg-orange-600/10 rounded-lg">
                                <svg class="h-6 w-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center">
                            <span class="text-green-500 text-sm flex items-center">
                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                                +12% from last month
                            </span>
                        </div>
                    </div>

                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-700 hover:border-orange-600 transition-all">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-gray-400 text-sm font-medium">Active Events</h3>
                                <p class="text-3xl font-bold text-white mt-2">1,234</p>
                            </div>
                            <div class="p-2 bg-orange-600/10 rounded-lg">
                                <svg class="h-6 w-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center">
                            <span class="text-green-500 text-sm flex items-center">
                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                                +5% from last month
                            </span>
                        </div>
                    </div>

                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-700 hover:border-orange-600 transition-all">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-gray-400 text-sm font-medium">Total Categories</h3>
                                <p class="text-3xl font-bold text-white mt-2">45</p>
                            </div>
                            <div class="p-2 bg-orange-600/10 rounded-lg">
                                <svg class="h-6 w-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center">
                            <span class="text-green-500 text-sm flex items-center">
                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                                +8% from last month
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Content Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Recent Events -->
                    <div class="bg-gray-800 rounded-lg shadow-lg p-6 border border-gray-700">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-lg font-bold text-white">Recent Events</h2>
                            <button class="text-sm text-orange-500 hover:text-orange-600">View All</button>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-900 rounded-lg hover:bg-gray-700 transition-colors">
                                <div class="flex items-center space-x-4">
                                    <div class="p-2 bg-orange-600/10 rounded-lg">
                                        <svg class="h-6 w-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-white">Tech Conference 2025</h3>
                                        <div class="flex items-center space-x-2 mt-1">
                                            <span class="text-sm text-gray-400">Submitted by: John Doe</span>
                                            <span class="text-sm text-gray-500">•</span>
                                            <span class="text-sm text-gray-400">2 hours ago</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-900 rounded-lg hover:bg-gray-700 transition-colors">
                                <div class="flex items-center space-x-4">
                                    <div class="p-2 bg-orange-600/10 rounded-lg">
                                        <svg class="h-6 w-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-white">Digital Art Exhibition</h3>
                                        <div class="flex items-center space-x-2 mt-1">
                                            <span class="text-sm text-gray-400">Submitted by: Sarah Chen</span>
                                            <span class="text-sm text-gray-500">•</span>
                                            <span class="text-sm text-gray-400">5 hours ago</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart Section -->
                    <div class="bg-gray-800 rounded-lg shadow-lg p-6 border border-gray-700">
                        <h2 class="text-lg font-bold text-white mb-4">Event Participation</h2>
                        <canvas id="participationChart"></canvas>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>