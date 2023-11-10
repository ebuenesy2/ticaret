-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 11 Tem 2023, 14:27:14
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
-- Tablo için tablo yapısı `current_cart`
--

CREATE TABLE `current_cart` (
  `id` int NOT NULL,
  `serverId` int NOT NULL DEFAULT '0',
  `serverToken` text COLLATE utf8mb4_general_ci,
  `current_row` text COLLATE utf8mb4_general_ci,
  `sectoral_type` text COLLATE utf8mb4_general_ci,
  `codeNumber` text COLLATE utf8mb4_general_ci,
  `current_code` text COLLATE utf8mb4_general_ci,
  `sectoral_code` int DEFAULT NULL,
  `current_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `short_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `currency` text COLLATE utf8mb4_general_ci NOT NULL,
  `authorized_person` text COLLATE utf8mb4_general_ci,
  `authorized_person_role` text COLLATE utf8mb4_general_ci,
  `authorized_person_tel` text COLLATE utf8mb4_general_ci,
  `authorized_person_whatsap` text COLLATE utf8mb4_general_ci,
  `authorized_person_mail` text COLLATE utf8mb4_general_ci,
  `ref_person` text COLLATE utf8mb4_general_ci,
  `ref_departman` text COLLATE utf8mb4_general_ci,
  `ref_phone` text COLLATE utf8mb4_general_ci,
  `ref_email` text COLLATE utf8mb4_general_ci,
  `address` text COLLATE utf8mb4_general_ci,
  `billing_address` text COLLATE utf8mb4_general_ci,
  `country` text COLLATE utf8mb4_general_ci,
  `city` text COLLATE utf8mb4_general_ci,
  `district` text COLLATE utf8mb4_general_ci,
  `post_code` text COLLATE utf8mb4_general_ci,
  `tel1` text COLLATE utf8mb4_general_ci,
  `tel2` text COLLATE utf8mb4_general_ci,
  `fax1` text COLLATE utf8mb4_general_ci,
  `fax2` text COLLATE utf8mb4_general_ci,
  `tax_administration` text COLLATE utf8mb4_general_ci,
  `tax_number` text COLLATE utf8mb4_general_ci,
  `account_code` text COLLATE utf8mb4_general_ci,
  `web_address` text COLLATE utf8mb4_general_ci,
  `email` text COLLATE utf8mb4_general_ci,
  `email_cc` text COLLATE utf8mb4_general_ci,
  `description` text COLLATE utf8mb4_general_ci,
  `token` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_byId` int DEFAULT NULL,
  `isUpdated` int NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_byId` int DEFAULT NULL,
  `isActive` int NOT NULL DEFAULT '1',
  `isDeleted` int NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_byId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `current_cart`
--

INSERT INTO `current_cart` (`id`, `serverId`, `serverToken`, `current_row`, `sectoral_type`, `codeNumber`, `current_code`, `sectoral_code`, `current_name`, `short_name`, `currency`, `authorized_person`, `authorized_person_role`, `authorized_person_tel`, `authorized_person_whatsap`, `authorized_person_mail`, `ref_person`, `ref_departman`, `ref_phone`, `ref_email`, `address`, `billing_address`, `country`, `city`, `district`, `post_code`, `tel1`, `tel2`, `fax1`, `fax2`, `tax_administration`, `tax_number`, `account_code`, `web_address`, `email`, `email_cc`, `description`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(23, 3, 'serverToken2', '120', '44', '007', '120..007', NULL, 'IFM International Facility Management GmbH', 'IFM', 'Euro', 'Yalçın Bey', 'Patron', '+49209148185', '+49209148185', 'ifm_gmbh.mail@t-online.de', NULL, NULL, NULL, NULL, 'Gelsenkirchen Adres', 'Gelsenkirchen Adres', 'Almanya', 'Deutshland', 'Gelsenkirchen', '45883', '+49209148185', NULL, NULL, NULL, 'Almanya', '32121', NULL, 'www.ifm.com', 'ifm_gmbh.mail@t-online.de', NULL, 'Almanya Tedarikçi', NULL, '2023-07-05 11:57:25', 1, 1, '2023-07-05 12:54:49', NULL, 1, 0, NULL, NULL),
(24, 3, 'serverToken2', '320', '44', '008', '320..008', NULL, 'Al Alcı A.Ş', 'Al', 'TL', 'Mustafa Al', 'Yönetici', '055103221547', '055103221547', 'info@al.com.tr', NULL, NULL, NULL, NULL, 'Gölbaşı Mah No 45', 'Gölbaşı Mah No 45', 'Türkiye', 'Ankara', 'Gölbaşı', '36000', '3124505050', '3124505051', NULL, NULL, 'Gölbaşı', '121312464', NULL, 'www.al.com.tr', 'info@al.com.tr', NULL, NULL, NULL, '2023-07-05 12:00:39', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(27, 3, 'serverToken2', '320', '44', '011', '320..011', NULL, 'Beriko A.Ş', 'Beriko', 'TL', 'Mehmet Yakar', 'Müdür', '05114361478', '05114361478', 'info@berico.com.tr', NULL, NULL, NULL, NULL, 'Kazan Saray No 56.', 'Kazan Saray No 56.', 'Türkiye', 'Ankara', 'KahramanKazan', '06410', '3121544778', '3121544771', NULL, NULL, 'Saray', '14256474865', NULL, 'www.berico.com.tr', 'info@berico.com.tr', NULL, NULL, NULL, '2023-07-05 12:04:35', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(37, 3, 'serverToken2', '320', '44', '021', '320.0465.021', NULL, 'Happland Irak A.Ş', 'Happy', 'Dolar', 'Saif Bey', 'Müdür', '065040536', '065040536', 'info@happland.com', NULL, NULL, NULL, NULL, 'Ankava 11 Erbil 44001 Irak', 'Ankava 11 Erbil 44001 Irak', 'Irak', 'Erbil', 'Ankara', '0647847', '+964032154784', '+964032154784', NULL, NULL, 'Erbil', '6595632', NULL, 'www.happland.com', 'info@happland.com', NULL, NULL, NULL, '2023-07-05 12:08:59', 1, 1, '2023-07-11 13:45:18', 1, 0, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `current_cart`
--
ALTER TABLE `current_cart`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `current_cart`
--
ALTER TABLE `current_cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
