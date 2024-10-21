-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:34:14
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ticaret`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `fileWhere` text NOT NULL,
  `fileName` text DEFAULT NULL,
  `fileExt` text DEFAULT NULL,
  `fileType` text DEFAULT NULL,
  `fileOriginalName` text NOT NULL,
  `fileUploadUrl` text NOT NULL,
  `sizeByte` text NOT NULL,
  `sizeTotal` text NOT NULL,
  `sizeTotalType` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_byId` int(11) DEFAULT NULL,
  `isUpdated` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_byId` int(11) DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `isDeleted` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_byId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `files`
--

INSERT INTO `files` (`id`, `serverId`, `serverToken`, `fileWhere`, `fileName`, `fileExt`, `fileType`, `fileOriginalName`, `fileUploadUrl`, `sizeByte`, `sizeTotal`, `sizeTotalType`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(110, 3, 'serverToken2', 'Sabit', '1681138075.jpg', 'jpg', 'image', '2.jpg', 'upload/uploads/1681138075.jpg', '670266', '654.56', 'kb', '2023-04-10 14:47:55', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(111, 3, 'serverToken2', 'Import', '1683541509.txt', 'xml', 'text', 'Cari Kart Listesi_1683541479196.xml', 'upload/uploads/1683541509.txt', '2432', '2.38', 'kb', '2023-05-08 10:25:09', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(112, 3, 'serverToken2', 'profileImage', '1684266568.jpg', 'jpg', 'image', '1.jpg', 'upload/uploads/1684266568.jpg', '1837042', '1.75', 'mb', '2023-05-16 19:49:28', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(113, 3, 'serverToken2', 'profileImage', '1684266780.jpg', 'jpg', 'image', 'women (2).jpg', 'upload/uploads/1684266780.jpg', '61882', '60.43', 'kb', '2023-05-16 19:53:01', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(114, 3, 'serverToken2', 'profileImage', '1684266826.jpg', 'jpg', 'image', 'man (8).jpg', 'upload/uploads/1684266826.jpg', '85490', '83.49', 'kb', '2023-05-16 19:53:46', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(115, 3, 'serverToken2', 'profileImage', '1684266844.jpg', 'jpg', 'image', 'women (2).jpg', 'upload/uploads/1684266844.jpg', '61882', '60.43', 'kb', '2023-05-16 19:54:04', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(116, 3, 'serverToken2', 'profileImage', '1684266872.jpg', 'jpg', 'image', 'women (2).jpg', 'upload/uploads/1684266872.jpg', '61882', '60.43', 'kb', '2023-05-16 19:54:32', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(117, 3, 'serverToken2', 'profileImage', '1684266927.jpg', 'jpg', 'image', 'man (8).jpg', 'upload/uploads/1684266927.jpg', '85490', '83.49', 'kb', '2023-05-16 19:55:27', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(118, 3, 'serverToken2', 'profileImage', '1684266958.jpg', 'jpg', 'image', 'women (2).jpg', 'upload/uploads/1684266958.jpg', '61882', '60.43', 'kb', '2023-05-16 19:55:58', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(119, 3, 'serverToken2', 'profileImage', '1684266983.jpg', 'jpg', 'image', 'women (2).jpg', 'upload/uploads/1684266983.jpg', '61882', '60.43', 'kb', '2023-05-16 19:56:23', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(120, 3, 'serverToken2', 'profileImage', '1684267260.jpg', 'jpg', 'image', 'man (7).jpg', 'upload/uploads/1684267260.jpg', '86756', '84.72', 'kb', '2023-05-16 20:01:00', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(121, 3, 'serverToken2', 'profileImage', '1684267341.jpg', 'jpg', 'image', 'women (2).jpg', 'upload/uploads/1684267341.jpg', '61882', '60.43', 'kb', '2023-05-16 20:02:21', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(122, 3, 'serverToken2', 'profileImage', '1684267397.jpg', 'jpg', 'image', 'women (2).jpg', 'upload/uploads/1684267397.jpg', '61882', '60.43', 'kb', '2023-05-16 20:03:17', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(123, 3, 'serverToken2', 'profileImage', '1684267485.jpg', 'jpg', 'image', 'women (2).jpg', 'upload/uploads/1684267485.jpg', '61882', '60.43', 'kb', '2023-05-16 20:04:45', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(124, 3, 'serverToken2', 'profileImage', '1684267509.jpg', 'jpg', 'image', 'women (2).jpg', 'upload/uploads/1684267509.jpg', '61882', '60.43', 'kb', '2023-05-16 20:05:09', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(125, 3, 'serverToken2', 'profileImage', '1684267565.jpg', 'jpg', 'image', 'women (2).jpg', 'upload/uploads/1684267565.jpg', '61882', '60.43', 'kb', '2023-05-16 20:06:05', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(126, 3, 'serverToken2', 'profileImage', '1684267723.jpg', 'jpg', 'image', 'women (2).jpg', 'upload/uploads/1684267723.jpg', '61882', '60.43', 'kb', '2023-05-16 20:08:43', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(127, 3, 'serverToken2', 'profileImage', '1684267758.jpg', 'jpg', 'image', 'women (2).jpg', 'upload/uploads/1684267758.jpg', '61882', '60.43', 'kb', '2023-05-16 20:09:18', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(128, 3, 'serverToken2', 'profileImage', '1684267867.jpg', 'jpg', 'image', 'women (3).jpg', 'upload/uploads/1684267867.jpg', '61268', '59.83', 'kb', '2023-05-16 20:11:07', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(129, 3, 'serverToken2', 'profileImage', '1684268080.jpg', 'jpg', 'image', 'women (2).jpg', 'upload/uploads/1684268080.jpg', '61882', '60.43', 'kb', '2023-05-16 20:14:40', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(130, 3, 'serverToken2', 'profileImage', '1684268134.jpg', 'jpg', 'image', 'women (3).jpg', 'upload/uploads/1684268134.jpg', '61268', '59.83', 'kb', '2023-05-16 20:15:34', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(131, 3, 'serverToken2', 'profileImage', '1684268156.jpg', 'jpg', 'image', 'man (6).jpg', 'upload/uploads/1684268156.jpg', '36090', '35.24', 'kb', '2023-05-16 20:15:56', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(132, 3, 'serverToken2', 'profileImage', '1684268244.jpg', 'jpg', 'image', 'women (2).jpg', 'upload/uploads/1684268244.jpg', '61882', '60.43', 'kb', '2023-05-16 20:17:24', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(133, 3, 'serverToken2', 'profileImage', '1684269693.jpg', 'jpg', 'image', 'women (3).jpg', 'upload/uploads/1684269693.jpg', '61268', '59.83', 'kb', '2023-05-16 20:41:34', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(134, 3, 'serverToken2', 'profileImage', '1684269708.jpg', 'jpg', 'image', 'women (2).jpg', 'upload/uploads/1684269708.jpg', '61882', '60.43', 'kb', '2023-05-16 20:41:48', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(135, 3, 'serverToken2', 'profileImage', '1684313863.pdf', 'pdf', 'application', 'ticaret_sicil_kaydi.pdf', 'upload/uploads/1684313863.pdf', '33699', '32.91', 'kb', '2023-05-17 08:57:43', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(136, 3, 'serverToken2', 'technical_specifications', '1684313919.pdf', 'pdf', 'application', 'vergi_levhasi.pdf', 'upload/uploads/1684313919.pdf', '32948', '32.18', 'kb', '2023-05-17 08:58:39', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(137, 3, 'serverToken2', 'technical_specifications', '1684314132.pdf', 'pdf', 'application', 'vergi_levhasi.pdf', 'upload/uploads/1684314132.pdf', '32948', '32.18', 'kb', '2023-05-17 09:02:12', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(138, 3, 'serverToken2', 'technical_specifications', '1684314234.pdf', 'pdf', 'application', 'vergi_levhasi.pdf', 'upload/uploads/1684314234.pdf', '32948', '32.18', 'kb', '2023-05-17 09:03:54', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(139, 3, 'serverToken2', 'technical_specifications', '1684314250.pdf', 'pdf', 'application', 'hizmet_sozlesmesi.pdf', 'upload/uploads/1684314250.pdf', '32760', '31.99', 'kb', '2023-05-17 09:04:10', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(140, 3, 'serverToken2', 'profileImage', '1684314376.jpg', 'jpg', 'image', '2.jpg', 'upload/uploads/1684314376.jpg', '843261', '823.5', 'kb', '2023-05-17 09:06:16', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(141, 3, 'serverToken2', 'technical_specifications', '1684314409.pdf', 'pdf', 'application', 'Dekont.pdf', 'upload/uploads/1684314409.pdf', '36140', '35.29', 'kb', '2023-05-17 09:06:49', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(142, 3, 'serverToken2', 'technical_specifications', '1684315134.pdf', 'pdf', 'application', 'Dekont.pdf', 'upload/uploads/1684315134.pdf', '36140', '35.29', 'kb', '2023-05-17 09:18:54', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(143, 3, 'serverToken2', 'technical_specifications', '1684315177.pdf', 'pdf', 'application', 'Dekont.pdf', 'upload/uploads/1684315177.pdf', '36140', '35.29', 'kb', '2023-05-17 09:19:37', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(144, 3, 'serverToken2', 'technical_specifications', '1684315189.pdf', 'pdf', 'application', 'fatura1.pdf', 'upload/uploads/1684315189.pdf', '30984', '30.26', 'kb', '2023-05-17 09:19:49', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(145, 3, 'serverToken2', 'technical_specifications', '1684316679.pdf', 'pdf', 'application', 'fatura1.pdf', 'upload/uploads/1684316679.pdf', '30984', '30.26', 'kb', '2023-05-17 09:44:39', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(146, 3, 'serverToken2', 'profileImage', '1684316860.jpg', 'jpeg', 'image', 'gokhan_cali.jpeg', 'upload/uploads/1684316860.jpg', '5023', '4.91', 'kb', '2023-05-17 09:47:40', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(147, 3, 'serverToken2', 'profileImage', '1684390735.jpg', 'jpg', 'image', 'ebuenesyildirim.jpg', 'upload/uploads/1684390735.jpg', '6714', '6.56', 'kb', '2023-05-18 06:18:55', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(148, 3, 'serverToken2', 'profileImage', '1684397510.jpg', 'jpeg', 'image', 'gokhan_cali.jpeg', 'upload/uploads/1684397510.jpg', '5023', '4.91', 'kb', '2023-05-18 08:11:50', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(149, 3, 'serverToken2', 'profileImage', '1684397528.jpg', 'jpg', 'image', 'ebuenesyildirim.jpg', 'upload/uploads/1684397528.jpg', '6714', '6.56', 'kb', '2023-05-18 08:12:08', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(150, 3, 'serverToken2', 'profileImage', '1684508538.jpg', 'jpg', 'image', 'fe79f637-425c-4751-8100-ee025d9632fb.jpg', 'upload/uploads/1684508538.jpg', '51407', '50.2', 'kb', '2023-05-19 15:02:18', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(151, 3, 'serverToken2', 'profileImage', '1684508551.jpg', 'jpg', 'image', 'WhatsApp-Image-2022-11-04-at-14.02.46-1.jpg', 'upload/uploads/1684508551.jpg', '220710', '215.54', 'kb', '2023-05-19 15:02:31', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(152, 3, 'serverToken2', 'Import', '1684510138.json', 'json', 'application', 'Cari Kart Listesi_1684510128344.json', 'upload/uploads/1684510138.json', '1968', '1.92', 'kb', '2023-05-19 15:28:58', 2, 0, NULL, NULL, 1, 0, NULL, NULL),
(153, 3, 'serverToken2', 'profileImage', '1684511209.jpg', 'jpg', 'image', 'ebuenesyildirim.jpg', 'upload/uploads/1684511209.jpg', '6714', '6.56', 'kb', '2023-05-19 15:46:50', 2, 0, NULL, NULL, 1, 0, NULL, NULL),
(154, 3, 'serverToken2', 'profileImage', '1684913912.jpg', 'jpg', 'image', '45030391.jpg', 'upload/uploads/1684913912.jpg', '5023', '4.91', 'kb', '2023-05-24 07:38:32', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(155, 3, 'serverToken2', 'profileImage', '1685531070.jpg', 'jpg', 'image', 'yuvarlak-5-1.jpg', 'upload/uploads/1685531070.jpg', '904439', '883.24', 'kb', '2023-05-31 11:04:31', 13, 0, NULL, NULL, 1, 0, NULL, NULL),
(156, 3, 'serverToken2', 'profileImage', '1685779684.jpg', 'jpg', 'image', '45030391.jpg', 'upload/uploads/1685779684.jpg', '5023', '4.91', 'kb', '2023-06-03 08:08:04', 14, 0, NULL, NULL, 1, 0, NULL, NULL),
(157, 3, 'serverToken2', 'productImage', '1685780786.webp', 'webp', 'image', 'incir.webp', 'upload/uploads/1685780786.webp', '158118', '154.41', 'kb', '2023-06-03 08:26:29', 14, 0, NULL, NULL, 1, 0, NULL, NULL),
(158, 3, 'serverToken2', 'productImage', '1685780790.webp', 'webp', 'image', 'incir.webp', 'upload/uploads/1685780790.webp', '158118', '154.41', 'kb', '2023-06-03 08:26:30', 14, 0, NULL, NULL, 1, 0, NULL, NULL),
(159, 3, 'serverToken2', 'profileImage', '1685952029.jpg', 'jpg', 'image', '3.jpg', 'upload/uploads/1685952029.jpg', '1911062', '1.82', 'mb', '2023-06-05 08:00:29', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(160, 3, 'serverToken2', 'productImage', '1686034444.webp', 'webp', 'image', 'shopping.webp', 'upload/uploads/1686034444.webp', '11488', '11.22', 'kb', '2023-06-06 06:54:08', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(161, 3, 'serverToken2', 'productImage', '1686072334.webp', 'webp', 'image', 'shopping.webp', 'upload/uploads/1686072334.webp', '11488', '11.22', 'kb', '2023-06-06 17:25:34', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(162, 3, 'serverToken2', 'productImage', '1686072361.webp', 'webp', 'image', '1_org_zoom.webp', 'upload/uploads/1686072361.webp', '52798', '51.56', 'kb', '2023-06-06 17:26:01', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(163, 3, 'serverToken2', 'profileImage', '1686203741.jpg', 'jpg', 'image', '45030391.jpg', 'upload/uploads/1686203741.jpg', '5023', '4.91', 'kb', '2023-06-08 05:55:41', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(164, 3, 'serverToken2', 'profileImage', '1686572549.jpg', 'jpeg', 'image', 'gokhan_cali.jpeg', 'upload/uploads/1686572549.jpg', '5023', '4.91', 'kb', '2023-06-12 12:22:30', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(165, 3, 'serverToken2', 'profileImage', '1686594732.jpg', 'jpg', 'image', '45030391.jpg', 'upload/uploads/1686594732.jpg', '5023', '4.91', 'kb', '2023-06-12 18:32:12', 14, 0, NULL, NULL, 1, 0, NULL, NULL),
(166, 3, 'serverToken2', 'profileImage', '1686594850.jpg', 'jpg', 'image', '45030391.jpg', 'upload/uploads/1686594850.jpg', '5023', '4.91', 'kb', '2023-06-12 18:34:10', 14, 0, NULL, NULL, 1, 0, NULL, NULL),
(167, 3, 'serverToken2', 'productImage', '1686595116.jpg', 'jpg', 'image', 'e3477e59a5025828c6f6064f341f8929_1.jpg', 'upload/uploads/1686595116.jpg', '72159', '70.47', 'kb', '2023-06-12 18:38:36', 14, 0, NULL, NULL, 1, 0, NULL, NULL),
(168, 3, 'serverToken2', 'getOffers_ProductImage', '1686598112.jpg', 'jpg', 'image', 'ado-7750-mat-lake-beyaz-kompozit-ic-kapi-us139.jpg', 'upload/uploads/1686598112.jpg', '9245', '9.03', 'kb', '2023-06-12 19:28:32', 14, 0, NULL, NULL, 1, 0, NULL, NULL),
(169, 3, 'serverToken2', 'productImage', '1686643134.jpg', 'jpg', 'image', '2.jpg', 'upload/uploads/1686643134.jpg', '45276', '44.21', 'kb', '2023-06-13 07:58:54', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(170, 3, 'serverToken2', 'profileImage', '1686830126.jpg', 'jpg', 'image', '45030391.jpg', 'upload/uploads/1686830126.jpg', '5023', '4.91', 'kb', '2023-06-15 11:55:27', 14, 0, NULL, NULL, 1, 0, NULL, NULL),
(171, 3, 'serverToken2', 'productImage', '1686830345.webp', 'webp', 'image', 'berico-flexgranit-yapistirici-gri-25-k-e7454-.webp', 'upload/uploads/1686830345.webp', '23892', '23.33', 'kb', '2023-06-15 11:59:08', 14, 0, NULL, NULL, 1, 0, NULL, NULL),
(172, 3, 'serverToken2', 'productImage', '1687090349.jpg', 'jpg', 'image', '1.jpg', 'upload/uploads/1687090349.jpg', '110381', '107.79', 'kb', '2023-06-18 12:12:29', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(173, 3, 'serverToken2', 'Sabit', '1687094746.jpg', 'jpg', 'image', '1.jpg', 'upload/uploads/1687094746.jpg', '110381', '107.79', 'kb', '2023-06-18 13:25:46', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(174, 3, 'serverToken2', 'productImage', '1687094816.jpg', 'jpg', 'image', '1.jpg', 'upload/uploads/1687094816.jpg', '110381', '107.79', 'kb', '2023-06-18 13:26:56', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(175, 3, 'serverToken2', 'productImage', '1687095940.jpg', 'jpg', 'image', '3.jpg', 'upload/uploads/1687095940.jpg', '119607', '116.8', 'kb', '2023-06-18 13:45:40', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(176, 3, 'serverToken2', 'productImage', '1687095956.jpg', 'jpg', 'image', '3.jpg', 'upload/uploads/1687095956.jpg', '119607', '116.8', 'kb', '2023-06-18 13:45:56', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(177, 3, 'serverToken2', 'productImage', '1687096031.jpg', 'jpg', 'image', '4.jpg', 'upload/uploads/1687096031.jpg', '97108', '94.83', 'kb', '2023-06-18 13:47:11', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(178, 3, 'serverToken2', 'productImage', '1687096048.jpg', 'jpg', 'image', '4.jpg', 'upload/uploads/1687096048.jpg', '97108', '94.83', 'kb', '2023-06-18 13:47:28', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(179, 3, 'serverToken2', 'productImage', '1687096132.jpg', 'jpg', 'image', '3.jpg', 'upload/uploads/1687096132.jpg', '119607', '116.8', 'kb', '2023-06-18 13:48:52', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(180, 3, 'serverToken2', 'technicalFile', '1687096137.jpg', 'jpg', 'image', '3.jpg', 'upload/uploads/1687096137.jpg', '119607', '116.8', 'kb', '2023-06-18 13:48:57', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(181, 3, 'serverToken2', 'productImage', '1687097414.jpg', 'jpg', 'image', '3.jpg', 'upload/uploads/1687097414.jpg', '119607', '116.8', 'kb', '2023-06-18 14:10:14', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(182, 3, 'serverToken2', 'technicalFile', '1687097420.jpg', 'jpg', 'image', '3.jpg', 'upload/uploads/1687097420.jpg', '119607', '116.8', 'kb', '2023-06-18 14:10:20', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(183, 3, 'serverToken2', 'productImage', '1687097970.jpg', 'jpg', 'image', '6.jpg', 'upload/uploads/1687097970.jpg', '89383', '87.29', 'kb', '2023-06-18 14:19:30', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(184, 3, 'serverToken2', 'technicalFile', '1687097975.jpg', 'jpg', 'image', '6.jpg', 'upload/uploads/1687097975.jpg', '89383', '87.29', 'kb', '2023-06-18 14:19:35', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(185, 3, 'serverToken2', 'productImage', '1687113750.jpg', 'jpg', 'image', '5.jpg', 'upload/uploads/1687113750.jpg', '98626', '96.31', 'kb', '2023-06-18 18:42:30', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(186, 3, 'serverToken2', 'technicalFile', '1687113758.jpg', 'jpg', 'image', '5.jpg', 'upload/uploads/1687113758.jpg', '98626', '96.31', 'kb', '2023-06-18 18:42:38', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(187, 3, 'serverToken2', 'productImage', '1687115009.jpg', 'jpg', 'image', '6.jpg', 'upload/uploads/1687115009.jpg', '89383', '87.29', 'kb', '2023-06-18 19:03:29', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(188, 3, 'serverToken2', 'technicalFile', '1687115468.jpg', 'jpg', 'image', '10.jpg', 'upload/uploads/1687115468.jpg', '4287590', '4.09', 'mb', '2023-06-18 19:11:08', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(189, 3, 'serverToken2', 'technicalFile', '1687115494.jpg', 'jpg', 'image', '8.jpg', 'upload/uploads/1687115494.jpg', '137184', '133.97', 'kb', '2023-06-18 19:11:34', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(190, 3, 'serverToken2', 'productImage', '1687115500.jpg', 'jpg', 'image', '18.jpg', 'upload/uploads/1687115500.jpg', '6069959', '5.79', 'mb', '2023-06-18 19:11:40', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(191, 3, 'serverToken2', 'productImage', '1687115509.jpg', 'jpg', 'image', '16.jpg', 'upload/uploads/1687115509.jpg', '4259845', '4.06', 'mb', '2023-06-18 19:11:49', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(192, 3, 'serverToken2', 'technicalFile', '1687115513.jpg', 'jpg', 'image', '7.jpg', 'upload/uploads/1687115513.jpg', '106651', '104.15', 'kb', '2023-06-18 19:11:53', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(193, 3, 'serverToken2', 'technicalFile', '1687115560.jpg', 'jpg', 'image', '4.jpg', 'upload/uploads/1687115560.jpg', '97108', '94.83', 'kb', '2023-06-18 19:12:41', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(194, 3, 'serverToken2', 'technicalFile', '1687115574.jpg', 'jpg', 'image', '3.jpg', 'upload/uploads/1687115574.jpg', '119607', '116.8', 'kb', '2023-06-18 19:12:54', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(195, 3, 'serverToken2', 'productImage', '1687115613.jpg', 'jpg', 'image', '16.jpg', 'upload/uploads/1687115613.jpg', '4259845', '4.06', 'mb', '2023-06-18 19:13:33', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(196, 3, 'serverToken2', 'technicalFile', '1687115646.jpg', 'jpg', 'image', '9.jpg', 'upload/uploads/1687115646.jpg', '115533', '112.83', 'kb', '2023-06-18 19:14:06', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(197, 3, 'serverToken2', 'productImage', '1687115742.jpg', 'jpg', 'image', '6.jpg', 'upload/uploads/1687115742.jpg', '89383', '87.29', 'kb', '2023-06-18 19:15:42', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(198, 3, 'serverToken2', 'technicalFile', '1687115748.jpg', 'jpg', 'image', '7.jpg', 'upload/uploads/1687115748.jpg', '106651', '104.15', 'kb', '2023-06-18 19:15:48', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(199, 3, 'serverToken2', 'productImage', '1687116188.jpg', 'jpg', 'image', '7.jpg', 'upload/uploads/1687116188.jpg', '106651', '104.15', 'kb', '2023-06-18 19:23:08', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(200, 3, 'serverToken2', 'technicalFile', '1687116194.jpg', 'jpg', 'image', '10.jpg', 'upload/uploads/1687116194.jpg', '4287590', '4.09', 'mb', '2023-06-18 19:23:14', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(201, 3, 'serverToken2', 'productImage', '1687119269.jpg', 'jpg', 'image', '19.jpg', 'upload/uploads/1687119269.jpg', '112366', '109.73', 'kb', '2023-06-18 20:14:29', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(202, 3, 'serverToken2', 'productImage', '1687119371.jpg', 'jpg', 'image', '7.jpg', 'upload/uploads/1687119371.jpg', '106651', '104.15', 'kb', '2023-06-18 20:16:11', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(203, 3, 'serverToken2', 'productImage', '1687420150.jpg', 'jpg', 'image', '0.jpg', 'upload/uploads/1687420150.jpg', '1064258', '1.01', 'mb', '2023-06-22 07:49:10', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(204, 3, 'serverToken2', 'technicalFile', '1687420162.jpg', 'jpg', 'image', '1.jpg', 'upload/uploads/1687420162.jpg', '1159558', '1.11', 'mb', '2023-06-22 07:49:22', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(205, 3, 'serverToken2', 'profileImage', '1688380605.jpg', 'jpg', 'image', '1.jpg', 'upload/uploads/1688380605.jpg', '1159558', '1.11', 'mb', '2023-07-03 10:36:45', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(206, 3, 'serverToken2', 'profileImage', '1688736783.jpg', 'jpg', 'image', '3.jpg', 'upload/uploads/1688736783.jpg', '85109', '83.11', 'kb', '2023-07-07 13:33:03', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(207, 3, 'serverToken2', 'profileImage', '1729333728.jpg', 'jpg', 'image', 'kucuk3.jpg', 'upload/uploads/1729333728.jpg', '119607', '116.8', 'kb', '2024-10-19 10:28:48', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(208, 3, 'serverToken2', 'profileImage', '1729374135.jpg', 'jpg', 'image', 'buyuk16.jpg', 'upload/uploads/1729374135.jpg', '4259845', '4.06', 'mb', '2024-10-19 21:42:15', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(209, 3, 'serverToken2', 'profileImage', '1729374305.jpg', 'jpg', 'image', 'buyuk12.jpg', 'upload/uploads/1729374305.jpg', '3091378', '2.95', 'mb', '2024-10-19 21:45:06', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(210, 3, 'serverToken2', 'profileImage', '1729374377.jpg', 'jpg', 'image', 'kucuk1.jpg', 'upload/uploads/1729374377.jpg', '110381', '107.79', 'kb', '2024-10-19 21:46:17', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(211, 3, 'serverToken2', 'productImage', '1729379493.jpg', 'jpg', 'image', 'buyuk16.jpg', 'upload/uploads/1729379493.jpg', '4259845', '4.06', 'mb', '2024-10-19 23:11:33', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(212, 3, 'serverToken2', 'productImage', '1729379947.jpg', 'jpg', 'image', 'kucuk1.jpg', 'upload/uploads/1729379947.jpg', '110381', '107.79', 'kb', '2024-10-19 23:19:07', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(213, 3, 'serverToken2', 'technicalFile', '1729380098.jpg', 'jpg', 'image', 'kucuk4.jpg', 'upload/uploads/1729380098.jpg', '97108', '94.83', 'kb', '2024-10-19 23:21:38', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(214, 3, 'serverToken2', 'technicalFile', '1729380145.pdf', 'pdf', 'application', 'Nakliye-Portalı.pdf', 'upload/uploads/1729380145.pdf', '19564297', '18.66', 'mb', '2024-10-19 23:22:25', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(215, 3, 'serverToken2', 'productImage', '1729408878.jpg', 'jpg', 'image', 'kucuk5.jpg', 'upload/uploads/1729408878.jpg', '98626', '96.31', 'kb', '2024-10-20 07:21:18', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(216, 3, 'serverToken2', 'technicalFile', '1729408895.jpg', 'jpg', 'image', 'kucuk1.jpg', 'upload/uploads/1729408895.jpg', '110381', '107.79', 'kb', '2024-10-20 07:21:35', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(217, 3, 'serverToken2', 'productImage', '1729409957.jpg', 'jpg', 'image', 'kucuk3.jpg', 'upload/uploads/1729409957.jpg', '119607', '116.8', 'kb', '2024-10-20 07:39:17', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(218, 3, 'serverToken2', 'technicalFile', '1729410009.pdf', 'pdf', 'application', '1729380145.pdf', 'upload/uploads/1729410009.pdf', '19564297', '18.66', 'mb', '2024-10-20 07:40:09', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(219, 3, 'serverToken2', 'productImage', '1729410961.jpg', 'jpeg', 'image', 'urun_resim_104 (1).jpeg', 'upload/uploads/1729410961.jpg', '119607', '116.8', 'kb', '2024-10-20 07:56:01', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(220, 3, 'serverToken2', 'technicalFile', '1729410981.pdf', 'pdf', 'application', '1729380145.pdf', 'upload/uploads/1729410981.pdf', '19564297', '18.66', 'mb', '2024-10-20 07:56:21', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(221, 3, 'serverToken2', 'profileImage', '1729421636.jpg', 'jpeg', 'image', 'urun_resim_104.jpeg', 'upload/uploads/1729421636.jpg', '119607', '116.8', 'kb', '2024-10-20 10:53:56', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(222, 3, 'serverToken2', 'productImage', '1729463606.jpg', 'jpg', 'image', 'IMG_20210403_223426_813.jpg', 'upload/uploads/1729463606.jpg', '97089', '94.81', 'kb', '2024-10-20 22:33:27', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(223, 3, 'serverToken2', 'technicalFile', '1729463622.jpg', 'jpg', 'image', 'IMG_20220304_135652_967.jpg', 'upload/uploads/1729463622.jpg', '432288', '422.16', 'kb', '2024-10-20 22:33:42', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(224, 3, 'serverToken2', 'productImage', '1729463835.jpg', 'jpg', 'image', 'IMG-20221018-WA0003.jpg', 'upload/uploads/1729463835.jpg', '280682', '274.1', 'kb', '2024-10-20 22:37:16', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(225, 3, 'serverToken2', 'technicalFile', '1729463842.jpg', 'jpg', 'image', 'IMG_20220122_114151.jpg', 'upload/uploads/1729463842.jpg', '705448', '688.91', 'kb', '2024-10-20 22:37:22', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(226, 3, 'serverToken2', 'technicalFile', '1729464041.jpg', 'jpg', 'image', 'IMG_20220304_135652_967.jpg', 'upload/uploads/1729464041.jpg', '432288', '422.16', 'kb', '2024-10-20 22:40:41', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(227, 3, 'serverToken2', 'productImage', '1729464091.jpg', 'jpg', 'image', 'IMG_20220304_135652_967.jpg', 'upload/uploads/1729464091.jpg', '432288', '422.16', 'kb', '2024-10-20 22:41:31', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(228, 3, 'serverToken2', 'technicalFile', '1729464097.jpg', 'jpg', 'image', 'IMG_20210403_223426_813.jpg', 'upload/uploads/1729464097.jpg', '97089', '94.81', 'kb', '2024-10-20 22:41:37', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(229, 3, 'serverToken2', 'productImage', '1729465388.jpg', 'jpg', 'image', 'IMG_20220317_170423.jpg', 'upload/uploads/1729465388.jpg', '70772', '69.11', 'kb', '2024-10-20 23:03:08', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(230, 3, 'serverToken2', 'technicalFile', '1729465395.jpg', 'jpg', 'image', 'IMG-20221018-WA0003.jpg', 'upload/uploads/1729465395.jpg', '280682', '274.1', 'kb', '2024-10-20 23:03:15', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(231, 3, 'serverToken2', 'technicalFile', '1729465456.jpg', 'jpg', 'image', 'IMG_20220310_194525.jpg', 'upload/uploads/1729465456.jpg', '500931', '489.19', 'kb', '2024-10-20 23:04:16', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(232, 3, 'serverToken2', 'productImage', '1729473879.jpg', 'jpg', 'image', 'IMG_20220317_170423.jpg', 'upload/uploads/1729473879.jpg', '70772', '69.11', 'kb', '2024-10-21 01:24:39', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(233, 3, 'serverToken2', 'technicalFile', '1729473890.jpg', 'jpg', 'image', 'IMG_20220723_202003_129.jpg', 'upload/uploads/1729473890.jpg', '205692', '200.87', 'kb', '2024-10-21 01:24:50', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(234, 3, 'serverToken2', 'technicalFile', '1729473909.pdf', 'pdf', 'application', 'Nakliye-Portalı.pdf', 'upload/uploads/1729473909.pdf', '19564297', '18.66', 'mb', '2024-10-21 01:25:09', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(235, 3, 'serverToken2', 'technicalFile', '1729474077.pdf', 'pdf', 'application', 'Nakliye-Portalı.pdf', 'upload/uploads/1729474077.pdf', '19564297', '18.66', 'mb', '2024-10-21 01:27:57', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(236, 3, 'serverToken2', 'productImage', '1729474086.jpg', 'jpg', 'image', 'kucuk1.jpg', 'upload/uploads/1729474086.jpg', '110381', '107.79', 'kb', '2024-10-21 01:28:06', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(237, 3, 'serverToken2', 'productImage', '1729474228.jpg', 'jpg', 'image', 'buyuk16.jpg', 'upload/uploads/1729474228.jpg', '4259845', '4.06', 'mb', '2024-10-21 01:30:28', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(238, 3, 'serverToken2', 'technicalFile', '1729474249.jpg', 'jpg', 'image', 'buyuk12.jpg', 'upload/uploads/1729474249.jpg', '3091378', '2.95', 'mb', '2024-10-21 01:30:49', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(239, 3, 'serverToken2', 'productImage', '1729474474.jpg', 'jpg', 'image', 'buyuk16.jpg', 'upload/uploads/1729474474.jpg', '4259845', '4.06', 'mb', '2024-10-21 01:34:34', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(240, 3, 'serverToken2', 'technicalFile', '1729474481.jpg', 'jpg', 'image', 'kucuk5.jpg', 'upload/uploads/1729474481.jpg', '98626', '96.31', 'kb', '2024-10-21 01:34:41', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(241, 3, 'serverToken2', 'productImage', '1729477561.jpg', 'jpg', 'image', 'buyuk16.jpg', 'upload/uploads/1729477561.jpg', '4259845', '4.06', 'mb', '2024-10-21 02:26:01', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(242, 3, 'serverToken2', 'technicalFile', '1729477571.jpg', 'jpg', 'image', 'buyuk10.jpg', 'upload/uploads/1729477571.jpg', '4287590', '4.09', 'mb', '2024-10-21 02:26:11', 0, 0, NULL, NULL, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
