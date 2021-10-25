-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 25 Eki 2021, 20:49:26
-- Sunucu sürümü: 5.7.23-0ubuntu0.18.04.1
-- PHP Sürümü: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ecotone`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `idcustomer` bigint(20) UNSIGNED NOT NULL,
  `customerid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double(8,2) NOT NULL DEFAULT '0.00',
  `vatnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calculatevat` tinyint(1) NOT NULL DEFAULT '1',
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_order_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auto_split` tinyint(1) NOT NULL DEFAULT '0',
  `idtemplate` int(11) NOT NULL DEFAULT '0',
  `idfulfilment_customer` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer_addresses`
--

CREATE TABLE `customer_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customerid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defaultinvoice` tinyint(1) NOT NULL DEFAULT '0',
  `defaultdelivery` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `locations`
--

CREATE TABLE `locations` (
  `idlocation` bigint(20) UNSIGNED NOT NULL,
  `idwarehouse` int(11) NOT NULL,
  `idlocation_type` int(11) NOT NULL DEFAULT '0',
  `parent_idlocation` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unlink_on_empty` tinyint(1) NOT NULL DEFAULT '0',
  `is_bulk_location` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `locations`
--

INSERT INTO `locations` (`idlocation`, `idwarehouse`, `idlocation_type`, `parent_idlocation`, `name`, `unlink_on_empty`, `is_bulk_location`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2396428, 5766, 3227, 0, 'A', 0, 0, NULL, '2021-10-25 20:18:51', '2021-10-25 20:18:51'),
(2396429, 5766, 3227, 2396428, 'A1', 0, 0, NULL, '2021-10-25 20:18:51', '2021-10-25 20:18:51'),
(2396430, 5766, 3227, 2396429, 'A1D', 0, 0, NULL, '2021-10-25 20:18:51', '2021-10-25 20:18:51'),
(2396431, 5766, 3227, 2396428, 'A3', 0, 0, NULL, '2021-10-25 20:18:51', '2021-10-25 20:18:51'),
(2396432, 5766, 3227, 2396431, 'A3S', 0, 0, NULL, '2021-10-25 20:18:51', '2021-10-25 20:18:51'),
(2938913, 6209, 3227, 0, 'A1', 0, 0, NULL, '2021-10-25 20:18:51', '2021-10-25 20:18:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `location_types`
--

CREATE TABLE `location_types` (
  `idlocation_type` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '1',
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `location_types`
--

INSERT INTO `location_types` (`idlocation_type`, `name`, `default`, `color`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3227, 'Standaard', 1, '#0000f0', NULL, '2021-10-25 20:18:51', '2021-10-25 20:18:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(77, '2014_10_12_000000_create_users_table', 1),
(78, '2014_10_12_100000_create_password_resets_table', 1),
(79, '2019_08_19_000000_create_failed_jobs_table', 1),
(80, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(81, '2021_10_22_062603_create_products_table', 1),
(82, '2021_10_22_070840_create_customers_table', 1),
(83, '2021_10_22_114237_create_customer_addresses_table', 1),
(84, '2021_10_22_115530_create_orders_table', 1),
(85, '2021_10_22_121639_create_order_products_table', 1),
(86, '2021_10_22_122647_create_vat_groups_table', 1),
(87, '2021_10_22_125003_create_suppliers_table', 1),
(88, '2021_10_24_161751_create_stocks_table', 1),
(89, '2021_10_24_162811_create_warehouses_table', 1),
(90, '2021_10_25_193513_create_locations_table', 1),
(91, '2021_10_25_194056_create_location_types_table', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `idorder` bigint(20) UNSIGNED NOT NULL,
  `idcustomer` int(11) NOT NULL DEFAULT '0',
  `idtemplate` int(11) NOT NULL DEFAULT '0',
  `idshippingprovider_profile` int(11) NOT NULL DEFAULT '0',
  `orderid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliveryname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliverycontactname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliveryaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliveryaddress2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliveryzipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliverycity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliveryregion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliverycountry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_delivery_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoicename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoicecontactname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoiceaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoiceaddress2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoicezipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoicecity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoiceregion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoicecountry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_invoice_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partialdelivery` tinyint(1) NOT NULL DEFAULT '0',
  `discount` double(8,2) NOT NULL DEFAULT '0.00',
  `invoiced` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idfulfilment_customer` int(11) NOT NULL DEFAULT '0',
  `preferred_delivery_date` date DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`idorder`, `idcustomer`, `idtemplate`, `idshippingprovider_profile`, `orderid`, `deliveryname`, `deliverycontactname`, `deliveryaddress`, `deliveryaddress2`, `deliveryzipcode`, `deliverycity`, `deliveryregion`, `deliverycountry`, `full_delivery_address`, `invoicename`, `invoicecontactname`, `invoiceaddress`, `invoiceaddress2`, `invoicezipcode`, `invoicecity`, `invoiceregion`, `invoicecountry`, `full_invoice_address`, `telephone`, `emailaddress`, `reference`, `customer_remarks`, `partialdelivery`, `discount`, `invoiced`, `status`, `idfulfilment_customer`, `preferred_delivery_date`, `language`, `deleted_at`, `created_at`, `updated_at`) VALUES
