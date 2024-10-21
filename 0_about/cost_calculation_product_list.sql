-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:33:57
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
-- Tablo için tablo yapısı `cost_calculation_product_list`
--

CREATE TABLE `cost_calculation_product_list` (
  `id` int(11) NOT NULL,
  `serverId` int(11) DEFAULT NULL,
  `serverToken` text DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `get_offers_id` int(11) DEFAULT NULL,
  `cost_calculation_id` text DEFAULT NULL,
  `sector` text DEFAULT NULL,
  `sub_sector` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `nameTr` text DEFAULT NULL,
  `nameEn` text DEFAULT NULL,
  `stockUnit` text DEFAULT NULL,
  `stockCount` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `total` text DEFAULT NULL,
  `kdv_buy` text DEFAULT NULL,
  `kdv_sell` text DEFAULT NULL,
  `export_registered` text DEFAULT NULL,
  `export_registered_kdv_buy` text DEFAULT NULL,
  `export_registered_kdv_sell` text DEFAULT NULL,
  `featuresTr` text DEFAULT NULL,
  `featuresEn` text DEFAULT NULL,
  `tech_featuresTr` text DEFAULT NULL,
  `tech_featuresEn` text DEFAULT NULL,
  `descriptionTr` text DEFAULT NULL,
  `descriptionEn` text DEFAULT NULL,
  `catalogLink` text DEFAULT NULL,
  `web_address` text DEFAULT NULL,
  `imgUrl` text NOT NULL,
  `techFileUrl` text DEFAULT NULL,
  `brand` text DEFAULT NULL,
  `colorCode` text DEFAULT NULL,
  `is_warranty` text DEFAULT NULL,
  `warrantyTime` text DEFAULT NULL,
  `productModel` text DEFAULT NULL,
  `productCode` text DEFAULT NULL,
  `setup` text DEFAULT NULL,
  `gtipNo` text DEFAULT NULL,
  `productUsePurposeTR` text DEFAULT NULL,
  `productUsePurposeEN` text DEFAULT NULL,
  `ownBrand` text DEFAULT NULL,
  `specialDesign` text DEFAULT NULL,
  `specialPacket` text DEFAULT NULL,
  `salesOutlet` text DEFAULT NULL,
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
-- Tablo döküm verisi `cost_calculation_product_list`
--

INSERT INTO `cost_calculation_product_list` (`id`, `serverId`, `serverToken`, `time`, `get_offers_id`, `cost_calculation_id`, `sector`, `sub_sector`, `stock_id`, `nameTr`, `nameEn`, `stockUnit`, `stockCount`, `currency`, `price`, `total`, `kdv_buy`, `kdv_sell`, `export_registered`, `export_registered_kdv_buy`, `export_registered_kdv_sell`, `featuresTr`, `featuresEn`, `tech_featuresTr`, `tech_featuresEn`, `descriptionTr`, `descriptionEn`, `catalogLink`, `web_address`, `imgUrl`, `techFileUrl`, `brand`, `colorCode`, `is_warranty`, `warrantyTime`, `productModel`, `productCode`, `setup`, `gtipNo`, `productUsePurposeTR`, `productUsePurposeEN`, `ownBrand`, `specialDesign`, `specialPacket`, `salesOutlet`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(140, 3, 'serverToken2', 1688978931, 90, '132', '69', 36, 66, 'Talep  Test #1 Güncelle', 'Verox BetonKontakt ( Primer for Creating an Exposed  Concere Surface )', 'Adet', '12', 'Dolar', '30', '360.00', '11', '12', 'true', '13', '14', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Açıklama TR', 'Açıklama EN', 'Katalog Linki', 'Ürün Web Sitesi', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gıda Gtip nO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-10 08:48:51', 1, 1, '2023-07-10 10:02:34', NULL, 1, 0, NULL, NULL),
(141, 3, 'serverToken2', 1688978931, 91, '132', '69', 36, 66, 'Talep  Test #2', 'Verox BetonKontakt ( Primer for Creating an Exposed  Concere Surface )', 'Adet', '12', 'Dolar', '31', '372.00', '11', '12', 'true', '13', '14', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Açıklama TR', 'Açıklama EN', 'Katalog Linki', 'Ürün Web Sitesi', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gıda Gtip nO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-10 08:48:51', 1, 1, '2023-07-10 10:02:44', NULL, 1, 0, NULL, NULL),
(146, 3, 'serverToken2', 1688978931, 65, '132', '69', 36, 65, 'Verox Acryl Based Liquis Membrane-Bericalam', 'Verox Acryl Based Liquis Membrane-Bericalam', 'Ton', '10', 'Dolar', '68', '680.00', '17', '18', 'true', '19', '20', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Açıklama TR', 'Açıklama EN', 'Katalog Linki', 'Ürün Web Sitesi', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'T53656565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-10 11:30:25', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(149, 3, 'serverToken2', 1729350548, 90, '133', '69', 36, 66, 'Talep  Test #1', 'Verox BetonKontakt ( Primer for Creating an Exposed  Concere Surface )', 'Adet', '12', 'Dolar', '32', '384.00', '11', '12', 'true', '13', '14', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Açıklama TR', 'Açıklama EN', 'Katalog Linki', 'Ürün Web Sitesi', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gıda Gtip nO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-19 15:09:08', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(150, 3, 'serverToken2', 1729350548, 91, '133', '69', 36, 66, 'Talep  Test #2', 'Verox BetonKontakt ( Primer for Creating an Exposed  Concere Surface )', 'Adet', '12', 'Dolar', '32', '384.00', '11', '12', 'true', '13', '14', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Açıklama TR', 'Açıklama EN', 'Katalog Linki', 'Ürün Web Sitesi', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gıda Gtip nO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-19 15:09:08', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(151, 3, 'serverToken2', 1729350548, 92, '133', '69', 36, 65, 'Verox Acryl Based Liquis Membrane-Bericalam', 'Verox Acryl Based Liquis Membrane-Bericalam', 'Ton', '10', 'Dolar', '68', '680.00', '17', '18', 'true', '19', '20', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Açıklama TR', 'Açıklama EN', 'Katalog Linki', 'Ürün Web Sitesi', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'T53656565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-19 15:09:08', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(152, 3, 'serverToken2', 1729478658, 94, '136', '60', 42, 102, 'Ad Güncelleme', NULL, 'Adet', '10', 'Dolar', '2', '20.00', '11', '21', 'true', '31', '41', 'Özellikler ( TR ) Güncelleme', NULL, 'Teknik Özellik ( TR ) Güncelleme', NULL, 'Açıklama ( TR ) Güncelleme', NULL, 'Katalog Linki Güncelleme', 'Ürün Web Sitesi Güncelleme', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GTIP Kodu Güncelleme', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-21 02:44:18', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(153, 3, 'serverToken2', 1729478658, 95, '136', '60', 42, 103, 'Urun', NULL, 'Adet', '15', 'Dolar', '3', '45.00', '1', '2', 'true', '3', '4', 'Özellikler ( TR )', NULL, 'Teknik Özellik ( TR )', NULL, 'Açıklama ( TR )', NULL, 'Katalog Linki', 'Ürün Web Sitesi', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gtıp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-21 02:44:18', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(154, 3, 'serverToken2', 1729481788, 94, '137', '60', 42, 102, 'Ad Güncelleme', NULL, 'Adet', '10', 'Dolar', '2', '20.00', '11', '21', 'true', '31', '41', 'Özellikler ( TR ) Güncelleme', NULL, 'Teknik Özellik ( TR ) Güncelleme', NULL, 'Açıklama ( TR ) Güncelleme', NULL, 'Katalog Linki Güncelleme', 'Ürün Web Sitesi Güncelleme', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GTIP Kodu Güncelleme', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-21 03:36:28', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(155, 3, 'serverToken2', 1729481788, 95, '137', '60', 42, 103, 'Urun', NULL, 'Adet', '15', 'Dolar', '3', '45.00', '1', '2', 'true', '3', '4', 'Özellikler ( TR )', NULL, 'Teknik Özellik ( TR )', NULL, 'Açıklama ( TR )', NULL, 'Katalog Linki', 'Ürün Web Sitesi', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gtıp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-21 03:36:28', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cost_calculation_product_list`
--
ALTER TABLE `cost_calculation_product_list`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `cost_calculation_product_list`
--
ALTER TABLE `cost_calculation_product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
