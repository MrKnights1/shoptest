@extends('layouts.admin')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">{{ __('shop.order') }} #{{ $order->id }}</h1>
                    <p class="text-gray-500">{{ $order->created_at->translatedFormat('j. F Y H:i') }}</p>
                </div>

                <form method="POST" action="{{ route('admin.orders.update', $order->id) }}" class="flex gap-4">
                    @csrf
                    @method('PATCH')

                    <select name="status" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>{{ __('shop.pending') }}</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>{{ __('shop.processing') }}</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>{{ __('shop.shipped') }}</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>{{ __('shop.delivered') }}</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>{{ __('shop.cancelled') }}</option>
                    </select>

                    <select name="payment_status" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>{{ __('shop.payment_pending') }}</option>
                        <option value="completed" {{ $order->payment_status == 'completed' ? 'selected' : '' }}>{{ __('shop.payment_completed') }}</option>
                        <option value="failed" {{ $order->payment_status == 'failed' ? 'selected' : '' }}>{{ __('shop.payment_failed') }}</option>
                        <option value="refunded" {{ $order->payment_status == 'refunded' ? 'selected' : '' }}>{{ __('shop.payment_refunded') }}</option>
                    </select>

                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                        {{ __('shop.update') }}
                    </button>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div class="border rounded-lg p-4">
                    <h2 class="font-semibold text-gray-900 mb-3">{{ __('shop.customer_information') }}</h2>
                    <p class="text-gray-700"><strong>{{ __('shop.name') }}:</strong> {{ $order->user->name }}</p>
                    <p class="text-gray-700"><strong>{{ __('shop.email') }}:</strong> {{ $order->user->email }}</p>
                    @if($order->user->phone)
                        <p class="text-gray-700"><strong>{{ __('shop.phone') }}:</strong> {{ $order->user->phone }}</p>
                    @endif
                </div>

                <div class="border rounded-lg p-4">
                    <h2 class="font-semibold text-gray-900 mb-3">{{ __('shop.shipping_address') }}</h2>
                    @if($order->shippingAddress)
                        <p class="text-gray-700">{{ $order->shippingAddress->address_line1 }}</p>
                        @if($order->shippingAddress->address_line2)
                            <p class="text-gray-700">{{ $order->shippingAddress->address_line2 }}</p>
                        @endif
                        <p class="text-gray-700">{{ $order->shippingAddress->city }}, {{ $order->shippingAddress->state }} {{ $order->shippingAddress->zip_code }}</p>
                        <p class="text-gray-700">{{ $order->shippingAddress->country }}</p>
                    @endif
                </div>
            </div>

            <div class="border rounded-lg p-4 mb-6">
                <h2 class="font-semibold text-gray-900 mb-4">{{ __('shop.order_items') }}</h2>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('shop.product') }}</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('shop.price') }}</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('shop.quantity') }}</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('shop.subtotal') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-900">{{ $item->product->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900">€{{ number_format($item->price, 2) }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900">{{ $item->quantity }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 font-semibold">€{{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="border-t pt-4">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-xl font-bold text-gray-900">{{ __('shop.total_amount') }}:</span>
                    <span class="text-2xl font-bold text-indigo-600">€{{ number_format($order->total_amount, 2) }}</span>
                </div>

                <div class="text-sm text-gray-600">
                    <p><strong>{{ __('shop.payment_method') }}:</strong> {{ __('shop.' . $order->payment_method) }}</p>
                    <p><strong>{{ __('shop.payment_status') }}:</strong> {{ __('shop.payment_' . $order->payment_status) }}</p>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('admin.orders.index') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                    ← {{ __('shop.back_to_orders') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
