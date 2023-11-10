-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 11 Tem 2023, 14:27:48
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
-- Tablo için tablo yapısı `proforma_product_list`
--

CREATE TABLE `proforma_product_list` (
  `id` int NOT NULL,
  `serverId` int DEFAULT NULL,
  `serverToken` text COLLATE utf8mb4_general_ci,
  `time` int DEFAULT NULL,
  `cost_calculation_id` int DEFAULT NULL,
  `proforma_id` text COLLATE utf8mb4_general_ci,
  `sector` text COLLATE utf8mb4_general_ci,
  `sub_sector` int DEFAULT NULL,
  `stock_id` int DEFAULT NULL,
  `nameTr` text COLLATE utf8mb4_general_ci,
  `nameEn` text COLLATE utf8mb4_general_ci,
  `imgUrl` text COLLATE utf8mb4_general_ci NOT NULL,
  `techFileUrl` text COLLATE utf8mb4_general_ci,
  `stockUnit` text COLLATE utf8mb4_general_ci,
  `stockCount` text COLLATE utf8mb4_general_ci,
  `currency` text COLLATE utf8mb4_general_ci,
  `price` text COLLATE utf8mb4_general_ci,
  `total` text COLLATE utf8mb4_general_ci,
  `kdv_buy` text COLLATE utf8mb4_general_ci,
  `kdv_sell` text COLLATE utf8mb4_general_ci,
  `export_registered` text COLLATE utf8mb4_general_ci,
  `export_registered_kdv_buy` text COLLATE utf8mb4_general_ci,
  `export_registered_kdv_sell` text COLLATE utf8mb4_general_ci,
  `descriptionTr` text COLLATE utf8mb4_general_ci,
  `descriptionEn` text COLLATE utf8mb4_general_ci,
  `featuresTr` text COLLATE utf8mb4_general_ci,
  `featuresEn` text COLLATE utf8mb4_general_ci,
  `tech_featuresTr` text COLLATE utf8mb4_general_ci,
  `tech_featuresEn` text COLLATE utf8mb4_general_ci,
  `web_address` text COLLATE utf8mb4_general_ci,
  `catalogLink` text COLLATE utf8mb4_general_ci,
  `brand` text COLLATE utf8mb4_general_ci,
  `colorCode` text COLLATE utf8mb4_general_ci,
  `is_warranty` text COLLATE utf8mb4_general_ci,
  `warrantyTime` text COLLATE utf8mb4_general_ci,
  `productModel` text COLLATE utf8mb4_general_ci,
  `productCode` text COLLATE utf8mb4_general_ci,
  `setup` text COLLATE utf8mb4_general_ci,
  `gtipNo` text COLLATE utf8mb4_general_ci,
  `productUsePurposeTR` text COLLATE utf8mb4_general_ci,
  `productUsePurposeEN` text COLLATE utf8mb4_general_ci,
  `ownBrand` text COLLATE utf8mb4_general_ci,
  `specialDesign` text COLLATE utf8mb4_general_ci,
  `specialPacket` text COLLATE utf8mb4_general_ci,
  `salesOutlet` text COLLATE utf8mb4_general_ci,
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
-- Tablo döküm verisi `proforma_product_list`
--

INSERT INTO `proforma_product_list` (`id`, `serverId`, `serverToken`, `time`, `cost_calculation_id`, `proforma_id`, `sector`, `sub_sector`, `stock_id`, `nameTr`, `nameEn`, `imgUrl`, `techFileUrl`, `stockUnit`, `stockCount`, `currency`, `price`, `total`, `kdv_buy`, `kdv_sell`, `export_registered`, `export_registered_kdv_buy`, `export_registered_kdv_sell`, `descriptionTr`, `descriptionEn`, `featuresTr`, `featuresEn`, `tech_featuresTr`, `tech_featuresEn`, `web_address`, `catalogLink`, `brand`, `colorCode`, `is_warranty`, `warrantyTime`, `productModel`, `productCode`, `setup`, `gtipNo`, `productUsePurposeTR`, `productUsePurposeEN`, `ownBrand`, `specialDesign`, `specialPacket`, `salesOutlet`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(110, 3, 'serverToken2', 1688985823, 140, '63', '69', 36, 66, 'Proforma Güncelleme', 'Verox BetonKontakt ( Primer for Creating an Exposed  Concere Surface )', '/assets/img/product/default.jpg', NULL, 'Adet', '12', 'Dolar', '30', '360.00', '11', '12', 'true', '13', '14', 'Açıklama TR', 'Açıklama EN', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Ürün Web Sitesi', 'Katalog Linki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gıda Gtip nO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-10 10:43:43', 1, 1, '2023-07-10 12:00:15', NULL, 1, 0, NULL, NULL),
(111, 3, 'serverToken2', 1688985823, 141, '63', '69', 36, 66, 'Talep  Test #2', 'Verox BetonKontakt ( Primer for Creating an Exposed  Concere Surface )', '/assets/img/product/default.jpg', NULL, 'Adet', '12', 'Dolar', '31', '372.00', '11', '12', 'true', '13', '14', 'Açıklama TR', 'Açıklama EN', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Ürün Web Sitesi', 'Katalog Linki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gıda Gtip nO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-10 10:43:43', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(117, 3, 'serverToken2', 1688985823, 146, '63', '69', 36, 65, 'Proforma', 'Verox Acryl Based Liquis Membrane-Bericalam', '/assets/img/product/default.jpg', NULL, 'Ton', '10', 'Dolar', '68', '680.00', '17', '18', 'true', '19', '20', 'Açıklama TR', 'Açıklama EN', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Ürün Web Sitesi', 'Katalog Linki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'T53656565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-10 11:33:29', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `proforma_product_list`
--
ALTER TABLE `proforma_product_list`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `proforma_product_list`
--
ALTER TABLE `proforma_product_list`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
