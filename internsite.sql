-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 10:18 PM
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

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`AppId`, `CompanyName`, `InternId`, `JobId`, `StudentName`, `InternApplication`, `Permission`) VALUES
(1, 'Array[CompanyName]', 3, 1, 'Jonathan Petani', 0x5265736f75726365206964202336, 'Yes');

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
  `SkillsAndExperience` longtext COMMENT 'Past Jobs/Skills that Intern has',
  `AccountVerified` tinyint(1) NOT NULL COMMENT 'Determines if user has reviewed and replied to verification email at registration time.',
  `AccessCode` varchar(40) DEFAULT NULL COMMENT 'Code that only exists when account reset is needed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table is for applying interns.';

--
-- Dumping data for table `intern`
--

INSERT INTO `intern` (`InternId`, `InternName`, `EmailAddress`, `Username`, `Password`, `School`, `InternPhoto`, `Major`, `GPA`, `City`, `State`, `PhoneNumber`, `Resume`, `SkillsAndExperience`, `AccountVerified`, `AccessCode`) VALUES
(1, 'James Dean', 'Dean@student.framingham.edu', 'JDean', 'eaglerock32', 'Framingham State University', 0x686f6f706361742e676966, 'Liberal Arts', '3.40', 'Sudbury', 'Massachusetts', '234-332-1221', 0x4166726963616e5265776f726b732e727466, 'Reworking African civs', 1, NULL),
(2, 'Alex Jones', 'AJ@student.framingham.edu', 'Ajones', 'jones123', 'Framingham State University', 0x506973746f6c65726f2e706e67, 'Wildlife Biology', '2.90', 'Wilmington', 'Massachusetts', '508-425-9302', '', '', 1, NULL),
(3, 'Jonathan Petani', 'jpetani@student.framingham.edu', 'Jpetani', 'bloonpop1', 'Framingham State University', 0x746962732e504e47, 'Computer Science', '3.69', 'Hopkinton', 'Massachusetts', '508-435-2183', 0x526573756d652e68746d, '', 1, NULL),
(4, 'jj', 'unstoppablestreletsy@gmail.com', 'jpp', 'poppop', 'Scranton State University', 0x627261696e2e6a7067, 'Math', '4.00', 'Newark', 'New Jersey', '766-556-5432', '', 'I can solve complex math problems and am a reasonable coder.', 1, 'Q)9qRR<<v`N3=X19e+$ClF$'),
(5, 'jon johnson', 'jpetani@student.framingham.edu', 'jj', 'fioefj;wfafsiaaefr', 'Socialist University', 0x427261766550657275616e612e504e47, 'Law', '1.50', 'Seabrook', 'New Hampshire', '243-122-4532', '', 'I can write and research stuff. I am quick at changing a water tank.', 1, NULL),
(6, 'iow3r3wiohiwoe', 'unstoppablestreletsy@gmail.com', 'hiohih', 'iohhio', 'ihoklklklklklklklklklkliohhji', 0x426174616b2e706e67, 'hikohi.ohh', '6.00', 'iuhiuhhiuhiihu', 'uhihuiiiiiiiiiiiiiiiiiiiiig', '332-344-2211', '', 'I can write and research stuff. I am quick at changing a water tank.', 1, 'Q)9qRR<<v`N3=X19e+$ClF$'),
(48, 'suban krishnamoorthy', 'skrishna@framingham.edu', 'skrishna123', 'rrrtiriri545454945954', 'euewuewuweuweuew', 0x627261696e2e6a7067, '4.5', '2.30', 'erireireireoieroerio', 'sdioewioeioerioerioreio', '456-677-3335', '', 'eieerieierierururejrheeru', 1, NULL),
(50, 'David Keil', 'DKeil@framingham.edu', 'Comrade Keil', 'bernieboy342', 'Framingham State College', 0x427261766550657275616e612e504e47, 'Theoretical Computation', '2.50', 'Boston', 'Massachusetts', '508-345-1232', '', 'I can turn a NFA into a DFA and like working with Kripke Structures and Recurrences.', 1, NULL);

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

--
-- Dumping data for table `internstasks`
--

