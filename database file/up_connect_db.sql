-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2016 at 12:19 PM
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
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `course_description` text NOT NULL,
  `desciptive_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_description`, `desciptive_title`) VALUES
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
  `desciption` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`degree_id`, `degree_name`, `desciption`) VALUES
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
('201416976', 1),
('201416976', 2),
('201416976', 3),
('201437759', 1),
('201437759', 2),
('201437759', 3);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `class_id` int(9) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` text NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `class_id`, `user_id`, `time_stamp`, `text`, `file_id`) VALUES
(1, 1, 201437759, '2016-12-05 07:22:45', 'Hello. First post in UP Connect!', 2),
(2, 1, 201437759, '2016-12-05 04:51:07', '2nd post', 0),
(3, 2, 201437759, '2016-12-05 04:51:10', '3rd post', 0),
(4, 2, 201437759, '2016-12-05 20:58:47', 'TESTADADADADas', 0),
(11, 1, 201437759, '2016-12-05 21:08:21', 'asdasdas', 0),
(12, 1, 201437759, '2016-12-05 21:08:34', 'Dragon dragon\r\n', 0),
(13, 1, 201437759, '2016-12-05 21:09:58', 'Hello\r\nasdasd', 0),
(14, 2, 201437759, '2016-12-05 21:13:43', 'asdasd', 0),
(15, 2, 201437759, '2016-12-05 21:13:50', 'Tada!\r\n', 0),
(16, 2, 201437759, '2016-12-05 21:14:23', 'asd', 0),
(17, 2, 201437759, '2016-12-05 21:26:28', 'asd', 0),
(18, 2, 201437759, '2016-12-06 06:52:03', 'asdasd', 0),
(19, 2, 201437759, '2016-12-06 06:52:04', '', 0),
(20, 2, 201437759, '2016-12-06 06:52:05', '', 0),
(21, 1, 201437759, '2016-12-07 02:09:45', 'Hello. ', 0),
(22, 1, 201437759, '2016-12-07 08:28:49', 'asdasdas', 0),
(23, 1, 201437759, '2016-12-07 08:28:59', 'aaaaaaaaaaaaaaa', 0),
(24, 1, 201437759, '2016-12-07 08:29:59', '', 0),
(25, 1, 201437759, '2016-12-07 08:30:21', 'asdasdasdsad', 0),
(26, 1, 201437759, '2016-12-07 08:31:18', 'asd', 0),
(27, 1, 201437759, '2016-12-07 08:31:31', 'asdasd', 0),
(28, 1, 201437759, '2016-12-07 08:32:17', 'asd', 0),
(29, 1, 201437759, '2016-12-07 08:42:43', 'asd', 0),
(30, 1, 201437759, '2016-12-07 08:43:53', 'asdasd', 1),
(31, 1, 201437759, '2016-12-07 08:44:06', 'asdasdasdasd', 0),
(32, 1, 201437759, '2016-12-07 08:45:42', 'asdasd', 0),
(33, 1, 201437759, '2016-12-07 08:45:48', 'asd', 1),
(34, 1, 201437759, '2016-12-07 08:50:02', 'asd', 0),
(35, 1, 201437759, '2016-12-07 08:50:05', '', 0),
(36, 1, 201437759, '2016-12-07 08:50:06', '', 0),
(37, 1, 201437759, '2016-12-07 08:50:07', '', 0),
(38, 1, 201437759, '2016-12-07 08:50:08', '', 0),
(39, 1, 201437759, '2016-12-07 08:50:08', '', 0),
(40, 1, 201437759, '2016-12-07 08:50:08', '', 0),
(41, 1, 201437759, '2016-12-07 08:50:09', '', 0),
(42, 1, 201437759, '2016-12-07 08:50:09', '', 0),
(43, 1, 201437759, '2016-12-07 08:50:09', '', 0),
(44, 1, 201437759, '2016-12-07 08:50:09', '', 0),
(45, 1, 201437759, '2016-12-07 08:50:11', 'aaaaaaaa', 0),
(46, 1, 201437759, '2016-12-07 08:54:25', 'aaaa', 0),
(47, 1, 201437759, '2016-12-07 08:54:32', 'asd', 0),
(48, 1, 201437759, '2016-12-07 08:54:51', 'asd', 1),
(49, 1, 201437759, '2016-12-07 08:55:15', 'asd', 1),
(50, 1, 201437759, '2016-12-07 08:55:30', 'as', 0),
(51, 1, 201437759, '2016-12-07 08:56:40', 'asdas', 1),
(52, 1, 201437759, '2016-12-07 08:56:45', 'asdassdsa', 1),
(53, 1, 201437759, '2016-12-07 08:57:54', 'asd', 0),
(54, 1, 201437759, '2016-12-07 08:59:07', 'asdasd', 0),
(55, 1, 201437759, '2016-12-07 09:21:02', '', 0),
(56, 1, 201437759, '2016-12-07 09:22:00', 'asdas', 0),
(57, 1, 201437759, '2016-12-07 09:32:18', 'asdas', 1),
(58, 1, 201437759, '2016-12-07 09:39:29', 'asdas', 1),
(59, 1, 201437759, '2016-12-07 09:44:56', 'asda', 1),
(60, 1, 201437759, '2016-12-07 10:26:14', 'asdas', 0),
(61, 1, 201437759, '2016-12-07 10:26:22', 'asdasasda', 0);

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
('201412212', 'Clyde', 'Ambot', 'Delgado', 'clyde@yahoo.com', 3, 1, '41e2dd5f17c3524cb1f5abe851fa6c0d'),
('201416976', 'Rosiebelt Jun', 'Ayupan', 'Abisado', 'abisado@yahoo.com', 3, 1, '9460370bb0ca1c98a779b1bcc6861c2c'),
('201437759', 'Maynard', 'Fuentes', 'Vargas', 'vargas@gmail.com', 3, 1, '9460370bb0ca1c98a779b1bcc6861c2c');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` varchar(5) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `firstname`, `middlename`, `lastname`, `password`) VALUES
('12345', 'Spark', 'Dragon', 'Comshop', '9460370bb0ca1c98a779b1bcc6861c2c'),
('54321', 'Another', 'Awesome', 'Teacher', '9460370bb0ca1c98a779b1bcc6861c2c');

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
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
