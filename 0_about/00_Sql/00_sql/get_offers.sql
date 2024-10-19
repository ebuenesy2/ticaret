-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 11 Tem 2023, 14:27:26
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
-- Tablo için tablo yapısı `get_offers`
--

CREATE TABLE `get_offers` (
  `id` int NOT NULL,
  `serverId` int NOT NULL DEFAULT '0',
  `serverToken` text COLLATE utf8mb4_general_ci,
  `getOfferNo` text COLLATE utf8mb4_general_ci,
  `codeNumber` text COLLATE utf8mb4_general_ci,
  `title` text COLLATE utf8mb4_general_ci,
  `requestformid` text COLLATE utf8mb4_general_ci,
  `offerEffectiveDate` text COLLATE utf8mb4_general_ci,
  `currencyCartId` int DEFAULT NULL,
  `companyAuthorized_person` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_email` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_tel` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_person_tax_no` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_person_adress` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_person_tax_adm` text COLLATE utf8mb4_general_ci,
  `paymentMethod` text COLLATE utf8mb4_general_ci,
  `paymentMethod_Title` text COLLATE utf8mb4_general_ci,
  `modeofTransport` text COLLATE utf8mb4_general_ci,
  `modeofTransport_Title` text COLLATE utf8mb4_general_ci,
  `shipmentType` text COLLATE utf8mb4_general_ci,
  `shipmentType_title` text COLLATE utf8mb4_general_ci,
  `intertek` text COLLATE utf8mb4_general_ci,
  `intertek_Title` text COLLATE utf8mb4_general_ci,
  `specialPermit` text COLLATE utf8mb4_general_ci,
  `specialPermit_Title` text COLLATE utf8mb4_general_ci,
  `deliveryLocation` text COLLATE utf8mb4_general_ci,
  `packagingType` text COLLATE utf8mb4_general_ci,
  `delivery_at` text COLLATE utf8mb4_general_ci,
  `vendorDeliveryType` text COLLATE utf8mb4_general_ci,
  `vendorDeliveryType_Title` text COLLATE utf8mb4_general_ci,
  `is_warranty` text COLLATE utf8mb4_general_ci,
  `warrantyTime` text COLLATE utf8mb4_general_ci,
  `setup` text COLLATE utf8mb4_general_ci,
  `reqSample` text COLLATE utf8mb4_general_ci,
  `sector` text COLLATE utf8mb4_general_ci,
  `sector_title` text COLLATE utf8mb4_general_ci,
  `productTotal` text COLLATE utf8mb4_general_ci,
  `currency` text COLLATE utf8mb4_general_ci,
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
-- Tablo döküm verisi `get_offers`
--

INSERT INTO `get_offers` (`id`, `serverId`, `serverToken`, `getOfferNo`, `codeNumber`, `title`, `requestformid`, `offerEffectiveDate`, `currencyCartId`, `companyAuthorized_person`, `companyAuthorized_email`, `companyAuthorized_tel`, `companyAuthorized_person_tax_no`, `companyAuthorized_person_adress`, `companyAuthorized_person_tax_adm`, `paymentMethod`, `paymentMethod_Title`, `modeofTransport`, `modeofTransport_Title`, `shipmentType`, `shipmentType_title`, `intertek`, `intertek_Title`, `specialPermit`, `specialPermit_Title`, `deliveryLocation`, `packagingType`, `delivery_at`, `vendorDeliveryType`, `vendorDeliveryType_Title`, `is_warranty`, `warrantyTime`, `setup`, `reqSample`, `sector`, `sector_title`, `productTotal`, `currency`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(75, 3, 'serverToken2', 'TEF-05072023-029', '029', 'Almanya Yapı Kimyasalı #01', '59', '2023-07-17', 27, 'Mehmet Yakar', 'info@berico.com.tr', '05114361478', NULL, NULL, NULL, '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', '97', 'Karayolu', '117', 'Paket', '82', 'Hayır', NULL, NULL, 'Fabrika', 'Paketler jelatinli ve NAylonlu olsun', '2023-07-31', '91', 'EXW - Ticari işletmede Teslim', NULL, NULL, NULL, '1 adet', NULL, NULL, '6075', 'Euro', '2023-07-05 12:58:58', 1, 1, '2023-07-07 14:07:44', 1, 1, 0, NULL, NULL),
(82, 3, 'serverToken2', 'TEF-10072023-041', '041', 'Teklif Test #1', '59', '2023-07-14', 24, 'Mustafa Al', 'info@al.com.tr', '055103221547', '121312464', 'Gölbaşı Mah No 45', 'Gölbaşı', '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', '97', 'Karayolu', '117', 'Paket', '82', 'Hayır', NULL, NULL, 'Almanya', 'Paketler jelatinli ve NAylonlu olsun', '2023-07-31', '95', 'DAP - Yerinde Teslim', NULL, NULL, NULL, '1 adet', NULL, NULL, '1448', 'Dolar', '2023-07-10 08:33:09', 1, 1, '2023-07-10 14:25:32', 1, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `get_offers`
--
ALTER TABLE `get_offers`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `get_offers`
--
ALTER TABLE `get_offers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