INSERT INTO `internstasks` (`TaskId`, `InternName`, `JobName`, `JobId`, `InternId`, `Status`) VALUES
(1, '', 'Array[JobName]', 1, 3, 'Pending');

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
  `InternsNeeded` int(11) NOT NULL COMMENT 'Number of Interns the Contact needs to do the task',
  `JobRequirements` text NOT NULL COMMENT 'requirements/skills/experience intern will need to do the task correctly'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Listing of All Tasks needed for Members';

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`JobId`, `JobName`, `JobDesc`, `CompanyName`, `JobType`, `InternsNeeded`, `JobRequirements`) VALUES
(1, 'Solar Search', 'I need some Interns to look into the latest Solar Panel tech available so that my company can find good options for our clients to invest in. As solar technology changes, we want to be ahead of our competitors as far as Solar Technology we work with is concerned.', 'Team Solar', '', 5, 'You should be able to research topics using the web effectively. Also, writing a good formal report will be preferred rather than a sloppy txt file with a list of items you found. You should be at least familiar with the concept of Solar Power to ensure that the technologies you find are viable for our needs.'),
(2, 'Sports and Stuff', 'We need research into Sports that will help our young clients out the best. We have traditionally gone with Basketball, Football, and Soccer, but we want to expand our horizons.', 'Doc Wayne Youth Services', '', 5, 'You need to know how to use the internet to find out things. Also, knowing what a sport is helps too.');

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
(53, 'Team Solar', 'environment');

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
  `CompanyDescription` longtext NOT NULL COMMENT 'Company Description',
  `AccountVerified` tinyint(1) NOT NULL COMMENT 'Determines if user has reviewed and replied to verification email at registration time.',
  `AccessCode` varchar(40) DEFAULT NULL COMMENT 'Code that only exists when account reset is needed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MemberId`, `ContactName`, `CompanyName`, `ContactEmail`, `Username`, `Password`, `CompanyCity`, `CompanyState`, `PhoneNumber`, `CompanyPicture`, `CompanyDescription`, `AccountVerified`, `AccessCode`) VALUES
