-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 25, 2024 at 07:35 PM
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
-- Database: `e_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `admin_mail` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `admin_mail`, `password`) VALUES
(1, 'ismail khalil', 'ismail@gmail.com', '12345678'),
(2, 'IH pantho', 'pantho@gmail.com', '11223344'),
(3, 'sakib ahmed', 'sakib@gmail.com', '12341234'),
(4, 'sayeed', 'sayeed@gmail.com', '123123123'),
(5, 'tanim', 'tanim@gmail.com', '1122334455'),
(6, 'sakib islam', 'sakib@gmail.com', '12341234'),
(8, 'Farhan Rabbi', 'farhan@gmail.com', '1122334455');

-- --------------------------------------------------------

--
-- Table structure for table `admin_list`
--

CREATE TABLE `admin_list` (
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `OTP` varchar(10) DEFAULT NULL,
  `verify` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`name`, `phone_number`, `email`, `password`, `OTP`, `verify`) VALUES
('Ismail Khalil', '0177609097', 'ismail.k.aiub@gmail.com', '$2y$10$ibqkiOiI2WHthjqCKqBTQ.a59OWSJpH0bpJ6RH/Plo4Awy0ZZ16rq', '5177', 0),
('Latif islam', '1234567890', 'latif@gmail.com', '11223344', '7032', 0),
('salim ahmed', '0199872286', 'salim@gmail.com', '1122334455', '2479', 1),
('zakir hossain', '0123456789', 'zakir@gmail.com', '$2y$10$9f7E2b3kUkVlM4aw8T5/ued5QuU54FbomO.2mRUT6kB5vtpmHK2Au', '9622', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_list2`
--

CREATE TABLE `admin_list2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `OTP` varchar(10) DEFAULT NULL,
  `verify` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_list2`
--

INSERT INTO `admin_list2` (`id`, `name`, `phone_number`, `email`, `password`, `OTP`, `verify`) VALUES
(1, 'latif islam', '1234567890', 'latif@gmail.com', '11223344', '3859', 1),
(2, 'zakir hossain', '1234565430', 'zakir@gmail.com', '1122334455', '2948', 1),
(3, 'mahfuz karim', '9875398742', 'mahfuz@gmail.com', '11223344', '6055', 1),
(4, 'saiful alam', '9873429853', 'saiful87@gmail.com', '11223344', '2324', 1),
(5, 'Simiul islam', '1245789345', 'samiul@gmail.com', '11223344', '7328', 1),
(6, 'Rashed Hasan', '0155467432', 'rashed@gmail.com', '11223344', '9444', 1),
(7, 'Faisal Ahmed', '1765434567', 'faisal@gmail.com', '11223344', '5844', 1),
(8, 'Mubarak Hossain', '5642398654', 'mubarak@gmail.com', '11223344', '9093', 1),
(9, 'Fahad Rahman', '0177643234', 'fahad@gmail.com', '11223344', '0914', 1),
(10, 'Alamgir Islam', '0155476873', 'alamgir@gmail.com', '11223344', '4045', 1),
(11, 'Hamid Ahmed', '0977645345', 'hamid@gmail.com', '11223344', '9294', 1),
(13, 'samiul Islam', '0166854329', 'samiul12@gmail.com', '11223344', '8354', 1),
(14, 'Salman Rahman', '0177643986', 'salman@gmail.com', '11223344', '1348', 1),
(15, 'Ruhul Amin', '0177687543', 'ruhul23@gmail.com', '11223344', '1876', 1),
(16, 'sadman sakib', '0177609097', 'saman12@gmail.com', '11223344', '2101', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Ballance`
--

CREATE TABLE `Ballance` (
  `ballance_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Ballance`
--

INSERT INTO `Ballance` (`ballance_id`, `amount`) VALUES
(1, 104266.00);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Information Techlonogy'),
(2, 'Networking'),
(3, 'Cybersecurity'),
(4, 'Competitive programming'),
(5, 'English'),
(6, 'Machine learning'),
(7, 'IT'),
(8, 'Techlonogy'),
(9, 'IT Networking'),
(10, 'cloud computing');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_type` int(11) NOT NULL,
  `instructor` int(11) NOT NULL,
  `cover_photo` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `course_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`, `course_type`, `instructor`, `cover_photo`, `price`, `course_description`, `created_at`) VALUES
