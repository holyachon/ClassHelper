-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 호스트: localhost
-- 처리한 시간: 15-06-16 15:27
-- 서버 버전: 10.0.18-MariaDB-1~trusty-log
-- PHP 버전: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 데이터베이스: `ClassHelper`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `studentList`
--

CREATE TABLE IF NOT EXISTS `studentList` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `classId` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `stdNo` int(11) NOT NULL,
  `stdName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `seatNo` int(11) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=80 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
