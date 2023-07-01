-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 12, 2023 at 06:12 PM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u174976054_nyclibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `emp_id` varchar(100) NOT NULL,
  `message` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `emp_id`, `message`) VALUES
(5, 'EMP-0003-25', 'test'),
(6, 'EMP-0003-25', 'test2'),
(7, 'EMP-0003-25', 'new announcement!'),
(8, 'EMP-0003-25', 'Hello'),
(9, 'EMP-0003-25', 'announcement'),
(10, 'EMP-0233-25', 'We would like to inform all of you that the library and policy management system v1.0.0 is now available. '),
(11, 'EMP-0003-25', 'We would like to inform all of you that the library and policy management system v1.0.0 is now online.'),
(12, 'EMP-0003-25', 'We would like to inform all of you that the library and policy management system v1.0.0 is now online!'),
(13, 'EMP-0003-25', 'This system is under testing.'),
(14, '9703-25', 'blah blah blah blah'),
(15, 'EMP-0003-25', 'January 24, 2023\r\nTesting of Profile Updating, Catalog Viewing/Searching, Adding, Editing, Archiving, Reservation, Logs, Login, Landing Page \r\n'),
(16, 'EMP-0003-25', 'ADMIN\r\nPolicies Catalog - Add record - Date Requested\r\n*Walang \"YYYY-MM-DD\" yung form'),
(17, 'EMP-0003-25', 'ADMIN:\r\nPolicies Catalog - Add record - Date Requested\r\n*Walang \"YYYY-MM-DD\" yung form'),
(18, 'EMP-0003-25', 'No announcements yet!'),
(19, '9703-25', 'welcome to library  and Policy management system');

-- --------------------------------------------------------

--
-- Table structure for table `audittrail`
--

