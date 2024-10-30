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

                <form action="{{ route('cart.add') }}" method="POST" class="space-y-10" onsubmit="return showAlert()">
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

    </div>
    <div class="w-full flex justify-center items-center">
        <div class="w-[80%] bg-white shadow-md p-10 rounded-xl my-10 space-y-2">
            <h2 class="text-lg font-bold">คะแนนของสินค้า</h2>


            @if ($product->reviews->isEmpty())
                <p class="text-gray-500">ไม่มีรีวิว</p>
            @else
                @foreach ($product->reviews as $review)
                    {{-- <div class="bg-white p-4 mb-2 rounded shadow">
                        @if ($review->userInformation && $review->userInformation->user)
                            <p><strong>ผู้ใช้:</strong> {{ $review->userInformation->user->name }}</p>
                        @else
                            <p><strong>ผู้ใช้:</strong> ไม่ระบุชื่อ</p>
                        @endif
                        <p><strong>คะแนน:</strong> {{ $review->rate }}</p>
                        <p><strong>ความคิดเห็น:</strong> {{ $review->comment }}</p>
                    </div> --}}
                    <div>
                        {{-- Name --}}
                        <div class="space-y-1 text-gray-700">
                            @if ($review->userInformation && $review->userInformation->user)
                                <p>คุณ {{ $review->userInformation->user->name }}</p>
                            @else
                                <p>>คุณ ไม่ระบุชื่อ</p>
                            @endif
                    
                            <p class="opacity-60">{{ $review->created_at }}</p>
                    
                            {{-- Displaying the rating --}}
                            <div class="flex items-center">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= $review->rate ? 'text-orange-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.385 4.287a1 1 0 00.95.69h4.506c.969 0 1.371 1.24.588 1.81l-3.64 2.637a1 1 0 00-.364 1.118l1.385 4.287c.3.921-.755 1.688-1.54 1.118L10 14.347l-3.64 2.637c-.784.57-1.838-.197-1.54-1.118l1.385-4.287a1 1 0 00-.364-1.118L2.858 9.714c-.784-.57-.38-1.81.588-1.81h4.506a1 1 0 00.95-.69l1.385-4.287z" />
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

@endsection
