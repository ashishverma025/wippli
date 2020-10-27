-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2020 at 06:01 PM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wippli`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`, `email_verified_at`) VALUES
(1, 'Admin', 'admin', 'admin@mail.com', '$2y$10$uNOtqtGucaZS1xW1sHHLlOD/oElz1V2zg4t41n/DM9JB8Xm1J37Nu', NULL, 'bbCRZSSDLdIoWInHdh1LtLl8vvm84AhjT0Iwu72M5eXB86vmTggOD3PIrjE4', '2019-06-20 13:00:00', '2019-06-20 22:54:10', '2019-06-17 02:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `business_details`
--

CREATE TABLE `business_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `business_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `business_legal_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `business_branch` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `industry` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `business_sort_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `business_initials` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `business_number` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `business_number_type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_number` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_number_type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_code` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `business_type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `afiliation` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anythingelse` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logocolours` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coloricon` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iconnegative` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primarydarkcolour1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primarydarkcolour2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primarylightcolour1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primarylightcolour2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `businessdrive` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `businessdropbox` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `business_details`
--

INSERT INTO `business_details` (`id`, `user_id`, `business_name`, `business_legal_name`, `business_branch`, `industry`, `business_sort_name`, `business_initials`, `business_number`, `business_number_type`, `tax_number`, `tax_number_type`, `country`, `state`, `address1`, `address2`, `city`, `post_code`, `email`, `contact`, `business_type`, `afiliation`, `linkedin`, `twitter`, `instagram`, `facebook`, `youtube`, `anythingelse`, `logocolours`, `coloricon`, `iconnegative`, `primarydarkcolour1`, `primarydarkcolour2`, `primarylightcolour1`, `primarylightcolour2`, `businessdrive`, `businessdropbox`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'Brannium', 'ga974tAO5L', 'QlQnqxZfyf', 'QDLei97SsS', 'dhXc0Oxec4', '89nWHZTh3s', '5107884234', '8208389251', '0891933293', '4628553838', 'RyAnYgpdCj', 'tKPPVPpDxF', 'USrlEXCNFG', 'IEaU24WaM1', 'ipSo7Ys75i', 'OaxIVvlpRi', 'brannium1@yopmail.com', '5426772327', NULL, NULL, 'CG4UxjN8Vz', 'Qe6N4liMyO', '9ndqlqBfkD', '4EOQvi2zSF', 'rotSKI4RLk', 'ygvfGiSKRN', 'Rv5jZGbGCH', '1ufm48MeKg', 'QaD5qUBYfG', 'rQKVIDpFOi', NULL, 's94STQRUiG', 'nJK2EkcIk2', 'iTI05TI4iL', 'aQu7hvAwwe', 'active', '2020-10-21 16:56:47', '2020-10-26 14:18:58'),
(2, 10, 'New Brannium', 'ga974tAO5L', 'QlQnqxZfyf', 'QDLei97SsS', 'dhXc0Oxec4', '89nWHZTh3s', '5107884234', '8208389251', '0891933293', '4628553838', 'RyAnYgpdCj', 'tKPPVPpDxF', 'USrlEXCNFG', 'IEaU24WaM1', 'ipSo7Ys75i', 'OaxIVvlpRi', 'brannium2@yopmail.com', '5426772327', NULL, NULL, 'CG4UxjN8Vz', 'Qe6N4liMyO', '9ndqlqBfkD', '4EOQvi2zSF', 'rotSKI4RLk', 'ygvfGiSKRN', 'Rv5jZGbGCH', '1ufm48MeKg', 'QaD5qUBYfG', 'rQKVIDpFOi', NULL, 's94STQRUiG', 'nJK2EkcIk2', 'iTI05TI4iL', 'aQu7hvAwwe', 'active', '2020-10-21 16:56:47', '2020-10-26 14:19:02'),
(3, 340, 'Agencies 1', 'ga974tAO5L', 'QlQnqxZfyf', 'QDLei97SsS', 'dhXc0Oxec4', '89nWHZTh3s', '5107884234', '8208389251', '0891933293', '4628553838', 'RyAnYgpdCj', 'tKPPVPpDxF', 'USrlEXCNFG', 'IEaU24WaM1', 'ipSo7Ys75i', 'OaxIVvlpRi', 'agencies1@yopmail.com', '5426772327', NULL, NULL, 'CG4UxjN8Vz', 'Qe6N4liMyO', '9ndqlqBfkD', '4EOQvi2zSF', 'rotSKI4RLk', 'ygvfGiSKRN', 'Rv5jZGbGCH', '1ufm48MeKg', 'QaD5qUBYfG', 'rQKVIDpFOi', NULL, 's94STQRUiG', 'nJK2EkcIk2', 'iTI05TI4iL', 'aQu7hvAwwe', 'active', '2020-10-21 16:56:47', '2020-10-26 17:00:16'),
(4, 340, 'Agencies 2', 'ga974tAO5L', 'QlQnqxZfyf', 'QDLei97SsS', 'dhXc0Oxec4', '89nWHZTh3s', '5107884234', '8208389251', '0891933293', '4628553838', 'RyAnYgpdCj', 'tKPPVPpDxF', 'USrlEXCNFG', 'IEaU24WaM1', 'ipSo7Ys75i', 'OaxIVvlpRi', 'agencies2@yopmail.com', '5426772327', NULL, NULL, 'CG4UxjN8Vz', 'Qe6N4liMyO', '9ndqlqBfkD', '4EOQvi2zSF', 'rotSKI4RLk', 'ygvfGiSKRN', 'Rv5jZGbGCH', '1ufm48MeKg', 'QaD5qUBYfG', 'rQKVIDpFOi', NULL, 's94STQRUiG', 'nJK2EkcIk2', 'iTI05TI4iL', 'aQu7hvAwwe', 'active', '2020-10-21 16:56:47', '2020-10-26 17:00:21'),
(7, 341, 'My First wippli', 'wippli', 'zg2qA3LFoV', 'Mk29N40aRV', 'MTSg8W79OS', 'AZkYxAXHdQ', '6665199563', '6973687606', '7572923144', '2607423488', 'nKzQsA8k2i', '4XtOypPcnD', 'VYUJQ0NDVa', '4DRETXZ7ry', 'KRtkm777s6', 'bgAPfP7j1z', 'akverma@yopmail.com', '5460790347', NULL, NULL, 'HbGB9jZVEJ', 'vzAOF57lG3', 'huyX9wrkW1', 'ua4fGqPKZF', '2qNcrJdVYM', 'J3k4NXxSvh', 't4rmQu2oby', 'Mx8b2q4jJr', '3fPT3xveJ2', 'OCmcZqd9nH', 'wb7T5vdd3R', 'CCuMT4C3Fj', 'QMMP1Xsg7A', 'eY1kSXoXfi', 'tdIM6AKqEo', 'active', '2020-10-26 13:43:20', '2020-10-26 13:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Digital', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(2, 'Print', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(3, 'Video', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(4, 'Projects', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(5, 'Others', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `organisation` int(11) DEFAULT NULL,
  `branch` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `known_as` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `initials` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tbc1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `positions` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tbc` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_notification` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_code` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `afiliation` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anythingelse` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `colourslogo_file` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coloricon_file` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `negativelogo_file` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `negativeicon_file` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gdrive_dir` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dropbox_dir` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `parent_id`, `user_id`, `organisation`, `branch`, `first_name`, `surname`, `email`, `known_as`, `initials`, `tbc1`, `positions`, `department`, `phone`, `mobile`, `tbc`, `email_notification`, `state`, `address1`, `address2`, `city`, `post_code`, `country`, `type`, `role`, `afiliation`, `linkedin`, `twitter`, `instagram`, `facebook`, `youtube`, `anythingelse`, `colourslogo_file`, `coloricon_file`, `negativelogo_file`, `negativeicon_file`, `gdrive_dir`, `dropbox_dir`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 338, 1, 'cE43qpy6mC', 'CHuIZ8VkN7', 'w3DrVfVVbT', 'testve123@yopmail.com', 'muGFqSMkCZ', 'goGxvhvvGR', NULL, 'mPXCfp3V9q', 'AplN2mchLM', '1521051971', '118512', 'krGzgbZe5J', 'MGTxM9zaYy', 'DPfMHk12QF', '32i7HaOjxf', 'kl88XC8Xty', 'bZe9uuAIbS', NULL, 'AArUE4bab5', NULL, 'Ti5GYABHN9', NULL, 'ngYzabnJ6J', 'YOl7Mu3FVH', 'wPDrfym15t', 'OJWc2Aiosf', 'pAneII1TFX', NULL, NULL, 'lZWpPczjNL', 'ipuGA6wqAM', 'OWWM4KVsho', 'KDD0JvdFwa', 'dlYC9FHkMc', 'active', '2020-10-24 14:22:01', '2020-10-26 14:51:04'),
(2, NULL, 338, 1, 'iJRrVVB9wD', 'kJGoFY6pZa', 'O6DkjniPFf', 'testve123@yopmail.com', 'iP2gevYQJ9', 'XTCXBIq2mO', NULL, 'isoJISJi9z', 'GqwfqNrWEw', '5558964043', '328963', 'wyz38VAGfk', 'SzGW6WLE5Q', 'zKnwiDsOtL', 'MShc21i8MN', 'Xkin0gYmVn', 'omWCGNlFDy', NULL, 'zLpSmP4ds9', NULL, '1RtiWV5Sa0', NULL, 'wtn595Ra0u', '0kuiU7VTR7', 'LmZCKXrdMy', 'KeYjNrfPGB', 'tQSXVBcCmU', NULL, NULL, '5mMA1zE6OS', 'j3rf2nP1hv', '0TDEuC4nOa', 'qe9VtJmrqf', 'hlFG6dCvxK', 'active', '2020-10-24 14:25:54', '2020-10-26 14:51:07'),
(4, NULL, 10, 2, 'qR4CcauAxB', 'RIun1yyqlY', '5ADNCUW4tb', 'testve123@yopmail.com', 'ZzdfuCxj7V', 'AQaM2J40gi', NULL, 'BEIbhnTDXW', 'gkSf7wmLj0', '2787573811', '157306', 'b0GS6mupiX', 'rlCiuZhDvk', '2JJ62Fxmo8', 'IOeqQQGrSJ', 'ZeUz4Ymcl1', 'cioXlaps6e', NULL, 'idV2W4vMTb', NULL, '5BBEEFHYkL', NULL, '158OgaClEX', 'a2uqsMpq8U', '1BzJg0Ttk5', 'yaDqEMZFR3', 'dPyi3f1UqD', NULL, NULL, 'B1LFfnRsOK', 'Qpp1zsVciJ', 'Z7oZllVkil', 'pFTryFyNyG', 'NwW1hkSuzK', 'active', '2020-10-26 09:32:31', '2020-10-26 09:32:31'),
(5, 10, NULL, NULL, 'aDcM7FuwNi', 'ashish', 'verma', 'akverma@yopmail.com', 'NtVm8hSxbU', 'KmjveefW2U', NULL, 'ASyIeQQHa2', 'nxdXOzjGlR', '7042929284', '1235698756', 'GTheyJjYIK', 'Twhi2EaR1p', '2ZDq47QWNw', 'rIZozxuqFQ', '3jrFRRf4NE', 'qw4bNGwsLe', NULL, 'bIgOROwqe3', NULL, 'BKs6vVO9FI', NULL, '3SVl2QLwzo', 'ncY7K41no8', 'jZTgUUOOiL', 'VagFCylgqk', '3iHZO5MV0i', NULL, NULL, 'qWdIeyYvph', 'AMWNKMAY7G', 'yhsUHqMm4G', 'nUZ6RTu8JS', '6p2XSqu42r', 'active', '2020-10-26 11:22:27', '2020-10-26 11:22:27'),
(6, 340, NULL, 3, 'jdpfEhiJa1', 'ashish', 'verma', 'akverma@yopmail.com', 'SyjibcgflR', 'wnKmeD7rN3', NULL, 'EC9x0QPSfl', 'xWVnyKDsKp', '7042929284', '1235698756', 'IQWimjR4Tb', 'SdxW3bcqZ5', 'eTgFTkugXp', 'Aa3Sl1H38X', '3BVu1PUkVB', 'TfumJ4oThb', NULL, '6CeJqMello', NULL, 'fUsDB8Du1a', NULL, 'ebiSVhuizD', '1Pksj841Md', '3fCoeiOJdQ', 'Seb7vz6Yq6', 'ATH0lbwfyl', NULL, NULL, 'EF6JgGiOmC', 'KsZQLrUFKC', 'TTHcinujUJ', 'qK7C83Zy88', 'BTczVT75p3', 'active', '2020-10-26 11:31:41', '2020-10-26 19:27:51'),
(7, 340, 341, 4, 'jdpfEhiJa1', 'ashish', 'verma', 'akverma@yopmail.com', 'SyjibcgflR', 'wnKmeD7rN3', NULL, 'EC9x0QPSfl', 'xWVnyKDsKp', '7042929284', '1235698756', 'IQWimjR4Tb', 'SdxW3bcqZ5', 'eTgFTkugXp', 'Aa3Sl1H38X', '3BVu1PUkVB', 'TfumJ4oThb', NULL, '6CeJqMello', NULL, 'fUsDB8Du1a', NULL, 'ebiSVhuizD', '1Pksj841Md', '3fCoeiOJdQ', 'Seb7vz6Yq6', 'ATH0lbwfyl', NULL, NULL, 'EF6JgGiOmC', 'KsZQLrUFKC', 'TTHcinujUJ', 'qK7C83Zy88', 'BTczVT75p3', 'active', '2020-10-26 11:33:06', '2020-10-26 19:27:56'),
(8, 340, 342, 4, '8cLpA3Ftgl', 'ashish', 'verma', 'akverma@yopmail.com', 'zZs4zMq3hV', 'M2VOyBeZN3', NULL, 'SgX6IVAFOd', 'g8hzDv4vG0', '7042929284', '1235698756', 'zIGdzWYN7z', 'Nc3CJCyae8', '2NIvIIHHZi', 'hyVc34nroi', 'nSc3cxK6HU', 'BIGCqV5QTE', NULL, 'HMgqV3kHmq', NULL, '9633xJfFN6', NULL, 'TTcXvRQcLn', 'W1Dyph8mWW', 'ls2PureO6e', '2oekEGLrDn', '9ocj8Qgvr1', NULL, NULL, 'pqirM93FhB', 'rxFMsqxj6e', 'MM7tcCIxDd', 'dD6P0rCqHz', 'TwyXG5AeAM', 'active', '2020-10-26 13:56:49', '2020-10-26 13:56:50');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(8, '2019_06_05_094651_add_email_verified_at_column_to_admins_table', 2),
(10, '2014_10_12_000000_create_users_table', 3),
(11, '2014_10_12_100000_create_password_resets_table', 3),
(12, '2019_06_17_074017_create_admins_table', 3),
(13, '2019_06_19_103506_create_categories_table', 3),
(14, '2019_06_20_092941_create_books_table', 3),
(15, '2019_06_20_123650_create_authors_table', 3),
(16, '2019_06_20_123802_create_book_images_table', 3),
(17, '2019_08_19_000000_create_failed_jobs_table', 4),
(18, '2019_12_23_121759_create_sessions_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `new_wipplis`
--

CREATE TABLE `new_wipplis` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `project_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deadline` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instruction` text COLLATE utf8_unicode_ci,
  `file` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `digital` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `print` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objective` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dimensions` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `width` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `height` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `units` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `portrait` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'no',
  `landscape` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'no',
  `comment` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_audience` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tone_of_voice` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attachment` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT 'active',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `new_wipplis`
--

INSERT INTO `new_wipplis` (`id`, `user_id`, `project_name`, `deadline`, `type`, `category`, `instruction`, `file`, `digital`, `print`, `video`, `other`, `objective`, `message`, `dimensions`, `width`, `height`, `units`, `portrait`, `landscape`, `comment`, `target_audience`, `tone_of_voice`, `attachment`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(14, 338, '8NQL6hL07Q', '3', 'WiFeCPIIrQ', NULL, 'eLGinQ6ShD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '202010040055278.jpg', 'active', NULL, '2020-10-04 16:45:00', '2020-10-04 16:45:00'),
(15, 338, 'Test Project', '4', '46', NULL, 'test instructions', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2020-10-13 12:10:27', '2020-10-13 17:53:37'),
(16, 338, 'Ashish Project', '4', 'Video production', '3', 'instruction', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2020-10-13 13:15:29', '2020-10-13 18:46:17'),
(17, 338, 'Test Project', '4', 'Video production', '3', 'instruction', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2020-10-13 13:15:29', '2020-10-13 18:46:25'),
(18, 338, 'Ashika Aditi', '4', 'Digital Ad', '1', 'ascasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2020-10-13 13:19:12', '2020-10-13 13:19:12'),
(19, 338, 'Ashika Aditi', '4', 'Digital Ad', '1', 'ascasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2020-10-13 13:19:12', '2020-10-13 13:19:12'),
(20, 341, 'ashish project', '2', 'Newsletter', '1', 'sfratwrf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2020-10-26 13:44:14', '2020-10-26 13:44:14'),
(21, 341, 'ashish project2', '3', 'Video animation', '3', 'fefsrgsz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2020-10-26 13:45:13', '2020-10-26 13:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `role`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, '1', '2020-09-28 00:16:00', '2020-09-28 11:21:28', '2020-09-28 11:21:28'),
(2, 'Manager', NULL, '1', '2020-09-28 19:00:00', '2020-09-28 11:22:00', '2020-09-28 11:22:00'),
(3, 'Sales Man', NULL, '1', '2020-09-28 00:00:17', '2020-09-28 11:22:33', '2020-09-28 11:22:33'),
(4, 'Employee', NULL, '1', '2020-09-28 00:13:00', '2020-09-28 11:22:52', '2020-09-28 11:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `cat_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Animation', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(2, 1, 'Blog Post', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(3, 1, 'Brochure', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(4, 1, 'Corporate communication', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(5, 1, 'Digital Ad', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(6, 1, 'Digital Banner', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(7, 1, 'Digital Campaign', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(8, 1, 'EDM', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(9, 1, 'Client Comms', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(10, 1, 'Mailer', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(11, 1, 'Newsletter', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(12, 1, 'PDF file', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(13, 1, 'Development', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(14, 1, 'Back end', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(15, 1, 'Front end', 'active', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(31, 2, 'Blog Post', 'active', '2020-10-10 21:49:25', '2020-10-10 21:49:25'),
(32, 2, 'Banner (Large format)', 'active', '2020-10-10 21:49:25', '2020-10-10 21:49:25'),
(33, 2, 'Brochure', 'active', '2020-10-10 21:49:25', '2020-10-10 21:49:25'),
(34, 2, 'Corporate communication', 'active', '2020-10-10 21:49:25', '2020-10-10 21:49:25'),
(35, 2, 'Client Comms', 'active', '2020-10-10 21:49:25', '2020-10-10 21:49:25'),
(36, 2, 'Newsletter', 'active', '2020-10-10 21:49:25', '2020-10-10 21:49:25'),
(37, 2, 'Poster', 'active', '2020-10-10 21:49:25', '2020-10-10 21:49:25'),
(38, 2, 'Business card', 'active', '2020-10-10 21:49:25', '2020-10-10 21:49:25'),
(39, 2, 'Magazine', 'active', '2020-10-10 21:49:25', '2020-10-10 21:49:25'),
(40, 2, 'Book', 'active', '2020-10-10 21:49:25', '2020-10-10 21:49:25'),
(41, 2, 'Guide', 'active', '2020-10-10 21:49:25', '2020-10-10 21:49:25'),
(42, 2, 'Flyer', 'active', '2020-10-10 21:49:25', '2020-10-10 21:49:25'),
(43, 2, 'Leaflet', 'active', '2020-10-10 21:49:25', '2020-10-10 21:49:25'),
(44, 2, 'Booklet', 'active', '2020-10-10 21:49:25', '2020-10-10 21:49:25'),
(46, 3, 'Video production', 'active', '2020-10-10 21:52:44', '2020-10-10 21:52:44'),
(47, 3, 'Video Edition', 'active', '2020-10-10 21:52:44', '2020-10-10 21:52:44'),
(48, 3, 'Video animation', 'active', '2020-10-10 21:52:44', '2020-10-10 21:52:44'),
(49, 3, 'Video', 'active', '2020-10-10 21:52:44', '2020-10-10 21:52:44'),
(50, 3, 'Close captions', 'active', '2020-10-10 21:52:44', '2020-10-10 21:52:44'),
(51, 3, 'Voice over', 'active', '2020-10-10 21:53:15', '2020-10-10 21:53:15'),
(52, 3, 'Video retouching', 'active', '2020-10-10 21:53:15', '2020-10-10 21:53:15'),
(53, 4, 'Brand adaptation', 'active', '2020-10-10 21:54:24', '2020-10-10 21:54:24'),
(54, 4, 'Digital Campaign', 'active', '2020-10-10 21:54:24', '2020-10-10 21:54:24'),
(55, 4, 'Events & Exhibitions', 'active', '2020-10-10 21:54:46', '2020-10-10 21:54:46'),
(56, 5, 'Ad-hoc', 'active', '2020-10-10 21:57:53', '2020-10-10 21:57:53'),
(57, 5, 'Infographic', 'active', '2020-10-10 21:57:53', '2020-10-10 21:57:53'),
(58, 5, 'Logo', 'active', '2020-10-10 21:57:53', '2020-10-10 21:57:53'),
(59, 5, 'Miscellaneous', 'active', '2020-10-10 21:57:53', '2020-10-10 21:57:53'),
(60, 5, 'Outdoors', 'active', '2020-10-10 21:57:53', '2020-10-10 21:57:53'),
(61, 5, 'Presentation', 'active', '2020-10-10 21:57:53', '2020-10-10 21:57:53'),
(62, 5, 'Photo Edition', 'active', '2020-10-10 21:57:53', '2020-10-10 21:57:53'),
(63, 5, 'Photo retouching', 'active', '2020-10-10 21:57:53', '2020-10-10 21:57:53'),
(64, 5, 'Photo adaptation', 'active', '2020-10-10 21:57:53', '2020-10-10 21:57:53'),
(65, 5, 'Photo Resizing', 'active', '2020-10-10 21:57:53', '2020-10-10 21:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_type` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '4' COMMENT '1=>Admin,2=>Manager,3=>Sales,4=>Superuser,5=>ContactUser',
  `contact_id` int(11) DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternatephone` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` text COLLATE utf8mb4_unicode_ci,
  `info` text COLLATE utf8mb4_unicode_ci,
  `avatar` text COLLATE utf8mb4_unicode_ci,
  `cover_image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verifyOtp` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_login_token` text COLLATE utf8mb4_unicode_ci,
  `social_login_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_login_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `contact_id`, `name`, `fname`, `lname`, `username`, `email`, `phone`, `alternatephone`, `dob`, `gender`, `address`, `state`, `city`, `country`, `zip`, `info`, `avatar`, `cover_image`, `password`, `email_verified_at`, `verifyOtp`, `token`, `social_login_token`, `social_login_id`, `social_login_type`, `remember_token`, `ip_address`, `created_at`, `updated_at`) VALUES
(335, '2', 0, 'ashika verma', 'ashika', 'verma', NULL, 'ashika@mail.com', NULL, NULL, '1989-1-1', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$UmH2WD0mYV2pWq7mC/Ke8.TuGTUpwX74J520bOMWcd13RqVDXJIqW', '2020-09-30 12:23:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-25 08:38:15', '2020-09-30 12:23:22'),
(337, '4', 0, 'aditi verma', 'aditi', 'verma', NULL, 'aditi@mail.com', '7042929284', NULL, '1989-1-1', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$8q7xUwpZOAS0f4LMnK1rD.cAmrIacncEQB1VB8B16uj3dipl6S1oe', '2020-09-30 11:50:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-27 06:16:08', '2020-09-30 11:50:50'),
(338, '4', 0, 'qwert qwert', 'qwert', 'qwert', NULL, 'qwert@yopmail.com', '6343477556', NULL, '1989-1-1', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$ox7LUxzeZGuke9HuCy7mE.HVdsx0KaJM94cqs6LR45r/dulW/zIU2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-28 00:04:51', '2020-09-30 11:48:39'),
(339, '4', 0, 'tester tesr', 'tester', 'tesr', NULL, 'test@yopmail.com', '6343477556', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$1x5xaS5erMOcdQMOlt84wOfEwVdcidIZ0K/XocnkxiTfe64JcQ9Hu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-28 00:07:37', '2020-09-28 00:07:37'),
(340, '4', 0, 'test267 etst', 'test267', 'etst', NULL, 'test267@yopmail.com', '7042929284', NULL, '1989-1-1', 'Male', 'New ashok nagar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$dNQsheinQCcU.3IcuGVIIuRk6ABkrQoBqIP2EPIcnyCTU1l9wDC9u', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-29 13:27:39', '2020-09-30 11:48:19'),
(341, '5', 7, 'ashish verma', 'ashish', 'verma', NULL, 'akverma@yopmail.com', '7042929284', NULL, NULL, NULL, 'Aa3Sl1H38X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$ajtrqqVRd5HZz8LG5kw5/.7q68hEPhW1W1qIqnOosNQcA31.qijH.', '2020-10-26 06:03:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-26 06:03:06', '2020-10-26 06:03:06'),
(342, '5', 8, 'ashish verma', 'ashish', 'verma', NULL, 'akverma1@yopmail.com', '7042929284', NULL, NULL, NULL, 'hyVc34nroi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$mAIU/MUuzjm2y.QaEmPvmuI.sHo7Y/TNsDMpmdfXSUludpKmvHGsK', '2020-10-26 08:26:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-26 08:26:50', '2020-10-26 08:26:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_details`
--
ALTER TABLE `business_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_wipplis`
--
ALTER TABLE `new_wipplis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `business_details`
--
ALTER TABLE `business_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `new_wipplis`
--
ALTER TABLE `new_wipplis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
