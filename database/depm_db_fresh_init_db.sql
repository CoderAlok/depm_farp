-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 06:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `depm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_progress_masters`
--

CREATE TABLE `application_progress_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appl_id` bigint(20) DEFAULT NULL COMMENT 'PK of Application table',
  `total_expense` decimal(10,2) DEFAULT 0.00 COMMENT 'Total expense amount by respective officer',
  `incentive_amount` decimal(10,2) DEFAULT 0.00 COMMENT 'Incentive amount by respective officer',
  `remarks` longtext DEFAULT NULL COMMENT 'Remarks of perticular application',
  `created_by` bigint(20) DEFAULT NULL COMMENT 'PK of user table',
  `updated_by` bigint(20) DEFAULT NULL COMMENT 'PK of User table',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `application_statuses`
--

CREATE TABLE `application_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL COMMENT 'Name of the status',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_statuses`
--

INSERT INTO `application_statuses` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Applied', '2023-07-18 05:40:55', NULL, NULL),
(2, 'Applied by exporter', '2023-07-18 05:40:55', NULL, NULL),
(3, 'Pending at SO', '2023-07-18 05:40:55', NULL, NULL),
(4, 'Verified by SO', '2023-07-18 05:40:55', NULL, NULL),
(5, 'Under process at Director DEPM', '2023-07-18 05:40:55', NULL, NULL),
(6, 'Verifid by Director DEPM', '2023-07-18 05:40:55', NULL, NULL),
(7, 'Not Verified by Director DEPM', '2023-07-18 05:40:55', NULL, NULL),
(8, 'Under process at addl/special secretory', '2023-07-18 05:40:55', NULL, NULL),
(9, 'Verified by addl/special secretory', '2023-07-18 05:40:55', NULL, NULL),
(10, 'Rejected by addl/special secretory', '2023-07-18 05:40:55', NULL, NULL),
(11, 'Under process at Department secretory', '2023-07-18 05:40:55', NULL, NULL),
(12, 'Approved by Department secretory', '2023-07-18 05:40:55', NULL, NULL),
(13, 'Rejected by Department secretory', '2023-07-18 05:40:55', NULL, NULL),
(14, 'Under process by Director Depm for Sanctioned process', '2023-07-18 05:40:55', NULL, NULL),
(15, 'Approved by Director Depm and Sanctioned', '2023-07-18 05:40:55', NULL, NULL),
(16, 'Rejected by Director Depm and not Sisbursed', '2023-07-18 05:40:55', NULL, NULL);

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
(38, '2014_10_12_000000_create_users_table', 1),
(39, '2014_10_12_100000_create_password_resets_table', 1),
(40, '2019_08_19_000000_create_failed_jobs_table', 1),
(41, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(42, '2023_06_23_103001_create_permission_tables', 1),
(76, '2023_06_26_050228_create_tbl_exporters_table', 2),
(77, '2023_06_27_113251_create_tbl_category_table', 2),
(78, '2023_06_28_071816_create_tbl_exporter_address_table', 2),
(79, '2023_06_28_072420_create_tbl_exporter_bank_details_table', 2),
(80, '2023_06_28_072959_create_tbl_exporter_other_code_table', 2),
(82, '2023_06_29_124720_add_column_in_tbl_exporters_table', 3),
(84, '2023_06_30_112730_create_tbl_exporter_remarks_table', 4),
(86, '2023_07_01_094334_create_tbl_otp_table', 5),
(87, '2023_07_01_175225_create_tbl_district_table', 6),
(88, '2023_07_01_182432_change_column_in_tbl_exporter_table', 7),
(92, '2023_07_02_053455_add_column_in_tbl_exporter_table', 8),
(101, '2023_07_02_104730_create_tbl_scheme_master_table', 9),
(102, '2023_07_02_115923_add_column_is_email_verified_in_tbl_exporters_table', 9),
(104, '2023_07_07_093117_add_column_exporter_type_in_tbl_exporters_table', 10),
(105, '2023_07_10_124848_add_column_color_in_tbl_scheme_master_table', 11),
(117, '2023_07_13_091108_create_tbl_application_details_table', 12),
(118, '2023_07_13_092434_create_tbl_application_travel_details_table', 12),
(119, '2023_07_13_095616_create_tbl_application_stall_details_table', 12),
(120, '2023_07_13_100230_create_tbl_application_event_details_table', 12),
(121, '2023_07_13_102022_create_tbl_application_files_details_table', 12),
(122, '2023_07_18_105622_create_application_statuses_table', 13),
(125, '2023_07_18_112306_create_application_progress_masters_table', 14),
(127, '2023_07_24_174716_create_tbl_complaince_table', 15),
(128, '2023_07_25_173910_create_tbl_application_log_table', 16),
(133, '2023_07_26_112305_add_column_occurence_in_tbl_complainc_table', 17),
(136, '2023_07_27_100815_add_column_appeal_facility_in_tbl_application_details_table', 18),
(138, '2023_07_28_125633_create_tbl_applied_applications_table', 19);

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
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4);

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
(1, 'user-module', 'web', '2023-06-23 07:48:16', '2023-06-23 07:48:16'),
(2, 'user-list', 'web', '2023-06-23 07:48:16', '2023-06-23 07:48:16'),
(3, 'user-create', 'web', '2023-06-23 07:48:16', '2023-06-23 07:48:16'),
(4, 'user-edit', 'web', '2023-06-23 07:48:16', '2023-06-23 07:48:16'),
(5, 'user-delete', 'web', '2023-06-23 07:48:16', '2023-06-23 07:48:16'),
(6, 'role-module', 'web', '2023-06-23 07:48:16', '2023-06-23 07:48:16'),
(7, 'role-list', 'web', '2023-06-23 07:48:16', '2023-06-23 07:48:16'),
(8, 'role-create', 'web', '2023-06-23 07:48:16', '2023-06-23 07:48:16'),
(9, 'role-edit', 'web', '2023-06-23 07:48:16', '2023-06-23 07:48:16'),
(10, 'role-delete', 'web', '2023-06-23 07:48:16', '2023-06-23 07:48:16'),
(11, 'master-module', 'web', '2023-06-23 07:48:16', '2023-06-23 07:48:16'),
(12, 'master-list', 'web', '2023-06-23 07:48:16', '2023-06-23 07:48:16'),
(13, 'master-create', 'web', '2023-06-23 07:48:16', '2023-06-23 07:48:16'),
(14, 'master-edit', 'web', '2023-06-23 07:48:16', '2023-06-23 07:48:16'),
(15, 'master-delete', 'web', '2023-06-23 07:48:16', '2023-06-23 07:48:16');

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 8, 'MyApp', '4aeb1e9c8372bca82cacf44980ab2fb7c558f2e040cdf0fef03777bb7cb36ea8', '[\"*\"]', NULL, '2023-07-28 06:51:31', '2023-07-28 06:51:31'),
(2, 'App\\Models\\User', 8, 'MyApp', 'af0ab48b24a3e5d336eda00fc95459ab4b9ae91335fee555184c3b925c42dff2', '[\"*\"]', NULL, '2023-07-28 06:57:33', '2023-07-28 06:57:33'),
(3, 'App\\Models\\User', 8, 'MyApp', '70507914bc783f59f512e5a2daa8c94995ef21042578d8765b5e7b153db1fc08', '[\"*\"]', NULL, '2023-07-28 06:57:41', '2023-07-28 06:57:41'),
(4, 'App\\Models\\User', 8, 'MyApp', '6b5b7ba9969b493b322b736d9e7c9be89018546755df66d3df4d97bda065a9a0', '[\"*\"]', NULL, '2023-07-28 06:58:16', '2023-07-28 06:58:16'),
(5, 'App\\Models\\User', 8, 'MyApp', '22fd4c8d0fb93d6cdd4f9a999e15661b8aab75506cf64c70e8f9ae763e0d9fc7', '[\"*\"]', '2023-07-28 07:00:16', '2023-07-28 06:58:23', '2023-07-28 07:00:16');

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
(1, 'Super Admin', 'web', NULL, NULL),
(2, 'Scrutiny Officer, DEPM', 'web', NULL, '2023-07-17 05:13:52'),
(3, 'Director, DEPM', 'web', NULL, '2023-07-17 05:13:37'),
(4, 'Addl. / Spl. Secretary', 'web', NULL, '2023-07-17 05:12:24'),
(5, 'Dept. Secretary', 'web', NULL, '2023-07-17 05:12:47'),
(6, 'Exporter', 'exporter', NULL, '2023-07-17 05:14:03'),
(7, 'DDO, DEPM', 'web', NULL, '2023-07-17 05:13:23'),
(10, 'Section Officer MSME', 'web', NULL, '2023-07-02 13:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_details`
--

CREATE TABLE `tbl_application_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_no` varchar(500) DEFAULT NULL COMMENT 'Application number for refferal',
  `app_count_no` varchar(500) DEFAULT NULL COMMENT 'Application number count',
  `scheme_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'PK of tbl_scheme_master',
  `exporter_id` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_exporter_table',
  `meeting_details` text DEFAULT 'Details of B2B / B2C meeteing held',
  `participation_details` text DEFAULT NULL COMMENT 'Details of Participation of event such as Sale of Products, Business deals made etc',
  `certi_type` text DEFAULT NULL COMMENT 'Only fillable accept scheme 1: certifaicate type',
  `certi_name` text DEFAULT NULL COMMENT 'Only fillable accept scheme 1: certificates name',
  `certi_iss_auth` text DEFAULT NULL COMMENT 'Only fillable accept scheme 1: certificates issueing authority',
  `certi_cost` decimal(10,2) DEFAULT 0.00 COMMENT 'Only fillable accept scheme 1: Cost of certificate',
  `certi_payment_reciept_file` varchar(255) DEFAULT NULL COMMENT 'Only fillable accept scheme 1: certificates payment file',
  `confirmed` tinyint(1) DEFAULT 0 COMMENT 'Term agreed or not',
  `status` tinyint(4) NOT NULL,
  `appeal_facility` tinyint(4) DEFAULT 0 COMMENT '0 not approve, 1 Appeal can be done 2 appealed 3 Appeal approved 4 Appeal rejected',
  `created_by` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_exporter table',
  `updated_by` bigint(20) DEFAULT NULL COMMENT 'PK of user table',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_event_details`
--

CREATE TABLE `tbl_application_event_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appl_id` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_application_details',
  `details` longtext DEFAULT NULL COMMENT 'Event details will be added here',
  `event_type` tinyint(4) DEFAULT NULL COMMENT '1: Exhibition, 2: Conference, 3: Other',
  `other_event_type` text DEFAULT NULL COMMENT 'Other event details if event type 3 is selceted.',
  `participation_type` tinyint(4) DEFAULT NULL COMMENT '1: Delegates, 2: Exhibit',
  `city` varchar(255) DEFAULT NULL COMMENT 'city name',
  `country_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'PK of Country table',
  `status` tinyint(1) DEFAULT 0,
  `created_by` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_exporter',
  `updated_by` bigint(20) DEFAULT NULL COMMENT 'PK of user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_files_details`
--

CREATE TABLE `tbl_application_files_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appl_id` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_application_details',
  `iec_file` varchar(255) DEFAULT NULL COMMENT 'Import/Export certificate file name',
  `cancelled_cheque_file` varchar(255) DEFAULT NULL COMMENT 'Bank cancelled cheque file name',
  `file_visa` varchar(255) DEFAULT NULL COMMENT 'Visa file name',
  `file_ticket` varchar(255) DEFAULT NULL COMMENT 'Ticket file name',
  `file_boarding_pass` varchar(255) DEFAULT NULL COMMENT 'Boarding pass file name',
  `stall_allot_letter` varchar(255) DEFAULT NULL COMMENT 'Stall allotment pass letter file name',
  `stall_reg_pay_recipt` varchar(255) DEFAULT NULL COMMENT 'Stall registration payment reciept file name',
  `certi_payment_reciept_file` varchar(255) DEFAULT NULL COMMENT 'Only fillable accept scheme 1: certificates payment file',
  `tour_dairy` varchar(255) DEFAULT NULL COMMENT 'Tour Dairy file name',
  `status` tinyint(1) DEFAULT 0,
  `created_by` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_exporter',
  `updated_by` bigint(20) DEFAULT NULL COMMENT 'PK of user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_log`
--

CREATE TABLE `tbl_application_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appl_id` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_application_details ',
  `from_user_type` tinyint(4) NOT NULL COMMENT '1 => Exporter , 2 => Users',
  `from_user` bigint(20) DEFAULT NULL COMMENT 'User from User/Exporter table',
  `to_user_type` tinyint(4) NOT NULL COMMENT '1 => Exporter , 2 => Users',
  `to_user` bigint(20) DEFAULT NULL COMMENT 'User from User/Exporter table',
  `status` tinyint(4) NOT NULL COMMENT '1: Applied, 2: Verified by SO, 3: , 4: approved by dir depm, 5: Not verified by dir depm, 6: Verified by Addl, 7: Not verified by Add, 8: Approved by Department Secretory,9: Rejected by Department Secretory',
  `remarks` text DEFAULT NULL COMMENT 'Remarks for that application by that user',
  `updated_date` datetime DEFAULT NULL COMMENT 'Application updation date',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_stall_details`
--

CREATE TABLE `tbl_application_stall_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appl_id` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_application_details',
  `event_id` bigint(20) DEFAULT NULL COMMENT 'PK of event_table',
  `total_cost` decimal(10,2) DEFAULT 0.00 COMMENT 'Total stall registration cost',
  `claimed_cost` decimal(10,2) DEFAULT 0.00 COMMENT 'Incentive claimed towards Stall registration',
  `stall_allot_letter` varchar(255) DEFAULT NULL COMMENT 'Upload Stall Allotment / Registration Letter',
  `stall_reg_pay_recipt` varchar(255) DEFAULT NULL COMMENT 'Upload Stall Registration payment reciept',
  `created_by` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_exporter',
  `updated_by` bigint(20) DEFAULT NULL COMMENT 'PK of user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_travel_details`
--

CREATE TABLE `tbl_application_travel_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appl_id` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_application_details',
  `destination_type` tinyint(4) DEFAULT NULL COMMENT 'Travel destination type 1: within india, 2: Outside India, so on',
  `traveller_name` varchar(100) DEFAULT NULL COMMENT 'Traveller name',
  `designation` varchar(100) DEFAULT NULL COMMENT 'Travellors designation',
  `mode_of_travel` tinyint(4) DEFAULT NULL COMMENT '1: Flight, 2: Train, so on',
  `class_of_travel` varchar(100) DEFAULT NULL COMMENT 'Class of traveL',
  `total_expense` decimal(10,3) NOT NULL DEFAULT 0.000 COMMENT 'Total expense made for travel',
  `incentive_claimed` decimal(10,3) NOT NULL DEFAULT 0.000 COMMENT 'Incentive claimed towards travel',
  `file_visa` varchar(200) DEFAULT NULL COMMENT 'Visa invitaion letter file',
  `file_ticket` varchar(200) DEFAULT NULL COMMENT 'Ticket of train/flight file',
  `file_boarding_pass` varchar(200) DEFAULT NULL COMMENT 'Boarding Pass during flight file',
  `status` tinyint(1) DEFAULT 0,
  `created_by` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_exporter table',
  `updated_by` bigint(20) DEFAULT NULL COMMENT 'PK of User table',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applied_applications`
--

CREATE TABLE `tbl_applied_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appl_id` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_application_details',
  `description` longtext DEFAULT NULL COMMENT 'Appeal description',
  `confirmed` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 pending 1 approve 2 rejected',
  `created_by` bigint(20) DEFAULT NULL COMMENT 'PK of Exporter table',
  `updated_by` bigint(20) DEFAULT NULL COMMENT 'PK of Users table',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) DEFAULT NULL COMMENT 'Category name',
  `status` tinyint(4) DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL COMMENT 'PK of User table',
  `updated_by` bigint(20) DEFAULT NULL COMMENT 'PK of user table',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Metallurgicall', 1, NULL, NULL, NULL, '2023-07-12 07:15:49', NULL),
(2, 'Engineering/Chemical & Allied ', 1, NULL, NULL, NULL, NULL, NULL),
(3, 'Mineral', 1, NULL, NULL, NULL, '2023-07-12 07:25:31', NULL),
(4, 'Agricultural & Forest', 1, NULL, NULL, NULL, NULL, NULL),
(5, 'Marine', 1, NULL, NULL, NULL, NULL, NULL),
(6, 'Handloom', 1, NULL, NULL, NULL, NULL, NULL),
(7, 'Handicraft', 1, NULL, NULL, NULL, NULL, NULL),
(8, 'Textile', 1, NULL, NULL, NULL, NULL, NULL),
(9, 'Pharmaceutical', 1, NULL, NULL, NULL, NULL, NULL),
(10, 'Gems & Jewelry', 1, NULL, NULL, NULL, NULL, NULL),
(11, 'Other Service Provider', 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaince`
--

CREATE TABLE `tbl_complaince` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `occurence` int(10) UNSIGNED DEFAULT 1 COMMENT 'Number of time the application gets rejected',
  `appl_id` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_application_details',
  `exporter_id` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_exporters',
  `user_id` bigint(20) DEFAULT NULL COMMENT 'PK of user',
  `section_type` int(10) UNSIGNED DEFAULT NULL COMMENT 'Section type ids',
  `description` text DEFAULT NULL COMMENT 'Complaince description',
  `file_name` varchar(255) DEFAULT NULL COMMENT 'Name of the reverted file by the exporter',
  `exporters_remarks` text DEFAULT NULL COMMENT 'Exporters remarks',
  `insert_status` tinyint(1) DEFAULT 0 COMMENT 'Applications data will be resubmitted if status is true.',
  `created_by` bigint(20) DEFAULT NULL COMMENT 'PK of Users table',
  `updated_by` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_exporters',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) DEFAULT NULL COMMENT 'PK of state table.',
  `name` varchar(100) DEFAULT NULL COMMENT 'District name',
  `code` varchar(100) DEFAULT NULL COMMENT 'District Code',
  `status` tinyint(1) DEFAULT 0 COMMENT 'Active / Inactive',
  `created_by` bigint(20) DEFAULT NULL COMMENT '12',
  `updated_by` bigint(20) DEFAULT NULL COMMENT '12',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`id`, `state_id`, `name`, `code`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 25, 'Angul', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(2, 25, 'Balangir', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(3, 25, 'Balasore', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(4, 25, 'Bargarh', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(5, 25, 'Bhadrak', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(6, 25, 'Boudh', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(7, 25, 'Cuttack', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(8, 25, 'Deogarh', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(9, 25, 'Dhenkanal', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(10, 25, 'Gajapati', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(11, 25, 'Ganjam', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(12, 25, 'Jagatsinghapur', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(13, 25, 'Jajpur', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(14, 25, 'Jharsuguda', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(15, 25, 'Kalahandi', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(16, 25, 'Kandhamal', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(17, 25, 'Kendrapara', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(18, 25, 'Kendujhar (Keonjhar)', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(19, 25, 'Khordha', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(20, 25, 'Koraput', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(21, 25, 'Malkangiri', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(22, 25, 'Mayurbhanj', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(23, 25, 'Nabarangpur', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(24, 25, 'Nayagarh', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(25, 25, 'Nuapada', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(26, 25, 'Puri', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(27, 25, 'Rayagada', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(28, 25, 'Sambalpur', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(29, 25, 'Sonepur', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL),
(30, 25, 'Sundargarh', NULL, 0, 1, NULL, '2023-07-01 12:45:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exporters`
--

CREATE TABLE `tbl_exporters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_no` varchar(500) DEFAULT NULL COMMENT 'Application number for refferal',
  `app_count_no` varchar(500) DEFAULT NULL COMMENT 'Application number for refferal',
  `type` tinyint(4) DEFAULT NULL COMMENT '0: Merchant, 1:Manufacturer',
  `role_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'PK of roles table 6: Merchant, 7: Manufacturer',
  `category_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'PK of tbl_category table',
  `name` varchar(255) DEFAULT NULL COMMENT 'Name of exporters',
  `chief_ex_name` varchar(255) DEFAULT NULL COMMENT 'Name of exporters cheif executive',
  `email` varchar(100) DEFAULT NULL COMMENT 'Email of exporters',
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL COMMENT 'Exporters respective genders',
  `address_id` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_exporter_address table',
  `bank_id` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_exporter_bank_details table',
  `other_code_id` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_exporter_other_code table',
  `regsitration_status` tinyint(4) DEFAULT NULL COMMENT 'PK of status table',
  `is_email_verified` tinyint(1) DEFAULT 0,
  `track_status` tinyint(4) DEFAULT 0 COMMENT '0: Reset password is mendatory, 1: Account is active. But, After 45days status will again change into 0',
  `created_by` bigint(20) DEFAULT NULL COMMENT 'PK of current table',
  `updated_by` bigint(20) DEFAULT NULL COMMENT 'PK of user table',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exporter_address`
--

CREATE TABLE `tbl_exporter_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exporter_id` bigint(20) DEFAULT NULL COMMENT 'PK of Exporter table',
  `address` varchar(255) DEFAULT NULL COMMENT 'Full address of exporter',
  `post` varchar(100) DEFAULT NULL COMMENT 'Postal address',
  `city` varchar(100) DEFAULT NULL COMMENT 'City name',
  `district` int(10) UNSIGNED DEFAULT NULL COMMENT 'PK of District table',
  `pincode` varchar(100) DEFAULT NULL COMMENT 'Pincode',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: Inactive, 1: Active',
  `created_by` bigint(20) DEFAULT NULL COMMENT 'PK of Exporter table',
  `updated_by` bigint(20) DEFAULT NULL COMMENT 'PK of User table role:Publicity',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exporter_bank_details`
--

CREATE TABLE `tbl_exporter_bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exporter_id` bigint(20) DEFAULT NULL COMMENT 'PK of Exporter table',
  `name` varchar(100) DEFAULT NULL COMMENT 'Name of the bank',
  `account_no` varchar(100) DEFAULT NULL COMMENT 'Banks account number',
  `ifsc` varchar(100) DEFAULT NULL COMMENT 'Banks IFSC Code',
  `cheque_img` varchar(100) DEFAULT NULL COMMENT 'Cheque image file name',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: Inactive, 1: Active',
  `created_by` bigint(20) DEFAULT NULL COMMENT 'PK of Exporter table',
  `updated_by` bigint(20) DEFAULT NULL COMMENT 'PK of User table role:Publicity',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exporter_other_code`
--

CREATE TABLE `tbl_exporter_other_code` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exporter_id` bigint(20) DEFAULT NULL COMMENT 'PK of Exporter table',
  `iec` varchar(100) DEFAULT NULL COMMENT 'Import Export Code',
  `rcmc` varchar(100) DEFAULT NULL COMMENT 'RCMC NO: REGISTRATION-CUM-MEMBERSHIP CERTIFICATE',
  `epc` varchar(255) DEFAULT NULL COMMENT 'Name of EPC(Export promotion council)',
  `urn` varchar(100) DEFAULT NULL COMMENT 'Udayam Registration No',
  `hsm` varchar(100) DEFAULT NULL COMMENT 'Harmonized System of Nomenclature',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: Inactive, 1: Active',
  `created_by` bigint(20) DEFAULT NULL COMMENT 'PK of Exporter table',
  `updated_by` bigint(20) DEFAULT NULL COMMENT 'PK of User table role:Publicity',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exporter_remarks`
--

CREATE TABLE `tbl_exporter_remarks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exporter_id` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_exporters',
  `type` tinyint(4) DEFAULT 0 COMMENT '0: Registration approval, vice versa',
  `remarks` longtext DEFAULT NULL COMMENT 'Authority remarks',
  `status` tinyint(1) DEFAULT 0 COMMENT 'active / inactive',
  `created_by` bigint(20) DEFAULT NULL COMMENT 'PK of User table',
  `updated_by` bigint(20) DEFAULT NULL COMMENT 'PK of User table',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otp`
--

CREATE TABLE `tbl_otp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(200) DEFAULT NULL COMMENT 'text',
  `otp` int(10) UNSIGNED DEFAULT NULL COMMENT 'Max 8 digit otp',
  `is_verified` tinyint(1) DEFAULT 0 COMMENT 'true: verified, false: not verified yet',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scheme_master`
--

CREATE TABLE `tbl_scheme_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(100) DEFAULT NULL COMMENT 'Scheme Code',
  `route_name` varchar(500) DEFAULT NULL COMMENT 'Route name will be stored to redirect.',
  `long_name` longtext DEFAULT NULL COMMENT 'Scheme long name',
  `short_name` text DEFAULT NULL COMMENT 'Scheme short name',
  `logo` varchar(100) DEFAULT NULL COMMENT 'Scheme : fa fa icon',
  `color` varchar(20) DEFAULT '#ffffff',
  `amount` decimal(10,2) DEFAULT 0.00 COMMENT 'Scheme amount',
  `status` tinyint(1) DEFAULT 0 COMMENT 'Active/Inactive',
  `created_by` bigint(20) DEFAULT NULL COMMENT 'PK of user table',
  `updated_by` bigint(20) DEFAULT NULL COMMENT 'PK of user table',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_scheme_master`
--

INSERT INTO `tbl_scheme_master` (`id`, `code`, `route_name`, `long_name`, `short_name`, `logo`, `color`, `amount`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'exporter.application.annexure1', 'Financial support for Participating in International Trade Fair /Event', 'Financial support for Participating in International Trade Fair /Event', 'fas fa-calendar', '#3e95cd', 10000.00, 1, NULL, NULL, NULL, '2023-07-15 00:29:03', NULL),
(2, NULL, 'exporter.application.annexure2', 'Reimbursement of RCMC Fee / Charges', 'Reimbursement of RCMC Fee / Charges', 'fas fa-calendar', '#dda6a2', 10000.00, 1, NULL, NULL, NULL, '2023-07-15 00:29:25', NULL),
(3, NULL, 'exporter.application.annexure2', 'One-time reimbursement for obtaining organic certification, quality certification@ 50% of the total outlay subject to a ceiling of Rs.10 lakh.', 'Reimbursement for obtaining Organic Certification', 'fas fa-calendar', '#e8c3b9', 12000.00, 1, NULL, NULL, NULL, '2023-07-15 00:29:57', NULL),
(4, NULL, 'exporter.application.annexure2', 'One-time reimbursement of S0X» of the cost incurred in obtaining  quality  certification for manufacturing processes or any other certification for  export  (compulsory  markings  such  as Conformity  European  (CE),  China Compulsory  Certificates  (CCC) ,  issued  by any  Government agency or any agency authorized by Central or Government of Odisha, subject to a ceiling of Rs. 50,000/-.', 'Reimbursement for obtaining Quality Certification for Manufacturing Process', 'fas fa-calendar', '#fff152', 12000.00, 1, NULL, NULL, NULL, '2023-07-15 00:30:12', NULL),
(5, NULL, 'exporter.application.annexure2', 'Reimbursement  of  cost  incurred  by  an  exporter  for  first  3  years  towards  country  specific  Certification  &  Quality  Standards  for  a new product/  value  added  product,  exported  to  a  virgin  market  @  SOP  of  the  cost  incurred  towards  certification  subject  to  a  ceiling  of Rs.10,000/- per export shipment.', 'Reimbursement for obtaining Country Specific Quality Certification', 'fas fa-calendar', '#9df070', 12000.00, 1, NULL, NULL, NULL, '2023-07-15 00:32:02', NULL),
(6, NULL, 'exporter.application.annexure2', 'Reimbursement for obtaining testing certification @ 0% of the total cost subject to ceiling of Rs.10, 000 /- per export shipment.', 'Reimbursement for obtaining Testing Certification', 'fas fa-calendar', '#cf81df', 12000.00, 1, NULL, NULL, NULL, '2023-07-15 00:32:31', NULL),
(7, NULL, 'exporter.application.annexure2', 'One-time reimbursement  of SOP of the total cost incurred subject to ceiling of Rs.5 lakh to acquire advanced technology aimed at improving product Standards / marketability  from state institutes  like OUAT, CIFT, CIFA and premier national institutions  such as IIS, NID, IIT, NIT and CSIR to improve product quality standards for international market acceptance.', 'One Time Reimbursement for Improvement of Quality / Upgradation of Technology', 'fas fa-calendar', '#57a26a', 12000.00, 1, NULL, NULL, NULL, '2023-07-15 00:32:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT 1 COMMENT 'PK of roles table',
  `type` tinyint(1) DEFAULT NULL COMMENT '1=>Exporters, 2=> Users',
  `first_name` varchar(255) DEFAULT '',
  `last_name` varchar(255) DEFAULT '',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL COMMENT 'Username of user for login',
  `password` varchar(255) NOT NULL,
  `phone` text DEFAULT NULL COMMENT 'users phone number',
  `confirmed` tinyint(1) DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `type`, `first_name`, `last_name`, `email`, `email_verified_at`, `username`, `password`, `phone`, `confirmed`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 'Super', 'Admin', 'superadmin@mail.com', NULL, 'superadmin', '$2y$10$oZDjaFG32vb3FF340wSkR.arbmiKY2ISi4RM.3njRgkcj9RauObx.', '0000000000', 0, NULL, '2023-06-23 07:55:30', '2023-06-23 07:55:30', NULL),
(2, 2, 2, 'Prabhash', 'Bhattacharya', 'prabhashbhattacharya1991@gmail.com', NULL, 'sodepm22397917', '$2y$10$u3ylYsIkKGThiNo0IW.r/efmc/yYYcnaKlklMQ0MGNjYfS2g5BRI.', '8967770236', 0, NULL, NULL, '2023-07-13 01:01:50', NULL),
(3, 3, 2, 'Dipesh', 'Mishro', 'dipeshmishro1887@gmail.com', NULL, 'dirdepm74753132', '$2y$10$ly4JAUjcfZKEyI8mR92moeaqkUBlcXUgCvPdbhUVsrprMwEHGRehG', '8967774589', 0, NULL, NULL, NULL, NULL),
(4, 4, 2, 'Pradeep', 'Mohanty', 'pradeepmohanty91@gmail.com', NULL, 'somsme83058825', '$2y$10$SeRDdT/SAqnytD902aiWaOHGPqx0yvWP9mINLXuFFEig8rAv5GVRe', '9876985236', 0, NULL, NULL, NULL, NULL),
(5, 10, 2, 'Manoranjan', 'Barik', 'manoranjanbarik998@gmail.com', NULL, 'secmsme31718622', '$2y$10$NbgeKTXsA4GSHOTg/kCp/uN.RdpoLshQruDbTFREcIbD76pUCsBj2', '8745120366', 0, NULL, NULL, '2023-07-03 01:39:02', NULL),
(6, 5, 2, 'Parijat', 'Mishro', 'parijatmishro98@gmail.com', NULL, 'psdepm89113977', '$2y$10$dVS76MGBrHauRnfviCZr6.qvg.k9pgy7HszY25sy41QlXNeSA2Kk2', '8745699854', 0, NULL, NULL, NULL, NULL),
(7, 7, 2, 'Abhinash', 'Mohanty', 'abhinashmohanty998@gmail.com', NULL, 'aodepm45855953', '$2y$10$GNtSM6FoQ9dqM8JwWKvh7u01VDVmhg1GCgrtmOkuDDq/a6eT3TN0C', '9856321456', 0, NULL, NULL, NULL, NULL),
(8, 1, NULL, 'Alok', 'Das', 'alok@mail.com', NULL, 'alok98', '$2y$10$MYa6B9FaK.m3Y72Y1/V6zeIG1zWGQDakh4Dd8pu4dbS0ER9H/pAZi', '8967770233', 0, NULL, '2023-07-28 06:51:31', '2023-07-28 06:51:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_progress_masters`
--
ALTER TABLE `application_progress_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_statuses`
--
ALTER TABLE `application_statuses`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- Indexes for table `tbl_application_details`
--
ALTER TABLE `tbl_application_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_application_details_app_no_unique` (`app_no`),
  ADD UNIQUE KEY `tbl_application_details_app_count_no_unique` (`app_count_no`);

--
-- Indexes for table `tbl_application_event_details`
--
ALTER TABLE `tbl_application_event_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_application_files_details`
--
ALTER TABLE `tbl_application_files_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_application_log`
--
ALTER TABLE `tbl_application_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_application_stall_details`
--
ALTER TABLE `tbl_application_stall_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_application_travel_details`
--
ALTER TABLE `tbl_application_travel_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_applied_applications`
--
ALTER TABLE `tbl_applied_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_complaince`
--
ALTER TABLE `tbl_complaince`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exporters`
--
ALTER TABLE `tbl_exporters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_exporters_app_no_unique` (`app_no`),
  ADD UNIQUE KEY `tbl_exporters_app_count_no_unique` (`app_count_no`);

--
-- Indexes for table `tbl_exporter_address`
--
ALTER TABLE `tbl_exporter_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exporter_bank_details`
--
ALTER TABLE `tbl_exporter_bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exporter_other_code`
--
ALTER TABLE `tbl_exporter_other_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exporter_remarks`
--
ALTER TABLE `tbl_exporter_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_scheme_master`
--
ALTER TABLE `tbl_scheme_master`
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
-- AUTO_INCREMENT for table `application_progress_masters`
--
ALTER TABLE `application_progress_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application_statuses`
--
ALTER TABLE `application_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_application_details`
--
ALTER TABLE `tbl_application_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_application_event_details`
--
ALTER TABLE `tbl_application_event_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_application_files_details`
--
ALTER TABLE `tbl_application_files_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_application_log`
--
ALTER TABLE `tbl_application_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_application_stall_details`
--
ALTER TABLE `tbl_application_stall_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_application_travel_details`
--
ALTER TABLE `tbl_application_travel_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_applied_applications`
--
ALTER TABLE `tbl_applied_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_complaince`
--
ALTER TABLE `tbl_complaince`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_exporters`
--
ALTER TABLE `tbl_exporters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_exporter_address`
--
ALTER TABLE `tbl_exporter_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_exporter_bank_details`
--
ALTER TABLE `tbl_exporter_bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_exporter_other_code`
--
ALTER TABLE `tbl_exporter_other_code`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_exporter_remarks`
--
ALTER TABLE `tbl_exporter_remarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_scheme_master`
--
ALTER TABLE `tbl_scheme_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
