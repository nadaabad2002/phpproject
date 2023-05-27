-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 مايو 2023 الساعة 17:53
-- إصدار الخادم: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- بنية الجدول `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` enum('user','admin') NOT NULL,
  `created-at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`, `created-at`) VALUES
(17, 'nada', 'nada@gmail.com', '$2y$10$1tPBxwhlX.ms1nryh.7gceq/pWszzoptFRleH4r0CBj', 'user', '2023-05-27 16:15:25'),
(18, 'areej', 'areej@gmail.com', '$2y$10$NIG5mxZ9Ev/mMqHNA7nmbO8zDV91GWXfKMoltR7MVKc', 'admin', '2023-05-27 16:15:25'),
(19, 'aa', 'aa@aa', 'b3cd915d758008bd19d0f2428fbb354a', 'admin', '2023-05-27 16:15:25'),
(20, 'zead', 'zead@gmail.com', '6005c9b0ead25622aa471d81d5921bd4', 'user', '2023-05-27 16:40:01'),
(23, 'lll', 'l@l', '$2y$10$MvZBYIYmstINiTiMpgN2iOLmORVRPYapIlDVVIQknHS', 'admin', '2023-05-27 17:46:35'),
(24, 'q@q', 'q@q', 'c4055e3a20b6b3af3d10590ea446ef6c', 'admin', '2023-05-27 17:57:05'),
(25, 'nada', 'n@n', '7b8b965ad4bca0e41ab51de7b31363a1', 'admin', '2023-05-27 18:13:56'),
(26, 's', 's@s', '03c7c0ace395d80182db07ae2c30f034', 'user', '2023-05-27 18:19:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
