-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 11:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoicegenerate`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_fees`
--

CREATE TABLE `client_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullfillment_fees` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`fullfillment_fees`)),
  `client_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_fees`
--

INSERT INTO `client_fees` (`id`, `fullfillment_fees`, `client_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, '{\r\n                     \"WAREHOUSESERVICES\": {\r\n                         \"UnloadingLoadingContainers\": {\r\n                             \"Palletized\": {\r\n                                 \"LTL\": \"12.90\",\r\n                                 \"twentyftContainer\": \"290.00\",\r\n                                 \"fourtyftContainer\": \"390.00\",\r\n                                 \"fityThreeftContainer\": \"500.00\"\r\n                             },\r\n                             \"Unpalletized\": {\r\n                                 \"ManualUnloading\": \"44.00\"\r\n                             }\r\n                         },\r\n                         \"ReceivingAllocating\": {\r\n                             \"ReceivingASNFee\": \"11.00\",\r\n                             \"PalletReceivingAllocating\": \"11.00\",\r\n                             \"ManualReceivingAllocating\": \"44.00\"\r\n                         },\r\n                         \"Supplies\": {\r\n                             \"PalletizedShrinkWrapping\": \"6.50\",\r\n                             \"ActualCostofMaterial\": \"15\"\r\n                         },\r\n                         \"ProductStorage\": {\r\n                             \"StandardPalletStorage\": \"34.50\",\r\n                             \"LargePallet\": \"41.50\",\r\n                             \"XLargePallet\": \"45.50\",\r\n                             \"FloorLoadedSpace\": \"5.10\",\r\n                             \"SmallBins\": \"3.00\",\r\n                             \"MediumBins\": \"5.00\",\r\n                             \"LargeBins\": \"7.00\",\r\n                             \"TemperatureControlPalletStorage\": \"49.00\"\r\n                         },\r\n                         \"AdditionalServices\": {\r\n                             \"PhotoGraphs\": \"7.00\",\r\n                             \"RecycleDisposal\": \"0.75\",\r\n                             \"CycleCountInventoryCount\": \"44.00\",\r\n                             \"CustomAPIIntegration\": \"499\",\r\n                             \"CustomEDIIntegration\": \"49.00\"\r\n                         }\r\n                     },\r\n                     \"FULFILLMENTFEES\": {\r\n                         \"B2COrderFulfillment\": {\r\n                             \"OrderFulFillment\": \"1.70\",\r\n                             \"OrderFulFillment1000OrdersMonth\": \"1.90\",\r\n                             \"OrderFulFillment500OrdersMonth\": \"2.40\",\r\n                             \"OrderFulFillment0OrdersMonth\": \"2.85\",\r\n                             \"AdditionalItemPick\": \"0.30\",\r\n                             \"AdditionalItemPick1000\": \"0.35\",\r\n                             \"AdditionalItemPick500\": \"0.45\",\r\n                             \"AdditionalItemPick0\": \"0.70\",\r\n                             \"Labelling\": \"0.51\",\r\n                             \"Inserts\": \"0.22\"\r\n                         },\r\n                         \"B2BOrderFulfillment\": {\r\n                             \"CaseMasterCartonPicking\": \"2.85\"\r\n                         },\r\n                         \"EcomReturnManagement\": {\r\n                             \"ShipmentInclQAreporting\": \"5.00\",\r\n                             \"ReturnPerItem\": \"1.85\",\r\n                             \"ReturnPerOrder\": \"4.00\"\r\n                         },\r\n                         \"RepackingSpecialProjectPreparation\": {\r\n                             \"RepackingKitting\": \"44.00\",\r\n                             \"UrgentRushProjectPrep\": \"56.00\"\r\n                         }\r\n                     },\r\n                     \"GENERALFEES\": {\r\n                         \"MonthlyAccountManagement\": \"99.00\",\r\n                         \"WMSSoftwareIntegration\": \"0.00\",\r\n                         \"WMSSoftwareSubscription\": \"99.00\",\r\n                         \"OnlineLiveInventoryReports\": \"0.00\",\r\n                         \"ShippingPercentage\": \"25.00\"\r\n                     }\r\n                 }', 2, NULL, '2023-12-19 03:27:03', NULL),
(7, '{\n                     \"WAREHOUSESERVICES\": {\n                         \"UnloadingLoadingContainers\": {\n                             \"Palletized\": {\n                                 \"LTL\": \"12.90\",\n                                 \"twentyftContainer\": \"290.00\",\n                                 \"fourtyftContainer\": \"390.00\",\n                                 \"fityThreeftContainer\": \"500.00\"\n                             },\n                             \"Unpalletized\": {\n                                 \"ManualUnloading\": \"44.00\"\n                             }\n                         },\n                         \"ReceivingAllocating\": {\n                             \"ReceivingASNFee\": \"11.00\",\n                             \"PalletReceivingAllocating\": \"11.00\",\n                             \"ManualReceivingAllocating\": \"44.00\"\n                         },\n                         \"Supplies\": {\n                             \"PalletizedShrinkWrapping\": \"6.50\",\n                             \"ActualCostofMaterial\": \"15\"\n                         },\n                         \"ProductStorage\": {\n                             \"StandardPalletStorage\": \"34.50\",\n                             \"LargePallet\": \"41.50\",\n                             \"XLargePallet\": \"45.50\",\n                             \"FloorLoadedSpace\": \"5.10\",\n                             \"SmallBins\": \"3.00\",\n                             \"MediumBins\": \"5.00\",\n                             \"LargeBins\": \"7.00\",\n                             \"TemperatureControlPalletStorage\": \"49.00\"\n                         },\n                         \"AdditionalServices\": {\n                             \"PhotoGraphs\": \"7.00\",\n                             \"RecycleDisposal\": \"0.75\",\n                             \"CycleCountInventoryCount\": \"44.00\",\n                             \"CustomAPIIntegration\": \"499\",\n                             \"CustomEDIIntegration\": \"49.00\"\n                         }\n                     },\n                     \"FULFILLMENTFEES\": {\n                         \"B2COrderFulfillment\": {\n                             \"OrderFulFillment\": \"1.70\",\n                             \"OrderFulFillment1000OrdersMonth\": \"1.90\",\n                             \"OrderFulFillment500OrdersMonth\": \"2.40\",\n                             \"OrderFulFillment0OrdersMonth\": \"2.85\",\n                             \"AdditionalItemPick\": \"0.30\",\n                             \"AdditionalItemPick1000\": \"0.35\",\n                             \"AdditionalItemPick500\": \"0.45\",\n                             \"AdditionalItemPick0\": \"0.70\",\n                             \"Labelling\": \"0.51\",\n                             \"Inserts\": \"0.25\"\n                         },\n                         \"B2BOrderFulfillment\": {\n                             \"CaseMasterCartonPicking\": \"2.85\"\n                         },\n                         \"EcomReturnManagement\": {\n                             \"ShipmentInclQAreporting\": \"5.00\",\n                             \"ReturnPerItem\": \"1.85\",\n                             \"ReturnPerOrder\": \"4.00\"\n                         },\n                         \"RepackingSpecialProjectPreparation\": {\n                             \"RepackingKitting\": \"44.00\",\n                             \"UrgentRushProjectPrep\": \"56.00\"\n                         }\n                     },\n                     \"GENERALFEES\": {\n                         \"MonthlyAccountManagement\": \"99.00\",\n                         \"WMSSoftwareIntegration\": \"0.00\",\n                         \"WMSSoftwareSubscription\": \"99.00\",\n                         \"OnlineLiveInventoryReports\": \"0.00\",\n                         \"ShippingPercentage\": \"25.00\"\n                     }\n                 }', 3, NULL, '2023-12-19 03:27:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_monthly_invoices`
--

CREATE TABLE `client_monthly_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activity_key` varchar(255) DEFAULT NULL,
  `activity` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 0 COMMENT '0 no value, 0 > consider for calculation',
  `rate` varchar(255) NOT NULL DEFAULT '0' COMMENT 'no value then 0',
  `amount` varchar(255) DEFAULT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `client_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 -> pending,1->approve,2->reject',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_monthly_invoices`
--

INSERT INTO `client_monthly_invoices` (`id`, `activity_key`, `activity`, `description`, `qty`, `rate`, `amount`, `month`, `year`, `client_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Temperature Control Pallet Storage', 'test', 2, '10.00', NULL, 'Dec', '2023', 2, 1, NULL, '2023-12-19 00:23:33', '2023-12-19 00:23:33');

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
-- Table structure for table `general_fees`
--

CREATE TABLE `general_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullfillment_fees` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`fullfillment_fees`)),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_fees`
--

INSERT INTO `general_fees` (`id`, `fullfillment_fees`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, '{\r\n            \"WAREHOUSESERVICES\": {\r\n                \"UnloadingLoadingContainers\": {\r\n                    \"Palletized\": {\r\n                        \"LTL\": \"12.90\",\r\n                        \"twentyftContainer\": \"290.00\",\r\n                        \"fourtyftContainer\": \"390.00\",\r\n                        \"fityThreeftContainer\": \"500.00\"\r\n                    },\r\n                    \"Unpalletized\": {\r\n                        \"ManualUnloading\": \"44.00\"\r\n                    }\r\n                },\r\n                \"ReceivingAllocating\": {\r\n                    \"ReceivingASNFee\": \"11.00\",\r\n                    \"PalletReceivingAllocating\": \"11.00\",\r\n                    \"ManualReceivingAllocating\": \"44.00\"\r\n                },\r\n                \"Supplies\": {\r\n                    \"PalletizedShrinkWrapping\": \"6.50\",\r\n                    \"ActualCostofMaterial\": \"15\"\r\n                },\r\n                \"ProductStorage\": {\r\n                    \"StandardPalletStorage\": \"34.50\",\r\n                    \"LargePallet\": \"41.50\",\r\n                    \"XLargePallet\": \"45.50\",\r\n                    \"FloorLoadedSpace\": \"5.10\",\r\n                    \"SmallBins\": \"3.00\",\r\n                    \"MediumBins\": \"5.00\",\r\n                    \"LargeBins\": \"7.00\",\r\n                    \"TemperatureControlPalletStorage\": \"49.00\"\r\n                },\r\n                \"AdditionalServices\": {\r\n                    \"PhotoGraphs\": \"7.00\",\r\n                    \"RecycleDisposal\": \"0.75\",\r\n                    \"CycleCountInventoryCount\": \"44.00\",\r\n                    \"CustomAPIIntegration\": \"499\",\r\n                    \"CustomEDIIntegration\": \"49.00\"\r\n                }\r\n            },\r\n            \"FULFILLMENTFEES\": {\r\n                \"B2COrderFulfillment\": {\r\n                    \"OrderFulFillment\": \"1.70\",\r\n                    \"OrderFulFillment1000OrdersMonth\": \"1.90\",\r\n                    \"OrderFulFillment500OrdersMonth\": \"2.40\",\r\n                    \"OrderFulFillment0OrdersMonth\": \"2.85\",\r\n                    \"AdditionalItemPick\": \"0.30\",\r\n                    \"AdditionalItemPick1000\": \"0.35\",\r\n                    \"AdditionalItemPick500\": \"0.45\",\r\n                    \"AdditionalItemPick0\": \"0.70\",\r\n                    \"Labelling\": \"0.51\",\r\n                    \"Inserts\": \"0.26\"\r\n                },\r\n                \"B2BOrderFulfillment\": {\r\n                    \"CaseMasterCartonPicking\": \"2.85\"\r\n                },\r\n                \"EcomReturnManagement\": {\r\n                    \"ShipmentInclQAreporting\": \"5.00\",\r\n                    \"ReturnPerItem\": \"1.85\",\r\n                    \"ReturnPerOrder\": \"4.00\"\r\n                },\r\n                \"RepackingSpecialProjectPreparation\": {\r\n                    \"RepackingKitting\": \"44.00\",\r\n                    \"UrgentRushProjectPrep\": \"56.00\"\r\n                }\r\n            },\r\n            \"GENERALFEES\": {\r\n                \"MonthlyAccountManagement\": \"99.00\",\r\n                \"WMSSoftwareIntegration\": \"0.00\",\r\n                \"WMSSoftwareSubscription\": \"99.00\",\r\n                \"OnlineLiveInventoryReports\": \"0.00\",\r\n                \"ShippingPercentage\": \"25.00\"\r\n            }\r\n        }', NULL, NULL, NULL);

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
(31, '2014_10_12_000000_create_users_table', 1),
(32, '2014_10_12_100000_create_password_resets_table', 1),
(33, '2019_08_19_000000_create_failed_jobs_table', 1),
(34, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(35, '2023_12_08_075848_create_general_fees_table', 1),
(36, '2023_12_14_091915_create_client_fees_table', 2),
(40, '2023_12_18_091529_create_client_monthly_invoices_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1 COMMENT '0 -> admin,1-> clients',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 -> active,0-> disabled',
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `client_id`, `location`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin@example.com', NULL, NULL, NULL, '$2y$10$Cr9H0KAiCdGVWp8vhm3zsO8GKFRM8apIoqyS0QKCkYoLGJzq2EoES', 0, 1, NULL, NULL, NULL, NULL),
(2, 'Walmart', 'walmart@gmail.com', 'ASDF45', 'Miami, FL, USA', NULL, NULL, 1, 1, NULL, NULL, '2023-12-13 02:33:20', '2023-12-19 00:01:04'),
(3, 'Target', 'Target@gmail.com', 'ASDG13', 'Miami, FL, USA', NULL, NULL, 1, 1, NULL, NULL, '2023-12-13 02:34:35', '2023-12-13 02:34:35'),
(4, 'IKEA', 'ikea@gmail.com', 'ASDF89', 'Miami, FL, USA', NULL, NULL, 1, 1, NULL, NULL, '2023-12-13 02:34:58', '2023-12-13 04:49:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_fees`
--
ALTER TABLE `client_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_monthly_invoices`
--
ALTER TABLE `client_monthly_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_fees`
--
ALTER TABLE `general_fees`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_fees`
--
ALTER TABLE `client_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `client_monthly_invoices`
--
ALTER TABLE `client_monthly_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_fees`
--
ALTER TABLE `general_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
