-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2019 at 01:47 AM
-- Server version: 8.0.17
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dating`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

DROP TABLE IF EXISTS `conversation`;
CREATE TABLE IF NOT EXISTS `conversation` (
  `user1` varchar(45) DEFAULT NULL,
  `user2` varchar(45) DEFAULT NULL,
  `u1u2` tinyint(4) DEFAULT NULL,
  `u2u1` tinyint(4) DEFAULT NULL,
  KEY `user_idx` (`user1`,`user2`),
  KEY `user1_idx` (`user2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`user1`, `user2`, `u1u2`, `u2u1`) VALUES
('Bella galie', 'abhinav', 1, 1),
('abhinav', 'Angela luxa', 1, NULL),
('abhinav', 'Alexandra Bale', 1, 1),
('abhinavbunny', 'adolf Hitleer', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(45) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `ethnicity` varchar(45) DEFAULT NULL,
  `height` decimal(10,0) DEFAULT NULL,
  `weight` decimal(10,0) DEFAULT NULL,
  `preference` tinyint(4) DEFAULT NULL,
  `spamscore` int(11) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `facebookLink` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `firstname`, `lastname`, `age`, `sex`, `ethnicity`, `height`, `weight`, `preference`, `spamscore`, `picture`, `facebookLink`, `status`, `password`, `latitude`, `longitude`) VALUES
('abhinav', 'Abhin', 'ralp', 22, 0, 'American', '6', '55', 1, NULL, NULL, NULL, NULL, 'bunny', '45.52548910', '-73.55121790'),
('abhinavbunny', 'bun', 'bun', 77, 0, 'American', '6', '78', 0, NULL, NULL, NULL, NULL, 'bunny', '45.52306770', '-73.55356440'),
('adolf Hitleer', 'Adolf', 'Hitler', 45, 0, 'American', '6', '80', 0, NULL, NULL, NULL, NULL, 'bunny', '45.52306770', '-73.55356440'),
('Alexandra Bale', 'Alexa', 'Bale', 24, 1, 'American', '5', '76', 0, NULL, NULL, NULL, NULL, 'bunny', '45.52306770', '-73.55356440'),
('Angela luxa', 'Angel', 'Lux', 26, 1, 'American', '5', '68', 0, NULL, NULL, NULL, NULL, 'bunny', NULL, NULL),
('Ann laliie', 'Anna', 'Ja', 26, 1, 'American', '5', '66', 0, NULL, NULL, NULL, NULL, 'bunny', '43.86678700', '-72.17279800'),
('Bella galie', 'Bella ', 'Gallie', 25, 1, 'American', '5', '66', 0, NULL, NULL, NULL, NULL, 'bunny', '45.52306770', '-73.55356440'),
('David John Abhraham', 'David', 'John', 26, 0, 'American', '6', '82', 1, NULL, NULL, NULL, NULL, 'bunny', NULL, NULL),
('Eldho Shaji', 'Eldho', 'Shaji', 24, 0, 'American', '6', '56', 0, NULL, NULL, NULL, NULL, 'bunny', '40.58793100', '-74.10314200'),
('Elixa Anya', 'Elixa ', 'Anya', 24, 1, 'Latino', '6', '65', 0, NULL, NULL, NULL, NULL, 'bunny', '40.58511200', '-73.94021400'),
('Hrikrishna', 'Hari', 'Krishna', 25, 0, 'American', '80', '54', 0, NULL, NULL, NULL, NULL, 'bunny', '40.67310000', '-73.68232500'),
('Man of Steel', 'Savieo', 'Seb', 26, 0, 'American', '6', '26', 1, NULL, NULL, NULL, NULL, 'bunny', NULL, NULL),
('Octavia Bella', 'Octavia', 'Bella', 25, 1, 'American', '6', '66', 1, NULL, NULL, NULL, NULL, 'bunny', '41.17829500', '-73.48444200'),
('Sanya', 'Sanya ', 'Sera', 29, 1, 'American', '6', '45', 0, NULL, NULL, NULL, NULL, 'bunny', NULL, NULL),
('Savyo Relavio', 'Savyo', 'Realvio', 25, 0, 'American', '6', '75', 1, NULL, NULL, NULL, NULL, 'bunny', '41.17694600', '-73.45716900'),
('Xexaaa Rale', 'Xexa', 'Rale', 24, 1, 'American', '6', '58', 0, NULL, NULL, NULL, NULL, 'bunny', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `user` FOREIGN KEY (`user1`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `user1` FOREIGN KEY (`user2`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
