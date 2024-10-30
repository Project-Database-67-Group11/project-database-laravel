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
                <h1 class="text-3xl font-bold">รีวิวสินค้า</h1>
                <div class="flex h-56 p-5 gap-5">
                    <img src="{{ $product->product_img }}" alt="{{ $product->product_img }}">
                    <div class="px-5 space-y-5">
                        <h1 class="text-3xl font-bold">{{ $product->product_name }}</h1>
                        <p class="">{{ $product->product_description }}</p>
                    </div>
                </div>

                @if ($review)
                    <div>
                        <h2 class="text-2xl font-bold">รีวิวของคุณ</h2>
                        {{-- Display Rating as Stars --}}
                        <div class="mb-4 flex items-center space-x-5">
                            <label class="block mb-1"><strong>คะแนน</strong></label>
                            {{-- <div class="rating rating-lg">
                                @for ($i = 1; $i <= 5; $i++)
                                    <input type="radio" name="rate"
                                        class="mask mask-star-2 bg-orange-400 checked:bg-orange-400"
                                        id="read-only-rate-{{ $i }}" value="{{ $i }}"
                                        {{ $review->rate == $i ? 'checked' : '' }} disabled />
                                @endfor
                            </div> --}}
                            {{-- Displaying the rating --}}
                            <div class="flex items-center">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= $review->rate ? 'text-orange-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.385 4.287a1 1 0 00.95.69h4.506c.969 0 1.371 1.24.588 1.81l-3.64 2.637a1 1 0 00-.364 1.118l1.385 4.287c.3.921-.755 1.688-1.54 1.118L10 14.347l-3.64 2.637c-.784.57-1.838-.197-1.54-1.118l1.385-4.287a1 1 0 00-.364-1.118L2.858 9.714c-.784-.57-.38-1.81.588-1.81h4.506a1 1 0 00.95-.69l1.385-4.287z" />
                                    </svg>
                                @endfor
                            </div>
                        </div>
                        {{-- Comment --}}
                        <div class="mb-4">
                            <p><strong>ความคิดเห็น</strong>
                                @if ($review->comment == null)
                                    -
                                @else
                                    {{ $review->comment }}
                                @endif
                            </p>
                        </div>

                    </div>
                @else
                    <form action="{{ route('ratings.submitReview', $order->order_id) }}" method="POST">
                        @csrf
                        {{-- Rate --}}
                        <div class="mb-4">
                            <label class="block mb-1">คะแนน</label>
                            <div class="flex space-x-1 rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    <label>
                                        <input type="radio" name="rate" value="{{ $i }}" class="hidden rate-input"
                                               {{ $review && $review->rate == $i ? 'checked' : '' }} />
                                        <svg data-value="{{ $i }}" onclick="setRating({{ $i }})"
                                             class="w-8 h-8 cursor-pointer star {{ $i <= ($review->rate ?? 0) ? 'text-orange-400' : 'text-gray-300' }}" 
                                             fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.385 4.287a1 1 0 00.95.69h4.506c.969 0 1.371 1.24.588 1.81l-3.64 2.637a1 1 0 00-.364 1.118l1.385 4.287c.3.921-.755 1.688-1.54 1.118L10 14.347l-3.64 2.637c-.784.57-1.838-.197-1.54-1.118l1.385-4.287a1 1 0 00-.364-1.118L2.858 9.714c-.784-.57-.38-1.81.588-1.81h4.506a1 1 0 00.95-.69l1.385-4.287z" />
                                        </svg>
                                    </label>
                                @endfor
                            </div>
                            
                        </div>


                        {{-- Comment --}}
                        <div class="mb-4">
                            <label for="comment" class="block mb-1">ความคิดเห็น</label>
                            <textarea id="comment" name="comment" class="border rounded-lg p-2 w-full resize-none" rows="4"></textarea>
                        </div>
                        <div class="flex justify-between">
                            <button type="submit"
                                class="bg-green-500 text-white px-4 py-2 rounded-lg">ส่งความคิดเห็น</button>
                            <a href="{{ url()->previous() }}" class="bg-red-500 text-white px-4 py-2 rounded-lg">กลับ</a>
                        </div>
                    </form>
                @endif
            </div>

        </div>
    </div>
    <script>
        function setRating(value) {
            document.querySelectorAll('.rate-input').forEach(input => {
                input.checked = (input.value == value);
            });
            
            document.querySelectorAll('.star').forEach(star => {
                if (star.getAttribute('data-value') <= value) {
                    star.classList.add('text-orange-400');
                    star.classList.remove('text-gray-300');
                } else {
                    star.classList.add('text-gray-300');
                    star.classList.remove('text-orange-400');
                }
            });
        }
    
        // Set default rating to 5 stars on page load
        document.addEventListener("DOMContentLoaded", function() {
            setRating(5);
        });
    </script>
@endsection
