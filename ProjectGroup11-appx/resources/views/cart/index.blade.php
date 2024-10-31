@extends('layouts.app')

@section('content')

    <body class="min-h-screen text-base pb-20 ">
        <div class="w-full flex justify-center items-center">
            <div class="mt-[4.375rem] w-[80%] grid grid-cols-3 gap-6 mb-[4.375rem]">
                <div class="bg-[#ffffff] rounded-lg col-span-2 shadow-lg p-5 space-y-4">
                    <header class="flex items-center">
                        <h1 class="text-2xl font-semibold">
                            My Cart
                        </h1>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" class="ml-2 fill-current text-gray-700"
                            viewBox="0 0 576 512">
                            <path
                                d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                        </svg>
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
                                                <div class="flex items-center">
                                                    <!-- ฟอร์มลดจำนวนสินค้า -->
                                                    <form
                                                        action="{{ route('cart.update', ['product_id' => $item->product_id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" name="action" value="decrease">
                                                        <button type="submit"
                                                            class="decrease border border-black w-6 h-6 flex items-center justify-center">-</button>
                                                    </form>

                                                    <!-- แสดงจำนวนสินค้า -->
                                                    <p id="quantity_{{ $item->product_id }}"
                                                        class="border border-black w-9 h-6 flex items-center justify-center">
                                                        {{ $item->total_quantity }}
                                                    </p>

                                                    <!-- ฟอร์มเพิ่มจำนวนสินค้า -->
                                                    <form
                                                        action="{{ route('cart.update', ['product_id' => $item->product_id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" name="action" value="increase">
                                                        <button type="submit"
                                                            class="increase border border-black w-6 h-6 flex items-center justify-center">+</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-xl font-bold">
                                            ฿{{ number_format($item->product->product_price * $item->total_quantity, 2) }}
                                        </p>
                                    </div>

                                    <!-- ปุ่ม Delete -->
                                    <div class="flex justify-end mt-2">
                                        <form action="{{ route('cart.removed') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="cart_id" value="{{ $item->cart_id }}">
                                            <button type="submit" class="text-red-500">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4 border-black border-t-2 rounded-full opacity-60">
                        @endforeach


                    </div>
                    <div class="flex justify-between">
                        <h1 class="text-xl">Total</h1>
                        <h1 class="text-xl font-bold">
                            ฿{{ number_format($cartItems->sum(fn($item) => $item->product->product_price * $item->total_quantity), 2) }}
                        </h1>
                    </div>
                    <div class="flex gap-2">
                        <a href="/store" class="bg-[#AF1515] hover:bg-red-600 px-2 py-2 text-center text-white rounded-lg w-1/2">Continue
                            Shopping</a>
                        @if ($cartItems->isEmpty())
                            <button class="bg-gray-400 px-2 py-2 text-center text-white rounded-lg w-1/2 cursor-not-allowed"
                                disabled>Checkout</button>
                        @else
                            <a href="/checkout"
                                class="bg-[#15AF5C] hover:bg-green-600 px-2 py-2 text-center text-white rounded-lg w-1/2">Checkout</a>
                        @endif
                    </div>
                </div>

                {{-- ฝั่งขวา --}}
                <div class="col-span-1 flex flex-col gap-6">
                    <div class="w-full h-auto bg-[#ffffff] rounded-lg p-5 shadow-lg">
                        <h1 class="text-xl font-semibold mb-2">You May Interest</h1>
                        <div class="mt-10">
                            @foreach ($randomProducts as $product)
                                <div class="flex gap-4 items-start mb-6 hover:bg-gray-200 hover:scale-105 rounded-md transition duration-200">
                                    <!-- ลิงก์ไปยังหน้ารายละเอียดสินค้า -->
                                    <a href="{{ url('product', $product->product_id) }}" class="flex-shrink-0 self-center">
                                        <img src="{{ $product->product_img }}" alt="{{ $product->product_name }}"
                                            class="h-32 w-32 object-cover">
                                    </a>
                                    <div class="w-full h-full flex flex-col justify-between py-3 pr-4">
                                        <!-- ลิงก์ไปยังหน้ารายละเอียดสินค้า -->
                                        <a href="{{ url('product', $product->product_id) }}"
                                            class="text-lg font-semibold hover:no-underline">
                                            {{ $product->product_name }}
                                        </a>
                                        <p class="text-sm line-clamp-2 opacity-50 mt-1">{{ $product->product_description }}
                                        </p>
                                        <div class="flex items-center justify-between mt-2">
                                            <p class="text-xl font-bold">฿{{ number_format($product->product_price, 2) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4 border-black border-t-2 rounded-full opacity-60">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </body>
@endsection
