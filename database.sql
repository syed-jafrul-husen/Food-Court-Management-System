-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2020 at 08:40 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutpage`
--

CREATE TABLE `aboutpage` (
  `id` int(10) NOT NULL,
  `post` text NOT NULL,
  `contact` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutpage`
--

INSERT INTO `aboutpage` (`id`, `post`, `contact`) VALUES
(6, ' ', 'The main feature of this website is to manage the records of food court and its Foods. This website will help the food court manager and seller to keep track of all the management system. Where admin/manager can manage the Food sales, Food stocks and Food sales history. Other features in this project, while adding items from admin account (that means adding the food in main menu list) and the admin/manager can also provide Food name, Food price and Food Quantity. This website displays particulars food name with available stock and price while viewing stocks. Here also have a Foods sales dashboard, where admin/manager will be able to sell the food to the customer and also can save this sales record. After ordering the food, total cost will be calculated automatically in this system. The admin/manager can remove or add any food from the ordered food list if they wants.'),
(7, ' ', 'This website developed by Syed Jafrul Husen and Gulam Kibria Choudhury.'),
(9, ' ', 'For more details you contact below:'),
(10, ' ', 'Email: gkpalash101@gmail.com'),
(11, ' ', 'Email: syedjafrul4@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `addfood`
--

CREATE TABLE `addfood` (
  `id` int(10) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `productcost` float NOT NULL,
  `producttype` varchar(255) NOT NULL,
  `productcompany` varchar(255) NOT NULL,
  `productstock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addfood`
--

INSERT INTO `addfood` (`id`, `productname`, `productcost`, `producttype`, `productcompany`, `productstock`) VALUES
(11, 'chicken korma', 250, 'Nonveg', 'Lucknow jayke', 33),
(12, 'Bread roll', 45, 'Bread', 'punjabi tadka', 39),
(13, 'Tandoori roti', 50, 'Bread', 'punjabi tadka', 13),
(14, 'Daal fry', 80, 'veg', 'wah ji wah', 70),
(15, 'chiken Fried rice', 190, 'Nonveg', 'Bikanerwala', 22),
(16, 'Noodles ', 180, 'Chinese', 'Red Chili', 13),
(17, 'Paneer Butter Masala', 250, 'veg', 'wah ji wah', 32),
(18, 'biriani', 290, 'food', 'fu-wang', 12);

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id`, `title`, `image`) VALUES
(2, 'Food Court Helper', '');

-- --------------------------------------------------------

--
-- Table structure for table `helppage`
--

CREATE TABLE `helppage` (
  `id` int(10) NOT NULL,
  `question` varchar(250) NOT NULL,
  `answer` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `helppage`
--

INSERT INTO `helppage` (`id`, `question`, `answer`) VALUES
(4, 'How to change Password?', 'For changing the pasword first need to login.Then Go to Dashboard -> click on change password. Enter username and current password then enter your new password and retype this new password.'),
(6, 'How to add new food items?', 'For adding new food items first you need to login. Then Go to Dashboard or Food managemen,t -> click on to the add food.'),
(7, 'How to add new Sales?', 'For adding new sales list first you need to login. Then Go to Dashboard or Sales management, -> click on to the add sales.'),
(8, 'How to view all food details?', 'For viewing all food details first you need to login. Then Go to Dashboard or Food management -> click on to the food details.'),
(9, 'How to view all sales recod?', 'For viewing all sales record first you need to login. Then Go to Dashboard or Sales management -> click on to the sales details.');

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE `homepage` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `post` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`id`, `title`, `post`) VALUES
(10, 'Welcome to Food Court Helper', 'Welcome to food court helper. We have develop Food Court Helper website, its a free and cleen code. It is a web base mini webbase project so we have used HTML, CSSS, JavaScript, PHP. The basic cncept to develop this project was to manage shops, Food and Sales.'),
(11, ' ', 'The main feature of the project is to manage the records of Shops and its Shop Foods.It is an admin based Web Project, I mean this project will help the food court manager and seller to keep track of all the management system .Where admin/manager can manage the Food sales ,Food stocks and Food sales history .Other features in this project ,while adding items from admin account(that means adding the food in main menu list) and the admin/manager can also provide Food name,Food price and Food Quantity.The system displays particulars food name with available stock and price while viewing stocks.We will develop a Foods sales dashboard,where admin/manager will be able to sell the food to the customer and also can save this sales record.After ordering the food, total cost will be calculated automatically in this system.The admin/manager can remove or add any food from the ordered food list if he wants.');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `loginform`
--

CREATE TABLE `loginform` (
  `ID` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginform`
--

INSERT INTO `loginform` (`ID`, `username`, `password`) VALUES
(1, 'salesman', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `c_name` varchar(222) NOT NULL,
  `id` int(11) NOT NULL,
  `c_phone` varchar(222) NOT NULL,
  `p_name` varchar(222) NOT NULL,
  `p_company` varchar(222) NOT NULL,
  `p_cost` int(11) NOT NULL,
  `p_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`c_name`, `id`, `c_phone`, `p_name`, `p_company`, `p_cost`, `p_quantity`) VALUES
('Gulam Kibria', 11, '01718389885', 'Paneer Butter Masala', 'wah ji wah', 250, 3),
('syed jafrul', 12, '01718387894', 'chicken korma', 'Lucknow jayke', 250, 5),
('korim miya', 13, '0153484539', 'Tandoori roti', 'punjabi tadka', 45, 1),
('sahid ahmed', 14, '01734234235', 'Noodles', 'Red Chili', 50, 1),
('reza ahmed', 15, '0163423432', 'chiken Fried rice', 'punjabi tadka', 180, 1),
('sofi ahmed', 16, '01734324202', 'Paneer Butter Masala', 'wah ji wah', 50, 2),
('Abu hanif ', 17, '01398374982', 'Daal fry', 'punjabi tadka', 50, 2),
('Gulam Kibria', 18, '01718389885', 'Bread roll', 'Bikanerwala', 45, 3),
('abu shahan', 19, '01332493944', 'Daal fry', 'wah ji wah', 80, 1),
('syed jafrul', 20, '0163423432', 'Paneer Butter Masala', 'Lucknow jayke', 45, 2),
('reza ahmed', 21, '01718387894', 'chicken korma', 'wah ji wah', 180, 1),
('korim ahmed', 22, '01718389983', 'Paneer Butter Masala', 'wah ji wah', 250, 1),
('kibria', 23, '012', 'Daal fry', 'wah ji wah', 250, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutpage`
--
ALTER TABLE `aboutpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addfood`
--
ALTER TABLE `addfood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `helppage`
--
ALTER TABLE `helppage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginform`
--
ALTER TABLE `loginform`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutpage`
--
ALTER TABLE `aboutpage`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `addfood`
--
ALTER TABLE `addfood`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `helppage`
--
ALTER TABLE `helppage`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loginform`
--
ALTER TABLE `loginform`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
