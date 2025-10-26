<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TechHub') }} - @yield('title', 'Premium Tech Store')</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            @keyframes slideInFromTop {
                from {
                    transform: translateY(-100%);
                    opacity: 0;
                }
                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }
            .animate-slide-in {
                animation: slideInFromTop 0.3s ease-out;
            }
            .backdrop-blur-sm {
                backdrop-filter: blur(8px);
            }
            @keyframes blob {
                0% {
                    transform: translate(0px, 0px) scale(1);
                }
                33% {
                    transform: translate(30px, -50px) scale(1.1);
                }
                66% {
                    transform: translate(-20px, 20px) scale(0.9);
                }
                100% {
                    transform: translate(0px, 0px) scale(1);
                }
            }
            @keyframes float {
                0%, 100% {
                    transform: translateY(0px);
                }
                50% {
                    transform: translateY(-20px);
                }
            }
            .animate-blob {
                animation: blob 7s infinite;
            }
            .animate-float {
                animation: float 6s ease-in-out infinite;
            }
            .animation-delay-2000 {
                animation-delay: 2s;
            }
            .animation-delay-4000 {
                animation-delay: 4s;
            }
            .animation-delay-1000 {
                animation-delay: 1s;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-gray-50 via-white to-blue-50" x-data="{ cartOpen: false }">
        <div class="min-h-screen flex flex-col">
            <!-- Sticky Navigation -->
            <nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-200 shadow-lg">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-20">
                        <div class="flex items-center">
                            <!-- Logo -->
                            <div class="shrink-0">
                                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                                    <img src="{{ asset('images/logo.png') }}" alt="TechHub" class="h-12 w-auto transition-transform group-hover:scale-105">
                                    <div>
                                        <p class="text-xs text-gray-500 font-medium">{{ __('shop.premium_tech_store') }}</p>
                                    </div>
                                </a>
                            </div>

                            <!-- Nav Links -->
                            <div class="hidden md:ml-12 md:flex md:space-x-1">
                                <a href="{{ route('home') }}" class="px-4 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('home') ? 'bg-cyan-50 text-cyan-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }} transition-all">
                                    {{ __('shop.home') }}
                                </a>
                                <a href="{{ route('products.index') }}" class="px-4 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('products.*') ? 'bg-cyan-50 text-cyan-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }} transition-all">
                                    {{ __('shop.all_products') }}
                                </a>
                            </div>
                        </div>

                        <!-- Right Side -->
                        <div class="flex items-center gap-4">
                            <!-- Language Switcher -->
                            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                                <button @click="open = !open" class="flex items-center gap-2 px-3 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors">
                                    @if(app()->getLocale() == 'et')
                                        <img src="https://flagcdn.com/w40/ee.png" alt="Estonian" class="w-6 h-4 rounded shadow-sm">
                                    @elseif(app()->getLocale() == 'ru')
                                        <img src="https://flagcdn.com/w40/ru.png" alt="Russian" class="w-6 h-4 rounded shadow-sm">
                                    @else
                                        <img src="https://flagcdn.com/w40/gb.png" alt="English" class="w-6 h-4 rounded shadow-sm">
                                    @endif
                                    <svg class="w-4 h-4 text-gray-600 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="open"
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0 transform scale-95"
                                     x-transition:enter-end="opacity-100 transform scale-100"
                                     x-transition:leave="transition ease-in duration-150"
                                     x-transition:leave-start="opacity-100 transform scale-100"
                                     x-transition:leave-end="opacity-0 transform scale-95"
                                     class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-xl border border-gray-200 py-1 z-50"
                                     style="display: none;">
                                    <a href="{{ route('language.switch', 'et') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-cyan-50 transition {{ app()->getLocale() == 'et' ? 'bg-cyan-50 text-cyan-600 font-semibold' : '' }}">
                                        <img src="https://flagcdn.com/w40/ee.png" alt="Estonian" class="w-6 h-4 rounded shadow-sm">
                                        <span>Eesti</span>
                                    </a>
                                    <a href="{{ route('language.switch', 'en') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-cyan-50 transition {{ app()->getLocale() == 'en' ? 'bg-cyan-50 text-cyan-600 font-semibold' : '' }}">
                                        <img src="https://flagcdn.com/w40/gb.png" alt="English" class="w-6 h-4 rounded shadow-sm">
                                        <span>English</span>
                                    </a>
                                    <a href="{{ route('language.switch', 'ru') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-cyan-50 transition {{ app()->getLocale() == 'ru' ? 'bg-cyan-50 text-cyan-600 font-semibold' : '' }}">
                                        <img src="https://flagcdn.com/w40/ru.png" alt="Russian" class="w-6 h-4 rounded shadow-sm">
                                        <span>Русский</span>
                                    </a>
                                </div>
                            </div>

                            @auth
                                <!-- Cart Button with Count -->
                                <button @click="cartOpen = true" class="relative group">
                                    <div class="p-3 rounded-full bg-gray-100 group-hover:bg-cyan-50 transition-colors">
                                        <svg class="w-6 h-6 text-gray-600 group-hover:text-cyan-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                        @php
                                            $cartCount = \App\Models\CartItem::where('user_id', auth()->id())->sum('quantity');
                                        @endphp
                                        @if($cartCount > 0)
                                            <span class="absolute -top-1 -right-1 bg-gradient-to-r from-cyan-500 to-cyan-600 text-white text-xs font-bold rounded-full h-6 w-6 flex items-center justify-center shadow-lg">
                                                {{ $cartCount }}
                                            </span>
                                        @endif
                                    </div>
                                </button>

                                <!-- User Dropdown -->
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="flex items-center gap-2 px-4 py-2 rounded-lg bg-gradient-to-r from-cyan-500 to-cyan-600 text-white font-semibold hover:shadow-lg transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            <span class="hidden sm:block">{{ Auth::user()->name }}</span>
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('orders.index')">
                                            📦 {{ __('shop.my_orders') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('profile.edit')">
                                            👤 {{ __('shop.profile') }}
                                        </x-dropdown-link>

                                        @if(Auth::user()->is_admin)
                                            <x-dropdown-link :href="route('admin.dashboard')">
                                                ⚙️ {{ __('shop.admin_panel') }}
                                            </x-dropdown-link>
                                        @endif

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                🚪 {{ __('shop.log_out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @else
                                <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-semibold text-gray-700 hover:text-gray-900 transition">{{ __('shop.login') }}</a>
                                <a href="{{ route('register') }}" class="px-6 py-2 text-sm font-semibold text-white bg-gradient-to-r from-cyan-500 to-cyan-600 rounded-lg hover:shadow-lg transition-all">{{ __('shop.sign_up') }}</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            @if (session('success'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 text-green-800 px-6 py-4 rounded-lg shadow-md backdrop-blur-sm animate-slide-in flex items-start gap-3">
                        <svg class="w-6 h-6 text-green-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                    <div class="bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-500 text-red-800 px-6 py-4 rounded-lg shadow-md backdrop-blur-sm animate-slide-in flex items-start gap-3">
                        <svg class="w-6 h-6 text-red-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="font-medium">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <main>
                @yield('content')
            </main>

            <footer class="bg-gradient-to-br from-gray-900 via-cyan-900 to-teal-900 border-t border-gray-800 mt-auto">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                        <div class="col-span-1 md:col-span-2">
                            <div class="flex items-center gap-3 mb-4">
                                <img src="{{ asset('images/logo.png') }}" alt="TechHub" class="h-10 w-auto">
                            </div>
                            <p class="text-gray-300 text-sm max-w-md">
                                {{ __('shop.footer_description') }}
                            </p>
                        </div>

                        <div>
                            <h3 class="text-white font-semibold mb-3">{{ __('shop.quick_links') }}</h3>
                            <ul class="space-y-2">
                                <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-cyan-400 text-sm transition">{{ __('shop.home') }}</a></li>
                                <li><a href="{{ route('products.index') }}" class="text-gray-300 hover:text-cyan-400 text-sm transition">{{ __('shop.all_products') }}</a></li>
                                @auth
                                    <li><a href="{{ route('cart.index') }}" class="text-gray-300 hover:text-cyan-400 text-sm transition">{{ __('shop.shopping_cart') }}</a></li>
                                    <li><a href="{{ route('orders.index') }}" class="text-gray-300 hover:text-cyan-400 text-sm transition">{{ __('shop.my_orders') }}</a></li>
                                @endauth
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-white font-semibold mb-3">{{ __('shop.support') }}</h3>
                            <ul class="space-y-2">
                                <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-cyan-400 text-sm transition">{{ __('shop.contact_us') }}</a></li>
                                <li><a href="{{ route('faq') }}" class="text-gray-300 hover:text-cyan-400 text-sm transition">{{ __('shop.faqs') }}</a></li>
                                <li><a href="{{ route('shipping') }}" class="text-gray-300 hover:text-cyan-400 text-sm transition">{{ __('shop.shipping_info') }}</a></li>
                                <li><a href="{{ route('returns') }}" class="text-gray-300 hover:text-cyan-400 text-sm transition">{{ __('shop.returns') }}</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="border-t border-gray-700 pt-8">
                        <p class="text-center text-gray-400 text-sm">
                            &copy; {{ date('Y') }} {{ config('app.name') }}. {{ __('shop.all_rights_reserved') }}
                        </p>
                    </div>
                </div>
            </footer>

            <!-- Cart Sidebar -->
            @auth
            <div x-show="cartOpen"
                 x-transition:enter="transition ease-out duration-500 transform"
                 x-transition:enter-start="translate-x-full opacity-0"
                 x-transition:enter-end="translate-x-0 opacity-100"
                 x-transition:leave="transition ease-in duration-400 transform"
                 x-transition:leave-start="translate-x-0 opacity-100"
                 x-transition:leave-end="translate-x-full opacity-0"
                 class="fixed right-0 top-0 h-full w-full max-w-md bg-white shadow-2xl z-50 flex flex-col border-l-4 border-cyan-500"
                 style="display: none;"
                 @click.outside="cartOpen = false">

                <!-- Cart Header -->
                <div class="bg-gradient-to-r from-cyan-500 to-cyan-600 p-6 flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-white flex items-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        {{ __('shop.shopping_cart') }}
                    </h2>
                    <button @click="cartOpen = false" class="text-white hover:text-gray-200 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                @php
                    $cartItems = \App\Models\CartItem::where('user_id', auth()->id())->with('product')->get();
                    $total = $cartItems->sum(function($item) { return $item->product->price * $item->quantity; });
                @endphp

                <!-- Cart Items -->
                <div class="flex-1 overflow-y-auto p-6">
                    @if($cartItems->count() > 0)
                        <div class="space-y-4">
                            @foreach($cartItems as $item)
                                <div class="flex gap-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
                                    @if($item->product->image_url)
                                        <img src="{{ $item->product->image_url }}" alt="{{ $item->product->translated_name }}" class="w-20 h-20 object-cover rounded">
                                    @else
                                        <div class="w-20 h-20 bg-gray-200 rounded flex items-center justify-center">
                                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="flex-1">
                                        <h3 class="font-semibold text-gray-900">{{ $item->product->translated_name }}</h3>
                                        <p class="text-sm text-gray-600">{{ __('shop.quantity') }}: {{ $item->quantity }}</p>
                                        <p class="text-cyan-600 font-bold mt-1">€{{ number_format($item->product->price * $item->quantity, 2) }}</p>
                                    </div>
                                    <form method="POST" action="{{ route('cart.remove', $item->id) }}" class="flex items-start">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <p class="text-gray-500 text-lg">{{ __('shop.cart_empty') }}</p>
                            <button @click="cartOpen = false" class="mt-4 text-cyan-600 hover:text-cyan-700 font-semibold">
                                {{ __('shop.continue_shopping') }}
                            </button>
                        </div>
                    @endif
                </div>

                <!-- Cart Footer -->
                @if($cartItems->count() > 0)
                    <div class="border-t border-gray-200 p-6 bg-gray-50">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-lg font-semibold text-gray-900">{{ __('shop.total') }}:</span>
                            <span class="text-2xl font-bold text-cyan-600">€{{ number_format($total, 2) }}</span>
                        </div>
                        <a href="{{ route('checkout.index') }}" class="block w-full bg-gradient-to-r from-cyan-500 to-cyan-600 text-white text-center px-6 py-3 rounded-lg font-bold hover:shadow-lg transition-all">
                            {{ __('shop.proceed_to_checkout') }}
                        </a>
                    </div>
                @endif
            </div>
            @endauth
        </div>
    </body>
</html>
