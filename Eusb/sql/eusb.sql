-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2018 at 07:38 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eusb`
--
CREATE DATABASE IF NOT EXISTS `eusb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `eusb`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  `admin_type` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `email`, `mobile`, `sex`, `password`, `admin_image`, `admin_type`, `permission`, `user_type`) VALUES
(1, 'Chayon ', 'Bin Mahfuz', 'chayon@gmail.com', '017', 'male', '1234', 'chayon.png', 'Admin', '$', 'admin'),
(2, 'Nishat ', 'Tasnim', 'nishat@gmail.com', '01', 'Female', '1234', 'nishat.jpg', 'sub_admin', '$', 'admin'),
(15, 'Ashraful ', 'Alam Bhuiya', 'ashraf@gmail.com', '01', 'male', '1234', 'ashraf.jpg', 'sub_admin', '$', 'admin'),
(16, 'Ahsan', 'Ahmed.', 'aa91898@gmail.com', '01777513553', 'male', '1234', 'Ahsan.png', 'admin', '$', 'admin'),
(36, 'Sharmin ', 'Khondokar road', 'knondokar@gmail.com', '01', 'Female', '1234', 'prisly.jpg', 'Sub_admin', '$', 'admin'),
(37, 'Shohanuzzaman', 'Antu', 'antu@antu.com', '01', 'Male', '1234', 'antu.png', 'sub_admin', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

DROP TABLE IF EXISTS `catagory`;
CREATE TABLE `catagory` (
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tag';

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`course_code`, `course_name`, `department`) VALUES
('123', 'm', 'MBA'),
('cse 101', 'abc', 'CSE'),
('cse 102', 'abc', 'CSE'),
('cse 103', 'abc', 'CSE'),
('cse 104', 'abc', 'EEE'),
('cse 105', 'abc', 'EEE'),
('cse 106', 'abc', 'BBA'),
('cse 107', 'abc', 'BBA'),
('cse 108', 'abc', 'LAW'),
('cse 110', 'abc', 'ENG');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `c_date` date NOT NULL,
  `c_time` time NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grp`
--

DROP TABLE IF EXISTS `grp`;
CREATE TABLE `grp` (
  `g_id` int(11) NOT NULL,
  `g_name` varchar(255) NOT NULL,
  `g_description` text NOT NULL,
  `g_image` varchar(255) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `grp_date` date NOT NULL,
  `grp_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grp`
--

INSERT INTO `grp` (`g_id`, `g_name`, `g_description`, `g_image`, `admin_id`, `admin_name`, `grp_date`, `grp_time`) VALUES
(101, 'New Group', '\r\nGoogle\r\n????? ?,??,??,????? ????? (?.?? ???????) \r\n??????? ?????\r\n\r\nsuggestion ???????? ????\r\n\r\nsuggestion\r\n\r\ns?(g)?jesCH?n\r\n\r\n???????\r\n\r\nPar?mar?a\r\n\r\n???????\r\n???????\r\nsuggestion\r\n??????\r\nsuggestion, dishonor, defeat, disgrace, ecstasy, embarrassment\r\n?????\r\nsounding, playing, humming, pulse, suggestion\r\n???????\r\nsuggestion, gesture, expression\r\n??? ??? ??????\r\nGoogle ?????? ?????	\r\n???????????\r\nsuggestion - English & Bengali Online Dictionary & Grammar\r\nwww.english-bangla.com/dictionary/suggestion\r\n\r\nPhrases, Idioms & A. prep. suggestion /noun/ ????????; ???????. Next : suicidalPrevious : suggest. Bangla Academy Dictionary: ... Share \'suggestion\' with others: ...\r\nsuggestions - English & Bengali Online Dictionary & Grammar\r\nwww.english-bangla.com/dictionary/suggestions\r\n\r\nPhrases, Idioms & A. prep. suggestions /noun/???????; ??????; ?????; ???????; SYNONYM suggestion; dishonor; sounding; gesture; Next : irritabilityPrevious : ...\r\nsuggestion - English to Bengali Meaning of suggestion - bdword.com\r\nhttps://www.bdword.com/english-to-bengali-meaning-s...\r\n\r\n???????? ?????? ????\r\nMeaning and definitions of suggestion, translation in Bengali language for suggestion with similar and opposite words. Also find spoken pronunciation of ...\r\nsuggest - English to Bengali Meaning of suggest - bdword.com\r\nhttps://www.bdword.com/english-to-bengali-meaning-suggest\r\n\r\nsuggest. English to Bengali Meaning : verb : ????? ???, ??????, ????? ????, ???????? ???, ?????? ????????, ?????? ????????, ???????? ??? Details ... suggestion ?.\r\nsuggestion - Meaning in Bengali - suggestion in Bengali - Shabdkosh ...\r\nwww.shabdkosh.com/.../suggestion/suggestion-meaning...\r\n\r\n???????? ?????? ????\r\nsuggestion - Meaning in Bengali, what is meaning of suggestion in Bengali dictionary, audio pronunciation, synonyms and definitions of suggestion in Bengali ...\r\nsuggest - Meaning in Bengali - suggest in Bengali - Shabdkosh ...\r\nwww.shabdkosh.com/bn/translate/suggest/suggest-meaning-in-Bengali-English\r\n\r\nDefinitions and Meaning of suggest in English ... suggestion · ?????????? ... Meaning and definitions of suggest, translation in Bengali language for suggest with ...\r\nsuggestions - Meaning in Bengali - suggestions in Bengali ...\r\nwww.shabdkosh.com/.../suggestions/suggestions-meani...\r\n\r\n???????? ?????? ????\r\nsuggestions - Meaning in Bengali, what is meaning of suggestions in Bengali dictionary, audio pronunciation, synonyms and definitions of suggestions in ...\r\nBangla Meaning of Suggestion - Free Bangla Font\r\nwww.freebanglafont.com/english-to-bangla-meaning.p...\r\n\r\n???????? ?????? ????\r\nBangla Meaning of Suggestion || Bangla Academy Dictionary. We have been helping millions of people improve their use of the bangla language with its free ...\r\n?????\r\n3:13\r\nVocabulary -\r\nEnglish to Bangla -\r\n?????????? |\r\nAndroid App\r\nAmar Apps\r\nYouTube - ? ??????????, ????\r\n6:35\r\nTranslate bengali\r\nto english or\r\ngoogle translate by\r\nBarnali Nayan ...\r\nBN Technical Tutorial\r\nYouTube - ? ?????, ????\r\n2:10\r\n????? ????? ????\r\n????? ??? ?????\r\n????? !! My Name\r\nMeaning [Bangla ...\r\nBest Bangla Tutorial\r\nYouTube - ?? ???, ????\r\n6:54\r\nTranslate\r\nENGLISH to\r\nBENGALI | Use\r\nOffline Dictionary &\r\nENG to ...\r\niT Creators\r\nYouTube - ? ??, ????\r\n0:08\r\nBengali Indian\r\nTranslations - How\r\nTo Say Come Here\r\nWatchMojo.com\r\nYouTube - ?? ???????, ????\r\n1:57\r\nHow To Suggest\r\nFriends On\r\nFacebook\r\nWebPro Education\r\nYouTube - ? ?????, ????\r\n11:54\r\nIntroduction to\r\nPhilosophy-?????\r\n(??????)-part Two-\r\nSSHL\r\nBangladesh Open University\r\nYouTube - ?? ???, ????\r\n2:06\r\nHow to translate\r\nbengali to english\r\n(google translate)\r\nDigital ICT\r\nYouTube - ?? ??????????, ????\r\n2:06\r\nLearn Bengali\r\nVisual Dictionary -\r\nHerbs and Spices\r\nvia Videos by ...\r\nGuideMe ShowMe TestMe\r\nYouTube - ?? ??????, ????\r\n22:22\r\nArabic to Bangla\r\nSpoken- Learn\r\nBangla to Arabic-\r\nBangla to Arabic ...\r\nSayed Nuruzzaman\r\nYouTube - ?? ???, ????\r\nsuggestion meaning in bengali - suggestion in bengali | HelloEnglish ...\r\nhttps://helloenglish.com/translate/...bengali-dictionary/meaning-of-suggestion-in-Beng...\r\n\r\nsuggestion meaning in bengali: ??????? | Learn detailed meaning of suggestion in bengali dictionary with audio prononciations, definitions and usage. This page ...\r\n	1	\r\n2\r\n	\r\n3\r\n	\r\n4\r\n	\r\n5\r\n	\r\n6\r\n	\r\n7\r\n	\r\n8\r\n	\r\n9\r\n	\r\n10\r\n	\r\n???????\r\n???????? ?????????, ???? - ????? ????????? ?????? ???? - ????? ?????? ??????? ???? - ??? ?????\r\n??????????? ??????????????????\r\n', '', '5', 'Milon', '2018-06-11', '02:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `grp_member`
--

DROP TABLE IF EXISTS `grp_member`;
CREATE TABLE `grp_member` (
  `g_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grp_post`
--

DROP TABLE IF EXISTS `grp_post`;
CREATE TABLE `grp_post` (
  `g_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_headings` varchar(255) NOT NULL,
  `post_description` text NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_time` time NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grp_post_comment`
--

DROP TABLE IF EXISTS `grp_post_comment`;
CREATE TABLE `grp_post_comment` (
  `id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` int(11) NOT NULL,
  `c_date` int(11) NOT NULL,
  `c_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grp_post_like`
--

DROP TABLE IF EXISTS `grp_post_like`;
CREATE TABLE `grp_post_like` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

DROP TABLE IF EXISTS `mail`;
CREATE TABLE `mail` (
  `mail_no` int(10) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `send_to` varchar(255) NOT NULL,
  `mail_type` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`mail_no`, `sender`, `subject`, `message`, `send_to`, `mail_type`, `date`, `time`) VALUES
(1, '1', '1', '1', '1', 'user email', '2018-05-06', '00:00:00'),
(5, '454l@gmail.com', 'fsd', 'gdfs', 'abc@gmail.com', 'user email', '2018-05-01', '00:00:00'),
(6, 'abc@gmail.com', 'we got it', 'Thanks We will get to You soon', '454l@gmail.com', 'user email', '2018-05-02', '00:00:00'),
(7, 'hellow_world@f.xom', 'adfa', 'fasffsa', 'abc@gmail.com', 'user email', '2018-05-13', '06:29:48'),
(8, 'abc@gmail.com', 'we got it', 'Thanks We will get to You soon', 'hellow_world@f.xom', 'auto reply', '2018-05-13', '06:29:48'),
(9, 'hellow_world@f.xom', 'adfa', 'fasffsa', 'abc@gmail.com', 'user email', '2018-05-13', '10:33:08'),
(10, 'abc@gmail.com', 'we got it', 'Thanks We will get to You soon', 'hellow_world@f.xom', 'auto reply', '2018-05-13', '10:33:08'),
(11, 'hellow_world@f.xom', 'adfa', 'fasffsa', 'abc@gmail.com', 'user email', '2018-05-13', '10:34:24'),
(12, 'abc@gmail.com', 'we got it', 'Thanks We will get to You soon', 'hellow_world@f.xom', 'auto reply', '2018-05-13', '10:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` int(10) NOT NULL,
  `post_headings` varchar(255) NOT NULL,
  `post_description` text NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_catagory` varchar(10) NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_type` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_time` time NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_headings`, `post_description`, `post_author`, `post_catagory`, `post_image`, `post_type`, `post_date`, `post_time`, `user_type`) VALUES
