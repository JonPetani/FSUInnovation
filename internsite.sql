-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 11:54 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminId` int(11) NOT NULL COMMENT 'AdminAccountId',
  `AdminCode` varchar(255) NOT NULL COMMENT 'Password',
  `Role` varchar(255) NOT NULL COMMENT 'Role at Center to Have Admin Account for (Web Dev, Moderator, Director, etc)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='All Admin Recognized Accounts (Links to another user)';

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminId`, `AdminCode`, `Role`) VALUES
(1, 'ru94er4o3ij', 'Student Intern PHP Web Developer For This Website');

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
-- Table structure for table `emailtemp`
--

CREATE TABLE `emailtemp` (
  `EmailId` int(11) NOT NULL COMMENT 'AddressId',
  `EmailAddress` varchar(255) NOT NULL COMMENT 'Email To Store Before Verify Is Complete',
  `OriginalEmail` varchar(255) NOT NULL COMMENT 'Original Email Address'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Store Email Address Changes For Email Verify';

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
  `Resume` text COMMENT 'Intern''s Resume',
  `SkillsAndExperience` longtext COMMENT 'Past Jobs/Skills that Intern has',
  `AccountVerified` tinyint(1) NOT NULL COMMENT 'Determines if user has reviewed and replied to verification email at registration time.',
  `AccessCode` varchar(13) DEFAULT NULL COMMENT 'Code that only exists when account reset is needed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table is for applying interns.';

--
-- Dumping data for table `intern`
--

INSERT INTO `intern` (`InternId`, `InternName`, `EmailAddress`, `Username`, `Password`, `School`, `InternPhoto`, `Major`, `GPA`, `City`, `State`, `PhoneNumber`, `Resume`, `SkillsAndExperience`, `AccountVerified`, `AccessCode`) VALUES
(5, 'Jonathan Petani', 'jpetani@student.framingham.edu', 'Jpetani', 'ru94er4o3ij', 'FSU', 'https://i.ibb.co/TYmxJpL/e88be3e28bb7.png', 'CS - Software Eng.', '3.70', 'Hopkinton', 'Massachusetts', '508-435-3925', '', 'Good at Coding (especially web and backend)', 1, NULL);

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
(11, 'David Cohen', 'Doc Wayne Youth Services', 'dcohen@docwayne.org', 'dwayne', 'wildplanettuna', 'Framingham', 'Massachusetts', '617-458-0315', 'https://ibb.co/H75nscB', 'Doc Wayne is an award-winning non-profit reimagining therapy through the lens of sport. Our sport-based group therapy program, Chalk Talk®, supports students as they process and persevere through adversity. Over time, as individuals and in teams, youth learn to heal together, grow together, and win together.', 1, NULL),
(12, 'James Neal', 'Team Solar', 'james@teamsolar.us', 'tsolar', 'fh2893f3', 'Framingham', 'Massachusetts', '774-217-3995', 'https://ibb.co/F61TMYk', 'Team Solar is dedicated to helping non-profit organizations and small businesses receive the benefits of solar\r\n', 1, NULL),
(13, 'Marina Andreazi', 'Xua Life', 'marina@xua.life', 'XLife', 'q8c 4t8o', 'Framingham', 'Massachusetts', '508-626-5721', 'https://ibb.co/ZJgW8KJ', 'Craft Energy Drinks Powered By Amazonian Ingredients', 1, NULL),
(15, 'Matthew McLean', 'Nubitt', 'matt@nubitt.com', 'mattbitt', 'nubitt45391', 'Boston', 'Massachusetts', '617-593-4260', 'https://ibb.co/1ZLxHLR', 'No Description', 1, NULL),
(16, 'Murkin Martinez', 'Collaborative Solutions, LLC', 'murkin.martinez@gmail.com', 'mmartinez', 'sol123', 'Framingham', 'Massachusetts', '617-501-6138', 'https://ibb.co/NxbgTfH', 'Collaborative Solutions is a leading global Finance and HR Transformation consultancy that leverages world-class cloud solutions to help deliver successful outcomes for its customers.', 1, NULL),
(23, 'Raghu Nandan', 'Soltrix Technology Solutions, Inc.', 'raghu.nandan@soltrixsolutions.com', 'RNandan', 'soltricks98', 'Framingham', 'Massachusetts', '774-293-1293', 'https://ibb.co/Z6R9Q4c', '\r\nSoltrix Technology Solutions, Inc. started in 2007 as a custom software development shop. All founders came from working in IT at large insurance companies and financial institutions. While working for these institutions we gained expertise in ITSM and Project Portfolio Management (responsible for implementation of CA Clarity -now CA PPM). \r\n\r\nSoltrix is privately owned, managed, and headquartered in Framingham, MA. Since 2007, we have successfully implemented over 50 project and portfolio management (Clarity)projects. In 2014, we started working on ServiceNow. Currently, our team of over 70 personnel, include solution architects, project managers, business analysts, implementation specialists and developers. We have ServiceNow certified system admins, developers and solutions architects. Soltrix is a approved ServiceNow implementation partner and a certified Minority Business Enterprise and HR solutions.', 1, NULL),
(24, 'Kimberly Devane', 'Entrust Research & Recruiting', 'kim.devane@entrustrr.com', 'KDevane', 'entrustablepassword', 'Framingham', 'Massachusetts', '508-523-5294', 'https://ibb.co/cFjrGvV', 'Entrust Research & Recruiting, LLC provides the following Services:\r\nRecruiting participants for User Experience/Usability & Market Research studies in various contexts within the United States. ', 1, NULL),
(45, 'Leah Daniels', 'Appcast', 'leah.daniels@appcast.io', 'e468', 'w_DhZ&lYVm0p%+[c', 'Framingham', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(46, 'Kenya Rutland', 'KJR Consulting, LLC', 'kenya@kjrconsulting.com', 'e212', ',$<%1+#Wu4SU.;Ajk', 'Framingham', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(47, 'George Dawson', '', 'gdawson@recommerceadvisors.com', 'e645', 'cV_T&<B+T$~yp`2KZ~JMppQU', 'Framingham', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(48, 'Suriah Resende', 'LUK, Inc', 'resende@luk.org', 'u103', 'rp-)$aFJ#H:mA1y}Fwv:Wv', 'Framingham', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(49, 'Jody Comins', 'A Better Way; Divorce Mediation', 'jodylcomins@gmail.com', 'o370', 'LlTAQ?w_+R7oEdk|', 'Framingham', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(50, 'Zara Massoud', 'Inspire', 'zaramassoud@gmail.com', 'a180', '<cD&N80lQsaM;OKJAOqU[fA', 'Framingham', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(51, 'Stephanie Hirshon', '', 'stephanie@metrowest.org', 't499', ',96Hvz~z+y6,`&DCkuA', 'Framingham', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(52, 'Kathryn Rose', 'WiseHer', 'kathryn@wiseher.com', 'a672', '51VhdokB;1/WQ?~p+_KJiKv=', 'Framingham', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(53, 'Saad Thabit', 'DRF Engineering Services LLC', 'thabit@drfengineeringservices.com', 'a401', 'BRkfXe]ytj[m9RKLoTPAz2t', 'Framingham', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(54, 'Jack Boyle', 'CleverMinds, Inc.', 'workbar@cleverminds.net', 'a748', 'n#C)p&VYU=0L]1yvR>sU0V', 'Framingham', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(55, 'Hal Greenberger', '', 'halgbr@aol.com', 'a745', '5O$=u=*3Sq6;kUAz,Tzrn,lkT', 'Framingham', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(56, 'Daniel McDonnell', 'The World Tour - Travel Adventure Club', 'daniel@theworldtour.org', 'a782', ':PlT1VV-dJilbR%W@n{<@', 'Framingham', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(57, 'Luka Kurelja', 'Mill 2 Market', 'lukam2m@gmail.com', 'u978', './IBz]t&Lx<+iZe-9+', 'Framingham', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(58, 'Eric Bonin', 'Pillars Yogurt LLC', 'ebonin@pillarsyogurt.com', 'r601', '<7=wgN41;dDi4^M', 'Framingham', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(59, 'Jim Hulyk', '', 'jhulyk@hotmail.com', 'i641', 'nYnF8poTx`N?Sg0n?rE`do%2M', 'Framingham', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(60, 'Mazi Gene', 'Ray Farmz LLC', 'mazzpmp@gmail.com', 'a183', '+(	N=.g<w:SNP8d)3_S', 'Framingham', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(61, 'Harry Corcell', '', 'harry.corcell@lansa.com', 'a376', 'F=,t-LM~B:8t0.O1q_#:[w', 'Framingham', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(62, 'ElizabethLison', 'Innovative Autism Connections, LLC', 'plison@innovativeautism.org', 'l568', ',&Lz*!t`b|gDfBCV+ed', 'Framingham', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(63, 'Jonathan Petani', 'Business Men of America', 'Unstoppablestreletsy@gmail.com', 'o804', 'uL{Ia]1iHG?N#X-/-ji&bb', 'Florida', 'Massachusetts', 'To be Updated by Mem', 'images/Gold-WithoutEars.jpg', 'To be Updated by Member...', 1, NULL),
(64, 'Jon Johnson', 'None of Your Business', 'JonPetani@gmail.com', 'jjony', 'kjeewewiewi', 'Grafton', 'New Hampshire', '485-445-4555', 'https://i.ibb.co/xskxK06/01fd51d3c8ce.gif', 'Again, None of your business. Our Business is our business.', 1, NULL);

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
(9, 22, 'FTP Project Krishna', 'ChristosPizza', '2019-11-26 00:16:55', 8, 0, 'ChristosPizza', '2019-11-26 00:16:55', 1),
(10, 22, 'Pizza Marketing Strategies', 'ChristosPizza', '2019-11-26 00:20:19', 41, 0, 'ChristosPizza', '2019-11-26 00:20:19', 1),
(11, 11, 'Krap', 'dwayne', '2019-12-06 22:20:40', 6, 0, 'dwayne', '2019-12-06 22:20:40', 1),
(12, 12, 'Sun Shine', 'tsolar', '2019-12-06 22:45:55', 5, 0, 'tsolar', '2019-12-06 22:45:55', 1),
(13, 12, 'Sun Shine', 'tsolar', '2019-12-06 22:47:12', 0, 0, 'tsolar', '2019-12-06 22:47:12', 1),
(14, 12, 'Sun Shine', 'tsolar', '2019-12-06 22:49:11', 0, 0, 'tsolar', '2019-12-06 22:49:11', 1);

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
(17, 'XLife', 'Marina Andreazi', 'marina@xua.life', 0, 13, '', '10 11 ', NULL),
(19, 'tsolar', 'James Neal', 'james@teamsolar.us', 0, 12, '', '12 12 12 ', NULL),
(20, 'mattbitt', 'Matthew McLean', 'matt@nubitt.com', 0, 15, '', '10 ', NULL),
(22, 'mmartinez', 'Murkin Martinez', 'murkin.martinez@gmail.com', 0, 16, '', NULL, NULL),
(26, 'dwayne', 'David Cohen', 'dcohen@docwayne.org', 0, 11, '', '10 11 12 12 12 ', NULL),
(28, 'ChristosPizza', 'Christos Giam', 'unstoppablestreletsy@gmail.com', 0, 22, 'https://i.ibb.co/m0x0Wjr/b2e453ca2a8e.png', '9 10 ', NULL),
(29, 'Jpetani', 'Jonathan Petani', 'jpetani@student.framingham.edu', 0, 5, 'https://i.ibb.co/TYmxJpL/e88be3e28bb7.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `privatemessages`
--

CREATE TABLE `privatemessages` (
  `MessageId` int(11) NOT NULL COMMENT 'Message Id for whole site',
  `ConversationId` int(11) NOT NULL COMMENT 'Link to Conversation',
  `MessageSenderName` varchar(255) NOT NULL COMMENT 'Sender''s Username',
  `MessageSenderEmail` varchar(255) NOT NULL COMMENT 'Sender''s Email',
  `MessageSenderPicture` text NOT NULL COMMENT 'Sender''s Picture',
  `MessageBody` longtext NOT NULL COMMENT 'Message Body Containing special txt formatting',
  `AttachedFile` longblob COMMENT 'Choice to Attach File to Message',
  `Signature` varchar(150) DEFAULT NULL COMMENT 'User Signature line for posts'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='All Private Messages Sent on Site';

--
-- Dumping data for table `privatemessages`
--

INSERT INTO `privatemessages` (`MessageId`, `ConversationId`, `MessageSenderName`, `MessageSenderEmail`, `MessageSenderPicture`, `MessageBody`, `AttachedFile`, `Signature`) VALUES
(1, 10, 'ChristosPizza', 'unstoppablestreletsy@gmail.com', 'https://i.ibb.co/m0x0Wjr/b2e453ca2a8e.png', 'Okay People, We Need to Market Pizza Better. Who Ever is Against me is a Nimrod. Got it!!!', NULL, NULL),
(2, 10, 'ChristosPizza', 'unstoppablestreletsy@gmail.com', 'https://i.ibb.co/m0x0Wjr/b2e453ca2a8e.png', 'Hi People, We need to get serious here.', NULL, NULL),
(3, 10, 'ChristosPizza', 'unstoppablestreletsy@gmail.com', 'https://i.ibb.co/m0x0Wjr/b2e453ca2a8e.png', '<img src=\"https://miro.medium.com/fit/c/256/256/0*l9HuwVOo5adObSVt\"/>\r\nMr. Comrade M. Keil', NULL, NULL),
(4, 11, 'dwayne', 'dcohen@docwayne.org', '', 'Comrade Keil', NULL, NULL),
(5, 11, 'dwayne', 'dcohen@docwayne.org', '', '<img src=\"https://farm4.static.flickr.com/3081/2627357533_50e9e16d53.jpg\" width=\"800\" height=\"800\"/>', NULL, NULL),
(6, 12, 'tsolar', 'james@teamsolar.us', '', '<img src=\"https://s1.dmcdn.net/v/A71OE1RmKZdjNOi7u/x1080\" width = \"50\" height = \"50\" />', NULL, NULL),
(7, 12, 'dwayne', 'dcohen@docwayne.org', '', '<img src=\"https://i.ytimg.com/vi/HuieswyRtn0/maxresdefault.jpg\" width=\"150\" height=\"150\"/>', NULL, NULL),
(8, 11, 'dwayne', 'dcohen@docwayne.org', '', 'Krishna Curry', NULL, NULL),
(9, 11, 'dwayne', 'dcohen@docwayne.org', '', '<img src=\"https://i1.rgstatic.net/ii/profile.image/272477985177617-1441975222359_Q512/David_Keil.jpg\" width=\"5000\" height=\"5000\"/>', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`AppId`);

--
-- Indexes for table `emailtemp`
--
ALTER TABLE `emailtemp`
  ADD PRIMARY KEY (`EmailId`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'AdminAccountId', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `AppId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id for Application in Database';

--
-- AUTO_INCREMENT for table `emailtemp`
--
ALTER TABLE `emailtemp`
  MODIFY `EmailId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'AddressId';

--
-- AUTO_INCREMENT for table `intern`
--
ALTER TABLE `intern`
  MODIFY `InternId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id for each entry', AUTO_INCREMENT=6;

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
  MODIFY `MemberId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id for each entry', AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `privateconversations`
--
ALTER TABLE `privateconversations`
  MODIFY `ConversationId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Conversation Id', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `privatemessageboards`
--
ALTER TABLE `privatemessageboards`
  MODIFY `BoardId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id of User''s Message Board', AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `privatemessages`
--
ALTER TABLE `privatemessages`
  MODIFY `MessageId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Message Id for whole site', AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
