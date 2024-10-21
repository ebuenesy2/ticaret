-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:34:42
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
-- Tablo için tablo yapısı `proforma_conditions_list`
--

CREATE TABLE `proforma_conditions_list` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `proforma_id` text DEFAULT NULL,
  `isGeneral` text DEFAULT NULL,
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
-- Tablo döküm verisi `proforma_conditions_list`
--

INSERT INTO `proforma_conditions_list` (`id`, `serverId`, `serverToken`, `time`, `proforma_id`, `isGeneral`, `title`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(82, 3, 'serverToken2', 1687524250, '50', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-06-23 12:44:10', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(83, 3, 'serverToken2', 1687524250, '50', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-06-23 12:44:10', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(84, 3, 'serverToken2', 1687525073, NULL, '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-06-23 12:57:53', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(85, 3, 'serverToken2', 1687525073, NULL, '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-06-23 12:57:53', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(86, 3, 'serverToken2', 1687525205, NULL, '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-06-23 13:00:05', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(87, 3, 'serverToken2', 1687525205, NULL, '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-06-23 13:00:05', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(88, 3, 'serverToken2', 1687525329, NULL, '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-06-23 13:02:09', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(89, 3, 'serverToken2', 1687525329, NULL, '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-06-23 13:02:09', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(90, 3, 'serverToken2', 1687525375, '54', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-06-23 13:02:55', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(91, 3, 'serverToken2', 1687525375, '54', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-06-23 13:02:55', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(92, 3, 'serverToken2', NULL, '54', '0', 'Özel Şart 2 Güncelle', NULL, '2023-06-23 13:03:51', 1, 1, '2023-06-23 13:04:14', 1, 1, 0, NULL, NULL),
(94, 3, 'serverToken2', 1687527146, '55', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-06-23 13:32:26', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(95, 3, 'serverToken2', 1687527146, '55', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-06-23 13:32:26', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(96, 3, 'serverToken2', NULL, '55', '0', 'Özel Şart', NULL, '2023-06-26 06:07:55', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(97, 3, 'serverToken2', 1688557311, '56', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-07-05 11:41:51', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(98, 3, 'serverToken2', 1688557311, '56', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-07-05 11:41:51', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(99, 3, 'serverToken2', 1688562960, '57', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-07-05 13:16:00', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(100, 3, 'serverToken2', 1688562960, '57', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-07-05 13:16:00', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(101, 3, 'serverToken2', 1688567581, '58', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-07-05 14:33:01', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(102, 3, 'serverToken2', 1688567581, '58', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-07-05 14:33:01', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(103, 3, 'serverToken2', 1688568335, '59', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-07-05 14:45:35', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(104, 3, 'serverToken2', 1688568335, '59', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-07-05 14:45:35', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(105, 3, 'serverToken2', 1688568456, '60', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-07-05 14:47:36', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(106, 3, 'serverToken2', 1688568456, '60', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-07-05 14:47:36', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(107, 3, 'serverToken2', 1688983371, '61', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-07-10 10:02:51', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(108, 3, 'serverToken2', 1688983371, '61', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-07-10 10:02:51', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(109, 3, 'serverToken2', 1688985749, NULL, '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-07-10 10:42:29', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(110, 3, 'serverToken2', 1688985749, NULL, '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-07-10 10:42:29', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(111, 3, 'serverToken2', 1688985823, '63', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2023-07-10 10:43:43', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(112, 3, 'serverToken2', 1688985823, '63', '1', 'Sipariş ödeme geldikten sonra verilir.', NULL, '2023-07-10 10:43:43', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(113, 3, 'serverToken2', NULL, '63', '0', 'Özel Şart1', NULL, '2023-07-10 21:19:37', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(114, 3, 'serverToken2', 1729479092, '64', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2024-10-21 02:51:32', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(115, 3, 'serverToken2', 1729479092, '64', '1', 'Genel Şartlar', NULL, '2024-10-21 02:51:32', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(116, 3, 'serverToken2', 1729479092, '64', '1', 'Deneme', NULL, '2024-10-21 02:51:33', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(117, 3, 'serverToken2', 1729479092, '64', '0', 'Özel Şartlar x', NULL, '2024-10-21 02:51:33', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(118, 3, 'serverToken2', 1729479092, '64', '1', 'DENEMEX', NULL, '2024-10-21 02:51:33', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(119, 3, 'serverToken2', 1729479851, '65', '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2024-10-21 03:04:11', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(120, 3, 'serverToken2', 1729479851, '65', '1', 'Genel Şartlar', NULL, '2024-10-21 03:04:11', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(121, 3, 'serverToken2', 1729479851, '65', '1', 'Deneme', NULL, '2024-10-21 03:04:11', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(122, 3, 'serverToken2', 1729479851, '65', '0', 'Özel Şartlar x', NULL, '2024-10-21 03:04:11', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(123, 3, 'serverToken2', 1729479851, '65', '1', 'DENEMEX', NULL, '2024-10-21 03:04:11', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(125, 3, 'serverToken2', 1729484380, NULL, '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2024-10-21 04:19:40', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(126, 3, 'serverToken2', 1729484380, NULL, '1', 'Genel Şartlar', NULL, '2024-10-21 04:19:40', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(127, 3, 'serverToken2', 1729484380, NULL, '1', 'Deneme', NULL, '2024-10-21 04:19:40', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(128, 3, 'serverToken2', 1729484380, NULL, '0', 'Özel Şartlar x', NULL, '2024-10-21 04:19:40', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(129, 3, 'serverToken2', 1729484380, NULL, '1', 'DENEMEX', NULL, '2024-10-21 04:19:40', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(130, 3, 'serverToken2', 1729484399, NULL, '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2024-10-21 04:19:59', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(131, 3, 'serverToken2', 1729484399, NULL, '1', 'Genel Şartlar', NULL, '2024-10-21 04:19:59', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(132, 3, 'serverToken2', 1729484399, NULL, '1', 'Deneme', NULL, '2024-10-21 04:19:59', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(133, 3, 'serverToken2', 1729484399, NULL, '0', 'Özel Şartlar x', NULL, '2024-10-21 04:19:59', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(134, 3, 'serverToken2', 1729484399, NULL, '1', 'DENEMEX', NULL, '2024-10-21 04:19:59', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(135, 3, 'serverToken2', 1729484415, NULL, '1', 'Personel giderleri maliyete eklenmiştir.', NULL, '2024-10-21 04:20:15', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(136, 3, 'serverToken2', 1729484415, NULL, '1', 'Genel Şartlar', NULL, '2024-10-21 04:20:15', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(137, 3, 'serverToken2', 1729484415, NULL, '1', 'Deneme', NULL, '2024-10-21 04:20:15', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(138, 3, 'serverToken2', 1729484415, NULL, '0', 'Özel Şartlar x', NULL, '2024-10-21 04:20:15', 0, 0, NULL, NULL, 1, 0, NULL, NULL),
(139, 3, 'serverToken2', 1729484415, NULL, '1', 'DENEMEX', NULL, '2024-10-21 04:20:15', 0, 0, NULL, NULL, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `proforma_conditions_list`
--
ALTER TABLE `proforma_conditions_list`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `proforma_conditions_list`
--
ALTER TABLE `proforma_conditions_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