(44927860, 20759533, 4994, 0, 'O2020-1000', 'Ivar de JOng', 'Ivar dejong', 'Bark 19', NULL, '3232CA', 'Brielle', NULL, 'NL', 'Ivar de JOng\nIvar dejong\nBark 19\n3232CA Brielle\nNederland', 'Ivar de JOng', 'Ivar dejong', 'Bark 19', NULL, '3232CA', 'Brielle', NULL, 'NL', 'Ivar de JOng\nIvar dejong\nBark 19\n3232CA Brielle\nNederland', NULL, 'i.dejong@fairweb.nl', NULL, NULL, 1, 20.00, 0, 'completed', 0, NULL, 'nl', NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(46053169, 0, 4994, 0, 'O2020-1001', 'TEst', 'Test', 'Teststraat 1', NULL, '1234AB', 'Spijkenisse', NULL, 'NL', 'TEst\nTest\nTeststraat 1\n1234AB Spijkenisse\nNederland', 'Test', 'Test', 'Teststraat 1', NULL, '1234AB', 'Spijkenisse', NULL, 'NL', 'Test\nTest\nTeststraat 1\n1234AB Spijkenisse\nNederland', NULL, NULL, NULL, NULL, 1, 0.00, 0, 'completed', 0, NULL, 'nl', NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(46053598, 20759533, 4994, 0, 'O2020-1002', 'Ivar de JOng', 'Ivar dejong', 'Bark 19', NULL, '3232CA', 'Brielle', NULL, 'NL', 'Ivar de JOng\nIvar dejong\nBark 19\n3232CA Brielle\nNederland', 'Ivar de JOng', 'Ivar dejong', 'Bark 19', NULL, '3232CA', 'Brielle', NULL, 'NL', 'Ivar de JOng\nIvar dejong\nBark 19\n3232CA Brielle\nNederland', NULL, 'i.dejong@fairweb.nl', NULL, NULL, 1, 20.00, 0, 'cancelled', 0, NULL, 'nl', NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(46588490, 20759533, 4994, 0, 'O2020-1003', 'Ivar de Jong', NULL, 'Kubus 141', NULL, '3364DG', 'Sliedrecht', NULL, 'NL', 'Ivar de Jong\nKubus 141\n3364DG Sliedrecht\nNederland', 'Ivar de Jong', NULL, 'Kubus 141', NULL, '3364DG', 'Sliedrecht', NULL, 'NL', 'Ivar de Jong\nKubus 141\n3364DG Sliedrecht\nNederland', NULL, 'i.dejong@fairweb.nl', NULL, NULL, 1, 20.00, 0, 'completed', 0, NULL, 'nl', NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(46588589, 20759533, 4994, 0, 'O2020-1004', 'Ivar de Jong', NULL, 'Kubus 141', NULL, '3364DG', 'Sliedrecht', NULL, 'NL', 'Ivar de Jong\nKubus 141\n3364DG Sliedrecht\nNederland', 'Ivar de Jong', NULL, 'Kubus 141', NULL, '3364DG', 'Sliedrecht', NULL, 'NL', 'Ivar de Jong\nKubus 141\n3364DG Sliedrecht\nNederland', NULL, 'i.dejong@fairweb.nl', NULL, NULL, 1, 0.00, 0, 'completed', 0, NULL, 'nl', NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(46588625, 20759533, 4994, 0, 'O2020-1005', 'Ivar de Jong', NULL, 'Kubus 141', NULL, '3364DG', 'Sliedrecht', NULL, 'NL', 'Ivar de Jong\nKubus 141\n3364DG Sliedrecht\nNederland', 'Ivar de Jong', NULL, 'Kubus 141', NULL, '3364DG', 'Sliedrecht', NULL, 'NL', 'Ivar de Jong\nKubus 141\n3364DG Sliedrecht\nNederland', NULL, 'i.dejong@fairweb.nl', NULL, NULL, 1, 0.00, 0, 'completed', 0, NULL, 'nl', NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(46588975, 20759533, 4994, 0, 'O2020-1006', 'Ivar de Jong', NULL, 'Kubus 141', NULL, '3364DG', 'Sliedrecht', NULL, 'NL', 'Ivar de Jong\nKubus 141\n3364DG Sliedrecht\nNederland', 'Ivar de Jong', NULL, 'Kubus 141', NULL, '3364DG', 'Sliedrecht', NULL, 'NL', 'Ivar de Jong\nKubus 141\n3364DG Sliedrecht\nNederland', NULL, 'i.dejong@fairweb.nl', NULL, NULL, 1, 0.00, 0, 'cancelled', 0, NULL, 'nl', NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(46589842, 20759533, 4994, 0, 'O2020-1007', 'Ivar de Jong', NULL, 'Kubus 141', NULL, '3364DG', 'Sliedrecht', NULL, 'NL', 'Ivar de Jong\nKubus 141\n3364DG Sliedrecht\nNederland', 'Ivar de Jong', NULL, 'Kubus 141', NULL, '3364DG', 'Sliedrecht', NULL, 'NL', 'Ivar de Jong\nKubus 141\n3364DG Sliedrecht\nNederland', NULL, 'i.dejong@fairweb.nl', NULL, NULL, 1, 0.00, 0, 'completed', 0, NULL, 'nl', NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(51822375, 0, 4994, 0, 'O2021-1000', 'Ivar de Jong', NULL, 'Kubus 141', NULL, '3364DG', 'Sliedrecht', NULL, 'NL', 'Ivar de Jong\nKubus 141\n3364DG Sliedrecht\nNederland', 'Ivar de Jong', NULL, 'Kubus 141', NULL, '3364DG', 'Sliedrecht', NULL, 'NL', 'Ivar de Jong\nKubus 141\n3364DG Sliedrecht\nNederland', NULL, NULL, NULL, NULL, 0, 0.00, 0, 'completed', 0, NULL, 'nl', NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(53134847, 25119740, 4994, 0, 'O2021-1001', 'Fairweb', 'Ivar de Jong', 'Vroonstraat 27', NULL, '3237AW', 'Vierpolders', NULL, 'NL', 'Fairweb\nIvar de Jong\nVroonstraat 27\n3237AW Vierpolders\nNederland', 'Fairweb', 'Ivar de Jong', 'Vroonstraat 27', NULL, NULL, NULL, NULL, 'NL', 'Fairweb\nIvar de Jong\nVroonstraat 27\nNederland', NULL, NULL, NULL, NULL, 0, 0.00, 0, 'cancelled', 0, NULL, 'nl', NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(53134894, 20759533, 4994, 0, 'O2021-1002', 'Ivar de Jong', NULL, 'Kubus 141', NULL, '3364DG', 'Sliedrecht', NULL, 'NL', 'Ivar de Jong\nKubus 141\n3364DG Sliedrecht\nNederland', 'Ivar de Jong', NULL, 'Kubus 141', NULL, '3364DG', 'Sliedrecht', NULL, 'NL', 'Ivar de Jong\nKubus 141\n3364DG Sliedrecht\nNederland', NULL, 'i.dejong@fairweb.nl', NULL, NULL, 1, 0.00, 0, 'cancelled', 0, NULL, 'nl', NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(57061329, 20759533, 4994, 0, 'O2021-1003', 'Ivar de Jong', NULL, 'Kubus 141', NULL, '3364DG', 'Sliedrecht', NULL, 'NL', 'Ivar de Jong\nKubus 141\n3364DG Sliedrecht\nNederland', 'Ivar de Jong', NULL, 'Kubus 141', NULL, '3364DG', 'Sliedrecht', NULL, 'NL', 'Ivar de Jong\nKubus 141\n3364DG Sliedrecht\nNederland', NULL, 'i.dejong@fairweb.nl', NULL, NULL, 1, 0.00, 0, 'completed', 0, NULL, 'nl', NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(57061632, 25119740, 4994, 0, 'O2021-1004', 'Fairweb', 'Ivar de Jong', 'Vroonstraat 27', NULL, NULL, NULL, NULL, 'NL', 'Fairweb\nIvar de Jong\nVroonstraat 27\nNederland', 'Fairweb', 'Ivar de Jong', 'Vroonstraat 27', NULL, NULL, NULL, NULL, 'NL', 'Fairweb\nIvar de Jong\nVroonstraat 27\nNederland', NULL, NULL, NULL, NULL, 0, 0.00, 0, 'processing', 0, NULL, 'nl', NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_products`
--

CREATE TABLE `order_products` (
  `idorder_product` bigint(20) UNSIGNED NOT NULL,
  `idorder` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `productcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `idvatgroup` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `order_products`
--

INSERT INTO `order_products` (`idorder_product`, `idorder`, `idproduct`, `amount`, `productcode`, `name`, `remarks`, `price`, `idvatgroup`, `deleted_at`, `created_at`, `updated_at`) VALUES
(93555599, 44927860, 13840095, 5, 'TEST001', 'Test product', '', 100.00, 11362, NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(95584714, 46053169, 13840095, 4, 'TEST001', 'Test product', '', 80.00, 11362, NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(95585582, 46053598, 13840095, 1, 'TEST001', 'Test product', '', 100.00, 11362, NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(96566711, 46588490, 14650788, 2, 'DC2436', 'Douchecabine - Azura - 90x90', '', 304.96, 11362, NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(96566966, 46588589, 14650803, 1, 'DC2741', 'Douchebak Smooth Hoog Vierkant 90x90x16.5', '', 114.88, 11362, NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(96566999, 46588625, 14650805, 1, 'DC9999', 'Complete Douchecabine 90x90', '', 400.00, 11362, NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(96567667, 46588975, 14650788, 1, 'DC2436', 'Douchecabine - Azura - 90x90', '', 304.96, 11362, NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(96567668, 46588975, 14650803, 1, 'DC2741', 'Douchebak Smooth Hoog Vierkant 90x90x16.5', '', 114.88, 11362, NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(96569123, 46588625, 14650788, 1, 'DC2436', 'Douchecabine - Azura - 90x90', NULL, 0.00, 11362, NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(96569124, 46588625, 14650803, 1, 'DC2741', 'Douchebak Smooth Hoog Vierkant 90x90x16.5', NULL, 0.00, 11362, NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(96569350, 46589842, 14650788, 1, 'DC2436', 'Douchecabine - Azura - 90x90', '', 304.96, 11362, NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(106181271, 51822375, 14650803, 1, 'DC2741', 'Douchebak Smooth Hoog Vierkant 90x90x16.5', '', 114.88, 11362, NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(106181272, 51822375, 14650788, 1, 'DC2436', 'Douchecabine - Azura - 90x90', '', 304.96, 11362, NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(108765587, 53134847, 14650803, 1, 'DC2741', 'Douchebak Smooth Hoog Vierkant 90x90x16.5', '', 114.88, 11362, NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(121150607, 57061329, 14650805, 2, 'ECO10005', 'HP 36A (CB436A) toner black 4000 pages (Ecotone)', '', 85.50, 11362, NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07'),
(121151290, 57061632, 15592222, 2, 'ECO10048', 'Lexmark 12A7465 toner black 21000 pages (Ecotone)', '', 104.50, 11362, NULL, '2021-10-25 20:18:07', '2021-10-25 20:18:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `idproduct` bigint(20) UNSIGNED NOT NULL,
  `idvatgroup` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `fixedstockprice` double(8,2) NOT NULL DEFAULT '0.00',
  `idsupplier` int(11) NOT NULL DEFAULT '0',
  `productcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productcode_supplier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliverytime` int(11) NOT NULL DEFAULT '0',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unlimitedstock` tinyint(1) NOT NULL DEFAULT '0',
  `weight` int(11) NOT NULL DEFAULT '0',
  `length` int(11) NOT NULL DEFAULT '0',
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `minimum_purchase_quantity` int(11) NOT NULL DEFAULT '0',
  `purchase_in_quantities_of` int(11) NOT NULL DEFAULT '0',
  `hs_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_of_origin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `idfulfilment_customer` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`idproduct`, `idvatgroup`, `name`, `price`, `fixedstockprice`, `idsupplier`, `productcode`, `productcode_supplier`, `deliverytime`, `description`, `barcode`, `type`, `unlimitedstock`, `weight`, `length`, `width`, `height`, `minimum_purchase_quantity`, `purchase_in_quantities_of`, `hs_code`, `country_of_origin`, `active`, `idfulfilment_customer`, `deleted_at`, `created_at`, `updated_at`) VALUES
(14650788, 11362, 'Ecotone box 375x135x110mm Small', 0.00, 0.69, 71546, 'ECOBOX1', NULL, 2, NULL, NULL, 'normal', 0, 0, 0, 0, 0, 0, 0, NULL, 'FR', 1, 0, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(14650803, 11362, 'HP 36A (CB436A) toner black 4000 pages (BULK)', 85.50, 16.10, 71544, 'BUL10005', '350638-071494', 0, NULL, NULL, 'normal', 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1, 0, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(14650805, 11364, 'HP 36A (CB436A) toner black 4000 pages (Ecotone) updated thru api', 85.60, 0.00, 71544, 'ECO10005-1', NULL, 3, 'ASDASDASD', NULL, 'normal', 0, 1, 5, 5, 5, 0, 0, NULL, NULL, 1, 0, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(15592222, 11362, '11 Lexssssssmark 12A7465 toner black 21000 pages (Ecotone)', 104.50, 0.00, 71544, 'ECO10048', 'K12007E3', 0, NULL, NULL, 'composition_with_stock', 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1, 0, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(16679548, 11362, 'Lexmark 12A7465 toner black 21000 pages', 104.50, 0.00, 0, 'BUL10048', NULL, 0, '12A7465', NULL, 'normal', 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1, 0, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(16679549, 11362, 'Ecotone box 375x165x360mm Large', 4.00, 1.00, 0, 'ECOBOX3', NULL, 0, NULL, NULL, 'normal', 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1, 0, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(18128253, 11362, 'EMTEC 4 GB', 50.00, 0.00, 0, 'B0020MLK00', NULL, 0, NULL, '1234567890', 'normal', 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1, 0, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(20766322, 11362, 'sdafasfdsf', 24234.00, 222.00, 71546, '4GPFEY7W', '1', 4234, NULL, NULL, 'normal', 0, 0, 0, 0, 0, 0, 0, '1', NULL, 1, 0, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(20766741, 11362, 'Türkçe', 11.00, 3333.00, 71546, '2V5TIHAH', '11', 0, NULL, NULL, 'normal', 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1, 0, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stocks`
--

CREATE TABLE `stocks` (
  `idproduct_stock_history` bigint(20) UNSIGNED NOT NULL,
  `idproduct` int(11) NOT NULL,
  `idwarehouse` int(11) NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL DEFAULT '0',
  `reserved` int(11) NOT NULL DEFAULT '0',
  `reservedbackorders` int(11) NOT NULL DEFAULT '0',
  `reservedpicklists` int(11) NOT NULL DEFAULT '0',
  `reservedallocations` int(11) NOT NULL DEFAULT '0',
  `freestock` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `stocks`
--

INSERT INTO `stocks` (`idproduct_stock_history`, `idproduct`, `idwarehouse`, `stock`, `reserved`, `reservedbackorders`, `reservedpicklists`, `reservedallocations`, `freestock`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 18128253, 6621, 0, 0, 0, 0, 0, 0, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(2, 14650803, 5766, 0, 0, 0, 0, 0, 0, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(3, 16679548, 6209, 8, 0, 0, 0, 0, 8, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(4, 14650805, 5766, 0, 0, 0, 0, 0, 0, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(5, 14650805, 6209, 3, 0, 0, 0, 0, 3, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(6, 14650805, 6621, 6, 0, 0, 0, 0, 6, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(7, 14650805, 6824, 3, 0, 0, 0, 0, 3, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(8, 15592222, 6209, 3, 2, 0, 2, 0, 1, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(9, 15592222, 5766, 6, 0, 0, 0, 0, 6, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(10, 15592222, 6824, 6, 0, 0, 0, 0, 6, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(11, 14650788, 5766, 11, 33, 2, 123, 123, 24, '2021-10-25 20:46:40', '2021-10-25 20:18:50', '2021-10-25 20:46:40'),
(12, 16679549, 6209, 8, 0, 0, 0, 0, 8, NULL, '2021-10-25 20:18:50', '2021-10-25 20:18:50'),
(13, 14650788, 6209, 11, 11, 11, 11, 1, 1, NULL, '2021-10-25 20:36:09', '2021-10-25 20:36:09'),
(14, 14650788, 6209, 1, 21, 12, 12, 3, 13, NULL, '2021-10-25 20:39:23', '2021-10-25 20:39:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `suppliers`
--

CREATE TABLE `suppliers` (
  `idsupplier` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `suppliers`
--

INSERT INTO `suppliers` (`idsupplier`, `name`, `contactname`, `address`, `address2`, `zipcode`, `city`, `region`, `country`, `telephone`, `emailaddress`, `remarks`, `language`, `deleted_at`, `created_at`, `updated_at`) VALUES
(71544, 'Turbon Products AG', 'Test Contact', NULL, NULL, NULL, 'amsterdam', NULL, 'NL', NULL, NULL, NULL, 'nl', NULL, '2021-10-25 20:18:13', '2021-10-25 20:18:13'),
(71546, 'Armor', 'Cihan Test', NULL, NULL, NULL, 'Istanbul', NULL, 'NL', NULL, NULL, NULL, 'nl', NULL, '2021-10-25 20:18:13', '2021-10-25 20:18:13'),
(80302, 'Test Supplier', 'Cihan ARIK', NULL, NULL, NULL, 'Istanbul', NULL, 'TR', NULL, NULL, NULL, 'en', NULL, '2021-10-25 20:18:13', '2021-10-25 20:18:13'),
(80303, 'Created with all fields', 'Created with all fields', 'Created with all fields', 'Created with all fields', '23213213', 'Created with all fields', 'Created with all fields', 'TR', '123123123123', 'test@test.com', 'Created with all fields', 'en', NULL, '2021-10-25 20:18:13', '2021-10-25 20:18:13'),
(80330, 'test', 'asdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'en', NULL, '2021-10-25 20:18:13', '2021-10-25 20:18:13'),
(80357, 'Ivar de Jong', 'Ivar', NULL, NULL, NULL, NULL, NULL, 'AN', NULL, NULL, NULL, 'en', NULL, '2021-10-25 20:18:13', '2021-10-25 20:18:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `vat_groups`
--

CREATE TABLE `vat_groups` (
  `idvatgroup` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` double(8,2) NOT NULL DEFAULT '0.00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `vat_groups`
--

INSERT INTO `vat_groups` (`idvatgroup`, `name`, `percentage`, `deleted_at`, `created_at`, `updated_at`) VALUES
(11362, 'BTW Hoog', 21.00, NULL, '2021-10-25 20:18:18', '2021-10-25 20:18:18'),
(11363, 'BTW Laag', 9.00, NULL, '2021-10-25 20:18:18', '2021-10-25 20:18:18'),
(11364, 'Nultarief', 0.00, NULL, '2021-10-25 20:18:18', '2021-10-25 20:18:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `warehouses`
--

CREATE TABLE `warehouses` (
  `idwarehouse` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accept_orders` tinyint(1) NOT NULL DEFAULT '1',
  `counts_for_general_stock` tinyint(1) NOT NULL DEFAULT '1',
  `priority` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `warehouses`
--

INSERT INTO `warehouses` (`idwarehouse`, `name`, `accept_orders`, `counts_for_general_stock`, `priority`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5766, 'DC Schiedam', 1, 1, 1, 1, NULL, '2021-10-25 20:18:01', '2021-10-25 20:18:01'),
(6209, 'Magazijn Barendrecht', 1, 1, 1, 1, NULL, '2021-10-25 20:18:01', '2021-10-25 20:18:01'),
(6621, 'Amazon', 1, 1, 2, 1, NULL, '2021-10-25 20:18:01', '2021-10-25 20:18:01'),
(6824, 'test warehouse', 1, 1, 3, 1, NULL, '2021-10-25 20:18:01', '2021-10-25 20:18:01');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`idcustomer`);

--
-- Tablo için indeksler `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`idlocation`);

--
-- Tablo için indeksler `location_types`
--
ALTER TABLE `location_types`
  ADD PRIMARY KEY (`idlocation_type`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idorder`);

--
-- Tablo için indeksler `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`idorder_product`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idproduct`);

--
-- Tablo için indeksler `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`idproduct_stock_history`);

--
-- Tablo için indeksler `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`idsupplier`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Tablo için indeksler `vat_groups`
--
ALTER TABLE `vat_groups`
  ADD PRIMARY KEY (`idvatgroup`);

--
-- Tablo için indeksler `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`idwarehouse`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `idcustomer` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `locations`
--
ALTER TABLE `locations`
  MODIFY `idlocation` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2938914;

--
-- Tablo için AUTO_INCREMENT değeri `location_types`
--
ALTER TABLE `location_types`
  MODIFY `idlocation_type` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3228;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `idorder` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57061633;

--
-- Tablo için AUTO_INCREMENT değeri `order_products`
--
ALTER TABLE `order_products`
  MODIFY `idorder_product` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121151291;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `idproduct` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20766742;

--
-- Tablo için AUTO_INCREMENT değeri `stocks`
--
ALTER TABLE `stocks`
  MODIFY `idproduct_stock_history` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `idsupplier` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80358;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `vat_groups`
--
ALTER TABLE `vat_groups`
  MODIFY `idvatgroup` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11365;

--
-- Tablo için AUTO_INCREMENT değeri `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `idwarehouse` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6825;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
