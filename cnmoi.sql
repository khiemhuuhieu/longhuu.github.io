-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 31, 2021 lúc 04:29 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cnmoi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adminEmail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adminUser` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adminPass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'Huu', 'nguyendinhhuu64@gmail.com', 'huuAdmin', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category_slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_slug`, `category_desc`) VALUES
(1, 'SÃ¡ch Kinh Táº¿ -  KÄ© NÄƒng', 'sach-kinh-te-ki-nang', 'sÃ¡ch viáº¿t vá» kÄ© nÄƒng trong cÃ¡c hoáº¡t Ä‘á»™ng kinh táº¿, cÃ¡ch giáº£i quyáº¿t, Ä‘áº§u tÆ° cÃ³ hiá»‡u quáº£'),
(2, 'Nghá»‡ Thuáº­t Sá»‘ng - TÃ¢m LÃ½', 'nghe-thuat-song-tam-ly', 'sÃ¡ch viáº¿t vá» cÃ¡ch, giáº£i quyáº¿t váº¥n Ä‘á» trong cuá»™c sá»‘ng'),
(4, 'SÃ¡ch VÄƒn Há»c Viá»‡t Nam', 'sach-van-hoc-viet-nam', 'SÃ¡ch VÄƒn Há»c Viá»‡t Nam'),
(5, 'SÃ¡ch VÄƒn Há»c NÆ°á»›c NgoÃ i', 'sach-van-hoc-nuoc-ngoai', 'SÃ¡ch VÄƒn Há»c NÆ°á»›c NgoÃ i'),
(6, 'SÃ¡ch thiáº¿u nhi', 'sach-thieu-nhi', 'SÃ¡ch thiáº¿u nhi'),
(7, 'SÃ¡ch GiÃ¡o Dá»¥c - Gia ÄÃ¬nh', 'sach-giao-duc-gia-dinh', 'SÃ¡ch GiÃ¡o Dá»¥c - Gia ÄÃ¬nh'),
(8, 'SÃ¡ch Lá»‹ch Sá»­', 'sach-lich-su', 'SÃ¡ch Lá»‹ch Sá»­'),
(9, 'SÃ¡ch VÄƒn HÃ³a - Nghá»‡ Thuáº­t', 'sach-van-hoa-nghe-thuat', 'SÃ¡ch VÄƒn HÃ³a - Nghá»‡ Thuáº­t'),
(10, 'SÃ¡ch Khoa Há»c - Triáº¿t Há»c', 'sach-khoa-hoc-triet-hoc', 'SÃ¡ch Khoa Há»c - Triáº¿t Há»c'),
(11, 'SÃ¡ch TÃ¢m Linh - TÃ´n GiÃ¡o', 'sach-tam-linh-ton-giao', 'SÃ¡ch TÃ¢m Linh - TÃ´n GiÃ¡o'),
(12, 'SÃ¡ch Y Há»c - Thá»±c DÆ°á»¡ng', 'sach-y-hoc-thuc-duong', 'SÃ¡ch Y Há»c - Thá»±c DÆ°á»¡ng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `comment_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `comment`, `comment_name`, `comment_date`, `comment_product_id`) VALUES
(1, 'sdfsdfsdfxcvxdcvxcvxcvxcfv', 'huu', '2021-10-30 09:23:46', 10),
(2, 'zdfgzxdfsdfsdfsdf', 'huu', '2021-10-30 09:24:32', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `customer_phone` int(12) NOT NULL,
  `customer_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `customer_password` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_phone`, `customer_address`, `customer_password`, `customer_email`) VALUES
(1, 'Nguyá»…n ÄÃ¬nh Há»¯u111111', 398202124, 'Há»“ ChÃ­ Minh', 'e10adc3949ba59abbe56e057f20f883e', 'nguyendinhhuu64@gmail.com'),
(2, 'Nguyá»…n ÄÃ¬nh Há»¯u111111', 398202124, 'Há»“ ChÃ­ Minh', 'e10adc3949ba59abbe56e057f20f883e', 'nguyendinhhuu64@gmail.com'),
(3, 'Nguyá»…n ÄÃ¬nh Há»¯u111111', 398202124, 'Há»“ ChÃ­ Minh', 'e10adc3949ba59abbe56e057f20f883e', 'nguyendinhhuu64@gmail.com'),
(4, 'Hoang Trong Long', 398202122, 'HÃ  TÄ©nh', 'e10adc3949ba59abbe56e057f20f883e', 'nguyendinhhuu1998@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_like`
--

CREATE TABLE `tbl_like` (
  `id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(225) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_like`
--

INSERT INTO `tbl_like` (`id`, `customerId`, `productId`, `productName`, `price`, `image`) VALUES
(2, 1, 8, 'Láº­p Káº¿ Hoáº¡ch Kinh Doanh Hiá»‡u Quáº£', '256000', 'be59241c6b.jpg'),
(4, 1, 9, 'Bank 4.0 - Giao dá»‹ch má»i nÆ¡i, khÃ´ng chá»‰ lÃ  ngÃ¢n hÃ ng', '250000', '88b1db6762.jpg'),
(5, 4, 9, 'Bank 4.0 - Giao dá»‹ch má»i nÆ¡i, khÃ´ng chá»‰ lÃ  ngÃ¢n hÃ ng', '250000', '88b1db6762.jpg'),
(6, 4, 10, 'Ngoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n', '360000', '955dca73a9.jpg'),
(7, 4, 8, 'Láº­p Káº¿ Hoáº¡ch Kinh Doanh Hiá»‡u Quáº£', '256000', 'be59241c6b.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `customerId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 0,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `productName`, `customerId`, `quantity`, `price`, `image`, `status`, `order_date`) VALUES
(7, 9, 'Bank 4.0 - Giao dá»‹ch má»i nÆ¡i, khÃ´ng chá»‰ lÃ  ngÃ¢n hÃ ng', 1, 1, '250000', '88b1db6762.jpg', 2, '2021-10-28 07:11:39'),
(8, 10, 'Ngoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n', 1, 1, '360000', '955dca73a9.jpg', 2, '2021-10-30 14:08:55'),
(9, 10, 'Ngoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n', 1, 1, '360000', '955dca73a9.jpg', 1, '2021-10-30 14:24:16'),
(10, 10, 'Ngoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n', 4, 1, '360000', '955dca73a9.jpg', 0, '2021-10-30 18:52:02'),
(11, 8, 'Láº­p Káº¿ Hoáº¡ch Kinh Doanh Hiá»‡u Quáº£', 4, 1, '256000', 'be59241c6b.jpg', 0, '2021-10-30 18:53:57'),
(12, 10, 'Ngoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n', 4, 4, '1440000', '955dca73a9.jpg', 0, '2021-10-30 19:07:27'),
(13, 8, 'Láº­p Káº¿ Hoáº¡ch Kinh Doanh Hiá»‡u Quáº£', 4, 2, '512000', 'be59241c6b.jpg', 0, '2021-10-30 19:09:04'),
(14, 8, 'Láº­p Káº¿ Hoáº¡ch Kinh Doanh Hiá»‡u Quáº£', 4, 1, '256000', 'be59241c6b.jpg', 0, '2021-10-30 19:10:32'),
(15, 10, 'Ngoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n', 1, 1, '360000', '955dca73a9.jpg', 0, '2021-10-30 19:13:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_products`
--

CREATE TABLE `tbl_products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `productSlug` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productPrice` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `productQuantity` int(10) NOT NULL,
  `productDesc` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `orderbydisplay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_products`
--

INSERT INTO `tbl_products` (`productId`, `productName`, `productSlug`, `image`, `productPrice`, `productQuantity`, `productDesc`, `category_id`, `orderbydisplay`) VALUES
(7, 'Ma BÃ¹n LÆ°u Manh VÃ  Nhá»¯ng CÃ¢u Chuyá»‡n KhÃ¡c', 'ma-bun-luu-manh-va-nhung-cau-chuyen-khac', '468b127104.jpg', '239000', 120, 'Khi báº¯t Ä‘áº§u thÃ nh láº­p doanh nghiá»‡p hay má»Ÿ rá»™ng quy mÃ´ hoáº¡t Ä‘á»™ng, láº­p ra má»™t báº£n káº¿ hoáº¡ch kinh doanh lÃ  bÆ°á»›c Ä‘i Ä‘áº§u tiÃªn khÃ´ng thá»ƒ thiáº¿u. Báº£n káº¿ hoáº¡ch kinh doanh cÃ ng Ä‘Æ°á»£c chuáº©n bá»‹ ká»¹ lÆ°á»¡ng vÃ  lÃ´i cuá»‘n bao nhiÃªu, cÆ¡ há»™i ghi Ä‘iá»ƒm trÆ°á»›c cÃ¡c nhÃ  Ä‘áº§u tÆ° cÃ ng lá»›n báº¥y nhiÃªu. Pháº£i chÄƒng, thÃ´ng qua báº£n káº¿ hoáº¡ch kinh doanh, báº¡n muá»‘n ngÆ°á»i Ä‘á»c:\r\n\r\n- Äáº§u tÆ° vÃ o má»™t Ã½ tÆ°á»Ÿng kinh doanh má»›i hay má»™t doanh nghiá»‡p Ä‘ang hoáº¡t Ä‘á»™ng?\r\n\r\n- Mua láº¡i doanh nghiá»‡p cá»§a báº¡n?\r\n\r\n- Tham gia liÃªn doanh vá»›i báº¡n?\r\n\r\n- Cháº¥p nháº­n Ä‘á» nghá»‹ cá»§a báº¡n Ä‘á»ƒ thá»±c hiá»‡n há»£p Ä‘á»“ng?\r\n\r\n- Cáº¥p cho báº¡n má»™t khoáº£n há»— trá»£ hoáº·c phÃª duyá»‡t theo quy Ä‘á»‹nh?\r\n\r\n- Thuyáº¿t phá»¥c há»™i Ä‘á»“ng quáº£n trá»‹ thay Ä‘á»•i phÆ°Æ¡ng hÆ°á»›ng hoáº¡t Ä‘á»™ng doanh nghiá»‡p cá»§a báº¡n?\r\n\r\nCuá»‘n sÃ¡ch â€œLáº­p káº¿ hoáº¡ch kinh doanh hiá»‡u quáº£â€ sáº½ hÆ°á»›ng dáº«n báº¡n cÃ¡ch Ä‘á»ƒ táº¡o ra báº£n káº¿ hoáº¡ch kinh doanh thu hÃºt má»i tá»• chá»©c tÃ i chÃ­nh, khiáº¿n há» pháº£i Ä‘Ã¡p á»©ng mong muá»‘n cá»§a báº¡n vÃ  há»— trá»£ báº¡n tá»›i cÃ¹ng trong cÃ´ng viá»‡c kinh doanh. ThÃ´ng qua cuá»‘n sÃ¡ch, báº¡n sáº½ biáº¿t cÃ¡ch:\r\n\r\nTáº¡o ra báº£n káº¿ hoáº¡ch kinh doanh hoÃ n chá»‰nh XÃ¢y dá»±ng chiáº¿n lÆ°á»£c hoáº¡t Ä‘á»™ng cho doanh nghiá»‡p.\r\n\r\nÄÆ°a ra dá»± bÃ¡o kinh doanh sÃ¡t vá»›i thá»±c táº¿.\r\n\r\nNáº¯m rÃµ cÃ¡c thÃ´ng tin tÃ i chÃ­nh áº£nh hÆ°á»Ÿng lá»›n tá»›i doanh nghiá»‡p.\r\n\r\nTrong quÃ¡ trÃ¬nh xÃ¢y dá»±ng káº¿ hoáº¡ch, viá»‡c tham kháº£o Ã½ kiáº¿n chuyÃªn gia lÃ  Ä‘iá»u cáº§n thiáº¿t nhÆ°ng báº¡n pháº£i lÃ  ngÆ°á»i Ä‘Ã³ng gÃ³p chÃ­nh vÃ  hiá»ƒu tÆ°á»ng táº­n má»—i chi tiáº¿t cÃ³ trong Ä‘Ã³. HÃ£y xem viá»‡c láº­p káº¿ hoáº¡ch giá»‘ng nhÆ° viá»‡c truyá»n Ä‘áº¡t cÃ¢u chuyá»‡n cá»§a mÃ¬nh nháº±m thuyáº¿t phá»¥c ngÆ°á»i Ä‘á»c Ä‘á»“ng hÃ nh cÃ¹ng báº¡n trÃªn con Ä‘Æ°á»ng chinh phá»¥c má»¥c tiÃªu kinh doanh.\r\n\r\nBáº¡n chá»‰ cÃ³ má»™t cÆ¡ há»™i duy nháº¥t Ä‘á»ƒ táº¡o áº¥n tÆ°á»£ng Ä‘áº§u tiÃªn tá»‘t Ä‘áº¹p. Äá»«ng Ä‘á»ƒ nÃ³ vá»¥t máº¥t. HÃ£y trÃ¬nh bÃ y má»™t vÄƒn báº£n cÃ³ tÃ­nh thuyáº¿t phá»¥c cao, bá»‘ cá»¥c Ä‘áº¹p máº¯t, khÃ´ng máº¯c lá»—i chÃ­nh táº£, ngá»¯ phÃ¡p, bao gá»“m cÃ¡c váº¥n Ä‘á» trá»ng tÃ¢m vÃ  cuá»‘i cÃ¹ng lÃ  chá»©a cÃ¡c thÃ´ng tin bá»• trá»£ cáº§n thiáº¿t.\r\n\r\nBáº±ng kiáº¿n thá»©c, kinh nghiá»‡m cá»§a mÃ¬nh, Brian Finch - má»™t chuyÃªn gia trong lÄ©nh vá»±c tÆ° váº¥n láº­p káº¿ hoáº¡ch kinh doanh vÃ  quáº£n lÃ½ tÃ i chÃ­nh - cháº¯c cháº¯n sáº½ giÃºp báº¡n xÃ¢y dá»±ng thÃ nh cÃ´ng káº¿ hoáº¡ch kinh doanh cá»§a riÃªng mÃ¬nh.', 4, 0),
(8, 'Láº­p Káº¿ Hoáº¡ch Kinh Doanh Hiá»‡u Quáº£', 'lap-ke-hoach-kinh-doanh-hieu-qua', 'be59241c6b.jpg', '256000', 10, 'Khi báº¯t Ä‘áº§u thÃ nh láº­p doanh nghiá»‡p hay má»Ÿ rá»™ng quy mÃ´ hoáº¡t Ä‘á»™ng, láº­p ra má»™t báº£n káº¿ hoáº¡ch kinh doanh lÃ  bÆ°á»›c Ä‘i Ä‘áº§u tiÃªn khÃ´ng thá»ƒ thiáº¿u. Báº£n káº¿ hoáº¡ch kinh doanh cÃ ng Ä‘Æ°á»£c chuáº©n bá»‹ ká»¹ lÆ°á»¡ng vÃ  lÃ´i cuá»‘n bao nhiÃªu, cÆ¡ há»™i ghi Ä‘iá»ƒm trÆ°á»›c cÃ¡c nhÃ  Ä‘áº§u tÆ° cÃ ng lá»›n báº¥y nhiÃªu. Pháº£i chÄƒng, thÃ´ng qua báº£n káº¿ hoáº¡ch kinh doanh, báº¡n muá»‘n ngÆ°á»i Ä‘á»c:\r\n\r\n- Äáº§u tÆ° vÃ o má»™t Ã½ tÆ°á»Ÿng kinh doanh má»›i hay má»™t doanh nghiá»‡p Ä‘ang hoáº¡t Ä‘á»™ng?\r\n\r\n- Mua láº¡i doanh nghiá»‡p cá»§a báº¡n?\r\n\r\n- Tham gia liÃªn doanh vá»›i báº¡n?\r\n\r\n- Cháº¥p nháº­n Ä‘á» nghá»‹ cá»§a báº¡n Ä‘á»ƒ thá»±c hiá»‡n há»£p Ä‘á»“ng?\r\n\r\n- Cáº¥p cho báº¡n má»™t khoáº£n há»— trá»£ hoáº·c phÃª duyá»‡t theo quy Ä‘á»‹nh?\r\n\r\n- Thuyáº¿t phá»¥c há»™i Ä‘á»“ng quáº£n trá»‹ thay Ä‘á»•i phÆ°Æ¡ng hÆ°á»›ng hoáº¡t Ä‘á»™ng doanh nghiá»‡p cá»§a báº¡n?\r\n\r\nCuá»‘n sÃ¡ch â€œLáº­p káº¿ hoáº¡ch kinh doanh hiá»‡u quáº£â€ sáº½ hÆ°á»›ng dáº«n báº¡n cÃ¡ch Ä‘á»ƒ táº¡o ra báº£n káº¿ hoáº¡ch kinh doanh thu hÃºt má»i tá»• chá»©c tÃ i chÃ­nh, khiáº¿n há» pháº£i Ä‘Ã¡p á»©ng mong muá»‘n cá»§a báº¡n vÃ  há»— trá»£ báº¡n tá»›i cÃ¹ng trong cÃ´ng viá»‡c kinh doanh. ThÃ´ng qua cuá»‘n sÃ¡ch, báº¡n sáº½ biáº¿t cÃ¡ch:\r\n\r\nTáº¡o ra báº£n káº¿ hoáº¡ch kinh doanh hoÃ n chá»‰nh XÃ¢y dá»±ng chiáº¿n lÆ°á»£c hoáº¡t Ä‘á»™ng cho doanh nghiá»‡p.\r\n\r\nÄÆ°a ra dá»± bÃ¡o kinh doanh sÃ¡t vá»›i thá»±c táº¿.\r\n\r\nNáº¯m rÃµ cÃ¡c thÃ´ng tin tÃ i chÃ­nh áº£nh hÆ°á»Ÿng lá»›n tá»›i doanh nghiá»‡p.\r\n\r\nTrong quÃ¡ trÃ¬nh xÃ¢y dá»±ng káº¿ hoáº¡ch, viá»‡c tham kháº£o Ã½ kiáº¿n chuyÃªn gia lÃ  Ä‘iá»u cáº§n thiáº¿t nhÆ°ng báº¡n pháº£i lÃ  ngÆ°á»i Ä‘Ã³ng gÃ³p chÃ­nh vÃ  hiá»ƒu tÆ°á»ng táº­n má»—i chi tiáº¿t cÃ³ trong Ä‘Ã³. HÃ£y xem viá»‡c láº­p káº¿ hoáº¡ch giá»‘ng nhÆ° viá»‡c truyá»n Ä‘áº¡t cÃ¢u chuyá»‡n cá»§a mÃ¬nh nháº±m thuyáº¿t phá»¥c ngÆ°á»i Ä‘á»c Ä‘á»“ng hÃ nh cÃ¹ng báº¡n trÃªn con Ä‘Æ°á»ng chinh phá»¥c má»¥c tiÃªu kinh doanh.\r\n\r\nBáº¡n chá»‰ cÃ³ má»™t cÆ¡ há»™i duy nháº¥t Ä‘á»ƒ táº¡o áº¥n tÆ°á»£ng Ä‘áº§u tiÃªn tá»‘t Ä‘áº¹p. Äá»«ng Ä‘á»ƒ nÃ³ vá»¥t máº¥t. HÃ£y trÃ¬nh bÃ y má»™t vÄƒn báº£n cÃ³ tÃ­nh thuyáº¿t phá»¥c cao, bá»‘ cá»¥c Ä‘áº¹p máº¯t, khÃ´ng máº¯c lá»—i chÃ­nh táº£, ngá»¯ phÃ¡p, bao gá»“m cÃ¡c váº¥n Ä‘á» trá»ng tÃ¢m vÃ  cuá»‘i cÃ¹ng lÃ  chá»©a cÃ¡c thÃ´ng tin bá»• trá»£ cáº§n thiáº¿t.\r\n\r\nBáº±ng kiáº¿n thá»©c, kinh nghiá»‡m cá»§a mÃ¬nh, Brian Finch - má»™t chuyÃªn gia trong lÄ©nh vá»±c tÆ° váº¥n láº­p káº¿ hoáº¡ch kinh doanh vÃ  quáº£n lÃ½ tÃ i chÃ­nh - cháº¯c cháº¯n sáº½ giÃºp báº¡n xÃ¢y dá»±ng thÃ nh cÃ´ng káº¿ hoáº¡ch kinh doanh cá»§a riÃªng mÃ¬nh.', 1, 0),
(9, 'Bank 4.0 - Giao dá»‹ch má»i nÆ¡i, khÃ´ng chá»‰ lÃ  ngÃ¢n hÃ ng', 'bank-40-giao-dich-moi-noi-khong-chi-la-ngan-hang', '88b1db6762.jpg', '250000', 56, 'Bank 4.0 - Giao dá»‹ch má»i nÆ¡i, khÃ´ng chá»‰ lÃ  ngÃ¢n hÃ ng\r\nBank 4.0 - Giao dá»‹ch má»i nÆ¡i, khÃ´ng chá»‰ lÃ  ngÃ¢n hÃ ng\r\nBank 4.0 - Giao dá»‹ch má»i nÆ¡i, khÃ´ng chá»‰ lÃ  ngÃ¢n hÃ ngBank 4.0 - Giao dá»‹ch má»i nÆ¡i, khÃ´ng chá»‰ lÃ  ngÃ¢n hÃ ng\r\nBank 4.0 - Giao dá»‹ch má»i nÆ¡i, khÃ´ng chá»‰ lÃ  ngÃ¢n hÃ ng\r\nBank 4.0 - Giao dá»‹ch má»i nÆ¡i, khÃ´ng chá»‰ lÃ  ngÃ¢n hÃ ng', 1, 0),
(10, 'Ngoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n', 'ngoai-giao-cua-chinh-quyen-sai-gon', '955dca73a9.jpg', '360000', 10, 'Ngoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n\r\nNgoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n\r\nNgoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n\r\nNgoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n\r\nNgoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n\r\nNgoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n', 8, 0),
(11, 'Combo Dinh DÆ°á»¡ng Xanh  - Tháº§n DÆ°á»£c Xanh', 'combo-dinh-duong-xanh-than-duoc-xanh', '8c5c62a0aa.jpg', '560000', 569, 'Combo Dinh DÆ°á»¡ng Xanh  - Tháº§n DÆ°á»£c Xanh\r\nCombo Dinh DÆ°á»¡ng Xanh  - Tháº§n DÆ°á»£c Xanh\r\nCombo Dinh DÆ°á»¡ng Xanh  - Tháº§n DÆ°á»£c Xanh\r\nCombo Dinh DÆ°á»¡ng Xanh  - Tháº§n DÆ°á»£c Xanh\r\nCombo Dinh DÆ°á»¡ng Xanh  - Tháº§n DÆ°á»£c Xanh\r\nCombo Dinh DÆ°á»¡ng Xanh  - Tháº§n DÆ°á»£c Xanh', 12, 1),
(12, 'Combo Ä‚n Xanh Äá»ƒ Khá»e - Sá»‘ng LÃ nh Äá»ƒ Tráº»', 'combo-an-xanh-de-khoe-song-lanh-de-tre', 'a35667198e.jpg', '498000', 300, 'Combo Ä‚n Xanh Äá»ƒ Khá»e - Sá»‘ng LÃ nh Äá»ƒ Tráº»\r\nCombo Ä‚n Xanh Äá»ƒ Khá»e - Sá»‘ng LÃ nh Äá»ƒ Tráº»\r\nCombo Ä‚n Xanh Äá»ƒ Khá»e - Sá»‘ng LÃ nh Äá»ƒ Tráº»Combo Ä‚n Xanh Äá»ƒ Khá»e - Sá»‘ng LÃ nh Äá»ƒ Tráº»\r\nCombo Ä‚n Xanh Äá»ƒ Khá»e - Sá»‘ng LÃ nh Äá»ƒ Tráº»\r\nCombo Ä‚n Xanh Äá»ƒ Khá»e - Sá»‘ng LÃ nh Äá»ƒ Tráº»', 12, 1),
(13, 'Combo Máº¹ Con SÆ° Tá»­ - Bá»“ TÃ¡t NgÃ n Tay NgÃ n Máº¯t', 'combo-me-con-su-tu-bo-tat-ngan-tay-ngan-mat', 'a5fb1932be.jpg', '569000', 20, 'Combo Máº¹ Con SÆ° Tá»­ - Bá»“ TÃ¡t NgÃ n Tay NgÃ n Máº¯t\r\nCombo Máº¹ Con SÆ° Tá»­ - Bá»“ TÃ¡t NgÃ n Tay NgÃ n Máº¯tCombo Máº¹ Con SÆ° Tá»­ - Bá»“ TÃ¡t NgÃ n Tay NgÃ n Máº¯tCombo Máº¹ Con SÆ° Tá»­ - Bá»“ TÃ¡t NgÃ n Tay NgÃ n Máº¯t\r\nCombo Máº¹ Con SÆ° Tá»­ - Bá»“ TÃ¡t NgÃ n Tay NgÃ n Máº¯t\r\nCombo Máº¹ Con SÆ° Tá»­ - Bá»“ TÃ¡t NgÃ n Tay NgÃ n Máº¯t\r\nCombo Máº¹ Con SÆ° Tá»­ - Bá»“ TÃ¡t NgÃ n Tay NgÃ n Máº¯t', 6, 1),
(14, 'Chuyá»‡n Nghá» VÃ  Chuyá»‡n Äá»i  - Bá»™ 4 Quyá»ƒn', 'chuyen-nghe-va-chuyen-doi-bo-4-quyen', 'b3c42589c1.jpg', '589000', 26, 'Chuyá»‡n Nghá» VÃ  Chuyá»‡n Äá»i  - Bá»™ 4 Quyá»ƒn\r\nChuyá»‡n Nghá» VÃ  Chuyá»‡n Äá»i  - Bá»™ 4 Quyá»ƒn\r\nChuyá»‡n Nghá» VÃ  Chuyá»‡n Äá»i  - Bá»™ 4 Quyá»ƒn\r\nChuyá»‡n Nghá» VÃ  Chuyá»‡n Äá»i  - Bá»™ 4 Quyá»ƒn\r\nChuyá»‡n Nghá» VÃ  Chuyá»‡n Äá»i  - Bá»™ 4 Quyá»ƒn\r\nChuyá»‡n Nghá» VÃ  Chuyá»‡n Äá»i  - Bá»™ 4 Quyá»ƒn', 9, 1),
(15, 'ÄÆ°á»ng MÃ¢y TrÃªn Äáº¥t Hoa', 'duong-may-tren-dat-hoa', '1f3a460a74.jpg', '250000', 54, 'ÄÆ°á»ng MÃ¢y TrÃªn Äáº¥t Hoa\r\nÄÆ°á»ng MÃ¢y TrÃªn Äáº¥t Hoa\r\nÄÆ°á»ng MÃ¢y TrÃªn Äáº¥t HoaÄÆ°á»ng MÃ¢y TrÃªn Äáº¥t HoaÄÆ°á»ng MÃ¢y TrÃªn Äáº¥t Hoa\r\nÄÆ°á»ng MÃ¢y TrÃªn Äáº¥t Hoa\r\nÄÆ°á»ng MÃ¢y TrÃªn Äáº¥t Hoa\r\nÄÆ°á»ng MÃ¢y TrÃªn Äáº¥t Hoa', 9, 2),
(16, 'ÄÆ°á»ng MÃ¢y Trong Cá»—i Má»™ng', 'duong-may-trong-coi-mong', '5dedf401d9.jpg', '560000', 45, 'ÄÆ°á»ng MÃ¢y Trong Cá»—i Má»™ng\r\nÄÆ°á»ng MÃ¢y Trong Cá»—i Má»™ng\r\nÄÆ°á»ng MÃ¢y Trong Cá»—i Má»™ngÄÆ°á»ng MÃ¢y Trong Cá»—i Má»™ng\r\nÄÆ°á»ng MÃ¢y Trong Cá»—i Má»™ng\r\nÄÆ°á»ng MÃ¢y Trong Cá»—i Má»™ng\r\nÄÆ°á»ng MÃ¢y Trong Cá»—i Má»™ng', 5, 2),
(17, 'MuÃ´n Kiáº¿p NhÃ¢n Sinh', 'muon-kiep-nhan-sinh', 'b64ac41036.jpg', '255000', 10, 'MuÃ´n Kiáº¿p NhÃ¢n Sinh\r\nMuÃ´n Kiáº¿p NhÃ¢n Sinh\r\nMuÃ´n Kiáº¿p NhÃ¢n Sinh\r\nMuÃ´n Kiáº¿p NhÃ¢n SinhMuÃ´n Kiáº¿p NhÃ¢n Sinh\r\nMuÃ´n Kiáº¿p NhÃ¢n Sinh\r\nMuÃ´n Kiáº¿p NhÃ¢n Sinh', 11, 2),
(18, 'Ngoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n P2', 'ngoai-giao-cua-chinh-quyen-sai-gon-p2', '2444e93abf.jpg', '580000', 12, 'Ngoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n P2\r\nNgoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n P2Ngoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n P2\r\nNgoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n P2\r\nNgoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n P2\r\nNgoáº¡i Giao Cá»§a ChÃ­nh Quyá»n SÃ i GÃ²n P2', 9, 2),
(19, 'Tá»«ng bÆ°á»›c chÃ¢n ná»Ÿ hoa: Khi cÃ¢u kinh bÆ°á»›c tá»›i', 'tung-buoc-chan-no-hoa-khi-cau-kinh-buoc-toi', '9d16aaee5a.jpg', '256000', 25, 'Tá»«ng bÆ°á»›c chÃ¢n ná»Ÿ hoa: Khi cÃ¢u kinh bÆ°á»›c tá»›i\r\nTá»«ng bÆ°á»›c chÃ¢n ná»Ÿ hoa: Khi cÃ¢u kinh bÆ°á»›c tá»›i\r\nTá»«ng bÆ°á»›c chÃ¢n ná»Ÿ hoa: Khi cÃ¢u kinh bÆ°á»›c tá»›i\r\nTá»«ng bÆ°á»›c chÃ¢n ná»Ÿ hoa: Khi cÃ¢u kinh bÆ°á»›c tá»›i\r\nTá»«ng bÆ°á»›c chÃ¢n ná»Ÿ hoa: Khi cÃ¢u kinh bÆ°á»›c tá»›i\r\nTá»«ng bÆ°á»›c chÃ¢n ná»Ÿ hoa: Khi cÃ¢u kinh bÆ°á»›c tá»›i', 5, 3),
(20, 'Cáº£m Æ¡n vÃ¬ Ä‘Ã£ Ä‘Æ°á»£c thÆ°Æ¡ng', 'cam-on-vi-da-duoc-thuong', '0653ccf801.jpg', '120000', 25, 'Cáº£m Æ¡n vÃ¬ Ä‘Ã£ Ä‘Æ°á»£c thÆ°Æ¡ng\r\nCáº£m Æ¡n vÃ¬ Ä‘Ã£ Ä‘Æ°á»£c thÆ°Æ¡ngCáº£m Æ¡n vÃ¬ Ä‘Ã£ Ä‘Æ°á»£c thÆ°Æ¡ng\r\nCáº£m Æ¡n vÃ¬ Ä‘Ã£ Ä‘Æ°á»£c thÆ°Æ¡ngCáº£m Æ¡n vÃ¬ Ä‘Ã£ Ä‘Æ°á»£c thÆ°Æ¡ng\r\nCáº£m Æ¡n vÃ¬ Ä‘Ã£ Ä‘Æ°á»£c thÆ°Æ¡ng\r\nCáº£m Æ¡n vÃ¬ Ä‘Ã£ Ä‘Æ°á»£c thÆ°Æ¡ng\r\nCáº£m Æ¡n vÃ¬ Ä‘Ã£ Ä‘Æ°á»£c thÆ°Æ¡ng', 9, 3),
(21, '\"Suá»‘i nguá»“nâ€ vÃ  cÃ¡i tÃ´i hiá»‡n sinh trong tá»«ng cÃ¡ thá»ƒ', 'suoi-nguonâ€-va-cai-toi-hien-sinh-trong-tung-ca-the', '0a23cbc8f8.jpg', '540000', 23, '\"Suá»‘i nguá»“nâ€ vÃ  cÃ¡i tÃ´i hiá»‡n sinh trong tá»«ng cÃ¡ thá»ƒ\r\n\"Suá»‘i nguá»“nâ€ vÃ  cÃ¡i tÃ´i hiá»‡n sinh trong tá»«ng cÃ¡ thá»ƒ\r\n\"Suá»‘i nguá»“nâ€ vÃ  cÃ¡i tÃ´i hiá»‡n sinh trong tá»«ng cÃ¡ thá»ƒ\r\n\"Suá»‘i nguá»“nâ€ vÃ  cÃ¡i tÃ´i hiá»‡n sinh trong tá»«ng cÃ¡ thá»ƒ\r\n\"Suá»‘i nguá»“nâ€ vÃ  cÃ¡i tÃ´i hiá»‡n sinh trong tá»«ng cÃ¡ thá»ƒ\r\n\"Suá»‘i nguá»“nâ€ vÃ  cÃ¡i tÃ´i hiá»‡n sinh trong tá»«ng cÃ¡ thá»ƒ\r\n\"Suá»‘i nguá»“nâ€ vÃ  cÃ¡i tÃ´i hiá»‡n sinh trong tá»«ng cÃ¡ thá»ƒ', 11, 3),
(22, 'Äáº¡i dá»‹ch trÃªn nhá»¯ng con Ä‘Æ°á»ng tÆ¡ lá»¥a', 'dai-dich-tren-nhung-con-duong-to-lua', 'c1f8ab8f18.jpg', '230000', 20, 'Äáº¡i dá»‹ch trÃªn nhá»¯ng con Ä‘Æ°á»ng tÆ¡ lá»¥a\r\nÄáº¡i dá»‹ch trÃªn nhá»¯ng con Ä‘Æ°á»ng tÆ¡ lá»¥a\r\nÄáº¡i dá»‹ch trÃªn nhá»¯ng con Ä‘Æ°á»ng tÆ¡ lá»¥a\r\nÄáº¡i dá»‹ch trÃªn nhá»¯ng con Ä‘Æ°á»ng tÆ¡ lá»¥a\r\nÄáº¡i dá»‹ch trÃªn nhá»¯ng con Ä‘Æ°á»ng tÆ¡ lá»¥a\r\nÄáº¡i dá»‹ch trÃªn nhá»¯ng con Ä‘Æ°á»ng tÆ¡ lá»¥a', 9, 3),
(23, 'HÃ o quang cá»§a vua Gia Long trong máº¯t Michel Gaultier', 'hao-quang-cua-vua-gia-long-trong-mat-michel-gaultier', 'c46187a889.jpg', '120000', 23, 'HÃ o quang cá»§a vua Gia Long trong máº¯t Michel Gaultier\r\nHÃ o quang cá»§a vua Gia Long trong máº¯t Michel Gaultier\r\nHÃ o quang cá»§a vua Gia Long trong máº¯t Michel Gaultier\r\nHÃ o quang cá»§a vua Gia Long trong máº¯t Michel Gaultier\r\nHÃ o quang cá»§a vua Gia Long trong máº¯t Michel Gaultier\r\nHÃ o quang cá»§a vua Gia Long trong máº¯t Michel Gaultier', 8, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `sliderName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_like`
--
ALTER TABLE `tbl_like`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`productId`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_like`
--
ALTER TABLE `tbl_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
