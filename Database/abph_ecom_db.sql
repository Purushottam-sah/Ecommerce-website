-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2023 at 02:46 PM
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
-- Database: `abph_ecom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand_db`
--

CREATE TABLE `brand_db` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_image` varchar(255) NOT NULL,
  `b_metadesc` text NOT NULL,
  `b_status` tinyint(4) NOT NULL DEFAULT 0,
  `b_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand_db`
--

INSERT INTO `brand_db` (`b_id`, `b_name`, `b_image`, `b_metadesc`, `b_status`, `b_created_at`) VALUES
(1, 'Attires Nepal', 'atire nepal.jpg', '<p>Attire Nepal is a Nepal based Trading Company established in Kathmandu since the year 1993. We have 25 years’ experience in building customer satisfaction by providing enormous range of quality products in the Ladies Fashion Industry. We sell all kinds of ladies’ garments according to the latest fashion</p>', 1, '2023-12-20 01:56:22'),
(2, 'No Brand    ', '9f9fc834c618ba0ce08e7ecde415e944.jpg', '', 1, '2023-12-20 03:23:02'),
(3, 'FuLoo', 'fluoo.png', '<p>Fluoo</p>', 1, '2023-12-24 03:12:08'),
(4, 'Creative Touch', 'creative touvh.png', '<p>Creative Touch</p>', 1, '2023-12-24 03:12:45'),
(5, 'CARAT', 'carat.png', '<p>CARAT</p>', 1, '2023-12-24 03:13:08'),
(6, 'Miss Chase', 'chase.png', '<p>Miss Chase</p>', 1, '2023-12-24 03:13:46'),
(7, 'FanCyra', 'fancry.jpg', '<p>Fancyra</p>', 0, '2023-12-24 03:14:05'),
(8, 'DAPXY', 'dapyrx.png', '<p>Dapxy</p>', 0, '2023-12-24 03:14:23'),
(9, 'LOGO   ', 'logo.png', '<p>LOGO</p>', 1, '2023-12-24 03:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories_db`
--

