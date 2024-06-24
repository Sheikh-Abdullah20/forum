-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 12:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(20) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created_date`) VALUES
(1, 'Python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation. ', '2024-06-20'),
(2, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language and core technology of the Web, alongside HTML and CSS. 99% of websites use JavaScript on the client side for webpage behavior. ', '2024-06-20'),
(3, 'Django', 'Django is a free and open-source, Python-based web framework that runs on a web server. It follows the model–template–views architectural pattern.', '2024-06-20'),
(4, 'Php', 'PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995. The PHP reference implementation is now produced by the PHP Group,', '2024-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(11) NOT NULL,
  `comment_by` varchar(255) NOT NULL,
  `comment_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, 'hi i am here', 1, '3', '2024-06-22'),
(2, '<script>Alert(\"Hi i am Hacker\")</script>', 1, '3', '2024-06-22'),
(3, '<script>Alert(\"Hi i am Hacker\")</script>', 1, '3', '2024-06-22'),
(4, 'a', 1, '3', '2024-06-23'),
(5, 'dasd', 1, '4', '2024-06-23'),
(6, 'adsad', 4, '4', '2024-06-23'),
(7, 'hi iam abdullah sheikh', 1, '5', '2024-06-23'),
(8, 'hi', 2, '5', '2024-06-23'),
(9, 'sadsadsa', 3, '5', '2024-06-23'),
(10, 'sadsadsa', 3, '5', '2024-06-23'),
(11, 'dsadsadasd', 3, '5', '2024-06-23'),
(12, 'dsadasdsa', 3, '5', '2024-06-23'),
(13, 'dsadsad', 3, '5', '2024-06-23'),
(14, 'sadsadsa', 3, '5', '2024-06-23'),
(15, 'das', 3, '5', '2024-06-23'),
(16, '', 3, '5', '2024-06-23'),
(17, 'dassad', 3, '5', '2024-06-23'),
(18, 'sure', 8, '5', '2024-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `contact-us`
--

CREATE TABLE `contact-us` (
  `id` int(11) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_password` varchar(255) NOT NULL,
  `problem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact-us`
--

INSERT INTO `contact-us` (`id`, `contact_email`, `contact_password`, `problem`) VALUES
(1, 'abdullah@gmail.com', '', 'adas'),
(2, 'abdullah@gmail.com', '', 'adas'),
(3, 'abdullah@gmail.com', '', 'adas'),
(4, 'abdullah@gmail.com', '', 'adas'),
(5, 'abdullah@gmail.com', '', 'adas'),
(6, 'abdullah@gmail.com', '', 'adas'),
(7, 'abdullah@gmail.com', '', '111');

-- --------------------------------------------------------

--
-- Table structure for table `forum_users`
--

CREATE TABLE `forum_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `joining_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum_users`
--

INSERT INTO `forum_users` (`user_id`, `username`, `user_email`, `user_password`, `joining_date`) VALUES
(2, 'Abdullah', 'abdullah1@gmail.com', '$2y$10$DcZaRP/S7TkialLI8rpq6eIf0XgCItAY5SNHtLh62VDt2n7JD1INe', '2024-06-22'),
(3, 'Abdullah2', 'abdullah2@gmail.com', '$2y$10$In2zO/qTyxaEQSxqtOQlKu58kSO/evWLvmkSicW7GOqZydkjOSlhu', '2024-06-22'),
(4, '@bdullah', 'abdullahsheikhmuhammad21@gmail.com', '$2y$10$c3T1qhYVPhMPXk6JFOrP8.6hNDid7RUvKVnTh9tuLLEF4W/J9cKgq', '2024-06-23'),
(5, 'abdullah sheikh', 'abdullah3@gmail.com', '$2y$10$rXBi.2umNgeQIj/uC8Xpueo4cBPSG6T5rpts8Axn4h8Ko1sWFH10y', '2024-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `thread_id` int(11) NOT NULL,
  `thread_titile` varchar(255) NOT NULL,
  `thread_description` text NOT NULL,
  `thread_cat_id` int(11) NOT NULL,
  `thread_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`thread_id`, `thread_titile`, `thread_description`, `thread_cat_id`, `thread_user_id`) VALUES
(1, 'hello', 'i am abdullah1', 1, 2),
(2, 'hi', 'i am abdullah2', 1, 3),
(3, 'hi', 'i am abdullah2 again\r\n', 1, 3),
(4, 'hi', '<script>Alert(\"Hi i am Hacker\")</script>', 1, 3),
(5, 'aa', 'aa', 1, 4),
(6, 'aa', 'aa', 1, 4),
(7, 'aaa', 'hi iam abdullah sheikh', 1, 5),
(8, 'hi', ' i need help in js', 2, 5),
(9, 'want to learn django', 'i need help', 3, 5),
(10, 'want to learn django', 'i need help', 3, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact-us`
--
ALTER TABLE `contact-us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_users`
--
ALTER TABLE `forum_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`thread_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact-us`
--
ALTER TABLE `contact-us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `forum_users`
--
ALTER TABLE `forum_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
