-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2018 at 05:23 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `madrasuniversity`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignmentID` int(11) NOT NULL,
  `dateOfAssignment` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `targetDate` date NOT NULL,
  `graceDate` date NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `batchID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignmentID`, `dateOfAssignment`, `targetDate`, `graceDate`, `course_code`, `subjectID`, `batchID`) VALUES
(13, '2018-11-09 21:28:28', '2018-11-17', '2018-11-24', 'PIT', 34, 2),
(14, '2018-11-09 21:29:01', '2018-11-17', '2018-11-24', 'PIT', 35, 2),
(15, '2018-11-09 21:29:41', '2018-11-17', '2018-11-24', 'PIT', 38, 2),
(16, '2018-11-09 22:12:08', '2018-11-17', '2018-11-24', 'PIT', 44, 2),
(17, '2018-11-09 22:12:40', '2018-11-17', '2018-11-24', 'PIT', 39, 2);

-- --------------------------------------------------------

--
-- Table structure for table `batchmaster`
--

CREATE TABLE `batchmaster` (
  `batchID` int(11) NOT NULL,
  `batchType` int(50) DEFAULT NULL,
  `batchYear` varchar(10) DEFAULT NULL,
  `createdDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batchmaster`
--

INSERT INTO `batchmaster` (`batchID`, `batchType`, `batchYear`, `createdDate`, `updatedAt`) VALUES
(1, 1, '2018', '2018-07-10 00:00:00', '2018-07-10 00:00:00'),
(2, 2, '2017', '2018-07-10 00:00:00', '2018-07-10 00:00:00'),
(3, 2, '2019', '2018-10-06 11:37:34', '2018-10-06 11:37:34'),
(4, 2, '2018', '2018-10-07 13:39:46', '2018-10-07 13:39:46'),
(5, 1, '2019', '2018-10-07 13:40:24', '2018-11-10 06:47:07'),
(6, 1, '2017', '2018-10-07 13:40:43', '2018-10-07 13:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `batch_type`
--

CREATE TABLE `batch_type` (
  `batchTypeID` int(11) NOT NULL,
  `batchName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_type`
--

INSERT INTO `batch_type` (`batchTypeID`, `batchName`) VALUES
(1, 'Academic'),
(2, 'Calender');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` int(11) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `semesterID` int(11) NOT NULL,
  `createAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `courseName`, `course_code`, `semesterID`, `createAt`, `updatedAt`) VALUES
(1, 'Msc IT', 'PIT', 0, '2018-09-29 22:13:35', NULL),
(2, 'MCA', 'PCA', 0, '2018-09-29 22:14:06', NULL),
(3, 'Bsc Maths', 'UMA', 0, '2018-09-29 22:14:21', NULL),
(4, 'BCA', 'UCA', 0, '2018-09-29 22:14:33', NULL),
(5, 'Msc Maths', 'PMA', 0, '2018-09-29 22:15:05', NULL),
(6, 'Bcom CA', 'UCC', 0, '2018-09-29 22:15:23', NULL),
(7, 'MBA Finance', 'PBAF', 0, '2018-10-07 13:42:37', '2018-10-07 10:14:21'),
(8, 'MBA Marketing', 'PBA', 0, '2018-10-07 13:44:06', NULL),
(9, 'M.Sc.Neuroscience', 'PNS', 0, '2018-10-07 13:46:45', NULL),
(10, 'M.Sc. Analytical Chemistry', 'PAC', 0, '2018-10-07 13:47:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `marks_details`
--

CREATE TABLE `marks_details` (
  `markDetailsID` int(11) NOT NULL,
  `assignmentID` int(11) NOT NULL,
  `enroll_no` varchar(50) NOT NULL,
  `questionID` int(11) DEFAULT NULL,
  `subjectID` int(11) NOT NULL,
  `correctedStaffID` int(11) NOT NULL,
  `obtainedMarks` int(11) NOT NULL,
  `totalInternalMarks` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks_details`
--

