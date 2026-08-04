<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jatobá - Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/iconoir@6.11.0/css/iconoir.min.css">
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }

        form{
            margin: 0;
        }
    </style>
</head>
<body class="bg-white text-[#262626]">
    <header class="px-6 py-4 flex justify-between items-center">
        <a href="/shop"><img class="logo" src="/assets/facullogo.svg" alt="Logo"></a>
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
    @if($cartItems->isNotEmpty())
    <main class="px-6 py-8 h-full">
        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Product Section -->
            <div class="space-y-6">
                        <!-- Title Section -->
                <div class="flex items-baseline gap-2 mb-8">
                    <h1 class="text-6xl font-light">Checkout</h1>
                    <span class="text-2xl font-light">({{count($cartItems)}})</span>
                    <form action="/cart/" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-2xl font-light">delete cart</button>
                    </form>

                </div>
                <!-- Product Item -->
                @php
                 $total = 0
                @endphp
                @foreach ($cartItems as $item)
                <div class="flex gap-6">
                    <!-- Product Image -->
                    <div class="w-48 h-48 bg-gray-100-lg overflow-hidden flex-shrink-0">
                        <img src="{{ $item->product->images->first()->url }}"
                             alt="Travertine Mini Side Table"
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Product Details -->
                    <div class="flex-1">
                        <div class="mb-4">
                            <p class="text-xs uppercase tracking-wider text-[#262626] mb-1">{{ $item->product->name }}</p>
                            <p class="text-lg font-medium text-[#262626]">$ {{ $item->product->price * $item->units }}</p>
                            @php
                                $total += $item->product->price * $item->units
                            @endphp
                        </div>

                        <p class="text-sm text-[#a1a1a1] mb-4">
                            {{ $item->product->description }}
                        </p>

                        <!-- Quantity Controls -->
                        <div class="flex items-center gap-4 border-b border-[#262626] w-fit">
                            <form action="/cart/{{$item->product_id}}" method="POST">
                            @csrf
                            <input type="hidden" name="action" value="remove">
                            <button class="w-8 h-8 flex items-center justify-center ">
                                -
                            </button>
                            </form>
                            <span class="text-lg font-medium">{{ $item->units }}</span>
                            <form action="/cart/{{$item->product_id}}" method="POST">
                            @csrf
                            <input type="hidden" name="action" value="add">
                            <button class="w-8 h-8 flex items-center justify-center ">
                                +
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Summary Section -->
            <div class="lg:pl-8">
                <!-- Billing Address -->
                @if (isset ($address))
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 mb-16">
                    <!-- Principal billing address -->
                    <div x-data="{ open: false }">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-medium text-[#262626]">Billing address</h3>
                            <button @click="open = !open" class="border border-[#262626] text-[#262626] hover:text-[#a1a1a1] px-6 py-3 flex items-center text-sm">
                                <span x-show="!open">Edit</span>
                                <span x-show="open">Cancel</span>
                            </button>
                        </div>

                        <div class="space-y-1 text-[#262626]" x-show="!open">
                            <p class="text-md">{{ $address->neighborhood }} <strong>{{ $address->postal }}</strong></p>
                            <p class="text-md">{{ $address->street }}</p>
                        </div>

                        <form x-show="open" method="POST" action="/address" class="space-y-4">
                            @csrf
                            @method('PUT')

                            <div>
                                <input type="text" require name="street" placeholder="STREET" value="{{ $address->street }}" class="w-full border border-[#262626] px-3 py-2.5 text-xs text-[#262626]">
                            </div>

                            <div>
                                <input type="text" require name="neighborhood" placeholder="NEIGHBORHOOD" value="{{ $address->neighborhood }}" class="w-full border border-[#262626] px-3 py-2.5 text-xs text-[#262626]">
                            </div>

                            <div>
                                <input type="text" require name="postal" placeholder="POSTAL" value="{{ $address->postal }}" class="w-full border border-[#262626] px-3 py-2.5 text-xs text-[#262626]">
                            </div>

                            <div>
                                <input type="text" require name="description" placeholder="DESCRIPTION" value="{{ $address->description }}" class="w-full border border-[#262626] px-3 py-2.5 text-xs text-[#262626]">
                            </div>

                            <button type="submit" class="border border-[#262626] text-[#262626] hover:text-[#a1a1a1] px-6 py-3 flex items-center text-sm">
                                Save
                            </button>
                        </form>
                        </div>
                        </div>
                        @else
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 mb-16">
                            <!-- Principal billing address -->
                            <div x-data="{ open: false }">
                                <div class="flex items-center justify-between">
                                    <h2 class="text-lg font-medium text-[#262626]">Principal billing address</h2>
                                    <button @click="open = !open" class="border border-[#262626] text-[#262626] hover:text-[#a1a1a1] px-6 py-3 flex items-center text-sm">
                                        <span x-show="!open">Create</span>
                                        <span x-show="open">Cancel</span>
                                    </button>
                                </div>

                                <form x-show="open" method="POST" action="/address" class="space-y-4">
                                    @csrf

                                    <div>
                                        <input type="text" require name="street" placeholder="STREET" class="w-full border border-[#262626] px-3 py-2.5 text-xs text-[#262626]">
                                    </div>

                                    <div>
                                        <input type="text" require name="neighborhood" placeholder="NEIGHBORHOOD" class="w-full border border-[#262626] px-3 py-2.5 text-xs text-[#262626]">
                                    </div>

                                    <div>
                                        <input type="text" require name="postal" placeholder="POSTAL"  class="w-full border border-[#262626] px-3 py-2.5 text-xs text-[#262626]">
                                    </div>

                                    <div>
                                        <input type="text" require name="description" placeholder="DESCRIPTION" class="w-full border border-[#262626] px-3 py-2.5 text-xs text-[#262626]">
                                    </div>

                                    <button type="submit" class="border border-[#262626] text-[#262626] hover:text-[#a1a1a1] px-6 py-3 flex items-center text-sm">
                                        Save
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endif

                <!-- Order Summary -->
                @php
                $frete = $total * 0.1
                @endphp

                <div class="border-t pt-8">
                    <h2 class="text-2xl font-light mb-6">Summary</h2>
                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between">
                            <span class="text-sm text-[#262626]">Subtotal</span>
                            <span class="text-sm font-medium text-[#262626]">$ {{ $total }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-[#262626]">Estimated delivery</span>
                            <span class="text-sm font-medium text-[#262626]">$ {{ $frete }}</span>
                        </div>

                    <div class="border-t pt-4 mb-8">
                        <div class="flex justify-between">
                            <span class="text-lg font-medium text-[#262626]">Total</span>
                            <span class="text-lg font-medium text-[#262626]">$ {{ $frete + $total }}</span>
                        </div>
                    </div>

                    <!-- Payment Button -->
                    @if(isset($address))
                    <form method="GET" action="/order/store/{{$address->id}}">
                    @csrf
                    <button class="w-full py-3 px-6 border border-[#262626] text-base hover:bg-gray-50 transition-colors flex items-center justify-center gap-2">
                        <span>buy</span>
                        <span>→</span>
                    </button>
                    </form>
                    @else
                    <button disabled class="w-full py-3 px-6 border border-[#a1a1a1] text-[#a1a1a1] hover:bg-gray-50 transition-colors flex items-center justify-center gap-2">
                        <span>Address not created</span>
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </main>
    @else
    <main class="h-dvh p-6">
        <div class="flex h-full justify-center items-center flex-col gap-2 ">
            <span>Your cart is empty</span>
            <button onclick="window.location='/shop'" class="w-full px-6 py-3 gap-2 text-base text-[#262626] border border-[#262626] hover:text-[#a1a1a1] flex items-center justify-between lg:w-fit">go shopping</button>
        </div>
    </main>
    @endif
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
</body>
</html>
