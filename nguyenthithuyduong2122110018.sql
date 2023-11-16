-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2023 at 01:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nguyenthithuyduong2122110018`
--

-- --------------------------------------------------------

--
-- Table structure for table `0018_banner`
--

CREATE TABLE `0018_banner` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `link` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `sort_order` int UNSIGNED NOT NULL DEFAULT '1',
  `position` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0018_brand`
--

CREATE TABLE `0018_brand` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `sort_order` int UNSIGNED NOT NULL DEFAULT '1',
  `description` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0018_category`
--

CREATE TABLE `0018_category` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `parent_id` int UNSIGNED NOT NULL DEFAULT '0',
  `sort_order` int UNSIGNED NOT NULL DEFAULT '1',
  `image` varchar(1000) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `level` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0018_contact`
--

CREATE TABLE `0018_contact` (
  `id` int NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `replay_id` int UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0018_menu`
--

CREATE TABLE `0018_menu` (
  `id` int NOT NULL,
  `name` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `table_id` int UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `parent_id` int UNSIGNED NOT NULL DEFAULT '0',
  `level` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0018_order`
--

CREATE TABLE `0018_order` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `deliveryname` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `deliveryphone` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `deliveryemail` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `deliveryaddress` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `note` varchar(1000) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0018_orderdetail`
--

CREATE TABLE `0018_orderdetail` (
  `id` int NOT NULL,
  `order_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `price` float NOT NULL,
  `qty` int UNSIGNED NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0018_post`
--

CREATE TABLE `0018_post` (
  `id` int UNSIGNED NOT NULL,
  `topic_id` int UNSIGNED DEFAULT NULL,
  `title` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `detail` mediumtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'post',
  `description` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0018_product`
--

CREATE TABLE `0018_product` (
  `id` int UNSIGNED NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `brand_id` int UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `price_sale` float NOT NULL,
  `image` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `qty` int UNSIGNED NOT NULL,
  `detail` mediumtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0018_topic`
--

CREATE TABLE `0018_topic` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `0018_user`
--

CREATE TABLE `0018_user` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `roles` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `0018_banner`
--
ALTER TABLE `0018_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0018_brand`
--
ALTER TABLE `0018_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0018_category`
--
ALTER TABLE `0018_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0018_contact`
--
ALTER TABLE `0018_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0018_menu`
--
ALTER TABLE `0018_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0018_order`
--
ALTER TABLE `0018_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0018_orderdetail`
--
ALTER TABLE `0018_orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0018_post`
--
ALTER TABLE `0018_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0018_product`
--
ALTER TABLE `0018_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0018_topic`
--
ALTER TABLE `0018_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `0018_user`
--
ALTER TABLE `0018_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `0018_banner`
--
ALTER TABLE `0018_banner`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0018_brand`
--
ALTER TABLE `0018_brand`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0018_category`
--
ALTER TABLE `0018_category`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0018_contact`
--
ALTER TABLE `0018_contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0018_menu`
--
ALTER TABLE `0018_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0018_order`
--
ALTER TABLE `0018_order`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0018_orderdetail`
--
ALTER TABLE `0018_orderdetail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0018_post`
--
ALTER TABLE `0018_post`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0018_product`
--
ALTER TABLE `0018_product`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0018_topic`
--
ALTER TABLE `0018_topic`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `0018_user`
--
ALTER TABLE `0018_user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
