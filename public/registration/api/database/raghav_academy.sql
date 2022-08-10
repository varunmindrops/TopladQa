-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2020 at 11:38 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raghav_academy_4`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `pin_code` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL COMMENT '''PK of mst product''',
  `product_type_id` int(11) DEFAULT NULL COMMENT '''PK of mst product type''',
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `product_id`, `product_type_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'fr3434', '2020-07-09 10:59:56', '2020-07-09 10:59:56'),
(2, 1, 1, 'ffwerew', '2020-07-09 10:59:56', '2020-07-09 10:59:56'),
(3, 1, 2, '', '2020-07-09 10:59:56', '2020-07-09 10:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mst_attempt`
--

CREATE TABLE `mst_attempt` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_attempt`
--

INSERT INTO `mst_attempt` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'DEC 2020', NULL, '2020-06-22 18:10:04', '2020-06-22 18:10:04'),
(2, 'JUNE 2021', NULL, '2020-06-22 18:10:04', '2020-06-22 18:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `mst_course`
--

CREATE TABLE `mst_course` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '''1-active, 0-inactive''',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '''0- not deleted, 1- Deleted''',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_course`
--

INSERT INTO `mst_course` (`id`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'CMA', 1, NULL, '2020-07-01 06:34:27', '2020-07-01 06:34:27'),
(2, 'CA', 1, NULL, '2020-07-01 06:34:27', '2020-07-01 06:34:27'),
(3, 'CS', 1, NULL, '2020-07-01 06:34:27', '2020-07-01 06:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `mst_course_level`
--

CREATE TABLE `mst_course_level` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL COMMENT '''PK of MST Course''',
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '''1- Active, 0- Inactive''',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_course_level`
--

INSERT INTO `mst_course_level` (`id`, `course_id`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Foundation', 1, NULL, '2020-07-01 06:35:28', '2020-07-01 06:35:28'),
(2, 1, 'Inter', 1, NULL, '2020-07-01 06:35:28', '2020-07-01 06:35:28'),
(3, 1, 'Final', 1, NULL, '2020-07-01 06:35:28', '2020-07-01 06:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `mst_delivery_days`
--

CREATE TABLE `mst_delivery_days` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_delivery_days`
--

INSERT INTO `mst_delivery_days` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2-6 Working Days', '2020-06-22 17:40:35', '2020-06-22 17:40:35'),
(2, '7-8 Working Days', '2020-06-22 17:40:35', '2020-06-22 17:40:35'),
(3, '9-10 Working Days', '2020-06-22 17:40:35', '2020-06-22 17:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `mst_delivery_type`
--

CREATE TABLE `mst_delivery_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content_type` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_delivery_type`
--

INSERT INTO `mst_delivery_type` (`id`, `name`, `content_type`, `created_at`, `updated_at`) VALUES
(1, 'Download Link: Google Drive', 'video', '2020-06-22 17:35:26', '2020-06-22 17:35:26'),
(2, 'PEN DRIVE', 'video', '2020-06-22 17:35:26', '2020-06-22 17:35:26'),
(3, 'Hard Copy Book', 'book', '2020-06-22 17:35:26', '2020-06-22 17:35:26'),
(4, 'E-Book', 'book', '2020-06-22 17:35:26', '2020-06-22 17:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `mst_language`
--

CREATE TABLE `mst_language` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_language`
--

INSERT INTO `mst_language` (`id`, `name`) VALUES
(1, 'Hindi'),
(2, 'English'),
(3, 'HiEnglish');

-- --------------------------------------------------------

--
-- Table structure for table `mst_product_type`
--

CREATE TABLE `mst_product_type` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_product_type`
--

INSERT INTO `mst_product_type` (`id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Hard Copy Book', 0, '2020-06-25 12:26:15', '2020-06-25 12:26:15'),
(2, 'E-Books', 0, '2020-06-25 12:26:15', '2020-06-25 12:26:15'),
(3, 'Video Lectures', 0, '2020-06-25 12:26:15', '2020-06-25 12:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `mst_subject`
--

CREATE TABLE `mst_subject` (
  `id` int(11) NOT NULL,
  `course_level_id` tinyint(4) NOT NULL,
  `name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_subject`
--

INSERT INTO `mst_subject` (`id`, `course_level_id`, `name`) VALUES
(1, 1, 'Paper-1_Fundamentals of Economics and Management'),
(2, 1, 'Paper-2_Fundamentals of Accounting'),
(3, 1, 'Paper-3_Fundamentals of Laws and Ethics'),
(4, 1, 'Paper-4_Fundamentals of Business Mathematics and Statistics'),
(5, 2, 'Paper-5 Financial Accounting'),
(6, 2, 'Paper-6 Laws and Ethics'),
(7, 2, 'Paper-7 Direct Taxation'),
(8, 2, 'Paper-8 Cost Accounting'),
(9, 2, 'Paper-9 Operations Management & Strategic Management'),
(10, 2, 'Paper-10 Cost & Management Accounting and Financial Management'),
(11, 2, 'Paper-11 Indirect Taxation'),
(12, 2, 'Paper-12 Company Accounts & AuditPaper-6 Laws and Ethics'),
(13, 3, 'Paper-13 Corporate Laws & Compliance'),
(14, 3, 'Paper-14 Strategic Financial Management (SFM)'),
(15, 3, 'Paper-15 Strategic Cost Management - Decision making'),
(16, 3, 'Paper-16 Direct Tax Laws and International Taxation'),
(17, 3, 'Paper-17 Corporate Financial Reporting'),
(18, 3, 'Paper-18 Indirect Tax Laws and Practice'),
(19, 3, 'Paper-19 Cost and Management Audit'),
(20, 3, 'Paper-20 Strategic Performance Management and Business Valuation');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT '''PK of users'', also known as teacher_id',
  `subject_id` int(11) DEFAULT NULL COMMENT '''PK of mst_subject''',
  `internet_needed` enum('yes','no') NOT NULL DEFAULT 'no',
  `status` tinyint(4) NOT NULL COMMENT '''1- active, 0-inactive''',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `user_id`, `subject_id`, `internet_needed`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 123, 2, 'no', 1, NULL, '2020-07-09 16:29:56', '2020-07-09 16:29:56'),
(2, 123, 1, 'no', 1, NULL, '2020-07-09 17:17:43', '2020-07-09 17:17:43'),
(3, 1, 2, 'no', 1, NULL, '2020-07-09 19:08:45', '2020-07-09 19:08:45'),
(4, 1, 1, 'no', 1, NULL, '2020-07-09 19:41:31', '2020-07-09 19:41:31'),
(5, 1, 1, 'no', 1, NULL, '2020-07-09 19:45:48', '2020-07-09 19:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `product_doubt_resolution`
--

CREATE TABLE `product_doubt_resolution` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `resolution_mode` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_doubt_resolution`
--

INSERT INTO `product_doubt_resolution` (`id`, `product_id`, `resolution_mode`, `created_at`, `updated_at`) VALUES
(1, 32, 'Email', '2020-06-23 13:32:41', '2020-06-23 13:32:41'),
(2, 32, 'Whatsapp', '2020-06-23 13:32:41', '2020-06-23 13:32:41'),
(22, 3, 'Email', '2020-07-09 19:08:45', '2020-07-09 19:08:45'),
(23, 4, 'Email', '2020-07-09 19:41:31', '2020-07-09 19:41:31'),
(24, 5, 'Email', '2020-07-09 19:45:48', '2020-07-09 19:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `product_language`
--

CREATE TABLE `product_language` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_type_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_language`
--

INSERT INTO `product_language` (`id`, `product_id`, `product_type_id`, `language_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2020-07-09 16:29:56', '2020-07-09 16:29:56'),
(2, 3, 3, 2, '2020-07-09 19:08:45', '2020-07-09 19:08:45'),
(3, 4, 3, 2, '2020-07-09 19:41:31', '2020-07-09 19:41:31'),
(4, 5, 3, 2, '2020-07-09 19:45:48', '2020-07-09 19:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `product_price`
--

CREATE TABLE `product_price` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL COMMENT 'PK of PRoduct',
  `attempt_id` int(11) DEFAULT NULL COMMENT 'PK of mst_attempt',
  `book_delivery_type_id` int(11) DEFAULT NULL COMMENT 'PK of mst_delivery_type & content_type book',
  `video_delivery_type_id` int(11) DEFAULT NULL COMMENT 'PK of mst_delivery_type & content_type video',
  `minimum_market_price` decimal(10,2) DEFAULT NULL,
  `proposed_market_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_price`
--

INSERT INTO `product_price` (`id`, `product_id`, `attempt_id`, `book_delivery_type_id`, `video_delivery_type_id`, `minimum_market_price`, `proposed_market_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 1, '1.00', '1.00', '2020-07-09 11:31:28', '2020-07-09 11:31:28'),
(2, 1, 1, 4, 1, '2.00', '2.00', '2020-07-09 11:31:28', '2020-07-09 11:31:28'),
(3, 1, 1, 3, 2, '3.00', '3.00', '2020-07-09 11:31:28', '2020-07-09 11:31:28'),
(4, 1, 2, 3, 2, '7.00', '7.00', '2020-07-09 11:31:28', '2020-07-09 11:31:28'),
(5, 1, 2, 4, 2, '8.00', '8.00', '2020-07-09 11:31:28', '2020-07-09 11:31:28'),
(6, 3, 1, 3, 1, '22.00', '234.00', '2020-07-09 13:38:45', '2020-07-09 13:38:45'),
(7, 3, 2, 3, 2, '323.00', '4444.00', '2020-07-09 13:38:45', '2020-07-09 13:38:45'),
(8, 3, 2, 4, 2, '344.00', '54.00', '2020-07-09 13:38:45', '2020-07-09 13:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT '''PK of table user''',
  `encryption_consent` enum('yes','no') NOT NULL DEFAULT 'yes',
  `intellectual_property_consent` enum('yes','no') NOT NULL DEFAULT 'yes',
  `physical_delivery_consent` enum('yes','no') NOT NULL DEFAULT 'yes',
  `min_sell_price_consent` enum('yes','no') NOT NULL DEFAULT 'yes',
  `communication_consent` enum('yes','no') NOT NULL DEFAULT 'yes',
  `price_list_pic` text DEFAULT NULL,
  `resume_url` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `encryption_consent`, `intellectual_property_consent`, `physical_delivery_consent`, `min_sell_price_consent`, `communication_consent`, `price_list_pic`, `resume_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'yes', 'no', 'yes', 'yes', 'yes', 'price-list/20060318130335.png', NULL, '2020-06-03 18:13:03', '2020-06-03 18:13:03'),
(35, 2, 'no', 'yes', 'no', 'no', 'yes', 'price-list/200710122155462.png', 'resume/200710122155972.pdf', '2020-07-10 12:21:55', '2020-07-10 12:21:55'),
(36, 3, 'no', 'no', 'yes', 'no', 'yes', 'price-list/200710122344198.doc', 'resume/200710122344901.pdf', '2020-07-10 12:23:44', '2020-07-10 12:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_course_level`
--

CREATE TABLE `teacher_course_level` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_level_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_course_level`
--

INSERT INTO `teacher_course_level` (`id`, `user_id`, `course_level_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_language`
--

CREATE TABLE `teacher_language` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_language`
--

INSERT INTO `teacher_language` (`id`, `user_id`, `language_id`) VALUES
(1, 2, 2),
(2, 2, 3),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject`
--

CREATE TABLE `teacher_subject` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_subject`
--

INSERT INTO `teacher_subject` (`id`, `user_id`, `subject_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 15),
(4, 2, 16),
(5, 2, 19),
(6, 2, 20),
(7, 3, 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('admin','student','teacher') NOT NULL DEFAULT 'student',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-Active, 0-Inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `phone`, `password`, `remember_token`, `photo`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'student', 'abhilash', 'abhilash@mindrops.com', '9999999999', '$2y$10$a4k5AywtWBwdDvvCxAmDHO2pfm/kYrPOhtD7qjaJMtX8lIdV1vNLW', NULL, 'abc.jpg', 1, NULL, '2020-06-30 02:33:31', '2020-06-30 02:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL COMMENT 'PK of Product',
  `name` varchar(255) DEFAULT NULL,
  `no_of_videos` int(11) DEFAULT NULL,
  `time` decimal(8,2) DEFAULT NULL COMMENT 'in minutes',
  `fast_forward` enum('yes','no') NOT NULL DEFAULT 'yes',
  `no_of_views` enum('unlimited','limited') DEFAULT 'unlimited' COMMENT 'limited or unlimited',
  `instructions` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1- active, 0- inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `product_id`, `name`, `no_of_videos`, `time`, `fast_forward`, `no_of_views`, `instructions`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 64, '1', 11, '111.00', 'no', 'limited', NULL, 1, NULL, '2020-07-09 07:55:44', '2020-07-09 07:55:44'),
(6, 64, 'scsdcdsds', 22, '222.00', 'yes', 'limited', NULL, 1, NULL, '2020-07-09 07:55:44', '2020-07-09 07:55:44'),
(7, 3, '1', 22, '22.00', 'no', 'unlimited', NULL, 1, NULL, '2020-07-09 13:38:45', '2020-07-09 13:38:45'),
(8, 4, '1', 12, '233.00', 'no', 'unlimited', NULL, 1, NULL, '2020-07-09 14:11:31', '2020-07-09 14:11:31'),
(9, 5, '1', 12, '233.00', 'no', 'unlimited', NULL, 1, NULL, '2020-07-09 14:15:48', '2020-07-09 14:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `video_device`
--

CREATE TABLE `video_device` (
  `id` int(11) NOT NULL,
  `video_id` int(11) DEFAULT NULL,
  `device_name` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video_device`
--

INSERT INTO `video_device` (`id`, `video_id`, `device_name`, `created_at`, `updated_at`) VALUES
(1, 3, 'android', '2020-06-23 13:25:10', '2020-06-23 13:25:10'),
(2, 3, 'ios', '2020-06-23 13:25:10', '2020-06-23 13:25:10'),
(8, 5, 'windows', '2020-07-09 13:25:44', '2020-07-09 13:25:44'),
(9, 5, 'ios', '2020-07-09 13:25:44', '2020-07-09 13:25:44'),
(10, 6, 'android', '2020-07-09 13:25:44', '2020-07-09 13:25:44'),
(11, 6, 'ios', '2020-07-09 13:25:44', '2020-07-09 13:25:44'),
(12, 7, 'windows', '2020-07-09 19:08:45', '2020-07-09 19:08:45'),
(13, 8, 'ios', '2020-07-09 19:41:31', '2020-07-09 19:41:31'),
(14, 9, 'ios', '2020-07-09 19:45:48', '2020-07-09 19:45:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_attempt`
--
ALTER TABLE `mst_attempt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_course`
--
ALTER TABLE `mst_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_course_level`
--
ALTER TABLE `mst_course_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_delivery_days`
--
ALTER TABLE `mst_delivery_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_delivery_type`
--
ALTER TABLE `mst_delivery_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_language`
--
ALTER TABLE `mst_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_product_type`
--
ALTER TABLE `mst_product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_subject`
--
ALTER TABLE `mst_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_doubt_resolution`
--
ALTER TABLE `product_doubt_resolution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_language`
--
ALTER TABLE `product_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_price`
--
ALTER TABLE `product_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_course_level`
--
ALTER TABLE `teacher_course_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_language`
--
ALTER TABLE `teacher_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_device`
--
ALTER TABLE `video_device`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_attempt`
--
ALTER TABLE `mst_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_course`
--
ALTER TABLE `mst_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_course_level`
--
ALTER TABLE `mst_course_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_delivery_days`
--
ALTER TABLE `mst_delivery_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_delivery_type`
--
ALTER TABLE `mst_delivery_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mst_language`
--
ALTER TABLE `mst_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_product_type`
--
ALTER TABLE `mst_product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_subject`
--
ALTER TABLE `mst_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_doubt_resolution`
--
ALTER TABLE `product_doubt_resolution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_language`
--
ALTER TABLE `product_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_price`
--
ALTER TABLE `product_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `teacher_course_level`
--
ALTER TABLE `teacher_course_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_language`
--
ALTER TABLE `teacher_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `video_device`
--
ALTER TABLE `video_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
