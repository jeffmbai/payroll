-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 12:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jipos`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `account_type_id` int(11) NOT NULL,
  `subaccount_type_id` int(11) DEFAULT NULL,
  `account_code` varchar(20) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `opening_balance` double(18,2) DEFAULT NULL,
  `is_votehead` tinyint(1) NOT NULL DEFAULT 0,
  `is_studentaccount` tinyint(1) NOT NULL DEFAULT 0,
  `is_key` tinyint(1) NOT NULL DEFAULT 0,
  `other_category` varchar(30) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `table_name` varchar(30) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `time_stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `org_id`, `account_type_id`, `subaccount_type_id`, `account_code`, `account_name`, `opening_balance`, `is_votehead`, `is_studentaccount`, `is_key`, `other_category`, `student_id`, `table_id`, `table_name`, `active`, `narrative`, `created_by`, `time_stamp`) VALUES
(2, 1, 1, 2, '87328', 'Petty Cash', 250.00, 0, 0, 1, '', 0, NULL, NULL, 1, 'All the cash received', 2, '2021-03-22 10:30:44'),
(3, 1, 1, 3, '522123', 'Paybill 522123', 0.00, 0, 0, 1, '', 0, NULL, NULL, 1, 'Paybill', 2, '2021-03-22 10:31:33'),
(6, 1, 1, 1, '1181575397', 'KCB ', 0.00, 0, 0, 1, '', 0, NULL, NULL, 1, '', 2, '2021-03-22 10:36:48'),
(8, 1, 3, 16, '2343423', 'Furniture Repair', 0.00, 0, 0, 1, '', 0, NULL, NULL, 1, 'Furniture Repair', 2, '2021-03-22 10:38:07'),
(32, 1, 1, 28, '300002', 'Accounts receivable', 0.00, 0, 0, 1, '', 0, NULL, NULL, 1, '', 2, '2021-03-26 06:24:19'),
(35, 1, 1, 28, '564343', 'Long-term investments', 0.00, 0, 0, 1, '', 0, NULL, NULL, 1, '', 2, '2021-03-26 06:25:58'),
(39, 1, 5, 30, '6543543', 'Accrued expenses', 0.00, 0, 0, 1, '', 0, NULL, NULL, 1, '', 2, '2021-03-26 06:29:09'),
(1971, 1, 4, 27, '700001', 'Sales Account', 0.00, 0, 0, 1, '', NULL, NULL, NULL, 1, 'Sales Account', 1, '2022-03-22 20:24:31'),
(1972, 1, 3, 6, '800001', 'Purchase Account', 0.00, 0, 0, 1, '', NULL, NULL, NULL, 1, 'Purchase Account', 1, '2022-03-22 20:33:47'),
(1973, 1, 1, 28, '500001', 'Inventory', 0.00, 0, 0, 1, '', NULL, NULL, NULL, 1, '', 1, '2022-03-23 12:40:40'),
(1974, 1, 1, 28, '500002', 'Sales Receivable', 0.00, 0, 0, 1, '', NULL, NULL, NULL, 1, '', 1, '2022-03-23 12:41:46'),
(1975, 1, 1, 28, '500003', 'Purchase Tax Receivable', 0.00, 0, 0, 1, '', NULL, NULL, NULL, 1, '', 1, '2022-03-23 12:42:40'),
(1976, 1, 5, 30, '600001', 'Pachases Payable', 0.00, 0, 0, 1, '', NULL, NULL, NULL, 1, '', 1, '2022-03-23 13:00:37'),
(1977, 1, 5, 30, '600002', 'Salaries Payable', 0.00, 0, 0, 1, '', NULL, NULL, NULL, 1, '', 1, '2022-03-23 13:01:08'),
(1978, 1, 5, 30, '600003', 'Sales Tax Payable', 0.00, 0, 0, 1, '', NULL, NULL, NULL, 1, '', 1, '2022-03-23 13:01:39'),
(1979, 1, 3, 16, '800002', 'Salaries', 0.00, 0, 0, 1, '', NULL, NULL, NULL, 1, '', 1, '2022-03-23 13:04:02'),
(1980, 1, 3, 32, '800003', 'NHIF', 0.00, 0, 0, 1, '', NULL, NULL, NULL, 1, '', 1, '2022-04-07 07:13:58'),
(1981, 1, 3, 32, '800004', 'NSSF', 0.00, 0, 0, 1, '', NULL, NULL, NULL, 1, '', 1, '2022-04-07 07:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE `account_types` (
  `account_type_id` int(11) NOT NULL,
  `account_type_code` varchar(5) NOT NULL,
  `account_type_name` varchar(20) NOT NULL,
  `narrative` text DEFAULT NULL,
  `time_stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`account_type_id`, `account_type_code`, `account_type_name`, `narrative`, `time_stamp`) VALUES
(1, 'AS', 'Asset', NULL, '2021-03-22 07:32:53'),
(2, 'EQ', 'Shareholders Equity', NULL, '2021-03-22 07:32:53'),
(3, 'EX', 'Expense', NULL, '2021-03-22 07:32:53'),
(4, 'IN', 'Income', NULL, '2021-03-22 07:32:53'),
(5, 'LI', 'Liability', NULL, '2021-03-22 07:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `allowances`
--

CREATE TABLE `allowances` (
  `allowance_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `allowance_name` varchar(50) NOT NULL,
  `is_taxable` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(50) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `attribute_id` int(11) NOT NULL,
  `attribute_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(200) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`attribute_id`, `attribute_name`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 'Medium', 1, '', '2022-04-11 07:51:20', '2021-01-09 22:16:28'),
(3, 'Small', 1, '', '2022-04-11 07:51:20', '2021-01-09 22:19:36'),
(4, 'Large', 1, '', '2022-04-11 07:51:20', '2021-01-09 22:19:53'),
(5, 'Extra large', 1, '', '2022-04-11 07:51:20', '2021-01-09 22:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `bank_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `bank_pin` int(11) DEFAULT NULL,
  `account_number` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `narrative` varchar(156) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(156) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(2, 'Naviforce', 1, '', '2022-04-11 07:51:20', '2020-10-13 16:20:18'),
(7, 'HP', 1, '', '2022-04-11 07:51:20', '2022-02-03 15:47:13'),
(8, 'Celeron', 1, '', '2022-04-11 07:51:20', '2022-02-03 15:48:22'),
(9, 'Lenovo', 1, '', '2022-04-11 07:51:20', '2022-02-03 15:50:31'),
(10, 'Apple', 1, '', '2022-04-11 07:51:20', '2022-02-03 15:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `brand_models`
--

CREATE TABLE `brand_models` (
  `brand_model_id` int(11) NOT NULL,
  `org_id` int(11) DEFAULT 1,
  `brand_id` int(11) NOT NULL,
  `model_name` varchar(50) NOT NULL,
  `reorder_level` int(11) DEFAULT NULL,
  `available_qty` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `budgeting`
--

CREATE TABLE `budgeting` (
  `budget_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `budget_name` varchar(100) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `fiscal_year_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `budget_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `practical_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `balance` decimal(10,2) DEFAULT 0.00,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(150) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `budgeting`
--

INSERT INTO `budgeting` (`budget_id`, `org_id`, `budget_name`, `staff_id`, `fiscal_year_id`, `term_id`, `account_id`, `budget_amount`, `practical_amount`, `balance`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 1, 'Marketing', 0, 7, 1, 625, '50000.00', '0.00', '0.00', 1, 'Marketing activities for the institution', '2022-04-11 07:51:21', '2022-01-31 13:44:40'),
(2, 1, 'Quarter One', 0, 6, 1, 58, '1000.00', '0.00', '0.00', 1, 'retyui', '2022-04-11 07:51:21', '2022-02-24 07:46:19'),
(3, 1, 'This budget', 0, 6, 3, 7, '1000.00', '0.00', '0.00', 1, '', '2022-04-11 07:51:21', '2022-03-18 05:07:52'),
(4, 1, 'Budget A1', 0, 6, 3, 8, '500.00', '0.00', '0.00', 1, 'd', '2022-04-11 07:51:21', '2022-03-31 05:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `budget_breakdown`
--

CREATE TABLE `budget_breakdown` (
  `budget_breakdown_id` int(11) NOT NULL,
  `budget_id` int(11) NOT NULL,
  `vote_head_id` int(11) NOT NULL,
  `budget_amount` double NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `narrative` varchar(50) DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(156) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(2, 'Car accessories', 1, '', '2022-04-11 07:51:22', '2020-12-09 11:57:52'),
(3, 'Bags', 1, '', '2022-04-11 07:51:22', '2021-01-09 22:06:41'),
(7, 'Kids', 1, '', '2022-04-11 07:51:22', '2021-01-09 22:10:33'),
(8, 'Beverages', 1, 'Tea supplements', '2022-04-11 07:51:22', '2022-02-03 14:59:57'),
(9, 'Cereals', 1, 'Lunch cereals', '2022-04-11 07:51:22', '2022-02-03 15:00:47'),
(10, 'Laptops', 1, '', '2022-04-11 07:51:22', '2022-02-03 16:45:59'),
(11, 'shoes', 1, 'shoes', '2022-04-27 08:07:40', '2022-04-27 08:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(50) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `color_name`, `time_stamp`) VALUES
(1, 'Red', '2020-11-02 12:00:30'),
(3, 'White', '2020-11-02 12:59:01'),
(4, 'Black', '2020-11-02 12:59:05'),
(5, 'Blue', '2020-11-02 12:59:09'),
(6, 'Green', '2020-11-02 12:59:12'),
(7, 'Gold', '2021-01-10 07:16:25'),
(8, 'Silver', '2021-01-10 07:16:25'),
(9, 'Grey', '2021-01-10 07:16:25'),
(10, 'Brown', '2021-01-10 07:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country_code` varchar(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(156) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `name`, `country_code`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(4, 'Afghanistan', 'AF', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(5, 'Åland', 'AX', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(6, 'Albania', 'AL', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(7, 'Algeria', 'DZ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(8, 'American Samoa', 'AS', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(9, 'Andorra', 'AD', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(10, 'Angola', 'AO', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(11, 'Anguilla', 'AI', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(12, 'Antarctica', 'AQ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(13, 'Antigua and Barbuda', 'AG', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(14, 'Argentina', 'AR', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(15, 'Armenia', 'AM', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(16, 'Aruba', 'AW', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(17, 'Australia', 'AU', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(18, 'Austria', 'AT', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(19, 'Azerbaijan', 'AZ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(20, 'Bahamas', 'BS', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(21, 'Bahrain', 'BH', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(22, 'Bangladesh', 'BD', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(23, 'Barbados', 'BB', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(24, 'Belarus', 'BY', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(25, 'Belgium', 'BE', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(26, 'Belize', 'BZ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(27, 'Benin', 'BJ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(28, 'Bermuda', 'BM', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(29, 'Bhutan', 'BT', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(30, 'Bolivia', 'BO', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(31, 'Bonaire', 'BQ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(32, 'Bosnia and Herzegovina', 'BA', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(33, 'Botswana', 'BW', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(34, 'Bouvet Island', 'BV', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(35, 'Brazil', 'BR', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(36, 'British Indian Ocean Territory', 'IO', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(37, 'British Virgin Islands', 'VG', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(38, 'Brunei', 'BN', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(39, 'Bulgaria', 'BG', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(40, 'Burkina Faso', 'BF', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(41, 'Burundi', 'BI', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(42, 'Cambodia', 'KH', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(43, 'Cameroon', 'CM', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(44, 'Canada', 'CA', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(45, 'Cape Verde', 'CV', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(46, 'Cayman Islands', 'KY', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(47, 'Central African Republic', 'CF', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(48, 'Chad', 'TD', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(49, 'Chile', 'CL', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(50, 'China', 'CN', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(51, 'Christmas Island', 'CX', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(52, 'Cocos [Keeling] Islands', 'CC', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(53, 'Colombia', 'CO', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(54, 'Comoros', 'KM', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(55, 'Cook Islands', 'CK', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(56, 'Costa Rica', 'CR', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(57, 'Croatia', 'HR', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(58, 'Cuba', 'CU', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(59, 'Curacao', 'CW', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(60, 'Cyprus', 'CY', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(61, 'Czech Republic', 'CZ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(62, 'Democratic Republic of the Congo', 'CD', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(63, 'Denmark', 'DK', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(64, 'Djibouti', 'DJ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(65, 'Dominica', 'DM', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(66, 'Dominican Republic', 'DO', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(67, 'East Timor', 'TL', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(68, 'Ecuador', 'EC', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(69, 'Egypt', 'EG', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(70, 'El Salvador', 'SV', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(71, 'Equatorial Guinea', 'GQ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(72, 'Eritrea', 'ER', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(73, 'Estonia', 'EE', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(74, 'Ethiopia', 'ET', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(75, 'Falkland Islands', 'FK', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(76, 'Faroe Islands', 'FO', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(77, 'Fiji', 'FJ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(78, 'Finland', 'FI', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(79, 'France', 'FR', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(80, 'French Guiana', 'GF', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(81, 'French Polynesia', 'PF', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(82, 'French Southern Territories', 'TF', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(83, 'Gabon', 'GA', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(84, 'Gambia', 'GM', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(85, 'Georgia', 'GE', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(86, 'Germany', 'DE', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(87, 'Ghana', 'GH', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(88, 'Gibraltar', 'GI', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(89, 'Greece', 'GR', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(90, 'Greenland', 'GL', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(91, 'Grenada', 'GD', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(92, 'Guadeloupe', 'GP', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(93, 'Guam', 'GU', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(94, 'Guatemala', 'GT', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(95, 'Guernsey', 'GG', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(96, 'Guinea', 'GN', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(97, 'Guinea-Bissau', 'GW', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(98, 'Guyana', 'GY', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(99, 'Haiti', 'HT', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(100, 'Heard Island and McDonald Islands', 'HM', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(101, 'Honduras', 'HN', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(102, 'Hong Kong', 'HK', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(103, 'Hungary', 'HU', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(104, 'Iceland', 'IS', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(105, 'India', 'IN', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(106, 'Indonesia', 'ID', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(107, 'Iran', 'IR', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(108, 'Iraq', 'IQ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(109, 'Ireland', 'IE', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(110, 'Isle of Man', 'IM', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(111, 'Israel', 'IL', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(112, 'Italy', 'IT', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(113, 'Ivory Coast', 'CI', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(114, 'Jamaica', 'JM', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(115, 'Japan', 'JP', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(116, 'Jersey', 'JE', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(117, 'Jordan', 'JO', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(118, 'Kazakhstan', 'KZ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(119, 'Kenya', 'KE', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(120, 'Kiribati', 'KI', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(121, 'Kosovo', 'XK', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(122, 'Kuwait', 'KW', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(123, 'Kyrgyzstan', 'KG', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(124, 'Laos', 'LA', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(125, 'Latvia', 'LV', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(126, 'Lebanon', 'LB', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(127, 'Lesotho', 'LS', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(128, 'Liberia', 'LR', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(129, 'Libya', 'LY', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(130, 'Liechtenstein', 'LI', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(131, 'Lithuania', 'LT', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(132, 'Luxembourg', 'LU', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(133, 'Macao', 'MO', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(134, 'Macedonia', 'MK', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(135, 'Madagascar', 'MG', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(136, 'Malawi', 'MW', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(137, 'Malaysia', 'MY', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(138, 'Maldives', 'MV', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(139, 'Mali', 'ML', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(140, 'Malta', 'MT', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(141, 'Marshall Islands', 'MH', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(142, 'Martinique', 'MQ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(143, 'Mauritania', 'MR', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(144, 'Mauritius', 'MU', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(145, 'Mayotte', 'YT', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(146, 'Mexico', 'MX', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(147, 'Micronesia', 'FM', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(148, 'Moldova', 'MD', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(149, 'Monaco', 'MC', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(150, 'Mongolia', 'MN', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(151, 'Montenegro', 'ME', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(152, 'Montserrat', 'MS', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(153, 'Morocco', 'MA', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(154, 'Mozambique', 'MZ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(155, 'Myanmar [Burma]', 'MM', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(156, 'Namibia', 'NA', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(157, 'Nauru', 'NR', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(158, 'Nepal', 'NP', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(159, 'Netherlands', 'NL', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(160, 'New Caledonia', 'NC', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(161, 'New Zealand', 'NZ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(162, 'Nicaragua', 'NI', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(163, 'Niger', 'NE', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(164, 'Nigeria', 'NG', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(165, 'Niue', 'NU', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(166, 'Norfolk Island', 'NF', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(167, 'North Korea', 'KP', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(168, 'Northern Mariana Islands', 'MP', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(169, 'Norway', 'NO', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(170, 'Oman', 'OM', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(171, 'Pakistan', 'PK', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(172, 'Palau', 'PW', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(173, 'Palestine', 'PS', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(174, 'Panama', 'PA', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(175, 'Papua New Guinea', 'PG', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(176, 'Paraguay', 'PY', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(177, 'Peru', 'PE', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(178, 'Philippines', 'PH', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(179, 'Pitcairn Islands', 'PN', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(180, 'Poland', 'PL', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(181, 'Portugal', 'PT', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(182, 'Puerto Rico', 'PR', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(183, 'Qatar', 'QA', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(184, 'Republic of the Congo', 'CG', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(185, 'Réunion', 'RE', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(186, 'Romania', 'RO', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(187, 'Russia', 'RU', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(188, 'Rwanda', 'RW', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(189, 'Saint Barthélemy', 'BL', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(190, 'Saint Helena', 'SH', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(191, 'Saint Kitts and Nevis', 'KN', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(192, 'Saint Lucia', 'LC', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(193, 'Saint Martin', 'MF', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(194, 'Saint Pierre and Miquelon', 'PM', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(195, 'Saint Vincent and the Grenadines', 'VC', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(196, 'Samoa', 'WS', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(197, 'San Marino', 'SM', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(198, 'São Tomé and Príncipe', 'ST', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(199, 'Saudi Arabia', 'SA', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(200, 'Senegal', 'SN', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(201, 'Serbia', 'RS', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(202, 'Seychelles', 'SC', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(203, 'Sierra Leone', 'SL', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(204, 'Singapore', 'SG', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(205, 'Sint Maarten', 'SX', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(206, 'Slovakia', 'SK', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(207, 'Slovenia', 'SI', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(208, 'Solomon Islands', 'SB', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(209, 'Somalia', 'SO', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(210, 'South Africa', 'ZA', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(211, 'South Georgia and the South Sandwich Islands', 'GS', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(212, 'South Korea', 'KR', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(213, 'South Sudan', 'SS', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(214, 'Spain', 'ES', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(215, 'Sri Lanka', 'LK', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(216, 'Sudan', 'SD', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(217, 'Suriname', 'SR', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(218, 'Svalbard and Jan Mayen', 'SJ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(219, 'Swaziland', 'SZ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(220, 'Sweden', 'SE', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(221, 'Switzerland', 'CH', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(222, 'Syria', 'SY', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(223, 'Taiwan', 'TW', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(224, 'Tajikistan', 'TJ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(225, 'Tanzania', 'TZ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(226, 'Thailand', 'TH', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(227, 'Togo', 'TG', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(228, 'Tokelau', 'TK', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(229, 'Tonga', 'TO', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(230, 'Trinidad and Tobago', 'TT', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(231, 'Tunisia', 'TN', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(232, 'Turkey', 'TR', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(233, 'Turkmenistan', 'TM', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(234, 'Turks and Caicos Islands', 'TC', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(235, 'Tuvalu', 'TV', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(236, 'U.S. Minor Outlying Islands', 'UM', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(237, 'U.S. Virgin Islands', 'VI', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(238, 'Uganda', 'UG', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(239, 'Ukraine', 'UA', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(240, 'United Arab Emirates', 'AE', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(241, 'United Kingdom', 'GB', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(242, 'United States', 'US', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(243, 'Uruguay', 'UY', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(244, 'Uzbekistan', 'UZ', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(245, 'Vanuatu', 'VU', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(246, 'Vatican City', 'VA', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(247, 'Venezuela', 'VE', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(248, 'Vietnam', 'VN', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(249, 'Wallis and Futuna', 'WF', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(250, 'Western Sahara', 'EH', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(251, 'Yemen', 'YE', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(252, 'Zambia', 'ZM', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26'),
(253, 'Zimbabwe', 'ZW', 1, NULL, '2022-04-11 07:51:22', '2020-05-09 17:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(5) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(256) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`currency_id`, `currency_code`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 'KES', 1, 'Kenya Shillings', '2022-04-11 07:51:23', '2019-11-18 15:23:44'),
(3, 'Pound', 1, '£ - Pounds', '2022-04-11 07:51:23', '2019-11-20 05:35:53'),
(4, 'Dolla', 1, '$', '2022-04-11 07:51:23', '2022-02-03 15:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `db_backups`
--

CREATE TABLE `db_backups` (
  `id` int(11) NOT NULL,
  `backup_name` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_backups`
--

INSERT INTO `db_backups` (`id`, `backup_name`, `time_stamp`) VALUES
(1, 'backup-on-2021-06-15-13-42-33.zip', '2021-06-15 10:42:33'),
(2, 'backup-on-2022-04-12-15-01-54.zip', '2022-04-12 13:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `deductibles`
--

CREATE TABLE `deductibles` (
  `deductible_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `deductible_name` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(50) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departmental_heads`
--

CREATE TABLE `departmental_heads` (
  `departmental_head_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `current` tinyint(1) NOT NULL DEFAULT 1,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departmental_heads`
--

INSERT INTO `departmental_heads` (`departmental_head_id`, `department_id`, `entity_id`, `current`, `from_date`, `to_date`, `date_modified`, `time_stamp`) VALUES
(1, 1, 4, 0, '2020-03-14', '2020-03-16', '2022-04-11 07:51:24', '2020-03-15 05:55:10'),
(2, 1, 61, 1, '2022-03-09', '2022-04-07', '2022-04-11 07:51:24', '2022-03-18 10:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `station_id` int(11) NOT NULL,
  `department_name` varchar(156) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `narrative` varchar(156) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `org_id`, `station_id`, `department_name`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 1, 1, 'Default', 1, 'Test test', '2022-04-11 07:51:24', '2020-02-16 07:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `designation_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `designation_name` varchar(30) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(100) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`designation_id`, `org_id`, `designation_name`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(3, 1, 'Administrator', 1, 'Administrator', '2022-04-11 07:51:24', '2021-05-17 05:57:51'),
(4, 1, 'Director', 1, 'Director', '2022-04-11 07:51:24', '2021-05-17 05:58:12'),
(5, 1, 'Manager', 1, 'Manager', '2022-04-11 07:51:24', '2021-05-17 05:58:27'),
(6, 1, 'Clerk', 1, 'Clerk', '2022-04-11 07:51:24', '2021-05-17 05:58:40'),
(7, 1, 'Cashier', 1, 'Cashier', '2022-04-11 07:51:24', '2021-05-17 05:59:03'),
(8, 1, 'Secretary', 1, 'Secretary', '2022-04-11 07:51:24', '2021-05-17 05:59:23'),
(9, 1, 'Teacher', 1, 'Teacher', '2022-04-11 07:51:24', '2021-05-17 06:00:17'),
(10, 1, 'Other', 1, '', '2022-04-11 07:51:24', '2021-05-19 06:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `eating_tables`
--

CREATE TABLE `eating_tables` (
  `eating_table_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `eating_table_name` varchar(30) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(50) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eating_tables`
--

INSERT INTO `eating_tables` (`eating_table_id`, `org_id`, `eating_table_name`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 1, 'TA', 1, '', '2022-04-26 14:54:53', '2020-10-14 20:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `org_id` tinyint(1) NOT NULL DEFAULT 1,
  `designation_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `second_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_number` int(11) NOT NULL,
  `primary_phone` varchar(12) DEFAULT NULL,
  `secondary_phone` varchar(12) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `employment_number` varchar(20) DEFAULT NULL,
  `disability` tinyint(1) NOT NULL DEFAULT 0,
  `marital_status` varchar(20) DEFAULT NULL,
  `kra_pin` varchar(20) DEFAULT NULL,
  `nssf` int(11) DEFAULT NULL,
  `nhif` int(11) DEFAULT NULL,
  `job_grade` varchar(10) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `leaving_date` date DEFAULT NULL,
  `basic_salary` double DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `narrative` varchar(100) DEFAULT NULL,
  `nhif_amount` decimal(18,2) NOT NULL,
  `nssf_amount` decimal(18,2) NOT NULL,
  `tax_relief_amount` decimal(18,2) NOT NULL,
  `insurance_relief_amount` decimal(18,2) NOT NULL,
  `paye` decimal(18,2) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `org_id`, `designation_id`, `department_id`, `first_name`, `second_name`, `last_name`, `email`, `id_number`, `primary_phone`, `secondary_phone`, `dob`, `gender`, `address`, `employment_number`, `disability`, `marital_status`, `kra_pin`, `nssf`, `nhif`, `job_grade`, `joining_date`, `leaving_date`, `basic_salary`, `active`, `narrative`, `nhif_amount`, `nssf_amount`, `tax_relief_amount`, `insurance_relief_amount`, `paye`, `date_modified`, `time_stamp`) VALUES
(1, 1, 4, 1, 'JANET', 'MBAIKA', 'KIOKO', 'janetmkioko@gmail.com', 2983092, '0722859140', '', '1968-10-10', 'F', '5268', '', 0, 'Married', '', 0, 0, '', '2008-01-01', '0000-00-00', 80000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-17 06:11:26'),
(2, 1, 5, 1, 'SHEDS', 'JIMMY', 'MBITHI', 'shedsjimmy18@gmail.com', 9711240, '0722693980', '', '1969-10-10', 'M', '5268', '', 0, 'Married', '', 46620491, 9711240, '', '2008-01-01', '0000-00-00', 52000, 1, '', '1200.00', '200.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 03:16:30'),
(3, 1, 9, 1, 'EVANS', 'KENYATTA', 'OBINGA', 'eobinga@yahoo.com', 22323353, '0710716856', '', '1975-10-10', 'M', '5268', '', 0, 'Married', '', 0, 20044618, '', '0000-00-00', '0000-00-00', 31300, 1, '', '900.00', '200.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 05:54:49'),
(4, 1, 10, 1, 'DALMUS', 'MUKWAMBO', 'LIAMBIRA', 'MUKWAMBODALMUS84@GMAIL.COM', 27405478, '072546874', '', '1980-10-10', 'M', '5268', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 25000, 1, '', '850.00', '200.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 06:11:39'),
(5, 1, 9, 1, 'NELSON', 'OPINDI', 'OROBO', 'nelsonopindi20@gmail.com', 26137726, '0790708815', '', '1985-10-10', 'M', '5268', '', 0, 'Married', '', 0, 0, '', '2010-01-01', '0000-00-00', 28000, 1, '', '0.00', '200.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 06:16:00'),
(6, 1, 9, 1, 'PETER', '', 'OTIENO', 'PETERNYAMGERO@GMAIL.COM', 25058591, '0704957190', '', '1988-01-01', 'M', '5268', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 23000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 06:18:05'),
(7, 1, 9, 1, 'EDWARDS', '', 'JOSHUA', 'EDWARD@MAIL.COM', 25797274, '0738966799', '', '1990-01-01', 'M', '', '', 0, 'Single', '', 0, 0, '', '2021-01-01', '0000-00-00', 22000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 06:22:11'),
(8, 1, 9, 1, 'OYUYO', 'FARUQ', '', 'OYUKSFRASHA@GMAIL.COM', 33181698, '0759871016', '', '1980-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 21000, 0, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 06:26:48'),
(9, 1, 9, 1, 'YVONNE', 'SAMIRA', 'AKULA', 'YVONNESAMARIA@GMAIL.COM', 30948098, '0735096097', '', '1990-04-04', 'F', '5268', '', 0, 'Married', '', 530928825, 7022933, '', '0000-00-00', '0000-00-00', 18000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 06:29:06'),
(10, 1, 8, 1, 'NAMAWANGA', 'N', 'MARGARET', 'natonyamaggret@gmail.com', 20093879, '0724340039', '', '1978-02-10', 'F', '5268', '', 0, 'Married', '', 704569817, 0, '', '2008-01-01', '0000-00-00', 23000, 1, '', '750.00', '200.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 06:31:51'),
(11, 1, 10, 1, 'BRADSON', '', 'ANYANGA', 'BRANDSONANYANGA@GMAIL.COM', 2872324, '0700528164', '', '1982-04-04', 'M', '5268', '', 0, 'Single', '', 0, 0, '', '2021-01-01', '0000-00-00', 18000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 06:37:22'),
(12, 1, 9, 1, 'KELVIN', 'NYANJE', 'KARISA', 'NYANJEKELVINK3@MAIL.COM', 21733458, '0717620743', '', '1979-07-27', 'M', '5268', '', 0, 'Single', '', 827190913, 1957635, '', '2010-01-01', '0000-00-00', 20500, 1, '', '850.00', '200.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 06:42:20'),
(13, 1, 9, 1, 'DUNCAN', '', 'OMOTTO', 'DANEANOMOTTO24@GMAIL.COM', 28336825, '0769130833', '', '1991-10-10', 'M', '', '', 0, 'Married', '', 362233918, 0, '', '2015-10-10', '0000-00-00', 20000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 06:47:14'),
(14, 1, 10, 1, 'LEAH', 'CENSUS', 'AYOTI', 'LEAHCENSUS@GMAIL.COM', 27469373, '0708824886', '', '1990-10-10', 'M', '', '', 0, 'Single', '', 446899828, 3775219, '', '0000-00-00', '0000-00-00', 16000, 0, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 06:49:47'),
(15, 1, 10, 1, 'NYANDORO', 'EVERLYNE', '', 'NYANDOEVE@GMAIL.COM', 25598552, '0729824320', '', '1990-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '2021-01-01', '0000-00-00', 16000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 06:51:21'),
(16, 1, 9, 1, 'CAROLYNE', '', 'ODHIAMBO', 'odhiAMBO@MAIL.COM', 32426447, '0792873594', '', '1995-08-28', 'M', '5268', '', 0, 'Married', '', 2008830077, 0, '', '2021-01-01', '0000-00-00', 16000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 06:58:06'),
(17, 1, 9, 1, 'FAITH', 'JENIPHER', 'WAKESHO', 'AMANIFAITH66@GMAIL.COM', 30924779, '0798547010', '', '1994-01-13', 'F', '5268', '', 0, 'Single', '', 0, 4541486, '', '2018-01-01', '0000-00-00', 17250, 1, '', '600.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 06:59:50'),
(18, 1, 9, 1, 'DEFENCE', 'CHAO', 'MWAKIO', 'DEFENCE@MAIL.COM', 21279027, '0712164502', '', '1990-10-10', 'F', '', '', 0, 'Married', '', 0, 3174141, '', '2020-01-01', '0000-00-00', 17000, 1, '', '600.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 07:01:53'),
(19, 1, 9, 1, 'EDINAR', 'NGOLI', 'MWANZAME', 'NGOLIEDINAR@GMAIL.COM', 21772519, '0726431467', '', '1990-10-10', 'F', '', '', 0, 'Single', '', 0, 0, '', '2021-01-01', '0000-00-00', 15000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 07:03:38'),
(20, 1, 9, 1, 'GEORGE', 'OKUTOYI', 'TOBOSO', 'tobosogeorge67@gmail.com', 26992175, '0702809634', '', '1988-07-27', 'M', '5268', '', 0, 'Single', '', 0, 0, '', '2015-10-10', '0000-00-00', 17000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 07:07:33'),
(21, 1, 10, 1, 'MUTUKU', 'MUTISYA', 'MUTISYA', 'MUTUKU@MAIL.COM', 265656, '0723032057', '', '1977-07-01', 'M', '5268', '', 0, 'Married', '', 989139913, 14525533, '', '0000-00-00', '0000-00-00', 19000, 1, '', '600.00', '200.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 07:09:23'),
(22, 1, 10, 1, 'DOROTHY', 'VILITA', 'JOHN', 'DOROTHY@MAIL.COM', 13252102, '0718945170', '', '1974-05-20', 'F', '5268', '', 0, 'Single', '', 0, 0, '', '2019-01-01', '0000-00-00', 18000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 07:15:21'),
(23, 1, 9, 1, 'CAROLYNE', 'ATIENO', 'OKELLO', 'atienoc74@gmail.com', 5465456, '0711870092', '', '1989-07-27', 'F', '5268', '', 0, 'Married', '', 0, 0, '', '2017-01-01', '0000-00-00', 16000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 07:17:32'),
(24, 1, 10, 1, 'JUDY', 'KIMEU', 'KIMEU', 'JUDITH@MAIL.COM', 555666, '07565465565', '', '1990-10-10', 'M', '', '', 0, 'Married', '', 0, 0, '', '0000-00-00', '0000-00-00', 17000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 08:54:19'),
(25, 1, 10, 1, 'PERIS', 'NJOROGE', 'MUTHONI', 'PERIS@MAIL.COM', 8656248, '0725782453', '', '1990-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 15750, 1, '', '600.00', '200.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 08:55:58'),
(26, 1, 10, 1, 'CECILIA', 'MBUCHE', 'MTSONGA', 'CECILIA@MAIL.COM', 5665666, '07566656', '', '1980-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 13000, 0, '', '600.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 08:59:36'),
(27, 1, 10, 1, 'MARGARET', 'KACHE', 'KAZUNGU', 'MAGGREKACHE@GMAIL.COM', 30962116, '0748480844', '', '1990-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 13000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 09:01:35'),
(28, 1, 9, 1, 'MARY', 'MBODZE', 'NZARO', 'MARY@MAIL.COM', 33336487, '0792360195', '', '1990-10-10', 'F', '', '', 0, 'Single', '', 2012445889, 6306613, '', '0000-00-00', '0000-00-00', 15000, 1, '', '500.00', '200.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 09:03:00'),
(29, 1, 9, 1, 'GLADYS', '', 'THOYA', 'THOYA@MAIL.COM', 55665656, '076656665', '', '1993-10-10', 'F', '5268', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 14000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 09:27:44'),
(30, 1, 10, 1, 'SHAABAN', 'MAJALIWA', 'MAJALIWA', 'SHAABAN@MAIL.COM', 5421421, '0714604880', '', '1954-10-10', 'M', '5268', '', 0, 'Married', '', 0, 0, '', '0000-00-00', '0000-00-00', 12500, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 09:38:35'),
(32, 1, 10, 1, 'WYCLIFF', 'BUTICHI', 'LITSUTSA', 'LITSUTSA@MAIL.COM', 23333484, '0727508617', '', '1990-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 13000, 1, '', '500.00', '200.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 09:42:14'),
(33, 1, 10, 1, 'ABUDRAHAM', 'BUYA', 'DIBA', 'DIBA@MAIL.COM', 55656526, '0784574522', '', '1990-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 11500, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 09:43:42'),
(34, 1, 10, 1, 'CHRISTINE', '', 'KADZO', 'KADZO@MAIL.COM', 511566566, '0722222333', '', '2000-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 10500, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 10:07:26'),
(35, 1, 10, 1, 'MICHAEL', 'D', 'JOSEPH', 'JOSEPH@MAIL.COM', 546556156, '07556665656', '', '1980-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 9000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 10:10:00'),
(36, 1, 9, 1, 'EDITH', 'REHEMA', 'NGOWA', 'REHEMANGOWA@GMAIL.COM', 27031657, '0714479364', '', '1987-01-01', 'F', '5268', '', 0, 'Married', '', 0, 0, '', '0000-00-00', '0000-00-00', 13500, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 10:11:38'),
(37, 1, 10, 1, 'ELINAH', '', 'GONA', 'ELINAH@MAIL.COM', 2147483647, '0755666565', '', '2000-10-10', 'F', '5268', '', 0, 'Single', '', 0, 0, '', '2021-01-01', '0000-00-00', 11000, 1, '', '400.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 10:13:17'),
(38, 1, 10, 1, 'ENNET', 'HADIDHA', 'HADIDHA', 'ENNET@MAIL.COM', 21427514, '0748210450', '', '1990-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 10500, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 10:14:54'),
(39, 1, 10, 1, 'JAMES', 'KALAMA', 'KALAMA', 'JAMES@MAIL.COM', 55659555, '0787458582', '', '1990-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 10500, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 10:16:18'),
(41, 1, 10, 1, 'SYRIA', 'MWARUA', 'MWARUA', 'MWARUA@MAIL.COM', 33701832, '0740715587', '', '1990-01-10', 'F', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 10500, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 10:19:06'),
(42, 1, 10, 1, 'GABRIEL', 'KATANA', 'KAVIHA', 'GABRIEL@MAIL.COM', 10669557, '0711111111', '', '1990-10-10', 'M', '5268', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 7000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-19 10:22:58'),
(43, 1, 9, 1, 'LAVENDA', 'MBEYU', 'CHIKO', 'mbeyuchiko@mail.com', 30438187, '0724125455', '', '1993-03-31', 'F', '5268', '', 0, 'Married', '', 2011619885, 6306480, '', '2021-01-01', '0000-00-00', 13500, 1, '', '500.00', '200.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-31 10:20:51'),
(44, 1, 6, 1, 'MARTIN', 'NGAO', 'LEWA', 'martinlewa@gmail.com', 22997220, '0724664579', '', '1988-01-01', 'M', '5268', '', 0, 'Single', '', 2026187632, 27997220, '', '0000-00-00', '0000-00-00', 18000, 0, '', '500.00', '200.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-05-31 12:06:41'),
(45, 1, 9, 1, 'JOHN', 'CHENGO', 'BAYA', 'johnchengo@gmail.com', 27450917, '0745982469', '', '1986-12-07', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 15000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-08-05 07:38:24'),
(49, 1, 9, 1, 'FAITH', 'AWINO', 'OGOLLA', 'faithogolla@mail.com', 3200449, '0798522688', '', '1995-05-24', 'F', '', '', 0, 'Single', '', 2028788533, 14265692, '', '0000-00-00', '0000-00-00', 15000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-08-05 08:09:29'),
(50, 1, 9, 1, 'RAMADHANA', 'SHONO', 'MOHAMED', 'rama@mail.com', 39263650, '0757971366', '', '1995-09-13', 'F', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 15000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-08-05 09:48:40'),
(51, 1, 9, 1, 'ROSEMARY', 'ACHIENG', 'BUNDE', 'rozyachiengebundez@gmail.com', 30651527, '0716350486', '', '1992-08-08', 'F', '', '', 0, 'Single', 'A010674372Y', 200912403, 16429280, '', '0000-00-00', '0000-00-00', 17000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-08-24 05:58:12'),
(52, 1, 10, 1, 'MBUVI', '', 'MUTHAMI', 'mbuvimuthami2019@gmail.com', 10434446, '0726356226', '', '1970-01-01', 'M', '', '', 0, 'Single', 'A014274789F', 0, 0, '', '0000-00-00', '0000-00-00', 15000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-09-01 13:18:57'),
(53, 1, 6, 1, 'JOHN', 'KAHINDI', 'ABDALLA', 'john.studio2030@gmail.com', 8459453, '07197312456', '0746812101', '1966-10-28', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 25000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-09-27 15:16:21'),
(54, 1, 6, 1, 'STEPHEN', 'MUSILI', 'KYALO', 'stevemusili4@gmail.com', 29571117, '0723816038', '', '1998-01-01', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 18000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2021-09-27 15:21:39'),
(55, 1, 9, 1, 'EMMACULATE', 'MBODZE', 'MATEMBO', 'matembo69@gmail.com', 30285511, '0708416097', '', '1992-09-12', 'F', '', '', 0, 'Married', 'A008620088Z', 2003415595, 15316548, '', '0000-00-00', '0000-00-00', 15000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-04-11 07:51:25', '2022-02-08 13:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `employee_allowances`
--

CREATE TABLE `employee_allowances` (
  `employee_allowance_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `allowance_id` int(11) NOT NULL,
  `allowance_amount` double NOT NULL,
  `is_one_time` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(50) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_allowances`
--

INSERT INTO `employee_allowances` (`employee_allowance_id`, `employee_id`, `allowance_id`, `allowance_amount`, `is_one_time`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 2, 6, 8000, 0, 1, '', '2022-04-11 07:51:26', '2021-05-19 03:31:08'),
(2, 3, 6, 5000, 0, 1, '', '2022-04-11 07:51:26', '2021-05-19 06:07:53'),
(3, 5, 6, 5000, 0, 1, '', '2022-04-11 07:51:26', '2021-05-19 06:16:29'),
(4, 10, 6, 5000, 0, 1, '', '2022-04-11 07:51:26', '2021-05-19 06:32:14'),
(5, 12, 6, 7000, 0, 1, '', '2022-04-11 07:51:26', '2021-05-19 06:45:09'),
(6, 14, 6, 2000, 0, 1, '', '2022-04-11 07:51:26', '2021-05-19 06:50:01'),
(8, 21, 6, 3000, 0, 1, '', '2022-04-11 07:51:26', '2021-05-19 07:09:36'),
(9, 24, 6, 2000, 0, 1, '', '2022-04-11 07:51:26', '2021-05-19 08:54:37'),
(10, 25, 6, 3500, 0, 1, '', '2022-04-11 07:51:26', '2021-05-19 08:56:21'),
(11, 26, 6, 2000, 0, 1, '', '2022-04-11 07:51:26', '2021-05-19 08:59:55'),
(12, 29, 6, 2000, 0, 1, '', '2022-04-11 07:51:26', '2021-05-19 09:28:03'),
(13, 30, 6, 2500, 0, 1, '', '2022-04-11 07:51:26', '2021-05-19 09:38:50'),
(14, 32, 6, 2000, 0, 1, '', '2022-04-11 07:51:26', '2021-05-19 09:42:32'),
(15, 33, 6, 2500, 0, 1, '', '2022-04-11 07:51:26', '2021-05-19 09:43:58'),
(16, 38, 6, 1500, 0, 1, '', '2022-04-11 07:51:26', '2021-05-19 10:15:06'),
(17, 39, 6, 2000, 0, 1, '', '2022-04-11 07:51:26', '2021-05-19 10:16:30'),
(18, 41, 6, 2500, 0, 1, '', '2022-04-11 07:51:26', '2021-05-19 10:19:21'),
(19, 11, 6, 3000, 0, 1, 'Boarding master allowance', '2022-04-11 07:51:26', '2022-01-31 09:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `employee_bank_details`
--

CREATE TABLE `employee_bank_details` (
  `employee_bank_detail_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `branch_name` varchar(50) DEFAULT NULL,
  `branch_code` varchar(30) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_bank_details`
--

INSERT INTO `employee_bank_details` (`employee_bank_detail_id`, `employee_id`, `bank_name`, `branch_name`, `branch_code`, `account_number`, `active`, `time_stamp`) VALUES
(2, 1, 'EQUITY', 'MALINDI', '0450', '0450192090353', 1, '2021-05-26 09:14:33'),
(3, 2, 'EQUITY', 'MALINDI', '0450', '0450191155742', 1, '2021-05-26 09:15:38'),
(4, 5, 'EQUITY', 'MALINDI', '0450', '0450179221085', 1, '2021-05-26 14:06:00'),
(5, 3, 'EQUITY', 'MALINDI', '0450', '0320190847630', 1, '2021-05-26 14:28:25'),
(6, 7, 'EQUITY', 'MALINDI', '0450', '0450167005682', 1, '2021-05-26 14:34:19'),
(7, 9, 'EQUITY', 'MALINDI', '0450', '0450180432032', 1, '2021-05-26 14:37:32'),
(8, 25, 'EQUITY', 'MALINDI', '0450', '0450191451729', 1, '2021-05-26 14:39:27'),
(9, 24, 'EQUITY', 'MALINDI', '0450', '0670197383599', 1, '2021-05-26 14:40:56'),
(10, 16, 'EQUITY', 'MALINDI', '0450', '7770171376008', 1, '2021-05-26 14:42:40'),
(11, 33, 'EQUITY', 'MALINDI', '0450', '0450177057343', 1, '2021-05-29 13:36:26'),
(12, 21, 'EQUITY', 'MALINDI', '0450', '0020100050416', 1, '2021-05-31 09:55:51'),
(13, 30, 'EQUITY', 'MALINDI', '0450', '0450169983687', 1, '2021-05-31 10:03:31'),
(14, 43, 'EQUITY', 'MALINDI', '0450', '0450178973019', 1, '2021-05-31 10:29:25'),
(15, 36, 'EQUITY', 'MALINDI', '0450', '0450197935517', 1, '2021-05-31 10:33:30'),
(16, 12, 'EQUITY', 'MALINDI', '0450', '0450191915281', 1, '2021-05-31 10:38:07'),
(17, 20, 'EQUITY', 'MALINDI', '0450', '0680197086407', 1, '2021-05-31 10:42:01'),
(18, 17, 'EQUITY', 'MALINDI', '0450', '0450178817669', 1, '2021-05-31 10:44:45'),
(19, 22, 'EQUITY', 'MALINDI', '0450', '0450192360751', 1, '2021-05-31 10:50:32'),
(20, 10, 'EQUITY', 'MALINDI', '0450', '0450194699228', 1, '2021-05-31 10:52:46'),
(21, 13, 'EQUITY', 'MALINDI', '0450', '0450166623178', 1, '2021-05-31 10:59:07'),
(22, 4, 'EQUITY', 'MALINDI', '0450', '0680196881101', 1, '2021-05-31 11:02:22'),
(23, 11, 'EQUITY', 'MALINDI', '0450', '0680160486814', 1, '2021-05-31 11:04:00'),
(24, 6, 'EQUITY', 'MALINDI', '0450', '0700198346614', 1, '2021-05-31 11:05:37'),
(25, 8, 'EQUITY', 'MALINDI', '0450', '0450180501005', 1, '2021-05-31 11:08:07'),
(26, 23, 'EQUITY', 'MALINDI', '0450', '0450199781706', 1, '2021-05-31 11:14:59'),
(27, 29, 'EQUITY', 'MALINDI', '0450', '0450167877433', 1, '2021-05-31 11:17:16'),
(28, 28, 'EQUITY', 'MALINDI', '0450', '7770180627962', 1, '2021-05-31 11:20:42'),
(29, 18, 'EQUITY', 'MALINDI', '0450', '0450194001611', 1, '2021-05-31 11:22:10'),
(30, 15, 'EQUITY', 'MALINDI', '0450', '0450168991334', 1, '2021-05-31 11:23:19'),
(31, 19, 'EQUITY', 'MALINDI', '0450', '0450180432401', 1, '2021-05-31 11:26:44'),
(32, 32, 'EQUITY', 'MALINDI', '0450', '0450179667339', 1, '2021-05-31 11:32:00'),
(33, 37, 'EQUITY', 'MALINDI', '0450', '0450199696563', 1, '2021-05-31 11:36:24'),
(34, 38, 'EQUITY', 'MALINDI', '0450', '0450178748857', 1, '2021-05-31 11:40:57'),
(35, 39, 'EQUITY', 'MALINDI', '0450', '0450192816842', 1, '2021-05-31 11:42:15'),
(36, 41, 'EQUITY', 'MALINDI', '0450', '0450179100757', 1, '2021-05-31 11:43:31'),
(37, 34, 'EQUITY', 'MALINDI', '0450', '0450180816363', 1, '2021-05-31 11:57:08'),
(38, 42, 'EQUITY', 'MALINDI', '0450', '0450180876058', 1, '2021-06-04 08:10:45'),
(39, 35, 'EQUITY', 'MALINDI', '0450', '0450180993735', 1, '2021-06-28 05:48:23'),
(40, 44, 'EQUITY', 'malindi', '0450', '0450181011797', 1, '2021-07-02 06:43:23'),
(41, 27, 'EQUITY', 'MALINDI', '0450', '0450180550774', 1, '2021-07-06 11:25:58'),
(42, 49, 'EQUITY', 'MALINDI', '0450', '7770179128743', 1, '2021-08-05 08:42:12'),
(43, 45, 'EQUITY', 'MALINDI', '0450', '7770181137704', 1, '2021-08-17 08:20:14'),
(44, 50, 'EQUITY', 'MALINDI', '0450', '0450181139826', 1, '2021-08-17 08:21:53'),
(45, 51, 'EQUITY', 'MALINDI', '0450', '0450172747031', 1, '2021-09-01 10:40:28'),
(46, 52, 'EQUITY', 'MALINDI', '0450', '0450181230867', 1, '2021-09-02 08:41:49'),
(47, 53, 'EQUITY', 'MALINDI', '0450', '0450190950143', 1, '2021-09-27 15:18:51'),
(48, 54, 'EQUITY', 'MALINDI', '0450', '7770175269298', 1, '2021-09-27 15:23:48'),
(49, 55, 'EQUITY', 'MALINDI', '0450', '0450162564559', 1, '2021-11-05 07:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `employee_deductibles`
--

CREATE TABLE `employee_deductibles` (
  `employee_deductible_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `deductible_id` int(11) NOT NULL,
  `deductible_amount` double NOT NULL,
  `is_one_time` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(50) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_deductibles`
--

INSERT INTO `employee_deductibles` (`employee_deductible_id`, `employee_id`, `deductible_id`, `deductible_amount`, `is_one_time`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(23, 3, 6, 2500, 0, 1, '', '2022-04-11 07:51:27', '2021-05-20 10:19:39'),
(25, 5, 6, 2500, 0, 1, '', '2022-04-11 07:51:27', '2021-05-20 10:21:07'),
(27, 11, 6, 2500, 0, 1, '', '2022-04-11 07:51:27', '2021-05-20 10:23:54'),
(28, 12, 6, 2500, 0, 1, '', '2022-04-11 07:51:27', '2021-05-20 10:24:37'),
(30, 32, 7, 8000, 0, 1, 'Fees for Emmanuel Butichi', '2022-04-11 07:51:27', '2021-05-31 11:33:07'),
(32, 3, 4, 8000, 1, 1, 'salary AdvanceJune', '2022-04-11 07:51:27', '2021-06-11 12:47:20'),
(33, 13, 4, 8000, 1, 1, 'Salary Advance June', '2022-04-11 07:51:27', '2021-06-11 12:49:39'),
(34, 20, 4, 7000, 1, 1, 'Salary advance', '2022-04-11 07:51:27', '2021-06-11 12:51:17'),
(35, 11, 4, 8000, 1, 1, 'Salary Advance June', '2022-04-11 07:51:27', '2021-06-11 12:54:03'),
(36, 6, 4, 8000, 1, 1, 'Salary Advance June', '2022-04-11 07:51:27', '2021-06-11 13:42:02'),
(39, 21, 4, 5000, 1, 1, 'Salary Advance June', '2022-04-11 07:51:27', '2021-06-11 13:48:11'),
(40, 12, 4, 8000, 0, 1, 'Salary Advance June', '2022-04-11 07:51:27', '2021-06-11 13:49:28'),
(42, 29, 4, 7000, 1, 1, 'salary advance June', '2022-04-11 07:51:27', '2021-06-11 13:55:09'),
(43, 16, 4, 5000, 1, 1, 'SALARY ADVANNCE JUNE', '2022-04-11 07:51:27', '2021-06-14 13:52:46'),
(44, 17, 4, 8000, 1, 1, 'SALARY ADVANCE', '2022-04-11 07:51:27', '2021-06-14 13:53:42'),
(45, 28, 4, 5000, 1, 1, 'SALARY ADVANCE', '2022-04-11 07:51:27', '2021-06-14 14:01:54'),
(46, 18, 4, 7000, 1, 1, 'SALARY ADVANCE', '2022-04-11 07:51:27', '2021-06-14 14:02:56'),
(47, 15, 4, 7000, 1, 1, 'SALARY ADVANCE', '2022-04-11 07:51:27', '2021-06-14 14:08:37'),
(48, 9, 4, 8000, 1, 1, 'salary advance', '2022-04-11 07:51:27', '2021-06-15 07:07:47'),
(49, 19, 4, 7000, 1, 1, 'SALARY ADVANCE', '2022-04-11 07:51:27', '2021-06-15 07:09:07'),
(50, 39, 4, 2000, 1, 1, 'SALARY ADVANCE', '2022-04-11 07:51:27', '2021-06-15 07:13:32'),
(52, 42, 4, 2500, 1, 1, 'SALARY ADVANCE', '2022-04-11 07:51:27', '2021-06-15 07:15:49'),
(53, 32, 4, 1000, 1, 1, 'SALARY ADVANCE', '2022-04-11 07:51:27', '2021-06-15 07:17:36'),
(66, 33, 4, 6000, 0, 1, 'salary Advance', '2022-04-11 07:51:27', '2021-08-03 14:19:20'),
(69, 41, 4, 4000, 0, 1, 'SALARY ADVANCE', '2022-04-11 07:51:27', '2021-08-05 07:08:36'),
(71, 43, 4, 3000, 1, 1, 'SALARY ADVANCE', '2022-04-11 07:51:27', '2021-08-16 12:34:39'),
(72, 23, 4, 8000, 0, 1, 'SALARY ADVANCE', '2022-04-11 07:51:27', '2021-08-16 12:44:25'),
(74, 34, 4, 2500, 1, 1, 'SALARY ADVACE AUGUST', '2022-04-11 07:51:27', '2021-08-17 06:45:31'),
(75, 45, 4, 7500, 1, 1, 'SALARY ADVANCE AUGUST', '2022-04-11 07:51:27', '2021-08-17 06:52:27'),
(77, 51, 4, 7000, 0, 1, 'Salary Advance', '2022-04-11 07:51:27', '2021-09-01 10:41:06'),
(78, 30, 4, 2500, 0, 1, '', '2022-04-11 07:51:27', '2021-09-01 13:09:12'),
(79, 52, 4, 6000, 1, 1, '', '2022-04-11 07:51:27', '2021-09-01 13:37:20'),
(80, 50, 4, 5000, 1, 1, 'Salary Advance August', '2022-04-11 07:51:27', '2021-09-14 08:59:46'),
(81, 27, 4, 4000, 0, 1, 'Salary Advance September 2021', '2022-04-11 07:51:27', '2021-09-14 09:02:09'),
(82, 35, 4, 4500, 0, 1, 'Salary Advance September 2021', '2022-04-11 07:51:27', '2021-09-14 09:07:27'),
(83, 49, 4, 6000, 0, 1, '', '2022-04-11 07:51:27', '2021-10-15 07:28:15'),
(84, 54, 4, 9000, 0, 1, '', '2022-04-11 07:51:27', '2021-10-15 07:29:51'),
(85, 53, 4, 15000, 0, 1, '', '2022-04-11 07:51:27', '2021-10-15 07:31:32'),
(86, 7, 4, 4000, 0, 1, '', '2022-04-11 07:51:27', '2021-10-15 08:15:04'),
(90, 22, 4, 7000, 1, 1, '', '2022-04-11 07:51:27', '2021-12-15 13:11:22'),
(91, 5, 4, 10000, 1, 1, '', '2022-04-11 07:51:27', '2022-01-17 07:48:55'),
(92, 29, 7, 5400, 0, 1, 'Fees for Bahati Charo Adm . 1222', '2022-04-11 07:51:27', '2022-01-31 07:45:48'),
(93, 34, 7, 4000, 0, 1, 'Fees for Shani Pendo Adm, 1135', '2022-04-11 07:51:27', '2022-01-31 07:46:39'),
(94, 27, 7, 5000, 0, 1, 'Fees for Lanisha Campbell Adm. 1158', '2022-04-11 07:51:27', '2022-01-31 07:48:17'),
(95, 43, 7, 5800, 0, 1, 'Fees for Carl-reiner Mrabu Tune Adm. 1199', '2022-04-11 07:51:27', '2022-01-31 07:49:48'),
(96, 15, 7, 6400, 0, 1, 'Fees for Carol Kerubo Adm. 1231', '2022-04-11 07:51:27', '2022-01-31 07:51:08'),
(97, 3, 7, 6900, 0, 1, 'Fees for Sharon Matinde Adm. 747 / Job Obinga Adm.', '2022-04-11 07:51:27', '2022-01-31 07:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `employee_month`
--

CREATE TABLE `employee_month` (
  `employee_month_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `fiscal_year_id` int(11) NOT NULL,
  `year_month_id` int(11) NOT NULL,
  `is_advance` tinyint(1) NOT NULL DEFAULT 0,
  `is_disbursed` tinyint(1) NOT NULL DEFAULT 0,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `is_emailed` tinyint(1) NOT NULL DEFAULT 0,
  `doc_no` varchar(30) DEFAULT NULL,
  `basic_salary` double NOT NULL,
  `gross_salary` double NOT NULL,
  `net_salary` double NOT NULL,
  `allowance` double DEFAULT NULL,
  `deductible` double DEFAULT NULL,
  `nssf` double DEFAULT NULL,
  `nhif` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `tax_relief` double NOT NULL DEFAULT 1408,
  `insurance_relief` double DEFAULT NULL,
  `advance_amount` decimal(18,2) NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `branch_name` varchar(50) DEFAULT NULL,
  `branch_code` int(11) DEFAULT NULL,
  `bank_account_no` varchar(50) DEFAULT NULL,
  `payroll_code` varchar(200) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_month`
--

INSERT INTO `employee_month` (`employee_month_id`, `employee_id`, `org_id`, `fiscal_year_id`, `year_month_id`, `is_advance`, `is_disbursed`, `is_paid`, `is_emailed`, `doc_no`, `basic_salary`, `gross_salary`, `net_salary`, `allowance`, `deductible`, `nssf`, `nhif`, `tax`, `tax_relief`, `insurance_relief`, `advance_amount`, `bank_id`, `bank_name`, `branch_name`, `branch_code`, `bank_account_no`, `payroll_code`, `date_modified`, `time_stamp`) VALUES
(4, 1, 1, 6, 5, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(5, 2, 1, 6, 5, 0, 1, 1, 0, NULL, 45000, 53000, 51600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(6, 3, 1, 6, 5, 0, 1, 1, 0, NULL, 28000, 33000, 29400, 5000, 3600, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(7, 4, 1, 6, 5, 0, 1, 1, 0, NULL, 25000, 25000, 20950, 0, 4050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(8, 5, 1, 6, 5, 0, 1, 1, 0, NULL, 25000, 30000, 27300, 5000, 2700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(9, 6, 1, 6, 5, 0, 1, 1, 0, NULL, 23000, 23000, 23000, 0, 0, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(10, 7, 1, 6, 5, 0, 1, 1, 0, NULL, 22000, 22000, 22000, 0, 0, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(11, 8, 1, 6, 5, 0, 1, 1, 0, NULL, 21000, 21000, 18500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 25, 'EQUITY', 'MALINDI', 450, '0450180501005', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(12, 9, 1, 6, 5, 0, 1, 1, 0, NULL, 18000, 18000, 18000, 0, 0, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(13, 10, 1, 6, 5, 0, 1, 1, 0, NULL, 18000, 23000, 22050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(14, 11, 1, 6, 5, 0, 1, 1, 0, NULL, 18000, 18000, 15500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(15, 12, 1, 6, 5, 0, 1, 1, 0, NULL, 18000, 25000, 21450, 7000, 3550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(16, 13, 1, 6, 5, 0, 1, 1, 0, NULL, 18000, 18000, 18000, 0, 0, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(18, 15, 1, 6, 5, 0, 1, 1, 0, NULL, 16000, 16000, 16000, 0, 0, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(19, 16, 1, 6, 5, 0, 1, 1, 0, NULL, 16000, 16000, 16000, 0, 0, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(20, 17, 1, 6, 5, 0, 1, 1, 0, NULL, 15000, 15000, 14400, 0, 600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(21, 18, 1, 6, 5, 0, 1, 1, 0, NULL, 15000, 15000, 14400, 0, 600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(22, 19, 1, 6, 5, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(23, 20, 1, 6, 5, 0, 1, 1, 0, NULL, 18000, 20000, 20000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(25, 22, 1, 6, 5, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(26, 23, 1, 6, 5, 0, 1, 1, 0, NULL, 14000, 14000, 14000, 0, 0, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(27, 24, 1, 6, 5, 0, 1, 1, 0, NULL, 14000, 16000, 16000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(28, 25, 1, 6, 5, 0, 1, 1, 0, NULL, 14000, 17500, 16700, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(29, 27, 1, 6, 5, 0, 1, 1, 0, NULL, 12000, 12000, 12000, 0, 0, 0, 0, 0, 0, 0, '0.00', NULL, NULL, NULL, NULL, NULL, '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(30, 28, 1, 6, 5, 0, 1, 1, 0, NULL, 12000, 12000, 11500, 0, 500, 0, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(31, 29, 1, 6, 5, 0, 1, 1, 0, NULL, 14000, 16000, 16000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(32, 30, 1, 6, 5, 0, 1, 1, 0, NULL, 10000, 12500, 7500, 2500, 5000, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(33, 32, 1, 6, 5, 0, 1, 1, 0, NULL, 10000, 12000, 6300, 2000, 5700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(34, 33, 1, 6, 5, 0, 1, 1, 0, NULL, 10000, 12500, 12500, 2500, 0, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(35, 34, 1, 6, 5, 0, 1, 1, 0, NULL, 9500, 9500, 9500, 0, 0, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(36, 35, 1, 6, 5, 0, 1, 1, 0, NULL, 9000, 9000, 9000, 0, 0, 0, 0, 0, 0, 0, '0.00', NULL, NULL, NULL, NULL, NULL, '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(37, 36, 1, 6, 5, 0, 1, 1, 0, NULL, 12000, 12000, 12000, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(38, 37, 1, 6, 5, 0, 1, 1, 0, NULL, 9000, 9000, 8600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(39, 38, 1, 6, 5, 0, 1, 1, 0, NULL, 8500, 10000, 10000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(40, 39, 1, 6, 5, 0, 1, 1, 0, NULL, 8000, 10000, 10000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(41, 41, 1, 6, 5, 0, 1, 1, 0, NULL, 8000, 10500, 10500, 2500, 0, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(42, 42, 1, 6, 5, 0, 1, 1, 0, NULL, 7000, 7000, 7000, 0, 0, 0, 0, 0, 0, 0, '0.00', NULL, NULL, NULL, NULL, NULL, '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(43, 43, 1, 6, 5, 0, 1, 1, 0, NULL, 13500, 13500, 12800, 0, 700, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(44, 44, 1, 6, 5, 0, 1, 1, 0, NULL, 18000, 18000, 18000, 0, 0, 0, 0, 0, 0, 0, '0.00', NULL, NULL, NULL, NULL, NULL, '202105311514240.8282', '2022-04-11 07:51:28', '2021-05-31 12:14:24'),
(45, 21, 1, 6, 5, 0, 1, 1, 0, NULL, 15000, 18000, 17200, 3000, 800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202105311528550.9281', '2022-04-11 07:51:28', '2021-05-31 12:28:55'),
(102, 30, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(103, 33, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '6000.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(104, 3, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(105, 13, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(106, 20, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(107, 11, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(108, 6, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(109, 8, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '6000.00', 25, 'EQUITY', 'MALINDI', 450, '0450180501005', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(110, 4, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '10000.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(111, 21, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(112, 12, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(113, 36, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3000.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(114, 29, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(115, 16, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(116, 17, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(117, 28, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(118, 18, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(119, 15, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(120, 9, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(121, 19, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(122, 39, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2000.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(123, 41, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2000.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(124, 42, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', 38, 'equity', 'malindi', 450, '0450180876058', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(125, 32, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1000.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(126, 35, 1, 6, 6, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', NULL, NULL, NULL, NULL, NULL, '202106151305470.3133', '2022-04-11 07:51:28', '2021-06-15 10:05:47'),
(127, 1, 1, 6, 6, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(128, 2, 1, 6, 6, 0, 1, 1, 0, NULL, 45000, 53000, 51600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(129, 3, 1, 6, 6, 0, 1, 1, 0, NULL, 28000, 33000, 21400, 5000, 11600, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(130, 4, 1, 6, 6, 0, 1, 1, 0, NULL, 25000, 25000, 10950, 0, 14050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(131, 5, 1, 6, 6, 0, 1, 1, 0, NULL, 25000, 30000, 27300, 5000, 2700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(132, 6, 1, 6, 6, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(133, 7, 1, 6, 6, 0, 1, 1, 0, NULL, 22000, 22000, 22000, 0, 0, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(134, 8, 1, 6, 6, 0, 1, 1, 0, NULL, 21000, 21000, 12500, 0, 8500, 0, 0, 0, 0, 0, '0.00', 25, 'EQUITY', 'MALINDI', 450, '0450180501005', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(135, 9, 1, 6, 6, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(136, 10, 1, 6, 6, 0, 1, 1, 0, NULL, 18000, 23000, 22050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(137, 11, 1, 6, 6, 0, 1, 1, 0, NULL, 18000, 18000, 7500, 0, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(138, 12, 1, 6, 6, 0, 1, 1, 0, NULL, 18000, 25000, 14450, 7000, 10550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(139, 13, 1, 6, 6, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(140, 14, 1, 6, 6, 0, 1, 1, 0, NULL, 16000, 18000, 18000, 2000, 0, 0, 0, 0, 0, 0, '0.00', NULL, NULL, NULL, NULL, NULL, '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(141, 15, 1, 6, 6, 0, 1, 1, 0, NULL, 16000, 16000, 9000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(142, 16, 1, 6, 6, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(143, 17, 1, 6, 6, 0, 1, 1, 0, NULL, 15000, 15000, 6400, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(144, 18, 1, 6, 6, 0, 1, 1, 0, NULL, 15000, 15000, 7400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(145, 19, 1, 6, 6, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(146, 20, 1, 6, 6, 0, 1, 1, 0, NULL, 18000, 20000, 13000, 2000, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(147, 21, 1, 6, 6, 0, 1, 1, 0, NULL, 15000, 18000, 12200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(148, 22, 1, 6, 6, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(149, 23, 1, 6, 6, 0, 1, 1, 0, NULL, 14000, 14000, 14000, 0, 0, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(150, 24, 1, 6, 6, 0, 1, 1, 0, NULL, 14000, 16000, 16000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(151, 25, 1, 6, 6, 0, 1, 1, 0, NULL, 14000, 17500, 16700, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(152, 27, 1, 6, 6, 0, 1, 1, 0, NULL, 12000, 12000, 12000, 0, 0, 0, 0, 0, 0, 0, '0.00', NULL, NULL, NULL, NULL, NULL, '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(153, 28, 1, 6, 6, 0, 1, 1, 0, NULL, 12000, 12000, 6500, 0, 5500, 0, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(154, 29, 1, 6, 6, 0, 1, 1, 0, NULL, 14000, 16000, 9000, 2000, 7000, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(155, 30, 1, 6, 6, 0, 1, 1, 0, NULL, 10000, 12500, 7500, 2500, 5000, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(156, 32, 1, 6, 6, 0, 1, 1, 0, NULL, 10000, 12000, 5300, 2000, 6700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(157, 33, 1, 6, 6, 0, 1, 1, 0, NULL, 10000, 12500, 6500, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(158, 34, 1, 6, 6, 0, 1, 1, 0, NULL, 9500, 9500, 9500, 0, 0, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(159, 35, 1, 6, 6, 0, 1, 1, 0, NULL, 9000, 9000, 6500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'malindi', 450, '0450180993735', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(160, 36, 1, 6, 6, 0, 1, 1, 0, NULL, 12000, 12000, 9000, 0, 3000, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(161, 37, 1, 6, 6, 0, 1, 1, 0, NULL, 9000, 9000, 8600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(162, 38, 1, 6, 6, 0, 1, 1, 0, NULL, 8500, 10000, 10000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(163, 39, 1, 6, 6, 0, 1, 1, 0, NULL, 8000, 10000, 8000, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(164, 41, 1, 6, 6, 0, 1, 1, 0, NULL, 8000, 10500, 8500, 2500, 2000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(165, 42, 1, 6, 6, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'equity', 'malindi', 450, '0450180876058', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(166, 43, 1, 6, 6, 0, 1, 1, 0, NULL, 13500, 13500, 12800, 0, 700, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(167, 44, 1, 6, 6, 0, 1, 1, 0, NULL, 18000, 18000, 18000, 0, 0, 0, 0, 0, 0, 0, '0.00', NULL, NULL, NULL, NULL, NULL, '202106291621420.2483', '2022-04-11 07:51:28', '2021-06-29 13:21:42'),
(291, 33, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '6000.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(292, 3, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(293, 13, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(294, 20, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(295, 11, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(296, 6, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(297, 4, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '10000.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(298, 21, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(299, 12, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(300, 36, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3000.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(301, 29, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(302, 16, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(303, 17, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(304, 28, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(305, 18, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(306, 15, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(307, 9, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(308, 19, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(309, 39, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2000.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(310, 41, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2000.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(311, 42, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', 38, 'equity', 'malindi', 450, '0450180876058', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(312, 32, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1000.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(313, 8, 1, 6, 7, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '14000.00', 25, 'EQUITY', 'MALINDI', 450, '0450180501005', '202107141446450.4802', '2022-04-11 07:51:28', '2021-07-14 11:46:45'),
(314, 33, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '6000.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(315, 3, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(316, 13, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(317, 20, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(318, 11, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(319, 6, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(320, 4, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '10000.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(321, 21, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(322, 12, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(323, 36, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3000.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(324, 29, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(325, 16, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(326, 17, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(327, 28, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(328, 18, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(329, 15, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(330, 9, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(331, 19, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(332, 39, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2000.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(334, 42, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', 38, 'equity', 'malindi', 450, '0450180876058', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(335, 32, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1000.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202108021232520.1363', '2022-04-11 07:51:28', '2021-08-02 09:32:52'),
(795, 1, 1, 6, 7, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(796, 2, 1, 6, 7, 0, 1, 1, 0, NULL, 45000, 53000, 51600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(797, 3, 1, 6, 7, 0, 1, 1, 0, NULL, 28000, 33000, 21400, 5000, 11600, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(798, 4, 1, 6, 7, 0, 1, 1, 0, NULL, 25000, 25000, 10950, 0, 14050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(799, 5, 1, 6, 7, 0, 1, 1, 0, NULL, 25000, 30000, 27300, 5000, 2700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(800, 6, 1, 6, 7, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(801, 7, 1, 6, 7, 0, 1, 1, 0, NULL, 22000, 22000, 22000, 0, 0, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(802, 9, 1, 6, 7, 0, 1, 1, 0, NULL, 18000, 18000, 9300, 0, 8700, 200, 500, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(803, 10, 1, 6, 7, 0, 1, 1, 0, NULL, 18000, 23000, 22050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(804, 11, 1, 6, 7, 0, 1, 1, 0, NULL, 18000, 18000, 7500, 0, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(805, 12, 1, 6, 7, 0, 1, 1, 0, NULL, 18000, 25000, 14450, 7000, 10550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(806, 13, 1, 6, 7, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(807, 15, 1, 6, 7, 0, 1, 1, 0, NULL, 16000, 16000, 9000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(808, 16, 1, 6, 7, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(809, 17, 1, 6, 7, 0, 1, 1, 0, NULL, 15000, 15000, 6400, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(810, 18, 1, 6, 7, 0, 1, 1, 0, NULL, 15000, 15000, 7400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(811, 19, 1, 6, 7, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(812, 20, 1, 6, 7, 0, 1, 1, 0, NULL, 18000, 20000, 13000, 2000, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(813, 21, 1, 6, 7, 0, 1, 1, 0, NULL, 15000, 18000, 12200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(814, 22, 1, 6, 7, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(815, 23, 1, 6, 7, 0, 1, 1, 0, NULL, 14000, 14000, 14000, 0, 0, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(816, 24, 1, 6, 7, 0, 1, 1, 0, NULL, 14000, 16000, 16000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(817, 25, 1, 6, 7, 0, 1, 1, 0, NULL, 14000, 17500, 16700, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(818, 27, 1, 6, 7, 0, 1, 1, 0, NULL, 12000, 12000, 12000, 0, 0, 0, 0, 0, 0, 0, '0.00', NULL, NULL, NULL, NULL, NULL, '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(819, 28, 1, 6, 7, 0, 1, 1, 0, NULL, 12000, 12000, 6300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(820, 29, 1, 6, 7, 0, 1, 1, 0, NULL, 14000, 16000, 9000, 2000, 7000, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(821, 30, 1, 6, 7, 0, 1, 1, 0, NULL, 10000, 12500, 7500, 2500, 5000, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(822, 32, 1, 6, 7, 0, 1, 1, 0, NULL, 10000, 12000, 5300, 2000, 6700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(823, 33, 1, 6, 7, 0, 1, 1, 0, NULL, 10000, 12500, 4500, 2500, 8000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(824, 34, 1, 6, 7, 0, 1, 1, 0, NULL, 9500, 9500, 9500, 0, 0, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(825, 35, 1, 6, 7, 0, 1, 1, 0, NULL, 9000, 9000, 8000, 0, 1000, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'malindi', 450, '0450180993735', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(826, 36, 1, 6, 7, 0, 1, 1, 0, NULL, 12000, 12000, 9000, 0, 3000, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(827, 37, 1, 6, 7, 0, 1, 1, 0, NULL, 9000, 9000, 8600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(828, 38, 1, 6, 7, 0, 1, 1, 0, NULL, 8500, 10000, 10000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(829, 39, 1, 6, 7, 0, 1, 1, 0, NULL, 8000, 10000, 8000, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(830, 41, 1, 6, 7, 0, 1, 1, 0, NULL, 8000, 10500, 7900, 2500, 2600, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(831, 42, 1, 6, 7, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'equity', 'malindi', 450, '0450180876058', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(832, 43, 1, 6, 7, 0, 1, 1, 0, NULL, 13500, 13500, 12800, 0, 700, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(833, 44, 1, 6, 7, 0, 1, 1, 0, NULL, 18000, 18000, 17300, 0, 700, 200, 500, 0, 0, 0, '0.00', 40, 'EQUITY', 'malindi', 450, '0450181011797', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(834, 45, 1, 6, 7, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', NULL, NULL, NULL, NULL, NULL, '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(835, 49, 1, 6, 7, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(836, 50, 1, 6, 7, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', NULL, NULL, NULL, NULL, NULL, '202108051348510.5592', '2022-04-11 07:51:28', '2021-08-05 10:48:51'),
(943, 7, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4000.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202108171006100.8804', '2022-04-11 07:51:28', '2021-08-17 07:06:10'),
(944, 45, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7500.00', NULL, NULL, NULL, NULL, NULL, '202108171006370.8564', '2022-04-11 07:51:28', '2021-08-17 07:06:37'),
(945, 43, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3000.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202108171006470.2343', '2022-04-11 07:51:28', '2021-08-17 07:06:47'),
(946, 34, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202108171006540.4424', '2022-04-11 07:51:28', '2021-08-17 07:06:54'),
(947, 23, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202108171007020.6817', '2022-04-11 07:51:28', '2021-08-17 07:07:02'),
(949, 41, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4000.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202108171113280.6932', '2022-04-11 07:51:28', '2021-08-17 08:13:28'),
(1077, 51, 1, 6, 8, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202109011353540.3757', '2022-04-11 07:51:28', '2021-09-01 10:53:54'),
(1176, 1, 1, 6, 8, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1177, 2, 1, 6, 8, 0, 1, 1, 0, NULL, 45000, 53000, 51600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1178, 3, 1, 6, 8, 0, 1, 1, 0, NULL, 28000, 35000, 23400, 7000, 11600, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1179, 4, 1, 6, 8, 0, 1, 1, 0, NULL, 25000, 26500, 15450, 1500, 11050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1180, 5, 1, 6, 8, 0, 1, 1, 0, NULL, 25000, 32000, 29300, 7000, 2700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1181, 6, 1, 6, 8, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1182, 7, 1, 6, 8, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1183, 9, 1, 6, 8, 0, 1, 1, 0, NULL, 18000, 18000, 9300, 0, 8700, 200, 500, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1184, 10, 1, 6, 8, 0, 1, 1, 0, NULL, 18000, 24500, 23550, 6500, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1185, 11, 1, 6, 8, 0, 1, 1, 0, NULL, 18000, 18000, 7500, 0, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1186, 12, 1, 6, 8, 0, 1, 1, 0, NULL, 18000, 26500, 15950, 8500, 10550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1187, 13, 1, 6, 8, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1188, 15, 1, 6, 8, 0, 1, 1, 0, NULL, 16000, 16000, 9000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1189, 16, 1, 6, 8, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1190, 17, 1, 6, 8, 0, 1, 1, 0, NULL, 15000, 16500, 7900, 1500, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1191, 18, 1, 6, 8, 0, 1, 1, 0, NULL, 15000, 15000, 7400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1192, 19, 1, 6, 8, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1193, 20, 1, 6, 8, 0, 1, 1, 0, NULL, 18000, 21500, 14500, 3500, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1194, 21, 1, 6, 8, 0, 1, 1, 0, NULL, 15000, 18000, 12200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1195, 22, 1, 6, 8, 0, 1, 1, 0, NULL, 15000, 16500, 16500, 1500, 0, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1196, 23, 1, 6, 8, 0, 1, 1, 0, NULL, 14000, 14000, 7000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1197, 24, 1, 6, 8, 0, 1, 1, 0, NULL, 14000, 16000, 16000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1198, 25, 1, 6, 8, 0, 1, 1, 0, NULL, 14000, 19000, 18200, 5000, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1199, 27, 1, 6, 8, 0, 1, 1, 0, NULL, 12000, 12000, 12000, 0, 0, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1200, 28, 1, 6, 8, 0, 1, 1, 0, NULL, 12000, 12000, 6300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1201, 29, 1, 6, 8, 0, 1, 1, 0, NULL, 14000, 17500, 10500, 3500, 7000, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1202, 30, 1, 6, 8, 0, 1, 1, 0, NULL, 10000, 12500, 10000, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1203, 32, 1, 6, 8, 0, 1, 1, 0, NULL, 10000, 13500, 6800, 3500, 6700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1204, 33, 1, 6, 8, 0, 1, 1, 0, NULL, 10000, 12500, 6500, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1205, 34, 1, 6, 8, 0, 1, 1, 0, NULL, 9500, 9500, 7000, 0, 2500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1206, 35, 1, 6, 8, 0, 1, 1, 0, NULL, 9000, 9000, 7500, 0, 1500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1207, 36, 1, 6, 8, 0, 1, 1, 0, NULL, 12000, 14000, 11000, 2000, 3000, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1208, 37, 1, 6, 8, 0, 1, 1, 0, NULL, 9000, 9000, 8600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1209, 38, 1, 6, 8, 0, 1, 1, 0, NULL, 8500, 10000, 10000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1210, 39, 1, 6, 8, 0, 1, 1, 0, NULL, 8000, 10000, 8000, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1211, 41, 1, 6, 8, 0, 1, 1, 0, NULL, 8000, 10500, 6500, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1212, 42, 1, 6, 8, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1213, 43, 1, 6, 8, 0, 1, 1, 0, NULL, 13500, 13500, 9800, 0, 3700, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1214, 45, 1, 6, 8, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1215, 49, 1, 6, 8, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1216, 50, 1, 6, 8, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1217, 51, 1, 6, 8, 0, 1, 1, 0, NULL, 17000, 17000, 12000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1218, 52, 1, 6, 8, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202109021554510.4288', '2022-04-11 07:51:28', '2021-09-02 12:54:51'),
(1219, 3, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1220, 13, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1221, 20, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11');
INSERT INTO `employee_month` (`employee_month_id`, `employee_id`, `org_id`, `fiscal_year_id`, `year_month_id`, `is_advance`, `is_disbursed`, `is_paid`, `is_emailed`, `doc_no`, `basic_salary`, `gross_salary`, `net_salary`, `allowance`, `deductible`, `nssf`, `nhif`, `tax`, `tax_relief`, `insurance_relief`, `advance_amount`, `bank_id`, `bank_name`, `branch_name`, `branch_code`, `bank_account_no`, `payroll_code`, `date_modified`, `time_stamp`) VALUES
(1222, 11, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1223, 6, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1224, 4, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '10000.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1225, 21, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1226, 12, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1227, 36, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3000.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1228, 29, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1229, 16, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1230, 17, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1231, 28, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1232, 18, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1233, 15, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1234, 9, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1235, 19, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1236, 39, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2000.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1237, 42, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1238, 32, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1000.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1243, 43, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3000.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1244, 23, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1245, 34, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1246, 45, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7500.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1248, 51, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1249, 30, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1250, 52, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '6000.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202109141140110.4333', '2022-04-11 07:51:28', '2021-09-14 08:40:11'),
(1251, 27, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4000.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202109141203120.963', '2022-04-11 07:51:28', '2021-09-14 09:03:12'),
(1252, 50, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202109141203260.1028', '2022-04-11 07:51:28', '2021-09-14 09:03:26'),
(1330, 35, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4500.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202109271747360.4959', '2022-04-11 07:51:28', '2021-09-27 14:47:36'),
(1331, 41, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2000.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202109271752230.5598', '2022-04-11 07:51:28', '2021-09-27 14:52:23'),
(1332, 33, 1, 6, 9, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '6000.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202109271752350.3482', '2022-04-11 07:51:28', '2021-09-27 14:52:35'),
(1333, 1, 1, 6, 9, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1334, 2, 1, 6, 9, 0, 1, 1, 0, NULL, 45000, 53000, 51600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1335, 3, 1, 6, 9, 0, 1, 1, 0, NULL, 28000, 35000, 23400, 7000, 11600, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1336, 4, 1, 6, 9, 0, 1, 1, 0, NULL, 25000, 26500, 15450, 1500, 11050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1337, 5, 1, 6, 9, 0, 1, 1, 0, NULL, 25000, 32000, 29300, 7000, 2700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1338, 6, 1, 6, 9, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1340, 9, 1, 6, 9, 0, 1, 1, 0, NULL, 18000, 18000, 9300, 0, 8700, 200, 500, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1341, 10, 1, 6, 9, 0, 1, 1, 0, NULL, 18000, 24500, 23550, 6500, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1342, 11, 1, 6, 9, 0, 1, 1, 0, NULL, 18000, 18000, 7500, 0, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1343, 12, 1, 6, 9, 0, 1, 1, 0, NULL, 18000, 26500, 15950, 8500, 10550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1344, 13, 1, 6, 9, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1345, 15, 1, 6, 9, 0, 1, 1, 0, NULL, 16000, 16000, 9000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1346, 16, 1, 6, 9, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1347, 17, 1, 6, 9, 0, 1, 1, 0, NULL, 15000, 16500, 7900, 1500, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1348, 18, 1, 6, 9, 0, 1, 1, 0, NULL, 15000, 15000, 7400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1349, 19, 1, 6, 9, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1350, 20, 1, 6, 9, 0, 1, 1, 0, NULL, 18000, 21500, 14500, 3500, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1351, 21, 1, 6, 9, 0, 1, 1, 0, NULL, 15000, 18000, 12200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1352, 22, 1, 6, 9, 0, 1, 1, 0, NULL, 15000, 16500, 16500, 1500, 0, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1353, 23, 1, 6, 9, 0, 1, 1, 0, NULL, 14000, 14000, 7000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1354, 24, 1, 6, 9, 0, 1, 1, 0, NULL, 14000, 16000, 16000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1355, 25, 1, 6, 9, 0, 1, 1, 0, NULL, 14000, 19000, 18200, 5000, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1356, 27, 1, 6, 9, 0, 1, 1, 0, NULL, 12000, 12000, 8000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1357, 28, 1, 6, 9, 0, 1, 1, 0, NULL, 12000, 12000, 6300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1358, 29, 1, 6, 9, 0, 1, 1, 0, NULL, 14000, 17500, 10500, 3500, 7000, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1359, 30, 1, 6, 9, 0, 1, 1, 0, NULL, 10000, 12500, 10000, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1360, 32, 1, 6, 9, 0, 1, 1, 0, NULL, 10000, 13500, 6800, 3500, 6700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1361, 33, 1, 6, 9, 0, 1, 1, 0, NULL, 10000, 12500, 6500, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1363, 35, 1, 6, 9, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1364, 36, 1, 6, 9, 0, 1, 1, 0, NULL, 12000, 14000, 11000, 2000, 3000, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1365, 37, 1, 6, 9, 0, 1, 1, 0, NULL, 9000, 9000, 8600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1366, 38, 1, 6, 9, 0, 1, 1, 0, NULL, 8500, 10000, 10000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1367, 39, 1, 6, 9, 0, 1, 1, 0, NULL, 8000, 10000, 8000, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1368, 41, 1, 6, 9, 0, 1, 1, 0, NULL, 8000, 10500, 8500, 2500, 2000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1369, 42, 1, 6, 9, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1370, 43, 1, 6, 9, 0, 1, 1, 0, NULL, 13500, 13500, 9800, 0, 3700, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1371, 45, 1, 6, 9, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1372, 49, 1, 6, 9, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1373, 50, 1, 6, 9, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1374, 51, 1, 6, 9, 0, 1, 1, 0, NULL, 17000, 17000, 12000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1375, 52, 1, 6, 9, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202109271759590.9464', '2022-04-11 07:51:28', '2021-09-27 14:59:59'),
(1376, 7, 1, 6, 9, 0, 1, 1, 0, NULL, 22000, 22000, 22000, 0, 0, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202109271801410.7956', '2022-04-11 07:51:28', '2021-09-27 15:01:41'),
(1377, 34, 1, 6, 9, 0, 1, 1, 0, NULL, 9500, 9500, 7000, 0, 2500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202109271806320.2168', '2022-04-11 07:51:28', '2021-09-27 15:06:32'),
(1378, 53, 1, 6, 9, 0, 1, 1, 0, NULL, 25000, 25000, 25000, 0, 0, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202109271824150.0029', '2022-04-11 07:51:28', '2021-09-27 15:24:15'),
(1379, 54, 1, 6, 9, 0, 1, 1, 0, NULL, 18000, 18000, 18000, 0, 0, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202109271824150.0029', '2022-04-11 07:51:28', '2021-09-27 15:24:15'),
(1380, 3, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1381, 13, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1382, 20, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1383, 11, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1384, 6, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1385, 4, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '10000.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1386, 21, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1387, 12, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1388, 36, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3000.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1389, 29, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1390, 16, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1391, 17, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1392, 28, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1393, 18, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1394, 15, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1395, 9, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1396, 19, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1397, 39, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2000.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1398, 42, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1399, 32, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1000.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1403, 43, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3000.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1404, 23, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1405, 34, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1406, 45, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7500.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1407, 51, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1409, 52, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '6000.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1410, 50, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1411, 27, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4000.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1412, 35, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4500.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1413, 49, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '6000.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1414, 54, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1415, 53, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '10000.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202110151050590.0585', '2022-04-11 07:51:28', '2021-10-15 07:50:59'),
(1416, 7, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4000.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202110151115310.4859', '2022-04-11 07:51:28', '2021-10-15 08:15:31'),
(1417, 41, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4000.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202110151115420.0086', '2022-04-11 07:51:28', '2021-10-15 08:15:42'),
(1421, 33, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202111011116090.6874', '2022-04-11 07:51:28', '2021-11-01 08:16:09'),
(1422, 30, 1, 6, 10, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4500.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202111011116230.4401', '2022-04-11 07:51:28', '2021-11-01 08:16:23'),
(1468, 1, 1, 6, 10, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1469, 2, 1, 6, 10, 0, 1, 1, 0, NULL, 45000, 53000, 51600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1470, 3, 1, 6, 10, 0, 1, 1, 0, NULL, 28000, 33000, 21400, 5000, 11600, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1471, 4, 1, 6, 10, 0, 1, 1, 0, NULL, 25000, 25000, 13950, 0, 11050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1472, 5, 1, 6, 10, 0, 1, 1, 0, NULL, 25000, 30000, 27300, 5000, 2700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1473, 6, 1, 6, 10, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1474, 7, 1, 6, 10, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1475, 9, 1, 6, 10, 0, 1, 1, 0, NULL, 18000, 18000, 9300, 0, 8700, 200, 500, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1476, 10, 1, 6, 10, 0, 1, 1, 0, NULL, 18000, 23000, 22050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1477, 11, 1, 6, 10, 0, 1, 1, 0, NULL, 18000, 18000, 7500, 0, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1478, 12, 1, 6, 10, 0, 1, 1, 0, NULL, 18000, 25000, 14450, 7000, 10550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1479, 13, 1, 6, 10, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1480, 15, 1, 6, 10, 0, 1, 1, 0, NULL, 16000, 16000, 9000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1481, 16, 1, 6, 10, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1482, 17, 1, 6, 10, 0, 1, 1, 0, NULL, 15000, 15000, 6400, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1483, 18, 1, 6, 10, 0, 1, 1, 0, NULL, 15000, 15000, 7400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1484, 19, 1, 6, 10, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1485, 20, 1, 6, 10, 0, 1, 1, 0, NULL, 18000, 20000, 13000, 2000, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1486, 21, 1, 6, 10, 0, 1, 1, 0, NULL, 15000, 18000, 12200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1487, 22, 1, 6, 10, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1488, 23, 1, 6, 10, 0, 1, 1, 0, NULL, 14000, 14000, 7000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1489, 24, 1, 6, 10, 0, 1, 1, 0, NULL, 14000, 16000, 16000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1490, 25, 1, 6, 10, 0, 1, 1, 0, NULL, 14000, 17500, 16700, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1491, 27, 1, 6, 10, 0, 1, 1, 0, NULL, 12000, 12000, 8000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1492, 28, 1, 6, 10, 0, 1, 1, 0, NULL, 12000, 12000, 6300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1493, 29, 1, 6, 10, 0, 1, 1, 0, NULL, 14000, 16000, 9000, 2000, 7000, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1494, 30, 1, 6, 10, 0, 1, 1, 0, NULL, 10000, 12500, 8000, 2500, 4500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1495, 32, 1, 6, 10, 0, 1, 1, 0, NULL, 10000, 12000, 5300, 2000, 6700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1496, 33, 1, 6, 10, 0, 1, 1, 0, NULL, 10000, 12500, 4500, 2500, 8000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1497, 34, 1, 6, 10, 0, 1, 1, 0, NULL, 9500, 9500, 7000, 0, 2500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1498, 35, 1, 6, 10, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1499, 36, 1, 6, 10, 0, 1, 1, 0, NULL, 12000, 12000, 9000, 0, 3000, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1500, 37, 1, 6, 10, 0, 1, 1, 0, NULL, 9000, 9000, 8600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1501, 38, 1, 6, 10, 0, 1, 1, 0, NULL, 8500, 10000, 10000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1502, 39, 1, 6, 10, 0, 1, 1, 0, NULL, 8000, 10000, 8000, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1503, 41, 1, 6, 10, 0, 1, 1, 0, NULL, 8000, 10500, 6500, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1504, 42, 1, 6, 10, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1505, 43, 1, 6, 10, 0, 1, 1, 0, NULL, 13500, 13500, 9800, 0, 3700, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1506, 45, 1, 6, 10, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1507, 49, 1, 6, 10, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1508, 50, 1, 6, 10, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1509, 51, 1, 6, 10, 0, 1, 1, 0, NULL, 17000, 17000, 12000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1510, 52, 1, 6, 10, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1511, 53, 1, 6, 10, 0, 1, 1, 0, NULL, 25000, 25000, 15000, 0, 10000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1512, 54, 1, 6, 10, 0, 1, 1, 0, NULL, 18000, 18000, 13000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202111011239010.3932', '2022-04-11 07:51:28', '2021-11-01 09:39:01'),
(1514, 55, 1, 6, 10, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450178737930', '202111051047120.6207', '2022-04-11 07:51:28', '2021-11-05 07:47:12'),
(1561, 3, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1562, 13, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1563, 20, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1564, 11, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1565, 6, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1566, 4, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '10000.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1567, 21, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1568, 12, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1569, 36, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3000.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1570, 29, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1571, 16, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1572, 17, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1573, 28, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1574, 18, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1575, 15, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1576, 9, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1577, 19, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1578, 39, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2000.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1579, 42, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1580, 32, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1000.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1582, 33, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '6000.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1583, 41, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4000.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1584, 43, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3000.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1585, 23, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1586, 34, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1587, 45, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7500.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1588, 51, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1589, 30, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1590, 52, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '6000.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1591, 50, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1592, 27, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4000.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1593, 35, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4500.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1594, 49, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '6000.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1595, 54, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '9000.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1596, 53, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '15000.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1597, 7, 1, 6, 11, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4000.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202111151114090.2973', '2022-04-11 07:51:28', '2021-11-15 08:14:09'),
(1598, 1, 1, 6, 11, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1599, 2, 1, 6, 11, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1600, 3, 1, 6, 11, 0, 1, 1, 0, NULL, 31300, 36300, 24700, 5000, 11600, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1601, 4, 1, 6, 11, 0, 1, 1, 0, NULL, 25000, 25000, 13950, 0, 11050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1602, 5, 1, 6, 11, 0, 1, 1, 0, NULL, 28000, 33000, 30300, 5000, 2700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1603, 6, 1, 6, 11, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1604, 7, 1, 6, 11, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1605, 9, 1, 6, 11, 0, 1, 1, 0, NULL, 18000, 18000, 9300, 0, 8700, 200, 500, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1606, 10, 1, 6, 11, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1607, 11, 1, 6, 11, 0, 1, 1, 0, NULL, 18000, 18000, 7500, 0, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1608, 12, 1, 6, 11, 0, 1, 1, 0, NULL, 20500, 27500, 16950, 7000, 10550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1609, 13, 1, 6, 11, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1610, 15, 1, 6, 11, 0, 1, 1, 0, NULL, 16000, 16000, 9000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1611, 16, 1, 6, 11, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1612, 17, 1, 6, 11, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1613, 18, 1, 6, 11, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1614, 19, 1, 6, 11, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1615, 20, 1, 6, 11, 0, 1, 1, 0, NULL, 18000, 20000, 13000, 2000, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1616, 21, 1, 6, 11, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1617, 22, 1, 6, 11, 0, 1, 1, 0, NULL, 18000, 18000, 18000, 0, 0, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1618, 23, 1, 6, 11, 0, 1, 1, 0, NULL, 16000, 16000, 9000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1619, 24, 1, 6, 11, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1620, 25, 1, 6, 11, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1621, 27, 1, 6, 11, 0, 1, 1, 0, NULL, 13000, 13000, 9000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1622, 28, 1, 6, 11, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1623, 29, 1, 6, 11, 0, 1, 1, 0, NULL, 14000, 16000, 9000, 2000, 7000, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1624, 30, 1, 6, 11, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1625, 32, 1, 6, 11, 0, 1, 1, 0, NULL, 13000, 15000, 8300, 2000, 6700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1626, 33, 1, 6, 11, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1627, 34, 1, 6, 11, 0, 1, 1, 0, NULL, 10500, 10500, 8000, 0, 2500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1628, 35, 1, 6, 11, 0, 1, 1, 0, NULL, 9000, 9000, 3500, 0, 5500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1629, 36, 1, 6, 11, 0, 1, 1, 0, NULL, 13500, 13500, 10500, 0, 3000, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1630, 37, 1, 6, 11, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1631, 38, 1, 6, 11, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1632, 39, 1, 6, 11, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1633, 41, 1, 6, 11, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1634, 42, 1, 6, 11, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1635, 43, 1, 6, 11, 0, 1, 1, 0, NULL, 13500, 13500, 9800, 0, 3700, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1636, 45, 1, 6, 11, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1637, 49, 1, 6, 11, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1638, 50, 1, 6, 11, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1639, 51, 1, 6, 11, 0, 1, 1, 0, NULL, 17000, 17000, 12000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1640, 52, 1, 6, 11, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1641, 53, 1, 6, 11, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1642, 54, 1, 6, 11, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1643, 55, 1, 6, 11, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450178737930', '202112031153070.44', '2022-04-11 07:51:28', '2021-12-03 08:53:07'),
(1644, 3, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1645, 13, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1646, 20, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1647, 11, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1648, 6, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1649, 4, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '10000.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03');
INSERT INTO `employee_month` (`employee_month_id`, `employee_id`, `org_id`, `fiscal_year_id`, `year_month_id`, `is_advance`, `is_disbursed`, `is_paid`, `is_emailed`, `doc_no`, `basic_salary`, `gross_salary`, `net_salary`, `allowance`, `deductible`, `nssf`, `nhif`, `tax`, `tax_relief`, `insurance_relief`, `advance_amount`, `bank_id`, `bank_name`, `branch_name`, `branch_code`, `bank_account_no`, `payroll_code`, `date_modified`, `time_stamp`) VALUES
(1650, 21, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1651, 12, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1652, 36, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '6500.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1653, 29, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1654, 16, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1655, 17, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1656, 28, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1657, 18, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1658, 15, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1659, 9, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1660, 19, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1661, 39, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2000.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1662, 42, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1663, 32, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1000.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1664, 33, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '6000.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1665, 41, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4000.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1666, 43, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3000.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1667, 23, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1668, 34, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1669, 45, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7500.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1670, 51, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1671, 30, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1672, 52, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '6000.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1673, 50, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1674, 27, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1675, 35, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5500.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1676, 49, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '6000.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1677, 54, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '9000.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1678, 53, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '15000.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1679, 7, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4000.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1680, 10, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '10000.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1681, 5, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1682, 37, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4000.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1683, 22, 1, 6, 12, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202112151615030.0664', '2022-04-11 07:51:28', '2021-12-15 13:15:03'),
(1684, 1, 1, 6, 12, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1685, 2, 1, 6, 12, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1686, 3, 1, 6, 12, 0, 1, 1, 0, NULL, 31300, 36300, 24700, 5000, 11600, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1687, 4, 1, 6, 12, 0, 1, 1, 0, NULL, 25000, 25000, 13950, 0, 11050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1688, 5, 1, 6, 12, 0, 1, 1, 0, NULL, 28000, 33000, 25300, 5000, 7700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1689, 6, 1, 6, 12, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1690, 7, 1, 6, 12, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1691, 9, 1, 6, 12, 0, 1, 1, 0, NULL, 18000, 18000, 9300, 0, 8700, 200, 500, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1692, 10, 1, 6, 12, 0, 1, 1, 0, NULL, 23000, 28000, 17050, 5000, 10950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1693, 11, 1, 6, 12, 0, 1, 1, 0, NULL, 18000, 18000, 7500, 0, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1694, 12, 1, 6, 12, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1695, 13, 1, 6, 12, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1696, 15, 1, 6, 12, 0, 1, 1, 0, NULL, 16000, 16000, 9000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1697, 16, 1, 6, 12, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1698, 17, 1, 6, 12, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1699, 18, 1, 6, 12, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1700, 19, 1, 6, 12, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1701, 20, 1, 6, 12, 0, 1, 1, 0, NULL, 18000, 20000, 13000, 2000, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1702, 21, 1, 6, 12, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1703, 22, 1, 6, 12, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1704, 23, 1, 6, 12, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1705, 24, 1, 6, 12, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1706, 25, 1, 6, 12, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1707, 27, 1, 6, 12, 0, 1, 1, 0, NULL, 13000, 13000, 6000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1708, 28, 1, 6, 12, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1709, 29, 1, 6, 12, 0, 1, 1, 0, NULL, 14000, 16000, 9000, 2000, 7000, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1710, 30, 1, 6, 12, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1711, 32, 1, 6, 12, 0, 1, 1, 0, NULL, 13000, 15000, 8300, 2000, 6700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1712, 33, 1, 6, 12, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1713, 34, 1, 6, 12, 0, 1, 1, 0, NULL, 10500, 10500, 8000, 0, 2500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1714, 35, 1, 6, 12, 0, 1, 1, 0, NULL, 9000, 9000, 3500, 0, 5500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1715, 36, 1, 6, 12, 0, 1, 1, 0, NULL, 13500, 13500, 7000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1716, 37, 1, 6, 12, 0, 1, 1, 0, NULL, 11000, 11000, 6600, 0, 4400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1717, 38, 1, 6, 12, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1718, 39, 1, 6, 12, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1719, 41, 1, 6, 12, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1720, 42, 1, 6, 12, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1721, 43, 1, 6, 12, 0, 1, 1, 0, NULL, 13500, 13500, 9800, 0, 3700, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1722, 45, 1, 6, 12, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1723, 49, 1, 6, 12, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1724, 50, 1, 6, 12, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1725, 51, 1, 6, 12, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1726, 52, 1, 6, 12, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1727, 53, 1, 6, 12, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1728, 54, 1, 6, 12, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1729, 55, 1, 6, 12, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450178737930', '202201041255490.9543', '2022-04-11 07:51:28', '2022-01-04 09:55:49'),
(1886, 3, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1887, 13, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1888, 20, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1889, 11, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1890, 6, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1891, 21, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1892, 12, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1894, 29, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1895, 16, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1896, 17, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1897, 28, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1898, 18, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1899, 15, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1900, 9, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1901, 19, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1902, 39, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2000.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1903, 42, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1904, 32, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1000.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1905, 33, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '6000.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1906, 41, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4000.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1907, 43, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3000.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1908, 23, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8000.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1909, 34, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1910, 45, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7500.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1911, 51, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '7000.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1912, 30, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2500.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1913, 52, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '6000.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1914, 50, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5000.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1917, 49, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '6000.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1918, 54, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '9000.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1919, 53, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '15000.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1920, 7, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4000.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202201171115270.2993', '2022-04-11 07:51:28', '2022-01-17 08:15:27'),
(1921, 27, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4000.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202201171131300.3395', '2022-04-11 07:51:28', '2022-01-17 08:31:30'),
(1922, 35, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4500.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202201171131550.0426', '2022-04-11 07:51:28', '2022-01-17 08:31:55'),
(1923, 36, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3000.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202201171132240.8276', '2022-04-11 07:51:28', '2022-01-17 08:32:24'),
(1925, 5, 1, 7, 1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '10000.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202201171147150.3158', '2022-04-11 07:51:28', '2022-01-17 08:47:15'),
(1927, 1, 1, 7, 1, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1928, 2, 1, 7, 1, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1929, 3, 1, 7, 1, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1930, 4, 1, 7, 1, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1931, 5, 1, 7, 1, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1932, 6, 1, 7, 1, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1933, 7, 1, 7, 1, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1934, 9, 1, 7, 1, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1935, 10, 1, 7, 1, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1937, 12, 1, 7, 1, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1938, 13, 1, 7, 1, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1939, 15, 1, 7, 1, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1940, 16, 1, 7, 1, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1941, 17, 1, 7, 1, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1942, 18, 1, 7, 1, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1943, 19, 1, 7, 1, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1945, 21, 1, 7, 1, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1946, 22, 1, 7, 1, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1947, 23, 1, 7, 1, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1948, 24, 1, 7, 1, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1949, 25, 1, 7, 1, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1950, 27, 1, 7, 1, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1951, 28, 1, 7, 1, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1952, 29, 1, 7, 1, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1953, 30, 1, 7, 1, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1954, 32, 1, 7, 1, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1955, 33, 1, 7, 1, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1956, 34, 1, 7, 1, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1957, 35, 1, 7, 1, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1960, 38, 1, 7, 1, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1961, 39, 1, 7, 1, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1962, 41, 1, 7, 1, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1963, 42, 1, 7, 1, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1964, 43, 1, 7, 1, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1965, 45, 1, 7, 1, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1966, 49, 1, 7, 1, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1967, 50, 1, 7, 1, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1968, 51, 1, 7, 1, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1969, 52, 1, 7, 1, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1970, 53, 1, 7, 1, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1971, 54, 1, 7, 1, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1972, 55, 1, 7, 1, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450178737930', '202201311107080.6534', '2022-04-11 07:51:28', '2022-01-31 08:07:08'),
(1973, 11, 1, 7, 1, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202201311229360.6842', '2022-04-11 07:51:28', '2022-01-31 09:29:36'),
(1974, 20, 1, 7, 1, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202201311229360.6842', '2022-04-11 07:51:28', '2022-01-31 09:29:36'),
(1975, 36, 1, 7, 1, 0, 1, 1, 0, NULL, 13500, 13500, 5500, 0, 8000, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202201311229360.6842', '2022-04-11 07:51:28', '2022-01-31 09:29:36'),
(1976, 37, 1, 7, 1, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202201311229360.6842', '2022-04-11 07:51:28', '2022-01-31 09:29:36'),
(1977, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1978, 2, 1, 6, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1979, 3, 1, 6, 4, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1980, 4, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1981, 5, 1, 6, 4, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1982, 6, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1983, 7, 1, 6, 4, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1984, 9, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1985, 10, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1986, 11, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1987, 12, 1, 6, 4, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1988, 13, 1, 6, 4, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1989, 15, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1990, 16, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1991, 17, 1, 6, 4, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1992, 18, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1993, 19, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1994, 20, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1995, 21, 1, 6, 4, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1996, 22, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1997, 23, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1998, 24, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(1999, 25, 1, 6, 4, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2000, 27, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2001, 28, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2002, 29, 1, 6, 4, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2003, 30, 1, 6, 4, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2004, 32, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2005, 33, 1, 6, 4, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2006, 34, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2007, 35, 1, 6, 4, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2008, 36, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2009, 37, 1, 6, 4, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2010, 38, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2011, 39, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2012, 41, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2013, 42, 1, 6, 4, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2014, 43, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2015, 45, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2016, 49, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2017, 50, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2018, 51, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2019, 52, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2020, 53, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2021, 54, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2022, 55, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204131229560.9634', '2022-04-13 09:29:57', '2022-04-13 09:29:57'),
(2161, 1, 1, 6, 3, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2162, 2, 1, 6, 3, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2163, 3, 1, 6, 3, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2164, 4, 1, 6, 3, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2165, 5, 1, 6, 3, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2166, 6, 1, 6, 3, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2167, 7, 1, 6, 3, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2168, 9, 1, 6, 3, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2169, 10, 1, 6, 3, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2170, 11, 1, 6, 3, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2171, 12, 1, 6, 3, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2172, 13, 1, 6, 3, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2173, 15, 1, 6, 3, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2174, 16, 1, 6, 3, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2175, 17, 1, 6, 3, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2176, 18, 1, 6, 3, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2177, 19, 1, 6, 3, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2178, 20, 1, 6, 3, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2179, 21, 1, 6, 3, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2180, 22, 1, 6, 3, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2181, 23, 1, 6, 3, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2182, 24, 1, 6, 3, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2183, 25, 1, 6, 3, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2184, 27, 1, 6, 3, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2185, 28, 1, 6, 3, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2186, 29, 1, 6, 3, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2187, 30, 1, 6, 3, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2188, 32, 1, 6, 3, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2189, 33, 1, 6, 3, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2190, 34, 1, 6, 3, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2191, 35, 1, 6, 3, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2192, 36, 1, 6, 3, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2193, 37, 1, 6, 3, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2194, 38, 1, 6, 3, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13');
INSERT INTO `employee_month` (`employee_month_id`, `employee_id`, `org_id`, `fiscal_year_id`, `year_month_id`, `is_advance`, `is_disbursed`, `is_paid`, `is_emailed`, `doc_no`, `basic_salary`, `gross_salary`, `net_salary`, `allowance`, `deductible`, `nssf`, `nhif`, `tax`, `tax_relief`, `insurance_relief`, `advance_amount`, `bank_id`, `bank_name`, `branch_name`, `branch_code`, `bank_account_no`, `payroll_code`, `date_modified`, `time_stamp`) VALUES
(2195, 39, 1, 6, 3, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2196, 41, 1, 6, 3, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2197, 42, 1, 6, 3, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2198, 43, 1, 6, 3, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2199, 45, 1, 6, 3, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2200, 49, 1, 6, 3, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2201, 50, 1, 6, 3, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2202, 51, 1, 6, 3, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2203, 52, 1, 6, 3, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2204, 53, 1, 6, 3, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2205, 54, 1, 6, 3, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2206, 55, 1, 6, 3, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204131239130.159', '2022-04-13 09:39:13', '2022-04-13 09:39:13'),
(2254, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2255, 2, 1, 6, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2256, 3, 1, 6, 4, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2257, 4, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2258, 5, 1, 6, 4, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2259, 6, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2260, 7, 1, 6, 4, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2261, 9, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2262, 10, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2263, 11, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2264, 12, 1, 6, 4, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2265, 13, 1, 6, 4, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2266, 15, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2267, 16, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2268, 17, 1, 6, 4, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2269, 18, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2270, 19, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2271, 20, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2272, 21, 1, 6, 4, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2273, 22, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2274, 23, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2275, 24, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2276, 25, 1, 6, 4, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2277, 27, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2278, 28, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2279, 29, 1, 6, 4, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2280, 30, 1, 6, 4, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2281, 32, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2282, 33, 1, 6, 4, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2283, 34, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2284, 35, 1, 6, 4, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2285, 36, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2286, 37, 1, 6, 4, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2287, 38, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2288, 39, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2289, 41, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2290, 42, 1, 6, 4, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2291, 43, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2292, 45, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2293, 49, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2294, 50, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2295, 51, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2296, 52, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2297, 53, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2298, 54, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2299, 55, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204131242490.5233', '2022-04-13 09:42:49', '2022-04-13 09:42:49'),
(2300, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2301, 2, 1, 6, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2302, 3, 1, 6, 4, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2303, 4, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2304, 5, 1, 6, 4, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2305, 6, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2306, 7, 1, 6, 4, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2307, 9, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2308, 10, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2309, 11, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2310, 12, 1, 6, 4, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2311, 13, 1, 6, 4, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2312, 15, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2313, 16, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2314, 17, 1, 6, 4, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2315, 18, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2316, 19, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2317, 20, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2318, 21, 1, 6, 4, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2319, 22, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2320, 23, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2321, 24, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2322, 25, 1, 6, 4, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2323, 27, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2324, 28, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2325, 29, 1, 6, 4, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2326, 30, 1, 6, 4, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2327, 32, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2328, 33, 1, 6, 4, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2329, 34, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2330, 35, 1, 6, 4, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2331, 36, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2332, 37, 1, 6, 4, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2333, 38, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2334, 39, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2335, 41, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2336, 42, 1, 6, 4, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2337, 43, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2338, 45, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2339, 49, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2340, 50, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2341, 51, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2342, 52, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2343, 53, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2344, 54, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2345, 55, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204131242540.307', '2022-04-13 09:42:54', '2022-04-13 09:42:54'),
(2346, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2347, 2, 1, 6, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2348, 3, 1, 6, 4, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2349, 4, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2350, 5, 1, 6, 4, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2351, 6, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2352, 7, 1, 6, 4, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2353, 9, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2354, 10, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2355, 11, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2356, 12, 1, 6, 4, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2357, 13, 1, 6, 4, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2358, 15, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2359, 16, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2360, 17, 1, 6, 4, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2361, 18, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2362, 19, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2363, 20, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2364, 21, 1, 6, 4, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2365, 22, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2366, 23, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2367, 24, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2368, 25, 1, 6, 4, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2369, 27, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2370, 28, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2371, 29, 1, 6, 4, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2372, 30, 1, 6, 4, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2373, 32, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2374, 33, 1, 6, 4, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2375, 34, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2376, 35, 1, 6, 4, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2377, 36, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2378, 37, 1, 6, 4, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2379, 38, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2380, 39, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2381, 41, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2382, 42, 1, 6, 4, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2383, 43, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2384, 45, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2385, 49, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2386, 50, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2387, 51, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2388, 52, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2389, 53, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2390, 54, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2391, 55, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204131244330.8519', '2022-04-13 09:44:33', '2022-04-13 09:44:33'),
(2392, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2393, 2, 1, 6, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2394, 3, 1, 6, 4, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2395, 4, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2396, 5, 1, 6, 4, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2397, 6, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2398, 7, 1, 6, 4, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2399, 9, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2400, 10, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2401, 11, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2402, 12, 1, 6, 4, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2403, 13, 1, 6, 4, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2404, 15, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2405, 16, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2406, 17, 1, 6, 4, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2407, 18, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2408, 19, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2409, 20, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2410, 21, 1, 6, 4, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2411, 22, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2412, 23, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2413, 24, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2414, 25, 1, 6, 4, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2415, 27, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2416, 28, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2417, 29, 1, 6, 4, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2418, 30, 1, 6, 4, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2419, 32, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2420, 33, 1, 6, 4, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2421, 34, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2422, 35, 1, 6, 4, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2423, 36, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2424, 37, 1, 6, 4, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2425, 38, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2426, 39, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2427, 41, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2428, 42, 1, 6, 4, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2429, 43, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2430, 45, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2431, 49, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2432, 50, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2433, 51, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2434, 52, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2435, 53, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2436, 54, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2437, 55, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204131244430.8296', '2022-04-13 09:44:43', '2022-04-13 09:44:43'),
(2438, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2439, 2, 1, 6, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2440, 3, 1, 6, 4, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2441, 4, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2442, 5, 1, 6, 4, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2443, 6, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2444, 7, 1, 6, 4, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2445, 9, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2446, 10, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2447, 11, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2448, 12, 1, 6, 4, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2449, 13, 1, 6, 4, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2450, 15, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2451, 16, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2452, 17, 1, 6, 4, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2453, 18, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2454, 19, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2455, 20, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2456, 21, 1, 6, 4, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2457, 22, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2458, 23, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2459, 24, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2460, 25, 1, 6, 4, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2461, 27, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2462, 28, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2463, 29, 1, 6, 4, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2464, 30, 1, 6, 4, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2465, 32, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2466, 33, 1, 6, 4, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2467, 34, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2468, 35, 1, 6, 4, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2469, 36, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2470, 37, 1, 6, 4, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2471, 38, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2472, 39, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2473, 41, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2474, 42, 1, 6, 4, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2475, 43, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2476, 45, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2477, 49, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2478, 50, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2479, 51, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17');
INSERT INTO `employee_month` (`employee_month_id`, `employee_id`, `org_id`, `fiscal_year_id`, `year_month_id`, `is_advance`, `is_disbursed`, `is_paid`, `is_emailed`, `doc_no`, `basic_salary`, `gross_salary`, `net_salary`, `allowance`, `deductible`, `nssf`, `nhif`, `tax`, `tax_relief`, `insurance_relief`, `advance_amount`, `bank_id`, `bank_name`, `branch_name`, `branch_code`, `bank_account_no`, `payroll_code`, `date_modified`, `time_stamp`) VALUES
(2480, 52, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2481, 53, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2482, 54, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2483, 55, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204131246170.5603', '2022-04-13 09:46:17', '2022-04-13 09:46:17'),
(2484, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204131246250.9294', '2022-04-13 09:46:25', '2022-04-13 09:46:25'),
(2485, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204131250180.2501', '2022-04-13 09:50:18', '2022-04-13 09:50:18'),
(2486, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2487, 2, 1, 6, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2488, 3, 1, 6, 4, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2489, 4, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2490, 5, 1, 6, 4, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2491, 6, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2492, 7, 1, 6, 4, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2493, 9, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2494, 10, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2495, 11, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2496, 12, 1, 6, 4, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2497, 13, 1, 6, 4, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2498, 15, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2499, 16, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2500, 17, 1, 6, 4, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2501, 18, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2502, 19, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2503, 20, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2504, 21, 1, 6, 4, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2505, 22, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2506, 23, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2507, 24, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2508, 25, 1, 6, 4, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2509, 27, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2510, 28, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2511, 29, 1, 6, 4, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2512, 30, 1, 6, 4, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2513, 32, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2514, 33, 1, 6, 4, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2515, 34, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2516, 35, 1, 6, 4, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2517, 36, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2518, 37, 1, 6, 4, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2519, 38, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2520, 39, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2521, 41, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2522, 42, 1, 6, 4, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2523, 43, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2524, 45, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2525, 49, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2526, 50, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2527, 51, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2528, 52, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2529, 53, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2530, 54, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2531, 55, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204191222040.3455', '2022-04-19 09:22:04', '2022-04-19 09:22:04'),
(2532, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204201455280.7935', '2022-04-20 11:55:28', '2022-04-20 11:55:28'),
(2533, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204201457250.166', '2022-04-20 11:57:25', '2022-04-20 11:57:25'),
(2534, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204201459020.8263', '2022-04-20 11:59:02', '2022-04-20 11:59:02'),
(2535, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204201720140.5694', '2022-04-20 14:20:14', '2022-04-20 14:20:14'),
(2536, 2, 3, 6, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204201720290.0371', '2022-04-20 14:20:29', '2022-04-20 14:20:29'),
(2537, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2538, 2, 1, 6, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2539, 3, 1, 6, 4, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2540, 4, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2541, 5, 1, 6, 4, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2542, 6, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2543, 7, 1, 6, 4, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2544, 9, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2545, 10, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2546, 11, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2547, 12, 1, 6, 4, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2548, 13, 1, 6, 4, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2549, 15, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2550, 16, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2551, 17, 1, 6, 4, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2552, 18, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2553, 19, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2554, 20, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2555, 21, 1, 6, 4, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2556, 22, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2557, 23, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2558, 24, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2559, 25, 1, 6, 4, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2560, 27, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2561, 28, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2562, 29, 1, 6, 4, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2563, 30, 1, 6, 4, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2564, 32, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2565, 33, 1, 6, 4, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2566, 34, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2567, 35, 1, 6, 4, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2568, 36, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2569, 37, 1, 6, 4, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2570, 38, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2571, 39, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2572, 41, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2573, 42, 1, 6, 4, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2574, 43, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2575, 45, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2576, 49, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2577, 50, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2578, 51, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2579, 52, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2580, 53, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2581, 54, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2582, 55, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204201723330.2566', '2022-04-20 14:23:33', '2022-04-20 14:23:33'),
(2583, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2584, 2, 1, 6, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2585, 3, 1, 6, 4, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2586, 4, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2587, 5, 1, 6, 4, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2588, 6, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2589, 7, 1, 6, 4, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2590, 9, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2591, 10, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2592, 11, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2593, 12, 1, 6, 4, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2594, 13, 1, 6, 4, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2595, 15, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2596, 16, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2597, 17, 1, 6, 4, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2598, 18, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2599, 19, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2600, 20, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2601, 21, 1, 6, 4, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2602, 22, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2603, 23, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2604, 24, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2605, 25, 1, 6, 4, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2606, 27, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2607, 28, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2608, 29, 1, 6, 4, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2609, 30, 1, 6, 4, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2610, 32, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2611, 33, 1, 6, 4, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2612, 34, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2613, 35, 1, 6, 4, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2614, 36, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2615, 37, 1, 6, 4, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2616, 38, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2617, 39, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2618, 41, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2619, 42, 1, 6, 4, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2620, 43, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2621, 45, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2622, 49, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2623, 50, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2624, 51, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2625, 52, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2626, 53, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2627, 54, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2628, 55, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204201724240.4892', '2022-04-20 14:24:24', '2022-04-20 14:24:24'),
(2629, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2630, 2, 1, 6, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2631, 3, 1, 6, 4, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2632, 4, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2633, 5, 1, 6, 4, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2634, 6, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2635, 7, 1, 6, 4, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2636, 9, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2637, 10, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2638, 11, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2639, 12, 1, 6, 4, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2640, 13, 1, 6, 4, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2641, 15, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2642, 16, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2643, 17, 1, 6, 4, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2644, 18, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2645, 19, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2646, 20, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2647, 21, 1, 6, 4, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2648, 22, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2649, 23, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2650, 24, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2651, 25, 1, 6, 4, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2652, 27, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2653, 28, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2654, 29, 1, 6, 4, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2655, 30, 1, 6, 4, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2656, 32, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2657, 33, 1, 6, 4, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2658, 34, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2659, 35, 1, 6, 4, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2660, 36, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2661, 37, 1, 6, 4, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2662, 38, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2663, 39, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2664, 41, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2665, 42, 1, 6, 4, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2666, 43, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2667, 45, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2668, 49, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2669, 50, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2670, 51, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2671, 52, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2672, 53, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2673, 54, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2674, 55, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204201730190.7563', '2022-04-20 14:30:19', '2022-04-20 14:30:19'),
(2675, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2676, 2, 1, 6, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2677, 3, 1, 6, 4, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2678, 4, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2679, 5, 1, 6, 4, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2680, 6, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2681, 7, 1, 6, 4, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2682, 9, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2683, 10, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2684, 11, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2685, 12, 1, 6, 4, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2686, 13, 1, 6, 4, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2687, 15, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2688, 16, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2689, 17, 1, 6, 4, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2690, 18, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2691, 19, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2692, 20, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2693, 21, 1, 6, 4, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2694, 22, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2695, 23, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2696, 24, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2697, 25, 1, 6, 4, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2698, 27, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2699, 28, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2700, 29, 1, 6, 4, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2701, 30, 1, 6, 4, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2702, 32, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2703, 33, 1, 6, 4, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2704, 34, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2705, 35, 1, 6, 4, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2706, 36, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2707, 37, 1, 6, 4, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2708, 38, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2709, 39, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2710, 41, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2711, 42, 1, 6, 4, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2712, 43, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2713, 45, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2714, 49, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2715, 50, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2716, 51, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2717, 52, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26');
INSERT INTO `employee_month` (`employee_month_id`, `employee_id`, `org_id`, `fiscal_year_id`, `year_month_id`, `is_advance`, `is_disbursed`, `is_paid`, `is_emailed`, `doc_no`, `basic_salary`, `gross_salary`, `net_salary`, `allowance`, `deductible`, `nssf`, `nhif`, `tax`, `tax_relief`, `insurance_relief`, `advance_amount`, `bank_id`, `bank_name`, `branch_name`, `branch_code`, `bank_account_no`, `payroll_code`, `date_modified`, `time_stamp`) VALUES
(2718, 53, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2719, 54, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2720, 55, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204201730260.5552', '2022-04-20 14:30:26', '2022-04-20 14:30:26'),
(2721, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204210833220.7731', '2022-04-21 05:33:22', '2022-04-21 05:33:22'),
(2722, 1, 1, 4, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2723, 2, 1, 4, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2724, 3, 1, 4, 4, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2725, 4, 1, 4, 4, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2726, 5, 1, 4, 4, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2727, 6, 1, 4, 4, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2728, 7, 1, 4, 4, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2729, 9, 1, 4, 4, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2730, 10, 1, 4, 4, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2731, 11, 1, 4, 4, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2732, 12, 1, 4, 4, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2733, 13, 1, 4, 4, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2734, 15, 1, 4, 4, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2735, 16, 1, 4, 4, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2736, 17, 1, 4, 4, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2737, 18, 1, 4, 4, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2738, 19, 1, 4, 4, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2739, 20, 1, 4, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2740, 21, 1, 4, 4, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2741, 22, 1, 4, 4, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2742, 23, 1, 4, 4, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2743, 24, 1, 4, 4, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2744, 25, 1, 4, 4, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2745, 27, 1, 4, 4, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2746, 28, 1, 4, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2747, 29, 1, 4, 4, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2748, 30, 1, 4, 4, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2749, 32, 1, 4, 4, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2750, 33, 1, 4, 4, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2751, 34, 1, 4, 4, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2752, 35, 1, 4, 4, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2753, 36, 1, 4, 4, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2754, 37, 1, 4, 4, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2755, 38, 1, 4, 4, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2756, 39, 1, 4, 4, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2757, 41, 1, 4, 4, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2758, 42, 1, 4, 4, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2759, 43, 1, 4, 4, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2760, 45, 1, 4, 4, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2761, 49, 1, 4, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2762, 50, 1, 4, 4, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2763, 51, 1, 4, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2764, 52, 1, 4, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2765, 53, 1, 4, 4, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2766, 54, 1, 4, 4, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2767, 55, 1, 4, 4, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204210833420.1318', '2022-04-21 05:33:42', '2022-04-21 05:33:42'),
(2768, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204210833500.1037', '2022-04-21 05:33:50', '2022-04-21 05:33:50'),
(2769, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2770, 2, 1, 6, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2771, 3, 1, 6, 4, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2772, 4, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2773, 5, 1, 6, 4, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2774, 6, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2775, 7, 1, 6, 4, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2776, 9, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2777, 10, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2778, 11, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2779, 12, 1, 6, 4, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2780, 13, 1, 6, 4, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2781, 15, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2782, 16, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2783, 17, 1, 6, 4, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2784, 18, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2785, 19, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2786, 20, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2787, 21, 1, 6, 4, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2788, 22, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2789, 23, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2790, 24, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2791, 25, 1, 6, 4, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2792, 27, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2793, 28, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2794, 29, 1, 6, 4, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2795, 30, 1, 6, 4, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2796, 32, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2797, 33, 1, 6, 4, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2798, 34, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2799, 35, 1, 6, 4, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2800, 36, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2801, 37, 1, 6, 4, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2802, 38, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2803, 39, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2804, 41, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2805, 42, 1, 6, 4, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2806, 43, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2807, 45, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2808, 49, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2809, 50, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2810, 51, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2811, 52, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2812, 53, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2813, 54, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2814, 55, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204210839440.4384', '2022-04-21 05:39:44', '2022-04-21 05:39:44'),
(2815, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204210839490.3384', '2022-04-21 05:39:49', '2022-04-21 05:39:49'),
(2816, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2817, 2, 1, 6, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2818, 3, 1, 6, 4, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2819, 4, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2820, 5, 1, 6, 4, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2821, 6, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2822, 7, 1, 6, 4, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2823, 9, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2824, 10, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2825, 11, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2826, 12, 1, 6, 4, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2827, 13, 1, 6, 4, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2828, 15, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2829, 16, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2830, 17, 1, 6, 4, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2831, 18, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2832, 19, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2833, 20, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2834, 21, 1, 6, 4, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2835, 22, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2836, 23, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2837, 24, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2838, 25, 1, 6, 4, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2839, 27, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2840, 28, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2841, 29, 1, 6, 4, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2842, 30, 1, 6, 4, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2843, 32, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2844, 33, 1, 6, 4, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2845, 34, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2846, 35, 1, 6, 4, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2847, 36, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2848, 37, 1, 6, 4, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2849, 38, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2850, 39, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2851, 41, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2852, 42, 1, 6, 4, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2853, 43, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2854, 45, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2855, 49, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2856, 50, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2857, 51, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2858, 52, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2859, 53, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2860, 54, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2861, 55, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204210840460.2642', '2022-04-21 05:40:46', '2022-04-21 05:40:46'),
(2862, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2863, 2, 1, 6, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2864, 3, 1, 6, 4, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2865, 4, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2866, 5, 1, 6, 4, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2867, 6, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2868, 7, 1, 6, 4, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2869, 9, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2870, 10, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2871, 11, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2872, 12, 1, 6, 4, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2873, 13, 1, 6, 4, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2874, 15, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2875, 16, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2876, 17, 1, 6, 4, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2877, 18, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2878, 19, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2879, 20, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2880, 21, 1, 6, 4, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2881, 22, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2882, 23, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2883, 24, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2884, 25, 1, 6, 4, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2885, 27, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2886, 28, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2887, 29, 1, 6, 4, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2888, 30, 1, 6, 4, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2889, 32, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2890, 33, 1, 6, 4, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2891, 34, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2892, 35, 1, 6, 4, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2893, 36, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2894, 37, 1, 6, 4, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2895, 38, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2896, 39, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2897, 41, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2898, 42, 1, 6, 4, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2899, 43, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2900, 45, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2901, 49, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2902, 50, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2903, 51, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2904, 52, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2905, 53, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2906, 54, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2907, 55, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204210850170.8265', '2022-04-21 05:50:18', '2022-04-21 05:50:18'),
(2908, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2909, 2, 1, 6, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2910, 3, 1, 6, 4, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2911, 4, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2912, 5, 1, 6, 4, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2913, 6, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2914, 7, 1, 6, 4, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2915, 9, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2916, 10, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2917, 11, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2918, 12, 1, 6, 4, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2919, 13, 1, 6, 4, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2920, 15, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2921, 16, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2922, 17, 1, 6, 4, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2923, 18, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2924, 19, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2925, 20, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2926, 21, 1, 6, 4, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2927, 22, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2928, 23, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2929, 24, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2930, 25, 1, 6, 4, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2931, 27, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2932, 28, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2933, 29, 1, 6, 4, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2934, 30, 1, 6, 4, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2935, 32, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2936, 33, 1, 6, 4, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2937, 34, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2938, 35, 1, 6, 4, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2939, 36, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2940, 37, 1, 6, 4, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2941, 38, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2942, 39, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2943, 41, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2944, 42, 1, 6, 4, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2945, 43, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2946, 45, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2947, 49, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2948, 50, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2949, 51, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2950, 52, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2951, 53, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2952, 54, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2953, 55, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204210851030.7724', '2022-04-21 05:51:03', '2022-04-21 05:51:03'),
(2954, 1, 1, 6, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2955, 2, 1, 6, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56');
INSERT INTO `employee_month` (`employee_month_id`, `employee_id`, `org_id`, `fiscal_year_id`, `year_month_id`, `is_advance`, `is_disbursed`, `is_paid`, `is_emailed`, `doc_no`, `basic_salary`, `gross_salary`, `net_salary`, `allowance`, `deductible`, `nssf`, `nhif`, `tax`, `tax_relief`, `insurance_relief`, `advance_amount`, `bank_id`, `bank_name`, `branch_name`, `branch_code`, `bank_account_no`, `payroll_code`, `date_modified`, `time_stamp`) VALUES
(2956, 3, 1, 6, 4, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2957, 4, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2958, 5, 1, 6, 4, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2959, 6, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2960, 7, 1, 6, 4, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2961, 9, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2962, 10, 1, 6, 4, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2963, 11, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2964, 12, 1, 6, 4, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2965, 13, 1, 6, 4, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2966, 15, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2967, 16, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2968, 17, 1, 6, 4, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2969, 18, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2970, 19, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2971, 20, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2972, 21, 1, 6, 4, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2973, 22, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2974, 23, 1, 6, 4, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2975, 24, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2976, 25, 1, 6, 4, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2977, 27, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2978, 28, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2979, 29, 1, 6, 4, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2980, 30, 1, 6, 4, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2981, 32, 1, 6, 4, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2982, 33, 1, 6, 4, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2983, 34, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2984, 35, 1, 6, 4, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2985, 36, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2986, 37, 1, 6, 4, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2987, 38, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2988, 39, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2989, 41, 1, 6, 4, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2990, 42, 1, 6, 4, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2991, 43, 1, 6, 4, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2992, 45, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2993, 49, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2994, 50, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2995, 51, 1, 6, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2996, 52, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2997, 53, 1, 6, 4, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2998, 54, 1, 6, 4, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(2999, 55, 1, 6, 4, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204221017560.1738', '2022-04-22 07:17:56', '2022-04-22 07:17:56'),
(3000, 1, 1, 6, 5, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3001, 2, 1, 6, 5, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3002, 3, 1, 6, 5, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3003, 4, 1, 6, 5, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3004, 5, 1, 6, 5, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3005, 6, 1, 6, 5, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3006, 7, 1, 6, 5, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3007, 9, 1, 6, 5, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3008, 10, 1, 6, 5, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3009, 11, 1, 6, 5, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3010, 12, 1, 6, 5, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3011, 13, 1, 6, 5, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3012, 15, 1, 6, 5, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3013, 16, 1, 6, 5, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3014, 17, 1, 6, 5, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3015, 18, 1, 6, 5, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3016, 19, 1, 6, 5, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3017, 20, 1, 6, 5, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3018, 21, 1, 6, 5, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3019, 22, 1, 6, 5, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3020, 23, 1, 6, 5, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3021, 24, 1, 6, 5, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3022, 25, 1, 6, 5, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3023, 27, 1, 6, 5, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3024, 28, 1, 6, 5, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3025, 29, 1, 6, 5, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3026, 30, 1, 6, 5, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3027, 32, 1, 6, 5, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3028, 33, 1, 6, 5, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3029, 34, 1, 6, 5, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3030, 35, 1, 6, 5, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3031, 36, 1, 6, 5, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3032, 37, 1, 6, 5, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3033, 38, 1, 6, 5, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3034, 39, 1, 6, 5, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3035, 41, 1, 6, 5, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3036, 42, 1, 6, 5, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3037, 43, 1, 6, 5, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3038, 45, 1, 6, 5, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3039, 49, 1, 6, 5, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3040, 50, 1, 6, 5, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3041, 51, 1, 6, 5, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3042, 52, 1, 6, 5, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3043, 53, 1, 6, 5, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3044, 54, 1, 6, 5, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3045, 55, 1, 6, 5, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202205060956230.4251', '2022-05-06 06:56:23', '2022-05-06 06:56:23'),
(3046, 1, 1, 6, 6, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202206071458490.0439', '2022-06-07 11:58:49', '2022-06-07 11:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `entitys`
--

CREATE TABLE `entitys` (
  `entity_id` int(11) NOT NULL,
  `pin` int(11) DEFAULT NULL,
  `org_id` int(11) NOT NULL,
  `sub_department_id` int(11) DEFAULT 0,
  `activation_code` text DEFAULT NULL,
  `entity_name` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `secondname` varchar(50) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `id_passport` varchar(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `status_id` int(11) DEFAULT NULL,
  `system_role` int(11) NOT NULL,
  `super_user` tinyint(1) NOT NULL DEFAULT 0,
  `profile_picture` varchar(256) NOT NULL DEFAULT 'default.png',
  `entity_address` varchar(100) DEFAULT NULL,
  `loyalty_points` int(11) NOT NULL DEFAULT 0,
  `contact_person_name1` varchar(50) DEFAULT NULL,
  `contact_person_phone1` varchar(50) DEFAULT NULL,
  `contact_person_email1` varchar(50) DEFAULT NULL,
  `contact_person_name2` varchar(50) DEFAULT NULL,
  `contact_person_address1` varchar(100) DEFAULT NULL,
  `contact_person_phone2` varchar(50) DEFAULT NULL,
  `contact_person_email2` varchar(50) DEFAULT NULL,
  `contact_person_address2` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entitys`
--

INSERT INTO `entitys` (`entity_id`, `pin`, `org_id`, `sub_department_id`, `activation_code`, `entity_name`, `password`, `email`, `firstname`, `secondname`, `lastname`, `phone`, `gender`, `dob`, `id_passport`, `active`, `status_id`, `system_role`, `super_user`, `profile_picture`, `entity_address`, `loyalty_points`, `contact_person_name1`, `contact_person_phone1`, `contact_person_email1`, `contact_person_name2`, `contact_person_address1`, `contact_person_phone2`, `contact_person_email2`, `contact_person_address2`, `date_modified`, `time_stamp`) VALUES
(0, NULL, 1, 1, NULL, NULL, '$2y$10$UwNfACh/g3l6BvTMheaGduzmFDYxs/..DdEfMtAFCAFO5rrx2gj76', 'walkin', 'Walk In', '', 'Client', '0700000', NULL, NULL, '', 1, NULL, 3, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:28', '2019-11-19 13:53:49'),
(1, NULL, 1, 1, NULL, NULL, '$2y$10$bD9HaU2YYWAl4Nx50jGPSe/AN/lg8SijrZct3oK9NB4wWeTAhyXUu', 'admin', 'SA', '', '', '0739698964', NULL, NULL, '', 1, NULL, 1, 1, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:28', '2019-11-19 13:53:49'),
(2, NULL, 1, 1, NULL, NULL, '$2y$10$/Z1idABwjOBoOwmuiPp3dehcrPsJO9jLfMVhpcT/82wGzxjkpBHe6', 'admin@admin.com', 'Admin', '', '', '0707866136', 'M', '2019-10-31', '6857222', 1, NULL, 1, 1, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:28', '2019-11-19 13:53:49'),
(38, 1023, 1, 1, '$2y$10$InLvtDPpplkdym1H.NvBhOXk80sxn1rYmZL9V0pQCaiS3EPedjKXO', NULL, '$2y$10$OmxOcslUiRgxT1eRYzGrfe2e.eyUoLYyQDQivC12j0R04ZP.H9fXK', 'ken@gmail.com', 'Ken', 'Lusaka', '', '078515353', 'M', '0000-00-00', '31355665', 1, 1, 7, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:28', '2020-10-13 03:47:53'),
(41, 3285, 1, 1, '$2y$10$BfbRKfuR5ZoWpLqrCsjkkOmaUAozIumQKzBbq3YiWDx4uOl.NdXMK', 'Citizen', '$2y$10$/pBnp8IJj24Uof71QgeFVOmSyCnbLn5y0AlHXRvpSBgshgxSZyghW', 'robert@gmail.com', 'Robert', 'Alai', '', '0707899695', 'M', '0000-00-00', '323232322', 1, 1, 2, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:28', '2020-10-13 14:51:41'),
(48, NULL, 1, 1, NULL, NULL, '$2y$10$0qG577AUvXgWjy7WYhtHneSyw0BsZPnXp9TinFn6ISuAQYP3Lj3Qy', 'jiwani@mail.com', 'Jiwani', 'Suppliers', '', '70708885554', NULL, NULL, '4565147', 1, NULL, 3, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:28', '2021-03-09 07:08:38'),
(49, NULL, 1, 1, NULL, NULL, '$2y$10$OaSl0cIwn9rAutexgDMLy.NxVV.fMq8pobBtBnFfkueFiVWvxRcya', 'as@mail.com', 'Criggler', 'AS', '', '075466535', NULL, NULL, '515633656', 1, NULL, 4, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:28', '2021-03-09 07:09:51'),
(60, NULL, 1, 1, NULL, NULL, '', 'hellen@odi.com', 'Hellen', 'Odi', NULL, '25565155', NULL, NULL, NULL, 1, NULL, 4, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:28', '2021-03-23 04:23:23'),
(61, NULL, 1, 1, NULL, NULL, '', 'john@mail.com', 'John', 'Gitahi', NULL, '077074786', NULL, NULL, NULL, 1, NULL, 4, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:28', '2021-03-24 06:27:04'),
(63, 1593, 1, 1, '$2y$10$ZJLh5XaKD6Af.mCGFFXVdu4ap7rjSx2qK29QOq/V3I3aoyVxP95.e', 'System', '$2y$10$4fPoNIA.ezvWq8PbVqFPju6JKARmBp8AUtpxK2dqNjV0d7/PecznW', 'ta485590@gmail.com', 'jw', 'jw', '', '00', 'M', '0000-00-00', '1', 1, 1, 1, 1, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:28', '2021-04-01 07:41:10'),
(64, 1234, 1, 1, '$2y$10$3zffdBBBztw5cMlZ5jaq8.sIdhiu9gt8LhakuMGJI.kHdDqipZ14.', NULL, '$2y$10$D4bZqV3WXE4KkLtj9fd8g.LQY/XYYLSkekwk/uMYPfxxms4U5NTWe', 'liquorcabinett@gmail.com', 'jb', 'jb', '', '0', 'M', '0000-00-00', '0', 1, 1, 7, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-07 13:25:37', '2021-04-01 07:43:25'),
(65, 3150, 1, 1, '$2y$10$Vk19LGdTvP23ZJnWegXcN.MNC2MV9pWchMRRCRNgeMWAS67Edq3va', NULL, '$2y$10$b583y9y0KFV.y3N7QWfGXO46iz5CQ.Y777iW/HFbz./OMFT1e72AC', 'okinywa@yahoo.com', 'Obadia', 'Kinywa', '', '1111111', 'M', '2020-07-06', '78877837', 1, 1, 7, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:28', '2021-08-19 08:01:01'),
(66, 4729, 1, 1, '$2y$10$Hpg9nLnuUHis4vzJIsOKKOz7L.L7sHiY1XCeIKFFR1sv4V9KfFIYK', 'System', '$2y$10$uhqrAOfCCMOR5pCs2KnpI.rsT3e8vA6Ytnh/GiIQtTs75XmiE6dU6', 'okinyua2@yahoo.com', 'Admin', 'Admin', '', '536635266', 'M', '2020-04-13', '6546467', 1, 1, 1, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:28', '2021-08-19 08:09:14'),
(67, 5418, 1, 1, '$2y$10$hOpc0/57GOqK6WLkORA9i.Vdux4JFzhLQs7tWFzZLnlBi6ba6kEXm', NULL, '$2y$10$MhP5.1GUg74AnUGDkXMOT.V3H104nvNd/v.U3ePLWCS8JJ.6sxTya', 'jonjula@iosofttech.co.ke', 'Jared', 'Onjula', '', '0719825153', 'M', '2022-01-06', '303838333333', 1, 1, 4, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:28', '2022-02-03 16:05:20'),
(68, 8137, 1, 1, '$2y$10$7LCufSRgMJVECeJNiyVcSeUXb1tFvx8qLNyeJiS/8Bi/VUMlTMrle', NULL, '$2y$10$kMRwuwVwN3ZbjVbCDAVz3Ox4TVnHI7aXrtlLZ2BtEqQE.x6ryMoLm', 'reagan@iosofttech.co.ke', 'Reagan', 'iOSoft', '', '070700707070', 'M', '2021-12-09', '343454553', 1, 1, 7, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:28', '2022-02-03 16:07:05'),
(69, NULL, 1, 1, NULL, NULL, '$2y$10$QH15SxQe0pq2qxLCc0JePuQ4vkhYyCibqTxWLStMPkbmRdni54T1G', 'ian@mail.com', 'ian', 'ouma', '', '0739698963', NULL, NULL, '12345432', 1, NULL, 3, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:28', '2022-03-22 19:53:06'),
(71, NULL, 1, 1, NULL, NULL, '', 'beryl@gmail.com', 'Beryl', 'Omondi', NULL, '0710422499', NULL, NULL, NULL, 1, NULL, 4, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:28', '2022-03-27 07:45:48'),
(72, NULL, 1, 1, NULL, NULL, '$2y$10$PL5.edefmbQxxdY5.uVWfu5jG9a5D/47.m7m.Jq4TWOlo8.sZHJ7m', 'mikei@mail.com', 'Michael', 'Orata', '', '08627828', 'M', '0000-00-00', '62781878', 1, NULL, 4, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:28', '2022-03-31 05:17:45'),
(73, NULL, 1, 1, NULL, NULL, '', '', '', '', NULL, '', NULL, NULL, NULL, 1, NULL, 4, 0, 'default.png', NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-07 11:50:18', '2022-04-05 10:54:42'),
(74, NULL, 1, 1, NULL, NULL, '', 'rouzina@gmail.com', 'rouzina', '', NULL, '0111983314', NULL, NULL, NULL, 1, NULL, 4, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-13 07:10:24', '2022-04-13 07:10:24'),
(75, NULL, 1, 1, NULL, NULL, '', 'jannelle@gmail.com', 'jannelle', '', NULL, '0734567890', NULL, NULL, '2345678', 1, NULL, 4, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-13 09:08:25', '2022-04-13 09:08:25'),
(76, NULL, 1, 1, NULL, NULL, '', 'hs@gmail.com', 'jen', '', NULL, '234567890', NULL, NULL, NULL, 1, NULL, 4, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-13 15:00:55', '2022-04-13 15:00:55'),
(77, NULL, 1, 1, NULL, NULL, '', 'jen@gmail.com', 'jennile', '', NULL, '123456789', NULL, NULL, NULL, 1, NULL, 4, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-14 08:25:47', '2022-04-14 08:25:47'),
(78, NULL, 1, 1, NULL, NULL, '', 'jaj@gmail.com', 'jan', '', NULL, '23456789', NULL, NULL, NULL, 1, NULL, 4, 0, 'default.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-26 14:30:47', '2022-04-26 14:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL DEFAULT 0,
  `vote_head_id` int(11) DEFAULT NULL,
  `vote_head_code` varchar(20) DEFAULT NULL,
  `entity_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `expense_amount` decimal(10,2) NOT NULL,
  `expense_balance` double DEFAULT 0,
  `paid_to` varchar(50) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `narrative` varchar(100) DEFAULT NULL,
  `expense_date` date NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `org_id`, `account_id`, `vote_head_id`, `vote_head_code`, `entity_id`, `status_id`, `department_id`, `reference`, `expense_amount`, `expense_balance`, `paid_to`, `active`, `narrative`, `expense_date`, `date_modified`, `time_stamp`) VALUES
(2, 1, 8, 0, NULL, 2, 2, 1, '20220224110250', '1000.00', 0, 'Reagan Omondi', 1, 'NANANA', '2022-02-24', '2022-04-11 07:51:29', '2022-02-24 08:02:50'),
(3, 1, 8, 0, NULL, 2, 2, 1, '20220331085547', '600.00', 0, 'Ian', 1, 'Test expense', '2022-03-31', '2022-04-11 07:51:29', '2022-03-31 05:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `expense_type_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `expense_type_name` varchar(30) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fiscal_years`
--

CREATE TABLE `fiscal_years` (
  `fiscal_year_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `fiscal_year_name` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fiscal_years`
--

INSERT INTO `fiscal_years` (`fiscal_year_id`, `org_id`, `fiscal_year_name`, `start_date`, `end_date`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(4, 1, '2020', '2020-01-01', '2020-12-31', 0, '', '2022-04-11 07:51:29', '2020-05-19 12:46:08'),
(6, 1, '2021', '2021-01-01', '2021-12-31', 1, '', '2022-04-11 07:51:29', '2021-03-24 12:36:28'),
(7, 1, '2022', '2022-01-01', '2022-12-31', 0, '', '2022-04-11 07:51:29', '2021-05-05 08:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `income_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `account_id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `income_amount` double NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `status_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `income_date` date DEFAULT NULL,
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`income_id`, `org_id`, `account_id`, `department_id`, `income_amount`, `customer_name`, `active`, `status_id`, `created_by`, `reference`, `income_date`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 1, 1898, 0, 1500, 'Ndhiwa Laws', 1, 2, 2, '20220224122026', '2022-02-24', 'NANa', '2022-04-11 07:51:30', '2022-02-24 09:20:26'),
(2, 1, 1971, 1, 850, 'Beryl Omondi', 1, 2, 2, '20220331090131', '2022-03-31', '', '2022-04-11 07:51:30', '2022-03-31 06:01:31'),
(3, 1, 1971, 0, 450, 'Kama', 1, 2, 2, '20220331090524', '2022-03-31', 'd', '2022-04-11 07:51:30', '2022-03-31 06:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `income_payments`
--

CREATE TABLE `income_payments` (
  `income_payment_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `entity_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `subaccount_type_id` int(11) NOT NULL,
  `income_id` int(11) NOT NULL,
  `payment_amount` double NOT NULL,
  `reference` varchar(30) NOT NULL,
  `bill_no` varchar(30) DEFAULT NULL,
  `paid_by` varchar(50) DEFAULT NULL,
  `is_paid` tinyint(1) DEFAULT 0,
  `payment_date` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income_payments`
--

INSERT INTO `income_payments` (`income_payment_id`, `org_id`, `entity_id`, `account_id`, `subaccount_type_id`, `income_id`, `payment_amount`, `reference`, `bill_no`, `paid_by`, `is_paid`, `payment_date`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 1, 2, 6, 1, 1, 1000, 'TQUWUI829W', '20220224122444', 'Ndhiwa Laws', 1, '2022-02-24', 1, 'NANa', '2022-04-11 07:51:30', '2022-02-24 09:24:44'),
(2, 1, 2, 2, 2, 3, 450, '00798', '20220331090614', 'Kama', 1, '2022-03-31', 1, 'd', '2022-04-11 07:51:30', '2022-03-31 06:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `category_id` text DEFAULT NULL,
  `unit_id` int(11) NOT NULL DEFAULT 1,
  `brand_id` int(11) NOT NULL,
  `brand_model_id` int(11) DEFAULT NULL,
  `package_type_id` int(11) DEFAULT NULL,
  `attribute_id` text DEFAULT NULL,
  `tax_type_id` int(11) NOT NULL,
  `parent_item_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `recipe_code` varchar(50) DEFAULT 'NA',
  `ship_number` varchar(20) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `buying_price` decimal(10,2) NOT NULL,
  `marked_price` double NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `model_year` int(11) DEFAULT NULL,
  `imei_one` varchar(50) DEFAULT NULL,
  `imei_two` varchar(50) DEFAULT NULL,
  `image` varchar(200) NOT NULL DEFAULT 'default.png',
  `narrative` text DEFAULT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `available_qty` int(11) DEFAULT 0,
  `reorder_level` int(11) NOT NULL DEFAULT 1,
  `breakdown_formula` int(11) DEFAULT NULL,
  `barcode` varchar(256) DEFAULT NULL,
  `item_status_id` int(11) DEFAULT 2,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `for_sale` tinyint(1) NOT NULL DEFAULT 1,
  `for_purchase` tinyint(1) NOT NULL DEFAULT 1,
  `for_bar` tinyint(1) NOT NULL DEFAULT 0,
  `reference` text DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `org_id`, `category_id`, `unit_id`, `brand_id`, `brand_model_id`, `package_type_id`, `attribute_id`, `tax_type_id`, `parent_item_id`, `color_id`, `recipe_code`, `ship_number`, `item_name`, `buying_price`, `marked_price`, `selling_price`, `capacity`, `model_year`, `imei_one`, `imei_two`, `image`, `narrative`, `availability`, `available_qty`, `reorder_level`, `breakdown_formula`, `barcode`, `item_status_id`, `active`, `for_sale`, `for_purchase`, `for_bar`, `reference`, `date_modified`, `time_stamp`) VALUES
(1, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'SNAP', '140.00', 180, '180.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 20, 0, 5, NULL, 'PROD_0001', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:05'),
(2, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'TUSKER LITE', '183.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 20, -1, 5, NULL, 'PROD_0002', 2, 1, 1, 1, 0, NULL, '2022-04-26 14:53:51', '2022-04-10 05:25:05'),
(3, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'TUSKER CIDER', '175.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 20, -2, 5, NULL, 'PROD_0003', 2, 1, 1, 1, 0, NULL, '2022-05-04 07:56:36', '2022-04-10 05:25:05'),
(4, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'TUSKER MALT', '183.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 20, -2, 5, NULL, 'PROD_0004', 2, 1, 1, 1, 0, NULL, '2022-06-07 11:50:18', '2022-04-10 05:25:05'),
(5, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'TUSKER LAGER', '167.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 20, 0, 5, NULL, 'PROD_0005', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:05'),
(6, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'BALOZI', '166.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 20, 0, 5, NULL, 'PROD_0006', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:06'),
(7, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'TRIPPLE ACE 250ML', '167.00', 200, '200.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 10, NULL, 'PROD_0007', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:06'),
(8, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'REDBULL', '130.00', 170, '170.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 2, NULL, 'PROD_0008', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:06'),
(9, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'COKE 2LT', '145.00', 160, '160.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 1, NULL, 'PROD_0009', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:06'),
(10, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'COKE 1.25ML', '106.00', 120, '120.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 1, NULL, 'PROD_0010', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:06'),
(11, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'KREST 1.25ML', '106.00', 120, '120.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 1, NULL, 'PROD_0011', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:06'),
(12, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'SPRITE 500ML', '53.00', 70, '70.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0012', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:07'),
(13, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'BRAVADA 300ML', '25.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0013', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:07'),
(14, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'LIME 300ML', '20.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0014', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:07'),
(15, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'FANTA PASSION 500ML', '53.00', 70, '70.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0015', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:07'),
(16, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'FANTA ORANGE 500ML', '53.00', 70, '70.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0016', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:07'),
(17, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'COKE 500ML', '53.00', 70, '70.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0017', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:07'),
(18, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'KREST 500ML', '53.00', 70, '70.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0018', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:07'),
(19, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'MINUTE MAID APPLE 400ML', '58.00', 70, '70.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0019', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:07'),
(20, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'LEMONADE 300ML', '37.00', 50, '50.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0020', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:08'),
(21, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'TONIC WATER', '65.00', 100, '100.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0021', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:08'),
(22, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'PREDATOR', '41.00', 50, '50.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0022', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:08'),
(23, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'POWER PLAY', '50.00', 60, '60.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0023', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:08'),
(24, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'SPRITE 2L', '145.00', 160, '160.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 1, NULL, 'PROD_0024', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:08'),
(25, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'FANTA PASSION 2LT', '145.00', 160, '160.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 1, NULL, 'PROD_0025', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:08'),
(26, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'MINUTE MAID 1LT', '105.00', 130, '130.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 1, NULL, 'PROD_0026', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:08'),
(27, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'COKE 350ML', '33.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0027', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:08'),
(28, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'KREST 350ML', '33.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0028', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:09'),
(29, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'SPRITE 350ML', '33.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0029', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:09'),
(30, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'STONEY 350ML', '33.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0030', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:09'),
(31, 1, '4', 1, 4, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'SAFARI KINGS', '8.60', 10, '10.00', NULL, NULL, NULL, NULL, 'default.png', 'CIGARETTES', 20, 0, 20, NULL, 'PROD_0031', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:09'),
(32, 1, '4', 1, 4, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'SPORTSMAN', '10.50', 15, '15.00', NULL, NULL, NULL, NULL, 'default.png', 'CIGARETTES', 20, 0, 10, NULL, 'PROD_0032', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:09'),
(33, 1, '4', 1, 4, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'DUNHILL DOUBLE', '13.05', 20, '20.00', NULL, NULL, NULL, NULL, 'default.png', 'CIGARETTES', 20, 0, 10, NULL, 'PROD_0033', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:09'),
(34, 1, '4', 1, 4, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'EMBASSY', '12.10', 20, '20.00', NULL, NULL, NULL, NULL, 'default.png', 'CIGARETTES', 20, 0, 10, NULL, 'PROD_0034', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:09'),
(35, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'KENYA CANE SMOOTH 250ML', '220.00', 250, '250.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 2, NULL, 'PROD_0035', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:09'),
(36, 1, '6', 1, 6, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'CAPTAIN MORGAN 250ML', '245.00', 300, '300.00', NULL, NULL, NULL, NULL, 'default.png', 'BRANDY', 20, 0, 2, NULL, 'PROD_0036', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:10'),
(37, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'RICHOT 250ML', '340.00', 430, '430.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 20, 0, 2, NULL, 'PROD_0037', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:10'),
(38, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'GILBEYS 250ML', '340.00', 450, '450.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 20, 0, 2, NULL, 'PROD_0038', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:10'),
(39, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'GILBEYS 375ML', '475.00', 550, '550.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 20, 0, 2, NULL, 'PROD_0039', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:10'),
(40, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'KONYAGI 250ML', '195.00', 250, '250.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 20, 0, 2, NULL, 'PROD_0040', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:10'),
(41, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'KONYAGI 350ML', '375.00', 450, '450.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 20, 0, 2, NULL, 'PROD_0041', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:10'),
(42, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'KONYAGI 750ML', '520.00', 650, '650.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 20, 0, 2, NULL, 'PROD_0042', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:10'),
(43, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'CHROME LEMON 250ML', '173.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 5, NULL, 'PROD_0043', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:11'),
(44, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'CHROME CLEAR 250ML', '173.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 5, NULL, 'PROD_0044', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:11'),
(45, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'CHROME GIN 250ML', '173.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 5, NULL, 'PROD_0045', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:11'),
(46, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'CLUB MAN 250ML', '200.00', 250, '250.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 20, 0, 5, NULL, 'PROD_0046', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:11'),
(47, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'FLIRT VODKA GREEN APPLE 25OML', '235.00', 400, '400.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 2, NULL, 'PROD_0047', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:11'),
(48, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'BEST CREAM 250ML', '230.00', 400, '400.00', NULL, NULL, NULL, NULL, 'default.png', 'CREAM', 20, 0, 2, NULL, 'PROD_0048', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:11'),
(49, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'BEST WHISKY 250ML', '230.00', 400, '400.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 2, NULL, 'PROD_0049', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:11'),
(50, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'ALL SEASONS 375ML', '325.00', 400, '400.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 2, NULL, 'PROD_0050', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:11'),
(51, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'HUNTERS CHOICE 250ML', '235.00', 300, '300.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 2, NULL, 'PROD_0051', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:12'),
(52, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'HUNTERS CHOICE 350ML', '360.00', 450, '450.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 2, NULL, 'PROD_0052', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:12'),
(53, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'PEOPLE 250ML', '110.00', 160, '160.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 10, NULL, 'PROD_0053', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:12'),
(54, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'BLUE ICE 250ML', '140.00', 180, '180.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 10, NULL, 'PROD_0054', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:12'),
(55, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'STAR 250ML', '120.00', 160, '160.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 10, NULL, 'PROD_0055', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:12'),
(56, 1, '6', 1, 6, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'VICEROY 250ML', '335.00', 500, '500.00', NULL, NULL, NULL, NULL, 'default.png', 'BRANDY', 20, 0, 5, NULL, 'PROD_0056', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:12'),
(57, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'VICEROY 375ML', '520.00', 700, '700.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 2, NULL, 'PROD_0057', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:12'),
(58, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'KIBAO 250ML', '180.00', 250, '250.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 2, NULL, 'PROD_0058', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:13'),
(59, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'KIBAO 350ML', '255.00', 350, '350.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 2, NULL, 'PROD_0059', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:13'),
(60, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'HALF LOAF 250ML', '100.00', 150, '150.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 20, 0, 10, NULL, 'PROD_0060', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:13'),
(61, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'CASSABUENNA SWEET WHITE 1LT', '475.00', 800, '800.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 20, 0, 1, NULL, 'PROD_0061', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:13'),
(62, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'CAPRICE DRY WHITE 1LT', '555.00', 750, '750.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 20, 0, 1, NULL, 'PROD_0062', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:13'),
(63, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'CAPRICE SWEET RED 1LT', '555.00', 750, '750.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 20, 0, 1, NULL, 'PROD_0063', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:13'),
(64, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'LIME JUICE 1.5LT', '195.00', 230, '230.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 1, NULL, 'PROD_0064', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:13'),
(65, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'RED LABEL 1LT', '1500.00', 2100, '2100.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 1, NULL, 'PROD_0065', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:14'),
(66, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'BLACK LABEL 1LT', '2900.00', 3500, '3500.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 1, NULL, 'PROD_0066', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:14'),
(67, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'JAMESON 1LT', '2200.00', 2950, '2950.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 1, NULL, 'PROD_0067', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:14'),
(68, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'RED LABEL 750ML', '1300.00', 2300, '2300.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 1, NULL, 'PROD_0068', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:14'),
(69, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'RED LABEL 375ML', '780.00', 950, '950.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 1, NULL, 'PROD_0069', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:14'),
(70, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'ALL SEASONS 750ML', '700.00', 800, '800.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 1, NULL, 'PROD_0070', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:14'),
(71, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'JAMESON 350ML', '880.00', 1100, '1100.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 1, NULL, 'PROD_0071', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:14'),
(72, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'JAMESON 750ML', '1580.00', 2500, '2500.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 1, NULL, 'PROD_0072', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:15'),
(73, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'SOUTHERN COMFORT 375ML', '800.00', 1000, '1000.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 1, NULL, 'PROD_0073', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:15'),
(74, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'PILSNER', '140.00', 180, '180.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 20, 0, 5, NULL, 'PROD_0074', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:15'),
(75, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'ATLAS', '180.00', 230, '230.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 20, 0, 5, NULL, 'PROD_0075', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:15'),
(76, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'GUINESS SMOOTH', '165.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 20, 0, 5, NULL, 'PROD_0076', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:15'),
(77, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'GUINESS STOUT', '183.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 20, 0, 5, NULL, 'PROD_0077', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:15'),
(78, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'WHITE CAP', '183.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 20, 0, 5, NULL, 'PROD_0078', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:15'),
(79, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'OJ 16', '190.00', 250, '250.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 20, 0, 5, NULL, 'PROD_0079', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:15'),
(80, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'FAXE', '170.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 20, 0, 5, NULL, 'PROD_0080', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:16'),
(81, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'BLACK ICE', '143.00', 180, '180.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 20, 0, 5, NULL, 'PROD_0081', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:16'),
(82, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'GUARRANA', '143.00', 180, '180.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 20, 0, 5, NULL, 'PROD_0082', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:16'),
(83, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'BLACK LABEL 750ML', '2400.00', 2900, '2900.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 1, NULL, 'PROD_0083', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:16'),
(84, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'BAILEY 750ML', '1730.00', 2350, '2350.00', NULL, NULL, NULL, NULL, 'default.png', 'CREAM', 20, 0, 1, NULL, 'PROD_0084', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:16'),
(85, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, '8PM 750ML', '750.00', 1000, '1000.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 0, NULL, 'PROD_0085', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:16'),
(86, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'WILLIAM LAWSONS 750ML', '1075.00', 1250, '1250.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 0, NULL, 'PROD_0086', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:16'),
(87, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'BEST DRY GIN 750ML', '530.00', 900, '900.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 20, 0, 0, NULL, 'PROD_0087', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:16'),
(88, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'BEST  CREAM 750ML', '820.00', 950, '950.00', NULL, NULL, NULL, NULL, 'default.png', 'CREAM', 20, 0, 0, NULL, 'PROD_0088', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:16'),
(89, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'CHROME GIN 750ML', '485.00', 630, '630.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 20, 0, 0, NULL, 'PROD_0089', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:17'),
(90, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'CHROME VODKA 750ML', '485.00', 630, '630.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 0, NULL, 'PROD_0090', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:17'),
(91, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'IMPERIAL 750 ML', '580.00', 800, '800.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 0, NULL, 'PROD_0091', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:17'),
(92, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'CLUB MAN 750ML', '500.00', 700, '700.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 20, 0, 0, NULL, 'PROD_0092', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:17'),
(93, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'HUNTERS CHOICE 750ML', '665.00', 800, '800.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 0, NULL, 'PROD_0093', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:17'),
(94, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'ROBBERTSON RED 750ML', '680.00', 950, '950.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 0, NULL, 'PROD_0094', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:17'),
(95, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'BLACKBIRD RED 750ML', '650.00', 900, '900.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 20, 0, 0, NULL, 'PROD_0095', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:17'),
(96, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'BLACKBIRD WHITE 750ML', '650.00', 850, '850.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 20, 0, 0, NULL, 'PROD_0096', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:18'),
(97, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'FOUR COUSINS RED SWEET 750ML', '620.00', 850, '850.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 20, 0, 0, NULL, 'PROD_0097', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:18'),
(98, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'FOUR COUSINS WHITE SWEET 750ML', '620.00', 850, '850.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 20, 0, 0, NULL, 'PROD_0098', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:18'),
(99, 1, '9', 1, 9, NULL, NULL, 'null', 1, NULL, 0, 'NA', NULL, '4TH STREET SWEET RED 750ML', '620.00', 850, '850.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 20, 0, 0, NULL, 'PROD_0099', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:18'),
(100, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, '4TH STREET SWEET WHITE 750ML', '620.00', 850, '850.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 20, 0, 0, NULL, 'PROD_0100', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:18'),
(101, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'CELLAR CASK SWEET RED 750ML', '630.00', 900, '900.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 20, 0, 0, NULL, 'PROD_0101', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:18'),
(102, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'CELLAR CASK SWEET WHITE 750ML', '630.00', 900, '900.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 20, 0, 0, NULL, 'PROD_0102', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:18'),
(103, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'SOUTHERN COMFORT 700ML', '1450.00', 1800, '1800.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 0, NULL, 'PROD_0103', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:18'),
(104, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'VICEROY 750ML', '1020.00', 1200, '1200.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 0, NULL, 'PROD_0104', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:18'),
(105, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'MAC MOHAN 750ML', '650.00', 850, '850.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 0, NULL, 'PROD_0105', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:19'),
(106, 1, '6', 1, 6, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'RICHOT 750ML', '1000.00', 1200, '1200.00', NULL, NULL, NULL, NULL, 'default.png', 'BRANDY', 20, 0, 0, NULL, 'PROD_0106', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:19'),
(107, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'CAPTAIN MORGAN 750ML', '720.00', 850, '850.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 0, NULL, 'PROD_0107', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:19'),
(108, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'BLACK AND WHITE 750ML', '880.00', 1100, '1100.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 0, NULL, 'PROD_0108', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:19'),
(109, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'FLIRT VODKA 1LT', '850.00', 1100, '1100.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 0, NULL, 'PROD_0109', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:19'),
(110, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'FLIRT VODKA GREEN APPLE 75OML', '790.00', 950, '950.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 0, NULL, 'PROD_0110', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:19'),
(111, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'SMINORFF VODKA 750 ML', '1000.00', 1200, '1200.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 0, NULL, 'PROD_0111', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:19'),
(112, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'KENYA CANE PINEAPPLE 750ML', '570.00', 700, '700.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 0, NULL, 'PROD_0112', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:19'),
(113, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'KENYA CANE SMOOTH 750ML', '570.00', 700, '700.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 0, NULL, 'PROD_0113', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:20'),
(114, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'KENYA CANE CITRUS 750ML', '570.00', 700, '700.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 0, NULL, 'PROD_0114', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:20'),
(115, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'GORDONS DRY 750ML', '1350.00', 1650, '1650.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 20, 0, 0, NULL, 'PROD_0115', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:20'),
(116, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'GORDONS PINIC 750ML', '1350.00', 1700, '1700.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 0, NULL, 'PROD_0116', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:20'),
(117, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'GILBEYS 750 ML', '1000.00', 1300, '1300.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 20, 0, 0, NULL, 'PROD_0117', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:20'),
(118, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'V&A IMPERIAL CREAM', '600.00', 700, '700.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 20, 0, 0, NULL, 'PROD_0118', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:20'),
(119, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'CRAZY COCK 750ML', '660.00', 850, '850.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 0, NULL, 'PROD_0119', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:20'),
(120, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'GRANTS 750ML', '1120.00', 1300, '1300.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 0, NULL, 'PROD_0120', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:21'),
(121, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'GRANTS 375ML', '650.00', 1200, '1200.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 0, NULL, 'PROD_0121', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:21'),
(122, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'VAT 69 750ML', '1150.00', 1400, '1400.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 0, NULL, 'PROD_0122', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:21'),
(123, 1, '6', 1, 6, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'RICHOT 375ML', '475.00', 550, '550.00', NULL, NULL, NULL, NULL, 'default.png', 'BRANDY', 20, 0, 0, NULL, 'PROD_0123', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:21'),
(124, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'IMPERIAL BLUE 375ML', '315.00', 400, '400.00', NULL, NULL, NULL, NULL, 'default.png', 'CREAM', 20, 0, 0, NULL, 'PROD_0124', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:21'),
(125, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'IMPERIAL 250ML', '200.00', 250, '250.00', NULL, NULL, NULL, NULL, 'default.png', 'CREAM', 20, 0, 0, NULL, 'PROD_0125', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:21'),
(126, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'SMINORFF VODKA 250 ML', '340.00', 450, '450.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 5, NULL, 'PROD_0126', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:21'),
(127, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'SMINORFF VODKA 375 ML', '475.00', 650, '650.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 5, NULL, 'PROD_0127', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:21'),
(128, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'KENYA KING 250ML', '165.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 5, NULL, 'PROD_0128', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:21'),
(129, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'GRANTS 1LT', '1400.00', 1700, '1700.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 20, 0, 0, NULL, 'PROD_0129', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:22'),
(130, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'SWEET BERRY 250ML', '130.00', 170, '170.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 10, NULL, 'PROD_0130', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:22'),
(131, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'KIBAO 750ML', '500.00', 600, '600.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 20, 0, 0, NULL, 'PROD_0131', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:22'),
(132, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'FANTA BLACK CURRENT 350ML', '33.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0132', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:22'),
(133, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'FANTA BLACK CURRENT 500ML', '53.00', 70, '70.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0133', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:22'),
(134, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'FANTA BLACK CURRENT 1.25L', '106.00', 120, '120.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 1, NULL, 'PROD_0134', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:22'),
(135, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'FANTA ORANGE 1.25L', '106.00', 120, '120.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 1, NULL, 'PROD_0135', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:22'),
(136, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'FANTA ORANGE 350ML', '33.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0136', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:23'),
(137, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'MINUTE MAID MANGO 400ML', '58.00', 70, '70.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0137', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:23'),
(138, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'NOVIDA 350ML', '33.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0138', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:23'),
(139, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'COKE 200ML', '15.00', 20, '20.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0139', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:23'),
(140, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'SPRITE 200ML', '15.00', 20, '20.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0140', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:23'),
(141, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'FANTA ORANGE 200ML', '15.00', 20, '20.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0141', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:23'),
(142, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'FANTA BLACKCURRENT 200ML', '15.00', 20, '20.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0142', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:23'),
(143, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, 'NA', NULL, 'MINUTE MAID 350ML', '33.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 20, 0, 5, NULL, 'PROD_0143', 2, 1, 1, 1, 0, NULL, '2022-04-22 12:45:32', '2022-04-10 05:25:23'),
(144, 1, '9', 5, 9, NULL, NULL, NULL, 4, NULL, NULL, 'RVGCIZTOXW', NULL, 'Fish', '1830.00', 0, '2013.00', NULL, NULL, NULL, NULL, 'default.png', 'Recipe', 1, 0, 1, NULL, 'PROD_0144', 2, 1, 1, 1, 0, NULL, '2022-04-26 06:18:12', '2022-04-26 06:18:12'),
(145, 1, '11', 5, 7, NULL, NULL, 'null', 4, NULL, 0, 'NA', NULL, 'nike', '1000.00', 1200, '0.00', NULL, NULL, NULL, NULL, 'default.png', 'black', 1, 30, 10, NULL, 'PROD_0145', 2, 1, 1, 1, 1, NULL, '2022-04-27 08:38:31', '2022-04-27 08:12:42');

--
-- Triggers `items`
--
DELIMITER $$
CREATE TRIGGER `reduce_model_count` AFTER DELETE ON `items` FOR EACH ROW UPDATE brand_models
SET available_qty = available_qty - 1
WHERE brand_model_id = OLD.brand_model_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_model_count` AFTER INSERT ON `items` FOR EACH ROW UPDATE brand_models
SET available_qty = available_qty + 1
WHERE brand_model_id = NEW.brand_model_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `items_store`
--

CREATE TABLE `items_store` (
  `item_store_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `store_id` int(11) NOT NULL DEFAULT 1,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `buying_price` decimal(10,2) NOT NULL,
  `marked_price` double NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `available_qty` int(11) DEFAULT 0,
  `reorder_level` int(11) NOT NULL DEFAULT 1,
  `barcode` varchar(256) DEFAULT NULL,
  `item_status_id` int(11) DEFAULT 2,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` text DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items_store`
--

INSERT INTO `items_store` (`item_store_id`, `org_id`, `store_id`, `item_id`, `item_name`, `buying_price`, `marked_price`, `selling_price`, `availability`, `available_qty`, `reorder_level`, `barcode`, `item_status_id`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 1, 2, 1, 'SNAP', '140.00', 180, '180.00', 1, 0, 1, 'PROD_0001', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(2, 1, 2, 2, 'TUSKER LITE', '183.00', 220, '220.00', 1, -1, 1, 'PROD_0002', 2, 1, NULL, '2022-04-26 14:53:51', '2022-04-10 05:47:07'),
(3, 1, 2, 3, 'TUSKER CIDER', '175.00', 220, '220.00', 1, -2, 1, 'PROD_0003', 2, 1, NULL, '2022-05-04 07:56:36', '2022-04-10 05:47:07'),
(4, 1, 2, 4, 'TUSKER MALT', '183.00', 220, '220.00', 1, -2, 1, 'PROD_0004', 2, 1, NULL, '2022-06-07 11:50:18', '2022-04-10 05:47:07'),
(5, 1, 2, 5, 'TUSKER LAGER', '167.00', 220, '220.00', 1, 0, 1, 'PROD_0005', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(6, 1, 2, 6, 'BALOZI', '166.00', 220, '220.00', 1, 0, 1, 'PROD_0006', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(7, 1, 2, 7, 'TRIPPLE ACE 250ML', '167.00', 200, '200.00', 1, 0, 1, 'PROD_0007', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(8, 1, 2, 8, 'REDBULL', '130.00', 170, '170.00', 1, 0, 1, 'PROD_0008', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(9, 1, 2, 9, 'COKE 2LT', '145.00', 160, '160.00', 1, 0, 1, 'PROD_0009', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(10, 1, 2, 10, 'COKE 1.25ML', '106.00', 120, '120.00', 1, 0, 1, 'PROD_0010', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(11, 1, 2, 11, 'KREST 1.25ML', '106.00', 120, '120.00', 1, 0, 1, 'PROD_0011', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(12, 1, 2, 12, 'SPRITE 500ML', '53.00', 70, '70.00', 1, 0, 1, 'PROD_0012', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(13, 1, 2, 13, 'BRAVADA 300ML', '25.00', 40, '40.00', 1, 0, 1, 'PROD_0013', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(14, 1, 2, 14, 'LIME 300ML', '20.00', 40, '40.00', 1, 0, 1, 'PROD_0014', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(15, 1, 2, 15, 'FANTA PASSION 500ML', '53.00', 70, '70.00', 1, 0, 1, 'PROD_0015', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(16, 1, 2, 16, 'FANTA ORANGE 500ML', '53.00', 70, '70.00', 1, 0, 1, 'PROD_0016', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(17, 1, 2, 17, 'COKE 500ML', '53.00', 70, '70.00', 1, 0, 1, 'PROD_0017', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(18, 1, 2, 18, 'KREST 500ML', '53.00', 70, '70.00', 1, 0, 1, 'PROD_0018', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(19, 1, 2, 19, 'MINUTE MAID APPLE 400ML', '58.00', 70, '70.00', 1, 0, 1, 'PROD_0019', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(20, 1, 2, 20, 'LEMONADE 300ML', '37.00', 50, '50.00', 1, 0, 1, 'PROD_0020', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(21, 1, 2, 21, 'TONIC WATER', '65.00', 100, '100.00', 1, 0, 1, 'PROD_0021', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(22, 1, 2, 22, 'PREDATOR', '41.00', 50, '50.00', 1, 0, 1, 'PROD_0022', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(23, 1, 2, 23, 'POWER PLAY', '50.00', 60, '60.00', 1, 0, 1, 'PROD_0023', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(24, 1, 2, 24, 'SPRITE 2L', '145.00', 160, '160.00', 1, 0, 1, 'PROD_0024', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(25, 1, 2, 25, 'FANTA PASSION 2LT', '145.00', 160, '160.00', 1, 0, 1, 'PROD_0025', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(26, 1, 2, 26, 'MINUTE MAID 1LT', '105.00', 130, '130.00', 1, 0, 1, 'PROD_0026', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(27, 1, 2, 27, 'COKE 350ML', '33.00', 40, '40.00', 1, 0, 1, 'PROD_0027', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(28, 1, 2, 28, 'KREST 350ML', '33.00', 40, '40.00', 1, 0, 1, 'PROD_0028', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(29, 1, 2, 29, 'SPRITE 350ML', '33.00', 40, '40.00', 1, 0, 1, 'PROD_0029', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(30, 1, 2, 30, 'STONEY 350ML', '33.00', 40, '40.00', 1, 0, 1, 'PROD_0030', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(31, 1, 2, 31, 'SAFARI KINGS', '8.60', 10, '10.00', 1, 0, 1, 'PROD_0031', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(32, 1, 2, 32, 'SPORTSMAN', '10.50', 15, '15.00', 1, 0, 1, 'PROD_0032', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(33, 1, 2, 33, 'DUNHILL DOUBLE', '13.05', 20, '20.00', 1, 0, 1, 'PROD_0033', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(34, 1, 2, 34, 'EMBASSY', '12.10', 20, '20.00', 1, 0, 1, 'PROD_0034', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(35, 1, 2, 35, 'KENYA CANE SMOOTH 250ML', '220.00', 250, '250.00', 1, 0, 1, 'PROD_0035', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(36, 1, 2, 36, 'CAPTAIN MORGAN 250ML', '245.00', 300, '300.00', 1, 0, 1, 'PROD_0036', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(37, 1, 2, 37, 'RICHOT 250ML', '340.00', 430, '430.00', 1, 0, 1, 'PROD_0037', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(38, 1, 2, 38, 'GILBEYS 250ML', '340.00', 450, '450.00', 1, 0, 1, 'PROD_0038', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(39, 1, 2, 39, 'GILBEYS 375ML', '475.00', 550, '550.00', 1, 0, 1, 'PROD_0039', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(40, 1, 2, 40, 'KONYAGI 250ML', '195.00', 250, '250.00', 1, 0, 1, 'PROD_0040', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(41, 1, 2, 41, 'KONYAGI 350ML', '375.00', 450, '450.00', 1, 0, 1, 'PROD_0041', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(42, 1, 2, 42, 'KONYAGI 750ML', '520.00', 650, '650.00', 1, 0, 1, 'PROD_0042', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(43, 1, 2, 43, 'CHROME LEMON 250ML', '173.00', 220, '220.00', 1, 0, 1, 'PROD_0043', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(44, 1, 2, 44, 'CHROME CLEAR 250ML', '173.00', 220, '220.00', 1, 0, 1, 'PROD_0044', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(45, 1, 2, 45, 'CHROME GIN 250ML', '173.00', 220, '220.00', 1, 0, 1, 'PROD_0045', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(46, 1, 2, 46, 'CLUB MAN 250ML', '200.00', 250, '250.00', 1, 0, 1, 'PROD_0046', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(47, 1, 2, 47, 'FLIRT VODKA GREEN APPLE 25OML', '235.00', 400, '400.00', 1, 0, 1, 'PROD_0047', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(48, 1, 2, 48, 'BEST CREAM 250ML', '230.00', 400, '400.00', 1, 0, 1, 'PROD_0048', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(49, 1, 2, 49, 'BEST WHISKY 250ML', '230.00', 400, '400.00', 1, 0, 1, 'PROD_0049', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(50, 1, 2, 50, 'ALL SEASONS 375ML', '325.00', 400, '400.00', 1, 0, 1, 'PROD_0050', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(51, 1, 2, 51, 'HUNTERS CHOICE 250ML', '235.00', 300, '300.00', 1, 0, 1, 'PROD_0051', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(52, 1, 2, 52, 'HUNTERS CHOICE 350ML', '360.00', 450, '450.00', 1, 0, 1, 'PROD_0052', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(53, 1, 2, 53, 'PEOPLE 250ML', '110.00', 160, '160.00', 1, 0, 1, 'PROD_0053', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(54, 1, 2, 54, 'BLUE ICE 250ML', '140.00', 180, '180.00', 1, 0, 1, 'PROD_0054', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(55, 1, 2, 55, 'STAR 250ML', '120.00', 160, '160.00', 1, 0, 1, 'PROD_0055', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(56, 1, 2, 56, 'VICEROY 250ML', '335.00', 500, '500.00', 1, 0, 1, 'PROD_0056', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(57, 1, 2, 57, 'VICEROY 375ML', '520.00', 700, '700.00', 1, 0, 1, 'PROD_0057', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(58, 1, 2, 58, 'KIBAO 250ML', '180.00', 250, '250.00', 1, 0, 1, 'PROD_0058', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(59, 1, 2, 59, 'KIBAO 350ML', '255.00', 350, '350.00', 1, 0, 1, 'PROD_0059', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(60, 1, 2, 60, 'HALF LOAF 250ML', '100.00', 150, '150.00', 1, 0, 1, 'PROD_0060', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(61, 1, 2, 61, 'CASSABUENNA SWEET WHITE 1LT', '475.00', 800, '800.00', 1, 0, 1, 'PROD_0061', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(62, 1, 2, 62, 'CAPRICE DRY WHITE 1LT', '555.00', 750, '750.00', 1, 0, 1, 'PROD_0062', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(63, 1, 2, 63, 'CAPRICE SWEET RED 1LT', '555.00', 750, '750.00', 1, 0, 1, 'PROD_0063', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(64, 1, 2, 64, 'LIME JUICE 1.5LT', '195.00', 230, '230.00', 1, 0, 1, 'PROD_0064', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(65, 1, 2, 65, 'RED LABEL 1LT', '1500.00', 2100, '2100.00', 1, 0, 1, 'PROD_0065', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(66, 1, 2, 66, 'BLACK LABEL 1LT', '2900.00', 3500, '3500.00', 1, 0, 1, 'PROD_0066', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(67, 1, 2, 67, 'JAMESON 1LT', '2200.00', 2950, '2950.00', 1, 0, 1, 'PROD_0067', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(68, 1, 2, 68, 'RED LABEL 750ML', '1300.00', 2300, '2300.00', 1, 0, 1, 'PROD_0068', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(69, 1, 2, 69, 'RED LABEL 375ML', '780.00', 950, '950.00', 1, 0, 1, 'PROD_0069', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(70, 1, 2, 70, 'ALL SEASONS 750ML', '700.00', 800, '800.00', 1, 0, 1, 'PROD_0070', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(71, 1, 2, 71, 'JAMESON 350ML', '880.00', 1100, '1100.00', 1, 0, 1, 'PROD_0071', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(72, 1, 2, 72, 'JAMESON 750ML', '1580.00', 2500, '2500.00', 1, 0, 1, 'PROD_0072', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(73, 1, 2, 73, 'SOUTHERN COMFORT 375ML', '800.00', 1000, '1000.00', 1, 0, 1, 'PROD_0073', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(74, 1, 2, 74, 'PILSNER', '140.00', 180, '180.00', 1, 0, 1, 'PROD_0074', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(75, 1, 2, 75, 'ATLAS', '180.00', 230, '230.00', 1, 0, 1, 'PROD_0075', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(76, 1, 2, 76, 'GUINESS SMOOTH', '165.00', 220, '220.00', 1, 0, 1, 'PROD_0076', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(77, 1, 2, 77, 'GUINESS STOUT', '183.00', 220, '220.00', 1, 0, 1, 'PROD_0077', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(78, 1, 2, 78, 'WHITE CAP', '183.00', 220, '220.00', 1, 0, 1, 'PROD_0078', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(79, 1, 2, 79, 'OJ 16', '190.00', 250, '250.00', 1, 0, 1, 'PROD_0079', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(80, 1, 2, 80, 'FAXE', '170.00', 220, '220.00', 1, 0, 1, 'PROD_0080', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(81, 1, 2, 81, 'BLACK ICE', '143.00', 180, '180.00', 1, 0, 1, 'PROD_0081', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(82, 1, 2, 82, 'GUARRANA', '143.00', 180, '180.00', 1, 0, 1, 'PROD_0082', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(83, 1, 2, 83, 'BLACK LABEL 750ML', '2400.00', 2900, '2900.00', 1, 0, 1, 'PROD_0083', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(84, 1, 2, 84, 'BAILEY 750ML', '1730.00', 2350, '2350.00', 1, 0, 1, 'PROD_0084', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(85, 1, 2, 85, '8PM 750ML', '750.00', 1000, '1000.00', 1, 0, 1, 'PROD_0085', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(86, 1, 2, 86, 'WILLIAM LAWSONS 750ML', '1075.00', 1250, '1250.00', 1, 0, 1, 'PROD_0086', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(87, 1, 2, 87, 'BEST DRY GIN 750ML', '530.00', 900, '900.00', 1, 0, 1, 'PROD_0087', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(88, 1, 2, 88, 'BEST  CREAM 750ML', '820.00', 950, '950.00', 1, 0, 1, 'PROD_0088', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(89, 1, 2, 89, 'CHROME GIN 750ML', '485.00', 630, '630.00', 1, 0, 1, 'PROD_0089', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(90, 1, 2, 90, 'CHROME VODKA 750ML', '485.00', 630, '630.00', 1, 0, 1, 'PROD_0090', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(91, 1, 2, 91, 'IMPERIAL 750 ML', '580.00', 800, '800.00', 1, 0, 1, 'PROD_0091', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(92, 1, 2, 92, 'CLUB MAN 750ML', '500.00', 700, '700.00', 1, 0, 1, 'PROD_0092', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(93, 1, 2, 93, 'HUNTERS CHOICE 750ML', '665.00', 800, '800.00', 1, 0, 1, 'PROD_0093', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(94, 1, 2, 94, 'ROBBERTSON RED 750ML', '680.00', 950, '950.00', 1, 0, 1, 'PROD_0094', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(95, 1, 2, 95, 'BLACKBIRD RED 750ML', '650.00', 900, '900.00', 1, 0, 1, 'PROD_0095', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(96, 1, 2, 96, 'BLACKBIRD WHITE 750ML', '650.00', 850, '850.00', 1, 0, 1, 'PROD_0096', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(97, 1, 2, 97, 'FOUR COUSINS RED SWEET 750ML', '620.00', 850, '850.00', 1, 0, 1, 'PROD_0097', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(98, 1, 2, 98, 'FOUR COUSINS WHITE SWEET 750ML', '620.00', 850, '850.00', 1, 0, 1, 'PROD_0098', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(99, 1, 2, 99, '4TH STREET SWEET RED 750ML', '620.00', 850, '850.00', 1, 0, 1, 'PROD_0099', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(100, 1, 2, 100, '4TH STREET SWEET WHITE 750ML', '620.00', 850, '850.00', 1, 0, 1, 'PROD_0100', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(101, 1, 2, 101, 'CELLAR CASK SWEET RED 750ML', '630.00', 900, '900.00', 1, 0, 1, 'PROD_0101', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(102, 1, 2, 102, 'CELLAR CASK SWEET WHITE 750ML', '630.00', 900, '900.00', 1, 0, 1, 'PROD_0102', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(103, 1, 2, 103, 'SOUTHERN COMFORT 700ML', '1450.00', 1800, '1800.00', 1, 0, 1, 'PROD_0103', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(104, 1, 2, 104, 'VICEROY 750ML', '1020.00', 1200, '1200.00', 1, 0, 1, 'PROD_0104', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(105, 1, 2, 105, 'MAC MOHAN 750ML', '650.00', 850, '850.00', 1, 0, 1, 'PROD_0105', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(106, 1, 2, 106, 'RICHOT 750ML', '1000.00', 1200, '1200.00', 1, 0, 1, 'PROD_0106', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(107, 1, 2, 107, 'CAPTAIN MORGAN 750ML', '720.00', 850, '850.00', 1, 0, 1, 'PROD_0107', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(108, 1, 2, 108, 'BLACK AND WHITE 750ML', '880.00', 1100, '1100.00', 1, 0, 1, 'PROD_0108', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(109, 1, 2, 109, 'FLIRT VODKA 1LT', '850.00', 1100, '1100.00', 1, 0, 1, 'PROD_0109', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(110, 1, 2, 110, 'FLIRT VODKA GREEN APPLE 75OML', '790.00', 950, '950.00', 1, 0, 1, 'PROD_0110', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(111, 1, 2, 111, 'SMINORFF VODKA 750 ML', '1000.00', 1200, '1200.00', 1, 0, 1, 'PROD_0111', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(112, 1, 2, 112, 'KENYA CANE PINEAPPLE 750ML', '570.00', 700, '700.00', 1, 0, 1, 'PROD_0112', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(113, 1, 2, 113, 'KENYA CANE SMOOTH 750ML', '570.00', 700, '700.00', 1, 0, 1, 'PROD_0113', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(114, 1, 2, 114, 'KENYA CANE CITRUS 750ML', '570.00', 700, '700.00', 1, 0, 1, 'PROD_0114', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(115, 1, 2, 115, 'GORDONS DRY 750ML', '1350.00', 1650, '1650.00', 1, 0, 1, 'PROD_0115', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(116, 1, 2, 116, 'GORDONS PINIC 750ML', '1350.00', 1700, '1700.00', 1, 0, 1, 'PROD_0116', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(117, 1, 2, 117, 'GILBEYS 750 ML', '1000.00', 1300, '1300.00', 1, 0, 1, 'PROD_0117', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(118, 1, 2, 118, 'V&A IMPERIAL CREAM', '600.00', 700, '700.00', 1, 0, 1, 'PROD_0118', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(119, 1, 2, 119, 'CRAZY COCK 750ML', '660.00', 850, '850.00', 1, 0, 1, 'PROD_0119', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(120, 1, 2, 120, 'GRANTS 750ML', '1120.00', 1300, '1300.00', 1, 0, 1, 'PROD_0120', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(121, 1, 2, 121, 'GRANTS 375ML', '650.00', 1200, '1200.00', 1, 0, 1, 'PROD_0121', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(122, 1, 2, 122, 'VAT 69 750ML', '1150.00', 1400, '1400.00', 1, 0, 1, 'PROD_0122', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(123, 1, 2, 123, 'RICHOT 375ML', '475.00', 550, '550.00', 1, 0, 1, 'PROD_0123', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(124, 1, 2, 124, 'IMPERIAL BLUE 375ML', '315.00', 400, '400.00', 1, 0, 1, 'PROD_0124', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(125, 1, 2, 125, 'IMPERIAL 250ML', '200.00', 250, '250.00', 1, 0, 1, 'PROD_0125', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(126, 1, 2, 126, 'SMINORFF VODKA 250 ML', '340.00', 450, '450.00', 1, 0, 1, 'PROD_0126', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(127, 1, 2, 127, 'SMINORFF VODKA 375 ML', '475.00', 650, '650.00', 1, 0, 1, 'PROD_0127', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(128, 1, 2, 128, 'KENYA KING 250ML', '165.00', 220, '220.00', 1, 0, 1, 'PROD_0128', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(129, 1, 2, 129, 'GRANTS 1LT', '1400.00', 1700, '1700.00', 1, 0, 1, 'PROD_0129', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(130, 1, 2, 130, 'SWEET BERRY 250ML', '130.00', 170, '170.00', 1, 0, 1, 'PROD_0130', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(131, 1, 2, 131, 'KIBAO 750ML', '500.00', 600, '600.00', 1, 0, 1, 'PROD_0131', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(132, 1, 2, 132, 'FANTA BLACK CURRENT 350ML', '33.00', 40, '40.00', 1, 0, 1, 'PROD_0132', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(133, 1, 2, 133, 'FANTA BLACK CURRENT 500ML', '53.00', 70, '70.00', 1, 0, 1, 'PROD_0133', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(134, 1, 2, 134, 'FANTA BLACK CURRENT 1.25L', '106.00', 120, '120.00', 1, 0, 1, 'PROD_0134', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(135, 1, 2, 135, 'FANTA ORANGE 1.25L', '106.00', 120, '120.00', 1, 0, 1, 'PROD_0135', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(136, 1, 2, 136, 'FANTA ORANGE 350ML', '33.00', 40, '40.00', 1, 0, 1, 'PROD_0136', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(137, 1, 2, 137, 'MINUTE MAID MANGO 400ML', '58.00', 70, '70.00', 1, 0, 1, 'PROD_0137', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(138, 1, 2, 138, 'NOVIDA 350ML', '33.00', 40, '40.00', 1, 0, 1, 'PROD_0138', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(139, 1, 2, 139, 'COKE 200ML', '15.00', 20, '20.00', 1, 0, 1, 'PROD_0139', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(140, 1, 2, 140, 'SPRITE 200ML', '15.00', 20, '20.00', 1, 0, 1, 'PROD_0140', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(141, 1, 2, 141, 'FANTA ORANGE 200ML', '15.00', 20, '20.00', 1, 0, 1, 'PROD_0141', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(142, 1, 2, 142, 'FANTA BLACKCURRENT 200ML', '15.00', 20, '20.00', 1, 0, 1, 'PROD_0142', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(143, 1, 2, 143, 'MINUTE MAID 350ML', '33.00', 40, '40.00', 1, 0, 1, 'PROD_0143', 2, 1, NULL, '2022-04-22 12:34:17', '2022-04-10 05:47:07'),
(144, 1, 2, 145, 'nike', '1000.00', 1200, '0.00', 1, 0, 1, 'PROD_0145', 2, 1, NULL, '2022-04-27 09:22:17', '2022-04-27 09:22:17'),
(145, 1, 3, 145, 'nike', '1000.00', 1200, '0.00', 1, 0, 1, 'PROD_0145', 2, 1, NULL, '2022-04-27 09:23:54', '2022-04-27 09:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `items_three`
--

CREATE TABLE `items_three` (
  `item_id` int(11) NOT NULL,
  `brand_id` varchar(50) DEFAULT NULL,
  `brand_model_id` varchar(50) DEFAULT NULL,
  `package_type_id` varchar(50) DEFAULT NULL,
  `tax_type_id` int(11) NOT NULL DEFAULT 4,
  `specify` varchar(30) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `attribute` varchar(50) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `ship_number` varchar(20) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `buying_price` decimal(10,2) NOT NULL,
  `marked_price` double NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `model_year` int(11) DEFAULT NULL,
  `imei_one` varchar(50) DEFAULT NULL,
  `imei_two` varchar(50) DEFAULT NULL,
  `narrative` text DEFAULT NULL,
  `barcode` varchar(256) DEFAULT NULL,
  `reference` text DEFAULT NULL,
  `reorder_level` int(11) DEFAULT NULL,
  `opening_stock` int(11) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_three`
--

INSERT INTO `items_three` (`item_id`, `brand_id`, `brand_model_id`, `package_type_id`, `tax_type_id`, `specify`, `category`, `attribute`, `unit`, `ship_number`, `item_name`, `buying_price`, `marked_price`, `selling_price`, `capacity`, `color`, `model_year`, `imei_one`, `imei_two`, `narrative`, `barcode`, `reference`, `reorder_level`, `opening_stock`, `date_modified`, `time_stamp`) VALUES
(1, 'Coca Cola', NULL, NULL, 3, 'item_import', 'Category A', NULL, 'Crates', NULL, 'Item A', '0.00', 1000, '1200.00', NULL, 'Red', NULL, NULL, NULL, 'Test Narrative', 'U388389', 'J22I141NAM', 5, 10, '2022-04-11 07:51:32', '2021-03-22 15:09:50'),
(2, 'Pepsi', NULL, NULL, 3, 'item_import', 'Category B', NULL, 'Crates', NULL, 'Item B', '0.00', 800, '1000.00', NULL, 'Orange', NULL, NULL, NULL, 'Test Narrative', 'U388390', 'J22I141NAM', 10, 15, '2022-04-11 07:51:32', '2021-03-22 15:09:50'),
(3, 'Menengai', NULL, NULL, 3, 'item_import', 'Category A', NULL, 'Kgs', NULL, 'Item C', '0.00', 1200, '1500.00', NULL, 'White', NULL, NULL, NULL, 'Test Narrative', 'U388391', 'J22I141NAM', 15, 20, '2022-04-11 07:51:32', '2021-03-22 15:09:50'),
(4, 'Brand Y', NULL, NULL, 3, 'item_import', 'Category F', NULL, 'Boxes', NULL, 'Item D', '0.00', 500, '550.00', NULL, 'Black', NULL, NULL, NULL, 'Test Narrative', 'U388392', 'J22I141NAM', 5, 10, '2022-04-11 07:51:32', '2021-03-22 15:09:50'),
(5, '1', NULL, NULL, 3, 'item_import', 'SNAP', NULL, '5', NULL, 'PROD_0001', '180.00', 180, '1.00', NULL, '140', NULL, NULL, NULL, '', 'BEER', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(6, '1', NULL, NULL, 3, 'item_import', 'TUSKER LITE', NULL, '5', NULL, 'PROD_0002', '220.00', 220, '1.00', NULL, '183', NULL, NULL, NULL, '', 'BEER', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(7, '1', NULL, NULL, 3, 'item_import', 'TUSKER CIDER', NULL, '5', NULL, 'PROD_0003', '220.00', 220, '1.00', NULL, '175', NULL, NULL, NULL, '', 'BEER', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(8, '1', NULL, NULL, 3, 'item_import', 'TUSKER MALT', NULL, '5', NULL, 'PROD_0004', '220.00', 220, '1.00', NULL, '183', NULL, NULL, NULL, '', 'BEER', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(9, '1', NULL, NULL, 3, 'item_import', 'TUSKER LAGER', NULL, '5', NULL, 'PROD_0005', '220.00', 220, '1.00', NULL, '167', NULL, NULL, NULL, '', 'BEER', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(10, '1', NULL, NULL, 3, 'item_import', 'BALOZI', NULL, '5', NULL, 'PROD_0006', '220.00', 220, '1.00', NULL, '166', NULL, NULL, NULL, '', 'BEER', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(11, '2', NULL, NULL, 3, 'item_import', 'TRIPPLE ACE 250ML', NULL, '10', NULL, 'PROD_0007', '200.00', 200, '1.00', NULL, '167', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(12, '3', NULL, NULL, 3, 'item_import', 'REDBULL', NULL, '2', NULL, 'PROD_0008', '170.00', 170, '1.00', NULL, '130', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(13, '3', NULL, NULL, 3, 'item_import', 'COKE 2LT', NULL, '1', NULL, 'PROD_0009', '160.00', 160, '1.00', NULL, '145', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(14, '3', NULL, NULL, 3, 'item_import', 'COKE 1.25ML', NULL, '1', NULL, 'PROD_0010', '120.00', 120, '1.00', NULL, '106', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(15, '3', NULL, NULL, 3, 'item_import', 'KREST 1.25ML', NULL, '1', NULL, 'PROD_0011', '120.00', 120, '1.00', NULL, '106', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(16, '3', NULL, NULL, 3, 'item_import', 'SPRITE 500ML', NULL, '5', NULL, 'PROD_0012', '70.00', 70, '1.00', NULL, '53', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(17, '3', NULL, NULL, 3, 'item_import', 'BRAVADA 300ML', NULL, '5', NULL, 'PROD_0013', '40.00', 40, '1.00', NULL, '25', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(18, '3', NULL, NULL, 3, 'item_import', 'LIME 300ML', NULL, '5', NULL, 'PROD_0014', '40.00', 40, '1.00', NULL, '20', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(19, '3', NULL, NULL, 3, 'item_import', 'FANTA PASSION 500ML', NULL, '5', NULL, 'PROD_0015', '70.00', 70, '1.00', NULL, '53', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(20, '3', NULL, NULL, 3, 'item_import', 'FANTA ORANGE 500ML', NULL, '5', NULL, 'PROD_0016', '70.00', 70, '1.00', NULL, '53', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(21, '3', NULL, NULL, 3, 'item_import', 'COKE 500ML', NULL, '5', NULL, 'PROD_0017', '70.00', 70, '1.00', NULL, '53', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(22, '3', NULL, NULL, 3, 'item_import', 'KREST 500ML', NULL, '5', NULL, 'PROD_0018', '70.00', 70, '1.00', NULL, '53', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(23, '3', NULL, NULL, 3, 'item_import', 'MINUTE MAID APPLE 400ML', NULL, '5', NULL, 'PROD_0019', '70.00', 70, '1.00', NULL, '58', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(24, '3', NULL, NULL, 3, 'item_import', 'LEMONADE 300ML', NULL, '5', NULL, 'PROD_0020', '50.00', 50, '1.00', NULL, '37', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(25, '3', NULL, NULL, 3, 'item_import', 'TONIC WATER', NULL, '5', NULL, 'PROD_0021', '100.00', 100, '1.00', NULL, '65', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(26, '3', NULL, NULL, 3, 'item_import', 'PREDATOR', NULL, '5', NULL, 'PROD_0022', '50.00', 50, '1.00', NULL, '41', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(27, '3', NULL, NULL, 3, 'item_import', 'POWER PLAY', NULL, '5', NULL, 'PROD_0023', '60.00', 60, '1.00', NULL, '50', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(28, '3', NULL, NULL, 3, 'item_import', 'SPRITE 2L', NULL, '1', NULL, 'PROD_0024', '160.00', 160, '1.00', NULL, '145', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(29, '3', NULL, NULL, 3, 'item_import', 'FANTA PASSION 2LT', NULL, '1', NULL, 'PROD_0025', '160.00', 160, '1.00', NULL, '145', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(30, '3', NULL, NULL, 3, 'item_import', 'MINUTE MAID 1LT', NULL, '1', NULL, 'PROD_0026', '130.00', 130, '1.00', NULL, '105', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(31, '3', NULL, NULL, 3, 'item_import', 'COKE 350ML', NULL, '5', NULL, 'PROD_0027', '40.00', 40, '1.00', NULL, '33', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(32, '3', NULL, NULL, 3, 'item_import', 'KREST 350ML', NULL, '5', NULL, 'PROD_0028', '40.00', 40, '1.00', NULL, '33', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(33, '3', NULL, NULL, 3, 'item_import', 'SPRITE 350ML', NULL, '5', NULL, 'PROD_0029', '40.00', 40, '1.00', NULL, '33', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(34, '3', NULL, NULL, 3, 'item_import', 'STONEY 350ML', NULL, '5', NULL, 'PROD_0030', '40.00', 40, '1.00', NULL, '33', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(35, '4', NULL, NULL, 3, 'item_import', 'SAFARI KINGS', NULL, '20', NULL, 'PROD_0031', '10.00', 10, '1.00', NULL, '8.6', NULL, NULL, NULL, '', 'CIGARETTES', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(36, '4', NULL, NULL, 3, 'item_import', 'SPORTSMAN', NULL, '10', NULL, 'PROD_0032', '15.00', 15, '1.00', NULL, '10.5', NULL, NULL, NULL, '', 'CIGARETTES', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(37, '4', NULL, NULL, 3, 'item_import', 'DUNHILL DOUBLE', NULL, '10', NULL, 'PROD_0033', '20.00', 20, '1.00', NULL, '13.05', NULL, NULL, NULL, '', 'CIGARETTES', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(38, '4', NULL, NULL, 3, 'item_import', 'EMBASSY', NULL, '10', NULL, 'PROD_0034', '20.00', 20, '1.00', NULL, '12.1', NULL, NULL, NULL, '', 'CIGARETTES', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(39, '5', NULL, NULL, 3, 'item_import', 'KENYA CANE SMOOTH 250ML', NULL, '2', NULL, 'PROD_0035', '250.00', 250, '1.00', NULL, '220', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(40, '6', NULL, NULL, 3, 'item_import', 'CAPTAIN MORGAN 250ML', NULL, '2', NULL, 'PROD_0036', '300.00', 300, '1.00', NULL, '245', NULL, NULL, NULL, '', 'BRANDY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(41, '7', NULL, NULL, 3, 'item_import', 'RICHOT 250ML', NULL, '2', NULL, 'PROD_0037', '430.00', 430, '1.00', NULL, '340', NULL, NULL, NULL, '', 'GIN', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(42, '7', NULL, NULL, 3, 'item_import', 'GILBEYS 250ML', NULL, '2', NULL, 'PROD_0038', '450.00', 450, '1.00', NULL, '340', NULL, NULL, NULL, '', 'GIN', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(43, '7', NULL, NULL, 3, 'item_import', 'GILBEYS 375ML', NULL, '2', NULL, 'PROD_0039', '550.00', 550, '1.00', NULL, '475', NULL, NULL, NULL, '', 'GIN', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(44, '7', NULL, NULL, 3, 'item_import', 'KONYAGI 250ML', NULL, '2', NULL, 'PROD_0040', '250.00', 250, '1.00', NULL, '195', NULL, NULL, NULL, '', 'GIN', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(45, '7', NULL, NULL, 3, 'item_import', 'KONYAGI 350ML', NULL, '2', NULL, 'PROD_0041', '450.00', 450, '1.00', NULL, '375', NULL, NULL, NULL, '', 'GIN', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(46, '7', NULL, NULL, 3, 'item_import', 'KONYAGI 750ML', NULL, '2', NULL, 'PROD_0042', '650.00', 650, '1.00', NULL, '520', NULL, NULL, NULL, '', 'GIN', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(47, '2', NULL, NULL, 3, 'item_import', 'CHROME LEMON 250ML', NULL, '5', NULL, 'PROD_0043', '220.00', 220, '1.00', NULL, '173', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(48, '2', NULL, NULL, 3, 'item_import', 'CHROME CLEAR 250ML', NULL, '5', NULL, 'PROD_0044', '220.00', 220, '1.00', NULL, '173', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(49, '2', NULL, NULL, 3, 'item_import', 'CHROME GIN 250ML', NULL, '5', NULL, 'PROD_0045', '220.00', 220, '1.00', NULL, '173', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(50, '7', NULL, NULL, 3, 'item_import', 'CLUB MAN 250ML', NULL, '5', NULL, 'PROD_0046', '250.00', 250, '1.00', NULL, '200', NULL, NULL, NULL, '', 'GIN', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(51, '2', NULL, NULL, 3, 'item_import', 'FLIRT VODKA GREEN APPLE 25OML', NULL, '2', NULL, 'PROD_0047', '400.00', 400, '1.00', NULL, '235', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(52, '8', NULL, NULL, 3, 'item_import', 'BEST CREAM 250ML', NULL, '2', NULL, 'PROD_0048', '400.00', 400, '1.00', NULL, '230', NULL, NULL, NULL, '', 'CREAM', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(53, '5', NULL, NULL, 3, 'item_import', 'BEST WHISKY 250ML', NULL, '2', NULL, 'PROD_0049', '400.00', 400, '1.00', NULL, '230', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(54, '5', NULL, NULL, 3, 'item_import', 'ALL SEASONS 375ML', NULL, '2', NULL, 'PROD_0050', '400.00', 400, '1.00', NULL, '325', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(55, '5', NULL, NULL, 3, 'item_import', 'HUNTERS CHOICE 250ML', NULL, '2', NULL, 'PROD_0051', '300.00', 300, '1.00', NULL, '235', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(56, '5', NULL, NULL, 3, 'item_import', 'HUNTERS CHOICE 350ML', NULL, '2', NULL, 'PROD_0052', '450.00', 450, '1.00', NULL, '360', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(57, '5', NULL, NULL, 3, 'item_import', 'PEOPLE 250ML', NULL, '10', NULL, 'PROD_0053', '160.00', 160, '1.00', NULL, '110', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(58, '2', NULL, NULL, 3, 'item_import', 'BLUE ICE 250ML', NULL, '10', NULL, 'PROD_0054', '180.00', 180, '1.00', NULL, '140', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(59, '2', NULL, NULL, 3, 'item_import', 'STAR 250ML', NULL, '10', NULL, 'PROD_0055', '160.00', 160, '1.00', NULL, '120', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(60, '6', NULL, NULL, 3, 'item_import', 'VICEROY 250ML', NULL, '5', NULL, 'PROD_0056', '500.00', 500, '1.00', NULL, '335', NULL, NULL, NULL, '', 'BRANDY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(61, '2', NULL, NULL, 3, 'item_import', 'VICEROY 375ML', NULL, '2', NULL, 'PROD_0057', '700.00', 700, '1.00', NULL, '520', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(62, '2', NULL, NULL, 3, 'item_import', 'KIBAO 250ML', NULL, '2', NULL, 'PROD_0058', '250.00', 250, '1.00', NULL, '180', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(63, '2', NULL, NULL, 3, 'item_import', 'KIBAO 350ML', NULL, '2', NULL, 'PROD_0059', '350.00', 350, '1.00', NULL, '255', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(64, '9', NULL, NULL, 3, 'item_import', 'HALF LOAF 250ML', NULL, '10', NULL, 'PROD_0060', '150.00', 150, '1.00', NULL, '100', NULL, NULL, NULL, '', 'WINES', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(65, '9', NULL, NULL, 3, 'item_import', 'CASSABUENNA SWEET WHITE 1LT', NULL, '1', NULL, 'PROD_0061', '800.00', 800, '1.00', NULL, '475', NULL, NULL, NULL, '', 'WINES', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(66, '9', NULL, NULL, 3, 'item_import', 'CAPRICE DRY WHITE 1LT', NULL, '1', NULL, 'PROD_0062', '750.00', 750, '1.00', NULL, '555', NULL, NULL, NULL, '', 'WINES', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(67, '9', NULL, NULL, 3, 'item_import', 'CAPRICE SWEET RED 1LT', NULL, '1', NULL, 'PROD_0063', '750.00', 750, '1.00', NULL, '555', NULL, NULL, NULL, '', 'WINES', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(68, '3', NULL, NULL, 3, 'item_import', 'LIME JUICE 1.5LT', NULL, '1', NULL, 'PROD_0064', '230.00', 230, '1.00', NULL, '195', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(69, '5', NULL, NULL, 3, 'item_import', 'RED LABEL 1LT', NULL, '1', NULL, 'PROD_0065', '2100.00', 2100, '1.00', NULL, '1500', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(70, '5', NULL, NULL, 3, 'item_import', 'BLACK LABEL 1LT', NULL, '1', NULL, 'PROD_0066', '3500.00', 3500, '1.00', NULL, '2900', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(71, '5', NULL, NULL, 3, 'item_import', 'JAMESON 1LT', NULL, '1', NULL, 'PROD_0067', '2950.00', 2950, '1.00', NULL, '2200', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(72, '5', NULL, NULL, 3, 'item_import', 'RED LABEL 750ML', NULL, '1', NULL, 'PROD_0068', '2300.00', 2300, '1.00', NULL, '1300', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(73, '5', NULL, NULL, 3, 'item_import', 'RED LABEL 375ML', NULL, '1', NULL, 'PROD_0069', '950.00', 950, '1.00', NULL, '780', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(74, '5', NULL, NULL, 3, 'item_import', 'ALL SEASONS 750ML', NULL, '1', NULL, 'PROD_0070', '800.00', 800, '1.00', NULL, '700', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(75, '5', NULL, NULL, 3, 'item_import', 'JAMESON 350ML', NULL, '1', NULL, 'PROD_0071', '1100.00', 1100, '1.00', NULL, '880', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(76, '5', NULL, NULL, 3, 'item_import', 'JAMESON 750ML', NULL, '1', NULL, 'PROD_0072', '2500.00', 2500, '1.00', NULL, '1580', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(77, '5', NULL, NULL, 3, 'item_import', 'SOUTHERN COMFORT 375ML', NULL, '1', NULL, 'PROD_0073', '1000.00', 1000, '1.00', NULL, '800', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(78, '1', NULL, NULL, 3, 'item_import', 'PILSNER', NULL, '5', NULL, 'PROD_0074', '180.00', 180, '1.00', NULL, '140', NULL, NULL, NULL, '', 'BEER', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(79, '1', NULL, NULL, 3, 'item_import', 'ATLAS', NULL, '5', NULL, 'PROD_0075', '230.00', 230, '1.00', NULL, '180', NULL, NULL, NULL, '', 'BEER', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(80, '1', NULL, NULL, 3, 'item_import', 'GUINESS SMOOTH', NULL, '5', NULL, 'PROD_0076', '220.00', 220, '1.00', NULL, '165', NULL, NULL, NULL, '', 'BEER', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(81, '1', NULL, NULL, 3, 'item_import', 'GUINESS STOUT', NULL, '5', NULL, 'PROD_0077', '220.00', 220, '1.00', NULL, '183', NULL, NULL, NULL, '', 'BEER', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(82, '1', NULL, NULL, 3, 'item_import', 'WHITE CAP', NULL, '5', NULL, 'PROD_0078', '220.00', 220, '1.00', NULL, '183', NULL, NULL, NULL, '', 'BEER', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(83, '1', NULL, NULL, 3, 'item_import', 'OJ 16', NULL, '5', NULL, 'PROD_0079', '250.00', 250, '1.00', NULL, '190', NULL, NULL, NULL, '', 'BEER', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(84, '1', NULL, NULL, 3, 'item_import', 'FAXE', NULL, '5', NULL, 'PROD_0080', '220.00', 220, '1.00', NULL, '170', NULL, NULL, NULL, '', 'BEER', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(85, '1', NULL, NULL, 3, 'item_import', 'BLACK ICE', NULL, '5', NULL, 'PROD_0081', '180.00', 180, '1.00', NULL, '143', NULL, NULL, NULL, '', 'BEER', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(86, '1', NULL, NULL, 3, 'item_import', 'GUARRANA', NULL, '5', NULL, 'PROD_0082', '180.00', 180, '1.00', NULL, '143', NULL, NULL, NULL, '', 'BEER', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(87, '5', NULL, NULL, 3, 'item_import', 'BLACK LABEL 750ML', NULL, '1', NULL, 'PROD_0083', '2900.00', 2900, '1.00', NULL, '2400', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(88, '8', NULL, NULL, 3, 'item_import', 'BAILEY 750ML', NULL, '1', NULL, 'PROD_0084', '2350.00', 2350, '1.00', NULL, '1730', NULL, NULL, NULL, '', 'CREAM', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(89, '5', NULL, NULL, 3, 'item_import', '8PM 750ML', NULL, '0', NULL, 'PROD_0085', '1000.00', 1000, '1.00', NULL, '750', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(90, '5', NULL, NULL, 3, 'item_import', 'WILLIAM LAWSONS 750ML', NULL, '0', NULL, 'PROD_0086', '1250.00', 1250, '1.00', NULL, '1075', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(91, '7', NULL, NULL, 3, 'item_import', 'BEST DRY GIN 750ML', NULL, '0', NULL, 'PROD_0087', '900.00', 900, '1.00', NULL, '530', NULL, NULL, NULL, '', 'GIN', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(92, '8', NULL, NULL, 3, 'item_import', 'BEST  CREAM 750ML', NULL, '0', NULL, 'PROD_0088', '950.00', 950, '1.00', NULL, '820', NULL, NULL, NULL, '', 'CREAM', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(93, '7', NULL, NULL, 3, 'item_import', 'CHROME GIN 750ML', NULL, '0', NULL, 'PROD_0089', '630.00', 630, '1.00', NULL, '485', NULL, NULL, NULL, '', 'GIN', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(94, '2', NULL, NULL, 3, 'item_import', 'CHROME VODKA 750ML', NULL, '0', NULL, 'PROD_0090', '630.00', 630, '1.00', NULL, '485', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(95, '5', NULL, NULL, 3, 'item_import', 'IMPERIAL 750 ML', NULL, '0', NULL, 'PROD_0091', '800.00', 800, '1.00', NULL, '580', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(96, '7', NULL, NULL, 3, 'item_import', 'CLUB MAN 750ML', NULL, '0', NULL, 'PROD_0092', '700.00', 700, '1.00', NULL, '500', NULL, NULL, NULL, '', 'GIN', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(97, '5', NULL, NULL, 3, 'item_import', 'HUNTERS CHOICE 750ML', NULL, '0', NULL, 'PROD_0093', '800.00', 800, '1.00', NULL, '665', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(98, '2', NULL, NULL, 3, 'item_import', 'ROBBERTSON RED 750ML', NULL, '0', NULL, 'PROD_0094', '950.00', 950, '1.00', NULL, '680', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(99, '7', NULL, NULL, 3, 'item_import', 'BLACKBIRD RED 750ML', NULL, '0', NULL, 'PROD_0095', '900.00', 900, '1.00', NULL, '650', NULL, NULL, NULL, '', 'GIN', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(100, '7', NULL, NULL, 3, 'item_import', 'BLACKBIRD WHITE 750ML', NULL, '0', NULL, 'PROD_0096', '850.00', 850, '1.00', NULL, '650', NULL, NULL, NULL, '', 'GIN', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(101, '9', NULL, NULL, 3, 'item_import', 'FOUR COUSINS RED SWEET 750ML', NULL, '0', NULL, 'PROD_0097', '850.00', 850, '1.00', NULL, '620', NULL, NULL, NULL, '', 'WINES', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(102, '9', NULL, NULL, 3, 'item_import', 'FOUR COUSINS WHITE SWEET 750ML', NULL, '0', NULL, 'PROD_0098', '850.00', 850, '1.00', NULL, '620', NULL, NULL, NULL, '', 'WINES', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(103, '9', NULL, NULL, 3, 'item_import', '4TH STREET SWEET RED 750ML', NULL, '0', NULL, 'PROD_0099', '850.00', 850, '1.00', NULL, '620', NULL, NULL, NULL, '', 'WINES', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(104, '9', NULL, NULL, 3, 'item_import', '4TH STREET SWEET WHITE 750ML', NULL, '0', NULL, 'PROD_0100', '850.00', 850, '1.00', NULL, '620', NULL, NULL, NULL, '', 'WINES', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(105, '9', NULL, NULL, 3, 'item_import', 'CELLAR CASK SWEET RED 750ML', NULL, '0', NULL, 'PROD_0101', '900.00', 900, '1.00', NULL, '630', NULL, NULL, NULL, '', 'WINES', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(106, '9', NULL, NULL, 3, 'item_import', 'CELLAR CASK SWEET WHITE 750ML', NULL, '0', NULL, 'PROD_0102', '900.00', 900, '1.00', NULL, '630', NULL, NULL, NULL, '', 'WINES', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(107, '5', NULL, NULL, 3, 'item_import', 'SOUTHERN COMFORT 700ML', NULL, '0', NULL, 'PROD_0103', '1800.00', 1800, '1.00', NULL, '1450', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(108, '5', NULL, NULL, 3, 'item_import', 'VICEROY 750ML', NULL, '0', NULL, 'PROD_0104', '1200.00', 1200, '1.00', NULL, '1020', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(109, '5', NULL, NULL, 3, 'item_import', 'MAC MOHAN 750ML', NULL, '0', NULL, 'PROD_0105', '850.00', 850, '1.00', NULL, '650', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(110, '6', NULL, NULL, 3, 'item_import', 'RICHOT 750ML', NULL, '0', NULL, 'PROD_0106', '1200.00', 1200, '1.00', NULL, '1000', NULL, NULL, NULL, '', 'BRANDY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(111, '5', NULL, NULL, 3, 'item_import', 'CAPTAIN MORGAN 750ML', NULL, '0', NULL, 'PROD_0107', '850.00', 850, '1.00', NULL, '720', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(112, '5', NULL, NULL, 3, 'item_import', 'BLACK AND WHITE 750ML', NULL, '0', NULL, 'PROD_0108', '1100.00', 1100, '1.00', NULL, '880', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(113, '2', NULL, NULL, 3, 'item_import', 'FLIRT VODKA 1LT', NULL, '0', NULL, 'PROD_0109', '1100.00', 1100, '1.00', NULL, '850', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(114, '2', NULL, NULL, 3, 'item_import', 'FLIRT VODKA GREEN APPLE 75OML', NULL, '0', NULL, 'PROD_0110', '950.00', 950, '1.00', NULL, '790', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(115, '2', NULL, NULL, 3, 'item_import', 'SMINORFF VODKA 750 ML', NULL, '0', NULL, 'PROD_0111', '1200.00', 1200, '1.00', NULL, '1000', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(116, '2', NULL, NULL, 3, 'item_import', 'KENYA CANE PINEAPPLE 750ML', NULL, '0', NULL, 'PROD_0112', '700.00', 700, '1.00', NULL, '570', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(117, '2', NULL, NULL, 3, 'item_import', 'KENYA CANE SMOOTH 750ML', NULL, '0', NULL, 'PROD_0113', '700.00', 700, '1.00', NULL, '570', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(118, '2', NULL, NULL, 3, 'item_import', 'KENYA CANE CITRUS 750ML', NULL, '0', NULL, 'PROD_0114', '700.00', 700, '1.00', NULL, '570', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(119, '7', NULL, NULL, 3, 'item_import', 'GORDONS DRY 750ML', NULL, '0', NULL, 'PROD_0115', '1650.00', 1650, '1.00', NULL, '1350', NULL, NULL, NULL, '', 'GIN', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(120, '5', NULL, NULL, 3, 'item_import', 'GORDONS PINIC 750ML', NULL, '0', NULL, 'PROD_0116', '1700.00', 1700, '1.00', NULL, '1350', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(121, '7', NULL, NULL, 3, 'item_import', 'GILBEYS 750 ML', NULL, '0', NULL, 'PROD_0117', '1300.00', 1300, '1.00', NULL, '1000', NULL, NULL, NULL, '', 'GIN', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(122, '9', NULL, NULL, 3, 'item_import', 'V&A IMPERIAL CREAM', NULL, '0', NULL, 'PROD_0118', '700.00', 700, '1.00', NULL, '600', NULL, NULL, NULL, '', 'WINES', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(123, '5', NULL, NULL, 3, 'item_import', 'CRAZY COCK 750ML', NULL, '0', NULL, 'PROD_0119', '850.00', 850, '1.00', NULL, '660', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(124, '5', NULL, NULL, 3, 'item_import', 'GRANTS 750ML', NULL, '0', NULL, 'PROD_0120', '1300.00', 1300, '1.00', NULL, '1120', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(125, '5', NULL, NULL, 3, 'item_import', 'GRANTS 375ML', NULL, '0', NULL, 'PROD_0121', '1200.00', 1200, '1.00', NULL, '650', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(126, '5', NULL, NULL, 3, 'item_import', 'VAT 69 750ML', NULL, '0', NULL, 'PROD_0122', '1400.00', 1400, '1.00', NULL, '1150', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(127, '6', NULL, NULL, 3, 'item_import', 'RICHOT 375ML', NULL, '0', NULL, 'PROD_0123', '550.00', 550, '1.00', NULL, '475', NULL, NULL, NULL, '', 'BRANDY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(128, '8', NULL, NULL, 3, 'item_import', 'IMPERIAL BLUE 375ML', NULL, '0', NULL, 'PROD_0124', '400.00', 400, '1.00', NULL, '315', NULL, NULL, NULL, '', 'CREAM', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(129, '8', NULL, NULL, 3, 'item_import', 'IMPERIAL 250ML', NULL, '0', NULL, 'PROD_0125', '250.00', 250, '1.00', NULL, '200', NULL, NULL, NULL, '', 'CREAM', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(130, '2', NULL, NULL, 3, 'item_import', 'SMINORFF VODKA 250 ML', NULL, '5', NULL, 'PROD_0126', '450.00', 450, '1.00', NULL, '340', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(131, '2', NULL, NULL, 3, 'item_import', 'SMINORFF VODKA 375 ML', NULL, '5', NULL, 'PROD_0127', '650.00', 650, '1.00', NULL, '475', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(132, '2', NULL, NULL, 3, 'item_import', 'KENYA KING 250ML', NULL, '5', NULL, 'PROD_0128', '220.00', 220, '1.00', NULL, '165', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(133, '5', NULL, NULL, 3, 'item_import', 'GRANTS 1LT', NULL, '0', NULL, 'PROD_0129', '1700.00', 1700, '1.00', NULL, '1400', NULL, NULL, NULL, '', 'WHISKEY', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(134, '2', NULL, NULL, 3, 'item_import', 'SWEET BERRY 250ML', NULL, '10', NULL, 'PROD_0130', '170.00', 170, '1.00', NULL, '130', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(135, '2', NULL, NULL, 3, 'item_import', 'KIBAO 750ML', NULL, '0', NULL, 'PROD_0131', '600.00', 600, '1.00', NULL, '500', NULL, NULL, NULL, '', 'VODKA', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(136, '8', NULL, NULL, 3, 'item_import', 'FANTA BLACK CURRENT 350ML', NULL, '5', NULL, 'PROD_0132', '40.00', 40, '1.00', NULL, '33', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(137, '8', NULL, NULL, 3, 'item_import', 'FANTA BLACK CURRENT 500ML', NULL, '5', NULL, 'PROD_0133', '70.00', 70, '1.00', NULL, '53', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(138, '8', NULL, NULL, 3, 'item_import', 'FANTA BLACK CURRENT 1.25L', NULL, '1', NULL, 'PROD_0134', '120.00', 120, '1.00', NULL, '106', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(139, '8', NULL, NULL, 3, 'item_import', 'FANTA ORANGE 1.25L', NULL, '1', NULL, 'PROD_0135', '120.00', 120, '1.00', NULL, '106', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(140, '8', NULL, NULL, 3, 'item_import', 'FANTA ORANGE 350ML', NULL, '5', NULL, 'PROD_0136', '40.00', 40, '1.00', NULL, '33', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(141, '8', NULL, NULL, 3, 'item_import', 'MINUTE MAID MANGO 400ML', NULL, '5', NULL, 'PROD_0137', '70.00', 70, '1.00', NULL, '58', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(142, '8', NULL, NULL, 3, 'item_import', 'NOVIDA 350ML', NULL, '5', NULL, 'PROD_0138', '40.00', 40, '1.00', NULL, '33', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(143, '8', NULL, NULL, 3, 'item_import', 'COKE 200ML', NULL, '5', NULL, 'PROD_0139', '20.00', 20, '1.00', NULL, '15', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(144, '8', NULL, NULL, 3, 'item_import', 'SPRITE 200ML', NULL, '5', NULL, 'PROD_0140', '20.00', 20, '1.00', NULL, '15', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(145, '8', NULL, NULL, 3, 'item_import', 'FANTA ORANGE 200ML', NULL, '5', NULL, 'PROD_0141', '20.00', 20, '1.00', NULL, '15', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(146, '8', NULL, NULL, 3, 'item_import', 'FANTA BLACKCURRENT 200ML', NULL, '5', NULL, 'PROD_0142', '20.00', 20, '1.00', NULL, '15', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(147, '8', NULL, NULL, 3, 'item_import', 'MINUTE MAID 350ML', NULL, '5', NULL, 'PROD_0143', '40.00', 40, '1.00', NULL, '33', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IO5C7PD', 0, 0, '2022-04-14 09:13:35', '2022-04-14 09:13:35'),
(148, '1', NULL, NULL, 3, 'item_import', 'SNAP', NULL, '5', NULL, 'PROD_0001', '180.00', 180, '1.00', NULL, '140', NULL, NULL, NULL, '', 'BEER', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(149, '1', NULL, NULL, 3, 'item_import', 'TUSKER LITE', NULL, '5', NULL, 'PROD_0002', '220.00', 220, '1.00', NULL, '183', NULL, NULL, NULL, '', 'BEER', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(150, '1', NULL, NULL, 3, 'item_import', 'TUSKER CIDER', NULL, '5', NULL, 'PROD_0003', '220.00', 220, '1.00', NULL, '175', NULL, NULL, NULL, '', 'BEER', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(151, '1', NULL, NULL, 3, 'item_import', 'TUSKER MALT', NULL, '5', NULL, 'PROD_0004', '220.00', 220, '1.00', NULL, '183', NULL, NULL, NULL, '', 'BEER', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(152, '1', NULL, NULL, 3, 'item_import', 'TUSKER LAGER', NULL, '5', NULL, 'PROD_0005', '220.00', 220, '1.00', NULL, '167', NULL, NULL, NULL, '', 'BEER', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(153, '1', NULL, NULL, 3, 'item_import', 'BALOZI', NULL, '5', NULL, 'PROD_0006', '220.00', 220, '1.00', NULL, '166', NULL, NULL, NULL, '', 'BEER', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(154, '2', NULL, NULL, 3, 'item_import', 'TRIPPLE ACE 250ML', NULL, '10', NULL, 'PROD_0007', '200.00', 200, '1.00', NULL, '167', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(155, '3', NULL, NULL, 3, 'item_import', 'REDBULL', NULL, '2', NULL, 'PROD_0008', '170.00', 170, '1.00', NULL, '130', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(156, '3', NULL, NULL, 3, 'item_import', 'COKE 2LT', NULL, '1', NULL, 'PROD_0009', '160.00', 160, '1.00', NULL, '145', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(157, '3', NULL, NULL, 3, 'item_import', 'COKE 1.25ML', NULL, '1', NULL, 'PROD_0010', '120.00', 120, '1.00', NULL, '106', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(158, '3', NULL, NULL, 3, 'item_import', 'KREST 1.25ML', NULL, '1', NULL, 'PROD_0011', '120.00', 120, '1.00', NULL, '106', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(159, '3', NULL, NULL, 3, 'item_import', 'SPRITE 500ML', NULL, '5', NULL, 'PROD_0012', '70.00', 70, '1.00', NULL, '53', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(160, '3', NULL, NULL, 3, 'item_import', 'BRAVADA 300ML', NULL, '5', NULL, 'PROD_0013', '40.00', 40, '1.00', NULL, '25', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(161, '3', NULL, NULL, 3, 'item_import', 'LIME 300ML', NULL, '5', NULL, 'PROD_0014', '40.00', 40, '1.00', NULL, '20', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(162, '3', NULL, NULL, 3, 'item_import', 'FANTA PASSION 500ML', NULL, '5', NULL, 'PROD_0015', '70.00', 70, '1.00', NULL, '53', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(163, '3', NULL, NULL, 3, 'item_import', 'FANTA ORANGE 500ML', NULL, '5', NULL, 'PROD_0016', '70.00', 70, '1.00', NULL, '53', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(164, '3', NULL, NULL, 3, 'item_import', 'COKE 500ML', NULL, '5', NULL, 'PROD_0017', '70.00', 70, '1.00', NULL, '53', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(165, '3', NULL, NULL, 3, 'item_import', 'KREST 500ML', NULL, '5', NULL, 'PROD_0018', '70.00', 70, '1.00', NULL, '53', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(166, '3', NULL, NULL, 3, 'item_import', 'MINUTE MAID APPLE 400ML', NULL, '5', NULL, 'PROD_0019', '70.00', 70, '1.00', NULL, '58', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(167, '3', NULL, NULL, 3, 'item_import', 'LEMONADE 300ML', NULL, '5', NULL, 'PROD_0020', '50.00', 50, '1.00', NULL, '37', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(168, '3', NULL, NULL, 3, 'item_import', 'TONIC WATER', NULL, '5', NULL, 'PROD_0021', '100.00', 100, '1.00', NULL, '65', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(169, '3', NULL, NULL, 3, 'item_import', 'PREDATOR', NULL, '5', NULL, 'PROD_0022', '50.00', 50, '1.00', NULL, '41', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(170, '3', NULL, NULL, 3, 'item_import', 'POWER PLAY', NULL, '5', NULL, 'PROD_0023', '60.00', 60, '1.00', NULL, '50', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(171, '3', NULL, NULL, 3, 'item_import', 'SPRITE 2L', NULL, '1', NULL, 'PROD_0024', '160.00', 160, '1.00', NULL, '145', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(172, '3', NULL, NULL, 3, 'item_import', 'FANTA PASSION 2LT', NULL, '1', NULL, 'PROD_0025', '160.00', 160, '1.00', NULL, '145', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(173, '3', NULL, NULL, 3, 'item_import', 'MINUTE MAID 1LT', NULL, '1', NULL, 'PROD_0026', '130.00', 130, '1.00', NULL, '105', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(174, '3', NULL, NULL, 3, 'item_import', 'COKE 350ML', NULL, '5', NULL, 'PROD_0027', '40.00', 40, '1.00', NULL, '33', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(175, '3', NULL, NULL, 3, 'item_import', 'KREST 350ML', NULL, '5', NULL, 'PROD_0028', '40.00', 40, '1.00', NULL, '33', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(176, '3', NULL, NULL, 3, 'item_import', 'SPRITE 350ML', NULL, '5', NULL, 'PROD_0029', '40.00', 40, '1.00', NULL, '33', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(177, '3', NULL, NULL, 3, 'item_import', 'STONEY 350ML', NULL, '5', NULL, 'PROD_0030', '40.00', 40, '1.00', NULL, '33', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(178, '4', NULL, NULL, 3, 'item_import', 'SAFARI KINGS', NULL, '20', NULL, 'PROD_0031', '10.00', 10, '1.00', NULL, '8.6', NULL, NULL, NULL, '', 'CIGARETTES', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(179, '4', NULL, NULL, 3, 'item_import', 'SPORTSMAN', NULL, '10', NULL, 'PROD_0032', '15.00', 15, '1.00', NULL, '10.5', NULL, NULL, NULL, '', 'CIGARETTES', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(180, '4', NULL, NULL, 3, 'item_import', 'DUNHILL DOUBLE', NULL, '10', NULL, 'PROD_0033', '20.00', 20, '1.00', NULL, '13.05', NULL, NULL, NULL, '', 'CIGARETTES', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(181, '4', NULL, NULL, 3, 'item_import', 'EMBASSY', NULL, '10', NULL, 'PROD_0034', '20.00', 20, '1.00', NULL, '12.1', NULL, NULL, NULL, '', 'CIGARETTES', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(182, '5', NULL, NULL, 3, 'item_import', 'KENYA CANE SMOOTH 250ML', NULL, '2', NULL, 'PROD_0035', '250.00', 250, '1.00', NULL, '220', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(183, '6', NULL, NULL, 3, 'item_import', 'CAPTAIN MORGAN 250ML', NULL, '2', NULL, 'PROD_0036', '300.00', 300, '1.00', NULL, '245', NULL, NULL, NULL, '', 'BRANDY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(184, '7', NULL, NULL, 3, 'item_import', 'RICHOT 250ML', NULL, '2', NULL, 'PROD_0037', '430.00', 430, '1.00', NULL, '340', NULL, NULL, NULL, '', 'GIN', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(185, '7', NULL, NULL, 3, 'item_import', 'GILBEYS 250ML', NULL, '2', NULL, 'PROD_0038', '450.00', 450, '1.00', NULL, '340', NULL, NULL, NULL, '', 'GIN', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(186, '7', NULL, NULL, 3, 'item_import', 'GILBEYS 375ML', NULL, '2', NULL, 'PROD_0039', '550.00', 550, '1.00', NULL, '475', NULL, NULL, NULL, '', 'GIN', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(187, '7', NULL, NULL, 3, 'item_import', 'KONYAGI 250ML', NULL, '2', NULL, 'PROD_0040', '250.00', 250, '1.00', NULL, '195', NULL, NULL, NULL, '', 'GIN', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(188, '7', NULL, NULL, 3, 'item_import', 'KONYAGI 350ML', NULL, '2', NULL, 'PROD_0041', '450.00', 450, '1.00', NULL, '375', NULL, NULL, NULL, '', 'GIN', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(189, '7', NULL, NULL, 3, 'item_import', 'KONYAGI 750ML', NULL, '2', NULL, 'PROD_0042', '650.00', 650, '1.00', NULL, '520', NULL, NULL, NULL, '', 'GIN', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(190, '2', NULL, NULL, 3, 'item_import', 'CHROME LEMON 250ML', NULL, '5', NULL, 'PROD_0043', '220.00', 220, '1.00', NULL, '173', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(191, '2', NULL, NULL, 3, 'item_import', 'CHROME CLEAR 250ML', NULL, '5', NULL, 'PROD_0044', '220.00', 220, '1.00', NULL, '173', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(192, '2', NULL, NULL, 3, 'item_import', 'CHROME GIN 250ML', NULL, '5', NULL, 'PROD_0045', '220.00', 220, '1.00', NULL, '173', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(193, '7', NULL, NULL, 3, 'item_import', 'CLUB MAN 250ML', NULL, '5', NULL, 'PROD_0046', '250.00', 250, '1.00', NULL, '200', NULL, NULL, NULL, '', 'GIN', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(194, '2', NULL, NULL, 3, 'item_import', 'FLIRT VODKA GREEN APPLE 25OML', NULL, '2', NULL, 'PROD_0047', '400.00', 400, '1.00', NULL, '235', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(195, '8', NULL, NULL, 3, 'item_import', 'BEST CREAM 250ML', NULL, '2', NULL, 'PROD_0048', '400.00', 400, '1.00', NULL, '230', NULL, NULL, NULL, '', 'CREAM', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(196, '5', NULL, NULL, 3, 'item_import', 'BEST WHISKY 250ML', NULL, '2', NULL, 'PROD_0049', '400.00', 400, '1.00', NULL, '230', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(197, '5', NULL, NULL, 3, 'item_import', 'ALL SEASONS 375ML', NULL, '2', NULL, 'PROD_0050', '400.00', 400, '1.00', NULL, '325', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(198, '5', NULL, NULL, 3, 'item_import', 'HUNTERS CHOICE 250ML', NULL, '2', NULL, 'PROD_0051', '300.00', 300, '1.00', NULL, '235', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(199, '5', NULL, NULL, 3, 'item_import', 'HUNTERS CHOICE 350ML', NULL, '2', NULL, 'PROD_0052', '450.00', 450, '1.00', NULL, '360', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(200, '5', NULL, NULL, 3, 'item_import', 'PEOPLE 250ML', NULL, '10', NULL, 'PROD_0053', '160.00', 160, '1.00', NULL, '110', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(201, '2', NULL, NULL, 3, 'item_import', 'BLUE ICE 250ML', NULL, '10', NULL, 'PROD_0054', '180.00', 180, '1.00', NULL, '140', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(202, '2', NULL, NULL, 3, 'item_import', 'STAR 250ML', NULL, '10', NULL, 'PROD_0055', '160.00', 160, '1.00', NULL, '120', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(203, '6', NULL, NULL, 3, 'item_import', 'VICEROY 250ML', NULL, '5', NULL, 'PROD_0056', '500.00', 500, '1.00', NULL, '335', NULL, NULL, NULL, '', 'BRANDY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(204, '2', NULL, NULL, 3, 'item_import', 'VICEROY 375ML', NULL, '2', NULL, 'PROD_0057', '700.00', 700, '1.00', NULL, '520', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(205, '2', NULL, NULL, 3, 'item_import', 'KIBAO 250ML', NULL, '2', NULL, 'PROD_0058', '250.00', 250, '1.00', NULL, '180', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(206, '2', NULL, NULL, 3, 'item_import', 'KIBAO 350ML', NULL, '2', NULL, 'PROD_0059', '350.00', 350, '1.00', NULL, '255', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(207, '9', NULL, NULL, 3, 'item_import', 'HALF LOAF 250ML', NULL, '10', NULL, 'PROD_0060', '150.00', 150, '1.00', NULL, '100', NULL, NULL, NULL, '', 'WINES', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(208, '9', NULL, NULL, 3, 'item_import', 'CASSABUENNA SWEET WHITE 1LT', NULL, '1', NULL, 'PROD_0061', '800.00', 800, '1.00', NULL, '475', NULL, NULL, NULL, '', 'WINES', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(209, '9', NULL, NULL, 3, 'item_import', 'CAPRICE DRY WHITE 1LT', NULL, '1', NULL, 'PROD_0062', '750.00', 750, '1.00', NULL, '555', NULL, NULL, NULL, '', 'WINES', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(210, '9', NULL, NULL, 3, 'item_import', 'CAPRICE SWEET RED 1LT', NULL, '1', NULL, 'PROD_0063', '750.00', 750, '1.00', NULL, '555', NULL, NULL, NULL, '', 'WINES', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(211, '3', NULL, NULL, 3, 'item_import', 'LIME JUICE 1.5LT', NULL, '1', NULL, 'PROD_0064', '230.00', 230, '1.00', NULL, '195', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(212, '5', NULL, NULL, 3, 'item_import', 'RED LABEL 1LT', NULL, '1', NULL, 'PROD_0065', '2100.00', 2100, '1.00', NULL, '1500', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(213, '5', NULL, NULL, 3, 'item_import', 'BLACK LABEL 1LT', NULL, '1', NULL, 'PROD_0066', '3500.00', 3500, '1.00', NULL, '2900', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(214, '5', NULL, NULL, 3, 'item_import', 'JAMESON 1LT', NULL, '1', NULL, 'PROD_0067', '2950.00', 2950, '1.00', NULL, '2200', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(215, '5', NULL, NULL, 3, 'item_import', 'RED LABEL 750ML', NULL, '1', NULL, 'PROD_0068', '2300.00', 2300, '1.00', NULL, '1300', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(216, '5', NULL, NULL, 3, 'item_import', 'RED LABEL 375ML', NULL, '1', NULL, 'PROD_0069', '950.00', 950, '1.00', NULL, '780', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(217, '5', NULL, NULL, 3, 'item_import', 'ALL SEASONS 750ML', NULL, '1', NULL, 'PROD_0070', '800.00', 800, '1.00', NULL, '700', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(218, '5', NULL, NULL, 3, 'item_import', 'JAMESON 350ML', NULL, '1', NULL, 'PROD_0071', '1100.00', 1100, '1.00', NULL, '880', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(219, '5', NULL, NULL, 3, 'item_import', 'JAMESON 750ML', NULL, '1', NULL, 'PROD_0072', '2500.00', 2500, '1.00', NULL, '1580', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(220, '5', NULL, NULL, 3, 'item_import', 'SOUTHERN COMFORT 375ML', NULL, '1', NULL, 'PROD_0073', '1000.00', 1000, '1.00', NULL, '800', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(221, '1', NULL, NULL, 3, 'item_import', 'PILSNER', NULL, '5', NULL, 'PROD_0074', '180.00', 180, '1.00', NULL, '140', NULL, NULL, NULL, '', 'BEER', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30');
INSERT INTO `items_three` (`item_id`, `brand_id`, `brand_model_id`, `package_type_id`, `tax_type_id`, `specify`, `category`, `attribute`, `unit`, `ship_number`, `item_name`, `buying_price`, `marked_price`, `selling_price`, `capacity`, `color`, `model_year`, `imei_one`, `imei_two`, `narrative`, `barcode`, `reference`, `reorder_level`, `opening_stock`, `date_modified`, `time_stamp`) VALUES
(222, '1', NULL, NULL, 3, 'item_import', 'ATLAS', NULL, '5', NULL, 'PROD_0075', '230.00', 230, '1.00', NULL, '180', NULL, NULL, NULL, '', 'BEER', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(223, '1', NULL, NULL, 3, 'item_import', 'GUINESS SMOOTH', NULL, '5', NULL, 'PROD_0076', '220.00', 220, '1.00', NULL, '165', NULL, NULL, NULL, '', 'BEER', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(224, '1', NULL, NULL, 3, 'item_import', 'GUINESS STOUT', NULL, '5', NULL, 'PROD_0077', '220.00', 220, '1.00', NULL, '183', NULL, NULL, NULL, '', 'BEER', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(225, '1', NULL, NULL, 3, 'item_import', 'WHITE CAP', NULL, '5', NULL, 'PROD_0078', '220.00', 220, '1.00', NULL, '183', NULL, NULL, NULL, '', 'BEER', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(226, '1', NULL, NULL, 3, 'item_import', 'OJ 16', NULL, '5', NULL, 'PROD_0079', '250.00', 250, '1.00', NULL, '190', NULL, NULL, NULL, '', 'BEER', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(227, '1', NULL, NULL, 3, 'item_import', 'FAXE', NULL, '5', NULL, 'PROD_0080', '220.00', 220, '1.00', NULL, '170', NULL, NULL, NULL, '', 'BEER', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(228, '1', NULL, NULL, 3, 'item_import', 'BLACK ICE', NULL, '5', NULL, 'PROD_0081', '180.00', 180, '1.00', NULL, '143', NULL, NULL, NULL, '', 'BEER', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(229, '1', NULL, NULL, 3, 'item_import', 'GUARRANA', NULL, '5', NULL, 'PROD_0082', '180.00', 180, '1.00', NULL, '143', NULL, NULL, NULL, '', 'BEER', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(230, '5', NULL, NULL, 3, 'item_import', 'BLACK LABEL 750ML', NULL, '1', NULL, 'PROD_0083', '2900.00', 2900, '1.00', NULL, '2400', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(231, '8', NULL, NULL, 3, 'item_import', 'BAILEY 750ML', NULL, '1', NULL, 'PROD_0084', '2350.00', 2350, '1.00', NULL, '1730', NULL, NULL, NULL, '', 'CREAM', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(232, '5', NULL, NULL, 3, 'item_import', '8PM 750ML', NULL, '0', NULL, 'PROD_0085', '1000.00', 1000, '1.00', NULL, '750', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(233, '5', NULL, NULL, 3, 'item_import', 'WILLIAM LAWSONS 750ML', NULL, '0', NULL, 'PROD_0086', '1250.00', 1250, '1.00', NULL, '1075', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(234, '7', NULL, NULL, 3, 'item_import', 'BEST DRY GIN 750ML', NULL, '0', NULL, 'PROD_0087', '900.00', 900, '1.00', NULL, '530', NULL, NULL, NULL, '', 'GIN', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(235, '8', NULL, NULL, 3, 'item_import', 'BEST  CREAM 750ML', NULL, '0', NULL, 'PROD_0088', '950.00', 950, '1.00', NULL, '820', NULL, NULL, NULL, '', 'CREAM', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(236, '7', NULL, NULL, 3, 'item_import', 'CHROME GIN 750ML', NULL, '0', NULL, 'PROD_0089', '630.00', 630, '1.00', NULL, '485', NULL, NULL, NULL, '', 'GIN', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(237, '2', NULL, NULL, 3, 'item_import', 'CHROME VODKA 750ML', NULL, '0', NULL, 'PROD_0090', '630.00', 630, '1.00', NULL, '485', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(238, '5', NULL, NULL, 3, 'item_import', 'IMPERIAL 750 ML', NULL, '0', NULL, 'PROD_0091', '800.00', 800, '1.00', NULL, '580', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(239, '7', NULL, NULL, 3, 'item_import', 'CLUB MAN 750ML', NULL, '0', NULL, 'PROD_0092', '700.00', 700, '1.00', NULL, '500', NULL, NULL, NULL, '', 'GIN', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(240, '5', NULL, NULL, 3, 'item_import', 'HUNTERS CHOICE 750ML', NULL, '0', NULL, 'PROD_0093', '800.00', 800, '1.00', NULL, '665', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(241, '2', NULL, NULL, 3, 'item_import', 'ROBBERTSON RED 750ML', NULL, '0', NULL, 'PROD_0094', '950.00', 950, '1.00', NULL, '680', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(242, '7', NULL, NULL, 3, 'item_import', 'BLACKBIRD RED 750ML', NULL, '0', NULL, 'PROD_0095', '900.00', 900, '1.00', NULL, '650', NULL, NULL, NULL, '', 'GIN', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(243, '7', NULL, NULL, 3, 'item_import', 'BLACKBIRD WHITE 750ML', NULL, '0', NULL, 'PROD_0096', '850.00', 850, '1.00', NULL, '650', NULL, NULL, NULL, '', 'GIN', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(244, '9', NULL, NULL, 3, 'item_import', 'FOUR COUSINS RED SWEET 750ML', NULL, '0', NULL, 'PROD_0097', '850.00', 850, '1.00', NULL, '620', NULL, NULL, NULL, '', 'WINES', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(245, '9', NULL, NULL, 3, 'item_import', 'FOUR COUSINS WHITE SWEET 750ML', NULL, '0', NULL, 'PROD_0098', '850.00', 850, '1.00', NULL, '620', NULL, NULL, NULL, '', 'WINES', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(246, '9', NULL, NULL, 3, 'item_import', '4TH STREET SWEET RED 750ML', NULL, '0', NULL, 'PROD_0099', '850.00', 850, '1.00', NULL, '620', NULL, NULL, NULL, '', 'WINES', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(247, '9', NULL, NULL, 3, 'item_import', '4TH STREET SWEET WHITE 750ML', NULL, '0', NULL, 'PROD_0100', '850.00', 850, '1.00', NULL, '620', NULL, NULL, NULL, '', 'WINES', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(248, '9', NULL, NULL, 3, 'item_import', 'CELLAR CASK SWEET RED 750ML', NULL, '0', NULL, 'PROD_0101', '900.00', 900, '1.00', NULL, '630', NULL, NULL, NULL, '', 'WINES', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(249, '9', NULL, NULL, 3, 'item_import', 'CELLAR CASK SWEET WHITE 750ML', NULL, '0', NULL, 'PROD_0102', '900.00', 900, '1.00', NULL, '630', NULL, NULL, NULL, '', 'WINES', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(250, '5', NULL, NULL, 3, 'item_import', 'SOUTHERN COMFORT 700ML', NULL, '0', NULL, 'PROD_0103', '1800.00', 1800, '1.00', NULL, '1450', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(251, '5', NULL, NULL, 3, 'item_import', 'VICEROY 750ML', NULL, '0', NULL, 'PROD_0104', '1200.00', 1200, '1.00', NULL, '1020', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(252, '5', NULL, NULL, 3, 'item_import', 'MAC MOHAN 750ML', NULL, '0', NULL, 'PROD_0105', '850.00', 850, '1.00', NULL, '650', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(253, '6', NULL, NULL, 3, 'item_import', 'RICHOT 750ML', NULL, '0', NULL, 'PROD_0106', '1200.00', 1200, '1.00', NULL, '1000', NULL, NULL, NULL, '', 'BRANDY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(254, '5', NULL, NULL, 3, 'item_import', 'CAPTAIN MORGAN 750ML', NULL, '0', NULL, 'PROD_0107', '850.00', 850, '1.00', NULL, '720', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(255, '5', NULL, NULL, 3, 'item_import', 'BLACK AND WHITE 750ML', NULL, '0', NULL, 'PROD_0108', '1100.00', 1100, '1.00', NULL, '880', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(256, '2', NULL, NULL, 3, 'item_import', 'FLIRT VODKA 1LT', NULL, '0', NULL, 'PROD_0109', '1100.00', 1100, '1.00', NULL, '850', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(257, '2', NULL, NULL, 3, 'item_import', 'FLIRT VODKA GREEN APPLE 75OML', NULL, '0', NULL, 'PROD_0110', '950.00', 950, '1.00', NULL, '790', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(258, '2', NULL, NULL, 3, 'item_import', 'SMINORFF VODKA 750 ML', NULL, '0', NULL, 'PROD_0111', '1200.00', 1200, '1.00', NULL, '1000', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(259, '2', NULL, NULL, 3, 'item_import', 'KENYA CANE PINEAPPLE 750ML', NULL, '0', NULL, 'PROD_0112', '700.00', 700, '1.00', NULL, '570', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(260, '2', NULL, NULL, 3, 'item_import', 'KENYA CANE SMOOTH 750ML', NULL, '0', NULL, 'PROD_0113', '700.00', 700, '1.00', NULL, '570', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(261, '2', NULL, NULL, 3, 'item_import', 'KENYA CANE CITRUS 750ML', NULL, '0', NULL, 'PROD_0114', '700.00', 700, '1.00', NULL, '570', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(262, '7', NULL, NULL, 3, 'item_import', 'GORDONS DRY 750ML', NULL, '0', NULL, 'PROD_0115', '1650.00', 1650, '1.00', NULL, '1350', NULL, NULL, NULL, '', 'GIN', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(263, '5', NULL, NULL, 3, 'item_import', 'GORDONS PINIC 750ML', NULL, '0', NULL, 'PROD_0116', '1700.00', 1700, '1.00', NULL, '1350', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(264, '7', NULL, NULL, 3, 'item_import', 'GILBEYS 750 ML', NULL, '0', NULL, 'PROD_0117', '1300.00', 1300, '1.00', NULL, '1000', NULL, NULL, NULL, '', 'GIN', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(265, '9', NULL, NULL, 3, 'item_import', 'V&A IMPERIAL CREAM', NULL, '0', NULL, 'PROD_0118', '700.00', 700, '1.00', NULL, '600', NULL, NULL, NULL, '', 'WINES', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(266, '5', NULL, NULL, 3, 'item_import', 'CRAZY COCK 750ML', NULL, '0', NULL, 'PROD_0119', '850.00', 850, '1.00', NULL, '660', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(267, '5', NULL, NULL, 3, 'item_import', 'GRANTS 750ML', NULL, '0', NULL, 'PROD_0120', '1300.00', 1300, '1.00', NULL, '1120', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(268, '5', NULL, NULL, 3, 'item_import', 'GRANTS 375ML', NULL, '0', NULL, 'PROD_0121', '1200.00', 1200, '1.00', NULL, '650', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(269, '5', NULL, NULL, 3, 'item_import', 'VAT 69 750ML', NULL, '0', NULL, 'PROD_0122', '1400.00', 1400, '1.00', NULL, '1150', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(270, '6', NULL, NULL, 3, 'item_import', 'RICHOT 375ML', NULL, '0', NULL, 'PROD_0123', '550.00', 550, '1.00', NULL, '475', NULL, NULL, NULL, '', 'BRANDY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(271, '8', NULL, NULL, 3, 'item_import', 'IMPERIAL BLUE 375ML', NULL, '0', NULL, 'PROD_0124', '400.00', 400, '1.00', NULL, '315', NULL, NULL, NULL, '', 'CREAM', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(272, '8', NULL, NULL, 3, 'item_import', 'IMPERIAL 250ML', NULL, '0', NULL, 'PROD_0125', '250.00', 250, '1.00', NULL, '200', NULL, NULL, NULL, '', 'CREAM', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(273, '2', NULL, NULL, 3, 'item_import', 'SMINORFF VODKA 250 ML', NULL, '5', NULL, 'PROD_0126', '450.00', 450, '1.00', NULL, '340', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(274, '2', NULL, NULL, 3, 'item_import', 'SMINORFF VODKA 375 ML', NULL, '5', NULL, 'PROD_0127', '650.00', 650, '1.00', NULL, '475', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(275, '2', NULL, NULL, 3, 'item_import', 'KENYA KING 250ML', NULL, '5', NULL, 'PROD_0128', '220.00', 220, '1.00', NULL, '165', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(276, '5', NULL, NULL, 3, 'item_import', 'GRANTS 1LT', NULL, '0', NULL, 'PROD_0129', '1700.00', 1700, '1.00', NULL, '1400', NULL, NULL, NULL, '', 'WHISKEY', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(277, '2', NULL, NULL, 3, 'item_import', 'SWEET BERRY 250ML', NULL, '10', NULL, 'PROD_0130', '170.00', 170, '1.00', NULL, '130', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(278, '2', NULL, NULL, 3, 'item_import', 'KIBAO 750ML', NULL, '0', NULL, 'PROD_0131', '600.00', 600, '1.00', NULL, '500', NULL, NULL, NULL, '', 'VODKA', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(279, '8', NULL, NULL, 3, 'item_import', 'FANTA BLACK CURRENT 350ML', NULL, '5', NULL, 'PROD_0132', '40.00', 40, '1.00', NULL, '33', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(280, '8', NULL, NULL, 3, 'item_import', 'FANTA BLACK CURRENT 500ML', NULL, '5', NULL, 'PROD_0133', '70.00', 70, '1.00', NULL, '53', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(281, '8', NULL, NULL, 3, 'item_import', 'FANTA BLACK CURRENT 1.25L', NULL, '1', NULL, 'PROD_0134', '120.00', 120, '1.00', NULL, '106', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(282, '8', NULL, NULL, 3, 'item_import', 'FANTA ORANGE 1.25L', NULL, '1', NULL, 'PROD_0135', '120.00', 120, '1.00', NULL, '106', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(283, '8', NULL, NULL, 3, 'item_import', 'FANTA ORANGE 350ML', NULL, '5', NULL, 'PROD_0136', '40.00', 40, '1.00', NULL, '33', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(284, '8', NULL, NULL, 3, 'item_import', 'MINUTE MAID MANGO 400ML', NULL, '5', NULL, 'PROD_0137', '70.00', 70, '1.00', NULL, '58', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(285, '8', NULL, NULL, 3, 'item_import', 'NOVIDA 350ML', NULL, '5', NULL, 'PROD_0138', '40.00', 40, '1.00', NULL, '33', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(286, '8', NULL, NULL, 3, 'item_import', 'COKE 200ML', NULL, '5', NULL, 'PROD_0139', '20.00', 20, '1.00', NULL, '15', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(287, '8', NULL, NULL, 3, 'item_import', 'SPRITE 200ML', NULL, '5', NULL, 'PROD_0140', '20.00', 20, '1.00', NULL, '15', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(288, '8', NULL, NULL, 3, 'item_import', 'FANTA ORANGE 200ML', NULL, '5', NULL, 'PROD_0141', '20.00', 20, '1.00', NULL, '15', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(289, '8', NULL, NULL, 3, 'item_import', 'FANTA BLACKCURRENT 200ML', NULL, '5', NULL, 'PROD_0142', '20.00', 20, '1.00', NULL, '15', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(290, '8', NULL, NULL, 3, 'item_import', 'MINUTE MAID 350ML', NULL, '5', NULL, 'PROD_0143', '40.00', 40, '1.00', NULL, '33', NULL, NULL, NULL, '', 'SOFT DRINKS', 'J14IE0N6KA', 0, 0, '2022-04-14 09:40:30', '2022-04-14 09:40:30'),
(291, 'Open Box', NULL, NULL, 3, 'item_import', '2', NULL, 'VAT', NULL, '1', '10000.00', 20, '2.00', NULL, 'SHIP001', NULL, NULL, NULL, '77726272', 'Red', 'J14I14481O', 0, 0, '2022-04-14 12:05:23', '2022-04-14 12:05:23'),
(292, 'Original', NULL, NULL, 3, 'item_import', '4', NULL, 'Excempted', NULL, '2', '25000.00', 15, '4.00', NULL, 'SHIP001', NULL, NULL, NULL, '85895272', 'Black', 'J14I14481O', 0, 0, '2022-04-14 12:05:23', '2022-04-14 12:05:23'),
(293, 'Open Box', NULL, NULL, 3, 'item_import', '2', NULL, 'VAT', NULL, '1', '5000.00', 20, '2.00', NULL, 'SHIP002', NULL, NULL, NULL, '777545212', 'Blue', 'J14I14481O', 0, 0, '2022-04-14 12:05:23', '2022-04-14 12:05:23'),
(294, '80000', NULL, NULL, 3, 'item_import', 'Apple Mac II', NULL, '85000', NULL, '1', '0.00', 0, '0.00', NULL, 'VAT', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(295, '1000', NULL, NULL, 3, 'item_import', 'frontera', NULL, '1150', NULL, '2', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(296, '900', NULL, NULL, 3, 'item_import', 'kings', NULL, '1035', NULL, '3', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(297, '100', NULL, NULL, 3, 'item_import', 'test watch', NULL, '150', NULL, '4', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(298, '10', NULL, NULL, 3, 'item_import', 'test watch 2.000 Bottles', NULL, '20', NULL, '5', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(299, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '6', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(300, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '7', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(301, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '8', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(302, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '9', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(303, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '10', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(304, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '11', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(305, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '12', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(306, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '13', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(307, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '14', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(308, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '15', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(309, '2800', NULL, NULL, 3, 'item_import', 'Watch', NULL, '4000', NULL, '16', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(310, '2800', NULL, NULL, 3, 'item_import', 'Watch', NULL, '4000', NULL, '17', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(311, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '18', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(312, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '19', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(313, '2800', NULL, NULL, 3, 'item_import', 'Watch', NULL, '4000', NULL, '20', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(314, '2800', NULL, NULL, 3, 'item_import', 'Watch', NULL, '4000', NULL, '21', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(315, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '22', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(316, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '23', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(317, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '24', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(318, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '25', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(319, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '26', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(320, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '27', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(321, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '28', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(322, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '29', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(323, '3700', NULL, NULL, 3, 'item_import', 'Watch', NULL, '4000', NULL, '30', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(324, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '31', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(325, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '32', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(326, '2700', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '33', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(327, '2750', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '34', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(328, '2750', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '35', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(329, '2650', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '36', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(330, '2650', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '37', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(331, '2650', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '38', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(332, '2800', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '39', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(333, '2800', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '40', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(334, '2800', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '41', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(335, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '42', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(336, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '43', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(337, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '44', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(338, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '45', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(339, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '46', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(340, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '47', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(341, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '48', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(342, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '49', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(343, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '50', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(344, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '51', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(345, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '52', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(346, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '53', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(347, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '54', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(348, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '55', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(349, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '56', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(350, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '57', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(351, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '58', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(352, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '59', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(353, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '60', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(354, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '61', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(355, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '62', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(356, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '63', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(357, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '64', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(358, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '65', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(359, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '66', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(360, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '67', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(361, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '68', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(362, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '69', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(363, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '70', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(364, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '71', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(365, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '72', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(366, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '73', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(367, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '74', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(368, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '75', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(369, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '76', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(370, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '77', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(371, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '78', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(372, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '79', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(373, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3500', NULL, '80', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(374, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3500', NULL, '81', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(375, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3500', NULL, '82', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(376, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '83', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(377, '2600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3600', NULL, '84', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(378, '2200', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '85', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(379, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '86', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(380, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '87', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(381, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '88', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(382, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '89', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(383, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '90', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(384, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '91', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(385, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '92', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(386, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '93', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(387, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '94', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(388, '1600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2500', NULL, '95', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(389, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '96', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(390, '1600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2500', NULL, '97', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(391, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '98', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(392, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '99', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(393, '2400', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3500', NULL, '100', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(394, '1800', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '101', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(395, '1800', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '102', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(396, '2400', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '103', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(397, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '104', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(398, '1500', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2600', NULL, '105', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(399, '1600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2600', NULL, '106', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(400, '1600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2600', NULL, '107', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(401, '1100', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2000', NULL, '108', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(402, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '109', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(403, '1600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2600', NULL, '110', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(404, '1600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2600', NULL, '111', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(405, '1600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2600', NULL, '112', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(406, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '113', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(407, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '114', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(408, '1800', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2600', NULL, '115', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(409, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '116', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(410, '1100', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2000', NULL, '117', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(411, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '118', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(412, '1100', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2000', NULL, '119', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(413, '1100', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2000', NULL, '120', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(414, '1600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2600', NULL, '121', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(415, '1600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2600', NULL, '122', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(416, '1100', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2000', NULL, '123', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(417, '1100', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2000', NULL, '124', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(418, '1100', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2000', NULL, '125', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(419, '1100', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2000', NULL, '126', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(420, '1100', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2000', NULL, '127', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(421, '1800', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2500', NULL, '128', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(422, '1800', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2600', NULL, '129', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(423, '1600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2600', NULL, '130', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(424, '1600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2600', NULL, '131', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(425, '2300', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3200', NULL, '132', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(426, '1800', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2600', NULL, '133', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(427, '1100', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2000', NULL, '134', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(428, '1100', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2000', NULL, '135', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(429, '1100', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2000', NULL, '136', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(430, '1100', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2000', NULL, '137', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(431, '1600', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2600', NULL, '138', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(432, '1200', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2000', NULL, '139', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(433, '1800', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2500', NULL, '140', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(434, '1800', NULL, NULL, 3, 'item_import', 'Watch', NULL, '2500', NULL, '141', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(435, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '142', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(436, '2000', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3000', NULL, '143', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(437, '2300', NULL, NULL, 3, 'item_import', 'Watch', NULL, '3200', NULL, '144', '0.00', 0, '0.00', NULL, 'Excempted', NULL, NULL, NULL, '', '', 'J14IX6N40Y', 0, 0, '2022-04-14 12:08:21', '2022-04-14 12:08:21'),
(438, 'Open Box', NULL, NULL, 3, 'item_import', '2', NULL, 'VAT', NULL, '1', '10000.00', 20, '2.00', NULL, 'SHIP001', NULL, NULL, NULL, '77726272', 'Red', 'J21ISNKT5Y', 0, 0, '2022-04-21 06:23:27', '2022-04-21 06:23:27'),
(439, 'Original', NULL, NULL, 3, 'item_import', '4', NULL, 'Excempted', NULL, '2', '25000.00', 15, '4.00', NULL, 'SHIP001', NULL, NULL, NULL, '85895272', 'Black', 'J21ISNKT5Y', 0, 0, '2022-04-21 06:23:27', '2022-04-21 06:23:27'),
(440, 'Open Box', NULL, NULL, 3, 'item_import', '2', NULL, 'VAT', NULL, '1', '5000.00', 20, '2.00', NULL, 'SHIP002', NULL, NULL, NULL, '777545212', 'Blue', 'J21ISNKT5Y', 0, 0, '2022-04-21 06:23:27', '2022-04-21 06:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `items_two`
--

CREATE TABLE `items_two` (
  `item_id` int(11) NOT NULL,
  `brand_id` varchar(50) DEFAULT NULL,
  `brand_model_id` varchar(50) DEFAULT NULL,
  `package_type_id` varchar(50) DEFAULT NULL,
  `tax_type_id` int(11) NOT NULL DEFAULT 4,
  `specify` varchar(30) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `attribute` varchar(50) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `ship_number` varchar(20) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `buying_price` decimal(10,2) NOT NULL,
  `marked_price` double NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `model_year` int(11) DEFAULT NULL,
  `imei_one` varchar(50) DEFAULT NULL,
  `imei_two` varchar(50) DEFAULT NULL,
  `narrative` text DEFAULT NULL,
  `barcode` varchar(256) DEFAULT NULL,
  `reference` text DEFAULT NULL,
  `reorder_level` int(11) DEFAULT NULL,
  `opening_stock` int(11) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Triggers `items_two`
--
DELIMITER $$
CREATE TRIGGER `item_bulk_import` AFTER INSERT ON `items_two` FOR EACH ROW BEGIN
    
        DECLARE this_brand_id integer;
        DECLARE this_color_id integer;
        DECLARE this_unit_id integer;
        DECLARE this_category_id integer;
        
        DECLARE brand_doesexist varchar(30) DEFAULT NULL;
        DECLARE color_doesexist varchar(30) DEFAULT NULL;
        DECLARE unit_doesexist varchar(30) DEFAULT NULL;
        DECLARE category_doesexist varchar(30) DEFAULT NULL;

        
        SELECT brands.brand_id INTO this_brand_id FROM brands WHERE brands.brand_name = NEW.brand_id;    
        SELECT colors.color_id INTO this_color_id FROM colors WHERE colors.color_name = NEW.color;
        SELECT units.unit_id INTO this_unit_id FROM units WHERE units.unit_name = NEW.unit;
        SELECT categories.cat_id INTO this_category_id FROM categories WHERE categories.cat_name = NEW.category;

        
        SELECT ifnull((select brand_id from brands where brand_id = this_brand_id), 'Empty') INTO brand_doesexist;
        SELECT ifnull((select color_id from colors where color_id = this_color_id), 'Empty') INTO color_doesexist;
        SELECT ifnull((select unit_id from units where unit_id = this_unit_id), 'Empty') INTO unit_doesexist;
        SELECT ifnull((select cat_id from categories where cat_id = this_category_id), 'Empty') INTO category_doesexist;

        IF brand_doesexist = 'Empty' OR color_doesexist = 'Empty' OR unit_doesexist = 'Empty' OR category_doesexist = 'Empty' THEN
        
        
        
            INSERT IGNORE
                INTO items_three(
                    brand_id,
                    tax_type_id,
                    specify,
                    category,
                    unit,
                    item_name,
                    buying_price,
                    marked_price,
                    selling_price,
                    color,
                    narrative,
                    barcode,
                    reference,
                    reorder_level,
                    opening_stock
                )
                VALUES(
                    NEW.brand_id,
                    NEW.tax_type_id,
                    NEW.specify,
                    NEW.category,
                    NEW.unit,
                    NEW.item_name,
                    NEW.buying_price,
                    NEW.marked_price,
                    NEW.selling_price,
                    NEW.color,
                    NEW.narrative,
                    NEW.barcode,
                    NEW.reference,
                    NEW.reorder_level,
                    NEW.opening_stock
                );

        ELSE
        
        
            INSERT IGNORE
                INTO items(
                    brand_id,
                    tax_type_id,
                    category_id,
                    unit_id,
                    item_name,
                    buying_price,
                    marked_price,
                    selling_price,
                    color_id,
                    narrative,
                    barcode,
                    reference,
                    reorder_level,
                    available_qty
                )
                VALUES(
                    this_brand_id,
                    tax_type_id,
                    this_category_id,
                    this_unit_id,
                    NEW.item_name,
                    NEW.buying_price,
                    NEW.marked_price,
                    NEW.selling_price,
                    this_color_id,
                    NEW.narrative,
                    NEW.barcode,
                    NEW.reference,
                    NEW.reorder_level,
                    NEW.opening_stock
                );
            
            IF ROW_COUNT() = 0 THEN 
            
            
            INSERT IGNORE
                INTO items_three(
                    brand_id,
                    tax_type_id,
                    specify,
                    category,
                    unit,
                    item_name,
                    buying_price,
                    marked_price,
                    selling_price,
                    color,
                    narrative,
                    barcode,
                    reference,
                    reorder_level,
                    opening_stock
                )
                VALUES(
                    NEW.brand_id,
                    NEW.tax_type_id,
                    NEW.specify,
                    NEW.category,
                    NEW.unit,
                    NEW.item_name,
                    NEW.buying_price,
                    NEW.marked_price,
                    NEW.selling_price,
                    NEW.color,
                    NEW.narrative,
                    NEW.barcode,
                    NEW.reference,
                    NEW.reorder_level,
                    NEW.opening_stock
                );
                
            END IF;

        END IF;
        
    
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `item_recipe_items`
--

CREATE TABLE `item_recipe_items` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `recipe_code` varchar(20) NOT NULL,
  `measurement` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `narrative` varchar(50) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_recipe_items`
--

INSERT INTO `item_recipe_items` (`id`, `item_id`, `recipe_code`, `measurement`, `amount`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 148, 'G3KXJIT0UR', 'lt', '1.00', NULL, '2022-04-14 08:21:28', '2022-04-14 08:21:28'),
(2, 78, 'RVGCIZTOXW', '10', '1830.00', NULL, '2022-04-26 06:18:12', '2022-04-26 06:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `item_requests`
--

CREATE TABLE `item_requests` (
  `item_request_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `item_store_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `approver_id` int(11) DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `narrative` text DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_requests`
--

INSERT INTO `item_requests` (`item_request_id`, `item_id`, `entity_id`, `item_store_id`, `store_id`, `approver_id`, `request_date`, `qty`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 1, 2, 1, 3, 2, '2021-03-09', 10, 1, '', '2022-04-27 07:36:14', '2021-03-09 05:44:04'),
(2, 4, 38, 4, 3, 2, '2021-03-11', 15, 1, 'For display', '2022-04-11 07:51:32', '2021-03-09 05:45:41'),
(3, 5, 38, 5, 3, NULL, '2021-03-09', 1, 0, 'For sale', '2022-04-11 07:51:32', '2021-03-09 05:46:08'),
(4, 2, 2, 2, 3, 2, '2021-03-19', 1, 1, '', '2022-04-11 07:51:32', '2021-03-19 06:59:28'),
(5, 144, 2, 283, 4, NULL, '2022-03-31', 90, 0, 'bj', '2022-04-11 07:51:32', '2022-03-31 04:37:34'),
(6, 144, 2, 283, 4, 2, '2022-03-31', 3, 1, 'Because high demand', '2022-04-11 07:51:32', '2022-03-31 04:54:17'),
(7, 145, 2, 144, 2, 2, '2022-04-27', 10, 1, 'fgh', '2022-04-27 09:23:21', '2022-04-27 09:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `item_returned`
--

CREATE TABLE `item_returned` (
  `item_return_id` int(11) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `store_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_status_id` int(11) NOT NULL,
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `return_condition` enum('Good','Spoilt') NOT NULL DEFAULT 'Good',
  `qty` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_returned`
--

INSERT INTO `item_returned` (`item_return_id`, `reference`, `store_id`, `entity_id`, `item_id`, `item_status_id`, `order_item_id`, `order_id`, `return_condition`, `qty`, `created_by`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, '', 0, 2, 143, 4, 0, 0, 'Good', 0, 0, 1, 'with a test reason', '2022-04-11 07:51:32', '2022-03-31 05:28:35'),
(2, '', 0, 2, 144, 3, 0, 0, 'Good', 0, 0, 1, 'jss', '2022-04-13 14:53:10', '2022-04-13 14:53:10'),
(3, '', 0, 2, 141, 3, 0, 0, 'Good', 0, 0, 1, 'hddd', '2022-04-13 15:07:35', '2022-04-13 15:07:35'),
(4, '', 0, 2, 141, 3, 0, 0, 'Good', 0, 0, 1, 'dd', '2022-04-13 15:07:53', '2022-04-13 15:07:53'),
(5, '', 0, 2, 141, 4, 0, 0, 'Good', 0, 0, 1, 'ed', '2022-04-13 15:08:08', '2022-04-13 15:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `item_status`
--

CREATE TABLE `item_status` (
  `item_status_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `item_status_name` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(10) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_types`
--

CREATE TABLE `loan_types` (
  `loan_type_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `loan_type_name` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_types`
--

INSERT INTO `loan_types` (`loan_type_id`, `org_id`, `loan_type_name`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 1, 'Business Loan', 1, NULL, '2022-04-11 07:51:34', '2020-02-16 15:48:18'),
(2, 1, 'Personal Loan', 1, NULL, '2022-04-11 07:51:34', '2020-02-16 15:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `movement_records`
--

CREATE TABLE `movement_records` (
  `movement_record_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 0,
  `entity_id` int(11) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `date_time` varchar(20) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `narrative` text DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movement_records`
--

INSERT INTO `movement_records` (`movement_record_id`, `org_id`, `entity_id`, `latitude`, `longitude`, `date_time`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(11, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2022-04-11 07:51:35', '2020-04-08 18:34:38'),
(12, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2022-04-11 07:51:35', '2020-04-08 18:34:38'),
(13, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2022-04-11 07:51:35', '2020-04-08 18:34:38'),
(14, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2022-04-11 07:51:35', '2020-04-08 18:34:38'),
(15, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2022-04-11 07:51:35', '2020-04-08 18:34:38'),
(16, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2022-04-11 07:51:35', '2020-04-08 18:43:02'),
(17, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2022-04-11 07:51:35', '2020-04-08 18:43:02'),
(18, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2022-04-11 07:51:35', '2020-04-08 18:43:02'),
(19, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2022-04-11 07:51:35', '2020-04-08 18:43:02'),
(20, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2022-04-11 07:51:35', '2020-04-08 18:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `mpesa_callbacks`
--

CREATE TABLE `mpesa_callbacks` (
  `mpesa_callback_id` int(11) NOT NULL,
  `callback_data` text DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mpesa_callbacks`
--

INSERT INTO `mpesa_callbacks` (`mpesa_callback_id`, `callback_data`, `date_modified`, `time_stamp`) VALUES
(1, '{\"Body\":{\"stkCallback\":{\"MerchantRequestID\":\"17832-1672761-1\",\"CheckoutRequestID\":\"ws_CO_20012022151240998244\",\"ResultCode\":0,\"ResultDesc\":\"The service request is processed successfully.\",\"CallbackMetadata\":{\"Item\":[{\"Name\":\"Amount\",\"Value\":8000.00},{\"Name\":\"MpesaReceiptNumber\",\"Value\":\"QAK8VCWUIK\"},{\"Name\":\"Balance\"},{\"Name\":\"TransactionDate\",\"Value\":20220120151247},{\"Name\":\"PhoneNumber\",\"Value\":254712398198}]}}}}', '2022-04-26 14:25:41', '2022-04-26 14:25:41'),
(2, '{\"Body\":{\"stkCallback\":{\"MerchantRequestID\":\"6355-26355776-1\",\"CheckoutRequestID\":\"ws_CO_21012022210039422351\",\"ResultCode\":1032,\"ResultDesc\":\"Request cancelled by user\"}}}', '2022-04-26 14:25:41', '2022-04-26 14:25:41'),
(3, '{\"Body\":{\"stkCallback\":{\"MerchantRequestID\":\"111290-39208979-1\",\"CheckoutRequestID\":\"ws_CO_22012022091224130351\",\"ResultCode\":1,\"ResultDesc\":\"The balance is insufficient for the transaction\"}}}', '2022-04-26 14:25:41', '2022-04-26 14:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `mpesa_payments`
--

CREATE TABLE `mpesa_payments` (
  `mpesa_payment_id` int(11) NOT NULL,
  `MerchantRequestID` varchar(50) DEFAULT NULL,
  `PhoneNumber` int(11) DEFAULT NULL,
  `TransID` varchar(40) DEFAULT NULL,
  `TransactionDate` varchar(40) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `BusinessShortCode` varchar(15) DEFAULT NULL,
  `BillRefNumber` varchar(40) DEFAULT NULL,
  `InvoiceNumber` varchar(40) DEFAULT NULL,
  `ThirdPartyTransID` varchar(40) DEFAULT NULL,
  `MpesaReceiptNumber` varchar(20) DEFAULT NULL,
  `CheckoutRequestID` varchar(60) DEFAULT NULL,
  `MiddleName` varchar(60) DEFAULT NULL,
  `ResultCode` varchar(60) DEFAULT NULL,
  `Balance` double DEFAULT NULL,
  `ResultDesc` text DEFAULT NULL,
  `Item` text DEFAULT NULL,
  `payment_status` enum('Paid','Unpaid') NOT NULL DEFAULT 'Unpaid',
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mpesa_payments`
--

INSERT INTO `mpesa_payments` (`mpesa_payment_id`, `MerchantRequestID`, `PhoneNumber`, `TransID`, `TransactionDate`, `Amount`, `BusinessShortCode`, `BillRefNumber`, `InvoiceNumber`, `ThirdPartyTransID`, `MpesaReceiptNumber`, `CheckoutRequestID`, `MiddleName`, `ResultCode`, `Balance`, `ResultDesc`, `Item`, `payment_status`, `date_modified`, `time_stamp`) VALUES
(1, '14200-7475072-1', 2147483647, NULL, '20210115102614', 10000, '208004', NULL, NULL, 'J25T15K4G9', 'PAF7N03UAL', 'ws_CO_15012021102521104732', NULL, '0', NULL, 'The service request is processed successfully', NULL, 'Unpaid', '2022-04-26 14:25:41', '2022-04-26 14:25:41'),
(2, '29984-906700-1', 2147483647, NULL, '20210115110306', 10000, '208004', NULL, NULL, 'rLeUAMwY', 'PAF6N1K03O', 'ws_CO_15012021110541439385', NULL, '0', NULL, 'The service request is processed successfully', NULL, 'Unpaid', '2022-04-26 14:25:41', '2022-04-26 14:25:41'),
(3, '14200-7475072-1', 2147483647, NULL, '20210115102614', 10000, '208004', NULL, NULL, 'J25T15K4G9', 'PAF7N03UAL', 'ws_CO_15012021102521104732', NULL, '0', NULL, 'The service request is processed successfully', NULL, 'Unpaid', '2022-04-26 14:26:59', '2022-04-26 14:26:59'),
(4, '29984-906700-1', 2147483647, NULL, '20210115110306', 10000, '208004', NULL, NULL, 'rLeUAMwY', 'PAF6N1K03O', 'ws_CO_15012021110541439385', NULL, '0', NULL, 'The service request is processed successfully', NULL, 'Unpaid', '2022-04-26 14:26:59', '2022-04-26 14:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `transaction_type_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `customer_supplier_id` int(11) DEFAULT NULL,
  `payment_mode_id` int(11) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `eating_table_id` int(11) DEFAULT NULL,
  `date_time` varchar(255) NOT NULL,
  `service_charge` varchar(255) NOT NULL,
  `tax_charge` decimal(10,2) DEFAULT 0.00,
  `net_amount` varchar(255) NOT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `paid_status` tinyint(1) NOT NULL DEFAULT 0,
  `paid_amount` double DEFAULT NULL,
  `paying_balance` double DEFAULT NULL,
  `change_return` double DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `payment_due` date DEFAULT NULL,
  `points` int(11) DEFAULT 0,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `merchantrequestid` text DEFAULT NULL,
  `checkoutrequestid` text DEFAULT NULL,
  `responsecode` text DEFAULT NULL,
  `narrative` text DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `org_id`, `transaction_type_id`, `entity_id`, `customer_supplier_id`, `payment_mode_id`, `bill_no`, `reference`, `eating_table_id`, `date_time`, `service_charge`, `tax_charge`, `net_amount`, `discount`, `paid_status`, `paid_amount`, `paying_balance`, `change_return`, `active`, `payment_due`, `points`, `from_date`, `to_date`, `merchantrequestid`, `checkoutrequestid`, `responsecode`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 3, 4, 1, 69, 0, 'J29TS3MBEY', 'NA', NULL, '2022-03-29', '0', '0.00', '376500.00', NULL, 0, 0, 376500, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:35', '2022-03-29 02:43:41'),
(2, 3, 4, 1, 69, 0, 'J29T1O1VRG', 'NA', NULL, '2022-03-29', '0', '0.00', '283500.00', NULL, 1, 0, 0, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:35', '2022-03-29 02:51:10'),
(3, 3, 3, 1, 71, 0, 'J29T2V4JG0', '', 1, '2022-03-29', '0', '0.00', '6000.00', '0', 0, 0, 3000, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:35', '2022-03-29 03:06:22'),
(4, 2, 4, 2, 69, 2, 'J31T3SLMQW', 'NA', NULL, '2022-03-31', '0', '0.00', '195000.00', NULL, 1, 5000, 0, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:35', '2022-03-31 04:26:05'),
(5, 4, 3, 2, 72, 0, 'J31T4IZM4C', 'na', 1, '2022-03-31', '0', '13600.00', '108950.00', '0', 0, 0, 108950, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:35', '2022-03-31 05:17:46'),
(6, 4, 3, 2, 72, 0, 'J31T5CSI5F', 'NA', 1, '2022-03-31', '0', '0.00', '3600.00', '0', 0, 0, 3600, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:35', '2022-03-31 05:18:57'),
(7, 4, 3, 2, 72, 0, 'J31T6L1403', 'NA', 1, '2022-03-31', '0', '0.00', '13950.00', '0', 1, 0, 0, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:35', '2022-03-31 05:19:43'),
(8, 1, 1, 38, 73, 0, 'J05T7LUV21', '', 1, '2022-04-05', '0', '0.00', '7200.00', NULL, 1, 7200, 0, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:35', '2022-04-05 10:54:43'),
(9, 4, 1, 38, 73, 0, 'J05T8MKYLJ', '', 1, '2022-04-05', '0', '0.00', '3600.00', NULL, 1, 3600, 0, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:35', '2022-04-05 11:22:15'),
(10, 4, 1, 38, 73, 0, 'J05T9I2540', '', 1, '2022-04-05', '0', '0.00', '3600.00', NULL, 1, 3600, 0, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:35', '2022-04-05 11:24:46'),
(11, 4, 1, 38, 73, 0, 'J05T100ICT', '', 1, '2022-04-05', '0', '0.00', '14400.00', NULL, 1, 14400, 0, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:35', '2022-04-05 11:53:50'),
(12, 4, 1, 38, 73, 0, 'J05T11URW0', '', 1, '2022-04-05', '0', '0.00', '36000.00', NULL, 1, 36000, 0, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:35', '2022-04-05 12:27:14'),
(13, 4, 3, 38, 73, 0, 'J05T12FOVA', '', 1, '2022-04-05', '0', '0.00', '2070.00', NULL, 0, 0, 2070, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:35', '2022-04-05 12:29:41'),
(14, 4, 3, 38, 73, 0, 'J05T13OS15', '', 1, '2022-04-05', '0', '13600.00', '98600.00', NULL, 0, 0, 98600, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 07:51:35', '2022-04-05 12:46:47'),
(15, 2, 2, 2, 48, 0, 'J13T14GH5N', 'jjs', NULL, '2022-04-13', '0', '0.00', '200000.00', NULL, 0, 200000, 0, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-13 06:41:39', '2022-04-13 06:41:39'),
(16, 2, 2, 2, 69, 0, 'J13T15OB1Z', 'buvh', NULL, '2022-04-13', '0', '0.00', '200000.00', NULL, 0, 200000, 0, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-13 06:51:09', '2022-04-13 06:51:09'),
(17, 2, 2, 2, 48, 0, 'J13T16FJV5', 'fghj', NULL, '2022-04-13', '0', '0.00', '60000.00', NULL, 0, 60000, 0, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-13 06:54:31', '2022-04-13 06:54:31'),
(18, 3, 3, 2, 74, 0, 'J13T17PKJ8', '', 1, '2022-04-13', '0', '0.00', '20.00', NULL, 0, 0, 20, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-13 07:10:24', '2022-04-13 07:10:24'),
(19, 3, 1, 2, 74, 0, 'J13T18UXEB', '', 1, '2022-04-13', '0', '0.00', '0.00', NULL, 0, 0, 0, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Editted', '2022-04-28 11:55:50', '2022-04-13 07:15:42'),
(20, 1, 5, 2, 74, 2, 'P13B19NCHP', NULL, NULL, '2022-04-13', '', '0.00', '', NULL, 1, 1000, 0, 1000, 1, NULL, 0, '2022-04-13', '2022-04-15', NULL, NULL, NULL, 'hd', '2022-04-13 08:36:57', '2022-04-13 08:36:57'),
(21, 1, 5, 2, 74, 2, 'P13B2063M8', NULL, NULL, '2022-04-13', '', '0.00', '', NULL, 1, 6000, 0, 6000, 1, NULL, 0, '2022-04-13', '2022-04-15', NULL, NULL, NULL, 'hd', '2022-04-13 08:37:14', '2022-04-13 08:37:14'),
(22, 1, 5, 2, 74, 2, 'P13B21PVTQ', NULL, NULL, '2022-04-13', '', '0.00', '', NULL, 1, 6000, 0, 6000, 1, NULL, 0, '2022-04-13', '2022-04-15', NULL, NULL, NULL, 'hd', '2022-04-13 08:37:15', '2022-04-13 08:37:15'),
(23, 1, 5, 2, 74, 2, 'P13B222MVO', NULL, NULL, '2022-04-13', '', '0.00', '5000.00', NULL, 1, 5000, 0, 0, 1, NULL, 0, '2022-04-13', '2022-04-15', NULL, NULL, NULL, 'dhdh', '2022-04-13 08:38:29', '2022-04-13 08:38:29'),
(24, 1, 5, 2, 75, 2, 'P13B239X5E', NULL, NULL, '2022-04-13', '', '0.00', '20000.00', NULL, 1, 20000, 0, 0, 1, NULL, 0, '2022-04-13', '2022-04-15', NULL, NULL, NULL, 'hdhhd', '2022-04-13 09:08:25', '2022-04-13 09:08:25'),
(25, 1, 5, 2, 75, 2, 'P13B24HJUV', NULL, NULL, '2022-04-13', '', '0.00', '20000.00', NULL, 1, 20000, 0, 0, 1, NULL, 0, '2022-04-13', '2022-04-15', NULL, NULL, NULL, 'hdhhd', '2022-04-13 09:08:36', '2022-04-13 09:08:36'),
(26, 3, 1, 2, 76, 0, 'J13T25S301', '', 1, '2022-04-13', '0', '0.00', '80.00', NULL, 0, 80, 0, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-13 15:00:55', '2022-04-13 15:00:55'),
(27, 3, 1, 2, 76, 0, 'J13T26WJ63', '', 1, '2022-04-13', '0', '0.00', '80.00', NULL, 0, 80, 0, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-13 15:05:02', '2022-04-13 15:05:02'),
(28, 2, 2, 2, 69, 3, 'J14T273ONL', '1dnd', NULL, '2022-04-14', '0', '0.00', '100000.00', NULL, 0, 100000, 0, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-14 08:19:16', '2022-04-14 08:19:16'),
(29, 3, 1, 2, 77, 0, 'J14T286WEJ', '', 1, '2022-04-14', '0', '0.00', '0.00', NULL, 0, 110, 0, 110, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-14 08:25:47', '2022-04-14 08:25:47'),
(30, 2, 1, 2, 78, 0, 'J26T29RIT5', '', 1, '2022-04-26', '0', '0.00', '0.00', NULL, 0, 220, -220, 220, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Editted', '2022-04-28 10:59:10', '2022-04-26 14:30:47'),
(31, 2, 3, 2, 73, 2, 'J26T307CIU', '', 1, '2022-04-26', '0', '0.00', '220.00', NULL, 1, 0, 0, 0, 1, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-26 14:54:53', '2022-04-26 14:53:51'),
(32, 2, 2, 2, 48, 2, 'J27T31S15G', 'sdfghj', NULL, '2022-04-27', '0', '0.00', '20000.00', NULL, 0, 20000, 0, 0, 1, NULL, 200, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-27 08:38:31', '2022-04-27 08:38:31'),
(33, 2, 1, 2, 73, 0, 'J04T32K93E', '', 1, '2022-05-04', '0', '0.00', '440.00', NULL, 0, 500, 0, 60, 1, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-04 07:56:36', '2022-05-04 07:56:36'),
(34, 2, 1, 2, 73, 0, 'J07T33Z1V8', '', 1, '2022-06-07', '0', '0.00', '200.00', NULL, 0, 1000, 0, 0, 1, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-07 11:50:18', '2022-06-07 11:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `transaction_type_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `qty_returned` int(11) DEFAULT 0,
  `tax_id` int(11) NOT NULL,
  `buying_price` double DEFAULT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `is_editted` tinyint(1) NOT NULL DEFAULT 0,
  `print_session` varchar(60) DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `transaction_type_id`, `store_id`, `order_id`, `item_id`, `qty`, `qty_returned`, `tax_id`, `buying_price`, `rate`, `amount`, `is_editted`, `print_session`, `entity_id`, `date_modified`, `time_stamp`) VALUES
(1, 4, 3, 1, 144, '130', 0, 0, 1200, '1200', '156000', 0, NULL, NULL, '2022-04-11 07:51:35', '2022-03-29 02:43:41'),
(2, 4, 3, 1, 142, '210', 0, 0, 1050, '1050', '220500', 0, NULL, NULL, '2022-04-11 07:51:35', '2022-03-29 02:43:41'),
(3, 4, 3, 2, 144, '270', 0, 0, 1050, '1050', '283500', 0, NULL, NULL, '2022-04-11 07:51:35', '2022-03-29 02:51:10'),
(4, 3, 3, 3, 4, '2', 0, 0, 2000, '3000', '6000.00', 0, NULL, NULL, '2022-04-11 07:51:35', '2022-03-29 03:06:22'),
(5, 4, 2, 4, 144, '100', 0, 0, 1050, '1050', '105000.00', 0, NULL, NULL, '2022-04-11 07:51:35', '2022-03-31 04:26:05'),
(6, 4, 2, 4, 143, '30', 0, 0, 3000, '3000', '90000', 0, NULL, NULL, '2022-04-11 07:51:35', '2022-03-31 04:26:05'),
(7, 3, 4, 5, 144, '1', 0, 13600, 80000, '85000', '98600', 0, NULL, NULL, '2022-04-11 07:51:35', '2022-03-31 05:17:46'),
(8, 3, 4, 5, 143, '10', 0, 0, 900, '1035', '10350.00', 0, NULL, NULL, '2022-04-11 07:51:35', '2022-03-31 05:17:46'),
(9, 3, 4, 6, 17, '1', 0, 0, 2600, '3600', '3600', 0, NULL, NULL, '2022-04-11 07:51:35', '2022-03-31 05:18:57'),
(10, 3, 4, 7, 17, '1', 0, 0, 2600, '3600', '3600', 0, NULL, NULL, '2022-04-11 07:51:35', '2022-03-31 05:19:43'),
(11, 3, 4, 7, 143, '10', 0, 0, 900, '1035', '10350.00', 0, NULL, NULL, '2022-04-11 07:51:35', '2022-03-31 05:19:43'),
(12, 1, 1, 8, 8, '2', 0, 0, 3600, '3600', '7200.00', 0, NULL, NULL, '2022-04-11 07:51:35', '2022-04-05 10:54:43'),
(13, 1, 4, 9, 8, '1', 0, 0, 3600, '3600', '3600', 0, NULL, NULL, '2022-04-11 07:51:35', '2022-04-05 11:22:15'),
(14, 1, 4, 10, 8, '1', 0, 0, 3600, '3600', '3600', 0, NULL, NULL, '2022-04-11 07:51:35', '2022-04-05 11:24:46'),
(15, 1, 4, 11, 8, '4', 0, 0, 3600, '3600', '14400.00', 0, NULL, NULL, '2022-04-11 07:51:35', '2022-04-05 11:53:50'),
(16, 1, 4, 12, 8, '1', 0, 0, 36000, '36000', '36000.00', 0, NULL, NULL, '2022-04-11 07:51:35', '2022-04-05 12:27:15'),
(17, 3, 4, 13, 143, '2', 0, 0, 1035, '1035', '2070.00', 0, NULL, NULL, '2022-04-11 07:51:35', '2022-04-05 12:29:41'),
(18, 3, 4, 14, 144, '1', 0, 13600, 85000, '85000', '98600', 0, NULL, NULL, '2022-04-11 07:51:35', '2022-04-05 12:46:48'),
(19, 2, 2, 15, 145, '20', 0, 0, 10000, '10000', '200000', 0, NULL, NULL, '2022-04-13 06:41:39', '2022-04-13 06:41:39'),
(20, 2, 2, 16, 146, '10', 0, 0, 20000, '20000', '200000', 0, NULL, NULL, '2022-04-13 06:51:09', '2022-04-13 06:51:09'),
(21, 2, 2, 17, 147, '60', 0, 0, 1000, '1000', '60000', 0, NULL, NULL, '2022-04-13 06:54:31', '2022-04-13 06:54:31'),
(22, 3, 3, 18, 139, '1', 0, 0, 3200, '3200', '3200', 0, NULL, NULL, '2022-04-13 07:10:24', '2022-04-13 07:10:24'),
(23, 1, 3, 19, 140, '1', 0, 0, 150, '150', '150', 0, NULL, NULL, '2022-04-13 07:15:42', '2022-04-13 07:15:42'),
(24, 1, 3, 26, 141, '4', 0, 0, 20, '20', '80.00', 0, NULL, NULL, '2022-04-13 15:00:56', '2022-04-13 15:00:56'),
(25, 1, 3, 27, 141, '4', 0, 0, 20, '20', '80.00', 0, NULL, NULL, '2022-04-13 15:05:02', '2022-04-13 15:05:02'),
(26, 2, 2, 28, 148, '10', 0, 0, 10000, '10000', '100000', 0, NULL, NULL, '2022-04-14 08:19:16', '2022-04-14 08:19:16'),
(27, 1, 3, 29, 149, '1', 0, 0, 110, '110', '110', 0, NULL, NULL, '2022-04-14 08:25:47', '2022-04-14 08:25:47'),
(28, 1, 2, 30, 4, '1', 0, 0, 220, '220', '220', 0, NULL, 2, '2022-04-26 14:30:47', '2022-04-26 14:30:47'),
(29, 3, 2, 31, 2, '1', 0, 0, 220, '220', '220', 0, NULL, 2, '2022-04-26 14:53:51', '2022-04-26 14:53:51'),
(30, 2, 2, 32, 145, '20', 0, 0, 1000, '1000', '20000', 0, NULL, 2, '2022-04-27 08:38:31', '2022-04-27 08:38:31'),
(31, 1, 2, 33, 3, '2', 0, 0, 220, '220', '440.00', 0, NULL, 2, '2022-05-04 07:56:36', '2022-05-04 07:56:36'),
(32, 1, 2, 34, 4, '1', 0, 0, 220, '220', '220', 0, NULL, 2, '2022-06-07 11:50:18', '2022-06-07 11:50:18');

--
-- Triggers `order_items`
--
DELIMITER $$
CREATE TRIGGER `order_items_update_item_availability` AFTER INSERT ON `order_items` FOR EACH ROW BEGIN
   

    IF NEW.transaction_type_id = 1 THEN
      
      UPDATE items SET available_qty = (available_qty - NEW.qty) WHERE item_id = NEW.item_id;
      UPDATE items_store SET available_qty = (available_qty - NEW.qty) WHERE item_id = NEW.item_id AND store_id = NEW.store_id;
     
     ELSEIF NEW.transaction_type_id = 3 THEN
      
      UPDATE items SET available_qty = (available_qty - NEW.qty) WHERE item_id = NEW.item_id;
      UPDATE items_store SET available_qty = (available_qty - NEW.qty) WHERE item_id = NEW.item_id AND store_id = NEW.store_id;
      
      ELSEIF NEW.transaction_type_id = 2 THEN
      
      UPDATE items SET available_qty = (available_qty + NEW.qty) WHERE item_id = NEW.item_id;
      UPDATE items_store SET available_qty = (available_qty + NEW.qty) WHERE item_id = NEW.item_id AND store_id = NEW.store_id;
      
      ELSEIF NEW.transaction_type_id = 4 THEN
      
      UPDATE items SET available_qty = (available_qty + NEW.qty) WHERE item_id = NEW.item_id;
      UPDATE items_store SET available_qty = (available_qty + NEW.qty) WHERE item_id = NEW.item_id AND store_id = NEW.store_id;
      
      
    END IF;
   
      END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `order_payments`
--

CREATE TABLE `order_payments` (
  `order_payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL COMMENT 'the person who trigers this action in the system',
  `payment_amount` double NOT NULL,
  `payment_date` date NOT NULL,
  `transaction_code` varchar(50) DEFAULT NULL,
  `other_reference` varchar(50) DEFAULT NULL,
  `bank_account_number` int(11) DEFAULT NULL,
  `check_number` varchar(30) DEFAULT NULL,
  `check_maturity_date` date DEFAULT NULL,
  `paid_by` varchar(50) DEFAULT NULL,
  `narrative` varchar(150) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_payments`
--

INSERT INTO `order_payments` (`order_payment_id`, `order_id`, `account_id`, `entity_id`, `payment_amount`, `payment_date`, `transaction_code`, `other_reference`, `bank_account_number`, `check_number`, `check_maturity_date`, `paid_by`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 2, 2, 1, 283500, '2022-03-29', 'J29T237TH5EWF1L', 'etryuiu09565', 0, '', '0000-00-00', 'reagan omosh', '1234567891011121', '2022-04-11 07:51:36', '2022-03-29 02:57:10'),
(2, 3, 2, 1, 3000, '2022-03-29', 'J29T3DQKVC3YNZ2', 'NA', 0, '', '0000-00-00', '', '', '2022-04-11 07:51:36', '2022-03-29 03:31:27'),
(3, 4, 2, 2, 5000, '2022-03-31', 'J31T3SLMQW', 'NA', 0, '', '0000-00-00', '69', 'Purchase payment; cash.', '2022-04-11 07:51:36', '2022-03-31 04:26:05'),
(4, 4, 6, 2, 100000, '2022-03-31', 'J31T4RVPUC0WG9F', 'yuiuwoiee', 1128292233, 'NA', '0000-00-00', 'Reagan', 'Test narrative', '2022-04-11 07:51:36', '2022-03-31 04:30:06'),
(5, 4, 2, 2, 90000, '2022-03-31', 'J31T4Y1L7K2MP4F', 'NA', 0, '', '0000-00-00', 'Reagan', 'Test2 Narrative', '2022-04-11 07:51:36', '2022-03-31 04:30:47'),
(6, 7, 3, 2, 13950, '2022-03-31', 'J31T76P5DQ1CEU4', '34546789', 0, '', '0000-00-00', 'Reagan', '', '2022-04-11 07:51:36', '2022-03-31 05:27:21'),
(7, 8, 0, 38, 7200, '2022-04-05', 'J05T7LUV21', '', 0, '', '0000-00-00', '73', 'Sale payment; cash.', '2022-04-11 07:51:36', '2022-04-05 10:54:44'),
(8, 9, 0, 38, 3600, '2022-04-05', 'J05T8MKYLJ', '', 0, '', '0000-00-00', '73', 'Sale payment; cash.', '2022-04-11 07:51:36', '2022-04-05 11:22:17'),
(9, 10, 0, 38, 3600, '2022-04-05', 'J05T9I2540', '', 0, '', '0000-00-00', '73', 'Sale payment; cash.', '2022-04-11 07:51:36', '2022-04-05 11:24:48'),
(10, 11, 0, 38, 14400, '2022-04-05', 'J05T100ICT', '', 0, '', '0000-00-00', '73', 'Sale payment; cash.', '2022-04-11 07:51:36', '2022-04-05 11:53:51'),
(11, 12, 0, 38, 36000, '2022-04-05', 'J05T11URW0', '', 0, '', '0000-00-00', '73', 'Sale payment; cash.', '2022-04-11 07:51:36', '2022-04-05 12:27:16'),
(12, 15, 0, 2, 200000, '2022-04-13', 'J13T14GH5N', 'jjs', 0, '', '0000-00-00', '48', 'Purchase payment; cash.', '2022-04-13 06:41:39', '2022-04-13 06:41:39'),
(13, 16, 0, 2, 200000, '2022-04-13', 'J13T15OB1Z', 'buvh', 0, '', '0000-00-00', '69', 'Purchase payment; cash.', '2022-04-13 06:51:09', '2022-04-13 06:51:09'),
(14, 17, 0, 2, 60000, '2022-04-13', 'J13T16FJV5', 'fghj', 0, '', '0000-00-00', '48', 'Purchase payment; cash.', '2022-04-13 06:54:31', '2022-04-13 06:54:31'),
(15, 26, 0, 2, 80, '2022-04-13', 'J13T25S301', '', 0, '', '0000-00-00', '76', 'Sale payment; cash.', '2022-04-13 15:00:56', '2022-04-13 15:00:56'),
(16, 27, 0, 2, 80, '2022-04-13', 'J13T26WJ63', '', 0, '', '0000-00-00', '76', 'Sale payment; cash.', '2022-04-13 15:05:03', '2022-04-13 15:05:03'),
(17, 28, 3, 2, 100000, '2022-04-14', 'J14T273ONL', '1dnd', 0, '', '0000-00-00', '69', 'Purchase payment; cash.', '2022-04-14 08:19:17', '2022-04-14 08:19:17'),
(18, 29, 0, 2, 110, '2022-04-14', 'J14T286WEJ', '', 0, '', '0000-00-00', '77', 'Sale payment; cash.', '2022-04-14 08:25:47', '2022-04-14 08:25:47'),
(19, 30, 0, 2, 220, '2022-04-26', 'J26T29RIT5', '', 0, '', '0000-00-00', '78', 'Sale payment; cash.', '2022-04-26 14:30:47', '2022-04-26 14:30:47'),
(20, 31, 2, 2, 220, '2022-04-26', 'J26T31H0857YBVUO', 'dfgh', 0, '', '0000-00-00', '', '', '2022-04-26 14:54:52', '2022-04-26 14:54:52'),
(21, 32, 2, 2, 20000, '2022-04-27', 'J27T31S15G', 'sdfghj', 0, '', '0000-00-00', '48', 'Purchase payment; cash.', '2022-04-27 08:38:31', '2022-04-27 08:38:31'),
(22, 33, 0, 2, 500, '2022-05-04', 'J04T32K93E', '', 0, '', '0000-00-00', '73', 'Sale payment; cash.', '2022-05-04 07:56:36', '2022-05-04 07:56:36'),
(23, 34, 0, 2, 1000, '2022-06-07', 'J07T33Z1V8', '', 0, '', '0000-00-00', '73', 'Sale payment; cash.', '2022-06-07 11:50:18', '2022-06-07 11:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `order_purchases`
--

CREATE TABLE `order_purchases` (
  `order_purchase_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `brand_model_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `model_year` int(11) DEFAULT NULL,
  `capacity` varchar(30) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `imei` varchar(50) DEFAULT NULL,
  `selling_price` double DEFAULT NULL,
  `price_estimate` double DEFAULT NULL,
  `image` text DEFAULT NULL,
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orgs`
--

CREATE TABLE `orgs` (
  `org_id` int(11) NOT NULL,
  `parent_org` int(11) DEFAULT NULL,
  `org_name` varchar(100) NOT NULL,
  `address` varchar(156) DEFAULT NULL,
  `box_number` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `currency_id` int(11) NOT NULL DEFAULT 1,
  `country_id` int(11) NOT NULL DEFAULT 1,
  `pos_mode` int(11) NOT NULL DEFAULT 1,
  `default_sp` varchar(10) DEFAULT 'no',
  `mpesa_details` varchar(100) DEFAULT NULL,
  `organization_type` enum('Retail','Restaurant','Other') NOT NULL DEFAULT 'Other',
  `kra_pin` varchar(20) DEFAULT NULL,
  `vat_no` varchar(20) DEFAULT NULL,
  `narrative` text DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orgs`
--

INSERT INTO `orgs` (`org_id`, `parent_org`, `org_name`, `address`, `box_number`, `email`, `phone`, `active`, `currency_id`, `country_id`, `pos_mode`, `default_sp`, `mpesa_details`, `organization_type`, `kra_pin`, `vat_no`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, NULL, 'iOSoft Technologies', '', NULL, 'ifno@jiwnaitech.com', '0738555869', 1, 1, 119, 1, 'no', NULL, 'Other', NULL, NULL, '', '2022-04-19 09:52:25', '0000-00-00 00:00:00'),
(2, 2, 'Main Store', 'Test address', '', 'address@gmail.com', '070778966', 0, 1, 119, 0, 'yes', NULL, '', NULL, NULL, 'Main store narrative', '2022-04-28 11:49:44', '2021-01-13 20:33:07'),
(3, 1, 'Juja', 'kdsfjslk', NULL, 'juja@sjd.csk', '5155555', 0, 1, 119, 1, 'no', NULL, 'Other', NULL, NULL, 'ccvjcvjcvcx cx c', '2022-04-11 07:51:37', '2021-01-12 06:52:36'),
(4, 1, 'Kisumu Store', '153 - 40401', NULL, 'kisumu@mail.com', '0734353434333', 0, 1, 119, 1, 'no', NULL, 'Other', NULL, NULL, '', '2022-04-11 07:51:37', '2022-02-03 15:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `package_types`
--

CREATE TABLE `package_types` (
  `package_type_id` int(11) NOT NULL,
  `package_type_name` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `expense_id` int(11) NOT NULL,
  `subaccount_type_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `payment_amount` double NOT NULL,
  `payment_date` date NOT NULL,
  `check_no` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `narrative` varchar(50) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `expense_id`, `subaccount_type_id`, `account_id`, `reference`, `payment_amount`, `payment_date`, `check_no`, `created_by`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 3, 1, 6, '20220331085714', 400, '2022-03-31', 'wetryiyuo', 2, 1, 'Test expense', '2022-04-11 07:51:37', '2022-03-31 05:57:14'),
(2, 3, 1, 6, '20220331085735', 200, '2022-03-31', 'wrertiu', 2, 1, 'Test expense', '2022-04-11 07:51:37', '2022-03-31 05:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `payment_mode_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `payment_mode_name` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `narrative` varchar(156) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_modes`
--

INSERT INTO `payment_modes` (`payment_mode_id`, `org_id`, `payment_mode_name`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 1, 'Bank', 1, NULL, '2022-04-11 07:51:38', '2020-02-16 14:34:19'),
(2, 1, 'Cash', 1, NULL, '2022-04-11 07:51:38', '2020-02-16 14:34:19'),
(3, 1, 'MPesa', 1, NULL, '2022-04-11 07:51:38', '2020-02-16 14:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `petty_cash`
--

CREATE TABLE `petty_cash` (
  `id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `entity_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `pettycash_amount` decimal(10,2) DEFAULT NULL,
  `pettycash_date` date DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `paid_by` int(11) DEFAULT NULL,
  `reference` varchar(100) NOT NULL,
  `narrative` varchar(200) DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `approvedby_one` int(11) DEFAULT NULL,
  `approvedby_two` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petty_cash`
--

INSERT INTO `petty_cash` (`id`, `org_id`, `entity_id`, `term_id`, `department_id`, `account_id`, `pettycash_amount`, `pettycash_date`, `status_id`, `paid_by`, `reference`, `narrative`, `date_modified`, `time_stamp`, `approvedby_one`, `approvedby_two`) VALUES
(1, 1, 2, 0, 1, 8, '800.00', '2022-03-31', 1, 2, '20220331084724', 'test narrative', '2022-04-11 07:51:38', '2022-03-31 05:47:24', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loan_disbursed_by_id` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `interest_method` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `interest_rate` decimal(10,2) DEFAULT NULL,
  `interest_period` enum('day','week','month','year') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loan_duration` int(11) DEFAULT NULL,
  `default_loan_duration` int(11) DEFAULT NULL,
  `default_loan_duration_type` enum('day','week','month','year') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `repayment_cycle` enum('daily','weekly','monthly','bi_monthly','quarterly','semi_annually','annually') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loan_fees_schedule` enum('dont_include','distribute_fees_evenly','charge_fees_on_released_date','charge_fees_on_first_payment','charge_fees_on_last_payment') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `product_name`, `loan_disbursed_by_id`, `interest_method`, `interest_rate`, `interest_period`, `loan_duration`, `default_loan_duration`, `default_loan_duration_type`, `repayment_cycle`, `loan_fees_schedule`) VALUES
(1, 1, 'Normal', NULL, 'reducing_balance', '12.00', 'year', 48, 48, 'month', 'monthly', 'distribute_fees_evenly'),
(2, NULL, 'Instant', NULL, 'flat_rate', '4.00', 'year', 7, 7, 'day', 'weekly', 'distribute_fees_evenly');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `permission` text NOT NULL,
  `narrative` text DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `permission`, `narrative`, `active`, `date_modified`, `time_stamp`) VALUES
(1, 'Administrator', '', NULL, 1, '2020-10-12 12:22:37', '2020-10-12 12:22:37'),
(2, 'Waiter', '', NULL, 1, '2020-04-03 10:52:02', '2020-04-03 10:52:02'),
(3, 'Supplier', '', NULL, 1, '2020-04-11 22:05:34', '2020-04-11 22:05:34'),
(4, 'Customer', '', NULL, 1, '2020-04-11 22:05:34', '2020-04-11 22:05:34'),
(5, 'Receptionist', '', NULL, 1, '2020-10-12 11:00:12', '2020-10-12 11:00:12'),
(7, 'Cashier', '', NULL, 1, '2020-10-13 15:50:51', '2020-10-13 15:50:51'),
(8, 'Test one two', '[\"general_add\",\"general_edit\",\"general_delete\",\"general_view\"]', '', 1, '2022-03-18 08:53:02', '2022-03-18 08:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `room_type_id` int(11) NOT NULL,
  `room_name` varchar(30) NOT NULL,
  `room_rate` double DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` text DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `org_id`, `room_type_id`, `room_name`, `room_rate`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 1, 1, 'A1', 2000, 0, '', '2022-04-11 07:51:39', '2020-10-14 05:34:04'),
(2, 1, 1, 'A2', 2000, 0, '', '2022-04-11 07:51:39', '2020-10-15 17:53:48'),
(3, 1, 1, 'A3', 2500, 0, 'latest', '2022-04-13 08:38:29', '2022-04-13 08:30:31'),
(4, 1, 2, 'A1', 10000, 0, 'gut', '2022-04-13 09:08:26', '2022-04-13 09:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `rooms_booked`
--

CREATE TABLE `rooms_booked` (
  `booked_room_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_rate` double NOT NULL,
  `tax` double NOT NULL,
  `amount` double NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms_booked`
--

INSERT INTO `rooms_booked` (`booked_room_id`, `order_id`, `room_id`, `room_rate`, `tax`, `amount`, `time_stamp`, `date_modified`) VALUES
(7, 18, 1, 2000, 0, 2000, '2020-10-16 07:02:02', '2022-04-11 07:51:40'),
(8, 23, 2, 2000, 0, 2000, '2020-10-19 03:34:28', '2022-04-11 07:51:40'),
(9, 23, 3, 2500, 0, 5000, '2022-04-13 08:38:29', '2022-04-13 08:38:29'),
(10, 24, 4, 10000, 0, 20000, '2022-04-13 09:08:26', '2022-04-13 09:08:26'),
(11, 25, 4, 10000, 0, 20000, '2022-04-13 09:08:36', '2022-04-13 09:08:36');

--
-- Triggers `rooms_booked`
--
DELIMITER $$
CREATE TRIGGER `book_room_trigger` AFTER INSERT ON `rooms_booked` FOR EACH ROW UPDATE rooms SET active = 0 WHERE room_id = NEW.room_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `room_type_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `room_type_name` varchar(30) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` text DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`room_type_id`, `org_id`, `room_type_name`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 1, 'Delux', 1, '', '2022-04-11 07:51:41', '2020-10-14 05:33:49'),
(2, 1, 'Ensuite', 1, 'fit for president', '2022-04-13 09:05:56', '2022-04-13 09:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `sms_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `entity_id` int(11) DEFAULT NULL,
  `template_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `table_name` varchar(30) NOT NULL,
  `code` varchar(30) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text DEFAULT NULL,
  `sent` tinyint(1) NOT NULL DEFAULT 0,
  `narrative` varchar(20) DEFAULT NULL,
  `time_stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`sms_id`, `org_id`, `entity_id`, `template_id`, `table_id`, `table_name`, `code`, `phone`, `message`, `sent`, `narrative`, `time_stamp`) VALUES
(1, 1, 3, 1, 123, 'students', NULL, '0707866136', 'School fee balance for ADM2378/19 ROSEKATE AGOSA JUMBA is Ksh0.00. Always pay fee in time. MALINDI PREMIER SCH', 0, 'Fee Balance', '2021-10-14 06:44:11'),
(2, 1, 3, 1, 72, 'fee_payment', NULL, '0707866136', '20211014095145 received. You paid Ksh94,965.00 for ADM10064/21 Gianna Noni  at 2021-10-14 09:51:45. New fee balance is Ksh85,000.00 ', 0, 'Fee Payment', '2021-10-14 06:51:45'),
(3, 1, 3, 1, 73, 'fee_payment', NULL, '0707866136', '20211014095638 received. You paid Ksh85,000.00 for ADM10064/21 Gianna Noni  at 2021-10-14 09:56:38. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 06:56:38'),
(4, 1, 4, 1, 611, 'students', NULL, '0707866136', 'School fee balance for ADM3285/21 BRAVIN KIPKORIR  is Ksh-1,905.00. Always pay fee in time. MALINDI PREMIER SCH', 0, 'Fee Balance', '2021-10-14 07:34:45'),
(26, 1, 3, 1, 97, 'fee_payment', NULL, '0707866136', '20211014140523 received. You paid Ksh53,065.00 for ADM2277/16 DANTE MUASA MULWA at 2021-10-14 14:05:23. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-14 11:05:23'),
(6, 1, 4, 1, 74, 'fee_payment', NULL, '0707866136', '20211014104013 received. You paid Ksh1,000.00 for ADM3285/21 BRAVIN KIPKORIR  at 2021-10-14 10:40:13. New fee balance is Ksh-2,905.00 ', 1, 'Fee Payment', '2021-10-14 07:40:13'),
(7, 1, 1, 1, 611, 'students', NULL, '0707866136', 'School fee balance for ADM3285/21 BRAVIN KIPKORIR  is Ksh-2,905.00. Always pay fee in time. The Nyali School', 1, 'Fee Balance', '2021-10-14 07:41:55'),
(8, 1, 3, 1, 77, 'fee_payment', NULL, '0707866136', '20211014111118 received. You paid Ksh56,165.00 for ADM3250/21 WENCY OMANYO  at 2021-10-14 11:11:18. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-14 08:11:18'),
(9, 1, 3, 1, 78, 'fee_payment', NULL, '0707866136', '20211014111318 received. You paid Ksh71,465.00 for ADM1983/15 WHITNEY ELLEN OMANYO at 2021-10-14 11:13:18. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-14 08:13:18'),
(10, 1, 3, 1, 79, 'fee_payment', NULL, '0707866136', '20211014115652 received. You paid Ksh40,665.00 for ADM3089/20 ETHAN ANDREW KADIKINY at 2021-10-14 11:56:52. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 08:56:52'),
(11, 1, 3, 1, 81, 'fee_payment', NULL, '0707866136', '20211014115953 received. You paid Ksh19,230.00 for ADM3343/21 HAZEL MARIE KADIKINY at 2021-10-14 11:59:53. New fee balance is Ksh17,035.00 ', 0, 'Fee Payment', '2021-10-14 08:59:53'),
(12, 1, 3, 1, 82, 'fee_payment', NULL, '0707866136', '20211014120125 received. You paid Ksh17,035.00 for ADM3343/21 HAZEL MARIE KADIKINY at 2021-10-14 12:01:25. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 09:01:26'),
(13, 1, 3, 1, 83, 'fee_payment', NULL, '0707866136', '20211014122436 received. You paid Ksh49,165.00 for ADM2503/19 ELIJAH MWANGI NJUGUNA at 2021-10-14 12:24:36. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 09:24:36'),
(14, 1, 3, 1, 84, 'fee_payment', NULL, '0707866136', '20211014122615 received. You paid Ksh50,835.00 for ADM2502/19 JIMMY MUIRURI NJUNGUNA at 2021-10-14 12:26:15. New fee balance is Ksh-1,670.00 ', 0, 'Fee Payment', '2021-10-14 09:26:15'),
(15, 1, 4, 1, 85, 'fee_payment', NULL, '0707866136', '20211014130111 received. You paid Ksh51,465.00 for ADM3304/21 DARRELL CLEM MUMIA at 2021-10-14 13:01:11. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 10:01:11'),
(16, 1, 4, 1, 86, 'fee_payment', NULL, '0707866136', '20211014131015 received. You paid Ksh31,765.00 for ADM3132/20 ESTHER NDUTA  at 2021-10-14 13:10:15. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 10:10:16'),
(17, 1, 4, 1, 87, 'fee_payment', NULL, '0707866136', '20211014131128 received. You paid Ksh40,665.00 for ADM3101/20 DANSON MUGANE NDUNGU at 2021-10-14 13:11:28. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 10:11:28'),
(18, 1, 4, 1, 88, 'fee_payment', NULL, '0707866136', '20211014131214 received. You paid Ksh37,465.00 for ADM3307/21 MOSES KARIUKI NDUNGU at 2021-10-14 13:12:14. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 10:12:14'),
(19, 1, 4, 1, 89, 'fee_payment', NULL, '0707866136', '20211014131259 received. You paid Ksh38,455.00 for ADM3307/21 MOSES KARIUKI NDUNGU at 2021-10-14 13:12:59. New fee balance is Ksh-38,455.00 ', 0, 'Fee Payment', '2021-10-14 10:12:59'),
(20, 1, 4, 1, 90, 'fee_payment', NULL, '0707866136', '20211014131910 received. You paid Ksh45,045.00 for ADM3065/20 AIDEEN MUGO WANJOHI at 2021-10-14 13:19:10. New fee balance is Ksh620.00 ', 0, 'Fee Payment', '2021-10-14 10:19:10'),
(21, 1, 4, 1, 91, 'fee_payment', NULL, '0707866136', '20211014132110 received. You paid Ksh44,015.00 for ADM1951/14 NATHAN WAGAKI WAIRI at 2021-10-14 13:21:10. New fee balance is Ksh2,450.00 ', 0, 'Fee Payment', '2021-10-14 10:21:10'),
(22, 1, 4, 1, 92, 'fee_payment', NULL, '0707866136', '20211014132234 received. You paid Ksh31,765.00 for ADM3053/20 KHAIRAN KHUWEYLID RASHID at 2021-10-14 13:22:34. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 10:22:34'),
(23, 1, 4, 1, 94, 'fee_payment', NULL, '0707866136', '20211014132554 received. You paid Ksh37,465.00 for ADM1808/13 KHUNAYS KHUWEILID  at 2021-10-14 13:25:54. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 10:25:54'),
(24, 1, 4, 1, 95, 'fee_payment', NULL, '0707866136', '20211014132652 received. You paid Ksh37,465.00 for ADM2689/15 KHADIJA KHUWEILID  at 2021-10-14 13:26:52. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 10:26:52'),
(25, 1, 4, 1, 96, 'fee_payment', NULL, '0707866136', '20211014133023 received. You paid Ksh30,000.00 for ADM3363/21 IVANNA MORAA ONDIEKI at 2021-10-14 13:30:23. New fee balance is Ksh17,265.00 ', 0, 'Fee Payment', '2021-10-14 10:30:23'),
(27, 1, 3, 1, 98, 'fee_payment', NULL, '0707866136', '20211014140645 received. You paid Ksh51,935.00 for ADM2278/16 JOAN MWIKALI MWIKALI at 2021-10-14 14:06:45. New fee balance is Ksh3,430.00 ', 1, 'Fee Payment', '2021-10-14 11:06:45'),
(28, 1, 3, 1, 99, 'fee_payment', NULL, '0707866136', '20211014140903 received. You paid Ksh48,715.00 for ADM1717/14 ANGEL KAYLA NYANDUKO at 2021-10-14 14:09:03. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 11:09:03'),
(29, 1, 3, 1, 100, 'fee_payment', NULL, '0707866136', '20211014151726 received. You paid Ksh66,095.00 for ADM1968/13 SAFIYA ALI  at 2021-10-14 15:17:26. New fee balance is Ksh-1,630.00 ', 0, 'Fee Payment', '2021-10-14 12:17:26'),
(30, 1, 3, 1, 101, 'fee_payment', NULL, '0707866136', '20211014152015 received. You paid Ksh73,965.00 for ADM1511/12 YAHYA ALI  at 2021-10-14 15:20:15. New fee balance is Ksh1,630.00 ', 0, 'Fee Payment', '2021-10-14 12:20:15'),
(31, 1, 3, 1, 102, 'fee_payment', NULL, '0707866136', '20211014161017 received. You paid Ksh55,965.00 for ADM2070/16 WAISWA SAID MOHAMED at 2021-10-14 16:10:17. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 13:10:17'),
(32, 1, 4, 1, 103, 'fee_payment', NULL, '0707866136', '20211014180830 received. You paid Ksh7,500.00 for ADM3205/21 DANA KERRIE NYAMVULA at 2021-10-14 18:08:30. New fee balance is Ksh7,254.80 ', 0, 'Fee Payment', '2021-10-14 15:08:30'),
(33, 1, 4, 1, 104, 'fee_payment', NULL, '0707866136', '20211014180933 received. You paid Ksh7,500.00 for ADM3204/21 DAMIAN HAWI KURI at 2021-10-14 18:09:33. New fee balance is Ksh5,654.80 ', 0, 'Fee Payment', '2021-10-14 15:09:33'),
(34, 1, 4, 1, 105, 'fee_payment', NULL, '0707866136', '20211014181048 received. You paid Ksh30,545.00 for ADM3122/20 JAY KARIUKI NJOROGE at 2021-10-14 18:10:48. New fee balance is Ksh30,000.00 ', 0, 'Fee Payment', '2021-10-14 15:10:48'),
(35, 1, 4, 1, 106, 'fee_payment', NULL, '0707866136', '20211014181242 received. You paid Ksh37,000.00 for ADM3145/20 RYAN KIBET  at 2021-10-14 18:12:42. New fee balance is Ksh19,965.00 ', 0, 'Fee Payment', '2021-10-14 15:12:42'),
(36, 1, 4, 1, 107, 'fee_payment', NULL, '0707866136', '20211014181423 received. You paid Ksh50,200.00 for ADM2771/19 AMIR SHUKRAN  at 2021-10-14 18:14:23. New fee balance is Ksh-35.00 ', 0, 'Fee Payment', '2021-10-14 15:14:23'),
(37, 1, 4, 1, 108, 'fee_payment', NULL, '0707866136', '20211014181539 received. You paid Ksh48,915.00 for ADM3081/20 MARY PHYLLIS WARIARA at 2021-10-14 18:15:39. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 15:15:39'),
(38, 1, 4, 1, 109, 'fee_payment', NULL, '0707866136', '20211014181732 received. You paid Ksh45,765.00 for ADM3057/20 JOHN NGUNJIRI NDAMBIRI at 2021-10-14 18:17:32. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 15:17:32'),
(39, 1, 4, 1, 110, 'fee_payment', NULL, '0707866136', '20211014181851 received. You paid Ksh45,765.00 for ADM2776/19 JAMES KAROKI  at 2021-10-14 18:18:51. New fee balance is Ksh3,500.00 ', 0, 'Fee Payment', '2021-10-14 15:18:51'),
(40, 1, 4, 1, 111, 'fee_payment', NULL, '0707866136', '20211014182037 received. You paid Ksh45,665.00 for ADM2360/19 MORGAN MOKAYA OBIERO at 2021-10-14 18:20:37. New fee balance is Ksh-5,000.00 ', 0, 'Fee Payment', '2021-10-14 15:20:37'),
(41, 1, 4, 1, 112, 'fee_payment', NULL, '0707866136', '20211014182121 received. You paid Ksh45,765.00 for ADM2443/19 ADRIAN OBIERO  at 2021-10-14 18:21:21. New fee balance is Ksh-500.00 ', 0, 'Fee Payment', '2021-10-14 15:21:21'),
(42, 1, 4, 1, 113, 'fee_payment', NULL, '0707866136', '20211014182225 received. You paid Ksh50,000.00 for ADM2741/19 ALVIN KIRATU  at 2021-10-14 18:22:25. New fee balance is Ksh14,465.00 ', 0, 'Fee Payment', '2021-10-14 15:22:25'),
(43, 1, 4, 1, 114, 'fee_payment', NULL, '0707866136', '20211014182507 received. You paid Ksh37,000.00 for ADM3017/20 ANNA ACHIENG OKINYI at 2021-10-14 18:25:07. New fee balance is Ksh6,015.00 ', 0, 'Fee Payment', '2021-10-14 15:25:07'),
(44, 1, 4, 1, 115, 'fee_payment', NULL, '0707866136', '20211014182642 received. You paid Ksh59,250.00 for ADM3149/20 KELLAN OKELLO  at 2021-10-14 18:26:42. New fee balance is Ksh115.00 ', 0, 'Fee Payment', '2021-10-14 15:26:42'),
(45, 1, 4, 1, 116, 'fee_payment', NULL, '0707866136', '20211014182759 received. You paid Ksh100.00 for ADM3149/20 KELLAN OKELLO  at 2021-10-14 18:27:59. New fee balance is Ksh15.00 ', 0, 'Fee Payment', '2021-10-14 15:27:59'),
(46, 1, 4, 1, 117, 'fee_payment', NULL, '0707866136', '20211014182930 received. You paid Ksh9,000.00 for ADM2705/19 LINUS MUTEMI  at 2021-10-14 18:29:30. New fee balance is Ksh43,965.00 ', 0, 'Fee Payment', '2021-10-14 15:29:30'),
(47, 1, 4, 1, 118, 'fee_payment', NULL, '0707866136', '20211014183046 received. You paid Ksh6,000.00 for ADM1594/13 EMMANUEL KORI KATAMBO at 2021-10-14 18:30:46. New fee balance is Ksh44,465.00 ', 0, 'Fee Payment', '2021-10-14 15:30:46'),
(48, 1, 4, 1, 119, 'fee_payment', NULL, '0707866136', '20211014183518 received. You paid Ksh5,000.00 for ADM3054/20 AAYAN BUKHEIT ABDALLA at 2021-10-14 18:35:18. New fee balance is Ksh35,845.00 ', 0, 'Fee Payment', '2021-10-14 15:35:18'),
(49, 1, 4, 1, 120, 'fee_payment', NULL, '0707866136', '20211014183914 received. You paid Ksh69,970.00 for ADM2720/17 BRIANNA KAGUME  at 2021-10-14 18:39:14. New fee balance is Ksh-8,505.00 ', 0, 'Fee Payment', '2021-10-14 15:39:14'),
(50, 1, 4, 1, 121, 'fee_payment', NULL, '0707866136', '20211014183946 received. You paid Ksh35,765.00 for ADM2491/19 JEDI EJAA KAGUME at 2021-10-14 18:39:46. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 15:39:46'),
(51, 1, 4, 1, 122, 'fee_payment', NULL, '0707866136', '20211014184024 received. You paid Ksh36,265.00 for ADM2490/19 MAYA AMAI KAGUME at 2021-10-14 18:40:24. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 15:40:24'),
(52, 1, 4, 1, 123, 'fee_payment', NULL, '0707866136', '20211014184251 received. You paid Ksh78,515.00 for ADM1302/11 JAMAL MOHAMMED DAGO at 2021-10-14 18:42:51. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 15:42:51'),
(53, 1, 4, 1, 124, 'fee_payment', NULL, '0707866136', '20211014184325 received. You paid Ksh17,245.00 for ADM2591/16 JAMIL MOHAMED DAGO at 2021-10-14 18:43:25. New fee balance is Ksh36,420.00 ', 0, 'Fee Payment', '2021-10-14 15:43:25'),
(54, 1, 4, 1, 125, 'fee_payment', NULL, '0707866136', '20211014184435 received. You paid Ksh40,000.00 for ADM1308/11 ADIL ABDULMALIK EL-KINDY at 2021-10-14 18:44:35. New fee balance is Ksh-35,985.00 ', 0, 'Fee Payment', '2021-10-14 15:44:35'),
(55, 1, 4, 1, 126, 'fee_payment', NULL, '0707866136', '20211014184708 received. You paid Ksh50,085.00 for ADM2590/16 IKRAAM AKRAM  at 2021-10-14 18:47:08. New fee balance is Ksh-920.00 ', 0, 'Fee Payment', '2021-10-14 15:47:08'),
(56, 1, 4, 1, 127, 'fee_payment', NULL, '0707866136', '20211014184754 received. You paid Ksh46,545.00 for ADM2624/13 IKHLAAS AKRAM AWADH at 2021-10-14 18:47:54. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 15:47:54'),
(57, 1, 4, 1, 128, 'fee_payment', NULL, '0707866136', '20211014185010 received. You paid Ksh37,465.00 for ADM2093/17 ALIYAH ALI BAKARI at 2021-10-14 18:50:10. New fee balance is Ksh31,000.00 ', 0, 'Fee Payment', '2021-10-14 15:50:10'),
(58, 1, 4, 1, 129, 'fee_payment', NULL, '0707866136', '20211014185203 received. You paid Ksh46,465.00 for ADM1692/14 OMAR MOHAMMED  at 2021-10-14 18:52:03. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 15:52:03'),
(59, 1, 4, 1, 130, 'fee_payment', NULL, '0707866136', '20211014185328 received. You paid Ksh46,965.00 for ADM2675/15 SALMA SALIM ABEID at 2021-10-14 18:53:28. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 15:53:28'),
(60, 1, 4, 1, 131, 'fee_payment', NULL, '0707866136', '20211014185500 received. You paid Ksh41,165.00 for ADM2477/19 SAID RASHID  at 2021-10-14 18:55:00. New fee balance is Ksh-4,900.00 ', 0, 'Fee Payment', '2021-10-14 15:55:00'),
(61, 1, 4, 1, 132, 'fee_payment', NULL, '0707866136', '20211014185720 received. You paid Ksh37,465.00 for ADM1638/13 RAHMA RAJAB  at 2021-10-14 18:57:20. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 15:57:20'),
(62, 1, 4, 1, 133, 'fee_payment', NULL, '0707866136', '20211014185816 received. You paid Ksh35,765.00 for ADM3021/20 IBRAHIM RAJAB  at 2021-10-14 18:58:16. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 15:58:16'),
(63, 1, 4, 1, 134, 'fee_payment', NULL, '0707866136', '20211014190124 received. You paid Ksh41,630.00 for ADM2732/13 DANIEL WAWERU  at 2021-10-14 19:01:24. New fee balance is Ksh9,835.00 ', 0, 'Fee Payment', '2021-10-14 16:01:24'),
(64, 1, 4, 1, 135, 'fee_payment', NULL, '0707866136', '20211014190325 received. You paid Ksh49,165.00 for ADM3071/20 FAITH NGINA JACKSON at 2021-10-14 19:03:25. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 16:03:25'),
(65, 1, 4, 1, 136, 'fee_payment', NULL, '0707866136', '20211014190509 received. You paid Ksh61,965.00 for ADM3286/20 JOY BETTY JACKSON at 2021-10-14 19:05:09. New fee balance is Ksh12,500.00 ', 0, 'Fee Payment', '2021-10-14 16:05:09'),
(66, 1, 4, 1, 137, 'fee_payment', NULL, '0707866136', '20211014190748 received. You paid Ksh20,000.00 for ADM1956/15 SHANNON DARREN MWANGEMI at 2021-10-14 19:07:48. New fee balance is Ksh26,465.00 ', 0, 'Fee Payment', '2021-10-14 16:07:48'),
(67, 1, 4, 1, 138, 'fee_payment', NULL, '0707866136', '20211014191008 received. You paid Ksh46,965.00 for ADM2433/19 SHENNAIAH NAMUSIA AMUMBWE at 2021-10-14 19:10:08. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 16:10:08'),
(68, 1, 4, 1, 139, 'fee_payment', NULL, '0707866136', '20211014191052 received. You paid Ksh32,035.00 for ADM2432/19 BENAIAH MUHIRI  at 2021-10-14 19:10:52. New fee balance is Ksh-270.00 ', 0, 'Fee Payment', '2021-10-14 16:10:52'),
(69, 1, 4, 1, 140, 'fee_payment', NULL, '0707866136', '20211014191421 received. You paid Ksh44,015.00 for ADM2171/18 AALIYAH TWAHA ZUBEDI at 2021-10-14 19:14:21. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 16:14:21'),
(70, 1, 4, 1, 141, 'fee_payment', NULL, '0707866136', '20211014191503 received. You paid Ksh37,465.00 for ADM2172/18 AMIRA TWAHA ZUBEDI at 2021-10-14 19:15:03. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 16:15:03'),
(71, 1, 4, 1, 142, 'fee_payment', NULL, '0707866136', '20211014191553 received. You paid Ksh35,665.00 for ADM2369/19 ABDULHAKIM TWAHA ZUBEDI at 2021-10-14 19:15:53. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 16:15:53'),
(72, 1, 4, 1, 143, 'fee_payment', NULL, '0707866136', '20211014191630 received. You paid Ksh35,665.00 for ADM2782/18 FIRDAUS ZUBEDI  at 2021-10-14 19:16:30. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-14 16:16:30'),
(73, 1, 4, 1, 144, 'fee_payment', NULL, '0707866136', '20211015065711 received. You paid Ksh41,265.00 for ADM3401/12 REYNA NJERI MUEMA at 2021-10-15 06:57:11. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-15 03:57:11'),
(74, 1, 4, 1, 145, 'fee_payment', NULL, '0707866136', '20211015065819 received. You paid Ksh45,665.00 for ADM3374/21 RONY MWANDIGHA MWEMA at 2021-10-15 06:58:19. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-15 03:58:19'),
(75, 1, 4, 1, 146, 'fee_payment', NULL, '0707866136', '20211015065936 received. You paid Ksh15,000.00 for ADM2505/19 MITCHELL OROC OCHIENG at 2021-10-15 06:59:36. New fee balance is Ksh29,165.00 ', 0, 'Fee Payment', '2021-10-15 03:59:36'),
(76, 1, 4, 1, 147, 'fee_payment', NULL, '0707866136', '20211015070343 received. You paid Ksh36,165.00 for ADM2581/16 CYNTHIA MAKENA MULWA at 2021-10-15 07:03:43. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-15 04:03:43'),
(77, 1, 4, 1, 148, 'fee_payment', NULL, '0707866136', '20211015070555 received. You paid Ksh41,265.00 for ADM2391/19 TIFFANY NJERI MUE at 2021-10-15 07:05:55. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-15 04:05:55'),
(78, 1, 4, 1, 149, 'fee_payment', NULL, '0707866136', '20211015070814 received. You paid Ksh20,000.00 for ADM1713/14 SHAQUILLE MATE KINYUA at 2021-10-15 07:08:14. New fee balance is Ksh44,465.00 ', 0, 'Fee Payment', '2021-10-15 04:08:14'),
(79, 1, 4, 1, 150, 'fee_payment', NULL, '0707866136', '20211015071445 received. You paid Ksh5,000.00 for ADM2560/19 MICHAEL MDUDA  at 2021-10-15 07:14:45. New fee balance is Ksh31,165.00 ', 0, 'Fee Payment', '2021-10-15 04:14:45'),
(80, 1, 4, 1, 151, 'fee_payment', NULL, '0707866136', '20211015071635 received. You paid Ksh15,000.00 for ADM2280/17 SONYA WANJIKU MBURU at 2021-10-15 07:16:35. New fee balance is Ksh21,165.00 ', 0, 'Fee Payment', '2021-10-15 04:16:35'),
(81, 1, 4, 1, 152, 'fee_payment', NULL, '0707866136', '20211015072022 received. You paid Ksh20,000.00 for ADM1470/12 PRYNCE NYANJUI  at 2021-10-15 07:20:22. New fee balance is Ksh41,465.00 ', 0, 'Fee Payment', '2021-10-15 04:20:22'),
(82, 1, 3, 1, 153, 'fee_payment', NULL, '0707866136', '20211015072634 received. You paid Ksh36,165.00 for ADM2487/19 ZAYDEN MNAZI MWAJOTO at 2021-10-15 07:26:34. New fee balance is Ksh-4,400.00 ', 0, 'Fee Payment', '2021-10-15 04:26:34'),
(83, 1, 3, 1, 156, 'fee_payment', NULL, '0707866136', '20211015074533 received. You paid Ksh16,900.00 for ADM3217/21 DAVID WAITHAKA  at 2021-10-15 07:45:33. New fee balance is Ksh117,975.00 ', 0, 'Fee Payment', '2021-10-15 04:45:33'),
(84, 1, 4, 1, 157, 'fee_payment', NULL, '0707866136', '20211015074718 received. You paid Ksh36,165.00 for ADM2793/19 Ali Mbarak  at 2021-10-15 07:47:18. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-15 04:47:18'),
(85, 1, 4, 1, 158, 'fee_payment', NULL, '0707866136', '20211015074926 received. You paid Ksh37,465.00 for ADM2790/19 Mohamed Mbarak  at 2021-10-15 07:49:26. New fee balance is Ksh0.00 ', 0, 'Fee Payment', '2021-10-15 04:49:26'),
(86, 1, 4, 1, 159, 'fee_payment', NULL, '0707866136', '20211015075234 received. You paid Ksh30,000.00 for ADM2044/16 SHEBE MOHAMED  at 2021-10-15 07:52:34. New fee balance is Ksh25,515.00 ', 0, 'Fee Payment', '2021-10-15 04:52:34'),
(87, 1, 3, 1, 160, 'fee_payment', NULL, '0707866136', '20211015080102 received. You paid Ksh15,000.00 for ADM2583/16 TEMINA KISHAGHA  at 2021-10-15 08:01:02. New fee balance is Ksh30,665.00 ', 0, 'Fee Payment', '2021-10-15 05:01:02'),
(88, 1, 3, 1, 161, 'fee_payment', NULL, '0707866136', '20211015080400 received. You paid Ksh15,000.00 for ADM1519/12 TAMARA NYAWIRA  at 2021-10-15 08:04:00. New fee balance is Ksh40,965.00 ', 1, 'Fee Payment', '2021-10-15 05:04:00'),
(89, 1, 3, 1, 162, 'fee_payment', NULL, '0707866136', '20211015082549 received. You paid Ksh90,000.00 for ADM2142/16 ANDREW JAMES OKUMU at 2021-10-15 08:25:49. New fee balance is Ksh35,525.00 ', 1, 'Fee Payment', '2021-10-15 05:25:49'),
(90, 1, 3, 1, 163, 'fee_payment', NULL, '0707866136', '20211015082813 received. You paid Ksh30,000.00 for ADM2143/17 NOEL JONES MACHIO at 2021-10-15 08:28:13. New fee balance is Ksh17,415.00 ', 1, 'Fee Payment', '2021-10-15 05:28:13'),
(91, 1, 4, 1, 164, 'fee_payment', NULL, '0707866136', '20211015084138 received. You paid Ksh30,765.00 for ADM3040/20 JULIA CHEBET KAGAI at 2021-10-15 08:41:38. New fee balance is Ksh1,000.00 ', 1, 'Fee Payment', '2021-10-15 05:41:38'),
(92, 1, 4, 1, 165, 'fee_payment', NULL, '0707866136', '20211015084242 received. You paid Ksh36,965.00 for ADM2521/19 BRYTON MALESI  at 2021-10-15 08:42:42. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-15 05:42:42'),
(93, 1, 4, 1, 166, 'fee_payment', NULL, '0707866136', '20211015084341 received. You paid Ksh1,000.00 for ADM3040/20 JULIA CHEBET KAGAI at 2021-10-15 08:43:41. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-15 05:43:41'),
(94, 1, 4, 1, 167, 'fee_payment', NULL, '0707866136', '20211015084516 received. You paid Ksh40,000.00 for ADM3276/21 ETANA JAYNE MUSIMBI at 2021-10-15 08:45:16. New fee balance is Ksh2,765.00 ', 1, 'Fee Payment', '2021-10-15 05:45:16'),
(95, 1, 4, 1, 168, 'fee_payment', NULL, '0707866136', '20211015084640 received. You paid Ksh40,000.00 for ADM3113/20 DAVID AKUNAVA  at 2021-10-15 08:46:40. New fee balance is Ksh20,965.00 ', 1, 'Fee Payment', '2021-10-15 05:46:41'),
(96, 1, 4, 1, 169, 'fee_payment', NULL, '0707866136', '20211015085217 received. You paid Ksh47,000.00 for ADM1521/12 ALWY SEYDABUBAKAR  at 2021-10-15 08:52:17. New fee balance is Ksh-4,035.00 ', 1, 'Fee Payment', '2021-10-15 05:52:17'),
(97, 1, 3, 1, 170, 'fee_payment', NULL, '0707866136', '20211015090043 received. You paid Ksh2,930.00 for ADM2225/17 CARLYNN MUTJONI CHOMBA at 2021-10-15 09:00:43. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-15 06:00:43'),
(98, 1, 3, 1, 171, 'fee_payment', NULL, '0707866136', '20211015090349 received. You paid Ksh46,965.00 for ADM1614/13 CARLYLE CHOMBA  at 2021-10-15 09:03:49. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-15 06:03:49'),
(99, 1, 3, 1, 172, 'fee_payment', NULL, '0707866136', '20211015122713 received. You paid Ksh70,000.00 for ADM2004/15 CHERYL CHEROP  at 2021-10-15 12:27:13. New fee balance is Ksh91,585.00 ', 1, 'Fee Payment', '2021-10-15 09:27:13'),
(100, 1, 4, 1, 173, 'fee_payment', NULL, '0707866136', '20211015124005 received. You paid Ksh36,265.00 for ADM2371/19 JANAT MOHAMED KIZITO at 2021-10-15 12:40:05. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-15 09:40:05'),
(101, 1, 4, 1, 174, 'fee_payment', NULL, '0707866136', '20211015124117 received. You paid Ksh40,165.00 for ADM2374/19 HAJRA MOHAMED KIZITO at 2021-10-15 12:41:17. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-15 09:41:17'),
(102, 1, 4, 1, 175, 'fee_payment', NULL, '0707866136', '20211015124222 received. You paid Ksh23,570.00 for ADM1992/15 YASIN MOHAMED KIZITO at 2021-10-15 12:42:22. New fee balance is Ksh14,995.00 ', 1, 'Fee Payment', '2021-10-15 09:42:22'),
(103, 1, 4, 1, 176, 'fee_payment', NULL, '0707866136', '20211015124355 received. You paid Ksh9,500.00 for ADM3086/20 CECIL KIBOBI  at 2021-10-15 12:43:55. New fee balance is Ksh36,165.00 ', 1, 'Fee Payment', '2021-10-15 09:43:55'),
(104, 1, 4, 1, 177, 'fee_payment', NULL, '0707866136', '20211015124523 received. You paid Ksh20,000.00 for ADM3366/21 WAYNE AKIM OCHUNGO at 2021-10-15 12:45:23. New fee balance is Ksh20,845.00 ', 1, 'Fee Payment', '2021-10-15 09:45:23'),
(105, 1, 4, 1, 178, 'fee_payment', NULL, '0707866136', '20211015124749 received. You paid Ksh900.00 for ADM2776/19 JAMES KAROKI  at 2021-10-15 12:47:49. New fee balance is Ksh2,600.00 ', 1, 'Fee Payment', '2021-10-15 09:47:49'),
(106, 1, 4, 1, 179, 'fee_payment', NULL, '0707866136', '20211015124853 received. You paid Ksh15,000.00 for ADM2672/15 CALEB OJIJO OMINGO at 2021-10-15 12:48:53. New fee balance is Ksh22,465.00 ', 1, 'Fee Payment', '2021-10-15 09:48:53'),
(107, 1, 3, 1, 180, 'fee_payment', NULL, '0707866136', '20211015131002 received. You paid Ksh61,545.00 for ADM3190/21 KENNETH GITHINJI  at 2021-10-15 13:10:02. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-15 10:10:02'),
(108, 1, 4, 1, 181, 'fee_payment', NULL, '0707866136', '20211015133424 received. You paid Ksh4,035.00 for ADM2750/14 FATMA SAIDABUBAKAR  at 2021-10-15 13:34:24. New fee balance is Ksh33,430.00 ', 1, 'Fee Payment', '2021-10-15 10:34:24'),
(109, 1, 4, 1, 183, 'fee_payment', NULL, '0707866136', '20211015134010 received. You paid Ksh30,000.00 for ADM2750/14 FATMA SAIDABUBAKAR  at 2021-10-15 13:40:10. New fee balance is Ksh3,430.00 ', 1, 'Fee Payment', '2021-10-15 10:40:10'),
(110, 1, 3, 1, 184, 'fee_payment', NULL, '0707866136', '20211015134213 received. You paid Ksh4,500.00 for ADM3225/21 GHALIB MOHAMED  at 2021-10-15 13:42:13. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-15 10:42:13'),
(111, 1, 4, 1, 185, 'fee_payment', NULL, '0707866136', '20211015134620 received. You paid Ksh40,000.00 for ADM2570/16 JAYDEN MUTWIRI LIMIRI at 2021-10-15 13:46:20. New fee balance is Ksh665.00 ', 1, 'Fee Payment', '2021-10-15 10:46:20'),
(112, 1, 4, 1, 186, 'fee_payment', NULL, '0707866136', '20211015135440 received. You paid Ksh10,000.00 for ADM2589/16 STEPHANIE NJERI MAKIPONYA at 2021-10-15 13:54:40. New fee balance is Ksh26,165.00 ', 1, 'Fee Payment', '2021-10-15 10:54:40'),
(113, 1, 4, 1, 187, 'fee_payment', NULL, '0707866136', '20211015141602 received. You paid Ksh67,165.00 for ADM2700/19 SAMUEL MUMO KILONZO at 2021-10-15 14:16:02. New fee balance is Ksh-11,650.00 ', 1, 'Fee Payment', '2021-10-15 11:16:02'),
(114, 1, 4, 1, 188, 'fee_payment', NULL, '0707866136', '20211015143135 received. You paid Ksh19,730.00 for ADM2459/19 EDNA KAGENDO KARIUKI at 2021-10-15 14:31:35. New fee balance is Ksh21,535.00 ', 1, 'Fee Payment', '2021-10-15 11:31:36'),
(115, 1, 3, 1, 189, 'fee_payment', NULL, '0707866136', '20211015143634 received. You paid Ksh49,165.00 for ADM2595/16 TALIA TEMKO  at 2021-10-15 14:36:34. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-15 11:36:34'),
(116, 1, 4, 1, 190, 'fee_payment', NULL, '0707866136', '20211015144359 received. You paid Ksh9,500.00 for ADM3405/21 MARIUS MAINA MWORIA at 2021-10-15 14:43:59. New fee balance is Ksh36,165.00 ', 1, 'Fee Payment', '2021-10-15 11:43:59'),
(117, 1, 4, 1, 191, 'fee_payment', NULL, '0707866136', '20211015144827 received. You paid Ksh36,165.00 for ADM3221/21 NAYRAT SAID ALI at 2021-10-15 14:48:27. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-15 11:48:27'),
(118, 1, 4, 1, 192, 'fee_payment', NULL, '0707866136', '20211015144913 received. You paid Ksh35,765.00 for ADM3220/21 AHMED SAID ALI at 2021-10-15 14:49:13. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-15 11:49:13'),
(119, 1, 4, 1, 193, 'fee_payment', NULL, '0707866136', '20211015145809 received. You paid Ksh36,000.00 for ADM1474/12 LAMYA FARAJ AHMED at 2021-10-15 14:58:09. New fee balance is Ksh3,065.00 ', 1, 'Fee Payment', '2021-10-15 11:58:09'),
(120, 1, 4, 1, 194, 'fee_payment', NULL, '0707866136', '20211015150729 received. You paid Ksh7,000.00 for ADM3017/20 ANNA ACHIENG OKINYI at 2021-10-15 15:07:29. New fee balance is Ksh-985.00 ', 1, 'Fee Payment', '2021-10-15 12:07:29'),
(121, 1, 3, 1, 195, 'fee_payment', NULL, '0707866136', '20211015151315 received. You paid Ksh51,915.00 for ADM2269/17 JEREMY HAWI  at 2021-10-15 15:13:15. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-15 12:13:15'),
(122, 1, 3, 1, 196, 'fee_payment', NULL, '0707866136', '20211015151550 received. You paid Ksh67,215.00 for ADM2122/17 RUSSELL OMONDI LAI at 2021-10-15 15:15:50. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-15 12:15:50'),
(123, 1, 3, 1, 197, 'fee_payment', NULL, '0707866136', '20211015151752 received. You paid Ksh42,515.00 for ADM3183/21 SYLVIA TARAJI AMOR at 2021-10-15 15:17:52. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-15 12:17:52'),
(124, 1, 3, 1, 198, 'fee_payment', NULL, '0707866136', '20211015152231 received. You paid Ksh49,165.00 for ADM3394/20 YUL LEMA  at 2021-10-15 15:22:31. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-15 12:22:31'),
(125, 1, 3, 1, 199, 'fee_payment', NULL, '0707866136', '20211015152450 received. You paid Ksh49,165.00 for ADM3320/21 ZORIAH AIKAH LEMA at 2021-10-15 15:24:50. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-15 12:24:50'),
(126, 1, 4, 1, 200, 'fee_payment', NULL, '0707866136', '20211015152631 received. You paid Ksh20,000.00 for ADM3416/21 EMMANUEL PAULO NZUI at 2021-10-15 15:26:31. New fee balance is Ksh35,965.00 ', 1, 'Fee Payment', '2021-10-15 12:26:31'),
(127, 1, 3, 1, 201, 'fee_payment', NULL, '0707866136', '20211015152923 received. You paid Ksh50,835.00 for ADM3320/21 ZORIAH AIKAH LEMA at 2021-10-15 15:29:23. New fee balance is Ksh-1,670.00 ', 1, 'Fee Payment', '2021-10-15 12:29:23'),
(128, 1, 3, 1, 202, 'fee_payment', NULL, '0707866136', '20211016122457 received. You paid Ksh31,765.00 for ADM2464/19 AHLAM SWALEH SAID at 2021-10-16 12:24:57. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-16 09:24:58'),
(129, 1, 3, 1, 203, 'fee_payment', NULL, '0707866136', '20211016122703 received. You paid Ksh42,965.00 for ADM1600/12 MARYAM SWALEH SAID at 2021-10-16 12:27:03. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-16 09:27:03'),
(130, 1, 3, 1, 204, 'fee_payment', NULL, '0707866136', '20211016122936 received. You paid Ksh36,165.00 for ADM2231/17 SULTAN SWALEH SAID at 2021-10-16 12:29:36. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-16 09:29:36'),
(131, 1, 3, 1, 205, 'fee_payment', NULL, '0707866136', '20211016123309 received. You paid Ksh37,465.00 for ADM2631/13 MARWAN SWALEH SAID at 2021-10-16 12:33:09. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-16 09:33:09'),
(132, 1, 4, 1, 206, 'fee_payment', NULL, '0707866136', '20211018065551 received. You paid Ksh52,465.00 for ADM2719/16 PAUL RASHID  at 2021-10-18 06:55:51. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-18 03:55:51'),
(133, 1, 4, 1, 207, 'fee_payment', NULL, '0707866136', '20211018065739 received. You paid Ksh56,500.00 for ADM3308/21 EDNA AMONDI OTIENO at 2021-10-18 06:57:39. New fee balance is Ksh12,465.00 ', 1, 'Fee Payment', '2021-10-18 03:57:39'),
(134, 1, 4, 1, 208, 'fee_payment', NULL, '0707866136', '20211018070446 received. You paid Ksh25,000.00 for ADM2340/18 MYLES KIPKEMBOI  at 2021-10-18 07:04:46. New fee balance is Ksh24,745.00 ', 1, 'Fee Payment', '2021-10-18 04:04:46'),
(135, 1, 3, 1, 209, 'fee_payment', NULL, '0707866136', '20211018071730 received. You paid Ksh56,045.00 for ADM2629/13 ERNEST KIVUTI GITONGA at 2021-10-18 07:17:30. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-18 04:17:30'),
(136, 1, 3, 1, 210, 'fee_payment', NULL, '0707866136', '20211018072115 received. You paid Ksh49,245.00 for ADM2158/17 ELSIE KANINI GITONGA at 2021-10-18 07:21:15. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-18 04:21:15'),
(137, 1, 3, 1, 211, 'fee_payment', NULL, '0707866136', '20211018072828 received. You paid Ksh46,665.00 for ADM3336/21 JASIEL KAVITA KARICHO at 2021-10-18 07:28:28. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-18 04:28:28'),
(138, 1, 3, 1, 212, 'fee_payment', NULL, '0707866136', '20211018081140 received. You paid Ksh30,000.00 for ADM3102/20 TALIA CHEPTOO BARTOO at 2021-10-18 08:11:40. New fee balance is Ksh18,565.00 ', 1, 'Fee Payment', '2021-10-18 05:11:40'),
(139, 1, 3, 1, 213, 'fee_payment', NULL, '0707866136', '20211018082557 received. You paid Ksh9,265.00 for ADM3334/21 ERICK KIETH MACHARIA at 2021-10-18 08:25:57. New fee balance is Ksh29,765.00 ', 1, 'Fee Payment', '2021-10-18 05:25:57'),
(140, 1, 3, 1, 214, 'fee_payment', NULL, '0707866136', '20211018120009 received. You paid Ksh51,465.00 for ADM2520/19 BRAMWELL OKETCH  at 2021-10-18 12:00:09. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-18 09:00:09'),
(141, 1, 3, 1, 215, 'fee_payment', NULL, '0707866136', '20211018120339 received. You paid Ksh36,265.00 for ADM3412/21 BRIANNA MARTHA OKETCH at 2021-10-18 12:03:39. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-18 09:03:39'),
(142, 1, 3, 1, 216, 'fee_payment', NULL, '0707866136', '20211018122953 received. You paid Ksh64,515.00 for ADM2641/13 LIONEL MWASAMBU  at 2021-10-18 12:29:53. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-18 09:29:53'),
(143, 1, 3, 1, 217, 'fee_payment', NULL, '0707866136', '20211018124326 received. You paid Ksh36,165.00 for ADM3325/21 IMMANUELA GAIL  at 2021-10-18 12:43:26. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-18 09:43:27'),
(144, 1, 3, 1, 218, 'fee_payment', NULL, '0707866136', '20211018124714 received. You paid Ksh31,765.00 for ADM3391/21 LEO BERNARD  at 2021-10-18 12:47:14. New fee balance is Ksh4,000.00 ', 1, 'Fee Payment', '2021-10-18 09:47:14'),
(145, 1, 3, 1, 219, 'fee_payment', NULL, '0707866136', '20211018143650 received. You paid Ksh50,670.00 for ADM2412/19 NABIL DZOMBO NGOKA at 2021-10-18 14:36:50. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-18 11:36:51'),
(146, 1, 3, 1, 220, 'fee_payment', NULL, '0707866136', '20211018144025 received. You paid Ksh31,265.00 for ADM2413/19 NAWFAL MWERO NGOKA at 2021-10-18 14:40:25. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-18 11:40:25'),
(147, 1, 3, 1, 221, 'fee_payment', NULL, '0707866136', '20211018144248 received. You paid Ksh16,065.00 for ADM3360/21 SABAH LUVUNO  at 2021-10-18 14:42:48. New fee balance is Ksh13,200.00 ', 1, 'Fee Payment', '2021-10-18 11:42:48'),
(148, 1, 4, 1, 222, 'fee_payment', NULL, '0707866136', '20211019081211 received. You paid Ksh25,000.00 for ADM3196/21 AIDEN WAIHENYA  at 2021-10-19 08:12:11. New fee balance is Ksh16,265.00 ', 1, 'Fee Payment', '2021-10-19 05:12:11'),
(149, 1, 3, 1, 223, 'fee_payment', NULL, '0707866136', '20211019083913 received. You paid Ksh38,865.00 for ADM2686/15 AMES KONGO KINYILI at 2021-10-19 08:39:13. New fee balance is Ksh25,595.00 ', 1, 'Fee Payment', '2021-10-19 05:39:13'),
(150, 1, 3, 1, 224, 'fee_payment', NULL, '0707866136', '20211019090346 received. You paid Ksh45,245.00 for ADM2325/18 JAYDEN KIPRUTO  at 2021-10-19 09:03:46. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-19 06:03:46'),
(151, 1, 3, 1, 225, 'fee_payment', NULL, '0707866136', '20211019091133 received. You paid Ksh52,465.00 for ADM2018/15 GIFT BERINY  at 2021-10-19 09:11:33. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-19 06:11:33'),
(152, 1, 3, 1, 226, 'fee_payment', NULL, '0707866136', '20211019092430 received. You paid Ksh51,965.00 for ADM1535/12 DAISY WAMBOI  at 2021-10-19 09:24:30. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-19 06:24:30'),
(153, 1, 3, 1, 227, 'fee_payment', NULL, '0707866136', '20211019092615 received. You paid Ksh6,965.00 for ADM1705/14 GAUDY WAITHERA MUTUKU at 2021-10-19 09:26:15. New fee balance is Ksh40,000.00 ', 1, 'Fee Payment', '2021-10-19 06:26:15'),
(154, 1, 3, 1, 228, 'fee_payment', NULL, '0707866136', '20211019092950 received. You paid Ksh40,000.00 for ADM1705/14 GAUDY WAITHERA MUTUKU at 2021-10-19 09:29:50. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-19 06:29:50'),
(155, 1, 3, 1, 229, 'fee_payment', NULL, '0707866136', '20211019093400 received. You paid Ksh30,000.00 for ADM2646/16 AYANA TENGA MWAMUYE at 2021-10-19 09:34:00. New fee balance is Ksh6,165.00 ', 1, 'Fee Payment', '2021-10-19 06:34:00'),
(156, 1, 3, 1, 230, 'fee_payment', NULL, '0707866136', '20211019093525 received. You paid Ksh6,165.00 for ADM2646/16 AYANA TENGA MWAMUYE at 2021-10-19 09:35:25. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-19 06:35:25'),
(157, 1, 3, 1, 231, 'fee_payment', NULL, '0707866136', '20211019105156 received. You paid Ksh30,000.00 for ADM3061/20 AARON TOLE MWACHIA at 2021-10-19 10:51:56. New fee balance is Ksh19,265.00 ', 1, 'Fee Payment', '2021-10-19 07:51:56'),
(158, 1, 3, 1, 232, 'fee_payment', NULL, '0707866136', '20211019120031 received. You paid Ksh36,165.00 for ADM3288/21 TWAIBAH WALID ALI at 2021-10-19 12:00:31. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-19 09:00:31'),
(159, 1, 4, 1, 233, 'fee_payment', NULL, '0707866136', '20211019122134 received. You paid Ksh48,565.00 for ADM3293/21 CHRYSTAL NJOKI  at 2021-10-19 12:21:34. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-19 09:21:34'),
(160, 1, 3, 1, 234, 'fee_payment', NULL, '0707866136', '20211019125318 received. You paid Ksh29,765.00 for ADM3335/21 IBRAHIM KHALIFA RASHID at 2021-10-19 12:53:18. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-19 09:53:18'),
(161, 1, 3, 1, 235, 'fee_payment', NULL, '0707866136', '20211019143739 received. You paid Ksh56,000.00 for ADM2723/20 MALAK MOHAMED ABDULLAH at 2021-10-19 14:37:39. New fee balance is Ksh-35.00 ', 1, 'Fee Payment', '2021-10-19 11:37:39'),
(162, 1, 3, 1, 236, 'fee_payment', NULL, '0707866136', '20211019145051 received. You paid Ksh52,715.00 for ADM3097/20 CHRISPUS GACHUHI  at 2021-10-19 14:50:51. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-19 11:50:51'),
(163, 1, 3, 1, 237, 'fee_payment', NULL, '0707866136', '20211019145557 received. You paid Ksh37,285.00 for ADM3063/20 EZRA WACHIRA GATHUTHI at 2021-10-19 14:55:57. New fee balance is Ksh14,630.00 ', 1, 'Fee Payment', '2021-10-19 11:55:57'),
(164, 1, 3, 1, 238, 'fee_payment', NULL, '0707866136', '20211019163747 received. You paid Ksh31,765.00 for ADM3028/20 JAYDEN MUOHO NGUGI at 2021-10-19 16:37:47. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-19 13:37:47'),
(165, 1, 3, 1, 239, 'fee_payment', NULL, '0707866136', '20211019163905 received. You paid Ksh36,165.00 for ADM2274/17 SIENNA GATHONI NGUGI at 2021-10-19 16:39:05. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-19 13:39:05'),
(166, 1, 4, 1, 240, 'fee_payment', NULL, '0707866136', '20211021070145 received. You paid Ksh25,000.00 for ADM3367/21 JOSEPH DAVID SITUBI at 2021-10-21 07:01:45. New fee balance is Ksh15,765.00 ', 1, 'Fee Payment', '2021-10-21 04:01:45'),
(167, 1, 4, 1, 241, 'fee_payment', NULL, '0707866136', '20211021070252 received. You paid Ksh25,000.00 for ADM3415/21 Nicole Ursula Situbi at 2021-10-21 07:02:52. New fee balance is Ksh31,465.00 ', 1, 'Fee Payment', '2021-10-21 04:02:52'),
(168, 1, 3, 1, 242, 'fee_payment', NULL, '0707866136', '20211021070821 received. You paid Ksh45,665.00 for ADM2576/16 ARCHIE ALFAYO OMIDO at 2021-10-21 07:08:21. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 04:08:21'),
(169, 1, 4, 1, 243, 'fee_payment', NULL, '0707866136', '20211021071049 received. You paid Ksh45,665.00 for ADM2219/18 JOY KYAMBI MULANDI at 2021-10-21 07:10:49. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 04:10:49'),
(170, 1, 4, 1, 244, 'fee_payment', NULL, '0707866136', '20211021071130 received. You paid Ksh45,665.00 for ADM2473/19 SAMMY MWENDWA MULANDI at 2021-10-21 07:11:30. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 04:11:30'),
(171, 1, 3, 1, 245, 'fee_payment', NULL, '0707866136', '20211021072509 received. You paid Ksh44,015.00 for ADM1326/11 AISHA NAJIB  at 2021-10-21 07:25:09. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 04:25:09'),
(172, 1, 4, 1, 246, 'fee_payment', NULL, '0707866136', '20211021072530 received. You paid Ksh25,000.00 for ADM2438/19 STANLEY MACHARIA MWANGI at 2021-10-21 07:25:30. New fee balance is Ksh6,765.00 ', 1, 'Fee Payment', '2021-10-21 04:25:30'),
(173, 1, 3, 1, 247, 'fee_payment', NULL, '0707866136', '20211021072652 received. You paid Ksh31,765.00 for ADM2406/19 ADRIAN MWANGI WAMBUGU at 2021-10-21 07:26:52. New fee balance is Ksh4,400.00 ', 1, 'Fee Payment', '2021-10-21 04:26:52'),
(174, 1, 3, 1, 248, 'fee_payment', NULL, '0707866136', '20211021072833 received. You paid Ksh31,765.00 for ADM2460/19 HASSAN NAJIB O. at 2021-10-21 07:28:33. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 04:28:33'),
(175, 1, 3, 1, 249, 'fee_payment', NULL, '0707866136', '20211021073036 received. You paid Ksh37,465.00 for ADM1988/15 MUHAMMAD NAJIB BASHAEB at 2021-10-21 07:30:36. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 04:30:36'),
(176, 1, 3, 1, 250, 'fee_payment', NULL, '0707866136', '20211021073204 received. You paid Ksh37,465.00 for ADM2691/15 INTISAR FAHMI OMAR at 2021-10-21 07:32:04. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 04:32:04'),
(177, 1, 3, 1, 251, 'fee_payment', NULL, '0707866136', '20211021073320 received. You paid Ksh35,665.00 for ADM2547/19 SUHAILA FAHMI OMAR at 2021-10-21 07:33:20. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 04:33:20'),
(178, 1, 3, 1, 252, 'fee_payment', NULL, '0707866136', '20211021073810 received. You paid Ksh40,845.00 for ADM2380/19 JESSE NDUNGU MUNYUA at 2021-10-21 07:38:10. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 04:38:10'),
(179, 1, 3, 1, 253, 'fee_payment', NULL, '0707866136', '20211021080026 received. You paid Ksh47,015.00 for ADM3031/20 JOAN MKANYIKA BAZIL at 2021-10-21 08:00:26. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 05:00:26'),
(180, 1, 3, 1, 254, 'fee_payment', NULL, '0707866136', '20211021082208 received. You paid Ksh73,930.00 for ADM3406/21 Joseph Njoroge  at 2021-10-21 08:22:08. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 05:22:08'),
(181, 1, 3, 1, 255, 'fee_payment', NULL, '0707866136', '20211021082523 received. You paid Ksh30,000.00 for ADM1773/14 KINGSLEY MUE MAINGI at 2021-10-21 08:25:23. New fee balance is Ksh22,465.00 ', 1, 'Fee Payment', '2021-10-21 05:25:23'),
(182, 1, 3, 1, 256, 'fee_payment', NULL, '0707866136', '20211021084846 received. You paid Ksh49,745.00 for ADM2586/16 ALVAN NYARIGE  at 2021-10-21 08:48:46. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 05:48:46'),
(183, 1, 3, 1, 257, 'fee_payment', NULL, '0707866136', '20211021085003 received. You paid Ksh65,045.00 for ADM1727/14 CHERISE MORAA NYARIGE at 2021-10-21 08:50:03. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 05:50:03'),
(184, 1, 3, 1, 258, 'fee_payment', NULL, '0707866136', '20211021092340 received. You paid Ksh45,515.00 for ADM3357/21 AUSTIN WACHIRA GITONGA at 2021-10-21 09:23:40. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 06:23:40'),
(185, 1, 3, 1, 259, 'fee_payment', NULL, '0707866136', '20211021092521 received. You paid Ksh51,415.00 for ADM2523/19 OLIVIA MUMBI GITONGA at 2021-10-21 09:25:21. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 06:25:21'),
(186, 1, 3, 1, 260, 'fee_payment', NULL, '0707866136', '20211021093428 received. You paid Ksh18,733.00 for ADM3306/21 RYAN KIPLAGAT KIPTANUI at 2021-10-21 09:34:28. New fee balance is Ksh18,732.00 ', 1, 'Fee Payment', '2021-10-21 06:34:28'),
(187, 1, 3, 1, 261, 'fee_payment', NULL, '0707866136', '20211021110204 received. You paid Ksh37,465.00 for ADM2068/16 AHMED ABDULNASSER AHMED at 2021-10-21 11:02:04. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 08:02:04'),
(188, 1, 3, 1, 262, 'fee_payment', NULL, '0707866136', '20211021110346 received. You paid Ksh44,015.00 for ADM1671/14 ASSIYA ABDULNASSER KAATAR at 2021-10-21 11:03:46. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 08:03:46'),
(189, 1, 3, 1, 263, 'fee_payment', NULL, '0707866136', '20211021110557 received. You paid Ksh37,465.00 for ADM2753/15 ZAHRA ABDULNASSIR  at 2021-10-21 11:05:57. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 08:05:57'),
(190, 1, 3, 1, 264, 'fee_payment', NULL, '0707866136', '20211021110737 received. You paid Ksh31,765.00 for ADM3069/20 DEENA ISLAM KAATAR at 2021-10-21 11:07:37. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 08:07:37'),
(191, 1, 3, 1, 265, 'fee_payment', NULL, '0707866136', '20211021110928 received. You paid Ksh31,265.00 for ADM3387/21 RAYYAN ABDULNASSER  at 2021-10-21 11:09:28. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 08:09:28'),
(192, 1, 3, 1, 266, 'fee_payment', NULL, '0707866136', '20211021111213 received. You paid Ksh31,765.00 for ADM3388/21 ABDULNASSER OMAR  at 2021-10-21 11:12:13. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 08:12:13'),
(193, 1, 3, 1, 267, 'fee_payment', NULL, '0707866136', '20211021111753 received. You paid Ksh30,000.00 for ADM3292/21 ZEYNAB SEYYID NOOR at 2021-10-21 11:17:53. New fee balance is Ksh23,165.00 ', 1, 'Fee Payment', '2021-10-21 08:17:53'),
(194, 1, 3, 1, 268, 'fee_payment', NULL, '0707866136', '20211021115030 received. You paid Ksh40,965.00 for ADM2712/14 JUHEINA MOOSA  at 2021-10-21 11:50:30. New fee balance is Ksh11,500.00 ', 1, 'Fee Payment', '2021-10-21 08:50:30'),
(195, 1, 3, 1, 269, 'fee_payment', NULL, '0707866136', '20211021130748 received. You paid Ksh33,000.00 for ADM2763/18 MARINA WAMBUI  at 2021-10-21 13:07:48. New fee balance is Ksh19,065.00 ', 1, 'Fee Payment', '2021-10-21 10:07:48'),
(196, 1, 3, 1, 270, 'fee_payment', NULL, '0707866136', '20211021130918 received. You paid Ksh15,565.00 for ADM2763/18 MARINA WAMBUI  at 2021-10-21 13:09:18. New fee balance is Ksh3,500.00 ', 1, 'Fee Payment', '2021-10-21 10:09:18'),
(197, 1, 3, 1, 271, 'fee_payment', NULL, '0707866136', '20211021131036 received. You paid Ksh3,500.00 for ADM2763/18 MARINA WAMBUI  at 2021-10-21 13:10:37. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 10:10:37'),
(198, 1, 3, 1, 272, 'fee_payment', NULL, '0707866136', '20211021135615 received. You paid Ksh46,665.00 for ADM3245/21 NAWAL NAFULA BOIYO at 2021-10-21 13:56:15. New fee balance is Ksh-2,000.00 ', 1, 'Fee Payment', '2021-10-21 10:56:15'),
(199, 1, 4, 1, 273, 'fee_payment', NULL, '0707866136', '20211021142009 received. You paid Ksh40,965.00 for ADM2712/14 JUHEINA MOOSA  at 2021-10-21 14:20:09. New fee balance is Ksh-29,465.00 ', 1, 'Fee Payment', '2021-10-21 11:20:09'),
(200, 1, 4, 1, 274, 'fee_payment', NULL, '0707866136', '20211021142157 received. You paid Ksh54,965.00 for ADM1547/12 LARRY MAITHYA MUTUKU at 2021-10-21 14:21:57. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 11:21:57'),
(201, 1, 3, 1, 275, 'fee_payment', NULL, '0707866136', '20211021142343 received. You paid Ksh51,465.00 for ADM2696/16 JELANI M. FURAHA at 2021-10-21 14:23:43. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 11:23:43'),
(202, 1, 3, 1, 276, 'fee_payment', NULL, '0707866136', '20211021145927 received. You paid Ksh48,665.00 for ADM2146/18 ZACHARY ANJICHI ARIBA at 2021-10-21 14:59:27. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 11:59:27'),
(203, 1, 3, 1, 277, 'fee_payment', NULL, '0707866136', '20211021150052 received. You paid Ksh59,965.00 for ADM2702/17 JOANNA AMIMO  at 2021-10-21 15:00:52. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 12:00:52'),
(204, 1, 3, 1, 278, 'fee_payment', NULL, '0707866136', '20211021154419 received. You paid Ksh20,000.00 for ADM2737/12 TARIQ ISMAIL  at 2021-10-21 15:44:19. New fee balance is Ksh17,465.00 ', 1, 'Fee Payment', '2021-10-21 12:44:19'),
(205, 1, 3, 1, 279, 'fee_payment', NULL, '0707866136', '20211021161253 received. You paid Ksh48,015.00 for ADM2324/18 CASEY OWEN KASAMANI at 2021-10-21 16:12:53. New fee balance is Ksh0.00 ', 1, 'Fee Payment', '2021-10-21 13:12:53'),
(206, 1, 1, 1, 1150, 'students', NULL, '0707866136', 'School fee balance for ADM3423/21 Imam Abdulsalaam Changa is Ksh27,016.00. Always pay fee in time. The Nyali School', 1, 'Fee Balance', '2022-02-16 20:57:44'),
(207, 1, 1, 1, 3, 'orders', 'J27T2B2JND', '', '-5000', 0, 'sale', '2022-03-27 11:02:54'),
(208, 1, 1, 1, 4, 'orders', 'J27T3QMVJR', '', 'J27T3QMVJR. Order amount 16000.00, balance 16000', 0, 'sale', '2022-03-27 11:36:35'),
(209, 1, 1, 1, 5, 'orders', 'J27T4SMWAT', '', 'J27T4SMWAT. Order amount 3000.00, balance 3000', 1, 'sale', '2022-03-27 11:39:02'),
(210, 1, 1, 1, 6, 'orders', 'J27T5Y4V9W', '0710422499', 'J27T5Y4V9W. Order amount 3000.00, balance 3000', 1, 'sale', '2022-03-27 11:39:37'),
(211, 1, 1, 1, 7, 'orders', 'J27T672ZPY', '', 'J27T672ZPY. Order amount 3600.00, balance 3600', 1, 'sale', '2022-03-27 11:55:52'),
(212, 1, 1, 1, 8, 'orders', 'J27T7QUTVG', '0710422499', 'J27T7QUTVG. Order amount 3000.00, balance 3000', 1, 'sale', '2022-03-27 12:56:51'),
(213, 1, 1, 1, 1, 'orders', 'J29TS3MBEY', '0739698963', 'J29TS3MBEY. Purchase has been made successfully.', 1, 'purchase', '2022-03-29 02:43:42'),
(214, 1, 1, 1, 2, 'orders', 'J29T1O1VRG', '0739698963', 'J29T1O1VRG. Purchase has been made successfully.', 1, 'purchase', '2022-03-29 02:51:10'),
(215, 1, 1, 1, 3, 'orders', 'J29T2V4JG0', '', 'J29T2V4JG0. Order amount 6000.00, balance 6000', 1, 'sale', '2022-03-29 03:06:23'),
(216, 1, 2, 1, 4, 'orders', 'J31T3SLMQW', '0739698963', 'J31T3SLMQW. Purchase has been made successfully.', 1, 'purchase', '2022-03-31 04:26:06'),
(217, 1, 2, 1, 5, 'orders', 'J31T4IZM4C', '', 'J31T4IZM4C. Order amount 108950.00, balance 108950', 1, 'sale', '2022-03-31 05:17:46'),
(218, 1, 2, 1, 6, 'orders', 'J31T5CSI5F', '', 'J31T5CSI5F. Order amount 3600.00, balance 3600', 1, 'sale', '2022-03-31 05:18:57'),
(219, 1, 2, 1, 7, 'orders', 'J31T6L1403', '', 'J31T6L1403. Order amount 13950.00, balance 13950', 1, 'sale', '2022-03-31 05:19:43'),
(220, 1, 38, 1, 9, 'orders', 'J05T8MKYLJ', '', 'J05T8MKYLJ. Order amount 3600.00, balance 0', 1, 'sale', '2022-04-05 11:22:18'),
(221, 1, 38, 1, 10, 'orders', 'J05T9I2540', '', 'J05T9I2540. Order amount 3600.00, balance 0', 1, 'sale', '2022-04-05 11:24:48'),
(222, 1, 38, 1, 11, 'orders', 'J05T100ICT', '', 'J05T100ICT. Order amount 14400.00, balance 0', 1, 'sale', '2022-04-05 11:53:52'),
(223, 1, 38, 1, 12, 'orders', 'J05T11URW0', '', 'J05T11URW0. Order amount 36000.00, balance 0', 1, 'sale', '2022-04-05 12:27:17'),
(224, 1, 38, 1, 13, 'orders', 'J05T12FOVA', '', 'J05T12FOVA. Order amount 2070.00, balance 2070', 1, 'sale', '2022-04-05 12:29:43');
INSERT INTO `sms` (`sms_id`, `org_id`, `entity_id`, `template_id`, `table_id`, `table_name`, `code`, `phone`, `message`, `sent`, `narrative`, `time_stamp`) VALUES
(225, 1, 38, 1, 14, 'orders', 'J05T13OS15', '', 'J05T13OS15. Order amount 98600.00, balance 98600', 1, 'sale', '2022-04-05 12:46:48'),
(226, 1, 2, 1, 15, 'orders', 'J13T14GH5N', '70708885554', 'J13T14GH5N. Purchase has been made successfully.', 1, 'purchase', '2022-04-13 06:41:39'),
(227, 1, 2, 1, 16, 'orders', 'J13T15OB1Z', '0739698963', 'J13T15OB1Z. Purchase has been made successfully.', 1, 'purchase', '2022-04-13 06:51:09'),
(228, 1, 2, 1, 17, 'orders', 'J13T16FJV5', '70708885554', 'J13T16FJV5. Purchase has been made successfully.', 1, 'purchase', '2022-04-13 06:54:32'),
(229, 1, 2, 1, 18, 'orders', 'J13T17PKJ8', '0111983314', 'J13T17PKJ8. Order amount 20.00, balance 20', 1, 'sale', '2022-04-13 07:10:25'),
(230, 1, 2, 1, 19, 'orders', 'J13T18UXEB', '0111983314', 'J13T18UXEB. Order amount 0.00, balance 0', 1, 'sale', '2022-04-13 07:15:42'),
(231, 1, 2, 1, 26, 'orders', 'J13T25S301', '234567890', 'J13T25S301. Order amount 80.00, balance 0', 1, 'sale', '2022-04-13 15:00:57'),
(232, 1, 2, 1, 27, 'orders', 'J13T26WJ63', '234567890', 'J13T26WJ63. Order amount 80.00, balance 0', 1, 'sale', '2022-04-13 15:05:03'),
(233, 1, 2, 1, 28, 'orders', 'J14T273ONL', '0739698963', 'J14T273ONL. Purchase has been made successfully.', 1, 'purchase', '2022-04-14 08:19:17'),
(234, 1, 2, 1, 29, 'orders', 'J14T286WEJ', '123456789', 'J14T286WEJ. Order amount 0.00, balance -110', 1, 'sale', '2022-04-14 08:25:47'),
(235, 1, 2, 1, 30, 'orders', 'J26T29RIT5', '23456789', 'J26T29RIT5. Order amount 0.00, balance -220', 1, 'sale', '2022-04-26 14:30:47'),
(236, 1, 2, 1, 31, 'orders', 'J26T307CIU', '', 'J26T307CIU. Order amount 220.00, balance 220', 1, 'sale', '2022-04-26 14:53:51'),
(237, 1, 2, 1, 32, 'orders', 'J27T31S15G', '70708885554', 'J27T31S15G. Purchase has been made successfully.', 1, 'purchase', '2022-04-27 08:38:31'),
(238, 1, 2, 1, 33, 'orders', 'J04T32K93E', '', 'J04T32K93E. Order amount 440.00, balance -60', 1, 'sale', '2022-05-04 07:56:36'),
(239, 1, 2, 1, 34, 'orders', 'J07T33Z1V8', '', 'J07T33Z1V8. Order amount 200.00, balance -800', 1, 'sale', '2022-06-07 11:50:18');

--
-- Triggers `sms`
--
DELIMITER $$
CREATE TRIGGER `credit_update_trigger` AFTER UPDATE ON `sms` FOR EACH ROW BEGIN
        IF NEW.sent = 1 THEN
    UPDATE
        sms_credit
    SET
        credit_balance = (credit_balance - 2),
        credit_consumed = (credit_consumed + 2)
    WHERE
        id = 1;
    END IF;
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sms_credit`
--

CREATE TABLE `sms_credit` (
  `id` int(11) NOT NULL,
  `credit_balance` decimal(18,2) NOT NULL,
  `credit_consumed` decimal(18,2) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_credit`
--

INSERT INTO `sms_credit` (`id`, `credit_balance`, `credit_consumed`, `time_stamp`) VALUES
(1, '4066.00', '518.00', '2021-05-31 05:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `sms_templates`
--

CREATE TABLE `sms_templates` (
  `template_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `template_name` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` text DEFAULT NULL,
  `time_stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_templates`
--

INSERT INTO `sms_templates` (`template_id`, `org_id`, `template_name`, `active`, `narrative`, `time_stamp`) VALUES
(1, 1, 'Fee Payment', 1, 'For fee payment and balances', '2021-04-20 04:55:45'),
(2, 1, 'Exam Results', 1, 'For exam results per student', '2021-05-20 12:38:27'),
(0, 1, 'Password Reset', 1, 'For password reset', '2021-06-03 12:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `station_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `category_id` int(11) NOT NULL DEFAULT 1,
  `station_name` varchar(156) NOT NULL,
  `active` int(11) NOT NULL,
  `narrative` varchar(256) DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `primary_phone` varchar(50) DEFAULT NULL,
  `secondary_phone` varchar(100) DEFAULT NULL,
  `other_phone` varchar(100) DEFAULT NULL,
  `primary_email` varchar(100) DEFAULT NULL,
  `secondary_email` varchar(100) DEFAULT NULL,
  `other_email` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`station_id`, `org_id`, `category_id`, `station_name`, `active`, `narrative`, `latitude`, `longitude`, `primary_phone`, `secondary_phone`, `other_phone`, `primary_email`, `secondary_email`, `other_email`, `date_modified`, `time_stamp`) VALUES
(1, 1, 2, 'Nairobi Station', 0, 'Test', '', '', '+254790490000', '', '', 'onjulajared@gmail.com', 'onjulajared@gmail.com', 'onjulajared@gmail.com', '2022-04-11 07:51:42', '2020-02-16 05:49:28'),
(2, 1, 3, 'Mombasa Main Branch', 0, '', '', '', '07888858585', '25478888888', '', 'mombasa@mail.com', '', '', '2022-04-11 07:51:42', '2022-02-03 15:04:36'),
(3, 1, 8, 'Main Store A', 0, '', '', '', 'Main Store A', '07883838383', '', 'mainstore@mail.com', '', '', '2022-04-11 07:51:42', '2022-02-03 15:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 0,
  `status_name` varchar(50) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `org_id`, `status_name`, `active`, `date_modified`, `time_stamp`) VALUES
(1, 0, 'Completed', 1, '2022-04-11 07:51:42', '2020-04-02 12:21:26'),
(2, 0, 'Approved', 1, '2022-04-11 07:51:42', '2020-04-02 12:21:26'),
(3, 0, 'Pending', 1, '2022-04-11 07:51:42', '2020-04-02 12:21:26'),
(4, 0, 'Cancelled', 1, '2022-04-11 07:51:42', '2020-04-03 05:30:41'),
(5, 0, 'Suspended', 1, '2022-04-11 07:51:42', '2020-04-05 14:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `stock_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `stock_name` varchar(50) NOT NULL,
  `stock_date` date DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`stock_id`, `org_id`, `stock_name`, `stock_date`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 3, 'Stock take as 19 Mar 2021', '2021-03-19', 1, '', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(2, 3, 'Stock take as 18 Mar 2021', '2021-03-18', 1, '', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(3, 4, 'Stock take as 31 Mar 2022', '2022-03-31', 1, 'test', '2022-04-11 07:51:44', '2022-03-31 05:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `stock_lines`
--

CREATE TABLE `stock_lines` (
  `stock_line_id` int(11) NOT NULL,
  `org_id` int(11) DEFAULT NULL,
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL COMMENT 'can be used or not depending on the type of business',
  `item_store_id` int(11) DEFAULT NULL,
  `brand_model_id` int(11) DEFAULT NULL COMMENT 'can be used or not depending on the type of business',
  `item_quantity` double NOT NULL,
  `system_quantity` int(11) DEFAULT NULL COMMENT 'quantity from the brand_models table',
  `active` int(11) NOT NULL DEFAULT 1,
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_lines`
--

INSERT INTO `stock_lines` (`stock_line_id`, `org_id`, `stock_id`, `item_id`, `item_store_id`, `brand_model_id`, `item_quantity`, `system_quantity`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 3, 1, 1, 1, NULL, 15, 15, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(2, 3, 1, 2, 2, NULL, 8, 8, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(3, 3, 1, 3, 3, NULL, 36, 36, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(4, 3, 1, 4, 4, NULL, 25, 25, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(5, 3, 1, 5, 5, NULL, 4, 4, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(6, 3, 1, 6, 6, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(7, 3, 1, 7, 7, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(8, 3, 1, 8, 8, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(9, 3, 1, 9, 9, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(10, 3, 1, 10, 10, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(11, 3, 1, 11, 11, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(12, 3, 1, 12, 12, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(13, 3, 1, 13, 13, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(14, 3, 1, 14, 14, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(15, 3, 1, 15, 15, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(16, 3, 1, 16, 16, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(17, 3, 1, 17, 17, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(18, 3, 1, 18, 18, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(19, 3, 1, 19, 19, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(20, 3, 1, 20, 20, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(21, 3, 1, 21, 21, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(22, 3, 1, 22, 22, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(23, 3, 1, 23, 23, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(24, 3, 1, 24, 24, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(25, 3, 1, 25, 25, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(26, 3, 1, 26, 26, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(27, 3, 1, 27, 27, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(28, 3, 1, 28, 28, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(29, 3, 1, 29, 29, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(30, 3, 1, 30, 30, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(31, 3, 1, 31, 31, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(32, 3, 1, 32, 32, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(33, 3, 1, 33, 33, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(34, 3, 1, 34, 34, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(35, 3, 1, 35, 35, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(36, 3, 1, 36, 36, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(37, 3, 1, 37, 37, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(38, 3, 1, 38, 38, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(39, 3, 1, 39, 39, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(40, 3, 1, 40, 40, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(41, 3, 1, 41, 41, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(42, 3, 1, 42, 42, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(43, 3, 1, 43, 43, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(44, 3, 1, 44, 44, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(45, 3, 1, 45, 45, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(46, 3, 1, 46, 46, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(47, 3, 1, 47, 47, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(48, 3, 1, 48, 48, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(49, 3, 1, 49, 49, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(50, 3, 1, 50, 50, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(51, 3, 1, 51, 51, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(52, 3, 1, 52, 52, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(53, 3, 1, 53, 53, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(54, 3, 1, 54, 54, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(55, 3, 1, 55, 55, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(56, 3, 1, 56, 56, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(57, 3, 1, 57, 57, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(58, 3, 1, 58, 58, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(59, 3, 1, 59, 59, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(60, 3, 1, 60, 60, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(61, 3, 1, 61, 61, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(62, 3, 1, 62, 62, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(63, 3, 1, 63, 63, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(64, 3, 1, 64, 64, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(65, 3, 1, 65, 65, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(66, 3, 1, 66, 66, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(67, 3, 1, 67, 67, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(68, 3, 1, 68, 68, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(69, 3, 1, 69, 69, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(70, 3, 1, 70, 70, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(71, 3, 1, 71, 71, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(72, 3, 1, 72, 72, NULL, 6, 6, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(73, 3, 1, 73, 73, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(74, 3, 1, 74, 74, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(75, 3, 1, 75, 75, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(76, 3, 1, 76, 76, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(77, 3, 1, 77, 77, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(78, 3, 1, 78, 78, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(79, 3, 1, 79, 79, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(80, 3, 1, 80, 80, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(81, 3, 1, 81, 81, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(82, 3, 1, 82, 82, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(83, 3, 1, 83, 83, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(84, 3, 1, 84, 84, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(85, 3, 1, 85, 85, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(86, 3, 1, 86, 86, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(87, 3, 1, 87, 87, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(88, 3, 1, 88, 88, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(89, 3, 1, 89, 89, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(90, 3, 1, 90, 90, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(91, 3, 1, 91, 91, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(92, 3, 1, 92, 92, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(93, 3, 1, 93, 93, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(94, 3, 1, 94, 94, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(95, 3, 1, 95, 95, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(96, 3, 1, 96, 96, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(97, 3, 1, 97, 97, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(98, 3, 1, 98, 98, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(99, 3, 1, 99, 99, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(100, 3, 1, 100, 100, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(101, 3, 1, 101, 101, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(102, 3, 1, 102, 102, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(103, 3, 1, 103, 103, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(104, 3, 1, 104, 104, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(105, 3, 1, 105, 105, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(106, 3, 1, 106, 106, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(107, 3, 1, 107, 107, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(108, 3, 1, 108, 108, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(109, 3, 1, 109, 109, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(110, 3, 1, 110, 110, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(111, 3, 1, 111, 111, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(112, 3, 1, 112, 112, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(113, 3, 1, 113, 113, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(114, 3, 1, 114, 114, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(115, 3, 1, 115, 115, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(116, 3, 1, 116, 116, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(117, 3, 1, 117, 117, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(118, 3, 1, 118, 118, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(119, 3, 1, 119, 119, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(120, 3, 1, 120, 120, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(121, 3, 1, 121, 121, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(122, 3, 1, 122, 122, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(123, 3, 1, 123, 123, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(124, 3, 1, 124, 124, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(125, 3, 1, 125, 125, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(126, 3, 1, 126, 126, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(127, 3, 1, 127, 127, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(128, 3, 1, 128, 128, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(129, 3, 1, 129, 129, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(130, 3, 1, 130, 130, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(131, 3, 1, 131, 131, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(132, 3, 1, 132, 132, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(133, 3, 1, 133, 133, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(134, 3, 1, 134, 134, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(135, 3, 1, 135, 135, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(136, 3, 1, 136, 136, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(137, 3, 1, 137, 137, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(138, 3, 1, 138, 138, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(139, 3, 1, 139, 139, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(141, 3, 1, 141, 141, NULL, 5, 5, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:34:29'),
(142, NULL, 1, 140, NULL, NULL, 10, 10, 1, '', '2022-04-11 07:51:44', '2021-03-19 06:45:13'),
(143, 3, 2, 1, 1, NULL, 8, 8, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(144, 3, 2, 2, 2, NULL, 8, 8, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(145, 3, 2, 3, 3, NULL, 36, 36, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(146, 3, 2, 4, 4, NULL, 25, 25, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(147, 3, 2, 5, 5, NULL, 4, 4, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(148, 3, 2, 6, 6, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(149, 3, 2, 7, 7, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(150, 3, 2, 8, 8, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(151, 3, 2, 9, 9, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(152, 3, 2, 10, 10, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(153, 3, 2, 11, 11, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(154, 3, 2, 12, 12, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(155, 3, 2, 13, 13, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(156, 3, 2, 14, 14, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(157, 3, 2, 15, 15, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(158, 3, 2, 16, 16, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(159, 3, 2, 17, 17, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(160, 3, 2, 18, 18, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(161, 3, 2, 19, 19, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(162, 3, 2, 20, 20, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(163, 3, 2, 21, 21, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(164, 3, 2, 22, 22, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(165, 3, 2, 23, 23, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(166, 3, 2, 24, 24, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(167, 3, 2, 25, 25, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(168, 3, 2, 26, 26, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(169, 3, 2, 27, 27, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(170, 3, 2, 28, 28, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(171, 3, 2, 29, 29, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(172, 3, 2, 30, 30, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(173, 3, 2, 31, 31, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(174, 3, 2, 32, 32, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(175, 3, 2, 33, 33, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(176, 3, 2, 34, 34, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(177, 3, 2, 35, 35, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(178, 3, 2, 36, 36, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(179, 3, 2, 37, 37, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(180, 3, 2, 38, 38, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(181, 3, 2, 39, 39, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(182, 3, 2, 40, 40, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(183, 3, 2, 41, 41, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(184, 3, 2, 42, 42, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(185, 3, 2, 43, 43, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(186, 3, 2, 44, 44, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(187, 3, 2, 45, 45, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(188, 3, 2, 46, 46, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(189, 3, 2, 47, 47, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(190, 3, 2, 48, 48, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(191, 3, 2, 49, 49, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(192, 3, 2, 50, 50, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(193, 3, 2, 51, 51, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(194, 3, 2, 52, 52, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(195, 3, 2, 53, 53, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(196, 3, 2, 54, 54, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(197, 3, 2, 55, 55, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(198, 3, 2, 56, 56, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(199, 3, 2, 57, 57, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(200, 3, 2, 58, 58, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(201, 3, 2, 59, 59, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(202, 3, 2, 60, 60, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(203, 3, 2, 61, 61, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(204, 3, 2, 62, 62, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(205, 3, 2, 63, 63, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(206, 3, 2, 64, 64, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(207, 3, 2, 65, 65, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(208, 3, 2, 66, 66, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(209, 3, 2, 67, 67, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(210, 3, 2, 68, 68, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(211, 3, 2, 69, 69, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(212, 3, 2, 70, 70, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(213, 3, 2, 71, 71, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(214, 3, 2, 72, 72, NULL, 9, 9, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(215, 3, 2, 73, 73, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(216, 3, 2, 74, 74, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(217, 3, 2, 75, 75, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(218, 3, 2, 76, 76, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(219, 3, 2, 77, 77, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(220, 3, 2, 78, 78, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(221, 3, 2, 79, 79, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(222, 3, 2, 80, 80, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(223, 3, 2, 81, 81, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(224, 3, 2, 82, 82, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(225, 3, 2, 83, 83, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(226, 3, 2, 84, 84, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(227, 3, 2, 85, 85, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(228, 3, 2, 86, 86, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(229, 3, 2, 87, 87, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(230, 3, 2, 88, 88, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(231, 3, 2, 89, 89, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(232, 3, 2, 90, 90, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(233, 3, 2, 91, 91, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(234, 3, 2, 92, 92, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(235, 3, 2, 93, 93, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(236, 3, 2, 94, 94, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(237, 3, 2, 95, 95, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(238, 3, 2, 96, 96, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(239, 3, 2, 97, 97, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(240, 3, 2, 98, 98, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(241, 3, 2, 99, 99, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(242, 3, 2, 100, 100, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(243, 3, 2, 101, 101, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(244, 3, 2, 102, 102, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(245, 3, 2, 103, 103, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(246, 3, 2, 104, 104, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(247, 3, 2, 105, 105, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(248, 3, 2, 106, 106, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(249, 3, 2, 107, 107, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(250, 3, 2, 108, 108, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(251, 3, 2, 109, 109, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(252, 3, 2, 110, 110, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(253, 3, 2, 111, 111, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(254, 3, 2, 112, 112, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(255, 3, 2, 113, 113, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(256, 3, 2, 114, 114, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(257, 3, 2, 115, 115, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(258, 3, 2, 116, 116, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(259, 3, 2, 117, 117, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(260, 3, 2, 118, 118, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(261, 3, 2, 119, 119, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(262, 3, 2, 120, 120, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(263, 3, 2, 121, 121, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(264, 3, 2, 122, 122, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(265, 3, 2, 123, 123, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(266, 3, 2, 124, 124, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(267, 3, 2, 125, 125, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(268, 3, 2, 126, 126, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(269, 3, 2, 127, 127, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(270, 3, 2, 128, 128, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(271, 3, 2, 129, 129, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(272, 3, 2, 130, 130, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(273, 3, 2, 131, 131, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(274, 3, 2, 132, 132, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(275, 3, 2, 133, 133, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(276, 3, 2, 134, 134, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(277, 3, 2, 135, 135, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(278, 3, 2, 136, 136, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(279, 3, 2, 137, 137, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(280, 3, 2, 138, 138, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(281, 3, 2, 139, 139, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(282, 3, 2, 140, 140, NULL, 1, 1, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(283, 3, 2, 141, 141, NULL, 2, 2, 1, 'Auto-gen', '2022-04-11 07:51:44', '2021-03-19 06:48:19'),
(284, 4, 3, 1, 284, NULL, 0, 0, 1, 'Auto-gen', '2022-04-11 07:51:44', '2022-03-31 05:01:14'),
(285, 4, 3, 17, 285, NULL, 7, 7, 1, 'Auto-gen', '2022-04-11 07:51:44', '2022-03-31 05:01:14'),
(286, 4, 3, 143, 286, NULL, 115, 115, 1, 'Auto-gen', '2022-04-11 07:51:44', '2022-03-31 05:01:14'),
(287, 4, 3, 144, 283, NULL, 3, 3, 1, 'Auto-gen', '2022-04-11 07:51:44', '2022-03-31 05:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `subaccount_types`
--

CREATE TABLE `subaccount_types` (
  `subaccount_type_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `account_type_id` int(11) NOT NULL,
  `subaccount_type_code` varchar(20) DEFAULT NULL,
  `subaccount_type_name` varchar(30) NOT NULL,
  `is_paymentmode` tinyint(1) NOT NULL DEFAULT 0,
  `narrative` text DEFAULT NULL,
  `time_stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subaccount_types`
--

INSERT INTO `subaccount_types` (`subaccount_type_id`, `org_id`, `account_type_id`, `subaccount_type_code`, `subaccount_type_name`, `is_paymentmode`, `narrative`, `time_stamp`) VALUES
(1, 1, 1, 'BA001', 'Bank', 1, '', '2021-03-22 07:32:53'),
(2, 1, 1, 'CA001', 'Cash', 1, '', '2021-03-22 07:32:53'),
(3, 1, 1, 'MP001', 'M-Pesa', 1, '', '2021-03-22 07:32:53'),
(5, 1, 3, 'SA001', 'Supplier Account', 0, 'General Supplier Account', '2021-04-02 05:32:24'),
(6, 1, 3, 'PURCHASES', 'Purchases', 0, 'Purchase Account Type', '2021-04-02 05:32:59'),
(16, 1, 3, 'GE', 'General Expenses', 0, 'General Expenses category', '2021-04-22 21:00:29'),
(17, 1, 4, 'RG001', 'Revenue generators', 0, 'General revenue generating channels', '2021-04-22 21:05:54'),
(21, 1, 4, 'UN001', 'Unallocated', 0, 'Unallocated funds', '2021-05-09 07:22:52'),
(22, 1, 3, 'DISC_001', 'Discount', 0, 'Discounts', '2021-05-18 12:55:04'),
(27, 1, 4, 'SALES', 'Sales', 0, 'Sales Account Type', '2022-03-22 20:20:35'),
(28, 1, 1, 'GA', 'General Assets', 0, 'Other Asset Accounts', '2022-03-23 11:44:39'),
(30, 1, 5, 'GL', 'General Liabilities', 0, 'General Liabilities\r\n', '2022-03-23 11:51:16'),
(31, 1, 3, 'TAXES', 'Taxes', 0, '', '2022-03-23 11:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `sub_departments`
--

CREATE TABLE `sub_departments` (
  `sub_department_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `department_id` int(11) NOT NULL DEFAULT 1,
  `sub_department_name` varchar(156) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `narrative` varchar(256) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_departments`
--

INSERT INTO `sub_departments` (`sub_department_id`, `org_id`, `department_id`, `sub_department_name`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 1, 1, 'Default', 1, 'NA', '2022-04-11 07:51:45', '2020-02-16 10:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `narrative` text NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 3,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sys_emailed`
--

CREATE TABLE `sys_emailed` (
  `sys_emailed_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `sys_email_id` int(11) NOT NULL,
  `table_id` int(11) DEFAULT NULL COMMENT 'primary key from the table',
  `table_name` varchar(50) DEFAULT NULL COMMENT 'table name from which you get the P.K for table_id',
  `emailed` tinyint(1) NOT NULL DEFAULT 0,
  `email_recipient` text DEFAULT NULL,
  `email_cc` text DEFAULT NULL,
  `email_subject` text DEFAULT NULL,
  `email_body` text DEFAULT NULL,
  `email_attachment` text DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_emailed`
--

INSERT INTO `sys_emailed` (`sys_emailed_id`, `org_id`, `sys_email_id`, `table_id`, `table_name`, `emailed`, `email_recipient`, `email_cc`, `email_subject`, `email_body`, `email_attachment`, `date_modified`, `time_stamp`) VALUES
(5, 0, 1, 13, 'entitys', 1, 'reagan.nyumbani@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/corona/pages/email_verification/?e=$2y$10$M9Rla1SF6GZ7XW4ijr./nuru6L7pbxONObgJHxAxoPn6xA9RBFK6O<br><p><b>You account details include</b> </p><p><b>Username: </b>reagan.nyumbani@gmail.com </p> <p><b>Password: </b>RoSFXz </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2020-04-05 08:03:29'),
(6, 0, 1, 14, 'entitys', 1, 'omondireaggan@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/corona/pages/email_verification/?e=$2y$10$NpoNj9h2zPuPMO.STX1y/OiOLA9dr39jN4HDUlBo6H7jhCuyuHK7a<br><p><b>You account details include</b> </p><p><b>Username: </b>omondireaggan@gmail.com </p> <p><b>Password: </b>m1ivbC </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2020-04-05 09:34:40'),
(7, 0, 1, 16, 'entitys', 1, 'onyangoreaggan@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/corona/pages/email_verification/?e=$2y$10$c1elpFdEiCIbT6sJ6LhO.ORfP2A7NyddpXGPMuL3T.CJZcerUn0yK<br><p><b>You account details include</b> </p><p><b>Username: </b>onyangoreaggan@gmail.com </p> <p><b>Password: </b>1234 </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2020-04-07 16:16:10'),
(8, 0, 1, 17, 'entitys', 1, 'onyangoreaggan@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/corona/pages/email_verification/?e=$2y$10$ajtL.g9y2h0XshBucbwp..xQ0KuSFeZawZdhb7YBGK/wWMb0sGsia<br><p><b>You account details include</b> </p><p><b>Username: </b>onyangoreaggan@gmail.com </p> <p><b>Password: </b>1234 </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2020-04-07 16:36:09'),
(9, 0, 1, 18, 'entitys', 1, 'onyangoreaggan@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/corona/pages/email_verification/?e=$2y$10$oYN5mfBONbKxWFjltRHPounSTcn77G/5IV4HZLKNJ9B0ZKQX6QAny<br><p><b>You account details include</b> </p><p><b>Username: </b>onyangoreaggan@gmail.com </p> <p><b>Password: </b>1234 </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2020-04-07 16:36:40'),
(10, 0, 1, 35, 'entitys', 1, 'ken@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/jtlpos/pages/email_verification/?e=$2y$10$pngaMdg6CEZZRUrZQa0/LeQdnl/s3WNvh6ZU8eT1yKoeIphBjAG.G<br><p><b>You account details include</b> </p><p><b>Username: </b>ken@gmail.com </p> <p><b>Password: </b>34LMwG </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2020-10-13 03:35:53'),
(11, 0, 1, 36, 'entitys', 1, 'mich@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/jtlpos/pages/email_verification/?e=$2y$10$YRMmeDjkoaNRpQC1AthbCew892GGpP9WfPhvojagrQJ5R.SIprU2m<br><p><b>You account details include</b> </p><p><b>Username: </b>mich@gmail.com </p> <p><b>Password: </b>UcTu3A </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2020-10-13 03:41:55'),
(12, 0, 1, 37, 'entitys', 0, 'ken@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/jtlpos/pages/email_verification/?e=$2y$10$boPoB7NTda2wUw99hBWuPudrq5QLAYoNkFg8CMEX3qKotps02dhRC<br><p><b>You account details include</b> </p><p><b>Username: </b>ken@gmail.com </p> <p><b>Password: </b>1MsZIP </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2020-10-13 03:46:11'),
(13, 0, 1, 38, 'entitys', 1, 'ken@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/jtlpos/pages/email_verification/?e=$2y$10$InLvtDPpplkdym1H.NvBhOXk80sxn1rYmZL9V0pQCaiS3EPedjKXO<br><p><b>You account details include</b> </p><p><b>Username: </b>ken@gmail.com </p> <p><b>Password: </b>kTsYEC </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2020-10-13 03:47:57'),
(14, 0, 1, 39, 'entitys', 1, 'akinyi@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/jtlpos/pages/email_verification/?e=$2y$10$EXYUcdxkKnttItWDdhKZ8ucnZrZhJtcfLrzNt93REkuq0gCA2Lp72<br><p><b>You account details include</b> </p><p><b>Username: </b>akinyi@gmail.com </p> <p><b>Password: </b>hm4iup </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2020-10-13 04:02:57'),
(15, 0, 1, 40, 'entitys', 1, 'robert@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/jtlpos/pages/email_verification/?e=$2y$10$RCAwsdZBnaxXRjkdXKH4ZOodHdEbKtuPoEAwXLfdW9s/LdIX2zEyy<br><p><b>You account details include</b> </p><p><b>Username: </b>robert@gmail.com </p> <p><b>Password: </b>2gXjto </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2020-10-13 14:49:41'),
(16, 0, 1, 41, 'entitys', 1, 'robert@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/jtlpos/pages/email_verification/?e=$2y$10$BfbRKfuR5ZoWpLqrCsjkkOmaUAozIumQKzBbq3YiWDx4uOl.NdXMK<br><p><b>You account details include</b> </p><p><b>Username: </b>robert@gmail.com </p> <p><b>Password: </b>ovYVq2 </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2020-10-13 14:51:45'),
(17, 0, 1, 42, 'entitys', 1, 'nick@gnail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/jtlpos/pages/email_verification/?e=$2y$10$e..yMbvi6Ws9nQrCOZRLfukPobN1e/ymy7mIKChNptmSOH1LiGFdu<br><p><b>You account details include</b> </p><p><b>Username: </b>nick@gnail.com </p> <p><b>Password: </b>1oZOfA </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2020-10-13 15:56:03'),
(18, 0, 1, 43, 'entitys', 1, 'gladys@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/jtlpos/pages/email_verification/?e=$2y$10$YjSOp6WkQfDcUhTabu8at.mxJ50MXt.RDeiAR/uMZpRCU65j9/ILm<br><p><b>You account details include</b> </p><p><b>Username: </b>gladys@gmail.com </p> <p><b>Password: </b>tKUslv </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2020-10-13 16:48:01'),
(19, 0, 1, 63, 'entitys', 0, 'ta485590@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://inventory.jiwanitech.com/pages/email_verification/?e=$2y$10$ZJLh5XaKD6Af.mCGFFXVdu4ap7rjSx2qK29QOq/V3I3aoyVxP95.e<br><p><b>You account details include</b> </p><p><b>Username: </b>ta485590@gmail.com </p> <p><b>Password: </b>VaK7lD </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2021-04-01 07:41:11'),
(20, 0, 1, 64, 'entitys', 0, 'liquorcabinett@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://inventory.jiwanitech.com/pages/email_verification/?e=$2y$10$3zffdBBBztw5cMlZ5jaq8.sIdhiu9gt8LhakuMGJI.kHdDqipZ14.<br><p><b>You account details include</b> </p><p><b>Username: </b>liquorcabinett@gmail.com </p> <p><b>Password: </b>Jxd8BP </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2021-04-01 07:43:26'),
(21, 0, 1, 65, 'entitys', 0, 'okinywa@yahoo.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://inventory.jiwanitech.com/pages/email_verification/?e=$2y$10$Vk19LGdTvP23ZJnWegXcN.MNC2MV9pWchMRRCRNgeMWAS67Edq3va<br><p><b>You account details include</b> </p><p><b>Username: </b>okinywa@yahoo.com </p> <p><b>Password: </b>Yz4Zm8 </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2021-08-19 08:01:02'),
(22, 0, 1, 66, 'entitys', 0, 'okinyua2@yahoo.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://inventory.jiwanitech.com/pages/email_verification/?e=$2y$10$Hpg9nLnuUHis4vzJIsOKKOz7L.L7sHiY1XCeIKFFR1sv4V9KfFIYK<br><p><b>You account details include</b> </p><p><b>Username: </b>okinyua2@yahoo.com </p> <p><b>Password: </b>3HsuAn </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2021-08-19 08:09:15'),
(23, 0, 1, 67, 'entitys', 0, 'jonjula@iosofttech.co.ke', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://inventory.jiwanitech.com/pages/email_verification/?e=$2y$10$hOpc0/57GOqK6WLkORA9i.Vdux4JFzhLQs7tWFzZLnlBi6ba6kEXm<br><p><b>You account details include</b> </p><p><b>Username: </b>jonjula@iosofttech.co.ke </p> <p><b>Password: </b>5qW9lm </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2022-02-03 16:05:21'),
(24, 0, 1, 68, 'entitys', 0, 'reagan@iosofttech.co.ke', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://inventory.jiwanitech.com/pages/email_verification/?e=$2y$10$7LCufSRgMJVECeJNiyVcSeUXb1tFvx8qLNyeJiS/8Bi/VUMlTMrle<br><p><b>You account details include</b> </p><p><b>Username: </b>reagan@iosofttech.co.ke </p> <p><b>Password: </b>f1Cog7 </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-04-11 07:51:46', '2022-02-03 16:07:06'),
(25, 1, 1, 1, 'support', 0, 'info@jiwanitech.com', 'jiwanilimited@gmail.com', 'This is Test One', 'Hello world<p>\r\n                            Regards,\r\n                            SA  <br/>\r\n                            Phone: 0739698964 <br/>\r\n                            Email: admin <br/>\r\n                        </p>', NULL, '2022-04-11 07:51:46', '2022-03-21 06:18:20'),
(26, 1, 1, 1, 'support', 0, 'info@jiwanitech.com', 'jiwanilimited@gmail.com', 'This is Test One', 'dfadfasas<p>\r\n                            Regards,\r\n                            SA  <br/>\r\n                            Phone: 0739698964 <br/>\r\n                            Email: admin <br/>\r\n                        </p>', NULL, '2022-04-11 07:51:46', '2022-03-21 06:21:23'),
(27, 1, 1, 1, 'support', 0, 'info@jiwanitech.com', 'jiwanilimited@gmail.com', 'This is Test One', 'Another one<p>\r\n                            Regards,\r\n                            SA  <br/>\r\n                            Phone: 0739698964 <br/>\r\n                            Email: admin <br/>\r\n                        </p>', NULL, '2022-04-11 07:51:46', '2022-03-21 06:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `sys_emails`
--

CREATE TABLE `sys_emails` (
  `sys_email_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 0,
  `email_type` varchar(50) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `narrative` text DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_emails`
--

INSERT INTO `sys_emails` (`sys_email_id`, `org_id`, `email_type`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 0, 'Account Creation', 1, NULL, '2022-04-11 07:51:46', '2020-04-04 19:56:26'),
(2, 0, 'Password Reset', 1, NULL, '2022-04-11 07:51:46', '2020-04-04 19:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `sys_logs`
--

CREATE TABLE `sys_logs` (
  `sys_log_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `computer` varchar(400) NOT NULL,
  `operator` varchar(100) NOT NULL,
  `source` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `source_id` int(11) DEFAULT NULL,
  `execution_id` int(11) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `task` text DEFAULT NULL,
  `narrative` text DEFAULT NULL,
  `time_stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_logs`
--

INSERT INTO `sys_logs` (`sys_log_id`, `event_name`, `computer`, `operator`, `source`, `username`, `source_id`, `execution_id`, `start_time`, `end_time`, `task`, `narrative`, `time_stamp`) VALUES
(176, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '2', '', '', NULL, NULL, '2022-03-21 09:03:45', NULL, NULL, NULL, '2022-03-21 10:50:45'),
(177, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '2', '', '', NULL, NULL, '2022-03-21 09:03:45', NULL, NULL, NULL, '2022-03-21 10:56:45'),
(178, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-22 18:03:52', NULL, NULL, NULL, '2022-03-22 19:18:52'),
(179, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-22 18:03:25', NULL, NULL, NULL, '2022-03-22 19:21:25'),
(180, 'update_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 18, NULL, '2022-03-22 20:03:11', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"1\",\"subaccount_type_code\":\"ARC001\",\"is_paymentmode\":\"0\",\"subaccount_type_name\":\"Amounts Receivable\",\"narrative\":\"\"}', '{\"org_id\":\"1\",\"account_type_id\":\"1\",\"subaccount_type_code\":\"ARC001\",\"is_paymentmode\":\"0\",\"subaccount_type_name\":\"Amounts Receivable\",\"narrative\":\"\"}', '2022-03-22 20:17:11'),
(181, 'add_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 27, NULL, '2022-03-22 20:03:35', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_code\":\"SALES\",\"subaccount_type_name\":\"Sales Accounts\",\"is_paymentmode\":\"0\",\"narrative\":\"Sales Accounts\"}', '{\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_code\":\"SALES\",\"subaccount_type_name\":\"Sales Accounts\",\"is_paymentmode\":\"0\",\"narrative\":\"Sales Accounts\"}', '2022-03-22 20:20:35'),
(182, 'update_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 27, NULL, '2022-03-22 20:03:59', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_code\":\"SALES\",\"is_paymentmode\":\"0\",\"subaccount_type_name\":\"Sales\",\"narrative\":\"Sales Accounts\"}', '{\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_code\":\"SALES\",\"is_paymentmode\":\"0\",\"subaccount_type_name\":\"Sales\",\"narrative\":\"Sales Accounts\"}', '2022-03-22 20:22:59'),
(183, 'delete_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1958, NULL, '2022-03-22 20:03:10', NULL, '{\"account_id\":\"1958\",\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_id\":\"17\",\"account_code\":\"700001\",\"account_name\":\"Donations\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"other_category\":\"\",\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"\",\"created_by\":\"1\",\"time_stamp\":\"2021-11-23 20:55:56\"}', '{\"account_id\":\"1958\",\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_id\":\"17\",\"account_code\":\"700001\",\"account_name\":\"Donations\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"other_category\":\"\",\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"\",\"created_by\":\"1\",\"time_stamp\":\"2021-11-23 20:55:56\"}', '2022-03-22 20:24:10'),
(184, 'add_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1971, NULL, '2022-03-22 20:03:31', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_id\":\"27\",\"account_code\":\"700001\",\"account_name\":\"Sales Account\",\"opening_balance\":\"0\",\"other_category\":\"\",\"active\":true,\"narrative\":\"Sales Account\",\"created_by\":\"1\"}', '{\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_id\":\"27\",\"account_code\":\"700001\",\"account_name\":\"Sales Account\",\"opening_balance\":\"0\",\"other_category\":\"\",\"active\":true,\"narrative\":\"Sales Account\",\"created_by\":\"1\"}', '2022-03-22 20:24:31'),
(185, 'delete_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 603, NULL, '2022-03-22 20:03:31', NULL, '{\"account_id\":\"603\",\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_id\":\"6\",\"account_code\":\"EXAM001\",\"account_name\":\"Exam Expense\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"other_category\":\"\",\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"Exam Expense\",\"created_by\":\"2\",\"time_stamp\":\"2021-05-13 15:16:04\"}', '{\"account_id\":\"603\",\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_id\":\"6\",\"account_code\":\"EXAM001\",\"account_name\":\"Exam Expense\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"other_category\":\"\",\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"Exam Expense\",\"created_by\":\"2\",\"time_stamp\":\"2021-05-13 15:16:04\"}', '2022-03-22 20:25:31'),
(186, 'update_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 27, NULL, '2022-03-22 20:03:07', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_code\":\"SALES\",\"is_paymentmode\":\"0\",\"subaccount_type_name\":\"Sales\",\"narrative\":\"Sales Account Type\"}', '{\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_code\":\"SALES\",\"is_paymentmode\":\"0\",\"subaccount_type_name\":\"Sales\",\"narrative\":\"Sales Account Type\"}', '2022-03-22 20:26:07'),
(187, 'update_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 6, NULL, '2022-03-22 20:03:28', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_code\":\"PA001\",\"is_paymentmode\":\"0\",\"subaccount_type_name\":\"Purchases\",\"narrative\":\"Purchase Account Type\"}', '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_code\":\"PA001\",\"is_paymentmode\":\"0\",\"subaccount_type_name\":\"Purchases\",\"narrative\":\"Purchase Account Type\"}', '2022-03-22 20:26:28'),
(188, 'update_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 6, NULL, '2022-03-22 20:03:40', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_code\":\"PURCHASE\",\"is_paymentmode\":\"0\",\"subaccount_type_name\":\"Purchases\",\"narrative\":\"Purchase Account Type\"}', '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_code\":\"PURCHASE\",\"is_paymentmode\":\"0\",\"subaccount_type_name\":\"Purchases\",\"narrative\":\"Purchase Account Type\"}', '2022-03-22 20:26:40'),
(189, 'add_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1972, NULL, '2022-03-22 20:03:47', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_id\":\"6\",\"account_code\":\"800001\",\"account_name\":\"Purchase Account\",\"opening_balance\":\"0\",\"other_category\":\"\",\"active\":true,\"narrative\":\"Purchase Account\",\"created_by\":\"1\"}', '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_id\":\"6\",\"account_code\":\"800001\",\"account_name\":\"Purchase Account\",\"opening_balance\":\"0\",\"other_category\":\"\",\"active\":true,\"narrative\":\"Purchase Account\",\"created_by\":\"1\"}', '2022-03-22 20:33:47'),
(190, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1972, NULL, '2022-03-22 20:03:39', NULL, '{\"account_type_id\":\"3\",\"subaccount_type_id\":\"6\",\"account_code\":\"800001\",\"account_name\":\"Purchase Account\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"Purchase Account\"}', '{\"account_type_id\":\"3\",\"subaccount_type_id\":\"6\",\"account_code\":\"800001\",\"account_name\":\"Purchase Account\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"Purchase Account\"}', '2022-03-22 20:51:39'),
(191, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1971, NULL, '2022-03-22 20:03:48', NULL, '{\"account_type_id\":\"4\",\"subaccount_type_id\":\"27\",\"account_code\":\"700001\",\"account_name\":\"Sales Account\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"Sales Account\"}', '{\"account_type_id\":\"4\",\"subaccount_type_id\":\"27\",\"account_code\":\"700001\",\"account_name\":\"Sales Account\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"Sales Account\"}', '2022-03-22 20:51:48'),
(192, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1971, NULL, '2022-03-22 20:03:46', NULL, '{\"account_type_id\":\"4\",\"subaccount_type_id\":\"27\",\"account_code\":\"700001\",\"account_name\":\"Sales Account\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"Sales Account\"}', '{\"account_type_id\":\"4\",\"subaccount_type_id\":\"27\",\"account_code\":\"700001\",\"account_name\":\"Sales Account\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"Sales Account\"}', '2022-03-22 20:56:46'),
(193, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1972, NULL, '2022-03-22 20:03:20', NULL, '{\"account_type_id\":\"3\",\"subaccount_type_id\":\"6\",\"account_code\":\"800001\",\"account_name\":\"Purchase Account\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"0\",\"active\":true,\"narrative\":\"Purchase Account\"}', '{\"account_type_id\":\"3\",\"subaccount_type_id\":\"6\",\"account_code\":\"800001\",\"account_name\":\"Purchase Account\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"0\",\"active\":true,\"narrative\":\"Purchase Account\"}', '2022-03-22 20:58:20'),
(194, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1972, NULL, '2022-03-22 20:03:28', NULL, '{\"account_type_id\":\"3\",\"subaccount_type_id\":\"6\",\"account_code\":\"800001\",\"account_name\":\"Purchase Account\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"Purchase Account\"}', '{\"account_type_id\":\"3\",\"subaccount_type_id\":\"6\",\"account_code\":\"800001\",\"account_name\":\"Purchase Account\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"Purchase Account\"}', '2022-03-22 20:58:28'),
(195, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-23 03:03:43', NULL, NULL, NULL, '2022-03-23 04:43:43'),
(196, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-23 04:03:34', NULL, NULL, NULL, '2022-03-23 05:48:34'),
(197, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-23 07:03:42', NULL, NULL, NULL, '2022-03-23 08:27:42'),
(198, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-23 10:03:21', NULL, NULL, NULL, '2022-03-23 11:29:21'),
(199, 'add_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 28, NULL, '2022-03-23 11:03:39', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"1\",\"subaccount_type_code\":\"ASSETS_5\",\"subaccount_type_name\":\"Other Asset Accounts\",\"is_paymentmode\":\"0\",\"narrative\":\"Other Asset Accounts\"}', '{\"org_id\":\"1\",\"account_type_id\":\"1\",\"subaccount_type_code\":\"ASSETS_5\",\"subaccount_type_name\":\"Other Asset Accounts\",\"is_paymentmode\":\"0\",\"narrative\":\"Other Asset Accounts\"}', '2022-03-23 11:44:39'),
(200, 'add_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 29, NULL, '2022-03-23 11:03:44', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_code\":\"SALE_ACCOUNTS\",\"subaccount_type_name\":\"Sales Accounts\",\"is_paymentmode\":\"0\",\"narrative\":\"Sales Accounts\"}', '{\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_code\":\"SALE_ACCOUNTS\",\"subaccount_type_name\":\"Sales Accounts\",\"is_paymentmode\":\"0\",\"narrative\":\"Sales Accounts\"}', '2022-03-23 11:46:44'),
(201, 'add_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 30, NULL, '2022-03-23 11:03:16', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"5\",\"subaccount_type_code\":\"GL\",\"subaccount_type_name\":\"General Liabilities\",\"is_paymentmode\":\"0\",\"narrative\":\"General Liabilities\\r\\n\"}', '{\"org_id\":\"1\",\"account_type_id\":\"5\",\"subaccount_type_code\":\"GL\",\"subaccount_type_name\":\"General Liabilities\",\"is_paymentmode\":\"0\",\"narrative\":\"General Liabilities\\r\\n\"}', '2022-03-23 11:51:16'),
(202, 'update_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 16, NULL, '2022-03-23 11:03:02', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_code\":\"GE\",\"is_paymentmode\":\"0\",\"subaccount_type_name\":\"General Expenses\",\"narrative\":\"General Expenses category\"}', '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_code\":\"GE\",\"is_paymentmode\":\"0\",\"subaccount_type_name\":\"General Expenses\",\"narrative\":\"General Expenses category\"}', '2022-03-23 11:52:02'),
(203, 'update_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 28, NULL, '2022-03-23 11:03:49', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"1\",\"subaccount_type_code\":\"GA\",\"is_paymentmode\":\"0\",\"subaccount_type_name\":\"General Assets\",\"narrative\":\"Other Asset Accounts\"}', '{\"org_id\":\"1\",\"account_type_id\":\"1\",\"subaccount_type_code\":\"GA\",\"is_paymentmode\":\"0\",\"subaccount_type_name\":\"General Assets\",\"narrative\":\"Other Asset Accounts\"}', '2022-03-23 11:52:49'),
(204, 'update_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 19, NULL, '2022-03-23 11:03:00', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"5\",\"subaccount_type_code\":\"GL\",\"is_paymentmode\":\"0\",\"subaccount_type_name\":\"General Liabilities\",\"narrative\":\"\"}', '{\"org_id\":\"1\",\"account_type_id\":\"5\",\"subaccount_type_code\":\"GL\",\"is_paymentmode\":\"0\",\"subaccount_type_name\":\"General Liabilities\",\"narrative\":\"\"}', '2022-03-23 11:53:00'),
(205, 'delete_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 19, NULL, '2022-03-23 11:03:18', NULL, '{\"subaccount_type_id\":\"19\",\"org_id\":\"1\",\"account_type_id\":\"5\",\"subaccount_type_code\":\"GL\",\"subaccount_type_name\":\"General Liabilities\",\"is_paymentmode\":\"0\",\"narrative\":\"\",\"time_stamp\":\"2021-04-30 10:10:08\"}', '{\"subaccount_type_id\":\"19\",\"org_id\":\"1\",\"account_type_id\":\"5\",\"subaccount_type_code\":\"GL\",\"subaccount_type_name\":\"General Liabilities\",\"is_paymentmode\":\"0\",\"narrative\":\"\",\"time_stamp\":\"2021-04-30 10:10:08\"}', '2022-03-23 11:53:18'),
(206, 'add_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 31, NULL, '2022-03-23 11:03:29', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_code\":\"TAXES\",\"subaccount_type_name\":\"Taxes\",\"is_paymentmode\":\"0\",\"narrative\":\"\"}', '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_code\":\"TAXES\",\"subaccount_type_name\":\"Taxes\",\"is_paymentmode\":\"0\",\"narrative\":\"\"}', '2022-03-23 11:54:29'),
(207, 'delete_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 18, NULL, '2022-03-23 11:03:43', NULL, '{\"subaccount_type_id\":\"18\",\"org_id\":\"1\",\"account_type_id\":\"1\",\"subaccount_type_code\":\"ARC001\",\"subaccount_type_name\":\"Amounts Receivable\",\"is_paymentmode\":\"0\",\"narrative\":\"\",\"time_stamp\":\"2021-04-30 08:44:27\"}', '{\"subaccount_type_id\":\"18\",\"org_id\":\"1\",\"account_type_id\":\"1\",\"subaccount_type_code\":\"ARC001\",\"subaccount_type_name\":\"Amounts Receivable\",\"is_paymentmode\":\"0\",\"narrative\":\"\",\"time_stamp\":\"2021-04-30 08:44:27\"}', '2022-03-23 11:54:43'),
(208, 'delete_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 23, NULL, '2022-03-23 11:03:35', NULL, '{\"subaccount_type_id\":\"23\",\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_code\":\"SAL_001\",\"subaccount_type_name\":\"Salary\",\"is_paymentmode\":\"0\",\"narrative\":\"\",\"time_stamp\":\"2021-05-21 11:44:43\"}', '{\"subaccount_type_id\":\"23\",\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_code\":\"SAL_001\",\"subaccount_type_name\":\"Salary\",\"is_paymentmode\":\"0\",\"narrative\":\"\",\"time_stamp\":\"2021-05-21 11:44:43\"}', '2022-03-23 11:56:35'),
(209, 'update_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 6, NULL, '2022-03-23 11:03:49', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_code\":\"PURCHASES\",\"is_paymentmode\":\"0\",\"subaccount_type_name\":\"Purchases\",\"narrative\":\"Purchase Account Type\"}', '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_code\":\"PURCHASES\",\"is_paymentmode\":\"0\",\"subaccount_type_name\":\"Purchases\",\"narrative\":\"Purchase Account Type\"}', '2022-03-23 11:56:49'),
(210, 'delete_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 29, NULL, '2022-03-23 11:03:02', NULL, '{\"subaccount_type_id\":\"29\",\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_code\":\"SALE_ACCOUNTS\",\"subaccount_type_name\":\"Sales Accounts\",\"is_paymentmode\":\"0\",\"narrative\":\"Sales Accounts\",\"time_stamp\":\"2022-03-23 14:46:44\"}', '{\"subaccount_type_id\":\"29\",\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_code\":\"SALE_ACCOUNTS\",\"subaccount_type_name\":\"Sales Accounts\",\"is_paymentmode\":\"0\",\"narrative\":\"Sales Accounts\",\"time_stamp\":\"2022-03-23 14:46:44\"}', '2022-03-23 11:57:02'),
(211, 'delete_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 7, NULL, '2022-03-23 12:03:49', NULL, '{\"account_id\":\"7\",\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_id\":\"16\",\"account_code\":\"9894044\",\"account_name\":\"Vehicle Fuel\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"is_key\":\"0\",\"other_category\":\"\",\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"ddd \",\"created_by\":\"2\",\"time_stamp\":\"2021-03-22 13:37:30\"}', '{\"account_id\":\"7\",\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_id\":\"16\",\"account_code\":\"9894044\",\"account_name\":\"Vehicle Fuel\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"is_key\":\"0\",\"other_category\":\"\",\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"ddd \",\"created_by\":\"2\",\"time_stamp\":\"2021-03-22 13:37:30\"}', '2022-03-23 12:02:49'),
(212, 'delete_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 12, NULL, '2022-03-23 12:03:55', NULL, '{\"account_id\":\"12\",\"org_id\":\"1\",\"account_type_id\":\"5\",\"subaccount_type_id\":\"19\",\"account_code\":\"600002\",\"account_name\":\"Supplier Balances\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"is_key\":\"0\",\"other_category\":\"CL\",\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"\",\"created_by\":\"2\",\"time_stamp\":\"2021-04-30 10:11:52\"}', '{\"account_id\":\"12\",\"org_id\":\"1\",\"account_type_id\":\"5\",\"subaccount_type_id\":\"19\",\"account_code\":\"600002\",\"account_name\":\"Supplier Balances\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"is_key\":\"0\",\"other_category\":\"CL\",\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"\",\"created_by\":\"2\",\"time_stamp\":\"2021-04-30 10:11:52\"}', '2022-03-23 12:02:55'),
(213, 'delete_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 37, NULL, '2022-03-23 12:03:30', NULL, '{\"account_id\":\"37\",\"org_id\":\"1\",\"account_type_id\":\"5\",\"subaccount_type_id\":\"12\",\"account_code\":\"4355454\",\"account_name\":\"Accounts payable\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"is_key\":\"0\",\"other_category\":null,\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"\",\"created_by\":\"2\",\"time_stamp\":\"2021-03-26 09:27:42\"}', '{\"account_id\":\"37\",\"org_id\":\"1\",\"account_type_id\":\"5\",\"subaccount_type_id\":\"12\",\"account_code\":\"4355454\",\"account_name\":\"Accounts payable\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"is_key\":\"0\",\"other_category\":null,\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"\",\"created_by\":\"2\",\"time_stamp\":\"2021-03-26 09:27:42\"}', '2022-03-23 12:03:30'),
(214, 'delete_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1895, NULL, '2022-03-23 12:03:20', NULL, '{\"account_id\":\"1895\",\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_id\":\"17\",\"account_code\":\"RB001\",\"account_name\":\"RECORD BOOK\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"is_key\":\"0\",\"other_category\":\"\",\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"\",\"created_by\":\"2\",\"time_stamp\":\"2021-10-07 11:49:57\"}', '{\"account_id\":\"1895\",\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_id\":\"17\",\"account_code\":\"RB001\",\"account_name\":\"RECORD BOOK\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"is_key\":\"0\",\"other_category\":\"\",\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"\",\"created_by\":\"2\",\"time_stamp\":\"2021-10-07 11:49:57\"}', '2022-03-23 12:24:20'),
(215, 'delete_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1894, NULL, '2022-03-23 12:03:26', NULL, '{\"account_id\":\"1894\",\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_id\":\"17\",\"account_code\":\"FRM100\",\"account_name\":\"APPLICATION FORMS\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"is_key\":\"0\",\"other_category\":\"\",\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"\",\"created_by\":\"2\",\"time_stamp\":\"2021-10-07 11:48:17\"}', '{\"account_id\":\"1894\",\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_id\":\"17\",\"account_code\":\"FRM100\",\"account_name\":\"APPLICATION FORMS\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"is_key\":\"0\",\"other_category\":\"\",\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"\",\"created_by\":\"2\",\"time_stamp\":\"2021-10-07 11:48:17\"}', '2022-03-23 12:24:26'),
(216, 'delete_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1912, NULL, '2022-03-23 12:03:31', NULL, '{\"account_id\":\"1912\",\"org_id\":\"1\",\"account_type_id\":\"5\",\"subaccount_type_id\":\"25\",\"account_code\":\"TK234\",\"account_name\":\"TAEKWONDO\",\"opening_balance\":\"0.00\",\"is_votehead\":\"1\",\"is_studentaccount\":\"0\",\"is_key\":\"0\",\"other_category\":null,\"student_id\":null,\"table_id\":\"70\",\"table_name\":\"vote_heads\",\"active\":\"1\",\"narrative\":\"Vote Head\",\"created_by\":\"2\",\"time_stamp\":\"2021-10-13 10:05:41\"}', '{\"account_id\":\"1912\",\"org_id\":\"1\",\"account_type_id\":\"5\",\"subaccount_type_id\":\"25\",\"account_code\":\"TK234\",\"account_name\":\"TAEKWONDO\",\"opening_balance\":\"0.00\",\"is_votehead\":\"1\",\"is_studentaccount\":\"0\",\"is_key\":\"0\",\"other_category\":null,\"student_id\":null,\"table_id\":\"70\",\"table_name\":\"vote_heads\",\"active\":\"1\",\"narrative\":\"Vote Head\",\"created_by\":\"2\",\"time_stamp\":\"2021-10-13 10:05:41\"}', '2022-03-23 12:24:31'),
(217, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 655, NULL, '2022-03-23 12:03:46', NULL, '{\"account_type_id\":\"4\",\"subaccount_type_id\":\"17\",\"account_code\":\"LBK001\",\"account_name\":\"Lost Book\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '{\"account_type_id\":\"4\",\"subaccount_type_id\":\"17\",\"account_code\":\"LBK001\",\"account_name\":\"Lost Book\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '2022-03-23 12:24:46'),
(218, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 2, NULL, '2022-03-23 12:03:51', NULL, '{\"account_type_id\":\"1\",\"subaccount_type_id\":\"2\",\"account_code\":\"87328\",\"account_name\":\"Petty Cash\",\"opening_balance\":\"250.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"All the cash received\"}', '{\"account_type_id\":\"1\",\"subaccount_type_id\":\"2\",\"account_code\":\"87328\",\"account_name\":\"Petty Cash\",\"opening_balance\":\"250.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"All the cash received\"}', '2022-03-23 12:24:51'),
(219, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 3, NULL, '2022-03-23 12:03:56', NULL, '{\"account_type_id\":\"1\",\"subaccount_type_id\":\"3\",\"account_code\":\"522123\",\"account_name\":\"Paybill 522123\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"Paybill\"}', '{\"account_type_id\":\"1\",\"subaccount_type_id\":\"3\",\"account_code\":\"522123\",\"account_name\":\"Paybill 522123\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"Paybill\"}', '2022-03-23 12:24:56'),
(220, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 6, NULL, '2022-03-23 12:03:02', NULL, '{\"account_type_id\":\"1\",\"subaccount_type_id\":\"1\",\"account_code\":\"1181575397\",\"account_name\":\"KCB \",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '{\"account_type_id\":\"1\",\"subaccount_type_id\":\"1\",\"account_code\":\"1181575397\",\"account_name\":\"KCB \",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '2022-03-23 12:25:02'),
(221, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 8, NULL, '2022-03-23 12:03:09', NULL, '{\"account_type_id\":\"3\",\"subaccount_type_id\":\"16\",\"account_code\":\"2343423\",\"account_name\":\"Furniture Repair\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"Furniture Repair\"}', '{\"account_type_id\":\"3\",\"subaccount_type_id\":\"16\",\"account_code\":\"2343423\",\"account_name\":\"Furniture Repair\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"Furniture Repair\"}', '2022-03-23 12:25:09'),
(222, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 32, NULL, '2022-03-23 12:03:17', NULL, '{\"account_type_id\":\"1\",\"subaccount_type_id\":\"1\",\"account_code\":\"300002\",\"account_name\":\"Accounts receivable\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '{\"account_type_id\":\"1\",\"subaccount_type_id\":\"1\",\"account_code\":\"300002\",\"account_name\":\"Accounts receivable\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '2022-03-23 12:25:17'),
(223, 'delete_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 33, NULL, '2022-03-23 12:03:26', NULL, '{\"account_id\":\"33\",\"org_id\":\"1\",\"account_type_id\":\"1\",\"subaccount_type_id\":\"10\",\"account_code\":\"7554342\",\"account_name\":\"Inventory\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"is_key\":\"0\",\"other_category\":null,\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"\",\"created_by\":\"2\",\"time_stamp\":\"2021-03-26 09:24:48\"}', '{\"account_id\":\"33\",\"org_id\":\"1\",\"account_type_id\":\"1\",\"subaccount_type_id\":\"10\",\"account_code\":\"7554342\",\"account_name\":\"Inventory\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"is_key\":\"0\",\"other_category\":null,\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"\",\"created_by\":\"2\",\"time_stamp\":\"2021-03-26 09:24:48\"}', '2022-03-23 12:25:26'),
(224, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 34, NULL, '2022-03-23 12:03:39', NULL, '{\"account_type_id\":\"1\",\"subaccount_type_id\":\"1\",\"account_code\":\"575344\",\"account_name\":\"Pre-paid expenses\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '{\"account_type_id\":\"1\",\"subaccount_type_id\":\"1\",\"account_code\":\"575344\",\"account_name\":\"Pre-paid expenses\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '2022-03-23 12:25:39'),
(225, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 35, NULL, '2022-03-23 12:03:46', NULL, '{\"account_type_id\":\"1\",\"subaccount_type_id\":\"1\",\"account_code\":\"564343\",\"account_name\":\"Long-term investments\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '{\"account_type_id\":\"1\",\"subaccount_type_id\":\"1\",\"account_code\":\"564343\",\"account_name\":\"Long-term investments\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '2022-03-23 12:25:46'),
(226, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 39, NULL, '2022-03-23 12:03:22', NULL, '{\"account_type_id\":\"5\",\"subaccount_type_id\":\"1\",\"account_code\":\"6543543\",\"account_name\":\"Accrued expenses\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '{\"account_type_id\":\"5\",\"subaccount_type_id\":\"1\",\"account_code\":\"6543543\",\"account_name\":\"Accrued expenses\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '2022-03-23 12:27:22'),
(227, 'add_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1973, NULL, '2022-03-23 12:03:40', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"1\",\"subaccount_type_id\":\"28\",\"account_code\":\"500001\",\"account_name\":\"Inventory\",\"opening_balance\":\"0\",\"is_key\":\"1\",\"other_category\":\"\",\"active\":true,\"narrative\":\"\",\"created_by\":\"1\"}', '{\"org_id\":\"1\",\"account_type_id\":\"1\",\"subaccount_type_id\":\"28\",\"account_code\":\"500001\",\"account_name\":\"Inventory\",\"opening_balance\":\"0\",\"is_key\":\"1\",\"other_category\":\"\",\"active\":true,\"narrative\":\"\",\"created_by\":\"1\"}', '2022-03-23 12:40:40'),
(228, 'add_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1974, NULL, '2022-03-23 12:03:47', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"1\",\"subaccount_type_id\":\"28\",\"account_code\":\"500002\",\"account_name\":\"Sales Receivable\",\"opening_balance\":\"0\",\"is_key\":\"1\",\"other_category\":\"\",\"active\":true,\"narrative\":\"\",\"created_by\":\"1\"}', '{\"org_id\":\"1\",\"account_type_id\":\"1\",\"subaccount_type_id\":\"28\",\"account_code\":\"500002\",\"account_name\":\"Sales Receivable\",\"opening_balance\":\"0\",\"is_key\":\"1\",\"other_category\":\"\",\"active\":true,\"narrative\":\"\",\"created_by\":\"1\"}', '2022-03-23 12:41:47'),
(229, 'add_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1975, NULL, '2022-03-23 12:03:41', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"1\",\"subaccount_type_id\":\"28\",\"account_code\":\"500003\",\"account_name\":\"Purchase Tax Receivable\",\"opening_balance\":\"0\",\"is_key\":\"1\",\"other_category\":\"\",\"active\":true,\"narrative\":\"\",\"created_by\":\"1\"}', '{\"org_id\":\"1\",\"account_type_id\":\"1\",\"subaccount_type_id\":\"28\",\"account_code\":\"500003\",\"account_name\":\"Purchase Tax Receivable\",\"opening_balance\":\"0\",\"is_key\":\"1\",\"other_category\":\"\",\"active\":true,\"narrative\":\"\",\"created_by\":\"1\"}', '2022-03-23 12:42:41'),
(230, 'add_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1976, NULL, '2022-03-23 13:03:37', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"5\",\"subaccount_type_id\":\"30\",\"account_code\":\"600001\",\"account_name\":\"Pachases Payable\",\"opening_balance\":\"0\",\"is_key\":\"1\",\"other_category\":\"\",\"active\":true,\"narrative\":\"\",\"created_by\":\"1\"}', '{\"org_id\":\"1\",\"account_type_id\":\"5\",\"subaccount_type_id\":\"30\",\"account_code\":\"600001\",\"account_name\":\"Pachases Payable\",\"opening_balance\":\"0\",\"is_key\":\"1\",\"other_category\":\"\",\"active\":true,\"narrative\":\"\",\"created_by\":\"1\"}', '2022-03-23 13:00:37'),
(231, 'add_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1977, NULL, '2022-03-23 13:03:08', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"5\",\"subaccount_type_id\":\"30\",\"account_code\":\"600002\",\"account_name\":\"Salaries Payable\",\"opening_balance\":\"0\",\"is_key\":\"1\",\"other_category\":\"\",\"active\":true,\"narrative\":\"\",\"created_by\":\"1\"}', '{\"org_id\":\"1\",\"account_type_id\":\"5\",\"subaccount_type_id\":\"30\",\"account_code\":\"600002\",\"account_name\":\"Salaries Payable\",\"opening_balance\":\"0\",\"is_key\":\"1\",\"other_category\":\"\",\"active\":true,\"narrative\":\"\",\"created_by\":\"1\"}', '2022-03-23 13:01:08'),
(232, 'add_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1978, NULL, '2022-03-23 13:03:39', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"5\",\"subaccount_type_id\":\"30\",\"account_code\":\"600003\",\"account_name\":\"Sales Tax Payable\",\"opening_balance\":\"0\",\"is_key\":\"1\",\"other_category\":\"\",\"active\":true,\"narrative\":\"\",\"created_by\":\"1\"}', '{\"org_id\":\"1\",\"account_type_id\":\"5\",\"subaccount_type_id\":\"30\",\"account_code\":\"600003\",\"account_name\":\"Sales Tax Payable\",\"opening_balance\":\"0\",\"is_key\":\"1\",\"other_category\":\"\",\"active\":true,\"narrative\":\"\",\"created_by\":\"1\"}', '2022-03-23 13:01:39'),
(233, 'add_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-104-generic #118-Ubuntu SMP Wed Mar 2 19:02:41 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1979, NULL, '2022-03-23 13:03:02', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_id\":\"16\",\"account_code\":\"800002\",\"account_name\":\"Salaries\",\"opening_balance\":\"0\",\"is_key\":\"1\",\"other_category\":\"\",\"active\":true,\"narrative\":\"\",\"created_by\":\"1\"}', '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_id\":\"16\",\"account_code\":\"800002\",\"account_name\":\"Salaries\",\"opening_balance\":\"0\",\"is_key\":\"1\",\"other_category\":\"\",\"active\":true,\"narrative\":\"\",\"created_by\":\"1\"}', '2022-03-23 13:04:02'),
(234, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-26 19:03:10', NULL, NULL, NULL, '2022-03-26 20:35:10'),
(235, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 34, NULL, '2022-03-26 23:03:22', NULL, '{\"account_type_id\":\"1\",\"subaccount_type_id\":\"16\",\"account_code\":\"575344\",\"account_name\":\"Pre-paid expenses\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"0\",\"active\":true,\"narrative\":\"\"}', '{\"account_type_id\":\"1\",\"subaccount_type_id\":\"16\",\"account_code\":\"575344\",\"account_name\":\"Pre-paid expenses\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"0\",\"active\":true,\"narrative\":\"\"}', '2022-03-26 23:50:22'),
(236, 'delete_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 34, NULL, '2022-03-26 23:03:29', NULL, '{\"account_id\":\"34\",\"org_id\":\"1\",\"account_type_id\":\"1\",\"subaccount_type_id\":\"16\",\"account_code\":\"575344\",\"account_name\":\"Pre-paid expenses\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"is_key\":\"0\",\"other_category\":\"\",\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"\",\"created_by\":\"2\",\"time_stamp\":\"2021-03-26 09:25:16\"}', '{\"account_id\":\"34\",\"org_id\":\"1\",\"account_type_id\":\"1\",\"subaccount_type_id\":\"16\",\"account_code\":\"575344\",\"account_name\":\"Pre-paid expenses\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"is_key\":\"0\",\"other_category\":\"\",\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"\",\"created_by\":\"2\",\"time_stamp\":\"2021-03-26 09:25:16\"}', '2022-03-26 23:50:29'),
(237, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 35, NULL, '2022-03-26 23:03:01', NULL, '{\"account_type_id\":\"1\",\"subaccount_type_id\":\"28\",\"account_code\":\"564343\",\"account_name\":\"Long-term investments\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '{\"account_type_id\":\"1\",\"subaccount_type_id\":\"28\",\"account_code\":\"564343\",\"account_name\":\"Long-term investments\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '2022-03-26 23:51:01'),
(238, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 39, NULL, '2022-03-26 23:03:27', NULL, '{\"account_type_id\":\"5\",\"subaccount_type_id\":\"30\",\"account_code\":\"6543543\",\"account_name\":\"Accrued expenses\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '{\"account_type_id\":\"5\",\"subaccount_type_id\":\"30\",\"account_code\":\"6543543\",\"account_name\":\"Accrued expenses\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '2022-03-26 23:51:27'),
(239, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 32, NULL, '2022-03-26 23:03:59', NULL, '{\"account_type_id\":\"1\",\"subaccount_type_id\":\"28\",\"account_code\":\"300002\",\"account_name\":\"Accounts receivable\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '{\"account_type_id\":\"1\",\"subaccount_type_id\":\"28\",\"account_code\":\"300002\",\"account_name\":\"Accounts receivable\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '2022-03-26 23:51:59'),
(240, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-27 05:03:56', NULL, NULL, NULL, '2022-03-27 06:09:56'),
(241, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-27 08:03:38', NULL, NULL, NULL, '2022-03-27 09:40:38'),
(242, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-27 08:03:12', NULL, NULL, NULL, '2022-03-27 09:47:12'),
(243, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-27 08:03:14', NULL, NULL, NULL, '2022-03-27 09:48:14'),
(244, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-27 08:03:02', NULL, NULL, NULL, '2022-03-27 09:59:02'),
(245, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-27 09:03:37', NULL, NULL, NULL, '2022-03-27 10:01:37'),
(246, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-27 09:03:21', NULL, NULL, NULL, '2022-03-27 10:02:21'),
(247, 'resend_sms', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', 'sms', 'admin', 212, NULL, '2022-03-27 12:03:49', NULL, '{\"sms_id\":\"212\",\"org_id\":\"1\",\"entity_id\":\"1\",\"template_id\":\"1\",\"table_id\":\"8\",\"table_name\":\"orders\",\"code\":\"J27T7QUTVG\",\"phone\":\"0710422499\",\"message\":\"J27T7QUTVG. Order amount 3000.00, balance 3000\",\"sent\":\"1\",\"narrative\":\"sale\",\"time_stamp\":\"2022-03-27 15:56:51\"}', '{\"sms_id\":\"212\",\"org_id\":\"1\",\"entity_id\":\"1\",\"template_id\":\"1\",\"table_id\":\"8\",\"table_name\":\"orders\",\"code\":\"J27T7QUTVG\",\"phone\":\"0710422499\",\"message\":\"J27T7QUTVG. Order amount 3000.00, balance 3000\",\"sent\":\"1\",\"narrative\":\"sale\",\"time_stamp\":\"2022-03-27 15:56:51\"}', '2022-03-27 13:03:49'),
(248, 'resend_sms', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', 'sms', 'admin', 205, NULL, '2022-03-27 12:03:59', NULL, '{\"sms_id\":\"205\",\"org_id\":\"1\",\"entity_id\":\"3\",\"template_id\":\"1\",\"table_id\":\"279\",\"table_name\":\"fee_payment\",\"code\":null,\"phone\":\"0707866136\",\"message\":\"20211021161253 received. You paid Ksh48,015.00 for ADM2324\\/18 CASEY OWEN KASAMANI at 2021-10-21 16:12:53. New fee balance is Ksh0.00 \",\"sent\":\"1\",\"narrative\":\"Fee Payment\",\"time_stamp\":\"2021-10-21 16:12:53\"}', '{\"sms_id\":\"205\",\"org_id\":\"1\",\"entity_id\":\"3\",\"template_id\":\"1\",\"table_id\":\"279\",\"table_name\":\"fee_payment\",\"code\":null,\"phone\":\"0707866136\",\"message\":\"20211021161253 received. You paid Ksh48,015.00 for ADM2324\\/18 CASEY OWEN KASAMANI at 2021-10-21 16:12:53. New fee balance is Ksh0.00 \",\"sent\":\"1\",\"narrative\":\"Fee Payment\",\"time_stamp\":\"2021-10-21 16:12:53\"}', '2022-03-27 13:03:59'),
(249, 'resend_sms', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', 'sms', 'admin', 212, NULL, '2022-03-27 12:03:40', NULL, '{\"sms_id\":\"212\",\"org_id\":\"1\",\"entity_id\":\"1\",\"template_id\":\"1\",\"table_id\":\"8\",\"table_name\":\"orders\",\"code\":\"J27T7QUTVG\",\"phone\":\"0710422499\",\"message\":\"J27T7QUTVG. Order amount 3000.00, balance 3000\",\"sent\":\"1\",\"narrative\":\"sale\",\"time_stamp\":\"2022-03-27 15:56:51\"}', '{\"sms_id\":\"212\",\"org_id\":\"1\",\"entity_id\":\"1\",\"template_id\":\"1\",\"table_id\":\"8\",\"table_name\":\"orders\",\"code\":\"J27T7QUTVG\",\"phone\":\"0710422499\",\"message\":\"J27T7QUTVG. Order amount 3000.00, balance 3000\",\"sent\":\"1\",\"narrative\":\"sale\",\"time_stamp\":\"2022-03-27 15:56:51\"}', '2022-03-27 13:05:40');
INSERT INTO `sys_logs` (`sys_log_id`, `event_name`, `computer`, `operator`, `source`, `username`, `source_id`, `execution_id`, `start_time`, `end_time`, `task`, `narrative`, `time_stamp`) VALUES
(250, 'resend_sms', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', 'sms', 'admin', 206, NULL, '2022-03-27 12:03:30', NULL, '{\"sms_id\":\"206\",\"org_id\":\"1\",\"entity_id\":\"1\",\"template_id\":\"1\",\"table_id\":\"1150\",\"table_name\":\"students\",\"code\":null,\"phone\":\"0707866136\",\"message\":\"School fee balance for ADM3423\\/21 Imam Abdulsalaam Changa is Ksh27,016.00. Always pay fee in time. The Nyali School\",\"sent\":\"1\",\"narrative\":\"Fee Balance\",\"time_stamp\":\"2022-02-16 23:57:44\"}', '{\"sms_id\":\"206\",\"org_id\":\"1\",\"entity_id\":\"1\",\"template_id\":\"1\",\"table_id\":\"1150\",\"table_name\":\"students\",\"code\":null,\"phone\":\"0707866136\",\"message\":\"School fee balance for ADM3423\\/21 Imam Abdulsalaam Changa is Ksh27,016.00. Always pay fee in time. The Nyali School\",\"sent\":\"1\",\"narrative\":\"Fee Balance\",\"time_stamp\":\"2022-02-16 23:57:44\"}', '2022-03-27 13:06:30'),
(251, 'resend_sms', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', 'sms', 'admin', 212, NULL, '2022-03-27 12:03:04', NULL, '{\"sms_id\":\"212\",\"org_id\":\"1\",\"entity_id\":\"1\",\"template_id\":\"1\",\"table_id\":\"8\",\"table_name\":\"orders\",\"code\":\"J27T7QUTVG\",\"phone\":\"0710422499\",\"message\":\"J27T7QUTVG. Order amount 3000.00, balance 3000\",\"sent\":\"1\",\"narrative\":\"sale\",\"time_stamp\":\"2022-03-27 15:56:51\"}', '{\"sms_id\":\"212\",\"org_id\":\"1\",\"entity_id\":\"1\",\"template_id\":\"1\",\"table_id\":\"8\",\"table_name\":\"orders\",\"code\":\"J27T7QUTVG\",\"phone\":\"0710422499\",\"message\":\"J27T7QUTVG. Order amount 3000.00, balance 3000\",\"sent\":\"1\",\"narrative\":\"sale\",\"time_stamp\":\"2022-03-27 15:56:51\"}', '2022-03-27 13:07:04'),
(252, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-27 15:03:03', NULL, NULL, NULL, '2022-03-27 16:56:03'),
(253, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '2', '', '', NULL, NULL, '2022-03-28 04:03:38', NULL, NULL, NULL, '2022-03-28 05:26:38'),
(254, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-28 09:03:53', NULL, NULL, NULL, '2022-03-28 10:45:53'),
(255, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-28 12:03:57', NULL, NULL, NULL, '2022-03-28 13:23:57'),
(256, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-28 19:03:39', NULL, NULL, NULL, '2022-03-28 20:25:39'),
(257, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-29 01:03:51', NULL, NULL, NULL, '2022-03-29 02:39:51'),
(258, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-29 07:03:57', NULL, NULL, NULL, '2022-03-29 08:33:57'),
(259, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '2', '', '', NULL, NULL, '2022-03-31 03:03:37', NULL, NULL, NULL, '2022-03-31 04:08:37'),
(260, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '2', 'accounts', 'admin@admin.com', 655, NULL, '2022-03-31 05:03:49', NULL, '{\"account_type_id\":\"4\",\"subaccount_type_id\":\"17\",\"account_code\":\"LBK001\",\"account_name\":\"Lost Book\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"0\",\"active\":true,\"narrative\":\"\"}', '{\"account_type_id\":\"4\",\"subaccount_type_id\":\"17\",\"account_code\":\"LBK001\",\"account_name\":\"Lost Book\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"0\",\"active\":true,\"narrative\":\"\"}', '2022-03-31 05:45:49'),
(261, 'delete_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '2', 'accounts', 'admin@admin.com', 655, NULL, '2022-03-31 05:03:00', NULL, '{\"account_id\":\"655\",\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_id\":\"17\",\"account_code\":\"LBK001\",\"account_name\":\"Lost Book\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"is_key\":\"0\",\"other_category\":\"\",\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"\",\"created_by\":\"3\",\"time_stamp\":\"2021-07-15 16:01:12\"}', '{\"account_id\":\"655\",\"org_id\":\"1\",\"account_type_id\":\"4\",\"subaccount_type_id\":\"17\",\"account_code\":\"LBK001\",\"account_name\":\"Lost Book\",\"opening_balance\":\"0.00\",\"is_votehead\":\"0\",\"is_studentaccount\":\"0\",\"is_key\":\"0\",\"other_category\":\"\",\"student_id\":\"0\",\"table_id\":null,\"table_name\":null,\"active\":\"1\",\"narrative\":\"\",\"created_by\":\"3\",\"time_stamp\":\"2021-07-15 16:01:12\"}', '2022-03-31 05:46:00'),
(262, 'add_pettycash', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '2', 'petty_cash', 'admin@admin.com', 1, NULL, '2022-03-31 05:03:24', NULL, '{\"org_id\":\"1\",\"entity_id\":\"2\",\"status_id\":3,\"reference\":\"20220331084724\",\"account_id\":\"8\",\"department_id\":\"1\",\"pettycash_amount\":\"800\",\"pettycash_date\":\"2022-03-31\",\"narrative\":\"test narrative\"}', '{\"org_id\":\"1\",\"entity_id\":\"2\",\"status_id\":3,\"reference\":\"20220331084724\",\"account_id\":\"8\",\"department_id\":\"1\",\"pettycash_amount\":\"800\",\"pettycash_date\":\"2022-03-31\",\"narrative\":\"test narrative\"}', '2022-03-31 05:47:24'),
(263, 'update_pettycash_status', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '2', 'petty_cash', 'admin@admin.com', 1, NULL, '2022-03-31 05:03:30', NULL, '{\"status_id\":\"2\",\"approvedby_one\":\"2\"}', '{\"status_id\":\"2\",\"approvedby_one\":\"2\"}', '2022-03-31 05:48:30'),
(264, 'pay_pettycash', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '2', 'petty_cash', 'admin@admin.com', 1, NULL, '2022-03-31 05:03:06', NULL, '[{\"org_id\":\"1\",\"account_id\":\"8\",\"account_code\":\"2343423\",\"account_type_id\":\"3\",\"subaccount_type_id\":\"16\",\"fiscal_year_id\":\"6\",\"term_id\":\"3\",\"table_id\":\"1\",\"table_name\":\"petty_cash\",\"voucher_code\":\"20220331084724\",\"voucher_amount\":\"800.00\",\"voucher_type\":\"dr\",\"transaction_date\":\"2022-03-31\",\"created_by\":\"2\",\"approved_by\":\"2\",\"narrative\":\"Petty Cash: test narrative\"},{\"org_id\":\"1\",\"account_id\":\"8\",\"account_code\":\"2343423\",\"account_type_id\":\"3\",\"subaccount_type_id\":\"16\",\"fiscal_year_id\":\"6\",\"term_id\":\"3\",\"table_id\":\"1\",\"table_name\":\"petty_cash\",\"voucher_code\":\"20220331084724\",\"voucher_amount\":\"800.00\",\"voucher_type\":\"cr\",\"transaction_date\":\"2022-03-31\",\"created_by\":\"2\",\"approved_by\":\"2\",\"narrative\":\"Petty Cash: test narrative\"},{\"org_id\":\"1\",\"account_id\":\"2\",\"account_code\":\"87328\",\"account_type_id\":\"1\",\"subaccount_type_id\":\"2\",\"fiscal_year_id\":\"6\",\"term_id\":\"3\",\"table_id\":\"1\",\"table_name\":\"petty_cash\",\"voucher_code\":\"20220331084724\",\"voucher_amount\":\"800.00\",\"voucher_type\":\"cr\",\"transaction_date\":\"2022-03-31\",\"created_by\":\"2\",\"approved_by\":\"2\",\"narrative\":\"Petty Cash: test narrative\"}]', '{\"status_id\":1,\"paid_by\":\"2\"}', '2022-03-31 05:49:06'),
(265, 'add_budget', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '2', 'budgeting', 'admin@admin.com', 4, NULL, '2022-03-31 05:03:32', NULL, '{\"org_id\":\"1\",\"fiscal_year_id\":\"6\",\"term_id\":\"3\",\"staff_id\":\"\",\"account_id\":\"8\",\"budget_name\":\"Budget A1\",\"budget_amount\":\"5000\",\"narrative\":\"d\",\"active\":\"1\"}', '{\"org_id\":\"1\",\"fiscal_year_id\":\"6\",\"term_id\":\"3\",\"staff_id\":\"\",\"account_id\":\"8\",\"budget_name\":\"Budget A1\",\"budget_amount\":\"5000\",\"narrative\":\"d\",\"active\":\"1\"}', '2022-03-31 05:51:32'),
(266, 'update_budget', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '2', 'budgeting', 'admin@admin.com', 4, NULL, '2022-03-31 05:03:23', NULL, '{\"org_id\":\"1\",\"fiscal_year_id\":\"6\",\"term_id\":\"3\",\"staff_id\":\"\",\"account_id\":\"8\",\"budget_name\":\"Budget A1\",\"budget_amount\":\"500.00\",\"narrative\":\"d\",\"active\":\"1\"}', '{\"org_id\":\"1\",\"fiscal_year_id\":\"6\",\"term_id\":\"3\",\"staff_id\":\"\",\"account_id\":\"8\",\"budget_name\":\"Budget A1\",\"budget_amount\":\"500.00\",\"narrative\":\"d\",\"active\":\"1\"}', '2022-03-31 05:52:23'),
(267, 'add_expense', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '2', 'expenses', 'admin@admin.com', 3, NULL, '2022-03-31 05:03:47', NULL, '{\"org_id\":\"1\",\"account_id\":\"8\",\"account_code\":\"2343423\",\"account_type_id\":\"3\",\"subaccount_type_id\":\"16\",\"fiscal_year_id\":\"6\",\"term_id\":\"3\",\"table_id\":3,\"table_name\":\"expenses\",\"voucher_code\":\"20220331085547\",\"voucher_amount\":\"600\",\"voucher_type\":\"cr\",\"transaction_date\":\"2022-03-31\",\"created_by\":\"2\",\"approved_by\":\"\",\"narrative\":\"New expense: Test expense\"}', '{\"reference\":\"20220331085547\",\"org_id\":\"1\",\"vote_head_id\":\"\",\"vote_head_code\":null,\"department_id\":\"1\",\"account_id\":\"8\",\"paid_to\":\"Ian\",\"expense_balance\":\"600\",\"entity_id\":\"2\",\"status_id\":\"3\",\"expense_amount\":\"600\",\"expense_date\":\"2022-03-31\",\"narrative\":\"Test expense\",\"active\":\"1\"}', '2022-03-31 05:55:47'),
(268, 'udpdate_expense', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '2', 'expenses', 'admin@admin.com', 3, NULL, '2022-03-31 04:03:39', NULL, '{\"org_id\":\"1\",\"vote_head_id\":\"\",\"vote_head_code\":null,\"account_id\":\"8\",\"department_id\":\"1\",\"paid_to\":\"Ian\",\"expense_balance\":\"600.00\",\"entity_id\":\"2\",\"status_id\":\"2\",\"expense_amount\":\"600.00\",\"expense_date\":\"2022-03-31\",\"narrative\":\"Test expense\",\"active\":\"1\"}', '{\"org_id\":\"1\",\"vote_head_id\":\"\",\"vote_head_code\":null,\"account_id\":\"8\",\"department_id\":\"1\",\"paid_to\":\"Ian\",\"expense_balance\":\"600.00\",\"entity_id\":\"2\",\"status_id\":\"2\",\"expense_amount\":\"600.00\",\"expense_date\":\"2022-03-31\",\"narrative\":\"Test expense\",\"active\":\"1\"}', '2022-03-31 05:56:39'),
(269, 'expense_payment', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '2', 'payments', 'admin@admin.com', 1, NULL, '2022-03-31 05:03:14', NULL, '{\"expense_id\":\"3\",\"subaccount_type_id\":\"1\",\"account_id\":\"6\",\"payment_amount\":\"400\",\"reference\":\"20220331085714\",\"payment_date\":\"2022-03-31\",\"check_no\":\"wetryiyuo\",\"created_by\":\"2\",\"narrative\":\"Test expense\",\"active\":\"1\"}', '{\"expense_id\":\"3\",\"subaccount_type_id\":\"1\",\"account_id\":\"6\",\"payment_amount\":\"400\",\"reference\":\"20220331085714\",\"payment_date\":\"2022-03-31\",\"check_no\":\"wetryiyuo\",\"created_by\":\"2\",\"narrative\":\"Test expense\",\"active\":\"1\"}', '2022-03-31 05:57:14'),
(270, 'expense_payment', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '2', 'payments', 'admin@admin.com', 2, NULL, '2022-03-31 05:03:35', NULL, '{\"expense_id\":\"3\",\"subaccount_type_id\":\"1\",\"account_id\":\"6\",\"payment_amount\":\"200\",\"reference\":\"20220331085735\",\"payment_date\":\"2022-03-31\",\"check_no\":\"wrertiu\",\"created_by\":\"2\",\"narrative\":\"Test expense\",\"active\":\"1\"}', '{\"expense_id\":\"3\",\"subaccount_type_id\":\"1\",\"account_id\":\"6\",\"payment_amount\":\"200\",\"reference\":\"20220331085735\",\"payment_date\":\"2022-03-31\",\"check_no\":\"wrertiu\",\"created_by\":\"2\",\"narrative\":\"Test expense\",\"active\":\"1\"}', '2022-03-31 05:57:35'),
(271, 'new_income', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '2', 'incomes', 'admin@admin.com', 2, NULL, '2022-03-31 06:03:32', NULL, '{\"org_id\":\"1\",\"account_id\":\"1971\",\"account_code\":\"700001\",\"account_type_id\":\"4\",\"subaccount_type_id\":\"27\",\"fiscal_year_id\":\"6\",\"term_id\":\"3\",\"table_id\":2,\"table_name\":\"incomes\",\"voucher_code\":\"20220331090131\",\"reference\":\"20220331090131\",\"voucher_amount\":\"850\",\"voucher_type\":\"cr\",\"transaction_date\":\"2022-03-31\",\"created_by\":\"2\",\"approved_by\":\"\",\"narrative\":\"Sales Beryl Omondi\"}', '{\"org_id\":\"1\",\"account_id\":\"1971\",\"status_id\":\"2\",\"reference\":\"20220331090131\",\"income_amount\":\"850\",\"department_id\":\"1\",\"income_date\":\"2022-03-31\",\"customer_name\":\"Beryl Omondi\",\"narrative\":\"\",\"active\":\"1\",\"created_by\":\"2\"}', '2022-03-31 06:01:32'),
(272, 'new_income', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '2', 'incomes', 'admin@admin.com', 3, NULL, '2022-03-31 06:03:24', NULL, '{\"org_id\":\"1\",\"account_id\":\"1971\",\"account_code\":\"700001\",\"account_type_id\":\"4\",\"subaccount_type_id\":\"27\",\"fiscal_year_id\":\"6\",\"term_id\":\"3\",\"table_id\":3,\"table_name\":\"incomes\",\"voucher_code\":\"20220331090524\",\"reference\":\"20220331090524\",\"voucher_amount\":\"450\",\"voucher_type\":\"cr\",\"transaction_date\":\"2022-03-31\",\"created_by\":\"2\",\"approved_by\":\"\",\"narrative\":\"Sales Kama\"}', '{\"org_id\":\"1\",\"account_id\":\"1971\",\"status_id\":\"3\",\"reference\":\"20220331090524\",\"income_amount\":\"450\",\"department_id\":\"\",\"income_date\":\"2022-03-31\",\"customer_name\":\"Kama\",\"narrative\":\"d\",\"active\":\"1\",\"created_by\":\"2\"}', '2022-03-31 06:05:24'),
(273, 'update_income', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '2', 'incomes', 'admin@admin.com', 3, NULL, '2022-03-31 06:03:35', NULL, '{\"org_id\":\"1\",\"account_id\":\"1971\",\"status_id\":\"2\",\"income_amount\":\"450\",\"income_date\":\"2022-03-31\",\"department_id\":\"\",\"customer_name\":\"Kama\",\"narrative\":\"d\",\"active\":\"1\",\"created_by\":\"2\"}', '{\"org_id\":\"1\",\"account_id\":\"1971\",\"status_id\":\"2\",\"income_amount\":\"450\",\"income_date\":\"2022-03-31\",\"department_id\":\"\",\"customer_name\":\"Kama\",\"narrative\":\"d\",\"active\":\"1\",\"created_by\":\"2\"}', '2022-03-31 06:05:35'),
(274, 'income_payment', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '2', 'income_payments', 'admin@admin.com', 2, NULL, '2022-03-31 06:03:15', NULL, '[{\"org_id\":\"1\",\"account_id\":\"2\",\"account_code\":\"87328\",\"account_type_id\":\"1\",\"subaccount_type_id\":\"2\",\"fiscal_year_id\":\"6\",\"term_id\":\"3\",\"table_id\":2,\"table_name\":\"income_payments\",\"voucher_code\":\"20220331090614\",\"reference\":\"00798\",\"voucher_amount\":\"450\",\"voucher_type\":\"dr\",\"transaction_date\":\"2022-03-31\",\"created_by\":\"2\",\"approved_by\":\"\",\"narrative\":\"Income Payment d\"},{\"org_id\":\"1\",\"account_id\":\"1971\",\"account_code\":\"700001\",\"account_type_id\":\"4\",\"subaccount_type_id\":\"27\",\"fiscal_year_id\":\"6\",\"term_id\":\"3\",\"table_id\":2,\"table_name\":\"income_payments\",\"voucher_code\":\"20220331090614\",\"reference\":\"00798\",\"voucher_amount\":\"450\",\"voucher_type\":\"dr\",\"transaction_date\":\"2022-03-31\",\"created_by\":\"2\",\"approved_by\":\"\",\"narrative\":\"Income Payment Sales Account d\"}]', '{\"income_id\":\"3\",\"subaccount_type_id\":\"2\",\"account_id\":\"2\",\"payment_amount\":\"450\",\"payment_date\":\"2022-03-31\",\"reference\":\"00798\",\"bill_no\":\"20220331090614\",\"narrative\":\"d\",\"paid_by\":\"Kama\",\"active\":\"1\",\"entity_id\":\"2\",\"is_paid\":1}', '2022-03-31 06:06:15'),
(275, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-03-31 16:03:07', NULL, NULL, NULL, '2022-03-31 17:32:07'),
(276, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-01 01:04:04', NULL, NULL, NULL, '2022-04-01 02:31:04'),
(277, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-04 08:04:01', NULL, NULL, NULL, '2022-04-04 09:37:01'),
(278, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-05 02:04:02', NULL, NULL, NULL, '2022-04-05 03:45:02'),
(279, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-05 05:04:16', NULL, NULL, NULL, '2022-04-05 06:21:16'),
(280, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-05 09:04:26', NULL, NULL, NULL, '2022-04-05 10:51:26'),
(281, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-05 10:04:05', NULL, NULL, NULL, '2022-04-05 11:55:05'),
(282, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-05 11:04:16', NULL, NULL, NULL, '2022-04-05 12:54:16'),
(283, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '38', '', '', NULL, NULL, '2022-04-05 12:04:40', NULL, NULL, NULL, '2022-04-05 13:13:40'),
(284, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-12 09:04:43', NULL, NULL, NULL, '2022-04-12 10:43:43'),
(285, 'add_backup', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', 'db_backups', 'admin@admin.com', 2, NULL, '2022-04-12 12:04:55', NULL, '{\"backup_name\":\"backup-on-2022-04-12-15-01-54.zip\"}', '{\"backup_name\":\"backup-on-2022-04-12-15-01-54.zip\"}', '2022-04-12 13:01:55'),
(286, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-12 12:04:31', NULL, NULL, NULL, '2022-04-12 13:51:31'),
(287, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-13 05:04:55', NULL, NULL, NULL, '2022-04-13 06:26:55'),
(288, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-13 06:04:36', NULL, NULL, NULL, '2022-04-13 07:21:36'),
(289, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-13 06:04:36', NULL, NULL, NULL, '2022-04-13 07:22:36'),
(290, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-13 06:04:36', NULL, NULL, NULL, '2022-04-13 07:23:36'),
(291, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-13 07:04:05', NULL, NULL, NULL, '2022-04-13 08:26:05'),
(292, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-13 12:04:07', NULL, NULL, NULL, '2022-04-13 13:19:07'),
(293, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-14 05:04:37', NULL, NULL, NULL, '2022-04-14 06:22:37'),
(294, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-14 07:04:24', NULL, NULL, NULL, '2022-04-14 08:15:24'),
(295, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-14 08:04:55', NULL, NULL, NULL, '2022-04-14 09:53:55'),
(296, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-14 13:04:43', NULL, NULL, NULL, '2022-04-14 14:53:43'),
(297, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-19 04:04:41', NULL, NULL, NULL, '2022-04-19 05:27:41'),
(298, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-19 08:04:21', NULL, NULL, NULL, '2022-04-19 09:21:21'),
(299, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-19 10:04:13', NULL, NULL, NULL, '2022-04-19 11:21:13'),
(300, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-20 04:04:37', NULL, NULL, NULL, '2022-04-20 05:59:37'),
(301, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-20 09:04:44', NULL, NULL, NULL, '2022-04-20 10:43:44'),
(302, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-20 13:04:18', NULL, NULL, NULL, '2022-04-20 14:17:18'),
(303, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-21 04:04:00', NULL, NULL, NULL, '2022-04-21 05:31:00'),
(304, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-21 04:04:06', NULL, NULL, NULL, '2022-04-21 05:33:06'),
(305, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-21 04:04:26', NULL, NULL, NULL, '2022-04-21 05:46:26'),
(306, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-21 04:04:19', NULL, NULL, NULL, '2022-04-21 05:52:19'),
(307, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-21 05:04:46', NULL, NULL, NULL, '2022-04-21 06:20:46'),
(308, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-22 05:04:05', NULL, NULL, NULL, '2022-04-22 06:12:05'),
(309, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-22 05:04:46', NULL, NULL, NULL, '2022-04-22 06:32:46'),
(310, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-22 05:04:02', NULL, NULL, NULL, '2022-04-22 06:34:02'),
(311, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-22 05:04:49', NULL, NULL, NULL, '2022-04-22 06:34:49'),
(312, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-22 05:04:16', NULL, NULL, NULL, '2022-04-22 06:51:16'),
(313, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-22 05:04:22', NULL, NULL, NULL, '2022-04-22 06:55:22'),
(314, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-22 05:04:14', NULL, NULL, NULL, '2022-04-22 06:56:14'),
(315, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-22 06:04:39', NULL, NULL, NULL, '2022-04-22 07:06:39'),
(316, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-22 06:04:56', NULL, NULL, NULL, '2022-04-22 07:06:56'),
(317, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-22 06:04:21', NULL, NULL, NULL, '2022-04-22 07:08:21'),
(318, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-22 10:04:17', NULL, NULL, NULL, '2022-04-22 11:37:17'),
(319, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-26 03:04:42', NULL, NULL, NULL, '2022-04-26 04:51:42'),
(320, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-26 04:04:51', NULL, NULL, NULL, '2022-04-26 05:45:51'),
(321, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-26 05:04:03', NULL, NULL, NULL, '2022-04-26 06:05:03'),
(322, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-26 05:04:02', NULL, NULL, NULL, '2022-04-26 06:07:02'),
(323, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-26 05:04:01', NULL, NULL, NULL, '2022-04-26 06:58:01'),
(324, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-26 12:04:50', NULL, NULL, NULL, '2022-04-26 13:58:50'),
(325, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-27 05:04:31', NULL, NULL, NULL, '2022-04-27 06:13:31'),
(326, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-27 06:04:21', NULL, NULL, NULL, '2022-04-27 07:21:21'),
(327, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-27 08:04:03', NULL, NULL, NULL, '2022-04-27 09:14:03'),
(328, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-28 09:04:32', NULL, NULL, NULL, '2022-04-28 10:58:32'),
(329, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-28 10:04:47', NULL, NULL, NULL, '2022-04-28 11:48:47'),
(330, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-04-28 10:04:59', NULL, NULL, NULL, '2022-04-28 11:49:59'),
(331, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-05-04 06:05:10', NULL, NULL, NULL, '2022-05-04 07:55:10'),
(332, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-05-04 07:05:45', NULL, NULL, NULL, '2022-05-04 08:41:45'),
(333, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-05-06 05:05:58', NULL, NULL, NULL, '2022-05-06 06:55:58'),
(334, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-05-16 05:05:46', NULL, NULL, NULL, '2022-05-16 06:04:46'),
(335, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-05-16 08:05:38', NULL, NULL, NULL, '2022-05-16 09:45:38'),
(336, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-05-30 08:05:05', NULL, NULL, NULL, '2022-05-30 09:19:05'),
(337, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-05-30 09:05:36', NULL, NULL, NULL, '2022-05-30 10:40:36'),
(338, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-06-07 10:06:52', NULL, NULL, NULL, '2022-06-07 11:39:52'),
(339, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-06-07 10:06:47', NULL, NULL, NULL, '2022-06-07 11:45:47'),
(340, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-06-07 10:06:33', NULL, NULL, NULL, '2022-06-07 11:58:33'),
(341, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-06-07 11:06:36', NULL, NULL, NULL, '2022-06-07 12:53:36'),
(342, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-06-07 11:06:10', NULL, NULL, NULL, '2022-06-07 12:58:10'),
(343, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-06-07 12:06:06', NULL, NULL, NULL, '2022-06-07 13:02:06'),
(344, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-06-07 12:06:53', NULL, NULL, NULL, '2022-06-07 13:17:53'),
(345, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-06-07 12:06:02', NULL, NULL, NULL, '2022-06-07 13:25:02'),
(346, 'login', '{\"hostname\" : \"Jeff\" , \"os\" : \"Windows NT JEFF 10.0 build 19044 (Windows 10) AMD64\" }', '2', '', '', NULL, NULL, '2022-06-07 12:06:54', NULL, NULL, NULL, '2022-06-07 13:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `tax_types`
--

CREATE TABLE `tax_types` (
  `tax_type_id` int(11) NOT NULL,
  `tax_type_name` varchar(100) NOT NULL,
  `tax_rate` decimal(5,2) DEFAULT NULL,
  `narrative` varchar(256) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax_types`
--

INSERT INTO `tax_types` (`tax_type_id`, `tax_type_name`, `tax_rate`, `narrative`, `active`, `date_modified`, `time_stamp`) VALUES
(3, 'VAT', '16.00', 'Value Added Tax', 1, '2022-04-11 07:51:47', '2019-11-20 10:06:48'),
(4, 'Excempted', '0.00', '', 1, '2022-04-11 07:51:47', '2019-11-24 13:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `fiscal_year` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `active` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `term_id`, `fiscal_year`, `start_date`, `end_date`, `active`, `time_stamp`) VALUES
(1, 3, 2021, '2021-05-03', '2021-05-03', 1, '2021-06-03 13:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `tlj`
--

CREATE TABLE `tlj` (
  `id` int(11) NOT NULL,
  `column_one` text NOT NULL,
  `column_two` text NOT NULL,
  `column_three` text NOT NULL,
  `column_four` text NOT NULL,
  `column_five` text NOT NULL,
  `column_six` date DEFAULT NULL,
  `column_seven` int(11) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tlj`
--

INSERT INTO `tlj` (`id`, `column_one`, `column_two`, `column_three`, `column_four`, `column_five`, `column_six`, `column_seven`, `date_modified`, `time_stamp`) VALUES
(1, '$2y$10$jXDvHssFas6zODTl4julF.IDyZ1hEQ7NRBwutBsC953g6J8GUzCgu', '$2y$10$D2P2TDnXCXHw0mlRi2nIiu7bdLcGqNKApDanKUSsXr78PFblA78US', '$2y$10$B2S0uSv8xtROKVWPIFLM8uYrcrCXrXHKSbisVYwuAKFjUdJ8caIGS', '$2y$10$ejn8rcZWai9chFr5puFQmu5c.H3bKE6ICyooJtesvAqsPLvaJAXb2', '', '2048-04-17', 10000, '2022-04-12 10:42:51', '2020-11-18 11:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_types`
--

CREATE TABLE `transaction_types` (
  `transaction_type_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `transaction_type_name` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_types`
--

INSERT INTO `transaction_types` (`transaction_type_id`, `org_id`, `transaction_type_name`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 1, 'Cash Sale', 1, NULL, '2022-04-11 07:51:48', '2020-04-11 21:50:32'),
(2, 1, 'Cash Purchase', 1, NULL, '2022-04-11 07:51:48', '2020-04-11 21:50:32'),
(3, 1, 'Credit  Sale', 1, NULL, '2022-04-11 07:51:48', '2020-04-11 21:50:32'),
(4, 1, 'Credit Purchase', 1, NULL, '2022-04-11 07:51:48', '2020-04-11 21:50:32'),
(5, 1, 'Room Booking', 1, NULL, '2022-04-11 07:51:48', '2020-08-26 12:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `narrative` varchar(256) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_name`, `active`, `narrative`, `date_modified`, `time_stamp`) VALUES
(1, 'Boxes', 1, 'Boxes in stock', '2022-04-11 07:51:48', '2019-11-20 11:28:25'),
(2, 'Kgs', 1, '', '2022-04-11 07:51:48', '2019-11-20 11:28:38'),
(4, 'Bottles', 1, '', '2022-04-11 07:51:48', '2020-09-24 06:47:30'),
(5, 'Pcs', 1, '', '2022-04-11 07:51:48', '2020-09-24 06:47:35'),
(6, 'Tots', 1, '', '2022-04-11 07:51:48', '2020-10-31 21:25:35'),
(7, 'Galans', 1, '', '2022-04-11 07:51:48', '2020-11-02 12:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `voucher_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT 1,
  `account_id` int(11) NOT NULL,
  `account_type_id` int(11) NOT NULL,
  `subaccount_type_id` int(11) DEFAULT NULL,
  `fiscal_year_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL DEFAULT 1,
  `student_id` int(11) DEFAULT NULL,
  `customer_supplier_id` int(11) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `table_name` varchar(50) DEFAULT NULL,
  `account_code` varchar(50) NOT NULL,
  `voucher_code` varchar(50) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `voucher_amount` double(18,2) DEFAULT NULL,
  `voucher_balance` decimal(10,2) DEFAULT NULL,
  `voucher_type` enum('cr','dr') DEFAULT NULL,
  `opening_closing_balance` enum('Opening','Closing') DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `is_duplicate` tinyint(1) NOT NULL DEFAULT 0,
  `is_ignore` tinyint(1) NOT NULL DEFAULT 0,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `voucher_category` varchar(50) DEFAULT NULL,
  `narrative` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `approved_by` varchar(50) DEFAULT NULL,
  `time_stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`voucher_id`, `org_id`, `account_id`, `account_type_id`, `subaccount_type_id`, `fiscal_year_id`, `term_id`, `student_id`, `customer_supplier_id`, `table_id`, `table_name`, `account_code`, `voucher_code`, `reference`, `voucher_amount`, `voucher_balance`, `voucher_type`, `opening_closing_balance`, `transaction_date`, `is_duplicate`, `is_ignore`, `is_paid`, `voucher_category`, `narrative`, `created_by`, `approved_by`, `time_stamp`) VALUES
(1, 1, 1973, 1, 28, 6, 1, NULL, 73, 13, 'orders', '500001', 'J05T12FOVA', '', 2070.00, NULL, 'cr', NULL, '2022-04-05', 0, 0, 0, NULL, 'New Sale: J05T12FOVA', 38, '', '2022-04-05 12:29:42'),
(2, 1, 1971, 4, 27, 6, 1, NULL, 73, 13, 'orders', '700001', 'J05T12FOVA', '', 2070.00, NULL, 'cr', NULL, '2022-04-05', 0, 0, 0, NULL, 'New Sale: J05T12FOVA', 38, '', '2022-04-05 12:29:42'),
(3, 1, 1974, 1, 28, 6, 1, NULL, 73, 13, 'orders', '500002', 'J05T12FOVA', '', 2070.00, NULL, 'dr', NULL, '2022-04-05', 0, 0, 0, NULL, 'New Sale: J05T12FOVA', 38, '', '2022-04-05 12:29:42'),
(4, 1, 1978, 5, 30, 6, 1, NULL, 73, 13, 'orders', '600003', 'J05T12FOVA', '', 0.00, NULL, 'cr', NULL, '2022-04-05', 0, 0, 0, NULL, 'New Sale: J05T12FOVA', 38, '', '2022-04-05 12:29:42'),
(5, 1, 1973, 1, 28, 6, 1, NULL, 73, 14, 'orders', '500001', 'J05T13OS15', '', 98600.00, NULL, 'cr', NULL, '2022-04-05', 0, 0, 0, NULL, 'New Sale: J05T13OS15', 38, '', '2022-04-05 12:46:48'),
(6, 1, 1971, 4, 27, 6, 1, NULL, 73, 14, 'orders', '700001', 'J05T13OS15', '', 98600.00, NULL, 'cr', NULL, '2022-04-05', 0, 0, 0, NULL, 'New Sale: J05T13OS15', 38, '', '2022-04-05 12:46:48'),
(7, 1, 1974, 1, 28, 6, 1, NULL, 73, 14, 'orders', '500002', 'J05T13OS15', '', 98600.00, NULL, 'dr', NULL, '2022-04-05', 0, 0, 0, NULL, 'New Sale: J05T13OS15', 38, '', '2022-04-05 12:46:48'),
(8, 1, 1978, 5, 30, 6, 1, NULL, 73, 14, 'orders', '600003', 'J05T13OS15', '', 13600.00, NULL, 'cr', NULL, '2022-04-05', 0, 0, 0, NULL, 'New Sale: J05T13OS15', 38, '', '2022-04-05 12:46:48'),
(9, 1, 1973, 1, 28, 6, 1, NULL, 48, 15, 'orders', '500001', 'J13T14GH5N', 'jjs', 200000.00, NULL, 'dr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Purchase: J13T14GH5N', 2, '', '2022-04-13 06:41:39'),
(10, 1, 1972, 3, 6, 6, 1, NULL, 48, 15, 'orders', '800001', 'J13T14GH5N', 'jjs', 200000.00, NULL, 'dr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Purchase: J13T14GH5N', 2, '', '2022-04-13 06:41:39'),
(11, 1, 1976, 5, 30, 6, 1, NULL, 48, 15, 'orders', '600001', 'J13T14GH5N', 'jjs', 200000.00, NULL, 'cr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Purchase: J13T14GH5N', 2, '', '2022-04-13 06:41:39'),
(12, 1, 1972, 3, 6, 6, 1, NULL, 48, 12, 'order_payments', '800001', 'J13T14GH5N', 'jjs', 200000.00, NULL, 'cr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Purchase Payment: J13T14GH5N', 2, '', '2022-04-13 06:41:39'),
(13, 1, 1976, 5, 30, 6, 1, NULL, 48, 12, 'order_payments', '600001', 'J13T14GH5N', 'jjs', 200000.00, NULL, 'dr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Purchase Payment: J13T14GH5N', 2, '', '2022-04-13 06:41:39'),
(14, 1, 1973, 1, 28, 6, 1, NULL, 69, 16, 'orders', '500001', 'J13T15OB1Z', 'buvh', 200000.00, NULL, 'dr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Purchase: J13T15OB1Z', 2, '', '2022-04-13 06:51:09'),
(15, 1, 1972, 3, 6, 6, 1, NULL, 69, 16, 'orders', '800001', 'J13T15OB1Z', 'buvh', 200000.00, NULL, 'dr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Purchase: J13T15OB1Z', 2, '', '2022-04-13 06:51:09'),
(16, 1, 1976, 5, 30, 6, 1, NULL, 69, 16, 'orders', '600001', 'J13T15OB1Z', 'buvh', 200000.00, NULL, 'cr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Purchase: J13T15OB1Z', 2, '', '2022-04-13 06:51:09'),
(17, 1, 1972, 3, 6, 6, 1, NULL, 69, 13, 'order_payments', '800001', 'J13T15OB1Z', 'buvh', 200000.00, NULL, 'cr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Purchase Payment: J13T15OB1Z', 2, '', '2022-04-13 06:51:09'),
(18, 1, 1976, 5, 30, 6, 1, NULL, 69, 13, 'order_payments', '600001', 'J13T15OB1Z', 'buvh', 200000.00, NULL, 'dr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Purchase Payment: J13T15OB1Z', 2, '', '2022-04-13 06:51:09'),
(19, 1, 1973, 1, 28, 6, 1, NULL, 48, 17, 'orders', '500001', 'J13T16FJV5', 'fghj', 60000.00, NULL, 'dr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Purchase: J13T16FJV5', 2, '', '2022-04-13 06:54:31'),
(20, 1, 1972, 3, 6, 6, 1, NULL, 48, 17, 'orders', '800001', 'J13T16FJV5', 'fghj', 60000.00, NULL, 'dr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Purchase: J13T16FJV5', 2, '', '2022-04-13 06:54:31'),
(21, 1, 1976, 5, 30, 6, 1, NULL, 48, 17, 'orders', '600001', 'J13T16FJV5', 'fghj', 60000.00, NULL, 'cr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Purchase: J13T16FJV5', 2, '', '2022-04-13 06:54:31'),
(22, 1, 1972, 3, 6, 6, 1, NULL, 48, 14, 'order_payments', '800001', 'J13T16FJV5', 'fghj', 60000.00, NULL, 'cr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Purchase Payment: J13T16FJV5', 2, '', '2022-04-13 06:54:31'),
(23, 1, 1976, 5, 30, 6, 1, NULL, 48, 14, 'order_payments', '600001', 'J13T16FJV5', 'fghj', 60000.00, NULL, 'dr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Purchase Payment: J13T16FJV5', 2, '', '2022-04-13 06:54:31'),
(24, 1, 1973, 1, 28, 6, 1, NULL, 74, 18, 'orders', '500001', 'J13T17PKJ8', '', 3200.00, NULL, 'cr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Sale: J13T17PKJ8', 2, '', '2022-04-13 07:10:24'),
(25, 1, 1971, 4, 27, 6, 1, NULL, 74, 18, 'orders', '700001', 'J13T17PKJ8', '', 3200.00, NULL, 'cr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Sale: J13T17PKJ8', 2, '', '2022-04-13 07:10:24'),
(26, 1, 1974, 1, 28, 6, 1, NULL, 74, 18, 'orders', '500002', 'J13T17PKJ8', '', 3200.00, NULL, 'dr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Sale: J13T17PKJ8', 2, '', '2022-04-13 07:10:24'),
(27, 1, 1973, 1, 28, 6, 1, NULL, 74, 19, 'orders', '500001', 'J13T18UXEB', '', 150.00, NULL, 'cr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Sale: J13T18UXEB', 2, '', '2022-04-13 07:15:42'),
(28, 1, 1971, 4, 27, 6, 1, NULL, 74, 19, 'orders', '700001', 'J13T18UXEB', '', 150.00, NULL, 'cr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Sale: J13T18UXEB', 2, '', '2022-04-13 07:15:42'),
(29, 1, 1974, 1, 28, 6, 1, NULL, 74, 19, 'orders', '500002', 'J13T18UXEB', '', 150.00, NULL, 'dr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Sale: J13T18UXEB', 2, '', '2022-04-13 07:15:42'),
(30, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204131229560.9634', NULL, 626250.00, NULL, 'cr', '', '2022-04-13', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-13 09:29:57'),
(31, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204131229560.9634', NULL, 626250.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-13 09:29:57'),
(32, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204131229560.9634', NULL, 8850.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-13 09:29:57'),
(33, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204131229560.9634', NULL, 2200.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-13 09:29:57'),
(34, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204131239130.159', NULL, 626250.00, NULL, 'cr', '', '2022-04-13', 0, 0, 0, NULL, 'Salary for the month 3/2021', 2, '', '2022-04-13 09:39:13'),
(35, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204131239130.159', NULL, 626250.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'Salary for the month 3/2021', 2, '', '2022-04-13 09:39:13'),
(36, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204131239130.159', NULL, 8850.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'NHIF for the month 3/2021', 2, '', '2022-04-13 09:39:13'),
(37, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204131239130.159', NULL, 2200.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'NSSF for the month 3/2021', 2, '', '2022-04-13 09:39:13'),
(38, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204131242490.5233', NULL, 626250.00, NULL, 'cr', '', '2022-04-13', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-13 09:42:49'),
(39, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204131242490.5233', NULL, 626250.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-13 09:42:49'),
(40, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204131242490.5233', NULL, 8850.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-13 09:42:49'),
(41, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204131242490.5233', NULL, 2200.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-13 09:42:49'),
(42, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204131242540.307', NULL, 626250.00, NULL, 'cr', '', '2022-04-13', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-13 09:42:54'),
(43, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204131242540.307', NULL, 626250.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-13 09:42:54'),
(44, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204131242540.307', NULL, 8850.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-13 09:42:54'),
(45, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204131242540.307', NULL, 2200.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-13 09:42:54'),
(46, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204131244330.8519', NULL, 626250.00, NULL, 'cr', '', '2022-04-13', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-13 09:44:33'),
(47, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204131244330.8519', NULL, 626250.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-13 09:44:33'),
(48, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204131244330.8519', NULL, 8850.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-13 09:44:33'),
(49, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204131244330.8519', NULL, 2200.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-13 09:44:33'),
(50, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204131244430.8296', NULL, 626250.00, NULL, 'cr', '', '2022-04-13', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-13 09:44:44'),
(51, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204131244430.8296', NULL, 626250.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-13 09:44:44'),
(52, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204131244430.8296', NULL, 8850.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-13 09:44:44'),
(53, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204131244430.8296', NULL, 2200.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-13 09:44:44'),
(54, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204131246170.5603', NULL, 626250.00, NULL, 'cr', '', '2022-04-13', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-13 09:46:17'),
(55, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204131246170.5603', NULL, 626250.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-13 09:46:17'),
(56, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204131246250.9294', NULL, 80000.00, NULL, 'cr', '', '2022-04-13', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-13 09:46:26'),
(57, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204131246250.9294', NULL, 80000.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-13 09:46:26'),
(58, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204131250180.2501', NULL, 80000.00, NULL, 'cr', '', '2022-04-13', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-13 09:50:18'),
(59, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204131250180.2501', NULL, 80000.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-13 09:50:18'),
(60, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204131250180.2501', NULL, 0.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-13 09:50:18'),
(61, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204131250180.2501', NULL, 0.00, NULL, 'dr', '', '2022-04-13', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-13 09:50:18'),
(62, 1, 1973, 1, 28, 6, 1, NULL, 76, 26, 'orders', '500001', 'J13T25S301', '', 80.00, NULL, 'cr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Sale: J13T25S301', 2, '', '2022-04-13 15:00:56'),
(63, 1, 1971, 4, 27, 6, 1, NULL, 76, 26, 'orders', '700001', 'J13T25S301', '', 80.00, NULL, 'cr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Sale: J13T25S301', 2, '', '2022-04-13 15:00:56'),
(64, 1, 1974, 1, 28, 6, 1, NULL, 76, 26, 'orders', '500002', 'J13T25S301', '', 80.00, NULL, 'dr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Sale: J13T25S301', 2, '', '2022-04-13 15:00:56'),
(65, 1, 1971, 4, 27, 6, 1, NULL, 76, 26, 'orders', '700001', 'J13T25S301', '', 80.00, NULL, 'dr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Sale: J13T25S301', 2, '', '2022-04-13 15:00:56'),
(66, 1, 1974, 1, 28, 6, 1, NULL, 76, 26, 'orders', '500002', 'J13T25S301', '', 80.00, NULL, 'cr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Sale: J13T25S301', 2, '', '2022-04-13 15:00:56'),
(67, 1, 1973, 1, 28, 6, 1, NULL, 76, 27, 'orders', '500001', 'J13T26WJ63', '', 80.00, NULL, 'cr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Sale: J13T26WJ63', 2, '', '2022-04-13 15:05:03'),
(68, 1, 1971, 4, 27, 6, 1, NULL, 76, 27, 'orders', '700001', 'J13T26WJ63', '', 80.00, NULL, 'cr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Sale: J13T26WJ63', 2, '', '2022-04-13 15:05:03'),
(69, 1, 1974, 1, 28, 6, 1, NULL, 76, 27, 'orders', '500002', 'J13T26WJ63', '', 80.00, NULL, 'dr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Sale: J13T26WJ63', 2, '', '2022-04-13 15:05:03'),
(70, 1, 1971, 4, 27, 6, 1, NULL, 76, 27, 'orders', '700001', 'J13T26WJ63', '', 80.00, NULL, 'dr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Sale: J13T26WJ63', 2, '', '2022-04-13 15:05:03'),
(71, 1, 1974, 1, 28, 6, 1, NULL, 76, 27, 'orders', '500002', 'J13T26WJ63', '', 80.00, NULL, 'cr', NULL, '2022-04-13', 0, 0, 0, NULL, 'New Sale: J13T26WJ63', 2, '', '2022-04-13 15:05:03'),
(72, 1, 1973, 1, 28, 6, 1, NULL, 69, 28, 'orders', '500001', 'J14T273ONL', '1dnd', 100000.00, NULL, 'dr', NULL, '2022-04-14', 0, 0, 0, NULL, 'New Purchase: J14T273ONL', 2, '', '2022-04-14 08:19:16'),
(73, 1, 1972, 3, 6, 6, 1, NULL, 69, 28, 'orders', '800001', 'J14T273ONL', '1dnd', 100000.00, NULL, 'dr', NULL, '2022-04-14', 0, 0, 0, NULL, 'New Purchase: J14T273ONL', 2, '', '2022-04-14 08:19:16'),
(74, 1, 1976, 5, 30, 6, 1, NULL, 69, 28, 'orders', '600001', 'J14T273ONL', '1dnd', 100000.00, NULL, 'cr', NULL, '2022-04-14', 0, 0, 0, NULL, 'New Purchase: J14T273ONL', 2, '', '2022-04-14 08:19:16'),
(75, 1, 3, 1, 28, 6, 1, NULL, 69, 17, 'order_payments', '522123', 'J14T273ONL', '1dnd', 100000.00, NULL, 'cr', NULL, '2022-04-14', 0, 0, 0, NULL, 'New Purchase Payment: J14T273ONL', 2, '', '2022-04-14 08:19:17'),
(76, 1, 1972, 3, 6, 6, 1, NULL, 69, 17, 'order_payments', '800001', 'J14T273ONL', '1dnd', 100000.00, NULL, 'cr', NULL, '2022-04-14', 0, 0, 0, NULL, 'New Purchase Payment: J14T273ONL', 2, '', '2022-04-14 08:19:17'),
(77, 1, 1976, 5, 30, 6, 1, NULL, 69, 17, 'order_payments', '600001', 'J14T273ONL', '1dnd', 100000.00, NULL, 'dr', NULL, '2022-04-14', 0, 0, 0, NULL, 'New Purchase Payment: J14T273ONL', 2, '', '2022-04-14 08:19:17'),
(78, 1, 1973, 1, 28, 6, 1, NULL, 77, 29, 'orders', '500001', 'J14T286WEJ', '', 110.00, NULL, 'cr', NULL, '2022-04-14', 0, 0, 0, NULL, 'New Sale: J14T286WEJ', 2, '', '2022-04-14 08:25:47'),
(79, 1, 1971, 4, 27, 6, 1, NULL, 77, 29, 'orders', '700001', 'J14T286WEJ', '', 110.00, NULL, 'cr', NULL, '2022-04-14', 0, 0, 0, NULL, 'New Sale: J14T286WEJ', 2, '', '2022-04-14 08:25:47'),
(80, 1, 1974, 1, 28, 6, 1, NULL, 77, 29, 'orders', '500002', 'J14T286WEJ', '', 110.00, NULL, 'dr', NULL, '2022-04-14', 0, 0, 0, NULL, 'New Sale: J14T286WEJ', 2, '', '2022-04-14 08:25:47'),
(81, 1, 1971, 4, 27, 6, 1, NULL, 77, 29, 'orders', '700001', 'J14T286WEJ', '', 110.00, NULL, 'dr', NULL, '2022-04-14', 0, 0, 0, NULL, 'New Sale: J14T286WEJ', 2, '', '2022-04-14 08:25:47'),
(82, 1, 1974, 1, 28, 6, 1, NULL, 77, 29, 'orders', '500002', 'J14T286WEJ', '', 110.00, NULL, 'cr', NULL, '2022-04-14', 0, 0, 0, NULL, 'New Sale: J14T286WEJ', 2, '', '2022-04-14 08:25:47'),
(83, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204191222040.3455', NULL, 626250.00, NULL, 'cr', '', '2022-04-19', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-19 09:22:04'),
(84, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204191222040.3455', NULL, 626250.00, NULL, 'dr', '', '2022-04-19', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-19 09:22:04'),
(85, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204191222040.3455', NULL, 8850.00, NULL, 'dr', '', '2022-04-19', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-19 09:22:04'),
(86, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204191222040.3455', NULL, 2200.00, NULL, 'dr', '', '2022-04-19', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-19 09:22:04'),
(87, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204201455280.7935', NULL, 80000.00, NULL, 'cr', '', '2022-04-20', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-20 11:55:29'),
(88, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204201455280.7935', NULL, 80000.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-20 11:55:29'),
(89, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204201455280.7935', NULL, 0.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-20 11:55:29'),
(90, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204201455280.7935', NULL, 0.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-20 11:55:29'),
(91, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204201457250.166', NULL, 80000.00, NULL, 'cr', '', '2022-04-20', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-20 11:57:25'),
(92, 0, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204201457250.166', NULL, 80000.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-20 11:57:25'),
(93, 0, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204201457250.166', NULL, 0.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-20 11:57:25'),
(94, 0, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204201457250.166', NULL, 0.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-20 11:57:25'),
(95, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204201459020.8263', NULL, 80000.00, NULL, 'cr', '', '2022-04-20', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-20 11:59:02'),
(96, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204201459020.8263', NULL, 80000.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-20 11:59:02'),
(97, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204201459020.8263', NULL, 0.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-20 11:59:02'),
(98, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204201459020.8263', NULL, 0.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-20 11:59:02'),
(99, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204201720140.5694', NULL, 80000.00, NULL, 'cr', '', '2022-04-20', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-20 14:20:14'),
(100, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204201720140.5694', NULL, 80000.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-20 14:20:14'),
(101, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204201720290.0371', NULL, 58600.00, NULL, 'cr', '', '2022-04-20', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-20 14:20:29'),
(102, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204201720290.0371', NULL, 58600.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-20 14:20:29'),
(103, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204201723330.2566', NULL, 626250.00, NULL, 'cr', '', '2022-04-20', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-20 14:23:33'),
(104, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204201723330.2566', NULL, 626250.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-20 14:23:33'),
(105, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204201723330.2566', NULL, 8850.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-20 14:23:33'),
(106, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204201723330.2566', NULL, 2200.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-20 14:23:33'),
(107, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204201724240.4892', NULL, 626250.00, NULL, 'cr', '', '2022-04-20', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-20 14:24:24'),
(108, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204201724240.4892', NULL, 626250.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-20 14:24:24'),
(109, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204201724240.4892', NULL, 8850.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-20 14:24:24'),
(110, 1, 0, 0, NULL, 6, 3, NULL, NULL, NULL, NULL, '', '202204201724240.4892', NULL, 2200.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-20 14:24:24'),
(111, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204201730190.7563', NULL, 626250.00, NULL, 'cr', '', '2022-04-20', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-20 14:30:19'),
(112, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204201730190.7563', NULL, 626250.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-20 14:30:19'),
(113, 1, 1980, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800003', '202204201730190.7563', NULL, 8850.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-20 14:30:19'),
(114, 1, 1981, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800004', '202204201730190.7563', NULL, 2200.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-20 14:30:19'),
(115, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204201730260.5552', NULL, 626250.00, NULL, 'cr', '', '2022-04-20', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-20 14:30:26'),
(116, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204201730260.5552', NULL, 626250.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-20 14:30:26'),
(117, 1, 1980, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800003', '202204201730260.5552', NULL, 8850.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-20 14:30:26'),
(118, 1, 1981, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800004', '202204201730260.5552', NULL, 2200.00, NULL, 'dr', '', '2022-04-20', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-20 14:30:26'),
(119, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204210833220.7731', NULL, 80000.00, NULL, 'cr', '', '2022-04-21', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-21 05:33:22'),
(120, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204210833220.7731', NULL, 80000.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-21 05:33:22'),
(121, 1, 0, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '', '202204210833220.7731', NULL, 0.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-21 05:33:22'),
(122, 1, 1981, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800004', '202204210833220.7731', NULL, 0.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-21 05:33:22'),
(123, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204210833420.1318', NULL, 626250.00, NULL, 'cr', '', '2022-04-21', 0, 0, 0, NULL, 'Salary for the month 4/2020', 2, '', '2022-04-21 05:33:42'),
(124, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204210833420.1318', NULL, 626250.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'Salary for the month 4/2020', 2, '', '2022-04-21 05:33:42'),
(125, 1, 0, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '', '202204210833420.1318', NULL, 8850.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'NHIF for the month 4/2020', 2, '', '2022-04-21 05:33:42'),
(126, 1, 1981, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800004', '202204210833420.1318', NULL, 2200.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'NSSF for the month 4/2020', 2, '', '2022-04-21 05:33:42'),
(127, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204210833500.1037', NULL, 80000.00, NULL, 'cr', '', '2022-04-21', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-21 05:33:50'),
(128, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204210833500.1037', NULL, 80000.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-21 05:33:50'),
(129, 1, 0, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '', '202204210833500.1037', NULL, 0.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-21 05:33:50'),
(130, 1, 1981, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800004', '202204210833500.1037', NULL, 0.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-21 05:33:50'),
(131, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204210839440.4384', NULL, 626250.00, NULL, 'cr', '', '2022-04-21', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-21 05:39:44'),
(132, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204210839440.4384', NULL, 626250.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-21 05:39:44'),
(133, 1, 0, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '', '202204210839440.4384', NULL, 8850.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-21 05:39:44'),
(134, 1, 1981, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800004', '202204210839440.4384', NULL, 2200.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-21 05:39:44'),
(135, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204210839490.3384', NULL, 80000.00, NULL, 'cr', '', '2022-04-21', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-21 05:39:49'),
(136, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204210839490.3384', NULL, 80000.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-21 05:39:49'),
(137, 1, 0, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '', '202204210839490.3384', NULL, 0.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-21 05:39:49'),
(138, 1, 1981, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800004', '202204210839490.3384', NULL, 0.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-21 05:39:49'),
(139, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204210840460.2642', NULL, 626250.00, NULL, 'cr', '', '2022-04-21', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-21 05:40:46'),
(140, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204210840460.2642', NULL, 626250.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-21 05:40:46'),
(141, 1, 1980, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800003', '202204210840460.2642', NULL, 8850.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-21 05:40:46'),
(142, 1, 1981, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800004', '202204210840460.2642', NULL, 2200.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-21 05:40:46'),
(143, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204210850170.8265', NULL, 626250.00, NULL, 'cr', '', '2022-04-21', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-21 05:50:18'),
(144, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204210850170.8265', NULL, 626250.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-21 05:50:18'),
(145, 1, 1980, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800003', '202204210850170.8265', NULL, 8850.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-21 05:50:18'),
(146, 1, 1981, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800004', '202204210850170.8265', NULL, 2200.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-21 05:50:18'),
(147, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204210851030.7724', NULL, 626250.00, NULL, 'cr', '', '2022-04-21', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-21 05:51:03'),
(148, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204210851030.7724', NULL, 626250.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-21 05:51:03'),
(149, 1, 1980, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800003', '202204210851030.7724', NULL, 8850.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-21 05:51:03'),
(150, 1, 1981, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800004', '202204210851030.7724', NULL, 2200.00, NULL, 'dr', '', '2022-04-21', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-21 05:51:03'),
(151, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202204221017560.1738', NULL, 626250.00, NULL, 'cr', '', '2022-04-22', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-22 07:17:56'),
(152, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202204221017560.1738', NULL, 626250.00, NULL, 'dr', '', '2022-04-22', 0, 0, 0, NULL, 'Salary for the month 4/2021', 2, '', '2022-04-22 07:17:56'),
(153, 1, 1980, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800003', '202204221017560.1738', NULL, 8850.00, NULL, 'dr', '', '2022-04-22', 0, 0, 0, NULL, 'NHIF for the month 4/2021', 2, '', '2022-04-22 07:17:56'),
(154, 1, 1981, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800004', '202204221017560.1738', NULL, 2200.00, NULL, 'dr', '', '2022-04-22', 0, 0, 0, NULL, 'NSSF for the month 4/2021', 2, '', '2022-04-22 07:17:56'),
(155, 1, 1973, 1, 28, 6, 1, NULL, 78, 30, 'orders', '500001', 'J26T29RIT5', '', 220.00, NULL, 'cr', NULL, '2022-04-26', 0, 0, 0, NULL, 'New Sale: J26T29RIT5', 2, '', '2022-04-26 14:30:47'),
(156, 1, 1971, 4, 27, 6, 1, NULL, 78, 30, 'orders', '700001', 'J26T29RIT5', '', 220.00, NULL, 'cr', NULL, '2022-04-26', 0, 0, 0, NULL, 'New Sale: J26T29RIT5', 2, '', '2022-04-26 14:30:47'),
(157, 1, 1974, 1, 28, 6, 1, NULL, 78, 30, 'orders', '500002', 'J26T29RIT5', '', 220.00, NULL, 'dr', NULL, '2022-04-26', 0, 0, 0, NULL, 'New Sale: J26T29RIT5', 2, '', '2022-04-26 14:30:47'),
(158, 1, 1971, 4, 27, 6, 1, NULL, 78, 30, 'orders', '700001', 'J26T29RIT5', '', 220.00, NULL, 'dr', NULL, '2022-04-26', 0, 0, 0, NULL, 'New Sale: J26T29RIT5', 2, '', '2022-04-26 14:30:47'),
(159, 1, 1974, 1, 28, 6, 1, NULL, 78, 30, 'orders', '500002', 'J26T29RIT5', '', 220.00, NULL, 'cr', NULL, '2022-04-26', 0, 0, 0, NULL, 'New Sale: J26T29RIT5', 2, '', '2022-04-26 14:30:47'),
(160, 1, 1973, 1, 28, 6, 1, NULL, 73, 31, 'orders', '500001', 'J26T307CIU', '', 220.00, NULL, 'cr', NULL, '2022-04-26', 0, 0, 0, NULL, 'New Sale: J26T307CIU', 2, '', '2022-04-26 14:53:51'),
(161, 1, 1971, 4, 27, 6, 1, NULL, 73, 31, 'orders', '700001', 'J26T307CIU', '', 220.00, NULL, 'cr', NULL, '2022-04-26', 0, 0, 0, NULL, 'New Sale: J26T307CIU', 2, '', '2022-04-26 14:53:51'),
(162, 1, 1974, 1, 28, 6, 1, NULL, 73, 31, 'orders', '500002', 'J26T307CIU', '', 220.00, NULL, 'dr', NULL, '2022-04-26', 0, 0, 0, NULL, 'New Sale: J26T307CIU', 2, '', '2022-04-26 14:53:51'),
(163, 1, 2, 1, 2, 6, 1, NULL, 73, 20, 'order_payments', '87328', 'J26T31H0857YBVUO', 'dfgh', 220.00, NULL, 'dr', NULL, '2022-04-26', 0, 0, 0, NULL, 'New Sale Payment: J26T31H0857YBVUO', 2, '', '2022-04-26 14:54:53'),
(164, 1, 1971, 4, 27, 6, 1, NULL, 73, 20, 'order_payments', '700001', 'J26T31H0857YBVUO', 'dfgh', 220.00, NULL, 'dr', NULL, '2022-04-26', 0, 0, 0, NULL, 'New Sale Payment: J26T31H0857YBVUO', 2, '', '2022-04-26 14:54:53'),
(165, 1, 1974, 1, 28, 6, 1, NULL, 73, 20, 'order_payments', '500002', 'J26T31H0857YBVUO', 'dfgh', 220.00, NULL, 'cr', NULL, '2022-04-26', 0, 0, 0, NULL, 'New Sale Payment: J26T31H0857YBVUO', 2, '', '2022-04-26 14:54:53'),
(166, 1, 1973, 1, 28, 6, 1, NULL, 48, 32, 'orders', '500001', 'J27T31S15G', 'sdfghj', 20000.00, NULL, 'dr', NULL, '2022-04-27', 0, 0, 0, NULL, 'New Purchase: J27T31S15G', 2, '', '2022-04-27 08:38:31'),
(167, 1, 1972, 3, 6, 6, 1, NULL, 48, 32, 'orders', '800001', 'J27T31S15G', 'sdfghj', 20000.00, NULL, 'dr', NULL, '2022-04-27', 0, 0, 0, NULL, 'New Purchase: J27T31S15G', 2, '', '2022-04-27 08:38:31'),
(168, 1, 1976, 5, 30, 6, 1, NULL, 48, 32, 'orders', '600001', 'J27T31S15G', 'sdfghj', 20000.00, NULL, 'cr', NULL, '2022-04-27', 0, 0, 0, NULL, 'New Purchase: J27T31S15G', 2, '', '2022-04-27 08:38:31'),
(169, 1, 2, 1, 28, 6, 1, NULL, 48, 21, 'order_payments', '87328', 'J27T31S15G', 'sdfghj', 20000.00, NULL, 'cr', NULL, '2022-04-27', 0, 0, 0, NULL, 'New Purchase Payment: J27T31S15G', 2, '', '2022-04-27 08:38:31'),
(170, 1, 1972, 3, 6, 6, 1, NULL, 48, 21, 'order_payments', '800001', 'J27T31S15G', 'sdfghj', 20000.00, NULL, 'cr', NULL, '2022-04-27', 0, 0, 0, NULL, 'New Purchase Payment: J27T31S15G', 2, '', '2022-04-27 08:38:31'),
(171, 1, 1976, 5, 30, 6, 1, NULL, 48, 21, 'order_payments', '600001', 'J27T31S15G', 'sdfghj', 20000.00, NULL, 'dr', NULL, '2022-04-27', 0, 0, 0, NULL, 'New Purchase Payment: J27T31S15G', 2, '', '2022-04-27 08:38:31'),
(172, 1, 1973, 1, 28, 6, 1, NULL, 73, 33, 'orders', '500001', 'J04T32K93E', '', 440.00, NULL, 'cr', NULL, '2022-05-04', 0, 0, 0, NULL, 'New Sale: J04T32K93E', 2, '', '2022-05-04 07:56:36'),
(173, 1, 1971, 4, 27, 6, 1, NULL, 73, 33, 'orders', '700001', 'J04T32K93E', '', 440.00, NULL, 'cr', NULL, '2022-05-04', 0, 0, 0, NULL, 'New Sale: J04T32K93E', 2, '', '2022-05-04 07:56:36'),
(174, 1, 1974, 1, 28, 6, 1, NULL, 73, 33, 'orders', '500002', 'J04T32K93E', '', 440.00, NULL, 'dr', NULL, '2022-05-04', 0, 0, 0, NULL, 'New Sale: J04T32K93E', 2, '', '2022-05-04 07:56:36'),
(175, 1, 1971, 4, 27, 6, 1, NULL, 73, 33, 'orders', '700001', 'J04T32K93E', '', 440.00, NULL, 'dr', NULL, '2022-05-04', 0, 0, 0, NULL, 'New Sale: J04T32K93E', 2, '', '2022-05-04 07:56:36'),
(176, 1, 1974, 1, 28, 6, 1, NULL, 73, 33, 'orders', '500002', 'J04T32K93E', '', 440.00, NULL, 'cr', NULL, '2022-05-04', 0, 0, 0, NULL, 'New Sale: J04T32K93E', 2, '', '2022-05-04 07:56:36'),
(177, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202205060956230.4251', NULL, 626250.00, NULL, 'cr', '', '2022-05-06', 0, 0, 0, NULL, 'Salary for the month 5/2021', 2, '', '2022-05-06 06:56:23'),
(178, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202205060956230.4251', NULL, 626250.00, NULL, 'dr', '', '2022-05-06', 0, 0, 0, NULL, 'Salary for the month 5/2021', 2, '', '2022-05-06 06:56:23'),
(179, 1, 1980, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800003', '202205060956230.4251', NULL, 8850.00, NULL, 'dr', '', '2022-05-06', 0, 0, 0, NULL, 'NHIF for the month 5/2021', 2, '', '2022-05-06 06:56:23'),
(180, 1, 1981, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800004', '202205060956230.4251', NULL, 2200.00, NULL, 'dr', '', '2022-05-06', 0, 0, 0, NULL, 'NSSF for the month 5/2021', 2, '', '2022-05-06 06:56:23'),
(181, 1, 1973, 1, 28, 6, 1, NULL, 73, 34, 'orders', '500001', 'J07T33Z1V8', '', 220.00, NULL, 'cr', NULL, '2022-06-07', 0, 0, 0, NULL, 'New Sale: J07T33Z1V8', 2, '', '2022-06-07 11:50:18'),
(182, 1, 1971, 4, 27, 6, 1, NULL, 73, 34, 'orders', '700001', 'J07T33Z1V8', '', 220.00, NULL, 'cr', NULL, '2022-06-07', 0, 0, 0, NULL, 'New Sale: J07T33Z1V8', 2, '', '2022-06-07 11:50:18'),
(183, 1, 1974, 1, 28, 6, 1, NULL, 73, 34, 'orders', '500002', 'J07T33Z1V8', '', 220.00, NULL, 'dr', NULL, '2022-06-07', 0, 0, 0, NULL, 'New Sale: J07T33Z1V8', 2, '', '2022-06-07 11:50:18'),
(184, 1, 1971, 4, 27, 6, 1, NULL, 73, 34, 'orders', '700001', 'J07T33Z1V8', '', 220.00, NULL, 'dr', NULL, '2022-06-07', 0, 0, 0, NULL, 'New Sale: J07T33Z1V8', 2, '', '2022-06-07 11:50:18'),
(185, 1, 1974, 1, 28, 6, 1, NULL, 73, 34, 'orders', '500002', 'J07T33Z1V8', '', 220.00, NULL, 'cr', NULL, '2022-06-07', 0, 0, 0, NULL, 'New Sale: J07T33Z1V8', 2, '', '2022-06-07 11:50:18'),
(186, 1, 1977, 5, 30, 6, 3, NULL, NULL, NULL, NULL, '600002', '202206071458490.0439', NULL, 80000.00, NULL, 'cr', '', '2022-06-07', 0, 0, 0, NULL, 'Salary for the month 6/2021', 2, '', '2022-06-07 11:58:49'),
(187, 1, 1979, 3, 16, 6, 3, NULL, NULL, NULL, NULL, '800002', '202206071458490.0439', NULL, 80000.00, NULL, 'dr', '', '2022-06-07', 0, 0, 0, NULL, 'Salary for the month 6/2021', 2, '', '2022-06-07 11:58:49'),
(188, 1, 1980, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800003', '202206071458490.0439', NULL, 0.00, NULL, 'dr', '', '2022-06-07', 0, 0, 0, NULL, 'NHIF for the month 6/2021', 2, '', '2022-06-07 11:58:49'),
(189, 1, 1981, 3, 32, 6, 3, NULL, NULL, NULL, NULL, '800004', '202206071458490.0439', NULL, 0.00, NULL, 'dr', '', '2022-06-07', 0, 0, 0, NULL, 'NSSF for the month 6/2021', 2, '', '2022-06-07 11:58:49');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_accounts`
-- (See below for the actual view)
--
CREATE TABLE `vw_accounts` (
`account_id` int(11)
,`org_id` int(11)
,`account_type_id` int(11)
,`subaccount_type_id` int(11)
,`account_code` varchar(20)
,`account_name` varchar(50)
,`opening_balance` double(18,2)
,`is_votehead` tinyint(1)
,`is_studentaccount` tinyint(1)
,`is_key` tinyint(1)
,`student_id` int(11)
,`table_id` int(11)
,`table_name` varchar(30)
,`active` tinyint(1)
,`narrative` text
,`created_by` int(11)
,`time_stamp` timestamp
,`subaccount_type_name` varchar(30)
,`subaccount_type_code` varchar(20)
,`is_paymentmode` tinyint(1)
,`account_type_name` varchar(20)
,`account_type_code` varchar(5)
,`firstname` varchar(255)
,`secondname` varchar(50)
,`lastname` varchar(255)
,`email` varchar(255)
,`phone` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_balances`
-- (See below for the actual view)
--
CREATE TABLE `vw_balances` (
`voucher_id` int(11)
,`org_id` int(11)
,`account_id` int(11)
,`account_type_id` int(11)
,`subaccount_type_id` int(11)
,`fiscal_year_id` int(11)
,`term_id` int(11)
,`student_id` int(11)
,`table_id` int(11)
,`table_name` varchar(50)
,`account_code` varchar(50)
,`voucher_code` varchar(50)
,`reference` varchar(50)
,`voucher_amount` double(18,2)
,`voucher_type` enum('cr','dr')
,`opening_closing_balance` enum('Opening','Closing')
,`transaction_date` date
,`is_duplicate` tinyint(1)
,`is_ignore` tinyint(1)
,`narrative` text
,`created_by` int(11)
,`approved_by` varchar(50)
,`time_stamp` timestamp
,`account_name` varchar(50)
,`subaccount_type_name` varchar(30)
,`is_studentaccount` tinyint(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_general_ledger`
-- (See below for the actual view)
--
CREATE TABLE `vw_general_ledger` (
`voucher_id` int(11)
,`org_id` int(11)
,`term_id` int(11)
,`account_id` int(11)
,`account_type_id` int(11)
,`subaccount_type_id` int(11)
,`fiscal_year_id` int(11)
,`customer_supplier_id` int(11)
,`student_id` int(11)
,`is_paid` tinyint(1)
,`table_id` int(11)
,`table_name` varchar(50)
,`account_code` varchar(50)
,`voucher_code` varchar(50)
,`voucher_amount` double(18,2)
,`voucher_balance` decimal(10,2)
,`voucher_type` enum('cr','dr')
,`voucher_category` varchar(50)
,`opening_closing_balance` enum('Opening','Closing')
,`transaction_date` date
,`narrative` text
,`created_by` int(11)
,`approved_by` varchar(50)
,`time_stamp` timestamp
,`subaccount_type_name` varchar(30)
,`subaccount_type_code` varchar(20)
,`account_type_name` varchar(20)
,`account_type_code` varchar(5)
,`account_name` varchar(50)
,`is_studentaccount` tinyint(1)
,`firstname` varchar(255)
,`secondname` varchar(50)
,`lastname` varchar(255)
,`email` varchar(255)
,`phone` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_my_close_day`
-- (See below for the actual view)
--
CREATE TABLE `vw_my_close_day` (
`order_item_id` int(11)
,`order_id` int(11)
,`item_id` int(11)
,`qty` varchar(255)
,`tax_id` int(11)
,`rate` varchar(255)
,`amount` varchar(255)
,`item_name` varchar(255)
,`marked_price` double
,`imei_one` varchar(50)
,`imei_two` varchar(50)
,`color_id` int(11)
,`capacity` int(11)
,`brand_id` int(11)
,`brand_model_id` int(11)
,`brand_name` varchar(255)
,`color_name` varchar(50)
,`model_name` varchar(50)
,`org_id` int(11)
,`transaction_type_id` int(11)
,`entity_id` int(11)
,`customer_supplier_id` int(11)
,`payment_mode_id` int(11)
,`bill_no` varchar(255)
,`date_time` varchar(255)
,`tax_charge` decimal(10,2)
,`net_amount` varchar(255)
,`discount` varchar(255)
,`paid_status` tinyint(1)
,`paying_balance` double
,`change_return` double
,`date_modified` timestamp
,`time_stamp` timestamp
,`transaction_type_name` varchar(50)
,`customer_name` text
,`payment_mode_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `year_months`
--

CREATE TABLE `year_months` (
  `year_month_id` int(11) NOT NULL,
  `month_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year_months`
--

INSERT INTO `year_months` (`year_month_id`, `month_name`) VALUES
(1, 'JANUARY'),
(2, 'FEBRUARY'),
(3, 'MARCH'),
(4, 'APRIL'),
(5, 'MAY'),
(6, 'JUNE'),
(7, 'JULY'),
(8, 'AUGUST'),
(9, 'SEPTEMBER'),
(10, 'OCTOBER'),
(11, 'NOVEMBER'),
(12, 'DECEMBER');

-- --------------------------------------------------------

--
-- Structure for view `vw_accounts`
--
DROP TABLE IF EXISTS `vw_accounts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_accounts`  AS SELECT `a`.`account_id` AS `account_id`, `a`.`org_id` AS `org_id`, `a`.`account_type_id` AS `account_type_id`, `a`.`subaccount_type_id` AS `subaccount_type_id`, `a`.`account_code` AS `account_code`, `a`.`account_name` AS `account_name`, `a`.`opening_balance` AS `opening_balance`, `a`.`is_votehead` AS `is_votehead`, `a`.`is_studentaccount` AS `is_studentaccount`, `a`.`is_key` AS `is_key`, `a`.`student_id` AS `student_id`, `a`.`table_id` AS `table_id`, `a`.`table_name` AS `table_name`, `a`.`active` AS `active`, `a`.`narrative` AS `narrative`, `a`.`created_by` AS `created_by`, `a`.`time_stamp` AS `time_stamp`, `b`.`subaccount_type_name` AS `subaccount_type_name`, `b`.`subaccount_type_code` AS `subaccount_type_code`, `b`.`is_paymentmode` AS `is_paymentmode`, `c`.`account_type_name` AS `account_type_name`, `c`.`account_type_code` AS `account_type_code`, `d`.`firstname` AS `firstname`, `d`.`secondname` AS `secondname`, `d`.`lastname` AS `lastname`, `d`.`email` AS `email`, `d`.`phone` AS `phone` FROM (((`accounts` `a` left join `subaccount_types` `b` on(`a`.`subaccount_type_id` = `b`.`subaccount_type_id`)) join `account_types` `c` on(`a`.`account_type_id` = `c`.`account_type_id`)) left join `entitys` `d` on(`a`.`created_by` = `d`.`entity_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_balances`
--
DROP TABLE IF EXISTS `vw_balances`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_balances`  AS SELECT `a`.`voucher_id` AS `voucher_id`, `a`.`org_id` AS `org_id`, `a`.`account_id` AS `account_id`, `a`.`account_type_id` AS `account_type_id`, `a`.`subaccount_type_id` AS `subaccount_type_id`, `a`.`fiscal_year_id` AS `fiscal_year_id`, `a`.`term_id` AS `term_id`, `a`.`student_id` AS `student_id`, `a`.`table_id` AS `table_id`, `a`.`table_name` AS `table_name`, `a`.`account_code` AS `account_code`, `a`.`voucher_code` AS `voucher_code`, `a`.`reference` AS `reference`, `a`.`voucher_amount` AS `voucher_amount`, `a`.`voucher_type` AS `voucher_type`, `a`.`opening_closing_balance` AS `opening_closing_balance`, `a`.`transaction_date` AS `transaction_date`, `a`.`is_duplicate` AS `is_duplicate`, `a`.`is_ignore` AS `is_ignore`, `a`.`narrative` AS `narrative`, `a`.`created_by` AS `created_by`, `a`.`approved_by` AS `approved_by`, `a`.`time_stamp` AS `time_stamp`, `b`.`account_name` AS `account_name`, `b`.`subaccount_type_name` AS `subaccount_type_name`, `b`.`is_studentaccount` AS `is_studentaccount` FROM (`vouchers` `a` join `vw_accounts` `b` on(`a`.`account_id` = `b`.`account_id`)) WHERE `b`.`is_studentaccount` = 1 ;

-- --------------------------------------------------------

--
-- Structure for view `vw_general_ledger`
--
DROP TABLE IF EXISTS `vw_general_ledger`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_general_ledger`  AS SELECT `a`.`voucher_id` AS `voucher_id`, `a`.`org_id` AS `org_id`, `a`.`term_id` AS `term_id`, `a`.`account_id` AS `account_id`, `a`.`account_type_id` AS `account_type_id`, `a`.`subaccount_type_id` AS `subaccount_type_id`, `a`.`fiscal_year_id` AS `fiscal_year_id`, `a`.`customer_supplier_id` AS `customer_supplier_id`, `a`.`student_id` AS `student_id`, `a`.`is_paid` AS `is_paid`, `a`.`table_id` AS `table_id`, `a`.`table_name` AS `table_name`, `a`.`account_code` AS `account_code`, `a`.`voucher_code` AS `voucher_code`, `a`.`voucher_amount` AS `voucher_amount`, `a`.`voucher_balance` AS `voucher_balance`, `a`.`voucher_type` AS `voucher_type`, `a`.`voucher_category` AS `voucher_category`, `a`.`opening_closing_balance` AS `opening_closing_balance`, `a`.`transaction_date` AS `transaction_date`, `a`.`narrative` AS `narrative`, `a`.`created_by` AS `created_by`, `a`.`approved_by` AS `approved_by`, `a`.`time_stamp` AS `time_stamp`, `b`.`subaccount_type_name` AS `subaccount_type_name`, `b`.`subaccount_type_code` AS `subaccount_type_code`, `c`.`account_type_name` AS `account_type_name`, `c`.`account_type_code` AS `account_type_code`, `d`.`account_name` AS `account_name`, `d`.`is_studentaccount` AS `is_studentaccount`, `e`.`firstname` AS `firstname`, `e`.`secondname` AS `secondname`, `e`.`lastname` AS `lastname`, `e`.`email` AS `email`, `e`.`phone` AS `phone` FROM ((((`vouchers` `a` left join `subaccount_types` `b` on(`a`.`subaccount_type_id` = `b`.`subaccount_type_id`)) join `account_types` `c` on(`a`.`account_type_id` = `c`.`account_type_id`)) join `accounts` `d` on(`a`.`account_id` = `d`.`account_id`)) left join `entitys` `e` on(`a`.`created_by` = `e`.`entity_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_my_close_day`
--
DROP TABLE IF EXISTS `vw_my_close_day`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_my_close_day`  AS SELECT `order_items`.`order_item_id` AS `order_item_id`, `order_items`.`order_id` AS `order_id`, `order_items`.`item_id` AS `item_id`, `order_items`.`qty` AS `qty`, `order_items`.`tax_id` AS `tax_id`, `order_items`.`rate` AS `rate`, `order_items`.`amount` AS `amount`, `items`.`item_name` AS `item_name`, `items`.`marked_price` AS `marked_price`, `items`.`imei_one` AS `imei_one`, `items`.`imei_two` AS `imei_two`, `items`.`color_id` AS `color_id`, `items`.`capacity` AS `capacity`, `items`.`brand_id` AS `brand_id`, `items`.`brand_model_id` AS `brand_model_id`, `brands`.`brand_name` AS `brand_name`, `colors`.`color_name` AS `color_name`, `brand_models`.`model_name` AS `model_name`, `orders`.`org_id` AS `org_id`, `orders`.`transaction_type_id` AS `transaction_type_id`, `orders`.`entity_id` AS `entity_id`, `orders`.`customer_supplier_id` AS `customer_supplier_id`, `orders`.`payment_mode_id` AS `payment_mode_id`, `orders`.`bill_no` AS `bill_no`, `orders`.`date_time` AS `date_time`, `orders`.`tax_charge` AS `tax_charge`, `orders`.`net_amount` AS `net_amount`, `orders`.`discount` AS `discount`, `orders`.`paid_status` AS `paid_status`, `orders`.`paying_balance` AS `paying_balance`, `orders`.`change_return` AS `change_return`, `orders`.`date_modified` AS `date_modified`, `orders`.`time_stamp` AS `time_stamp`, `transaction_types`.`transaction_type_name` AS `transaction_type_name`, concat(ifnull(`entitys`.`firstname`,''),' ',ifnull(`entitys`.`secondname`,''),' ',ifnull(`entitys`.`lastname`,'')) AS `customer_name`, `payment_modes`.`payment_mode_name` AS `payment_mode_name` FROM ((((((((`order_items` join `items` on(`items`.`item_id` = `order_items`.`item_id`)) left join `brands` on(`brands`.`brand_id` = `items`.`brand_id`)) left join `colors` on(`colors`.`color_id` = `items`.`color_id`)) left join `brand_models` on(`brand_models`.`brand_model_id` = `items`.`brand_model_id`)) join `orders` on(`orders`.`order_id` = `order_items`.`order_id`)) left join `transaction_types` on(`transaction_types`.`transaction_type_id` = `orders`.`transaction_type_id`)) left join `entitys` on(`entitys`.`entity_id` = `orders`.`customer_supplier_id`)) left join `payment_modes` on(`payment_modes`.`payment_mode_id` = `orders`.`payment_mode_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `account_code` (`account_code`);

--
-- Indexes for table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`account_type_id`),
  ADD UNIQUE KEY `account_type_code` (`account_type_code`);

--
-- Indexes for table `allowances`
--
ALTER TABLE `allowances`
  ADD PRIMARY KEY (`allowance_id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `brand_models`
--
ALTER TABLE `brand_models`
  ADD PRIMARY KEY (`brand_model_id`);

--
-- Indexes for table `budgeting`
--
ALTER TABLE `budgeting`
  ADD PRIMARY KEY (`budget_id`);

--
-- Indexes for table `budget_breakdown`
--
ALTER TABLE `budget_breakdown`
  ADD PRIMARY KEY (`budget_breakdown_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`currency_id`),
  ADD UNIQUE KEY `currency_code` (`currency_code`);

--
-- Indexes for table `db_backups`
--
ALTER TABLE `db_backups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductibles`
--
ALTER TABLE `deductibles`
  ADD PRIMARY KEY (`deductible_id`);

--
-- Indexes for table `departmental_heads`
--
ALTER TABLE `departmental_heads`
  ADD PRIMARY KEY (`departmental_head_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `FK_departments_station_id` (`station_id`),
  ADD KEY `FK_departments_org_id` (`org_id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `eating_tables`
--
ALTER TABLE `eating_tables`
  ADD PRIMARY KEY (`eating_table_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `id_number` (`id_number`),
  ADD UNIQUE KEY `primary_phone` (`primary_phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employee_allowances`
--
ALTER TABLE `employee_allowances`
  ADD PRIMARY KEY (`employee_allowance_id`),
  ADD KEY `FK_employee_allowances_id` (`allowance_id`),
  ADD KEY `FK_employee_allowances_employee_id` (`employee_id`);

--
-- Indexes for table `employee_bank_details`
--
ALTER TABLE `employee_bank_details`
  ADD PRIMARY KEY (`employee_bank_detail_id`);

--
-- Indexes for table `employee_deductibles`
--
ALTER TABLE `employee_deductibles`
  ADD PRIMARY KEY (`employee_deductible_id`),
  ADD KEY `FK_employee_deductibles_id` (`deductible_id`),
  ADD KEY `FK_employee_deductibles_employee_id` (`employee_id`);

--
-- Indexes for table `employee_month`
--
ALTER TABLE `employee_month`
  ADD PRIMARY KEY (`employee_month_id`);

--
-- Indexes for table `entitys`
--
ALTER TABLE `entitys`
  ADD PRIMARY KEY (`entity_id`),
  ADD UNIQUE KEY `pin` (`pin`),
  ADD KEY `FK_entitys_sub_department` (`sub_department_id`),
  ADD KEY `FK_entitys_orgs` (`org_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD PRIMARY KEY (`expense_type_id`);

--
-- Indexes for table `fiscal_years`
--
ALTER TABLE `fiscal_years`
  ADD PRIMARY KEY (`fiscal_year_id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `income_payments`
--
ALTER TABLE `income_payments`
  ADD PRIMARY KEY (`income_payment_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `items_store`
--
ALTER TABLE `items_store`
  ADD PRIMARY KEY (`item_store_id`),
  ADD UNIQUE KEY `uq_store_item` (`store_id`,`item_id`);

--
-- Indexes for table `items_three`
--
ALTER TABLE `items_three`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `items_two`
--
ALTER TABLE `items_two`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `item_recipe_items`
--
ALTER TABLE `item_recipe_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_requests`
--
ALTER TABLE `item_requests`
  ADD PRIMARY KEY (`item_request_id`);

--
-- Indexes for table `item_returned`
--
ALTER TABLE `item_returned`
  ADD PRIMARY KEY (`item_return_id`);

--
-- Indexes for table `item_status`
--
ALTER TABLE `item_status`
  ADD PRIMARY KEY (`item_status_id`);

--
-- Indexes for table `loan_types`
--
ALTER TABLE `loan_types`
  ADD PRIMARY KEY (`loan_type_id`);

--
-- Indexes for table `movement_records`
--
ALTER TABLE `movement_records`
  ADD PRIMARY KEY (`movement_record_id`),
  ADD KEY `FK_movement_records_orgs` (`org_id`),
  ADD KEY `FK_movement_records_entitys` (`entity_id`);

--
-- Indexes for table `mpesa_callbacks`
--
ALTER TABLE `mpesa_callbacks`
  ADD PRIMARY KEY (`mpesa_callback_id`);

--
-- Indexes for table `mpesa_payments`
--
ALTER TABLE `mpesa_payments`
  ADD PRIMARY KEY (`mpesa_payment_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_orders_org_id` (`org_id`),
  ADD KEY `FK_orders_transaction_type_id` (`transaction_type_id`),
  ADD KEY `FK_orders_entity_id` (`entity_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `FK_order_items_order_id` (`order_id`);

--
-- Indexes for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD PRIMARY KEY (`order_payment_id`);

--
-- Indexes for table `order_purchases`
--
ALTER TABLE `order_purchases`
  ADD PRIMARY KEY (`order_purchase_id`);

--
-- Indexes for table `orgs`
--
ALTER TABLE `orgs`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `package_types`
--
ALTER TABLE `package_types`
  ADD PRIMARY KEY (`package_type_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`payment_mode_id`);

--
-- Indexes for table `petty_cash`
--
ALTER TABLE `petty_cash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `rooms_booked`
--
ALTER TABLE `rooms_booked`
  ADD PRIMARY KEY (`booked_room_id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `sms_credit`
--
ALTER TABLE `sms_credit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_templates`
--
ALTER TABLE `sms_templates`
  ADD PRIMARY KEY (`template_id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`station_id`),
  ADD KEY `FK_stations_org_id` (`org_id`),
  ADD KEY `p_phone` (`primary_phone`),
  ADD KEY `p_email` (`primary_email`),
  ADD KEY `p_lat` (`latitude`),
  ADD KEY `p_long` (`longitude`),
  ADD KEY `FK_stations_cat` (`category_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `stock_lines`
--
ALTER TABLE `stock_lines`
  ADD PRIMARY KEY (`stock_line_id`),
  ADD UNIQUE KEY `uq_stock_line` (`stock_id`,`item_id`);

--
-- Indexes for table `subaccount_types`
--
ALTER TABLE `subaccount_types`
  ADD PRIMARY KEY (`subaccount_type_id`);

--
-- Indexes for table `sub_departments`
--
ALTER TABLE `sub_departments`
  ADD PRIMARY KEY (`sub_department_id`),
  ADD KEY `FK_sub_departments_org_id` (`org_id`),
  ADD KEY `FK_sub_departments_department_id` (`department_id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_emailed`
--
ALTER TABLE `sys_emailed`
  ADD PRIMARY KEY (`sys_emailed_id`);

--
-- Indexes for table `sys_emails`
--
ALTER TABLE `sys_emails`
  ADD PRIMARY KEY (`sys_email_id`);

--
-- Indexes for table `sys_logs`
--
ALTER TABLE `sys_logs`
  ADD PRIMARY KEY (`sys_log_id`);

--
-- Indexes for table `tax_types`
--
ALTER TABLE `tax_types`
  ADD PRIMARY KEY (`tax_type_id`),
  ADD UNIQUE KEY `tax_type_name` (`tax_type_name`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tlj`
--
ALTER TABLE `tlj`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_types`
--
ALTER TABLE `transaction_types`
  ADD PRIMARY KEY (`transaction_type_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`voucher_id`);

--
-- Indexes for table `year_months`
--
ALTER TABLE `year_months`
  ADD PRIMARY KEY (`year_month_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1982;

--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `account_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `allowances`
--
ALTER TABLE `allowances`
  MODIFY `allowance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `brand_models`
--
ALTER TABLE `brand_models`
  MODIFY `brand_model_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budgeting`
--
ALTER TABLE `budgeting`
  MODIFY `budget_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `budget_breakdown`
--
ALTER TABLE `budget_breakdown`
  MODIFY `budget_breakdown_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `db_backups`
--
ALTER TABLE `db_backups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deductibles`
--
ALTER TABLE `deductibles`
  MODIFY `deductible_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departmental_heads`
--
ALTER TABLE `departmental_heads`
  MODIFY `departmental_head_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `eating_tables`
--
ALTER TABLE `eating_tables`
  MODIFY `eating_table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `employee_allowances`
--
ALTER TABLE `employee_allowances`
  MODIFY `employee_allowance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employee_bank_details`
--
ALTER TABLE `employee_bank_details`
  MODIFY `employee_bank_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `employee_deductibles`
--
ALTER TABLE `employee_deductibles`
  MODIFY `employee_deductible_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `employee_month`
--
ALTER TABLE `employee_month`
  MODIFY `employee_month_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3047;

--
-- AUTO_INCREMENT for table `entitys`
--
ALTER TABLE `entitys`
  MODIFY `entity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `expense_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fiscal_years`
--
ALTER TABLE `fiscal_years`
  MODIFY `fiscal_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `income_payments`
--
ALTER TABLE `income_payments`
  MODIFY `income_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `items_store`
--
ALTER TABLE `items_store`
  MODIFY `item_store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `items_three`
--
ALTER TABLE `items_three`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;

--
-- AUTO_INCREMENT for table `items_two`
--
ALTER TABLE `items_two`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=445;

--
-- AUTO_INCREMENT for table `item_recipe_items`
--
ALTER TABLE `item_recipe_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_requests`
--
ALTER TABLE `item_requests`
  MODIFY `item_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item_returned`
--
ALTER TABLE `item_returned`
  MODIFY `item_return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item_status`
--
ALTER TABLE `item_status`
  MODIFY `item_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `loan_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movement_records`
--
ALTER TABLE `movement_records`
  MODIFY `movement_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mpesa_callbacks`
--
ALTER TABLE `mpesa_callbacks`
  MODIFY `mpesa_callback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mpesa_payments`
--
ALTER TABLE `mpesa_payments`
  MODIFY `mpesa_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_payments`
--
ALTER TABLE `order_payments`
  MODIFY `order_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_purchases`
--
ALTER TABLE `order_purchases`
  MODIFY `order_purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orgs`
--
ALTER TABLE `orgs`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package_types`
--
ALTER TABLE `package_types`
  MODIFY `package_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `payment_mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `petty_cash`
--
ALTER TABLE `petty_cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms_booked`
--
ALTER TABLE `rooms_booked`
  MODIFY `booked_room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `room_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `sms_credit`
--
ALTER TABLE `sms_credit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms_templates`
--
ALTER TABLE `sms_templates`
  MODIFY `template_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `station_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock_lines`
--
ALTER TABLE `stock_lines`
  MODIFY `stock_line_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT for table `subaccount_types`
--
ALTER TABLE `subaccount_types`
  MODIFY `subaccount_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sub_departments`
--
ALTER TABLE `sub_departments`
  MODIFY `sub_department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_emailed`
--
ALTER TABLE `sys_emailed`
  MODIFY `sys_emailed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sys_emails`
--
ALTER TABLE `sys_emails`
  MODIFY `sys_email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sys_logs`
--
ALTER TABLE `sys_logs`
  MODIFY `sys_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT for table `tax_types`
--
ALTER TABLE `tax_types`
  MODIFY `tax_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tlj`
--
ALTER TABLE `tlj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction_types`
--
ALTER TABLE `transaction_types`
  MODIFY `transaction_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `year_months`
--
ALTER TABLE `year_months`
  MODIFY `year_month_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `FK_departments_org_id` FOREIGN KEY (`org_id`) REFERENCES `orgs` (`org_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_departments_station_id` FOREIGN KEY (`station_id`) REFERENCES `stations` (`station_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
