-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2019 at 02:55 PM
-- Server version: 5.7.17-log
-- PHP Version: 7.1.1

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
(32, 10, 8, 4),
(31, 10, 7, 4),
(30, 10, 6, 5),
(29, 10, 5, 4),
(28, 10, 4, 4),
(27, 10, 3, 3),
(26, 10, 2, 3),
(25, 10, 1, 4),
(24, 8, 8, 3),
(23, 8, 7, 3),
(22, 8, 6, 3),
(21, 8, 5, 3),
(20, 8, 4, 3),
(19, 8, 3, 3),
(18, 8, 2, 3),
(17, 8, 1, 3),
(33, 9, 1, 5),
(34, 9, 2, 5),
(35, 9, 3, 5),
(36, 9, 4, 5),
(37, 9, 5, 5),
(38, 9, 6, 5),
(39, 9, 7, 5),
(40, 9, 8, 5),
(41, 15, 1, 5),
(42, 15, 2, 5),
(43, 15, 3, 5),
(44, 15, 4, 5),
(45, 15, 5, 5),
(46, 15, 6, 5),
(47, 15, 7, 5),
(48, 15, 8, 5);

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
(1, '1. ความสะดวกในการใช้สถานที่ '),
(2, '2. ความสะอาดในสถานที่'),
(3, '3. ความปลอดภัยของอุปกรณ์ต่างๆ'),
(4, '4. เทรนเนอร์มีการแต่งกายเรียบร้อยและมีความน่าเชื่อถือ'),
(5, '5. เทรนเนอร์มีบุคลิกภาพและรูปร่างที่ดี'),
(6, '6. เทรนเนอร์พูดจาสุภาพเรียบร้อย'),
(7, '7. เทรนเนอร์มีความรู้ ความเชี่ยวชาญและความเข้าใจในการด้านการออกกำลังกายอย่างถูกต้อง'),
(8, '8. เทรนเนอร์ให้คำแนะนำสำหรับสมาชิกที่เริ่มต้นออกกำลังกายทุกโปรแกรม เพื่อให้เข้าใจหลักในการออกกำลังกายมากขึ้น');

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
(3, 'I Love Fitness', '2019-03-10 14:40:59', 8),
(4, 'ไม่ผิดหวังที่เลือก vip fitness', '2019-03-10 15:03:48', 10),
(5, 'ดีทุกอย่าง', '2019-03-11 01:07:38', 9),
(6, 'ดีมาก', '2019-03-11 04:04:37', 15);

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
(1, 'admin', '123456', 'admin', 'admin', '', '1990-02-14', 'sad', '', '0000-00-00', '0000-00-00', '0', 'admin', ''),
(4, 'Dong', '123456', 'วัฒนา', 'สุขเสนา', 'male', '1989-03-14', 'fasXAsa', '088898889', '0000-00-00', '0000-00-00', '', 'trainer', ''),
(5, 'BB', '123456', 'สมภพ', 'ถือผล', 'male', '1990-01-08', 'sad', '0258147369', '0000-00-00', '0000-00-00', '0', 'trainer', ''),
(6, 'Plam', '123456', 'นพนันท์', 'จิตจักร', 'male', '1990-04-20', 'asdasd', '0365412987', '0000-00-00', '0000-00-00', '0', 'trainer', ''),
(8, 'tan', '123456', 'ชลินยา', 'บรรณจงส์', 'female', '1997-05-29', 'fsgsdfbsr', '084-454664', '2019-03-01', '2019-06-01', 'สมาชิกราย 3 เดือน', 'member', '5'),
(9, 'fu', 'fuu', 'จุฑากาญจน์', 'ศักด์อนุทัย', 'female', '1996-11-08', '339 ต.จอหอ อ.เมือง จ.นครราชสีมา 30310', '085-768632', '2019-03-01', '2019-06-01', 'สมาชิกราย 3 เดือน', 'member', '5'),
(10, 'siwakorn', '123456', 'ศิวกร', 'ตรีกูล', 'male', '1998-06-04', 'บุรีรัมย์', '095-612325', '2019-04-09', '2020-04-09', 'สมาชิก ราย 1 ปี', 'member', '4'),
(11, 'Got', '123456', 'ธีรพันธ์', 'กานขุนทด', 'male', '1990-03-09', 'FSFFDdewFF', '09989898', '0000-00-00', '0000-00-00', '', 'trainer', ''),
(12, 'Fluk', '123456', 'จุตินันท์', 'สินประเสริฐ', 'female', '1988-05-14', 'หดฟหหฟหฟ', '0898876545', '0000-00-00', '0000-00-00', '', 'trainer', ''),
(13, 'Tar Tar', '123456', 'วัฒนพงษ์', 'มาลาน', 'male', '1989-11-24', 'dtjjkok\'lm,l;mlk', '089-876656', '2019-02-14', '2019-03-14', 'สมาชิก ราย 1 เดือน', 'member', '12'),
(14, 'Fies', '123456', 'รัชสิริ', 'นันตา', 'male', '1997-07-08', 'deasftuyuioertyhujikrtrtuityjiko', '0899876543', '2019-03-10', '2019-04-10', 'สมาชิก ราย 3 เดือน', 'member', '11'),
(15, 'leemos', '123456', 'สมใจ', 'สำราญ', 'male', '1990-04-05', 'จอหอ', '0898875643', '2019-03-11', '2020-03-11', 'สมาชิกราย 1 ปี', 'member', '5');

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
(13, 'โปรโมชั่น', '11032019093441-img_promotion.jpg', 'โปรโมชั่น บัตรคลัง', '2019-03-11', 0),
(16, 'โปรโมชั่น', '11032019093517-img_promotion.jpg', 'โปรโมชั่น', '2019-03-11', 0),
(17, 'โปรโมชั่น', '11032019105714-img_promotion.jpg', '', '2019-03-11', 0);

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
  `tanita_comment` text NOT NULL,
  `member_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vip_tanita`
--

INSERT INTO `vip_tanita` (`tanita_id`, `tanita_img`, `tanita_lesson`, `customer_id`, `tanita_comment`, `member_id`) VALUES
(44, '1103201909183811032019091838102660830.jpg', 1, 9, '', 5),
(45, '11032019092800110320190928001405761333.jpg', 2, 9, 'ครั้งที่ 2 ผลการเปลี่ยนแปลง\nดัชนีมวลร่างกาย\nน้ำหนัก  55 kg,\nสูงส่วน  175 cm.\nมวลกล้ามเนื้อเพิ่มขึ้นจากครั้งแรก', 5),
(49, '1103201909314311032019093143108443828.jpg', 3, 9, 'ครั้งที่ 3 ผลการเปลี่ยนแปลง\r\nดัชนีมวลร่างกาย\r\nกล้ามเนื้อเพิ่มขึ้น\r\nมวลไขมันลดลง', 5),
(50, '1103201911012111032019110121386849304.jpg', 1, 15, '', 5),
(51, '1103201911033311032019110333158264616.jpg', 2, 15, 'กล้ามเนื้อเพิ่ม', 5);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
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
  MODIFY `comment_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `vip_course`
--
ALTER TABLE `vip_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vip_member`
--
ALTER TABLE `vip_member`
  MODIFY `member_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `vip_promotion`
--
ALTER TABLE `vip_promotion`
  MODIFY `promotion_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `vip_satisfaction`
--
ALTER TABLE `vip_satisfaction`
  MODIFY `satisfaction_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vip_tanita`
--
ALTER TABLE `vip_tanita`
  MODIFY `tanita_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
