-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2019 at 07:51 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cit_crud`
--
CREATE DATABASE IF NOT EXISTS `cit_crud` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cit_crud`;

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about` longtext NOT NULL,
  `about_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about`, `about_img`) VALUES
(2, '<ul><li>First item</li><li>Second item</li><li>Third item</li><li>Fourth item</li><li>3.3.3</li></ul>', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bg`
--

CREATE TABLE `bg` (
  `bg_id` int(10) UNSIGNED NOT NULL,
  `bg` text NOT NULL,
  `bg_title` varchar(200) NOT NULL,
  `bg_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bg`
--

INSERT INTO `bg` (`bg_id`, `bg`, `bg_title`, `bg_desc`) VALUES
(1, '1.jpg', 'Lorem Ipsum', '<blockquote><p><i><strong>Lorem Ipsum</strong></i>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing <a href=\"www.faceboook.com\">software </a>like Aldus PageMaker including versions of Lorem Ipsum.</p></blockquote><p>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `con_id` int(10) UNSIGNED NOT NULL,
  `con_address` longtext NOT NULL,
  `con_email` varchar(200) NOT NULL,
  `con_mob` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`con_id`, `con_address`, `con_email`, `con_mob`) VALUES
(1, 'dimu pore age testing ses hok', 'everyone@likes.memes', '01777519553');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `mail_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` longtext NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`mail_id`, `name`, `email`, `message`, `status`) VALUES
(1, 'New bappy', 'aa91898@gmail.com', 'fasdfsdf', 'read'),
(2, 'New bappy', 'aa91898@gmail.com', 'fasdfsdf', 'unread'),
(6, 'Fillhal', 'fill@hall.com', 'mail isu aur ka hoon fillhaal ki tera ho jau', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `pro_id` int(10) UNSIGNED NOT NULL,
  `pro_img` text NOT NULL,
  `pro_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`pro_id`, `pro_img`, `pro_title`) VALUES
(1, '1.jpg', 'making memes'),
(2, '2.jpg', 'life is one 2'),
(3, '3.jpg', 'no 1 Sakib khan'),
(5, 'default-image.jpg', 'dfghdfg');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ser_id` int(11) UNSIGNED NOT NULL,
  `ser_title` varchar(200) NOT NULL,
  `ser_img` text NOT NULL,
  `ser_details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ser_id`, `ser_title`, `ser_img`, `ser_details`) VALUES
(1, 'god is One', '1.jpg', '<h2>Katty Parry per show 100k doller$</h2>'),
(2, 'life is one', '2.jpg', '<h2>Katty Parry per show 100k doller$</h2>'),
(3, 'no 1 Sakib khan', '3.jpg', '<blockquote><p><strong>Note</strong>:</p><p>The check is done using the real UID/GID instead of the effective one.</p></blockquote>'),
(4, 'test', '4.jpg', '<p><strong>test</strong></p>');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `social_id` int(11) NOT NULL,
  `social_name` varchar(200) NOT NULL,
  `icon_link` text NOT NULL,
  `social_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`social_id`, `social_name`, `icon_link`, `social_link`) VALUES
(1, 'Facebook', 'fa fa-facebook', 'https://www.facebook.com/Ahsan3211'),
(2, 'Twitter', 'fa fa-twitter', 'twitter.com'),
(3, 'Google plus', 'fa fa-google-plus', 'google.com'),
(4, 'Youtube', 'fa fa-youtube', 'https://www.youtube.com/watch?v=T16rj8XuszU');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `image` text,
  `about` text,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `name`, `email`, `mobile`, `password`, `image`, `about`, `role`) VALUES
(1, 'Ahsan', 'Ahsan Ahmed', 'aa91898@gmail.com', '01777519553', '$2y$10$iB9t96RFcLRpjRQQkAe/peci9WLk8JcjlYUEPwkPa1gX9ftJYmVyi', '1.jpg', NULL, '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `bg`
--
ALTER TABLE `bg`
  ADD PRIMARY KEY (`bg_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`social_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bg`
--
ALTER TABLE `bg`
  MODIFY `bg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `mail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `pro_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ser_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
