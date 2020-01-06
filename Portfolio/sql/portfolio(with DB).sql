-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2019 at 07:51 PM
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
-- Database: `portfolio`
--
CREATE DATABASE IF NOT EXISTS `portfolio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `portfolio`;

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
(2, '<p>I am<strong>&nbsp;&nbsp;Ahsan&nbsp;Ahmed.&nbsp; </strong>I am a Student Of <i>CSE.&nbsp;</i>I have been working On Web development for last 3yrs.&nbsp;I have learnt this skills while i was in my University.&nbsp;I have Completed my Bachelors Degree requirements in Computer Science degree from Dhaka,Bangladesh and now am a full time freelancer.</p><p>I am very passionate TO Work.I Love to Design and Develop Websites - below there you may find some examples of my works. Its kind a making Hobby to a profession for me.</p><p>You can hire me to develop or build Your Website.&nbsp;InshaAllah i can Assure you to build a nice and proper Website for your personal or professional Purposes.</p>', '2.jpg');

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
(1, '1.jpg', 'Ahsan Ahmed', '<h3>Thanks For Watching!</h3><p>You can hire me to get a Beautiful Website for Your Business. You can also See my blog to access exclusive content,join the discussion and Share your valuable Comments on Your favorite topics.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `con_id` int(10) UNSIGNED NOT NULL,
  `con_address` longtext NOT NULL,
  `con_email` varchar(200) NOT NULL,
  `con_mob` varchar(15) NOT NULL,
  `con_mob2` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`con_id`, `con_address`, `con_email`, `con_mob`, `con_mob2`) VALUES
(1, 'Nayabazar <br> Dhaka,Bangladesh ', 'aa91898@gmail.com', '01777519553', '01554012764');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(10) UNSIGNED NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `mail_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` longtext NOT NULL,
  `status` text NOT NULL,
  `result` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`mail_id`, `name`, `email`, `subject`, `message`, `status`, `result`) VALUES
(1, '1', '1', '1', '1', 'unread', 'solved'),
(2, 'a', 'aa91898@gmail.com', 'df', 'a', '', ''),
(3, 'sw', 'aa91898@gmail.com', 's', 's', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `pro_id` int(10) UNSIGNED NOT NULL,
  `pro_img` text NOT NULL,
  `pro_title` varchar(200) NOT NULL,
  `pro_link` text NOT NULL,
  `pro_desc` longtext NOT NULL,
  `pro_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`pro_id`, `pro_img`, `pro_title`, `pro_link`, `pro_desc`, `pro_type`) VALUES