(11, 'David Cohen', 'Doc Wayne Youth Services', 'dcohen@docwayne.org', 'dwayne', '3rhuw7q3hu', 'Framingham', 'Massachusetts', '617-458-0315', 0x646f637761796e652d6c6f676f2d6d6f6e6f2d312e706e67, 'Doc Wayne is an award-winning non-profit reimagining therapy through the lens of sport. Our sport-based group therapy program, Chalk Talk®, supports students as they process and persevere through adversity. Over time, as individuals and in teams, youth learn to heal together, grow together, and win together.', 1, NULL),
(12, 'James Neal', 'Team Solar', 'james@teamsolar.us', 'tsolar', 'fh2893f3', 'Framingham', 'Massachusetts', '774-217-3995', 0x5465616d536f6c61725f636f6c6f722d322e706e67, 'Team Solar is dedicated to helping non-profit organizations and small businesses receive the benefits of solar\r\n', 1, NULL),
(13, 'Marina Andreazi', 'Xua Life', 'marina@xua.life', 'XLife', 'q8c 4t8o', 'Framingham', 'Massachusetts', '508-626-5721', 0x61665f7875615f636d796b2d30312e706e67, 'Craft Energy Drinks Powered By Amazonian Ingredients', 1, NULL),
(15, 'Matthew McLean', 'Nubitt', 'matt@nubitt.com', 'mattbitt', 'nubitt45391', 'Boston', 'Massachusetts', '617-593-4260', 0x6e75626974742e6a7067, 'No Description', 1, NULL),
(16, 'Murkin Martinez', 'Collaborative Solutions, LLC', 'murkin.martinez@gmail.com', 'mmartinez', 'sol123', 'Framingham', 'Massachusetts', '617-501-6138', 0x436f6c6c61625f4c6f676f2e77656270, 'Collaborative Solutions is a leading global Finance and HR Transformation consultancy that leverages world-class cloud solutions to help deliver successful outcomes for its customers.', 1, NULL),
(17, 'JonLuckani', 'Halifaxer', 'unstoppablestreletsy@gmail.com', 'JohnLucktani345', 'jrherhjererreureuerui', 'dfkjdfjdrjdrjkerkjerkjerk', 'kldikdrierierrei', '567-667-5543', 0x31373070782d50726f645061636b2d48616d6275726765722d48656c7065722d4368656573654d61632d536d616c6c2e6a7067, 'oiceshfakgfhdsakugvhasdkugvuhaeuigfhasdkufuhaewuifhaweuife', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `privateconversationmembers`
--

CREATE TABLE `privateconversationmembers` (
  `PMLinkId` int(11) NOT NULL COMMENT 'Conversation Link Id',
  `PMAccountId` int(11) NOT NULL COMMENT 'PM Board Account #',
  `PMMemberName` varchar(255) NOT NULL COMMENT 'PM Member''s Actual Name',
  `PMMemberUsername` varchar(255) NOT NULL COMMENT 'Username of PM Member',
  `PMMemberImage` longblob NOT NULL COMMENT 'Profile Image of User',
  `ConversationId` int(11) NOT NULL COMMENT 'Id of Conversation User is part of',
  `PMMemberEmail` varchar(255) NOT NULL COMMENT 'Email Address of PM Member'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='All User Connections to Private Conversations';

--
-- Dumping data for table `privateconversationmembers`
--

INSERT INTO `privateconversationmembers` (`PMLinkId`, `PMAccountId`, `PMMemberName`, `PMMemberUsername`, `PMMemberImage`, `ConversationId`, `PMMemberEmail`) VALUES
(14, 0, 'Array[ContactName]', 'Array[Username]', 0x41727261795b436f6d70616e79506963747572655d, 0, 'Array[ContactEmail]'),
(15, 0, 'Array[ContactName]', 'Array[Username]', 0x41727261795b436f6d70616e79506963747572655d, 0, 'Array[ContactEmail]');

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
  `Pinned` enum('yes','no') NOT NULL COMMENT 'Whether or Not User sees Conversation as Important'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table of all Conversations';

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
  `UserId` int(11) NOT NULL COMMENT 'Site Account Id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Each user gets their own private message board';

--
-- Dumping data for table `privatemessageboards`
--

INSERT INTO `privatemessageboards` (`BoardId`, `Username`, `Name`, `Email`, `Conversations`, `UserId`) VALUES
(1, 'Comrade Keil', 'David Keil', 'DKeil@framingham.edu', 0, 1),
(15, 'dwayne', 'David Cohen', 'dcohen@docwayne.org', 0, 11),
(17, 'XLife', 'Marina Andreazi', 'marina@xua.life', 0, 13),
(19, 'tsolar', 'James Neal', 'james@teamsolar.us', 0, 12),
(20, 'mattbitt', 'Matthew McLean', 'matt@nubitt.com', 0, 15),
(22, 'mmartinez', 'Murkin Martinez', 'murkin.martinez@gmail.com', 0, 16),
(23, 'johny', 'Jon P', 'UnstoppableStreletsy@gmail.com', 0, 25);

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
-- Indexes for table `privateconversationmembers`
--
ALTER TABLE `privateconversationmembers`
  ADD PRIMARY KEY (`PMLinkId`);

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
  MODIFY `AppId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id for Application in Database', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `intern`
--
ALTER TABLE `intern`
  MODIFY `InternId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id for each entry', AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `internstasks`
--
ALTER TABLE `internstasks`
  MODIFY `TaskId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id of Task for Intern', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobmemberlist`
--
ALTER TABLE `jobmemberlist`
  MODIFY `ProjectId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id of Project';

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `JobId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Job Id', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `MatchId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifier for this Company/Keyword Match', AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `MemberId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id for each entry', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `privateconversationmembers`
--
ALTER TABLE `privateconversationmembers`
  MODIFY `PMLinkId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Conversation Link Id', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `privateconversations`
--
ALTER TABLE `privateconversations`
  MODIFY `ConversationId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Conversation Id';

--
-- AUTO_INCREMENT for table `privatemessageboards`
--
ALTER TABLE `privatemessageboards`
  MODIFY `BoardId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id of User''s Message Board', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `privatemessages`
--
ALTER TABLE `privatemessages`
  MODIFY `MessageId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Message Id for whole site';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
