-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2015 at 04:55 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `evotemipa`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon`
--

CREATE TABLE IF NOT EXISTS `calon` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `suara` int(11) NOT NULL DEFAULT '0',
  `profil` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `calon`
--

INSERT INTO `calon` (`id`, `nama`, `gambar`, `suara`, `profil`) VALUES
(1, 'nuno', 'gambar/ai.JPG', 2, 'Nurdevi Noviana'),
(2, 'Gema', '', 0, 'Gema adalah'),
(3, 'Rakha', '', 3, 'Mohammad Rakha Mauludi');

-- --------------------------------------------------------

--
-- Table structure for table `cobapass`
--

CREATE TABLE IF NOT EXISTS `cobapass` (
  `pass` varchar(50) NOT NULL,
  `new` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(23) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `encrypted_password` varchar(80) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `status` enum('sudah','belum') NOT NULL DEFAULT 'belum',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `unique_id` (`unique_id`),
  UNIQUE KEY `nim` (`nim`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `unique_id`, `nim`, `encrypted_password`, `salt`, `status`, `created_at`, `updated_at`) VALUES
(1, '55365eb5981327.20113739', 'G64120046', 'CwX2KoTetVWjUrUHvAx6Vz38LUg0NzJiMDdiOWZj', '472b07b9fc', 'sudah', '2015-04-21 21:29:09', '2015-05-08 11:20:20'),
(2, '5536621ed58b43.07606886', 'G64120042', 'WcAqrdYioweXn0zW3FP3UqpTlvc1ZTQxNWJkNzNm', '5e415bd73f', 'belum', '2015-04-21 21:43:42', '2015-04-21 22:36:38'),
(3, '55407a61be8730.20006626', 'G64120001', 'CGaa7eTYUNZx8G/JoGeMsV1R5eBhZGE5ZTJiMThk', 'ada9e2b18d', 'sudah', '2015-04-29 13:29:53', '2015-05-08 11:17:59');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
