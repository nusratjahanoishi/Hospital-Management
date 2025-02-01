-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2025 at 02:12 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_aust`
--

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'authToken', '314b0f1cf48732a3e297638dc8d10f1946033b50def442114b17d9a8b496db72', '[\"*\"]', NULL, NULL, '2025-02-01 03:56:03', '2025-02-01 03:56:03'),
(2, 'App\\Models\\User', 1, 'authToken', '1631de8cbc4912ca68f6e2241f1f4a6ae53e4837c9b7fd6cf810f7a082625d8f', '[\"*\"]', NULL, NULL, '2025-02-01 03:56:55', '2025-02-01 03:56:55'),
(3, 'App\\Models\\User', 2, 'authToken', '186f89cb5ee067dfcb03f34d2dee391e8587a09f589a14eac11cb6f72e780270', '[\"*\"]', NULL, NULL, '2025-02-01 03:57:24', '2025-02-01 03:57:24'),
(4, 'App\\Models\\User', 3, 'authToken', 'e020157ac5ff8fecfa37309133c35662454e356e21a62d04f11f37ca22289799', '[\"*\"]', NULL, NULL, '2025-02-01 03:57:51', '2025-02-01 03:57:51'),
(5, 'App\\Models\\User', 4, 'authToken', '5fe6c3feeb38ae2b5047e983a03b42b33d512fbc0a09f695524794c486f11e88', '[\"*\"]', NULL, NULL, '2025-02-01 04:12:18', '2025-02-01 04:12:18'),
(6, 'App\\Models\\User', 4, 'authToken', 'c54373c990eac78ce911a9aaf04e5c6099d7fb59feb82c071eb53ca70a971632', '[\"*\"]', NULL, NULL, '2025-02-01 04:12:40', '2025-02-01 04:12:40'),
(7, 'App\\Models\\User', 5, 'authToken', '53ee99d1c31c2766373ef0158f1634186739c532e5a8aca4005a1128e8253832', '[\"*\"]', NULL, NULL, '2025-02-01 06:53:04', '2025-02-01 06:53:04'),
(8, 'App\\Models\\User', 5, 'authToken', 'ce7bf455b77858e151ed8c62ef6412ef54bd85b4f34ace874d25b4a4c40681c5', '[\"*\"]', NULL, NULL, '2025-02-01 06:53:59', '2025-02-01 06:53:59'),
(9, 'App\\Models\\User', 5, 'authToken', '0422c290f176c779f2f8053f1f4bf0e00d3ad608071c11819dec645a990c4506', '[\"*\"]', NULL, NULL, '2025-02-01 06:54:42', '2025-02-01 06:54:42'),
(10, 'App\\Models\\User', 5, 'authToken', '1f2a15ab600dd1ff128eeba18445dcf801fd6ec9e09180dff4da33323847eeb7', '[\"*\"]', NULL, NULL, '2025-02-01 06:55:45', '2025-02-01 06:55:45'),
(11, 'App\\Models\\User', 5, 'authToken', '5235b345a26bd2eee9cd31900241a5eac06d2f9cc97ff499253bafced23a977d', '[\"*\"]', NULL, NULL, '2025-02-01 06:56:43', '2025-02-01 06:56:43'),
(12, 'App\\Models\\User', 5, 'authToken', '0845aef950ebc4d4122067c42b204b5da1c5812546db6aa6738c0fa583a3826e', '[\"*\"]', NULL, NULL, '2025-02-01 06:57:24', '2025-02-01 06:57:24'),
(13, 'App\\Models\\User', 5, 'authToken', 'fd096cfbdb4af52d8fcc1022863f1e3776003c13cca9e84798042ac17c24835e', '[\"*\"]', NULL, NULL, '2025-02-01 06:58:03', '2025-02-01 06:58:03');

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
  `role` enum('admin','doctor','patient') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'patient',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Philip Erickson', 'hohe@mailinator.com', NULL, '$2y$12$cdmC/GdVopsQC96wR6wStOwx/wxx5IhFV43DWv04KW.jnAxtantzC', 'doctor', NULL, '2025-02-01 03:55:56', '2025-02-01 03:55:56'),
(2, 'Cheyenne Cervantes', 'donataqapu@mailinator.com', NULL, '$2y$12$oNpE555HwzVBFUNf4syVYuJdkUn/pT2qaSvRxeVoFPSK74Ijb0PdC', 'admin', NULL, '2025-02-01 03:57:18', '2025-02-01 03:57:18'),
(3, 'Nelle Caldwell', 'tyhabun@mailinator.com', NULL, '$2y$12$wIzHtsxii5HTaJWAHeBaluyCbq8obKEL.wL9nuvAxajV6EDlp4MfG', 'patient', NULL, '2025-02-01 03:57:42', '2025-02-01 03:57:42'),
(4, 'Igor Bonner', 'galacaji@mailinator.com', NULL, '$2y$12$YCl9fQ81gCVPS7EVM7mKQ.m05zorGED3bzxI1tWn6b2nDYeLKVXb2', 'admin', NULL, '2025-02-01 04:12:11', '2025-02-01 04:12:11'),
(5, 'Jade Leonard', 'pijej@mailinator.com', NULL, '$2y$12$7l9icCJpnesPO9xk56Ql6uT/Bb8BeWJW..aLDWAaENBKCphuJnOlu', 'admin', NULL, '2025-02-01 06:52:55', '2025-02-01 06:52:55'),
(6, 'Lilah Sexton', 'bymasisot@mailinator.com', NULL, '$2y$12$dqldxpBOW7dB2OpLmYTUiuau/XlaHyvt76PwXxRyGBNspR/tzf95e', 'doctor', NULL, '2025-02-01 07:11:50', '2025-02-01 07:11:50'),
(7, 'Tad Strickland', 'lymeliwyf@mailinator.com', NULL, '$2y$12$raCKEkazWZquQMYGXmmJhu4yeThv.1tp8HK8QLcTphrIjhYZgkorK', 'patient', NULL, '2025-02-01 07:13:07', '2025-02-01 07:13:07');

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
