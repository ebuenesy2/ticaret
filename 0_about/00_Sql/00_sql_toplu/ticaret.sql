-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 11 Tem 2023, 20:54:32
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
-- Tablo için tablo yapısı `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `currencyCartId` int(11) DEFAULT NULL,
  `bankaAccountTitle` text DEFAULT NULL,
  `bankTitle` text DEFAULT NULL,
  `branch` text DEFAULT NULL,
  `accountNumber` text DEFAULT NULL,
  `iban` text DEFAULT NULL,
  `swift` text DEFAULT NULL,
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
-- Tablo döküm verisi `bank`
--

INSERT INTO `bank` (`id`, `serverId`, `serverToken`, `currencyCartId`, `bankaAccountTitle`, `bankTitle`, `branch`, `accountNumber`, `iban`, `swift`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(14, 3, 'serverToken2', 11, 'Banka Hesap Adı xx', 'TEB Bankası', 'Merkez', '3456 67543434 34', 'TR22 0000 0000 3456 67543434 34', 'TBXXDESS', NULL, '2023-06-06 09:05:23', 1, 1, '2023-06-06 10:57:19', 1, 1, 0, NULL, NULL),
(15, 3, 'serverToken2', 12, 'DEF Teknoloji A.Ş.', 'Türkiye İş Bankası', 'Merkez', '23565 32656599', 'TR06 0000 0000 23565 32656599', 'ISXXDESS', NULL, '2023-06-06 09:06:08', 1, 1, '2023-06-06 11:16:33', 1, 1, 0, NULL, NULL),
(16, 3, 'serverToken2', 12, 'DEF Teknoloji A.Ş.', 'KveytTürk', 'Merkez', '26734 2626556565', 'TR25 0000 0000 2673 4262 5565 65', 'KWXXDESS', NULL, '2023-06-06 11:15:15', 1, 1, '2023-06-06 11:16:27', 1, 1, 0, NULL, NULL),
(17, 3, 'serverToken2', 12, 'DEF Teknoloji A.Ş.', 'TEB Bankası', 'Merkez', '111 1111111', 'TR22 0000 0000 1111 1111 11', 'TBXXDESS', NULL, '2023-06-06 11:38:40', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(18, 3, 'serverToken2', 12, 'DEF Teknoloji A.Ş.', 'AK Bankası', 'Merkez', '3456 2223231242', 'TR22 0000 0000 3456 2223231242', 'AKXXDESS', NULL, '2023-06-06 11:39:40', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(21, 3, 'serverToken2', 0, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (EURO )', NULL, NULL, 'TR64 0020 5000 0974 1595 7001 02', 'KTEFTRISXXX', NULL, '2023-06-06 14:47:36', 1, 1, '2023-06-06 14:57:09', 1, 1, 0, NULL, NULL),
(22, 3, 'serverToken2', 0, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (DOLAR )', NULL, NULL, 'TR91 0020 5000 0974 1595 7001 01', 'KTEFTRISXXX', NULL, '2023-06-06 14:48:16', 1, 1, '2023-06-06 14:56:41', 1, 1, 0, NULL, NULL),
(23, 3, 'serverToken2', 0, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (TL)', NULL, NULL, 'TR75 0020 5000 0974 1595 7000 01', 'KTEFTRISXXX', NULL, '2023-06-06 14:51:21', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(24, 3, 'serverToken2', 0, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'ZİRAAT BANKASI (DOLAR)', NULL, NULL, 'TR36 00 0100 1937 9771 5818 5002', 'TCZBTR2AXXX', NULL, '2023-06-06 14:52:07', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(25, 3, 'serverToken2', 18, 'ABC BİLİŞİM A.Ş.', 'Türkiye İş Bankası', 'Merkez', '3242342 234234234', 'TR34 0000 0000 003242342 234234234', 'TRXIISSDD', NULL, '2023-06-12 18:46:45', 14, 0, NULL, NULL, 1, 0, NULL, NULL),
(26, 3, 'serverToken2', 18, 'ABC BİLİŞİM A.Ş.', 'AkBank', 'Merkez', '3242342 23424353', 'TR34 0000 0000 003242342 23424353', 'AKXIISSDD', NULL, '2023-06-12 18:48:10', 14, 0, NULL, NULL, 1, 0, NULL, NULL);

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
(37, 3, 'serverToken2', 'SektorCari', 'Ahşap Teknolojisi', 'Wood Technology', NULL, NULL, NULL, '2023-06-06 06:25:34', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(38, 3, 'serverToken2', 'SektorCari', 'Cam, Çimento ve Toprak Çevre', 'Glass, Cement and Soil Environment', NULL, NULL, NULL, '2023-06-06 06:25:52', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(39, 3, 'serverToken2', 'SektorCari', 'Eğitim', 'Education', NULL, NULL, NULL, '2023-06-06 06:26:04', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(40, 3, 'serverToken2', 'SektorCari', 'Elektrik ve Elektronik', 'Electricity and Electronics', NULL, NULL, NULL, '2023-06-06 06:26:13', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(41, 3, 'serverToken2', 'SektorCari', 'Enerji', 'Energy', NULL, NULL, NULL, '2023-06-06 06:26:26', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(42, 3, 'serverToken2', 'SektorCari', 'Finans', 'Finance', NULL, NULL, NULL, '2023-06-06 06:26:34', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(43, 3, 'serverToken2', 'SektorCari', 'Gıda', 'Food', NULL, NULL, NULL, '2023-06-06 06:26:44', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(44, 3, 'serverToken2', 'SektorCari', 'İnşaat', 'Construction', NULL, NULL, NULL, '2023-06-06 06:26:54', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(45, 3, 'serverToken2', 'SektorCari', 'İş ve Yönetim', 'Business and Management', NULL, NULL, NULL, '2023-06-06 06:27:04', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(46, 3, 'serverToken2', 'SektorCari', 'Kimya, Petrol, Lastik ve Plastik', 'Chemicals, Petroleum, Rubber and Plastics', NULL, NULL, NULL, '2023-06-06 06:27:13', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(47, 3, 'serverToken2', 'SektorCari', 'Kültür, Sanat ve Tasarım', 'Culture, Art and Design', NULL, NULL, NULL, '2023-06-06 06:27:25', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(48, 3, 'serverToken2', 'SektorCari', 'Maden', 'Mine', NULL, NULL, NULL, '2023-06-06 06:27:34', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(49, 3, 'serverToken2', 'SektorCari', 'Medya, İletişim ve Yayıncılık', 'Media, Communication and Publishing', NULL, NULL, NULL, '2023-06-06 06:27:44', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(50, 3, 'serverToken2', 'SektorCari', 'Metal', 'Metal', NULL, NULL, NULL, '2023-06-06 06:27:53', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(51, 3, 'serverToken2', 'SektorCari', 'Otomotiv', 'Automotive', NULL, NULL, NULL, '2023-06-06 06:28:01', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(52, 3, 'serverToken2', 'SektorCari', 'Sağlık ve Sosyal Hizmetler', 'Health and Social Services', NULL, NULL, NULL, '2023-06-06 06:28:11', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(53, 3, 'serverToken2', 'SektorCari', 'Spor ve Rekreasyon', 'Sport and Recreation', NULL, NULL, NULL, '2023-06-06 06:28:20', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(54, 3, 'serverToken2', 'SektorCari', 'Tarım, Avcılık ve Balıkçılık', 'Agriculture, Hunting and Fishing', NULL, NULL, NULL, '2023-06-06 06:28:30', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(55, 3, 'serverToken2', 'SektorCari', 'Tekstil, Hazır Giyim, Deri', 'Textile, Apparel, Leather', NULL, NULL, NULL, '2023-06-06 06:28:41', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(56, 3, 'serverToken2', 'SektorCari', 'Ticaret (Satış ve Pazarlama)', 'Trade (Sales and Marketing)', NULL, NULL, NULL, '2023-06-06 06:28:51', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(57, 3, 'serverToken2', 'SektorCari', 'Toplumsal ve Kişisel Hizmetler', 'Community and Personal Services', NULL, NULL, NULL, '2023-06-06 06:29:10', 1, 1, '2023-06-06 06:50:34', 1, 1, 0, NULL, NULL),
(58, 3, 'serverToken2', 'SektorCari', 'Turizm, Konaklama, Yiyecek-İçecek Hizmetleri', 'Tourism, Accommodation, Food and Beverage Services', NULL, NULL, NULL, '2023-06-06 06:29:20', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(59, 3, 'serverToken2', 'SektorCari', 'Ulaştırma, Lojistik ve Haberleşme', 'Transportation, Logistics and Communication', NULL, '04', NULL, '2023-06-06 06:29:30', 1, 1, '2023-06-22 13:37:59', 1, 1, 0, NULL, NULL),
(60, 3, 'serverToken2', 'SektorStok', 'Ahşap', 'Wood', 'Ahp', '01', NULL, '2023-06-06 06:42:48', 1, 1, '2023-07-05 11:00:11', 1, 1, 0, NULL, NULL),
(61, 3, 'serverToken2', 'SektorStok', 'Cam', 'Glass', 'cm', NULL, NULL, '2023-06-06 06:46:21', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(62, 3, 'serverToken2', 'SektorStok', 'Yapı Kimyasalı', 'Building Chemicals', 'YP', NULL, NULL, '2023-06-06 06:46:33', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(63, 3, 'serverToken2', 'SektorStok', 'Çimento', 'Cement', 'Ç', NULL, NULL, '2023-06-06 06:46:42', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(64, 3, 'serverToken2', 'SektorStok', 'Eğitim', 'Education', 'E', NULL, NULL, '2023-06-06 06:46:51', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(65, 3, 'serverToken2', 'SektorStok', 'Elektrik', 'Electricity', NULL, NULL, NULL, '2023-06-06 06:47:00', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(66, 3, 'serverToken2', 'SektorStok', 'Elektronik', 'Electronics', NULL, NULL, NULL, '2023-06-06 06:47:10', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(67, 3, 'serverToken2', 'SektorStok', 'Enerji', 'Energy', NULL, NULL, NULL, '2023-06-06 06:47:21', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(68, 3, 'serverToken2', 'SektorStok', 'Gıda', 'Food', NULL, NULL, NULL, '2023-06-06 06:47:36', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(69, 3, 'serverToken2', 'SektorStok', 'İnşaat', 'Construction', 'IN', '654', NULL, '2023-06-06 06:47:48', 1, 1, '2023-07-05 12:17:15', 1, 1, 0, NULL, NULL),
(70, 3, 'serverToken2', 'SektorStok', 'Petrol Ürünleri', 'Petroleum Products', NULL, NULL, NULL, '2023-06-06 06:47:58', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(71, 3, 'serverToken2', 'SektorStok', 'Plastik', 'Plastic', NULL, NULL, NULL, '2023-06-06 06:48:10', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(72, 3, 'serverToken2', 'SektorStok', 'Maden', 'Mine', NULL, NULL, NULL, '2023-06-06 06:48:18', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(73, 3, 'serverToken2', 'SektorStok', 'Metal', 'Metal', NULL, NULL, NULL, '2023-06-06 06:48:27', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(74, 3, 'serverToken2', 'SektorStok', 'Otomotiv', 'Automotive', NULL, NULL, NULL, '2023-06-06 06:48:45', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(75, 3, 'serverToken2', 'SektorStok', 'Sağlık Ürünleri', 'Health Products', NULL, NULL, NULL, '2023-06-06 06:48:54', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(76, 3, 'serverToken2', 'SektorStok', 'Çevre Ürünleri', 'Environmental Products', NULL, NULL, NULL, '2023-06-06 06:49:02', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(77, 3, 'serverToken2', 'SektorStok', 'Tarım ve Hayvancılık Ürünleri', 'Agriculture and Livestock Products', NULL, NULL, NULL, '2023-06-06 06:49:12', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(78, 3, 'serverToken2', 'SektorStok', 'Tekstil Ürünler', 'Textile Products', NULL, NULL, NULL, '2023-06-06 06:49:20', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(79, 3, 'serverToken2', 'SektorStok', 'Hijyen Ürünleri', 'Hygiene Products', NULL, NULL, NULL, '2023-06-06 06:49:33', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(80, 3, 'serverToken2', 'SektorStok', 'Yiyecek-İçecek Ürünleri', 'Food and Beverage Products', NULL, NULL, NULL, '2023-06-06 06:49:44', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
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
(102, 3, 'serverToken2', 'Genel', 'Personel Gideri', 'Personal Expenses', NULL, NULL, NULL, '2023-06-06 10:15:49', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(105, 3, 'serverToken2', 'TeslimŞekli', 'DDP - GÜMRÜK VERGİLERİ ÖDENMİŞ ALICI ADRESE TESLİM', 'DDP - DELIVERED DUTY PAID', NULL, NULL, NULL, '2023-06-09 13:50:39', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(113, 3, 'serverToken2', 'GenelSart', 'Genel', 'Genel', NULL, NULL, NULL, '2023-06-13 08:42:57', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(114, 3, 'serverToken2', 'Genel', 'x', 'x', NULL, NULL, NULL, '2023-06-15 13:58:22', 14, 0, NULL, NULL, 1, 0, NULL, NULL),
(115, 3, 'serverToken2', 'SevkŞekli', 'Konteyner', 'Container', NULL, NULL, NULL, '2023-06-16 11:33:03', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(116, 3, 'serverToken2', 'SevkŞekli', 'Palet', 'Palette', NULL, NULL, NULL, '2023-06-16 11:33:21', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(117, 3, 'serverToken2', 'SevkŞekli', 'Paket', 'Package', NULL, NULL, NULL, '2023-06-16 11:33:41', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(118, 3, 'serverToken2', 'SevkŞekli', 'Parsiyel', 'Partial', NULL, NULL, NULL, '2023-06-16 11:34:13', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(119, 3, 'serverToken2', 'SevkŞekli', 'Tır', 'Truck', 'tr', '123', NULL, '2023-06-16 11:34:33', 1, 1, '2023-06-18 19:19:27', 1, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categorysub`
--

