-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 11 Tem 2023, 14:27:53
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
-- Tablo için tablo yapısı `requestform`
--

CREATE TABLE `requestform` (
  `id` int NOT NULL,
  `serverId` int NOT NULL DEFAULT '0',
  `serverToken` text COLLATE utf8mb4_general_ci,
  `codeNumber` text COLLATE utf8mb4_general_ci,
  `reqCode` text COLLATE utf8mb4_general_ci,
  `requestFormTitle` text COLLATE utf8mb4_general_ci,
  `currency` text COLLATE utf8mb4_general_ci,
  `description` text COLLATE utf8mb4_general_ci,
  `currencyCartId` int DEFAULT NULL,
  `companyAuthorized_person` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_email` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_tel` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_person_tax_no` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_person_tax_adm` text COLLATE utf8mb4_general_ci,
  `companyAuthorized_person_adress` text COLLATE utf8mb4_general_ci,
  `public` int DEFAULT NULL,
  `public_username` text COLLATE utf8mb4_general_ci,
  `public_pass` text COLLATE utf8mb4_general_ci,
  `personeId` text COLLATE utf8mb4_general_ci,
  `requestEffectiveDate` text COLLATE utf8mb4_general_ci,
  `paymentMethod` text COLLATE utf8mb4_general_ci,
  `paymentMethod_Title` text COLLATE utf8mb4_general_ci,
  `paymentMethod_order` text COLLATE utf8mb4_general_ci,
  `paymentMethod_load` text COLLATE utf8mb4_general_ci,
  `paymentMethod_delivery` text COLLATE utf8mb4_general_ci,
  `modeofTransport` text COLLATE utf8mb4_general_ci,
  `modeofTransport_Title` text COLLATE utf8mb4_general_ci,
  `shipmentType` text COLLATE utf8mb4_general_ci,
  `shipmentType_title` text COLLATE utf8mb4_general_ci,
  `intertek` text COLLATE utf8mb4_general_ci,
  `intertek_Title` text COLLATE utf8mb4_general_ci,
  `specialPermit` text COLLATE utf8mb4_general_ci,
  `specialPermit_Title` text COLLATE utf8mb4_general_ci,
  `requested_document` text COLLATE utf8mb4_general_ci,
  `purchaseTime` text COLLATE utf8mb4_general_ci,
  `purchaseAmount` text COLLATE utf8mb4_general_ci,
  `purchaseAmountStockUnit` text COLLATE utf8mb4_general_ci,
  `initialPurchaseAmount` text COLLATE utf8mb4_general_ci,
  `initialPurchaseAmountStockUnit` text COLLATE utf8mb4_general_ci,
  `initialPurchaseAmount_at` text COLLATE utf8mb4_general_ci,
  `deliveryLocation` text COLLATE utf8mb4_general_ci,
  `packagingType` text COLLATE utf8mb4_general_ci,
  `reqSample` text COLLATE utf8mb4_general_ci,
  `token` text COLLATE utf8mb4_general_ci,
  `delivery_at` text COLLATE utf8mb4_general_ci,
  `vendorDeliveryType` text COLLATE utf8mb4_general_ci,
  `vendorDeliveryType_Title` text COLLATE utf8mb4_general_ci,
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
-- Tablo döküm verisi `requestform`
--

INSERT INTO `requestform` (`id`, `serverId`, `serverToken`, `codeNumber`, `reqCode`, `requestFormTitle`, `currency`, `description`, `currencyCartId`, `companyAuthorized_person`, `companyAuthorized_email`, `companyAuthorized_tel`, `companyAuthorized_person_tax_no`, `companyAuthorized_person_tax_adm`, `companyAuthorized_person_adress`, `public`, `public_username`, `public_pass`, `personeId`, `requestEffectiveDate`, `paymentMethod`, `paymentMethod_Title`, `paymentMethod_order`, `paymentMethod_load`, `paymentMethod_delivery`, `modeofTransport`, `modeofTransport_Title`, `shipmentType`, `shipmentType_title`, `intertek`, `intertek_Title`, `specialPermit`, `specialPermit_Title`, `requested_document`, `purchaseTime`, `purchaseAmount`, `purchaseAmountStockUnit`, `initialPurchaseAmount`, `initialPurchaseAmountStockUnit`, `initialPurchaseAmount_at`, `deliveryLocation`, `packagingType`, `reqSample`, `token`, `delivery_at`, `vendorDeliveryType`, `vendorDeliveryType_Title`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(59, 3, 'serverToken2', '011', 'TAF-05072023-011', 'Almanya Yapı Kimyasalı - 01', 'Dolar', 'Ürünleri ne kısa sürede alalım.', 23, 'Yalçın Bey', 'ifm_gmbh.mail@t-online.de', '+49209148185', '32121', 'Almanya', 'Almanya', 1, '123', '1234', '1', '2023-07-10', '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', NULL, NULL, NULL, '97', 'Karayolu', '117', 'Paket', '82', 'Hayır', NULL, NULL, 'Ce', 'TekSefer', '405', 'Adet', '405', 'Adet', '2023-07-31', 'Almanya', 'Paketler jelatinli ve NAylonlu olsun', '1 adet', NULL, '2023-07-31', '95', 'DAP - Yerinde Teslim', '2023-07-05 12:10:24', 1, 1, '2023-07-11 13:58:28', 1, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `requestform`
--
ALTER TABLE `requestform`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `requestform`
--
ALTER TABLE `requestform`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
