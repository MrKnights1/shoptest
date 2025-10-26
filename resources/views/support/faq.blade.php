@extends('layouts.shop')

@section('title', __('shop.faqs'))

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ __('shop.faq_title') }}</h1>
            <p class="text-gray-600">{{ __('shop.faq_subtitle') }}</p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="border-b border-gray-200 pb-4" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between text-left group">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-cyan-600 transition pr-4">
                            {{ __('shop.faq_q1') }}
                        </h3>
                        <svg class="w-6 h-6 text-cyan-500 flex-shrink-0 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="mt-3 text-gray-600 leading-relaxed"
                         style="display: none;">
                        {{ __('shop.faq_a1') }}
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="border-b border-gray-200 pb-4" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between text-left group">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-cyan-600 transition pr-4">
                            {{ __('shop.faq_q2') }}
                        </h3>
                        <svg class="w-6 h-6 text-cyan-500 flex-shrink-0 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="mt-3 text-gray-600 leading-relaxed"
                         style="display: none;">
                        {{ __('shop.faq_a2') }}
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="border-b border-gray-200 pb-4" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between text-left group">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-cyan-600 transition pr-4">
                            {{ __('shop.faq_q3') }}
                        </h3>
                        <svg class="w-6 h-6 text-cyan-500 flex-shrink-0 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="mt-3 text-gray-600 leading-relaxed"
                         style="display: none;">
                        {{ __('shop.faq_a3') }}
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="border-b border-gray-200 pb-4" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between text-left group">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-cyan-600 transition pr-4">
                            {{ __('shop.faq_q4') }}
                        </h3>
                        <svg class="w-6 h-6 text-cyan-500 flex-shrink-0 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="mt-3 text-gray-600 leading-relaxed"
                         style="display: none;">
                        {{ __('shop.faq_a4') }}
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="border-b border-gray-200 pb-4" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between text-left group">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-cyan-600 transition pr-4">
                            {{ __('shop.faq_q5') }}
                        </h3>
                        <svg class="w-6 h-6 text-cyan-500 flex-shrink-0 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="mt-3 text-gray-600 leading-relaxed"
                         style="display: none;">
                        {{ __('shop.faq_a5') }}
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="pb-4" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between text-left group">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-cyan-600 transition pr-4">
                            {{ __('shop.faq_q6') }}
                        </h3>
                        <svg class="w-6 h-6 text-cyan-500 flex-shrink-0 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="mt-3 text-gray-600 leading-relaxed"
                         style="display: none;">
                        {{ __('shop.faq_a6') }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Still have questions? -->
        <div class="mt-8 bg-gradient-to-r from-cyan-50 to-teal-50 rounded-2xl shadow-xl p-8 border-2 border-cyan-100 text-center">
            <h2 class="text-2xl font-bold text-gray-900 mb-3">{{ __('shop.contact_subtitle') }}</h2>
            <p class="text-gray-600 mb-6">{{ __('shop.contact_email_value') }} • {{ __('shop.contact_phone_value') }}</p>
            <a href="{{ route('contact') }}" class="inline-block bg-gradient-to-r from-cyan-500 to-cyan-600 text-white px-8 py-3 rounded-lg font-bold hover:shadow-xl hover:scale-105 transition-all duration-200">
                {{ __('shop.contact_us') }}
            </a>
        </div>
    </div>
</div>
@endsection
