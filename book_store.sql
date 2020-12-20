-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2020 at 06:45 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--
CREATE DATABASE IF NOT EXISTS `book_store` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `book_store`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ID` int(11) NOT NULL,
  `CoverPhoto` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Publishers` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `UploadedBy` varchar(255) NOT NULL,
  `eBookPath` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ID`, `CoverPhoto`, `Author`, `Publishers`, `Price`, `UploadedBy`, `eBookPath`, `Category`) VALUES
(1, 'assets/books/maths.jpg', 'ERWIN KREYSZIG', 'Institute of Electrical Electronics Engineers', '299.00', 'admin', 'assets/books/ADVANCED ENGINEERING MATHEMATICS BY ERWIN ERESZIG1.pdf', 'b_tech'),
(2, 'assets/books/c.jpeg', 'Yashavant P. Kanetkar', 'Unknown', '199.00', 'admin', 'assets/books/letusc-yashwantkanetkar.pdf', 'b_tech'),
(3, 'assets/books/python.jpg', 'Goal Kicker', 'Goal Kicker PubCo', '110.00', 'admin', 'assets/books/PythonNotesForProfessionals.pdf', 'b_tech'),
(4, 'assets/books/css.png', 'David Powers', 'Kelly Moritz', '149.00', 'admin', 'assets/books/css.pdf', 'b_tech'),
(5, 'assets/books/r_s_agarwal.jpg', 'R.S.AGGARWAL', 'P.N.B.', '111.00', 'admin', 'assets/books/RS AGGARWAL QUANTITATIVE APTITUDE NEW.pdf', 'aptitude'),
(6, 'assets/books/ssc.jpg', 'Kiran', 'Kiran Institute of Career Excellence', '799.00', 'admin', 'assets/books/maintenance.png', 'aptitude'),
(7, 'assets/books/fast_track.jpg', 'Rajesh Verma', 'Arihant Publications', '499.00', 'admin', 'assets/books/maintenance.png', 'aptitude'),
(8, 'assets/books/chand.jpg', 'S.Chand', 'S.Chand Publishers', '825.00', 'admin', 'assets/books/chand.pdf', 'aptitude'),
(9, 'assets/books/maths_quiz.jpg', 'Ragiv Garg', 'Pustak Mahal', '363.00', 'admin', 'assets/books/maths_quiz.pdf', 'gk'),
(10, 'assets/books/quiz_child.jpg', 'Ravensburger', 'J.A.B.N.F', '349.00', 'admin', 'assets/books/quiz_child.pdf', 'gk'),
(11, 'assets/books/quiz.jpg', 'Capella', 'Arcturus Publishing Limited', '349.00', 'admin', 'assets/books/quiz.pdf', 'gk'),
(12, 'assets/books/soap.jpg', 'Mark Bennison', 'Tom Watt', '777.00', 'admin', 'assets/books/soap.pdf', 'gk'),
(13, 'assets/books/dhoni.webp', 'Ezekiel Gulu', 'MSD Publications', '183.00', 'admin', 'assets/books/dhoni.pdf', 'great_personalities'),
(14, 'assets/books/ramanujan.jpg', 'Dr.Sridhar Seshadri', 'Research Gate', '179.00', 'admin', 'assets/books/ramanujan.pdf', 'great_personalities'),
(15, 'assets/books/albert_einstein.jpg', 'john archibald wheeler', 'National Academy of Sciences', '299.00', 'admin', 'assets/books/albert_einstein.pdf', 'great_personalities'),
(16, 'assets/books/mandela.jpeg', 'Stengel', 'Notablebiographies', '143.00', 'admin', 'assets/books/mandela.pdf', 'great_personalities'),
(17, 'assets/books/The Everlasting Leader.jpg', 'Raghuram Ananthoj', 'Leading Self Publishers, Hyderabad', '255.00', 'admin', 'assets/books/The Everlasting Leader.pdf', 'human_values'),
(18, 'assets/books/MR_WH.jpg', 'Oscar Wilde', 'Free editorial', '110.00', 'admin', 'assets/books/the_portrait_of_mr._w._h_.pdf', 'human_values'),
(19, 'assets/books/harry_potter.jpg', 'J.K. ROWLING', 'Bloomsbury Publishing', '299.00', 'admin', 'assets/books/harry-potter-book-1.pdf', 'human_values'),
(20, 'assets/books/ethics and human values.jpg', 'R.S.Naagarazan', 'New Age International Publishers', '149.00', 'admin', 'assets/books/Professional Ethics and Human Values by R.S NAAGARAZAN- Hack My Kaam.pdf', 'human_values'),
(21, 'assets/books/laravel.svg', 'Laravel ', 'Laravel', '0', 'admin', 'assets/books/Laravel-Cheat-Sheet.pdf', 'b_tech');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(100) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `PhoneNumber` bigint(15) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` varchar(255) NOT NULL,
  `Languages` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `AuthToken` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Email`, `Password`, `PhoneNumber`, `Gender`, `DOB`, `Languages`, `Address`, `AuthToken`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1234567890, 'Male', '2000-07-07', 'Telugu,English', ' admin,admin,admin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
