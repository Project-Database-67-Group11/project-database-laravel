@extends('layouts.app')

@section('content')
<div class="w-full flex justify-center items-center">
    <!-- Main Content -->
    <div class="mt-[4.375rem] w-[80%] mb-[70px]">
        <!-- Products Section -->
        <section class="bg-[#ffffff] p-5 rounded-lg shadow-xl space-y-8">
            <div class="flex justify-between items-end">
                <!-- Dynamic Title based on selected type -->
                <h2 class="text-2xl font-semibold">
                    {{ request('type') ? 'ประเภทสินค้า: ' . request('type') : 'สินค้าทั้งหมด' }}
                </h2>

                <!-- Sorting and Filtering Options -->
                <div class="flex justify-end space-x-4">
                    <form action="{{ route('dashboard') }}" method="GET" id="filterSortForm">
                        <!-- Product Type Filter -->
                        <select class="pr-8 pl-2 rounded-md" name="type" onchange="this.form.submit()">
                            <option value="">สินค้าทั้งหมด</option>
                            <option value="Protein" {{ request('type') == 'Protein' ? 'selected' : '' }}>Protein</option>
                            <option value="Creatine" {{ request('type') == 'Creatine' ? 'selected' : '' }}>Creatine
                            </option>
                            <option value="Vitamin" {{ request('type') == 'Vitamin' ? 'selected' : '' }}>Vitamin</option>
                            <option value="SHAKER" {{ request('type') == 'SHAKER' ? 'selected' : '' }}>SHAKER</option>
                            <option value="Exercise equipment" {{ request('type') == 'Exercise equipment' ? 'selected' : '' }}>Exercise equipment</option>
                        </select>

                        <!-- Sorting Options -->
                        <select class="pr-8 pl-2 rounded-md" name="sort" onchange="this.form.submit()">
                            <option value="product_name,asc" {{ request('sort') == 'product_name,asc' ? 'selected' : '' }}>เรียงตามชื่อ (A-Z)</option>
                            <option value="product_name,desc" {{ request('sort') == 'product_name,desc' ? 'selected' : '' }}>เรียงตามชื่อ (Z-A)</option>
                            <option value="product_price,asc" {{ request('sort') == 'product_price,asc' ? 'selected' : '' }}>ราคา (ต่ำ -> สูง)</option>
                            <option value="product_price,desc" {{ request('sort') == 'product_price,desc' ? 'selected' : '' }}>ราคา (สูง -> ต่ำ)</option>
                        </select>
                    </form>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </div>
            </div>

            <div class="grid grid-cols-5 gap-6">
                @foreach ($products as $product)
                    <!-- Product Card -->
                    <a href="{{ route('product.show', ['id' => $product->product_id]) }}"
                        class="block transition-transform transform hover:scale-105">
                        <div class="bg-gray-100 p-4 rounded-lg flex flex-col justify-between text-center h-full duration-200 hover:bg-gray-200">
                            <div class="flex flex-col flex-grow">
                                <img src="{{ $product->product_img }}" alt="{{ $product->product_name }}"
                                    class="h-40 w-full object-contain mx-auto bg-white rounded-lg">
                                <p class="text-lg font-medium">{{ $product->product_name }}</p>
                                <p class="text-gray-500">
                                    {{ \Illuminate\Support\Str::words($product->product_description, 5, '...') }}
                                </p>
                            </div>
                            <p class="text-xl font-bold mt-4">฿{{ number_format($product->product_price, 2) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- Divider -->
        <!-- <hr class="my-12 border-t-2 border-gray-400"> -->
    </div>
</div>
@endsection