-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 03:51 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Habib Bank', 'Lahore Pakistan', '2020-12-31 13:46:15', '2020-12-31 13:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_number` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `account_number`, `bank_id`, `bank_name`, `created_at`, `updated_at`) VALUES
(1, 3245698, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(2, NULL, 1, 'Category 2', 'category-2', '2020-04-26 10:57:24', '2020-04-26 10:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `commission_agents`
--

CREATE TABLE `commission_agents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commission_agents`
--

INSERT INTO `commission_agents` (`id`, `name`, `contact`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Erin Woodard', '03245899632', 'Lahore Pakistan', 'xalyhy@mailinator.com', '2020-12-04 10:22:53', '2020-12-04 10:22:53'),
(2, 'Sasha Powers', '9232112345677', 'dasdfasdfadf', 'kiniw@mailinator.com', '2020-12-04 10:23:15', '2020-12-04 10:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `contact`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Wr Steels', 'info@wrsteel.com', '9232112345677', 'Lahore , Pakistan', '2008-04-20 00:00:00', '2020-11-20 20:40:28'),
(2, 'Wisam Enterprises', 'wisam@wisam.com', '032123456789', 'Lahore,Pakistan', '1983-07-07 00:00:00', '1983-07-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `consumable_inventory_transactions`
--

CREATE TABLE `consumable_inventory_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_ref_no` int(11) DEFAULT NULL,
  `out_ref_no` int(11) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `vendor_invoice_no` double DEFAULT NULL,
  `vendor_invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `factory_id` int(11) DEFAULT NULL,
  `factory_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consumable_inventory_transactions`
--

