@extends('layouts.shop')

@section('title', __('shop.shopping_cart'))

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ __('shop.shopping_cart') }}</h1>
            <p class="text-gray-600">{{ __('shop.review_items') }}</p>
        </div>

        @if($cartItems->count() > 0)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-4">
                    @foreach($cartItems as $item)
                        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow">
                            <div class="flex flex-col sm:flex-row gap-6">
                                <div class="flex-shrink-0">
                                    <a href="{{ route('products.show', $item->product->id) }}">
                                        <div class="w-full sm:w-32 h-32 bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-4 flex items-center justify-center overflow-hidden">
                                            <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="w-full h-full object-contain hover:scale-110 transition-transform">
                                        </div>
                                    </a>
                                </div>

                                <div class="flex-1 min-w-0">
                                    <a href="{{ route('products.show', $item->product->id) }}" class="block group">
                                        <h3 class="text-lg font-bold text-gray-900 mb-1 group-hover:text-blue-600 transition">{{ $item->product->translated_name }}</h3>
                                    </a>
                                    <p class="text-sm text-gray-500 mb-3">
                                        <span class="inline-block bg-gray-100 px-2 py-1 rounded-md text-xs font-medium">{{ $item->product->category->translated_name ?? 'Tech' }}</span>
                                    </p>
                                    <p class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                                        €{{ number_format($item->product->price, 2) }}
                                    </p>
                                </div>

                                <div class="flex sm:flex-col items-center sm:items-end justify-between sm:justify-start gap-4">
                                    <div class="flex items-center gap-3">
                                        <span class="text-sm font-medium text-gray-700">{{ __('shop.qty') }}:</span>
                                        <form method="POST" action="{{ route('cart.update', $item->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $item->product->stock_quantity }}" class="w-20 px-3 py-2 rounded-lg border-2 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition text-center font-semibold" onchange="this.form.submit()">
                                        </form>
                                    </div>

                                    <div class="flex flex-col items-end gap-3">
                                        <p class="text-xl font-bold text-gray-900">
                                            €{{ number_format($item->product->price * $item->quantity, 2) }}
                                        </p>

                                        <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 hover:bg-red-50 p-2 rounded-lg transition">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl shadow-xl p-8 border-2 border-blue-100 sticky top-24">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('shop.order_summary') }}</h2>

                        <div class="space-y-3 mb-6 pb-6 border-b border-blue-200">
                            <div class="flex justify-between text-gray-700">
                                <span>{{ __('shop.subtotal') }}:</span>
                                <span class="font-semibold">€{{ number_format($total, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-700">
                                <span>{{ __('shop.shipping') }}:</span>
                                <span class="font-semibold text-green-600">{{ __('shop.free') }}</span>
                            </div>
                            <div class="flex justify-between text-gray-700">
                                <span>{{ __('shop.tax') }}:</span>
                                <span class="font-semibold">{{ __('shop.calculated_at_checkout') }}</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center mb-8">
                            <span class="text-xl font-bold text-gray-900">{{ __('shop.total') }}:</span>
                            <span class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                                €{{ number_format($total, 2) }}
                            </span>
                        </div>

                        <div class="space-y-3">
                            <a href="{{ route('checkout.index') }}" class="block w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-4 rounded-xl hover:shadow-2xl hover:scale-105 transition-all duration-200 text-center font-bold text-lg">
                                {{ __('shop.proceed_to_checkout') }}
                            </a>

                            <form method="POST" action="{{ route('cart.clear') }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-white text-gray-700 px-6 py-3 rounded-xl hover:bg-gray-50 transition border-2 border-gray-200 font-semibold">
                                    {{ __('shop.clear_cart') }}
                                </button>
                            </form>

                            <a href="{{ route('products.index') }}" class="block w-full text-center text-blue-600 hover:text-blue-700 font-semibold py-2 transition">
                                ← {{ __('shop.continue_shopping') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-white rounded-2xl shadow-xl p-12 text-center border border-gray-100">
                <div class="mb-6">
                    <svg class="w-24 h-24 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-3">{{ __('shop.cart_empty') }}</h2>
                <p class="text-gray-600 mb-8">{{ __('shop.cart_empty_message') }}</p>
                <a href="{{ route('products.index') }}" class="inline-block bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-xl hover:shadow-2xl hover:scale-105 transition-all duration-200 font-bold text-lg">
                    {{ __('shop.start_shopping') }}
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
