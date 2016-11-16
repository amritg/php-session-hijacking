-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2016 at 12:57 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `session-hijacking`
--

-- --------------------------------------------------------

--
-- Table structure for table `sessionid`
--

CREATE TABLE `sessionid` (
  `id` int(11) NOT NULL,
  `sessionNumber` int(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessionid`
--

INSERT INTO `sessionid` (`id`, `sessionNumber`) VALUES
(123456656, 123456876);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `password`, `email`) VALUES
(11, 'amritg', 'aaaa', 'gautamamrit24@gmail.com'),
(12, 'amit', 'ssss', 'amit@gmail.com'),
(13, 'a', 'a', 'a@gmail.com'),
(17, 'amrit', 'aaaa', 'gautamamrit24@gmalci.com'),
(16, 'sfasfa', 'sfasd', 'ga@ga.coma'),
(18, 'ram', 'ram', 'ram@ram.com'),
(19, 'gita', 'aaaa', 'gita@gita.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sessionid`
--
ALTER TABLE `sessionid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sessionid`
--
ALTER TABLE `sessionid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456657;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
