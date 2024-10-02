<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;400&display=swap" rel="stylesheet">
</head>

<body class="bg-[#E3E7F1] font-[Kanit] min-h-screen text-base pb-20">
    <x-navbar />

    <div class="w-full flex justify-center items-center">
        <div class="mt-[4.375rem] w-[80%] grid grid-cols-3 gap-6">
            {{-- checkout section --}}
            <div class="bg-[#ffffff] rounded-lg col-span-2 shadow-lg p-5 space-y-4">
                <header class="">
                    <h1 class="text-2xl font-semibold">Checkout</h1>
                    <p class="text-lg font-medium">My Address</p>
                </header>
                <div class="text-sm opacity-80">
                    <p>อภิวิชญ์ บุญฤทธิ์ | (+66) 97 125 6352</p>
                    <p>10 ถนนศิริมังคลาจารย์ ซอย 11 ตำบลสุเทพ</p>
                    <p>อำเภอเมืองเชียงใหม่ เชียงใหม่ 50200</p>
                </div>
                <div class="mt-10">
                    <box class="flex h-32 gap-4">
                        <img src="https://bucket.fitwhey.com/ProductType/b76f455d70bcdd92ab1d90cdb83843a2.webp"
                            alt="">
                        <div class="w-full h-full flex flex-col justify-between py-3">
                            <p>MY WHEY PROTEIN</p>
                            <div class="flex justify-between">
                                <p class="">จำนวน: 2</p>
                                <p class="text-xl">฿{{ number_format(10000, 2) }}</p>
                            </div>
                        </div>
                    </box>
                    <hr class="my-4 border-black border-t-2 rounded-full opacity-60">
                    <box class="flex h-32 gap-4">
                        <img src="https://bucket.fitwhey.com/ProductType/b76f455d70bcdd92ab1d90cdb83843a2.webp"
                            alt="">
                        <div class="w-full h-full flex flex-col justify-between py-3">
                            <p>MY WHEY PROTEIN</p>
                            <div class="flex justify-between">
                                <p class="">จำนวน: 2</p>
                                <p class="text-xl">฿{{ number_format(10000, 2) }}</p>
                            </div>
                        </div>
                    </box>
                    <hr class="my-4 border-black border-t-2 rounded-full opacity-60">
                    <box class="flex h-32 gap-4">
                        <img src="https://bucket.fitwhey.com/ProductType/b76f455d70bcdd92ab1d90cdb83843a2.webp"
                            alt="">
                        <div class="w-full h-full flex flex-col justify-between py-3">
                            <p>MY WHEY PROTEIN</p>
                            <div class="flex justify-between">
                                <p class="">จำนวน: 2</p>
                                <p class="text-xl">฿{{ number_format(10000, 2) }}</p>
                            </div>
                        </div>
                    </box>
                    <hr class="my-4 border-black border-t-2 rounded-full opacity-60">
                </div>
            </div>

            {{-- ฝั่งขวา --}}
            <div class="col-span-1 flex flex-col gap-6">
                {{-- PAYMENT and SHIPPING --}}
                <div class="w-full h-auto bg-[#ffffff] rounded-lg p-5 shadow-lg">
                    <h1 class="text-xl font-semibold mb-2">PAYMENT</h1>
                    <div>
                        <label>
                            <input type="radio" name="payment" value="cash" class="mr-2" checked> Cash on delivery
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="payment" value="card" class="mr-2"> Card
                        </label>
                    </div>

                    <h1 class="text-xl font-semibold mt-4 mb-2">SHIPPING</h1>
                    <div>
                        <label>
                            <input type="radio" name="shipping" value="normal" class="mr-2" checked> Normal
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="shipping" value="fast" class="mr-2"> Fast
                        </label>
                    </div>
                </div>

                {{-- ORDER SUMMARY --}}
                <div class="w-full h-auto bg-[#ffffff] rounded-lg p-5 shadow-lg">
                    <h1 class="text-xl font-semibold mb-2">ORDER SUMMARY</h1>
                    <div class="flex justify-between">
                        <h1>Subtotal</h1>
                        <h1>฿{{ number_format(30000, 2) }}</h1>
                    </div>
                    <div class="flex justify-between">
                        <h1>Taxes</h1>
                        <h1>฿{{ number_format(0, 2) }}</h1>
                    </div>
                    <div class="flex justify-between">
                        <h1>Shipping Cost</h1>
                        <h1>฿{{ number_format(0, 2) }}</h1>
                    </div>
                    <hr class="my-4 border-black border-t-2 rounded-full opacity-60">
                    <div class="flex justify-between">
                        <h1>Grand Total</h1>
                        <h1>฿{{ number_format(30000, 2) }}</h1>
                    </div>
                </div>

                <a href="/dashboard" class="rounded-lg shadow-lg bg-[#15AF5C] text-[#ffffff] text-center py-2">Place
                    Order</a>
            </div>
        </div>
    </div>

</body>

</html>
