<?php
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in | Eventbrite</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../../../public/assets/css/style.css">

</head>
<body class="min-h-screen">
    <div class="bg-image"></div>
    <div class="overlay"></div>

    <!-- Header with Logo -->
    <header class="w-full bg-white/90 backdrop-blur-sm shadow-sm py-4">
        <div class="container mx-auto px-4">
            <img src="../../../public/assets/images/logo.png" alt="Eventbrite" class="h-9"/>
        </div>
    </header>

    <main class="container mx-auto px-4 py-12">
        <div class="max-w-[400px] mx-auto">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-white">Log in</h1>
            </div>

            <div class="bg-white/95 backdrop-blur-sm p-8 rounded-lg shadow-xl">
                <form class="space-y-6">
                    <div>
                        <label class="block text-[#39364f] text-[14px] font-semibold mb-2">
                            Email address
                        </label>
                        <input
                            type="email"
                            class="w-full px-4 py-3 border-2 border-[#dbdae3] rounded-lg focus:border-[#3659e3] focus:ring-0 text-[#39364f]"
                            required
                        >
                    </div>

                    <div>
                        <label class="block text-[#39364f] text-[14px] font-semibold mb-2">
                            Password
                        </label>
                        <input
                            type="password"
                            class="w-full px-4 py-3 border-2 border-[#dbdae3] rounded-lg focus:border-[#3659e3] focus:ring-0 text-[#39364f]"
                            required
                        >
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input
                                type="checkbox"
                                id="remember"
                                class="h-4 w-4 text-[#3659e3] border-[#dbdae3] rounded focus:ring-[#3659e3]"
                            >
                            <label class="ml-2 text-sm text-[#39364f]">
                                Keep me signed in
                            </label>
                        </div>
                        <a href="#" class="text-sm text-[#3659e3] hover:text-[#1f35a6] font-semibold">
                            Forgot password?
                        </a>
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-[#d1410c] hover:bg-[#b83a0b] text-white font-bold py-3 px-4 rounded-lg transition duration-200"
                    >
                        Log in
                    </button>
                </form>

                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">Or continue with</span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <button class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                            <img src="../../../public/assets/images/Google_2015_logo.webp" style="width: 76px; margin: 19px;" alt="Google logo" class="mr-2" />
                        </button>
                        <button class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                            <img src="../../../public/assets/images/Facebook-Logo-2019.png" style="width: 76px; margin: 19px;" alt="Facebook logo" class="mr-2" />
                        </button>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-[#39364f]">
                        Don't have an account? 
                        <a href="register.php" class="text-[#3659e3] hover:text-[#1f35a6] font-semibold">Sign up</a>
                    </p>
                </div>
            </div>
        </div>
    </main>

    <footer class="mt-12 py-8">
        <div class="container mx-auto px-4 text-center text-sm text-white">
            <p>
                This site is protected by reCAPTCHA and the Google
                <a href="#" class="text-white hover:text-gray-200 underline">Privacy Policy</a> and
                <a href="#" class="text-white hover:text-gray-200 underline">Terms of Service</a> apply.
            </p>
        </div>
    </footer>
</body>
</html>