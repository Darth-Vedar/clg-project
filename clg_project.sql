-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 11:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clg_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty_announcement`
--

CREATE TABLE `faculty_announcement` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `subject` varchar(150) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_announcement`
--

INSERT INTO `faculty_announcement` (`id`, `faculty_id`, `subject`, `message`, `created_at`) VALUES
(1, 15, 'test', 'test msg 2', '2023-06-08 22:52:40'),
(2, 15, 'test', 'test msg 3', '2023-06-08 22:53:23'),
(3, 17, 'Test3', 'test msg 3', '2023-06-10 14:57:39'),
(4, 15, 'test', 'test 4\r\n', '2023-06-10 16:30:08'),
(5, 15, 'yui', 'uio', '2023-06-10 17:37:56'),
(6, 15, 'Assignments ', 'All Students Submit your assignments \r\n', '2023-06-11 00:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_info`
--

CREATE TABLE `faculty_info` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `hod_id` int(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `department` varchar(200) DEFAULT NULL,
  `branch` varchar(200) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_info`
--

INSERT INTO `faculty_info` (`id`, `faculty_id`, `hod_id`, `name`, `department`, `branch`, `subject`, `semester`, `created_at`) VALUES
(1, 15, 1, 'Teena Mam	', 'E.C.E.', 'Electronics and Communication Engineering', 'Signal and system', '7', '2023-06-04 15:13:16'),
(2, 16, 1, 'Rohit Kumar	', 'E.C.E.', 'Electronics and Communication Engineering', 'Disaster Management	', '5', '2023-06-04 15:20:15'),
(3, 17, 1, 'Rahul Moad	', 'E.C.E.', 'Electronics and Communication Engineering', 'Computer Networks	', '7', '2023-06-04 15:35:04'),
(6, 26, 1, 'kailash ', 'E.C.E.', 'Electronics and Communication Engineering', 'Disaster Management ', '4', '2023-06-10 17:40:34'),
(7, 28, 1, 'Sourav Paliwal', 'E.C.E.', 'Electronics and Communication Engineering', 'Microcontroller ', '4', '2023-06-11 00:16:53'),
(8, 29, 1, 'Shabir', 'E.C.E.', 'Electronics and Communication Engineering', 'Analog circuits ', '5', '2023-06-11 00:22:18'),
(9, 31, 1, 'Teacher01', 'E.C.E.', 'Electronics and Communication Engineering', 'Skill Development ', '7', '2023-06-11 00:39:29'),
(10, 32, 1, 'Teacher04', 'E.C.E.', 'Electronics and Communication Engineering', 'Digital Circuits', '4', '2023-06-11 01:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `hod_announcement`
--

CREATE TABLE `hod_announcement` (
  `id` int(11) NOT NULL,
  `hod_id` int(10) DEFAULT NULL,
  `subject` varchar(150) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hod_announcement`
--

INSERT INTO `hod_announcement` (`id`, `hod_id`, `subject`, `message`, `created_at`) VALUES
(1, 1, 'Test', 'Test msg', '2023-06-08 22:15:09'),
(2, 1, 'test', 'test msg 2', '2023-06-10 16:30:48'),
(3, 1, 'Analog circuits ', 'please collect the reports of the students ', '2023-06-11 00:28:55'),
(4, 1, 'Assignment ', 'Collect All Assignments ', '2023-06-11 00:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `mid_term1` varchar(150) DEFAULT NULL,
  `mid_term2` varchar(150) DEFAULT NULL,
  `assignment` int(11) DEFAULT NULL,
  `grade` varchar(150) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`id`, `faculty_id`, `student_id`, `mid_term1`, `mid_term2`, `assignment`, `grade`, `created_at`) VALUES
(1, 15, 21, '78', '90', 1, 'B+', '2023-06-10 15:33:16'),
(2, 16, 21, '50', '60', 0, 'B-', '2023-06-10 15:47:42'),
(3, 15, 25, '656', '556', 1, 'C-', '2023-06-10 17:38:59'),
(4, 15, 22, '5423', '32', 0, 'A+', '2023-06-10 17:39:14'),
(5, 28, 24, '99', '99', 0, 'A+', '2023-06-11 00:49:43'),
(6, 28, 27, '50', '50', 1, 'B+', '2023-06-11 00:50:07'),
(7, 32, 24, '60', '60', 1, 'B-', '2023-06-11 01:13:10'),
(8, 32, 27, '65', '65', 1, 'B', '2023-06-11 01:13:40'),
(9, 29, 21, '77', '-77', 1, 'A+', '2023-06-11 01:22:20'),
(10, 29, 22, '98', '90', 1, 'B+', '2023-06-11 01:22:39'),
(11, 29, 25, '97', '97', 1, 'A-', '2023-06-11 01:25:54'),
(12, 16, 22, '66', '66', 0, 'A+', '2023-06-11 01:43:34'),
(13, 16, 25, '55', '55', 1, 'A+', '2023-06-11 01:43:49'),
(14, 15, 23, '', '', 1, 'A+', '2023-06-11 15:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `roll_no` varchar(150) DEFAULT NULL,
  `department` varchar(150) DEFAULT NULL,
  `branch` varchar(150) DEFAULT NULL,
  `semester` varchar(150) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `student_id`, `faculty_id`, `name`, `roll_no`, `department`, `branch`, `semester`, `created_at`) VALUES
(1, 21, 15, 'student', '16EVD1231', 'E.C.E.', 'Electronics and Communication Engineering', '5', '2023-06-10 13:47:04'),
(2, 22, 15, 'student 2', '16EDG45665', 'E.C.E.', 'Electronics and Communication Engineering', '5', '2023-06-10 14:03:15'),
(3, 23, 17, 'student 3', '16EF65656', 'E.C.E.', 'Electronics and Communication Engineering', '7', '2023-06-10 14:59:40'),
(4, 24, 15, 'Suresh', 'X125', 'E.C.E.', 'Electronics and Communication Engineering', '4', '2023-06-10 17:33:38'),
(5, 25, 15, 'suraj', 'X124', 'E.C.E.', 'Electronics and Communication Engineering', '5', '2023-06-10 17:35:53'),
(6, 27, 15, 'kamal', 'X123', 'E.C.E.', 'Electronics and Communication Engineering', '4', '2023-06-10 17:41:58'),
(7, 30, 15, 'Rajesh', '19EGIEC001', 'E.C.E.', 'Electronics and Communication Engineering', '7', '2023-06-11 00:27:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(11) DEFAULT 3,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `type`, `date`) VALUES
(1, 77665485, 'admin', '123456', 1, '2023-06-11 09:42:35'),
(15, 0, 'teena', '123456', 2, '2023-06-10 09:36:46'),
(16, 0, 'rohit', '123456', 2, '2023-06-10 08:25:37'),
(17, 0, 'rahul', '123456', 2, '2023-06-10 09:26:22'),
(21, 0, 'student1', '123456', 3, '2023-06-10 08:17:04'),
(22, 0, 'student2', '123456', 3, '2023-06-11 09:31:25'),
(23, 0, 'student3', '123456', 3, '2023-06-10 09:29:40'),
(24, 0, 'Suresh', '123456', 3, '2023-06-10 20:04:54'),
(25, 0, 'Suraj-123', '123456', 3, '2023-06-10 12:05:53'),
(26, 0, 'kailash_123', '123456', 2, '2023-06-10 20:02:24'),
(27, 0, 'Kamal', '123456', 3, '2023-06-10 12:11:58'),
(28, 0, 'Sourav Paliwal', '123456', 2, '2023-06-11 09:43:39'),
(29, 0, 'Shabir', '123456', 2, '2023-06-11 09:38:33'),
(30, 0, 'Rajesh001', '123456', 3, '2023-06-10 18:57:38'),
(31, 0, 'Teacher01', '123456', 2, '2023-06-10 20:02:54'),
(32, 0, 'Teacher04', '123456', 2, '2023-06-10 20:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `department` varchar(200) DEFAULT NULL,
  `branch` varchar(200) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `semester` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_id`, `name`, `department`, `branch`, `subject`, `semester`) VALUES
(1, 1, 'Amrut Purohit', 'E.C.E.', 'Electronics and Communication Engineering', 'Power Electronics', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty_announcement`
--
ALTER TABLE `faculty_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_info`
--
ALTER TABLE `faculty_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hod_announcement`
--
ALTER TABLE `hod_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty_announcement`
--
ALTER TABLE `faculty_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faculty_info`
--
ALTER TABLE `faculty_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hod_announcement`
--
ALTER TABLE `hod_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
