-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2025 at 09:38 AM
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
(1, 'default', 'User created', 'App\\Models\\User', 'created', 1, NULL, NULL, '{\"attributes\":{\"name\":\"Admin\",\"email\":\"admin@mailinator.com\",\"phone\":null,\"designation_id\":null,\"address\":null,\"pincode\":null,\"avatar\":null,\"password\":\"$2y$12$oZVDFp4CATVz5qmLUKrmHeE2o0srMy3a4OOEGuO74b0V.MPiPXSh.\",\"deleted_at\":null}}', NULL, '2025-03-17 23:06:33', '2025-03-17 23:06:33'),
(2, 'default', 'User created', 'App\\Models\\User', 'created', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Dr. Lokesh Jain\",\"email\":\"jainlokesh74@gmail.com\",\"phone\":\"9414501893\",\"designation_id\":4,\"address\":\"Zonal Director Research, Agricultural Research Station (SKRAU, Bikaner), Karni Marg, Sriganganagar-, Rajasthan\",\"pincode\":\"335001\",\"avatar\":null,\"password\":\"$2y$12$ZSgv1xmIEmdx6PVZODtyDu0xJMpLqRw.0Y27YmGRMJOoh1hNskWXi\",\"deleted_at\":null}}', NULL, '2025-03-17 23:17:25', '2025-03-17 23:17:25'),
(3, 'default', 'User created', 'App\\Models\\User', 'created', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Dr Mahendra Singh\",\"email\":\"kvkborkherakota@gmail.com\",\"phone\":\"9414213488\",\"designation_id\":5,\"address\":\"Head, Krishi Vigyan Kendra (AU), Borkheda, Kota, Rajasthan\",\"pincode\":\"324001\",\"avatar\":null,\"password\":\"$2y$12$7o7yfnmlzXEK.oDSZspWHunbtKaZh3oGsv6UVlnMOj\\/voRW5UMWK2\",\"deleted_at\":null}}', NULL, '2025-03-17 23:19:05', '2025-03-17 23:19:05'),
(4, 'default', 'User created', 'App\\Models\\User', 'created', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Dr D N Kalita\",\"email\":\"kvk_kamrup@aau.ac.in\",\"phone\":\"7002737175\",\"designation_id\":6,\"address\":\"Head, KVK, Kamrup, Kahikuchi Campus, Guwahati-17 (Assam)\",\"pincode\":\"781017\",\"avatar\":null,\"password\":\"$2y$12$pYmkCl54IwSn1XYoJ4aCQOus\\/V.dBVdbFAs\\/Ck89jFnWzmZDsDVI6\",\"deleted_at\":null}}', NULL, '2025-03-17 23:22:40', '2025-03-17 23:22:40'),
(5, 'default', 'User created', 'App\\Models\\User', 'created', 5, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Dr. P. K. Yadav\",\"email\":\"pparmodyadava@rediffmail.com\",\"phone\":\"9416150751\",\"designation_id\":7,\"address\":\"CCS Haryana  Agricultural University Regional Research Station, Bawal (Rewari),Haryana)\",\"pincode\":\"123501\",\"avatar\":null,\"password\":\"$2y$12$JNk\\/w9S7CSAzUtU1rIe0gekcQ11.Mlzs67z6vZ.daVU\\/w3K6wrgR6\",\"deleted_at\":null}}', NULL, '2025-03-17 23:24:14', '2025-03-17 23:24:14'),
(6, 'default', 'User created', 'App\\Models\\User', 'created', 6, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Dr Jagendra Singh\",\"email\":\"dr.jagendrasingh@yahoo.in\",\"phone\":\"9893861622\",\"designation_id\":8,\"address\":\"Zonal Agriculture Research Station , A.B. Road, Morena (M.P.)\",\"pincode\":\"476001\",\"avatar\":null,\"password\":\"$2y$12$j6KwuqRHv62A15fnqD09MeHBhmmyNi8tjqTL9Ava8uQSdgttgDOaC\",\"deleted_at\":null}}', NULL, '2025-03-17 23:25:48', '2025-03-17 23:25:48'),
(7, 'default', 'User created', 'App\\Models\\User', 'created', 7, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Dr Shree Ram Singh\",\"email\":\"kvkbhu@gmail.com\",\"phone\":\"9450232889\",\"designation_id\":6,\"address\":\"Head, Krishi Vigyan Kendra (BHU), Barkachha District- Mirzapur,  (U.P.)\",\"pincode\":\"231001\",\"avatar\":null,\"password\":\"$2y$12$ArqkPn\\/ainnkhl71PrKzU..oyko00mLINrVQBr0RD.t.d2N3x70\\/e\",\"deleted_at\":null}}', NULL, '2025-03-17 23:27:05', '2025-03-17 23:27:05'),
(8, 'default', 'User created', 'App\\Models\\User', 'created', 8, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Dr Sujan Biswas\",\"email\":\"sargachhi@rkmm.org\",\"phone\":\"9002298552\",\"designation_id\":null,\"address\":\"KVK , Sargachhi Ashrama, Murshidabad (West Bengal)\",\"pincode\":\"742408\",\"avatar\":null,\"password\":\"$2y$12$YBwO4BYugac9pElbIuuxmu\\/Dix8HqzlQ0k\\/hDp9ONfrtlVJhD7e9.\",\"deleted_at\":null}}', NULL, '2025-03-17 23:29:23', '2025-03-17 23:29:23'),
(9, 'default', 'User created', 'App\\Models\\User', 'created', 9, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Dr Rakesh Kumar Choudhary\",\"email\":\"agrico.rakesh@gmail.com\",\"phone\":\"8057072701\",\"designation_id\":8,\"address\":\"RLBCAU, Gwalior Road, Jhansi (UP)\",\"pincode\":\"284003\",\"avatar\":null,\"password\":\"$2y$12$DQ9UfjPitCfwkOvDyg4K7ehQ40I3qbcJuuo4gh29Z5YaOKRnvJt3W\",\"deleted_at\":null}}', NULL, '2025-03-17 23:30:58', '2025-03-17 23:30:58');

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
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:76:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:9:\"role-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:11:\"role-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:9:\"role-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"role-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:9:\"user-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:11:\"user-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:9:\"user-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:11:\"user-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:15:\"permission-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:17:\"permission-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:15:\"permission-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:17:\"permission-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:9:\"crop-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:11:\"crop-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:9:\"crop-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:11:\"crop-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:13:\"category-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:15:\"category-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:13:\"category-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:15:\"category-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:11:\"season-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:13:\"season-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:11:\"season-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:13:\"season-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:9:\"zone-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:11:\"zone-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:9:\"zone-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:11:\"zone-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:10:\"state-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:12:\"state-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:10:\"state-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:12:\"state-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:12:\"variety-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:33;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:14:\"variety-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:34;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:12:\"variety-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:35;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:14:\"variety-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:36;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:16:\"designation-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:18:\"designation-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:16:\"designation-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:18:\"designation-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:26:\"controlling-authority-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:28:\"controlling-authority-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:26:\"controlling-authority-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:28:\"controlling-authority-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:11:\"centre-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:45;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:13:\"centre-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:46;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:11:\"centre-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:47;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:13:\"centre-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:16:\"seed-target-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:49;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:18:\"seed-target-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:50;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:16:\"seed-target-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:51;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:18:\"seed-target-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:52;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:27:\"seed-production-status-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:53;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:29:\"seed-production-status-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:54;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:27:\"seed-production-status-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:55;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:29:\"seed-production-status-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:56;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:19:\"revolving-fund-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:57;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:21:\"revolving-fund-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:58;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:19:\"revolving-fund-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:59;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:21:\"revolving-fund-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:60;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:11:\"report-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:61;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:13:\"report-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:62;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:11:\"report-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:63;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:13:\"report-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:64;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:30:\"revolving-fund-allocation-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:65;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:32:\"revolving-fund-allocation-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:66;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:30:\"revolving-fund-allocation-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:67;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:32:\"revolving-fund-allocation-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:68;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:17:\"activity-log-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:69;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:19:\"activity-log-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:70;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:17:\"activity-log-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:71;a:4:{s:1:\"a\";i:78;s:1:\"b\";s:19:\"activity-log-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:72;a:4:{s:1:\"a\";i:79;s:1:\"b\";s:12:\"setting-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:73;a:4:{s:1:\"a\";i:80;s:1:\"b\";s:14:\"setting-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:74;a:4:{s:1:\"a\";i:81;s:1:\"b\";s:12:\"setting-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:75;a:4:{s:1:\"a\";i:82;s:1:\"b\";s:14:\"setting-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"Admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:6:\"Centre\";s:1:\"c\";s:3:\"web\";}}}', 1742873254);

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
(1, 'Breeder Seed (BS)', NULL, '2025-03-17 05:42:39', '2025-03-17 05:42:39'),
(2, 'Foundation Seed (FS)', NULL, '2025-03-17 05:42:53', '2025-03-17 05:42:53'),
(3, 'Truthful Level Seed (TLS)', NULL, '2025-03-17 05:43:07', '2025-03-17 05:43:07'),
(4, 'Certifies Seed (CS)', NULL, '2025-03-17 05:43:23', '2025-03-17 05:43:23');

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
(1, 'ARS, Srigangangar, Rajasthan', 'Agricultural Research Station (SKRAU, Bikaner), Karni Marg, Sriganganagar', 2, 7, '335001', 2, 1, NULL, '2025-03-18 00:24:09', '2025-03-18 00:24:09'),
(2, 'Krishi Vigyan Kendra, Kota, (AU, Kota)', 'Krishi Vigyan Kendra (AU), Borkheda, Kota, Rajasthan', 3, 11, '324001', 3, 2, NULL, '2025-03-18 00:25:06', '2025-03-18 00:42:33'),
(3, 'Krishi Vigyan Kendra, Kamrup, Kahikuchi', 'Krishi Vigyan Kendra, Kamrup, Kahikuchi (AAU, Jorhat), Assam', 5, 19, '781017', 4, 3, NULL, '2025-03-18 00:26:23', '2025-03-18 00:42:56'),
(4, 'Regional Research Station, Bawal (Rewari)', 'Regional Research Station, Bawal (Rewari),  CCSHAU, Hisar', 2, 5, '123501', 5, 4, NULL, '2025-03-18 00:29:03', '2025-03-18 00:29:03'),
(5, 'Zonal Agricultural Research Station, Morena', 'Zonal Agricultural Research Station, Morena, (RVSKVV, Gwalior)', 3, 10, '476001', 6, 5, NULL, '2025-03-18 00:45:58', '2025-03-18 00:45:58'),
(6, 'Krishi Vigyan Kendra, Mirzapur, (BHU, Varanasi)', 'Krishi Vigyan Kendra (BHU), Barkachha, Mirzapur', 5, 15, '231001', 7, 6, NULL, '2025-03-18 00:47:44', '2025-03-18 00:47:44'),
(7, 'Krishi Vigyan Kendra, (Murshidabad)', 'Krishi Vigyan Kendra, (Murshidabad), Ramkrishna Mission, Saragachi, Murshidabad', 5, 18, '742408', 8, 7, NULL, '2025-03-18 00:49:40', '2025-03-18 00:49:40'),
(8, 'RLBCAU, Jhansi', 'Rani Lakshmi Bai Central Agricultural University, Jhansi', 3, 9, '284003', 9, 8, NULL, '2025-03-18 00:50:54', '2025-03-18 00:50:54');

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
(1, 'Dr. P. S. Shekahawat', 1, 'Swami Keshwanand Rajasthan Agricultural University, Bikaner, Rajasthan', '9414604614', 'dor@raubikaner.org', NULL, '2025-03-17 22:26:36', '2025-03-17 22:26:36'),
(2, 'Dr. S.K.Jain', 1, 'Agricultural University, Kota, Rajasthan', '0744-2321207', 'draukota@gmail.com', NULL, '2025-03-17 22:27:34', '2025-03-17 22:27:34'),
(3, 'Dr. Sanjay Kumar Chetia', 1, 'Assam Agricultural University, Jorhat, Assam', '0000000000', 'dr_agri@aau.ac.in', NULL, '2025-03-17 22:29:44', '2025-03-17 22:29:44'),
(4, 'Dr. S.K. Sehrawat', 1, 'Chaudhary Charan Singh Haryana Agricultural University, Hisar', '9416397658', 'dr@hau.ernet.in', NULL, '2025-03-17 22:31:31', '2025-03-17 22:31:31'),
(5, 'Dr. Sanjay K. Sharma', 1, 'Rajmata Vijayaraje Scindia Krishi Vishwa Vidyalaya, Gwalior', '0751-2970509', 'drs@rvskvv.net', NULL, '2025-03-17 22:32:37', '2025-03-17 22:32:37'),
(6, 'Dr. U. P. Singh', 2, 'Institute of Agricultural Sciences, Banaras Hindu University', '9451721177', 'director.ias.bhu@gmail.com', NULL, '2025-03-17 22:33:43', '2025-03-17 22:33:43'),
(7, 'Srimat Swami Gautamananda ji Maharaj', 3, 'Ramkrishna Mission, Saragachi, Murshidabad', '90832 75274', 'sargachhi@rkmm.org', NULL, '2025-03-17 22:34:57', '2025-03-17 22:34:57'),
(8, 'Dr. S.K. Chaturvedi', 1, 'Rani Lakshmi Bai Central Agricultural University, Jhansi', '9336214977', 'directorresearch.rlbcau@gmail.com', NULL, '2025-03-17 22:35:43', '2025-03-17 22:35:43');

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
(1, 'Indian Mustard', NULL, '2025-03-17 05:39:07', '2025-03-17 05:39:07'),
(2, 'Karan Rai', NULL, '2025-03-17 05:39:24', '2025-03-17 05:39:24'),
(3, 'Black Mustard', NULL, '2025-03-17 05:39:43', '2025-03-17 05:39:43'),
(4, 'Brown Sarson', NULL, '2025-03-17 05:40:00', '2025-03-17 05:40:00'),
(5, 'Toria', NULL, '2025-03-17 05:40:14', '2025-03-17 05:40:14'),
(6, 'Yellow Sarson', NULL, '2025-03-17 05:40:30', '2025-03-17 05:40:30'),
(7, 'Gobhi Sarson', NULL, '2025-03-17 05:40:47', '2025-03-17 05:40:47'),
(8, 'Taramira', NULL, '2025-03-17 05:41:00', '2025-03-17 05:41:00'),
(9, 'Rapeseed Mustard', NULL, '2025-03-19 00:01:29', '2025-03-19 00:01:29');

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
(1, 'Director Research', NULL, '2025-03-17 22:22:51', '2025-03-17 22:22:51'),
(2, 'Director', NULL, '2025-03-17 22:23:01', '2025-03-17 22:23:01'),
(3, 'President', NULL, '2025-03-17 22:23:11', '2025-03-17 22:23:11'),
(4, 'Associate Professor', NULL, '2025-03-17 22:23:21', '2025-03-17 22:23:21'),
(5, 'Sr. Scientist', NULL, '2025-03-17 22:23:32', '2025-03-17 22:23:32'),
(6, 'Pr. Scientist', NULL, '2025-03-17 22:23:42', '2025-03-17 22:23:42'),
(7, 'Assistant Scientist', NULL, '2025-03-17 22:23:54', '2025-03-17 22:23:54'),
(8, 'Scientist', NULL, '2025-03-17 22:24:05', '2025-03-17 22:24:05');

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
(41, '2025_02_21_043708_add_google_id_to_users_table', 31),
(42, '2025_03_05_043908_update_seed_production_statuses_table', 32),
(43, '2025_03_05_083704_update_revolving_fund_allocations_table', 33),
(44, '2025_03_07_041729_update_revolving_fund_allocations_table', 34),
(45, '2025_03_07_051511_remove_fields_revolving_funds_table', 35),
(46, '2025_03_07_052029_remove_fields_revolving_funds_table', 36),
(48, '2025_03_07_085542_update_revolving_funds_table', 37),
(49, '2025_03_07_113959_update_revolving_funds_table', 38),
(50, '2025_03_12_060517_create_site_settings_table', 39),
(51, '2025_03_13_054902_update_revolving_funds_table', 40);

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
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
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
(78, 'activity-log-delete', 'web', '2025-02-20 05:58:18', '2025-02-20 05:58:18'),
(79, 'setting-list', 'web', '2025-03-12 00:25:49', '2025-03-12 00:25:49'),
(80, 'setting-create', 'web', '2025-03-12 00:26:07', '2025-03-12 00:26:07'),
(81, 'setting-edit', 'web', '2025-03-12 00:26:22', '2025-03-12 00:26:22'),
(82, 'setting-delete', 'web', '2025-03-12 00:26:37', '2025-03-12 00:26:37');

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
  `description` varchar(255) DEFAULT NULL,
  `infrastructure_fund` decimal(5,2) NOT NULL,
  `utilized_infrastructure_fund` decimal(5,2) DEFAULT NULL,
  `available_infrastructure_fund` decimal(5,2) DEFAULT NULL,
  `training_organized` decimal(5,2) DEFAULT NULL,
  `field_day` decimal(5,2) DEFAULT NULL,
  `number_of_growers_involved` varchar(255) DEFAULT NULL,
  `seed_quantity` decimal(5,2) DEFAULT NULL,
  `procurement_rate` decimal(5,2) DEFAULT NULL,
  `procurement_amount` decimal(5,2) DEFAULT NULL,
  `farm_operations` decimal(5,2) DEFAULT NULL,
  `other_activities` decimal(5,2) DEFAULT NULL,
  `total_expenditures` decimal(5,2) DEFAULT NULL,
  `seed_sold` decimal(5,2) DEFAULT NULL,
  `seed_sold_rate` decimal(5,2) DEFAULT NULL,
  `amount_receipt` decimal(5,2) DEFAULT NULL,
  `interest_on_released_fund` decimal(5,2) DEFAULT NULL,
  `total_incomes` decimal(5,2) DEFAULT NULL,
  `opening_balance` decimal(5,2) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revolving_fund_allocations`
--

CREATE TABLE `revolving_fund_allocations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `centre_id` bigint(20) UNSIGNED NOT NULL,
  `season_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_fund_allocation` decimal(5,2) NOT NULL DEFAULT 0.00,
  `description` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, 'Centre', 'web', '2025-01-07 00:06:23', '2025-03-17 23:13:45');

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
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1);

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
  `major_constraints_for_distribution` varchar(255) DEFAULT NULL,
  `seed_sold` varchar(255) DEFAULT NULL,
  `seed_sold_date` date DEFAULT NULL,
  `surplus_seed` varchar(255) DEFAULT NULL COMMENT 'surplus_seed = seed_available_for_sale + reserved_seed',
  `seed_target_item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('jzlxdX9Rd7E1dR41YPtlDjtMWyM449H3zfL6EPKL', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUUFBRVdvZmE4bDR1dWpFQndDRGhmU0RHNk9aeDNmQWQ3T3FLTnJPQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb250YWN0LXVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1742557630),
('xQnZW9264CWiZ1UenM8cbwznweDRK4NFjixsPH9A', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieG5NczBWVjJFTlBqYWFFODI5TEd2NzlhR0FiZGttZmVEN0YwcXUwdyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vem9uZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1742801338);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `key`, `value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Seed Hub Portal', NULL, NULL, '2025-03-20 05:28:46'),
(2, 'site_email', 'mustardseedhub@mailinator.com', NULL, NULL, '2025-03-12 01:19:30'),
(3, 'site_phone', '+91-9988772255', NULL, NULL, '2025-03-12 01:17:04'),
(4, 'site_address', 'ICAR-Indian Institute of Rapeseed-Mustard Research (Indian Council of Agricultural Research) Sewar, Bharatpur 321303 (Rajasthan), India', NULL, NULL, '2025-03-20 05:15:16');

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
(1, 1, 'Himachal Pradesh', NULL, '2025-03-17 05:56:42', '2025-03-17 05:56:42'),
(2, 1, 'Jammu & Kashmir', NULL, '2025-03-17 05:56:57', '2025-03-17 05:56:57'),
(3, 1, 'Uttarakhand', NULL, '2025-03-17 05:57:10', '2025-03-17 05:57:10'),
(4, 2, 'Punjab', NULL, '2025-03-17 05:57:23', '2025-03-17 05:57:23'),
(5, 2, 'Haryana', NULL, '2025-03-17 05:57:36', '2025-03-17 05:57:36'),
(6, 2, 'Uttar Pradesh', NULL, '2025-03-17 05:57:49', '2025-03-17 05:57:49'),
(7, 2, 'Rajasthan', NULL, '2025-03-17 05:58:01', '2025-03-17 05:58:01'),
(8, 2, 'Delhi', NULL, '2025-03-17 05:58:11', '2025-03-17 05:58:11'),
(9, 3, 'Uttar Pradesh', NULL, '2025-03-17 05:58:24', '2025-03-17 05:58:24'),
(10, 3, 'Madhya Pradesh', NULL, '2025-03-17 05:58:35', '2025-03-17 05:58:35'),
(11, 3, 'Rajasthan', NULL, '2025-03-17 05:58:45', '2025-03-17 05:58:45'),
(12, 4, 'Rajasthan', NULL, '2025-03-17 05:58:59', '2025-03-17 05:58:59'),
(13, 4, 'Gujarat', NULL, '2025-03-17 05:59:10', '2025-03-17 05:59:10'),
(14, 4, 'Maharashtra', NULL, '2025-03-17 05:59:21', '2025-03-17 05:59:21'),
(15, 5, 'Uttar Pradesh', NULL, '2025-03-17 05:59:44', '2025-03-17 05:59:44'),
(16, 5, 'Jharkhand', NULL, '2025-03-17 05:59:56', '2025-03-17 05:59:56'),
(17, 5, 'Bihar', NULL, '2025-03-17 06:00:09', '2025-03-17 06:00:09'),
(18, 5, 'West Bengal', NULL, '2025-03-17 06:00:21', '2025-03-17 06:00:21'),
(19, 5, 'Assam', NULL, '2025-03-17 06:00:32', '2025-03-17 06:00:32'),
(20, 6, 'Manipur', NULL, '2025-03-17 06:00:50', '2025-03-17 06:00:50'),
(21, 6, 'Meghalaya', NULL, '2025-03-17 06:01:01', '2025-03-17 06:01:01'),
(22, 6, 'Mizoram', NULL, '2025-03-17 06:01:12', '2025-03-17 06:01:12'),
(23, 6, 'Arunachal Pradesh', NULL, '2025-03-17 06:01:24', '2025-03-17 06:01:24'),
(24, 6, 'Tripura', NULL, '2025-03-17 06:01:35', '2025-03-17 06:01:35'),
(25, 6, 'Sikkim', NULL, '2025-03-17 06:01:46', '2025-03-17 06:01:46'),
(26, 7, 'Odisha', NULL, '2025-03-17 06:02:46', '2025-03-17 06:02:46'),
(27, 7, 'Chhattisgarh', NULL, '2025-03-17 06:03:01', '2025-03-17 06:03:01');

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
(1, 'Admin', 'admin@mailinator.com', NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$12$oZVDFp4CATVz5qmLUKrmHeE2o0srMy3a4OOEGuO74b0V.MPiPXSh.', NULL, NULL, NULL, '2025-03-17 23:06:33', '2025-03-17 23:06:33'),
(2, 'Dr. Lokesh Jain', 'jainlokesh74@gmail.com', '9414501893', 4, 'Zonal Director Research, Agricultural Research Station (SKRAU, Bikaner), Karni Marg, Sriganganagar-, Rajasthan', '335001', NULL, 1, NULL, '$2y$12$ZSgv1xmIEmdx6PVZODtyDu0xJMpLqRw.0Y27YmGRMJOoh1hNskWXi', NULL, NULL, NULL, '2025-03-17 23:17:25', '2025-03-17 23:17:25'),
(3, 'Dr Mahendra Singh', 'kvkborkherakota@gmail.com', '9414213488', 5, 'Head, Krishi Vigyan Kendra (AU), Borkheda, Kota, Rajasthan', '324001', NULL, 1, NULL, '$2y$12$7o7yfnmlzXEK.oDSZspWHunbtKaZh3oGsv6UVlnMOj/voRW5UMWK2', NULL, NULL, NULL, '2025-03-17 23:19:05', '2025-03-17 23:19:05'),
(4, 'Dr D N Kalita', 'kvk_kamrup@aau.ac.in', '7002737175', 6, 'Head, KVK, Kamrup, Kahikuchi Campus, Guwahati-17 (Assam)', '781017', NULL, 1, NULL, '$2y$12$pYmkCl54IwSn1XYoJ4aCQOus/V.dBVdbFAs/Ck89jFnWzmZDsDVI6', NULL, NULL, NULL, '2025-03-17 23:22:40', '2025-03-17 23:22:40'),
(5, 'Dr. P. K. Yadav', 'pparmodyadava@rediffmail.com', '9416150751', 7, 'CCS Haryana  Agricultural University Regional Research Station, Bawal (Rewari),Haryana)', '123501', NULL, 1, NULL, '$2y$12$JNk/w9S7CSAzUtU1rIe0gekcQ11.Mlzs67z6vZ.daVU/w3K6wrgR6', NULL, NULL, NULL, '2025-03-17 23:24:14', '2025-03-17 23:24:14'),
(6, 'Dr Jagendra Singh', 'dr.jagendrasingh@yahoo.in', '9893861622', 8, 'Zonal Agriculture Research Station , A.B. Road, Morena (M.P.)', '476001', NULL, 1, NULL, '$2y$12$j6KwuqRHv62A15fnqD09MeHBhmmyNi8tjqTL9Ava8uQSdgttgDOaC', NULL, NULL, NULL, '2025-03-17 23:25:48', '2025-03-17 23:25:48'),
(7, 'Dr Shree Ram Singh', 'kvkbhu@gmail.com', '9450232889', 6, 'Head, Krishi Vigyan Kendra (BHU), Barkachha District- Mirzapur,  (U.P.)', '231001', NULL, 1, NULL, '$2y$12$ArqkPn/ainnkhl71PrKzU..oyko00mLINrVQBr0RD.t.d2N3x70/e', NULL, NULL, NULL, '2025-03-17 23:27:05', '2025-03-17 23:27:05'),
(8, 'Dr Sujan Biswas', 'sargachhi@rkmm.org', '9002298552', NULL, 'KVK , Sargachhi Ashrama, Murshidabad (West Bengal)', '742408', NULL, 1, NULL, '$2y$12$YBwO4BYugac9pElbIuuxmu/Dix8HqzlQ0k/hDp9ONfrtlVJhD7e9.', NULL, NULL, NULL, '2025-03-17 23:29:23', '2025-03-17 23:29:23'),
(9, 'Dr Rakesh Kumar Choudhary', 'agrico.rakesh@gmail.com', '8057072701', 8, 'RLBCAU, Gwalior Road, Jhansi (UP)', '284003', NULL, 1, NULL, '$2y$12$DQ9UfjPitCfwkOvDyg4K7ehQ40I3qbcJuuo4gh29Z5YaOKRnvJt3W', NULL, NULL, NULL, '2025-03-17 23:30:58', '2025-03-17 23:30:58');

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
(1, 'TS- 38', '2021', '3293 kg/ha', '41.4 % (40.4-42.6 %)', '93 days 85-95 days', 'CVRC', 5, 1, NULL, '2025-03-18 22:34:29', '2025-03-18 22:34:29'),
(2, 'Jeuti (JT 90-1)', '2020', '1444', '42.2', '91-95', 'CVRC', 5, 1, NULL, '2025-03-18 22:39:43', '2025-03-18 22:39:43'),
(3, 'Chhattisgarh Sarson', '2010', '1180-1200', '35.8-40.10', '99-128', 'CVRC', 1, 1, NULL, '2025-03-18 22:40:50', '2025-03-18 22:40:50'),
(4, 'Gujarat Mustard -8', '2023', '2791', '38.39', '94', 'CVRC', 1, 1, NULL, '2025-03-18 22:42:33', '2025-03-18 22:42:33'),
(5, 'Gujarat Mustard -5 (Gujarat Dantiwada Mustard-5)', '2016', '2081-2360', '38.0-41.4', '134-155', 'CVRC', 1, 1, NULL, '2025-03-18 22:43:49', '2025-03-18 22:43:49'),
(6, 'Gujarat Mustard -4  (Gujarat Dantiwada Mustard-4)', '2015', '2250-2600', '38.4-39.2', '105-115', 'CVRC', 1, 1, NULL, '2025-03-18 22:44:49', '2025-03-18 22:44:49'),
(7, 'Gujarat Mustard -2', '1997', '--', '38', '112', 'CVRC', 1, 1, NULL, '2025-03-18 22:46:00', '2025-03-18 22:46:00'),
(8, 'AKMS- 8141 (HPGS 1)', '2021', '3274 kg/ha', '40.5 % (37.5-42.8 %)', '166 days (133-219 days)', 'CVRC', 7, 1, NULL, '2025-03-18 22:47:52', '2025-03-18 22:47:52'),
(9, 'Him Sarson -1', '2009', '693-1789', '37.9-42.2', '146-172', 'CVRC', 7, 1, NULL, '2025-03-18 22:51:21', '2025-03-18 22:51:21'),
(10, 'RH 1975', '1950', '3600 kg/ha', '39.3 % (37.8-42.0 %)', '143 days (134-154 days)', 'CVRC', 1, 1, NULL, '2025-03-18 22:55:07', '2025-03-18 22:55:07'),
(11, 'RH(OE) 1706', '2023', '3364 kg/ha', '38.0 % (34.3-40.4 %)', '140 days (125-151 days)', 'CVRC', 1, 1, NULL, '2025-03-18 22:56:27', '2025-03-18 22:56:27'),
(12, 'RH 1424', '2023', '3456 kg/ha', '40.5 % (37.0-42.9 %)', '139 days (137-140 days)', 'CVRC', 1, 1, NULL, '2025-03-18 22:58:27', '2025-03-18 22:58:27'),
(13, 'RH 30', '1985', '1600-2000', '39', '130-135', 'CVRC', 1, 1, NULL, '2025-03-18 22:59:29', '2025-03-18 22:59:29'),
(14, 'RH 725', '2018', '3586 kg/ha', '40.2 % (39.7-40.6 %)', '141 days (136-143 days)', 'CVRC', 1, 1, NULL, '2025-03-18 23:01:49', '2025-03-18 23:01:49'),
(15, 'RH 0749', '2013', '3860 kg/ha', '39.8 % (38.0-41.1 %)', '132 days (124-142 days)', 'CVRC', 1, 1, NULL, '2025-03-18 23:08:31', '2025-03-18 23:08:31'),
(16, 'RH- 761', '2019', '3808 kg/ha', '40.4 % (39.0-42.3 %)', '141 days (130-150 days)', 'CVRC', 1, 1, NULL, '2025-03-18 23:10:01', '2025-03-18 23:10:01'),
(17, 'Laxmi (RH-8812)', '1997', '2200', '40', '145', 'CVRC', 1, 1, NULL, '2025-03-18 23:10:52', '2025-03-18 23:10:52'),
(18, 'Vasundhra (RH 9304)', '2003', '--', '38-40', '129-137', 'CVRC', 1, 1, NULL, '2025-03-18 23:12:13', '2025-03-18 23:12:13'),
(19, 'YSH 0401', '2009', '1273-1651', '43-45', '115-120', 'CVRC', 6, 1, NULL, '2025-03-18 23:18:04', '2025-03-18 23:18:04'),
(20, 'TH-68', '1991', '1800', '46', '95', 'CVRC', 5, 1, NULL, '2025-03-18 23:19:47', '2025-03-18 23:19:47'),
(21, 'CS 2005-143 (CS 64)', '2023', '2684 kg/ha', '38.4 % (37.9-40.0 %)', '138 days (135-145 days)', 'CVRC', 1, 1, NULL, '2025-03-18 23:21:06', '2025-03-18 23:21:06'),
(22, 'CS 61 (CS 13000-3-2-2-5-2)', '2022', '3200-3400', '40.3-42.4', '125-130', 'CVRC', 1, 1, NULL, '2025-03-18 23:33:35', '2025-03-18 23:33:35'),
(23, 'CS 60 (CS 2800-1-2-3-5-1)', '2018', '2696 kg/ha', '39.4%', '134 days', 'CVRC', 1, 1, NULL, '2025-03-18 23:34:40', '2025-03-18 23:34:40'),
(24, 'CS 1100-1-2-2-3 (CS 58)', '2017', '2803 kg/ha', '39.5 % (38.0-42.0 %)', '135 days (131-150 days)', 'CVRC', 1, 1, NULL, '2025-03-18 23:35:36', '2025-03-18 23:35:36'),
(25, 'JM 135', '2022', '1600-1800', '38.0-39.6', '135-145', 'CVRC', 1, 1, NULL, '2025-03-18 23:36:27', '2025-03-18 23:36:27'),
(26, 'RSPT-6', '2019', '1150', '42.6', '85-90', 'CVRC', 5, 1, NULL, '2025-03-18 23:37:36', '2025-03-18 23:37:36'),
(27, 'JGS 12-3', '2022', '1910', '38.0-41.2', '150-160', 'CVRC', 7, 1, NULL, '2025-03-18 23:48:25', '2025-03-18 23:48:25'),
(28, 'Shalimar Sarson-2', '2019', '1200', '41', '205-215', 'CVRC', 4, 1, NULL, '2025-03-18 23:58:34', '2025-03-18 23:58:34'),
(29, 'BBM 1 (Birsa Bhabha Mustard-1)', '2021', '1556', '40.3', '114-121', 'CVRC', 1, 1, NULL, '2025-03-18 23:59:33', '2025-03-18 23:59:33'),
(30, 'Raj Vijay Sarson 1 (RVS 1)', '2016', '1704', '40.2-43.1', '108 (98-121)', 'CVRC', 1, 1, NULL, '2025-03-19 00:00:26', '2025-03-19 00:00:26'),
(31, 'Raj Vijay Mustard-2', '1950', '--', '37.1-41.2', '140-150', 'CVRC', 9, 1, NULL, '2025-03-19 00:02:42', '2025-03-19 00:02:42'),
(32, 'Raj Vijay Toria-2', '2021', '1392', '41.3', '93-99', 'CVRC', 5, 1, NULL, '2025-03-19 00:03:45', '2025-03-19 00:04:11'),
(33, 'Raj Vijay Toria-3', '2020', '1392', '41.3', '93-99', 'CVRC', 5, 1, NULL, '2025-03-19 00:04:53', '2025-03-19 00:04:53'),
(34, 'TAM108-1', '1950', '--', '40-9', '145', 'CVRC', 1, 1, NULL, '2025-03-19 00:06:06', '2025-03-19 00:06:06'),
(35, 'PDZN-36', '1950', '--', '--', '--', 'CVRC', 1, 1, NULL, '2025-03-19 00:07:17', '2025-03-19 00:07:17'),
(36, 'PDZN-35', '1950', '--', '--', '--', 'CVRC', 1, 1, NULL, '2025-03-19 00:07:41', '2025-03-19 00:07:41'),
(37, 'Pusa Mustard- 34', '2023', '2609', '36', '147', 'CVRC', 1, 1, NULL, '2025-03-19 00:13:17', '2025-03-19 00:13:17'),
(38, 'PDZM-33', '2021', '2644', '37.5-39', '136-155', 'CVRC', 1, 1, NULL, '2025-03-19 00:14:19', '2025-03-19 00:14:19'),
(39, 'PDZM-3 I (Pusa Double Zero Mustard-31)', '2018', '2234', '40.7', '142', 'CVRC', 1, 1, NULL, '2025-03-19 01:25:53', '2025-03-19 01:25:53'),
(40, 'Pusa Mustard -32', '2021', '2067', '37.5-39.0', '143-147', 'CVRC', 1, 1, NULL, '2025-03-19 01:26:47', '2025-03-19 01:26:47'),
(41, 'Pusa Mustard-30 (LES-43)', '2013', '--', '39', '119-160', 'CVRC', 1, 1, NULL, '2025-03-19 01:27:55', '2025-03-19 01:27:55'),
(42, 'Pusa Mustard-28', '2012', '3003', '40.0-42.8', '97-131', 'CVRC', 1, 1, NULL, '2025-03-19 01:30:10', '2025-03-19 01:30:10'),
(43, 'Pusa Mustard-27', '2011', '2238', '39.6-45.4', '108-135', 'CVRC', 1, 1, NULL, '2025-03-19 01:32:00', '2025-03-19 01:32:00'),
(44, 'Pusa Musiard-26', '2011', '2353', '30.1-41.3', '115-137', 'CVRC', 1, 1, NULL, '2025-03-19 01:34:00', '2025-03-19 01:34:00'),
(45, 'Pusa Mustard-25', '2010', '2405', '35.5-41.2', '94-120', 'CVRC', 1, 1, NULL, '2025-03-19 01:35:11', '2025-03-19 01:35:11'),
(46, 'Pusa Agrani (SEJ-2)', '1998', '3111', '39-40', '77-110', 'CVRC', 1, 1, NULL, '2025-03-19 01:36:25', '2025-03-19 01:36:25'),
(47, 'Pusa Jaikisan', '1994', '3500', '40', '112-135', 'CVRC', 1, 1, NULL, '2025-03-19 01:37:44', '2025-03-19 01:37:44'),
(48, 'Rohini —WR R 2', '1996', '--', '41-43', '125-130', 'CVRC', 1, 1, NULL, '2025-03-19 01:38:44', '2025-03-19 01:38:44'),
(49, 'Varuna -W R R2', '2023', '2107', '39.1', '144', 'CVRC', 1, 1, NULL, '2025-03-19 02:58:17', '2025-03-19 02:58:17'),
(50, 'Pusa Bold -WRR2', '1985', '2450', '42', '110-145', 'CVRC', 1, 1, NULL, '2025-03-19 02:59:32', '2025-03-19 02:59:32'),
(51, 'Sampoorna', '2023', '1337', '40.3', '110-115', 'CVRC', 1, 1, NULL, '2025-03-19 03:33:31', '2025-03-19 03:33:31'),
(52, 'Sushree', '2015', '1381', '42.15', '75-83', 'CVRC', 5, 1, NULL, '2025-03-19 03:34:28', '2025-03-19 03:34:28'),
(53, 'PHR 126 (Hybrid)', '2021', '2280', '40.2', '145', 'CVRC', 1, 1, NULL, '2025-03-19 03:35:27', '2025-03-19 03:35:27'),
(54, 'RCH 1', '2021', '2666', '38.49', '149-155', 'CVRC', 1, 1, NULL, '2025-03-19 03:36:32', '2025-03-19 03:36:32'),
(55, 'TL- 17', '2016', '1300', '42', '90', 'CVRC', 5, 1, NULL, '2025-03-19 03:37:22', '2025-03-19 03:37:22'),
(56, 'GSC-7', '2016', '1911-2100', '40.5', '154', 'CVRC', 7, 1, NULL, '2025-03-19 03:39:19', '2025-03-19 03:39:19'),
(57, 'GSL-1', '1987', '1900-2200', '45', '160', 'CVRC', 7, 1, NULL, '2025-03-19 03:40:20', '2025-03-19 03:40:20'),
(58, 'BPM- 11', '1950', '--', '--', '--', 'CVRC', 1, 1, NULL, '2025-03-19 03:41:30', '2025-03-19 03:41:30'),
(59, 'Giriraj', '2013', '2246-2757', '42', '137-153', 'CVRC', 1, 1, NULL, '2025-03-19 03:44:56', '2025-03-19 03:44:56'),
(60, 'DRMR 1169-40', '2020', '--', '40-42.5 %', '133- 151', 'CVRC', 1, 1, NULL, '2025-03-19 03:46:31', '2025-03-19 03:46:31'),
(61, 'NRCHB 10 1', '2009', '1382-1491', '34.6-42.1', '105-135', 'CVRC', 1, 1, NULL, '2025-03-19 03:48:25', '2025-03-19 03:48:25'),
(62, 'Radhika', '2021', '1788', '40.7%', '120- 150 days', 'CVRC', 1, 1, NULL, '2025-03-19 03:52:59', '2025-03-19 03:52:59'),
(63, 'DRMR I50-35', '2020', '1828', '39.8', '114 days ( 86- 140 days)', 'CVRC', 1, 1, NULL, '2025-03-19 04:17:48', '2025-03-19 04:17:48'),
(64, 'Brijraj', '2021', '1681- 1801', '37.6- 40.9 %', '120- 149', 'CVRC', 1, 1, NULL, '2025-03-19 04:18:43', '2025-03-19 04:18:43'),
(65, 'NRCDR 60I', '2010', '1939-2626', '38.7- 41.6 %', '137-151', 'CVRC', 1, 1, NULL, '2025-03-19 04:19:39', '2025-03-19 04:19:39'),
(66, 'NRCYS 05—02', '2009', '1239-1715', '38.2- 46.5', '94-181', 'CVRC', 6, 1, NULL, '2025-03-19 04:20:40', '2025-03-19 04:20:40'),
(67, 'RGN-298', '2014', '2062-2245', '--', '134-157', 'CVRC', 1, 1, NULL, '2025-03-19 04:21:37', '2025-03-19 04:21:37'),
(68, 'RTM—1351', '2017', '1300-1500', '37.7', '137-142', 'CVRC', 8, 1, NULL, '2025-03-19 04:22:33', '2025-03-19 04:22:33'),
(69, 'RTM- 1355', '2017', '1300-1500', '39.7', '137-142', 'CVRC', 8, 1, NULL, '2025-03-19 04:23:29', '2025-03-19 04:23:29'),
(70, 'RTM-1624', '2022', '1203', '39.8', '139', 'CVRC', 8, 1, NULL, '2025-03-19 04:24:18', '2025-03-19 04:24:18'),
(71, 'Urvashi', '2001', '3600', '39', '125', 'CVRC', 1, 1, NULL, '2025-03-19 04:25:10', '2025-03-19 04:25:10'),
(72, 'Azad Chetna', '2021', '1440', '42.2', '90-95', 'CVRC', 5, 1, NULL, '2025-03-19 04:26:17', '2025-03-19 04:26:17'),
(73, 'Bhawani', '1986', '2190', '39-44', '75-80', 'CVRC', 5, 1, NULL, '2025-03-19 04:27:59', '2025-03-19 04:27:59'),
(74, 'Tapeshwari', '2018', '1200-1300', '41', '90-95', 'CVRC', 5, 1, NULL, '2025-03-19 04:28:58', '2025-03-19 04:28:58'),
(75, 'T-9', '1975', '1200-1500', '40', '90-95', 'CVRC', 5, 1, NULL, '2025-03-19 04:30:33', '2025-03-19 04:30:33'),
(76, 'Pitambari (RYSK 05-02)', '2010', '2238', '39.6-48.8', '110-115', 'CVRC', 6, 1, NULL, '2025-03-19 04:31:29', '2025-03-19 04:31:29'),
(77, 'Pant Hill Toria-1', '2017', '900-1200', '42', '122-124', 'CVRC', 5, 1, NULL, '2025-03-19 04:32:39', '2025-03-19 04:32:39'),
(78, 'Pant Toria 508', '2018', '1600-1900', '42', '91-96', 'CVRC', 5, 1, NULL, '2025-03-19 04:33:37', '2025-03-19 04:33:37'),
(79, 'Pant Toria 303', '1985', '566-1137', '41-44', '91-97', 'CVRC', 5, 1, NULL, '2025-03-19 04:34:30', '2025-03-19 04:34:30'),
(80, 'Pant Pili Sarson 2', '1986', '1386', '45.1', '109', 'CVRC', 6, 1, NULL, '2025-03-19 04:36:26', '2025-03-19 04:36:26'),
(81, 'Pant Sweta', '2017', '1600-2000', '45', '105-110', 'CVRC', 6, 1, NULL, '2025-03-19 04:37:33', '2025-03-19 04:37:33'),
(82, 'Benoy (B-9)', '1982', '2000', '46', '90-95', 'CVRC', 6, 1, NULL, '2025-03-19 04:38:40', '2025-03-19 04:38:40'),
(83, 'Agrani (B-54)', '1982', '1000-1200', '41', '85-88', 'CVRC', 5, 1, NULL, '2025-03-19 04:39:39', '2025-03-19 04:39:57'),
(84, 'Anushka', '2020', '1200-1500', '44-45', '85', 'CVRC', 6, 1, NULL, '2025-03-19 04:42:41', '2025-03-19 04:42:41'),
(85, 'Sanchita', '2020', '1400-1600', '44-45', '95-97', 'CVRC', 6, 1, NULL, '2025-03-19 04:43:38', '2025-03-19 04:43:38'),
(86, 'Subinoy', '1991', '1800', '45-46', '97-103', 'CVRC', 6, 1, NULL, '2025-03-19 04:44:45', '2025-03-19 04:44:45');

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
(1, 'Zone-I', NULL, '2025-03-17 05:45:46', '2025-03-17 05:45:46'),
(2, 'Zone-II', NULL, '2025-03-17 05:45:55', '2025-03-17 05:45:55'),
(3, 'Zone-III', NULL, '2025-03-17 05:46:02', '2025-03-17 05:46:02'),
(4, 'Zone-IV', NULL, '2025-03-17 05:46:13', '2025-03-17 05:46:13'),
(5, 'Zone-V', NULL, '2025-03-17 05:46:24', '2025-03-17 05:46:24'),
(6, 'Zone-VI', NULL, '2025-03-17 05:46:37', '2025-03-17 05:46:37'),
(7, 'Zone-VII', NULL, '2025-03-17 06:02:29', '2025-03-17 06:02:29');

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
  ADD KEY `revolving_fund_allocations_centre_id_index` (`centre_id`),
  ADD KEY `revolving_fund_allocations_season_id_foreign` (`season_id`);

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
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_settings_key_unique` (`key`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `centres`
--
ALTER TABLE `centres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `controlling_authorities`
--
ALTER TABLE `controlling_authorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `crops`
--
ALTER TABLE `crops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revolving_fund_allocations`
--
ALTER TABLE `revolving_fund_allocations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seed_targets`
--
ALTER TABLE `seed_targets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seed_target_items`
--
ALTER TABLE `seed_target_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `varieties`
--
ALTER TABLE `varieties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `revolving_fund_allocations_centre_id_foreign` FOREIGN KEY (`centre_id`) REFERENCES `centres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `revolving_fund_allocations_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`) ON DELETE CASCADE;

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