(1, '1.png', 'Search Box', 'https://ahsanenterprize.github.io/search-box/', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>', 'Template'),
(2, '2.png', 'Windows portfolio', 'http://ahmed.ahsan.rf.gd/portfoli-gh-pages/', '<ul><li><strong>Type</strong>: web design</li><li><strong>Resposive</strong>: Yes</li><li><strong>Languages Used</strong>: Html, Css, JQuery, Bootstrap .</li><li><strong>Compitible Browsers</strong>: FF,GC,IE,ME.</li><li><strong>Other</strong>: SEO friendly<br><a href=\"https://ahsanenterprize.github.io/portfoli/\">https://ahsanenterprize.github.io/portfoli/</a></li></ul>', 'Template'),
(3, '3.png', 'Graphics Notes', 'https://ahsanenterprize.github.io/graphics/', '<ul><li><strong>Type</strong>: web Design</li><li><strong>Resposive</strong>: Yes</li><li><strong>Languages Used</strong>: Html, Css, JQuery, Bootstrap .</li><li><strong>Compitible Browsers</strong>: FF,GC,IE,ME.</li><li><strong>Other</strong>: SEO friendly</li></ul>', 'Template'),
(4, '4.png', 'Lets Learn', 'https://ahsanenterprize.github.io/letslearn/', '<ul><li><strong>Type</strong>: web Design</li><li><strong>Resposive</strong>: Yes</li><li><strong>Languages Used</strong>: Html, Css, Bootstrap.</li><li><strong>Compitible Browsers</strong>: FF,GC,IE,ME.</li><li><strong>Other</strong>: SEO friendly</li></ul>', 'Template'),
(5, '5.jpg', 'Educational site', 'https://ahsanenterprize.github.io/Educational-temp/', '<ul><li><strong>Type</strong>: Web Design.</li><li><strong>Resposive</strong>: Yes</li><li><strong>Languages Used</strong>: Html, Css, JQuery, Bootstrap .</li><li><strong>Compitible Browsers</strong>: FF,GC,IE,ME.</li><li><strong>Other</strong>: SEO friendly</li></ul>', 'Template'),
(6, '6.jpg', 'Eastern university', 'https://ahsanenterprize.github.io/Easternuni/', '<ul><li><strong>Type</strong>: html Design</li><li><strong>Resposive</strong>: Yes</li><li><strong>Languages Used</strong>: Html, Css, JQuery, Bootstrap.</li><li><strong>Compitible Browsers</strong>: FF,GC,IE,ME.</li><li><strong>Other</strong>: SEO friendly</li></ul>', 'Template'),
(7, '7.png', 'Formal Cv by html css', 'https://ahsanenterprize.github.io/Mycv/home.html', '<ul><li><strong>Type</strong>: Web Design</li><li><strong>Resposive</strong>: Yes</li><li><strong>Languages Used</strong>: Html, Css, JQuery, Bootstrap .</li><li><strong>Compitible Browsers</strong>: FF,GC,IE,ME.</li><li><strong>Other</strong>: SEO friendly</li></ul>', 'Template'),
(8, '8.png', 'Raw works', 'http://phpoop.epizy.com/', '<ul><li><strong>Type</strong>: php Raw</li><li><strong>Resposive</strong>: no</li><li><strong>Languages Used</strong>: Html, Css,Php[oop].</li><li><strong>Compitible Browsers</strong>: FF,GC,IE,ME.</li><li><strong>Other</strong>: SEO friendly</li></ul>', 'Application'),
(9, '9.jpg', 'Railway ticket', 'http://railway.epizy.com/', '<ul><li><strong>Type</strong>: simple php woorks</li><li><strong>Resposive</strong>: no</li><li><strong>Languages Used</strong>: Html, Css, JQuery, Bootstrap , Php Raw.</li><li><strong>Compitible Browsers</strong>: FF,GC,IE,ME.</li><li><strong>Other</strong>: SEO friendly</li></ul>', 'Application'),
(10, '10.png', 'Personal Blog', 'http://blog3211.rf.gd/', '<ul><li><strong>Type</strong>: Php project</li><li><strong>Resposive</strong>: no</li><li><strong>Languages Used</strong>: Html, Css,php Raw.</li><li><strong>Compitible Browsers</strong>: Firefox,Google Chrome,IE,M Edge.</li><li><strong>Others</strong>:</li></ul>', 'Application'),
(11, '11.png', 'Cv Maker', 'http://cv.epizy.com/sign_in.php', '<p>&nbsp; &nbsp; &nbsp;Type: Php project &nbsp; &nbsp; Resposive: Yes &nbsp; &nbsp; Languages Used: Html, Css, JQuery, Bootstrap,Php Raw. &nbsp; &nbsp; Compitible Browsers: FF,GC,IE,ME. &nbsp; &nbsp; Other: SEO friendly website.</p>', 'Application'),
(12, '12.png', 'University Social platform', 'http://eusb.epizy.com/sign_in.php', '<ul><li><strong>username</strong>: user@user.com</li><li><strong>Password</strong>: Aa123456789</li><li><strong>Type</strong>: Php project</li><li><strong>Resposive</strong>: no</li><li><strong>Languages Used</strong>: Bootstrap 3, php Raw, Mysql.</li><li><strong>Compitible Browsers</strong>: Firefox,Google Chrome,IE,M Edge.</li><li><strong>Others</strong>:SEO Friendly</li></ul>', 'Application'),
(13, '13.png', 'Student Management System', 'http://studentsys.epizy.com/public/', '<ul><li><strong>Type</strong>: Laravel project</li><li><strong>Resposive</strong>: NO</li><li><strong>Languages Used</strong>: Html, Css, JQuery, Bootstrap, Laravel Framework.</li><li><strong>Compitible Browsers</strong>: FF,GC,IE,ME.</li><li><strong>Other</strong>: SEO friendly</li></ul>', 'Application');

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
(1, 'Web-Template Design', '1.png', '<ul><li>Web Template design</li><li>Static website design</li><li>Custom web design</li><li>Dynamic web design</li><li>Responsive web design</li></ul>'),
(2, 'Laravel Web-App Devlopment', '2.png', '<ul><li>WebApp Template Development</li><li>Dynamic website Development</li><li>Custom webApp Creation</li><li>Feasible webApp Development</li></ul>'),
(3, 'Pythod Web app Delopment', '3.png', '<ul><li>WebApp Template Development</li><li>Dynamic website Development</li><li>Custom webApp Creation</li><li>Feasible webApp Development</li></ul>'),
(4, 'Photoshop Design', 'default-image.jpg', '<ul><li>Retouch</li><li>bg removal</li><li>Glamour touch</li><li>posters design</li><li>social cover design ...</li></ul>'),
(5, 'Illustration', 'default-image.jpg', '<ul><li>Logo design</li><li>vector image</li><li>clipping ...</li></ul>');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `percent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `title`, `percent`) VALUES
(1, 'html 5', 80),
(2, 'css 3', 80),
(3, 'JQuery', 45),
(4, 'Bootstrap 4', 85),
(5, 'Javascript', 40),
(6, 'vue.js', 40),
(7, 'Angular.js', 40),
(8, 'react', 40),
(9, 'php [Raw]', 90),
(10, 'Laravel', 90),
(11, 'symfony', 40),
(12, 'Mysql / Sql programming', 90),
(13, 'Django / Python', 40),
(14, 'Adobe Photoshop', 80),
(15, 'Adobe illustrator', 80),
(16, 'Wordpress', 50);

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `social_id` int(11) NOT NULL,
  `social_name` varchar(200) NOT NULL,
  `icon_link` text NOT NULL,
  `social_link` text NOT NULL,
  `social_color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`social_id`, `social_name`, `icon_link`, `social_link`, `social_color`) VALUES
