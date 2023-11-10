-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 11 Tem 2023, 14:28:14
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
-- Tablo için tablo yapısı `stock`
--

CREATE TABLE `stock` (
  `id` int NOT NULL,
  `serverId` int DEFAULT NULL,
  `serverToken` text COLLATE utf8mb4_general_ci,
  `sector` text COLLATE utf8mb4_general_ci,
  `sub_sector` int DEFAULT NULL,
  `codeNumber` text COLLATE utf8mb4_general_ci,
  `stockCode` text COLLATE utf8mb4_general_ci,
  `accountingCode_buy` text COLLATE utf8mb4_general_ci,
  `accountingCode_sel` text COLLATE utf8mb4_general_ci,
  `nameTr` text COLLATE utf8mb4_general_ci,
  `nameEn` text COLLATE utf8mb4_general_ci,
  `imgUrl` text COLLATE utf8mb4_general_ci NOT NULL,
  `techFileUrl` text COLLATE utf8mb4_general_ci,
  `stockUnit` text COLLATE utf8mb4_general_ci,
  `stockCount` text COLLATE utf8mb4_general_ci,
  `currency` text COLLATE utf8mb4_general_ci,
  `price` text COLLATE utf8mb4_general_ci,
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
  `gtipNo` text COLLATE utf8mb4_general_ci,
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
-- Tablo döküm verisi `stock`
--

INSERT INTO `stock` (`id`, `serverId`, `serverToken`, `sector`, `sub_sector`, `codeNumber`, `stockCode`, `accountingCode_buy`, `accountingCode_sel`, `nameTr`, `nameEn`, `imgUrl`, `techFileUrl`, `stockUnit`, `stockCount`, `currency`, `price`, `kdv_buy`, `kdv_sell`, `export_registered`, `export_registered_kdv_buy`, `export_registered_kdv_sell`, `descriptionTr`, `descriptionEn`, `featuresTr`, `featuresEn`, `tech_featuresTr`, `tech_featuresEn`, `web_address`, `catalogLink`, `gtipNo`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(65, 3, 'serverToken2', '69', 36, '009', 'IN-YMS-009', '153.009', '610.009', 'Verox Acryl Based Liquis Membrane-Bericalam', 'Verox Acryl Based Liquis Membrane-Bericalam', '/assets/img/product/default.jpg', NULL, 'Ton', '10', 'TL', '68', '17', '18', 'true', '19', '20', 'Açıklama TR', 'Açıklama EN', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Ürün Web Sitesi', 'Katalog Linki', 'T53656565', NULL, '2023-07-05 12:17:52', 1, 1, '2023-07-08 13:18:53', NULL, 1, 0, NULL, NULL),
(66, 3, 'serverToken2', '69', 36, '010', 'IN-YMS-010', '153.010', '610.010', 'Verox BetonKontakt ( Pürüzsüz Yüzey Oluşturmak İçin Astar )', 'Verox BetonKontakt ( Primer for Creating an Exposed  Concere Surface )', '/assets/img/product/default.jpg', NULL, 'Adet', '12', 'DOLAR', '32', '11', '12', 'true', '13', '14', 'Açıklama TR', 'Açıklama EN', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Ürün Web Sitesi', 'Katalog Linki', 'Gıda Gtip nO', NULL, '2023-07-05 12:18:49', 1, 1, '2023-07-11 13:43:47', 1, 0, 0, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
