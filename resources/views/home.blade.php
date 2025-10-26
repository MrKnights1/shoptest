@extends('layouts.shop')

@section('title', 'Welcome to TechHub')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="relative bg-gradient-to-r from-cyan-600 to-teal-700 overflow-hidden shadow-2xl sm:rounded-2xl mb-8">
            <!-- Animated Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#grid)" />
                </svg>
            </div>

            <!-- Decorative Circles -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-cyan-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute -bottom-8 left-20 w-64 h-64 bg-teal-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
            <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-cyan-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>

            <!-- Tech Icons Floating -->
            <div class="absolute top-10 right-20 opacity-20 hidden lg:block">
                <svg class="w-16 h-16 text-white animate-float" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3.293 1.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L7.586 10 5.293 7.707a1 1 0 010-1.414zM11 12a1 1 0 100 2h3a1 1 0 100-2h-3z"></path>
                </svg>
            </div>
            <div class="absolute bottom-20 right-40 opacity-20 hidden lg:block animation-delay-2000">
                <svg class="w-12 h-12 text-white animate-float" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="absolute top-32 left-1/4 opacity-20 hidden lg:block animation-delay-1000">
                <svg class="w-14 h-14 text-white animate-float" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 7H7v6h6V7z"></path>
                    <path fill-rule="evenodd" d="M7 2a1 1 0 012 0v1h2V2a1 1 0 112 0v1h2a2 2 0 012 2v2h1a1 1 0 110 2h-1v2h1a1 1 0 110 2h-1v2a2 2 0 01-2 2h-2v1a1 1 0 11-2 0v-1H9v1a1 1 0 11-2 0v-1H5a2 2 0 01-2-2v-2H2a1 1 0 110-2h1V9H2a1 1 0 010-2h1V5a2 2 0 012-2h2V2zM5 5h10v10H5V5z" clip-rule="evenodd"></path>
                </svg>
            </div>

            <!-- Content -->
            <div class="relative p-8 md:p-12">
                <div class="max-w-3xl">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4 text-white drop-shadow-lg">{{ __('shop.welcome_title') }}</h1>
                    <p class="text-xl mb-6 text-white drop-shadow">{{ __('shop.welcome_subtitle') }}</p>
                    <div class="flex gap-4">
                        <a href="{{ route('products.index') }}" class="bg-white text-cyan-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg hover:shadow-xl hover:scale-105 transform duration-200">
                            {{ __('shop.shop_now') }}
                        </a>
                        <a href="{{ route('products.index', ['category' => 4]) }}" class="bg-cyan-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-cyan-400 transition border-2 border-white shadow-lg hover:shadow-xl hover:scale-105 transform duration-200">
                            {{ __('shop.gaming_gear') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @if($categories->count() > 0)
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ __('shop.shop_by_category') }}</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($categories as $category)
                        <a href="{{ route('products.index', ['category' => $category->id]) }}" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition text-center border border-gray-200 hover:border-cyan-500 group">
                            <div class="text-4xl mb-3">
                                @if(str_contains(strtolower($category->name), 'laptop'))
                                    💻
                                @elseif(str_contains(strtolower($category->name), 'smartphone') || str_contains(strtolower($category->name), 'tablet'))
                                    📱
                                @elseif(str_contains(strtolower($category->name), 'audio') || str_contains(strtolower($category->name), 'headphone'))
                                    🎧
                                @elseif(str_contains(strtolower($category->name), 'gaming'))
                                    🎮
                                @elseif(str_contains(strtolower($category->name), 'smart') || str_contains(strtolower($category->name), 'home'))
                                    🏠
                                @elseif(str_contains(strtolower($category->name), 'camera') || str_contains(strtolower($category->name), 'photo'))
                                    📷
                                @elseif(str_contains(strtolower($category->name), 'wearable') || str_contains(strtolower($category->name), 'watch'))
                                    ⌚
                                @else
                                    🔌
                                @endif
                            </div>
                            <h3 class="font-semibold text-gray-900 group-hover:text-cyan-600 transition">{{ str_starts_with($category->name, 'category.') ? __('shop.' . $category->name) : $category->name }}</h3>
                            <p class="text-sm text-gray-500 mt-1">{{ $category->products_count }} {{ __('shop.products') }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        <div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-gray-900">{{ __('shop.latest_tech') }}</h2>
                <a href="{{ route('products.index') }}" class="text-cyan-600 hover:text-cyan-800 font-medium">
                    {{ __('shop.view_all') }} →
                </a>
            </div>
            @if($featuredProducts->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($featuredProducts as $product)
                        <div class="bg-white rounded-lg shadow hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-cyan-500 group overflow-hidden">
                            <a href="{{ route('products.show', $product->id) }}">
                                <div class="relative overflow-hidden bg-gray-50">
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-contain p-4 group-hover:scale-105 transition-transform duration-300">
                                    @if($product->stock_quantity <= 10 && $product->stock_quantity > 0)
                                        <span class="absolute top-2 right-2 bg-orange-500 text-white text-xs px-2 py-1 rounded-full">
                                            {{ __('shop.only_left', ['count' => $product->stock_quantity]) }}
                                        </span>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <p class="text-xs text-cyan-600 font-semibold mb-1 uppercase">{{ $product->category->translated_name ?? 'Tech' }}</p>
                                    <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2 min-h-[2.5rem]">{{ $product->translated_name }}</h3>
                                    <div class="flex justify-between items-center mt-3">
                                        <span class="text-xl font-bold text-gray-900">€{{ number_format($product->price, 2) }}</span>
                                        @if($product->stock_quantity > 0)
                                            <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full font-medium">{{ __('shop.in_stock') }}</span>
                                        @else
                                            <span class="text-xs bg-red-100 text-red-700 px-2 py-1 rounded-full font-medium">{{ __('shop.out_of_stock') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No products available at the moment.</p>
            @endif
        </div>
    </div>
</div>
@endsection
