<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Processing - Tech Innovation Summit</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }
        
        .theme-transition {
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        body {
            background: linear-gradient(90deg, rgba(17, 24, 39, 0.8) 0%, rgba(17,24,39,0.4) 100%);
            margin: 0;
            padding: 0;
        }
        
        .bg-custom-gradient {
            background: linear-gradient(90deg, rgba(17, 24, 39, 0.8) 0%, rgba(17,24,39,0.4) 100%);
        }
        
        #navy {
            position: relative;
            width: 100%;
        }
        
        .payment-options {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            position: relative; /* Added for absolute positioning of the indicator */
        }
        
        .payment-method {
            width: 48%;
            padding: 16px;
            background-color: rgba(17, 24, 39, 0.8);
            border-radius: 8px;
            text-align: center;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            position: relative; /* Added for indicator positioning */
            transition: background-color 0.3s ease;
            border: none; /* Remove border completely */
        }
        
        .payment-method:hover {
            background-color: rgba(17, 24, 39, 1);
        }
        
        /* New approach: use a separate indicator element instead of borders */
        .payment-method.active {
            background-color: rgba(17, 24, 39, 1);
        }

        /* PayPal indicator styling */
        .payment-method.paypal.active::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #0079C1; /* PayPal blue */
            border-radius: 2px;
        }
        
        /* Stripe indicator styling */
        .payment-method.stripe.active::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #6772E5; /* Stripe purple */
            border-radius: 2px;
        }
        
        .form-control input {
            background: rgba(17, 24, 39, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            transition: border-color 0.3s ease;
            width: 100%;
        }
        
        .form-control input:focus {
            border-color: rgba(255, 255, 255, 0.5);
            border-width: 1px;
            outline: none;
        }
        
        .payment-form {
            min-height: 300px;
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
    <nav id="navy" class="bg-gray-900/80 backdrop-blur-md border-b border-gray-800 fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16 items-center">
                <div class="text-orange-600 font-bold text-2xl">eventbrite</div>
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <input type="text" placeholder="Search events" class="px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg pl-10 text-white placeholder-gray-400">
                    </div>
                    <span class="text-gray-300">Welcome, UserName</span>
                </div>
            </div>
        </div>
    </nav>

    <div style="margin: 24px;" class="flex flex-col items-center justify-center text-center space-y-6">
        <h1 class="text-4xl md:text-5xl font-bold text-white">
            Ready to Book Your Event?
        </h1>
        <p class="text-xl text-gray-300 max-w-2xl">
            You're just a few steps away from securing your spot at the Tech Innovation Summit 2024
        </p>
    </div>

    <div class="container mx-auto px-4 py-8 mt-16">
        <div class="text-sm breadcrumbs mb-6 text-white">
            <ul>
                <li><a class="text-white/70 hover:text-white">Home</a></li>
                <li><a class="text-white/70 hover:text-white">Events</a></li>
                <li class="text-white/70 hover:text-white">Tech Innovation Summit</li>
                <li class="text-orange-600">Payment</li>
            </ul>
        </div>

        <div class="grid md:grid-cols-3 gap-8 bg-base-100/10 backdrop-blur-md rounded-2xl shadow-2xl p-8">
            <div class="md:col-span-1 bg-orange-600/20 text-white p-8 rounded-2xl flex flex-col justify-between">
                <div>
                    <h2 class="text-3xl font-bold mb-6">Tech Innovation Summit 2024</h2>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <i class="fas fa-calendar text-2xl"></i>
                            <span class="text-lg">March 15, 2024</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <i class="fas fa-map-marker-alt text-2xl"></i>
                            <span class="text-lg">San Francisco Convention Center</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <i class="fas fa-ticket-alt text-2xl"></i>
                            <span class="text-lg">1x Standard Ticket</span>
                        </div>
                    </div>
                    <div class="mt-8 bg-white/10 p-4 rounded-lg">
                        <h4 class="text-xl font-semibold mb-4">Order Summary</h4>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span>Ticket Price</span>
                                <span>$99.99</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:col-span-2 space-y-8">
                <!-- Payment Method Section -->
                <div>
                    <h3 class="text-2xl font-bold mb-6 text-orange-600">Choose Your Payment Method</h3>
                    <div class="payment-options">
                        <!-- PayPal Option with appropriate class for active state -->
                        <div id="paypal-option" class="payment-method paypal active" onclick="showPaymentMethod('paypal')">
                            <i class="fab fa-paypal text-5xl text-blue-500 mb-3"></i>
                            <span class="block text-xl text-white mb-2">PayPal</span>
                            <p class="text-gray-300 text-sm">Fast, secure checkout with your PayPal account</p>
                        </div>

                        <!-- Stripe Option with appropriate class for active state -->
                        <div id="stripe-option" class="payment-method stripe" onclick="showPaymentMethod('stripe')">
                            <i class="fab fa-cc-stripe text-5xl text-purple-500 mb-3"></i>
                            <span class="block text-xl text-white mb-2">Stripe</span>
                            <p class="text-gray-300 text-sm">Pay securely with your credit card via Stripe</p>
                        </div>
                    </div>

                    <!-- PayPal Form (visible by default) -->
                    <div id="paypal-form" class="payment-form mt-8">
                        <form class="space-y-4" action="/process-payment" method="POST">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text text-white">Cardholder Name</span>
                                </label>
                                <input type="text" placeholder="John Doe" class="input input-bordered bg-base-100/10 backdrop-blur-md text-white border-white/20" required />
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text text-white">Card Number</span>
                                </label>
                                <input type="text" placeholder="1234 5678 9012 3456" class="input input-bordered bg-base-100/10 backdrop-blur-md text-white border-white/20" required />
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text text-white">Expiration Date</span>
                                    </label>
                                    <input type="text" placeholder="MM/YY" class="input input-bordered bg-base-100/10 backdrop-blur-md text-white border-white/20" required />
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text text-white">CVV</span>
                                    </label>
                                    <input type="text" placeholder="123" class="input input-bordered bg-base-100/10 backdrop-blur-md text-white border-white/20" required />
                                </div>
                            </div>

                            <div class="form-control mt-6">
                                <button type="submit" class="btn btn-primary bg-orange-600 hover:bg-orange-700 border-none">
                                    Complete Payment
                                    <i class="fas fa-lock ml-2"></i>
                                </button>
                            </div>
                        </form> 
                    </div>

                    <!-- Stripe Form (hidden by default) -->
                    <div id="stripe-form" class="payment-form mt-8" style="display: none;">
                        <form class="space-y-4" action="/process-payment" method="POST">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text text-white">Cardholder Name</span>
                                </label>
                                <input type="text" placeholder="John Doe" class="input input-bordered bg-base-100/10 backdrop-blur-md text-white border-white/20" required />
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text text-white">Card Number</span>
                                </label>
                                <input type="text" placeholder="1234 5678 9012 3456" class="input input-bordered bg-base-100/10 backdrop-blur-md text-white border-white/20" required />
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text text-white">Expiration Date</span>
                                    </label>
                                    <input type="text" placeholder="MM/YY" class="input input-bordered bg-base-100/10 backdrop-blur-md text-white border-white/20" required />
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text text-white">CVV</span>
                                    </label>
                                    <input type="text" placeholder="123" class="input input-bordered bg-base-100/10 backdrop-blur-md text-white border-white/20" required />
                                </div>
                            </div>

                            <div class="form-control mt-6">
                                <button type="submit" class="btn btn-primary bg-orange-600 hover:bg-orange-700 border-none">
                                    Complete Payment
                                    <i class="fas fa-lock ml-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="bg-gray-800 text-white py-12 mt-16">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">Eventbrite</h3>
                        <p class="text-gray-400 mb-4">Creating unforgettable experiences, one event at a time.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                        <ul>
                            <li><a href="#" class="text-gray-400">Home</a></li>
                            <li><a href="#" class="text-gray-400">About</a></li>
                            <li><a href="#" class="text-gray-400">Contact</a></li>
                            <li><a href="#" class="text-gray-400">Privacy</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Social</h3>
                        <ul>
                            <li><a href="#" class="text-gray-400">Facebook</a></li>
                            <li><a href="#" class="text-gray-400">Twitter</a></li>
                            <li><a href="#" class="text-gray-400">LinkedIn</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Support</h3>
                        <ul>
                            <li><a href="#" class="text-gray-400">FAQs</a></li>
                            <li><a href="#" class="text-gray-400">Contact Support</a></li>
                            <li><a href="#" class="text-gray-400">Refunds</a></li>
                        </ul>
                    </div>
                </div>
                <p class="text-center text-gray-400">&copy; 2024 Eventbrite, All rights reserved.</p>
            </div>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <script>
        // Modified function to toggle active state on payment methods
        function showPaymentMethod(method) {
            const paypalOption = document.getElementById('paypal-option');
            const stripeOption = document.getElementById('stripe-option');
            const paypalForm = document.getElementById('paypal-form');
            const stripeForm = document.getElementById('stripe-form');
            
            if (method === 'paypal') {
                // Update active states for visuals
                paypalOption.classList.add('active');
                stripeOption.classList.remove('active');
                
                // Show/hide appropriate forms
                paypalForm.style.display = 'block';
                stripeForm.style.display = 'none';
            } else if (method === 'stripe') {
                // Update active states for visuals
                paypalOption.classList.remove('active');
                stripeOption.classList.add('active');
                
                // Show/hide appropriate forms
                paypalForm.style.display = 'none';
                stripeForm.style.display = 'block';
            }
        }
        
        // Initialize PayPal as active by default
        document.addEventListener('DOMContentLoaded', function() {
            // PayPal is already marked active in the HTML
            // This ensures it's properly initialized if needed
        });
    </script>
</body>
</html>