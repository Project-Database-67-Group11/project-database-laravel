<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <!-- นำเข้า Tailwind CSS ผ่าน CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#E3E7F1] min-h-screen flex items-center justify-center">
    <!-- Container -->
    <div class="w-full max-w-md bg-white shadow-lg rounded-lg px-10 py-8">
        <!-- Header -->
        <h2 class="text-center text-2xl font-semibold mb-6">เข้าสู่ระบบ</h2>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">อีเมล</label>
                <input id="email" type="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required autofocus>
                @error('email')
                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">พาสเวิร์ด</label>
                <input id="password" type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @error('password')
                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2 leading-tight">
                    <span class="text-sm text-gray-600">จดจำฉัน</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-orange-500 hover:text-orange-700">ลืมรหัสผ่าน?</a>
                @endif
            </div>

            <!-- Login Button -->
            <div class="flex justify-center mb-4">
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                    เข้าสู่ระบบ
                </button>
            </div>

            <!-- Register Link -->
            <div class="text-center text-sm text-gray-600">
                เพิ่งเคยเข้าครั้งแรกใช่หรือไม่? <a href="{{ route('register') }}" class="text-orange-500 hover:text-orange-700">สมัครใหม่</a>
            </div>
        </form>
    </div>
</body>
</html>
