-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:35:04
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
-- Tablo için tablo yapısı `requestform_product_list`
--

CREATE TABLE `requestform_product_list` (
  `id` int(11) NOT NULL,
  `serverId` int(11) DEFAULT NULL,
  `serverToken` text DEFAULT NULL,
  `requestform_id` int(11) DEFAULT NULL,
  `sector` text DEFAULT NULL,
  `sub_sector` int(11) DEFAULT NULL,
  `stock_id` text DEFAULT NULL,
  `nameTr` text DEFAULT NULL,
  `nameEn` text DEFAULT NULL,
  `gtipNo` text DEFAULT NULL,
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
  `web_address` text DEFAULT NULL,
  `catalogLink` text DEFAULT NULL,
  `imgUrl` text DEFAULT NULL,
  `techFileUrl` text DEFAULT NULL,
  `brand` text DEFAULT NULL,
  `colorCode` text DEFAULT NULL,
  `is_warranty` text DEFAULT NULL,
  `warrantyTime` text DEFAULT NULL,
  `productModel` text DEFAULT NULL,
  `productCode` text DEFAULT NULL,
  `setup` text DEFAULT NULL,
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
-- Tablo döküm verisi `requestform_product_list`
--

INSERT INTO `requestform_product_list` (`id`, `serverId`, `serverToken`, `requestform_id`, `sector`, `sub_sector`, `stock_id`, `nameTr`, `nameEn`, `gtipNo`, `stockUnit`, `stockCount`, `currency`, `price`, `total`, `kdv_buy`, `kdv_sell`, `export_registered`, `export_registered_kdv_buy`, `export_registered_kdv_sell`, `featuresTr`, `featuresEn`, `tech_featuresTr`, `tech_featuresEn`, `descriptionTr`, `descriptionEn`, `web_address`, `catalogLink`, `imgUrl`, `techFileUrl`, `brand`, `colorCode`, `is_warranty`, `warrantyTime`, `productModel`, `productCode`, `setup`, `productUsePurposeTR`, `productUsePurposeEN`, `ownBrand`, `specialDesign`, `specialPacket`, `salesOutlet`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(91, 3, 'serverToken2', 65, '60', 42, '102', 'Ad Güncelleme', 'Ürün Adı ( EN ) Güncelleme', 'GTIP Kodu Güncelleme', 'Adet', '10', 'Dolar', '2', '20.00', '11', '21', 'true', '31', '41', 'Özellikler ( TR ) Güncelleme', 'Özellikler ( EN ) Güncelleme', 'Teknik Özellik ( TR ) Güncelleme', 'Teknik Özellik ( EN ) Güncelleme', 'Açıklama ( TR ) Güncelleme', 'Açıklama ( EN ) Güncelleme', 'Ürün Web Sitesi Güncelleme', 'Katalog Linki Güncelleme', 'upload/uploads/1729474228.jpg', 'upload/uploads/1729474249.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-21 01:28:09', 1, 1, '2024-10-21 01:38:49', NULL, 1, 0, NULL, NULL),
(92, 3, 'serverToken2', 65, '60', 42, '103', 'Urun', 'Ürün Adı ( EN )', 'Gtıp', 'Adet', '15', 'Dolar', '1', '15.00', '1', '2', 'true', '3', '4', 'Özellikler ( TR )', 'Özellikler ( EN )', 'Teknik Özellik ( TR )', 'Teknik Özellik ( EN )', 'Açıklama ( TR )', 'Açıklama ( EN )', 'Ürün Web Sitesi', 'Katalog Linki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-21 01:33:03', 1, 1, '2024-10-21 01:39:01', NULL, 1, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `requestform_product_list`
--
ALTER TABLE `requestform_product_list`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `requestform_product_list`
--
ALTER TABLE `requestform_product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
