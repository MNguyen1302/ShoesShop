-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2022 at 08:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` varchar(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `password`, `address`, `role`) VALUES
('622df5f5b56c0', 'Ga', 'ga@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'user'),
('623009a2d42f1', 'nguyen', 'nguyen@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'TP.Cao Lanh', 'user'),
('626e6bf70c4d3', 'bee', 'bee@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'TP.HCM', 'user'),
('626e7065cd40b', 'Haha', 'haha@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'TP.HCM', 'user'),
('62727b95b3848', 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(15) NOT NULL,
  `customerId` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `subtotal` varchar(20) NOT NULL,
  `orderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customerId`, `address`, `phone`, `status`, `subtotal`, `orderDate`) VALUES
('1035265833968', '623009a2d42f1', 'Tp.HCM', '0123456789', 0, '13730000', '2022-05-07'),
('1108579046664', '623009a2d42f1', 'Hà Nội', '0123456789', 0, '6.900.000', '2022-05-07'),
('1395397518099', '623009a2d42f1', 'TP.HCM', '0939914085', 0, '600000', '2022-05-03'),
('995181944584', '623009a2d42f1', 'Hà Nội', '0123456789', 0, '5.000.000', '2022-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `orderId` varchar(15) NOT NULL,
  `productId` varchar(15) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`orderId`, `productId`, `quantity`, `price`) VALUES
('1035265833968', '1282406738503', 1, '9230000'),
('1108579046664', '3490200587358', 1, '0'),
('1108579046664', '512840023125', 1, '0'),
('1395397518099', '1099768650121', 1, '600000'),
('995181944584', '122840023125', 1, '5.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `image` varchar(512) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `createdAt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `name`, `price`, `image`, `brand`, `description`, `createdAt`) VALUES
('1099768650121', 'Converse Chuck Taylor All Star CX Create Next Comfort', '600.000', 'blog-33.jpg', 'converse', 'This is a beautiful shoe ', '2021-11-20'),
('1109760050951', 'Converse Cons Mi Gente CX Hi-Top', '2.100.000', 'blog-38.jpg', 'converse', 'This is a beautiful shoe suitable for exercise. In addition, these shoes are very durable, not easily damaged when exercising', '2021-11-20'),
('1191760350951', 'Converse Cons Mi Gente Taylor All Star', '3.000.000', 'blog-39.jpg', 'converse', 'A shoe is an item of footwear intended to protect and comfort the human foot, while the wearer is doing various activities. Wedge is easier to wear than a traditional stiletto, wedges are great transitional shoes that will carry you from summer to fall', '2022-05-08'),
('122840023125', 'LeBron Witness 6', '5.000.000', 'blog-10.jpg', 'nike', 'A shoe is an item of footwear intended to protect and comfort the human foot, while the wearer is doing various activities. Wedge is easier to wear than a traditional stiletto, wedges are great transitional shoes that will carry you from summer to fall', '2022-05-08'),
('1282406738503', 'Nike Blazer Mid', '9.230.000', 'blog-1.jpg', 'nike', 'This is a beautiful shoe suitable for exercise. In addition, these shoes are very durable, not easily damaged when exercising', '2021-11-20'),
('1731547885234806', 'Nike Air Max AP', '1.500.000', 'shoes.jpg', 'nike', 'Giày đẹp', '2022-04-30'),
('1731639213646412', 'Chuck Taylor All Star', '1.200.000', 'converse.jpg', 'converse', 'Giay sieu dep', '2022-05-01'),
('1732245555360736', 'Adidas 4DFWD Pulse', '4.500.000', 'adidas.jpg', 'adidas', 'This is a beautiful shoe suitable for exercise. In addition, these shoes are very durable, not easily damaged when exercising', '2022-05-08'),
('192940079125', 'Nike Air Jordan 11 Retro', '3.000.000', 'blog-7.jpg', 'nike', 'A shoe is an item of footwear intended to protect and comfort the human foot, while the wearer is doing various activities. Wedge is easier to wear than a traditional stiletto, wedges are great transitional shoes that will carry you from summer to fall', '2022-05-08'),
('3490200587358', 'Vans Old Skool Sneakers - Blue', '4.900.000', 'blog-23.jpg', 'vans', 'A shoe is an item of footwear intended to protect and comfort the human foot, while the wearer is doing various activities. Wedge is easier to wear than a traditional stiletto, wedges are great transitional shoes that will carry you from summer to fall', '2022-05-08'),
('349023127358', 'Supernova+', '10.000.000', 'blog-15.jpg', 'adidas', 'This is a beautiful shoe suitable for exercise. In addition, these shoes are very durable, not easily damaged when exercising', '2021-11-20'),
('349023582358', 'Adidas SUPERSTAR W', '4.300.000', 'blog-16.jpg', 'adidas', 'A shoe is an item of footwear intended to protect and comfort the human foot, while the wearer is doing various activities. Wedge is easier to wear than a traditional stiletto, wedges are great transitional shoes that will carry you from summer to fall', '2022-05-08'),
('349023583758', 'Vans Old Skool Platform Pastel', '8.100.000', 'blog-22.jpg', 'vans', 'This is a beautiful shoe suitable for exercise. In addition, these shoes are very durable, not easily damaged when exercising', '2021-11-20'),
('349023587312', 'Stan Smith', '1.400.000', 'blog-13.jpg', 'adidas', 'A shoe is an item of footwear intended to protect and comfort the human foot, while the wearer is doing various activities. Wedge is easier to wear than a traditional stiletto, wedges are great transitional shoes that will carry you from summer to fall', '2022-05-08'),
('349023587358', 'Adidas Forum 84 Hi Marvel', '8.560.000', 'blog-11.jpg', 'adidas', 'A shoe is an item of footwear intended to protect and comfort the human foot, while the wearer is doing various activities. Wedge is easier to wear than a traditional stiletto, wedges are great transitional shoes that will carry you from summer to fall', '2022-05-08'),
('349073587358', 'Vans Men\"s White Classic Slip-on Black', '5.200.000', 'blog-21.jpg', 'vans', 'This is a beautiful shoe suitable for exercise. In addition, these shoes are very durable, not easily damaged when exercising', '2021-11-20'),
('509840079795', 'Nike Blazer Mid \'77 Vintage', '2.300.000', 'blog-4.jpg', 'nike', 'Giày rất đẹp', '2022-05-08'),
('509844779795', 'Nike Air Max', '3.000.000', 'blog-3.jpg', 'nike', 'A shoe is an item of footwear intended to protect and comfort the human foot, while the wearer is doing various activities. Wedge is easier to wear than a traditional stiletto, wedges are great transitional shoes that will carry you from summer to fall', '2022-05-08'),
('512840023125', 'Nike Air Vapormax 2021 FK', '2.000.000', 'blog-8.jpg', 'nike', 'A shoe is an item of footwear intended to protect and comfort the human foot, while the wearer is doing various activities. Wedge is easier to wear than a traditional stiletto, wedges are great transitional shoes that will carry you from summer to fall', '2022-05-08'),
('512840079125', 'Nike React Infinity Run Flyknit', '3.490.000', 'blog-6.jpg', 'nike', 'Giày rất đẹp', '2022-05-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_customerId` (`customerId`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`orderId`,`productId`),
  ADD KEY `fk_orderdetail_productId` (`productId`),
  ADD KEY `fk_orderdetail_orderId` (`orderId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_customerId` FOREIGN KEY (`customerId`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_orderdetail_orderId` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_orderdetail_productId` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`),
  ADD CONSTRAINT `fk_orderdetails_orderId` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
