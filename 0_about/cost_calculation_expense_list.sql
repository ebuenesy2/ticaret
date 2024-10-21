-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:33:40
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
(280, 3, 'serverToken2', '1688978931', 0, 'Deneme', 'Açıklama', '65', NULL, '2023-07-10 08:54:16', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(281, 3, 'serverToken2', '1729350548', 0, 'Pesin Gider', 'Pesin Gider Açıklaması', '17,52', NULL, '2024-10-19 15:09:08', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(282, 3, 'serverToken2', '1729350802', 0, 'Pesin Gider', 'Pesin Gider Açıklaması', '17,52', NULL, '2024-10-19 15:13:22', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(283, 3, 'serverToken2', '1729422082', 0, 'Pesin Gider', 'Pesin Gider Açıklaması', '17,52', NULL, '2024-10-20 11:01:22', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(284, 3, 'serverToken2', '1729422082', 0, 'Dap Gİderleri', 'Acıklaması', '150', NULL, '2024-10-20 11:01:22', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(285, 3, 'serverToken2', '1729478658', 0, 'Pesin Gider', 'Pesin Gider Açıklaması', '17,52', NULL, '2024-10-21 02:44:18', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(286, 3, 'serverToken2', '1729478658', 0, 'Maliyet Kalemi', 'Maliyet Kalemi Açıklaması', '65', NULL, '2024-10-21 02:46:41', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(287, 3, 'serverToken2', '1729481788', 0, 'Pesin Gider', 'Pesin Gider Açıklaması', '17,52', NULL, '2024-10-21 03:36:28', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(288, 3, 'serverToken2', '1729483273', 0, 'Pesin Gider', 'Pesin Gider Açıklaması', '17,52', NULL, '2024-10-21 04:01:13', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
