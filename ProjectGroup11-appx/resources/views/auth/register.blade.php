<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครใหม่</title>
    <!-- นำเข้า Tailwind CSS ผ่าน CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#E3E7F1] min-h-screen flex items-center justify-center">
    <!-- Container -->
    <div class="w-full max-w-md bg-white shadow-lg rounded-lg px-10 py-8">
        <!-- Header -->
        <h2 class="text-center text-2xl font-semibold mb-6">สมัครใหม่</h2>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-4">
                <ul class="text-red-500 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">ชื่อ</label>
                <input id="name" type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required autofocus>
                @error('name')
                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">อีเมล</label>
                <input id="email" type="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
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

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">ยืนยันพาสเวิร์ด</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @error('password_confirmation')
                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Register Button -->
            <div class="flex justify-center mb-4">
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                    สมัครใหม่
                </button>
            </div>

            <!-- Login Link -->
            <div class="text-center text-sm text-gray-600">
                มีบัญชีอยู่แล้ว? <a href="{{ route('login') }}" class="text-orange-500 hover:text-orange-700">เข้าสู่ระบบ</a>
            </div>
        </form>
    </div>
</body>
</html>
