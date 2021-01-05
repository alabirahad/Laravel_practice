-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 05:31 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`id`, `user_id`, `level`, `result`, `year`, `subject`) VALUES
(19, 35, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `updated_at`, `created_at`) VALUES
(3, 'Cloths', '1', '2020-09-12 21:26:25', '2020-09-10 06:43:45'),
(5, 'Toys', '1', '2020-09-12 21:27:06', '2020-09-12 21:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Computer fundamental', NULL, NULL),
(2, 'C Programming', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `category` varchar(255) DEFAULT NULL,
  `created_by` int(20) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `status`, `category`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 'T-shirt', '2', '3', 35, '35', '2020-09-13 03:27:58', '2020-09-13 05:40:27'),
(8, 'Gun', '1', '5', 35, '35', '2020-09-13 05:07:47', '2020-09-13 05:07:47'),
(9, 'Shirt', '1', '3', 35, '35', '2020-09-14 01:40:14', '2020-09-14 01:40:14'),
(10, 'Car', '2', '5', 35, '35', '2020-09-14 01:43:16', '2020-09-14 01:43:16'),
(11, 'Top', '1', '5', 35, '35', '2020-09-15 04:57:59', '2020-09-15 04:57:59'),
(12, 'doll', '2', '5', 35, '35', '2020-09-15 04:58:15', '2020-09-15 04:58:15'),
(13, 'mouse', '1', '5', 35, '35', '2020-09-15 04:58:36', '2020-09-15 04:58:36'),
(14, 'cap', '1', '3', 35, '35', '2020-09-15 04:58:52', '2020-09-15 04:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_group` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` int(20) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postalcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_group_id` int(20) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_group`, `name`, `username`, `email`, `email_verified_at`, `number`, `course_id`, `password`, `designation`, `status`, `photo`, `address`, `city`, `country`, `postalcode`, `user_group_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(35, 1, 'Abid', 'Khan', 'abid@gmail.com', NULL, '01598765432', 2, '12345', 'Apprentice', '1', '1599026702_19.jpg', 'Narayonganj', 'Dhaka', 'Bangladesh', '1237', NULL, NULL, '2020-09-02 00:05:02', '2020-09-16 21:52:08'),
(76, 6, 'Ahad', 'ahad', 'ahad@gmail.com', NULL, '01741709262', 2, '$2y$10$89RfRaORRkHtiJXS8Hrmvu/E1oAijfFO8adDAXTVXmPn3elylLOw2', 'Apprentice', '1', '1600232800_images (2).jfif', 'Nikunjo-2', 'Dhaka', 'Bangladesh', '1237', NULL, NULL, '2020-09-15 23:06:40', '2020-09-16 21:31:54'),
(77, 1, 'Bakibillah', 'bakibillah', 'b@g', NULL, '01741709265', 1, '$2y$10$75CHJ.Q1ewZmOoijpO/rUO2.v7Y9FMbkyyyKMqGsw6qONPvh/X8ZW', 'Senior Software Engineer', '1', NULL, 'Nikunko', 'Dhaka', 'Bangladesh', '1237', NULL, NULL, '2020-09-16 08:04:45', '2020-09-16 08:12:11'),
(135, 1, 'Abir', 'alabir', 'alabir@gmail.com', NULL, '017471709262', 1, '$2y$10$BD4yRZQ6AfeAnKI1Rxzd6OjypkiENVdHDNu1fAYPi4oklVczTe0pK', 'Apprentice', '1', '1600580927_5.jpg', 'Nikunjo-2', 'Dhaka', 'Bangladesh', '1237', NULL, NULL, '2020-09-19 23:48:47', '2020-09-19 23:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2020-09-02 10:17:38', '2020-09-02 10:17:38'),
(6, 'Normal User', '2020-09-03 06:08:18', '2020-09-03 06:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_to_product`
--

CREATE TABLE `user_to_product` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `updated_by` int(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_to_product`
--

INSERT INTO `user_to_product` (`id`, `user_id`, `product_id`, `updated_by`, `updated_at`) VALUES
(16, 35, 5, 135, '2020-09-19 23:52:18'),
(17, 35, 9, 135, '2020-09-19 23:52:18'),
(18, 35, 14, 135, '2020-09-19 23:52:18'),
(19, 76, 8, 135, '2020-09-19 23:52:38'),
(20, 76, 10, 135, '2020-09-19 23:52:38'),
(21, 76, 11, 135, '2020-09-19 23:52:38'),
(22, 76, 12, 135, '2020-09-19 23:52:38'),
(23, 77, 8, 135, '2020-09-19 23:52:51'),
(24, 77, 10, 135, '2020-09-19 23:52:51'),
(25, 77, 11, 135, '2020-09-19 23:52:51'),
(26, 77, 12, 135, '2020-09-19 23:52:51'),
(27, 135, 5, 135, '2020-09-19 23:53:10'),
(28, 135, 9, 135, '2020-09-19 23:53:10'),
(29, 135, 14, 135, '2020-09-19 23:53:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_to_product`
--
ALTER TABLE `user_to_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic`
--
ALTER TABLE `academic`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_to_product`
--
ALTER TABLE `user_to_product`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
