-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 11:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcat` (IN `cid` INT)   SELECT * FROM categories WHERE cat_id=cid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '2017-01-24 16:21:18', '05-09-2023 06:36:22 PM');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `productCode` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `productCode`, `creationDate`, `updationDate`) VALUES
(3, 'Gifts', 'For Gift,\r\nAnyone Can Give Anyone Gift,\r\nGift item\r\n', 'GF', '2017-01-24 19:17:37', '14-09-2023 06:47:57 PM'),
(4, 'Paper Work', 'In this category we have two sub category Greeting Cards And Files', 'PW', '2017-01-24 19:19:32', '14-09-2023 07:26:33 PM'),
(5, 'Purses', 'Hand Bags Ana Wallets', 'PR', '2017-01-24 19:19:54', '14-09-2023 07:38:25 PM'),
(6, 'Fashion', 'Fashion', 'FA', '2017-02-20 19:18:52', ''),
(8, 'Dolls', 'Toy dolls for girls', 'DO', '2023-09-05 17:28:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(7, 4, '15', 1, '2023-09-06 15:45:30', 'COD', 'Delivered'),
(8, 4, '6', 1, '2023-09-08 12:45:33', 'Debit / Credit card', 'Delivered'),
(9, 4, '22', 2147483647, '2023-09-08 13:03:28', 'COD', 'Delivered'),
(10, 4, '2', 2147483647, '2023-09-12 14:40:41', 'COD', NULL),
(11, 4, '15', 1, '2023-09-15 14:53:40', 'COD', 'Delivered'),
(12, 4, '15', 1, '2023-09-16 08:50:04', 'COD', 'Delivered'),
(13, 1, '15', 1, '2023-09-16 08:53:23', 'Internet Banking', NULL),
(14, 1, '15', 2, '2023-09-16 14:34:16', 'COD', NULL),
(15, 4, '15', 2, '2023-09-16 14:35:05', 'COD', 'Delivered'),
(16, 4, '16', 1, '2023-09-17 12:24:58', 'COD', NULL),
(17, 4, '22', 1, '2023-09-17 12:24:58', 'COD', NULL),
(18, 4, '22', 1, '2023-09-20 12:47:07', 'COD', 'Delivered'),
(20, 1, '27', 1, '2023-09-21 15:04:02', 'COD', NULL),
(21, 1, '27', 1, '2023-09-21 15:04:27', 'COD', NULL),
(22, 1, '15', 1, '2023-09-21 15:06:22', 'COD', NULL),
(23, 4, '24', 1, '2023-09-21 15:10:14', 'COD', 'Delivered'),
(24, 4, '23', 1, '2023-09-22 09:24:27', '', 'Delivered'),
(25, 4, '15', 2, '2023-09-24 19:13:48', 'COD', 'Delivered'),
(29, 4, '22', 1, '2023-09-26 04:44:34', 'COD', NULL),
(33, 4, '22', 1, '2023-09-28 12:59:23', 'COD', NULL),
(34, 4, '22', 1, '2023-09-28 13:04:16', 'COD', NULL),
(35, 4, '16', 1, '2023-09-28 13:44:57', 'COD', NULL),
(36, 5, '23', 1, '2023-09-28 13:51:28', 'Internet Banking', NULL),
(37, 5, '33', 2, '2023-09-29 09:18:11', 'Internet Banking', NULL),
(38, 6, '25', 1, '2023-09-29 17:52:42', 'COD', 'Delivered'),
(39, 7, '23', 1, '2023-09-29 18:03:05', 'COD', 'Delivered'),
(40, 7, '33', 1, '2023-09-29 18:03:05', 'COD', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(1, 3, 'in Process', 'Order has been Shipped.', '2017-03-10 19:36:45'),
(2, 1, 'Delivered', 'Order Has been delivered', '2017-03-10 19:37:31'),
(3, 3, 'Delivered', 'Product delivered successfully', '2017-03-10 19:43:04'),
(4, 4, 'in Process', 'Product ready for Shipping', '2017-03-10 19:50:36'),
(5, 7, 'in Process', 'jytdi', '2023-09-06 16:11:45'),
(6, 1, 'Delivered', '23151', '2023-09-06 16:12:17'),
(7, 4, 'Delivered', '\r\n3263', '2023-09-06 16:12:51'),
(8, 5, 'Delivered', 'gfuty', '2023-09-06 16:13:23'),
(9, 6, 'Delivered', 'mbgfk', '2023-09-06 16:13:43'),
(10, 7, 'Delivered', 'Thank you!!', '2023-09-08 12:23:08'),
(11, 9, 'Delivered', 'zcgvasdrga', '2023-09-08 13:05:39'),
(12, 8, 'in Process', 'qwertwe', '2023-09-08 13:06:05'),
(13, 8, 'Delivered', 'wert34t', '2023-09-08 13:06:16'),
(14, 12, 'in Process', 'Wait For It', '2023-09-16 08:51:06'),
(15, 11, 'in Process', 'Wait', '2023-09-16 11:03:11'),
(16, 11, 'Delivered', 'Thank you\r\n', '2023-09-16 11:08:36'),
(17, 12, 'Delivered', 'Thanks', '2023-09-16 11:08:51'),
(18, 18, 'Delivered', 'n ctj\r\n', '2023-09-20 12:55:45'),
(19, 25, 'Delivered', 'Thskfgiuag', '2023-09-24 19:14:41'),
(20, 26, 'in Process', 'Wait!!!', '2023-09-25 10:15:24'),
(21, 15, 'Delivered', 'sfsdf', '2023-09-25 10:30:04'),
(22, 24, 'Delivered', 'adfgasdf', '2023-09-25 10:38:26'),
(23, 23, 'Delivered', 'asetfwaesf', '2023-09-25 10:38:44'),
(24, 30, 'Delivered', 'Thankssssssssssss', '2023-09-26 14:09:11'),
(25, 40, 'Delivered', 'fytfygyg', '2023-09-29 19:10:38'),
(26, 39, 'Delivered', 'Freuykdf6ruiy76', '2023-10-01 17:29:13'),
(27, 38, 'Delivered', 'UGAsrb', '2023-10-01 17:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `productreviews`
--

INSERT INTO `productreviews` (`id`, `productId`, `quality`, `price`, `value`, `name`, `summary`, `review`, `reviewDate`) VALUES
(2, 3, 4, 5, 5, 'Anees', 'BEST PRODUCT FOR ME :)', 'BEST PRODUCT FOR ME :)', '2023-02-24 20:43:57'),
(3, 3, 3, 4, 3, 'Meesum', 'Nice Product', 'Value for money', '2023-02-09 20:52:46'),
(4, 3, 3, 4, 3, 'Hasan', 'Nice Product', 'Value for money', '2023-02-03 20:59:19'),
(5, 22, 3, 4, 5, 'asdfs', 'dfasdf', 'asdfgsd', '2023-09-11 12:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productPriceBeforeDiscount` int(11) DEFAULT NULL,
  `productDescription` longtext DEFAULT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`) VALUES
(15, 3, 8, 'Handmade Metallic Balochi Warrior Statue 17', 'Fun Parey', 14990, 18260, '<ol><li style=\"-webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; list-style: outside disc;\">The Balochi Warrior statue is a handmade figurine.</li><li style=\"-webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; list-style: outside disc;\">The Statue is made from Lead Alloy and finished in Antique Copper Color.</li><li style=\"-webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; list-style: outside disc;\">Wooden Base has been used to enhance the model. Height is 16 inches, Length is 17 inches and the product weighs around 4 Kg.</li><li style=\"-webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; list-style: outside disc;\">This particular statue showcases spirit and agility of a Balochi Warrior on a horse back that has intrinsically detailed by the craftsman.</li><li style=\"-webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; list-style: outside disc;\">The model also signifies the strength of the Baloch tribe who are the Pride of Pakistan.</li><li style=\"-webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; list-style: outside disc;\">Both the horse, the rider and the accessories are beautifully showcased in the statue and thoroughly detailed by the Artisans.</li><li style=\"-webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; list-style: outside disc;\">This is a collectors item, and also made on order.</li><li style=\"-webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; list-style: outside disc;\">The product comes with Funparey safe order guarantee.</li><li style=\"-webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; list-style: outside disc;\">Get FREE Shipment all over Pakistan when you purchase this product from Funparey.</li></ol>', 'B2-P78-001-ED3010.jpg', 'B2-P78-002-ED3010.jpg', 'B2-P78-004-ED3010.jpg', 150, 'In Stock', '2017-02-04 04:35:13', ''),
(16, 3, 8, 'Stylish Modernize Table Watch', 'Dulux', 399, 500, 'Best Gift Item for giving Someone As a gift,\r\nTable Watch Stylish...', 'gift-article2.jpg', 'gift-article2 (3).jpg', 'gift-article2 (2).jpg', 60, 'In Stock', '2017-02-04 04:36:23', ''),
(22, 8, 13, 'Feeder Doll Crying Baby Doll ', 'No Brand', 1799, 2500, 'Feeder Doll Crying Baby Doll And Baba Boy With Feeder Musical Doll Best Birthday Gift for Girls<br><div>Doll gift for kids adjustable etc.</div>', 'doll (1).jpg', 'doll (3).jpg', 'doll (7).jpg', 99, 'In Stock', '2023-09-06 12:45:15', NULL),
(23, 3, 8, 'Ship Showpiece For gifting', 'No Brand', 540, 765, 'Titanic Showpiece For gifting', 'gift-article4.jpg', 'gift-article4 (3).jpg', 'gift-article4 (2).jpg', 99, 'In Stock', '2023-09-14 14:07:53', NULL),
(24, 3, 8, 'Peacock Gifts – Best Presents Guide', 'Peacock Gifts', 1799, 2500, 'Are you looking for the best peacock gift ideas? You’ve come to the right place! In this blog post, we will discuss some of the best gifts that you can give a peacock lover.', 'gift-article3.jpg', 'gift-article3 (1).jpg', 'gift-article3jpg2.jpg', 99, 'In Stock', '2023-09-14 14:11:37', NULL),
(25, 3, 8, 'Love Gift For Gf or Bf', 'Lovers', 450, 500, 'Teddy in a heart Lovely gifts', 'gift-article6.jpg', 'gift-article6.(3).jpg', 'gift-article6.(2).jpg', 99, 'In Stock', '2023-09-14 14:16:11', NULL),
(26, 3, 8, 'Silver Dish for Gifting - Gift Article', 'Sakura Jwelery', 640, 765, 'Silver Dish for Gifting - Gift Article', 'gift-article5.jpg', 'gift-article5 (2).jpg', 'gift-article5 (3).jpg', 100, 'In Stock', '2023-09-14 14:21:26', NULL),
(27, 4, 2, 'Best Happy New Year Cards', 'No Brand', 170, 200, '<div><br></div><div>greeting card, an illustrated message that expresses, either seriously or humorously, affection, good will, gratitude, sympathy, or other sentiments. Greeting cards are usually sent by mail in observance of a special day or event and can be divided into two general classifications: seasonal and everyday.</div>', 'gcards3.jpg', 'gcards3 (3).jpg', 'gcards3 (2).jpg', 99, 'In Stock', '2023-09-21 11:46:49', NULL),
(32, 5, 9, 'Leather Top Handle Bag,', 'No Brand', 1799, 2500, '<span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">Olive genuine leather handbag from ukrainian designer Katerina Fox. This model is designed for women who appreciate the sleek design combined with functionality and comfort. High-quality and reliable hardware ensure long service bags. The internal space of a bag is equipped with one spacious compartment and two patch-pockets and one zipper pocket. The bag is closed with a zipper. The bottom of the bag is protected with metal legs. There is a long handle that allows you to wear the bag on the shoulder. The kit also includes a storage bag.</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">------------------------------------------------------------------------</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">You can watch video of our bags.</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">https://www.youtube.com/watch?v=R0exOOR0qqM</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">or you can search on youtube.com Katerina Fox.</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">------------------------------------------------------------------------</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">Brand: Katerina Fox</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">ID: KF-3161</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">Manufacturer: Ukraine</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">Color: Olive</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">Material: genuine leather</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">Hardware color: gold</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">Lining: microfiber</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">Size: Medium</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">Parameters: length of the bottom 25cm (of the top 21?m), height 20cm, width 12cm, handle length 117cm</span><br><div><br></div>', '71tZIgQ2cvL._SY575_.jpg', 'LTCSL624_big.jpg', '61mJRfMMzAL._SY500_.jpg', 100, 'In Stock', '2023-09-21 12:36:53', NULL),
(33, 5, 9, 'Lather Bag', 'Dulux', 1799, 2500, '<span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">Olive genuine leather handbag from ukrainian designer Katerina Fox. This model is designed for women who appreciate the sleek design combined with functionality and comfort. High-quality and reliable hardware ensure long service bags. The internal space of a bag is equipped with one spacious compartment and two patch-pockets and one zipper pocket. The bag is closed with a zipper. The bottom of the bag is protected with metal legs. There is a long handle that allows you to wear the bag on the shoulder. The kit also includes a storage bag.</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">------------------------------------------------------------------------</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">You can watch video of our bags.</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">https://www.youtube.com/watch?v=R0exOOR0qqM</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">or you can search on youtube.com Katerina Fox.</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">------------------------------------------------------------------------</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">Brand: Katerina Fox</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">ID: KF-3161</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">Manufacturer: Ukraine</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">Color: Olive</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">Material: genuine leather</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">Hardware color: gold</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">Lining: microfiber</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">Size: Medium</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">Parameters: length of the bottom 25cm (of the top 21?m), height 20cm, width 12cm, handle length 117cm</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">-------------------------------------------------------------------------</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">• Please note that real colors may slightly differ from their appearance on your display.</span><br style=\"margin: 0px; box-sizing: inherit; color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(34, 34, 34); font-family: &quot;Graphik Webfont&quot;, -apple-system, &quot;Helvetica Neue&quot;, &quot;Droid Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\">• By purchasing this item you confirm that you have read and accept entire item description and shop policies</span><br>', '1.jpg', '2.jpg', '3.jpg', 99, 'In Stock', '2023-09-21 12:56:06', NULL),
(34, 5, 9, 'Stylish handbag | purse', 'HighQualityBags', 1500, 1800, '<p font-size=\"16px\" font-weight=\"book\" color=\"greyT1\" class=\"sc-iBYQkv cPFcHn pre pre\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(97, 97, 115); font-size: 16px; line-height: 20px; font-family: &quot;Mier book&quot;; letter-spacing: 0.5px;\"><b>Name&nbsp;</b>:&nbsp;Stylish handbags | purse | branded handbags for Women | Women | Women wallet pu | Women purse small size | purses for ladies | Women bags | design wala|pu leather Women purse | high quality Women purse | best gift for girls/Women | trendy purse</p><p font-size=\"16px\" font-weight=\"book\" color=\"greyT1\" class=\"sc-iBYQkv cPFcHn pre pre\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(97, 97, 115); font-size: 16px; line-height: 20px; font-family: &quot;Mier book&quot;; letter-spacing: 0.5px;\"><b>Material&nbsp;</b>:&nbsp;PU</p><p font-size=\"16px\" font-weight=\"book\" color=\"greyT1\" class=\"sc-iBYQkv cPFcHn pre pre\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(97, 97, 115); font-size: 16px; line-height: 20px; font-family: &quot;Mier book&quot;; letter-spacing: 0.5px;\"><b>No</b>. <b>of Compartments&nbsp;</b>:&nbsp;3</p><p font-size=\"16px\" font-weight=\"book\" color=\"greyT1\" class=\"sc-iBYQkv cPFcHn pre pre\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(97, 97, 115); font-size: 16px; line-height: 20px; font-family: &quot;Mier book&quot;; letter-spacing: 0.5px;\"><b>Pattern&nbsp;</b>:&nbsp;Solid</p><p font-size=\"16px\" font-weight=\"book\" color=\"greyT1\" class=\"sc-iBYQkv cPFcHn pre pre\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(97, 97, 115); font-size: 16px; line-height: 20px; font-family: &quot;Mier book&quot;; letter-spacing: 0.5px;\"><b>Type&nbsp;</b>:&nbsp;Handbag Set</p><p font-size=\"16px\" font-weight=\"book\" color=\"greyT1\" class=\"sc-iBYQkv cPFcHn pre pre\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(97, 97, 115); font-size: 16px; line-height: 20px; font-family: &quot;Mier book&quot;; letter-spacing: 0.5px;\"><b>Net Quantity (N</b>)&nbsp;:&nbsp;1</p><p font-size=\"16px\" font-weight=\"book\" color=\"greyT1\" class=\"sc-iBYQkv cPFcHn pre pre\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(97, 97, 115); font-size: 16px; line-height: 20px; font-family: &quot;Mier book&quot;; letter-spacing: 0.5px;\"><b>Sizes&nbsp;</b>:&nbsp;Free Size (Length Size: 12 in, Width Size: 4 in, Height Size: 9 in)</p><p font-size=\"16px\" font-weight=\"book\" color=\"greyT1\" class=\"sc-iBYQkv cPFcHn pre pre\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(97, 97, 115); font-size: 16px; line-height: 20px; font-family: &quot;Mier book&quot;; letter-spacing: 0.5px;\"></p><p font-size=\"16px\" font-weight=\"book\" color=\"greyT1\" class=\"sc-iBYQkv cPFcHn pre pre\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(97, 97, 115); font-size: 16px; line-height: 20px; font-family: &quot;Mier book&quot;; letter-spacing: 0.5px;\">We use the soft high quality PU leather with heavy duty zipper hardware for this bag, very smooth and soft to the touch, comfortable, safe, fashionable and durable, odorless and high-end. When you touch the bag, the lining is durable and smooth, not easy to wear or tear.</p><p font-size=\"16px\" font-weight=\"book\" color=\"greyT1\" class=\"sc-iBYQkv cPFcHn pre pre\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(97, 97, 115); font-size: 16px; line-height: 20px; font-family: &quot;Mier book&quot;; letter-spacing: 0.5px;\">Country of Origin&nbsp;:&nbsp;India</p>', '4.jpg', '5.jpg', '6.jpg', 99, 'In Stock', '2023-09-21 13:07:51', NULL),
(35, 6, 12, 'Nivea Cellular Luminous630 Anti-Dark Spots Face Treatment Serum 300ml', 'Nivea', 7000, 11000, '<span translate=\"no\" style=\"margin: 0px; padding: 0px; font-weight: 700; color: rgb(51, 51, 51); font-family: &quot;Nunito Sans&quot;, Helvetica, &quot;Helvetica Neue&quot;, Arial, sans-serif; font-size: 15.2px; text-align: justify; background-color: rgb(255, 255, 255);\">Nivea Cellular Luminous630 Anti-Dark Spots Face Treatment Serum</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;Nunito Sans&quot;, Helvetica, &quot;Helvetica Neue&quot;, Arial, sans-serif; font-size: 15.2px; text-align: justify; background-color: rgb(255, 255, 255);\">&nbsp;is a daily use serum, suitable for all skin types and tones, that helps to prevent and reduce dark spots and hyperpigmentation. The innovative LUMINOUS630®, not only helps regulate melanin production to prevent the appearance of dark spots but also acts on existing hyperpigmentation helping lighten dark spots and reduce their size. It is able to target dark spots and hyperpigmentations caused by aging, hormonal factors, and sun exposure and lend the complexion a brighter and even look. After 4 weeks of use dark spots are visibly lightened and in 8 weeks their intensity is reduced by up to 50%. All in all, with a light formula that is easily absorbed, it is able to, day after day, unify the skin tone and lend the complexion an even and luminous look.</span><br>', '10291228.avif', 'nivea-cellular-luminous630-anti-dark-spots-advanced-treatment-serum-30ml_1.jpg', '6c525c02259e5fb814570d9de64ddabe3ac0fcbb.png', 100, 'In Stock', '2023-09-25 07:26:40', NULL),
(36, 6, 12, 'Collistar Body Anticellulite Slimming Superconcentrate Night 200ml', 'Notte Night', 17000, 21000, '<ul style=\"box-sizing: inherit; font-size: 16px; line-height: 30px; color: rgb(0, 0, 0); font-family: CeraPro-Regular;\"><li style=\"box-sizing: inherit;\">a night specialty that uses the skin tissue’s night-time biorhythms</li><li style=\"box-sizing: inherit;\">reshapes the body and combats unsightly cellulite.</li><li style=\"box-sizing: inherit;\">the high saline concentration has a fast draining effect.</li></ul>', '11126_5236_470_470.jpg', 'K25236_01.jpg', 'collistar-anticellulite-slimming-superconcentrate-night-200ml.jpg', 100, 'In Stock', '2023-09-26 03:13:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(2, 4, 'Greeting Cards', '2017-01-26 16:24:52', '14-09-2023 07:34:51 PM'),
(3, 4, 'Files', '2017-01-26 16:29:09', '14-09-2023 07:35:04 PM'),
(8, 3, 'Gift Articles', '2017-02-04 04:13:54', '14-09-2023 06:48:40 PM'),
(9, 5, 'Hand Bags', '2017-02-04 04:36:45', '14-09-2023 07:38:55 PM'),
(10, 5, 'Wallets', '2017-02-04 04:37:02', '14-09-2023 07:39:34 PM'),
(12, 6, 'Beauty Products', '2017-03-10 20:12:59', '14-09-2023 07:40:52 PM'),
(13, 8, 'Feeder Doll Crying Baby Doll ', '2023-09-05 17:32:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(25, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-06 13:05:53', NULL, 1),
(26, '', 0x3a3a3100000000000000000000000000, '2023-09-06 15:44:02', NULL, 0),
(27, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-06 15:44:27', NULL, 1),
(28, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-08 12:45:22', NULL, 1),
(29, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-08 13:03:15', NULL, 1),
(30, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-11 13:53:26', NULL, 1),
(31, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-12 06:42:50', NULL, 1),
(32, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-12 14:40:31', NULL, 1),
(33, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-15 13:59:09', NULL, 1),
(34, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-15 15:05:19', NULL, 1),
(35, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-15 15:06:03', NULL, 1),
(36, '', 0x3a3a3100000000000000000000000000, '2023-09-16 08:47:41', NULL, 0),
(37, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-16 08:47:47', '16-09-2023 03:00:02 PM', 1),
(38, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-16 09:30:14', '16-09-2023 04:36:51 PM', 1),
(39, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-16 11:07:01', NULL, 1),
(40, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-16 14:35:01', NULL, 1),
(41, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-17 12:24:05', '17-09-2023 05:55:35 PM', 1),
(42, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-17 18:31:30', '18-09-2023 12:03:01 AM', 1),
(43, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-17 18:44:22', NULL, 1),
(44, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-18 10:22:16', '18-09-2023 04:12:56 PM', 1),
(45, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-18 10:48:21', '18-09-2023 04:20:55 PM', 1),
(46, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-18 10:55:13', NULL, 1),
(47, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-20 12:47:03', '21-09-2023 08:39:47 PM', 1),
(48, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-21 15:09:56', NULL, 1),
(49, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-22 09:24:24', '22-09-2023 03:21:27 PM', 1),
(50, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-22 09:55:47', NULL, 1),
(51, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-22 18:31:26', NULL, 1),
(52, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-24 10:01:37', '24-09-2023 10:59:24 PM', 1),
(53, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-24 18:58:23', '25-09-2023 12:29:43 AM', 1),
(54, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-24 19:00:56', '25-09-2023 12:31:18 AM', 1),
(55, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-24 19:13:45', NULL, 1),
(56, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-25 10:12:09', NULL, 1),
(57, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-26 04:44:32', NULL, 1),
(58, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-26 14:07:26', '26-09-2023 07:40:02 PM', 1),
(59, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-27 13:55:21', '27-09-2023 07:31:36 PM', 1),
(60, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-27 14:01:46', '27-09-2023 07:32:48 PM', 1),
(61, 'aneesahmedanees@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-27 14:03:05', NULL, 0),
(62, 'aneesahmedanees49@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-27 14:03:26', NULL, 0),
(63, 'anees@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-27 14:05:03', '27-09-2023 07:42:16 PM', 1),
(64, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-27 14:12:24', '27-09-2023 08:04:42 PM', 1),
(65, 'anees@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-27 14:34:53', NULL, 1),
(66, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-28 12:59:19', NULL, 1),
(67, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-28 13:44:51', '28-09-2023 07:20:35 PM', 1),
(68, 'anees@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-28 13:50:42', NULL, 1),
(69, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-28 14:01:19', NULL, 1),
(70, 'anees@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-29 09:18:02', NULL, 1),
(71, 'hassan123@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-29 17:52:39', '29-09-2023 11:23:52 PM', 1),
(72, 'hhklhklhkk@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-29 18:02:54', NULL, 1),
(73, 'hhklhklhkk@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-29 18:10:11', NULL, 1),
(74, 'meesum@gmail.com', 0x3a3a3100000000000000000000000000, '2023-10-01 17:14:52', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext DEFAULT NULL,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `billingAddress` longtext DEFAULT NULL,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`) VALUES
(4, 'Meesum Abbas', 'meesum@gmail.com', 3110223699, '81dc9bdb52d04dc20036dbd8313ed055', 'House no.19,Block R-1 Ghazi town phase 1 malir Karachi.\r\n03110223699', 'Sindh', 'Karachi', 75070, 'House no.19,Block R-1 Ghazi town phase 1 malir Karachi.\r\n03110223699', 'Sindh', 'Karachi', 75070, '2023-09-06 13:05:40', NULL),
(5, 'Anees Ahmed', 'anees@gmail.com', 311022369, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 'JSTYdfaeg', 'awrbwrb', 'qwetbetwq', 0, '2023-09-27 14:04:51', NULL),
(6, 'Hasan Aptech', 'hassan123@gmail.com', 3110223699, '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-29 17:52:27', NULL),
(7, 'hkjh', 'hhklhklhkk@gmail.com', 2254488, '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, '', 'pakistan', 'karachi', 75200, '2023-09-29 18:01:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userId`, `productId`, `postingDate`) VALUES
(6, 1, 16, '2023-09-21 13:31:31'),
(7, 4, 35, '2023-09-27 14:22:02');

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
