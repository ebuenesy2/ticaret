-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 11 Tem 2023, 14:26:55
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
-- Tablo için tablo yapısı `cost_calculation_expense_list`
--

CREATE TABLE `cost_calculation_expense_list` (
  `id` int NOT NULL,
  `serverId` int NOT NULL DEFAULT '0',
  `serverToken` text COLLATE utf8mb4_general_ci,
  `time` text COLLATE utf8mb4_general_ci,
  `const` int DEFAULT NULL,
  `title` text COLLATE utf8mb4_general_ci,
  `description` text COLLATE utf8mb4_general_ci,
  `price` text COLLATE utf8mb4_general_ci,
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

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cost_calculation_expense_list`
--
ALTER TABLE `cost_calculation_expense_list`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `cost_calculation_expense_list`
--
ALTER TABLE `cost_calculation_expense_list`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
