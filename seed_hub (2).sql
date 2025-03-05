-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2025 at 12:18 PM
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
-- Database: `seed_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'default', 'User updated', 'App\\Models\\User', 'updated', 8, 'App\\Models\\User', 1, '{\"attributes\":{\"email\":\"jakesss@mailinator.com\"},\"old\":{\"email\":\"jakes@mailinator.com\"}}', NULL, '2025-01-31 04:27:17', '2025-01-31 04:27:17'),
(2, 'default', 'User updated', 'App\\Models\\User', 'updated', 7, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Amit Chauhans\"},\"old\":{\"name\":\"Amit Chauhan\"}}', NULL, '2025-01-31 04:28:52', '2025-01-31 04:28:52'),
(4, 'default', 'User updated', 'App\\Models\\User', 'updated', 8, 'App\\Models\\User', 1, '{\"attributes\":{\"pincode\":\"123450\"},\"old\":{\"pincode\":\"123456\"}}', NULL, '2025-01-31 05:25:56', '2025-01-31 05:25:56'),
(5, 'default', 'User updated', 'App\\Models\\User', 'updated', 8, 'App\\Models\\User', 1, '{\"attributes\":{\"email\":\"jakes@mailinator.com\"},\"old\":{\"email\":\"jakesss@mailinator.com\"}}', NULL, '2025-02-03 03:41:08', '2025-02-03 03:41:08'),
(6, 'default', 'User updated', 'App\\Models\\User', 'updated', 7, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Amit Chauhan\"},\"old\":{\"name\":\"Amit Chauhans\"}}', NULL, '2025-02-03 03:41:35', '2025-02-03 03:41:35'),
(7, 'default', 'User updated', 'App\\Models\\User', 'updated', 5, 'App\\Models\\User', 5, '{\"attributes\":{\"address\":\"Lorem ipsome is just dummy adddress\"},\"old\":{\"address\":\"Lorem ipsome is just dummy adddresss\"}}', NULL, '2025-02-05 04:13:36', '2025-02-05 04:13:36'),
(8, 'default', 'User updated', 'App\\Models\\User', 'updated', 5, 'App\\Models\\User', 1, '{\"attributes\":[],\"old\":[]}', NULL, '2025-02-19 22:16:25', '2025-02-19 22:16:25'),
(9, 'default', 'User updated', 'App\\Models\\User', 'updated', 5, 'App\\Models\\User', 1, '{\"attributes\":[],\"old\":[]}', NULL, '2025-02-19 22:17:39', '2025-02-19 22:17:39'),
(10, 'default', 'User updated', 'App\\Models\\User', 'updated', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"password\":\"$2y$12$\\/I88WRLEzKDTksAHkb0Hh.nIjpQT6VNIzo0wWeDBTPJ7c\\/ZgVdChG\"},\"old\":{\"password\":\"$2y$12$\\/KJRdv9VbnVQTRpSYmoyWe2vWa2BKQbxs11MsC4YdmZhBXTl\\/D99a\"}}', NULL, '2025-02-20 04:23:16', '2025-02-20 04:23:16'),
(34, 'default', 'User created', 'App\\Models\\User', 'created', 12, NULL, NULL, '{\"attributes\":{\"name\":\"Raj Singh\",\"email\":\"rajsingh.icar01@gmail.com\",\"phone\":null,\"designation_id\":null,\"address\":null,\"pincode\":null,\"avatar\":\"https:\\/\\/lh3.googleusercontent.com\\/a\\/ACg8ocLz-e4o5QfFELj0yerpCAGKObM8YiH_ntIRx__4JmQxXrrtjA=s96-c\",\"password\":\"$2y$12$I62UYs7CAYBjKyg2bso9f.pJcrRvfJFhI0Jw1HVI6KrZmXLBA4IpG\",\"deleted_at\":null}}', NULL, '2025-02-26 23:03:32', '2025-02-26 23:03:32'),
(35, 'default', 'User logged in with Google', 'App\\Models\\User', NULL, 12, 'App\\Models\\User', 12, '{\"email\":\"rajsingh.icar01@gmail.com\"}', NULL, '2025-02-26 23:03:33', '2025-02-26 23:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:72:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:9:\"role-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:11:\"role-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:9:\"role-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"role-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:9:\"user-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:11:\"user-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:9:\"user-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:11:\"user-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:15:\"permission-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:17:\"permission-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:15:\"permission-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:17:\"permission-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:9:\"crop-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:11:\"crop-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:9:\"crop-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:11:\"crop-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:13:\"category-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:15:\"category-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:13:\"category-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:15:\"category-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:11:\"season-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:13:\"season-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:11:\"season-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:13:\"season-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:9:\"zone-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:11:\"zone-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:9:\"zone-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:11:\"zone-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:10:\"state-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:12:\"state-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:10:\"state-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:12:\"state-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:12:\"variety-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:33;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:14:\"variety-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:34;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:12:\"variety-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:35;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:14:\"variety-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:36;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:16:\"designation-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:18:\"designation-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:16:\"designation-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:18:\"designation-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:26:\"controlling-authority-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:28:\"controlling-authority-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:26:\"controlling-authority-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:28:\"controlling-authority-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:11:\"centre-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:45;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:13:\"centre-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:46;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:11:\"centre-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:47;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:13:\"centre-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:16:\"seed-target-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:49;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:18:\"seed-target-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:50;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:16:\"seed-target-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:51;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:18:\"seed-target-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:52;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:27:\"seed-production-status-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:53;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:29:\"seed-production-status-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:54;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:27:\"seed-production-status-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:55;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:29:\"seed-production-status-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:56;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:19:\"revolving-fund-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:57;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:21:\"revolving-fund-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:58;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:19:\"revolving-fund-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:59;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:21:\"revolving-fund-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:60;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:11:\"report-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:61;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:13:\"report-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:62;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:11:\"report-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:63;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:13:\"report-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:64;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:30:\"revolving-fund-allocation-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:65;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:32:\"revolving-fund-allocation-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:66;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:30:\"revolving-fund-allocation-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:67;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:32:\"revolving-fund-allocation-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:68;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:17:\"activity-log-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:69;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:19:\"activity-log-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:70;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:17:\"activity-log-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:71;a:4:{s:1:\"a\";i:78;s:1:\"b\";s:19:\"activity-log-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"Admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:4:\"User\";s:1:\"c\";s:3:\"web\";}}}', 1740805324);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Foundation', NULL, '2025-01-09 03:16:55', '2025-01-09 03:16:55'),
(2, 'Breeder', NULL, '2025-01-09 03:17:16', '2025-01-09 03:17:16'),
(3, 'Certified', NULL, '2025-01-09 03:19:32', '2025-01-09 03:19:32'),
(4, 'TFL', NULL, '2025-01-09 03:19:45', '2025-01-09 03:19:45'),
(5, 'Lorem', '2025-01-09 03:21:36', '2025-01-09 03:21:01', '2025-01-09 03:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `centres`
--

CREATE TABLE `centres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `centre_name` varchar(255) NOT NULL,
  `centre_address` text NOT NULL,
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `controlling_authority_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `centres`
--

INSERT INTO `centres` (`id`, `centre_name`, `centre_address`, `zone_id`, `state_id`, `pincode`, `user_id`, `controlling_authority_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ARS, Srigangangar, Rajasthan (SKRAU, Bikaner)', 'Zonal Director Research, Agricultural Research Station (SKRAU, Bikaner) Karni Marg, Sriganganagar-335001, Rajasthan', 1, 1, '335001', 5, 1, NULL, '2025-01-16 04:29:05', '2025-01-28 01:13:50'),
(2, 'KVK, Kota (AU, Kota)', 'Sr Scientist and Head, Krishi Vigyan Kendra (AU), Borkheda, Kota, Rajasthan', 1, 1, '324001', 8, 1, NULL, '2025-01-16 05:10:32', '2025-01-16 05:10:32'),
(3, 'Rani Lakshmi Bai Central Agricultural University, Jhansi', 'NH-75, Gwalior Road Near Pahuj Dam, Simradha, Jhansi, Uttar Pradesh', 1, 2, '284003', 3, 3, NULL, '2025-01-16 05:32:25', '2025-02-06 03:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `controlling_authorities`
--

CREATE TABLE `controlling_authorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `responsive_person` varchar(255) NOT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `authority_name` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `controlling_authorities`
--

INSERT INTO `controlling_authorities` (`id`, `responsive_person`, `designation_id`, `authority_name`, `phone_no`, `email`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Joe Doe', 2, 'University of Rajasthan', '9988774455', 'joedoe@mailinator.com', NULL, '2025-01-15 05:04:53', '2025-01-15 22:40:04'),
(2, 'John Cena', 1, 'Jaipur University Rajasthan', '7310845252', 'johncena@gmail.com', NULL, '2025-02-03 00:50:20', '2025-02-03 00:50:20'),
(3, 'Yogeshwar Singh', 2, 'Dr. Rakesh Chaudhary', '8057072701', 'agri.rakesh@gmail.com', NULL, '2025-02-06 03:52:24', '2025-02-06 03:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `crops`
--

CREATE TABLE `crops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crops`
--

INSERT INTO `crops` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mustard', NULL, '2025-01-09 00:11:18', '2025-01-09 00:45:39'),
(2, 'Wheat', NULL, '2025-01-09 00:35:13', '2025-01-09 00:35:13'),
(3, 'Barley', NULL, '2025-01-09 00:35:32', '2025-01-09 00:35:32'),
(7, 'sadasda', '2025-01-09 01:10:46', '2025-01-09 00:53:31', '2025-01-09 01:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Nodel Officer', NULL, '2025-01-13 04:25:25', '2025-01-13 05:21:42'),
(2, 'Sr. Scientist', NULL, '2025-01-13 04:28:42', '2025-01-13 05:19:57'),
(3, 'Super Admin', NULL, '2025-01-27 05:49:56', '2025-01-27 05:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_31_093354_create_permission_tables', 1),
(5, '2024_12_31_094715_create_products_table', 2),
(6, '2025_01_09_045648_create_crops_table', 3),
(7, '2025_01_09_071823_create_categories_table', 4),
(10, '2025_01_09_092614_create_seasons_table', 5),
(11, '2025_01_10_041433_create_zones_table', 5),
(12, '2025_01_10_044019_create_zones_table', 6),
(13, '2025_01_10_044341_create_states_table', 7),
(14, '2025_01_13_043009_create_varieties_table', 8),
(15, '2025_01_13_092843_create_designations_table', 9),
(16, '2025_01_14_064848_add_fields_to_users_table', 10),
(17, '2025_01_14_113400_update_users_table', 11),
(18, '2025_01_15_094153_create_controlling_authorities_table', 12),
(19, '2025_01_16_041401_create_centres_table', 13),
(20, '2025_01_16_115554_create_seed_targets_table', 14),
(21, '2025_01_17_091259_create_seed_production_statuses_table', 15),
(22, '2025_01_21_045957_update_varieties_table', 16),
(23, '2025_01_23_044011_create_products_table', 17),
(24, '2025_01_23_044034_create_product_stocks_table', 17),
(25, '2025_01_23_114353_drop_colums_from_seed_targets_table', 18),
(26, '2025_01_23_114906_create_seed_target_items_table', 19),
(27, '2025_01_24_104226_drop_columns_from_seed_targets_item_table', 20),
(28, '2025_01_24_104514_add_column_to_seed_targets_table', 21),
(29, '2025_01_28_065407_add_field_to_varieties_table', 22),
(30, '2025_01_28_100342_update_seed_target_items_table', 23),
(31, '2025_01_29_055056_update_seed_production_statuses_table', 24),
(32, '2025_01_30_100828_create_seed_availabilities_table', 25),
(33, '2025_01_31_090046_create_activity_log_table', 25),
(34, '2025_01_31_090047_add_event_column_to_activity_log_table', 25),
(35, '2025_01_31_090048_add_batch_uuid_column_to_activity_log_table', 25),
(36, '2025_02_05_090503_update_seed_production_statuses_table', 26),
(37, '2025_02_06_063251_update_seed_production_statuses_table', 27),
(38, '2025_02_10_051311_update_seed_target_items_table', 28),
(39, '2025_02_14_040928_create_revolving_funds_table', 29),
(40, '2025_02_18_051445_create_revolving_fund_allocations_table', 30),
(41, '2025_02_21_043708_add_google_id_to_users_table', 31);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('tony@mailinator.com', '$2y$12$0mgZljWsIc6D82SGg17YsO9Gqrgl8fBaaU73z3QbVd5XkJ3YRX3We', '2025-02-19 22:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2024-12-31 05:33:44', '2024-12-31 05:33:44'),
(2, 'role-create', 'web', '2024-12-31 05:33:44', '2024-12-31 05:33:44'),
(3, 'role-edit', 'web', '2024-12-31 05:33:44', '2024-12-31 05:33:44'),
(4, 'role-delete', 'web', '2024-12-31 05:33:44', '2024-12-31 05:33:44'),
(9, 'user-list', 'web', NULL, NULL),
(10, 'user-create', 'web', NULL, NULL),
(11, 'user-edit', 'web', NULL, NULL),
(12, 'user-delete', 'web', NULL, NULL),
(13, 'permission-list', 'web', NULL, NULL),
(14, 'permission-create', 'web', NULL, NULL),
(15, 'permission-edit', 'web', NULL, NULL),
(16, 'permission-delete', 'web', NULL, NULL),
(19, 'crop-list', 'web', '2025-01-08 23:55:54', '2025-01-08 23:55:54'),
(20, 'crop-create', 'web', '2025-01-08 23:56:11', '2025-01-08 23:56:11'),
(21, 'crop-edit', 'web', '2025-01-08 23:56:27', '2025-01-08 23:56:27'),
(22, 'crop-delete', 'web', '2025-01-08 23:56:42', '2025-01-08 23:56:42'),
(23, 'category-list', 'web', '2025-01-09 01:55:16', '2025-01-09 01:55:16'),
(24, 'category-create', 'web', '2025-01-09 01:55:31', '2025-01-09 01:55:31'),
(25, 'category-edit', 'web', '2025-01-09 01:55:46', '2025-01-09 01:55:46'),
(26, 'category-delete', 'web', '2025-01-09 01:56:00', '2025-01-09 01:56:00'),
(27, 'season-list', 'web', '2025-01-09 04:09:00', '2025-01-09 04:09:00'),
(28, 'season-create', 'web', '2025-01-09 04:09:13', '2025-01-09 04:09:13'),
(29, 'season-edit', 'web', '2025-01-09 04:09:27', '2025-01-09 04:09:27'),
(30, 'season-delete', 'web', '2025-01-09 04:09:42', '2025-01-09 04:09:42'),
(31, 'zone-list', 'web', '2025-01-09 23:28:47', '2025-01-09 23:28:47'),
(32, 'zone-create', 'web', '2025-01-09 23:29:02', '2025-01-09 23:29:02'),
(33, 'zone-edit', 'web', '2025-01-09 23:29:18', '2025-01-09 23:29:18'),
(34, 'zone-delete', 'web', '2025-01-09 23:29:32', '2025-01-09 23:29:32'),
(35, 'state-list', 'web', '2025-01-10 00:18:20', '2025-01-10 00:18:20'),
(36, 'state-create', 'web', '2025-01-10 00:18:37', '2025-01-10 00:18:37'),
(37, 'state-edit', 'web', '2025-01-10 00:18:50', '2025-01-10 00:18:50'),
(38, 'state-delete', 'web', '2025-01-10 00:19:03', '2025-01-10 00:19:03'),
(39, 'variety-list', 'web', '2025-01-12 23:46:56', '2025-01-12 23:46:56'),
(40, 'variety-create', 'web', '2025-01-12 23:47:09', '2025-01-12 23:47:09'),
(41, 'variety-edit', 'web', '2025-01-12 23:47:23', '2025-01-12 23:47:23'),
(42, 'variety-delete', 'web', '2025-01-12 23:47:37', '2025-01-12 23:47:37'),
(43, 'designation-list', 'web', '2025-01-13 04:12:52', '2025-01-13 04:12:52'),
(44, 'designation-create', 'web', '2025-01-13 04:13:07', '2025-01-13 04:13:07'),
(45, 'designation-edit', 'web', '2025-01-13 04:13:22', '2025-01-13 04:13:22'),
(46, 'designation-delete', 'web', '2025-01-13 04:13:35', '2025-01-13 04:13:35'),
(47, 'controlling-authority-list', 'web', '2025-01-15 04:24:41', '2025-01-15 05:25:13'),
(48, 'controlling-authority-create', 'web', '2025-01-15 04:24:57', '2025-01-15 05:25:27'),
(49, 'controlling-authority-edit', 'web', '2025-01-15 04:25:10', '2025-01-15 05:25:41'),
(50, 'controlling-authority-delete', 'web', '2025-01-15 04:25:27', '2025-01-15 05:25:55'),
(51, 'centre-list', 'web', '2025-01-15 23:01:28', '2025-01-15 23:01:28'),
(52, 'centre-create', 'web', '2025-01-15 23:01:44', '2025-01-15 23:01:44'),
(53, 'centre-edit', 'web', '2025-01-15 23:01:58', '2025-01-15 23:01:58'),
(54, 'centre-delete', 'web', '2025-01-15 23:02:13', '2025-01-15 23:02:13'),
(55, 'seed-target-list', 'web', '2025-01-16 06:40:13', '2025-01-16 06:40:13'),
(56, 'seed-target-create', 'web', '2025-01-16 06:40:27', '2025-01-16 06:40:27'),
(57, 'seed-target-edit', 'web', '2025-01-16 06:40:41', '2025-01-16 06:40:41'),
(58, 'seed-target-delete', 'web', '2025-01-16 06:40:55', '2025-01-16 06:40:55'),
(59, 'seed-production-status-list', 'web', '2025-01-28 22:48:28', '2025-01-28 22:48:28'),
(60, 'seed-production-status-create', 'web', '2025-01-28 22:48:46', '2025-01-28 22:48:46'),
(61, 'seed-production-status-edit', 'web', '2025-01-28 22:49:01', '2025-01-28 22:49:01'),
(62, 'seed-production-status-delete', 'web', '2025-01-28 22:49:22', '2025-01-28 22:49:22'),
(63, 'revolving-fund-list', 'web', '2025-02-13 23:54:02', '2025-02-13 23:54:02'),
(64, 'revolving-fund-create', 'web', '2025-02-13 23:54:18', '2025-02-13 23:54:18'),
(65, 'revolving-fund-edit', 'web', '2025-02-13 23:54:30', '2025-02-13 23:54:30'),
(66, 'revolving-fund-delete', 'web', '2025-02-13 23:54:45', '2025-02-13 23:54:45'),
(67, 'report-list', 'web', '2025-02-17 05:02:02', '2025-02-17 05:02:02'),
(68, 'report-create', 'web', '2025-02-17 05:02:17', '2025-02-17 05:02:17'),
(69, 'report-edit', 'web', '2025-02-17 05:02:31', '2025-02-17 05:02:31'),
(70, 'report-delete', 'web', '2025-02-17 05:02:45', '2025-02-17 05:02:45'),
(71, 'revolving-fund-allocation-list', 'web', '2025-02-17 23:48:23', '2025-02-17 23:48:23'),
(72, 'revolving-fund-allocation-create', 'web', '2025-02-17 23:48:39', '2025-02-17 23:48:39'),
(73, 'revolving-fund-allocation-edit', 'web', '2025-02-17 23:48:55', '2025-02-17 23:48:55'),
(74, 'revolving-fund-allocation-delete', 'web', '2025-02-17 23:49:11', '2025-02-17 23:49:11'),
(75, 'activity-log-list', 'web', '2025-02-20 05:57:14', '2025-02-20 05:57:14'),
(76, 'activity-log-create', 'web', '2025-02-20 05:57:47', '2025-02-20 05:57:47'),
(77, 'activity-log-edit', 'web', '2025-02-20 05:58:02', '2025-02-20 05:58:02'),
(78, 'activity-log-delete', 'web', '2025-02-20 05:58:18', '2025-02-20 05:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Iphone 11', '2025-01-22 23:29:39', '2025-01-22 23:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_stocks`
--

CREATE TABLE `product_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_stocks`
--

INSERT INTO `product_stocks` (`id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 50000, '2025-01-22 23:29:39', '2025-01-22 23:29:39'),
(2, 1, 15, 80000, '2025-01-22 23:29:39', '2025-01-22 23:29:39'),
(3, 1, 20, 85000, '2025-01-22 23:29:39', '2025-01-22 23:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `revolving_funds`
--

CREATE TABLE `revolving_funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `centre_id` bigint(20) UNSIGNED NOT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `released_fund` decimal(5,2) NOT NULL DEFAULT 0.00,
  `earning_by_seed_sale_etc` decimal(5,2) NOT NULL DEFAULT 0.00,
  `interest_on_released_fund` decimal(5,2) NOT NULL DEFAULT 0.00,
  `total_earning_available` decimal(5,2) NOT NULL DEFAULT 0.00 COMMENT 'Total Earning Available = Earning by Seed sale etc + Interest on Released Fund',
  `opening_balance` decimal(5,2) NOT NULL DEFAULT 0.00 COMMENT 'Opening Balance = Released Fund + Total Earning Available',
  `infrastructure_fund` decimal(5,2) NOT NULL DEFAULT 0.00,
  `utilized_infrastructure_fund` decimal(5,2) NOT NULL DEFAULT 0.00,
  `available_infrastructure_fund` decimal(5,2) NOT NULL DEFAULT 0.00 COMMENT 'Available infrastructure fund = Infrastructure fund + Utilized_infrastructure_fund',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `revolving_funds`
--

INSERT INTO `revolving_funds` (`id`, `centre_id`, `season_id`, `released_fund`, `earning_by_seed_sale_etc`, `interest_on_released_fund`, `total_earning_available`, `opening_balance`, `infrastructure_fund`, `utilized_infrastructure_fund`, `available_infrastructure_fund`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 80.00, 10.00, 2.00, 12.00, 92.00, 10.00, 5.00, 0.00, NULL, '2025-02-14 01:11:07', '2025-02-14 05:44:01'),
(2, 3, 4, 100.00, 30.00, 5.00, 35.00, 135.00, 20.00, 15.00, 0.00, NULL, '2025-02-14 04:15:22', '2025-02-14 04:15:22'),
(3, 2, 4, 50.00, 10.00, 4.00, 14.00, 64.00, 10.00, 8.00, 0.00, NULL, '2025-02-14 05:02:03', '2025-02-14 05:04:40'),
(4, 1, 4, 40.00, 20.00, 5.00, 25.00, 65.00, 10.00, 10.00, 0.00, NULL, '2025-02-14 05:40:20', '2025-02-17 03:51:04'),
(5, 3, 5, 150.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-02-16 22:53:32', '2025-02-16 22:53:32'),
(6, 2, 5, 150.00, 0.00, 0.00, 0.00, 0.00, 50.00, 0.00, 0.00, NULL, '2025-02-17 00:55:32', '2025-02-17 00:55:32'),
(8, 1, 1, 150.00, 0.00, 0.00, 0.00, 0.00, 10.00, 0.00, 0.00, NULL, '2025-02-18 05:36:21', '2025-02-18 05:36:21'),
(9, 1, 2, 230.00, 0.00, 0.00, 0.00, 0.00, 50.00, 0.00, 0.00, NULL, '2025-02-18 05:40:54', '2025-02-18 05:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `revolving_fund_allocations`
--

CREATE TABLE `revolving_fund_allocations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `centre_id` bigint(20) UNSIGNED NOT NULL,
  `total_fund_allocation` decimal(5,2) NOT NULL DEFAULT 0.00,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `revolving_fund_allocations`
--

INSERT INTO `revolving_fund_allocations` (`id`, `centre_id`, `total_fund_allocation`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 500.00, NULL, '2025-02-18 00:42:32', '2025-02-18 00:42:32'),
(2, 2, 300.00, NULL, '2025-02-18 00:43:45', '2025-02-18 01:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-12-31 05:42:35', '2024-12-31 05:42:35'),
(3, 'User', 'web', '2025-01-07 00:06:23', '2025-01-07 00:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(39, 3),
(40, 1),
(40, 3),
(41, 1),
(41, 3),
(42, 1),
(42, 3),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(51, 3),
(52, 1),
(53, 1),
(53, 3),
(54, 1),
(55, 1),
(55, 3),
(56, 1),
(57, 1),
(57, 3),
(58, 1),
(59, 3),
(60, 3),
(61, 3),
(62, 3),
(63, 1),
(63, 3),
(64, 1),
(65, 1),
(65, 3),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2020-2021', NULL, '2025-01-09 23:27:38', '2025-01-09 23:27:38'),
(2, '2021-2022', NULL, '2025-01-09 23:27:44', '2025-01-09 23:27:44'),
(3, '2022-2023', NULL, '2025-01-09 23:27:54', '2025-01-09 23:27:54'),
(4, '2023-2024', NULL, '2025-01-09 23:28:02', '2025-01-09 23:28:02'),
(5, '2024-2025', NULL, '2025-01-09 23:28:10', '2025-01-09 23:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `seed_availabilities`
--

CREATE TABLE `seed_availabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seed_production_statuses`
--

CREATE TABLE `seed_production_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity_produced` varchar(255) NOT NULL,
  `seed_available_for_sale` varchar(255) NOT NULL,
  `seed_price` varchar(255) NOT NULL,
  `reserved_seed` varchar(255) NOT NULL,
  `reason_for_shortfall` varchar(255) DEFAULT NULL,
  `seed_sold` varchar(255) DEFAULT NULL,
  `seed_sold_date` date DEFAULT NULL,
  `surplus_seed` varchar(255) DEFAULT NULL COMMENT 'surplus_seed = seed_available_for_sale + reserved_seed',
  `seed_target_item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seed_production_statuses`
--

INSERT INTO `seed_production_statuses` (`id`, `quantity_produced`, `seed_available_for_sale`, `seed_price`, `reserved_seed`, `reason_for_shortfall`, `seed_sold`, `seed_sold_date`, `surplus_seed`, `seed_target_item_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '90', '50', '2000', '10', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '30', '2025-02-10', NULL, 8, NULL, '2025-02-10 05:04:45', '2025-02-10 05:13:26'),
(2, '500', '410', '2000', '50', NULL, '40', '2025-02-20', NULL, 2, NULL, '2025-02-20 03:22:52', '2025-02-20 03:23:51'),
(3, '600', '560', '1599', '40', NULL, NULL, NULL, NULL, 4, NULL, '2025-02-20 03:53:58', '2025-02-20 03:53:58'),
(4, '400', '310', '1477', '40', 'Lorem ipsome is just dummy text.', '50', '2025-02-20', NULL, 6, NULL, '2025-02-20 04:25:15', '2025-02-20 04:40:36'),
(5, '60', '55', '2099', '5', NULL, NULL, NULL, NULL, 7, NULL, '2025-02-20 04:53:49', '2025-02-20 04:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `seed_targets`
--

CREATE TABLE `seed_targets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `centre_id` bigint(20) UNSIGNED NOT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `crop_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seed_targets`
--

INSERT INTO `seed_targets` (`id`, `centre_id`, `season_id`, `crop_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, NULL, '2025-02-10 04:07:46', '2025-02-10 04:07:46'),
(2, 1, 4, 3, NULL, '2025-02-10 04:53:23', '2025-02-19 00:57:05'),
(3, 3, 4, 1, NULL, '2025-02-10 05:00:36', '2025-02-10 05:00:36'),
(4, 2, 4, 3, NULL, '2025-02-11 00:52:12', '2025-02-11 00:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `seed_target_items`
--

CREATE TABLE `seed_target_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seed_target_id` bigint(20) UNSIGNED NOT NULL,
  `variety_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `total_seed_quantity` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seed_target_items`
--

INSERT INTO `seed_target_items` (`id`, `seed_target_id`, `variety_id`, `category_id`, `total_seed_quantity`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '1000', 1, '2025-02-10 04:07:46', '2025-02-19 01:23:25'),
(2, 1, 4, 2, '500', 1, '2025-02-10 04:07:46', '2025-02-19 01:23:25'),
(3, 2, 1, 1, '1000', 1, '2025-02-10 04:53:23', '2025-02-19 00:57:05'),
(4, 2, 5, 3, '500', 1, '2025-02-10 04:53:23', '2025-02-19 00:57:06'),
(5, 3, 2, 1, '1000', 1, '2025-02-10 05:00:36', '2025-02-10 05:00:36'),
(6, 3, 4, 2, '500', 1, '2025-02-10 05:00:37', '2025-02-10 05:00:37'),
(7, 3, 6, 4, '50', 1, '2025-02-10 05:00:37', '2025-02-10 05:00:37'),
(8, 1, 6, 3, '100', 5, '2025-02-10 05:03:09', '2025-02-19 01:23:25'),
(9, 4, 1, 1, '100', 1, '2025-02-11 00:52:12', '2025-02-11 00:52:26'),
(10, 4, 5, 2, '500', 1, '2025-02-11 00:52:12', '2025-02-11 00:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('tYLTtBg4A8HCrhOBqdZ9mr8Ge59AlOTu3mQVQSSJ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUHF6UldteDNYemxBVG1GcHFEY0V5bFByYVpqcUlPZHZFWkpFa1g1RiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9yZXBvcnRzL3Jldm9sdmluZy1mdW5kLXJlcG9ydHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1740739689);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `zone_id`, `state_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rajasthan', NULL, '2025-01-10 01:12:42', '2025-01-10 02:08:42'),
(2, 1, 'Madhya Pradesh', NULL, '2025-01-10 01:13:10', '2025-01-10 01:13:10'),
(3, 1, 'Gujarat', NULL, '2025-01-10 01:13:28', '2025-01-10 01:13:28'),
(4, 1, 'Daman & Diu', NULL, '2025-01-10 01:13:44', '2025-01-10 01:13:44'),
(5, 1, 'Dadra & Nagar Haveli', NULL, '2025-01-10 01:14:03', '2025-01-10 01:14:03'),
(6, 1, 'Maharashtra', NULL, '2025-01-10 01:14:19', '2025-01-10 03:02:22'),
(7, 2, 'Andhra Pradesh', NULL, '2025-01-10 01:14:46', '2025-01-10 01:14:46'),
(8, 2, 'Karnataka', NULL, '2025-01-10 01:15:13', '2025-01-10 01:15:13'),
(9, 2, 'Lakshadweep', NULL, '2025-01-10 01:15:25', '2025-01-10 01:15:25'),
(10, 2, 'Kerala', NULL, '2025-01-10 01:15:38', '2025-01-10 01:15:38'),
(11, 3, 'Jammu & Kashmir', NULL, '2025-01-10 01:15:59', '2025-01-10 01:15:59'),
(12, 3, 'Himachal Pradesh', NULL, '2025-01-10 01:16:14', '2025-01-10 01:16:14'),
(13, 3, 'Punjab', NULL, '2025-01-10 01:16:25', '2025-01-10 01:16:25'),
(14, 3, 'Uttar Pradesh', NULL, '2025-01-10 01:17:01', '2025-01-10 01:17:01'),
(15, 4, 'Bihar', NULL, '2025-01-10 01:17:24', '2025-01-10 01:17:24'),
(16, 4, 'Sikkim', NULL, '2025-01-10 01:17:37', '2025-01-10 01:17:37'),
(17, 4, 'Arunachal Pradesh', NULL, '2025-01-10 01:17:53', '2025-01-10 01:17:53'),
(18, 1, 'jflkj flkj sfdlk', '2025-01-10 03:03:39', '2025-01-10 03:03:10', '2025-01-10 03:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `designation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` text DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `designation_id`, `address`, `pincode`, `avatar`, `status`, `email_verified_at`, `password`, `google_id`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mailinator.com', '9988771122', 3, 'Jyoti Nagar, Jail Area, Sewar, Bharatpur, Rajasthan 321303', '998822', 'ouAujG4z5Rceezn7wTg23ivOGOeTOWHs5EseBPDC.png', 1, NULL, '$2y$12$ITWLWwXGAhteBnQM1jl9B.rZckGALNVXVxFxpxadw14ddI2a8Ij3C', NULL, NULL, NULL, '2024-12-31 05:42:35', '2025-01-31 01:40:32'),
(2, 'Lorem Ipsome', 'lorem@mailinator.com', NULL, NULL, NULL, NULL, '', 1, NULL, '$2y$12$jwXmYaBuZtM9xNgUzEoQWul5ax8xnyIFxS5KnzdddWjN/S2Z20oG6', NULL, NULL, NULL, '2025-01-07 00:09:16', '2025-01-07 00:09:16'),
(3, 'Peter Parker', 'peter@mailinator.com', '9988774455', 1, 'Lorem ipsome is just dummy adddresss', '998877', NULL, 1, NULL, '$2y$12$/I88WRLEzKDTksAHkb0Hh.nIjpQT6VNIzo0wWeDBTPJ7c/ZgVdChG', NULL, NULL, NULL, '2025-01-14 05:53:46', '2025-02-20 04:23:16'),
(5, 'Tony Stark', 'tony@mailinator.com', '4455669988', 1, 'Lorem ipsome is just dummy adddress', '225544', NULL, 1, NULL, '$2y$12$P8uHUIaWZPTXyvpnHfiG6.r0gfFPIrfd0KSV9RO9ENaH8eB6ZfSsi', NULL, NULL, NULL, '2025-01-14 23:10:20', '2025-02-19 22:17:39'),
(6, 'Raj Singh', 'raj@mailinator.com', '3322114455', 2, 'full street address', '123456', 'k0U8XhTj7QiaCQafQFh5KaBeDbQ7Ygsf5DG5KGGy.png', 1, NULL, '$2y$12$szYJmlk0K5GSQejzyGIvs.t0ujCN0nawbkOWXRXAPB4QFkHRgsTDe', NULL, NULL, NULL, '2025-01-14 23:15:04', '2025-01-16 23:12:39'),
(7, 'Amit Chauhan', 'amitchauhan@mailinator.com', '7310203050', 2, 'full street address', '123456', 'JtOQGzm0Aj8reYPNXDg3kaLRf0mIxO3CPGf4GVdV.jpg', 1, NULL, '$2y$12$x2krwkFgPK4JBp1O4Q3xq.DhqHUb89PWM7LL34PbLXIlOZUkuAX2W', NULL, NULL, NULL, '2025-01-14 23:28:34', '2025-02-03 03:41:34'),
(8, 'Jakes Parrow', 'jakes@mailinator.com', '1020304050', 1, 'Lorem ipsome is just dummy adddresss', '123450', 'PZiuXUVyC4DDigyTqfXU0Gf7xGAIh89HfWQFGTAO.jpg', 1, NULL, '$2y$12$UYb6qDaNxuhjQln/d77d/OA4f/W./33NzzvW9/sMuhKZKkfEuH1oa', NULL, NULL, NULL, '2025-01-14 23:55:10', '2025-02-03 03:41:08'),
(10, 'Chris Hemsworth', 'chris@mailinator.com', NULL, NULL, '5, Residency Road, Surya Colony Jodhpur Rajasthan', '342001', 'IZKILUIIwUqJR1JhwnMpu6u4ym3QqSYQL2CmTmXX.jpg', 1, NULL, '$2y$12$o7gqD7hDUWnJxPFCCs07TOSbexYY.iu96b9Gnn3DmZWL2AHj7K4ua', NULL, NULL, NULL, '2025-02-20 05:53:28', '2025-02-26 22:35:08'),
(12, 'Raj Singh', 'rajsingh.icar01@gmail.com', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/ACg8ocLz-e4o5QfFELj0yerpCAGKObM8YiH_ntIRx__4JmQxXrrtjA=s96-c', 1, NULL, '$2y$12$I62UYs7CAYBjKyg2bso9f.pJcrRvfJFhI0Jw1HVI6KrZmXLBA4IpG', '114829308414871790844', NULL, NULL, '2025-02-26 23:03:32', '2025-02-26 23:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `varieties`
--

CREATE TABLE `varieties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `variety_name` varchar(255) NOT NULL,
  `year_of_notification` year(4) DEFAULT NULL,
  `average_yield` varchar(255) NOT NULL,
  `oil_content` varchar(255) NOT NULL,
  `day_of_maturity` varchar(255) NOT NULL,
  `release` enum('CVRC','State') DEFAULT NULL,
  `crop_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `varieties`
--

INSERT INTO `varieties` (`id`, `variety_name`, `year_of_notification`, `average_yield`, `oil_content`, `day_of_maturity`, `release`, `crop_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'JG-11', '2024', '525', 'Yes', '65', 'CVRC', 3, 1, NULL, '2025-01-13 00:41:25', '2025-01-21 00:01:10'),
(2, 'IPL316', '2023', '7800', 'No', '120', 'State', 1, 1, NULL, '2025-01-13 01:26:15', '2025-01-21 00:01:32'),
(3, 'Lorem', '2024', '520', 'Yes', '65', 'State', 2, 1, NULL, '2025-01-20 23:53:58', '2025-01-20 23:53:58'),
(4, 'RH 1975', '2025', '520', 'Yes', '65', 'CVRC', 1, 1, NULL, '2025-01-21 03:28:34', '2025-01-21 03:28:34'),
(5, 'IC-02541', '2025', '525', 'No', '65', 'State', 3, 5, NULL, '2025-01-28 01:36:02', '2025-01-28 01:36:02'),
(6, 'JG-11144', '2021', '525', 'No', '120', 'CVRC', 1, 5, NULL, '2025-01-30 00:42:48', '2025-01-30 00:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zone_name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `zone_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'West Zone', NULL, '2025-01-09 23:39:29', '2025-01-09 23:39:29'),
(2, 'South Zone', NULL, '2025-01-09 23:40:16', '2025-01-09 23:40:16'),
(3, 'North Zone', NULL, '2025-01-09 23:40:26', '2025-01-09 23:46:34'),
(4, 'East Zone', NULL, '2025-01-09 23:46:53', '2025-01-09 23:46:53'),
(5, 'qweertt', '2025-01-09 23:57:47', '2025-01-09 23:56:13', '2025-01-09 23:57:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centres`
--
ALTER TABLE `centres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `centres_centre_name_unique` (`centre_name`),
  ADD KEY `centres_zone_id_index` (`zone_id`),
  ADD KEY `centres_state_id_index` (`state_id`),
  ADD KEY `centres_user_id_index` (`user_id`),
  ADD KEY `centres_controlling_authority_id_index` (`controlling_authority_id`);

--
-- Indexes for table `controlling_authorities`
--
ALTER TABLE `controlling_authorities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `controlling_authorities_designation_id_index` (`designation_id`);

--
-- Indexes for table `crops`
--
ALTER TABLE `crops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revolving_funds`
--
ALTER TABLE `revolving_funds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `revolving_funds_centre_id_index` (`centre_id`),
  ADD KEY `revolving_funds_season_id_index` (`season_id`);

--
-- Indexes for table `revolving_fund_allocations`
--
ALTER TABLE `revolving_fund_allocations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `revolving_fund_allocations_centre_id_index` (`centre_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seed_availabilities`
--
ALTER TABLE `seed_availabilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seed_production_statuses`
--
ALTER TABLE `seed_production_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seed_production_statuses_seed_target_item_id_foreign` (`seed_target_item_id`);

--
-- Indexes for table `seed_targets`
--
ALTER TABLE `seed_targets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seed_targets_centre_id_index` (`centre_id`),
  ADD KEY `seed_targets_season_id_index` (`season_id`),
  ADD KEY `seed_targets_crop_id_foreign` (`crop_id`);

--
-- Indexes for table `seed_target_items`
--
ALTER TABLE `seed_target_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seed_target_items_seed_target_id_variety_id_category_id_unique` (`seed_target_id`,`variety_id`,`category_id`),
  ADD KEY `seed_target_items_seed_target_id_index` (`seed_target_id`),
  ADD KEY `seed_target_items_variety_id_index` (`variety_id`),
  ADD KEY `seed_target_items_category_id_index` (`category_id`),
  ADD KEY `seed_target_items_created_by_foreign` (`created_by`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_zone_id_index` (`zone_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD KEY `users_designation_id_foreign` (`designation_id`);

--
-- Indexes for table `varieties`
--
ALTER TABLE `varieties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `varieties_crop_id_foreign` (`crop_id`),
  ADD KEY `varieties_user_id_foreign` (`user_id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `centres`
--
ALTER TABLE `centres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `controlling_authorities`
--
ALTER TABLE `controlling_authorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crops`
--
ALTER TABLE `crops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `revolving_funds`
--
ALTER TABLE `revolving_funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `revolving_fund_allocations`
--
ALTER TABLE `revolving_fund_allocations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seed_availabilities`
--
ALTER TABLE `seed_availabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seed_production_statuses`
--
ALTER TABLE `seed_production_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seed_targets`
--
ALTER TABLE `seed_targets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seed_target_items`
--
ALTER TABLE `seed_target_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `varieties`
--
ALTER TABLE `varieties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `centres`
--
ALTER TABLE `centres`
  ADD CONSTRAINT `centres_controlling_authority_id_foreign` FOREIGN KEY (`controlling_authority_id`) REFERENCES `controlling_authorities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `centres_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `centres_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `centres_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `controlling_authorities`
--
ALTER TABLE `controlling_authorities`
  ADD CONSTRAINT `controlling_authorities_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `revolving_funds`
--
ALTER TABLE `revolving_funds`
  ADD CONSTRAINT `revolving_funds_centre_id_foreign` FOREIGN KEY (`centre_id`) REFERENCES `centres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `revolving_funds_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `revolving_fund_allocations`
--
ALTER TABLE `revolving_fund_allocations`
  ADD CONSTRAINT `revolving_fund_allocations_centre_id_foreign` FOREIGN KEY (`centre_id`) REFERENCES `centres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seed_production_statuses`
--
ALTER TABLE `seed_production_statuses`
  ADD CONSTRAINT `seed_production_statuses_seed_target_item_id_foreign` FOREIGN KEY (`seed_target_item_id`) REFERENCES `seed_target_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seed_targets`
--
ALTER TABLE `seed_targets`
  ADD CONSTRAINT `seed_targets_centre_id_foreign` FOREIGN KEY (`centre_id`) REFERENCES `centres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `seed_targets_crop_id_foreign` FOREIGN KEY (`crop_id`) REFERENCES `crops` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `seed_targets_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seed_target_items`
--
ALTER TABLE `seed_target_items`
  ADD CONSTRAINT `seed_target_items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `seed_target_items_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `seed_target_items_seed_target_id_foreign` FOREIGN KEY (`seed_target_id`) REFERENCES `seed_targets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `seed_target_items_variety_id_foreign` FOREIGN KEY (`variety_id`) REFERENCES `varieties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `varieties`
--
ALTER TABLE `varieties`
  ADD CONSTRAINT `varieties_crop_id_foreign` FOREIGN KEY (`crop_id`) REFERENCES `crops` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `varieties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
