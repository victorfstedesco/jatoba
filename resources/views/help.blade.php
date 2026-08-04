<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JATOBÁ - Help Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@100;200;300;400;500;600;700;800;900&family=Halant:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/iconoir@6.11.0/css/iconoir.min.css">
    <style>
        .font-geist {
            font-family: 'Geist', sans-serif;
        }
        .font-halant {
            font-family: 'Halant', serif;
        }
        .help-card {
            transition: all 0.3s ease;
        }
        .faq-item {
            border-bottom: 1px solid #f5f5f5;
        }
        .faq-item:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body class="font-geist text-[#262626] bg-white min-h-screen">
    <header class="px-6 py-4 flex justify-between items-center">
        <a href="/shop" class="cursor-pointer"><img class="logo" src="/assets/facullogo.svg" alt=""></a>
        <nav class="flex items-center space-x-4 md:space-x-8">
            @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-[#A1A1A1] hover:text-[#262626]">account</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-[#A1A1A1] hover:text-[#262626]">log in</a>
            @endauth
            @endif
            <a href="{{ url('/help') }}" class="text-xs md:text-sm text-[#A1A1A1] hover:text-[#262626]">help</a>
            <a href="{{ url('/about') }}" class="text-xs md:text-sm text-[#A1A1A1] hover:text-[#262626]">about</a>
            <a href="{{ url('/cart') }}" class="text-xs md:text-sm text-[#A1A1A1] hover:text-[#262626]">cart</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="px-6 py-2">
        <!-- Page Header -->

        <div class="mb-8 md:mb-12">
            <h1 class="text-2xl md:text-3xl font-light text-[#262626] mb-2">Help Center</h1>
            <p class="text-[#A1A1A1] text-sm">Everything you need to know to get started</p>
        </div>

        <!-- FAQ Sections -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12">
            <!-- Getting Started -->
            <div id="getting-started" class="space-y-6">
                <h2 class="text-lg font-medium text-[#262626] mb-6 uppercase tracking-wide">Getting Started</h2>

                <div class="bg-[#FBFBFB] p-6">
                    <div class="space-y-4">
                        <div class="faq-item pb-4" x-data="{ open: false }">
                            <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                                <h4 class="text-sm font-medium text-[#262626] uppercase tracking-wide">How do I create an account?</h4>
                                <i class="iconoir-nav-arrow-down text-[#A1A1A1] transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                            </div>
                            <div x-show="open" x-transition class="mt-3">
                                <p class="text-xs text-[#A1A1A1]">Click on "account" in the top navigation, then select "Sign Up". Fill in your details including name, email, and password. You'll receive a confirmation email to activate your account.</p>
                            </div>
                        </div>

                        <div class="faq-item pb-4" x-data="{ open: false }">
                            <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                                <h4 class="text-sm font-medium text-[#262626] uppercase tracking-wide">What is JATOBÁ?</h4>
                                <i class="iconoir-nav-arrow-down text-[#A1A1A1] transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                            </div>
                            <div x-show="open" x-transition class="mt-3">
                                <p class="text-xs text-[#A1A1A1]">JATOBÁ is a premium e-commerce platform offering curated products with a focus on quality and sustainability. We provide a seamless shopping experience with carefully selected items.</p>
                            </div>
                        </div>

                        <div class="faq-item pb-4" x-data="{ open: false }">
                            <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                                <h4 class="text-sm font-medium text-[#262626] uppercase tracking-wide">How to navigate the website?</h4>
                                <i class="iconoir-nav-arrow-down text-[#A1A1A1] transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                            </div>
                            <div x-show="open" x-transition class="mt-3">
                                <p class="text-xs text-[#A1A1A1]">Use the main navigation to browse products, access your account, and view your cart. The search function helps you find specific items quickly. Your dashboard provides access to order history and account settings.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders & Payment -->
            <div id="orders" class="space-y-6">
                <h2 class="text-lg font-medium text-[#262626] mb-6 uppercase tracking-wide">Orders & Payment</h2>

                <div class="bg-[#FBFBFB] p-6">
                    <div class="space-y-4">
                        <div class="faq-item pb-4" x-data="{ open: false }">
                            <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                                <h4 class="text-sm font-medium text-[#262626] uppercase tracking-wide">How do I place an order?</h4>
                                <i class="iconoir-nav-arrow-down text-[#A1A1A1] transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                            </div>
                            <div x-show="open" x-transition class="mt-3">
                                <p class="text-xs text-[#A1A1A1]">Browse products, add items to your cart, review your cart contents, provide shipping information, select payment method, and confirm your order. You'll receive an order confirmation email.</p>
                            </div>
                        </div>

                        <div class="faq-item pb-4" x-data="{ open: false }">
                            <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                                <h4 class="text-sm font-medium text-[#262626] uppercase tracking-wide">What payment methods do you accept?</h4>
                                <i class="iconoir-nav-arrow-down text-[#A1A1A1] transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                            </div>
                            <div x-show="open" x-transition class="mt-3">
                                <p class="text-xs text-[#A1A1A1]">We accept major credit cards (Visa, MasterCard, American Express), PayPal, and bank transfers. All payments are processed securely through encrypted connections.</p>
                            </div>
                        </div>

                        <div class="faq-item pb-4" x-data="{ open: false }">
                            <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                                <h4 class="text-sm font-medium text-[#262626] uppercase tracking-wide">How can I track my order?</h4>
                                <i class="iconoir-nav-arrow-down text-[#A1A1A1] transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                            </div>
                            <div x-show="open" x-transition class="mt-3">
                                <p class="text-xs text-[#A1A1A1]">Once your order ships, you'll receive a tracking number via email. You can also view order status and tracking information in your account dashboard under "Order History".</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Account Management Section -->
        <div id="account" class="mt-12">
            <h2 class="text-lg font-medium text-[#262626] mb-6 uppercase tracking-wide">Account Management</h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-[#FBFBFB] p-6">
                    <div class="space-y-4">
                        <div class="faq-item pb-4" x-data="{ open: false }">
                            <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                                <h4 class="text-sm font-medium text-[#262626] uppercase tracking-wide">How do I update my profile?</h4>
                                <i class="iconoir-nav-arrow-down text-[#A1A1A1] transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                            </div>
                            <div x-show="open" x-transition class="mt-3">
                                <p class="text-xs text-[#A1A1A1]">Go to your account dashboard, select "Profile Settings", update your information, and save changes. You can modify your name, email, phone number, and shipping addresses.</p>
                            </div>
                        </div>

                        <div class="faq-item pb-4" x-data="{ open: false }">
                            <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                                <h4 class="text-sm font-medium text-[#262626] uppercase tracking-wide">How do I change my password?</h4>
                                <i class="iconoir-nav-arrow-down text-[#A1A1A1] transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                            </div>
                            <div x-show="open" x-transition class="mt-3">
                                <p class="text-xs text-[#A1A1A1]">In your account settings, click "Change Password", enter your current password, then your new password twice to confirm. Choose a strong password with at least 8 characters.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-[#FBFBFB] p-6">
                    <div class="space-y-4">
                        <div class="faq-item pb-4" x-data="{ open: false }">
                            <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                                <h4 class="text-sm font-medium text-[#262626] uppercase tracking-wide">How do I manage my addresses?</h4>
                                <i class="iconoir-nav-arrow-down text-[#A1A1A1] transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                            </div>
                            <div x-show="open" x-transition class="mt-3">
                                <p class="text-xs text-[#A1A1A1]">In your account dashboard, go to "Address Book" to add, edit, or delete shipping and billing addresses. You can set a default address for faster checkout.</p>
                            </div>
                        </div>

                        <div class="faq-item pb-4" x-data="{ open: false }">
                            <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                                <h4 class="text-sm font-medium text-[#262626] uppercase tracking-wide">Need more help?</h4>
                                <i class="iconoir-nav-arrow-down text-[#A1A1A1] transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                            </div>
                            <div x-show="open" x-transition class="mt-3">
                                <p class="text-xs text-[#A1A1A1]">Contact our support team at info@jatoba.com or call +1 1234-5678. We're available Monday to Friday, 9 AM to 6 PM. You can also visit our physical location in São Paulo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <footer class="mt-auto bg-[#FBFBFB] py-12">
        <div class="container px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Policies & Terms -->
                <div>
                    <h4 class="text-[#262626] font-medium mb-4 uppercase">Policies & Terms</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ url('/help') }}" class="text-[#A1A1A1] text-sm hover:text-[#262626]">TERMS & CONDITIONS</a></li>
                        <li><a href="{{ url('/help') }}" class="text-[#A1A1A1] text-sm hover:text-[#262626]">POLICY AND POLITICS</a></li>
                    </ul>
                </div>

                <!-- Shopping -->
                <div>
                    <h4 class="text-[#262626] font-medium mb-4 uppercase">Shopping</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ url('/help') }}" class="text-[#A1A1A1] text-sm hover:text-[#262626]">PAYMENT METHODS</a></li>
                        <li><a href="{{ url('/help') }}" class="text-[#A1A1A1] text-sm hover:text-[#262626]">RETURNS & EXCHANGES</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h4 class="text-[#262626] font-medium mb-4 uppercase">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-[#A1A1A1] text-sm hover:text-[#262626]">+1 1234-5678</a></li>
                        <li><a href="#" class="text-[#A1A1A1] text-sm hover:text-[#262626]">info@jatoba.com</a></li>
                        <li>
                            <p class="text-[#A1A1A1] text-sm">
                                Av. Engenheiro Eusébio Stevaux, 823<br>
                                Santo Amaro, São Paulo - SP, 04696-000
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
