<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;400&display=swap" rel="stylesheet">
</head>

<body class="bg-[#E3E7F1] font-[Kanit] min-h-screen text-base pb-20">
    <x-navbar />

    <div class="w-full flex justify-center items-center">
        <div class="mt-[4.375rem] w-[80%] grid grid-cols-3 gap-6">
            <div class="bg-[#ffffff] rounded-lg col-span-2 shadow-lg p-5 space-y-4">
                <header class="">
                    <h1 class="text-2xl font-semibold">My Cart</h1>
                </header>
                <div class="mt-10">
                    <box class="flex h-32 gap-4">
                        <img src="https://bucket.fitwhey.com/ProductType/b76f455d70bcdd92ab1d90cdb83843a2.webp"
                            alt="">
                        <div class="w-full h-full flex flex-col justify-between py-3">
                            <p>MY WHEY PROTEIN</p>
                            <div class="flex justify-between">
                                <div class="flex space-x-5">
                                    <p class="">จำนวน</p>
                                    <div class="flex">
                                        <button type="submit" name="action" value="decrease"
                                            class="border border-spacing-1 border-black aspect-square text-center">-</button>

                                        <p class="border border-spacing-1 border-black aspect-square text-center">
                                            2</p>
                                        <button type="submit" name="action" value="increase"
                                            class="border border-spacing-1 border-black aspect-square text-center">+</button>
                                    </div>
                                </div>

                                <p class="text-xl">฿{{ number_format(10000, 2) }}</p>
                            </div>
                        </div>
                    </box>
                    <hr class="my-4 border-black border-t-2 rounded-full opacity-60">
                </div>
            </div>

            {{-- ฝั่งขวา --}}
            <div class="col-span-1 flex flex-col gap-6">
                <div class="w-full h-auto bg-[#ffffff] rounded-lg p-5 shadow-lg">
                    <h1 class="text-xl font-semibold mb-2">You May Interest</h1>
                    <div class="mt-10">
                        <box class="flex h-40 gap-4">
                            <img src="https://bucket.fitwhey.com/ProductType/b76f455d70bcdd92ab1d90cdb83843a2.webp"
                                alt="">
                            <div class="w-full h-full flex flex-col justify-between py-3 pr-4">
                                <p>MY WHEY PROTEIN</p>
                                <p class="text-sm line-clamp-2 opacity-50">เหมาะกับใคร?
                                    ต้องการสร้างกล้ามเนื้อ, เร่งการฟื้นฟูกล้ามเนื้อ, อยากได้เวย์ที่ราคาถูก และคุณภาพดี,
                                    นักกีฬา</p>
                                <p class="text-xl">฿{{ number_format(10000, 2) }}</p>
                                <a href="#" class="bg-[#FF8833] py-1 w-fit px-2 rounded-lg text-white">Add to
                                    cart</a>
                            </div>
                        </box>
                        <hr class="my-4 border-black border-t-2 rounded-full opacity-60">
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
