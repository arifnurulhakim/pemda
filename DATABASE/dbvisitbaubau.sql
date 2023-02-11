-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2022 at 02:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbvisitbaubau`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(50) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isi_artikel` text NOT NULL,
  `tgl_artikel` date NOT NULL,
  `gambar_artikel` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `slug`, `isi_artikel`, `tgl_artikel`, `gambar_artikel`, `created_at`, `updated_at`) VALUES
(27, 'Pesona Tana Wolio 2023', 'pesona-tana-wolio-2023', '<p class=\"MsoNormal\"></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><span style=\"font-family: \"Open Sans\";\">﻿</span><span style=\"font-family: \"Open Sans\";\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consequat eros id ligula dictum dictum. Vivamus ante justo, pulvinar a tincidunt et, lacinia ut ante. Fusce tempor eros risus, a sagittis augue imperdiet quis. Donec auctor risus a sapien rhoncus tempus. Ut elit ex, interdum et ipsum nec, vehicula commodo mi. Praesent mollis tincidunt lectus eget aliquam. In pretium mi at mauris pretium iaculis. Nulla nec sem mattis, tempor leo et, ornare quam. Praesent velit sapien, euismod pretium massa et, tristique ornare diam. Fusce eleifend est eget est porttitor, non feugiat lorem rhoncus. Nullam at tincidunt augue, eget congue metus. Suspendisse potenti. Aenean viverra leo non lorem tincidunt molestie.</span></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><span style=\"font-family: \"Open Sans\";\">Morbi at felis eu diam viverra mollis. Nulla pretium sollicitudin nulla, a elementum massa imperdiet at. Nullam placerat elit ac nibh blandit, vel convallis elit condimentum. Proin accumsan lorem eu sodales semper. Quisque finibus lobortis diam et ornare. Nullam purus metus, euismod eu nibh interdum, ultricies ullamcorper quam. Proin ut accumsan orci, hendrerit consectetur sapien. Etiam neque purus, tincidunt sed nisi eget, cursus eleifend purus. Vivamus a convallis lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec rhoncus elit purus, vel rhoncus enim congue ac. Morbi ligula nisi, convallis in justo non, ultrices tincidunt eros. Nullam gravida, ipsum vel pharetra venenatis, odio mi imperdiet enim, nec pulvinar massa orci vel sapien.</span></p><p></p><p></p>', '2022-07-27', 'Screenshot 2021-12-28 145411_1.png', '2022-07-07 06:41:36', '2022-07-27 01:45:45'),
(28, 'Sejarah Benteng Keraton', 'sejarah-benteng-keraton', '<span style=\"font-family: Roboto;\">Membicarakan benteng Wolio, kiranya tidak dapat dipisahkan dengan sejarah Kesultanan Buton karena kerajaan inilah yang melatarbelakangi berdirinya benteng ini. Sebagai salah satu kesultanan yang muncul sekitar abad ke-16 (tahun 1542) yang didirikan oleh Laki Laponto gelar Murhum atau Sultan Kaimuddin. Sebelum menjadi kesultanan pemerintahannya adalah Kerajaan Buton yang telah dikenal di Nusantara sebagai salah satu pembayar upeti pada Kerajaan Majapahit (pemberitaan Negarakertagama)\r\nBenteng ini didirikan tahun 1610 oleh Sultan Buton ke-4 yaitu Dhayanu Iksanuddin atau nama aslinya La Elangi dengan gelar Mobolina Pauna.\r\n\r\nUkuran benteng Keraton Buton adalah dengan keliling bangunan 2740m yang berbentuk mengikuti kontur tanah dengan posisi di atas bukit.\r\nBenteng Keraton Buton mempunyai Bastion sebanyak 16 buah dengan perincian bastion bulat 6 buah dan bastion segi empat buah yang terletak pada bagian barat sebanyak 1 buah, utara 6 buah, selatan 5 buah dan timur 4 buah.\r\nBenteng ini terbuat dari batu karang yang disusun menurut besar pecahan batunya dan tiap batu tidak dibentuk persegi panjang.\r\nDisebut Benteng Keraton Buton karena di dalam Benteng tersebut terdapat rumah tinggal Sultan Buton.</span>', '2022-07-25', 'bentengkeraton_1.png', '2022-07-07 06:41:36', '2022-07-24 21:29:58'),
(34, 'tess', 'tess', 'tes', '2022-07-25', '1658720947_83bbb85e52d846b7886f.jpg', '2022-07-24 22:49:07', '2022-07-24 22:49:07'),
(35, 'Gambar', 'gambar', '<p>tess</p><p><img src=\"http://localhost:8080/img/uploads/artikel/1658725452_5fc7ac5fd094537c5c15.jpg\" style=\"\"></p><p><br></p><p><img src=\"http://localhost:8080/img/uploads/artikel/1658725469_ee99014ef3ae575f421f.jpg\" style=\"width: 25%;\">1<br></p>', '2022-07-27', '1658725522_ca86a173a79594acd8cb.jpg', '2022-07-25 00:05:22', '2022-07-26 22:51:22');

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', '9fc6aa9f066d5626ed91b8162a751668', '2022-07-18 03:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Site Administrator'),
(2, 'penjual', 'Site Penjual');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 3),
(2, 4),
(2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(2, '::1', 'qwerty@gmail.com', 3, '2022-07-17 09:32:04', 1),
(3, '::1', 'agusindra376@gmail.com', 4, '2022-07-17 10:06:29', 1),
(4, '::1', 'agusindra376@gmail.com', 4, '2022-07-17 10:09:09', 1),
(5, '::1', 'agusindra376@gmail.com', 4, '2022-07-17 10:16:30', 1),
(6, '::1', 'qwerty@gmail.com', 3, '2022-07-17 10:16:42', 1),
(7, '::1', 'agusindra376@gmail.com', 4, '2022-07-17 10:18:08', 1),
(8, '::1', 'qwerty@gmail.com', 3, '2022-07-17 10:20:40', 1),
(9, '::1', 'qwerty@gmail.com', 3, '2022-07-17 10:22:03', 1),
(10, '::1', 'agusindra376@gmail.com', 4, '2022-07-17 10:22:16', 1),
(11, '::1', 'qwerty@gmail.com', 3, '2022-07-17 10:33:33', 1),
(12, '::1', 'qwerty@gmail.com', 3, '2022-07-17 10:33:58', 1),
(13, '::1', 'agusindra376@gmail.com', 4, '2022-07-17 10:36:34', 1),
(14, '::1', 'qwerty@gmail.com', 3, '2022-07-17 10:47:07', 1),
(15, '::1', 'qwerty@gmail.com', 3, '2022-07-17 10:50:21', 1),
(16, '::1', 'agusindra376@gmail.com', 4, '2022-07-17 10:50:31', 1),
(17, '::1', 'qwerty@gmail.com', 3, '2022-07-17 10:50:41', 1),
(18, '::1', 'agusindra376@gmail.com', 4, '2022-07-17 10:50:58', 1),
(19, '::1', 'qwerty@gmail.com', 3, '2022-07-17 21:32:53', 1),
(20, '::1', 'qwerty@gmail.com', 3, '2022-07-18 00:12:21', 1),
(21, '::1', 'qwerty@gmail.com', 3, '2022-07-18 00:13:06', 1),
(22, '::1', 'qwerty@gmail.com', 3, '2022-07-18 00:13:14', 1),
(23, '::1', 'qwerty@gmail.com', 3, '2022-07-18 02:40:03', 1),
(24, '::1', 'qwerty@gmail.com', 3, '2022-07-18 02:45:12', 1),
(25, '::1', 'skybloods19@gmail.com', 6, '2022-07-18 03:24:07', 0),
(26, '::1', 'skybloods19@gmail.com', 7, '2022-07-18 03:44:31', 1),
(27, '::1', 'qwerty@gmail.com', 3, '2022-07-18 03:50:57', 1),
(28, '::1', 'skybloods19@gmail.com', 7, '2022-07-18 04:22:04', 1),
(29, '::1', 'qwerty@gmail.com', 3, '2022-07-18 07:59:40', 1),
(30, '::1', 'qwerty@gmail.com', 3, '2022-07-18 20:23:29', 1),
(31, '::1', 'agusindra376@gmail.com', 4, '2022-07-18 20:34:49', 1),
(32, '::1', 'qwerty@gmail.com', 3, '2022-07-18 23:10:47', 1),
(33, '::1', 'qwerty@gmail.com', 3, '2022-07-18 23:22:06', 1),
(34, '::1', 'qwerty@gmail.com', 3, '2022-07-19 06:21:53', 1),
(35, '::1', 'skybloods19@gmail.com', NULL, '2022-07-19 06:25:13', 0),
(36, '::1', 'skybloods19@gmail.com', 7, '2022-07-19 06:25:19', 1),
(37, '::1', 'qwerty@gmail.com', 3, '2022-07-19 06:28:35', 1),
(38, '::1', 'skybloods19@gmail.com', NULL, '2022-07-19 07:28:02', 0),
(39, '::1', 'qwerty@gmail.com', 3, '2022-07-19 07:28:08', 1),
(40, '::1', 'agusindra376@gmail.com', NULL, '2022-07-19 07:34:43', 0),
(41, '::1', 'skybloods19@gmail.com', 7, '2022-07-19 07:34:47', 1),
(42, '::1', 'qwerty@gmail.com', 3, '2022-07-19 21:03:57', 1),
(43, '::1', 'qwerty@gmail.com', 3, '2022-07-19 21:32:18', 1),
(44, '::1', 'qwerty@gmail.com', 3, '2022-07-19 21:32:30', 1),
(45, '::1', 'qwerty@gmail.com', 3, '2022-07-19 21:32:51', 1),
(46, '::1', 'qwerty@gmail.com', 3, '2022-07-19 21:33:22', 1),
(47, '::1', 'qwerty@gmail.com', NULL, '2022-07-19 21:36:05', 0),
(48, '::1', 'qwerty@gmail.com', 3, '2022-07-19 21:36:12', 1),
(49, '::1', 'agusindra376@gmail.com', NULL, '2022-07-19 21:36:42', 0),
(50, '::1', 'agusindra376@gmail.com', NULL, '2022-07-19 21:37:35', 0),
(51, '::1', 'qwerty@gmail.com', 3, '2022-07-20 00:25:31', 1),
(52, '::1', 'qwerty@gmail.com', 3, '2022-07-20 00:26:39', 1),
(53, '::1', 'agusindra376@gmail.com', NULL, '2022-07-20 00:28:25', 0),
(54, '::1', 'agusindra376@gmail.com', NULL, '2022-07-20 00:28:30', 0),
(55, '::1', 'agusindra376@gmail.com', NULL, '2022-07-20 00:28:40', 0),
(56, '::1', 'skybloods19@gmail.com', 7, '2022-07-20 00:28:46', 1),
(57, '::1', 'skybloods19@gmail.com', 7, '2022-07-20 00:40:47', 1),
(58, '::1', 'skybloods19@gmail.com', NULL, '2022-07-20 01:05:14', 0),
(59, '::1', 'skybloods19@gmail.com', 7, '2022-07-20 01:05:20', 1),
(60, '::1', 'qwerty@gmail.com', 3, '2022-07-20 01:20:29', 1),
(61, '::1', 'skybloods19@gmail.com', NULL, '2022-07-20 01:28:32', 0),
(62, '::1', 'qwerty@gmail.com', 3, '2022-07-20 01:28:40', 1),
(63, '::1', 'skybloods19@gmail.com', 7, '2022-07-20 01:31:29', 1),
(64, '::1', 'skybloods19@gmail.com', 7, '2022-07-20 02:47:29', 1),
(65, '::1', 'skybloods19@gmail.com', 7, '2022-07-20 03:04:31', 1),
(66, '::1', 'qwerty@gmail.com', 3, '2022-07-20 03:43:35', 1),
(67, '::1', 'skybloods19@gmail.com', 7, '2022-07-20 04:03:48', 1),
(68, '::1', 'qwerty@gmail.com', 3, '2022-07-20 04:07:27', 1),
(69, '::1', 'skybloods19@gmail.com', 7, '2022-07-20 04:26:21', 1),
(70, '::1', 'qwerty@gmail.com', 3, '2022-07-20 04:39:29', 1),
(71, '::1', 'skybloods19@gmail.com', NULL, '2022-07-20 05:00:26', 0),
(72, '::1', 'skybloods19@gmail.com', 7, '2022-07-20 05:00:36', 1),
(73, '::1', 'qwerty@gmail.com', 3, '2022-07-20 05:05:59', 1),
(74, '::1', 'skybloods19@gmail.com', 7, '2022-07-20 05:09:47', 1),
(75, '::1', 'skybloods19@gmail.com', 7, '2022-07-20 05:09:58', 1),
(76, '::1', 'skybloods19@gmail.com', NULL, '2022-07-20 05:36:03', 0),
(77, '::1', 'skybloods19@gmail.com', 7, '2022-07-20 05:36:32', 1),
(78, '::1', 'skybloods19@gmail.com', 7, '2022-07-20 05:36:58', 1),
(79, '::1', 'qwerty@gmail.com', NULL, '2022-07-20 06:49:03', 0),
(80, '::1', 'qwerty@gmail.com', NULL, '2022-07-20 06:49:14', 0),
(81, '::1', 'skybloods19@gmail.com', NULL, '2022-07-20 06:49:19', 0),
(82, '::1', 'qwerty@gmail.com', NULL, '2022-07-20 06:49:29', 0),
(83, '::1', 'qwerty@gmail.com', NULL, '2022-07-20 06:50:32', 0),
(84, '::1', 'qwerty@gmail.com', 3, '2022-07-20 06:50:37', 1),
(85, '::1', 'qwerty@gmail.com', NULL, '2022-07-20 07:08:37', 0),
(86, '::1', 'agusindra376@gmail.com', NULL, '2022-07-20 07:09:21', 0),
(87, '::1', 'skybloods19@gmail.com', 7, '2022-07-20 07:09:57', 1),
(88, '::1', 'skybloods19@gmail.com', NULL, '2022-07-20 07:22:37', 0),
(89, '::1', 'qwerty@gmail.com', 3, '2022-07-20 07:22:48', 1),
(90, '::1', 'agusindra376@gmail.com', 4, '2022-07-20 07:31:42', 1),
(91, '::1', 'qwerty@gmail.com', 3, '2022-07-20 07:40:15', 1),
(92, '::1', 'skybloods19@gmail.com', 7, '2022-07-20 07:40:23', 1),
(93, '::1', 'qwerty@gmail.com', 3, '2022-07-20 08:28:01', 1),
(94, '::1', 'qwerty@gmail.com', 3, '2022-07-20 08:30:51', 1),
(95, '::1', 'qwerty@gmail.com', 3, '2022-07-20 08:43:23', 1),
(96, '::1', 'qwerty@gmail.com', 3, '2022-07-20 23:24:52', 1),
(97, '::1', 'skybloods19@gmail.com', 7, '2022-07-20 23:25:21', 1),
(98, '::1', 'qwerty@gmail.com', 3, '2022-07-21 00:10:13', 1),
(99, '::1', 'skybloods19@gmail.com', 7, '2022-07-21 00:33:42', 1),
(100, '::1', 'skybloods19@gmail.com', 7, '2022-07-21 02:58:13', 1),
(101, '::1', 'qwerty@gmail.com', 3, '2022-07-23 21:58:34', 1),
(102, '::1', 'skybloods19@gmail.com', NULL, '2022-07-23 22:04:26', 0),
(103, '::1', 'skybloods19@gmail.com', 7, '2022-07-23 22:04:30', 1),
(104, '::1', 'skybloods19@gmail.com', NULL, '2022-07-24 05:06:05', 0),
(105, '::1', 'skybloods19@gmail.com', 7, '2022-07-24 05:06:10', 1),
(106, '::1', 'skybloods19@gmail.com', 7, '2022-07-24 05:06:34', 1),
(107, '::1', 'skybloods19@gmail.com', 7, '2022-07-24 05:10:45', 1),
(108, '::1', 'agusindra376@gmail.com', 4, '2022-07-24 05:11:03', 1),
(109, '::1', 'agusindra376@gmail.com', 4, '2022-07-24 05:12:12', 1),
(110, '::1', 'skybloods19@gmail.com', 7, '2022-07-24 05:12:39', 1),
(111, '::1', 'skybloods19@gmail.com', 7, '2022-07-24 05:14:14', 1),
(112, '::1', 'skybloods19@gmail.com', 7, '2022-07-24 05:15:41', 1),
(113, '::1', 'skybloods19@gmail.com', NULL, '2022-07-24 05:19:44', 0),
(114, '::1', 'skybloods19@gmail.com', NULL, '2022-07-24 05:19:51', 0),
(115, '::1', 'skybloods19@gmail.com', 7, '2022-07-24 05:20:00', 1),
(116, '::1', 'agusindra376@gmail.com', 4, '2022-07-24 05:20:25', 1),
(117, '::1', 'skybloods19@gmail.com', 7, '2022-07-24 05:20:57', 1),
(118, '::1', 'skybloods19@gmail.com', NULL, '2022-07-24 19:14:21', 0),
(119, '::1', 'skybloods19@gmail.com', 7, '2022-07-24 19:14:30', 1),
(120, '::1', 'qwerty@gmail.com', 3, '2022-07-24 19:18:54', 1),
(121, '::1', 'skybloods19@gmail.com', 7, '2022-07-25 00:17:50', 1),
(122, '::1', 'qwerty@gmail.com', 3, '2022-07-25 00:18:31', 1),
(123, '::1', 'qwerty@gmail.com', 3, '2022-07-25 00:26:01', 1),
(124, '::1', 'qwerty@gmail.com', 3, '2022-07-25 04:58:58', 1),
(125, '::1', 'skybloods19@gmail.com', 7, '2022-07-25 06:08:20', 1),
(126, '::1', 'qwerty@gmail.com', 3, '2022-07-25 06:11:24', 1),
(127, '::1', 'qwerty@gmail.com', 3, '2022-07-26 00:08:47', 1),
(128, '::1', 'qwerty@gmail.com', 3, '2022-07-26 05:39:13', 1),
(129, '::1', 'skybloods19@gmail.com', NULL, '2022-07-26 05:39:34', 0),
(130, '::1', 'skybloods19@gmail.com', 7, '2022-07-26 05:39:39', 1),
(131, '::1', 'qwerty@gmail.com', 3, '2022-07-26 05:40:07', 1),
(132, '::1', 'qwerty@gmail.com', 3, '2022-07-26 05:41:21', 1),
(133, '::1', 'skybloods19@gmail.com', 7, '2022-07-26 05:41:36', 1),
(134, '::1', 'qwerty@gmail.com', 3, '2022-07-26 05:46:03', 1),
(135, '::1', 'qwerty@gmail.com', 3, '2022-07-26 05:46:24', 1),
(136, '::1', 'qwerty@gmail.com', 3, '2022-07-26 05:46:48', 1),
(137, '::1', 'qwerty@gmail.com', 3, '2022-07-26 05:47:59', 1),
(138, '::1', 'qwerty@gmail.com', 3, '2022-07-26 05:50:46', 1),
(139, '::1', 'qwerty@gmail.com', 3, '2022-07-26 05:58:48', 1),
(140, '::1', 'qwerty@gmail.com', 3, '2022-07-26 05:59:40', 1),
(141, '::1', 'qwerty@gmail.com', 3, '2022-07-26 09:43:53', 1),
(142, '::1', 'qwerty@gmail.com', NULL, '2022-07-26 19:58:26', 0),
(143, '::1', 'qwerty@gmail.com', 3, '2022-07-26 19:58:32', 1),
(144, '::1', 'skybloods19@gmail.com', 7, '2022-07-26 20:24:15', 1),
(145, '::1', 'qwerty@gmail.com', 3, '2022-07-26 20:25:09', 1),
(146, '::1', 'skybloods19@gmail.com', 7, '2022-07-26 22:30:30', 1),
(147, '::1', 'qwerty@gmail.com', 3, '2022-07-26 22:31:49', 1),
(148, '::1', 'qwerty@gmail.com', 3, '2022-07-27 05:41:30', 1),
(149, '::1', 'skybloods19@gmail.com', 7, '2022-07-27 06:01:55', 0),
(150, '::1', 'qwerty@gmail.com', 3, '2022-07-27 06:02:12', 1),
(151, '::1', 'agusindra376@gmail.com', NULL, '2022-07-27 06:12:28', 0),
(152, '::1', 'agusindra376@gmail.com', 4, '2022-07-27 06:12:32', 1),
(153, '::1', 'qwerty@gmail.com', 3, '2022-07-27 06:12:54', 1),
(154, '::1', 'qwerty@gmail.com', 3, '2022-07-27 06:36:00', 1),
(155, '::1', 'qwerty@gmail.com', 3, '2022-07-28 00:15:31', 1),
(156, '::1', 'skybloods19@gmail.com', NULL, '2022-07-28 00:15:44', 0),
(157, '::1', 'skybloods19@gmail.com', 7, '2022-07-28 00:15:49', 1),
(158, '::1', 'qwerty@gmail.com', 3, '2022-07-28 00:16:13', 1),
(159, '::1', 'qwerty@gmail.com', 3, '2022-07-28 00:27:56', 1),
(160, '::1', 'qwerty@gmail.com', 3, '2022-07-28 00:39:46', 1),
(161, '::1', 'qwerty@gmail.com', 3, '2022-07-28 01:58:28', 1),
(162, '::1', 'qwerty@gmail.com', 3, '2022-07-28 03:35:21', 1),
(163, '::1', 'skybloods19@gmail.com', 7, '2022-07-28 04:00:06', 1),
(164, '::1', 'qwerty@gmail.com', 3, '2022-07-28 07:49:46', 1),
(165, '::1', 'skybloods19@gmail.com', 7, '2022-07-28 08:06:30', 1),
(166, '::1', 'skybloods19@gmail.com', 7, '2022-07-29 06:06:39', 1),
(167, '::1', 'qwerty@gmail.com', 3, '2022-07-29 06:50:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-users', 'Manage All User'),
(2, 'manage-profile', 'Manage user\'s profile');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, 'skybloods19@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'eef562b59c0dc95883ddbf05bed5c253', '2022-07-18 04:21:54'),
(2, 'agusindra376@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'b4bf6789a9ad1f318b5e0348af846128', '2022-07-20 07:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(10) NOT NULL,
  `nama_event` varchar(200) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `lokasi_event` varchar(200) NOT NULL,
  `tgl_event_mulai` date NOT NULL,
  `tgl_event_berakhir` date NOT NULL,
  `deskripsi_event` text NOT NULL,
  `status_event` int(11) DEFAULT NULL,
  `gambar_event` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `slug`, `lokasi_event`, `tgl_event_mulai`, `tgl_event_berakhir`, `deskripsi_event`, `status_event`, `gambar_event`, `created_at`, `updated_at`) VALUES
(9, 'Napak Tilas Oputa Yi Koo', 'napak-tilas-oputa-yi-koo', 'Kota Baubau', '2021-05-22', '2021-06-28', 'Tapak Tilas Oputa Yi Koo 2022 : “Sadar Sejarah Menuju Generasi Emas Sulawesi Tenggara”.\r\nKegiatan ini akan dilaksanakan di Kota Baubau dan Kabupaten Buton pada 22-28 Mei 2022 dengan rangkaian kegiatan yaitu :\r\n- Lomba Tapak Tilas\r\n- Lomba Pidato Kepahlawanan\r\n- Lomba Monolog Story Telling\r\n- Lomba Pentas Seni Drama Musikal\r\n- Lomba Cerdas Cermat\r\n- Lomba Video Edukasi\r\n- Lomba Kabanti\r\n- Lomba Mewarnai\r\n- Lomba Senam Kreasi PKK\r\n- Lomba Kostum Pahlawan\r\n- Lomba Nyanyi Solo\r\n- Lomba Perahu Hias\r\n- Lomba Buku Cerita Bergambar\r\n- Lomba Film Pendek\r\n- Lomba Vlog\r\n- Lomba Foto Kontes\r\n- Lomba Video Kontes\r\n- Lomba Foto Jurnal\r\n- Lomba Film Animasi\r\n- Lomba E-Sport\r\n- Lomba Bercerita Online\r\n- Dll\r\nDengan total hadiah sebesar Rp. 650.000.000,- !!!!\r\nInformasi lebih lanjut mengenai persyaratan lomba dapat mengunjungi www.napaktilassultra.id atau kunjungi instagram @napaktilas.sultra!\r\nSEGERA DAFTARKAN DIRI ANDA/SAUDARA/TEMAN KARENA PENDAFTARAN HANYA SAMPAI 20 MARET 2022!\r\nLink Pendaftaran : https://linktr.ee/Napaktilassultra\r\nCP : 0811181198 (IG @napaktilas.sultra / @kiramedia.id)', 1, '1654130321_b7ecd51787d4b40813b9.png', '0000-00-00 00:00:00', '2022-07-26 23:06:18'),
(10, 'Pameran Seni Rupa', 'pameran-seni-rupa', 'TIC Pantai Kamali', '2021-05-14', '2021-06-24', 'Ayo datang dan ramaikan\r\n\r\nPameran Seni Rupa dalam kegiatan Mei Menggambar Nasional\r\n\r\nKegiatan ini dilaksanakan oleh Paguyuban Seniman Rupa Baubau (PASEBA).\r\n\r\nJenis karya yang dipamerkan yaitu dari sketsa, drawing, hingga lukisan.\r\n\r\nSelain melihat karya seni, dibuka juga untuk anak-anak yang ingin belajar melukis yang dipandu oleh komunitas PASEBA.\r\n\r\nPameran ini dibuka dari tanggal 14-24 Mei 2022 pukul 10.00 WITA hingga 22.00 WITA, di gedung Tourism Information Center (TIC), Pantai Kamali.\r\n', 1, '1654130479_52026c7ade22b125ab45.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Sayembara Brand Logo Pariwisata', 'sayembara-brand-logo-pariwisata', 'Baubau', '2022-04-14', '2022-04-19', 'Test', 0, 'Screenshot 2021-12-28 145311.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Launching Anugerah Desa Wisata 2022', 'launching-anugerah-desa-wisata-2022', 'Youtube Kemenparekraf', '2022-02-18', '2022-02-18', 'Hari libur enaknya tamasya,\r\nTapi jangan lupa di jaga protokolnya,\r\nKini ADWI 2022 hadir untuk Indonesia,\r\nAyo jadikan desamu tiada duanya…????????\r\n\r\nHalo #sobatparekraf di seluruh Indonesia! Jangan lewatkan “Launching Anugerah Desa Wisata 2022” jadilah saksi dalam momentum desa wisata untuk kebangkitan ekonomi bangsa.????????????????\r\n\r\nTidak hanya itu, di acara ini Mas Menteri @sandiuno juga akan meluncurkan beberapa program unggulan Kemenparekraf/Baparekraf lainnya.????????\r\n\r\nAcara ini dimeriahkan oleh @dmasivbandofficial dan @kikysaputrii, akan dipandu oleh @omeshomesh dan di hadiri langsung oleh Mas Menteri @sandiuno.\r\n\r\nCatat tanggalnya :\r\n???? Jumat, 18 Februari 2022\r\n⏰ Pukul 16.00 WIB\r\n???? Live di Youtube Kemenparekraf\r\n\r\nJadilah bagian dalam peluncuran program #ADWI2022 untuk mewujudkan pariwisata yang berkelas dunia, berdaya saing global dan berkelanjutan, untuk #IndonesiaBangkit !\r\n', 1, 'adwi.jpg', '0000-00-00 00:00:00', '2022-07-26 23:25:37'),
(22, 'asdss', 'asdss', 'asdss', '2022-07-12', '2022-07-27', '<p>asd</p>', 1, '1658903219_664214fb2405ec23bfc8.jpg', '2022-07-27 01:26:59', '2022-07-27 01:40:17'),
(24, 'asd', 'asd', 'asds', '2022-07-12', '2022-07-27', '<p>asd</p>', 1, '1658903219_664214fb2405ec23bfc8.jpg', '2022-07-27 01:36:31', '2022-07-27 01:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori_produk` int(11) NOT NULL,
  `nama_kategori_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori_produk`, `nama_kategori_produk`) VALUES
(1, 'Makanan'),
(2, 'Pakaian');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_wisata`
--

CREATE TABLE `kategori_wisata` (
  `id_kategori_wisata` int(11) NOT NULL,
  `nama_kategori_wisata` varchar(255) NOT NULL,
  `deskripsi_kategori_wisata` varchar(255) NOT NULL,
  `slug_kategori_wisata` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_wisata`
--

INSERT INTO `kategori_wisata` (`id_kategori_wisata`, `nama_kategori_wisata`, `deskripsi_kategori_wisata`, `slug_kategori_wisata`) VALUES
(1, 'Pantai', 'Pantai', 'pantai'),
(2, 'Situs Budaya', 'Situs Budaya', 'situs-budaya'),
(3, 'Diving', 'Diving\r\n', 'diving'),
(4, 'Pemandangan', 'Pemandangan', 'pemandangan'),
(6, 'Taman Wisata', 'Taman Wisata', 'taman-wisata'),
(7, 'Pusat Perbelanjaan', 'Pusat Perbelanjaan', 'pusat-perbelanjaan'),
(8, 'Sejarah', 'Sejarah', 'sejarah');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1658055142, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `id_kategori_produk` int(11) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `nama_produk`, `slug`, `deskripsi_produk`, `harga`, `berat`, `stok`, `id_kategori_produk`, `gambar_produk`, `created_at`, `updated_at`) VALUES
(20, 1, 'tes1233', 'tes1233', 'tes', 123123, 123123, 'Ada', 2, '1658674019_1ab9468c6d9949c8aeb3.png', '2022-07-24 09:46:59', '2022-07-25 06:09:17'),
(22, 2, 'testinggambar', 'testinggambar', '123', 2147483647, 2147483647, 'Ada', 1, 'default.jpg', '2022-07-24 10:37:17', '2022-07-24 11:05:23'),
(23, 4, 'Produk 1', 'produk-1', 'Produk 2', 2147483647, 22222222, 'Ada', 1, '1658679307_7fbb0de0d43f12b0ae36.jpg', '2022-07-24 11:09:30', '2022-07-26 22:30:55'),
(28, 7, 'weaaa', 'weaaa', '<p>ssad</p>', 123123, 123123, 'Ada', 4, 'default.jpg', '2022-07-28 04:41:38', '2022-07-28 04:41:51'),
(46, 0, 'qwe1', 'qwe1', '<p>asd</p>', 123, 123, 'Ada', 1, 'default.jpg', '2022-07-29 06:37:35', '2022-07-29 06:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `slug` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `no_telepon`, `alamat`, `user_image`, `slug`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'qwerty@gmail.com', 'admin', NULL, '', '', 'default.svg', '', '$2y$10$NF.lOcDvzSlG.ZjAAIT5MeNm0MvB1hFgPRlFV2w/284pUXXy3BdfW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-07-17 09:31:46', '2022-07-17 09:31:46', NULL),
(4, 'agusindra376@gmail.com', 'agusindra', 'Agus Indra', '', '', 'default.svg', '', '$2y$10$elG4FtvKK1MhVvu7TMrTP.HB/g6t3b3TFXP.ErZUhk6LR/ZpSr4Vi', NULL, '2022-07-20 07:31:37', NULL, NULL, NULL, NULL, 1, 0, '2022-07-17 10:03:06', '2022-07-28 00:42:00', NULL),
(7, 'skybloods19@gmail.com', 'testing1', NULL, '', '', 'default.svg', '', '$2y$10$1iqiiOwPcQc0axL8DK7iLeG.0w6sZce3p4Wv1tjgVSrJHaP1VCMGu', NULL, '2022-07-18 04:21:54', NULL, NULL, NULL, NULL, 1, 0, '2022-07-18 03:42:30', '2022-07-28 07:50:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(255) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `alamat_wisata` varchar(255) NOT NULL,
  `deskripsi_wisata` varchar(255) NOT NULL,
  `id_kategori_wisata` varchar(11) NOT NULL,
  `gambar_wisata` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama_wisata`, `slug`, `alamat_wisata`, `deskripsi_wisata`, `id_kategori_wisata`, `gambar_wisata`, `created_at`, `updated_at`) VALUES
(1, 'Pantai Nirwana', 'pantai-nirwana', 'Sulaa', 'Pantai Nirwana', '2', 'pantainirwana.jpg', '2022-07-25 03:13:11', '2022-07-25 03:13:11'),
(3, 'Pantai Kamali', 'pantai-kamali', 'Jl. Mayjend. Sutoyo, Wale, Kec. Wolio, Kota Bau-Bau, Sulawesi Tenggara 93717', 'Pantai Kamali1', '1', '1658712611_7b17fc20dbec87b15364.jpg', '2022-07-24 20:30:11', '2022-07-26 22:56:10'),
(15, 'tsasd', 'tsasd', 'asd', '<p>awe</p>', '4', 'default.jpg', '2022-07-27 02:17:50', '2022-07-27 02:17:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori_produk`);

--
-- Indexes for table `kategori_wisata`
--
ALTER TABLE `kategori_wisata`
  ADD PRIMARY KEY (`id_kategori_wisata`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_wisata`
--
ALTER TABLE `kategori_wisata`
  MODIFY `id_kategori_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
