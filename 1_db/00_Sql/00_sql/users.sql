-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 11 Tem 2023, 14:28:40
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
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `serverId` int NOT NULL DEFAULT '0',
  `serverToken` text COLLATE utf8mb4_general_ci,
  `name` text COLLATE utf8mb4_general_ci,
  `surname` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `tel` text COLLATE utf8mb4_general_ci,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `img_url` text COLLATE utf8mb4_general_ci NOT NULL,
  `dateofBirth` text COLLATE utf8mb4_general_ci,
  `role` text COLLATE utf8mb4_general_ci NOT NULL,
  `departmanId` text COLLATE utf8mb4_general_ci,
  `departman` text COLLATE utf8mb4_general_ci NOT NULL,
  `collection_status` text COLLATE utf8mb4_general_ci,
  `time_experience` text COLLATE utf8mb4_general_ci,
  `type_experience` text COLLATE utf8mb4_general_ci,
  `token` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_byId` text COLLATE utf8mb4_general_ci,
  `isUpdated` int NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_byId` text COLLATE utf8mb4_general_ci,
  `isActive` int NOT NULL DEFAULT '1',
  `isDeleted` int NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_byId` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `serverId`, `serverToken`, `name`, `surname`, `email`, `tel`, `password`, `img_url`, `dateofBirth`, `role`, `departmanId`, `departman`, `collection_status`, `time_experience`, `type_experience`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(1, 3, 'serverToken2', 'Ebu Enes', 'Yıldırım', 'user@gmail.com', '0551 022 02 02', '123', '/upload/uploads/1688736783.jpg', '1995-03-18', 'admin', 'YazılımUzmanı', 'Yazılım Uzmanı', 'Bilkent Üniversitesi - Kimya Mühendisi', '3', 'year', NULL, '2022-11-16 12:34:01', '0', 1, '2023-07-07 13:33:03', NULL, 1, 0, NULL, NULL),
(14, 3, 'serverToken2', 'Gökhan', 'Çalı', 'gokhan@interturk.com.tr', '0538 303 08 64', '321456', '/upload/uploads/1686830126.jpg', '1991-05-15', 'admin', 'ProjeYönetici', 'Proje Yönetici', NULL, NULL, NULL, NULL, '2023-06-03 08:07:26', '1', 1, '2023-06-15 11:55:27', NULL, 1, 0, NULL, NULL),
(15, 3, 'serverToken2', 'Adem', 'Kocaman', 'adem@interturk.com.tr', '0532 204 99 24', '123456', '/assets/img/user/default.jpg', NULL, 'admin', 'Yönetici', 'Yönetici', NULL, NULL, NULL, NULL, '2023-06-08 05:57:23', '14', 0, NULL, NULL, 1, 0, NULL, NULL),
(16, 3, 'serverToken2', 'Kerim', 'Sargın', 'kerim@interturk.com.tr', '0554 322 22 22', '123456', '/assets/img/user/default.jpg', '1900-08-01', 'admin', 'Yönetici', 'Yönetici', NULL, NULL, NULL, NULL, '2023-06-08 05:57:57', '14', 1, '2023-06-12 13:52:14', NULL, 1, 0, NULL, NULL),
(17, 3, 'serverToken2', 'Ceren', 'Özer', 'muhasebe@interturk.com.tr', '0545 325 95 90', '123456', '/assets/img/user/default.jpg', NULL, 'user', 'Muhasebe', 'Muhasebe', NULL, NULL, NULL, NULL, '2023-06-08 05:58:32', '14', 0, NULL, NULL, 1, 0, NULL, NULL),
(18, 3, 'serverToken2', 'Bade', 'Yurtseven', 'bade@interturk.com.tr', '0532 565 91 06', '123456', '/assets/img/user/default.jpg', NULL, 'user', 'DışTicaretYöneticisi', 'Dış Ticaret Yöneticisi', NULL, NULL, NULL, NULL, '2023-06-08 05:59:27', '14', 0, NULL, NULL, 1, 0, NULL, NULL),
(20, 3, 'serverToken2', 'Hilal', 'Çağlı', 'hilal@interturk.com.tr', '0553 320 94 46', '123456', '/assets/img/user/default.jpg', NULL, 'user', 'DışTicaretUzmanı', 'Dış Ticaret Uzmanı', NULL, NULL, NULL, NULL, '2023-06-08 06:01:08', '14', 1, '2023-07-11 13:54:14', '1', 0, 0, NULL, NULL);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
