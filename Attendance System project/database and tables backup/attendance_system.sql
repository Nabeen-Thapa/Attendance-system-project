-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 02:08 PM
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
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `Phone` varchar(20) NOT NULL,
  `Image` varchar(250) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`id`, `Name`, `Email`, `username`, `password`, `Phone`, `Image`, `status`) VALUES
(1, 'Admin Users', 'admin@123.com', 'admin', 'admin123', '9876543222', '667a51bb00999.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendence_record_table`
--

CREATE TABLE `attendence_record_table` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendence_record_table`
--

INSERT INTO `attendence_record_table` (`id`, `subject_id`, `student_id`, `date`, `status`) VALUES
(1, 6, 2, '2024-05-08', 1),
(2, 6, 4, '2024-05-08', 1),
(3, 6, 7, '2024-05-08', 1),
(4, 6, 2, '2024-05-08', 1),
(5, 6, 3, '2024-05-08', 1),
(6, 6, 6, '2024-05-08', 1),
(7, 6, 7, '2024-05-08', 1),
(8, 6, 4, '2024-05-08', 0),
(9, 6, 5, '2024-05-08', 0),
(10, 11, 8, '2024-05-08', 1),
(11, 11, 9, '2024-05-08', 0),
(12, 11, 10, '2024-05-08', 0),
(13, 7, 2, '2024-05-19', 1),
(14, 7, 3, '2024-05-19', 1),
(15, 7, 4, '2024-05-19', 1),
(16, 7, 5, '2024-05-19', 0),
(17, 7, 6, '2024-05-19', 0),
(18, 7, 7, '2024-05-19', 0),
(19, 7, 4, '2024-05-19', 1),
(20, 7, 5, '2024-05-19', 1),
(21, 7, 2, '2024-05-19', 0),
(22, 7, 3, '2024-05-19', 0),
(23, 7, 6, '2024-05-19', 0),
(24, 7, 7, '2024-05-19', 0),
(25, 24, 12, '2024-05-19', 1),
(26, 24, 13, '2024-05-19', 1),
(27, 24, 14, '2024-05-19', 0),
(28, 24, 12, '2024-05-19', 0),
(29, 24, 13, '2024-05-19', 0),
(30, 24, 14, '2024-05-19', 0),
(31, 6, 2, '2024-06-26', 1),
(32, 6, 3, '2024-06-26', 1),
(33, 6, 4, '2024-06-26', 1),
(34, 6, 5, '2024-06-26', 0),
(35, 6, 6, '2024-06-26', 0),
(36, 6, 7, '2024-06-26', 0),
(37, 6, 2, '2024-06-26', 1),
(38, 6, 2, '2024-06-26', 1),
(39, 6, 2, '2024-06-26', 1),
(40, 6, 2, '2024-06-26', 1),
(41, 6, 2, '2024-06-26', 1),
(42, 6, 2, '2024-06-26', 1),
(43, 6, 2, '2024-06-27', 1),
(44, 6, 3, '2024-06-27', 1),
(45, 6, 6, '2024-06-27', 1),
(46, 6, 7, '2024-06-27', 1),
(47, 6, 4, '2024-06-27', 0),
(48, 6, 5, '2024-06-27', 0),
(49, 8, 2, '2024-06-28', 1),
(50, 8, 3, '2024-06-28', 1),
(51, 8, 5, '2024-06-28', 1),
(52, 8, 6, '2024-06-28', 1),
(53, 8, 7, '2024-06-28', 1),
(54, 8, 4, '2024-06-28', 0),
(55, 6, 2, '2024-06-28', 1),
(56, 6, 3, '2024-06-28', 1),
(57, 6, 5, '2024-06-28', 1),
(58, 6, 6, '2024-06-28', 1),
(59, 6, 7, '2024-06-28', 1),
(60, 6, 4, '2024-06-28', 0),
(61, 6, 2, '0000-00-00', 1),
(62, 6, 3, '0000-00-00', 1),
(63, 6, 6, '0000-00-00', 1),
(64, 6, 7, '0000-00-00', 1),
(65, 6, 4, '2024-06-28', 0),
(66, 6, 5, '2024-06-28', 0),
(67, 6, 2, '0000-00-00', 1),
(68, 6, 3, '0000-00-00', 1),
(69, 6, 4, '0000-00-00', 1),
(70, 6, 5, '0000-00-00', 1),
(71, 6, 6, '2024-06-28', 0),
(72, 6, 7, '2024-06-28', 0),
(73, 6, 2, '2024-06-28', 0),
(74, 6, 2, '0000-00-00', 1),
(75, 6, 2, '2024-06-28', 0),
(76, 7, 2, '2024-06-28', 1),
(78, 11, 8, '2024-06-28', 1),
(79, 11, 9, '2024-06-28', 1),
(80, 11, 10, '2024-06-28', 1),
(81, 9, 2, '2024-06-28', 1),
(82, 9, 3, '2024-06-28', 1),
(83, 9, 7, '2024-06-28', 1),
(84, 9, 4, '2024-06-28', 0),
(85, 9, 5, '2024-06-28', 0),
(86, 9, 6, '2024-06-28', 0),
(87, 9, 2, '2024-06-29', 1),
(88, 9, 4, '2024-06-29', 1),
(89, 9, 5, '2024-06-29', 1),
(90, 9, 6, '2024-06-29', 1),
(91, 9, 7, '2024-06-29', 1),
(92, 9, 3, '2024-06-29', 0),
(93, 6, 2, '2024-07-01', 1),
(94, 6, 3, '2024-07-01', 1),
(95, 6, 4, '2024-07-01', 1),
(96, 6, 5, '2024-07-01', 1),
(97, 6, 6, '2024-07-01', 1),
(98, 6, 7, '2024-07-01', 1),
(99, 11, 8, '2024-07-01', 1),
(100, 11, 9, '2024-07-01', 1),
(101, 11, 10, '2024-07-01', 1),
(102, 6, 2, '2024-07-05', 1),
(103, 6, 3, '2024-07-05', 1),
(104, 6, 4, '2024-07-05', 1),
(105, 6, 2, '2024-07-10', 1),
(106, 6, 3, '2024-07-10', 1),
(107, 6, 2, '2024-07-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `batch_table`
--

CREATE TABLE `batch_table` (
  `id` int(11) NOT NULL,
  `start_year` varchar(20) DEFAULT NULL,
  `end_year` varchar(20) DEFAULT NULL,
  `Title` varchar(255) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `sem_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch_table`
--

INSERT INTO `batch_table` (`id`, `start_year`, `end_year`, `Title`, `course_id`, `year_id`, `sem_id`) VALUES
(4, '2078', '2082', 'BCA2078', 4, 2, 4),
(5, '2079', '2083', 'BCA2079', 4, 2, 3),
(6, '2079', '2083', 'BBA2079', 5, 2, 3),
(7, '2080', '2082', 'BBA2080', 11, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_table`
--

CREATE TABLE `course_table` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `course_type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_table`
--

INSERT INTO `course_table` (`id`, `Name`, `course_type`) VALUES
(4, 'BCA', 'semester wise'),
(5, 'BBA', 'semester wise'),
(6, 'BBS', 'yearly'),
(8, 'BIT', 'semester wise'),
(9, 'CSIT', 'semester wise'),
(10, 'BBM', 'semester wise'),
(11, 'MCA', 'semester wise'),
(12, 'MBA', 'semester wise'),
(14, 'MIT', 'semester wise'),
(15, 'MBS', 'yearly'),
(16, 'MBBS', 'yearly');

-- --------------------------------------------------------

--
-- Table structure for table `course_type`
--

CREATE TABLE `course_type` (
  `id` int(11) NOT NULL,
  `course_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_type`
--

INSERT INTO `course_type` (`id`, `course_type`) VALUES
(1, 'yearly'),
(2, 'Semester wise');

-- --------------------------------------------------------

--
-- Table structure for table `semester_table`
--

CREATE TABLE `semester_table` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Rank` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester_table`
--

INSERT INTO `semester_table` (`id`, `Name`, `Rank`, `year_id`) VALUES
(1, 'First semester', 1, 1),
(2, 'second semester', 2, 1),
(3, 'third semester', 3, 2),
(4, 'fourth semester', 4, 2),
(5, 'fifth semester', 5, 3),
(6, 'sixth semester', 6, 3),
(7, 'seventh semester', 7, 4),
(8, 'eighth semester', 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `student_request_details`
--

CREATE TABLE `student_request_details` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `login_pwd` varchar(20) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `course_type` varchar(30) DEFAULT NULL,
  `std_course` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  `RegistrationNo` varchar(30) NOT NULL,
  `RollNo` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_request_details`
--

INSERT INTO `student_request_details` (`id`, `Name`, `Email`, `Phone`, `login_pwd`, `DOB`, `course_type`, `std_course`, `year`, `semester`, `batch_id`, `section`, `RegistrationNo`, `RollNo`, `address`, `Gender`, `image`, `request_date`, `status`) VALUES
(16, 'Pranjal Karki', 'pranja@gmail.com', '9878987665', 'M*Rx2$YQ', '2017-07-27', 'semester-wise', 5, 2, 3, 5, 'A', '20001', '22', 'jawalakhel', 'Male', '667e552a1dbf6.jpg', '2024-06-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `login_pwd` varchar(20) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `course_type` varchar(30) DEFAULT NULL,
  `std_course` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `Batch_id` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  `RegistrationNo` varchar(30) NOT NULL,
  `RollNo` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `Registered_date` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`id`, `Name`, `Email`, `Phone`, `login_pwd`, `DOB`, `course_type`, `std_course`, `year`, `Batch_id`, `semester`, `section`, `RegistrationNo`, `RollNo`, `address`, `Gender`, `image`, `Registered_date`, `status`) VALUES
(2, 'Prajwall Bhattraii', 'prajwal@bha.com', '9876543214', 'pr123', '2024-05-01', 'semester-wise', 4, 2, 4, 4, 'A', '4001', '10', 'jawalakhel', 'Male', '668e5344e5edf.jpg', '2024-05-06', 1),
(3, 'Dillip Paudel', 'dilip@paudel.com', '9876543215', 'odgdG5IN', '2024-05-01', 'semester-wise', 4, 2, 4, 4, 'A', '40010', '1', 'jawalakhel', 'Male', '663892a298419.png', '2024-05-06', 1),
(4, 'Ratish Timalshina', 'rarish@timal.com', '9876543212', 'iX#PHZUr', '2024-05-01', 'semester-wise', 4, 2, 4, 4, 'A', '4002', '2', 'jawalakhel', 'Male', '663892e74d00a.jpg', '2024-05-06', 1),
(5, 'Pranjal Karki', 'pranjal@karki.com', '9876543216', 'Sct--2fc', '2024-05-01', 'semester-wise', 4, 2, 4, 4, 'A', '4016', '16', 'jawalakhel', 'Male', '66389320b1088.png', '2024-05-06', 1),
(6, 'Anjil Shrestha', 'anjil@sh.com', '9876543224', '-9+zaHzp', '2024-05-01', 'semester-wise', 4, 2, 4, 4, 'A', '4024', '24', 'jawalakhel', 'Male', '663893699f679.png', '2024-05-06', 1),
(7, 'Sajjin Shakya', 'sajin@sh.com', '9876543204', 'a2kYAnYk', '2024-05-01', 'semester-wise', 4, 2, 4, 4, 'A', '4004', '4', 'jawalakhel', 'Male', '6638939a2f2d3.png', '2024-05-06', 1),
(8, 'Saysa Third', 'sayasa@th.com', '9876543301', 'woMynUYn', '2024-05-01', 'semester-wise', 4, 2, 4, 3, 'A', '3001', '1', 'jawalakhel', 'Female', '663893f44fbee.jpg', '2024-05-06', 1),
(9, 'Says Third', 'sayas@th.com', '9876543302', 'mch*s_wM', '2024-05-01', 'semester-wise', 4, 2, 4, 3, 'A', '3002', '2', 'jawalakhel', 'Female', '663894120af90.jpg', '2024-05-06', 1),
(10, 'Sayal Third', 'sayal@th.com', '9876543303', 'scNev1a3', '2024-05-01', 'semester-wise', 4, 2, 4, 3, 'A', '3003', '3', 'jawalakhel', 'Female', '6638942f847e2.jpg', '2024-05-06', 1),
(12, 'Sayali Third', 'sayalii@th.com', '9876542001', 'YM24Coab', '2024-05-01', 'semester-wise', 4, 1, 4, 2, 'A', '2001', '1', 'jawalakhel', 'Female', '663894cd6ba78.jpg', '2024-05-06', 1),
(13, 'Sayath Second', 'sayath@se.com', '9876542002', '$eSs%.G_', '2024-05-01', 'semester-wise', 4, 1, 4, 2, 'A', '2002', '2', 'jawalakhel', 'Female', '663894ff167a6.png', '2024-05-06', 1),
(14, 'Sayal Second', 'sayal@se.com', '9876542010', 'q8@9Y3_*', '2024-05-01', 'semester-wise', 4, 1, 4, 2, 'A', '2010', '10', 'jawalakhel', 'Female', '663895e6de90f.png', '2024-05-06', 1),
(15, 'Sita Dahal', 'sita@dal.com', '9876543212', 'DmsmVxvm', '2014-06-11', 'semester-wise', 11, 1, 5, 1, 'A', '435', '12', 'jawalakhel', 'Female', '66438b4e5d979.jpg', '2024-05-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects_table`
--

CREATE TABLE `subjects_table` (
  `id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Subject_code` varchar(50) DEFAULT NULL,
  `Course_id` int(11) DEFAULT NULL,
  `Year_id` int(11) DEFAULT NULL,
  `Semester_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects_table`
--

INSERT INTO `subjects_table` (`id`, `Title`, `Subject_code`, `Course_id`, `Year_id`, `Semester_id`) VALUES
(3, 'DBMS', 'CACS102', 4, 2, 4),
(6, 'scripting language', 'CACS101', 4, 2, 4),
(7, 'Numerical method', 'CACS103', 4, 2, 4),
(8, 'operating system', 'CACS104', 4, 2, 4),
(9, 'software engeneering', 'CACS105', 4, 2, 4),
(10, 'CFA', 'CACS400', 4, 1, 1),
(11, 'web technology', 'CACS300', 4, 2, 3),
(12, 'DSA', 'CACS301', 4, 2, 3),
(13, 'Stats', 'CACS302', 4, 2, 3),
(14, 'Stats', 'CACS302', 8, 2, 3),
(15, 'OOP java', 'CACS303', 8, 2, 3),
(16, 'OOP java', 'CACS304', 4, 2, 3),
(17, 'C programming', 'CACS305', 4, 1, 2),
(18, 'English', 'CACS2001', 4, 1, 2),
(19, 'SAD', 'CACS3001', 4, 2, 3),
(20, 'Stats', 'CACS3002', 4, 2, 3),
(21, 'Math II', 'CACS2001', 4, 1, 2),
(22, 'English II', 'CACS2002', 4, 1, 2),
(23, 'accounting', 'CACS2003', 4, 1, 2),
(24, 'Processor', 'CACS2005', 4, 1, 2),
(25, 'Math I', 'CACS1001', 4, 1, 1),
(26, 'English I', 'CACS1002', 4, 1, 1),
(27, 'Society', 'CACS1003', 4, 1, 1),
(28, 'DL', 'CACS1004', 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject_assign_teacher`
--

CREATE TABLE `subject_assign_teacher` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `Teacher_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `class_start_date` varchar(20) DEFAULT NULL,
  `class_end_date` varchar(20) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_assign_teacher`
--

INSERT INTO `subject_assign_teacher` (`id`, `course_id`, `batch_id`, `semester_id`, `Teacher_id`, `subject_id`, `class_start_date`, `class_end_date`, `Status`) VALUES
(3, 4, 4, 4, 7, 3, '2021-01-12', '2027-05-26', 1),
(4, 4, 4, 4, 6, 6, '2021-01-12', '2027-05-26', 1),
(5, 4, 4, 4, 5, 7, '2021-01-12', '2027-05-26', 1),
(6, 4, 4, 4, 4, 8, '2021-01-12', '2027-05-26', 1),
(7, 4, 4, 4, 9, 9, '2021-01-12', '2027-05-26', 1),
(8, 4, 4, 3, 5, 19, '2023-05-10', '2024-03-12', 1),
(9, 4, 4, 3, 14, 16, '2023-05-10', '2024-03-12', 1),
(11, 4, 4, 3, 6, 11, '2023-05-10', '2024-03-12', 1),
(12, 4, 4, 3, 4, 12, '2023-05-17', '2024-05-01', 1),
(13, 4, 4, 1, 11, 10, '2021-02-16', '2021-11-04', 1),
(14, 4, 4, 2, 11, 17, '2021-02-16', '2021-11-04', 1),
(15, 4, 4, 2, 12, 23, '2021-02-16', '2021-11-04', 1),
(16, 4, 4, 2, 5, 24, '2021-02-16', '2021-11-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_details`
--

CREATE TABLE `teacher_details` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_details`
--

INSERT INTO `teacher_details` (`id`, `Name`, `Email`, `Phone`, `username`, `password`, `address`, `Gender`, `image`, `status`) VALUES
(4, 'Roshan Tandukar', 'roshan@tandukar.com', '9876787651', 'os123', 'os123', 'jawalakhel', 'Male <br /', '663864dfe33cd.jpg', 1),
(5, 'Bhoj Raj Joshi', 'bhojraj@joshi.com', '9812345034', 'nm123', 'nm123', 'jawalakhel', 'Male ', '6638653123b96.jpg', 1),
(6, 'Basanta Chapagain', 'basanta@chapagain.com', '9812345034', 'sc123', 'sc123', 'jawalakhel', 'Male ', '667c3ee86e435.png', 1),
(7, 'Jagdish Bhatta', 'jagdish@bhatta.com', '9812345033', 'dbms123', 'dbms123', 'jawalakhel', 'Male ', '663865a00e789.jpg', 1),
(9, 'Deo Narayan Yadav', 'deo@narayan.com', '9812345000', 'se123', 'se123', 'jawalakhel', 'Male <br /', '6638661b0b8a3.jpg', 1),
(11, 'Sapana Pokheral', 'sapana@pokheral.com', '9812345055', 'cl123', 'cl123', 'jawalakhel', 'Female ', '6638666d5a08f.jpg', 1),
(12, 'Sarmila Bhattrai', 'sarmila@bhattrai.com', '9812345056', 'ac123', 'ac123', 'jawalakhel', 'Female ', '663866e20eb0b.png', 1),
(14, 'Nabraj Paudel', 'nab@raj.com', '9876543222', 'java123', 'java123', 'jawalakhel', 'Male <br /', '663868ae6a710.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `year_table`
--

CREATE TABLE `year_table` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `year_table`
--

INSERT INTO `year_table` (`id`, `Name`, `Rank`) VALUES
(1, 'First year', 1),
(2, 'Second year', 2),
(3, 'Third year', 3),
(4, 'Fourth year', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendence_record_table`
--
ALTER TABLE `attendence_record_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `batch_table`
--
ALTER TABLE `batch_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `sem_id` (`sem_id`),
  ADD KEY `year_id` (`year_id`);

--
-- Indexes for table `course_table`
--
ALTER TABLE `course_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_type`
--
ALTER TABLE `course_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester_table`
--
ALTER TABLE `semester_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `year_id` (`year_id`);

--
-- Indexes for table `student_request_details`
--
ALTER TABLE `student_request_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_course` (`std_course`),
  ADD KEY `year` (`year`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `semester` (`semester`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_course` (`std_course`),
  ADD KEY `year` (`year`),
  ADD KEY `Batch_id` (`Batch_id`),
  ADD KEY `semester` (`semester`);

--
-- Indexes for table `subjects_table`
--
ALTER TABLE `subjects_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Course_id` (`Course_id`),
  ADD KEY `Year_id` (`Year_id`),
  ADD KEY `Semester_id` (`Semester_id`);

--
-- Indexes for table `subject_assign_teacher`
--
ALTER TABLE `subject_assign_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `Teacher_id` (`Teacher_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `teacher_details`
--
ALTER TABLE `teacher_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year_table`
--
ALTER TABLE `year_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendence_record_table`
--
ALTER TABLE `attendence_record_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `batch_table`
--
ALTER TABLE `batch_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_table`
--
ALTER TABLE `course_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `course_type`
--
ALTER TABLE `course_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester_table`
--
ALTER TABLE `semester_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_request_details`
--
ALTER TABLE `student_request_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subjects_table`
--
ALTER TABLE `subjects_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `subject_assign_teacher`
--
ALTER TABLE `subject_assign_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teacher_details`
--
ALTER TABLE `teacher_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `year_table`
--
ALTER TABLE `year_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendence_record_table`
--
ALTER TABLE `attendence_record_table`
  ADD CONSTRAINT `attendence_record_table_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects_table` (`id`),
  ADD CONSTRAINT `attendence_record_table_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_table` (`id`);

--
-- Constraints for table `batch_table`
--
ALTER TABLE `batch_table`
  ADD CONSTRAINT `batch_table_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_table` (`id`),
  ADD CONSTRAINT `batch_table_ibfk_2` FOREIGN KEY (`sem_id`) REFERENCES `semester_table` (`id`),
  ADD CONSTRAINT `batch_table_ibfk_3` FOREIGN KEY (`year_id`) REFERENCES `year_table` (`id`);

--
-- Constraints for table `semester_table`
--
ALTER TABLE `semester_table`
  ADD CONSTRAINT `semester_table_ibfk_1` FOREIGN KEY (`year_id`) REFERENCES `year_table` (`id`);

--
-- Constraints for table `student_request_details`
--
ALTER TABLE `student_request_details`
  ADD CONSTRAINT `student_request_details_ibfk_1` FOREIGN KEY (`std_course`) REFERENCES `course_table` (`id`),
  ADD CONSTRAINT `student_request_details_ibfk_2` FOREIGN KEY (`year`) REFERENCES `year_table` (`id`),
  ADD CONSTRAINT `student_request_details_ibfk_3` FOREIGN KEY (`batch_id`) REFERENCES `batch_table` (`id`),
  ADD CONSTRAINT `student_request_details_ibfk_4` FOREIGN KEY (`semester`) REFERENCES `semester_table` (`id`);

--
-- Constraints for table `student_table`
--
ALTER TABLE `student_table`
  ADD CONSTRAINT `student_table_ibfk_1` FOREIGN KEY (`std_course`) REFERENCES `course_table` (`id`),
  ADD CONSTRAINT `student_table_ibfk_2` FOREIGN KEY (`year`) REFERENCES `year_table` (`id`),
  ADD CONSTRAINT `student_table_ibfk_3` FOREIGN KEY (`Batch_id`) REFERENCES `batch_table` (`id`),
  ADD CONSTRAINT `student_table_ibfk_4` FOREIGN KEY (`semester`) REFERENCES `semester_table` (`id`);

--
-- Constraints for table `subjects_table`
--
ALTER TABLE `subjects_table`
  ADD CONSTRAINT `subjects_table_ibfk_1` FOREIGN KEY (`Course_id`) REFERENCES `course_table` (`id`),
  ADD CONSTRAINT `subjects_table_ibfk_2` FOREIGN KEY (`Year_id`) REFERENCES `year_table` (`id`),
  ADD CONSTRAINT `subjects_table_ibfk_3` FOREIGN KEY (`Semester_id`) REFERENCES `semester_table` (`id`);

--
-- Constraints for table `subject_assign_teacher`
--
ALTER TABLE `subject_assign_teacher`
  ADD CONSTRAINT `subject_assign_teacher_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_table` (`id`),
  ADD CONSTRAINT `subject_assign_teacher_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch_table` (`id`),
  ADD CONSTRAINT `subject_assign_teacher_ibfk_3` FOREIGN KEY (`semester_id`) REFERENCES `semester_table` (`id`),
  ADD CONSTRAINT `subject_assign_teacher_ibfk_4` FOREIGN KEY (`Teacher_id`) REFERENCES `teacher_details` (`id`),
  ADD CONSTRAINT `subject_assign_teacher_ibfk_5` FOREIGN KEY (`subject_id`) REFERENCES `subjects_table` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
