-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 02:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kamar`
--

CREATE TABLE `data_kamar` (
  `no_kamar` int(20) NOT NULL,
  `tipe_kamar` enum('Superior','Dulaxe') NOT NULL,
  `harga` varchar(100) NOT NULL,
  `lantai_kamar` varchar(200) NOT NULL,
  `max_dewasa` varchar(200) NOT NULL,
  `max_anak` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kamar`
--

INSERT INTO `data_kamar` (`no_kamar`, `tipe_kamar`, `harga`, `lantai_kamar`, `max_dewasa`, `max_anak`, `foto`) VALUES
(303, 'Dulaxe', '8000000000000', '4', '3', '1', '63db3137cd836.jpg'),
(707, 'Dulaxe', '550000000', '3', '50', '8', '63db35f3497b2.jpg'),
(302, 'Dulaxe', '125000', '2', '2', '1', '63db5196d338f.jpg'),
(506, 'Dulaxe', '10000000000000000000000', '9', '4', '2', '63db51d961582.jpg'),
(304, 'Dulaxe', '200000', '10', '2', '1', '63db6e8807dc4.jpg'),
(109, 'Superior', '199999', '2', '2', '2', '63db7c3d3eaaf.png'),
(404, 'Dulaxe', '2222', '22', '2', '2', '63db88562d8e8.png');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `level`) VALUES
('admin', 'admin', '1'),
('test', 'test', '2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