(7, 'facebook', 'fa fa-facebook', 'https://www.facebook.com/Ahsan3211', '#3c67b2'),
(8, 'Twitter', 'fa fa-twitter', 'https://twitter.com/ahsanenterprize/', '#1c9cdf'),
(9, 'Linked in', 'fa fa-linkedin', 'https://www.linkedin.com/in/ahsanenterprize/', '#0077b5'),
(10, 'Github', 'fa fa-github', 'https://github.com/ahsanenterprize', '#000000'),
(11, 'StackOverflow', 'fa fa-stack-overflow', 'https://stackoverflow.com/users/9724338/ahsan', '#ff8040'),
(12, 'Skype', 'fa fa-skype', 'https://join.skype.com/invite/kMN3J4XJt6ji', '#55c8f9'),
(13, 'Youtube', 'fa fa-youtube-play', 'https://www.youtube.com/channel/UCj0OCPDjHIY1N7ndnkUfPaQ?view_as=subscriber', '#ec0000');

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
(1, 'Ahsan', 'Ahsan Ahmed', 'aa91898@gmail.com', '01777519553', '$2y$10$VswcMIerKDA6wbbf4iGjO.xBEOQFxfpprUcNjMgBcapIgqVGDBEoq', '1.png', 'user_I am  Ahsan Ahmed.  I am a Student Of CSE. I have been working On Web development for last 3yrs. I have learnt this skills while i was in my University. I have Completed my Bachelors Degree requirements in Computer Science degree from Dhaka,Bangladesh and now am a full time freelancer.\r\n\r\nI am very passionate TO Work.I Love to Design and Develop Websites - below there you may find some examples of my works. Its kind a making Hobby to a profession for me.\r\n\r\nYou can hire me to develop or build Your Website. InshaAllah i can Assure you to build a nice and proper Website for your personal or professional Purposes.', '2'),
(2, 'mehedi', 'mehedi', 'mehedigrp786@gmail.com', '01777519559', '$2y$10$IirR8gJ2dGoNIUvR/jFItOqp7x3dK/r6XCQ4Z8BriS9Az71afoMTG', 'user-default-image.png', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `v_id` int(10) UNSIGNED NOT NULL,
  `v_ip` text NOT NULL,
  `os` varchar(50) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `device` varchar(50) NOT NULL,
  `first_v` date NOT NULL,
  `last_v` date NOT NULL,
  `color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`v_id`, `v_ip`, `os`, `browser`, `device`, `first_v`, `last_v`, `color`) VALUES
(1, '::1', 'Windows 10', 'Firefox', 'Computer', '2019-12-02', '2019-12-26', '#18ba60');

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
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

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
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`);

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
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`v_id`);

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
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `mail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `pro_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ser_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `v_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
