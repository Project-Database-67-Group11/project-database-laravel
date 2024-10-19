@extends('layouts.app')

@section('content')

    <body class="bg-[#E3E7F1] min-h-screen pb-20 font-[Kanit]">
        <div class="w-full flex justify-center items-center">
            <div class="mt-[4.375rem] w-[80%] grid grid-cols-3 gap-6">
                {{-- checkout section --}}
                <div class="bg-[#ffffff] rounded-lg col-span-2 shadow-lg p-5    ">
                    <header class="">
                        <h1 class="text-2xl font-semibold">Checkout</h1>
                        <p class="text-lg font-medium">My Address</p>
                    </header>
                    <div class="text-sm opacity-80">
                        <p>{{ $userInformation->first_name }} {{ $userInformation->last_name }} | (+66)
                            {{ substr($userInformation->phone_number, 0, 3) . '-' . substr($userInformation->phone_number, 3, 3) . '-' . substr($userInformation->phone_number, 6) }}
                        </p>
                        <p>{{ $userInformation->address }}</p>
                    </div>                    

                    <div class="mt-10">
                        @foreach ($cartItems as $item)
                            <div class="flex h-32 gap-4">
                                <img src="{{ $item->product->product_img }}" alt="" class="h-full object-cover">
                                <div class="w-full h-full flex flex-col justify-between py-3">
                                    <p>{{ $item->product->product_name }}</p>
                                    <div class="flex justify-between">
                                        <p class="">จำนวน: {{ $item->quantity }}</p>
                                        <p class="text-xl font-bold">
                                            ฿{{ number_format($item->product->product_price * $item->quantity, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4 border-black border-t-2 rounded-full opacity-60">
                        @endforeach
                    </div>
                </div>

                {{-- ฝั่งขวา --}}
                <div class="col-span-1 flex flex-col gap-6">
                    {{-- PAYMENT and SHIPPING --}}
                    <div class="w-full h-auto bg-[#ffffff] rounded-lg p-5 shadow-lg">
                        <h1 class="text-xl font-semibold mb-2">PAYMENT</h1>
                        <div>
                            <label>
                                <input type="radio" name="payment" value="cash" class="mr-2" checked> Cash on delivery
                            </label>
                        </div>
                        <div>
                            <label>
                                <input type="radio" name="payment" value="card" class="mr-2"> Card
                            </label>
                        </div>

                        <h1 class="text-xl font-semibold mt-4 mb-2">SHIPPING</h1>
                        <div>
                            <label>
                                <input type="radio" name="shipping" value="normal" class="mr-2" checked> Normal
                            </label>
                        </div>
                        <div>
                            <label>
                                <input type="radio" name="shipping" value="fast" class="mr-2"> Fast
                            </label>
                        </div>
                    </div>

                    {{-- ORDER SUMMARY --}}
                    <div class="w-full h-auto bg-[#ffffff] rounded-lg p-5 shadow-lg">
                        <h1 class="text-xl font-semibold mb-2">ORDER SUMMARY</h1>
                        <div class="flex justify-between">
                            <h1>Subtotal</h1>
                            <h1 class="font-bold">฿{{ number_format($subtotal, 2) }}</h1>
                        </div>
                        <div class="flex justify-between">
                            <h1>Taxes</h1>
                            <h1 class="font-bold">฿{{ number_format($taxes, 2) }}</h1>
                        </div>
                        <div class="flex justify-between">
                            <h1>Shipping Cost</h1>
                            <h1 class="font-bold">฿{{ number_format($shippingCost, 2) }}</h1>
                        </div>
                        <hr class="my-4 border-black border-t-2 rounded-full opacity-60">
                        <div class="flex justify-between">
                            <h1>Grand Total</h1>
                            <h1 class="font-bold">฿{{ number_format($grandTotal, 2) }}</h1>
                        </div>
                    </div>

                    <a href="/store" class="rounded-lg shadow-lg bg-[#15AF5C] text-[#ffffff] text-center py-2">Place
                        Order</a>
                </div>
            </div>
        </div>

    </body>
@endsection
