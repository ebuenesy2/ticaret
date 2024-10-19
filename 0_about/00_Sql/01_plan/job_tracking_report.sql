-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 07 Tem 2023, 14:32:27
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
-- Tablo için tablo yapısı `job_tracking_report`
--

CREATE TABLE `job_tracking_report` (
  `id` int NOT NULL,
  `serverId` int NOT NULL DEFAULT '0',
  `serverToken` text COLLATE utf8mb4_general_ci,
  `name` text COLLATE utf8mb4_general_ci,
  `start_at` text COLLATE utf8mb4_general_ci NOT NULL,
  `customer_id` text COLLATE utf8mb4_general_ci NOT NULL,
  `personel_id` text COLLATE utf8mb4_general_ci NOT NULL,
  `product_info` text COLLATE utf8mb4_general_ci NOT NULL,
  `target_price` text COLLATE utf8mb4_general_ci NOT NULL,
  `currency` text COLLATE utf8mb4_general_ci NOT NULL,
  `todo` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` text COLLATE utf8mb4_general_ci NOT NULL,
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
-- Tablo döküm verisi `job_tracking_report`
--

INSERT INTO `job_tracking_report` (`id`, `serverId`, `serverToken`, `name`, `start_at`, `customer_id`, `personel_id`, `product_info`, `target_price`, `currency`, `todo`, `status`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(1, 3, 'serverToken2', 'Name 1', '19.04.2023', '1', '2', 'product_info 1', '150', 'Dolar', 'Neler Yapılması Gerekiyor', 'Son Durum', NULL, '2022-11-16 12:34:01', NULL, 0, NULL, NULL, 1, 0, NULL, NULL),
(2, 3, 'serverToken2', 'Name 2', '19.04.2023', '1', '2', 'product_info 2', '165', 'Euro', 'Neler Yapılması Gerekiyor', 'Son Durum', NULL, '2022-11-16 12:37:15', NULL, 0, NULL, NULL, 1, 0, NULL, NULL),
(3, 3, 'serverToken2', 'Name 3', '19.04.2023', '1', '2', 'product_info 3', '175', 'Euro', 'Neler Yapılması Gerekiyor', 'Son Durum', NULL, '2022-11-16 12:38:22', NULL, 0, NULL, NULL, 1, 0, NULL, NULL),
(4, 3, 'serverToken2', 'Name 4', '19.04.2023', '1', '2', 'product_info 4', '765', 'Dolar', 'Neler Yapılması Gerekiyor', 'Son Durum', NULL, '2022-11-16 13:44:31', NULL, 0, NULL, NULL, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `job_tracking_report`
--
ALTER TABLE `job_tracking_report`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `job_tracking_report`
--
ALTER TABLE `job_tracking_report`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