(1, 'my Desk', 'Today I am writing a paragraph describing something in my apartment.I want to try some descriptive writing and no better place to start than here. \r\n\r\nAs I walk in my room and turn to the right, two doors are usually ajar. What was a closet is now an office, where two white boards, each taking a door, hang on Velcro straps, marked with information such as dates on a calendar or a morning routine notice . At eye level, a group of papers, a stack of waiter pads, and a portable USB mic and above them lie some older papers and notes. Post-It notes line the walls to the right, and to the left nothing. There is a small desk at seat level that squeezes inside the reformed closet doors, and on it lie a phone, two monitors, and a cup of pens. Various knickknacks cover the desk, but its appearance is clean. On the floor lies a PC tower that hums quietly on the inside of the desk opening. The cords running this operation run from a single extension cord, its individual cords covered by a box making them neat, and run to the outlet outside the closet. The doors can close, albeit barely, to cover all of this.', '143400006', 'CSE', '2.png', 'Status', '2018-05-01', '10:33:52', 'student'),
(2, 'Last Day At EU 1434 Batch..!!', 'Last Day At EU..!!\r\nIt was officially Last Day of 1434 Batch..!!\r\nslowly slowly may be days are gone but the relation of Our Freindship built in this days will remain Forever..!!! <3 <3', '143400016', 'cse', '40895892_2110060969027527_9104112709284134912_n.jpg', 'Status', '2018-05-16', '02:00:00', 'student'),
(3, 'Group picture of 1434 batch', 'grp pic gula kar kar kache acho all post koro..!! ei Group e..!!\r\nsobar pic jartay ache oita cover pic dewa hbe..!!', '143400037', 'CSE', '41325070_1084027195111823_7115033700043063296_n.jpg', 'Status', '2018-05-15', '10:43:02', 'student'),
(4, 'how to get android:id of a button or a text box in react native', 'I am trying to use the pre-lunch report in the beta testing in google play, and for that I need to instruct the bot how to login to my app. They require the android:id of the text boxes and button. How can I set the id in react-native to a pre-defined id that I chose?', '143400015', 'CSE', '', 'forum', '2018-06-24', '06:37:30', 'student'),
(5, 'How to convert a php array of objects to javascrript objects?', 'Can anyone provide any advice? In case it helps this is related with the Morris Charts\r\nI do not know Morris charts.. but maybe you can add a service where you can grab dynamically the data from a distant server providing a data source in the config. In this case you could completely separate the php and your js script which would be much cleaner. Hence your php script is executed on server side before the js code.. it will replace the values in your code before js will use it. ', '143400014', 'CSE', '', 'forum', '2018-05-15', '04:25:29', 'student'),
(6, 'Nice Website..!!', '<3\r\nThis Is Post Article. This Is Post Article. This Is Text. This Is Post Article. This Is Post Article. This Is Post Article. This Is Post Article. SeeThis Is Post Article. This Is Post Article. This Is Text. This Is Post Article. This Is Post Article. This Is Post Article. This Is Post Article. SeeThis Is Post Article. This Is Post Article. This Is Text. This Is Post Article. This Is Post Article. This Is Post Article. This Is Post Article. SeeThis Is Post Article. This Is Post Article. This Is Text. This Is Post Article. This Is Post Article. This Is Post Article. This Is Post Article. SeeThis Is Post Article. This Is Post Article. This Is Text. This Is Post Article. This Is Post Article. This Is Post Article. This Is Post Article. SeeThis Is Post Article. This Is Post Article. This Is Text. This Is Post Article. This Is Post Article. This Is Post Article. This Is Post Article. SeeThis Is Post Article. This Is Post Article. This Is Text. This Is Post Article. This Is Post Article. This Is Post Article. This Is Post Article. SeeThis Is Post Article. This Is Post Article. This Is Text. This Is Post Article. This Is Post Article. This Is Post Article. This Is Post Article. SeeThis Is Post Article. This Is Post Article. This Is Text. This Is Post Article. This Is Post Article. This Is Post Article. This Is Post Article. SeeThis Is Post Article. This Is Post Article. This Is Text. This Is Post Article. This Is Post Article. This Is Post Article. This Is Post Article. SeeThis Is Post Article. This Is Post Article. This Is Text. This Is Post Article. This Is Post Article. This Is Post Article. This Is Post Article. SeeThis Is Post Article. This Is Post Article. This Is Text. This Is Post Article. This Is Post Article. This Is Post Article. This Is Post Article. See', '143400002', 'bba', 'Screenshot_2018-08-20 Eastern University.png', 'status', '2018-05-15', '04:22:08', 'student'),
(7, 'How to set up a CSS switcher', 'I\'m working on a website which will switch to a new style on a set date. The site\'s built in semantic HTML and CSS, so the change should just require a CSS reference change. I\'m working with a designer who will need to be able to see how it\'s looking, as well as a client who will need to be able to review content updates in the current look as well as design progress on the new look.\r\n\r\nI\'m planning to use a magic querystring value and / or a javascript link in the footer which writes out a cookie to select the new CSS page. We\'re working in ASP.NET 3.5. Any recommendations?\r\n\r\nI should mention that we\'re using IE Conditional Comments for IE8, 7, and 6 support. I may create a function that does a replacement:', '143400003', 'cse', '', 'forum', '2018-05-15', '12:24:14', 'student'),
(8, 'CSS background color in JavaScript', 'where <selector>, <property>, <new style> are all String objects.\r\n\r\nUsually, the style property will have the same name as the actual name used in CSS. But whenever there is more that one word, it will be camel case: for example background-color is changed with backgroundColor.\r\n\r\nThe following statement will set the background of #container to the color red:\r\nIn general, CSS properties are converted to JavaScript by making them camelCase without any dashes. So background-color becomes backgroundColor\r\nI\'d like to add the color obviously needs to be in quotes element.style.backgroundColor = \"color\"; for example - element.style.backgroundColor = \"orange\"; excellent answer – Catto Jul 1 \'16 at 17:05\r\nIn Selenium tests: ((IJavaScriptExecutor)WebDriver).ExecuteScript(\"arguments[0].style.background = \'yellow\';\", webElement); – nexoma Mar 15 at 12:31\r\n@Catto In this case, color is an argument to the function, hence it should not be in quotes. However, you are right that normally, if setting a color, double quotes would be necessary in JS. ', '143400001', 'cse', '', 'Forum', '2018-06-19', '04:24:01', 'student'),
(9, 'Hellow World', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '143400010', 'bba', 'ivy.jpg', 'status', '0000-00-00', '00:00:00', 'student'),
(10, 'Late Advising, Course Add/Drop, and withdrawal\r\nfor Fall 2018 Semester', 'Students can do late advising from 02 September 2018 – 02 October\r\n2018 with late advising fee of Tk.500 (Five hundred only).\r\nLate advising fee must be deposited by 30 August 2018.\r\n\r\nCourse Add/Drop 03–09 October 2018\r\n\r\n\r\nSemester/course withdrawal:\r\n\r\ni. 03 – 09 October 2018 --> 100% course fee refund\r\nii. 10 – 16 October 2018 --> 50% course fee refund\r\niii. 17 – 23 October 2018 ? 25% course fee refund\r\n\r\nNo course fee refund after 23 October 2018\r\n', '1', 'Admin', '', 'notice', '2018-06-20', '07:49:35', 'admin'),
(12, 'ADMIT CARD FOR FINAL EXAM OF SUMMER 2018', 'Ref. No. -', '2', 'admin', 'AdmitCard_28082018.jpg', 'notice', '2018-08-28', '07:53:08', 'admin'),
(13, 'Late Advising, Course Add/Drop, and withdrawal for Fall 2018 Semester 	Teacher Evaluation for Summer 2018 ', 'Students can do late advising from 02 September 2018 – 02 October 2018 with late advising fee of Tk.500 (Five hundred only). Late advising fee must be deposited by 30 August 2018. Course Add/Drop 03–09 October 2018 Semester/course withdrawal: i. 03 – 09 October 2018 ?100% course fee refund ii. 10 – 16 October 2018 ? 50% course fee refund No course fee refund after 23 October 2018 iii. 17 – 23 October 2018 ? 25% course fee refund ¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬ Asif Imran Deputy Registrar ', '15', 'admin', '', 'notice', '2018-06-21', '10:49:49', 'admin'),
(14, 'FEES PAYMENT (3rd installment for Summer, 2018 Semester) BY STUDENTS AT UCBL BOOTH IN EU PLAZA AREA', 'Students can pay their tuition fees ( 3rd installment for Summer - 2018 Semester) at Plaza Area between 12-13 August 2018 without late payment fees. The UCBL booth will remain open from 10.30 a.m. till 3:00 p.m. for collection of money at the EU Plaza,House 26, Road 5, Dhanmondi. ', '16', 'admin', '', 'notice', '2018-08-01', '04:07:24', 'admin'),
(15, 'Holiday Notice on Eid-ul-Adha ', 'Eastern University will remain closed from 16 August to 25 August 2018 on account of Eid-ul-Adha. ______________________________ Abul Basher Khan Registrar', '36', 'admin', '', 'notice', '2018-08-01', '04:07:36', 'admin'),
(17, 'Download button in table', ' 0\r\ndown vote\r\nfavorite\r\n\r\nI have made a table with some data in it and have one cell containing a button which downloads a pdf file.The question is now, How do I make this link open/download on a simple left click. Also, each table cell has a different file attached to it.\r\n\r\nThis would be the the (simplified) table, the only difference is that there would be more rows, with the same structure.', '143400010', 'cse', '', 'Forum', '2018-05-15', '03:00:27', 'student'),
(18, 'New routine', 'Updated routine', '37', 'admin', 'routine.jpg', 'notice', '2018-08-01', '04:11:07', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dor` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `home` text NOT NULL,
  `p_address` text NOT NULL,
  `religion` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `student_image` varchar(255) NOT NULL,
  `permission` varchar(10) NOT NULL,
  `department` varchar(15) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `last_name`, `email`, `dor`, `time`, `dob`, `mobile`, `home`, `p_address`, `religion`, `sex`, `password`, `student_image`, `permission`, `department`, `user_type`) VALUES
(143400001, 'Chayon', 'Bin Mahfuz', 'chayon@gmail.com', '2018-05-03', '09:49:21pm', '1997-01-01', '123456789', 'Bogra', 'dhaka', 'Muslim', 'male', '1234', 'chayon.png', 'APPROVED', 'CSE', 'student'),
(143400003, 'merina', 'kawser', 'merina@gmail.com', '0000-00-00', '', '1996-04-04', '018888888', 'scc', 'dcsc', 'muslim', 'Female', '1234', 'default-profile-picture.jpg', 'APPROVED', 'BBA', 'student'),
(143400006, 'Sudipto', 'Mozomdar', 'sudip@gmail.com', '2018-05-15', '04:40:00pm', '2018-05-02', '', 'dhaka', 'dhaka', 'Hindu', 'male', '1234', 'default-profile-picture.jpg', 'APPROVED', 'CSE', 'student'),
(143400010, 'Nurat', 'Ivy', 'ivy@gmail.com', '1997-01-01', '10:01:10', '1997-01-01', '01', 'tangail', 'dhanmondi', 'Muslim', 'Female', '1234', 'ivy.jpg', 'approved', 'CSE', 'student'),
(143400014, 'Golam Rabby', 'Shawon', 'golamrabby@gmail.com', '2018-04-26', '10:40:46pm', '1997-08-18', '12345678910', 'barishal', 'Tenari-more', 'muslim', 'Male', '1234', '31453870_1933253970247070_5354282229900721278_n.jpg', 'approved', 'CSE', 'student'),
(143400015, 'ashraful Alam', 'bhuiya', 'ashraf@gmail.com', '2018-08-20', '07:47:09pm', '2018-08-08', '25656987414', 'kg', 'ldlshjgl', 'muslim', 'Male', '1234', '40406729_2103729199660704_849605798857277440_n.jpg', 'DELETED', 'CSE', 'student'),
(143400016, 'Ahsan', 'Ahmed', 'aa91898@gmail.com', '2018-07-19', '08:10:47pm', '2016-05-19', '01777513553', '1234', '1234', 'Muslim', 'male', '1234', 'Ahsan.png', 'APPROVED', 'CSE', 'student'),
(143400037, 'Shohanuzzaman', 'Antu', 'antu@gmail.com', '2018-09-10', '', '2018-09-03', '12345678910', 'dhaka', 'dhaka', 'Muslim', 'Antu', '1234', '25354062_1984572981757426_642019740437870761_n.jpg', 'Approved', 'CSE', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dor` date NOT NULL,
  `time` time NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `home` text NOT NULL,
  `p_address` text NOT NULL,
  `religion` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `teacher_image` varchar(255) NOT NULL,
  `permission` varchar(10) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`first_name`, `last_name`, `email`, `dor`, `time`, `dob`, `mobile`, `home`, `p_address`, `religion`, `sex`, `password`, `teacher_image`, `permission`, `teacher_id`, `designation`, `department`, `user_type`) VALUES
('Mr. Muhammad Mahfuz', 'Hasan', 'mhasan@easternuni.edu.bd', '2018-05-13', '00:00:00', '0000-00-00', '8621419', 'NULL', 'NULL', 'Muslim', 'male', '12345678', 'MilonSir.jpg', 'APPROVED', 5, ' Coordinator Evening Program and Assistant Professor', 'CSE', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grp`
--
ALTER TABLE `grp`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mail_no`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `mail_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143400038;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
