<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JATOBÁ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Halant:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/iconoir@6.11.0/css/iconoir.min.css">
    <style>
        .font-geist { font-family: 'Geist', sans-serif; }
        .font-halant { font-family: 'Halant', serif; }
    </style>
</head>
<body class="font-geist text-[#262626] bg-white">

    <!-- Header -->
    <header class="px-6 py-4 flex justify-between items-center">
        <a href="/"><img class="logo" src="/assets/facullogo.svg" alt="Logo"></a>
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

    <!-- Hero -->
    <section class="flex flex-col lg:flex-row items-center justify-between px-4 md:px-6 py-8 md:py-16">
        <div class="w-full lg:w-1/2 mb-8 lg:mb-0">
            <img src="/assets/shop-hero.jpg" alt="Hero" class="w-full max-h-80 object-cover" />
        </div>
        <div class="w-full lg:w-1/2 lg:pl-16 text-center lg:text-left">
            <h1 class="text-3xl md:text-4xl font-light mb-4">Explore the<br>essencials—</h1>
            <p class="text-gray-600 mb-8">Elevate your home with comfort, style, and functional design—crafted for your everyday life.</p>
            <button class="w-full px-6 py-3 border border-[#262626] text-base text-[#262626] hover:text-[#a1a1a1] flex items-center justify-between lg:w-fit">
                see collection <i class="iconoir-arrow-right"></i>
            </button>
        </div>
    </section>

    <!-- Categories & Search -->
    <nav class="flex flex-wrap items-center justify-center lg:justify-start space-x-4 md:space-x-8 px-6">
        @foreach($categories as $c)
            <a href="/shop/{{$c->id}}" class="text-xs md:text-sm text-gray-600 hover:text-[#262626] mb-2 lg:mb-0">{{ $c->name }}</a>
        @endforeach
        <a href="/shop" class="text-xs md:text-sm text-gray-600 hover:text-[#262626] mb-2 lg:mb-0">see all</a>
        <div class="flex-1 hidden lg:block"></div>
        <div class="flex items-center space-x-4 w-full lg:w-auto justify-center lg:justify-end mt-4 lg:mt-0">
            <input
                id="searchInput"
                type="text"
                placeholder="search"
                class="px-3 py-2.5 text-xs border border-gray-200 rounded-sm focus:outline-none focus:border-[#262626] w-full max-w-xs"
            />
        </div>
    </nav>

    <!-- Products -->
    <section class="px-4 md:px-6 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @if($products->isEmpty())
                <p class="text-gray-500">No products found in this category.</p>
            @else
                @foreach ($products as $p)
                    <div class="product w-full cursor-pointer" onclick="window.location='/productshop/{{$p->id}}'" data-name="{{ $p->name }}">
                        <div class="relative group">
                            <img src="{{ $p->images->first()->url }}" alt="{{ $p->name }}" class="w-full h-64 md:h-80 object-cover" />
                        </div>
                        <div class="mt-4">
                            <h3 class="text-sm text-[#262626] mb-1 uppercase">{{ $p->name }}</h3>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-[#262626]">$ {{ $p->price }}</span>
                                <button class="w-6 h-6 flex items-center justify-center">
                                    <span class="iconoir-arrow-right ml-2 hover:text-[#A1A1A1]"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#FBFBFB] py-12 mt-auto">
        <div class="container px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h4 class="text-[#262626] font-medium mb-4 uppercase">Policies & Terms</h4>
                <ul class="space-y-2">
                    <li><a href="{{ url('/help') }}" class="text-[#A1A1A1] text-sm hover:text-[#262626]">TERMS & CONDITIONS</a></li>
                    <li><a href="{{ url('/help') }}" class="text-[#A1A1A1] text-sm hover:text-[#262626]">POLICY AND POLITICS</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-[#262626] font-medium mb-4 uppercase">Shopping</h4>
                <ul class="space-y-2">
                    <li><a href="{{ url('/help') }}" class="text-[#A1A1A1] text-sm hover:text-[#262626]">PAYMENT METHODS</a></li>
                    <li><a href="{{ url('/help') }}" class="text-[#A1A1A1] text-sm hover:text-[#262626]">RETURNS & EXCHANGES</a></li>
                </ul>
            </div>
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
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const products = document.querySelectorAll('.product');

            searchInput.addEventListener('input', function () {
                const query = this.value.toUpperCase();
                products.forEach(product => {
                    const name = product.getAttribute('data-name');
                    product.style.display = name.includes(query) ? 'block' : 'none';
                });
            });
        });
    </script>
</body>
</html>
