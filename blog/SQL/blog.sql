-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2019 at 03:38 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'Ahsan', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(255) NOT NULL,
  `post_title` text NOT NULL,
  `post_date` date NOT NULL,
  `post_author` text NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_date`, `post_author`, `post_image`, `post_content`) VALUES
(0, 'Book Cover', '2019-07-29', 'q', 'laravel.jpg', 'dsafghj'),
(0, '4 x 8 feet Banner Design', '2019-07-29', 'q', 'static.jpg', 'lkijuhgyfdsx'),
(0, 'hellow world', '2019-07-30', 'null', 'IMG20190605174431.jpg', 'Hmm. Weâ€™re having trouble finding that site.\r\n\r\nWe canâ€™t connect to the server at www.facebook.com.\r\n\r\nIf that address is correct, here are three other things you can try:\r\n\r\n    Try again later.\r\n    Check your network connection.\r\n    If you are connected but behind a firewall, check that Firefox Developer Edition has permission to access the Web.Hmm. Weâ€™re having trouble finding that site.\r\n\r\nWe canâ€™t connect to the server at www.facebook.com.\r\n\r\nIf that address is correct, here are three other things you can try:\r\n\r\n    Try again later.\r\n    Check your network connection.\r\n    If you are connected but behind a firewall, check that Firefox Developer Edition has permission to access the Web.Hmm. Weâ€™re having trouble finding that site.\r\n\r\nWe canâ€™t connect to the server at www.facebook.com.\r\n\r\nIf that address is correct, here are three other things you can try:\r\n\r\n    Try again later.\r\n    Check your network connection.\r\n    If you are connected but behind a firewall, check that Firefox Developer Edition has permission to access the Web.Hmm. Weâ€™re having trouble finding that site.\r\n\r\nWe canâ€™t connect to the server at www.facebook.com.\r\n\r\nIf that address is correct, here are three other things you can try:\r\n\r\n    Try again later.\r\n    Check your network connection.\r\n    If you are connected but behind a firewall, check that Firefox Developer Edition has permission to access the Web.'),
(0, 'Abcdefghi', '2019-07-30', 'jklm', '', 'mnopqrst\r\nuv \r\nwxyz \r\ni love you');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
