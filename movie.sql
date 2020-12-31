-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 10:30 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(5) NOT NULL,
  `movie_name` varchar(20) NOT NULL,
  `movie_lang` text NOT NULL,
  `movie_genre` text NOT NULL,
  `ratings` int(11) NOT NULL,
  `movie_des` text NOT NULL,
  `price` int(6) NOT NULL,
  `tax` int(11) NOT NULL DEFAULT 8,
  `net_amt` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_name`, `movie_lang`, `movie_genre`, `ratings`, `movie_des`, `price`, `tax`, `net_amt`) VALUES
(25, 'Avengers', 'ENGLISH', 'Fiction', 9, 'movie consisting of ironman capt america hulk spiderman thor and many more', 0, 8, 0),
(27, 'thor', 'english', 'action', 8, 'he who hold the hammer if he be worthy can posses the power of thor', 0, 8, 0),
(28, 'Lord Krishna', 'Sanskrit', 'hello', 10, 'story of Lord Krishna', 300, 8, 324),
(29, 'Lord Krishnag', 'Sanskritg', 'hellog', 103, 'story of Lord hKrishna', 304, 8, 328),
(30, 'dfgdfhd', 'dfgdg', 'fhgf', 56, 'cvcbxffgn', 234, 8, 253),
(31, 'fgdfg', 'bn gbn ', 'fghnn', 23, 'vbnnb', 345, 8, 373),
(32, 'rtyth', 'hjhkhj', 'fghfh', 5, 'ghjghjhj', 456, 8, 492),
(33, 'dfwsdf', 'asda', 'sdfs', 1, 'hgjxgh', 987, 8, 1066),
(34, 'qqqqwe', 'weref', 'rerer', 4, 'dsfdggdzfg', 999, 8, 1079),
(35, 'SDFjlsdf', 'lksDFljn', 'askjnFN', 45, 'sDFHsdfhkj', 90, 8, 97),
(36, 'SDFjlsdf', 'ksDFljn', 'askjnFN', 45, 'sDFHsdfhkj', 90, 8, 97),
(37, 'SDFjsdf', 'ksDFljn', 'askjnFN', 45, 'sDFHsdfhkj', 90, 8, 97),
(38, 'sdfsdf', 'uiouou', 'ewwrew', 12, 'bnmbnmb', 34, 8, 37),
(39, 'adsaf', 'ioio', 'tyty', 5, 'opopo', 67, 8, 72),
(40, 'qwqeqe', 'werwerw', 'rttry', 3, 'wereerrty', 500, 8, 90),
(41, 'ttttt', 'uuuuuu', 'yyyyyy', 88, 'oooooooo', 20, 8, 22),
(42, 'qqqqqqqq', 'eeeeeeeeee', 'wwwwwwwwwww', 44, 'aaaaaaaaaa', 123, 8, 133),
(43, 'ww', 'e', 'q', 2, 'a', 99, 8, 107),
(44, 'p', 'p', 'o', 9, 'l', 40, 8, 43),
(45, 'b', 'y', 't', 4, 'x', 30, 8, 32),
(46, 'qq', 'ee', 'ww', 33, 'we', 43, 8, 46),
(47, 'qqq', 'eee', 'www', 4, 'rrr', 555, 8, 599),
(48, 'kk', 'lk', 'kl', 8, 'klkl', 90, 8, 97),
(49, '', '', '', 0, '', 0, 8, 0),
(50, 'bbb', 'lll', 'yyy', 0, 'jkjk', 1234, 8, 1333);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