(1, 'AWS Certified Solutions Architect - Associate', 2, 8, 'course_photos/65782e7c7245d-AWS-Certified-Solutions-Architect-Associate.jpg', 4500.00, 'ggtege krfnk wf wfkj wfn wfn fkjen, ', '2023-12-12 09:57:16'),
(2, 'Python Full Course', 3, 7, 'course_photos/65783415c5624-1_slHeZngyeUr7ypEz7MNL5w.png', 2300.00, 'egerrg rgeg grtgr regrhgr', '2023-12-12 10:21:09'),
(3, 'IELTS ', 5, 10, 'course_photos/658092f80b26e-download (1).jpeg', 6500.00, 'The International English Language Testing System (IELTS) is designed to help you achieve your ambition of working, studying or moving to a country where English is spoken.\r\n', '2023-12-18 18:44:08'),
(4, 'IELTS 2', 5, 9, 'course_photos/658094ed544a1-download (1).jpeg', 3455.00, 'IELTS 2', '2023-12-18 18:52:29'),
(5, 'Devops', 1, 7, 'course_photos/658099bdb8a9e-images.jpeg', 3400.00, 'wfwrf bd fb  dgbdb', '2023-12-18 19:13:01'),
(6, 'linux advance', 3, 7, 'course_photos/65809df7162df-download.jpeg', 2340.00, 'linux advance', '2023-12-18 19:31:03'),
(7, 'advanch machine learning', 6, 14, 'course_photos/658d191be2514-google-what-is-machine-learning-1700045847.jpg', 4500.00, 'advanch machine learning', '2023-12-28 06:43:39'),
(8, 'IELTS 5', 5, 11, 'course_photos/6593dc2b7c8a6-google-what-is-machine-learning-1700045847.jpg', 4500.00, 'IELTS 5', '2024-01-02 09:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `course2`
--

CREATE TABLE `course2` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_type` int(11) NOT NULL,
  `instructor` int(11) NOT NULL,
  `cover_photo` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `course_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `course_sale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course2`
--

INSERT INTO `course2` (`id`, `course_name`, `course_type`, `instructor`, `cover_photo`, `price`, `course_description`, `created_at`, `course_sale`) VALUES
(2, 'Python Full Course', 3, 7, 'course_photos/65783415c5624-1_slHeZngyeUr7ypEz7MNL5w.png', 2300.00, 'egerrg rgeg grtgr regrhgr', '2023-12-12 04:21:09', 5),
(3, 'IELTS ', 5, 10, 'course_photos/658092f80b26e-download (1).jpeg', 6500.00, 'The International English Language Testing System (IELTS) is designed to help you achieve your ambition of working, studying or moving to a country where English is spoken.\r\n', '2023-12-18 12:44:08', 4),
(5, 'Devops', 1, 7, 'course_photos/658099bdb8a9e-images.jpeg', 3400.00, 'wfwrf bd fb  dgbdb', '2023-12-18 13:13:01', 2),
(6, 'linux advance', 3, 7, 'course_photos/65809df7162df-download.jpeg', 2340.00, 'linux advance', '2023-12-18 13:31:03', 1),
(7, 'advanch machine learning', 6, 14, 'course_photos/658d191be2514-google-what-is-machine-learning-1700045847.jpg', 4500.00, 'advanch machine learning', '2023-12-28 00:43:39', 6),
(9, 'Python Full Course 2', 2, 13, 'course_photos/6593dfa5bfda5-google-what-is-machine-learning-1700045847.jpg', 6500.00, 'Python Full Course 2', '2024-01-02 10:04:21', 1),
(10, 'Linux Advance', 7, 15, 'course_photos/65941be0c677f-download.jpeg', 4799.00, 'Linux Advance full course', '2024-01-02 14:21:20', 2),
(13, 'AWS Full course', 10, 16, 'course_photos/6594e829ec277-AWS_BlogImage.png', 4500.00, 'AWS Full course', '2024-01-03 04:52:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_cover_photo` varchar(255) NOT NULL,
  `course_description` text NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_cover_photo`, `course_description`, `price`) VALUES
(1, 'Python Full Course', 'uploads/maxresdefault.jpg', 'Master Python by building 100 projects in 100 days. Learn data science, automation, build websites, games and apps!', 3000.00),
(3, 'AWS Certified Solutions Architect - Associate', 'uploads/AWS-Certified-Solutions-Architect-Associate.jpg', 'Want to pass the NEW AWS Solutions Architect - Associate Exam? (SAA-C03) In-depth AWS Architectures. Take this course', 6000.00),
(4, 'AWS Certified Solutions Architect - Associate', '../../uploads/AWS-Certified-Solutions-Architect-Associate.jpg', 'Want to pass the NEW AWS Solutions Architect - Associate Exam? (SAA-C03) In-depth AWS Architectures. Take this course', 5500.00),
(5, 'AWS Certified Solutions Architect - Associate', '/opt/lampp/htdocs/E-Learning_platform/html_file/admin/uploads/AWS-Certified-Solutions-Architect-Associate.jpg', 'Want to pass the NEW AWS Solutions Architect - Associate Exam? (SAA-C03) In-depth AWS Architectures. Take this course', 5000.00);

-- --------------------------------------------------------

--
-- Table structure for table `Instructors`
--

CREATE TABLE `Instructors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `email_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Instructors`
--

INSERT INTO `Instructors` (`id`, `name`, `email`, `dob`, `password`, `profile_picture`, `bio`, `email_type`) VALUES
(7, 'Ismail Khalil', 'ismail.k.aiub@gmail.com', '2023-12-21', '1122334455', 'teacher/65782a288ba78-20220310_123316 (1).jpg', 'ghfberi ejfn eijrnfe fner kj\r\nerfneri rkjenfke fi ', 'not verified'),
(10, 'munzereen shahid', 'munzereen.shahid@gmail.com', '1995-06-07', '11223344', 'teacher/658092a06ed57-1607378729683.jpeg', 'Bangladesh’s famous digital education guru Munzereen Shahid was born on October 19, 1996 in Chittagong district. She is a talented and budding online content creator and a renowned educator at Ten Minute School. ', 'not verified'),
(11, 'sadman rahman', 'sadman@gmail.com', '2023-12-13', '11223344', 'teacher/658734aac481f-182530543_269531661566379_761471244124872959_n.jpg', 'sadman rahman', 'not verified'),
(12, 'sadman hasan', 'sadminhasan@gmail.com', '2023-12-14', '11223344', 'teacher/658735dce6326-399698942_2064396577242988_1331299207217851428_n.jpg', 'sadman hasan', 'not verified'),
(13, 'salman hossain', 'salman@gmail.com', '2023-12-12', '11223344', 'teacher/65873618dce25-182530543_269531661566379_761471244124872959_n.jpg', 'salman hossain', 'not verified'),
(14, 'Md. hasan', 'hasan@gmail.com', '2023-12-13', '1122334455', 'teacher/658d188a249b7-1678462597572.jpeg', 'Md. hasan', 'not verified'),
(15, 'Md. Sadril Ahmed', 'sadril@gmail.com', '2024-01-16', '11223344', 'teacher/65941b95b2948-1678462597572.jpeg', 'Md. Sadril Ahmed', 'not verified'),
(16, 'Samin Abrar', 'samin@gmail.com', '2024-01-19', '11223344', 'teacher/6594579eb0ac7-399698942_2064396577242988_1331299207217851428_n.jpg', 'Samin Abrar', 'not verified'),
(17, 'Jesmin Akter', 'jesmin@gmail.com', '2024-01-18', '11223344', 'teacher/6594e24b8d4c5-images.jpeg', 'Jesmin Akter', 'not verified');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `upload_pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `book_name`, `cover_photo`, `author`, `description`, `upload_pdf`) VALUES
(9, 'Python For Beginners 10 th edi..', 'cover_photos/656b34ab1325c_maxresdefault.jpg', 'jon samul ali', 'Python For Beginners 10 th edi..', 'books/656b34ab132a7_RIP_CN_Fall_23_24.pdf'),
(10, 'AWS cloud computing', 'cover_photos/656b3608ded18_aws-solutions-architect.webp', 'sazzad hossain', 'AWS cloud computing 12th ed..', 'books/656b3608ded65_CN Lab Lecture Note 1 IP Addressing.pdf'),
(11, 'Python django For Beginners', 'cover_photos/656b3a7ab5481_pasted image 0.png', 'ss martin', 'Python django For Beginners', 'books/656b3a7ab54cf_BSc Curriculum CSE UGC - 2019 Final 22.pdf'),
(13, 'Inventory Management end 2.0', 'cover_photos/65770e9e44a58_inventory-management-8595e839c2884128997ca77f00a8da2b.jpg', 'jon samul ali', 'Inventory Management system end 2.0 ', 'books/65770e9e44a80_class assignment 20-42583-1.pdf'),
(14, 'MACHINE LEARNING', 'cover_photos/6580a1b07e261_download (2).jpeg', 'saiful islam', 'MACHINE LEARNING ', 'books/6580a1b07e495_Project_-Weather-Prediction-Using-Classification-Model-1.pdf'),
(15, 'advanched machine learning', 'cover_photos/658d19f2d15bf_google-what-is-machine-learning-1700045847.jpg', 'ss martin', 'advanched machine learning', 'books/658d19f2d165d_thebook.pdf'),
(16, 'Operating System', 'cover_photos/65941cc198cc7_download.jpeg', 'jon martin', 'Operating System', 'books/65941cc198d0d_Lecture Slide 04_KNN Classifer_summer 2023.pdf'),
(17, 'AWS cloud computing', 'cover_photos/65945863b4f35_AWS-Certified-Solutions-Architect-Associate.jpg', 'saifullah islam', 'AWS cloud computing', 'books/65945863b4f52_Group 7.pdf'),
(18, 'Networking all', 'cover_photos/6594e344739ce_pasted image 0.png', 'jon samul', 'Networking all', 'books/6594e344739f7_AWS-Certified-Solutions-Architect-Associate_Exam-Guide.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `noticename` varchar(255) NOT NULL,
  `date_op` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `noticename`, `date_op`, `description`) VALUES
(1, 'holiday', '2023-11-17', 'all class is canceled'),
(5, 'makeup class', '2023-12-14', 'grdr cbx cbdb '),
(6, 'class canceled', '2023-12-20', 'all class canceled'),
(7, 'makeup class	', '2024-01-03', '2 makeup class	');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `purchase_id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `course_price` decimal(10,2) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_history`
--

INSERT INTO `purchase_history` (`purchase_id`, `course_name`, `course_id`, `course_price`, `phone_number`, `transaction_id`, `customer_name`) VALUES
(2, 'advanch machine learning', 7, 4500.00, '01776090972', 'AKU30O1819', 'Ismail Khalil'),
(3, 'IELTS ', 3, 6500.00, '01776090972', 'AKU30O1819', 'Md. Ismail Khalil'),
(4, 'linux advance', 6, 2340.00, '01776090972', 'AKU30O1819', 'ismail'),
(5, 'Python Full Course 2', 9, 6500.00, '017760909745', 'AKU30O1819', 'ismail'),
(6, 'Python Full Course', 2, 2300.00, '01776090972', 'AKU30O1819', 'Ismail Khalil'),
(7, 'IELTS ', 3, 6500.00, '017760909745', 'AKU30O1819', 'Md. Ismail Khalil'),
(8, 'advanch machine learning', 7, 4500.00, '01776090972', 'AKU30O18145', 'Md. Ismail Khalil'),
(9, 'Linux Advance', 10, 4799.00, '01776090972', 'AKU30O1453', 'Rahim'),
(10, 'Python Full Course', 2, 2300.00, '01776090972', 'AKU30O1819', 'Ismail Khalil'),
(11, 'Python Full Course', 2, 2300.00, '01776090972', 'AKU30O1819', 'Md. Ismail Khalil'),
(12, 'IELTS ', 3, 6500.00, '01776090972', 'AKU30O1819', 'Ismail Khalil'),
(13, 'IELTS ', 3, 6500.00, '01776090972', 'AKU30O1819', 'Ismail Khalil'),
(14, 'Devops', 5, 3400.00, '01776090972', 'AKU30O1819', 'Ismail Khalil'),
(15, 'Devops', 5, 3400.00, '01776090972', 'AKU30O1819', 'Md. Ismail Khalil'),
(16, 'linux advance', 6, 2340.00, '01776090972', 'AKU30O1819', 'Md. Ismail Khalil'),
(17, 'linux advance', 6, 2340.00, '01776090972', 'AKU30O1819', 'ismail'),
(18, 'advanch machine learning', 7, 4500.00, '017760909745', 'AKU30O1453', 'Md. Ismail Khalil'),
(19, 'Python Full Course 2', 9, 6500.00, '017760909745', 'AKU30O1453', 'ismail'),
(20, 'Linux Advance', 10, 4799.00, '01776090972', 'AKU30O1453', 'test'),
(21, 'Python Full Course', 2, 2300.00, '01776090972', 'AKU30O1819', 'Ismail Khalil'),
(22, 'Python Full Course', 2, 2300.00, '01776090972', 'AKU30O1819', 'Ismail Khalil'),
(23, 'Python Full Course', 2, 2300.00, '01776090972', 'AKU30O1819', 'Ismail Khalil'),
(24, 'Python Full Course', 2, 2300.00, '01776090972', 'AKU30O1819', 'Md. Ismail Khalil'),
(25, 'advanch machine learning', 7, 4500.00, '01776090972', 'AKU30O1819', 'Ismail Khalil'),
(26, 'advanch machine learning', 7, 4500.00, '01776090972', 'AKU30O1819', 'Ismail Khalil'),
(27, 'advanch machine learning', 7, 4500.00, '01776090972', 'AKU30O1819', 'Ismail Khalil'),
(28, 'advanch machine learning', 7, 4500.00, '01776090972', 'AKU30O1819', 'Ismail Khalil'),
(29, 'Python Full Course 2', 9, 6500.00, '01776090972', 'AKU30O1819', 'Ismail Khalil'),
(30, 'Python Full Course', 2, 2300.00, '01776090972', 'AKU30O1819', 'Md. Ismail Khalil'),
(31, 'IELTS ', 3, 6500.00, '01776090972', 'AKU30O1819', 'Md. Ismail Khalil'),
(32, 'Cloud Computing', 11, 4599.00, '01776090972', 'AKU30O1819', 'ismail'),
(33, 'Cloud Computing', 11, 4599.00, '01776090972', 'AKU30O1819', 'ismail'),
(34, 'Networking full course', 12, 4500.00, '01776090972', 'AKU30O1453', 'Ismail Khalil'),
(35, 'AWS Full course', 13, 4500.00, '01776090972', 'AKU30O1819', 'Ismail Khalil');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_history2`
--

CREATE TABLE `purchase_history2` (
  `purchase_id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `course_price` decimal(10,2) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `unique_id` int(50) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` int(50) NOT NULL,
  `verification_status` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_list`
--
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `admin_list2`
--
ALTER TABLE `admin_list2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `Ballance`
--
ALTER TABLE `Ballance`
  ADD PRIMARY KEY (`ballance_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course2`
--
ALTER TABLE `course2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Instructors`
--
ALTER TABLE `Instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `purchase_history2`
--
ALTER TABLE `purchase_history2`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_list2`
--
ALTER TABLE `admin_list2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Ballance`
--
ALTER TABLE `Ballance`
  MODIFY `ballance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course2`
--
ALTER TABLE `course2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Instructors`
--
ALTER TABLE `Instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `purchase_history2`
--
ALTER TABLE `purchase_history2`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
