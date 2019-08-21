-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2019 at 09:19 PM
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
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `AppId` int(11) NOT NULL COMMENT 'Id for Application in Database',
  `CompanyName` varchar(255) NOT NULL COMMENT 'The Company to be applied to and to decide on hiring the candidate',
  `InternId` int(11) NOT NULL COMMENT 'Id of Applicant',
  `JobId` int(11) NOT NULL COMMENT 'Id of Job',
  `StudentName` varchar(255) NOT NULL COMMENT 'The Student applying for the Job',
  `InternApplication` longblob NOT NULL COMMENT 'The form the Intern filled out to apply',
  `Permission` enum('Yes','No') NOT NULL COMMENT 'Permission to View Intern Account Info'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stores Applications pending (not denied or accepted)';

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
(1, 'James Dean', 'Dean@student.framingham.edu', 'JDean', 'eaglerock32', 'Framingham State University', 0x686f6f706361742e676966, 'Liberal Arts', '3.40', 'Sudbury', 'Massachusetts', '234-332-1221', 0x4166726963616e5265776f726b732e727466, 'Reworking African civs'),
(2, 'Alex Jones', 'AJ@student.framingham.edu', 'Ajones', 'jones123', 'Framingham State University', 0x506973746f6c65726f2e706e67, 'Wildlife Biology', '2.90', 'Wilmington', 'Massachusetts', '508-425-9302', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `internstasks`
--

CREATE TABLE `internstasks` (
  `TaskId` int(11) NOT NULL COMMENT 'Id of Task for Intern',
  `InternName` varchar(255) NOT NULL COMMENT 'Intern working on the Task',
  `JobName` varchar(255) NOT NULL COMMENT 'Task the Intern is Working on',
  `JobId` int(11) NOT NULL COMMENT 'Id of Job',
  `InternId` int(11) NOT NULL COMMENT 'Id of Intern',
  `Status` enum('Accepted/Current','Denied','Pending','Past') NOT NULL COMMENT 'Status of Job in Intern''s list of tasks (currently being done, past done, or pending/denied.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tasks a Student is Working on';

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `JobId` int(11) NOT NULL COMMENT 'Job Id',
  `JobName` varchar(255) NOT NULL COMMENT 'Name of Task',
  `JobDesc` text NOT NULL COMMENT 'Description of Task',
  `CompanyName` varchar(255) NOT NULL COMMENT 'Company the Task is needed for',
  `JobType` text NOT NULL COMMENT 'Category/Field Study pertaining to',
  `InternsNeeded` int(11) NOT NULL COMMENT 'Number of Interns the Contact needs to do the task',
  `JobRequirements` text NOT NULL COMMENT 'requirements/skills/experience intern will need to do the task correctly'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Listing of All Tasks needed for Members';

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`JobId`, `JobName`, `JobDesc`, `CompanyName`, `JobType`, `InternsNeeded`, `JobRequirements`) VALUES
(3, 'Help Me', 'Seriously, Help me Dammit.', 'Entemanns', '', 7, 'Help Me, stop reading this txt and help me now!');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `MatchId` int(11) NOT NULL COMMENT 'Identifier for this Company/Keyword Match',
  `CompanyName` varchar(255) NOT NULL COMMENT 'Company''s Name',
  `Keyword` varchar(255) NOT NULL COMMENT 'Keyword from Input'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`MatchId`, `CompanyName`, `Keyword`) VALUES
