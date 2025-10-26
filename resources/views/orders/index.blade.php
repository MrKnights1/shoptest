@extends('layouts.shop')

@section('title', __('shop.my_orders'))

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ __('shop.my_orders') }}</h1>

            @if($orders->count() > 0)
                <div class="space-y-4">
                    @foreach($orders as $order)
                        <div class="border rounded-lg p-4 hover:shadow-md transition">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="font-semibold text-gray-900">{{ __('shop.order_number', ['number' => $order->id]) }}</h3>
                                    <p class="text-sm text-gray-500">{{ $order->created_at->translatedFormat('j. F Y H:i') }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-lg font-bold text-indigo-600">€{{ number_format($order->total_amount, 2) }}</p>
                                    <span class="inline-block px-2 py-1 text-xs rounded-full
                                        @if($order->status == 'delivered') bg-green-100 text-green-800
                                        @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                                        @elseif($order->status == 'shipped') bg-blue-100 text-blue-800
                                        @else bg-yellow-100 text-yellow-800
                                        @endif">
                                        {{ __('shop.' . $order->status) }}
                                    </span>
                                </div>
                            </div>

                            <div class="space-y-2 mb-4">
                                @foreach($order->orderItems as $item)
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-700">{{ $item->product->name }} x {{ $item->quantity }}</span>
                                        <span class="text-gray-900 font-medium">€{{ number_format($item->price * $item->quantity, 2) }}</span>
                                    </div>
                                @endforeach
                            </div>

                            <a href="{{ route('orders.show', $order->id) }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                                {{ __('shop.view_details') }} →
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $orders->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500 mb-4">{{ __('shop.no_orders_yet') }}</p>
                    <a href="{{ route('products.index') }}" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-md hover:bg-indigo-700">
                        {{ __('shop.start_shopping') }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
