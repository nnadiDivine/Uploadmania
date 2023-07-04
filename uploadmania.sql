-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2022 at 02:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uploadmania`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'admin.svg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `password`, `img`) VALUES
(1, 'admin', 'buddy@mail.com', 'b3cf3b9eb08bd21fb6de2f586eff9be1', 'admin.svg');

-- --------------------------------------------------------

--
-- Table structure for table `adminmessages`
--

CREATE TABLE `adminmessages` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'admin.svg',
  `topic` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminmessages`
--

INSERT INTO `adminmessages` (`id`, `fullname`, `img`, `topic`, `message`) VALUES
(1, 'admin', 'admin.svg', 'hello', 'welcome');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `mainid` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `filenames` varchar(255) NOT NULL,
  `filesize` varchar(255) NOT NULL,
  `filetype` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`mainid`, `id`, `filenames`, `filesize`, `filetype`, `filename`) VALUES
(1, 1, '626a5b36405cc8.09208131.png', '6540', 'image/png', 'twitter_whit.png'),
(2, 1, '626a5b3db89598.32268400.jpg', '10471', 'image/jpeg', 'vegeta4.jpg'),
(3, 1, '626a60b7e7ff29.06889752.jpg', '1239726', 'image/jpeg', 'goku2.jpg'),
(4, 1, '626a6124b19b84.50379227.mp4', '11727633', 'video/mp4', 'The Fighter Z Anthem! (Dbz Song) ( 360 X 640 ).mp4'),
(5, 1, '626a63685a3e14.78794106.mp4', '11727633', 'video/mp4', 'The Fighter Z Anthem! (Dbz Song) ( 360 X 640 ).mp4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwords` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'users.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `passwords`, `img`) VALUES
(1, 'lorem', 'lorem@lorem.com', '9942e96f5698b4be2a0e04231f3e4f78', 'users.png');

-- --------------------------------------------------------

--
-- Table structure for table `usersmessages`
--

CREATE TABLE `usersmessages` (
  `ide` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `messageimg` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminmessages`
--
ALTER TABLE `adminmessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`mainid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersmessages`
--
ALTER TABLE `usersmessages`
  ADD PRIMARY KEY (`ide`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adminmessages`
--
ALTER TABLE `adminmessages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `mainid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usersmessages`
--
ALTER TABLE `usersmessages`
  MODIFY `ide` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
