<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin Panel - {{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-gray-800 border-b border-gray-700">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-white">
                                    {{ __('shop.admin_panel') }}
                                </a>
                            </div>

                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.dashboard') ? 'border-indigo-400' : 'border-transparent' }} text-sm font-medium text-white">
                                    {{ __('shop.dashboard') }}
                                </a>
                                <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.products.*') ? 'border-indigo-400' : 'border-transparent' }} text-sm font-medium text-white">
                                    {{ __('shop.tooted') }}
                                </a>
                                <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.categories.*') ? 'border-indigo-400' : 'border-transparent' }} text-sm font-medium text-white">
                                    {{ __('shop.categories') }}
                                </a>
                                <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.orders.*') ? 'border-indigo-400' : 'border-transparent' }} text-sm font-medium text-white">
                                    {{ __('shop.orders') }}
                                </a>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <a href="{{ route('home') }}" class="text-sm text-white hover:text-gray-300 mr-4">View Store</a>

                            <!-- Language Selector -->
                            <div class="mr-4 relative" x-data="{ open: false }">
                                <button @click="open = !open" @click.away="open = false" class="flex items-center gap-2 px-3 py-2 rounded-md bg-gray-700 hover:bg-gray-600 transition text-white text-sm">
                                    @if(app()->getLocale() == 'et')
                                        <img src="https://flagcdn.com/w40/ee.png" alt="Estonian" class="w-6 h-4 rounded shadow-sm">
                                        <span>ET</span>
                                    @elseif(app()->getLocale() == 'en')
                                        <img src="https://flagcdn.com/w40/gb.png" alt="English" class="w-6 h-4 rounded shadow-sm">
                                        <span>EN</span>
                                    @else
                                        <img src="https://flagcdn.com/w40/ru.png" alt="Russian" class="w-6 h-4 rounded shadow-sm">
                                        <span>RU</span>
                                    @endif
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="open"
                                     x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="opacity-0 transform scale-95"
                                     x-transition:enter-end="opacity-100 transform scale-100"
                                     x-transition:leave="transition ease-in duration-75"
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

                            <div class="ml-3 relative">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-700 hover:bg-gray-600 focus:outline-none transition ease-in-out duration-150">
                                            <div>{{ Auth::user()->name }}</div>
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            @if (session('success'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>
