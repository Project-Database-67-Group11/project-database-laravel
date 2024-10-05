@extends('layouts.app')

@section('content')
    <div class="w-full flex justify-center items-center">
        <div class="mt-[4.375rem] w-[80%] grid grid-cols-3 gap-6">
            <div class="bg-white shadow-md p-10 rounded-xl aspect-square">
                <img src="{{ $product->product_img }}" alt="{{ $product->product_name }}"
                    class="rounded-xl object-cover object-center h-full w-full">
            </div>
            <div class="bg-white shadow-md col-span-2 rounded-xl p-10 space-y-10">
                <h1 class="text-3xl font-bold">{{ $product->product_name }}</h1>
                <p class="text-md opacity-70">{{ $product->product_description }}</p>
                <p class="text-4xl font-bold text-blue-500">฿{{ number_format($product->product_price, 2) }}</p>

                <form action="{{ route('cart.add') }}" method="POST" class="space-y-10">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                    <div>
                        <p class="opacity-70 text-sm">สินค้าเหลือ: {{ $product->product_quantity }} จำนวน</p>
                        <div class="flex items-center">
                            <label for="quantity" class="block text-lg font-medium mr-5">จำนวน:</label>
                            <input type="number" id="quantity" name="quantity"
                                class="w-20 mt-2 border border-gray-300 rounded-md p-2" min="1"
                                max="{{ $product->product_quantity }}" value="1">
                        </div>
                    </div>

                    <button type="submit"
                        class="bottom-0 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let quantityInput = document.getElementById('quantity');
                let maxQuantity = parseInt(quantityInput.max);

                quantityInput.addEventListener('input', function() {
                    let value = parseInt(this.value);

                    if (value > maxQuantity) {
                        this.value = maxQuantity;
                    }

                    if (value < 1 || isNaN(value)) {
                        this.value = 1;
                    }
                });

                quantityInput.addEventListener('paste', function(event) {
                    event.preventDefault();
                });
            });
        </script>
    </div>
@endsection
