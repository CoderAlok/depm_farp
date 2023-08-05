-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 06:33 AM
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

--
-- Dumping data for table `application_progress_masters`
--

INSERT INTO `application_progress_masters` (`id`, `appl_id`, `total_expense`, `incentive_amount`, `remarks`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 9000.00, 8000.00, 'Forwarded to directir depm', 2, 2, '2023-08-02 09:01:17', NULL, NULL),
(2, 1, 9000.00, 8000.00, 'rejected', 3, 3, '2023-08-02 09:12:34', NULL, NULL),
(3, 1, 0.00, 0.00, 'Here is the bank cheque and iec file', 1, 0, '2023-08-02 09:29:57', NULL, NULL),
(4, 1, NULL, NULL, 'Forwading again to directir dem', 2, 2, '2023-08-02 09:31:25', NULL, NULL),
(5, 1, 9000.00, 8000.00, 'Forwarded to additional spacial secretory.', 3, 3, '2023-08-02 09:39:05', NULL, NULL),
(6, 1, 9000.00, 8000.00, 'rejected', 4, 4, '2023-08-02 09:40:45', NULL, NULL),
(7, 1, 0.00, 0.00, 'Plesae, verify once again i have not giving any documents', 1, 0, '2023-08-02 09:43:07', NULL, NULL),
(8, 1, NULL, NULL, 'Forwarding again', 2, 2, '2023-08-02 09:43:51', NULL, NULL),
(9, 1, 9000.00, 8000.00, 'Forwarded the application to additional secretokry', 3, 3, '2023-08-02 09:45:51', NULL, NULL),
(10, 1, 9000.00, 8000.00, 'Forwarded to department secretory', 4, 4, '2023-08-02 09:46:34', NULL, NULL),
(11, 1, 9000.00, 8000.00, 'rejected from department secretory', 6, 6, '2023-08-02 09:47:41', NULL, NULL),
(13, 1, 0.00, 0.00, 'Here is my latest bank cheque', 1, 0, '2023-08-02 10:23:16', NULL, NULL),
(14, 1, NULL, NULL, 'Forwarded the application again', 2, 2, '2023-08-02 10:23:45', NULL, NULL),
(15, 1, 9000.00, 8000.00, 'Forwarded for The last time', 3, 3, '2023-08-02 10:25:11', NULL, NULL),
(16, 1, 9000.00, 8000.00, 'Forwarding the application tio department secretory', 4, 4, '2023-08-02 10:26:48', NULL, NULL),
(19, 1, 9000.00, 8000.00, 'Rejected', 6, 6, '2023-08-02 10:51:06', NULL, NULL),
(20, 1, 0.00, 0.00, 'Here is my plan ticket', 1, 0, '2023-08-02 10:53:26', NULL, NULL),
(21, 1, NULL, NULL, 'Forwarded for the last time', 2, 2, '2023-08-02 10:53:47', NULL, NULL),
(22, 1, 9000.00, 8000.00, 'Forwarded for the last tiume', 3, 3, '2023-08-02 10:54:12', NULL, NULL),
(23, 1, 9000.00, 8000.00, 'Forwarded for the Last time to depoartment secretory', 4, 4, '2023-08-02 10:54:48', NULL, NULL),
(24, 1, 9000.00, 8000.00, 'Ok approved and forwarded for Sanction', 6, 6, '2023-08-02 10:55:30', NULL, NULL),
(25, 1, 8000.00, 8500.00, 'Ok we are considering', 6, 6, '2023-08-02 11:44:42', NULL, NULL),
(26, 2, 60000.00, 59000.00, 'Forwarded to director depm', 2, 2, '2023-08-03 08:35:16', NULL, NULL),
(27, 3, 4000.00, 3500.00, 'Application has been forwarded to director, depm', 2, 2, '2023-08-03 08:57:24', NULL, NULL),
(28, 3, 4000.00, 3500.00, 'Forwarded to additional special secretory', 3, 3, '2023-08-03 09:04:14', NULL, NULL),
(29, 3, 4000.00, 3500.00, 'Approved and sent to department secretory', 4, 4, '2023-08-03 09:05:52', NULL, NULL),
(30, 3, 4000.00, 3500.00, 'Application rejected please, upload your bank details again', 6, 6, '2023-08-03 09:06:42', NULL, NULL),
(31, 3, 0.00, 0.00, 'I am genuine', 1, 0, '2023-08-03 09:12:50', NULL, NULL),
(32, 3, NULL, NULL, 'Forwarded again application', 2, 2, '2023-08-03 09:13:43', NULL, NULL),
(33, 3, 4000.00, 3500.00, 'Forwarded to additional special secretory', 3, 3, '2023-08-03 09:14:29', NULL, NULL),
(34, 3, 4000.00, 3500.00, 'Application forwarded to department secretory', 4, 4, '2023-08-03 09:15:10', NULL, NULL),
(35, 3, 4000.00, 3500.00, 'Application rejected', 6, 6, '2023-08-03 09:15:52', NULL, NULL),
(36, 3, 0.00, 0.00, 'Okay i have uploaded my files', 1, 0, '2023-08-03 09:16:53', NULL, NULL),
(37, 3, NULL, NULL, 'Forwarded the application to director depm', 2, 2, '2023-08-03 09:17:24', NULL, NULL),
(38, 3, 4000.00, 3500.00, 'forwardinhg again this application to additional special secretory', 3, 3, '2023-08-03 09:18:10', NULL, NULL),
(39, 2, 60000.00, 59000.00, 'Approved and forwarded this application to additional special secretory', 3, 3, '2023-08-03 09:21:15', NULL, NULL),
(40, 2, 60000.00, 59000.00, 'Applicationapp', 4, 4, '2023-08-03 09:23:00', NULL, NULL),
(41, 2, 60000.00, 59000.00, 'Application rejected', 6, 6, '2023-08-03 09:23:35', NULL, NULL),
(42, 2, 0.00, 0.00, 'Here, is my plan ticket', 1, 0, '2023-08-03 09:25:25', NULL, NULL),
(43, 2, NULL, NULL, 'Forwarded this applicatioon', 2, 2, '2023-08-03 09:26:23', NULL, NULL),
(44, 2, 60000.00, 59000.00, 'Application forwarded to add spl scrty', 3, 3, '2023-08-03 09:28:16', NULL, NULL),
(45, 2, 60000.00, 59000.00, 'Application rejected', 4, 4, '2023-08-03 09:29:49', NULL, NULL),
(46, 3, 0.00, 0.00, 'This is my latest bank cheque', 1, 0, '2023-08-03 09:37:05', NULL, NULL),
(47, 3, NULL, NULL, 'Application again forwarded to the director depm', 2, 2, '2023-08-03 09:38:14', NULL, NULL),
(48, 3, 4000.00, 3500.00, 'Application has been rejected', 3, 3, '2023-08-03 09:44:32', NULL, NULL),
(49, 3, 0.00, 0.00, 'asajs', 1, 0, '2023-08-03 09:45:04', NULL, NULL),
(50, 3, NULL, NULL, 'Forwarding This application to dirdepm', 2, 2, '2023-08-03 09:45:33', NULL, NULL),
(51, 3, 4000.00, 3500.00, 'Application has been forwarded to additional .special secretory', 3, 3, '2023-08-03 09:46:31', NULL, NULL),
(52, 3, 4000.00, 3500.00, 'Application rejected', 4, 4, '2023-08-03 09:47:36', NULL, NULL),
(53, 3, 0.00, 0.00, 'aajhk', 1, 0, '2023-08-03 09:48:54', NULL, NULL),
(54, 3, NULL, NULL, 'Forwarded this appl', 2, 2, '2023-08-03 09:49:27', NULL, NULL),
(55, 3, 4000.00, 3500.00, 'Application rejected by dirdepm 2', 3, 3, '2023-08-03 09:52:14', NULL, NULL),
(56, 3, 0.00, 0.00, 'My bank cheque', 1, 0, '2023-08-03 09:53:51', NULL, NULL),
(57, 3, NULL, NULL, 'Forwarded again aplication', 2, 2, '2023-08-03 09:54:31', NULL, NULL),
(58, 3, 4000.00, 3500.00, 'Forwarded this applicaytion to addl special secretory', 3, 3, '2023-08-03 09:55:14', NULL, NULL),
(59, 3, 4000.00, 3500.00, 'Application rejected', 4, 4, '2023-08-03 09:56:28', NULL, NULL),
(60, 3, 0.00, 0.00, 'sas', 1, 0, '2023-08-03 09:57:09', NULL, NULL),
(61, 3, NULL, NULL, 'forwagsah', 2, 2, '2023-08-03 09:57:23', NULL, NULL),
(62, 3, 4000.00, 3500.00, 'frowarded to addl spnas', 3, 3, '2023-08-03 09:57:57', NULL, NULL),
(63, 3, 4000.00, 3500.00, 'Approved assasa', 4, 4, '2023-08-03 09:58:20', NULL, NULL),
(64, 3, 4000.00, 3500.00, 'Application requires some more query', 6, 6, '2023-08-03 09:59:15', NULL, NULL),
(65, 3, 0.00, 0.00, 'asbhhasasgahsgasgaj', 1, 0, '2023-08-03 10:00:08', NULL, NULL),
(66, 3, NULL, NULL, 'Applicationhas been forwarde', 2, 2, '2023-08-03 10:00:22', NULL, NULL),
(67, 3, 4000.00, 3500.00, 'Forwarded this application to addl spl scrty', 3, 3, '2023-08-03 10:01:10', NULL, NULL),
(68, 3, 4000.00, 3500.00, 'Application is graete and forwarding ti deprtment secretory', 4, 4, '2023-08-03 10:01:55', NULL, NULL),
(69, 3, 4000.00, 3500.00, 'This application has been rejected', 6, 6, '2023-08-03 10:02:39', NULL, NULL),
(70, 3, 3500.00, 4500.00, 'No sorry we reject this application from the appeal process also', 6, 6, '2023-08-03 10:13:29', NULL, NULL),
(71, 2, 0.00, 0.00, 'sajaslas', 1, 0, '2023-08-03 10:16:00', NULL, NULL),
(72, 2, NULL, NULL, 'Application forwarded', 2, 2, '2023-08-03 10:16:27', NULL, NULL),
(73, 2, 60000.00, 59000.00, 'Application rejected', 3, 3, '2023-08-03 10:17:09', NULL, NULL),
(74, 2, 0.00, 0.00, 'sasasas', 1, 0, '2023-08-03 10:18:53', NULL, NULL),
(75, 2, NULL, NULL, 'Ok forwarded again Thsi application', 2, 2, '2023-08-03 10:19:12', NULL, NULL),
(76, 2, 60000.00, 59000.00, 'Application rejected', 3, 3, '2023-08-03 10:20:00', NULL, NULL),
(77, 2, 0.00, 0.00, 'Application has been asjaksj', 1, 0, '2023-08-03 10:21:12', NULL, NULL),
(78, 2, NULL, NULL, 'Application forwarded again to director dem', 2, 2, '2023-08-03 10:21:32', NULL, NULL),
(79, 2, 60000.00, 59000.00, 'This application has been forwarded to Aafddl spl sctyr', 3, 3, '2023-08-03 10:22:05', NULL, NULL),
(80, 2, 60000.00, 59000.00, 'Appluication rejected', 4, 4, '2023-08-03 10:23:24', NULL, NULL),
(81, 2, 0.00, 0.00, 'sasasa', 1, 0, '2023-08-03 10:24:25', NULL, NULL),
(82, 2, NULL, NULL, 'Forwarded This application', 2, 2, '2023-08-03 10:25:13', NULL, NULL),
(83, 2, 60000.00, 59000.00, 'This application is forwarded to apl', 3, 3, '2023-08-03 10:25:43', NULL, NULL),
(84, 2, 60000.00, 59000.00, 'Approved and forwarded to department secretory', 4, 4, '2023-08-03 10:26:09', NULL, NULL),
(86, 2, 60000.00, 59000.00, 'Application has been approved for sanction', 6, 6, '2023-08-03 11:03:30', NULL, NULL),
(87, 2, 59000.00, 0.00, 'No what we have given is enough', 6, 6, '2023-08-03 11:09:49', NULL, NULL),
(88, 4, 15000.00, 14000.00, 'Forwarded this application', 2, 2, '2023-08-03 11:21:35', NULL, NULL),
(89, 4, NULL, 14000.00, 'Approved and forwarding thsi applicatiuon to additional special secretory', 3, 3, '2023-08-03 11:22:57', NULL, NULL),
(90, 4, NULL, 14000.00, 'Approved and forwarded to department secretory', 4, 4, '2023-08-03 11:24:23', NULL, NULL),
(91, 4, NULL, 14000.00, 'Approved the application for sanction without any hinderences.', 6, 6, '2023-08-03 11:25:35', NULL, NULL),
(92, 5, 16000.00, 15000.00, 'This application has been forwarded tio the directir depom', 2, 2, '2023-08-03 11:28:12', NULL, NULL),
(93, 6, 15000.00, 14500.00, 'This application is also getting forwarded to the director DEPM', 2, 2, '2023-08-03 11:29:48', NULL, NULL),
(94, 5, NULL, 15000.00, 'The application has been forwarded', 3, 3, '2023-08-03 11:33:02', NULL, NULL),
(95, 7, 15600.00, 15000.00, 'Forwarded the application', 2, 2, '2023-08-03 11:41:04', NULL, NULL),
(96, 8, 4100.00, 3500.00, 'Forwarded the application', 2, 2, '2023-08-03 11:51:26', NULL, NULL),
(97, 9, 16200.00, 15000.00, 'Forwarded this applicatioon', 2, 2, '2023-08-03 11:52:04', NULL, NULL),
(98, 10, 16900.00, 16000.00, 'Forwarded this application', 2, 2, '2023-08-03 11:52:24', NULL, NULL),
(99, 6, NULL, 14500.00, 'Application rejected', 3, 3, '2023-08-03 11:53:21', NULL, NULL),
(100, 6, 0.00, 0.00, 'ok genuine person', 2, 0, '2023-08-03 11:54:02', NULL, NULL),
(101, 6, NULL, NULL, 'frowarded', 2, 2, '2023-08-03 11:54:41', NULL, NULL),
(102, 7, NULL, 15000.00, 'Verified and sent to addl spl', 3, 3, '2023-08-03 11:57:03', NULL, NULL),
(103, 9, 16200.00, 15000.00, 'Forwraded to addl spl scrty', 3, 3, '2023-08-03 11:57:19', NULL, NULL),
(104, 8, 4100.00, 3500.00, 'Also forwasedd to spl', 3, 3, '2023-08-03 11:57:50', NULL, NULL),
(105, 8, 4100.00, 3500.00, 'Approved and sendt to dept secretory for senction', 4, 4, '2023-08-03 11:58:35', NULL, NULL),
(106, 9, 16200.00, 15000.00, 'Forwarded the application to dept secretory', 4, 4, '2023-08-03 11:59:06', NULL, NULL),
(107, 8, 4100.00, 3500.00, 'Application approved for senction', 6, 6, '2023-08-03 12:02:35', NULL, NULL),
(108, 9, 16200.00, 15000.00, 'Application approved and ready to sanction', 6, 6, '2023-08-03 12:04:56', NULL, NULL),
(109, 7, NULL, 15000.00, 'Approved and sent to dept secrt', 4, 4, '2023-08-03 12:50:20', NULL, NULL),
(110, 14, 5550.00, 5500.00, 'Application has been forwarded to director depm.', 2, 2, '2023-08-04 04:55:32', NULL, NULL),
(111, 14, 5550.00, 5500.00, 'Application rejected', 3, 3, '2023-08-04 05:20:30', NULL, NULL),
(112, 14, 0.00, 0.00, 'Here, is my bank cheque.', 3, 0, '2023-08-04 05:35:33', NULL, NULL),
(113, 14, NULL, NULL, 'Application is again forwarding towards Director depm', 2, 2, '2023-08-04 05:36:39', NULL, NULL),
(114, 17, 31000.00, 30000.00, 'Forwarded this application to dircetor depm.', 2, 2, '2023-08-04 06:46:08', NULL, NULL),
(115, 17, 31000.00, 30000.00, 'Forwarded this applictaion to Additional special secretory', 3, 3, '2023-08-04 06:46:50', NULL, NULL),
(116, 17, 31000.00, 30000.00, 'Approved and forwarded this application to department secretory', 4, 4, '2023-08-04 06:47:46', NULL, NULL),
(117, 17, 31000.00, 30000.00, 'Application reljected and again', 6, 6, '2023-08-04 06:50:06', NULL, NULL),
(118, 17, 0.00, 0.00, 'Here is my banlk :cheque', 1, 0, '2023-08-04 06:50:59', NULL, NULL),
(119, 17, NULL, NULL, 'Ok forwarding aggain', 2, 2, '2023-08-04 06:51:41', NULL, NULL),
(120, 17, 31000.00, 30000.00, 'Ok application is forwarded to additional special secretory', 3, 3, '2023-08-04 06:54:20', NULL, NULL),
(121, 17, 31000.00, 30000.00, 'Application is rejected from addiational special secretory', 4, 4, '2023-08-04 06:54:58', NULL, NULL),
(122, 17, 0.00, 0.00, 'okas', 1, 0, '2023-08-04 06:59:30', NULL, NULL),
(123, 17, NULL, NULL, 'Okay forswarded again', 2, 2, '2023-08-04 06:59:54', NULL, NULL),
(124, 17, 31000.00, 30000.00, 'Ok now forwarding this application to addl spl sctrty', 3, 3, '2023-08-04 07:00:50', NULL, NULL),
(125, 17, 31000.00, 30000.00, 'Application approved and sent the application to department secretory', 4, 4, '2023-08-04 07:01:36', NULL, NULL),
(126, 17, 31000.00, 30000.00, 'Application approved for sanctions', 6, 6, '2023-08-04 07:02:39', NULL, NULL),
(127, 18, 22500.00, 22000.00, 'Forwarded this application to director depm', 2, 2, '2023-08-04 07:20:18', NULL, NULL),
(128, 18, 0.00, 0.00, 'Here i am the genuine user', 3, 0, '2023-08-04 07:37:40', NULL, NULL),
(129, 18, NULL, NULL, 'Ok forwarded the application to director depm', 2, 2, '2023-08-04 07:40:36', NULL, NULL),
(130, 18, 22500.00, 22000.00, 'Application approved and sent to addl spl sctry', 3, 3, '2023-08-04 09:06:20', NULL, NULL),
(131, 18, 22500.00, 22000.00, 'Application rejected', 4, 4, '2023-08-04 09:12:01', NULL, NULL),
(132, 18, 0.00, 0.00, 'Here is my bank cheque', 3, 0, '2023-08-04 09:13:05', NULL, NULL),
(133, 18, NULL, NULL, 'Ok application has been forwarded', 2, 2, '2023-08-04 09:13:56', NULL, NULL),
(134, 18, 22500.00, 22000.00, 'Application rejected from dirdepmsdsd', 3, 3, '2023-08-04 09:18:12', NULL, NULL),
(135, 18, 0.00, 0.00, 'Here is my plan tricket', 3, 0, '2023-08-04 09:19:07', NULL, NULL),
(136, 18, NULL, NULL, 'Application forwarded', 2, 2, '2023-08-04 09:19:22', NULL, NULL),
(137, 20, 15000.00, 14000.00, 'Application has been forwarded to director depm', 2, 2, '2023-08-04 09:42:33', NULL, NULL),
(138, 20, NULL, 14000.00, 'Application has been rejected by director depm', 3, 3, '2023-08-04 09:43:36', NULL, NULL),
(139, 20, 0.00, 0.00, 'Please, approve my application', 3, 0, '2023-08-04 09:44:36', NULL, NULL),
(140, 20, NULL, NULL, 'Application forwarded', 2, 2, '2023-08-04 09:45:07', NULL, NULL),
(141, 21, 5000.00, 4500.00, 'Application has been forwatrded', 2, 2, '2023-08-04 10:12:32', NULL, NULL),
(142, 21, 5000.00, 4500.00, 'Application has been rejected ,by dirdepm not approved', 3, 3, '2023-08-04 10:13:09', NULL, NULL),
(143, 21, 0.00, 0.00, 'Here is my bank cheque', 3, 0, '2023-08-04 10:13:37', NULL, NULL),
(144, 21, NULL, NULL, 'Appliction is ok now forwarding the application again to dir depm', 2, 2, '2023-08-04 10:14:05', NULL, NULL),
(145, 21, 5000.00, 4500.00, 'Application has been again forwarded', 3, 3, '2023-08-04 10:14:36', NULL, NULL),
(146, 21, 5000.00, 4500.00, 'Application rejected', 4, 4, '2023-08-04 10:16:21', NULL, NULL),
(147, 21, 0.00, 0.00, 'Ok submited my application again', 3, 0, '2023-08-04 10:16:43', NULL, NULL),
(148, 21, NULL, NULL, 'Application is forwarded', 2, 2, '2023-08-04 10:17:23', NULL, NULL),
(149, 21, 5000.00, 4500.00, 'Application rejected again', 3, 3, '2023-08-04 10:18:16', NULL, NULL),
(150, 21, 0.00, 0.00, 'Appliction resubmitted', 3, 0, '2023-08-04 10:18:38', NULL, NULL),
(151, 21, NULL, NULL, 'Application forwarded', 2, 2, '2023-08-04 10:18:52', NULL, NULL),
(152, 21, 5000.00, 4500.00, 'Application rejected', 3, 3, '2023-08-04 10:19:21', NULL, NULL),
(153, 21, 0.00, 0.00, 'Application resubbmitted for approval', 3, 0, '2023-08-04 10:45:29', NULL, NULL),
(154, 21, NULL, NULL, 'Applicaiuonsdkls', 2, 2, '2023-08-04 10:46:11', NULL, NULL),
(155, 21, 5000.00, 4500.00, 'rejected', 3, 3, '2023-08-04 10:46:39', NULL, NULL),
(156, 21, 0.00, 0.00, 'Here is my plane ticket', 3, 0, '2023-08-04 11:30:11', NULL, NULL),
(157, 21, NULL, NULL, 'Ok application is forwarded', 2, 2, '2023-08-04 11:31:02', NULL, NULL),
(158, 21, 5000.00, 4500.00, 'Ok forwarded again', 3, 3, '2023-08-04 11:31:47', NULL, NULL),
(159, 21, 5000.00, 4500.00, 'Application has been rejected', 4, 4, '2023-08-04 11:32:18', NULL, NULL),
(160, 21, 0.00, 0.00, 'Please, approve my application', 3, 0, '2023-08-04 12:00:56', NULL, NULL),
(161, 21, NULL, NULL, 'Application forwarded', 2, 2, '2023-08-04 12:08:24', NULL, NULL),
(162, 21, 5000.00, 4500.00, 'Application rejected', 3, 3, '2023-08-04 12:15:37', NULL, NULL),
(163, 21, 0.00, 0.00, 'Please, appove dthis application', 3, 0, '2023-08-04 12:22:13', NULL, NULL),
(164, 21, NULL, NULL, 'Aplication approved', 2, 2, '2023-08-04 12:22:43', NULL, NULL),
(165, 21, 5000.00, 4500.00, 'Application approved', 3, 3, '2023-08-04 12:25:07', NULL, NULL),
(166, 21, 5000.00, 4500.00, 'Application has been approved', 4, 4, '2023-08-04 12:25:45', NULL, NULL),
(167, 21, 5000.00, 4500.00, 'Application rejected', 6, 6, '2023-08-04 12:26:23', NULL, NULL),
(168, 21, 0.00, 0.00, 'Okay , providing my  plan ticket and bank cheque', 3, 0, '2023-08-04 12:31:14', NULL, NULL),
(169, 21, NULL, NULL, 'Ok aplication is approved', 2, 2, '2023-08-04 12:32:08', NULL, NULL),
(170, 21, 5000.00, 4500.00, 'Approved and forwarding this application', 3, 3, '2023-08-04 12:32:41', NULL, NULL),
(171, 21, 5000.00, 4500.00, 'Application approved and forwarded to department secretory', 4, 4, '2023-08-04 12:34:12', NULL, NULL),
(172, 21, 5000.00, 4500.00, 'Approved application', 6, 6, '2023-08-04 12:34:42', NULL, NULL),
(173, 21, 4500.00, 4800.00, 'Ok we have considered your amount', 6, 6, '2023-08-04 12:41:54', NULL, NULL);

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
(138, '2023_07_28_125633_create_tbl_applied_applications_table', 19),
(140, '2023_07_31_123618_add_one_column_in_tbl_applied_applications_table', 20),
(142, '2023_08_01_183546_add_column_travel_from_tbl_application_travel_details_table', 21),
(146, '2023_08_03_184712_add_column_senction_details_column_in_tbl_application_details_table', 22),
(147, '2023_08_03_185243_add_column_senction_details_column_in_tbl_application_files_details_table', 23);

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
(5, 'App\\Models\\User', 8, 'MyApp', '22fd4c8d0fb93d6cdd4f9a999e15661b8aab75506cf64c70e8f9ae763e0d9fc7', '[\"*\"]', '2023-07-28 07:00:16', '2023-07-28 06:58:23', '2023-07-28 07:00:16'),
(6, 'App\\Models\\User', 2, 'MyApp', '35f516a9d7287b62ab8d7d43025529958f90bb7aef8b22f7b3fb8a90e3075d1d', '[\"*\"]', '2023-08-01 03:58:46', '2023-07-31 12:08:01', '2023-08-01 03:58:46'),
(7, 'App\\Models\\User', 2, 'MyApp', '15b777d28af08c23d3431a93550234d5b244565d7d6818ea7a783ff8b64c24d5', '[\"*\"]', NULL, '2023-08-01 04:41:28', '2023-08-01 04:41:28'),
(8, 'App\\Models\\User', 2, 'MyApp', 'a11a2d8eb575d91bf349b56ac6f6873c956f3138a07472ac49e9f884ed8ce670', '[\"*\"]', '2023-08-01 04:42:11', '2023-08-01 04:41:54', '2023-08-01 04:42:11'),
(9, 'App\\Models\\User', 3, 'MyApp', '83d4b26c4dfcb9687ad470e9c42c52673914c1dbe75bbe91ac2d208570661b21', '[\"*\"]', '2023-08-01 04:42:33', '2023-08-01 04:42:23', '2023-08-01 04:42:33');

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
  `sanction_order_date` datetime DEFAULT NULL,
  `payment_released_date` datetime DEFAULT NULL,
  `payment_order_attachment` varchar(100) DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT 0 COMMENT 'Term agreed or not',
  `status` tinyint(4) NOT NULL,
  `appeal_facility` tinyint(4) DEFAULT 0 COMMENT '0 not approve, 1 Appeal can be done 2 appealed 3 Appeal approved 4 Appeal rejected',
  `created_by` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_exporter table',
  `updated_by` bigint(20) DEFAULT NULL COMMENT 'PK of user table',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_application_details`
--

INSERT INTO `tbl_application_details` (`id`, `app_no`, `app_count_no`, `scheme_id`, `exporter_id`, `meeting_details`, `participation_details`, `certi_type`, `certi_name`, `certi_iss_auth`, `certi_cost`, `certi_payment_reciept_file`, `sanction_order_date`, `payment_released_date`, `payment_order_attachment`, `confirmed`, `status`, `appeal_facility`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '082324RCMC00001', '00001', 1, 1, 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, 0, 8, 3, 1, 6, '2023-08-02 08:56:16', '2023-08-02 11:44:42', NULL),
(2, '082324RCMC00002', '00002', 2, 1, 'Details of B2B / B2C meeteing held', NULL, 'Registration cum Membership Certificate', 'Indian Jewellers Association Certificate', 'BIS Hallmark Standerds', 60000.00, 'PAYREC0ac2c0823certificate_payment-recipt.pdf', NULL, NULL, NULL, 0, 8, 4, 1, 6, '2023-08-03 08:33:38', '2023-08-03 11:09:49', NULL),
(3, '082324RCMC00003', '00003', 1, 1, 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, 0, 10, 4, 1, 6, '2023-08-03 08:52:10', '2023-08-03 10:13:29', NULL),
(4, '082324RCMC00004', '00004', 7, 2, 'Details of B2B / B2C meeteing held', NULL, 'Improvement of Quality', 'Indian Jewellers Association Certificate', 'BIS Hallmark Standerds', 15000.00, 'PAYREC6a4ce0823certificate_payment-recipt.pdf', NULL, NULL, NULL, 0, 8, 1, 2, 6, '2023-08-03 11:17:44', '2023-08-03 11:25:35', NULL),
(5, '082324RCMC00005', '00005', 7, 2, 'Details of B2B / B2C meeteing held', NULL, 'Upgradation of Technology', 'Indian Jewellers Association Certificate', 'BIS Hallmark Standerds', 16000.00, 'PAYRECb20a60823certificate_payment-recipt.pdf', NULL, NULL, NULL, 0, 4, 0, 2, 3, '2023-08-03 11:27:21', '2023-08-03 11:33:02', NULL),
(6, '082324RCMC00006', '00006', 6, 2, 'Details of B2B / B2C meeteing held', NULL, 'Testing Certification', 'Indian Jewellers Association Certificate', 'BIS Hallmark Standerds', 15000.00, 'PAYREC30bb00823certificate_payment-recipt.pdf', NULL, NULL, NULL, 0, 2, 0, 2, 2, '2023-08-03 11:29:04', '2023-08-03 11:54:41', NULL),
(7, '082324RCMC00007', '00007', 5, 2, 'Details of B2B / B2C meeteing held', NULL, 'Country Specific Quality Certification', 'Indian Jewellers Association Certificate', 'BIS Hallmark Standerds', 15600.00, 'PAYREC63c240823certificate_payment-recipt.pdf', NULL, NULL, NULL, 0, 6, 0, 2, 4, '2023-08-03 11:33:53', '2023-08-03 12:50:20', NULL),
(8, '082324RCMC00008', '00008', 1, 2, 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy a', 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy a', NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, 0, 8, 1, 2, 6, '2023-08-03 11:36:36', '2023-08-03 12:02:35', NULL),
(9, '082324RCMC00009', '00009', 2, 2, 'Details of B2B / B2C meeteing held', NULL, 'Registration cum Membership Certificate', 'Indian Jewellers Association Certificate', 'BIS Hallmark Standerds', 16200.00, 'PAYREC799ba0823certificate_payment-recipt.pdf', '2023-04-05 00:00:00', '2023-04-03 00:00:00', 'SANC_ORD9f8650823Commercial Appraisal Order.pdf', 0, 11, 1, 2, 6, '2023-08-03 11:42:32', '2023-08-03 13:39:47', NULL),
(10, '082324RCMC00010', '00010', 3, 2, 'Details of B2B / B2C meeteing held', NULL, 'Organic Certificate', 'Indian Jewellers Association Certificate', 'BIS Hallmark Standerds', 16900.00, 'PAYREC9d4320823certificate_payment-recipt.pdf', NULL, NULL, NULL, 0, 2, 0, 2, 2, '2023-08-03 11:42:56', '2023-08-03 11:52:24', NULL),
(11, '082324RCMC00011', '00011', 4, 2, 'Details of B2B / B2C meeteing held', NULL, 'Quality Certification for Manufacturing Process', 'Indian Jewellers Association Certificate', 'BIS Hallmark Standerds', 18000.00, 'PAYRECa18cc0823certificate_payment-recipt.pdf', NULL, NULL, NULL, 0, 1, 0, NULL, 0, '2023-08-03 11:47:47', NULL, NULL),
(12, '082324RCMC00012', '00012', 1, 2, 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, 0, 1, 0, NULL, 0, '2023-08-03 11:49:57', NULL, NULL),
(13, '082324RCMC00013', '00013', 5, 2, 'Details of B2B / B2C meeteing held', NULL, 'Country Specific Quality Certification', 'Indian Jewellers Association Certificate', 'BIS Hallmark Standerds', 1600.00, 'PAYREC280f20823certificate_payment-recipt.pdf', NULL, NULL, NULL, 0, 1, 0, NULL, 0, '2023-08-03 11:50:30', NULL, NULL),
(14, '082324RCMC00014', '00014', 1, 3, 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, 0, 2, 0, 3, 2, '2023-08-04 04:52:50', '2023-08-04 05:36:39', NULL),
(15, '082324RCMC00015', '00015', 1, 1, 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, 0, 1, 0, 1, NULL, '2023-08-04 06:04:52', NULL, NULL),
(16, '082324RCMC00016', '00016', 1, 1, 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.\r\nssssssssss', 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, 0, 1, 0, 1, NULL, '2023-08-04 06:10:14', NULL, NULL),
(17, '082324RCMC00017', '00017', 1, 1, 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', NULL, NULL, NULL, 0.00, NULL, '2023-08-05 00:00:00', '2023-08-06 00:00:00', 'SANC_ORDe15aa0823Commercial Appraisal Order.pdf', 0, 11, 1, 1, 6, '2023-08-04 06:45:25', '2023-08-04 07:06:13', NULL),
(18, '082324RCMC00018', '00018', 1, 3, 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, 0, 2, 0, 3, 2, '2023-08-04 07:15:11', '2023-08-04 09:19:22', NULL),
(19, '082324RCMC00019', '00019', 1, 3, 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, 0, 1, 0, 3, NULL, '2023-08-04 07:18:24', NULL, NULL),
(20, '082324RCMC00020', '00020', 3, 3, 'Details of B2B / B2C meeteing held', NULL, 'Organic Certificate', 'Indian Jewellers Association Certificate', 'BIS Hallmark Standerds', 15000.00, 'PAYRECd7f780823certificate_payment-recipt.pdf', NULL, NULL, NULL, 0, 2, 0, 3, 2, '2023-08-04 07:18:54', '2023-08-04 09:45:07', NULL),
(21, '082324RCMC00021', '00021', 1, 3, 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', 'I hereby certify that all the information mentioned here is true, and I take full responsibility for its accuracy and authenticity.', NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, 0, 8, 3, 3, 6, '2023-08-04 10:11:40', '2023-08-04 12:41:54', NULL);

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

--
-- Dumping data for table `tbl_application_event_details`
--

INSERT INTO `tbl_application_event_details` (`id`, `appl_id`, `details`, `event_type`, `other_event_type`, `participation_type`, `city`, `country_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Krishi Mela', 3, 'Other types of events', 1, 'Bhubaneswar', 105, 1, 1, NULL, '2023-08-02 08:56:16', NULL, NULL),
(2, 3, 'Krishi Mela', 2, 'Other types of events', 2, 'Cuttuck', 105, 1, 1, NULL, '2023-08-03 08:52:10', NULL, NULL),
(3, 8, 'Handloom Mela', 2, NULL, 1, 'Bhubaneswar', 105, 1, 2, NULL, '2023-08-03 11:36:36', NULL, NULL),
(4, 12, 'Handloom Mela', 2, NULL, 2, 'Bhubaneswar', 105, 1, 2, NULL, '2023-08-03 11:49:57', NULL, NULL),
(5, 14, 'Krishi Mela', 2, NULL, 1, 'Bhubaneswar', 105, 1, 3, NULL, '2023-08-04 04:52:50', NULL, NULL),
(6, 15, 'Krishi Mela', 2, NULL, 2, 'Bhubaneswar', 105, 1, 1, NULL, '2023-08-04 06:04:52', NULL, NULL),
(7, 16, 'Krishi Mela', 2, NULL, 2, 'Bhubaneswar', 105, 1, 1, NULL, '2023-08-04 06:10:14', NULL, NULL),
(8, 17, 'Gems Expo 2023', 1, NULL, 2, 'Bhubaneswar', 105, 1, 1, NULL, '2023-08-04 06:45:25', NULL, NULL),
(9, 18, 'Handloom Mela', 2, NULL, 2, 'Bhubaneswar', 105, 1, 3, NULL, '2023-08-04 07:15:11', NULL, NULL),
(10, 19, 'Handloom Mela', 3, 'Other types of events', 1, 'Bhubaneswar', 105, 1, 3, NULL, '2023-08-04 07:18:24', NULL, NULL),
(11, 21, 'Ananda Mela', 1, NULL, 2, 'Bhubaneswar', 105, 1, 3, NULL, '2023-08-04 10:11:40', NULL, NULL);

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
  `payment_order_attachment` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_by` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_exporter',
  `updated_by` bigint(20) DEFAULT NULL COMMENT 'PK of user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_application_files_details`
