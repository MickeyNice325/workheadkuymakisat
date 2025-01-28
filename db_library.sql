-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 03:32 AM
-- Server version: 10.1.39-MariaDB
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
-- Database: `db_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_book`
--

CREATE TABLE `tb_book` (
  `b_id` varchar(6) NOT NULL,
  `b_name` tinytext NOT NULL,
  `b_writer` tinytext,
  `b_category` int(2) NOT NULL,
  `b_price` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_book`
--

INSERT INTO `tb_book` (`b_id`, `b_name`, `b_writer`, `b_category`, `b_price`) VALUES
('B00001', 'คู่มือการสอบรับราชการ', 'สมศักดิ์ ตั้งใจ', 1, 299),
('B00002', 'แฮร์รี่ พอตเตอร์', 'J.K. Rowling', 2, 359),
('B00003', 'เย็บ ปัก ถัก ร้อย', 'สะอาด อิ่มสุข', 3, 249),
('B00004', 'เจ้าชายน้อย', 'อ็องตวน เดอ แซ็ง', 2, 355),
('B00005', 'การเขียนโปรแกรมคอมพิวเตอร์', 'กิ๊แก้ว กลิ่นหอม', 1, 329);

-- --------------------------------------------------------

--
-- Table structure for table `tb_borrow_book`
--

CREATE TABLE `tb_borrow_book` (
  `br_date_br` date NOT NULL,
  `br_date_rt` date NOT NULL,
  `b_id` varchar(6) NOT NULL,
  `m_user` varchar(40) NOT NULL,
  `br_fine` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_borrow_book`
--

INSERT INTO `tb_borrow_book` (`br_date_br`, `br_date_rt`, `b_id`, `m_user`, `br_fine`) VALUES
('2021-08-20', '2021-08-28', 'B00002', 'member03', 25),
('2021-08-21', '2021-08-22', 'B00001', 'member02', 0),
('2021-08-22', '2021-08-26', 'B00001', 'member02', 5),
('2021-08-23', '0000-00-00', 'B00003', 'member01', 0),
('2021-08-23', '0000-00-00', 'B00004', 'member05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `m_user` varchar(40) NOT NULL,
  `m_pass` tinytext NOT NULL,
  `m_name` tinytext NOT NULL,
  `m_phone` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`m_user`, `m_pass`, `m_name`, `m_phone`) VALUES
('member01', 'abc1111', 'สมหญิง จริงใจ', '0811111111'),
('member02', 'abc2222', 'สมชาย มั่นคง', '0822222222'),
('member03', 'abc3333', 'สมศักดิ์ เก่งกล้า', '0833333333'),
('member04', 'abc4444', 'สมสมร อิ่มเอม', '0844444444'),
('member05', 'abc5555', 'สมรักษ์ สะอาด', '0855555555'),
('member06', 'abc6666', 'ศักดิ์ระพี กันธยา', '0979623099');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_book`
--
ALTER TABLE `tb_book`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tb_borrow_book`
--
ALTER TABLE `tb_borrow_book`
  ADD PRIMARY KEY (`br_date_br`,`b_id`,`m_user`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `m_user` (`m_user`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`m_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_borrow_book`
--
ALTER TABLE `tb_borrow_book`
  ADD CONSTRAINT `tb_borrow_book_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `tb_book` (`b_id`),
  ADD CONSTRAINT `tb_borrow_book_ibfk_2` FOREIGN KEY (`m_user`) REFERENCES `tb_member` (`m_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
