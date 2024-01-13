-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 07:44 AM
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
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_data`
--

CREATE TABLE `login_data` (
  `login_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_otp` int(6) NOT NULL,
  `last_activity` datetime NOT NULL,
  `login_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login_data`
--

INSERT INTO `login_data` (`login_id`, `user_id`, `login_otp`, `last_activity`, `login_datetime`) VALUES
(17, 41, 141592, '2026-11-23 04:44:30', '2023-11-26 15:44:30'),
(18, 41, 854260, '2026-11-23 05:00:44', '2023-11-26 16:00:44'),
(19, 41, 140401, '2026-11-23 05:06:42', '2023-11-26 16:06:42'),
(20, 41, 510282, '2026-11-23 05:16:09', '2023-11-26 16:16:09'),
(21, 41, 498691, '2026-11-23 05:24:32', '2023-11-26 16:24:32'),
(22, 41, 180826, '2026-11-23 05:42:53', '2023-11-26 16:42:53'),
(23, 41, 318198, '2026-11-23 06:15:29', '2023-11-26 17:15:29'),
(24, 41, 120622, '2026-11-23 07:35:34', '2023-11-26 18:35:34'),
(25, 41, 135055, '2026-11-23 07:47:25', '2023-11-26 18:47:25'),
(26, 41, 367995, '2027-11-23 06:22:18', '2023-11-27 05:22:18'),
(27, 41, 616584, '2027-11-23 08:47:38', '2023-11-27 07:47:38'),
(28, 41, 343854, '2027-11-23 10:13:27', '2023-11-27 09:13:27'),
(29, 43, 958682, '2027-11-23 11:26:45', '2023-11-27 10:26:45'),
(30, 41, 670935, '2028-11-23 06:44:22', '2023-11-28 05:44:22'),
(31, 41, 931735, '2028-11-23 09:40:51', '2023-11-28 08:40:51'),
(32, 41, 213698, '2028-11-23 09:43:00', '2023-11-28 08:43:00'),
(33, 41, 489429, '2030-11-23 06:33:37', '2023-11-30 05:33:37'),
(34, 41, 728670, '2030-11-23 09:10:50', '2023-11-30 08:10:50'),
(35, 41, 211842, '2004-12-23 06:02:15', '2023-12-04 05:02:15'),
(36, 41, 714319, '2004-12-23 06:07:30', '2023-12-04 05:07:30'),
(37, 41, 957144, '2013-12-23 04:54:13', '2023-12-13 15:54:13'),
(38, 49, 731577, '2001-01-24 06:27:41', '2024-01-01 05:27:41'),
(39, 49, 827630, '2001-01-24 06:52:19', '2024-01-01 05:52:19'),
(40, 49, 446675, '2001-01-24 06:54:20', '2024-01-01 05:54:20'),
(41, 49, 588434, '2001-01-24 06:55:59', '2024-01-01 05:55:59'),
(42, 49, 279864, '2001-01-24 04:54:20', '2024-01-01 15:54:20'),
(43, 49, 799955, '2001-01-24 04:55:24', '2024-01-01 15:55:24'),
(44, 49, 353432, '2004-01-24 09:24:07', '2024-01-04 08:24:07'),
(45, 49, 477544, '2004-01-24 09:25:23', '2024-01-04 08:25:23'),
(46, 49, 937007, '2004-01-24 09:26:07', '2024-01-04 08:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `login_data1`
--

CREATE TABLE `login_data1` (
  `login_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_otp` int(6) NOT NULL,
  `last_activity` datetime NOT NULL,
  `login_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login_data1`
--

INSERT INTO `login_data1` (`login_id`, `user_id`, `login_otp`, `last_activity`, `login_datetime`) VALUES
(1, 1, 212065, '2030-11-23 07:19:35', '2023-11-30 15:34:30'),
(2, 1, 753433, '2030-11-23 04:35:30', '2023-11-30 15:35:30'),
(3, 1, 516393, '2030-11-23 04:49:31', '2023-11-30 15:49:31'),
(4, 1, 404072, '2001-12-23 06:18:26', '2023-12-01 17:18:26'),
(5, 1, 356984, '2014-12-23 10:59:12', '2023-12-14 09:59:12'),
(6, 1, 616603, '2014-12-23 11:03:12', '2023-12-14 10:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `register_school`
--

CREATE TABLE `register_school` (
  `register_user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_activation_code` varchar(250) NOT NULL,
  `user_email_status` enum('not verified','verified') NOT NULL,
  `user_otp` int(11) NOT NULL,
  `user_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `register_school`
--

INSERT INTO `register_school` (`register_user_id`, `user_name`, `user_email`, `user_password`, `user_activation_code`, `user_email_status`, `user_otp`, `user_datetime`, `user_avatar`) VALUES
(1, 'Name_school', 'chavadaharsh22@gmail.com', '$2y$10$kqXbIk1c8KZDVCbVbi2yLOxsC.yxpLMtc7tIxqAFMsIMIJx0eFEFq', 'a56e1725b98e81122697ca6a3e4b5ac6', 'verified', 157412, '2023-11-30 06:15:02', '');

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

CREATE TABLE `register_user` (
  `register_user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_activation_code` varchar(250) NOT NULL,
  `user_email_status` enum('not verified','verified') NOT NULL,
  `user_otp` int(11) NOT NULL,
  `user_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`register_user_id`, `user_name`, `user_email`, `user_password`, `user_activation_code`, `user_email_status`, `user_otp`, `user_datetime`, `user_avatar`) VALUES
(42, 'chavada rakesh', 'harsh.chavada@ngivbt.edu.in', '$2y$10$h1tY6Ly.NNFciMmu31hFWeCU1lzs7nYboQi7ddl/r1UAhCk.oGLH.', 'ab40000a13cf49a537840fe8eb029542', 'verified', 987424, '2023-11-26 05:32:42', 'avatar/1700976728_6562d8581b2e0.png'),
(49, 'rakesh', 'chavadarakesh22@gmail.com', '$2y$10$kNG/VFiEDqyth85115HXyuDg8Vn7vQXqC6Xi/fLQdpPCD1oUN/YLW', '32a850cd4d385d79bd2922cdc4bef931', 'verified', 653342, '2023-12-14 08:52:25', 'avatar/1702543917_657ac22dc41cb.png'),
(50, 'jaydeep', 'ribadiyajaydip007@gmail.com', '$2y$10$dr2nXQFwfE9u.WvGK0jMteWa4dYy3gTTzlGM9LyshAXBiRuj5yWZu', '5c77b88692cf5de67e08a90bbe03c570', 'verified', 885576, '2024-01-04 06:26:27', 'avatar/1704349562_65964f7a9f821.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_data`
--
ALTER TABLE `login_data`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `login_data1`
--
ALTER TABLE `login_data1`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `register_school`
--
ALTER TABLE `register_school`
  ADD PRIMARY KEY (`register_user_id`);

--
-- Indexes for table `register_user`
--
ALTER TABLE `register_user`
  ADD PRIMARY KEY (`register_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_data`
--
ALTER TABLE `login_data`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `login_data1`
--
ALTER TABLE `login_data1`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register_school`
--
ALTER TABLE `register_school`
  MODIFY `register_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
  MODIFY `register_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
