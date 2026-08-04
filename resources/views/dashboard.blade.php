<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@100;200;300;400;500;600;700;800;900&family=Halant:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/iconoir@6.11.0/css/iconoir.min.css">
    <script src="//unpkg.com/alpinejs" defer></script>
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
            <a href="" class="text-xs md:text-sm text-[#A1A1A1] hover:text-[#262626]">account</a>
            <a href="{{ url('/help') }}" class="text-xs md:text-sm text-[#A1A1A1] hover:text-[#262626]">help</a>
            <a href="{{ url('/about')}} " class="text-xs md:text-sm text-[#A1A1A1] hover:text-[#262626]">about</a>
            <a href="{{ url('/cart') }}" class="text-xs md:text-sm text-[#A1A1A1] hover:text-[#262626]">cart</a>
        </nav>
    </header>

    <main class="h-full px-6 py-2 max-w-6xl">
        <div class="mb-8 md:mb-12">
            <div class="flex items-center gap-12">
                <h1 class="text-2xl md:text-3xl font-light text-[#262626] mb-2">{{ Auth::user()->name }}</h1>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class=" text-xs md:text-sm text-[#A1A1A1] hover:text-[#262626] transition-colors duration-200">
                        <span>Log-out</span>
                    </button>
                </form>
            </div>
            <p class="text-[#A1A1A1] text-sm">Manage your account and orders</p>
        </div>

        @if (isset ($address))
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 mb-16">
            <div x-data="{ open: false }">
                <div class="bg-[#FBFBFB] p-6 md:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-medium text-[#262626] uppercase tracking-wide">Principal billing address</h2>
                        <button @click="open = !open" class="text-xs md:text-sm text-[#A1A1A1] hover:text-[#262626] transition-colors duration-200">
                            <span x-show="!open">Edit</span>
                            <span x-show="open">Cancel</span>
                        </button>
                    </div>

                    <div class="space-y-1 text-[#262626]" x-show="!open">
                        <p class="text-sm font-medium">{{ $address->neighborhood }} <strong>{{ $address->postal }}</strong></p>
                        <p class="text-sm">{{ $address->street }}</p>
                    </div>

                    <form x-show="open" method="POST" action="/address" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <input type="text" require name="street" placeholder="STREET" value="{{ $address->street }}" class="w-full border border-gray-200 px-3 py-2.5 text-xs text-[#262626] bg-white focus:border-[#262626] focus:outline-none">
                        </div>

                        <div>
                            <input type="text" require name="neighborhood" placeholder="NEIGHBORHOOD" value="{{ $address->neighborhood }}" class="w-full border border-gray-200 px-3 py-2.5 text-xs text-[#262626] bg-white focus:border-[#262626] focus:outline-none">
                        </div>

                        <div>
                            <input type="text" require name="postal" placeholder="POSTAL" value="{{ $address->postal }}" class="w-full border border-gray-200 px-3 py-2.5 text-xs text-[#262626] bg-white focus:border-[#262626] focus:outline-none">
                        </div>

                        <div>
                            <input type="text" require name="description" placeholder="DESCRIPTION" value="{{ $address->description }}" class="w-full border border-gray-200 px-3 py-2.5 text-xs text-[#262626] bg-white focus:border-[#262626] focus:outline-none">
                        </div>

                        <button type="submit" class="text-xs md:text-sm text-[#A1A1A1] hover:text-[#262626] transition-colors duration-200">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @else
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 mb-16">
            <!-- Principal billing address -->
            <div x-data="{ open: false }">
                <div class="bg-[#FBFBFB] p-6 md:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-medium text-[#262626] uppercase tracking-wide">Principal billing address</h2>
                        <button @click="open = !open" class="text-xs md:text-sm text-[#A1A1A1] hover:text-[#262626] transition-colors duration-200">
                            <span x-show="!open">Create</span>
                            <span x-show="open">Cancel</span>
                        </button>
                    </div>

                    <form x-show="open" method="POST" action="/address" class="space-y-4">
                        @csrf

                        <div>
                            <input type="text" require name="street" placeholder="STREET" class="w-full border border-gray-200 px-3 py-2.5 text-xs text-[#262626] bg-white focus:border-[#262626] focus:outline-none">
                        </div>

                        <div>
                            <input type="text" require name="neighborhood" placeholder="NEIGHBORHOOD" class="w-full border border-gray-200 px-3 py-2.5 text-xs text-[#262626] bg-white focus:border-[#262626] focus:outline-none">
                        </div>

                        <div>
                            <input type="text" require name="postal" placeholder="POSTAL"  class="w-full border border-gray-200 px-3 py-2.5 text-xs text-[#262626] bg-white focus:border-[#262626] focus:outline-none">
                        </div>

                        <div>
                            <input type="text" require name="description" placeholder="DESCRIPTION" class="w-full border border-gray-200 px-3 py-2.5 text-xs text-[#262626] bg-white focus:border-[#262626] focus:outline-none">
                        </div>
                        <button type="submit" class="text-xs md:text-sm text-[#A1A1A1] hover:text-[#262626] transition-colors duration-200">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endif

        <!-- Recent Orders -->
        <div>
            <h2 class="text-lg font-medium text-[#262626] mb-6 uppercase tracking-wide">Recent orders ({{ count($orders ?? []) }})</h2>

            <div class="space-y-8">
                @foreach ($orders as $order)
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12 pb-8 border-b border-gray-100 last:border-b-0">
                    <!-- Product Image -->
                    @php
                        $firstItem = $order->orderItems->first();
                    @endphp

                    @if($firstItem && $firstItem->product && $firstItem->product->images->isNotEmpty())
                        <div class="w-full h-64 bg-[#F5F5F0] overflow-hidden">
                            <img src="{{ $firstItem->product->images->first()->url }}"
                                alt="Product"
                                class="w-full h-full object-cover">
                        </div>
                    @endif

                    <!-- Order Details -->
                    <div class="lg:col-span-2 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-4 text-xs text-[#A1A1A1] mb-4 uppercase tracking-wide">
                                <span>{{$order->created_at}}</span>
                                <span>#{{$order->id}}</span>
                            </div>

                            <div class="space-y-4 mb-6">
                                <div>
                                    <h3 class="text-sm font-medium text-[#262626] mb-2 uppercase tracking-wide">Billing address</h3>
                                    <div class="text-xs text-[#A1A1A1]">
                                        <p>{{ $order->address->neighborhood }}</p>
                                        <p>{{ $order->address->street }}</p>
                                    </div>
                                </div>

                                <div>
                                    @php
                                    $total = 0
                                    @endphp
                                    @foreach($order->orderItems as $item)
                                    @php
                                        $total += $item->product->price * $item->units
                                    @endphp
                                    @endforeach
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-[#262626] uppercase tracking-wide">Total</span>
                                        <span class="text-lg font-bold text-[#262626]">$ {{$total}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button onclick="window.location='/details/{{$order->id}}'" class="inline-flex items-center gap-2 text-xs md:text-sm text-[#A1A1A1] hover:text-[#262626] transition-colors duration-200">
                                see details
                                <i class="iconoir-arrow-right text-sm"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
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