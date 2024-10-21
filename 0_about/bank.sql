-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:33:24
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
-- Tablo için tablo yapısı `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `currencyCartId` int(11) DEFAULT NULL,
  `bankaAccountTitle` text DEFAULT NULL,
  `bankTitle` text DEFAULT NULL,
  `branch` text DEFAULT NULL,
  `accountNumber` text DEFAULT NULL,
  `iban` text DEFAULT NULL,
  `swift` text DEFAULT NULL,
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
-- Tablo döküm verisi `bank`
--

INSERT INTO `bank` (`id`, `serverId`, `serverToken`, `currencyCartId`, `bankaAccountTitle`, `bankTitle`, `branch`, `accountNumber`, `iban`, `swift`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(30, 3, 'serverToken2', 24, 'Banka Hesap', 'Banka', 'Şube', 'Hesap Numarası', 'Iban', 'Swift', NULL, '2024-10-19 20:15:59', 1, 1, '2024-10-19 20:28:13', 1, 1, 0, NULL, NULL),
(32, 3, 'serverToken2', 27, 'Banka Hesap', 'Banka', 'Şube', 'Hesap Numarası', 'iban', 'swift', NULL, '2024-10-19 20:24:08', 1, 1, '2024-10-20 10:27:51', 1, 1, 0, NULL, NULL),
(34, 3, 'serverToken2', 40, 'Banka Hesap x x', 'Banka', 'Şube', 'Hesap Numarası', 'Iban', 'Swift', NULL, '2024-10-20 10:34:13', 1, 1, '2024-10-20 10:47:45', 1, 1, 0, NULL, NULL),
(35, 3, 'serverToken2', 40, 'Banka Hesap Adı', 'Banka', 'Şube', 'Hesap Numarası', 'Iban x', NULL, NULL, '2024-10-20 10:44:38', 1, 1, '2024-10-20 10:47:56', 1, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
