-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2023 at 04:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `costudian`
--

-- --------------------------------------------------------

--
-- Table structure for table `backup_orders`
--

CREATE TABLE `backup_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `unit` bigint(20) DEFAULT NULL,
  `unit_cost` bigint(20) DEFAULT NULL,
  `total_cost` bigint(20) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `backup_orders`
--

INSERT INTO `backup_orders` (`id`, `item_name`, `quantity`, `unit`, `unit_cost`, `total_cost`, `remember_token`, `created_at`, `updated_at`, `item_type`) VALUES
(33, 'pencil', 100, 100, 0, 1000, NULL, '2023-07-23 22:34:57', '2023-07-23 22:34:57', 'consumable'),
(34, 'chair', 20, 0, 0, 1000, NULL, '2023-07-23 22:34:57', '2023-07-23 22:34:57', 'non-consumable');

-- --------------------------------------------------------

--
-- Table structure for table `backup_prepares`
--

CREATE TABLE `backup_prepares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `unit` bigint(20) NOT NULL,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `backup_prepares`
--

INSERT INTO `backup_prepares` (`id`, `item_name`, `quantity`, `unit`, `item_type`, `receiver`, `remember_token`, `created_at`, `updated_at`, `serial`) VALUES
(1, 'pencil', 10, 10, 'consumable', 'ruel perez', NULL, '2023-07-13 20:30:47', '2023-07-13 20:30:47', NULL),
(2, 'pencil', 50, 50, 'consumable', 'ruel perez', NULL, '2023-07-13 20:33:40', '2023-07-13 20:33:40', NULL),
(3, 'pencil', 49, 49, 'consumable', 'laine sales', NULL, '2023-07-13 20:35:24', '2023-07-13 20:35:24', NULL),
(4, 'ballpen', 49, 49, 'consumable', 'laine sales', NULL, '2023-07-13 20:35:24', '2023-07-13 20:35:24', NULL),
(5, 'printer', 1, 0, 'non-consumable', 'boboy perez', NULL, '2023-07-13 20:42:10', '2023-07-13 20:42:10', NULL),
(6, 'ballpen', 100, 0, 'consumable', 'laine sales', NULL, '2023-07-14 20:46:08', '2023-07-14 20:46:08', NULL),
(9, 'bondpaper', 0, 3, 'consumable', 'biboy flor', NULL, '2023-07-14 21:23:32', '2023-07-14 21:23:32', 'fgdt567'),
(10, 'pencil', 5, 0, 'consumable', 'laine sales', NULL, '2023-07-15 00:43:43', '2023-07-15 00:43:43', 'hfj6756'),
(17, 'printer', 0, 10, 'non-consumable', 'biboy flor', NULL, '2023-07-15 01:12:28', '2023-07-15 01:12:28', ''),
(21, 'printer', 1, 1, 'non-consumable', 'ruel perez', NULL, '2023-07-15 02:04:47', '2023-07-15 02:04:47', '1'),
(23, 'printer', 5, 0, 'non-consumable', 'biboy flor', NULL, '2023-07-22 23:01:19', '2023-07-22 23:01:19', NULL),
(24, 'ballpen', 5, 0, 'consumable', 'laine sales', NULL, '2023-07-22 23:18:44', '2023-07-22 23:18:44', NULL),
(25, 'ballpen', 5, 0, 'consumable', 'biboy flor', NULL, '2023-07-22 23:19:47', '2023-07-22 23:19:47', NULL),
(27, 'bondpaper', 5, 0, 'consumable', 'biboy flor', NULL, '2023-07-22 23:40:00', '2023-07-22 23:40:00', ''),
(28, 'pencil', 10, 0, 'consumable', 'biboy flor', NULL, '2023-07-22 23:41:27', '2023-07-22 23:41:27', ''),
(30, 'pencil', 20, 0, 'consumable', 'biboy flor', NULL, '2023-07-23 00:26:18', '2023-07-23 00:26:18', NULL),
(32, 'pencil', 100, 0, 'consumable', 'laine sales', NULL, '2023-07-23 02:00:52', '2023-07-23 02:00:52', NULL),
(33, 'pencil', 10, 0, 'consumable', 'biboy flor', NULL, '2023-07-23 02:00:52', '2023-07-23 02:00:52', ''),
(34, 'pencil', 5, 0, 'consumable', 'ruel perez', NULL, '2023-07-23 02:00:52', '2023-07-23 02:00:52', ''),
(35, 'pencil', 20, 0, 'consumable', 'laine sales', NULL, '2023-07-23 02:00:52', '2023-07-23 02:00:52', ''),
(36, 'pencil', 15, 0, 'consumable', 'laine sales', NULL, '2023-07-23 02:00:52', '2023-07-23 02:00:52', ''),
(37, 'pencil', 11, 0, 'consumable', 'biboy flor', NULL, '2023-07-23 02:00:52', '2023-07-23 02:00:52', ''),
(38, 'medical kit', 0, 5, 'sets', 'laine sales', NULL, '2023-07-23 07:30:19', '2023-07-23 07:30:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `backup_requests`
--

CREATE TABLE `backup_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `unit` bigint(20) DEFAULT NULL,
  `unit_cost` bigint(20) DEFAULT NULL,
  `total_cost` bigint(20) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `backup_requests`
--

INSERT INTO `backup_requests` (`id`, `item_name`, `quantity`, `unit`, `unit_cost`, `total_cost`, `remember_token`, `created_at`, `updated_at`, `item_type`) VALUES
(1, 'bondpaper', 1, 1, 1, 1, NULL, '2023-07-12 05:19:42', '2023-07-12 05:19:42', 'consumable'),
(2, 'pencil', 1, 1, 1, 1, NULL, '2023-07-12 05:19:42', '2023-07-12 05:19:42', 'consumable'),
(3, 'printer', 1, 1, 1, 1, NULL, '2023-07-12 05:19:42', '2023-07-12 05:19:42', 'non-consumable'),
(4, 'choke', 3, 10, 100, 500, NULL, '2023-07-12 05:50:09', '2023-07-12 05:50:09', 'consumable'),
(5, 'ink', 1, 2, 3, 4, NULL, '2023-07-12 05:50:09', '2023-07-12 05:50:09', 'consumable'),
(6, 'marker', 1, 1, 1, 1, NULL, '2023-07-12 05:50:09', '2023-07-12 05:50:09', 'consumable'),
(7, 'pencil', 100, 100, 0, 1000, NULL, '2023-07-23 22:35:28', '2023-07-23 22:35:28', 'consumable'),
(8, 'chair', 20, 0, 0, 1000, NULL, '2023-07-23 22:35:28', '2023-07-23 22:35:28', 'non-consumable');

-- --------------------------------------------------------

--
-- Table structure for table `backup_wastes`
--

CREATE TABLE `backup_wastes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `unit` bigint(20) NOT NULL,
  `receiver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `backup_wastes`
--

INSERT INTO `backup_wastes` (`id`, `item_name`, `quantity`, `unit`, `receiver`, `serial`, `condition`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'printer', 20, 0, 'laine sales', NULL, 'defected', NULL, '2023-07-15 00:24:00', '2023-07-15 00:24:00'),
(2, 'printer', 1, 0, 'ruel perez', 'fhf67675d', 'good', NULL, '2023-07-15 00:34:53', '2023-07-15 00:34:53'),
(3, 'printer', 20, 0, 'laine sales', NULL, 'good', NULL, '2023-07-15 00:35:48', '2023-07-15 00:35:48'),
(4, 'printer', 20, 0, 'laine sales', NULL, 'good', NULL, '2023-07-15 00:36:22', '2023-07-15 00:36:22'),
(5, 'printer', 1, 0, 'ruel perez', 'fhf67675d', 'defected', NULL, '2023-07-15 00:37:42', '2023-07-15 00:37:42'),
(6, 'printer', 1, 0, 'ruel perez', 'fhf67675d', 'good', NULL, '2023-07-15 00:40:48', '2023-07-15 00:40:48'),
(7, 'printer', 20, 0, 'laine sales', NULL, 'good', NULL, '2023-07-15 00:42:14', '2023-07-15 00:42:14'),
(8, 'printer', 1, 0, 'laine sales', 'fghyjyt', 'good', NULL, '2023-07-15 00:45:07', '2023-07-15 00:45:07'),
(9, 'printer', 0, 10, 'laine sales', '', 'good', NULL, '2023-07-15 00:45:47', '2023-07-15 00:45:47'),
(10, 'printer', 0, 5, 'ruel perez', 'cghgfh675', 'good', NULL, '2023-07-15 00:47:12', '2023-07-15 00:47:12'),
(11, 'printer', 0, 10, 'laine sales', '', 'defected', NULL, '2023-07-15 01:06:04', '2023-07-15 01:06:04'),
(12, 'printer', 0, 12, 'biboy flor', NULL, 'defected', NULL, '2023-07-15 01:09:28', '2023-07-15 01:09:28'),
(13, 'printer', 5, 0, 'biboy flor', NULL, 'defected', NULL, '2023-07-15 01:12:50', '2023-07-15 01:12:50'),
(14, 'printer', 0, 10, 'biboy flor', '', 'good', NULL, '2023-07-15 01:15:08', '2023-07-15 01:15:08'),
(15, 'printer', 0, 5, 'laine sales', NULL, 'defected', NULL, '2023-07-15 01:16:34', '2023-07-15 01:16:34'),
(16, 'printer', 5, 0, 'ruel perez', NULL, 'defected', NULL, '2023-07-15 01:52:56', '2023-07-15 01:52:56'),
(17, 'printer', 2, 2, 'laine sales', '', 'defected', NULL, '2023-07-15 01:55:42', '2023-07-15 01:55:42'),
(18, 'printer', 1, 1, 'laine sales', NULL, 'good', NULL, '2023-07-15 01:55:55', '2023-07-15 01:55:55'),
(19, 'printer', 2, 2, 'ruel perez', '2', 'defected', NULL, '2023-07-15 02:04:57', '2023-07-15 02:04:57'),
(20, 'printer', 0, 5, 'biboy flor', '', 'good', NULL, '2023-07-23 08:00:37', '2023-07-23 08:00:37'),
(21, 'printer', 0, 10, 'biboy flor', '', 'good', NULL, '2023-07-23 08:02:09', '2023-07-23 08:02:09'),
(22, 'ballpen', 0, 1, 'biboy flor', NULL, 'defected', NULL, '2023-07-23 19:05:30', '2023-07-23 19:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `unit` bigint(20) DEFAULT NULL,
  `inventory_number` bigint(20) DEFAULT NULL,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `item_name`, `quantity`, `unit`, `inventory_number`, `item_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pencil', -95, 101, 0, 'consumable', NULL, '2023-07-13 17:52:04', '2023-07-23 22:34:57'),
(2, 'printer', 0, 1, 425435, 'sets', NULL, '2023-07-13 17:52:26', '2023-07-23 07:29:33'),
(3, 'bondpaper', -5, 2, 0, 'consumable', NULL, '2023-07-13 17:54:51', '2023-07-22 23:40:00'),
(4, 'ballpen', -10, -1, 0, 'consumable', NULL, '2023-07-13 17:55:24', '2023-07-22 23:40:00'),
(5, 'medical kit', 0, -4, 0, 'sets', NULL, '2023-07-23 07:28:17', '2023-07-23 07:30:19'),
(6, 'chair', 20, 0, 0, 'non-consumable', NULL, '2023-07-23 22:34:57', '2023-07-23 22:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_03_075539_create_requests_table', 2),
(6, '2023_07_03_082059_add_new_column_to_requests', 3),
(7, '2023_07_03_140640_add_new_column_to_requests', 4),
(8, '2023_07_04_091513_create_orders_table', 5),
(9, '2023_07_11_091128_create_inventories_table', 6),
(10, '2023_07_11_141832_create_invetories_table', 7),
(11, '2023_07_11_144013_create_invetories_table', 8),
(12, '2023_07_11_144245_create_inventories_table', 9),
(13, '2023_07_12_001957_create_inventories_table', 10),
(14, '2023_07_12_065706_create_backup_requests_table', 11),
(15, '2023_07_12_065946_create_backup_orders_table', 11),
(16, '2023_07_12_073607_create_requests_table', 12),
(17, '2023_07_12_073814_create_orders_table', 13),
(18, '2023_07_12_074138_create_inventories_table', 14),
(19, '2023_07_12_074259_create_backup_requests_table', 15),
(20, '2023_07_12_074353_create_backup_orders_table', 16),
(21, '2023_07_12_113127_add_new_column_to_requests', 17),
(22, '2023_07_12_113326_add_new_column_to_orders', 17),
(23, '2023_07_12_124039_add_new_column_to_backup_orders', 18),
(24, '2023_07_12_124135_add_new_column_to_backup_requests', 18),
(25, '2023_07_13_032347_create_prepares_table', 19),
(26, '2023_07_13_034710_add_new_column_to_prepares', 20),
(27, '2023_07_13_043024_create_receivers_table', 21),
(28, '2023_07_13_052654_create_prepares_table', 22),
(29, '2023_07_13_053019_create_prepares_table', 23),
(30, '2023_07_14_015051_create_inventories_table', 24),
(31, '2023_07_14_042045_create_backup_prepares_table', 25),
(32, '2023_07_15_043318_add_new_column_to_prepares', 26),
(33, '2023_07_15_044406_add_new_column_to_backup_prepares', 27),
(34, '2023_07_15_074326_create_backup_wastes_table', 28),
(35, '2023_07_23_063739_create_stock_card_table', 29),
(36, '2023_07_23_071809_create_stock_cards_table', 30),
(37, '2023_07_23_072902_create_property_cards_table', 31),
(38, '2023_07_23_081900_add_new_column_to_stock_cards', 32),
(39, '2023_07_23_082051_add_new_column_to_property_cards', 32);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `unit` bigint(20) DEFAULT NULL,
  `unit_cost` bigint(20) DEFAULT NULL,
  `total_cost` bigint(20) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prepares`
--

CREATE TABLE `prepares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(20) NOT NULL DEFAULT 0,
  `unit` bigint(20) NOT NULL DEFAULT 0,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_cards`
--

CREATE TABLE `property_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` bigint(20) NOT NULL,
  `receiptUnit` bigint(20) NOT NULL,
  `receiver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `inventory_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_cards`
--

INSERT INTO `property_cards` (`id`, `item_name`, `unit`, `receiptUnit`, `receiver`, `remember_token`, `created_at`, `updated_at`, `inventory_id`) VALUES
(1, 'ballpen', 1, 0, 'biboy flor', NULL, '2023-07-22 23:40:00', '2023-07-22 23:40:00', 0),
(2, 'printer', 10, -48, 'biboy flor', NULL, '2023-07-22 23:41:27', '2023-07-22 23:41:27', 0),
(3, 'printer', 5, -58, 'biboy flor', NULL, '2023-07-23 00:26:18', '2023-07-23 00:26:18', 2),
(4, 'medical kit', 5, 1, 'laine sales', NULL, '2023-07-23 07:30:19', '2023-07-23 07:30:19', 5);

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`id`, `fullname`, `created_at`, `updated_at`) VALUES
(1, 'laine sales', NULL, NULL),
(2, 'ruel perez', '2023-07-13 01:18:54', '2023-07-13 01:18:54'),
(3, 'biboy flor', '2023-07-13 20:38:33', '2023-07-13 20:38:33'),
(4, 'boboy perez', '2023-07-13 20:41:36', '2023-07-13 20:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `unit` bigint(20) DEFAULT NULL,
  `unit_cost` bigint(20) DEFAULT NULL,
  `total_cost` bigint(20) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_cards`
--

CREATE TABLE `stock_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `receiptQty` bigint(20) NOT NULL,
  `receiver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `inventory_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_cards`
--

INSERT INTO `stock_cards` (`id`, `item_name`, `quantity`, `receiptQty`, `receiver`, `remember_token`, `created_at`, `updated_at`, `inventory_id`) VALUES
(3, 'bondpaper', 5, 0, 'biboy flor', NULL, '2023-07-22 23:40:00', '2023-07-22 23:40:00', 0),
(4, 'pencil', 10, -4, 'biboy flor', NULL, '2023-07-22 23:41:27', '2023-07-22 23:41:27', 0),
(5, 'pencil', 20, -14, 'biboy flor', NULL, '2023-07-23 00:26:18', '2023-07-23 00:26:18', 1),
(6, 'pencil', 100, -34, 'laine sales', NULL, '2023-07-23 02:00:52', '2023-07-23 02:00:52', 1),
(7, 'pencil', 10, -134, 'biboy flor', NULL, '2023-07-23 02:00:52', '2023-07-23 02:00:52', 1),
(8, 'pencil', 5, -144, 'ruel perez', NULL, '2023-07-23 02:00:52', '2023-07-23 02:00:52', 1),
(9, 'pencil', 20, -149, 'laine sales', NULL, '2023-07-23 02:00:52', '2023-07-23 02:00:52', 1),
(10, 'pencil', 15, -169, 'laine sales', NULL, '2023-07-23 02:00:52', '2023-07-23 02:00:52', 1),
(11, 'pencil', 11, -184, 'biboy flor', NULL, '2023-07-23 02:00:52', '2023-07-23 02:00:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$.fR3ugXAcrrPXKe02gdIgOb0fJ5wZoGjbUvFV/xP6YUWokqSMoRyC', NULL, '2023-07-02 17:52:02', '2023-07-02 17:52:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backup_orders`
--
ALTER TABLE `backup_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backup_prepares`
--
ALTER TABLE `backup_prepares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backup_requests`
--
ALTER TABLE `backup_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backup_wastes`
--
ALTER TABLE `backup_wastes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prepares`
--
ALTER TABLE `prepares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_cards`
--
ALTER TABLE `property_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_cards`
--
ALTER TABLE `stock_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backup_orders`
--
ALTER TABLE `backup_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `backup_prepares`
--
ALTER TABLE `backup_prepares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `backup_requests`
--
ALTER TABLE `backup_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `backup_wastes`
--
ALTER TABLE `backup_wastes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prepares`
--
ALTER TABLE `prepares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `property_cards`
--
ALTER TABLE `property_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receivers`
--
ALTER TABLE `receivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stock_cards`
--
ALTER TABLE `stock_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
