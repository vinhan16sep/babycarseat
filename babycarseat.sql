-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2025 at 02:50 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bst_wn_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `id` int(10) UNSIGNED NOT NULL,
  `accessory_category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_new` tinyint(4) NOT NULL DEFAULT 0,
  `is_highlight` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`id`, `accessory_category_id`, `name`, `slug`, `image`, `description`, `content`, `is_active`, `is_new`, `is_highlight`, `created_by`, `updated_by`, `created_at`, `updated_at`, `price`) VALUES
(2, 2, 'Ly Rượu Vang Đỏ RIEDEL Fatto A Mano Cabernet/Merlot Green RQ', 'ly-ruou-vang-do-riedel-fatto-a-mano-cabernetmerlot-green-rq', 'storage/images/accessory/2/1695133654455826.jpg', 'RIEDEL Fatto A Mano Cabernet/Merlot Green RQ có kích thước rộng rãi giúp cho các hương thơm phát triển đầy đủ và được làm mềm mại hơn ở rìa ly. Ly nhấn mạnh đến trái cây, làm giảm vị đắng của tannin, và cho phép rượu vang đạt được sự hài hoà hương vị. Loại ly này được sản xuất với chân pha lê màu xanh lá để tăng thêm điểm nhấn.', '<h3 style=\"box-sizing: border-box; color: #0a0a0a; width: 892.5px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.25em; font-family: Lora, sans-serif; background-color: #ffffff;\">Th&ocirc;ng tin sản phẩm: RIEDEL Fatto A Mano Cabernet/Merlot Green RQ</h3>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff;\">T&ecirc;n gọi kh&aacute;c:&nbsp;Riedel Fatto A Mano R.Q. Cabernet/Merlot Green</p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff;\">Nh&agrave; sản xuất: Riedel Wine Glass Company</p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff;\">Xuất xứ: &Aacute;o</p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff;\">Năm thiết kế: 2017</p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff;\">Dung t&iacute;ch: 625ml</p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff;\">Chiều cao: 250.0mm</p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff;\">Quy c&aacute;ch:</p>\r\n<ul style=\"box-sizing: border-box; list-style-position: initial; list-style-image: initial; margin-top: 0px; padding: 0px; margin-bottom: 1.3em; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">6 ly/hộp (4905/0G)</li>\r\n</ul>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff;\">Loại h&igrave;nh sản xuất: Ho&agrave;n thiện thủ c&ocirc;ng (Hand Finished)</p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff;\">Chất liệu: Pha l&ecirc;</p>\r\n<h3 style=\"box-sizing: border-box; color: #0a0a0a; width: 892.5px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.25em; font-family: Lora, sans-serif; background-color: #ffffff;\">Rượu vang kết hợp với ly RIEDEL Fatto A Mano Cabernet/Merlot Green RQ</h3>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff;\">ly RIEDEL Fatto A Mano Cabernet/Merlot Green RQ ph&ugrave; hợp với c&aacute;c d&ograve;ng rượu vang Bordeaux (đỏ), Cabernet Sauvignon, St. Emilion, Listrac, Moulis, Margaux, St. Est&egrave;phe, Cabernet Franc, Fronsac, Merlot, M&eacute;doc, Graves rouge, Pauillac, St. Julien, Pomerol, Pessac Leognan (Rouge)</p>\r\n<h3 style=\"box-sizing: border-box; color: #0a0a0a; width: 892.5px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.25em; font-family: Lora, sans-serif; background-color: #ffffff;\">Hướng dẫn bảo quản ly RIEDEL</h3>\r\n<ul style=\"box-sizing: border-box; list-style-position: initial; list-style-image: initial; margin-top: 0px; padding: 0px; margin-bottom: 1.3em; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Bạn c&oacute; thể sử dụng m&aacute;y rửa ch&eacute;n để rửa ly RIEDEL nhưng ch&uacute;ng t&ocirc;i khuyến c&aacute;o n&ecirc;n rửa c&aacute;c sản phẩm thủ c&ocirc;ng bằng tay.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Để tr&aacute;nh vết bẩn tr&ecirc;n ly: N&ecirc;n sử dụng nước mềm khi rửa (c&aacute;c loại nước c&oacute; h&agrave;m lượng kho&aacute;ng chất thấp hoặc nước lọc tinh khiết).</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Để tr&aacute;nh trầy xước: Tr&aacute;nh tiếp x&uacute;c với c&aacute;c ly kh&aacute;c hoặc kim loại.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">C&aacute;ch loại bỏ vết bẩn: sử dụng giấm trắng v&agrave; nước ấm.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">N&ecirc;n sử dụng gi&aacute; đỡ ly nếu c&oacute;.</li>\r\n</ul>\r\n<h4 style=\"box-sizing: border-box; color: #0a0a0a; width: 892.5px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.125em; font-family: Lora, sans-serif; background-color: #ffffff;\">Nếu rửa ly bằng tay</h4>\r\n<ul style=\"box-sizing: border-box; list-style-position: initial; list-style-image: initial; margin-top: 0px; padding: 0px; margin-bottom: 1.3em; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Rửa ly với nước ấm (sử dụng chất tẩy rửa một c&aacute;ch cẩn thận, tốt nhất kh&ocirc;ng n&ecirc;n d&ugrave;ng chất tẩy rửa).</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Lau ly: Sử dụng hai miếng vải mềm để lau kh&ocirc; ly, tay giữ bầu ly, kh&ocirc;ng n&ecirc;n giữ đế ly v&agrave; lau miệng ly sẽ dẫn đến vặn g&atilde;y ch&acirc;n ly.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Ch&uacute; &yacute; g&atilde;y ch&acirc;n đ&ecirc;: Xảy ra khi c&oacute; lực xo&aacute;y mạnh, uốn cong ch&acirc;n đế.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Lưu trữ: Tr&aacute;nh bảo quản ly trong bếp hoặc những nơi c&oacute; m&ugrave;i mạnh, dễ b&aacute;m m&ugrave;i v&agrave;o th&agrave;nh ly.</li>\r\n</ul>\r\n<h4 style=\"box-sizing: border-box; color: #0a0a0a; width: 892.5px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.125em; font-family: Lora, sans-serif; background-color: #ffffff;\">Miếng vải lau ly</h4>\r\n<ul style=\"box-sizing: border-box; list-style-position: initial; list-style-image: initial; margin-top: 0px; padding: 0px; margin-bottom: 1.3em; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Giặt ở nhiệt độ s&ocirc;i (để diệt khuẩn) bằng x&agrave; ph&ograve;ng kh&ocirc;ng m&ugrave;i.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">N&ecirc;n c&agrave;i đặt m&aacute;y giặt ở mức nhiệt độ tối thiểu l&agrave; 170&deg;F/75&deg;C.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Kh&ocirc;ng được sử dụng nước xả vải (tr&aacute;nh m&agrave;ng dầu mỡ b&aacute;m tr&ecirc;n bề mặt).</li>\r\n</ul>', 1, 0, 0, '1', '1', '2023-09-19 07:27:34', '2023-09-19 07:27:34', 1950000);

-- --------------------------------------------------------

--
-- Table structure for table `accessory_category`
--

CREATE TABLE `accessory_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accessory_category`
--

