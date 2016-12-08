-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2016 at 07:16 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `up_connect_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(3) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `middlename`, `lastname`, `password`) VALUES
('123', 'Admiiin', 'Pillow', 'Mucho', '9460370bb0ca1c98a779b1bcc6861c2c');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `teacher_id` varchar(5) NOT NULL,
  `section` int(6) NOT NULL,
  `course_id` int(11) NOT NULL,
  `sem_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `teacher_id`, `section`, `course_id`, `sem_id`) VALUES
(1, '12345', 1, 1, 1),
(2, '12345', 1, 2, 1),
(3, '12345', 1, 3, 1),
(4, '54321', 1, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `content`, `user_id`, `post_id`) VALUES
(1, 'Hello :)\r\n', '201437759', 39),
(2, 'Ang gwapo mo maynard\r\n', '12345', 39);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `course_description` text NOT NULL,
  `descriptive_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_description`, `descriptive_title`) VALUES
(1, 'CMSC 21', 'basf sadf sadf sd fdsf', 'Java'),
(2, 'CMSC 141', 'dfdsfsdasdf sadf safa sdfa sdf\n\n', 'Automata'),
(3, 'CMSC128', 'saf asf saf asf saf sdf', 'Software Engineering'),
(4, 'CMSC 11', 'this course teaches how to use the python', 'Introduction To Computer Computer Science'),
(5, 'CMSC 127', 'This course teachers asdf asfd asd fs fsdf f ', 'Database'),
(6, 'CMSC 22', 'This is com sci 22', 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `degree_id` int(11) NOT NULL,
  `degree_name` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`degree_id`, `degree_name`, `description`) VALUES
(1, 'BS in Computer Science', 'This cours asf asdf sadf SJFLD JFL DSAFL; SADFL;SJFLSJADLF SDF');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_class`
--

CREATE TABLE `enroll_class` (
  `student_id` varchar(9) NOT NULL,
  `class_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll_class`
--

INSERT INTO `enroll_class` (`student_id`, `class_id`) VALUES
('201345219', 1),
('201345219', 2),
('201412212', 1),
('201412212', 2),
('201416976', 1),
('201416976', 2),
('201416976', 3),
('201437759', 1),
('201437759', 2),
('201437759', 3),
('201439111', 1),
('201439111', 2),
('201439111', 3),
('201454987', 1),
('201454987', 2),
('201465234', 1),
('201465234', 2),
('201476584', 1),
('201476584', 2),
('201478213', 1),
('201478213', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notif_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id_posted` int(11) NOT NULL,
  `notif_type` int(2) NOT NULL,
  `time_stamp_notif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notif_id`, `post_id`, `user_id_posted`, `notif_type`, `time_stamp_notif`) VALUES
