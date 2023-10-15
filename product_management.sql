-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 15, 2023 at 05:07 PM
-- Server version: 8.0.34
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_management`
--
CREATE DATABASE IF NOT EXISTS `product_management` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci;
USE `product_management`;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_15_205144_create_category_table', 1),
(7, '2023_10_15_205151_create_product_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` bigint UNSIGNED NOT NULL,
  `category_code` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_code`, `category_name`) VALUES
(1, 'DM01', 'Điện thoại'),
(2, 'DM02', 'Laptop'),
(3, 'DM03', 'PC'),
(4, 'DM04', 'Phụ kiện');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` bigint UNSIGNED NOT NULL,
  `product_code` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` decimal(15,4) NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_code`, `product_name`, `product_unit`, `product_price`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'P001', 'Sản phẩm 1', 'Cái', '100000.0000', 4, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(2, 'P002', 'Sản phẩm 2', 'Cái', '200000.0000', 2, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(3, 'P003', 'Sản phẩm 3', 'Cái', '300000.0000', 2, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(4, 'P004', 'Sản phẩm 4', 'Cái', '400000.0000', 1, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(5, 'P005', 'Sản phẩm 5', 'Cái', '500000.0000', 1, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(6, 'P006', 'Sản phẩm 6', 'Cái', '600000.0000', 3, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(7, 'P007', 'Sản phẩm 7', 'Cái', '700000.0000', 1, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(8, 'P008', 'Sản phẩm 8', 'Cái', '800000.0000', 3, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(9, 'P009', 'Sản phẩm 9', 'Cái', '900000.0000', 2, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(10, 'P010', 'Sản phẩm 10', 'Cái', '1000000.0000', 1, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(11, 'P011', 'Sản phẩm 11', 'Cái', '1100000.0000', 4, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(12, 'P012', 'Sản phẩm 12', 'Cái', '1200000.0000', 2, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(13, 'P013', 'Sản phẩm 13', 'Cái', '1300000.0000', 3, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(14, 'P014', 'Sản phẩm 14', 'Cái', '1400000.0000', 2, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(15, 'P015', 'Sản phẩm 15', 'Cái', '1500000.0000', 3, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(16, 'P016', 'Sản phẩm 16', 'Cái', '1600000.0000', 1, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(17, 'P017', 'Sản phẩm 17', 'Cái', '1700000.0000', 4, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(18, 'P018', 'Sản phẩm 18', 'Cái', '1800000.0000', 3, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(19, 'P019', 'Sản phẩm 19', 'Cái', '1900000.0000', 2, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(20, 'P020', 'Sản phẩm 20', 'Cái', '2000000.0000', 3, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(21, 'P021', 'Sản phẩm 21', 'Cái', '2100000.0000', 3, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(22, 'P022', 'Sản phẩm 22', 'Cái', '2200000.0000', 3, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(23, 'P023', 'Sản phẩm 23', 'Cái', '2300000.0000', 3, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(24, 'P024', 'Sản phẩm 24', 'Cái', '2400000.0000', 2, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(25, 'P025', 'Sản phẩm 25', 'Cái', '2500000.0000', 4, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(26, 'P026', 'Sản phẩm 26', 'Cái', '2600000.0000', 2, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(27, 'P027', 'Sản phẩm 27', 'Cái', '2700000.0000', 1, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(28, 'P028', 'Sản phẩm 28', 'Cái', '2800000.0000', 2, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(29, 'P029', 'Sản phẩm 29', 'Cái', '2900000.0000', 3, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(30, 'P030', 'Sản phẩm 30', 'Cái', '3000000.0000', 3, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(31, 'P031', 'Sản phẩm 31', 'Cái', '3100000.0000', 1, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(32, 'P032', 'Sản phẩm 32', 'Cái', '3200000.0000', 2, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(33, 'P033', 'Sản phẩm 33', 'Cái', '3300000.0000', 4, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(34, 'P034', 'Sản phẩm 34', 'Cái', '3400000.0000', 4, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(35, 'P035', 'Sản phẩm 35', 'Cái', '3500000.0000', 1, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(36, 'P036', 'Sản phẩm 36', 'Cái', '3600000.0000', 2, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(37, 'P037', 'Sản phẩm 37', 'Cái', '3700000.0000', 3, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(38, 'P038', 'Sản phẩm 38', 'Cái', '3800000.0000', 2, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(39, 'P039', 'Sản phẩm 39', 'Cái', '3900000.0000', 1, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(40, 'P040', 'Sản phẩm 40', 'Cái', '4000000.0000', 1, '2023-10-15 14:19:55', '2023-10-15 14:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$LPFcb/3SvwHvEiyuY1IpUOIvqm5BL4zDfa9VnuQ6DbMHy3Qh4A3MG', NULL, '2023-10-15 14:19:55', '2023-10-15 14:19:55'),
(2, 'User', 'user@gmail.com', NULL, '$2y$10$nY64HJlHbuKSSiOIV0Po1O4tRn9kGQdB2B3UaszVrvzhARUz6twBC', NULL, '2023-10-15 14:19:55', '2023-10-15 14:19:55');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `tbl_product_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
