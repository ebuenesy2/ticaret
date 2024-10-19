-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 11 Tem 2023, 14:26:27
-- Sunucu sürümü: 8.0.30
-- PHP Sürümü: 8.1.10

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
  `id` int NOT NULL,
  `serverId` int NOT NULL DEFAULT '0',
  `serverToken` text COLLATE utf8mb4_general_ci,
  `currencyCartId` int DEFAULT NULL,
  `bankaAccountTitle` text COLLATE utf8mb4_general_ci,
  `bankTitle` text COLLATE utf8mb4_general_ci,
  `branch` text COLLATE utf8mb4_general_ci,
  `accountNumber` text COLLATE utf8mb4_general_ci,
  `iban` text COLLATE utf8mb4_general_ci,
  `swift` text COLLATE utf8mb4_general_ci,
  `token` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_byId` int DEFAULT NULL,
  `isUpdated` int NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_byId` int DEFAULT NULL,
  `isActive` int NOT NULL DEFAULT '1',
  `isDeleted` int NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_byId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(26, 3, 'serverToken2', 18, 'ABC BİLİŞİM A.Ş.', 'AkBank', 'Merkez', '3242342 23424353', 'TR34 0000 0000 003242342 23424353', 'AKXIISSDD', NULL, '2023-06-12 18:48:10', 14, 0, NULL, NULL, 1, 0, NULL, NULL),
(27, 3, 'serverToken2', 37, 'Banka Hesap Adı', 'Banka', 'Şube', 'Hesap Numarası', 'iban', 'swift', NULL, '2023-07-11 10:20:17', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
