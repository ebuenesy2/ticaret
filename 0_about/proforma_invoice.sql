-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:34:46
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
-- Tablo için tablo yapısı `proforma_invoice`
--

CREATE TABLE `proforma_invoice` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `proformaCode` text DEFAULT NULL,
  `codeNumber` text DEFAULT NULL,
  `time` text NOT NULL,
  `public` int(11) DEFAULT NULL,
  `requestformid` int(11) DEFAULT NULL,
  `get_offers_id` int(11) DEFAULT NULL,
  `cost_calculation_id` text NOT NULL,
  `title` text DEFAULT NULL,
  `currencyCartId` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `proformaDate` text DEFAULT NULL,
  `proformaNo` text DEFAULT NULL,
  `offerEffectiveDate` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `proformaCheck` text DEFAULT NULL,
  `organizingStafCompanyTitle` text DEFAULT NULL,
  `organizingStafCompanyAdress` text DEFAULT NULL,
  `organizingStaff` text DEFAULT NULL,
  `organizingStafTel` text DEFAULT NULL,
  `organizingStafEmail` text DEFAULT NULL,
  `companyId` text DEFAULT NULL,
  `companyTitle` text DEFAULT NULL,
  `companyAuthorized_person` text DEFAULT NULL,
  `companyAuthorized_tel` text DEFAULT NULL,
  `companyAuthorized_email` text DEFAULT NULL,
  `companyAuthorized_person_tax_no` text DEFAULT NULL,
  `companyAuthorized_person_tax_adm` text DEFAULT NULL,
  `companyAuthorized_person_adress` text DEFAULT NULL,
  `vendorDeliveryType` text DEFAULT NULL,
  `vendorDeliveryType_Title` text DEFAULT NULL,
  `modeofTransport` text DEFAULT NULL,
  `modeofTransport_Title` text DEFAULT NULL,
  `shipmentType` text DEFAULT NULL,
  `shipmentType_title` text DEFAULT NULL,
  `paymentMethod` text DEFAULT NULL,
  `paymentMethod_Title` text DEFAULT NULL,
  `exitPoint` text DEFAULT NULL,
  `clearancePlace` text DEFAULT NULL,
  `deliveryPlace` text DEFAULT NULL,
  `orderPercentage` text DEFAULT NULL,
  `orderValue` text DEFAULT NULL,
  `shipmentPercentage` text DEFAULT NULL,
  `shipmentValue` text DEFAULT NULL,
  `deliveryPercentage` text DEFAULT NULL,
  `deliveryValue` text DEFAULT NULL,
  `const` text DEFAULT NULL,
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
-- Tablo döküm verisi `proforma_invoice`
--

INSERT INTO `proforma_invoice` (`id`, `serverId`, `serverToken`, `proformaCode`, `codeNumber`, `time`, `public`, `requestformid`, `get_offers_id`, `cost_calculation_id`, `title`, `currencyCartId`, `date`, `proformaDate`, `proformaNo`, `offerEffectiveDate`, `currency`, `proformaCheck`, `organizingStafCompanyTitle`, `organizingStafCompanyAdress`, `organizingStaff`, `organizingStafTel`, `organizingStafEmail`, `companyId`, `companyTitle`, `companyAuthorized_person`, `companyAuthorized_tel`, `companyAuthorized_email`, `companyAuthorized_person_tax_no`, `companyAuthorized_person_tax_adm`, `companyAuthorized_person_adress`, `vendorDeliveryType`, `vendorDeliveryType_Title`, `modeofTransport`, `modeofTransport_Title`, `shipmentType`, `shipmentType_title`, `paymentMethod`, `paymentMethod_Title`, `exitPoint`, `clearancePlace`, `deliveryPlace`, `orderPercentage`, `orderValue`, `shipmentPercentage`, `shipmentValue`, `deliveryPercentage`, `deliveryValue`, `const`, `description`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(65, 3, 'serverToken2', 'IDT-21102024-071', '071', '1729479851', NULL, 65, 86, '136', 'Deneme 3', NULL, NULL, '2024-10-08', 'IDT-21102024-071', '2024-10-22', 'Dolar', 'Bekleme', 'YıldırımDev Admin', 'Keçiören / Ankara / Türkiye', 'Ebu Enes Yıldırım', '+90 312 2xx xx', 'ebuenesy2@gmail.com', '24', 'Al Alcı A.Ş', 'Mustafa Al', '055103221547', 'info@al.com.tr', '121312464', 'Gölbaşı', 'Gölbaşı Mah No 45', '92', 'FAS - Gemi Doğrultusunda Teslim', '96', 'Denizyolu', '116', 'Palet', '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'Acıklama', NULL, '2024-10-21 03:04:11', 1, 1, '2024-10-21 03:05:57', NULL, 1, 0, NULL, NULL),
(67, 3, 'serverToken2', 'IDT-21102024-073', '073', '1729484399', 0, 65, 86, '137', 'Deneme', NULL, NULL, NULL, NULL, '2024-10-22', 'Dolar', NULL, NULL, NULL, NULL, NULL, NULL, '24', NULL, 'Mustafa Al', '055103221547', 'info@al.com.tr', '121312464', 'Gölbaşı', 'Gölbaşı Mah No 45', '92', 'FAS - Gemi Doğrultusunda Teslim', '96', 'Denizyolu', '119', 'Tır', '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2024-10-21 04:19:59', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(68, 3, 'serverToken2', 'IDT-21102024-074', '074', '1729484415', 0, 65, 86, '137', 'deneme 3', NULL, NULL, NULL, NULL, '2024-10-22', 'Dolar', NULL, NULL, NULL, NULL, NULL, NULL, '24', NULL, 'Mustafa Al', '055103221547', 'info@al.com.tr', '121312464', 'Gölbaşı', 'Gölbaşı Mah No 45', '92', 'FAS - Gemi Doğrultusunda Teslim', '96', 'Denizyolu', '119', 'Tır', '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2024-10-21 04:20:15', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `proforma_invoice`
--
ALTER TABLE `proforma_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `proforma_invoice`
--
ALTER TABLE `proforma_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
