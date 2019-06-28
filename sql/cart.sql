-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 26, 2019 at 01:16 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(200) NOT NULL,
  `pname` varchar(200) DEFAULT NULL,
  `pdes` varchar(5000) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `sub` varchar(5000) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `image` varchar(200) NOT NULL DEFAULT 'product.jpg',
  `stock` int(200) NOT NULL DEFAULT '0',
  `available` varchar(50) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pname`, `pdes`, `category`, `sub`, `parent`, `image`, `stock`, `available`) VALUES
(9, 'Goku', 'DBZ', 'Fighter', '/Hero', 2, 'prod1561542991.jpeg', 10, '1'),
(10, 'Iphone', 'Apple', 'Iphone', '/Apple/New', 2, 'prod1561544271.jpeg', 0, '0'),
(12, 'Redmi Note 5 pro', 'Super Camera', 'Phone', '/Xiaomi/Redmi', 2, 'prod1561542374.jpeg', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `registered_user`
--

CREATE TABLE `registered_user` (
  `id` int(111) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL DEFAULT 'person.png',
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_user`
--

INSERT INTO `registered_user` (`id`, `email`, `pass`, `image`, `fname`, `lname`, `city`) VALUES
(2, 'sayan@gmail.com', '$2y$10$scO0CyvfATYBA1CfUvpqD.AC2wT2Er9SBLgVu3ApfgEWiHKYuiBsm', '1561480962.jpeg', 'Sayan', 'Chakraborty', 'Kolkata');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_user`
--
ALTER TABLE `registered_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `registered_user`
--
ALTER TABLE `registered_user`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
