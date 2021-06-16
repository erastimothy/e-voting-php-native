-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 09:58 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `photo` text NOT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `chart_color` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `dob`, `photo`, `visi`, `misi`, `chart_color`) VALUES
(2, 'Enim explicabo Veri', '1980-03-07', '409woman.jpg', '<p><strong>Aut sit, laboris sim.</strong></p>\r\n', '<p><strong>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Lorem ipsum dolor sit amet.</strong></li>\r\n	<li><strong>Lorem ipsum dolor sit amet.</strong></li>\r\n	<li><strong>Lorem ipsum dolor sit amet.</strong></li>\r\n	<li><strong>Lorem ipsum dolor sit amet.</strong></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '#fb0404'),
(3, 'Maxime qui adipisci ', '1982-12-06', '558man.jpg', '<p><strong>Et ea harum et venia.</strong></p>\r\n', '<p><strong>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Lorem ipsum dolor sit amet.</strong></li>\r\n	<li><strong>Lorem ipsum dolor sit amet.</strong></li>\r\n	<li><strong>Lorem ipsum dolor sit amet.</strong></li>\r\n	<li><strong>Lorem ipsum dolor sit amet.</strong></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '#0ef00a'),
(4, 'Debitis omnis ut eos', '1988-06-06', '812man.jpg', '<p>Tempor rem harum pla.</p>\r\n', '<p><strong>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Lorem ipsum dolor sit amet.</strong></li>\r\n	<li><strong>Lorem ipsum dolor sit amet.</strong></li>\r\n	<li><strong>Lorem ipsum dolor sit amet.</strong></li>\r\n	<li><strong>Lorem ipsum dolor sit amet.</strong></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '#0804fb');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(10) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Generated',
  `generated_at` timestamp NULL DEFAULT NULL,
  `used_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `status`, `generated_at`, `used_at`) VALUES
(1, '19307b', 'Used', '2021-05-16 04:27:44', '2021-05-16 04:31:53'),
(2, '74cbda', 'Used', '2021-05-16 04:27:46', '2021-05-16 05:05:49'),
(3, '01a7f2', 'Used', '2021-05-16 04:27:47', '2021-05-16 04:32:00'),
(4, '3a87de', 'Used', '2021-05-16 04:27:51', '2021-05-16 04:33:10'),
(5, 'd7f56d', 'Used', '2021-05-16 04:27:55', '2021-05-16 04:31:44'),
(6, 'a63cde', 'Generated', '2021-05-16 04:32:07', NULL),
(8, 'e70725', 'Generated', '2021-05-16 04:32:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$S11NCOQLoLVgsnM5s/87j.qaV3AjSduDDXynsIzrdE3wYCZ/KpBSq');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `token_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `voted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `token_id`, `candidate_id`, `voted_at`) VALUES
(1, 5, 2, '2021-05-16 04:31:44'),
(2, 1, 3, '2021-05-16 04:31:53'),
(3, 3, 4, '2021-05-16 04:32:00'),
(4, 4, 4, '2021-05-16 04:33:10'),
(5, 2, 2, '2021-05-16 05:05:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
