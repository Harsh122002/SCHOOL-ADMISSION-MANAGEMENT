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
-- Database: `db_admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `sname` varchar(200) NOT NULL,
  `gname` varchar(200) NOT NULL,
  `birth_data` varchar(15) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `class` varchar(40) NOT NULL,
  `shift` varchar(250) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `blgroup` varchar(5) NOT NULL,
  `District` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Pincode` varchar(10) NOT NULL,
  `Caste` varchar(11) NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `document_path` varchar(255) NOT NULL,
  `photo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `sname`, `gname`, `birth_data`, `contact`, `email`, `address`, `class`, `shift`, `gender`, `blgroup`, `District`, `State`, `Pincode`, `Caste`, `photo_path`, `document_path`, `photo`) VALUES
(13, 'chavada harsh', 'rakeshbhai', '', '8401247733', 'chavadaharsh22@gmail.com', 'dgvdf', 'KJ', 'Secondery S', 'male', 'A+', ' Ahmedabad', 'Gujarat', '362001', 'Ews', 'uploads/photos/1701065412_Photo_page-0001.jpg', 'uploads/documents/1701065412_12 th lc.PDF', NULL),
(14, 'Suva Nitin', 'Ramshibhai', '2023-12-29', '8000203540', 'nitin.ahir6@gmail.com', 'hhchhhx', '2  Standard', 'Primary(1 to 8)', 'male', 'A+', 'Rajkot', 'Gujarat', '360520', 'SEBC/OBC', 'uploads/photos/1702016068_Screenshot 2023-11-02 145052.png', 'uploads/documents/1702016068_Bank passbook.PDF', NULL),
(19, 'chavada harsh', 'Rakeshbhai', '', '8401247733', 'harsh.chavada@ngivbt.edu.in', 'balaji krupa joshipara junagahd', '4  Standar', 'Higher Secondery School(11 to 12)(Science)', 'male', 'A+', 'Bharuch', 'Gujarat', '354925', 'Ews', 'uploads/photos/1701786835_hdo.JPG', 'uploads/documents/1701786835_Caste cerifice.PDF', NULL),
(24, 'chavada harsh', 'rakeshbhai', '2023-12-01', '8401247733', 'chavadarakesh22@gmail.com', 'junagadh', '8  Standard', 'Higher Secondery School(11 to 12)(Science)', 'male', 'O+', 'Mehsana', 'Gujarat', '362001', 'SEBC/OBC', 'uploads/photos/1704126543_Photo_page-0001.jpg', 'uploads/documents/1704126543_12 th lc.PDF', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(40) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `name`, `email`, `order_id`, `payment_id`, `amount`, `status`, `created_at`) VALUES
(1, '', '', 'order_NJ0J7f1s1VhmwZ', '', 120.00, 'Success', '2023-12-31 15:35:26'),
(2, '', '', 'order_NJ0Mw7YotEbzVN', '', 120.00, 'Success', '2023-12-31 15:39:02'),
(3, '', '', 'order_NJ0NgDapwYBp8Z', '', 120.00, 'Success', '2023-12-31 15:39:45'),
(4, '', '', 'order_NJ0b9AUThMGKkW', '', 120.00, 'Success', '2023-12-31 15:52:29'),
(5, '', '', 'order_NJ0cBry2unwd3M', '', 120.00, 'Success', '2023-12-31 15:53:29'),
(6, '', '', 'order_NJ0d3sCHDOh43n', '', 120.00, 'Success', '2023-12-31 15:54:18'),
(7, '', '', 'order_NJ0lR4qF5qwY5O', '', 120.00, 'Success', '2023-12-31 16:02:14'),
(8, '', '', 'order_NJ0odzImyZEU0g', '', 120.00, 'Success', '2023-12-31 16:05:16'),
(9, '', '', 'order_NJ19NVZxLl0elt', 'PAYPAY659195d4715453.8410438218bc09ff', 120.00, 'Pending', '2023-12-31 16:24:54'),
(10, '', '', 'order_NJ1AKZcemL297I', 'PAYPAY6591960acb4655.62865335755ce445', 120.00, 'Pending', '2023-12-31 16:25:48'),
(13, '', '', 'order_NJ1EpUYzvFswIp', 'PAYPAY65919709259217.31519567c9b4d61f', 120.00, 'Pending', '2023-12-31 16:30:03'),
(14, '', '', 'order_NJ1Hg0NIrF758I', 'PAYPAY659197abb136a8.022084037e7ecac3', 120.00, 'Pending', '2023-12-31 16:32:45'),
(15, '', '', 'order_NJ1JoznajcO0hR', 'PAYPAY659198258fa7e1.74868478a8fecca3', 120.00, 'Pending', '2023-12-31 16:34:47'),
(16, '', '', 'order_NJ1M9p2MACIkou', 'PAYPAY659198aa462209.18035592f32649d5', 120.00, 'Pending', '2023-12-31 16:37:00'),
(18, '', '', 'order_NJ1RC59XB1dhJ8', '', 120.00, 'Success', '2023-12-31 16:41:46'),
(21, '', '', 'order_NJ1n0WkzE1kWdm', '', 120.00, 'Success', '2023-12-31 17:02:25'),
(25, '', '', 'order_NJ22nO32TBYMLb', '', 120.00, 'Success', '2023-12-31 17:17:22'),
(26, '', '', 'order_NJ27uuwjsH37IF', '', 120.00, 'Success', '2023-12-31 17:22:13'),
(27, '', '', 'order_NJ287FzEnY9iaj', '', 120.00, 'Success', '2023-12-31 17:22:24'),
(30, '', '', 'order_NJ2KOwZy3jVM47', 'PAYPAY6591a60882e4c4.5975444899015f19', 120.00, 'success', '2023-12-31 17:34:02'),
(31, '', '', 'order_NJ2LmSX2e8mmsH', '', 120.00, 'Success', '2023-12-31 17:35:21'),
(32, '', '', 'order_NJ2OyLwB043dBV', 'PAYPAY6591a70bee53b1.71854012651777b7', 120.00, 'success', '2023-12-31 17:38:21'),
(33, 'harsh', 'chavada@gmail.com', 'order_NJ2nC7HCHtSSyn', 'PAYPAY6591ac69eaf824.8435663822830c20', 120.00, 'success', '2023-12-31 18:01:18'),
(35, 'rakesh1', 'chavadarakesh22@gmail.com', 'order_NJKucS3d5bcgHU', 'PAYPAY6592a5ae7fde65.07094632b789aad9', 5000.00, 'success', '2024-01-01 11:44:48'),
(36, 'rakesh1', 'chavadarakesh22@gmail.com', 'order_NJKucSqnXf1ife', 'PAYPAY6592a5ae4a0e95.82444380c215be54', 5000.00, 'success', '2024-01-01 11:44:48'),
(37, 'rakesh1', 'chavadarakesh22@gmail.com', 'order_NJPg7Cpq0mKhIQ', 'PAYPAY6592e73eb33a18.49873021dbd8697c', 5000.00, 'success', '2024-01-01 16:24:32'),
(38, 'rakesh1', 'chavadarakesh22@gmail.com', 'order_NJPl5JMmEYePyM', 'PAYPAY6592e8585e95f3.28746962950edb95', 5000.00, 'success', '2024-01-01 16:29:14'),
(39, 'rakesh1', 'chavadarakesh22@gmail.com', 'order_NKT9ez9qnghzUs', 'PAYPAY65966bf5510e12.293631645dba2b0b', 5000.00, 'success', '2024-01-04 08:27:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
