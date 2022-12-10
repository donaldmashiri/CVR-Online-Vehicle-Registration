-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 10:01 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lincon`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feed_id` int(11) NOT NULL,
  `owner_id` int(255) NOT NULL,
  `description` text NOT NULL,
  `comment` text NOT NULL DEFAULT 'not yet',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feed_id`, `owner_id`, `description`, `comment`, `date`) VALUES
(1, 1, 'hie', 'sure here', '2022-08-19'),
(2, 2, 'test', 'yesyes', '2022-08-19'),
(3, 1, 'Hie hie', 'Hallo lincon', '2022-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `make_model` varchar(255) NOT NULL,
  `colors` varchar(255) NOT NULL,
  `add_description` text NOT NULL,
  `how_stolen` text NOT NULL,
  `date_stolen` date NOT NULL,
  `ownership` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `phone_numbers` varchar(255) NOT NULL,
  `stolen_status` varchar(255) NOT NULL DEFAULT 'pending',
  `feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `make_model`, `colors`, `add_description`, `how_stolen`, `date_stolen`, `ownership`, `contact_name`, `phone_numbers`, `stolen_status`, `feedback`) VALUES
(1, 'Toyota Carmi', 'Silver And Grey', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat ', '2022-11-02', 'Owner', 'Lincon', '0779500263', 'pending', ''),
(2, 'Mazda', 'blue', 'test', 'testf', '2022-11-11', '', 'DonaldTonderai Mashiri', '0779400263', 'responded', 'coming'),
(3, 'test', 'test', 'test', 'test', '2022-11-19', '', 'Don', '0779400263', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `req_id` int(11) NOT NULL,
  `veh_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `req_status` varchar(255) NOT NULL DEFAULT 'pending',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`req_id`, `veh_id`, `owner_id`, `reason`, `req_status`, `date`) VALUES
(1, 9, 1, 'lost', 'pending', '2022-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `veh_id` int(11) NOT NULL,
  `owner_id` int(255) NOT NULL,
  `vehicle_make` varchar(255) NOT NULL,
  `vehicle_model` varchar(255) NOT NULL,
  `vehicle_year` varchar(255) NOT NULL,
  `used_new` varchar(255) NOT NULL,
  `main_color` varchar(255) NOT NULL,
  `secondary_color` varchar(255) NOT NULL,
  `engine_number` text NOT NULL,
  `odometer_reading` int(11) NOT NULL,
  `seating_capacity` int(11) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `add_info` text NOT NULL,
  `plate_number` varchar(255) DEFAULT NULL,
  `amount_status` varchar(255) DEFAULT 'not paid',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`veh_id`, `owner_id`, `vehicle_make`, `vehicle_model`, `vehicle_year`, `used_new`, `main_color`, `secondary_color`, `engine_number`, `odometer_reading`, `seating_capacity`, `fuel_type`, `add_info`, `plate_number`, `amount_status`, `status`, `date_registered`) VALUES
(9, 1, 'Toyota', 'Toyota Carmi', '2012', 'new', 'white', 'white', '123456', 180, 5, 'Petrol', 'none', 'ACJ9090', 'paid', 'verified', '2022-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_owners`
--

CREATE TABLE `vehicle_owners` (
  `owner_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `national_id` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_owners`
--

INSERT INTO `vehicle_owners` (`owner_id`, `first_name`, `last_name`, `email`, `address`, `national_id`, `dob`, `password`, `date`) VALUES
(1, 'Lincon', 'Muchenje', 'lincon@gmail.com', 'Mkoba18\r\n6692', '29-295057C27', '2001-11-02', 'donnie', '2022-11-14'),
(2, 'Michael', 'Scofield', 'mike@gmail.com', 'Senga nehosho', '54-6754B56', '1998-11-01', 'mike', '2022-11-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`veh_id`);

--
-- Indexes for table `vehicle_owners`
--
ALTER TABLE `vehicle_owners`
  ADD PRIMARY KEY (`owner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `veh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vehicle_owners`
--
ALTER TABLE `vehicle_owners`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
