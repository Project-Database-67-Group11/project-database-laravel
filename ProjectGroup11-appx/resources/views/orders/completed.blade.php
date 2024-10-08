@extends('layouts.app')

@section('content')
<div class="w-full h-full rounded-lg bg-gray-100 flex items-center justify-center">

    <!-- ส่วนตารางคำสั่งซื้อด้านขวา -->
    <div class="w-3/4 bg-gray-50 p-6">
        <!-- ส่วนหัว -->
        <div class="bg-white text-black font-medium p-4 flex justify-between items-center border-b">
            <a href="{{ route('orders.index') }}" class="text-lg font-bold cursor-pointer hover:text-[#ff8833]">ทั้งหมด</a>
            <a href="{{ route('orders.pending') }}" class="text-lg font-bold cursor-pointer hover:text-[#ff8833]">ค้างชำระ</a>
            <a href="{{ route('orders.completed') }}" class="text-lg font-bold cursor-pointer hover:text-[#ff8833]">สำเร็จการสั่งซื้อ</a>
            <a href="{{ route('orders.cancelled') }}" class="text-lg font-bold cursor-pointer hover:text-[#ff8833]">สินค้าที่ยกเลิก</a>
        </div>

        <!-- ช่องค้นหา -->
        <div class="p-4 mt-3">
            <input type="text" class="w-full p-3 rounded-lg border border-gray-300" placeholder="ค้นหาโดยใช้ชื่อสินค้า" />
        </div>
        

        <!-- ส่วนคำสั่งซื้อ -->
        <div class="px-6">
            <div class="bg-white shadow-md rounded-lg mb-4 p-6">
                <div class="h-25 flex items-center justify-between text-gray-700">
                    <!-- ส่วนรูปและรายละเอียดสินค้า -->
                    <div class="flex flex-row gap-4">
                        <!-- รูปสินค้า -->
                        <div class="flex flex-col items-center">
                            <h1 class="text-black font-bold">222222222222</h1>
                            <img src="https://fastly.picsum.photos/id/114/200/200.jpg?hmac=quI2SDil5gvhyJiPY4KNxdaMtGBybPSvAS7R02lF1vo" alt="รูปสินค้า" class="w-24 h-24 rounded-lg">
                        </div>

                        <!-- รายละเอียดสินค้า -->
                        <div class="flex flex-col gap-4 justify-center">
                            <h1 class="text-lg font-semibold text-black">ข้าวแกงกะหรี่พึ่งสั่งมา</h1>
                            <p class="text-gray-600">ข้าวแกงกะหรี่หมูทอดทงคัตสึ / ชำระเรียบร้อย</p>
                            <span class="bg-green-100 text-green-700 text-sm py-1 px-3 rounded-full w-max">จัดส่งสำเร็จ</span>
                        </div>
                    </div>

                    <!-- ข้อมูลเพิ่มเติมและปุ่ม -->
                    <div class="flex flex-col gap-4 items-center justify-center">
                        <div class="text-right">
                            <h1 class="text-black font-semibold">24 Sep 2024</h1>
                        </div>
                        <div class="text-right">
                            <h1 class="text-xl font-bold text-orange-500">฿ 36.00</h1>
                            <p class="text-sm text-gray-600">1 รายการ</p>
                        </div>

                        <!-- ปุ่มการกระทำ -->
                        <div class="flex gap-3">
                            <button class="bg-green-500 text-black py-2 px-4 rounded-lg hover:bg-green-600 transition hover:text-white">ให้คะแนน</button>
                            <button class="bg-blue-500 text-black py-2 px-4 rounded-lg hover:bg-blue-600 transition hover:text-white">สั่งใหม่</button>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Pagination -->
        <div class="p-4 flex justify-end">
            <ul class="flex space-x-2">
                <li><button class="px-3 py-1 bg-gray-200 rounded hover:bg-[#ff8833] hover:text-white transition">1</button></li>
                <li><button class="px-3 py-1 bg-gray-200 rounded hover:bg-[#ff8833] hover:text-white transition">2</button></li>
                <li><button class="px-3 py-1 bg-gray-200 rounded hover:bg-[#ff8833] hover:text-white transition">3</button></li>
                <li><button class="px-3 py-1 bg-gray-200 rounded hover:bg-[#ff8833] hover:text-white transition">4</button></li>
            </ul>
        </div>
    </div>
</div>
@endsection
