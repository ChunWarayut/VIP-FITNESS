-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 08, 2019 at 09:15 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vip_fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_answer`
--

CREATE TABLE `tb_answer` (
  `id` int(11) NOT NULL,
  `id_person` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `score` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_answer`
--

INSERT INTO `tb_answer` (`id`, `id_person`, `id_question`, `score`) VALUES
(1, 4, 1, 5),
(2, 4, 2, 5),
(3, 4, 3, 4),
(4, 4, 4, 4),
(5, 4, 5, 3),
(6, 4, 6, 3),
(7, 4, 7, 2),
(8, 4, 8, 1),
(9, 2, 1, 4),
(10, 2, 2, 4),
(11, 2, 3, 3),
(12, 2, 4, 1),
(13, 2, 5, 2),
(14, 2, 6, 3),
(15, 2, 7, 4),
(16, 2, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_person`
--

CREATE TABLE `tb_person` (
  `id_person` int(11) NOT NULL,
  `created` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `education` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_person`
--

INSERT INTO `tb_person` (`id_person`, `created`, `gender`, `education`, `age`, `status`) VALUES
(1, '30-10-2013 09:46:53', 'หญิง', 'ปริญญาตรี', 'อายุระหว่าง 21 - 30 ปี', 'เจ้าหน้าที่'),
(2, '30-10-2013 09:47:30', 'ชาย', 'มัธยมศึกษาตอนต้น/ตอนปลาย/เทียบเท่า', 'อายุ ต่ำกว่า 20 ปี', 'นักเรียน/นักศึกษา'),
(3, '30-10-2013 09:48:40', 'หญิง', 'สูงกว่าปริญญาตรี', 'อายุระหว่าง 31 - 40 ปี', 'ศิษย์เก่า'),
(4, '30-10-2013 09:49:07', 'หญิง', 'สูงกว่าปริญญาตรี', 'อายุ 60 ปีขึ้นไป', 'ประชาชนทั่วไป'),
(5, '30-10-2013 09:50:17', 'หญิง', 'ประถมศึกษา', 'อายุระหว่าง 51 - 59 ปี', 'นักเรียน/นักศึกษา'),
(6, '30-10-2013 09:50:55', 'ชาย', 'ปริญญาตรี', 'อายุระหว่าง 41 - 50 ปี', 'ผู้บริหาร'),
(7, '30-10-2013 11:22:15', 'หญิง', 'ปริญญาตรี', 'อายุระหว่าง 31 - 40 ปี', 'นักเรียน/นักศึกษา'),
(8, '30-10-2013 11:35:08', 'หญิง', 'มัธยมศึกษาตอนต้น/ตอนปลาย/เทียบเท่า', 'อายุระหว่าง 21 - 30 ปี', 'เจ้าหน้าที่'),
(9, '30-10-2013 11:39:48', 'หญิง', 'ปริญญาตรี', 'อายุ ต่ำกว่า 20 ปี', 'นักเรียน/นักศึกษา');

-- --------------------------------------------------------

--
-- Table structure for table `tb_question`
--

CREATE TABLE `tb_question` (
  `id_question` int(11) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_question`
--

INSERT INTO `tb_question` (`id_question`, `question`) VALUES
(1, '1.aa'),
(2, '2.bb'),
(3, '3. cc'),
(4, '4. dd'),
(5, '5.ee'),
(6, '6.ff'),
(7, '7. gg'),
(8, '8. hh');

-- --------------------------------------------------------

--
-- Table structure for table `vip_comment`
--

CREATE TABLE `vip_comment` (
  `comment_id` int(6) NOT NULL,
  `comment_detail` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `member_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vip_comment`
--

INSERT INTO `vip_comment` (`comment_id`, `comment_detail`, `comment_date`, `member_id`) VALUES
(1, 'ตำรวจเมืองภูเก็ต หิ้วตัวหนุ่มหื่นลวนลามคนไข้สาวประเภทสอง กลางโรงพยาบาล มาสอบปากคำ สารภาพทำจริง เพราะเมาเหล้า หลังก่อเหตุกลับไปนอนบ้าน จนตำรวจมาคุมตัว ...\r\nจากกรณี คนไข้สาวประเภทสอง ถูกคนมาเฝ้าไข้เตียงข้างๆ ลวนลามด้วยการจูบ และลูบคลำหน้าอก ตามที่เสนอข่าวไปแล้วนั้น', '2019-03-08 20:42:46', 4),
(2, 'ล่าสุดเมื่อเวลา 17.00 น. วันที่ 8 มี.ค. ชุดสืบสวน สภ.เมืองภูเก็ต นำตัว นายพิชิต พิมพ์หอม อายุ 57 ปี มาพบพนักงานสอบสวน โดยมี พ.ต.อ.สมพงศ์ ทิพย์อาภากุล ผกก.สภ.เมืองภูเก็ต ร่วมสอบปากคำเพิ่มเติม\n\nโดย นายพิชิต รับสารภาพว่า ได้กระทำจริง เนื่องจากวันเกิดเหตุได้รับจ้างเฝ้าไข้ผู้ป่วยที่อยู่เตียงข้างๆ และก่อนหน้านั้น ได้มีการดื่มสุราเข้าไป เมื่อพบเห็น สาวประเภทสอง ซึ่งมีหน้าตาดี ทำให้เกิดอารมณ์ จึงเข้ากอด จูบ และลูบคลำที่หน้าอก ก่อนที่เจ้าหน้าที่จะเข้ามาเห็น\n\nทั้งนี้ นายพิชิต เล่าอีกว่า ตนเองทำอาชีพรับจ้างเฝ้าไข้มาประมาณ 2 ปี โดยได้ค่าจ้างเฉลี่ยครั้งละ 500- 800 บาท หลังเกิดเหตุได้กลับไปที่บ้าน ซึ่งอยู่ในซอยตรงข้ามวิทยาลัยเทคนิค ก่อนที่เจ้าหน้าที่ตำรวจจะไปควบคุมตัวมาได้', '2019-03-08 21:10:37', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vip_course`
--

CREATE TABLE `vip_course` (
  `course_id` int(11) NOT NULL,
  `course_member_id` varchar(6) NOT NULL,
  `course_tablecrod_id` varchar(11) NOT NULL,
  `course_starday` date NOT NULL,
  `course_endday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vip_course`
--

INSERT INTO `vip_course` (`course_id`, `course_member_id`, `course_tablecrod_id`, `course_starday`, `course_endday`) VALUES
(1, 'm001', 'course1', '2019-01-16', '2019-01-18'),
(2, 'm001', 'course2', '2019-01-02', '2019-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `vip_member`
--

CREATE TABLE `vip_member` (
  `member_id` int(6) NOT NULL,
  `member_username` varchar(20) NOT NULL,
  `member_password` varchar(20) NOT NULL,
  `member_firstname` varchar(100) NOT NULL,
  `member_lastname` varchar(100) NOT NULL,
  `member_sex` enum('male','female') NOT NULL,
  `member_birthday` date NOT NULL,
  `member_address` text NOT NULL,
  `member_tel` varchar(10) NOT NULL,
  `member_start` date NOT NULL,
  `member_expiry` date NOT NULL,
  `member_typemember` varchar(50) NOT NULL,
  `member_status` varchar(50) NOT NULL,
  `member_keeper` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vip_member`
--

INSERT INTO `vip_member` (`member_id`, `member_username`, `member_password`, `member_firstname`, `member_lastname`, `member_sex`, `member_birthday`, `member_address`, `member_tel`, `member_start`, `member_expiry`, `member_typemember`, `member_status`, `member_keeper`) VALUES
(1, 'admin', '123456', 'admin', 'admin', '', '0000-00-00', 'sad', '', '0000-00-00', '0000-00-00', '0', 'admin', ''),
(2, 'natta', '123456', 'fuu', 'moon', 'male', '2019-01-18', 'sad', '0213456789', '2019-01-18', '2019-01-19', 'สมาชิก ราย 3 เดือน', 'member', '6'),
(3, 'woranun', '123456', 'as', 'as', 'female', '2019-01-18', 'sad', '0213456789', '2019-01-18', '2019-01-19', '20', 'member', '6'),
(4, 'somsai', '123456', 'as', 'as', 'male', '2019-01-18', 'asd', '0213456789', '2019-01-18', '2019-01-19', '0', 'member', ''),
(5, 'sale', '123456', 'das', 'sad', 'female', '2019-01-08', 'sad', '0258147369', '0000-00-00', '0000-00-00', '0', 'trainer', ''),
(6, 'trainer', '123456', 'assa', 'asssss', 'male', '2017-04-20', 'asdasd', '0365412987', '0000-00-00', '0000-00-00', '0', 'trainer', ''),
(7, 'phenwipha', '123456', 'Lee', 'Mos', 'female', '2019-02-13', 'บ้านนอก หลังเขา', '0845466456', '2019-02-01', '2019-02-16', 'ราย 3 เดือน', 'หม้าย', 'พี่ต่อ');

-- --------------------------------------------------------

--
-- Table structure for table `vip_promotion`
--

CREATE TABLE `vip_promotion` (
  `promotion_id` int(10) NOT NULL,
  `promotion_name` varchar(100) NOT NULL,
  `promotion_image` text NOT NULL,
  `promotion_detail` text NOT NULL,
  `promotion_adddate` date NOT NULL,
  `promotion_sale_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vip_promotion`
--

INSERT INTO `vip_promotion` (`promotion_id`, `promotion_name`, `promotion_image`, `promotion_detail`, `promotion_adddate`, `promotion_sale_id`) VALUES
(12, 'โปรโมชั่น fdghdfgdf', '05032019131418-img_promotion.jpg', 'โปรโมชั่นสุดพิเศษ ghfghf', '2019-03-05', 0),
(13, 'โปรโมชั่น', '11022019144341-img_promotion.jpg', 'โปรโมชั่น', '2019-02-11', 0),
(14, 'ตารางคลาส', '11022019144425-img_promotion.jpg', 'คลาสแต่ละเดือร', '2019-02-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vip_satisfaction`
--

CREATE TABLE `vip_satisfaction` (
  `satisfaction_id` int(20) NOT NULL,
  `satisfaction_comment` varchar(100) NOT NULL,
  `satisfaction_trainer` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vip_tablecord`
--

CREATE TABLE `vip_tablecord` (
  `tablecourse_id` varchar(11) NOT NULL,
  `tablecourse_name` varchar(50) NOT NULL,
  `tablecourse_gran` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vip_tablecord`
--

INSERT INTO `vip_tablecord` (`tablecourse_id`, `tablecourse_name`, `tablecourse_gran`) VALUES
('course1', 'easy', 0),
('course2', 'normal', 5),
('course3', 'hard', 10),
('course4', 'expert', 20);

-- --------------------------------------------------------

--
-- Table structure for table `vip_tanita`
--

CREATE TABLE `vip_tanita` (
  `tanita_id` int(50) NOT NULL,
  `tanita_img` varchar(300) NOT NULL,
  `tanita_lesson` int(1) NOT NULL,
  `customer_id` int(6) NOT NULL,
  `member_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vip_tanita`
--

INSERT INTO `vip_tanita` (`tanita_id`, `tanita_img`, `tanita_lesson`, `customer_id`, `member_id`) VALUES
(10, '1702201917090817022019170908204082880.jpg', 1, 0, 3),
(11, '1702201917091417022019170914431129947.jpg', 1, 0, 2),
(12, '1702201917095417022019170954540308279.jpg', 2, 0, 3),
(13, '17022019171040170220191710401379834916.jpg', 1, 0, 4),
(14, '17022019231351170220192313511864989040.jpg', 2, 0, 2),
(15, '0603201916490006032019164900674214502.png', 0, 0, 2),
(16, '060320191650130603201916501350985044.jpg', 0, 0, 3),
(17, '1', 0, 0, 4),
(18, '06032019165227060320191652271085952316.png', 1, 0, 2),
(19, '0603201916523906032019165239477488634.png', 2, 0, 3),
(20, '06032019165313060320191653132102564353.jpg', 3, 0, 4),
(21, '060320191709580603201917095873673743.jpg', 1, 4, 0),
(22, '06032019171213060320191712131367368211.png', 1, 3, 2),
(23, '06032019173456060320191734561029763604.jpg', 2, 3, 0),
(24, '0603201917350206032019173502958534895.jpg', 3, 3, 0),
(25, '0603201917385306032019173853285244365.jpg', 1, 3, 0),
(26, '0603201917442006032019174420464898222.png', 2, 3, 0),
(27, '080320192316480803201923164862571199.png', 1, 2, 0),
(28, '0803201923165508032019231655289779402.png', 2, 2, 0),
(29, '0803201923170308032019231703900846496.png', 3, 2, 0),
(30, '08032019232501080320192325011060318678.png', 1, 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_answer`
--
ALTER TABLE `tb_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_person`
--
ALTER TABLE `tb_person`
  ADD PRIMARY KEY (`id_person`);

--
-- Indexes for table `tb_question`
--
ALTER TABLE `tb_question`
  ADD PRIMARY KEY (`id_question`);

--
-- Indexes for table `vip_comment`
--
ALTER TABLE `vip_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `vip_course`
--
ALTER TABLE `vip_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `vip_member`
--
ALTER TABLE `vip_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `vip_promotion`
--
ALTER TABLE `vip_promotion`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Indexes for table `vip_satisfaction`
--
ALTER TABLE `vip_satisfaction`
  ADD PRIMARY KEY (`satisfaction_id`);

--
-- Indexes for table `vip_tablecord`
--
ALTER TABLE `vip_tablecord`
  ADD PRIMARY KEY (`tablecourse_id`);

--
-- Indexes for table `vip_tanita`
--
ALTER TABLE `vip_tanita`
  ADD PRIMARY KEY (`tanita_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_answer`
--
ALTER TABLE `tb_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_person`
--
ALTER TABLE `tb_person`
  MODIFY `id_person` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_question`
--
ALTER TABLE `tb_question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `vip_comment`
--
ALTER TABLE `vip_comment`
  MODIFY `comment_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vip_course`
--
ALTER TABLE `vip_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vip_member`
--
ALTER TABLE `vip_member`
  MODIFY `member_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `vip_promotion`
--
ALTER TABLE `vip_promotion`
  MODIFY `promotion_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `vip_satisfaction`
--
ALTER TABLE `vip_satisfaction`
  MODIFY `satisfaction_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vip_tanita`
--
ALTER TABLE `vip_tanita`
  MODIFY `tanita_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
