-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:34:23
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
-- Tablo için tablo yapısı `general_conditions`
--

CREATE TABLE `general_conditions` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `type` text DEFAULT NULL,
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

INSERT INTO `general_conditions` (`id`, `serverId`, `serverToken`, `type`, `title`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(23, 3, 'serverToken2', 'Genel', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-06-13 09:01:02', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(27, 3, 'serverToken2', 'Genel', 'Genel Şartlar', NULL, '2024-10-19 20:46:06', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(28, 3, 'serverToken2', 'Genel', 'Deneme', NULL, '2024-10-19 20:50:59', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(29, 3, 'serverToken2', 'OzelSart', 'Özel Şartlar x', NULL, '2024-10-19 20:52:09', 1, 1, '2024-10-19 21:19:35', 1, 1, 0, NULL, NULL),
(30, 3, 'serverToken2', 'Genel', 'DENEMEX', NULL, '2024-10-19 21:19:59', 1, 1, '2024-10-19 21:36:01', 1, 0, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `general_conditions`
--
ALTER TABLE `general_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `general_conditions`
--
ALTER TABLE `general_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
