-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2023 at 11:02 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product management system`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts_products`
--

CREATE TABLE `carts_products` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(16, 'Apple'),
(22, 'computer'),
(23, 'decoration'),
(21, 'furniture'),
(20, 'headphones'),
(19, 'laptops'),
(18, 'mobile phones'),
(15, 'samsung');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`category_id`, `product_id`) VALUES
(16, 75),
(16, 77),
(16, 78),
(16, 79),
(16, 80),
(18, 75),
(18, 77),
(18, 78),
(19, 80),
(20, 85),
(20, 86),
(20, 87),
(21, 82),
(21, 83),
(21, 84),
(22, 79),
(23, 81);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discountPercentage` float NOT NULL DEFAULT 0,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `quantity`, `discountPercentage`, `thumbnail`) VALUES
(75, 'ipad', '1000$', 'Lorem ipsum dolor sit amet, consectetur adipisiciLorem ipsum dolor sit amet, consectetur adipisiciLorem ipsum dolor sit amet, consectetur adipisici', 23, 12.45, '65356cf0603902.82655441.jpg'),
(77, 'iphone11', '500$', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis quo magnam distinctio officiis nostrum fugit quis veritatis temporibus corporis commodi quasi animi porro ipsa, error impedit enim beatae vel aliquam!', 12, 23.1, '65356d4dba7782.53153692.webp'),
(78, 'iphone14 pro', '300$', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis quo magnam distinctio officiis nostrum fugit quis veritatis temporibus corporis commodi quasi animi porro ipsa, error impedit enim beatae vel aliquam!', 20, 23.1, '65356d6f3a2e71.17973716.webp'),
(79, 'imac', '2500$', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis quo magnam distinctio officiis nostrum fugit quis veritatis temporibus corporis commodi quasi animi porro ipsa, error impedit enim beatae vel aliquam!', 23, 21.43, '65356d8ba49bb6.24630994.webp'),
(80, 'macbook', '1200$', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis quo magnam distinctio officiis nostrum fugit quis veritatis temporibus corporis commodi quasi animi porro ipsa, error impedit enim beatae vel aliquam!', 29, 23.1, '65356dbc2e8fc1.28913597.jfif'),
(81, 'decoration', '34$', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis quo magnam distinctio officiis nostrum fugit quis veritatis temporibus corporis commodi quasi animi porro ipsa, error impedit enim beatae vel aliquam!', 20, 2.32, '65356df893b9e6.59843194.jfif'),
(82, 'f1', '23$', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui laudantium nulla possimus in nemo non maxime voluptatum sit at ipsa dicta, voluptas, necessitatibus et magnam obcaecati, tempore quisquam error numquam!', 211, 23.1, '6535716db3cc54.26230290.jpg'),
(83, 'f2', '54$', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui laudantium nulla possimus in nemo non maxime voluptatum sit at ipsa dicta, voluptas, necessitatibus et magnam obcaecati, tempore quisquam error numquam!', 43, 21.2, '65357192588a30.36826611.jfif'),
(84, 'f3', '56$', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui laudantium nulla possimus in nemo non maxime voluptatum sit at ipsa dicta, voluptas, necessitatibus et magnam obcaecati, tempore quisquam error numquam!', 50, 43.12, '653571e3034f00.28323425.jfif'),
(85, 'headphone1', '12$', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui laudantium nulla possimus in nemo non maxime voluptatum sit at ipsa dicta, voluptas, necessitatibus et magnam obcaecati, tempore quisquam error numquam!', 120, 12.45, '653578583bb5c1.72674330.png'),
(86, 'headphone2', '23$', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui laudantium nulla possimus in nemo non maxime voluptatum sit at ipsa dicta, voluptas, necessitatibus et magnam obcaecati, tempore quisquam error numquam!', 20, 23.1, '6535787124af54.22957263.png'),
(87, 'headphone3', '9$', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui laudantium nulla possimus in nemo non maxime voluptatum sit at ipsa dicta, voluptas, necessitatibus et magnam obcaecati, tempore quisquam error numquam!', 32, 21.2, '6535789ac8f6c6.35838225.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cart_quantity` int(11) NOT NULL DEFAULT 0,
  `groupID` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `first_name`, `last_name`, `password`, `cart_quantity`, `groupID`) VALUES
(3, 'Radwasayed771', 'Radwasayed771@gmail.com', 'Radwa', 'Sayed', 'Radwasayed771', 0, 1),
(6, 'AhmedMohammed', 'AhmedMohammed@gmail.com', 'Ahmed', 'Mohammed', 'AhmedMohammed', 0, 0),
(9, 'Radwabergas27', 'radwabergas27@gmail.com', 'Radwa', 'Sayed', 'Radwabergas27', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts_products`
--
ALTER TABLE `carts_products`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`category_id`,`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts_products`
--
ALTER TABLE `carts_products`
  ADD CONSTRAINT `carts_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `category_product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `product_order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
