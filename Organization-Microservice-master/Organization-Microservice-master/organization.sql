-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 09:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organization`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrative_divisions`
--

CREATE TABLE `administrative_divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrative_divisions`
--

INSERT INTO `administrative_divisions` (`id`, `division_name`, `status`, `created_by`, `modified_by`, `ip`, `browser`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, NULL, NULL, NULL, NULL, '2024-02-18 22:18:47', '2024-02-18 22:18:47'),
(2, 'Barisal', 1, NULL, NULL, NULL, NULL, '2024-02-18 22:18:50', '2024-02-19 23:43:47'),
(3, 'Dhaka', 1, NULL, NULL, NULL, NULL, '2024-02-18 22:18:51', '2024-02-18 22:18:51'),
(4, 'Dhaka', 1, NULL, NULL, NULL, NULL, '2024-02-18 22:20:48', '2024-02-18 22:20:48'),
(5, 'Dhaka', 1, NULL, NULL, NULL, NULL, '2024-02-18 22:20:49', '2024-02-18 22:20:49'),
(6, 'Dhaka', 1, NULL, NULL, NULL, NULL, '2024-02-18 22:20:50', '2024-02-18 22:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `contact_person_mobile` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `description`, `contact_person`, `contact_person_mobile`, `status`, `created_by`, `modified_by`, `ip`, `browser`, `created_at`, `updated_at`) VALUES
(1, 'mtb', 'nice', 'kk', '098847394', 1, NULL, NULL, NULL, NULL, '2024-02-19 21:57:47', '2024-02-19 21:57:47'),
(2, 'brac', 'too complex', 'kk', '098554654', 1, NULL, NULL, NULL, NULL, '2024-02-19 21:57:56', '2024-02-19 22:01:48'),
(3, 'sonali', 'nice', 'kk', '098847394', 1, NULL, NULL, NULL, NULL, '2024-02-19 21:58:04', '2024-02-19 21:58:04'),
(4, 'agrani', 'nice', 'kk', '098847394', 1, NULL, NULL, NULL, NULL, '2024-02-19 21:58:17', '2024-02-20 00:02:44'),
(5, 'city', 'nice', 'kk', '098847394', 1, NULL, NULL, NULL, NULL, '2024-02-19 21:58:24', '2024-02-19 21:58:24'),
(6, 'city', 'nice', 'kk', '098847394', 1, NULL, NULL, NULL, NULL, '2024-02-19 22:00:22', '2024-02-19 22:00:22'),
(7, 'city', 'nice', 'kk', '098847394', 1, NULL, NULL, NULL, NULL, '2024-02-19 22:00:23', '2024-02-19 22:00:23'),
(8, 'city', 'nice', 'kk', '098847394', 1, NULL, NULL, NULL, NULL, '2024-02-19 22:00:23', '2024-02-19 22:00:23'),
(10, 'city', 'nice', 'kk', '098847394', 1, NULL, NULL, NULL, NULL, '2024-02-26 23:01:03', '2024-02-26 23:01:03'),
(11, 'city', 'nice', 'kk', '098847394', 1, NULL, NULL, NULL, NULL, '2024-02-26 23:01:06', '2024-02-26 23:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `owner_type` enum('distributors','sales_organizations') NOT NULL DEFAULT 'distributors',
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `bank_account_number` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `bank_id`, `owner_type`, `owner_id`, `bank_account_number`, `status`, `created_by`, `modified_by`, `ip`, `browser`, `created_at`, `updated_at`) VALUES
(1, 4, 'sales_organizations', 2, '7937256463', 1, NULL, NULL, NULL, NULL, '2024-02-21 21:40:29', '2024-02-21 22:03:00'),
(2, 4, 'distributors', 4, '7937256463', 1, NULL, NULL, NULL, NULL, '2024-02-21 21:41:19', '2024-02-21 21:41:19'),
(3, 4, 'distributors', 4, '7937256463', 1, NULL, NULL, NULL, NULL, '2024-02-21 22:03:29', '2024-02-21 22:03:29'),
(4, 2, 'sales_organizations', 4, '7937256463', 1, NULL, NULL, NULL, NULL, '2024-02-21 22:05:40', '2024-02-21 22:20:05'),
(5, 2, 'sales_organizations', 4, '7937256463', 1, NULL, NULL, NULL, NULL, '2024-02-21 22:05:43', '2024-02-21 22:05:43'),
(6, 2, 'sales_organizations', 4, '7937256463', 1, NULL, NULL, NULL, NULL, '2024-02-21 22:05:44', '2024-02-21 22:05:44'),
(7, 2, 'sales_organizations', 4, '7937256463', 1, NULL, NULL, NULL, NULL, '2024-02-21 22:05:45', '2024-02-21 22:05:45'),
(8, 2, 'sales_organizations', 4, '7937256463', 1, NULL, NULL, NULL, NULL, '2024-02-21 22:05:46', '2024-02-21 22:05:46'),
(9, 2, 'sales_organizations', 4, '7937256463', 1, NULL, NULL, NULL, NULL, '2024-02-21 22:28:00', '2024-02-21 22:28:00'),
(10, 2, 'sales_organizations', 4, '7937256463', 1, NULL, NULL, NULL, NULL, '2024-02-21 22:28:01', '2024-02-21 22:28:01'),
(11, 2, 'sales_organizations', 4, '7937256463', 1, NULL, NULL, NULL, NULL, '2024-02-21 22:28:02', '2024-02-21 22:28:02'),
(12, 1, 'distributors', 1, '7937256463', 1, NULL, NULL, NULL, NULL, '2024-02-21 22:37:51', '2024-02-21 22:37:51'),
(13, 1, 'distributors', 1, '7937256463', 1, NULL, NULL, NULL, NULL, '2024-02-21 22:37:57', '2024-02-21 22:37:57'),
(14, 1, 'distributors', 1, '7937256463', 1, NULL, NULL, NULL, NULL, '2024-02-21 22:37:58', '2024-02-21 22:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `distribution_assigned_areas`
--

CREATE TABLE `distribution_assigned_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `distributor_id` bigint(20) UNSIGNED NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distribution_assigned_areas`
--

INSERT INTO `distribution_assigned_areas` (`id`, `distributor_id`, `area_id`, `created_by`, `modified_by`, `ip`, `browser`, `created_at`, `updated_at`) VALUES
(1, 3, 4, NULL, NULL, NULL, NULL, '2024-02-19 04:47:44', '2024-02-19 04:49:49'),
(2, 4, 2, NULL, NULL, NULL, NULL, '2024-02-19 04:47:50', '2024-02-19 04:47:50'),
(3, 4, 2, NULL, NULL, NULL, NULL, '2024-02-19 04:47:51', '2024-02-19 04:47:51'),
(4, 4, 2, NULL, NULL, NULL, NULL, '2024-02-19 04:47:52', '2024-02-19 04:47:52'),
(5, 4, 2, NULL, NULL, NULL, NULL, '2024-02-19 04:47:53', '2024-02-19 04:47:53'),
(6, 4, 2, NULL, NULL, NULL, NULL, '2024-02-19 04:47:54', '2024-02-19 04:47:54'),
(7, 4, 2, NULL, NULL, NULL, NULL, '2024-02-19 04:47:55', '2024-02-19 04:47:55'),
(8, 4, 2, NULL, NULL, NULL, NULL, '2024-02-21 22:06:56', '2024-02-21 22:06:56'),
(9, 4, 2, NULL, NULL, NULL, NULL, '2024-02-21 22:06:58', '2024-02-21 22:06:58'),
(10, 1, 2, NULL, NULL, NULL, NULL, '2024-02-21 22:12:54', '2024-02-21 22:12:54'),
(11, 1, 2, NULL, NULL, NULL, NULL, '2024-02-21 22:12:57', '2024-02-21 22:12:57'),
(12, 1, 2, NULL, NULL, NULL, NULL, '2024-02-21 22:12:59', '2024-02-21 22:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `storage_id` bigint(20) UNSIGNED DEFAULT NULL,
  `erp_id` bigint(20) UNSIGNED NOT NULL,
  `proprietor_name` varchar(255) DEFAULT NULL,
  `proprietor_dob` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `has_printer` tinyint(1) DEFAULT NULL,
  `has_pc` tinyint(1) DEFAULT NULL,
  `has_live_app` tinyint(1) DEFAULT NULL,
  `has_direct_sale` tinyint(1) DEFAULT NULL,
  `opening_date` date DEFAULT NULL,
  `emergency_contact_name` varchar(255) DEFAULT NULL,
  `emergency_contact_number` varchar(255) DEFAULT NULL,
  `emergency_contact_relation` varchar(255) DEFAULT NULL,
  `union` varchar(255) DEFAULT NULL,
  `ward` varchar(255) DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `distributor_type` varchar(255) DEFAULT NULL,
  `has_storage` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `name`, `storage_id`, `erp_id`, `proprietor_name`, `proprietor_dob`, `address`, `mobile_number`, `has_printer`, `has_pc`, `has_live_app`, `has_direct_sale`, `opening_date`, `emergency_contact_name`, `emergency_contact_number`, `emergency_contact_relation`, `union`, `ward`, `village`, `status`, `created_by`, `updated_by`, `ip`, `browser`, `created_at`, `updated_at`, `division_id`, `region_id`, `area_id`, `distributor_type`, `has_storage`) VALUES
(1, 'Kalam', 2, 3, 'hsh', '1987-12-23', '56/2, Elm Road.', '4736189', 0, 1, 0, 1, '2025-03-08', 'hqwbd', '458945394', 'ddkxm', 'bsds', 'jbs', 'hsba', 1, NULL, NULL, NULL, NULL, '2024-02-19 02:36:31', '2024-02-21 22:40:45', 0, 0, 0, NULL, 0),
(2, 'Karim', 1, 1, 'Rahim', '1980-10-02', 'Sadarghat, road', '09875612453', 0, 0, 0, 0, '2015-03-23', 'Jamal', '458945394', 'employer', 'kharkharia', 'uttar badda', 'chilmari', 1, NULL, NULL, NULL, NULL, '2024-02-19 02:36:35', '2024-02-19 02:36:35', 0, 0, 0, NULL, 0),
(3, 'Karim', 1, 1, 'Rahim', '1980-10-02', 'Sadarghat, road', '09875612453', 0, 0, 0, 0, '2015-03-23', 'Jamal', '458945394', 'employer', 'kharkharia', 'uttar badda', 'chilmari', 1, NULL, NULL, NULL, NULL, '2024-02-19 02:36:37', '2024-02-21 22:40:28', 0, 0, 0, NULL, 0),
(4, 'Karim', 1, 1, 'Rahim', '1980-10-02', 'Sadarghat, road', '09875612453', 0, 0, 0, 0, '2015-03-23', 'Jamal', '458945394', 'employer', 'kharkharia', 'uttar badda', 'chilmari', 1, NULL, NULL, NULL, NULL, '2024-02-19 02:36:39', '2024-02-19 02:36:39', 0, 0, 0, NULL, 0),
(5, 'Karim', 1, 1, 'Rahim', '1980-10-02', 'Sadarghat, road', '09875612453', 0, 0, 0, 0, '2015-03-23', 'Jamal', '458945394', 'employer', 'kharkharia', 'uttar badda', 'chilmari', 1, NULL, NULL, NULL, NULL, '2024-02-19 02:36:39', '2024-02-19 02:36:39', 0, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `district_name`, `status`, `created_by`, `updated_by`, `ip`, `browser`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dhaka', 1, NULL, NULL, NULL, NULL, '2024-02-18 22:28:41', '2024-02-18 22:28:41'),
(2, 1, 'Mymensingh', 1, NULL, NULL, NULL, NULL, '2024-02-18 22:28:44', '2024-02-18 22:30:40'),
(3, 1, 'Mymensingh', 1, NULL, NULL, NULL, NULL, '2024-02-18 22:28:45', '2024-02-19 23:38:43'),
(4, 1, 'Dhaka', 1, NULL, NULL, NULL, NULL, '2024-02-18 22:28:46', '2024-02-18 22:28:46'),
(5, 1, 'Dhaka', 1, NULL, NULL, NULL, NULL, '2024-02-18 22:28:47', '2024-02-18 22:28:47'),
(6, 2, 'Barisal Sadar', 1, NULL, NULL, NULL, NULL, '2024-02-18 22:29:07', '2024-02-18 22:29:07'),
(7, 2, 'Barisal Sadar', 1, NULL, NULL, NULL, NULL, '2024-02-18 22:29:10', '2024-02-18 22:29:10'),
(8, 2, 'Barisal Sadar', 1, NULL, NULL, NULL, NULL, '2024-02-18 22:29:10', '2024-02-18 22:29:10'),
(10, 2, 'Barisal Sadar', 1, NULL, NULL, NULL, NULL, '2024-02-19 01:12:59', '2024-02-19 01:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_02_15_060519_create_administrative_divisions_table', 1),
(3, '2024_02_15_060636_create_districts_table', 1),
(4, '2024_02_15_060728_create_upazilas_table', 1),
(5, '2024_02_15_060818_create_storages_table', 1),
(6, '2024_02_15_060907_create_distributors_table', 1),
(7, '2024_02_15_061030_create_distribution_assigned_areas_table', 1),
(8, '2024_02_15_061106_create_sales_organizations_table', 1),
(9, '2024_02_15_061135_create_banks_table', 1),
(10, '2024_02_15_061159_create_bank_accounts_table', 2),
(11, '2024_02_19_033045_update_column_name', 3),
(12, '2024_02_19_041540_add_status_to_bank_accounts', 4),
(13, '2024_02_20_045420_create_bank_accounts_table', 5),
(14, '2024_02_28_085359_drop_column_from_table', 6),
(15, '2024_02_29_050245_add_column_to_the_table', 7),
(16, '2024_02_29_083512_add_column_to_distributors_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_organizations`
--

CREATE TABLE `sales_organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_organizations`
--

INSERT INTO `sales_organizations` (`id`, `name`, `status`, `created_by`, `updated_by`, `ip`, `browser`, `created_at`, `updated_at`) VALUES
(1, 'jarina co and co', 1, 'dhali', NULL, NULL, NULL, '2024-02-19 04:53:12', '2024-02-21 22:33:17'),
(2, 'karima and co.', 1, NULL, NULL, NULL, NULL, '2024-02-19 04:53:14', '2024-02-19 04:53:14'),
(3, 'rahima and co.', 1, NULL, NULL, NULL, NULL, '2024-02-19 04:53:24', '2024-02-19 04:53:24'),
(4, 'rahima and co.', 1, NULL, NULL, NULL, NULL, '2024-02-19 04:53:26', '2024-02-19 04:53:26'),
(5, 'rahima and co.', 1, NULL, NULL, NULL, NULL, '2024-02-19 04:53:27', '2024-02-19 04:53:27'),
(6, 'rahima and co.', 1, NULL, NULL, NULL, NULL, '2024-02-19 04:53:28', '2024-02-19 04:53:28'),
(7, 'rahima and co.', 1, NULL, NULL, NULL, NULL, '2024-02-21 22:27:08', '2024-02-21 22:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `storages`
--

CREATE TABLE `storages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `person_in_charge` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storages`
--

INSERT INTO `storages` (`id`, `owner_id`, `type_id`, `name`, `address`, `person_in_charge`, `email`, `telephone`, `mobile`, `status`, `created_by`, `modified_by`, `ip`, `browser`, `created_at`, `updated_at`) VALUES
(1, 34, 4, 'gonj storage', 'London', 'kiki', 'k@mail', '1234', '12345678', 1, NULL, NULL, NULL, NULL, '2024-02-19 01:55:19', '2024-02-19 01:58:33'),
(2, 34, 4, 'sadar storage', 'London', 'karim', 'k@mail', '1234', '098789092', 1, NULL, NULL, NULL, NULL, '2024-02-19 01:55:27', '2024-02-19 01:55:27'),
(3, 34, 4, 'sadar storage', 'London', 'kiki', 'k@mail', '1234', '098789092', 1, NULL, NULL, NULL, NULL, '2024-02-19 01:55:32', '2024-02-19 01:55:32'),
(4, 34, 4, 'sadar storage', 'London', 'karim', 'k@mail', '1234', '098789092', 1, NULL, NULL, NULL, NULL, '2024-02-19 01:55:36', '2024-02-20 00:01:34'),
(5, 34, 4, 'sadar storage', 'London', 'karim', 'k@mail', '1234', '098789092', 1, NULL, NULL, NULL, NULL, '2024-02-19 01:55:38', '2024-02-19 01:55:38'),
(6, 34, 4, 'sadar storage', 'London', 'karim', 'k@mail', '1234', '098789092', 1, NULL, NULL, NULL, NULL, '2024-02-19 01:55:39', '2024-02-19 01:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `upazila_name` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `upazila_name`, `status`, `created_by`, `updated_by`, `ip`, `browser`, `created_at`, `updated_at`) VALUES
(1, 2, 'Sadar', 1, NULL, NULL, NULL, NULL, '2024-02-19 01:14:21', '2024-02-19 01:14:21'),
(2, 6, 'Bhatikhana', 1, NULL, NULL, NULL, NULL, '2024-02-19 01:14:32', '2024-02-19 01:16:50'),
(3, 5, 'Sadar', 1, NULL, NULL, NULL, NULL, '2024-02-19 01:14:37', '2024-02-19 23:42:01'),
(4, 3, 'Sadar', 1, NULL, NULL, NULL, NULL, '2024-02-19 01:14:40', '2024-02-19 01:14:40'),
(5, 4, 'Sadar', 1, NULL, NULL, NULL, NULL, '2024-02-19 01:14:48', '2024-02-19 01:14:48'),
(6, 4, 'Sadar', 1, NULL, NULL, NULL, NULL, '2024-02-19 01:14:53', '2024-02-19 01:14:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrative_divisions`
--
ALTER TABLE `administrative_divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_accounts_bank_id_foreign` (`bank_id`);

--
-- Indexes for table `distribution_assigned_areas`
--
ALTER TABLE `distribution_assigned_areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distribution_assigned_areas_distributor_id_foreign` (`distributor_id`);

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distributors_storage_id_foreign` (`storage_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sales_organizations`
--
ALTER TABLE `sales_organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storages`
--
ALTER TABLE `storages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upazilas_district_id_foreign` (`district_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrative_divisions`
--
ALTER TABLE `administrative_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `distribution_assigned_areas`
--
ALTER TABLE `distribution_assigned_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_organizations`
--
ALTER TABLE `sales_organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `storages`
--
ALTER TABLE `storages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD CONSTRAINT `bank_accounts_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `distribution_assigned_areas`
--
ALTER TABLE `distribution_assigned_areas`
  ADD CONSTRAINT `distribution_assigned_areas_distributor_id_foreign` FOREIGN KEY (`distributor_id`) REFERENCES `distributors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `distributors`
--
ALTER TABLE `distributors`
  ADD CONSTRAINT `distributors_storage_id_foreign` FOREIGN KEY (`storage_id`) REFERENCES `storages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `administrative_divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD CONSTRAINT `upazilas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
