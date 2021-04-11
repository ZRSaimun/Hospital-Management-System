-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2021 at 05:41 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_cell` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_dept` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_fee` int(10) UNSIGNED NOT NULL,
  `appointment_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `appointment_id`, `patient_id`, `patient_cell`, `doctor_id`, `doctor_name`, `doctor_dept`, `doctor_fee`, `appointment_date`, `appointment_time`, `status`, `paid`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'AP-3970', 'PT-8954', '0000000001', 'DOCT01', 'Dr. Darren Elder', 'Medicine', 500, '2021-03-08', 'monday_6:00 PM_10:00 PM', 'checked', 'paid', NULL, '2021-03-07 10:29:57', '2021-03-08 05:32:35'),
(5, 'AP-1781', 'PT-8954', '0000000001', 'DOCT02', 'Dr. Deborah Angel', 'Dental', 500, '2021-03-10', 'wednesday_4:00 PM_8:00 PM', 'pending', 'unpaid', NULL, '2021-03-07 10:32:42', '2021-03-07 10:32:42'),
(6, 'AP-3034', 'PT-2053', '0000000002', 'DOCT01', 'Dr. Darren Elder', 'Medicine', 500, '2021-03-08', 'monday_6:00 PM_10:00 PM', 'pending', 'unpaid', NULL, '2021-03-07 11:13:22', '2021-03-07 11:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_id`, `name`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DEPT01', 'Medicine', '0aefe1f1078d6e09506c5fb914e602ad.png', 'Published', '2021-02-24 08:10:05', '2021-02-24 08:30:50'),
(3, 'DEPT02', 'Dental', '3c51953c8c91a935f072417966df9ccd.png', 'Published', '2021-02-24 09:13:25', '2021-02-24 09:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role_id` int(10) UNSIGNED NOT NULL DEFAULT 3,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_experience` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Published',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.jpg',
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee` int(10) UNSIGNED DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `emp_id`, `user_role_id`, `name`, `nick_name`, `cell`, `email`, `age`, `about`, `work_experience`, `social_media`, `department`, `status`, `photo`, `degree`, `education`, `appointment`, `fee`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'DOCT01', 3, 'Dr. Darren Elder', 'Darren', '01986431371', 'darren@gmail.com', '32', NULL, 'Bangladesh M. C & H', NULL, 'Medicine', 'Published', '91b7f1268e6d0d97ffcf049bf7e520e9.jpg', 'MBBS, FCPS, BCS(Health)', NULL, '[{\"app_code\":\"569\",\"app_day\":\"friday\",\"app_start_time\":\"4:00 PM\",\"app_end_time\":\"8:00 PM\"},{\"app_code\":\"7288\",\"app_day\":\"monday\",\"app_start_time\":\"6:00 PM\",\"app_end_time\":\"10:00 PM\"}]', 500, NULL, NULL, '2021-02-24 10:43:52', '2021-02-24 11:47:16'),
(2, 'DOCT02', 3, 'Dr. Deborah Angel', 'Deborah', '0000000000', 'deborah@gmail.com', '35', NULL, 'Dhaka Medical College & Hospital', NULL, 'Dental', 'Published', '65a9c7d4e3efecbf68fafff4f470eca3.jpg', 'BDS DAND DDS MS', NULL, '[{\"app_code\":\"5483\",\"app_day\":\"friday\",\"app_start_time\":\"5:00 PM\",\"app_end_time\":\"8:00 PM\"},{\"app_code\":\"6489\",\"app_day\":\"wednesday\",\"app_start_time\":\"4:00 PM\",\"app_end_time\":\"8:00 PM\"}]', 500, NULL, NULL, '2021-02-24 11:44:12', '2021-02-24 11:47:30');

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
-- Table structure for table `front_ends`
--

CREATE TABLE `front_ends` (
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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2021_02_24_130903_create_departments_table', 2),
(16, '2021_02_24_154329_create_doctors_table', 3),
(17, '2021_02_26_040841_create_front_ends_table', 4),
(31, '2021_02_27_150238_create_patients_table', 5),
(32, '2021_03_06_101134_create_appointments_table', 5),
(34, '2021_03_08_133354_create_tests_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role_id` int(10) UNSIGNED NOT NULL DEFAULT 50,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'regular',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `emp_id`, `user_role_id`, `name`, `cell`, `email`, `age`, `address`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'PT-8954', 50, 'Patient-1', '0000000001', 'patient1@gmail.com', '24', 'Baridhara', 'regular', NULL, '2021-03-07 10:29:57', '2021-03-07 10:29:57'),
(3, 'PT-2053', 50, 'Patient-2', '0000000002', 'patient2@gmail.com', '25', 'Mirpur', 'regular', NULL, '2021-03-07 11:13:22', '2021-03-07 11:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_fee` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `test_id`, `test_name`, `test_slug`, `test_fee`, `status`, `created_at`, `updated_at`) VALUES
(2, 'TST-01', 'Blood Culture Test', 'blood-culture-test', 300, 'active', '2021-03-08 08:18:03', '2021-03-08 08:18:03'),
(3, 'TST-02', 'Urine Routine', 'urine-routine', 400, 'active', '2021-03-08 08:24:40', '2021-03-08 08:24:40'),
(4, 'TST-03', 'Urine Culture', 'urine-culture', 200, 'active', '2021-03-08 08:25:06', '2021-03-08 08:25:06'),
(5, 'TST-04', 'X-Ray', 'x-ray', 200, 'active', '2021-03-08 08:26:03', '2021-03-08 08:26:03'),
(6, 'TST-05', 'X-Ray Skeletal Survey', 'x-ray-skeletal-survey', 400, 'active', '2021-03-08 08:26:31', '2021-03-08 08:26:31'),
(7, 'TST-06', 'Blood Group Test', 'blood-group-test', 200, 'active', '2021-03-08 08:28:08', '2021-03-08 08:28:08'),
(8, 'TST-07', 'Blood Sugar Test', 'blood-sugar-test', 300, 'active', '2021-03-08 08:28:29', '2021-03-08 08:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uRoll_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emp_id`, `uRoll_id`, `name`, `username`, `cell`, `age`, `email`, `email_verified_at`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Mohammad Ruhul Amin', 'ruhul_amin', '01986431371', 32, 'ruhul_amin@gmail.com', NULL, '$2y$10$guEt9rJA8R72v54ozkg7suM6lX826fhQMHRZ8WfJH.olE110yzlju', '', NULL, '2021-02-23 10:58:28', '2021-02-23 10:58:28'),
(15, 'PT-8954', NULL, 'Patient-1', NULL, '0000000001', 24, 'patient1@gmail.com', NULL, '$2y$10$mRycBAjuY3xDLeDV0OiNd.72yOv1AS8IMDAJNmQGNsOdYudyhzW/q', 'avatar.jpg', NULL, '2021-03-07 10:29:57', '2021-03-07 10:29:57'),
(16, 'PT-2053', NULL, 'Patient-2', NULL, '0000000002', 25, 'patient2@gmail.com', NULL, '$2y$10$ZDjcBKChYGt8Y1o4fJ/7HuKfcfpxxkWB.6xyWwvpUrF0CnEbpVlyK', 'avatar.jpg', NULL, '2021-03-07 11:13:22', '2021-03-07 11:13:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `appointments_appointment_id_unique` (`appointment_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_department_id_unique` (`department_id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_emp_id_unique` (`emp_id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `front_ends`
--
ALTER TABLE `front_ends`
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
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tests_test_id_unique` (`test_id`),
  ADD UNIQUE KEY `tests_test_name_unique` (`test_name`),
  ADD UNIQUE KEY `tests_test_slug_unique` (`test_slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_cell_unique` (`cell`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_ends`
--
ALTER TABLE `front_ends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
