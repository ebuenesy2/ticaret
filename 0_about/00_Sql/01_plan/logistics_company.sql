-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 07 Tem 2023, 14:32:32
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
-- Tablo için tablo yapısı `logistics_company`
--

CREATE TABLE `logistics_company` (
  `id` int NOT NULL,
  `serverId` int NOT NULL DEFAULT '0',
  `serverToken` text COLLATE utf8mb4_general_ci,
  `name` text COLLATE utf8mb4_general_ci,
  `authorized_person` text COLLATE utf8mb4_general_ci NOT NULL,
  `authorized_person_tel` text COLLATE utf8mb4_general_ci NOT NULL,
  `country` text COLLATE utf8mb4_general_ci NOT NULL,
  `city` text COLLATE utf8mb4_general_ci NOT NULL,
  `district` text COLLATE utf8mb4_general_ci NOT NULL,
  `airline` text COLLATE utf8mb4_general_ci NOT NULL,
  `highway` text COLLATE utf8mb4_general_ci NOT NULL,
  `seaway` text COLLATE utf8mb4_general_ci NOT NULL,
  `railway` text COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
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
-- Tablo döküm verisi `logistics_company`
--

INSERT INTO `logistics_company` (`id`, `serverId`, `serverToken`, `name`, `authorized_person`, `authorized_person_tel`, `country`, `city`, `district`, `airline`, `highway`, `seaway`, `railway`, `address`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(1, 3, 'serverToken2', 'Name 1', 'Yetkili Kişi 1', 'Yetkili Kişi Tel 1', 'Ülke 1', 'Şehir 1', 'İlçe 1', 'false', 'true', 'false', 'true', 'Adres 1', NULL, '2022-11-16 12:34:01', NULL, 0, NULL, NULL, 1, 0, NULL, NULL),
(2, 3, 'serverToken2', 'Name 2', 'Yetkili Kişi 2', 'Yetkili Kişi Tel 2', 'Ülke 2', 'Şehir 2', 'İlçe 2', 'true', 'false', 'false', 'true', 'Adres 2', NULL, '2022-11-16 12:37:15', NULL, 0, NULL, NULL, 1, 0, NULL, NULL),
(3, 3, 'serverToken2', 'Name 3', 'Yetkili Kişi 3', 'Yetkili Kişi Tel 3', 'Ülke 3', 'Şehir 3', 'İlçe 3', 'false', 'true', 'true', 'false', 'Adres 3', NULL, '2022-11-16 12:38:22', NULL, 0, NULL, NULL, 1, 0, NULL, NULL),
(4, 3, 'serverToken2', 'Name 4', 'Yetkili Kişi 4', 'Yetkili Kişi Tel 4', 'Ülke 4', 'Şehir 4', 'İlçe 4', 'true', 'true', '0', 'true', 'Adres 4', NULL, '2022-11-16 13:44:31', NULL, 0, NULL, NULL, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `logistics_company`
--
ALTER TABLE `logistics_company`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `logistics_company`
--
ALTER TABLE `logistics_company`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