CREATE TABLE `categories_db` (
  `id` int(11) NOT NULL,
  `cate_name` int(11) NOT NULL,
  `cate_subcate` int(11) NOT NULL,
  `cate_subcate1` varchar(255) NOT NULL,
  `cate_subcate2` varchar(255) NOT NULL,
  `cate_slug_id` int(11) NOT NULL,
  `cate_desc` mediumtext NOT NULL,
  `cate_status` tinyint(4) NOT NULL DEFAULT 0,
  `cate_popular` tinyint(4) NOT NULL DEFAULT 0,
  `cate_img` varchar(255) NOT NULL,
  `cate_metatitle` varchar(255) NOT NULL,
  `cate_metadesc` text NOT NULL,
  `cate_metakeyword` varchar(1000) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories_db`
--

INSERT INTO `categories_db` (`id`, `cate_name`, `cate_subcate`, `cate_subcate1`, `cate_subcate2`, `cate_slug_id`, `cate_desc`, `cate_status`, `cate_popular`, `cate_img`, `cate_metatitle`, `cate_metadesc`, `cate_metakeyword`, `create_at`) VALUES
(41, 4, 5, '    ', '    ', 1, 'Tops  & T-shirts', 1, 1, 'tops.jpg', 'Tops  & T-shirts', '<p>Tops &nbsp;&amp; T-shirts</p>', 'Tops  & T-shirts', '2023-12-25 00:54:43'),
(42, 5, 18, '', '', 5, 'Saree', 1, 1, 'saree.jpg', 'Saree', '<p>Saree</p>', ' Saree', '2023-12-25 03:55:46'),
(43, 6, 19, '', '', 6, 'BackPacks', 1, 1, 'bag.jpg', 'BackPacks', '<p>BackPacks</p>', ' BackPacks', '2023-12-25 03:57:15'),
(44, 4, 10, '', '', 7, 'Hoodies & Sweatshirts', 1, 1, 'hoodies.jpg', 'Hoodies & Sweatshirts', '<p>Hoodies &amp; Sweatshirts</p>', ' Hoodies & Sweatshirts', '2023-12-25 04:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `child_cate_db`
--

CREATE TABLE `child_cate_db` (
  `child_id` int(11) NOT NULL,
  `csubcate_name` varchar(255) NOT NULL,
  `c_catedesc` text NOT NULL,
  `c_cateimg` varchar(255) NOT NULL,
  `c_catepopular` tinyint(4) NOT NULL DEFAULT 0,
  `c_catestatus` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_cate_db`
--

INSERT INTO `child_cate_db` (`child_id`, `csubcate_name`, `c_catedesc`, `c_cateimg`, `c_catepopular`, `c_catestatus`) VALUES
(5, 'Tops & T-shirts', 'Tops & T-shirts', 'tops.jpg', 1, 1),
(10, 'Hoodies & Sweatshirts', 'Hoodies & Sweatshirts', 'hoodies.jpg', 0, 1),
(11, 'Sweater & Cardigans', 'Sweater & Cardigans', 'sweater.jpg', 0, 0),
(12, 'Pants & Leggings', 'Pants & Leggings', 'pants.jpg', 1, 1),
(13, 'Jeans', 'Jeans', 'jeans.jpg', 0, 1),
(14, 'Shorts', 'Shorts', 'shorts.jpg', 0, 1),
(15, 'Skirts', 'Skirts', 'skirts.jpg', 0, 1),
(16, '  Dresses  ', 'Dresses', 'dress.jpg', 1, 1),
(17, '  Party Wear  ', 'Party Wear', 'partwear.jpg', 1, 1),
(18, 'Saree', 'Saree', 'saree.jpg', 1, 1),
(19, 'BackPacks', 'BackPacks', 'bag.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `imageslider_db`
--

CREATE TABLE `imageslider_db` (
  `s_id` int(11) NOT NULL,
  `slider_1` varchar(255) NOT NULL,
  `s_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `imageslider_db`
--

INSERT INTO `imageslider_db` (`s_id`, `slider_1`, `s_status`, `created_at`) VALUES
(4, '3.jpg', 1, '2023-12-20 20:40:40'),
(5, '2.jpg', 1, '2023-12-20 20:41:21'),
(6, '1.jpg', 0, '2023-12-20 20:41:56'),
(7, '4.jpg', 1, '2023-12-20 20:42:00'),
(8, '5.jpg', 0, '2023-12-20 20:42:06'),
(9, '6.jpg', 1, '2023-12-20 20:42:26'),
(10, 'banner1.png', 1, '2023-12-20 20:43:02'),
(11, '3c71aa84-aaaa-4abf-aa65-ce61eb084d5f.jpg', 1, '2023-12-20 21:05:03'),
(12, '9c643877-507d-48af-b7d9-4deef62fc96a.jpg', 0, '2023-12-20 21:05:03'),
(13, 'cf1ffeaf-8d3c-40d0-8709-befc21185e6b.jpg', 1, '2023-12-20 21:05:04'),
(14, '3b353747-cb36-4ae5-ac38-358ff1a9ed01.jpg', 0, '2023-12-20 21:05:04'),
(15, 'adfae0b9-1695-463c-8edf-c725be22c6ac.jpg', 1, '2023-12-20 21:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `l_id` int(11) NOT NULL,
  `l_website_name` varchar(255) NOT NULL,
  `l_image` varchar(255) NOT NULL,
  `l_status` tinyint(4) NOT NULL DEFAULT 0,
  `l_created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logo_db`
--

CREATE TABLE `logo_db` (
  `logo_id` int(11) NOT NULL,
  `logo_wname` varchar(255) NOT NULL,
  `logo_img` varchar(255) NOT NULL,
  `logo_status` tinyint(4) NOT NULL DEFAULT 0,
  `logo_created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo_db`
--

INSERT INTO `logo_db` (`logo_id`, `logo_wname`, `logo_img`, `logo_status`, `logo_created_at`) VALUES
(3, 'ABPHEcom', 'logo.png', 1, '2023-12-21 09:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `offer_banner_db`
--

CREATE TABLE `offer_banner_db` (
  `o_id` int(11) NOT NULL,
  `o_title` varchar(255) NOT NULL,
  `o_image` varchar(255) NOT NULL,
  `o_status` tinyint(4) NOT NULL DEFAULT 0,
  `o_created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offer_banner_db`
--

INSERT INTO `offer_banner_db` (`o_id`, `o_title`, `o_image`, `o_status`, `o_created_at`) VALUES
(1, '  Chrimas Offers', 'offer.png', 1, '2023-12-22 08:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `product_db`
--

CREATE TABLE `product_db` (
  `p_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_brand_id` int(11) NOT NULL,
  `p_smalldesc` mediumtext NOT NULL,
  `p_desc` mediumtext NOT NULL,
  `p_price` float NOT NULL,
  `p_saleprice` float NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_status` tinyint(4) NOT NULL DEFAULT 0,
  `p_trending` tinyint(4) NOT NULL DEFAULT 0,
  `p_metatitle` varchar(255) NOT NULL,
  `p_metakeyword` mediumtext NOT NULL,
  `p_metadesc` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_db`
--

INSERT INTO `product_db` (`p_id`, `categories_id`, `p_name`, `p_brand_id`, `p_smalldesc`, `p_desc`, `p_price`, `p_saleprice`, `p_image`, `p_qty`, `p_status`, `p_trending`, `p_metatitle`, `p_metakeyword`, `p_metadesc`, `created_at`) VALUES
(9, 30, 'Real Time            ', 2, 'sdcbsjhb                ', 'sdcbjhb                ', 300, 200, 'shampoo.png', 200, 0, 1, 'Shampoos             ', 'usdhciushdc', '<p>sdcshdc</p>', '2023-12-20 09:27:13'),
(10, 30, 'zsv ', 2, 'bvjhxb', 'vbshb', 280, 250, '9f9fc834c618ba0ce08e7ecde415e944.jpg', 400, 1, 1, 'shbvjhsdb', 'dnvd', '<p>dfvndjfhvn</p>', '2023-12-23 15:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `registeruser_db`
--

CREATE TABLE `registeruser_db` (
  `uid` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `uemail` varchar(30) NOT NULL,
  `uphone` int(10) NOT NULL,
  `upass` varchar(30) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_as` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registeruser_db`
--

INSERT INTO `registeruser_db` (`uid`, `uname`, `uemail`, `uphone`, `upass`, `create_at`, `role_as`) VALUES
(1, 'Rajesh Yadav', 'rajesh@gmail.com', 2147483647, 'Rajesh@#12', '2023-12-16 07:55:42', 0),
(4, 'Rohan Sardar', 'rohan@gmail.com', 2147483647, 'Rohan@#12', '2023-12-16 08:01:09', 0),
(5, 'Mohan Das', 'ajdsfasd@gmail.com', 2147483647, 'eh2aK2F8@uFvC', '2023-12-16 08:03:07', 0),
(6, 'Rahul', 'roshan@gmail.com', 2147483647, 'Roshan@#123', '2023-12-16 12:47:23', 0),
(7, 'Rama Sahu', 'rama@gmail.com', 2147483647, 'Rama@#12', '2023-12-16 13:38:19', 0),
(8, 'Ranhu Ras', 'rahnu@gmail.com', 2147483647, 'Ranju!@1', '2023-12-16 13:41:03', 0),
(9, 'Admin', 'admin@gmail.com', 2147483647, 'Admin@#2080', '2023-12-16 13:51:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcate_db`
--

CREATE TABLE `subcate_db` (
  `sub_id` int(11) NOT NULL,
  `scate_name` varchar(255) NOT NULL,
  `c_catedesc` text NOT NULL,
  `s_cateimg` varchar(255) NOT NULL,
  `s_catestatus` tinyint(4) NOT NULL DEFAULT 0,
  `s_catepopular` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcate_db`
--

INSERT INTO `subcate_db` (`sub_id`, `scate_name`, `c_catedesc`, `s_cateimg`, `s_catestatus`, `s_catepopular`) VALUES
(4, 'Clothing', 'Clothing', 'partwear.jpg', 1, 1),
(5, 'Traditional Clothing', 'Traditional Clothing', 'traditional.jpg', 1, 1),
(6, ' Women\'s Bag ', ' Women\'s Bag ', 'women bag.jpg', 1, 0),
(7, 'Shoes', 'Shoes', 'shoes.jpg', 1, 1),
(8, 'Accessories', 'Accessories', 'accessories.jpg', 1, 1),
(9, 'Lingerie, Sleep & Lounge', 'Lingerie, Sleep & Lounge', 'longue.png', 1, 1),
(10, '  Girls Fashion\'s  ', '  Girls Fashion\'s', 'fashion.png', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand_db`
--
ALTER TABLE `brand_db`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `categories_db`
--
ALTER TABLE `categories_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_cate_db`
--
ALTER TABLE `child_cate_db`
  ADD PRIMARY KEY (`child_id`);

--
-- Indexes for table `imageslider_db`
--
ALTER TABLE `imageslider_db`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `logo_db`
--
ALTER TABLE `logo_db`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `offer_banner_db`
--
ALTER TABLE `offer_banner_db`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `product_db`
--
ALTER TABLE `product_db`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `registeruser_db`
--
ALTER TABLE `registeruser_db`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `subcate_db`
--
ALTER TABLE `subcate_db`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand_db`
--
ALTER TABLE `brand_db`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories_db`
--
ALTER TABLE `categories_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `child_cate_db`
--
ALTER TABLE `child_cate_db`
  MODIFY `child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `imageslider_db`
--
ALTER TABLE `imageslider_db`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logo_db`
--
ALTER TABLE `logo_db`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `offer_banner_db`
--
ALTER TABLE `offer_banner_db`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_db`
--
ALTER TABLE `product_db`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `registeruser_db`
--
ALTER TABLE `registeruser_db`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subcate_db`
--
ALTER TABLE `subcate_db`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
