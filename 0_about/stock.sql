-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2024, 06:35:25
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
-- Tablo için tablo yapısı `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `serverId` int(11) DEFAULT NULL,
  `serverToken` text DEFAULT NULL,
  `sector` text DEFAULT NULL,
  `sub_sector` int(11) DEFAULT NULL,
  `codeNumber` text DEFAULT NULL,
  `stockCode` text DEFAULT NULL,
  `accountingCode_buy` text DEFAULT NULL,
  `accountingCode_sel` text DEFAULT NULL,
  `nameTr` text DEFAULT NULL,
  `nameEn` text DEFAULT NULL,
  `gtipNo` text DEFAULT NULL,
  `stockUnit` text DEFAULT NULL,
  `stockCount` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `price` text DEFAULT NULL,
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
-- Tablo döküm verisi `stock`
--

INSERT INTO `stock` (`id`, `serverId`, `serverToken`, `sector`, `sub_sector`, `codeNumber`, `stockCode`, `accountingCode_buy`, `accountingCode_sel`, `nameTr`, `nameEn`, `gtipNo`, `stockUnit`, `stockCount`, `currency`, `price`, `kdv_buy`, `kdv_sell`, `export_registered`, `export_registered_kdv_buy`, `export_registered_kdv_sell`, `featuresTr`, `featuresEn`, `tech_featuresTr`, `tech_featuresEn`, `descriptionTr`, `descriptionEn`, `catalogLink`, `web_address`, `imgUrl`, `techFileUrl`, `token`, `created_at`, `created_byId`, `isUpdated`, `updated_at`, `updated_byId`, `isActive`, `isDeleted`, `deleted_at`, `deleted_byId`) VALUES
(65, 3, 'serverToken2', '69', 36, '009', 'IN-YMS-009', '153.009', '610.009', 'Verox Acryl Based Liquis Membrane-Bericalam', 'Verox Acryl Based Liquis Membrane-Bericalam', 'T53656565', 'Ton', '10', 'TL', '68', '17', '18', 'true', '19', '20', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Açıklama TR', 'Açıklama EN', 'Katalog Linki', 'Ürün Web Sitesi', '/assets/img/product/default.jpg', NULL, NULL, '2023-07-05 12:17:52', 1, 1, '2023-07-08 13:18:53', NULL, 1, 0, NULL, NULL),
(66, 3, 'serverToken2', '69', 36, '010', 'IN-YMS-010', '153.010', '610.010', 'Verox BetonKontakt ( Pürüzsüz Yüzey Oluşturmak İçin Astar )', 'Verox BetonKontakt ( Primer for Creating an Exposed  Concere Surface )', 'Gıda Gtip nO', 'Adet', '12', 'DOLAR', '32', '11', '12', 'true', '13', '14', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Açıklama TR', 'Açıklama EN', 'Katalog Linki', 'Ürün Web Sitesi', '/assets/img/product/default.jpg', NULL, NULL, '2023-07-05 12:18:49', 1, 1, '2023-07-08 13:18:05', NULL, 1, 0, NULL, NULL),
(98, 3, 'serverToken2', '69', 36, '015', 'IN-YMS-015', '153.015', '610.015', 'Yeni Ürün', 'Verox Acryl Based Liquis Membrane-Bericalam', 'T53656565', 'Ton', '10', 'Euro', '68', '17', '18', 'true', '19', '20', 'Özellikler TR', 'Özellikler EN', 'Teknik Özellik TR', 'Teknik Özellik EN', 'Açıklama TR', 'Açıklama EN', 'Katalog Linki', 'Ürün Web Sitesi', '/assets/img/product/default.jpg', NULL, NULL, '2023-07-09 22:15:08', 1, 0, NULL, NULL, 0, 0, NULL, NULL),
(99, 3, 'serverToken2', '69', 35, '015', 'IN-YKS-015', '153.015', '610.015', 'Deneme', NULL, 'G-1', 'Adet', '100', 'Dolar', '15', '10', '5', 'false', NULL, NULL, 'Özellikler', NULL, 'Teknik Özellikler', NULL, 'Açıklama', NULL, NULL, NULL, '/assets/img/product/default.jpg', NULL, NULL, '2024-10-19 10:34:22', 1, 1, '2024-10-19 11:52:40', 1, 1, 0, NULL, NULL),
(100, 3, 'serverToken2', '60', 37, '016', 'Ahp-Ah-016', '153.016', '610.016', 'Deneme', NULL, 'G-1', 'Adet', '100', 'Dolar', '15', '10', '5', 'false', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/assets/img/product/default.jpg', NULL, NULL, '2024-10-19 11:56:51', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(101, 3, 'serverToken2', '60', 37, '017', 'Ahp-Ah-017', '153.017', '610.017', 'Deneme', NULL, NULL, 'Adet', '150', 'TL', '15', '10', '65', 'false', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/assets/img/product/default.jpg', NULL, NULL, '2024-10-19 11:58:18', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(102, 3, 'serverToken2', '60', 42, '018', 'Ahp-Ahp-018', '153.018', '610.018', 'Ad', NULL, NULL, 'Adet', '15', 'TL', '65', NULL, NULL, 'false', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/assets/img/product/default.jpg', NULL, NULL, '2024-10-19 23:07:29', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(103, 3, 'serverToken2', '60', 42, '019', 'Ahp-Ahp-019', '153.019', '610.019', 'Urun', NULL, 'Gtıp', 'Adet', '15', 'TL', '680', NULL, NULL, 'false', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/assets/img/product/default.jpg', NULL, NULL, '2024-10-20 07:31:10', 1, 0, NULL, NULL, 1, 0, NULL, NULL),
(104, 3, 'serverToken2', '60', 42, '020', 'Ahp-Ahp-020', '153.020', '610.020', 'Deneme', NULL, 'GTİP', 'Adet', '150', 'Dolar', '15', '10', '5', 'false', NULL, NULL, 'Özellikler', NULL, 'Teknik Özellikler', NULL, 'Acıklama', NULL, 'Katalog Linki', 'Ürün Web Sitesi', 'upload/uploads/1729409957.jpg', 'upload/uploads/1729410009.pdf', NULL, '2024-10-20 07:40:23', 1, 1, '2024-10-20 08:00:08', NULL, 1, 0, NULL, NULL),
(105, 3, 'serverToken2', '60', 42, '021', 'Ahp-Ahp-021', '153.021', '610.021', 'Herşey', NULL, 'GTİP', 'Adet', '10', 'Dolar', '15', '1', '2', 'true', '4', '5', 'Özellikler', NULL, 'Teknik Özellik', NULL, 'Açıklama', NULL, 'Katalog Linki', 'Ürün Web Sitesi', 'upload/uploads/1729410961.jpg', 'upload/uploads/1729410981.pdf', NULL, '2024-10-20 07:56:26', 1, 1, '2024-10-20 08:02:49', NULL, 1, 0, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
