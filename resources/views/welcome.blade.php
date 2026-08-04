<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JATOBÁ - Móveis de Design</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Iconoir -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/iconoir@6.11.0/css/iconoir.min.css">
</head>
<body class="font-['Geist'] antialiased min-h-screen flex flex-col">
    <!-- Hero Section -->
    <section class="bg-[url('/assets/home-background.png')] bg-cover bg-center h-dvh overflow-hidden">
        <header class="px-6 py-4 flex justify-between items-center">
        <a href="/shop" class="cursor-pointer"><img class="logo" src="/assets/facullogo.svg" alt=""></a>
        <div class="flex items-center gap-4">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="text-sm inline-flex items-center border border-white text-white px-6 py-3 hover:bg-white hover:bg-opacity-10"
                        >
                            Conta
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="text-sm inline-flex items-center text-white px-6 py-3 hover:text-[#A1A1A1]"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="text-sm inline-flex items-center border border-white text-white px-6 py-3 hover:bg-white hover:bg-opacity-10 ">
                                Sign-in <i class="iconoir-arrow-right ml-1"></i>
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
        <div class="px-6 pt-24 pb-12 h-full flex flex-col justify-between">
            <div class="max-w-lg">
                <h1 class="text-5xl font-medium text-white leading-tight mb-4">Designed for the Way You Live.</h1>
                <a href="/shop" class="text-sm inline-flex items-center border border-white text-white px-6 py-3 hover:bg-white hover:bg-opacity-10 ">
                    go shopping <i class="iconoir-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Tagline Section -->
    <section class="px-6 py-16">
        <h2 class="text-5xl font-light text-gray-400 leading-relaxed md:text-7xl ">
            Elevate your home with <span class="text-[#D47D3A] font-normal">comfort</span>,
            <span class="text-jatoba font-normal">style</span>, and functional <span class="text-jatoba font-normal">design</span>—
            crafted for your everyday life.
        </h2>
    </section>

    <!-- Featured Categories -->
    <section class="px-6 py-8">
        <div class="flex justify-between items-center mb-8">
            <h3 class="text-2xl font-medium">Featured category</h3>
            <a href="/shop" class="border border-[#262626] text-[#262626] hover:text-[#a1a1a1] px-6 py-3 flex items-center text-sm">
                see more <i class="iconoir-arrow-right ml-2"></i>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Beds -->
        @foreach ($categories->shuffle()->take(3) as $c)
            <div onclick="window.location='/shop/{{$c->id}}'" class="group cursor-pointer">
                <div class="overflow-hidden mb-3">
                    <img src="{{ $c->url }}" alt="Beds" class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-105">
                </div>
                <div class="flex items-center justify-between">
                    <h4 class="text-xl uppercase text-gray-400">{{$c->name}}</h4>
                    <i class="iconoir-arrow-right text-gray-400"></i>
                </div>
            </div>
        @endforeach
    </section>

    <!-- Search Section -->
    <section class="px-6 py-16">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 w-max">
            <div>
                <h3 class="text-3xl font-medium mb-2">What are you looking for?</h3>
                <p class="text-base text-gray-600">Bring your home to life with our spectacular furniture collection.</p>
            </div>
            <a href="/shop" class="border border-[#262626] text-[#262626] hover:text-[#a1a1a1] px-6 py-3 flex items-center text-sm">
                explore <i class="iconoir-arrow-right ml-2"></i>
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="mt-auto bg-[#FBFBFB] py-12">
        <div class="container px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Policies & Terms -->
                <div>
                    <h4 class="text-[#262626] font-medium mb-4 uppercase">Policies & Terms</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-[#A1A1A1] text-sm hover:text-[#262626]">TERMS & CONDITIONS</a></li>
                        <li><a href="#" class="text-[#A1A1A1] text-sm hover:text-[#262626]">POLICY AND POLITICS</a></li>
                    </ul>
                </div>

                <!-- Shopping -->
                <div>
                    <h4 class="text-[#262626] font-medium mb-4 uppercase">Shopping</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-[#A1A1A1] text-sm hover:text-[#262626]">PAYMENT METHODS</a></li>
                        <li><a href="#" class="text-[#A1A1A1] text-sm hover:text-[#262626]">RETURNS & EXCHANGES</a></li>
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
