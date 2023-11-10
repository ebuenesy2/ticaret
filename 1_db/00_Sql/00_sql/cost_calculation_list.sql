-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 11 Tem 2023, 14:27:05
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
-- Tablo için tablo yapısı `cost_calculation_list`
--

CREATE TABLE `cost_calculation_list` (
  `id` int NOT NULL,
  `serverId` int NOT NULL DEFAULT '0',
  `serverToken` text COLLATE utf8mb4_general_ci,
  `costCalculationCode` text COLLATE utf8mb4_general_ci,
  `codeNumber` text COLLATE utf8mb4_general_ci,
  `time` text COLLATE utf8mb4_general_ci,
  `title` text COLLATE utf8mb4_general_ci,
  `requestformid` int DEFAULT NULL,
  `get_offers_id` text COLLATE utf8mb4_general_ci,
  `public` int DEFAULT NULL,
  `currency` text COLLATE utf8mb4_general_ci,
  `currency_rate` text COLLATE utf8mb4_general_ci,
  `companyId` int DEFAULT NULL,
  `companyTitle` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_person` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_tel` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_email` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_person_tax_no` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_person_tax_adm` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_person_adress` text COLLATE utf8mb4_general_ci,
  `profit` text COLLATE utf8mb4_general_ci,
  `ibm` text COLLATE utf8mb4_general_ci,
  `serviceFee` text COLLATE utf8mb4_general_ci,
  `sector` text COLLATE utf8mb4_general_ci,
  `sector_title` text COLLATE utf8mb4_general_ci,
  `vendorDeliveryType` text COLLATE utf8mb4_general_ci,
  `vendorDeliveryType_Title` text COLLATE utf8mb4_general_ci,
  `paymentMethod` text COLLATE utf8mb4_general_ci NOT NULL,
  `paymentMethod_Title` text COLLATE utf8mb4_general_ci NOT NULL,
  `modeofTransport` text COLLATE utf8mb4_general_ci NOT NULL,
  `modeofTransport_Title` text COLLATE utf8mb4_general_ci,
  `shipmentType` text COLLATE utf8mb4_general_ci,
  `shipmentType_title` text COLLATE utf8mb4_general_ci,
  `specialPermit` text COLLATE utf8mb4_general_ci,
  `specialPermit_Title` text COLLATE utf8mb4_general_ci,
  `intertek` text COLLATE utf8mb4_general_ci NOT NULL,
  `intertek_Title` text COLLATE utf8mb4_general_ci NOT NULL,
  `packagingType` text COLLATE utf8mb4_general_ci,
  `organizingStaff` text COLLATE utf8mb4_general_ci,
  `organizingStafTel` text COLLATE utf8mb4_general_ci,
  `organizingStafEmail` text COLLATE utf8mb4_general_ci,
  `offerEffectiveDate` text COLLATE utf8mb4_general_ci,
  `exitPoint` text COLLATE utf8mb4_general_ci,
  `clearancePlace` text COLLATE utf8mb4_general_ci,
  `destination` text COLLATE utf8mb4_general_ci,
  `deliveryLocation` text COLLATE utf8mb4_general_ci,
  `releaseDate` text COLLATE utf8mb4_general_ci,
  `shipmentDate` text COLLATE utf8mb4_general_ci,
  `arrivalDate` text COLLATE utf8mb4_general_ci,
  `deliveryDate` text COLLATE utf8mb4_general_ci,
  `const` int DEFAULT NULL,
  `token` text COLLATE utf8mb4_general_ci,
  `costCalculationCheck` text COLLATE utf8mb4_general_ci,
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
-- Tablo döküm verisi `cost_calculation_list`
--

INSERT INTO `cost_calculation_list` (`id`, `serverId`, `serverToken`, `costCalculationCode`, `codeNumber`, `time`, `title`, `requestformid`, `get_offers_id`, `public`, `currency`, `currency_rate`, `companyId`, `companyTitle`, `companyAuthorized_person`, `companyAuthorized_tel`, `companyAuthorized_email`, `companyAuthorized_person_tax_no`, `companyAuthorized_person_tax_adm`, `companyAuthorized_person_adress`, `profit`, `ibm`, `serviceFee`, `sector`, `sector_title`, `vendorDeliveryType`, `vendorDeliveryType_Title`, `paymentMethod`, `paymentMethod_Title`, `modeofTransport`, `modeofTransport_Title`, `shipmentType`, `shipmentType_title`, `specialPermit`, `specialPermit_Title`, `intertek`, `intertek_Title`, `packagingType`, `organizingStaff`, `organizingStafTel`, `organizingStafEmail`, `offerEffectiveDate`, `exitPoint`, `clearancePlace`, `destination`, `deliveryLocation`, `releaseDate`, `shipmentDate`, `arrivalDate`, `deliveryDate`, `const`, `token`, `costCalculationCheck`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(132, 3, 'serverToken2', 'MK-10072023-032', '032', '1688978931', 'Maliyet Test #1', 59, '82', 0, 'Dolar', '12', 27, 'Beriko A.Ş', 'Mehmet Yakar', '05114361478', 'info@berico.com.tr', '14256474865', 'Saray', 'Kazan Saray No 56.', NULL, NULL, NULL, NULL, NULL, '95', 'DAP - Yerinde Teslim', '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', '97', 'Karayolu', '117', 'Paket', '0', NULL, '82', 'Hayır', 'Paketler jelatinli ve NAylonlu olsun', 'Ebu Enes Yıldırım ( user@gmail.com )', '0551 022 02 02', 'user@gmail.com', '2023-07-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Evet', '2023-07-10 08:48:51', 1, 1, '2023-07-10 14:41:31', NULL, 1, 0, NULL, NULL);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
