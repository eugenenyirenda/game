-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 01:09 PM
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
-- Database: `rock_paper_scissors`
--

-- --------------------------------------------------------

--
-- Table structure for table `game_history`
--

CREATE TABLE `game_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_move` varchar(10) NOT NULL,
  `computer_move` varchar(10) NOT NULL,
  `result` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_history`
--

INSERT INTO `game_history` (`id`, `user_id`, `user_move`, `computer_move`, `result`) VALUES
(1, 1, 'paper', 'scissors', 'Computer wins!'),
(2, 1, 'paper', 'scissors', 'Computer wins!'),
(3, 1, 'rock', 'scissors', 'You win!'),
(4, 1, 'paper', 'paper', 'It\'s a tie!'),
(5, 1, 'rock', 'paper', 'Computer wins!'),
(6, 1, 'paper', 'rock', 'You win!'),
(7, 1, 'scissors', 'paper', 'You win!'),
(8, 1, 'rock', 'paper', 'Computer wins!'),
(9, 1, 'paper', 'rock', 'You win!'),
(10, 1, 'scissors', 'rock', 'Computer wins!'),
(11, 1, 'paper', 'paper', 'It\'s a tie!'),
(12, 1, 'paper', 'scissors', 'Computer wins!'),
(13, 1, 'paper', 'scissors', 'Computer wins!'),
(14, 1, 'paper', 'paper', 'It\'s a tie!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Eugene Nyirenda', '$2y$10$LcB7GI.yUfXxF/0yXBcss.8E21WyjBCt1sRPquhucXjSd.3GIULLy'),
(2, 'Eugene Nyirenda', '$2y$10$3MGv5XxBXgVhSJCVqHNblOdLc473ZLJHgM2M10YAO66CZQXRaICoG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game_history`
--
ALTER TABLE `game_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game_history`
--
ALTER TABLE `game_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game_history`
--
ALTER TABLE `game_history`
  ADD CONSTRAINT `game_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
