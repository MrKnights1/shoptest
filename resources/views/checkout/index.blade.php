@extends('layouts.shop')

@section('title', __('shop.secure_checkout'))

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ __('shop.secure_checkout') }}</h1>
            <p class="text-gray-600">{{ __('shop.complete_order_confidence') }}</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl p-8 border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        {{ __('shop.shipping_address') }}
                    </h2>

                    <form method="POST" action="{{ route('checkout.process') }}">
                        @csrf

                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">{{ __('shop.address_line_1') }} *</label>
                                <input type="text" name="address_line1" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition @error('address_line1') border-red-500 @enderror" value="{{ old('address_line1') }}" placeholder="123 Main Street">
                                @error('address_line1')
                                    <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">{{ __('shop.address_line_2') }}</label>
                                <input type="text" name="address_line2" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition" value="{{ old('address_line2') }}" placeholder="Apartment, suite, etc. (optional)">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">{{ __('shop.city') }} *</label>
                                    <input type="text" name="city" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition @error('city') border-red-500 @enderror" value="{{ old('city') }}" placeholder="New York">
                                    @error('city')
                                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">{{ __('shop.state') }} *</label>
                                    <input type="text" name="state" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition @error('state') border-red-500 @enderror" value="{{ old('state') }}" placeholder="NY">
                                    @error('state')
                                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">{{ __('shop.zip_code') }} *</label>
                                    <input type="text" name="zip_code" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition @error('zip_code') border-red-500 @enderror" value="{{ old('zip_code') }}" placeholder="10001">
                                    @error('zip_code')
                                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">{{ __('shop.country') }} *</label>
                                    <input type="text" name="country" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition @error('country') border-red-500 @enderror" value="{{ old('country', 'USA') }}" placeholder="USA">
                                    @error('country')
                                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="border-t pt-6">
                                <label class="block text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                    </svg>
                                    {{ __('shop.payment_method') }} *
                                </label>
                                <div class="space-y-3">
                                    <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-blue-500 transition has-[:checked]:border-blue-500 has-[:checked]:bg-blue-50">
                                        <input type="radio" name="payment_method" value="cod" checked class="w-5 h-5 text-blue-600 focus:ring-2 focus:ring-blue-200">
                                        <div class="ml-4 flex-1">
                                            <span class="font-semibold text-gray-900">{{ __('shop.cash_on_delivery') }}</span>
                                            <p class="text-sm text-gray-600">{{ __('shop.pay_on_receive') }}</p>
                                        </div>
                                    </label>
                                    <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-not-allowed opacity-60">
                                        <input type="radio" name="payment_method" value="stripe" disabled class="w-5 h-5 text-blue-600">
                                        <div class="ml-4 flex-1">
                                            <span class="font-semibold text-gray-900">{{ __('shop.credit_debit_card') }}</span>
                                            <p class="text-sm text-gray-600">{{ __('shop.stripe_coming_soon') }}</p>
                                        </div>
                                    </label>
                                </div>
                                @error('payment_method')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="pt-6">
                                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:shadow-2xl hover:scale-105 transition-all duration-200 flex items-center justify-center gap-2">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ __('shop.complete_order') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl shadow-xl p-8 border-2 border-blue-100 sticky top-24">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('shop.order_summary') }}</h2>

                    <div class="space-y-4 mb-6">
                        @foreach($cartItems as $item)
                            <div class="flex gap-3 pb-4 border-b border-blue-200">
                                <div class="w-16 h-16 bg-white rounded-lg p-2 flex-shrink-0">
                                    <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="w-full h-full object-contain">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-gray-900 text-sm line-clamp-2">{{ $item->product->name }}</p>
                                    <p class="text-xs text-gray-600 mt-1">{{ __('shop.qty') }}: {{ $item->quantity }}</p>
                                    <p class="text-sm font-bold text-gray-900 mt-1">€{{ number_format($item->product->price * $item->quantity, 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

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
                            <span class="font-semibold">$0.00</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-gray-900">{{ __('shop.total') }}:</span>
                        <span class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                            €{{ number_format($total, 2) }}
                        </span>
                    </div>

                    <div class="mt-6 p-4 bg-white rounded-lg border border-blue-200">
                        <div class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-semibold text-gray-900">{{ __('shop.secure_checkout_badge') }}</p>
                                <p class="text-xs text-gray-600 mt-1">{{ __('shop.info_protected') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