(10, 'Entreprenuership Innovation Center', 'Communications'),
(11, 'Entreprenuership Innovation Center', 'Computer Science'),
(12, 'Entreprenuership Innovation Center', 'Programming'),
(13, 'Entreprenuership Innovation Center', 'Web Development'),
(14, 'Entreprenuership Innovation Center', 'Entrepreneurship'),
(15, 'Entreprenuership Innovation Center', 'Entrepreneur'),
(16, 'Entreprenuership Innovation Center', 'Nutrition'),
(17, 'Entreprenuership Innovation Center', 'FSU'),
(18, 'Entreprenuership Innovation Center', 'Start-Up'),
(19, 'CompStomp', 'Computer Science'),
(20, 'CompStomp', 'Programming'),
(21, 'CompStomp', 'IT'),
(22, 'CompStomp', 'Technology'),
(23, 'CompStomp', 'Internship'),
(24, 'CompStomp', 'Intern'),
(25, 'CompStomp', 'Innovation'),
(26, 'CompStomp', 'Software'),
(27, 'CompStomp', 'QA'),
(28, 'CompStomp', 'FSU'),
(29, 'CompStomp', 'Web'),
(30, 'Entemanns', 'FSU'),
(31, 'Entemanns', 'Technology'),
(32, 'Entemanns', 'Web'),
(33, 'Entemanns', 'Food'),
(34, 'Entemanns', 'Food Science'),
(35, 'Entemanns', 'Intern'),
(36, 'Entemanns', 'Baking'),
(37, 'Entemanns', 'Cooking'),
(38, 'In Good Company', 'FSU'),
(39, 'In Good Company', 'Web'),
(40, 'In Good Company', 'Computer Science'),
(41, 'In Good Company', 'IT'),
(42, 'In Good Company', 'Communications'),
(43, 'In Good Company', 'Social Media'),
(44, 'In Good Company', 'Technology'),
(45, 'In Good Company', 'Psychology'),
(46, 'In Good Company', 'Internship');

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
(6, 'Mark Hardie', 'Entreprenuership Innovation Center', 'mhardie@framingham.edu', 'Mark123', 'h121', 'Framingham', 'Massachusetts', '508-215-5921', 0x6d61726b2d6861726469652d6865616473686f742e6a7067, 'Co-Working Space * Internship Program * Start-up Incubator'),
(7, 'Jon Petni', 'CompStomp', 'cpa@mailboxes.com', 'csjp', '1234321', 'Natick', 'Massachusetts', '595-443-2212', 0x436f726f6e656c49636f6e2e504e47, 'We code and do IT work. We innovate software to make it more efficient towards our clients.'),
(8, 'Ed Edwardson', 'Entemanns', 'EEdwards@mail.com', 'EdEd', 'ed124', 'Seabrook', 'New Hampshire', '594-332-4343', 0x5665726d6f6e74666c61672e706e67, 'We bake cakes and cookies. We take pride in making people happy at the cost of their health. We teach students how to make sugary treats that are so good they are to die for literally from coronary heart disease.'),
(9, 'Collard Sansik', 'Company Compensation', 'fwre43rw3@mail.com', '3wrw4frref', '344433', 'Norfolk', 'Boston', '494-332-2234', 0x31373070782d50726f645061636b2d48616d6275726765722d48656c7065722d4368656573654d61632d536d616c6c2e6a7067, 'A Company'),
(10, 'Fred Leiberman', 'In Good Company', 'FLeiber@mail.com', 'Companyman', 'iuhwf3rw3huir3hui', 'Brattleboro', 'Vermont', '394-233-2343', 0x776f6c6c2e6a7067, 'We are developing a social media app that makes sure people are always in good company even without any friends.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`AppId`);

--
-- Indexes for table `intern`
--
ALTER TABLE `intern`
  ADD PRIMARY KEY (`InternId`);

--
-- Indexes for table `internstasks`
--
ALTER TABLE `internstasks`
  ADD PRIMARY KEY (`TaskId`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`JobId`);

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
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `AppId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id for Application in Database';

--
-- AUTO_INCREMENT for table `intern`
--
ALTER TABLE `intern`
  MODIFY `InternId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id for each entry', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `internstasks`
--
ALTER TABLE `internstasks`
  MODIFY `TaskId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id of Task for Intern';

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `JobId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Job Id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `MatchId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifier for this Company/Keyword Match', AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `MemberId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id for each entry', AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
