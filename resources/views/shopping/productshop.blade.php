<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travertine Mini Side Table - JATOBÁ</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    </style>
</head>
<body class="font-geist text-[#262626] bg-white">
    <!-- Header -->
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

    <!-- Product Section -->
    <section class="px-6 py-8">
        <div class="max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16">

                <!-- Main Product Image -->
                <div class="w-full aspect-square bg-[#F5F5F0] overflow-hidden">
                    <img src="{{ $product->images->first()->url }}"
                         alt="{{ $product->name }}"
                         class="w-full h-full object-cover">
                </div>

                <!-- Product Details -->
                <div class="space-y-6 ">
                    <div class="mb-12">
                        <h1 class="text-2xl md:text-7xl font-semibold mb-12 uppercase tracking-wide">{{ $product->name }}</h1>
                        <p class="text-xl md:text-2xl font-light mb-4">${{ $product->price }}</p>
                        <form action="/cart/{{$product->id}}" method="POST">
                        @csrf
                        <button class="w-full md:w-auto px-6 py-3 text-base text-[#262626] border border-[#262626] hover:bg-[#262626] hover:text-white transition-colors duration-300 flex items-center justify-center gap-2 mb-8">
                            add to cart
                            ({{ $cart?->units ?? 0 }})
                        </button>
                        </form>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Gallery Grid -->
<section class="py-8">
    <div class="px-6">
        <div class="grid grid-cols-3 gap-4">
            <!-- Item 1 - grande -->
            <div class="col-span-1 row-span-2 overflow-hidden">
                @if(isset($imageUrls[1]))
                    <img src="{{ $imageUrls[1] }}" alt="Imagem 1" class="w-full h-full object-cover">
                @endif
            </div>

            <!-- Item 2 -->
            <div class="col-span-1 overflow-hidden">
                @if(isset($imageUrls[2]))
                    <img src="{{ $imageUrls[2] }}" alt="Imagem 2" class="w-full h-full object-cover">
                @endif
            </div>

            <!-- Item 3 -->
            <div class="col-span-1 overflow-hidden">
                @if(isset($imageUrls[3]))
                    <img src="{{ $imageUrls[3] }}" alt="Imagem 3" class="w-full h-full object-cover">
                @endif
            </div>

            <!-- Item 4 - maior -->
            <div class="col-span-2 overflow-hidden">
                @if(isset($imageUrls[4]))
                    <img src="{{ $imageUrls[4] }}" alt="Imagem 4" class="w-full h-full object-cover">
                @endif
            </div>
        </div>
    </div>
</section>

    <!-- You might like Section -->
    <section class="px-6 py-16">
        <div class="">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-xl md:text-2xl font-light">You might like—</h2>
                <button onclick="window.location='/shop'" class="px-6 py-3 text-sm text-[#262626] border border-[#262626] hover:bg-[#262626] hover:text-white transition-colors duration-300 flex items-center gap-2">
                    see more
                    <span class="iconoir-arrow-right ml-2 hover:text-[#A1A1A1]"></span>
                </button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($products as $p)
                 @if ($p->id !== $product->id)
                <div class="w-full cursor-pointer" onclick="window.location='/productshop/{{$p->id}}'">
                    <div class="relative group">
                        <img src="{{ $p->images->first()->url }}" alt="Aged Metal Side Tables" class="w-full h-64 md:h-80 object-cover" />
                    </div>
                    <div class="mt-4">
                        <h3 class="text-sm font-medium text-[#262626] mb-1 uppercase">{{ $p->name }}</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-[#262626]">$ {{$p->price}}</span>
                            <button class="w-6 h-6 flex items-center justify-center">
                                <span class="iconoir-arrow-right ml-2 hover:text-[#A1A1A1]"></span>
                            </button>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>

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
