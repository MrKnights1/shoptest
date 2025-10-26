@extends('layouts.shop')

@section('title', 'Products')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ __('shop.all_products') }}</h1>

            <form method="GET" action="{{ route('products.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('shop.search') }}</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('shop.search_products') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('shop.category') }}</label>
                    <select name="category" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">{{ __('shop.all_categories') }}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ str_starts_with($category->name, 'category.') ? __('shop.' . $category->name) : $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                        {{ __('shop.filter') }}
                    </button>
                </div>
            </form>
        </div>

        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-6">
                @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-blue-500 group overflow-hidden">
                        <a href="{{ route('products.show', $product->id) }}">
                            <div class="relative overflow-hidden bg-gray-50">
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-contain p-4 group-hover:scale-105 transition-transform duration-300">
                                @if($product->stock_quantity <= 10 && $product->stock_quantity > 0)
                                    <span class="absolute top-2 right-2 bg-orange-500 text-white text-xs px-2 py-1 rounded-full">
                                        Only {{ $product->stock_quantity }} left!
                                    </span>
                                @endif
                            </div>
                            <div class="p-4">
                                <p class="text-xs text-blue-600 font-semibold mb-1 uppercase">{{ $product->category ? (str_starts_with($product->category->name, 'category.') ? __('shop.' . $product->category->name) : $product->category->name) : 'Tech' }}</p>
                                <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2 min-h-[2.5rem]">{{ $product->translated_name }}</h3>
                                <div class="flex justify-between items-center mt-3">
                                    <span class="text-xl font-bold text-gray-900">€{{ number_format($product->price, 2) }}</span>
                                    @if($product->stock_quantity > 0)
                                        <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full font-medium">{{ __('shop.in_stock') }}</span>
                                    @else
                                        <span class="text-xs bg-red-100 text-red-700 px-2 py-1 rounded-full font-medium">{{ __('shop.out_of_stock') }}</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="bg-white p-4 rounded-lg shadow">
                {{ $products->links() }}
            </div>
        @else
            <div class="bg-white p-8 rounded-lg shadow text-center">
                <p class="text-gray-500">No products found.</p>
            </div>
        @endif
    </div>
</div>
@endsection
