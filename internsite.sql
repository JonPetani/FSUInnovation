-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2019 at 09:51 PM
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
  `Permission` tinyint(1) NOT NULL COMMENT 'Permission to View Intern Account Info'
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
  `InternPhoto` text NOT NULL COMMENT 'Image of Intern',
  `Major` varchar(255) NOT NULL COMMENT 'Intern''s field of study',
  `GPA` decimal(3,2) DEFAULT NULL COMMENT 'Grade Point Average of Intern',
  `City` varchar(255) NOT NULL COMMENT 'Community the Intern comes from',
  `State` varchar(255) NOT NULL COMMENT 'State the Intern comes from',
  `PhoneNumber` varchar(20) DEFAULT NULL COMMENT 'Intern''s phone number',
  `Resume` longblob COMMENT 'Intern''s Resume',
  `SkillsAndExperience` longtext COMMENT 'Past Jobs/Skills that Intern has',
  `AccountVerified` tinyint(1) NOT NULL COMMENT 'Determines if user has reviewed and replied to verification email at registration time.',
  `AccessCode` varchar(13) DEFAULT NULL COMMENT 'Code that only exists when account reset is needed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table is for applying interns.';

--
-- Dumping data for table `intern`
--

INSERT INTO `intern` (`InternId`, `InternName`, `EmailAddress`, `Username`, `Password`, `School`, `InternPhoto`, `Major`, `GPA`, `City`, `State`, `PhoneNumber`, `Resume`, `SkillsAndExperience`, `AccountVerified`, `AccessCode`) VALUES
(3, 'Yoda', 'jpetani@student.framingham.edu', 'KrishnaMorty', 'jdkdjfkdfjkdfjk', 'FSU', 'https://i.ibb.co/23cd1DP/759e5aa1b827.png', 'Networking', '1.20', 'Shrewsbury', 'Ma', '456-778-5675', '', 'vjsd;gjasdlgjdlgjlo', 1, NULL);

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
-- Table structure for table `jobmemberlist`
--

