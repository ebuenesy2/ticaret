-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 11 Tem 2023, 14:27:43
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
-- Tablo için tablo yapısı `proforma_invoice`
--

CREATE TABLE `proforma_invoice` (
  `id` int NOT NULL,
  `serverId` int NOT NULL DEFAULT '0',
  `serverToken` text COLLATE utf8mb4_general_ci,
  `proformaCode` text COLLATE utf8mb4_general_ci,
  `codeNumber` text COLLATE utf8mb4_general_ci,
  `time` text COLLATE utf8mb4_general_ci NOT NULL,
  `public` int DEFAULT NULL,
  `requestformid` int DEFAULT NULL,
  `get_offers_id` int DEFAULT NULL,
  `cost_calculation_id` text COLLATE utf8mb4_general_ci NOT NULL,
  `title` text COLLATE utf8mb4_general_ci,
  `currencyCartId` text COLLATE utf8mb4_general_ci,
  `date` text COLLATE utf8mb4_general_ci,
  `proformaDate` text COLLATE utf8mb4_general_ci,
  `proformaNo` text COLLATE utf8mb4_general_ci,
  `offerEffectiveDate` text COLLATE utf8mb4_general_ci,
  `currency` text COLLATE utf8mb4_general_ci,
  `proformaCheck` text COLLATE utf8mb4_general_ci,
  `organizingStafCompanyTitle` text COLLATE utf8mb4_general_ci,
  `organizingStafCompanyAdress` text COLLATE utf8mb4_general_ci,
  `organizingStaff` text COLLATE utf8mb4_general_ci,
  `organizingStafTel` text COLLATE utf8mb4_general_ci,
  `organizingStafEmail` text COLLATE utf8mb4_general_ci,
  `companyId` text COLLATE utf8mb4_general_ci,
  `companyTitle` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_person` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_tel` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_email` text COLLATE utf8mb4_general_ci,
  `vendorDeliveryType` text COLLATE utf8mb4_general_ci,
  `vendorDeliveryType_Title` text COLLATE utf8mb4_general_ci,
  `modeofTransport` text COLLATE utf8mb4_general_ci,
  `modeofTransport_Title` text COLLATE utf8mb4_general_ci,
  `shipmentType` text COLLATE utf8mb4_general_ci,
  `shipmentType_title` text COLLATE utf8mb4_general_ci,
  `paymentMethod` text COLLATE utf8mb4_general_ci,
  `paymentMethod_Title` text COLLATE utf8mb4_general_ci,
  `exitPoint` text COLLATE utf8mb4_general_ci,
  `clearancePlace` text COLLATE utf8mb4_general_ci,
  `deliveryPlace` text COLLATE utf8mb4_general_ci,
  `orderPercentage` text COLLATE utf8mb4_general_ci,
  `orderValue` text COLLATE utf8mb4_general_ci,
  `shipmentPercentage` text COLLATE utf8mb4_general_ci,
  `shipmentValue` text COLLATE utf8mb4_general_ci,
  `deliveryPercentage` text COLLATE utf8mb4_general_ci,
  `deliveryValue` text COLLATE utf8mb4_general_ci,
  `const` text COLLATE utf8mb4_general_ci,
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
-- Tablo döküm verisi `proforma_invoice`
--

INSERT INTO `proforma_invoice` (`id`, `serverId`, `serverToken`, `proformaCode`, `codeNumber`, `time`, `public`, `requestformid`, `get_offers_id`, `cost_calculation_id`, `title`, `currencyCartId`, `date`, `proformaDate`, `proformaNo`, `offerEffectiveDate`, `currency`, `proformaCheck`, `organizingStafCompanyTitle`, `organizingStafCompanyAdress`, `organizingStaff`, `organizingStafTel`, `organizingStafEmail`, `companyId`, `companyTitle`, `companyAuthorized_person`, `companyAuthorized_tel`, `companyAuthorized_email`, `vendorDeliveryType`, `vendorDeliveryType_Title`, `modeofTransport`, `modeofTransport_Title`, `shipmentType`, `shipmentType_title`, `paymentMethod`, `paymentMethod_Title`, `exitPoint`, `clearancePlace`, `deliveryPlace`, `orderPercentage`, `orderValue`, `shipmentPercentage`, `shipmentValue`, `deliveryPercentage`, `deliveryValue`, `const`, `description`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(63, 3, 'serverToken2', 'IDT-10072023-067', '067', '1688985823', 0, 59, 82, '132', 'Proforma Test #1', NULL, NULL, NULL, NULL, '2023-07-14', 'Dolar', NULL, NULL, NULL, NULL, NULL, NULL, '23', NULL, 'Yalçın Bey', '+49209148185', 'ifm_gmbh.mail@t-online.de', '95', 'DAP - Yerinde Teslim', '97', 'Karayolu', '117', 'Paket', '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2023-07-10 10:43:43', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
