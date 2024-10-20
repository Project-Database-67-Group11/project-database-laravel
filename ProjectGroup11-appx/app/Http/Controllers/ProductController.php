<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class ProductController extends Controller
{
    // test
    public function addProduct()
    {
        Product::create([
            'product_id' => 4,
            'product_name' => 'ISO ABSOLUTE ZERO',
            'product_description' => 'เหมาะกับใคร ?
ต้องการสร้างกล้ามเนื้อ แบบคุมไขมัน, เร่งการฟื้นฟูกล้ามเนื้อ, อยากได้เวย์คุณภาพสูง, คนที่แพ้แลคโตสในนม, นักกีฬา, ผู้สูงอายุ',
            'product_img' => 'https://bucket.fitwhey.com/ProductType/26e75a452d8d4cad245b03203fc8e145.webp',
            'product_price' => 2295,
            'product_quantity' => 123,
            'product_type' => 'Protein',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Product::create([
            'product_id' => 5,
            'product_name' => 'FITSOY 100% SOY ISOLATE',
            'product_description' => 'FIT SOY 100% SOY ISOLATE โปรตีนจากพืช (Plant Protein) เหมาะกับใคร?
คนที่ต้องการเสริมโปรตีน, สร้างกล้ามเนื้อ, ฟื้นฟูกล้ามเนื้อ, ไม่ทานนม หรือ เนื้อสัตว์',
            'product_img' => 'https://bucket.fitwhey.com/products/1c3988c5c91b0c4d2a8d534b8f76dc44.webp',
            'product_price' => 610,
            'product_quantity' => 216,
            'product_type' => 'Protein',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Product::create([
            'product_id' => 6,
            'product_name' => 'Ultra Mass',
            'product_description' => 'เหมาะกับใคร ?
คนผอม แบบไม่มีพุง มีแรงน้อย ต้องการเพิ่มน้ำหนัก และกล้ามเนื้อ, คนที่กินอาหารต่อวันน้อยเกินไป, คนที่ใช้พลังงานสูงมาก ต้องการพลังงานทดแทน​',
            'product_img' => 'https://bucket.fitwhey.com/ProductType/4537cc8f2a2d44accfb0e234b030a367.webp',
            'product_price' => 2799,
            'product_quantity' => 34,
            'product_type' => 'Protein',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Product::create([
            'product_id' => 7,
            'product_name' => 'BAAM MY WHEY PROTEIN THAI SERIES',
            'product_description' => 'เหมาะกับใคร?
ต้องการสร้างกล้ามเนื้อ, เร่งการฟื้นฟูกล้ามเนื้อ, อยากได้เวย์ที่ราคาถูก และคุณภาพดี, นักกีฬา​',
            'product_img' => 'https://bucket.fitwhey.com/ProductType/853107e0fd62658bba426dd5f71f4b37.webp',
            'product_price' => 1495,
            'product_quantity' => 65,
            'product_type' => 'Protein',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Product::create([
            'product_id' => 8,
            'product_name' => 'BAAM ZMA',
            'product_description' => 'เหมาะกับใคร ?
คนที่นอนหลับได้ไม่ลึก, คนที่เวลานอนน้อย, ต้องการเพิ่มฮอร์โมนเพศชายให้เต็มที่, ต้องการเพิ่มความแข็งแรงของกล้ามเนื้อ',
            'product_img' => 'https://bucket.fitwhey.com/products/5024d12edf58bc09a522d30cb62ef26f.webp',
            'product_price' => 600,
            'product_quantity' => 1234,
            'product_type' => 'Vitamin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Product::create([
            'product_id' => 9,
            'product_name' => 'Vitamin A 25000iu',
            'product_description' => 'วิตามินที่ช่วยรักษาสุขภาพของดวงตา และช่วยเสริมภูมิคุ้มกัน ต้านอนุมูลอิสระ ใครที่ใช้ดวงตาเยอะ ไม่ว่าจะทำงาน หรืออ่านหนังสือเยอะ ควรมีติดกระเป๋าไว้
✓  Vitamin A 7,500 mcg. (25,000 IU)*
✓  บำรุงสายตา
✓  ช่วยต่อต้าน อนุมูลอิสระ
✓  ช่วยเสริมภูมิคุ้มกันให้กับร่างกาย
✓  ช่วยบำรุงสุขภาพผิว ต่อสู้สิว
✓  ป้องกันเลือดออกตามไรฟัน',
            'product_img' => 'https://bucket.fitwhey.com/products/7f4afd2a0f5165c6b8a3ef6914edede7.webp',
            'product_price' => 299,
            'product_quantity' => 456,
            'product_type' => 'Vitamin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Product::create([
            'product_id' => 10,
            'product_name' => 'Vitamin E 400iu',
            'product_description' => 'อีกหนึ่งวิตามินที่ช่วยเรื่องความงาม และการต้านอนุมูลอิสระ เพื่อให้เราแข็งแรงทั้งภายใน และ ภายนอก พร้อมต่อสู้กับมลภาวะต่างๆที่จะต้องเจอในแต่ละวันได้อย่างมั่งใจ
✓  Vitamin E 400 IU ต่อเม็ด
✓  ช่วยบำรุงสุขภาพผิวให้แข็งแรง
✓  ช่วยต่อต้าน อนุมูลอิสระ
✓  ช่วยเสริมความแข็งแรงของเซลล์ในร่างกาย
✓  บรรเทาอาการตะคริว',
            'product_img' => 'https://bucket.fitwhey.com/ProductType/5c3360dbaf8bc39d05e0e13d63cf48df.webp',
            'product_price' => 299,
            'product_quantity' => 456,
            'product_type' => 'Vitamin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Product::create([
            'product_id' => 11,
            'product_name' => 'Vitamin C 1000MG',
            'product_description' => 'วิตามินยอดนิยม ที่มีประโยชน์ต่อร่างกายมากมาย และ เป็นวิตามินที่จำเป็นมากในช่วงที่มีโรคภัย และไวรัสมากมายที่เราต้องต่อสู้ในทุกๆวัน ต้องมีติดกระเป๋าไว้ ขาดไม่ได้!!
✓  Vitamin C 1,000 mg.*
✓  เสริมด้วย Rose Hip 25 mg.*
✓  ช่วยเสริมภูมิคุ้มกันให้กับร่างกาย
✓  ช่วยต่อต้าน อนุมูลอิสระ
✓  ช่วยบำรุงสุขภาพผิว ให้แข็งแรง และอ่อนวัย
✓  ป้องกันเลือดออกตามไรฟัน',
            'product_img' => 'https://bucket.fitwhey.com/ProductType/75920760885640001689fdeb810b32ce.webp',
            'product_price' => 299,
            'product_quantity' => 456,
            'product_type' => 'Vitamin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Product::create([
            'product_id' => 12,
            'product_name' => 'SHAKER BLACK SERIES',
            'product_description' => 'SHAKER BLACK SERIES',
            'product_img' => 'https://bucket.fitwhey.com/ProductType/6f4f21c0db8b4d6b02d170ed391e5aa1.webp',
            'product_price' => 299,
            'product_quantity' => 456,
            'product_type' => 'SHAKER',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Product::create([
            'product_id' => 13,
            'product_name' => 'Shaker Spider Bottle',
            'product_description' => 'NEW FITWHEY SPIDER BOTTLE
Fitwhey Shaker ลุคใหม่ พกพาสะดวกใช้งานง่าย จุได้เต็มที่ จบได้ในแก้วเดียว

3 Layers (Shaker ประกอบด้วย 3 ชั้น)

ชั้นแรก แก้ว Shaker สามารถใช้ใส่เวย์โปรตีน หรือ อาหารเสริมต่างๆผสมน้ำพร้อมดื่มได้ทันที
ชั้นสอง ช่องใส่วิตามินต่างๆ
ชั้นสาม ช่องใส่ผงโปรตีน และอาหารเสริมต่างๆเพื่อให้ง่ายต่อการพกพาไปได้ทุกที่ 
ผลิตจากวัสดุ Food Grade PP 
ขนาด 500ML
BPA FREE',
            'product_img' => 'https://bucket.fitwhey.com/ProductType/c1df650d3dbd40bcfd9e0152f831b376.webp',
            'product_price' => 250,
            'product_quantity' => 4596,
            'product_type' => 'SHAKER',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Product::create([
            'product_id' => 14,
            'product_name' => 'Stainless Steel Shaker Bottle',
            'product_description' => 'มาแล้ว FITWHEY SHAKER โฉมใหม่ !!! รุ่น Stainless Steel 1 Layer Shaker Bottle
ลุคใหม่ รูปทรงทันสมัย แข็งแรง ทนทาน ไม่แตกหักง่าย

ปากฝาขนาดใหญ่ เทใส่เวย์สะดวก ไม่หก
ฝาปิดเกลียว แน่นหนา ไม่รั่ว
มีตะแกรงช่วยละลาย เพื่อให้ผงเวย์ ผสมกับน้ำได้ดียิ่งขึ้น
ใหญ่สะใจ จุได้ 25 oz
ขนาดพอดี น้ำหนักเบา พกพาง่าย
BPA FREE!!',
            'product_img' => 'https://bucket.fitwhey.com/ProductType/d2db57d0bc514f955d6f7b7de169ae55.webp',
            'product_price' => 350,
            'product_quantity' => 456,
            'product_type' => 'SHAKER',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Product::create([
            'product_id' => 15,
            'product_name' => 'BAAM HOME TREADMILL',
            'product_description' => 'ขนาดเครื่อง กว้าง x ยาว x สูง : 700 x 1500 x 1200 mm.
พื้นที่สายพาน กว้าง x ยาว : 420 x 1250 mm.
น้ำหนักเครื่องโดยประมาณ : 60 KG.
Run Board Thickness : 15 mm.
Motor : DC 2 HP
Speed (ระดับความเร็ว) : 1 - 14 Km/Hr.
Incline (ระดับความชัน) : 0-15% Auto Incline
6 ระดับ การลดการแระแทก
Weight Limit (น้ำหนักผู้ใช้สูงสุดที่แนะนำ) : 110 kg.',
            'product_img' => 'https://bucket.fitwhey.com/products/c720a9d416e6dd0df099b990a7b2a75f.webp',
            'product_price' => 8999,
            'product_quantity' => 18,
            'product_type' => 'Exercise equipment',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Product::create([
            'product_id' => 16,
            'product_name' => 'YOGA MAT',
            'product_description' => 'น้ำหนักเบา ม้วนเก็บได้ เคลื่อนย้ายสะดวก
ผลิตจากยางธรรมชาติ 100% ขนาดใหญ่เป็นพิเศษ 183*61 ซม.
เบาะมีความหนาแน่นสูง ป้องกันเหงื่อซึม ไม่ดูดซับเหงื่อ​
ผิวสัมผัสนุ่ม ดูดซับความชื้นและระบายอากาศได้ดี แห้งเร็ว ไม่สะสมเชื้อรา&แบคทีเรีย
ยืดหยุ่น ไม่ลื่น ยึดเกาะดี รองรับสรีระและแรงกระแทกได้ดีเยี่ยม
สำหรับช่วยในการวางท่าที่เหมาะสม สำหรับมือใหม่และมืออาชีพ',
            'product_img' => 'https://bucket.fitwhey.com/ProductType/0c488a0029cf8c4bd896a98475f8a3b3.png',
            'product_price' => 240,
            'product_quantity' => 456,
            'product_type' => 'Exercise equipment',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Product::create([
            'product_id' => 17,
            'product_name' => 'BAAMXERCORE SPIN BIKES',
            'product_description' => 'Mainframe: Steel heavy duty frame 100 x 40 x 1.3 oval tube
Flywheel: 13.2 lbs (6kg) steel flywheel
Post: Spray painting seat and handle post
Drive System: Durable belt transmission 
Handlebar height: 89-96.5cm,
Seat cushion height: 96-103cm,
Seat cushion to handlebar: 75-85cm
Resistance & Brake System: Unlimited knob of tension adjustment with quick stop break system
Bearing: Best quality heavy duty bearing set
Transport Wheels: Yes
Crank: Two piece professional cranks
Seat adjustments: Move back and forth,up and down.
LCD mointor: shows distance,cal,time,speed
Seat Pad: Professional pressure-relieving hollow seat pad
Max User Weight: 264 lbs (120kg)
Product size: 109 x 50 x 123cm',
            'product_img' => 'https://bucket.fitwhey.com/ProductType/1308c0783d65676fdf7a496b4d0a4e90.webp',
            'product_price' => 7999,
            'product_quantity' => 37,
            'product_type' => 'Exercise equipment',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Product::create([
            'product_id' => 18,
            'product_name' => 'K - 118 Dumbbell Rack',
            'product_description' => 'ชั้นวางดัมเบล XERCORE DUMBBELL RACK
ชั้นวางดัมเบล แบบ 2 แถว (บน - ล่าง) K - 118 DUMBBELL RACKตัวรองดัมเบลเป็นยางอย่างดี สามารถรับน้ำหนักได้ดี ตัวโครงทำมาจากเหล็กคุณภาพสูง แข็งแรง ทนทาน ไม่งอ',
            'product_img' => 'https://bucket.fitwhey.com/products/920d6fe855387fb4fbd90f53bc056da5.png',
            'product_price' => 20000,
            'product_quantity' => 456,
            'product_type' => 'Exercise equipment',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Product::create([
            'product_id' => 19,
            'product_name' => '100% CREATINE 5000',
            'product_description' => 'เหมาะกับใคร ?
ต้องการสร้างความแข็งแรงของกล้ามเนื้อ, เพิ่มผลลัพธ์จากการทานโปรตีน/เวย์ เพียงอย่างเดียว',
            'product_img' => 'https://bucket.fitwhey.com/ProductType/b8f5ea2805c2ab9d1aa927eaa0e48621.webp',
            'product_price' => 375,
            'product_quantity' => 456,
            'product_type' => 'Creatine',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Product::create([
            'product_id' => 20,
            'product_name' => 'ANGEL CLEANSE',
            'product_description' => 'เหมาะกับใคร ?
คนที่มีปัญหาการขับถ่าย, คนที่กินผัก ผลไม้ น้อย, คนที่อยู่ในช่วงไดเอท',
            'product_img' => 'https://bucket.fitwhey.com/products/dfa98a7a2487bc1632fde144ae6f1b6f.webp',
            'product_price' => 750,
            'product_quantity' => 456,
            'product_type' => 'Vitamin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return 'Product added successfully!';
    }

    // แสดงจาก product ของแต่ละ id ใน database
    public function show($id)
    {
        // ดึงข้อมูลสินค้าจากฐานข้อมูลตาม product_id
        $product = Product::where('product_id', $id)->firstOrFail();

        // ส่งข้อมูลสินค้าไปยัง view ที่จะทำการแสดง
        return view('product.show', compact('product'));
    }

    public function showTrendingProducts()
    {
        $trendingProducts = Order::select('product_id', \DB::raw('COUNT(product_id) as order_count'))
            ->groupBy('product_id')
            ->orderByDesc('order_count')
            ->take(4) // Get the top 4 trending products
            ->get();

        // Now, retrieve product details for each trending product
        $products = Product::whereIn('product_id', $trendingProducts->pluck('product_id'))->get();

        return view('dashboard', compact('products'));
    }
}
