-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 07:07 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tomorrowshope`
--

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
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(31, '2014_10_12_000000_create_users_table', 1),
(32, '2014_10_12_100000_create_password_resets_table', 1),
(33, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(34, '2019_08_19_000000_create_failed_jobs_table', 1),
(35, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(36, '2021_02_13_151358_create_sessions_table', 1),
(37, '2021_02_14_055757_create_supporteds_table', 1),
(38, '2021_02_14_095515_create_sponsor_datas_table', 1),
(39, '2021_02_15_110355_create_histories_table', 1),
(40, '2021_02_20_211305_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `url`, `disc`, `status`, `type`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'http://tomorrowshope.tv/paymentlog', 'Mustafa  Payment  50 $', 'read', 'donation', '2021-06-23 23:35:18', '2021-04-24 17:32:56', '2021-04-24 17:32:56'),
(2, 1, 'http://tomorrowshope.tv/paymentlog', 'Mustafa  Payment  50 $', 'read', 'donation', '2021-06-23 23:35:18', '2021-04-24 17:36:28', '2021-04-24 17:36:28'),
(3, 3, 'http://tomorrowshope.tv/paymentlog', 'Mustafa  Payment  50 $', 'read', 'donation', '2021-04-24 17:51:51', '2021-04-24 17:50:23', '2021-04-24 17:50:23'),
(4, 1, 'http://tomorrowshope.tv/paymentlog', 'Mustafa  Payment  50 $', 'read', 'donation', '2021-04-27 11:30:05', '2021-04-24 18:31:07', '2021-04-24 18:31:07'),
(5, 1, 'http://localhost/tomorrowshope/paymentlog', 'Mustafa  Payment  150 £', 'read', 'donation', '2021-04-29 14:16:43', '2021-04-29 14:15:57', '2021-04-29 14:15:57'),
(7, 3, 'http://localhost/tomorrowshope/paymentlog', 'Mustafa  Payment  150 £', 'read', 'donation', '2021-04-29 14:22:28', '2021-04-29 14:21:10', '2021-04-29 14:21:10'),
(8, 3, 'http://localhost/tomorrowshope/paymentlog', 'Mustafa  Payment  50 £', 'read', 'donation', '2021-04-29 16:17:44', '2021-04-29 14:57:37', '2021-04-29 14:57:37'),
(9, 3, 'http://localhost/tomorrowshope/paymentlog', 'Mustafa  Payment  200 £', 'read', 'donation', '2021-04-29 16:17:44', '2021-04-29 14:58:31', '2021-04-29 14:58:31'),
(10, 6, 'http://localhost/tomorrowshope/paymentlog', 'Mustafa Khan  Payment  17838 £', 'read', 'donation', '2021-06-19 23:06:32', '2021-06-14 23:30:47', '2021-06-14 23:30:47'),
(11, 3, 'http://localhost/tomorrowshope/paymentlog', 'Mustafa  Payment  4483 £', 'unread', 'donation', NULL, '2021-09-22 00:34:33', '2021-09-22 00:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mustafa@asaraglobal.com', '$2y$10$G/EUD1kH0bMifOKM6rQ3MuVPxJtEFh9FPuPZgLS8HAHRskAZM73Mq', '2021-04-29 13:45:32'),
('mustafadeveloeper2@gmail.com', '$2y$10$nhdRnuDlQosznH4O2gUBzunvA4Xvb9u8mUQePrl9HfGjsTFTSXPwm', '2021-04-29 13:46:12');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7U63eP7hQODm76rS5bnM1Flku01MyRXDKZShUswP', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNTBYRlhJbDBHa2FpbVJHQ3NBTmRkSnVYYnRBQmU3eXNqYWFGb2FIbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3QvdG9tb3Jyb3dzaG9wZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1628589574),
('9MB9h3yd9IAxeKMLYELBDYcAvzQLs6Awo70XNVds', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibWZOTldkYklTbGRlWTBoNFVmc3lBSHVNb3J5SGNCSTI4UGtNUmZxdCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3QvZG9uYXRpb24vc3lzdGVtYWRtaW4iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkdWFrSFlHOEN5a0ViSmhwem5OaUk5T1NvZTlKT1AuWkhPYUh0RmtVWC9GN1czdUwuSGdmbGkiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHVha0hZRzhDeWtFYkpocHpuTmlJOU9Tb2U5Sk9QLlpIT2FIdEZrVVgvRjdXM3VMLkhnZmxpIjt9', 1624740729),
('9nv0d5gZCiC5RhdtR6Qm4aAbohsoJ3bCItQVRsCK', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM2tSa3l0b0Vld3RIYzZHYTBLcjMyR25OZjZaSjFiMXlqRFBSUUZkdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3QvdG9tb3Jyb3dzaG9wZS9mYSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1627717103),
('BkYjXqWhaXimLNhSXPKAIwCaewCIcUmriorWkEL3', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiRGd5eDZpV0FJS2Q1Qm1OMzI3YW1Hc3hYY0pHUnd3NHJlbmdkaWZrciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1625047971),
('gJTGShtGqKKKo26fKv0L1r1tWqxXqhKGL6ngF0Jo', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiZU12SjlVaVBrdzlpNW1OTHJncE1rbExSM216Wjd3blBsSDhMb3BLUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1624737825),
('hauVnHKc35umoMhgJsHreR0HK11W9PNLErrpb0Sw', 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiUGY1R3d2NmhNNzhqdjY3RVg0OE02TDNuVzBQWmdBeFpQWks4VVZJbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3QvdG9tb3Jyb3dzaG9wZS9wYXltZW50LzQ0ODMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjIzMDoiaHR0cDovL2xvY2FsaG9zdC90b21vcnJvd3Nob3BlL2ZhbWlseWxpc3QvZXlKcGRpSTZJbXRRTlRsSWEydHRabkYwTUhWVlpISXlPVE50VkVFOVBTSXNJblpoYkhWbElqb2lOMlZXVVRSb2RGVXlaMDkyUWtGMmVVSkZXR1JzUVQwOUlpd2liV0ZqSWpvaU9USmtaV00zT1dSaU56Y3hNMlZoWW1WaE5EUXlZMlZtWW1FMlpURTNPVEV3Wm1Oa1pHRXpaRGMwTldSak1UQTRNbUpoT0dGaE5XWTNNRFZrTjJVeE9DSjkiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6NzoiaXNhZG1pbiI7czo0OiJ1c2VyIjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFpYNmRrOHFYZXo5Q3VnVUR3UWpIeHVwMDJoYk1tbFhxaUZhSnhMLndTTlByb0tQcm5KOXBlIjt9', 1628251457),
('JMLbceYj3EsO1f7SjGNOCIQqLAyT330dN0fJ1E9y', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiek5YY2VMOGl2dGRDenlFNlZwMEFuZU9qRkplV0dGa2docUVXT284dSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3QvdG9tb3Jyb3dzaG9wZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1641535559),
('K2aV82Vy4KMpgpDBaFFWu1vxIUVjxxqn6h4tnyXA', 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiRkZ2a0pEaEJjUWpUU3ZTMVNOdU1lWndXMVU5ekluUVc4dnY5TVlPWiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cDovL2xvY2FsaG9zdC90b21vcnJvd3Nob3BlL3VzZXIiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MToiaHR0cDovL2xvY2FsaG9zdC90b21vcnJvd3Nob3BlL2ZhbWlseWxpc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6NzoiaXNhZG1pbiI7czo0OiJ1c2VyIjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFpYNmRrOHFYZXo5Q3VnVUR3UWpIeHVwMDJoYk1tbFhxaUZhSnhMLndTTlByb0tQcm5KOXBlIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRaWDZkazhxWGV6OUN1Z1VEd1FqSHh1cDAyaGJNbWxYcWlGYUp4TC53U05Qcm9LUHJuSjlwZSI7fQ==', 1628669220),
('Oy0YB6SLMVTTUdKvGA7ocolSaTo30CLDHT3q5Jjv', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT1FNS1M1VmlGeDFnMVJZRFI5UkRid1JiUTJUMUw0aEptVmlmWmZsayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3QvdG9tb3Jyb3dzaG9wZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1628669117),
('PmhiE9pX2Di0YjQUTXNvoGTcaMoC7UI3q7XE4zDB', 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiVE1IRk01emYwNnNReUxWZGRiUG9LeElFeUVPd1NkM1hybVo5NldXWCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cDovL2xvY2FsaG9zdC9wYXltZW50L3VzZXJzIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvdG9tb3Jyb3dzaG9wZS9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkWlg2ZGs4cVhlejlDdWdVRHdRakh4dXAwMmhiTW1sWHFpRmFKeEwud1NOUHJvS1Bybko5cGUiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFpYNmRrOHFYZXo5Q3VnVUR3UWpIeHVwMDJoYk1tbFhxaUZhSnhMLndTTlByb0tQcm5KOXBlIjt9', 1632245722),
('Qke1O3opRKNxySaA1kYZvAYeMrtJmvNG9RtJK1zc', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1hVdFl0M1c3TnpTdENqWkxFR1h1YkcwZG0wNzlWZ0ljUjNaOWNtOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3QvdG9tb3Jyb3dzaG9wZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1632245382),
('W3jdMGMj70LeobO659NTr4x4hQcm6Fial8HvUeJn', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiU1lOTUF6b29uZW45TzhYUzFSRW5DRzhITVR4YlExeGc4TDNCeHRuaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3QvZG9uYXRpb24vcHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkdWFrSFlHOEN5a0ViSmhwem5OaUk5T1NvZTlKT1AuWkhPYUh0RmtVWC9GN1czdUwuSGdmbGkiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHVha0hZRzhDeWtFYkpocHpuTmlJOU9Tb2U5Sk9QLlpIT2FIdEZrVVgvRjdXM3VMLkhnZmxpIjt9', 1624739860),
('xEk6JpX5GpijSXeVh5RMejjN7WMdA7AV0Wu0Bztb', 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVk9IZlB3YkE4MWsxaTZtdlhsd2F1QVVwa2JXN3RTcU9JMnpSejExYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9sb2NhbGhvc3QvdG9tb3Jyb3dzaG9wZS9zeXN0ZW1hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRaWDZkazhxWGV6OUN1Z1VEd1FqSHh1cDAyaGJNbWxYcWlGYUp4TC53U05Qcm9LUHJuSjlwZSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkWlg2ZGs4cVhlejlDdWdVRHdRakh4dXAwMmhiTW1sWHFpRmFKeEwud1NOUHJvS1Bybko5cGUiO30=', 1631461155);

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_datas`
--

