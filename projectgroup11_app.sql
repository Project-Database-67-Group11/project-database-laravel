-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 06:21 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectgroup11_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('1234@g.c|127.0.0.1', 'i:1;', 1728293612),
('1234@g.c|127.0.0.1:timer', 'i:1728293612;', 1728293612),
('1234@gmail.com|127.0.0.1', 'i:1;', 1728147118),
('1234@gmail.com|127.0.0.1:timer', 'i:1728147118;', 1728147118),
('1234@test.com|127.0.0.1', 'i:1;', 1728293626),
('1234@test.com|127.0.0.1:timer', 'i:1728293626;', 1728293626);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_information_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '0001_01_01_000000_create_users_table', 1),
(26, '0001_01_01_000001_create_cache_table', 1),
(27, '0001_01_01_000002_create_jobs_table', 1),
(28, '2024_10_02_144842_create_users_information_table', 1),
(29, '2024_10_02_144850_create_products_table', 1),
(30, '2024_10_02_144855_create_carts_table', 1),
(31, '2024_10_02_144859_create_orders_table', 1),
(32, '2024_10_02_144903_create_reviews_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_information_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `quantity` int NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','completed','cancelled') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `all_order_id` bigint UNSIGNED NOT NULL,
  `order_addr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `user_information_id`, `date`, `quantity`, `total_price`, `created_at`, `updated_at`, `status`, `payment`, `shipping`, `all_order_id`, `order_addr`) VALUES
(33, 1, 1, '2024-10-29', 1, 1928.55, '2024-10-29 07:05:25', '2024-10-29 10:10:08', 'completed', 'cash', 'fast', 1, 'Autsada Wiriya, 0999999999, 1234 m.3 ABCB WASD ChiangMai'),
(34, 3, 1, '2024-10-29', 1, 1928.55, '2024-10-29 07:05:25', '2024-10-29 10:10:08', 'completed', 'cash', 'fast', 1, 'Autsada Wiriya, 0999999999, 1234 m.3 ABCB WASD ChiangMai'),
(37, 1, 2, '2024-10-29', 1, 1604.14, '2024-10-29 10:35:08', '2024-10-29 10:35:08', 'pending', 'cash', 'normal', 2, 'fsdfsd fsdfsd, 312125, fdsfsd'),
(38, 1, 1, '2024-10-29', 1, 1924.96, '2024-10-29 10:35:19', '2024-10-29 10:59:25', 'cancelled', 'cash', 'normal', 3, 'Autsada Wiriya, 0999999999, 1234 m.3 ABCB WASD ChiangMai'),
(39, 12, 1, '2024-10-29', 1, 1924.96, '2024-10-29 10:35:19', '2024-10-29 10:59:25', 'cancelled', 'cash', 'normal', 3, 'Autsada Wiriya, 0999999999, 1234 m.3 ABCB WASD ChiangMai'),
(40, 3, 1, '2024-10-29', 1, 23089.89, '2024-10-29 11:10:59', '2024-10-29 11:12:05', 'cancelled', 'cash', 'normal', 4, 'Autsada Wiriya, 0999999999, 1234 m.3 ABCB WASD ChiangMai'),
(41, 5, 1, '2024-10-29', 2, 23089.89, '2024-10-29 11:10:59', '2024-10-29 11:12:05', 'cancelled', 'cash', 'normal', 4, 'Autsada Wiriya, 0999999999, 1234 m.3 ABCB WASD ChiangMai'),
(42, 18, 1, '2024-10-29', 1, 23089.89, '2024-10-29 11:10:59', '2024-10-29 11:12:05', 'cancelled', 'cash', 'normal', 4, 'Autsada Wiriya, 0999999999, 1234 m.3 ABCB WASD ChiangMai');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int NOT NULL,
  `product_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_img`, `product_price`, `product_quantity`, `product_type`, `created_at`, `updated_at`) VALUES
(1, 'MY WHEY PROTEIN', 'เหมาะกับใคร? ต้องการสร้างกล้ามเนื้อ, เร่งการฟื้นฟูกล้ามเนื้อ, อยากได้เวย์ที่ราคาถูก และคุณภาพดี,นักกีฬา', 'https://bucket.fitwhey.com/ProductType/b76f455d70bcdd92ab1d90cdb83843a2.webp', 1495.00, 512, 'Protein', '2024-10-05 08:20:49', '2024-10-05 08:20:49'),
(2, 'BAAM CREATINE MAX ATP 5000', 'เหมาะกับใคร? ต้องการสร้างความแข็งแรงของกล้ามเนื้อ, เพิ่มผลลัพธ์จากการทานโปรตีน/เวย์ เพียงอย่างเดียว', 'https://bucket.fitwhey.com/products/6b06d5e9eb360935e56fd050cab6573f.webp', 375.00, 87, 'Creatine', '2024-10-05 08:25:53', '2024-10-05 08:25:53'),
(3, 'Vitamin D3 5000iu', 'วิตามินอีกหนึ่งตัวที่คนส่วนใหญ่ได้รับไม่เพียงพอ โดยเฉพาะ คนเมือง ที่อยู่แต่ในรถ ในตึก มีโอกาสโดนแดดช่วงเช่าๆน้อยมาก แถมแดดช่วงอื่นก็สู้ไม่ไหว การเสริมด้วยการกิน จึงช่วยได้มาก และยังเป็นวิตามิน ที่สำคัญมากๆ ตัวหนึ่งของสายกล้าม', 'https://bucket.fitwhey.com/products/2de182656e7208c79fd4f8b706e204ca.webp', 299.00, 456, 'Vitamin', '2024-10-07 02:44:00', '2024-10-07 02:44:00'),
(4, 'ISO ABSOLUTE ZERO', 'เหมาะกับใคร ?\nต้องการสร้างกล้ามเนื้อ แบบคุมไขมัน, เร่งการฟื้นฟูกล้ามเนื้อ, อยากได้เวย์คุณภาพสูง, คนที่แพ้แลคโตสในนม, นักกีฬา, ผู้สูงอายุ', 'https://bucket.fitwhey.com/ProductType/26e75a452d8d4cad245b03203fc8e145.webp', 2295.00, 123, 'Protein', '2024-10-19 02:17:19', '2024-10-19 02:17:19'),
(5, 'FITSOY 100% SOY ISOLATE', 'FIT SOY 100% SOY ISOLATE โปรตีนจากพืช (Plant Protein) เหมาะกับใคร?\nคนที่ต้องการเสริมโปรตีน, สร้างกล้ามเนื้อ, ฟื้นฟูกล้ามเนื้อ, ไม่ทานนม หรือ เนื้อสัตว์', 'https://bucket.fitwhey.com/products/1c3988c5c91b0c4d2a8d534b8f76dc44.webp', 610.00, 216, 'Protein', '2024-10-19 02:17:19', '2024-10-19 02:17:19'),
(6, 'Ultra Mass', 'เหมาะกับใคร ?\nคนผอม แบบไม่มีพุง มีแรงน้อย ต้องการเพิ่มน้ำหนัก และกล้ามเนื้อ, คนที่กินอาหารต่อวันน้อยเกินไป, คนที่ใช้พลังงานสูงมาก ต้องการพลังงานทดแทน​', 'https://bucket.fitwhey.com/ProductType/4537cc8f2a2d44accfb0e234b030a367.webp', 2799.00, 34, 'Protein', '2024-10-19 02:17:19', '2024-10-19 02:17:19'),
(7, 'BAAM MY WHEY PROTEIN THAI SERIES', 'เหมาะกับใคร?\nต้องการสร้างกล้ามเนื้อ, เร่งการฟื้นฟูกล้ามเนื้อ, อยากได้เวย์ที่ราคาถูก และคุณภาพดี, นักกีฬา​', 'https://bucket.fitwhey.com/ProductType/853107e0fd62658bba426dd5f71f4b37.webp', 1495.00, 65, 'Protein', '2024-10-19 02:17:19', '2024-10-19 02:17:19'),
(8, 'BAAM ZMA', 'เหมาะกับใคร ?\nคนที่นอนหลับได้ไม่ลึก, คนที่เวลานอนน้อย, ต้องการเพิ่มฮอร์โมนเพศชายให้เต็มที่, ต้องการเพิ่มความแข็งแรงของกล้ามเนื้อ', 'https://bucket.fitwhey.com/products/5024d12edf58bc09a522d30cb62ef26f.webp', 600.00, 1234, 'Vitamin', '2024-10-19 02:17:19', '2024-10-19 02:17:19'),
(9, 'Vitamin A 25000iu', 'วิตามินที่ช่วยรักษาสุขภาพของดวงตา และช่วยเสริมภูมิคุ้มกัน ต้านอนุมูลอิสระ ใครที่ใช้ดวงตาเยอะ ไม่ว่าจะทำงาน หรืออ่านหนังสือเยอะ ควรมีติดกระเป๋าไว้\n✓  Vitamin A 7,500 mcg. (25,000 IU)*\n✓  บำรุงสายตา\n✓  ช่วยต่อต้าน อนุมูลอิสระ\n✓  ช่วยเสริมภูมิคุ้มกันให้กับร่างกาย\n✓  ช่วยบำรุงสุขภาพผิว ต่อสู้สิว\n✓  ป้องกันเลือดออกตามไรฟัน', 'https://bucket.fitwhey.com/products/7f4afd2a0f5165c6b8a3ef6914edede7.webp', 299.00, 456, 'Vitamin', '2024-10-19 02:17:19', '2024-10-19 02:17:19'),
(10, 'Vitamin E 400iu', 'อีกหนึ่งวิตามินที่ช่วยเรื่องความงาม และการต้านอนุมูลอิสระ เพื่อให้เราแข็งแรงทั้งภายใน และ ภายนอก พร้อมต่อสู้กับมลภาวะต่างๆที่จะต้องเจอในแต่ละวันได้อย่างมั่งใจ\n✓  Vitamin E 400 IU ต่อเม็ด\n✓  ช่วยบำรุงสุขภาพผิวให้แข็งแรง\n✓  ช่วยต่อต้าน อนุมูลอิสระ\n✓  ช่วยเสริมความแข็งแรงของเซลล์ในร่างกาย\n✓  บรรเทาอาการตะคริว', 'https://bucket.fitwhey.com/ProductType/5c3360dbaf8bc39d05e0e13d63cf48df.webp', 299.00, 456, 'Vitamin', '2024-10-19 02:17:19', '2024-10-19 02:17:19'),
(11, 'Vitamin C 1000MG', 'วิตามินยอดนิยม ที่มีประโยชน์ต่อร่างกายมากมาย และ เป็นวิตามินที่จำเป็นมากในช่วงที่มีโรคภัย และไวรัสมากมายที่เราต้องต่อสู้ในทุกๆวัน ต้องมีติดกระเป๋าไว้ ขาดไม่ได้!!\n✓  Vitamin C 1,000 mg.*\n✓  เสริมด้วย Rose Hip 25 mg.*\n✓  ช่วยเสริมภูมิคุ้มกันให้กับร่างกาย\n✓  ช่วยต่อต้าน อนุมูลอิสระ\n✓  ช่วยบำรุงสุขภาพผิว ให้แข็งแรง และอ่อนวัย\n✓  ป้องกันเลือดออกตามไรฟัน', 'https://bucket.fitwhey.com/ProductType/75920760885640001689fdeb810b32ce.webp', 299.00, 456, 'Vitamin', '2024-10-19 02:17:19', '2024-10-19 02:17:19'),
(12, 'SHAKER BLACK SERIES', 'SHAKER BLACK SERIES', 'https://bucket.fitwhey.com/ProductType/6f4f21c0db8b4d6b02d170ed391e5aa1.webp', 299.00, 456, 'SHAKER', '2024-10-19 02:17:19', '2024-10-19 02:17:19'),
(13, 'Shaker Spider Bottle', 'NEW FITWHEY SPIDER BOTTLE\nFitwhey Shaker ลุคใหม่ พกพาสะดวกใช้งานง่าย จุได้เต็มที่ จบได้ในแก้วเดียว\n\n3 Layers (Shaker ประกอบด้วย 3 ชั้น)\n\nชั้นแรก แก้ว Shaker สามารถใช้ใส่เวย์โปรตีน หรือ อาหารเสริมต่างๆผสมน้ำพร้อมดื่มได้ทันที\nชั้นสอง ช่องใส่วิตามินต่างๆ\nชั้นสาม ช่องใส่ผงโปรตีน และอาหารเสริมต่างๆเพื่อให้ง่ายต่อการพกพาไปได้ทุกที่ \nผลิตจากวัสดุ Food Grade PP \nขนาด 500ML\nBPA FREE', 'https://bucket.fitwhey.com/ProductType/c1df650d3dbd40bcfd9e0152f831b376.webp', 250.00, 4596, 'SHAKER', '2024-10-19 02:17:19', '2024-10-19 02:17:19'),
(14, 'Stainless Steel Shaker Bottle', 'มาแล้ว FITWHEY SHAKER โฉมใหม่ !!! รุ่น Stainless Steel 1 Layer Shaker Bottle\nลุคใหม่ รูปทรงทันสมัย แข็งแรง ทนทาน ไม่แตกหักง่าย\n\nปากฝาขนาดใหญ่ เทใส่เวย์สะดวก ไม่หก\nฝาปิดเกลียว แน่นหนา ไม่รั่ว\nมีตะแกรงช่วยละลาย เพื่อให้ผงเวย์ ผสมกับน้ำได้ดียิ่งขึ้น\nใหญ่สะใจ จุได้ 25 oz\nขนาดพอดี น้ำหนักเบา พกพาง่าย\nBPA FREE!!', 'https://bucket.fitwhey.com/ProductType/d2db57d0bc514f955d6f7b7de169ae55.webp', 350.00, 456, 'SHAKER', '2024-10-19 02:17:19', '2024-10-19 02:17:19'),
(15, 'BAAM HOME TREADMILL', 'ขนาดเครื่อง กว้าง x ยาว x สูง : 700 x 1500 x 1200 mm.\nพื้นที่สายพาน กว้าง x ยาว : 420 x 1250 mm.\nน้ำหนักเครื่องโดยประมาณ : 60 KG.\nRun Board Thickness : 15 mm.\nMotor : DC 2 HP\nSpeed (ระดับความเร็ว) : 1 - 14 Km/Hr.\nIncline (ระดับความชัน) : 0-15% Auto Incline\n6 ระดับ การลดการแระแทก\nWeight Limit (น้ำหนักผู้ใช้สูงสุดที่แนะนำ) : 110 kg.', 'https://bucket.fitwhey.com/products/c720a9d416e6dd0df099b990a7b2a75f.webp', 8999.00, 18, 'Exercise equipment', '2024-10-19 02:17:19', '2024-10-19 02:17:19'),
(16, 'YOGA MAT', 'น้ำหนักเบา ม้วนเก็บได้ เคลื่อนย้ายสะดวก\nผลิตจากยางธรรมชาติ 100% ขนาดใหญ่เป็นพิเศษ 183*61 ซม.\nเบาะมีความหนาแน่นสูง ป้องกันเหงื่อซึม ไม่ดูดซับเหงื่อ​\nผิวสัมผัสนุ่ม ดูดซับความชื้นและระบายอากาศได้ดี แห้งเร็ว ไม่สะสมเชื้อรา&แบคทีเรีย\nยืดหยุ่น ไม่ลื่น ยึดเกาะดี รองรับสรีระและแรงกระแทกได้ดีเยี่ยม\nสำหรับช่วยในการวางท่าที่เหมาะสม สำหรับมือใหม่และมืออาชีพ', 'https://bucket.fitwhey.com/ProductType/0c488a0029cf8c4bd896a98475f8a3b3.png', 240.00, 456, 'Exercise equipment', '2024-10-19 02:17:19', '2024-10-19 02:17:19'),
(17, 'BAAMXERCORE SPIN BIKES', 'Mainframe: Steel heavy duty frame 100 x 40 x 1.3 oval tube\nFlywheel: 13.2 lbs (6kg) steel flywheel\nPost: Spray painting seat and handle post\nDrive System: Durable belt transmission \nHandlebar height: 89-96.5cm,\nSeat cushion height: 96-103cm,\nSeat cushion to handlebar: 75-85cm\nResistance & Brake System: Unlimited knob of tension adjustment with quick stop break system\nBearing: Best quality heavy duty bearing set\nTransport Wheels: Yes\nCrank: Two piece professional cranks\nSeat adjustments: Move back and forth,up and down.\nLCD mointor: shows distance,cal,time,speed\nSeat Pad: Professional pressure-relieving hollow seat pad\nMax User Weight: 264 lbs (120kg)\nProduct size: 109 x 50 x 123cm', 'https://bucket.fitwhey.com/ProductType/1308c0783d65676fdf7a496b4d0a4e90.webp', 7999.00, 37, 'Exercise equipment', '2024-10-19 02:17:19', '2024-10-19 02:17:19'),
(18, 'K - 118 Dumbbell Rack', 'ชั้นวางดัมเบล XERCORE DUMBBELL RACK\nชั้นวางดัมเบล แบบ 2 แถว (บน - ล่าง) K - 118 DUMBBELL RACKตัวรองดัมเบลเป็นยางอย่างดี สามารถรับน้ำหนักได้ดี ตัวโครงทำมาจากเหล็กคุณภาพสูง แข็งแรง ทนทาน ไม่งอ', 'https://bucket.fitwhey.com/products/920d6fe855387fb4fbd90f53bc056da5.png', 20000.00, 456, 'Exercise equipment', '2024-10-19 02:17:19', '2024-10-19 02:17:19'),
(19, '100% CREATINE 5000', 'เหมาะกับใคร ?\nต้องการสร้างความแข็งแรงของกล้ามเนื้อ, เพิ่มผลลัพธ์จากการทานโปรตีน/เวย์ เพียงอย่างเดียว', 'https://bucket.fitwhey.com/ProductType/b8f5ea2805c2ab9d1aa927eaa0e48621.webp', 375.00, 456, 'Creatine', '2024-10-19 02:17:19', '2024-10-19 02:17:19'),
(20, 'ANGEL CLEANSE', 'เหมาะกับใคร ?\nคนที่มีปัญหาการขับถ่าย, คนที่กินผัก ผลไม้ น้อย, คนที่อยู่ในช่วงไดเอท', 'https://bucket.fitwhey.com/products/dfa98a7a2487bc1632fde144ae6f1b6f.webp', 750.00, 456, 'Vitamin', '2024-10-19 02:17:19', '2024-10-19 02:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` bigint UNSIGNED NOT NULL,
  `user_information_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Ey6lp4CfXqVmOPmXIAv2YFNSna6jIdktnNpZQIqE', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZ2xJa1I5OGJ1REJmSlFnd2RtZ2JVMzBPOWdHN1VRbHcyWUU3RU8zUiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3Byb2ZpbGUiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3Byb2ZpbGUvYWRkcmVzcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1730226065),
('OqinXu16I3LnjsPXVBMC4MhzjbLIgQeA2VRg1ljZ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYUhNQktUQmF4V1ZBUnpvSjdVUmNTTjFZZU10Q1hNa1VLU3VPd3oyRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9maWxlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1730225928),
('z0p9viFiqblSourqLQYTx3uQxP6IVimFauZQQe9F', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQ3djRmVnWXNQWlprbDZvUlZhR0RTT0cyMXh5aldaNTdaRXgyalRiMyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcHJvZmlsZS9wZW5kaW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1730225131);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'autsada', 'autsada@test.com', NULL, '$2y$12$QCwiadyl1Pk6swa0o/ir1.hPILh1u3CQhg5JzgLCfRLynACkjjjsC', NULL, '2024-10-05 08:17:55', '2024-10-21 00:35:20'),
(2, 'test1', 'test1@test.com', NULL, '$2y$12$aY.LouskHeiaYmlHn7o1M.on4UPy4fEDqC6G9rN.2aBc6vBemXzrS', NULL, '2024-10-05 08:19:34', '2024-10-05 08:19:34'),
(3, '1234', '1234@g.com', NULL, '$2y$12$PWlWleUcwhenkIPB5TSS/.Rey/L25doMF/EqbPlfFnD0AD778cxJ.', NULL, '2024-10-05 09:53:55', '2024-10-05 09:53:55'),
(4, 'projectgroup11', 'root@cmu.c', NULL, '$2y$12$TZNyvquXsLw3th8PCV.A4OzQzHmov9zDG57bWs4gOXZsj1e9GgGH6', NULL, '2024-10-29 11:20:14', '2024-10-29 11:20:14');

-- --------------------------------------------------------

--
-- Table structure for table `users_information`
--

CREATE TABLE `users_information` (
  `user_information_id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_information`
--

INSERT INTO `users_information` (`user_information_id`, `first_name`, `last_name`, `phone_number`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Autsada', 'Wiriya', '0999999999', '1234 m.3 ABCB WASD ChiangMai', 1, '2024-10-05 08:17:55', '2024-10-21 00:44:54'),
(2, 'fsdfsd', 'fsdfsd', '312125', 'fdsfsd', 2, '2024-10-05 08:19:34', '2024-10-29 10:34:56'),
(3, '', '', '', '', 3, '2024-10-05 09:53:55', '2024-10-05 09:53:55'),
(4, 'asdfgh', 'zxcvbnm', '0998887777', 'lololololo 1234 iooio', 4, '2024-10-29 11:20:14', '2024-10-29 11:21:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_information_id_foreign` (`user_information_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`),
  ADD KEY `orders_user_information_id_foreign` (`user_information_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `reviews_user_information_id_foreign` (`user_information_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_information`
--
ALTER TABLE `users_information`
  ADD PRIMARY KEY (`user_information_id`),
  ADD KEY `users_information_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_information`
--
ALTER TABLE `users_information`
  MODIFY `user_information_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_information_id_foreign` FOREIGN KEY (`user_information_id`) REFERENCES `users_information` (`user_information_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_information_id_foreign` FOREIGN KEY (`user_information_id`) REFERENCES `users_information` (`user_information_id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_information_id_foreign` FOREIGN KEY (`user_information_id`) REFERENCES `users_information` (`user_information_id`) ON DELETE CASCADE;

--
-- Constraints for table `users_information`
--
ALTER TABLE `users_information`
  ADD CONSTRAINT `users_information_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
