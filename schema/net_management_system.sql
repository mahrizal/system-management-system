-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2016 at 12:03 PM
-- Server version: 5.7.5-m15-log
-- PHP Version: 5.6.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `net_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `system_id` int(11) NOT NULL,
  `modules_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `start_hour` time NOT NULL,
  `finish_hour` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `system_id`, `modules_id`, `date`, `description`, `start_hour`, `finish_hour`, `created_at`, `updated_at`) VALUES
(5, 1, 1, '2016-01-17 00:00:00', 'Memperbaiki sistem cuti untuk anak kontrak', '06:00:00', '11:00:00', '2016-01-17 15:31:31', '0000-00-00 00:00:00'),
(6, 1, 1, '2015-09-20 00:00:00', 'cuti', '10:00:00', '12:00:00', '2016-01-19 07:40:38', '0000-00-00 00:00:00'),
(9, 1, 1, '2016-01-20 00:00:00', 'cuti partner', '10:00:00', '12:00:00', '2016-01-20 02:56:58', '0000-00-00 00:00:00'),
(10, 1, 2, '2015-09-20 00:00:00', 'perbaikan sistem training', '11:00:00', '13:00:00', '2016-01-20 02:57:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

CREATE TABLE `bugs` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_found` date NOT NULL,
  `system_id` int(11) NOT NULL,
  `modules_id` int(11) DEFAULT NULL,
  `number` int(11) NOT NULL,
  `description` text NOT NULL,
  `is_solved` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bugs`
--

INSERT INTO `bugs` (`id`, `date_found`, `system_id`, `modules_id`, `number`, `description`, `is_solved`, `created_at`, `created_by`) VALUES
(1, '2016-01-13', 1, 0, 1, 'Tidak bisa input', '0', '2016-01-20 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `documentation_files`
--

CREATE TABLE `documentation_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `system_id` int(11) NOT NULL,
  `modules_id` int(11) DEFAULT NULL,
  `employees_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `documentation_files`
--

INSERT INTO `documentation_files` (`id`, `system_id`, `modules_id`, `employees_id`, `name`, `description`, `file`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 105, 'Diagram FLowchart', 'Diagram Flowchart', '', '2016-01-11 01:14:39', '2016-01-11 01:14:39'),
(4, 1, NULL, 105, 'Billing', 'Flowchart Billing', 'email_error_16-10-2015.png', '2016-01-11 01:33:22', '2016-01-11 01:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_01_02_191340_create_modules_table', 1),
('2016_01_02_215235_create_posts_table', 2),
('2016_01_02_215706_create_tasks_table', 2),
('2016_01_05_065334_create_systems_table', 3),
('2016_01_05_070739_create_versions_table', 4),
('2016_01_05_070948_create_modules_table', 5),
('2016_01_05_071420_create_documentation_files_table', 6),
('2016_01_05_071804_create_activities_table', 7),
('2016_01_05_072119_create_documentation_files_table', 8),
('2016_01_05_073609_create_activities_table', 9),
('2016_01_05_072136_create_activities_table', 10),
('2016_01_05_073808_create_documentation_files_table', 10),
('2016_01_05_074120_create_versions_table', 11),
('2016_01_05_101940_create_articles_table', 12),
('2016_01_05_104044_create_documentationfiles_table', 12),
('2016_01_05_104055_create_modules_table', 13),
('2016_01_05_104128_create_systems_table', 13),
('2016_01_11_023826_create_activities_table', 13),
('2016_01_11_024438_create_versions_table', 14),
('2016_01_11_061840_create_documentation_files_table', 15),
('2016_01_11_073521_create_sessions_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `system_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `system_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Leave', 'Fitur Cuti Karyawan \r\nKaryawan bisa melihat balancing cuti nya masing-masing dan bisa mengajukan cuti dari sistem', '2016-01-10 19:46:46', '2016-01-10 19:46:46'),
(2, 1, 'Training', 'Training', '2016-01-11 19:16:34', '2016-01-11 19:16:34'),
(3, 4, 'Point', 'Lihat Point', '2016-01-12 18:45:26', '2016-01-12 18:45:26'),
(4, 1, 'Cars Booking', 'Booking mobil avanza', '2016-01-18 20:25:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `systems`
--

CREATE TABLE `systems` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `launching_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `systems`
--

INSERT INTO `systems` (`id`, `name`, `description`, `launching_date`, `created_at`, `updated_at`) VALUES
(1, 'MUC Net', 'Sistem Informasi Induk MUC ', '2016-01-11', '2016-01-10 19:45:35', '2016-01-10 19:45:35'),
(5, 'CPD', 'Sistem CPD', '2016-01-16', '2016-01-16 03:26:53', '0000-00-00 00:00:00'),
(6, 'Project Manager', 'Sistem Project Manager', '2016-01-01', '2016-01-16 03:29:12', '0000-00-00 00:00:00'),
(7, 'IT Support System', 'IT Support System', '2016-01-06', '2016-01-16 03:31:22', '0000-00-00 00:00:00'),
(11, 'Doc Center', 'Doc Center', '2015-12-30', '2016-01-16 03:36:49', '0000-00-00 00:00:00'),
(12, 'Library', 'ini test', '2016-01-06', '2016-01-16 03:38:13', '0000-00-00 00:00:00'),
(13, 'English Agent Voting', 'Aplikasi untuk Voting Agen Bahasa Inggris', '2016-01-16', '2016-01-16 09:34:34', '0000-00-00 00:00:00'),
(14, 'Dictionary ', 'Dictionary', '2016-01-13', '2016-01-16 09:54:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `versions`
--

CREATE TABLE `versions` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `system_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bugs`
--
ALTER TABLE `bugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentation_files`
--
ALTER TABLE `documentation_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `systems`
--
ALTER TABLE `systems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `versions`
--
ALTER TABLE `versions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `bugs`
--
ALTER TABLE `bugs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `documentation_files`
--
ALTER TABLE `documentation_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `systems`
--
ALTER TABLE `systems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `versions`
--
ALTER TABLE `versions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
