-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2025 at 09:00 AM
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
-- Database: `babycarseat`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Babyro', '2025-03-24 08:42:45', '2025-03-24 08:42:45'),
(2, 'Joie', '2025-03-24 08:42:51', '2025-03-24 08:42:51'),
(3, 'Chilux', '2025-03-24 08:42:57', '2025-03-24 08:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Vàng', '#fae102', '2025-03-24 08:43:49', '2025-03-24 08:43:49'),
(2, 'Xám', '#999994', '2025-03-24 08:44:05', '2025-03-24 08:44:05'),
(3, 'Đen', '#000000', '2025-03-24 08:44:17', '2025-03-24 08:44:17'),
(4, 'Xanh', '#071bf2', '2025-03-24 08:44:37', '2025-03-24 08:44:37'),
(5, 'Trang', '#ffffff', '2025-04-28 07:24:38', '2025-04-28 07:24:38');

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
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `image` text DEFAULT NULL,
  `sort_content` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`id`, `label`, `title`, `slug`, `image`, `sort_content`, `content`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Tính năng 1', 'Tính năng 1', 'tinh-nang-1', 'storage/images/news/1/1745860526282440.jpg', '<p>T&iacute;nh năng 1</p>', '<p>T&iacute;nh năng 1</p>', 1, '1', '1', '2025-04-28 10:15:26', '2025-04-28 10:15:26');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `icon` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_blocks`
--

