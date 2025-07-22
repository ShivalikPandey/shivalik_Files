-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 05, 2025 at 04:58 AM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u617409277_color_game`
--

-- --------------------------------------------------------

--
-- Table structure for table `store_transactions`
--

CREATE TABLE `store_transactions` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `status` enum('completed','pending','failed','refunded') DEFAULT 'pending',
  `product_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`product_details`)),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_queries`
--

CREATE TABLE `support_queries` (
  `query_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(20) DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `resolved_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_queries`
--

INSERT INTO `support_queries` (`query_id`, `user_id`, `message`, `status`, `created_at`, `resolved_at`) VALUES
(2, 1008, 'Hi', 'pending', '2025-04-17 09:48:16', NULL),
(3, 1008, 'Ok', 'pending', '2025-04-17 09:48:31', NULL),
(4, 1021, 'I am not able to withdraw', 'pending', '2025-04-17 13:04:10', NULL),
(5, 1013, 'None', 'pending', '2025-06-17 10:05:44', NULL),
(6, 1008, 'Fraud game', 'pending', '2025-06-17 12:14:54', NULL),
(7, 1008, 'I am not able to withdraw', 'pending', '2025-06-28 13:08:54', NULL),
(8, 1008, 'Ngh', 'pending', '2025-07-02 09:17:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usersdata`
--

CREATE TABLE `usersdata` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL,
  `balance` int(255) NOT NULL DEFAULT 5,
  `timmer` int(11) DEFAULT 30,
  `transaction` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersdata`
--

INSERT INTO `usersdata` (`id`, `name`, `email`, `number`, `timestamp`, `password`, `balance`, `timmer`, `transaction`) VALUES
(1008, 'shivalik', 'shivalik@gmail.com', '8126905614', '2025-04-10 06:20:45', '123456789', 1562, 1744731750, 1000),
(1013, 'Shivalik pandey ', 'shouravshivalik@gmail.com', '8433104494', '2025-04-15 17:44:32', '8433104495', 5, 30, NULL),
(1014, 'Saukhyam  Yadav ', 'saukhyam821@gmail.com', '8218467609', '2025-04-16 02:47:20', 'saukhyam99', 5, 30, NULL),
(1016, 'Vivek yadav ', 'shailendrn7080@gmail.com', '9897480194', '2025-04-16 04:11:04', 'shivaboss', 5, 30, NULL),
(1017, 'Shivalik pandey', 'abhifailure399@gmail.com', '7055842023', '2025-04-16 07:05:33', 'shiva6397', 0, 30, NULL),
(1018, 'game mekar', 'gmaker682@gmail.com', '09867874195', '2025-04-16 07:25:25', '123123', 5, 30, NULL),
(1020, 'Priya ', 'shailendran617@gmail.com', '9760803731', '2025-04-16 07:28:39', '123456', 5, 30, NULL),
(1021, 'Shourav', 'shourav@gmail.com', '8266808125', '2025-04-16 07:40:01', '123456', 3, 30, NULL),
(1022, 'Jyoti Markande', 'jyotimarkand08@gmail.com', '6267887838', '2025-04-21 10:47:45', '12345aryan', 0, 30, NULL),
(1023, 'Shivam ', 'himanisex13sath@gmail.com', '7988312135', '2025-04-24 15:28:38', 'Shivam12p', 5, 30, NULL),
(1024, 'Shajjad', 's81675154@gmail.com', '01889158857', '2025-06-27 11:48:05', 'Ebrahim123', 5, 30, NULL),
(1025, 'Pardeep', 'pardeepxdhaliwal23@gmail.com', '7986753927', '2025-06-28 07:07:28', 'Pardeepop90', 0, 30, NULL),
(1026, '7063743538', 'mandalavijits143@gmail', '7063743538', '2025-06-29 03:17:51', 'Debi@123', 5, 30, NULL),
(1027, 'Gokul', 'fraudpaiyagokul@gmail.com', '6369677421', '2025-06-30 13:38:17', 'fraudpaiyagokul', 5, 30, NULL),
(1028, 'TARAL sushil kumar ', 'taralsushil72@gmail.com', '8238905742', '2025-06-30 16:35:11', '78638025', 5, 30, NULL),
(1029, 'Ayan 11', 'ayandiwan.7861@gmail.com', '9512037913', '2025-07-01 08:30:25', '@Ayan123', 0, 30, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `store_transactions`
--
ALTER TABLE `store_transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_transaction_date` (`transaction_date`),
  ADD KEY `idx_status` (`status`);

--
-- Indexes for table `support_queries`
--
ALTER TABLE `support_queries`
  ADD PRIMARY KEY (`query_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `usersdata`
--
ALTER TABLE `usersdata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_userdata_email` (`email`),
  ADD UNIQUE KEY `uk_userdata_number` (`number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `store_transactions`
--
ALTER TABLE `store_transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_queries`
--
ALTER TABLE `support_queries`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usersdata`
--
ALTER TABLE `usersdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1030;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `store_transactions`
--
ALTER TABLE `store_transactions`
  ADD CONSTRAINT `store_transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usersdata` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `support_queries`
--
ALTER TABLE `support_queries`
  ADD CONSTRAINT `support_queries_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usersdata` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
