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
-- Table structure for 'index_text'
--

CREATE TABLE `index_text` (
  `id` int(11) NOT NULL,
  `name` varchar(750) NOT NULL,
  `text` varchar(750) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_list`
--

INSERT INTO index_text(name, text) VALUES 
    ('carouselimg1', 'Chocobananabread.jpg'),
    ('carouseltag1', 'Try our bestseller!'),
    ('carouselproduct1', 'CHOCOLATE BANANA BREAD'),
    ('carouselbutton1', 'Go to Store'),
    ('carouselimg2', 'chococookies.jpg'),
    ('carouseltag2', 'Try our Tasty Cookies!'),
    ('carouselproduct2', 'CHOCOLATE COOKIES'),
    ('carouselimg3', 'nuttyOats.jpg'),
    ('carouseltag3', 'Craving that Nutty Flavor?'),
    ('carouselproduct3', 'NUTTY OATS'),
    ('category1', 'ABOUT US'),
    ('category1img', 'HomeBakedByNingning.png'),
    ('category1tag', 'Quality is our recipe'),
    ('category1txt', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus doloremque in non? Autem nemo, voluptatum, sequi aliquam eligendi dolore quibusdam a perferendis fugit provident, nesciunt dignissimos neque corporis quo labore?
     Lorem ipsum dolor sit, amet consectetur adipisicing elit. In ipsum eum commodi placeat aspernatur nulla id eos aliquam dolorem ex, quia facere sint, minus explicabo ut modi! Ea, nesciunt minima'),
    ('category2', 'CONTACT US'),
    ('category2txt1', 'Shoot us a Message'),
    ('category2txt2', 'Let''s Work Together'),
    ('category2txt3', 'Help us improve your experience by providing feed'),
    ('category2input1', 'email@email.com'),
    ('category2input2', '999-999-999'),
    ('category2input3', '123 Street, Manila, Metro Manila');
    ('category2button', 'Submit');

    
    
    

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `index_text`
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


ALTER TABLE `index_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
