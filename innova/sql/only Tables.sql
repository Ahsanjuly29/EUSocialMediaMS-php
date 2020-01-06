-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2019 at 06:59 AM
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
-- Database: `cit_crud`
--

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
(2, '<p><strong>Magic</strong> Quote\'s is a process that automagically escapes incoming data to the PHP script. It\'s preferred to code with magic quotes off and to instead escape the data at runtime, as needed. ...</p>', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bg`
--

CREATE TABLE `bg` (
  `bg_id` int(10) UNSIGNED NOT NULL,
  `bg` text NOT NULL,
  `bg_title` varchar(200) NOT NULL,
  `bg_desc` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bg`
--

INSERT INTO `bg` (`bg_id`, `bg`, `bg_title`, `bg_desc`) VALUES
(1, '1.jpg', 'Lorem Ipsum', 'Lorem Ipsum - All the facts - Lipsum generator\r\nhttps://www.lipsum.com\r\nà¦ªà§ƒà¦·à§à¦ à¦¾à¦Ÿà¦¿ à¦…à¦¨à§à¦¬à¦¾à¦¦ à¦•à¦°à§à¦¨\r\nReference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.');

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
(6, 'Fillhal', 'fill@hall.com', 'mail isu aur ka hoon fillhaal ki tera ho jau', 'unread');

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
(4, '4.jpg', 'Lol 2');

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
(4, 'test', '4.jpg', '<p><strong>test</strong></p>'),
(5, 'hellow', '5.jpg', '&lt;p&gt;World&lt;/p&gt;'),
(6, 'ironman ', '6.jpg', '&lt;p&gt;i am ironman&lt;/p&gt;');

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
(4, 'Youtube', 'fa fa-youtube', 'https://www.youtube.com/watch?v=T16rj8XuszU'),
(6, 'aaa', 'fa fa-users', 'aaa');

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
(1, 'Ahsan', 'Ahsan Ahmed', 'aa91898@gmail.com', '01777519553', '$2y$10$iB9t96RFcLRpjRQQkAe/peci9WLk8JcjlYUEPwkPa1gX9ftJYmVyi', '1.jpg', '', '2'),
(2, 'lll', 'Ahsan Ahmed', 'aas91898@gmail.com', '', '$2y$10$FZ2O72JDjlEtnxemreWutO./mkOBgx/SsXjtNzPrz9lZmvSHTtz0i', 'user-default-image.png', '', '0'),
(3, 'fdgfdg', 'dfgdfg', 'sd@f.goc', '', '$2y$10$Vp5CxgFeop58/ZKWsnFDfeY/XKigsthyZ7xODoeURJQcl52Tpl89K', '3.jpg', '', '0'),
(4, 'dcs', 'urvashi rawtela heroine', 'ssd@f.goc', '011111111111', '$2y$10$8AER0Lbz10sUNVW6UVJQ7u6klXwROP1WJ4IQWR73r8aYVFCA2CIU.', 'user-default-image.png', '&lt;h3&gt;&lt;a href=&quot;https://www.lipsum.com/&quot;&gt;Lorem Ipsum - All the facts - Lipsum generator&lt;/a&gt;&lt;/h3&gt;&lt;p&gt;&lt;a href=&quot;https://www.lipsum.com/&quot;&gt;https://www.lipsum.com&lt;/a&gt;&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;https://translate.google.com/translate?hl=bn&amp;amp;sl=en&amp;amp;u=https://www.lipsum.com/&amp;amp;prev=search&quot;&gt;à¦ªà§ƒà¦·à§à¦ à¦¾à¦Ÿà¦¿ à¦…à¦¨à§à¦¬à¦¾à¦¦ à¦•à¦°à§à¦¨&lt;/a&gt;&lt;/p&gt;&lt;p&gt;Reference site about &lt;i&gt;Lorem&lt;/i&gt; Ipsum, giving information on its origins, as well as a random Lipsum generator.&lt;/p&gt;', '1'),
(5, 'lllaxx', 'Ahsan Ahmed', 'aaxa91898@gmail.com', '', '$2y$10$M5fgjxViQ/IjAXwvvtzpd.rgw5GchMUtaWcM5Tx8WK9SF04flTBiS', 'user-default-image.png', '', '0'),
(6, 'sdfsd', 'Ahsan Ahmed', 'aasxzz91898@gmail.com', '', '$2y$10$eeClwcWcAoUq1k.94YXFz.0h0KPOyYFYmlOBPDvuulgd5Iq4sQzyC', 'user-default-image.png', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt; is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', '2');

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
  MODIFY `pro_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ser_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
