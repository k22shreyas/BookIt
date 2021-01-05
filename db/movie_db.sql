-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2021 at 09:13 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `TAX_CALC` ()  BEGIN
DECLARE ch_done INT DEFAULT 0;
DECLARE C_A INT(10);
DECLARE C_B INT(10);
DECLARE C_net_amt DEC(10,2);

DECLARE C_Tprice CURSOR FOR
SELECT `price` AS A,`movie_id` AS B FROM `movie` WHERE `net_amt` IS NULL 
FOR UPDATE;

DECLARE CONTINUE HANDLER FOR NOT FOUND SET ch_done = 1;

OPEN C_Tprice;
FETCH C_Tprice INTO C_A,C_B;
SET C_net_amt=C_A + (C_A*0.08);
UPDATE `movie` SET `net_amt`=C_net_amt where `movie_id`=C_B;

CLOSE C_Tprice;

IF(ch_done = 1) THEN 
        -- handle the No data error!
        SELECT 'Oh no!';
    END IF;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admi`
--

CREATE TABLE `admi` (
  `username` varchar(20) NOT NULL,
  `pword` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admi`
--

INSERT INTO `admi` (`username`, `pword`) VALUES
('admin', 'admin');

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
(37, 'SDFjsdf', 'ksDFljn', 'askjnFN', 45, 'sDFHsdfhkj', 90, 8, 97),
(38, 'sdfsdf', 'uiouou', 'ewwrew', 12, 'bnmbnmb', 34, 8, 37),
(39, 'adsaf', 'ioio', 'tyty', 5, 'opopo', 67, 8, 72),
(40, 'qwqeqe', 'werwerw', 'rttry', 3, 'wereerrty', 500, 8, 90),
(41, 'ttttt', 'uuuuuu', 'yyyyyy', 88, 'oooooooo', 20, 8, 22),
(42, 'qqqqqqqq', 'eeeeeeeeee', 'wwwwwwwwwww', 44, 'aaaaaaaaaa', 123, 8, 133),
(43, 'ww', 'e', 'q', 2, 'a', 99, 8, 107),
(44, 'p', 'p', 'o', 9, 'l', 40, 8, 43),
(45, 'b', 'y', 't', 4, 'x', 30, 8, 32),
(51, 'Titanic', 'English', 'Drama', 10, 'eno ond', 444, 8, 480),
(52, 'ggggg', 'hbjh', 'yu', 5, 'vihbkj', 511, 8, 552),
(53, 'mmmmm', 'mmmm', 'mmmmm', 2, 'mmm', 100, 8, 108),
(55, 'qwerty', 'werwer', 'sdfsg', 56, 'bnmvbnnm', 2220, 8, 2398);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `seat_id` int(5) NOT NULL,
  `date_time` datetime NOT NULL,
  `movie_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `no_seat` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`seat_id`, `date_time`, `movie_id`, `user_id`, `no_seat`) VALUES
(1, '2020-12-09 16:00:00', 5, 9, 0),
(2, '2020-12-09 16:00:00', 5, 9, 0),
(3, '2020-12-15 16:00:00', 3, 9, 0),
(4, '2020-12-08 16:00:00', 3, 9, 0),
(5, '2020-12-30 16:00:00', 5, 9, 0),
(7, '2020-12-17 19:00:00', 20, 9, 0),
(8, '2020-12-30 16:00:00', 20, 9, 0),
(9, '2020-12-31 10:00:00', 22, 9, 0),
(10, '2021-01-01 13:00:00', 25, 9, 0),
(11, '2020-12-30 16:00:00', 25, 9, 0),
(12, '2020-12-31 13:00:00', 25, 9, 0),
(13, '2021-01-13 16:00:00', 27, 29, 4),
(14, '2021-01-13 13:00:00', 29, 29, 3),
(15, '2021-01-05 13:00:00', 25, 29, 2),
(16, '2021-01-19 13:00:00', 51, 29, 1),
(17, '2021-01-15 16:00:00', 27, 29, 10),
(18, '2021-01-20 22:00:00', 51, 30, 1),
(19, '2021-01-29 16:00:00', 27, 30, 2),
(20, '2021-01-06 13:00:00', 28, 30, 5),
(21, '2021-01-06 16:00:00', 27, 30, 4),
(22, '2021-01-15 16:00:00', 35, 30, 4),
(23, '2021-01-06 13:00:00', 30, 30, 4),
(24, '2021-01-07 13:00:00', 27, 30, 5),
(25, '2021-01-09 22:00:00', 51, 30, 2),
(26, '2021-01-09 22:00:00', 51, 30, 5),
(27, '2021-01-03 13:00:00', 28, 30, 6),
(28, '2021-01-09 10:00:00', 41, 30, 3),
(29, '2021-01-13 13:00:00', 28, 29, 5);

-- --------------------------------------------------------

--
-- Table structure for table `snacks`
--

CREATE TABLE `snacks` (
  `seat_id` int(11) NOT NULL,
  `popcorn` int(5) NOT NULL,
  `drink` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `snacks`
--

INSERT INTO `snacks` (`seat_id`, `popcorn`, `drink`) VALUES
(13, 1, 2),
(18, 3, 4),
(18, 5, 1),
(18, 1, 2),
(20, 2, 3),
(28, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `movie_name` varchar(20) DEFAULT NULL,
  `show_time` datetime DEFAULT NULL,
  `no_of_seats` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pword` varbinary(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `username`, `pword`, `phone`, `email`) VALUES
(29, 'rajat raj', 'rajat', 0x71c8c2b58bfa448ce9480d0114b7c869, 73450395, 'gmail@rajat.com'),
(30, 'shreyask', 'shreyas', 0xae6cf97f1d1e1d949b5e950798a7a283, 123456789, 'gmail@shreyas.com');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `pass_crypt` BEFORE INSERT ON `user` FOR EACH ROW SET new.pword := AES_ENCRYPT(new.pword,'kar')
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admi`
--
ALTER TABLE `admi`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `snacks`
--
ALTER TABLE `snacks`
  ADD KEY `seat_id` (`seat_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `seat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `snacks`
--
ALTER TABLE `snacks`
  ADD CONSTRAINT `snacks_ibfk_1` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`seat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
