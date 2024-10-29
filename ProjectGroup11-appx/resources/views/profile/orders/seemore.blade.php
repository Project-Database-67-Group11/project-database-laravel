@extends('layouts.app')

@section('content')
    <div class="w-full flex justify-center items-center">
        <div class="mt-[4.375rem] mb-5 w-[80%] grid grid-cols-4 gap-6">
            <!-- Sidebar with account information -->
            <div>
                <!-- Account Information Sidebar -->
                <div class="bg-white shadow-md rounded-xl p-10 flex flex-row gap-4">
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 576 512">
                            <path
                                d="M0 96l576 0c0-35.3-28.7-64-64-64L64 32C28.7 32 0 60.7 0 96zm0 32L0 416c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-288L0 128zM64 405.3c0-29.5 23.9-53.3 53.3-53.3l117.3 0c29.5 0 53.3 23.9 53.3 53.3c0 5.9-4.8 10.7-10.7 10.7L74.7 416c-5.9 0-10.7-4.8-10.7-10.7zM176 192a64 64 0 1 1 0 128 64 64 0 1 1 0-128zm176 16c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16z" />
                        </svg>
                    </div>
                    <div class="flex items-center justify-center">
                        {{ Auth::user()->name }}
                    </div>
                </div>
                <hr class="my-4 border-black border-t-2 rounded-full opacity-60">
                <div class="bg-white shadow-md rounded-xl px-10 py-6 flex flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 576 512">
                        <path
                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                    </svg>
                    <h1 class="pl-4">บัญชีของฉัน</h1>
                </div>
                <div class="space-y-4 ml-10 my-4">
                    <a href="/profile" class="">
                        <h1>ข้อมูลของฉัน</h1>
                    </a>
                    <a href="{{ route('profile.address') }}" class="">
                        <h1 class="my-4">ที่อยู่</h1>
                    </a>
                    <a href="/profile/resetpassword" class="">
                        <h1>เปลี่ยนรหัสผ่าน</h1>
                    </a>
                </div>

                <div class="bg-white shadow-md rounded-xl px-10 py-6 flex flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 384 512">
                        <path
                            d="M192 0c-41.8 0-77.4 26.7-90.5 64L64 64C28.7 64 0 92.7 0 128L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64l-37.5 0C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM72 272a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm104-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zM72 368a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm88 0c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16z" />
                    </svg>
                    <h1 class="pl-4">การซื้อของฉัน</h1>
                </div>
                <div class="space-y-6 ml-10 my-4 flex flex-col gap-[1px]">
                    <a href="{{ route('profile.Order_index') }}" class="">
                        <h1>ทั้งหมด</h1>
                    </a>
                    <a href="{{ route('profile.Order_pending') }}" class="">
                        <h1>กำลังดำเนินการ</h1>
                    </a>
                    <a href="{{ route('profile.Order_completed') }}" class="">
                        <h1>สำเร็จการสั่งซื้อ</h1>
                    </a>
                    <a href="{{ route('profile.Order_cancelled') }}" class="">
                        <h1>สินค้าที่ยกเลิก</h1>
                    </a>
                </div>
            </div>

            <div class="bg-white shadow-md col-span-3 rounded-xl p-10 space-y-10">
                <table class="min-w-full">
                    <tbody class="bg-white">
                        @if ($orders->isEmpty())
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center">ไม่มีคำสั่งซื้อ</td>
                            </tr>
                        @else
                            @php $previousDate = null; @endphp
                            @foreach ($orders as $order)
                                <!-- Display date header only if it’s a new date -->
                                @if ($previousDate !== $order->created_at->format('d/m/Y'))
                                    <div class="space-y-2">
                                        @if ($order->status == 'pending')
                                            <div class="mb-5 flex items-end justify-end gap-2">
                                                <!-- For Cancel Button -->
                                                <form
                                                    action="{{ route('profile.orders.seemore.update', ['id' => $order->order_id]) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    <input type="hidden" name="action" value="cancel">
                                                    <button type="submit"
                                                        class="bg-gray-400 px-3 rounded-md text-white">ยกเลิก</button>
                                                </form>

                                                <!-- For Complete Button -->
                                                <form
                                                    action="{{ route('profile.orders.seemore.update', ['id' => $order->order_id]) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    <input type="hidden" name="action" value="complete">
                                                    <button type="submit"
                                                        class="bg-green-600 px-3 py-1 rounded-xl text-white">ยืนยันคำสั่งซื้อ</button>
                                                </form>
                                            </div>
                                        @endif


                                        <p class="text-right font-bold">{{ $order->created_at->format('d-m-Y') }}</p>
                                        <div class="opacity-60 flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="10.5"
                                                viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path
                                                    d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                            </svg>
                                            <p>
                                                {{ $order->order_addr }}
                                            </p>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <p>วิธีการจัดส่ง</p>
                                            <p class="font-bold">
                                                {{ $order->shipping }}
                                            </p>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <p>การชำระเงิน</p>
                                            <p class="font-bold">
                                                {{ $order->payment }}
                                            </p>
                                        </div>
                                        <p>สถานะ
                                            @if ($order->status == 'pending')
                                                <span class="bg-blue-100 text-blue-700 px-2 rounded-full ">pending</span>
                                            @elseif ($order->status == 'completed')
                                                <span class="bg-green-100 text-green-700 px-2 rounded-full ">completed</span>
                                            @elseif ($order->status == 'cancelled')
                                                <span class="bg-red-100 text-red-700 px-2 rounded-full ">cancelled</span>
                                            @endif
                                        </p>
                                        <div class="flex items-end gap-2">
                                            รวมการสั่งซื้อ <p class="text-orange-500 text-xl font-bold">
                                                ฿{{ number_format($order->total_price, 2) }}</p>
                                        </div>
                                    </div>
                                    @php $previousDate = $order->created_at->format('d/m/Y'); @endphp
                                @endif
                                <!-- Display order details with image, name, quantity, and calculated price -->
                                <tr>
                                    <td colspan="6">
                                        <div class="flex h-32 gap-4 items-center bg-gray-50 rounded-lg p-4">
                                            <img src="{{ $order->product->product_img }}" alt=""
                                                class="h-24 w-24 object-cover rounded-md">
                                            <div class="w-full h-full flex flex-col justify-between">
                                                <p class="font-semibold text-gray-800 text-lg">
                                                    {{ $order->product->product_name }}</p>
                                                <div class="flex justify-between items-center text-gray-600">
                                                    <p>จำนวน: {{ $order->quantity }}</p>
                                                    <p class="text-orange-500 text-xl font-bold">
                                                        ฿{{ number_format($order->product->product_price * $order->quantity, 2) }}
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- Add Review Button -->
                                            @if ($order->status == 'completed')
                                                <div class="flex items-center h-full pl-5">
                                                    <a href="#"
                                                        class="h-full flex items-center justify-center aspect-square bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                                        รีวิวสินค้า
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="6">
                                        <hr class="my-4 border-black border-t-2 rounded-full opacity-60">
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