CREATE TABLE `sponsor_datas` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sponsorship_level` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `suported_id` int(10) UNSIGNED NOT NULL,
  `total_price` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsor_datas`
--

INSERT INTO `sponsor_datas` (`id`, `user_id`, `sponsorship_level`, `status`, `suported_id`, `total_price`, `created_at`, `updated_at`) VALUES
(30, 3, 50, 'finish', 7, 0, '2021-04-24 17:49:56', '2021-04-24 17:50:00'),
(31, 1, 50, 'finish', 1, 0, '2021-04-24 18:00:22', '2021-04-24 18:31:00'),
(32, 1, 50, 'finish', 2, 0, '2021-04-24 18:10:51', '2021-04-24 18:31:00'),
(33, 1, 50, 'finish', 7, 0, '2021-04-24 18:15:46', '2021-04-24 18:31:00'),
(34, 1, 50, 'finish', 1, 0, '2021-04-27 11:36:25', '2021-04-29 14:14:00'),
(35, 1, 50, 'finish', 2, 0, '2021-04-27 12:41:18', '2021-04-29 14:14:00'),
(36, 1, 50, 'finish', 4, 0, '2021-04-27 13:24:24', '2021-04-29 14:14:00'),
(37, 3, 50, 'finish', 9, 0, '2021-04-27 17:03:14', '2021-04-29 14:21:00'),
(38, 3, 50, 'finish', 11, 0, '2021-04-27 17:03:31', '2021-04-29 14:21:00'),
(39, 3, 50, 'finish', 4, 0, '2021-04-27 17:12:55', '2021-04-29 14:21:00'),
(40, 3, 50, 'finish', 1, 0, '2021-04-27 18:09:44', '2021-04-29 14:21:00'),
(42, 3, 50, 'finish', 2, 0, '2021-04-29 14:20:39', '2021-04-29 14:21:00'),
(43, 3, 50, 'finish', 7, 0, '2021-05-12 14:57:03', '2021-04-29 14:57:00'),
(44, 3, 200, 'finish', 2, 0, '2021-04-29 14:58:11', '2021-04-29 14:58:00'),
(45, 1, 50, 'draft', 1, 0, '2021-04-29 17:12:50', NULL),
(46, 3, 50, 'finish', 2, 0, '2021-05-01 16:24:15', '2021-09-21 12:34:00'),
(47, 3, 50, 'finish', 1, 0, '2021-05-01 16:41:15', '2021-09-21 12:34:00'),
(48, 3, 50, 'finish', 7, 0, '2021-05-01 16:44:44', '2021-09-21 12:34:00'),
(49, 3, 100, 'finish', 11, 0, '2021-05-01 16:52:17', '2021-09-21 12:34:00'),
(50, 3, 150, 'finish', 1, 0, '2021-05-01 17:50:19', '2021-09-21 12:34:00'),
(51, 3, 150, 'finish', 11, 0, '2021-05-01 17:55:15', '2021-09-21 12:34:00'),
(55, 6, 50, 'finish', 7, 0, '2021-05-02 16:45:24', '2021-06-14 11:30:00'),
(58, 6, 66, 'finish', 2, 0, '2021-05-02 17:30:38', '2021-06-14 11:30:00'),
(59, 6, 30, 'finish', 2, 0, '2021-05-02 17:31:49', '2021-06-14 11:30:00'),
(60, 6, 88, 'finish', 2, 0, '2021-05-02 17:34:18', '2021-06-14 11:30:00'),
(61, 6, 100, 'finish', 2, 0, '2021-05-02 17:34:23', '2021-06-14 11:30:00'),
(63, 6, 0, 'finish', 2, 0, '2021-05-02 17:37:24', '2021-06-14 11:30:00'),
(65, 6, 6756, 'finish', 2, 0, '2021-05-02 17:39:35', '2021-06-14 11:30:00'),
(66, 6, 0, 'finish', 11, 0, '2021-05-02 17:44:07', '2021-06-14 11:30:00'),
(68, 6, 50, 'finish', 10, 0, '2021-05-02 17:47:09', '2021-06-14 11:30:00'),
(69, 6, 0, 'finish', 10, 0, '2021-05-02 17:49:27', '2021-06-14 11:30:00'),
(70, 6, 0, 'finish', 10, 0, '2021-05-02 17:49:50', '2021-06-14 11:30:00'),
(71, 6, 0, 'finish', 10, 0, '2021-05-02 17:51:27', '2021-06-14 11:30:00'),
(72, 6, 150, 'finish', 10, 0, '2021-05-02 17:53:50', '2021-06-14 11:30:00'),
(73, 6, 0, 'finish', 10, 0, '2021-05-02 17:54:06', '2021-06-14 11:30:00'),
(74, 6, 2143, 'finish', 10, 0, '2021-05-02 17:56:02', '2021-06-14 11:30:00'),
(75, 6, 65465, 'finish', 10, 0, '2021-05-02 17:56:20', '2021-06-14 11:30:00'),
(79, 6, 50, 'finish', 2, 0, '2021-05-02 18:21:31', '2021-06-14 11:30:00'),
(87, 6, 876, 'finish', 2, 0, '2021-05-02 18:32:39', '2021-06-14 11:30:00'),
(88, 6, 150, 'finish', 2, 0, '2021-05-02 18:32:44', '2021-06-14 11:30:00'),
(89, 6, 76, 'finish', 2, 0, '2021-05-02 18:45:35', '2021-06-14 11:30:00'),
(90, 6, 878, 'finish', 2, 0, '2021-05-02 18:45:46', '2021-06-14 11:30:00'),
(91, 6, 8768, 'finish', 2, 0, '2021-05-02 18:46:58', '2021-06-14 11:30:00'),
(94, 1, 50, 'draft', 2, 0, '2021-06-01 22:59:49', NULL),
(95, 1, 77, 'draft', 2, 0, '2021-06-24 02:47:03', NULL),
(96, 6, 50, 'draft', 2, 0, '2021-06-27 03:43:02', NULL),
(97, 3, 4233, 'finish', 1, 0, '2021-08-06 19:03:53', '2021-09-21 12:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `supporteds`
--

CREATE TABLE `supporteds` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `disc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supporteds`
--

INSERT INTO `supporteds` (`id`, `name`, `place`, `gender`, `age`, `disc`, `language`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Rabia Mohamadin', 'kabul ,Afghanistan', 'Male', 22, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! \"Now fax quiz Jack!\" my brave ghost pled. Five quacking zephyrs jolt my wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. A very bad quack might jinx zippy fowls. Few quips galvanized the mock jury box. Quick brown dogs jump over the lazy fox. The jay, pig, fox, zebra, and my wolves quack! Blowzy red vixens fight for a quick jump. Joaquin Phoenix was gazed by MTV for luck. A wizard’s job is to vex chumps quickly in fog. Watch \"Jeopardy!\", Alex Trebek\'s fun TV quiz game. Woven silk pyjamas exchanged for blue quartz.', 'English', 'supporteds-img/XYFOTaimnExxraETOaTdEZXopn0RqU3O9sNL3njH.jpg', '2021-04-21 00:09:32', '2021-04-21 00:10:24'),
(2, 'Waseem Niazi', 'kabul ,Afghanistan', 'Famel', 22, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! \"Now fax quiz Jack!\" my brave ghost pled. Five quacking zephyrs jolt my wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. A very bad quack might jinx zippy fowls. Few quips galvanized the mock jury box. Quick brown dogs jump over the lazy fox. The jay, pig, fox, zebra, and my wolves quack! Blowzy red vixens fight for a quick jump. Joaquin Phoenix was gazed by MTV for luck. A wizard’s job is to vex chumps quickly in fog. Watch \"Jeopardy!\", Alex Trebek\'s fun TV quiz game. Woven silk pyjamas exchanged for blue quartz.', 'English', 'supporteds-img/TYyPddl1Fa34QNiBMC9RpDGvKKC4LaxN09wTFM7L.jpg', '2021-04-21 00:10:11', NULL),
(3, 'Mustafa', 'kabul ,Afghanistan', 'Male', 33, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! \"Now fax quiz Jack!\" my brave ghost pled. Five quacking zephyrs jolt my wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. A very bad quack might jinx zippy fowls. Few quips galvanized the mock jury box. Quick brown dogs jump over the lazy fox. The jay, pig, fox, zebra, and my wolves quack! Blowzy red vixens fight for a quick jump. Joaquin Phoenix was gazed by MTV for luck. A wizard’s job is to vex chumps quickly in fog. Watch \"Jeopardy!\", Alex Trebek\'s fun TV quiz game. Woven silk pyjamas exchanged for blue quartz.', 'English', 'supporteds-img/AKv1nD9cqW971sr0IPlNPGqrBxVGcEeqNbmNV4dG.jpg', '2021-04-21 00:10:54', NULL),
(4, 'Jamaitullah Nemat', 'kabul ,Afghanistan', 'Male', 22, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! \"Now fax quiz Jack!\" my brave ghost pled. Five quacking zephyrs jolt my wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. A very bad quack might jinx zippy fowls. Few quips galvanized the mock jury box. Quick brown dogs jump over the lazy fox. The jay, pig, fox, zebra, and my wolves quack! Blowzy red vixens fight for a quick jump. Joaquin Phoenix was gazed by MTV for luck. A wizard’s job is to vex chumps quickly in fog. Watch \"Jeopardy!\", Alex Trebek\'s fun TV quiz game. Woven silk pyjamas exchanged for blue quartz.', 'English', 'supporteds-img/A8oOpBdIIhVJOwSgNjUPurI27C8JgyH6RnwEUIQ6.png', '2021-04-21 00:11:27', '2021-06-24 02:43:54'),
(5, 'مصطفی', 'کابل. افغانستان', 'Male', 22, 'به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد. معمولا طراحان گرافیک برای صفحه‌آرایی، نخست از متن‌های آزمایشی و بی‌معنی استفاده می‌کنند تا صرفا به مشتری یا صاحب کار خود نشان دهند که صفحه طراحی یا صفحه بندی شده بعد از اینکه متن در آن قرار گیرد چگونه به نظر می‌رسد و قلم‌ها و اندازه‌بندی‌ها چگونه در نظر گرفته شده‌است. از آنجایی که طراحان عموما نویسنده متن نیستند', 'Farsi', 'supporteds-img/DfzmSmx0CiQ8LvdQim0jKz5K5vqYm8asWGkP37f5.jpg', '2021-04-21 11:18:42', NULL),
(6, 'وسینم', 'کابل. افغانستان', 'Male', 22, 'به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد. معمولا طراحان گرافیک برای صفحه‌آرایی، نخست از متن‌های آزمایشی و بی‌معنی استفاده می‌کنند تا صرفا به مشتری یا صاحب کار خود نشان دهند که صفحه طراحی یا صفحه بندی شده بعد از اینکه متن در آن قرار گیرد چگونه به نظر می‌رسد و قلم‌ها و اندازه‌بندی‌ها چگونه در نظر گرفته شده‌است. از آنجایی که طراحان عموما نویسنده متن نیستند و وظیفه رعایت حق تکثیر متون را ندارند و در همان حال کار آنها به نوعی وابسته به متن می‌باشد آنها با استفاده از محتویات ساختگی، صفحه گرافیکی خود را صفحه‌آرایی می‌کنند تا مرحله طراحی و صفحه‌بندی را به پایان برند.', 'Farsi', 'supporteds-img/1tPEBjwF09ZYklca2Nw1KKm0FzIMKyh9gaKokiVk.jpg', '2021-04-21 11:19:38', NULL),
(7, 'احمد ذکی خان هویدا', 'کابل. افغانستان', 'Famel', 22, 'به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد. معمولا طراحان گرافیک برای صفحه‌آرایی، نخست از متن‌های آزمایشی و بی‌معنی استفاده می‌کنند تا صرفا به مشتری یا صاحب کار خود نشان دهند که صفحه طراحی یا صفحه بندی شده بعد از اینکه متن در آن قرار گیرد چگونه به نظر می‌رسد و قلم‌ها و اندازه‌بندی‌ها چگونه در نظر گرفته شده‌است. از آنجایی که طراحان عموما نویسنده متن نیستند و وظیفه رعایت حق تکثیر متون را ندارند و در همان حال کار آنها به نوعی وابسته به متن می‌باشد آنها با استفاده از محتویات ساختگی، صفحه گرافیکی خود را صفحه‌آرایی می‌کنند تا مرحله طراحی و صفحه‌بندی را به پایان برند.', 'Farsi', 'supporteds-img/AFNA7dfPdgtxxlZBVmeJoUrVjP1Tb8p4zRw362dL.jpg', '2021-04-21 11:20:52', NULL),
(8, 'محمد عیسی کابلی', 'کابل. افغانستان', 'Other', 87, 'به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد. معمولا طراحان گرافیک برای صفحه‌آرایی، نخست از متن‌های آزمایشی و بی‌معنی استفاده می‌کنند تا صرفا به مشتری یا صاحب کار خود نشان دهند که صفحه طراحی یا صفحه بندی شده بعد از اینکه متن در آن قرار گیرد چگونه به نظر می‌رسد و قلم‌ها و اندازه‌بندی‌ها چگونه در نظر گرفته شده‌است. از آنجایی که طراحان عموما نویسنده متن نیستند و وظیفه رعایت حق تکثیر متون را ندارند و در همان حال کار آنها به نوعی وابسته به متن می‌باشد آنها با استفاده از محتویات ساختگی، صفحه گرافیکی خود را صفحه‌آرایی می‌کنند تا مرحله طراحی و صفحه‌بندی را به پایان برند.', 'Farsi', 'supporteds-img/V0Uxq40QPQde03qQvylVEsZBMlWfh5v3GFnKLovz.jpg', '2021-04-21 11:21:59', NULL),
(9, 'مصیب', 'کابل. افغانستان', 'Male', 22, 'زیاتوي چې په دغې نښته کې د دولتي ځواکونو شپږ تنه نور ګیر پاتې وو چې نن سهار د ملي پوځ د ځانګړو ځواله خوا وژغورل شول.د یوې سرچینې په وینا، دغه نښته نن د غرمې تر دولسو بجو دوام درلود رچینه زیاتوي چې په دغې نښته کې، طالبانو ته هم درنه مرګ ژوبله اوښتې ده، خو د شمېرې په هکله څه نه وابلخوا طالبانو د دغه برید مسوولیت منلی دی.همدارنګه د ۲۰۹ شاهین قول اردو په یوې خبرپاڼه کې د اوو طالب اورپک ل وژل کېدو او د ۸ له ټپي کېدو خبر ورکوي.ه دغې خپرپاڼه کې راغلي دي چې دغه طالب اورپکي د چهارشنبې په ورځ د دولتي ځواکونو د هوايي بریدونو په پایل  بلخ ولایت په زارې ولسوالۍ کې وژل شوي دي.', 'Pashto', 'supporteds-img/VnkeZlSW6jk5E5VEWMuCLfD4Eb9QnbVxdEwWpcjH.jpg', '2021-04-22 18:16:18', NULL),
(10, 'حسیب', 'کابل. افغانستان', 'Male', 33, 'زیاتوي چې په دغې نښته کې د دولتي ځواکونو شپږ تنه نور ګیر پاتې وو چې نن سهار د ملي پوځ د ځانګړو ځواله خوا وژغورل شول.د یوې سرچینې په وینا، دغه نښته نن د غرمې تر دولسو بجو دوام درلود رچینه زیاتوي چې په دغې نښته کې، طالبانو ته هم درنه مرګ ژوبله اوښتې ده، خو د شمېرې په هکله څه نه وابلخوا طالبانو د دغه برید مسوولیت منلی دی.همدارنګه د ۲۰۹ شاهین قول اردو په یوې خبرپاڼه کې د اوو طالب اورپک ل وژل کېدو او د ۸ له ټپي کېدو خبر ورکوي.ه دغې خپرپاڼه کې راغلي دي چې دغه طالب اورپکي د چهارشنبې په ورځ د دولتي ځواکونو د هوايي بریدونو په پایل  بلخ ولایت په زارې ولسوالۍ کې وژل شوي دي.', 'Pashto', 'supporteds-img/bU0q9UVqICL4EAq2Sl0o6CKhQdpvqo5XK4vJNw99.jpg', '2021-04-22 18:17:02', NULL),
(11, 'عیسی', 'کابل. افغانستان', 'Famel', 22, 'زیاتوي چې په دغې نښته کې د دولتي ځواکونو شپږ تنه نور ګیر پاتې وو چې نن سهار د ملي پوځ د ځانګړو ځواله خوا وژغورل شول.د یوې سرچینې په وینا، دغه نښته نن د غرمې تر دولسو بجو دوام درلود رچینه زیاتوي چې په دغې نښته کې، طالبانو ته هم درنه مرګ ژوبله اوښتې ده، خو د شمېرې په هکله څه نه وابلخوا طالبانو د دغه برید مسوولیت منلی دی.همدارنګه د ۲۰۹ شاهین قول اردو په یوې خبرپاڼه کې د اوو طالب اورپک ل وژل کېدو او د ۸ له ټپي کېدو خبر ورکوي.ه دغې خپرپاڼه کې راغلي دي چې دغه طالب اورپکي د چهارشنبې په ورځ د دولتي ځواکونو د هوايي بریدونو په پایل  بلخ ولایت په زارې ولسوالۍ کې وژل شوي دي.', 'Pashto', 'supporteds-img/7KrswhCNmjx511JJ7NVGqDfQX03VM0IwaDTB4yoX.jpg', '2021-04-22 18:23:28', NULL),
(13, 'Felicia Miranda', 'Ex nulla ipsum aut', 'Other', 99, 'Perspiciatis volupt', 'Pashto', 'supporteds-img/ffuDt7RQ5V7wNrYHMz9UaqYlkq3euAoSAHmZ09ty.jpg', '2021-09-22 00:32:09', NULL);

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `role`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Mustafa', 'mustafa@asaraglobal.com', NULL, '$2y$10$uakHYG8CykEbJhpznNiI9OSoe9JOP.ZHOaHtFkUX/F7W3uL.Hgfli', NULL, NULL, 'admin', 'NW0mLooR0n8tNWg7A5sGAnkoj2LxmWobJORHKz0inZ4T2Ec6mKFjaqmdKU25', NULL, NULL, '2021-04-20 23:39:55', '2021-04-20 23:39:55'),
(3, 'Mustafa', 'mustafasadat338@gmail.com', NULL, '$2y$10$ZX6dk8qXez9CugUDwQjHxup02hbMmlXqiFaJxL.wSNProKPrnJ9pe', NULL, NULL, 'admin', NULL, NULL, NULL, '2021-04-24 17:49:43', '2021-04-27 12:39:43'),
(6, 'Mustafa Khan', 'mustafadeveloeper2@gmail.com', NULL, '$2y$10$4gsDZRTbasV1E35j/z3.au8psJtYblzMixd5D29kFcw4UYhosYWY.', NULL, NULL, 'user', 'mpqTr57u5kMHTnpHDmE5zKsnIULGZUUFROOjWjgvBTLRDDUgznMbAvibJ91L', NULL, NULL, '2021-05-02 16:27:16', '2021-05-02 16:27:16'),
(7, 'Mustafa Khan', 'mustafadeveloepe@gmail.com', NULL, '$2y$10$DsEPUN89EUD8P930Jy7M1eEWGF0TBw2nmC8TAizdd66EN5pwyOC0.', NULL, NULL, 'admin', NULL, NULL, NULL, '2021-06-19 23:03:45', '2021-06-19 23:03:45'),
(8, 'hycuf', 'xiwasu@mailinator.com', NULL, '$2y$10$kEENxx/58GRj3BUgewpu4OHgZgu43KTEHOmNRPKpOJLzWW9/R1chK', NULL, NULL, 'admin', NULL, NULL, NULL, '2021-09-22 00:33:19', '2021-09-22 00:33:19');

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
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sponsor_datas`
--
ALTER TABLE `sponsor_datas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sponsor_datas_user_id_foreign` (`user_id`),
  ADD KEY `sponsor_datas_suported_id_foreign` (`suported_id`);

--
-- Indexes for table `supporteds`
--
ALTER TABLE `supporteds`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsor_datas`
--
ALTER TABLE `sponsor_datas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `supporteds`
--
ALTER TABLE `supporteds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sponsor_datas`
--
ALTER TABLE `sponsor_datas`
  ADD CONSTRAINT `sponsor_datas_suported_id_foreign` FOREIGN KEY (`suported_id`) REFERENCES `supporteds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sponsor_datas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
