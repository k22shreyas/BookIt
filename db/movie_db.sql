-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2021 at 10:26 PM
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

DECLARE C_tax DEC(10,2);

DECLARE C_Tprice CURSOR FOR
SELECT `price` AS A,`movie_id` AS B FROM `movie` WHERE `net_amt` IS NULL 
FOR UPDATE;

DECLARE CONTINUE HANDLER FOR NOT FOUND SET ch_done = 1;

OPEN C_Tprice;
FETCH C_Tprice INTO C_A,C_B;

SET C_tax = 0.08;

SET C_net_amt=C_A + (C_A*C_tax);
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
(18, 'El Camino', 'English', 'Drama', 10, 'El Camino: A Breaking Bad Movie is a 2019 American neo Western crime thriller film that serves as a sequel and epilogue to the television series Breaking Bad', 400, 8, 432),
(19, 'Doctor Strange', 'English', 'Action', 7, 'Doctor Strange is a 2016 American superhero film based on the Marvel Comics character of the same name. Produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures, it is the 14th film in the Marvel Cinematic Universe', 350, 8, 378),
(20, 'Hobbit', 'English', 'Adventure', 10, 'The Hobbit is a film series consisting of three high fantasy adventure films directed by Peter Jackson. The three films are The Hobbit: An Unexpected Journey, The Hobbit: The Desolation of Smaug, and The Hobbit: The Battle of the Five Armies', 410, 8, 443),
(21, 'Godzilla', 'English', 'Action', 9, 'The members of Monarch, an crypto-zoological organisation, must rely on the Godzilla and Mothra to defeat King Ghidorah and Rodan, after the former awakens other dormant Titans to destroy the world.', 460, 8, 497),
(22, 'Lord of the Rings', 'English', 'Adventure', 8, 'A young hobbit, Frodo, who has found the One Ring that belongs to the Dark Lord Sauron, begins his journey with eight companions to Mount Doom, the only place where it can be destroyed.', 370, 8, 400),
(23, 'Wall E', 'English', 'Adventure', 9, 'A machine responsible for cleaning a waste-covered Earth meets another robot and falls in love with her. Together, they set out on a journey that will alter the fate of mankind.', 380, 8, 410);

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE `poster` (
  `movie_name` varchar(20) NOT NULL,
  `poster_img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poster`
--

INSERT INTO `poster` (`movie_name`, `poster_img`) VALUES
('El Camino', 'elcamino.jpg'),
('Doctor Strange', 'strange.jpg'),
('Hobbit', 'hobbit.jpg'),
('Godzilla', 'godzilla.jpg'),
('Lord of the Rings', 'lotr.jpg'),
('Wall E', 'walle.jpg');

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
(1, '2021-01-09 22:00:00', 1, 30, 2),
(2, '2021-01-08 19:00:00', 2, 29, 4),
(3, '2021-01-20 13:00:00', 1, 30, 1),
(4, '2021-01-14 13:00:00', 1, 30, 2),
(5, '2021-01-07 22:00:00', 1, 30, 3),
(6, '2021-01-22 10:00:00', 1, 30, 3),
(7, '2021-01-09 22:00:00', 1, 31, 3),
(8, '2021-01-28 16:00:00', 2, 29, 6),
(9, '2020-12-31 16:00:00', 2, 31, 2),
(10, '2021-01-28 19:00:00', 2, 29, 5),
(11, '2021-01-29 16:00:00', 2, 29, 6),
(12, '2021-01-14 19:00:00', 2, 30, 5),
(13, '2021-01-22 16:00:00', 1, 29, 10),
(14, '2021-01-29 13:00:00', 1, 29, 6),
(15, '2021-01-22 16:00:00', 2, 29, 5),
(16, '2021-01-14 16:00:00', 1, 29, 2),
(17, '2021-01-19 13:00:00', 2, 29, 1),
(18, '2021-01-14 13:00:00', 1, 29, 1),
(19, '2021-01-24 10:00:00', 9, 34, 2);

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
(1, 1, 2),
(2, 1, 0),
(1, 1, 2),
(1, 1, 2),
(1, 1, 2),
(6, 3, 1),
(7, 2, 1),
(8, 3, 0),
(9, 1, 1),
(10, 1, 0),
(11, 1, 0),
(12, 1, 1),
(13, 1, 2),
(14, 1, 2),
(15, 2, 1),
(16, 1, 0),
(17, 1, 2),
(18, 0, 0),
(19, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `seat_id` int(11) NOT NULL,
  `total_net_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `seat_id`, `total_net_amt`) VALUES
(3, 2, 1222),
(4, 6, 1172),
(5, 6, 1172),
(6, 7, 1122),
(7, 8, 1770),
(8, 10, 1400),
(9, 14, 2094),
(10, 15, 1500),
(11, 19, 374);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pword` varbinary(255) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `username`, `pword`, `phone`, `email`) VALUES
(29, 'rajat raj', 'rajat', 0x71c8c2b58bfa448ce9480d0114b7c869, 73450395, 'gmail@rajat.com'),
(30, 'shreyask', 'shreyas', 0xae6cf97f1d1e1d949b5e950798a7a283, 123456789, 'gmail@shreyas.com'),
(31, 'Parth Hero', 'parth', 0x41292f6584f1fc3f180724127186e5b1, 1234567890, 'parth@gmail.com'),
(34, 'Shreyas Karanam', 'karanam22', 0xbe495b1d30d274fb2d4cd189b9129a75, 9742368019, 'shreyaskaranam22@gmail.com'),
(35, 'pavan', 'pavan1234', 0x695450a7facc8b2c1c81cae7d2272f61, 1234567, 'pavan@gmail.com');

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
  ADD PRIMARY KEY (`movie_id`),
  ADD UNIQUE KEY `movie_name` (`movie_name`);

--
-- Indexes for table `poster`
--
ALTER TABLE `poster`
  ADD KEY `movie_name` (`movie_name`);

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
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `seat_id` (`seat_id`);

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
  MODIFY `movie_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `seat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `poster`
--
ALTER TABLE `poster`
  ADD CONSTRAINT `poster_ibfk_1` FOREIGN KEY (`movie_name`) REFERENCES `movie` (`movie_name`);

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`),
  ADD CONSTRAINT `seats_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `snacks`
--
ALTER TABLE `snacks`
  ADD CONSTRAINT `snacks_ibfk_1` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`seat_id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`seat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