--

INSERT INTO `tbl_application_files_details` (`id`, `appl_id`, `iec_file`, `cancelled_cheque_file`, `file_visa`, `file_ticket`, `file_boarding_pass`, `stall_allot_letter`, `stall_reg_pay_recipt`, `certi_payment_reciept_file`, `tour_dairy`, `payment_order_attachment`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'IEC_d3ec70823IECNEW.pdf', 'BANK_CHEQUE_24f390823canceled-cheque.png', 'VISA_d2d3d0823SampleVisaInvitationletter.pdf', 'TICKET_e67910823train_ticket.jpeg', 'BOARDING_PASS_9f5b90823boarding_pass.jpg', 'STALL_ALLOTMENT_fea9e0823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_5d1690823stall_allotment_registration_payment.pdf', '', 'TOUR_DAIRY_8359d0823tour-dairy.jpeg', NULL, 1, 1, NULL, '2023-08-02 08:56:16', NULL, NULL),
(2, 2, 'IEC_84e200823IECNEW.pdf', 'BANK_CHEQUE_c93740823canceled-cheque.png', '', '', '', '', '', 'PAYREC0ac2c0823certificate_payment-recipt.pdf', '', NULL, 1, 1, NULL, '2023-08-03 08:33:38', NULL, NULL),
(3, 3, 'IEC_00f8d0823IECNEW.pdf', 'BANK_CHEQUE_264640823canceled-cheque.png', 'VISA_4e3b60823SampleVisaInvitationletter.pdf', 'TICKET_583170823train_ticket.jpeg', '', 'STALL_ALLOTMENT_8879e0823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_c07560823stall_allotment_registration_payment.pdf', '', 'TOUR_DAIRY_0d8d90823tour-dairy.jpeg', NULL, 1, 1, NULL, '2023-08-03 08:52:10', NULL, NULL),
(4, 4, 'IEC_965c40823IECNEW.pdf', 'BANK_CHEQUE_f5fe60823canceled-cheque.png', '', '', '', '', '', 'PAYREC6a4ce0823certificate_payment-recipt.pdf', '', NULL, 1, 2, NULL, '2023-08-03 11:17:44', NULL, NULL),
(5, 5, 'IEC_5459a0823IECNEW.pdf', 'BANK_CHEQUE_0f8ee0823canceled-cheque.png', '', '', '', '', '', 'PAYRECb20a60823certificate_payment-recipt.pdf', '', NULL, 1, 2, NULL, '2023-08-03 11:27:21', NULL, NULL),
(6, 6, 'IEC_2f4430823IECNEW.pdf', 'BANK_CHEQUE_154260823canceled-cheque.png', '', '', '', '', '', 'PAYREC30bb00823certificate_payment-recipt.pdf', '', NULL, 1, 2, NULL, '2023-08-03 11:29:04', NULL, NULL),
(7, 7, 'IEC_d77f90823IECNEW.pdf', 'BANK_CHEQUE_932420823canceled-cheque.png', '', '', '', '', '', 'PAYREC63c240823certificate_payment-recipt.pdf', '', NULL, 1, 2, NULL, '2023-08-03 11:33:54', NULL, NULL),
(8, 8, 'IEC_5ee400823IECNEW.pdf', 'BANK_CHEQUE_04c4e0823canceled-cheque.png', 'VISA_d794f0823SampleVisaInvitationletter.pdf', 'TICKET_028410823plane_ticket.jpg', 'BOARDING_PASS_f7b710823boarding_pass.jpg', 'STALL_ALLOTMENT_f89090823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_8db8f0823stall_allotment_registration_payment.pdf', '', 'TOUR_DAIRY_0b95c0823tour-dairy.jpeg', NULL, 1, 2, NULL, '2023-08-03 11:36:36', NULL, NULL),
(9, 9, 'IEC_ac3f70823IECNEW.pdf', 'BANK_CHEQUE_4ddcb0823canceled-cheque.png', '', '', '', '', '', 'PAYREC799ba0823certificate_payment-recipt.pdf', '', 'SANC_ORD9f8650823Commercial Appraisal Order.pdf', 1, 2, NULL, '2023-08-03 11:42:32', '2023-08-03 13:39:47', NULL),
(10, 10, 'IEC_d16380823IECNEW.pdf', 'BANK_CHEQUE_94d870823canceled-cheque.png', '', '', '', '', '', 'PAYREC9d4320823certificate_payment-recipt.pdf', '', NULL, 1, 2, NULL, '2023-08-03 11:42:56', NULL, NULL),
(11, 11, 'IEC_20b560823IECNEW.pdf', 'BANK_CHEQUE_ab8230823canceled-cheque.png', '', '', '', '', '', 'PAYRECa18cc0823certificate_payment-recipt.pdf', '', NULL, 1, 2, NULL, '2023-08-03 11:47:47', NULL, NULL),
(12, 12, 'IEC_4b06d0823IECNEW.pdf', 'BANK_CHEQUE_def740823canceled-cheque.png', 'VISA_8bcb70823SampleVisaInvitationletter.pdf', 'TICKET_f9d410823train_ticket.jpeg', 'BOARDING_PASS_c93110823boarding_pass.jpg', '', '', '', 'TOUR_DAIRY_75a9e0823tour-dairy.jpeg', NULL, 1, 2, NULL, '2023-08-03 11:49:57', NULL, NULL),
(13, 13, 'IEC_710420823IECNEW.pdf', 'BANK_CHEQUE_b5f3b0823canceled-cheque.png', '', '', '', '', '', 'PAYREC280f20823certificate_payment-recipt.pdf', '', NULL, 1, 2, NULL, '2023-08-03 11:50:30', NULL, NULL),
(14, 14, 'IEC_768370823IECNEW.pdf', 'BANK_CHEQUE_f1ffb0823canceled-cheque.png', '', 'TICKET_8d6560823train_ticket.jpeg', 'BOARDING_PASS_a97840823boarding_pass.jpg', 'STALL_ALLOTMENT_2a6e90823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_6fc360823stall_allotment_registration_payment.pdf', '', 'TOUR_DAIRY_b762b0823tour-dairy.jpeg', NULL, 1, 3, NULL, '2023-08-04 04:52:50', NULL, NULL),
(15, 15, 'IEC_7d1630823IECNEW.pdf', 'BANK_CHEQUE_596150823canceled-cheque.png', 'VISA_ba6320823SampleVisaInvitationletter.pdf', 'TICKET_ffc950823train_ticket.jpeg', 'BOARDING_PASS_7de590823boarding_pass.jpg', 'STALL_ALLOTMENT_a7b200823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_cdd5d0823stall_allotment_registration_payment.pdf', '', 'TOUR_DAIRY_11d810823tour-dairy.jpeg', NULL, 1, 1, NULL, '2023-08-04 06:04:52', NULL, NULL),
(16, 16, 'IEC_c76a70823IECNEW.pdf', 'BANK_CHEQUE_b90410823canceled-cheque.png', '', 'TICKET_f01060823train_ticket.jpeg', '', 'STALL_ALLOTMENT_202770823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_525910823stall_allotment_registration_payment.pdf', '', 'TOUR_DAIRY_b30990823tour-dairy.jpeg', NULL, 1, 1, NULL, '2023-08-04 06:10:14', NULL, NULL),
(17, 17, 'IEC_54e780823IECNEW.pdf', 'BANK_CHEQUE_20f370823canceled-cheque.png', '', 'TICKET_80e720823train_ticket.jpeg', '', 'STALL_ALLOTMENT_1d46d0823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_ba7810823stall_allotment_registration_payment.pdf', '', 'TOUR_DAIRY_78a3c0823tour-dairy.jpeg', 'SANC_ORDe15aa0823Commercial Appraisal Order.pdf', 1, 1, NULL, '2023-08-04 06:45:25', '2023-08-04 07:06:13', NULL),
(18, 18, 'IEC_fc7080823IECNEW.pdf', 'BANK_CHEQUE_aa62c0823canceled-cheque.png', '', 'TICKET_c7c700823train_ticket.jpeg', '', 'STALL_ALLOTMENT_7ec0d0823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_6b8f20823stall_allotment_registration_payment.pdf', '', 'TOUR_DAIRY_2e1d20823tour-dairy.jpeg', NULL, 1, 3, NULL, '2023-08-04 07:15:11', NULL, NULL),
(19, 19, 'IEC_918200823IECNEW.pdf', 'BANK_CHEQUE_a4cdc0823canceled-cheque.png', 'VISA_d6f320823SampleVisaInvitationletter.pdf', 'TICKET_7649f0823train_ticket.jpeg', 'BOARDING_PASS_ace120823boarding_pass.jpg', 'STALL_ALLOTMENT_185950823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_325890823stall_allotment_registration_payment.pdf', '', 'TOUR_DAIRY_267e60823tour-dairy.jpeg', NULL, 1, 3, NULL, '2023-08-04 07:18:24', NULL, NULL),
(20, 20, 'IEC_d60890823IECNEW.pdf', 'BANK_CHEQUE_1c7c50823canceled-cheque.png', '', '', '', '', '', 'PAYRECd7f780823certificate_payment-recipt.pdf', '', NULL, 1, 3, NULL, '2023-08-04 07:18:54', NULL, NULL),
(21, 21, 'IEC_54a800823IECNEW.pdf', 'BANK_CHEQUE_27c880823canceled-cheque.png', '', 'TICKET_f5c5c0823train_ticket.jpeg', '', 'STALL_ALLOTMENT_e9e970823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_fabfd0823stall_allotment_registration_payment.pdf', '', 'TOUR_DAIRY_a09770823tour-dairy.jpeg', NULL, 1, 3, NULL, '2023-08-04 10:11:40', NULL, NULL);

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