INSERT INTO `home_blocks` (`id`, `name`, `link`, `image`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`, `short_description`, `description`, `type`, `icon`) VALUES
(1, 'Thiết kế Đức', NULL, 'storage/images/home-block/1/1745865990861578.jpg', 1, '1', '1', '2025-04-28 11:38:43', '2025-04-28 11:47:39', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been123', 'Ghế ô tô Babyro được thiết kế và sản xuất theo công nghệ Đức. Điều này đồng nghĩa với việc các sản phẩm của Babyro được chú trọng đến từng chi tiết, đảm bảo độ bền cao và sự chắc chắn, giúp mang đến cho bé một chiếc ghế ô tô an toàn, thoải mái trong mỗi chuyến đi.123', 'UPPER', 'storage/images/home-block/1/icon/1745866059700965.png'),
(2, 'Tiêu chuẩn an toàn Châu Âu', NULL, 'storage/images/home-block/2/1745866141438479.jpg', 1, '1', '1', '2025-04-28 11:49:01', '2025-04-28 11:49:01', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been', 'Ghế ô tô trẻ em Babyro đáp ứng các tiêu chuẩn an toàn của châu Âu, bao gồm ECE R44 và ECE R129 (i-Size). Tiêu chuẩn ECE R44 quy định các yêu cầu cơ bản về an toàn, trong khi ECE R129 (i-Size) là tiêu chuẩn mới nhất, tập trung vào việc bảo vệ trẻ tốt hơn trong các va chạm bên hông và yêu cầu sử dụng hệ thống lắp đặt ISOFIX. Với chứng nhận an toàn châu Âu, bạn hoàn toàn có thể yên tâm về sự bảo vệ toàn diện mà ghế ô tô Babyro mang lại cho bé.', 'UPPER', 'storage/images/home-block/2/icon/1745866141914149.png');

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
(1, 'CONTACT', 'phone_hn', '01234567890', NULL, NULL),
(2, 'CONTACT', 'phone_hcm', '01234567890', NULL, NULL),
(3, 'CONTACT', 'hotline', '01234567890', NULL, NULL),
(4, 'CONTACT', 'zalo', 'https://zalo.me/9999999999', NULL, NULL),
(5, 'CONTACT', 'messenger', 'https://m.me/LoremIpsum', NULL, NULL),
(6, 'CONTACT', 'address_hn', 'Số 1 đường ABC, Cầu Giấy, Hà Nội', NULL, NULL),
(7, 'CONTACT', 'address_hcm', 'Số 2 đường DEF, Quận 1, TP Hồ Chí Minh', NULL, NULL),
(8, 'CONTACT', 'google_map_hn', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3673.6443074651593!2d76.04800561535346!3d22.96332312430135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3963179aa37da85d%3A0x9ad74f985a500d01!2sWebstrot%20Technology!5e0!3m2!1sen!2sin!4v1610533150713!5m2!1sen!2sin', NULL, NULL),
(9, 'CONTACT', 'google_map_hcm', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3673.6443074651593!2d76.04800561535346!3d22.96332312430135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3963179aa37da85d%3A0x9ad74f985a500d01!2sWebstrot%20Technology!5e0!3m2!1sen!2sin!4v1610533150713!5m2!1sen!2sin', NULL, NULL),
(10, 'CONTACT', 'email', 'support@babycarseat.vn', NULL, '2025-04-17 08:31:32');

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
(4, '2023_07_28_133830_create_products_table', 1),
(5, '2023_08_02_132721_create_orders_table', 1),
(6, '2023_08_02_132745_create_order_products_table', 1),
(7, '2023_08_02_132755_create_order_customers_table', 1),
(8, '2023_08_17_150222_create_news_table', 1),
(9, '2023_08_26_173326_create_knowledge_category_table', 1),
(10, '2023_08_26_173336_create_knowledges_table', 1),
(11, '2023_09_19_150227_create_banners_table', 1),
(12, '2023_09_30_175653_create_promotions_table', 1),
(13, '2023_10_02_173011_create_informations_table', 1),
(14, '2023_11_13_143314_create_home_blocks_table', 1),
(15, '2025_03_12_172411_create_colors_table', 1),
(16, '2025_03_13_024452_create_product_colors_table', 1),
(17, '2025_03_13_083052_create_product_categories_table', 1),
(18, '2025_03_13_084106_create_product_notes_table', 1),
(19, '2025_03_13_085931_create_notes_table', 1),
(20, '2025_03_13_093229_create_brands_table', 1),
(21, '2025_04_15_150112_create_product_color_images_table', 2),
(22, '2025_04_28_222100_create_feature_table', 3),
(23, '2025_04_28_231500_create_product_feature_table', 3),
(28, '2025_04_28_181536_add_type_column_into_home_blocks_table', 4),
(29, '2025_04_29_164751_update_notes_table', 5);

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
(1, 'test', 'test', 'storage/images/news/1/1745137955848284.jpg', 'Ghế ngồi ô tô cho bé là vật dụng quan trọng không thể thiếu trong chuyến hành trình bé đi cùng ba mẹ. Đặc biệt, ghế ô tô cho bé là sản phẩm đặc biệt với nhiều thông số quan trọng phụ huynh cần quan tâm và tìm hiểu rõ để có được sự lựa chọn hợp lý nhất dành cho bé. Dưới đây là tất cả những thông tin liên quan đến sản phẩm ghế ngồi xe hơi cho trẻ em mà ba mẹ cần quan tâm.', '<h2 id=\"ghe_ngoi_o_to_cho_be_la_gi\" style=\"box-sizing: border-box; width: 1050px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 20px; line-height: 1.3; font-family: Lato, sans-serif; background-color: #ffffff; scroll-margin-top: 70px;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">1. Ghế ngồi &ocirc; t&ocirc; cho b&eacute; l&agrave; g&igrave;?&nbsp;</span></h2>\r\n<p><span style=\"box-sizing: border-box; font-weight: bolder;\"><img src=\"../../../../storage/uploads/ghe-danh-rieng-cho-be-ngoi-tren-xe-o-to.jpg\" alt=\"\" width=\"800\" height=\"800\" /></span></p>\r\n<h2 id=\"mua_ghe_ngoi_o_to_cho_be_can_xem_xet_nhung_gi\" style=\"box-sizing: border-box; width: 1050px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 20px; line-height: 1.3; font-family: Lato, sans-serif; background-color: #ffffff; scroll-margin-top: 70px;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">2. Mua ghế ngồi &ocirc; t&ocirc; cho b&eacute; cần xem x&eacute;t những g&igrave;?&nbsp;</span></h2>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; font-size: 16.5px; background-color: #ffffff; margin-bottom: 15px !important; font-family: Roboto, sans-serif !important;\"><span style=\"box-sizing: border-box;\">Kh&ocirc;ng giống như khi mua một bộ quần &aacute;o,&nbsp;</span><span style=\"box-sizing: border-box; font-weight: bolder;\">ghế ngồi cho b&eacute; tr&ecirc;n xe &ocirc; t&ocirc;</span><span style=\"box-sizing: border-box;\">&nbsp;l&agrave; một sản phẩm thực hiện nhiệm vụ giữ an to&agrave;n cho b&eacute; khi ngồi &ocirc; t&ocirc;. Ghế ngồi &ocirc; t&ocirc; cho b&eacute; sơ sinh cần phải được lựa chọn kỹ c&agrave;ng, điều n&agrave;y đồng nghĩa ba mẹ phải t&igrave;m hiểu về n&oacute; thật nhiều trước khi quyết định. Tương tự đối với c&aacute;c sản phẩm&nbsp;</span><span style=\"box-sizing: border-box; font-weight: bolder;\">xe tập đi&nbsp;</span><span style=\"box-sizing: border-box;\">hay xe đẩy cho b&eacute;, cũi cho b&eacute;.&nbsp;</span></p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; font-size: 16.5px; background-color: #ffffff; margin-bottom: 15px !important; font-family: Roboto, sans-serif !important;\"><span style=\"box-sizing: border-box;\">Ghế &ocirc; t&ocirc; cho b&eacute; cần đạt ti&ecirc;u chuẩn ISOFIX v&agrave; an to&agrave;n quốc tế như ECE R44/04, E8, E4, đảm bảo lắp đặt ch&iacute;nh x&aacute;c v&agrave; chất lượng. Ba mẹ n&ecirc;n chọn ghế ph&ugrave; hợp với độ tuổi, c&acirc;n nặng, hỗ trợ bảo vệ an to&agrave;n v&agrave; thoải m&aacute;i cho b&eacute; khi di chuyển.</span></p>', 1, '1', '1', '2025-04-20 01:32:35', '2025-04-20 02:13:19'),
(2, 'test 2', 'test-2', 'storage/images/news/2/1745137990455271.jpg', 'Ghế ngồi ô tô cho bé là vật dụng quan trọng không thể thiếu trong chuyến hành trình bé đi cùng ba mẹ. Đặc biệt, ghế ô tô cho bé là sản phẩm đặc biệt với nhiều thông số quan trọng phụ huynh cần quan tâm và tìm hiểu rõ để có được sự lựa chọn hợp lý nhất dành cho bé. Dưới đây là tất cả những thông tin liên quan đến sản phẩm ghế ngồi xe hơi cho trẻ em mà ba mẹ cần quan tâm.', '<h2 id=\"ghe_ngoi_o_to_cho_be_la_gi\" style=\"box-sizing: border-box; width: 1050px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 20px; line-height: 1.3; font-family: Lato, sans-serif; background-color: #ffffff; scroll-margin-top: 70px;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">1. Ghế ngồi &ocirc; t&ocirc; cho b&eacute; l&agrave; g&igrave;?&nbsp;</span></h2>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; font-size: 16.5px; background-color: #ffffff; margin-bottom: 15px !important; font-family: Roboto, sans-serif !important;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">Ghế ngồi &ocirc; t&ocirc; cho b&eacute;</span><span style=\"box-sizing: border-box;\">&nbsp;c&oacute; kh&aacute; nhiều t&ecirc;n gọi, ngo&agrave;i c&aacute;i t&ecirc;n quen thuộc như ghế &ocirc; t&ocirc; cho trẻ em đ&ocirc;i khi n&oacute; c&ograve;n được gọi l&agrave; ghế an to&agrave;n cho b&eacute; ngồi &ocirc; t&ocirc;, ghế kiềm chế trẻ tr&ecirc;n &ocirc; t&ocirc;. Điều n&agrave;y đồng nghĩa, mua&nbsp;</span><span style=\"box-sizing: border-box; font-weight: bolder;\">ghế ngồi xe &ocirc; t&ocirc; cho b&eacute;</span><span style=\"box-sizing: border-box;\">&nbsp;ch&iacute;nh l&agrave; bạn sẽ bố tr&iacute; th&ecirc;m một chiếc ghế chuy&ecirc;n biệt chỉ d&agrave;nh cho b&eacute; con ngay tr&ecirc;n ghế xe hơi.</span></p>\r\n<figure id=\"attachment_71116\" class=\"wp-caption aligncenter\" style=\"box-sizing: border-box; display: block; margin-top: 0px; clear: both; max-width: 100%; width: 800px; font-family: Lato, sans-serif; background-color: #ffffff; margin-bottom: 0px !important;\" aria-describedby=\"caption-attachment-71116\"><img class=\"size-full wp-image-71116 lazyloaded\" style=\"box-sizing: border-box; border-style: none; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; transition: opacity 1s; opacity: 1; border-radius: 5px; width: 500px;\" src=\"https://chilux.vn/wp-content/uploads/2024/12/ghe-danh-rieng-cho-be-ngoi-tren-xe-o-to.jpg\" alt=\"Ghế d&agrave;nh ri&ecirc;ng cho b&eacute; ngồi tr&ecirc;n xe &ocirc; t&ocirc;&nbsp;\" width=\"800\" height=\"800\" data-ll-status=\"loaded\" />\r\n<figcaption id=\"caption-attachment-71116\" class=\"wp-caption-text\" style=\"box-sizing: border-box; padding: 0.4em; font-size: 0.9em; font-style: italic; background: none !important;\">Ghế d&agrave;nh ri&ecirc;ng cho b&eacute; ngồi tr&ecirc;n xe &ocirc; t&ocirc;</figcaption>\r\n</figure>\r\n<h2 id=\"mua_ghe_ngoi_o_to_cho_be_can_xem_xet_nhung_gi\" style=\"box-sizing: border-box; width: 1050px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 20px; line-height: 1.3; font-family: Lato, sans-serif; background-color: #ffffff; scroll-margin-top: 70px;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">2. Mua ghế ngồi &ocirc; t&ocirc; cho b&eacute; cần xem x&eacute;t những g&igrave;?&nbsp;</span></h2>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; font-size: 16.5px; background-color: #ffffff; margin-bottom: 15px !important; font-family: Roboto, sans-serif !important;\"><span style=\"box-sizing: border-box;\">Kh&ocirc;ng giống như khi mua một bộ quần &aacute;o,&nbsp;</span><span style=\"box-sizing: border-box; font-weight: bolder;\">ghế ngồi cho b&eacute; tr&ecirc;n xe &ocirc; t&ocirc;</span><span style=\"box-sizing: border-box;\">&nbsp;l&agrave; một sản phẩm thực hiện nhiệm vụ giữ an to&agrave;n cho b&eacute; khi ngồi &ocirc; t&ocirc;. Ghế ngồi &ocirc; t&ocirc; cho b&eacute; sơ sinh cần phải được lựa chọn kỹ c&agrave;ng, điều n&agrave;y đồng nghĩa ba mẹ phải t&igrave;m hiểu về n&oacute; thật nhiều trước khi quyết định. Tương tự đối với c&aacute;c sản phẩm&nbsp;</span><span style=\"box-sizing: border-box; font-weight: bolder;\">xe tập đi&nbsp;</span><span style=\"box-sizing: border-box;\">hay xe đẩy cho b&eacute;, cũi cho b&eacute;.&nbsp;</span></p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; font-size: 16.5px; background-color: #ffffff; margin-bottom: 15px !important; font-family: Roboto, sans-serif !important;\"><span style=\"box-sizing: border-box;\">Ghế &ocirc; t&ocirc; cho b&eacute; cần đạt ti&ecirc;u chuẩn ISOFIX v&agrave; an to&agrave;n quốc tế như ECE R44/04, E8, E4, đảm bảo lắp đặt ch&iacute;nh x&aacute;c v&agrave; chất lượng. Ba mẹ n&ecirc;n chọn ghế ph&ugrave; hợp với độ tuổi, c&acirc;n nặng, hỗ trợ bảo vệ an to&agrave;n v&agrave; thoải m&aacute;i cho b&eacute; khi di chuyển.</span></p>', 1, '1', '1', '2025-04-20 01:33:10', '2025-04-20 01:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'R129 & i-Size Certified', NULL, '2025-03-24 08:24:04', '2025-03-24 08:24:04'),
(2, 'GrowTogether™ headrest & harness', NULL, '2025-03-24 08:24:13', '2025-03-24 08:24:13'),
(3, 'Removable fabrics', NULL, '2025-03-24 08:24:22', '2025-03-24 08:24:22'),
(4, 'test', 'storage/images/notes/4/1745950131541456.png', '2025-04-29 09:50:28', '2025-04-29 11:08:52');

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
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `specification` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` bigint(20) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_discount` tinyint(4) NOT NULL DEFAULT 0,
  `discount_value` bigint(20) DEFAULT NULL,
  `is_new` tinyint(4) NOT NULL DEFAULT 0,
  `is_highlight` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `slug`, `image`, `description`, `detail`, `specification`, `content`, `quantity`, `price`, `is_active`, `is_discount`, `discount_value`, `is_new`, `is_highlight`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'GHẾ Ô TÔ CHO BÉ ROY 360 (Cho bé sơ sinh – 12 tuổi)', 'ghe-o-to-cho-be-roy-360-cho-be-so-sinh-12-tuoi', 'storage/images/product/3/1745598480506492.png', NULL, '<p>COMFORT&nbsp;</p>\r\n<p>Whether you&rsquo;re on a road trip, or simply hauling kiddos from school to practice and back home again, you want a seat that will keep your kiddo comfy:</p>\r\n<p>Keep your kiddo cool on even the hottest of days with a ventilated design to help regulate their temperature</p>\r\n<p>Integrated cupholder holds little one&rsquo;s essentials in a handy spot so you can avoid hangry meltdowns</p>\r\n<p>&nbsp;</p>\r\n<p>CONVENIENCE&nbsp;</p>\r\n<p>With the elevate&trade; R129 belted booster seat, you&rsquo;ll get convenience features meant to keep on-the-go mums and dads moving:</p>\r\n<p>A 10 position headrest that will easily adjust to the perfect height with just one hand</p>\r\n<p>Accommodate those unexpected growth spurts with our Grow Together&trade; headrest and harness system that adjusts simultaneously&hellip; even while the seat is installed</p>\r\n<p>Easily clean up messes with removable, machine washable covers</p>\r\n<p>Easy installation with the 3-point vehicle belt</p>\r\n<p>&nbsp;</p>\r\n<p>SAFETY&nbsp;</p>\r\n<p>We&rsquo;ve thought of everything to keep your little one safe and secure, so all you have to do is decide where you want to go:&nbsp;</p>\r\n<p>Meets the highest ECE R129/03 safety standard including side-impact testing</p>\r\n<p>Meets i-Size certification in forward facing belted booster mode</p>\r\n<p>Side impact protection provides added security for the head, body and hips so you can travel worry-free</p>\r\n<p>Well-marked, green colour-coded installation paths take the guesswork out of installation</p>\r\n<p>Get peace of mind that your seatbelt installation is snug and secure with a built-in lock-off device</p>\r\n<p>&nbsp;</p>\r\n<p>SPECIFICATIONS</p>\r\n<p>Product Weight: 5.5 kg &nbsp;</p>\r\n<p>Product Size: l 50 cm x w 47.5 cm x h 59-80 cm</p>\r\n<p>Testing Certification: ECE R129/03</p>\r\n<p>Usage Forward Facing Harness: 76 &ndash; 105 cm (15 months to approx. 3.5 years)</p>\r\n<p>Usage Forward Facing Belted Booster: 100 &ndash; 150 cm (approx. 3.5 &ndash; 12 years)</p>', '<p>Product Weight: 5.5 kg</p>\r\n<p>Product Size: l 50 cm x w 47.5 cm x h 59-80 cm</p>\r\n<p>Testing Certification: ECE R129/03</p>\r\n<p>Usage Forward Facing Harness: 76 &ndash; 105 cm (15 months to approx. 3.5 years)</p>\r\n<p>Usage Forward Facing Belted Booster: 100 &ndash; 150 cm (approx. 3.5 &ndash; 12 years)</p>', '<p><img src=\"../../../../storage/uploads/ghe-danh-rieng-cho-be-ngoi-tren-xe-o-to.jpg\" alt=\"\" width=\"400\" height=\"400\" /></p>', 0, 1950000, 1, 0, NULL, 0, 0, '1', '1', '2025-04-16 11:54:05', '2025-04-25 09:28:38'),
(4, 1, 1, '123', '123', 'storage/images/product/4/1745599013663514.jpg', '<p><span style=\"box-sizing: border-box; margin: 10px 0px 15px; padding: 0px; position: relative; font-size: 16px; line-height: inherit; vertical-align: baseline; bottom: -0.25em; border: 0px; outline: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-family: \'Wix Madefor Text\', sans-serif; font-weight: bold; display: block; color: #181818; background-color: rgba(134, 121, 121, 0.1);\">0-15 th&aacute;ng | 40 - 150 cm | 0-40 kg | ECE-R129 (i-Size) | ADAC</span></p>\r\n<div class=\"desc\" style=\"box-sizing: border-box; margin: 20px 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-variant-emoji: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; font-family: \'Wix Madefor Text\', sans-serif; font-size: 16px; color: #181818; background-color: rgba(134, 121, 121, 0.1);\">Đột ph&aacute; an to&agrave;n cho b&eacute; y&ecirc;u: Babyro i-Spin xoay đa chiều 360&deg;, tương th&iacute;ch ISOFIX 3 điểm V&Agrave;NG k&egrave;m ch&acirc;n đỡ chống lật, đồng h&agrave;nh c&ugrave;ng con từ 0-12 tuổi - MUA 1 LẦN D&Ugrave;NG TRỌN ĐỜI!\r\n<ul style=\"box-sizing: border-box; margin: 20px 0px 15px; padding: 0px 0px 0px 20px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: inherit; list-style: none;\">\r\n<li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: inherit; list-style: disc;\">Xoay 360 độ linh hoạt</li>\r\n<li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: inherit; list-style: disc;\">Thiết kế đa năng linh hoạt từ 0 - 12 tuổi</li>\r\n<li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: inherit; list-style: disc;\">Bảo vệ k&eacute;p: ISOFIX - ch&acirc;n chống chịu lực</li>\r\n</ul>\r\n</div>', NULL, NULL, NULL, 0, 4500000, 1, 0, 2000000, 0, 0, '1', '1', '2025-04-25 09:36:53', '2025-04-29 09:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Ghế trẻ em', 'ghe-tre-em', '2025-03-24 08:37:06', '2025-03-24 08:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `image`, `created_at`, `updated_at`) VALUES
(5, 3, 1, '[\"storage/images/product/3/colors/1/1745168656168648.jpg\",\"storage/images/product/3/colors/1/1745168656455657.jpg\",\"storage/images/product/3/colors/1/1745168656654594.jpg\"]', '2025-04-16 13:24:38', '2025-04-20 10:04:16'),
(6, 3, 3, '[\"storage/images/product/3/colors/3/1744835104906070.jpg\",\"storage/images/product/3/colors/3/1744835104157446.jpg\",\"storage/images/product/3/colors/3/1744835104783774.jpg\",\"storage/images/product/3/colors/3/1744835104392524.jpg\"]', '2025-04-16 13:25:04', '2025-04-16 13:25:04'),
(9, 3, 2, '[\"storage/images/product/3/colors/2/1744835993924335.jpg\"]', '2025-04-16 13:39:53', '2025-04-16 13:39:53'),
(10, 3, 4, '[\"storage/images/product/3/colors/4/1745597613962697.jpg\"]', '2025-04-25 09:13:05', '2025-04-25 09:13:33'),
(11, 4, 1, '[\"storage/images/product/4/colors/1/1745599054794027.jpg\",\"storage/images/product/4/colors/1/1745599054278569.jpg\",\"storage/images/product/4/colors/1/1745599054937678.jpg\",\"storage/images/product/4/colors/1/1745599054186372.jpg\"]', '2025-04-25 09:37:03', '2025-04-25 09:37:34'),
(12, 4, 3, '[\"storage/images/product/4/colors/3/1745599097672981.jpg\",\"storage/images/product/4/colors/3/1745599097641704.jpg\",\"storage/images/product/4/colors/3/1745599097922142.jpg\"]', '2025-04-25 09:37:53', '2025-04-25 09:38:17'),
(13, 4, 5, '[\"storage/images/product/4/colors/5/1745850309849643.jpg\",\"storage/images/product/4/colors/5/1745850309384769.jpg\",\"storage/images/product/4/colors/5/1745850309152733.jpg\"]', '2025-04-28 07:25:09', '2025-04-28 07:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_feature`
--

CREATE TABLE `product_feature` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `feature_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_feature`
--

INSERT INTO `product_feature` (`id`, `product_id`, `feature_id`, `created_at`, `updated_at`) VALUES
(2, 4, 1, '2025-04-29 12:17:17', '2025-04-29 12:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `product_notes`
--

CREATE TABLE `product_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `note_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_notes`
--

INSERT INTO `product_notes` (`id`, `product_id`, `note_id`, `created_at`, `updated_at`) VALUES
(3, 4, 1, '2025-04-29 12:16:41', '2025-04-29 12:16:41');

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
(1, 'Administrator', 'babyroadmin@admin.com', NULL, '$2y$10$io9oCEqy70lvZ/WYopvcbuA1UU8QXLVPDzTN8KKGaNgo5kmX/QXTy', 'uMFbMmk7ReNp8gaIaLQqRTrcucMxRIOX03o5BSvwgPCBBvt2Cjuj42v0830U', '2023-07-18 12:58:25', '2023-07-18 12:58:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
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
-- Indexes for table `notes`
--
ALTER TABLE `notes`
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
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_feature`
--
ALTER TABLE `product_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_notes`
--
ALTER TABLE `product_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `knowledge_category`
--
ALTER TABLE `knowledge_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_customers`
--
ALTER TABLE `order_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_feature`
--
ALTER TABLE `product_feature`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_notes`
--
ALTER TABLE `product_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
