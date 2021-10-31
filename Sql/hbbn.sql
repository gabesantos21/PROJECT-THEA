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
  `name` varchar(750) ,
  `text` varchar(750) 
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
    ('category2input3', '123 Street, Manila, Metro Manila'),
    ('category2button', 'Submit');

    
--
-- Table Structure for 'user_account'
--
    CREATE TABLE `user_account` (
  `user_id` int(11) NOT NULL,
  `f_name` varchar(750) ,
  `l_name` varchar(750) ,
  `user_name` varchar(750) ,
  `phone_number` varchar(750) ,
  `e_mail` varchar(750) ,
  `password` varchar(750),
  `address` varchar(750) ,
  `city` varchar(750) ,
  `barangay` varchar(750) ,
  `zip` varchar(750)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- insert admin account
-- password is heavenlybaked
  INSERT INTO user_account (user_name, password) VALUES ('admin', '$2y$10$0tHuS8biwsiQDA2J6Af1t.MUoyr.sdqvWHP.OMMoavvDD3.0gROxC');
--
-- Table structure for orders table
-- no need to manually add primary key and auto increment
  CREATE TABLE `orders` (
    `order_id` varchar(20) NOT NULL,
    `user_id` int(11) NOT NULL,
    `order_date` DATETIME ,
    `status` varchar(10) ,
    `f_address` varchar(750),
    `total_price` int(11),
    PRIMARY KEY (order_id),
    FOREIGN KEY (user_id) REFERENCES user_account(user_id)  
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--Change the data type of the column to double so it can hold the data for price
  ALTER TABLE orders
modify total_price Double;
--
-- Table structure for order items table
-- no need to manually add primary key and auto increment
CREATE TABLE `order_items` (
    `order_id` VARCHAR(20) NOT NULL,
    `product_id` int(11) NOT NULL,
    `quantity` int(11), 
    PRIMARY KEY (order_id, product_id),
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (product_id) REFERENCES product_list(id)  
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--Use below statement to assign PK to table
--Table names include: product_list, index_text, user_account
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--Use below statements to assign auto increment
--Table names include: product_list, index_text, user_account

ALTER TABLE `index_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