CREATE TABLE `categorysub` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `categoryid` text DEFAULT NULL,
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
-- Tablo döküm verisi `categorysub`
--

INSERT INTO `categorysub` (`id`, `serverId`, `serverToken`, `categoryid`, `title`, `title_EN`, `codeLet`, `codeNumber`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(33, 3, 'serverToken2', '44', 'Yapı Malzemeleri', 'Construction Materials', 'YM', '100', NULL, '2023-07-05 11:51:55', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(34, 3, 'serverToken2', '44', 'Yapı Kimyasalı', 'Construction Chemical', 'YK', '101', NULL, '2023-07-05 11:52:31', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(35, 3, 'serverToken2', '69', 'Yapı Kimyasalı', 'Construction Chemical', 'YKS', '103', NULL, '2023-07-05 12:13:12', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(36, 3, 'serverToken2', '69', 'Yapı Malzemeleri', 'Construction Materials', 'YMS', '104', NULL, '2023-07-05 12:13:50', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cost_calculation_expense_list`
--

CREATE TABLE `cost_calculation_expense_list` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `const` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` text DEFAULT NULL,
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
-- Tablo döküm verisi `cost_calculation_expense_list`
--

INSERT INTO `cost_calculation_expense_list` (`id`, `serverId`, `serverToken`, `time`, `const`, `title`, `description`, `price`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(272, 3, 'serverToken2', '1688978241', 1, 'Personel Gideri', 'Personel Gideri', '12', NULL, '2023-07-10 08:37:21', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(273, 3, 'serverToken2', '1688978241', 0, 'Pesin Gider', 'Pesin Gider Açıklaması', '17,52', NULL, '2023-07-10 08:37:21', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(274, 3, 'serverToken2', '1688978429', 1, 'Personel Gideri', 'Personel Gideri', '12', NULL, '2023-07-10 08:40:29', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(275, 3, 'serverToken2', '1688978429', 0, 'Pesin Gider', 'Pesin Gider Açıklaması', '17,52', NULL, '2023-07-10 08:40:29', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(276, 3, 'serverToken2', '1688978702', 1, 'Personel Gideri', 'Personel Gideri', '12', NULL, '2023-07-10 08:45:02', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(277, 3, 'serverToken2', '1688978702', 0, 'Pesin Gider', 'Pesin Gider Açıklaması', '17,52', NULL, '2023-07-10 08:45:02', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(278, 3, 'serverToken2', '1688978931', 1, 'Personel Gideri', 'Personel Gideri', '12', NULL, '2023-07-10 08:48:51', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(279, 3, 'serverToken2', '1688978931', 0, 'Pesin Gider', 'Pesin Gider Açıklaması', '17,52', NULL, '2023-07-10 08:48:51', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(280, 3, 'serverToken2', '1688978931', 0, 'Deneme', 'Açıklama', '65', NULL, '2023-07-10 08:54:16', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cost_calculation_fixed_expenses`
--

CREATE TABLE `cost_calculation_fixed_expenses` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
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
-- Tablo döküm verisi `cost_calculation_fixed_expenses`
--

INSERT INTO `cost_calculation_fixed_expenses` (`id`, `serverId`, `serverToken`, `type`, `category_id`, `title`, `description`, `price`, `currency`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(25, 3, 'serverToken2', 'Genel', 102, 'Personel Gideri', 'Personel Gideri', '12', 'Euro', NULL, '2023-06-19 13:11:07', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(26, 3, 'serverToken2', 'ÖdemeŞekli', 100, 'Pesin Gider', 'Pesin Gider Açıklaması', '17,52', 'Euro', NULL, '2023-06-19 13:12:13', 1, 1, '2023-06-19 13:12:56', 1, 1, 0, NULL, NULL),
(27, 3, 'serverToken2', 'TeslimŞekli', 90, 'FCA', 'FCA', '65', 'Euro', NULL, '2023-06-19 13:15:04', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cost_calculation_list`
--

CREATE TABLE `cost_calculation_list` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `costCalculationCode` text DEFAULT NULL,
  `codeNumber` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `requestformid` int(11) DEFAULT NULL,
  `get_offers_id` text DEFAULT NULL,
  `public` int(11) DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `currency_rate` text DEFAULT NULL,
  `companyId` int(11) DEFAULT NULL,
  `companyTitle` text DEFAULT NULL,
  `companyAuthorized_person` text DEFAULT NULL,
  `companyAuthorized_tel` text DEFAULT NULL,
  `companyAuthorized_email` text DEFAULT NULL,
  `companyAuthorized_person_tax_no` text DEFAULT NULL,
  `companyAuthorized_person_tax_adm` text DEFAULT NULL,
  `companyAuthorized_person_adress` text DEFAULT NULL,
  `profit` text DEFAULT NULL,
  `ibm` text DEFAULT NULL,
  `serviceFee` text DEFAULT NULL,
  `sector` text DEFAULT NULL,
  `sector_title` text DEFAULT NULL,
  `vendorDeliveryType` text DEFAULT NULL,
  `vendorDeliveryType_Title` text DEFAULT NULL,
  `paymentMethod` text NOT NULL,
  `paymentMethod_Title` text NOT NULL,
  `modeofTransport` text NOT NULL,
  `modeofTransport_Title` text DEFAULT NULL,
  `shipmentType` text DEFAULT NULL,
  `shipmentType_title` text DEFAULT NULL,
  `specialPermit` text DEFAULT NULL,
  `specialPermit_Title` text DEFAULT NULL,
  `intertek` text NOT NULL,
  `intertek_Title` text NOT NULL,
  `packagingType` text DEFAULT NULL,
  `organizingStaff` text DEFAULT NULL,
  `organizingStafTel` text DEFAULT NULL,
  `organizingStafEmail` text DEFAULT NULL,
  `offerEffectiveDate` text DEFAULT NULL,
  `exitPoint` text DEFAULT NULL,
  `clearancePlace` text DEFAULT NULL,
  `destination` text DEFAULT NULL,
  `deliveryLocation` text DEFAULT NULL,
  `releaseDate` text DEFAULT NULL,
  `shipmentDate` text DEFAULT NULL,
  `arrivalDate` text DEFAULT NULL,
  `deliveryDate` text DEFAULT NULL,
  `const` int(11) DEFAULT NULL,
  `token` text DEFAULT NULL,
  `costCalculationCheck` text DEFAULT NULL,
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
-- Tablo döküm verisi `cost_calculation_list`
--

INSERT INTO `cost_calculation_list` (`id`, `serverId`, `serverToken`, `costCalculationCode`, `codeNumber`, `time`, `title`, `requestformid`, `get_offers_id`, `public`, `currency`, `currency_rate`, `companyId`, `companyTitle`, `companyAuthorized_person`, `companyAuthorized_tel`, `companyAuthorized_email`, `companyAuthorized_person_tax_no`, `companyAuthorized_person_tax_adm`, `companyAuthorized_person_adress`, `profit`, `ibm`, `serviceFee`, `sector`, `sector_title`, `vendorDeliveryType`, `vendorDeliveryType_Title`, `paymentMethod`, `paymentMethod_Title`, `modeofTransport`, `modeofTransport_Title`, `shipmentType`, `shipmentType_title`, `specialPermit`, `specialPermit_Title`, `intertek`, `intertek_Title`, `packagingType`, `organizingStaff`, `organizingStafTel`, `organizingStafEmail`, `offerEffectiveDate`, `exitPoint`, `clearancePlace`, `destination`, `deliveryLocation`, `releaseDate`, `shipmentDate`, `arrivalDate`, `deliveryDate`, `const`, `token`, `costCalculationCheck`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(132, 3, 'serverToken2', 'MK-10072023-032', '032', '1688978931', 'Maliyet Test #1', 59, '82', 0, 'Dolar', '12', 27, 'Beriko A.Ş', 'Mehmet Yakar', '05114361478', 'info@berico.com.tr', '14256474865', 'Saray', 'Kazan Saray No 56.', NULL, NULL, NULL, NULL, NULL, '95', 'DAP - Yerinde Teslim', '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', '97', 'Karayolu', '117', 'Paket', '0', NULL, '82', 'Hayır', 'Paketler jelatinli ve NAylonlu olsun', 'Ebu Enes Yıldırım ( user@gmail.com )', '0551 022 02 02', 'user@gmail.com', '2023-07-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Evet', '2023-07-10 08:48:51', 1, 1, '2023-07-10 14:41:31', NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cost_calculation_product_list`
--

CREATE TABLE `cost_calculation_product_list` (
  `id` int(11) NOT NULL,
  `serverId` int(11) DEFAULT NULL,
  `serverToken` text DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `get_offers_id` int(11) DEFAULT NULL,
  `cost_calculation_id` text DEFAULT NULL,
  `sector` text DEFAULT NULL,
  `sub_sector` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `nameTr` text DEFAULT NULL,
  `nameEn` text DEFAULT NULL,
  `imgUrl` text NOT NULL,
  `techFileUrl` text DEFAULT NULL,
  `stockUnit` text DEFAULT NULL,
  `stockCount` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `total` text DEFAULT NULL,
  `kdv_buy` text DEFAULT NULL,
  `kdv_sell` text DEFAULT NULL,
  `export_registered` text DEFAULT NULL,
  `export_registered_kdv_buy` text DEFAULT NULL,
  `export_registered_kdv_sell` text DEFAULT NULL,
  `descriptionTr` text DEFAULT NULL,
  `descriptionEn` text DEFAULT NULL,
  `featuresTr` text DEFAULT NULL,
  `featuresEn` text DEFAULT NULL,
  `tech_featuresTr` text DEFAULT NULL,
  `tech_featuresEn` text DEFAULT NULL,
  `web_address` text DEFAULT NULL,
  `catalogLink` text DEFAULT NULL,
  `brand` text DEFAULT NULL,
  `colorCode` text DEFAULT NULL,
  `is_warranty` text DEFAULT NULL,
  `warrantyTime` text DEFAULT NULL,
  `productModel` text DEFAULT NULL,
  `productCode` text DEFAULT NULL,
  `setup` text DEFAULT NULL,
  `gtipNo` text DEFAULT NULL,
  `productUsePurposeTR` text DEFAULT NULL,
  `productUsePurposeEN` text DEFAULT NULL,
  `ownBrand` text DEFAULT NULL,
  `specialDesign` text DEFAULT NULL,
  `specialPacket` text DEFAULT NULL,
  `salesOutlet` text DEFAULT NULL,
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
-- Tablo döküm verisi `cost_calculation_product_list`
--

INSERT INTO `cost_calculation_product_list` (`id`, `serverId`, `serverToken`, `time`, `get_offers_id`, `cost_calculation_id`, `sector`, `sub_sector`, `stock_id`, `nameTr`, `nameEn`, `imgUrl`, `techFileUrl`, `stockUnit`, `stockCount`, `currency`, `price`, `total`, `kdv_buy`, `kdv_sell`, `export_registered`, `export_registered_kdv_buy`, `export_registered_kdv_sell`, `descriptionTr`, `descriptionEn`, `featuresTr`, `featuresEn`, `tech_featuresTr`, `tech_featuresEn`, `web_address`, `catalogLink`, `brand`, `colorCode`, `is_warranty`, `warrantyTime`, `productModel`, `productCode`, `setup`, `gtipNo`, `productUsePurposeTR`, `productUsePurposeEN`, `ownBrand`, `specialDesign`, `specialPacket`, `salesOutlet`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(140, 3, 'serverToken2', 1688978931, 90, '132', '69', 36, 66, 'Talep  Test #1 Güncelle', 'Verox BetonKontakt ( Primer for Creating an Exposed  Concere Surface )', '/assets/img/product/default.jpg', NULL, 'Adet', '12', 'Dolar', '30', '360.00', '11', '12', 'true', '13', '14', 'Açıklama TR', 'Açıklama EN', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Ürün Web Sitesi', 'Katalog Linki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gıda Gtip nO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-10 08:48:51', 1, 1, '2023-07-10 10:02:34', NULL, 1, 0, NULL, NULL),
(141, 3, 'serverToken2', 1688978931, 91, '132', '69', 36, 66, 'Talep  Test #2', 'Verox BetonKontakt ( Primer for Creating an Exposed  Concere Surface )', '/assets/img/product/default.jpg', NULL, 'Adet', '12', 'Dolar', '31', '372.00', '11', '12', 'true', '13', '14', 'Açıklama TR', 'Açıklama EN', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Ürün Web Sitesi', 'Katalog Linki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gıda Gtip nO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-10 08:48:51', 1, 1, '2023-07-10 10:02:44', NULL, 1, 0, NULL, NULL),
(146, 3, 'serverToken2', 1688978931, 65, '132', '69', 36, 65, 'Verox Acryl Based Liquis Membrane-Bericalam', 'Verox Acryl Based Liquis Membrane-Bericalam', '/assets/img/product/default.jpg', NULL, 'Ton', '10', 'Dolar', '68', '680.00', '17', '18', 'true', '19', '20', 'Açıklama TR', 'Açıklama EN', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Ürün Web Sitesi', 'Katalog Linki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'T53656565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-10 11:30:25', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `current_cart`
--

CREATE TABLE `current_cart` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `current_row` text DEFAULT NULL,
  `sectoral_type` text DEFAULT NULL,
  `codeNumber` text DEFAULT NULL,
  `current_code` text DEFAULT NULL,
  `current_name` text NOT NULL,
  `short_name` text NOT NULL,
  `currency` text NOT NULL,
  `authorized_person` text DEFAULT NULL,
  `authorized_person_role` text DEFAULT NULL,
  `authorized_person_tel` text DEFAULT NULL,
  `authorized_person_whatsap` text DEFAULT NULL,
  `authorized_person_mail` text DEFAULT NULL,
  `ref_person` text DEFAULT NULL,
  `ref_departman` text DEFAULT NULL,
  `ref_phone` text DEFAULT NULL,
  `ref_email` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `post_code` text DEFAULT NULL,
  `tel1` text DEFAULT NULL,
  `tel2` text DEFAULT NULL,
  `fax1` text DEFAULT NULL,
  `fax2` text DEFAULT NULL,
  `tax_administration` text DEFAULT NULL,
  `tax_number` text DEFAULT NULL,
  `account_code` text DEFAULT NULL,
  `web_address` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `email_cc` text DEFAULT NULL,
  `description` text DEFAULT NULL,
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
-- Tablo döküm verisi `current_cart`
--

INSERT INTO `current_cart` (`id`, `serverId`, `serverToken`, `current_row`, `sectoral_type`, `codeNumber`, `current_code`, `current_name`, `short_name`, `currency`, `authorized_person`, `authorized_person_role`, `authorized_person_tel`, `authorized_person_whatsap`, `authorized_person_mail`, `ref_person`, `ref_departman`, `ref_phone`, `ref_email`, `address`, `billing_address`, `country`, `city`, `district`, `post_code`, `tel1`, `tel2`, `fax1`, `fax2`, `tax_administration`, `tax_number`, `account_code`, `web_address`, `email`, `email_cc`, `description`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(23, 3, 'serverToken2', '120', '44', '007', '120..007', 'IFM International Facility Management GmbH', 'IFM', 'Euro', 'Yalçın Bey', 'Patron', '+49209148185', '+49209148185', 'ifm_gmbh.mail@t-online.de', NULL, NULL, NULL, NULL, 'Gelsenkirchen Adres', 'Gelsenkirchen Adres', 'Almanya', 'Deutshland', 'Gelsenkirchen', '45883', '+49209148185', NULL, NULL, NULL, 'Almanya', '32121', NULL, 'www.ifm.com', 'ifm_gmbh.mail@t-online.de', NULL, 'Almanya Tedarikçi', NULL, '2023-07-05 11:57:25', 1, 1, '2023-07-05 12:54:49', NULL, 1, 0, NULL, NULL),
(24, 3, 'serverToken2', '320', '44', '008', '320..008', 'Al Alcı A.Ş', 'Al', 'TL', 'Mustafa Al', 'Yönetici', '055103221547', '055103221547', 'info@al.com.tr', NULL, NULL, NULL, NULL, 'Gölbaşı Mah No 45', 'Gölbaşı Mah No 45', 'Türkiye', 'Ankara', 'Gölbaşı', '36000', '3124505050', '3124505051', NULL, NULL, 'Gölbaşı', '121312464', NULL, 'www.al.com.tr', 'info@al.com.tr', NULL, NULL, NULL, '2023-07-05 12:00:39', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(27, 3, 'serverToken2', '320', '44', '011', '320..011', 'Beriko A.Ş', 'Beriko', 'TL', 'Mehmet Yakar', 'Müdür', '05114361478', '05114361478', 'info@berico.com.tr', NULL, NULL, NULL, NULL, 'Kazan Saray No 56.', 'Kazan Saray No 56.', 'Türkiye', 'Ankara', 'KahramanKazan', '06410', '3121544778', '3121544771', NULL, NULL, 'Saray', '14256474865', NULL, 'www.berico.com.tr', 'info@berico.com.tr', NULL, NULL, NULL, '2023-07-05 12:04:35', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(37, 3, 'serverToken2', '120', '44', '021', '120..021', 'Happland Irak A.Ş', 'Happy', 'Dolar', 'Saif Bey', 'Müdür', '065040536', '065040536', 'info@happland.com', NULL, NULL, NULL, NULL, 'Ankava 11 Erbil 44001 Irak', 'Ankava 11 Erbil 44001 Irak', 'Irak', 'Erbil', 'Ankava', '0647847', '+964032154784', '+964032154784', NULL, NULL, 'Erbil', '6595632', NULL, 'www.happland.com', 'info@happland.com', NULL, NULL, NULL, '2023-07-05 12:08:59', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

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
(206, 3, 'serverToken2', 'profileImage', '1688736783.jpg', 'jpg', 'image', '3.jpg', 'upload/uploads/1688736783.jpg', '85109', '83.11', 'kb', '2023-07-07 13:33:03', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `general_conditions`
--

CREATE TABLE `general_conditions` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `category_id` text DEFAULT NULL,
  `title` text DEFAULT NULL,
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
-- Tablo döküm verisi `general_conditions`
--

INSERT INTO `general_conditions` (`id`, `serverId`, `serverToken`, `type`, `category_id`, `title`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(23, 3, 'serverToken2', 'Genel', '102', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-06-13 09:01:02', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(24, 3, 'serverToken2', 'Genel', '114', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-06-15 13:58:49', 14, 0, NULL, NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `get_offers`
--

CREATE TABLE `get_offers` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `getOfferNo` text DEFAULT NULL,
  `codeNumber` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `requestformid` text DEFAULT NULL,
  `offerEffectiveDate` text DEFAULT NULL,
  `currencyCartId` int(11) DEFAULT NULL,
  `companyAuthorized_person` text DEFAULT NULL,
  `companyAuthorized_email` text DEFAULT NULL,
  `companyAuthorized_tel` text DEFAULT NULL,
  `companyAuthorized_person_tax_no` text DEFAULT NULL,
  `companyAuthorized_person_adress` text DEFAULT NULL,
  `companyAuthorized_person_tax_adm` text DEFAULT NULL,
  `paymentMethod` text DEFAULT NULL,
  `paymentMethod_Title` text DEFAULT NULL,
  `modeofTransport` text DEFAULT NULL,
  `modeofTransport_Title` text DEFAULT NULL,
  `shipmentType` text DEFAULT NULL,
  `shipmentType_title` text DEFAULT NULL,
  `intertek` text DEFAULT NULL,
  `intertek_Title` text DEFAULT NULL,
  `specialPermit` text DEFAULT NULL,
  `specialPermit_Title` text DEFAULT NULL,
  `deliveryLocation` text DEFAULT NULL,
  `packagingType` text DEFAULT NULL,
  `delivery_at` text DEFAULT NULL,
  `vendorDeliveryType` text DEFAULT NULL,
  `vendorDeliveryType_Title` text DEFAULT NULL,
  `is_warranty` text DEFAULT NULL,
  `warrantyTime` text DEFAULT NULL,
  `setup` text DEFAULT NULL,
  `reqSample` text DEFAULT NULL,
  `sector` text DEFAULT NULL,
  `sector_title` text DEFAULT NULL,
  `productTotal` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
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
-- Tablo döküm verisi `get_offers`
--

INSERT INTO `get_offers` (`id`, `serverId`, `serverToken`, `getOfferNo`, `codeNumber`, `title`, `requestformid`, `offerEffectiveDate`, `currencyCartId`, `companyAuthorized_person`, `companyAuthorized_email`, `companyAuthorized_tel`, `companyAuthorized_person_tax_no`, `companyAuthorized_person_adress`, `companyAuthorized_person_tax_adm`, `paymentMethod`, `paymentMethod_Title`, `modeofTransport`, `modeofTransport_Title`, `shipmentType`, `shipmentType_title`, `intertek`, `intertek_Title`, `specialPermit`, `specialPermit_Title`, `deliveryLocation`, `packagingType`, `delivery_at`, `vendorDeliveryType`, `vendorDeliveryType_Title`, `is_warranty`, `warrantyTime`, `setup`, `reqSample`, `sector`, `sector_title`, `productTotal`, `currency`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(75, 3, 'serverToken2', 'TEF-05072023-029', '029', 'Almanya Yapı Kimyasalı #01', '59', '2023-07-17', 27, 'Mehmet Yakar', 'info@berico.com.tr', '05114361478', NULL, NULL, NULL, '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', '97', 'Karayolu', '117', 'Paket', '82', 'Hayır', NULL, NULL, 'Fabrika', 'Paketler jelatinli ve NAylonlu olsun', '2023-07-31', '91', 'EXW - Ticari işletmede Teslim', NULL, NULL, NULL, '1 adet', NULL, NULL, '6075', 'Euro', '2023-07-05 12:58:58', 1, 1, '2023-07-07 14:07:44', 1, 1, 0, NULL, NULL),
(82, 3, 'serverToken2', 'TEF-10072023-041', '041', 'Teklif Test #1', '59', '2023-07-14', 24, 'Mustafa Al', 'info@al.com.tr', '055103221547', '121312464', 'Gölbaşı Mah No 45', 'Gölbaşı', '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', '97', 'Karayolu', '117', 'Paket', '82', 'Hayır', NULL, NULL, 'Almanya', 'Paketler jelatinli ve NAylonlu olsun', '2023-07-31', '95', 'DAP - Yerinde Teslim', NULL, NULL, NULL, '1 adet', NULL, NULL, '1448', 'Dolar', '2023-07-10 08:33:09', 1, 1, '2023-07-10 14:25:32', 1, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `get_offers_product_list`
--

CREATE TABLE `get_offers_product_list` (
  `id` int(11) NOT NULL,
  `serverId` int(11) DEFAULT NULL,
  `serverToken` text DEFAULT NULL,
  `get_offers_id` int(11) DEFAULT NULL,
  `sector` text DEFAULT NULL,
  `sub_sector` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `requestform_product_id` int(11) DEFAULT NULL,
  `nameTr` text DEFAULT NULL,
  `nameEn` text DEFAULT NULL,
  `imgUrl` text NOT NULL,
  `techFileUrl` text DEFAULT NULL,
  `stockUnit` text DEFAULT NULL,
  `stockCount` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `total` text DEFAULT NULL,
  `kdv_buy` text DEFAULT NULL,
  `kdv_sell` text DEFAULT NULL,
  `export_registered` text DEFAULT NULL,
  `export_registered_kdv_buy` text DEFAULT NULL,
  `export_registered_kdv_sell` text DEFAULT NULL,
  `descriptionTr` text DEFAULT NULL,
  `descriptionEn` text DEFAULT NULL,
  `featuresTr` text DEFAULT NULL,
  `featuresEn` text DEFAULT NULL,
  `tech_featuresTr` text DEFAULT NULL,
  `tech_featuresEn` text DEFAULT NULL,
  `web_address` text DEFAULT NULL,
  `catalogLink` text DEFAULT NULL,
  `brand` text DEFAULT NULL,
  `colorCode` text DEFAULT NULL,
  `is_warranty` text DEFAULT NULL,
  `warrantyTime` text DEFAULT NULL,
  `productModel` text DEFAULT NULL,
  `productCode` text DEFAULT NULL,
  `setup` text DEFAULT NULL,
  `gtipNo` text DEFAULT NULL,
  `productUsePurposeTR` text DEFAULT NULL,
  `productUsePurposeEN` text DEFAULT NULL,
  `ownBrand` text DEFAULT NULL,
  `specialDesign` text DEFAULT NULL,
  `specialPacket` text DEFAULT NULL,
  `salesOutlet` text DEFAULT NULL,
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
-- Tablo döküm verisi `get_offers_product_list`
--

INSERT INTO `get_offers_product_list` (`id`, `serverId`, `serverToken`, `get_offers_id`, `sector`, `sub_sector`, `stock_id`, `requestform_product_id`, `nameTr`, `nameEn`, `imgUrl`, `techFileUrl`, `stockUnit`, `stockCount`, `currency`, `price`, `total`, `kdv_buy`, `kdv_sell`, `export_registered`, `export_registered_kdv_buy`, `export_registered_kdv_sell`, `descriptionTr`, `descriptionEn`, `featuresTr`, `featuresEn`, `tech_featuresTr`, `tech_featuresEn`, `web_address`, `catalogLink`, `brand`, `colorCode`, `is_warranty`, `warrantyTime`, `productModel`, `productCode`, `setup`, `gtipNo`, `productUsePurposeTR`, `productUsePurposeEN`, `ownBrand`, `specialDesign`, `specialPacket`, `salesOutlet`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(90, 3, 'serverToken2', 82, '69', 36, 66, 76, 'Talep  Test #1', 'Verox BetonKontakt ( Primer for Creating an Exposed  Concere Surface )', '/assets/img/product/default.jpg', NULL, 'Adet', '12', 'Dolar', '32', '384.00', '11', '12', 'true', '13', '14', 'Açıklama TR', 'Açıklama EN', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Ürün Web Sitesi', 'Katalog Linki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gıda Gtip nO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-10 08:47:50', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(91, 3, 'serverToken2', 82, '69', 36, 66, 77, 'Talep  Test #2', 'Verox BetonKontakt ( Primer for Creating an Exposed  Concere Surface )', '/assets/img/product/default.jpg', NULL, 'Adet', '12', 'Dolar', '32', '384.00', '11', '12', 'true', '13', '14', 'Açıklama TR', 'Açıklama EN', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Ürün Web Sitesi', 'Katalog Linki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gıda Gtip nO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-10 08:48:03', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(92, 3, 'serverToken2', 82, '69', 36, 65, 78, 'Verox Acryl Based Liquis Membrane-Bericalam', 'Verox Acryl Based Liquis Membrane-Bericalam', '/assets/img/product/default.jpg', NULL, 'Ton', '10', 'Dolar', '68', '680.00', '17', '18', 'true', '19', '20', 'Açıklama TR', 'Açıklama EN', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Ürün Web Sitesi', 'Katalog Linki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'T53656565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-10 08:48:37', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proforma_bank_list`
--

CREATE TABLE `proforma_bank_list` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `proforma_id` int(11) DEFAULT NULL,
  `bankaAccountTitle` text DEFAULT NULL,
  `bankTitle` text DEFAULT NULL,
  `branch` text DEFAULT NULL,
  `accountNumber` text DEFAULT NULL,
  `iban` text DEFAULT NULL,
  `swift` text DEFAULT NULL,
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
-- Tablo döküm verisi `proforma_bank_list`
--

INSERT INTO `proforma_bank_list` (`id`, `serverId`, `serverToken`, `time`, `proforma_id`, `bankaAccountTitle`, `bankTitle`, `branch`, `accountNumber`, `iban`, `swift`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(90, 3, 'serverToken2', 1687524250, 50, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (DOLAR )', NULL, NULL, 'TR91 0020 5000 0974 1595 7001 01', 'KTEFTRISXXX', NULL, '2023-06-23 12:44:10', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(91, 3, 'serverToken2', 1687524250, 50, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (TL)', NULL, NULL, 'TR75 0020 5000 0974 1595 7000 01', 'KTEFTRISXXX', NULL, '2023-06-23 12:44:10', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(92, 3, 'serverToken2', 1687524250, 50, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'ZİRAAT BANKASI (DOLAR)', NULL, NULL, 'TR36 00 0100 1937 9771 5818 5002', 'TCZBTR2AXXX', NULL, '2023-06-23 12:44:10', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(93, 3, 'serverToken2', NULL, 50, 'Banka Hesap Adı', 'Deneme', 'Şube', 'Hesap Numarası', 'İban', 'swift', NULL, '2023-06-23 12:47:00', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(94, 3, 'serverToken2', 1687525073, NULL, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (EURO )', NULL, NULL, 'TR64 0020 5000 0974 1595 7001 02', 'KTEFTRISXXX', NULL, '2023-06-23 12:57:53', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(95, 3, 'serverToken2', 1687525073, NULL, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (DOLAR )', NULL, NULL, 'TR91 0020 5000 0974 1595 7001 01', 'KTEFTRISXXX', NULL, '2023-06-23 12:57:53', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(96, 3, 'serverToken2', 1687525073, NULL, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (TL)', NULL, NULL, 'TR75 0020 5000 0974 1595 7000 01', 'KTEFTRISXXX', NULL, '2023-06-23 12:57:53', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(97, 3, 'serverToken2', 1687525073, NULL, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'ZİRAAT BANKASI (DOLAR)', NULL, NULL, 'TR36 00 0100 1937 9771 5818 5002', 'TCZBTR2AXXX', NULL, '2023-06-23 12:57:53', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(98, 3, 'serverToken2', 1687525205, NULL, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (EURO )', NULL, NULL, 'TR64 0020 5000 0974 1595 7001 02', 'KTEFTRISXXX', NULL, '2023-06-23 13:00:05', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(99, 3, 'serverToken2', 1687525205, NULL, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (DOLAR )', NULL, NULL, 'TR91 0020 5000 0974 1595 7001 01', 'KTEFTRISXXX', NULL, '2023-06-23 13:00:05', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(100, 3, 'serverToken2', 1687525205, NULL, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (TL)', NULL, NULL, 'TR75 0020 5000 0974 1595 7000 01', 'KTEFTRISXXX', NULL, '2023-06-23 13:00:05', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(101, 3, 'serverToken2', 1687525205, NULL, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'ZİRAAT BANKASI (DOLAR)', NULL, NULL, 'TR36 00 0100 1937 9771 5818 5002', 'TCZBTR2AXXX', NULL, '2023-06-23 13:00:05', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(102, 3, 'serverToken2', 1687525329, NULL, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (EURO )', NULL, NULL, 'TR64 0020 5000 0974 1595 7001 02', 'KTEFTRISXXX', NULL, '2023-06-23 13:02:09', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(103, 3, 'serverToken2', 1687525329, NULL, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (DOLAR )', NULL, NULL, 'TR91 0020 5000 0974 1595 7001 01', 'KTEFTRISXXX', NULL, '2023-06-23 13:02:09', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(104, 3, 'serverToken2', 1687525329, NULL, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (TL)', NULL, NULL, 'TR75 0020 5000 0974 1595 7000 01', 'KTEFTRISXXX', NULL, '2023-06-23 13:02:09', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(105, 3, 'serverToken2', 1687525329, NULL, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'ZİRAAT BANKASI (DOLAR)', NULL, NULL, 'TR36 00 0100 1937 9771 5818 5002', 'TCZBTR2AXXX', NULL, '2023-06-23 13:02:09', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(106, 3, 'serverToken2', 1687525375, 54, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (EURO )', NULL, NULL, 'TR64 0020 5000 0974 1595 7001 02', 'KTEFTRISXXX', NULL, '2023-06-23 13:02:55', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(107, 3, 'serverToken2', 1687525375, 54, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (DOLAR )', NULL, NULL, 'TR91 0020 5000 0974 1595 7001 01', 'KTEFTRISXXX', NULL, '2023-06-23 13:02:55', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(108, 3, 'serverToken2', 1687525375, 54, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (TL)', NULL, NULL, 'TR75 0020 5000 0974 1595 7000 01', 'KTEFTRISXXX', NULL, '2023-06-23 13:02:55', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(109, 3, 'serverToken2', 1687525375, 54, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'ZİRAAT BANKASI (DOLAR)', NULL, NULL, 'TR36 00 0100 1937 9771 5818 5002', 'TCZBTR2AXXX', NULL, '2023-06-23 13:02:55', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(110, 3, 'serverToken2', 1687527146, 55, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (EURO )', NULL, NULL, 'TR64 0020 5000 0974 1595 7001 02', 'KTEFTRISXXX', NULL, '2023-06-23 13:32:26', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(111, 3, 'serverToken2', 1687527146, 55, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (DOLAR )', NULL, NULL, 'TR91 0020 5000 0974 1595 7001 01', 'KTEFTRISXXX', NULL, '2023-06-23 13:32:26', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(112, 3, 'serverToken2', 1687527146, 55, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (TL)', NULL, NULL, 'TR75 0020 5000 0974 1595 7000 01', 'KTEFTRISXXX', NULL, '2023-06-23 13:32:26', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(114, 3, 'serverToken2', 1688557311, 56, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (EURO )', NULL, NULL, 'TR64 0020 5000 0974 1595 7001 02', 'KTEFTRISXXX', NULL, '2023-07-05 11:41:51', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(115, 3, 'serverToken2', 1688557311, 56, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (DOLAR )', NULL, NULL, 'TR91 0020 5000 0974 1595 7001 01', 'KTEFTRISXXX', NULL, '2023-07-05 11:41:51', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(116, 3, 'serverToken2', 1688557311, 56, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (TL)', NULL, NULL, 'TR75 0020 5000 0974 1595 7000 01', 'KTEFTRISXXX', NULL, '2023-07-05 11:41:51', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(117, 3, 'serverToken2', 1688557311, 56, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'ZİRAAT BANKASI (DOLAR)', NULL, NULL, 'TR36 00 0100 1937 9771 5818 5002', 'TCZBTR2AXXX', NULL, '2023-07-05 11:41:51', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(118, 3, 'serverToken2', 1688562960, 57, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (EURO )', NULL, NULL, 'TR64 0020 5000 0974 1595 7001 02', 'KTEFTRISXXX', NULL, '2023-07-05 13:16:00', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(122, 3, 'serverToken2', 1688567581, 58, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (EURO )', NULL, NULL, 'TR64 0020 5000 0974 1595 7001 02', 'KTEFTRISXXX', NULL, '2023-07-05 14:33:01', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(123, 3, 'serverToken2', 1688567581, 58, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (DOLAR )', NULL, NULL, 'TR91 0020 5000 0974 1595 7001 01', 'KTEFTRISXXX', NULL, '2023-07-05 14:33:01', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(124, 3, 'serverToken2', 1688567581, 58, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (TL)', NULL, NULL, 'TR75 0020 5000 0974 1595 7000 01', 'KTEFTRISXXX', NULL, '2023-07-05 14:33:01', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(125, 3, 'serverToken2', 1688567581, 58, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'ZİRAAT BANKASI (DOLAR)', NULL, NULL, 'TR36 00 0100 1937 9771 5818 5002', 'TCZBTR2AXXX', NULL, '2023-07-05 14:33:01', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(126, 3, 'serverToken2', 1688568335, 59, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (EURO )', NULL, NULL, 'TR64 0020 5000 0974 1595 7001 02', 'KTEFTRISXXX', NULL, '2023-07-05 14:45:35', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(127, 3, 'serverToken2', 1688568335, 59, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (DOLAR )', NULL, NULL, 'TR91 0020 5000 0974 1595 7001 01', 'KTEFTRISXXX', NULL, '2023-07-05 14:45:35', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(128, 3, 'serverToken2', 1688568335, 59, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (TL)', NULL, NULL, 'TR75 0020 5000 0974 1595 7000 01', 'KTEFTRISXXX', NULL, '2023-07-05 14:45:35', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(129, 3, 'serverToken2', 1688568335, 59, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'ZİRAAT BANKASI (DOLAR)', NULL, NULL, 'TR36 00 0100 1937 9771 5818 5002', 'TCZBTR2AXXX', NULL, '2023-07-05 14:45:35', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(130, 3, 'serverToken2', 1688568456, 60, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (EURO )', NULL, NULL, 'TR64 0020 5000 0974 1595 7001 02', 'KTEFTRISXXX', NULL, '2023-07-05 14:47:36', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(131, 3, 'serverToken2', 1688568456, 60, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (DOLAR )', NULL, NULL, 'TR91 0020 5000 0974 1595 7001 01', 'KTEFTRISXXX', NULL, '2023-07-05 14:47:36', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(132, 3, 'serverToken2', 1688568456, 60, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (TL)', NULL, NULL, 'TR75 0020 5000 0974 1595 7000 01', 'KTEFTRISXXX', NULL, '2023-07-05 14:47:36', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(133, 3, 'serverToken2', 1688568456, 60, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'ZİRAAT BANKASI (DOLAR)', NULL, NULL, 'TR36 00 0100 1937 9771 5818 5002', 'TCZBTR2AXXX', NULL, '2023-07-05 14:47:36', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(134, 3, 'serverToken2', 1688983371, 61, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (EURO )', NULL, NULL, 'TR64 0020 5000 0974 1595 7001 02', 'KTEFTRISXXX', NULL, '2023-07-10 10:02:51', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(135, 3, 'serverToken2', 1688983371, 61, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (DOLAR )', NULL, NULL, 'TR91 0020 5000 0974 1595 7001 01', 'KTEFTRISXXX', NULL, '2023-07-10 10:02:51', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(136, 3, 'serverToken2', 1688983371, 61, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (TL)', NULL, NULL, 'TR75 0020 5000 0974 1595 7000 01', 'KTEFTRISXXX', NULL, '2023-07-10 10:02:51', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(137, 3, 'serverToken2', 1688983371, 61, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'ZİRAAT BANKASI (DOLAR)', NULL, NULL, 'TR36 00 0100 1937 9771 5818 5002', 'TCZBTR2AXXX', NULL, '2023-07-10 10:02:51', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(138, 3, 'serverToken2', 1688985749, NULL, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (EURO )', NULL, NULL, 'TR64 0020 5000 0974 1595 7001 02', 'KTEFTRISXXX', NULL, '2023-07-10 10:42:29', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(139, 3, 'serverToken2', 1688985749, NULL, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (DOLAR )', NULL, NULL, 'TR91 0020 5000 0974 1595 7001 01', 'KTEFTRISXXX', NULL, '2023-07-10 10:42:29', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(140, 3, 'serverToken2', 1688985749, NULL, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (TL)', NULL, NULL, 'TR75 0020 5000 0974 1595 7000 01', 'KTEFTRISXXX', NULL, '2023-07-10 10:42:29', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(141, 3, 'serverToken2', 1688985749, NULL, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'ZİRAAT BANKASI (DOLAR)', NULL, NULL, 'TR36 00 0100 1937 9771 5818 5002', 'TCZBTR2AXXX', NULL, '2023-07-10 10:42:29', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(142, 3, 'serverToken2', 1688985823, 63, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (EURO )', NULL, NULL, 'TR64 0020 5000 0974 1595 7001 02', 'KTEFTRISXXX', NULL, '2023-07-10 10:43:43', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(143, 3, 'serverToken2', 1688985823, 63, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (DOLAR )', NULL, NULL, 'TR91 0020 5000 0974 1595 7001 01', 'KTEFTRISXXX', NULL, '2023-07-10 10:43:43', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(144, 3, 'serverToken2', 1688985823, 63, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'KUVEYT TURK KATILIM BANKASI A.S. (TL)', NULL, NULL, 'TR75 0020 5000 0974 1595 7000 01', 'KTEFTRISXXX', NULL, '2023-07-10 10:43:43', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(145, 3, 'serverToken2', 1688985823, 63, 'İNTERTURK YAPI MALZ. TEKST. GID.SAN.İÇ VE DİŞ TİC.A.Ş', 'ZİRAAT BANKASI (DOLAR)', NULL, NULL, 'TR36 00 0100 1937 9771 5818 5002', 'TCZBTR2AXXX', NULL, '2023-07-10 10:43:43', 0, 0, NULL, NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proforma_conditions_list`
--

CREATE TABLE `proforma_conditions_list` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `proforma_id` text DEFAULT NULL,
  `isGeneral` text DEFAULT NULL,
  `title` text DEFAULT NULL,
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
-- Tablo döküm verisi `proforma_conditions_list`
--

INSERT INTO `proforma_conditions_list` (`id`, `serverId`, `serverToken`, `time`, `proforma_id`, `isGeneral`, `title`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(82, 3, 'serverToken2', 1687524250, '50', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-06-23 12:44:10', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(83, 3, 'serverToken2', 1687524250, '50', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-06-23 12:44:10', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(84, 3, 'serverToken2', 1687525073, NULL, '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-06-23 12:57:53', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(85, 3, 'serverToken2', 1687525073, NULL, '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-06-23 12:57:53', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(86, 3, 'serverToken2', 1687525205, NULL, '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-06-23 13:00:05', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(87, 3, 'serverToken2', 1687525205, NULL, '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-06-23 13:00:05', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(88, 3, 'serverToken2', 1687525329, NULL, '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-06-23 13:02:09', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(89, 3, 'serverToken2', 1687525329, NULL, '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-06-23 13:02:09', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(90, 3, 'serverToken2', 1687525375, '54', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-06-23 13:02:55', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(91, 3, 'serverToken2', 1687525375, '54', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-06-23 13:02:55', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(92, 3, 'serverToken2', NULL, '54', '0', 'Özel Şart 2 Güncelle', NULL, '2023-06-23 13:03:51', 1, 1, '2023-06-23 13:04:14', 1, 1, 0, NULL, NULL),
(94, 3, 'serverToken2', 1687527146, '55', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-06-23 13:32:26', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(95, 3, 'serverToken2', 1687527146, '55', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-06-23 13:32:26', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(96, 3, 'serverToken2', NULL, '55', '0', 'Özel Şart', NULL, '2023-06-26 06:07:55', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(97, 3, 'serverToken2', 1688557311, '56', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-07-05 11:41:51', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(98, 3, 'serverToken2', 1688557311, '56', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-07-05 11:41:51', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(99, 3, 'serverToken2', 1688562960, '57', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-07-05 13:16:00', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(100, 3, 'serverToken2', 1688562960, '57', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-07-05 13:16:00', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(101, 3, 'serverToken2', 1688567581, '58', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-07-05 14:33:01', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(102, 3, 'serverToken2', 1688567581, '58', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-07-05 14:33:01', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(103, 3, 'serverToken2', 1688568335, '59', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-07-05 14:45:35', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(104, 3, 'serverToken2', 1688568335, '59', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-07-05 14:45:35', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(105, 3, 'serverToken2', 1688568456, '60', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-07-05 14:47:36', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(106, 3, 'serverToken2', 1688568456, '60', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-07-05 14:47:36', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(107, 3, 'serverToken2', 1688983371, '61', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-07-10 10:02:51', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(108, 3, 'serverToken2', 1688983371, '61', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-07-10 10:02:51', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(109, 3, 'serverToken2', 1688985749, NULL, '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-07-10 10:42:29', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(110, 3, 'serverToken2', 1688985749, NULL, '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-07-10 10:42:29', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(111, 3, 'serverToken2', 1688985823, '63', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-07-10 10:43:43', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(112, 3, 'serverToken2', 1688985823, '63', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-07-10 10:43:43', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(113, 3, 'serverToken2', NULL, '63', '0', 'Özel Şart1', NULL, '2023-07-10 21:19:37', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proforma_invoice`
--

CREATE TABLE `proforma_invoice` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `proformaCode` text DEFAULT NULL,
  `codeNumber` text DEFAULT NULL,
  `time` text NOT NULL,
  `public` int(11) DEFAULT NULL,
  `requestformid` int(11) DEFAULT NULL,
  `get_offers_id` int(11) DEFAULT NULL,
  `cost_calculation_id` text NOT NULL,
  `title` text DEFAULT NULL,
  `currencyCartId` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `proformaDate` text DEFAULT NULL,
  `proformaNo` text DEFAULT NULL,
  `offerEffectiveDate` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `proformaCheck` text DEFAULT NULL,
  `organizingStafCompanyTitle` text DEFAULT NULL,
  `organizingStafCompanyAdress` text DEFAULT NULL,
  `organizingStaff` text DEFAULT NULL,
  `organizingStafTel` text DEFAULT NULL,
  `organizingStafEmail` text DEFAULT NULL,
  `companyId` text DEFAULT NULL,
  `companyTitle` text DEFAULT NULL,
  `companyAuthorized_person` text DEFAULT NULL,
  `companyAuthorized_tel` text DEFAULT NULL,
  `companyAuthorized_email` text DEFAULT NULL,
  `companyAuthorized_person_tax_no` text DEFAULT NULL,
  `companyAuthorized_person_tax_adm` text DEFAULT NULL,
  `companyAuthorized_person_adress` text DEFAULT NULL,
  `vendorDeliveryType` text DEFAULT NULL,
  `vendorDeliveryType_Title` text DEFAULT NULL,
  `modeofTransport` text DEFAULT NULL,
  `modeofTransport_Title` text DEFAULT NULL,
  `shipmentType` text DEFAULT NULL,
  `shipmentType_title` text DEFAULT NULL,
  `paymentMethod` text DEFAULT NULL,
  `paymentMethod_Title` text DEFAULT NULL,
  `exitPoint` text DEFAULT NULL,
  `clearancePlace` text DEFAULT NULL,
  `deliveryPlace` text DEFAULT NULL,
  `orderPercentage` text DEFAULT NULL,
  `orderValue` text DEFAULT NULL,
  `shipmentPercentage` text DEFAULT NULL,
  `shipmentValue` text DEFAULT NULL,
  `deliveryPercentage` text DEFAULT NULL,
  `deliveryValue` text DEFAULT NULL,
  `const` text DEFAULT NULL,
  `description` text DEFAULT NULL,
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
-- Tablo döküm verisi `proforma_invoice`
--

INSERT INTO `proforma_invoice` (`id`, `serverId`, `serverToken`, `proformaCode`, `codeNumber`, `time`, `public`, `requestformid`, `get_offers_id`, `cost_calculation_id`, `title`, `currencyCartId`, `date`, `proformaDate`, `proformaNo`, `offerEffectiveDate`, `currency`, `proformaCheck`, `organizingStafCompanyTitle`, `organizingStafCompanyAdress`, `organizingStaff`, `organizingStafTel`, `organizingStafEmail`, `companyId`, `companyTitle`, `companyAuthorized_person`, `companyAuthorized_tel`, `companyAuthorized_email`, `companyAuthorized_person_tax_no`, `companyAuthorized_person_tax_adm`, `companyAuthorized_person_adress`, `vendorDeliveryType`, `vendorDeliveryType_Title`, `modeofTransport`, `modeofTransport_Title`, `shipmentType`, `shipmentType_title`, `paymentMethod`, `paymentMethod_Title`, `exitPoint`, `clearancePlace`, `deliveryPlace`, `orderPercentage`, `orderValue`, `shipmentPercentage`, `shipmentValue`, `deliveryPercentage`, `deliveryValue`, `const`, `description`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(63, 3, 'serverToken2', 'IDT-10072023-067', '067', '1688985823', NULL, 59, 82, '132', 'Proforma Test #1', NULL, NULL, '2023-07-20', 'IDT-10072023-067', '2023-07-14', 'Dolar', 'Evet', 'İnterturk Yapı Malzemeleri Tekstil Gıda Sanayi İç ve Dış Ticaret Anonim Şirketi', 'Çukurambar, Mevlana Blv. No: 150 Daire: 121 06530 Çankaya / Ankara / Türkiye', 'Kerim SARGIN', '+90 312 2853888', 'info@interturk.com.tr', '27', 'Beriko A.Ş', 'Mehmet Yakar', '05114361478', 'info@berico.com.tr', '14256474865', 'Saray', 'Kazan Saray No 56.', '95', 'DAP - Yerinde Teslim', '97', 'Karayolu', '117', 'Paket', '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'Bizim Açıklama', NULL, '2023-07-10 10:43:43', 1, 1, '2023-07-10 21:29:59', NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proforma_product_list`
--

CREATE TABLE `proforma_product_list` (
  `id` int(11) NOT NULL,
  `serverId` int(11) DEFAULT NULL,
  `serverToken` text DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `cost_calculation_id` int(11) DEFAULT NULL,
  `proforma_id` text DEFAULT NULL,
  `sector` text DEFAULT NULL,
  `sub_sector` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `nameTr` text DEFAULT NULL,
  `nameEn` text DEFAULT NULL,
  `imgUrl` text NOT NULL,
  `techFileUrl` text DEFAULT NULL,
  `stockUnit` text DEFAULT NULL,
  `stockCount` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `total` text DEFAULT NULL,
  `kdv_buy` text DEFAULT NULL,
  `kdv_sell` text DEFAULT NULL,
  `export_registered` text DEFAULT NULL,
  `export_registered_kdv_buy` text DEFAULT NULL,
  `export_registered_kdv_sell` text DEFAULT NULL,
  `descriptionTr` text DEFAULT NULL,
  `descriptionEn` text DEFAULT NULL,
  `featuresTr` text DEFAULT NULL,
  `featuresEn` text DEFAULT NULL,
  `tech_featuresTr` text DEFAULT NULL,
  `tech_featuresEn` text DEFAULT NULL,
  `web_address` text DEFAULT NULL,
  `catalogLink` text DEFAULT NULL,
  `brand` text DEFAULT NULL,
  `colorCode` text DEFAULT NULL,
  `is_warranty` text DEFAULT NULL,
  `warrantyTime` text DEFAULT NULL,
  `productModel` text DEFAULT NULL,
  `productCode` text DEFAULT NULL,
  `setup` text DEFAULT NULL,
  `gtipNo` text DEFAULT NULL,
  `productUsePurposeTR` text DEFAULT NULL,
  `productUsePurposeEN` text DEFAULT NULL,
  `ownBrand` text DEFAULT NULL,
  `specialDesign` text DEFAULT NULL,
  `specialPacket` text DEFAULT NULL,
  `salesOutlet` text DEFAULT NULL,
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
-- Tablo döküm verisi `proforma_product_list`
--

INSERT INTO `proforma_product_list` (`id`, `serverId`, `serverToken`, `time`, `cost_calculation_id`, `proforma_id`, `sector`, `sub_sector`, `stock_id`, `nameTr`, `nameEn`, `imgUrl`, `techFileUrl`, `stockUnit`, `stockCount`, `currency`, `price`, `total`, `kdv_buy`, `kdv_sell`, `export_registered`, `export_registered_kdv_buy`, `export_registered_kdv_sell`, `descriptionTr`, `descriptionEn`, `featuresTr`, `featuresEn`, `tech_featuresTr`, `tech_featuresEn`, `web_address`, `catalogLink`, `brand`, `colorCode`, `is_warranty`, `warrantyTime`, `productModel`, `productCode`, `setup`, `gtipNo`, `productUsePurposeTR`, `productUsePurposeEN`, `ownBrand`, `specialDesign`, `specialPacket`, `salesOutlet`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(110, 3, 'serverToken2', 1688985823, 140, '63', '69', 36, 66, 'Proforma Güncelleme', 'Verox BetonKontakt ( Primer for Creating an Exposed  Concere Surface )', '/assets/img/product/default.jpg', NULL, 'Adet', '12', 'Dolar', '30', '360.00', '11', '12', 'true', '13', '14', 'Açıklama TR', 'Açıklama EN', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Ürün Web Sitesi', 'Katalog Linki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gıda Gtip nO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-10 10:43:43', 1, 1, '2023-07-10 12:00:15', NULL, 1, 0, NULL, NULL),
(111, 3, 'serverToken2', 1688985823, 141, '63', '69', 36, 66, 'Talep  Test #2', 'Verox BetonKontakt ( Primer for Creating an Exposed  Concere Surface )', '/assets/img/product/default.jpg', NULL, 'Adet', '12', 'Dolar', '31', '372.00', '11', '12', 'true', '13', '14', 'Açıklama TR', 'Açıklama EN', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Ürün Web Sitesi', 'Katalog Linki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gıda Gtip nO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-10 10:43:43', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(117, 3, 'serverToken2', 1688985823, 146, '63', '69', 36, 65, 'Proforma', 'Verox Acryl Based Liquis Membrane-Bericalam', '/assets/img/product/default.jpg', NULL, 'Ton', '10', 'Dolar', '68', '680.00', '17', '18', 'true', '19', '20', 'Açıklama TR', 'Açıklama EN', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Ürün Web Sitesi', 'Katalog Linki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'T53656565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-10 11:33:29', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `requestform`
--

CREATE TABLE `requestform` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `codeNumber` text DEFAULT NULL,
  `reqCode` text DEFAULT NULL,
  `requestFormTitle` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `currencyCartId` int(11) DEFAULT NULL,
  `companyAuthorized_person` text DEFAULT NULL,
  `companyAuthorized_email` text DEFAULT NULL,
  `companyAuthorized_tel` text DEFAULT NULL,
  `companyAuthorized_person_tax_no` text DEFAULT NULL,
  `companyAuthorized_person_tax_adm` text DEFAULT NULL,
  `companyAuthorized_person_adress` text DEFAULT NULL,
  `public` int(11) DEFAULT NULL,
  `public_username` text DEFAULT NULL,
  `public_pass` text DEFAULT NULL,
  `personeId` text DEFAULT NULL,
  `requestEffectiveDate` text DEFAULT NULL,
  `paymentMethod` text DEFAULT NULL,
  `paymentMethod_Title` text DEFAULT NULL,
  `paymentMethod_order` text DEFAULT NULL,
  `paymentMethod_load` text DEFAULT NULL,
  `paymentMethod_delivery` text DEFAULT NULL,
  `modeofTransport` text DEFAULT NULL,
  `modeofTransport_Title` text DEFAULT NULL,
  `shipmentType` text DEFAULT NULL,
  `shipmentType_title` text DEFAULT NULL,
  `intertek` text DEFAULT NULL,
  `intertek_Title` text DEFAULT NULL,
  `specialPermit` text DEFAULT NULL,
  `specialPermit_Title` text DEFAULT NULL,
  `requested_document` text DEFAULT NULL,
  `purchaseTime` text DEFAULT NULL,
  `purchaseAmount` text DEFAULT NULL,
  `purchaseAmountStockUnit` text DEFAULT NULL,
  `initialPurchaseAmount` text DEFAULT NULL,
  `initialPurchaseAmountStockUnit` text DEFAULT NULL,
  `initialPurchaseAmount_at` text DEFAULT NULL,
  `deliveryLocation` text DEFAULT NULL,
  `packagingType` text DEFAULT NULL,
  `reqSample` text DEFAULT NULL,
  `token` text DEFAULT NULL,
  `delivery_at` text DEFAULT NULL,
  `vendorDeliveryType` text DEFAULT NULL,
  `vendorDeliveryType_Title` text DEFAULT NULL,
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
-- Tablo döküm verisi `requestform`
--

INSERT INTO `requestform` (`id`, `serverId`, `serverToken`, `codeNumber`, `reqCode`, `requestFormTitle`, `currency`, `description`, `currencyCartId`, `companyAuthorized_person`, `companyAuthorized_email`, `companyAuthorized_tel`, `companyAuthorized_person_tax_no`, `companyAuthorized_person_tax_adm`, `companyAuthorized_person_adress`, `public`, `public_username`, `public_pass`, `personeId`, `requestEffectiveDate`, `paymentMethod`, `paymentMethod_Title`, `paymentMethod_order`, `paymentMethod_load`, `paymentMethod_delivery`, `modeofTransport`, `modeofTransport_Title`, `shipmentType`, `shipmentType_title`, `intertek`, `intertek_Title`, `specialPermit`, `specialPermit_Title`, `requested_document`, `purchaseTime`, `purchaseAmount`, `purchaseAmountStockUnit`, `initialPurchaseAmount`, `initialPurchaseAmountStockUnit`, `initialPurchaseAmount_at`, `deliveryLocation`, `packagingType`, `reqSample`, `token`, `delivery_at`, `vendorDeliveryType`, `vendorDeliveryType_Title`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(59, 3, 'serverToken2', '011', 'TAF-05072023-011', 'Almanya Yapı Kimyasalı - 01', 'Dolar', 'Ürünleri ne kısa sürede alalım.', 23, 'Yalçın Bey', 'ifm_gmbh.mail@t-online.de', '+49209148185', '32121', 'Almanya', 'Almanya', 1, '123', '1234', '1', '2023-07-10', '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', NULL, NULL, NULL, '97', 'Karayolu', '117', 'Paket', '82', 'Hayır', NULL, NULL, 'Ce', 'TekSefer', '405', 'Adet', '405', 'Adet', '2023-07-31', 'Almanya', 'Paketler jelatinli ve NAylonlu olsun', '1 adet', NULL, '2023-07-31', '95', 'DAP - Yerinde Teslim', '2023-07-05 12:10:24', 1, 1, '2023-07-07 14:18:44', 1, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `requestform_product_list`
--

CREATE TABLE `requestform_product_list` (
  `id` int(11) NOT NULL,
  `serverId` int(11) DEFAULT NULL,
  `serverToken` text DEFAULT NULL,
  `requestform_id` int(11) DEFAULT NULL,
  `sector` text DEFAULT NULL,
  `sub_sector` int(11) DEFAULT NULL,
  `stock_id` text DEFAULT NULL,
  `nameTr` text DEFAULT NULL,
  `nameEn` text DEFAULT NULL,
  `imgUrl` text NOT NULL,
  `techFileUrl` text DEFAULT NULL,
  `stockUnit` text DEFAULT NULL,
  `stockCount` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `total` text DEFAULT NULL,
  `kdv_buy` text DEFAULT NULL,
  `kdv_sell` text DEFAULT NULL,
  `export_registered` text DEFAULT NULL,
  `export_registered_kdv_buy` text DEFAULT NULL,
  `export_registered_kdv_sell` text DEFAULT NULL,
  `descriptionTr` text DEFAULT NULL,
  `descriptionEn` text DEFAULT NULL,
  `featuresTr` text DEFAULT NULL,
  `featuresEn` text DEFAULT NULL,
  `tech_featuresTr` text DEFAULT NULL,
  `tech_featuresEn` text DEFAULT NULL,
  `web_address` text DEFAULT NULL,
  `catalogLink` text DEFAULT NULL,
  `brand` text DEFAULT NULL,
  `colorCode` text DEFAULT NULL,
  `is_warranty` text DEFAULT NULL,
  `warrantyTime` text DEFAULT NULL,
  `productModel` text DEFAULT NULL,
  `productCode` text DEFAULT NULL,
  `setup` text DEFAULT NULL,
  `gtipNo` text DEFAULT NULL,
  `productUsePurposeTR` text DEFAULT NULL,
  `productUsePurposeEN` text DEFAULT NULL,
  `ownBrand` text DEFAULT NULL,
  `specialDesign` text DEFAULT NULL,
  `specialPacket` text DEFAULT NULL,
  `salesOutlet` text DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sabit`
--

CREATE TABLE `sabit` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `name` text DEFAULT NULL,
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
-- Tablo döküm verisi `sabit`
--

INSERT INTO `sabit` (`id`, `serverId`, `serverToken`, `name`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(1, 3, 'serverToken2', 'Name 1', NULL, '2022-11-16 12:34:01', NULL, 0, NULL, NULL, 1, 0, NULL, NULL),
(2, 3, 'serverToken2', 'Name 2', NULL, '2022-11-16 12:37:15', NULL, 0, NULL, NULL, 1, 0, NULL, NULL),
(3, 3, 'serverToken2', 'Name 3', NULL, '2022-11-16 12:38:22', NULL, 0, NULL, NULL, 1, 0, NULL, NULL),
(4, 3, 'serverToken2', 'Name 4', NULL, '2022-11-16 13:44:31', NULL, 0, NULL, NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_code`
--

CREATE TABLE `site_code` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `stock_no` int(11) DEFAULT NULL,
  `current_no` int(11) DEFAULT NULL,
  `request` text DEFAULT NULL,
  `request_no` int(11) DEFAULT NULL,
  `get_offers` text DEFAULT NULL,
  `get_offers_no` int(11) DEFAULT NULL,
  `cost_calculation` text NOT NULL,
  `cost_calculation_no` int(11) NOT NULL,
  `proforma` text DEFAULT NULL,
  `proforma_no` int(11) DEFAULT NULL,
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
-- Tablo döküm verisi `site_code`
--

INSERT INTO `site_code` (`id`, `serverId`, `serverToken`, `stock_no`, `current_no`, `request`, `request_no`, `get_offers`, `get_offers_no`, `cost_calculation`, `cost_calculation_no`, `proforma`, `proforma_no`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(1, 3, 'serverToken2', 14, 21, 'TAF', 14, 'TEF', 41, 'MK', 32, 'IDT', 67, NULL, '2022-11-16 12:34:01', NULL, 0, NULL, NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `serverId` int(11) DEFAULT NULL,
  `serverToken` text DEFAULT NULL,
  `sector` text DEFAULT NULL,
  `sub_sector` int(11) DEFAULT NULL,
  `codeNumber` text DEFAULT NULL,
  `stockCode` text DEFAULT NULL,
  `accountingCode_buy` text DEFAULT NULL,
  `accountingCode_sel` text DEFAULT NULL,
  `nameTr` text DEFAULT NULL,
  `nameEn` text DEFAULT NULL,
  `imgUrl` text NOT NULL,
  `techFileUrl` text DEFAULT NULL,
  `stockUnit` text DEFAULT NULL,
  `stockCount` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `kdv_buy` text DEFAULT NULL,
  `kdv_sell` text DEFAULT NULL,
  `export_registered` text DEFAULT NULL,
  `export_registered_kdv_buy` text DEFAULT NULL,
  `export_registered_kdv_sell` text DEFAULT NULL,
  `descriptionTr` text DEFAULT NULL,
  `descriptionEn` text DEFAULT NULL,
  `featuresTr` text DEFAULT NULL,
  `featuresEn` text DEFAULT NULL,
  `tech_featuresTr` text DEFAULT NULL,
  `tech_featuresEn` text DEFAULT NULL,
  `web_address` text DEFAULT NULL,
  `catalogLink` text DEFAULT NULL,
  `gtipNo` text DEFAULT NULL,
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
-- Tablo döküm verisi `stock`
--

INSERT INTO `stock` (`id`, `serverId`, `serverToken`, `sector`, `sub_sector`, `codeNumber`, `stockCode`, `accountingCode_buy`, `accountingCode_sel`, `nameTr`, `nameEn`, `imgUrl`, `techFileUrl`, `stockUnit`, `stockCount`, `currency`, `price`, `kdv_buy`, `kdv_sell`, `export_registered`, `export_registered_kdv_buy`, `export_registered_kdv_sell`, `descriptionTr`, `descriptionEn`, `featuresTr`, `featuresEn`, `tech_featuresTr`, `tech_featuresEn`, `web_address`, `catalogLink`, `gtipNo`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(65, 3, 'serverToken2', '69', 36, '009', 'IN-YMS-009', '153.009', '610.009', 'Verox Acryl Based Liquis Membrane-Bericalam', 'Verox Acryl Based Liquis Membrane-Bericalam', '/assets/img/product/default.jpg', NULL, 'Ton', '10', 'TL', '68', '17', '18', 'true', '19', '20', 'Açıklama TR', 'Açıklama EN', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Ürün Web Sitesi', 'Katalog Linki', 'T53656565', NULL, '2023-07-05 12:17:52', 1, 1, '2023-07-08 13:18:53', NULL, 1, 0, NULL, NULL),
(66, 3, 'serverToken2', '69', 36, '010', 'IN-YMS-010', '153.010', '610.010', 'Verox BetonKontakt ( Pürüzsüz Yüzey Oluşturmak İçin Astar )', 'Verox BetonKontakt ( Primer for Creating an Exposed  Concere Surface )', '/assets/img/product/default.jpg', NULL, 'Adet', '12', 'DOLAR', '32', '11', '12', 'true', '13', '14', 'Açıklama TR', 'Açıklama EN', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Ürün Web Sitesi', 'Katalog Linki', 'Gıda Gtip nO', NULL, '2023-07-05 12:18:49', 1, 1, '2023-07-08 13:18:05', NULL, 1, 0, NULL, NULL),
(98, 3, 'serverToken2', '69', 36, '015', 'IN-YMS-015', '153.015', '610.015', 'Yeni Ürün', 'Verox Acryl Based Liquis Membrane-Bericalam', '/assets/img/product/default.jpg', NULL, 'Ton', '10', 'Euro', '68', '17', '18', 'true', '19', '20', 'Açıklama TR', 'Açıklama EN', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Ürün Web Sitesi', 'Katalog Linki', 'T53656565', NULL, '2023-07-09 22:15:08', 1, 0, NULL, NULL, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stockcompany`
--

CREATE TABLE `stockcompany` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `stock_id` int(11) NOT NULL,
  `current_cart_id` int(11) DEFAULT NULL,
  `current_row` int(11) NOT NULL,
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
-- Tablo döküm verisi `stockcompany`
--

INSERT INTO `stockcompany` (`id`, `serverId`, `serverToken`, `stock_id`, `current_cart_id`, `current_row`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(2, 3, 'serverToken2', 65, 24, 320, NULL, '2022-11-16 12:37:15', NULL, 0, NULL, NULL, 1, 0, NULL, NULL),
(3, 3, 'serverToken2', 66, 24, 320, NULL, '2022-11-16 12:38:22', NULL, 0, NULL, NULL, 1, 0, NULL, NULL),
(5, 3, 'serverToken2', 65, 37, 320, NULL, '2023-07-11 11:17:01', NULL, 1, '2023-07-11 13:27:55', 1, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `surname` text NOT NULL,
  `email` text NOT NULL,
  `value` text NOT NULL,
  `img_url` text NOT NULL,
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
-- Tablo döküm verisi `test`
--

INSERT INTO `test` (`id`, `serverId`, `serverToken`, `name`, `surname`, `email`, `value`, `img_url`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(1, 3, 'serverToken2', 'Name 1 x', 'Surname 1', 'test1@test.com.tr', '10', '/assets/img/user/user.jpg', NULL, '2022-11-16 12:34:01', 1, 1, '2023-03-29 07:31:45', NULL, 1, 0, NULL, NULL),
(2, 3, 'serverToken2', 'Name 2', 'Surname 2', 'test2@test.com.tr', '15', '/assets/img/user/user.jpg', NULL, '2022-11-16 12:37:15', 1, 0, NULL, NULL, 0, 0, NULL, NULL),
(3, 3, 'serverToken2', 'Name 3', 'Surname 3', 'test3@test.com.tr', '154', '/assets/img/user/user.jpg', NULL, '2022-11-16 12:38:22', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(4, 3, 'serverToken2', 'Name 4', 'Surname 4', 'test4@test.com.tr', '65', '/assets/img/user/user.jpg', NULL, '2022-11-16 13:44:31', 1, 1, '2023-03-29 13:40:14', 1, 0, 0, NULL, NULL),
(5, 3, 'serverToken2', 'Name 5', 'Surname 5', 'test5@test.com.tr', '564', '/assets/img/user/user.jpg', NULL, '2023-03-27 07:18:55', 1, 0, NULL, NULL, 0, 0, NULL, NULL),
(7, 3, 'serverToken2', 'sad', 'sad', 'sad', '0', '/assets/img/user/user.jpg', NULL, '2023-03-29 06:19:23', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(8, 3, 'serverToken2', 'Name 8', 'Surname 8', 'test8@test.com.tr', '324324', '/assets/img/user/user.jpg', NULL, '2023-03-29 07:08:02', 1, 1, '2023-03-29 06:24:05', 1, 1, 0, NULL, NULL),
(10, 3, 'serverToken2', 'Dneme', 'asd', 'asd', '342', '/assets/img/user/user.jpg', NULL, '2023-03-29 09:24:38', 1, 1, '2023-03-29 07:33:11', NULL, 1, 0, NULL, NULL),
(12, 3, 'serverToken2', 'sad', 'asd', 'asd', '324', '/assets/img/user/user.jpg', NULL, '2023-03-29 10:34:10', 1, 1, '2023-03-29 13:41:40', 1, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `surname` text NOT NULL,
  `email` text NOT NULL,
  `tel` text DEFAULT NULL,
  `password` text NOT NULL,
  `img_url` text NOT NULL,
  `dateofBirth` text DEFAULT NULL,
  `role` text NOT NULL,
  `departmanId` text DEFAULT NULL,
  `departman` text NOT NULL,
  `collection_status` text DEFAULT NULL,
  `time_experience` text DEFAULT NULL,
  `type_experience` text DEFAULT NULL,
  `token` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_byId` text DEFAULT NULL,
  `isUpdated` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_byId` text DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `isDeleted` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_byId` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `serverId`, `serverToken`, `name`, `surname`, `email`, `tel`, `password`, `img_url`, `dateofBirth`, `role`, `departmanId`, `departman`, `collection_status`, `time_experience`, `type_experience`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(1, 3, 'serverToken2', 'Ebu Enes', 'Yıldırım', 'user@gmail.com', '0551 022 02 02', '123', '/upload/uploads/1688736783.jpg', '1995-03-18', 'admin', 'YazılımUzmanı', 'Yazılım Uzmanı', 'Bilkent Üniversitesi - Kimya Mühendisi', '3', 'year', NULL, '2022-11-16 12:34:01', '0', 1, '2023-07-07 13:33:03', NULL, 1, 0, NULL, NULL),
(14, 3, 'serverToken2', 'Gökhan', 'Çalı', 'gokhan@interturk.com.tr', '0538 303 08 64', '321456', '/upload/uploads/1686830126.jpg', '1991-05-15', 'admin', 'ProjeYönetici', 'Proje Yönetici', NULL, NULL, NULL, NULL, '2023-06-03 08:07:26', '1', 1, '2023-06-15 11:55:27', NULL, 1, 0, NULL, NULL),
(15, 3, 'serverToken2', 'Adem', 'Kocaman', 'adem@interturk.com.tr', '0532 204 99 24', '123456', '/assets/img/user/default.jpg', NULL, 'admin', 'Yönetici', 'Yönetici', NULL, NULL, NULL, NULL, '2023-06-08 05:57:23', '14', 0, NULL, NULL, 1, 0, NULL, NULL),
(16, 3, 'serverToken2', 'Kerim', 'Sargın', 'kerim@interturk.com.tr', '0554 322 22 22', '123456', '/assets/img/user/default.jpg', '1900-08-01', 'admin', 'Yönetici', 'Yönetici', NULL, NULL, NULL, NULL, '2023-06-08 05:57:57', '14', 1, '2023-06-12 13:52:14', NULL, 1, 0, NULL, NULL),
(17, 3, 'serverToken2', 'Ceren', 'Özer', 'muhasebe@interturk.com.tr', '0545 325 95 90', '123456', '/assets/img/user/default.jpg', NULL, 'user', 'Muhasebe', 'Muhasebe', NULL, NULL, NULL, NULL, '2023-06-08 05:58:32', '14', 0, NULL, NULL, 1, 0, NULL, NULL),
(18, 3, 'serverToken2', 'Bade', 'Yurtseven', 'bade@interturk.com.tr', '0532 565 91 06', '123456', '/assets/img/user/default.jpg', NULL, 'user', 'DışTicaretYöneticisi', 'Dış Ticaret Yöneticisi', NULL, NULL, NULL, NULL, '2023-06-08 05:59:27', '14', 0, NULL, NULL, 1, 0, NULL, NULL),
(20, 3, 'serverToken2', 'Hilal', 'Çağlı', 'hilal@interturk.com.tr', '0553 320 94 46', '123456', '/assets/img/user/default.jpg', NULL, 'user', 'DışTicaretUzmanı', 'Dış Ticaret Uzmanı', NULL, NULL, NULL, NULL, '2023-06-08 06:01:08', '14', 0, NULL, NULL, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categorysub`
--
ALTER TABLE `categorysub`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cost_calculation_expense_list`
--
ALTER TABLE `cost_calculation_expense_list`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cost_calculation_fixed_expenses`
--
ALTER TABLE `cost_calculation_fixed_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cost_calculation_list`
--
ALTER TABLE `cost_calculation_list`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cost_calculation_product_list`
--
ALTER TABLE `cost_calculation_product_list`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `current_cart`
--
ALTER TABLE `current_cart`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `general_conditions`
--
ALTER TABLE `general_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `get_offers`
--
ALTER TABLE `get_offers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `get_offers_product_list`
--
ALTER TABLE `get_offers_product_list`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `proforma_bank_list`
--
ALTER TABLE `proforma_bank_list`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `proforma_conditions_list`
--
ALTER TABLE `proforma_conditions_list`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `proforma_invoice`
--
ALTER TABLE `proforma_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `proforma_product_list`
--
ALTER TABLE `proforma_product_list`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `requestform`
--
ALTER TABLE `requestform`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `requestform_product_list`
--
ALTER TABLE `requestform_product_list`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sabit`
--
ALTER TABLE `sabit`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `site_code`
--
ALTER TABLE `site_code`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `stockcompany`
--
ALTER TABLE `stockcompany`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- Tablo için AUTO_INCREMENT değeri `categorysub`
--
ALTER TABLE `categorysub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `cost_calculation_expense_list`
--
ALTER TABLE `cost_calculation_expense_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- Tablo için AUTO_INCREMENT değeri `cost_calculation_fixed_expenses`
--
ALTER TABLE `cost_calculation_fixed_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `cost_calculation_list`
--
ALTER TABLE `cost_calculation_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- Tablo için AUTO_INCREMENT değeri `cost_calculation_product_list`
--
ALTER TABLE `cost_calculation_product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- Tablo için AUTO_INCREMENT değeri `current_cart`
--
ALTER TABLE `current_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Tablo için AUTO_INCREMENT değeri `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- Tablo için AUTO_INCREMENT değeri `general_conditions`
--
ALTER TABLE `general_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `get_offers`
--
ALTER TABLE `get_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Tablo için AUTO_INCREMENT değeri `get_offers_product_list`
--
ALTER TABLE `get_offers_product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Tablo için AUTO_INCREMENT değeri `proforma_bank_list`
--
ALTER TABLE `proforma_bank_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- Tablo için AUTO_INCREMENT değeri `proforma_conditions_list`
--
ALTER TABLE `proforma_conditions_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- Tablo için AUTO_INCREMENT değeri `proforma_invoice`
--
ALTER TABLE `proforma_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Tablo için AUTO_INCREMENT değeri `proforma_product_list`
--
ALTER TABLE `proforma_product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- Tablo için AUTO_INCREMENT değeri `requestform`
--
ALTER TABLE `requestform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Tablo için AUTO_INCREMENT değeri `requestform_product_list`
--
ALTER TABLE `requestform_product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Tablo için AUTO_INCREMENT değeri `sabit`
--
ALTER TABLE `sabit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `site_code`
--
ALTER TABLE `site_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- Tablo için AUTO_INCREMENT değeri `stockcompany`
--
ALTER TABLE `stockcompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
