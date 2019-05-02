-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 10:07 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `media` varchar(255) NOT NULL DEFAULT 'placeholder.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `id_location`, `label`, `description`, `lat`, `lng`, `media`) VALUES
(1, 1, 'shuhua jugaa', 'nihhh', -7.961484, 112.627785, 'gi_dle_latata_shuhua_3.jpg'),
(1, 2, 'jalan ambruk', 'dddd', -7.964459, 112.636948, 'IMG_5924.jpg'),
(1, 6, 'orang hilang', 'lalalala', -7.967137, 112.636734, 'new doc 2019-02-17 21.36.16_1.jpg'),
(3, 7, 'shuhuaaaa', 'asdasdasdasd', -7.965904, 112.624222, 'shuhua-gidle-z7941.jpg'),
(1, 8, 'shuhua lagi', 'hehehe', -7.969389, 112.629051, 'gi_dle_latata_shuhua_3.jpg'),
(1, 10, 'rumah saya', 'gagagaga', -7.920888, 112.625793, 'IMG_5924.jpg'),
(1, 11, 'bbbb', 'asdasdasdasdasd', -7.966967, 112.626221, 'blur-background-6z.jpg'),
(4, 12, 'jalan ditutup', 'konser milos, demo milos', -7.963907, 112.642937, ''),
(5, 13, 'Jalan metro tutup ', 'tutup karena jembatan runtuh', -7.964629, 112.641220, ''),
(5, 14, 'jalan ogan tutup', 'gatau kenapa, tapi ya ditutup gan, jadi puter balik ajaaaaaa', -7.962334, 112.636925, ''),
(5, 15, 'jalan lebaksari tutup', 'karena jalan dialihkan', -7.961824, 112.632530, ''),
(5, 16, 'gang iii tutup', 'ada galian jalan', -7.959784, 112.635765, ''),
(5, 17, 'jalan musi rusak', 'ditutup gan cari jalan lain asdasda', -7.961314, 112.638390, '82Jalan_kerinci_tutup.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `photo`) VALUES
(1, 'a@a.a', '$2y$10$b1VMIXxQo3LYVmzKa7.au.7BCr6wxVQVfojiSBhWQ7x1DluvlVnJ.', 'efti', 0x6176617461722e706e67),
(2, 'b@b.b', '$2y$10$rqVM0zBSyzU4lAddvV7hz.3KF9dd3ztzTVIPq3JLKAcLQERK9XFxm', 'eftii', 0x6176617461722e706e67),
(3, 'c@c.c', '$2y$10$w7dayVdHNzHxjERBLnZD0OIO.cO71OX6uZGmbseReogmx1XdGt7Ui', 'Charlie', ''),
(4, 'milos@milos.com', '$2y$10$rK6bIfcEjnnDUai68CZYAeMC9w9RqQYVGFPlvfV8vu4G6BReHKyEC', '', ''),
(5, 'gmail@efti.com', '$2y$10$ZSPo6TuK3lRynHFWMXw7eeAxw.Xy63E8aeoyZPr9TyTj0iQxslTWO', 'Efti lagi', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD UNIQUE KEY `id_location` (`id_location`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