CREATE TABLE `jobmemberlist` (
  `ProjectId` int(11) NOT NULL COMMENT 'Id of Project',
  `JobId` int(11) NOT NULL COMMENT 'Id of Job in Database',
  `JobName` varchar(255) NOT NULL COMMENT 'Name of Project',
  `JobDesc` longtext NOT NULL COMMENT 'Description of Project',
  `InternName` varchar(255) NOT NULL COMMENT 'Name of Intern Working on Task',
  `InternRole` varchar(255) DEFAULT NULL COMMENT 'Specific Role you assigned Intern to (optional)',
  `InternId` int(11) NOT NULL COMMENT 'Id of Intern'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='List Of Interns Assigned to Specific Projects';

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
  `TimeNeeded` int(6) NOT NULL COMMENT 'Number of Weeks you need a Intern(s) for',
  `JobRequirements` text NOT NULL COMMENT 'requirements/skills/experience intern will need to do the task correctly',
  `InternLimit` int(11) DEFAULT '1' COMMENT 'Linit of Intern Sign Ups (Is 1 Intern with some Exceptions)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Listing of All Tasks needed for Members';

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
(47, 'Team Solar', 'solar'),
(48, 'Team Solar', 'Solar'),
(49, 'Team Solar', 'Power'),
(50, 'Team Solar', 'Electricity'),
(51, 'Team Solar', 'Energy'),
(52, 'Team Solar', 'energy'),
(53, 'Team Solar', 'environment'),
(54, 'Northbridge House of Pizza', 'Food'),
(55, 'Northbridge House of Pizza', 'Pizza'),
(56, 'Northbridge House of Pizza', 'food'),
(57, 'Northbridge House of Pizza', 'Cooking'),
(58, 'Northbridge House of Pizza', 'Culinary'),
(59, 'Northbridge House of Pizza', 'Service'),
(60, 'Northbridge House of Pizza', 'Business'),
(61, 'Northbridge House of Pizza', 'Marketing'),
(62, 'Northbridge House of Pizza', 'Advertising');

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
  `CompanyPicture` text NOT NULL COMMENT 'Company Photo/Logo',
  `CompanyDescription` longtext NOT NULL COMMENT 'Company Description',
  `AccountVerified` tinyint(1) NOT NULL COMMENT 'Determines if user has reviewed and replied to verification email at registration time.',
  `AccessCode` varchar(40) DEFAULT NULL COMMENT 'Code that only exists when account reset is needed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MemberId`, `ContactName`, `CompanyName`, `ContactEmail`, `Username`, `Password`, `CompanyCity`, `CompanyState`, `PhoneNumber`, `CompanyPicture`, `CompanyDescription`, `AccountVerified`, `AccessCode`) VALUES
(11, 'David Cohen', 'Doc Wayne Youth Services', 'dcohen@docwayne.org', 'dwayne', '3rhuw7q3hu', 'Framingham', 'Massachusetts', '617-458-0315', 'https://ibb.co/H75nscB', 'Doc Wayne is an award-winning non-profit reimagining therapy through the lens of sport. Our sport-based group therapy program, Chalk Talk®, supports students as they process and persevere through adversity. Over time, as individuals and in teams, youth learn to heal together, grow together, and win together.', 1, NULL),
(12, 'James Neal', 'Team Solar', 'james@teamsolar.us', 'tsolar', 'fh2893f3', 'Framingham', 'Massachusetts', '774-217-3995', 'https://ibb.co/F61TMYk', 'Team Solar is dedicated to helping non-profit organizations and small businesses receive the benefits of solar\r\n', 1, NULL),
(13, 'Marina Andreazi', 'Xua Life', 'marina@xua.life', 'XLife', 'q8c 4t8o', 'Framingham', 'Massachusetts', '508-626-5721', 'https://ibb.co/ZJgW8KJ', 'Craft Energy Drinks Powered By Amazonian Ingredients', 1, NULL),
(15, 'Matthew McLean', 'Nubitt', 'matt@nubitt.com', 'mattbitt', 'nubitt45391', 'Boston', 'Massachusetts', '617-593-4260', 'https://ibb.co/1ZLxHLR', 'No Description', 1, NULL),
(16, 'Murkin Martinez', 'Collaborative Solutions, LLC', 'murkin.martinez@gmail.com', 'mmartinez', 'sol123', 'Framingham', 'Massachusetts', '617-501-6138', 'https://ibb.co/NxbgTfH', 'Collaborative Solutions is a leading global Finance and HR Transformation consultancy that leverages world-class cloud solutions to help deliver successful outcomes for its customers.', 1, NULL),
(22, 'Christos Giam', 'Northbridge House of Pizza', 'unstoppablestreletsy@gmail.com', 'ChristosPizza', 'sdjdsjdsdsjkdsjk', 'Grafton', 'MA', '455-566-4467', 'https://i.ibb.co/m0x0Wjr/b2e453ca2a8e.png', 'Hangover Pizza for those trying be sober again. Tasty too.', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `privateconversations`
--

CREATE TABLE `privateconversations` (
  `ConversationId` int(11) NOT NULL COMMENT 'Conversation Id',
  `CreatorId` int(11) NOT NULL COMMENT 'Id of Conversation Creator',
  `ConversationName` varchar(255) NOT NULL COMMENT 'Name of Conversation',
  `CreatorName` varchar(255) NOT NULL COMMENT 'Creator of Conversation',
  `CreationTime` datetime NOT NULL COMMENT 'Date the Conversation was Made',
  `Views` int(11) NOT NULL COMMENT 'How Many times this conversation was looked at',
  `Messages` int(11) NOT NULL COMMENT 'Number of Messages in Conversation',
  `LastMessanger` varchar(255) NOT NULL COMMENT 'Last Message Sender',
  `LastMessageSentTime` datetime NOT NULL COMMENT 'Time Last Message was Sent',
  `Pinned` tinyint(1) NOT NULL COMMENT 'Whether or Not User sees Conversation as Important'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table of all Conversations';

--
-- Dumping data for table `privateconversations`
--

INSERT INTO `privateconversations` (`ConversationId`, `CreatorId`, `ConversationName`, `CreatorName`, `CreationTime`, `Views`, `Messages`, `LastMessanger`, `LastMessageSentTime`, `Pinned`) VALUES
(6, 22, 'Conv', 'ChristosPizza', '2019-11-22 20:33:54', 0, 0, 'ChristosPizza', '2019-11-22 20:33:54', 1),
(7, 22, 'Conv2', 'ChristosPizza', '2019-11-22 20:34:23', 0, 0, 'ChristosPizza', '2019-11-22 20:34:23', 1),
(8, 22, 'Pizza', 'ChristosPizza', '2019-11-22 20:34:52', 0, 0, 'ChristosPizza', '2019-11-22 20:34:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `privatemessageboards`
--

CREATE TABLE `privatemessageboards` (
  `BoardId` int(11) NOT NULL COMMENT 'Id of User''s Message Board',
  `Username` varchar(255) NOT NULL COMMENT 'Username of Messanger',
  `Name` varchar(255) NOT NULL COMMENT 'Name of Messanger',
  `Email` varchar(255) NOT NULL COMMENT 'Email Address of Messanger',
  `Conversations` int(11) NOT NULL COMMENT 'Number of Private Conversations Participating In',
  `UserId` int(11) NOT NULL COMMENT 'Site Account Id',
  `ProfileImage` text NOT NULL COMMENT 'Shows Up With Message',
  `PMList` longtext COMMENT 'List of Private Conversations User is Part of',
  `Signature` varchar(150) DEFAULT NULL COMMENT 'Optional Signature that appears below User''s post'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Each user gets their own private message board';

--
-- Dumping data for table `privatemessageboards`
--

INSERT INTO `privatemessageboards` (`BoardId`, `Username`, `Name`, `Email`, `Conversations`, `UserId`, `ProfileImage`, `PMList`, `Signature`) VALUES
(17, 'XLife', 'Marina Andreazi', 'marina@xua.life', 0, 13, '', '7 ', NULL),
(19, 'tsolar', 'James Neal', 'james@teamsolar.us', 0, 12, '', NULL, NULL),
(20, 'mattbitt', 'Matthew McLean', 'matt@nubitt.com', 0, 15, '', NULL, NULL),
(22, 'mmartinez', 'Murkin Martinez', 'murkin.martinez@gmail.com', 0, 16, '', NULL, NULL),
(26, 'dwayne', 'David Cohen', 'dcohen@docwayne.org', 0, 11, '', '6 ', NULL),
(28, 'ChristosPizza', 'Christos Giam', 'unstoppablestreletsy@gmail.com', 0, 22, 'https://i.ibb.co/m0x0Wjr/b2e453ca2a8e.png', '8 ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `privatemessages`
--

CREATE TABLE `privatemessages` (
  `MessageId` int(11) NOT NULL COMMENT 'Message Id for whole site',
  `MessageSenderName` varchar(255) NOT NULL COMMENT 'Sender''s Username',
  `MessageSenderEmail` varchar(255) NOT NULL COMMENT 'Sender''s Email',
  `MessageSenderPicture` longblob NOT NULL COMMENT 'Sender''s Picture',
  `MessageBody` longtext NOT NULL COMMENT 'Message Body Containing special txt formatting',
  `AttachedFile` longblob COMMENT 'Choice to Attach File to Message'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='All Private Messages Sent on Site';

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
-- Indexes for table `jobmemberlist`
--
ALTER TABLE `jobmemberlist`
  ADD PRIMARY KEY (`ProjectId`);

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
-- Indexes for table `privateconversations`
--
ALTER TABLE `privateconversations`
  ADD PRIMARY KEY (`ConversationId`);

--
-- Indexes for table `privatemessageboards`
--
ALTER TABLE `privatemessageboards`
  ADD PRIMARY KEY (`BoardId`);

--
-- Indexes for table `privatemessages`
--
ALTER TABLE `privatemessages`
  ADD PRIMARY KEY (`MessageId`);

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
  MODIFY `InternId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id for each entry', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `internstasks`
--
ALTER TABLE `internstasks`
  MODIFY `TaskId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id of Task for Intern';

--
-- AUTO_INCREMENT for table `jobmemberlist`
--
ALTER TABLE `jobmemberlist`
  MODIFY `ProjectId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id of Project';

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `JobId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Job Id';

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `MatchId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifier for this Company/Keyword Match', AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `MemberId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id for each entry', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `privateconversations`
--
ALTER TABLE `privateconversations`
  MODIFY `ConversationId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Conversation Id', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `privatemessageboards`
--
ALTER TABLE `privatemessageboards`
  MODIFY `BoardId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id of User''s Message Board', AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `privatemessages`
--
ALTER TABLE `privatemessages`
  MODIFY `MessageId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Message Id for whole site';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
