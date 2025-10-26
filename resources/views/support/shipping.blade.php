@extends('layouts.shop')

@section('title', __('shop.shipping_info'))

@section('content')
<div class="py-12">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ __('shop.shipping_title') }}</h1>
            <p class="text-gray-600">{{ __('shop.shipping_subtitle') }}</p>
        </div>

        <!-- Shipping Methods -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('shop.shipping_methods') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Standard Delivery -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 hover:border-cyan-500 transition-all">
                    <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-teal-500 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('shop.shipping_standard') }}</h3>
                    <p class="text-gray-600 mb-4">{{ __('shop.shipping_standard_desc') }}</p>
                    <p class="text-lg font-bold text-cyan-600">{{ __('shop.shipping_standard_price') }}</p>
                </div>

                <!-- Express Delivery -->
                <div class="bg-gradient-to-br from-cyan-50 to-teal-50 rounded-2xl shadow-xl p-6 border-2 border-cyan-500 relative overflow-hidden">
                    <div class="absolute top-0 right-0 bg-cyan-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">
                        {{ __('shop.popular') }}
                    </div>
                    <div class="w-16 h-16 bg-gradient-to-br from-cyan-600 to-teal-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('shop.shipping_express') }}</h3>
                    <p class="text-gray-600 mb-4">{{ __('shop.shipping_express_desc') }}</p>
                    <p class="text-lg font-bold text-cyan-600">{{ __('shop.shipping_express_price') }}</p>
                </div>

                <!-- Store Pickup -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 hover:border-cyan-500 transition-all">
                    <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-teal-500 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('shop.shipping_pickup') }}</h3>
                    <p class="text-gray-600 mb-4">{{ __('shop.shipping_pickup_desc') }}</p>
                    <p class="text-lg font-bold text-green-600">{{ __('shop.shipping_pickup_price') }}</p>
                </div>
            </div>
        </div>

        <!-- Shipping Zones -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('shop.shipping_zones') }}</h2>
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div class="divide-y divide-gray-200">
                    <!-- Estonia -->
                    <div class="p-6 hover:bg-gray-50 transition">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-cyan-100 rounded-lg flex items-center justify-center">
                                <img src="https://flagcdn.com/w40/ee.png" alt="Estonia" class="w-8 h-6 rounded shadow-sm">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-gray-900 mb-1">{{ __('shop.shipping_estonia') }}</h3>
                                <p class="text-gray-600">{{ __('shop.shipping_estonia_desc') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Latvia & Lithuania -->
                    <div class="p-6 hover:bg-gray-50 transition">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-cyan-100 rounded-lg flex items-center justify-center">
                                <div class="flex gap-1">
                                    <img src="https://flagcdn.com/w20/lv.png" alt="Latvia" class="w-4 h-3 rounded shadow-sm">
                                    <img src="https://flagcdn.com/w20/lt.png" alt="Lithuania" class="w-4 h-3 rounded shadow-sm">
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-gray-900 mb-1">{{ __('shop.shipping_baltic') }}</h3>
                                <p class="text-gray-600">{{ __('shop.shipping_baltic_desc') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Packaging -->
        <div class="bg-gradient-to-br from-cyan-50 to-teal-50 rounded-2xl shadow-xl p-8 border-2 border-cyan-100">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-16 h-16 bg-cyan-500 rounded-xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ __('shop.shipping_packaging') }}</h3>
                    <p class="text-gray-600 leading-relaxed">{{ __('shop.shipping_packaging_desc') }}</p>
                </div>
            </div>
        </div>

        <!-- Additional Info -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 text-center">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h4 class="font-bold text-gray-900 mb-1">{{ __('shop.free') }} {{ __('shop.shipping') }}</h4>
                <p class="text-sm text-gray-600">{{ __('shop.orders_over_50') }}</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 text-center">
                <div class="w-12 h-12 bg-cyan-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h4 class="font-bold text-gray-900 mb-1">{{ __('shop.fast_processing') }}</h4>
                <p class="text-sm text-gray-600">{{ __('shop.orders_shipped_same_day') }}</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 text-center">
                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                </div>
                <h4 class="font-bold text-gray-900 mb-1">{{ __('shop.order_tracking') }}</h4>
                <p class="text-sm text-gray-600">{{ __('shop.track_order_anytime') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