INSERT INTO `marks_details` (`markDetailsID`, `assignmentID`, `enroll_no`, `questionID`, `subjectID`, `correctedStaffID`, `obtainedMarks`, `totalInternalMarks`) VALUES
(53, 12, 'C17101PIT6089', 79, 39, 1, 1, 4),
(54, 12, 'C17101PIT6089', 54, 39, 1, 1, 4),
(55, 12, 'C17101PIT6089', 66, 39, 1, 1, 4),
(56, 12, 'C17101PIT6089', 63, 39, 1, 1, 4),
(57, 17, 'C17101PIT6089', 66, 39, 1, 4, 16),
(58, 17, 'C17101PIT6089', 73, 39, 1, 4, 16),
(59, 17, 'C17101PIT6089', 74, 39, 1, 4, 16),
(60, 17, 'C17101PIT6089', 61, 39, 1, 4, 16),
(61, 13, 'C17101PIT6089', 86, 34, 1, 4, 16),
(62, 13, 'C17101PIT6089', 100, 34, 1, 4, 16),
(63, 13, 'C17101PIT6089', 93, 34, 1, 4, 16),
(64, 13, 'C17101PIT6089', 89, 34, 1, 4, 16),
(65, 14, 'C17101PIT6089', 138, 35, 1, 3, 12),
(66, 14, 'C17101PIT6089', 134, 35, 1, 3, 12),
(67, 14, 'C17101PIT6089', 132, 35, 1, 3, 12),
(68, 14, 'C17101PIT6089', 142, 35, 1, 3, 12),
(69, 16, 'C17101PIT6089', 119, 44, 1, 4, 16),
(70, 16, 'C17101PIT6089', 106, 44, 1, 4, 16),
(71, 16, 'C17101PIT6089', 121, 44, 1, 4, 16),
(72, 16, 'C17101PIT6089', 124, 44, 1, 4, 16);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `questionID` int(11) NOT NULL,
  `question` varchar(250) DEFAULT NULL,
  `unitID` int(11) DEFAULT NULL,
  `subjectID` int(11) DEFAULT NULL,
  `course_code` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questionID`, `question`, `unitID`, `subjectID`, `course_code`, `createdDate`, `updateDate`) VALUES
(18, 'What is session in PHP. How to remove data from a session?', 1, 22, 'PIT', '2018-09-08 19:01:05', NULL),
(19, 'Is multiple inheritance supported in PHP?', 2, 22, 'PIT', '2018-09-08 19:01:19', NULL),
(20, ' What is the main difference between PHP 4 and PHP 5?', 3, 22, 'PIT', '2018-09-08 19:01:34', NULL),
(21, 'What is the correct and the most two common way to start and finish a PHP block of code?', 4, 22, 'PIT', '2018-09-08 19:01:48', NULL),
(22, 'What Is Meant By Pear In Php?', 5, 22, 'PIT', '2018-09-08 19:02:27', NULL),
(23, 'What is ASP.NET?', 1, 23, 'PIT', '2018-09-08 19:06:36', NULL),
(24, 'What is IIS?', 2, 23, 'PIT', '2018-09-08 19:06:57', NULL),
(25, ' What is a multilingual website?', 3, 23, 'PIT', '2018-09-08 19:07:13', NULL),
(26, 'what are the main requirements for caching?', 4, 23, 'PIT', '2018-09-08 19:07:26', NULL),
(27, 'What is the concept of Postback in ASP.NET?', 5, 23, 'PIT', '2018-09-08 19:07:38', NULL),
(28, 'Some qu for Unit 1', 1, 22, 'PIT', '2018-09-16 10:15:07', NULL),
(29, 'What is difference between echo() and print()', 1, 22, 'PIT', '2018-09-17 22:12:22', NULL),
(30, 'What is static methods and properties in PHP', 2, 22, 'PIT', '2018-09-17 22:12:48', NULL),
(31, 'What is ajax and how it is useful to us?', 3, 22, 'PIT', '2018-09-17 22:13:24', NULL),
(32, 'What are access control modifiers in php', 5, 22, 'PIT', '2018-09-17 22:13:45', NULL),
(33, 'How to get the names of all included and required files for a particular page in PHP', 5, 22, 'PIT', '2018-09-17 22:14:04', NULL),
(34, 'What is the syntax to send a mail in PHP', 1, 22, 'PIT', '2018-09-17 22:14:44', NULL),
(35, 'How can we get the first element of an array in php', 2, 22, 'PIT', '2018-09-17 22:15:08', NULL),
(36, ' Explain what is CodeIgniter?', 2, 22, 'PIT', '2018-09-17 22:30:28', NULL),
(37, 'what are the features of codeigniter?', 4, 22, 'PIT', '2018-09-17 22:30:52', NULL),
(38, ' Explain MVC in Codeigniter.\r\n', 5, 22, 'PIT', '2018-09-17 22:31:10', NULL),
(39, 'Why is there a need to configure the URL routes?', 2, 22, 'PIT', '2018-09-17 22:31:30', NULL),
(40, 'Explain codeigniter file structure.', 4, 22, 'PIT', '2018-09-17 22:31:45', NULL),
(41, 'What are the hooks in codeigniter?', 3, 22, 'PIT', '2018-09-17 22:32:20', NULL),
(42, ' Explain how you can link images/CSS/JavaScript from a view in code igniter?', 3, 22, 'PIT', '2018-09-17 22:32:33', NULL),
(43, ' Explain how you can prevent CodeIgniter from CSRF?in how you can link images/CSS/JavaScript from a view in code igniter?', 4, 22, 'PIT', '2018-09-17 22:32:45', NULL),
(44, 'Explain what is meant by routing in Codeigniter?', 4, 22, 'PIT', '2018-09-17 22:32:57', NULL),
(45, '. What Are The Most Prominent Features Of Codeigniter', 4, 22, 'PIT', '2018-09-20 21:27:23', NULL),
(46, 'How Can You Load A View In Codeigniter', 4, 22, 'PIT', '2018-09-20 21:27:54', NULL),
(47, 'What Is The Default Method Name In Codeigniter?', 2, 22, 'PIT', '2018-09-20 21:28:12', NULL),
(48, ' List out different types of hook point in Codeigniter?', 5, 22, 'PIT', '2018-09-20 21:28:46', NULL),
(49, '.Why is there a need to configure the URL routes?', 5, 22, 'PIT', '2018-09-20 21:29:06', NULL),
(50, ' What Is Stable Version Of Codeigniter?', 5, 22, 'PIT', '2018-09-20 21:29:29', NULL),
(51, 'Explain Application Flow Chart In Codeigniter?', 5, 22, 'PIT', '2018-09-20 21:30:05', NULL),
(52, ' Why Codeigniter Is Called As Loosely Based Mvc Framework?', 5, 22, 'PIT', '2018-09-20 21:31:29', NULL),
(53, 'What is synchronization and why is it important?', 1, 39, 'PIT', '2018-09-29 22:33:02', NULL),
(54, ' Explain public static void main(String args[])?', 1, 39, 'PIT', '2018-09-29 22:37:46', NULL),
(55, 'What is singleton class and how can we make a class singleton?', 2, 39, 'PIT', '2018-09-29 22:38:34', NULL),
(56, 'What invokes a thread\'s run() method?', 2, 39, 'PIT', '2018-09-29 22:38:54', NULL),
(57, 'What is the difference between the Boolean & operator and the && operator?', 3, 39, 'PIT', '2018-09-29 22:39:16', NULL),
(58, 'Which Container method is used to cause a container to be laid out and redisplayed?', 4, 39, 'PIT', '2018-09-29 22:39:35', NULL),
(59, 'What is the difference between equals() and == ?', 3, 39, 'PIT', '2018-09-29 22:39:59', NULL),
(61, ' What is runtime polymorphism or dynamic method dispatch?', 4, 39, 'PIT', '2018-09-29 22:41:37', NULL),
(62, 'What is the difference between abstract classes and interfaces?', 5, 39, 'PIT', '2018-09-29 22:41:51', NULL),
(63, 'Can you override a private or static method in Java?', 5, 39, 'PIT', '2018-09-29 22:42:06', NULL),
(64, 'What is multiple inheritance? Is it supported by Java?', 1, 39, 'PIT', '2018-09-29 22:47:55', NULL),
(65, 'What do you mean by aggregation?', 1, 39, 'PIT', '2018-09-29 22:48:08', NULL),
(66, 'What method must be implemented by all threads?', 1, 39, 'PIT', '2018-09-29 22:48:20', NULL),
(67, 'What is a servlet?', 2, 39, 'PIT', '2018-09-29 22:48:33', NULL),
(68, 'What is Request Dispatcher?', 2, 39, 'PIT', '2018-09-29 22:48:43', NULL),
(69, 'What are the differences between forward() method and sendRedirect() methods?', 2, 39, 'PIT', '2018-09-29 22:48:58', NULL),
(70, 'How does cookies work in Servlets?', 3, 39, 'PIT', '2018-09-29 22:50:38', NULL),
(71, 'What are the different methods of session management in servlets?', 3, 39, 'PIT', '2018-09-29 22:50:49', NULL),
(72, ' What is JDBC Driver?', 4, 39, 'PIT', '2018-09-29 22:51:06', NULL),
(73, 'What are the steps to connect to a database in java?', 4, 39, 'PIT', '2018-09-29 22:51:19', NULL),
(74, 'What is JDBC ResultSetMetaData interface?', 4, 39, 'PIT', '2018-09-29 22:51:39', NULL),
(75, ' What is the difference between execute, executeQuery, executeUpdate?', 4, 39, 'PIT', '2018-09-29 22:51:52', NULL),
(76, 'Name the different modules of the Spring framework.', 4, 39, 'PIT', '2018-09-29 22:52:01', NULL),
(77, 'Explain Bean in Spring and List the different Scopes of Spring bean.', 4, 39, 'PIT', '2018-09-29 22:52:12', NULL),
(78, 'Explain the role of DispatcherServlet and ContextLoaderListener?', 5, 39, 'PIT', '2018-09-29 22:52:46', NULL),
(79, 'What are the differences between constructor injection and setter injection?', 5, 39, 'PIT', '2018-09-29 22:52:58', NULL),
(80, 'What is Hibernate Framework?', 5, 39, 'PIT', '2018-09-29 22:53:12', NULL),
(81, 'What are the important benefits of using Hibernate Framework?', 5, 39, 'PIT', '2018-09-29 22:53:24', NULL),
(82, 'What are the advantages of Hibernate over JDBC?', 5, 39, 'PIT', '2018-09-29 22:53:35', NULL),
(83, 'What are the life-cycle methods for a jsp?', 2, 39, 'PIT', '2018-09-29 22:54:05', NULL),
(84, 'What are linear and non linear data Structures?\r\n\r\n', 1, 34, 'PIT', '2018-10-07 14:24:53', NULL),
(85, 'What are the various operations that can be performed on different Data Structures?\r\n\r\n', 1, 34, 'PIT', '2018-10-07 14:25:05', NULL),
(86, 'How is an Array different from Linked List?', 2, 34, 'PIT', '2018-10-07 14:25:32', NULL),
(87, 'What is Stack and where it can be used?\r\n\r\n', 2, 34, 'PIT', '2018-10-07 14:25:46', NULL),
(88, 'What is a Queue, how it is different from stack and how is it implemented?\r\n\r\n', 3, 34, 'PIT', '2018-10-07 14:25:58', NULL),
(89, 'What are Infix, prefix, Postfix notations?', 3, 34, 'PIT', '2018-10-07 14:26:12', NULL),
(90, 'What is a Linked List and What are its types?\r\n\r\n', 4, 34, 'PIT', '2018-10-07 14:26:29', NULL),
(91, 'Which data structures are used for BFS and DFS of a graph?\r\n\r\n', 4, 34, 'PIT', '2018-10-07 14:26:40', NULL),
(92, 'How to implement a queue using stack?', 5, 34, 'PIT', '2018-10-07 14:26:54', NULL),
(93, 'How to check if a given Binary Tree is BST or not?\r\n', 5, 34, 'PIT', '2018-10-07 14:27:04', NULL),
(94, 'Convert a DLL to Binary Tree in-place\r\n', 1, 34, 'PIT', '2018-10-07 14:34:31', NULL),
(95, 'Convert Binary Tree to DLL in-place\r\n', 2, 34, 'PIT', '2018-10-07 14:34:43', NULL),
(96, 'Which data structure is used for dictionary and spell checker?\r\n', 2, 34, 'PIT', '2018-10-07 14:34:55', NULL),
(97, 'List out the areas in which data structures are applied extensively?\r\n', 2, 34, 'PIT', '2018-10-07 14:35:58', NULL),
(98, 'What are the major data structures used in the following areas : RDBMS, Network data model and Hierarchical data model.\r\n', 3, 34, 'PIT', '2018-10-07 14:36:14', NULL),
(99, 'If you are using C language to implement the heterogeneous linked list, what pointer type will you use?\r\n', 4, 34, 'PIT', '2018-10-07 14:36:29', NULL),
(100, 'What is the data structures used to perform recursion?\r\n', 4, 34, 'PIT', '2018-10-07 14:36:43', NULL),
(101, 'Define Operating Systems and discuss its role from different perspectives. \r\n', 1, 44, 'PIT', '2018-10-07 15:48:13', NULL),
(102, ' Explain fundamental difference between i) N/w OS and distributed OS ii) web based and\r\nembedded computing.', 1, 44, 'PIT', '2018-10-07 15:48:36', NULL),
(103, 'What do you mean by cooperating process? Describe its four advantages.', 1, 44, 'PIT', '2018-10-07 15:48:53', NULL),
(104, 'What are the different categories of system programs? Explain. ', 1, 44, 'PIT', '2018-10-07 15:49:23', NULL),
(105, 'List out different services of Operating Systems and Explain', 1, 44, 'PIT', '2018-10-07 15:49:38', NULL),
(106, 'What do you mean by PCB? Where is it used? What are its contents? Explain.', 2, 44, 'PIT', '2018-10-07 15:49:57', NULL),
(107, ' Explain direct and indirect communications of message passing systems. ', 2, 44, 'PIT', '2018-10-07 15:50:10', NULL),
(108, 'Explain the difference between long term and short term and medium term schedulers.', 2, 44, 'PIT', '2018-10-07 15:50:23', NULL),
(109, 'What is a process? Draw and explain process state diagram. ', 2, 44, 'PIT', '2018-10-07 15:50:34', NULL),
(110, 'Define IPC. What are different methods used for logical implementations of message passing system', 2, 44, 'PIT', '2018-10-07 15:50:53', NULL),
(111, 'What are semaphores? Explain two primitive semaphore operations. What are its advantages? ', 3, 44, 'PIT', '2018-10-07 15:51:08', NULL),
(112, 'Explain any one synchronization problem for testing newly proposed sync scheme. ', 3, 44, 'PIT', '2018-10-07 15:51:18', NULL),
(113, 'Explain three requirements that a solution to critical–section problem must satisfy', 3, 44, 'PIT', '2018-10-07 15:51:30', NULL),
(114, 'State dining philosopher’s problem and give a solution using semaphores. Write structure of\r\nphilosopher', 3, 44, 'PIT', '2018-10-07 15:51:41', NULL),
(115, 'What do you mean by binary semaphore and counting semaphore? With C struct, explain\r\nimplementation of wait () and signal', 3, 44, 'PIT', '2018-10-07 15:51:52', NULL),
(116, ' Why is deadlock state more critical than starvation? Describe resource allocation graph with a\r\ndeadlock, with a cycle but no deadlock. ', 4, 44, 'PIT', '2018-10-07 15:52:06', NULL),
(117, 'What are two options for breaking deadlock? ', 4, 44, 'PIT', '2018-10-07 15:52:16', NULL),
(118, 'Solve the deadlock to find safe or unsafe state', 4, 44, 'PIT', '2018-10-07 15:52:28', NULL),
(119, 'Describe necessary conditions for a deadlock situation to arise. ', 4, 44, 'PIT', '2018-10-07 15:52:38', NULL),
(120, 'Explain different methods to handle deadlocks', 4, 44, 'PIT', '2018-10-07 15:52:49', NULL),
(121, 'What is paging and swapping? ', 5, 44, 'PIT', '2018-10-07 15:53:02', NULL),
(122, ' With a diagram discuss the steps involved in handling a page fault', 5, 44, 'PIT', '2018-10-07 15:53:15', NULL),
(123, ' What is address binding? Explain the concept of dynamic relocation of addresses', 5, 44, 'PIT', '2018-10-07 15:53:25', NULL),
(124, ' Define external fragmentation. What are the causes for external fragmentation?', 5, 44, 'PIT', '2018-10-07 15:53:34', NULL),
(125, 'What is paging? Explain the paging hardware?', 5, 44, 'PIT', '2018-10-07 15:53:45', NULL),
(126, 'What are Unicasting, Anycasting, Multiccasting and Broadcasting?\r\n', 1, 35, 'PIT', '2018-10-07 15:59:19', NULL),
(127, 'What are layers in OSI model?\r\n', 1, 35, 'PIT', '2018-10-07 15:59:30', NULL),
(128, 'What is Stop-and-Wait Protocol?\r\n', 1, 35, 'PIT', '2018-10-07 15:59:40', NULL),
(129, 'What is Piggybacking?\r\n', 1, 35, 'PIT', '2018-10-07 15:59:52', NULL),
(130, 'Differences between Hub, Switch and Router?\r\n\r\n', 1, 35, 'PIT', '2018-10-07 16:00:02', NULL),
(131, 'What is DHCP, how does it work?', 2, 35, 'PIT', '2018-10-07 16:00:16', NULL),
(132, 'What is ARP, how does it work?', 2, 35, 'PIT', '2018-10-07 16:00:25', NULL),
(133, 'What is Forwarding?', 2, 35, 'PIT', '2018-10-07 16:00:54', NULL),
(134, 'What is IP prefix?\r\n', 2, 35, 'PIT', '2018-10-07 16:01:09', NULL),
(135, 'What is traceroute?\r\n', 2, 35, 'PIT', '2018-10-07 16:01:31', NULL),
(136, 'How does traceroute make sure that a packet is dropped at i’th hop?\r\n', 3, 35, 'PIT', '2018-10-07 16:01:51', NULL),
(137, 'How is total time estimated?', 3, 35, 'PIT', '2018-10-07 16:02:05', NULL),
(138, 'What’s difference between The Internet and The Web ?', 3, 35, 'PIT', '2018-10-07 16:02:23', NULL),
(139, 'What’s difference between Linux and Android ?\r\n', 4, 35, 'PIT', '2018-10-07 16:02:53', NULL),
(140, 'What is data encapsulation?', 4, 35, 'PIT', '2018-10-07 16:04:25', NULL),
(141, 'What is the maximum length allowed for a UTP cable?', 4, 35, 'PIT', '2018-10-07 16:04:39', NULL),
(142, 'Briefly describe NAT.', 4, 35, 'PIT', '2018-10-07 16:04:54', NULL),
(143, 'What are different ways of securing a computer network?', 5, 35, 'PIT', '2018-10-07 16:05:08', NULL),
(144, 'What is NIC?', 5, 35, 'PIT', '2018-10-07 16:05:18', NULL),
(145, ' What is the importance of the OSI Physical Layer?', 5, 35, 'PIT', '2018-10-07 16:05:30', NULL),
(146, 'What is the function of the OSI Session Layer?', 5, 35, 'PIT', '2018-10-07 16:05:40', NULL),
(147, 'Why a database is called as relational database model?', 1, 43, 'PIT', '2018-10-07 16:08:27', NULL),
(148, 'What are entities and attributes referring to?', 1, 43, 'PIT', '2018-10-07 16:08:39', NULL),
(149, 'What do you understand by relation in relational database model?\r\n', 1, 43, 'PIT', '2018-10-07 16:08:50', NULL),
(150, 'Why domain is of high importance?', 1, 43, 'PIT', '2018-10-07 16:09:00', NULL),
(151, 'What is the difference between base and derived relation?', 1, 43, 'PIT', '2018-10-07 16:09:11', NULL),
(152, 'What are constraints in database?', 1, 43, 'PIT', '2018-10-07 16:09:23', NULL),
(153, 'What are the two principles of relational database model? What is the difference between them?\r\n', 2, 43, 'PIT', '2018-10-07 16:09:42', NULL),
(154, 'What is the difference between the primary and foreign key', 2, 43, 'PIT', '2018-10-07 16:10:00', NULL),
(155, 'What is an index represent in relational database model?\r\n', 2, 43, 'PIT', '2018-10-07 16:10:10', NULL),
(156, 'What are the relational operations that can be performed on the database?\r\n', 2, 43, 'PIT', '2018-10-07 16:10:19', NULL),
(157, 'What do you understand by database Normalization?\r\n', 3, 43, 'PIT', '2018-10-07 16:10:30', NULL),
(158, 'What are the different types of normalization that exists in the database?\r\n', 3, 43, 'PIT', '2018-10-07 16:10:41', NULL),
(159, 'How de-normalization is different from normalization?', 3, 43, 'PIT', '2018-10-07 16:10:51', NULL),
(160, 'What is the type of de-normalization?\r\n', 4, 43, 'PIT', '2018-10-07 16:11:44', NULL),
(161, 'How many levels of data abstraction are available?\r\n', 4, 43, 'PIT', '2018-10-07 16:11:54', NULL),
(162, 'What is the difference between extension and intension?\r\n', 4, 43, 'PIT', '2018-10-07 16:12:02', NULL),
(163, 'What do you understand by Data Independence?', 5, 43, 'PIT', '2018-10-07 16:12:13', NULL),
(164, 'How view is related to data independence?\r\n', 5, 43, 'PIT', '2018-10-07 16:12:21', NULL),
(165, 'What do you understand by cardinality and why it is used?\r\n', 5, 43, 'PIT', '2018-10-07 16:12:29', NULL),
(166, 'What is the difference between DBMS and RDBMS?\r\n', 5, 43, 'PIT', '2018-10-07 16:12:37', NULL),
(167, 'What do you understand by Data Independence?\r\n', 5, 43, 'PIT', '2018-10-07 16:12:50', NULL),
(168, 'How Do You Register A Component?', 1, 38, 'PIT', '2018-10-08 21:25:46', NULL),
(169, 'What Does Option Explicit Refer To?', 1, 38, 'PIT', '2018-10-08 21:26:06', NULL),
(170, 'What Are The Different Ways To Declare And Instantiate An Object In Visual Basic 6?', 1, 38, 'PIT', '2018-10-08 21:26:20', NULL),
(171, 'Name The Four Different Cursor Types In Ado And Describe Them Briefly?', 1, 38, 'PIT', '2018-10-08 21:26:35', NULL),
(172, ' Name The Four Different Locking Type In Ado And Describe Them Briefly?', 1, 38, 'PIT', '2018-10-08 21:26:50', NULL),
(173, ' Name The Four Different Locking Type In Ado And Describe Them Briefly?What Are The Ado Objects? Explain Them. Provide A Scenario Using Three Of Them To Return Data From A Database.', 3, 38, 'PIT', '2018-10-08 21:27:05', NULL),
(174, 'List Out Controls Which Does Not Have Events?', 2, 38, 'PIT', '2018-10-08 21:27:16', NULL),
(175, 'To Set The Command Button For Esc, Which Property Has To Be Changed ?', 2, 38, 'PIT', '2018-10-08 21:27:24', NULL),
(176, ' Early Binding Vs Late Binding - Define Them And Explain?', 2, 38, 'PIT', '2018-10-08 21:27:36', NULL),
(177, 'Can I Send Keystrokes To A Dos Application?', 2, 38, 'PIT', '2018-10-08 21:27:47', NULL),
(178, 'How Do I Make A Menu Popup From A Commandbutton', 3, 38, 'PIT', '2018-10-08 21:27:57', NULL),
(179, 'What Is Option Base Used For In Vb6 ?', 2, 38, 'PIT', '2018-10-08 21:28:44', NULL),
(180, 'Describe In Process And Out Of Process Component?\r\n', 3, 38, 'PIT', '2018-10-08 21:29:48', NULL),
(181, ' Under The Ado Command Object, What Collection Is Responsible For Input To Stored Procedures?', 3, 38, 'PIT', '2018-10-08 21:29:57', NULL),
(182, ' How May Type Of Controls Are Available In Vb6 ?', 3, 38, 'PIT', '2018-10-08 21:30:08', NULL),
(183, 'Describe Inprocess And Out Of Process ?', 3, 38, 'PIT', '2018-10-08 21:30:17', NULL),
(184, ' What Is The Difference Between A Function And A Sub (method) ?', 4, 38, 'PIT', '2018-10-08 21:30:34', NULL),
(185, 'What Are Different Types Of Recordset Available In Ado ?', 4, 38, 'PIT', '2018-10-08 21:30:42', NULL),
(186, ' What Is The Difference Between Listbox And Combo Box?', 4, 38, 'PIT', '2018-10-08 21:30:51', NULL),
(187, ' What Is The Object And Class?', 5, 38, 'PIT', '2018-10-08 21:31:03', NULL),
(188, 'How Objects On Different Threads Communicate With One Another?', 5, 38, 'PIT', '2018-10-08 21:31:14', NULL),
(189, ' What Is The Query Unload And Unload Event In Form?', 5, 38, 'PIT', '2018-10-08 21:31:23', NULL),
(190, 'What Are Different Locking Type Available In Ado.\r\n', 5, 38, 'PIT', '2018-10-08 21:31:33', NULL),
(191, 'What Is The Difference In Passing Values Byref Or Byval To A Procedure?\r\n', 5, 38, 'PIT', '2018-10-08 21:31:44', NULL),
(192, ' What Is Autoredraw Event Of Form And Picturebox ?', 4, 38, 'PIT', '2018-10-08 21:32:22', NULL),
(193, 'What Is The Difference In Passing Values Byref Or Byval To A Procedure?', 4, 38, 'PIT', '2018-10-08 21:32:42', NULL),
(194, 'Explain The Main Purpose Of An Operating System?', 1, 63, 'PCA', '2018-10-13 23:21:02', NULL),
(195, 'What Is Demand Paging?', 1, 63, 'PCA', '2018-10-13 23:21:19', NULL),
(196, 'What Are The Advantages Of A Multiprocessor System?', 1, 63, 'PCA', '2018-10-13 23:21:34', NULL),
(197, 'What Is Kernel?', 1, 63, 'PCA', '2018-10-13 23:21:46', NULL),
(198, 'What Are Real-time Systems?', 1, 63, 'PCA', '2018-10-13 23:21:56', NULL),
(199, 'What Is Virtual Memory?\r\n', 2, 63, 'PCA', '2018-10-13 23:22:14', NULL),
(200, ' Describe The Objective Of Multi Programming.?', 2, 63, 'PCA', '2018-10-13 23:22:28', NULL),
(201, 'What Are Time Sharing Systems?', 2, 63, 'PCA', '2018-10-13 23:22:41', NULL),
(202, ' What Is Smp?', 2, 63, 'PCA', '2018-10-13 23:22:51', NULL),
(203, ' How Are Server Systems Classified?', 2, 63, 'PCA', '2018-10-13 23:23:04', NULL),
(204, 'What Is Asymmetric Clustering?', 3, 63, 'PCA', '2018-10-13 23:23:24', NULL),
(205, ' What Is A Thread?', 3, 63, 'PCA', '2018-10-13 23:23:38', NULL),
(206, 'Give Some Benefits Of Multi Threaded Programming.?', 3, 63, 'PCA', '2018-10-13 23:23:49', NULL),
(207, ' Briefly Explain Fcfs.', 3, 63, 'PCA', '2018-10-13 23:24:03', NULL),
(208, 'What Is Rr Scheduling Algorithm?', 3, 63, 'PCA', '2018-10-13 23:24:15', NULL),
(209, ' What Necessary Conditions Can Lead To A Deadlock Situation In A System?', 4, 63, 'PCA', '2018-10-13 23:24:31', NULL),
(210, 'Enumerate The Different Raid Levels.', 4, 63, 'PCA', '2018-10-13 23:24:41', NULL),
(211, 'What Factors Determine Whether A Detection-algorithm Must Be Utilized In A Deadlock Avoidance System?', 4, 63, 'PCA', '2018-10-13 23:24:54', NULL),
(212, ' Differentiate Logical From Physical Address Space.?', 4, 63, 'PCA', '2018-10-13 23:25:07', NULL),
(213, 'How Does Dynamic Loading Aid In Better Memory Space Utilization?', 4, 63, 'PCA', '2018-10-13 23:25:21', NULL),
(214, 'What Are Overlays?', 4, 63, 'PCA', '2018-10-13 23:25:31', NULL),
(215, 'What Is The Basic Function Of Paging?\r\n', 5, 63, 'PCA', '2018-10-13 23:25:50', NULL),
(216, 'What Is Fragmentation?', 5, 63, 'PCA', '2018-10-13 23:25:59', NULL),
(217, ' How Does Swapping Result In Better Memory Management?', 5, 63, 'PCA', '2018-10-13 23:26:10', NULL),
(218, 'Give An Example Of A Process State.', 5, 63, 'PCA', '2018-10-13 23:26:22', NULL),
(219, 'What Is A Socket?', 5, 63, 'PCA', '2018-10-13 23:26:31', NULL),
(220, 'When Designing The File Structure For An Operating System, What Attributes Are Considered?\r\n', 3, 63, 'PCA', '2018-10-13 23:26:45', NULL),
(221, 'What are the supported platforms by Java Programming Language?', 1, 65, 'PCA', '2018-10-13 23:29:06', NULL),
(222, 'List any five features of Java?', 1, 65, 'PCA', '2018-10-13 23:29:20', NULL),
(223, 'Why is Java Architectural Neutral?', 1, 65, 'PCA', '2018-10-13 23:29:30', NULL),
(224, 'Why Java is considered dynamic?', 1, 65, 'PCA', '2018-10-13 23:29:45', NULL),
(225, 'How Java enabled High Performance?', 1, 65, 'PCA', '2018-10-13 23:30:09', NULL),
(226, 'Why Java is considered dynamic?', 2, 65, 'PCA', '2018-10-13 23:30:21', NULL),
(227, 'What is Java Virtual Machine and how it is considered in context of Java’s platform independent feature?', 2, 65, 'PCA', '2018-10-13 23:30:36', NULL),
(228, 'List two Java IDE’s?', 2, 65, 'PCA', '2018-10-13 23:30:48', NULL),
(229, 'List some Java keywords(unlike C, C++ keywords)?', 2, 65, 'PCA', '2018-10-13 23:30:58', NULL),
(230, 'What do you mean by Object?', 2, 65, 'PCA', '2018-10-13 23:31:08', NULL),
(231, 'Define class?', 2, 65, 'PCA', '2018-10-13 23:31:17', NULL),
(232, 'What kind of variables a class can consist of?\r\n', 3, 65, 'PCA', '2018-10-13 23:31:32', NULL),
(233, 'What is a Local Variable?', 3, 65, 'PCA', '2018-10-13 23:31:55', NULL),
(234, 'What is a Instance Variable?', 3, 65, 'PCA', '2018-10-13 23:32:03', NULL),
(235, 'What is a Class Variable?', 3, 65, 'PCA', '2018-10-13 23:32:14', NULL),
(236, 'What is Singleton class?', 3, 65, 'PCA', '2018-10-13 23:32:22', NULL),
(237, 'What do you mean by Constructor?', 3, 65, 'PCA', '2018-10-13 23:32:31', NULL),
(238, 'List the three steps for creating an Object for a class?', 4, 65, 'PCA', '2018-10-13 23:32:42', NULL),
(239, 'What is the default value of byte datatype in Java?', 4, 65, 'PCA', '2018-10-13 23:32:53', NULL),
(240, 'What is the default value of float and double datatype in Java?', 4, 65, 'PCA', '2018-10-13 23:33:02', NULL),
(241, 'When a byte datatype is used?', 4, 65, 'PCA', '2018-10-13 23:33:10', NULL),
(242, 'What is a static variable?', 4, 65, 'PCA', '2018-10-13 23:33:18', NULL),
(243, 'What do you mean by Access Modifier?', 4, 65, 'PCA', '2018-10-13 23:33:29', NULL),
(244, 'What is protected access modifier?', 4, 65, 'PCA', '2018-10-13 23:33:37', NULL),
(245, 'What do you mean by synchronized Non Access Modifier?', 4, 65, 'PCA', '2018-10-13 23:33:47', NULL),
(246, 'According to Java Operator precedence, which operator is considered to be with the highest precedence?', 5, 65, 'PCA', '2018-10-13 23:34:08', NULL),
(247, 'Variables used in a switch statement can be used with which datatypes?', 5, 65, 'PCA', '2018-10-13 23:34:21', NULL),
(248, 'When parseInt() method can be used?', 5, 65, 'PCA', '2018-10-13 23:34:32', NULL),
(249, 'Why is String class considered immutable?', 5, 65, 'PCA', '2018-10-13 23:34:40', NULL),
(250, 'Why is StringBuffer called mutable?', 5, 65, 'PCA', '2018-10-13 23:34:50', NULL),
(251, 'What is the difference between StringBuffer and StringBuilder class?', 5, 65, 'PCA', '2018-10-13 23:35:00', NULL),
(252, 'Which package is used for pattern matching with regular expressions?', 5, 65, 'PCA', '2018-10-13 23:35:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semesterID` int(11) NOT NULL,
  `semesterName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semesterID`, `semesterName`) VALUES