INSERT INTO `accessory_category` (`id`, `name`, `slug`, `image`, `description`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'LY VANG ĐỎ', 'ly-vang-do', 'storage/images/accessory-category/2/1694198266245225.jpg', NULL, 1, '1', '1', '2023-09-08 11:37:46', '2023-09-08 11:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `link`, `description`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'Raaaaaaaaaaaaaaaaaaaaaaa', 'storage/images/banner/4/1696186301856389.jpg', NULL, NULL, 1, '1', '1', '2023-10-01 11:51:41', '2023-10-01 11:51:41'),
(5, '1', 'storage/images/banner/5/1698765921039184.jpg', NULL, NULL, 1, '1', '1', '2023-10-31 08:25:21', '2023-10-31 08:25:21'),
(7, '1', 'storage/images/banner/7/1698766237840019.jpg', NULL, NULL, 1, '1', '1', '2023-10-31 08:30:37', '2023-10-31 08:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `combo`
--

CREATE TABLE `combo` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `is_discount` tinyint(4) NOT NULL DEFAULT 0,
  `discount_value` bigint(20) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_highlight` tinyint(4) NOT NULL DEFAULT 0,
  `is_new` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `combo`
--

INSERT INTO `combo` (`id`, `name`, `slug`, `image`, `description`, `content`, `price`, `is_discount`, `discount_value`, `is_active`, `is_highlight`, `is_new`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Combo Vang Bordeaux Cổ Điển (Dourthe N°1 Blanc và Dourthe N°1 Rouge)', 'combo-vang-bordeaux-co-dien-dourthe-n1-blanc-va-dourthe-n1-rouge', 'storage/images/combo/2/1696519867442819.jpg', 'Combo Vang Bordeaux Cổ Điển (Dourthe N°1 Blanc và Dourthe N°1 Rouge)', NULL, 1950000, 0, NULL, 1, 0, 0, '1', '1', '2023-08-07 09:57:04', '2023-10-05 08:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `combo_products`
--

CREATE TABLE `combo_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `combo_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `combo_products`
--

INSERT INTO `combo_products` (`id`, `combo_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(17, 2, 1, 2, '2023-08-07 09:57:11', '2023-08-07 09:57:11'),
(18, 2, 8, 3, '2023-08-07 09:57:18', '2023-08-07 09:57:18'),
(19, 2, 4, 2, '2023-08-08 07:32:05', '2023-08-08 07:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_by` text NOT NULL,
  `updated_by` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`, `description`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Việt Nam', 'viet-nam', NULL, 1, '1', '1', '2023-07-28 06:45:51', '2023-07-28 08:27:44'),
(2, 'Italia', 'italia', NULL, 1, '1', '1', '2023-07-28 06:51:31', '2023-07-28 11:14:32'),
(3, 'Tây Ban Nha', 'tay-ban-nha', NULL, 1, '1', '1', '2023-07-28 08:27:59', '2023-07-28 08:27:59'),
(4, 'Pháp', 'phap', NULL, 1, '1', '1', '2023-07-28 08:28:07', '2023-07-29 01:50:57'),
(7, 'Argentina', 'argentina', NULL, 1, '1', '1', '2023-07-29 01:51:13', '2023-07-30 10:21:02'),
(8, 'Mỹ', 'my', 'qasdsa', 1, '1', '1', '2023-07-29 02:00:47', '2023-07-29 10:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gifts`
--

INSERT INTO `gifts` (`id`, `name`, `image`, `price`, `description`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Quà tặng 12', 'storage/images/gift/2/1696183360668120.jpg', '300000', '– 01 Hộp trà Anh Quốc Cartwright & Butler\r\n– 01 Hộp bánh quy Bỉ Jules Destrooper\r\n– 01 Chai vang đỏ Château Pey La Tour\r\n– 02 Hộp hạt khô Cartwright & Butler', 0, '1', '1', '2023-10-01 10:58:50', '2023-10-01 11:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `grapes`
--

CREATE TABLE `grapes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grapes`
--

INSERT INTO `grapes` (`id`, `name`, `slug`, `description`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Cabernet Sauvignon', 'cabernet-sauvignon', NULL, 1, '1', '1', '2023-07-29 01:57:06', '2023-07-29 01:57:06'),
(2, 'Merlot', 'merlot', NULL, 0, '1', '1', '2023-07-29 01:57:19', '2023-07-30 10:39:43'),
(3, 'Syrah (Shiraz)', 'syrah-shiraz', NULL, 1, '1', '1', '2023-07-29 01:57:31', '2023-07-29 01:57:31'),
(4, 'Sauvignon Blanc', 'sauvignon-blanc', NULL, 1, '1', '1', '2023-07-29 01:57:42', '2023-07-29 01:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `home_blocks`
--

CREATE TABLE `home_blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `type`, `label`, `value`, `created_at`, `updated_at`) VALUES
(1, 'CONTACT', 'phone_hn', '01234567890', NULL, '2023-10-02 11:43:45'),
(2, 'CONTACT', 'phone_hcm', '01234567890', NULL, NULL),
(3, 'CONTACT', 'hotline', '01234567890', NULL, NULL),
(4, 'CONTACT', 'zalo', 'https://zalo.me/9999999999', NULL, NULL),
(5, 'CONTACT', 'messenger', 'https://m.me/LoremIpsum', NULL, NULL),
(6, 'CONTACT', 'address_hn', 'Số 1 đường ABC, Cầu Giấy, Hà Nội 2', NULL, '2023-10-02 11:41:15'),
(7, 'CONTACT', 'address_hcm', 'Số 2 đường DEF, Quận 1, TP Hồ Chí Minh', NULL, NULL),
(8, 'CONTACT', 'google_map_hn', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1959.5950079214733!2d106.69005563832492!3d10.796754132069255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528cef41a3e99%3A0x6d9f736ab46da8bc!2zMjMgSG9hIExhbiwgUGjGsOG7nW5nIDcsIFBow7ogTmh14bqtbiwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1697167504671!5m2!1svi!2s', NULL, '2023-10-13 09:14:58'),
(9, 'CONTACT', 'google_map_hcm', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3673.6443074651593!2d76.04800561535346!3d22.96332312430135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3963179aa37da85d%3A0x9ad74f985a500d01!2sWebstrot%20Technology!5e0!3m2!1sen!2sin!4v1610533150713!5m2!1sen!2sin', NULL, NULL),
(10, 'CONTACT', 'email', 'sưpport@vangcaocap.vn', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `knowledges`
--

CREATE TABLE `knowledges` (
  `id` int(10) UNSIGNED NOT NULL,
  `knowledge_category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `knowledges`
--

INSERT INTO `knowledges` (`id`, `knowledge_category_id`, `title`, `slug`, `image`, `description`, `content`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 4, 'Tìm hiểu rượu vang cho người mới bắt đầu', 'tim-hieu-ruou-vang-cho-nguoi-moi-bat-dau', 'storage/images/knowledge/2/1696262895720524.jpg', 'Tìm hiểu rượu vang cho người mới bắt đầu\r\nTìm hiểu rượu vang cho người mới bắt đầu', '<h2 style=\"box-sizing: border-box; color: #990d23; width: 520px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 2rem; line-height: 1.3; font-family: Lora, sans-serif; background-color: #f3f3f3;\"><a style=\"box-sizing: border-box; background-color: transparent; touch-action: manipulation; color: #990d23; text-decoration-line: none;\" href=\"https://winecellar.vn/ruou-vang-cho-nguoi-moi-bat-dau/\" data-wplink-edit=\"true\">T&igrave;m hiểu rượu vang cho người mới bắt đầu</a></h2>\r\n<h2 style=\"box-sizing: border-box; color: #990d23; width: 520px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 2rem; line-height: 1.3; font-family: Lora, sans-serif; background-color: #f3f3f3;\"><a style=\"box-sizing: border-box; background-color: transparent; touch-action: manipulation; color: #990d23; text-decoration-line: none;\" href=\"https://winecellar.vn/ruou-vang-cho-nguoi-moi-bat-dau/\" data-wplink-edit=\"true\">T&igrave;m hiểu rượu vang cho người mới bắt đầu</a></h2>', 1, '1', '1', '2023-10-02 09:08:15', '2023-10-02 09:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_category`
--

CREATE TABLE `knowledge_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `knowledge_category`
--

INSERT INTO `knowledge_category` (`id`, `name`, `slug`, `image`, `description`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 'Tìm hiểu rượu vang cho người mới bắt đầu', 'tim-hieu-ruou-vang-cho-nguoi-moi-bat-dau', 'storage/images/knowledge-category/3/1693402046527894.jpg', NULL, 1, '1', '1', '2023-08-30 06:27:26', '2023-08-30 06:27:26'),
(4, 'Những kiến thức cơ bản nhất về rượu vang', 'nhung-kien-thuc-co-ban-nhat-ve-ruou-vang', 'storage/images/knowledge-category/4/1693402085223146.jpg', 'RIEDEL Fatto A Mano Cabernet/Merlot Green RQ có kích thước rộng rãi giúp cho các hương thơm phát triển đầy đủ và được làm mềm mại hơn ở rìa ly.', 1, '1', '1', '2023-08-30 06:28:05', '2023-09-11 07:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2023_07_27_145001_create_countries_table', 2),
(6, '2023_07_28_133830_create_regions_table', 3),
(7, '2023_07_28_133830_create_grapes_table', 4),
(8, '2023_07_28_133830_create_types_table', 4),
(10, '2023_07_28_133830_create_products_table', 5),
(11, '2023_08_02_132721_create_orders_table', 6),
(13, '2023_08_02_132755_create_order_customers_table', 6),
(14, '2023_08_04_153822_create_combo_table', 7),
(15, '2023_08_04_155335_create_combo_products_table', 7),
(16, '2023_08_02_132745_create_order_products_table', 8),
(17, '2023_08_17_150222_create_news_table', 9),
(18, '2023_08_26_173326_create_knowledge_category_table', 10),
(19, '2023_08_26_173336_create_knowledges_table', 10),
(20, '2023_09_01_161730_create_accessory_category_table', 11),
(21, '2023_09_01_161759_create_accessories_table', 11),
(22, '2023_09_08_182804_add_price_to_accessories_table', 12),
(23, '2023_09_19_150227_create_banners_table', 13),
(26, '2023_09_30_175653_create_promotions_table', 14),
(27, '2023_10_01_160557_create_gifts_table', 15),
(28, '2023_10_02_173011_create_informations_table', 16),
(29, '2023_11_04_085849_update_products_table', 17),
(30, '2023_11_13_143314_create_home_blocks_table', 18),
(31, '2024_01_07_190709_update_gifts_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `image`, `description`, `content`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Tiêu đề', 'tieu-de1', 'storage/images/news/1/1696185148985160.jpg', '', NULL, 1, '1', '1', '2023-08-21 07:45:08', '2023-10-05 07:52:09'),
(2, 'Tiêu đề23', 'tieu-de23', 'storage/images/news/2/1696185127993320.jpg', 'Mô tả321', '<p><span style=\"color: #e03e2d;\"><strong>Hầu hết rượu vang được l&agrave;m từ nho v&agrave; chắc chắn rằng ch&uacute;ng kh&aacute;c so với những loại rượu m&agrave; bạn c&oacute; thể t&igrave;m thấy trong cửa h&agrave;ng tạp h&oacute;a. Nho l&agrave;m rượu vang c&oacute; t&ecirc;n Latin l&agrave; Vitis vinifera, &hellip;123</strong></span></p>', 1, '1', '1', '2023-08-21 07:54:31', '2023-10-01 11:32:07'),
(5, 'Tìm hiểu rượu vang cho người mới bắt đầu1', 'tim-hieu-ruou-vang-cho-nguoi-moi-bat-dau1', 'storage/images/news/5/1692978315345790.jpg', 'Tìm hiểu rượu vang cho người mới bắt đầu', '<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\"><em style=\"box-sizing: border-box;\">Rượu vang v&agrave; đồ ăn từ l&acirc;u vẫn đi liền với nhau, một chai rượu vang sẽ ngon hơn nếu được kết hợp với m&oacute;n ăn ph&ugrave; hợp v&agrave; ngược lại. H&atilde;y c&ugrave;ng t&igrave;m hiểu những gợi &yacute; kết hợp đồ ăn với rượu vang ph&ugrave; hợp nhất để c&oacute; được trải nghiệm tuyệt vời nh&eacute;!</em></p>\r\n<h3 style=\"box-sizing: border-box; color: #0a0a0a; width: 902.906px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.25em; font-family: Lora, sans-serif; background-color: #ffffff; text-align: justify;\">3 quy tắc cơ bản khi kết hợp m&oacute;n ăn c&ugrave;ng với rượu vang</h3>\r\n<ul style=\"box-sizing: border-box; list-style: square; margin-top: 0px; padding: 0px; margin-bottom: 1.3em; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">Nguy&ecirc;n tắc kết hợp tương đương v&agrave; tương đồng:</span>&nbsp;Rượu vang v&agrave; m&oacute;n ăn n&ecirc;n l&agrave; &ldquo;bạn&rdquo; của nhau, kh&ocirc;ng c&oacute; th&agrave;nh phần n&agrave;o &aacute;t mất th&agrave;nh phần n&agrave;o tr&ecirc;n b&agrave;n tiệc (độ đậm vị của rượu vang n&ecirc;n c&acirc;n bằng với độ đậm vị của m&oacute;n ăn v&agrave; sốt của m&oacute;n ăn).&nbsp;<span style=\"box-sizing: border-box; font-weight: bolder;\">M&oacute;n ăn thanh nhẹ kết hợp với rượu vang vị thanh m&aacute;t, v&agrave; m&oacute;n ăn đậm đ&agrave; kết hợp với rượu vang c&oacute; vị mạnh mẽ.</span></li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">Nguy&ecirc;n tắc kết hợp tương phản:</span>&nbsp;Đ&ocirc;i khi ch&uacute;ng ta cần c&oacute; sự đối lập, tương phản để gi&uacute;p cho một số hương vị của m&oacute;n ăn trở n&ecirc;n dễ ăn v&agrave; th&uacute; vị hơn. V&iacute; dụ: rượu champagne c&oacute; vị chua thanh tho&aacute;t sẽ l&agrave;m dịu đi vị mặn tự nhi&ecirc;n trong m&oacute;n h&agrave;u tươi sống.&nbsp;<span style=\"box-sizing: border-box; font-weight: bolder;\">Nguy&ecirc;n tắc thường d&ugrave;ng l&agrave;: vị chua đối lập với vị mặn, vị ngọt đối lập với vị cay, vị chua l&agrave;m giảm vị b&eacute;o ngậy khi c&oacute; sốt kem.</span></li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">Kết hợp an to&agrave;n</span>: Hải sản, c&aacute;, thịt g&agrave; kết hợp với vang trắng v&agrave; c&aacute;c m&oacute;n nhiều protein như (thịt lợn, cừu, b&ograve;) kết hợp với vang đỏ. Thịt vịt, thịt chim c&acirc;u c&oacute; thể kết hợp với vang trắng khi d&ugrave;ng sốt cam, nhưng nếu d&ugrave;ng sốt đậm vị như sốt vang đỏ, sốt quả đỏ th&igrave; n&ecirc;n d&ugrave;ng với vang đỏ.</li>\r\n</ul>\r\n<h3 style=\"box-sizing: border-box; color: #0a0a0a; width: 902.906px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.25em; font-family: Lora, sans-serif; background-color: #ffffff; text-align: justify;\">5 m&oacute;n ăn kết hợp với rượu vang đỏ m&agrave; vẫn giữ nguy&ecirc;n hương vị</h3>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">Rượu vang đỏ thường c&oacute; hương vị đậm đ&agrave;, mạnh mẽ, c&oacute; vị ch&aacute;t v&agrave; hậu vị k&eacute;o d&agrave;i.</p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\"><img src=\"../../../../storage/uploads/ruou-sam-panh-champagne-ruinart-blanc-de-blancs-2.jpeg\" alt=\"\" width=\"1200\" height=\"800\" /></p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">C&aacute;c m&oacute;n ăn với rượu vang đỏ thường được y&ecirc;u th&iacute;ch:</p>\r\n<ul style=\"box-sizing: border-box; list-style-position: initial; list-style-image: initial; margin-top: 0px; padding: 0px; margin-bottom: 1.3em; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Thịt đỏ nướng: C&aacute;c m&oacute;n thịt b&ograve;, thịt d&ecirc;, thịt heo&hellip; nướng hoặc x&ocirc;ng kh&oacute;i.&nbsp;<span style=\"box-sizing: border-box; font-weight: bolder;\">Khi d&ugrave;ng với vang đỏ hương vị đậm đ&agrave; của thịt đỏ sẽ l&agrave;m nổi bật hương vị v&agrave; vị ch&aacute;t của rượu vang đỏ.</span></li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Ph&ocirc; mai: C&aacute;c loại ph&ocirc; mai, đặc biệt l&agrave; ph&ocirc; mai cứng v&agrave; ch&iacute;n như Parmesan, Gouda, Cheddar&hellip;&nbsp;<span style=\"box-sizing: border-box; font-weight: bolder;\">Cấu tr&uacute;c đậm đ&agrave; v&agrave; nồng n&agrave;n của rượu vang đỏ sẽ l&agrave;m giảm vị mặn v&agrave; vị cay của ph&ocirc; mai.</span></li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">C&aacute;c m&oacute;n ăn c&oacute; nước sốt đậm đ&agrave;: C&aacute;c m&oacute;n ăn c&oacute; nước sốt đậm đ&agrave; như thịt kho, b&ograve; kho, thịt b&ograve; x&agrave;o h&agrave;nh t&acirc;y&hellip;&nbsp;<span style=\"box-sizing: border-box; font-weight: bolder;\">Hương vị đậm đ&agrave; của m&oacute;n ăn c&acirc;n bằng với vị của rượu vang đỏ sẽ l&agrave;m nổi bật hương vị v&agrave; l&agrave;m mềm vị ch&aacute;t của rượu vang</span>.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Sườn cừu: Sườn cừu nướng hoặc hầm c&ugrave;ng rau củ sẽ l&agrave; một m&oacute;n ăn tuyệt vời để kết hợp với rượu vang đỏ.&nbsp;<span style=\"box-sizing: border-box; font-weight: bolder;\">Hương vị thịt cừu đậm đ&agrave; sẽ tăng cường hương vị v&agrave; cấu tr&uacute;c của rượu vang đỏ.</span></li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Pizza: Rượu vang đỏ cũng kết hợp tốt với pizza, đặc biệt l&agrave; c&aacute;c loại pizza c&oacute; nhiều ph&ocirc; mai v&agrave; c&aacute;c loại thịt đỏ như pepperoni, x&uacute;c x&iacute;ch, thịt b&ograve; x&ocirc;ng kh&oacute;i&hellip;&nbsp;<span style=\"box-sizing: border-box; font-weight: bolder;\">Hương vị đậm đ&agrave; của pizza sẽ l&agrave;m giảm vị cay v&agrave; gi&uacute;p tạo ra một sự kết hợp h&agrave;i h&ograve;a giữa vị ngọt v&agrave; vị ch&aacute;t của vang đỏ.</span></li>\r\n</ul>\r\n<h2 style=\"box-sizing: border-box; color: #0a0a0a; width: 902.906px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.6em; line-height: 1.3; font-family: Lora, sans-serif; background-color: #ffffff; text-align: justify;\">5 m&oacute;n ăn kết hợp tuyệt vời với rượu vang trắng</h2>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">Rượu vang trắng thường c&oacute; nồng độ nhẹ, với hương vị đặc trưng của hoa quả nhiệt đới như cam, bưởi, t&aacute;o, l&ecirc;, dứa v&agrave; m&ugrave;i thảo mộc.</p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\"><img src=\"../../../storage/uploads/hai-san-va-ruou-vang.jpg\" alt=\"\" width=\"1200\" height=\"800\" /></p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">C&aacute;c m&oacute;n ăn với rượu vang trắng&nbsp;thường được y&ecirc;u th&iacute;ch:</p>\r\n<ul style=\"box-sizing: border-box; list-style-position: initial; list-style-image: initial; margin-top: 0px; padding: 0px; margin-bottom: 1.3em; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Salad:&nbsp; C&aacute;c m&oacute;n salad tr&aacute;i c&acirc;y hoặc salad rau củ. Hương vị nhẹ nh&agrave;ng v&agrave; tươi m&aacute;t của rượu vang trắng sẽ gi&uacute;p c&acirc;n bằng vị chua v&agrave; ngọt của c&aacute;c loại tr&aacute;i c&acirc;y v&agrave; rau củ trong salad.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">S&uacute;p: S&uacute;p h&agrave;nh t&acirc;y, s&uacute;p b&iacute; đỏ, s&uacute;p c&agrave; rốt&hellip; cũng được kết hợp với rượu vang trắng. Hương vị nhẹ nh&agrave;ng v&agrave; tươi m&aacute;t của rượu vang trắng sẽ gi&uacute;p c&acirc;n bằng với vị ngọt của c&aacute;c loại rau củ trong s&uacute;p.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Hải sản: T&ocirc;m, mực, cua, ghẹ, c&aacute;c loại c&aacute;. Hương vị tươi mới, thanh m&aacute;t c&ugrave;ng vị chua nhẹ nh&agrave;ng của rượu vang trắng sẽ kết hợp ho&agrave;n hảo với vị mặn v&agrave; gi&agrave;u đạm của hải sản.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Thịt trắng: Thịt g&agrave;, thịt vịt, thịt g&agrave; t&acirc;y&hellip; Hương vị nhẹ nh&agrave;ng v&agrave; tươi m&aacute;t của rượu vang trắng sẽ kết hợp tốt với hương vị thanh tao của thịt trắng.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Sushi: Hương vị thanh m&aacute;t v&agrave; sảng kho&aacute;i của rượu vang trắng cũng ph&ugrave; hợp với c&aacute;c m&oacute;n sushi.</li>\r\n</ul>\r\n<h3 style=\"box-sizing: border-box; color: #0a0a0a; width: 902.906px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.25em; font-family: Lora, sans-serif; background-color: #ffffff; text-align: justify;\">3 m&oacute;n ăn kết hợp loại rượu vang sủi m&agrave; vẫn giữ nguy&ecirc;n hương vị</h3>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">Rượu vang sủi như Prosecco, Champagne, Cava đều c&oacute; đặc điểm chung l&agrave; hương vị tươi m&aacute;t v&agrave; lớp bọt sủi mịn m&agrave;ng, đậm đ&agrave; hương tr&aacute;i quả trong trẻo.</p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\"><img src=\"../../../storage/uploads/ruou-sam-panh-champagne-ruinart-blanc-de-blancs-2.jpeg\" alt=\"\" width=\"1200\" height=\"800\" /></p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">C&aacute;c m&oacute;n ăn với rượu vang trắng&nbsp;thường được y&ecirc;u th&iacute;ch:</p>\r\n<ul style=\"box-sizing: border-box; list-style-position: initial; list-style-image: initial; margin-top: 0px; padding: 0px; margin-bottom: 1.3em; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">M&oacute;n ăn nhẹ: C&aacute;c m&oacute;n ăn nhẹ như sushi, canap&eacute;, b&aacute;nh m&igrave; sandwich&hellip; Hương vị nhẹ nh&agrave;ng v&agrave; sủi bọt của rượu vang sủi sẽ gi&uacute;p tạo ra sự c&acirc;n bằng với c&aacute;c loại thực phẩm n&agrave;y.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Salad: Hương vị thanh m&aacute;t v&agrave; tươi mới của rượu vang sủi sẽ gi&uacute;p tăng cường hương vị của c&aacute;c loại rau củ c&oacute; trong salad.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">M&oacute;n tr&aacute;ng miệng: C&aacute;c m&oacute;n tr&aacute;ng miệng như kem, b&aacute;nh ngọt, tr&aacute;i c&acirc;y&hellip; Hương vị nhẹ nh&agrave;ng v&agrave; tươi m&aacute;t của rượu vang sủi sẽ gi&uacute;p tăng cường hương vị của c&aacute;c m&oacute;n tr&aacute;ng miệng.</li>\r\n</ul>\r\n<h3 style=\"box-sizing: border-box; color: #0a0a0a; width: 902.906px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.25em; font-family: Lora, sans-serif; background-color: #ffffff; text-align: justify;\">Những điều&nbsp;n&ecirc;n tr&aacute;nh khi kết hợp rượu vang v&agrave; đồ ăn</h3>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">Rượu vang kết hợp với c&aacute;c m&oacute;n ăn đem đến những hương vị thơm ngon hơn, k&iacute;ch th&iacute;ch vị gi&aacute;c cũng như tạo n&ecirc;n vẻ đẹp cho bữa tiệc. Tuy nhi&ecirc;n để n&acirc;ng cao trải nghiệm rượu vang cần phải được kết hợp đ&uacute;ng loại đồ ăn cũng như tr&aacute;nh những sai lầm khi sử dụng rượu vang.</p>\r\n<ul style=\"box-sizing: border-box; list-style-position: initial; list-style-image: initial; margin-top: 0px; padding: 0px; margin-bottom: 1.3em; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Vang đỏ với hải sản sống v&agrave; c&aacute; b&eacute;o: Vị ch&aacute;t trong vang đỏ kết hợp với hải sản sống v&agrave; c&aacute; b&eacute;o sẽ đem lại vị sắt trong miệng, đ&acirc;y l&agrave; kết hợp phải tr&aacute;nh.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Vang qu&aacute; đậm vị v&agrave; nặng nề so với m&oacute;n ăn: Một chai vang đỏ đậm ch&aacute;t kh&ocirc;ng thể kết hợp với m&oacute;n salad nhẹ nh&agrave;ng, bởi vang sẽ &aacute;t hết vị của m&oacute;n ăn.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Vang qu&aacute; ngọt so với đồ ăn: Vang c&oacute; vị qu&aacute; ngọt so với những m&oacute;n ăn thanh tho&aacute;t, cũng l&agrave; một kết hợp kh&ocirc;ng n&ecirc;n c&oacute;.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Vang trắng c&oacute; vị gỗ ngậy b&eacute;o ủ kết hợp với hải sản tươi sống: Hương vị gỗ ủ sẽ khiến cho hải sản tươi sống c&oacute; vị tanh, vị sắt. Hải sản tươi sống chỉ n&ecirc;n kết hợp với rượu champagne, vang sủi, rượu trắng thanh tho&aacute;t nhẹ nh&agrave;ng.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Vang c&oacute; độ ch&aacute;t mạnh với m&oacute;n cay: M&oacute;n ăn cay n&oacute;ng trong miệng gặp vị ch&aacute;t gắt của vang sẽ đem lại một tổng thể cay ch&aacute;t kh&oacute; chịu.</li>\r\n</ul>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">Hy vọng b&agrave;i viết tr&ecirc;n c&oacute; thể gi&uacute;p bạn giải quyết c&acirc;u hỏi&nbsp;uống rượu vang ăn g&igrave;.</p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">Đ&acirc;y l&agrave; to&agrave;n bộ th&ocirc;ng tin về kiến thức do chuy&ecirc;n gia rượu vang (Sommelier) của&nbsp;<span style=\"box-sizing: border-box; font-weight: bolder;\">Hầm Rượu Vang WINECELLAR.vn</span>&nbsp;tổng hợp v&agrave; chia sẻ. Hy vọng th&ocirc;ng qua b&agrave;i viết n&agrave;y, qu&yacute; kh&aacute;ch h&agrave;ng sẽ c&oacute; th&ecirc;m th&ocirc;ng tin về c&aacute;ch kết hợp rượu vang với đồ ăn đ&uacute;ng c&aacute;ch, từ đ&oacute; c&oacute; những trải nghiệm rượu vang ho&agrave;n hảo nhất. Đừng qu&ecirc;n theo d&otilde;i c&aacute;c b&agrave;i viết tiếp theo của ch&uacute;ng t&ocirc;i để cập nhật c&aacute;c kiến thức rượu vang th&uacute; vị v&agrave; bổ &iacute;ch.</p>', 1, '1', '1', '2023-08-25 08:01:00', '2023-08-25 08:45:15'),
(6, 'Món Ngon Ăn Kèm Với Rượu Vang và 3 Quy Tắc Vàng Dành Cho Người Mới', 'mon-ngon-an-kem-voi-ruou-vang-va-3-quy-tac-vang-danh-cho-nguoi-moi', 'storage/images/news/6/1692975933293917.jpg', 'Món Ngon Ăn Kèm Với Rượu Vang và 3 Quy Tắc Vàng Dành Cho Người Mới', '<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\"><em style=\"box-sizing: border-box;\">Rượu vang v&agrave; đồ ăn từ l&acirc;u vẫn đi liền với nhau, một chai rượu vang sẽ ngon hơn nếu được kết hợp với m&oacute;n ăn ph&ugrave; hợp v&agrave; ngược lại. H&atilde;y c&ugrave;ng t&igrave;m hiểu những gợi &yacute; kết hợp đồ ăn với rượu vang ph&ugrave; hợp nhất để c&oacute; được trải nghiệm tuyệt vời nh&eacute;!</em></p>\r\n<h3 style=\"box-sizing: border-box; color: #0a0a0a; width: 902.906px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.25em; font-family: Lora, sans-serif; background-color: #ffffff; text-align: justify;\">3 quy tắc cơ bản khi kết hợp m&oacute;n ăn c&ugrave;ng với rượu vang</h3>\r\n<ul style=\"box-sizing: border-box; list-style: square; margin-top: 0px; padding: 0px; margin-bottom: 1.3em; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">Nguy&ecirc;n tắc kết hợp tương đương v&agrave; tương đồng:</span>&nbsp;Rượu vang v&agrave; m&oacute;n ăn n&ecirc;n l&agrave; &ldquo;bạn&rdquo; của nhau, kh&ocirc;ng c&oacute; th&agrave;nh phần n&agrave;o &aacute;t mất th&agrave;nh phần n&agrave;o tr&ecirc;n b&agrave;n tiệc (độ đậm vị của rượu vang n&ecirc;n c&acirc;n bằng với độ đậm vị của m&oacute;n ăn v&agrave; sốt của m&oacute;n ăn).&nbsp;<span style=\"box-sizing: border-box; font-weight: bolder;\">M&oacute;n ăn thanh nhẹ kết hợp với rượu vang vị thanh m&aacute;t, v&agrave; m&oacute;n ăn đậm đ&agrave; kết hợp với rượu vang c&oacute; vị mạnh mẽ.</span></li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">Nguy&ecirc;n tắc kết hợp tương phản:</span>&nbsp;Đ&ocirc;i khi ch&uacute;ng ta cần c&oacute; sự đối lập, tương phản để gi&uacute;p cho một số hương vị của m&oacute;n ăn trở n&ecirc;n dễ ăn v&agrave; th&uacute; vị hơn. V&iacute; dụ: rượu champagne c&oacute; vị chua thanh tho&aacute;t sẽ l&agrave;m dịu đi vị mặn tự nhi&ecirc;n trong m&oacute;n h&agrave;u tươi sống.&nbsp;<span style=\"box-sizing: border-box; font-weight: bolder;\">Nguy&ecirc;n tắc thường d&ugrave;ng l&agrave;: vị chua đối lập với vị mặn, vị ngọt đối lập với vị cay, vị chua l&agrave;m giảm vị b&eacute;o ngậy khi c&oacute; sốt kem.</span></li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">Kết hợp an to&agrave;n</span>: Hải sản, c&aacute;, thịt g&agrave; kết hợp với vang trắng v&agrave; c&aacute;c m&oacute;n nhiều protein như (thịt lợn, cừu, b&ograve;) kết hợp với vang đỏ. Thịt vịt, thịt chim c&acirc;u c&oacute; thể kết hợp với vang trắng khi d&ugrave;ng sốt cam, nhưng nếu d&ugrave;ng sốt đậm vị như sốt vang đỏ, sốt quả đỏ th&igrave; n&ecirc;n d&ugrave;ng với vang đỏ.</li>\r\n</ul>\r\n<h3 style=\"box-sizing: border-box; color: #0a0a0a; width: 902.906px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.25em; font-family: Lora, sans-serif; background-color: #ffffff; text-align: justify;\">5 m&oacute;n ăn kết hợp với rượu vang đỏ m&agrave; vẫn giữ nguy&ecirc;n hương vị</h3>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">Rượu vang đỏ thường c&oacute; hương vị đậm đ&agrave;, mạnh mẽ, c&oacute; vị ch&aacute;t v&agrave; hậu vị k&eacute;o d&agrave;i.</p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\"><img src=\"../../../storage/uploads/ruou-vang-va-pizza.jpg\" alt=\"\" width=\"1200\" height=\"800\" /></p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">C&aacute;c m&oacute;n ăn với rượu vang đỏ thường được y&ecirc;u th&iacute;ch:</p>\r\n<ul style=\"box-sizing: border-box; list-style-position: initial; list-style-image: initial; margin-top: 0px; padding: 0px; margin-bottom: 1.3em; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Thịt đỏ nướng: C&aacute;c m&oacute;n thịt b&ograve;, thịt d&ecirc;, thịt heo&hellip; nướng hoặc x&ocirc;ng kh&oacute;i.&nbsp;<span style=\"box-sizing: border-box; font-weight: bolder;\">Khi d&ugrave;ng với vang đỏ hương vị đậm đ&agrave; của thịt đỏ sẽ l&agrave;m nổi bật hương vị v&agrave; vị ch&aacute;t của rượu vang đỏ.</span></li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Ph&ocirc; mai: C&aacute;c loại ph&ocirc; mai, đặc biệt l&agrave; ph&ocirc; mai cứng v&agrave; ch&iacute;n như Parmesan, Gouda, Cheddar&hellip;&nbsp;<span style=\"box-sizing: border-box; font-weight: bolder;\">Cấu tr&uacute;c đậm đ&agrave; v&agrave; nồng n&agrave;n của rượu vang đỏ sẽ l&agrave;m giảm vị mặn v&agrave; vị cay của ph&ocirc; mai.</span></li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">C&aacute;c m&oacute;n ăn c&oacute; nước sốt đậm đ&agrave;: C&aacute;c m&oacute;n ăn c&oacute; nước sốt đậm đ&agrave; như thịt kho, b&ograve; kho, thịt b&ograve; x&agrave;o h&agrave;nh t&acirc;y&hellip;&nbsp;<span style=\"box-sizing: border-box; font-weight: bolder;\">Hương vị đậm đ&agrave; của m&oacute;n ăn c&acirc;n bằng với vị của rượu vang đỏ sẽ l&agrave;m nổi bật hương vị v&agrave; l&agrave;m mềm vị ch&aacute;t của rượu vang</span>.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Sườn cừu: Sườn cừu nướng hoặc hầm c&ugrave;ng rau củ sẽ l&agrave; một m&oacute;n ăn tuyệt vời để kết hợp với rượu vang đỏ.&nbsp;<span style=\"box-sizing: border-box; font-weight: bolder;\">Hương vị thịt cừu đậm đ&agrave; sẽ tăng cường hương vị v&agrave; cấu tr&uacute;c của rượu vang đỏ.</span></li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Pizza: Rượu vang đỏ cũng kết hợp tốt với pizza, đặc biệt l&agrave; c&aacute;c loại pizza c&oacute; nhiều ph&ocirc; mai v&agrave; c&aacute;c loại thịt đỏ như pepperoni, x&uacute;c x&iacute;ch, thịt b&ograve; x&ocirc;ng kh&oacute;i&hellip;&nbsp;<span style=\"box-sizing: border-box; font-weight: bolder;\">Hương vị đậm đ&agrave; của pizza sẽ l&agrave;m giảm vị cay v&agrave; gi&uacute;p tạo ra một sự kết hợp h&agrave;i h&ograve;a giữa vị ngọt v&agrave; vị ch&aacute;t của vang đỏ.</span></li>\r\n</ul>\r\n<h2 style=\"box-sizing: border-box; color: #0a0a0a; width: 902.906px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.6em; line-height: 1.3; font-family: Lora, sans-serif; background-color: #ffffff; text-align: justify;\">5 m&oacute;n ăn kết hợp tuyệt vời với rượu vang trắng</h2>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">Rượu vang trắng thường c&oacute; nồng độ nhẹ, với hương vị đặc trưng của hoa quả nhiệt đới như cam, bưởi, t&aacute;o, l&ecirc;, dứa v&agrave; m&ugrave;i thảo mộc.</p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\"><img src=\"../../../storage/uploads/hai-san-va-ruou-vang.jpg\" alt=\"\" width=\"1200\" height=\"800\" /></p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">C&aacute;c m&oacute;n ăn với rượu vang trắng&nbsp;thường được y&ecirc;u th&iacute;ch:</p>\r\n<ul style=\"box-sizing: border-box; list-style-position: initial; list-style-image: initial; margin-top: 0px; padding: 0px; margin-bottom: 1.3em; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Salad:&nbsp; C&aacute;c m&oacute;n salad tr&aacute;i c&acirc;y hoặc salad rau củ. Hương vị nhẹ nh&agrave;ng v&agrave; tươi m&aacute;t của rượu vang trắng sẽ gi&uacute;p c&acirc;n bằng vị chua v&agrave; ngọt của c&aacute;c loại tr&aacute;i c&acirc;y v&agrave; rau củ trong salad.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">S&uacute;p: S&uacute;p h&agrave;nh t&acirc;y, s&uacute;p b&iacute; đỏ, s&uacute;p c&agrave; rốt&hellip; cũng được kết hợp với rượu vang trắng. Hương vị nhẹ nh&agrave;ng v&agrave; tươi m&aacute;t của rượu vang trắng sẽ gi&uacute;p c&acirc;n bằng với vị ngọt của c&aacute;c loại rau củ trong s&uacute;p.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Hải sản: T&ocirc;m, mực, cua, ghẹ, c&aacute;c loại c&aacute;. Hương vị tươi mới, thanh m&aacute;t c&ugrave;ng vị chua nhẹ nh&agrave;ng của rượu vang trắng sẽ kết hợp ho&agrave;n hảo với vị mặn v&agrave; gi&agrave;u đạm của hải sản.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Thịt trắng: Thịt g&agrave;, thịt vịt, thịt g&agrave; t&acirc;y&hellip; Hương vị nhẹ nh&agrave;ng v&agrave; tươi m&aacute;t của rượu vang trắng sẽ kết hợp tốt với hương vị thanh tao của thịt trắng.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Sushi: Hương vị thanh m&aacute;t v&agrave; sảng kho&aacute;i của rượu vang trắng cũng ph&ugrave; hợp với c&aacute;c m&oacute;n sushi.</li>\r\n</ul>\r\n<h3 style=\"box-sizing: border-box; color: #0a0a0a; width: 902.906px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.25em; font-family: Lora, sans-serif; background-color: #ffffff; text-align: justify;\">3 m&oacute;n ăn kết hợp loại rượu vang sủi m&agrave; vẫn giữ nguy&ecirc;n hương vị</h3>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">Rượu vang sủi như Prosecco, Champagne, Cava đều c&oacute; đặc điểm chung l&agrave; hương vị tươi m&aacute;t v&agrave; lớp bọt sủi mịn m&agrave;ng, đậm đ&agrave; hương tr&aacute;i quả trong trẻo.</p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\"><img src=\"../../../storage/uploads/ruou-sam-panh-champagne-ruinart-blanc-de-blancs-2.jpeg\" alt=\"\" width=\"1200\" height=\"800\" /></p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">C&aacute;c m&oacute;n ăn với rượu vang trắng&nbsp;thường được y&ecirc;u th&iacute;ch:</p>\r\n<ul style=\"box-sizing: border-box; list-style-position: initial; list-style-image: initial; margin-top: 0px; padding: 0px; margin-bottom: 1.3em; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">M&oacute;n ăn nhẹ: C&aacute;c m&oacute;n ăn nhẹ như sushi, canap&eacute;, b&aacute;nh m&igrave; sandwich&hellip; Hương vị nhẹ nh&agrave;ng v&agrave; sủi bọt của rượu vang sủi sẽ gi&uacute;p tạo ra sự c&acirc;n bằng với c&aacute;c loại thực phẩm n&agrave;y.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Salad: Hương vị thanh m&aacute;t v&agrave; tươi mới của rượu vang sủi sẽ gi&uacute;p tăng cường hương vị của c&aacute;c loại rau củ c&oacute; trong salad.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">M&oacute;n tr&aacute;ng miệng: C&aacute;c m&oacute;n tr&aacute;ng miệng như kem, b&aacute;nh ngọt, tr&aacute;i c&acirc;y&hellip; Hương vị nhẹ nh&agrave;ng v&agrave; tươi m&aacute;t của rượu vang sủi sẽ gi&uacute;p tăng cường hương vị của c&aacute;c m&oacute;n tr&aacute;ng miệng.</li>\r\n</ul>\r\n<h3 style=\"box-sizing: border-box; color: #0a0a0a; width: 902.906px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.25em; font-family: Lora, sans-serif; background-color: #ffffff; text-align: justify;\">Những điều&nbsp;n&ecirc;n tr&aacute;nh khi kết hợp rượu vang v&agrave; đồ ăn</h3>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">Rượu vang kết hợp với c&aacute;c m&oacute;n ăn đem đến những hương vị thơm ngon hơn, k&iacute;ch th&iacute;ch vị gi&aacute;c cũng như tạo n&ecirc;n vẻ đẹp cho bữa tiệc. Tuy nhi&ecirc;n để n&acirc;ng cao trải nghiệm rượu vang cần phải được kết hợp đ&uacute;ng loại đồ ăn cũng như tr&aacute;nh những sai lầm khi sử dụng rượu vang.</p>\r\n<ul style=\"box-sizing: border-box; list-style-position: initial; list-style-image: initial; margin-top: 0px; padding: 0px; margin-bottom: 1.3em; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Vang đỏ với hải sản sống v&agrave; c&aacute; b&eacute;o: Vị ch&aacute;t trong vang đỏ kết hợp với hải sản sống v&agrave; c&aacute; b&eacute;o sẽ đem lại vị sắt trong miệng, đ&acirc;y l&agrave; kết hợp phải tr&aacute;nh.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Vang qu&aacute; đậm vị v&agrave; nặng nề so với m&oacute;n ăn: Một chai vang đỏ đậm ch&aacute;t kh&ocirc;ng thể kết hợp với m&oacute;n salad nhẹ nh&agrave;ng, bởi vang sẽ &aacute;t hết vị của m&oacute;n ăn.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Vang qu&aacute; ngọt so với đồ ăn: Vang c&oacute; vị qu&aacute; ngọt so với những m&oacute;n ăn thanh tho&aacute;t, cũng l&agrave; một kết hợp kh&ocirc;ng n&ecirc;n c&oacute;.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Vang trắng c&oacute; vị gỗ ngậy b&eacute;o ủ kết hợp với hải sản tươi sống: Hương vị gỗ ủ sẽ khiến cho hải sản tươi sống c&oacute; vị tanh, vị sắt. Hải sản tươi sống chỉ n&ecirc;n kết hợp với rượu champagne, vang sủi, rượu trắng thanh tho&aacute;t nhẹ nh&agrave;ng.</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 0.6em; margin-left: 1.3em;\">Vang c&oacute; độ ch&aacute;t mạnh với m&oacute;n cay: M&oacute;n ăn cay n&oacute;ng trong miệng gặp vị ch&aacute;t gắt của vang sẽ đem lại một tổng thể cay ch&aacute;t kh&oacute; chịu.</li>\r\n</ul>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">Hy vọng b&agrave;i viết tr&ecirc;n c&oacute; thể gi&uacute;p bạn giải quyết c&acirc;u hỏi&nbsp;uống rượu vang ăn g&igrave;.</p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 16px; background-color: #ffffff; text-align: justify;\">Đ&acirc;y l&agrave; to&agrave;n bộ th&ocirc;ng tin về kiến thức do chuy&ecirc;n gia rượu vang (Sommelier) của&nbsp;<span style=\"box-sizing: border-box; font-weight: bolder;\">Hầm Rượu Vang WINECELLAR.vn</span> tổng hợp v&agrave; chia sẻ. Hy vọng th&ocirc;ng qua b&agrave;i viết n&agrave;y, qu&yacute; kh&aacute;ch h&agrave;ng sẽ c&oacute; th&ecirc;m th&ocirc;ng tin về c&aacute;ch kết hợp rượu vang với đồ ăn đ&uacute;ng c&aacute;ch, từ đ&oacute; c&oacute; những trải nghiệm rượu vang ho&agrave;n hảo nhất. Đừng qu&ecirc;n theo d&otilde;i c&aacute;c b&agrave;i viết tiếp theo của ch&uacute;ng t&ocirc;i để cập nhật c&aacute;c kiến thức rượu vang th&uacute; vị v&agrave; bổ &iacute;ch.</p>', 1, '1', '1', '2023-08-25 08:05:33', '2023-08-25 08:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `total_price` bigint(20) NOT NULL DEFAULT 0,
  `discount_percent` int(11) NOT NULL DEFAULT 0,
  `discounted_price` bigint(20) NOT NULL DEFAULT 0,
  `payment_method` tinyint(4) NOT NULL,
  `code` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total_price`, `discount_percent`, `discounted_price`, `payment_method`, `code`, `status`, `note`, `created_at`, `updated_at`) VALUES
(2, 1200000, 0, 0, 0, 'VS3ZFCEH', 0, 'Em ship giúp anh luôn và ngay\r\nAnh đang có việc cần gấp\r\nCảm ơn', '2023-08-10 07:51:18', '2023-08-10 07:51:18'),
(3, 11350000, 5, 567500, 0, 'N01OHS1O', 4, 'Em ship giúp anh luôn và ngay\r\nAnh đang có việc cần gấp\r\nCảm ơn', '2023-08-10 07:56:28', '2023-10-05 08:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_customers`
--

CREATE TABLE `order_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_customers`
--

INSERT INTO `order_customers` (`id`, `order_id`, `name`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(2, 2, 'Nguyễn Vĩnh An', 'Số 8 ngõ 80/1 Nhân Hòa', '0943662946', 'vinhan16sep@gmail.com', '2023-08-10 07:51:18', '2023-08-10 07:51:18'),
(3, 3, 'Nguyễn Vĩnh An', 'Số 8 ngõ 80/1 Nhân Hòa', '0943662946', 'vinhan16sep@gmail.com', '2023-08-10 07:56:28', '2023-08-10 07:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `combo_id` int(10) UNSIGNED DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `combo_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(3, 2, 1, NULL, 400000, 3, '2023-08-10 07:51:18', '2023-08-10 07:51:18'),
(4, 3, 1, NULL, 400000, 4, '2023-08-10 07:56:28', '2023-08-10 07:56:28'),
(5, 3, 8, NULL, 1950000, 3, '2023-08-10 07:56:28', '2023-08-10 07:56:28'),
(6, 3, NULL, 2, 1950000, 2, '2023-08-10 07:56:28', '2023-08-10 07:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `grape_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` bigint(20) NOT NULL,
  `alcohol` varchar(100) DEFAULT NULL,
  `capacity` varchar(10) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_discount` tinyint(4) NOT NULL DEFAULT 0,
  `discount_value` bigint(20) DEFAULT NULL,
  `is_new` tinyint(4) NOT NULL DEFAULT 0,
  `is_highlight` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_hot` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `country_id`, `region_id`, `type_id`, `grape_id`, `name`, `slug`, `image`, `description`, `content`, `quantity`, `price`, `alcohol`, `capacity`, `is_active`, `is_discount`, `discount_value`, `is_new`, `is_highlight`, `created_by`, `updated_by`, `created_at`, `updated_at`, `is_hot`) VALUES
(1, 4, 1, 1, 1, 'Rượu Vang Mỹ Opus One 2013', 'ruou-vang-my-opus-one-2013', 'storage/images/product/1/1691246540493053.jpg', 'Mô tả Mô tả Mô tả', NULL, 123, 500000, '12', NULL, 1, 1, 400000, 1, 1, '1', '1', '2023-07-29 08:29:25', '2023-08-05 07:42:20', 0),
(4, 2, 3, 1, 3, 'Rượu vang Pháp Chateau Fleur Cardinale 2014', 'ruou-vang-phap-chateau-fleur-cardinale-2014', 'storage/images/product/4/1694103085885217.jpg', NULL, NULL, 0, 1, NULL, NULL, 1, 0, 2, 1, 0, '1', '1', '2023-07-29 08:42:00', '2023-09-07 09:11:25', 0),
(5, 4, 1, 1, 3, 'Rượu vang Pháp Chateau Batailley 2013', 'ruou-vang-phap-chateau-batailley-2013', 'storage/images/product/5/1694103055209166.jpg', 'qưe', NULL, 2, 0, NULL, NULL, 1, 0, 2, 0, 1, '1', '1', '2023-07-29 08:45:23', '2023-09-07 09:10:55', 0),
(8, 4, 2, 1, 4, 'Rượu vang Pháp Chateau Batailley 2014', 'ruou-vang-phap-chateau-batailley-2014', 'storage/images/product/8/1694103069547837.jpg', 'Hương vị: Những hương thơm tinh xảo của tầng hương vị của quả lý chua đen cùng với sự hỗ trợ quyến rũ của trái dâu tằm và mận chín. Một hương vị cổ điện của dòng vang Paulilac/Batailley.', '<p><span style=\"font-family: arial, helvetica, sans-serif;\"><span style=\"color: #2d2b2b; font-size: 15px; text-align: justify; background-color: #ffffff;\">Opus One l&agrave; giấc mơ vĩ đại của hai con người d&agrave;nh trọn cuộc đời m&igrave;nh cho&nbsp;</span><a style=\"box-sizing: border-box; background-color: #ffffff; touch-action: manipulation; color: #990d23; text-decoration-line: none; font-size: 15px; text-align: justify;\" href=\"https://winecellar.vn/ruou-vang/\"><span style=\"box-sizing: border-box; font-weight: bolder;\">rượu vang</span></a><span style=\"color: #2d2b2b; font-size: 15px; text-align: justify; background-color: #ffffff;\">: Nam tước Philippe de Rothschild của Chateau Mouton Rothschild ở&nbsp;</span><a style=\"box-sizing: border-box; background-color: #ffffff; touch-action: manipulation; color: #990d23; text-decoration-line: none; font-size: 15px; text-align: justify;\" href=\"https://winecellar.vn/ruou-vang-bordeaux/\"><span style=\"box-sizing: border-box; font-weight: bolder;\">Bordeaux</span></a><span style=\"color: #2d2b2b; font-size: 15px; text-align: justify; background-color: #ffffff;\">&nbsp;v&agrave; Robert Mondavi, người trồng nho ở Thung lũng Napa. C&ugrave;ng chung l&yacute; tưởng tạo n&ecirc;n một d&ograve;ng vang c&oacute; chất lượng tuyệt đối, Philippe de Rothschild v&agrave; Robert Mondavi đ&atilde; bắt tay thực hiện giấc mơ lớn cuộc đời: tạo ra một loại rượu duy nhất d&agrave;nh ri&ecirc;ng cho việc theo đuổi chất lượng vượt trội với nhiệm vụ duy nhất l&agrave; định h&igrave;nh được c&aacute; t&iacute;nh cho một d&ograve;ng vang cổ điển, trường tồn qua nhiều thế hệ.</span></span></p>\r\n<p><span style=\"color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; text-align: justify; background-color: #ffffff;\"><img src=\"../../../storage/uploads/opus-one-2018-1.jpg\" alt=\"\" width=\"1200\" height=\"800\" /></span></p>', 23, 1950000, '13.5% ABV*', NULL, 1, 0, 1800000, 1, 1, '1', '1', '2023-07-29 10:58:09', '2023-09-07 09:17:08', 0),
(9, 8, 4, 1, 1, 'Rượu Vang Mỹ Opus One 2018', 'ruou-vang-my-opus-one-2018', 'storage/images/product/9/1694102895969559.jpg', 'Rượu mang đến hương thơm nồng nàn của dâu đen và anh đào đen, hòa quyện cùng nốt hương thanh lịch của hoa violet, hạt tiêu trắng và hoa hồng, các tầng hương lần lượt bung tỏa những nấc hương hoa ngọt ngào quyến rũ. Từng tầng hương vị liền mạch tiếp nối, mang đến một đỉnh cao của sự tươi mới và ngon ngọt của trái cây màu đen, nổi bật với chút vỏ cam, cam thảo và màu sẫm sô cô la. Vị rượu cân bằng, vị chát tròn mịn, tươi mát, để lại cảm giác mềm mại, kem ngậy cùng hậu vị quyến rũ dai dẳng.', '<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff; text-align: justify;\"><span style=\"box-sizing: border-box;\">AAAAAAAAAAAAAAAAAAAA</span></p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff; text-align: justify;\"><span style=\"box-sizing: border-box;\">Opus One l&agrave; giấc mơ vĩ đại của hai con người d&agrave;nh trọn cuộc đời m&igrave;nh cho&nbsp;<a style=\"box-sizing: border-box; background-color: transparent; touch-action: manipulation; color: #990d23; text-decoration-line: none;\" href=\"https://winecellar.vn/ruou-vang/\"><span style=\"box-sizing: border-box; font-weight: bolder;\">rượu vang</span></a>: Nam tước Philippe de Rothschild của Chateau Mouton Rothschild ở&nbsp;<a style=\"box-sizing: border-box; background-color: transparent; touch-action: manipulation; color: #990d23; text-decoration-line: none;\" href=\"https://winecellar.vn/ruou-vang-bordeaux/\"><span style=\"box-sizing: border-box; font-weight: bolder;\">Bordeaux</span></a>&nbsp;v&agrave; Robert Mondavi, người trồng nho ở Thung lũng Napa. C&ugrave;ng chung l&yacute; tưởng tạo n&ecirc;n một d&ograve;ng vang c&oacute; chất lượng tuyệt đối, Philippe de Rothschild v&agrave; Robert Mondavi đ&atilde; bắt tay thực hiện giấc mơ lớn cuộc đời: tạo ra một loại rượu duy nhất d&agrave;nh ri&ecirc;ng cho việc theo đuổi chất lượng vượt trội với nhiệm vụ duy nhất l&agrave; định h&igrave;nh được c&aacute; t&iacute;nh cho một d&ograve;ng vang cổ điển, trường tồn qua nhiều thế hệ.</span></p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff; text-align: justify;\"><span style=\"box-sizing: border-box;\"><img src=\"../../../storage/uploads/opus-one-2018-1.jpg\" alt=\"\" width=\"1200\" height=\"800\" /></span></p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff; text-align: justify;\"><span style=\"box-sizing: border-box;\">Qu&aacute; tr&igrave;nh sản xuất rượu vang tuyệt vời bắt đầu từ vườn nho. Khi những người s&aacute;ng lập tạo ra Opus One, họ đ&atilde; mơ về một loại rượu vang tuyệt vời vượt qua nhiều thế hệ. Gần bốn thập kỷ sau, những nh&agrave; điều h&agrave;nh tiếp tục ho&agrave;n thiện những n&eacute;t tinh tế phức hợp của Opus One bằng c&aacute;ch t&ocirc;n vinh c&aacute;c phương ph&aacute;p truyền thống v&agrave; kh&ocirc;ng ngừng theo đuổi đổi mới v&agrave; cải tiến. Được hướng dẫn bởi tầm nh&igrave;n của những người s&aacute;ng lập, nh&agrave; sản xuất rượu của Opus One hiện tại, Michael Silacci, đ&atilde; kết hợp trực gi&aacute;c v&agrave; sự nhạy b&eacute;n về kỹ thuật với quan điểm k&eacute;p của nh&agrave; trồng nho v&agrave; nh&agrave; sản xuất rượu. Từ nếm thử quả mọng đến ph&acirc;n loại cẩn thận v&agrave; ủ l&acirc;u trong th&ugrave;ng gỗ sồi Ph&aacute;p mới, mỗi giai đoạn của quy tr&igrave;nh sản xuất rượu vang đều được c&acirc;n nhắc v&agrave; ch&uacute; &yacute; tỉ mỉ như nhau. Sau 18 th&aacute;ng, rượu được đ&oacute;ng chai v&agrave; ủ th&ecirc;m 15 th&aacute;ng cho đến khi xuất xưởng v&agrave;o ng&agrave;y 1 th&aacute;ng 10 h&agrave;ng năm.</span></p>\r\n<p style=\"box-sizing: border-box; margin-bottom: 1.3em; margin-top: 0px; color: #2d2b2b; font-family: Inter, sans-serif; font-size: 15px; background-color: #ffffff; text-align: justify;\"><span style=\"box-sizing: border-box;\"><img src=\"../../../storage/uploads/opus-one-2018-3.jpg\" alt=\"\" width=\"1200\" height=\"800\" /></span></p>', 23, 39500000, NULL, NULL, 1, 0, NULL, 1, 1, '1', '1', '2023-09-07 09:08:15', '2023-09-07 09:09:35', 0),
(19, 2, 3, 1, 1, 'q1', 'q1', '[]', NULL, NULL, 1, 1950000, NULL, NULL, 1, 0, NULL, 0, 0, '1', '1', '2023-11-04 07:10:39', '2023-11-04 07:10:39', 0),
(20, 2, 3, 1, 1, 'q2', 'q2', '[]', NULL, NULL, 1, 1950000, NULL, NULL, 1, 0, NULL, 0, 0, '1', '1', '2023-11-04 07:11:25', '2023-11-04 07:11:25', 0),
(21, 2, 3, 1, 1, 'q3', 'q3', '[]', NULL, NULL, 1, 2, NULL, NULL, 1, 0, NULL, 0, 0, '1', '1', '2023-11-04 07:13:08', '2023-11-04 07:13:08', 0),
(25, 2, 3, 3, 3, 'q4', 'q4', '[\"storage\\/images\\/product\\/25\\/1699122958691390.jpg\",\"storage\\/images\\/product\\/25\\/1699122958213707.jpg\",\"storage\\/images\\/product\\/25\\/1699122958664851.jpg\",\"storage\\/images\\/product\\/25\\/1699122958387916.jpg\",\"storage\\/images\\/product\\/25\\/1699122958625648.jpg\",\"storage\\/images\\/product\\/25\\/1699122958120962.jpg\",\"storage\\/images\\/product\\/25\\/1699122958554447.jpg\",\"storage\\/images\\/product\\/25\\/1699122958921554.jpg\",\"storage\\/images\\/product\\/25\\/1699122958801893.jpg\",\"storage\\/images\\/product\\/25\\/1699122958051605.jpg\",\"storage\\/images\\/product\\/25\\/1699122958810803.jpg\",\"storage\\/images\\/product\\/25\\/1699122958730368.jpg\",\"storage\\/images\\/product\\/25\\/1699122958925900.jpg\"]', NULL, NULL, 1, 2, NULL, NULL, 1, 0, NULL, 0, 0, '1', '1', '2023-11-04 07:18:02', '2023-11-04 11:35:58', 0),
(26, 2, 3, 1, 3, 'w1', 'w1', '[\"storage\\/images\\/product\\/26\\/1699122481109115.jpg\",\"storage\\/images\\/product\\/26\\/1699122481725933.jpg\",\"storage\\/images\\/product\\/26\\/1699122481370944.jpg\"]', NULL, NULL, 1, 2, NULL, '123ml', 1, 0, NULL, 0, 0, '1', '1', '2023-11-04 07:20:02', '2023-11-05 09:57:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `item_type` int(10) UNSIGNED NOT NULL COMMENT '1: product; 2: combo',
  `title` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `is_highlight` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `item_id`, `item_type`, `title`, `image`, `is_highlight`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 'KM 2', 'storage/images/promotion/2/1696168206743779.jpg', 0, 1, '1', '1', '2023-10-01 06:50:06', '2023-10-01 07:21:49'),
(3, 2, 2, 'KM 31', 'storage/images/promotion/3/1696174748722600.jpg', 0, 0, '1', '1', '2023-10-01 07:22:37', '2023-10-01 08:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `country_id`, `name`, `slug`, `description`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 4, 'Rượu vang Bordeaux', 'ruou-vang-bordeaux', NULL, 1, '1', '1', '2023-07-28 09:38:57', '2023-07-30 10:34:32'),
(2, 4, 'Rượu vang Bourgogne', 'ruou-vang-bourgogne', NULL, 1, '1', '1', '2023-07-29 02:00:19', '2023-07-29 02:00:19'),
(3, 2, 'Rượu vang Tuscany', 'ruou-vang-tuscany', NULL, 1, '1', '1', '2023-07-29 02:00:32', '2023-07-29 02:00:38'),
(4, 8, 'Rượu vang California', 'ruou-vang-california', NULL, 1, '1', '1', '2023-07-29 02:01:01', '2023-07-30 10:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `slug`, `description`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Rượu vang đỏ', 'ruou-vang-do', NULL, 1, '1', '1', '2023-07-29 01:54:36', '2023-07-29 01:55:07'),
(3, 'Rượu vang trắng', 'ruou-vang-trang', NULL, 1, '1', '1', '2023-07-29 01:59:18', '2023-07-29 01:59:18'),
(4, 'Rượu vang sủi', 'ruou-vang-sui', NULL, 1, '1', '1', '2023-07-29 01:59:28', '2023-07-29 01:59:28'),
(5, 'Rượu vang ngọt', 'ruou-vang-ngot', NULL, 1, '1', '1', '2023-07-29 01:59:40', '2023-07-29 01:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'bwadmin@admin.com', NULL, '$2y$10$io9oCEqy70lvZ/WYopvcbuA1UU8QXLVPDzTN8KKGaNgo5kmX/QXTy', 'ClDjf1wYWDTAI3Ho08l0Rixvc1R36GHMYGmxY77M2jNheKHK7M0wUJU4A9cs', '2023-07-18 12:58:25', '2023-07-18 12:58:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accessory_category`
--
ALTER TABLE `accessory_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `combo`
--
ALTER TABLE `combo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `combo_products`
--
ALTER TABLE `combo_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grapes`
--
ALTER TABLE `grapes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_blocks`
--
ALTER TABLE `home_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledges`
--
ALTER TABLE `knowledges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledge_category`
--
ALTER TABLE `knowledge_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_customers`
--
ALTER TABLE `order_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `accessory_category`
--
ALTER TABLE `accessory_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `combo`
--
ALTER TABLE `combo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `combo_products`
--
ALTER TABLE `combo_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grapes`
--
ALTER TABLE `grapes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `home_blocks`
--
ALTER TABLE `home_blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `knowledges`
--
ALTER TABLE `knowledges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `knowledge_category`
--
ALTER TABLE `knowledge_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_customers`
--
ALTER TABLE `order_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
