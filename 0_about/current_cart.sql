-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:34:02
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
-- Tablo için tablo yapısı `current_cart`
--

CREATE TABLE `current_cart` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `current_row` text DEFAULT NULL,
  `sectoral_type` text DEFAULT NULL,
  `codeNumber` text DEFAULT NULL,
  `current_code` text DEFAULT NULL,
  `current_name` text NOT NULL,
  `short_name` text NOT NULL,
  `currency` text NOT NULL,
  `authorized_person` text DEFAULT NULL,
  `authorized_person_role` text DEFAULT NULL,
  `authorized_person_tel` text DEFAULT NULL,
  `authorized_person_whatsap` text DEFAULT NULL,
  `authorized_person_mail` text DEFAULT NULL,
  `ref_person` text DEFAULT NULL,
  `ref_departman` text DEFAULT NULL,
  `ref_phone` text DEFAULT NULL,
  `ref_email` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `post_code` text DEFAULT NULL,
  `tel1` text DEFAULT NULL,
  `tel2` text DEFAULT NULL,
  `fax1` text DEFAULT NULL,
  `fax2` text DEFAULT NULL,
  `tax_administration` text DEFAULT NULL,
  `tax_number` text DEFAULT NULL,
  `account_code` text DEFAULT NULL,
  `web_address` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `email_cc` text DEFAULT NULL,
  `description` text DEFAULT NULL,
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
-- Tablo döküm verisi `current_cart`
--

INSERT INTO `current_cart` (`id`, `serverId`, `serverToken`, `current_row`, `sectoral_type`, `codeNumber`, `current_code`, `current_name`, `short_name`, `currency`, `authorized_person`, `authorized_person_role`, `authorized_person_tel`, `authorized_person_whatsap`, `authorized_person_mail`, `ref_person`, `ref_departman`, `ref_phone`, `ref_email`, `address`, `billing_address`, `country`, `city`, `district`, `post_code`, `tel1`, `tel2`, `fax1`, `fax2`, `tax_administration`, `tax_number`, `account_code`, `web_address`, `email`, `email_cc`, `description`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(23, 3, 'serverToken2', '120', '44', '007', '120.8.007', 'IFM International Facility Management GmbH', 'IFM', 'Euro', 'Yalçın Bey', 'Patron', '+49209148185', '+49209148185', 'ifm_gmbh.mail@t-online.de', NULL, NULL, NULL, NULL, 'Gelsenkirchen Adres', 'Gelsenkirchen Adres', 'Almanya', 'Deutshland', 'Gelsenkirchen', '45883', '+49209148185', NULL, NULL, NULL, 'Almanya', '32121', NULL, 'www.ifm.com', 'ifm_gmbh.mail@t-online.de', NULL, 'Almanya Tedarikçi', NULL, '2023-07-05 11:57:25', 1, 1, '2024-10-20 10:06:58', NULL, 1, 0, NULL, NULL),
(24, 3, 'serverToken2', '120', '44', '008', '120.8.008', 'Al Alcı A.Ş', 'Al', 'TL', 'Mustafa Al', 'Yönetici', '055103221547', '055103221547', 'info@al.com.tr', NULL, NULL, NULL, NULL, 'Gölbaşı Mah No 45', 'Gölbaşı Mah No 45', 'Türkiye', 'Ankara', 'Gölbaşı', '36000', '3124505050', '3124505051', NULL, NULL, 'Gölbaşı', '121312464', NULL, 'www.al.com.tr', 'info@al.com.tr', NULL, NULL, NULL, '2023-07-05 12:00:39', 1, 1, '2024-10-20 10:06:54', NULL, 1, 0, NULL, NULL),
(27, 3, 'serverToken2', '320', '44', '011', '320.8.011', 'Beriko A.Ş', 'Beriko', 'TL', 'Mehmet Yakar', 'Müdür', '05114361478', '05114361478', 'info@berico.com.tr', NULL, NULL, NULL, NULL, 'Kazan Saray No 56.', 'Kazan Saray No 56.', 'Türkiye', 'Ankara', 'KahramanKazan', '06410', '3121544778', '3121544771', NULL, NULL, 'Saray', '14256474865', NULL, 'www.berico.com.tr', 'info@berico.com.tr', NULL, NULL, NULL, '2023-07-05 12:04:35', 1, 1, '2024-10-20 10:06:48', NULL, 1, 0, NULL, NULL),
(37, 3, 'serverToken2', '120', '44', '021', '120.8.021', 'Happland Irak A.Ş', 'Happy', 'Dolar', 'Saif Bey', 'Müdür', '065040536', '065040536', 'info@happland.com', NULL, NULL, NULL, NULL, 'Ankava 11 Erbil 44001 Irak', 'Ankava 11 Erbil 44001 Irak', 'Irak', 'Erbil', 'Ankava', '0647847', '+964032154784', '+964032154784', NULL, NULL, 'Erbil', '6595632', NULL, 'www.happland.com', 'info@happland.com', NULL, NULL, NULL, '2023-07-05 12:08:59', 1, 1, '2024-10-20 10:06:19', NULL, 1, 0, NULL, NULL),
(40, 3, 'serverToken2', '121', '39', '024', '121.3.024', 'Cari Adı Deneme', 'Kısa Adı', 'Dolar', 'Yetkili Kişi', 'Yetkili Kişi Departman', 'Yetkili Telefon', 'Yetkili Kişi Whatsap', 'Yetkili Kişi Email', 'Referans Kişi', 'Referans Yetkisi', 'Referans Telefon', 'Referans Email', 'Keçiören / Ankara', 'Fatura Adresi', 'Türkiye', 'Ankara', 'Keçiören', '46100', 'Tel 1', 'Tel 2', NULL, NULL, 'Vergi Dairesi', 'Vergi No', NULL, 'yildirimdev.com', 'ebuenesy2@gmail.com', 'ebuenesy2@gmail.com', 'Açıklama', NULL, '2024-10-20 09:56:05', 1, 1, '2024-10-20 10:39:29', NULL, 1, 0, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
