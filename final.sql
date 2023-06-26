-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2023 at 11:43 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `chat` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `user_id`, `chat`, `created_at`) VALUES
(1, 30, 'hello', '2023-06-26 23:15:12'),
(2, 30, 'hi', '2023-06-26 23:15:22'),
(3, 30, 'hiz', '2023-06-26 23:16:37'),
(4, 30, 'how are u', '2023-06-26 23:16:45'),
(5, 30, 'hi', '2023-06-26 23:21:14'),
(6, 30, 'Mohamad ghoche', '2023-06-26 23:21:50'),
(7, 30, 'i m mohamad ghoche', '2023-06-26 23:22:14'),
(8, 30, 'is that you?', '2023-06-26 23:23:49'),
(9, 30, 'good>', '2023-06-26 23:23:56'),
(10, 30, '\"hekllo\"', '2023-06-26 23:24:03'),
(11, 30, 'i\"m ', '2023-06-26 23:24:25'),
(12, 20, 'hi', '2023-06-26 23:29:41'),
(13, 20, 'how are you', '2023-06-26 23:29:47'),
(14, 20, 'what are u doing?', '2023-06-26 23:30:02'),
(15, 20, 'ok by', '2023-06-26 23:30:36'),
(16, 20, 'ok', '2023-06-26 23:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `description` varchar(10000) NOT NULL,
  `post_img` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `description`, `post_img`, `created_at`) VALUES
(5, 27, 'im reine', '648776c6d0c90.jpg', '2023-06-12 19:49:26'),
(8, 20, 'hello', '6499900296c28.jpg', '2023-06-26 13:17:54'),
(9, 20, 'hi', '6499900cb2547.jpg', '2023-06-26 13:18:04'),
(15, 30, 'hellon world', '6499e2f75dff5.jpg', '2023-06-26 19:11:51'),
(16, 30, 'dani', '6499e367b9e27.jpg', '2023-06-26 19:13:43'),
(17, 20, 'hi', '649a202dd5e08.jpg', '2023-06-26 23:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `image`, `date`) VALUES
(18, 'mohamad', 'bachirmohamad96@gmail.com', '$2y$10$L/hFYPYUHT/KBsWXp70tvOk5FJnJi1dBst9oowyGcA2zs3aJCDKgy', '6473cc2656d31.jpg', '2023-05-28 21:48:22'),
(19, 'mhamad', 'ma95382@net.iul.edu.lb', '$2y$10$/W1tdS1J204n.g81pWkYcuyIt/OmRag2bXPwI2uvXzA7ER.I0iIeK', '6473d13551e0e.jpg', '2023-05-28 22:09:57'),
(20, 'reine', 'reine@gmail.com', '$2y$10$ZPl08OWwldsO3RC.4TBaYe943/Kvq17bv1RUfU/eSn7Mm4EHL7ILG', '6477b944dc7d2.jpg', '2023-05-31 21:16:52'),
(22, 'ssaid', 'said@gmail.com', '$2y$10$G.nGy1oMRZA4AU1CSkRqEu8UO97KnFxRrWdsYvjHBcoSEZsvXPk/2', '64784660f3c49.jpg', '2023-06-01 07:18:57'),
(23, 'mohamadawwad', 'mohamadawwad@gmail.com', '$2y$10$EJS3ropP3Uo48.nyO7GOPegCw5ZrYu/a91J9dxJ3HWZ9uiVLCt4cy', '647a18ca3bedc.jpg', '2023-06-02 16:28:58'),
(25, 'mohamad', 'mohamad@gmail.com', '$2y$10$5QMRswa/Gfk9BUD5KCGFyelqI.vddjzk1k9JpwrX/7FdDsMF5S6/G', '64817f5415de0.', '2023-06-08 07:12:20'),
(26, 'papa', 'papa@gmail.com', '$2y$10$rUx0Q0549BGoAhZK5H58AeD.EMAxgjKvo4o/C3hF2xY0DIuch7pze', '648724bf56d07.jpg', '2023-06-12 13:59:27'),
(27, 'reineghoche', 'reine1@gmail.com', '$2y$10$wtpH3In2dQhoY/eWStb51uXCVXAfypFbE13Wy/etUiwmEhl8vm6DC', '6487769cb0f09.jpg', '2023-06-12 19:48:44'),
(28, 'soso', 'soso@gmail.com', '$2y$10$uDc56ae8pubG/q.VaLJzre3pezk8YUQPAwV/6X0wt/D8GvbRnFcLm', '648aae9581b10.jpg', '2023-06-15 06:24:21'),
(29, 'zeinab', 'zeinab@gmail.com', '$2y$10$1V5/qCl0fZeRPyr1AAvgD.6VfZNVdcR3kmHP9LSfXYRG8FKz7pLAC', '64968aa751eb8.jpg', '2023-06-24 06:18:15'),
(30, 'mohamad', 'mhmd@gmail.com', '$2y$10$CIetWGC8kJwrnDjdlGoaueLr7cvm7Zoe51kosa9VLweZDrfY9fQZS', '6499d3174105b.jpg', '2023-06-26 18:04:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreignkeyy` (`user_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_ibfk_1` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `foreignkeyy` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
