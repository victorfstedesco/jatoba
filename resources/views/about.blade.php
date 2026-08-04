<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JATOBÁ - About</title>
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
        .font-geist uppercase {
            font-family: 'Halant', serif;
        }
        .parallax-bg {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .hero-overlay {
            background: linear-gradient(135deg, rgba(38, 38, 38, 0.85) 0%, rgba(38, 38, 38, 0.65) 100%);
        }
        .timeline-item {
            position: relative;
            padding-left: 2rem;
        }
        .timeline-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.5rem;
            width: 0.75rem;
            height: 0.75rem;
            background: #262626;
            border-radius: 50%;
        }
        .timeline-item::after {
            content: '';
            position: absolute;
            left: 0.375rem;
            top: 1.25rem;
            width: 1px;
            height: calc(100% - 1rem);
            background: #e5e5e5;
        }
        .timeline-item:last-child::after {
            display: none;
        }
        .stats-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .stats-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="font-geist text-[#262626] bg-white">

    <!-- Hero Section -->
    <section class="relative h-screen flex flex-col parallax-bg" style="background-image: url('https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');">
        <header class="px-6 py-4 flex justify-between relative z-50 items-start h-fit w-full">
            <a href="/shop" class="cursor-pointer"><img class="logo" src="/assets/facullogo.svg" alt=""></a>
            <nav class="flex items-center space-x-4 md:space-x-8">
                @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-white hover:text-[#262626]">account</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-white hover:text-[#262626]">log in</a>
                @endauth
                @endif
                <a href="{{ url('/help') }}" class="text-xs md:text-sm text-white hover:text-[#262626]">help</a>
                <a href="{{ url('/about') }}" class="text-xs md:text-sm text-white hover:text-[#262626]">about</a>
                <a href="{{ url('/cart') }}" class="text-xs md:text-sm text-white hover:text-[#262626]">cart</a>
            </nav>
        </header>
        <div class="hero-overlay absolute inset-0"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex flex-col items-center text-white px-6">
            <a class="cursor-pointer"><img class="logo" src="/assets/facullogo.svg" alt=""></a>
            <p class="text-lg md:text-xl font-light uppercase tracking-widest">JATOBÁ</p>
            <div class="mt-8">
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="px-6 pb-12">
        <!-- Our Story -->
        <section id="story" class="mb-16">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col items-center gap-12 items-center">
                    <div>
                        <h2 class="font-geist uppercase text-3xl md:text-4xl font-light mb-6 mt-6">Our Story</h2>
                        <div class="space-y-4 text-[#A1A1A1] leading-relaxed">
                            <p>Founded in 1987 by Victor Tedesco, JATOBÁ was born from a singular vision: to transform Brazil's luxury real estate market through excellence, integrity, and truly personalized service.</p>

                            <p>The name JATOBÁ was chosen in honor of the majestic Brazilian tree, a symbol of resistance, longevity, and natural beauty. Like the tree that gives it its name, our company grew with deep and solid roots, gradually expanding to become one of the most respected high-end real estate brokerages in the country.</p>

                            <p>Located in the heart of São Paulo, JATOBÁ specializes in exclusive properties that reflect the highest standard of architectural quality and design. Each property in our portfolio is carefully selected, representing not just an investment, but a sophisticated lifestyle.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Timeline -->
        <section class="mb-16">
            <div class="max-w-4xl mx-auto">
                <h2 class="font-geist uppercase text-3xl md:text-4xl font-light text-center mb-12">Our Journey</h2>
                <div class="space-y-8">
                    <div class="timeline-item">
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="md:w-24 text-sm font-medium text-[#262626] uppercase tracking-wide">1987</div>
                            <div class="flex-1">
                                <h3 class="text-lg font-medium mb-2">Foundation</h3>
                                <p class="text-sm text-[#A1A1A1]">Eduardo Mendes founded JATOBÁ with the goal of revolutionizing São Paulo's luxury real estate market.</p>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="md:w-24 text-sm font-medium text-[#262626] uppercase tracking-wide">1995</div>
                            <div class="flex-1">
                                <h3 class="text-lg font-medium mb-2">Expansion</h3>
                                <p class="text-sm text-[#A1A1A1]">Opening of the first branch in Alphaville, expanding our presence to meet the growing demand for high-end properties.</p>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="md:w-24 text-sm font-medium text-[#262626] uppercase tracking-wide">2003</div>
                            <div class="flex-1">
                                <h3 class="text-lg font-medium mb-2">Innovation</h3>
                                <p class="text-sm text-[#A1A1A1]">Launch of Brazil's first exclusive digital platform for virtual luxury property viewing.</p>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="md:w-24 text-sm font-medium text-[#262626] uppercase tracking-wide">2015</div>
                            <div class="flex-1">
                                <h3 class="text-lg font-medium mb-2">Recognition</h3>
                                <p class="text-sm text-[#A1A1A1]">Recognized as "Best Luxury Real Estate Brokerage" by the Brazilian Real Estate Market Association for three consecutive years.</p>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="md:w-24 text-sm font-medium text-[#262626] uppercase tracking-wide">2020</div>
                            <div class="flex-1">
                                <h3 class="text-lg font-medium mb-2">International</h3>
                                <p class="text-sm text-[#A1A1A1]">International expansion with strategic partnerships in Miami, Lisbon and London, serving Brazilian clients abroad.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Statistics -->
        <section class="mb-16">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="bg-[#FBFBFB] p-6 text-center">
                        <div class="text-3xl font-light font-geist uppercase text-[#262626] mb-2">37+</div>
                        <div class="text-xs text-[#A1A1A1] uppercase tracking-wide">Years of Experience</div>
                    </div>
                    <div class="bg-[#FBFBFB] p-6 text-center">
                        <div class="text-3xl font-light font-geist uppercase text-[#262626] mb-2">2.5B+</div>
                        <div class="text-xs text-[#A1A1A1] uppercase tracking-wide">In Sales (R$)</div>
                    </div>
                    <div class="bg-[#FBFBFB] p-6 text-center">
                        <div class="text-3xl font-light font-geist uppercase text-[#262626] mb-2">850+</div>
                        <div class="text-xs text-[#A1A1A1] uppercase tracking-wide">Properties Sold</div>
                    </div>
                    <div class="bg-[#FBFBFB] p-6 text-center">
                        <div class="text-3xl font-light font-geist uppercase text-[#262626] mb-2">98%</div>
                        <div class="text-xs text-[#A1A1A1] uppercase tracking-wide">Client Satisfaction</div>
                    </div>
                </div>
            </div>
        </section>
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
