@extends('layouts.app')

@section('content')
    <div class="w-full flex justify-center items-center">
        <div class="mt-16 w-[80%] bg-[#ffffff] rounded-lg shadow-lg">
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 p-4">
                    <h1 class="text-3xl font-bold mb-4">{{ $product->product_name }}</h1>
                    <img src="{{ $product->product_img }}" alt="{{ $product->product_name }}" class="w-[20rem] h-auto rounded-lg shadow-md">
                </div>
                <div class="w-full md:w-1/2 p-4">
                    <h2 class="text-2xl font-semibold mb-4">Product Details</h2>
                    <p class="text-lg"><strong>Price:</strong> {{ number_format($product->product_price, 2) }} THB</p>
                    <p class="text-lg"><strong>Available Quantity:</strong> {{ $product->product_quantity }}</p>
                    <p class="text-lg"><strong>Type:</strong> {{ $product->product_type }}</p>
                    <p class="text-md text-gray-700 mt-4">{{ $product->product_description }}</p>

                    {{-- <form action="{{ route('cart.add', $product->product_id) }}" method="POST"> --}}
                    <form action="" method="POST">
                        @csrf
                        <div class="mt-6">
                            <label for="quantity" class="block text-lg font-medium text-gray-700">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" class="w-20 mt-2 border border-gray-300 rounded-md p-2"
                                min="1" max="{{ $product->product_quantity }}" value="1">
                        </div>

                        <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