INSERT INTO `consumable_inventory_transactions` (`id`, `purchase_ref_no`, `out_ref_no`, `transaction_date`, `vendor_invoice_no`, `vendor_invoice`, `transaction_type`, `factory_id`, `factory_name`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '2020-03-16', 121, NULL, 'in', 1, 'Biotech', NULL, '2020-03-16 14:43:23', '2020-03-16 14:43:23'),
(2, 2, NULL, '2020-03-16', 121, '2020-03-18-17-54-26-WhatsApp Image 2020-03-18 at 11.54.11 AM.jpeg', 'in', 1, 'Biotech', 'remarks', '2020-03-16 14:44:10', '2020-03-18 12:54:26'),
(3, 3, NULL, '2020-03-17', 1200, '2020-03-17-11-30-20-download.jpeg', 'in', 2, 'Lamitech', 'ssd', '2020-03-17 06:30:20', '2020-03-18 12:50:50'),
(4, 4, NULL, '2020-03-19', NULL, '2020-03-19-12-30-05-WhatsApp Image 2020-03-18 at 6.59.34 PM.jpeg', 'in', 1, 'Biotech', 'ok', '2020-03-19 07:30:05', '2020-03-19 07:30:05'),
(5, NULL, 1, '2006-08-13', NULL, '2020-03-20-17-40-49-Screen Shot 2020-03-20 at 3.59.00 PM.jpg', 'out', 1, 'Biotech', 'sad', '2020-03-20 12:40:49', '2020-03-20 12:40:49'),
(6, NULL, 2, '2010-05-29', NULL, '2020-03-20-17-41-54-Screen Shot 2020-03-20 at 3.59.00 PM.jpg', 'out', 1, 'Biotech', 'sad', '2020-03-20 12:41:54', '2020-03-20 12:41:54'),
(7, 5, NULL, '2003-02-27', 94, '2020-05-18-19-49-17-leave-application-for-urgent-piece-of-work-724x1024.jpg', 'in', 1, 'Biotech', 'asqs', '2020-05-18 14:49:17', '2020-05-18 14:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `consume_inventory_transaction_ope`
--

CREATE TABLE `consume_inventory_transaction_ope` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double DEFAULT NULL,
  `factory_id` int(11) DEFAULT NULL,
  `factory_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consume_inventory_transaction_ope`
--

INSERT INTO `consume_inventory_transaction_ope` (`id`, `transaction_id`, `item_id`, `item_name`, `quantity`, `factory_id`, `factory_name`, `transaction_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1034, 'CYAN (BLUE)', 1000, 1, 'Biotech', 'in', '2020-03-16 14:44:10', '2020-03-16 14:44:10'),
(2, 2, 1035, 'WHITE', 2000, 1, 'Biotech', 'in', '2020-03-16 14:44:10', '2020-03-16 14:44:10'),
(3, 3, 1034, 'CYAN (BLUE)', 20, 2, 'Lamitech', 'in', '2020-03-17 06:30:20', '2020-03-18 12:53:32'),
(4, 3, 1035, 'WHITE', 30, 2, 'Lamitech', 'in', '2020-03-17 06:30:20', '2020-03-18 12:53:32'),
(5, 3, 1036, 'YELLOW', 40, 2, 'Lamitech', 'in', '2020-03-17 06:30:20', '2020-03-18 12:53:32'),
(6, 3, 1037, 'BLACK', 50, 2, 'Lamitech', 'in', '2020-03-17 06:30:20', '2020-03-18 12:53:32'),
(7, 3, 1038, 'RED (magenta)', 60, 2, 'Lamitech', 'in', '2020-03-18 12:51:19', '2020-03-18 12:53:32'),
(10, 3, 1039, 'DRIP OFF VARNISH', 70, 2, 'Lamitech', 'in', '2020-03-18 12:53:32', '2020-03-18 12:53:32'),
(11, 2, 1037, 'BLACK', 20, 1, 'Biotech', 'in', '2020-03-18 12:54:43', '2020-03-18 12:54:43'),
(12, 4, 1034, 'CYAN (BLUE)', 1.5, 1, 'Biotech', 'in', '2020-03-19 07:30:05', '2020-03-19 07:30:05'),
(13, 4, 1035, 'WHITE', 2.5, 1, 'Biotech', 'in', '2020-03-19 07:30:05', '2020-03-19 07:30:05'),
(14, 5, 1167, 'GOLD INK', 851, 1, 'Biotech', 'out', '2020-03-20 12:40:49', '2020-03-20 12:40:49'),
(15, 6, 1052, 'ELEPHANT SAMAD BOND', 1000, 1, 'Biotech', 'out', '2020-03-20 12:41:54', '2020-03-20 12:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `cpo_com_agents`
--

CREATE TABLE `cpo_com_agents` (
  `id` int(10) UNSIGNED NOT NULL,
  `po_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpo_com_agents`
--

INSERT INTO `cpo_com_agents` (`id`, `po_id`, `name`, `percent`, `agent_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'Erin Woodard', 20, 1, '2020-12-04 11:13:56', '2020-12-04 11:13:56'),
(2, 2, 'Sasha Powers', 36, 2, '2020-12-04 11:13:56', '2020-12-04 11:13:56'),
(13, 3, 'Erin Woodard', 4, 1, '2020-12-04 12:31:35', '2020-12-04 12:31:35'),
(14, 3, 'Sasha Powers', 6, 2, '2020-12-04 12:31:35', '2020-12-04 12:31:35'),
(18, 4, 'Erin Woodard', 2, 1, '2020-12-05 04:55:54', '2020-12-05 04:55:54'),
(21, 5, 'Erin Woodard', 2, 1, '2020-12-12 05:16:50', '2020-12-12 05:16:50'),
(22, 5, 'Sasha Powers', 6, 2, '2020-12-12 05:16:50', '2020-12-12 05:16:50'),
(23, 7, 'Erin Woodard', 1, 1, '2020-12-12 06:51:35', '2020-12-12 06:51:35'),
(24, 7, 'Sasha Powers', 5, 2, '2020-12-12 06:51:35', '2020-12-12 06:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `cpo_expenses`
--

CREATE TABLE `cpo_expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `po_id` int(11) DEFAULT NULL,
  `expense_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `expense_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpo_expenses`
--

INSERT INTO `cpo_expenses` (`id`, `po_id`, `expense_description`, `amount`, `expense_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Expense2', 0, 2, '2020-12-04 11:13:18', '2020-12-04 11:13:18'),
(2, 1, 'Expense3', 32558, 3, '2020-12-04 11:13:18', '2020-12-04 11:13:18'),
(3, 2, 'Expense2', 0, 2, '2020-12-04 11:13:56', '2020-12-04 11:13:56'),
(4, 2, 'Expense3', 32558, 3, '2020-12-04 11:13:56', '2020-12-04 11:13:56'),
(15, 3, 'Expense1', 1, 1, '2020-12-04 12:31:35', '2020-12-04 12:31:35'),
(16, 3, 'Expense3', 0, 3, '2020-12-04 12:31:35', '2020-12-04 12:31:35'),
(20, 4, 'Expense2', 0, 2, '2020-12-05 04:55:54', '2020-12-05 04:55:54'),
(24, 5, 'Expense1', 1, 1, '2020-12-12 05:16:50', '2020-12-12 05:16:50'),
(25, 5, 'Expense2', 0, 2, '2020-12-12 05:16:50', '2020-12-12 05:16:50'),
(26, 5, 'Expense3', 0, 3, '2020-12-12 05:16:50', '2020-12-12 05:16:50'),
(27, 6, 'Expense1', 10370100, 1, '2020-12-12 06:51:10', '2020-12-12 06:51:10'),
(28, 6, 'Expense2', 6913400, 2, '2020-12-12 06:51:10', '2020-12-12 06:51:10'),
(29, 6, 'GST 17 %', 5876390, 3, '2020-12-12 06:51:10', '2020-12-12 06:51:10'),
(30, 7, 'Expense1', 10370100, 1, '2020-12-12 06:51:35', '2020-12-12 06:51:35'),
(31, 7, 'Expense2', 6913400, 2, '2020-12-12 06:51:35', '2020-12-12 06:51:35'),
(32, 7, 'GST 17 %', 5876390, 3, '2020-12-12 06:51:35', '2020-12-12 06:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `cpo_terms`
--

CREATE TABLE `cpo_terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `po_id` int(11) DEFAULT NULL,
  `term_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpo_terms`
--

INSERT INTO `cpo_terms` (`id`, `po_id`, `term_description`, `term_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Size of Material Must be  With In Range', 1, '2020-12-04 11:13:18', '2020-12-04 11:13:18'),
(2, 1, 'Moisture Shouldn\'t Exceed 08%', 2, '2020-12-04 11:13:18', '2020-12-04 11:13:18'),
(3, 1, 'All Quality Must be on Commertial Basis', 5, '2020-12-04 11:13:18', '2020-12-04 11:13:18'),
(4, 1, 'Bill of Entery is Mandatory for Invoice', 6, '2020-12-04 11:13:18', '2020-12-04 11:13:18'),
(5, 1, 'Transportor Wil be The XYZ', 7, '2020-12-04 11:13:18', '2020-12-04 11:13:18'),
(6, 2, 'Size of Material Must be  With In Range', 1, '2020-12-04 11:13:56', '2020-12-04 11:13:56'),
(7, 2, 'Moisture Shouldn\'t Exceed 08%', 2, '2020-12-04 11:13:56', '2020-12-04 11:13:56'),
(8, 2, 'All Quality Must be on Commertial Basis', 5, '2020-12-04 11:13:56', '2020-12-04 11:13:56'),
(9, 2, 'Bill of Entery is Mandatory for Invoice', 6, '2020-12-04 11:13:56', '2020-12-04 11:13:56'),
(10, 2, 'Transportor Wil be The XYZ', 7, '2020-12-04 11:13:56', '2020-12-04 11:13:56'),
(30, 3, 'Size of Material Must be  With In Range', 1, '2020-12-04 12:31:35', '2020-12-04 12:31:35'),
(31, 3, 'Size of Material shouldn\'t below 25mm', 3, '2020-12-04 12:31:35', '2020-12-04 12:31:35'),
(32, 3, 'Paymnet will be Clear After 25 working Days', 4, '2020-12-04 12:31:35', '2020-12-04 12:31:35'),
(39, 4, 'Size of Material Must be  With In Range', 1, '2020-12-05 04:55:54', '2020-12-05 04:55:54'),
(40, 4, 'Moisture Shouldn\'t Exceed 08%', 2, '2020-12-05 04:55:54', '2020-12-05 04:55:54'),
(47, 5, 'Size of Material Must be  With In Range', 1, '2020-12-12 05:16:50', '2020-12-12 05:16:50'),
(48, 5, 'Size of Material shouldn\'t below 25mm', 3, '2020-12-12 05:16:50', '2020-12-12 05:16:50'),
(49, 5, 'Paymnet will be Clear After 25 working Days', 4, '2020-12-12 05:16:50', '2020-12-12 05:16:50'),
(50, 6, 'Size of Material Must be  With In Range', 1, '2020-12-12 06:51:10', '2020-12-12 06:51:10'),
(51, 6, 'Moisture Shouldn\'t Exceed 08%', 2, '2020-12-12 06:51:10', '2020-12-12 06:51:10'),
(52, 6, 'Paymnet will be Clear After 25 working Days', 4, '2020-12-12 06:51:10', '2020-12-12 06:51:10'),
(53, 6, 'All Quality Must be on Commertial Basis', 5, '2020-12-12 06:51:10', '2020-12-12 06:51:10'),
(54, 7, 'Size of Material Must be  With In Range', 1, '2020-12-12 06:51:34', '2020-12-12 06:51:34'),
(55, 7, 'Moisture Shouldn\'t Exceed 08%', 2, '2020-12-12 06:51:34', '2020-12-12 06:51:34'),
(56, 7, 'Paymnet will be Clear After 25 working Days', 4, '2020-12-12 06:51:34', '2020-12-12 06:51:34'),
(57, 7, 'All Quality Must be on Commertial Basis', 5, '2020-12-12 06:51:34', '2020-12-12 06:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `weight_measure` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `contact`, `address`, `created_at`, `updated_at`, `weight_measure`) VALUES
(1, 'shafiq', 'shafiq@gmail.com', '03244399134', 'lahore', NULL, '2020-12-05 07:36:17', 1),
(2, 'jameel`', 'jameel@gmail.com', '03254588963', 'Temporibus ea illo o', '2020-12-02 12:59:29', '2020-12-05 07:36:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_purchase_orders`
--

CREATE TABLE `customer_purchase_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `po_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_start` int(11) DEFAULT NULL,
  `product_size_end` int(11) DEFAULT NULL,
  `size_unit` int(11) DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `paymnet_type` int(11) DEFAULT NULL,
  `transporter_id` int(11) DEFAULT NULL,
  `po_type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `cpo_attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpo_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_purchase_orders`
--

INSERT INTO `customer_purchase_orders` (`id`, `po_number`, `customer_id`, `company_id`, `date`, `product_id`, `product_type`, `product_source`, `product_size_start`, `product_size_end`, `size_unit`, `unit_price`, `unit_id`, `qty`, `paymnet_type`, `transporter_id`, `po_type`, `status`, `cpo_attachment`, `cpo_number`, `stock_status`, `created_at`, `updated_at`) VALUES
(2, 'CPO-1-12', 1, 1, '2020-12-04 00:00:00', 1, NULL, NULL, 84, 90, NULL, 357, 2, 456, NULL, NULL, NULL, 0, NULL, NULL, 0, '2020-12-04 11:13:56', '2020-12-04 11:47:24'),
(3, 'CPO-2-12', 1, 1, NULL, 1, NULL, NULL, 843, 90, NULL, 22222, 2, 10, NULL, NULL, NULL, 0, '2020-12-04-17-31-35-logo11.gif', '542', 0, '2020-12-04 12:22:28', '2020-12-04 12:31:35'),
(4, 'CPO-4-12', 2, 2, '2020-12-02 00:00:00', 1, NULL, NULL, 23, 222, NULL, 222, 2, 22, NULL, NULL, NULL, 0, '2020-12-05-09-55-54-logo12.png', 'qqqq', 0, '2020-12-05 04:52:02', '2020-12-05 04:55:54'),
(5, 'CPO-5-12', 2, 1, '2020-12-12 00:00:00', 1, NULL, NULL, 32, 50, NULL, 256, 2, 1000, NULL, NULL, NULL, 0, '2020-12-12-10-16-50-WhatsApp Image 2020-12-10 at 7.57.37 PM.jpeg', 'qqqq', 0, '2020-12-12 05:14:39', '2020-12-12 05:16:50'),
(6, 'CPO-6-12', 1, 1, '2020-12-04 00:00:00', 1, NULL, NULL, 0, 50, NULL, 34567, 2, 1000, NULL, NULL, NULL, 0, NULL, NULL, 0, '2020-12-12 06:51:10', '2020-12-12 06:52:33'),
(7, 'CPO-6-12', 1, 1, '2020-12-04 00:00:00', 1, NULL, NULL, 0, 50, NULL, 34567, 2, 1000, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2020-12-12 06:51:34', '2020-12-12 06:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `customer_purchase_order_expenses`
--

CREATE TABLE `customer_purchase_order_expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_purchase_order_expenses`
--

INSERT INTO `customer_purchase_order_expenses` (`id`, `name`, `unit`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Expense1', 'percent', 30, '2020-12-04 09:50:42', '2020-12-04 09:50:42'),
(2, 'Expense2', 'percent', 20, '2020-12-04 09:51:04', '2020-12-04 09:51:04'),
(3, 'GST 17 %', 'percent', 17, '2020-12-04 09:51:00', '2020-12-12 06:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `customer_purchase_terms`
--

CREATE TABLE `customer_purchase_terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_purchase_terms`
--

INSERT INTO `customer_purchase_terms` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Size of Material Must be  With In Range', '2020-11-21 02:25:47', '2020-11-21 02:25:47'),
(2, 'Moisture Shouldn\'t Exceed 08%', '2020-11-21 02:26:14', '2020-11-21 02:26:14'),
(3, 'Size of Material shouldn\'t below 25mm', '2020-11-21 02:27:04', '2020-11-21 02:27:04'),
(4, 'Paymnet will be Clear After 25 working Days', '2020-11-21 02:27:34', '2020-11-21 02:27:34'),
(5, 'All Quality Must be on Commertial Basis', '2020-11-21 02:27:58', '2020-11-21 02:27:58'),
(6, 'Bill of Entery is Mandatory for Invoice', '2020-11-21 02:28:32', '2020-11-21 02:28:32'),
(7, 'Transportor Wil be The XYZ', '2020-11-21 02:28:59', '2020-11-21 02:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(57, 7, 'purchase_ref_no', 'text', 'Purchase Ref No', 0, 1, 1, 1, 1, 1, '{}', 2),
(58, 7, 'out_ref_no', 'text', 'Out Ref No', 0, 1, 1, 1, 1, 1, '{}', 3),
(59, 7, 'transaction_date', 'text', 'Transaction Date', 0, 1, 1, 1, 1, 1, '{}', 4),
(60, 7, 'vendor_invoice_no', 'text', 'Vendor Invoice No', 0, 1, 1, 1, 1, 1, '{}', 5),
(61, 7, 'vendor_invoice', 'text', 'Vendor Invoice', 0, 1, 1, 1, 1, 1, '{}', 6),
(62, 7, 'transaction_type', 'text', 'Transaction Type', 0, 1, 1, 1, 1, 1, '{}', 7),
(63, 7, 'factory_id', 'text', 'Factory Id', 0, 1, 1, 1, 1, 1, '{}', 8),
(64, 7, 'factory_name', 'text', 'Factory Name', 0, 1, 1, 1, 1, 1, '{}', 9),
(65, 7, 'remarks', 'text', 'Remarks', 0, 1, 1, 1, 1, 1, '{}', 10),
(66, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 11),
(67, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 12),
(68, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(70, 8, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 3),
(74, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 7),
(75, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(76, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(77, 9, 'po_number', 'text', 'Po Number', 0, 1, 1, 1, 1, 1, '{}', 2),
(78, 9, 'vendor_id', 'text', 'Vendor Id', 0, 1, 1, 1, 1, 1, '{}', 3),
(79, 9, 'company_id', 'text', 'Company Id', 0, 1, 1, 1, 1, 1, '{}', 4),
(80, 9, 'date', 'text', 'Date', 0, 1, 1, 1, 1, 1, '{}', 5),
(81, 9, 'product_type', 'text', 'Product Type', 0, 1, 1, 1, 1, 1, '{}', 6),
(82, 9, 'product_source', 'text', 'Product Source', 0, 1, 1, 1, 1, 1, '{}', 7),
(83, 9, 'product_size_start', 'text', 'Product Size Start', 0, 1, 1, 1, 1, 1, '{}', 8),
(84, 9, 'product_size_end', 'text', 'Product Size End', 0, 1, 1, 1, 1, 1, '{}', 9),
(85, 9, 'size_unit', 'text', 'Size Unit', 0, 1, 1, 1, 1, 1, '{}', 10),
(86, 9, 'unit_price', 'text', 'Unit Price', 0, 1, 1, 1, 1, 1, '{}', 11),
(87, 9, 'qty', 'text', 'Qty', 0, 1, 1, 1, 1, 1, '{}', 12),
(88, 9, 'paymnet_type', 'text', 'Paymnet Type', 0, 1, 1, 1, 1, 1, '{}', 13),
(89, 9, 'transport_id', 'text', 'Transport Id', 0, 1, 1, 1, 1, 1, '{}', 14),
(90, 9, 'bl_id', 'text', 'Bl Id', 0, 1, 1, 1, 1, 1, '{}', 15),
(91, 9, 'import_type', 'text', 'Import Type', 0, 1, 1, 1, 1, 1, '{}', 16),
(92, 9, 'created_at', 'text', 'Created At', 0, 1, 1, 1, 1, 1, '{}', 17),
(93, 9, 'updated_at', 'text', 'Updated At', 0, 1, 1, 1, 1, 1, '{}', 18),
(94, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(95, 10, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(96, 10, 'email', 'text', 'Email', 0, 1, 1, 1, 1, 1, '{}', 3),
(97, 10, 'contact', 'text', 'Contact', 0, 1, 1, 1, 1, 1, '{}', 4),
(98, 10, 'address', 'text', 'Address', 0, 1, 1, 1, 1, 1, '{}', 5),
(99, 10, 'created_at', 'text', 'Created At', 0, 1, 1, 1, 1, 1, '{}', 6),
(100, 10, 'updated_at', 'text', 'Updated At', 0, 1, 1, 1, 1, 1, '{}', 7),
(101, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(102, 11, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(103, 11, 'vendor_type', 'text', 'Vendor Type', 0, 1, 1, 1, 1, 1, '{}', 3),
(104, 11, 'email', 'text', 'Email', 0, 1, 1, 1, 1, 1, '{}', 4),
(105, 11, 'contact', 'text', 'Contact', 0, 1, 1, 1, 1, 1, '{}', 5),
(106, 11, 'address', 'text', 'Address', 0, 1, 1, 1, 1, 1, '{}', 6),
(107, 11, 'created_at', 'text', 'Created At', 0, 1, 1, 1, 1, 1, '{}', 7),
(108, 11, 'updated_at', 'text', 'Updated At', 0, 1, 1, 1, 1, 1, '{}', 8),
(109, 8, 'type', 'text', 'Type', 0, 1, 1, 1, 1, 1, '{}', 3),
(110, 12, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(111, 12, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(112, 12, 'qty', 'text', 'Qty', 0, 1, 1, 1, 1, 1, '{}', 3),
(113, 12, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 4),
(114, 12, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(115, 13, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(116, 13, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, '{}', 2),
(117, 13, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(118, 13, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(119, 14, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(120, 14, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(121, 14, 'unit', 'text', 'Unit', 0, 1, 1, 1, 1, 1, '{}', 3),
(122, 14, 'amount', 'text', 'Amount', 0, 1, 1, 1, 1, 1, '{}', 4),
(123, 14, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(124, 14, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(125, 15, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(126, 15, 'po_id', 'text', 'Po Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(127, 15, 'lc_numer', 'text', 'Lc Numer', 0, 1, 1, 1, 1, 1, '{}', 3),
(128, 15, 'qty', 'text', 'Qty', 0, 1, 1, 1, 1, 1, '{}', 4),
(129, 15, 'created_at', 'text', 'Created At', 0, 1, 1, 1, 1, 1, '{}', 5),
(130, 15, 'updated_at', 'text', 'Updated At', 0, 1, 1, 1, 1, 1, '{}', 6),
(131, 17, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(132, 17, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(133, 17, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(134, 17, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(135, 18, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(136, 18, 'warehouse_id', 'text', 'Warehouse Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(137, 18, 'stock_in', 'text', 'Stock In', 0, 1, 1, 1, 1, 1, '{}', 3),
(138, 18, 'stock_out', 'text', 'Stock Out', 0, 1, 1, 1, 1, 1, '{}', 4),
(139, 18, 'stock_type', 'text', 'Stock Type', 0, 1, 1, 1, 1, 1, '{}', 5),
(140, 18, 'transport_id', 'text', 'Transport Id', 0, 1, 1, 1, 1, 1, '{}', 6),
(141, 18, 'truck_number', 'text', 'Truck Number', 0, 1, 1, 1, 1, 1, '{}', 7),
(142, 18, 'po_id', 'text', 'Po Id', 0, 1, 1, 1, 1, 1, '{}', 8),
(143, 18, 'po_number', 'text', 'Po Number', 1, 1, 1, 1, 1, 1, '{}', 9),
(144, 18, 'lc_id', 'text', 'Lc Id', 0, 1, 1, 1, 1, 1, '{}', 10),
(145, 18, 'bl_id', 'text', 'Bl Id', 0, 1, 1, 1, 1, 1, '{}', 11),
(146, 18, 'import_type', 'text', 'Import Type', 0, 1, 1, 1, 1, 1, '{}', 12),
(147, 18, 'company_id', 'text', 'Company Id', 0, 1, 1, 1, 1, 1, '{}', 13),
(148, 18, 'created_at', 'text', 'Created At', 0, 1, 1, 1, 1, 1, '{}', 14),
(149, 18, 'updated_at', 'text', 'Updated At', 0, 1, 1, 1, 1, 1, '{}', 15),
(156, 20, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(157, 20, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(158, 20, 'opening_balance', 'text', 'Opening Balance', 0, 1, 1, 1, 1, 1, '{}', 3),
(159, 20, 'company_name', 'text', 'Company Name', 0, 1, 1, 1, 1, 1, '{}', 4),
(160, 20, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(161, 20, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(162, 22, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(163, 22, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(164, 22, 'email', 'text', 'Email', 0, 1, 1, 1, 1, 1, '{}', 3),
(165, 22, 'contact', 'text', 'Contact', 0, 1, 1, 1, 1, 1, '{}', 4),
(166, 22, 'address', 'text', 'Address', 0, 1, 1, 1, 1, 1, '{}', 5),
(167, 22, 'created_at', 'text', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 6),
(168, 22, 'updated_at', 'text', 'Updated At', 0, 1, 1, 1, 1, 1, '{}', 7),
(169, 23, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(170, 23, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(171, 23, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(172, 23, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(173, 25, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(174, 25, 'po_number', 'text', 'Po Number', 0, 1, 1, 1, 1, 1, '{}', 2),
(175, 25, 'customer_id', 'text', 'Customer Id', 0, 1, 1, 1, 1, 1, '{}', 3),
(176, 25, 'company_id', 'text', 'Company Id', 0, 1, 1, 1, 1, 1, '{}', 4),
(177, 25, 'date', 'text', 'Date', 0, 1, 1, 1, 1, 1, '{}', 5),
(178, 25, 'product_id', 'text', 'Product Id', 0, 1, 1, 1, 1, 1, '{}', 6),
(179, 25, 'product_type', 'text', 'Product Type', 0, 1, 1, 1, 1, 1, '{}', 7),
(180, 25, 'product_source', 'text', 'Product Source', 0, 1, 1, 1, 1, 1, '{}', 8),
(181, 25, 'product_size_start', 'text', 'Product Size Start', 0, 1, 1, 1, 1, 1, '{}', 9),
(182, 25, 'product_size_end', 'text', 'Product Size End', 0, 1, 1, 1, 1, 1, '{}', 10),
(183, 25, 'size_unit', 'text', 'Size Unit', 0, 1, 1, 1, 1, 1, '{}', 11),
(184, 25, 'unit_price', 'text', 'Unit Price', 0, 1, 1, 1, 1, 1, '{}', 12),
(185, 25, 'unit_id', 'text', 'Unit Id', 0, 1, 1, 1, 1, 1, '{}', 13),
(186, 25, 'qty', 'text', 'Qty', 0, 1, 1, 1, 1, 1, '{}', 14),
(187, 25, 'paymnet_type', 'text', 'Paymnet Type', 0, 1, 1, 1, 1, 1, '{}', 15),
(188, 25, 'transporter_id', 'text', 'Transporter Id', 0, 1, 1, 1, 1, 1, '{}', 16),
(189, 25, 'po_type', 'text', 'Po Type', 0, 1, 1, 1, 1, 1, '{}', 17),
(190, 25, 'status', 'text', 'Status', 0, 1, 1, 1, 1, 1, '{}', 18),
(191, 25, 'p_attachment', 'text', 'P Attachment', 0, 1, 1, 1, 1, 1, '{}', 19),
(192, 25, 'p_inv_number', 'text', 'P Inv Number', 0, 1, 1, 1, 1, 1, '{}', 20),
(193, 25, 'stock_status', 'text', 'Stock Status', 0, 1, 1, 1, 1, 1, '{}', 21),
(194, 25, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 22),
(195, 25, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 23),
(196, 26, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(197, 26, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(198, 26, 'unit', 'text', 'Unit', 0, 1, 1, 1, 1, 1, '{}', 3),
(199, 26, 'amount', 'text', 'Amount', 0, 1, 1, 1, 1, 1, '{}', 4),
(200, 26, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(201, 26, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(202, 27, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(203, 27, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, '{}', 2),
(204, 27, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(205, 27, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(206, 28, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(207, 28, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(208, 28, 'contact', 'text', 'Contact', 0, 1, 1, 1, 1, 1, '{}', 3),
(209, 28, 'address', 'text', 'Address', 0, 1, 1, 1, 1, 1, '{}', 4),
(210, 28, 'email', 'text', 'Email', 0, 1, 1, 1, 1, 1, '{}', 5),
(211, 28, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 6),
(212, 28, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(213, 22, 'weight_measure', 'text', 'Weight Measure', 0, 1, 1, 1, 1, 1, '{}', 8),
(214, 29, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(215, 29, 'po_id', 'text', 'Po Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(216, 29, 'product_id', 'text', 'Product Id', 0, 1, 1, 1, 1, 1, '{}', 3),
(217, 29, 'transporter_id', 'text', 'Transporter Id', 0, 1, 1, 1, 1, 1, '{}', 4),
(218, 29, 'truck_no', 'text', 'Truck No', 0, 1, 1, 1, 1, 1, '{}', 5),
(219, 29, 'weight_calculate_company1', 'text', 'Weight Calculate Company1', 0, 1, 1, 1, 1, 1, '{}', 6),
(220, 29, 'truck_preload_weight1', 'text', 'Truck Preload Weight1', 0, 1, 1, 1, 1, 1, '{}', 7),
(221, 29, 'truck_post_load_weight1', 'text', 'Truck Post Load Weight1', 0, 1, 1, 1, 1, 1, '{}', 8),
(222, 29, 'truck_net_weight', 'text', 'Truck Net Weight', 0, 1, 1, 1, 1, 1, '{}', 9),
(223, 29, 'weight_calculate_company2', 'text', 'Weight Calculate Company2', 0, 1, 1, 1, 1, 1, '{}', 10),
(224, 29, 'truck_preload_weight2', 'text', 'Truck Preload Weight2', 0, 1, 1, 1, 1, 1, '{}', 11),
(225, 29, 'truck_post_load_weight2', 'text', 'Truck Post Load Weight2', 0, 1, 1, 1, 1, 1, '{}', 12),
(226, 29, 'truck_net_weight2', 'text', 'Truck Net Weight2', 0, 1, 1, 1, 1, 1, '{}', 13),
(227, 29, 'customer_weight', 'text', 'Customer Weight', 0, 1, 1, 1, 1, 1, '{}', 14),
(228, 29, 'stock_out_customer', 'text', 'Stock Out Customer', 0, 1, 1, 1, 1, 1, '{}', 15),
(229, 29, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 16),
(230, 29, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 17),
(231, 30, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(232, 30, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(233, 30, 'address', 'text', 'Address', 0, 1, 1, 1, 1, 1, '{}', 3),
(234, 30, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 4),
(235, 30, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(236, 31, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(237, 31, 'account_number', 'text', 'Account Number', 0, 1, 1, 1, 1, 1, '{}', 2),
(238, 31, 'bank_id', 'text', 'Bank Id', 0, 0, 0, 0, 0, 0, '{}', 3),
(239, 31, 'bank_name', 'text', 'Bank Name', 0, 0, 0, 0, 0, 0, '{}', 4),
(240, 31, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(241, 31, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(242, 31, 'bank_account_hasone_bank_relationship', 'relationship', 'Banks', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Bank\",\"table\":\"banks\",\"type\":\"belongsTo\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"bank_accounts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(7, 'consumable_inventory_transactions', 'consumable-inventory-transactions', 'Consumable Inventory Transaction', 'Consumable Inventory Transactions', NULL, 'App\\ConsumableInventoryTransaction', NULL, 'App\\Http\\Controllers\\ConsumableInventory\\InwardInventoryTransactionController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-04-26 11:18:14', '2020-04-26 11:18:49'),
(8, 'products', 'products', 'Product', 'Products', NULL, 'App\\Product', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-18 15:31:37', '2020-11-20 15:36:13'),
(9, 'vendor_purchase_orders', 'vendor-purchase-orders', 'Vendor Purchase Order', 'Vendor Purchase Orders', NULL, 'App\\VendorPurchaseOrder', NULL, 'App\\Http\\Controllers\\VendorPurchase\\VendorPurchaseOrderController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-11-20 14:56:19', '2020-11-20 14:56:19'),
(10, 'companies', 'companies', 'Company', 'Companies', NULL, 'App\\Company', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-11-20 15:09:28', '2020-11-20 15:09:28'),
(11, 'vendors', 'vendors', 'Vendor', 'Vendors', NULL, 'App\\Vendor', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-11-20 15:10:26', '2020-11-20 15:10:26'),
(12, 'units', 'units', 'Unit', 'Units', NULL, 'App\\Unit', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-11-21 01:46:31', '2020-11-21 01:46:31'),
(13, 'vendor_purchase_terms', 'vendor-purchase-terms', 'Vendor Purchase Term', 'Vendor Purchase Terms', NULL, 'App\\VendorPurchaseTerm', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-11-21 02:25:10', '2020-11-21 02:25:10'),
(14, 'vendor_purchase_order_expenses', 'vendor-purchase-order-expenses', 'Vendor Purchase Order Expense', 'Vendor Purchase Order Expenses', NULL, 'App\\VendorPurchaseOrderExpense', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-11-21 02:49:38', '2020-11-21 02:49:38'),
(15, 'vendor_letter_credits', 'vendor-letter-credits', 'Vendor Letter Credit', 'Vendor Letter Credits', NULL, 'App\\VendorLetterCredit', NULL, 'App\\Http\\Controllers\\VendorPurchase\\VendorLetterCreditController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-11-28 11:12:33', '2020-11-28 11:12:33'),
(17, 'warehouses', 'warehouses', 'Warehouse', 'Warehouses', NULL, 'App\\Warehouse', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-11-28 15:48:02', '2020-11-28 15:48:02'),
(18, 'stock_managments', 'stock-managments', 'Stock Managment', 'Stock Managments', NULL, 'App\\StockManagment', NULL, 'App\\Http\\Controllers\\Stock\\StockManagmentController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-11-29 07:45:13', '2020-12-04 14:59:09'),
(20, 'transporters', 'transporters', 'Transporter', 'Transporters', NULL, 'App\\Transporter', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-12-02 02:17:49', '2020-12-02 02:17:49'),
(22, 'customers', 'customers', 'Customer', 'Customers', NULL, 'App\\Customer', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-12-02 07:53:44', '2020-12-05 02:35:49'),
(23, 'payment_methods', 'payment-methods', 'Payment Method', 'Payment Methods', NULL, 'App\\PaymentMethod', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-12-02 08:09:37', '2020-12-02 08:09:37'),
(25, 'customer_purchase_orders', 'customer-purchase-orders', 'Customer Purchase Order', 'Customer Purchase Orders', NULL, 'App\\CustomerPurchaseOrder', NULL, 'App\\Http\\Controllers\\CustomerPurchase\\CustomerPurchaseOrderController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-12-02 08:14:11', '2020-12-02 08:14:11'),
(26, 'customer_purchase_order_expenses', 'customer-purchase-order-expenses', 'Customer Purchase Order Expense', 'Customer Purchase Order Expenses', NULL, 'App\\CustomerPurchaseOrderExpense', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-12-04 09:48:12', '2020-12-04 09:48:12'),
(27, 'customer_purchase_terms', 'customer-purchase-terms', 'Customer Purchase Term', 'Customer Purchase Terms', NULL, 'App\\CustomerPurchaseTerm', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-12-04 10:14:33', '2020-12-04 10:14:33'),
(28, 'commission_agents', 'commission-agents', 'Commission Agent', 'Commission Agents', NULL, 'App\\CommissionAgent', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-12-04 10:21:03', '2020-12-04 10:21:03'),
(29, 'delivery_orders', 'delivery-orders', 'Delivery Order', 'Delivery Orders', NULL, 'App\\DeliveryOrder', NULL, 'App\\Http\\Controllers\\DeliveryOrderController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-12-05 02:54:07', '2020-12-05 02:54:07'),
(30, 'banks', 'banks', 'Bank', 'Banks', NULL, 'App\\Bank', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-12-31 13:34:20', '2020-12-31 13:34:20'),
(31, 'bank_accounts', 'bank-accounts', 'Bank Account', 'Bank Accounts', NULL, 'App\\BankAccount', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-12-31 13:41:55', '2020-12-31 14:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_orders`
--

CREATE TABLE `delivery_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `do_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `po_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `transporter_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `truck_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight_calculate_company1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `truck_preload_weight1` double DEFAULT NULL,
  `truck_post_load_weight1` double DEFAULT NULL,
  `truck_net_weight1` double DEFAULT NULL,
  `unit_id1` int(11) DEFAULT NULL,
  `attachment1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_out` int(11) DEFAULT NULL,
  `weight_calculate_company2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `truck_preload_weight2` double DEFAULT NULL,
  `truck_post_load_weight2` double DEFAULT NULL,
  `truck_net_weight2` double DEFAULT NULL,
  `unit_id2` int(11) DEFAULT NULL,
  `attachment2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_weight` double DEFAULT NULL,
  `unit_id3` int(11) DEFAULT NULL,
  `attachment3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bilty_number` int(11) DEFAULT NULL,
  `bilty_attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_orders`
--

INSERT INTO `delivery_orders` (`id`, `do_number`, `warehouse_id`, `po_id`, `product_id`, `transporter_id`, `date`, `truck_no`, `weight_calculate_company1`, `truck_preload_weight1`, `truck_post_load_weight1`, `truck_net_weight1`, `unit_id1`, `attachment1`, `stock_out`, `weight_calculate_company2`, `truck_preload_weight2`, `truck_post_load_weight2`, `truck_net_weight2`, `unit_id2`, `attachment2`, `customer_weight`, `unit_id3`, `attachment3`, `bilty_number`, `bilty_attachment`, `created_at`, `updated_at`) VALUES
(9, 'DO-9-12', 1, 3, NULL, NULL, '2020-12-10 10:12:36', 'LHR-1234', 'PBIT', 36, 38, 2, 2, '2020-12-10-21-11-17-WhatsApp Image 2020-12-10 at 7.57.37 PM.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2569, '2020-12-10-21-11-17-WhatsApp Image 2020-12-10 at 7.57.37 PM.jpeg', '2020-12-10 16:11:17', '2020-12-10 17:12:36'),
(10, 'DO-10-12', 1, 2, NULL, NULL, '2020-12-10 09:13:03', 'LHR-1234', 'PBIT', 23, 43, 20, 2, '2020-12-10-21-13-03-WhatsApp Image 2020-12-10 at 7.57.37 PM.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2569, '2020-12-10-21-13-03-WhatsApp Image 2020-12-10 at 7.57.37 PM.jpeg', '2020-12-10 16:13:03', '2020-12-10 16:13:03'),
(11, 'DO-11-12', 1, 3, NULL, NULL, '2020-12-10 10:14:24', 'LHR-1234', 'PBIT', 34, 37, 3, 2, '2020-12-10-22-14-25-WhatsApp Image 2020-12-10 at 7.57.37 PM.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12356, '2020-12-10-22-14-24-WhatsApp Image 2020-12-04 at 8.01.45 PM.jpeg', '2020-12-10 17:14:25', '2020-12-10 17:14:25'),
(12, 'DO-12-12', 1, 2, NULL, NULL, '2020-12-12 08:22:49', 'LHR-1234', 'PBIT', 234, 345, 111, 2, '2020-12-12-08-22-49-64607.png', 2, 'Chaudhry Kanta', 234015, 345025, 111010, 1, '2020-12-12-08-22-49-pexels-curioso-photography-288097.jpg', NULL, NULL, NULL, 12356, '2020-12-12-08-22-49-d33b5d00ed2101549cf9aadbe947023c.png', '2020-12-12 03:22:49', '2020-12-12 03:22:49'),
(13, 'DO-13-12', 1, 5, NULL, NULL, '2020-12-12 10:22:01', 'LHR-1234', 'PBIT', 100, 120, 20, 2, '2020-12-12-10-22-01-logo12.png', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25896, '2020-12-12-10-22-01-WhatsApp Image 2020-12-10 at 7.57.37 PM.jpeg', '2020-12-12 05:22:01', '2020-12-12 05:22:01'),
(14, 'DO-14-12', 1, 5, NULL, NULL, '2020-12-12 10:27:33', 'LHR-3698', 'PBIT', 258, 589, 331, 2, '2020-12-12-10-27-33-WhatsApp Image 2020-09-30 at 11.55.47 AM.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2569, '2020-12-12-10-27-33-WhatsApp Image 2020-12-10 at 7.57.37 PM.jpeg', '2020-12-12 05:27:33', '2020-12-12 05:27:33'),
(15, 'DO-15-12', 1, 6, NULL, NULL, '2020-12-12 12:22:35', 'LHR-1234', 'PBIT', 234, 254, 20, 2, '2020-12-12-12-00-51-WhatsApp Image 2020-12-10 at 7.57.37 PM.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2569, '2020-12-12-12-00-51-WhatsApp Image 2020-12-10 at 7.57.37 PM.jpeg', '2020-12-12 07:00:51', '2020-12-12 07:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `factories`
--

CREATE TABLE `factories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `factories`
--

INSERT INTO `factories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Biotech', NULL, NULL),
(2, 'Lamitech', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inv_items`
--

CREATE TABLE `inv_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `stock_reminder` int(11) DEFAULT 0,
  `inventory_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'enabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inv_items`
--

INSERT INTO `inv_items` (`id`, `category_item`, `item_name`, `uom`, `qty`, `stock_reminder`, `inventory_status`, `created_at`, `updated_at`) VALUES
(1034, 'inks', 'CYAN (BLUE)', 'kg', NULL, 80, 'enabled', '2019-03-05 15:20:16', '2019-07-03 01:25:49'),
(1035, 'inks', 'WHITE', 'kg', NULL, 100, 'enabled', '2019-03-05 18:16:36', '2019-07-03 01:23:40'),
(1036, 'inks', 'YELLOW', 'kg', NULL, 70, 'enabled', '2019-03-05 18:16:47', '2019-07-03 01:23:17'),
(1037, 'inks', 'BLACK', 'kg', NULL, 60, 'enabled', '2019-03-05 18:19:48', '2019-07-03 01:24:29'),
(1038, 'inks', 'RED (magenta)', 'kg', NULL, 70, 'enabled', '2019-03-05 18:28:35', '2019-07-03 01:24:11'),
(1039, 'varnish', 'DRIP OFF VARNISH', 'kg', NULL, 200, 'enabled', '2019-03-05 18:36:03', '2019-07-03 01:27:49'),
(1040, 'varnish', 'UV LECQUER', 'kg', NULL, 40, 'enabled', '2019-03-05 18:36:28', '2019-07-03 01:29:01'),
(1041, 'consume', 'COTTON TAPE 3(inch)', 'pcs', NULL, 50, 'enabled', '2019-03-05 18:38:41', '2019-07-03 01:27:12'),
(1042, 'consume', 'DOUBLE TAPE', 'pcs', NULL, 20, 'enabled', '2019-03-05 18:38:54', '2019-07-03 01:40:43'),
(1043, 'consume', 'WHITE TAPE', 'pcs', NULL, 0, 'enabled', '2019-03-05 18:39:02', '2019-03-05 18:40:19'),
(1044, 'consume', 'ELFI', 'pcs', NULL, 12, 'enabled', '2019-03-05 18:41:30', '2019-07-03 01:43:18'),
(1045, 'consume', 'CHANNEL DIE /PATTI (IMPORTED)', 'pack', NULL, 2, 'enabled', '2019-03-05 18:42:47', '2019-07-03 01:43:37'),
(1046, 'consume', 'RUBBER BAND 25#', 'pack', NULL, 0, 'enabled', '2019-03-05 18:43:27', '2019-03-05 18:43:27'),
(1047, 'consume', 'RUBBER BAND 32#', 'pack', NULL, 8, 'enabled', '2019-03-05 18:43:44', '2019-07-03 01:43:59'),
(1048, 'consume', 'PLASTIC PARAS', 'pack', NULL, 0, 'enabled', '2019-03-05 18:44:07', '2019-03-05 18:44:07'),
(1049, 'consume', 'PASTING POWDER', 'pcs', NULL, 8, 'enabled', '2019-03-05 18:45:37', '2019-07-03 01:51:35'),
(1050, 'varnish', 'UV WASH', 'liter', NULL, 15, 'enabled', '2019-03-05 19:04:58', '2019-07-03 01:30:12'),
(1051, 'consume', 'CAMEL SAMAD', 'kg', NULL, 0, 'enabled', '2019-03-05 19:06:07', '2019-03-05 20:41:33'),
(1052, 'consume', 'ELEPHANT SAMAD BOND', 'kg', NULL, 0, 'enabled', '2019-03-05 19:06:23', '2019-03-06 15:25:57'),
(1053, 'consume', 'EMBOSE SHEET', 'pcs', NULL, 0, 'enabled', '2019-03-05 19:06:42', '2019-03-05 19:06:42'),
(1054, 'consume', 'CEMENTING SOLUTION (2 TIGER)', 'kg', NULL, 0, 'enabled', '2019-03-05 19:07:02', '2019-03-05 20:40:57'),
(1055, 'consume', 'GUM SOLUTION', 'liter', NULL, 0, 'enabled', '2019-03-05 19:07:39', '2019-03-05 19:07:39'),
(1056, 'consume', 'OXILAN UV', 'kg', NULL, 20, 'enabled', '2019-03-05 19:52:19', '2019-07-03 01:20:11'),
(1057, 'consume', 'LEMINATION SHEET', 'bundle', NULL, 1, 'enabled', '2019-03-05 19:52:56', '2019-07-03 01:19:56'),
(1058, 'consume', 'PLATE CLEANER', 'liter', NULL, 3, 'enabled', '2019-03-05 19:54:12', '2019-07-03 01:19:32'),
(1059, 'consume', 'PRINTED BLANKIT', 'pcs', NULL, 3, 'enabled', '2019-03-05 19:59:31', '2019-07-03 01:19:15'),
(1060, 'consume', 'UV BLANKIT', 'pcs', NULL, 3, 'enabled', '2019-03-05 20:00:24', '2019-07-03 01:18:59'),
(1061, 'consume', 'CHANNEL DIE /PATTI ( LOCAL )', 'pack', NULL, 2, 'enabled', '2019-03-05 20:02:41', '2019-07-03 01:18:37'),
(1062, 'varnish', 'DRIP OF MAT UV WARNISH', 'kg', NULL, 0, 'enabled', '2019-03-07 16:05:13', '2019-03-07 16:05:13'),
(1063, 'consume', 'IPA', 'kg', NULL, 100, 'enabled', '2019-03-11 20:34:50', '2019-07-03 01:18:11'),
(1064, 'consume', 'OFF SET PAPER RIM (100 GRM)', 'bundle', NULL, 1, 'enabled', '2019-03-11 20:36:12', '2019-07-03 01:41:26'),
(1065, 'consume', 'COTTON RUGS', 'kg', NULL, 25, 'enabled', '2019-03-13 13:54:40', '2019-07-03 01:17:55'),
(1066, 'consume', 'STRAPPING ROLL', 'bundle', NULL, 2, 'enabled', '2019-03-13 22:16:02', '2019-07-03 01:17:30'),
(1067, 'consume', 'COTTON SHOPPER', 'kg', NULL, 20, 'enabled', '2019-03-13 22:19:10', '2019-07-03 01:17:07'),
(1068, 'consume', 'CLEAN FIX-UV', 'kg', NULL, 0, 'enabled', '2019-03-14 20:18:32', '2019-03-14 20:18:32'),
(1069, 'consume', 'ANTIFOAM', 'liter', NULL, 0, 'enabled', '2019-03-14 20:19:18', '2019-03-14 20:19:18'),
(1070, 'varnish', 'UV TEMP OFFSET TINT MIDUM', 'kg', NULL, 0, 'enabled', '2019-03-15 02:33:39', '2019-03-15 02:33:39'),
(1071, 'varnish', 'DRIP OF PREMIER', 'kg', NULL, 0, 'enabled', '2019-03-19 01:21:34', '2019-03-19 01:21:34'),
(1072, 'biocos', 'BIOCOS SERUM CAP WITH PLUG', 'pcs', NULL, 600000, 'enabled', '2019-03-23 09:36:26', '2019-07-03 01:35:56'),
(1073, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 'pcs', NULL, 120000, 'enabled', '2019-03-23 09:44:12', '2019-07-03 01:35:15'),
(1074, 'biocos', 'BIOCOS SERUM UNIT BOX', 'pcs', NULL, 240000, 'enabled', '2019-03-23 09:44:34', '2019-07-03 01:33:49'),
(1075, 'biocos', 'BIOCOS SERUM 12 PCS BOX', 'pcs', NULL, 200, 'enabled', '2019-03-23 09:44:51', '2019-07-03 01:33:11'),
(1076, 'biocos', 'BIOCOS SERUM VIAL LABEL', 'pcs', NULL, 1000000, 'enabled', '2019-03-23 09:45:09', '2019-07-03 01:32:11'),
(1077, 'biocos', 'BIOCOS SOAP LARGE UNIT BOX', 'pcs', NULL, 16800, 'enabled', '2019-03-23 09:45:28', '2019-07-03 01:30:59'),
(1078, 'biocos', 'BIOCOS SOAP SMALL UNIT BOX', 'pcs', NULL, 21600, 'enabled', '2019-03-23 09:45:45', '2019-10-10 19:56:54'),
(1079, 'biocos', 'BIOCOS NEEM SOAP UNIT BOX', 'pcs', NULL, 14400, 'enabled', '2019-03-23 09:46:04', '2019-07-03 01:28:44'),
(1080, 'biocos', 'BIOCOS HAIR REGROWTH UNIT BOX', 'pcs', NULL, 0, 'enabled', '2019-03-23 09:46:37', '2019-03-23 09:46:37'),
(1081, 'biocos', 'BIOCOS HAIR REGROWTH AMPULE', 'pcs', NULL, 0, 'enabled', '2019-03-23 09:47:00', '2019-03-23 09:47:00'),
(1082, 'biocos', 'BIOCOS AGE REVERSAL UNIT BOX', 'pcs', NULL, 0, 'enabled', '2019-03-23 09:47:17', '2019-03-23 09:47:17'),
(1083, 'biocos', 'BIOCOS AGE REVERSAL AMPULE', 'pcs', NULL, 0, 'enabled', '2019-03-23 09:47:37', '2019-03-23 09:47:37'),
(1084, 'biocos', 'BIOCOS PIMPLE CLEAR UNIT BOX', 'pcs', NULL, 0, 'enabled', '2019-03-23 09:47:51', '2019-03-23 09:47:51'),
(1085, 'biocos', 'BIOCOS PIMPLE CLEAR AMPULE', 'pcs', NULL, 0, 'enabled', '2019-03-23 09:48:06', '2019-03-23 09:48:06'),
(1086, 'biocos', 'BIOCOS HAIR REGROWTH 24 PCS BOX', 'pcs', NULL, 0, 'enabled', '2019-03-23 12:09:39', '2019-03-23 12:09:39'),
(1087, 'biocos', 'BIOCOS PIMPLE CLEAR 24 PCS BOX', 'pcs', NULL, 0, 'enabled', '2019-03-23 12:11:26', '2019-03-23 12:11:26'),
(1088, 'biocos', 'BIOCOS AGE REVERSAL 24 PCS BOX', 'pcs', NULL, 0, 'enabled', '2019-03-23 12:12:03', '2019-03-23 12:12:03'),
(1098, 'biocos', 'BIOCOS MEN SERUM CAP WITH PLUG', 'pcs', NULL, 120000, 'enabled', '2019-03-27 21:14:58', '2019-07-03 01:28:08'),
(1099, 'biocos', 'BIOCOS MEN SERUM UNIT BOX', 'pcs', NULL, 0, 'enabled', '2019-03-27 21:15:42', '2019-03-27 21:15:42'),
(1100, 'biocos', 'BIOCOS MEN SERUM VIAL LABEL', 'pcs', NULL, 0, 'enabled', '2019-03-27 21:16:28', '2019-03-27 21:16:28'),
(1101, 'biocos', 'BIOCOS MEN SERUM 12 PCS BOX', 'pcs', NULL, 0, 'enabled', '2019-03-27 21:18:17', '2019-03-27 21:18:17'),
(1102, 'consume', 'CARBAN PAPER', 'pack', NULL, 2, 'enabled', '2019-03-29 17:07:08', '2019-07-03 01:16:29'),
(1103, 'varnish', 'UV CHEMELEON', 'liter', NULL, 0, 'enabled', '2019-04-06 20:42:43', '2019-04-06 20:42:43'),
(1104, 'inks', 'DRIPOFF YELLOWISH', 'kg', NULL, 70, 'enabled', '2019-04-06 20:44:55', '2019-07-03 01:16:03'),
(1105, 'biocos', 'vail 2ml', 'pcs', NULL, 0, 'enabled', '2019-04-09 20:04:16', '2019-04-09 20:04:16'),
(1106, 'inks', 'UV FLEXO INK YELLOW', 'kg', NULL, 0, 'enabled', '2019-04-10 18:18:51', '2019-04-10 19:10:35'),
(1107, 'inks', 'UV FLEXO INK WHITE', 'kg', NULL, 0, 'enabled', '2019-04-10 18:20:14', '2019-04-10 19:09:40'),
(1108, 'inks', 'UV FLEXO INK RED', 'kg', NULL, 0, 'enabled', '2019-04-10 18:21:29', '2019-04-10 19:09:04'),
(1109, 'inks', 'UV FLEXO INK BLACK', 'kg', NULL, 0, 'enabled', '2019-04-10 18:22:19', '2019-04-10 19:08:18'),
(1110, 'inks', 'UV FLEXO INK BLUE', 'kg', NULL, 0, 'enabled', '2019-04-10 18:23:34', '2019-04-10 19:07:44'),
(1111, 'biocos', 'BIOCOS CLEANSING MILK BOSTER UNIT BOX', 'pcs', NULL, 0, 'enabled', '2019-04-23 19:48:01', '2019-04-23 19:48:01'),
(1112, 'biocos', 'BIOCOS CLEANSING MILK BOSTER AMPULE', 'pcs', NULL, 0, 'enabled', '2019-04-23 19:50:11', '2019-04-23 19:50:11'),
(1113, 'biocos', 'BIOCOS CLEANSING MILK BOSTER INNER', 'pcs', NULL, 0, 'enabled', '2019-04-23 19:50:51', '2019-04-23 19:50:51'),
(1114, 'biocos', 'BIOCOS CLEANSING MILK BOOSTER 12 PCS BOX', 'pcs', NULL, 0, 'enabled', '2019-04-23 19:53:04', '2019-04-23 19:53:04'),
(1115, 'biocos', 'BIOCOS WHITENING SCRUB BOOSTER 12 PCS BOX', 'pcs', NULL, 0, 'enabled', '2019-04-23 19:55:44', '2019-04-23 19:55:44'),
(1116, 'consume', 'GLOVES', 'pack', NULL, 2, 'enabled', '2019-04-23 20:01:22', '2019-07-03 01:15:31'),
(1128, 'biocos', 'BIOCOS MOISTURIZING CREAM  BOOSTER UNIT BOX', 'pcs', NULL, 0, 'enabled', '2019-04-23 23:40:20', '2019-04-23 23:40:20'),
(1129, 'biocos', 'BIOCOS MOISTURIZING CREAM  BOOSTER AMPULE', 'pcs', NULL, 0, 'enabled', '2019-04-23 23:40:31', '2019-04-23 23:40:31'),
(1130, 'biocos', 'BIOCOS MOISTURIZING CREAM  BOOSTER INNER', 'pcs', NULL, 0, 'enabled', '2019-04-23 23:40:44', '2019-04-23 23:40:44'),
(1131, 'biocos', 'BIOCOS MOISTURIZING CREAM  BOOSTER 12 PCS BOX', 'pcs', NULL, 0, 'enabled', '2019-04-23 23:40:55', '2019-04-23 23:40:55'),
(1132, 'biocos', 'BIOCOS MASSAGE CREAM BOOSTER 12 PCS BOX', 'pcs', NULL, 0, 'enabled', '2019-04-23 23:42:27', '2019-04-23 23:42:27'),
(1133, 'biocos', 'BIOCOS MASSAGE CREAM BOOSTER INNER', 'pcs', NULL, 0, 'enabled', '2019-04-23 23:42:48', '2019-04-23 23:42:48'),
(1134, 'biocos', 'BIOCOS MASSAGE CREAM BOOSTER AMPULE', 'pcs', NULL, 0, 'enabled', '2019-04-23 23:42:58', '2019-04-23 23:42:58'),
(1135, 'biocos', 'BIOCOS MASSAGE CREAM BOOSTER UNIT BOX', 'pcs', NULL, 0, 'enabled', '2019-04-23 23:44:25', '2019-04-23 23:44:25'),
(1136, 'biocos', 'BIOCOS TONER BOOSTER UNIT BOX', 'pcs', NULL, 0, 'enabled', '2019-04-23 23:46:04', '2019-04-23 23:46:04'),
(1137, 'biocos', 'BIOCOS TONER BOOSTER AMPULE', 'pcs', NULL, 0, 'enabled', '2019-04-23 23:46:16', '2019-04-23 23:46:16'),
(1138, 'biocos', 'BIOCOS TONER BOOSTER INNER', 'pcs', NULL, 0, 'enabled', '2019-04-23 23:46:23', '2019-04-23 23:46:23'),
(1139, 'biocos', 'BIOCOS TONER BOOSTER 12 PCS BOX', 'pcs', NULL, 0, 'enabled', '2019-04-23 23:46:35', '2019-04-23 23:46:35'),
(1140, 'biocos', 'BIOCOS FACIAL BOOSTER KIT 7 PCS BOX', 'pcs', NULL, 0, 'enabled', '2019-04-23 23:48:36', '2019-04-23 23:48:36'),
(1141, 'biocos', 'BIOCOS WHITENING SCRUB BOOSTER INNER', 'pcs', NULL, 0, 'enabled', '2019-04-24 00:02:07', '2019-04-24 00:02:07'),
(1142, 'biocos', 'BIOCOS WHITENING SCRUB BOOSTER AMPULE', 'pcs', NULL, 0, 'enabled', '2019-04-24 00:03:45', '2019-04-24 00:03:45'),
(1143, 'biocos', 'BIOCOS WHITENING SCRUB BOOSTER UNIT BOX', 'pcs', NULL, 0, 'enabled', '2019-04-24 00:03:59', '2019-04-24 00:03:59'),
(1144, 'biocos', 'BIOCOS MUD MASK BOOSTER UNIT BOX', 'pcs', NULL, 0, 'enabled', '2019-04-24 00:04:11', '2019-04-24 00:04:11'),
(1145, 'biocos', 'BIOCOS MUD MASK BOOSTER AMPULE', 'pcs', NULL, 0, 'enabled', '2019-04-24 00:04:24', '2019-04-24 00:04:24'),
(1146, 'biocos', 'BIOCOS MUD MASK BOOSTER INNER', 'pcs', NULL, 0, 'enabled', '2019-04-24 00:04:33', '2019-04-24 00:04:33'),
(1147, 'biocos', 'BIOCOS MUD MASK BOOSTER 12 PCS BOX', 'pcs', NULL, 0, 'enabled', '2019-04-24 00:04:44', '2019-04-24 00:04:44'),
(1148, 'biocos', 'BIOCOS TRIPLE ACTION BOOSTER 12 PCS BOX', 'pcs', NULL, 0, 'enabled', '2019-04-24 00:05:15', '2019-04-24 00:05:15'),
(1149, 'biocos', 'BIOCOS TRIPLE ACTION BOOSTER INNER', 'pcs', NULL, 0, 'enabled', '2019-04-24 00:05:22', '2019-04-24 00:05:22'),
(1150, 'biocos', 'BIOCOS TRIPLE ACTION BOOSTER AMPULE', 'pcs', NULL, 0, 'enabled', '2019-04-24 00:05:32', '2019-04-24 00:05:32'),
(1151, 'biocos', 'BIOCOS TRIPLE ACTION BOOSTER UNIT BOX', 'pcs', NULL, 0, 'enabled', '2019-04-24 00:05:44', '2019-04-24 00:05:44'),
(1152, 'consume', 'FACE MASK', 'pack', NULL, 2, 'enabled', '2019-05-09 18:48:30', '2019-07-03 01:14:20'),
(1153, 'biocos', 'BIOCOS SERUM WOMAN U/B (THAILAND)', 'pcs', NULL, 0, 'enabled', '2019-05-11 22:46:30', '2019-05-11 22:46:30'),
(1154, 'biocos', 'BIOCOS SERUM WOMAN 12PCS (THAILAND)', 'pcs', NULL, 0, 'enabled', '2019-05-11 22:47:00', '2019-05-11 22:47:00'),
(1155, 'biocos', 'BIOCOS SERUM MEN U/B (THAILAND)', 'pcs', NULL, 0, 'enabled', '2019-05-11 22:47:27', '2019-05-11 22:47:27'),
(1156, 'biocos', 'BIOCOS SERUM MEN 12PCS (THAILAND)', 'pcs', NULL, 0, 'enabled', '2019-05-11 22:48:11', '2019-05-11 22:48:11'),
(1157, 'biocos', 'BIOCOS SOAP SMALL UNIT BOX (THAILAND)', 'pcs', NULL, 0, 'enabled', '2019-05-11 22:48:41', '2019-05-11 22:48:41'),
(1158, 'biocos', 'BIOCOS SERUM WOMAN U/B (DUBAI)', 'pcs', NULL, 0, 'enabled', '2019-05-11 22:49:25', '2019-05-11 22:49:25'),
(1159, 'biocos', 'BIOCOS SERUM WOMAN 12PCS (DUBAI)', 'pcs', NULL, 0, 'enabled', '2019-05-11 22:49:50', '2019-05-11 22:49:50'),
(1160, 'biocos', 'BIOCOS SOAP (DUBAI)', 'pcs', NULL, 0, 'enabled', '2019-05-11 22:50:14', '2019-05-11 22:50:14'),
(1161, 'biocos', 'BIOCOS SERUM UNIT BOX (PARLOR PACK)', 'pcs', NULL, 0, 'enabled', '2019-05-28 22:18:32', '2019-05-28 22:18:32'),
(1162, 'biocos', 'BIOCOS SERUM 12 PCS BOX (PARLOR PACK)', 'pcs', NULL, 0, 'enabled', '2019-05-28 22:19:12', '2019-05-28 22:19:12'),
(1163, 'biocos', 'BIOCOS SERUM TRAY  (PARLOR PACK)', 'pcs', NULL, 0, 'enabled', '2019-05-28 22:20:14', '2019-05-28 22:20:14'),
(1164, 'biocos', 'BIOCOS SERUM INJECTION LABEL  (PARLOR PACK)', 'pcs', NULL, 0, 'enabled', '2019-05-28 22:21:00', '2019-05-28 22:21:00'),
(1165, 'biocos', 'BIOCOS SERUM INJECTION  (PARLOR PACK)', 'pcs', NULL, 0, 'enabled', '2019-05-28 22:26:54', '2019-05-28 22:26:54'),
(1166, 'inks', 'SILVER INK', 'kg', NULL, 0, 'enabled', '2019-05-31 22:57:06', '2019-05-31 22:57:46'),
(1167, 'inks', 'GOLD INK', 'kg', NULL, 0, 'enabled', '2019-05-31 22:57:33', '2019-05-31 22:57:33'),
(1168, 'inks', 'COPPER INK', 'kg', NULL, 0, 'enabled', '2019-05-31 22:58:01', '2019-05-31 22:58:01'),
(1169, 'inks', 'TRANSPARENT WHITE (TINT)', 'kg', NULL, 0, 'enabled', '2019-05-31 22:58:33', '2019-05-31 22:58:33'),
(1170, 'inks', 'PENTON YELLOW INK', 'kg', NULL, 0, 'enabled', '2019-05-31 23:00:06', '2019-05-31 23:06:12'),
(1171, 'inks', 'PENTON MAHROON INK', 'kg', NULL, 0, 'enabled', '2019-05-31 23:04:17', '2019-05-31 23:05:57'),
(1172, 'inks', 'PENTON BLACK INK', 'kg', NULL, 0, 'enabled', '2019-05-31 23:05:22', '2019-05-31 23:05:42'),
(1173, 'inks', 'METALLIC BROWN INK', 'kg', NULL, 0, 'enabled', '2019-05-31 23:07:18', '2019-05-31 23:07:18'),
(1174, 'inks', 'PENTON GREEN INK', 'kg', NULL, 0, 'enabled', '2019-05-31 23:07:48', '2019-05-31 23:07:48'),
(1175, 'inks', 'PENTON PURPLE INK', 'kg', NULL, 0, 'enabled', '2019-05-31 23:08:30', '2019-05-31 23:08:30'),
(1176, 'inks', 'PENTON RED INK', 'kg', NULL, 0, 'enabled', '2019-05-31 23:08:51', '2019-05-31 23:08:51'),
(1177, 'inks', 'PENTON ORANGE INK', 'kg', NULL, 0, 'enabled', '2019-05-31 23:09:22', '2019-05-31 23:09:22'),
(1178, 'inks', 'PENTON BLUE INK', 'kg', NULL, 0, 'enabled', '2019-05-31 23:09:51', '2019-05-31 23:09:51'),
(1179, 'inks', 'LYFT BLUE INK', 'kg', NULL, 0, 'enabled', '2019-05-31 23:10:33', '2019-05-31 23:11:49'),
(1180, 'inks', 'LYFT PINK INK', 'kg', NULL, 0, 'enabled', '2019-05-31 23:10:54', '2019-05-31 23:12:00'),
(1181, 'inks', 'PENTON PINK INK', 'kg', NULL, 0, 'enabled', '2019-05-31 23:13:08', '2019-05-31 23:13:08'),
(1182, 'inks', 'PLAIN BROWN INK', 'kg', NULL, 0, 'enabled', '2019-05-31 23:13:57', '2019-05-31 23:13:57'),
(1183, 'inks', 'PENTON GREY INK', 'kg', NULL, 0, 'enabled', '2019-05-31 23:14:34', '2019-05-31 23:14:34'),
(1184, 'inks', 'FLORESCENT MIX COLOUR INK', 'kg', NULL, 0, 'enabled', '2019-05-31 23:21:34', '2019-05-31 23:21:34'),
(1185, 'varnish', 'PREMIER COATING (BASE PAPER COATING)', 'kg', NULL, 0, 'enabled', '2019-05-31 23:29:47', '2019-05-31 23:29:47'),
(1186, 'varnish', 'STAR FOUNT', 'kg', NULL, 0, 'enabled', '2019-05-31 23:30:22', '2019-05-31 23:30:22'),
(1187, 'consume', 'GLUE (USA)', 'kg', NULL, 0, 'enabled', '2019-05-31 23:30:42', '2019-05-31 23:30:42'),
(1188, 'varnish', 'MISC COATING', 'kg', NULL, 0, 'enabled', '2019-05-31 23:31:03', '2019-07-03 00:18:59'),
(1189, 'biocos', 'BIOCOS WHITENING URGENT FACIAL BOOSTER AMPULE', 'pcs', NULL, 0, 'enabled', '2019-06-19 20:05:09', '2019-06-19 20:05:09'),
(1190, 'biocos', 'BIOCOS WHITENING URGENT FACIAL BOOSTER UNIT BOX', 'pcs', NULL, 0, 'enabled', '2019-06-19 20:06:05', '2019-06-19 20:06:05'),
(1191, 'biocos', 'BIOCOS WHITENING URGENT FACIAL BOOSTER INNER', 'pcs', NULL, 0, 'enabled', '2019-06-19 20:06:58', '2019-06-19 20:06:58'),
(1192, 'biocos', 'BIOCOS WHITENING URGENT FACIAL BOOSTER 12 PCS BOX', 'pcs', NULL, 0, 'enabled', '2019-06-19 20:07:47', '2019-06-19 20:07:47'),
(1193, 'varnish', 'DRIP OFF VARNISH 8066', 'kg', NULL, 100, 'enabled', '2019-07-06 21:11:27', '2019-07-06 21:11:27'),
(1194, 'varnish', 'DRIPOFF YELLOWISH 6086 NEW', 'kg', NULL, 80, 'enabled', '2019-07-06 21:12:28', '2019-07-06 21:12:28'),
(1195, 'biocos', 'BIOCOS SERUM EXPORT U/B', 'pcs', NULL, 20000, 'enabled', '2019-08-08 23:37:50', '2019-08-08 23:37:50'),
(1196, 'biocos', 'BIOCOS SERUM EXPORT 12PCS BOX', 'pcs', NULL, 1670, 'enabled', '2019-08-08 23:39:41', '2019-08-08 23:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `inwards`
--

CREATE TABLE `inwards` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_qty` int(11) DEFAULT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `stock_reminder` int(11) NOT NULL DEFAULT 0,
  `inventory_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inwards`
--

INSERT INTO `inwards` (`id`, `category_item`, `item_name`, `in_qty`, `uom`, `item_id`, `stock_reminder`, `inventory_status`, `created_at`, `updated_at`) VALUES
(21, 'inks', 'CYAN (BLUE)', 0, 'kg', 1034, 80, 'enabled', '2019-03-05 15:20:16', '2019-07-03 01:25:49'),
(24, 'inks', 'WHITE', 0, 'kg', 1035, 100, 'enabled', '2019-03-05 18:16:36', '2019-07-03 01:23:40'),
(25, 'inks', 'YELLOW', 0, 'kg', 1036, 70, 'enabled', '2019-03-05 18:16:47', '2019-07-03 01:23:17'),
(26, 'inks', 'BLACK', 0, 'kg', 1037, 60, 'enabled', '2019-03-05 18:19:48', '2019-07-03 01:24:29'),
(27, 'inks', 'RED (magenta)', 0, 'kg', 1038, 70, 'enabled', '2019-03-05 18:28:35', '2019-07-03 01:24:11'),
(28, 'varnish', 'DRIP OFF VARNISH', 0, 'kg', 1039, 200, 'enabled', '2019-03-05 18:36:03', '2019-07-03 01:27:49'),
(29, 'varnish', 'UV LECQUER', 0, 'kg', 1040, 40, 'enabled', '2019-03-05 18:36:28', '2019-07-03 01:29:01'),
(30, 'consume', 'COTTON TAPE 3\"', 0, 'pcs', 1041, 50, 'enabled', '2019-03-05 18:38:41', '2019-07-03 01:27:12'),
(31, 'consume', 'DOUBLE TAPE', 0, 'pcs', 1042, 20, 'enabled', '2019-03-05 18:38:54', '2019-07-03 01:40:43'),
(32, 'consume', 'WHITE TAPE', 0, 'pcs', 1043, 0, 'enabled', '2019-03-05 18:39:02', '2019-03-05 18:40:19'),
(33, 'consume', 'ELFI', 0, 'pcs', 1044, 12, 'enabled', '2019-03-05 18:41:30', '2019-07-03 01:43:18'),
(34, 'consume', 'CHANNEL DIE /PATTI (IMPORTED)', 0, 'pack', 1045, 2, 'enabled', '2019-03-05 18:42:47', '2019-07-03 01:43:37'),
(35, 'consume', 'RUBBER BAND 25#', 0, 'pack', 1046, 0, 'enabled', '2019-03-05 18:43:27', '2019-03-05 18:43:27'),
(36, 'consume', 'RUBBER BAND 32#', 0, 'pack', 1047, 8, 'enabled', '2019-03-05 18:43:44', '2019-07-03 01:43:59'),
(37, 'consume', 'PLASTIC PARAS', 0, 'pack', 1048, 0, 'enabled', '2019-03-05 18:44:07', '2019-03-05 18:44:07'),
(38, 'consume', 'PASTING POWDER', 0, 'pcs', 1049, 8, 'enabled', '2019-03-05 18:45:37', '2019-07-03 01:51:35'),
(39, 'varnish', 'UV WASH', 0, 'liter', 1050, 15, 'enabled', '2019-03-05 19:04:58', '2019-07-03 01:30:12'),
(40, 'consume', 'CAMEL SAMAD', 0, 'kg', 1051, 0, 'enabled', '2019-03-05 19:06:07', '2019-03-05 20:41:33'),
(41, 'consume', 'ELEPHANT SAMAD BOND', 0, 'kg', 1052, 0, 'enabled', '2019-03-05 19:06:23', '2019-03-06 15:25:57'),
(42, 'consume', 'EMBOSE SHEET', 0, 'pcs', 1053, 0, 'enabled', '2019-03-05 19:06:42', '2019-03-05 19:06:42'),
(43, 'consume', 'CEMENTING SOLUTION (2 TIGER)', 0, 'kg', 1054, 0, 'enabled', '2019-03-05 19:07:02', '2019-03-05 20:40:57'),
(44, 'consume', 'GUM SOLUTION', 0, 'liter', 1055, 0, 'enabled', '2019-03-05 19:07:39', '2019-03-05 19:07:39'),
(45, 'consume', 'OXILAN UV', 0, 'kg', 1056, 20, 'enabled', '2019-03-05 19:52:19', '2019-07-03 01:20:11'),
(46, 'consume', 'LEMINATION SHEET', 0, 'bundle', 1057, 1, 'enabled', '2019-03-05 19:52:56', '2019-07-03 01:19:56'),
(47, 'consume', 'PLATE CLEANER', 0, 'liter', 1058, 3, 'enabled', '2019-03-05 19:54:12', '2019-07-03 01:19:32'),
(48, 'consume', 'PRINTED BLANKIT', 0, 'pcs', 1059, 3, 'enabled', '2019-03-05 19:59:31', '2019-07-03 01:19:15'),
(49, 'consume', 'UV BLANKIT', 0, 'pcs', 1060, 3, 'enabled', '2019-03-05 20:00:24', '2019-07-03 01:18:59'),
(50, 'consume', 'CHANNEL DIE /PATTI ( LOCAL )', 0, 'pack', 1061, 2, 'enabled', '2019-03-05 20:02:41', '2019-07-03 01:18:37'),
(51, 'consume', 'ELEPHANT SAMAD BOND', 2, 'kg', 1052, 0, 'enabled', '2019-03-05 20:35:10', '2019-03-06 15:25:57'),
(52, 'consume', 'ELEPHANT SAMAD BOND', 5, 'kg', 1052, 0, 'enabled', '2019-03-05 20:45:55', '2019-03-06 15:25:57'),
(53, 'varnish', 'DRIP OFF VARNISH', 20, 'kg', 1039, 200, 'enabled', '2019-03-05 20:49:16', '2019-07-03 01:27:49'),
(54, 'inks', 'WHITE', 133, 'kg', 1035, 100, 'enabled', '2019-03-06 15:14:32', '2019-07-03 01:23:40'),
(55, 'inks', 'YELLOW', 26, 'kg', 1036, 70, 'enabled', '2019-03-06 15:14:53', '2019-07-03 01:23:17'),
(56, 'inks', 'CYAN (BLUE)', 69, 'kg', 1034, 80, 'enabled', '2019-03-06 15:15:11', '2019-07-03 01:25:49'),
(57, 'inks', 'BLACK', 77, 'kg', 1037, 60, 'enabled', '2019-03-06 15:15:25', '2019-07-03 01:24:29'),
(58, 'inks', 'RED (magenta)', 61, 'kg', 1038, 70, 'enabled', '2019-03-06 15:15:41', '2019-07-03 01:24:11'),
(59, 'varnish', 'DRIP OFF VARNISH', 20, 'kg', 1039, 200, 'enabled', '2019-03-06 15:16:14', '2019-07-03 01:27:49'),
(60, 'varnish', 'UV LECQUER', 25, 'kg', 1040, 40, 'enabled', '2019-03-06 15:20:42', '2019-07-03 01:29:01'),
(61, 'consume', 'COTTON TAPE 3\"', 37, 'pcs', 1041, 50, 'enabled', '2019-03-06 15:21:07', '2019-07-03 01:27:12'),
(62, 'consume', 'DOUBLE TAPE', 11, 'pcs', 1042, 20, 'enabled', '2019-03-06 15:21:22', '2019-07-03 01:40:43'),
(63, 'consume', 'WHITE TAPE', 60, 'pcs', 1043, 0, 'enabled', '2019-03-06 15:21:42', '2019-03-06 15:21:42'),
(64, 'consume', 'ELFI', 24, 'pcs', 1044, 12, 'enabled', '2019-03-06 15:21:58', '2019-07-03 01:43:18'),
(65, 'consume', 'CHANNEL DIE /PATTI (IMPORTED)', 2, 'pack', 1045, 2, 'enabled', '2019-03-06 15:22:18', '2019-07-03 01:43:37'),
(66, 'consume', 'RUBBER BAND 25#', 5, 'pack', 1046, 0, 'enabled', '2019-03-06 15:23:07', '2019-03-06 15:23:07'),
(67, 'consume', 'RUBBER BAND 32#', 4, 'pack', 1047, 8, 'enabled', '2019-03-06 15:23:43', '2019-07-03 01:43:59'),
(68, 'consume', 'PLASTIC PARAS', 4, 'pack', 1048, 0, 'enabled', '2019-03-06 15:23:59', '2019-03-06 15:23:59'),
(69, 'consume', 'PASTING POWDER', 7, 'pcs', 1049, 8, 'enabled', '2019-03-06 15:24:18', '2019-07-03 01:51:35'),
(70, 'varnish', 'UV WASH', 16, 'liter', 1050, 15, 'enabled', '2019-03-06 15:24:41', '2019-07-03 01:30:12'),
(71, 'consume', 'GUM SOLUTION', 3, 'liter', 1055, 0, 'enabled', '2019-03-06 15:26:44', '2019-03-06 15:26:44'),
(72, 'consume', 'OXILAN UV', 20, 'kg', 1056, 20, 'enabled', '2019-03-06 15:27:01', '2019-07-03 01:20:11'),
(73, 'consume', 'LEMINATION SHEET', 3, 'bundle', 1057, 1, 'enabled', '2019-03-06 15:28:27', '2019-07-03 01:19:56'),
(74, 'consume', 'PRINTED BLANKIT', 3, 'pcs', 1059, 3, 'enabled', '2019-03-06 15:29:12', '2019-07-03 01:19:15'),
(75, 'consume', 'UV BLANKIT', 6, 'pcs', 1060, 3, 'enabled', '2019-03-06 15:29:27', '2019-07-03 01:18:59'),
(76, 'consume', 'PLATE CLEANER', 10, 'liter', 1058, 3, 'enabled', '2019-03-06 15:58:55', '2019-07-03 01:19:32'),
(77, 'consume', 'EMBOSE SHEET', 4, 'pcs', 1053, 0, 'enabled', '2019-03-06 16:02:13', '2019-03-06 16:02:13'),
(78, 'varnish', 'DRIP OF MAT UV WARNISH', 0, 'kg', 1062, 0, 'enabled', '2019-03-07 16:05:13', '2019-03-07 16:05:13'),
(79, 'varnish', 'DRIP OF MAT UV WARNISH', 2, 'kg', 1062, 0, 'enabled', '2019-03-07 16:05:41', '2019-03-07 16:05:41'),
(80, 'consume', 'CAMEL SAMAD', 5, 'kg', 1051, 0, 'enabled', '2019-03-07 19:29:56', '2019-03-07 19:29:56'),
(81, 'consume', 'CHANNEL DIE /PATTI ( LOCAL )', 2, 'pack', 1061, 2, 'enabled', '2019-03-08 14:26:34', '2019-07-03 01:18:37'),
(82, 'inks', 'YELLOW', 1, 'kg', 1036, 70, 'enabled', '2019-03-08 19:00:33', '2019-07-03 01:23:17'),
(83, 'consume', 'PLATE CLEANER', 1, 'liter', 1058, 3, 'enabled', '2019-03-08 19:05:02', '2019-07-03 01:19:32'),
(84, 'varnish', 'DRIP OFF VARNISH', 25, 'kg', 1039, 200, 'enabled', '2019-03-09 13:14:56', '2019-07-03 01:27:49'),
(85, 'consume', 'RUBBER BAND 32#', 12, 'pack', 1047, 8, 'enabled', '2019-03-09 13:38:58', '2019-07-03 01:43:59'),
(86, 'consume', 'PLASTIC PARAS', 2, 'pack', 1048, 0, 'enabled', '2019-03-09 19:09:54', '2019-03-09 19:09:54'),
(87, 'consume', 'IPA', 0, 'kg', 1063, 100, 'enabled', '2019-03-11 20:34:50', '2019-07-03 01:18:11'),
(88, 'consume', 'IPA', 160, 'kg', 1063, 100, 'enabled', '2019-03-11 20:35:14', '2019-07-03 01:18:11'),
(89, 'consume', 'OFF SET PAPER RIM (100 GRM)', 0, 'bundle', 1064, 1, 'enabled', '2019-03-11 20:36:12', '2019-07-03 01:41:26'),
(90, 'consume', 'OFF SET PAPER RIM (100 GRM)', 1, 'bundle', 1064, 1, 'enabled', '2019-03-11 20:36:29', '2019-07-03 01:41:26'),
(91, 'consume', 'RUBBER BAND 25#', 1, 'pack', 1046, 0, 'enabled', '2019-03-12 14:24:21', '2019-03-12 14:24:21'),
(92, 'consume', 'COTTON RUGS', 0, 'kg', 1065, 25, 'enabled', '2019-03-13 13:54:40', '2019-07-03 01:17:55'),
(93, 'consume', 'COTTON RUGS', 100, 'kg', 1065, 25, 'enabled', '2019-03-13 13:54:59', '2019-07-03 01:17:55'),
(94, 'consume', 'STRAPPING ROLL', 0, 'bundle', 1066, 2, 'enabled', '2019-03-13 22:16:02', '2019-07-03 01:17:30'),
(95, 'consume', 'STRAPPING ROLL', 2, 'bundle', 1066, 2, 'enabled', '2019-03-13 22:16:26', '2019-07-03 01:17:30'),
(96, 'consume', 'PLASTIC PARAS', 12, 'pack', 1048, 0, 'enabled', '2019-03-13 22:17:31', '2019-03-13 22:17:31'),
(97, 'consume', 'COTTON SHOPPER', 0, 'kg', 1067, 20, 'enabled', '2019-03-13 22:19:10', '2019-07-03 01:17:07'),
(98, 'consume', 'COTTON SHOPPER', 6, 'kg', 1067, 20, 'enabled', '2019-03-13 22:19:33', '2019-07-03 01:17:07'),
(99, 'consume', 'PASTING POWDER', 8, 'pcs', 1049, 8, 'enabled', '2019-03-14 20:06:12', '2019-07-03 01:51:35'),
(100, 'consume', 'CLEAN FIX-UV', 0, 'kg', 1068, 0, 'enabled', '2019-03-14 20:18:32', '2019-03-14 20:18:32'),
(101, 'consume', 'ANTIFOAM', 0, 'liter', 1069, 0, 'enabled', '2019-03-14 20:19:18', '2019-03-14 20:19:18'),
(102, 'consume', 'CLEAN FIX-UV', 3, 'kg', 1068, 0, 'enabled', '2019-03-14 20:20:27', '2019-03-14 20:20:27'),
(103, 'consume', 'ANTIFOAM', 5, 'liter', 1069, 0, 'enabled', '2019-03-14 20:20:39', '2019-03-14 20:20:39'),
(104, 'varnish', 'UV TEMP OFFSET TINT MIDUM', 0, 'kg', 1070, 0, 'enabled', '2019-03-15 02:33:39', '2019-03-15 02:33:39'),
(105, 'varnish', 'UV TEMP OFFSET TINT MIDUM', 1, 'kg', 1070, 0, 'enabled', '2019-03-15 02:34:30', '2019-03-15 02:34:30'),
(106, 'varnish', 'UV LECQUER', 50, 'kg', 1040, 40, 'enabled', '2019-03-15 02:34:30', '2019-07-03 01:29:01'),
(107, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-03-15 02:34:30', '2019-03-15 02:34:30'),
(108, 'varnish', 'DRIP OFF VARNISH', 25, 'kg', 1039, 200, 'enabled', '2019-03-19 01:20:52', '2019-07-03 01:27:49'),
(109, 'varnish', 'DRIP OF PREMIER', 0, 'kg', 1071, 0, 'enabled', '2019-03-19 01:21:34', '2019-03-19 01:21:34'),
(110, 'varnish', 'DRIP OF PREMIER', 3, 'kg', 1071, 0, 'enabled', '2019-03-19 01:21:58', '2019-03-19 01:21:58'),
(111, 'varnish', 'DRIP OFF VARNISH', 25, 'kg', 1039, 200, 'enabled', '2019-03-21 00:11:08', '2019-07-03 01:27:49'),
(112, 'varnish', 'DRIP OF PREMIER', 2, 'kg', 1071, 0, 'enabled', '2019-03-21 00:11:45', '2019-03-21 00:11:45'),
(113, 'consume', 'RUBBER BAND 32#', 2, 'pack', 1047, 8, 'enabled', '2019-03-21 01:20:06', '2019-07-03 01:43:59'),
(114, 'varnish', 'UV WASH', 12, 'liter', 1050, 15, 'enabled', '2019-03-21 18:02:15', '2019-07-03 01:30:12'),
(115, 'consume', 'COTTON TAPE 3\"', 72, 'pcs', 1041, 50, 'enabled', '2019-03-21 18:02:42', '2019-07-03 01:27:12'),
(116, 'consume', 'RUBBER BAND 32#', 12, 'pack', 1047, 8, 'enabled', '2019-03-21 18:02:59', '2019-07-03 01:43:59'),
(117, 'consume', 'STRAPPING ROLL', 1, 'bundle', 1066, 2, 'enabled', '2019-03-21 18:04:01', '2019-07-03 01:17:30'),
(118, 'inks', 'RED (magenta)', 1, 'kg', 1038, 70, 'enabled', '2019-03-21 21:21:35', '2019-07-03 01:24:11'),
(119, 'consume', 'PRINTED BLANKIT', 3, 'pcs', 1059, 3, 'enabled', '2019-03-21 21:26:25', '2019-07-03 01:19:15'),
(120, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-03-22 17:30:36', '2019-03-22 17:30:36'),
(121, 'biocos', 'BIOCOS SERUM CAP WITH PLUG', 0, 'pcs', 1072, 600000, 'enabled', '2019-03-23 09:36:26', '2019-07-03 01:35:56'),
(123, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 0, 'pcs', 1073, 120000, 'enabled', '2019-03-23 09:44:12', '2019-07-03 01:35:15'),
(124, 'biocos', 'BIOCOS SERUM UNIT BOX', 0, 'pcs', 1074, 240000, 'enabled', '2019-03-23 09:44:34', '2019-07-03 01:33:49'),
(125, 'biocos', 'BIOCOS SERUM 12 PCS BOX', 0, 'pcs', 1075, 200, 'enabled', '2019-03-23 09:44:51', '2019-07-03 01:33:11'),
(126, 'biocos', 'BIOCOS SERUM VIAL LABEL', 0, 'pcs', 1076, 1000000, 'enabled', '2019-03-23 09:45:09', '2019-07-03 01:32:11'),
(127, 'biocos', 'BIOCOS SOAP LARGE UNIT BOX', 0, 'pcs', 1077, 16800, 'enabled', '2019-03-23 09:45:28', '2019-07-03 01:30:59'),
(128, 'biocos', 'BIOCOS SOAP SMALL UNIT BOX', 0, 'pcs', 1078, 21600, 'enabled', '2019-03-23 09:45:45', '2019-10-10 19:56:54'),
(129, 'biocos', 'BIOCOS NEEM SOAP UNIT BOX', 0, 'pcs', 1079, 14400, 'enabled', '2019-03-23 09:46:04', '2019-07-03 01:28:44'),
(130, 'biocos', 'BIOCOS HAIR REGROWTH UNIT BOX', 0, 'pcs', 1080, 0, 'enabled', '2019-03-23 09:46:37', '2019-03-23 09:46:37'),
(131, 'biocos', 'BIOCOS HAIR REGROWTH AMPULE', 0, 'pcs', 1081, 0, 'enabled', '2019-03-23 09:47:00', '2019-03-23 09:47:00'),
(132, 'biocos', 'BIOCOS AGE REVERSAL UNIT BOX', 0, 'pcs', 1082, 0, 'enabled', '2019-03-23 09:47:17', '2019-03-23 09:47:17'),
(133, 'biocos', 'BIOCOS AGE REVERSAL AMPULE', 0, 'pcs', 1083, 0, 'enabled', '2019-03-23 09:47:37', '2019-03-23 09:47:37'),
(134, 'biocos', 'BIOCOS PIMPLE CLEAR UNIT BOX', 0, 'pcs', 1084, 0, 'enabled', '2019-03-23 09:47:51', '2019-03-23 09:47:51'),
(135, 'biocos', 'BIOCOS PIMPLE CLEAR AMPULE', 0, 'pcs', 1085, 0, 'enabled', '2019-03-23 09:48:06', '2019-03-23 09:48:06'),
(136, 'biocos', 'BIOCOS PIMPLE CLEAR AMPULE', 0, 'pcs', 1085, 0, 'enabled', '2019-03-23 10:38:23', '2019-03-23 10:38:23'),
(137, 'biocos', 'BIOCOS HAIR REGROWTH 24 PCS BOX', 0, 'pcs', 1086, 0, 'enabled', '2019-03-23 12:09:39', '2019-03-23 12:09:39'),
(138, 'biocos', 'BIOCOS PIMPLE CLEAR 24 PCS BOX', 0, 'pcs', 1087, 0, 'enabled', '2019-03-23 12:11:26', '2019-03-23 12:11:26'),
(139, 'biocos', 'BIOCOS AGE REVERSAL 24 PCS BOX', 0, 'pcs', 1088, 0, 'enabled', '2019-03-23 12:12:03', '2019-03-23 12:12:03'),
(140, 'consume', 'IPA', 160, 'kg', 1063, 100, 'enabled', '2019-03-26 18:43:40', '2019-07-03 01:18:11'),
(141, 'varnish', 'UV LECQUER', 75, 'kg', 1040, 40, 'enabled', '2019-03-26 21:21:26', '2019-07-03 01:29:01'),
(142, 'varnish', 'UV WASH', 12, 'liter', 1050, 15, 'enabled', '2019-03-26 21:21:26', '2019-07-03 01:30:12'),
(143, 'varnish', 'DRIP OF PREMIER', 3, 'kg', 1071, 0, 'enabled', '2019-03-27 02:16:18', '2019-03-27 02:16:18'),
(144, 'varnish', 'DRIP OFF VARNISH', 25, 'kg', 1039, 200, 'enabled', '2019-03-27 02:16:18', '2019-07-03 01:27:49'),
(145, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 30937, 'pcs', 1073, 120000, 'enabled', '2019-03-27 02:18:53', '2019-07-03 01:35:15'),
(146, 'biocos', 'BIOCOS SERUM VIAL LABEL', 30937, 'pcs', 1076, 1000000, 'enabled', '2019-03-27 02:18:53', '2019-07-03 01:32:11'),
(147, 'biocos', 'BIOCOS SERUM CAP WITH PLUG', 30937, 'pcs', 1072, 600000, 'enabled', '2019-03-27 02:18:53', '2019-07-03 01:35:56'),
(148, 'biocos', 'BIOCOS SERUM UNIT BOX', 112000, 'pcs', 1074, 240000, 'enabled', '2019-03-27 02:18:53', '2019-07-03 01:33:49'),
(149, 'biocos', 'BIOCOS SERUM VIAL LABEL', 89457, 'pcs', 1076, 1000000, 'enabled', '2019-03-27 02:33:41', '2019-07-03 01:32:11'),
(150, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 63742, 'pcs', 1073, 120000, 'enabled', '2019-03-27 02:33:41', '2019-07-03 01:35:15'),
(151, 'biocos', 'BIOCOS SERUM CAP WITH PLUG', 72200, 'pcs', 1072, 600000, 'enabled', '2019-03-27 02:33:41', '2019-07-03 01:35:56'),
(152, 'consume', 'PASTING POWDER', 8, 'pcs', 1049, 8, 'enabled', '2019-03-27 02:38:15', '2019-07-03 01:51:35'),
(153, 'biocos', 'BIOCOS SERUM CAP WITH PLUG', 860000, 'pcs', 1072, 600000, 'enabled', '2019-03-27 02:41:38', '2019-07-03 01:35:56'),
(154, 'biocos', 'BIOCOS SERUM 12 PCS BOX', 20550, 'pcs', 1075, 200, 'enabled', '2019-03-27 02:41:38', '2019-07-03 01:33:11'),
(155, 'biocos', 'BIOCOS SERUM VIAL LABEL', 2125300, 'pcs', 1076, 1000000, 'enabled', '2019-03-27 02:41:38', '2019-07-03 01:32:11'),
(156, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 28000, 'pcs', 1073, 120000, 'enabled', '2019-03-27 02:41:38', '2019-07-03 01:35:15'),
(157, 'biocos', 'BIOCOS HAIR REGROWTH AMPULE', 7000, 'pcs', 1081, 0, 'enabled', '2019-03-27 02:41:38', '2019-03-27 02:41:38'),
(158, 'biocos', 'BIOCOS NEEM SOAP UNIT BOX', 740, 'pcs', 1079, 14400, 'enabled', '2019-03-27 02:41:38', '2019-07-03 01:28:44'),
(159, 'biocos', 'BIOCOS SOAP LARGE UNIT BOX', 1974, 'pcs', 1077, 16800, 'enabled', '2019-03-27 02:41:38', '2019-07-03 01:30:59'),
(160, 'biocos', 'BIOCOS SOAP SMALL UNIT BOX', 34488, 'pcs', 1078, 21600, 'enabled', '2019-03-27 02:41:38', '2019-10-10 19:56:54'),
(161, 'biocos', 'BIOCOS HAIR REGROWTH AMPULE', 18546, 'pcs', 1081, 0, 'enabled', '2019-03-27 02:46:55', '2019-03-27 02:46:55'),
(162, 'biocos', 'BIOCOS PIMPLE CLEAR AMPULE', 21198, 'pcs', 1085, 0, 'enabled', '2019-03-27 02:46:55', '2019-03-27 02:46:55'),
(163, 'biocos', 'BIOCOS AGE REVERSAL AMPULE', 22620, 'pcs', 1083, 0, 'enabled', '2019-03-27 02:46:55', '2019-03-27 02:46:55'),
(164, 'biocos', 'BIOCOS SERUM CAP WITH PLUG', 245400, 'pcs', 1072, 600000, 'enabled', '2019-03-27 02:50:44', '2019-07-03 01:35:56'),
(165, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 248400, 'pcs', 1073, 120000, 'enabled', '2019-03-27 02:50:44', '2019-07-03 01:35:15'),
(166, 'biocos', 'BIOCOS SERUM UNIT BOX', 248400, 'pcs', 1074, 240000, 'enabled', '2019-03-27 02:50:44', '2019-07-03 01:33:49'),
(167, 'biocos', 'BIOCOS SERUM 12 PCS BOX', 20700, 'pcs', 1075, 200, 'enabled', '2019-03-27 02:50:44', '2019-07-03 01:33:11'),
(168, 'biocos', 'BIOCOS SERUM VIAL LABEL', 248400, 'pcs', 1076, 1000000, 'enabled', '2019-03-27 02:50:44', '2019-07-03 01:32:11'),
(169, 'biocos', 'BIOCOS SOAP LARGE UNIT BOX', 720, 'pcs', 1077, 16800, 'enabled', '2019-03-27 03:00:20', '2019-07-03 01:30:59'),
(170, 'biocos', 'BIOCOS NEEM SOAP UNIT BOX', 2940, 'pcs', 1079, 14400, 'enabled', '2019-03-27 03:00:20', '2019-07-03 01:28:44'),
(171, 'biocos', 'BIOCOS SOAP SMALL UNIT BOX', 11256, 'pcs', 1078, 21600, 'enabled', '2019-03-27 03:00:20', '2019-10-10 19:56:54'),
(172, 'biocos', 'BIOCOS AGE REVERSAL UNIT BOX', 936, 'pcs', 1082, 0, 'enabled', '2019-03-27 03:00:20', '2019-03-27 03:00:20'),
(173, 'biocos', 'BIOCOS AGE REVERSAL AMPULE', 936, 'pcs', 1083, 0, 'enabled', '2019-03-27 03:00:20', '2019-03-27 03:00:20'),
(174, 'biocos', 'BIOCOS AGE REVERSAL 24 PCS BOX', 672, 'pcs', 1088, 0, 'enabled', '2019-03-27 03:00:20', '2019-04-05 22:10:48'),
(175, 'biocos', 'BIOCOS PIMPLE CLEAR 24 PCS BOX', 129, 'pcs', 1087, 0, 'enabled', '2019-03-27 03:00:20', '2019-04-05 22:13:47'),
(176, 'biocos', 'BIOCOS PIMPLE CLEAR UNIT BOX', 336, 'pcs', 1084, 0, 'enabled', '2019-03-27 03:00:20', '2019-03-27 03:00:20'),
(177, 'biocos', 'BIOCOS PIMPLE CLEAR AMPULE', 336, 'pcs', 1085, 0, 'enabled', '2019-03-27 03:00:20', '2019-03-27 03:00:20'),
(178, 'biocos', 'BIOCOS HAIR REGROWTH UNIT BOX', 8000, 'pcs', 1080, 0, 'enabled', '2019-03-27 03:00:20', '2019-03-27 03:00:20'),
(179, 'biocos', 'BIOCOS HAIR REGROWTH 24 PCS BOX', 920, 'pcs', 1086, 0, 'enabled', '2019-03-27 03:00:20', '2019-04-05 22:14:34'),
(180, 'consume', 'CHANNEL DIE /PATTI ( LOCAL )', 2, 'pack', 1061, 2, 'enabled', '2019-03-27 19:09:19', '2019-07-03 01:18:37'),
(181, 'biocos', 'Test 1.1', 0, 'pcs', 1089, 0, 'enabled', '2019-03-27 19:34:13', '2019-03-27 19:34:13'),
(182, 'biocos', 'Test 1.2', 0, 'pcs', 1090, 0, 'enabled', '2019-03-27 19:34:44', '2019-03-27 19:34:44'),
(183, 'biocos', 'Test 1.3', 0, 'pcs', 1091, 0, 'enabled', '2019-03-27 19:35:11', '2019-03-27 19:35:11'),
(184, 'biocos', 'Test 2.1', 0, 'pcs', 1092, 0, 'enabled', '2019-03-27 19:35:47', '2019-03-27 19:35:47'),
(185, 'biocos', 'Test 2.2', 0, 'pcs', 1093, 0, 'enabled', '2019-03-27 19:36:15', '2019-03-27 19:36:15'),
(186, 'biocos', 'Test 2.3', 0, 'pcs', 1094, 0, 'enabled', '2019-03-27 19:36:43', '2019-03-27 19:36:43'),
(187, 'biocos', 'Test 3.1', 0, 'pcs', 1095, 0, 'enabled', '2019-03-27 19:37:15', '2019-03-27 19:37:15'),
(188, 'biocos', 'Test 3.2', 0, 'pcs', 1096, 0, 'enabled', '2019-03-27 19:38:56', '2019-03-27 19:38:56'),
(189, 'biocos', 'Test 3.3', 0, 'pcs', 1097, 0, 'enabled', '2019-03-27 19:39:19', '2019-03-27 19:39:19'),
(199, 'biocos', 'BIOCOS MEN SERUM CAP WITH PLUG', 0, 'pcs', 1098, 120000, 'enabled', '2019-03-27 21:14:58', '2019-07-03 01:28:08'),
(200, 'biocos', 'BIOCOS MEN SERUM UNIT BOX', 0, 'pcs', 1099, 0, 'enabled', '2019-03-27 21:15:42', '2019-03-27 21:15:42'),
(201, 'biocos', 'BIOCOS MEN SERUM VIAL LABEL', 0, 'pcs', 1100, 0, 'enabled', '2019-03-27 21:16:28', '2019-03-27 21:16:28'),
(202, 'biocos', 'BIOCOS MEN SERUM 12 PCS BOX', 0, 'pcs', 1101, 0, 'enabled', '2019-03-27 21:18:17', '2019-03-27 21:18:17'),
(203, 'biocos', 'BIOCOS MEN SERUM CAP WITH PLUG', 19200, 'pcs', 1098, 120000, 'enabled', '2019-03-27 21:23:15', '2019-07-03 01:28:08'),
(204, 'biocos', 'BIOCOS MEN SERUM UNIT BOX', 19200, 'pcs', 1099, 0, 'enabled', '2019-03-27 21:23:15', '2019-03-27 21:23:15'),
(205, 'biocos', 'BIOCOS MEN SERUM VIAL LABEL', 19200, 'pcs', 1100, 0, 'enabled', '2019-03-27 21:23:15', '2019-03-27 21:23:15'),
(206, 'biocos', 'BIOCOS MEN SERUM 12 PCS BOX', 1600, 'pcs', 1101, 0, 'enabled', '2019-03-27 21:23:15', '2019-03-27 21:23:15'),
(207, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 19200, 'pcs', 1073, 120000, 'enabled', '2019-03-27 21:23:15', '2019-07-03 01:35:15'),
(208, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-03-28 01:45:33', '2019-03-28 01:45:33'),
(209, 'varnish', 'DRIP OFF VARNISH', 25, 'kg', 1039, 200, 'enabled', '2019-03-28 01:50:31', '2019-07-03 01:27:49'),
(210, 'consume', 'OFF SET PAPER RIM (100 GRM)', 2, 'bundle', 1064, 1, 'enabled', '2019-03-29 17:06:22', '2019-07-03 01:41:26'),
(211, 'consume', 'CARBAN PAPER', 0, 'pack', 1102, 2, 'enabled', '2019-03-29 17:07:08', '2019-07-03 01:16:29'),
(212, 'consume', 'CARBAN PAPER', 4, 'pack', 1102, 2, 'enabled', '2019-03-29 17:07:32', '2019-07-03 01:16:29'),
(213, 'biocos', 'BIOCOS SOAP LARGE UNIT BOX', 648, 'pcs', 1077, 16800, 'enabled', '2019-03-30 03:47:54', '2019-07-03 01:30:59'),
(214, 'biocos', 'BIOCOS SERUM UNIT BOX', 137000, 'pcs', 1074, 240000, 'enabled', '2019-03-30 03:51:25', '2019-07-03 01:33:49'),
(215, 'biocos', 'BIOCOS MEN SERUM 12 PCS BOX', 7500, 'pcs', 1101, 0, 'enabled', '2019-04-05 21:58:59', '2019-04-05 21:58:59'),
(216, 'biocos', 'BIOCOS MEN SERUM VIAL LABEL', 240600, 'pcs', 1100, 0, 'enabled', '2019-04-05 21:59:44', '2019-04-05 21:59:44'),
(217, 'biocos', 'BIOCOS MEN SERUM UNIT BOX', 78000, 'pcs', 1099, 0, 'enabled', '2019-04-05 22:01:48', '2019-04-05 22:01:48'),
(218, 'biocos', 'BIOCOS MEN SERUM CAP WITH PLUG', 13000, 'pcs', 1098, 120000, 'enabled', '2019-04-05 22:02:41', '2019-07-03 01:28:08'),
(219, 'biocos', 'BIOCOS HAIR REGROWTH UNIT BOX', 3500, 'pcs', 1080, 0, 'enabled', '2019-04-05 22:16:38', '2019-04-05 22:16:38'),
(220, 'biocos', 'BIOCOS NEEM SOAP UNIT BOX', 231, 'pcs', 1079, 14400, 'enabled', '2019-04-05 22:26:22', '2019-07-03 01:28:44'),
(221, 'biocos', 'BIOCOS SOAP SMALL UNIT BOX', 2560, 'pcs', 1078, 21600, 'enabled', '2019-04-05 22:26:22', '2019-10-10 19:56:54'),
(222, 'biocos', 'BIOCOS SOAP LARGE UNIT BOX', 1178, 'pcs', 1077, 16800, 'enabled', '2019-04-05 22:26:22', '2019-07-03 01:30:59'),
(223, 'biocos', 'BIOCOS SERUM 12 PCS BOX', 19400, 'pcs', 1075, 200, 'enabled', '2019-04-05 22:26:22', '2019-07-03 01:33:11'),
(224, 'biocos', 'BIOCOS SERUM UNIT BOX', 115500, 'pcs', 1074, 240000, 'enabled', '2019-04-05 22:26:22', '2019-07-03 01:33:49'),
(225, 'biocos', 'BIOCOS HAIR REGROWTH AMPULE', 16240, 'pcs', 1081, 0, 'enabled', '2019-04-05 22:26:22', '2019-04-05 22:26:22'),
(226, 'biocos', 'BIOCOS PIMPLE CLEAR AMPULE', 27500, 'pcs', 1085, 0, 'enabled', '2019-04-05 22:26:22', '2019-04-05 22:26:22'),
(227, 'consume', 'CHANNEL DIE /PATTI ( LOCAL )', 2, 'pack', 1061, 2, 'enabled', '2019-04-06 20:17:49', '2019-07-03 01:18:37'),
(228, 'consume', 'RUBBER BAND 32#', 12, 'pack', 1047, 8, 'enabled', '2019-04-06 20:35:41', '2019-07-03 01:43:59'),
(229, 'consume', 'RUBBER BAND 25#', 4, 'pack', 1046, 0, 'enabled', '2019-04-06 20:35:57', '2019-04-06 20:35:57'),
(230, 'consume', 'COTTON SHOPPER', 3, 'kg', 1067, 20, 'enabled', '2019-04-06 20:37:13', '2019-07-03 01:17:07'),
(231, 'varnish', 'UV CHEMELEON', 0, 'liter', 1103, 0, 'enabled', '2019-04-06 20:42:43', '2019-04-06 20:42:43'),
(232, 'varnish', 'UV CHEMELEON', 120, 'liter', 1103, 0, 'enabled', '2019-04-06 20:43:37', '2019-04-06 20:43:37'),
(233, 'inks', 'DRIPOFF YELLOWISH', 0, 'kg', 1104, 70, 'enabled', '2019-04-06 20:44:55', '2019-07-03 01:16:01'),
(234, 'varnish', 'DRIP OFF VARNISH', 300, 'kg', 1039, 200, 'enabled', '2019-04-06 20:51:30', '2019-07-03 01:27:49'),
(235, 'inks', 'WHITE', 72, 'kg', 1035, 100, 'enabled', '2019-04-06 20:51:47', '2019-07-03 01:23:40'),
(236, 'inks', 'RED (magenta)', 36, 'kg', 1038, 70, 'enabled', '2019-04-06 20:52:10', '2019-07-03 01:24:11'),
(237, 'inks', 'CYAN (BLUE)', 24, 'kg', 1034, 80, 'enabled', '2019-04-06 20:52:28', '2019-07-03 01:25:49'),
(238, 'inks', 'YELLOW', 36, 'kg', 1036, 70, 'enabled', '2019-04-06 20:52:46', '2019-07-03 01:23:17'),
(239, 'inks', 'BLACK', 24, 'kg', 1037, 60, 'enabled', '2019-04-06 20:53:03', '2019-07-03 01:24:29'),
(240, 'inks', 'DRIPOFF YELLOWISH', 60, 'kg', 1104, 70, 'enabled', '2019-04-06 20:53:30', '2019-07-03 01:16:01'),
(241, 'consume', 'PASTING POWDER', 8, 'pcs', 1049, 8, 'enabled', '2019-04-09 19:08:01', '2019-07-03 01:51:35'),
(242, 'biocos', 'vail 2ml', 0, 'pcs', 1105, 0, 'enabled', '2019-04-09 20:04:16', '2019-04-09 20:04:16'),
(243, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 153746, 'pcs', 1073, 120000, 'enabled', '2019-04-09 20:09:02', '2019-07-03 01:35:15'),
(244, 'consume', 'EMBOSE SHEET', 12, 'pcs', 1053, 0, 'enabled', '2019-04-09 20:58:42', '2019-04-09 20:58:42'),
(245, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-04-09 21:42:25', '2019-04-09 21:42:25'),
(246, 'inks', 'UV FLEXO INK YELLOW', 0, 'kg', 1106, 0, 'enabled', '2019-04-10 18:18:51', '2019-04-10 19:10:35'),
(247, 'inks', 'UV FLEXO INK WHITE', 0, 'kg', 1107, 0, 'enabled', '2019-04-10 18:20:14', '2019-04-10 19:09:40'),
(248, 'inks', 'UV FLEXO INK RED', 0, 'kg', 1108, 0, 'enabled', '2019-04-10 18:21:29', '2019-04-10 19:09:04'),
(249, 'inks', 'UV FLEXO INK BLACK', 0, 'kg', 1109, 0, 'enabled', '2019-04-10 18:22:19', '2019-04-10 19:08:18'),
(250, 'inks', 'UV FLEXO INK BLUE', 0, 'kg', 1110, 0, 'enabled', '2019-04-10 18:23:34', '2019-04-10 19:07:44'),
(251, 'inks', 'UV FLEXO INK YELLOW', 10, 'kg', 1106, 0, 'enabled', '2019-04-10 19:11:55', '2019-04-10 19:11:55'),
(252, 'inks', 'UV FLEXO INK WHITE', 10, 'kg', 1107, 0, 'enabled', '2019-04-10 19:12:26', '2019-04-10 19:12:26'),
(253, 'inks', 'UV FLEXO INK RED', 10, 'kg', 1108, 0, 'enabled', '2019-04-10 19:12:47', '2019-04-10 19:12:47'),
(254, 'inks', 'UV FLEXO INK BLACK', 10, 'kg', 1109, 0, 'enabled', '2019-04-10 19:13:12', '2019-04-10 19:13:12'),
(255, 'inks', 'UV FLEXO INK BLUE', 10, 'kg', 1110, 0, 'enabled', '2019-04-10 19:13:33', '2019-04-10 19:13:33'),
(256, 'inks', 'DRIPOFF YELLOWISH', 48, 'kg', 1104, 70, 'enabled', '2019-04-10 19:14:01', '2019-07-03 01:16:01'),
(257, 'varnish', 'UV WASH', 12, 'liter', 1050, 15, 'enabled', '2019-04-16 18:24:28', '2019-07-03 01:30:12'),
(258, 'consume', 'COTTON RUGS', 100, 'kg', 1065, 25, 'enabled', '2019-04-16 18:24:44', '2019-07-03 01:17:55'),
(259, 'consume', 'STRAPPING ROLL', 1, 'bundle', 1066, 2, 'enabled', '2019-04-17 20:20:04', '2019-07-03 01:17:30'),
(260, 'consume', 'ELFI', 12, 'pcs', 1044, 12, 'enabled', '2019-04-17 20:20:56', '2019-07-03 01:43:18'),
(261, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-04-17 20:22:27', '2019-04-17 20:22:27'),
(262, 'consume', 'CHANNEL DIE /PATTI ( LOCAL )', 4, 'pack', 1061, 2, 'enabled', '2019-04-17 20:22:51', '2019-07-03 01:18:37'),
(263, 'consume', 'COTTON TAPE 3\"', 42, 'pcs', 1041, 50, 'enabled', '2019-04-18 00:57:03', '2019-07-03 01:27:12'),
(264, 'consume', 'PASTING POWDER', 8, 'pcs', 1049, 8, 'enabled', '2019-04-18 00:57:22', '2019-07-03 01:51:35'),
(265, 'consume', 'COTTON SHOPPER', 10, 'kg', 1067, 20, 'enabled', '2019-04-18 00:57:39', '2019-07-03 01:17:07'),
(266, 'consume', 'COTTON TAPE 3\"', 18, 'pcs', 1041, 50, 'enabled', '2019-04-18 01:42:22', '2019-07-03 01:27:12'),
(267, 'biocos', 'BIOCOS CLEANSING MILK BOSTER UNIT BOX', 0, 'pcs', 1111, 0, 'enabled', '2019-04-23 19:48:01', '2019-04-23 19:48:01'),
(268, 'biocos', 'BIOCOS CLEANSING MILK BOSTER AMPULE', 0, 'pcs', 1112, 0, 'enabled', '2019-04-23 19:50:11', '2019-04-23 19:50:11'),
(269, 'biocos', 'BIOCOS CLEANSING MILK BOSTER INNER', 0, 'pcs', 1113, 0, 'enabled', '2019-04-23 19:50:51', '2019-04-23 19:50:51'),
(270, 'biocos', 'BIOCOS CLEANSING MILK BOOSTER 12 PCS BOX', 0, 'pcs', 1114, 0, 'enabled', '2019-04-23 19:53:04', '2019-04-23 19:53:04'),
(271, 'biocos', 'BIOCOS WHITENING SCRUB BOOSTER 12 PCS BOX', 0, 'pcs', 1115, 0, 'enabled', '2019-04-23 19:55:44', '2019-04-23 19:55:44'),
(272, 'consume', 'PLASTIC PARAS', 12, 'pack', 1048, 0, 'enabled', '2019-04-23 19:58:55', '2019-04-23 19:58:55'),
(273, 'consume', 'CARBAN PAPER', 2, 'pack', 1102, 2, 'enabled', '2019-04-23 19:59:16', '2019-07-03 01:16:29'),
(274, 'consume', 'RUBBER BAND 32#', 12, 'pack', 1047, 8, 'enabled', '2019-04-23 19:59:37', '2019-07-03 01:43:59'),
(275, 'consume', 'STRAPPING ROLL', 2, 'bundle', 1066, 2, 'enabled', '2019-04-23 19:59:57', '2019-07-03 01:17:30'),
(276, 'consume', 'OXILAN UV', 20, 'kg', 1056, 20, 'enabled', '2019-04-23 20:00:17', '2019-07-03 01:20:11'),
(277, 'varnish', 'UV WASH', 24, 'liter', 1050, 15, 'enabled', '2019-04-23 20:00:34', '2019-07-03 01:30:12'),
(278, 'consume', 'GLOVES', 0, 'pack', 1116, 2, 'enabled', '2019-04-23 20:01:22', '2019-07-03 01:15:30'),
(279, 'consume', 'GLOVES', 2, 'pack', 1116, 2, 'enabled', '2019-04-23 20:01:55', '2019-07-03 01:15:30'),
(280, 'biocos', 'BIOCOS MOISTURIZING CREAM  BOOSTER UNIT BOX', 0, 'pcs', 1128, 0, 'enabled', '2019-04-23 23:40:20', '2019-04-23 23:40:20'),
(281, 'biocos', 'BIOCOS MOISTURIZING CREAM  BOOSTER AMPULE', 0, 'pcs', 1129, 0, 'enabled', '2019-04-23 23:40:31', '2019-04-23 23:40:31'),
(282, 'biocos', 'BIOCOS MOISTURIZING CREAM  BOOSTER INNER', 0, 'pcs', 1130, 0, 'enabled', '2019-04-23 23:40:44', '2019-04-23 23:40:44'),
(283, 'biocos', 'BIOCOS MOISTURIZING CREAM  BOOSTER 12 PCS BOX', 0, 'pcs', 1131, 0, 'enabled', '2019-04-23 23:40:55', '2019-04-23 23:40:55'),
(284, 'biocos', 'BIOCOS MASSAGE CREAM BOOSTER 12 PCS BOX', 0, 'pcs', 1132, 0, 'enabled', '2019-04-23 23:42:27', '2019-04-23 23:42:27'),
(285, 'biocos', 'BIOCOS MASSAGE CREAM BOOSTER INNER', 0, 'pcs', 1133, 0, 'enabled', '2019-04-23 23:42:48', '2019-04-23 23:42:48'),
(286, 'biocos', 'BIOCOS MASSAGE CREAM BOOSTER AMPULE', 0, 'pcs', 1134, 0, 'enabled', '2019-04-23 23:42:58', '2019-04-23 23:42:58'),
(287, 'biocos', 'BIOCOS MASSAGE CREAM BOOSTER UNIT BOX', 0, 'pcs', 1135, 0, 'enabled', '2019-04-23 23:44:25', '2019-04-23 23:44:25'),
(288, 'biocos', 'BIOCOS TONER BOOSTER UNIT BOX', 0, 'pcs', 1136, 0, 'enabled', '2019-04-23 23:46:04', '2019-04-23 23:46:04'),
(289, 'biocos', 'BIOCOS TONER BOOSTER AMPULE', 0, 'pcs', 1137, 0, 'enabled', '2019-04-23 23:46:16', '2019-04-23 23:46:16'),
(290, 'biocos', 'BIOCOS TONER BOOSTER INNER', 0, 'pcs', 1138, 0, 'enabled', '2019-04-23 23:46:23', '2019-04-23 23:46:23'),
(291, 'biocos', 'BIOCOS TONER BOOSTER 12 PCS BOX', 0, 'pcs', 1139, 0, 'enabled', '2019-04-23 23:46:35', '2019-04-23 23:46:35'),
(292, 'biocos', 'BIOCOS FACIAL BOOSTER KIT 7 PCS BOX', 0, 'pcs', 1140, 0, 'enabled', '2019-04-23 23:48:36', '2019-04-23 23:48:36'),
(293, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-04-23 23:56:36', '2019-04-23 23:56:36'),
(294, 'biocos', 'BIOCOS WHITENING SCRUB BOOSTER INNER', 0, 'pcs', 1141, 0, 'enabled', '2019-04-24 00:02:07', '2019-04-24 00:02:07'),
(295, 'biocos', 'BIOCOS WHITENING SCRUB BOOSTER AMPULE', 0, 'pcs', 1142, 0, 'enabled', '2019-04-24 00:03:45', '2019-04-24 00:03:45'),
(296, 'biocos', 'BIOCOS WHITENING SCRUB BOOSTER UNIT BOX', 0, 'pcs', 1143, 0, 'enabled', '2019-04-24 00:03:59', '2019-04-24 00:03:59'),
(297, 'biocos', 'BIOCOS MUD MASK BOOSTER UNIT BOX', 0, 'pcs', 1144, 0, 'enabled', '2019-04-24 00:04:11', '2019-04-24 00:04:11'),
(298, 'biocos', 'BIOCOS MUD MASK BOOSTER AMPULE', 0, 'pcs', 1145, 0, 'enabled', '2019-04-24 00:04:24', '2019-04-24 00:04:24'),
(299, 'biocos', 'BIOCOS MUD MASK BOOSTER INNER', 0, 'pcs', 1146, 0, 'enabled', '2019-04-24 00:04:33', '2019-04-24 00:04:33'),
(300, 'biocos', 'BIOCOS MUD MASK BOOSTER 12 PCS BOX', 0, 'pcs', 1147, 0, 'enabled', '2019-04-24 00:04:44', '2019-04-24 00:04:44'),
(301, 'biocos', 'BIOCOS TRIPLE ACTION BOOSTER 12 PCS BOX', 0, 'pcs', 1148, 0, 'enabled', '2019-04-24 00:05:15', '2019-04-24 00:05:15'),
(302, 'biocos', 'BIOCOS TRIPLE ACTION BOOSTER INNER', 0, 'pcs', 1149, 0, 'enabled', '2019-04-24 00:05:22', '2019-04-24 00:05:22'),
(303, 'biocos', 'BIOCOS TRIPLE ACTION BOOSTER AMPULE', 0, 'pcs', 1150, 0, 'enabled', '2019-04-24 00:05:32', '2019-04-24 00:05:32'),
(304, 'biocos', 'BIOCOS TRIPLE ACTION BOOSTER UNIT BOX', 0, 'pcs', 1151, 0, 'enabled', '2019-04-24 00:05:44', '2019-04-24 00:05:44'),
(305, 'biocos', 'BIOCOS PIMPLE CLEAR UNIT BOX', 18700, 'pcs', 1084, 0, 'enabled', '2019-04-25 18:07:15', '2019-04-25 18:07:15'),
(306, 'biocos', 'BIOCOS PIMPLE CLEAR 24 PCS BOX', 750, 'pcs', 1087, 0, 'enabled', '2019-04-25 18:07:33', '2019-04-25 18:07:33'),
(307, 'biocos', 'BIOCOS HAIR REGROWTH UNIT BOX', 16700, 'pcs', 1080, 0, 'enabled', '2019-04-25 18:07:55', '2019-04-25 18:07:55'),
(308, 'biocos', 'BIOCOS HAIR REGROWTH 24 PCS BOX', 750, 'pcs', 1086, 0, 'enabled', '2019-04-25 18:08:12', '2019-04-25 18:08:12'),
(309, 'biocos', 'BIOCOS AGE REVERSAL UNIT BOX', 16500, 'pcs', 1082, 0, 'enabled', '2019-04-25 18:08:28', '2019-04-25 18:08:28'),
(310, 'biocos', 'BIOCOS AGE REVERSAL 24 PCS BOX', 750, 'pcs', 1088, 0, 'enabled', '2019-04-25 18:08:41', '2019-04-25 18:08:41'),
(311, 'varnish', 'UV LECQUER', 25, 'kg', 1040, 40, 'enabled', '2019-04-25 19:42:46', '2019-07-03 01:29:01'),
(312, 'consume', 'CHANNEL DIE /PATTI (IMPORTED)', 2, 'pack', 1045, 2, 'enabled', '2019-04-26 18:13:41', '2019-07-03 01:43:37'),
(313, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-04-26 18:15:46', '2019-04-26 18:15:46'),
(314, 'consume', 'ELFI', 12, 'pcs', 1044, 12, 'enabled', '2019-04-26 18:16:02', '2019-07-03 01:43:18'),
(315, 'consume', 'GLOVES', 2, 'pack', 1116, 2, 'enabled', '2019-04-26 18:16:20', '2019-07-03 01:15:30'),
(316, 'consume', 'DOUBLE TAPE', 10, 'pcs', 1042, 20, 'enabled', '2019-04-26 18:17:14', '2019-07-03 01:40:43'),
(317, 'consume', 'RUBBER BAND 25#', 6, 'pack', 1046, 0, 'enabled', '2019-04-26 18:18:06', '2019-04-26 18:18:06'),
(318, 'consume', 'PLATE CLEANER', 4, 'liter', 1058, 3, 'enabled', '2019-04-26 18:18:24', '2019-07-03 01:19:32'),
(319, 'consume', 'UV BLANKIT', 2, 'pcs', 1060, 3, 'enabled', '2019-04-26 18:18:41', '2019-07-03 01:18:59'),
(320, 'consume', 'PASTING POWDER', 8, 'pcs', 1049, 8, 'enabled', '2019-04-27 18:10:52', '2019-07-03 01:51:35'),
(321, 'biocos', 'BIOCOS SOAP LARGE UNIT BOX', 20430, 'pcs', 1077, 16800, 'enabled', '2019-04-27 22:01:03', '2019-07-03 01:30:59'),
(322, 'biocos', 'BIOCOS NEEM SOAP UNIT BOX', 20700, 'pcs', 1079, 14400, 'enabled', '2019-04-27 22:01:22', '2019-07-03 01:28:44'),
(323, 'biocos', 'BIOCOS CLEANSING MILK BOOSTER 12 PCS BOX', 2375, 'pcs', 1114, 0, 'enabled', '2019-04-29 20:26:42', '2019-04-29 20:26:42'),
(324, 'biocos', 'BIOCOS MOISTURIZING CREAM  BOOSTER UNIT BOX', 2375, 'pcs', 1128, 0, 'enabled', '2019-04-29 20:27:00', '2019-04-29 20:27:00'),
(325, 'biocos', 'BIOCOS MOISTURIZING CREAM  BOOSTER AMPULE', 2375, 'pcs', 1129, 0, 'enabled', '2019-04-29 20:27:24', '2019-04-29 20:27:24'),
(326, 'biocos', 'BIOCOS MOISTURIZING CREAM  BOOSTER INNER', 2375, 'pcs', 1130, 0, 'enabled', '2019-04-29 20:27:46', '2019-04-29 20:27:46'),
(327, 'biocos', 'BIOCOS WHITENING SCRUB BOOSTER 12 PCS BOX', 2375, 'pcs', 1115, 0, 'enabled', '2019-04-29 20:28:03', '2019-04-29 20:28:03'),
(328, 'biocos', 'BIOCOS WHITENING SCRUB BOOSTER INNER', 2375, 'pcs', 1141, 0, 'enabled', '2019-04-29 20:28:27', '2019-04-29 20:28:27'),
(329, 'biocos', 'BIOCOS WHITENING SCRUB BOOSTER AMPULE', 2375, 'pcs', 1142, 0, 'enabled', '2019-04-29 20:28:44', '2019-04-29 20:28:44'),
(330, 'biocos', 'BIOCOS WHITENING SCRUB BOOSTER UNIT BOX', 2375, 'pcs', 1143, 0, 'enabled', '2019-04-29 20:29:04', '2019-04-29 20:29:04'),
(331, 'biocos', 'BIOCOS MUD MASK BOOSTER UNIT BOX', 2375, 'pcs', 1144, 0, 'enabled', '2019-04-29 20:30:16', '2019-04-29 20:30:16'),
(332, 'biocos', 'BIOCOS MUD MASK BOOSTER AMPULE', 2375, 'pcs', 1145, 0, 'enabled', '2019-04-29 20:30:30', '2019-04-29 20:30:30'),
(333, 'biocos', 'BIOCOS MUD MASK BOOSTER INNER', 2375, 'pcs', 1146, 0, 'enabled', '2019-04-29 20:30:44', '2019-04-29 20:30:44'),
(334, 'biocos', 'BIOCOS MUD MASK BOOSTER 12 PCS BOX', 2375, 'pcs', 1147, 0, 'enabled', '2019-04-29 20:30:58', '2019-04-29 20:30:58'),
(335, 'biocos', 'BIOCOS TRIPLE ACTION BOOSTER 12 PCS BOX', 2375, 'pcs', 1148, 0, 'enabled', '2019-04-29 20:31:18', '2019-04-29 20:31:18'),
(336, 'biocos', 'BIOCOS TRIPLE ACTION BOOSTER INNER', 2375, 'pcs', 1149, 0, 'enabled', '2019-04-29 20:31:32', '2019-04-29 20:31:32'),
(337, 'biocos', 'BIOCOS TRIPLE ACTION BOOSTER AMPULE', 2375, 'pcs', 1150, 0, 'enabled', '2019-04-29 20:31:47', '2019-04-29 20:31:47'),
(338, 'biocos', 'BIOCOS TRIPLE ACTION BOOSTER UNIT BOX', 2375, 'pcs', 1151, 0, 'enabled', '2019-04-29 20:32:01', '2019-04-29 20:32:01'),
(339, 'biocos', 'BIOCOS MOISTURIZING CREAM  BOOSTER UNIT BOX', 2375, 'pcs', 1128, 0, 'enabled', '2019-04-29 20:32:22', '2019-04-29 20:32:22'),
(340, 'biocos', 'BIOCOS MOISTURIZING CREAM  BOOSTER AMPULE', 2375, 'pcs', 1129, 0, 'enabled', '2019-04-29 20:32:36', '2019-04-29 20:32:36'),
(341, 'biocos', 'BIOCOS MOISTURIZING CREAM  BOOSTER INNER', 2375, 'pcs', 1130, 0, 'enabled', '2019-04-29 20:32:51', '2019-04-29 20:32:51'),
(342, 'biocos', 'BIOCOS MOISTURIZING CREAM  BOOSTER 12 PCS BOX', 2375, 'pcs', 1131, 0, 'enabled', '2019-04-29 20:33:06', '2019-04-29 20:33:06'),
(343, 'biocos', 'BIOCOS MASSAGE CREAM BOOSTER 12 PCS BOX', 2375, 'pcs', 1132, 0, 'enabled', '2019-04-29 20:33:24', '2019-04-29 20:33:24'),
(344, 'biocos', 'BIOCOS MASSAGE CREAM BOOSTER INNER', 2375, 'pcs', 1133, 0, 'enabled', '2019-04-29 20:33:39', '2019-04-29 20:33:39'),
(345, 'biocos', 'BIOCOS MASSAGE CREAM BOOSTER AMPULE', 2375, 'pcs', 1134, 0, 'enabled', '2019-04-29 20:33:55', '2019-04-29 20:33:55'),
(346, 'biocos', 'BIOCOS MASSAGE CREAM BOOSTER UNIT BOX', 2375, 'pcs', 1135, 0, 'enabled', '2019-04-29 20:34:14', '2019-04-29 20:34:14'),
(347, 'biocos', 'BIOCOS TONER BOOSTER UNIT BOX', 2375, 'pcs', 1136, 0, 'enabled', '2019-04-29 20:35:47', '2019-04-29 20:35:47'),
(348, 'biocos', 'BIOCOS TONER BOOSTER AMPULE', 2375, 'pcs', 1137, 0, 'enabled', '2019-04-29 20:36:06', '2019-04-29 20:36:06'),
(349, 'biocos', 'BIOCOS TONER BOOSTER INNER', 2375, 'pcs', 1138, 0, 'enabled', '2019-04-29 20:36:23', '2019-04-29 20:36:23'),
(350, 'biocos', 'BIOCOS TONER BOOSTER 12 PCS BOX', 2374, 'pcs', 1139, 0, 'enabled', '2019-04-29 20:36:54', '2019-04-29 20:36:54'),
(351, 'biocos', 'BIOCOS FACIAL BOOSTER KIT 7 PCS BOX', 2375, 'pcs', 1140, 0, 'enabled', '2019-04-29 21:50:02', '2019-04-29 21:50:02'),
(352, 'biocos', 'BIOCOS CLEANSING MILK BOSTER UNIT BOX', 2375, 'pcs', 1111, 0, 'enabled', '2019-04-29 21:50:29', '2019-04-29 21:50:29'),
(353, 'biocos', 'BIOCOS PIMPLE CLEAR AMPULE', 2375, 'pcs', 1085, 0, 'enabled', '2019-04-29 21:50:45', '2019-04-29 21:50:45'),
(354, 'biocos', 'BIOCOS CLEANSING MILK BOSTER AMPULE', 2375, 'pcs', 1112, 0, 'enabled', '2019-04-29 21:51:06', '2019-04-29 21:51:06'),
(355, 'biocos', 'BIOCOS CLEANSING MILK BOSTER INNER', 2375, 'pcs', 1113, 0, 'enabled', '2019-04-29 21:51:27', '2019-04-29 21:51:27'),
(356, 'consume', 'DOUBLE TAPE', 228, 'pcs', 1042, 20, 'enabled', '2019-04-30 00:28:39', '2019-07-03 01:40:43'),
(357, 'varnish', 'UV LECQUER', 25, 'kg', 1040, 40, 'enabled', '2019-05-03 00:42:35', '2019-07-03 01:29:01'),
(358, 'varnish', 'UV WASH', 12, 'liter', 1050, 15, 'enabled', '2019-05-03 00:42:51', '2019-07-03 01:30:12'),
(359, 'consume', 'PLATE CLEANER', 6, 'liter', 1058, 3, 'enabled', '2019-05-03 00:51:53', '2019-07-03 01:19:32'),
(360, 'consume', 'COTTON RUGS', 100, 'kg', 1065, 25, 'enabled', '2019-05-03 00:52:38', '2019-07-03 01:17:55'),
(361, 'consume', 'IPA', 165, 'kg', 1063, 100, 'enabled', '2019-05-04 18:45:15', '2019-07-03 01:18:11'),
(362, 'consume', 'DOUBLE TAPE', 50, 'pcs', 1042, 20, 'enabled', '2019-05-04 18:45:32', '2019-07-03 01:40:43'),
(365, 'consume', 'GLOVES', 2, 'pack', 1116, 2, 'enabled', '2019-05-09 18:42:27', '2019-07-03 01:15:30'),
(366, 'consume', 'CHANNEL DIE /PATTI ( LOCAL )', 4, 'pack', 1061, 2, 'enabled', '2019-05-09 18:43:14', '2019-07-03 01:18:37'),
(367, 'consume', 'UV BLANKIT', 4, 'pcs', 1060, 3, 'enabled', '2019-05-09 18:43:42', '2019-07-03 01:18:59'),
(368, 'consume', 'ELFI', 6, 'pcs', 1044, 12, 'enabled', '2019-05-09 18:43:59', '2019-07-03 01:43:18'),
(369, 'consume', 'PASTING POWDER', 4, 'pcs', 1049, 8, 'enabled', '2019-05-09 18:44:17', '2019-07-03 01:51:35'),
(370, 'consume', 'FACE MASK', 0, 'pack', 1152, 2, 'enabled', '2019-05-09 18:48:30', '2019-07-03 01:14:20'),
(371, 'consume', 'FACE MASK', 2, 'pack', 1152, 2, 'enabled', '2019-05-09 18:48:55', '2019-07-03 01:14:20'),
(372, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 50000, 'pcs', 1073, 120000, 'enabled', '2019-05-10 19:41:39', '2019-07-03 01:35:15'),
(373, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-05-11 18:32:29', '2019-05-11 18:32:29'),
(374, 'consume', 'RUBBER BAND 32#', 12, 'pack', 1047, 8, 'enabled', '2019-05-11 18:32:47', '2019-07-03 01:43:59'),
(375, 'biocos', 'BIOCOS SERUM WOMAN U/B (THAILAND)', 0, 'pcs', 1153, 0, 'enabled', '2019-05-11 22:46:30', '2019-05-11 22:46:30'),
(376, 'biocos', 'BIOCOS SERUM WOMAN 12PCS (THAILAND)', 0, 'pcs', 1154, 0, 'enabled', '2019-05-11 22:47:00', '2019-05-11 22:47:00'),
(377, 'biocos', 'BIOCOS SERUM MEN U/B (THAILAND)', 0, 'pcs', 1155, 0, 'enabled', '2019-05-11 22:47:27', '2019-05-11 22:47:27'),
(378, 'biocos', 'BIOCOS SERUM MEN 12PCS (THAILAND)', 0, 'pcs', 1156, 0, 'enabled', '2019-05-11 22:48:11', '2019-05-11 22:48:11'),
(379, 'biocos', 'BIOCOS SOAP (THAILAND)', 0, 'pcs', 1157, 0, 'enabled', '2019-05-11 22:48:41', '2019-05-11 22:48:41'),
(380, 'biocos', 'BIOCOS SERUM WOMAN U/B (DUBAI)', 0, 'pcs', 1158, 0, 'enabled', '2019-05-11 22:49:25', '2019-05-11 22:49:25'),
(381, 'biocos', 'BIOCOS SERUM WOMAN 12PCS (DUBAI)', 0, 'pcs', 1159, 0, 'enabled', '2019-05-11 22:49:50', '2019-05-11 22:49:50'),
(382, 'biocos', 'BIOCOS SOAP (DUBAI)', 0, 'pcs', 1160, 0, 'enabled', '2019-05-11 22:50:14', '2019-05-11 22:50:14'),
(383, 'biocos', 'BIOCOS SERUM WOMAN U/B (DUBAI)', 25500, 'pcs', 1158, 0, 'enabled', '2019-05-11 22:50:56', '2019-05-11 22:50:56'),
(384, 'biocos', 'BIOCOS SERUM WOMAN 12PCS (DUBAI)', 2000, 'pcs', 1159, 0, 'enabled', '2019-05-11 22:51:21', '2019-05-11 22:51:21'),
(385, 'biocos', 'BIOCOS SOAP (DUBAI)', 7100, 'pcs', 1160, 0, 'enabled', '2019-05-11 22:51:40', '2019-05-11 22:51:40'),
(386, 'biocos', 'BIOCOS SERUM WOMAN U/B (THAILAND)', 14300, 'pcs', 1153, 0, 'enabled', '2019-05-11 22:52:18', '2019-05-11 22:52:18'),
(387, 'biocos', 'BIOCOS SERUM WOMAN 12PCS (THAILAND)', 1120, 'pcs', 1154, 0, 'enabled', '2019-05-11 22:52:43', '2019-05-11 22:52:43'),
(388, 'biocos', 'BIOCOS SERUM MEN U/B (THAILAND)', 14500, 'pcs', 1155, 0, 'enabled', '2019-05-11 22:53:07', '2019-05-11 22:53:07'),
(389, 'biocos', 'BIOCOS SERUM MEN 12PCS (THAILAND)', 1120, 'pcs', 1156, 0, 'enabled', '2019-05-11 22:53:41', '2019-05-11 22:53:41'),
(390, 'biocos', 'BIOCOS SOAP (THAILAND)', 8400, 'pcs', 1157, 0, 'enabled', '2019-05-11 22:54:05', '2019-05-11 22:54:05'),
(391, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 101150, 'pcs', 1073, 120000, 'enabled', '2019-05-11 22:56:44', '2019-07-03 01:35:15'),
(392, 'consume', 'COTTON TAPE 3\"', 48, 'pcs', 1041, 50, 'enabled', '2019-05-14 22:10:12', '2019-07-03 01:27:12'),
(393, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-05-14 22:10:26', '2019-05-14 22:10:26'),
(394, 'varnish', 'UV WASH', 12, 'liter', 1050, 15, 'enabled', '2019-05-14 22:32:21', '2019-07-03 01:30:12'),
(395, 'varnish', 'UV LECQUER', 25, 'kg', 1040, 40, 'enabled', '2019-05-14 22:32:43', '2019-07-03 01:29:01'),
(396, 'consume', 'PASTING POWDER', 4, 'pcs', 1049, 8, 'enabled', '2019-05-18 20:10:49', '2019-07-03 01:51:35'),
(397, 'consume', 'IPA', 165, 'kg', 1063, 100, 'enabled', '2019-05-20 23:24:23', '2019-07-03 01:18:11'),
(398, 'consume', 'ELFI', 12, 'pcs', 1044, 12, 'enabled', '2019-05-20 23:44:38', '2019-07-03 01:43:18'),
(399, 'consume', 'PRINTED BLANKIT', 5, 'pcs', 1059, 3, 'enabled', '2019-05-21 21:24:00', '2019-07-03 01:19:15'),
(400, 'varnish', 'UV WASH', 3, 'liter', 1050, 15, 'enabled', '2019-05-23 21:39:18', '2019-07-03 01:30:12'),
(401, 'consume', 'PASTING POWDER', 8, 'pcs', 1049, 8, 'enabled', '2019-05-23 21:39:39', '2019-07-03 01:51:35'),
(402, 'varnish', 'UV WASH', 8, 'liter', 1050, 15, 'enabled', '2019-05-24 19:41:15', '2019-07-03 01:30:12'),
(403, 'varnish', 'UV WASH', 1, 'liter', 1050, 15, 'enabled', '2019-05-24 19:41:42', '2019-07-03 01:30:12'),
(404, 'varnish', 'UV LECQUER', 50, 'kg', 1040, 40, 'enabled', '2019-05-24 19:42:21', '2019-07-03 01:29:01'),
(405, 'consume', 'COTTON RUGS', 91, 'kg', 1065, 25, 'enabled', '2019-05-27 18:39:10', '2019-07-03 01:17:55'),
(406, 'varnish', 'UV WASH', 6, 'liter', 1050, 15, 'enabled', '2019-05-28 18:57:20', '2019-07-03 01:30:12'),
(407, 'consume', 'PLASTIC PARAS', 12, 'pack', 1048, 0, 'enabled', '2019-05-28 18:57:34', '2019-05-28 18:57:34'),
(408, 'consume', 'CHANNEL DIE /PATTI (IMPORTED)', 2, 'pack', 1045, 2, 'enabled', '2019-05-28 18:57:54', '2019-07-03 01:43:37'),
(409, 'biocos', 'BIOCOS SERUM UNIT BOX (PARLOR PACK)', 0, 'pcs', 1161, 0, 'enabled', '2019-05-28 22:18:32', '2019-05-28 22:18:32'),
(410, 'biocos', 'BIOCOS SERUM 12 PCS BOX (PARLOR PACK)', 0, 'pcs', 1162, 0, 'enabled', '2019-05-28 22:19:12', '2019-05-28 22:19:12'),
(411, 'biocos', 'BIOCOS SERUM TRAY  (PARLOR PACK)', 0, 'pcs', 1163, 0, 'enabled', '2019-05-28 22:20:14', '2019-05-28 22:20:14'),
(412, 'biocos', 'BIOCOS SERUM INJECTION LABEL  (PARLOR PACK)', 0, 'pcs', 1164, 0, 'enabled', '2019-05-28 22:21:00', '2019-05-28 22:21:00'),
(413, 'biocos', 'BIOCOS SERUM INJECTION  (PARLOR PACK)', 0, 'pcs', 1165, 0, 'enabled', '2019-05-28 22:26:54', '2019-05-28 22:26:54'),
(414, 'biocos', 'BIOCOS SERUM INJECTION LABEL  (PARLOR PACK)', 5500, 'pcs', 1164, 0, 'enabled', '2019-05-29 17:09:29', '2019-05-29 17:09:29'),
(415, 'biocos', 'BIOCOS SERUM INJECTION  (PARLOR PACK)', 10000, 'pcs', 1165, 0, 'enabled', '2019-05-29 17:10:10', '2019-05-29 17:10:10'),
(416, 'biocos', 'BIOCOS SERUM TRAY  (PARLOR PACK)', 6210, 'pcs', 1163, 0, 'enabled', '2019-05-29 17:10:42', '2019-05-29 17:10:42'),
(417, 'biocos', 'BIOCOS SERUM 12 PCS BOX (PARLOR PACK)', 500, 'pcs', 1162, 0, 'enabled', '2019-05-29 17:12:32', '2019-05-29 17:12:32'),
(418, 'biocos', 'BIOCOS SERUM UNIT BOX (PARLOR PACK)', 4600, 'pcs', 1161, 0, 'enabled', '2019-05-29 17:13:03', '2019-05-29 17:13:03'),
(419, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 153748, 'pcs', 1073, 120000, 'enabled', '2019-05-29 17:15:00', '2019-07-03 01:35:15'),
(420, 'biocos', 'BIOCOS SERUM UNIT BOX', 231500, 'pcs', 1074, 240000, 'enabled', '2019-05-31 18:52:19', '2019-07-03 01:33:49'),
(421, 'biocos', 'BIOCOS SERUM 12 PCS BOX', 16950, 'pcs', 1075, 200, 'enabled', '2019-05-31 18:52:47', '2019-07-03 01:33:11'),
(422, 'varnish', 'UV WASH', 21, 'liter', 1050, 15, 'enabled', '2019-05-31 18:53:30', '2019-07-03 01:30:12'),
(423, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-05-31 18:53:43', '2019-05-31 18:53:43'),
(424, 'consume', 'OXILAN UV', 20, 'kg', 1056, 20, 'enabled', '2019-05-31 18:54:02', '2019-07-03 01:20:11'),
(425, 'consume', 'RUBBER BAND 32#', 12, 'pack', 1047, 8, 'enabled', '2019-05-31 18:54:19', '2019-07-03 01:43:59'),
(426, 'consume', 'RUBBER BAND 25#', 6, 'pack', 1046, 0, 'enabled', '2019-05-31 18:54:34', '2019-05-31 18:54:34'),
(427, 'consume', 'PASTING POWDER', 8, 'pcs', 1049, 8, 'enabled', '2019-05-31 18:54:53', '2019-07-03 01:51:35'),
(428, 'consume', 'COTTON TAPE 3\"', 72, 'pcs', 1041, 50, 'enabled', '2019-05-31 18:55:50', '2019-07-03 01:27:12'),
(429, 'consume', 'WHITE TAPE', 24, 'pcs', 1043, 0, 'enabled', '2019-05-31 18:56:14', '2019-05-31 18:56:14'),
(430, 'consume', 'ELFI', 12, 'pcs', 1044, 12, 'enabled', '2019-05-31 18:56:30', '2019-07-03 01:43:18'),
(431, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-05-31 19:39:30', '2019-05-31 19:39:30'),
(432, 'varnish', 'UV LECQUER', 25, 'kg', 1040, 40, 'enabled', '2019-05-31 19:43:02', '2019-07-03 01:29:01'),
(433, 'inks', 'SILVER INK', 0, 'kg', 1166, 0, 'enabled', '2019-05-31 22:57:06', '2019-05-31 22:57:46'),
(434, 'inks', 'GOLD INK', 0, 'kg', 1167, 0, 'enabled', '2019-05-31 22:57:33', '2019-05-31 22:57:33'),
(435, 'inks', 'COPPER INK', 0, 'kg', 1168, 0, 'enabled', '2019-05-31 22:58:01', '2019-05-31 22:58:01'),
(436, 'inks', 'TRANSPARENT WHITE (TINT)', 0, 'kg', 1169, 0, 'enabled', '2019-05-31 22:58:33', '2019-05-31 22:58:33'),
(437, 'inks', 'PENTON YELLOW INK', 0, 'kg', 1170, 0, 'enabled', '2019-05-31 23:00:06', '2019-05-31 23:06:12'),
(438, 'inks', 'PENTON MAHROON INK', 0, 'kg', 1171, 0, 'enabled', '2019-05-31 23:04:17', '2019-05-31 23:05:56'),
(439, 'inks', 'PENTON BLACK INK', 0, 'kg', 1172, 0, 'enabled', '2019-05-31 23:05:22', '2019-05-31 23:05:42'),
(440, 'inks', 'METALLIC BROWN INK', 0, 'kg', 1173, 0, 'enabled', '2019-05-31 23:07:18', '2019-05-31 23:07:18'),
(441, 'inks', 'PENTON GREEN INK', 0, 'kg', 1174, 0, 'enabled', '2019-05-31 23:07:48', '2019-05-31 23:07:48'),
(442, 'inks', 'PENTON PURPLE INK', 0, 'kg', 1175, 0, 'enabled', '2019-05-31 23:08:30', '2019-05-31 23:08:30'),
(443, 'inks', 'PENTON RED INK', 0, 'kg', 1176, 0, 'enabled', '2019-05-31 23:08:51', '2019-05-31 23:08:51'),
(444, 'inks', 'PENTON ORANGE INK', 0, 'kg', 1177, 0, 'enabled', '2019-05-31 23:09:22', '2019-05-31 23:09:22'),
(445, 'inks', 'PENTON BLUE INK', 0, 'kg', 1178, 0, 'enabled', '2019-05-31 23:09:51', '2019-05-31 23:09:51'),
(446, 'inks', 'LYFT BLUE INK', 0, 'kg', 1179, 0, 'enabled', '2019-05-31 23:10:33', '2019-05-31 23:11:49'),
(447, 'inks', 'LYFT PINK INK', 0, 'kg', 1180, 0, 'enabled', '2019-05-31 23:10:54', '2019-05-31 23:12:00'),
(448, 'inks', 'PENTON PINK INK', 0, 'kg', 1181, 0, 'enabled', '2019-05-31 23:13:08', '2019-05-31 23:13:08'),
(449, 'inks', 'PLAIN BROWN INK', 0, 'kg', 1182, 0, 'enabled', '2019-05-31 23:13:57', '2019-05-31 23:13:57'),
(450, 'inks', 'PENTON GREY INK', 0, 'kg', 1183, 0, 'enabled', '2019-05-31 23:14:34', '2019-05-31 23:14:34'),
(451, 'inks', 'FLORESCENT MIX COLOUR INK', 0, 'kg', 1184, 0, 'enabled', '2019-05-31 23:21:34', '2019-05-31 23:21:34'),
(452, 'varnish', 'PREMIER COATING (BASE PAPER COATING)', 0, 'kg', 1185, 0, 'enabled', '2019-05-31 23:29:47', '2019-05-31 23:29:47'),
(453, 'varnish', 'STAR FOUNT', 0, 'kg', 1186, 0, 'enabled', '2019-05-31 23:30:22', '2019-05-31 23:30:22'),
(454, 'consume', 'GLUE (USA)', 0, 'kg', 1187, 0, 'enabled', '2019-05-31 23:30:42', '2019-05-31 23:30:42'),
(455, 'varnish', 'MISC COATING', 0, 'kg', 1188, 0, 'enabled', '2019-05-31 23:31:03', '2019-07-03 00:18:59'),
(456, 'inks', 'SILVER INK', 47, 'kg', 1166, 0, 'enabled', '2019-05-31 23:32:44', '2019-05-31 23:32:44'),
(457, 'inks', 'GOLD INK', 22, 'kg', 1167, 0, 'enabled', '2019-05-31 23:33:08', '2019-05-31 23:33:08'),
(458, 'inks', 'COPPER INK', 2, 'kg', 1168, 0, 'enabled', '2019-05-31 23:33:22', '2019-05-31 23:33:22');
INSERT INTO `inwards` (`id`, `category_item`, `item_name`, `in_qty`, `uom`, `item_id`, `stock_reminder`, `inventory_status`, `created_at`, `updated_at`) VALUES
(459, 'inks', 'TRANSPARENT WHITE (TINT)', 20, 'kg', 1169, 0, 'enabled', '2019-05-31 23:33:39', '2019-05-31 23:33:39'),
(460, 'inks', 'PENTON YELLOW INK', 45, 'kg', 1170, 0, 'enabled', '2019-05-31 23:34:02', '2019-05-31 23:34:02'),
(461, 'inks', 'YELLOW', 41, 'kg', 1036, 70, 'enabled', '2019-05-31 23:34:16', '2019-07-03 01:23:17'),
(462, 'inks', 'CYAN (BLUE)', 10, 'kg', 1034, 80, 'enabled', '2019-05-31 23:34:31', '2019-07-03 01:25:49'),
(463, 'inks', 'RED (magenta)', 39, 'kg', 1038, 70, 'enabled', '2019-05-31 23:46:14', '2019-07-03 01:24:11'),
(464, 'inks', 'PENTON MAHROON INK', 7, 'kg', 1171, 0, 'enabled', '2019-05-31 23:46:41', '2019-05-31 23:46:41'),
(465, 'inks', 'PENTON BLACK INK', 40, 'kg', 1172, 0, 'enabled', '2019-05-31 23:47:02', '2019-05-31 23:47:02'),
(466, 'inks', 'METALLIC BROWN INK', 8, 'kg', 1173, 0, 'enabled', '2019-05-31 23:47:18', '2019-05-31 23:47:18'),
(467, 'inks', 'BLACK', 43, 'kg', 1037, 60, 'enabled', '2019-05-31 23:47:39', '2019-07-03 01:24:29'),
(468, 'inks', 'WHITE', 50, 'kg', 1035, 100, 'enabled', '2019-05-31 23:48:03', '2019-07-03 01:23:40'),
(469, 'inks', 'PENTON GREEN INK', 147, 'kg', 1174, 0, 'enabled', '2019-05-31 23:48:21', '2019-05-31 23:48:21'),
(470, 'inks', 'PENTON PURPLE INK', 145, 'kg', 1175, 0, 'enabled', '2019-05-31 23:48:43', '2019-05-31 23:48:43'),
(471, 'inks', 'PENTON RED INK', 150, 'kg', 1176, 0, 'enabled', '2019-05-31 23:49:11', '2019-05-31 23:49:11'),
(472, 'inks', 'PENTON ORANGE INK', 77, 'kg', 1177, 0, 'enabled', '2019-05-31 23:49:39', '2019-05-31 23:49:39'),
(473, 'inks', 'PENTON BLUE INK', 232, 'kg', 1178, 0, 'enabled', '2019-05-31 23:49:54', '2019-05-31 23:49:54'),
(474, 'inks', 'LYFT BLUE INK', 60, 'kg', 1179, 0, 'enabled', '2019-05-31 23:50:11', '2019-05-31 23:50:11'),
(475, 'inks', 'LYFT PINK INK', 55, 'kg', 1180, 0, 'enabled', '2019-05-31 23:50:25', '2019-05-31 23:50:25'),
(476, 'inks', 'PENTON PINK INK', 15, 'kg', 1181, 0, 'enabled', '2019-05-31 23:50:39', '2019-05-31 23:50:39'),
(477, 'inks', 'PLAIN BROWN INK', 20, 'kg', 1182, 0, 'enabled', '2019-05-31 23:50:54', '2019-05-31 23:50:54'),
(478, 'inks', 'PENTON GREY INK', 72, 'kg', 1183, 0, 'enabled', '2019-05-31 23:51:10', '2019-05-31 23:51:10'),
(479, 'inks', 'FLORESCENT MIX COLOUR INK', 20, 'kg', 1184, 0, 'enabled', '2019-05-31 23:51:25', '2019-05-31 23:51:25'),
(480, 'inks', 'METALLIC BROWN INK', 105, 'kg', 1173, 0, 'enabled', '2019-05-31 23:51:50', '2019-05-31 23:51:50'),
(481, 'varnish', 'PREMIER COATING (BASE PAPER COATING)', 80, 'kg', 1185, 0, 'enabled', '2019-05-31 23:52:17', '2019-05-31 23:52:17'),
(482, 'varnish', 'STAR FOUNT', 60, 'kg', 1186, 0, 'enabled', '2019-05-31 23:52:31', '2019-05-31 23:52:31'),
(483, 'consume', 'GLUE (USA)', 40, 'kg', 1187, 0, 'enabled', '2019-05-31 23:52:44', '2019-05-31 23:52:44'),
(484, 'varnish', 'MISC COATING', 50, 'kg', 1188, 0, 'enabled', '2019-05-31 23:52:58', '2019-07-03 00:18:59'),
(485, 'varnish', 'UV LECQUER', 75, 'kg', 1040, 40, 'enabled', '2019-06-12 20:12:58', '2019-07-03 01:29:01'),
(486, 'consume', 'PRINTED BLANKIT', 5, 'pcs', 1059, 3, 'enabled', '2019-06-12 20:13:15', '2019-07-03 01:19:15'),
(487, 'consume', 'PLATE CLEANER', 12, 'liter', 1058, 3, 'enabled', '2019-06-12 20:13:42', '2019-07-03 01:19:32'),
(488, 'consume', 'IPA', 160, 'kg', 1063, 100, 'enabled', '2019-06-14 02:00:01', '2019-07-03 01:18:11'),
(489, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-06-14 02:00:14', '2019-06-14 02:00:14'),
(490, 'consume', 'GLOVES', 3, 'pack', 1116, 2, 'enabled', '2019-06-14 02:00:31', '2019-07-03 01:15:30'),
(491, 'consume', 'FACE MASK', 2, 'pack', 1152, 2, 'enabled', '2019-06-14 02:00:46', '2019-07-03 01:14:20'),
(492, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-06-14 02:01:04', '2019-06-14 02:01:04'),
(493, 'consume', 'PLASTIC PARAS', 6, 'pack', 1048, 0, 'enabled', '2019-06-19 01:22:53', '2019-06-19 01:22:53'),
(494, 'consume', 'CARBAN PAPER', 4, 'pack', 1102, 2, 'enabled', '2019-06-19 01:23:14', '2019-07-03 01:16:29'),
(495, 'consume', 'PASTING POWDER', 8, 'pcs', 1049, 8, 'enabled', '2019-06-19 01:23:31', '2019-07-03 01:51:35'),
(496, 'varnish', 'UV WASH', 24, 'liter', 1050, 15, 'enabled', '2019-06-19 19:18:32', '2019-07-03 01:30:12'),
(497, 'consume', 'UV BLANKIT', 5, 'pcs', 1060, 3, 'enabled', '2019-06-19 19:18:49', '2019-07-03 01:18:59'),
(498, 'consume', 'CHANNEL DIE /PATTI ( LOCAL )', 3, 'pack', 1061, 2, 'enabled', '2019-06-19 19:19:11', '2019-07-03 01:18:37'),
(499, 'biocos', 'BIOCOS WHITENING URGENT FACIAL BOOSTER AMPULE', 0, 'pcs', 1189, 0, 'enabled', '2019-06-19 20:05:09', '2019-06-19 20:05:09'),
(500, 'biocos', 'BIOCOS WHITENING URGENT FACIAL BOOSTER UNIT BOX', 0, 'pcs', 1190, 0, 'enabled', '2019-06-19 20:06:05', '2019-06-19 20:06:05'),
(501, 'biocos', 'BIOCOS WHITENING URGENT FACIAL BOOSTER INNER', 0, 'pcs', 1191, 0, 'enabled', '2019-06-19 20:06:58', '2019-06-19 20:06:58'),
(502, 'biocos', 'BIOCOS WHITENING URGENT FACIAL BOOSTER 12 PCS BOX', 0, 'pcs', 1192, 0, 'enabled', '2019-06-19 20:07:47', '2019-06-19 20:07:47'),
(503, 'consume', 'COTTON RUGS', 100, 'kg', 1065, 25, 'enabled', '2019-06-22 01:27:34', '2019-07-03 01:17:55'),
(504, 'consume', 'COTTON TAPE 3\"', 72, 'pcs', 1041, 50, 'enabled', '2019-06-22 01:27:54', '2019-07-03 01:27:12'),
(505, 'consume', 'RUBBER BAND 32#', 6, 'pack', 1047, 8, 'enabled', '2019-06-22 01:28:09', '2019-07-03 01:43:59'),
(506, 'inks', 'DRIPOFF YELLOWISH', 48, 'kg', 1104, 70, 'enabled', '2019-06-25 19:31:26', '2019-07-03 01:16:01'),
(507, 'varnish', 'DRIP OFF VARNISH', 100, 'kg', 1039, 200, 'enabled', '2019-06-25 19:31:48', '2019-07-03 01:27:49'),
(508, 'consume', 'IPA', 160, 'kg', 1063, 100, 'enabled', '2019-06-25 19:32:03', '2019-07-03 01:18:11'),
(509, 'biocos', 'BIOCOS NEEM SOAP UNIT BOX', 44300, 'pcs', 1079, 14400, 'enabled', '2019-06-28 18:22:16', '2019-07-03 01:28:44'),
(510, 'consume', 'ELFI', 6, 'pcs', 1044, 12, 'enabled', '2019-06-28 22:09:50', '2019-07-03 01:43:18'),
(511, 'consume', 'STRAPPING ROLL', 2, 'bundle', 1066, 2, 'enabled', '2019-06-28 22:10:04', '2019-07-03 01:17:30'),
(512, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-06-28 22:10:22', '2019-06-28 22:10:22'),
(513, 'consume', 'CHANNEL DIE /PATTI ( LOCAL )', 2, 'pack', 1061, 2, 'enabled', '2019-06-28 23:29:21', '2019-07-03 01:18:37'),
(514, 'consume', 'CHANNEL DIE /PATTI (IMPORTED)', 2, 'pack', 1045, 2, 'enabled', '2019-06-28 23:29:35', '2019-07-03 01:43:37'),
(515, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-07-02 19:54:34', '2019-07-02 19:54:34'),
(516, 'inks', 'DRIPOFF YELLOWISH', 36, 'kg', 1104, 0, 'enabled', '2019-07-06 21:08:44', '2019-07-06 21:08:44'),
(517, 'inks', 'YELLOW', 2, 'kg', 1036, 0, 'enabled', '2019-07-06 21:09:16', '2019-07-06 21:09:16'),
(518, 'inks', 'WHITE', 13, 'kg', 1035, 0, 'enabled', '2019-07-06 21:10:16', '2019-07-06 21:10:16'),
(519, 'varnish', 'DRIP OFF VARNISH', 100, 'kg', 1039, 0, 'enabled', '2019-07-06 21:10:39', '2019-07-06 21:10:39'),
(520, 'varnish', 'DRIP OFF VARNISH 8066', 0, 'kg', 1193, 100, 'enabled', '2019-07-06 21:11:27', '2019-07-06 21:11:27'),
(521, 'varnish', 'DRIPOFF YELLOWISH 6086 NEW', 0, 'kg', 1194, 80, 'enabled', '2019-07-06 21:12:28', '2019-07-06 21:12:28'),
(522, 'varnish', 'DRIP OFF VARNISH 8066', 36, 'kg', 1193, 0, 'enabled', '2019-07-06 21:13:05', '2019-07-06 21:13:05'),
(523, 'varnish', 'DRIP OFF VARNISH 8066', 64, 'kg', 1193, 0, 'enabled', '2019-07-06 21:15:35', '2019-07-06 21:15:35'),
(524, 'varnish', 'DRIPOFF YELLOWISH 6086 NEW', 36, 'kg', 1194, 0, 'enabled', '2019-07-06 21:16:10', '2019-07-06 21:16:10'),
(525, 'varnish', 'UV WASH', 24, 'liter', 1050, 0, 'enabled', '2019-07-06 21:19:27', '2019-07-06 21:19:27'),
(526, 'consume', 'PASTING POWDER', 8, 'pcs', 1049, 0, 'enabled', '2019-07-06 21:20:07', '2019-07-06 21:20:07'),
(527, 'consume', 'COTTON TAPE 3\"', 60, 'pcs', 1041, 0, 'enabled', '2019-07-06 21:20:36', '2019-07-06 21:20:36'),
(528, 'consume', 'COTTON TAPE 3\"', 72, 'pcs', 1041, 0, 'enabled', '2019-07-06 21:23:02', '2019-07-06 21:23:02'),
(529, 'consume', 'GLOVES', 2, 'pack', 1116, 0, 'enabled', '2019-07-06 21:23:17', '2019-07-06 21:23:17'),
(530, 'consume', 'RUBBER BAND 32#', 12, 'pack', 1047, 0, 'enabled', '2019-07-06 21:23:43', '2019-07-06 21:23:43'),
(531, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 52598, 'pcs', 1073, 0, 'enabled', '2019-07-08 19:58:45', '2019-07-08 19:58:45'),
(532, 'biocos', 'BIOCOS WHITENING URGENT FACIAL BOOSTER AMPULE', 2304, 'pcs', 1189, 0, 'enabled', '2019-07-09 00:47:50', '2019-07-09 00:47:50'),
(533, 'biocos', 'BIOCOS WHITENING URGENT FACIAL BOOSTER UNIT BOX', 2304, 'pcs', 1190, 0, 'enabled', '2019-07-09 00:48:21', '2019-07-09 00:48:21'),
(534, 'biocos', 'BIOCOS WHITENING URGENT FACIAL BOOSTER INNER', 2304, 'pcs', 1191, 0, 'enabled', '2019-07-09 00:48:47', '2019-07-09 00:48:47'),
(535, 'biocos', 'BIOCOS WHITENING URGENT FACIAL BOOSTER 12 PCS BOX', 192, 'pcs', 1192, 0, 'enabled', '2019-07-09 00:49:12', '2019-07-09 00:49:12'),
(536, 'consume', 'IPA', 160, 'kg', 1063, 0, 'enabled', '2019-07-11 02:01:12', '2019-07-11 02:01:12'),
(537, 'consume', 'UV BLANKIT', 5, 'pcs', 1060, 0, 'enabled', '2019-07-11 02:03:33', '2019-07-11 02:03:33'),
(538, 'consume', 'PRINTED BLANKIT', 5, 'pcs', 1059, 0, 'enabled', '2019-07-11 02:04:07', '2019-07-11 02:04:07'),
(539, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-07-11 02:04:25', '2019-07-11 02:04:25'),
(540, 'varnish', 'UV LECQUER', 100, 'kg', 1040, 0, 'enabled', '2019-07-11 02:04:45', '2019-07-11 02:04:45'),
(541, 'varnish', 'UV LECQUER', 25, 'kg', 1040, 0, 'enabled', '2019-07-11 02:05:10', '2019-07-11 02:05:10'),
(542, 'inks', 'YELLOW', 6, 'kg', 1036, 0, 'enabled', '2019-07-12 01:25:54', '2019-07-12 01:25:54'),
(543, 'inks', 'WHITE', 34, 'kg', 1035, 0, 'enabled', '2019-07-12 01:26:10', '2019-07-12 01:26:10'),
(544, 'consume', 'ELFI', 12, 'pcs', 1044, 0, 'enabled', '2019-07-18 19:08:20', '2019-07-18 19:08:20'),
(545, 'consume', 'PASTING POWDER', 8, 'pcs', 1049, 0, 'enabled', '2019-07-18 19:09:05', '2019-07-18 19:09:05'),
(546, 'consume', 'COTTON RUGS', 100, 'kg', 1065, 0, 'enabled', '2019-07-18 19:09:25', '2019-07-18 19:09:25'),
(547, 'consume', 'OXILAN UV', 20, 'kg', 1056, 0, 'enabled', '2019-07-18 19:10:37', '2019-07-18 19:10:37'),
(548, 'varnish', 'UV WASH', 20, 'liter', 1050, 0, 'enabled', '2019-07-18 19:11:00', '2019-07-18 19:11:00'),
(549, 'consume', 'PLASTIC PARAS', 12, 'pack', 1048, 0, 'enabled', '2019-07-22 21:13:56', '2019-07-22 21:13:56'),
(550, 'consume', 'STRAPPING ROLL', 2, 'bundle', 1066, 0, 'enabled', '2019-07-22 21:14:43', '2019-07-22 21:14:43'),
(551, 'consume', 'WHITE TAPE', 24, 'pcs', 1043, 0, 'enabled', '2019-07-22 21:15:13', '2019-07-22 21:15:13'),
(552, 'consume', 'COTTON SHOPPER', 10, 'kg', 1067, 0, 'enabled', '2019-07-22 21:15:28', '2019-07-22 21:15:28'),
(553, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-07-22 21:15:45', '2019-07-22 21:15:45'),
(554, 'consume', 'ELEPHANT SAMAD BOND', 3, 'kg', 1052, 0, 'enabled', '2019-07-22 21:16:09', '2019-07-22 21:16:09'),
(555, 'consume', 'RUBBER BAND 25#', 4, 'pack', 1046, 0, 'enabled', '2019-07-22 21:16:32', '2019-07-22 21:16:32'),
(556, 'consume', 'RUBBER BAND 32#', 12, 'pack', 1047, 0, 'enabled', '2019-07-22 21:16:50', '2019-07-22 21:16:50'),
(557, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-07-22 21:17:10', '2019-07-22 21:17:10'),
(558, 'consume', 'CHANNEL DIE /PATTI ( LOCAL )', 4, 'pack', 1061, 0, 'enabled', '2019-07-22 21:17:30', '2019-07-22 21:17:30'),
(559, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 129472, 'pcs', 1073, 0, 'enabled', '2019-07-25 00:47:58', '2019-07-25 00:47:58'),
(560, 'inks', 'WHITE', 15, 'kg', 1035, 0, 'enabled', '2019-07-27 22:34:58', '2019-07-27 22:34:58'),
(561, 'inks', 'WHITE', 7, 'kg', 1035, 0, 'enabled', '2019-07-27 22:35:33', '2019-07-27 22:35:33'),
(562, 'inks', 'YELLOW', 10, 'kg', 1036, 0, 'enabled', '2019-07-27 22:38:27', '2019-07-27 22:38:27'),
(563, 'varnish', 'UV WASH', 24, 'liter', 1050, 0, 'enabled', '2019-07-30 23:45:04', '2019-07-30 23:45:04'),
(564, 'consume', 'PRINTED BLANKIT', 4, 'pcs', 1059, 0, 'enabled', '2019-07-30 23:45:20', '2019-07-30 23:45:20'),
(565, 'consume', 'UV BLANKIT', 5, 'pcs', 1060, 0, 'enabled', '2019-07-30 23:45:37', '2019-07-30 23:45:37'),
(566, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-07-30 23:45:52', '2019-07-30 23:45:52'),
(567, 'consume', 'RUBBER BAND 32#', 12, 'pack', 1047, 0, 'enabled', '2019-07-30 23:46:07', '2019-07-30 23:46:07'),
(568, 'inks', 'WHITE', 19, 'kg', 1035, 0, 'enabled', '2019-07-30 23:46:25', '2019-07-30 23:46:25'),
(569, 'consume', 'COTTON TAPE 3\"', 48, 'pcs', 1041, 0, 'enabled', '2019-08-02 01:28:03', '2019-08-02 01:28:03'),
(570, 'consume', 'CAMEL SAMAD', 5, 'kg', 1051, 0, 'enabled', '2019-08-02 01:28:33', '2019-08-02 01:28:33'),
(571, 'consume', 'STRAPPING ROLL', 2, 'bundle', 1066, 0, 'enabled', '2019-08-02 01:29:21', '2019-08-02 01:29:21'),
(572, 'consume', 'GLOVES', 2, 'pack', 1116, 0, 'enabled', '2019-08-02 01:29:37', '2019-08-02 01:29:37'),
(573, 'consume', 'FACE MASK', 2, 'pack', 1152, 0, 'enabled', '2019-08-02 01:29:53', '2019-08-02 01:29:53'),
(574, 'consume', 'OFF SET PAPER RIM (100 GRM)', 2, 'bundle', 1064, 0, 'enabled', '2019-08-02 01:30:13', '2019-08-02 01:30:13'),
(575, 'consume', 'CHANNEL DIE /PATTI ( LOCAL )', 5, 'pack', 1061, 0, 'enabled', '2019-08-03 21:30:02', '2019-08-03 21:30:02'),
(576, 'consume', 'PLATE CLEANER', 6, 'liter', 1058, 0, 'enabled', '2019-08-03 21:30:15', '2019-08-03 21:30:15'),
(577, 'consume', 'IPA', 160, 'kg', 1063, 0, 'enabled', '2019-08-03 22:50:37', '2019-08-03 22:50:37'),
(578, 'consume', 'COTTON RUGS', 96, 'kg', 1065, 0, 'enabled', '2019-08-07 22:58:28', '2019-08-07 22:58:28'),
(579, 'consume', 'CARBAN PAPER', 3, 'pack', 1102, 0, 'enabled', '2019-08-07 22:58:45', '2019-08-07 22:58:45'),
(580, 'consume', 'PRINTED BLANKIT', 5, 'pcs', 1059, 0, 'enabled', '2019-08-07 22:59:01', '2019-08-07 22:59:01'),
(581, 'consume', 'ELFI', 10, 'pcs', 1044, 0, 'enabled', '2019-08-07 22:59:17', '2019-08-07 22:59:17'),
(582, 'biocos', 'BIOCOS SERUM UNIT BOX', 204400, 'pcs', 1074, 0, 'enabled', '2019-08-08 23:29:26', '2019-08-08 23:29:26'),
(583, 'biocos', 'BIOCOS SERUM 12 PCS BOX', 17050, 'pcs', 1075, 0, 'enabled', '2019-08-08 23:30:37', '2019-08-08 23:30:37'),
(584, 'biocos', 'BIOCOS SERUM EXPORT U/B', 0, 'pcs', 1195, 20000, 'enabled', '2019-08-08 23:37:50', '2019-08-08 23:37:50'),
(585, 'biocos', 'BIOCOS SERUM EXPORT 12PCS BOX', 0, 'pcs', 1196, 1670, 'enabled', '2019-08-08 23:39:41', '2019-08-08 23:39:41'),
(586, 'biocos', 'BIOCOS SERUM EXPORT U/B', 108300, 'pcs', 1195, 0, 'enabled', '2019-08-08 23:42:51', '2019-08-08 23:42:51'),
(587, 'biocos', 'BIOCOS SERUM EXPORT 12PCS BOX', 9050, 'pcs', 1196, 0, 'enabled', '2019-08-08 23:43:11', '2019-08-08 23:43:11'),
(588, 'inks', 'WHITE', 108, 'kg', 1035, 0, 'enabled', '2019-08-22 21:15:30', '2019-08-22 21:15:30'),
(589, 'inks', 'YELLOW', 48, 'kg', 1036, 0, 'enabled', '2019-08-22 21:15:52', '2019-08-22 21:15:52'),
(590, 'varnish', 'DRIP OFF VARNISH 8066', 200, 'kg', 1193, 0, 'enabled', '2019-08-22 21:16:32', '2019-08-22 21:16:32'),
(591, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-08-22 21:16:55', '2019-08-22 21:16:55'),
(592, 'consume', 'STRAPPING ROLL', 2, 'bundle', 1066, 0, 'enabled', '2019-08-22 21:17:19', '2019-08-22 21:17:19'),
(593, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-08-22 21:17:35', '2019-08-22 21:17:35'),
(594, 'consume', 'COTTON TAPE 3\"', 37, 'pcs', 1041, 0, 'enabled', '2019-08-22 21:37:02', '2019-08-22 21:37:02'),
(595, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-08-22 21:37:17', '2019-08-22 21:37:17'),
(596, 'consume', 'RUBBER BAND 32#', 10, 'pack', 1047, 0, 'enabled', '2019-08-22 21:37:34', '2019-08-22 21:37:34'),
(597, 'varnish', 'UV WASH', 24, 'liter', 1050, 0, 'enabled', '2019-08-22 21:48:59', '2019-08-22 21:48:59'),
(598, 'consume', 'PLATE CLEANER', 6, 'liter', 1058, 0, 'enabled', '2019-08-22 21:49:18', '2019-08-22 21:49:18'),
(599, 'consume', 'PLASTIC PARAS', 6, 'pack', 1048, 0, 'enabled', '2019-08-24 00:32:11', '2019-08-24 00:32:11'),
(600, 'consume', 'IPA', 165, 'kg', 1063, 0, 'enabled', '2019-08-29 19:28:54', '2019-08-29 19:28:54'),
(601, 'biocos', 'vail 2ml', 121380, 'pcs', 1105, 0, 'enabled', '2019-08-31 18:13:47', '2019-08-31 18:13:47'),
(602, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 121380, 'pcs', 1073, 0, 'enabled', '2019-08-31 19:24:48', '2019-08-31 19:24:48'),
(603, 'consume', 'COTTON TAPE 3\"', 60, 'pcs', 1041, 0, 'enabled', '2019-08-31 23:14:12', '2019-08-31 23:14:12'),
(604, 'consume', 'CHANNEL DIE /PATTI ( LOCAL )', 4, 'pack', 1061, 0, 'enabled', '2019-09-02 23:33:33', '2019-09-02 23:33:33'),
(605, 'consume', 'COTTON RUGS', 125, 'kg', 1065, 0, 'enabled', '2019-09-02 23:33:52', '2019-09-02 23:33:52'),
(606, 'consume', 'RUBBER BAND 32#', 15, 'pack', 1047, 0, 'enabled', '2019-09-03 00:34:27', '2019-09-03 00:34:27'),
(607, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-09-03 00:34:41', '2019-09-03 00:34:41'),
(608, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 101150, 'pcs', 1073, 0, 'enabled', '2019-09-05 18:44:18', '2019-09-05 18:44:18'),
(609, 'varnish', 'UV LECQUER', 100, 'kg', 1040, 0, 'enabled', '2019-09-07 19:38:32', '2019-09-07 19:38:32'),
(610, 'consume', 'WHITE TAPE', 24, 'pcs', 1043, 0, 'enabled', '2019-09-07 20:20:39', '2019-09-07 20:20:39'),
(611, 'consume', 'GLOVES', 2, 'pack', 1116, 0, 'enabled', '2019-09-07 20:20:56', '2019-09-07 20:20:56'),
(612, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-09-07 20:21:17', '2019-09-07 20:21:17'),
(613, 'consume', 'ELFI', 25, 'pcs', 1044, 0, 'enabled', '2019-09-07 21:19:44', '2019-09-07 21:19:44'),
(614, 'varnish', 'STAR FOUNT', 20, 'kg', 1186, 0, 'enabled', '2019-09-07 21:21:08', '2019-09-07 21:21:08'),
(615, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-09-13 01:09:00', '2019-09-13 01:09:00'),
(616, 'biocos', 'BIOCOS SERUM UNIT BOX', 9600, 'pcs', 1074, 0, 'enabled', '2019-09-13 01:48:53', '2019-09-13 01:48:53'),
(617, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 141610, 'pcs', 1073, 0, 'enabled', '2019-09-13 01:50:01', '2019-09-13 01:50:01'),
(618, 'biocos', 'BIOCOS SERUM UNIT BOX', 112000, 'pcs', 1074, 0, 'enabled', '2019-09-17 00:59:51', '2019-09-17 00:59:51'),
(619, 'consume', 'IPA', 160, 'kg', 1063, 0, 'enabled', '2019-09-18 19:35:55', '2019-09-18 19:35:55'),
(620, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-09-18 19:36:10', '2019-09-18 19:36:10'),
(621, 'consume', 'RUBBER BAND 32#', 17, 'pack', 1047, 0, 'enabled', '2019-09-18 19:36:27', '2019-09-18 19:36:27'),
(622, 'varnish', 'UV WASH', 24, 'liter', 1050, 0, 'enabled', '2019-09-18 19:36:44', '2019-09-18 19:36:44'),
(623, 'varnish', 'DRIP OFF VARNISH', 25, 'kg', 1039, 0, 'enabled', '2019-09-18 19:37:03', '2019-09-18 19:37:03'),
(624, 'consume', 'PLATE CLEANER', 6, 'liter', 1058, 0, 'enabled', '2019-09-18 23:47:50', '2019-09-18 23:47:50'),
(625, 'consume', 'UV BLANKIT', 6, 'pcs', 1060, 0, 'enabled', '2019-09-18 23:48:19', '2019-09-18 23:48:19'),
(626, 'consume', 'PRINTED BLANKIT', 5, 'pcs', 1059, 0, 'enabled', '2019-09-18 23:48:44', '2019-09-18 23:48:44'),
(627, 'biocos', 'BIOCOS SERUM CAP WITH PLUG', 140000, 'pcs', 1072, 0, 'enabled', '2019-09-21 20:18:59', '2019-09-21 20:18:59'),
(628, 'biocos', 'BIOCOS SERUM 12 PCS BOX', 1300, 'pcs', 1075, 0, 'enabled', '2019-09-22 02:28:05', '2019-09-22 02:28:05'),
(629, 'biocos', 'BIOCOS SERUM UNIT BOX', 172500, 'pcs', 1074, 0, 'enabled', '2019-09-24 01:18:26', '2019-09-24 01:18:26'),
(630, 'biocos', 'BIOCOS SERUM 12 PCS BOX', 38750, 'pcs', 1075, 0, 'enabled', '2019-09-24 01:19:01', '2019-09-24 01:19:01'),
(631, 'consume', 'CAMEL SAMAD', 6, 'kg', 1051, 0, 'enabled', '2019-09-25 01:32:36', '2019-09-25 01:32:36'),
(632, 'consume', 'STRAPPING ROLL', 2, 'bundle', 1066, 0, 'enabled', '2019-09-25 01:32:50', '2019-09-25 01:32:50'),
(633, 'consume', 'COTTON TAPE 3\"', 60, 'pcs', 1041, 0, 'enabled', '2019-09-25 01:33:10', '2019-09-25 01:33:10'),
(634, 'varnish', 'DRIP OFF VARNISH', 50, 'kg', 1039, 0, 'enabled', '2019-09-25 01:33:37', '2019-09-25 01:33:37'),
(635, 'consume', 'COTTON SHOPPER', 10, 'kg', 1067, 0, 'enabled', '2019-09-25 01:33:59', '2019-09-25 01:33:59'),
(636, 'consume', 'RUBBER BAND 32#', 11, 'pack', 1047, 0, 'enabled', '2019-09-27 19:39:05', '2019-09-27 19:39:05'),
(637, 'consume', 'GLOVES', 2, 'pack', 1116, 0, 'enabled', '2019-09-27 19:39:20', '2019-09-27 19:39:20'),
(638, 'inks', 'WHITE', 24, 'kg', 1035, 0, 'enabled', '2019-09-28 19:38:06', '2019-09-28 19:38:06'),
(639, 'inks', 'RED (magenta)', 5, 'kg', 1038, 0, 'enabled', '2019-09-28 19:38:20', '2019-09-28 19:38:20'),
(640, 'consume', 'COTTON RUGS', 178, 'kg', 1065, 0, 'enabled', '2019-09-28 19:38:39', '2019-09-28 19:38:39'),
(641, 'consume', 'OXILAN UV', 20, 'kg', 1056, 0, 'enabled', '2019-09-28 19:38:56', '2019-09-28 19:38:56'),
(642, 'consume', 'COTTON TAPE 3\"', 60, 'pcs', 1041, 0, 'enabled', '2019-09-28 19:39:20', '2019-09-28 19:39:20'),
(643, 'consume', 'CARBAN PAPER', 4, 'pack', 1102, 0, 'enabled', '2019-09-28 19:39:35', '2019-09-28 19:39:35'),
(644, 'consume', 'PLASTIC PARAS', 11, 'pack', 1048, 0, 'enabled', '2019-09-28 19:39:49', '2019-09-28 19:39:49'),
(645, 'consume', 'PLASTIC PARAS', 1, 'pack', 1048, 0, 'enabled', '2019-09-28 19:40:02', '2019-09-28 19:40:02'),
(646, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-09-28 19:40:19', '2019-09-28 19:40:19'),
(647, 'consume', 'CHANNEL DIE /PATTI ( LOCAL )', 5, 'pack', 1061, 0, 'enabled', '2019-09-28 19:40:33', '2019-09-28 19:40:33'),
(648, 'consume', 'OFF SET PAPER RIM (100 GRM)', 2, 'bundle', 1064, 0, 'enabled', '2019-10-02 18:52:09', '2019-10-02 18:52:09'),
(649, 'varnish', 'UV WASH', 12, 'liter', 1050, 0, 'enabled', '2019-10-02 18:52:21', '2019-10-02 18:52:21'),
(650, 'consume', 'IPA', 160, 'kg', 1063, 0, 'enabled', '2019-10-02 19:14:48', '2019-10-02 19:14:48'),
(651, 'biocos', 'BIOCOS SERUM CAP WITH PLUG', 380000, 'pcs', 1072, 0, 'enabled', '2019-10-03 21:51:01', '2019-10-18 03:25:19'),
(652, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 192854, 'pcs', 1073, 0, 'enabled', '2019-10-05 02:06:07', '2019-10-05 02:06:07'),
(653, 'consume', 'RUBBER BAND 32#', 7, 'pack', 1047, 0, 'enabled', '2019-10-07 20:01:27', '2019-10-07 20:01:27'),
(654, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-10-07 20:01:42', '2019-10-07 20:01:42'),
(655, 'consume', 'COTTON TAPE 3\"', 60, 'pcs', 1041, 0, 'enabled', '2019-10-07 20:01:58', '2019-10-07 20:01:58'),
(656, 'varnish', 'UV LECQUER', 250, 'kg', 1040, 0, 'enabled', '2019-10-07 20:02:24', '2019-10-07 20:02:24'),
(657, 'varnish', 'DRIP OFF VARNISH', 75, 'kg', 1039, 0, 'enabled', '2019-10-07 20:02:41', '2019-10-07 20:02:41'),
(658, 'consume', 'RUBBER BAND 32#', 6, 'pack', 1047, 0, 'enabled', '2019-10-08 18:43:08', '2019-10-08 18:43:08'),
(659, 'consume', 'STRAPPING ROLL', 2, 'bundle', 1066, 0, 'enabled', '2019-10-08 18:43:32', '2019-10-08 18:43:32'),
(660, 'consume', 'WHITE TAPE', 24, 'pcs', 1043, 0, 'enabled', '2019-10-08 18:43:50', '2019-10-08 18:43:50'),
(661, 'consume', 'GLOVES', 2, 'pack', 1116, 0, 'enabled', '2019-10-08 18:44:14', '2019-10-08 18:44:14'),
(662, 'inks', 'WHITE', 108, 'kg', 1035, 0, 'enabled', '2019-10-08 18:44:42', '2019-10-08 18:44:42'),
(663, 'inks', 'CYAN (BLUE)', 36, 'kg', 1034, 0, 'enabled', '2019-10-08 18:44:57', '2019-10-08 18:44:57'),
(664, 'inks', 'BLACK', 48, 'kg', 1037, 0, 'enabled', '2019-10-08 18:45:15', '2019-10-08 18:45:15'),
(665, 'inks', 'YELLOW', 60, 'kg', 1036, 0, 'enabled', '2019-10-08 18:45:30', '2019-10-08 18:45:30'),
(666, 'inks', 'RED (magenta)', 60, 'kg', 1038, 0, 'enabled', '2019-10-08 18:45:52', '2019-10-08 18:45:52'),
(667, 'varnish', 'DRIPOFF YELLOWISH 6086 NEW', 60, 'kg', 1194, 0, 'enabled', '2019-10-08 18:46:53', '2019-10-08 18:46:53'),
(668, 'varnish', 'DRIP OFF VARNISH 8066', 200, 'kg', 1193, 0, 'enabled', '2019-10-08 18:47:26', '2019-10-08 18:47:26'),
(669, 'varnish', 'UV WASH', 44, 'liter', 1050, 0, 'enabled', '2019-10-10 18:54:58', '2019-10-10 18:54:58'),
(670, 'consume', 'RUBBER BAND 32#', 13, 'pack', 1047, 0, 'enabled', '2019-10-10 18:55:28', '2019-10-10 18:55:28'),
(671, 'consume', 'RUBBER BAND 25#', 2, 'pack', 1046, 0, 'enabled', '2019-10-10 18:56:08', '2019-10-10 18:56:08'),
(672, 'biocos', 'BIOCOS SOAP SMALL UNIT BOX', 21600, 'pcs', 1078, 0, 'enabled', '2019-10-10 19:59:13', '2019-10-10 19:59:13'),
(674, 'biocos', 'BIOCOS SERUM UNIT BOX', 128000, 'pcs', 1074, 0, 'enabled', '2019-10-11 00:03:09', '2019-10-11 00:03:09'),
(675, 'consume', 'ELFI', 25, 'pcs', 1044, 0, 'enabled', '2019-10-12 20:07:03', '2019-10-12 20:07:03'),
(676, 'consume', 'IPA', 160, 'kg', 1063, 0, 'enabled', '2019-10-12 20:07:24', '2019-10-12 20:07:24'),
(677, 'consume', 'CAMEL SAMAD', 6, 'kg', 1051, 0, 'enabled', '2019-10-12 20:07:43', '2019-10-12 20:07:43'),
(678, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 153748, 'pcs', 1073, 0, 'enabled', '2019-10-14 18:08:27', '2019-10-14 18:08:27'),
(679, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-10-16 18:35:54', '2019-10-16 18:35:54'),
(680, 'consume', 'COTTON TAPE 3\"', 60, 'pcs', 1041, 0, 'enabled', '2019-10-16 18:36:10', '2019-10-16 18:36:10'),
(681, 'consume', 'RUBBER BAND 32#', 6, 'pack', 1047, 0, 'enabled', '2019-10-16 18:36:29', '2019-10-16 18:36:29'),
(682, 'consume', 'UV BLANKIT', 5, 'pcs', 1060, 0, 'enabled', '2019-10-16 19:14:55', '2019-10-16 19:14:55'),
(683, 'consume', 'PRINTED BLANKIT', 5, 'pcs', 1059, 0, 'enabled', '2019-10-16 19:15:15', '2019-10-16 19:15:15'),
(684, 'biocos', 'BIOCOS MEN SERUM CAP WITH PLUG', 20000, 'pcs', 1098, 0, 'enabled', '2019-10-18 03:28:05', '2019-10-18 03:28:05'),
(685, 'biocos', 'BIOCOS SERUM CAP WITH PLUG', 100000, 'pcs', 1072, 0, 'enabled', '2019-10-22 19:35:19', '2019-10-22 19:35:19'),
(686, 'consume', 'GLOVES', 2, 'pack', 1116, 0, 'enabled', '2019-10-22 20:48:02', '2019-10-22 20:48:02'),
(687, 'consume', 'RUBBER BAND 32#', 3, 'pack', 1047, 0, 'enabled', '2019-10-22 20:48:18', '2019-10-22 20:48:18'),
(688, 'consume', 'PLASTIC PARAS', 12, 'pack', 1048, 0, 'enabled', '2019-10-22 20:48:33', '2019-10-22 20:48:33'),
(689, 'consume', 'CAMEL SAMAD', 6, 'kg', 1051, 0, 'enabled', '2019-10-22 20:48:49', '2019-10-22 20:48:49'),
(690, 'consume', 'PLATE CLEANER', 6, 'liter', 1058, 0, 'enabled', '2019-10-22 20:49:05', '2019-10-22 20:49:05'),
(691, 'inks', 'WHITE', 60, 'kg', 1035, 0, 'enabled', '2019-10-22 20:53:31', '2019-10-22 20:53:31'),
(692, 'consume', 'RUBBER BAND 32#', 15, 'pack', 1047, 0, 'enabled', '2019-10-22 22:29:14', '2019-10-22 22:29:14'),
(693, 'consume', 'CHANNEL DIE /PATTI ( LOCAL )', 5, 'pack', 1061, 0, 'enabled', '2019-10-22 22:37:00', '2019-10-22 22:37:00'),
(694, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-10-25 01:14:06', '2019-10-25 01:14:06'),
(695, 'consume', 'DOUBLE TAPE', 2, 'pcs', 1042, 0, 'enabled', '2019-10-25 01:14:21', '2019-10-25 01:14:21'),
(696, 'consume', 'RUBBER BAND 25#', 4, 'pack', 1046, 0, 'enabled', '2019-10-25 01:15:23', '2019-10-25 01:15:23'),
(697, 'consume', 'CHANNEL DIE /PATTI (IMPORTED)', 5, 'pack', 1045, 0, 'enabled', '2019-10-25 01:15:23', '2019-10-25 01:15:23'),
(698, 'consume', 'RUBBER BAND 32#', 5, 'pack', 1047, 0, 'enabled', '2019-10-25 01:16:03', '2019-10-25 01:16:03'),
(699, 'biocos', 'BIOCOS SERUM UNIT BOX', 60000, 'pcs', 1074, 0, 'enabled', '2019-10-28 18:24:53', '2019-10-28 18:24:53'),
(700, 'consume', 'COTTON TAPE 3\"', 60, 'pcs', 1041, 0, 'enabled', '2019-10-28 19:02:19', '2019-10-28 19:02:19'),
(701, 'consume', 'RUBBER BAND 32#', 20, 'pack', 1047, 0, 'enabled', '2019-10-28 19:02:46', '2019-10-28 19:02:46'),
(702, 'consume', 'PRINTED BLANKIT', 10, 'pcs', 1059, 0, 'enabled', '2019-10-29 20:07:54', '2019-10-29 20:07:54'),
(703, 'varnish', 'UV WASH', 12, 'liter', 1050, 0, 'enabled', '2019-10-30 18:56:34', '2019-10-30 18:56:34'),
(704, 'varnish', 'DRIP OFF VARNISH', 25, 'kg', 1039, 0, 'enabled', '2019-10-30 18:56:53', '2019-10-30 18:56:53'),
(705, 'consume', 'OXILAN UV', 20, 'kg', 1056, 0, 'enabled', '2019-10-30 18:57:15', '2019-10-30 18:57:15'),
(706, 'inks', 'CYAN (BLUE)', 23, 'kg', 1034, 0, 'enabled', '2019-10-31 00:52:32', '2019-10-31 00:52:32'),
(707, 'inks', 'BLACK', 34, 'kg', 1037, 0, 'enabled', '2019-10-31 00:52:51', '2019-10-31 00:52:51'),
(708, 'inks', 'WHITE', 19, 'kg', 1035, 0, 'enabled', '2019-10-31 00:53:07', '2019-10-31 00:53:07'),
(709, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 101150, 'pcs', 1073, 0, 'enabled', '2019-10-31 20:49:13', '2019-10-31 20:49:13'),
(710, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-11-05 20:36:40', '2019-11-05 20:36:40'),
(711, 'consume', 'PLASTIC PARAS', 12, 'pack', 1048, 0, 'enabled', '2019-11-05 20:36:57', '2019-11-05 20:36:57'),
(712, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-11-05 20:37:15', '2019-11-05 20:37:15'),
(713, 'consume', 'RUBBER BAND 32#', 10, 'pack', 1047, 0, 'enabled', '2019-11-05 20:37:31', '2019-11-05 20:37:31'),
(714, 'consume', 'COTTON RUGS', 58, 'kg', 1065, 0, 'enabled', '2019-11-05 20:37:46', '2019-11-05 20:37:46'),
(715, 'inks', 'WHITE', 20, 'kg', 1035, 0, 'enabled', '2019-11-05 20:38:00', '2019-11-05 20:38:00'),
(717, 'varnish', 'UV WASH', 12, 'liter', 1050, 0, 'enabled', '2019-11-05 20:38:42', '2019-11-05 20:38:42'),
(718, 'biocos', 'BIOCOS SERUM UNIT BOX', 48000, 'pcs', 1074, 0, 'enabled', '2019-11-05 22:58:58', '2019-11-05 22:58:58'),
(719, 'consume', 'RUBBER BAND 32#', 15, 'pack', 1047, 0, 'enabled', '2019-11-07 19:43:01', '2019-11-07 19:43:01'),
(720, 'consume', 'CHANNEL DIE /PATTI ( LOCAL )', 5, 'pack', 1061, 0, 'enabled', '2019-11-07 19:43:18', '2019-11-07 19:43:18'),
(721, 'consume', 'GLOVES', 2, 'pack', 1116, 0, 'enabled', '2019-11-07 19:43:42', '2019-11-07 19:43:42'),
(722, 'consume', 'FACE MASK', 2, 'pack', 1152, 0, 'enabled', '2019-11-07 19:44:00', '2019-11-07 19:44:00'),
(723, 'consume', 'RUBBER BAND 25#', 5, 'pack', 1046, 0, 'enabled', '2019-11-07 20:36:55', '2019-11-07 20:36:55'),
(724, 'biocos', 'BIOCOS SERUM UNIT BOX', 160000, 'pcs', 1074, 0, 'enabled', '2019-11-07 21:33:59', '2019-11-07 21:33:59'),
(725, 'biocos', 'BIOCOS SERUM 12 PCS BOX', 12000, 'pcs', 1075, 0, 'enabled', '2019-11-07 21:34:30', '2019-11-07 21:34:30'),
(726, 'consume', 'ELFI', 6, 'pcs', 1044, 0, 'enabled', '2019-11-08 18:52:55', '2019-11-08 18:52:55'),
(727, 'consume', 'STRAPPING ROLL', 2, 'bundle', 1066, 0, 'enabled', '2019-11-08 18:53:09', '2019-11-08 18:53:09'),
(728, 'consume', 'ELEPHANT SAMAD BOND', 3, 'kg', 1052, 0, 'enabled', '2019-11-08 18:53:27', '2019-11-08 18:53:27'),
(729, 'consume', 'WHITE TAPE', 24, 'pcs', 1043, 0, 'enabled', '2019-11-08 18:53:43', '2019-11-08 18:53:43'),
(730, 'inks', 'WHITE', 10, 'kg', 1035, 0, 'enabled', '2019-11-08 18:53:57', '2019-11-08 18:53:57'),
(731, 'consume', 'PLATE CLEANER', 6, 'liter', 1058, 0, 'enabled', '2019-11-09 18:51:23', '2019-11-09 18:51:23'),
(732, 'consume', 'UV BLANKIT', 5, 'pcs', 1060, 0, 'enabled', '2019-11-09 18:51:41', '2019-11-09 18:51:41'),
(733, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 202300, 'pcs', 1073, 0, 'enabled', '2019-11-11 18:17:17', '2019-11-11 18:17:17'),
(734, 'biocos', 'BIOCOS SERUM UNIT BOX', 68000, 'pcs', 1074, 0, 'enabled', '2019-11-11 19:02:42', '2019-11-11 19:02:42'),
(735, 'biocos', 'BIOCOS SERUM 12 PCS BOX', 12150, 'pcs', 1075, 0, 'enabled', '2019-11-11 19:02:58', '2019-11-11 19:02:58'),
(736, 'varnish', 'DRIP OFF VARNISH 8066', 200, 'kg', 1193, 0, 'enabled', '2019-11-11 20:31:57', '2019-11-11 20:31:57'),
(737, 'varnish', 'DRIPOFF YELLOWISH 6086 NEW', 60, 'kg', 1194, 0, 'enabled', '2019-11-11 20:32:44', '2019-11-11 20:32:44'),
(738, 'inks', 'BLACK', 48, 'kg', 1037, 0, 'enabled', '2019-11-11 20:33:25', '2019-11-11 20:33:25'),
(739, 'inks', 'CYAN (BLUE)', 36, 'kg', 1034, 0, 'enabled', '2019-11-11 20:33:41', '2019-11-11 20:33:41'),
(740, 'inks', 'YELLOW', 59, 'kg', 1036, 0, 'enabled', '2019-11-11 20:33:58', '2019-11-11 20:33:58'),
(741, 'inks', 'RED (magenta)', 60, 'kg', 1038, 0, 'enabled', '2019-11-11 20:34:17', '2019-11-11 20:34:17'),
(742, 'inks', 'WHITE', 108, 'kg', 1035, 0, 'enabled', '2019-11-11 20:34:34', '2019-11-11 20:34:34'),
(743, 'varnish', 'DRIP OFF VARNISH', 100, 'kg', 1039, 0, 'enabled', '2019-11-11 20:36:03', '2019-11-11 20:36:03'),
(744, 'consume', 'COTTON TAPE 3\"', 60, 'pcs', 1041, 0, 'enabled', '2019-11-13 19:31:33', '2019-11-13 19:31:33'),
(745, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-11-13 19:31:52', '2019-11-13 19:31:52'),
(746, 'varnish', 'UV LECQUER', 50, 'kg', 1040, 0, 'enabled', '2019-11-13 19:32:43', '2019-11-13 19:32:43'),
(747, 'varnish', 'DRIP OFF VARNISH 8066', 200, 'kg', 1193, 0, 'enabled', '2019-11-15 19:35:42', '2019-11-15 19:35:42'),
(748, 'consume', 'IPA', 160, 'kg', 1063, 0, 'enabled', '2019-11-15 19:35:57', '2019-11-15 19:35:57'),
(749, 'varnish', 'UV WASH', 24, 'liter', 1050, 0, 'enabled', '2019-11-15 19:36:14', '2019-11-15 19:36:14'),
(750, 'consume', 'RUBBER BAND 32#', 10, 'pack', 1047, 0, 'enabled', '2019-11-15 19:36:29', '2019-11-15 19:36:29'),
(751, 'biocos', 'BIOCOS SERUM CAP WITH PLUG', 70000, 'pcs', 1072, 0, 'enabled', '2019-11-19 22:46:37', '2019-11-19 22:46:37'),
(752, 'biocos', 'BIOCOS SERUM CAP WITH PLUG', 280000, 'pcs', 1072, 0, 'enabled', '2019-11-19 22:47:12', '2019-11-19 22:47:12'),
(753, 'varnish', 'UV LECQUER', 50, 'kg', 1040, 0, 'enabled', '2019-11-21 19:03:00', '2019-11-21 19:03:00'),
(754, 'consume', 'RUBBER BAND 32#', 10, 'pack', 1047, 0, 'enabled', '2019-11-21 19:03:17', '2019-11-21 19:03:17'),
(755, 'consume', 'CAMEL SAMAD', 6, 'kg', 1051, 0, 'enabled', '2019-11-21 19:03:36', '2019-11-21 19:03:36'),
(756, 'consume', 'ELFI', 25, 'pcs', 1044, 0, 'enabled', '2019-11-21 19:03:54', '2019-11-21 19:03:54'),
(757, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-11-21 19:04:14', '2019-11-21 19:04:14'),
(758, 'consume', 'COTTON RUGS', 30, 'kg', 1065, 0, 'enabled', '2019-11-21 19:04:31', '2019-11-21 19:04:31'),
(759, 'consume', 'GLOVES', 4, 'pack', 1116, 0, 'enabled', '2019-11-21 19:04:47', '2019-11-21 19:04:47'),
(760, 'consume', 'PLASTIC PARAS', 12, 'pack', 1048, 0, 'enabled', '2019-11-21 19:06:06', '2019-11-21 19:06:06'),
(761, 'varnish', 'UV LECQUER', 50, 'kg', 1040, 0, 'enabled', '2019-11-22 21:33:54', '2019-11-22 21:33:54'),
(762, 'consume', 'COTTON TAPE 3\"', 60, 'pcs', 1041, 0, 'enabled', '2019-11-25 18:57:13', '2019-11-25 18:57:13'),
(763, 'consume', 'RUBBER BAND 32#', 10, 'pack', 1047, 0, 'enabled', '2019-11-25 18:57:30', '2019-11-25 18:57:30'),
(764, 'consume', 'RUBBER BAND 25#', 2, 'pack', 1046, 0, 'enabled', '2019-11-25 18:57:42', '2019-11-25 18:57:42'),
(765, 'consume', 'IPA', 480, 'kg', 1063, 0, 'enabled', '2019-11-25 18:57:58', '2019-11-25 18:57:58'),
(766, 'varnish', 'UV LECQUER', 75, 'kg', 1040, 0, 'enabled', '2019-11-25 18:58:24', '2019-11-25 18:58:24'),
(767, 'consume', 'CHANNEL DIE /PATTI ( LOCAL )', 5, 'pack', 1061, 0, 'enabled', '2019-11-28 18:28:21', '2019-11-28 18:28:21'),
(768, 'consume', 'COTTON RUGS', 40, 'kg', 1065, 0, 'enabled', '2019-11-28 18:28:35', '2019-11-28 18:28:35'),
(769, 'varnish', 'UV LECQUER', 100, 'kg', 1040, 0, 'enabled', '2019-11-28 18:28:54', '2019-11-28 18:28:54'),
(770, 'consume', 'RUBBER BAND 32#', 10, 'pack', 1047, 0, 'enabled', '2019-11-28 18:29:11', '2019-11-28 18:29:11'),
(771, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 101150, 'pcs', 1073, 0, 'enabled', '2019-11-30 19:57:50', '2019-11-30 19:57:50'),
(772, 'inks', 'WHITE', 25, 'kg', 1035, 0, 'enabled', '2019-12-03 01:24:01', '2019-12-03 01:24:01'),
(773, 'consume', 'CARBAN PAPER', 1, 'pack', 1102, 0, 'enabled', '2019-12-03 01:24:14', '2019-12-03 01:24:14'),
(774, 'consume', 'PLASTIC PARAS', 12, 'pack', 1048, 0, 'enabled', '2019-12-03 01:24:27', '2019-12-03 01:24:27'),
(775, 'consume', 'WHITE TAPE', 24, 'pcs', 1043, 0, 'enabled', '2019-12-03 01:24:42', '2019-12-03 01:24:42'),
(776, 'consume', 'DOUBLE TAPE', 5, 'pcs', 1042, 0, 'enabled', '2019-12-03 01:24:56', '2019-12-03 01:24:56'),
(777, 'consume', 'OFF SET PAPER RIM (100 GRM)', 2, 'bundle', 1064, 0, 'enabled', '2019-12-03 01:25:25', '2019-12-03 01:25:25'),
(778, 'consume', 'OXILAN UV', 20, 'kg', 1056, 0, 'enabled', '2019-12-03 01:25:41', '2019-12-03 01:25:41'),
(779, 'varnish', 'UV WASH', 24, 'liter', 1050, 0, 'enabled', '2019-12-03 01:26:03', '2019-12-03 01:26:03'),
(780, 'consume', 'PLATE CLEANER', 3, 'liter', 1058, 0, 'enabled', '2019-12-03 01:26:21', '2019-12-03 01:26:21'),
(781, 'consume', 'PRINTED BLANKIT', 5, 'pcs', 1059, 0, 'enabled', '2019-12-03 01:26:38', '2019-12-03 01:26:38'),
(782, 'consume', 'UV BLANKIT', 5, 'pcs', 1060, 0, 'enabled', '2019-12-03 01:26:50', '2019-12-03 01:26:50'),
(783, 'consume', 'RUBBER BAND 32#', 10, 'pack', 1047, 0, 'enabled', '2019-12-04 22:57:33', '2019-12-04 22:57:33'),
(784, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-12-04 22:57:47', '2019-12-04 22:57:47'),
(785, 'biocos', 'BIOCOS SERUM UNIT BOX', 25500, 'pcs', 1074, 0, 'enabled', '2019-12-05 01:15:27', '2019-12-05 01:15:27'),
(786, 'consume', 'COTTON TAPE 3\"', 60, 'pcs', 1041, 0, 'enabled', '2019-12-05 19:16:36', '2019-12-05 19:16:36'),
(787, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-12-05 19:16:53', '2019-12-05 19:16:53'),
(788, 'consume', 'RUBBER BAND 32#', 6, 'pack', 1047, 0, 'enabled', '2019-12-05 19:18:03', '2019-12-05 19:18:03'),
(789, 'inks', 'WHITE', 25, 'kg', 1035, 0, 'enabled', '2019-12-05 19:21:29', '2019-12-05 19:21:29'),
(790, 'biocos', 'BIOCOS SOAP SMALL UNIT BOX', 17960, 'pcs', 1078, 0, 'enabled', '2019-12-05 21:38:30', '2019-12-05 21:38:30'),
(791, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 101150, 'pcs', 1073, 0, 'enabled', '2019-12-10 19:38:31', '2019-12-10 19:38:31'),
(792, 'consume', 'RUBBER BAND 32#', 12, 'pack', 1047, 0, 'enabled', '2019-12-11 18:51:33', '2019-12-11 18:51:33'),
(793, 'consume', 'COTTON RUGS', 32, 'kg', 1065, 0, 'enabled', '2019-12-11 18:52:20', '2019-12-11 18:52:20'),
(794, 'consume', 'PRINTED BLANKIT', 10, 'pcs', 1059, 0, 'enabled', '2019-12-11 18:52:36', '2019-12-11 18:52:36'),
(795, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-12-11 18:52:56', '2019-12-11 18:52:56'),
(796, 'inks', 'WHITE', 20, 'kg', 1035, 0, 'enabled', '2019-12-12 20:00:12', '2019-12-12 20:00:12'),
(797, 'biocos', 'BIOCOS SERUM UNIT BOX', 204000, 'pcs', 1074, 0, 'enabled', '2019-12-13 22:49:42', '2019-12-13 22:49:42'),
(798, 'biocos', 'BIOCOS SERUM 12 PCS BOX', 19200, 'pcs', 1075, 0, 'enabled', '2019-12-13 22:50:03', '2019-12-13 22:50:03'),
(799, 'inks', 'WHITE', 214, 'kg', 1035, 0, 'enabled', '2019-12-16 22:25:55', '2019-12-16 22:25:55'),
(800, 'consume', 'CHANNEL DIE /PATTI ( LOCAL )', 5, 'pack', 1061, 0, 'enabled', '2019-12-16 22:26:12', '2019-12-16 22:26:12'),
(801, 'consume', 'PRINTED BLANKIT', 10, 'pcs', 1059, 0, 'enabled', '2019-12-16 22:26:38', '2019-12-16 22:26:38'),
(802, 'varnish', 'UV LECQUER', 1000, 'kg', 1040, 0, 'enabled', '2019-12-16 22:27:00', '2019-12-16 22:27:00'),
(803, 'consume', 'RUBBER BAND 32#', 8, 'pack', 1047, 0, 'enabled', '2019-12-16 22:27:16', '2019-12-16 22:27:16'),
(804, 'consume', 'RUBBER BAND 25#', 2, 'pack', 1046, 0, 'enabled', '2019-12-16 22:27:29', '2019-12-16 22:27:29'),
(805, 'consume', 'COTTON TAPE 3\"', 60, 'pcs', 1041, 0, 'enabled', '2019-12-16 22:27:48', '2019-12-16 22:27:48'),
(806, 'inks', 'RED (magenta)', 72, 'kg', 1038, 0, 'enabled', '2019-12-18 22:15:01', '2019-12-18 22:15:01'),
(807, 'inks', 'YELLOW', 60, 'kg', 1036, 0, 'enabled', '2019-12-18 22:15:16', '2019-12-18 22:15:16'),
(808, 'inks', 'CYAN (BLUE)', 24, 'kg', 1034, 0, 'enabled', '2019-12-18 22:15:32', '2019-12-18 22:15:32'),
(809, 'inks', 'WHITE', 108, 'kg', 1035, 0, 'enabled', '2019-12-18 22:15:46', '2019-12-18 22:15:46'),
(810, 'varnish', 'DRIP OFF VARNISH 8066', 200, 'kg', 1193, 0, 'enabled', '2019-12-18 22:16:02', '2019-12-18 22:16:02'),
(811, 'consume', 'COTTON SHOPPER', 15, 'kg', 1067, 0, 'enabled', '2019-12-18 22:16:16', '2019-12-18 22:16:16'),
(812, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2019-12-18 22:19:29', '2019-12-18 22:19:29'),
(813, 'consume', 'ELFI', 25, 'pcs', 1044, 0, 'enabled', '2019-12-18 22:19:45', '2019-12-18 22:19:45'),
(814, 'consume', 'WHITE TAPE', 24, 'pcs', 1043, 0, 'enabled', '2019-12-18 22:20:00', '2019-12-18 22:20:00'),
(815, 'consume', 'COTTON RUGS', 54, 'kg', 1065, 0, 'enabled', '2019-12-18 22:20:15', '2019-12-18 22:20:15'),
(816, 'consume', 'PLASTIC PARAS', 12, 'pack', 1048, 0, 'enabled', '2019-12-18 22:20:30', '2019-12-18 22:20:30'),
(817, 'varnish', 'UV WASH', 24, 'liter', 1050, 0, 'enabled', '2019-12-18 22:20:47', '2019-12-18 22:20:47'),
(818, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 52598, 'pcs', 1073, 0, 'enabled', '2019-12-19 18:58:40', '2019-12-19 18:58:40'),
(819, 'consume', 'RUBBER BAND 32#', 10, 'pack', 1047, 0, 'enabled', '2019-12-23 18:50:09', '2019-12-23 18:50:09'),
(820, 'consume', 'IPA', 320, 'kg', 1063, 0, 'enabled', '2019-12-23 18:50:24', '2019-12-23 18:50:24'),
(821, 'consume', 'OFF SET PAPER RIM (100 GRM)', 2, 'bundle', 1064, 0, 'enabled', '2019-12-24 20:16:48', '2019-12-24 20:16:48'),
(822, 'consume', 'RUBBER BAND 32#', 15, 'pack', 1047, 0, 'enabled', '2019-12-24 20:17:03', '2019-12-24 20:17:03'),
(823, 'varnish', 'DRIP OFF VARNISH 8066', 400, 'kg', 1193, 0, 'enabled', '2019-12-24 20:18:37', '2019-12-24 20:18:37'),
(824, 'inks', 'WHITE', 216, 'kg', 1035, 0, 'enabled', '2019-12-24 20:18:58', '2019-12-24 20:18:58'),
(825, 'varnish', 'DRIP OF PREMIER', 72, 'kg', 1071, 0, 'enabled', '2019-12-24 20:19:21', '2019-12-24 20:19:21'),
(826, 'varnish', 'DRIPOFF YELLOWISH 6086 NEW', 72, 'kg', 1194, 0, 'enabled', '2019-12-24 20:19:50', '2019-12-24 20:19:50'),
(827, 'consume', 'PASTING POWDER', 4, 'pcs', 1049, 0, 'enabled', '2019-12-26 19:14:59', '2019-12-26 19:14:59'),
(828, 'inks', 'CYAN (BLUE)', 11, 'kg', 1034, 0, 'enabled', '2019-12-26 19:15:14', '2019-12-26 19:15:14'),
(829, 'varnish', 'DRIP OFF VARNISH 8066', 20, 'kg', 1193, 0, 'enabled', '2019-12-26 19:19:34', '2019-12-26 19:19:34'),
(830, 'consume', 'COTTON TAPE 3\"', 60, 'pcs', 1041, 0, 'enabled', '2019-12-31 18:56:32', '2019-12-31 18:56:32'),
(831, 'consume', 'COTTON RUGS', 40, 'kg', 1065, 0, 'enabled', '2019-12-31 18:56:51', '2019-12-31 18:56:51'),
(832, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2019-12-31 18:57:06', '2019-12-31 18:57:06'),
(833, 'consume', 'CHANNEL DIE /PATTI ( LOCAL )', 5, 'pack', 1061, 0, 'enabled', '2020-01-04 19:29:51', '2020-01-04 19:29:51'),
(834, 'consume', 'RUBBER BAND 32#', 10, 'pack', 1047, 0, 'enabled', '2020-01-04 19:30:07', '2020-01-04 19:30:07'),
(835, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2020-01-04 19:30:25', '2020-01-04 19:30:25'),
(836, 'consume', 'GLOVES', 1, 'pack', 1116, 0, 'enabled', '2020-01-04 19:30:45', '2020-01-04 19:30:45'),
(837, 'consume', 'FACE MASK', 1, 'pack', 1152, 0, 'enabled', '2020-01-04 19:31:02', '2020-01-04 19:31:02'),
(838, 'consume', 'PLASTIC PARAS', 6, 'pack', 1048, 0, 'enabled', '2020-01-04 19:31:18', '2020-01-04 19:31:18'),
(839, 'biocos', 'BIOCOS SERUM 2 ML GLASS VIAL', 100000, 'pcs', 1073, 0, 'enabled', '2020-01-05 00:41:06', '2020-01-05 00:41:06'),
(840, 'biocos', 'BIOCOS SERUM UNIT BOX', 323600, 'pcs', 1074, 0, 'enabled', '2020-01-05 00:41:47', '2020-01-05 00:41:47'),
(841, 'biocos', 'BIOCOS SERUM 12 PCS BOX', 38150, 'pcs', 1075, 0, 'enabled', '2020-01-05 00:42:08', '2020-01-05 00:42:08'),
(842, 'biocos', 'BIOCOS MEN SERUM CAP WITH PLUG', 50000, 'pcs', 1098, 0, 'enabled', '2020-01-05 00:44:25', '2020-01-05 00:44:25'),
(843, 'biocos', 'BIOCOS SERUM CAP WITH PLUG', 450000, 'pcs', 1072, 0, 'enabled', '2020-01-05 00:44:59', '2020-01-05 00:44:59'),
(844, 'consume', 'UV BLANKIT', 5, 'pcs', 1060, 0, 'enabled', '2020-01-07 18:13:51', '2020-01-07 18:13:51'),
(845, 'consume', 'PRINTED BLANKIT', 5, 'pcs', 1059, 0, 'enabled', '2020-01-07 18:14:08', '2020-01-07 18:14:08'),
(846, 'varnish', 'UV WASH', 20, 'liter', 1050, 0, 'enabled', '2020-01-07 18:14:23', '2020-01-07 18:14:23'),
(847, 'consume', 'OXILAN UV', 20, 'kg', 1056, 0, 'enabled', '2020-01-07 18:14:39', '2020-01-07 18:14:39'),
(848, 'consume', 'RUBBER BAND 32#', 10, 'pack', 1047, 0, 'enabled', '2020-01-07 18:14:53', '2020-01-07 18:14:53'),
(849, 'consume', 'CARBAN PAPER', 1, 'pack', 1102, 0, 'enabled', '2020-01-07 18:15:09', '2020-01-07 18:15:09'),
(850, 'consume', 'FACE MASK', 2, 'pack', 1152, 0, 'enabled', '2020-01-07 18:15:23', '2020-01-07 18:15:23'),
(851, 'consume', 'GLOVES', 2, 'pack', 1116, 0, 'enabled', '2020-01-07 18:15:38', '2020-01-07 18:15:38'),
(852, 'consume', 'STRAPPING ROLL', 1, 'bundle', 1066, 0, 'enabled', '2020-01-07 18:15:51', '2020-01-07 18:15:51'),
(853, 'consume', 'EMBOSE SHEET', 24, 'pcs', 1053, 0, 'enabled', '2020-01-10 18:27:17', '2020-01-10 18:27:17'),
(854, 'consume', 'RUBBER BAND 25#', 2, 'pack', 1046, 0, 'enabled', '2020-01-10 18:27:40', '2020-01-10 18:27:40'),
(855, 'consume', 'RUBBER BAND 32#', 13, 'pack', 1047, 0, 'enabled', '2020-01-10 18:27:55', '2020-01-10 18:27:55'),
(856, 'consume', 'COTTON TAPE 3\"', 60, 'pcs', 1041, 0, 'enabled', '2020-01-10 18:28:17', '2020-01-10 18:28:17'),
(857, 'consume', 'CAMEL SAMAD', 3, 'kg', 1051, 0, 'enabled', '2020-01-10 18:28:31', '2020-01-10 18:28:31'),
(858, 'consume', 'OFF SET PAPER RIM (100 GRM)', 2, 'bundle', 1064, 0, 'enabled', '2020-01-10 18:28:48', '2020-01-10 18:28:48'),
(859, 'varnish', 'UV WASH', 24, 'liter', 1050, 0, 'enabled', '2020-01-10 18:29:02', '2020-01-10 18:29:02'),
(860, 'inks', 'CYAN (BLUE)', 258, 'kg', 1034, 0, 'enabled', '2020-01-20 11:10:45', '2020-01-20 11:10:45'),
(861, 'inks', 'CYAN (BLUE)', 12, 'kg', 1034, 0, 'enabled', '2020-03-05 10:28:36', '2020-03-05 10:28:36'),
(862, 'inks', 'BLACK', 23, 'kg', 1037, 0, 'enabled', '2020-03-05 10:28:36', '2020-03-05 10:28:36'),
(863, 'biocos', 'BIOCOS SERUM CAP WITH PLUG', 100, 'pcs', 1072, 0, 'enabled', '2020-03-05 10:32:32', '2020-03-05 10:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-04-26 10:57:22', '2020-04-26 10:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2020-04-26 10:57:22', '2020-04-26 10:57:22', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, 5, 4, '2020-04-26 10:57:22', '2020-12-02 08:15:01', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, 5, 3, '2020-04-26 10:57:22', '2020-12-02 08:15:01', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, 5, 1, '2020-04-26 10:57:22', '2020-12-02 08:15:01', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 8, '2020-04-26 10:57:22', '2020-12-04 15:01:50', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 7, '2020-04-26 10:57:22', '2020-12-04 15:01:39', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 8, '2020-04-26 10:57:22', '2020-12-04 15:01:39', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 9, '2020-04-26 10:57:22', '2020-12-04 15:01:39', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 10, '2020-04-26 10:57:22', '2020-12-04 15:01:39', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, 5, 12, '2020-04-26 10:57:22', '2020-12-04 15:01:39', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, 5, 6, '2020-04-26 10:57:24', '2020-12-04 15:01:39', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, 5, 2, '2020-04-26 10:57:24', '2020-12-02 08:15:01', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, 5, 5, '2020-04-26 10:57:24', '2020-12-04 15:01:39', 'voyager.pages.index', NULL),
(14, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 11, '2020-04-26 10:57:25', '2020-12-04 15:01:39', 'voyager.hooks', NULL),
(16, 1, 'Products', '', '_self', 'voyager-ticket', '#000000', 36, 1, '2020-05-18 15:31:38', '2020-12-11 15:11:59', 'voyager.products.index', 'null'),
(17, 1, 'Vendor Purchase Orders', '', '_self', 'voyager-lab', '#000000', 32, 1, '2020-11-20 14:56:19', '2020-12-11 15:09:33', 'voyager.vendor-purchase-orders.index', 'null'),
(18, 1, 'Companies', '', '_self', 'voyager-company', '#000000', 36, 3, '2020-11-20 15:09:28', '2020-12-11 15:12:57', 'voyager.companies.index', 'null'),
(19, 1, 'Vendors', '', '_self', 'voyager-people', '#000000', 32, 2, '2020-11-20 15:10:26', '2020-12-11 15:09:50', 'voyager.vendors.index', 'null'),
(20, 1, 'Units', '', '_self', 'voyager-anchor', '#000000', 36, 4, '2020-11-21 01:46:32', '2020-12-11 15:13:19', 'voyager.units.index', 'null'),
(21, 1, 'Vendor Purchase Terms', '', '_self', 'voyager-credit-cards', '#000000', 32, 3, '2020-11-21 02:25:10', '2020-12-11 15:10:26', 'voyager.vendor-purchase-terms.index', 'null'),
(22, 1, 'Vendor P.O Expenses', '', '_self', 'voyager-dollar', '#000000', 32, 5, '2020-11-21 02:49:38', '2020-12-11 15:10:53', 'voyager.vendor-purchase-order-expenses.index', 'null'),
(23, 1, 'Vendor Letter Credits', '', '_self', 'voyager-credit-cards', '#000000', 32, 4, '2020-11-28 11:12:34', '2020-12-11 15:11:36', 'voyager.vendor-letter-credits.index', 'null'),
(24, 1, 'Warehouses', '', '_self', 'voyager-documentation', '#000000', 36, 5, '2020-11-28 15:48:03', '2020-12-11 15:14:12', 'voyager.warehouses.index', 'null'),
(25, 1, 'Stock Managments', '', '_self', 'voyager-markdown', '#000000', 36, 2, '2020-11-29 07:45:13', '2020-12-11 15:12:40', 'voyager.stock-managments.index', 'null'),
(27, 1, 'Transporters', '', '_self', 'voyager-ship', '#000000', NULL, 5, '2020-12-02 02:17:49', '2020-12-11 15:14:55', 'voyager.transporters.index', 'null'),
(28, 1, 'Customers', '', '_self', 'voyager-people', '#000000', 31, 1, '2020-12-02 07:53:45', '2020-12-11 15:06:19', 'voyager.customers.index', 'null'),
(29, 1, 'Payment Methods', '', '_self', 'voyager-dollar', '#000000', NULL, 7, '2020-12-02 08:09:38', '2020-12-11 15:16:07', 'voyager.payment-methods.index', 'null'),
(30, 1, 'Customer Purchase Orders', '', '_self', 'voyager-logbook', '#000000', 31, 2, '2020-12-02 08:14:11', '2020-12-11 15:07:03', 'voyager.customer-purchase-orders.index', 'null'),
(31, 1, 'Customer Purchase Order', '', '_self', 'voyager-buy', '#000000', NULL, 2, '2020-12-02 08:16:44', '2020-12-04 09:48:39', NULL, ''),
(32, 1, 'Vendor Purchase', '', '_self', 'voyager-dollar', '#000000', NULL, 3, '2020-12-02 08:17:54', '2020-12-04 09:48:50', NULL, ''),
(33, 1, 'Customer P.O Expenses', '', '_self', 'voyager-dollar', '#000000', 31, 3, '2020-12-04 09:48:13', '2020-12-11 15:11:03', 'voyager.customer-purchase-order-expenses.index', 'null'),
(34, 1, 'Customer Purchase Terms', '', '_self', 'voyager-params', '#000000', 31, 4, '2020-12-04 10:14:33', '2020-12-11 15:08:52', 'voyager.customer-purchase-terms.index', 'null'),
(35, 1, 'Commission Agents', '', '_self', 'voyager-group', '#000000', NULL, 6, '2020-12-04 10:21:03', '2020-12-11 15:15:34', 'voyager.commission-agents.index', 'null'),
(36, 1, 'Stock', '', '_self', 'voyager-list', '#000000', NULL, 4, '2020-12-04 15:01:29', '2020-12-04 15:01:43', NULL, ''),
(37, 1, 'Delivery Orders', '', '_self', NULL, NULL, NULL, 9, '2020-12-05 02:54:08', '2020-12-05 02:54:08', 'voyager.delivery-orders.index', NULL),
(38, 1, 'Banks', '', '_self', NULL, NULL, NULL, 10, '2020-12-31 13:34:21', '2020-12-31 13:34:21', 'voyager.banks.index', NULL),
(39, 1, 'Bank Accounts', '', '_self', NULL, NULL, NULL, 11, '2020-12-31 13:41:55', '2020-12-31 13:41:55', 'voyager.bank-accounts.index', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2016_01_01_000000_add_voyager_user_fields', 1),
(3, '2016_01_01_000000_create_data_types_table', 1),
(4, '2016_05_19_173453_create_menu_table', 1),
(5, '2016_10_21_190000_create_roles_table', 1),
(6, '2016_10_21_190000_create_settings_table', 1),
(7, '2016_11_30_135954_create_permission_table', 1),
(8, '2016_11_30_141208_create_permission_role_table', 1),
(9, '2016_12_26_201236_data_types__add__server_side', 1),
(10, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(11, '2017_01_14_005015_create_translations_table', 1),
(12, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(13, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(14, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(15, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(16, '2017_08_05_000000_add_group_to_settings_table', 1),
(17, '2017_11_26_013050_add_user_role_relationship', 1),
(18, '2017_11_26_015000_create_user_roles_table', 1),
(19, '2018_03_11_000000_add_user_settings', 1),
(20, '2018_03_14_000000_add_details_to_data_types_table', 1),
(21, '2018_03_16_000000_make_settings_value_nullable', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2016_01_01_000000_create_pages_table', 2),
(24, '2016_01_01_000000_create_posts_table', 2),
(25, '2016_02_15_204651_create_categories_table', 2),
(26, '2017_04_11_000000_alter_post_nullable_fields_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2020-04-26 10:57:24', '2020-04-26 10:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'check', '2020-12-02 08:10:50', '2020-12-02 08:10:50'),
(2, 'cash', '2020-12-02 08:10:59', '2020-12-02 08:10:59'),
(3, 'online bank transfer', '2020-12-02 08:11:13', '2020-12-02 08:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(2, 'browse_bread', NULL, '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(3, 'browse_database', NULL, '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(4, 'browse_media', NULL, '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(5, 'browse_compass', NULL, '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(6, 'browse_menus', 'menus', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(7, 'read_menus', 'menus', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(8, 'edit_menus', 'menus', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(9, 'add_menus', 'menus', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(10, 'delete_menus', 'menus', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(11, 'browse_roles', 'roles', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(12, 'read_roles', 'roles', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(13, 'edit_roles', 'roles', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(14, 'add_roles', 'roles', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(15, 'delete_roles', 'roles', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(16, 'browse_users', 'users', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(17, 'read_users', 'users', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(18, 'edit_users', 'users', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(19, 'add_users', 'users', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(20, 'delete_users', 'users', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(21, 'browse_settings', 'settings', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(22, 'read_settings', 'settings', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(23, 'edit_settings', 'settings', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(24, 'add_settings', 'settings', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(25, 'delete_settings', 'settings', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(26, 'browse_categories', 'categories', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(27, 'read_categories', 'categories', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(28, 'edit_categories', 'categories', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(29, 'add_categories', 'categories', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(30, 'delete_categories', 'categories', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(31, 'browse_posts', 'posts', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(32, 'read_posts', 'posts', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(33, 'edit_posts', 'posts', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(34, 'add_posts', 'posts', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(35, 'delete_posts', 'posts', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(36, 'browse_pages', 'pages', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(37, 'read_pages', 'pages', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(38, 'edit_pages', 'pages', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(39, 'add_pages', 'pages', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(40, 'delete_pages', 'pages', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(41, 'browse_hooks', NULL, '2020-04-26 10:57:25', '2020-04-26 10:57:25'),
(42, 'browse_consumable_inventory_transactions', 'consumable_inventory_transactions', '2020-04-26 11:18:14', '2020-04-26 11:18:14'),
(43, 'read_consumable_inventory_transactions', 'consumable_inventory_transactions', '2020-04-26 11:18:14', '2020-04-26 11:18:14'),
(44, 'edit_consumable_inventory_transactions', 'consumable_inventory_transactions', '2020-04-26 11:18:14', '2020-04-26 11:18:14'),
(45, 'add_consumable_inventory_transactions', 'consumable_inventory_transactions', '2020-04-26 11:18:14', '2020-04-26 11:18:14'),
(46, 'delete_consumable_inventory_transactions', 'consumable_inventory_transactions', '2020-04-26 11:18:14', '2020-04-26 11:18:14'),
(47, 'browse_products', 'products', '2020-05-18 15:31:37', '2020-05-18 15:31:37'),
(48, 'read_products', 'products', '2020-05-18 15:31:37', '2020-05-18 15:31:37'),
(49, 'edit_products', 'products', '2020-05-18 15:31:37', '2020-05-18 15:31:37'),
(50, 'add_products', 'products', '2020-05-18 15:31:37', '2020-05-18 15:31:37'),
(51, 'delete_products', 'products', '2020-05-18 15:31:37', '2020-05-18 15:31:37'),
(52, 'browse_vendor_purchase_orders', 'vendor_purchase_orders', '2020-11-20 14:56:19', '2020-11-20 14:56:19'),
(53, 'read_vendor_purchase_orders', 'vendor_purchase_orders', '2020-11-20 14:56:19', '2020-11-20 14:56:19'),
(54, 'edit_vendor_purchase_orders', 'vendor_purchase_orders', '2020-11-20 14:56:19', '2020-11-20 14:56:19'),
(55, 'add_vendor_purchase_orders', 'vendor_purchase_orders', '2020-11-20 14:56:19', '2020-11-20 14:56:19'),
(56, 'delete_vendor_purchase_orders', 'vendor_purchase_orders', '2020-11-20 14:56:19', '2020-11-20 14:56:19'),
(57, 'browse_companies', 'companies', '2020-11-20 15:09:28', '2020-11-20 15:09:28'),
(58, 'read_companies', 'companies', '2020-11-20 15:09:28', '2020-11-20 15:09:28'),
(59, 'edit_companies', 'companies', '2020-11-20 15:09:28', '2020-11-20 15:09:28'),
(60, 'add_companies', 'companies', '2020-11-20 15:09:28', '2020-11-20 15:09:28'),
(61, 'delete_companies', 'companies', '2020-11-20 15:09:28', '2020-11-20 15:09:28'),
(62, 'browse_vendors', 'vendors', '2020-11-20 15:10:26', '2020-11-20 15:10:26'),
(63, 'read_vendors', 'vendors', '2020-11-20 15:10:26', '2020-11-20 15:10:26'),
(64, 'edit_vendors', 'vendors', '2020-11-20 15:10:26', '2020-11-20 15:10:26'),
(65, 'add_vendors', 'vendors', '2020-11-20 15:10:26', '2020-11-20 15:10:26'),
(66, 'delete_vendors', 'vendors', '2020-11-20 15:10:26', '2020-11-20 15:10:26'),
(67, 'browse_units', 'units', '2020-11-21 01:46:31', '2020-11-21 01:46:31'),
(68, 'read_units', 'units', '2020-11-21 01:46:31', '2020-11-21 01:46:31'),
(69, 'edit_units', 'units', '2020-11-21 01:46:31', '2020-11-21 01:46:31'),
(70, 'add_units', 'units', '2020-11-21 01:46:31', '2020-11-21 01:46:31'),
(71, 'delete_units', 'units', '2020-11-21 01:46:31', '2020-11-21 01:46:31'),
(72, 'browse_vendor_purchase_terms', 'vendor_purchase_terms', '2020-11-21 02:25:10', '2020-11-21 02:25:10'),
(73, 'read_vendor_purchase_terms', 'vendor_purchase_terms', '2020-11-21 02:25:10', '2020-11-21 02:25:10'),
(74, 'edit_vendor_purchase_terms', 'vendor_purchase_terms', '2020-11-21 02:25:10', '2020-11-21 02:25:10'),
(75, 'add_vendor_purchase_terms', 'vendor_purchase_terms', '2020-11-21 02:25:10', '2020-11-21 02:25:10'),
(76, 'delete_vendor_purchase_terms', 'vendor_purchase_terms', '2020-11-21 02:25:10', '2020-11-21 02:25:10'),
(77, 'browse_vendor_purchase_order_expenses', 'vendor_purchase_order_expenses', '2020-11-21 02:49:38', '2020-11-21 02:49:38'),
(78, 'read_vendor_purchase_order_expenses', 'vendor_purchase_order_expenses', '2020-11-21 02:49:38', '2020-11-21 02:49:38'),
(79, 'edit_vendor_purchase_order_expenses', 'vendor_purchase_order_expenses', '2020-11-21 02:49:38', '2020-11-21 02:49:38'),
(80, 'add_vendor_purchase_order_expenses', 'vendor_purchase_order_expenses', '2020-11-21 02:49:38', '2020-11-21 02:49:38'),
(81, 'delete_vendor_purchase_order_expenses', 'vendor_purchase_order_expenses', '2020-11-21 02:49:38', '2020-11-21 02:49:38'),
(82, 'browse_vendor_letter_credits', 'vendor_letter_credits', '2020-11-28 11:12:33', '2020-11-28 11:12:33'),
(83, 'read_vendor_letter_credits', 'vendor_letter_credits', '2020-11-28 11:12:33', '2020-11-28 11:12:33'),
(84, 'edit_vendor_letter_credits', 'vendor_letter_credits', '2020-11-28 11:12:33', '2020-11-28 11:12:33'),
(85, 'add_vendor_letter_credits', 'vendor_letter_credits', '2020-11-28 11:12:33', '2020-11-28 11:12:33'),
(86, 'delete_vendor_letter_credits', 'vendor_letter_credits', '2020-11-28 11:12:33', '2020-11-28 11:12:33'),
(87, 'browse_warehouses', 'warehouses', '2020-11-28 15:48:03', '2020-11-28 15:48:03'),
(88, 'read_warehouses', 'warehouses', '2020-11-28 15:48:03', '2020-11-28 15:48:03'),
(89, 'edit_warehouses', 'warehouses', '2020-11-28 15:48:03', '2020-11-28 15:48:03'),
(90, 'add_warehouses', 'warehouses', '2020-11-28 15:48:03', '2020-11-28 15:48:03'),
(91, 'delete_warehouses', 'warehouses', '2020-11-28 15:48:03', '2020-11-28 15:48:03'),
(92, 'browse_stock_managments', 'stock_managments', '2020-11-29 07:45:13', '2020-11-29 07:45:13'),
(93, 'read_stock_managments', 'stock_managments', '2020-11-29 07:45:13', '2020-11-29 07:45:13'),
(94, 'edit_stock_managments', 'stock_managments', '2020-11-29 07:45:13', '2020-11-29 07:45:13'),
(95, 'add_stock_managments', 'stock_managments', '2020-11-29 07:45:13', '2020-11-29 07:45:13'),
(96, 'delete_stock_managments', 'stock_managments', '2020-11-29 07:45:13', '2020-11-29 07:45:13'),
(102, 'browse_transporters', 'transporters', '2020-12-02 02:17:49', '2020-12-02 02:17:49'),
(103, 'read_transporters', 'transporters', '2020-12-02 02:17:49', '2020-12-02 02:17:49'),
(104, 'edit_transporters', 'transporters', '2020-12-02 02:17:49', '2020-12-02 02:17:49'),
(105, 'add_transporters', 'transporters', '2020-12-02 02:17:49', '2020-12-02 02:17:49'),
(106, 'delete_transporters', 'transporters', '2020-12-02 02:17:49', '2020-12-02 02:17:49'),
(107, 'browse_customers', 'customers', '2020-12-02 07:53:45', '2020-12-02 07:53:45'),
(108, 'read_customers', 'customers', '2020-12-02 07:53:45', '2020-12-02 07:53:45'),
(109, 'edit_customers', 'customers', '2020-12-02 07:53:45', '2020-12-02 07:53:45'),
(110, 'add_customers', 'customers', '2020-12-02 07:53:45', '2020-12-02 07:53:45'),
(111, 'delete_customers', 'customers', '2020-12-02 07:53:45', '2020-12-02 07:53:45'),
(112, 'browse_payment_methods', 'payment_methods', '2020-12-02 08:09:38', '2020-12-02 08:09:38'),
(113, 'read_payment_methods', 'payment_methods', '2020-12-02 08:09:38', '2020-12-02 08:09:38'),
(114, 'edit_payment_methods', 'payment_methods', '2020-12-02 08:09:38', '2020-12-02 08:09:38'),
(115, 'add_payment_methods', 'payment_methods', '2020-12-02 08:09:38', '2020-12-02 08:09:38'),
(116, 'delete_payment_methods', 'payment_methods', '2020-12-02 08:09:38', '2020-12-02 08:09:38'),
(117, 'browse_customer_purchase_orders', 'customer_purchase_orders', '2020-12-02 08:14:11', '2020-12-02 08:14:11'),
(118, 'read_customer_purchase_orders', 'customer_purchase_orders', '2020-12-02 08:14:11', '2020-12-02 08:14:11'),
(119, 'edit_customer_purchase_orders', 'customer_purchase_orders', '2020-12-02 08:14:11', '2020-12-02 08:14:11'),
(120, 'add_customer_purchase_orders', 'customer_purchase_orders', '2020-12-02 08:14:11', '2020-12-02 08:14:11'),
(121, 'delete_customer_purchase_orders', 'customer_purchase_orders', '2020-12-02 08:14:11', '2020-12-02 08:14:11'),
(122, 'browse_customer_purchase_order_expenses', 'customer_purchase_order_expenses', '2020-12-04 09:48:12', '2020-12-04 09:48:12'),
(123, 'read_customer_purchase_order_expenses', 'customer_purchase_order_expenses', '2020-12-04 09:48:12', '2020-12-04 09:48:12'),
(124, 'edit_customer_purchase_order_expenses', 'customer_purchase_order_expenses', '2020-12-04 09:48:12', '2020-12-04 09:48:12'),
(125, 'add_customer_purchase_order_expenses', 'customer_purchase_order_expenses', '2020-12-04 09:48:12', '2020-12-04 09:48:12'),
(126, 'delete_customer_purchase_order_expenses', 'customer_purchase_order_expenses', '2020-12-04 09:48:12', '2020-12-04 09:48:12'),
(127, 'browse_customer_purchase_terms', 'customer_purchase_terms', '2020-12-04 10:14:33', '2020-12-04 10:14:33'),
(128, 'read_customer_purchase_terms', 'customer_purchase_terms', '2020-12-04 10:14:33', '2020-12-04 10:14:33'),
(129, 'edit_customer_purchase_terms', 'customer_purchase_terms', '2020-12-04 10:14:33', '2020-12-04 10:14:33'),
(130, 'add_customer_purchase_terms', 'customer_purchase_terms', '2020-12-04 10:14:33', '2020-12-04 10:14:33'),
(131, 'delete_customer_purchase_terms', 'customer_purchase_terms', '2020-12-04 10:14:33', '2020-12-04 10:14:33'),
(132, 'browse_commission_agents', 'commission_agents', '2020-12-04 10:21:03', '2020-12-04 10:21:03'),
(133, 'read_commission_agents', 'commission_agents', '2020-12-04 10:21:03', '2020-12-04 10:21:03'),
(134, 'edit_commission_agents', 'commission_agents', '2020-12-04 10:21:03', '2020-12-04 10:21:03'),
(135, 'add_commission_agents', 'commission_agents', '2020-12-04 10:21:03', '2020-12-04 10:21:03'),
(136, 'delete_commission_agents', 'commission_agents', '2020-12-04 10:21:03', '2020-12-04 10:21:03'),
(137, 'browse_delivery_orders', 'delivery_orders', '2020-12-05 02:54:08', '2020-12-05 02:54:08'),
(138, 'read_delivery_orders', 'delivery_orders', '2020-12-05 02:54:08', '2020-12-05 02:54:08'),
(139, 'edit_delivery_orders', 'delivery_orders', '2020-12-05 02:54:08', '2020-12-05 02:54:08'),
(140, 'add_delivery_orders', 'delivery_orders', '2020-12-05 02:54:08', '2020-12-05 02:54:08'),
(141, 'delete_delivery_orders', 'delivery_orders', '2020-12-05 02:54:08', '2020-12-05 02:54:08'),
(142, 'browse_banks', 'banks', '2020-12-31 13:34:21', '2020-12-31 13:34:21'),
(143, 'read_banks', 'banks', '2020-12-31 13:34:21', '2020-12-31 13:34:21'),
(144, 'edit_banks', 'banks', '2020-12-31 13:34:21', '2020-12-31 13:34:21'),
(145, 'add_banks', 'banks', '2020-12-31 13:34:21', '2020-12-31 13:34:21'),
(146, 'delete_banks', 'banks', '2020-12-31 13:34:21', '2020-12-31 13:34:21'),
(147, 'browse_bank_accounts', 'bank_accounts', '2020-12-31 13:41:55', '2020-12-31 13:41:55'),
(148, 'read_bank_accounts', 'bank_accounts', '2020-12-31 13:41:55', '2020-12-31 13:41:55'),
(149, 'edit_bank_accounts', 'bank_accounts', '2020-12-31 13:41:55', '2020-12-31 13:41:55'),
(150, 'add_bank_accounts', 'bank_accounts', '2020-12-31 13:41:55', '2020-12-31 13:41:55'),
(151, 'delete_bank_accounts', 'bank_accounts', '2020-12-31 13:41:55', '2020-12-31 13:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2020-04-26 10:57:24', '2020-04-26 10:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `po_expenses`
--

CREATE TABLE `po_expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `po_id` int(11) DEFAULT NULL,
  `expense_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `expense_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `po_expenses`
--

INSERT INTO `po_expenses` (`id`, `po_id`, `expense_description`, `amount`, `expense_id`, `created_at`, `updated_at`) VALUES
(29, 20, 'sales tax', 82, 1, '2020-12-04 16:35:40', '2020-12-04 16:35:40'),
(30, 20, 'duty', 24, 2, '2020-12-04 16:35:40', '2020-12-04 16:35:40'),
(31, 21, 'sales tax', 170000, 1, '2020-12-04 16:47:51', '2020-12-04 16:47:51'),
(32, 21, 'duty', 50000, 2, '2020-12-04 16:47:51', '2020-12-04 16:47:51'),
(33, 21, 'income tax', 50000, 3, '2020-12-04 16:47:51', '2020-12-04 16:47:51'),
(34, 22, 'sales tax', 44, 1, '2020-12-12 04:30:09', '2020-12-12 04:30:09'),
(35, 22, 'duty', 13, 2, '2020-12-12 04:30:09', '2020-12-12 04:30:09'),
(36, 22, 'income tax', 13, 3, '2020-12-12 04:30:09', '2020-12-12 04:30:09'),
(37, 22, 'value edition tax', 8, 4, '2020-12-12 04:30:09', '2020-12-12 04:30:09'),
(42, 23, 'sales tax', 32858, 1, '2020-12-12 04:48:33', '2020-12-12 04:48:33'),
(43, 23, 'duty', 9664, 2, '2020-12-12 04:48:33', '2020-12-12 04:48:33'),
(59, 24, 'sales tax', 372, 1, '2020-12-12 05:00:49', '2020-12-12 05:00:49'),
(60, 24, 'duty', 110, 2, '2020-12-12 05:00:49', '2020-12-12 05:00:49'),
(61, 24, 'income tax', 110, 3, '2020-12-12 05:00:49', '2020-12-12 05:00:49'),
(66, 25, 'sales tax', 43520, 1, '2020-12-12 05:07:45', '2020-12-12 05:07:45'),
(67, 25, 'duty', 12800, 2, '2020-12-12 05:07:45', '2020-12-12 05:07:45'),
(68, 26, 'sales tax', 490960, 1, '2020-12-12 05:09:45', '2020-12-12 05:09:45'),
(69, 26, 'duty', 144400, 2, '2020-12-12 05:09:45', '2020-12-12 05:09:45'),
(70, 26, 'income tax', 144400, 3, '2020-12-12 05:09:45', '2020-12-12 05:09:45'),
(73, 27, 'sales tax', 3570000, 1, '2020-12-12 06:28:18', '2020-12-12 06:28:18'),
(74, 27, 'income tax', 0, 3, '2020-12-12 06:28:18', '2020-12-12 06:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `po_terms`
--

CREATE TABLE `po_terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `po_id` int(11) DEFAULT NULL,
  `term_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `po_terms`
--

INSERT INTO `po_terms` (`id`, `po_id`, `term_description`, `term_id`, `created_at`, `updated_at`) VALUES
(169, 20, 'Size of Material Must be  With In Range', 1, '2020-12-04 16:35:40', '2020-12-04 16:35:40'),
(170, 20, 'Moisture Shouldn\'t Exceed 08%', 2, '2020-12-04 16:35:40', '2020-12-04 16:35:40'),
(171, 21, 'Size of Material Must be  With In Range', 1, '2020-12-04 16:47:51', '2020-12-04 16:47:51'),
(172, 21, 'Moisture Shouldn\'t Exceed 08%', 2, '2020-12-04 16:47:51', '2020-12-04 16:47:51'),
(173, 21, 'Size of Material shouldn\'t below 25mm', 3, '2020-12-04 16:47:51', '2020-12-04 16:47:51'),
(174, 21, 'Paymnet will be Clear After 25 working Days', 4, '2020-12-04 16:47:51', '2020-12-04 16:47:51'),
(175, 21, 'All Quality Must be on Commertial Basis', 5, '2020-12-04 16:47:51', '2020-12-04 16:47:51'),
(176, 21, 'Bill of Entery is Mandatory for Invoice', 6, '2020-12-04 16:47:51', '2020-12-04 16:47:51'),
(177, 21, 'Transportor Wil be The XYZ', 7, '2020-12-04 16:47:51', '2020-12-04 16:47:51'),
(225, 25, 'Size of Material Must be  With In Range', 1, '2020-12-12 05:07:45', '2020-12-12 05:07:45'),
(226, 25, 'Size of Material shouldn\'t below 25mm', 3, '2020-12-12 05:07:45', '2020-12-12 05:07:45'),
(227, 25, 'All Quality Must be on Commertial Basis', 5, '2020-12-12 05:07:45', '2020-12-12 05:07:45'),
(228, 26, 'Size of Material Must be  With In Range', 1, '2020-12-12 05:09:45', '2020-12-12 05:09:45'),
(229, 26, 'Moisture Shouldn\'t Exceed 08%', 2, '2020-12-12 05:09:45', '2020-12-12 05:09:45'),
(234, 27, 'Size of Material Must be  With In Range', 1, '2020-12-12 06:28:18', '2020-12-12 06:28:18'),
(235, 27, 'Moisture Shouldn\'t Exceed 08%', 2, '2020-12-12 06:28:18', '2020-12-12 06:28:18'),
(236, 27, 'Paymnet will be Clear After 25 working Days', 4, '2020-12-12 06:28:18', '2020-12-12 06:28:18'),
(237, 27, 'All Quality Must be on Commertial Basis', 5, '2020-12-12 06:28:18', '2020-12-12 06:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `po_term_conditions`
--

CREATE TABLE `po_term_conditions` (
  `id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `term_cndiotion_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Indonasia Coal', 'bituminous', '2020-11-20 15:37:36', '2020-11-20 15:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2020-04-26 10:57:22', '2020-04-26 10:57:22'),
(2, 'user', 'Normal User', '2020-04-26 10:57:22', '2020-04-26 10:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Wisam Enterprises', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Wisam Enterprises.', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', 'settings\\December2020\\CRk4MPktzleZKIsKKEMm.png', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `sm_bank_accounts`
--

CREATE TABLE `sm_bank_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_balance` double(10,2) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT 1,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User' COMMENT 'User can edit, delete, System can edit',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_managments`
--

CREATE TABLE `stock_managments` (
  `id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `stock_in` int(11) DEFAULT NULL,
  `stock_out` int(11) DEFAULT NULL,
  `stock_type` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT 1,
  `transport_id` int(11) DEFAULT NULL,
  `truck_number` varchar(255) DEFAULT NULL,
  `do_id` int(11) DEFAULT NULL,
  `po_id` int(11) DEFAULT NULL,
  `po_number` varchar(255) DEFAULT NULL,
  `lc_id` int(11) DEFAULT NULL,
  `bl_id` int(11) DEFAULT NULL,
  `import_type` varchar(255) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_managments`
--

INSERT INTO `stock_managments` (`id`, `warehouse_id`, `stock_in`, `stock_out`, `stock_type`, `product_id`, `transport_id`, `truck_number`, `do_id`, `po_id`, `po_number`, `lc_id`, `bl_id`, `import_type`, `company_id`, `created_at`, `updated_at`) VALUES
(42, 2, 22000, NULL, 'purchase', 1, NULL, NULL, NULL, 20, 'VPO-20-12', NULL, NULL, 'local', 2, '2020-12-04 21:35:40', '2020-12-04 21:35:40'),
(43, 1, 500000, NULL, 'purchase', 1, NULL, NULL, NULL, 21, 'VPO-21-12', 11, 63, 'international', 1, '2020-12-04 21:48:56', '2020-12-04 21:48:56'),
(44, 1, 400000, NULL, 'purchase', 1, NULL, NULL, NULL, 21, 'VPO-21-12', 11, 64, 'international', 1, '2020-12-04 21:48:56', '2020-12-04 21:48:56'),
(47, 1, 100000, NULL, 'purchase', 1, NULL, NULL, NULL, 21, 'VPO-21-12', 14, 67, 'international', 1, '2020-12-04 21:55:56', '2020-12-04 21:55:56'),
(53, 1, NULL, 2000, 'sell', 1, NULL, NULL, 9, 3, NULL, NULL, NULL, NULL, NULL, '2020-12-10 21:11:17', '2020-12-10 22:10:36'),
(54, 1, NULL, 20000, 'sell', 1, NULL, NULL, 10, 2, NULL, NULL, NULL, NULL, NULL, '2020-12-10 21:13:04', '2020-12-10 21:13:04'),
(55, 1, NULL, 3000, 'sell', 1, NULL, NULL, 11, 3, NULL, NULL, NULL, NULL, NULL, '2020-12-10 22:14:25', '2020-12-10 22:14:25'),
(56, 1, NULL, 111010, 'sell', 1, NULL, NULL, 12, 2, NULL, NULL, NULL, NULL, NULL, '2020-12-12 08:22:49', '2020-12-12 08:22:49'),
(60, 2, 1000000, NULL, 'purchase', 1, NULL, NULL, NULL, 25, 'VPO-25-12', NULL, NULL, 'local', 1, '2020-12-12 10:07:45', '2020-12-12 10:07:45'),
(61, 1, 1000000, NULL, 'purchase', 1, NULL, NULL, NULL, 26, 'VPO-26-12', 16, 70, 'international', 2, '2020-12-12 10:10:42', '2020-12-12 10:10:42'),
(62, 1, 500000, NULL, 'purchase', 1, NULL, NULL, NULL, 26, 'VPO-26-12', 16, 71, 'international', 2, '2020-12-12 10:10:42', '2020-12-12 10:10:42'),
(63, 1, 500000, NULL, 'purchase', 1, NULL, NULL, NULL, 26, 'VPO-26-12', 16, 72, 'international', 2, '2020-12-12 10:10:42', '2020-12-12 10:10:42'),
(64, 1, 500000, NULL, 'purchase', 1, NULL, NULL, NULL, 26, 'VPO-26-12', 16, 73, 'international', 2, '2020-12-12 10:12:16', '2020-12-12 10:12:16'),
(65, 1, NULL, 20000, 'sell', 1, NULL, NULL, 13, 5, NULL, NULL, NULL, NULL, NULL, '2020-12-12 10:22:01', '2020-12-12 10:22:01'),
(66, 1, NULL, 331000, 'sell', 1, NULL, NULL, 14, 5, NULL, NULL, NULL, NULL, NULL, '2020-12-12 10:27:33', '2020-12-12 10:27:33'),
(67, 1, 100000, NULL, 'purchase', 1, NULL, NULL, NULL, 27, 'VPO-27-12', 17, 74, 'international', 1, '2020-12-12 11:22:40', '2020-12-12 11:22:40'),
(68, 1, 200000, NULL, 'purchase', 1, NULL, NULL, NULL, 27, 'VPO-27-12', 17, 75, 'international', 1, '2020-12-12 11:22:40', '2020-12-12 11:22:40'),
(69, 1, 100000, NULL, 'purchase', 1, NULL, NULL, NULL, 27, 'VPO-27-12', 17, 76, 'international', 1, '2020-12-12 11:22:40', '2020-12-12 11:22:40'),
(70, 1, 250000, NULL, 'purchase', 1, NULL, NULL, NULL, 27, 'VPO-27-12', 18, 78, 'international', 1, '2020-12-12 11:37:18', '2020-12-12 11:37:18'),
(71, 1, 300000, NULL, 'purchase', 1, NULL, NULL, NULL, 27, 'VPO-27-12', 18, 79, 'international', 1, '2020-12-12 11:37:18', '2020-12-12 11:37:18'),
(72, 1, 50000, NULL, 'purchase', 1, NULL, NULL, NULL, 27, 'VPO-27-12', 17, 77, 'international', 1, '2020-12-12 11:38:40', '2020-12-12 11:38:40'),
(73, 1, NULL, 20000, 'sell', 1, NULL, NULL, 15, 6, NULL, NULL, NULL, NULL, NULL, '2020-12-12 12:00:51', '2020-12-12 12:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `namae` varchar(255) DEFAULT NULL,
  `created_t` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supply_invoices`
--

CREATE TABLE `supply_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchaseOrder_id` int(11) NOT NULL DEFAULT 0,
  `vendor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_name` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_number` int(11) DEFAULT NULL,
  `invoiceNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `inv_total` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `returnStatus` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supply_invoices`
--

INSERT INTO `supply_invoices` (`id`, `purchaseOrder_id`, `vendor_id`, `vendor_name`, `reference_number`, `invoiceNumber`, `date`, `inv_total`, `status`, `returnStatus`, `created_at`, `updated_at`) VALUES
(1, 0, '4', 'Deanna Jarvis', 1, '32234', '2020-11-18', '270', 'complete', 0, '2020-11-18 02:40:57', '2020-11-18 02:40:57'),
(2, 0, '2', 'Gary Shelton', 2, '555', '2020-11-18', '49', 'complete', 0, '2020-11-18 02:43:06', '2020-11-18 02:43:06'),
(3, 0, '9', 'kashif sir', 3, '23232', '2020-11-18', '1250', 'complete', 0, '2020-11-18 05:03:39', '2020-11-18 05:03:39'),
(4, 0, '9', 'kashif sir', 4, '44', '2020-11-18', '520', 'complete', 0, '2020-11-18 05:05:00', '2020-11-18 05:05:00'),
(5, 0, '11', 'Faisal', 5, '35235', '2020-11-18', '35', 'complete', 0, '2020-11-18 05:05:50', '2020-11-18 05:05:50'),
(6, 0, '3', 'Bell Simmons', 6, '456', '2020-11-18', '88', 'complete', 0, '2020-11-18 05:06:35', '2020-11-18 05:06:35'),
(7, 0, '3', 'Bell Simmons', 7, '4444', '2020-11-18', '60', 'complete', 0, '2020-11-18 05:07:43', '2020-11-18 05:07:43'),
(8, 0, '9', 'kashif sir', 8, '333', '2020-11-18', '536', 'complete', 0, '2020-11-18 05:08:43', '2020-11-18 05:08:43'),
(9, 0, '4', 'Deanna Jarvis', 9, '555', '2020-11-18', '677', 'complete', 0, '2020-11-18 05:09:36', '2020-11-18 07:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `supply_invoice_details`
--

CREATE TABLE `supply_invoice_details` (
  `id` int(11) NOT NULL,
  `purchase_order_id` int(11) NOT NULL DEFAULT 0,
  `invoice_id` int(11) DEFAULT NULL,
  `vendor_id` varchar(222) DEFAULT NULL,
  `vendor_name` varchar(222) DEFAULT NULL,
  `product_name` varchar(240) DEFAULT NULL,
  `product_id` varchar(222) DEFAULT NULL,
  `uom_id` int(11) NOT NULL,
  `uom` varchar(222) DEFAULT NULL,
  `quantity` varchar(222) DEFAULT NULL,
  `price` int(222) DEFAULT NULL,
  `total` int(222) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supply_invoice_details`
--

INSERT INTO `supply_invoice_details` (`id`, `purchase_order_id`, `invoice_id`, `vendor_id`, `vendor_name`, `product_name`, `product_id`, `uom_id`, `uom`, `quantity`, `price`, `total`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 0, 1, '4', 'Deanna Jarvis', 'BIOCOS SERUM', '1198', 4, '4', '2', 10, 20, 'complete', '2020-11-17 19:00:00', '2020-11-18 02:40:57', '2020-11-18 07:37:56'),
(2, 0, 1, '4', 'Deanna Jarvis', 'CYAN', '1197', 62, '62', '5', 50, 250, 'complete', '2020-11-17 19:00:00', '2020-11-18 02:40:57', '2020-11-18 07:37:56'),
(3, 0, 2, '2', 'Gary Shelton', 'PREMIER COATING (BASE PAPER COATING)', '1185', 22, 'kg-1', '2', 12, 24, 'complete', '2020-11-17 19:00:00', '2020-11-18 02:43:06', '2020-11-18 02:43:06'),
(4, 0, 2, '2', 'Gary Shelton', 'PENTON PINK INK', '1181', 113, 'kg-40', '5', 5, 25, 'complete', '2020-11-17 19:00:00', '2020-11-18 02:43:06', '2020-11-18 02:43:06'),
(5, 0, 3, '9', 'kashif sir', 'PREMIER COATING (BASE PAPER COATING)', '1185', 22, 'kg-1', '10', 100, 1000, 'complete', '2020-11-17 19:00:00', '2020-11-18 05:03:39', '2020-11-18 05:03:39'),
(6, 0, 3, '9', 'kashif sir', 'testing 2', '1200', 15, 'kg-30', '4', 50, 200, 'complete', '2020-11-17 19:00:00', '2020-11-18 05:03:39', '2020-11-18 05:03:39'),
(7, 0, 3, '9', 'kashif sir', 'testin', '1199', 45, 'Kg-50', '5', 10, 50, 'complete', '2020-11-17 19:00:00', '2020-11-18 05:03:39', '2020-11-18 05:03:39'),
(8, 0, 4, '9', 'kashif sir', 'testing 2', '1200', 15, 'kg-30', '6', 20, 120, 'complete', '2020-11-17 19:00:00', '2020-11-18 05:05:00', '2020-11-18 05:05:00'),
(9, 0, 4, '9', 'kashif sir', 'testin', '1199', 134, 'Kg-200', '20', 20, 400, 'complete', '2020-11-17 19:00:00', '2020-11-18 05:05:00', '2020-11-18 05:05:00'),
(10, 0, 5, '11', 'Faisal', 'testing 2', '1200', 15, 'kg-30', '2', 5, 10, 'complete', '2020-11-17 19:00:00', '2020-11-18 05:05:50', '2020-11-18 05:05:50'),
(11, 0, 5, '11', 'Faisal', 'testin', '1199', 44, 'Kg-40', '5', 5, 25, 'complete', '2020-11-17 19:00:00', '2020-11-18 05:05:50', '2020-11-18 05:05:50'),
(12, 0, 6, '3', 'Bell Simmons', 'testing 2', '1200', 15, 'kg-30', '4', 10, 40, 'complete', '2020-11-17 19:00:00', '2020-11-18 05:06:35', '2020-11-18 05:06:35'),
(13, 0, 6, '3', 'Bell Simmons', 'testin', '1199', 134, 'Kg-200', '4', 12, 48, 'complete', '2020-11-17 19:00:00', '2020-11-18 05:06:35', '2020-11-18 05:06:35'),
(14, 0, 7, '3', 'Bell Simmons', 'testin', '1199', 9, 'kg-1', '2', 10, 20, 'complete', '2020-11-17 19:00:00', '2020-11-18 05:07:43', '2020-11-18 05:07:43'),
(15, 0, 7, '3', 'Bell Simmons', 'testing 2', '1200', 13, 'kg-1', '4', 10, 40, 'complete', '2020-11-17 19:00:00', '2020-11-18 05:07:43', '2020-11-18 05:07:43'),
(16, 0, 8, '9', 'kashif sir', 'testin', '1199', 48, 'Kg-60', '2', 70, 140, 'complete', '2020-11-17 19:00:00', '2020-11-18 05:08:43', '2020-11-18 05:08:43'),
(17, 0, 8, '9', 'kashif sir', 'testing 2', '1200', 42, 'kg-50', '6', 66, 396, 'complete', '2020-11-17 19:00:00', '2020-11-18 05:08:43', '2020-11-18 05:08:43'),
(18, 0, 9, '4', 'Deanna Jarvis', 'BIOCOS SERUM', '1198', 9, '9', '2', 67, 134, 'complete', '2020-11-17 19:00:00', '2020-11-18 05:09:36', '2020-11-18 07:37:33'),
(19, 0, 9, '4', 'Deanna Jarvis', 'DRIPOFF YELLOWISH 6086 NEW', '1194', 49, '49', '7', 77, 539, 'complete', '2020-11-17 19:00:00', '2020-11-18 05:09:36', '2020-11-18 07:37:33'),
(20, 0, 9, '4', NULL, 'PREMIER COATING (BASE PAPER COATING)', '1185', 22, '22', '2', 2, 4, 'complete', '2020-11-17 19:00:00', '2020-11-18 06:59:48', '2020-11-18 07:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `supply_local_purchase_orders`
--

CREATE TABLE `supply_local_purchase_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referenceNo` int(11) DEFAULT NULL,
  `factory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approvalStatus` int(11) DEFAULT 0,
  `completeStatus` int(11) NOT NULL DEFAULT 0,
  `object_type` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `object_id` int(11) NOT NULL DEFAULT 0,
  `totalPrice` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supply_local_purchase_orders`
--

INSERT INTO `supply_local_purchase_orders` (`id`, `description`, `referenceNo`, `factory`, `date`, `remarks`, `approvalStatus`, `completeStatus`, `object_type`, `object_id`, `totalPrice`, `created_at`, `updated_at`) VALUES
(1, '', 1, 'Office', '2020-10-27 19:00:00', 'kkk', 0, 1, '0', 0, 36, '2020-10-28 08:52:29', '2020-10-28 08:52:29'),
(2, '', 2, 'Office', '2020-10-27 19:00:00', 'kkk', 0, 1, '0', 0, 36, '2020-10-28 08:54:51', '2020-10-28 08:54:51'),
(3, '', 3, 'Office', '2020-10-27 19:00:00', 'kkk', 0, 1, '0', 0, 256, '2020-10-28 08:56:10', '2020-11-03 10:56:08'),
(4, '', 4, 'Office', '2020-10-27 19:00:00', 'kkk', 0, 1, '0', 0, 53, '2020-10-28 08:58:30', '2020-10-28 08:58:30'),
(5, '', 5, 'Office', '2020-10-27 19:00:00', 'kkk', 0, 1, '0', 0, 39, '2020-10-28 09:01:19', '2020-10-28 09:01:19'),
(6, 'it officice chairs', 6, 'Office', '2020-10-27 19:00:00', 'kkk', 0, 1, '0', 0, 36, '2020-10-29 02:30:49', '2020-11-04 06:45:47'),
(7, 'mmm', 7, 'Office', '2020-10-27 19:00:00', 'kkk', 0, 1, '0', 0, 36, '2020-10-31 23:10:08', '2020-11-04 01:36:36'),
(8, 'mm', 8, 'Office', '2020-10-27 19:00:00', 'kkk', 0, 1, '0', 0, 36, '2020-10-31 23:10:54', '2020-11-03 03:25:38'),
(9, 'sss', 9, 'Office', '2020-10-27 19:00:00', 'kkk', 0, 1, '0', 0, 36, '2020-10-31 23:18:00', '2020-11-03 04:19:52'),
(10, 'for it office', 10, 'Office', '2020-11-03 19:00:00', 'for office', 0, 1, '0', 0, 210, '2020-11-04 06:18:56', '2020-11-04 06:57:41'),
(11, 'biotech inks', 11, 'Lamitech', '2020-11-03 19:00:00', 'hjkl', 0, 1, '0', 0, 89, '2020-11-04 06:34:21', '2020-11-04 06:59:45'),
(12, 'office bottles', 12, 'Office', '2020-11-03 19:00:00', 'office bottle', 0, 1, '0', 0, 38, '2020-11-04 07:19:04', '2020-11-04 07:19:04'),
(13, 'rgdg', 13, 'Office', '2020-11-03 19:00:00', 'dga', 0, 1, '0', 0, 68, '2020-11-04 07:21:51', '2020-11-04 07:21:51'),
(14, 'sfsfss', 14, 'Biotech', '2020-11-03 19:00:00', 'ggg', 0, 1, '0', 0, 192, '2020-11-04 07:28:36', '2020-11-04 07:28:36'),
(15, 'sfsfss', 15, 'Biotech', '2020-11-03 19:00:00', 'ggg', 0, 1, '0', 0, 192, '2020-11-04 07:28:37', '2020-11-04 07:28:37'),
(16, 'hjkl;klkl', 16, 'Biotech', '2020-11-03 19:00:00', 'sads', 0, 1, '0', 0, 164, '2020-11-04 07:46:49', '2020-11-04 07:49:12'),
(17, 'kjhgfd', 17, 'Biotech', '2020-11-03 19:00:00', 're3', 0, 1, '0', 0, 52, '2020-11-04 07:50:17', '2020-11-04 07:50:17'),
(18, 'qqqqqqqqqqqqqqqqq', 18, 'Biotech', '2020-11-03 19:00:00', 'sads', 0, 1, '0', 0, 164, '2020-11-04 07:52:56', '2020-11-04 07:54:16'),
(19, 'lllllllllllllllllllllllllllllllllllllll', 19, 'Biotech', '2020-11-03 19:00:00', 'ggg', 0, 1, '0', 0, 192, '2020-11-04 08:54:00', '2020-11-04 08:54:00'),
(20, 'for it office', 20, 'Office', '2020-11-03 19:00:00', 'efwef', 0, 1, '0', 0, 61, '2020-11-04 08:59:01', '2020-11-04 09:00:41'),
(21, 'biotech inks', 21, 'Office', '2020-11-03 19:00:00', 'efwef', 0, 0, '0', 0, 61, '2020-11-05 01:46:59', '2020-11-05 01:46:59'),
(22, 'office needs', 22, 'Biotech', '2020-11-04 19:00:00', 'for biotech', 0, 0, '0', 0, 180, '2020-11-05 01:47:28', '2020-11-05 01:47:28'),
(23, 'biocos inkes', 23, 'Office', '2020-11-04 19:00:00', 'inkes', 0, 0, '0', 0, 832, '2020-11-05 05:11:23', '2020-11-05 05:11:23'),
(24, 'biocose items', 24, 'Biotech', '2020-11-04 19:00:00', 'bicos items', 0, 1, '0', 0, 88, '2020-11-05 06:41:35', '2020-11-05 06:43:23'),
(25, 'lemitech items', 25, 'Lamitech', '2020-11-04 19:00:00', 'for lemiteck', 0, 0, '0', 0, 56, '2020-11-05 06:45:42', '2020-11-05 06:45:42'),
(26, 'new uoms', 26, 'Biotech', '2020-11-05 19:00:00', 'with uom details', 0, 0, '0', 0, 275, '2020-11-06 08:19:22', '2020-11-06 08:19:22'),
(27, 'new uoms', 27, 'Biotech', '2020-11-05 19:00:00', 'with uom details', 0, 0, '0', 0, 275, '2020-11-06 08:22:39', '2020-11-06 08:22:39'),
(28, 'new uoms', 28, 'Biotech', '2020-11-05 19:00:00', 'with uom details', 0, 0, '0', 0, 275, '2020-11-06 08:22:39', '2020-11-06 08:22:39'),
(29, 'new uoms', 29, 'Biotech', '2020-11-05 19:00:00', 'with uom details', 0, 0, '0', 0, 275, '2020-11-06 08:22:39', '2020-11-06 08:22:39'),
(30, 'this is new uom', 30, 'Office', '2020-11-05 19:00:00', 'with uom', 0, 0, '0', 0, 240, '2020-11-06 08:28:47', '2020-11-06 08:28:47'),
(31, 'koi nhiscsac', 31, 'Biotech', '2020-11-15 19:00:00', 'biotech inks', 0, 0, '0', 0, 300, '2020-11-16 05:02:55', '2020-11-16 05:02:55'),
(32, 'without price', 32, 'Lamitech', '2020-11-15 19:00:00', 'qqqqqqqqqq', 0, 0, 'quotation', 31, 0, '2020-11-16 08:19:36', '2020-11-16 08:19:36'),
(33, 'sfsd', 33, 'Lamitech', '2020-11-17 02:15:49', 'dd', 0, 0, 'Requisition', 15, NULL, '2020-11-17 02:15:49', '2020-11-17 02:15:49'),
(34, 'lpo from requisition', 34, 'Lamitech', '2020-11-17 02:17:08', 'dd', 0, 0, 'Requisition', 15, NULL, '2020-11-17 02:17:08', '2020-11-17 02:17:08'),
(35, 'asdfas', 35, 'Lamitech', '2020-11-17 02:24:14', 'qqqqqqqqqq', 0, 0, 'Requisition', 22, NULL, '2020-11-17 02:24:14', '2020-11-17 02:24:14'),
(36, 'lpo from req', 36, 'Lamitech', '2020-11-17 02:26:42', 'no erema', 0, 0, 'Requisition', 24, NULL, '2020-11-17 02:26:42', '2020-11-17 02:26:42'),
(37, 'requsition to quotation to lpo', 37, 'Biotech', '2020-11-16 19:00:00', 'no erema', 0, 0, 'quotation', 32, 408, '2020-11-17 02:29:37', '2020-11-17 02:29:37'),
(38, 'koi nhiscsac', 38, 'Biotech', '2020-11-16 19:00:00', 'no remarks', 0, 0, '0', 0, 72, '2020-11-17 07:51:42', '2020-11-17 07:51:42'),
(39, 'koi nhiscsac', 39, 'Biotech', '2020-11-16 19:00:00', 'no remarks', 0, 0, '0', 0, 72, '2020-11-17 07:52:18', '2020-11-17 07:52:18'),
(40, 'koi nhiscsac', 40, 'Biotech', '2020-11-16 19:00:00', 'no remarks', 0, 0, '0', 0, 72, '2020-11-17 07:52:43', '2020-11-17 07:52:43'),
(41, 'from qoutation', 41, 'Lamitech', '2020-11-16 19:00:00', 'no erema', 0, 0, 'quotation', 32, 600, '2020-11-20 03:09:35', '2020-11-20 03:09:35'),
(42, 'from qoutation', 42, 'Lamitech', '2020-11-16 19:00:00', 'no erema', 0, 0, 'quotation', 32, 600, '2020-11-20 04:04:23', '2020-11-20 04:04:23'),
(43, 'new item', 43, 'Biotech', '2020-11-15 19:00:00', 'New quotation', 0, 0, 'quotation', 30, 0, '2020-11-20 04:28:15', '2020-11-20 04:28:15'),
(44, 'sdsfse', 44, 'Lamitech', '2020-11-16 19:00:00', 'no erema', 0, 0, 'quotation', 32, 0, '2020-11-20 04:42:43', '2020-11-20 04:42:43'),
(45, 'sfsfss', 45, 'Office', '2020-11-16 19:00:00', 'no erema', 0, 0, 'quotation', 32, 0, '2020-11-20 04:43:46', '2020-11-20 04:43:46'),
(46, 'add new status requisition view', 46, 'Lamitech', '2020-11-20 08:23:05', 'update remove', 0, 0, 'Requisition', 26, NULL, '2020-11-20 08:23:05', '2020-11-20 08:23:05'),
(47, 'add new status requisition view', 47, 'Lamitech', '2020-11-20 08:39:45', 'update remove', 0, 0, 'Requisition', 26, NULL, '2020-11-20 08:39:45', '2020-11-20 08:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `supply_local_purchase_order_details`
--

CREATE TABLE `supply_local_purchase_order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `object_type` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `object_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uomName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `subTotal` int(11) NOT NULL DEFAULT 0,
  `completeStatus` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supply_local_purchase_order_details`
--

INSERT INTO `supply_local_purchase_order_details` (`id`, `item_id`, `object_type`, `object_id`, `name`, `category`, `uomName`, `uom_id`, `order_id`, `quantity`, `price`, `subTotal`, `completeStatus`, `created_at`, `updated_at`) VALUES
(1, 1186, '0', 0, 'STAR FOUNT', 'varnish', NULL, NULL, 2, 12, 1, 0, 0, '2020-10-28 08:54:51', '2020-10-28 08:54:51'),
(2, 1184, '0', 0, 'FLORESCENT MIX COLOUR INK', 'inks', NULL, NULL, 2, 12, 2, 0, 0, '2020-10-28 08:54:51', '2020-10-28 08:54:51'),
(3, 1186, '0', 0, 'STAR FOUNT', 'varnish', NULL, NULL, 3, 12, 1, 0, 1, '2020-10-28 08:56:10', '2020-11-03 10:56:08'),
(4, 1184, '0', 0, 'FLORESCENT MIX COLOUR INK', 'inks', NULL, NULL, 3, 12, 2, 0, 1, '2020-10-28 08:56:10', '2020-11-03 10:56:08'),
(5, 1186, '0', 0, 'STAR FOUNT', 'varnish', NULL, NULL, 4, 12, 1, 0, 0, '2020-10-28 08:58:30', '2020-10-28 08:58:30'),
(6, 1184, '0', 0, 'FLORESCENT MIX COLOUR INK', 'inks', NULL, NULL, 4, 12, 2, 0, 0, '2020-10-28 08:58:30', '2020-10-28 08:58:30'),
(7, 1200, '0', 0, 'testing 2', 'inks', 'kg-1', 13, 4, 2, 3, 0, 0, '2020-10-28 08:58:30', '2020-10-28 08:58:30'),
(8, 1198, '0', 0, 'BIOCOS SERUM', 'varnish', 'Kg-10', 3, 4, 1, 11, 0, 0, '2020-10-28 08:58:30', '2020-10-28 08:58:30'),
(9, 1186, '0', 0, 'STAR FOUNT', 'varnish', NULL, NULL, 5, 12, 1, 0, 0, '2020-10-28 09:01:19', '2020-10-28 09:01:19'),
(10, 1042, '0', 0, 'DOUBLE TAPE', 'consume', 'No details', 0, 5, 2, 3, 0, 0, '2020-10-28 09:01:19', '2020-10-28 09:01:19'),
(11, 1040, '0', 0, 'UV LECQUER', 'varnish', 'No details', 0, 5, 3, 4, 0, 0, '2020-10-28 09:01:19', '2020-10-28 09:01:19'),
(12, 1037, '0', 0, 'BLACK', 'inks', 'No details', 0, 5, 3, 3, 0, 0, '2020-10-28 09:01:19', '2020-10-28 09:01:19'),
(13, 1186, '0', 0, 'STAR FOUNT', 'varnish', NULL, NULL, 6, 12, 1, 0, 1, '2020-10-29 02:30:49', '2020-11-04 06:45:47'),
(14, 1184, '0', 0, 'FLORESCENT MIX COLOUR INK', 'inks', NULL, NULL, 6, 12, 2, 0, 1, '2020-10-29 02:30:49', '2020-11-04 06:45:47'),
(15, 1186, '0', 0, 'STAR FOUNT', 'varnish', NULL, NULL, 7, 12, 1, 0, 0, '2020-10-31 23:10:08', '2020-10-31 23:10:08'),
(16, 1184, '0', 0, 'FLORESCENT MIX COLOUR INK', 'inks', NULL, NULL, 7, 12, 2, 0, 0, '2020-10-31 23:10:08', '2020-10-31 23:10:08'),
(17, 1186, '0', 0, 'STAR FOUNT', 'varnish', NULL, NULL, 8, 12, 1, 0, 1, '2020-10-31 23:10:54', '2020-11-03 03:25:38'),
(18, 1184, '0', 0, 'FLORESCENT MIX COLOUR INK', 'inks', NULL, NULL, 8, 12, 2, 0, 1, '2020-10-31 23:10:54', '2020-11-03 03:25:38'),
(19, 1186, '0', 0, 'STAR FOUNT', 'varnish', NULL, NULL, 9, 12, 1, 0, 0, '2020-10-31 23:18:00', '2020-10-31 23:18:00'),
(20, 1184, '0', 0, 'FLORESCENT MIX COLOUR INK', 'inks', NULL, NULL, 9, 12, 2, 0, 0, '2020-10-31 23:18:00', '2020-10-31 23:18:00'),
(21, 1199, '0', 0, 'testin', 'inks', NULL, NULL, 10, 10, 10, 0, 0, '2020-11-04 06:18:56', '2020-11-04 06:18:56'),
(22, 1200, '0', 0, 'testing 2', 'inks', NULL, NULL, 10, 5, 10, 0, 0, '2020-11-04 06:18:56', '2020-11-04 06:18:56'),
(23, 1198, '0', 0, 'BIOCOS SERUM', 'varnish', NULL, NULL, 10, 4, 15, 0, 0, '2020-11-04 06:18:56', '2020-11-04 06:18:56'),
(24, 1181, '0', 0, 'PENTON PINK INK', 'inks', NULL, NULL, 11, 2, 12, 0, 0, '2020-11-04 06:34:21', '2020-11-04 06:34:21'),
(25, 1180, '0', 0, 'LYFT PINK INK', 'inks', NULL, NULL, 11, 4, 10, 0, 0, '2020-11-04 06:34:21', '2020-11-04 06:34:21'),
(26, 1176, '0', 0, 'PENTON RED INK', 'inks', NULL, NULL, 11, 5, 5, 0, 0, '2020-11-04 06:34:21', '2020-11-04 06:34:21'),
(27, 1180, '0', 0, 'LYFT PINK INK', 'inks', NULL, NULL, 12, 5, 1, 0, 0, '2020-11-04 07:19:04', '2020-11-04 07:19:04'),
(28, 1181, '0', 0, 'PENTON PINK INK', 'inks', NULL, NULL, 12, 4, 2, 0, 0, '2020-11-04 07:19:04', '2020-11-04 07:19:04'),
(29, 1197, '0', 0, 'CYAN', 'inks', NULL, NULL, 12, 5, 5, 0, 0, '2020-11-04 07:19:04', '2020-11-04 07:19:04'),
(30, 1180, '0', 0, 'LYFT PINK INK', 'inks', NULL, NULL, 13, 12, 4, 0, 0, '2020-11-04 07:21:51', '2020-11-04 07:21:51'),
(31, 1185, '0', 0, 'PREMIER COATING (BASE PAPER COATING)', 'varnish', NULL, NULL, 13, 4, 5, 0, 0, '2020-11-04 07:21:51', '2020-11-04 07:21:51'),
(32, 1176, '0', 0, 'PENTON RED INK', 'inks', NULL, NULL, 14, 4, 4, 0, 0, '2020-11-04 07:28:36', '2020-11-04 07:28:36'),
(33, 1179, '0', 0, 'LYFT BLUE INK', 'inks', NULL, NULL, 14, 4, 44, 0, 0, '2020-11-04 07:28:36', '2020-11-04 07:28:36'),
(34, 1176, '0', 0, 'PENTON RED INK', 'inks', NULL, NULL, 15, 4, 4, 0, 0, '2020-11-04 07:28:37', '2020-11-04 07:28:37'),
(35, 1179, '0', 0, 'LYFT BLUE INK', 'inks', NULL, NULL, 15, 4, 44, 0, 0, '2020-11-04 07:28:37', '2020-11-04 07:28:37'),
(36, 1181, '0', 0, 'PENTON PINK INK', 'inks', NULL, NULL, 16, 12, 12, 0, 0, '2020-11-04 07:46:49', '2020-11-04 07:46:49'),
(37, 1178, '0', 0, 'PENTON BLUE INK', 'inks', NULL, NULL, 16, 2, 10, 0, 0, '2020-11-04 07:46:49', '2020-11-04 07:46:49'),
(38, 1180, '0', 0, 'LYFT PINK INK', 'inks', NULL, NULL, 17, 4, 4, 0, 0, '2020-11-04 07:50:17', '2020-11-04 07:50:17'),
(39, 1179, '0', 0, 'LYFT BLUE INK', 'inks', NULL, NULL, 17, 3, 4, 0, 0, '2020-11-04 07:50:17', '2020-11-04 07:50:17'),
(40, 1181, '0', 0, 'PENTON PINK INK', 'inks', NULL, NULL, 17, 4, 6, 0, 0, '2020-11-04 07:50:17', '2020-11-04 07:50:17'),
(41, 1181, '0', 0, 'PENTON PINK INK', 'inks', NULL, NULL, 18, 12, 12, 0, 0, '2020-11-04 07:52:57', '2020-11-04 07:52:57'),
(42, 1178, '0', 0, 'PENTON BLUE INK', 'inks', NULL, NULL, 18, 2, 10, 0, 0, '2020-11-04 07:52:57', '2020-11-04 07:52:57'),
(43, 1176, '0', 0, 'PENTON RED INK', 'inks', NULL, NULL, 19, 4, 4, 0, 0, '2020-11-04 08:54:00', '2020-11-04 08:54:00'),
(44, 1179, '0', 0, 'LYFT BLUE INK', 'inks', NULL, NULL, 19, 4, 44, 0, 0, '2020-11-04 08:54:00', '2020-11-04 08:54:00'),
(45, 1182, '0', 0, 'PLAIN BROWN INK', 'inks', NULL, NULL, 20, 5, 5, 0, 0, '2020-11-04 08:59:01', '2020-11-04 08:59:01'),
(46, 1184, '0', 0, 'FLORESCENT MIX COLOUR INK', 'inks', NULL, NULL, 20, 4, 5, 0, 0, '2020-11-04 08:59:01', '2020-11-04 08:59:01'),
(47, 1179, '0', 0, 'LYFT BLUE INK', 'inks', NULL, NULL, 20, 4, 4, 0, 0, '2020-11-04 08:59:01', '2020-11-04 08:59:01'),
(48, 1182, '0', 0, 'PLAIN BROWN INK', 'inks', NULL, NULL, 21, 5, 5, 0, 0, '2020-11-05 01:46:59', '2020-11-05 01:46:59'),
(49, 1184, '0', 0, 'FLORESCENT MIX COLOUR INK', 'inks', NULL, NULL, 21, 4, 5, 0, 0, '2020-11-05 01:46:59', '2020-11-05 01:46:59'),
(50, 1179, '0', 0, 'LYFT BLUE INK', 'inks', NULL, NULL, 21, 4, 4, 0, 0, '2020-11-05 01:46:59', '2020-11-05 01:46:59'),
(51, 1180, '0', 0, 'LYFT PINK INK', 'inks', NULL, NULL, 22, 5, 10, 0, 0, '2020-11-05 01:47:28', '2020-11-05 01:47:28'),
(52, 1179, '0', 0, 'LYFT BLUE INK', 'inks', NULL, NULL, 22, 10, 12, 0, 0, '2020-11-05 01:47:28', '2020-11-05 01:47:28'),
(53, 1193, '0', 0, 'DRIP OFF VARNISH 8066', 'varnish', NULL, NULL, 22, 5, 2, 0, 0, '2020-11-05 01:47:28', '2020-11-05 01:47:28'),
(54, 1200, '0', 0, 'testing 2', 'inks', 'kg', 62, 23, 12, 33, 0, 0, '2020-11-05 05:11:23', '2020-11-05 05:11:23'),
(55, 1199, '0', 0, 'testin', 'inks', 'liter', 63, 23, 12, 33, 0, 0, '2020-11-05 05:11:23', '2020-11-05 05:11:23'),
(56, 1198, '0', 0, 'BIOCOS SERUM', 'varnish', 'pcs', 64, 23, 2, 20, 0, 0, '2020-11-05 05:11:23', '2020-11-05 05:11:23'),
(57, 1194, '0', 0, 'DRIPOFF YELLOWISH 6086 NEW', 'varnish', 'kg', 65, 24, 10, 3, 0, 0, '2020-11-05 06:41:35', '2020-11-05 06:41:35'),
(58, 1185, '0', 0, 'PREMIER COATING (BASE PAPER COATING)', 'varnish', 'kg', 66, 24, 5, 10, 0, 0, '2020-11-05 06:41:35', '2020-11-05 06:41:35'),
(59, 1184, '0', 0, 'FLORESCENT MIX COLOUR INK', 'inks', 'kg', 67, 24, 2, 4, 0, 0, '2020-11-05 06:41:35', '2020-11-05 06:41:35'),
(60, 1185, '0', 0, 'PREMIER COATING (BASE PAPER COATING)', 'varnish', 'kg', 68, 25, 1, 12, 0, 0, '2020-11-05 06:45:42', '2020-11-05 06:45:42'),
(61, 1184, '0', 0, 'FLORESCENT MIX COLOUR INK', 'inks', 'kg', 69, 25, 4, 10, 0, 0, '2020-11-05 06:45:42', '2020-11-05 06:45:42'),
(62, 1186, '0', 0, 'STAR FOUNT', 'varnish', 'kg', 70, 25, 2, 2, 0, 0, '2020-11-05 06:45:42', '2020-11-05 06:45:42'),
(63, 1199, '0', 0, 'testin', NULL, 'kg-10', 11, 27, 5, 5, 0, 0, '2020-11-06 08:22:39', '2020-11-06 08:22:39'),
(64, 1200, '0', 0, 'testing 2', NULL, 'kg-30', 15, 27, 5, 10, 0, 0, '2020-11-06 08:22:39', '2020-11-06 08:22:39'),
(65, 1198, '0', 0, 'BIOCOS SERUM', NULL, 'Kg-50', 4, 27, 1, 200, 0, 0, '2020-11-06 08:22:39', '2020-11-06 08:22:39'),
(66, 1199, '0', 0, 'testin', NULL, 'kg-10', 11, 28, 5, 5, 0, 0, '2020-11-06 08:22:39', '2020-11-06 08:22:39'),
(67, 1200, '0', 0, 'testing 2', NULL, 'kg-30', 15, 28, 5, 10, 0, 0, '2020-11-06 08:22:39', '2020-11-06 08:22:39'),
(68, 1198, '0', 0, 'BIOCOS SERUM', NULL, 'Kg-50', 4, 28, 1, 200, 0, 0, '2020-11-06 08:22:39', '2020-11-06 08:22:39'),
(69, 1199, '0', 0, 'testin', NULL, 'kg-10', 11, 29, 5, 5, 0, 0, '2020-11-06 08:22:39', '2020-11-06 08:22:39'),
(70, 1200, '0', 0, 'testing 2', NULL, 'kg-30', 15, 29, 5, 10, 0, 0, '2020-11-06 08:22:39', '2020-11-06 08:22:39'),
(71, 1198, '0', 0, 'BIOCOS SERUM', NULL, 'Kg-50', 4, 29, 1, 200, 0, 0, '2020-11-06 08:22:39', '2020-11-06 08:22:39'),
(72, 1200, '0', 0, 'testing 2', 'inks', 'kg-30', 15, 30, 20, 2, 0, 0, '2020-11-06 08:28:47', '2020-11-06 08:28:47'),
(73, 1199, '0', 0, 'testin', 'inks', 'kg-10', 11, 30, 2, 100, 0, 0, '2020-11-06 08:28:47', '2020-11-06 08:28:47'),
(74, 1103, '0', 0, 'UV CHEMELEON', 'varnish', 'litter-40', 118, 31, 2, 50, 0, 0, '2020-11-16 05:02:55', '2020-11-16 05:02:55'),
(75, 1186, '0', 0, 'STAR FOUNT', 'varnish', 'kg-5', 119, 31, 4, 50, 0, 0, '2020-11-16 05:02:56', '2020-11-16 05:02:56'),
(76, 1068, 'quotation', 31, 'CLEAN FIX-UV', 'consume', 'kg-1', 97, 32, 4, NULL, 0, 0, '2020-11-16 08:19:36', '2020-11-16 08:19:36'),
(77, 1187, 'quotation', 31, 'GLUE (USA)', 'consume', 'kg-1', 33, 32, 4, NULL, 0, 0, '2020-11-16 08:19:36', '2020-11-16 08:19:36'),
(78, 1175, 'Requisition', 23, 'PENTON PURPLE INK', 'inks', 'kg-40', 125, NULL, 4, NULL, 0, 0, '2020-11-17 02:21:37', '2020-11-17 02:21:37'),
(79, 1185, 'Requisition', 23, 'PREMIER COATING (BASE PAPER COATING)', 'varnish', 'kg-1', 22, NULL, 4, NULL, 0, 0, '2020-11-17 02:21:37', '2020-11-17 02:21:37'),
(80, 1068, 'Requisition', 22, 'CLEAN FIX-UV', 'consume', 'kg-1', 97, 35, 4, NULL, 0, 0, '2020-11-17 02:24:14', '2020-11-17 02:24:14'),
(81, 1187, 'Requisition', 22, 'GLUE (USA)', 'consume', 'kg-1', 33, 35, 4, NULL, 0, 0, '2020-11-17 02:24:14', '2020-11-17 02:24:14'),
(82, 1170, 'Requisition', 24, 'PENTON YELLOW INK', 'inks', 'Kg-40', 126, 36, 12, NULL, 0, 0, '2020-11-17 02:26:42', '2020-11-17 02:26:42'),
(83, 1187, 'Requisition', 24, 'GLUE (USA)', 'consume', 'Kg-400', 127, 36, 4, NULL, 0, 0, '2020-11-17 02:26:42', '2020-11-17 02:26:42'),
(84, 1170, 'quotation', 32, 'PENTON YELLOW INK', 'inks', 'Kg-40', 126, 37, 12, 30, 0, 0, '2020-11-17 02:29:37', '2020-11-17 02:29:37'),
(85, 1187, 'quotation', 32, 'GLUE (USA)', 'consume', 'Kg-400', 127, 37, 4, 12, 0, 0, '2020-11-17 02:29:37', '2020-11-17 02:29:37'),
(86, 1036, '0', 0, 'YELLOW', 'inks', 'kg-1', 30, 40, 2, 12, 24, 0, '2020-11-17 07:52:43', '2020-11-17 07:52:43'),
(87, 1064, '0', 0, 'OFF SET PAPER RIM (100 GRM)', 'consume', 'bundle-1', 136, 40, 4, 12, 48, 0, '2020-11-17 07:52:43', '2020-11-17 07:52:43'),
(88, 1170, 'quotation', 32, 'PENTON YELLOW INK', 'inks', 'Kg-40', 126, 42, 12, 50, 600, 0, '2020-11-20 04:04:23', '2020-11-20 04:04:23'),
(89, 1200, 'quotation', 30, 'testing 2', 'inks', 'kg-1', 13, 43, 2, NULL, 0, 0, '2020-11-20 04:28:15', '2020-11-20 04:28:15'),
(90, 1184, 'quotation', 30, 'FLORESCENT MIX COLOUR INK', 'inks', 'Kg-40', 56, 43, 4, NULL, 0, 0, '2020-11-20 04:28:15', '2020-11-20 04:28:15'),
(91, 1185, 'quotation', 30, 'PREMIER COATING (BASE PAPER COATING)', 'varnish', 'kg-1', 22, 43, 12, NULL, 0, 0, '2020-11-20 04:28:15', '2020-11-20 04:28:15'),
(92, 1170, 'quotation', 32, 'PENTON YELLOW INK', 'inks', 'Kg-40', 126, 44, 12, NULL, 0, 0, '2020-11-20 04:42:43', '2020-11-20 04:42:43'),
(93, 1170, 'quotation', 32, 'PENTON YELLOW INK', 'inks', 'Kg-40', 126, 45, 12, NULL, 0, 0, '2020-11-20 04:43:46', '2020-11-20 04:43:46'),
(94, 1187, 'quotation', 32, 'GLUE (USA)', 'consume', 'Kg-400', 127, 45, 4, NULL, 0, 0, '2020-11-20 04:43:46', '2020-11-20 04:43:46'),
(95, 1044, 'Requisition', 26, 'ELFI', 'consume', 'kg-1', 41, 47, 20, NULL, 0, 0, '2020-11-20 08:39:45', '2020-11-20 08:39:45'),
(96, 1038, 'Requisition', 26, 'RED (magenta)', 'inks', 'Kg-70', 47, 47, 1, NULL, 0, 0, '2020-11-20 08:39:45', '2020-11-20 08:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `supply_partial_deliveries`
--

CREATE TABLE `supply_partial_deliveries` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `referenceNo` int(11) NOT NULL,
  `factory` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remarks` varchar(250) NOT NULL,
  `approvalStatus` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supply_partial_deliveries`
--

INSERT INTO `supply_partial_deliveries` (`id`, `description`, `referenceNo`, `factory`, `date`, `remarks`, `approvalStatus`, `totalPrice`, `created_at`, `updated_at`) VALUES
(1, '', 1, 'Office', '2020-10-27 19:00:00', 'kkk', 0, 36, '2020-10-28 08:52:29', '2020-10-28 08:52:29'),
(2, '', 2, 'Office', '2020-10-27 19:00:00', 'kkk', 0, 36, '2020-10-28 08:54:51', '2020-10-28 08:54:51'),
(3, '', 3, 'Office', '2020-10-27 19:00:00', 'kkk', 0, 256, '2020-10-28 08:56:10', '2020-10-28 08:56:10'),
(4, '', 4, 'Office', '2020-10-27 19:00:00', 'kkk', 0, 53, '2020-10-28 08:58:30', '2020-10-28 08:58:30'),
(5, '', 5, 'Office', '2020-10-27 19:00:00', 'kkk', 0, 39, '2020-10-28 09:01:19', '2020-10-28 09:01:19'),
(6, 'it officice chairs', 6, 'Office', '2020-10-27 19:00:00', 'kkk', 0, 36, '2020-10-29 02:30:49', '2020-10-29 02:30:49'),
(7, 'mmm', 7, 'Office', '2020-10-27 19:00:00', 'kkk', 0, 36, '2020-10-31 23:10:08', '2020-10-31 23:10:08'),
(8, 'mm', 8, 'Office', '2020-10-27 19:00:00', 'kkk', 0, 36, '2020-10-31 23:10:54', '2020-10-31 23:10:54'),
(9, 'sss', 9, 'Office', '2020-10-27 19:00:00', 'kkk', 0, 36, '2020-10-31 23:18:00', '2020-10-31 23:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `supply_partial_delivery_details`
--

CREATE TABLE `supply_partial_delivery_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uomName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supply_partial_delivery_details`
--

INSERT INTO `supply_partial_delivery_details` (`id`, `item_id`, `name`, `category`, `uomName`, `uom_id`, `order_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1186, 'STAR FOUNT', 'varnish', NULL, NULL, 2, 12, 1, '2020-10-28 08:54:51', '2020-10-28 08:54:51'),
(2, 1184, 'FLORESCENT MIX COLOUR INK', 'inks', NULL, NULL, 2, 12, 2, '2020-10-28 08:54:51', '2020-10-28 08:54:51'),
(3, 1186, 'STAR FOUNT', 'varnish', NULL, NULL, 3, 12, 1, '2020-10-28 08:56:10', '2020-10-28 08:56:10'),
(4, 1184, 'FLORESCENT MIX COLOUR INK', 'inks', NULL, NULL, 3, 12, 2, '2020-10-28 08:56:10', '2020-10-28 08:56:10'),
(5, 1186, 'STAR FOUNT', 'varnish', NULL, NULL, 4, 12, 1, '2020-10-28 08:58:30', '2020-10-28 08:58:30'),
(6, 1184, 'FLORESCENT MIX COLOUR INK', 'inks', NULL, NULL, 4, 12, 2, '2020-10-28 08:58:30', '2020-10-28 08:58:30'),
(7, 1200, 'testing 2', 'inks', 'kg-1', 13, 4, 2, 3, '2020-10-28 08:58:30', '2020-10-28 08:58:30'),
(8, 1198, 'BIOCOS SERUM', 'varnish', 'Kg-10', 3, 4, 1, 11, '2020-10-28 08:58:30', '2020-10-28 08:58:30'),
(9, 1186, 'STAR FOUNT', 'varnish', NULL, NULL, 5, 12, 1, '2020-10-28 09:01:19', '2020-10-28 09:01:19'),
(10, 1042, 'DOUBLE TAPE', 'consume', 'No details', 0, 5, 2, 3, '2020-10-28 09:01:19', '2020-10-28 09:01:19'),
(11, 1040, 'UV LECQUER', 'varnish', 'No details', 0, 5, 3, 4, '2020-10-28 09:01:19', '2020-10-28 09:01:19'),
(12, 1037, 'BLACK', 'inks', 'No details', 0, 5, 3, 3, '2020-10-28 09:01:19', '2020-10-28 09:01:19'),
(13, 1186, 'STAR FOUNT', 'varnish', NULL, NULL, 6, 12, 1, '2020-10-29 02:30:49', '2020-10-29 02:30:49'),
(14, 1184, 'FLORESCENT MIX COLOUR INK', 'inks', NULL, NULL, 6, 12, 2, '2020-10-29 02:30:49', '2020-10-29 02:30:49'),
(15, 1186, 'STAR FOUNT', 'varnish', NULL, NULL, 7, 12, 1, '2020-10-31 23:10:08', '2020-10-31 23:10:08'),
(16, 1184, 'FLORESCENT MIX COLOUR INK', 'inks', NULL, NULL, 7, 12, 2, '2020-10-31 23:10:08', '2020-10-31 23:10:08'),
(17, 1186, 'STAR FOUNT', 'varnish', NULL, NULL, 8, 12, 1, '2020-10-31 23:10:54', '2020-10-31 23:10:54'),
(18, 1184, 'FLORESCENT MIX COLOUR INK', 'inks', NULL, NULL, 8, 12, 2, '2020-10-31 23:10:54', '2020-10-31 23:10:54'),
(19, 1186, 'STAR FOUNT', 'varnish', NULL, NULL, 9, 12, 1, '2020-10-31 23:18:00', '2020-10-31 23:18:00'),
(20, 1184, 'FLORESCENT MIX COLOUR INK', 'inks', NULL, NULL, 9, 12, 2, '2020-10-31 23:18:00', '2020-10-31 23:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `term_and_conditions`
--

CREATE TABLE `term_and_conditions` (
  `id` int(11) NOT NULL,
  `discrpition` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2020-04-26 10:57:24', '2020-04-26 10:57:24'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2020-04-26 10:57:25', '2020-04-26 10:57:25'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2020-04-26 10:57:25', '2020-04-26 10:57:25'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2020-04-26 10:57:25', '2020-04-26 10:57:25'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2020-04-26 10:57:25', '2020-04-26 10:57:25'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2020-04-26 10:57:25', '2020-04-26 10:57:25'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2020-04-26 10:57:25', '2020-04-26 10:57:25'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2020-04-26 10:57:25', '2020-04-26 10:57:25'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2020-04-26 10:57:25', '2020-04-26 10:57:25'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2020-04-26 10:57:25', '2020-04-26 10:57:25'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2020-04-26 10:57:25', '2020-04-26 10:57:25'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2020-04-26 10:57:25', '2020-04-26 10:57:25'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2020-04-26 10:57:25', '2020-04-26 10:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `transporters`
--

CREATE TABLE `transporters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_balance` int(11) DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transporters`
--

INSERT INTO `transporters` (`id`, `name`, `opening_balance`, `company_name`, `created_at`, `updated_at`) VALUES
(1, 'Wazir Goods', 20000, 'Ahmad Transports', '2020-12-02 02:18:00', '2020-12-05 02:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `qty`, `created_at`, `updated_at`) VALUES
(1, 'Kg', 1, '2020-11-21 01:46:50', '2020-11-21 01:46:50'),
(2, 'Metric Tonne', 1000, '2020-11-21 01:47:09', '2020-11-21 01:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users\\December2020\\z9C2u75gTNlCRcG6vJYr.png', NULL, '$2y$10$QORO2zcEVZtsRO/MVpAOuuJhXty1Omg0Jr.ol8cJBxCFpTGQJg9iy', 'NRhXJ2juwTTObEkEmk8szBKSrXzPpgYstyJgBahC5x4SuBnnGVgLXUQKqdii', '{\"locale\":\"en\"}', '2020-04-26 10:57:24', '2020-12-12 01:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `vendor_type` enum('local','international') DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `vendor_type`, `email`, `contact`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Meredith Jensen', 'international', 'duzizezi@mailinator.com', '97324489632', 'syria', '2015-07-15 00:00:00', '2015-07-15 00:00:00'),
(2, 'Fleur Shaw', 'international', 'najy@mailinator.com', '97324489632', 'Quod mollitia cum ut', '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(3, 'Swiss Singapur', 'international', 'swiss@gmail.com', '923244388131', 'ship 41 etc', '2015-07-15 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_bl_numbers`
--

CREATE TABLE `vendor_bl_numbers` (
  `id` int(11) NOT NULL,
  `lc_id` int(11) DEFAULT NULL,
  `bl_number` varchar(255) DEFAULT NULL,
  `bl_qty` double DEFAULT NULL,
  `gd_number` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_bl_numbers`
--

INSERT INTO `vendor_bl_numbers` (`id`, `lc_id`, `bl_number`, `bl_qty`, `gd_number`, `created_at`, `updated_at`) VALUES
(74, 17, 'AB966', 100, '2D75919', '2020-12-12 11:22:40', '2020-12-12 11:38:40'),
(75, 17, 'AB9665', 200, '2D7597', '2020-12-12 11:22:40', '2020-12-12 11:38:40'),
(76, 17, 'AB96', 100, '12563', '2020-12-12 11:22:40', '2020-12-12 11:38:40'),
(77, 17, '256', 50, '12564', '2020-12-12 11:24:17', '2020-12-12 11:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_letter_credits`
--

CREATE TABLE `vendor_letter_credits` (
  `id` int(11) NOT NULL,
  `po_id` int(11) DEFAULT NULL,
  `lc_number` varchar(255) DEFAULT NULL,
  `lc_qty` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_letter_credits`
--

INSERT INTO `vendor_letter_credits` (`id`, `po_id`, `lc_number`, `lc_qty`, `created_at`, `updated_at`) VALUES
(11, 21, 'ABC123', 900, '2020-12-04 21:48:56', '2020-12-04 21:48:56'),
(14, 21, 'ABC12', 100, '2020-12-04 21:55:56', '2020-12-04 21:55:56'),
(16, 26, 'ABC123', 2000, '2020-12-12 10:10:42', '2020-12-12 10:12:16'),
(17, 27, 'ABC123', 450, '2020-12-12 11:22:40', '2020-12-12 11:24:16'),
(18, 27, '684', 550, '2020-12-12 11:37:17', '2020-12-12 11:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_purchase_orders`
--

CREATE TABLE `vendor_purchase_orders` (
  `id` int(11) NOT NULL,
  `po_number` varchar(255) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `product_source` varchar(255) DEFAULT NULL,
  `product_size_start` int(11) DEFAULT NULL,
  `product_size_end` int(11) DEFAULT NULL,
  `size_unit` varchar(255) DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `qty` bigint(20) DEFAULT NULL,
  `paymnet_type` text DEFAULT NULL,
  `transport_id` int(11) DEFAULT NULL,
  `bl_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `po_type` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `p_attachment` text DEFAULT NULL,
  `p_inv_number` text DEFAULT NULL,
  `stock_status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_purchase_orders`
--

INSERT INTO `vendor_purchase_orders` (`id`, `po_number`, `vendor_id`, `company_id`, `date`, `product_id`, `product_type`, `product_source`, `product_size_start`, `product_size_end`, `size_unit`, `unit_price`, `unit_id`, `qty`, `paymnet_type`, `transport_id`, `bl_id`, `description`, `po_type`, `status`, `p_attachment`, `p_inv_number`, `stock_status`, `created_at`, `updated_at`) VALUES
(10, 'VPO-10-11', 2, 1, '1977-03-28 00:00:00', 1, NULL, NULL, 2, 99, NULL, 32, 2, 679, NULL, NULL, NULL, NULL, 'international', 0, '2020-11-21-13-54-15-64607.png', '747', 6, '2020-11-21 13:54:15', '2020-11-29 19:58:07'),
(11, 'VPO-11-11', 1, 1, NULL, 1, NULL, NULL, 59, 64, NULL, 7171, 1, 980, NULL, NULL, NULL, NULL, 'international', 0, '2020-11-21-13-55-53-64607.png', '863', 0, '2020-11-21 13:55:53', '2020-11-24 20:36:56'),
(12, 'VPO-12-11', 1, 1, '2020-11-21 13:57:50', 1, NULL, NULL, 23, 39, NULL, 34, 2, 23, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-21-13-57-50-64607.png', '747', 1, '2020-11-21 13:57:50', '2020-11-28 22:17:59'),
(14, 'VPO-14-11', 2, 1, '2020-11-24 20:39:41', 1, NULL, NULL, 16, 74, NULL, 987, 2, 365, NULL, NULL, NULL, NULL, 'international', 0, '2020-11-24-20-39-41-logo12.png', '189', 0, '2020-11-24 20:39:41', '2020-11-28 20:34:17'),
(15, 'VPO-14-12', 1, 1, '2020-12-02 00:00:00', 1, NULL, NULL, 2, 34, NULL, 4, 2, 2, NULL, NULL, NULL, NULL, 'local', 0, NULL, NULL, 0, '2020-12-01 20:46:38', '2020-12-01 20:46:38'),
(16, 'VPO-14-12', 1, 1, '2020-12-02 00:00:00', 1, NULL, NULL, 2, 34, NULL, 4, 2, 2, NULL, NULL, NULL, NULL, 'local', 0, NULL, NULL, 0, '2020-12-01 20:47:23', '2020-12-01 20:47:23'),
(17, 'VPO-16-12', 2, 2, '1984-06-21 00:00:00', 1, NULL, NULL, 36, 41, NULL, 110, 1, 23, NULL, NULL, NULL, NULL, 'local', 0, NULL, NULL, 0, '2020-12-01 21:07:32', '2020-12-01 21:07:32'),
(18, 'VPO-18-12', 1, 1, '2020-12-01 21:16:31', 1, NULL, NULL, 29, 2, NULL, 160, 2, 102, NULL, NULL, NULL, NULL, 'international', 0, NULL, NULL, 0, '2020-12-01 21:16:31', '2020-12-01 21:55:31'),
(19, 'VPO-19-12', 2, 2, '2020-12-01 21:27:46', 1, NULL, NULL, 95, 35, NULL, 440, 2, 1000, NULL, NULL, NULL, NULL, 'international', 0, NULL, NULL, 8, '2020-12-01 21:27:46', '2020-12-02 07:52:28'),
(20, 'VPO-20-12', 1, 2, '2020-12-04 21:26:27', 1, NULL, NULL, 23, 222, NULL, 22, 2, 22, NULL, NULL, NULL, NULL, 'local', 1, NULL, NULL, 1, '2020-12-04 21:26:27', '2020-12-04 21:35:40'),
(21, 'VPO-21-12', 1, 1, '2020-12-01 00:00:00', 1, NULL, NULL, 23, 234, NULL, 1000, 2, 1000, NULL, NULL, NULL, NULL, 'international', 1, '2020-12-04-21-47-51-logo12.png', '747', 3, '2020-12-04 21:47:51', '2020-12-04 22:35:19'),
(25, 'VPO-25-12', 1, 1, '2020-12-12 10:06:11', 1, NULL, NULL, 25, 36, NULL, 256, 2, 1000, NULL, NULL, NULL, NULL, 'local', 1, NULL, NULL, 1, '2020-12-12 10:06:11', '2020-12-12 10:07:45'),
(26, 'VPO-26-12', 1, 2, '2020-12-12 00:00:00', 1, NULL, NULL, 36, 50, NULL, 1444, 2, 2000, NULL, NULL, NULL, NULL, 'international', 1, NULL, NULL, 4, '2020-12-12 10:09:45', '2020-12-12 10:12:41'),
(27, 'VPO-27-12', 3, 1, '2020-12-12 11:18:56', 1, NULL, NULL, 0, 50, NULL, 21000, 2, 1000, NULL, NULL, NULL, NULL, 'international', 1, NULL, NULL, 6, '2020-12-12 11:18:56', '2020-12-12 11:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_purchase_order_expenses`
--

CREATE TABLE `vendor_purchase_order_expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_purchase_order_expenses`
--

INSERT INTO `vendor_purchase_order_expenses` (`id`, `name`, `unit`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'sales tax', 'percent', 17, '2020-11-21 02:51:54', '2020-11-21 02:51:54'),
(2, 'duty', 'percent', 5, '2020-11-21 02:53:54', '2020-11-21 02:53:54'),
(3, 'income tax', 'percent', 5, '2020-11-21 02:54:22', '2020-11-21 02:54:22'),
(4, 'value edition tax', 'percent', 3, '2020-11-21 02:55:07', '2020-11-21 02:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_purchase_terms`
--

CREATE TABLE `vendor_purchase_terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_purchase_terms`
--

INSERT INTO `vendor_purchase_terms` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Size of Material Must be  With In Range', '2020-11-21 02:25:47', '2020-11-21 02:25:47'),
(2, 'Moisture Shouldn\'t Exceed 08%', '2020-11-21 02:26:14', '2020-11-21 02:26:14'),
(3, 'Size of Material shouldn\'t below 25mm', '2020-11-21 02:27:04', '2020-11-21 02:27:04'),
(4, 'Paymnet will be Clear After 25 working Days', '2020-11-21 02:27:34', '2020-11-21 02:27:34'),
(5, 'All Quality Must be on Commertial Basis', '2020-11-21 02:27:58', '2020-11-21 02:27:58'),
(6, 'Bill of Entery is Mandatory for Invoice', '2020-11-21 02:28:32', '2020-11-21 02:28:32'),
(7, 'Transportor Wil be The XYZ', '2020-11-21 02:28:59', '2020-11-21 02:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Karachi Port', '2020-11-28 15:49:22', '2020-11-28 15:49:22'),
(2, 'Karachi warehouse', '2020-11-28 15:49:58', '2020-11-28 15:49:58'),
(3, 'Lahore Warehouse', '2020-11-28 15:50:15', '2020-11-28 15:50:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `commission_agents`
--
ALTER TABLE `commission_agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumable_inventory_transactions`
--
ALTER TABLE `consumable_inventory_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consume_inventory_transaction_ope`
--
ALTER TABLE `consume_inventory_transaction_ope`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cpo_com_agents`
--
ALTER TABLE `cpo_com_agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cpo_expenses`
--
ALTER TABLE `cpo_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cpo_terms`
--
ALTER TABLE `cpo_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_purchase_orders`
--
ALTER TABLE `customer_purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_purchase_order_expenses`
--
ALTER TABLE `customer_purchase_order_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_purchase_terms`
--
ALTER TABLE `customer_purchase_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `delivery_orders`
--
ALTER TABLE `delivery_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factories`
--
ALTER TABLE `factories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_items`
--
ALTER TABLE `inv_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inwards`
--
ALTER TABLE `inwards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `po_expenses`
--
ALTER TABLE `po_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_terms`
--
ALTER TABLE `po_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_term_conditions`
--
ALTER TABLE `po_term_conditions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terms_condiotons_fk` (`term_cndiotion_id`),
  ADD KEY `purchase_order_fk` (`po_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `sm_bank_accounts`
--
ALTER TABLE `sm_bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_managments`
--
ALTER TABLE `stock_managments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply_invoices`
--
ALTER TABLE `supply_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply_invoice_details`
--
ALTER TABLE `supply_invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply_local_purchase_orders`
--
ALTER TABLE `supply_local_purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply_local_purchase_order_details`
--
ALTER TABLE `supply_local_purchase_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply_partial_deliveries`
--
ALTER TABLE `supply_partial_deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply_partial_delivery_details`
--
ALTER TABLE `supply_partial_delivery_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_and_conditions`
--
ALTER TABLE `term_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `transporters`
--
ALTER TABLE `transporters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_bl_numbers`
--
ALTER TABLE `vendor_bl_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_letter_credits`
--
ALTER TABLE `vendor_letter_credits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `po_id_lc_id_fk` (`po_id`);

--
-- Indexes for table `vendor_purchase_orders`
--
ALTER TABLE `vendor_purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_purchase_order_expenses`
--
ALTER TABLE `vendor_purchase_order_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_purchase_terms`
--
ALTER TABLE `vendor_purchase_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `commission_agents`
--
ALTER TABLE `commission_agents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consumable_inventory_transactions`
--
ALTER TABLE `consumable_inventory_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `consume_inventory_transaction_ope`
--
ALTER TABLE `consume_inventory_transaction_ope`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cpo_com_agents`
--
ALTER TABLE `cpo_com_agents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cpo_expenses`
--
ALTER TABLE `cpo_expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cpo_terms`
--
ALTER TABLE `cpo_terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_purchase_orders`
--
ALTER TABLE `customer_purchase_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_purchase_order_expenses`
--
ALTER TABLE `customer_purchase_order_expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_purchase_terms`
--
ALTER TABLE `customer_purchase_terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `delivery_orders`
--
ALTER TABLE `delivery_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `factories`
--
ALTER TABLE `factories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inv_items`
--
ALTER TABLE `inv_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1197;

--
-- AUTO_INCREMENT for table `inwards`
--
ALTER TABLE `inwards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=864;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `po_expenses`
--
ALTER TABLE `po_expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `po_terms`
--
ALTER TABLE `po_terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `po_term_conditions`
--
ALTER TABLE `po_term_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sm_bank_accounts`
--
ALTER TABLE `sm_bank_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_managments`
--
ALTER TABLE `stock_managments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supply_invoices`
--
ALTER TABLE `supply_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supply_invoice_details`
--
ALTER TABLE `supply_invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `supply_local_purchase_orders`
--
ALTER TABLE `supply_local_purchase_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `supply_local_purchase_order_details`
--
ALTER TABLE `supply_local_purchase_order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `supply_partial_deliveries`
--
ALTER TABLE `supply_partial_deliveries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supply_partial_delivery_details`
--
ALTER TABLE `supply_partial_delivery_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `term_and_conditions`
--
ALTER TABLE `term_and_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transporters`
--
ALTER TABLE `transporters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendor_bl_numbers`
--
ALTER TABLE `vendor_bl_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `vendor_letter_credits`
--
ALTER TABLE `vendor_letter_credits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vendor_purchase_orders`
--
ALTER TABLE `vendor_purchase_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `vendor_purchase_order_expenses`
--
ALTER TABLE `vendor_purchase_order_expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor_purchase_terms`
--
ALTER TABLE `vendor_purchase_terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `po_term_conditions`
--
ALTER TABLE `po_term_conditions`
  ADD CONSTRAINT `purchase_order_fk` FOREIGN KEY (`po_id`) REFERENCES `vendor_purchase_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `terms_condiotons_fk` FOREIGN KEY (`term_cndiotion_id`) REFERENCES `term_and_conditions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_letter_credits`
--
ALTER TABLE `vendor_letter_credits`
  ADD CONSTRAINT `po_id_lc_id_fk` FOREIGN KEY (`po_id`) REFERENCES `vendor_purchase_orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
