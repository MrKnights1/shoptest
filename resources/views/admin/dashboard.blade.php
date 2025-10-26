@extends('layouts.admin')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ __('shop.dashboard') }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-500 text-sm mb-1">{{ __('shop.total_orders') }}</div>
                <div class="text-3xl font-bold text-gray-900">{{ $totalOrders }}</div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-500 text-sm mb-1">{{ __('shop.total_revenue') }}</div>
                <div class="text-3xl font-bold text-green-600">€{{ number_format($totalRevenue, 2) }}</div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-500 text-sm mb-1">{{ __('shop.total_products') }}</div>
                <div class="text-3xl font-bold text-gray-900">{{ $totalProducts }}</div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-500 text-sm mb-1">{{ __('shop.total_users') }}</div>
                <div class="text-3xl font-bold text-gray-900">{{ $totalUsers }}</div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">{{ __('shop.recent_orders') }}</h2>
                @if($recentOrders->count() > 0)
                    <div class="space-y-3">
                        @foreach($recentOrders as $order)
                            <div class="flex justify-between items-center border-b pb-3">
                                <div>
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="font-medium text-indigo-600 hover:text-indigo-800">
                                        {{ __('shop.order_number', ['number' => $order->id]) }}
                                    </a>
                                    <p class="text-sm text-gray-500">{{ $order->user->name }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900">€{{ number_format($order->total_amount, 2) }}</p>
                                    <span class="inline-block px-2 py-1 text-xs rounded-full
                                        @if($order->status == 'delivered') bg-green-100 text-green-800
                                        @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                                        @else bg-yellow-100 text-yellow-800
                                        @endif">
                                        {{ __('shop.'.$order->status) }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">{{ __('shop.no_recent_orders') }}</p>
                @endif
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">{{ __('shop.low_stock_products') }}</h2>
                @if($lowStockProducts->count() > 0)
                    <div class="space-y-3">
                        @foreach($lowStockProducts as $product)
                            <div class="flex justify-between items-center border-b pb-3">
                                <div>
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="font-medium text-indigo-600 hover:text-indigo-800">
                                        {{ $product->name }}
                                    </a>
                                    <p class="text-sm text-gray-500">{{ $product->category ? (str_starts_with($product->category->name, 'category.') ? __('shop.' . $product->category->name) : $product->category->name) : __('shop.no_category') }}</p>
                                </div>
                                <span class="inline-block px-3 py-1 text-sm rounded-full bg-red-100 text-red-800">
                                    {{ __('shop.stock_left', ['count' => $product->stock_quantity]) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">{{ __('shop.no_low_stock_products') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
