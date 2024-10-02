<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
</head>

<body class="bg-[#E3E7F1] font-[Oswald] min-h-screen">
    <x-navbar />

    <div class="w-full flex justify-center items-cente">
        <div class="mt-[4.375rem] w-[80%] grid grid-cols-3 gap-6">
            {{-- checkout section --}}
            <div class="bg-[#ffffff] rounded-lg col-span-2 shadow-lg p-5">
                <h1 class="text-2xl font-semibold mb-4">Checkout</h1>
            </div>

            {{-- ฝั่งขวา --}}
            <div class="col-span-1 flex flex-col gap-6">
                {{-- ORDER SUMMARY --}}
                <div class="w-full h-auto bg-[#ffffff] rounded-lg p-5 shadow-lg">
                    <h1 class="text-xl">ORDER SUMMARY</h1>
                </div>
                {{-- PAYMENT --}}
                <div class="w-full h-auto bg-[#ffffff] rounded-lg p-5 shadow-lg">
                    <h1 class="text-xl">PAYMENT</h1>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
