<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JATOBÁ - Order Details</title>
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
    <main class="px-6 py-2 max-w-7xl">
        <!-- Page Header -->
        <div class=" mb-4  border-gray-100">
            <a href="/dashboard" class="inline-flex items-center gap-2 text-sm text-[#A1A1A1] hover:text-[#262626] transition-colors duration-200">
                <i class="iconoir-arrow-left text-sm"></i>
                Back to Dashboard
            </a>
        </div>
        <div class="mb-8 md:mb-12">
            <h1 class="text-2xl md:text-3xl font-light text-[#262626] mb-2">Order Details</h1>
            <p class="text-[#A1A1A1] text-sm">Review your purchase information</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12">
            <!-- Products Section -->
            <div class="lg:col-span-2">
                <div class="mb-6">
                    <h2 class="text-lg font-medium text-[#262626] mb-6 uppercase tracking-wide">Products</h2>
                </div>

                <!-- Product Items -->
                <div class="space-y-6">
                    <!-- Sample Product Item 1 -->
                     @foreach($order->orderItems as $item)
                    <div onclick="window.location='/productshop/{{$item->product->id}}'" class="cursor-pointer flex flex-col md:flex-row gap-4 md:gap-6 pb-6 border-b border-gray-100">
                        <div class="w-full md:w-32 h-32 bg-[#F5F5F0] overflow-hidden flex-shrink-0">
                            <img src="{{$item->product->images->first()->url}}"
                                 alt="{{$item->product->name}}"
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="text-sm font-medium text-[#262626] mb-1 uppercase tracking-wide">{{$item->product->name}}</h3>
                                <p class="text-xs text-[#A1A1A1] mb-3">{{$item->product->description}}</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-[#262626]">{{$item->units}}</span>
                                    <span class="text-sm font-medium text-[#262626]">$ {{$item->product->price * $item->units}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-[#FBFBFB] p-6 md:p-8">
                    <h3 class="text-lg font-medium text-[#262626] mb-6 uppercase tracking-wide">Order Summary</h3>

                    @php
                    $total = 0
                    @endphp
                    @foreach($order->orderItems as $item)
                    @php
                        $total += $item->product->price * $item->units
                    @endphp
                    @endforeach
                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-[#A1A1A1]">Subtotal</span>
                            <span class="text-[#262626]">$ {{$total}}</span>
                        </div>
                        <div class="border-t border-gray-200 pt-4">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-medium text-[#262626] uppercase">Total</span>
                                <span class="text-xl font-bold text-[#262626]">$ {{$total}}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Order Information -->
                    <div class="border-t border-gray-200 pt-6 space-y-3">
                        <div class="text-xs">
                            <span class="text-[#A1A1A1] uppercase tracking-wide">Order Number</span>
                            <p class="text-[#262626] font-medium mt-1">#{{$order->id}}</p>
                        </div>
                        <div class="text-xs">
                            <span class="text-[#A1A1A1] uppercase tracking-wide">Billing Address</span>
                            <div class="space-y-1 text-[#262626]" x-show="!open">
                                <p class="text-[#262626] font-medium mt-1">{{ $address->neighborhood }} <strong>{{ $address->postal }}</strong></p>
                                <p class="text-[#262626] font-medium mt-1">{{ $address->street }}</p>
                            </div>
                        </div>
                        <div class="text-xs">
                            <span class="text-[#A1A1A1] uppercase tracking-wide">Order date</span>
                            <p class="text-[#262626] font-medium mt-1">{{$order->created_at}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Footer -->
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
