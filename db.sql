-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2016 at 06:16 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hanabishi`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `name`, `address`, `contact`) VALUES
('lennon', 'damascus', 'Lennon Benedict D. Jansuy', '237 Saint Anthony Subd. Tanza, Cavite', '09752904353'),
('ervin', 'melakoh', 'Ervin Wesley Muega', '567 Santol ST. Bucal, Tanza, Cavite', '09231234512');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_img_url` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  UNIQUE KEY `product_code` (`product_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_name`, `product_desc`, `product_img_url`, `product_price`, `product_code`) VALUES
('Android Phone FX1', 'Di sertakan secara rambang yang lansung tidak munasabah. Jika anda ingin menggunakan Lorem Ipsum, anda perlu memastikan bahwa tiada apa yang', 'android-phone.jpg', 201, 'PD1001'),
('Television DXT', 'Ia menggunakan kamus yang mengandungi lebih 200 ayat Latin, bersama model dan struktur ayat Latin, untuk menghasilkan Lorem Ipsum yang munasabah.', 'lcd-tv.jpg', 501, 'PD1002'),
('External Hard Disk', 'Ada banyak versi dari mukasurat-mukasurat Lorem Ipsum yang sedia ada, tetapi kebanyakkannya telah diubahsuai, lawak jenaka diselitkan, atau ayat ayat yang', 'external-hard-disk.jpg', 100, 'PD1003'),
('Wrist Watch GE2', 'Memalukan akan terselit an tepat sekali di Internet.aaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaa aaaaaaaaaaaa aaaaaaaaaaaaa aaaaaaaaa aaaaa aaaaa aaaaasddddddddddddd dsf sdsdfsdfsd sdf sdf sdfdsf s fsda', 'wrist-watch.jpg', 400, 'PD1004');

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE IF NOT EXISTS `trans` (
  `username` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `product_img_url` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`username`, `product_name`, `product_quantity`, `product_img_url`, `product_price`) VALUES
('lennon', 'Android Phone XL', '5', 'android-phone.jpg', 200),
('ervin', 'External Hard Disk', '10', 'external-hard-disk.jpg', 100),
('ervin', 'External Hard Disk', '1', 'external-hard-disk.jpg', 100),
('ervin', 'Android Phone FX1', '1', 'android-phone.jpg', 201);
