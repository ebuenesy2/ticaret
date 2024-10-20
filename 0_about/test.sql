-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:35:36
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
-- Tablo için tablo yapısı `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `surname` text NOT NULL,
  `email` text NOT NULL,
  `value` text NOT NULL,
  `img_url` text NOT NULL,
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
-- Tablo döküm verisi `test`
--

INSERT INTO `test` (`id`, `serverId`, `serverToken`, `name`, `surname`, `email`, `value`, `img_url`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(1, 3, 'serverToken2', 'Name 1 x', 'Surname 1', 'test1@test.com.tr', '10', '/assets/img/user/user.jpg', NULL, '2022-11-16 12:34:01', 1, 1, '2023-03-29 07:31:45', NULL, 1, 0, NULL, NULL),
(2, 3, 'serverToken2', 'Name 2', 'Surname 2', 'test2@test.com.tr', '15', '/assets/img/user/user.jpg', NULL, '2022-11-16 12:37:15', 1, 0, NULL, NULL, 0, 0, NULL, NULL),
(3, 3, 'serverToken2', 'Name 3', 'Surname 3', 'test3@test.com.tr', '154', '/assets/img/user/user.jpg', NULL, '2022-11-16 12:38:22', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(4, 3, 'serverToken2', 'Name 4', 'Surname 4', 'test4@test.com.tr', '65', '/assets/img/user/user.jpg', NULL, '2022-11-16 13:44:31', 1, 1, '2023-03-29 13:40:14', 1, 0, 0, NULL, NULL),
(5, 3, 'serverToken2', 'Name 5', 'Surname 5', 'test5@test.com.tr', '564', '/assets/img/user/user.jpg', NULL, '2023-03-27 07:18:55', 1, 0, NULL, NULL, 0, 0, NULL, NULL),
(7, 3, 'serverToken2', 'sad', 'sad', 'sad', '0', '/assets/img/user/user.jpg', NULL, '2023-03-29 06:19:23', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(8, 3, 'serverToken2', 'Name 8', 'Surname 8', 'test8@test.com.tr', '324324', '/assets/img/user/user.jpg', NULL, '2023-03-29 07:08:02', 1, 1, '2023-03-29 06:24:05', 1, 1, 0, NULL, NULL),
(10, 3, 'serverToken2', 'Dneme', 'asd', 'asd', '342', '/assets/img/user/user.jpg', NULL, '2023-03-29 09:24:38', 1, 1, '2023-03-29 07:33:11', NULL, 1, 0, NULL, NULL),
(12, 3, 'serverToken2', 'sad', 'asd', 'asd', '324', '/assets/img/user/user.jpg', NULL, '2023-03-29 10:34:10', 1, 1, '2023-03-29 13:41:40', 1, 0, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
