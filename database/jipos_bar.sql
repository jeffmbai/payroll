-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2022 at 04:07 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `account_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `account_type_id` int NOT NULL,
  `subaccount_type_id` int DEFAULT NULL,
  `account_code` varchar(20) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `opening_balance` double(18,2) DEFAULT NULL,
  `is_votehead` tinyint(1) NOT NULL DEFAULT '0',
  `is_studentaccount` tinyint(1) NOT NULL DEFAULT '0',
  `is_key` tinyint(1) NOT NULL DEFAULT '0',
  `other_category` varchar(30) DEFAULT NULL,
  `student_id` int DEFAULT NULL,
  `table_id` int DEFAULT NULL,
  `table_name` varchar(30) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` text,
  `created_by` int DEFAULT NULL,
  `time_stamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
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
(1979, 1, 3, 32, '800002', 'Salaries', 0.00, 0, 0, 1, '', NULL, NULL, NULL, 1, '', 1, '2022-03-23 13:04:02'),
(1980, 1, 3, 32, '800003', 'NHIF', 0.00, 0, 0, 1, '', NULL, NULL, NULL, 1, '', 1, '2022-04-07 10:13:58'),
(1981, 1, 3, 32, '800004', 'NSSF', 0.00, 0, 0, 1, '', NULL, NULL, NULL, 1, '', 1, '2022-04-07 10:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE `account_types` (
  `account_type_id` int NOT NULL,
  `account_type_code` varchar(5) NOT NULL,
  `account_type_name` varchar(20) NOT NULL,
  `narrative` text,
  `time_stamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
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
  `allowance_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `allowance_name` varchar(50) NOT NULL,
  `is_taxable` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(50) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `attribute_id` int NOT NULL,
  `attribute_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(200) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`attribute_id`, `attribute_name`, `active`, `narrative`, `time_stamp`) VALUES
(1, 'Medium', 1, '', '2021-01-09 22:16:28'),
(3, 'Small', 1, '', '2021-01-09 22:19:36'),
(4, 'Large', 1, '', '2021-01-09 22:19:53'),
(5, 'Extra large', 1, '', '2021-01-09 22:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `bank_id` int NOT NULL,
  `org_id` int NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `bank_pin` int DEFAULT NULL,
  `account_number` int DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `narrative` varchar(156) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(156) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `active`, `narrative`, `time_stamp`) VALUES