CREATE TABLE `audittrail` (
  `audit_no` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `action_made` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `audittrail`
--

INSERT INTO `audittrail` (`audit_no`, `date_time`, `emp_id`, `action_made`) VALUES
(1, '2022-12-03 00:41:10', 'EMP-0233-25', 'A library admin logged in.'),
(2, '2022-12-05 21:17:26', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of The 50th anniversary of the pill so small. So powerful. And so misunderstood.'),
(3, '2022-12-05 21:30:48', 'EMP-0233-25', 'Employee EMP-0233-25 added a thesis with the title of Istambay : A Sociological analysis of youth inactivity in the Philippines.'),
(4, '2022-12-05 21:31:17', 'EMP-0233-25', 'Employee EMP-0233-25 edited a thesis with the title of Istambay : A Sociological analysis of youth inactivity in the Philippines.'),
(5, '2022-12-05 21:31:53', 'EMP-0233-25', 'Employee EMP-0233-25 added a thesis with the title of Perceptions on the levels of implementations of the coastal Resource Management program and their implications to food security: (A Perceptual Study of Bolinao, Pangasinan and Puerto Princesa).'),
(6, '2022-12-05 21:32:20', 'EMP-0233-25', 'Employee EMP-0233-25 added a thesis with the title of A case Study on the effectiveness of the ship for Southeast Asian youth program (SSEAYP) in Promoting Friendship and internal cooperation among the southeast Asian youths.'),
(7, '2022-12-05 21:32:52', 'EMP-0233-25', 'Employee EMP-0233-25 added a thesis with the title of In the service of the Filipino Youth: A practicum Report on the Internship at the National Youth Commission.'),
(8, '2022-12-05 21:33:24', 'EMP-0233-25', 'Employee EMP-0233-25 added a thesis with the title of Assessment of the Management Control System of the National Youth Commission (NYC).'),
(9, '2022-12-05 21:55:24', 'EMP-0233-25', 'Employee EMP-0233-25 edited a magazine with the title of The 50th anniversary of the pill so small. So powerful. And so misunderstood.'),
(10, '2022-12-05 21:55:36', 'EMP-0233-25', 'Employee EMP-0233-25 edited a magazine with the title of The 50th anniversary of the pill so small. So powerful. And so misunderstood.'),
(11, '2022-12-05 23:10:36', 'EMP-0233-25', 'Employee EMP-0233-25 edited a book with the title of Excel: Basics And Concepts.'),
(12, '2022-12-05 23:11:21', 'EMP-0233-25', 'Employee EMP-0233-25 edited a cd with the title of \"Globalization of Education\" Episodes.'),
(13, '2022-12-05 23:13:16', 'EMP-0233-25', 'Employee EMP-0233-25 edited a journal with the title of Social Welfare and development: Journal July to December.'),
(14, '2022-12-05 23:13:46', 'EMP-0233-25', 'Employee EMP-0233-25 edited a magazine with the title of The 50th anniversary of the pill so small. So powerful. And so misunderstood.'),
(15, '2022-12-05 23:14:51', 'EMP-0233-25', 'Employee EMP-0233-25 edited a thesis with the title of Istambay : A Sociological analysis of youth inactivity in the Philippines.'),
(16, '2022-12-06 00:24:11', 'EMP-0233-25', 'Logged out.'),
(17, '2022-12-06 00:24:20', 'EMP-0003-25', 'An admin logged in.'),
(18, '2022-12-06 00:34:25', 'EMP-0003-25', 'Logged out.'),
(19, '2022-12-06 00:34:32', 'EMP-0233-25', 'A library admin logged in.'),
(20, '2022-12-06 00:36:24', 'EMP-0233-25', 'Logged out.'),
(21, '2022-12-06 00:36:34', 'EMP-0003-25', 'An admin logged in.'),
(22, '2022-12-06 00:39:02', 'EMP-0003-25', 'Logged out.'),
(23, '2022-12-06 00:39:09', 'EMP-0233-25', 'A library admin logged in.'),
(24, '2022-12-06 00:46:59', 'EMP-0233-25', 'Logged out.'),
(25, '2022-12-06 00:47:07', 'EMP-0003-25', 'An admin logged in.'),
(26, '2022-12-08 23:02:57', 'EMP-0203-25', 'A research admin logged in.'),
(27, '2022-12-08 23:04:34', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of Sample.'),
(28, '2022-12-08 23:29:26', 'EMP-0203-25', 'A research admin logged in.'),
(29, '2022-12-08 23:30:31', 'EMP-0203-25', 'Logged out.'),
(30, '2022-12-08 23:30:33', 'EMP-0203-25', 'A research admin logged in.'),
(31, '2022-12-08 23:34:41', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of Sample.'),
(32, '2022-12-08 23:41:29', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of Sample.'),
(33, '2022-12-08 23:43:22', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of Policy 1.'),
(34, '2022-12-08 23:49:35', 'EMP-0203-25', 'Logged out.'),
(35, '2022-12-08 23:49:40', 'EMP-0233-25', 'A library admin logged in.'),
(36, '2022-12-08 23:49:52', 'EMP-0233-25', 'Employee EMP-0233-25 edited a book with the title of Introduction to Microsoft NT Server Environment.'),
(37, '2022-12-08 23:50:03', 'EMP-0233-25', 'Employee EMP-0233-25 edited a book with the title of Introduction to Microsoft NT Server Environment.'),
(38, '2022-12-09 00:03:17', 'EMP-0203-25', 'Employee EMP-0203-25 added a bill with the title of Bill 1.'),
(39, '2022-12-09 00:14:54', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of Bill 1.'),
(40, '2022-12-09 00:15:46', 'EMP-0203-25', 'Employee EMP-0203-25 edited a policy with the title of Policy 1.'),
(41, '2022-12-09 00:16:54', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of Bill 1.'),
(42, '2022-12-11 14:52:26', 'EMP-0203-25', 'A research admin logged in.'),
(43, '2022-12-11 14:56:39', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of V.'),
(44, '2022-12-11 15:12:32', 'EMP-0203-25', 'Employee EMP-0203-25 edited a policy with the title of V.'),
(45, '2022-12-11 15:21:15', 'EMP-0203-25', 'Logged out.'),
(46, '2022-12-11 15:21:20', 'EMP-0233-25', 'A library admin logged in.'),
(47, '2022-12-11 15:21:48', 'EMP-0233-25', 'Logged out.'),
(48, '2022-12-11 15:21:55', 'EMP-0203-25', 'A research admin logged in.'),
(49, '2022-12-11 15:22:15', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of S.'),
(50, '2022-12-11 15:22:19', 'EMP-0203-25', 'Logged out.'),
(51, '2022-12-11 15:22:39', 'EMP-0003-25', 'An admin logged in.'),
(52, '2022-12-11 15:26:06', 'EMP-0003-25', 'Logged out.'),
(53, '2022-12-11 15:26:11', 'EMP-0000-25', 'An employee logged in.'),
(54, '2022-12-11 15:42:57', 'EMP-0000-25', 'Logged out.'),
(55, '2022-12-11 15:43:03', 'EMP-0203-25', 'A research admin logged in.'),
(56, '2022-12-11 16:01:40', 'EMP-0203-25', 'Employee EMP-0203-25 added a bill with the title of G.'),
(57, '2022-12-11 16:06:08', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of G.'),
(58, '2022-12-11 16:06:22', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of G.'),
(59, '2022-12-11 16:07:03', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of G.'),
(60, '2022-12-11 16:07:39', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of G.'),
(61, '2022-12-11 16:16:16', 'EMP-0203-25', 'Employee EMP-0203-25 added a bill with the title of D.'),
(62, '2022-12-11 16:16:22', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of D.'),
(63, '2022-12-11 16:16:30', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of D.'),
(64, '2022-12-11 16:19:49', 'EMP-0203-25', 'Logged out.'),
(65, '2022-12-11 16:19:54', 'EMP-0233-25', 'A library admin logged in.'),
(66, '2022-12-11 16:22:31', 'EMP-0233-25', 'Logged out.'),
(67, '2022-12-11 16:22:37', 'EMP-0000-25', 'An employee logged in.'),
(68, '2022-12-11 16:23:57', 'EMP-0000-25', 'Logged out.'),
(69, '2022-12-11 16:24:01', 'EMP-0003-25', 'An admin logged in.'),
(70, '2022-12-11 16:27:15', 'EMP-0003-25', 'Logged out.'),
(71, '2022-12-11 21:45:48', 'EMP-0203-25', 'A research admin logged in.'),
(72, '2022-12-11 22:00:22', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of LETTER REQUEST FOR INPUTS FOR PH STATEMENT - GLOBAL OBSERVANCE OF THE INTERNATIONAL DAY OF EDUCATION, 24 JANUARY 2022.'),
(73, '2022-12-11 22:02:27', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of \"SENATE BILL NO. 884: AN ACT LAUNCHING THE \"\"YOUNG FARMERS CHALLENG PROGRAM,\"\" PLANNING AND EVALUATING EXISTING RELATED PROGRAMS OF THE DEPARTMENT OF AGRICULTURE, DEPARTMENT OF TRADE AND INDUSTRY, NATIONAL YOUTH COMMISSION, LOCAL GOVERNMENT UNITS, AS WELL AS OTHER GOVERNMENT AND RURAL DEVELOPMENT EFFORTS, ALLOCATING BUDGETS THEREFOR, AND FOR OTHER PURPOSES  HOUSE BILL NO. 9575: AN ACT ESTABLISHING THE YOUNG FARMERS AND FISHERFOLK CHALLENGE PROGRAM, CREATING FOR THE PURPOSE THE YOUNG FARMERS AND FISHERFOLK CHALLENGE COUNCIL, AND APPROPRIATING FUNDS THEREFOR  HOUSE BILL NO. 9852: AN ACT INSTITUTIONALIZING THE CONDUCT OF SUMMER YOUTH CAMP IN EVERY BARANGAY AND APPROPRIATING FUNDS THEREFOR\".'),
(74, '2022-12-11 22:05:41', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of 2022 IHBSS MSM QUESTIONNAIRE REVISION.'),
(75, '2022-12-11 22:07:41', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of \"REQUEST FOR COMMENTS BY THE OFFICE OF THE PRESIDENT TO THE BICAMERAL CONFERENCE COMMITTEE APPROVED CONSOLIDATED BILLS OF SENATE BILL NO. 2239/HOUSE BILL NO. 9007\".'),
(76, '2022-12-11 22:08:10', 'EMP-0203-25', 'Employee EMP-0203-25 edited a policy with the title of 2022 IHBSS MSM QUESTIONNAIRE REVISION.'),
(77, '2022-12-11 22:08:26', 'EMP-0203-25', 'Employee EMP-0203-25 edited a policy with the title of \"REQUEST FOR COMMENTS BY THE OFFICE OF THE PRESIDENT TO THE BICAMERAL CONFERENCE COMMITTEE APPROVED CONSOLIDATED BILLS OF SENATE BILL NO. 2239/HOUSE BILL NO. 9007\".'),
(78, '2022-12-11 22:09:06', 'EMP-0203-25', 'Employee EMP-0203-25 edited a policy with the title of 2022 IHBSS MSM QUESTIONNAIRE REVISION.'),
(79, '2022-12-11 22:10:19', 'EMP-0203-25', 'Employee EMP-0203-25 added a bill with the title of AMENDING R.A. NO. 10931 (UNIVERSAL ACCESS TO QUALITY TERTIARY EDUCATION ACT).'),
(80, '2022-12-11 22:10:48', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of AMENDING R.A. NO. 10931 (UNIVERSAL ACCESS TO QUALITY TERTIARY EDUCATION ACT).'),
(81, '2022-12-11 22:11:20', 'EMP-0203-25', 'Employee EMP-0203-25 added a bill with the title of AN ACT EXEMPTING QUALIFIED INDIGENT FILIPINOS FROM PAYMENT OF PROFESSIONAL EXAMINATION FEES AND FOR OTHER PURPOSES.'),
(82, '2022-12-11 22:12:17', 'EMP-0203-25', 'Employee EMP-0203-25 added a bill with the title of AN ACT GRANTING FIVE PERCENT (5%) DISCOUNT ON BASIC AND EDUCATION SERVICES TO UNDERPRIVILEGED STUDENTS IN ALL LEVELS, INCLUDING THOSE ENROLLED IN TECHNICAL-VOCATIONAL (TECH-VOC) INSTITUTIONS.'),
(83, '2022-12-11 22:12:55', 'EMP-0203-25', 'Employee EMP-0203-25 added a bill with the title of AN ACT ESTABLISHING AN ACADEMIC RECOVERY AND ACCESSIBLE LEARNING PROGRAM, APPROPRIATING FUNDS THEREFOR, AND FOR OTHER PURPOSES.'),
(84, '2022-12-11 23:40:52', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of AN ACT ESTABLISHING AN ACADEMIC RECOVERY AND ACCESSIBLE LEARNING PROGRAM, APPROPRIATING FUNDS THEREF.'),
(85, '2022-12-11 23:45:01', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of ONE TABLET, ONE STUDENT ACT OF 2022.'),
(86, '2022-12-11 23:49:03', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of AN ACT EXEMPTING QUALIFIED INDIGENT FILIPINOS FROM PAYMENT OF PROFESSIONAL EXAMINATION FEES AND FOR .'),
(87, '2022-12-11 23:55:02', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of AN ACT EXEMPTING QUALIFIED INDIGENT FILIPINOS FROM PAYMENT OF PROFESSIONAL EXAMINATION FEES AND FOR .'),
(88, '2022-12-11 23:55:33', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of AN ACT GRANTING FIVE PERCENT (5%) DISCOUNT ON BASIC AND EDUCATION SERVICES TO UNDERPRIVILEGED STUDEN.'),
(89, '2022-12-11 23:55:39', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of AN ACT GRANTING FIVE PERCENT (5%) DISCOUNT ON BASIC AND EDUCATION SERVICES TO UNDERPRIVILEGED STUDEN.'),
(90, '2022-12-11 23:56:02', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of AN ACT ESTABLISHING AN ACADEMIC RECOVERY AND ACCESSIBLE LEARNING PROGRAM, APPROPRIATING FUNDS THEREF.'),
(91, '2022-12-12 00:54:22', 'EMP-0203-25', 'Logged out.'),
(92, '2022-12-12 00:54:27', 'EMP-0233-25', 'A library admin logged in.'),
(93, '2022-12-12 00:56:11', 'EMP-0233-25', 'Employee EMP-0233-25 added a document with the title of Claiming our Rights : A Manual for Women’s Human Rights Education in Muslim Societies.'),
(94, '2022-12-12 01:00:27', 'EMP-0233-25', 'Employee EMP-0233-25 added a document with the title of PO/NGO Report : Anti- Poverty Summit.'),
(95, '2022-12-12 01:00:54', 'EMP-0233-25', 'Employee EMP-0233-25 added a document with the title of Studies Related Literature to Drug Abuse 1980’s.'),
(96, '2022-12-12 01:01:21', 'EMP-0233-25', 'Employee EMP-0233-25 added a document with the title of The National Technical Education and Skills Development Plan, 1999-2004.'),
(97, '2022-12-12 01:01:50', 'EMP-0233-25', 'Employee EMP-0233-25 added a document with the title of National Development Summit : A National Multi-Sectoral Consultation on a Proposed set of Policies and Programs that seek to Pole-Vault the Philippines to the 21st Century June 8-9, 1997 PICC, Manila.'),
(98, '2022-12-12 01:07:25', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of NYC : Youth Monitor.'),
(99, '2022-12-12 01:07:54', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of Be Cool : A Joint Publication of The National Youth Commission and the Dangerous.'),
(100, '2022-12-12 01:08:19', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of CAYC Memoirs Year 2006-2010.'),
(101, '2022-12-12 01:08:58', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of National Youth Conference on Mass Media Youth Speak.'),
(102, '2022-12-12 01:09:27', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of NYC Penol : Accomplishment Report.'),
(103, '2022-12-12 01:11:10', 'EMP-0233-25', 'Employee EMP-0233-25 added a cd with the title of 1 Nov. 13		.'),
(104, '2022-12-12 02:05:16', 'EMP-0233-25', 'Employee EMP-0233-25 edited a document with the title of Claiming our Rights : A Manual for Women’s Human Rights Education in Muslim Societies.'),
(105, '2022-12-12 02:05:21', 'EMP-0233-25', 'Employee EMP-0233-25 edited a document with the title of Claiming our Rights : A Manual for Women’s Human Rights Education in Muslim Societies.'),
(106, '2022-12-12 02:15:24', 'EMP-0233-25', 'Logged out.'),
(107, '2022-12-12 02:15:29', 'EMP-0000-25', 'An employee logged in.'),
(108, '2022-12-12 02:16:08', 'EMP-0000-25', 'Logged out.'),
(109, '2022-12-12 02:16:19', 'EMP-0233-25', 'A library admin logged in.'),
(110, '2022-12-12 02:16:42', 'EMP-0233-25', 'Logged out.'),
(111, '2022-12-12 02:16:47', 'EMP-0003-25', 'An admin logged in.'),
(112, '2022-12-12 02:22:19', 'EMP-0003-25', 'An admin logged in.'),
(113, '2022-12-12 19:21:12', 'EMP-0203-25', 'A research admin logged in.'),
(114, '2022-12-12 20:57:17', 'EMP-0233-25', 'A library admin logged in.'),
(115, '2022-12-12 20:58:07', 'EMP-0233-25', 'Employee EMP-0233-25 edited a cd with the title of \"Muslim Youth\" Episod.'),
(116, '2022-12-12 20:58:11', 'EMP-0233-25', 'Employee EMP-0233-25 edited a cd with the title of \"Muslim Youth\" Episode.'),
(117, '2022-12-12 20:58:38', 'EMP-0233-25', 'Logged out.'),
(118, '2022-12-12 20:58:47', 'EMP-0003-25', 'An admin logged in.'),
(119, '2022-12-12 21:00:56', 'EMP-0003-25', 'Logged out.'),
(120, '2022-12-12 21:01:02', 'EMP-0000-25', 'An employee logged in.'),
(121, '2022-12-12 21:01:47', 'EMP-0000-25', 'Logged out.'),
(122, '2022-12-12 21:01:55', 'EMP-0203-25', 'A research admin logged in.'),
(123, '2022-12-12 21:34:38', 'EMP-0203-25', 'Logged out.'),
(124, '2022-12-12 21:36:15', 'EMP-0000-25', 'An employee logged in.'),
(125, '2022-12-12 21:36:45', 'EMP-0233-25', 'A library admin logged in.'),
(126, '2022-12-12 21:37:01', 'EMP-0000-25', 'An employee logged in.'),
(127, '2022-12-12 21:40:47', 'EMP-0000-25', 'Logged out.'),
(128, '2022-12-12 21:40:52', 'EMP-0203-25', 'A research admin logged in.'),
(129, '2022-12-12 21:41:34', 'EMP-0203-25', 'Employee EMP-0203-25 added the reports.'),
(130, '2022-12-12 21:43:34', 'EMP-0003-25', 'An admin logged in.'),
(131, '2022-12-12 21:43:45', 'EMP-0003-25', 'Logged out.'),
(132, '2022-12-12 21:43:48', 'EMP-0233-25', 'A library admin logged in.'),
(133, '2022-12-12 21:45:28', 'EMP-0233-25', 'Logged out.'),
(134, '2022-12-12 21:45:34', 'EMP-0233-25', 'A library admin logged in.'),
(135, '2022-12-12 21:45:41', 'EMP-0233-25', 'Logged out.'),
(136, '2022-12-12 21:45:45', 'EMP-0203-25', 'A research admin logged in.'),
(137, '2022-12-12 21:46:55', 'EMP-0203-25', 'Logged out.'),
(138, '2022-12-12 21:47:02', 'EMP-0233-25', 'A library admin logged in.'),
(139, '2022-12-12 21:49:39', 'EMP-0233-25', 'Logged out.'),
(140, '2022-12-12 21:49:50', 'EMP-0003-25', 'An admin logged in.'),
(141, '2022-12-12 23:04:22', 'EMP-0003-25', 'Logged out.'),
(142, '2022-12-12 23:04:28', 'EMP-0233-25', 'A library admin logged in.'),
(143, '2022-12-14 22:39:21', 'EMP-0000-25', 'An employee logged in.'),
(144, '2022-12-14 23:58:18', 'EMP-0000-25', 'Logged out.'),
(145, '2022-12-15 00:00:31', 'EMP-0000-25', 'An employee logged in.'),
(146, '2022-12-15 00:14:33', 'EMP-0000-25', 'Logged out.'),
(147, '2022-12-15 00:14:38', 'EMP-0003-25', 'An admin logged in.'),
(148, '2022-12-15 13:19:44', 'EMP-0233-25', 'A library admin logged in.'),
(149, '2022-12-15 13:19:53', 'EMP-0233-25', 'Logged out.'),
(150, '2022-12-15 13:20:01', 'EMP-0203-25', 'A research admin logged in.'),
(151, '2022-12-15 13:22:07', 'EMP-0203-25', 'Logged out.'),
(152, '2022-12-15 13:22:15', 'EMP-0003-25', 'An admin logged in.'),
(153, '2022-12-15 13:24:31', 'EMP-0003-25', 'An admin logged in.'),
(154, '2022-12-15 13:27:44', 'EMP-0003-25', 'An admin logged in.'),
(155, '2022-12-15 13:29:56', 'EMP-0233-25', 'A library admin logged in.'),
(156, '2022-12-17 14:50:55', 'EMP-0000-25', 'Logged out.'),
(157, '2022-12-17 14:51:00', 'EMP-0203-25', 'A research admin logged in.'),
(158, '2022-12-17 14:51:05', 'EMP-0203-25', 'Logged out.'),
(159, '2022-12-17 14:51:09', 'EMP-0233-25', 'A library admin logged in.'),
(160, '2022-12-17 15:29:22', 'EMP-0233-25', 'Logged out.'),
(161, '2022-12-17 15:29:27', 'EMP-0000-25', 'An employee logged in.'),
(162, '2022-12-17 15:41:16', 'EMP-0000-25', 'Logged out.'),
(163, '2022-12-17 15:41:21', 'EMP-0203-25', 'A research admin logged in.'),
(164, '2022-12-17 15:41:57', 'EMP-0203-25', 'Logged out.'),
(165, '2022-12-17 15:42:00', 'EMP-0003-25', 'An admin logged in.'),
(166, '2022-12-17 15:42:18', 'EMP-0003-25', 'Logged out.'),
(167, '2022-12-17 15:42:20', 'EMP-0003-25', 'An admin logged in.'),
(168, '2022-12-17 15:42:28', 'EMP-0003-25', 'Logged out.'),
(169, '2022-12-17 15:42:33', 'EMP-0233-25', 'A library admin logged in.'),
(170, '2022-12-17 15:45:30', 'EMP-0233-25', 'Logged out.'),
(171, '2022-12-17 15:51:06', 'EMP-0233-25', 'A library admin logged in.'),
(172, '2022-12-17 15:58:30', 'EMP-0233-25', 'Logged out.'),
(173, '2022-12-17 15:58:35', 'EMP-0203-25', 'A research admin logged in.'),
(174, '2022-12-17 15:58:39', 'EMP-0203-25', 'Logged out.'),
(175, '2022-12-17 15:58:43', 'EMP-0003-25', 'An admin logged in.'),
(176, '2022-12-17 15:59:19', 'EMP-0003-25', 'Logged out.'),
(177, '2022-12-17 15:59:44', 'EMP-0203-25', 'A research admin logged in.'),
(178, '2022-12-17 15:59:49', 'EMP-0203-25', 'Logged out.'),
(179, '2022-12-17 15:59:52', 'EMP-0233-25', 'A library admin logged in.'),
(180, '2022-12-17 16:02:47', 'EMP-0233-25', 'Employee EMP-0233-25 edited a book with the title of Introduction to Microsoft NT Server Environment.'),
(181, '2022-12-17 16:02:55', 'EMP-0233-25', 'Employee EMP-0233-25 edited a book with the title of Introduction to Microsoft NT Server Environment.'),
(182, '2022-12-17 16:03:34', 'EMP-0233-25', 'Logged out.'),
(183, '2023-01-11 15:50:09', 'EMP-0000-25', 'An employee logged in.'),
(184, '2023-01-11 15:56:13', 'EMP-0000-25', 'An employee logged in.'),
(185, '2023-01-11 16:07:10', 'EMP-0000-25', 'An employee logged in.'),
(186, '2023-01-11 16:25:48', 'EMP-0000-25', 'An employee logged in.'),
(187, '2023-01-11 16:27:19', 'EMP-0000-25', 'An employee logged in.'),
(188, '2023-01-11 16:31:21', 'EMP-0000-25', 'An employee logged in.'),
(189, '2023-01-11 16:34:44', 'EMP-0000-25', 'An employee logged in.'),
(190, '2023-01-11 16:54:58', 'EMP-0000-25', 'An employee logged in.'),
(191, '2023-01-11 17:06:20', 'EMP-0000-25', 'An employee logged in.'),
(192, '2023-01-11 17:08:36', 'EMP-0000-25', 'Logged out.'),
(193, '2023-01-11 17:09:04', 'EMP-0000-25', 'An employee logged in.'),
(194, '2023-01-11 17:09:34', 'EMP-0000-25', 'An employee logged in.'),
(195, '2023-01-11 17:10:12', 'EMP-0233-25', 'A library admin logged in.'),
(196, '2023-01-11 17:11:13', 'EMP-0000-25', 'An employee logged in.'),
(197, '2023-01-11 17:11:16', 'EMP-0000-25', 'An employee logged in.'),
(198, '2023-01-11 17:11:55', 'EMP-0000-25', 'An employee logged in.'),
(199, '2023-01-11 17:12:12', 'EMP-0000-25', 'An employee logged in.'),
(200, '2023-01-11 17:13:04', 'EMP-0000-25', 'Logged out.'),
(201, '2023-01-11 17:14:13', 'EMP-0000-25', 'An employee logged in.'),
(202, '2023-01-11 17:14:17', 'EMP-0000-25', 'Logged out.'),
(203, '2023-01-11 17:33:35', 'EMP-0000-25', 'An employee logged in.'),
(204, '2023-01-11 17:41:17', 'EMP-0203-25', 'A research admin logged in.'),
(205, '2023-01-11 17:47:32', 'EMP-0203-25', 'A research admin logged in.'),
(206, '2023-01-11 17:47:55', 'EMP-0000-25', 'An employee logged in.'),
(207, '2023-01-11 17:47:59', 'EMP-0000-25', 'Logged out.'),
(208, '2023-01-11 17:48:06', 'EMP-0203-25', 'A research admin logged in.'),
(209, '2023-01-11 17:48:07', 'EMP-0203-25', 'A research admin logged in.'),
(210, '2023-01-11 17:49:24', 'EMP-0203-25', 'A research admin logged in.'),
(211, '2023-01-11 17:50:01', 'EMP-0000-25', 'An employee logged in.'),
(212, '2023-01-11 17:50:18', 'EMP-0000-25', 'Logged out.'),
(213, '2023-01-11 18:02:20', 'EMP-0003-25', 'An admin logged in.'),
(214, '2023-01-11 18:02:45', 'EMP-0000-25', 'An employee logged in.'),
(215, '2023-01-11 18:02:49', 'EMP-0000-25', 'Logged out.'),
(216, '2023-01-11 18:02:59', 'EMP-0203-25', 'A research admin logged in.'),
(217, '2023-01-11 18:08:52', 'EMP-0203-25', 'A research admin logged in.'),
(218, '2023-01-11 18:09:22', 'EMP-0203-25', 'Logged out.'),
(219, '2023-01-11 18:10:11', 'EMP-0003-25', 'An admin logged in.'),
(220, '2023-01-11 18:14:52', 'EMP-0003-25', 'Logged out.'),
(221, '2023-01-11 18:15:10', 'EMP-0000-25', 'An employee logged in.'),
(222, '2023-01-11 18:15:26', 'EMP-0000-25', 'Logged out.'),
(223, '2023-01-11 18:15:31', 'EMP-0003-25', 'An admin logged in.'),
(224, '2023-01-11 18:18:09', 'EMP-0003-25', 'Logged out.'),
(225, '2023-01-11 18:18:43', 'EMP-0203-25', 'A research admin logged in.'),
(226, '2023-01-11 18:26:17', 'EMP-0203-25', 'Logged out.'),
(227, '2023-01-11 18:32:53', 'EMP-0003-25', 'An admin logged in.'),
(228, '2023-01-11 18:32:59', 'EMP-0003-25', 'Logged out.'),
(229, '2023-01-11 18:33:05', 'EMP-0233-25', 'A library admin logged in.'),
(230, '2023-01-11 18:41:54', 'EMP-0233-25', 'Logged out.'),
(231, '2023-01-11 19:22:37', 'EMP-0000-25', 'An employee logged in.'),
(232, '2023-01-11 19:26:00', 'EMP-0000-25', 'Logged out.'),
(233, '2023-01-11 19:26:12', 'EMP-0003-25', 'An admin logged in.'),
(234, '2023-01-11 19:27:53', 'EMP-0233-25', 'A library admin logged in.'),
(235, '2023-01-11 19:29:26', 'EMP-0000-25', 'An employee logged in.'),
(236, '2023-01-11 19:29:33', 'EMP-0000-25', 'Logged out.'),
(237, '2023-01-11 19:32:19', 'EMP-0003-25', 'Logged out.'),
(238, '2023-01-11 19:33:20', 'EMP-0233-25', 'Logged out.'),
(239, '2023-01-11 19:34:53', 'EMP-0003-25', 'An admin logged in.'),
(240, '2023-01-11 19:34:59', 'EMP-0003-25', 'Logged out.'),
(241, '2023-01-11 19:35:22', 'EMP-0203-25', 'A research admin logged in.'),
(242, '2023-01-11 19:38:04', 'EMP-0203-25', 'Logged out.'),
(243, '2023-01-11 19:38:13', 'EMP-0003-25', 'An admin logged in.'),
(244, '2023-01-11 19:40:08', 'EMP-0003-25', 'Logged out.'),
(245, '2023-01-11 19:40:13', 'EMP-0000-25', 'An employee logged in.'),
(246, '2023-01-11 19:44:25', 'EMP-0000-25', 'Logged out.'),
(247, '2023-01-11 20:04:36', 'EMP-0000-25', 'An employee logged in.'),
(248, '2023-01-11 20:05:38', 'EMP-0000-25', 'Logged out.'),
(249, '2023-01-11 20:05:44', 'EMP-0203-25', 'A research admin logged in.'),
(250, '2023-01-11 20:06:46', 'EMP-0203-25', 'Logged out.'),
(251, '2023-01-11 20:06:52', 'EMP-0203-25', 'A research admin logged in.'),
(252, '2023-01-11 20:20:30', 'EMP-0203-25', 'Logged out.'),
(253, '2023-01-11 22:07:19', 'EMP-0233-25', 'A library admin logged in.'),
(254, '2023-01-11 22:07:37', 'EMP-0233-25', 'Logged out.'),
(255, '2023-01-11 22:07:51', 'EMP-0233-25', 'A library admin logged in.'),
(256, '2023-01-11 22:38:50', 'EMP-0233-25', 'Logged out.'),
(257, '2023-01-11 23:08:06', 'EMP-0000-25', 'An employee logged in.'),
(258, '2023-01-11 23:11:14', 'EMP-0233-25', 'A library admin logged in.'),
(259, '2023-01-11 23:17:19', 'EMP-0203-25', 'A research admin logged in.'),
(260, '2023-01-11 23:18:19', 'EMP-0233-25', 'A library admin logged in.'),
(261, '2023-01-11 23:19:55', 'EMP-0233-25', 'Logged out.'),
(262, '2023-01-11 23:20:00', 'EMP-0233-25', 'A library admin logged in.'),
(263, '2023-01-11 23:20:17', 'EMP-0233-25', 'Logged out.'),
(264, '2023-01-11 23:20:23', 'EMP-0203-25', 'A research admin logged in.'),
(265, '2023-01-11 23:23:02', 'EMP-0203-25', 'Logged out.'),
(266, '2023-01-11 23:23:16', 'EMP-0203-25', 'A research admin logged in.'),
(267, '2023-01-11 23:23:57', 'EMP-0203-25', 'A research admin logged in.'),
(268, '2023-01-11 23:25:30', 'EMP-0203-25', 'Logged out.'),
(269, '2023-01-12 00:11:11', 'EMP-0000-25', 'Logged out.'),
(270, '2023-01-12 00:11:51', 'EMP-0203-25', 'A research admin logged in.'),
(271, '2023-01-12 00:11:56', 'EMP-0203-25', 'Logged out.'),
(272, '2023-01-12 00:12:01', 'EMP-0233-25', 'A library admin logged in.'),
(273, '2023-01-12 00:38:28', 'EMP-0233-25', 'Logged out.'),
(274, '2023-01-12 00:45:15', 'EMP-0233-25', 'A library admin logged in.'),
(275, '2023-01-12 01:01:29', 'EMP-0203-25', 'A research admin logged in.'),
(276, '2023-01-12 01:02:04', 'EMP-0203-25', 'Logged out.'),
(277, '2023-01-12 01:02:10', 'EMP-0233-25', 'A library admin logged in.'),
(278, '2023-01-12 01:07:58', 'EMP-0233-25', 'Logged out.'),
(279, '2023-01-12 01:08:07', 'EMP-0000-25', 'An employee logged in.'),
(280, '2023-01-12 01:08:38', 'EMP-0000-25', 'Logged out.'),
(281, '2023-01-12 01:11:30', 'EMP-0003-25', 'An admin logged in.'),
(282, '2023-01-12 01:15:53', 'EMP-0003-25', 'Employee EMP-0003-25 created an announcement.'),
(283, '2023-01-12 01:16:12', 'EMP-0003-25', 'Logged out.'),
(284, '2023-01-12 01:37:32', 'EMP-0000-25', 'An employee logged in.'),
(285, '2023-01-12 01:37:46', 'EMP-0000-25', 'Logged out.'),
(286, '2023-01-12 01:38:00', 'EMP-0000-25', 'An employee logged in.'),
(287, '2023-01-12 01:39:41', 'EMP-0000-25', 'Logged out.'),
(288, '2023-01-12 01:41:53', 'EMP-0000-25', 'An employee logged in.'),
(289, '2023-01-12 01:46:40', 'EMP-0000-25', 'Logged out.'),
(290, '2023-01-12 05:44:19', 'EMP-0003-25', 'An admin logged in.'),
(291, '2023-01-12 05:51:41', 'EMP-0003-25', 'Logged out.'),
(292, '2023-01-12 05:53:03', 'EMP-0003-25', 'An admin logged in.'),
(293, '2023-01-12 05:53:55', 'EMP-0003-25', 'Logged out.'),
(294, '2023-01-12 05:54:13', 'EMP-0233-25', 'A library admin logged in.'),
(295, '2023-01-12 05:54:39', 'EMP-0233-25', 'Employee EMP-0233-25 edited a book with the title of Introduction to Microsoft NT Server Environments.'),
(296, '2023-01-12 05:55:20', 'EMP-0233-25', 'Employee EMP-0233-25 edited a book with the title of Introduction to Microsoft NT Server Environment.'),
(297, '2023-01-12 05:56:20', 'EMP-0233-25', 'Employee EMP-0233-25 edited a magazine with the title of NYC : Youth Monitor.'),
(298, '2023-01-12 05:56:38', 'EMP-0233-25', 'Employee EMP-0233-25 edited a magazine with the title of NYC : Youth Monitor.'),
(299, '2023-01-12 06:16:51', 'EMP-0233-25', 'Logged out.'),
(300, '2023-01-12 06:17:04', 'EMP-0000-25', 'An employee logged in.'),
(301, '2023-01-12 06:17:13', 'EMP-0000-25', 'Logged out.'),
(302, '2023-01-12 06:17:13', '', 'Logged out.'),
(303, '2023-01-12 06:17:20', 'EMP-0233-25', 'A library admin logged in.'),
(304, '2023-01-12 06:23:03', 'EMP-0233-25', 'Logged out.'),
(305, '2023-01-12 06:23:36', 'EMP-0203-25', 'A research admin logged in.'),
(306, '2023-01-12 06:24:11', 'EMP-0203-25', 'Employee EMP-0203-25 edited a policy with the title of \"REQUEST FOR COMMENTS BY THE OFFICE OF THE PRESIDENT TO THE BICAMERAL CONFERENCE COMMITTEE APPROVED CONSOLIDATED BILLS OF SENATE BILL NO. 2239/HOUSE BILL NO. 9007\".'),
(307, '2023-01-12 06:24:23', 'EMP-0203-25', 'Employee EMP-0203-25 edited a policy with the title of \"REQUEST FOR COMMENTS BY THE OFFICE OF THE PRESIDENT TO THE BICAMERAL CONFERENCE COMMITTEE APPROVED CONSOLIDATED BILLS OF SENATE BILL NO. 2239/HOUSE BILL NO. 9007\".'),
(308, '2023-01-12 06:24:48', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of AN ACT ESTABLISHING AN ACADEMIC RECOVERY AND ACCESSIBLE LEARNING PROGRAM, APPROPRIATING FUNDS THEREF.'),
(309, '2023-01-12 06:25:08', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of AN ACT ESTABLISHING AN ACADEMIC RECOVERY AND ACCESSIBLE LEARNING PROGRAM, APPROPRIATING FUNDS THEREF.'),
(310, '2023-01-12 06:25:55', 'EMP-0203-25', 'Logged out.'),
(311, '2023-01-12 15:00:26', 'EMP-0000-25', 'An employee logged in.'),
(312, '2023-01-12 15:02:33', 'EMP-0000-25', 'An employee logged in.'),
(313, '2023-01-12 15:05:36', 'EMP-0000-25', 'Logged out.'),
(314, '2023-01-12 17:41:25', 'EMP-0203-25', 'A research admin logged in.'),
(315, '2023-01-12 17:41:33', 'EMP-0203-25', 'Logged out.'),
(316, '2023-01-12 17:41:39', 'EMP-0233-25', 'A library admin logged in.'),
(317, '2023-01-12 17:45:56', 'EMP-0233-25', 'Logged out.'),
(318, '2023-01-12 17:46:00', 'EMP-0233-25', 'A library admin logged in.'),
(319, '2023-01-12 20:59:52', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of w.'),
(320, '2023-01-12 21:00:15', 'EMP-0233-25', 'Employee EMP-0233-25 added a cd with the title of aaa.'),
(321, '2023-01-12 23:07:17', 'EMP-0233-25', 'Logged out.'),
(322, '2023-01-12 23:11:58', 'EMP-0233-25', 'A library admin logged in.'),
(323, '2023-01-12 23:17:53', 'EMP-0233-25', 'Employee EMP-0233-25 edited a book with the title of Introduction to Microsoft NT Server Environment.'),
(324, '2023-01-13 01:55:12', 'EMP-0233-25', 'Logged out.'),
(325, '2023-01-13 02:00:10', 'EMP-0203-25', 'A research admin logged in.'),
(326, '2023-01-13 02:47:29', 'EMP-0203-25', 'Logged out.'),
(327, '2023-01-13 02:47:36', 'EMP-0003-25', 'An admin logged in.'),
(328, '2023-01-13 16:41:02', 'EMP-0003-25', 'Logged out.'),
(329, '2023-01-14 21:53:05', 'EMP-0233-25', 'A library admin logged in.'),
(330, '2023-01-14 21:54:28', 'EMP-0233-25', 'Logged out.'),
(331, '2023-01-14 21:54:44', 'EMP-0233-25', 'A library admin logged in.'),
(332, '2023-01-15 19:11:44', 'EMP-0233-25', 'A library admin logged in.'),
(333, '2023-01-15 19:12:15', 'EMP-0233-25', 'Logged out.'),
(334, '2023-01-15 19:12:17', 'EMP-0233-25', 'A library admin logged in.'),
(335, '2023-01-15 19:12:21', 'EMP-0233-25', 'Logged out.'),
(336, '2023-01-15 19:12:25', 'EMP-0000-25', 'An employee logged in.'),
(337, '2023-01-15 19:12:45', 'EMP-0000-25', 'Logged out.'),
(338, '2023-01-15 19:12:51', 'EMP-0203-25', 'A research admin logged in.'),
(339, '2023-01-15 19:13:12', 'EMP-0203-25', 'Logged out.'),
(340, '2023-01-15 19:13:18', 'EMP-0003-25', 'An admin logged in.'),
(341, '2023-01-15 19:16:11', 'EMP-0003-25', 'Logged out.'),
(342, '2023-01-15 19:17:09', 'EMP-0003-25', 'An admin logged in.'),
(343, '2023-01-15 19:22:59', 'EMP-0003-25', 'Employee EMP-0003-25 created an announcement.'),
(344, '2023-01-15 19:32:45', 'EMP-0003-25', 'Logged out.'),
(345, '2023-01-15 20:30:20', 'EMP-0103-25', 'An employee logged in.'),
(346, '2023-01-15 20:30:31', 'EMP-0103-25', 'Logged out.'),
(347, '2023-01-15 23:51:26', 'EMP-2000-25', 'An employee logged in.'),
(348, '2023-01-15 23:55:09', 'EMP-2000-25', 'An employee logged in.'),
(349, '2023-01-15 23:57:51', 'EMP-2000-25', 'Logged out.'),
(350, '2023-01-15 23:58:21', 'EMP-2000-25', 'An employee logged in.'),
(351, '2023-01-16 01:57:33', 'EMP-2000-25', 'Logged out.'),
(352, '2023-01-16 01:57:57', 'EMP-0233-25', 'A library admin logged in.'),
(353, '2023-01-16 13:04:19', 'EMP-0233-25', 'A library admin logged in.'),
(354, '2023-01-16 13:04:49', 'EMP-0000-25', 'An employee logged in.'),
(355, '2023-01-16 13:31:28', 'EMP-2233-25', 'An employee logged in.'),
(356, '2023-01-16 13:35:01', 'EMP-2233-25', 'Logged out.'),
(357, '2023-01-16 13:35:07', 'EMP-0233-25', 'A library admin logged in.'),
(358, '2023-01-16 13:39:58', 'EMP-0233-25', 'Logged out.'),
(359, '2023-01-16 13:40:25', 'EMP-2000-25', 'An employee logged in.'),
(360, '2023-01-16 13:42:04', 'EMP-2000-25', 'Logged out.'),
(361, '2023-01-16 13:52:50', 'EMP-0003-25', 'An admin logged in.'),
(362, '0000-00-00 00:00:00', '', 'Edited profile (:Patricia Flores).'),
(363, '2023-01-16 13:53:10', 'EMP-0003-25', 'Logged out.'),
(364, '2023-01-16 13:53:14', 'EMP-0003-25', 'An admin logged in.'),
(365, '2023-01-16 14:00:07', 'EMP-0000-25', 'An employee logged in.'),
(366, '2023-01-16 14:02:50', 'EMP-0233-25', 'A library admin logged in.'),
(367, '2023-01-16 14:03:25', 'EMP-0000-25', 'Logged out.'),
(368, '2023-01-16 14:03:30', 'EMP-0003-25', 'An admin logged in.'),
(369, '0000-00-00 00:00:00', '', 'Edited profile (:Patricia Junelle Flores).'),
(370, '2023-01-16 14:04:57', 'EMP-0233-25', 'A library admin logged in.'),
(371, '2023-01-16 14:07:03', 'EMP-0233-25', 'A library admin logged in.'),
(372, '2023-01-16 14:08:27', 'EMP-0233-25', 'Logged out.'),
(373, '2023-01-16 14:08:47', 'EMP-0000-25', 'An employee logged in.'),
(374, '2023-01-16 14:09:13', 'EMP-0000-25', 'Logged out.'),
(375, '0000-00-00 00:00:00', '', 'Edited profile (:Patricia  Flores).'),
(376, '2023-01-16 14:09:46', 'EMP-0203-25', 'A research admin logged in.'),
(377, '2023-01-16 14:11:28', 'EMP-0003-25', 'Logged out.'),
(378, '2023-01-16 14:11:32', 'EMP-0000-25', 'An employee logged in.'),
(379, '2023-01-16 14:11:47', 'EMP-0000-25', 'Logged out.'),
(380, '2023-01-16 14:11:52', 'EMP-0203-25', 'A research admin logged in.'),
(381, '2023-01-16 14:12:19', 'EMP-0203-25', 'A research admin logged in.'),
(382, '2023-01-16 14:12:28', '', 'Edited profile (:Nel Aguilar).'),
(383, '2023-01-16 14:12:34', 'EMP-0203-25', 'Logged out.'),
(384, '2023-01-16 14:12:35', 'EMP-0203-25', 'A research admin logged in.'),
(385, '2023-01-16 14:12:39', 'EMP-0203-25', 'Logged out.'),
(386, '2023-01-16 14:12:42', 'EMP-0233-25', 'A library admin logged in.'),
(387, '2023-01-16 14:13:03', 'EMP-0203-25', 'Logged out.'),
(388, '2023-01-16 14:13:14', 'EMP-0003-25', 'An admin logged in.'),
(389, '0000-00-00 00:00:00', '', 'Edited profile (:Patric Flores).'),
(390, '0000-00-00 00:00:00', '', 'Edited profile (:Patrick Flore).'),
(391, '0000-00-00 00:00:00', '', 'Edited profile (:Patrick Flores).'),
(392, '0000-00-00 00:00:00', '', 'Edited profile (:Patricia Flores).'),
(393, '0000-00-00 00:00:00', '', 'Edited profile (:Patricia Flores).'),
(394, '2023-01-16 14:15:06', 'EMP-0233-25', 'Logged out.'),
(395, '2023-01-16 14:15:09', 'EMP-0000-25', 'An employee logged in.'),
(396, '2023-01-16 14:16:16', 'EMP-0003-25', 'An admin logged in.'),
(397, '2023-01-16 14:16:54', 'EMP-0003-25', 'Logged out.'),
(398, '2023-01-16 14:17:19', 'EMP-2000-25', 'An employee logged in.'),
(399, '2023-01-16 14:18:26', 'EMP-0000-25', 'Logged out.'),
(400, '2023-01-16 14:18:28', 'EMP-0000-25', 'An employee logged in.'),
(401, '2023-01-16 14:19:00', 'EMP-0003-25', 'An admin logged in.'),
(402, '2023-01-16 14:21:33', 'EMP-0000-25', 'Logged out.'),
(403, '2023-01-16 14:23:39', 'EMP-0000-25', 'An employee logged in.'),
(404, '2023-01-16 14:28:10', 'EMP-0000-25', 'Logged out.'),
(405, '2023-01-16 14:28:13', 'EMP-0003-25', 'An admin logged in.'),
(406, '2023-01-16 14:37:01', 'EMP-0233-25', 'A library admin logged in.'),
(407, '2023-01-16 14:37:43', 'EMP-0233-25', 'A library admin logged in.'),
(408, '2023-01-16 14:38:28', 'EMP-0000-25', 'An employee logged in.'),
(409, '2023-01-16 14:39:07', 'EMP-0000-25', 'Logged out.'),
(410, '2023-01-16 14:39:16', 'EMP-0203-25', 'A research admin logged in.'),
(411, '2023-01-16 14:39:57', 'EMP-0003-25', 'An admin logged in.'),
(412, '2023-01-16 14:40:12', 'EMP-0003-25', 'Logged out.'),
(413, '2023-01-16 14:40:17', 'EMP-0003-25', 'Logged out.'),
(414, '2023-01-16 14:40:27', 'EMP-2000-25', 'An employee logged in.'),
(415, '2023-01-16 14:42:06', 'EMP-0203-25', 'A research admin logged in.'),
(416, '2023-01-16 14:42:13', 'EMP-0203-25', 'Logged out.'),
(417, '2023-01-16 14:42:19', 'EMP-0003-25', 'An admin logged in.'),
(418, '2023-01-16 14:44:33', 'EMP-0003-25', 'Logged out.'),
(419, '2023-01-16 14:44:47', 'EMP-0003-25', 'An admin logged in.'),
(420, '2023-01-16 14:45:34', 'EMP-0003-25', 'Logged out.'),
(421, '2023-01-16 14:45:43', 'EMP-0000-25', 'An employee logged in.'),
(422, '2023-01-16 14:46:02', 'EMP-0000-25', 'Logged out.'),
(423, '2023-01-16 14:46:08', 'EMP-0233-25', 'A library admin logged in.'),
(424, '2023-01-16 14:46:54', 'EMP-0233-25', 'Logged out.'),
(425, '2023-01-16 14:47:00', 'EMP-0203-25', 'A research admin logged in.'),
(426, '2023-01-16 14:47:05', 'EMP-0203-25', 'Logged out.'),
(427, '2023-01-16 14:47:13', 'EMP-0203-25', 'A research admin logged in.'),
(428, '2023-01-16 14:47:28', 'EMP-0203-25', 'Employee EMP-0203-25 added the reports.'),
(429, '2023-01-16 14:47:51', 'EMP-0203-25', 'Logged out.'),
(430, '2023-01-16 14:47:57', 'EMP-0233-25', 'A library admin logged in.'),
(431, '2023-01-16 14:49:53', 'EMP-0233-25', 'Logged out.'),
(432, '2023-01-16 14:50:01', 'EMP-0203-25', 'A research admin logged in.'),
(433, '2023-01-16 14:52:06', 'EMP-0003-25', 'An admin logged in.'),
(434, '2023-01-16 14:52:11', 'EMP-0203-25', 'Logged out.'),
(435, '2023-01-16 14:52:13', 'EMP-0233-25', 'A library admin logged in.'),
(436, '2023-01-16 15:13:19', 'EMP-0003-25', 'An admin logged in.'),
(437, '2023-01-16 15:13:25', 'EMP-0003-25', 'Logged out.'),
(438, '2023-01-16 15:13:31', 'EMP-0233-25', 'A library admin logged in.'),
(439, '2023-01-16 15:51:15', 'EMP-0233-25', 'Logged out.'),
(440, '2023-01-16 15:55:45', 'EMP-0233-25', 'A library admin logged in.'),
(441, '2023-01-16 15:59:06', 'EMP-0233-25', 'A library admin logged in.'),
(442, '2023-01-16 22:17:58', 'EMP-0233-25', 'A library admin logged in.'),
(443, '2023-01-16 22:22:14', 'EMP-0003-25', 'An admin logged in.'),
(444, '2023-01-16 22:25:37', 'EMP-0003-25', 'An admin logged in.'),
(445, '2023-01-16 22:27:39', 'EMP-0203-25', 'A research admin logged in.'),
(446, '2023-01-16 22:27:44', 'EMP-0203-25', 'Logged out.'),
(447, '2023-01-16 22:27:49', 'EMP-0233-25', 'A library admin logged in.'),
(448, '2023-01-16 22:28:24', 'EMP-0233-25', 'A library admin logged in.'),
(449, '2023-01-16 22:29:53', 'EMP-0233-25', 'Logged out.'),
(450, '2023-01-16 22:29:55', 'EMP-0233-25', 'A library admin logged in.'),
(451, '2023-01-16 22:31:27', 'EMP-0233-25', 'Employee EMP-0233-25 edited a book with the title of Digital Tools And Technique For Process Documentation: Capturing And Mining Best Practice And Lesson Learned.'),
(452, '2023-01-16 22:31:34', 'EMP-0233-25', 'Employee EMP-0233-25 edited a book with the title of Digital Tools And Technique For Process Documentation: Capturing And Mining Best Practice And Lesson Learned.'),
(453, '2023-01-16 22:32:00', 'EMP-0233-25', 'Employee EMP-0233-25 edited a book with the title of Introduction to Microsoft NT Server Environment.'),
(454, '2023-01-16 22:57:37', 'EMP-0233-25', 'Logged out.'),
(455, '2023-01-16 22:57:42', 'EMP-0233-25', 'A library admin logged in.'),
(456, '2023-01-16 22:57:50', 'EMP-0233-25', 'Logged out.'),
(457, '2023-01-16 22:57:55', 'EMP-0203-25', 'A research admin logged in.'),
(458, '2023-01-16 22:59:29', 'EMP-0203-25', 'A research admin logged in.'),
(459, '2023-01-16 23:02:10', 'EMP-0203-25', 'A research admin logged in.'),
(460, '2023-01-16 23:05:25', 'EMP-0203-25', 'Logged out.'),
(461, '2023-01-16 23:05:31', 'EMP-0003-25', 'An admin logged in.'),
(462, '2023-01-16 23:07:33', 'EMP-0003-25', 'Logged out.'),
(463, '2023-01-16 23:07:38', 'EMP-0000-25', 'An employee logged in.'),
(464, '2023-01-16 23:09:33', 'EMP-0000-25', 'Logged out.'),
(465, '2023-01-16 23:09:39', 'EMP-0003-25', 'An admin logged in.'),
(466, '2023-01-16 23:10:30', 'EMP-0003-25', 'Logged out.'),
(467, '2023-01-16 23:58:45', 'EMP-0203-25', 'A research admin logged in.'),
(468, '2023-01-16 23:58:51', 'EMP-0203-25', 'Logged out.'),
(469, '2023-01-16 23:58:56', 'EMP-0233-25', 'A library admin logged in.'),
(470, '2023-01-17 11:13:56', 'EMP-0000-25', 'An employee logged in.'),
(471, '2023-01-17 11:20:38', 'EMP-0000-25', 'Logged out.'),
(472, '2023-01-17 11:20:47', 'EMP-0000-25', 'An employee logged in.'),
(473, '2023-01-17 11:21:08', 'EMP-0000-25', 'Logged out.'),
(474, '2023-01-17 11:21:16', 'EMP-0000-25', 'An employee logged in.'),
(475, '2023-01-17 11:28:04', 'EMP-0000-25', 'Logged out.'),
(476, '2023-01-17 11:28:09', 'EMP-0233-25', 'A library admin logged in.'),
(477, '2023-01-17 11:39:57', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Reading In Philosophy Of Education.'),
(478, '2023-01-17 11:42:20', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Filipino Values And National Development.'),
(479, '2023-01-17 11:45:28', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Ethics & Politics : A Call For National Renewal.'),
(480, '2023-01-17 11:46:31', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Moral Imperatives Of National Renewal.'),
(481, '2023-01-17 11:47:31', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of The Filipino Values And Visions.'),
(482, '2023-01-17 11:48:56', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Psychology Of Learning.'),
(483, '2023-01-17 11:50:03', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of 12 Little Things Every Filipino Can Do To Help Our Country..'),
(484, '2023-01-17 11:50:49', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of 12 Little Things Every Filipino Can Do To Help Our Country..'),
(485, '2023-01-17 11:51:40', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Proceeding Of The World Ethics And Integrity Forum.'),
(486, '2023-01-17 11:53:12', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Readings On Integrity Circles.'),
(487, '2023-01-17 11:54:16', 'EMP-0233-25', 'Employee EMP-0233-25 added a cd with the title of 12th ASEAN Summit			.'),
(488, '2023-01-17 11:54:28', 'EMP-0233-25', 'Employee EMP-0233-25 added a cd with the title of 12th ASEAN Summit			.'),
(489, '2023-01-17 11:54:35', 'EMP-0233-25', 'Employee EMP-0233-25 added a cd with the title of 12th ASEAN Summit			.'),
(490, '2023-01-17 11:54:47', 'EMP-0233-25', 'Employee EMP-0233-25 added a cd with the title of 2 Nov. 10		.'),
(491, '2023-01-17 11:54:56', 'EMP-0233-25', 'Employee EMP-0233-25 added a cd with the title of 3 Nov. 10		.'),
(492, '2023-01-17 11:55:05', 'EMP-0233-25', 'Employee EMP-0233-25 added a cd with the title of 3 Nov. 13		.'),
(493, '2023-01-17 11:55:27', 'EMP-0233-25', 'Employee EMP-0233-25 added a cd with the title of 38th SSEAYP 2011 (Manila, Philippines).'),
(494, '2023-01-17 11:55:44', 'EMP-0233-25', 'Employee EMP-0233-25 added a cd with the title of 38th SSEAYP 2011 (Manila, Philippines).'),
(495, '2023-01-17 11:57:17', 'EMP-0233-25', 'Employee EMP-0233-25 added a document with the title of National Plan for Children : 1991-1992.'),
(496, '2023-01-17 11:57:57', 'EMP-0233-25', 'Employee EMP-0233-25 added a document with the title of Laws on women.'),
(497, '2023-01-17 11:58:29', 'EMP-0233-25', 'Employee EMP-0233-25 added a document with the title of Laws of Malaysia act 521 Domestic Violence Act 1994.'),
(498, '2023-01-17 11:59:02', 'EMP-0233-25', 'Employee EMP-0233-25 added a document with the title of Understanding Philippine Agenda 21.'),
(499, '2023-01-17 12:02:11', 'EMP-0233-25', 'Employee EMP-0233-25 added a document with the title of Social Reform Agenda 9th SRC Meeting.'),
(500, '2023-01-17 12:02:53', 'EMP-0233-25', 'Employee EMP-0233-25 added a document with the title of Social Reform Agenda 8th SRC Meeting.'),
(501, '2023-01-17 12:05:17', 'EMP-0233-25', 'Employee EMP-0233-25 added a document with the title of Executive Summary of Regional Employment Plans.'),
(502, '2023-01-17 12:05:55', 'EMP-0233-25', 'Employee EMP-0233-25 added a document with the title of Social Reform agenda 1oth SRC Meeting.'),
(503, '2023-01-17 12:06:34', 'EMP-0233-25', 'Employee EMP-0233-25 added a document with the title of The Philippine Agenda 21 Draft Version as of May 15, 1996 Facilitated by : the Capacity 21 Project Philippines.'),
(504, '2023-01-17 12:07:02', 'EMP-0233-25', 'Employee EMP-0233-25 added a document with the title of A Primer Philippine Agenda 21.'),
(505, '2023-01-17 12:08:28', 'EMP-0233-25', 'Employee EMP-0233-25 added a journal with the title of Social Welfare and development : Journal July to December.'),
(506, '2023-01-17 12:10:16', 'EMP-0233-25', 'Employee EMP-0233-25 added a journal with the title of Social Welfare and development : Journal July to December.'),
(507, '2023-01-17 12:11:05', 'EMP-0233-25', 'Employee EMP-0233-25 added a journal with the title of Social Welfare and development : Journal July to December.'),
(508, '2023-01-17 12:11:39', 'EMP-0233-25', 'Employee EMP-0233-25 added a journal with the title of Social Welfare and development : Journal July to December.'),
(509, '2023-01-17 12:12:13', 'EMP-0233-25', 'Employee EMP-0233-25 added a journal with the title of Social Welfare and development : Journal January to June.'),
(510, '2023-01-17 12:32:10', 'EMP-0233-25', 'Employee EMP-0233-25 added a journal with the title of Social Welfare and development : Journal January to June.'),
(511, '2023-01-17 12:40:50', 'EMP-0233-25', 'Employee EMP-0233-25 added a journal with the title of Social Welfare and development : Journal January to June.'),
(512, '2023-01-17 12:41:14', 'EMP-0233-25', 'Employee EMP-0233-25 added a journal with the title of Social Welfare and development : Journal May to August.'),
(513, '2023-01-17 12:41:43', 'EMP-0233-25', 'Employee EMP-0233-25 added a journal with the title of Social Welfare and development : Journal January to March.'),
(514, '2023-01-17 12:42:59', 'EMP-0233-25', 'Employee EMP-0233-25 added a journal with the title of Social Welfare and development : Journal January to March.'),
(515, '2023-01-17 12:47:51', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of NYC Penol : Accomplishment Report.'),
(516, '2023-01-17 12:47:51', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of NYC Penol : Accomplishment Report.'),
(517, '2023-01-17 12:48:32', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of NYC : Berdeng Pilipinas.'),
(518, '2023-01-17 12:48:58', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of NYC 2010 Accomplishment Report.'),
(519, '2023-01-17 12:49:33', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of NYC Ocal Dantes : Transition Report.'),
(520, '2023-01-17 12:50:02', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of The National Movement of Young Legislators (NMYL) : Young Legislator.'),
(521, '2023-01-17 12:50:45', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of Youth Monitor : Secretary Mamba Assumes NYC Chairmanship.'),
(522, '2023-01-17 12:51:11', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of NYC : A Magazine for the youth & Environment.'),
(523, '2023-01-17 12:51:37', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of The Civil Service Reporter June.'),
(524, '2023-01-17 12:57:55', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of The Civil Service Reporter March.'),
(525, '2023-01-17 12:58:14', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of The Civil Service Reporter 1st Quarter Issue.'),
(526, '2023-01-17 12:58:41', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of The Civil Service Reporter 2ndQuarter Issue.'),
(527, '2023-01-17 13:35:51', 'EMP-0233-25', 'Employee EMP-0233-25 added a thesis with the title of The Management and Evaluation of the Community-Based Participatory Planning and development for Community Education (CBPPDCE) Training..'),
(528, '2023-01-17 13:36:23', 'EMP-0233-25', 'Employee EMP-0233-25 added a thesis with the title of The Filipino Youth: Selected Data on Health and Employment 2004-2009..'),
(529, '2023-01-17 13:36:51', 'EMP-0233-25', 'Employee EMP-0233-25 added a thesis with the title of Public Libraries as partners in Youth Development: Establishing Youth Programs and Services in the Quezon City Public Libraries..'),
(530, '2023-01-17 13:37:58', 'EMP-0233-25', 'Employee EMP-0233-25 added a thesis with the title of A Heuristic Model for Enhancing Youth Capabilities for Community Service in the NGOs. .'),
(531, '2023-01-17 13:38:15', 'EMP-0233-25', 'Employee EMP-0233-25 added a thesis with the title of Valuing service delivery satisfaction for a strengthened national youth commission.'),
(532, '2023-01-17 13:38:40', 'EMP-0233-25', 'Employee EMP-0233-25 added a thesis with the title of The Effect of national Youth Commission Volunteers Program on Active Citizenship in the philippines.'),
(533, '2023-01-17 13:39:07', 'EMP-0233-25', 'Logged out.'),
(534, '2023-01-17 13:39:13', 'EMP-0203-25', 'A research admin logged in.'),
(535, '2023-01-17 13:52:01', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of HOUSE BILLS- MAGNA CARTA OF OSYS.'),
(536, '2023-01-17 13:54:05', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of HOUSE BILL 3702- AN ACT GRANTING CASH REWARD TO RECIPIENTS OF ACADEMIC EXCELLENCE AWARDS OR LATIN HONORS IN COLLEGE.'),
(537, '2023-01-17 13:55:54', 'EMP-0203-25', 'Employee EMP-0203-25 edited a policy with the title of HOUSE BILLS- MAGNA CARTA OF OSYS.'),
(538, '2023-01-17 13:57:03', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of HOUSE BILL 7446 - AN ACT TO PROVIDE MORE SCHOLARSHIPS FOR THE CONTINUITY OF COLLEGE EDUCATION OF STUDENTS WHOSE HEAD OF FAMILIES ARE DIRECTLY AND INDIRECTLY AFFECTED BY THE COVID-19 PANDEMIC.'),
(539, '2023-01-17 13:58:01', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of \"HOUSE RESOLUTION NO. 256 RESOLUTION DIRECTING THE COMMITTEE ON DISASTER  MANAGEMENT TO REVIEW THE EXTENT OF DISASTER REDUCTION AND MANAGEMENT EDUCATION\".'),
(540, '2023-01-17 13:58:28', 'EMP-0203-25', 'Employee EMP-0203-25 edited a policy with the title of HOUSE BILLS- MAGNA CARTA OF OSYS.'),
(541, '2023-01-17 14:01:20', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of EXISTING DRAFT BILL ON STRENGTHENING THE NATIONAL YOUTH COMMISSION.');
INSERT INTO `audittrail` (`audit_no`, `date_time`, `emp_id`, `action_made`) VALUES
(542, '2023-01-17 14:02:32', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of ACADEMIC FREEDOM.'),
(543, '2023-01-17 14:03:11', 'EMP-0203-25', 'Employee EMP-0203-25 edited a policy with the title of EXISTING DRAFT BILL ON STRENGTHENING THE NATIONAL YOUTH COMMISSION.'),
(544, '2023-01-17 14:04:12', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of SENATE BILL 1952- AN ACT INSTITUTIONALIZING ANTI-DRUG ABUSE COUNCILS IN PROVINCES, CITIES, MUNICIPALITIES, AND BARANGAYS, APPROPRIATING FUNDS THEREFOR, AND FOR OTHER PURPOSES.'),
(545, '2023-01-17 14:06:05', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of SUBSTITUTE BILL FOR HOUSE BILL NO. 5174 AND 7817- “AN ACT DESIGNATING THE NATIONAL MUSIC COMPETITIONS FOR YOUNG ARTISTS (NAMCYA) AS THE NATIONAL YOUTH DEVELOPMENT PROGRAM FOR MUSIC, DEFINING ITS ROLE AND FUNCTIONS, AND APPROPRIATING FUNDS THEREFOR”..'),
(546, '2023-01-17 14:20:40', 'EMP-0000-25', 'An employee logged in.'),
(547, '2023-01-17 14:28:17', 'EMP-0000-25', 'Logged out.'),
(548, '2023-01-17 14:28:37', 'EMP-0000-25', 'An employee logged in.'),
(549, '2023-01-17 14:28:51', 'EMP-0203-25', 'Employee EMP-0203-25 added a bill with the title of AN ACT REGULATING THE MANUFACTURING, IMPORTATION, AND USE OF SINGLE-USE PLASTIC PRODUCTS, AND PROVIDING PENALTIES, LEVIES AND INCENTIVES SYSTEM FOR INDUSTRIES, BUSINESS ENTERPRISES, AND CONSUMERS.'),
(550, '2023-01-17 14:30:53', 'EMP-0203-25', 'Employee EMP-0203-25 added a bill with the title of AN ACT TO PROMOTE REFORESTATION AND TO INCREASE WOOD PRODUCTION THROUGH THE ESTABLISHMENT OF TREE GROWING AGREEMENT.'),
(551, '2023-01-17 14:31:14', 'EMP-0000-25', 'Logged out.'),
(552, '2023-01-17 14:31:43', 'EMP-0203-25', 'Employee EMP-0203-25 added a bill with the title of AN ACT TO ESTABLISH THE FOREST CADASTRE, PROVIDING FOR ITS PROCEDURES, AND FOR OTHER PURPOSES.'),
(553, '2023-01-17 14:32:27', 'EMP-0203-25', 'Employee EMP-0203-25 added a bill with the title of AN ACT PROVIDING FOR THE URBAN AND COUNTRYSIDE GREENING IN THE PHILIPPINES.'),
(554, '2023-01-17 14:32:27', 'EMP-0203-25', 'Employee EMP-0203-25 added a bill with the title of AN ACT PROVIDING FOR THE URBAN AND COUNTRYSIDE GREENING IN THE PHILIPPINES.'),
(555, '2023-01-17 14:32:48', 'EMP-0003-25', 'An admin logged in.'),
(556, '2023-01-17 14:33:02', 'EMP-0203-25', 'Employee EMP-0203-25 added a bill with the title of AN ACT DECLARING CLIMATE CHANGE EMERGENCY AND ENHANCING RESILIENCY AND ADAPTABILITY TO THE EFFECTS OF CLIMATE CHANGE.'),
(557, '2023-01-17 14:33:53', 'EMP-0203-25', 'Employee EMP-0203-25 added a bill with the title of AN ACT PROVIDING FOR THE DELINEATION OF THE SPECIFIC FOREST LIMITS OF THE PUBLIC DOMAIN AND FOR OTHER PURPOSES.'),
(558, '2023-01-17 14:34:42', 'EMP-0203-25', 'Employee EMP-0203-25 added a bill with the title of AN ACT PROVIDING FOR THE PRESERVATION, REFORESTATION, AFFORESTATION AND SUSTAINABLE DEVELOPMENT OF ALL PHILIPPINE MANGROVE RESOURCES, DEFINING FOR THAT PURPOSE THE ACTS PROHIBITED WITHIN MANGROVE FORESTS, AND FOR OTHER PURPOSES.'),
(559, '2023-01-17 14:37:23', 'EMP-0203-25', 'Logged out.'),
(560, '2023-01-17 14:37:30', 'EMP-0203-25', 'A research admin logged in.'),
(561, '2023-01-17 14:47:04', 'EMP-0003-25', 'An admin logged in.'),
(562, '2023-01-17 14:48:36', 'EMP-0003-25', 'Logged out.'),
(563, '2023-01-17 14:48:43', 'EMP-0203-25', 'A research admin logged in.'),
(564, '2023-01-17 14:52:52', 'EMP-0203-25', 'Logged out.'),
(565, '2023-01-17 14:52:58', 'EMP-0203-25', 'A research admin logged in.'),
(566, '2023-01-17 14:54:58', 'EMP-0203-25', 'Logged out.'),
(567, '2023-01-17 14:55:06', 'EMP-0003-25', 'An admin logged in.'),
(568, '2023-01-17 15:26:56', 'EMP-0003-25', 'Logged out.'),
(569, '2023-01-17 17:16:18', 'EMP-0000-25', 'An employee logged in.'),
(570, '2023-01-17 17:21:13', 'EMP-0000-25', 'Logged out.'),
(571, '2023-01-17 17:21:18', 'EMP-0233-25', 'A library admin logged in.'),
(572, '2023-01-17 17:23:41', 'EMP-0233-25', 'Employee EMP-0233-25 edited a book with the title of Introduction to Microsoft NT Server Environment.'),
(573, '2023-01-17 17:23:50', 'EMP-0233-25', 'Employee EMP-0233-25 edited a book with the title of Introduction to Microsoft NT Server Environment.'),
(574, '2023-01-17 17:37:41', 'EMP-0233-25', 'Employee EMP-0233-25 edited a journal with the title of Social Welfare and development: Journal July to December.'),
(575, '2023-01-17 17:37:51', 'EMP-0233-25', 'Employee EMP-0233-25 edited a journal with the title of Social Welfare and development: Journal July to December.'),
(576, '2023-01-17 17:38:45', 'EMP-0233-25', 'Employee EMP-0233-25 edited a magazine with the title of The Civil Service Reporter Marches.'),
(577, '2023-01-17 17:38:56', 'EMP-0233-25', 'Employee EMP-0233-25 edited a magazine with the title of The Civil Service Reporter March.'),
(578, '2023-01-17 17:41:20', 'EMP-0233-25', 'Employee EMP-0233-25 edited a thesis with the title of Perceptions on the levels of implementations of the coastal Resource Management program and their implications to food security: (A Perceptual Study of Bolinao, Pangasinan and Puerto Princesa)..'),
(579, '2023-01-17 17:41:33', 'EMP-0233-25', 'Employee EMP-0233-25 edited a thesis with the title of Perceptions on the levels of implementations of the coastal Resource Management program and their implications to food security: (A Perceptual Study of Bolinao, Pangasinan and Puerto Princesa)..'),
(580, '2023-01-17 17:48:09', 'EMP-0233-25', 'Logged out.'),
(581, '2023-01-17 17:48:17', 'EMP-0203-25', 'A research admin logged in.'),
(582, '2023-01-17 17:48:31', 'EMP-0203-25', 'Employee EMP-0203-25 added the reports.'),
(583, '2023-01-17 17:50:27', 'EMP-0203-25', 'Employee EMP-0203-25 edited a policy with the title of ACADEMIC FREEDOM.'),
(584, '2023-01-17 17:52:34', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of ONE TABLET, ONE STUDENT ACT OF 2022.'),
(585, '2023-01-17 17:52:54', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of ONE TABLET, ONE STUDENT ACT OF 2022.'),
(586, '2023-01-17 17:53:36', 'EMP-0203-25', 'Logged out.'),
(587, '2023-01-17 17:53:48', 'EMP-0203-25', 'A research admin logged in.'),
(588, '2023-01-17 17:54:17', 'EMP-0203-25', 'Logged out.'),
(589, '2023-01-17 17:54:25', 'EMP-0003-25', 'An admin logged in.'),
(590, '2023-01-17 17:55:11', 'EMP-0003-25', 'Employee EMP-0003-25 created an announcement.'),
(591, '2023-01-17 18:00:14', 'EMP-0003-25', 'An admin logged in.'),
(592, '2023-01-17 18:04:00', 'EMP-0003-25', 'Logged out.'),
(593, '2023-01-17 20:56:36', 'EMP-0000-25', 'An employee logged in.'),
(594, '2023-01-17 20:56:58', 'EMP-0000-25', 'Logged out.'),
(595, '2023-01-17 20:57:11', 'EMP-0000-25', 'An employee logged in.'),
(596, '2023-01-17 21:11:56', 'EMP-0000-25', 'Logged out.'),
(597, '2023-01-17 21:12:01', 'EMP-0233-25', 'A library admin logged in.'),
(598, '2023-01-17 21:17:09', 'EMP-0233-25', 'Logged out.'),
(599, '2023-01-17 21:17:16', 'EMP-0000-25', 'An employee logged in.'),
(600, '2023-01-17 21:22:39', 'EMP-0000-25', 'An employee logged in.'),
(601, '2023-01-17 21:24:01', 'EMP-0003-25', 'An admin logged in.'),
(602, '2023-01-17 21:32:56', 'EMP-0003-25', 'Logged out.'),
(603, '2023-01-17 21:35:11', 'EMP-0233-25', 'A library admin logged in.'),
(604, '2023-01-17 23:10:01', 'EMP-0233-25', 'Logged out.'),
(605, '2023-01-18 10:56:44', 'EMP-0003-25', 'An admin logged in.'),
(606, '0000-00-00 00:00:00', '', 'Edited profile (:Patricia Flores).'),
(607, '2023-01-18 11:21:36', 'EMP-0003-25', 'An admin logged in.'),
(608, '2023-01-18 11:46:06', 'EMP-0003-25', 'Logged out.'),
(609, '2023-01-18 12:20:12', 'EMP-0003-25', 'An admin logged in.'),
(610, '2023-01-18 13:57:20', 'EMP-0000-25', 'An employee logged in.'),
(611, '2023-01-18 14:15:50', 'EMP-0000-25', 'An employee logged in.'),
(612, '2023-01-18 14:16:28', 'EMP-0000-25', 'Logged out.'),
(613, '2023-01-18 14:18:27', '0000-01', 'An employee logged in.'),
(614, '2023-01-18 14:19:11', '0000-01', 'Logged out.'),
(615, '2023-01-18 14:56:05', 'EMP-0003-25', 'An admin logged in.'),
(616, '2023-01-18 15:01:05', 'EMP-0003-25', 'Logged out.'),
(617, '2023-01-18 15:13:03', 'EMP-0003-25', 'An admin logged in.'),
(618, '2023-01-18 15:13:11', 'EMP-0003-25', 'Logged out.'),
(619, '2023-01-18 15:16:53', '9903-05', 'A research admin logged in.'),
(620, '2023-01-18 15:17:42', '9903-05', 'Employee 9903-05 added the reports.'),
(621, '2023-01-18 15:18:59', '9903-05', 'Employee 9903-05 edited a policy with the title of HOUSE BILL NO. 10015 AND SENATE BILL NO. 2429 DESIGNATING THE NATIONAL MUSIC COMPETITIONS FOR YOUNG ARTISTS (NAMCYA) AS THE NATIONAL YOUTH DEVELOPMENT PROGRAM FOR MUSIC, DEFINING ITS ROLE AND FUNCTIONS AS SUCH, AND APPROPRIATING FUNDS THEREFOR.'),
(622, '2023-01-18 15:26:06', '9903-05', 'Employee 9903-05 added a bill with the title of Bill to promote equality among young people in the community .'),
(623, '2023-01-18 15:37:50', '0008-01', 'An employee logged in.'),
(624, '2023-01-18 15:39:09', '0008-01', 'Logged out.'),
(625, '2023-01-18 23:01:28', 'EMP-0003-25', 'An admin logged in.'),
(626, '2023-01-18 23:01:44', 'EMP-0003-25', 'Logged out.'),
(627, '2023-01-18 23:03:30', 'EMP-2000-25', 'An employee logged in.'),
(628, '2023-01-18 23:05:18', 'EMP-2000-25', 'Logged out.'),
(629, '2023-01-18 23:05:23', 'EMP-2000-25', 'An employee logged in.'),
(630, '2023-01-18 23:07:34', 'EMP-2000-25', 'Logged out.'),
(631, '2023-01-18 23:09:15', 'EMP-0003-25', 'An admin logged in.'),
(632, '2023-01-18 23:21:37', 'EMP-0203-25', 'A research admin logged in.'),
(633, '2023-01-18 23:27:24', 'EMP-0203-25', 'A research admin logged in.'),
(634, '2023-01-18 23:29:28', '0000-02', 'An employee logged in.'),
(635, '2023-01-18 23:31:10', 'EMP-0233-25', 'A library admin logged in.'),
(636, '2023-01-18 23:32:03', 'EMP-0003-25', 'An admin logged in.'),
(637, '2023-01-18 23:33:23', 'EMP-0000-25', 'An employee logged in.'),
(638, '2023-01-19 00:19:10', 'EMP-0233-25', 'A library admin logged in.'),
(639, '2023-01-19 13:39:06', 'EMP-0003-25', 'An admin logged in.'),
(640, '2023-01-19 14:12:52', 'EMP-0003-25', 'Logged out.'),
(641, '2023-01-19 14:13:21', '9903-05', 'A research admin logged in.'),
(642, '2023-01-19 14:19:06', '9903-05', 'Employee 9903-05 added a policy with the title of LETTER REQUEST FOR INPUTS FOR PH STATEMENT - GLOBAL OBSERVANCE OF THE INTERNATIONAL DAY OF EDUCATION, 24 JANUARY 2022.'),
(643, '2023-01-19 14:22:44', 'EMP-0003-25', 'An admin logged in.'),
(644, '2023-01-19 14:29:56', 'EMP-0003-25', 'Logged out.'),
(645, '2023-01-19 14:30:15', '9703-25', 'An admin logged in.'),
(646, '2023-01-19 14:30:34', '9703-25', 'Employee 9703-25 created an announcement.'),
(647, '2023-01-19 14:56:32', '9703-25', 'An admin logged in.'),
(648, '2023-01-19 15:03:37', '9703-25', 'Logged out.'),
(649, '2023-01-19 15:04:49', '9703-26', 'A library admin logged in.'),
(650, '2023-01-19 15:14:48', '9703-26', 'A library admin logged in.'),
(651, '2023-01-19 15:34:13', '', 'Logged out.'),
(652, '2023-01-19 15:34:27', 'EMP-0003-25', 'An admin logged in.'),
(653, '2023-01-19 15:45:28', 'EMP-0003-25', 'An admin logged in.'),
(654, '2023-01-19 15:46:02', 'EMP-0003-25', 'An admin logged in.'),
(655, '2023-01-19 15:56:20', 'EMP-0003-25', 'An admin logged in.'),
(656, '2023-01-20 14:39:34', 'EMP-0003-25', 'An admin logged in.'),
(657, '2023-01-20 14:39:39', 'EMP-0003-25', 'Logged out.'),
(658, '2023-01-20 14:39:45', 'EMP-0000-25', 'An employee logged in.'),
(659, '2023-01-20 14:40:03', 'EMP-0000-25', 'Logged out.'),
(660, '2023-01-20 14:40:16', 'EMP-0203-25', 'A research admin logged in.'),
(661, '2023-01-20 14:40:39', 'EMP-0203-25', 'Employee EMP-0203-25 edited a policy with the title of LETTER REQUEST FOR INPUTS FOR PH STATEMENT - GLOBAL OBSERVANCE OF THE INTERNATIONAL DAY OF EDUCATION, 24 JANUARY 2022.'),
(662, '2023-01-20 14:40:44', 'EMP-0203-25', 'Logged out.'),
(663, '2023-01-20 15:33:21', '090509', 'An employee logged in.'),
(664, '2023-01-20 15:33:45', '090509', 'An employee logged in.'),
(665, '2023-01-20 15:55:12', '090509', 'Logged out.'),
(666, '2023-01-20 16:04:47', 'EMP-0000-25', 'An employee logged in.'),
(667, '2023-01-20 16:07:52', 'EMP-0000-25', 'Logged out.'),
(668, '2023-01-20 16:12:26', '9809-14', 'An employee logged in.'),
(669, '2023-01-20 16:14:03', '9809-14', 'Logged out.'),
(670, '2023-01-20 16:21:06', '9610-14', 'An employee logged in.'),
(671, '2023-01-20 16:21:37', '9610-14', 'An employee logged in.'),
(672, '2023-01-20 16:28:12', '0408-04', 'An employee logged in.'),
(673, '2023-01-20 16:33:01', '0408-04', 'Logged out.'),
(674, '2023-01-20 16:38:57', '0008-01', 'An employee logged in.'),
(675, '2023-01-20 16:43:53', '2112-17', 'An employee logged in.'),
(676, '2023-01-20 16:49:56', '1504-01', 'An employee logged in.'),
(677, '2023-01-20 16:50:53', '1504-01', 'Logged out.'),
(678, '2023-01-20 17:00:34', '2012-01', 'An employee logged in.'),
(679, '2023-01-20 17:02:48', 'EMP-0000-25', 'An employee logged in.'),
(680, '2023-01-20 17:04:10', '2203-14', 'An employee logged in.'),
(681, '2023-01-20 17:07:33', '0408-06', 'An employee logged in.'),
(682, '2023-01-20 17:09:14', '2203-14', 'Logged out.'),
(683, '2023-01-20 17:14:02', '2202-05', 'An employee logged in.'),
(684, '2023-01-20 17:14:34', '2202-05', 'An employee logged in.'),
(685, '2023-01-20 17:14:52', '2001-04', 'An employee logged in.'),
(686, '2023-01-20 17:18:12', '0606-11', 'An employee logged in.'),
(687, '2023-01-20 17:19:06', '0606-11', 'Logged out.'),
(688, '2023-01-20 17:20:31', '1705-01', 'An employee logged in.'),
(689, '2023-01-20 17:26:39', '2207-22', 'An employee logged in.'),
(690, '2023-01-20 17:34:53', '1308-01', 'An employee logged in.'),
(691, '2023-01-20 17:35:44', '1308-01', 'Logged out.'),
(692, '2023-01-20 17:38:15', '9706-35', 'An employee logged in.'),
(693, '2023-01-20 17:39:45', '9706-35', 'Logged out.'),
(694, '2023-01-20 17:43:51', '0305-08', 'An employee logged in.'),
(695, '2023-01-20 17:44:48', '0305-08', 'Logged out.'),
(696, '2023-01-20 17:49:53', 'D-1908-15', 'An employee logged in.'),
(697, '2023-01-20 17:50:40', 'D-1908-15', 'Logged out.'),
(698, '2023-01-20 17:58:23', '9610-17', 'An employee logged in.'),
(699, '2023-01-20 17:59:17', '9610-17', 'Logged out.'),
(700, '2023-01-20 18:07:25', '9909-19', 'An employee logged in.'),
(701, '2023-01-20 20:15:12', 'D-2212-28', 'An employee logged in.'),
(702, '2023-01-20 20:23:10', 'EMP-0233-25', 'A library admin logged in.'),
(703, '2023-01-20 21:23:52', 'EMP-0000-25', 'An employee logged in.'),
(704, '2023-01-20 21:24:00', 'EMP-0000-25', 'Logged out.'),
(705, '2023-01-20 21:24:06', 'EMP-0003-25', 'An admin logged in.'),
(706, '2023-01-20 21:25:52', 'EMP-0003-25', 'Employee EMP-0003-25 edited a cd with the title of 38th SSEAYP 2011 (Manila, Philippines)..'),
(707, '2023-01-20 21:29:08', 'EMP-0233-25', 'An employee logged in.'),
(708, '2023-01-20 21:29:22', 'EMP-0233-25', 'An employee logged in.'),
(709, '2023-01-20 21:31:04', 'EMP-0233-25', 'An employee logged in.'),
(710, '2023-01-20 21:32:52', 'EMP-0003-25', 'Employee EMP-0003-25 added a bill with the title of 1.'),
(711, '2023-01-20 21:36:27', 'EMP-0003-25', 'An admin logged in.'),
(712, '2023-01-20 21:37:19', 'EMP-0003-25', 'Employee EMP-0003-25 edited a bill with the title of AN ACT PROVIDING FOR THE URBAN AND COUNTRYSIDE GREENING IN THE PHILIPPINES.'),
(713, '2023-01-20 21:37:24', 'EMP-0003-25', 'Employee EMP-0003-25 edited a bill with the title of AN ACT EXEMPTING QUALIFIED INDIGENT FILIPINOS FROM PAYMENT OF PROFESSIONAL EXAMINATION FEES AND FOR .'),
(714, '2023-01-20 21:38:57', 'EMP-0003-25', 'An admin logged in.'),
(715, '2023-01-20 21:45:21', 'EMP-0003-25', 'Logged out.'),
(716, '2023-01-20 21:45:27', 'EMP-0000-25', 'An employee logged in.'),
(717, '2023-01-20 21:48:23', 'EMP-0000-25', 'Logged out.'),
(718, '2023-01-20 21:48:30', 'EMP-0203-25', 'A research admin logged in.'),
(719, '2023-01-20 21:50:32', 'EMP-0003-25', 'Employee EMP-0003-25 edited a bill with the title of AN ACT PROVIDING FOR THE PRESERVATION, REFORESTATION, AFFORESTATION AND SUSTAINABLE DEVELOPMENT OF A.'),
(720, '2023-01-20 21:50:43', 'EMP-0003-25', 'Employee EMP-0003-25 edited a bill with the title of AN ACT PROVIDING FOR THE PRESERVATION, REFORESTATION, AFFORESTATION AND SUSTAINABLE DEVELOPMENT OF A.'),
(721, '2023-01-20 22:00:46', 'EMP-0003-25', 'Logged out.'),
(722, '2023-01-20 22:00:53', 'EMP-0203-25', 'A research admin logged in.'),
(723, '2023-01-20 22:01:53', 'EMP-0203-25', 'Logged out.'),
(724, '2023-01-20 22:02:15', 'EMP-0003-25', 'An admin logged in.'),
(725, '2023-01-20 23:41:20', 'EMP-0003-25', 'An admin logged in.'),
(726, '2023-01-20 23:48:52', 'EMP-0003-25', 'Employee EMP-0003-25 edited a book with the title of 12 Little Things Every Filipino Can Do To Help Our Country..'),
(727, '2023-01-20 23:54:18', 'EMP-0003-25', 'Employee EMP-0003-25 edited a book with the title of Introduction to Microsoft NT Server Environment.'),
(728, '2023-01-20 23:54:26', 'EMP-0003-25', 'Employee EMP-0003-25 edited a book with the title of Introduction to Microsoft NT Server Environment.'),
(729, '2023-01-20 23:54:54', 'EMP-0003-25', 'Employee EMP-0003-25 edited a cd with the title of 12th ASEAN Summits	.'),
(730, '2023-01-20 23:55:01', 'EMP-0003-25', 'Employee EMP-0003-25 edited a cd with the title of 12th ASEAN Summit.'),
(731, '2023-01-20 23:55:06', 'EMP-0233-25', 'An employee logged in.'),
(732, '2023-01-20 23:56:05', 'EMP-0003-25', 'Employee EMP-0003-25 edited a document with the title of Social Reform agenda 10th SRC Meeting.'),
(733, '2023-01-20 23:56:33', 'EMP-0003-25', 'Employee EMP-0003-25 edited a journal with the title of Social Welfare and development: Journal July to December.'),
(734, '2023-01-20 23:56:43', 'EMP-0003-25', 'Employee EMP-0003-25 edited a journal with the title of Social Welfare and development: Journal July to December.'),
(735, '2023-01-20 23:57:14', 'EMP-0003-25', 'Employee EMP-0003-25 edited a magazine with the title of NYC : Youth Monitors.'),
(736, '2023-01-20 23:57:20', 'EMP-0003-25', 'Employee EMP-0003-25 edited a magazine with the title of NYC : Youth Monitor.'),
(737, '2023-01-20 23:57:44', 'EMP-0003-25', 'Employee EMP-0003-25 edited a thesis with the title of Valuing service delivery satisfaction for a strengthened national youth commission.'),
(738, '2023-01-20 23:57:49', 'EMP-0003-25', 'Employee EMP-0003-25 edited a thesis with the title of Valuing service delivery satisfaction for a strengthened national youth commission.'),
(739, '2023-01-21 00:05:27', 'EMP-0003-25', 'Employee EMP-0003-25 edited a policy with the title of 2022 IHBSS MSM QUESTIONNAIRE REVISION.'),
(740, '2023-01-21 00:06:22', 'EMP-0003-25', 'Employee EMP-0003-25 edited a bill with the title of AN ACT PROVIDING FOR THE PRESERVATION, REFORESTATION, AFFORESTATION AND SUSTAINABLE DEVELOPMENT OF A.'),
(741, '2023-01-21 00:06:30', 'EMP-0003-25', 'Employee EMP-0003-25 edited a bill with the title of AN ACT PROVIDING FOR THE PRESERVATION, REFORESTATION, AFFORESTATION AND SUSTAINABLE DEVELOPMENT OF A.'),
(742, '2023-01-21 00:07:30', 'EMP-0003-25', 'Logged out.'),
(743, '2023-01-21 00:14:15', 'EMP-0003-25', 'An admin logged in.'),
(744, '2023-01-21 00:16:24', 'EMP-0003-25', 'Logged out.'),
(745, '2023-01-21 00:25:23', 'EMP-0003-25', 'An admin logged in.'),
(746, '2023-01-21 08:08:41', '2111-12', 'An employee logged in.'),
(747, '2023-01-21 13:07:11', 'EMP-0003-25', 'An admin logged in.'),
(748, '2023-01-21 13:07:24', 'EMP-0003-25', 'Logged out.'),
(749, '2023-01-21 14:35:02', 'EMP-0003-25', 'An admin logged in.'),
(750, '2023-01-21 17:13:57', 'EMP-0003-25', 'An admin logged in.'),
(751, '2023-01-21 19:23:42', '9708-40', 'An employee logged in.'),
(752, '2023-01-21 20:29:50', '0905-08', 'An employee logged in.'),
(753, '2023-01-21 20:34:26', '9708-40', 'An employee logged in.'),
(754, '2023-01-21 20:38:42', '2111-12', 'An employee logged in.'),
(755, '2023-01-21 20:49:03', 'D-2212-28', 'An employee logged in.'),
(756, '2023-01-21 20:49:28', '1711-01', 'An employee logged in.'),
(757, '2023-01-21 21:02:06', '2111-16', 'An employee logged in.'),
(758, '2023-01-21 22:21:51', 'EMP-0003-25', 'An admin logged in.'),
(759, '2023-01-21 22:21:58', 'EMP-0003-25', 'An admin logged in.'),
(760, '2023-01-22 07:07:28', 'EMP-0003-25', 'An admin logged in.'),
(761, '2023-01-22 07:14:22', 'EMP-0003-25', 'An admin logged in.'),
(762, '2023-01-22 18:56:57', 'EMP-0233-25', 'A library admin logged in.'),
(763, '2023-01-22 19:55:00', 'EMP-0003-25', 'An admin logged in.'),
(764, '2023-01-22 20:19:34', 'EMP-0003-25', 'Logged out.'),
(765, '2023-01-22 21:33:33', 'EMP-0003-25', 'An admin logged in.'),
(766, '2023-01-22 22:05:37', 'EMP-0003-25', 'Logged out.'),
(767, '2023-01-22 22:15:45', 'EMP-0003-25', 'An admin logged in.'),
(768, '2023-01-22 22:16:00', 'EMP-0003-25', 'An admin logged in.'),
(769, '2023-01-22 22:33:24', 'EMP-0003-25', 'An admin logged in.'),
(770, '2023-01-22 22:34:59', 'EMP-0003-25', 'An admin logged in.'),
(771, '2023-01-22 23:00:00', 'EMP-0003-25', 'Logged out.'),
(772, '2023-01-22 23:02:02', 'EMP-0233-25', 'A library admin logged in.'),
(773, '2023-01-22 23:02:28', 'EMP-0233-25', 'Logged out.'),
(774, '2023-01-22 23:03:25', 'EMP-0003-25', 'An admin logged in.'),
(775, '2023-01-22 23:03:35', 'EMP-0003-25', 'An admin logged in.'),
(776, '2023-01-22 23:04:14', 'EMP-0003-25', 'Employee EMP-0003-25 edited a book with the title of Introduction to Microsoft NT Server Environment.'),
(777, '2023-01-22 23:04:21', 'EMP-0003-25', 'Employee EMP-0003-25 edited a book with the title of Introduction to Microsoft NT Server Environment.'),
(778, '2023-01-22 23:06:00', 'EMP-0003-25', 'Employee EMP-0003-25 edited a cd with the title of \"Muslim Youth\" Episodes.'),
(779, '2023-01-22 23:06:05', 'EMP-0003-25', 'Employee EMP-0003-25 edited a cd with the title of \"Muslim Youth\" Episode.'),
(780, '2023-01-22 23:06:09', 'EMP-0233-25', 'An employee logged in.'),
(781, '2023-01-22 23:06:28', 'EMP-0003-25', 'Employee EMP-0003-25 edited a document with the title of The National Technical Education and Skills Development Plan, 1999-2004.'),
(782, '2023-01-22 23:06:38', 'EMP-0003-25', 'Employee EMP-0003-25 edited a document with the title of The National Technical Education and Skills Development Plan, 1999-2004.'),
(783, '2023-01-22 23:07:17', 'EMP-0003-25', 'Employee EMP-0003-25 edited a document with the title of National Plan for Children : 1991-1992.'),
(784, '2023-01-22 23:07:23', 'EMP-0003-25', 'Employee EMP-0003-25 edited a document with the title of National Plan for Children : 1991-1992.'),
(785, '2023-01-22 23:14:51', 'EMP-0003-25', 'Employee EMP-0003-25 edited a journal with the title of Social Welfare and development: Journal July to December.'),
(786, '2023-01-22 23:14:52', 'EMP-0003-25', 'Employee EMP-0003-25 edited a journal with the title of Social Welfare and development: Journal July to December.'),
(787, '2023-01-22 23:15:00', 'EMP-0003-25', 'Employee EMP-0003-25 edited a journal with the title of Social Welfare and development: Journal July to December.'),
(788, '2023-01-22 23:19:51', 'EMP-0003-25', 'Employee EMP-0003-25 edited a magazine with the title of The Civil Service Reporter March.'),
(789, '2023-01-22 23:19:57', 'EMP-0003-25', 'Employee EMP-0003-25 edited a magazine with the title of The Civil Service Reporter March.'),
(790, '2023-01-22 23:20:01', 'EMP-0003-25', 'Employee EMP-0003-25 edited a magazine with the title of NYC 2010 Accomplishment Report.'),
(791, '2023-01-22 23:21:12', 'EMP-0003-25', 'Employee EMP-0003-25 edited a thesis with the title of Perceptions on the levels of implementations of the coastal Resource Management program and their implications to food security: (A Perceptual Study of Bolinao, Pangasinan and Puerto Princesa)..'),
(792, '2023-01-22 23:21:18', 'EMP-0003-25', 'Employee EMP-0003-25 edited a thesis with the title of Perceptions on the levels of implementations of the coastal Resource Management program and their implications to food security: (A Perceptual Study of Bolinao, Pangasinan and Puerto Princesa)..'),
(793, '2023-01-22 23:23:25', 'EMP-0003-25', 'Employee EMP-0003-25 edited a policy with the title of \"REQUEST FOR COMMENTS BY THE OFFICE OF THE PRESIDENT TO THE BICAMERAL CONFERENCE COMMITTEE APPROVED CONSOLIDATED BILLS OF SENATE BILL NO. 2239/HOUSE BILL NO. 9007\".'),
(794, '2023-01-22 23:23:38', 'EMP-0003-25', 'Employee EMP-0003-25 edited a policy with the title of \"REQUEST FOR COMMENTS BY THE OFFICE OF THE PRESIDENT TO THE BICAMERAL CONFERENCE COMMITTEE APPROVED CONSOLIDATED BILLS OF SENATE BILL NO. 2239/HOUSE BILL NO. 9007\".'),
(795, '2023-01-22 23:27:27', 'EMP-0003-25', 'Employee EMP-0003-25 edited a bill with the title of AN ACT EXEMPTING QUALIFIED INDIGENT FILIPINOS FROM PAYMENT OF PROFESSIONAL EXAMINATION FEES AND FOR .'),
(796, '2023-01-23 00:08:30', 'EMP-0003-25', 'An admin logged in.'),
(797, '2023-01-23 00:08:55', 'EMP-0003-25', 'Employee EMP-0003-25 edited a policy with the title of HOUSE BILLS- MAGNA CARTA OF OSYS.'),
(798, '2023-01-23 00:20:46', 'EMP-0003-25', 'An admin logged in.'),
(799, '2023-01-23 00:23:26', '', 'Employee EMP-0003-25 deleted Employee .'),
(800, '2023-01-23 02:30:59', 'EMP-0003-25', 'An admin logged in.'),
(801, '2023-01-23 02:36:56', 'EMP-0003-25', 'An admin logged in.'),
(802, '2023-01-23 09:04:21', 'EMP-0003-25', 'An admin logged in.'),
(803, '2023-01-23 10:23:24', 'EMP-0003-25', 'An admin logged in.'),
(804, '2023-01-23 12:11:35', '2203-14', 'A research admin logged in.'),
(805, '2023-01-24 14:56:23', '2203-14', 'A research admin logged in.'),
(806, '2023-01-24 14:59:06', '2203-14', 'Logged out.'),
(807, '2023-01-24 21:49:43', 'EMP-0233-25', 'A library admin logged in.'),
(808, '2023-01-24 21:49:55', 'EMP-0233-25', 'Logged out.'),
(809, '2023-01-24 21:50:00', 'EMP-0233-25', 'A library admin logged in.'),
(810, '2023-01-24 21:50:08', 'EMP-0233-25', 'Logged out.'),
(811, '2023-01-24 22:02:11', 'EMP-0233-25', 'A library admin logged in.'),
(812, '2023-01-24 22:04:32', 'EMP-0233-25', 'A library admin logged in.'),
(813, '2023-01-24 22:05:08', 'EMP-0233-25', 'Logged out.'),
(814, '2023-01-24 22:05:13', 'EMP-0233-25', 'A library admin logged in.'),
(815, '2023-01-24 22:09:58', 'EMP-0233-25', 'Employee EMP-0233-25 edited a book with the title of Proceeding Of The World Ethics And Integrity Forum.'),
(816, '2023-01-24 22:10:03', 'EMP-0233-25', 'Employee EMP-0233-25 edited a book with the title of Proceeding Of The World Ethics And Integrity Forum.'),
(817, '2023-01-24 22:14:31', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Surviving The Odds.'),
(818, '2023-01-24 22:19:01', 'EMP-0233-25', 'Employee EMP-0233-25 edited a book with the title of Filipino Values And National Development.'),
(819, '2023-01-24 22:21:09', 'EMP-0233-25', 'Employee EMP-0233-25 added a cd with the title of · “Globalization of Education” Episode					.'),
(820, '2023-01-24 22:21:18', 'EMP-0233-25', 'Employee EMP-0233-25 edited a cd with the title of · “Globalization of Education” Episode	.'),
(821, '2023-01-24 22:21:28', 'EMP-0233-25', 'Employee EMP-0233-25 edited a cd with the title of “Globalization of Education” Episode	.'),
(822, '2023-01-24 22:21:29', 'EMP-0233-25', 'Employee EMP-0233-25 edited a cd with the title of “Globalization of Education” Episode	.'),
(823, '2023-01-24 22:26:42', 'EMP-0233-25', 'Employee EMP-0233-25 added a document with the title of Claiming our Rights : A Manual for Women’s Human Rights Education in Muslim Societies.'),
(824, '2023-01-24 22:26:51', 'EMP-0233-25', 'Employee EMP-0233-25 edited a document with the title of Claiming our Rights : A Manual for Women’s Human Rights Education in Muslim Societies.'),
(825, '2023-01-24 22:26:59', 'EMP-0233-25', 'Employee EMP-0233-25 edited a document with the title of Claiming our Rights : A Manual for Women’s Human Rights Education in Muslim Societies.'),
(826, '2023-01-24 22:32:50', 'EMP-0233-25', 'Employee EMP-0233-25 added a journal with the title of Social Welfare and development : Journal July to December.'),
(827, '2023-01-24 22:32:59', 'EMP-0233-25', 'Employee EMP-0233-25 edited a journal with the title of Social Welfare and development : Journal July to December.'),
(828, '2023-01-24 22:34:52', 'EMP-0233-25', 'Employee EMP-0233-25 added a magazine with the title of 2nd philippine national plan of action for children (2nd NPAC) executive summary.'),
(829, '2023-01-24 22:34:59', 'EMP-0233-25', 'Employee EMP-0233-25 edited a magazine with the title of 2nd philippine national plan of action for children (2nd NPAC) executive summary.'),
(830, '2023-01-24 22:56:20', 'EMP-0233-25', 'Employee EMP-0233-25 added a thesis with the title of The Effect of national Youth Commission Volunteers Program on Active Citizenship in the philippines.'),
(831, '2023-01-24 22:56:32', 'EMP-0233-25', 'Employee EMP-0233-25 edited a thesis with the title of The Effect of national Youth Commission Volunteers Program on Active Citizenship in the philippines.'),
(832, '2023-01-24 22:56:38', 'EMP-0233-25', 'Employee EMP-0233-25 edited a thesis with the title of The Effect of national Youth Commission Volunteers Program on Active Citizenship in the philippines.'),
(833, '2023-01-24 22:58:45', 'EMP-0233-25', 'Logged out.'),
(834, '2023-01-24 22:59:12', 'EMP-0000-25', 'An employee logged in.'),
(835, '2023-01-24 23:01:22', 'EMP-0000-25', 'Logged out.'),
(836, '2023-01-24 23:01:27', 'EMP-0000-25', 'An employee logged in.'),
(837, '2023-01-24 23:13:13', 'EMP-0000-25', 'An employee logged in.'),
(838, '2023-01-24 23:18:07', 'EMP-0000-25', 'An employee logged in.'),
(839, '2023-01-24 23:27:35', 'EMP-0000-25', 'Logged out.'),
(840, '2023-01-24 23:34:54', 'EMP-0203-25', 'A research admin logged in.'),
(841, '2023-01-24 23:35:09', '', 'Edited profile (:Jane Aguilar).'),
(842, '2023-01-24 23:35:38', '', 'Edited profile (:Janel Aguilar).'),
(843, '2023-01-24 23:36:01', '', 'Edited profile (:Janel Aguilar).'),
(844, '2023-01-24 23:44:24', 'EMP-0203-25', 'A research admin logged in.'),
(845, '2023-01-25 00:10:31', 'EMP-0203-25', 'Employee EMP-0203-25 edited a policy with the title of \"HOUSE RESOLUTION NO. 256 RESOLUTION DIRECTING THE COMMITTEE ON DISASTER  MANAGEMENT TO REVIEW THE EXTENT OF DISASTER REDUCTION AND MANAGEMENT EDUCATION\".'),
(846, '2023-01-25 00:29:02', 'EMP-0203-25', 'Employee EMP-0203-25 added a policy with the title of AN ACT GRANTING JURISDICTION AND PROVIDING THE  MANNER FOR CONDUCT OF DISCIPLINARY AND NON- DISCIPLINARY ACTIONS OF THE PEDERASYON NG MGA SANGGUNIANG KABATAN, AMENDING FOR PURPOSE SECTION 21 OF RA 10742 OTHERWISE KNOWN AS THE SK REFORM ACT OF 2015 .'),
(847, '2023-01-25 00:30:33', 'EMP-0203-25', 'Employee EMP-0203-25 edited a policy with the title of HOUSE BILL 3702- AN ACT GRANTING CASH REWARD TO RECIPIENTS OF ACADEMIC EXCELLENCE AWARDS OR LATIN HONORS IN COLLEGE.'),
(848, '2023-01-25 00:34:51', 'EMP-0203-25', 'Employee EMP-0203-25 added a bill with the title of AN ACT REGULATING THE MANUFACTURING, IMPORTATION, AND USE OF SINGLE-USE PLASTIC PRODUCTS, AND PROVIDING PENALTIES, LEVIES AND INCENTIVES SYSTEM FOR INDUSTRIES, BUSINESS ENTERPRISES, AND CONSUMERS.'),
(849, '2023-01-25 00:36:36', 'EMP-0203-25', 'Employee EMP-0203-25 edited a bill with the title of AN ACT REGULATING THE MANUFACTURING, IMPORTATION, AND USE OF SINGLE-USE PLASTIC PRODUCTS, AND PROVID.'),
(850, '2023-01-25 00:40:23', 'EMP-0203-25', 'Logged out.'),
(851, '2023-01-25 00:40:39', 'EMP-0003-25', 'An admin logged in.'),
(852, '2023-01-25 00:41:10', 'EMP-0003-25', 'Employee EMP-0003-25 created an announcement.'),
(853, '0000-00-00 00:00:00', '', 'Edited profile (:Patricia Floress).'),
(854, '2023-01-25 00:42:45', 'EMP-0003-25', 'Logged out.'),
(855, '2023-01-25 00:42:53', 'EMP-0003-25', 'An admin logged in.'),
(856, '0000-00-00 00:00:00', '', 'Edited profile (:Patricia Floress).'),
(857, '0000-00-00 00:00:00', '', 'Edited profile (:Patricia Flores).'),
(858, '2023-01-25 00:46:16', 'EMP-0003-25', 'An admin logged in.'),
(859, '2023-01-25 00:56:03', 'EMP-0003-25', 'Employee EMP-0003-25 added a book with the title of Innovations –Excellence In Local Governance.'),
(860, '2023-01-25 00:56:16', 'EMP-0003-25', 'Employee EMP-0003-25 edited a book with the title of Innovations –Excellence In Local Governance.'),
(861, '2023-01-25 01:01:07', 'EMP-0003-25', 'Employee EMP-0003-25 added a cd with the title of “Muslim Youth” Episode				.'),
(862, '2023-01-25 01:01:16', 'EMP-0003-25', 'Employee EMP-0003-25 edited a cd with the title of “Muslim Youth” Episodes			.'),
(863, '2023-01-25 01:01:27', 'EMP-0003-25', 'An employee logged in.'),
(864, '2023-01-25 01:03:26', 'EMP-0003-25', 'Employee EMP-0003-25 added a document with the title of Claiming our Rights : A Manual for Women’s Human Rights Education in Muslim Societies.'),
(865, '2023-01-25 01:03:27', 'EMP-0003-25', 'Employee EMP-0003-25 added a document with the title of Claiming our Rights : A Manual for Women’s Human Rights Education in Muslim Societies.'),
(866, '2023-01-25 01:03:33', 'EMP-0003-25', 'Employee EMP-0003-25 edited a document with the title of Claiming our Rights : A Manual for Women’s Human Rights Education in Muslim Societies.'),
(867, '2023-01-25 01:05:09', 'EMP-0003-25', 'Employee EMP-0003-25 added a journal with the title of The Human Right Journal Vol. no II.'),
(868, '2023-01-25 01:05:17', 'EMP-0003-25', 'Employee EMP-0003-25 edited a journal with the title of The Human Right Journal Vol. no II.'),
(869, '2023-01-25 01:06:16', 'EMP-0003-25', 'Employee EMP-0003-25 added a magazine with the title of Get every one in the Picture : Asian and pacific Civil Registration and Vital Statistics Decade.'),
(870, '2023-01-25 01:06:27', 'EMP-0003-25', 'Employee EMP-0003-25 edited a magazine with the title of Get every one in the Picture : Asian and pacific Civil Registration and Vital Statistics Decade.'),
(871, '2023-01-25 01:09:00', 'EMP-0003-25', 'Employee EMP-0003-25 added a thesis with the title of Valuing service delivery satisfaction for a strengthened national youth commission.'),
(872, '2023-01-25 01:09:19', 'EMP-0003-25', 'Employee EMP-0003-25 edited a thesis with the title of Valuing service delivery satisfaction for a strengthened national youth commission.'),
(873, '2023-01-25 01:12:14', 'EMP-0003-25', 'Employee EMP-0003-25 added a policy with the title of CRISIS CENTERS BILLS (HB 4967, 5186, 6007, 6066 & 6393).'),
(874, '2023-01-25 01:13:00', 'EMP-0003-25', 'Employee EMP-0003-25 edited a policy with the title of CRISIS CENTERS BILLS (HB 4967, 5186, 6007, 6066 & 6393).'),
(875, '2023-01-25 01:15:06', 'EMP-0003-25', 'Employee EMP-0003-25 added a bill with the title of AN ACT INSTITUTIONALIZING SUSTAINABILITY IN GOVERNMENT-FUNDED SPORTS FACILITIES.'),
(876, '2023-01-25 01:15:36', 'EMP-0003-25', 'Employee EMP-0003-25 edited a bill with the title of AN ACT INSTITUTIONALIZING SUSTAINABILITY IN GOVERNMENT-FUNDED SPORTS FACILITIES.'),
(877, '2023-01-25 19:04:33', 'EMP-0000-25', 'An employee logged in.'),
(878, '2023-01-25 19:12:01', 'EMP-0000-25', 'Logged out.'),
(879, '2023-01-25 19:12:08', 'EMP-0003-25', 'An admin logged in.'),
(880, '0000-00-00 00:00:00', '', 'Edited profile (:Patricia Junelle Flores).'),
(881, '0000-00-00 00:00:00', 'EMP-0003-25', 'Edited profile (EMP-0003-25:Patricia  Flores).'),
(882, '2023-01-25 19:15:59', 'EMP-0003-25', 'Logged out.'),
(883, '2023-01-25 19:16:03', 'EMP-0203-25', 'A research admin logged in.'),
(884, '2023-01-25 19:16:15', 'EMP-0203-25', 'Edited profile (EMP-0203-25:Nel Aguilar).'),
(885, '2023-01-25 19:16:24', 'EMP-0203-25', 'Logged out.'),
(886, '2023-01-25 19:16:29', 'EMP-0233-25', 'A library admin logged in.'),
(887, '2023-01-25 19:16:37', 'EMP-0233-25', 'Edited profile (EMP-0233-25:Ron Alteza).'),
(888, '2023-01-25 19:19:13', 'EMP-0233-25', 'Logged out.'),
(889, '2023-01-25 19:19:18', 'EMP-0203-25', 'A research admin logged in.'),
(890, '2023-01-25 19:23:34', 'EMP-0203-25', 'Logged out.'),
(891, '2023-01-25 22:58:18', 'EMP-0203-25', 'A research admin logged in.'),
(892, '2023-01-26 00:52:33', 'EMP-0233-25', 'A library admin logged in.'),
(893, '2023-01-26 00:52:52', 'EMP-0233-25', 'Edited profile (EMP-0233-25:Ron Angelo Alteza).'),
(894, '2023-01-26 00:52:56', 'EMP-0233-25', 'Logged out.'),
(895, '2023-01-26 00:52:59', 'EMP-0233-25', 'A library admin logged in.'),
(896, '2023-01-26 01:07:10', 'EMP-0233-25', 'A library admin logged in.'),
(897, '2023-01-26 01:09:09', 'EMP-0233-25', 'Logged out.'),
(898, '2023-01-26 01:09:14', 'EMP-0203-25', 'A research admin logged in.'),
(899, '2023-01-26 01:09:30', 'EMP-0203-25', 'Edited profile (EMP-0203-25:Janel Aguilar).'),
(900, '2023-01-26 01:11:44', 'EMP-0203-25', 'Logged out.'),
(901, '2023-01-26 01:11:50', 'EMP-0203-25', 'A research admin logged in.'),
(902, '2023-01-26 01:15:38', 'EMP-0203-25', 'Logged out.'),
(903, '2023-01-26 01:15:41', 'EMP-0233-25', 'A library admin logged in.'),
(904, '2023-01-26 01:16:11', 'EMP-0233-25', 'Logged out.'),
(905, '2023-01-26 01:16:17', 'EMP-0000-25', 'An employee logged in.'),
(906, '2023-01-26 01:19:23', 'EMP-0000-25', 'Logged out.'),
(907, '2023-01-26 01:19:29', 'EMP-0000-25', 'An employee logged in.'),
(908, '2023-01-26 01:20:01', 'EMP-0000-25', 'Logged out.'),
(909, '2023-01-26 01:20:06', 'EMP-0003-25', 'An admin logged in.'),
(910, '0000-00-00 00:00:00', 'EMP-0003-25', 'Edited profile (EMP-0003-25:Patrick Flores).'),
(911, '0000-00-00 00:00:00', 'EMP-0003-25', 'Edited profile (EMP-0003-25:Patricia Flores).'),
(912, '2023-01-26 01:26:18', 'EMP-0003-25', 'Employee EMP-0003-25 created an announcement.'),
(913, '2023-01-26 01:27:48', 'EMP-0003-25', 'Employee EMP-0003-25 created an announcement.'),
(914, '2023-01-26 09:36:56', '0008-01', 'An employee logged in.'),
(915, '2023-01-26 10:05:30', '0008-01', 'Logged out.'),
(916, '2023-01-26 12:00:27', 'EMP-0003-25', 'An admin logged in.'),
(917, '2023-01-26 12:02:57', 'EMP-0003-25', 'Logged out.'),
(918, '2023-01-26 12:04:48', 'EMP-0003-25', 'An admin logged in.'),
(919, '2023-01-26 12:05:15', 'EMP-0003-25', 'Employee EMP-0003-25 created an announcement.'),
(920, '2023-01-26 12:07:57', 'EMP-0003-25', 'Logged out.'),
(921, '2023-01-26 14:44:37', '9703-25', 'An admin logged in.'),
(922, '2023-01-26 21:35:38', 'EMP-2233-25', 'An employee logged in.'),
(923, '2023-01-26 21:35:46', 'EMP-2233-25', 'Logged out.'),
(924, '2023-01-26 21:36:05', 'EMP-0003-25', 'An admin logged in.'),
(925, '2023-01-29 22:19:49', 'EMP-0233-25', 'A library admin logged in.'),
(926, '2023-01-29 22:20:31', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Philippine Investments.'),
(927, '2023-01-29 22:21:28', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Making Development Happen.'),
(928, '2023-01-29 22:25:46', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Making Development Happen.'),
(929, '2023-01-29 22:26:12', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Philippine Labor Review.'),
(930, '2023-01-29 22:26:52', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Compilation Of Policy Issuances.'),
(931, '2023-01-29 22:28:41', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Haring Innovation Experiences.'),
(932, '2023-01-29 22:29:52', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Commission On Audit Regulations And Jurisprudence.'),
(933, '2023-01-29 22:30:25', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Republic Act No. 7718 And Its Implementing Rules And Regulations.'),
(934, '2023-01-29 22:31:09', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of The Local Government Code Of 1991.'),
(935, '2023-01-29 22:31:34', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Criminal Justice Journal Vol. Xvi.'),
(936, '2023-01-29 22:31:56', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Criminal Justice Journal Vol. Xviii.'),
(937, '2023-01-29 22:32:25', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Criminal Justice Journal Vol. Xviii.'),
(938, '2023-01-29 22:33:01', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Justice To Journalist To Justice.'),
(939, '2023-01-29 22:33:27', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Gender Issues And The Young Adult Population.'),
(940, '2023-01-29 22:33:51', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of The Barangay And The Local Government Code For National Transformation Handbook.'),
(941, '2023-01-29 22:34:22', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Pointers In Criminal Law.'),
(942, '2023-01-29 22:36:10', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of A Guide To The Local Government Code Of 1991.'),
(943, '2023-01-29 22:36:37', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of A Values Handbook Of The Moral Recovery Program.'),
(944, '2023-01-29 22:37:03', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Frequently Asked Question : Anti-Corruption And Integrity.'),
(945, '2023-01-29 22:37:27', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Philippine Laws Title And Subject Index Enactment Of The 9th Congress: Ra 7636- Ra 8171.'),
(946, '2023-01-29 22:37:49', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Philippine Laws Title And Subject Index Enactment Of The 9th Congress: Ra 6125-R.A.6635.'),
(947, '2023-01-29 22:38:12', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of The Laws Of The First Philippine Republic (The Laws Of Malolos) 1898 -1899..'),
(948, '2023-01-29 22:38:41', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of 1979 : Remembering The  International Year Of The Child.'),
(949, '2023-01-29 22:39:07', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Compilation Of Legal Materials On The System Of Justice For Children (Vol. 1).'),
(950, '2023-01-29 22:39:32', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of The Civil Service Law And Rules.'),
(951, '2023-01-29 22:40:10', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Omnibus Rules Implementing Book V Of Executive Order No 292 And Other Parliament Civil Services Laws.'),
(952, '2023-01-29 22:41:01', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of The Proposed Revision Of The 1987 Constitution Commission By The Consultative Commission.'),
(953, '2023-01-29 22:41:26', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of The Proposed Revision Of The 1987 Constitution Commission By The Consultative Commission.'),
(954, '2023-01-29 22:41:57', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of The Proposed Revision Of The 1987 Constitution Commission By The Consultative Commission.'),
(955, '2023-01-29 22:42:46', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of The Revised Administrative Code Of 1987 With Related Laws And Administrative Issuances.'),
(956, '2023-01-29 22:45:05', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of The Local Government Code Of 1991.'),
(957, '2023-01-29 22:45:42', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of The Local Government Code Of 1991.'),
(958, '2023-01-29 22:46:53', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of R.A. 9054 Organic Act For The Autonomous Region In Muslim Mindanao(ARMM).'),
(959, '2023-01-29 22:48:05', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of R.A. 9054 Organic Act For The Autonomous Region In Muslim Mindanao(ARMM).'),
(960, '2023-01-29 22:49:17', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Act And Resolutions.'),
(961, '2023-01-29 22:51:08', 'EMP-0233-25', 'Logged out.'),
(962, '2023-01-29 22:51:13', 'EMP-0203-25', 'A research admin logged in.'),
(963, '2023-01-29 22:51:42', 'EMP-0203-25', 'Logged out.'),
(964, '2023-01-29 22:55:05', 'EMP-0203-25', 'A research admin logged in.'),
(965, '2023-01-29 22:55:10', 'EMP-0003-25', 'An admin logged in.'),
(966, '2023-01-29 22:55:12', 'EMP-0203-25', 'Logged out.'),
(967, '2023-01-29 22:55:20', 'EMP-0233-25', 'A library admin logged in.'),
(968, '2023-01-29 22:55:36', 'EMP-0233-25', 'Employee EMP-0233-25 edited a book with the title of Introduction to Microsoft NT Server Environment.'),
(969, '2023-01-29 22:55:47', 'EMP-0233-25', 'Employee EMP-0233-25 edited a book with the title of Introduction to Microsoft NT Server Environment.'),
(970, '2023-01-29 22:55:55', 'EMP-0003-25', 'Logged out.'),
(971, '2023-01-29 22:56:08', 'EMP-0233-25', 'A library admin logged in.'),
(972, '2023-01-29 22:59:05', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Act And Resolutions.'),
(973, '2023-01-29 23:02:03', 'EMP-0233-25', 'Employee EMP-0233-25 added a book with the title of Bills And Resolution Passed.'),
(974, '2023-01-30 12:45:42', 'EMP-0003-25', 'An admin logged in.'),
(975, '2023-01-30 13:06:13', 'EMP-0003-25', 'Employee EMP-0003-25 edited a book with the title of Philippine Investments.'),
(976, '2023-01-30 13:06:37', 'EMP-0003-25', 'Employee EMP-0003-25 added a book with the title of Compilation Of Administrative Issuances And Pertinent Vital Documents	Compilation Of Administrative Issuances And Pertinent Vital Documents.'),
(977, '2023-01-30 13:07:04', 'EMP-0003-25', 'Employee EMP-0003-25 added a book with the title of Compilation Of Administrative Issuances And Pertinent Vital Documents.'),
(978, '2023-01-30 13:07:28', 'EMP-0003-25', 'Employee EMP-0003-25 added a book with the title of Compilation Of Administrative Issuances And Pertinent Memorandum Circular.'),
(979, '2023-01-30 13:07:56', 'EMP-0003-25', 'Employee EMP-0003-25 added a book with the title of Compilation Of Administrative Issuances And Pertinent Memorandum Circular.'),
(980, '2023-01-30 13:09:12', 'D-1205-01', 'A library admin logged in.'),
(981, '2023-01-30 13:34:30', 'EMP-0000-25', 'An employee logged in.'),
(982, '2023-01-30 14:02:24', '9909-20', 'An employee logged in.'),
(983, '2023-01-30 14:09:35', '2203-17', 'An employee logged in.'),
(984, '2023-01-30 14:24:54', '2203-17', 'An employee logged in.'),
(985, '2023-01-31 23:03:20', 'EMP-0233-25', 'A library admin logged in.'),
(986, '2023-02-01 12:57:47', 'EMP-0003-25', 'An admin logged in.'),
(987, '2023-02-01 14:23:11', 'EMP-0003-25', 'An admin logged in.'),
(988, '2023-02-01 14:23:12', 'EMP-0003-25', 'An admin logged in.'),
(989, '2023-02-01 14:24:21', 'EMP-0003-25', 'Logged out.'),
(990, '2023-02-01 14:25:38', 'D-1205-01', 'A library admin logged in.'),
(991, '2023-02-01 14:26:39', 'D-1205-01', 'Logged out.'),
(992, '2023-02-01 14:27:02', '9903-05', 'A research admin logged in.'),
(993, '2023-02-01 15:54:37', '9903-05', 'Logged out.'),
(994, '2023-02-01 15:54:51', 'EMP-0003-25', 'An admin logged in.'),
(995, '2023-02-02 20:31:37', 'EMP-0003-25', 'An admin logged in.'),
(996, '2023-02-02 23:06:22', 'EMP-0003-25', 'Logged out.'),
(997, '2023-02-02 23:09:33', 'EMP-0003-25', 'An admin logged in.'),
(998, '2023-02-02 23:10:52', 'EMP-0003-25', 'Logged out.'),
(999, '2023-02-02 23:12:30', '9703-25', 'An admin logged in.'),
(1000, '2023-02-02 23:14:21', '9703-25', 'Logged out.'),
(1001, '2023-02-08 11:00:17', 'EMP-0003-25', 'An admin logged in.'),
(1002, '2023-02-08 13:14:52', '9703-25', 'An admin logged in.'),
(1003, '2023-02-08 13:16:31', '9703-25', 'Employee 9703-25 created an announcement.'),
(1004, '2023-02-08 13:23:52', '9703-26', 'A research admin logged in.'),
(1005, '2023-02-08 13:25:34', '9703-26', 'Employee 9703-26 added the reports.'),
(1006, '2023-02-08 13:33:18', '9703-26', 'Employee 9703-26 added a policy with the title of Amendment to the 1987 Philippine Constitution: RBH 2 and RBH 4.'),
(1007, '2023-02-08 13:38:23', '9703-26', 'Logged out.'),
(1008, '2023-02-08 13:43:34', '9909-20', 'An employee logged in.'),
(1009, '2023-02-08 13:45:20', '9909-20', 'Logged out.'),
(1010, '2023-02-08 13:54:16', '0408-04', 'An employee logged in.'),
(1011, '2023-02-08 13:55:38', '0408-04', 'Logged out.'),
(1012, '2023-02-08 14:01:11', '0903-03', 'An employee logged in.'),
(1013, '2023-02-08 14:04:57', '0903-03', 'An employee logged in.'),
(1014, '2023-02-08 15:06:14', '9701-02', 'An employee logged in.'),
(1015, '2023-02-08 15:07:39', '9701-02', 'Logged out.'),
(1016, '2023-02-09 08:53:24', '9703-25', 'Logged out.'),
(1017, '2023-02-09 11:19:34', '2203-14', 'A research admin logged in.'),
(1018, '2023-02-09 11:21:38', '2203-14', 'Logged out.'),
(1019, '2023-02-09 11:24:29', '1908-04', 'A research admin logged in.'),
(1020, '2023-02-09 11:25:29', '1908-04', 'Employee 1908-04 edited a policy with the title of HOUSE BILLS- MAGNA CARTA OF OSYS.'),
(1021, '2023-02-09 11:26:50', '1908-04', 'Logged out.'),
(1022, '2023-02-09 11:32:20', 'EMP-0003-25', 'An admin logged in.'),
(1023, '2023-02-09 11:34:36', 'D-2104-07', 'An admin logged in.'),
(1024, '2023-02-09 11:37:51', 'D-2104-07', 'Employee D-2104-07 edited a book with the title of Introduction to Microsoft NT Server Environment.'),
(1025, '2023-02-09 11:39:19', 'D-2104-07', 'Employee D-2104-07 added a book with the title of Introduction to Computing.'),
(1026, '2023-02-09 11:43:23', 'D-2104-07', 'Employee D-2104-07 added a bill with the title of Resolution Granting Youth Advocacies in Information Technology.'),
(1027, '2023-02-09 11:51:55', 'D-2104-07', 'Logged out.'),
(1028, '2023-02-09 12:03:25', '2111-12', 'An employee logged in.'),
(1029, '2023-02-09 12:08:11', '0408-06', 'An employee logged in.'),
(1030, '2023-02-09 12:15:33', 'D-2207-22', 'An employee logged in.'),
(1031, '2023-02-09 12:17:29', 'D-2207-22', 'Logged out.'),
(1032, '2023-02-09 12:22:43', '1208-01', 'A research admin logged in.'),
(1033, '2023-02-09 12:25:46', '1208-01', 'Logged out.'),
(1034, '2023-02-09 12:53:07', '1907-05', 'A research admin logged in.'),
(1035, '2023-02-09 13:04:10', '1907-05', 'Logged out.'),
(1036, '2023-02-09 13:15:44', '1103-04', 'A research admin logged in.'),
(1037, '2023-02-09 13:19:41', '1103-04', 'Employee 1103-04 added a policy with the title of SENATE BILLS ON A NATIONAL POLICY PREVENTING TEENAGE PREGNANCIES, INSTITUTIONALIZING SOCIAL PROTECTION FOR TEENAGE PARENTS, AND PROVIDING FUNDS THEREOF.');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `no_book` int(11) NOT NULL,
  `emp_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `accession_no` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `call_no` varchar(25) NOT NULL,
  `no_copies` int(11) NOT NULL,
  `copyright_year` year(4) NOT NULL,
  `remarks` text DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `isbn` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`no_book`, `emp_id`, `accession_no`, `title`, `author`, `call_no`, `no_copies`, `copyright_year`, `remarks`, `category`, `isbn`) VALUES
(3, 'EMP-0233-25', 49, 'Introduction to Microsoft NT Server Environment', 'N/A', '005.3  In8t', 5, 2000, 'N/A', 'N/A', 'N/A'),
(8, 'EMP-0233-25', 2265, 'Reading In Philosophy Of Education', 'Miranda, Evelina M.', 'F  160.17  M67r', 1, 1996, 'N/A', 'N/A', 'N/A'),
(9, 'EMP-0233-25', 33, 'Filipino Values And National Development', 'N/A', 'F  170  F47v', 0, 1992, 'N/A', 'N/A', 'N/A'),
(10, 'EMP-0233-25', 89, 'Ethics & Politics : A Call For National Renewal', 'N/A', 'F  170  Et3a', 0, 1994, 'N/A', 'N/A', 'N/A'),
(11, 'EMP-0233-25', 53, 'Moral Imperatives Of National Renewal', 'N/A', 'F  170  Sh1m', 2, 0000, 'N/A', 'N/A', 'N/A'),
(12, 'EMP-0233-25', 56, 'The Filipino Values And Visions', 'Sotto, Vicente V. III', 'F  170  So7f', 1, 0000, 'N/A', 'N/A', 'N/A'),
(13, 'EMP-0233-25', 2264, 'Psychology Of Learning', 'Tria , Geraldine E.   Limpingco , Delia A.', 'F  170  So7f', 1, 0000, 'N/A', 'N/A', 'N/A'),
(14, 'EMP-0233-25', 35, '12 Little Things Every Filipino Can Do To Help Our Country.', 'Lacson, Alexander', 'F  153.8  L11t', 0, 2005, 'N/A', 'N/A', 'N/A'),
(18, 'EMP-0233-25', 32, 'Surviving The Odds', 'Bautista, Violete   Roldan, Auronita   Bascal, Myra Garce', 'F  155 .4  B32s', 0, 2000, 'N/A', 'N/A', 'N/A'),
(20, 'EMP-0233-25', 1, 'Philippine Investments', 'N/A', 'F  332.6  D72p', 1, 0000, 'N/A', 'N/A', 'N/A'),
(21, 'EMP-0233-25', 686, 'Making Development Happen', 'N/A', 'F  333  M28d', 1, 0000, 'N/A', 'N/A', 'N/A'),
(22, 'EMP-0233-25', 686, 'Making Development Happen', 'N/A', 'F  333  M28d', 1, 0000, 'N/A', 'N/A', 'N/A'),
(23, 'EMP-0233-25', 696, 'Philippine Labor Review', 'N/A', '333.05  P53l', 1, 0000, 'N/A', 'N/A', 'N/A'),
(24, 'EMP-0233-25', 64, 'Compilation Of Policy Issuances', 'N/A', '333.73599  C73o', 1, 0000, 'N/A', 'N/A', 'N/A'),
(25, 'EMP-0233-25', 42, 'Haring Innovation Experiences', 'N/A', '333.91  Sh2i', 1, 2006, 'N/A', 'N/A', 'N/A'),
(26, 'EMP-0233-25', 41, 'Commission On Audit Regulations And Jurisprudence', 'Go, James V.', 'F  336.01  G53c', 0, 1998, 'N/A', 'N/A', 'N/A'),
(27, 'EMP-0233-25', 40, 'Republic Act No. 7718 And Its Implementing Rules And Regulations', 'N/A', '338.9  R29a', 1, 0000, 'N/A', 'N/A', 'N/A'),
(28, 'EMP-0233-25', 675, 'The Local Government Code Of 1991', 'Bautista, Arnel B.', 'F  340  B31l', 1, 1991, 'N/A', 'N/A', 'N/A'),
(29, 'EMP-0233-25', 642, 'Criminal Justice Journal Vol. Xvi', 'N/A', 'F  340  C84i', 1, 0000, 'N/A', 'N/A', 'N/A'),
(30, 'EMP-0233-25', 643, 'Criminal Justice Journal Vol. Xviii', 'N/A', 'F  340  C84i', 1, 0000, 'N/A', 'N/A', 'N/A'),
(31, 'EMP-0233-25', 641, 'Criminal Justice Journal Vol. Xviii', 'N/A', 'F  340  C84i', 2, 0000, 'N/A', 'N/A', 'N/A'),
(32, 'EMP-0233-25', 716, 'Justice To Journalist To Justice', 'N/A', '340  J98t', 1, 2005, 'N/A', 'N/A', 'N/A'),
(33, 'EMP-0233-25', 17, 'Gender Issues And The Young Adult Population', 'N/A', 'F  340  P65t', 1, 1994, 'N/A', 'N/A', 'N/A'),
(34, 'EMP-0233-25', 2261, 'The Barangay And The Local Government Code For National Transformation Handbook', 'Aquino, Pimentel Q. Sr.', 'F  340  P65t', 1, 1994, 'N/A', 'N/A', 'N/A'),
(35, 'EMP-0233-25', 396, 'Pointers In Criminal Law', 'Sandoval, Justice E.G', 'F  340  Sa5p', 1, 2004, 'N/A', 'N/A', 'N/A'),
(36, 'EMP-0233-25', 1975, 'A Guide To The Local Government Code Of 1991', 'Tabunda, Manuel S.  Galang, Mano M.', 'F  340  T11g', 0, 1992, 'N/A', 'N/A', 'N/A'),
(37, 'EMP-0233-25', 389, 'A Values Handbook Of The Moral Recovery Program', 'Shahani, Leticia Ramos', 'F  340  Sh1e', 0, 2003, 'N/A', 'N/A', 'N/A'),
(38, 'EMP-0233-25', 343, 'Frequently Asked Question : Anti-Corruption And Integrity', 'N/A', '340  F84a', 1, 0000, 'N/A', 'N/A', 'N/A'),
(39, 'EMP-0233-25', 30, 'Philippine Laws Title And Subject Index Enactment Of The 9th Congress: Ra 7636- Ra 8171', 'N/A', 'F  340.599  P53l', 1, 0000, 'N/A', 'N/A', 'N/A'),
(40, 'EMP-0233-25', 29, 'Philippine Laws Title And Subject Index Enactment Of The 9th Congress: Ra 6125-R.A.6635', 'N/A', '340.99  L44o', 1, 0000, 'N/A', 'N/A', 'N/A'),
(41, 'EMP-0233-25', 317, 'The Laws Of The First Philippine Republic (The Laws Of Malolos) 1898 -1899.', 'N/A', '340.99  L44o', 1, 0000, 'N/A', 'N/A', 'N/A'),
(42, 'EMP-0233-25', 615, '1979 : Remembering The  International Year Of The Child', 'Maaliw, Alex Sg', '341  M11r', 0, 0000, 'N/A', 'N/A', 'N/A'),
(43, 'EMP-0233-25', 39, 'Compilation Of Legal Materials On The System Of Justice For Children (Vol. 1)', 'N/A', 'F  341.76  C73o', 1, 0000, 'N/A', 'N/A', 'N/A'),
(44, 'EMP-0233-25', 5, 'The Civil Service Law And Rules', 'N/A', 'F  342  Om5r', 1, 0000, 'N/A', 'N/A', 'N/A'),
(45, 'EMP-0233-25', 4, 'Omnibus Rules Implementing Book V Of Executive Order No 292 And Other Parliament Civil Services Laws', 'N/A', 'F  342  R24o', 1, 0000, 'N/A', 'N/A', 'N/A'),
(46, 'EMP-0233-25', 1984, 'The Proposed Revision Of The 1987 Constitution Commission By The Consultative Commission', 'N/A', 'F  342.03  P94r', 1, 2006, 'N/A', 'N/A', 'N/A'),
(47, 'EMP-0233-25', 74, 'The Proposed Revision Of The 1987 Constitution Commission By The Consultative Commission', 'N/A', 'F  342.03  P94r', 2, 2006, 'N/A', 'N/A', 'N/A'),
(48, 'EMP-0233-25', 0, 'The Proposed Revision Of The 1987 Constitution Commission By The Consultative Commission', 'N/A', 'F  342.03  P94r\"', 2, 2006, 'N/A', 'N/A', 'N/A'),
(49, 'EMP-0233-25', 7, 'The Revised Administrative Code Of 1987 With Related Laws And Administrative Issuances', 'N/A', 'F  342.03  R32a', 1, 2006, 'N/A', 'N/A', 'N/A'),
(50, 'EMP-0233-25', 221, 'The Local Government Code Of 1991', 'N/A', 'F  342.05   L78g', 1, 0000, 'N/A', 'N/A', 'N/A'),
(51, 'EMP-0233-25', 220, 'The Local Government Code Of 1991', 'N/A', 'F  342.05   L78g', 2, 0000, 'N/A', 'N/A', 'N/A'),
(52, 'EMP-0233-25', 28, 'R.A. 9054 Organic Act For The Autonomous Region In Muslim Mindanao(ARMM)', 'N/A', 'F  342.05  B29a', 1, 0000, 'N/A', 'N/A', 'N/A'),
(53, 'EMP-0233-25', 27, 'R.A. 9054 Organic Act For The Autonomous Region In Muslim Mindanao(ARMM)', 'N/A', '\"F  342.05  B29a', 2, 0000, 'N/A', 'N/A', 'N/A'),
(54, 'EMP-0233-25', 3, 'Act And Resolutions', 'N/A', 'F  342.0599  Ac8a\"', 0, 0000, 'N/A', 'N/A', 'N/A'),
(55, 'EMP-0233-25', 2, 'Act And Resolutions', 'N/A', 'F  342.0599  Ac8a', 0, 0000, 'N/A', 'N/A', 'N/A'),
(56, 'EMP-0233-25', 1, 'Bills And Resolution Passed', 'N/A', 'F  342.0599  B49a', 0, 0000, 'N/A', 'N/A', 'N/A'),
(57, 'EMP-0003-25', 19, 'Compilation Of Administrative Issuances And Pertinent Vital Documents	Compilation Of Administrative Issuances And Pertinent Vital Documents', 'N/A', 'F  342.0599  C73o', 1, 0000, 'N/A', 'N/A', 'N/A'),
(58, 'EMP-0003-25', 20, 'Compilation Of Administrative Issuances And Pertinent Vital Documents', 'N/A', 'F  342.0599  C73o', 2, 0000, 'N/A', 'N/A', 'N/A'),
(59, 'EMP-0003-25', 18, 'Compilation Of Administrative Issuances And Pertinent Memorandum Circular', 'N/A', 'F  342.0599  C73o', 1, 0000, 'N/A', 'N/A', 'N/A'),
(60, 'EMP-0003-25', 21, 'Compilation Of Administrative Issuances And Pertinent Memorandum Circular', 'N/A', 'N/A', 3, 0000, 'N/A', 'N/A', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `bookarchive`
--

CREATE TABLE `bookarchive` (
  `no` int(11) NOT NULL,
  `no_book` int(11) DEFAULT NULL,
  `emp_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `accession_no` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `call_no` varchar(100) NOT NULL,
  `no_copies` int(11) NOT NULL,
  `copyright_year` year(4) NOT NULL,
  `remarks` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookarchive`
--

INSERT INTO `bookarchive` (`no`, `no_book`, `emp_id`, `accession_no`, `title`, `author`, `call_no`, `no_copies`, `copyright_year`, `remarks`, `category`, `isbn`) VALUES
(3, NULL, 'EMP-0233-25', 72, 'Excel: Basics And Concepts', 'Francisco, Mark Anthony S.', 'F  005.3  F85 E', 15, 2002, 'N/A', 'N/A', 'N/A'),
(4, NULL, 'EMP-0233-25', 2265, 'Reading In Philosophy Of Education', 'Miranda, Evelina M.', 'F  160.17  M67r', 1, 1996, 'N/A', 'N/A', 'N/A'),
(5, NULL, 'EMP-0233-25', 0, 'w', 'w', 'w', 1, 2000, 'w', 'w', 'w'),
(6, NULL, 'EMP-0233-25', 32, 'Surviving The Odds', 'Bautista, Violete; Roldan, Auronita; Bascal, Myra Garce', 'F  155 .4  B32s', 2, 2000, 'N/A', 'N/A', 'N/A'),
(7, NULL, 'EMP-0233-25', 31, 'Digital Tools And Technique For Process Documentation: Capturing And Mining Best Practice And Lesson Learned', 'Flor, Alexander', 'F  005.7  D56t', 1, 2002, 'N/A', 'N/A', 'N/A'),
(8, NULL, 'EMP-0233-25', 48, 'Introduction to Microsoft NT Server Environment', 'N/A', '005.3  In8t', 1, 2000, 'N/A', 'N/A', 'N/A'),
(9, NULL, 'EMP-0233-25', 36, '12 Little Things Every Filipino Can Do To Help Our Country.', 'Lacson, Alexander', 'F  153.8  L11t', 0, 2005, 'N/A', 'N/A', 'N/A'),
(10, NULL, 'EMP-0233-25', 88, 'Readings On Integrity Circles', 'N/A', 'F  172  R22o', 1, 0000, 'N/A', 'N/A', 'N/A'),
(11, NULL, 'EMP-0233-25', 90, 'Proceeding Of The World Ethics And Integrity Forum', 'N/A', '172  P94o', 1, 2005, 'N/A', 'N/A', 'N/A'),
(12, NULL, 'EMP-0003-25', 650, 'Innovations –Excellence In Local Governance', 'N/A', 'F  321  In7e', 1, 2001, 'N/A', 'N/A', 'N/A'),
(13, NULL, 'D-2104-07', 100, 'Introduction to Computing', 'National Youth Commission', '123456', 10, 2023, 'Donated by Unicef', 'Computing', '1001');

-- --------------------------------------------------------

--
-- Table structure for table `cd`
--

CREATE TABLE `cd` (
  `no_cd` int(11) NOT NULL,
  `emp_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cd`
--

INSERT INTO `cd` (`no_cd`, `emp_id`, `title`) VALUES
(5, 'EMP-0233-25', '1 Nov. 11'),
(6, 'EMP-0233-25', '1 Nov. 13		'),
(8, 'EMP-0233-25', '12th ASEAN Summit			'),
(10, 'EMP-0233-25', '12th ASEAN Summit			'),
(11, 'EMP-0233-25', '2 Nov. 10		'),
(12, 'EMP-0233-25', '3 Nov. 10		');

-- --------------------------------------------------------

--
-- Table structure for table `cdarchive`
--

CREATE TABLE `cdarchive` (
  `no` int(11) NOT NULL,
  `no_cd` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `emp_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cdarchive`
--

INSERT INTO `cdarchive` (`no`, `no_cd`, `title`, `emp_id`) VALUES
(11, NULL, '\"Globalization of Education\" Episodes', 'EMP-0233-25'),
(12, NULL, 'aaa', 'EMP-0233-25'),
(13, NULL, '1 Nov. 10', 'EMP-0233-25'),
(14, NULL, '\"Muslim Youth\" Episode', 'EMP-0233-25'),
(15, NULL, '38th SSEAYP 2011 (Manila, Philippines).', 'EMP-0233-25'),
(16, NULL, '38th SSEAYP 2011 (Manila, Philippines)', 'EMP-0233-25'),
(17, NULL, '3 Nov. 13		', 'EMP-0233-25'),
(18, NULL, '12th ASEAN Summit', 'EMP-0233-25'),
(19, NULL, '\"Muslim Youth\" Episode', 'EMP-0233-25'),
(20, NULL, '“Globalization of Education” Episode	', 'EMP-0233-25'),
(21, NULL, '“Muslim Youth” Episodes			', 'EMP-0003-25');

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `email`, `code`, `expire`) VALUES
(1, 'ronangelosanchezalteza@gmail.com', '65484', 1668151357),
(2, 'ronangelosanchezalteza@gmail.com', '82772', 1668151474),
(3, 'ronangelosanchezalteza@gmail.com', '49333', 1668151555),
(4, 'ronangelosanchezalteza@gmail.com', '19404', 1668444465),
(5, 'ronangelosanchezalteza@gmail.com', '17296', 1668451165),
(6, 'ronangelosanchezalteza@gmail.com', '28720', 1668532668),
(7, 'ronangelosanchezalteza@gmail.com', '83403', 1668535549),
(8, 'ronangelosanchezalteza@gmail.com', '93276', 1668578746),
(10, 'ra@yahoo.com', '92406', 1668780014),
(11, 'ra@yahoo.com', '23237', 1668780028),
(12, 'mc.markchristian@gmail.com', '43993', 1673438935),
(13, 'ronangelosanchezalteza@gmail.com', '53064', 1673459101),
(14, 'ronangelosanchezalteza@gmail.com', '11426', 1673474214),
(15, 'ronangelosanchezalteza@gmail.com', '72268', 1674054762),
(16, 'pjaflores06152001@gmail.com', '60786', 1674055258),
(17, 'ronangelosanchezalteza@gmail.com', '29773', 1674055380),
(18, 'ronangelosanchezalteza@gmail.com', '45116', 1674055406),
(19, 'marysidney.demesa@nyc.gov.ph', '43471', 1674447337),
(20, 'mabeatrice.pancho@nyc.gov.ph', '57978', 1674447495),
(21, 'dennissantos22572@gmail.com', '54099', 1674715472),
(22, 'dennissantos22572@gmail.com', '46570', 1675350958),
(23, 'dennissantos22572@gmail.com', '95658', 1675833486),
(24, 'elsaledesma2003@yahoo.com', '18363', 1675835224),
(25, 'elsaledesma2003@yahoo.com', '29672', 1675835227),
(26, 'elsaledesma2003@yahoo.com', '86778', 1675835275),
(27, 'josecielos@yahoo.com', '68114', 1675835891),
(28, 'marysidney.demesa@nyc.gov.ph', '60061', 1675913024),
(29, 'mabeatrice.pancho@nyc.gov.ph', '15366', 1675913321),
(30, 'rbvelonza.nyc@gmail.com', '12697', 1675915669),
(31, 'jhynxz@gmail.com', '88653', 1675915948);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `division_id` int(3) NOT NULL,
  `division_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`division_id`, `division_name`) VALUES
(1, 'Administrative and Finance'),
(2, 'Social Marketing'),
(3, 'Planning, Monitoring, and Evaluation'),
(4, 'Policy Research'),
(5, 'Regional Youth Development'),
(6, 'Commission Proper');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `no_docu` int(11) NOT NULL,
  `emp_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `accession_no` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `call_no` varchar(25) NOT NULL,
  `no_copies` int(11) NOT NULL,
  `copyright_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`no_docu`, `emp_id`, `accession_no`, `title`, `author`, `call_no`, `no_copies`, `copyright_year`) VALUES
(4, 'EMP-0233-25', 1321, 'The National Technical Education and Skills Development Plan, 1999-2004', 'N/A', 'F  362.7  N21t', 1, 0000),
(5, 'EMP-0233-25', 1258, 'National Development Summit : A National Multi-Sectoral Consultation on a Proposed set of Policies and Programs that seek to Pole-Vault the Philippines to the 21st Century June 8-9, 1997 PICC, Manila', 'N/A', 'F  362.7  N21d', 1, 0000),
(6, 'EMP-0233-25', 1261, 'National Plan for Children : 1991-1992', 'N/A', 'F  305.07  N21p', 1, 0000),
(7, 'EMP-0233-25', 0, 'Laws on women', 'N/A', 'F  344  L44o', 1, 0000),
(8, 'EMP-0233-25', 1271, 'Laws of Malaysia act 521 Domestic Violence Act 1994', 'N/A', '341  L44o', 1, 0000),
(10, 'EMP-0233-25', 1336, 'Social Reform Agenda 9th SRC Meeting', 'N/A', 'F  333.07  So2r', 1, 0000),
(11, 'EMP-0233-25', 1337, 'Social Reform Agenda 8th SRC Meeting', 'N/A', 'F  333.07  So2r', 2, 0000),
(12, 'EMP-0233-25', 0, 'Executive Summary of Regional Employment Plans', 'N/A', 'F  362.07  Ex3s', 1, 0000),
(14, 'EMP-0233-25', 1318, 'The Philippine Agenda 21 Draft Version as of May 15, 1996 Facilitated by : the Capacity 21 Project Philippines', 'N/A', 'F  332.07  P53a', 1, 0000);

-- --------------------------------------------------------

--
-- Table structure for table `documentarch`
--

CREATE TABLE `documentarch` (
  `no` int(11) NOT NULL,
  `no_docu` int(11) DEFAULT NULL,
  `accession_no` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `call_no` varchar(100) NOT NULL,
  `no_copies` int(11) NOT NULL,
  `copyright_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documentarch`
--

INSERT INTO `documentarch` (`no`, `no_docu`, `accession_no`, `title`, `author`, `call_no`, `no_copies`, `copyright_year`) VALUES
(23, NULL, 1314, 'PO/NGO Report : Anti- Poverty Summit', 'N/A', 'F  362  P39o', 1, 0000),
(24, NULL, 2247, 'Claiming our Rights : A Manual for Women’s Human Rights Education in Muslim Societies', 'N/A', 'F  370  Af4c', 1, 0000),
(25, NULL, 1320, 'Studies Related Literature to Drug Abuse 1980’s', 'N/A', 'F  362.29  St9r', 1, 0000),
(26, NULL, 1343, 'Understanding Philippine Agenda 21', 'N/A', 'F  370.7  Un2p', 1, 0000),
(27, NULL, 1335, 'Social Reform agenda 10th SRC Meeting', 'N/A', 'F  333.07  So2r', 1, 0000),
(28, NULL, 1342, 'A Primer Philippine Agenda 21', 'N/A', 'F  300  P93o', 1, 0000),
(29, NULL, 2247, 'Claiming our Rights : A Manual for Women’s Human Rights Education in Muslim Societies', 'N/A', 'F  370  Af4c', 2, 0000),
(30, NULL, 2247, 'Claiming our Rights : A Manual for Women’s Human Rights Education in Muslim Societies', 'N/A', 'F  370  Af4c', 2, 0000),
(31, NULL, 2247, 'Claiming our Rights : A Manual for Women’s Human Rights Education in Muslim Societies', 'N/A', 'F  370  Af4c', 1, 0000);

-- --------------------------------------------------------

--
-- Table structure for table `emailverification`
--

CREATE TABLE `emailverification` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emailverification`
--

INSERT INTO `emailverification` (`id`, `email`, `code`, `expire`) VALUES
(72, 'ronangelosanchezalteza@gmail.com', '93967', 1668853360),
(73, 'ronangelosanchezalteza@gmail.com', '11014', 1668853601),
(74, 'ronangelosanchezalteza@gmail.com', '24784', 1668854716),
(75, 'ronangelosanchezalteza@gmail.com', '43521', 1668854856),
(76, 'patrick@yahoo.com', '68660', 1671082373),
(77, 'ras@yahoo.com', '83189', 1671082513),
(78, 'ronangelosanchezalteza@gmail.com', '55917', 1673476468),
(79, '111@yahoo.com', '87323', 1673781630),
(80, 'yahoo@gmail.com', '27287', 1673782966),
(81, '1213@yahoo.com', '25670', 1673785920),
(82, 'cakespeare69@gmail.com', '36785', 1673786049),
(83, 'rasalteza@gmail.com', '60962', 1673798134),
(84, 'ronangelosanchezalteza@gmail.com', '69415', 1673798312),
(85, 'ras@yahoo.com', '31571', 1673805824),
(86, 'ra@yahoo.com', '89184', 1673845777),
(87, 'ra@yahoo.com', '29545', 1673849364),
(88, 'ras@yahoo.com', '42805', 1673849409),
(89, 'janell@yahoo.com', '35229', 1673849752),
(90, 'pat@yahoo.com', '34335', 1673850034),
(91, 'ra@yahoo.com', '28713', 1673850168),
(92, 'patt@yahoo.com', '48034', 1673851223),
(93, 'rasa@gmail.com', '53532', 1673851343),
(94, 'rasalteza@gmail.com', '30072', 1673851383),
(95, 'janell@yahoo.com', '72375', 1673851466),
(96, 'ras@yahoo.com', '26617', 1673851586),
(97, 'mc.markchristian@gmail.com', '96672', 1673879072),
(98, 'mc.markchristian@gmail.com', '34416', 1673879246),
(99, 'mc.markchristian@gmail.com', '96267', 1673879469),
(100, '123@gmail.com', '87518', 1673960541),
(101, '1234@gmail.com', '46683', 1673961990),
(102, '123@gmail.com', '17358', 1673962093),
(103, 'ronangelosanchezalteza@gmail.com', '90189', 1674013911),
(104, 'patriciajunelleflores@gmail.com', '51007', 1674022959),
(105, 'ericramos@nyc.gov.ph', '49280', 1674027732),
(106, 'rasalteza@gmail.com', '80824', 1674054440),
(107, 'rasalteza@gmail.com', '58054', 1674054635),
(108, 'pjaflores06152001@gmail.com', '63510', 1674055181),
(109, 'rasalteza@gmail.com', '55838', 1674055682),
(110, 'rasalteza@gmail.com', '74091', 1674055978),
(111, 'ronangelosanchezalteza@gmail.com', '90353', 1674056198),
(112, 'rasalteza@gmail.com', '94133', 1674056258),
(113, 'ronangelosanchezalteza@gmail.com', '32746', 1674056330),
(114, 'rasalteza@gmail.com', '82130', 1674056471),
(115, 'ra@yahoo.com', '17630', 1674197484),
(116, '123@yahoo.com', '89169', 1674197513),
(117, 'ericaramosborja@gmail.com', '88721', 1674200252),
(118, 'test@gmail.com', '30867', 1674201113),
(119, 'bethmadrigal@nyc.gov.ph', '79370', 1674202572),
(120, 'smdnycphil@gmail.com', '64984', 1674203093),
(121, 'josecielos@yahoo.com', '54990', 1674203556),
(122, 'shengroque@nyc.gov.ph', '35515', 1674203877),
(123, 'fiori.estoperez@nyc.gov.ph', '87111', 1674204482),
(124, 'lorenzoramosjr@nyc.gov.ph', '67545', 1674204834),
(125, 'gamale.jannikka@gmail.com', '81587', 1674205486),
(126, 'gamale.jannikka@gmail.com', '11523', 1674205487),
(127, 'gamale.jannikka@gmail.com', '47577', 1674205490),
(128, 'marysidney.demesa@nyc.gov.ph', '77469', 1674205720),
(129, 'jhynxz@gmail.com', '73964', 1674205893),
(130, 'ronaldcardema@nyc.gov.ph', '84311', 1674206303),
(131, 'nyc.ammvillareal@gmail.com', '50002', 1674206362),
(132, 'danferfermin23@gmail.com', '65489', 1674206565),
(133, 'shaynekay.taay@nyc.gov.ph', '86351', 1674206703),
(134, 'dingluna1212@gmail.com', '60133', 1674206712),
(135, 'divine.tamayo@nyc.gov.ph', '10847', 1674207022),
(136, 'yotobsohigh@yahoo.com', '63162', 1674207270),
(137, 'ks_sanchez2828@yahoo.com', '77450', 1674207559),
(138, 'ks_sanchez2828@yahoo.com', '40284', 1674207561),
(139, 'arlene.prep@gmail.com', '73954', 1674207763),
(140, 'ncrcluster@nyc.gov.ph', '25734', 1674208097),
(141, 'deguzman.thalia65@gmail.com', '16542', 1674208460),
(142, 'acu.nyc2018@gmail.com', '61831', 1674208969),
(143, 'dennis.mendoza@nyc.gov.ph', '12118', 1674209506),
(144, 'nest.lucas@nyc.gov.ph', '57034', 1674211287),
(145, 'acmolina@nyc.gov.ph', '39199', 1674217174),
(146, 'sanchez@gmail.com', '12863', 1674231417),
(147, '123@gmail.com', '34630', 1674231659),
(148, 'qwe@gmail.com', '76845', 1674231703),
(149, '123@g.com', '83661', 1674231759),
(150, 'sanchez@gmail.com', '25784', 1674231765),
(151, 'rbvelonza.nyc@gmail.com', '93135', 1674259962),
(152, 'rbvelonza.nyc@gmail.com', '19489', 1674259964),
(153, 'jramirezsalmo@gmail.com', '81885', 1674300448),
(154, 'sarahgrutas@nyc.gov.ph', '79828', 1674304430),
(155, 'shengroque@nyc.gov.ph', '71197', 1674305629),
(156, 'joyce.ebora@nyc.gov.ph', '17663', 1674306379),
(157, 'ralteza@gmail.com', '11394', 1674569287),
(158, 'sanchez@gmail.com', '84569', 1674573457),
(159, 'sanchez@gmail.com', '83949', 1674573733),
(160, 'janel@yahoo.com', '45793', 1674575316),
(161, 'flores@gmail.com', '28160', 1674579032),
(162, 'alteza@gmail.com', '16758', 1674666352),
(163, 'rasalteza@gmail.com', '14320', 1674740423),
(164, 'elsaledesma2003@yahoo.com', '89295', 1675058794),
(165, 'rmabanan@gmail.com', '92948', 1675059243),
(166, 'rmabanan@nyc.gov.ph', '58125', 1675060177),
(167, 'macatojocelyn@yahoo.com', '38969', 1675836338),
(168, 'macatojocelyn@yahoo.com', '24972', 1675836340),
(169, 'romerquiambao@yahoo.com', '73999', 1675840236),
(170, 'yotobsohigh@gmail.com', '75107', 1675916379),
(171, 'yotobsohigh@gmail.com', '56969', 1675916380);

-- --------------------------------------------------------

--
-- Table structure for table `emp_type`
--

CREATE TABLE `emp_type` (
  `category_id` int(3) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_type`
--

INSERT INTO `emp_type` (`category_id`, `type`) VALUES
(1, 'user'),
(2, 'admin'),
(3, 'librarian'),
(4, 'researcher');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `no_journal` int(11) NOT NULL,
  `emp_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `accession_no` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `call_no` varchar(25) NOT NULL,
  `no_copies` int(11) NOT NULL,
  `copyright_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`no_journal`, `emp_id`, `accession_no`, `title`, `author`, `call_no`, `no_copies`, `copyright_year`) VALUES
(6, 'EMP-0233-25', 2008, 'Social Welfare and development : Journal July to December', 'N/A', 'N/A', 6, 2012),
(7, 'EMP-0233-25', 2010, 'Social Welfare and development : Journal July to December', 'N/A', 'N/A', 7, 2012),
(8, 'EMP-0233-25', 2016, 'Social Welfare and development : Journal July to December', 'N/A', 'N/A', 8, 2012),
(9, 'EMP-0233-25', 2014, 'Social Welfare and development : Journal July to December', 'N/A', 'N/A', 9, 2012),
(10, 'EMP-0233-25', 1793, 'Social Welfare and development : Journal January to June', 'N/A', 'N/A', 1, 2012),
(11, 'EMP-0233-25', 1792, 'Social Welfare and development : Journal January to June', 'N/A', 'N/A', 1, 2011),
(12, 'EMP-0233-25', 1794, 'Social Welfare and development : Journal January to June', 'N/A', 'N/A', 1, 2011),
(13, 'EMP-0233-25', 1797, 'Social Welfare and development : Journal May to August', 'N/A', 'N/A', 1, 2010),
(14, 'EMP-0233-25', 1802, 'Social Welfare and development : Journal January to March', 'N/A', 'N/A', 2, 2009);

-- --------------------------------------------------------

--
-- Table structure for table `journalarchive`
--

CREATE TABLE `journalarchive` (
  `no` int(11) NOT NULL,
  `emp_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `no_journal` int(11) DEFAULT NULL,
  `accession_no` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `call_no` varchar(100) NOT NULL,
  `no_copies` int(11) NOT NULL,
  `copyright_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journalarchive`
--

INSERT INTO `journalarchive` (`no`, `emp_id`, `no_journal`, `accession_no`, `title`, `author`, `call_no`, `no_copies`, `copyright_year`) VALUES
(5, 'EMP-0233-25', NULL, 2011, 'Social Welfare and development: Journal July to December', 'N/A', '0', 15, 2012),
(6, 'EMP-0233-25', NULL, 2012, 'Social Welfare and development: Journal July to December', 'N/A', '0', 5, 2012),
(7, 'EMP-0233-25', NULL, 2013, 'Social Welfare and development: Journal July to December', 'N/A', '0', 4, 2012),
(8, 'EMP-0233-25', NULL, 1802, 'Social Welfare and development : Journal January to March', 'N/A', 'N/A', 2, 2009),
(9, 'EMP-0233-25', NULL, 2019, 'Social Welfare and development: Journal July to December', 'N/A', '0', 2, 2012),
(10, 'EMP-0233-25', NULL, 2015, 'Social Welfare and development: Journal July to December', 'N/A', '0', 3, 2012),
(11, 'EMP-0233-25', NULL, 2011, 'Social Welfare and development : Journal July to December', 'N/A', 'N/A', 2, 2012),
(12, 'EMP-0003-25', NULL, 1064, 'The Human Right Journal Vol. no II', 'N/A', 'N/A', 2, 0000);

-- --------------------------------------------------------

--
-- Table structure for table `magazine`
--

CREATE TABLE `magazine` (
  `no_magazine` int(11) NOT NULL,
  `emp_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `magazine_publisher` varchar(45) CHARACTER SET utf8 NOT NULL,
  `magazine_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `no_copies` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `month` varchar(45) NOT NULL,
  `year` year(4) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `magazine`
--

INSERT INTO `magazine` (`no_magazine`, `emp_id`, `magazine_publisher`, `magazine_title`, `no_copies`, `author`, `month`, `year`, `remarks`) VALUES
(13, 'EMP-0233-25', 'NYC Magazine', 'Youth Monitor : Secretary Mamba Assumes NYC Chairmanship', 1, 'N/A', 'N/A', 2000, 'N/A'),
(14, 'EMP-0233-25', 'NYC Magazine', 'NYC : A Magazine for the youth & Environment', 1, 'N/A', 'N/A', 2009, 'N/A'),
(15, 'EMP-0233-25', 'CSC Magazine', 'The Civil Service Reporter June', 1, 'N/A', 'N/A', 2012, 'N/A'),
(16, 'EMP-0233-25', 'CSC Magazine', 'The Civil Service Reporter March', 1, 'N/A', 'N/A', 2012, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `magazinearchive`
--

CREATE TABLE `magazinearchive` (
  `no` int(11) NOT NULL,
  `no_magazine` int(11) DEFAULT NULL,
  `magazine_publisher` varchar(45) NOT NULL,
  `magazine_title` varchar(255) NOT NULL,
  `no_copies` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `month` varchar(45) NOT NULL,
  `year` year(4) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `magazinearchive`
--

INSERT INTO `magazinearchive` (`no`, `no_magazine`, `magazine_publisher`, `magazine_title`, `no_copies`, `author`, `month`, `year`, `remarks`) VALUES
(3, NULL, 'Time Magazine', 'The 50th anniversary of the pill so small. So powerful. And so misunderstood', 20, 'Gibbs, Nancy', '3-May', 2010, 'N/A'),
(4, NULL, 'NYC Magazine', 'NYC Penol : Accomplishment Report', 1, 'N/A', 'N/A', 2014, 'N/A'),
(5, NULL, 'NYC Magazine', 'National Youth Conference on Mass Media Youth Speak', 2, 'N/A', 'N/A', 1997, 'N/A'),
(6, NULL, 'NYC Magazine', 'CAYC Memoirs Year 2006-2010', 1, 'N/A', 'N/A', 0000, 'N/A'),
(7, NULL, 'NYC Magazine', 'Be Cool : A Joint Publication of The National Youth Commission and the Dangerous', 1, 'N/A', 'N/A', 2008, 'N/A'),
(8, NULL, 'NYC Magazine', 'NYC Penol : Accomplishment Report', 1, 'N/A', 'N/A', 2014, 'N/A'),
(9, NULL, 'NYC Magazine', 'The National Movement of Young Legislators (NMYL) : Young Legislator', 1, 'N/A', 'N/A', 2009, 'N/A'),
(10, NULL, 'CSC Magazine', 'The Civil Service Reporter 2ndQuarter Issue', 1, 'N/A', 'N/A', 2013, 'N/A'),
(11, NULL, 'NYC Magazine', 'NYC : Youth Monitor', 1, 'N/A', 'N/A', 2000, 'N/A'),
(12, NULL, 'NYC Magazine', 'NYC Penol : Accomplishment Report', 1, 'N/A', 'N/A', 2014, 'N/A'),
(13, NULL, 'CSC Magazine', 'The Civil Service Reporter 1st Quarter Issue', 1, 'N/A', 'N/A', 2013, 'N/A'),
(14, NULL, 'NYC Magazine', 'NYC : Berdeng Pilipinas', 1, 'N/A', 'N/A', 2008, 'N/A'),
(15, NULL, 'NYC Magazine', 'NYC 2010 Accomplishment Report', 5, 'N/A', 'N/A', 2010, 'N/A'),
(16, NULL, 'NYC Magazine', 'NYC Ocal Dantes : Transition Report', 2, 'N/A', 'N/A', 2016, 'N/A'),
(17, NULL, 'N/A', '2nd philippine national plan of action for children (2nd NPAC) executive summary', 2, 'N/A', 'N/A', 2011, 'N/A'),
(18, NULL, 'N/A', 'Get every one in the Picture : Asian and pacific Civil Registration and Vital Statistics Decade', 1, 'N/A', 'January', 2015, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `monthlypolicy`
--

CREATE TABLE `monthlypolicy` (
  `policy_no` int(11) NOT NULL,
  `emp_id` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `policy_total` int(11) NOT NULL COMMENT 'total policy per month',
  `month` varchar(45) NOT NULL COMMENT 'month kung alin yung may total nun',
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monthlypolicy`
--

INSERT INTO `monthlypolicy` (`policy_no`, `emp_id`, `policy_total`, `month`, `year`) VALUES
(1, 'EMP-0203-25', 3, 'May', 2021),
(2, 'EMP-0203-25', 1, 'December', 2022),
(3, 'EMP-0203-25', 4, 'January', 2023),
(4, 'EMP-0203-25', 7, 'January', 2023),
(5, '9903-05', 5, 'January ', 2023),
(6, '9703-26', 19, 'January', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `policy_id` int(11) NOT NULL,
  `emp_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `author` varchar(100) CHARACTER SET utf8 NOT NULL,
  `policy_status` varchar(100) CHARACTER SET utf8 NOT NULL,
  `specific_request` varchar(100) CHARACTER SET utf8 NOT NULL,
  `in_charge` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date_requested` date NOT NULL,
  `offices` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date_submitted` date NOT NULL,
  `req_position_paper` varchar(50) CHARACTER SET utf8 NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`policy_id`, `emp_id`, `title`, `author`, `policy_status`, `specific_request`, `in_charge`, `date_requested`, `offices`, `date_submitted`, `req_position_paper`, `link`) VALUES
(11, 'EMP-0203-25', 'HOUSE BILLS- MAGNA CARTA OF OSYS', 'Bea Pancho', 'acknowledged by OCCEO on Jan. 18', 'Position Paper', 'N/A', '2021-01-12', 'OCCEO', '2021-01-08', 'No', '    https://docs.google.com/document/d/1vq5lX_CVGkOxviBQf4V89PArjdHMLDW3/edit    '),
(12, 'EMP-0203-25', 'HOUSE BILL 3702- AN ACT GRANTING CASH REWARD TO RECIPIENTS OF ACADEMIC EXCELLENCE AWARDS OR LATIN HONORS IN COLLEGE', 'Mary Sidney de Mesa', 'N/A', 'Position Paper', 'N/A', '2021-01-19', 'OCRM-Dayanghirang', '0000-00-00', 'Yes', ' https://drive.google.com/file/d/14ZcOwf8hwvYmEU258IJBx44tJ1ULAn12/view?usp=sharing '),
(13, 'EMP-0203-25', 'HOUSE BILL 7446 - AN ACT TO PROVIDE MORE SCHOLARSHIPS FOR THE CONTINUITY OF COLLEGE EDUCATION OF STUDENTS WHOSE HEAD OF FAMILIES ARE DIRECTLY AND INDIRECTLY AFFECTED BY THE COVID-19 PANDEMIC', 'Marlo Enriquez', 'N/A', 'Position Paper', 'N/A', '2021-01-19', 'OCRM-Dayanghirang', '0000-00-00', 'Yes', 'https://mail.google.com/mail/u/1/#inbox/FMfcgxwKkbhDJzFCSZdrkMmLRXQcfXGb'),
(14, 'EMP-0203-25', '\"HOUSE RESOLUTION NO. 256 RESOLUTION DIRECTING THE COMMITTEE ON DISASTER  MANAGEMENT TO REVIEW THE EXTENT OF DISASTER REDUCTION AND MANAGEMENT EDUCATION\"', 'Mary Sidney de Mesa', 'N/A', 'Policy Brief', 'N/A', '2021-01-21', 'OCAL-Pangilinan', '2021-01-05', '', '  '),
(15, 'EMP-0203-25', 'EXISTING DRAFT BILL ON STRENGTHENING THE NATIONAL YOUTH COMMISSION', 'Marlo Enriquez', 'acknowledged by ronaldcardema@nyc.gov.ph on Jan. 25; sent via policydivision@nyc.gov.ph', 'Policy Brief', 'N/A', '0000-00-00', 'OCAL-Cardema', '2021-01-25', 'No', 'https://docs.google.com/document/d/1MvDQU8xrLOCCChlq55T94UKTT6YwAx1m/edit'),
(17, 'EMP-0203-25', 'SENATE BILL 1952- AN ACT INSTITUTIONALIZING ANTI-DRUG ABUSE COUNCILS IN PROVINCES, CITIES, MUNICIPALITIES, AND BARANGAYS, APPROPRIATING FUNDS THEREFOR, AND FOR OTHER PURPOSES', 'Kamille Sarmiento', 'sent via policydivision@nyc.gov.ph', 'Position Paper', 'N/A', '2022-02-16', 'OCAL-Cardema', '2021-02-19', 'Yes', 'https://docs.google.com/document/d/1ebHO-eyqbZliEUaSHIvBDhq9pB5A3WrI/edit'),
(19, '9903-05', 'LETTER REQUEST FOR INPUTS FOR PH STATEMENT - GLOBAL OBSERVANCE OF THE INTERNATIONAL DAY OF EDUCATION, 24 JANUARY 2022', 'Kamille Sarmiento', 'acknowledged by OCCEO on Jan. 24', 'Input', 'Education', '2022-01-20', 'Office of the Chairperson and CEO NYC', '2022-01-24', 'No', ' https://docs.google.com/document/d/1w-sme9V3BBzq242TWXu4Z5gVnk7owAAG/edit?usp=sharing&ouid=104152092831828577810&rtpof=true&sd=true '),
(22, '9703-26', 'Amendment to the 1987 Philippine Constitution: RBH 2 and RBH 4', 'to follow', 'pending approval', 'position paper', 'CGM', '0000-00-00', 'OCCEO', '2023-01-27', 'no', 'https://drive.google.com/drive/folders/1HGtg3Eg2A1RSBfIYUi1d-SFmE1hqALB9?usp=share_link');

-- --------------------------------------------------------

--
-- Table structure for table `policyarchive`
--

CREATE TABLE `policyarchive` (
  `no` int(11) NOT NULL,
  `policy_id` int(11) DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `author` varchar(100) CHARACTER SET utf8 NOT NULL,
  `policy_status` varchar(100) CHARACTER SET utf8 NOT NULL,
  `specific_request` varchar(100) CHARACTER SET utf8 NOT NULL,
  `in_charge` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date_requested` date NOT NULL,
  `offices` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date_submitted` date NOT NULL,
  `req_position_paper` varchar(50) CHARACTER SET utf8 NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policyarchive`
--

INSERT INTO `policyarchive` (`no`, `policy_id`, `title`, `author`, `policy_status`, `specific_request`, `in_charge`, `date_requested`, `offices`, `date_submitted`, `req_position_paper`, `link`) VALUES
(17, NULL, 'LETTER REQUEST FOR INPUTS FOR PH STATEMENT - GLOBAL OBSERVANCE OF THE INTERNATIONAL DAY OF EDUCATION, 24 JANUARY 2022', 'Kamille Sarmiento', 'acknowledged by OCCEO on Jan. 24', 'Inputs', 'Education', '2022-01-20', 'Office of the Chairperson and CEO NYC <occeo@nyc.gov.ph', '2022-01-24', 'No', 'https://docs.google.com/document/d/1w-sme9V3BBzq242TWXu4Z5gVnk7owAAG/edit?usp=sharing&ouid=104152092831828577810&rtpof=true&sd=true'),
(18, NULL, 'ACADEMIC FREEDOM', 'Marlo Enriquez', 'acknowledged by OCCEO on Feb. 9; sent via policydivision@nyc.gov.ph', 'Position Paper', 'N/A', '0000-00-00', 'OCCEO', '2021-02-05', 'Yes', ' https://docs.google.com/document/d/1FJWNc0t_CdQXS_fk3gcV6tVGSMoLYad4/edit '),
(19, NULL, '\"SENATE BILL NO. 884: AN ACT LAUNCHING THE \"\"YOUNG FARMERS CHALLENG PROGRAM,\"\" PLANNING AND EVALUATING EXISTING RELATED PROGRAMS OF THE DEPARTMENT OF AGRICULTURE, DEPARTMENT OF TRADE AND INDUSTRY, NATIONAL YOUTH COMMISSION, LOCAL GOVERNMENT UNITS, AS WELL', 'Marlo Enriquez', 'drafted by Sir RR on January 27, 2022 for approval ', 'NYC Comments', 'Economic Empowerment ', '0000-00-00', 'N/A', '0000-00-00', 'No', 'https://drive.google.com/file/d/1rabefLWB05iQgquf2JWTegohqzHxyEDG/view?usp=sharing'),
(20, NULL, 'SUBSTITUTE BILL FOR HOUSE BILL NO. 5174 AND 7817- “AN ACT DESIGNATING THE NATIONAL MUSIC COMPETITIONS FOR YOUNG ARTISTS (NAMCYA) AS THE NATIONAL YOUTH DEVELOPMENT PROGRAM FOR MUSIC, DEFINING ITS ROLE AND FUNCTIONS, AND APPROPRIATING FUNDS THEREFOR”.', 'Kamille Sarmiento', 'acknowledged by ronaldcardema@nyc.gov.ph on March 2; sent via policydivision@nyc.gov.ph', 'Position Paper', 'N/A', '2022-03-01', 'OCAL-Cardema', '2022-03-02', 'Yes', 'https://docs.google.com/document/d/1gXW1O0UucML0anpv9QsY6irprrhiDSiW/edit'),
(21, NULL, 'HOUSE BILL NO. 10015 AND SENATE BILL NO. 2429 DESIGNATING THE NATIONAL MUSIC COMPETITIONS FOR YOUNG ARTISTS (NAMCYA) AS THE NATIONAL YOUTH DEVELOPMENT PROGRAM FOR MUSIC, DEFINING ITS ROLE AND FUNCTIONS AS SUCH, AND APPROPRIATING FUNDS THEREFOR', 'Bea Pancho', 'Pending', 'Comments', 'Active Citizenship ', '2022-01-18', 'Office of the Chairperson and CEO NYC                                                         ', '2022-01-19', 'No', ' https://docs.google.com/document/d/1oZDry_xTrwRcR4X2q5GVVjYPG9R7n72g/edit?usp=sharing&ouid=104152092831828577810&rtpof=true&sd=true '),
(22, NULL, '2022 IHBSS MSM QUESTIONNAIRE REVISION', 'Mary Sidney de Mesa', 'N/A', 'Inputs', 'N/A', '2022-02-02', 'N/A', '2022-02-04', 'No', ' https://docs.google.com/document/d/1knliautiRD7K18SA6vOsqJkCvtfPUMFA/edit?usp=sharing&ouid=104152092831828577810&rtpof=true&sd=true '),
(23, NULL, '\"REQUEST FOR COMMENTS BY THE OFFICE OF THE PRESIDENT TO THE BICAMERAL CONFERENCE COMMITTEE APPROVED CONSOLIDATED BILLS OF SENATE BILL NO. 2239/HOUSE BILL NO. 9007\"', 'Bea Pancho', 'N/A', 'Inputs', 'N/A', '2022-02-19', 'ronaldcardema@nyc.gov.ph', '2022-02-24', 'No', '    https://docs.google.com/document/d/1ObrUEtRlHomOASc_qsmq8TpP-VkBvjIH/edit?usp=sharing&ouid=104152092831828577810&rtpof=true&sd=true    '),
(24, NULL, 'AN ACT GRANTING JURISDICTION AND PROVIDING THE  MANNER FOR CONDUCT OF DISCIPLINARY AND NON- DISCIPLINARY ACTIONS OF THE PEDERASYON NG MGA SANGGUNIANG KABATAN, AMENDING FOR PURPOSE SECTION 21 OF RA 10742 OTHERWISE KNOWN AS THE SK REFORM ACT OF 2015 ', 'Mary Sidney de Mesa', 'For reference of OCCEO', 'Position Paper', 'Governance', '2023-01-23', 'occeo@nyc.gov.ph', '2023-08-23', 'Yes', 'https://docs.google.com/document/d/1z8IiZl5sp3JDGBl_Rnw2RSmKCLGmNDe8/edit?usp=share_link&ouid=108889957997221284203&rtpof=true&sd=true'),
(25, NULL, 'CRISIS CENTERS BILLS (HB 4967, 5186, 6007, 6066 & 6393)', 'Mary Sidney de Mesa', 'For reference of OCCEO', 'Position Paper', 'Social Inclusion and Equity', '2023-01-06', 'occeo@nyc.gov.ph', '2023-01-13', 'Yes', ' https://drive.google.com/drive/folders/1Ft_sdIX9xKLeKgKFKQEwE--WaLcGfEFp?usp=share_link '),
(26, NULL, 'SENATE BILLS ON A NATIONAL POLICY PREVENTING TEENAGE PREGNANCIES, INSTITUTIONALIZING SOCIAL PROTECTION FOR TEENAGE PARENTS, AND PROVIDING FUNDS THEREOF', 'Ernest Lucas', 'Manifested Senate Committee', 'Position Paper', 'Committee on Health', '2021-10-11', 'OCCEO', '2021-10-14', 'Yes', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `emp_id` varchar(100) NOT NULL,
  `book_id_reserv` int(11) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `date_borrowed` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `due_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `emp_id`, `book_id_reserv`, `isbn`, `date_borrowed`, `due_date`) VALUES
(89, 'EMP-0000-25', 10, 'N/A', '2023-01-24', '23-01-31'),
(90, 'EMP-0203-25', 9, 'N/A', '2023-01-24', '23-01-31'),
(91, 'EMP-0003-25', 3, 'N/A', '2023-01-24', '23-01-31'),
(92, '0008-01', 18, 'N/A', '2023-01-26', '23-02-02'),
(93, '9703-25', 3, 'N/A', '2023-01-26', '23-02-02'),
(96, '9909-20', 42, 'N/A', '2023-02-08', '23-02-15'),
(97, '9909-20', 36, 'N/A', '2023-02-08', '23-02-15'),
(98, '0408-04', 55, 'N/A', '2023-02-08', '23-02-15'),
(99, '0903-03', 37, 'N/A', '2023-02-08', '23-02-15'),
(100, 'D-2104-07', 54, 'N/A', '2023-02-09', '23-02-16'),
(101, '2111-12', 14, 'N/A', '2023-02-09', '23-02-16'),
(102, '0408-06', 56, 'N/A', '2023-02-09', '23-02-16'),
(103, 'D-2207-22', 55, 'N/A', '2023-02-09', '23-02-16'),
(104, '1208-01', 26, 'N/A', '2023-02-09', '23-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `returned`
--

CREATE TABLE `returned` (
  `return_id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `emp_id` varchar(100) NOT NULL,
  `book_id` int(11) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `date_borrowed` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `date_returned` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `returned`
--

INSERT INTO `returned` (`return_id`, `reservation_id`, `emp_id`, `book_id`, `isbn`, `date_borrowed`, `due_date`, `date_returned`) VALUES
(60, NULL, 'EMP-0233-25', 3, 'N/A', '2023-01-16', '23-01-23', '2023-01-16'),
(61, NULL, 'EMP-0233-25', 4, 'N/A', '2023-01-16', '23-01-23', '2023-01-16'),
(62, NULL, 'EMP-0203-25', 3, 'N/A', '2023-01-16', '23-01-23', '2023-01-17'),
(63, NULL, 'EMP-0003-25', 14, 'N/A', '2023-01-17', '23-01-24', '2023-01-17'),
(64, NULL, 'EMP-0233-25', 15, 'N/A', '2023-01-17', '23-01-24', '2023-01-22'),
(65, NULL, 'EMP-0203-25', 3, 'N/A', '2023-01-17', '23-01-24', '2023-01-22'),
(66, NULL, 'EMP-0003-25', 11, 'N/A', '2023-01-17', '23-01-24', '2023-01-22'),
(67, NULL, '9903-05', 14, 'N/A', '2023-01-18', '23-01-25', '2023-01-22'),
(68, NULL, '0008-01', 15, 'N/A', '2023-01-18', '23-01-25', '2023-01-22'),
(69, NULL, 'EMP-0000-25', 10, 'N/A', '2023-01-20', '23-01-27', '2023-01-22'),
(70, NULL, '090509', 9, 'N/A', '2023-01-20', '23-01-27', '2023-01-22'),
(71, NULL, '0408-04', 11, 'N/A', '2023-01-20', '23-01-27', '2023-01-22'),
(72, NULL, 'EMP-0000-25', 3, 'N/A', '2023-01-20', '23-01-27', '2023-01-22'),
(73, NULL, '0606-11', 16, 'N/A', '2023-01-20', '23-01-27', '2023-01-22'),
(74, NULL, '1308-01', 13, 'N/A', '2023-01-20', '23-01-27', '2023-01-22'),
(75, NULL, '9706-35', 8, 'N/A', '2023-01-20', '23-01-27', '2023-01-22'),
(76, NULL, '2111-12', 12, 'N/A', '2023-01-21', '23-01-28', '2023-01-22'),
(77, NULL, '2111-12', 17, 'N/A', '2023-01-21', '23-01-28', '2023-01-22'),
(78, NULL, 'EMP-0003-25', 8, 'N/A', '2023-01-22', '23-01-29', '2023-01-22'),
(79, NULL, 'EMP-0003-25', 13, 'N/A', '2023-01-22', '23-01-29', '2023-01-22'),
(80, NULL, 'EMP-0003-25', 9, 'N/A', '2023-01-22', '23-01-29', '2023-01-22'),
(81, NULL, 'D-1205-01', 36, 'N/A', '2023-01-30', '23-02-06', '2023-01-30'),
(82, NULL, '9909-20', 59, 'N/A', '2023-01-30', '23-02-06', '2023-02-02'),
(83, NULL, 'EMP-0233-25', 14, 'N/A', '2023-01-24', '23-01-31', '2023-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `senatearchive`
--

CREATE TABLE `senatearchive` (
  `no` int(11) NOT NULL,
  `senatebill_id` int(11) DEFAULT NULL,
  `emp_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `bill_number` varchar(100) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `date_filed` date NOT NULL,
  `subject` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sponsor` varchar(100) CHARACTER SET utf8 NOT NULL,
  `in_charge` varchar(100) CHARACTER SET utf8 NOT NULL,
  `updates` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 NOT NULL,
  `center_of_participation` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `senatearchive`
--

INSERT INTO `senatearchive` (`no`, `senatebill_id`, `emp_id`, `bill_number`, `title`, `date_filed`, `subject`, `sponsor`, `in_charge`, `updates`, `link`, `center_of_participation`) VALUES
(7, NULL, 'EMP-0203-25', 'SBN-29', 'AMENDING R.A. NO. 10931 (UNIVERSAL ACCESS TO QUALITY TERTIARY EDUCATION ACT)', '2022-07-05', '\"Universal Access to Quality Tertiary Education Tertiary Education\"', 'Revilla Jr., Ramon Bong', 'Higher, Technical and Vocational Education', 'Pending in the Committee (7/27/2022)', 'http://legacy.senate.gov.ph/lisdata/3773034172!.pdf', 'Kamille Sarmiento'),
(8, NULL, 'EMP-0203-25', 'SBN-1', 'ONE TABLET, ONE STUDENT ACT OF 2022', '2022-07-04', '\"One Tablet, One StudentSchools, PublicState Universities and Colleges (SUCS)\"', 'Legarda, Loren B', 'Basic Education, Arts and Culture', 'Pending in the Committee (7/27/2022)', '  http://legacy.senate.gov.ph/lisdata/3770234144!.pdf  ', 'Bea Pancho'),
(9, NULL, 'EMP-0203-25', 'SBN-664', 'AN ACT PROVIDING FOR THE DELINEATION OF THE SPECIFIC FOREST LIMITS OF THE PUBLIC DOMAIN AND FOR OTHE', '2022-07-18', 'Forest Land/Forest Limits', 'Estrada, Jinggoy E.', 'Environment and Natural Resources', 'Pending in the Committee (8/23/2022)', 'http://legacy.senate.gov.ph/lisdata/3854835001!.pdf', 'Mary Sidney de Mesa'),
(10, NULL, 'EMP-0003-25', '1', '1', '0000-00-00', '1', '1', '1', '1', '1', '1'),
(11, NULL, 'EMP-0203-25', 'SBN-1080', 'AN ACT PROVIDING FOR THE PRESERVATION, REFORESTATION, AFFORESTATION AND SUSTAINABLE DEVELOPMENT OF A', '2022-08-08', 'Mangrove Forests', 'Estrada, Jinggoy E.', 'Environment, Natural Resources and Climate Change', 'Pending in the Committee (9/6/2022)', '    https://legacy.senate.gov.ph/lisdata/3904935489!.pdf    ', 'Kamille Sarmiento'),
(12, NULL, 'EMP-0203-25', 'SBN-32', 'AN ACT EXEMPTING QUALIFIED INDIGENT FILIPINOS FROM PAYMENT OF PROFESSIONAL EXAMINATION FEES AND FOR ', '2022-07-05', '\"Indigent Persons Free Professional Examination\"', 'Lapid, Manuel \"Lito\" M', 'Civil Service, Government Reorganization and Professional Regulation', 'Pending in the Committee (7/27/2022)', '  http://legacy.senate.gov.ph/lisdata/3773334175!.pdf  ', 'Bea Pancho'),
(13, NULL, '9903-05', 'HB 6600', 'Bill to promote equality among young people in the community ', '2023-01-12', 'Youth', 'Congresswoman Fernando', 'Youth', 'For Committee Meeting ', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'Active citizenship '),
(14, NULL, 'EMP-0203-25', 'SBN-246', 'AN ACT REGULATING THE MANUFACTURING, IMPORTATION, AND USE OF SINGLE-USE PLASTIC PRODUCTS, AND PROVID', '2022-07-11', '\"Single-Use Plastic Plastic/Plastic Bags/Plastic Products/Plastic Waste\"', 'Legarda, Loren B.', 'Environment, Natural Resources and Climate Change', 'Pending in the Committee (8/3/2022)', ' http://legacy.senate.gov.ph/lisdata/3796534408!.pdf ', 'Bea Pancho'),
(15, NULL, 'EMP-0003-25', 'SBN-277', 'AN ACT INSTITUTIONALIZING SUSTAINABILITY IN GOVERNMENT-FUNDED SPORTS FACILITIES', '2022-07-11', '\"Sports Complex/Sports Center/Multi-Purpose Sports Center/Sports Academy Sustainable Development Goa', 'Lapid, Manuel \"Lito\" M.', 'Sports', 'Pending in the Committee (8/3/2022) ', ' http://legacy.senate.gov.ph/lisdata/3801634458!.pdf ', 'Mary Sidney de Mesa');

-- --------------------------------------------------------

--
-- Table structure for table `senatebill`
--

CREATE TABLE `senatebill` (
  `senatebill_id` int(11) NOT NULL,
  `emp_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `bill_number` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date_filed` date NOT NULL,
  `subject` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sponsor` varchar(100) NOT NULL,
  `in_charge` varchar(100) NOT NULL,
  `updates` varchar(100) CHARACTER SET utf8 NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 NOT NULL,
  `center_of_participation` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `senatebill`
--

INSERT INTO `senatebill` (`senatebill_id`, `emp_id`, `bill_number`, `title`, `date_filed`, `subject`, `sponsor`, `in_charge`, `updates`, `link`, `center_of_participation`) VALUES
(6, 'EMP-0203-25', 'SBN-95', 'AN ACT GRANTING FIVE PERCENT (5%) DISCOUNT ON BASIC AND EDUCATION SERVICES TO UNDERPRIVILEGED STUDEN', '2022-07-07', '\"Underprivileged Students Discount Privileges Technical-Vocational (Tech-Voc)\"', 'Angara, Sonny', 'Basic Education, Arts and Culture', 'Pending in the Committee (7/27/2022)', 'http://legacy.senate.gov.ph/lisdata/3779834239!.pdf', 'Marlo Enriquez'),
(7, 'EMP-0203-25', 'SBN-150', 'AN ACT ESTABLISHING AN ACADEMIC RECOVERY AND ACCESSIBLE LEARNING PROGRAM, APPROPRIATING FUNDS THEREF', '2022-07-07', 'Academic Recovery and Accessible Learning Program', 'Gatchalian, Win', 'Basic Education, Arts and Culture', 'Pending in the Committee (8/1/2022)', '  http://legacy.senate.gov.ph/lisdata/3785834299!.pdf  ', 'Mary Sidney de Mesa'),
(8, 'EMP-0203-25', 'SBN-246', 'AN ACT REGULATING THE MANUFACTURING, IMPORTATION, AND USE OF SINGLE-USE PLASTIC PRODUCTS, AND PROVID', '2022-07-11', '\"Single-Use Plastic Plastic/Plastic Bags/Plastic Products/Plastic Waste\"', 'Legarda, Loren B.', 'Environment, Natural Resources and Climate Change', 'Pending in the Committee (8/3/2022)', 'http://legacy.senate.gov.ph/lisdata/3796534408!.pdf', 'Mary Sidney de Mesa'),
(9, 'EMP-0203-25', 'SBN-412', 'AN ACT TO PROMOTE REFORESTATION AND TO INCREASE WOOD PRODUCTION THROUGH THE ESTABLISHMENT OF TREE GR', '2022-07-12', '\"Reforestation Wood Production Department of Environment and Natural Resources (DENR) Tree Planting/', 'Marcos, Imee R.', 'Environment, Natural Resources and Climate Change', 'Pending in the Committee (8/10/2022)', 'http://legacy.senate.gov.ph/lisdata/3817334611!.pdf', 'Bea Pancho'),
(10, 'EMP-0203-25', 'SBN-413', 'AN ACT TO ESTABLISH THE FOREST CADASTRE, PROVIDING FOR ITS PROCEDURES, AND FOR OTHER PURPOSES', '2022-07-12', 'Forest Land/Forest Limits', 'Marcos, Imee R.', 'Environment, Natural Resources and Climate Change', 'Pending in the Committee (8/10/2022)', 'http://legacy.senate.gov.ph/lisdata/3817434612!.pdf', 'Marlo Enriquez'),
(11, 'EMP-0203-25', 'SBN-629', 'AN ACT PROVIDING FOR THE URBAN AND COUNTRYSIDE GREENING IN THE PHILIPPINES', '2022-07-14', 'Urban and Countryside Greening', 'Angara, Sonny', 'Environment, Natural Resources and Climate Change', 'Pending in the Committee (8/17/2022)', ' http://legacy.senate.gov.ph/lisdata/3847234928!.pdf ', ' Kamille Sarmiento'),
(12, 'EMP-0203-25', 'SBN-629', 'AN ACT PROVIDING FOR THE URBAN AND COUNTRYSIDE GREENING IN THE PHILIPPINES', '2022-07-14', 'Urban and Countryside Greening', 'Angara, Sonny', 'Environment, Natural Resources and Climate Change', 'Pending in the Committee (8/17/2022)', 'http://legacy.senate.gov.ph/lisdata/3847234928!.pdf', ' Kamille Sarmiento'),
(13, 'EMP-0203-25', 'SBN-650', 'AN ACT DECLARING CLIMATE CHANGE EMERGENCY AND ENHANCING RESILIENCY AND ADAPTABILITY TO THE EFFECTS O', '2022-07-14', 'Climate Change', 'Marcos, Imee R.', 'Environment, Natural Resources and Climate Change', 'Pending in the Committee (8/17/2022)', 'http://legacy.senate.gov.ph/lisdata/3851134966!.pdf', 'Bea Pancho'),
(20, 'D-2104-07', '1001', 'Resolution Granting Youth Advocacies in Information Technology', '2023-01-01', 'Computer', 'Senator Juan Dela Cruz', 'Education', 'N/A', 'https://google.com', 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

CREATE TABLE `thesis` (
  `thesis_no` int(11) NOT NULL,
  `emp_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `accession_no` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `call_no` varchar(100) NOT NULL,
  `no_copies` int(11) NOT NULL,
  `copyright_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`thesis_no`, `emp_id`, `accession_no`, `title`, `author`, `call_no`, `no_copies`, `copyright_year`) VALUES
(4, 'EMP-0233-25', 1310, 'In the service of the Filipino Youth: A practicum Report on the Internship at the National Youth Commission.', 'Escalona, Jessie M.', 'F  305.235072  Es1i', 1, 2010),
(6, 'EMP-0233-25', 1329, 'The Management and Evaluation of the Community-Based Participatory Planning and development for Community Education (CBPPDCE) Training.', 'Masangkay, Julie Marie I.', 'F  370.194  M37m', 1, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `thesisarchive`
--

CREATE TABLE `thesisarchive` (
  `no` int(11) NOT NULL,
  `thesis_no` int(11) DEFAULT NULL,
  `accession_no` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `call_no` varchar(100) NOT NULL,
  `no_copies` int(11) NOT NULL,
  `copyright_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thesisarchive`
--

INSERT INTO `thesisarchive` (`no`, `thesis_no`, `accession_no`, `title`, `author`, `call_no`, `no_copies`, `copyright_year`) VALUES
(4, NULL, 1351, 'Istambay : A Sociological analysis of youth inactivity in the Philippines', 'Batan, Clarence M.', '0', 1, 2010),
(5, NULL, 1254, 'Assessment of the Management Control System of the National Youth Commission (NYC).', 'Magadan Arturo M.', 'F  352.’107  M27a', 1, 2000),
(6, NULL, 1253, 'A case Study on the effectiveness of the ship for Southeast Asian youth program (SSEAYP) in Promoting Friendship and internal cooperation among the southeast Asian youths.', 'Carreon, Conception G.', 'F  303.482’07  C23c', 1, 1999),
(7, NULL, 0, 'The Effect of national Youth Commission Volunteers Program on Active Citizenship in the philippines', 'Maria Isabel J. Indunan  Angela Gabrielle G. Jabalde  Ruth Abegail B. Licong  Mae Rosette P. Pation', 'N/A', 1, 2018),
(8, NULL, 0, 'Valuing service delivery satisfaction for a strengthened national youth commission', 'Gutierrez James Benedict', 'N/A', 1, 2017),
(9, NULL, 0, 'A Heuristic Model for Enhancing Youth Capabilities for Community Service in the NGOs. ', 'Reyes, Carmen P.', 'F  305.235  R33h', 1, 2001),
(10, NULL, 1330, 'Perceptions on the levels of implementations of the coastal Resource Management program and their implications to food security: (A Perceptual Study of Bolinao, Pangasinan and Puerto Princesa).', 'Bautista, Herbert Constantine M.', 'F  333.7207  B33p', 1, 2000),
(11, NULL, 1325, 'Public Libraries as partners in Youth Development: Establishing Youth Programs and Services in the Quezon City Public Libraries.', 'Panti, Michelle F.', 'F  352  P18p', 1, 2004),
(12, NULL, 1309, 'The Filipino Youth: Selected Data on Health and Employment 2004-2009.', 'Militante, III Jose Constantino C.', 'F  305.235072  M59f', 1, 2010),
(13, NULL, 0, 'The Effect of national Youth Commission Volunteers Program on Active Citizenship in the philippines', 'Maria Isabel J. Indunan  Angela Gabrielle G. Jabalde  Ruth Abegail B. Licong  Mae Rosette P. Pation', 'N/A', 1, 2018),
(14, NULL, 0, 'Valuing service delivery satisfaction for a strengthened national youth commission', 'Gutierrez James Benedict', 'N/A', 2, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `emp_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `division` int(3) NOT NULL,
  `type` int(3) NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`emp_id`, `division`, `type`, `first_name`, `last_name`, `email`, `password`) VALUES
('0008-01', 2, 1, 'Eric', 'Ramos', 'ericramos@nyc.gov.ph', '$2y$10$5JMFT9O3eTwLm0ESfgbCnuZ.oQPKQw1foFPvcLsUC9hVpDUhKa9Oi'),
('0305-08', 5, 1, 'Armando', 'Angeles', 'ncrcluster@nyc.gov.ph', '$2y$10$GnmavFBAAT2CkAYC7Wn6T.6ZCvzJxvq7TIV9zVG14.uqnj57bzrGG'),
('0309-09', 1, 1, 'Fernando', 'Luna', 'dingluna1212@gmail.com', '$2y$10$ACGWT./xZinJPqM8YpvCDe.JQS.wAbGcsQdwIWJa9Qb7thf7v1R/u'),
('0408-04', 5, 1, 'Jose', 'Cielos', 'josecielos@yahoo.com', '$2y$10$8BOLGnUXEGcVn0TnR690IuEuAoySidB3941OFaUSEBFD4ZZ3EzeMi'),
('0408-06', 2, 1, 'Agusto', 'Daquioag', 'jhynxz@gmail.com', '$2y$10$5BO1QwK.Kx7LQTSjFddcJu.PvuG6t9hxOCD.dvZf4KOGbN7RCkCHO'),
('0606-11', 1, 1, 'Danilo', 'Fermin', 'danferfermin23@gmail.com', '$2y$10$Qr5xscTZufh9M/rSgoyi3OZdAFYVX.vEOjyXYB8cyez55Tvo2MiO6'),
('0903-03', 1, 1, 'Jocelyn', 'Fernandez', 'macatojocelyn@yahoo.com', '$2y$10$73H2pmQACKtZ1BhpjRDDc.zZxJN9sIV99/zIUyxFt.IZu333ZnCWS'),
('0905-08', 3, 1, 'sarah', 'grutas', 'sarahgrutas@nyc.gov.ph', '$2y$10$Ezgr4WzVdnBdJMGHIjKYaOi1kF9LzmpxiNheLw9MVfSkNrDLfl4.y'),
('090509', 2, 1, 'Erica', 'Borja', 'ericaramosborja@gmail.com', '$2y$10$HPRVR5n1q3C3NU7hD1YqCege9qEvMQQWJBO1gU.tUfd/MvFZMNulq'),
('1103-04', 4, 4, 'Ernest', 'Lucas', 'nest.lucas@nyc.gov.ph', '$2y$10$Q1Kjirt09A0VHzWphjLBruYf/xDL4mEw/pcpvIIsQ.z3TIjcvf5pC'),
('1208-01', 4, 4, 'Ariane Joy', 'Coronel', 'ariane.coronel@nyc.gov.ph', '$2y$10$LiP81YetnjofA14ArSDzB.DiPBmrvqJC8LExv5f6kiJUcYSv0Bz2S'),
('1308-01', 1, 1, 'Kevin', 'Sanchez', 'ks_sanchez2828@yahoo.com', '$2y$10$Apxq2OdTRqE0ULnPgbBRE.5v1bz5WK25wNgAkDB4ty.WlYhc9XW/K'),
('1504-01', 1, 1, 'LORENZO', 'RAMOS, JR.', 'lorenzoramosjr26@gmail.com', '$2y$10$wmCEc4P4oV4ZXCYe7wcJfedcRnc75DxyzzIPCCW1P35aNvKX4o5Mq'),
('1705-01', 2, 1, 'Shayne Kay', 'Taay', 'shaynekay.taay@nyc.gov.ph', '$2y$10$yzDtHlBZ3/KsNEDNH43GcOBgV9xEJbuHhoZgsZQ3HtMq5EASYvuA2'),
('1711-01', 3, 1, 'Rosette', 'Roque', 'shengroque@nyc.gov.ph', '$2y$10$.A1MSQ0Jt.IeLGSV7hOHuerVECzAnJ9BGXx4v4jMtqDZy4FSZvhK2'),
('1907-05', 4, 4, 'Zenaida', 'Alejandro', 'zen12.nyc@gmail.com', '$2y$10$wU/I5GFJienaeunro9R47OUlBu7i.Z0Q99rZnHq7TkaFhcQFwPRsC'),
('1908-04', 4, 4, 'Ma. Beatrice', 'Pancho', 'mabeatrice.pancho@nyc.gov.ph', '$2y$10$hrBOGY0P/apK.pHJwHFFp./ZOKtcF07Ugv1veW5rUk2g7vCr09Vcm'),
('2001-04', 3, 1, 'Angela Marie', 'Villareal', 'nyc.ammvillareal@gmail.com', '$2y$10$.qpsclfR1KFt1MneKRDBXuniBh68WbQc/1UojbFgPhgYzSP336ELW'),
('2012-01', 6, 1, 'Jannikka Mae', 'Gamale', 'gamale.jannikka@gmail.com', '$2y$10$XyEDtdu9YoPpLcg2cg5FF.Bh4vtedJoMf/fZzI2MpcuFjWAe2Kay6'),
('2111-12', 3, 1, 'Rowell', 'Velonza', 'rbvelonza.nyc@gmail.com', '$2y$10$PVUg/kGN8Or9M6q1WGl.SuXWXaHvUiFMIAzQ4l5GtPOal220vgKXG'),
('2111-16', 3, 1, 'Joyce Eliel', 'Ebora', 'joyce.ebora@nyc.gov.ph', '$2y$10$cEGR4/vomxBpQ3b4FRNDE./YKXoE2EojRxP0ZuOJFgjei.z7u9liW'),
('2112-17', 2, 1, 'Fiori Rexia', 'Estoperez', 'fiori.estoperez@nyc.gov.ph', '$2y$10$640.8m7K9Efy2w6fI0N/Hu3AS5hapenJ7DQ3l.UqFps3Op.pohvj.'),
('2202-05', 6, 1, 'Riolyn', 'Manibog-Namnama', 'ronaldcardema@nyc.gov.ph', '$2y$10$CLzUHvIXK.F42m5WX1mdzOwhphVLdeTkimD..oBA6kK4M9SzOc7tq'),
('2203-14', 4, 4, 'Mary Sidney', 'De Mesa', 'marysidney.demesa@nyc.gov.ph', '$2y$10$Iz.S5dPGQUdhdjOY6/FRYeFJEPQekm/Hvy0nAn0/eXAe1rBlo7922'),
('2203-17', 5, 1, 'ROLANDO', 'MABANAN', 'rmabanan@nyc.gov.ph', '$2y$10$kwJF7wo0rFTuJR2.zsAu.ugcizWAHZQ5x1CIATOKt/7PnF/FN06iC'),
('2207-22', 6, 1, 'Divine', 'Tamayo', 'divine.tamayo@nyc.gov.ph', '$2y$10$uYbK4392AGXhZmVSmFITSOZRFeE97egwax/UBfHpJHQF9U3j/7Q8u'),
('9610-14', 2, 1, 'MANUEL', 'NICDAO', 'smdnycphil@gmail.com', '$2y$10$vLBrzOdHE88/WGtoY/cftulEaOtoj0tdwR3DFGBiE49DXJa/J0okq'),
('9610-17', 1, 1, 'Rosalina Manuela', 'Robles', 'acu.nyc2018@gmail.com', '$2y$10$OVc6M07mzQ7fVcrry/nZV.g01XsBS0L0me7uxtkM591ETd5wD77WO'),
('9701-02', 5, 1, 'ROMERO', 'QUIAMBAO', 'romerquiambao@yahoo.com', '$2y$10$0zqQ7LvbSitetd4HlP6sJunaprdPK/pitLy15.dAn89BIcUpqPMgS'),
('9703-25', 4, 2, 'DENNIS', 'SANTOS', 'dennissantos22572@gmail.com', '$2y$10$cYv.HYC/v8Rp4kiTfEJjBeR96E8yqcu6nscnkW9qMFKDouza8l00.'),
('9703-26', 4, 4, 'Marlo', 'Enriquez', 'marloenriquez75@gmail.com', '$2y$10$bT.1yD81bezT2.wYqG4n8OuxqKM1H.aj57PYC6oMs22pr2vEsvQxG'),
('9706-35', 1, 1, 'Arlene', 'Prepotente', 'arlene.prep@gmail.com', '$2y$10$B4/PIwtR1PcK/zw75F23f.B4OV9JRKEaaAKfJsfQgqE.n5x5sAyby'),
('9708-40', 3, 1, 'Jenivie Anne', 'Ramirez-Salmo', 'jramirezsalmo@gmail.com', '$2y$10$46Q70oXU7.ZbVLVM2rKNUuELCtZAPbacP0uGr1uJM9aa7aE41oGR2'),
('9809-14', 2, 1, 'Cristabeth', 'Madrigal', 'bethmadrigal@nyc.gov.ph', '$2y$10$LkKzsmjh63EJZNNNnR1eIOIjfiTu2ZwlSNVSo8nUaHFZk3UF3Ql6e'),
('9903-05', 4, 4, 'Baby Bernadette', 'Fernando', 'radi_bullet@yahoo.com', '$2y$10$3xfLhz57TL.q1P.DBa00POZUtxjYZy2/wAxbxcitAZ7R1vWEv5b8q'),
('9909-19', 2, 1, 'Mendoza', 'Dennis', 'dennis.mendoza@nyc.gov.ph', '$2y$10$RTuaJ5S8s1ZXE2WNfxhUd.URVvffcxZ8KWsKz6lAgZJ6E0shrzFAi'),
('9909-20', 5, 1, 'elsa', 'magdaleno', 'elsaledesma2003@yahoo.com', '$2y$10$AYG99MOfVTZZ/2YVg2OsCe00M2PayZNMKe3/eTv8iqRZYn9unVG9a'),
('D-1205-01', 4, 3, 'Warlyn', 'Tambio', 'warlyn_tambio@yahoo.com', '$2y$10$DQNGd/k69VM8snJdtbHIX.q6J9qephwkvJKORPOwCErAWHELTonFq'),
('D-1908-15', 6, 1, 'Thalia', 'De Guzman', 'deguzman.thalia65@gmail.com', '$2y$10$RelBhVVMWvXZ60NbUrD76e9g7foO4VuZQ7SWmQOGfmXIJHmRkRjuC'),
('D-2104-07', 1, 2, 'Joseph', 'Beaniza', 'jrbeaniza@nyc.gov.ph', '$2y$10$1J1PX7cpFcLEcit231Fe0elIa3jPPe5/meizE8PR/MfRrMvw6ulXG'),
('D-2207-22', 6, 1, 'Dino', 'Faustorilla', 'yotobsohigh@gmail.com', '$2y$10$7wUPqLIP7mZeBncSmPDyDujvGPRIBKxFfxKxWjp1NQgWT8kovCANy'),
('D-2212-28', 4, 1, 'Abbygale', 'Molina', 'acmolina@nyc.gov.ph', '$2y$10$/SO.Kirhg.B70n2Qh4fHoefFvIG82/anWTQ829LXZBubUv1WBodQ2'),
('EMP-0000-25', 1, 1, 'Mark', 'Flores', '123@gmail.com', '$2y$10$05GUqiZ8s9OTUO0DJ055l.L5T0DWTX1p9ehOmt.bCi9eDeO7ahski'),
('EMP-0003-25', 1, 2, 'Patricia', 'Flores', 'flores@gmail.com', '$2y$10$Lg7dkM53/neyEtY7bIfvKOkSj8IP/W7.rf0XfXEctGmpdGKKXuSHS'),
('EMP-0203-25', 1, 4, 'Janel', 'Aguilar', 'janel@yahoo.com', '$2y$10$YO4gNc8YT2ThliPD9.h7r.3pKH43Rjflcmnb5muCPXAKvhWwDCvmG'),
('EMP-0233-25', 1, 3, 'Ron Angelo', 'Alteza', 'alteza@gmail.com', '$2y$10$k2mvtPEf0KzuzlDDa4N5fOZNOcHzoyOflUFqCJ38UxljC9g3YeaJe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `emp_id_2` (`emp_id`);

--
-- Indexes for table `audittrail`
--
ALTER TABLE `audittrail`
  ADD PRIMARY KEY (`audit_no`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`no_book`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `emp_id_2` (`emp_id`);

--
-- Indexes for table `bookarchive`
--
ALTER TABLE `bookarchive`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no_book` (`no_book`);

--
-- Indexes for table `cd`
--
ALTER TABLE `cd`
  ADD PRIMARY KEY (`no_cd`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `cdarchive`
--
ALTER TABLE `cdarchive`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no_cd_idx` (`no_cd`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`no_docu`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `documentarch`
--
ALTER TABLE `documentarch`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no_docu` (`no_docu`);

--
-- Indexes for table `emailverification`
--
ALTER TABLE `emailverification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_type`
--
ALTER TABLE `emp_type`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`no_journal`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `journalarchive`
--
ALTER TABLE `journalarchive`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no_journal_idx` (`no_journal`);

--
-- Indexes for table `magazine`
--
ALTER TABLE `magazine`
  ADD PRIMARY KEY (`no_magazine`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `magazinearchive`
--
ALTER TABLE `magazinearchive`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no_magazine_idx` (`no_magazine`);

--
-- Indexes for table `monthlypolicy`
--
ALTER TABLE `monthlypolicy`
  ADD PRIMARY KEY (`policy_no`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`policy_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `policyarchive`
--
ALTER TABLE `policyarchive`
  ADD PRIMARY KEY (`no`),
  ADD KEY `policy_id_idx` (`policy_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `emp_id_reserv_idx` (`emp_id`),
  ADD KEY `book_id_reserv_idx` (`book_id_reserv`);

--
-- Indexes for table `returned`
--
ALTER TABLE `returned`
  ADD PRIMARY KEY (`return_id`),
  ADD KEY `reservation_id_idx` (`reservation_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `senatearchive`
--
ALTER TABLE `senatearchive`
  ADD PRIMARY KEY (`no`),
  ADD KEY `senate_bills_fk_1` (`senatebill_id`);

--
-- Indexes for table `senatebill`
--
ALTER TABLE `senatebill`
  ADD PRIMARY KEY (`senatebill_id`),
  ADD KEY `user_id` (`emp_id`);

--
-- Indexes for table `thesis`
--
ALTER TABLE `thesis`
  ADD PRIMARY KEY (`thesis_no`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `emp_id_2` (`emp_id`);

--
-- Indexes for table `thesisarchive`
--
ALTER TABLE `thesisarchive`
  ADD PRIMARY KEY (`no`),
  ADD KEY `thesis_no_idx` (`thesis_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `type` (`type`),
  ADD KEY `division` (`division`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `audittrail`
--
ALTER TABLE `audittrail`
  MODIFY `audit_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1038;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `no_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `bookarchive`
--
ALTER TABLE `bookarchive`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cd`
--
ALTER TABLE `cd`
  MODIFY `no_cd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cdarchive`
--
ALTER TABLE `cdarchive`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `no_docu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `documentarch`
--
ALTER TABLE `documentarch`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `emailverification`
--
ALTER TABLE `emailverification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `no_journal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `journalarchive`
--
ALTER TABLE `journalarchive`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `magazine`
--
ALTER TABLE `magazine`
  MODIFY `no_magazine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `magazinearchive`
--
ALTER TABLE `magazinearchive`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `monthlypolicy`
--
ALTER TABLE `monthlypolicy`
  MODIFY `policy_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `policy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `policyarchive`
--
ALTER TABLE `policyarchive`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `returned`
--
ALTER TABLE `returned`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `senatearchive`
--
ALTER TABLE `senatearchive`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `senatebill`
--
ALTER TABLE `senatebill`
  MODIFY `senatebill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `thesis`
--
ALTER TABLE `thesis`
  MODIFY `thesis_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `thesisarchive`
--
ALTER TABLE `thesisarchive`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `user` (`emp_id`);

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `user` (`emp_id`);

--
-- Constraints for table `bookarchive`
--
ALTER TABLE `bookarchive`
  ADD CONSTRAINT `bookarchive_ibfk_1` FOREIGN KEY (`no_book`) REFERENCES `book` (`no_book`) ON DELETE SET NULL;

--
-- Constraints for table `cd`
--
ALTER TABLE `cd`
  ADD CONSTRAINT `cd_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `user` (`emp_id`);

--
-- Constraints for table `cdarchive`
--
ALTER TABLE `cdarchive`
  ADD CONSTRAINT `no_cd` FOREIGN KEY (`no_cd`) REFERENCES `cd` (`no_cd`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `user` (`emp_id`);

--
-- Constraints for table `documentarch`
--
ALTER TABLE `documentarch`
  ADD CONSTRAINT `documentarch_ibfk_1` FOREIGN KEY (`no_docu`) REFERENCES `document` (`no_docu`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `journal`
--
ALTER TABLE `journal`
  ADD CONSTRAINT `journal_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `user` (`emp_id`);

--
-- Constraints for table `journalarchive`
--
ALTER TABLE `journalarchive`
  ADD CONSTRAINT `no_journal` FOREIGN KEY (`no_journal`) REFERENCES `journal` (`no_journal`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `magazine`
--
ALTER TABLE `magazine`
  ADD CONSTRAINT `magazine_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `user` (`emp_id`);

--
-- Constraints for table `magazinearchive`
--
ALTER TABLE `magazinearchive`
  ADD CONSTRAINT `magazinearchive_ibfk_1` FOREIGN KEY (`no_magazine`) REFERENCES `magazine` (`no_magazine`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `monthlypolicy`
--
ALTER TABLE `monthlypolicy`
  ADD CONSTRAINT `monthlypolicy_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `user` (`emp_id`) ON DELETE SET NULL;

--
-- Constraints for table `policy`
--
ALTER TABLE `policy`
  ADD CONSTRAINT `policy_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `user` (`emp_id`);

--
-- Constraints for table `policyarchive`
--
ALTER TABLE `policyarchive`
  ADD CONSTRAINT `policyarchive_ibfk_1` FOREIGN KEY (`policy_id`) REFERENCES `policy` (`policy_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `returned`
--
ALTER TABLE `returned`
  ADD CONSTRAINT `returned_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON DELETE SET NULL;

--
-- Constraints for table `senatearchive`
--
ALTER TABLE `senatearchive`
  ADD CONSTRAINT `senate_bills_fk_1` FOREIGN KEY (`senatebill_id`) REFERENCES `senatebill` (`senatebill_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `senatebill`
--
ALTER TABLE `senatebill`
  ADD CONSTRAINT `senatebill_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `user` (`emp_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `thesis`
--
ALTER TABLE `thesis`
  ADD CONSTRAINT `thesis_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `user` (`emp_id`);

--
-- Constraints for table `thesisarchive`
--
ALTER TABLE `thesisarchive`
  ADD CONSTRAINT `thesisarchive_ibfk_1` FOREIGN KEY (`thesis_no`) REFERENCES `thesis` (`thesis_no`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`type`) REFERENCES `emp_type` (`category_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`division`) REFERENCES `division` (`division_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
