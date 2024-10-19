-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 11 Tem 2023, 14:27:01
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
-- Tablo için tablo yapısı `cost_calculation_fixed_expenses`
--

CREATE TABLE `cost_calculation_fixed_expenses` (
  `id` int NOT NULL,
  `serverId` int NOT NULL DEFAULT '0',
  `serverToken` text COLLATE utf8mb4_general_ci,
  `type` text COLLATE utf8mb4_general_ci,
  `category_id` int NOT NULL,
  `title` text COLLATE utf8mb4_general_ci,
  `description` text COLLATE utf8mb4_general_ci,
  `price` text COLLATE utf8mb4_general_ci,
  `currency` text COLLATE utf8mb4_general_ci,
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
-- Tablo döküm verisi `cost_calculation_fixed_expenses`
--

INSERT INTO `cost_calculation_fixed_expenses` (`id`, `serverId`, `serverToken`, `type`, `category_id`, `title`, `description`, `price`, `currency`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(25, 3, 'serverToken2', 'Genel', 102, 'Personel Gideri', 'Personel Gideri', '12', 'Euro', NULL, '2023-06-19 13:11:07', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(26, 3, 'serverToken2', 'ÖdemeŞekli', 100, 'Pesin Gider', 'Pesin Gider Açıklaması', '17,52', 'Euro', NULL, '2023-06-19 13:12:13', 1, 1, '2023-06-19 13:12:56', 1, 1, 0, NULL, NULL),
(27, 3, 'serverToken2', 'TeslimŞekli', 90, 'FCA', 'FCA', '65', 'Euro', NULL, '2023-06-19 13:15:04', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cost_calculation_fixed_expenses`
--
ALTER TABLE `cost_calculation_fixed_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `cost_calculation_fixed_expenses`
--
ALTER TABLE `cost_calculation_fixed_expenses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