(1, 'Brand1', 1, NULL, '2022-04-10 08:26:28'),
(2, 'Brand2', 1, '', '2020-10-13 16:20:18'),
(3, 'Brand3', 1, NULL, '2022-04-10 08:27:39'),
(4, 'Brand4', 1, NULL, '2022-04-10 08:27:39'),
(5, 'Brand5', 1, NULL, '2022-04-10 08:27:39'),
(6, 'Brand6', 1, NULL, '2022-04-10 08:27:39'),
(7, 'Brand7', 1, '', '2022-02-03 15:47:13'),
(8, 'Brand8', 1, '', '2022-02-03 15:48:22'),
(9, 'Brand9', 1, '', '2022-02-03 15:50:31'),
(10, 'Brand10', 1, '', '2022-02-03 15:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `brand_models`
--

CREATE TABLE `brand_models` (
  `brand_model_id` int NOT NULL,
  `org_id` int DEFAULT '1',
  `brand_id` int NOT NULL,
  `model_name` varchar(50) NOT NULL,
  `reorder_level` int DEFAULT NULL,
  `available_qty` int NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `budgeting`
--

CREATE TABLE `budgeting` (
  `budget_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `budget_name` varchar(100) NOT NULL,
  `staff_id` int NOT NULL,
  `fiscal_year_id` int NOT NULL,
  `term_id` int NOT NULL,
  `account_id` int NOT NULL,
  `budget_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `practical_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `balance` decimal(10,2) DEFAULT '0.00',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(150) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `budgeting`
--

INSERT INTO `budgeting` (`budget_id`, `org_id`, `budget_name`, `staff_id`, `fiscal_year_id`, `term_id`, `account_id`, `budget_amount`, `practical_amount`, `balance`, `active`, `narrative`, `time_stamp`) VALUES
(1, 1, 'Marketing', 0, 7, 1, 625, '50000.00', '0.00', '0.00', 1, 'Marketing activities for the institution', '2022-01-31 13:44:40'),
(2, 1, 'Quarter One', 0, 6, 1, 58, '1000.00', '0.00', '0.00', 1, 'retyui', '2022-02-24 07:46:19'),
(3, 1, 'This budget', 0, 6, 3, 7, '1000.00', '0.00', '0.00', 1, '', '2022-03-18 05:07:52'),
(4, 1, 'Budget A1', 0, 6, 3, 8, '500.00', '0.00', '0.00', 1, 'd', '2022-03-31 05:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `budget_breakdown`
--

CREATE TABLE `budget_breakdown` (
  `budget_breakdown_id` int NOT NULL,
  `budget_id` int NOT NULL,
  `vote_head_id` int NOT NULL,
  `budget_amount` double NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `narrative` varchar(50) DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(156) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `active`, `narrative`, `time_stamp`) VALUES
(1, 'BEER', 1, '', '2021-01-09 22:06:41'),
(2, 'WHISKEY', 1, '', '2022-02-03 14:59:57'),
(3, 'VODKA', 1, '', '2022-02-03 15:00:47'),
(4, 'GIN', 1, '', '2022-02-03 16:45:59'),
(5, 'BRANDY', 1, '', '2021-01-09 22:10:33'),
(6, 'RUM', 1, '', '2020-12-09 11:57:52'),
(7, 'WINES', 1, '', '2022-04-09 22:14:15'),
(8, 'SOFT DRINKS', 1, '', '2022-04-09 22:14:31'),
(9, 'OTHERS', 1, '', '2022-04-09 22:14:37'),
(10, 'COCKTAILS', 1, '', '2022-04-09 22:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `color_id` int NOT NULL,
  `color_name` varchar(50) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `country_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `country_code` varchar(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(156) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `name`, `country_code`, `active`, `narrative`, `time_stamp`) VALUES
(4, 'Afghanistan', 'AF', 1, NULL, '2020-05-09 17:44:26'),
(5, 'Åland', 'AX', 1, NULL, '2020-05-09 17:44:26'),
(6, 'Albania', 'AL', 1, NULL, '2020-05-09 17:44:26'),
(7, 'Algeria', 'DZ', 1, NULL, '2020-05-09 17:44:26'),
(8, 'American Samoa', 'AS', 1, NULL, '2020-05-09 17:44:26'),
(9, 'Andorra', 'AD', 1, NULL, '2020-05-09 17:44:26'),
(10, 'Angola', 'AO', 1, NULL, '2020-05-09 17:44:26'),
(11, 'Anguilla', 'AI', 1, NULL, '2020-05-09 17:44:26'),
(12, 'Antarctica', 'AQ', 1, NULL, '2020-05-09 17:44:26'),
(13, 'Antigua and Barbuda', 'AG', 1, NULL, '2020-05-09 17:44:26'),
(14, 'Argentina', 'AR', 1, NULL, '2020-05-09 17:44:26'),
(15, 'Armenia', 'AM', 1, NULL, '2020-05-09 17:44:26'),
(16, 'Aruba', 'AW', 1, NULL, '2020-05-09 17:44:26'),
(17, 'Australia', 'AU', 1, NULL, '2020-05-09 17:44:26'),
(18, 'Austria', 'AT', 1, NULL, '2020-05-09 17:44:26'),
(19, 'Azerbaijan', 'AZ', 1, NULL, '2020-05-09 17:44:26'),
(20, 'Bahamas', 'BS', 1, NULL, '2020-05-09 17:44:26'),
(21, 'Bahrain', 'BH', 1, NULL, '2020-05-09 17:44:26'),
(22, 'Bangladesh', 'BD', 1, NULL, '2020-05-09 17:44:26'),
(23, 'Barbados', 'BB', 1, NULL, '2020-05-09 17:44:26'),
(24, 'Belarus', 'BY', 1, NULL, '2020-05-09 17:44:26'),
(25, 'Belgium', 'BE', 1, NULL, '2020-05-09 17:44:26'),
(26, 'Belize', 'BZ', 1, NULL, '2020-05-09 17:44:26'),
(27, 'Benin', 'BJ', 1, NULL, '2020-05-09 17:44:26'),
(28, 'Bermuda', 'BM', 1, NULL, '2020-05-09 17:44:26'),
(29, 'Bhutan', 'BT', 1, NULL, '2020-05-09 17:44:26'),
(30, 'Bolivia', 'BO', 1, NULL, '2020-05-09 17:44:26'),
(31, 'Bonaire', 'BQ', 1, NULL, '2020-05-09 17:44:26'),
(32, 'Bosnia and Herzegovina', 'BA', 1, NULL, '2020-05-09 17:44:26'),
(33, 'Botswana', 'BW', 1, NULL, '2020-05-09 17:44:26'),
(34, 'Bouvet Island', 'BV', 1, NULL, '2020-05-09 17:44:26'),
(35, 'Brazil', 'BR', 1, NULL, '2020-05-09 17:44:26'),
(36, 'British Indian Ocean Territory', 'IO', 1, NULL, '2020-05-09 17:44:26'),
(37, 'British Virgin Islands', 'VG', 1, NULL, '2020-05-09 17:44:26'),
(38, 'Brunei', 'BN', 1, NULL, '2020-05-09 17:44:26'),
(39, 'Bulgaria', 'BG', 1, NULL, '2020-05-09 17:44:26'),
(40, 'Burkina Faso', 'BF', 1, NULL, '2020-05-09 17:44:26'),
(41, 'Burundi', 'BI', 1, NULL, '2020-05-09 17:44:26'),
(42, 'Cambodia', 'KH', 1, NULL, '2020-05-09 17:44:26'),
(43, 'Cameroon', 'CM', 1, NULL, '2020-05-09 17:44:26'),
(44, 'Canada', 'CA', 1, NULL, '2020-05-09 17:44:26'),
(45, 'Cape Verde', 'CV', 1, NULL, '2020-05-09 17:44:26'),
(46, 'Cayman Islands', 'KY', 1, NULL, '2020-05-09 17:44:26'),
(47, 'Central African Republic', 'CF', 1, NULL, '2020-05-09 17:44:26'),
(48, 'Chad', 'TD', 1, NULL, '2020-05-09 17:44:26'),
(49, 'Chile', 'CL', 1, NULL, '2020-05-09 17:44:26'),
(50, 'China', 'CN', 1, NULL, '2020-05-09 17:44:26'),
(51, 'Christmas Island', 'CX', 1, NULL, '2020-05-09 17:44:26'),
(52, 'Cocos [Keeling] Islands', 'CC', 1, NULL, '2020-05-09 17:44:26'),
(53, 'Colombia', 'CO', 1, NULL, '2020-05-09 17:44:26'),
(54, 'Comoros', 'KM', 1, NULL, '2020-05-09 17:44:26'),
(55, 'Cook Islands', 'CK', 1, NULL, '2020-05-09 17:44:26'),
(56, 'Costa Rica', 'CR', 1, NULL, '2020-05-09 17:44:26'),
(57, 'Croatia', 'HR', 1, NULL, '2020-05-09 17:44:26'),
(58, 'Cuba', 'CU', 1, NULL, '2020-05-09 17:44:26'),
(59, 'Curacao', 'CW', 1, NULL, '2020-05-09 17:44:26'),
(60, 'Cyprus', 'CY', 1, NULL, '2020-05-09 17:44:26'),
(61, 'Czech Republic', 'CZ', 1, NULL, '2020-05-09 17:44:26'),
(62, 'Democratic Republic of the Congo', 'CD', 1, NULL, '2020-05-09 17:44:26'),
(63, 'Denmark', 'DK', 1, NULL, '2020-05-09 17:44:26'),
(64, 'Djibouti', 'DJ', 1, NULL, '2020-05-09 17:44:26'),
(65, 'Dominica', 'DM', 1, NULL, '2020-05-09 17:44:26'),
(66, 'Dominican Republic', 'DO', 1, NULL, '2020-05-09 17:44:26'),
(67, 'East Timor', 'TL', 1, NULL, '2020-05-09 17:44:26'),
(68, 'Ecuador', 'EC', 1, NULL, '2020-05-09 17:44:26'),
(69, 'Egypt', 'EG', 1, NULL, '2020-05-09 17:44:26'),
(70, 'El Salvador', 'SV', 1, NULL, '2020-05-09 17:44:26'),
(71, 'Equatorial Guinea', 'GQ', 1, NULL, '2020-05-09 17:44:26'),
(72, 'Eritrea', 'ER', 1, NULL, '2020-05-09 17:44:26'),
(73, 'Estonia', 'EE', 1, NULL, '2020-05-09 17:44:26'),
(74, 'Ethiopia', 'ET', 1, NULL, '2020-05-09 17:44:26'),
(75, 'Falkland Islands', 'FK', 1, NULL, '2020-05-09 17:44:26'),
(76, 'Faroe Islands', 'FO', 1, NULL, '2020-05-09 17:44:26'),
(77, 'Fiji', 'FJ', 1, NULL, '2020-05-09 17:44:26'),
(78, 'Finland', 'FI', 1, NULL, '2020-05-09 17:44:26'),
(79, 'France', 'FR', 1, NULL, '2020-05-09 17:44:26'),
(80, 'French Guiana', 'GF', 1, NULL, '2020-05-09 17:44:26'),
(81, 'French Polynesia', 'PF', 1, NULL, '2020-05-09 17:44:26'),
(82, 'French Southern Territories', 'TF', 1, NULL, '2020-05-09 17:44:26'),
(83, 'Gabon', 'GA', 1, NULL, '2020-05-09 17:44:26'),
(84, 'Gambia', 'GM', 1, NULL, '2020-05-09 17:44:26'),
(85, 'Georgia', 'GE', 1, NULL, '2020-05-09 17:44:26'),
(86, 'Germany', 'DE', 1, NULL, '2020-05-09 17:44:26'),
(87, 'Ghana', 'GH', 1, NULL, '2020-05-09 17:44:26'),
(88, 'Gibraltar', 'GI', 1, NULL, '2020-05-09 17:44:26'),
(89, 'Greece', 'GR', 1, NULL, '2020-05-09 17:44:26'),
(90, 'Greenland', 'GL', 1, NULL, '2020-05-09 17:44:26'),
(91, 'Grenada', 'GD', 1, NULL, '2020-05-09 17:44:26'),
(92, 'Guadeloupe', 'GP', 1, NULL, '2020-05-09 17:44:26'),
(93, 'Guam', 'GU', 1, NULL, '2020-05-09 17:44:26'),
(94, 'Guatemala', 'GT', 1, NULL, '2020-05-09 17:44:26'),
(95, 'Guernsey', 'GG', 1, NULL, '2020-05-09 17:44:26'),
(96, 'Guinea', 'GN', 1, NULL, '2020-05-09 17:44:26'),
(97, 'Guinea-Bissau', 'GW', 1, NULL, '2020-05-09 17:44:26'),
(98, 'Guyana', 'GY', 1, NULL, '2020-05-09 17:44:26'),
(99, 'Haiti', 'HT', 1, NULL, '2020-05-09 17:44:26'),
(100, 'Heard Island and McDonald Islands', 'HM', 1, NULL, '2020-05-09 17:44:26'),
(101, 'Honduras', 'HN', 1, NULL, '2020-05-09 17:44:26'),
(102, 'Hong Kong', 'HK', 1, NULL, '2020-05-09 17:44:26'),
(103, 'Hungary', 'HU', 1, NULL, '2020-05-09 17:44:26'),
(104, 'Iceland', 'IS', 1, NULL, '2020-05-09 17:44:26'),
(105, 'India', 'IN', 1, NULL, '2020-05-09 17:44:26'),
(106, 'Indonesia', 'ID', 1, NULL, '2020-05-09 17:44:26'),
(107, 'Iran', 'IR', 1, NULL, '2020-05-09 17:44:26'),
(108, 'Iraq', 'IQ', 1, NULL, '2020-05-09 17:44:26'),
(109, 'Ireland', 'IE', 1, NULL, '2020-05-09 17:44:26'),
(110, 'Isle of Man', 'IM', 1, NULL, '2020-05-09 17:44:26'),
(111, 'Israel', 'IL', 1, NULL, '2020-05-09 17:44:26'),
(112, 'Italy', 'IT', 1, NULL, '2020-05-09 17:44:26'),
(113, 'Ivory Coast', 'CI', 1, NULL, '2020-05-09 17:44:26'),
(114, 'Jamaica', 'JM', 1, NULL, '2020-05-09 17:44:26'),
(115, 'Japan', 'JP', 1, NULL, '2020-05-09 17:44:26'),
(116, 'Jersey', 'JE', 1, NULL, '2020-05-09 17:44:26'),
(117, 'Jordan', 'JO', 1, NULL, '2020-05-09 17:44:26'),
(118, 'Kazakhstan', 'KZ', 1, NULL, '2020-05-09 17:44:26'),
(119, 'Kenya', 'KE', 1, NULL, '2020-05-09 17:44:26'),
(120, 'Kiribati', 'KI', 1, NULL, '2020-05-09 17:44:26'),
(121, 'Kosovo', 'XK', 1, NULL, '2020-05-09 17:44:26'),
(122, 'Kuwait', 'KW', 1, NULL, '2020-05-09 17:44:26'),
(123, 'Kyrgyzstan', 'KG', 1, NULL, '2020-05-09 17:44:26'),
(124, 'Laos', 'LA', 1, NULL, '2020-05-09 17:44:26'),
(125, 'Latvia', 'LV', 1, NULL, '2020-05-09 17:44:26'),
(126, 'Lebanon', 'LB', 1, NULL, '2020-05-09 17:44:26'),
(127, 'Lesotho', 'LS', 1, NULL, '2020-05-09 17:44:26'),
(128, 'Liberia', 'LR', 1, NULL, '2020-05-09 17:44:26'),
(129, 'Libya', 'LY', 1, NULL, '2020-05-09 17:44:26'),
(130, 'Liechtenstein', 'LI', 1, NULL, '2020-05-09 17:44:26'),
(131, 'Lithuania', 'LT', 1, NULL, '2020-05-09 17:44:26'),
(132, 'Luxembourg', 'LU', 1, NULL, '2020-05-09 17:44:26'),
(133, 'Macao', 'MO', 1, NULL, '2020-05-09 17:44:26'),
(134, 'Macedonia', 'MK', 1, NULL, '2020-05-09 17:44:26'),
(135, 'Madagascar', 'MG', 1, NULL, '2020-05-09 17:44:26'),
(136, 'Malawi', 'MW', 1, NULL, '2020-05-09 17:44:26'),
(137, 'Malaysia', 'MY', 1, NULL, '2020-05-09 17:44:26'),
(138, 'Maldives', 'MV', 1, NULL, '2020-05-09 17:44:26'),
(139, 'Mali', 'ML', 1, NULL, '2020-05-09 17:44:26'),
(140, 'Malta', 'MT', 1, NULL, '2020-05-09 17:44:26'),
(141, 'Marshall Islands', 'MH', 1, NULL, '2020-05-09 17:44:26'),
(142, 'Martinique', 'MQ', 1, NULL, '2020-05-09 17:44:26'),
(143, 'Mauritania', 'MR', 1, NULL, '2020-05-09 17:44:26'),
(144, 'Mauritius', 'MU', 1, NULL, '2020-05-09 17:44:26'),
(145, 'Mayotte', 'YT', 1, NULL, '2020-05-09 17:44:26'),
(146, 'Mexico', 'MX', 1, NULL, '2020-05-09 17:44:26'),
(147, 'Micronesia', 'FM', 1, NULL, '2020-05-09 17:44:26'),
(148, 'Moldova', 'MD', 1, NULL, '2020-05-09 17:44:26'),
(149, 'Monaco', 'MC', 1, NULL, '2020-05-09 17:44:26'),
(150, 'Mongolia', 'MN', 1, NULL, '2020-05-09 17:44:26'),
(151, 'Montenegro', 'ME', 1, NULL, '2020-05-09 17:44:26'),
(152, 'Montserrat', 'MS', 1, NULL, '2020-05-09 17:44:26'),
(153, 'Morocco', 'MA', 1, NULL, '2020-05-09 17:44:26'),
(154, 'Mozambique', 'MZ', 1, NULL, '2020-05-09 17:44:26'),
(155, 'Myanmar [Burma]', 'MM', 1, NULL, '2020-05-09 17:44:26'),
(156, 'Namibia', 'NA', 1, NULL, '2020-05-09 17:44:26'),
(157, 'Nauru', 'NR', 1, NULL, '2020-05-09 17:44:26'),
(158, 'Nepal', 'NP', 1, NULL, '2020-05-09 17:44:26'),
(159, 'Netherlands', 'NL', 1, NULL, '2020-05-09 17:44:26'),
(160, 'New Caledonia', 'NC', 1, NULL, '2020-05-09 17:44:26'),
(161, 'New Zealand', 'NZ', 1, NULL, '2020-05-09 17:44:26'),
(162, 'Nicaragua', 'NI', 1, NULL, '2020-05-09 17:44:26'),
(163, 'Niger', 'NE', 1, NULL, '2020-05-09 17:44:26'),
(164, 'Nigeria', 'NG', 1, NULL, '2020-05-09 17:44:26'),
(165, 'Niue', 'NU', 1, NULL, '2020-05-09 17:44:26'),
(166, 'Norfolk Island', 'NF', 1, NULL, '2020-05-09 17:44:26'),
(167, 'North Korea', 'KP', 1, NULL, '2020-05-09 17:44:26'),
(168, 'Northern Mariana Islands', 'MP', 1, NULL, '2020-05-09 17:44:26'),
(169, 'Norway', 'NO', 1, NULL, '2020-05-09 17:44:26'),
(170, 'Oman', 'OM', 1, NULL, '2020-05-09 17:44:26'),
(171, 'Pakistan', 'PK', 1, NULL, '2020-05-09 17:44:26'),
(172, 'Palau', 'PW', 1, NULL, '2020-05-09 17:44:26'),
(173, 'Palestine', 'PS', 1, NULL, '2020-05-09 17:44:26'),
(174, 'Panama', 'PA', 1, NULL, '2020-05-09 17:44:26'),
(175, 'Papua New Guinea', 'PG', 1, NULL, '2020-05-09 17:44:26'),
(176, 'Paraguay', 'PY', 1, NULL, '2020-05-09 17:44:26'),
(177, 'Peru', 'PE', 1, NULL, '2020-05-09 17:44:26'),
(178, 'Philippines', 'PH', 1, NULL, '2020-05-09 17:44:26'),
(179, 'Pitcairn Islands', 'PN', 1, NULL, '2020-05-09 17:44:26'),
(180, 'Poland', 'PL', 1, NULL, '2020-05-09 17:44:26'),
(181, 'Portugal', 'PT', 1, NULL, '2020-05-09 17:44:26'),
(182, 'Puerto Rico', 'PR', 1, NULL, '2020-05-09 17:44:26'),
(183, 'Qatar', 'QA', 1, NULL, '2020-05-09 17:44:26'),
(184, 'Republic of the Congo', 'CG', 1, NULL, '2020-05-09 17:44:26'),
(185, 'Réunion', 'RE', 1, NULL, '2020-05-09 17:44:26'),
(186, 'Romania', 'RO', 1, NULL, '2020-05-09 17:44:26'),
(187, 'Russia', 'RU', 1, NULL, '2020-05-09 17:44:26'),
(188, 'Rwanda', 'RW', 1, NULL, '2020-05-09 17:44:26'),
(189, 'Saint Barthélemy', 'BL', 1, NULL, '2020-05-09 17:44:26'),
(190, 'Saint Helena', 'SH', 1, NULL, '2020-05-09 17:44:26'),
(191, 'Saint Kitts and Nevis', 'KN', 1, NULL, '2020-05-09 17:44:26'),
(192, 'Saint Lucia', 'LC', 1, NULL, '2020-05-09 17:44:26'),
(193, 'Saint Martin', 'MF', 1, NULL, '2020-05-09 17:44:26'),
(194, 'Saint Pierre and Miquelon', 'PM', 1, NULL, '2020-05-09 17:44:26'),
(195, 'Saint Vincent and the Grenadines', 'VC', 1, NULL, '2020-05-09 17:44:26'),
(196, 'Samoa', 'WS', 1, NULL, '2020-05-09 17:44:26'),
(197, 'San Marino', 'SM', 1, NULL, '2020-05-09 17:44:26'),
(198, 'São Tomé and Príncipe', 'ST', 1, NULL, '2020-05-09 17:44:26'),
(199, 'Saudi Arabia', 'SA', 1, NULL, '2020-05-09 17:44:26'),
(200, 'Senegal', 'SN', 1, NULL, '2020-05-09 17:44:26'),
(201, 'Serbia', 'RS', 1, NULL, '2020-05-09 17:44:26'),
(202, 'Seychelles', 'SC', 1, NULL, '2020-05-09 17:44:26'),
(203, 'Sierra Leone', 'SL', 1, NULL, '2020-05-09 17:44:26'),
(204, 'Singapore', 'SG', 1, NULL, '2020-05-09 17:44:26'),
(205, 'Sint Maarten', 'SX', 1, NULL, '2020-05-09 17:44:26'),
(206, 'Slovakia', 'SK', 1, NULL, '2020-05-09 17:44:26'),
(207, 'Slovenia', 'SI', 1, NULL, '2020-05-09 17:44:26'),
(208, 'Solomon Islands', 'SB', 1, NULL, '2020-05-09 17:44:26'),
(209, 'Somalia', 'SO', 1, NULL, '2020-05-09 17:44:26'),
(210, 'South Africa', 'ZA', 1, NULL, '2020-05-09 17:44:26'),
(211, 'South Georgia and the South Sandwich Islands', 'GS', 1, NULL, '2020-05-09 17:44:26'),
(212, 'South Korea', 'KR', 1, NULL, '2020-05-09 17:44:26'),
(213, 'South Sudan', 'SS', 1, NULL, '2020-05-09 17:44:26'),
(214, 'Spain', 'ES', 1, NULL, '2020-05-09 17:44:26'),
(215, 'Sri Lanka', 'LK', 1, NULL, '2020-05-09 17:44:26'),
(216, 'Sudan', 'SD', 1, NULL, '2020-05-09 17:44:26'),
(217, 'Suriname', 'SR', 1, NULL, '2020-05-09 17:44:26'),
(218, 'Svalbard and Jan Mayen', 'SJ', 1, NULL, '2020-05-09 17:44:26'),
(219, 'Swaziland', 'SZ', 1, NULL, '2020-05-09 17:44:26'),
(220, 'Sweden', 'SE', 1, NULL, '2020-05-09 17:44:26'),
(221, 'Switzerland', 'CH', 1, NULL, '2020-05-09 17:44:26'),
(222, 'Syria', 'SY', 1, NULL, '2020-05-09 17:44:26'),
(223, 'Taiwan', 'TW', 1, NULL, '2020-05-09 17:44:26'),
(224, 'Tajikistan', 'TJ', 1, NULL, '2020-05-09 17:44:26'),
(225, 'Tanzania', 'TZ', 1, NULL, '2020-05-09 17:44:26'),
(226, 'Thailand', 'TH', 1, NULL, '2020-05-09 17:44:26'),
(227, 'Togo', 'TG', 1, NULL, '2020-05-09 17:44:26'),
(228, 'Tokelau', 'TK', 1, NULL, '2020-05-09 17:44:26'),
(229, 'Tonga', 'TO', 1, NULL, '2020-05-09 17:44:26'),
(230, 'Trinidad and Tobago', 'TT', 1, NULL, '2020-05-09 17:44:26'),
(231, 'Tunisia', 'TN', 1, NULL, '2020-05-09 17:44:26'),
(232, 'Turkey', 'TR', 1, NULL, '2020-05-09 17:44:26'),
(233, 'Turkmenistan', 'TM', 1, NULL, '2020-05-09 17:44:26'),
(234, 'Turks and Caicos Islands', 'TC', 1, NULL, '2020-05-09 17:44:26'),
(235, 'Tuvalu', 'TV', 1, NULL, '2020-05-09 17:44:26'),
(236, 'U.S. Minor Outlying Islands', 'UM', 1, NULL, '2020-05-09 17:44:26'),
(237, 'U.S. Virgin Islands', 'VI', 1, NULL, '2020-05-09 17:44:26'),
(238, 'Uganda', 'UG', 1, NULL, '2020-05-09 17:44:26'),
(239, 'Ukraine', 'UA', 1, NULL, '2020-05-09 17:44:26'),
(240, 'United Arab Emirates', 'AE', 1, NULL, '2020-05-09 17:44:26'),
(241, 'United Kingdom', 'GB', 1, NULL, '2020-05-09 17:44:26'),
(242, 'United States', 'US', 1, NULL, '2020-05-09 17:44:26'),
(243, 'Uruguay', 'UY', 1, NULL, '2020-05-09 17:44:26'),
(244, 'Uzbekistan', 'UZ', 1, NULL, '2020-05-09 17:44:26'),
(245, 'Vanuatu', 'VU', 1, NULL, '2020-05-09 17:44:26'),
(246, 'Vatican City', 'VA', 1, NULL, '2020-05-09 17:44:26'),
(247, 'Venezuela', 'VE', 1, NULL, '2020-05-09 17:44:26'),
(248, 'Vietnam', 'VN', 1, NULL, '2020-05-09 17:44:26'),
(249, 'Wallis and Futuna', 'WF', 1, NULL, '2020-05-09 17:44:26'),
(250, 'Western Sahara', 'EH', 1, NULL, '2020-05-09 17:44:26'),
(251, 'Yemen', 'YE', 1, NULL, '2020-05-09 17:44:26'),
(252, 'Zambia', 'ZM', 1, NULL, '2020-05-09 17:44:26'),
(253, 'Zimbabwe', 'ZW', 1, NULL, '2020-05-09 17:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `currency_id` int NOT NULL,
  `currency_code` varchar(5) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(256) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`currency_id`, `currency_code`, `active`, `narrative`, `time_stamp`) VALUES
(1, 'KES', 1, 'Kenya Shillings', '2019-11-18 15:23:44'),
(3, 'Pound', 1, '£ - Pounds', '2019-11-20 05:35:53'),
(4, 'Dolla', 1, '$', '2022-02-03 15:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `db_backups`
--

CREATE TABLE `db_backups` (
  `id` int NOT NULL,
  `backup_name` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_backups`
--

INSERT INTO `db_backups` (`id`, `backup_name`, `time_stamp`) VALUES
(1, 'backup-on-2021-06-15-13-42-33.zip', '2021-06-15 10:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `deductibles`
--

CREATE TABLE `deductibles` (
  `deductible_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `deductible_name` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(50) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departmental_heads`
--

CREATE TABLE `departmental_heads` (
  `departmental_head_id` int NOT NULL,
  `department_id` int NOT NULL,
  `entity_id` int NOT NULL,
  `current` tinyint(1) NOT NULL DEFAULT '1',
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departmental_heads`
--

INSERT INTO `departmental_heads` (`departmental_head_id`, `department_id`, `entity_id`, `current`, `from_date`, `to_date`, `time_stamp`) VALUES
(1, 1, 4, 0, '2020-03-14', '2020-03-16', '2020-03-15 05:55:10'),
(2, 1, 61, 1, '2022-03-09', '2022-04-07', '2022-03-18 10:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `station_id` int NOT NULL,
  `department_name` varchar(156) NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `narrative` varchar(156) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `org_id`, `station_id`, `department_name`, `active`, `narrative`, `time_stamp`) VALUES
(1, 1, 1, 'Default', 1, 'Test test', '2020-02-16 07:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `designation_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `designation_name` varchar(30) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(100) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`designation_id`, `org_id`, `designation_name`, `active`, `narrative`, `time_stamp`) VALUES
(3, 1, 'Administrator', 1, 'Administrator', '2021-05-17 05:57:51'),
(4, 1, 'Director', 1, 'Director', '2021-05-17 05:58:12'),
(5, 1, 'Manager', 1, 'Manager', '2021-05-17 05:58:27'),
(6, 1, 'Clerk', 1, 'Clerk', '2021-05-17 05:58:40'),
(7, 1, 'Cashier', 1, 'Cashier', '2021-05-17 05:59:03'),
(8, 1, 'Secretary', 1, 'Secretary', '2021-05-17 05:59:23'),
(9, 1, 'Teacher', 1, 'Teacher', '2021-05-17 06:00:17'),
(10, 1, 'Other', 1, '', '2021-05-19 06:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `eating_tables`
--

CREATE TABLE `eating_tables` (
  `eating_table_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `eating_table_name` varchar(30) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(50) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eating_tables`
--

INSERT INTO `eating_tables` (`eating_table_id`, `org_id`, `eating_table_name`, `active`, `narrative`, `time_stamp`) VALUES
(1, 1, 'TA', 1, '', '2020-10-14 20:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int NOT NULL,
  `org_id` tinyint(1) NOT NULL DEFAULT '1',
  `designation_id` int NOT NULL,
  `department_id` int NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `second_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_number` int NOT NULL,
  `primary_phone` varchar(12) DEFAULT NULL,
  `secondary_phone` varchar(12) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `employment_number` varchar(20) DEFAULT NULL,
  `disability` tinyint(1) NOT NULL DEFAULT '0',
  `marital_status` varchar(20) DEFAULT NULL,
  `kra_pin` varchar(20) DEFAULT NULL,
  `nssf` int DEFAULT NULL,
  `nhif` int DEFAULT NULL,
  `job_grade` varchar(10) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `leaving_date` date DEFAULT NULL,
  `basic_salary` double DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `narrative` varchar(100) DEFAULT NULL,
  `nhif_amount` decimal(18,2) NOT NULL,
  `nssf_amount` decimal(18,2) NOT NULL,
  `tax_relief_amount` decimal(18,2) NOT NULL,
  `insurance_relief_amount` decimal(18,2) NOT NULL,
  `paye` decimal(18,2) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `org_id`, `designation_id`, `department_id`, `first_name`, `second_name`, `last_name`, `email`, `id_number`, `primary_phone`, `secondary_phone`, `dob`, `gender`, `address`, `employment_number`, `disability`, `marital_status`, `kra_pin`, `nssf`, `nhif`, `job_grade`, `joining_date`, `leaving_date`, `basic_salary`, `active`, `narrative`, `nhif_amount`, `nssf_amount`, `tax_relief_amount`, `insurance_relief_amount`, `paye`, `time_stamp`) VALUES
(1, 1, 4, 1, 'JANET', 'MBAIKA', 'KIOKO', 'janetmkioko@gmail.com', 2983092, '0722859140', '', '1968-10-10', 'F', '5268', '', 0, 'Married', '', 0, 0, '', '2008-01-01', '0000-00-00', 80000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-17 06:11:26'),
(2, 1, 5, 1, 'SHEDS', 'JIMMY', 'MBITHI', 'shedsjimmy18@gmail.com', 9711240, '0722693980', '', '1969-10-10', 'M', '5268', '', 0, 'Married', '', 46620491, 9711240, '', '2008-01-01', '0000-00-00', 52000, 1, '', '1200.00', '200.00', '0.00', '0.00', '0.00', '2021-05-19 03:16:30'),
(3, 1, 9, 1, 'EVANS', 'KENYATTA', 'OBINGA', 'eobinga@yahoo.com', 22323353, '0710716856', '', '1975-10-10', 'M', '5268', '', 0, 'Married', '', 0, 20044618, '', '0000-00-00', '0000-00-00', 31300, 1, '', '900.00', '200.00', '0.00', '0.00', '0.00', '2021-05-19 05:54:49'),
(4, 1, 10, 1, 'DALMUS', 'MUKWAMBO', 'LIAMBIRA', 'MUKWAMBODALMUS84@GMAIL.COM', 27405478, '072546874', '', '1980-10-10', 'M', '5268', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 25000, 1, '', '850.00', '200.00', '0.00', '0.00', '0.00', '2021-05-19 06:11:39'),
(5, 1, 9, 1, 'NELSON', 'OPINDI', 'OROBO', 'nelsonopindi20@gmail.com', 26137726, '0790708815', '', '1985-10-10', 'M', '5268', '', 0, 'Married', '', 0, 0, '', '2010-01-01', '0000-00-00', 28000, 1, '', '0.00', '200.00', '0.00', '0.00', '0.00', '2021-05-19 06:16:00'),
(6, 1, 9, 1, 'PETER', '', 'OTIENO', 'PETERNYAMGERO@GMAIL.COM', 25058591, '0704957190', '', '1988-01-01', 'M', '5268', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 23000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 06:18:05'),
(7, 1, 9, 1, 'EDWARDS', '', 'JOSHUA', 'EDWARD@MAIL.COM', 25797274, '0738966799', '', '1990-01-01', 'M', '', '', 0, 'Single', '', 0, 0, '', '2021-01-01', '0000-00-00', 22000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 06:22:11'),
(8, 1, 9, 1, 'OYUYO', 'FARUQ', '', 'OYUKSFRASHA@GMAIL.COM', 33181698, '0759871016', '', '1980-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 21000, 0, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 06:26:48'),
(9, 1, 9, 1, 'YVONNE', 'SAMIRA', 'AKULA', 'YVONNESAMARIA@GMAIL.COM', 30948098, '0735096097', '', '1990-04-04', 'F', '5268', '', 0, 'Married', '', 530928825, 7022933, '', '0000-00-00', '0000-00-00', 18000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 06:29:06'),
(10, 1, 8, 1, 'NAMAWANGA', 'N', 'MARGARET', 'natonyamaggret@gmail.com', 20093879, '0724340039', '', '1978-02-10', 'F', '5268', '', 0, 'Married', '', 704569817, 0, '', '2008-01-01', '0000-00-00', 23000, 1, '', '750.00', '200.00', '0.00', '0.00', '0.00', '2021-05-19 06:31:51'),
(11, 1, 10, 1, 'BRADSON', '', 'ANYANGA', 'BRANDSONANYANGA@GMAIL.COM', 2872324, '0700528164', '', '1982-04-04', 'M', '5268', '', 0, 'Single', '', 0, 0, '', '2021-01-01', '0000-00-00', 18000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 06:37:22'),
(12, 1, 9, 1, 'KELVIN', 'NYANJE', 'KARISA', 'NYANJEKELVINK3@MAIL.COM', 21733458, '0717620743', '', '1979-07-27', 'M', '5268', '', 0, 'Single', '', 827190913, 1957635, '', '2010-01-01', '0000-00-00', 20500, 1, '', '850.00', '200.00', '0.00', '0.00', '0.00', '2021-05-19 06:42:20'),
(13, 1, 9, 1, 'DUNCAN', '', 'OMOTTO', 'DANEANOMOTTO24@GMAIL.COM', 28336825, '0769130833', '', '1991-10-10', 'M', '', '', 0, 'Married', '', 362233918, 0, '', '2015-10-10', '0000-00-00', 20000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 06:47:14'),
(14, 1, 10, 1, 'LEAH', 'CENSUS', 'AYOTI', 'LEAHCENSUS@GMAIL.COM', 27469373, '0708824886', '', '1990-10-10', 'M', '', '', 0, 'Single', '', 446899828, 3775219, '', '0000-00-00', '0000-00-00', 16000, 0, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 06:49:47'),
(15, 1, 10, 1, 'NYANDORO', 'EVERLYNE', '', 'NYANDOEVE@GMAIL.COM', 25598552, '0729824320', '', '1990-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '2021-01-01', '0000-00-00', 16000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 06:51:21'),
(16, 1, 9, 1, 'CAROLYNE', '', 'ODHIAMBO', 'odhiAMBO@MAIL.COM', 32426447, '0792873594', '', '1995-08-28', 'M', '5268', '', 0, 'Married', '', 2008830077, 0, '', '2021-01-01', '0000-00-00', 16000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 06:58:06'),
(17, 1, 9, 1, 'FAITH', 'JENIPHER', 'WAKESHO', 'AMANIFAITH66@GMAIL.COM', 30924779, '0798547010', '', '1994-01-13', 'F', '5268', '', 0, 'Single', '', 0, 4541486, '', '2018-01-01', '0000-00-00', 17250, 1, '', '600.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 06:59:50'),
(18, 1, 9, 1, 'DEFENCE', 'CHAO', 'MWAKIO', 'DEFENCE@MAIL.COM', 21279027, '0712164502', '', '1990-10-10', 'F', '', '', 0, 'Married', '', 0, 3174141, '', '2020-01-01', '0000-00-00', 17000, 1, '', '600.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 07:01:53'),
(19, 1, 9, 1, 'EDINAR', 'NGOLI', 'MWANZAME', 'NGOLIEDINAR@GMAIL.COM', 21772519, '0726431467', '', '1990-10-10', 'F', '', '', 0, 'Single', '', 0, 0, '', '2021-01-01', '0000-00-00', 15000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 07:03:38'),
(20, 1, 9, 1, 'GEORGE', 'OKUTOYI', 'TOBOSO', 'tobosogeorge67@gmail.com', 26992175, '0702809634', '', '1988-07-27', 'M', '5268', '', 0, 'Single', '', 0, 0, '', '2015-10-10', '0000-00-00', 17000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 07:07:33'),
(21, 1, 10, 1, 'MUTUKU', 'MUTISYA', 'MUTISYA', 'MUTUKU@MAIL.COM', 265656, '0723032057', '', '1977-07-01', 'M', '5268', '', 0, 'Married', '', 989139913, 14525533, '', '0000-00-00', '0000-00-00', 19000, 1, '', '600.00', '200.00', '0.00', '0.00', '0.00', '2021-05-19 07:09:23'),
(22, 1, 10, 1, 'DOROTHY', 'VILITA', 'JOHN', 'DOROTHY@MAIL.COM', 13252102, '0718945170', '', '1974-05-20', 'F', '5268', '', 0, 'Single', '', 0, 0, '', '2019-01-01', '0000-00-00', 18000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 07:15:21'),
(23, 1, 9, 1, 'CAROLYNE', 'ATIENO', 'OKELLO', 'atienoc74@gmail.com', 5465456, '0711870092', '', '1989-07-27', 'F', '5268', '', 0, 'Married', '', 0, 0, '', '2017-01-01', '0000-00-00', 16000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 07:17:32'),
(24, 1, 10, 1, 'JUDY', 'KIMEU', 'KIMEU', 'JUDITH@MAIL.COM', 555666, '07565465565', '', '1990-10-10', 'M', '', '', 0, 'Married', '', 0, 0, '', '0000-00-00', '0000-00-00', 17000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 08:54:19'),
(25, 1, 10, 1, 'PERIS', 'NJOROGE', 'MUTHONI', 'PERIS@MAIL.COM', 8656248, '0725782453', '', '1990-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 15750, 1, '', '600.00', '200.00', '0.00', '0.00', '0.00', '2021-05-19 08:55:58'),
(26, 1, 10, 1, 'CECILIA', 'MBUCHE', 'MTSONGA', 'CECILIA@MAIL.COM', 5665666, '07566656', '', '1980-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 13000, 0, '', '600.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 08:59:36'),
(27, 1, 10, 1, 'MARGARET', 'KACHE', 'KAZUNGU', 'MAGGREKACHE@GMAIL.COM', 30962116, '0748480844', '', '1990-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 13000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 09:01:35'),
(28, 1, 9, 1, 'MARY', 'MBODZE', 'NZARO', 'MARY@MAIL.COM', 33336487, '0792360195', '', '1990-10-10', 'F', '', '', 0, 'Single', '', 2012445889, 6306613, '', '0000-00-00', '0000-00-00', 15000, 1, '', '500.00', '200.00', '0.00', '0.00', '0.00', '2021-05-19 09:03:00'),
(29, 1, 9, 1, 'GLADYS', '', 'THOYA', 'THOYA@MAIL.COM', 55665656, '076656665', '', '1993-10-10', 'F', '5268', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 14000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 09:27:44'),
(30, 1, 10, 1, 'SHAABAN', 'MAJALIWA', 'MAJALIWA', 'SHAABAN@MAIL.COM', 5421421, '0714604880', '', '1954-10-10', 'M', '5268', '', 0, 'Married', '', 0, 0, '', '0000-00-00', '0000-00-00', 12500, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 09:38:35'),
(32, 1, 10, 1, 'WYCLIFF', 'BUTICHI', 'LITSUTSA', 'LITSUTSA@MAIL.COM', 23333484, '0727508617', '', '1990-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 13000, 1, '', '500.00', '200.00', '0.00', '0.00', '0.00', '2021-05-19 09:42:14'),
(33, 1, 10, 1, 'ABUDRAHAM', 'BUYA', 'DIBA', 'DIBA@MAIL.COM', 55656526, '0784574522', '', '1990-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 11500, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 09:43:42'),
(34, 1, 10, 1, 'CHRISTINE', '', 'KADZO', 'KADZO@MAIL.COM', 511566566, '0722222333', '', '2000-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 10500, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 10:07:26'),
(35, 1, 10, 1, 'MICHAEL', 'D', 'JOSEPH', 'JOSEPH@MAIL.COM', 546556156, '07556665656', '', '1980-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 9000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 10:10:00'),
(36, 1, 9, 1, 'EDITH', 'REHEMA', 'NGOWA', 'REHEMANGOWA@GMAIL.COM', 27031657, '0714479364', '', '1987-01-01', 'F', '5268', '', 0, 'Married', '', 0, 0, '', '0000-00-00', '0000-00-00', 13500, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 10:11:38'),
(37, 1, 10, 1, 'ELINAH', '', 'GONA', 'ELINAH@MAIL.COM', 2147483647, '0755666565', '', '2000-10-10', 'F', '5268', '', 0, 'Single', '', 0, 0, '', '2021-01-01', '0000-00-00', 11000, 1, '', '400.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 10:13:17'),
(38, 1, 10, 1, 'ENNET', 'HADIDHA', 'HADIDHA', 'ENNET@MAIL.COM', 21427514, '0748210450', '', '1990-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 10500, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 10:14:54'),
(39, 1, 10, 1, 'JAMES', 'KALAMA', 'KALAMA', 'JAMES@MAIL.COM', 55659555, '0787458582', '', '1990-10-10', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 10500, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 10:16:18'),
(41, 1, 10, 1, 'SYRIA', 'MWARUA', 'MWARUA', 'MWARUA@MAIL.COM', 33701832, '0740715587', '', '1990-01-10', 'F', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 10500, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 10:19:06'),
(42, 1, 10, 1, 'GABRIEL', 'KATANA', 'KAVIHA', 'GABRIEL@MAIL.COM', 10669557, '0711111111', '', '1990-10-10', 'M', '5268', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 7000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-05-19 10:22:58'),
(43, 1, 9, 1, 'LAVENDA', 'MBEYU', 'CHIKO', 'mbeyuchiko@mail.com', 30438187, '0724125455', '', '1993-03-31', 'F', '5268', '', 0, 'Married', '', 2011619885, 6306480, '', '2021-01-01', '0000-00-00', 13500, 1, '', '500.00', '200.00', '0.00', '0.00', '0.00', '2021-05-31 10:20:51'),
(44, 1, 6, 1, 'MARTIN', 'NGAO', 'LEWA', 'martinlewa@gmail.com', 22997220, '0724664579', '', '1988-01-01', 'M', '5268', '', 0, 'Single', '', 2026187632, 27997220, '', '0000-00-00', '0000-00-00', 18000, 0, '', '500.00', '200.00', '0.00', '0.00', '0.00', '2021-05-31 12:06:41'),
(45, 1, 9, 1, 'JOHN', 'CHENGO', 'BAYA', 'johnchengo@gmail.com', 27450917, '0745982469', '', '1986-12-07', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 15000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-08-05 07:38:24'),
(49, 1, 9, 1, 'FAITH', 'AWINO', 'OGOLLA', 'faithogolla@mail.com', 3200449, '0798522688', '', '1995-05-24', 'F', '', '', 0, 'Single', '', 2028788533, 14265692, '', '0000-00-00', '0000-00-00', 15000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-08-05 08:09:29'),
(50, 1, 9, 1, 'RAMADHANA', 'SHONO', 'MOHAMED', 'rama@mail.com', 39263650, '0757971366', '', '1995-09-13', 'F', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 15000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-08-05 09:48:40'),
(51, 1, 9, 1, 'ROSEMARY', 'ACHIENG', 'BUNDE', 'rozyachiengebundez@gmail.com', 30651527, '0716350486', '', '1992-08-08', 'F', '', '', 0, 'Single', 'A010674372Y', 200912403, 16429280, '', '0000-00-00', '0000-00-00', 17000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-08-24 05:58:12'),
(52, 1, 10, 1, 'MBUVI', '', 'MUTHAMI', 'mbuvimuthami2019@gmail.com', 10434446, '0726356226', '', '1970-01-01', 'M', '', '', 0, 'Single', 'A014274789F', 0, 0, '', '0000-00-00', '0000-00-00', 15000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-09-01 13:18:57'),
(53, 1, 6, 1, 'JOHN', 'KAHINDI', 'ABDALLA', 'john.studio2030@gmail.com', 8459453, '07197312456', '0746812101', '1966-10-28', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 25000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-09-27 15:16:21'),
(54, 1, 6, 1, 'STEPHEN', 'MUSILI', 'KYALO', 'stevemusili4@gmail.com', 29571117, '0723816038', '', '1998-01-01', 'M', '', '', 0, 'Single', '', 0, 0, '', '0000-00-00', '0000-00-00', 18000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-09-27 15:21:39'),
(55, 1, 9, 1, 'EMMACULATE', 'MBODZE', 'MATEMBO', 'matembo69@gmail.com', 30285511, '0708416097', '', '1992-09-12', 'F', '', '', 0, 'Married', 'A008620088Z', 2003415595, 15316548, '', '0000-00-00', '0000-00-00', 15000, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '2022-02-08 13:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `employee_allowances`
--

CREATE TABLE `employee_allowances` (
  `employee_allowance_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `allowance_id` int NOT NULL,
  `allowance_amount` double NOT NULL,
  `is_one_time` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(50) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_allowances`
--

INSERT INTO `employee_allowances` (`employee_allowance_id`, `employee_id`, `allowance_id`, `allowance_amount`, `is_one_time`, `active`, `narrative`, `time_stamp`) VALUES
(1, 2, 6, 8000, 0, 1, '', '2021-05-19 03:31:08'),
(2, 3, 6, 5000, 0, 1, '', '2021-05-19 06:07:53'),
(3, 5, 6, 5000, 0, 1, '', '2021-05-19 06:16:29'),
(4, 10, 6, 5000, 0, 1, '', '2021-05-19 06:32:14'),
(5, 12, 6, 7000, 0, 1, '', '2021-05-19 06:45:09'),
(6, 14, 6, 2000, 0, 1, '', '2021-05-19 06:50:01'),
(8, 21, 6, 3000, 0, 1, '', '2021-05-19 07:09:36'),
(9, 24, 6, 2000, 0, 1, '', '2021-05-19 08:54:37'),
(10, 25, 6, 3500, 0, 1, '', '2021-05-19 08:56:21'),
(11, 26, 6, 2000, 0, 1, '', '2021-05-19 08:59:55'),
(12, 29, 6, 2000, 0, 1, '', '2021-05-19 09:28:03'),
(13, 30, 6, 2500, 0, 1, '', '2021-05-19 09:38:50'),
(14, 32, 6, 2000, 0, 1, '', '2021-05-19 09:42:32'),
(15, 33, 6, 2500, 0, 1, '', '2021-05-19 09:43:58'),
(16, 38, 6, 1500, 0, 1, '', '2021-05-19 10:15:06'),
(17, 39, 6, 2000, 0, 1, '', '2021-05-19 10:16:30'),
(18, 41, 6, 2500, 0, 1, '', '2021-05-19 10:19:21'),
(19, 11, 6, 3000, 0, 1, 'Boarding master allowance', '2022-01-31 09:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `employee_bank_details`
--

CREATE TABLE `employee_bank_details` (
  `employee_bank_detail_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `branch_name` varchar(50) DEFAULT NULL,
  `branch_code` varchar(30) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `employee_deductible_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `deductible_id` int NOT NULL,
  `deductible_amount` double NOT NULL,
  `is_one_time` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(50) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_deductibles`
--

INSERT INTO `employee_deductibles` (`employee_deductible_id`, `employee_id`, `deductible_id`, `deductible_amount`, `is_one_time`, `active`, `narrative`, `time_stamp`) VALUES
(23, 3, 6, 2500, 0, 1, '', '2021-05-20 10:19:39'),
(25, 5, 6, 2500, 0, 1, '', '2021-05-20 10:21:07'),
(27, 11, 6, 2500, 0, 1, '', '2021-05-20 10:23:54'),
(28, 12, 6, 2500, 0, 1, '', '2021-05-20 10:24:37'),
(30, 32, 7, 8000, 0, 1, 'Fees for Emmanuel Butichi', '2021-05-31 11:33:07'),
(32, 3, 4, 8000, 1, 1, 'salary AdvanceJune', '2021-06-11 12:47:20'),
(33, 13, 4, 8000, 1, 1, 'Salary Advance June', '2021-06-11 12:49:39'),
(34, 20, 4, 7000, 1, 1, 'Salary advance', '2021-06-11 12:51:17'),
(35, 11, 4, 8000, 1, 1, 'Salary Advance June', '2021-06-11 12:54:03'),
(36, 6, 4, 8000, 1, 1, 'Salary Advance June', '2021-06-11 13:42:02'),
(39, 21, 4, 5000, 1, 1, 'Salary Advance June', '2021-06-11 13:48:11'),
(40, 12, 4, 8000, 0, 1, 'Salary Advance June', '2021-06-11 13:49:28'),
(42, 29, 4, 7000, 1, 1, 'salary advance June', '2021-06-11 13:55:09'),
(43, 16, 4, 5000, 1, 1, 'SALARY ADVANNCE JUNE', '2021-06-14 13:52:46'),
(44, 17, 4, 8000, 1, 1, 'SALARY ADVANCE', '2021-06-14 13:53:42'),
(45, 28, 4, 5000, 1, 1, 'SALARY ADVANCE', '2021-06-14 14:01:54'),
(46, 18, 4, 7000, 1, 1, 'SALARY ADVANCE', '2021-06-14 14:02:56'),
(47, 15, 4, 7000, 1, 1, 'SALARY ADVANCE', '2021-06-14 14:08:37'),
(48, 9, 4, 8000, 1, 1, 'salary advance', '2021-06-15 07:07:47'),
(49, 19, 4, 7000, 1, 1, 'SALARY ADVANCE', '2021-06-15 07:09:07'),
(50, 39, 4, 2000, 1, 1, 'SALARY ADVANCE', '2021-06-15 07:13:32'),
(52, 42, 4, 2500, 1, 1, 'SALARY ADVANCE', '2021-06-15 07:15:49'),
(53, 32, 4, 1000, 1, 1, 'SALARY ADVANCE', '2021-06-15 07:17:36'),
(66, 33, 4, 6000, 0, 1, 'salary Advance', '2021-08-03 14:19:20'),
(69, 41, 4, 4000, 0, 1, 'SALARY ADVANCE', '2021-08-05 07:08:36'),
(71, 43, 4, 3000, 1, 1, 'SALARY ADVANCE', '2021-08-16 12:34:39'),
(72, 23, 4, 8000, 0, 1, 'SALARY ADVANCE', '2021-08-16 12:44:25'),
(74, 34, 4, 2500, 1, 1, 'SALARY ADVACE AUGUST', '2021-08-17 06:45:31'),
(75, 45, 4, 7500, 1, 1, 'SALARY ADVANCE AUGUST', '2021-08-17 06:52:27'),
(77, 51, 4, 7000, 0, 1, 'Salary Advance', '2021-09-01 10:41:06'),
(78, 30, 4, 2500, 0, 1, '', '2021-09-01 13:09:12'),
(79, 52, 4, 6000, 1, 1, '', '2021-09-01 13:37:20'),
(80, 50, 4, 5000, 1, 1, 'Salary Advance August', '2021-09-14 08:59:46'),
(81, 27, 4, 4000, 0, 1, 'Salary Advance September 2021', '2021-09-14 09:02:09'),
(82, 35, 4, 4500, 0, 1, 'Salary Advance September 2021', '2021-09-14 09:07:27'),
(83, 49, 4, 6000, 0, 1, '', '2021-10-15 07:28:15'),
(84, 54, 4, 9000, 0, 1, '', '2021-10-15 07:29:51'),
(85, 53, 4, 15000, 0, 1, '', '2021-10-15 07:31:32'),
(86, 7, 4, 4000, 0, 1, '', '2021-10-15 08:15:04'),
(90, 22, 4, 7000, 1, 1, '', '2021-12-15 13:11:22'),
(91, 5, 4, 10000, 1, 1, '', '2022-01-17 07:48:55'),
(92, 29, 7, 5400, 0, 1, 'Fees for Bahati Charo Adm . 1222', '2022-01-31 07:45:48'),
(93, 34, 7, 4000, 0, 1, 'Fees for Shani Pendo Adm, 1135', '2022-01-31 07:46:39'),
(94, 27, 7, 5000, 0, 1, 'Fees for Lanisha Campbell Adm. 1158', '2022-01-31 07:48:17'),
(95, 43, 7, 5800, 0, 1, 'Fees for Carl-reiner Mrabu Tune Adm. 1199', '2022-01-31 07:49:48'),
(96, 15, 7, 6400, 0, 1, 'Fees for Carol Kerubo Adm. 1231', '2022-01-31 07:51:08'),
(97, 3, 7, 6900, 0, 1, 'Fees for Sharon Matinde Adm. 747 / Job Obinga Adm.', '2022-01-31 07:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `employee_month`
--

CREATE TABLE `employee_month` (
  `employee_month_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `org_id` int NOT NULL,
  `fiscal_year_id` int NOT NULL,
  `year_month_id` int NOT NULL,
  `is_advance` tinyint(1) NOT NULL DEFAULT '0',
  `is_disbursed` tinyint(1) NOT NULL DEFAULT '0',
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `is_emailed` tinyint(1) NOT NULL DEFAULT '0',
  `doc_no` varchar(30) DEFAULT NULL,
  `basic_salary` double NOT NULL,
  `gross_salary` double NOT NULL,
  `net_salary` double NOT NULL,
  `allowance` double DEFAULT NULL,
  `deductible` double DEFAULT NULL,
  `nssf` double DEFAULT NULL,
  `nhif` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `tax_relief` double NOT NULL DEFAULT '1408',
  `insurance_relief` double DEFAULT NULL,
  `advance_amount` decimal(18,2) NOT NULL,
  `bank_id` int DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `branch_name` varchar(50) DEFAULT NULL,
  `branch_code` int DEFAULT NULL,
  `bank_account_no` varchar(50) DEFAULT NULL,
  `payroll_code` varchar(200) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_month`
--

INSERT INTO `employee_month` (`employee_month_id`, `employee_id`, `org_id`, `fiscal_year_id`, `year_month_id`, `is_advance`, `is_disbursed`, `is_paid`, `is_emailed`, `doc_no`, `basic_salary`, `gross_salary`, `net_salary`, `allowance`, `deductible`, `nssf`, `nhif`, `tax`, `tax_relief`, `insurance_relief`, `advance_amount`, `bank_id`, `bank_name`, `branch_name`, `branch_code`, `bank_account_no`, `payroll_code`, `time_stamp`) VALUES
(1, 1, 1, 7, 4, 0, 1, 1, 0, NULL, 80000, 80000, 80000, 0, 0, 0, 0, 0, 0, 0, '0.00', 2, 'EQUITY', 'MALINDI', 450, '0450192090353', '202204071401070.2133', '2022-04-07 11:01:07'),
(2, 2, 1, 7, 4, 0, 1, 1, 0, NULL, 52000, 60000, 58600, 8000, 1400, 200, 1200, 0, 0, 0, '0.00', 3, 'EQUITY', 'MALINDI', 450, '0450191155742', '202204071401070.2133', '2022-04-07 11:01:07'),
(3, 3, 1, 7, 4, 0, 1, 1, 0, NULL, 31300, 36300, 17800, 5000, 18500, 200, 900, 0, 0, 0, '0.00', 5, 'EQUITY', 'MALINDI', 450, '0320190847630', '202204071401070.2133', '2022-04-07 11:01:07'),
(4, 4, 1, 7, 4, 0, 1, 1, 0, NULL, 25000, 25000, 23950, 0, 1050, 200, 850, 0, 0, 0, '0.00', 22, 'EQUITY', 'MALINDI', 450, '0680196881101', '202204071401070.2133', '2022-04-07 11:01:07'),
(5, 5, 1, 7, 4, 0, 1, 1, 0, NULL, 28000, 33000, 20300, 5000, 12700, 200, 0, 0, 0, 0, '0.00', 4, 'EQUITY', 'MALINDI', 450, '0450179221085', '202204071401070.2133', '2022-04-07 11:01:07'),
(6, 6, 1, 7, 4, 0, 1, 1, 0, NULL, 23000, 23000, 15000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 24, 'EQUITY', 'MALINDI', 450, '0700198346614', '202204071401070.2133', '2022-04-07 11:01:07'),
(7, 7, 1, 7, 4, 0, 1, 1, 0, NULL, 22000, 22000, 18000, 0, 4000, 0, 0, 0, 0, 0, '0.00', 6, 'EQUITY', 'MALINDI', 450, '0450167005682', '202204071401070.2133', '2022-04-07 11:01:07'),
(8, 9, 1, 7, 4, 0, 1, 1, 0, NULL, 18000, 18000, 10000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 7, 'EQUITY', 'MALINDI', 450, '0450180432032', '202204071401070.2133', '2022-04-07 11:01:07'),
(9, 10, 1, 7, 4, 0, 1, 1, 0, NULL, 23000, 28000, 27050, 5000, 950, 200, 750, 0, 0, 0, '0.00', 20, 'EQUITY', 'MALINDI', 450, '0450194699228', '202204071401070.2133', '2022-04-07 11:01:07'),
(10, 11, 1, 7, 4, 0, 1, 1, 0, NULL, 18000, 21000, 10500, 3000, 10500, 0, 0, 0, 0, 0, '0.00', 23, 'EQUITY', 'MALINDI', 450, '0680160486814', '202204071401070.2133', '2022-04-07 11:01:07'),
(11, 12, 1, 7, 4, 0, 1, 1, 0, NULL, 20500, 27500, 15950, 7000, 11550, 200, 850, 0, 0, 0, '0.00', 16, 'EQUITY', 'MALINDI', 450, '0450191915281', '202204071401070.2133', '2022-04-07 11:01:07'),
(12, 13, 1, 7, 4, 0, 1, 1, 0, NULL, 20000, 20000, 12000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 21, 'EQUITY', 'MALINDI', 450, '0450166623178', '202204071401070.2133', '2022-04-07 11:01:07'),
(13, 15, 1, 7, 4, 0, 1, 1, 0, NULL, 16000, 16000, 2600, 0, 13400, 0, 0, 0, 0, 0, '0.00', 30, 'EQUITY', 'MALINDI', 450, '0450168991334', '202204071401070.2133', '2022-04-07 11:01:07'),
(14, 16, 1, 7, 4, 0, 1, 1, 0, NULL, 16000, 16000, 11000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 10, 'EQUITY', 'MALINDI', 450, '7770171376008', '202204071401070.2133', '2022-04-07 11:01:07'),
(15, 17, 1, 7, 4, 0, 1, 1, 0, NULL, 17250, 17250, 8650, 0, 8600, 0, 600, 0, 0, 0, '0.00', 18, 'EQUITY', 'MALINDI', 450, '0450178817669', '202204071401070.2133', '2022-04-07 11:01:07'),
(16, 18, 1, 7, 4, 0, 1, 1, 0, NULL, 17000, 17000, 9400, 0, 7600, 0, 600, 0, 0, 0, '0.00', 29, 'EQUITY', 'MALINDI', 450, '0450194001611', '202204071401070.2133', '2022-04-07 11:01:07'),
(17, 19, 1, 7, 4, 0, 1, 1, 0, NULL, 15000, 15000, 8000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 31, 'EQUITY', 'MALINDI', 450, '0450180432401', '202204071401070.2133', '2022-04-07 11:01:07'),
(18, 20, 1, 7, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 17, 'EQUITY', 'MALINDI', 450, '0680197086407', '202204071401070.2133', '2022-04-07 11:01:07'),
(19, 21, 1, 7, 4, 0, 1, 1, 0, NULL, 19000, 22000, 16200, 3000, 5800, 200, 600, 0, 0, 0, '0.00', 12, 'EQUITY', 'MALINDI', 450, '0020100050416', '202204071401070.2133', '2022-04-07 11:01:07'),
(20, 22, 1, 7, 4, 0, 1, 1, 0, NULL, 18000, 18000, 11000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 19, 'EQUITY', 'MALINDI', 450, '0450192360751', '202204071401070.2133', '2022-04-07 11:01:07'),
(21, 23, 1, 7, 4, 0, 1, 1, 0, NULL, 16000, 16000, 8000, 0, 8000, 0, 0, 0, 0, 0, '0.00', 26, 'EQUITY', 'MALINDI', 450, '0450199781706', '202204071401070.2133', '2022-04-07 11:01:07'),
(22, 24, 1, 7, 4, 0, 1, 1, 0, NULL, 17000, 19000, 19000, 2000, 0, 0, 0, 0, 0, 0, '0.00', 9, 'EQUITY', 'MALINDI', 450, '0670197383599', '202204071401070.2133', '2022-04-07 11:01:07'),
(23, 25, 1, 7, 4, 0, 1, 1, 0, NULL, 15750, 19250, 18450, 3500, 800, 200, 600, 0, 0, 0, '0.00', 8, 'EQUITY', 'MALINDI', 450, '0450191451729', '202204071401070.2133', '2022-04-07 11:01:07'),
(24, 27, 1, 7, 4, 0, 1, 1, 0, NULL, 13000, 13000, 4000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 41, 'EQUITY', 'MALINDI', 450, '0450180550774', '202204071401070.2133', '2022-04-07 11:01:07'),
(25, 28, 1, 7, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9300, 0, 5700, 200, 500, 0, 0, 0, '0.00', 28, 'EQUITY', 'MALINDI', 450, '7770180627962', '202204071401070.2133', '2022-04-07 11:01:07'),
(26, 29, 1, 7, 4, 0, 1, 1, 0, NULL, 14000, 16000, 3600, 2000, 12400, 0, 0, 0, 0, 0, '0.00', 27, 'EQUITY', 'MALINDI', 450, '0450167877433', '202204071401070.2133', '2022-04-07 11:01:07'),
(27, 30, 1, 7, 4, 0, 1, 1, 0, NULL, 12500, 15000, 12500, 2500, 2500, 0, 0, 0, 0, 0, '0.00', 13, 'EQUITY', 'MALINDI', 450, '0450169983687', '202204071401070.2133', '2022-04-07 11:01:07'),
(28, 32, 1, 7, 4, 0, 1, 1, 0, NULL, 13000, 15000, 5300, 2000, 9700, 200, 500, 0, 0, 0, '0.00', 32, 'EQUITY', 'MALINDI', 450, '0450179667339', '202204071401070.2133', '2022-04-07 11:01:07'),
(29, 33, 1, 7, 4, 0, 1, 1, 0, NULL, 11500, 14000, 8000, 2500, 6000, 0, 0, 0, 0, 0, '0.00', 11, 'EQUITY', 'MALINDI', 450, '0450177057343', '202204071401070.2133', '2022-04-07 11:01:07'),
(30, 34, 1, 7, 4, 0, 1, 1, 0, NULL, 10500, 10500, 4000, 0, 6500, 0, 0, 0, 0, 0, '0.00', 37, 'EQUITY', 'MALINDI', 450, '0450180816363', '202204071401070.2133', '2022-04-07 11:01:07'),
(31, 35, 1, 7, 4, 0, 1, 1, 0, NULL, 9000, 9000, 4500, 0, 4500, 0, 0, 0, 0, 0, '0.00', 39, 'EQUITY', 'MALINDI', 450, '0450180993735', '202204071401070.2133', '2022-04-07 11:01:07'),
(32, 36, 1, 7, 4, 0, 1, 1, 0, NULL, 13500, 13500, 13500, 0, 0, 0, 0, 0, 0, 0, '0.00', 15, 'EQUITY', 'MALINDI', 450, '0450197935517', '202204071401070.2133', '2022-04-07 11:01:07'),
(33, 37, 1, 7, 4, 0, 1, 1, 0, NULL, 11000, 11000, 10600, 0, 400, 0, 400, 0, 0, 0, '0.00', 33, 'EQUITY', 'MALINDI', 450, '0450199696563', '202204071401070.2133', '2022-04-07 11:01:07'),
(34, 38, 1, 7, 4, 0, 1, 1, 0, NULL, 10500, 12000, 12000, 1500, 0, 0, 0, 0, 0, 0, '0.00', 34, 'EQUITY', 'MALINDI', 450, '0450178748857', '202204071401070.2133', '2022-04-07 11:01:07'),
(35, 39, 1, 7, 4, 0, 1, 1, 0, NULL, 10500, 12500, 10500, 2000, 2000, 0, 0, 0, 0, 0, '0.00', 35, 'EQUITY', 'MALINDI', 450, '0450192816842', '202204071401070.2133', '2022-04-07 11:01:07'),
(36, 41, 1, 7, 4, 0, 1, 1, 0, NULL, 10500, 13000, 9000, 2500, 4000, 0, 0, 0, 0, 0, '0.00', 36, 'EQUITY', 'MALINDI', 450, '0450179100757', '202204071401070.2133', '2022-04-07 11:01:07'),
(37, 42, 1, 7, 4, 0, 1, 1, 0, NULL, 7000, 7000, 4500, 0, 2500, 0, 0, 0, 0, 0, '0.00', 38, 'EQUITY', 'MALINDI', 450, '0450180876058', '202204071401070.2133', '2022-04-07 11:01:07'),
(38, 43, 1, 7, 4, 0, 1, 1, 0, NULL, 13500, 13500, 4000, 0, 9500, 200, 500, 0, 0, 0, '0.00', 14, 'EQUITY', 'MALINDI', 450, '0450178973019', '202204071401070.2133', '2022-04-07 11:01:07'),
(39, 45, 1, 7, 4, 0, 1, 1, 0, NULL, 15000, 15000, 7500, 0, 7500, 0, 0, 0, 0, 0, '0.00', 43, 'EQUITY', 'MALINDI', 450, '7770181137704', '202204071401070.2133', '2022-04-07 11:01:07'),
(40, 49, 1, 7, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 42, 'EQUITY', 'MALINDI', 450, '7770179128743', '202204071401070.2133', '2022-04-07 11:01:07'),
(41, 50, 1, 7, 4, 0, 1, 1, 0, NULL, 15000, 15000, 10000, 0, 5000, 0, 0, 0, 0, 0, '0.00', 44, 'EQUITY', 'MALINDI', 450, '0450181139826', '202204071401070.2133', '2022-04-07 11:01:07'),
(42, 51, 1, 7, 4, 0, 1, 1, 0, NULL, 17000, 17000, 10000, 0, 7000, 0, 0, 0, 0, 0, '0.00', 45, 'EQUITY', 'MALINDI', 450, '0450172747031', '202204071401070.2133', '2022-04-07 11:01:07'),
(43, 52, 1, 7, 4, 0, 1, 1, 0, NULL, 15000, 15000, 9000, 0, 6000, 0, 0, 0, 0, 0, '0.00', 46, 'EQUITY', 'MALINDI', 450, '0450181230867', '202204071401070.2133', '2022-04-07 11:01:07'),
(44, 53, 1, 7, 4, 0, 1, 1, 0, NULL, 25000, 25000, 10000, 0, 15000, 0, 0, 0, 0, 0, '0.00', 47, 'EQUITY', 'MALINDI', 450, '0450190950143', '202204071401070.2133', '2022-04-07 11:01:07'),
(45, 54, 1, 7, 4, 0, 1, 1, 0, NULL, 18000, 18000, 9000, 0, 9000, 0, 0, 0, 0, 0, '0.00', 48, 'EQUITY', 'MALINDI', 450, '7770175269298', '202204071401070.2133', '2022-04-07 11:01:07'),
(46, 55, 1, 7, 4, 0, 1, 1, 0, NULL, 15000, 15000, 15000, 0, 0, 0, 0, 0, 0, 0, '0.00', 49, 'EQUITY', 'MALINDI', 450, '0450162564559', '202204071401070.2133', '2022-04-07 11:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `entitys`
--

CREATE TABLE `entitys` (
  `entity_id` int NOT NULL,
  `pin` int DEFAULT NULL,
  `org_id` int NOT NULL,
  `sub_department_id` int DEFAULT '0',
  `activation_code` text,
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
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `status_id` int DEFAULT NULL,
  `system_role` int NOT NULL,
  `super_user` tinyint(1) NOT NULL DEFAULT '0',
  `profile_picture` varchar(256) NOT NULL DEFAULT 'default.png',
  `entity_address` varchar(100) DEFAULT NULL,
  `contact_person_name1` varchar(50) DEFAULT NULL,
  `contact_person_phone1` varchar(50) DEFAULT NULL,
  `contact_person_email1` varchar(50) DEFAULT NULL,
  `contact_person_name2` varchar(50) DEFAULT NULL,
  `contact_person_address1` varchar(100) DEFAULT NULL,
  `contact_person_phone2` varchar(50) DEFAULT NULL,
  `contact_person_email2` varchar(50) DEFAULT NULL,
  `contact_person_address2` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `entitys`
--

INSERT INTO `entitys` (`entity_id`, `pin`, `org_id`, `sub_department_id`, `activation_code`, `entity_name`, `password`, `email`, `firstname`, `secondname`, `lastname`, `phone`, `gender`, `dob`, `id_passport`, `active`, `status_id`, `system_role`, `super_user`, `profile_picture`, `entity_address`, `contact_person_name1`, `contact_person_phone1`, `contact_person_email1`, `contact_person_name2`, `contact_person_address1`, `contact_person_phone2`, `contact_person_email2`, `contact_person_address2`, `time_stamp`) VALUES
(0, NULL, 1, 1, NULL, NULL, '$2y$10$UwNfACh/g3l6BvTMheaGduzmFDYxs/..DdEfMtAFCAFO5rrx2gj76', 'walkin', 'Walk In', '', 'Client', '0700000', NULL, NULL, '', 1, NULL, 3, 0, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-19 13:53:49'),
(1, NULL, 1, 1, NULL, NULL, '$2y$10$bD9HaU2YYWAl4Nx50jGPSe/AN/lg8SijrZct3oK9NB4wWeTAhyXUu', 'admin', 'SA', '', '', '0739698964', NULL, NULL, '', 1, NULL, 1, 1, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-19 13:53:49'),
(2, NULL, 1, 1, NULL, NULL, '$2y$10$/Z1idABwjOBoOwmuiPp3dehcrPsJO9jLfMVhpcT/82wGzxjkpBHe6', 'admin@admin.com', 'Admin', '', '', '0707866136', 'M', '2019-10-31', '6857222', 1, NULL, 1, 1, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-19 13:53:49'),
(38, 1023, 1, 1, '$2y$10$InLvtDPpplkdym1H.NvBhOXk80sxn1rYmZL9V0pQCaiS3EPedjKXO', NULL, '$2y$10$OmxOcslUiRgxT1eRYzGrfe2e.eyUoLYyQDQivC12j0R04ZP.H9fXK', 'ken@gmail.com', 'Ken', 'Lusaka', '', '078515353', 'M', '0000-00-00', '31355665', 1, 1, 7, 0, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-13 03:47:53'),
(41, 3285, 1, 1, '$2y$10$BfbRKfuR5ZoWpLqrCsjkkOmaUAozIumQKzBbq3YiWDx4uOl.NdXMK', 'Citizen', '$2y$10$/pBnp8IJj24Uof71QgeFVOmSyCnbLn5y0AlHXRvpSBgshgxSZyghW', 'robert@gmail.com', 'Robert', 'Alai', '', '0707899695', 'M', '0000-00-00', '323232322', 1, 1, 2, 0, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-13 14:51:41'),
(48, NULL, 1, 1, NULL, NULL, '$2y$10$0qG577AUvXgWjy7WYhtHneSyw0BsZPnXp9TinFn6ISuAQYP3Lj3Qy', 'jiwani@mail.com', 'Jiwani', 'Suppliers', '', '70708885554', NULL, NULL, '4565147', 1, NULL, 3, 0, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-09 07:08:38'),
(49, NULL, 1, 1, NULL, NULL, '$2y$10$OaSl0cIwn9rAutexgDMLy.NxVV.fMq8pobBtBnFfkueFiVWvxRcya', 'as@mail.com', 'Criggler', 'AS', '', '075466535', NULL, NULL, '515633656', 1, NULL, 4, 0, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-09 07:09:51'),
(60, NULL, 1, 1, NULL, NULL, '', 'hellen@odi.com', 'Hellen', 'Odi', NULL, '25565155', NULL, NULL, NULL, 1, NULL, 4, 0, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-23 04:23:23'),
(61, NULL, 1, 1, NULL, NULL, '', 'john@mail.com', 'John', 'Gitahi', NULL, '077074786', NULL, NULL, NULL, 1, NULL, 4, 0, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-24 06:27:04'),
(63, 1593, 1, 1, '$2y$10$ZJLh5XaKD6Af.mCGFFXVdu4ap7rjSx2qK29QOq/V3I3aoyVxP95.e', 'System', '$2y$10$4fPoNIA.ezvWq8PbVqFPju6JKARmBp8AUtpxK2dqNjV0d7/PecznW', 'ta485590@gmail.com', 'jw', 'jw', '', '00', 'M', '0000-00-00', '1', 1, 1, 1, 1, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-01 07:41:10'),
(64, 6289, 1, 1, '$2y$10$3zffdBBBztw5cMlZ5jaq8.sIdhiu9gt8LhakuMGJI.kHdDqipZ14.', NULL, '$2y$10$D4bZqV3WXE4KkLtj9fd8g.LQY/XYYLSkekwk/uMYPfxxms4U5NTWe', 'liquorcabinett@gmail.com', 'jb', 'jb', '', '0', 'M', '0000-00-00', '0', 1, 1, 7, 0, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-01 07:43:25'),
(65, 3150, 1, 1, '$2y$10$Vk19LGdTvP23ZJnWegXcN.MNC2MV9pWchMRRCRNgeMWAS67Edq3va', NULL, '$2y$10$b583y9y0KFV.y3N7QWfGXO46iz5CQ.Y777iW/HFbz./OMFT1e72AC', 'okinywa@yahoo.com', 'Obadia', 'Kinywa', '', '1111111', 'M', '2020-07-06', '78877837', 1, 1, 7, 0, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-19 08:01:01'),
(66, 4729, 1, 1, '$2y$10$Hpg9nLnuUHis4vzJIsOKKOz7L.L7sHiY1XCeIKFFR1sv4V9KfFIYK', 'System', '$2y$10$uhqrAOfCCMOR5pCs2KnpI.rsT3e8vA6Ytnh/GiIQtTs75XmiE6dU6', 'okinyua2@yahoo.com', 'Admin', 'Admin', '', '536635266', 'M', '2020-04-13', '6546467', 1, 1, 1, 0, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-19 08:09:14'),
(67, 5418, 1, 1, '$2y$10$hOpc0/57GOqK6WLkORA9i.Vdux4JFzhLQs7tWFzZLnlBi6ba6kEXm', NULL, '$2y$10$MhP5.1GUg74AnUGDkXMOT.V3H104nvNd/v.U3ePLWCS8JJ.6sxTya', 'jonjula@iosofttech.co.ke', 'Jared', 'Onjula', '', '0719825153', 'M', '2022-01-06', '303838333333', 1, 1, 4, 0, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-03 16:05:20'),
(68, 8137, 1, 1, '$2y$10$7LCufSRgMJVECeJNiyVcSeUXb1tFvx8qLNyeJiS/8Bi/VUMlTMrle', NULL, '$2y$10$kMRwuwVwN3ZbjVbCDAVz3Ox4TVnHI7aXrtlLZ2BtEqQE.x6ryMoLm', 'reagan@iosofttech.co.ke', 'Reagan', 'iOSoft', '', '070700707070', 'M', '2021-12-09', '343454553', 1, 1, 7, 0, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-03 16:07:05'),
(69, NULL, 1, 1, NULL, NULL, '$2y$10$QH15SxQe0pq2qxLCc0JePuQ4vkhYyCibqTxWLStMPkbmRdni54T1G', 'ian@mail.com', 'ian', 'ouma', '', '0739698963', NULL, NULL, '12345432', 1, NULL, 3, 0, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-22 19:53:06'),
(71, NULL, 1, 1, NULL, NULL, '', 'beryl@gmail.com', 'Beryl', 'Omondi', NULL, '0710422499', NULL, NULL, NULL, 1, NULL, 4, 0, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-27 07:45:48'),
(72, NULL, 1, 1, NULL, NULL, '$2y$10$PL5.edefmbQxxdY5.uVWfu5jG9a5D/47.m7m.Jq4TWOlo8.sZHJ7m', 'mikei@mail.com', 'Michael', 'Orata', '', '08627828', 'M', '0000-00-00', '62781878', 1, NULL, 4, 0, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-31 05:17:45'),
(73, NULL, 1, 1, NULL, NULL, '', '', '', '', NULL, '', NULL, NULL, NULL, 1, NULL, 4, 0, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-05 10:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int NOT NULL,
  `org_id` int NOT NULL,
  `account_id` int NOT NULL DEFAULT '0',
  `vote_head_id` int DEFAULT NULL,
  `vote_head_code` varchar(20) DEFAULT NULL,
  `entity_id` int NOT NULL,
  `status_id` int NOT NULL,
  `department_id` int DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `expense_amount` decimal(10,2) NOT NULL,
  `expense_balance` double DEFAULT '0',
  `paid_to` varchar(50) DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `narrative` varchar(100) DEFAULT NULL,
  `expense_date` date NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `org_id`, `account_id`, `vote_head_id`, `vote_head_code`, `entity_id`, `status_id`, `department_id`, `reference`, `expense_amount`, `expense_balance`, `paid_to`, `active`, `narrative`, `expense_date`, `time_stamp`) VALUES
(2, 1, 8, 0, NULL, 2, 2, 1, '20220224110250', '1000.00', 0, 'Reagan Omondi', 1, 'NANANA', '2022-02-24', '2022-02-24 08:02:50'),
(3, 1, 8, 0, NULL, 2, 2, 1, '20220331085547', '600.00', 0, 'Ian', 1, 'Test expense', '2022-03-31', '2022-03-31 05:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `expense_type_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `expense_type_name` varchar(30) NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fiscal_years`
--

CREATE TABLE `fiscal_years` (
  `fiscal_year_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `fiscal_year_name` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fiscal_years`
--

INSERT INTO `fiscal_years` (`fiscal_year_id`, `org_id`, `fiscal_year_name`, `start_date`, `end_date`, `active`, `narrative`, `time_stamp`) VALUES
(1, 1, '2023', '2023-01-01', '2023-12-31', 0, '', '2022-04-07 10:58:20'),
(4, 1, '2020', '2020-01-01', '2020-12-31', 0, '', '2020-05-19 12:46:08'),
(6, 1, '2021', '2021-01-01', '2021-12-31', 0, '', '2021-03-24 12:36:28'),
(7, 1, '2022', '2022-01-01', '2022-12-31', 1, '', '2021-05-05 08:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `income_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `account_id` int NOT NULL,
  `department_id` int DEFAULT NULL,
  `income_amount` double NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `status_id` int DEFAULT NULL,
  `created_by` int NOT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `income_date` date DEFAULT NULL,
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`income_id`, `org_id`, `account_id`, `department_id`, `income_amount`, `customer_name`, `active`, `status_id`, `created_by`, `reference`, `income_date`, `narrative`, `time_stamp`) VALUES
(1, 1, 1898, 0, 1500, 'Ndhiwa Laws', 1, 2, 2, '20220224122026', '2022-02-24', 'NANa', '2022-02-24 09:20:26'),
(2, 1, 1971, 1, 850, 'Beryl Omondi', 1, 2, 2, '20220331090131', '2022-03-31', '', '2022-03-31 06:01:31'),
(3, 1, 1971, 0, 450, 'Kama', 1, 2, 2, '20220331090524', '2022-03-31', 'd', '2022-03-31 06:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `income_payments`
--

CREATE TABLE `income_payments` (
  `income_payment_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `entity_id` int NOT NULL,
  `account_id` int NOT NULL,
  `subaccount_type_id` int NOT NULL,
  `income_id` int NOT NULL,
  `payment_amount` double NOT NULL,
  `reference` varchar(30) NOT NULL,
  `bill_no` varchar(30) DEFAULT NULL,
  `paid_by` varchar(50) DEFAULT NULL,
  `is_paid` tinyint(1) DEFAULT '0',
  `payment_date` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income_payments`
--

INSERT INTO `income_payments` (`income_payment_id`, `org_id`, `entity_id`, `account_id`, `subaccount_type_id`, `income_id`, `payment_amount`, `reference`, `bill_no`, `paid_by`, `is_paid`, `payment_date`, `active`, `narrative`, `time_stamp`) VALUES
(1, 1, 2, 6, 1, 1, 1000, 'TQUWUI829W', '20220224122444', 'Ndhiwa Laws', 1, '2022-02-24', 1, 'NANa', '2022-02-24 09:24:44'),
(2, 1, 2, 2, 2, 3, 450, '00798', '20220331090614', 'Kama', 1, '2022-03-31', 1, 'd', '2022-03-31 06:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `category_id` text,
  `unit_id` int NOT NULL DEFAULT '1',
  `brand_id` int NOT NULL,
  `brand_model_id` int DEFAULT NULL,
  `package_type_id` int DEFAULT NULL,
  `attribute_id` text,
  `tax_type_id` int NOT NULL,
  `parent_item_id` int DEFAULT NULL,
  `color_id` int DEFAULT NULL,
  `ship_number` varchar(20) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `buying_price` decimal(10,2) NOT NULL,
  `marked_price` double NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `capacity` int DEFAULT NULL,
  `model_year` int DEFAULT NULL,
  `imei_one` varchar(50) DEFAULT NULL,
  `imei_two` varchar(50) DEFAULT NULL,
  `image` varchar(200) NOT NULL DEFAULT 'default.png',
  `narrative` text,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `available_qty` int DEFAULT '0',
  `reorder_level` int NOT NULL DEFAULT '1',
  `breakdown_formula` int DEFAULT NULL,
  `barcode` varchar(256) DEFAULT NULL,
  `item_status_id` int DEFAULT '2',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `for_sale` tinyint(1) NOT NULL DEFAULT '1',
  `for_purchase` tinyint(1) NOT NULL DEFAULT '1',
  `for_bar` tinyint(1) NOT NULL DEFAULT '0',
  `reference` text,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `org_id`, `category_id`, `unit_id`, `brand_id`, `brand_model_id`, `package_type_id`, `attribute_id`, `tax_type_id`, `parent_item_id`, `color_id`, `ship_number`, `item_name`, `buying_price`, `marked_price`, `selling_price`, `capacity`, `model_year`, `imei_one`, `imei_two`, `image`, `narrative`, `availability`, `available_qty`, `reorder_level`, `breakdown_formula`, `barcode`, `item_status_id`, `active`, `for_sale`, `for_purchase`, `for_bar`, `reference`, `time_stamp`) VALUES
(1, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'SNAP', '140.00', 180, '180.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 1, 0, 5, NULL, 'PROD_0001', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:05'),
(2, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'TUSKER LITE', '183.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 1, 0, 5, NULL, 'PROD_0002', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:05'),
(3, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'TUSKER CIDER', '175.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 1, 0, 5, NULL, 'PROD_0003', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:05'),
(4, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'TUSKER MALT', '183.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 1, 0, 5, NULL, 'PROD_0004', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:05'),
(5, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'TUSKER LAGER', '167.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 1, 0, 5, NULL, 'PROD_0005', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:05'),
(6, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'BALOZI', '166.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 1, 0, 5, NULL, 'PROD_0006', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:06'),
(7, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'TRIPPLE ACE 250ML', '167.00', 200, '200.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 10, NULL, 'PROD_0007', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:06'),
(8, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'REDBULL', '130.00', 170, '170.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 2, NULL, 'PROD_0008', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:06'),
(9, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'COKE 2LT', '145.00', 160, '160.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 1, NULL, 'PROD_0009', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:06'),
(10, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'COKE 1.25ML', '106.00', 120, '120.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 1, NULL, 'PROD_0010', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:06'),
(11, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'KREST 1.25ML', '106.00', 120, '120.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 1, NULL, 'PROD_0011', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:06'),
(12, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'SPRITE 500ML', '53.00', 70, '70.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0012', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:07'),
(13, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'BRAVADA 300ML', '25.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0013', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:07'),
(14, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'LIME 300ML', '20.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0014', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:07'),
(15, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'FANTA PASSION 500ML', '53.00', 70, '70.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0015', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:07'),
(16, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'FANTA ORANGE 500ML', '53.00', 70, '70.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0016', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:07'),
(17, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'COKE 500ML', '53.00', 70, '70.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0017', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:07'),
(18, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'KREST 500ML', '53.00', 70, '70.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0018', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:07'),
(19, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'MINUTE MAID APPLE 400ML', '58.00', 70, '70.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0019', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:07'),
(20, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'LEMONADE 300ML', '37.00', 50, '50.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0020', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:08'),
(21, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'TONIC WATER', '65.00', 100, '100.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0021', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:08'),
(22, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'PREDATOR', '41.00', 50, '50.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0022', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:08'),
(23, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'POWER PLAY', '50.00', 60, '60.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0023', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:08'),
(24, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'SPRITE 2L', '145.00', 160, '160.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 1, NULL, 'PROD_0024', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:08'),
(25, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'FANTA PASSION 2LT', '145.00', 160, '160.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 1, NULL, 'PROD_0025', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:08'),
(26, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'MINUTE MAID 1LT', '105.00', 130, '130.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 1, NULL, 'PROD_0026', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:08'),
(27, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'COKE 350ML', '33.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0027', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:08'),
(28, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'KREST 350ML', '33.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0028', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:09'),
(29, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'SPRITE 350ML', '33.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0029', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:09'),
(30, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'STONEY 350ML', '33.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0030', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:09'),
(31, 1, '4', 1, 4, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'SAFARI KINGS', '8.60', 10, '10.00', NULL, NULL, NULL, NULL, 'default.png', 'CIGARETTES', 1, 0, 20, NULL, 'PROD_0031', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:09'),
(32, 1, '4', 1, 4, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'SPORTSMAN', '10.50', 15, '15.00', NULL, NULL, NULL, NULL, 'default.png', 'CIGARETTES', 1, 0, 10, NULL, 'PROD_0032', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:09'),
(33, 1, '4', 1, 4, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'DUNHILL DOUBLE', '13.05', 20, '20.00', NULL, NULL, NULL, NULL, 'default.png', 'CIGARETTES', 1, 0, 10, NULL, 'PROD_0033', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:09'),
(34, 1, '4', 1, 4, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'EMBASSY', '12.10', 20, '20.00', NULL, NULL, NULL, NULL, 'default.png', 'CIGARETTES', 1, 0, 10, NULL, 'PROD_0034', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:09'),
(35, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'KENYA CANE SMOOTH 250ML', '220.00', 250, '250.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 2, NULL, 'PROD_0035', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:09'),
(36, 1, '6', 1, 6, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'CAPTAIN MORGAN 250ML', '245.00', 300, '300.00', NULL, NULL, NULL, NULL, 'default.png', 'BRANDY', 1, 0, 2, NULL, 'PROD_0036', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:10'),
(37, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'RICHOT 250ML', '340.00', 430, '430.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 1, 0, 2, NULL, 'PROD_0037', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:10'),
(38, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'GILBEYS 250ML', '340.00', 450, '450.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 1, 0, 2, NULL, 'PROD_0038', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:10'),
(39, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'GILBEYS 375ML', '475.00', 550, '550.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 1, 0, 2, NULL, 'PROD_0039', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:10'),
(40, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'KONYAGI 250ML', '195.00', 250, '250.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 1, 0, 2, NULL, 'PROD_0040', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:10'),
(41, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'KONYAGI 350ML', '375.00', 450, '450.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 1, 0, 2, NULL, 'PROD_0041', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:10'),
(42, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'KONYAGI 750ML', '520.00', 650, '650.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 1, 0, 2, NULL, 'PROD_0042', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:10'),
(43, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'CHROME LEMON 250ML', '173.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 5, NULL, 'PROD_0043', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:11'),
(44, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'CHROME CLEAR 250ML', '173.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 5, NULL, 'PROD_0044', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:11'),
(45, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'CHROME GIN 250ML', '173.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 5, NULL, 'PROD_0045', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:11'),
(46, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'CLUB MAN 250ML', '200.00', 250, '250.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 1, 0, 5, NULL, 'PROD_0046', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:11'),
(47, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'FLIRT VODKA GREEN APPLE 25OML', '235.00', 400, '400.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 2, NULL, 'PROD_0047', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:11'),
(48, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'BEST CREAM 250ML', '230.00', 400, '400.00', NULL, NULL, NULL, NULL, 'default.png', 'CREAM', 1, 0, 2, NULL, 'PROD_0048', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:11'),
(49, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'BEST WHISKY 250ML', '230.00', 400, '400.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 2, NULL, 'PROD_0049', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:11'),
(50, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'ALL SEASONS 375ML', '325.00', 400, '400.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 2, NULL, 'PROD_0050', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:11'),
(51, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'HUNTERS CHOICE 250ML', '235.00', 300, '300.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 2, NULL, 'PROD_0051', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:12'),
(52, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'HUNTERS CHOICE 350ML', '360.00', 450, '450.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 2, NULL, 'PROD_0052', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:12'),
(53, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'PEOPLE 250ML', '110.00', 160, '160.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 10, NULL, 'PROD_0053', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:12'),
(54, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'BLUE ICE 250ML', '140.00', 180, '180.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 10, NULL, 'PROD_0054', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:12'),
(55, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'STAR 250ML', '120.00', 160, '160.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 10, NULL, 'PROD_0055', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:12'),
(56, 1, '6', 1, 6, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'VICEROY 250ML', '335.00', 500, '500.00', NULL, NULL, NULL, NULL, 'default.png', 'BRANDY', 1, 0, 5, NULL, 'PROD_0056', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:12'),
(57, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'VICEROY 375ML', '520.00', 700, '700.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 2, NULL, 'PROD_0057', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:12'),
(58, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'KIBAO 250ML', '180.00', 250, '250.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 2, NULL, 'PROD_0058', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:13'),
(59, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'KIBAO 350ML', '255.00', 350, '350.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 2, NULL, 'PROD_0059', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:13'),
(60, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'HALF LOAF 250ML', '100.00', 150, '150.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 1, 0, 10, NULL, 'PROD_0060', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:13'),
(61, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'CASSABUENNA SWEET WHITE 1LT', '475.00', 800, '800.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 1, 0, 1, NULL, 'PROD_0061', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:13'),
(62, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'CAPRICE DRY WHITE 1LT', '555.00', 750, '750.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 1, 0, 1, NULL, 'PROD_0062', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:13'),
(63, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'CAPRICE SWEET RED 1LT', '555.00', 750, '750.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 1, 0, 1, NULL, 'PROD_0063', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:13'),
(64, 1, '3', 1, 3, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'LIME JUICE 1.5LT', '195.00', 230, '230.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 1, NULL, 'PROD_0064', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:13'),
(65, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'RED LABEL 1LT', '1500.00', 2100, '2100.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 1, NULL, 'PROD_0065', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:14'),
(66, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'BLACK LABEL 1LT', '2900.00', 3500, '3500.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 1, NULL, 'PROD_0066', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:14'),
(67, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'JAMESON 1LT', '2200.00', 2950, '2950.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 1, NULL, 'PROD_0067', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:14'),
(68, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'RED LABEL 750ML', '1300.00', 2300, '2300.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 1, NULL, 'PROD_0068', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:14'),
(69, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'RED LABEL 375ML', '780.00', 950, '950.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 1, NULL, 'PROD_0069', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:14'),
(70, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'ALL SEASONS 750ML', '700.00', 800, '800.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 1, NULL, 'PROD_0070', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:14'),
(71, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'JAMESON 350ML', '880.00', 1100, '1100.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 1, NULL, 'PROD_0071', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:14'),
(72, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'JAMESON 750ML', '1580.00', 2500, '2500.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 1, NULL, 'PROD_0072', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:15'),
(73, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'SOUTHERN COMFORT 375ML', '800.00', 1000, '1000.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 1, NULL, 'PROD_0073', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:15'),
(74, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'PILSNER', '140.00', 180, '180.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 1, 0, 5, NULL, 'PROD_0074', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:15'),
(75, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'ATLAS', '180.00', 230, '230.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 1, 0, 5, NULL, 'PROD_0075', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:15'),
(76, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'GUINESS SMOOTH', '165.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 1, 0, 5, NULL, 'PROD_0076', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:15'),
(77, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'GUINESS STOUT', '183.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 1, 0, 5, NULL, 'PROD_0077', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:15'),
(78, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'WHITE CAP', '183.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 1, 0, 5, NULL, 'PROD_0078', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:15'),
(79, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'OJ 16', '190.00', 250, '250.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 1, 0, 5, NULL, 'PROD_0079', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:15'),
(80, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'FAXE', '170.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 1, 0, 5, NULL, 'PROD_0080', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:16'),
(81, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'BLACK ICE', '143.00', 180, '180.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 1, 0, 5, NULL, 'PROD_0081', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:16'),
(82, 1, '1', 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'GUARRANA', '143.00', 180, '180.00', NULL, NULL, NULL, NULL, 'default.png', 'BEER', 1, 0, 5, NULL, 'PROD_0082', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:16'),
(83, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'BLACK LABEL 750ML', '2400.00', 2900, '2900.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 1, NULL, 'PROD_0083', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:16'),
(84, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'BAILEY 750ML', '1730.00', 2350, '2350.00', NULL, NULL, NULL, NULL, 'default.png', 'CREAM', 1, 0, 1, NULL, 'PROD_0084', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:16'),
(85, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, '8PM 750ML', '750.00', 1000, '1000.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 0, NULL, 'PROD_0085', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:16'),
(86, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'WILLIAM LAWSONS 750ML', '1075.00', 1250, '1250.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 0, NULL, 'PROD_0086', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:16'),
(87, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'BEST DRY GIN 750ML', '530.00', 900, '900.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 1, 0, 0, NULL, 'PROD_0087', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:16'),
(88, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'BEST  CREAM 750ML', '820.00', 950, '950.00', NULL, NULL, NULL, NULL, 'default.png', 'CREAM', 1, 0, 0, NULL, 'PROD_0088', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:16'),
(89, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'CHROME GIN 750ML', '485.00', 630, '630.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 1, 0, 0, NULL, 'PROD_0089', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:17'),
(90, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'CHROME VODKA 750ML', '485.00', 630, '630.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 0, NULL, 'PROD_0090', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:17'),
(91, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'IMPERIAL 750 ML', '580.00', 800, '800.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 0, NULL, 'PROD_0091', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:17'),
(92, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'CLUB MAN 750ML', '500.00', 700, '700.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 1, 0, 0, NULL, 'PROD_0092', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:17'),
(93, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'HUNTERS CHOICE 750ML', '665.00', 800, '800.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 0, NULL, 'PROD_0093', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:17'),
(94, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'ROBBERTSON RED 750ML', '680.00', 950, '950.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 0, NULL, 'PROD_0094', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:17'),
(95, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'BLACKBIRD RED 750ML', '650.00', 900, '900.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 1, 0, 0, NULL, 'PROD_0095', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:17'),
(96, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'BLACKBIRD WHITE 750ML', '650.00', 850, '850.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 1, 0, 0, NULL, 'PROD_0096', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:18'),
(97, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'FOUR COUSINS RED SWEET 750ML', '620.00', 850, '850.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 1, 0, 0, NULL, 'PROD_0097', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:18'),
(98, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'FOUR COUSINS WHITE SWEET 750ML', '620.00', 850, '850.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 1, 0, 0, NULL, 'PROD_0098', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:18'),
(99, 1, '9', 1, 9, NULL, NULL, 'null', 1, NULL, 0, NULL, '4TH STREET SWEET RED 750ML', '620.00', 850, '850.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 1, 0, 0, NULL, 'PROD_0099', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:18'),
(100, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, NULL, '4TH STREET SWEET WHITE 750ML', '620.00', 850, '850.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 1, 0, 0, NULL, 'PROD_0100', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:18'),
(101, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'CELLAR CASK SWEET RED 750ML', '630.00', 900, '900.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 1, 0, 0, NULL, 'PROD_0101', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:18'),
(102, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'CELLAR CASK SWEET WHITE 750ML', '630.00', 900, '900.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 1, 0, 0, NULL, 'PROD_0102', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:18'),
(103, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'SOUTHERN COMFORT 700ML', '1450.00', 1800, '1800.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 0, NULL, 'PROD_0103', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:18'),
(104, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'VICEROY 750ML', '1020.00', 1200, '1200.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 0, NULL, 'PROD_0104', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:18'),
(105, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'MAC MOHAN 750ML', '650.00', 850, '850.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 0, NULL, 'PROD_0105', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:19'),
(106, 1, '6', 1, 6, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'RICHOT 750ML', '1000.00', 1200, '1200.00', NULL, NULL, NULL, NULL, 'default.png', 'BRANDY', 1, 0, 0, NULL, 'PROD_0106', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:19'),
(107, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'CAPTAIN MORGAN 750ML', '720.00', 850, '850.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 0, NULL, 'PROD_0107', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:19'),
(108, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'BLACK AND WHITE 750ML', '880.00', 1100, '1100.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 0, NULL, 'PROD_0108', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:19'),
(109, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'FLIRT VODKA 1LT', '850.00', 1100, '1100.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 0, NULL, 'PROD_0109', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:19'),
(110, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'FLIRT VODKA GREEN APPLE 75OML', '790.00', 950, '950.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 0, NULL, 'PROD_0110', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:19'),
(111, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'SMINORFF VODKA 750 ML', '1000.00', 1200, '1200.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 0, NULL, 'PROD_0111', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:19'),
(112, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'KENYA CANE PINEAPPLE 750ML', '570.00', 700, '700.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 0, NULL, 'PROD_0112', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:19'),
(113, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'KENYA CANE SMOOTH 750ML', '570.00', 700, '700.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 0, NULL, 'PROD_0113', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:20'),
(114, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'KENYA CANE CITRUS 750ML', '570.00', 700, '700.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 0, NULL, 'PROD_0114', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:20'),
(115, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'GORDONS DRY 750ML', '1350.00', 1650, '1650.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 1, 0, 0, NULL, 'PROD_0115', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:20'),
(116, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'GORDONS PINIC 750ML', '1350.00', 1700, '1700.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 0, NULL, 'PROD_0116', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:20'),
(117, 1, '7', 1, 7, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'GILBEYS 750 ML', '1000.00', 1300, '1300.00', NULL, NULL, NULL, NULL, 'default.png', 'GIN', 1, 0, 0, NULL, 'PROD_0117', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:20'),
(118, 1, '9', 1, 9, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'V&A IMPERIAL CREAM', '600.00', 700, '700.00', NULL, NULL, NULL, NULL, 'default.png', 'WINES', 1, 0, 0, NULL, 'PROD_0118', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:20'),
(119, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'CRAZY COCK 750ML', '660.00', 850, '850.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 0, NULL, 'PROD_0119', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:20'),
(120, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'GRANTS 750ML', '1120.00', 1300, '1300.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 0, NULL, 'PROD_0120', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:21'),
(121, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'GRANTS 375ML', '650.00', 1200, '1200.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 0, NULL, 'PROD_0121', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:21'),
(122, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'VAT 69 750ML', '1150.00', 1400, '1400.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 0, NULL, 'PROD_0122', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:21'),
(123, 1, '6', 1, 6, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'RICHOT 375ML', '475.00', 550, '550.00', NULL, NULL, NULL, NULL, 'default.png', 'BRANDY', 1, 0, 0, NULL, 'PROD_0123', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:21'),
(124, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'IMPERIAL BLUE 375ML', '315.00', 400, '400.00', NULL, NULL, NULL, NULL, 'default.png', 'CREAM', 1, 0, 0, NULL, 'PROD_0124', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:21'),
(125, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'IMPERIAL 250ML', '200.00', 250, '250.00', NULL, NULL, NULL, NULL, 'default.png', 'CREAM', 1, 0, 0, NULL, 'PROD_0125', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:21'),
(126, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'SMINORFF VODKA 250 ML', '340.00', 450, '450.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 5, NULL, 'PROD_0126', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:21'),
(127, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'SMINORFF VODKA 375 ML', '475.00', 650, '650.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 5, NULL, 'PROD_0127', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:21'),
(128, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'KENYA KING 250ML', '165.00', 220, '220.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 5, NULL, 'PROD_0128', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:21'),
(129, 1, '5', 1, 5, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'GRANTS 1LT', '1400.00', 1700, '1700.00', NULL, NULL, NULL, NULL, 'default.png', 'WHISKEY', 1, 0, 0, NULL, 'PROD_0129', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:22'),
(130, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'SWEET BERRY 250ML', '130.00', 170, '170.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 10, NULL, 'PROD_0130', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:22'),
(131, 1, '2', 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'KIBAO 750ML', '500.00', 600, '600.00', NULL, NULL, NULL, NULL, 'default.png', 'VODKA', 1, 0, 0, NULL, 'PROD_0131', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:22'),
(132, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'FANTA BLACK CURRENT 350ML', '33.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0132', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:22'),
(133, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'FANTA BLACK CURRENT 500ML', '53.00', 70, '70.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0133', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:22'),
(134, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'FANTA BLACK CURRENT 1.25L', '106.00', 120, '120.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 1, NULL, 'PROD_0134', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:22'),
(135, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'FANTA ORANGE 1.25L', '106.00', 120, '120.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 1, NULL, 'PROD_0135', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:22'),
(136, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'FANTA ORANGE 350ML', '33.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0136', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:23'),
(137, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'MINUTE MAID MANGO 400ML', '58.00', 70, '70.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0137', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:23'),
(138, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'NOVIDA 350ML', '33.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0138', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:23'),
(139, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'COKE 200ML', '15.00', 20, '20.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0139', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:23'),
(140, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'SPRITE 200ML', '15.00', 20, '20.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0140', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:23'),
(141, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'FANTA ORANGE 200ML', '15.00', 20, '20.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0141', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:23'),
(142, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'FANTA BLACKCURRENT 200ML', '15.00', 20, '20.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0142', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:23'),
(143, 1, '8', 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'MINUTE MAID 350ML', '33.00', 40, '40.00', NULL, NULL, NULL, NULL, 'default.png', 'SOFT DRINKS', 1, 0, 5, NULL, 'PROD_0143', 2, 1, 1, 1, 0, NULL, '2022-04-10 08:25:23');

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
  `item_store_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `store_id` int NOT NULL DEFAULT '1',
  `item_id` int NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `buying_price` decimal(10,2) NOT NULL,
  `marked_price` double NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `available_qty` int DEFAULT '0',
  `reorder_level` int NOT NULL DEFAULT '1',
  `barcode` varchar(256) DEFAULT NULL,
  `item_status_id` int DEFAULT '2',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` text,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `items_store`
--

INSERT INTO `items_store` (`item_store_id`, `org_id`, `store_id`, `item_id`, `item_name`, `buying_price`, `marked_price`, `selling_price`, `availability`, `available_qty`, `reorder_level`, `barcode`, `item_status_id`, `active`, `narrative`, `time_stamp`) VALUES
(1, 1, 2, 1, 'SNAP', '140.00', 180, '180.00', 1, 0, 1, 'PROD_0001', 2, 1, NULL, '2022-04-10 08:47:07'),
(2, 1, 2, 2, 'TUSKER LITE', '183.00', 220, '220.00', 1, 0, 1, 'PROD_0002', 2, 1, NULL, '2022-04-10 08:47:07'),
(3, 1, 2, 3, 'TUSKER CIDER', '175.00', 220, '220.00', 1, 0, 1, 'PROD_0003', 2, 1, NULL, '2022-04-10 08:47:07'),
(4, 1, 2, 4, 'TUSKER MALT', '183.00', 220, '220.00', 1, 0, 1, 'PROD_0004', 2, 1, NULL, '2022-04-10 08:47:07'),
(5, 1, 2, 5, 'TUSKER LAGER', '167.00', 220, '220.00', 1, 0, 1, 'PROD_0005', 2, 1, NULL, '2022-04-10 08:47:07'),
(6, 1, 2, 6, 'BALOZI', '166.00', 220, '220.00', 1, 0, 1, 'PROD_0006', 2, 1, NULL, '2022-04-10 08:47:07'),
(7, 1, 2, 7, 'TRIPPLE ACE 250ML', '167.00', 200, '200.00', 1, 0, 1, 'PROD_0007', 2, 1, NULL, '2022-04-10 08:47:07'),
(8, 1, 2, 8, 'REDBULL', '130.00', 170, '170.00', 1, 0, 1, 'PROD_0008', 2, 1, NULL, '2022-04-10 08:47:07'),
(9, 1, 2, 9, 'COKE 2LT', '145.00', 160, '160.00', 1, 0, 1, 'PROD_0009', 2, 1, NULL, '2022-04-10 08:47:07'),
(10, 1, 2, 10, 'COKE 1.25ML', '106.00', 120, '120.00', 1, 0, 1, 'PROD_0010', 2, 1, NULL, '2022-04-10 08:47:07'),
(11, 1, 2, 11, 'KREST 1.25ML', '106.00', 120, '120.00', 1, 0, 1, 'PROD_0011', 2, 1, NULL, '2022-04-10 08:47:07'),
(12, 1, 2, 12, 'SPRITE 500ML', '53.00', 70, '70.00', 1, 0, 1, 'PROD_0012', 2, 1, NULL, '2022-04-10 08:47:07'),
(13, 1, 2, 13, 'BRAVADA 300ML', '25.00', 40, '40.00', 1, 0, 1, 'PROD_0013', 2, 1, NULL, '2022-04-10 08:47:07'),
(14, 1, 2, 14, 'LIME 300ML', '20.00', 40, '40.00', 1, 0, 1, 'PROD_0014', 2, 1, NULL, '2022-04-10 08:47:07'),
(15, 1, 2, 15, 'FANTA PASSION 500ML', '53.00', 70, '70.00', 1, 0, 1, 'PROD_0015', 2, 1, NULL, '2022-04-10 08:47:07'),
(16, 1, 2, 16, 'FANTA ORANGE 500ML', '53.00', 70, '70.00', 1, 0, 1, 'PROD_0016', 2, 1, NULL, '2022-04-10 08:47:07'),
(17, 1, 2, 17, 'COKE 500ML', '53.00', 70, '70.00', 1, 0, 1, 'PROD_0017', 2, 1, NULL, '2022-04-10 08:47:07'),
(18, 1, 2, 18, 'KREST 500ML', '53.00', 70, '70.00', 1, 0, 1, 'PROD_0018', 2, 1, NULL, '2022-04-10 08:47:07'),
(19, 1, 2, 19, 'MINUTE MAID APPLE 400ML', '58.00', 70, '70.00', 1, 0, 1, 'PROD_0019', 2, 1, NULL, '2022-04-10 08:47:07'),
(20, 1, 2, 20, 'LEMONADE 300ML', '37.00', 50, '50.00', 1, 0, 1, 'PROD_0020', 2, 1, NULL, '2022-04-10 08:47:07'),
(21, 1, 2, 21, 'TONIC WATER', '65.00', 100, '100.00', 1, 0, 1, 'PROD_0021', 2, 1, NULL, '2022-04-10 08:47:07'),
(22, 1, 2, 22, 'PREDATOR', '41.00', 50, '50.00', 1, 0, 1, 'PROD_0022', 2, 1, NULL, '2022-04-10 08:47:07'),
(23, 1, 2, 23, 'POWER PLAY', '50.00', 60, '60.00', 1, 0, 1, 'PROD_0023', 2, 1, NULL, '2022-04-10 08:47:07'),
(24, 1, 2, 24, 'SPRITE 2L', '145.00', 160, '160.00', 1, 0, 1, 'PROD_0024', 2, 1, NULL, '2022-04-10 08:47:07'),
(25, 1, 2, 25, 'FANTA PASSION 2LT', '145.00', 160, '160.00', 1, 0, 1, 'PROD_0025', 2, 1, NULL, '2022-04-10 08:47:07'),
(26, 1, 2, 26, 'MINUTE MAID 1LT', '105.00', 130, '130.00', 1, 0, 1, 'PROD_0026', 2, 1, NULL, '2022-04-10 08:47:07'),
(27, 1, 2, 27, 'COKE 350ML', '33.00', 40, '40.00', 1, 0, 1, 'PROD_0027', 2, 1, NULL, '2022-04-10 08:47:07'),
(28, 1, 2, 28, 'KREST 350ML', '33.00', 40, '40.00', 1, 0, 1, 'PROD_0028', 2, 1, NULL, '2022-04-10 08:47:07'),
(29, 1, 2, 29, 'SPRITE 350ML', '33.00', 40, '40.00', 1, 0, 1, 'PROD_0029', 2, 1, NULL, '2022-04-10 08:47:07'),
(30, 1, 2, 30, 'STONEY 350ML', '33.00', 40, '40.00', 1, 0, 1, 'PROD_0030', 2, 1, NULL, '2022-04-10 08:47:07'),
(31, 1, 2, 31, 'SAFARI KINGS', '8.60', 10, '10.00', 1, 0, 1, 'PROD_0031', 2, 1, NULL, '2022-04-10 08:47:07'),
(32, 1, 2, 32, 'SPORTSMAN', '10.50', 15, '15.00', 1, 0, 1, 'PROD_0032', 2, 1, NULL, '2022-04-10 08:47:07'),
(33, 1, 2, 33, 'DUNHILL DOUBLE', '13.05', 20, '20.00', 1, 0, 1, 'PROD_0033', 2, 1, NULL, '2022-04-10 08:47:07'),
(34, 1, 2, 34, 'EMBASSY', '12.10', 20, '20.00', 1, 0, 1, 'PROD_0034', 2, 1, NULL, '2022-04-10 08:47:07'),
(35, 1, 2, 35, 'KENYA CANE SMOOTH 250ML', '220.00', 250, '250.00', 1, 0, 1, 'PROD_0035', 2, 1, NULL, '2022-04-10 08:47:07'),
(36, 1, 2, 36, 'CAPTAIN MORGAN 250ML', '245.00', 300, '300.00', 1, 0, 1, 'PROD_0036', 2, 1, NULL, '2022-04-10 08:47:07'),
(37, 1, 2, 37, 'RICHOT 250ML', '340.00', 430, '430.00', 1, 0, 1, 'PROD_0037', 2, 1, NULL, '2022-04-10 08:47:07'),
(38, 1, 2, 38, 'GILBEYS 250ML', '340.00', 450, '450.00', 1, 0, 1, 'PROD_0038', 2, 1, NULL, '2022-04-10 08:47:07'),
(39, 1, 2, 39, 'GILBEYS 375ML', '475.00', 550, '550.00', 1, 0, 1, 'PROD_0039', 2, 1, NULL, '2022-04-10 08:47:07'),
(40, 1, 2, 40, 'KONYAGI 250ML', '195.00', 250, '250.00', 1, 0, 1, 'PROD_0040', 2, 1, NULL, '2022-04-10 08:47:07'),
(41, 1, 2, 41, 'KONYAGI 350ML', '375.00', 450, '450.00', 1, 0, 1, 'PROD_0041', 2, 1, NULL, '2022-04-10 08:47:07'),
(42, 1, 2, 42, 'KONYAGI 750ML', '520.00', 650, '650.00', 1, 0, 1, 'PROD_0042', 2, 1, NULL, '2022-04-10 08:47:07'),
(43, 1, 2, 43, 'CHROME LEMON 250ML', '173.00', 220, '220.00', 1, 0, 1, 'PROD_0043', 2, 1, NULL, '2022-04-10 08:47:07'),
(44, 1, 2, 44, 'CHROME CLEAR 250ML', '173.00', 220, '220.00', 1, 0, 1, 'PROD_0044', 2, 1, NULL, '2022-04-10 08:47:07'),
(45, 1, 2, 45, 'CHROME GIN 250ML', '173.00', 220, '220.00', 1, 0, 1, 'PROD_0045', 2, 1, NULL, '2022-04-10 08:47:07'),
(46, 1, 2, 46, 'CLUB MAN 250ML', '200.00', 250, '250.00', 1, 0, 1, 'PROD_0046', 2, 1, NULL, '2022-04-10 08:47:07'),
(47, 1, 2, 47, 'FLIRT VODKA GREEN APPLE 25OML', '235.00', 400, '400.00', 1, 0, 1, 'PROD_0047', 2, 1, NULL, '2022-04-10 08:47:07'),
(48, 1, 2, 48, 'BEST CREAM 250ML', '230.00', 400, '400.00', 1, 0, 1, 'PROD_0048', 2, 1, NULL, '2022-04-10 08:47:07'),
(49, 1, 2, 49, 'BEST WHISKY 250ML', '230.00', 400, '400.00', 1, 0, 1, 'PROD_0049', 2, 1, NULL, '2022-04-10 08:47:07'),
(50, 1, 2, 50, 'ALL SEASONS 375ML', '325.00', 400, '400.00', 1, 0, 1, 'PROD_0050', 2, 1, NULL, '2022-04-10 08:47:07'),
(51, 1, 2, 51, 'HUNTERS CHOICE 250ML', '235.00', 300, '300.00', 1, 0, 1, 'PROD_0051', 2, 1, NULL, '2022-04-10 08:47:07'),
(52, 1, 2, 52, 'HUNTERS CHOICE 350ML', '360.00', 450, '450.00', 1, 0, 1, 'PROD_0052', 2, 1, NULL, '2022-04-10 08:47:07'),
(53, 1, 2, 53, 'PEOPLE 250ML', '110.00', 160, '160.00', 1, 0, 1, 'PROD_0053', 2, 1, NULL, '2022-04-10 08:47:07'),
(54, 1, 2, 54, 'BLUE ICE 250ML', '140.00', 180, '180.00', 1, 0, 1, 'PROD_0054', 2, 1, NULL, '2022-04-10 08:47:07'),
(55, 1, 2, 55, 'STAR 250ML', '120.00', 160, '160.00', 1, 0, 1, 'PROD_0055', 2, 1, NULL, '2022-04-10 08:47:07'),
(56, 1, 2, 56, 'VICEROY 250ML', '335.00', 500, '500.00', 1, 0, 1, 'PROD_0056', 2, 1, NULL, '2022-04-10 08:47:07'),
(57, 1, 2, 57, 'VICEROY 375ML', '520.00', 700, '700.00', 1, 0, 1, 'PROD_0057', 2, 1, NULL, '2022-04-10 08:47:07'),
(58, 1, 2, 58, 'KIBAO 250ML', '180.00', 250, '250.00', 1, 0, 1, 'PROD_0058', 2, 1, NULL, '2022-04-10 08:47:07'),
(59, 1, 2, 59, 'KIBAO 350ML', '255.00', 350, '350.00', 1, 0, 1, 'PROD_0059', 2, 1, NULL, '2022-04-10 08:47:07'),
(60, 1, 2, 60, 'HALF LOAF 250ML', '100.00', 150, '150.00', 1, 0, 1, 'PROD_0060', 2, 1, NULL, '2022-04-10 08:47:07'),
(61, 1, 2, 61, 'CASSABUENNA SWEET WHITE 1LT', '475.00', 800, '800.00', 1, 0, 1, 'PROD_0061', 2, 1, NULL, '2022-04-10 08:47:07'),
(62, 1, 2, 62, 'CAPRICE DRY WHITE 1LT', '555.00', 750, '750.00', 1, 0, 1, 'PROD_0062', 2, 1, NULL, '2022-04-10 08:47:07'),
(63, 1, 2, 63, 'CAPRICE SWEET RED 1LT', '555.00', 750, '750.00', 1, 0, 1, 'PROD_0063', 2, 1, NULL, '2022-04-10 08:47:07'),
(64, 1, 2, 64, 'LIME JUICE 1.5LT', '195.00', 230, '230.00', 1, 0, 1, 'PROD_0064', 2, 1, NULL, '2022-04-10 08:47:07'),
(65, 1, 2, 65, 'RED LABEL 1LT', '1500.00', 2100, '2100.00', 1, 0, 1, 'PROD_0065', 2, 1, NULL, '2022-04-10 08:47:07'),
(66, 1, 2, 66, 'BLACK LABEL 1LT', '2900.00', 3500, '3500.00', 1, 0, 1, 'PROD_0066', 2, 1, NULL, '2022-04-10 08:47:07'),
(67, 1, 2, 67, 'JAMESON 1LT', '2200.00', 2950, '2950.00', 1, 0, 1, 'PROD_0067', 2, 1, NULL, '2022-04-10 08:47:07'),
(68, 1, 2, 68, 'RED LABEL 750ML', '1300.00', 2300, '2300.00', 1, 0, 1, 'PROD_0068', 2, 1, NULL, '2022-04-10 08:47:07'),
(69, 1, 2, 69, 'RED LABEL 375ML', '780.00', 950, '950.00', 1, 0, 1, 'PROD_0069', 2, 1, NULL, '2022-04-10 08:47:07'),
(70, 1, 2, 70, 'ALL SEASONS 750ML', '700.00', 800, '800.00', 1, 0, 1, 'PROD_0070', 2, 1, NULL, '2022-04-10 08:47:07'),
(71, 1, 2, 71, 'JAMESON 350ML', '880.00', 1100, '1100.00', 1, 0, 1, 'PROD_0071', 2, 1, NULL, '2022-04-10 08:47:07'),
(72, 1, 2, 72, 'JAMESON 750ML', '1580.00', 2500, '2500.00', 1, 0, 1, 'PROD_0072', 2, 1, NULL, '2022-04-10 08:47:07'),
(73, 1, 2, 73, 'SOUTHERN COMFORT 375ML', '800.00', 1000, '1000.00', 1, 0, 1, 'PROD_0073', 2, 1, NULL, '2022-04-10 08:47:07'),
(74, 1, 2, 74, 'PILSNER', '140.00', 180, '180.00', 1, 0, 1, 'PROD_0074', 2, 1, NULL, '2022-04-10 08:47:07'),
(75, 1, 2, 75, 'ATLAS', '180.00', 230, '230.00', 1, 0, 1, 'PROD_0075', 2, 1, NULL, '2022-04-10 08:47:07'),
(76, 1, 2, 76, 'GUINESS SMOOTH', '165.00', 220, '220.00', 1, 0, 1, 'PROD_0076', 2, 1, NULL, '2022-04-10 08:47:07'),
(77, 1, 2, 77, 'GUINESS STOUT', '183.00', 220, '220.00', 1, 0, 1, 'PROD_0077', 2, 1, NULL, '2022-04-10 08:47:07'),
(78, 1, 2, 78, 'WHITE CAP', '183.00', 220, '220.00', 1, 0, 1, 'PROD_0078', 2, 1, NULL, '2022-04-10 08:47:07'),
(79, 1, 2, 79, 'OJ 16', '190.00', 250, '250.00', 1, 0, 1, 'PROD_0079', 2, 1, NULL, '2022-04-10 08:47:07'),
(80, 1, 2, 80, 'FAXE', '170.00', 220, '220.00', 1, 0, 1, 'PROD_0080', 2, 1, NULL, '2022-04-10 08:47:07'),
(81, 1, 2, 81, 'BLACK ICE', '143.00', 180, '180.00', 1, 0, 1, 'PROD_0081', 2, 1, NULL, '2022-04-10 08:47:07'),
(82, 1, 2, 82, 'GUARRANA', '143.00', 180, '180.00', 1, 0, 1, 'PROD_0082', 2, 1, NULL, '2022-04-10 08:47:07'),
(83, 1, 2, 83, 'BLACK LABEL 750ML', '2400.00', 2900, '2900.00', 1, 0, 1, 'PROD_0083', 2, 1, NULL, '2022-04-10 08:47:07'),
(84, 1, 2, 84, 'BAILEY 750ML', '1730.00', 2350, '2350.00', 1, 0, 1, 'PROD_0084', 2, 1, NULL, '2022-04-10 08:47:07'),
(85, 1, 2, 85, '8PM 750ML', '750.00', 1000, '1000.00', 1, 0, 1, 'PROD_0085', 2, 1, NULL, '2022-04-10 08:47:07'),
(86, 1, 2, 86, 'WILLIAM LAWSONS 750ML', '1075.00', 1250, '1250.00', 1, 0, 1, 'PROD_0086', 2, 1, NULL, '2022-04-10 08:47:07'),
(87, 1, 2, 87, 'BEST DRY GIN 750ML', '530.00', 900, '900.00', 1, 0, 1, 'PROD_0087', 2, 1, NULL, '2022-04-10 08:47:07'),
(88, 1, 2, 88, 'BEST  CREAM 750ML', '820.00', 950, '950.00', 1, 0, 1, 'PROD_0088', 2, 1, NULL, '2022-04-10 08:47:07'),
(89, 1, 2, 89, 'CHROME GIN 750ML', '485.00', 630, '630.00', 1, 0, 1, 'PROD_0089', 2, 1, NULL, '2022-04-10 08:47:07'),
(90, 1, 2, 90, 'CHROME VODKA 750ML', '485.00', 630, '630.00', 1, 0, 1, 'PROD_0090', 2, 1, NULL, '2022-04-10 08:47:07'),
(91, 1, 2, 91, 'IMPERIAL 750 ML', '580.00', 800, '800.00', 1, 0, 1, 'PROD_0091', 2, 1, NULL, '2022-04-10 08:47:07'),
(92, 1, 2, 92, 'CLUB MAN 750ML', '500.00', 700, '700.00', 1, 0, 1, 'PROD_0092', 2, 1, NULL, '2022-04-10 08:47:07'),
(93, 1, 2, 93, 'HUNTERS CHOICE 750ML', '665.00', 800, '800.00', 1, 0, 1, 'PROD_0093', 2, 1, NULL, '2022-04-10 08:47:07'),
(94, 1, 2, 94, 'ROBBERTSON RED 750ML', '680.00', 950, '950.00', 1, 0, 1, 'PROD_0094', 2, 1, NULL, '2022-04-10 08:47:07'),
(95, 1, 2, 95, 'BLACKBIRD RED 750ML', '650.00', 900, '900.00', 1, 0, 1, 'PROD_0095', 2, 1, NULL, '2022-04-10 08:47:07'),
(96, 1, 2, 96, 'BLACKBIRD WHITE 750ML', '650.00', 850, '850.00', 1, 0, 1, 'PROD_0096', 2, 1, NULL, '2022-04-10 08:47:07'),
(97, 1, 2, 97, 'FOUR COUSINS RED SWEET 750ML', '620.00', 850, '850.00', 1, 0, 1, 'PROD_0097', 2, 1, NULL, '2022-04-10 08:47:07'),
(98, 1, 2, 98, 'FOUR COUSINS WHITE SWEET 750ML', '620.00', 850, '850.00', 1, 0, 1, 'PROD_0098', 2, 1, NULL, '2022-04-10 08:47:07'),
(99, 1, 2, 99, '4TH STREET SWEET RED 750ML', '620.00', 850, '850.00', 1, 0, 1, 'PROD_0099', 2, 1, NULL, '2022-04-10 08:47:07'),
(100, 1, 2, 100, '4TH STREET SWEET WHITE 750ML', '620.00', 850, '850.00', 1, 0, 1, 'PROD_0100', 2, 1, NULL, '2022-04-10 08:47:07'),
(101, 1, 2, 101, 'CELLAR CASK SWEET RED 750ML', '630.00', 900, '900.00', 1, 0, 1, 'PROD_0101', 2, 1, NULL, '2022-04-10 08:47:07'),
(102, 1, 2, 102, 'CELLAR CASK SWEET WHITE 750ML', '630.00', 900, '900.00', 1, 0, 1, 'PROD_0102', 2, 1, NULL, '2022-04-10 08:47:07'),
(103, 1, 2, 103, 'SOUTHERN COMFORT 700ML', '1450.00', 1800, '1800.00', 1, 0, 1, 'PROD_0103', 2, 1, NULL, '2022-04-10 08:47:07'),
(104, 1, 2, 104, 'VICEROY 750ML', '1020.00', 1200, '1200.00', 1, 0, 1, 'PROD_0104', 2, 1, NULL, '2022-04-10 08:47:07'),
(105, 1, 2, 105, 'MAC MOHAN 750ML', '650.00', 850, '850.00', 1, 0, 1, 'PROD_0105', 2, 1, NULL, '2022-04-10 08:47:07'),
(106, 1, 2, 106, 'RICHOT 750ML', '1000.00', 1200, '1200.00', 1, 0, 1, 'PROD_0106', 2, 1, NULL, '2022-04-10 08:47:07'),
(107, 1, 2, 107, 'CAPTAIN MORGAN 750ML', '720.00', 850, '850.00', 1, 0, 1, 'PROD_0107', 2, 1, NULL, '2022-04-10 08:47:07'),
(108, 1, 2, 108, 'BLACK AND WHITE 750ML', '880.00', 1100, '1100.00', 1, 0, 1, 'PROD_0108', 2, 1, NULL, '2022-04-10 08:47:07'),
(109, 1, 2, 109, 'FLIRT VODKA 1LT', '850.00', 1100, '1100.00', 1, 0, 1, 'PROD_0109', 2, 1, NULL, '2022-04-10 08:47:07'),
(110, 1, 2, 110, 'FLIRT VODKA GREEN APPLE 75OML', '790.00', 950, '950.00', 1, 0, 1, 'PROD_0110', 2, 1, NULL, '2022-04-10 08:47:07'),
(111, 1, 2, 111, 'SMINORFF VODKA 750 ML', '1000.00', 1200, '1200.00', 1, 0, 1, 'PROD_0111', 2, 1, NULL, '2022-04-10 08:47:07'),
(112, 1, 2, 112, 'KENYA CANE PINEAPPLE 750ML', '570.00', 700, '700.00', 1, 0, 1, 'PROD_0112', 2, 1, NULL, '2022-04-10 08:47:07'),
(113, 1, 2, 113, 'KENYA CANE SMOOTH 750ML', '570.00', 700, '700.00', 1, 0, 1, 'PROD_0113', 2, 1, NULL, '2022-04-10 08:47:07'),
(114, 1, 2, 114, 'KENYA CANE CITRUS 750ML', '570.00', 700, '700.00', 1, 0, 1, 'PROD_0114', 2, 1, NULL, '2022-04-10 08:47:07'),
(115, 1, 2, 115, 'GORDONS DRY 750ML', '1350.00', 1650, '1650.00', 1, 0, 1, 'PROD_0115', 2, 1, NULL, '2022-04-10 08:47:07'),
(116, 1, 2, 116, 'GORDONS PINIC 750ML', '1350.00', 1700, '1700.00', 1, 0, 1, 'PROD_0116', 2, 1, NULL, '2022-04-10 08:47:07'),
(117, 1, 2, 117, 'GILBEYS 750 ML', '1000.00', 1300, '1300.00', 1, 0, 1, 'PROD_0117', 2, 1, NULL, '2022-04-10 08:47:07'),
(118, 1, 2, 118, 'V&A IMPERIAL CREAM', '600.00', 700, '700.00', 1, 0, 1, 'PROD_0118', 2, 1, NULL, '2022-04-10 08:47:07'),
(119, 1, 2, 119, 'CRAZY COCK 750ML', '660.00', 850, '850.00', 1, 0, 1, 'PROD_0119', 2, 1, NULL, '2022-04-10 08:47:07'),
(120, 1, 2, 120, 'GRANTS 750ML', '1120.00', 1300, '1300.00', 1, 0, 1, 'PROD_0120', 2, 1, NULL, '2022-04-10 08:47:07'),
(121, 1, 2, 121, 'GRANTS 375ML', '650.00', 1200, '1200.00', 1, 0, 1, 'PROD_0121', 2, 1, NULL, '2022-04-10 08:47:07'),
(122, 1, 2, 122, 'VAT 69 750ML', '1150.00', 1400, '1400.00', 1, 0, 1, 'PROD_0122', 2, 1, NULL, '2022-04-10 08:47:07'),
(123, 1, 2, 123, 'RICHOT 375ML', '475.00', 550, '550.00', 1, 0, 1, 'PROD_0123', 2, 1, NULL, '2022-04-10 08:47:07'),
(124, 1, 2, 124, 'IMPERIAL BLUE 375ML', '315.00', 400, '400.00', 1, 0, 1, 'PROD_0124', 2, 1, NULL, '2022-04-10 08:47:07'),
(125, 1, 2, 125, 'IMPERIAL 250ML', '200.00', 250, '250.00', 1, 0, 1, 'PROD_0125', 2, 1, NULL, '2022-04-10 08:47:07'),
(126, 1, 2, 126, 'SMINORFF VODKA 250 ML', '340.00', 450, '450.00', 1, 0, 1, 'PROD_0126', 2, 1, NULL, '2022-04-10 08:47:07'),
(127, 1, 2, 127, 'SMINORFF VODKA 375 ML', '475.00', 650, '650.00', 1, 0, 1, 'PROD_0127', 2, 1, NULL, '2022-04-10 08:47:07'),
(128, 1, 2, 128, 'KENYA KING 250ML', '165.00', 220, '220.00', 1, 0, 1, 'PROD_0128', 2, 1, NULL, '2022-04-10 08:47:07'),
(129, 1, 2, 129, 'GRANTS 1LT', '1400.00', 1700, '1700.00', 1, 0, 1, 'PROD_0129', 2, 1, NULL, '2022-04-10 08:47:07'),
(130, 1, 2, 130, 'SWEET BERRY 250ML', '130.00', 170, '170.00', 1, 0, 1, 'PROD_0130', 2, 1, NULL, '2022-04-10 08:47:07'),
(131, 1, 2, 131, 'KIBAO 750ML', '500.00', 600, '600.00', 1, 0, 1, 'PROD_0131', 2, 1, NULL, '2022-04-10 08:47:07'),
(132, 1, 2, 132, 'FANTA BLACK CURRENT 350ML', '33.00', 40, '40.00', 1, 0, 1, 'PROD_0132', 2, 1, NULL, '2022-04-10 08:47:07'),
(133, 1, 2, 133, 'FANTA BLACK CURRENT 500ML', '53.00', 70, '70.00', 1, 0, 1, 'PROD_0133', 2, 1, NULL, '2022-04-10 08:47:07'),
(134, 1, 2, 134, 'FANTA BLACK CURRENT 1.25L', '106.00', 120, '120.00', 1, 0, 1, 'PROD_0134', 2, 1, NULL, '2022-04-10 08:47:07'),
(135, 1, 2, 135, 'FANTA ORANGE 1.25L', '106.00', 120, '120.00', 1, 0, 1, 'PROD_0135', 2, 1, NULL, '2022-04-10 08:47:07'),
(136, 1, 2, 136, 'FANTA ORANGE 350ML', '33.00', 40, '40.00', 1, 0, 1, 'PROD_0136', 2, 1, NULL, '2022-04-10 08:47:07'),
(137, 1, 2, 137, 'MINUTE MAID MANGO 400ML', '58.00', 70, '70.00', 1, 0, 1, 'PROD_0137', 2, 1, NULL, '2022-04-10 08:47:07'),
(138, 1, 2, 138, 'NOVIDA 350ML', '33.00', 40, '40.00', 1, 0, 1, 'PROD_0138', 2, 1, NULL, '2022-04-10 08:47:07'),
(139, 1, 2, 139, 'COKE 200ML', '15.00', 20, '20.00', 1, 0, 1, 'PROD_0139', 2, 1, NULL, '2022-04-10 08:47:07'),
(140, 1, 2, 140, 'SPRITE 200ML', '15.00', 20, '20.00', 1, 0, 1, 'PROD_0140', 2, 1, NULL, '2022-04-10 08:47:07'),
(141, 1, 2, 141, 'FANTA ORANGE 200ML', '15.00', 20, '20.00', 1, 0, 1, 'PROD_0141', 2, 1, NULL, '2022-04-10 08:47:07'),
(142, 1, 2, 142, 'FANTA BLACKCURRENT 200ML', '15.00', 20, '20.00', 1, 0, 1, 'PROD_0142', 2, 1, NULL, '2022-04-10 08:47:07'),
(143, 1, 2, 143, 'MINUTE MAID 350ML', '33.00', 40, '40.00', 1, 0, 1, 'PROD_0143', 2, 1, NULL, '2022-04-10 08:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `items_three`
--

CREATE TABLE `items_three` (
  `item_id` int NOT NULL,
  `brand_id` varchar(50) DEFAULT NULL,
  `brand_model_id` varchar(50) DEFAULT NULL,
  `package_type_id` varchar(50) DEFAULT NULL,
  `tax_type_id` int NOT NULL DEFAULT '4',
  `specify` varchar(30) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `attribute` varchar(50) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `ship_number` varchar(20) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `buying_price` decimal(10,2) NOT NULL,
  `marked_price` double NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `capacity` int DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `model_year` int DEFAULT NULL,
  `imei_one` varchar(50) DEFAULT NULL,
  `imei_two` varchar(50) DEFAULT NULL,
  `narrative` text,
  `barcode` varchar(256) DEFAULT NULL,
  `reference` text,
  `reorder_level` int DEFAULT NULL,
  `opening_stock` int DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_three`
--

INSERT INTO `items_three` (`item_id`, `brand_id`, `brand_model_id`, `package_type_id`, `tax_type_id`, `specify`, `category`, `attribute`, `unit`, `ship_number`, `item_name`, `buying_price`, `marked_price`, `selling_price`, `capacity`, `color`, `model_year`, `imei_one`, `imei_two`, `narrative`, `barcode`, `reference`, `reorder_level`, `opening_stock`, `time_stamp`) VALUES
(1, 'Coca Cola', NULL, NULL, 3, 'item_import', 'Category A', NULL, 'Crates', NULL, 'Item A', '0.00', 1000, '1200.00', NULL, 'Red', NULL, NULL, NULL, 'Test Narrative', 'U388389', 'J22I141NAM', 5, 10, '2021-03-22 15:09:50'),
(2, 'Pepsi', NULL, NULL, 3, 'item_import', 'Category B', NULL, 'Crates', NULL, 'Item B', '0.00', 800, '1000.00', NULL, 'Orange', NULL, NULL, NULL, 'Test Narrative', 'U388390', 'J22I141NAM', 10, 15, '2021-03-22 15:09:50'),
(3, 'Menengai', NULL, NULL, 3, 'item_import', 'Category A', NULL, 'Kgs', NULL, 'Item C', '0.00', 1200, '1500.00', NULL, 'White', NULL, NULL, NULL, 'Test Narrative', 'U388391', 'J22I141NAM', 15, 20, '2021-03-22 15:09:50'),
(4, 'Brand Y', NULL, NULL, 3, 'item_import', 'Category F', NULL, 'Boxes', NULL, 'Item D', '0.00', 500, '550.00', NULL, 'Black', NULL, NULL, NULL, 'Test Narrative', 'U388392', 'J22I141NAM', 5, 10, '2021-03-22 15:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `items_two`
--

CREATE TABLE `items_two` (
  `item_id` int NOT NULL,
  `brand_id` varchar(50) DEFAULT NULL,
  `brand_model_id` varchar(50) DEFAULT NULL,
  `package_type_id` varchar(50) DEFAULT NULL,
  `tax_type_id` int NOT NULL DEFAULT '4',
  `specify` varchar(30) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `attribute` varchar(50) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `ship_number` varchar(20) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `buying_price` decimal(10,2) NOT NULL,
  `marked_price` double NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `capacity` int DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `model_year` int DEFAULT NULL,
  `imei_one` varchar(50) DEFAULT NULL,
  `imei_two` varchar(50) DEFAULT NULL,
  `narrative` text,
  `barcode` varchar(256) DEFAULT NULL,
  `reference` text,
  `reorder_level` int DEFAULT NULL,
  `opening_stock` int DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
-- Table structure for table `item_requests`
--

CREATE TABLE `item_requests` (
  `item_request_id` int NOT NULL,
  `item_id` int NOT NULL,
  `entity_id` int NOT NULL,
  `item_store_id` int DEFAULT NULL,
  `store_id` int DEFAULT NULL,
  `approver_id` int DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `narrative` text,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_returned`
--

CREATE TABLE `item_returned` (
  `item_return_id` int NOT NULL,
  `entity_id` int NOT NULL,
  `item_id` int NOT NULL,
  `item_status_id` int NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `item_returned`
--
DELIMITER $$
CREATE TRIGGER `item_returned_update_model_count` AFTER INSERT ON `item_returned` FOR EACH ROW BEGIN
    
    DECLARE new_model_id integer;
    DECLARE return_type integer;

    SET return_type := NEW.item_status_id;

    SET new_model_id := (SELECT brand_model_id FROM items WHERE item_id = NEW.item_id LIMIT 1);

    IF return_type = 2 THEN
      
      UPDATE brand_models SET available_qty = available_qty - 1 WHERE brand_model_id = new_model_id;
    ELSEIF return_type = 4 THEN
        
        UPDATE brand_models SET available_qty = available_qty + 1 WHERE brand_model_id = new_model_id;
    END IF;
    
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `item_status`
--

CREATE TABLE `item_status` (
  `item_status_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `item_status_name` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(10) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_status`
--

INSERT INTO `item_status` (`item_status_id`, `org_id`, `item_status_name`, `active`, `narrative`, `time_stamp`) VALUES
(1, 1, 'Purchased', 1, NULL, '2020-08-06 14:24:44'),
(2, 1, 'Purchase return', 1, NULL, '2020-08-06 14:24:44'),
(3, 1, 'Sold', 1, NULL, '2020-08-06 14:24:44'),
(4, 1, 'Sale return', 1, NULL, '2020-08-06 14:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `loan_types`
--

CREATE TABLE `loan_types` (
  `loan_type_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `loan_type_name` varchar(100) NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_types`
--

INSERT INTO `loan_types` (`loan_type_id`, `org_id`, `loan_type_name`, `active`, `narrative`, `time_stamp`) VALUES
(1, 1, 'Business Loan', 1, NULL, '2020-02-16 15:48:18'),
(2, 1, 'Personal Loan', 1, NULL, '2020-02-16 15:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `movement_records`
--

CREATE TABLE `movement_records` (
  `movement_record_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '0',
  `entity_id` int NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `date_time` varchar(20) DEFAULT NULL,
  `active` int NOT NULL DEFAULT '0',
  `narrative` text,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movement_records`
--

INSERT INTO `movement_records` (`movement_record_id`, `org_id`, `entity_id`, `latitude`, `longitude`, `date_time`, `active`, `narrative`, `time_stamp`) VALUES
(11, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2020-04-08 18:34:38'),
(12, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2020-04-08 18:34:38'),
(13, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2020-04-08 18:34:38'),
(14, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2020-04-08 18:34:38'),
(15, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2020-04-08 18:34:38'),
(16, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2020-04-08 18:43:02'),
(17, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2020-04-08 18:43:02'),
(18, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2020-04-08 18:43:02'),
(19, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2020-04-08 18:43:02'),
(20, 1, 2, '1.343434', '34424', '23:11', 0, NULL, '2020-04-08 18:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `transaction_type_id` int NOT NULL,
  `entity_id` int NOT NULL,
  `customer_supplier_id` int DEFAULT NULL,
  `payment_mode_id` int NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `eating_table_id` int DEFAULT NULL,
  `date_time` varchar(255) NOT NULL,
  `service_charge` varchar(255) NOT NULL,
  `tax_charge` decimal(10,2) DEFAULT '0.00',
  `net_amount` varchar(255) NOT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `paid_status` tinyint(1) NOT NULL DEFAULT '0',
  `paid_amount` double DEFAULT NULL,
  `paying_balance` double DEFAULT NULL,
  `change_return` double DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `payment_due` date DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `narrative` text,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int NOT NULL,
  `transaction_type_id` int DEFAULT NULL,
  `store_id` int DEFAULT NULL,
  `order_id` int NOT NULL,
  `item_id` int NOT NULL,
  `qty` varchar(255) NOT NULL,
  `tax_id` int NOT NULL,
  `buying_price` double DEFAULT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `order_payment_id` int NOT NULL,
  `order_id` int NOT NULL,
  `account_id` int NOT NULL,
  `entity_id` int NOT NULL COMMENT 'the person who trigers this action in the system',
  `payment_amount` double NOT NULL,
  `payment_date` date NOT NULL,
  `transaction_code` varchar(50) DEFAULT NULL,
  `other_reference` varchar(50) DEFAULT NULL,
  `bank_account_number` int DEFAULT NULL,
  `check_number` varchar(30) DEFAULT NULL,
  `check_maturity_date` date DEFAULT NULL,
  `paid_by` varchar(50) DEFAULT NULL,
  `narrative` varchar(150) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_purchases`
--

CREATE TABLE `order_purchases` (
  `order_purchase_id` int NOT NULL,
  `org_id` int NOT NULL,
  `order_id` int NOT NULL,
  `brand_model_id` int NOT NULL,
  `qty` int NOT NULL DEFAULT '1',
  `model_year` int DEFAULT NULL,
  `capacity` varchar(30) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `imei` varchar(50) DEFAULT NULL,
  `selling_price` double DEFAULT NULL,
  `price_estimate` double DEFAULT NULL,
  `image` text,
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orgs`
--

CREATE TABLE `orgs` (
  `org_id` int NOT NULL,
  `parent_org` int DEFAULT NULL,
  `org_name` varchar(100) NOT NULL,
  `address` varchar(156) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `currency_id` int NOT NULL DEFAULT '1',
  `country_id` int NOT NULL DEFAULT '1',
  `pos_mode` int NOT NULL DEFAULT '1',
  `default_sp` varchar(10) DEFAULT 'no',
  `narrative` text,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `orgs`
--

INSERT INTO `orgs` (`org_id`, `parent_org`, `org_name`, `address`, `email`, `phone`, `active`, `currency_id`, `country_id`, `pos_mode`, `default_sp`, `narrative`, `time_stamp`) VALUES
(1, NULL, 'iOSoft Technologies', 'Argwings Kodhek Road, Harlinghum Park, A5', 'ifno@jiwnaitech.com', '0738555869', 1, 1, 119, 0, 'no', '', '0000-00-00 00:00:00'),
(2, 2, 'Main Store', 'Test address', 'address@gmail.com', '070778966', 0, 1, 119, 1, 'yes', 'Main store narrative', '2021-01-13 20:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `package_types`
--

CREATE TABLE `package_types` (
  `package_type_id` int NOT NULL,
  `package_type_name` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int NOT NULL,
  `expense_id` int NOT NULL,
  `subaccount_type_id` int NOT NULL,
  `account_id` int NOT NULL,
  `reference` varchar(100) NOT NULL,
  `payment_amount` double NOT NULL,
  `payment_date` date NOT NULL,
  `check_no` varchar(20) NOT NULL,
  `created_by` int NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `narrative` varchar(50) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `payment_mode_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `payment_mode_name` varchar(100) NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `narrative` varchar(156) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_modes`
--

INSERT INTO `payment_modes` (`payment_mode_id`, `org_id`, `payment_mode_name`, `active`, `narrative`, `time_stamp`) VALUES
(1, 1, 'Bank', 1, NULL, '2020-02-16 14:34:19'),
(2, 1, 'Cash', 1, NULL, '2020-02-16 14:34:19'),
(3, 1, 'MPesa', 1, NULL, '2020-02-16 14:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `petty_cash`
--

CREATE TABLE `petty_cash` (
  `id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `entity_id` int NOT NULL,
  `term_id` int NOT NULL,
  `department_id` int NOT NULL,
  `account_id` int NOT NULL,
  `pettycash_amount` decimal(10,2) DEFAULT NULL,
  `pettycash_date` date DEFAULT NULL,
  `status_id` int NOT NULL,
  `paid_by` int DEFAULT NULL,
  `reference` varchar(100) NOT NULL,
  `narrative` varchar(200) DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approvedby_one` int DEFAULT NULL,
  `approvedby_two` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loan_disbursed_by_id` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `interest_method` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `interest_rate` decimal(10,2) DEFAULT NULL,
  `interest_period` enum('day','week','month','year') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loan_duration` int DEFAULT NULL,
  `default_loan_duration` int DEFAULT NULL,
  `default_loan_duration_type` enum('day','week','month','year') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `repayment_cycle` enum('daily','weekly','monthly','bi_monthly','quarterly','semi_annually','annually') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loan_fees_schedule` enum('dont_include','distribute_fees_evenly','charge_fees_on_released_date','charge_fees_on_first_payment','charge_fees_on_last_payment') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

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
  `role_id` int NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `permission` text NOT NULL,
  `narrative` text,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `room_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `room_type_id` int NOT NULL,
  `room_name` varchar(30) NOT NULL,
  `room_rate` double DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` text,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `org_id`, `room_type_id`, `room_name`, `room_rate`, `active`, `narrative`, `time_stamp`) VALUES
(1, 1, 1, 'A1', 2000, 0, '', '2020-10-14 05:34:04'),
(2, 1, 1, 'A2', 2000, 0, '', '2020-10-15 17:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `rooms_booked`
--

CREATE TABLE `rooms_booked` (
  `booked_room_id` int NOT NULL,
  `order_id` int NOT NULL,
  `room_id` int NOT NULL,
  `room_rate` double NOT NULL,
  `tax` double NOT NULL,
  `amount` double NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms_booked`
--

INSERT INTO `rooms_booked` (`booked_room_id`, `order_id`, `room_id`, `room_rate`, `tax`, `amount`, `time_stamp`) VALUES
(7, 18, 1, 2000, 0, 2000, '2020-10-16 07:02:02'),
(8, 23, 2, 2000, 0, 2000, '2020-10-19 03:34:28');

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
  `room_type_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `room_type_name` varchar(30) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` text,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`room_type_id`, `org_id`, `room_type_name`, `active`, `narrative`, `time_stamp`) VALUES
(1, 1, 'Delux', 1, '', '2020-10-14 05:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `sms_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `entity_id` int DEFAULT NULL,
  `template_id` int NOT NULL,
  `table_id` int NOT NULL,
  `table_name` varchar(30) NOT NULL,
  `code` varchar(30) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text,
  `sent` tinyint(1) NOT NULL DEFAULT '0',
  `narrative` varchar(20) DEFAULT NULL,
  `time_stamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `id` int NOT NULL,
  `credit_balance` decimal(18,2) NOT NULL,
  `credit_consumed` decimal(18,2) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `template_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `template_name` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` text,
  `time_stamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
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
  `station_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `category_id` int NOT NULL DEFAULT '1',
  `station_name` varchar(156) NOT NULL,
  `active` int NOT NULL,
  `narrative` varchar(256) DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `primary_phone` varchar(50) DEFAULT NULL,
  `secondary_phone` varchar(100) DEFAULT NULL,
  `other_phone` varchar(100) DEFAULT NULL,
  `primary_email` varchar(100) DEFAULT NULL,
  `secondary_email` varchar(100) DEFAULT NULL,
  `other_email` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`station_id`, `org_id`, `category_id`, `station_name`, `active`, `narrative`, `latitude`, `longitude`, `primary_phone`, `secondary_phone`, `other_phone`, `primary_email`, `secondary_email`, `other_email`, `time_stamp`) VALUES
(1, 1, 2, 'Nairobi Station', 0, 'Test', '', '', '+254790490000', '', '', 'onjulajared@gmail.com', 'onjulajared@gmail.com', 'onjulajared@gmail.com', '2020-02-16 05:49:28'),
(2, 1, 3, 'Mombasa Main Branch', 0, '', '', '', '07888858585', '25478888888', '', 'mombasa@mail.com', '', '', '2022-02-03 15:04:36'),
(3, 1, 8, 'Main Store A', 0, '', '', '', 'Main Store A', '07883838383', '', 'mainstore@mail.com', '', '', '2022-02-03 15:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '0',
  `status_name` varchar(50) NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `org_id`, `status_name`, `active`, `time_stamp`) VALUES
(1, 0, 'Completed', 1, '2020-04-02 12:21:26'),
(2, 0, 'Approved', 1, '2020-04-02 12:21:26'),
(3, 0, 'Pending', 1, '2020-04-02 12:21:26'),
(4, 0, 'Cancelled', 1, '2020-04-03 05:30:41'),
(5, 0, 'Suspended', 1, '2020-04-05 14:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `stock_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `stock_name` varchar(50) NOT NULL,
  `stock_date` date DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_lines`
--

CREATE TABLE `stock_lines` (
  `stock_line_id` int NOT NULL,
  `org_id` int DEFAULT NULL,
  `stock_id` int NOT NULL,
  `item_id` int DEFAULT NULL COMMENT 'can be used or not depending on the type of business',
  `item_store_id` int DEFAULT NULL,
  `brand_model_id` int DEFAULT NULL COMMENT 'can be used or not depending on the type of business',
  `item_quantity` double NOT NULL,
  `system_quantity` int DEFAULT NULL COMMENT 'quantity from the brand_models table',
  `active` int NOT NULL DEFAULT '1',
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subaccount_types`
--

CREATE TABLE `subaccount_types` (
  `subaccount_type_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `account_type_id` int NOT NULL,
  `subaccount_type_code` varchar(20) DEFAULT NULL,
  `subaccount_type_name` varchar(30) NOT NULL,
  `is_paymentmode` tinyint(1) NOT NULL DEFAULT '0',
  `narrative` text,
  `time_stamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
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
(31, 1, 3, 'TAXES', 'Taxes', 0, '', '2022-03-23 11:54:29'),
(32, 1, 3, 'PAYROLL', 'Payroll', 0, '', '2022-04-07 10:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `sub_departments`
--

CREATE TABLE `sub_departments` (
  `sub_department_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `department_id` int NOT NULL DEFAULT '1',
  `sub_department_name` varchar(156) NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `narrative` varchar(256) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_departments`
--

INSERT INTO `sub_departments` (`sub_department_id`, `org_id`, `department_id`, `sub_department_name`, `active`, `narrative`, `time_stamp`) VALUES
(1, 1, 1, 'Default', 1, 'NA', '2020-02-16 10:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int NOT NULL,
  `reference` varchar(20) NOT NULL,
  `entity_id` int NOT NULL,
  `subject` varchar(300) NOT NULL,
  `narrative` text NOT NULL,
  `status_id` int NOT NULL DEFAULT '3',
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sys_emailed`
--

CREATE TABLE `sys_emailed` (
  `sys_emailed_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `sys_email_id` int NOT NULL,
  `table_id` int DEFAULT NULL COMMENT 'primary key from the table',
  `table_name` varchar(50) DEFAULT NULL COMMENT 'table name from which you get the P.K for table_id',
  `emailed` tinyint(1) NOT NULL DEFAULT '0',
  `email_recipient` text,
  `email_cc` text,
  `email_subject` text,
  `email_body` text,
  `email_attachment` text,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_emailed`
--

INSERT INTO `sys_emailed` (`sys_emailed_id`, `org_id`, `sys_email_id`, `table_id`, `table_name`, `emailed`, `email_recipient`, `email_cc`, `email_subject`, `email_body`, `email_attachment`, `time_stamp`) VALUES
(5, 0, 1, 13, 'entitys', 1, 'reagan.nyumbani@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/corona/pages/email_verification/?e=$2y$10$M9Rla1SF6GZ7XW4ijr./nuru6L7pbxONObgJHxAxoPn6xA9RBFK6O<br><p><b>You account details include</b> </p><p><b>Username: </b>reagan.nyumbani@gmail.com </p> <p><b>Password: </b>RoSFXz </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2020-04-05 08:03:29'),
(6, 0, 1, 14, 'entitys', 1, 'omondireaggan@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/corona/pages/email_verification/?e=$2y$10$NpoNj9h2zPuPMO.STX1y/OiOLA9dr39jN4HDUlBo6H7jhCuyuHK7a<br><p><b>You account details include</b> </p><p><b>Username: </b>omondireaggan@gmail.com </p> <p><b>Password: </b>m1ivbC </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2020-04-05 09:34:40'),
(7, 0, 1, 16, 'entitys', 1, 'onyangoreaggan@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/corona/pages/email_verification/?e=$2y$10$c1elpFdEiCIbT6sJ6LhO.ORfP2A7NyddpXGPMuL3T.CJZcerUn0yK<br><p><b>You account details include</b> </p><p><b>Username: </b>onyangoreaggan@gmail.com </p> <p><b>Password: </b>1234 </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2020-04-07 16:16:10'),
(8, 0, 1, 17, 'entitys', 1, 'onyangoreaggan@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/corona/pages/email_verification/?e=$2y$10$ajtL.g9y2h0XshBucbwp..xQ0KuSFeZawZdhb7YBGK/wWMb0sGsia<br><p><b>You account details include</b> </p><p><b>Username: </b>onyangoreaggan@gmail.com </p> <p><b>Password: </b>1234 </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2020-04-07 16:36:09'),
(9, 0, 1, 18, 'entitys', 1, 'onyangoreaggan@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/corona/pages/email_verification/?e=$2y$10$oYN5mfBONbKxWFjltRHPounSTcn77G/5IV4HZLKNJ9B0ZKQX6QAny<br><p><b>You account details include</b> </p><p><b>Username: </b>onyangoreaggan@gmail.com </p> <p><b>Password: </b>1234 </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2020-04-07 16:36:40'),
(10, 0, 1, 35, 'entitys', 1, 'ken@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/jtlpos/pages/email_verification/?e=$2y$10$pngaMdg6CEZZRUrZQa0/LeQdnl/s3WNvh6ZU8eT1yKoeIphBjAG.G<br><p><b>You account details include</b> </p><p><b>Username: </b>ken@gmail.com </p> <p><b>Password: </b>34LMwG </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2020-10-13 03:35:53'),
(11, 0, 1, 36, 'entitys', 1, 'mich@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/jtlpos/pages/email_verification/?e=$2y$10$YRMmeDjkoaNRpQC1AthbCew892GGpP9WfPhvojagrQJ5R.SIprU2m<br><p><b>You account details include</b> </p><p><b>Username: </b>mich@gmail.com </p> <p><b>Password: </b>UcTu3A </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2020-10-13 03:41:55'),
(12, 0, 1, 37, 'entitys', 0, 'ken@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/jtlpos/pages/email_verification/?e=$2y$10$boPoB7NTda2wUw99hBWuPudrq5QLAYoNkFg8CMEX3qKotps02dhRC<br><p><b>You account details include</b> </p><p><b>Username: </b>ken@gmail.com </p> <p><b>Password: </b>1MsZIP </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2020-10-13 03:46:11'),
(13, 0, 1, 38, 'entitys', 1, 'ken@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/jtlpos/pages/email_verification/?e=$2y$10$InLvtDPpplkdym1H.NvBhOXk80sxn1rYmZL9V0pQCaiS3EPedjKXO<br><p><b>You account details include</b> </p><p><b>Username: </b>ken@gmail.com </p> <p><b>Password: </b>kTsYEC </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2020-10-13 03:47:57'),
(14, 0, 1, 39, 'entitys', 1, 'akinyi@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/jtlpos/pages/email_verification/?e=$2y$10$EXYUcdxkKnttItWDdhKZ8ucnZrZhJtcfLrzNt93REkuq0gCA2Lp72<br><p><b>You account details include</b> </p><p><b>Username: </b>akinyi@gmail.com </p> <p><b>Password: </b>hm4iup </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2020-10-13 04:02:57'),
(15, 0, 1, 40, 'entitys', 1, 'robert@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/jtlpos/pages/email_verification/?e=$2y$10$RCAwsdZBnaxXRjkdXKH4ZOodHdEbKtuPoEAwXLfdW9s/LdIX2zEyy<br><p><b>You account details include</b> </p><p><b>Username: </b>robert@gmail.com </p> <p><b>Password: </b>2gXjto </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2020-10-13 14:49:41'),
(16, 0, 1, 41, 'entitys', 1, 'robert@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/jtlpos/pages/email_verification/?e=$2y$10$BfbRKfuR5ZoWpLqrCsjkkOmaUAozIumQKzBbq3YiWDx4uOl.NdXMK<br><p><b>You account details include</b> </p><p><b>Username: </b>robert@gmail.com </p> <p><b>Password: </b>ovYVq2 </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2020-10-13 14:51:45'),
(17, 0, 1, 42, 'entitys', 1, 'nick@gnail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/jtlpos/pages/email_verification/?e=$2y$10$e..yMbvi6Ws9nQrCOZRLfukPobN1e/ymy7mIKChNptmSOH1LiGFdu<br><p><b>You account details include</b> </p><p><b>Username: </b>nick@gnail.com </p> <p><b>Password: </b>1oZOfA </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2020-10-13 15:56:03'),
(18, 0, 1, 43, 'entitys', 1, 'gladys@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://localhost:8080/jtlpos/pages/email_verification/?e=$2y$10$YjSOp6WkQfDcUhTabu8at.mxJ50MXt.RDeiAR/uMZpRCU65j9/ILm<br><p><b>You account details include</b> </p><p><b>Username: </b>gladys@gmail.com </p> <p><b>Password: </b>tKUslv </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2020-10-13 16:48:01'),
(19, 0, 1, 63, 'entitys', 0, 'ta485590@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://inventory.jiwanitech.com/pages/email_verification/?e=$2y$10$ZJLh5XaKD6Af.mCGFFXVdu4ap7rjSx2qK29QOq/V3I3aoyVxP95.e<br><p><b>You account details include</b> </p><p><b>Username: </b>ta485590@gmail.com </p> <p><b>Password: </b>VaK7lD </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2021-04-01 07:41:11'),
(20, 0, 1, 64, 'entitys', 0, 'liquorcabinett@gmail.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://inventory.jiwanitech.com/pages/email_verification/?e=$2y$10$3zffdBBBztw5cMlZ5jaq8.sIdhiu9gt8LhakuMGJI.kHdDqipZ14.<br><p><b>You account details include</b> </p><p><b>Username: </b>liquorcabinett@gmail.com </p> <p><b>Password: </b>Jxd8BP </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2021-04-01 07:43:26'),
(21, 0, 1, 65, 'entitys', 0, 'okinywa@yahoo.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://inventory.jiwanitech.com/pages/email_verification/?e=$2y$10$Vk19LGdTvP23ZJnWegXcN.MNC2MV9pWchMRRCRNgeMWAS67Edq3va<br><p><b>You account details include</b> </p><p><b>Username: </b>okinywa@yahoo.com </p> <p><b>Password: </b>Yz4Zm8 </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2021-08-19 08:01:02'),
(22, 0, 1, 66, 'entitys', 0, 'okinyua2@yahoo.com', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://inventory.jiwanitech.com/pages/email_verification/?e=$2y$10$Hpg9nLnuUHis4vzJIsOKKOz7L.L7sHiY1XCeIKFFR1sv4V9KfFIYK<br><p><b>You account details include</b> </p><p><b>Username: </b>okinyua2@yahoo.com </p> <p><b>Password: </b>3HsuAn </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2021-08-19 08:09:15'),
(23, 0, 1, 67, 'entitys', 0, 'jonjula@iosofttech.co.ke', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://inventory.jiwanitech.com/pages/email_verification/?e=$2y$10$hOpc0/57GOqK6WLkORA9i.Vdux4JFzhLQs7tWFzZLnlBi6ba6kEXm<br><p><b>You account details include</b> </p><p><b>Username: </b>jonjula@iosofttech.co.ke </p> <p><b>Password: </b>5qW9lm </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-02-03 16:05:21'),
(24, 0, 1, 68, 'entitys', 0, 'reagan@iosofttech.co.ke', NULL, 'Account Details and Email Verification - KOMESHA CORONA', 'You account has been successfully created with the Ministry of Kenya.<br>\r\n                 You have received this email because you have an account created with us. If you are not aware \r\n                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>http://inventory.jiwanitech.com/pages/email_verification/?e=$2y$10$7LCufSRgMJVECeJNiyVcSeUXb1tFvx8qLNyeJiS/8Bi/VUMlTMrle<br><p><b>You account details include</b> </p><p><b>Username: </b>reagan@iosofttech.co.ke </p> <p><b>Password: </b>f1Cog7 </p> <h5>Thank you</h5><small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>', NULL, '2022-02-03 16:07:06'),
(25, 1, 1, 1, 'support', 0, 'info@jiwanitech.com', 'jiwanilimited@gmail.com', 'This is Test One', 'Hello world<p>\r\n                            Regards,\r\n                            SA  <br/>\r\n                            Phone: 0739698964 <br/>\r\n                            Email: admin <br/>\r\n                        </p>', NULL, '2022-03-21 06:18:20'),
(26, 1, 1, 1, 'support', 0, 'info@jiwanitech.com', 'jiwanilimited@gmail.com', 'This is Test One', 'dfadfasas<p>\r\n                            Regards,\r\n                            SA  <br/>\r\n                            Phone: 0739698964 <br/>\r\n                            Email: admin <br/>\r\n                        </p>', NULL, '2022-03-21 06:21:23'),
(27, 1, 1, 1, 'support', 0, 'info@jiwanitech.com', 'jiwanilimited@gmail.com', 'This is Test One', 'Another one<p>\r\n                            Regards,\r\n                            SA  <br/>\r\n                            Phone: 0739698964 <br/>\r\n                            Email: admin <br/>\r\n                        </p>', NULL, '2022-03-21 06:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `sys_emails`
--

CREATE TABLE `sys_emails` (
  `sys_email_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '0',
  `email_type` varchar(50) NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `narrative` text,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_emails`
--

INSERT INTO `sys_emails` (`sys_email_id`, `org_id`, `email_type`, `active`, `narrative`, `time_stamp`) VALUES
(1, 0, 'Account Creation', 1, NULL, '2020-04-04 19:56:26'),
(2, 0, 'Password Reset', 1, NULL, '2020-04-04 19:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `sys_logs`
--

CREATE TABLE `sys_logs` (
  `sys_log_id` int NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `computer` varchar(400) NOT NULL,
  `operator` varchar(100) NOT NULL,
  `source` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `source_id` int DEFAULT NULL,
  `execution_id` int DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `task` text,
  `narrative` text,
  `time_stamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
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
(284, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-05 14:04:40', NULL, NULL, NULL, '2022-04-05 15:34:40'),
(285, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-06 09:04:45', NULL, NULL, NULL, '2022-04-06 10:05:45'),
(286, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-07 08:04:31', NULL, NULL, NULL, '2022-04-07 09:50:31'),
(287, 'add_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1980, NULL, '2022-04-07 10:04:58', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_id\":\"16\",\"account_code\":\"800003\",\"account_name\":\"NHIF\",\"opening_balance\":\"0\",\"is_key\":\"1\",\"other_category\":\"\",\"active\":true,\"narrative\":\"\",\"created_by\":\"1\"}', '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_id\":\"16\",\"account_code\":\"800003\",\"account_name\":\"NHIF\",\"opening_balance\":\"0\",\"is_key\":\"1\",\"other_category\":\"\",\"active\":true,\"narrative\":\"\",\"created_by\":\"1\"}', '2022-04-07 10:13:58'),
(288, 'add_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1981, NULL, '2022-04-07 10:04:23', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_id\":\"16\",\"account_code\":\"800004\",\"account_name\":\"NSSF\",\"opening_balance\":\"0\",\"is_key\":\"1\",\"other_category\":\"\",\"active\":true,\"narrative\":\"\",\"created_by\":\"1\"}', '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_id\":\"16\",\"account_code\":\"800004\",\"account_name\":\"NSSF\",\"opening_balance\":\"0\",\"is_key\":\"1\",\"other_category\":\"\",\"active\":true,\"narrative\":\"\",\"created_by\":\"1\"}', '2022-04-07 10:14:23'),
(289, 'add_subaccount', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', 'subaccount_types', 'admin', 32, NULL, '2022-04-07 10:04:02', NULL, '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_code\":\"PAYROLL\",\"subaccount_type_name\":\"Payroll\",\"is_paymentmode\":\"0\",\"narrative\":\"\"}', '{\"org_id\":\"1\",\"account_type_id\":\"3\",\"subaccount_type_code\":\"PAYROLL\",\"subaccount_type_name\":\"Payroll\",\"is_paymentmode\":\"0\",\"narrative\":\"\"}', '2022-04-07 10:31:02'),
(290, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1979, NULL, '2022-04-07 10:04:26', NULL, '{\"account_type_id\":\"3\",\"subaccount_type_id\":\"32\",\"account_code\":\"800002\",\"account_name\":\"Salaries\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '{\"account_type_id\":\"3\",\"subaccount_type_id\":\"32\",\"account_code\":\"800002\",\"account_name\":\"Salaries\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '2022-04-07 10:31:26'),
(291, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1980, NULL, '2022-04-07 10:04:38', NULL, '{\"account_type_id\":\"3\",\"subaccount_type_id\":\"32\",\"account_code\":\"800003\",\"account_name\":\"NHIF\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '{\"account_type_id\":\"3\",\"subaccount_type_id\":\"32\",\"account_code\":\"800003\",\"account_name\":\"NHIF\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '2022-04-07 10:31:38'),
(292, 'update_account', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', 'accounts', 'admin', 1981, NULL, '2022-04-07 10:04:46', NULL, '{\"account_type_id\":\"3\",\"subaccount_type_id\":\"32\",\"account_code\":\"800004\",\"account_name\":\"NSSF\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '{\"account_type_id\":\"3\",\"subaccount_type_id\":\"32\",\"account_code\":\"800004\",\"account_name\":\"NSSF\",\"opening_balance\":\"0.00\",\"other_category\":\"\",\"is_key\":\"1\",\"active\":true,\"narrative\":\"\"}', '2022-04-07 10:31:46'),
(293, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-07 09:04:10', NULL, NULL, NULL, '2022-04-07 10:59:10'),
(294, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-07 09:04:27', NULL, NULL, NULL, '2022-04-07 10:59:27'),
(295, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-105-generic #119-Ubuntu SMP Mon Mar 7 18:49:24 UTC 2022 x86_64\" }', '2', '', '', NULL, NULL, '2022-04-07 11:04:56', NULL, NULL, NULL, '2022-04-07 12:41:56'),
(296, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-107-generic #121-Ubuntu SMP Thu Mar 24 16:04:27 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-08 10:04:50', NULL, NULL, NULL, '2022-04-08 11:02:50'),
(297, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-107-generic #121-Ubuntu SMP Thu Mar 24 16:04:27 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-08 13:04:00', NULL, NULL, NULL, '2022-04-08 14:38:00'),
(298, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-107-generic #121-Ubuntu SMP Thu Mar 24 16:04:27 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-09 15:04:49', NULL, NULL, NULL, '2022-04-09 16:54:49'),
(299, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-107-generic #121-Ubuntu SMP Thu Mar 24 16:04:27 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-09 20:04:05', NULL, NULL, NULL, '2022-04-09 21:06:05'),
(300, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-107-generic #121-Ubuntu SMP Thu Mar 24 16:04:27 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-10 06:04:19', NULL, NULL, NULL, '2022-04-10 07:59:19'),
(301, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-107-generic #121-Ubuntu SMP Thu Mar 24 16:04:27 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-10 08:04:45', NULL, NULL, NULL, '2022-04-10 09:12:45'),
(302, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-107-generic #121-Ubuntu SMP Thu Mar 24 16:04:27 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-10 11:04:54', NULL, NULL, NULL, '2022-04-10 12:53:54'),
(303, 'login', '{\"hostname\" : \"jiwani\" , \"os\" : \"Linux jiwani 5.4.0-107-generic #121-Ubuntu SMP Thu Mar 24 16:04:27 UTC 2022 x86_64\" }', '1', '', '', NULL, NULL, '2022-04-10 11:04:45', NULL, NULL, NULL, '2022-04-10 12:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `tax_types`
--

CREATE TABLE `tax_types` (
  `tax_type_id` int NOT NULL,
  `tax_type_name` varchar(100) NOT NULL,
  `tax_rate` decimal(5,2) DEFAULT NULL,
  `narrative` varchar(256) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax_types`
--

INSERT INTO `tax_types` (`tax_type_id`, `tax_type_name`, `tax_rate`, `narrative`, `active`, `time_stamp`) VALUES
(1, 'VAT', '16.00', 'Value Added Tax', 1, '2019-11-20 10:06:48'),
(2, 'Excempted', '0.00', '', 1, '2019-11-24 13:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int NOT NULL,
  `term_id` int NOT NULL,
  `fiscal_year` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `active` int NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `id` int NOT NULL,
  `column_one` text NOT NULL,
  `column_two` text NOT NULL,
  `column_three` text NOT NULL,
  `column_four` text NOT NULL,
  `column_five` text NOT NULL,
  `column_six` date DEFAULT NULL,
  `column_seven` int DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tlj`
--

INSERT INTO `tlj` (`id`, `column_one`, `column_two`, `column_three`, `column_four`, `column_five`, `column_six`, `column_seven`, `time_stamp`) VALUES
(1, '$2y$10$v7ReRjHEfrke1sqe5W14sOHAgIWo073f8y1W9AWSm5uxAN95sEfS.', '$2y$10$D2P2TDnXCXHw0mlRi2nIiu7bdLcGqNKApDanKUSsXr78PFblA78US', '$2y$10$6/phcbmbibUqIAKJrquZa.mAFSkZGQacOg5AtNVO9NgqWpStBJ4Sq', '$2y$10$ejn8rcZWai9chFr5puFQmu5c.H3bKE6ICyooJtesvAqsPLvaJAXb2', '', '2048-04-17', 10000, '2020-11-18 11:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_types`
--

CREATE TABLE `transaction_types` (
  `transaction_type_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `transaction_type_name` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_types`
--

INSERT INTO `transaction_types` (`transaction_type_id`, `org_id`, `transaction_type_name`, `active`, `narrative`, `time_stamp`) VALUES
(1, 1, 'Cash Sale', 1, NULL, '2020-04-11 21:50:32'),
(2, 1, 'Cash Purchase', 1, NULL, '2020-04-11 21:50:32'),
(3, 1, 'Credit  Sale', 1, NULL, '2020-04-11 21:50:32'),
(4, 1, 'Credit Purchase', 1, NULL, '2020-04-11 21:50:32'),
(5, 1, 'Room Booking', 1, NULL, '2020-08-26 12:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `narrative` varchar(256) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_name`, `active`, `narrative`, `time_stamp`) VALUES
(1, 'Boxes', 1, 'Boxes in stock', '2019-11-20 11:28:25'),
(2, 'Kgs', 1, '', '2019-11-20 11:28:38'),
(4, 'Bottles', 1, '', '2020-09-24 06:47:30'),
(5, 'Pcs', 1, '', '2020-09-24 06:47:35'),
(6, 'Tots', 1, '', '2020-10-31 21:25:35'),
(7, 'Galans', 1, '', '2020-11-02 12:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `group_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `voucher_id` int NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `account_id` int NOT NULL,
  `account_type_id` int NOT NULL,
  `subaccount_type_id` int DEFAULT NULL,
  `fiscal_year_id` int NOT NULL,
  `term_id` int NOT NULL DEFAULT '1',
  `student_id` int DEFAULT NULL,
  `customer_supplier_id` int DEFAULT NULL,
  `table_id` int DEFAULT NULL,
  `table_name` varchar(50) DEFAULT NULL,
  `account_code` varchar(50) NOT NULL,
  `voucher_code` varchar(50) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `voucher_amount` double(18,2) DEFAULT NULL,
  `voucher_balance` decimal(10,2) DEFAULT NULL,
  `voucher_type` enum('cr','dr') DEFAULT NULL,
  `opening_closing_balance` enum('Opening','Closing') DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `is_duplicate` tinyint(1) NOT NULL DEFAULT '0',
  `is_ignore` tinyint(1) NOT NULL DEFAULT '0',
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `voucher_category` varchar(50) DEFAULT NULL,
  `narrative` text,
  `created_by` int DEFAULT NULL,
  `approved_by` varchar(50) DEFAULT NULL,
  `time_stamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_accounts`
-- (See below for the actual view)
--
CREATE TABLE `vw_accounts` (
`account_code` varchar(20)
,`account_id` int
,`account_name` varchar(50)
,`account_type_code` varchar(5)
,`account_type_id` int
,`account_type_name` varchar(20)
,`active` tinyint(1)
,`created_by` int
,`email` varchar(255)
,`firstname` varchar(255)
,`is_key` tinyint(1)
,`is_paymentmode` tinyint(1)
,`is_studentaccount` tinyint(1)
,`is_votehead` tinyint(1)
,`lastname` varchar(255)
,`narrative` text
,`opening_balance` double(18,2)
,`org_id` int
,`phone` varchar(255)
,`secondname` varchar(50)
,`student_id` int
,`subaccount_type_code` varchar(20)
,`subaccount_type_id` int
,`subaccount_type_name` varchar(30)
,`table_id` int
,`table_name` varchar(30)
,`time_stamp` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_balances`
-- (See below for the actual view)
--
CREATE TABLE `vw_balances` (
`account_code` varchar(50)
,`account_id` int
,`account_name` varchar(50)
,`account_type_id` int
,`approved_by` varchar(50)
,`created_by` int
,`fiscal_year_id` int
,`is_duplicate` tinyint(1)
,`is_ignore` tinyint(1)
,`is_studentaccount` tinyint(1)
,`narrative` text
,`opening_closing_balance` enum('Opening','Closing')
,`org_id` int
,`reference` varchar(50)
,`student_id` int
,`subaccount_type_id` int
,`subaccount_type_name` varchar(30)
,`table_id` int
,`table_name` varchar(50)
,`term_id` int
,`time_stamp` timestamp
,`transaction_date` date
,`voucher_amount` double(18,2)
,`voucher_code` varchar(50)
,`voucher_id` int
,`voucher_type` enum('cr','dr')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_general_ledger`
-- (See below for the actual view)
--
CREATE TABLE `vw_general_ledger` (
`account_code` varchar(50)
,`account_id` int
,`account_name` varchar(50)
,`account_type_code` varchar(5)
,`account_type_id` int
,`account_type_name` varchar(20)
,`approved_by` varchar(50)
,`created_by` int
,`customer_supplier_id` int
,`email` varchar(255)
,`firstname` varchar(255)
,`fiscal_year_id` int
,`is_paid` tinyint(1)
,`is_studentaccount` tinyint(1)
,`lastname` varchar(255)
,`narrative` text
,`opening_closing_balance` enum('Opening','Closing')
,`org_id` int
,`phone` varchar(255)
,`secondname` varchar(50)
,`student_id` int
,`subaccount_type_code` varchar(20)
,`subaccount_type_id` int
,`subaccount_type_name` varchar(30)
,`table_id` int
,`table_name` varchar(50)
,`term_id` int
,`time_stamp` timestamp
,`transaction_date` date
,`voucher_amount` double(18,2)
,`voucher_balance` decimal(10,2)
,`voucher_category` varchar(50)
,`voucher_code` varchar(50)
,`voucher_id` int
,`voucher_type` enum('cr','dr')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_my_close_day`
-- (See below for the actual view)
--
CREATE TABLE `vw_my_close_day` (
`amount` varchar(255)
,`bill_no` varchar(255)
,`brand_id` int
,`brand_model_id` int
,`brand_name` varchar(255)
,`capacity` int
,`change_return` double
,`color_id` int
,`color_name` varchar(50)
,`customer_name` text
,`customer_supplier_id` int
,`date_modified` timestamp
,`date_time` varchar(255)
,`discount` varchar(255)
,`entity_id` int
,`imei_one` varchar(50)
,`imei_two` varchar(50)
,`item_id` int
,`item_name` varchar(255)
,`marked_price` double
,`model_name` varchar(50)
,`net_amount` varchar(255)
,`order_id` int
,`order_item_id` int
,`org_id` int
,`paid_status` tinyint(1)
,`paying_balance` double
,`payment_mode_id` int
,`payment_mode_name` varchar(100)
,`qty` varchar(255)
,`rate` varchar(255)
,`tax_charge` decimal(10,2)
,`tax_id` int
,`time_stamp` timestamp
,`transaction_type_id` int
,`transaction_type_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `year_months`
--

CREATE TABLE `year_months` (
  `year_month_id` int NOT NULL,
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
  ADD PRIMARY KEY (`employee_month_id`),
  ADD UNIQUE KEY `uq_payroll` (`employee_id`,`fiscal_year_id`,`year_month_id`,`is_advance`) USING BTREE;

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
  MODIFY `account_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1982;

--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `account_type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `allowances`
--
ALTER TABLE `allowances`
  MODIFY `allowance_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `attribute_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `bank_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `brand_models`
--
ALTER TABLE `brand_models`
  MODIFY `brand_model_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budgeting`
--
ALTER TABLE `budgeting`
  MODIFY `budget_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `budget_breakdown`
--
ALTER TABLE `budget_breakdown`
  MODIFY `budget_breakdown_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `currency_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `db_backups`
--
ALTER TABLE `db_backups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deductibles`
--
ALTER TABLE `deductibles`
  MODIFY `deductible_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departmental_heads`
--
ALTER TABLE `departmental_heads`
  MODIFY `departmental_head_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `designation_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `eating_tables`
--
ALTER TABLE `eating_tables`
  MODIFY `eating_table_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `employee_allowances`
--
ALTER TABLE `employee_allowances`
  MODIFY `employee_allowance_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employee_bank_details`
--
ALTER TABLE `employee_bank_details`
  MODIFY `employee_bank_detail_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `employee_deductibles`
--
ALTER TABLE `employee_deductibles`
  MODIFY `employee_deductible_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `employee_month`
--
ALTER TABLE `employee_month`
  MODIFY `employee_month_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `entitys`
--
ALTER TABLE `entitys`
  MODIFY `entity_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `expense_type_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fiscal_years`
--
ALTER TABLE `fiscal_years`
  MODIFY `fiscal_year_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `income_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `income_payments`
--
ALTER TABLE `income_payments`
  MODIFY `income_payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `items_store`
--
ALTER TABLE `items_store`
  MODIFY `item_store_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `items_three`
--
ALTER TABLE `items_three`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items_two`
--
ALTER TABLE `items_two`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `item_requests`
--
ALTER TABLE `item_requests`
  MODIFY `item_request_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_returned`
--
ALTER TABLE `item_returned`
  MODIFY `item_return_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_status`
--
ALTER TABLE `item_status`
  MODIFY `item_status_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `loan_type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movement_records`
--
ALTER TABLE `movement_records`
  MODIFY `movement_record_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_payments`
--
ALTER TABLE `order_payments`
  MODIFY `order_payment_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_purchases`
--
ALTER TABLE `order_purchases`
  MODIFY `order_purchase_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orgs`
--
ALTER TABLE `orgs`
  MODIFY `org_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package_types`
--
ALTER TABLE `package_types`
  MODIFY `package_type_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `payment_mode_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `petty_cash`
--
ALTER TABLE `petty_cash`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms_booked`
--
ALTER TABLE `rooms_booked`
  MODIFY `booked_room_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `room_type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `sms_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_credit`
--
ALTER TABLE `sms_credit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms_templates`
--
ALTER TABLE `sms_templates`
  MODIFY `template_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `station_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `stock_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_lines`
--
ALTER TABLE `stock_lines`
  MODIFY `stock_line_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subaccount_types`
--
ALTER TABLE `subaccount_types`
  MODIFY `subaccount_type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sub_departments`
--
ALTER TABLE `sub_departments`
  MODIFY `sub_department_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_emailed`
--
ALTER TABLE `sys_emailed`
  MODIFY `sys_emailed_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sys_emails`
--
ALTER TABLE `sys_emails`
  MODIFY `sys_email_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sys_logs`
--
ALTER TABLE `sys_logs`
  MODIFY `sys_log_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `tax_types`
--
ALTER TABLE `tax_types`
  MODIFY `tax_type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tlj`
--
ALTER TABLE `tlj`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction_types`
--
ALTER TABLE `transaction_types`
  MODIFY `transaction_type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `voucher_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `year_months`
--
ALTER TABLE `year_months`
  MODIFY `year_month_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
