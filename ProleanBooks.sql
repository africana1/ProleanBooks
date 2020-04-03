-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 03, 2020 at 01:35 PM
-- Server version: 10.4.11-MariaDB
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
-- Database: `ProleanBooks`
--
CREATE DATABASE IF NOT EXISTS `ProleanBooks` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ProleanBooks`;

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `Id` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `BookTitle` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `CreatedAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`Id`, `Email`, `BookTitle`, `Author`, `CreatedAt`) VALUES
('07d5936ee153679', 'mw.anyakoha@africana.first', 'New School Physics', 'M.W. Anyakoha', '2020-04-03'),
('0ea36f0625e0e97', 'xml@ppk.org', 'Xml Markup Language', 'Xml Core Developer', '2020-04-03'),
('6bdf6a309863ec3', 'megano.florence@tuscany.live', 'Football Academy', 'Megano Biance', '2020-04-03'),
('b99752d784fe6HS', 'osei.yaw-ababio@first.africana', 'New School Chemistry', 'Osei-Yaw Ababio', '2020-04-02'),
('b99752d784fe6SS', 'tolkien@write.org', 'Fellowship of The Ring', 'J.R. Tolkien', '2020-04-02'),
('b99752d784fjkfe', 'tolkiens@write.org', 'The Two Towers', 'J.R. Tolkien', '2020-04-02'),
('b99752d874fe6fe', 'tolkien@write.org', 'Return Of The King', 'J.R. Tolkien', '2020-04-02'),
('b99752nm84fe6fe', 'sarojini.ramalingam@first.africana', 'Modern Biology', 'Sarojini.T.Ramalingam', '2020-04-02'),
('CJ9752d784fe6fe', 'benson.Oluikpe@first.africana', 'Intensive English', 'Benson.O.Oluikpe', '2020-04-02'),
('e3b1b28fad57cd3', 'megano.florence@tuscany.live', 'Football Academy Two', 'Megano Florence', '2020-04-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
