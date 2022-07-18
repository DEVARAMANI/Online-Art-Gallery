-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2022 at 02:51 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `art_id` int(3) NOT NULL,
  `art_name` varchar(255) NOT NULL,
  `artist_id` int(3) NOT NULL,
  `artist_name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `art` varchar(255) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`art_id`, `art_name`, `artist_id`, `artist_name`, `price`, `date`, `art`, `desc`) VALUES
(8, 'Mahadev', 4, 'Kedar K D', 28500, '2022-01-18', './arts/82e3b537160cc657911ffd3ab7cbac59Shiva.png', 'Lord Shiva also known as Mahadeva'),
(9, 'Simha', 3, 'Keertan K D', 7500, '2022-01-18', './arts/3c3461f8342b4bf77ca8a7f24d539c6dlion.jpg', 'Lion the King of the Jungle'),
(11, 'Vignaharata', 6, 'Vilas', 10500, '2022-01-18', './arts/ea72fc15b48ce9cdd85378389e50ff6aganesh.jpg', 'Lord Ganesha,Sukakarata and Vignaharata'),
(12, 'Chatrapati Shivaji', 3, 'Keertan K D', 760000, '2022-01-22', './arts/a9f9a63063305ce0498d74a838060f0fchatrapati.jpg', 'Chatrapati Shivaji Bosle');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_id` int(3) NOT NULL,
  `artist_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`, `email`, `phno`, `address`) VALUES
(3, 'Keertan K D', 'keertan@gmail.com', '7338226221', 'Belgum'),
(4, 'Kedar K D', 'devaramanik@gmail.com', '9980983108', 'Haliyal'),
(5, 'Karthik N', 'karthik@gamil.com', '7875643535', 'Dharwad'),
(6, 'Vilas', 'vilas@gmail.com', '7567627468', 'Sirsi');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `name`, `email`, `phno`, `address`) VALUES
(4, 'Utku S', 'utku@gmail.com', '8687474733', 'Chikkodi'),
(5, 'Rishub', 'rishub@gmail.com', '7635252525', 'Nippani'),
(6, 'Nachiket Shetty', 'nachiket@gmail.com', '0919299222', 'Sirsi'),
(7, 'Manoj G', 'manoj@gmail.com', '7667676767', 'Ankola'),
(8, 'Seetu', 'seetu@gmail.com', '8762525252', 'Sirsi');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `p_id` int(3) NOT NULL,
  `cust_id` int(3) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `art_id` int(3) NOT NULL,
  `art_name` varchar(255) NOT NULL,
  `amt` int(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`p_id`, `cust_id`, `cust_name`, `art_id`, `art_name`, `amt`, `date`) VALUES
(3, 4, 'Utku S', 9, 'Simha', 7500, '2022-01-18'),
(4, 5, 'Rishub', 8, 'Mahadev', 28500, '2022-01-18'),
(7, 4, 'Utku S', 11, 'Vignaharata', 10500, '2022-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `category`, `email`, `phno`, `address`, `passwd`) VALUES
(7, 'Keertan K D', 'Artist', 'keertan@gmail.com', '7338226221', 'Belgum', 'keertan'),
(8, 'Utku S', 'Customer', 'utku@gmail.com', '8687474733', 'Chikkodi', 'utku'),
(9, 'Rishub', 'Customer', 'rishub@gmail.com', '7635252525', 'Nippani', 'cr7'),
(10, 'Nachiket Shetty', 'Customer', 'nachiket@gmail.com', '0919299222', 'Sirsi', 'nach'),
(11, 'Manoj G', 'Customer', 'manoj@gmail.com', '7667676767', 'Ankola', 'manoj'),
(12, 'Seetu', 'Customer', 'seetu@gmail.com', '8762525252', 'Sirsi', 'seetu'),
(13, 'Kedar K D', 'Artist', 'devaramanik@gmail.com', '9980983108', 'Haliyal', 'kedar'),
(14, 'Karthik N', 'Artist', 'karthik@gamil.com', '7875643535', 'Dharwad', 'ak47'),
(15, 'Vilas', 'Artist', 'vilas@gmail.com', '7567627468', 'Sirsi', 'vilas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`art_id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `art_id` (`art_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `passwd` (`passwd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art`
--
ALTER TABLE `art`
  MODIFY `art_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `p_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `art`
--
ALTER TABLE `art`
  ADD CONSTRAINT `art_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `artist`
--
ALTER TABLE `artist`
  ADD CONSTRAINT `artist_ibfk_1` FOREIGN KEY (`email`) REFERENCES `signup` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`email`) REFERENCES `signup` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`art_id`) REFERENCES `art` (`art_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
