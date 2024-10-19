-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 11 Tem 2023, 14:28:32
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
-- Tablo için tablo yapısı `stockcompany`
--

CREATE TABLE `stockcompany` (
  `id` int NOT NULL,
  `serverId` int NOT NULL DEFAULT '0',
  `serverToken` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `stock_id` int NOT NULL,
  `current_cart_id` int DEFAULT NULL,
  `current_row` int NOT NULL,
  `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
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
-- Tablo döküm verisi `stockcompany`
--

INSERT INTO `stockcompany` (`id`, `serverId`, `serverToken`, `stock_id`, `current_cart_id`, `current_row`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(2, 3, 'serverToken2', 65, 24, 320, NULL, '2022-11-16 12:37:15', NULL, 0, NULL, NULL, 1, 0, NULL, NULL),
(3, 3, 'serverToken2', 66, 24, 320, NULL, '2022-11-16 12:38:22', NULL, 0, NULL, NULL, 1, 0, NULL, NULL),
(5, 3, 'serverToken2', 65, 37, 320, NULL, '2023-07-11 11:17:01', NULL, 1, '2023-07-11 13:27:55', 1, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `stockcompany`
--
ALTER TABLE `stockcompany`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `stockcompany`
--
ALTER TABLE `stockcompany`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
