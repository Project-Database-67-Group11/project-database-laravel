@extends('layouts.app')

@section('content')

<div class="w-full flex justify-center items-center">
    <!-- Main Content -->
    <div class="mt-[4.375rem] w-[80%]">
        <!-- Trending Items Section -->
        <section class="bg-[#ffffff] p-5 rounded-lg shadow-xl">
            <h2 class="text-2xl font-semibold mb-6">Trending Items</h2>
            <div class="grid grid-cols-4 gap-6">
                @foreach($products as $product)
                    <!-- Product Card -->
                    <div class="bg-gray-100 p-4 rounded-lg flex flex-col justify-between text-center">
                        <div>
                            <img src="{{ $product->product_img }}" alt="{{ $product->product_name }}"
                                class="h-40 w-full object-cover mb-4">
                            <p class="text-lg font-medium">{{ $product->product_name }}</p>
                            <p class="text-gray-500">
                                {{ \Illuminate\Support\Str::words($product->product_description, 15, '...') }}
                            </p>
                        </div>
                        <p class="text-xl font-bold mt-4">฿{{ (int) $product->product_price }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Divider -->
        <hr class="my-12 border-t-2 border-gray-400">

        <!-- Best Sell Items Section -->
        <section class="bg-[#ffffff] p-5 rounded-lg shadow-xl">
            <h2 class="text-2xl font-semibold mb-6">Best Sell Items</h2>
            <div class="grid grid-cols-4 gap-6">
                <!-- Product Card -->
                <div class="bg-gray-100 p-4 rounded-lg text-center">
                    <div class="h-40 bg-gray-300 mb-4"></div>
                    <p class="text-lg font-medium">TOA</p>
                    <p class="text-gray-500">duhee</p>
                    <p class="text-xl font-bold">฿5,000</p>
                </div>
                <!-- Repeat Product Cards as needed -->
                <div class="bg-gray-100 p-4 rounded-lg text-center">
                    <div class="h-40 bg-gray-300 mb-4"></div>
                    <p class="text-lg font-medium">TOA</p>
                    <p class="text-gray-500">duhee</p>
                    <p class="text-xl font-bold">฿5,000</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg text-center">
                    <div class="h-40 bg-gray-300 mb-4"></div>
                    <p class="text-lg font-medium">TOA</p>
                    <p class="text-gray-500">duhee</p>
                    <p class="text-xl font-bold">฿5,000</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg text-center">
                    <div class="h-40 bg-gray-300 mb-4"></div>
                    <p class="text-lg font-medium">TOA</p>
                    <p class="text-gray-500">duhee</p>
                    <p class="text-xl font-bold">฿5,000</p>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection