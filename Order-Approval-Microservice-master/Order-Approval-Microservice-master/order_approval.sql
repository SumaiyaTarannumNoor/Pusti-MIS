-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 10:07 AM
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
-- Database: `order_approval`
--

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `committee_purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `committees`
--

INSERT INTO `committees` (`id`, `name`, `committee_purpose`, `status`, `created_by`, `updated_by`, `ip`, `browser`, `created_at`, `updated_at`) VALUES
(1, 'Committee 1', 'To approve.', 0, NULL, NULL, NULL, NULL, '2024-01-29 00:49:17', '2024-02-03 02:28:27'),
(2, 'Committee 2', 'To order.', 1, NULL, NULL, NULL, NULL, '2024-01-29 00:49:22', '2024-01-29 21:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `committee_members`
--

CREATE TABLE `committee_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `approval_committee_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `sequence_number` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `committee_members`
--

INSERT INTO `committee_members` (`id`, `approval_committee_id`, `employee_id`, `sequence_number`, `status`, `created_by`, `updated_by`, `ip`, `browser`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 78, 1, NULL, NULL, NULL, NULL, '2024-01-29 02:38:45', '2024-01-29 02:38:45'),
(2, 1, 2, 78, 0, NULL, NULL, NULL, NULL, '2024-01-29 21:49:52', '2024-02-03 02:27:21'),
(3, 2, 2, 78, 0, NULL, NULL, NULL, NULL, '2024-01-29 21:51:08', '2024-01-29 21:53:17');

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
(5, '2024_01_24_102533_create_committees_table', 1),
(6, '2024_01_24_103851_create_committee_members_table', 2),
(7, '2024_01_24_104501_create_primary_orders_table', 3),
(8, '2024_01_24_105252_create_primary_order_product_details_table', 4),
(9, '2024_01_24_110131_create_primary_order_product_delivery_plans_table', 5),
(10, '2024_01_24_110948_create_payment_modes_table', 6),
(11, '2024_01_24_111306_create_planned_payment_details_table', 7),
(12, '2024_01_29_061805_update_column_name', 8),
(13, '2024_01_30_045134_update_column_name_in_primary_orders_table', 9);

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
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_modes`
--

INSERT INTO `payment_modes` (`id`, `name`, `status`, `created_by`, `updated_by`, `deleted_by`, `ip`, `browser`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'In Cash', 0, NULL, NULL, NULL, NULL, NULL, '2024-01-29 23:46:36', '2024-02-03 02:33:27', NULL),
(2, 'In Card', 1, NULL, NULL, NULL, NULL, NULL, '2024-01-29 23:46:44', '2024-01-29 23:46:44', NULL),
(3, 'Bkash', 1, NULL, NULL, NULL, NULL, NULL, '2024-01-29 23:46:52', '2024-01-29 23:46:52', NULL),
(4, 'Nagad', 1, NULL, NULL, NULL, NULL, NULL, '2024-01-29 23:46:59', '2024-01-29 23:46:59', NULL),
(5, 'CellFin', 0, NULL, NULL, NULL, NULL, NULL, '2024-01-29 23:47:17', '2024-01-30 00:10:14', '2024-01-30 00:10:14');

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
-- Table structure for table `planned_payment_details`
--

CREATE TABLE `planned_payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_mode_id` bigint(20) UNSIGNED NOT NULL,
  `payable_amount` int(11) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `payment_date` date NOT NULL,
  `attached_file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `bank_account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `planned_payment_details`
--

INSERT INTO `planned_payment_details` (`id`, `payment_mode_id`, `payable_amount`, `order_id`, `payment_date`, `attached_file_name`, `bank_id`, `bank_account_number`, `status`, `created_by`, `updated_by`, `ip`, `browser`, `created_at`, `updated_at`) VALUES
(1, 1, 10000, 2, '2024-03-23', 'KC-234', 3, 'SS-56-78', 1, NULL, NULL, NULL, NULL, '2024-01-30 01:06:51', '2024-02-03 02:34:09'),
(2, 2, 3000, 1, '2024-03-23', 'KC-234', 3, 'SS-56-78', 1, NULL, NULL, NULL, NULL, '2024-01-30 01:07:02', '2024-01-30 01:07:02'),
(3, 3, 4000, 1, '2024-03-23', 'KC-234', 3, 'SS-56-78', 1, NULL, NULL, NULL, NULL, '2024-01-30 01:07:15', '2024-01-30 01:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `primary_orders`
--

CREATE TABLE `primary_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `has_delivery_approval` tinyint(1) NOT NULL,
  `is_delivery_approval_approved` tinyint(1) NOT NULL,
  `distributor_id` bigint(20) UNSIGNED NOT NULL,
  `assigned_committee_id` bigint(20) UNSIGNED NOT NULL,
  `current_approver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `primary_orders`
--

INSERT INTO `primary_orders` (`id`, `title`, `has_delivery_approval`, `is_delivery_approval_approved`, `distributor_id`, `assigned_committee_id`, `current_approver`, `status`, `created_by`, `updated_by`, `ip`, `browser`, `created_at`, `updated_at`) VALUES
(1, 'Order for biscuits', 1, 1, 2, 1, 'Tareq', 1, NULL, NULL, NULL, NULL, '2024-01-29 23:25:28', '2024-02-03 02:34:38'),
(2, 'Order for suji', 1, 1, 2, 2, 'Tareq', 1, NULL, NULL, NULL, NULL, '2024-01-29 23:25:51', '2024-01-29 23:44:17'),
(3, 'Order for atta', 1, 1, 2, 1, 'Mariam', 0, NULL, NULL, NULL, NULL, '2024-01-29 23:26:26', '2024-01-29 23:26:26'),
(4, 'Order for moida', 1, 1, 2, 1, 'Mariam', 1, NULL, NULL, NULL, NULL, '2024-01-29 23:26:36', '2024-01-29 23:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `primary_order_product_delivery_plans`
--

CREATE TABLE `primary_order_product_delivery_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_assigned_product_id` bigint(20) UNSIGNED NOT NULL,
  `storage_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `primary_order_product_delivery_plans`
--

INSERT INTO `primary_order_product_delivery_plans` (`id`, `po_assigned_product_id`, `storage_id`, `quantity`, `status`, `created_by`, `updated_by`, `ip`, `browser`, `created_at`, `updated_at`) VALUES
(8, 4, 4, 4, 1, NULL, NULL, NULL, NULL, '2024-01-31 00:11:56', '2024-01-31 00:36:13'),
(9, 1, 3, 4, 1, NULL, NULL, NULL, NULL, '2024-01-31 00:35:02', '2024-02-03 03:06:12'),
(10, 1, 3, 4, 1, NULL, NULL, NULL, NULL, '2024-01-31 00:35:04', '2024-01-31 00:35:04'),
(11, 1, 3, 4, 1, NULL, NULL, NULL, NULL, '2024-02-02 23:22:40', '2024-02-02 23:22:40'),
(12, 1, 3, 4, 1, NULL, NULL, NULL, NULL, '2024-02-02 23:22:44', '2024-02-02 23:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `primary_order_product_details`
--

CREATE TABLE `primary_order_product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_sku_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage_unit` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `distribution_price` int(11) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `net_amount` int(11) NOT NULL,
  `primary_order_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `primary_order_product_details`
--

INSERT INTO `primary_order_product_details` (`id`, `product_sku_number`, `storage_unit`, `quantity`, `distribution_price`, `gross_amount`, `net_amount`, `primary_order_id`, `status`, `created_by`, `updated_by`, `deleted_by`, `ip`, `browser`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ABC-897876', 'metric ton', 16, 7800000, 16, 16, 1, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-30 02:44:56', '2024-02-03 02:35:55', NULL),
(2, 'OO-8876', 'metric ton', 2, 300000, 24, 24, 1, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-30 02:45:22', '2024-01-30 02:45:22', NULL),
(3, 'OO-8876', 'metric ton', 2, 300000, 24, 24, 1, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-30 02:45:27', '2024-01-30 02:45:27', NULL),
(4, 'OO-8876', 'metric ton', 2, 300000, 24, 24, 1, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-30 02:45:27', '2024-01-30 02:45:27', NULL),
(5, 'OO-8876', 'metric ton', 2, 300000, 24, 24, 1, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-30 02:45:28', '2024-01-30 02:45:28', NULL),
(6, 'OO-8876', 'metric ton', 2, 300000, 24, 24, 2, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-30 02:45:40', '2024-01-30 02:45:40', NULL),
(7, 'OO-8876', 'metric ton', 2, 300000, 24, 24, 2, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-30 02:45:40', '2024-01-30 02:45:40', NULL),
(8, 'OO-8876', 'metric ton', 2, 300000, 24, 24, 2, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-30 02:45:41', '2024-01-30 02:51:11', '2024-01-30 02:51:11'),
(9, 'OO-8876', 'metric ton', 2, 300000, 24, 24, 2, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-30 04:16:16', '2024-01-30 04:16:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee_members`
--
ALTER TABLE `committee_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `committee_members_approval_committee_id_foreign` (`approval_committee_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `planned_payment_details`
--
ALTER TABLE `planned_payment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `planned_payment_details_payment_mode_id_foreign` (`payment_mode_id`),
  ADD KEY `planned_payment_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `primary_orders`
--
ALTER TABLE `primary_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `primary_orders_assigned_committee_id_foreign` (`assigned_committee_id`);

--
-- Indexes for table `primary_order_product_delivery_plans`
--
ALTER TABLE `primary_order_product_delivery_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_poa_product_id` (`po_assigned_product_id`);

--
-- Indexes for table `primary_order_product_details`
--
ALTER TABLE `primary_order_product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `primary_order_product_details_primary_order_id_foreign` (`primary_order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `committee_members`
--
ALTER TABLE `committee_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `planned_payment_details`
--
ALTER TABLE `planned_payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `primary_orders`
--
ALTER TABLE `primary_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `primary_order_product_delivery_plans`
--
ALTER TABLE `primary_order_product_delivery_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `primary_order_product_details`
--
ALTER TABLE `primary_order_product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `committee_members`
--
ALTER TABLE `committee_members`
  ADD CONSTRAINT `committee_members_approval_committee_id_foreign` FOREIGN KEY (`approval_committee_id`) REFERENCES `committees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `planned_payment_details`
--
ALTER TABLE `planned_payment_details`
  ADD CONSTRAINT `planned_payment_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `primary_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `planned_payment_details_payment_mode_id_foreign` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment_modes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `primary_orders`
--
ALTER TABLE `primary_orders`
  ADD CONSTRAINT `primary_orders_assigned_committee_id_foreign` FOREIGN KEY (`assigned_committee_id`) REFERENCES `committees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `primary_order_product_delivery_plans`
--
ALTER TABLE `primary_order_product_delivery_plans`
  ADD CONSTRAINT `fk_poa_product_id` FOREIGN KEY (`po_assigned_product_id`) REFERENCES `primary_order_product_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `primary_order_product_details`
--
ALTER TABLE `primary_order_product_details`
  ADD CONSTRAINT `primary_order_product_details_primary_order_id_foreign` FOREIGN KEY (`primary_order_id`) REFERENCES `primary_orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