(1, 'Semester 1'),
(2, 'Semester 2'),
(3, 'Semester 3'),
(4, 'Semester 4'),
(5, 'Semester 5'),
(6, 'Semester 6');

-- --------------------------------------------------------

--
-- Table structure for table `staffmaster`
--

CREATE TABLE `staffmaster` (
  `staffID` int(11) NOT NULL,
  `staffName` varchar(100) DEFAULT NULL,
  `staffCode` varchar(50) DEFAULT NULL,
  `staffEmail` varchar(100) DEFAULT NULL,
  `staffMobNo` varchar(12) DEFAULT NULL,
  `collegeName` varchar(250) DEFAULT NULL,
  `staffAddress` varchar(250) DEFAULT NULL,
  `staffPassword` varchar(20) NOT NULL DEFAULT '12345678',
  `staffImage` varchar(100) DEFAULT NULL,
  `createdDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffmaster`
--

INSERT INTO `staffmaster` (`staffID`, `staffName`, `staffCode`, `staffEmail`, `staffMobNo`, `collegeName`, `staffAddress`, `staffPassword`, `staffImage`, `createdDate`, `updatedAt`) VALUES
(1, 'Naveen', 'ANK', 'naveen@gmail.com', '7338778938', 'Gurunanak College', 'vvm lane', '12345678', 'noImg.png', '2018-08-30 21:18:47', '2018-10-07 07:25:06'),
(5, 'Sekhar', 'SM', 'sekhar@gmail.com', '7092808028', 'IDE', 'chepauk', '12345678', 'noImg.png', '2018-08-09 23:55:40', '2018-10-07 07:34:46'),
(6, 'Vignesh', 'vk', 'vignesh54@gmail.com', '8438433987', 'New College', 'velacherry', '12345678', 'noImg.png', '2018-08-30 21:15:07', '2018-10-07 07:33:38'),
(10, 'Sreenivasan', 'sree', 'sreenivasan@gmail.com', '7092804646', 'Vivekanda', 'Mylapore', '12345678', 'noImg.png', '2018-08-26 18:40:38', '2018-10-07 07:34:58'),
(11, 'Sasikala', 'ss', 'sasilakarams@gmail.com', '9677209439', 'Madras University', 'Navalar Nagar, Chepauk, Triplicane, Chennai, Tamil Nadu 600005', '12345678', 'noImg.png', '2018-09-29 22:28:19', '2018-10-07 07:30:39'),
(12, 'Mathivanan', 'SM', 'Mathivanan@gmail.com', '8392838848', 'IDE Madras ', 'Chepauk', '12345678', 'noImg.png', '2018-10-07 11:12:20', '2018-10-07 07:42:43'),
(13, 'Venkata Krishnan', 'VK', 'venkataKrish@gmail.com', '9551098988', 'Anna university', 'Guindy', '12345678', 'noImg.png', '2018-10-07 11:19:33', '0000-00-00 00:00:00'),
(14, 'Sureshbabu', 'SB', 'sureshbabu.ask@gmail.com', '7092908987', 'Rama Krishna mission vivekanada college', 'Mylapore', '12345678', 'noImg.png', '2018-10-07 11:20:26', '2018-10-07 07:50:42'),
(15, 'Radhakrishnan', 'RK', 'radhakrishnan68@gmail.com', '9100720188', 'New College', 'Royapettai', '12345678', 'noImg.png', '2018-10-07 11:21:38', '0000-00-00 00:00:00'),
(16, 'Jayapriyan', 'jp', 'Jayapriyan@gmail.com', '9551124107', 'New College', 'royapuram', '12345678', 'noImg.png', '2018-10-07 11:23:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staffs_courses`
--

CREATE TABLE `staffs_courses` (
  `staffID` int(11) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `subjectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs_courses`
--

INSERT INTO `staffs_courses` (`staffID`, `course_code`, `subjectID`) VALUES
(6, 'PIT', 39),
(6, 'PIT', 35),
(1, 'PIT', 39),
(1, 'PIT', 34),
(1, 'PIT', 36),
(1, 'PIT', 35),
(1, 'PIT', 43),
(1, 'PIT', 44),
(1, 'PIT', 45),
(1, 'UMA', 47);

-- --------------------------------------------------------

--
-- Table structure for table `staffs_students`
--

CREATE TABLE `staffs_students` (
  `staffID` int(11) NOT NULL,
  `batchID` int(11) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `enroll_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs_students`
--

INSERT INTO `staffs_students` (`staffID`, `batchID`, `course_code`, `subjectID`, `enroll_no`) VALUES
(1, 2, 'PIT', 22, 'C17101PIT6089'),
(1, 2, 'PIT', 22, 'C17101PIT6095'),
(1, 2, 'PIT', 22, 'C17101PIT6090'),
(11, 2, 'PIT', 39, 'C17101PIT6095'),
(11, 2, 'PIT', 39, 'C17101PIT6090'),
(11, 2, 'PIT', 39, 'C17101PIT6091'),
(11, 2, 'PIT', 39, 'C17101PIT6104'),
(11, 2, 'PIT', 39, 'C17101PIT6105'),
(6, 2, 'PIT', 41, 'C17101PIT6089'),
(6, 2, 'PIT', 41, 'C17101PIT6095'),
(6, 2, 'PIT', 41, 'C17101PIT6091'),
(6, 2, 'PIT', 41, 'C17101PIT6107'),
(6, 2, 'PIT', 41, 'C17101PIT6107'),
(6, 2, 'PIT', 41, 'C17101PIT6106');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `enroll_no` varchar(50) DEFAULT NULL,
  `date_of_birth` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `course_code` varchar(10) DEFAULT NULL,
  `course_medium` varchar(10) DEFAULT NULL,
  `pcp_center_code` varchar(10) DEFAULT NULL,
  `study_center_code` varchar(10) DEFAULT NULL,
  `address1` varchar(20) DEFAULT NULL,
  `address2` varchar(20) DEFAULT NULL,
  `address3` varchar(20) DEFAULT NULL,
  `address4` varchar(20) DEFAULT NULL,
  `state` varchar(10) DEFAULT NULL,
  `pin_code` varchar(10) DEFAULT NULL,
  `nation` varchar(10) DEFAULT NULL,
  `religion` varchar(10) DEFAULT NULL,
  `caste` varchar(10) DEFAULT NULL,
  `category` varchar(10) DEFAULT NULL,
  `regionv` varchar(10) DEFAULT NULL,
  `physical_disability` varchar(10) DEFAULT NULL,
  `phone_number` varchar(10) DEFAULT NULL,
  `mobile_number` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `student_name_tamil` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`enroll_no`, `date_of_birth`, `name`, `sex`, `course_code`, `course_medium`, `pcp_center_code`, `study_center_code`, `address1`, `address2`, `address3`, `address4`, `state`, `pin_code`, `nation`, `religion`, `caste`, `category`, `regionv`, `physical_disability`, `phone_number`, `mobile_number`, `email`, `student_name_tamil`) VALUES
('C17101PIT6089', '1996-09-09', 'suresh', 'Male', 'PIT', 'English', '101', '101', 'address1', 'address2', 'address3', 'address4', 'Tamil Nadu', '600001', 'Indian', 'Hindu', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '7092804642', 'sureshkumar20141@gmail.com ', 'suresh'),
('C17101PIT6095', '1996-08-11', 'ganesh', 'Male', 'PIT', 'English', '101', '101', 'address1', 'address2', 'address3', 'address4', 'Tamil Nadu', '600001', 'Indian', 'Hindu', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '1231231231', 'ganesh@gmail.com ', 'ganesh'),
('C17101PIT6090', '1996-09-09', 'vignesh', 'Male', 'PIT', 'English', '101', '101', 'address1', 'address2', 'address3', 'address4', 'Tamil Nadu', '600001', 'Indian', 'Hindu', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '7092804642', 'vignesh@gmail.com ', 'vignesh'),
('C17101PIT6091', '1996-08-11', 'ramesh', 'Male', 'PIT', 'English', '101', '101', 'address1', 'address2', 'address3', 'address4', 'Tamil Nadu', '600001', 'Indian', 'Hindu', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '1231231231', 'ramesh@gmail.com ', 'ramesh'),
('C17101PIT6104', '10/09/1994st', 'Prem Chander', 'Male', 'PIT', 'E', '101', '101', 'test', 'test', 'test', 'test', 'Tamilnadu', '600001', 'India', 'Hindu', 'BC', NULL, NULL, NULL, NULL, NULL, 'prem@gmail.com', 'prem'),
('C17101PIT6105', '10/10/1995', 'vignesh kumar', 'Male', 'PIT', 'E', '101', '101', 'Some', 'Some', 'some', 'some', 'Tamilnadu', '600001', 'India', 'Hindu', 'BC', NULL, NULL, NULL, NULL, NULL, 'vigneshkumar@gmail.com', NULL),
('C17101PIT6106', '10/09/1994st', 'pavan', 'Male', 'PIT', 'E', '101', '101', 'test', 'test', 'test', 'test', 'Tamilnadu', '600001', 'India', 'Hindu', 'BC', NULL, NULL, NULL, NULL, NULL, 'pavan@gmail.com', 'pavan'),
('C17101PIT6107', '10/10/1995', 'jisha', 'Male', 'PIT', 'E', '101', '101', 'Some', 'Some', 'some', 'some', 'Tamilnadu', '600001', 'India', 'Hindu', 'BC', NULL, NULL, NULL, NULL, NULL, 'jisha@gmail.com', NULL),
('C17101PIT6107', '10/09/1994st', 'madan', 'Male', 'PIT', 'E', '101', '101', 'test', 'test', 'test', 'test', 'Tamilnadu', '600001', 'India', 'Hindu', 'BC', NULL, NULL, NULL, NULL, NULL, 'madan@gmail.com', 'pavan'),
('C17101PIT6108', '10/10/1995', 'ponnuswami', 'Male', 'PIT', 'E', '101', '101', 'Some', 'Some', 'some', 'some', 'Tamilnadu', '600001', 'India', 'Hindu', 'BC', NULL, NULL, NULL, NULL, NULL, 'ponnuswami@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_assignment`
--

CREATE TABLE `student_assignment` (
  `ID` int(11) NOT NULL,
  `assignmentID` int(11) NOT NULL,
  `enroll_no` varchar(50) DEFAULT NULL,
  `batchID` int(11) DEFAULT NULL,
  `course_code` varchar(20) DEFAULT NULL,
  `subjectID` int(11) DEFAULT NULL,
  `questionID` int(11) DEFAULT NULL,
  `noOfQuesAttended` int(11) NOT NULL,
  `noOfPages` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `filename` varchar(250) DEFAULT NULL,
  `assignViewDate` datetime NOT NULL,
  `assignSubmitDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_assignment`
--

INSERT INTO `student_assignment` (`ID`, `assignmentID`, `enroll_no`, `batchID`, `course_code`, `subjectID`, `questionID`, `noOfQuesAttended`, `noOfPages`, `status`, `filename`, `assignViewDate`, `assignSubmitDate`) VALUES
(695, 13, 'C17101PIT6089', 2, 'PIT', 34, 86, 4, 4, 'Published', 'C17101PIT6089ganeshMscIT Result.pdf', '2018-11-15 21:00:39', '2018-11-15 00:00:00'),
(696, 13, 'C17101PIT6089', 2, 'PIT', 34, 100, 4, 4, 'Published', 'C17101PIT6089ganeshMscIT Result.pdf', '2018-11-15 21:00:39', '2018-11-15 00:00:00'),
(697, 13, 'C17101PIT6089', 2, 'PIT', 34, 93, 4, 4, 'Published', 'C17101PIT6089ganeshMscIT Result.pdf', '2018-11-15 21:00:39', '2018-11-15 00:00:00'),
(698, 13, 'C17101PIT6089', 2, 'PIT', 34, 89, 4, 4, 'Published', 'C17101PIT6089ganeshMscIT Result.pdf', '2018-11-15 21:00:39', '2018-11-15 00:00:00'),
(699, 13, 'C17101PIT6095', 2, 'PIT', 34, 93, 4, 3, 'Submitted', 'C17101PIT6095formScreenshots.pdf', '2018-11-15 21:49:24', '2018-11-17 21:49:24'),
(700, 13, 'C17101PIT6095', 2, 'PIT', 34, 87, 4, 3, 'Submitted', 'C17101PIT6095formScreenshots.pdf', '2018-11-15 21:49:24', '2018-11-17 21:49:24'),
(701, 13, 'C17101PIT6095', 2, 'PIT', 34, 92, 4, 3, 'Submitted', 'C17101PIT6095formScreenshots.pdf', '2018-11-15 21:49:24', '2018-11-17 21:49:24'),
(702, 13, 'C17101PIT6095', 2, 'PIT', 34, 100, 4, 3, 'Submitted', 'C17101PIT6095formScreenshots.pdf', '2018-11-15 21:49:24', '2018-11-17 21:49:24'),
(703, 13, 'C17101PIT6090', 2, 'PIT', 34, 90, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(704, 13, 'C17101PIT6090', 2, 'PIT', 34, 95, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(705, 13, 'C17101PIT6090', 2, 'PIT', 34, 91, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(706, 13, 'C17101PIT6090', 2, 'PIT', 34, 93, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(707, 13, 'C17101PIT6091', 2, 'PIT', 34, 90, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(708, 13, 'C17101PIT6091', 2, 'PIT', 34, 89, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(709, 13, 'C17101PIT6091', 2, 'PIT', 34, 97, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(710, 13, 'C17101PIT6091', 2, 'PIT', 34, 85, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(711, 13, 'C17101PIT6104', 2, 'PIT', 34, 95, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(712, 13, 'C17101PIT6104', 2, 'PIT', 34, 98, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(713, 13, 'C17101PIT6104', 2, 'PIT', 34, 87, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(714, 13, 'C17101PIT6104', 2, 'PIT', 34, 91, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(715, 13, 'C17101PIT6105', 2, 'PIT', 34, 91, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(716, 13, 'C17101PIT6105', 2, 'PIT', 34, 85, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(717, 13, 'C17101PIT6105', 2, 'PIT', 34, 88, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(718, 13, 'C17101PIT6105', 2, 'PIT', 34, 87, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(719, 13, 'C17101PIT6106', 2, 'PIT', 34, 100, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(720, 13, 'C17101PIT6106', 2, 'PIT', 34, 87, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(721, 13, 'C17101PIT6106', 2, 'PIT', 34, 93, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(722, 13, 'C17101PIT6106', 2, 'PIT', 34, 97, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(723, 13, 'C17101PIT6107', 2, 'PIT', 34, 89, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(724, 13, 'C17101PIT6107', 2, 'PIT', 34, 99, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(725, 13, 'C17101PIT6107', 2, 'PIT', 34, 86, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(726, 13, 'C17101PIT6107', 2, 'PIT', 34, 92, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(727, 13, 'C17101PIT6107', 2, 'PIT', 34, 87, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(728, 13, 'C17101PIT6107', 2, 'PIT', 34, 94, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(729, 13, 'C17101PIT6107', 2, 'PIT', 34, 98, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(730, 13, 'C17101PIT6107', 2, 'PIT', 34, 88, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(731, 13, 'C17101PIT6108', 2, 'PIT', 34, 93, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(732, 13, 'C17101PIT6108', 2, 'PIT', 34, 94, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(733, 13, 'C17101PIT6108', 2, 'PIT', 34, 84, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(734, 13, 'C17101PIT6108', 2, 'PIT', 34, 85, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(735, 14, 'C17101PIT6089', 2, 'PIT', 35, 138, 4, 4, 'Published', 'C17101PIT6089Hall ticket.pdf', '2018-11-15 21:02:09', '2018-11-17 21:02:09'),
(736, 14, 'C17101PIT6089', 2, 'PIT', 35, 134, 4, 4, 'Published', 'C17101PIT6089Hall ticket.pdf', '2018-11-15 21:02:09', '2018-11-17 21:02:09'),
(737, 14, 'C17101PIT6089', 2, 'PIT', 35, 132, 4, 4, 'Published', 'C17101PIT6089Hall ticket.pdf', '2018-11-15 21:02:09', '2018-11-17 21:02:09'),
(738, 14, 'C17101PIT6089', 2, 'PIT', 35, 142, 4, 4, 'Published', 'C17101PIT6089Hall ticket.pdf', '2018-11-15 21:02:09', '2018-11-17 21:02:09'),
(739, 14, 'C17101PIT6095', 2, 'PIT', 35, 140, 0, 0, 'Assigned', NULL, '2018-11-15 21:49:31', '2018-11-17 21:49:31'),
(740, 14, 'C17101PIT6095', 2, 'PIT', 35, 127, 0, 0, 'Assigned', NULL, '2018-11-15 21:49:31', '2018-11-17 21:49:31'),
(741, 14, 'C17101PIT6095', 2, 'PIT', 35, 139, 0, 0, 'Assigned', NULL, '2018-11-15 21:49:31', '2018-11-17 21:49:31'),
(742, 14, 'C17101PIT6095', 2, 'PIT', 35, 133, 0, 0, 'Assigned', NULL, '2018-11-15 21:49:31', '2018-11-17 21:49:31'),
(743, 14, 'C17101PIT6090', 2, 'PIT', 35, 141, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(744, 14, 'C17101PIT6090', 2, 'PIT', 35, 135, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(745, 14, 'C17101PIT6090', 2, 'PIT', 35, 130, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(746, 14, 'C17101PIT6090', 2, 'PIT', 35, 136, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(747, 14, 'C17101PIT6091', 2, 'PIT', 35, 130, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(748, 14, 'C17101PIT6091', 2, 'PIT', 35, 140, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(749, 14, 'C17101PIT6091', 2, 'PIT', 35, 138, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(750, 14, 'C17101PIT6091', 2, 'PIT', 35, 134, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(751, 14, 'C17101PIT6104', 2, 'PIT', 35, 128, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(752, 14, 'C17101PIT6104', 2, 'PIT', 35, 132, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(753, 14, 'C17101PIT6104', 2, 'PIT', 35, 133, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(754, 14, 'C17101PIT6104', 2, 'PIT', 35, 131, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(755, 14, 'C17101PIT6105', 2, 'PIT', 35, 130, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(756, 14, 'C17101PIT6105', 2, 'PIT', 35, 133, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(757, 14, 'C17101PIT6105', 2, 'PIT', 35, 128, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(758, 14, 'C17101PIT6105', 2, 'PIT', 35, 134, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(759, 14, 'C17101PIT6106', 2, 'PIT', 35, 131, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(760, 14, 'C17101PIT6106', 2, 'PIT', 35, 142, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(761, 14, 'C17101PIT6106', 2, 'PIT', 35, 140, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(762, 14, 'C17101PIT6106', 2, 'PIT', 35, 132, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(763, 14, 'C17101PIT6107', 2, 'PIT', 35, 136, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(764, 14, 'C17101PIT6107', 2, 'PIT', 35, 144, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(765, 14, 'C17101PIT6107', 2, 'PIT', 35, 146, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(766, 14, 'C17101PIT6107', 2, 'PIT', 35, 142, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(767, 14, 'C17101PIT6107', 2, 'PIT', 35, 134, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(768, 14, 'C17101PIT6107', 2, 'PIT', 35, 140, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(769, 14, 'C17101PIT6107', 2, 'PIT', 35, 133, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(770, 14, 'C17101PIT6107', 2, 'PIT', 35, 127, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(771, 14, 'C17101PIT6108', 2, 'PIT', 35, 135, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(772, 14, 'C17101PIT6108', 2, 'PIT', 35, 138, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(773, 14, 'C17101PIT6108', 2, 'PIT', 35, 139, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(774, 14, 'C17101PIT6108', 2, 'PIT', 35, 127, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(775, 15, 'C17101PIT6089', 2, 'PIT', 38, 190, 4, 4, 'Submitted', 'C17101PIT6089INDIAN BANK - PRINT RECEIPT.pdf', '2018-11-15 21:44:30', '2018-11-17 21:44:30'),
(776, 15, 'C17101PIT6089', 2, 'PIT', 38, 176, 4, 4, 'Submitted', 'C17101PIT6089INDIAN BANK - PRINT RECEIPT.pdf', '2018-11-15 21:44:30', '2018-11-17 21:44:30'),
(777, 15, 'C17101PIT6089', 2, 'PIT', 38, 172, 4, 4, 'Submitted', 'C17101PIT6089INDIAN BANK - PRINT RECEIPT.pdf', '2018-11-15 21:44:30', '2018-11-17 21:44:30'),
(778, 15, 'C17101PIT6089', 2, 'PIT', 38, 192, 4, 4, 'Submitted', 'C17101PIT6089INDIAN BANK - PRINT RECEIPT.pdf', '2018-11-15 21:44:30', '2018-11-17 21:44:30'),
(779, 15, 'C17101PIT6095', 2, 'PIT', 38, 180, 0, 0, 'Assigned', NULL, '2018-11-15 21:49:34', '2018-11-17 21:49:34'),
(780, 15, 'C17101PIT6095', 2, 'PIT', 38, 174, 0, 0, 'Assigned', NULL, '2018-11-15 21:49:34', '2018-11-17 21:49:34'),
(781, 15, 'C17101PIT6095', 2, 'PIT', 38, 168, 0, 0, 'Assigned', NULL, '2018-11-15 21:49:34', '2018-11-17 21:49:34'),
(782, 15, 'C17101PIT6095', 2, 'PIT', 38, 179, 0, 0, 'Assigned', NULL, '2018-11-15 21:49:34', '2018-11-17 21:49:34'),
(783, 15, 'C17101PIT6090', 2, 'PIT', 38, 187, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(784, 15, 'C17101PIT6090', 2, 'PIT', 38, 173, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(785, 15, 'C17101PIT6090', 2, 'PIT', 38, 184, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(786, 15, 'C17101PIT6090', 2, 'PIT', 38, 175, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(787, 15, 'C17101PIT6091', 2, 'PIT', 38, 189, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(788, 15, 'C17101PIT6091', 2, 'PIT', 38, 171, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(789, 15, 'C17101PIT6091', 2, 'PIT', 38, 187, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(790, 15, 'C17101PIT6091', 2, 'PIT', 38, 173, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(791, 15, 'C17101PIT6104', 2, 'PIT', 38, 173, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(792, 15, 'C17101PIT6104', 2, 'PIT', 38, 186, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(793, 15, 'C17101PIT6104', 2, 'PIT', 38, 193, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(794, 15, 'C17101PIT6104', 2, 'PIT', 38, 183, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(795, 15, 'C17101PIT6105', 2, 'PIT', 38, 185, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(796, 15, 'C17101PIT6105', 2, 'PIT', 38, 169, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(797, 15, 'C17101PIT6105', 2, 'PIT', 38, 186, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(798, 15, 'C17101PIT6105', 2, 'PIT', 38, 191, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(799, 15, 'C17101PIT6106', 2, 'PIT', 38, 178, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(800, 15, 'C17101PIT6106', 2, 'PIT', 38, 186, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(801, 15, 'C17101PIT6106', 2, 'PIT', 38, 182, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(802, 15, 'C17101PIT6106', 2, 'PIT', 38, 168, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(803, 15, 'C17101PIT6107', 2, 'PIT', 38, 174, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(804, 15, 'C17101PIT6107', 2, 'PIT', 38, 187, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(805, 15, 'C17101PIT6107', 2, 'PIT', 38, 177, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(806, 15, 'C17101PIT6107', 2, 'PIT', 38, 183, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(807, 15, 'C17101PIT6107', 2, 'PIT', 38, 172, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(808, 15, 'C17101PIT6107', 2, 'PIT', 38, 175, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(809, 15, 'C17101PIT6107', 2, 'PIT', 38, 173, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(810, 15, 'C17101PIT6107', 2, 'PIT', 38, 177, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(811, 15, 'C17101PIT6108', 2, 'PIT', 38, 191, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(812, 15, 'C17101PIT6108', 2, 'PIT', 38, 172, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(813, 15, 'C17101PIT6108', 2, 'PIT', 38, 179, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(814, 15, 'C17101PIT6108', 2, 'PIT', 38, 183, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(815, 16, 'C17101PIT6089', 2, 'PIT', 44, 119, 4, 4, 'Published', 'C17101PIT6089sureshMscResult.pdf', '2018-11-15 21:45:51', '2018-11-17 21:45:51'),
(816, 16, 'C17101PIT6089', 2, 'PIT', 44, 106, 4, 4, 'Published', 'C17101PIT6089sureshMscResult.pdf', '2018-11-15 21:45:51', '2018-11-17 21:45:51'),
(817, 16, 'C17101PIT6089', 2, 'PIT', 44, 121, 4, 4, 'Published', 'C17101PIT6089sureshMscResult.pdf', '2018-11-15 21:45:51', '2018-11-17 21:45:51'),
(818, 16, 'C17101PIT6089', 2, 'PIT', 44, 124, 4, 4, 'Published', 'C17101PIT6089sureshMscResult.pdf', '2018-11-15 21:45:51', '2018-11-17 21:45:51'),
(819, 16, 'C17101PIT6095', 2, 'PIT', 44, 109, 0, 0, 'Assigned', NULL, '2018-11-15 21:49:37', '2018-11-17 21:49:37'),
(820, 16, 'C17101PIT6095', 2, 'PIT', 44, 107, 0, 0, 'Assigned', NULL, '2018-11-15 21:49:37', '2018-11-17 21:49:37'),
(821, 16, 'C17101PIT6095', 2, 'PIT', 44, 122, 0, 0, 'Assigned', NULL, '2018-11-15 21:49:37', '2018-11-17 21:49:37'),
(822, 16, 'C17101PIT6095', 2, 'PIT', 44, 101, 0, 0, 'Assigned', NULL, '2018-11-15 21:49:37', '2018-11-17 21:49:37'),
(823, 16, 'C17101PIT6090', 2, 'PIT', 44, 116, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(824, 16, 'C17101PIT6090', 2, 'PIT', 44, 108, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(825, 16, 'C17101PIT6090', 2, 'PIT', 44, 124, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(826, 16, 'C17101PIT6090', 2, 'PIT', 44, 106, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(827, 16, 'C17101PIT6091', 2, 'PIT', 44, 105, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(828, 16, 'C17101PIT6091', 2, 'PIT', 44, 108, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(829, 16, 'C17101PIT6091', 2, 'PIT', 44, 123, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(830, 16, 'C17101PIT6091', 2, 'PIT', 44, 104, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(831, 16, 'C17101PIT6104', 2, 'PIT', 44, 114, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(832, 16, 'C17101PIT6104', 2, 'PIT', 44, 106, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(833, 16, 'C17101PIT6104', 2, 'PIT', 44, 102, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(834, 16, 'C17101PIT6104', 2, 'PIT', 44, 122, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(835, 16, 'C17101PIT6105', 2, 'PIT', 44, 115, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(836, 16, 'C17101PIT6105', 2, 'PIT', 44, 110, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(837, 16, 'C17101PIT6105', 2, 'PIT', 44, 114, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(838, 16, 'C17101PIT6105', 2, 'PIT', 44, 108, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(839, 16, 'C17101PIT6106', 2, 'PIT', 44, 115, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(840, 16, 'C17101PIT6106', 2, 'PIT', 44, 114, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(841, 16, 'C17101PIT6106', 2, 'PIT', 44, 113, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(842, 16, 'C17101PIT6106', 2, 'PIT', 44, 105, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(843, 16, 'C17101PIT6107', 2, 'PIT', 44, 117, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(844, 16, 'C17101PIT6107', 2, 'PIT', 44, 108, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(845, 16, 'C17101PIT6107', 2, 'PIT', 44, 125, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(846, 16, 'C17101PIT6107', 2, 'PIT', 44, 118, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(847, 16, 'C17101PIT6107', 2, 'PIT', 44, 115, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(848, 16, 'C17101PIT6107', 2, 'PIT', 44, 118, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(849, 16, 'C17101PIT6107', 2, 'PIT', 44, 113, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(850, 16, 'C17101PIT6107', 2, 'PIT', 44, 120, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(851, 16, 'C17101PIT6108', 2, 'PIT', 44, 117, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(852, 16, 'C17101PIT6108', 2, 'PIT', 44, 114, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(853, 16, 'C17101PIT6108', 2, 'PIT', 44, 108, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(854, 16, 'C17101PIT6108', 2, 'PIT', 44, 107, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(855, 17, 'C17101PIT6089', 2, 'PIT', 39, 66, 4, 4, 'Published', 'C17101PIT6089usbInvoice.pdf', '2018-11-15 21:47:37', '2018-11-17 21:47:37'),
(856, 17, 'C17101PIT6089', 2, 'PIT', 39, 73, 4, 4, 'Published', 'C17101PIT6089usbInvoice.pdf', '2018-11-15 21:47:37', '2018-11-17 21:47:37'),
(857, 17, 'C17101PIT6089', 2, 'PIT', 39, 74, 4, 4, 'Published', 'C17101PIT6089usbInvoice.pdf', '2018-11-15 21:47:37', '2018-11-17 21:47:37'),
(858, 17, 'C17101PIT6089', 2, 'PIT', 39, 61, 4, 4, 'Published', 'C17101PIT6089usbInvoice.pdf', '2018-11-15 21:47:37', '2018-11-17 21:47:37'),
(859, 17, 'C17101PIT6095', 2, 'PIT', 39, 74, 0, 0, 'Assigned', NULL, '2018-11-15 21:49:39', '2018-11-17 21:49:39'),
(860, 17, 'C17101PIT6095', 2, 'PIT', 39, 53, 0, 0, 'Assigned', NULL, '2018-11-15 21:49:39', '2018-11-17 21:49:39'),
(861, 17, 'C17101PIT6095', 2, 'PIT', 39, 77, 0, 0, 'Assigned', NULL, '2018-11-15 21:49:39', '2018-11-17 21:49:39'),
(862, 17, 'C17101PIT6095', 2, 'PIT', 39, 80, 0, 0, 'Assigned', NULL, '2018-11-15 21:49:39', '2018-11-17 21:49:39'),
(863, 17, 'C17101PIT6090', 2, 'PIT', 39, 74, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(864, 17, 'C17101PIT6090', 2, 'PIT', 39, 75, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(865, 17, 'C17101PIT6090', 2, 'PIT', 39, 73, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(866, 17, 'C17101PIT6090', 2, 'PIT', 39, 67, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(867, 17, 'C17101PIT6091', 2, 'PIT', 39, 55, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(868, 17, 'C17101PIT6091', 2, 'PIT', 39, 56, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(869, 17, 'C17101PIT6091', 2, 'PIT', 39, 83, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(870, 17, 'C17101PIT6091', 2, 'PIT', 39, 76, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(871, 17, 'C17101PIT6104', 2, 'PIT', 39, 53, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(872, 17, 'C17101PIT6104', 2, 'PIT', 39, 83, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(873, 17, 'C17101PIT6104', 2, 'PIT', 39, 73, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(874, 17, 'C17101PIT6104', 2, 'PIT', 39, 78, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(875, 17, 'C17101PIT6105', 2, 'PIT', 39, 59, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(876, 17, 'C17101PIT6105', 2, 'PIT', 39, 75, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(877, 17, 'C17101PIT6105', 2, 'PIT', 39, 61, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(878, 17, 'C17101PIT6105', 2, 'PIT', 39, 82, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(879, 17, 'C17101PIT6106', 2, 'PIT', 39, 53, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(880, 17, 'C17101PIT6106', 2, 'PIT', 39, 61, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(881, 17, 'C17101PIT6106', 2, 'PIT', 39, 57, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(882, 17, 'C17101PIT6106', 2, 'PIT', 39, 58, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(883, 17, 'C17101PIT6107', 2, 'PIT', 39, 62, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(884, 17, 'C17101PIT6107', 2, 'PIT', 39, 81, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(885, 17, 'C17101PIT6107', 2, 'PIT', 39, 58, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(886, 17, 'C17101PIT6107', 2, 'PIT', 39, 57, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(887, 17, 'C17101PIT6107', 2, 'PIT', 39, 63, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(888, 17, 'C17101PIT6107', 2, 'PIT', 39, 56, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(889, 17, 'C17101PIT6107', 2, 'PIT', 39, 54, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(890, 17, 'C17101PIT6107', 2, 'PIT', 39, 83, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(891, 17, 'C17101PIT6108', 2, 'PIT', 39, 78, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(892, 17, 'C17101PIT6108', 2, 'PIT', 39, 65, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(893, 17, 'C17101PIT6108', 2, 'PIT', 39, 76, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(894, 17, 'C17101PIT6108', 2, 'PIT', 39, 62, 0, 0, 'Assigned', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectID` int(11) NOT NULL,
  `subjectTypeID` int(11) NOT NULL,
  `subCode` varchar(50) NOT NULL,
  `subjectName` varchar(50) NOT NULL,
  `semesterID` int(11) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `credits` int(11) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectID`, `subjectTypeID`, `subCode`, `subjectName`, `semesterID`, `course_code`, `credits`, `createdAt`, `updatedAt`) VALUES
(30, 2, 'PITS1', 'DATA STRUCTURES LAB USING C++', 1, 'PIT', 4, '2018-09-29 19:32:43', '2018-09-29 07:15:10'),
(31, 2, 'PITS2', 'RDBMS LAB', 2, 'PIT', 4, '2018-09-29 19:33:12', '2018-10-07 10:18:52'),
(32, 2, 'PITS3', 'JAVA PROGRAMMING LAB', 2, 'PIT', 4, '2018-09-29 19:33:40', NULL),
(33, 2, 'PITS4', 'BASED ON ELECTIVE III', 2, 'PIT', 4, '2018-09-29 19:34:19', NULL),
(34, 1, 'PITSA', 'C++ AND DATA STRUCTURES', 1, 'PIT', 4, '2018-09-29 19:34:54', NULL),
(35, 1, 'PITSF', 'COMPUTER NETWORKS', 1, 'PIT', 4, '2018-09-29 19:35:14', NULL),
(36, 1, 'PITSB', 'COMPUTER ARCHITECTURE', 1, 'PIT', 4, '2018-09-29 19:35:38', NULL),
(37, 1, 'PITSG', 'DESIGN AND ANALYSIS OF ALGORITHMS', 1, 'PIT', 4, '2018-09-29 19:36:08', NULL),
(38, 1, 'PIE01', 'VISUAL PROGRAMMING', 1, 'PIT', 4, '2018-09-29 19:36:31', NULL),
(39, 1, 'PITSH', 'ADVANCED JAVA PROGRAMMING', 2, 'PIT', 4, '2018-09-29 19:36:57', NULL),
(40, 1, 'PITSJ', 'INFORMATION SECURITY', 3, 'PIT', 4, '2018-09-29 22:17:24', NULL),
(41, 1, 'PIE10', 'MOBILE COMPUTING', 3, 'PIT', 4, '2018-09-29 22:17:45', NULL),
(42, 1, 'PIE04', 'SOFTWARE ENGINNERING', 3, 'PIT', 4, '2018-09-29 22:18:07', NULL),
(43, 1, 'PITSC', 'DATABASE MANAGEMENT SYSTEMS', 4, 'PIT', 4, '2018-09-29 22:18:44', NULL),
(44, 1, 'PITSD', 'OPERATING SYSTEMS', 2, 'PIT', 4, '2018-09-29 22:19:27', NULL),
(45, 1, 'PITSE', 'PROGRAMMING IN JAVA', 3, 'PIT', 4, '2018-09-29 22:20:31', NULL),
(46, 1, 'PIE07', 'INTERNET TECHNOLOGY', 4, 'PIT', 4, '2018-09-29 22:20:59', NULL),
(47, 1, 'UMATI', 'Algebra and Trigonometry I', 1, 'UMA', 1, '2018-10-02 16:22:33', NULL),
(48, 1, 'UMCD', 'Calculus and Differential Geometry', 2, 'UMA', 1, '2018-10-02 16:23:04', NULL),
(49, 1, 'UMDELT', 'Differential Equations and Laplace Transforms', 2, 'UMA', 1, '2018-10-02 16:23:33', NULL),
(50, 1, '3CA1151', 'Programming Fundamentals', 1, 'PCA', 5, '2018-10-13 23:05:00', NULL),
(51, 1, '3CA1152', 'Fundamentals of Computer Organization', 1, 'PCA', 5, '2018-10-13 23:05:31', NULL),
(52, 1, '3CA1153', 'Data and file Structure', 1, 'PCA', 5, '2018-10-13 23:05:58', NULL),
(53, 1, '3CA1155', 'Mathematical Foundation', 1, 'PCA', 4, '2018-10-13 23:06:33', NULL),
(54, 2, '3CA1156', 'Elements of Basic Communication', 1, 'PCA', 3, '2018-10-13 23:07:34', NULL),
(55, 1, '3CA1157', 'Web Technology', 1, 'PCA', 4, '2018-10-13 23:07:57', NULL),
(56, 1, '3CA1251', 'Object Oriented Programming', 2, 'PCA', 5, '2018-10-13 23:08:27', NULL),
(57, 1, '3CA1252', 'Database Management System', 2, 'PCA', 5, '2018-10-13 23:09:07', NULL),
(58, 1, '3CA1253', 'Client Server Technology', 2, 'PCA', 5, '2018-10-13 23:09:46', NULL),
(59, 3, '3CA1254', 'Probability, Statistics and Numerical Analysis', 2, 'PCA', 5, '2018-10-13 23:10:15', NULL),
(60, 2, '3CA1255', 'Application Lab', 2, 'PCA', 1, '2018-10-13 23:10:50', NULL),
(61, 1, '3CA1256', 'Professional Communication', 2, 'PCA', 3, '2018-10-13 23:11:18', NULL),
(62, 1, '3CA1351', 'Computer Networks', 3, 'PCA', 5, '2018-10-13 23:11:45', NULL),
(63, 1, '3CA1352', 'Operating Systems', 3, 'PCA', 5, '2018-10-13 23:12:12', NULL),
(64, 1, '3CA1353', 'System Analysis and Design Methodologies', 3, 'PCA', 4, '2018-10-13 23:12:36', NULL),
(65, 1, '3CA1354', 'Java Programming', 3, 'PCA', 4, '2018-10-13 23:13:04', NULL),
(66, 2, '3CA1356', 'Seminar', 3, 'PCA', 2, '2018-10-13 23:13:40', NULL),
(67, 2, '3CASP52', 'Personality Development', 3, 'PCA', 0, '2018-10-13 23:14:10', NULL),
(68, 1, '3CA1451', 'System Software', 4, 'PCA', 4, '2018-10-13 23:14:37', NULL),
(69, 1, '3CA1452', 'Database Administration', 4, 'PCA', 3, '2018-10-13 23:14:59', NULL),
(70, 1, '3CA1453', 'Mobile Application Development Technologies', 4, 'PCA', 4, '2018-10-13 23:15:26', NULL),
(71, 2, '3CA1455', 'Mini Project', 4, 'PCA', 1, '2018-10-13 23:15:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject_type`
--

CREATE TABLE `subject_type` (
  `subjectTypeID` int(11) NOT NULL,
  `subjectTypeName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_type`
--

INSERT INTO `subject_type` (`subjectTypeID`, `subjectTypeName`) VALUES
(1, 'Regular'),
(2, 'Practical'),
(3, 'Elective');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unitID` int(11) NOT NULL,
  `unitName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unitID`, `unitName`) VALUES
(1, 'Unit 1'),
(2, 'Unit 2'),
(3, 'Unit 3'),
(4, 'Unit 4'),
(5, 'Unit 5');

-- --------------------------------------------------------

--
-- Table structure for table `usermaster`
--

CREATE TABLE `usermaster` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `userPassword` varchar(20) DEFAULT NULL,
  `userMobileNo` varchar(12) DEFAULT NULL,
  `userImage` varchar(100) DEFAULT NULL,
  `userRole` varchar(10) DEFAULT NULL,
  `userIsActive` bit(1) DEFAULT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermaster`
--

INSERT INTO `usermaster` (`userID`, `userName`, `userEmail`, `userPassword`, `userMobileNo`, `userImage`, `userRole`, `userIsActive`, `createdAt`) VALUES
(4, 'Vignesh', 'vigneshhhh54@gmail.com', 'sureshbabu', '7092804641', 'noImg.png', 'Admin', b'1', '2018-08-07 22:38:46'),
(5, 'Sasikala', 'sasilakarams@gmail.com', '12345678', '9677209439', 'noImg.png', 'Admin', b'1', '2018-10-07 13:29:55'),
(6, 'Suresh', 'suresh@gmail.com', 'sureshbabu', '7092804644', 'noImg.png', 'Admin', b'1', '2018-10-07 11:33:19'),
(7, 'Swaminathan', 'Swaminathan@gmail.com', '12345678``', '7098797546', 'noImg.png', 'Admin', b'1', '2018-10-07 13:38:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignmentID`);

--
-- Indexes for table `batchmaster`
--
ALTER TABLE `batchmaster`
  ADD PRIMARY KEY (`batchID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `marks_details`
--
ALTER TABLE `marks_details`
  ADD PRIMARY KEY (`markDetailsID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semesterID`);

--
-- Indexes for table `staffmaster`
--
ALTER TABLE `staffmaster`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectID`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unitID`);

--
-- Indexes for table `usermaster`
--
ALTER TABLE `usermaster`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `batchmaster`
--
ALTER TABLE `batchmaster`
  MODIFY `batchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `marks_details`
--
ALTER TABLE `marks_details`
  MODIFY `markDetailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semesterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staffmaster`
--
ALTER TABLE `staffmaster`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student_assignment`
--
ALTER TABLE `student_assignment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=895;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usermaster`
--
ALTER TABLE `usermaster`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
