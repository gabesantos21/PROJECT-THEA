-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2021 at 03:38 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hbbn`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(11) NOT NULL,
  `name` varchar(750) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(750) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'Choco Banana bread', 100, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, aut deserunt? Minima ipsa, ab iusto perferendis repellendus sequi nesciunt dolor numquam veniam praesentium error accusamus, eum delectus dignissimos natus nisi? ', 'Chocobananabread.jpg'),
(2, 'Chocolate Cookies', 100, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, aut deserunt? Minima ipsa, ab iusto perferendis repellendus sequi nesciunt dolor numquam veniam praesentium error accusamus, eum delectus dignissimos natus nisi? ', 'chococookies.jpg'),
(3, 'Nutty Oats', 100, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, aut deserunt? Minima ipsa, ab iusto perferendis repellendus sequi nesciunt dolor numquam veniam praesentium error accusamus, eum delectus dignissimos natus nisi? ', 'nuttyOats.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
