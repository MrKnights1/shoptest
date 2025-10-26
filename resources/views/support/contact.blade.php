@extends('layouts.shop')

@section('title', __('shop.contact_us'))

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ __('shop.contact_title') }}</h1>
            <p class="text-gray-600">{{ __('shop.contact_subtitle') }}</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Contact Form -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('shop.contact_form_title') }}</h2>
                <form class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">{{ __('shop.contact_name') }}</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition" placeholder="John Doe" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">{{ __('shop.contact_email') }}</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition" placeholder="john@example.com" required>
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">{{ __('shop.contact_subject') }}</label>
                        <input type="text" id="subject" name="subject" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition" placeholder="{{ __('shop.contact_subject') }}" required>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">{{ __('shop.contact_message') }}</label>
                        <textarea id="message" name="message" rows="6" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition resize-none" placeholder="{{ __('shop.contact_message') }}" required></textarea>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-cyan-500 to-cyan-600 text-white px-6 py-4 rounded-xl font-bold text-lg hover:shadow-2xl hover:scale-105 transition-all duration-200">
                        {{ __('shop.contact_send') }}
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="space-y-6">
                <div class="bg-gradient-to-br from-cyan-50 to-teal-50 rounded-2xl shadow-xl p-8 border-2 border-cyan-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('shop.contact_info') }}</h2>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-cyan-500 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">{{ __('shop.contact_address') }}</h3>
                                <p class="text-gray-600">{{ __('shop.contact_address_value') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-cyan-500 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">{{ __('shop.contact_phone') }}</h3>
                                <p class="text-gray-600">{{ __('shop.contact_phone_value') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-cyan-500 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">{{ __('shop.contact_email') }}</h3>
                                <p class="text-gray-600">{{ __('shop.contact_email_value') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-cyan-500 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">{{ __('shop.contact_hours') }}</h3>
                                <p class="text-gray-600">{{ __('shop.contact_hours_value') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d65522.65049238462!2d23.97253433730149!3d59.12264883930438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e0!4m0!4m3!3m2!1d59.1141905!2d23.9325372!5e0!3m2!1set!2see!4v1761474156740!5m2!1set!2see" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
