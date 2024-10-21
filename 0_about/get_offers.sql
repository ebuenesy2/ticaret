-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:34:27
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
-- Tablo için tablo yapısı `get_offers`
--

CREATE TABLE `get_offers` (
  `id` int(11) NOT NULL,
  `serverId` int(11) NOT NULL DEFAULT 0,
  `serverToken` text DEFAULT NULL,
  `getOfferNo` text DEFAULT NULL,
  `codeNumber` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `requestformid` text DEFAULT NULL,
  `offerEffectiveDate` text DEFAULT NULL,
  `currencyCartId` int(11) DEFAULT NULL,
  `companyAuthorized_person` text DEFAULT NULL,
  `companyAuthorized_email` text DEFAULT NULL,
  `companyAuthorized_tel` text DEFAULT NULL,
  `companyAuthorized_person_tax_no` text DEFAULT NULL,
  `companyAuthorized_person_adress` text DEFAULT NULL,
  `companyAuthorized_person_tax_adm` text DEFAULT NULL,
  `paymentMethod` text DEFAULT NULL,
  `paymentMethod_Title` text DEFAULT NULL,
  `modeofTransport` text DEFAULT NULL,
  `modeofTransport_Title` text DEFAULT NULL,
  `shipmentType` text DEFAULT NULL,
  `shipmentType_title` text DEFAULT NULL,
  `intertek` text DEFAULT NULL,
  `intertek_Title` text DEFAULT NULL,
  `specialPermit` text DEFAULT NULL,
  `specialPermit_Title` text DEFAULT NULL,
  `deliveryLocation` text DEFAULT NULL,
  `packagingType` text DEFAULT NULL,
  `delivery_at` text DEFAULT NULL,
  `vendorDeliveryType` text DEFAULT NULL,
  `vendorDeliveryType_Title` text DEFAULT NULL,
  `is_warranty` text DEFAULT NULL,
  `warrantyTime` text DEFAULT NULL,
  `setup` text DEFAULT NULL,
  `reqSample` text DEFAULT NULL,
  `sector` text DEFAULT NULL,
  `sector_title` text DEFAULT NULL,
  `productTotal` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
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
-- Tablo döküm verisi `get_offers`
--

INSERT INTO `get_offers` (`id`, `serverId`, `serverToken`, `getOfferNo`, `codeNumber`, `title`, `requestformid`, `offerEffectiveDate`, `currencyCartId`, `companyAuthorized_person`, `companyAuthorized_email`, `companyAuthorized_tel`, `companyAuthorized_person_tax_no`, `companyAuthorized_person_adress`, `companyAuthorized_person_tax_adm`, `paymentMethod`, `paymentMethod_Title`, `modeofTransport`, `modeofTransport_Title`, `shipmentType`, `shipmentType_title`, `intertek`, `intertek_Title`, `specialPermit`, `specialPermit_Title`, `deliveryLocation`, `packagingType`, `delivery_at`, `vendorDeliveryType`, `vendorDeliveryType_Title`, `is_warranty`, `warrantyTime`, `setup`, `reqSample`, `sector`, `sector_title`, `productTotal`, `currency`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(86, 3, 'serverToken2', 'TEF-21102024-045', '045', 'Deneme 3', '65', '2024-10-02', 24, 'Mustafa Al', 'info@al.com.tr', '055103221547', '121312464', 'Gölbaşı Mah No 45', 'Gölbaşı', '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', '96', 'Denizyolu', '119', 'Tır', '81', 'Evet', NULL, 'Özel İzin', 'Adana', 'Ambalajlama ve Paketleme Şekli', '2024-10-25', '92', 'FAS - Gemi Doğrultusunda Teslim', NULL, NULL, NULL, 'Evet', NULL, NULL, '65', 'Dolar', '2024-10-21 02:07:29', 1, 1, '2024-10-21 03:27:24', 1, 1, 0, NULL, NULL),
(87, 3, 'serverToken2', 'TEF-21102024-046', '046', 'Tedarik', '65', '2024-10-09', 27, 'Mehmet Yakar', 'info@berico.com.tr', '05114361478', '14256474865', 'Kazan Saray No 56.', 'Saray', '100', 'Pesin ( Siparişte  Birlikte %50 - Sevk Öncesi %50 )', '96', 'Denizyolu', '116', 'Palet', '81', 'Evet', NULL, 'Özel İzin', 'Adana', 'Ambalajlama ve Paketleme Şekli', '2024-10-25', '92', 'FAS - Gemi Doğrultusunda Teslim', NULL, NULL, NULL, 'Evet', NULL, NULL, '0', 'Dolar', '2024-10-21 03:24:53', 1, 1, '2024-10-21 03:26:46', 1, 1, 0, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