--
-- Dumping data for table `tbl_application_log`
--

INSERT INTO `tbl_application_log` (`id`, `appl_id`, `from_user_type`, `from_user`, `to_user_type`, `to_user`, `status`, `remarks`, `updated_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 2, 2, 1, '', '2023-08-02 14:26:16', '2023-08-02 08:56:16', NULL, NULL),
(2, 1, 1, 2, 2, NULL, 1, 'Forwarded to directir depm', '2023-08-02 14:31:17', '2023-08-02 09:01:17', NULL, NULL),
(3, 1, 1, 2, 2, NULL, 1, 'Forwading again to directir dem', '2023-08-02 15:01:25', '2023-08-02 09:31:25', NULL, NULL),
(4, 1, 1, 2, 2, NULL, 1, 'Forwarding again', '2023-08-02 15:13:51', '2023-08-02 09:43:51', NULL, NULL),
(5, 1, 1, 2, 2, NULL, 1, 'Forwarded the application again', '2023-08-02 15:53:46', '2023-08-02 10:23:46', NULL, NULL),
(6, 1, 1, 2, 2, NULL, 1, 'Forwarded for the last time', '2023-08-02 16:23:47', '2023-08-02 10:53:47', NULL, NULL);

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

--
-- Dumping data for table `tbl_application_stall_details`
--

INSERT INTO `tbl_application_stall_details` (`id`, `appl_id`, `event_id`, `total_cost`, `claimed_cost`, `stall_allot_letter`, `stall_reg_pay_recipt`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 3000.00, 2500.00, 'STALL_ALLOTMENT_fea9e0823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_5d1690823stall_allotment_registration_payment.pdf', 1, NULL, '2023-08-02 08:56:16', NULL, NULL),
(2, 3, 1, 2500.00, 2000.00, 'STALL_ALLOTMENT_8879e0823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_c07560823stall_allotment_registration_payment.pdf', 1, NULL, '2023-08-03 08:52:10', NULL, NULL),
(3, 8, 1, 1300.00, 1200.00, 'STALL_ALLOTMENT_f89090823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_8db8f0823stall_allotment_registration_payment.pdf', 2, NULL, '2023-08-03 11:36:36', NULL, NULL),
(4, 14, 1, 2500.00, 2000.00, 'STALL_ALLOTMENT_2a6e90823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_6fc360823stall_allotment_registration_payment.pdf', 3, NULL, '2023-08-04 04:52:50', NULL, NULL),
(5, 15, 1, 15900.00, 14900.00, 'STALL_ALLOTMENT_a7b200823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_cdd5d0823stall_allotment_registration_payment.pdf', 1, NULL, '2023-08-04 06:04:52', NULL, NULL),
(6, 16, 1, 16000.00, 15000.00, 'STALL_ALLOTMENT_202770823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_525910823stall_allotment_registration_payment.pdf', 1, NULL, '2023-08-04 06:10:14', NULL, NULL),
(7, 17, 1, 16000.00, 15000.00, 'STALL_ALLOTMENT_1d46d0823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_ba7810823stall_allotment_registration_payment.pdf', 1, NULL, '2023-08-04 06:45:25', NULL, NULL),
(8, 18, 1, 1500.00, 1600.00, 'STALL_ALLOTMENT_7ec0d0823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_6b8f20823stall_allotment_registration_payment.pdf', 3, NULL, '2023-08-04 07:15:11', NULL, NULL),
(9, 19, 1, 21000.00, 20000.00, 'STALL_ALLOTMENT_185950823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_325890823stall_allotment_registration_payment.pdf', 3, NULL, '2023-08-04 07:18:24', NULL, NULL),
(10, 21, 1, 1600.00, 1500.00, 'STALL_ALLOTMENT_e9e970823stall_allotment_form.pdf', 'STALL_PAY_RECIEPT_fabfd0823stall_allotment_registration_payment.pdf', 3, NULL, '2023-08-04 10:11:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_travel_details`
--

CREATE TABLE `tbl_application_travel_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appl_id` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_application_details',
  `destination_type` tinyint(4) DEFAULT NULL COMMENT 'Travel destination type 1: within india, 2: Outside India, so on',
  `traveller_name` varchar(100) DEFAULT NULL COMMENT 'Traveller name',
  `travel_from` varchar(100) DEFAULT NULL COMMENT 'Travel from ',
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

--
-- Dumping data for table `tbl_application_travel_details`
--

INSERT INTO `tbl_application_travel_details` (`id`, `appl_id`, `destination_type`, `traveller_name`, `travel_from`, `designation`, `mode_of_travel`, `class_of_travel`, `total_expense`, `incentive_claimed`, `file_visa`, `file_ticket`, `file_boarding_pass`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 'Suman Kumar', 'Cuttack', 'Bhubas', 2, '2AC', 1000.000, 500.000, 'VISA_e57f70823SampleVisaInvitationletter.pdf', 'TICKET_24cb10823train_ticket.jpeg', '', 1, 1, NULL, '2023-08-02 08:56:16', NULL, NULL),
(2, 1, 1, 'Prakash Thakur', 'Kolkata', 'Jaipur', 1, 'Economy', 2000.000, 1500.000, '', 'TICKET_42e910823plane_ticket.jpg', 'BOARDING_PASS_9f5b90823boarding_pass.jpg', 1, 1, NULL, '2023-08-02 08:56:16', NULL, NULL),
(3, 1, 2, 'Pulok Debnath', 'Kolkata', 'Delhi', 2, '3RD AC', 3000.000, 2500.000, 'VISA_d2d3d0823SampleVisaInvitationletter.pdf', 'TICKET_e67910823train_ticket.jpeg', '', 1, 1, NULL, '2023-08-02 08:56:16', NULL, NULL),
(4, 3, 2, 'Suman Kumar', 'Cuttack', 'Bhubas', 2, 'Economy', 1500.000, 1000.000, 'VISA_4e3b60823SampleVisaInvitationletter.pdf', 'TICKET_583170823train_ticket.jpeg', '', 1, 1, NULL, '2023-08-03 08:52:10', NULL, NULL),
(5, 8, 1, 'Suman Kumar', 'Cuttack', 'Bhubas', 1, 'Economy', 1200.000, 1000.000, '', 'TICKET_75b9d0823plane_ticket.jpg', 'BOARDING_PASS_6122e0823boarding_pass.jpg', 1, 2, NULL, '2023-08-03 11:36:36', NULL, NULL),
(6, 8, 2, 'Prakash Thakur', 'kolkata', 'kochi', 1, 'Economy', 1600.000, 1500.000, 'VISA_d794f0823SampleVisaInvitationletter.pdf', 'TICKET_028410823plane_ticket.jpg', 'BOARDING_PASS_f7b710823boarding_pass.jpg', 1, 2, NULL, '2023-08-03 11:36:36', NULL, NULL),
(7, 12, 2, 'Suman Kumar', 'Cuttack', 'Bhubas', 1, 'Economy', 15000.000, 14900.000, 'VISA_8bcb70823SampleVisaInvitationletter.pdf', 'TICKET_9c7160823plane_ticket.jpg', 'BOARDING_PASS_c93110823boarding_pass.jpg', 1, 2, NULL, '2023-08-03 11:49:57', NULL, NULL),
(8, 12, 1, 'Prakash Thakur', 'kolkata', 'kochi', 2, '3RD AC', 1600.000, 1500.000, '', 'TICKET_f9d410823train_ticket.jpeg', '', 1, 2, NULL, '2023-08-03 11:49:57', NULL, NULL),
(9, 14, 1, 'Suman Kumar', 'Cuttack', 'Bhubaneswar', 1, 'Economy', 1500.000, 1400.000, '', 'TICKET_e7dd50823plane_ticket.jpg', 'BOARDING_PASS_a97840823boarding_pass.jpg', 1, 3, NULL, '2023-08-04 04:52:50', NULL, NULL),
(10, 14, 1, 'Suman Kumar', 'Bhubaneswar', 'Kalinga Hospital square', 2, 'Sleeper', 1550.000, 1450.000, '', 'TICKET_8d6560823train_ticket.jpeg', '', 1, 3, NULL, '2023-08-04 04:52:50', NULL, NULL),
(11, 15, 2, 'Suman Kumar', 'New york', 'Delhi', 1, 'Economy', 16000.000, 15000.000, 'VISA_ba6320823SampleVisaInvitationletter.pdf', 'TICKET_b24420823plane_ticket.jpg', 'BOARDING_PASS_7de590823boarding_pass.jpg', 1, 1, NULL, '2023-08-04 06:04:52', NULL, NULL),
(12, 15, 1, 'Suman Kumar', 'Delhi', 'Bhubaneswar', 2, '2ND AC', 1500.000, 1400.000, '', 'TICKET_ffc950823train_ticket.jpeg', '', 1, 1, NULL, '2023-08-04 06:04:52', NULL, NULL),
(13, 16, 1, 'Suman Kumar', 'Cuttack', 'Bhubaneswar', 2, '2AC', 15000.000, 14000.000, '', 'TICKET_f01060823train_ticket.jpeg', '', 1, 1, NULL, '2023-08-04 06:10:14', NULL, NULL),
(14, 17, 1, 'Suman Kumar', 'Cuttack', 'Bhubaneswar', 2, '2AC', 15000.000, 14500.000, '', 'TICKET_80e720823train_ticket.jpeg', '', 1, 1, NULL, '2023-08-04 06:45:25', NULL, NULL),
(15, 18, 1, 'Suman Kumar', 'Cuttack', 'Bhubaneswar', 2, '2AC', 21000.000, 20000.000, '', 'TICKET_c7c700823train_ticket.jpeg', '', 1, 3, NULL, '2023-08-04 07:15:11', NULL, NULL),
(16, 19, 2, 'Suman Kumar', 'New york', 'Delhi', 1, 'Economy', 15000.000, 14500.000, 'VISA_d6f320823SampleVisaInvitationletter.pdf', 'TICKET_f83720823plane_ticket.jpg', 'BOARDING_PASS_ace120823boarding_pass.jpg', 1, 3, NULL, '2023-08-04 07:18:24', NULL, NULL),
(17, 19, 1, 'Suman Kumar', 'Delhi', 'Bhubaneswar', 2, '2ND AC', 16000.000, 15000.000, '', 'TICKET_7649f0823train_ticket.jpeg', '', 1, 3, NULL, '2023-08-04 07:18:24', NULL, NULL),
(18, 21, 1, 'Manjunath Prabhakar', 'Chennei', 'Vizag', 2, '2AC', 1600.000, 1500.000, '', 'TICKET_a94620823train_ticket.jpeg', '', 1, 3, NULL, '2023-08-04 10:11:40', NULL, NULL),
(19, 21, 1, 'Manjunath Prabhakar', 'Vizag', 'Bhubaneswar', 2, 'Sleeper', 1800.000, 1700.000, '', 'TICKET_f5c5c0823train_ticket.jpeg', '', 1, 3, NULL, '2023-08-04 10:11:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applied_applications`
--

CREATE TABLE `tbl_applied_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appl_id` bigint(20) DEFAULT NULL COMMENT 'PK of tbl_application_details',
  `description` longtext DEFAULT NULL COMMENT 'Appeal description',
  `order_file_name` varchar(100) DEFAULT NULL COMMENT 'Order file name',
  `appealed_amount` decimal(10,2) DEFAULT 0.00 COMMENT 'Final amount given by department secretory.',
  `confirmed` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 pending 1 approve 2 rejected',
  `created_by` bigint(20) DEFAULT NULL COMMENT 'PK of Exporter table',
  `updated_by` bigint(20) DEFAULT NULL COMMENT 'PK of Users table',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_applied_applications`
--

INSERT INTO `tbl_applied_applications` (`id`, `appl_id`, `description`, `order_file_name`, `appealed_amount`, `confirmed`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Please, raised my amount upto 8500', 'ORDERd8d670823train_ticket.jpeg', 8500.00, 1, 1, NULL, '2023-08-02 11:28:43', '2023-08-02 11:44:42', NULL),
(2, 3, 'Please, pay attension to my application and try to approve this application as i need this money on an urgent basis..', 'ORDER2b4da0823canceled-cheque.png', 4500.00, 2, 1, NULL, '2023-08-03 10:08:00', '2023-08-03 10:13:29', NULL),
(5, 2, 'I need some more money please raise the amount', 'ORDER180f50823plane_ticket.jpg', 0.00, 2, 1, NULL, '2023-08-03 11:05:48', '2023-08-03 11:09:49', NULL),
(6, 21, 'Please, raise this amount to 4800', 'ORDER5e0070823Commercial Appraisal Order.pdf', 4800.00, 1, 3, NULL, '2023-08-04 12:40:58', '2023-08-04 12:41:54', NULL);

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

--
-- Dumping data for table `tbl_complaince`
--

INSERT INTO `tbl_complaince` (`id`, `occurence`, `appl_id`, `exporter_id`, `user_id`, `section_type`, `description`, `file_name`, `exporters_remarks`, `insert_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, 1, 'IEC File', 'COMP_554d80823IECNEW.pdf', 'Here is the bank cheque and iec file', 0, 1, 0, '2023-08-02 09:29:57', '2023-08-02 09:31:25', NULL),
(2, 1, 1, 1, 1, 2, 'Cheque', 'COMP_078ab0823canceled-cheque.png', 'Here is the bank cheque and iec file', 0, 1, 0, '2023-08-02 09:29:57', '2023-08-02 09:31:25', NULL),
(3, 2, 1, 1, 1, NULL, NULL, NULL, 'Plesae, verify once again i have not giving any documents', 0, 1, 0, '2023-08-02 09:43:07', NULL, NULL),
(4, 2, 1, 1, 1, 2, 'Bank cheque', 'COMP_2b1680823canceled-cheque.png', 'Here is my latest bank cheque', 0, 1, 0, '2023-08-02 10:23:16', '2023-08-02 10:23:46', NULL),
(5, 2, 1, 1, 1, 4, 'Plain ticket', 'COMP_991070823plane_ticket.jpg', 'Here is my plan ticket', 0, 1, 0, '2023-08-02 10:53:26', '2023-08-02 10:53:47', NULL),
(6, 2, 1, 1, 1, 6, 'Tour Dairy', 'COMP_048300823tour-dairy.jpeg', 'Here is my plan ticket', 0, 1, 0, '2023-08-02 10:53:26', '2023-08-02 10:53:47', NULL),
(7, 2, 1, 1, 1, 1, 'IEC file', 'COMP_1e0d00823IECNEW.pdf', 'Here is my plan ticket', 0, 1, 0, '2023-08-02 10:53:26', '2023-08-02 10:53:47', NULL),
(8, 1, 3, 1, 1, NULL, NULL, NULL, 'I am genuine', 0, 1, 0, '2023-08-03 09:12:50', NULL, NULL),
(9, 2, 3, 1, 1, 2, 'latest Bank cheque', 'COMP_82f360823canceled-cheque.png', 'Okay i have uploaded my files', 0, 1, 0, '2023-08-03 09:16:53', '2023-08-03 09:17:24', NULL),
(10, 1, 2, 1, 1, 4, 'Plane ticket', 'COMP_d0ffc0823plane_ticket.jpg', 'Here, is my plan ticket', 0, 1, 0, '2023-08-03 09:25:25', '2023-08-03 09:26:23', NULL),
(11, 1, 2, 1, 1, 2, 'Cheque is invalid again', 'COMP_705500823canceled-cheque.png', 'Here, is my plan ticket', 0, 1, 0, '2023-08-03 09:25:25', '2023-08-03 09:26:23', NULL),
(12, 2, 3, 1, 1, 2, 'latest Bank cheque', 'COMP_b66ab0823canceled-cheque.png', 'This is my latest bank cheque', 0, 1, 0, '2023-08-03 09:37:05', '2023-08-03 09:38:14', NULL),
(13, 2, 3, 1, 1, 6, 'Tour Dairy', 'COMP_702c80823tour-dairy.jpeg', 'This is my latest bank cheque', 0, 1, 0, '2023-08-03 09:37:05', '2023-08-03 09:38:14', NULL),
(14, 2, 3, 1, 1, NULL, NULL, NULL, 'asajs', 0, 1, 0, '2023-08-03 09:45:04', NULL, NULL),
(15, 2, 3, 1, 1, NULL, NULL, NULL, 'aajhk', 0, 1, 0, '2023-08-03 09:48:54', NULL, NULL),
(16, 2, 3, 1, 1, 2, 'latest Bank cheque', 'COMP_5d95b0823canceled-cheque.png', 'My bank cheque', 0, 1, 0, '2023-08-03 09:53:51', '2023-08-03 09:54:31', NULL),
(17, 2, 3, 1, 1, NULL, NULL, NULL, 'sas', 0, 1, 0, '2023-08-03 09:57:09', NULL, NULL),
(18, 2, 3, 1, 1, NULL, NULL, NULL, 'asbhhasasgahsgasgaj', 0, 1, 0, '2023-08-03 10:00:08', NULL, NULL),
(19, 2, 2, 1, 1, NULL, NULL, NULL, 'sajaslas', 0, 1, 0, '2023-08-03 10:16:00', NULL, NULL),
(20, 2, 2, 1, 1, NULL, NULL, NULL, 'sasasas', 0, 1, 0, '2023-08-03 10:18:53', NULL, NULL),
(21, 2, 2, 1, 1, NULL, NULL, NULL, 'Application has been asjaksj', 0, 1, 0, '2023-08-03 10:21:12', NULL, NULL),
(22, 2, 2, 1, 1, NULL, NULL, NULL, 'sasasa', 0, 1, 0, '2023-08-03 10:24:25', NULL, NULL),
(23, 1, 6, 2, 2, NULL, NULL, NULL, 'ok genuine person', 0, 2, 0, '2023-08-03 11:54:02', NULL, NULL),
(24, 1, 14, 3, 3, 2, 'latest Bank cheque', 'COMP_38f3a0823canceled-cheque.png', 'Here, is my bank cheque.', 0, 3, 0, '2023-08-04 05:35:33', '2023-08-04 05:36:39', NULL),
(25, 1, 17, 1, 1, 2, 'Cancelled cheque', 'COMP_1d6900823canceled-cheque.png', 'Here is my banlk :cheque', 0, 1, 0, '2023-08-04 06:50:59', '2023-08-04 06:51:41', NULL),
(26, 2, 17, 1, 1, NULL, NULL, NULL, 'okas', 0, 1, 0, '2023-08-04 06:59:30', NULL, NULL),
(27, 1, 18, 3, 3, NULL, NULL, NULL, 'Here i am the genuine user', 0, 3, 0, '2023-08-04 07:37:40', NULL, NULL),
(28, 2, 18, 3, 3, 2, 'Cancelled cheque', 'COMP_ad00b0823canceled-cheque.png', 'Here is my bank cheque', 0, 3, 0, '2023-08-04 09:13:05', '2023-08-04 09:13:56', NULL),
(29, 2, 18, 3, 3, 4, 'Plain ticket', 'COMP_c599d0823plane_ticket.jpg', 'Here is my plan tricket', 0, 3, 0, '2023-08-04 09:19:07', '2023-08-04 09:19:22', NULL),
(30, 1, 20, 3, 3, 4, 'Plane ticket', 'COMP_748890823plane_ticket.jpg', 'Please, approve my application', 0, 3, 0, '2023-08-04 09:44:36', '2023-08-04 09:45:07', NULL),
(31, 1, 21, 3, 3, NULL, NULL, NULL, 'Here is my bank cheque', 0, 3, 0, '2023-08-04 10:13:37', NULL, NULL),
(32, 2, 21, 3, 3, NULL, NULL, NULL, 'Ok submited my application again', 0, 3, 0, '2023-08-04 10:16:43', NULL, NULL),
(33, 2, 21, 3, 3, NULL, NULL, NULL, 'Appliction resubmitted', 0, 3, 0, '2023-08-04 10:18:38', NULL, NULL),
(34, 2, 21, 3, 3, NULL, NULL, NULL, 'Application resubbmitted for approval', 0, 3, 0, '2023-08-04 10:45:29', NULL, NULL),
(35, 2, 21, 3, 3, 4, 'IEC file Is invalid', 'COMP_378580823IECNEW.pdf', 'Here is my plane ticket', 0, 3, 0, '2023-08-04 11:30:11', '2023-08-04 11:31:02', NULL),
(36, 2, 21, 3, 3, NULL, NULL, NULL, 'Please, approve my application', 0, 3, 0, '2023-08-04 12:00:56', NULL, NULL),
(37, 2, 21, 3, 3, NULL, NULL, NULL, 'Please, appove dthis application', 0, 3, 0, '2023-08-04 12:22:13', NULL, NULL),
(38, 2, 21, 3, 3, 2, 'latest Bank cheque', 'COMP_f29330823canceled-cheque.png', 'Okay , providing my  plan ticket and bank cheque', 0, 3, 0, '2023-08-04 12:31:14', '2023-08-04 12:32:08', NULL),
(39, 2, 21, 3, 3, 4, 'Plane Ticket', 'COMP_b25740823plane_ticket.jpg', 'Okay , providing my  plan ticket and bank cheque', 0, 3, 0, '2023-08-04 12:31:14', '2023-08-04 12:32:08', NULL);

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

--
-- Dumping data for table `tbl_exporters`
--

INSERT INTO `tbl_exporters` (`id`, `app_no`, `app_count_no`, `type`, `role_id`, `category_id`, `name`, `chief_ex_name`, `email`, `username`, `password`, `phone`, `gender`, `address_id`, `bank_id`, `other_code_id`, `regsitration_status`, `is_email_verified`, `track_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'EXPREG2324070001', '0001', 1, 6, 10, 'Paras Jewellers Co', 'Sohan patel', 'parasjewellers@yahoo.co.in', 'paras717353', '$2y$10$S03L67ySfjH1up5zSNOeIePrCozxRb9PeDxQYxGt9ULISW/ILxTOK', '8963330300', NULL, 1, 1, 1, 0, 0, 0, 1, NULL, '2023-07-29 04:50:26', '2023-07-29 04:50:26', NULL),
(2, 'EXPREG2324070002', '0002', 0, 6, 3, 'Shiba Traders Pvt Ltd', 'Shibabrata Hota', 'sibabrata1988@gmail.com', 'shiba162074', '$2y$10$hOBzNr/xUslhn1v0wkEFvuzwske9PDKQIppcGiPVuD/.T8OA5vGuS', '7846833771', NULL, 1, 1, 1, 0, 0, 1, 2, NULL, '2023-07-29 10:15:50', '2023-07-29 10:18:04', NULL),
(3, 'EXPREG23240800003', '00003', 1, 6, 6, 'Kumar Vastralaya Pvt Ltd', 'Sourabh Kumar', 'kumarvastralaya@mail.com', 'kumar443522', '$2y$10$ZYepDb7EXwb8E/M2WIQb3OL5BgLUBwn6BA0YnjdK1H/yU2JkhMAGO', '8968885454', NULL, 1, 1, 1, 0, 0, 0, 3, NULL, '2023-08-04 04:48:35', '2023-08-04 04:48:36', NULL);

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

--
-- Dumping data for table `tbl_exporter_address`
--

INSERT INTO `tbl_exporter_address` (`id`, `exporter_id`, `address`, `post`, `city`, `district`, `pincode`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '14th cross road', 'Khandagiri', 'Bhubaneswar', 19, '751120', 0, 1, NULL, '2023-07-29 04:50:26', NULL, NULL),
(2, 1, 'Nalco Square', 'kalinga hospital square', 'Bhubaneswar', 19, '754410', 0, 1, NULL, '2023-07-29 04:50:26', NULL, NULL),
(3, 2, 'M/33, Samantha Vihar', 'Chandrasekharpur', 'Bhubaneswar', 19, '751100', 0, 2, NULL, '2023-07-29 10:15:50', NULL, NULL),
(4, 3, 'Patia', 'Patia', 'Bhubaneswar', 19, '754111', 0, 3, NULL, '2023-08-04 04:48:35', NULL, NULL),
(5, 3, 'Bhadrak', 'Bhadrak', 'Cuttack', 7, '754411', 0, 3, NULL, '2023-08-04 04:48:35', NULL, NULL);

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

--
-- Dumping data for table `tbl_exporter_bank_details`
--

INSERT INTO `tbl_exporter_bank_details` (`id`, `exporter_id`, `name`, `account_no`, `ifsc`, `cheque_img`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Axis Bank', '8889965652566', 'AXIS845785', 'canceled-cheque.png', 0, 1, NULL, '2023-07-29 04:50:26', NULL, NULL),
(2, 2, 'HDFC Bank', '8968965252565', 'HDFC001256', 'canceled-cheque.png', 0, 2, NULL, '2023-07-29 10:15:50', NULL, NULL),
(3, 3, 'State Bank of India', '89652654785', 'SBIN0016777', 'canceled-cheque.png', 0, 3, NULL, '2023-08-04 04:48:36', NULL, NULL);

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

--
-- Dumping data for table `tbl_exporter_other_code`
--

INSERT INTO `tbl_exporter_other_code` (`id`, `exporter_id`, `iec`, `rcmc`, `epc`, `urn`, `hsm`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'IEC123456', '88896565656', 'EPC PARAS LTD', 'URN8989555', 'HSM789789', 0, 1, NULL, '2023-07-29 04:50:26', NULL, NULL),
(2, 2, 'IEC123456', '89689685652', 'MSME Dept', 'URN12345673', 'HSM12345678', 0, 2, NULL, '2023-07-29 10:15:50', NULL, NULL),
(3, 3, 'IEC123456', '7849685669556', 'EPC Pvt Ltd', 'URN8989555', 'HSM12345678', 0, 3, NULL, '2023-08-04 04:48:36', NULL, NULL);

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
(1, NULL, 'exporter.application.annexure1', 'Financial support for Participating in International Trade Fair /Event', 'Financial support for Participating in International Trade Fair /Event', 'fas fa-calendar', '#ff3737', 10000.00, 1, NULL, NULL, NULL, '2023-07-15 00:29:03', NULL),
(2, NULL, 'exporter.application.annexure2', 'Reimbursement of RCMC Fee / Charges', 'Reimbursement of RCMC Fee / Charges', 'fas fa-calendar', '#127efa', 10000.00, 1, NULL, NULL, NULL, '2023-07-15 00:29:25', NULL),
(3, NULL, 'exporter.application.annexure2', 'One-time reimbursement for obtaining organic certification, quality certification@ 50% of the total outlay subject to a ceiling of Rs.10 lakh.', 'Reimbursement for obtaining Organic Certification', 'fas fa-calendar', '#f36507', 12000.00, 1, NULL, NULL, NULL, '2023-07-15 00:29:57', NULL),
(4, NULL, 'exporter.application.annexure2', 'One-time reimbursement of S0X» of the cost incurred in obtaining  quality  certification for manufacturing processes or any other certification for  export  (compulsory  markings  such  as Conformity  European  (CE),  China Compulsory  Certificates  (CCC) ,  issued  by any  Government agency or any agency authorized by Central or Government of Odisha, subject to a ceiling of Rs. 50,000/-.', 'Reimbursement for obtaining Quality Certification for Manufacturing Process', 'fas fa-calendar', '#379343', 12000.00, 1, NULL, NULL, NULL, '2023-07-15 00:30:12', NULL),
(5, NULL, 'exporter.application.annexure2', 'Reimbursement  of  cost  incurred  by  an  exporter  for  first  3  years  towards  country  specific  Certification  &  Quality  Standards  for  a new product/  value  added  product,  exported  to  a  virgin  market  @  SOP  of  the  cost  incurred  towards  certification  subject  to  a  ceiling  of Rs.10,000/- per export shipment.', 'Reimbursement for obtaining Country Specific Quality Certification', 'fas fa-calendar', '#79740f', 12000.00, 1, NULL, NULL, NULL, '2023-07-15 00:32:02', NULL),
(6, NULL, 'exporter.application.annexure2', 'Reimbursement for obtaining testing certification @ 0% of the total cost subject to ceiling of Rs.10, 000 /- per export shipment.', 'Reimbursement for obtaining Testing Certification', 'fas fa-calendar', '#75088b', 12000.00, 1, NULL, NULL, NULL, '2023-07-15 00:32:31', NULL),
(7, NULL, 'exporter.application.annexure2', 'One-time reimbursement  of SOP of the total cost incurred subject to ceiling of Rs.5 lakh to acquire advanced technology aimed at improving product Standards / marketability  from state institutes  like OUAT, CIFT, CIFA and premier national institutions  such as IIS, NID, IIT, NIT and CSIR to improve product quality standards for international market acceptance.', 'One Time Reimbursement for Improvement of Quality / Upgradation of Technology', 'fas fa-calendar', '#244368', 12000.00, 1, NULL, NULL, NULL, '2023-07-15 00:32:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scheme_master_bkp`
--

CREATE TABLE `tbl_scheme_master_bkp` (
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
-- Dumping data for table `tbl_scheme_master_bkp`
--

INSERT INTO `tbl_scheme_master_bkp` (`id`, `code`, `route_name`, `long_name`, `short_name`, `logo`, `color`, `amount`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
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
(2, 2, 2, 'Pradeep Kumar', 'Mohanty', 'prabhashbhattacharya1991@gmail.com', NULL, 'sodepm', '$2y$10$u3ylYsIkKGThiNo0IW.r/efmc/yYYcnaKlklMQ0MGNjYfS2g5BRI.', '9668271360', 0, NULL, NULL, '2023-07-29 09:59:57', NULL),
(3, 3, 2, 'Dilip Kumar', 'Sahoo', 'dipeshmishro1887@gmail.com', NULL, 'dirdepm', '$2y$10$ly4JAUjcfZKEyI8mR92moeaqkUBlcXUgCvPdbhUVsrprMwEHGRehG', '9438757486', 0, NULL, NULL, '2023-07-29 10:00:49', NULL),
(4, 4, 2, 'Additional', 'Secretary', 'pradeepmohanty91@gmail.com', NULL, 'addlsecy', '$2y$10$SeRDdT/SAqnytD902aiWaOHGPqx0yvWP9mINLXuFFEig8rAv5GVRe', '9999999999', 0, NULL, NULL, '2023-07-29 10:02:37', NULL),
(6, 5, 2, 'Saswat', 'Mishra', 'parijatmishro98@gmail.com', NULL, 'secymsme', '$2y$10$dVS76MGBrHauRnfviCZr6.qvg.k9pgy7HszY25sy41QlXNeSA2Kk2', '9999999999', 0, NULL, NULL, '2023-07-29 10:04:09', NULL),
(7, 7, 2, 'DDO', 'DEPM', 'abhinashmohanty998@gmail.com', NULL, 'ddodepm', '$2y$10$GNtSM6FoQ9dqM8JwWKvh7u01VDVmhg1GCgrtmOkuDDq/a6eT3TN0C', '9999999999', 0, NULL, NULL, '2023-07-29 10:05:11', NULL);

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
-- Indexes for table `tbl_scheme_master_bkp`
--
ALTER TABLE `tbl_scheme_master_bkp`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_application_details`
--
ALTER TABLE `tbl_application_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_application_event_details`
--
ALTER TABLE `tbl_application_event_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_application_files_details`
--
ALTER TABLE `tbl_application_files_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_application_log`
--
ALTER TABLE `tbl_application_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_application_stall_details`
--
ALTER TABLE `tbl_application_stall_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_application_travel_details`
--
ALTER TABLE `tbl_application_travel_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_applied_applications`
--
ALTER TABLE `tbl_applied_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_complaince`
--
ALTER TABLE `tbl_complaince`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_exporters`
--
ALTER TABLE `tbl_exporters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_exporter_address`
--
ALTER TABLE `tbl_exporter_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_exporter_bank_details`
--
ALTER TABLE `tbl_exporter_bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_exporter_other_code`
--
ALTER TABLE `tbl_exporter_other_code`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `tbl_scheme_master_bkp`
--
ALTER TABLE `tbl_scheme_master_bkp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
