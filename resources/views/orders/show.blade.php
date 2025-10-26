@extends('layouts.shop')

@section('title', __('shop.order_details'))

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">{{ __('shop.order_number', ['number' => $order->id]) }}</h1>
                    <p class="text-gray-500">{{ __('shop.placed_on') }}: {{ $order->created_at->translatedFormat('j. F Y H:i') }}</p>
                </div>
                <span class="inline-block px-4 py-2 rounded-full
                    @if($order->status == 'delivered') bg-green-100 text-green-800
                    @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                    @elseif($order->status == 'shipped') bg-blue-100 text-blue-800
                    @else bg-yellow-100 text-yellow-800
                    @endif">
                    {{ __('shop.' . $order->status) }}
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div class="border rounded-lg p-4">
                    <h2 class="font-semibold text-gray-900 mb-3">{{ __('shop.shipping_address') }}</h2>
                    @if($order->shippingAddress)
                        <p class="text-gray-700">{{ $order->shippingAddress->address_line1 }}</p>
                        @if($order->shippingAddress->address_line2)
                            <p class="text-gray-700">{{ $order->shippingAddress->address_line2 }}</p>
                        @endif
                        <p class="text-gray-700">{{ $order->shippingAddress->city }}, {{ $order->shippingAddress->state }} {{ $order->shippingAddress->zip_code }}</p>
                        <p class="text-gray-700">{{ $order->shippingAddress->country }}</p>
                    @else
                        <p class="text-gray-500">{{ __('shop.no_address_available') }}</p>
                    @endif
                </div>

                <div class="border rounded-lg p-4">
                    <h2 class="font-semibold text-gray-900 mb-3">{{ __('shop.order_information') }}</h2>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">{{ __('shop.payment_method') }}:</span>
                            <span class="text-gray-900 font-medium">{{ __('shop.' . $order->payment_method) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">{{ __('shop.payment_status_label') }}:</span>
                            <span class="text-gray-900 font-medium">{{ __('shop.payment_' . $order->payment_status) }}</span>
                        </div>
                        @if($order->transaction_id)
                            <div class="flex justify-between">
                                <span class="text-gray-600">{{ __('shop.transaction_id') }}:</span>
                                <span class="text-gray-900 font-medium">{{ $order->transaction_id }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="border rounded-lg p-4 mb-6">
                <h2 class="font-semibold text-gray-900 mb-4">{{ __('shop.order_items') }}</h2>
                <div class="space-y-4">
                    @foreach($order->orderItems as $item)
                        <div class="flex items-center gap-4 border-b pb-4 last:border-0">
                            <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="w-20 h-20 object-cover rounded">
                            <div class="flex-1">
                                <h3 class="font-medium text-gray-900">{{ $item->product->name }}</h3>
                                <p class="text-sm text-gray-500">{{ __('shop.quantity') }}: {{ $item->quantity }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-gray-900">€{{ number_format($item->price * $item->quantity, 2) }}</p>
                                <p class="text-sm text-gray-500">€{{ number_format($item->price, 2) }} {{ __('shop.each') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="border-t pt-4">
                <div class="flex justify-between items-center">
                    <span class="text-xl font-bold text-gray-900">{{ __('shop.total_amount') }}:</span>
                    <span class="text-2xl font-bold text-indigo-600">€{{ number_format($order->total_amount, 2) }}</span>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('orders.index') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                    ← {{ __('shop.back_to_orders') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
