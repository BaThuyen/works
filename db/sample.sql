-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 10:32 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `company_id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_location` int(11) NOT NULL,
  `company_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `company_address`, `company_location`, `company_description`, `company_status`) VALUES
(1, 'Company name', 'Address', 2, 'e', 1),
(2, 'New company', 'New address', 2, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`, `protected`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '{\"_superadmin\":1}', 0, '2017-03-06 02:02:20', '2017-03-06 02:02:20'),
(2, 'editor', '{\"_user-editor\":1,\"_group-editor\":1}', 0, '2017-03-06 02:02:20', '2017-03-06 02:02:20'),
(3, 'base admin', '{\"_user-editor\":1}', 0, '2017-03-06 02:02:20', '2017-03-06 02:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `location_id` int(10) UNSIGNED NOT NULL,
  `location_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location_id_alias` int(11) NOT NULL DEFAULT '0',
  `location_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_name`, `location_id_alias`, `location_status`) VALUES
(2, 'TP.HCM', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `map_categories`
--

DROP TABLE IF EXISTS `map_categories`;
CREATE TABLE `map_categories` (
  `map_category_id` int(10) UNSIGNED NOT NULL,
  `work_category_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_category_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `map_categories`
--

INSERT INTO `map_categories` (`map_category_id`, `work_category_id`, `site_category_id`) VALUES
(73, '4', 2),
(74, '0', 1),
(75, '4', 1),
(76, '5', 1),
(77, '10', 1),
(78, '4', 3),
(79, '5', 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1),
(2, '2014_02_19_095545_create_users_table', 1),
(3, '2014_02_19_095623_create_user_groups_table', 1),
(4, '2014_02_19_095637_create_groups_table', 1),
(5, '2014_02_19_160516_create_permission_table', 1),
(6, '2014_02_26_165011_create_user_profile_table', 1),
(7, '2014_05_06_122145_create_profile_field_types', 1),
(8, '2014_05_06_122155_create_profile_field', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2017_03_01_013338_create_samples_table', 2),
(11, '2017_03_01_013338_create_sites_table', 3),
(12, '2017_03_01_013338_create_works_categories_table', 4),
(13, '2017_03_01_013339_create_works_categories_table', 5),
(14, '2017_03_01_013336_create_sites_table', 6),
(16, '2017_03_01_013340_create_works_table', 7),
(17, '2017_03_01_013342_create_companies_table', 8),
(18, '2017_03_01_013342_create_location_table', 9),
(19, '2017_03_21_003205_create_sites_categories_table', 10),
(20, '2017_03_21_003745_create_map_categories_table', 10),
(21, '2017_03_01_013343_create_templates_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `description`, `permission`, `protected`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '_superadmin', 0, '2017-03-06 02:02:20', '2017-03-06 02:02:20'),
(2, 'user editor', '_user-editor', 0, '2017-03-06 02:02:20', '2017-03-06 02:02:20'),
(3, 'group editor', '_group-editor', 0, '2017-03-06 02:02:20', '2017-03-06 02:02:20'),
(4, 'permission editor', '_permission-editor', 0, '2017-03-06 02:02:20', '2017-03-06 02:02:20'),
(5, 'profile type editor', '_profile-editor', 0, '2017-03-06 02:02:20', '2017-03-06 02:02:20'),
(6, 'superadmin', '_superadmin', 0, '2017-03-13 03:15:25', '2017-03-13 03:15:25'),
(7, 'user editor', '_user-editor', 0, '2017-03-13 03:15:25', '2017-03-13 03:15:25'),
(8, 'group editor', '_group-editor', 0, '2017-03-13 03:15:25', '2017-03-13 03:15:25'),
(9, 'permission editor', '_permission-editor', 0, '2017-03-13 03:15:25', '2017-03-13 03:15:25'),
(10, 'profile type editor', '_profile-editor', 0, '2017-03-13 03:15:25', '2017-03-13 03:15:25'),
(11, 'superadmin', '_superadmin', 0, '2017-04-09 09:01:27', '2017-04-09 09:01:27'),
(12, 'user editor', '_user-editor', 0, '2017-04-09 09:01:27', '2017-04-09 09:01:27'),
(13, 'group editor', '_group-editor', 0, '2017-04-09 09:01:27', '2017-04-09 09:01:27'),
(14, 'permission editor', '_permission-editor', 0, '2017-04-09 09:01:27', '2017-04-09 09:01:27'),
(15, 'profile type editor', '_profile-editor', 0, '2017-04-09 09:01:27', '2017-04-09 09:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `profile_field`
--

DROP TABLE IF EXISTS `profile_field`;
CREATE TABLE `profile_field` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) UNSIGNED NOT NULL,
  `profile_field_type_id` int(10) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_field_type`
--

DROP TABLE IF EXISTS `profile_field_type`;
CREATE TABLE `profile_field_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `samples`
--

DROP TABLE IF EXISTS `samples`;
CREATE TABLE `samples` (
  `sample_id` int(10) UNSIGNED NOT NULL,
  `sample_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `sample_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
CREATE TABLE `sites` (
  `site_id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_url_category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`site_id`, `site_name`, `site_url`, `site_url_category`, `site_image`, `site_status`) VALUES
(2, 'Careerlink', 'https://www.careerlink.vn/', NULL, 'http://dev.local/photos/58e1fb049baca.png', 1),
(3, 'Vietnamwork', 'https://www.vietnamworks.com/tim-viec-lam', NULL, 'http://dev.local/photos/58f8059bb2753.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sites_categories`
--

DROP TABLE IF EXISTS `sites_categories`;
CREATE TABLE `sites_categories` (
  `site_category_id` int(10) UNSIGNED NOT NULL,
  `site_id` int(11) NOT NULL,
  `site_category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_category_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_category_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sites_categories`
--

INSERT INTO `sites_categories` (`site_category_id`, `site_id`, `site_category_name`, `site_category_url`, `site_category_status`) VALUES
(330, 2, 'Bán hàng', 'https://www.careerlink.vn/viec-lam/ban-hang/31', 1),
(331, 2, 'Bán lẻ/ Bán sỉ', 'https://www.careerlink.vn/viec-lam/ban-le-ban-si/190', 1),
(332, 2, 'Báo chí/ Biên tập viên/ Xuất bản', 'https://www.careerlink.vn/viec-lam/bao-chi-bien-tap-vien-xuat-ban/24', 1),
(333, 2, 'Bảo hiểm', 'https://www.careerlink.vn/viec-lam/bao-hiem/17', 1),
(334, 2, 'Bất động sản', 'https://www.careerlink.vn/viec-lam/bat-dong-san/29', 1),
(335, 2, 'Biên phiên dịch/ Thông dịch viên', 'https://www.careerlink.vn/viec-lam/bien-phien-dich-thong-dich-vien/18', 1),
(336, 2, 'Biên phiên dịch', 'https://www.careerlink.vn/viec-lam/bien-phien-dich-tieng-nhat/154', 1),
(337, 2, 'Chăm sóc sức khỏe/ Y tế', 'https://www.careerlink.vn/viec-lam/cham-soc-suc-khoe-y-te/14', 1),
(338, 2, 'CNTT - Phần cứng/ Mạng', 'https://www.careerlink.vn/viec-lam/cntt-phan-cung-mang/130', 1),
(339, 2, 'CNTT - Phần mềm', 'https://www.careerlink.vn/viec-lam/cntt-phan-mem/19', 1),
(340, 2, 'Dầu khí/ Khoáng sản', 'https://www.careerlink.vn/viec-lam/dau-khi-khoang-san/26', 1),
(341, 2, 'Dệt may/ Da giày', 'https://www.careerlink.vn/viec-lam/det-may-da-giay/33', 1),
(342, 2, 'Dịch vụ khách hàng', 'https://www.careerlink.vn/viec-lam/dich-vu-khach-hang/9', 1),
(343, 2, 'Dược/ Sinh học', 'https://www.careerlink.vn/viec-lam/duoc-sinh-hoc/28', 1),
(344, 2, 'Điện/ Điện tử', 'https://www.careerlink.vn/viec-lam/dien-dien-tu/148', 1),
(345, 2, 'Giáo dục/ Đào tạo/ Thư viện', 'https://www.careerlink.vn/viec-lam/giao-duc-dao-tao-thu-vien/10', 1),
(346, 2, 'Hàng gia dụng', 'https://www.careerlink.vn/viec-lam/hang-gia-dung/189', 1),
(347, 2, 'Hóa chất/ Sinh hóa/ Thực phẩm', 'https://www.careerlink.vn/viec-lam/hoa-chat-sinh-hoa-thuc-pham/127', 1),
(348, 2, 'Kế toán/ Tài chính/ Kiểm toán', 'https://www.careerlink.vn/viec-lam/ke-toan-tai-chinh-kiem-toan/1', 1),
(349, 2, 'Khách sạn/ Du lịch', 'https://www.careerlink.vn/viec-lam/khach-san-du-lich/15', 1),
(350, 2, 'Kiến trúc', 'https://www.careerlink.vn/viec-lam/kien-truc/139', 1),
(351, 2, 'Kỹ thuật ứng dụng/ Cơ khí', 'https://www.careerlink.vn/viec-lam/ky-thuat-ung-dung-co-khi/11', 1),
(352, 2, 'Lao động phổ thông', 'https://www.careerlink.vn/viec-lam/lao-dong-pho-thong/20', 1),
(353, 2, 'Môi trường/ Xử lý chất thải', 'https://www.careerlink.vn/viec-lam/moi-truong-xu-ly-chat-thai/142', 1),
(354, 2, 'Mới tốt nghiệp/ Thực tập', 'https://www.careerlink.vn/viec-lam/moi-tot-nghiep-thuc-tap/118', 1),
(355, 2, 'Ngân hàng/ Chứng khoán/ Đầu tư', 'https://www.careerlink.vn/viec-lam/ngan-hang-chung-khoan-dau-tu/5', 1),
(356, 2, 'Nghệ thuật/ Thiết kế/ Giải trí', 'https://www.careerlink.vn/viec-lam/nghe-thuat-thiet-ke-giai-tri/4', 1),
(357, 2, 'Người nước ngoài', 'https://www.careerlink.vn/viec-lam/nguoi-nuoc-ngoai/12', 1),
(358, 2, 'Nhà hàng/ Dịch vụ ăn uống', 'https://www.careerlink.vn/viec-lam/nha-hang-dich-vu-an-uong/30', 1),
(359, 2, 'Nhân sự', 'https://www.careerlink.vn/viec-lam/nhan-su/16', 1),
(360, 2, 'Nông nghiệp/ Lâm nghiệp', 'https://www.careerlink.vn/viec-lam/nong-nghiep-lam-nghiep/3', 1),
(361, 2, 'Ô tô', 'https://www.careerlink.vn/viec-lam/o-to/151', 1),
(362, 2, 'Pháp lý/ Luật', 'https://www.careerlink.vn/viec-lam/phap-ly-luat/21', 1),
(363, 2, 'Phi chính phủ/ Phi lợi nhuận', 'https://www.careerlink.vn/viec-lam/phi-chinh-phu-phi-loi-nhuan/25', 1),
(364, 2, 'Quản lý chất lượng', 'https://www.careerlink.vn/viec-lam/quan-ly-chat-luong-qa-qc/145', 1),
(365, 2, 'Quản lý điều hành', 'https://www.careerlink.vn/viec-lam/quan-ly-dieu-hanh/22', 1),
(366, 2, 'Quảng cáo/ Khuyến mãi/ Đối ngoại', 'https://www.careerlink.vn/viec-lam/quang-cao-khuyen-mai-doi-ngoai/2', 1),
(367, 2, 'Sản xuất/ Vận hành sản xuất', 'https://www.careerlink.vn/viec-lam/san-xuat-van-hanh-san-xuat/23', 1),
(368, 2, 'Thư ký/ Hành chánh', 'https://www.careerlink.vn/viec-lam/thu-ky-hanh-chanh/6', 1),
(369, 2, 'Tiếp thị', 'https://www.careerlink.vn/viec-lam/tiep-thi/136', 1),
(370, 2, 'Tư vấn', 'https://www.careerlink.vn/viec-lam/tu-van/7', 1),
(371, 2, 'Vận chuyển/ Giao thông/ Kho bãi', 'https://www.careerlink.vn/viec-lam/van-chuyen-giao-thong-kho-bai/34', 1),
(372, 2, 'Vật tư/ Mua hàng', 'https://www.careerlink.vn/viec-lam/vat-tu-mua-hang/27', 1),
(373, 2, 'Viễn Thông', 'https://www.careerlink.vn/viec-lam/vien-thong/32', 1),
(374, 2, 'Xây dựng', 'https://www.careerlink.vn/viec-lam/xay-dung/8', 1),
(375, 2, 'Xuất nhập khẩu/ Ngoại thương', 'https://www.careerlink.vn/viec-lam/xuat-nhap-khau-ngoai-thuong/13', 1),
(376, 2, 'Khác', 'https://www.careerlink.vn/viec-lam/khac/35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sites_works`
--

DROP TABLE IF EXISTS `sites_works`;
CREATE TABLE `sites_works` (
  `work_id` int(11) NOT NULL,
  `work_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `work_category` int(11) NOT NULL,
  `work_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `work_description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
CREATE TABLE `templates` (
  `template_id` int(10) UNSIGNED NOT NULL,
  `template_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `template_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `template_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`template_id`, `template_name`, `template_content`, `template_status`) VALUES
(1, 'template1', '<h3>Template<h3>', 1),
(2, 'Template 2', '<h1> Template 2</h1>', 1),
(3, 'Template 3', '<a href=\'#\'>Template3</a>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

DROP TABLE IF EXISTS `throttle`;
CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 1, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(2, 1, '::1', 0, 0, 0, NULL, NULL, NULL),
(3, 1, '192.168.1.5', 0, 0, 0, NULL, NULL, NULL),
(4, 2, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(5, 2, '::1', 0, 0, 0, NULL, NULL, NULL),
(6, 1, '192.168.137.114', 0, 0, 0, NULL, NULL, NULL),
(7, 1, '192.168.137.1', 0, 0, 0, NULL, NULL, NULL),
(8, 2, '192.168.137.1', 0, 0, 0, NULL, NULL, NULL),
(9, 1, '192.168.1.184', 0, 0, 0, NULL, NULL, NULL),
(10, 1, '192.168.1.45', 0, 0, 0, NULL, NULL, NULL),
(11, 2, '192.168.1.45', 0, 0, 0, NULL, NULL, NULL),
(12, 1, '192.168.1.183', 0, 0, 0, NULL, NULL, NULL),
(13, 2, '192.168.1.183', 0, 0, 0, NULL, NULL, NULL),
(14, 2, '192.168.137.208', 0, 0, 0, NULL, NULL, NULL),
(15, 1, '192.168.137.76', 0, 0, 0, NULL, NULL, NULL),
(16, 2, '192.168.137.76', 0, 0, 0, NULL, NULL, NULL),
(17, 1, '192.168.137.208', 0, 0, 0, NULL, NULL, NULL),
(18, 1, '192.168.1.69', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `banned`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `protected`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', '$2y$10$r94SZPvdNI2VAVFdEd.aSeD0hIFv2t8ht/RTDkZ7xsm1iHLRnQKtS', NULL, 1, 0, NULL, NULL, '2017-04-23 23:06:40', '$2y$10$ojzEgbT/2DACELuesPHHzeLBPwOSTICltwMPS1/vw54W051Q7xks.', NULL, 0, '2017-03-06 02:02:20', '2017-04-23 23:06:40'),
(2, 'ginzkel@gmail.com', '$2y$10$r94SZPvdNI2VAVFdEd.aSeD0hIFv2t8ht/RTDkZ7xsm1iHLRnQKtS', NULL, 1, 0, NULL, NULL, '2017-04-24 01:02:13', '$2y$10$UmxGenkdPip4Heppr/fVze9iREdnb9KGToHmQFpjcff5LP/UWr12O', NULL, 0, '2017-03-06 02:02:20', '2017-04-24 01:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE `user_profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vat` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `code`, `vat`, `first_name`, `last_name`, `phone`, `state`, `city`, `country`, `zip`, `address`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-06 02:02:20', '2017-03-06 02:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

DROP TABLE IF EXISTS `works`;
CREATE TABLE `works` (
  `work_id` int(10) UNSIGNED NOT NULL,
  `work_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `work_category` int(11) NOT NULL,
  `work_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `work_salary` int(11) NOT NULL DEFAULT '0',
  `work_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`work_id`, `work_name`, `work_category`, `work_description`, `work_salary`, `work_status`) VALUES
(1, 'Tkw1', 5, '<p><img src=\"/photos/1417574134_social_meida.png\" alt=\"\" width=\"511\" height=\"462\" /></p>', 10001, 1);

-- --------------------------------------------------------

--
-- Table structure for table `works_categories`
--

DROP TABLE IF EXISTS `works_categories`;
CREATE TABLE `works_categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_parent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `works_categories`
--

INSERT INTO `works_categories` (`category_id`, `category_name`, `category_parent`, `category_description`, `category_status`) VALUES
(4, 'Kế toán', '0', NULL, 1),
(5, 'KT1', '4', NULL, 1),
(8, 'Công nghệ thông tin', '0', '', 1),
(9, 'Công nghệ phần mềm', '8', NULL, 1),
(10, 'KT2', '5', NULL, 1),
(11, 'KT3', '4', NULL, 1),
(12, 'Mạng máy tính', '8', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `map_categories`
--
ALTER TABLE `map_categories`
  ADD PRIMARY KEY (`map_category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_field`
--
ALTER TABLE `profile_field`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profile_field_profile_id_profile_field_type_id_unique` (`profile_id`,`profile_field_type_id`),
  ADD KEY `profile_field_profile_field_type_id_foreign` (`profile_field_type_id`);

--
-- Indexes for table `profile_field_type`
--
ALTER TABLE `profile_field_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `samples`
--
ALTER TABLE `samples`
  ADD PRIMARY KEY (`sample_id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `sites_categories`
--
ALTER TABLE `sites_categories`
  ADD PRIMARY KEY (`site_category_id`),
  ADD UNIQUE KEY `site_category_url` (`site_category_url`);

--
-- Indexes for table `sites_works`
--
ALTER TABLE `sites_works`
  ADD PRIMARY KEY (`work_id`),
  ADD UNIQUE KEY `work_url` (`work_url`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`template_id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_activation_code_index` (`activation_code`),
  ADD KEY `users_reset_password_code_index` (`reset_password_code`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profile_user_id_foreign` (`user_id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`work_id`);

--
-- Indexes for table `works_categories`
--
ALTER TABLE `works_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `map_categories`
--
ALTER TABLE `map_categories`
  MODIFY `map_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `profile_field`
--
ALTER TABLE `profile_field`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile_field_type`
--
ALTER TABLE `profile_field_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `samples`
--
ALTER TABLE `samples`
  MODIFY `sample_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `site_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sites_categories`
--
ALTER TABLE `sites_categories`
  MODIFY `site_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=632;
--
-- AUTO_INCREMENT for table `sites_works`
--
ALTER TABLE `sites_works`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `template_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `work_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `works_categories`
--
ALTER TABLE `works_categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile_field`
--
ALTER TABLE `profile_field`
  ADD CONSTRAINT `profile_field_profile_field_type_id_foreign` FOREIGN KEY (`profile_field_type_id`) REFERENCES `profile_field_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profile_field_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
