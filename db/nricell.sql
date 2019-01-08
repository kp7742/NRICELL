-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2019 at 06:10 PM
-- Server version: 5.6.42
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nricell`
--

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `Id` int(10) NOT NULL,
  `Uid` int(10) NOT NULL,
  `EMail` varchar(50) NOT NULL,
  `QDept` varchar(100) NOT NULL,
  `QState` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`Id`, `Uid`, `EMail`, `QDept`, `QState`) VALUES
(10, 11, 'vcj.fetr@gmail.com', 'Education', 'gh'),
(11, 12, 'malaypatel08@gmail.com', 'Education ', 'Admission'),
(15, 8, 'dhiren.jummani.jhd@gmail.com', 'Passport', 'I lost my passport.'),
(16, 8, 'dhiren.jummani.jhd@gmail.com', 'Education', 'I\'m not happy here.'),
(17, 8, 'dhiren.jummani.jhd@gmail.com', 'Education', 'Boring'),
(18, 14, 'bkitwww@gmail.com', 'Edu', 'I am bore'),
(19, 15, 'Sagarpatel6065@gmail.com', 'Income tax', 'Hi'),
(20, 15, 'Sagarpatel6065@gmail.com', 'Income tax', 'Hi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(10) NOT NULL,
  `FName` varchar(30) NOT NULL,
  `LName` varchar(40) NOT NULL,
  `EMail` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `BirthDate` date NOT NULL,
  `Gender` text NOT NULL,
  `Country` text NOT NULL,
  `Bio` varchar(100) DEFAULT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT '0',
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `FName`, `LName`, `EMail`, `Password`, `BirthDate`, `Gender`, `Country`, `Bio`, `Admin`, `CreationDate`, `Mobile`) VALUES
(1, 'Kuldip', 'Patel', 'patel.kuldip91@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '1998-11-10', 'male', 'India', 'I am Kuldip Patel', 1, '2019-01-02 18:54:19', '+919998897742'),
(8, 'Dhiren', 'Jummani', 'dhiren.jummani.jhd@gmail.com', '824e6570f2cd9475c3c3c98df1119f5a56a195fd', '1998-09-29', 'male', 'India', 'Developer', 0, '2019-01-03 04:47:35', '+919574708867'),
(9, 'Meet', 'Patel', 'meetcpatel906@gmail.com', '4e17a448e043206801b95de317e07c839770c8b8', '1997-07-18', 'male', 'India', 'Hi', 0, '2019-01-03 04:48:41', '+919723083820'),
(10, 'Kuldip', 'Patel', 'kp747007@gmail.com', '3758a318980acd84088e9331009cfd2862b430d3', '1998-10-11', 'male', 'India', '', 0, '2019-01-03 05:29:49', '+916352008801'),
(11, 'Vivek', 'Joshi', 'vcj.fetr@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '1987-08-18', 'male', 'India', '', 0, '2019-01-03 05:43:33', '+919723083820'),
(12, 'Malay', 'Patel', 'malaypatel08@gmail.com', 'b8baf99758efd7d669ae907d46c2b4c50d5d8952', '1994-02-15', 'male', 'India', '', 0, '2019-01-03 05:44:07', '+918866350373'),
(13, 'Manoj', 'Chandwani', 'manoj.chandwani@gmail.com', '92f7796faa65d5d2d63001c76bcd943d6d6ed5ff', '1984-04-11', 'male', 'India', '', 0, '2019-01-03 05:45:23', '+919925122344'),
(15, 'Sagarkumar', 'Patel', 'Sagarpatel6065@gmail.com', '884e5c32a6fe762ccf4be3e8cd1d51efebd77bf2', '1998-09-23', 'male', 'India', '', 0, '2019-01-04 04:13:13', '+918160865451'),
(16, 'Bhagyesh', 'Parmar', 'bkitwww@gmail.com', 'cad22ad895ec6152e6836771dd25ccaab9113f76', '1998-10-27', 'male', 'India', 'Hi there ', 0, '2019-01-08 07:42:01', '+918154912304');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`,`EMail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
