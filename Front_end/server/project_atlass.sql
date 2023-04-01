-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 10, 2023 at 12:29 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_atlass`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `ferst_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `ferst_name`, `last_name`, `password`, `token`) VALUES
(1, 'root', 'SALAHEDDINE', 'elfatimi', '1234', '44');

-- --------------------------------------------------------

--
-- Table structure for table `chicklist`
--

DROP TABLE IF EXISTS `chicklist`;
CREATE TABLE IF NOT EXISTS `chicklist` (
  `idChicklist` int NOT NULL AUTO_INCREMENT,
  `designation` varchar(300) NOT NULL,
  `qtyCompleted` int NOT NULL,
  `remainingQty` int NOT NULL,
  `personsNumber` int NOT NULL,
  `blocName` varchar(150) NOT NULL,
  `idControler` int NOT NULL,
  `dateValidation` date NOT NULL,
  PRIMARY KEY (`idChicklist`),
  KEY `FK_idControler` (`idControler`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chicklist`
--

INSERT INTO `chicklist` (`idChicklist`, `designation`, `qtyCompleted`, `remainingQty`, `personsNumber`, `blocName`, `idControler`, `dateValidation`) VALUES
(35, 'Boite encastrement 3p', 22, 2, 2, 'bloc 4', 4, '2023-03-08'),
(34, 'Boite encastrement 4p', 22, 12, 1, 'bloc 4', 4, '2023-03-08'),
(33, 'Saignee Mural', 12, 14, 6, 'bloc 4', 4, '2023-03-08'),
(32, 'Cable Rigide 1,5', 21, 18, 1, 'bloc 3', 4, '2023-03-07'),
(31, 'Tubage 16', 12, 18, 3, 'bloc 3', 4, '2023-03-07'),
(30, 'Boite encastrement 2p', 33, 20, 2, 'bloc 3', 4, '2023-03-07'),
(29, 'Boite encastrement 3p', 12, 22, 1, 'bloc 3', 4, '2023-03-07'),
(28, 'Boite encastrement 4p', 8, 10, 2, 'bloc 3', 4, '2023-03-07'),
(27, 'Saignee Mural', 12, 18, 4, 'bloc 3', 4, '2023-03-07'),
(36, 'Interrupteur Va et Vient', 12, 18, 1, 'bloc 4', 4, '2023-03-08'),
(37, 'Prise TV/Info/Telephone', 23, 11, 2, 'bloc 4', 4, '2023-03-08'),
(38, 'PER Froide', 12, 14, 2, 'bloc 6', 5, '2023-03-08'),
(39, 'PER Chaude', 13, 12, 1, 'bloc 6', 5, '2023-03-08'),
(40, 'PPR Froide', 14, 12, 1, 'bloc 6', 5, '2023-03-08'),
(41, 'PPR Chaude', 24, 12, 2, 'bloc 6', 5, '2023-03-08'),
(42, 'Saignee Mural', 12, 0, 0, 'bloc 10', 4, '2023-03-09'),
(43, 'Souple 2.5 Clim', 12, 2, 2, 'bloc 10', 4, '2023-02-09'),
(44, 'Saignee Mural', 0, 0, 2, 'bloc 10', 4, '2023-03-09'),
(45, 'Boite encastrement 3p', 14, 2, 1, 'bloc 10', 4, '2023-02-09'),
(46, 'Interrupteur Va et Vient', 23, 12, 2, 'bloc 10', 4, '2023-03-09'),
(47, 'Prise TV/Info/Telephone', 12, 3, 1, 'bloc 10', 4, '2023-03-09'),
(48, 'PER Froide', 12, 12, 22, 'bloc 6', 5, '2023-03-09'),
(49, 'PER Chaude', 12, 12, 0, 'bloc 6', 5, '2023-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `controlerlogin`
--

DROP TABLE IF EXISTS `controlerlogin`;
CREATE TABLE IF NOT EXISTS `controlerlogin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `idCard` varchar(150) NOT NULL,
  `token` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idCard` (`idCard`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `controlerlogin`
--

INSERT INTO `controlerlogin` (`id`, `username`, `password`, `idCard`, `token`) VALUES
(4, 'salah', '1234', 'EE54321', '0'),
(5, 'hamza', '1234', 'EE65789', 'afed3e22619df3ae75cd76b10e4dc08a'),
(6, 'elfatimi', '1234', 'EE99999', '52cc914dda4880a095a27fc8a63a80c6');

-- --------------------------------------------------------

--
-- Table structure for table `controlerregester`
--

DROP TABLE IF EXISTS `controlerregester`;
CREATE TABLE IF NOT EXISTS `controlerregester` (
  `idControler` int NOT NULL AUTO_INCREMENT,
  `fullName` varchar(200) NOT NULL,
  `idCard` varchar(100) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `speciality` varchar(100) NOT NULL,
  `phoneNum` int NOT NULL,
  `email` varchar(300) NOT NULL,
  `dateStart` date NOT NULL,
  PRIMARY KEY (`idControler`),
  KEY `FK_idCard` (`idCard`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `controlerregester`
--

INSERT INTO `controlerregester` (`idControler`, `fullName`, `idCard`, `Address`, `speciality`, `phoneNum`, `email`, `dateStart`) VALUES
(5, 'Hamza etmasint', 'EE65789', 'LOT NAKHIL BLOC 22 NR 359 SYBA MARRAKECH', 'Plomberie', 602314804, 'salahfatimi16@gmail.com', '2023-10-03'),
(4, 'SALAHEDDINE ELFATIMI', 'EE54321', 'LOT NAKHIL BLOC 22 NR 359 SYBA MARRAKECH', 'Electricite', 602314804, 'salahfatimi16@gmail.com', '2023-12-03'),
(6, 'SALAHEDDINE', 'EE99999', 'LOT NAKHIL BLOC 22 NR 359 SYBA MARRAKECH', 'Climatisation', 602314804, 'salahfatimi16@gmail.com', '2023-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `daysworked`
--

DROP TABLE IF EXISTS `daysworked`;
CREATE TABLE IF NOT EXISTS `daysworked` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idControler` int NOT NULL,
  `dateValidation` date NOT NULL,
  `blocName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idWorked` (`idControler`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `daysworked`
--

INSERT INTO `daysworked` (`id`, `idControler`, `dateValidation`, `blocName`) VALUES
(4, 4, '2023-03-07', 'bloc 3'),
(5, 4, '2023-01-08', 'bloc 4'),
(6, 5, '2023-03-08', 'bloc 6'),
(7, 4, '2023-03-09', 'bloc 10'),
(8, 5, '2023-03-09', 'bloc 6');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
CREATE TABLE IF NOT EXISTS `designation` (
  `idDesignation` int NOT NULL AUTO_INCREMENT,
  `designationName` varchar(300) NOT NULL,
  `speciality` varchar(300) NOT NULL,
  PRIMARY KEY (`idDesignation`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`idDesignation`, `designationName`, `speciality`) VALUES
(1, 'Conduite Circulaire', 'Ventilation'),
(2, 'Exhaust Air Round', 'Ventilation'),
(3, 'Exhaust Air Grille', 'Ventilation'),
(4, 'Hotte', 'Ventilation'),
(5, 'Air Extractor', 'Ventilation'),
(6, 'Caisson d\'extraction', 'Ventilation'),
(7, 'Saignee Mural', 'Electricite'),
(8, 'Boite encastrement 4p', 'Electricite'),
(9, 'Boite encastrement 3p', 'Electricite'),
(10, 'Boite encastrement 2p', 'Electricite'),
(11, 'Boite encastrement 1p', 'Electricite'),
(12, 'Pose Tableau Electrique', 'Electricite'),
(13, 'Tubage 16', 'Electricite'),
(14, 'Tubage 13', 'Electricite'),
(15, 'Cable Rigide 1,5', 'Electricite'),
(16, 'Cable Rigide 2,5', 'Electricite'),
(17, 'Souple 2.5 Clim', 'Electricite'),
(18, 'Cable Coaxiale', 'Electricite'),
(19, 'Cable Ethernet Cat6', 'Electricite'),
(20, 'Prise Electrique', 'Electricite'),
(21, 'Prise TV/Info/Telephone', 'Electricite'),
(22, 'Prise Etanche', 'Electricite'),
(23, 'Interrupteur Simple', 'Electricite'),
(24, 'Interrupteur Double', 'Electricite'),
(25, 'Interrupteur Va et Vient', 'Electricite'),
(26, 'Interrupteur Double Va et vien', 'Electricite'),
(27, 'Interrupteur Volet Roulant', 'Electricite'),
(28, 'Bouton Poussoir', 'Electricite'),
(29, 'Spot', 'Electricite'),
(30, 'Lustre', 'Electricite'),
(31, 'DDR', 'Electricite'),
(32, 'Idiff', 'Electricite'),
(33, 'DD10A', 'Electricite'),
(34, 'DD16A', 'Electricite'),
(35, 'DD25A', 'Electricite'),
(36, 'DD32A', 'Electricite'),
(37, 'Telerupteur', 'Electricite'),
(38, 'Minuterie', 'Electricite'),
(39, 'Parafoudre', 'Electricite'),
(40, 'Cuivre 1/4\"+3/8\"', 'Climatisation'),
(41, 'Cuivre 1/4\"+1/2\"', 'Climatisation'),
(42, 'Cuivre 1/4\"+5/8\"', 'Climatisation'),
(43, 'Cuivre 3/8\"+5/8\"', 'Climatisation'),
(44, 'Cuivre 3/8\"+3/4\"', 'Climatisation'),
(45, 'Cuivre 1/2\"+3/4\"', 'Climatisation'),
(46, 'Alimentation Electrique', 'Climatisation'),
(47, 'Condensat', 'Climatisation'),
(48, 'Thermostat', 'Climatisation'),
(49, 'Split 7kw', 'Climatisation'),
(50, 'Split 5.6kw', 'Climatisation\r\n\r\n'),
(51, 'Cassette 14kw', 'Climatisation'),
(52, 'Cassette 10kw', 'Climatisation'),
(53, 'Cassette 7kw', 'Climatisation'),
(54, 'Unite Exterieur', 'Climatisation'),
(55, 'PER Froide', 'Plomberie'),
(56, 'PER Chaude', 'Plomberie'),
(57, 'PPR Froide', 'Plomberie'),
(58, 'PPR Chaude', 'Plomberie'),
(59, 'Retour PPR Chaude', 'Plomberie'),
(60, 'Raccord PPR', 'Plomberie'),
(61, 'Raccord PER', 'Plomberie'),
(62, 'Vanne', 'Plomberie'),
(63, 'Clapet Anti-retour', 'Plomberie'),
(64, 'Coffret collecteu', 'Plomberie'),
(65, 'Chaudiere', 'Plomberie'),
(66, 'Balon de Stockage', 'Plomberie'),
(67, 'Chauffe eau solaire', 'Plomberie'),
(68, 'Pompe', 'Plomberie');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
