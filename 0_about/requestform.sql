-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:34:59
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
-- Tablo için tablo yapısı `requestform`
--

CREATE TABLE `requestform` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `codeNumber` text DEFAULT NULL,
  `reqCode` text DEFAULT NULL,
  `requestFormTitle` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `currencyCartId` int(11) DEFAULT NULL,
  `companyAuthorized_person` text DEFAULT NULL,
  `companyAuthorized_email` text DEFAULT NULL,
  `companyAuthorized_tel` text DEFAULT NULL,
  `companyAuthorized_person_tax_no` text DEFAULT NULL,
  `companyAuthorized_person_tax_adm` text DEFAULT NULL,
  `companyAuthorized_person_adress` text DEFAULT NULL,
  `public` int(11) DEFAULT NULL,
  `public_username` text DEFAULT NULL,
  `public_pass` text DEFAULT NULL,
  `personeId` text DEFAULT NULL,
  `requestEffectiveDate` text DEFAULT NULL,
  `paymentMethod` text DEFAULT NULL,
  `paymentMethod_Title` text DEFAULT NULL,
  `paymentMethod_order` text DEFAULT NULL,
  `paymentMethod_load` text DEFAULT NULL,
  `paymentMethod_delivery` text DEFAULT NULL,
  `modeofTransport` text DEFAULT NULL,
  `modeofTransport_Title` text DEFAULT NULL,
  `shipmentType` text DEFAULT NULL,
  `shipmentType_title` text DEFAULT NULL,
  `intertek` text DEFAULT NULL,
  `intertek_Title` text DEFAULT NULL,
  `specialPermit` text DEFAULT NULL,
  `specialPermit_Title` text DEFAULT NULL,
  `requested_document` text DEFAULT NULL,
  `purchaseTime` text DEFAULT NULL,
  `purchaseAmount` text DEFAULT NULL,
  `purchaseAmountStockUnit` text DEFAULT NULL,
  `initialPurchaseAmount` text DEFAULT NULL,
  `initialPurchaseAmountStockUnit` text DEFAULT NULL,
  `initialPurchaseAmount_at` text DEFAULT NULL,
  `deliveryLocation` text DEFAULT NULL,
  `packagingType` text DEFAULT NULL,
  `reqSample` text DEFAULT NULL,
  `token` text DEFAULT NULL,
  `delivery_at` text DEFAULT NULL,
  `vendorDeliveryType` text DEFAULT NULL,
  `vendorDeliveryType_Title` text DEFAULT NULL,
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
-- Tablo döküm verisi `requestform`
--

INSERT INTO `requestform` (`id`, `serverId`, `serverToken`, `codeNumber`, `reqCode`, `requestFormTitle`, `currency`, `description`, `currencyCartId`, `companyAuthorized_person`, `companyAuthorized_email`, `companyAuthorized_tel`, `companyAuthorized_person_tax_no`, `companyAuthorized_person_tax_adm`, `companyAuthorized_person_adress`, `public`, `public_username`, `public_pass`, `personeId`, `requestEffectiveDate`, `paymentMethod`, `paymentMethod_Title`, `paymentMethod_order`, `paymentMethod_load`, `paymentMethod_delivery`, `modeofTransport`, `modeofTransport_Title`, `shipmentType`, `shipmentType_title`, `intertek`, `intertek_Title`, `specialPermit`, `specialPermit_Title`, `requested_document`, `purchaseTime`, `purchaseAmount`, `purchaseAmountStockUnit`, `initialPurchaseAmount`, `initialPurchaseAmountStockUnit`, `initialPurchaseAmount_at`, `deliveryLocation`, `packagingType`, `reqSample`, `token`, `delivery_at`, `vendorDeliveryType`, `vendorDeliveryType_Title`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(65, 3, 'serverToken2', '017', 'TAF-20102024-017', 'Deneme 3 Güncelleme', 'Dolar', 'Açıklama', 24, 'Mustafa Al', 'info@al.com.tr', '055103221547', '121312464', 'Gölbaşı', 'Gölbaşı Mah No 45', 0, NULL, NULL, '18', '2024-10-19', '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', NULL, NULL, NULL, '96', 'Denizyolu', '116', 'Palet', '81', 'Evet', NULL, 'Özel İzin', 'İstenilen Belge ve Standartlar', 'Yıllık', '150', 'Adet', '50', 'Adet', '2024-10-16', 'Adana', 'Ambalajlama ve Paketleme Şekli', 'Evet', NULL, '2024-10-25', '92', 'FAS - Gemi Doğrultusunda Teslim', '2024-10-20 11:37:47', 1, 1, '2024-10-21 01:50:32', 1, 1, 0, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
