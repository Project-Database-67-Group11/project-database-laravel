@extends('layouts.app')

@section('content')
<div class="w-full flex justify-center items-center">
    <div class="mt-5 mb-5 w-[80%] grid grid-cols-4 gap-6">
        <div>
            <div class="bg-white shadow-md rounded-xl p-10 flex flex-row gap-4">
                <div class="flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
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
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
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
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                    viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M192 0c-41.8 0-77.4 26.7-90.5 64L64 64C28.7 64 0 92.7 0 128L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64l-37.5 0C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM72 272a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm104-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zM72 368a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm88 0c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16z" />
                </svg>
                <h1 class="pl-4 ">การซื้อของฉัน</h1>
            </div>
            <div class="space-y-6 ml-10 my-4 flex flex-col gap-[1px]">
                <a href="{{ route('profile.Order_index') }}" class="">
                    <h1>ทั้งหมด</h1>
                </a>
                <a href="{{ route('profile.Order_pending') }}" class="text-orange-500">
                    <h1>ค้างชำระ</h1>
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
            <h3 class="text-lg font-semibold">ค้างชำระ</h3>
            @if($orders->isEmpty())
                <div class="text-center ">
                    <p class="text-lg text-gray-600">ยังไม่มีคำสั่งสินค้าที่ค้างชำระ</p>
                </div>
            @else
            <div class="w-full bg-gray-50">
                <div class="">
                    <input type="text" class="w-full p-3 rounded-lg border border-gray-300" placeholder="ค้นหาโดยใช้ชื่อสินค้า" />
                </div>
                <div class="px-6 mt-2">
                    @foreach($orders as $order)
                    @if($order->product && $order->status === 'pending')
                                <div class="bg-white shadow-md rounded-lg mb-4 p-6">
                                    <div class="text-center flex items-center justify-end">
                                        <h1 class="bg-green-100 text-green-700 text-sm py-1 px-3 rounded-full w-max">{{ $order->status }}</>
                                    </div>
                                    <div class="grid grid-cols-2 ">
                                        <div class="flex flex-row gap-4">
                                            <div class="flex flex-col items-center">
                                                <h1 class="text-black font-bold">{{ $order->product_id }}</h1>
                                                <div >
                                                    <img src="{{ $order->product->product_img }}" alt="{{ $order->product->product_name }}" class="w-32 h-32 rounded-lg">
                                                </div>
                                            </div>
    
                                            <div class="flex items-start justify-center mt-6">
                                                <h1 class="text-lg font-semibold text-black">{{ $order->product->product_name }}</h1>
                                            </div>
                                        </div>
    
                                        <div class="flex flex-col gap-2 items-end justify-end text-right">
                                            <div class="flex flex-col gap-4">
                                                <div class="mt-5">
                                                    <h1 class="text-black font-semibold">{{ $order->date }}</h1>
                                                </div>
                                                <div >
                                                    <h1 class="text-xl font-bold text-orange-500">฿ {{ $order->product->product_price * $order->quantity }}</h1>
                                                    <p class="text-sm text-gray-600">{{ $order->quantity }} รายการ</p>
                                                </div>
                                                <div>
                                                    <p class="text-sm text-gray-600">ราคารวมค่าส่งและภาษี : ฿ {{ $order->total_price }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <button class="">ดูเพิ่มเติม</button>
                                    </div>
                                    <div class="flex items-end justify-end mt-5 gap-3">
                                        <button class="bg-green-500 text-black py-2 px-4 rounded-lg hover:bg-green-600 transition hover:text-white">
                                            ชำระแล้ว
                                        </button>
                                        <button class="bg-blue-500 text-black py-2 px-4 rounded-lg hover:bg-blue-600 transition hover:text-white">
                                            ยกเลิก
                                        </button>
                                    </div>
                                </div>
                            @else
                                <p class="text-lg">ไม่พบข้อมูลสินค้า</p>
                            @endif
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>    

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[type="text"]');
        const orderItems = document.querySelectorAll('.bg-white.shadow-md.rounded-lg');

        searchInput.addEventListener('input', function() {
            const query = searchInput.value.toLowerCase();

            orderItems.forEach(item => {
                const productName = item.querySelector('h1.text-lg.font-semibold').textContent.toLowerCase();
                if (productName.includes(query)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection