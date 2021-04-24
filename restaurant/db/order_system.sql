-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 01:37 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pass`) VALUES
(1, 'farag', 'farag30@yahoo.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(1, 'sandwich'),
(2, 'crepe'),
(3, 'Pizza');

-- --------------------------------------------------------

--
-- Table structure for table `chef`
--

CREATE TABLE `chef` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `salary` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chef`
--

INSERT INTO `chef` (`id`, `name`, `phone`, `salary`) VALUES
(1, '', '', NULL),
(2, '   ali', '   012852741', '8000'),
(3, '  taha', '  0123456', '7000'),
(4, ' marya', ' 8520', '5000'),
(5, ' ashraf', ' 852041', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `phone_num` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `pass`, `phone_num`) VALUES
(1, 'ahmed', 'ahmed50@yahoo.com', '123', 1158418941),
(2, 'zaki', 'zaki30@yahoo.com', '123', 1234567890),
(3, 'alaa', 'alaa50@gmail.com', '12345', 158529655),
(4, 'abdallah', 'hgfd@hgf', '12345', 152585269),
(5, ' marya', 'marya90@yahoo', '123', 15852741);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(250) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `cust_id`, `description`) VALUES
(1, 3, 'Ù…Ù†ØªØ§Ù„Ø¨ÙŠØ³'),
(2, 3, 'Ø§Ù„Ø¨ÙŠØ³ÙŠØ¨'),
(3, 3, 'Ø§Ù„Ø¨ÙŠØ³ÙŠØ¨');

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `unitprice` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`id`, `name`, `unitprice`, `section_id`) VALUES
(1, 'smallsand', 15, 1),
(2, 'medsand', 25, 1),
(3, 'bigsand', 35, 1),
(4, 'midsrepe', 30, 2),
(5, 'largecrepe', 40, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `shipper_id` int(11) NOT NULL,
  `chef_id` int(11) NOT NULL,
  `total_p` int(11) DEFAULT NULL,
  `confirm` varchar(250) DEFAULT NULL,
  `place` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cust_id`, `shipper_id`, `chef_id`, `total_p`, `confirm`, `place`) VALUES
(51, 1, 1, 1, NULL, NULL, 'nasr city'),
(58, 1, 1, 1, NULL, NULL, 'nasr city'),
(59, 1, 1, 1, NULL, NULL, 'nasr city'),
(75, 1, 3, 3, 225, 'confirmed', 'nasr city'),
(77, 1, 1, 1, NULL, NULL, 'nasr city'),
(79, 1, 1, 1, NULL, NULL, 'nasr city'),
(83, 1, 3, 3, 100, 'confirmed', 'nasr city'),
(85, 1, 2, 3, 75, 'confirmed', 'nasr city'),
(86, 1, 3, 2, 485, 'confirmed', 'nasr city'),
(87, 3, 1, 3, 100, 'confirmed', 'nasr city'),
(88, 3, 1, 3, 100, 'confirmed', 'nasr city'),
(89, 3, 4, 2, 180, 'confirmed', 'nasr city'),
(90, 3, 1, 1, 90, 'confirmed', 'nasr city'),
(91, 1, 1, 2, 105, 'confirmed', 'nasr city'),
(92, 3, 2, 3, 195, 'confirmed', 'nasr city'),
(93, 1, 1, 1, 100, 'confirmed', 'nasr city'),
(94, 1, 1, 1, 175, 'confirmed', 'nasr city'),
(95, 1, 1, 1, 240, 'confirmed', 'nasr city'),
(96, 1, 1, 1, NULL, NULL, 'nasr city'),
(97, 1, 1, 1, NULL, NULL, 'nasr city'),
(98, 1, 1, 1, NULL, NULL, 'nasr city'),
(99, 1, 1, 1, 50, 'confirmed', 'nasr city'),
(100, 1, 1, 1, 90, 'confirmed', 'nasr city'),
(101, 4, 1, 1, 100, 'confirmed', 'nasr city'),
(102, 4, 1, 1, NULL, NULL, 'nasr city'),
(103, 4, 1, 1, 105, 'confirmed', 'nasr city'),
(104, 4, 1, 1, 160, 'confirmed', 'nasr city'),
(105, 4, 1, 1, NULL, NULL, 'nasr city'),
(106, 4, 1, 1, NULL, NULL, 'nasr city'),
(107, 4, 1, 1, 105, 'confirmed', 'nasr city'),
(108, 4, 1, 1, 75, 'confirmed', 'nasr city'),
(109, 4, 1, 1, 75, 'confirmed', 'nasr city'),
(110, 4, 1, 1, 140, 'confirmed', 'nasr city'),
(111, 4, 1, 1, 140, 'confirmed', 'nasr city'),
(112, 4, 1, 1, 100, 'confirmed', 'nasr city'),
(113, 4, 1, 1, 210, 'confirmed', 'nasr city'),
(114, 4, 1, 1, 250, 'confirmed', 'nasr city'),
(115, 4, 1, 1, 105, 'confirmed', ''),
(116, 1, 1, 1, 435, 'confirmed', 'october');

-- --------------------------------------------------------

--
-- Table structure for table `ord_details`
--

CREATE TABLE `ord_details` (
  `ord_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_m_p` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ord_details`
--

INSERT INTO `ord_details` (`ord_id`, `meal_id`, `quantity`, `total_m_p`) VALUES
(51, 1, 1, 15),
(58, 4, 3, 60),
(59, 2, 3, 75),
(75, 2, 3, 75),
(75, 2, 3, 75),
(75, 1, 5, 75),
(77, 2, 3, 75),
(77, 4, 5, 100),
(85, 2, 3, 75),
(86, 3, 3, 105),
(86, 3, 5, 175),
(86, 3, 3, 105),
(86, 2, 4, 100),
(87, 2, 4, 100),
(88, 4, 5, 100),
(89, 5, 6, 180),
(90, 5, 3, 90),
(91, 3, 3, 105),
(92, 2, 3, 75),
(92, 4, 6, 120),
(93, 2, 4, 100),
(94, 3, 5, 175),
(95, 3, 4, 140),
(95, 4, 5, 100),
(96, 2, 3, 75),
(96, 4, 7, 140),
(96, 2, 4, 100),
(96, 2, 4, 100),
(97, 2, 4, 100),
(98, 3, 2, 70),
(98, 4, 8, 160),
(99, 2, 2, 50),
(100, 5, 3, 90),
(101, 2, 4, 100),
(103, 3, 3, 105),
(104, 4, 8, 160),
(105, 3, 5, 175),
(107, 3, 3, 105),
(108, 2, 3, 75),
(109, 2, 3, 75),
(110, 3, 4, 140),
(111, 3, 4, 140),
(112, 2, 4, 100),
(113, 5, 7, 210),
(114, 3, 2, 70),
(114, 5, 6, 180),
(115, 3, 3, 105),
(116, 2, 3, 75),
(116, 4, 5, 150),
(116, 4, 7, 210);

-- --------------------------------------------------------

--
-- Table structure for table `shipper`
--

CREATE TABLE `shipper` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `salary` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipper`
--

INSERT INTO `shipper` (`id`, `name`, `phone`, `salary`) VALUES
(1, '', '', NULL),
(2, '  hamdy', '012654987', '60000'),
(3, ' mohamed', ' 01112345', ' 5000'),
(4, ' mona', ' 0158521458', ' 5000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chef`
--
ALTER TABLE `chef`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `shipper_id` (`shipper_id`),
  ADD KEY `chef_id` (`chef_id`);

--
-- Indexes for table `ord_details`
--
ALTER TABLE `ord_details`
  ADD KEY `ord_id` (`ord_id`),
  ADD KEY `meal_id` (`meal_id`);

--
-- Indexes for table `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chef`
--
ALTER TABLE `chef`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `shipper`
--
ALTER TABLE `shipper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `meal`
--
ALTER TABLE `meal`
  ADD CONSTRAINT `meal_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`shipper_id`) REFERENCES `shipper` (`id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`chef_id`) REFERENCES `chef` (`id`);

--
-- Constraints for table `ord_details`
--
ALTER TABLE `ord_details`
  ADD CONSTRAINT `ord_details_ibfk_1` FOREIGN KEY (`ord_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `ord_details_ibfk_2` FOREIGN KEY (`meal_id`) REFERENCES `meal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
