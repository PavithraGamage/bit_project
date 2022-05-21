-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 09:23 AM
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
-- Database: `bit`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` int(11) NOT NULL,
  `first_name` varchar(122) NOT NULL,
  `last_name` varchar(122) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(122) NOT NULL,
  `address_line_1` varchar(122) NOT NULL,
  `address_line_2` varchar(122) NOT NULL,
  `provinces` int(11) NOT NULL,
  `city` varchar(122) NOT NULL,
  `zip` int(6) NOT NULL,
  `order_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `first_name`, `last_name`, `phone`, `email`, `address_line_1`, `address_line_2`, `provinces`, `city`, `zip`, `order_id`) VALUES
(1, 'Nuwan', 'Samaranayake', '0757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 9, 'Bandaragama', 12530, '1'),
(2, 'Nuwan', 'Samaranayake', '757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 9, 'Bandaragama', 12530, '2'),
(3, 'Nuwan', 'Samaranayake', '757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 9, 'Bandaragama', 12530, '3'),
(4, 'Nuwan', 'Samaranayake', '757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 9, 'Bandaragama', 12530, '4'),
(5, 'Nuwan', 'Samaranayake', '757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 9, 'Bandaragama', 12530, '5'),
(6, 'Nuwan', 'Samaranayake', '757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 9, 'Bandaragama', 12530, '6'),
(7, 'Nuwan', 'Samaranayake', '0757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 9, 'Bandaragama', 12530, '7'),
(8, 'Nuwan', 'Samaranayake', '0757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 9, 'Bandaragama', 12530, '8'),
(9, 'Nuwan', 'Samaranayake', '0757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 9, 'Bandaragama', 12530, '9'),
(10, 'Nuwan', 'Samaranayake', '0757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 9, 'Bandaragama', 12530, '10'),
(11, 'Nuwan', 'Samaranayake', '0757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 9, 'Bandaragama', 12530, '11'),
(12, 'Pradeep', 'Kumar', '0757003672', 'pradeep@gmail.com', '258/E, Kaluthra Road', '', 9, 'Mathugama', 55123, '12'),
(13, 'Pradeep', 'Kumar', '0757003672', 'pradeep@gmail.com', '258/E, Kaluthra Road', '', 9, 'Mathugama', 55123, '13'),
(14, 'Pradeep', 'Kumar', '0757003672', 'pradeep@gmail.com', '258/E, Kaluthra Road', '', 9, 'Mathugama', 55123, '14'),
(15, 'Pradeep', 'Kumar', '0757003672', 'pradeep@gmail.com', '258/E, Kaluthra Road', '', 9, 'Mathugama', 55123, '15'),
(16, 'Geeth', 'Fonseka', '0757003682', 'geeth@gmail.com', '58/D, Kandy Road', '', 9, 'Kribathgoda', 12547, '16');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `status`) VALUES
(1, 'INTEL', 0),
(2, 'AMD', 0),
(3, 'ASUS', 0),
(4, 'MSI', 0),
(5, 'GIGABYTE', 0),
(6, 'ASROCK', 0),
(7, 'PNY', 0),
(8, 'SEAGATE', 0),
(9, 'SAPPHIRE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` longtext NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `cat_image`, `status`) VALUES
(1, 'PROCESSORS', 'A processor (CPU) is the logic circuitry that responds to and processes the basic instructions that drive a computer. The CPU is seen as the main and most crucial integrated circuitry (IC) chip in a computer, as it is responsible for interpreting most of computers commands.', 'processor.jpg', 0),
(2, 'MEMORY', 'Computer memory is the storage space in the computer, where data is to be processed and instructions required for processing are stored. The memory is divided into large number of small parts called cells. Each location or cell has a unique address, which varies from zero to memory size minus one.', 'memory.jpg', 0),
(3, 'GRAPHIC CARDS', 'A graphics card is a type of display adapter or video card installed within most computing devices to display graphical data with high clarity, color, definition and overall appearance.', 'Graphic Card.jpg', 0),
(4, 'STORAGE', 'Disk storage (also sometimes called drive storage) is a general category of storage mechanisms where data is recorded by various electronic, magnetic, optical, or mechanical changes to a surface layer of one or more rotating disks. A disk drive is a device implementing such a storage mechanism.', 'istockphoto-1297963606-170667a.jpg', 0),
(5, 'MOTHERBOARDS', 'A motherboard is a printed circuit board (PCB) that creates a kind of backbone allowing a variety of components to communicate, and that provides different connectors for components such as the central processing unit (CPU), graphics processing unit (GPU), memory, and storage. Most computers made today, including smartphones, tablets, notebooks, and desktop computers, use motherboards to pull everything together, but the only kind you’ll typically purchase yourself are those made for desktop PCs.', 'Intel-X299-CPU-Kaby-Lake-X-Article-3_0_0.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `courier_companies`
--

CREATE TABLE `courier_companies` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `contact_number_opp` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) NOT NULL,
  `tracking_url` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courier_companies`
--

INSERT INTO `courier_companies` (`company_id`, `company_name`, `contact_number`, `contact_number_opp`, `email`, `address_line_1`, `address_line_2`, `tracking_url`, `status`) VALUES
(1, 'Domestic Express (Pvt) Ltd', '0117759759', '0117759759', 'info@domex.lk', 'No.511', '10th Mile Post Rd,Boralesgamuwa', 'https://domex.lk/tracking.php?wbno=', 0),
(2, 'Prompt Xpress (Pvt) Ltd', '0122448764', '0122448769', 'customercare@promptxpress.lk', 'No. 40, Ferry Road,', 'Borupana,  Rathmalana, Sri Lanka', 'http://www.promptxpress.lk/TrackItem.aspx#', 0);

-- --------------------------------------------------------

--
-- Table structure for table `courier_status`
--

CREATE TABLE `courier_status` (
  `id` int(11) NOT NULL,
  `courier_status` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courier_status`
--

INSERT INTO `courier_status` (`id`, `courier_status`, `status`, `user_role_id`) VALUES
(1, 'In Review', 0, 1),
(2, 'Pending Payment', 0, 1),
(3, 'Transfer to Warehouse', 0, 1),
(4, 'On Hold', 0, 1),
(5, 'On Warehouse', 0, 3),
(6, 'Transfer to Delivery Process', 0, 3),
(7, 'Item Dispatch', 0, 2),
(8, 'Order Complete', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cus_id` int(11) NOT NULL,
  `contact_nmuber` varchar(10) NOT NULL,
  `address_l1` varchar(255) NOT NULL,
  `address_l2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cus_id`, `contact_nmuber`, `address_l1`, `address_l2`, `city`, `postal_code`, `user_id`, `province_id`) VALUES
(1, '0757003668', '58/D, Play Ground Road', '', 'Bandaragama', '12530', 4, 9),
(2, '0757003672', '258/E, Kaluthra Road', '', 'Mathugama', '55123', 7, 9),
(3, '0757003682', '58/D, Kandy Road', '', 'Kribathgoda', '12547', 8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_details`
--

CREATE TABLE `delivery_details` (
  `id` int(11) NOT NULL,
  `frist_name` varchar(122) NOT NULL,
  `last_name` varchar(122) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(122) NOT NULL,
  `address_line_1` varchar(122) NOT NULL,
  `address_line_2` varchar(122) NOT NULL,
  `city` text NOT NULL,
  `province_id` varchar(122) NOT NULL,
  `zip` int(6) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_details`
--

INSERT INTO `delivery_details` (`id`, `frist_name`, `last_name`, `phone`, `email`, `address_line_1`, `address_line_2`, `city`, `province_id`, `zip`, `order_id`) VALUES
(1, 'Nuwan', 'Samaranayake', '0757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 'Bandaragama', '9', 12530, 1),
(2, 'Nuwan', 'Samaranayake', '757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 'Bandaragama', '9', 12530, 2),
(3, 'Nuwan', 'Samaranayake', '757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 'Bandaragama', '9', 12530, 3),
(4, 'Nuwan', 'Samaranayake', '757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 'Bandaragama', '9', 12530, 4),
(5, 'Nuwan', 'Samaranayake', '757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 'Bandaragama', '9', 12530, 5),
(6, 'Nuwan', 'Samaranayake', '757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 'Bandaragama', '9', 12530, 6),
(7, 'Nuwan', 'Samaranayake', '0757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 'Bandaragama', '9', 12530, 7),
(8, 'Nuwan', 'Samaranayake', '0757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 'Bandaragama', '9', 12530, 8),
(9, 'Nuwan', 'Samaranayake', '0757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 'Bandaragama', '9', 12530, 9),
(10, 'Nuwan', 'Samaranayake', '0757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 'Bandaragama', '9', 12530, 10),
(11, 'Nuwan', 'Samaranayake', '0757003668', 'nuwan@gmail.com', '58/D, Play Ground Road', '', 'Bandaragama', '9', 12530, 11),
(12, 'Geeth', 'Fonseka', '0757003642', 'geeth@gmail.com', '246/D, Kandy Road', '', 'Kalaniya', '9', 51487, 12),
(13, 'Pradeep', 'Kumar', '0757003672', 'pradeep@gmail.com', '258/E, Kaluthra Road', '', 'Mathugama', '9', 55123, 13),
(14, 'Pradeep', 'Kumar', '0757003672', 'pradeep@gmail.com', '258/E, Kaluthra Road', '', 'Mathugama', '9', 55123, 14),
(15, 'Pradeep', 'Kumar', '0757003672', 'pradeep@gmail.com', '258/E, Kaluthra Road', '', 'Mathugama', '9', 55123, 15),
(16, 'Geeth', 'Fonseka', '0757003682', 'geeth@gmail.com', '58/D, Kandy Road', '', 'Kribathgoda', '9', 12547, 16);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `recorder_level` int(11) NOT NULL,
  `grn_price` int(100) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `discount_rate` int(11) NOT NULL,
  `item_description` longtext NOT NULL,
  `date` date NOT NULL,
  `stock` int(11) NOT NULL,
  `warranty_period` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `stock_status` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `item_notification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_image`, `item_name`, `sku`, `recorder_level`, `grn_price`, `unit_price`, `sale_price`, `discount_rate`, `item_description`, `date`, `stock`, `warranty_period`, `category_id`, `brand_id`, `model_id`, `stock_status`, `status`, `item_notification`) VALUES
(1, 'INTEL CORE I9-12900K PROCESSOR.png', 'INTEL CORE I9-12900K PROCESSOR', '11254488548', 4, 158400, 162000, 160500, 1, '3 Years Warranty\r\n\r\nTotal Cores\r\n16\r\n\r\n# of Performance-cores\r\n8\r\n\r\n# of Efficient-cores\r\n8\r\n\r\nTotal Threads\r\n24\r\n\r\nMax Turbo Frequency\r\n5.20 GHz\r\n\r\nIntel® Turbo Boost Max Technology 3.0 Frequency ‡\r\n5.20 GHz\r\n', '2022-03-16', 10, 1080, 1, 1, 7, 0, 0, 0),
(2, '1742-20210201100428-1720-20210111130433-Untitled-1 (1).png', 'AMD RYZEN 9 5950X', '112554889', 5, 178000, 199000, 0, 0, '3 Years Warranty\r\n\r\nSpecifications\r\n# of CPU Cores\r\n16\r\n# of Threads\r\n32\r\nBase Clock\r\n3.4GHz\r\nMax Boost Clock\r\nUp to 4.9GHz\r\nTotal L2 Cache\r\n8MB\r\nTotal L3 Cache\r\n64MB\r\nUnlocked\r\nYes\r\nCMOS\r\nTSMC 7nm FinFET\r\nPackage\r\nAM4', '2022-05-14', 20, 1080, 1, 2, 1, 0, 0, 0),
(3, '408-20220211123424-Z22oBYRhWe1vjuVu_setting_xxx_0_90_end_1000 (1).png', 'ASUS PHOENIX GT 1030 2GB OC GDDR5', '112554878', 5, 28750, 31500, 0, 0, 'Video Memory\r\n2GB GDDR5\r\nEngine Clock\r\nOC Mode - GPU Boost Clock : 1531 MHz , GPU Base Clock : 1278 MHz\r\nGaming Mode (Default) - GPU Boost Clock : 1506 MHz , GPU Base Clock : 1252 MHz\r\nCUDA Core\r\n384\r\nMemory Speed\r\n6008 MHz\r\nMemory Interface\r\n64-bit\r\nResolution\r\nDigital Max Resolution 7680 x 4320\r\nInterface\r\nYes x 1 (Native DVI-D)\r\nYes x 1 (Native HDMI 2.0b)\r\nHDCP Support Yes (2.2)\r\nMaximum Display Support\r\n3', '2022-05-14', 21, 1080, 3, 3, 15, 0, 0, 0),
(4, '1633-20220514125314-product_6_20180417115215_5ad56f6f0d388.png', 'MSI GT1030 AERO ITX 2GB', '11222254', 5, 25740, 31500, 28300, 10, '3 Years Warranty\r\n\r\nModel Name GeForce®\r\nGT 1030 AERO ITX 2G OC\r\nGraphics Processing Unit NVIDIA®\r\nGeForce®\r\nGT 1030\r\nInterface PCI Express 3.0 x16 (uses x4)\r\nCores 384 Units\r\nCore Clocks 1518 MHz / 1265 MHz\r\nMemory Speed 6008 MHz\r\nMemory 2GB GDDR5\r\nMemory Bus 64-bit\r\nOutput\r\nHDMI (Supports 4K@60Hz as specified in HDMI\r\n2.0b)', '2022-03-08', 6, 1080, 3, 4, 15, 0, 0, 0),
(5, '1644-20201029115006-Untitled-2 (3).png', 'Seagate IronWolf ST8000VN004 8TB 7200 RPM 256MB', '132457988', 5, 60000, 66500, 62500, 6, 'Features\r\nFeatures Optimized for NAS with AgileArray. AgileArray enables dual-plane balancing and RAID optimization in multi-bay environments, with the most advanced power management possible.\r\n\r\nActively protect your NAS with IronWolf Health Management focusing on prevention, intervention, and recovery.\r\n\r\nHigh performance means no lag time or downtime for users during workload traffic for the NAS. Seagate leads the competition with the highest-performing NAS drive portfolio.\r\n\r\nRotational Vibration (RV) sensors. First in its class of drives to include RV sensors to maintain high performance in multi-drive NAS enclosures.\r\n\r\nRange of capacities up to 16TB. More capacity options means more choices that will fit within the budget. Seagate provides a scalable solution for any NAS use-case scenario.\r\n\r\nDo more in multi-user environments. IronWolf provides a workload rate of 180TB/year. Multiple users can confidently upload and download data to the NAS server, knowing IronWolf can handle the workload, whether you are a creative professional or a small business.\r\n\r\nDesigned for always-on, always-accessible 24x7 performance. Access data on your NAS any time, remotely or on site.\r\n\r\n1M hours MTBF represents an improved total cost of ownership (TCO) over desktop drives with reduced maintenance costs.\r\nUsage For NAS systems', '2022-05-19', 22, 1080, 4, 8, 20, 0, 0, 0),
(6, '1941-20220119130951-900.png', 'GIGABYTE B660M GAMING AC DDR4', '1234578915', 5, 30000, 35000, 32000, 9, 'CPU\r\nLGA1700 socket: Support for 12th Generation Intel® Core™, Pentium® Gold and Celeron® Processors*\r\nL3 cache varies with CPU\r\n* Please refer to \"CPU Support List\" for more information.\r\nChipset\r\nIntel® B660 Express Chipset\r\nMemory\r\nSupport for DDR4 5333(O.C.)/ DDR4 5133(O.C.)/DDR4 5000(O.C.)/4933(O.C.)/4800(O.C.)/ 4700(O.C.)/ 4600(O.C.)/ 4500(O.C.)/ 4400(O.C.)/ 4300(O.C.)/4266(O.C.) / 4133(O.C.) / 4000(O.C.) / 3866(O.C.) / 3800(O.C.) / 3733(O.C.) / 3666(O.C.) / 3600(O.C.) / 3466(O.C.) / 3400(O.C.) / 3333(O.C.) / 3300(O.C.) / 3200/3000/2933/2666/2400/2133 MHz memory modules\r\n2 x DDR4 DIMM sockets supporting up to 64 GB (32 GB single DIMM capacity) of system memory\r\nDual channel memory architecture\r\nSupport for ECC Un-buffered DIMM 1Rx8/2Rx8 memory modules (operate in non-ECC mode)\r\nSupport for non-ECC Un-buffered DIMM 1Rx8/2Rx8/1Rx16 memory modules\r\nSupport for Extreme Memory Profile (XMP) memory modules\r\n(Please refer \"Memory Support List\" for more information.)\r\nOnboard Graphics', '2022-05-21', 13, 1080, 5, 5, 10, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `model_id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`model_id`, `model_name`, `status`, `category_id`) VALUES
(1, 'RYZEN 9', 0, 1),
(2, 'RYZEN 5', 0, 1),
(3, 'RYZEN 3', 0, 1),
(4, 'Core i3', 0, 1),
(5, 'Core i5', 0, 1),
(6, 'Core i7', 0, 1),
(7, 'Core i9', 0, 1),
(8, 'AMD A320', 0, 5),
(9, 'AMD A520', 0, 5),
(10, 'B450', 0, 5),
(11, 'AMD B550', 0, 5),
(12, 'INTEL B460', 0, 0),
(13, 'INTEL B560', 0, 0),
(14, 'INTEL B660', 0, 0),
(15, 'GT 1030', 0, 3),
(16, 'GT 730', 0, 3),
(17, 'GTX 1050Ti', 0, 3),
(18, 'GTX 1650', 0, 3),
(19, 'GTX 1660 Super', 0, 0),
(20, 'IRONWOLF', 0, 0),
(21, 'AMD B450', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `module_id` varchar(4) NOT NULL,
  `description` varchar(50) NOT NULL,
  `path` varchar(50) NOT NULL,
  `view` varchar(50) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `nav_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_id`, `description`, `path`, `view`, `icon`, `status`, `nav_order`) VALUES
('01', 'Staff Management', 'users/staff', '', 'fa fa-users', 0, 1),
('0101', 'Manage Staff', 'users/staff', 'add', '', 0, 0),
('0102', 'Manage Permissions', 'users/staff', 'add_permission', '', 0, 0),
('02', 'Module Management', 'users/modules', '', 'fa fa-list-ul', 0, 2),
('0201', 'Main Modules', 'users/modules', 'add', '', 0, 0),
('0202', 'Sub Modules', 'users/modules', 'add_sub', '', 0, 0),
('03', 'Customer Management', 'users/customers', '', 'fa fa-user-circle', 0, 3),
('0301', 'Manage Customers', 'users/customers', 'add', '', 0, 0),
('04', 'User Reports', 'reports/users', '', 'far fa-chart-bar', 0, 4),
('0401', 'Staff', 'reports/users', 'view', '', 0, 0),
('0402', 'Customers', 'reports/users', 'view_cus', '', 0, 0),
('0403', 'Staff Summary Report', 'reports/users', 'staff_summary', '', 0, 0),
('05', 'Brand Management', 'inventory/brands', '', 'fa fa-copyright', 0, 0),
('0501', 'Manage Brand', 'inventory/brands', 'add', '', 0, 0),
('06', 'Category Management', 'inventory/categories', '', 'fa fa-list', 0, 0),
('0601', 'Manage Category', 'inventory/categories', 'add', '', 0, 0),
('07', 'Items Management', 'inventory/items', '', 'fa fa-microchip', 0, 0),
('0701', 'Manage Items', 'inventory/items', 'add', '', 0, 0),
('08', 'Model Management', 'inventory/models', '', 'fa fa-desktop', 0, 0),
('0801', 'Manage Model', 'inventory/models', 'add', '', 0, 0),
('09', 'Item Specifications', 'inventory/specifications', '', 'fa fa-cogs', 0, 0),
('0901', 'Manage Specifications', 'inventory/specifications', 'add', '', 0, 0),
('10', 'Inventory Reports', 'reports/inventory', '', 'far fa-chart-bar', 0, 0),
('1001', 'Item Reports', 'reports/inventory', 'add', '', 0, 0),
('11', 'Delivery Companies', 'delivery/companies', '', 'fa fa-building', 0, 0),
('1101', 'Manage Companies', 'delivery/companies', 'add', '', 0, 0),
('1102', 'Delivery Charges', 'delivery/companies', 'add_delivery_chargers', '', 0, 0),
('12', 'Delivery Orders', 'delivery/orders', '', 'fa fa-cart-plus', 0, 0),
('1202', 'Manage Orders', 'delivery/orders', 'update', '', 0, 0),
('13', 'Delivery Status', 'delivery/status', '', 'fa fa-hourglass-start', 0, 0),
('1301', 'Manage Status', 'delivery/status', 'add_status', '', 0, 0),
('14', 'Delivery Reports', 'reports/deliveries', '', 'far fa-chart-bar', 0, 0),
('1401', 'Delivery', 'reports/deliveries', 'list', '', 0, 0),
('15', 'Order Management', 'orders/received', '', 'fa fa-cart-arrow-down', 0, 0),
('1501', 'Received Orders', 'orders/received', 'view', '', 0, 0),
('16', 'Process Orders', 'orders/process', '', 'fa fa-cart-plus', 0, 0),
('1601', 'Approved Orders', 'orders/process', 'add', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `order_total` int(11) NOT NULL,
  `total_discount` int(11) NOT NULL,
  `delivery_charge` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `courier_status` int(11) NOT NULL,
  `notifications` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_number`, `order_total`, `total_discount`, `delivery_charge`, `order_date`, `order_time`, `user_id`, `payment_id`, `grand_total`, `courier_status`, `notifications`) VALUES
(1, '202205140001', 321000, 3000, 9, '2022-05-14', '21:30:26', 4, 1, 318400, 8, 1),
(2, '202205140002', 188800, 4700, 9, '2022-05-14', '23:16:13', 4, 2, 184500, 8, 1),
(3, '202205140003', 392500, 4700, 9, '2022-05-14', '23:44:04', 4, 1, 388200, 8, 1),
(4, '202205150004', 816500, 9400, 9, '2022-05-15', '00:00:45', 4, 1, 807500, 8, 1),
(5, '202205150005', 193500, 1500, 9, '2022-05-15', '00:03:44', 4, 1, 192400, 7, 1),
(6, '202205150006', 193500, 4700, 9, '2022-05-15', '00:05:52', 4, 1, 189200, 6, 2),
(7, '202205160007', 361000, 1500, 9, '2022-05-16', '00:27:44', 4, 2, 359900, 2, 1),
(8, '202205160008', 162000, 1500, 9, '2022-05-16', '00:29:37', 4, 2, 160900, 2, 1),
(9, '202205160009', 199000, 0, 9, '2022-05-16', '00:31:12', 4, 1, 199400, 6, 3),
(10, '202205170010', 486000, 4500, 9, '2022-05-17', '20:06:29', 4, 2, 481900, 6, 2),
(11, '202205170011', 324000, 3000, 9, '2022-05-17', '20:35:43', 4, 1, 321400, 1, 1),
(12, '202205200012', 164500, 8000, 9, '2022-05-20', '00:24:40', 7, 1, 156900, 7, 3),
(13, '202205200013', 66500, 4000, 9, '2022-05-20', '01:34:59', 7, 1, 62900, 1, 1),
(14, '202205200014', 31500, 0, 9, '2022-05-20', '01:38:35', 7, 1, 31900, 1, 1),
(15, '202205200015', 324000, 3000, 9, '2022-05-20', '01:40:19', 7, 1, 321400, 1, 1),
(16, '202205210016', 70000, 6000, 9, '2022-05-21', '01:02:04', 8, 2, 64400, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders_company`
--

CREATE TABLE `orders_company` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `dispatch_date` date NOT NULL,
  `tracking_number` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_company`
--

INSERT INTO `orders_company` (`id`, `order_id`, `company_id`, `dispatch_date`, `tracking_number`, `status`) VALUES
(1, 1, 1, '2022-05-16', 22, 0),
(2, 2, 2, '2022-05-16', 15, 0),
(3, 4, 1, '2022-05-16', 564, 0),
(4, 3, 2, '2022-05-16', 48, 0),
(5, 5, 1, '2022-05-16', 854, 0),
(6, 12, 1, '2022-05-20', 587, 0),
(7, 16, 2, '2022-05-21', 125487, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `orders_items_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `grn_price` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`orders_items_id`, `order_id`, `item_id`, `item_qty`, `grn_price`, `unit_price`, `sale_price`) VALUES
(1, 1, 1, 2, 158400, 162000, 160500),
(2, 2, 4, 1, 25740, 31500, 28300),
(3, 2, 1, 1, 158400, 162000, 160500),
(4, 3, 4, 1, 25740, 31500, 28300),
(5, 3, 1, 1, 158400, 162000, 160500),
(6, 3, 2, 1, 178000, 199000, 0),
(7, 4, 1, 2, 158400, 162000, 160500),
(8, 4, 4, 2, 25740, 31500, 28300),
(9, 4, 2, 2, 178000, 199000, 0),
(10, 4, 3, 1, 28750, 31500, 0),
(11, 5, 3, 1, 28750, 31500, 0),
(12, 5, 1, 1, 158400, 162000, 160500),
(13, 6, 4, 1, 25740, 31500, 28300),
(14, 6, 1, 1, 158400, 162000, 160500),
(15, 7, 1, 1, 158400, 162000, 160500),
(16, 7, 2, 1, 178000, 199000, 0),
(17, 8, 1, 1, 158400, 162000, 160500),
(18, 9, 2, 1, 178000, 199000, 0),
(19, 10, 1, 3, 158400, 162000, 160500),
(20, 11, 1, 2, 158400, 162000, 160500),
(21, 12, 5, 2, 60000, 66500, 62500),
(22, 12, 3, 1, 28750, 31500, 0),
(23, 13, 5, 1, 60000, 66500, 62500),
(24, 14, 3, 1, 28750, 31500, 0),
(25, 15, 1, 2, 158400, 162000, 160500),
(26, 16, 6, 2, 30000, 35000, 32000);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methord`
--

CREATE TABLE `payment_methord` (
  `id` int(11) NOT NULL,
  `name` varchar(122) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_methord`
--

INSERT INTO `payment_methord` (`id`, `name`, `description`) VALUES
(1, 'Cash On Delivery (COD)', 'Please pay after the order is received. Pay for Courier agent. Don\'t pay more money for the courier service. If you have any problems don\'t hesitate to get in touch with us.'),
(2, 'Direct Bank Transfer', 'Please transfer the money to our bank account. Account details are provided in the invoice. If you need feather assistance don\'t hesitate to get in touch with us.');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `name` varchar(122) NOT NULL,
  `price` int(5) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `name`, `price`, `status`) VALUES
(1, 'Central', 600, 0),
(2, 'Eastern', 900, 0),
(3, 'North Central', 1000, 0),
(4, 'Northern', 1200, 0),
(5, 'North Western', 1100, 0),
(6, 'Sabaragamuwa', 500, 0),
(7, 'Southern', 700, 0),
(8, 'Uva', 800, 0),
(9, 'Western', 400, 0);

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `spec_id` int(11) NOT NULL,
  `spec` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`spec_id`, `spec`, `category_id`, `status`) VALUES
(1, 'Cache', 1, 0),
(2, 'Total L2 Cache', 1, 0),
(3, 'Total L3 Cache', 1, 0),
(4, 'Processor Cores', 1, 0),
(5, 'Max Turbo Frequency', 1, 0),
(6, 'Graphic Engine', 3, 0),
(7, 'Bus Standard', 3, 0),
(8, 'Video Memory', 3, 0),
(9, 'CUDA Core', 3, 0),
(10, 'Memory Speed', 3, 0),
(11, 'Memory Interface', 3, 0),
(12, 'Interface SATA', 4, 0),
(13, 'Capacity', 4, 0),
(14, 'RPM', 4, 0),
(15, 'HDD Cache', 4, 0),
(16, 'Chipset', 5, 0),
(17, 'Memory', 5, 0),
(18, 'Expansion Slots', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `spec_items`
--

CREATE TABLE `spec_items` (
  `id` int(11) NOT NULL,
  `spec_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spec_items`
--

INSERT INTO `spec_items` (`id`, `spec_id`, `item_id`, `value`) VALUES
(1, 1, 1, '35MB'),
(2, 2, 1, '4Mb'),
(3, 3, 1, '64MB'),
(4, 4, 1, '8'),
(5, 5, 1, '5.2GHz'),
(6, 1, 2, '70MB'),
(7, 2, 2, '15MB'),
(8, 3, 2, '55MB'),
(9, 4, 2, '12'),
(10, 5, 2, '4.3 GHZ'),
(11, 6, 3, 'NVIDIA® GeForce GT 1030'),
(12, 7, 3, 'PCI Express 3.0 OpenGL'),
(13, 8, 3, '2GB GDDR5'),
(14, 9, 3, '384'),
(15, 10, 3, '6008 MHz'),
(16, 11, 3, '64-bit'),
(17, 6, 4, 'NVIDIA® GeForce GT 1030'),
(18, 7, 4, 'PCI Express 3.0 OpenGL'),
(19, 8, 4, '2GB GDDR5'),
(20, 9, 4, '384'),
(21, 10, 4, '6008 MHz'),
(22, 11, 4, '64-bit'),
(23, 12, 5, '6.0Gb/s'),
(24, 13, 5, '8TB'),
(25, 14, 5, '7200RPM'),
(26, 15, 5, '256MB'),
(27, 16, 6, ' B660 Express Chipset'),
(28, 17, 6, 'DDR4'),
(29, 18, 6, '8');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `nic` varchar(18) NOT NULL,
  `dob` date NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `address_l1` varchar(255) NOT NULL,
  `address_l2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `nic`, `dob`, `contact_number`, `address_l1`, `address_l2`, `city`, `postal_code`, `user_id`, `status`) VALUES
(1, '930402036V', '1993-02-09', '0757003662', '58/E, Kesbewa Road', 'Kamburugoda', 'Bandaragama', 12530, 1, 0),
(2, '895045784V', '1993-12-25', '0712487645', '512/D, Koralawalla Road', 'Agulana', 'Moratuwa', 1001, 2, 0),
(3, '964577845V', '1996-02-22', '0712487644', '258/D, Lunuwila Road', '', 'Wennapuwa', 55412, 3, 0),
(4, '9875411288V', '1998-05-20', '0112487645', '58//D, Pathum Uyana', 'Welegoda', 'Bandaragama', 12530, 5, 0),
(5, '9010458782V', '1990-05-16', '0712487630', '248/D, New Gardens', 'Bodirukkarama Mawatha', 'Panadura', 15548, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(0, 'Active'),
(1, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `status` int(10) NOT NULL,
  `user_role` int(11) NOT NULL,
  `u_notification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `first_name`, `last_name`, `profile_image`, `created_date`, `status`, `user_role`, `u_notification`) VALUES
(1, 'pavithra', 'pavithra@gmail.com', '81b05b62cf6df3f025fb551a689d2351cf1c8f1b', 'Pavithra', 'Gamage', 'pavithra_gamage.jpg', '2022-05-10', 0, 4, 0),
(2, 'nishan', 'nishan@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Nishan', 'Amarabandu', 'nishan.jpg', '2022-05-12', 0, 6, 0),
(3, 'savinda', 'savinda@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Savinda', 'Sulochana', 'savinda.jpg', '2022-05-13', 0, 2, 0),
(4, 'nuwan', 'nuwan@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Nuwan', 'Samaranayake', 'nuwan.jpg', '2022-05-14', 0, 5, 1),
(5, 'tharindu', 'tharindu@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Tharindu', 'Bandara', 'tharindu.jpg', '2022-05-14', 0, 1, 0),
(6, 'chamara', 'chamara@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Chamara', 'Rumesh', '279565261_10216555738246158_7411591871252281071_n.jpg', '2022-05-15', 0, 3, 0),
(7, 'pradeep', 'pradeep@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Pradeep', 'Kumar', '24837560_1523231964433685_5931120776354771893_o.jpg', '2022-05-20', 0, 0, 0),
(8, 'geeth', 'geeth@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Geeth', 'Fonseka', '10850066_10206206510704726_7928156336083508130_n.jpg', '2022-05-21', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_modules`
--

CREATE TABLE `users_modules` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_modules`
--

INSERT INTO `users_modules` (`id`, `user_id`, `module_id`, `status`) VALUES
(1, 1, '01', 0),
(2, 1, '02', 0),
(3, 1, '03', 0),
(4, 1, '04', 0),
(5, 1, '0101', 0),
(6, 1, '0102', 0),
(7, 1, '0201', 0),
(8, 1, '0202', 0),
(9, 1, '0301', 0),
(10, 1, '0401', 0),
(11, 1, '0402', 0),
(12, 2, '05', 0),
(13, 2, '06', 0),
(14, 2, '07', 0),
(15, 2, '08', 0),
(16, 2, '09', 0),
(17, 2, '10', 0),
(18, 2, '0501', 0),
(19, 2, '0601', 0),
(20, 2, '0701', 0),
(21, 2, '0801', 0),
(22, 2, '0901', 0),
(23, 2, '1001', 0),
(24, 3, '11', 0),
(25, 3, '12', 0),
(26, 3, '13', 1),
(27, 3, '14', 0),
(28, 3, '1101', 0),
(29, 3, '1102', 0),
(30, 3, '1202', 0),
(31, 3, '1301', 1),
(32, 3, '1401', 0),
(33, 5, '15', 0),
(34, 5, '1501', 0),
(35, 5, '04', 0),
(36, 5, '0401', 0),
(37, 5, '0402', 0),
(38, 5, '10', 0),
(39, 5, '1001', 0),
(40, 5, '14', 0),
(41, 5, '1401', 0),
(42, 5, '13', 0),
(43, 5, '1301', 0),
(44, 6, '16', 0),
(45, 6, '1601', 0),
(46, 5, '0403', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_role_id`, `role_name`, `status`) VALUES
(1, 'Shop Manager', 0),
(2, 'Delivery Manager', 0),
(3, 'Technician', 0),
(4, 'Administrator', 0),
(5, 'Customer', 0),
(6, 'Inventory Manager', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `courier_companies`
--
ALTER TABLE `courier_companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `courier_status`
--
ALTER TABLE `courier_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `delivery_details`
--
ALTER TABLE `delivery_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_company`
--
ALTER TABLE `orders_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`orders_items_id`);

--
-- Indexes for table `payment_methord`
--
ALTER TABLE `payment_methord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`spec_id`);

--
-- Indexes for table `spec_items`
--
ALTER TABLE `spec_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_modules`
--
ALTER TABLE `users_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courier_companies`
--
ALTER TABLE `courier_companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courier_status`
--
ALTER TABLE `courier_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `delivery_details`
--
ALTER TABLE `delivery_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders_company`
--
ALTER TABLE `orders_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `orders_items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payment_methord`
--
ALTER TABLE `payment_methord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `spec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `spec_items`
--
ALTER TABLE `spec_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_modules`
--
ALTER TABLE `users_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
