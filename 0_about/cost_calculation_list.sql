-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:33:51
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
-- Tablo için tablo yapısı `cost_calculation_list`
--

CREATE TABLE `cost_calculation_list` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `costCalculationCode` text DEFAULT NULL,
  `codeNumber` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `requestformid` int(11) DEFAULT NULL,
  `get_offers_id` text DEFAULT NULL,
  `public` int(11) DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `currency_rate` text DEFAULT NULL,
  `companyId` int(11) DEFAULT NULL,
  `companyTitle` text DEFAULT NULL,
  `companyAuthorized_person` text DEFAULT NULL,
  `companyAuthorized_tel` text DEFAULT NULL,
  `companyAuthorized_email` text DEFAULT NULL,
  `companyAuthorized_person_tax_no` text DEFAULT NULL,
  `companyAuthorized_person_tax_adm` text DEFAULT NULL,
  `companyAuthorized_person_adress` text DEFAULT NULL,
  `profit` text DEFAULT NULL,
  `ibm` text DEFAULT NULL,
  `serviceFee` text DEFAULT NULL,
  `sector` text DEFAULT NULL,
  `sector_title` text DEFAULT NULL,
  `vendorDeliveryType` text DEFAULT NULL,
  `vendorDeliveryType_Title` text DEFAULT NULL,
  `paymentMethod` text NOT NULL,
  `paymentMethod_Title` text NOT NULL,
  `modeofTransport` text NOT NULL,
  `modeofTransport_Title` text DEFAULT NULL,
  `shipmentType` text DEFAULT NULL,
  `shipmentType_title` text DEFAULT NULL,
  `specialPermit` text DEFAULT NULL,
  `specialPermit_Title` text DEFAULT NULL,
  `intertek` text NOT NULL,
  `intertek_Title` text NOT NULL,
  `packagingType` text DEFAULT NULL,
  `organizingStaff` text DEFAULT NULL,
  `organizingStafTel` text DEFAULT NULL,
  `organizingStafEmail` text DEFAULT NULL,
  `offerEffectiveDate` text DEFAULT NULL,
  `exitPoint` text DEFAULT NULL,
  `clearancePlace` text DEFAULT NULL,
  `destination` text DEFAULT NULL,
  `deliveryLocation` text DEFAULT NULL,
  `releaseDate` text DEFAULT NULL,
  `shipmentDate` text DEFAULT NULL,
  `arrivalDate` text DEFAULT NULL,
  `deliveryDate` text DEFAULT NULL,
  `const` int(11) DEFAULT NULL,
  `token` text DEFAULT NULL,
  `costCalculationCheck` text DEFAULT NULL,
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
-- Tablo döküm verisi `cost_calculation_list`
--

INSERT INTO `cost_calculation_list` (`id`, `serverId`, `serverToken`, `costCalculationCode`, `codeNumber`, `time`, `title`, `requestformid`, `get_offers_id`, `public`, `currency`, `currency_rate`, `companyId`, `companyTitle`, `companyAuthorized_person`, `companyAuthorized_tel`, `companyAuthorized_email`, `companyAuthorized_person_tax_no`, `companyAuthorized_person_tax_adm`, `companyAuthorized_person_adress`, `profit`, `ibm`, `serviceFee`, `sector`, `sector_title`, `vendorDeliveryType`, `vendorDeliveryType_Title`, `paymentMethod`, `paymentMethod_Title`, `modeofTransport`, `modeofTransport_Title`, `shipmentType`, `shipmentType_title`, `specialPermit`, `specialPermit_Title`, `intertek`, `intertek_Title`, `packagingType`, `organizingStaff`, `organizingStafTel`, `organizingStafEmail`, `offerEffectiveDate`, `exitPoint`, `clearancePlace`, `destination`, `deliveryLocation`, `releaseDate`, `shipmentDate`, `arrivalDate`, `deliveryDate`, `const`, `token`, `costCalculationCheck`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(136, 3, 'serverToken2', 'MK-21102024-036', '036', '1729478658', 'Almanya - Maliyet', 65, '86', NULL, 'Dolar', '34,2843', 24, 'Al Alcı A.Ş', 'Mustafa Al', '055103221547', 'info@al.com.tr', '121312464', 'Gölbaşı', 'Gölbaşı Mah No 45', '10', '3', NULL, NULL, NULL, '92', 'FAS - Gemi Doğrultusunda Teslim', '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', '96', 'Denizyolu', '116', 'Palet', NULL, 'Özel İzin', '81', 'Evet', 'Ambalajlama ve Paketleme Şekli', 'Ebu Enes Yıldırım ( user@gmail.com )', '0551 022 02 02', 'user@gmail.com', '2024-10-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Evet', '2024-10-21 02:44:18', 1, 1, '2024-10-21 02:51:12', NULL, 1, 0, NULL, NULL),
(137, 3, 'serverToken2', 'MK-21102024-037', '037', '1729481788', 'Deneme - Maliyet', 65, '86', NULL, 'Dolar', '34,2847', 24, 'Al Alcı A.Ş', 'Mustafa Al', '055103221547', 'info@al.com.tr', '121312464', 'Gölbaşı', 'Gölbaşı Mah No 45', NULL, NULL, NULL, NULL, NULL, '92', 'FAS - Gemi Doğrultusunda Teslim', '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', '96', 'Denizyolu', '119', 'Tır', NULL, 'Özel İzin', '81', 'Evet', 'Ambalajlama ve Paketleme Şekli', 'Ebu Enes Yıldırım ( user@gmail.com )', '0551 022 02 02', 'user@gmail.com', '2024-10-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Evet', '2024-10-21 03:36:28', 1, 1, '2024-10-21 03:37:15', NULL, 1, 0, NULL, NULL),
(138, 3, 'serverToken2', 'MK-21102024-038', '038', '1729483273', 'Alman Deneme', 65, '87', NULL, 'Dolar', '34,2810', 24, 'Al Alcı A.Ş', 'Mustafa Al', '055103221547', 'info@al.com.tr', '121312464', 'Gölbaşı', 'Gölbaşı Mah No 45', NULL, NULL, NULL, NULL, NULL, '92', 'FAS - Gemi Doğrultusunda Teslim', '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', '96', 'Denizyolu', '116', 'Palet', NULL, 'Özel İzin', '81', 'Evet', 'Ambalajlama ve Paketleme Şekli', 'Ebu Enes Yıldırım ( user@gmail.com )', '0551 022 02 02', 'user@gmail.com', '2024-10-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Evet', '2024-10-21 04:01:13', 1, 1, '2024-10-21 04:01:54', NULL, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cost_calculation_list`
--
ALTER TABLE `cost_calculation_list`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `cost_calculation_list`
--
ALTER TABLE `cost_calculation_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
