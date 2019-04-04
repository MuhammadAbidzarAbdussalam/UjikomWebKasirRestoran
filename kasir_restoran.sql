-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2019 at 06:42 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `costumers`
--

CREATE TABLE `costumers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `costumers`
--

INSERT INTO `costumers` (`id`, `name`, `gender`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Cut Beby Tsabina', 2, '6285818969147', 'Jln. Hatiku 1, Perum Cinta Indah Blok A 1 No 1 RT 01 RW 01', '2019-04-01 18:49:10', '2019-04-01 18:49:10'),
(2, 'Muhammad Abidzar Abdussalam', 1, '6285811952361', 'Jln. Gandaria 4, Perum Trias Blok G 17 No 5 RT 04 RW 014', '2019-04-01 18:49:32', '2019-04-01 18:49:32'),
(3, 'Alexandra Daddario', 2, '664880965', 'New York, USA', '2019-04-01 18:50:22', '2019-04-01 18:51:52'),
(4, 'Cristiano Ronaldo', 1, '79597912', 'Milan, Italia', '2019-04-01 18:50:53', '2019-04-01 18:50:53'),
(5, 'Cassandra Lee', 2, '6280921568192', 'Jakarta Timur, Jakarta, Indonesia', '2019-04-01 18:51:27', '2019-04-01 18:51:27'),
(6, 'Scarlett Johanson', 2, '236437862', 'New York, USA', '2019-04-03 20:45:47', '2019-04-03 20:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Ikan Salmon Nasi Kari', 30000, '2019-03-25 20:20:57', '2019-03-31 19:16:52'),
(2, 'Mie Ayam Daging Sapi Panggang', 39000, '2019-03-25 21:56:32', '2019-03-26 21:38:09'),
(3, 'Ayam Geprek', 20000, '2019-03-26 20:38:34', '2019-03-26 20:38:34'),
(4, 'Nasi Goreng Iga Bakar', 25000, '2019-03-26 20:55:10', '2019-03-26 20:55:10'),
(7, 'Seblak', 15000, '2019-03-26 21:53:32', '2019-03-26 21:54:02'),
(18, 'Bakso Rudal', 25000, '2019-03-30 22:05:32', '2019-03-30 22:05:32'),
(19, 'Bakso Urat', 27000, '2019-03-30 22:05:57', '2019-03-30 22:05:57'),
(21, 'Sushi Khas Jepang', 30000, '2019-03-30 22:06:58', '2019-03-30 22:06:58'),
(22, 'Ramen Teriyaki', 35000, '2019-03-30 22:07:13', '2019-03-30 22:07:13'),
(23, 'Burger Queen', 20000, '2019-03-30 22:07:41', '2019-03-30 22:07:41'),
(24, 'Ayam Bakar', 20000, '2019-03-30 22:11:32', '2019-03-30 22:11:32'),
(25, 'Pizza Bekasi', 50000, '2019-03-31 19:21:02', '2019-03-31 19:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `menu_order`
--

CREATE TABLE `menu_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_26_025644_create_menus_table', 1),
(8, '2019_04_01_035332_create_costumers_table', 2),
(9, '2019_04_02_004720_create_orders_table', 2),
(10, '2019_04_02_011619_create_order_menu_table', 2),
(11, '2019_04_03_043634_create_transactions_table', 3),
(12, '2019_04_03_143301_add_payment_to_transactions', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL,
  `costumer_id` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `menu_id`, `costumer_id`, `total`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 21, 1, 2, 1, '2019-04-02 01:28:49', '2019-04-02 21:22:45'),
(2, 1, 1, 3, 1, '2019-04-02 01:29:05', '2019-04-02 01:29:05'),
(3, 7, 3, 3, 1, '2019-04-02 01:29:47', '2019-04-02 01:29:47'),
(4, 18, 2, 3, 1, '2019-04-02 20:28:23', '2019-04-02 20:28:23'),
(5, 4, 4, 1, 1, '2019-04-02 20:45:54', '2019-04-02 20:45:54'),
(6, 22, 3, 1, 1, '2019-04-03 05:54:36', '2019-04-03 05:54:52'),
(7, 7, 4, 2, 1, '2019-04-03 05:57:59', '2019-04-03 05:57:59'),
(8, 25, 5, 1, 1, '2019-04-03 05:59:53', '2019-04-03 05:59:53'),
(9, 22, 2, 3, 1, '2019-04-03 06:10:08', '2019-04-03 06:10:08'),
(10, 7, 4, 1, 1, '2019-04-03 06:15:48', '2019-04-03 06:15:48'),
(11, 4, 2, 4, 1, '2019-04-03 06:20:45', '2019-04-03 06:20:45'),
(12, 24, 4, 2, 1, '2019-04-03 06:24:54', '2019-04-03 06:24:54'),
(13, 3, 4, 5, 1, '2019-04-03 06:27:19', '2019-04-03 06:27:19'),
(14, 21, 1, 2, 1, '2019-04-03 07:10:18', '2019-04-03 16:49:55'),
(15, 19, 2, 4, 1, '2019-04-03 16:50:13', '2019-04-03 16:50:13'),
(16, 21, 4, 3, 1, '2019-04-03 17:21:30', '2019-04-03 17:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$lsR0j5aSltKpIn.TfAEnyuXBGGpKmXWc//ZHZCkwN42jSHCYgxoiO', '2019-04-03 19:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `total_payment` bigint(20) NOT NULL,
  `payment` int(10) UNSIGNED DEFAULT NULL,
  `return_payment` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `order_id`, `total_payment`, `payment`, `return_payment`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, 100000, 0, 0, 0, '2019-04-03 06:27:19', '2019-04-03 06:27:19'),
(2, 14, 30000, 35000, 5000, 1, '2019-04-03 07:10:18', '2019-04-03 17:05:54'),
(3, 15, 108000, 200000, 92000, 1, '2019-04-03 16:50:13', '2019-04-03 16:56:53'),
(4, 16, 90000, 0, 0, 0, '2019-04-03 17:21:30', '2019-04-03 17:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$WGf6A2RdDKgrBgmKDm..suTsINPEyuiuYlu7/xos91InFm9KfUwPS', 'pYjcrsksYlldtpnsHFTO53QiJiBXm7mlhGfWtfpgdKrhpRxUFSFYJcZ7ljSq', '2019-03-25 20:17:33', '2019-03-25 20:17:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `costumers`
--
ALTER TABLE `costumers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_order`
--
ALTER TABLE `menu_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_menu_order_id_foreign` (`order_id`),
  ADD KEY `order_menu_menu_id_foreign` (`menu_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `costumers`
--
ALTER TABLE `costumers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `menu_order`
--
ALTER TABLE `menu_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_order`
--
ALTER TABLE `menu_order`
  ADD CONSTRAINT `order_menu_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `order_menu_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
