-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2024 at 05:03 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamper`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` int NOT NULL,
  `phone_number` int NOT NULL,
  `default` int NOT NULL DEFAULT '0',
  `user` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `App\Models\ProductVariants` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_id` int DEFAULT NULL,
  `banner_image_id` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `slug`, `title`, `short_description`, `description`, `image_id`, `banner_image_id`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'fresh-produce', 'Fresh Produce', '<p>Fresh Produce</p>', '<p>Fresh Produce</p>', NULL, 75, 1, '2024-07-13 01:09:01', '2024-07-18 04:53:15'),
(2, 1, 'fruits', 'Fruits', 'Fruits', 'Fruits', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(3, 1, 'vegetables', 'Vegetables', 'Vegetables', 'Vegetables', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(4, 1, 'fresh-herbs', 'Fresh Herbs', 'Fresh Herbs', 'Fresh Herbs', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(5, NULL, 'dairy', 'Dairy', '<p>Dairy</p>', '<p>Dairy</p>', NULL, 76, 1, '2024-07-13 01:09:02', '2024-07-18 05:06:58'),
(6, 5, 'milk', 'Milk', 'Milk', 'Milk', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(7, 5, 'cheese', 'Cheese', 'Cheese', 'Cheese', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(8, 5, 'yogurt', 'Yogurt', 'Yogurt', 'Yogurt', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(9, 5, 'butter-margarine', 'Butter & Margarine', 'Butter & Margarine', 'Butter & Margarine', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(10, 5, 'eggs', 'Eggs', 'Eggs', 'Eggs', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(11, NULL, 'meat-seafood', 'Meat & Seafood', '<p>Meat &amp; Seafood</p>', '<p>Meat &amp; Seafood</p>', NULL, 77, 1, '2024-07-13 01:09:02', '2024-07-18 05:06:55'),
(12, 11, 'beef', 'Beef', 'Beef', 'Beef', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(13, 11, 'pork', 'Pork', 'Pork', 'Pork', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(14, 11, 'chicken', 'Chicken', 'Chicken', 'Chicken', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(15, 11, 'turkey', 'Turkey', 'Turkey', 'Turkey', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(16, 11, 'lamb', 'Lamb', 'Lamb', 'Lamb', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(17, 11, 'fish', 'Fish', 'Fish', 'Fish', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(18, 11, 'shellfish', 'Shellfish', 'Shellfish', 'Shellfish', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(19, 11, 'deli-meats', 'Deli Meats', 'Deli Meats', 'Deli Meats', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(20, NULL, 'bakery', 'Bakery', '<p>Bakery</p>', '<p>Bakery</p>', NULL, 78, 1, '2024-07-13 01:09:02', '2024-07-18 05:06:53'),
(21, 20, 'bread', 'Bread', 'Bread', 'Bread', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(22, 20, 'rolls-buns', 'Rolls & Buns', 'Rolls & Buns', 'Rolls & Buns', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(23, 20, 'bagels-muffins', 'Bagels & Muffins', 'Bagels & Muffins', 'Bagels & Muffins', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(24, 20, 'cakes-pastries', 'Cakes & Pastries', 'Cakes & Pastries', 'Cakes & Pastries', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(25, 20, 'cookies', 'Cookies', 'Cookies', 'Cookies', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(26, NULL, 'pantry-staples', 'Pantry Staples', '<p>Pantry Staples</p>', '<p>Pantry Staples</p>', NULL, 79, 1, '2024-07-13 01:09:02', '2024-07-18 05:06:51'),
(27, 26, 'pasta-noodles', 'Pasta & Noodles', 'Pasta & Noodles', 'Pasta & Noodles', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(28, 26, 'rice-grains', 'Rice & Grains', 'Rice & Grains', 'Rice & Grains', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(29, 26, 'canned-goods', 'Canned Goods', 'Canned Goods', 'Canned Goods', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(30, 26, 'sauces-condiments', 'Sauces & Condiments', 'Sauces & Condiments', 'Sauces & Condiments', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(31, 26, 'spices-seasonings', 'Spices & Seasonings', 'Spices & Seasonings', 'Spices & Seasonings', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(32, 26, 'baking-supplies', 'Baking Supplies', 'Baking Supplies', 'Baking Supplies', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(33, 26, 'oil-vinegar', 'Oil & Vinegar', 'Oil & Vinegar', 'Oil & Vinegar', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(34, NULL, 'beverages', 'Beverages', '<p>Beverages</p>', '<p>Beverages</p>', NULL, 80, 1, '2024-07-13 01:09:02', '2024-07-18 05:06:49'),
(35, 34, 'water', 'Water', 'Water', 'Water', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(36, 34, 'soft-drinks', 'Soft Drinks', 'Soft Drinks', 'Soft Drinks', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(37, 34, 'juices', 'Juices', 'Juices', 'Juices', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(38, 34, 'tea', 'Tea', 'Tea', 'Tea', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(39, 34, 'coffee', 'Coffee', 'Coffee', 'Coffee', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(40, 34, 'alcoholic-beverages', 'Alcoholic Beverages', 'Alcoholic Beverages', 'Alcoholic Beverages', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(41, 40, 'beer', 'Beer', 'Beer', 'Beer', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(42, 40, 'wine', 'Wine', 'Wine', 'Wine', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(43, 40, 'spirits', 'Spirits', 'Spirits', 'Spirits', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(44, NULL, 'frozen-foods', 'Frozen Foods', '<p>Frozen Foods</p>', '<p>Frozen Foods</p>', NULL, 81, 1, '2024-07-13 01:09:02', '2024-07-18 05:06:47'),
(45, 44, 'frozen-vegetables', 'Frozen Vegetables', 'Frozen Vegetables', 'Frozen Vegetables', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(46, 44, 'frozen-fruits', 'Frozen Fruits', 'Frozen Fruits', 'Frozen Fruits', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(47, 44, 'frozen-meals', 'Frozen Meals', 'Frozen Meals', 'Frozen Meals', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(48, 44, 'ice-cream-desserts', 'Ice Cream & Desserts', 'Ice Cream & Desserts', 'Ice Cream & Desserts', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(49, 44, 'frozen-meat-seafood', 'Frozen Meat & Seafood', 'Frozen Meat & Seafood', 'Frozen Meat & Seafood', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(50, NULL, 'snacks', 'Snacks', '<p>Snacks</p>', '<p>Snacks</p>', NULL, 82, 1, '2024-07-13 01:09:02', '2024-07-18 05:06:46'),
(51, 50, 'chips-pretzels', 'Chips & Pretzels', 'Chips & Pretzels', 'Chips & Pretzels', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(52, 50, 'nuts-seeds', 'Nuts & Seeds', 'Nuts & Seeds', 'Nuts & Seeds', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(53, 50, 'cookies-crackers', 'Cookies & Crackers', 'Cookies & Crackers', 'Cookies & Crackers', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(54, 50, 'candy-chocolate', 'Candy & Chocolate', 'Candy & Chocolate', 'Candy & Chocolate', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(55, NULL, 'health-beauty', 'Health & Beauty', '<p>Health &amp; Beauty</p>', '<p>Health &amp; Beauty</p>', NULL, 83, 1, '2024-07-13 01:09:02', '2024-07-18 05:06:44'),
(56, 55, 'personal-care', 'Personal Care', 'Personal Care', 'Personal Care', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(57, 56, 'shampoo', 'Shampoo', 'Shampoo', 'Shampoo', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(58, 56, 'soap', 'Soap', 'Soap', 'Soap', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(59, 55, 'oral-care', 'Oral Care', 'Oral Care', 'Oral Care', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(60, 59, 'toothpaste', 'Toothpaste', 'Toothpaste', 'Toothpaste', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(61, 59, 'mouthwash', 'Mouthwash', 'Mouthwash', 'Mouthwash', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(62, 55, 'skincare', 'Skincare', 'Skincare', 'Skincare', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(63, 55, 'hair-care', 'Hair Care', 'Hair Care', 'Hair Care', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(64, 55, 'health-supplements', 'Health Supplements', 'Health Supplements', 'Health Supplements', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(65, NULL, 'household-essentials', 'Household Essentials', '<p>Household Essentials</p>', '<p>Household Essentials</p>', NULL, 84, 1, '2024-07-13 01:09:02', '2024-07-18 05:06:42'),
(66, 65, 'cleaning-supplies', 'Cleaning Supplies', 'Cleaning Supplies', 'Cleaning Supplies', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(67, 65, 'paper-products', 'Paper Products', 'Paper Products', 'Paper Products', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(68, 67, 'toilet-paper', 'Toilet Paper', 'Toilet Paper', 'Toilet Paper', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(69, 67, 'paper-towels', 'Paper Towels', 'Paper Towels', 'Paper Towels', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(70, 65, 'laundry-supplies', 'Laundry Supplies', 'Laundry Supplies', 'Laundry Supplies', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(71, 65, 'dishwashing-supplies', 'Dishwashing Supplies', 'Dishwashing Supplies', 'Dishwashing Supplies', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(72, NULL, 'baby-childcare', 'Baby & Childcare', '<p>Baby &amp; Childcare</p>', '<p>Baby &amp; Childcare</p>', NULL, 85, 1, '2024-07-13 01:09:02', '2024-07-18 05:06:40'),
(73, 72, 'baby-food', 'Baby Food', 'Baby Food', 'Baby Food', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(74, 72, 'diapers-wipes', 'Diapers & Wipes', 'Diapers & Wipes', 'Diapers & Wipes', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(75, 72, 'baby-care-products', 'Baby Care Products', 'Baby Care Products', 'Baby Care Products', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(76, NULL, 'pet-supplies', 'Pet Supplies', '<p>Pet Supplies</p>', '<p>Pet Supplies</p>', NULL, 86, 1, '2024-07-13 01:09:02', '2024-07-18 05:06:39'),
(77, 76, 'pet-food', 'Pet Food', 'Pet Food', 'Pet Food', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(78, 76, 'pet-treats', 'Pet Treats', 'Pet Treats', 'Pet Treats', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(79, 76, 'pet-care-products', 'Pet Care Products', 'Pet Care Products', 'Pet Care Products', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(80, NULL, 'international-foods', 'International Foods', '<p>International Foods</p>', '<p>International Foods</p>', NULL, 87, 1, '2024-07-13 01:09:02', '2024-07-18 05:06:37'),
(81, 80, 'asian-cuisine', 'Asian Cuisine', 'Asian Cuisine', 'Asian Cuisine', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(82, 80, 'latin-american-cuisine', 'Latin American Cuisine', 'Latin American Cuisine', 'Latin American Cuisine', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(83, 80, 'european-cuisine', 'European Cuisine', 'European Cuisine', 'European Cuisine', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(84, 80, 'middle-eastern-cuisine', 'Middle Eastern Cuisine', 'Middle Eastern Cuisine', 'Middle Eastern Cuisine', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(85, NULL, 'organic-specialty', 'Organic & Specialty', '<p>Organic &amp; Specialty</p>', '<p>Organic &amp; Specialty</p>', NULL, 88, 1, '2024-07-13 01:09:02', '2024-07-18 05:06:35'),
(86, 85, 'organic-produce', 'Organic Produce', 'Organic Produce', 'Organic Produce', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(87, 85, 'gluten-free-products', 'Gluten-Free Products', 'Gluten-Free Products', 'Gluten-Free Products', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(88, 85, 'vegan-vegetarian-products', 'Vegan & Vegetarian Products', 'Vegan & Vegetarian Products', 'Vegan & Vegetarian Products', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(89, NULL, 'miscellaneous', 'Miscellaneous', '<p>Miscellaneous</p>', '<p>Miscellaneous</p>', NULL, 89, 1, '2024-07-13 01:09:02', '2024-07-18 05:06:33'),
(90, 89, 'flowers-plants', 'Flowers & Plants', 'Flowers & Plants', 'Flowers & Plants', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(91, 89, 'seasonal-items', 'Seasonal Items', 'Seasonal Items', 'Seasonal Items', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(92, 89, 'greeting-cards-gift-wrap', 'Greeting Cards & Gift Wrap', 'Greeting Cards & Gift Wrap', 'Greeting Cards & Gift Wrap', NULL, NULL, 1, '2024-07-13 01:09:02', '2024-07-13 01:09:02'),
(93, 55, 'perfumes', 'Perfumes', '<p>Perfumes</p>', '<p>Perfumes</p>', NULL, 93, 1, '2024-07-18 05:37:20', '2024-07-18 05:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_name`, `file_path`, `size`, `extension`, `created_at`, `updated_at`) VALUES
(19, 'name', 'https://kidb.in.s3.amazonaws.com/public/name.png', '188615', 'png', '2024-06-29 23:47:44', '2024-06-29 23:47:44'),
(20, 'name', 'https://kidb.in.s3.amazonaws.com/public/name.png', '171097', 'png', '2024-06-30 00:00:28', '2024-06-30 00:00:28'),
(21, 'name', 'https://kidb.in.s3.amazonaws.com/public/name.png', '171097', 'png', '2024-06-30 00:00:32', '2024-06-30 00:00:32'),
(22, 'name', 'https://kidb.in.s3.amazonaws.com/public/name.png', '193618', 'png', '2024-06-30 00:02:17', '2024-06-30 00:02:17'),
(23, 'name', 'https://kidb.in.s3.amazonaws.com/public/name.png', '56592', 'png', '2024-06-30 00:05:00', '2024-06-30 00:05:00'),
(24, 'Screenshot 2023-05-17 101044.png', 'https://kidb.in.s3.amazonaws.com/public/ShAQxROqoh7xfoYHiDfW1kq77tkMhyC1v4OqZdFH.png', '27007', 'png', '2024-06-30 00:18:45', '2024-06-30 00:18:45'),
(25, 'Screenshot 2023-05-17 094243.png', 'https://kidb.in.s3.amazonaws.com/common/rwPN82tY9RW5MTp6tp23OqouoI4REX39d8YHsyeI.png', '57187', 'png', '2024-06-30 00:33:35', '2024-06-30 00:33:35'),
(26, 'Screenshot 2023-05-16 120636.png', 'https://kidb.in.s3.amazonaws.com/common/rU7A8EjufWdVVWjFkSNxbqgJrsoE71f6OHGPIwRu.png', '42606', 'png', '2024-06-30 00:34:07', '2024-06-30 00:34:07'),
(27, 'Screenshot 2023-06-12 153658.png', 'https://kidb.in.s3.amazonaws.com/common/OCtoq3LPMLCbGKSFOd0NzxULhSsiWBgR9Rh6Oz0g.png', '250695', 'png', '2024-06-30 00:34:45', '2024-06-30 00:34:45'),
(28, 'Screenshot 2023-07-04 160939.png', 'https://kidb.in.s3.amazonaws.com/category/NQyYC7QxcS7kdYxHWofO619COMIL4OFT6expTwIw.png', '20857', 'png', '2024-06-30 00:36:33', '2024-06-30 00:36:33'),
(29, 'Screenshot 2023-05-16 120636.png', 'https://kidb.in.s3.amazonaws.com/category/y1bc5SdrDngpe9KXr2pjI0FLw2mqmuoiGLvYG9NR.png', '42606', 'png', '2024-06-30 00:38:32', '2024-06-30 00:38:32'),
(30, 'Screenshot 2023-06-05 111428.png', 'https://kidb.in.s3.amazonaws.com/category/i9C7UrltSRdvkO1WMzoyduBIJ0J4CzfD0XZ4juSQ.png', '11082', 'png', '2024-06-30 00:38:36', '2024-06-30 00:38:36'),
(31, 'Screenshot 2023-05-16 120636.png', 'https://kidb.in.s3.amazonaws.com/category/8knL4T92ZJWSlgBM5Z2BQuOwPkhmB1GG1UdzbC0L.png', '42606', 'png', '2024-06-30 00:38:58', '2024-06-30 00:38:58'),
(32, 'Screenshot 2023-05-16 120636.png', 'https://kidb.in.s3.amazonaws.com/category/HRhuJ6SeSXfyMKufYjivuYJsx4l8Mj29y6PSPxxb.png', '42606', 'png', '2024-06-30 00:39:55', '2024-06-30 00:39:55'),
(33, 'Screenshot 2023-06-05 112514.png', 'https://kidb.in.s3.amazonaws.com/category/7LrTNYQbnhb1goU7idmkdegxs4mhdG6oVsOAbWEo.png', '9381', 'png', '2024-06-30 00:41:59', '2024-06-30 00:41:59'),
(34, 'Screenshot 2023-05-17 094243.png', 'https://kidb.in.s3.amazonaws.com/category/OCwWWs9jXS6D1cgwyynVt3QaaaUeIgSSToXJuL0c.png', '57187', 'png', '2024-06-30 00:45:15', '2024-06-30 00:45:15'),
(35, 'Screenshot 2023-06-08 153933.png', 'https://kidb.in.s3.amazonaws.com/category/4j1OTA295hMICUub2DAOaVA5OpjeHCgomQoQX5P5.png', '33922', 'png', '2024-06-30 00:46:08', '2024-06-30 00:46:08'),
(36, 'Screenshot 2023-06-05 112514.png', 'https://kidb.in.s3.amazonaws.com/category/m1Z4BlJ59WHGVP45PYnVFzwAC1cIy3rgoaQjr0rp.png', '9381', 'png', '2024-06-30 00:46:48', '2024-06-30 00:46:48'),
(37, 'Screenshot 2023-06-08 153933.png', 'https://kidb.in.s3.amazonaws.com/category/mNbJy6dM2QypCD2ZAcelGxAtj5y3RNoJsFuuXDp5.png', '33922', 'png', '2024-06-30 00:47:50', '2024-06-30 00:47:50'),
(38, 'Screenshot 2023-06-16 130458.png', 'https://kidb.in.s3.amazonaws.com/category/LTynIkbCYSEEjXPi61iid7NhyDxpbdsIkKQCRGu9.png', '557833', 'png', '2024-06-30 00:47:57', '2024-06-30 00:47:57'),
(39, 'Screenshot 2023-06-08 153846.png', 'https://kidb.in.s3.amazonaws.com/category/fiLGWTBLiL4MkOgf3H2lEn6K102mY2vFOUK2bqZz.png', '73434', 'png', '2024-06-30 00:50:22', '2024-06-30 00:50:22'),
(40, 'Screenshot 2023-04-28 111419.png', 'https://kidb.in.s3.amazonaws.com/category/nZbtjiQ1T2njYVr5XeIRYjYeSaKlmv5fqahGlusb.png', '771494', 'png', '2024-06-30 00:52:10', '2024-06-30 00:52:10'),
(41, 'Screenshot 2023-06-05 112514.png', 'https://kidb.in.s3.amazonaws.com/category/6Rhf28BLgrbq5eEPwXBYPjON7O8SyQYPLfx4Tv2w.png', '9381', 'png', '2024-06-30 00:57:11', '2024-06-30 00:57:11'),
(42, 'Screenshot 2023-05-16 120636.png', 'https://kidb.in.s3.amazonaws.com/category/oPk1wdZNXSmPtwiF6JplLT8j07gs9sepvj1qTu5Y.png', '42606', 'png', '2024-06-30 00:57:33', '2024-06-30 00:57:33'),
(43, 'Screenshot 2023-05-16 120636.png', 'https://kidb.in.s3.amazonaws.com/category/2fs3kUlTMg45F6a9p5U4IGp0SwzcEjkP9rmauPPF.png', '42606', 'png', '2024-06-30 00:58:09', '2024-06-30 00:58:09'),
(44, 'Screenshot 2023-06-08 153846.png', 'https://kidb.in.s3.amazonaws.com/category/TCA6WJm44514JYHLlhXL446x4VBTfqXFPS4T2uQ5.png', '73434', 'png', '2024-06-30 00:58:26', '2024-06-30 00:58:26'),
(45, 'Screenshot 2023-05-16 120636.png', 'https://kidb.in.s3.amazonaws.com/category/fknTnHyjjJpjUkdNC5V7WSmSwu90cM1YV2geiRSw.png', '42606', 'png', '2024-06-30 01:00:36', '2024-06-30 01:00:36'),
(46, 'Screenshot 2023-07-01 162251.png', 'https://kidb.in.s3.amazonaws.com/category/3WHpy8gd9isV8tsWEPwEzv1DWmJc9hKzJi2XL3SG.png', '193618', 'png', '2024-06-30 01:01:04', '2024-06-30 01:01:04'),
(47, 'Screenshot 2023-06-08 153846.png', 'https://kidb.in.s3.amazonaws.com/category/9jc4Vqq30SBNe1zwdGIBZ9apWxECA1HdDkyugBIC.png', '73434', 'png', '2024-06-30 01:01:25', '2024-06-30 01:01:25'),
(48, 'Screenshot 2023-06-08 153933.png', 'https://kidb.in.s3.amazonaws.com/category/Ifc2jHe5s67P3dSbNXaBfzEaV7dyBtQCRpAxBPTR.png', '33922', 'png', '2024-06-30 01:02:55', '2024-06-30 01:02:55'),
(49, 'Screenshot 2023-06-08 153933.png', 'https://kidb.in.s3.amazonaws.com/category/MybB9VLdTHfo33xOwZyCbm5WhR9MycAGZJO274FF.png', '33922', 'png', '2024-06-30 01:08:31', '2024-06-30 01:08:31'),
(50, 'Screenshot 2023-07-12 215844.png', 'https://kidb.in.s3.amazonaws.com/category/egJzB2QO2dvyYPT0NYXZwQeFemCG1QkFGdxtIzMK.png', '39782', 'png', '2024-06-30 01:09:34', '2024-06-30 01:09:34'),
(51, 'Screenshot 2023-07-02 182428.png', 'https://kidb.in.s3.amazonaws.com/category/1EuHA24ReZbNkUmDDwYcfNnQNTif27CrEw9K5vlr.png', '839735', 'png', '2024-06-30 01:10:02', '2024-06-30 01:10:02'),
(52, 'Screenshot 2023-05-16 120636.png', 'https://kidb.in.s3.amazonaws.com/category/mczP3CjSetl0zIreIbbrfNBP1kVymPKFn8xirs84.png', '42606', 'png', '2024-06-30 01:10:20', '2024-06-30 01:10:20'),
(53, 'Screenshot 2023-06-05 112514.png', 'https://kidb.in.s3.amazonaws.com/category/y04FLmyhsc25d9M8YgNfgmFmPjigLYxPDPfRkxRc.png', '9381', 'png', '2024-06-30 01:21:17', '2024-06-30 01:21:17'),
(54, 'Screenshot 2023-06-05 112514.png', 'https://kidb.in.s3.amazonaws.com/category/mkaDD7bQNQX5OvCHP8MQKgSriyyovZ6YafAhjJNp.png', '9381', 'png', '2024-06-30 01:24:29', '2024-06-30 01:24:29'),
(55, 'Screenshot 2023-06-08 153846.png', 'https://kidb.in.s3.amazonaws.com/category/cfn96B0YLGF2Zo9BYlyJwb8IyXeRWZT8viI2DiRA.png', '73434', 'png', '2024-06-30 01:27:02', '2024-06-30 01:27:02'),
(56, 'Screenshot 2023-06-05 112514.png', 'https://kidb.in.s3.amazonaws.com/category/cWaU3oHf5VkOR7t9CJPftvDa2J0Qq46NWCyGoRXW.png', '9381', 'png', '2024-06-30 01:27:38', '2024-06-30 01:27:38'),
(57, 'deadpool-wolverine-3840x1080-17093.jpg', 'https://kidb.in.s3.amazonaws.com/category/q8yctNZTDXn0TqZcT7FAmTyGgUlKcP0l7BLUfYP2.jpg', '1374380', 'jpg', '2024-07-05 21:29:53', '2024-07-05 21:29:53'),
(58, 'WhatsApp Image 2024-06-11 at 20.17.57.jpeg', 'https://kidb.in.s3.amazonaws.com/category/s6VRAQabdIMLjz54QvExcAdXaxteM0qIqGzRgasZ.jpg', '321336', 'jpeg', '2024-07-05 21:32:17', '2024-07-05 21:32:17'),
(59, 'to TVM.jpg', 'https://kidb.in.s3.amazonaws.com/category/2LoPoUFcJKlotNCJVMvOJsXV87UTm1TeptqHepPg.jpg', '220120', 'jpg', '2024-07-12 22:59:10', '2024-07-12 22:59:10'),
(60, 'to TVM.jpg', 'https://kidb.in.s3.amazonaws.com/category/yvFlkTWBllJudml0w93J1QH5fimMVJmMexUrNMh2.jpg', '220120', 'jpg', '2024-07-12 23:14:12', '2024-07-12 23:14:12'),
(61, 'oimrqs_create_a_low-light_photograph_of_a_shopping_basket_fille_92c17b1b-e9a6-48aa-9191-709b224d8543.webp', 'https://kidb.in.s3.amazonaws.com/category/K4C0EpaEVOZEm0Zj8liFVXDKB4pZybznA7HFDR2g.webp', '23106', 'webp', '2024-07-13 00:21:36', '2024-07-13 00:21:36'),
(62, 'oimrqs_create_a_low-light_photograph_of_a_shopping_basket_fille_92c17b1b-e9a6-48aa-9191-709b224d8543.webp', 'https://kidb.in.s3.amazonaws.com/category/3EuI4NpEnZuedF3p25hLM5T0qGJoHegNernsKLu5.webp', '23106', 'webp', '2024-07-13 00:22:50', '2024-07-13 00:22:50'),
(63, 'WhatsApp Image 2022-10-02 at 14.04.59.jpg', 'https://kidb.in.s3.amazonaws.com/category/HHU40IDSlphffEBEOjDg19utRtOV3cKU5HldEdjV.jpg', '53065', 'jpg', '2024-07-18 04:12:58', '2024-07-18 04:12:58'),
(64, 'killer__ghost_Fresh_Produce_image_squre_image_shot_by_canon_2c5a124c-1c0f-4e78-95b3-09d944abe44f.png', 'https://kidb.in.s3.amazonaws.com/category/WECOX6BuwVDYQN38ezsjo2jHMk8NzhX1vHdi9MwA.png', '1598622', 'png', '2024-07-18 04:23:59', '2024-07-18 04:23:59'),
(65, 'killer__ghost_Fresh_Produce_image_squre_image_shot_by_canon_2c5a124c-1c0f-4e78-95b3-09d944abe44f.png', 'https://kidb.in.s3.amazonaws.com/category/G1qphzVyhKgvNeoTGglKxadtMuHvI1VBegXXf3v6.png', '1598622', 'png', '2024-07-18 04:26:57', '2024-07-18 04:26:57'),
(66, 'killer__ghost_Fresh_Produce_image_squre_image_shot_by_canon_2c5a124c-1c0f-4e78-95b3-09d944abe44f.png', 'https://kidb.in.s3.amazonaws.com/category/CeUCQbboGUGRVxst6WSQwNgVBS8z8Y8HbVicPK7l.png', '1598622', 'png', '2024-07-18 04:30:25', '2024-07-18 04:30:25'),
(67, 'killer__ghost_Fresh_Produce_image_squre_image_shot_by_canon_2c5a124c-1c0f-4e78-95b3-09d944abe44f.png', 'https://kidb.in.s3.amazonaws.com/category/0EccV0MkiHv3wJ11aN1Q3tuRZA2NajMKqWAhpOk6.png', '1598622', 'png', '2024-07-18 04:34:36', '2024-07-18 04:34:36'),
(68, 'killer__ghost_Fresh_Produce_image_squre_image_shot_by_canon_2c5a124c-1c0f-4e78-95b3-09d944abe44f.png', 'https://kidb.in.s3.amazonaws.com/category/GtfXgVs38h5OaSJz6Jsz6DHzpCDNyeziCaCtfMYX.png', '1598622', 'png', '2024-07-18 04:36:01', '2024-07-18 04:36:01'),
(69, 'killer__ghost_Fresh_Produce_image_squre_image_shot_by_canon_2c5a124c-1c0f-4e78-95b3-09d944abe44f.png', 'https://kidb.in.s3.amazonaws.com/category/38BlhxjBrEADfSQyDhTaBVfFlO1LJucz7MCPOXQA.png', '1598622', 'png', '2024-07-18 04:36:05', '2024-07-18 04:36:05'),
(70, 'killer__ghost_Fresh_Produce_image_squre_image_shot_by_canon_2c5a124c-1c0f-4e78-95b3-09d944abe44f.png', 'https://kidb.in.s3.amazonaws.com/category/OS3L2mHg3x8TwzXcsrDCifawncsQIYzHgz94Mn40.png', '1598622', 'png', '2024-07-18 04:38:49', '2024-07-18 04:38:49'),
(71, 'killer__ghost_Fresh_Produce_image_squre_image_shot_by_canon_2c5a124c-1c0f-4e78-95b3-09d944abe44f.png', 'https://kidb.in.s3.amazonaws.com/category/S9q69v59wwDzVFyklzFSi4vNo0zgF1862YJ9HY2V.png', '1598622', 'png', '2024-07-18 04:41:25', '2024-07-18 04:41:25'),
(72, 'killer__ghost_Fresh_Produce_image_squre_image_shot_by_canon_2c5a124c-1c0f-4e78-95b3-09d944abe44f.png', 'https://kidb.in.s3.amazonaws.com/category/lUE5RDwwhhRqqS0qmHF0MnwUOjOEn0IdDwqOJ2Km.png', '1598622', 'png', '2024-07-18 04:42:44', '2024-07-18 04:42:44'),
(73, 'killer__ghost_Fresh_Produce_image_squre_image_shot_by_canon_2c5a124c-1c0f-4e78-95b3-09d944abe44f.png', 'https://kidb.in.s3.amazonaws.com/category/rsg6RKyi3DMUSHNmgBJSWr04l9snutCEQmQTl2Uh.png', '1598622', 'png', '2024-07-18 04:42:45', '2024-07-18 04:42:45'),
(74, 'killer__ghost_Fresh_Produce_image_squre_image_shot_by_canon_2c5a124c-1c0f-4e78-95b3-09d944abe44f.png', 'https://kidb.in.s3.amazonaws.com/category/VPNrU1cpm5OtadUKZjjofbAqgekDtyjuwGSLC7hK.png', '1598622', 'png', '2024-07-18 04:47:22', '2024-07-18 04:47:22'),
(75, 'killer__ghost_Fresh_Produce_image_squre_image_shot_by_canon_2c5a124c-1c0f-4e78-95b3-09d944abe44f.png', 'https://kidb.in.s3.amazonaws.com/category/NpX8A35Eo8Q8gVe57Evnm5DEHZ8m4d2IZanGo2Q5.png', '1598622', 'png', '2024-07-18 04:53:12', '2024-07-18 04:53:12'),
(76, 'killer__ghost_dairy_product_image_bd0d06a8-b99b-4170-bffc-adb45a0434b2.webp', 'https://kidb.in.s3.amazonaws.com/category/Q8hTMvYauXBwAMNrdIWrBqlbSBKBk75CJoCarY5E.webp', '23746', 'webp', '2024-07-18 05:05:24', '2024-07-18 05:05:24'),
(77, 'killer__ghost_meat__seafood_f447bdcd-f02e-4a32-896f-219a8b982585.webp', 'https://kidb.in.s3.amazonaws.com/category/s5hgP6Z6weLghisOyz45NImf23MXfngSEAgp2LgJ.webp', '134462', 'webp', '2024-07-18 05:05:33', '2024-07-18 05:05:33'),
(78, 'killer__ghost_cakes__pastries_919029dc-31c6-45e5-a53c-76051822db99.webp', 'https://kidb.in.s3.amazonaws.com/category/LCzp6hMyTLb1GKPAKRsTfP7m9XRGvgq7Y1o0CGHa.webp', '68964', 'webp', '2024-07-18 05:05:39', '2024-07-18 05:05:39'),
(79, 'killer__ghost_rice__grains_82af2c4a-8f3b-49f3-bbf8-686e5e4cb98b.webp', 'https://kidb.in.s3.amazonaws.com/category/fqS1Uz0iLzo1r9a0g9EWdo5Ch5CB3kukANmt62JZ.webp', '157920', 'webp', '2024-07-18 05:05:42', '2024-07-18 05:05:42'),
(80, 'killer__ghost_soft_drinks_fa43e0f5-a153-4bd2-b887-6ca2a9f4d00e.webp', 'https://kidb.in.s3.amazonaws.com/category/27OswW1SuZdB7tEZuMBcDeJSbNhGUtlUs0jDfJBT.webp', '77212', 'webp', '2024-07-18 05:05:45', '2024-07-18 05:05:45'),
(81, 'killer__ghost_frozen_vegetables_8b083194-407a-4de8-8db6-b2679035912f.webp', 'https://kidb.in.s3.amazonaws.com/category/KEsVuZRmHpztfdt4HDe2OQdVsVtV9AXY1pfRPTpA.webp', '77232', 'webp', '2024-07-18 05:05:49', '2024-07-18 05:05:49'),
(82, 'killer__ghost_chips__pretzels_f2fd6f18-9ead-4646-81f3-41384f010468.webp', 'https://kidb.in.s3.amazonaws.com/category/yQ5CFMcR8JqUAF56q4bhUKAFX58tN8QqF2DKHsy1.webp', '84358', 'webp', '2024-07-18 05:05:55', '2024-07-18 05:05:55'),
(83, 'killer__ghost_health__beauty_product_banner_39c8575a-fd19-4a65-9ea0-8ab4ac9b4863.webp', 'https://kidb.in.s3.amazonaws.com/category/cfD3cqniIVx6uo0I7yzEmTM0xFD3W08UjKpzqp1J.webp', '34028', 'webp', '2024-07-18 05:06:02', '2024-07-18 05:06:02'),
(84, 'killer__ghost_household_essentials_910bf678-49d6-4213-a202-4a6f8dce74ba.webp', 'https://kidb.in.s3.amazonaws.com/category/q3QIGBeEkvlP17x4hObwwSIcWlTGdTYNMH2Es7Uo.webp', '52302', 'webp', '2024-07-18 05:06:08', '2024-07-18 05:06:08'),
(85, 'killer__ghost_baby__childcare_73368351-4f5a-40fc-afdf-1af24fff8f00.webp', 'https://kidb.in.s3.amazonaws.com/category/dFKlckYfKJ4qszRSssBUEjHqFZMDwIpBH7iO8qqU.webp', '96564', 'webp', '2024-07-18 05:06:12', '2024-07-18 05:06:12'),
(86, 'killer__ghost_pet_supplies_e26ef57b-7318-48c9-b0f8-8da87a81225d.webp', 'https://kidb.in.s3.amazonaws.com/category/k83W450tqJAHELP43QSqaSm4Jg1gztgEm9Fn6cyP.webp', '71772', 'webp', '2024-07-18 05:06:19', '2024-07-18 05:06:19'),
(87, 'killer__ghost_international_foods_6408e0d6-1854-48ad-b3ca-7620fe0e2596.webp', 'https://kidb.in.s3.amazonaws.com/category/zNOr09z1Qfhyo8nhWVBhAKsOkSaPsh2zusGTQzZ4.webp', '160058', 'webp', '2024-07-18 05:06:24', '2024-07-18 05:06:24'),
(88, 'killer__ghost_organic__specialty_b6d22e46-e856-428b-ae18-fc87f4bb93a2.webp', 'https://kidb.in.s3.amazonaws.com/category/EXDqlcGZHzJ80RpJISuzIlwHdbq1zUFEcmvjQeBI.webp', '137208', 'webp', '2024-07-18 05:06:28', '2024-07-18 05:06:28'),
(89, 'killer__ghost_flowers__plants_356049d5-acb0-4e45-8f68-9060f5d4cbc3.webp', 'https://kidb.in.s3.amazonaws.com/category/vx44tCnu7maiFTfXX8lsX52d0Eht8jfE8wHHSqIc.webp', '63348', 'webp', '2024-07-18 05:06:32', '2024-07-18 05:06:32'),
(90, 'killer__ghost_capsicum_-_green_loose_1_kg_85dd0b17-f3a0-42b1-a788-966f21c78ab5.webp', 'https://kidb.in.s3.amazonaws.com/category/9q5Iy5dNNri1PJ4CDuv6ZqIuTnhZDDWBVBvi7MPP.webp', '68758', 'webp', '2024-07-18 05:30:31', '2024-07-18 05:30:31'),
(91, 'killer__ghost_capsicum_-_green_loose_1_kg_85dd0b17-f3a0-42b1-a788-966f21c78ab5.webp', 'https://kidb.in.s3.amazonaws.com/category/cZlqcLnUzMxEoLSnyMNg4eYM974AJ5Kt7jhRSCfg.webp', '68758', 'webp', '2024-07-18 05:32:25', '2024-07-18 05:32:25'),
(92, 'killer__ghost_capsicum_-_green_loose_1_kg_85dd0b17-f3a0-42b1-a788-966f21c78ab5.webp', 'https://kidb.in.s3.amazonaws.com/category/3SHNBsmNtZWwVUktpgr0iEtzTSU7dH4iQ1gc5nNC.webp', '68758', 'webp', '2024-07-18 05:32:44', '2024-07-18 05:32:44'),
(93, 'killer__ghost_health__beauty_product_banner_39c8575a-fd19-4a65-9ea0-8ab4ac9b4863.webp', 'https://kidb.in.s3.amazonaws.com/category/tp9r6iir1CIHw2io6d0QNzfhPLgMr2pclbhRTRAs.webp', '34028', 'webp', '2024-07-18 05:37:18', '2024-07-18 05:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

DROP TABLE IF EXISTS `leads`;
CREATE TABLE IF NOT EXISTS `leads` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` int NOT NULL DEFAULT '971',
  `phone_number` int NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `is_open` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_03_153512_create_carts_table', 1),
(6, '2024_04_03_153519_create_orders_table', 1),
(7, '2024_04_03_153524_create_order_items_table', 1),
(8, '2024_04_03_153536_create_products_table', 1),
(9, '2024_04_03_153542_create_product_variants_table', 1),
(10, '2024_04_03_153555_create_categories_table', 1),
(11, '2024_04_03_153606_create_galleries_table', 1),
(12, '2024_04_03_153622_create_leads_table', 1),
(13, '2024_04_03_153641_create_addresses_table', 1),
(14, '2024_04_03_153704_create_files_table', 1),
(15, '2024_04_03_153713_create_promos_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `address_id` bigint UNSIGNED NOT NULL,
  `promo_id` bigint UNSIGNED NOT NULL,
  `total` double(8,2) NOT NULL,
  `status` enum('active','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `App\Models\ProductVariants` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_id` int DEFAULT NULL,
  `banner_image_id` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `parent_id`, `slug`, `title`, `short_description`, `description`, `image_id`, `banner_image_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'capsicum-green-loose-1-kg', 'Capsicum - Green (Loose), 1 kg', '<p>Green capsicum, known as bell pepper, is a versatile vegetable widely used in Indian cuisine.&nbsp;</p>', '<p>Green capsicum, <strong>known </strong>as bell pepper, is a versatile vegetable widely used in Indian cuisine. Its crisp texture and mild, slightly bitter flavour make it a favourite in curries, stir-fries, and salads across the country. In dishes like Paneer Tikka or Mixed Vegetable Sabzi, diced capsicum adds colour and enhances the overall taste. It is also a key ingredient in Indo-Chinese dishes like chilli paneer or vegetable Manchurian, where its crunchiness complements spicy sauces. Grown in various regions of India, green capsicum\'s popularity highlights its integration into both traditional and modern Indian cooking, prized for its culinary adaptability.</p>', NULL, 92, 1, '2024-07-18 05:32:47', '2024-07-18 05:32:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

DROP TABLE IF EXISTS `product_variants`;
CREATE TABLE IF NOT EXISTS `product_variants` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_id` int DEFAULT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `selling_price` double(8,2) DEFAULT NULL,
  `promo_type` enum('percentage','flat') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percentage',
  `promo_value` double(8,2) DEFAULT NULL,
  `banner_image_id` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_variants_slug_unique` (`slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

DROP TABLE IF EXISTS `promos`;
CREATE TABLE IF NOT EXISTS `promos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usage` int NOT NULL DEFAULT '0',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `promos_code_unique` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$10$baHbiNrL1fb2.zbo/qCFueVWk2jvGmmt80/WX2.AFp1udUNf8zFuq',
  `type` enum('admin','customer','promoters','vendor') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `otp` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `status`, `otp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Akhil Mangalan', 'b2akhilmj@gmail.com', NULL, '$2y$10$aLPkB3SA4Jkh/HNn2FES/eOubjYl7hvuBj6JuwqUMkTYiIbGpQs6a', 'admin', '1', 'eyJpdiI6InRyRWpXK3hQbEVMbm0rNnlyNldpZ2c9PSIsInZhbHVlIjoiM3gwa1grMlFFK2lvRUVDKzhjZXBkUT09IiwibWFjIjoiYzMxMjAyZGE1NDAzZmE2ZjUzMWQwMjQ2MDExNGQ5YjVhYzc3ZTIxMDE1MGU4NWY0ZGQzZDg0M2I1M2QyMmQ1ZSIsInRhZyI6IiJ9', NULL, '2024-04-03 12:37:26', '2024-07-18 09:41:48'),
(2, 'Vendor Akhil', 'tsupercode@gmail.com', NULL, '$2y$10$TZB/q/9vGeVLhJaRsgOxkOJwZwSx/5YiZuN7Nzp0.QEb657kBQgz.', 'vendor', '1', 'eyJpdiI6InE2dnNjRElHeElKN2tSZU9wR3NRTkE9PSIsInZhbHVlIjoiVDBGOFFOTzk3cktiK29RcU1tb25Qdz09IiwibWFjIjoiMTZlZjg2ZjdiYTFhNmZlMGUyZWJiM2M1Y2E2MTIzMTY4ZWI0NTIzY2JhYzE2NDk0NWRjMzJmNTEzMzM3ZTVhMyIsInRhZyI6IiJ9', NULL, '2024-07-18 08:01:37', '2024-07-18 09:44:16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
