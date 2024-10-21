-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:33:45
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
-- Tablo için tablo yapısı `cost_calculation_fixed_expenses`
--

CREATE TABLE `cost_calculation_fixed_expenses` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
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
-- Tablo döküm verisi `cost_calculation_fixed_expenses`
--

INSERT INTO `cost_calculation_fixed_expenses` (`id`, `serverId`, `serverToken`, `type`, `category_id`, `title`, `description`, `price`, `currency`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(25, 3, 'serverToken2', 'SektorStok', 60, 'Personel Gideri', 'Personel Gideri', '35', 'Euro', NULL, '2023-06-19 13:11:07', 1, 1, '2024-10-19 11:45:14', 1, 1, 0, NULL, NULL),
(26, 3, 'serverToken2', 'ÖdemeŞekli', 100, 'Pesin Gider', 'Pesin Gider Açıklaması', '17,52', 'Euro', NULL, '2023-06-19 13:12:13', 1, 1, '2023-06-19 13:12:56', 1, 1, 0, NULL, NULL),
(27, 3, 'serverToken2', 'TeslimŞekli', 90, 'FCA', 'FCA', '65', 'Euro', NULL, '2023-06-19 13:15:04', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(29, 3, 'serverToken2', 'TeslimŞekli', 95, 'Dap Gİderleri', 'Acıklaması', '150', 'Euro', NULL, '2024-10-19 18:30:39', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(33, 3, 'serverToken2', 'SektorStok', 127, 'Deneme', 'Acıklama', '150', 'Euro', NULL, '2024-10-19 19:03:19', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(35, 3, 'serverToken2', 'SektorStok', 60, 'Deneme x', 'Acıklama', '10', 'Euro', NULL, '2024-10-19 19:13:46', 1, 1, '2024-10-19 19:37:05', 1, 1, 0, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
