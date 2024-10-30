@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen w-full bg-slate-100">
  <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">

  @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-2xl font-semibold mb-4 text-center">ให้คะแนนสินค้า: {{ $product->product_name }}</h2>
    <form action="{{ route('ratings.store', $product->product_id) }}" method="POST">
      @csrf
      <div class="mb-4">
        <label class="block mb-1">คะแนน:</label>
        <div class="flex items-center">
          <input type="radio" name="rating" id="star1" value="1" class="hidden peer" />
          <label for="star1" class="star text-gray-400 text-4xl cursor-pointer">★</label>
          
          <input type="radio" name="rating" id="star2" value="2" class="hidden peer" />
          <label for="star2" class="star text-gray-400 text-4xl cursor-pointer">★</label>
          
          <input type="radio" name="rating" id="star3" value="3" class="hidden peer" />
          <label for="star3" class="star text-gray-400 text-4xl cursor-pointer">★</label>
          
          <input type="radio" name="rating" id="star4" value="4" class="hidden peer" />
          <label for="star4" class="star text-gray-400 text-4xl cursor-pointer">★</label>
          
          <input type="radio" name="rating" id="star5" value="5" class="hidden peer" />
          <label for="star5" class="star text-gray-400 text-4xl cursor-pointer">★</label>
        </div>
      </div>
      <div class="mb-4">
        <label for="comment" class="block mb-1">ความคิดเห็น:</label>
        <textarea id="comment" name="comment" class="border rounded-lg p-2 w-full" rows="4"></textarea>
      </div>
      <div class="flex justify-between">
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg">ส่งความคิดเห็น</button>
        <a href="{{ url()->previous() }}" class="bg-red-500 text-white px-4 py-2 rounded-lg">กลับ</a>
      </div>
    </form>
  </div>
</div>

<script>
  // JavaScript to handle star highlighting
  document.querySelectorAll('input[name="rating"]').forEach((radio) => {
    radio.addEventListener('change', () => {
      let ratingValue = parseInt(radio.value);
      document.querySelectorAll('.star').forEach((star, index) => {
        star.classList.toggle('text-yellow-400', index < ratingValue);
        star.classList.toggle('text-gray-400', index >= ratingValue);
      });
    });
  });
</script>

<style>
  /* Custom CSS to ensure styles apply correctly */
  .star {
    transition: color 0.3s;
  }
</style>

@endsection