(1, 48, 201416976, 1, '2016-12-08 06:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `notified`
--

CREATE TABLE `notified` (
  `notif_id` int(11) NOT NULL,
  `user_id_notified` int(11) NOT NULL,
  `if_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notified`
--

INSERT INTO `notified` (`notif_id`, `user_id_notified`, `if_read`) VALUES
(45, 12345, 0),
(45, 201345219, 0),
(45, 201412212, 0),
(45, 201437759, 0),
(45, 201439111, 0),
(45, 201454987, 0),
(45, 201465234, 0),
(45, 201476584, 0),
(45, 201478213, 0),
(46, 12345, 0),
(46, 201345219, 0),
(46, 201412212, 0),
(46, 201437759, 0),
(46, 201439111, 0),
(46, 201454987, 0),
(46, 201465234, 0),
(46, 201476584, 0),
(46, 201478213, 0),
(47, 12345, 0),
(47, 201345219, 0),
(47, 201412212, 0),
(47, 201437759, 0),
(47, 201439111, 0),
(47, 201454987, 0),
(47, 201465234, 0),
(47, 201476584, 0),
(47, 201478213, 0),
(1, 12345, 0),
(1, 201345219, 0),
(1, 201412212, 0),
(1, 201437759, 0),
(1, 201439111, 0),
(1, 201454987, 0),
(1, 201465234, 0),
(1, 201476584, 0),
(1, 201478213, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `class_id` int(9) NOT NULL,
  `user_id` varchar(9) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` text NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `class_id`, `user_id`, `time_stamp`, `text`, `file_id`) VALUES
(36, 1, '201437759', '2016-12-08 02:36:29', 'First post. :D', 0),
(37, 1, '201437759', '2016-12-08 02:36:35', 'Second Post :D', 0),
(38, 1, '201437759', '2016-12-08 02:40:10', 'YEEEY :D', 1),
(39, 1, '201437759', '2016-12-08 02:41:26', 'Text-file.', 2),
(40, 2, '201437759', '2016-12-08 02:47:14', 'Yeeeey. :D\r\n', 0),
(41, 1, '12345', '2016-12-08 06:04:39', 'Hello guys. \r\n', 0),
(42, 1, '12345', '2016-12-08 06:04:47', 'Yehey guys. ', 0),
(43, 1, '201437759', '2016-12-08 06:05:59', 'Woooh\r\n', 0),
(44, 1, '201437759', '2016-12-08 06:06:04', 'Yeeeh. ', 0),
(45, 1, '201416976', '2016-12-08 06:11:48', 'Hello guys. ', 0),
(46, 1, '201416976', '2016-12-08 06:13:07', 'Hi', 0),
(47, 1, '201416976', '2016-12-08 06:13:51', 'asd', 0),
(48, 1, '201416976', '2016-12-08 06:15:58', 'Hello', 0);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(9) NOT NULL,
  `school_year` varchar(9) NOT NULL,
  `sem_no` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `school_year`, `sem_no`) VALUES
(1, '2015-2016', 1),
(2, '2015-2016', 2),
(3, '2016-2017', 1),
(4, '2016-2017', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(9) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `year_lvl` int(2) NOT NULL,
  `degree_id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `middlename`, `lastname`, `email`, `year_lvl`, `degree_id`, `password`) VALUES
('201345219', 'Kenny Rose', 'Pabello', 'De Luna', 'delunakennyrose@gmail.com', 4, 1, '9460370bb0ca1c98a779b1bcc6861c2c'),
('201412212', 'Clyde', 'Ambot', 'Delgado', 'clyde@yahoo.com', 3, 1, '41e2dd5f17c3524cb1f5abe851fa6c0d'),
('201416976', 'Rosiebelt Jun', 'Ayupan', 'Abisado', 'abisado@yahoo.com', 3, 1, '9460370bb0ca1c98a779b1bcc6861c2c'),
('201437759', 'Maynard', 'Fuentes', 'Vargas', 'vargas@gmail.com', 3, 1, '9460370bb0ca1c98a779b1bcc6861c2c'),
('201439111', 'Rosjel Jolly', 'Pamposa', 'Lambungan', 'lambunganrosjeljolly@gmail.com', 3, 1, '9460370bb0ca1c98a779b1bcc6861c2c'),
('201454987', 'Uno', 'Wong', 'Montgomery', 'montgomeryuno@gmail.com', 3, 1, '9460370bb0ca1c98a779b1bcc6861c2c'),
('201465234', 'Barbie', 'Go', 'Bautista', 'gobarbie@gmail.com', 3, 1, '9460370bb0ca1c98a779b1bcc6861c2c'),
('201476584', 'Tyron', 'Hernandez', 'Buenavista', 'buenavistatyron@gmail.com', 3, 2, '9460370bb0ca1c98a779b1bcc6861c2c'),
('201478213', 'Hope Esther', 'Regalado', 'Cargazon', 'cargazonhope@gmail.com', 3, 1, '9460370bb0ca1c98a779b1bcc6861c2c'),
('201521786', 'Azi', 'Lacana', 'Montefalco', 'azimontefalco@gmail.com', 3, 2, '9460370bb0ca1c98a779b1bcc6861c2c');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` varchar(5) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `firstname`, `middlename`, `lastname`, `password`, `email`) VALUES
('12345', 'Spark', 'Dragon', 'Comshop', '9460370bb0ca1c98a779b1bcc6861c2c', 'sparkzzzz@gmail.com'),
('54321', 'Another', 'Awesome', 'Teacher', '9460370bb0ca1c98a779b1bcc6861c2c', 'awesomeeeee@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`degree_id`);

--
-- Indexes for table `enroll_class`
--
ALTER TABLE `enroll_class`
  ADD PRIMARY KEY (`student_id`,`class_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `firstname` (`firstname`,`lastname`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `firstname` (`firstname`,`lastname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `degree_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
