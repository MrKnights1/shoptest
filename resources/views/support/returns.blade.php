@extends('layouts.shop')

@section('title', __('shop.returns'))

@section('content')
<div class="py-12">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ __('shop.returns_title') }}</h1>
            <p class="text-gray-600">{{ __('shop.returns_subtitle') }}</p>
        </div>

        <!-- Return Period -->
        <div class="bg-gradient-to-r from-cyan-600 to-teal-700 rounded-2xl shadow-2xl p-8 mb-8 text-white">
            <div class="flex items-center gap-6">
                <div class="flex-shrink-0 w-20 h-20 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-3xl font-bold mb-2">{{ __('shop.returns_period') }}</h2>
                    <p class="text-cyan-50 text-lg">{{ __('shop.returns_period_desc') }}</p>
                </div>
            </div>
        </div>

        <!-- Return Conditions -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('shop.returns_condition') }}</h2>
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-cyan-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <p class="text-gray-700 leading-relaxed pt-1">{{ __('shop.returns_condition_1') }}</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-cyan-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <p class="text-gray-700 leading-relaxed pt-1">{{ __('shop.returns_condition_2') }}</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-cyan-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <p class="text-gray-700 leading-relaxed pt-1">{{ __('shop.returns_condition_3') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- How to Return -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('shop.returns_how') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Step 1 -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 hover:border-cyan-500 transition-all relative">
                    <div class="absolute -top-4 -left-4 w-12 h-12 bg-gradient-to-br from-cyan-500 to-teal-500 rounded-xl flex items-center justify-center shadow-lg">
                        <span class="text-2xl font-bold text-white">1</span>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __('shop.returns_step_1') }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ __('shop.returns_step_1_desc') }}</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 hover:border-cyan-500 transition-all relative">
                    <div class="absolute -top-4 -left-4 w-12 h-12 bg-gradient-to-br from-cyan-500 to-teal-500 rounded-xl flex items-center justify-center shadow-lg">
                        <span class="text-2xl font-bold text-white">2</span>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __('shop.returns_step_2') }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ __('shop.returns_step_2_desc') }}</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 hover:border-cyan-500 transition-all relative">
                    <div class="absolute -top-4 -left-4 w-12 h-12 bg-gradient-to-br from-cyan-500 to-teal-500 rounded-xl flex items-center justify-center shadow-lg">
                        <span class="text-2xl font-bold text-white">3</span>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __('shop.returns_step_3') }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ __('shop.returns_step_3_desc') }}</p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 hover:border-cyan-500 transition-all relative">
                    <div class="absolute -top-4 -left-4 w-12 h-12 bg-gradient-to-br from-cyan-500 to-teal-500 rounded-xl flex items-center justify-center shadow-lg">
                        <span class="text-2xl font-bold text-white">4</span>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __('shop.returns_step_4') }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ __('shop.returns_step_4_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Refund & Exchange -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <!-- Refund -->
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl shadow-xl p-8 border-2 border-green-200">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-16 h-16 bg-green-500 rounded-xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">{{ __('shop.returns_refund') }}</h3>
                </div>
                <p class="text-gray-700 leading-relaxed">{{ __('shop.returns_refund_desc') }}</p>
            </div>

            <!-- Exchange -->
            <div class="bg-gradient-to-br from-cyan-50 to-teal-50 rounded-2xl shadow-xl p-8 border-2 border-cyan-200">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-16 h-16 bg-cyan-500 rounded-xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">{{ __('shop.returns_exchange') }}</h3>
                </div>
                <p class="text-gray-700 leading-relaxed">{{ __('shop.returns_exchange_desc') }}</p>
            </div>
        </div>

        <!-- Contact CTA -->
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100 text-center">
            <div class="max-w-2xl mx-auto">
                <h2 class="text-2xl font-bold text-gray-900 mb-3">Need help with a return?</h2>
                <p class="text-gray-600 mb-6">Our customer service team is ready to assist you with your return or exchange.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="mailto:{{ __('shop.contact_email_value') }}" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-cyan-500 to-cyan-600 text-white px-8 py-3 rounded-lg font-bold hover:shadow-xl hover:scale-105 transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        {{ __('shop.contact_email_value') }}
                    </a>
                    <a href="tel:{{ str_replace(' ', '', __('shop.contact_phone_value')) }}" class="inline-flex items-center justify-center gap-2 bg-white text-gray-700 px-8 py-3 rounded-lg font-bold hover:bg-gray-50 transition border-2 border-gray-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        {{ __('shop.contact_phone_value') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
