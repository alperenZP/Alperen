-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 24, 2023 at 07:51 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwebshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblartikels`
--

DROP TABLE IF EXISTS `tblartikels`;
CREATE TABLE IF NOT EXISTS `tblartikels` (
  `artikelnummer` int(11) NOT NULL AUTO_INCREMENT,
  `artikelnaam` text NOT NULL,
  `artikelprijs` decimal(10,2) NOT NULL,
  `producent` text NOT NULL,
  `filename` varchar(100) NOT NULL,
  PRIMARY KEY (`artikelnummer`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblartikels`
--

INSERT INTO `tblartikels` (`artikelnummer`, `artikelnaam`, `artikelprijs`, `producent`, `filename`) VALUES
(1, 'Giovanni\'s Jalapeno Flavor Pastrami', '10.66', 'Giovanni', 'Pastrami_aus_Tafelspitz.jpeg.jpeg'),
(2, 'Luigi\'s Ravioli Surprise: with Mystery Meat!', '7.00', 'Luigi', 'ravioli.jpg'),
(3, 'Marco\'s finest: Spaghetti with Cheese', '8.00', 'Marco', 'Filipino_Spaghetti_style.jpg'),
(4, 'Paolo\'s splendid pineapple calzone', '9.99', 'Paolo', 'Pizza_Calzone.jpg'),
(5, 'Paolo\'s Parmigiano Cheese: Funky Style!', '4.99', 'Paolo', 'Parmigiano-Reggiano_van_het_Consortium_Parmigiano-Reggiano.jpg'),
(6, 'Jimbonini\'s Mascarpone', '650.24', 'Jimbonini', 'Mascarpone_fatto_in_casa.png'),
(9, 'Dante\'s Trilece', '8942.22', 'Dante', 'Pastel_de_Tres_Leches.jpg'),
(10, 'Spaghetti sammich', '23.11', 'Tony', 'Spaghetti_sammich_(14434939910).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblbestellingen`
--

DROP TABLE IF EXISTS `tblbestellingen`;
CREATE TABLE IF NOT EXISTS `tblbestellingen` (
  `bestelnummer` int(11) NOT NULL AUTO_INCREMENT,
  `gebruikernummer` int(11) NOT NULL,
  `artikelnummer` int(11) NOT NULL,
  `artikelaantal` int(11) NOT NULL,
  PRIMARY KEY (`bestelnummer`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbestellingen`
--

INSERT INTO `tblbestellingen` (`bestelnummer`, `gebruikernummer`, `artikelnummer`, `artikelaantal`) VALUES
(1, 1, 3, 4),
(2, 1, 9, 3),
(3, 1, 1, 2),
(4, 17, 9, 37),
(5, 1, 4, 40),
(7, 5, 3, 15),
(8, 3, 9, 2),
(9, 3, 1, 1),
(10, 3, 2, 7),
(11, 3, 4, 11),
(12, 1, 10, 1),
(13, 1, 5, 3),
(14, 29, 5, 22),
(15, 15, 2, 25),
(16, 28, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tblgebruikers`
--

DROP TABLE IF EXISTS `tblgebruikers`;
CREATE TABLE IF NOT EXISTS `tblgebruikers` (
  `gebruikernummer` int(11) NOT NULL AUTO_INCREMENT,
  `gebruikeremail` text NOT NULL,
  `wachtwoord` text NOT NULL,
  `naam` text NOT NULL,
  `voornaam` text NOT NULL,
  `geboortedatum` date NOT NULL,
  `rekeningsaldo` decimal(10,2) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gebruikernummer`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgebruikers`
--

INSERT INTO `tblgebruikers` (`gebruikernummer`, `gebruikeremail`, `wachtwoord`, `naam`, `voornaam`, `geboortedatum`, `rekeningsaldo`, `isAdmin`) VALUES
(2, 'benyehuda@hebrew-academy.org.il', 'HaZvi', 'Ben-Yehuda', 'Eliezer', '1858-01-07', '2348.99', 0),
(3, 'jerma@gmail.com', 'ffffffffffff', 'Elbertson', 'Jeremy', '2005-01-01', '1.09', 0),
(4, 'phillipi@gmail.com', 'ffkskmskkmsdmkl', 'Roland', 'Ronald', '1998-02-01', '0.34', 0),
(5, 'albert@georgia.ga', 'heellelear', 'Georgia', 'Albert', '2005-11-10', '0.29', 0),
(6, 'irma@gmail.com', 'gkkkkkkkkk', 'Monger', 'Irma', '2000-11-01', '1112.14', 0),
(7, 'america@americamail.us', 'jhjgjdfdjklfdgjkjkg', 'America', 'America', '2001-11-01', '1000.19', 0),
(8, 'mancho@amigo.mx', 'fjsdksklsklj', 'Sancho', 'Mancho', '2001-11-11', '0.62', 0),
(9, 'jsdsfjkd@gmail.com', 'sfdjklsfjkld', 'kkksd', 'kkmmklezf', '1111-01-01', '1111.00', 0),
(10, 'jsdsfjkd@gmail.com', 'sfdjklsfjkld', 'kkksd', 'kkmmklezf', '1111-01-01', '1111.00', 0),
(11, 'phil@phil.com', 'ggggggggggggggggggg', 'Phil', 'Phil', '2001-11-01', '0.39', 0),
(12, 'rodney@grodney.com', 'fekfksfdmksfdmkl', 'Elbertson', 'Rodney ', '2005-11-01', '0.24', 0),
(13, 'Gingele@gglgl.org', 'dldlmmlsmd', 'Van Roland', 'Ronaldo', '2012-11-01', '10.31', 0),
(14, 'thurman@yorru.be', 'rgjkjkfgdjkldgjkl', 'Thurman', 'Uma', '1994-11-01', '4828424.32', 0),
(15, 'imad@example.com', 'aa', 'Imad', 'Imad', '2005-01-01', '9595393.11', 0),
(16, 'bengurion@gov.il', 'lionofjudah', 'Ben Gurion', 'David', '1886-10-16', '11.00', 0),
(17, 'franklin@italy.va', 'grujdgujguiu', 'Clinton', 'Franklin', '1994-11-22', '0.51', 0),
(18, 'botbot@glimble.com', 'fff', 'Botson', 'Bot', '2005-01-01', '0.90', 1),
(19, 'foof@boof.ok', 'ttttttttttttto', 'Boof', 'Foof', '1291-11-11', '343.00', 1),
(20, 'ephraimrothstein@gmail.com', 'fffffffffff', 'Rothstein', 'Ephraim', '1998-04-11', '30209.00', 0),
(21, 'orhan@turkmail.co.tr', 'gjorgiorioj', 'Orhan', 'Küçük', '2001-02-01', '0.74', 0),
(29, 'nurbanu.tok@relst.be', 'tjierjeklrtjkestjwtrrsklerwjlfjrklfjqlkjgfekrjgekjhslkegjselkgkelsj', 'Tok', 'Nur', '2012-02-21', '8522.01', 0),
(28, 'numberOneTFKFan@theartofbreaking.com', 'nlkgr,lklerf', 'TFK Fan', 'Number1', '1990-10-01', '11409.00', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
