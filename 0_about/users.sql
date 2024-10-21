-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:35:40
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
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `surname` text NOT NULL,
  `email` text NOT NULL,
  `tel` text DEFAULT NULL,
  `password` text NOT NULL,
  `img_url` text NOT NULL,
  `dateofBirth` text DEFAULT NULL,
  `role` text NOT NULL,
  `departmanId` text DEFAULT NULL,
  `departman` text NOT NULL,
  `collection_status` text DEFAULT NULL,
  `time_experience` text DEFAULT NULL,
  `type_experience` text DEFAULT NULL,
  `token` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_byId` text DEFAULT NULL,
  `isUpdated` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_byId` text DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `isDeleted` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_byId` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `serverId`, `serverToken`, `name`, `surname`, `email`, `tel`, `password`, `img_url`, `dateofBirth`, `role`, `departmanId`, `departman`, `collection_status`, `time_experience`, `type_experience`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(1, 3, 'serverToken2', 'Ebu Enes', 'Yıldırım', 'user@gmail.com', '0551 022 02 02', '123', '/upload/uploads/1729374377.jpg', '1995-03-18', 'admin', 'YazılımUzmanı', 'Yazılım Uzmanı', 'Bilkent Üniversitesi - Kimya Mühendisi', '3', 'year', NULL, '2022-11-16 12:34:01', '0', 1, '2024-10-19 21:47:12', NULL, 1, 0, NULL, NULL),
(15, 3, 'serverToken2', 'Adem', 'Kocaman', 'adem@interturk.com.tr', '0532 204 99 24', '123456', '/assets/img/user/default.jpg', NULL, 'admin', 'Yönetici', 'Yönetici', NULL, NULL, NULL, NULL, '2023-06-08 05:57:23', '14', 0, NULL, NULL, 1, 0, NULL, NULL),
(16, 3, 'serverToken2', 'Kerim', 'Sargın', 'kerim@interturk.com.tr', '0554 322 22 22', '123456', '/assets/img/user/default.jpg', '1900-08-01', 'admin', 'Yönetici', 'Yönetici', NULL, NULL, NULL, NULL, '2023-06-08 05:57:57', '14', 1, '2023-06-12 13:52:14', NULL, 1, 0, NULL, NULL),
(17, 3, 'serverToken2', 'Ceren', 'Özer', 'muhasebe@interturk.com.tr', '0545 325 95 90', '123456', '/assets/img/user/default.jpg', NULL, 'user', 'Muhasebe', 'Muhasebe', NULL, NULL, NULL, NULL, '2023-06-08 05:58:32', '14', 0, NULL, NULL, 1, 0, NULL, NULL),
(18, 3, 'serverToken2', 'Bade', 'Yurtseven', 'bade@interturk.com.tr', '0532 565 91 06', '123456', '/upload/uploads/1729421636.jpg', NULL, 'user', 'DışTicaretYöneticisi', 'Dış Ticaret Yöneticisi', NULL, NULL, NULL, NULL, '2023-06-08 05:59:27', '14', 1, '2024-10-20 10:53:56', NULL, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
