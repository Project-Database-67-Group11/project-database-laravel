@extends('layouts.app')

@section('content')
    <body class="bg-[#E3E7F1] min-h-screen text-base pb-20">
        <div class="w-full flex justify-center items-center font-[Kanit]">
            <div class="mt-[4.375rem] w-[80%] grid grid-cols-3 gap-6">
                <div class="bg-[#ffffff] rounded-lg col-span-2 shadow-lg p-5 space-y-4">
                    <header class="">
                        <h1 class="text-2xl font-semibold">My Cart</h1>
                    </header>
                    <div class="mt-10">
                        @foreach ($cartItems as $item)
                            <div class="flex h-32 gap-4">
                                <img src="{{ $item->product->product_img }}" alt="">
                                <div class="w-full h-full flex flex-col justify-between py-3">
                                    <p>{{ $item->product->product_name }}</p>
                                    <div class="flex justify-between">
                                        <div class="flex space-x-5">
                                            <p>จำนวน</p>
                                            <div class="flex">
                                                <button type="button" id="decrease_{{ $item->id }}"
                                                    class="border border-spacing-1 border-black aspect-square text-center">-</button>
                                                <p id="quantity_{{ $item->id }}"
                                                    class="border border-spacing-1 border-black aspect-square text-center">{{ $item->total_quantity }}</p>
                                                <button type="button" id="increase_{{ $item->id }}"
                                                    class="border border-spacing-1 border-black aspect-square text-center">+</button>
                                            </div>
                                        </div>  
                                        <p class="text-xl">฿{{ number_format($item->product->product_price * $item->total_quantity, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4 border-black border-t-2 rounded-full opacity-60">
                        @endforeach
                    </div>
                    <div class="flex justify-between">
                        <h1 class="text-xl">Total</h1>
                        <h1 class="text-xl">
                            ฿{{ number_format($cartItems->sum(fn($item) => $item->product->product_price * $item->total_quantity), 2) }}
                        </h1>
                    </div>                    
                    <div class="flex gap-2">
                        <a href="/store" class="bg-[#AF1515] px-2 py-2 text-center text-white rounded-lg w-1/2">Continue
                            Shopping</a>
                        <a href="/checkout"
                            class="bg-[#15AF5C] px-2 py-2 text-center text-white rounded-lg w-1/2">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
