@extends('layouts.app')

@section('content')
    <div class="w-full flex justify-center items-center">
        <div class="mt-[4.375rem] w-[80%] grid grid-cols-3 gap-6">
            <div class="bg-white h-full w-[100%] shadow-md p-10 rounded-xl aspect-square">
                <img src="{{ $product->product_img }}" alt="{{ $product->product_name }}"
                    class="rounded-xl object-cover object-center h-full w-full">
            </div>
            <div class="bg-white shadow-md col-span-2 rounded-xl p-10 space-y-10">
                <h1 class="text-3xl font-bold">{{ $product->product_name }}</h1>
                <p class="text-md opacity-70">{{ $product->product_description }}</p>
                <p class="text-4xl font-bold text-blue-500">฿{{ number_format($product->product_price, 2) }}</p>

                <form action="{{ route('cart.add') }}" method="POST" class="space-y-10" onsubmit="return showAlert()">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                    <div>
                        @if ($product->product_quantity > 0)
                            <p class="opacity-70 text-sm">สินค้าเหลือ: {{ $product->product_quantity }} จำนวน</p>
                            <div class="flex items-center">
                                <label for="quantity" class="block text-lg font-medium mr-5">จำนวน:</label>
                                <input type="number" id="quantity" name="quantity"
                                    class="w-20 mt-2 border border-gray-300 rounded-md p-2" min="1"
                                    max="{{ $product->product_quantity }}" value="1">
                            </div>
                        @else
                            <p class="text-red-500 text-lg font-bold">สินค้าหมด</p>
                        @endif
                    </div>
                    <div class="flex flex-row gap-4">
                        @if ($product->product_quantity > 0)
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-5 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 576 512"
                                    class="mr-2 fill-current text-white">
                                    <path
                                        d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                </svg>
                                เพิ่มไปที่ตะกร้า
                            </button>
                        @else
                            <button type="button" disabled
                                class="bg-gray-400 text-white font-bold py-2 px-4 rounded mb-5 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 576 512"
                                    class="mr-2 fill-current text-white">
                                    <path
                                        d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                </svg>
                                สินค้าหมด
                            </button>
                        @endif
                        <a href="{{ route('dashboard') }}"
                            class="bg-slate-500 hover:bg-slate-600 text-white font-bold py-2 px-4 rounded mb-5 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 448 512"
                                class="mr-2 fill-current text-white">
                                <path
                                    d="M257.5 445.1c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L9.4 288c-12.5-12.5-12.5-32.8 0-45.3L212.2 39.5c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3L109.3 224H424c17.7 0 32 14.3 32 32s-14.3 32-32 32H109.3l148.2 157.1z" />
                            </svg>
                            หน้าร้านค้า
                        </a>
                    </div>
                </form>
            </div>

        </div>

    </div>
    <div class="w-full flex justify-center items-center">
        <div class="w-[80%] bg-white shadow-md p-10 rounded-xl my-10 space-y-2">
            @php
                $averageRating = $product->reviews->count() > 0 ? $product->reviews->avg('rate') : 0;
            @endphp
            <div class="flex flex-row items-start justify-start gap-2">
                <h2 class="text-xl font-bold">
                    {{ number_format($averageRating, 1) }}
                </h2>
                <svg class="w-5 h-5 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.385 4.287a1 1 0 00.95.69h4.506c.969 0 1.371 1.24.588 1.81l-3.64 2.637a1 1 0 00-.364 1.118l1.385 4.287c.3.921-.755 1.688-1.54 1.118L10 14.347l-3.64 2.637c-.784.57-1.838-.197-1.54-1.118l1.385-4.287a1 1 0 00-.364-1.118L2.858 9.714c-.784-.57-.38-1.81.588-1.81h4.506a1 1 0 00.95-.69l1.385-4.287z" />
                </svg>
                <h2 class="text-lg font-medium">คะแนนของสินค้า ({{ $product->reviews->count() }})</h2>
            </div>


            @if ($product->reviews->isEmpty())
                <p class="text-gray-500">ไม่มีรีวิว</p>
            @else
                @foreach ($product->reviews as $review)
                    <div>
                        {{-- Name --}}
                        <div class="space-y-1 text-gray-700">
                            @if ($review->userInformation && $review->userInformation->user)
                                <p>คุณ {{ $review->userInformation->user->name }}</p>
                            @else
                                <p><strong>คุณ ไม่ระบุชื่อ</p>
                            @endif

                            <p class="opacity-60">{{ $review->created_at }}</p>

                            {{-- Displaying the rating --}}
                            <div class="flex items-center">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= $review->rate ? 'text-orange-400' : 'text-gray-300' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.385 4.287a1 1 0 00.95.69h4.506c.969 0 1.371 1.24.588 1.81l-3.64 2.637a1 1 0 00-.364 1.118l1.385 4.287c.3.921-.755 1.688-1.54 1.118L10 14.347l-3.64 2.637c-.784.57-1.838-.197-1.54-1.118l1.385-4.287a1 1 0 00-.364-1.118L2.858 9.714c-.784-.57-.38-1.81.588-1.81h4.506a1 1 0 00.95-.69l1.385-4.287z" />
                                    </svg>
                                @endfor
                            </div>

                            <p class="mt-2">{{ $review->comment }}</p>
                            <hr class="py-1">
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <script>
        function showAlert() {
            // ดึงชื่อสินค้า
            const productName = "{{ $product->product_name }}";
            // ดึงจำนวนที่ผู้ใช้เลือก
            const quantity = document.getElementById('quantity').value;
            // แสดง alert
            alert("เพิ่มสินค้า: " + productName + " จำนวน: " + quantity);
            // คืนค่า true เพื่อให้ฟอร์มถูกส่ง
            return true;
        }
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

@endsection
