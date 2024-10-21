-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:33:34
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
(36, 3, 'serverToken2', '69', 'Yapı Malzemeleri', 'Construction Materials', 'YMS', '104', NULL, '2023-07-05 12:13:50', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(42, 3, 'serverToken2', '60', 'Ahşap', 'Ahşap En', 'Ahp', '1', NULL, '2024-10-19 18:16:21', 1, 1, '2024-10-19 18:17:56', 1, 1, 0, NULL, NULL),
(43, 3, 'serverToken2', '130', 'Cari A', 'Cari A En', 'CRA', '1', NULL, '2024-10-20 23:28:31', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(44, 3, 'serverToken2', '130', 'Cari C', 'Cari C En', 'CRC', '3', NULL, '2024-10-20 23:28:53', 1, 1, '2024-10-20 23:29:45', 1, 1, 0, NULL, NULL),
(45, 3, 'serverToken2', '130', 'Cari B', 'Cari B EN', 'CRB', '2', NULL, '2024-10-20 23:29:34', 1, 1, '2024-10-20 23:31:27', 1, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categorysub`
--
ALTER TABLE `categorysub`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categorysub`
--
ALTER TABLE `categorysub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
