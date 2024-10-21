-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:34:51
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
-- Tablo için tablo yapısı `proforma_product_list`
--

CREATE TABLE `proforma_product_list` (
  `id` int(11) NOT NULL,
  `serverId` int(11) DEFAULT NULL,
  `serverToken` text DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `cost_calculation_id` int(11) DEFAULT NULL,
  `proforma_id` text DEFAULT NULL,
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
  `imgUrl` text DEFAULT NULL,
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
-- Tablo döküm verisi `proforma_product_list`
--

INSERT INTO `proforma_product_list` (`id`, `serverId`, `serverToken`, `time`, `cost_calculation_id`, `proforma_id`, `sector`, `sub_sector`, `stock_id`, `nameTr`, `nameEn`, `stockUnit`, `stockCount`, `currency`, `price`, `total`, `kdv_buy`, `kdv_sell`, `export_registered`, `export_registered_kdv_buy`, `export_registered_kdv_sell`, `featuresTr`, `featuresEn`, `tech_featuresTr`, `tech_featuresEn`, `descriptionTr`, `descriptionEn`, `catalogLink`, `web_address`, `imgUrl`, `techFileUrl`, `brand`, `colorCode`, `is_warranty`, `warrantyTime`, `productModel`, `productCode`, `setup`, `gtipNo`, `productUsePurposeTR`, `productUsePurposeEN`, `ownBrand`, `specialDesign`, `specialPacket`, `salesOutlet`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(118, 3, 'serverToken2', 1729479092, 152, '64', '60', 42, 102, 'Ad Güncelleme', NULL, 'Adet', '10', 'Dolar', '2', '20.00', '11', '21', 'true', '31', '41', 'Özellikler ( TR ) Güncelleme', NULL, 'Teknik Özellik ( TR ) Güncelleme', NULL, 'Açıklama ( TR ) Güncelleme', NULL, 'Katalog Linki Güncelleme', 'Ürün Web Sitesi Güncelleme', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GTIP Kodu Güncelleme', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-21 02:51:32', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(119, 3, 'serverToken2', 1729479092, 153, '64', '60', 42, 103, 'Urun', NULL, 'Adet', '15', 'Dolar', '3', '45.00', '1', '2', 'true', '3', '4', 'Özellikler ( TR )', NULL, 'Teknik Özellik ( TR )', NULL, 'Açıklama ( TR )', NULL, 'Katalog Linki', 'Ürün Web Sitesi', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gtıp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-21 02:51:32', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(120, 3, 'serverToken2', 1729479851, 152, '65', '60', 42, 102, 'Ad Güncelleme', NULL, 'Adet', '10', 'Dolar', '2', '20.00', '11', '21', 'true', '31', '41', 'Özellikler ( TR ) Güncelleme', NULL, 'Teknik Özellik ( TR ) Güncelleme', NULL, 'Açıklama ( TR ) Güncelleme', NULL, 'Katalog Linki Güncelleme', 'Ürün Web Sitesi Güncelleme', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GTIP Kodu Güncelleme', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-21 03:04:11', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(121, 3, 'serverToken2', 1729479851, 153, '65', '60', 42, 103, 'Urun', NULL, 'Adet', '15', 'Dolar', '36', '540.00', '1', '2', 'true', '3', '4', 'Özellikler ( TR )', NULL, 'Teknik Özellik ( TR )', NULL, 'Açıklama ( TR )', NULL, 'Katalog Linki', 'Ürün Web Sitesi', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gtıp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-21 03:04:11', 1, 1, '2024-10-21 03:05:46', NULL, 1, 0, NULL, NULL),
(122, 3, 'serverToken2', 1729484380, 152, NULL, '60', 42, 102, 'Ad Güncelleme', NULL, 'Adet', '10', 'Dolar', '2', '20.00', '11', '21', 'true', '31', '41', 'Özellikler ( TR ) Güncelleme', NULL, 'Teknik Özellik ( TR ) Güncelleme', NULL, 'Açıklama ( TR ) Güncelleme', NULL, 'Katalog Linki Güncelleme', 'Ürün Web Sitesi Güncelleme', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GTIP Kodu Güncelleme', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-21 04:19:40', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(123, 3, 'serverToken2', 1729484380, 153, NULL, '60', 42, 103, 'Urun', NULL, 'Adet', '15', 'Dolar', '3', '45.00', '1', '2', 'true', '3', '4', 'Özellikler ( TR )', NULL, 'Teknik Özellik ( TR )', NULL, 'Açıklama ( TR )', NULL, 'Katalog Linki', 'Ürün Web Sitesi', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gtıp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-21 04:19:40', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(124, 3, 'serverToken2', 1729484399, 154, NULL, '60', 42, 102, 'Ad Güncelleme', NULL, 'Adet', '10', 'Dolar', '2', '20.00', '11', '21', 'true', '31', '41', 'Özellikler ( TR ) Güncelleme', NULL, 'Teknik Özellik ( TR ) Güncelleme', NULL, 'Açıklama ( TR ) Güncelleme', NULL, 'Katalog Linki Güncelleme', 'Ürün Web Sitesi Güncelleme', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GTIP Kodu Güncelleme', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-21 04:19:59', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(125, 3, 'serverToken2', 1729484399, 155, NULL, '60', 42, 103, 'Urun', NULL, 'Adet', '15', 'Dolar', '3', '45.00', '1', '2', 'true', '3', '4', 'Özellikler ( TR )', NULL, 'Teknik Özellik ( TR )', NULL, 'Açıklama ( TR )', NULL, 'Katalog Linki', 'Ürün Web Sitesi', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gtıp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-21 04:19:59', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(126, 3, 'serverToken2', 1729484415, 154, NULL, '60', 42, 102, 'Ad Güncelleme', NULL, 'Adet', '10', 'Dolar', '2', '20.00', '11', '21', 'true', '31', '41', 'Özellikler ( TR ) Güncelleme', NULL, 'Teknik Özellik ( TR ) Güncelleme', NULL, 'Açıklama ( TR ) Güncelleme', NULL, 'Katalog Linki Güncelleme', 'Ürün Web Sitesi Güncelleme', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GTIP Kodu Güncelleme', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-21 04:20:15', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(127, 3, 'serverToken2', 1729484415, 155, NULL, '60', 42, 103, 'Urun', NULL, 'Adet', '15', 'Dolar', '3', '45.00', '1', '2', 'true', '3', '4', 'Özellikler ( TR )', NULL, 'Teknik Özellik ( TR )', NULL, 'Açıklama ( TR )', NULL, 'Katalog Linki', 'Ürün Web Sitesi', '/assets/img/product/default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gtıp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-21 04:20:15', 1, 0, NULL, NULL, 1, 0, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
