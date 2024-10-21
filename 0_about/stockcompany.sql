-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:35:30
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
(5, 3, 'serverToken2', 99, 37, 320, NULL, '2023-07-11 11:17:01', NULL, 1, '2024-10-19 10:36:31', 1, 1, 0, NULL, NULL),
(7, 3, 'serverToken2', 65, 37, 120, NULL, '2024-10-19 10:36:51', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(8, 3, 'serverToken2', 101, 23, 120, NULL, '2024-10-19 12:04:38', 1, 1, '2024-10-19 12:04:49', 1, 1, 0, NULL, NULL),
(9, 3, 'serverToken2', 101, 24, 120, NULL, '2024-10-19 12:05:03', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(10, 3, 'serverToken2', 105, 23, 120, NULL, '2024-10-20 08:28:05', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(11, 3, 'serverToken2', 105, 23, 320, NULL, '2024-10-20 08:28:23', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(12, 3, 'serverToken2', 105, 23, 121, NULL, '2024-10-20 08:28:37', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(13, 3, 'serverToken2', 105, 24, 120, NULL, '2024-10-20 08:29:04', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(14, 3, 'serverToken2', 105, 24, 320, NULL, '2024-10-20 08:29:27', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(15, 3, 'serverToken2', 105, 27, 120, NULL, '2024-10-20 08:30:45', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
