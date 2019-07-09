-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2019 at 10:25 PM
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
-- Database: `internsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `intern`
--

CREATE TABLE `intern` (
  `InternId` int(11) NOT NULL COMMENT 'Id for each entry',
  `InternName` varchar(255) NOT NULL COMMENT 'Intern''s full name',
  `EmailAddress` varchar(255) NOT NULL COMMENT 'Intern''s Email Address',
  `Username` varchar(255) NOT NULL COMMENT 'UserName for Student Intern account',
  `Password` varchar(255) NOT NULL COMMENT 'Password for Student Intern account',
  `School` varchar(255) NOT NULL COMMENT 'College/University attending',
  `InternPhoto` longblob NOT NULL COMMENT 'Image of Intern',
  `Major` varchar(255) NOT NULL COMMENT 'Intern''s field of study',
  `GPA` decimal(3,2) DEFAULT NULL COMMENT 'Grade Point Average of Intern',
  `City` varchar(255) NOT NULL COMMENT 'Community the Intern comes from',
  `State` varchar(255) NOT NULL COMMENT 'State the Intern comes from',
  `PhoneNumber` varchar(20) DEFAULT NULL COMMENT 'Intern''s phone number',
  `Resume` longblob COMMENT 'Intern''s Resume',
  `SkillsAndExperience` longtext COMMENT 'Past Jobs/Skills that Intern has'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table is for applying interns.';

--
-- Dumping data for table `intern`
--

INSERT INTO `intern` (`InternId`, `InternName`, `EmailAddress`, `Username`, `Password`, `School`, `InternPhoto`, `Major`, `GPA`, `City`, `State`, `PhoneNumber`, `Resume`, `SkillsAndExperience`) VALUES
(1, 'James Dean', 'Dean@student.framingham.edu', 'JDean', 'eaglerock32', 'Framingham State University', 0x686f6f706361742e676966, 'Liberal Arts', '3.40', 'Sudbury', 'Massachusetts', '234-332-1221', 0x4166726963616e5265776f726b732e727466, 'Reworking African civs');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `MatchId` int(11) NOT NULL COMMENT 'Identifier for this Company/Keyword Match',
  `CompanyName` varchar(255) NOT NULL COMMENT 'Company''s Name',
  `Keyword` varchar(255) NOT NULL COMMENT 'Keyword from Input'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `MemberId` int(11) NOT NULL COMMENT 'Id for each entry',
  `ContactName` varchar(255) NOT NULL COMMENT 'Contact''s full name',
  `CompanyName` varchar(255) NOT NULL COMMENT 'Company Name',
  `ContactEmail` varchar(255) NOT NULL COMMENT 'Contact Email',
  `Username` varchar(255) NOT NULL COMMENT 'UserName for Company Contact account',
  `Password` varchar(255) NOT NULL COMMENT 'Password for Company Contact account',
  `CompanyCity` varchar(255) NOT NULL COMMENT 'Company City',
  `CompanyState` varchar(255) NOT NULL COMMENT 'Company State',
  `PhoneNumber` varchar(20) DEFAULT NULL COMMENT 'Contact Phone Number',
  `CompanyPicture` longblob NOT NULL COMMENT 'Company Photo/Logo',
  `CompanyDescription` longtext NOT NULL COMMENT 'Company Description'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MemberId`, `ContactName`, `CompanyName`, `ContactEmail`, `Username`, `Password`, `CompanyCity`, `CompanyState`, `PhoneNumber`, `CompanyPicture`, `CompanyDescription`) VALUES
(1, 'Mark Marty', 'FSU', 'FSU@FSU.org', 'MarkyMark', 'm123', 'Framingham', 'Massachusetts', '234-344-5554', 0x436f726f6e656c49636f6e2e504e47, 'We are a school of sorts.'),
(2, 'Mark Hardie', 'Entreprenuership Innovation Center', 'mhardie@framingham.edu', 'mark2', 'hardieharhar', 'Framingham', 'Massachusetts', '508-432-1212', 0x6d61726b2d6861726469652d6865616473686f742e6a7067, 'Co-Working Space * Internship Program * Start-up Incubator'),
(3, 'Simone McHugh', 'FSU Innovation Center', 'smchugh@student.framingham.edu', 'SMcHugh', 'newpassword1', 'Framingham', 'Massachusetts', '504-332-1223', 0x436f726f6e656c49636f6e2e504e47, 'We innovate new solutions to existing problems for companies. We make databases for a living as well.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `intern`
--
ALTER TABLE `intern`
  ADD PRIMARY KEY (`InternId`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`MatchId`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MemberId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `intern`
--
ALTER TABLE `intern`
  MODIFY `InternId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id for each entry', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `MatchId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifier for this Company/Keyword Match';

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `MemberId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id for each entry', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
