@extends('layouts.shop')

@section('title', $product->name)

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl p-8 mb-8 border border-gray-100">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="space-y-4">
                    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-gray-50 to-gray-100 p-8 shadow-inner">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-auto object-contain hover:scale-105 transition-transform duration-300">
                        @if($product->stock_quantity <= 10 && $product->stock_quantity > 0)
                            <span class="absolute top-4 right-4 bg-gradient-to-r from-orange-500 to-red-500 text-white text-xs font-bold px-3 py-2 rounded-full shadow-lg">
                                {{ __('shop.only_left', ['count' => $product->stock_quantity]) }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="flex flex-col">
                    <div class="mb-3">
                        <span class="inline-block bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
                            {{ $product->category ? (str_starts_with($product->category->name, 'category.') ? __('shop.' . $product->category->name) : $product->category->name) : 'Tech' }}
                        </span>
                    </div>

                    <h1 class="text-4xl font-bold text-gray-900 mb-4 leading-tight">{{ $product->translated_name }}</h1>

                    <div class="mb-6">
                        <div class="flex items-baseline gap-2">
                            <span class="text-5xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                                €{{ number_format($product->price, 2) }}
                            </span>
                        </div>
                    </div>

                    <div class="mb-6">
                        @if($product->stock_quantity > 0)
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-green-700 font-semibold">
                                    {{ __('shop.in_stock') }} - {{ $product->stock_quantity }} {{ __('shop.available') }}
                                </span>
                            </div>
                        @else
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-red-700 font-semibold">{{ __('shop.out_of_stock') }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="mb-8 pb-8 border-b border-gray-200">
                        <h2 class="text-lg font-bold text-gray-900 mb-3">{{ __('shop.product_details') }}</h2>
                        <p class="text-gray-600 leading-relaxed">{{ $product->translated_description ?: 'Premium quality technology product designed for modern users. Contact us for detailed specifications.' }}</p>
                    </div>

                    @auth
                        @if($product->stock_quantity > 0)
                            <form method="POST" action="{{ route('cart.add') }}" class="mt-auto">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                <div class="flex items-center gap-4 mb-6">
                                    <label class="text-sm font-semibold text-gray-900">{{ __('shop.quantity') }}:</label>
                                    <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock_quantity }}" class="w-24 px-4 py-2 rounded-lg border-2 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
                                </div>

                                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:shadow-2xl hover:scale-105 transition-all duration-200 flex items-center justify-center gap-2">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    {{ __('shop.add_to_cart') }}
                                </button>
                            </form>
                        @else
                            <button disabled class="w-full bg-gray-300 text-gray-500 px-8 py-4 rounded-xl font-bold text-lg cursor-not-allowed">
                                {{ __('shop.out_of_stock') }}
                            </button>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="block text-center w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:shadow-2xl hover:scale-105 transition-all duration-200">
                            {{ __('shop.login_to_purchase') }}
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        @if($relatedProducts->count() > 0)
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl p-8 border border-gray-100">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-3xl font-bold text-gray-900">{{ __('shop.you_may_also_like') }}</h2>
                    <span class="text-sm text-gray-500">{{ __('shop.from_same_category') }}</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $related)
                        <div class="bg-white rounded-lg shadow hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-blue-500 group overflow-hidden">
                            <a href="{{ route('products.show', $related->id) }}">
                                <div class="relative overflow-hidden bg-gray-50">
                                    <img src="{{ $related->image_url }}" alt="{{ $related->name }}" class="w-full h-48 object-contain p-4 group-hover:scale-105 transition-transform duration-300">
                                </div>
                                <div class="p-4">
                                    <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2 min-h-[2.5rem]">{{ $related->translated_name }}</h3>
                                    <div class="flex justify-between items-center mt-3">
                                        <span class="text-xl font-bold text-gray-900">€{{ number_format($related->price, 2) }}</span>
                                        @if($related->stock_quantity > 0)
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
            </div>
        @endif
    </div>
</div>
@endsection
