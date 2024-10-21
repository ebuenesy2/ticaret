-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:33:30
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
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `title_EN` text DEFAULT NULL,
  `codeLet` text DEFAULT NULL,
  `codeNumber` text DEFAULT NULL,
  `token` text DEFAULT NULL,
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
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `serverId`, `serverToken`, `type`, `title`, `title_EN`, `codeLet`, `codeNumber`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(37, 3, 'serverToken2', 'SektorCari', 'Ahşap Teknolojisi', 'Wood Technology', 'AHP', '1', NULL, '2023-06-06 06:25:34', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(38, 3, 'serverToken2', 'SektorCari', 'Cam, Çimento ve Toprak Çevre', 'Glass, Cement and Soil Environment', 'CAM', '2', NULL, '2023-06-06 06:25:52', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(39, 3, 'serverToken2', 'SektorCari', 'Eğitim', 'Education', 'EGT', '3', NULL, '2023-06-06 06:26:04', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(40, 3, 'serverToken2', 'SektorCari', 'Elektrik ve Elektronik', 'Electricity and Electronics', 'ELK', '4', NULL, '2023-06-06 06:26:13', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(41, 3, 'serverToken2', 'SektorCari', 'Enerji', 'Energy', 'EN', '5', NULL, '2023-06-06 06:26:26', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(42, 3, 'serverToken2', 'SektorCari', 'Finans', 'Finance', 'FN', '6', NULL, '2023-06-06 06:26:34', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(43, 3, 'serverToken2', 'SektorCari', 'Gıda', 'Food', 'G', '7', NULL, '2023-06-06 06:26:44', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(44, 3, 'serverToken2', 'SektorCari', 'İnşaat', 'Construction', 'IN', '8', NULL, '2023-06-06 06:26:54', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(45, 3, 'serverToken2', 'SektorCari', 'İş ve Yönetim', 'Business and Management', 'IS', '9', NULL, '2023-06-06 06:27:04', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(46, 3, 'serverToken2', 'SektorCari', 'Kimya, Petrol, Lastik ve Plastik', 'Chemicals, Petroleum, Rubber and Plastics', 'KIM', '10', NULL, '2023-06-06 06:27:13', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(47, 3, 'serverToken2', 'SektorCari', 'Kültür, Sanat ve Tasarım', 'Culture, Art and Design', 'KUL', '11', NULL, '2023-06-06 06:27:25', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(48, 3, 'serverToken2', 'SektorCari', 'Maden', 'Mine', 'MAD', '12', NULL, '2023-06-06 06:27:34', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(49, 3, 'serverToken2', 'SektorCari', 'Medya, İletişim ve Yayıncılık', 'Media, Communication and Publishing', 'MED', '13', NULL, '2023-06-06 06:27:44', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(50, 3, 'serverToken2', 'SektorCari', 'Metal', 'Metal', 'MET', '14', NULL, '2023-06-06 06:27:53', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(51, 3, 'serverToken2', 'SektorCari', 'Otomotiv', 'Automotive', 'OT', '15', NULL, '2023-06-06 06:28:01', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(52, 3, 'serverToken2', 'SektorCari', 'Sağlık ve Sosyal Hizmetler', 'Health and Social Services', 'HE', '16', NULL, '2023-06-06 06:28:11', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(53, 3, 'serverToken2', 'SektorCari', 'Spor ve Rekreasyon', 'Sport and Recreation', 'SP', '17', NULL, '2023-06-06 06:28:20', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(54, 3, 'serverToken2', 'SektorCari', 'Tarım, Avcılık ve Balıkçılık', 'Agriculture, Hunting and Fishing', 'TAR', '18', NULL, '2023-06-06 06:28:30', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(55, 3, 'serverToken2', 'SektorCari', 'Tekstil, Hazır Giyim, Deri', 'Textile, Apparel, Leather', 'TEK', '19', NULL, '2023-06-06 06:28:41', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(56, 3, 'serverToken2', 'SektorCari', 'Ticaret (Satış ve Pazarlama)', 'Trade (Sales and Marketing)', 'TİC', '20', NULL, '2023-06-06 06:28:51', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(57, 3, 'serverToken2', 'SektorCari', 'Toplumsal ve Kişisel Hizmetler', 'Community and Personal Services', 'TOP', '21', NULL, '2023-06-06 06:29:10', 1, 1, '2023-06-06 06:50:34', 1, 1, 0, NULL, NULL),
(58, 3, 'serverToken2', 'SektorCari', 'Turizm, Konaklama, Yiyecek-İçecek Hizmetleri', 'Tourism, Accommodation, Food and Beverage Services', 'TUR', '22', NULL, '2023-06-06 06:29:20', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(59, 3, 'serverToken2', 'SektorCari', 'Ulaştırma, Lojistik ve Haberleşme', 'Transportation, Logistics and Communication', 'UL', '23', NULL, '2023-06-06 06:29:30', 1, 1, '2023-06-22 13:37:59', 1, 1, 0, NULL, NULL),
(60, 3, 'serverToken2', 'SektorStok', 'Ahşap', 'Wood', 'Ahp', '1', NULL, '2023-06-06 06:42:48', 1, 1, '2023-07-05 11:00:11', 1, 1, 0, NULL, NULL),
(61, 3, 'serverToken2', 'SektorStok', 'Cam', 'Glass', 'CM', '2', NULL, '2023-06-06 06:46:21', 1, 1, '2024-10-19 13:25:34', 1, 1, 0, NULL, NULL),
(62, 3, 'serverToken2', 'SektorStok', 'Yapı Kimyasalı', 'Building Chemicals', 'YP', '3', NULL, '2023-06-06 06:46:33', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(63, 3, 'serverToken2', 'SektorStok', 'Çimento', 'Cement', 'Ç', '4', NULL, '2023-06-06 06:46:42', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(64, 3, 'serverToken2', 'SektorStok', 'Eğitim', 'Education', 'E', '5', NULL, '2023-06-06 06:46:51', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(65, 3, 'serverToken2', 'SektorStok', 'Elektrik', 'Electricity', 'EL', '6', NULL, '2023-06-06 06:47:00', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(66, 3, 'serverToken2', 'SektorStok', 'Elektronik', 'Electronics', 'ELK', '7', NULL, '2023-06-06 06:47:10', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(67, 3, 'serverToken2', 'SektorStok', 'Enerji', 'Energy', 'EN', '8', NULL, '2023-06-06 06:47:21', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(68, 3, 'serverToken2', 'SektorStok', 'Gıda', 'Food', 'GD', '9', NULL, '2023-06-06 06:47:36', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(69, 3, 'serverToken2', 'SektorStok', 'İnşaat', 'Construction', 'IN', '10', NULL, '2023-06-06 06:47:48', 1, 1, '2023-07-05 12:17:15', 1, 1, 0, NULL, NULL),
(70, 3, 'serverToken2', 'SektorStok', 'Petrol Ürünleri', 'Petroleum Products', 'PE', '11', NULL, '2023-06-06 06:47:58', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(71, 3, 'serverToken2', 'SektorStok', 'Plastik', 'Plastic', 'PL', '12', NULL, '2023-06-06 06:48:10', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(72, 3, 'serverToken2', 'SektorStok', 'Maden', 'Mine', 'MD', '13', NULL, '2023-06-06 06:48:18', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(73, 3, 'serverToken2', 'SektorStok', 'Metal', 'Metal', 'ME', '14', NULL, '2023-06-06 06:48:27', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(74, 3, 'serverToken2', 'SektorStok', 'Otomotiv', 'Automotive', 'OT', '15', NULL, '2023-06-06 06:48:45', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(75, 3, 'serverToken2', 'SektorStok', 'Sağlık Ürünleri', 'Health Products', 'SA', '16', NULL, '2023-06-06 06:48:54', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(76, 3, 'serverToken2', 'SektorStok', 'Çevre Ürünleri', 'Environmental Products', 'CE', '17', NULL, '2023-06-06 06:49:02', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(77, 3, 'serverToken2', 'SektorStok', 'Tarım ve Hayvancılık Ürünleri', 'Agriculture and Livestock Products', 'TA', '18', NULL, '2023-06-06 06:49:12', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(78, 3, 'serverToken2', 'SektorStok', 'Tekstil Ürünler', 'Textile Products', 'TEK', '19', NULL, '2023-06-06 06:49:20', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(79, 3, 'serverToken2', 'SektorStok', 'Hijyen Ürünleri', 'Hygiene Products', 'HIJ', '20', NULL, '2023-06-06 06:49:33', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(80, 3, 'serverToken2', 'SektorStok', 'Yiyecek-İçecek Ürünleri', 'Food and Beverage Products', 'YI', '21', NULL, '2023-06-06 06:49:44', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(81, 3, 'serverToken2', 'İntertekTabiMi', 'Evet', 'Yes', NULL, NULL, NULL, '2023-06-06 07:19:04', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(82, 3, 'serverToken2', 'İntertekTabiMi', 'Hayır', 'No', NULL, NULL, NULL, '2023-06-06 07:19:18', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(83, 3, 'serverToken2', 'ÖzelİzneTabiMi', 'Evet', 'Yes', NULL, NULL, NULL, '2023-06-06 07:19:41', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(84, 3, 'serverToken2', 'ÖzelİzneTabiMi', 'Hayır', 'No', NULL, NULL, NULL, '2023-06-06 07:19:57', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(90, 3, 'serverToken2', 'TeslimŞekli', 'FCA -  Belirlenen Yerde Taşımacıya Teslim', 'FCA - Free Carrier', NULL, NULL, NULL, '2023-06-06 07:29:28', 1, 1, '2023-06-06 07:33:40', 1, 1, 0, NULL, NULL),
(91, 3, 'serverToken2', 'TeslimŞekli', 'EXW - Ticari işletmede Teslim', 'EXW -  Delivery in commercial enterprise', NULL, NULL, NULL, '2023-06-06 07:30:07', 1, 1, '2023-06-06 07:34:01', 1, 1, 0, NULL, NULL),
(92, 3, 'serverToken2', 'TeslimŞekli', 'FAS - Gemi Doğrultusunda Teslim', 'FAS -  Free Alongside Ship', NULL, NULL, NULL, '2023-06-06 07:30:27', 1, 1, '2023-06-06 07:34:20', 1, 1, 0, NULL, NULL),
(93, 3, 'serverToken2', 'TeslimŞekli', 'FOB - Gemi Bordasında Teslim', 'FOB - Shipboard Delivery', NULL, NULL, NULL, '2023-06-06 07:30:52', 1, 1, '2023-06-06 07:34:40', 1, 1, 0, NULL, NULL),
(94, 3, 'serverToken2', 'TeslimŞekli', 'CFR - Mal bedeli ve taşıma', 'CFR - Cost of goods and transportation', NULL, NULL, NULL, '2023-06-06 07:31:38', 1, 1, '2023-06-06 07:35:01', 1, 1, 0, NULL, NULL),
(95, 3, 'serverToken2', 'TeslimŞekli', 'DAP - Yerinde Teslim', 'DAP - Delivered at Place', NULL, NULL, NULL, '2023-06-06 07:32:53', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(96, 3, 'serverToken2', 'NakliyetŞekli', 'Denizyolu', 'Seaway', NULL, NULL, NULL, '2023-06-06 07:45:38', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(97, 3, 'serverToken2', 'NakliyetŞekli', 'Karayolu', 'Highway', NULL, NULL, NULL, '2023-06-06 07:46:24', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(98, 3, 'serverToken2', 'NakliyetŞekli', 'Havayolu', 'Airline', NULL, NULL, NULL, '2023-06-06 07:46:50', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(99, 3, 'serverToken2', 'NakliyetŞekli', 'Demiryolu', 'Railway', NULL, NULL, NULL, '2023-06-06 07:47:06', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(100, 3, 'serverToken2', 'ÖdemeŞekli', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', 'Down Payment (50% Together in Order - 50% Before Shipment)', NULL, NULL, NULL, '2023-06-06 07:47:28', 1, 1, '2023-06-16 12:14:28', 1, 1, 0, NULL, NULL),
(105, 3, 'serverToken2', 'TeslimŞekli', 'DDP - GÜMRÜK VERGİLERİ ÖDENMİŞ ALICI ADRESE TESLİM', 'DDP - DELIVERED DUTY PAID', NULL, NULL, NULL, '2023-06-09 13:50:39', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(115, 3, 'serverToken2', 'SevkŞekli', 'Konteyner', 'Container', NULL, NULL, NULL, '2023-06-16 11:33:03', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(116, 3, 'serverToken2', 'SevkŞekli', 'Palet', 'Palette', NULL, NULL, NULL, '2023-06-16 11:33:21', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(117, 3, 'serverToken2', 'SevkŞekli', 'Paket', 'Package', NULL, NULL, NULL, '2023-06-16 11:33:41', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(118, 3, 'serverToken2', 'SevkŞekli', 'Parsiyel', 'Partial', NULL, NULL, NULL, '2023-06-16 11:34:13', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(119, 3, 'serverToken2', 'SevkŞekli', 'Tır', 'Truck', 'tr', '123', NULL, '2023-06-16 11:34:33', 1, 1, '2023-06-18 19:19:27', 1, 1, 0, NULL, NULL),
(124, 3, 'serverToken2', 'SevkŞekli', 'Hijyen Ürünleri', 'Hijyen Ürünleri EN', 'Ah', '1', NULL, '2024-10-19 13:26:25', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(125, 3, 'serverToken2', 'SevkŞekli', 'Deneme', 'Hijyen Ürünleri N', 'Ahp', '13', NULL, '2024-10-19 13:27:23', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(127, 3, 'serverToken2', 'SektorStok', 'Deneme', 'Deneme x', 'DNM', '22', NULL, '2024-10-19 14:04:06', 1, 1, '2024-10-19 15:30:52', 1, 1, 0, NULL, NULL),
(129, 3, 'serverToken2', 'SektorCari', 'Cari', 'Cari En', 'cv', '69', NULL, '2024-10-20 09:00:30', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(130, 3, 'serverToken2', 'SektorStok', 'Cari', 'Cari En', 'CR', '01', NULL, '2024-10-20 23:22:12', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
