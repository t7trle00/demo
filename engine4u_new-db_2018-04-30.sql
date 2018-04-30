-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 30, 2018 at 02:21 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `engine4u_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `carID` int(11) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingID`, `userID`, `carID`, `start_date`, `end_date`, `total_price`, `location`) VALUES
(2, 8, 15, '2018-04-15 00:00:00', '2018-04-16 00:00:00', '12', 'Oulu'),
(3, 8, 15, '2018-04-15 00:00:00', '2018-04-16 00:00:00', '12', 'Oulu'),
(4, 8, 15, '2018-04-15 00:00:00', '2018-04-16 00:00:00', '12', 'Oulu');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `calenID` int(11) NOT NULL,
  `carID` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`calenID`, `carID`, `start_date`, `end_date`) VALUES
(1, 31, '2018-04-01', '2018-04-07'),
(2, 15, '2018-04-15', '2018-04-17'),
(3, 17, '2018-04-15', '2018-04-28'),
(4, 16, '2018-05-01', '2018-05-03'),
(5, 14, '2018-04-15', '2018-04-28'),
(6, 13, '2018-05-01', '2018-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `carID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `cover_photo` varchar(200) DEFAULT NULL,
  `type_of_car` varchar(45) DEFAULT NULL,
  `year` int(10) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `cancellation_policy` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`carID`, `userID`, `title`, `description`, `cover_photo`, `type_of_car`, `year`, `price`, `cancellation_policy`) VALUES
(6, 1, 'aaa', 'aaa', 'flower712.jpg', '4 seats', 2010, 23, 'strict'),
(7, 2, 'aaaa', 'aaaa', '115.jpeg', 'aaaa', 2010, 23, 'strict'),
(8, 2, 'aaaa', 'aaaa', 'flower102.jpg', 'aaaa', 2010, 23, 'strict'),
(9, 3, 'fff', 'ffff', 'flower45.jpg', 'ffff', 2222, 23, 'strict'),
(10, 3, 'fff', 'ffff', 'flower713.jpg', 'ffff', 2222, 23, 'strict'),
(11, 3, 'ddd', 'ddd', 'flower33.jpg', 'ddd', 333, 233, 'strict'),
(12, 3, 'ddd', 'ddd', 'abc18.JPG', 'ddd', 333, 233, 'strict'),
(13, 5, 'efef', 'efefe', 'flower55.jpg', 'efef', 33, 33, 'strict'),
(14, 6, 'eee', 'eee', 'flower83.jpg', 'eee', 2010, 22, 'wsdd'),
(15, 6, 'eee', 'eee', 'flower64.jpg', 'eee', 2010, 22, 'wsdd'),
(16, 7, 'erferf', 'erfefef', 'flower92.jpg', '10 seats', 34, 56, '2'),
(17, 7, 'erferf', 'erfefef', 'flower63.jpg', '10 seats', 34, 56, '2'),
(31, 8, 'erfgrgrguhuuuhuhuhuhu555555', 'erfgwerfgergdfedfer33333333333333333333333', 'flower13.png', '7 seats', 343, 23, 'strict');

-- --------------------------------------------------------

--
-- Stand-in structure for view `carsphoto`
-- (See below for the actual view)
--
CREATE TABLE `carsphoto` (
`carID` int(11)
,`userID` int(11)
,`title` varchar(200)
,`description` text
,`cover_photo` varchar(200)
,`type_of_car` varchar(45)
,`year` int(10)
,`price` int(10)
,`cancellation_policy` varchar(45)
,`photo` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `problemID` int(11) NOT NULL,
  `bookingID` int(11) DEFAULT NULL,
  `status` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgID` int(11) NOT NULL,
  `carID` int(11) NOT NULL,
  `photo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgID`, `carID`, `photo`) VALUES
(1, 6, 'flower710.jpg'),
(2, 6, 'flower711.jpg'),
(3, 6, 'flower712.jpg'),
(4, 7, '118.jpeg'),
(5, 7, '119.jpeg'),
(6, 7, '1110.jpeg'),
(7, 8, 'flower101.jpg'),
(8, 8, 'flower102.jpg'),
(9, 8, 'flower103.jpg'),
(10, 17, 'flower64.jpg'),
(11, 17, 'flower65.jpg'),
(12, 17, 'flower66.jpg'),
(13, 9, 'flower49.jpg'),
(14, 9, 'flower410.jpg'),
(15, 9, 'flower411.jpg'),
(16, 9, 'flower412.jpg'),
(17, 16, 'flower94.jpg'),
(18, 16, 'flower95.jpg'),
(19, 16, 'flower96.jpg'),
(20, 13, 'flower511.jpg'),
(21, 13, 'flower512.jpg'),
(22, 13, 'flower513.jpg'),
(23, 14, 'flower87.jpg'),
(24, 14, 'flower88.jpg'),
(25, 14, 'flower89.jpg'),
(26, 10, 'flower713.jpg'),
(27, 10, 'flower714.jpg'),
(28, 10, 'flower715.jpg'),
(29, 15, 'flower67.jpg'),
(30, 15, 'flower68.jpg'),
(31, 15, 'flower69.jpg'),
(32, 11, 'flower33.jpg'),
(33, 11, 'flower34.jpg'),
(34, 11, 'flower35.jpg'),
(35, 12, 'abc15.JPG'),
(36, 12, 'abc16.JPG'),
(37, 12, 'abc17.JPG'),
(38, 12, 'abc18.JPG'),
(39, 12, 'abc19.JPG'),
(40, 12, 'abc110.JPG'),
(45, 31, 'abc111.JPG'),
(46, 31, 'abc112.JPG'),
(47, 31, 'abc113.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `licenses`
--

CREATE TABLE `licenses` (
  `licenseID` int(11) NOT NULL,
  `license` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `licenses`
--

INSERT INTO `licenses` (`licenseID`, `license`) VALUES
(18, 'flower76.jpg'),
(19, 'flower77.jpg'),
(20, 'flower78.jpg'),
(21, 'flower79.jpg'),
(22, ''),
(23, ''),
(24, ''),
(25, 'flower4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewID` int(11) NOT NULL,
  `bookingID` int(11) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `temporary`
--

CREATE TABLE `temporary` (
  `temID` int(11) NOT NULL,
  `carID` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `totalprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temporary`
--

INSERT INTO `temporary` (`temID`, `carID`, `start_date`, `end_date`, `totalprice`) VALUES
(29, 15, '2018-04-15', '2018-04-16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `user_id`, `created`) VALUES
(1, '38ccb9a19e3c0c70a3019d027f851e', 8, '2018-04-27'),
(2, 'eefe48986108e4c21017961adc6710', 9, '2018-04-28'),
(3, 'a9958b2a8a8fb362f835fb820804f9', 10, '2018-04-28'),
(4, 'fd46ea1f85a042e0f158c7a3e2a990', 11, '2018-04-28'),
(5, 'd414758d3d7424022b4c79a6f46eee', 12, '2018-04-29'),
(6, 'f0bf988706fcb505d213d1452ef98d', 13, '2018-04-29'),
(7, 'a04fd8553ba4ac1c89d3fcfc5d7ad9', 14, '2018-04-29'),
(8, '9d8d4a9663a30a59e5d171910b3dea', 15, '2018-04-29'),
(9, 'dd22233e75c8e3d4f6fdf9819d9c40', 16, '2018-04-29'),
(10, '3cd5b52777f56b20782985c44cfc59', 17, '2018-04-29'),
(11, 'f4fe06f5a025c9311841efa55ee759', 8, '2018-04-29'),
(12, '6a50accba691a85f80c48010bfb0d7', 8, '2018-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(45) CHARACTER SET latin1 NOT NULL,
  `profile_picture` varchar(200) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` int(45) NOT NULL,
  `password` text NOT NULL,
  `country` varchar(125) DEFAULT NULL,
  `street` varchar(125) DEFAULT NULL,
  `city` varchar(125) DEFAULT NULL,
  `postalcode` varchar(45) DEFAULT NULL,
  `iban` varchar(125) DEFAULT NULL,
  `swift_code` varchar(45) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `last_login` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `profile_picture`, `birthdate`, `email`, `phone`, `password`, `country`, `street`, `city`, `postalcode`, `iban`, `swift_code`, `role`, `status`, `last_login`) VALUES
(1, 'aaa', 'aaa', NULL, '0000-00-00', 'aaa@gmail.com', 222334455, '', NULL, NULL, 'Ho Chi Minh', NULL, NULL, NULL, '', '', ''),
(2, 'bbb', 'bbb', NULL, '0000-00-00', '', 0, '', NULL, NULL, 'Ha Noi', NULL, NULL, NULL, '', '', ''),
(3, 'ccc', 'ccc', NULL, '0000-00-00', '', 0, '', NULL, NULL, 'Ho Chi Minh', NULL, NULL, NULL, '', '', ''),
(4, 'bbb', 'bbb', NULL, '0000-00-00', '', 0, '', NULL, NULL, 'Ha Noi', NULL, NULL, NULL, '', '', ''),
(5, 'bbb', 'bbb', NULL, '0000-00-00', '', 0, '', NULL, NULL, 'Oulu', NULL, NULL, NULL, '', '', ''),
(6, 'bbb', 'bbb', NULL, '0000-00-00', '', 0, '', NULL, NULL, 'Oulu', NULL, NULL, NULL, '', '', ''),
(7, 'bbb', 'bbb', NULL, '0000-00-00', '', 0, '', NULL, NULL, 'Ha Noi', NULL, NULL, NULL, '', '', ''),
(8, 'thao', 'tran', 'flower4.jpg', '0000-00-00', '12345@gmail.com', 98, 'sha256:1000:JAfqRGI3aJ82uDrRXsVPQdhJ3naRekF1:BkdzT2/d3yv2iYn7t5TemBjPUkP8L/bH', '9yhbh', 'njn', 'oulu', '90670', NULL, NULL, 'subscriber', 'approved', '2018-04-30 02:19:31 PM'),
(9, 'thao', 'tran', NULL, '0000-00-00', '54321@gmail.com', 9080, '', 'vietnam', 'jdfijer', 'Oulu', '90490', NULL, NULL, 'subscriber', 'pending', ''),
(10, 'thao', 'tran', 'flower8.jpg', '0000-00-00', '789@gmail.com', 9080, 'sha256:1000:fionAo9Hdv3CpC0RFMIjqakTSD19BMF8:G1Dm1P97IeHmOzE+LrmMcc+7m+mQ9jwT', 'vietnam', 'jdfijer', 'Oulu', '90490', NULL, NULL, 'subscriber', 'approved', '2018-04-29 04:44:06 PM'),
(11, 'a', 'b', NULL, '0000-00-00', 'abc@gmail.com', 90, 'sha256:1000:lOJCQb1aiSfL6tJHruTDRLrbONm+RbMm:5WqxNUfCRIl6rUtGrIUVF5KA5LZtVNNT', '9hy', 'iuy', 'Oulu', '9080', NULL, NULL, 'subscriber', 'approved', '2018-04-28 12:04:20 PM'),
(12, '123', '334', NULL, '0000-00-00', 'thao@gmail.com', 123445, 'sha256:1000:i7ukI81hqdqaSCYXhCaCCscqY+5eW0gC:YHaxCbi0T6iKuqfbBKNFLdxS/fXAn7sE', 'dfrg', 'rgrg', 'Ho Chi Minh', '2324', NULL, NULL, 'subscriber', 'approved', '2018-04-29 09:25:56 AM'),
(13, 'sdwd', 'wdwd', NULL, '0000-00-00', 'th@gmail.com', 0, 'sha256:1000:gZC8CW+lAhSHl/L04vGTtECOHsNlXZPI:aXdIo5ynT/7kcxM2682wREpcDWIEaRld', 'wdwd', 'wdw', 'oulu', 'wdfw', NULL, NULL, 'subscriber', 'approved', '2018-04-29 09:28:38 AM'),
(14, 'sdwed', 'wdwd', NULL, '0000-00-00', 'a@gmail.com', 0, 'sha256:1000:rBBQy3FOs6BRPj0P8GrjwZGwcP49iIxg:qaWOSXI3r9fz+cTyByvSu84O6gsZ4l9R', 'wdwd', 'wdwd', 'oulu', 'wdwd', NULL, NULL, 'subscriber', 'approved', '2018-04-29 09:30:32 AM'),
(15, 'sdsed', 'wdwed', NULL, '0000-00-00', '123@gmail.com', 2147483647, '', 'ejfei', 'dkvnjdrfn', 'Ha Noi', 'rjne', NULL, NULL, 'subscriber', 'pending', ''),
(16, 'sdwed§', 'uhuh', NULL, '0000-00-00', 'b@gmail.com', 0, 'sha256:1000:s/oMWgQux3WchaS66LPbfTpIiM6z3wTO:2xyMkCI1hr4+hmzy/CGrHuY7KyBONveR', 'u89', 'jniujh', 'Ho Chi Minh', '9u9', NULL, NULL, 'subscriber', 'approved', '2018-04-29 10:08:25 AM'),
(17, 'eifjerf', 'jefn', 'flower81.jpg', '0000-00-00', '345@gmail.com', 0, 'sha256:1000:duUehATt0LVZnJNorPC8PqlTDz9vLVDw:eLZOUil3eH7L07SuFvpkXPT36p1h7d1T', 'jnjifvn', 'buhb', 'Ho Chi Minh', 'hbnuh', NULL, NULL, 'subscriber', 'approved', '2018-04-29 10:29:41 AM');

-- --------------------------------------------------------

--
-- Structure for view `carsphoto`
--
DROP TABLE IF EXISTS `carsphoto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `carsphoto`  AS  select `cars`.`carID` AS `carID`,`cars`.`userID` AS `userID`,`cars`.`title` AS `title`,`cars`.`description` AS `description`,`cars`.`cover_photo` AS `cover_photo`,`cars`.`type_of_car` AS `type_of_car`,`cars`.`year` AS `year`,`cars`.`price` AS `price`,`cars`.`cancellation_policy` AS `cancellation_policy`,`images`.`photo` AS `photo` from (`cars` left join `images` on((`cars`.`carID` = `images`.`carID`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `carID` (`carID`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`calenID`),
  ADD KEY `carID` (`carID`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`carID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`problemID`),
  ADD KEY `bookingID` (`bookingID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgID`),
  ADD KEY `carID` (`carID`);

--
-- Indexes for table `licenses`
--
ALTER TABLE `licenses`
  ADD PRIMARY KEY (`licenseID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `bookingID` (`bookingID`);

--
-- Indexes for table `temporary`
--
ALTER TABLE `temporary`
  ADD PRIMARY KEY (`temID`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `calenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `carID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `problemID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `licenses`
--
ALTER TABLE `licenses`
  MODIFY `licenseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temporary`
--
ALTER TABLE `temporary`
  MODIFY `temID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`carID`) REFERENCES `cars` (`carID`) ON UPDATE CASCADE;

--
-- Constraints for table `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `calendar_ibfk_1` FOREIGN KEY (`carID`) REFERENCES `cars` (`carID`) ON UPDATE CASCADE;

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`bookingID`) REFERENCES `bookings` (`bookingID`) ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`carID`) REFERENCES `cars` (`carID`) ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`bookingID`) REFERENCES `bookings` (`bookingID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
