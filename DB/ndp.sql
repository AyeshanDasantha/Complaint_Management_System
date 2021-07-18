-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 07:29 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ndp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', '912ec803b2ce49e4a541068d495ab570', '16-10-2019 11:31:32 AM');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `towho` varchar(255) NOT NULL,
  `discription` longtext NOT NULL,
  `status` varchar(50) NOT NULL,
  `startdate` date DEFAULT NULL,
  `nodays` varchar(10) DEFAULT NULL,
  `expire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `towho`, `discription`, `status`, `startdate`, `nodays`, `expire`) VALUES
(1, 'admin', '							<span style=\"font-style: italic;\">														vsdggsddgf										</span>					', '1', '2019-10-04', '1', '2019-10-05'),
(2, 'user', '																					vsdggsddgf															', '1', '2019-10-04', '3', '2019-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `appealcomplaint`
--

CREATE TABLE `appealcomplaint` (
  `id` int(11) NOT NULL,
  `complaintNo` int(100) NOT NULL,
  `province` int(100) NOT NULL,
  `appeal_description` varchar(255) NOT NULL,
  `DateTime` varchar(255) NOT NULL,
  `UserID` varchar(255) DEFAULT NULL,
  `appealFile` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `paymentStatus` int(2) DEFAULT 0,
  `total` int(50) NOT NULL,
  `paymentDateTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appealremark`
--

CREATE TABLE `appealremark` (
  `id` int(11) NOT NULL,
  `appealid` int(11) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryDescription` longtext NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(1, 'Environmental issue', '', '2019-10-16 05:41:00', '26-10-2019 09:24:10 AM'),
(2, 'Transportation issue', '', '2019-10-26 03:54:32', NULL),
(3, 'Electricity', '', '2019-10-26 04:06:30', NULL),
(4, 'Irrigation', '', '2019-10-26 04:06:44', NULL),
(5, 'Agriculture and production', '', '2019-10-26 04:06:56', NULL),
(6, 'Water supply', '', '2019-10-26 04:07:08', NULL),
(7, 'Education', '', '2019-10-26 04:07:16', NULL),
(8, 'Health', '', '2019-10-26 04:07:24', NULL),
(9, 'Rural infrastructure', '', '2019-10-26 04:07:33', NULL),
(10, 'Administrative', '', '2019-10-26 04:07:55', NULL),
(11, 'Other', '', '2019-10-26 04:08:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` int(11) NOT NULL,
  `ChargeType` varchar(255) NOT NULL,
  `ChargeAmount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `ChargeType`, `ChargeAmount`) VALUES
(1, 'Appeal Charge', 1000),
(2, 'Appeal Service Charge', 100);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `cityName` varchar(255) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `sid`, `cityName`, `postingDate`, `updationDate`) VALUES
(1, 4, 'Akurana', '2019-07-16 03:46:55', '13-08-2019 08:32:20 PM'),
(2, 4, 'Delthota', '2019-07-16 03:47:08', NULL),
(3, 4, 'Doluwa', '2019-07-16 03:47:16', NULL),
(4, 4, 'Ganga Ihala Korale', '2019-07-16 03:48:29', NULL),
(5, 4, 'Harispattuwa', '2019-07-16 03:48:37', NULL),
(6, 4, 'Hatharaliyadda', '2019-07-16 03:48:44', NULL),
(7, 4, 'Kandy', '2019-07-16 03:48:53', NULL),
(8, 4, 'Kundasale', '2019-07-16 03:49:06', NULL),
(9, 4, 'Medadumbara', '2019-07-16 03:49:13', NULL),
(10, 4, 'Minipe', '2019-07-16 03:49:23', NULL),
(11, 4, 'Panvila', '2019-07-16 03:49:30', NULL),
(12, 4, 'Pasbage Korale', '2019-07-16 03:49:46', NULL),
(13, 4, 'Pathadumbara', '2019-07-16 03:50:06', NULL),
(14, 4, 'Pathahewaheta', '2019-07-16 03:50:18', NULL),
(15, 4, 'Poojapitiya', '2019-07-16 03:50:41', NULL),
(16, 4, 'Thumpane', '2019-07-16 03:50:50', NULL),
(17, 4, 'Udadumbara', '2019-07-16 03:50:58', NULL),
(18, 4, 'Udapalatha', '2019-07-16 03:51:06', NULL),
(19, 4, 'Udunuwara', '2019-07-16 03:51:18', NULL),
(20, 4, 'Yatinuwara', '2019-07-16 04:05:29', NULL),
(21, 5, 'Ambanganga Korale', '2019-07-16 04:06:08', NULL),
(22, 5, 'Dambulla', '2019-07-16 04:06:38', NULL),
(23, 5, 'Galewela', '2019-07-16 04:06:47', NULL),
(24, 5, 'Laggala-Pallegama', '2019-07-16 04:07:12', NULL),
(25, 5, 'Matale', '2019-07-16 04:07:21', NULL),
(26, 5, 'Naula', '2019-07-16 04:07:28', NULL),
(27, 5, 'Pallepola', '2019-07-16 04:07:34', NULL),
(28, 5, 'Rattota', '2019-07-16 04:07:42', NULL),
(29, 5, 'Ukuwela', '2019-07-16 04:07:49', NULL),
(30, 5, 'Wilgamuwa', '2019-07-16 04:07:57', NULL),
(31, 5, 'Yatawatta', '2019-07-16 04:08:05', NULL),
(32, 6, 'Ambagamuwa', '2019-07-16 04:08:55', NULL),
(33, 6, 'Hanguranketha', '2019-07-16 04:09:03', NULL),
(34, 6, 'Kothmale', '2019-07-16 04:09:10', NULL),
(35, 6, 'Nuwara Eliya', '2019-07-16 04:09:19', NULL),
(36, 6, 'Walapane', '2019-07-16 04:09:27', NULL),
(37, 1, 'Addalachchenai', '2019-07-16 04:10:21', NULL),
(38, 1, 'Akkaraipattu', '2019-07-16 04:10:27', NULL),
(39, 1, 'Alayadiwembu', '2019-07-16 04:13:15', NULL),
(40, 1, 'Ampara', '2019-07-16 04:13:25', NULL),
(41, 1, 'Damana', '2019-07-16 04:13:35', NULL),
(42, 1, 'Dehiattakandiya', '2019-07-16 04:13:45', NULL),
(43, 1, 'Eragama', '2019-07-16 04:13:53', NULL),
(44, 1, 'Kalmunai Muslim', '2019-07-16 04:14:05', NULL),
(45, 1, 'Kalmunai Tamil', '2019-07-16 04:14:17', NULL),
(46, 1, 'Karaitivu', '2019-07-16 04:14:26', NULL),
(47, 1, 'Lahugala', '2019-07-16 04:14:36', NULL),
(48, 1, 'Mahaoya', '2019-07-16 04:14:46', NULL),
(49, 1, 'Navithanveli', '2019-07-16 04:14:53', NULL),
(50, 1, 'Ninthavur', '2019-07-16 04:15:11', NULL),
(51, 1, 'Padiyathalawa', '2019-07-16 04:15:20', NULL),
(52, 1, 'Pothuvil', '2019-07-16 04:15:30', NULL),
(53, 1, 'Sainthamarathu', '2019-07-16 04:15:40', NULL),
(54, 1, 'Samanthurai', '2019-07-16 04:15:53', NULL),
(55, 1, 'Thirukkovil', '2019-07-16 04:16:05', NULL),
(56, 1, 'Uhana', '2019-07-16 04:16:15', NULL),
(57, 2, 'Eravur Pattu', '2019-07-16 04:16:38', NULL),
(58, 2, 'Eravur Town', '2019-07-16 04:17:22', NULL),
(59, 2, 'Kattankudy', '2019-07-16 04:17:35', NULL),
(60, 2, 'Koralai Pattu', '2019-07-16 04:17:46', NULL),
(61, 2, 'Koralai Pattu Central', '2019-07-16 04:17:57', NULL),
(62, 2, 'Koralai Pattu North', '2019-07-16 04:18:09', NULL),
(63, 2, 'Koralai Pattu South', '2019-07-16 04:18:26', NULL),
(64, 2, 'Koralai Pattu West', '2019-07-16 04:18:40', NULL),
(65, 2, 'Manmunai North', '2019-07-16 04:18:51', NULL),
(66, 2, 'Manmunai Pattu', '2019-07-16 04:19:01', NULL),
(67, 2, 'Manmunai S. and Eruvil Pattu', '2019-07-16 04:19:17', NULL),
(68, 2, 'Manmunai South West', '2019-07-16 04:19:28', NULL),
(69, 2, 'Manmunai West', '2019-07-16 04:19:40', NULL),
(70, 2, 'Porativu Pattu', '2019-07-16 04:19:50', NULL),
(71, 3, 'Gomarankadawala', '2019-07-16 04:20:56', NULL),
(72, 3, 'Kantalai', '2019-07-16 04:21:06', NULL),
(73, 3, 'Kinniya', '2019-07-16 04:21:20', NULL),
(74, 3, 'Kuchchaveli', '2019-07-16 04:21:31', NULL),
(75, 3, 'Morawewa', '2019-07-16 04:21:41', NULL),
(76, 3, 'Muttur', '2019-07-16 04:21:49', NULL),
(77, 3, 'Padavi Sri Pura', '2019-07-16 04:21:59', NULL),
(78, 3, 'Seruvila', '2019-07-16 04:22:08', NULL),
(79, 3, 'Thambalagamuwa', '2019-07-16 04:22:19', NULL),
(80, 3, 'Trincomalee', '2019-07-16 04:22:29', NULL),
(81, 3, 'Verugal', '2019-07-16 04:22:38', NULL),
(82, 24, 'Galnewa', '2019-07-16 04:24:24', NULL),
(83, 24, 'Galenbindunuwewa', '2019-07-16 04:24:38', NULL),
(84, 24, 'Horowpothana', '2019-07-16 04:24:51', NULL),
(85, 24, 'Ipalogama', '2019-07-16 04:25:17', NULL),
(86, 24, 'Kahatagasdigiliya', '2019-07-16 04:25:29', NULL),
(87, 24, 'Kebithigollewa', '2019-07-16 04:25:41', NULL),
(88, 24, 'Kekirawa', '2019-07-16 04:25:57', NULL),
(89, 24, 'Mahavilachchiya', '2019-07-16 04:26:18', NULL),
(90, 24, 'Medawachchiya', '2019-07-16 04:26:30', NULL),
(91, 24, 'Mihinthale', '2019-07-16 04:26:42', NULL),
(92, 24, 'Nachchadoowa', '2019-07-16 04:26:55', NULL),
(93, 24, 'Nochchiyagama', '2019-07-16 04:27:06', NULL),
(94, 24, 'Nuwaragam Palatha Central', '2019-07-16 04:27:19', NULL),
(95, 24, 'Nuwaragam Palatha East', '2019-07-16 04:27:29', NULL),
(96, 24, 'Padaviya', '2019-07-16 04:28:00', NULL),
(97, 24, 'Palagala', '2019-07-16 04:28:12', NULL),
(98, 24, 'PalugaswewaÂ ', '2019-07-16 04:28:22', NULL),
(99, 24, 'RajanganayaÂ ', '2019-07-16 04:28:33', NULL),
(100, 24, 'Rambewa', '2019-07-16 04:28:55', NULL),
(101, 24, 'Thalawa', '2019-07-16 04:29:08', NULL),
(102, 24, 'Thambuttegama', '2019-07-16 04:29:19', NULL),
(103, 24, 'Thirappane', '2019-07-16 04:29:30', NULL),
(104, 25, 'Dimbulagala', '2019-07-16 04:30:24', NULL),
(105, 25, 'Elahera', '2019-07-16 04:30:33', NULL),
(106, 25, 'Hingurakgoda', '2019-07-16 04:30:41', NULL),
(107, 25, 'Lankapura', '2019-07-16 04:30:49', NULL),
(108, 25, 'Medirigiriya', '2019-07-16 04:30:59', NULL),
(109, 25, 'Thamankaduwa', '2019-07-16 04:31:07', NULL),
(110, 25, 'Welikanda', '2019-07-16 04:31:17', NULL),
(111, 17, 'Delft', '2019-07-16 04:31:51', NULL),
(112, 17, 'Island North', '2019-07-16 04:32:02', NULL),
(113, 17, 'Island South', '2019-07-16 04:39:53', NULL),
(114, 17, 'Jaffna', '2019-07-16 04:40:12', NULL),
(115, 17, 'Karainagar', '2019-07-16 04:40:22', NULL),
(116, 17, 'Nallur', '2019-07-16 04:41:02', NULL),
(117, 17, 'Thenmaradchi', '2019-07-16 04:41:25', NULL),
(118, 17, 'Vadamaradchi East', '2019-07-16 04:41:41', NULL),
(119, 17, 'Vadamaradchi North', '2019-07-16 04:41:54', NULL),
(120, 17, 'Vadamaradchi South-West', '2019-07-16 04:42:07', NULL),
(121, 17, 'Valikamam East', '2019-07-16 04:42:25', NULL),
(122, 17, 'Valikamam North', '2019-07-16 04:42:55', NULL),
(123, 17, 'Valikamam South', '2019-07-16 04:43:03', NULL),
(124, 17, 'Valikamam South-West', '2019-07-16 04:43:11', NULL),
(125, 17, 'Valikamam West', '2019-07-16 04:43:22', NULL),
(126, 18, 'Kandavalai', '2019-07-16 04:48:14', NULL),
(127, 18, 'Karachchi', '2019-07-16 04:48:25', NULL),
(128, 18, 'Pachchilaipalli', '2019-07-16 04:51:21', NULL),
(129, 18, 'Poonakary', '2019-07-16 04:51:36', NULL),
(130, 19, 'Madhu', '2019-07-16 04:53:05', NULL),
(131, 19, 'Mannar', '2019-07-16 04:53:24', NULL),
(132, 19, 'Manthai West', '2019-07-16 04:53:37', NULL),
(133, 19, 'Musalai', '2019-07-16 04:53:48', NULL),
(134, 19, 'Nanaddan', '2019-07-16 04:53:57', NULL),
(135, 20, 'Manthai East', '2019-07-16 05:10:36', NULL),
(136, 20, 'Maritimepattu', '2019-07-16 05:10:46', NULL),
(137, 20, 'Oddusuddan', '2019-07-16 05:10:56', NULL),
(138, 20, 'Puthukudiyiruppu', '2019-07-16 05:11:06', NULL),
(139, 20, 'Thunukkai', '2019-07-16 05:11:16', NULL),
(140, 20, 'Welioya', '2019-07-16 05:11:31', NULL),
(141, 21, 'Vavuniya', '2019-07-16 05:11:52', NULL),
(142, 21, 'Vavuniya North', '2019-07-16 05:12:03', NULL),
(143, 21, 'Vavuniya South', '2019-07-16 05:12:11', NULL),
(144, 21, 'Vengalacheddikulam', '2019-07-16 05:12:23', NULL),
(145, 22, 'Alawwa', '2019-07-16 05:13:05', NULL),
(146, 22, 'Ambanpola', '2019-07-16 05:13:15', NULL),
(147, 22, 'Bamunakotuwa', '2019-07-16 05:15:25', NULL),
(148, 22, 'Bingiriya', '2019-07-16 05:15:38', NULL),
(149, 22, 'Ehetuwewa', '2019-07-16 05:15:45', NULL),
(150, 22, 'Galgamuwa', '2019-07-16 05:15:54', NULL),
(151, 22, 'Ganewatta', '2019-07-16 05:16:02', NULL),
(152, 22, 'Giribawa', '2019-07-16 05:16:10', NULL),
(153, 22, 'Ibbagamuwa', '2019-07-16 05:16:17', NULL),
(154, 22, 'Katupotha', '2019-07-16 05:16:26', NULL),
(155, 22, 'Kobeigane', '2019-07-16 05:16:33', NULL),
(156, 22, 'Kotavehera', '2019-07-16 05:16:41', NULL),
(157, 22, 'Kuliyapitiya East', '2019-07-16 05:16:50', NULL),
(158, 22, 'Kuliyapitiya West', '2019-07-16 05:16:59', NULL),
(159, 22, 'Kurunegala', '2019-07-16 05:17:06', NULL),
(160, 22, 'Mahawa', '2019-07-16 05:17:13', NULL),
(161, 22, 'Mallawapitiya', '2019-07-16 05:17:22', NULL),
(162, 22, 'Maspotha', '2019-07-16 05:17:29', NULL),
(163, 22, 'Mawathagama', '2019-07-16 05:17:36', NULL),
(164, 22, 'Narammala', '2019-07-16 05:17:44', NULL),
(165, 22, 'Nikaweratiya', '2019-07-16 05:17:51', NULL),
(166, 22, 'Panduwasnuwara', '2019-07-16 05:18:02', NULL),
(167, 22, 'Pannala', '2019-07-16 05:18:09', NULL),
(168, 22, 'Polgahawela', '2019-07-16 05:18:17', NULL),
(169, 22, 'Polpithigama', '2019-07-16 05:18:23', NULL),
(170, 22, 'Rasnayakapura', '2019-07-16 05:18:31', NULL),
(171, 22, 'Rideegama', '2019-07-16 05:18:37', NULL),
(172, 22, 'Udubaddawa', '2019-07-16 05:18:45', NULL),
(173, 22, 'Wariyapola', '2019-07-16 05:18:51', NULL),
(174, 22, 'Weerambugedara', '2019-07-16 05:18:58', NULL),
(175, 23, 'Anamaduwa', '2019-07-16 05:19:21', NULL),
(176, 23, 'Arachchikattuwa', '2019-07-16 05:19:27', NULL),
(177, 23, 'Chilaw', '2019-07-16 05:19:34', NULL),
(178, 23, 'Dankotuwa', '2019-07-16 05:19:43', NULL),
(179, 23, 'Kalpitiya', '2019-07-16 05:19:50', NULL),
(180, 23, 'Karuwalagaswewa', '2019-07-16 05:19:58', NULL),
(181, 23, 'Madampe', '2019-07-16 05:20:06', NULL),
(182, 23, 'Mahakumbukkadawala', '2019-07-16 05:20:12', NULL),
(183, 23, 'Mahawewa', '2019-07-16 05:20:19', NULL),
(184, 23, 'Mundalama', '2019-07-16 05:20:25', NULL),
(185, 23, 'Nattandiya', '2019-07-16 05:20:32', NULL),
(186, 23, 'Nawagattegama', '2019-07-16 05:20:42', NULL),
(187, 23, 'Pallama', '2019-07-16 05:20:48', NULL),
(188, 23, 'Puttalam', '2019-07-16 05:20:55', NULL),
(189, 23, 'Vanathavilluwa', '2019-07-16 05:21:01', NULL),
(190, 23, 'Wennappuwa', '2019-07-16 05:21:07', NULL),
(191, 15, 'Aranayakaa', '2019-07-16 05:21:28', '14-08-2019 04:17:20 PM'),
(192, 15, 'Bulathkohupitiya', '2019-07-16 05:21:36', NULL),
(193, 15, 'Dehiovita', '2019-07-16 05:21:43', NULL),
(194, 15, 'Deraniyagala', '2019-07-16 05:21:50', NULL),
(195, 15, 'Galigamuwa', '2019-07-16 05:21:57', NULL),
(196, 15, 'Kegalle', '2019-07-16 05:22:03', NULL),
(197, 15, 'Mawanella', '2019-07-16 05:22:11', NULL),
(198, 15, 'Rambukkana', '2019-07-16 05:22:18', NULL),
(199, 15, 'Ruwanwella', '2019-07-16 05:22:28', NULL),
(200, 15, 'Warakapola', '2019-07-16 05:22:35', NULL),
(201, 15, 'Yatiyanthota', '2019-07-16 05:22:42', NULL),
(202, 16, 'Ayagama', '2019-07-16 05:22:53', NULL),
(203, 16, 'Balangoda', '2019-07-16 05:23:00', NULL),
(204, 16, 'Eheliyagoda', '2019-07-16 05:23:08', NULL),
(205, 16, 'Elapattha', '2019-07-16 05:23:15', NULL),
(206, 16, 'Embilipitiya', '2019-07-16 05:23:25', NULL),
(207, 16, 'Godakawela', '2019-07-16 05:23:33', NULL),
(208, 16, 'Imbulpe', '2019-07-16 05:23:40', NULL),
(209, 16, 'Kahawatta', '2019-07-16 05:23:46', NULL),
(210, 16, 'Kalawana', '2019-07-16 05:23:53', NULL),
(211, 16, 'Kiriella', '2019-07-16 05:24:01', NULL),
(212, 16, 'Kolonna', '2019-07-16 05:24:08', NULL),
(213, 16, 'Kuruvita', '2019-07-16 05:24:15', NULL),
(214, 16, 'Nivithigala', '2019-07-16 05:24:24', NULL),
(215, 16, 'Opanayaka', '2019-07-16 05:24:31', NULL),
(216, 16, 'Pelmadulla', '2019-07-16 05:24:38', NULL),
(217, 16, 'Ratnapura', '2019-07-16 05:24:44', NULL),
(218, 16, 'Weligepola', '2019-07-16 05:24:51', NULL),
(219, 12, 'Akmeemana', '2019-07-16 05:25:31', NULL),
(220, 12, 'Ambalangoda', '2019-07-16 05:25:42', NULL),
(221, 12, 'Baddegama', '2019-07-16 05:25:47', NULL),
(222, 12, 'Balapitiya', '2019-07-16 05:25:54', NULL),
(223, 12, 'Benthota', '2019-07-16 05:26:00', NULL),
(224, 12, 'Bope-Poddala', '2019-07-16 05:26:07', NULL),
(225, 12, 'Elpitiya', '2019-07-16 05:26:16', NULL),
(226, 12, 'Galle', '2019-07-16 05:26:22', NULL),
(227, 12, 'Gonapinuwala', '2019-07-16 05:26:27', NULL),
(228, 12, 'Habaraduwa', '2019-07-16 05:26:34', NULL),
(229, 12, 'Hikkaduwa', '2019-07-16 05:26:44', NULL),
(230, 12, 'Imaduwa', '2019-07-16 05:26:54', NULL),
(231, 12, 'Karandeniya', '2019-07-16 05:27:00', NULL),
(232, 12, 'Nagoda', '2019-07-16 05:27:07', NULL),
(233, 12, 'Neluwa', '2019-07-16 05:27:13', NULL),
(234, 12, 'Niyagama', '2019-07-16 05:27:19', NULL),
(235, 12, 'Thawalama', '2019-07-16 05:27:24', NULL),
(236, 12, 'Welivitiya-Divithura', '2019-07-16 05:27:32', NULL),
(237, 12, 'Yakkalamulla', '2019-07-16 05:27:38', NULL),
(238, 13, 'Ambalantota', '2019-07-16 05:27:48', NULL),
(239, 13, 'Angunakolapelessa', '2019-07-16 05:27:54', NULL),
(240, 13, 'Beliatta', '2019-07-16 05:28:00', NULL),
(241, 13, 'Hambantota', '2019-07-16 05:28:06', NULL),
(242, 13, 'Katuwana', '2019-07-16 05:28:13', NULL),
(243, 13, 'Lunugamvehera', '2019-07-16 05:28:19', NULL),
(244, 13, 'Okewela', '2019-07-16 05:28:27', NULL),
(245, 13, 'Sooriyawewa', '2019-07-16 05:28:32', NULL),
(246, 13, 'Tangalle', '2019-07-16 05:28:39', NULL),
(247, 13, 'Thissamaharama', '2019-07-16 05:28:45', NULL),
(248, 13, 'Walasmulla', '2019-07-16 05:28:50', NULL),
(249, 13, 'Weeraketiya', '2019-07-16 05:28:57', NULL),
(250, 14, 'Akuressa', '2019-07-16 05:29:10', NULL),
(251, 14, 'Athuraliya', '2019-07-16 05:29:17', NULL),
(252, 14, 'Devinuwara', '2019-07-16 05:29:26', NULL),
(253, 14, 'Dickwella', '2019-07-16 05:29:33', NULL),
(254, 14, 'Hakmana', '2019-07-16 05:29:40', NULL),
(255, 14, 'Kamburupitiya', '2019-07-16 05:29:48', NULL),
(256, 14, 'Kirinda Puhulwella', '2019-07-16 05:29:54', NULL),
(257, 14, 'Kotapola', '2019-07-16 05:30:01', NULL),
(258, 14, 'Malimbada', '2019-07-16 05:30:08', NULL),
(259, 14, 'Matara', '2019-07-16 05:30:14', NULL),
(260, 14, 'Pasgoda', '2019-07-16 05:30:34', NULL),
(261, 14, 'Pitabeddara', '2019-07-16 05:30:41', NULL),
(262, 14, 'Thihagoda', '2019-07-16 05:30:48', NULL),
(263, 14, 'Weligama', '2019-07-16 05:30:54', NULL),
(264, 14, 'Welipitiya', '2019-07-16 05:31:01', NULL),
(265, 7, 'Badulla', '2019-07-16 05:31:59', NULL),
(266, 7, 'Bandarawela', '2019-07-16 05:32:05', NULL),
(267, 7, 'Ella', '2019-07-16 05:32:11', NULL),
(268, 7, 'Haldummulla', '2019-07-16 05:32:18', NULL),
(269, 7, 'Hali-Ela', '2019-07-16 05:32:24', NULL),
(270, 7, 'Haputale', '2019-07-16 05:32:45', NULL),
(271, 7, 'Kandaketiya', '2019-07-16 05:32:55', NULL),
(272, 7, 'Lunugala', '2019-07-16 05:33:03', NULL),
(273, 7, 'Mahiyanganaya', '2019-07-16 05:33:09', NULL),
(274, 7, 'Meegahakivula', '2019-07-16 05:33:16', NULL),
(275, 7, 'Passara', '2019-07-16 05:33:22', NULL),
(276, 7, 'Rideemaliyadda', '2019-07-16 05:33:28', NULL),
(277, 7, 'Soranathota', '2019-07-16 05:33:34', NULL),
(278, 7, 'Uva-Paranagama', '2019-07-16 05:33:40', NULL),
(279, 7, 'Welimada', '2019-07-16 05:33:47', NULL),
(280, 8, 'Badalkumbura', '2019-07-16 05:34:48', NULL),
(281, 8, 'Bibile', '2019-07-16 05:34:55', NULL),
(282, 8, 'Buttala', '2019-07-16 05:35:01', NULL),
(283, 8, 'Katharagama', '2019-07-16 05:35:08', NULL),
(284, 8, 'Madulla', '2019-07-16 05:35:13', NULL),
(285, 8, 'Medagama', '2019-07-16 05:35:19', NULL),
(286, 8, 'Moneragala', '2019-07-16 05:35:25', NULL),
(287, 8, 'Sevanagala', '2019-07-16 05:35:32', NULL),
(288, 8, 'Siyambalanduwa', '2019-07-16 05:35:38', NULL),
(289, 8, 'Thanamalvila', '2019-07-16 05:35:46', NULL),
(290, 8, 'Wellawaya', '2019-07-16 05:35:52', NULL),
(291, 9, 'Colombo', '2019-07-16 05:36:20', NULL),
(292, 9, 'Dehiwala', '2019-07-16 05:36:30', NULL),
(293, 9, 'Homagama', '2019-07-16 05:36:42', NULL),
(294, 9, 'Kaduwela', '2019-07-16 05:36:53', NULL),
(295, 9, 'Kesbewa', '2019-07-16 05:37:01', NULL),
(296, 9, 'Kolonnawa', '2019-07-16 05:37:08', NULL),
(297, 9, 'Kotte', '2019-07-16 05:37:15', NULL),
(298, 9, 'Maharagama', '2019-07-16 05:37:22', NULL),
(299, 9, 'MoratuwaÂ ', '2019-07-16 05:37:29', NULL),
(300, 9, 'Padukka', '2019-07-16 05:37:37', NULL),
(301, 9, 'Ratmalana', '2019-07-16 05:37:45', NULL),
(302, 9, 'Seethawaka', '2019-07-16 05:38:19', NULL),
(303, 9, 'Thimbirigasyaya', '2019-07-16 05:38:30', NULL),
(304, 10, 'Attanagalla', '2019-07-16 05:38:47', NULL),
(305, 10, 'Biyagama', '2019-07-16 05:38:55', NULL),
(306, 10, 'Divulapitiya', '2019-07-16 05:39:02', NULL),
(307, 10, 'Dompe', '2019-07-16 05:39:10', NULL),
(308, 10, 'Gampaha', '2019-07-16 05:39:16', NULL),
(309, 10, 'Ja-Ela', '2019-07-16 05:39:24', NULL),
(310, 10, 'Katana', '2019-07-16 05:39:33', NULL),
(311, 10, 'Kelaniya', '2019-07-16 05:39:39', NULL),
(312, 10, 'Mahara', '2019-07-16 05:39:50', NULL),
(313, 10, 'Minuwangoda', '2019-07-16 05:39:58', NULL),
(314, 10, 'Mirigama', '2019-07-16 05:40:05', NULL),
(315, 10, 'Negombo', '2019-07-16 05:40:12', NULL),
(316, 10, 'Wattala', '2019-07-16 05:40:19', NULL),
(317, 11, 'Agalawatta', '2019-07-16 05:40:30', NULL),
(318, 11, 'Bandaragama', '2019-07-16 05:40:38', NULL),
(319, 11, 'Beruwala', '2019-07-16 05:40:45', NULL),
(320, 11, 'Bulathsinhala', '2019-07-16 05:40:51', NULL),
(321, 11, 'Dodangoda', '2019-07-16 05:41:01', NULL),
(322, 11, 'Horana', '2019-07-16 05:41:07', NULL),
(323, 11, 'Ingiriya', '2019-07-16 05:41:14', NULL),
(324, 11, 'Kalutara', '2019-07-16 05:41:22', NULL),
(325, 11, 'Madurawela', '2019-07-16 05:41:29', NULL),
(326, 11, 'Mathugama', '2019-07-16 05:41:38', NULL),
(327, 11, 'Millaniya', '2019-07-16 05:41:44', NULL),
(328, 11, 'Palindanuwara', '2019-07-16 05:41:50', NULL),
(329, 11, 'Panadura', '2019-07-16 05:41:57', NULL),
(330, 11, 'Walallavita', '2019-07-16 05:42:03', NULL),
(331, 16, 'Galagama', '2019-10-18 05:24:10', NULL),
(332, 16, 'Karavita', '2019-10-18 05:26:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaintremark`
--

CREATE TABLE `complaintremark` (
  `id` int(11) NOT NULL,
  `complaintNumber` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaintremark`
--

INSERT INTO `complaintremark` (`id`, `complaintNumber`, `status`, `remark`, `remarkDate`) VALUES
(1, 2, 'in process', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\r\n', '2019-10-18 05:37:14'),
(2, 2, 'in process', 'Inprocess Test', '2019-10-18 05:52:56'),
(3, 3, 'in process', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '2019-10-18 06:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `complaintstype`
--

CREATE TABLE `complaintstype` (
  `id` int(11) NOT NULL,
  `complaintType` varchar(255) NOT NULL,
  `complaintTypeDescription` longtext NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaintstype`
--

INSERT INTO `complaintstype` (`id`, `complaintType`, `complaintTypeDescription`, `creationDate`, `updationDate`) VALUES
(1, 'Delayed Service', '', '2019-10-16 05:41:30', '26-10-2019 10:54:04 AM'),
(2, 'Break Down', '', '2019-10-26 05:23:46', NULL),
(3, 'Pollution', '', '2019-10-26 05:25:46', '01-11-2019 10:57:21 AM'),
(4, 'Development of services', '', '2019-11-01 05:06:13', NULL),
(5, ' Increasing the productivity', '', '2019-11-01 05:15:47', NULL),
(6, ' Social services', '', '2019-11-01 05:38:37', NULL),
(7, 'On bribery and corruption', '', '2019-11-01 05:45:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emailsetting`
--

CREATE TABLE `emailsetting` (
  `id` int(11) NOT NULL,
  `senderName` varchar(100) NOT NULL,
  `host` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `secureType` varchar(10) NOT NULL,
  `port` int(5) DEFAULT NULL,
  `replyEmail` varchar(255) NOT NULL,
  `replyName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emailsetting`
--

INSERT INTO `emailsetting` (`id`, `senderName`, `host`, `username`, `password`, `secureType`, `port`, `replyEmail`, `replyName`) VALUES
(1, 'CMS', 'smtp.gmail.com', 'test@gmail.com', '123', 'tls', 587, 'mail@example.com', 'Cms Reply');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `province` varchar(255) DEFAULT NULL,
  `cmpNo` int(11) NOT NULL,
  `feedbackValue` varchar(20) NOT NULL,
  `comment` tinytext NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `footerItemName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `detail_si` longtext CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `detail_ta` longtext CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `footerItemName`, `type`, `detail`, `detail_si`, `detail_ta`) VALUES
(1, 'Our Work', 'ourwork', '1', '2', '3'),
(2, 'Additional informations', 'information', '1																								', '2																								', '3																								');

-- --------------------------------------------------------

--
-- Table structure for table `footerlink`
--

CREATE TABLE `footerlink` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footerlink`
--

INSERT INTO `footerlink` (`id`, `name`, `link`) VALUES
(1, 'Google Play Store', 'https://play.google.com/store'),
(2, 'Facebook ', 'facebook.com'),
(3, 'Twitter', 'https://twitter.com'),
(4, 'Complaint Management System', ''),
(5, 'Powerd By Ayeshan', 'http://ayeshan.tk'),
(6, 'Apple App Store', 'https://www.apple.com/');

-- --------------------------------------------------------

--
-- Table structure for table `genaralsetting`
--

CREATE TABLE `genaralsetting` (
  `id` int(11) NOT NULL,
  `setting_name` varchar(250) NOT NULL,
  `setting_description` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genaralsetting`
--

INSERT INTO `genaralsetting` (`id`, `setting_name`, `setting_description`) VALUES
(1, 'title', 'CMS | Complaint Management System'),
(2, 'sitelink', 'localhost'),
(3, 'timezone', 'Asia/Colombo'),
(4, 'logo', '1bb87d41d15fe27b500a4bfcde01bb0e.png'),
(5, 'slider_banner_1', '19857790ca3407515c4a7914334d92ac.jpg'),
(6, 'slider_banner_2', '2fe70e9c19c47bb3e56491ae4f33b4fe.jpg'),
(7, 'homepagesettingbanner', '3f3141ed3b2293aaa6b66587343daa09.jpg'),
(8, 'currency', 'LKR'),
(9, 'description', 'cms is bal bala bala'),
(10, 'keywords', 'keyword1,keyword2'),
(11, 'favicon', '8af3a74ede48e250ceb935c026242483.ico'),
(12, 'extenstions_user_uploads', '\"jpg\", \"gif\", \"png\", \"txt\", \"xls\",\"pdf\"'),
(13, 'max_upload_size_for_user_kb', '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `googlerecapcha`
--

CREATE TABLE `googlerecapcha` (
  `id` int(11) NOT NULL,
  `secret_key` varchar(255) NOT NULL,
  `site_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `googlerecapcha`
--

INSERT INTO `googlerecapcha` (`id`, `secret_key`, `site_key`) VALUES
(1, 'secret_key', 'site_key');

-- --------------------------------------------------------

--
-- Table structure for table `maillist`
--

CREATE TABLE `maillist` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maillist`
--

INSERT INTO `maillist` (`id`, `subject`, `body`) VALUES
(1, 'sasa', 'sasasa'),
(2, 'asa', 'asa');

-- --------------------------------------------------------

--
-- Table structure for table `paymentsetting`
--

CREATE TABLE `paymentsetting` (
  `id` int(11) NOT NULL,
  `secret_key` varchar(255) NOT NULL,
  `site_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentsetting`
--

INSERT INTO `paymentsetting` (`id`, `secret_key`, `site_key`) VALUES
(1, 'fdfd', '12');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `provinceName` varchar(255) NOT NULL,
  `provinceDescription` tinytext NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `provinceName`, `provinceDescription`, `postingDate`, `updationDate`) VALUES
(1, 'Eastern Province', 'Province Discription', '2019-07-16 03:06:49', '25-10-2019 10:58:06 AM'),
(2, 'Central Province', 'aa', '2019-07-16 03:08:23', '13-08-2019 01:01:33 PM'),
(3, 'Northern Province', '', '2019-07-16 03:08:37', NULL),
(4, 'Southern Province', '', '2019-07-16 03:08:46', NULL),
(5, 'Western Province', '', '2019-07-16 03:08:55', NULL),
(6, 'North Western Province', '', '2019-07-16 03:09:03', NULL),
(7, 'North Central Province ', '', '2019-07-16 03:09:09', NULL),
(8, 'Uva Province', '', '2019-07-16 03:09:20', NULL),
(9, 'Sabaragamuwa Province', '', '2019-07-16 03:09:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `header_en` varchar(100) NOT NULL,
  `header_si` varchar(100) CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `header_ta` varchar(100) CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `description_en` longtext NOT NULL,
  `description_si` longtext CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `description_ta` longtext CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `header_en`, `header_si`, `header_ta`, `description_en`, `description_si`, `description_ta`, `link`) VALUES
(1, 'Lines & Call', 'à¶´à¶´à·”à·€', 'à®®à®¾à®°à¯à®ªà¯', '														We can offer you great low cost calls with a care level to suit your busines', 'à¶´à¶´à·”à·€														\r\n													', 'à®®à®¾à®°à¯à®ªà¯														\r\n													', '1'),
(2, 'Phone Systems', '', '', 'Offering both hosted and traditional, we know we have the system for you', '', '', '2'),
(3, 'Broadband', '', '', 'Offering both hosted and traditional, we know we have the system for you', '', '', '3'),
(4, 'Mobile & Tablet', '', '', 'We work with all the major networks to make sure you get a solution tailored you', '', '', '4'),
(5, 'More Services', '', '', 'Click here to find out about more services we provide at effective price range', '', '', '5');

-- --------------------------------------------------------

--
-- Table structure for table `settinghome`
--

CREATE TABLE `settinghome` (
  `id` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settinghome`
--

INSERT INTO `settinghome` (`id`, `section_name`, `status`) VALUES
(1, 'stackbar', 1),
(2, 'card', 0),
(3, 'service', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sitemaintenance`
--

CREATE TABLE `sitemaintenance` (
  `id` int(11) NOT NULL,
  `ToDateTIme` varchar(100) NOT NULL,
  `title` varchar(500) NOT NULL,
  `qutoes` varchar(1000) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitemaintenance`
--

INSERT INTO `sitemaintenance` (`id`, `ToDateTIme`, `title`, `qutoes`, `status`) VALUES
(1, '2019-11-08T02:02', 'SITE UNDER MAINTENANCE', 'Sorry for the inconvenience.To improve our services, we have momentarily shutdown our site.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sliderbanner`
--

CREATE TABLE `sliderbanner` (
  `id` int(11) NOT NULL,
  `header` varchar(255) NOT NULL,
  `firstline` varchar(255) NOT NULL,
  `secondline` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `buttonname` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `startdate` date DEFAULT NULL,
  `nodays` varchar(10) DEFAULT NULL,
  `expire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliderbanner`
--

INSERT INTO `sliderbanner` (`id`, `header`, `firstline`, `secondline`, `link`, `buttonname`, `status`, `startdate`, `nodays`, `expire`) VALUES
(1, 'Telecom and IT support provider for small business', 'Our services are fully managed and we', 'view ourselves as IT department of our company', 'index.php', 'Request a quote', '1', '2019-10-23', '5', '2019-10-28'),
(2, 'Telecom and IT support provider for small business', 'Our services are fully managed and we', 'view ourselves as IT department of our company', 'http://google.com', 'Request a 2', '0', '0000-00-00', '3', '2019-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `stateName` varchar(255) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `pid`, `stateName`, `postingDate`, `updationDate`) VALUES
(1, 1, 'Ampara', '2019-07-16 03:10:08', '13-08-2019 08:15:11 PM'),
(2, 1, 'Batticaloa', '2019-07-16 03:10:31', NULL),
(3, 1, 'Trincomalee', '2019-07-16 03:10:37', NULL),
(4, 2, 'Kandy', '2019-07-16 03:11:00', NULL),
(5, 2, 'Matale', '2019-07-16 03:11:04', NULL),
(6, 2, 'Nuwara Eliya', '2019-07-16 03:11:08', NULL),
(7, 8, 'Badulla', '2019-07-16 03:11:22', NULL),
(8, 8, 'Monaragala', '2019-07-16 03:11:27', NULL),
(9, 5, 'Colombo', '2019-07-16 03:12:16', NULL),
(10, 5, 'Gampaha', '2019-07-16 03:12:21', NULL),
(11, 5, 'Kalutara', '2019-07-16 03:12:30', NULL),
(12, 4, 'Galle', '2019-07-16 03:12:44', NULL),
(13, 4, 'Hambantota', '2019-07-16 03:12:48', NULL),
(14, 4, 'Matara', '2019-07-16 03:12:54', NULL),
(15, 9, 'Kegalle', '2019-07-16 03:13:11', '14-08-2019 04:14:02 PM'),
(16, 9, 'Ratnapura', '2019-07-16 03:13:16', NULL),
(17, 3, 'Jaffna', '2019-07-16 03:13:37', NULL),
(18, 3, 'Kilinochchi', '2019-07-16 03:13:42', NULL),
(19, 3, 'Mannar', '2019-07-16 03:14:15', NULL),
(20, 3, 'Mullaitivu', '2019-07-16 03:14:26', NULL),
(21, 3, 'Vavuniya', '2019-07-16 03:14:33', NULL),
(22, 6, 'Kurunegala', '2019-07-16 03:14:57', NULL),
(23, 6, 'Puttalam', '2019-07-16 03:15:08', NULL),
(24, 7, 'Anuradhapura', '2019-07-16 03:15:19', NULL),
(25, 7, 'Polonnaruwa', '2019-07-16 03:15:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(1, 1, 'Deforestation', '2019-10-16 05:41:14', '26-10-2019 09:46:11 AM'),
(3, 1, 'Mangrove degradation', '2019-10-26 04:09:19', NULL),
(4, 1, 'Coral reef destruction', '2019-10-26 04:09:27', NULL),
(5, 1, 'Soil degradation', '2019-10-26 04:09:35', NULL),
(6, 1, 'Air pollution', '2019-10-26 04:09:42', NULL),
(7, 1, 'Water pollution', '2019-10-26 04:09:50', NULL),
(8, 1, 'Waste management', '2019-10-26 04:09:56', NULL),
(9, 2, 'Roads and bridges', '2019-10-26 04:17:14', NULL),
(10, 2, 'Ports and aviation', '2019-10-26 04:17:26', NULL),
(11, 2, 'Railway', '2019-10-26 04:17:58', NULL),
(12, 2, 'Traffic congestion', '2019-10-26 04:18:57', NULL),
(13, 5, 'Tea plantations', '2019-10-26 04:22:09', NULL),
(14, 5, 'Fruits and vegetables', '2019-10-26 04:22:28', NULL),
(15, 5, 'Oilseed crops', '2019-10-26 04:22:42', NULL),
(16, 5, 'Rice cultivation', '2019-10-26 04:23:27', NULL),
(17, 3, 'Supply fail', '2019-10-26 04:25:33', NULL),
(18, 3, 'Broken Service Wire', '2019-10-26 04:25:54', NULL),
(19, 3, 'High Voltage', '2019-10-26 04:26:16', NULL),
(20, 3, 'Meter Burning', '2019-10-26 04:26:50', NULL),
(21, 3, 'Tree has fallen on to the line', '2019-10-26 04:27:27', NULL),
(22, 5, 'Other', '2019-11-01 04:55:46', NULL),
(23, 1, 'Other', '2019-11-01 04:55:57', NULL),
(24, 3, 'Other', '2019-11-01 04:56:18', NULL),
(25, 2, 'Other', '2019-11-01 04:56:22', NULL),
(26, 9, 'Toilet Problem', '2019-11-01 05:01:31', NULL),
(27, 6, 'Water Source Problem', '2019-11-01 05:04:21', NULL),
(28, 8, 'Maternal and child health', '2019-11-01 05:06:36', NULL),
(29, 8, 'Infectious diseases', '2019-11-01 05:07:16', '01-11-2019 10:38:18 AM'),
(30, 8, 'Non-communicable diseases', '2019-11-01 05:07:31', NULL),
(31, 8, 'Other', '2019-11-01 05:08:25', NULL),
(32, 4, 'Water availability Problem', '2019-11-01 05:14:27', NULL),
(33, 4, 'Water distribution  Problems', '2019-11-01 05:14:53', NULL),
(34, 4, 'Reparation of Canals', '2019-11-01 05:21:41', NULL),
(35, 7, 'School Teachers Problem', '2019-11-01 05:24:14', NULL),
(36, 7, 'School Principals Problem', '2019-11-01 05:25:16', '01-11-2019 10:58:33 AM'),
(37, 7, 'Infrastructure problems', '2019-11-01 05:26:01', NULL),
(38, 7, 'Pre - school Teachers problems', '2019-11-01 05:27:08', '01-11-2019 10:58:54 AM'),
(39, 7, 'Pre - school infrastructure problems', '2019-11-01 05:29:24', NULL),
(40, 7, 'On bribery and corruption', '2019-11-01 05:32:51', NULL),
(41, 10, 'Tax issues', '2019-11-01 05:35:02', NULL),
(42, 4, 'Other', '2019-11-01 05:42:57', NULL),
(43, 6, 'Other', '2019-11-01 05:43:03', NULL),
(44, 7, 'Other', '2019-11-01 05:43:08', NULL),
(45, 9, 'Other', '2019-11-01 05:43:31', NULL),
(46, 10, 'Other', '2019-11-01 05:43:45', NULL),
(47, 11, 'Other', '2019-11-01 05:43:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `complaintNumber` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `complaintType` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `gramaDivision` varchar(255) NOT NULL,
  `noc` varchar(255) NOT NULL,
  `complaintDetails` mediumtext NOT NULL,
  `complaintFile` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT NULL,
  `lastUpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `location` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `detail_si` longtext CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `detail_ta` longtext CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`, `detail_si`, `detail_ta`) VALUES
(1, 'Why Us', 'whyus', '												\r\n																									\r\n																									\r\n													<p class=\"MsoNormal\"><span style=\"font-family:&quot;Iskoola Pota&quot;,sans-serif;\r\nmso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:\r\nmajor-bidi\">Reading is easier, too, in the new Reading view. You can collapse\r\nparts of the document and focus on the text you want. If you need to stop\r\nreading before you reach the end, Word remembers where you left off - even on\r\nanother<o:p></o:p></span></p>																																	', '											\r\n																								\r\n																								\r\n													à¶©à¶©à·à¶©à·', '											\r\n																								\r\n													à®®à®¾à®°à¯'),
(2, 'About Us ', 'aboutus', '												\r\n																									\r\n																									\r\n																									\r\n																									\r\n																									\r\n													<p class=\"MsoNormal\"><span style=\"font-family:&quot;Iskoola Pota&quot;,sans-serif;\r\nmso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:\r\nmajor-bidi\">Video<o:p></o:p></span></p>																																																																		', '											\r\n																								\r\n													à¶´à¶´à·”à·€											\r\n																								\r\n																																																									', 'à®®à®¾à®°à¯à®ªà¯											\r\n																								'),
(3, 'Terms and Conditions', 'terms', 'wew', 'ewe', 'ew'),
(4, 'FAQs', 'faqs', '', '', ''),
(5, 'Our Mission', 'mission', '', '', ''),
(6, 'Our Vision', 'vision', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE `timezones` (
  `CountryCode` char(2) NOT NULL,
  `Coordinates` char(15) NOT NULL,
  `TimeZone` char(32) NOT NULL,
  `Comments` varchar(85) NOT NULL,
  `UTC offset` char(8) NOT NULL,
  `UTC DST offset` char(8) NOT NULL,
  `Notes` varchar(79) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timezones`
--

INSERT INTO `timezones` (`CountryCode`, `Coordinates`, `TimeZone`, `Comments`, `UTC offset`, `UTC DST offset`, `Notes`) VALUES
('CI', '+0519-00402', 'Africa/Abidjan', '', '+00:00', '+00:00', ''),
('GH', '+0533-00013', 'Africa/Accra', '', '+00:00', '+00:00', ''),
('ET', '+0902+03842', 'Africa/Addis_Ababa', '', '+03:00', '+03:00', ''),
('DZ', '+3647+00303', 'Africa/Algiers', '', '+01:00', '+01:00', ''),
('ER', '+1520+03853', 'Africa/Asmara', '', '+03:00', '+03:00', ''),
('', '', 'Africa/Asmera', '', '+03:00', '+03:00', 'Link to Africa/Asmara'),
('ML', '+1239-00800', 'Africa/Bamako', '', '+00:00', '+00:00', ''),
('CF', '+0422+01835', 'Africa/Bangui', '', '+01:00', '+01:00', ''),
('GM', '+1328-01639', 'Africa/Banjul', '', '+00:00', '+00:00', ''),
('GW', '+1151-01535', 'Africa/Bissau', '', '+00:00', '+00:00', ''),
('MW', '-1547+03500', 'Africa/Blantyre', '', '+02:00', '+02:00', ''),
('CG', '-0416+01517', 'Africa/Brazzaville', '', '+01:00', '+01:00', ''),
('BI', '-0323+02922', 'Africa/Bujumbura', '', '+02:00', '+02:00', ''),
('EG', '+3003+03115', 'Africa/Cairo', '', '+02:00', '+02:00', 'DST has been canceled since 2011'),
('MA', '+3339-00735', 'Africa/Casablanca', '', '+00:00', '+01:00', ''),
('ES', '+3553-00519', 'Africa/Ceuta', 'Ceuta & Melilla', '+01:00', '+02:00', ''),
('GN', '+0931-01343', 'Africa/Conakry', '', '+00:00', '+00:00', ''),
('SN', '+1440-01726', 'Africa/Dakar', '', '+00:00', '+00:00', ''),
('TZ', '-0648+03917', 'Africa/Dar_es_Salaam', '', '+03:00', '+03:00', ''),
('DJ', '+1136+04309', 'Africa/Djibouti', '', '+03:00', '+03:00', ''),
('CM', '+0403+00942', 'Africa/Douala', '', '+01:00', '+01:00', ''),
('EH', '+2709-01312', 'Africa/El_Aaiun', '', '+00:00', '+00:00', ''),
('SL', '+0830-01315', 'Africa/Freetown', '', '+00:00', '+00:00', ''),
('BW', '-2439+02555', 'Africa/Gaborone', '', '+02:00', '+02:00', ''),
('ZW', '-1750+03103', 'Africa/Harare', '', '+02:00', '+02:00', ''),
('ZA', '-2615+02800', 'Africa/Johannesburg', '', '+02:00', '+02:00', ''),
('SS', '+0451+03136', 'Africa/Juba', '', '+03:00', '+03:00', ''),
('UG', '+0019+03225', 'Africa/Kampala', '', '+03:00', '+03:00', ''),
('SD', '+1536+03232', 'Africa/Khartoum', '', '+03:00', '+03:00', ''),
('RW', '-0157+03004', 'Africa/Kigali', '', '+02:00', '+02:00', ''),
('CD', '-0418+01518', 'Africa/Kinshasa', 'west Dem. Rep. of Congo', '+01:00', '+01:00', ''),
('NG', '+0627+00324', 'Africa/Lagos', '', '+01:00', '+01:00', ''),
('GA', '+0023+00927', 'Africa/Libreville', '', '+01:00', '+01:00', ''),
('TG', '+0608+00113', 'Africa/Lome', '', '+00:00', '+00:00', ''),
('AO', '-0848+01314', 'Africa/Luanda', '', '+01:00', '+01:00', ''),
('CD', '-1140+02728', 'Africa/Lubumbashi', 'east Dem. Rep. of Congo', '+02:00', '+02:00', ''),
('ZM', '-1525+02817', 'Africa/Lusaka', '', '+02:00', '+02:00', ''),
('GQ', '+0345+00847', 'Africa/Malabo', '', '+01:00', '+01:00', ''),
('MZ', '-2558+03235', 'Africa/Maputo', '', '+02:00', '+02:00', ''),
('LS', '-2928+02730', 'Africa/Maseru', '', '+02:00', '+02:00', ''),
('SZ', '-2618+03106', 'Africa/Mbabane', '', '+02:00', '+02:00', ''),
('SO', '+0204+04522', 'Africa/Mogadishu', '', '+03:00', '+03:00', ''),
('LR', '+0618-01047', 'Africa/Monrovia', '', '+00:00', '+00:00', ''),
('KE', '-0117+03649', 'Africa/Nairobi', '', '+03:00', '+03:00', ''),
('TD', '+1207+01503', 'Africa/Ndjamena', '', '+01:00', '+01:00', ''),
('NE', '+1331+00207', 'Africa/Niamey', '', '+01:00', '+01:00', ''),
('MR', '+1806-01557', 'Africa/Nouakchott', '', '+00:00', '+00:00', ''),
('BF', '+1222-00131', 'Africa/Ouagadougou', '', '+00:00', '+00:00', ''),
('BJ', '+0629+00237', 'Africa/Porto-Novo', '', '+01:00', '+01:00', ''),
('ST', '+0020+00644', 'Africa/Sao_Tome', '', '+00:00', '+00:00', ''),
('', '', 'Africa/Timbuktu', '', '+00:00', '+00:00', 'Link to Africa/Bamako'),
('LY', '+3254+01311', 'Africa/Tripoli', '', '+01:00', '+02:00', ''),
('TN', '+3648+01011', 'Africa/Tunis', '', '+01:00', '+01:00', ''),
('NA', '-2234+01706', 'Africa/Windhoek', '', '+01:00', '+02:00', ''),
('', '', 'AKST9AKDT', '', 'âˆ’09:00', 'âˆ’08:00', 'Link to America/Anchorage'),
('US', '+515248-1763929', 'America/Adak', 'Aleutian Islands', 'âˆ’10:00', 'âˆ’09:00', ''),
('US', '+611305-1495401', 'America/Anchorage', 'Alaska Time', 'âˆ’09:00', 'âˆ’08:00', ''),
('AI', '+1812-06304', 'America/Anguilla', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('AG', '+1703-06148', 'America/Antigua', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('BR', '-0712-04812', 'America/Araguaina', 'Tocantins', 'âˆ’03:00', 'âˆ’03:00', ''),
('AR', '-3436-05827', 'America/Argentina/Buenos_Aires', 'Buenos Aires (BA, CF)', 'âˆ’03:00', 'âˆ’03:00', ''),
('AR', '-2828-06547', 'America/Argentina/Catamarca', 'Catamarca (CT), Chubut (CH)', 'âˆ’03:00', 'âˆ’03:00', ''),
('', '', 'America/Argentina/ComodRivadavia', '', 'âˆ’03:00', 'âˆ’03:00', 'Link to America/Argentina/Catamarca'),
('AR', '-3124-06411', 'America/Argentina/Cordoba', 'most locations (CB, CC, CN, ER, FM, MN, SE, SF)', 'âˆ’03:00', 'âˆ’03:00', ''),
('AR', '-2411-06518', 'America/Argentina/Jujuy', 'Jujuy (JY)', 'âˆ’03:00', 'âˆ’03:00', ''),
('AR', '-2926-06651', 'America/Argentina/La_Rioja', 'La Rioja (LR)', 'âˆ’03:00', 'âˆ’03:00', ''),
('AR', '-3253-06849', 'America/Argentina/Mendoza', 'Mendoza (MZ)', 'âˆ’03:00', 'âˆ’03:00', ''),
('AR', '-5138-06913', 'America/Argentina/Rio_Gallegos', 'Santa Cruz (SC)', 'âˆ’03:00', 'âˆ’03:00', ''),
('AR', '-2447-06525', 'America/Argentina/Salta', '(SA, LP, NQ, RN)', 'âˆ’03:00', 'âˆ’03:00', ''),
('AR', '-3132-06831', 'America/Argentina/San_Juan', 'San Juan (SJ)', 'âˆ’03:00', 'âˆ’03:00', ''),
('AR', '-3319-06621', 'America/Argentina/San_Luis', 'San Luis (SL)', 'âˆ’03:00', 'âˆ’03:00', ''),
('AR', '-2649-06513', 'America/Argentina/Tucuman', 'Tucuman (TM)', 'âˆ’03:00', 'âˆ’03:00', ''),
('AR', '-5448-06818', 'America/Argentina/Ushuaia', 'Tierra del Fuego (TF)', 'âˆ’03:00', 'âˆ’03:00', ''),
('AW', '+1230-06958', 'America/Aruba', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('PY', '-2516-05740', 'America/Asuncion', '', 'âˆ’04:00', 'âˆ’03:00', ''),
('CA', '+484531-0913718', 'America/Atikokan', 'Eastern Standard Time - Atikokan, Ontario and Southampton I, Nunavut', 'âˆ’05:00', 'âˆ’05:00', ''),
('', '', 'America/Atka', '', 'âˆ’10:00', 'âˆ’09:00', 'Link to America/Adak'),
('BR', '-1259-03831', 'America/Bahia', 'Bahia', 'âˆ’03:00', 'âˆ’03:00', ''),
('MX', '+2048-10515', 'America/Bahia_Banderas', 'Mexican Central Time - Bahia de Banderas', 'âˆ’06:00', 'âˆ’05:00', ''),
('BB', '+1306-05937', 'America/Barbados', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('BR', '-0127-04829', 'America/Belem', 'Amapa, E Para', 'âˆ’03:00', 'âˆ’03:00', ''),
('BZ', '+1730-08812', 'America/Belize', '', 'âˆ’06:00', 'âˆ’06:00', ''),
('CA', '+5125-05707', 'America/Blanc-Sablon', 'Atlantic Standard Time - Quebec - Lower North Shore', 'âˆ’04:00', 'âˆ’04:00', ''),
('BR', '+0249-06040', 'America/Boa_Vista', 'Roraima', 'âˆ’04:00', 'âˆ’04:00', ''),
('CO', '+0436-07405', 'America/Bogota', '', 'âˆ’05:00', 'âˆ’05:00', ''),
('US', '+433649-1161209', 'America/Boise', 'Mountain Time - south Idaho & east Oregon', 'âˆ’07:00', 'âˆ’06:00', ''),
('', '', 'America/Buenos_Aires', '', 'âˆ’03:00', 'âˆ’03:00', 'Link to America/Argentina/Buenos_Aires'),
('CA', '+690650-1050310', 'America/Cambridge_Bay', 'Mountain Time - west Nunavut', 'âˆ’07:00', 'âˆ’06:00', ''),
('BR', '-2027-05437', 'America/Campo_Grande', 'Mato Grosso do Sul', 'âˆ’04:00', 'âˆ’03:00', ''),
('MX', '+2105-08646', 'America/Cancun', 'Central Time - Quintana Roo', 'âˆ’06:00', 'âˆ’05:00', ''),
('VE', '+1030-06656', 'America/Caracas', '', 'âˆ’04:30', 'âˆ’04:30', ''),
('', '', 'America/Catamarca', '', 'âˆ’03:00', 'âˆ’03:00', 'Link to America/Argentina/Catamarca'),
('GF', '+0456-05220', 'America/Cayenne', '', 'âˆ’03:00', 'âˆ’03:00', ''),
('KY', '+1918-08123', 'America/Cayman', '', 'âˆ’05:00', 'âˆ’05:00', ''),
('US', '+415100-0873900', 'America/Chicago', 'Central Time', 'âˆ’06:00', 'âˆ’05:00', ''),
('MX', '+2838-10605', 'America/Chihuahua', 'Mexican Mountain Time - Chihuahua away from US border', 'âˆ’07:00', 'âˆ’06:00', ''),
('', '', 'America/Coral_Harbour', '', 'âˆ’05:00', 'âˆ’05:00', 'Link to America/Atikokan'),
('', '', 'America/Cordoba', '', 'âˆ’03:00', 'âˆ’03:00', 'Link to America/Argentina/Cordoba'),
('CR', '+0956-08405', 'America/Costa_Rica', '', 'âˆ’06:00', 'âˆ’06:00', ''),
('CA', '+4906-11631', 'America/Creston', 'Mountain Standard Time - Creston, British Columbia', 'âˆ’07:00', 'âˆ’07:00', ''),
('BR', '-1535-05605', 'America/Cuiaba', 'Mato Grosso', 'âˆ’04:00', 'âˆ’03:00', ''),
('CW', '+1211-06900', 'America/Curacao', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('GL', '+7646-01840', 'America/Danmarkshavn', 'east coast, north of Scoresbysund', '+00:00', '+00:00', ''),
('CA', '+6404-13925', 'America/Dawson', 'Pacific Time - north Yukon', 'âˆ’08:00', 'âˆ’07:00', ''),
('CA', '+5946-12014', 'America/Dawson_Creek', 'Mountain Standard Time - Dawson Creek & Fort Saint John, British Columbia', 'âˆ’07:00', 'âˆ’07:00', ''),
('US', '+394421-1045903', 'America/Denver', 'Mountain Time', 'âˆ’07:00', 'âˆ’06:00', ''),
('US', '+421953-0830245', 'America/Detroit', 'Eastern Time - Michigan - most locations', 'âˆ’05:00', 'âˆ’04:00', ''),
('DM', '+1518-06124', 'America/Dominica', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('CA', '+5333-11328', 'America/Edmonton', 'Mountain Time - Alberta, east British Columbia & west Saskatchewan', 'âˆ’07:00', 'âˆ’06:00', ''),
('BR', '-0640-06952', 'America/Eirunepe', 'W Amazonas', 'âˆ’04:00', 'âˆ’04:00', ''),
('SV', '+1342-08912', 'America/El_Salvador', '', 'âˆ’06:00', 'âˆ’06:00', ''),
('', '', 'America/Ensenada', '', 'âˆ’08:00', 'âˆ’07:00', 'Link to America/Tijuana'),
('BR', '-0343-03830', 'America/Fortaleza', 'NE Brazil (MA, PI, CE, RN, PB)', 'âˆ’03:00', 'âˆ’03:00', ''),
('', '', 'America/Fort_Wayne', '', 'âˆ’05:00', 'âˆ’04:00', 'Link to America/Indiana/Indianapolis'),
('CA', '+4612-05957', 'America/Glace_Bay', 'Atlantic Time - Nova Scotia - places that did not observe DST 1966-1971', 'âˆ’04:00', 'âˆ’03:00', ''),
('GL', '+6411-05144', 'America/Godthab', 'most locations', 'âˆ’03:00', 'âˆ’02:00', ''),
('CA', '+5320-06025', 'America/Goose_Bay', 'Atlantic Time - Labrador - most locations', 'âˆ’04:00', 'âˆ’03:00', ''),
('TC', '+2128-07108', 'America/Grand_Turk', '', 'âˆ’05:00', 'âˆ’04:00', ''),
('GD', '+1203-06145', 'America/Grenada', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('GP', '+1614-06132', 'America/Guadeloupe', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('GT', '+1438-09031', 'America/Guatemala', '', 'âˆ’06:00', 'âˆ’06:00', ''),
('EC', '-0210-07950', 'America/Guayaquil', 'mainland', 'âˆ’05:00', 'âˆ’05:00', ''),
('GY', '+0648-05810', 'America/Guyana', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('CA', '+4439-06336', 'America/Halifax', 'Atlantic Time - Nova Scotia (most places), PEI', 'âˆ’04:00', 'âˆ’03:00', ''),
('CU', '+2308-08222', 'America/Havana', '', 'âˆ’05:00', 'âˆ’04:00', ''),
('MX', '+2904-11058', 'America/Hermosillo', 'Mountain Standard Time - Sonora', 'âˆ’07:00', 'âˆ’07:00', ''),
('US', '+394606-0860929', 'America/Indiana/Indianapolis', 'Eastern Time - Indiana - most locations', 'âˆ’05:00', 'âˆ’04:00', ''),
('US', '+411745-0863730', 'America/Indiana/Knox', 'Central Time - Indiana - Starke County', 'âˆ’06:00', 'âˆ’05:00', ''),
('US', '+382232-0862041', 'America/Indiana/Marengo', 'Eastern Time - Indiana - Crawford County', 'âˆ’05:00', 'âˆ’04:00', ''),
('US', '+382931-0871643', 'America/Indiana/Petersburg', 'Eastern Time - Indiana - Pike County', 'âˆ’05:00', 'âˆ’04:00', ''),
('US', '+375711-0864541', 'America/Indiana/Tell_City', 'Central Time - Indiana - Perry County', 'âˆ’06:00', 'âˆ’05:00', ''),
('US', '+384452-0850402', 'America/Indiana/Vevay', 'Eastern Time - Indiana - Switzerland County', 'âˆ’05:00', 'âˆ’04:00', ''),
('US', '+384038-0873143', 'America/Indiana/Vincennes', 'Eastern Time - Indiana - Daviess, Dubois, Knox & Martin Counties', 'âˆ’05:00', 'âˆ’04:00', ''),
('US', '+410305-0863611', 'America/Indiana/Winamac', 'Eastern Time - Indiana - Pulaski County', 'âˆ’05:00', 'âˆ’04:00', ''),
('', '', 'America/Indianapolis', '', 'âˆ’05:00', 'âˆ’04:00', 'Link to America/Indiana/Indianapolis'),
('CA', '+682059-1334300', 'America/Inuvik', 'Mountain Time - west Northwest Territories', 'âˆ’07:00', 'âˆ’06:00', ''),
('CA', '+6344-06828', 'America/Iqaluit', 'Eastern Time - east Nunavut - most locations', 'âˆ’05:00', 'âˆ’04:00', ''),
('JM', '+1800-07648', 'America/Jamaica', '', 'âˆ’05:00', 'âˆ’05:00', ''),
('', '', 'America/Jujuy', '', 'âˆ’03:00', 'âˆ’03:00', 'Link to America/Argentina/Jujuy'),
('US', '+581807-1342511', 'America/Juneau', 'Alaska Time - Alaska panhandle', 'âˆ’09:00', 'âˆ’08:00', ''),
('US', '+381515-0854534', 'America/Kentucky/Louisville', 'Eastern Time - Kentucky - Louisville area', 'âˆ’05:00', 'âˆ’04:00', ''),
('US', '+364947-0845057', 'America/Kentucky/Monticello', 'Eastern Time - Kentucky - Wayne County', 'âˆ’05:00', 'âˆ’04:00', ''),
('', '', 'America/Knox_IN', '', 'âˆ’06:00', 'âˆ’05:00', 'Link to America/Indiana/Knox'),
('BQ', '+120903-0681636', 'America/Kralendijk', '', 'âˆ’04:00', 'âˆ’04:00', 'Link to America/Curacao'),
('BO', '-1630-06809', 'America/La_Paz', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('PE', '-1203-07703', 'America/Lima', '', 'âˆ’05:00', 'âˆ’05:00', ''),
('US', '+340308-1181434', 'America/Los_Angeles', 'Pacific Time', 'âˆ’08:00', 'âˆ’07:00', ''),
('', '', 'America/Louisville', '', 'âˆ’05:00', 'âˆ’04:00', 'Link to America/Kentucky/Louisville'),
('SX', '+180305-0630250', 'America/Lower_Princes', '', 'âˆ’04:00', 'âˆ’04:00', 'Link to America/Curacao'),
('BR', '-0940-03543', 'America/Maceio', 'Alagoas, Sergipe', 'âˆ’03:00', 'âˆ’03:00', ''),
('NI', '+1209-08617', 'America/Managua', '', 'âˆ’06:00', 'âˆ’06:00', ''),
('BR', '-0308-06001', 'America/Manaus', 'E Amazonas', 'âˆ’04:00', 'âˆ’04:00', ''),
('MF', '+1804-06305', 'America/Marigot', '', 'âˆ’04:00', 'âˆ’04:00', 'Link to America/Guadeloupe'),
('MQ', '+1436-06105', 'America/Martinique', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('MX', '+2550-09730', 'America/Matamoros', 'US Central Time - Coahuila, Durango, Nuevo LeÃ³n, Tamaulipas near US border', 'âˆ’06:00', 'âˆ’05:00', ''),
('MX', '+2313-10625', 'America/Mazatlan', 'Mountain Time - S Baja, Nayarit, Sinaloa', 'âˆ’07:00', 'âˆ’06:00', ''),
('', '', 'America/Mendoza', '', 'âˆ’03:00', 'âˆ’03:00', 'Link to America/Argentina/Mendoza'),
('US', '+450628-0873651', 'America/Menominee', 'Central Time - Michigan - Dickinson, Gogebic, Iron & Menominee Counties', 'âˆ’06:00', 'âˆ’05:00', ''),
('MX', '+2058-08937', 'America/Merida', 'Central Time - Campeche, YucatÃ¡n', 'âˆ’06:00', 'âˆ’05:00', ''),
('US', '+550737-1313435', 'America/Metlakatla', 'Metlakatla Time - Annette Island', 'âˆ’08:00', 'âˆ’08:00', ''),
('MX', '+1924-09909', 'America/Mexico_City', 'Central Time - most locations', 'âˆ’06:00', 'âˆ’05:00', ''),
('PM', '+4703-05620', 'America/Miquelon', '', 'âˆ’03:00', 'âˆ’02:00', ''),
('CA', '+4606-06447', 'America/Moncton', 'Atlantic Time - New Brunswick', 'âˆ’04:00', 'âˆ’03:00', ''),
('MX', '+2540-10019', 'America/Monterrey', 'Mexican Central Time - Coahuila, Durango, Nuevo LeÃ³n, Tamaulipas away from US border', 'âˆ’06:00', 'âˆ’05:00', ''),
('UY', '-3453-05611', 'America/Montevideo', '', 'âˆ’03:00', 'âˆ’02:00', ''),
('CA', '+4531-07334', 'America/Montreal', 'Eastern Time - Quebec - most locations', 'âˆ’05:00', 'âˆ’04:00', ''),
('MS', '+1643-06213', 'America/Montserrat', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('BS', '+2505-07721', 'America/Nassau', '', 'âˆ’05:00', 'âˆ’04:00', ''),
('US', '+404251-0740023', 'America/New_York', 'Eastern Time', 'âˆ’05:00', 'âˆ’04:00', ''),
('CA', '+4901-08816', 'America/Nipigon', 'Eastern Time - Ontario & Quebec - places that did not observe DST 1967-1973', 'âˆ’05:00', 'âˆ’04:00', ''),
('US', '+643004-1652423', 'America/Nome', 'Alaska Time - west Alaska', 'âˆ’09:00', 'âˆ’08:00', ''),
('BR', '-0351-03225', 'America/Noronha', 'Atlantic islands', 'âˆ’02:00', 'âˆ’02:00', ''),
('US', '+471551-1014640', 'America/North_Dakota/Beulah', 'Central Time - North Dakota - Mercer County', 'âˆ’06:00', 'âˆ’05:00', ''),
('US', '+470659-1011757', 'America/North_Dakota/Center', 'Central Time - North Dakota - Oliver County', 'âˆ’06:00', 'âˆ’05:00', ''),
('US', '+465042-1012439', 'America/North_Dakota/New_Salem', 'Central Time - North Dakota - Morton County (except Mandan area)', 'âˆ’06:00', 'âˆ’05:00', ''),
('MX', '+2934-10425', 'America/Ojinaga', 'US Mountain Time - Chihuahua near US border', 'âˆ’07:00', 'âˆ’06:00', ''),
('PA', '+0858-07932', 'America/Panama', '', 'âˆ’05:00', 'âˆ’05:00', ''),
('CA', '+6608-06544', 'America/Pangnirtung', 'Eastern Time - Pangnirtung, Nunavut', 'âˆ’05:00', 'âˆ’04:00', ''),
('SR', '+0550-05510', 'America/Paramaribo', '', 'âˆ’03:00', 'âˆ’03:00', ''),
('US', '+332654-1120424', 'America/Phoenix', 'Mountain Standard Time - Arizona', 'âˆ’07:00', 'âˆ’07:00', ''),
('HT', '+1832-07220', 'America/Port-au-Prince', '', 'âˆ’05:00', 'âˆ’04:00', ''),
('', '', 'America/Porto_Acre', '', 'âˆ’04:00', 'âˆ’04:00', 'Link to America/Rio_Branco'),
('BR', '-0846-06354', 'America/Porto_Velho', 'Rondonia', 'âˆ’04:00', 'âˆ’04:00', ''),
('TT', '+1039-06131', 'America/Port_of_Spain', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('PR', '+182806-0660622', 'America/Puerto_Rico', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('CA', '+4843-09434', 'America/Rainy_River', 'Central Time - Rainy River & Fort Frances, Ontario', 'âˆ’06:00', 'âˆ’05:00', ''),
('CA', '+624900-0920459', 'America/Rankin_Inlet', 'Central Time - central Nunavut', 'âˆ’06:00', 'âˆ’05:00', ''),
('BR', '-0803-03454', 'America/Recife', 'Pernambuco', 'âˆ’03:00', 'âˆ’03:00', ''),
('CA', '+5024-10439', 'America/Regina', 'Central Standard Time - Saskatchewan - most locations', 'âˆ’06:00', 'âˆ’06:00', ''),
('CA', '+744144-0944945', 'America/Resolute', 'Central Standard Time - Resolute, Nunavut', 'âˆ’06:00', 'âˆ’05:00', ''),
('BR', '-0958-06748', 'America/Rio_Branco', 'Acre', 'âˆ’04:00', 'âˆ’04:00', ''),
('', '', 'America/Rosario', '', 'âˆ’03:00', 'âˆ’03:00', 'Link to America/Argentina/Cordoba'),
('BR', '-0226-05452', 'America/Santarem', 'W Para', 'âˆ’03:00', 'âˆ’03:00', ''),
('MX', '+3018-11452', 'America/Santa_Isabel', 'Mexican Pacific Time - Baja California away from US border', 'âˆ’08:00', 'âˆ’07:00', ''),
('CL', '-3327-07040', 'America/Santiago', 'most locations', 'âˆ’04:00', 'âˆ’03:00', ''),
('DO', '+1828-06954', 'America/Santo_Domingo', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('BR', '-2332-04637', 'America/Sao_Paulo', 'S & SE Brazil (GO, DF, MG, ES, RJ, SP, PR, SC, RS)', 'âˆ’03:00', 'âˆ’02:00', ''),
('GL', '+7029-02158', 'America/Scoresbysund', 'Scoresbysund / Ittoqqortoormiit', 'âˆ’01:00', '+00:00', ''),
('US', '+364708-1084111', 'America/Shiprock', 'Mountain Time - Navajo', 'âˆ’07:00', 'âˆ’06:00', 'Link to America/Denver'),
('US', '+571035-1351807', 'America/Sitka', 'Alaska Time - southeast Alaska panhandle', 'âˆ’09:00', 'âˆ’08:00', ''),
('BL', '+1753-06251', 'America/St_Barthelemy', '', 'âˆ’04:00', 'âˆ’04:00', 'Link to America/Guadeloupe'),
('CA', '+4734-05243', 'America/St_Johns', 'Newfoundland Time, including SE Labrador', 'âˆ’03:30', 'âˆ’02:30', ''),
('KN', '+1718-06243', 'America/St_Kitts', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('LC', '+1401-06100', 'America/St_Lucia', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('VI', '+1821-06456', 'America/St_Thomas', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('VC', '+1309-06114', 'America/St_Vincent', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('CA', '+5017-10750', 'America/Swift_Current', 'Central Standard Time - Saskatchewan - midwest', 'âˆ’06:00', 'âˆ’06:00', ''),
('HN', '+1406-08713', 'America/Tegucigalpa', '', 'âˆ’06:00', 'âˆ’06:00', ''),
('GL', '+7634-06847', 'America/Thule', 'Thule / Pituffik', 'âˆ’04:00', 'âˆ’03:00', ''),
('CA', '+4823-08915', 'America/Thunder_Bay', 'Eastern Time - Thunder Bay, Ontario', 'âˆ’05:00', 'âˆ’04:00', ''),
('MX', '+3232-11701', 'America/Tijuana', 'US Pacific Time - Baja California near US border', 'âˆ’08:00', 'âˆ’07:00', ''),
('CA', '+4339-07923', 'America/Toronto', 'Eastern Time - Ontario - most locations', 'âˆ’05:00', 'âˆ’04:00', ''),
('VG', '+1827-06437', 'America/Tortola', '', 'âˆ’04:00', 'âˆ’04:00', ''),
('CA', '+4916-12307', 'America/Vancouver', 'Pacific Time - west British Columbia', 'âˆ’08:00', 'âˆ’07:00', ''),
('', '', 'America/Virgin', '', 'âˆ’04:00', 'âˆ’04:00', 'Link to America/St_Thomas'),
('CA', '+6043-13503', 'America/Whitehorse', 'Pacific Time - south Yukon', 'âˆ’08:00', 'âˆ’07:00', ''),
('CA', '+4953-09709', 'America/Winnipeg', 'Central Time - Manitoba & west Ontario', 'âˆ’06:00', 'âˆ’05:00', ''),
('US', '+593249-1394338', 'America/Yakutat', 'Alaska Time - Alaska panhandle neck', 'âˆ’09:00', 'âˆ’08:00', ''),
('CA', '+6227-11421', 'America/Yellowknife', 'Mountain Time - central Northwest Territories', 'âˆ’07:00', 'âˆ’06:00', ''),
('AQ', '-6617+11031', 'Antarctica/Casey', 'Casey Station, Bailey Peninsula', '+11:00', '+08:00', ''),
('AQ', '-6835+07758', 'Antarctica/Davis', 'Davis Station, Vestfold Hills', '+05:00', '+07:00', ''),
('AQ', '-6640+14001', 'Antarctica/DumontDUrville', 'Dumont-d\'Urville Station, Terre Adelie', '+10:00', '+10:00', ''),
('AQ', '-5430+15857', 'Antarctica/Macquarie', 'Macquarie Island Station, Macquarie Island', '+11:00', '+11:00', ''),
('AQ', '-6736+06253', 'Antarctica/Mawson', 'Mawson Station, Holme Bay', '+05:00', '+05:00', ''),
('AQ', '-7750+16636', 'Antarctica/McMurdo', 'McMurdo Station, Ross Island', '+12:00', '+13:00', ''),
('AQ', '-6448-06406', 'Antarctica/Palmer', 'Palmer Station, Anvers Island', 'âˆ’04:00', 'âˆ’03:00', ''),
('AQ', '-6734-06808', 'Antarctica/Rothera', 'Rothera Station, Adelaide Island', 'âˆ’03:00', 'âˆ’03:00', ''),
('AQ', '-9000+00000', 'Antarctica/South_Pole', 'Amundsen-Scott Station, South Pole', '+12:00', '+13:00', 'Link to Antarctica/McMurdo'),
('AQ', '-690022+0393524', 'Antarctica/Syowa', 'Syowa Station, E Ongul I', '+03:00', '+03:00', ''),
('AQ', '-7824+10654', 'Antarctica/Vostok', 'Vostok Station, Lake Vostok', '+06:00', '+06:00', ''),
('SJ', '+7800+01600', 'Arctic/Longyearbyen', '', '+01:00', '+02:00', 'Link to Europe/Oslo'),
('YE', '+1245+04512', 'Asia/Aden', '', '+03:00', '+03:00', ''),
('KZ', '+4315+07657', 'Asia/Almaty', 'most locations', '+06:00', '+06:00', ''),
('JO', '+3157+03556', 'Asia/Amman', '', '+03:00', '+03:00', ''),
('RU', '+6445+17729', 'Asia/Anadyr', 'Moscow+08 - Bering Sea', '+12:00', '+12:00', ''),
('KZ', '+4431+05016', 'Asia/Aqtau', 'Atyrau (Atirau, Gur\'yev), Mangghystau (Mankistau)', '+05:00', '+05:00', ''),
('KZ', '+5017+05710', 'Asia/Aqtobe', 'Aqtobe (Aktobe)', '+05:00', '+05:00', ''),
('TM', '+3757+05823', 'Asia/Ashgabat', '', '+05:00', '+05:00', ''),
('', '', 'Asia/Ashkhabad', '', '+05:00', '+05:00', 'Link to Asia/Ashgabat'),
('IQ', '+3321+04425', 'Asia/Baghdad', '', '+03:00', '+03:00', ''),
('BH', '+2623+05035', 'Asia/Bahrain', '', '+03:00', '+03:00', ''),
('AZ', '+4023+04951', 'Asia/Baku', '', '+04:00', '+05:00', ''),
('TH', '+1345+10031', 'Asia/Bangkok', '', '+07:00', '+07:00', ''),
('LB', '+3353+03530', 'Asia/Beirut', '', '+02:00', '+03:00', ''),
('KG', '+4254+07436', 'Asia/Bishkek', '', '+06:00', '+06:00', ''),
('BN', '+0456+11455', 'Asia/Brunei', '', '+08:00', '+08:00', ''),
('', '', 'Asia/Calcutta', '', '+05:30', '+05:30', 'Link to Asia/Kolkata'),
('MN', '+4804+11430', 'Asia/Choibalsan', 'Dornod, Sukhbaatar', '+08:00', '+08:00', ''),
('CN', '+2934+10635', 'Asia/Chongqing', 'central China - Sichuan, Yunnan, Guangxi, Shaanxi, Guizhou, etc.', '+08:00', '+08:00', 'Covering historic Kansu-Szechuan time zone.'),
('', '', 'Asia/Chungking', '', '+08:00', '+08:00', 'Link to Asia/Chongqing'),
('LK', '+0656+07951', 'Asia/Colombo', '', '+05:30', '+05:30', ''),
('', '', 'Asia/Dacca', '', '+06:00', '+06:00', 'Link to Asia/Dhaka'),
('SY', '+3330+03618', 'Asia/Damascus', '', '+02:00', '+03:00', ''),
('BD', '+2343+09025', 'Asia/Dhaka', '', '+06:00', '+06:00', ''),
('TL', '-0833+12535', 'Asia/Dili', '', '+09:00', '+09:00', ''),
('AE', '+2518+05518', 'Asia/Dubai', '', '+04:00', '+04:00', ''),
('TJ', '+3835+06848', 'Asia/Dushanbe', '', '+05:00', '+05:00', ''),
('PS', '+3130+03428', 'Asia/Gaza', 'Gaza Strip', '+02:00', '+03:00', ''),
('CN', '+4545+12641', 'Asia/Harbin', 'Heilongjiang (except Mohe), Jilin', '+08:00', '+08:00', 'Covering historic Changpai time zone.'),
('PS', '+313200+0350542', 'Asia/Hebron', 'West Bank', '+02:00', '+03:00', ''),
('HK', '+2217+11409', 'Asia/Hong_Kong', '', '+08:00', '+08:00', ''),
('MN', '+4801+09139', 'Asia/Hovd', 'Bayan-Olgiy, Govi-Altai, Hovd, Uvs, Zavkhan', '+07:00', '+07:00', ''),
('VN', '+1045+10640', 'Asia/Ho_Chi_Minh', '', '+07:00', '+07:00', ''),
('RU', '+5216+10420', 'Asia/Irkutsk', 'Moscow+05 - Lake Baikal', '+09:00', '+09:00', ''),
('', '', 'Asia/Istanbul', '', '+02:00', '+03:00', 'Link to Europe/Istanbul'),
('ID', '-0610+10648', 'Asia/Jakarta', 'Java & Sumatra', '+07:00', '+07:00', ''),
('ID', '-0232+14042', 'Asia/Jayapura', 'west New Guinea (Irian Jaya) & Malukus (Moluccas)', '+09:00', '+09:00', ''),
('IL', '+3146+03514', 'Asia/Jerusalem', '', '+02:00', '+03:00', ''),
('AF', '+3431+06912', 'Asia/Kabul', '', '+04:30', '+04:30', ''),
('RU', '+5301+15839', 'Asia/Kamchatka', 'Moscow+08 - Kamchatka', '+12:00', '+12:00', ''),
('PK', '+2452+06703', 'Asia/Karachi', '', '+05:00', '+05:00', ''),
('CN', '+3929+07559', 'Asia/Kashgar', 'west Tibet & Xinjiang', '+08:00', '+08:00', 'Covering historic Kunlun time zone.'),
('NP', '+2743+08519', 'Asia/Kathmandu', '', '+05:45', '+05:45', ''),
('', '', 'Asia/Katmandu', '', '+05:45', '+05:45', 'Link to Asia/Kathmandu'),
('IN', '+2232+08822', 'Asia/Kolkata', '', '+05:30', '+05:30', 'Note: Different zones in history, see Time in India.'),
('RU', '+5601+09250', 'Asia/Krasnoyarsk', 'Moscow+04 - Yenisei River', '+08:00', '+08:00', ''),
('MY', '+0310+10142', 'Asia/Kuala_Lumpur', 'peninsular Malaysia', '+08:00', '+08:00', ''),
('MY', '+0133+11020', 'Asia/Kuching', 'Sabah & Sarawak', '+08:00', '+08:00', ''),
('KW', '+2920+04759', 'Asia/Kuwait', '', '+03:00', '+03:00', ''),
('', '', 'Asia/Macao', '', '+08:00', '+08:00', 'Link to Asia/Macau'),
('MO', '+2214+11335', 'Asia/Macau', '', '+08:00', '+08:00', ''),
('RU', '+5934+15048', 'Asia/Magadan', 'Moscow+08 - Magadan', '+12:00', '+12:00', ''),
('ID', '-0507+11924', 'Asia/Makassar', 'east & south Borneo, Sulawesi (Celebes), Bali, Nusa Tenggara, west Timor', '+08:00', '+08:00', ''),
('PH', '+1435+12100', 'Asia/Manila', '', '+08:00', '+08:00', ''),
('OM', '+2336+05835', 'Asia/Muscat', '', '+04:00', '+04:00', ''),
('CY', '+3510+03322', 'Asia/Nicosia', '', '+02:00', '+03:00', ''),
('RU', '+5345+08707', 'Asia/Novokuznetsk', 'Moscow+03 - Novokuznetsk', '+07:00', '+07:00', ''),
('RU', '+5502+08255', 'Asia/Novosibirsk', 'Moscow+03 - Novosibirsk', '+07:00', '+07:00', ''),
('RU', '+5500+07324', 'Asia/Omsk', 'Moscow+03 - west Siberia', '+07:00', '+07:00', ''),
('KZ', '+5113+05121', 'Asia/Oral', 'West Kazakhstan', '+05:00', '+05:00', ''),
('KH', '+1133+10455', 'Asia/Phnom_Penh', '', '+07:00', '+07:00', ''),
('ID', '-0002+10920', 'Asia/Pontianak', 'west & central Borneo', '+07:00', '+07:00', ''),
('KP', '+3901+12545', 'Asia/Pyongyang', '', '+09:00', '+09:00', ''),
('QA', '+2517+05132', 'Asia/Qatar', '', '+03:00', '+03:00', ''),
('KZ', '+4448+06528', 'Asia/Qyzylorda', 'Qyzylorda (Kyzylorda, Kzyl-Orda)', '+06:00', '+06:00', ''),
('MM', '+1647+09610', 'Asia/Rangoon', '', '+06:30', '+06:30', ''),
('SA', '+2438+04643', 'Asia/Riyadh', '', '+03:00', '+03:00', ''),
('', '', 'Asia/Saigon', '', '+07:00', '+07:00', 'Link to Asia/Ho_Chi_Minh'),
('RU', '+4658+14242', 'Asia/Sakhalin', 'Moscow+07 - Sakhalin Island', '+11:00', '+11:00', ''),
('UZ', '+3940+06648', 'Asia/Samarkand', 'west Uzbekistan', '+05:00', '+05:00', ''),
('KR', '+3733+12658', 'Asia/Seoul', '', '+09:00', '+09:00', ''),
('CN', '+3114+12128', 'Asia/Shanghai', 'east China - Beijing, Guangdong, Shanghai, etc.', '+08:00', '+08:00', 'Covering historic Chungyuan time zone.'),
('SG', '+0117+10351', 'Asia/Singapore', '', '+08:00', '+08:00', ''),
('TW', '+2503+12130', 'Asia/Taipei', '', '+08:00', '+08:00', ''),
('UZ', '+4120+06918', 'Asia/Tashkent', 'east Uzbekistan', '+05:00', '+05:00', ''),
('GE', '+4143+04449', 'Asia/Tbilisi', '', '+04:00', '+04:00', ''),
('IR', '+3540+05126', 'Asia/Tehran', '', '+03:30', '+04:30', ''),
('', '', 'Asia/Tel_Aviv', '', '+02:00', '+03:00', 'Link to Asia/Jerusalem'),
('', '', 'Asia/Thimbu', '', '+06:00', '+06:00', 'Link to Asia/Thimphu'),
('BT', '+2728+08939', 'Asia/Thimphu', '', '+06:00', '+06:00', ''),
('JP', '+353916+1394441', 'Asia/Tokyo', '', '+09:00', '+09:00', ''),
('', '', 'Asia/Ujung_Pandang', '', '+08:00', '+08:00', 'Link to Asia/Makassar'),
('MN', '+4755+10653', 'Asia/Ulaanbaatar', 'most locations', '+08:00', '+08:00', ''),
('', '', 'Asia/Ulan_Bator', '', '+08:00', '+08:00', 'Link to Asia/Ulaanbaatar'),
('CN', '+4348+08735', 'Asia/Urumqi', 'most of Tibet & Xinjiang', '+08:00', '+08:00', 'Covering historic Sinkiang-Tibet time zone.'),
('LA', '+1758+10236', 'Asia/Vientiane', '', '+07:00', '+07:00', ''),
('RU', '+4310+13156', 'Asia/Vladivostok', 'Moscow+07 - Amur River', '+11:00', '+11:00', ''),
('RU', '+6200+12940', 'Asia/Yakutsk', 'Moscow+06 - Lena River', '+10:00', '+10:00', ''),
('RU', '+5651+06036', 'Asia/Yekaterinburg', 'Moscow+02 - Urals', '+06:00', '+06:00', ''),
('AM', '+4011+04430', 'Asia/Yerevan', '', '+04:00', '+04:00', ''),
('PT', '+3744-02540', 'Atlantic/Azores', 'Azores', 'âˆ’01:00', '+00:00', ''),
('BM', '+3217-06446', 'Atlantic/Bermuda', '', 'âˆ’04:00', 'âˆ’03:00', ''),
('ES', '+2806-01524', 'Atlantic/Canary', 'Canary Islands', '+00:00', '+01:00', ''),
('CV', '+1455-02331', 'Atlantic/Cape_Verde', '', 'âˆ’01:00', 'âˆ’01:00', ''),
('', '', 'Atlantic/Faeroe', '', '+00:00', '+01:00', 'Link to Atlantic/Faroe'),
('FO', '+6201-00646', 'Atlantic/Faroe', '', '+00:00', '+01:00', ''),
('', '', 'Atlantic/Jan_Mayen', '', '+01:00', '+02:00', 'Link to Europe/Oslo'),
('PT', '+3238-01654', 'Atlantic/Madeira', 'Madeira Islands', '+00:00', '+01:00', ''),
('IS', '+6409-02151', 'Atlantic/Reykjavik', '', '+00:00', '+00:00', ''),
('GS', '-5416-03632', 'Atlantic/South_Georgia', '', 'âˆ’02:00', 'âˆ’02:00', ''),
('FK', '-5142-05751', 'Atlantic/Stanley', '', 'âˆ’03:00', 'âˆ’03:00', ''),
('SH', '-1555-00542', 'Atlantic/St_Helena', '', '+00:00', '+00:00', ''),
('', '', 'Australia/ACT', '', '+10:00', '+11:00', 'Link to Australia/Sydney'),
('AU', '-3455+13835', 'Australia/Adelaide', 'South Australia', '+09:30', '+10:30', ''),
('AU', '-2728+15302', 'Australia/Brisbane', 'Queensland - most locations', '+10:00', '+10:00', ''),
('AU', '-3157+14127', 'Australia/Broken_Hill', 'New South Wales - Yancowinna', '+09:30', '+10:30', ''),
('', '', 'Australia/Canberra', '', '+10:00', '+11:00', 'Link to Australia/Sydney'),
('AU', '-3956+14352', 'Australia/Currie', 'Tasmania - King Island', '+10:00', '+11:00', ''),
('AU', '-1228+13050', 'Australia/Darwin', 'Northern Territory', '+09:30', '+09:30', ''),
('AU', '-3143+12852', 'Australia/Eucla', 'Western Australia - Eucla area', '+08:45', '+08:45', ''),
('AU', '-4253+14719', 'Australia/Hobart', 'Tasmania - most locations', '+10:00', '+11:00', ''),
('', '', 'Australia/LHI', '', '+10:30', '+11:00', 'Link to Australia/Lord_Howe'),
('AU', '-2016+14900', 'Australia/Lindeman', 'Queensland - Holiday Islands', '+10:00', '+10:00', ''),
('AU', '-3133+15905', 'Australia/Lord_Howe', 'Lord Howe Island', '+10:30', '+11:00', ''),
('AU', '-3749+14458', 'Australia/Melbourne', 'Victoria', '+10:00', '+11:00', ''),
('', '', 'Australia/North', '', '+09:30', '+09:30', 'Link to Australia/Darwin'),
('', '', 'Australia/NSW', '', '+10:00', '+11:00', 'Link to Australia/Sydney'),
('AU', '-3157+11551', 'Australia/Perth', 'Western Australia - most locations', '+08:00', '+08:00', ''),
('', '', 'Australia/Queensland', '', '+10:00', '+10:00', 'Link to Australia/Brisbane'),
('', '', 'Australia/South', '', '+09:30', '+10:30', 'Link to Australia/Adelaide'),
('AU', '-3352+15113', 'Australia/Sydney', 'New South Wales - most locations', '+10:00', '+11:00', ''),
('', '', 'Australia/Tasmania', '', '+10:00', '+11:00', 'Link to Australia/Hobart'),
('', '', 'Australia/Victoria', '', '+10:00', '+11:00', 'Link to Australia/Melbourne'),
('', '', 'Australia/West', '', '+08:00', '+08:00', 'Link to Australia/Perth'),
('', '', 'Australia/Yancowinna', '', '+09:30', '+10:30', 'Link to Australia/Broken_Hill'),
('', '', 'Brazil/Acre', '', 'âˆ’04:00', 'âˆ’04:00', 'Link to America/Rio_Branco'),
('', '', 'Brazil/DeNoronha', '', 'âˆ’02:00', 'âˆ’02:00', 'Link to America/Noronha'),
('', '', 'Brazil/East', '', 'âˆ’03:00', 'âˆ’02:00', 'Link to America/Sao_Paulo'),
('', '', 'Brazil/West', '', 'âˆ’04:00', 'âˆ’04:00', 'Link to America/Manaus'),
('', '', 'Canada/Atlantic', '', 'âˆ’04:00', 'âˆ’03:00', 'Link to America/Halifax'),
('', '', 'Canada/Central', '', 'âˆ’06:00', 'âˆ’05:00', 'Link to America/Winnipeg'),
('', '', 'Canada/East-Saskatchewan', '', 'âˆ’06:00', 'âˆ’06:00', 'Link to America/Regina'),
('', '', 'Canada/Eastern', '', 'âˆ’05:00', 'âˆ’04:00', 'Link to America/Toronto'),
('', '', 'Canada/Mountain', '', 'âˆ’07:00', 'âˆ’06:00', 'Link to America/Edmonton'),
('', '', 'Canada/Newfoundland', '', 'âˆ’03:30', 'âˆ’02:30', 'Link to America/St_Johns'),
('', '', 'Canada/Pacific', '', 'âˆ’08:00', 'âˆ’07:00', 'Link to America/Vancouver'),
('', '', 'Canada/Saskatchewan', '', 'âˆ’06:00', 'âˆ’06:00', 'Link to America/Regina'),
('', '', 'Canada/Yukon', '', 'âˆ’08:00', 'âˆ’07:00', 'Link to America/Whitehorse'),
('', '', 'CET', '', '+01:00', '+02:00', ''),
('', '', 'Chile/Continental', '', 'âˆ’04:00', 'âˆ’03:00', 'Link to America/Santiago'),
('', '', 'Chile/EasterIsland', '', 'âˆ’06:00', 'âˆ’05:00', 'Link to Pacific/Easter'),
('', '', 'CST6CDT', '', 'âˆ’06:00', 'âˆ’05:00', ''),
('', '', 'Cuba', '', 'âˆ’05:00', 'âˆ’04:00', 'Link to America/Havana'),
('', '', 'EET', '', '+02:00', '+03:00', ''),
('', '', 'Egypt', '', '+02:00', '+02:00', 'Link to Africa/Cairo'),
('', '', 'Eire', '', '+00:00', '+01:00', 'Link to Europe/Dublin'),
('', '', 'EST', '', 'âˆ’05:00', 'âˆ’05:00', ''),
('', '', 'EST5EDT', '', 'âˆ’05:00', 'âˆ’04:00', ''),
('', '', 'Etc./GMT', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Etc./GMT+0', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Etc./UCT', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Etc./Universal', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Etc./UTC', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Etc./Zulu', '', '+00:00', '+00:00', 'Link to UTC'),
('NL', '+5222+00454', 'Europe/Amsterdam', '', '+01:00', '+02:00', ''),
('AD', '+4230+00131', 'Europe/Andorra', '', '+01:00', '+02:00', ''),
('GR', '+3758+02343', 'Europe/Athens', '', '+02:00', '+03:00', ''),
('', '', 'Europe/Belfast', '', '+00:00', '+01:00', 'Link to Europe/London'),
('RS', '+4450+02030', 'Europe/Belgrade', '', '+01:00', '+02:00', ''),
('DE', '+5230+01322', 'Europe/Berlin', '', '+01:00', '+02:00', 'In 1945, the Trizone did not follow Berlin\'s switch to DST, see Time in Germany'),
('SK', '+4809+01707', 'Europe/Bratislava', '', '+01:00', '+02:00', 'Link to Europe/Prague'),
('BE', '+5050+00420', 'Europe/Brussels', '', '+01:00', '+02:00', ''),
('RO', '+4426+02606', 'Europe/Bucharest', '', '+02:00', '+03:00', ''),
('HU', '+4730+01905', 'Europe/Budapest', '', '+01:00', '+02:00', ''),
('MD', '+4700+02850', 'Europe/Chisinau', '', '+02:00', '+03:00', ''),
('DK', '+5540+01235', 'Europe/Copenhagen', '', '+01:00', '+02:00', ''),
('IE', '+5320-00615', 'Europe/Dublin', '', '+00:00', '+01:00', ''),
('GI', '+3608-00521', 'Europe/Gibraltar', '', '+01:00', '+02:00', ''),
('GG', '+4927-00232', 'Europe/Guernsey', '', '+00:00', '+01:00', 'Link to Europe/London'),
('FI', '+6010+02458', 'Europe/Helsinki', '', '+02:00', '+03:00', ''),
('IM', '+5409-00428', 'Europe/Isle_of_Man', '', '+00:00', '+01:00', 'Link to Europe/London'),
('TR', '+4101+02858', 'Europe/Istanbul', '', '+02:00', '+03:00', ''),
('JE', '+4912-00207', 'Europe/Jersey', '', '+00:00', '+01:00', 'Link to Europe/London'),
('RU', '+5443+02030', 'Europe/Kaliningrad', 'Moscow-01 - Kaliningrad', '+03:00', '+03:00', ''),
('UA', '+5026+03031', 'Europe/Kiev', 'most locations', '+02:00', '+03:00', ''),
('PT', '+3843-00908', 'Europe/Lisbon', 'mainland', '+00:00', '+01:00', ''),
('SI', '+4603+01431', 'Europe/Ljubljana', '', '+01:00', '+02:00', 'Link to Europe/Belgrade'),
('GB', '+513030-0000731', 'Europe/London', '', '+00:00', '+01:00', ''),
('LU', '+4936+00609', 'Europe/Luxembourg', '', '+01:00', '+02:00', ''),
('ES', '+4024-00341', 'Europe/Madrid', 'mainland', '+01:00', '+02:00', ''),
('MT', '+3554+01431', 'Europe/Malta', '', '+01:00', '+02:00', ''),
('AX', '+6006+01957', 'Europe/Mariehamn', '', '+02:00', '+03:00', 'Link to Europe/Helsinki'),
('BY', '+5354+02734', 'Europe/Minsk', '', '+03:00', '+03:00', ''),
('MC', '+4342+00723', 'Europe/Monaco', '', '+01:00', '+02:00', ''),
('RU', '+5545+03735', 'Europe/Moscow', 'Moscow+00 - west Russia', '+04:00', '+04:00', ''),
('', '', 'Europe/Nicosia', '', '+02:00', '+03:00', 'Link to Asia/Nicosia'),
('NO', '+5955+01045', 'Europe/Oslo', '', '+01:00', '+02:00', ''),
('FR', '+4852+00220', 'Europe/Paris', '', '+01:00', '+02:00', ''),
('ME', '+4226+01916', 'Europe/Podgorica', '', '+01:00', '+02:00', 'Link to Europe/Belgrade'),
('CZ', '+5005+01426', 'Europe/Prague', '', '+01:00', '+02:00', ''),
('LV', '+5657+02406', 'Europe/Riga', '', '+02:00', '+03:00', ''),
('IT', '+4154+01229', 'Europe/Rome', '', '+01:00', '+02:00', ''),
('RU', '+5312+05009', 'Europe/Samara', 'Moscow+00 - Samara, Udmurtia', '+04:00', '+04:00', ''),
('SM', '+4355+01228', 'Europe/San_Marino', '', '+01:00', '+02:00', 'Link to Europe/Rome'),
('BA', '+4352+01825', 'Europe/Sarajevo', '', '+01:00', '+02:00', 'Link to Europe/Belgrade'),
('UA', '+4457+03406', 'Europe/Simferopol', 'central Crimea', '+02:00', '+03:00', ''),
('MK', '+4159+02126', 'Europe/Skopje', '', '+01:00', '+02:00', 'Link to Europe/Belgrade'),
('BG', '+4241+02319', 'Europe/Sofia', '', '+02:00', '+03:00', ''),
('SE', '+5920+01803', 'Europe/Stockholm', '', '+01:00', '+02:00', ''),
('EE', '+5925+02445', 'Europe/Tallinn', '', '+02:00', '+03:00', ''),
('AL', '+4120+01950', 'Europe/Tirane', '', '+01:00', '+02:00', ''),
('', '', 'Europe/Tiraspol', '', '+02:00', '+03:00', 'Link to Europe/Chisinau'),
('UA', '+4837+02218', 'Europe/Uzhgorod', 'Ruthenia', '+02:00', '+03:00', ''),
('LI', '+4709+00931', 'Europe/Vaduz', '', '+01:00', '+02:00', ''),
('VA', '+415408+0122711', 'Europe/Vatican', '', '+01:00', '+02:00', 'Link to Europe/Rome'),
('AT', '+4813+01620', 'Europe/Vienna', '', '+01:00', '+02:00', ''),
('LT', '+5441+02519', 'Europe/Vilnius', '', '+02:00', '+03:00', ''),
('RU', '+4844+04425', 'Europe/Volgograd', 'Moscow+00 - Caspian Sea', '+04:00', '+04:00', ''),
('PL', '+5215+02100', 'Europe/Warsaw', '', '+01:00', '+02:00', ''),
('HR', '+4548+01558', 'Europe/Zagreb', '', '+01:00', '+02:00', 'Link to Europe/Belgrade'),
('UA', '+4750+03510', 'Europe/Zaporozhye', 'Zaporozh\'ye, E Lugansk / Zaporizhia, E Luhansk', '+02:00', '+03:00', ''),
('CH', '+4723+00832', 'Europe/Zurich', '', '+01:00', '+02:00', ''),
('', '', 'GB', '', '+00:00', '+01:00', 'Link to Europe/London'),
('', '', 'GB-Eire', '', '+00:00', '+01:00', 'Link to Europe/London'),
('', '', 'GMT', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'GMT+0', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'GMT-0', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'GMT0', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Greenwich', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Hong Kong', '', '+08:00', '+08:00', 'Link to Asia/Hong_Kong'),
('', '', 'HST', '', 'âˆ’10:00', 'âˆ’10:00', ''),
('', '', 'Iceland', '', '+00:00', '+00:00', 'Link to Atlantic/Reykjavik'),
('MG', '-1855+04731', 'Indian/Antananarivo', '', '+03:00', '+03:00', ''),
('IO', '-0720+07225', 'Indian/Chagos', '', '+06:00', '+06:00', ''),
('CX', '-1025+10543', 'Indian/Christmas', '', '+07:00', '+07:00', ''),
('CC', '-1210+09655', 'Indian/Cocos', '', '+06:30', '+06:30', ''),
('KM', '-1141+04316', 'Indian/Comoro', '', '+03:00', '+03:00', ''),
('TF', '-492110+0701303', 'Indian/Kerguelen', '', '+05:00', '+05:00', ''),
('SC', '-0440+05528', 'Indian/Mahe', '', '+04:00', '+04:00', ''),
('MV', '+0410+07330', 'Indian/Maldives', '', '+05:00', '+05:00', ''),
('MU', '-2010+05730', 'Indian/Mauritius', '', '+04:00', '+04:00', ''),
('YT', '-1247+04514', 'Indian/Mayotte', '', '+03:00', '+03:00', ''),
('RE', '-2052+05528', 'Indian/Reunion', '', '+04:00', '+04:00', ''),
('', '', 'Iran', '', '+03:30', '+04:30', 'Link to Asia/Tehran'),
('', '', 'Israel', '', '+02:00', '+03:00', 'Link to Asia/Jerusalem'),
('', '', 'Jamaica', '', 'âˆ’05:00', 'âˆ’05:00', 'Link to America/Jamaica'),
('', '', 'Japan', '', '+09:00', '+09:00', 'Link to Asia/Tokyo'),
('', '', 'JST-9', '', '+09:00', '+09:00', 'Link to Asia/Tokyo'),
('', '', 'Kwajalein', '', '+12:00', '+12:00', 'Link to Pacific/Kwajalein'),
('', '', 'Libya', '', '+02:00', '+02:00', 'Link to Africa/Tripoli'),
('', '', 'MET', '', '+01:00', '+02:00', ''),
('', '', 'Mexico/BajaNorte', '', 'âˆ’08:00', 'âˆ’07:00', 'Link to America/Tijuana'),
('', '', 'Mexico/BajaSur', '', 'âˆ’07:00', 'âˆ’06:00', 'Link to America/Mazatlan'),
('', '', 'Mexico/General', '', 'âˆ’06:00', 'âˆ’05:00', 'Link to America/Mexico_City'),
('', '', 'MST', '', 'âˆ’07:00', 'âˆ’07:00', ''),
('', '', 'MST7MDT', '', 'âˆ’07:00', 'âˆ’06:00', ''),
('', '', 'Navajo', '', 'âˆ’07:00', 'âˆ’06:00', 'Link to America/Denver'),
('', '', 'NZ', '', '+12:00', '+13:00', 'Link to Pacific/Auckland'),
('', '', 'NZ-CHAT', '', '+12:45', '+13:45', 'Link to Pacific/Chatham'),
('WS', '-1350-17144', 'Pacific/Apia', '', '+13:00', '+14:00', ''),
('NZ', '-3652+17446', 'Pacific/Auckland', 'most locations', '+12:00', '+13:00', ''),
('NZ', '-4357-17633', 'Pacific/Chatham', 'Chatham Islands', '+12:45', '+13:45', ''),
('FM', '+0725+15147', 'Pacific/Chuuk', 'Chuuk (Truk) and Yap', '+10:00', '+10:00', ''),
('CL', '-2709-10926', 'Pacific/Easter', 'Easter Island & Sala y Gomez', 'âˆ’06:00', 'âˆ’05:00', ''),
('VU', '-1740+16825', 'Pacific/Efate', '', '+11:00', '+11:00', ''),
('KI', '-0308-17105', 'Pacific/Enderbury', 'Phoenix Islands', '+13:00', '+13:00', ''),
('TK', '-0922-17114', 'Pacific/Fakaofo', '', '+13:00', '+13:00', ''),
('FJ', '-1808+17825', 'Pacific/Fiji', '', '+12:00', '+13:00', ''),
('TV', '-0831+17913', 'Pacific/Funafuti', '', '+12:00', '+12:00', ''),
('EC', '-0054-08936', 'Pacific/Galapagos', 'Galapagos Islands', 'âˆ’06:00', 'âˆ’06:00', ''),
('PF', '-2308-13457', 'Pacific/Gambier', 'Gambier Islands', 'âˆ’09:00', 'âˆ’09:00', ''),
('SB', '-0932+16012', 'Pacific/Guadalcanal', '', '+11:00', '+11:00', ''),
('GU', '+1328+14445', 'Pacific/Guam', '', '+10:00', '+10:00', ''),
('US', '+211825-1575130', 'Pacific/Honolulu', 'Hawaii', 'âˆ’10:00', 'âˆ’10:00', ''),
('UM', '+1645-16931', 'Pacific/Johnston', 'Johnston Atoll', 'âˆ’10:00', 'âˆ’10:00', ''),
('KI', '+0152-15720', 'Pacific/Kiritimati', 'Line Islands', '+14:00', '+14:00', ''),
('FM', '+0519+16259', 'Pacific/Kosrae', 'Kosrae', '+11:00', '+11:00', ''),
('MH', '+0905+16720', 'Pacific/Kwajalein', 'Kwajalein', '+12:00', '+12:00', ''),
('MH', '+0709+17112', 'Pacific/Majuro', 'most locations', '+12:00', '+12:00', ''),
('PF', '-0900-13930', 'Pacific/Marquesas', 'Marquesas Islands', 'âˆ’09:30', 'âˆ’09:30', ''),
('UM', '+2813-17722', 'Pacific/Midway', 'Midway Islands', 'âˆ’11:00', 'âˆ’11:00', ''),
('NR', '-0031+16655', 'Pacific/Nauru', '', '+12:00', '+12:00', ''),
('NU', '-1901-16955', 'Pacific/Niue', '', 'âˆ’11:00', 'âˆ’11:00', ''),
('NF', '-2903+16758', 'Pacific/Norfolk', '', '+11:30', '+11:30', ''),
('NC', '-2216+16627', 'Pacific/Noumea', '', '+11:00', '+11:00', ''),
('AS', '-1416-17042', 'Pacific/Pago_Pago', '', 'âˆ’11:00', 'âˆ’11:00', ''),
('PW', '+0720+13429', 'Pacific/Palau', '', '+09:00', '+09:00', ''),
('PN', '-2504-13005', 'Pacific/Pitcairn', '', 'âˆ’08:00', 'âˆ’08:00', ''),
('FM', '+0658+15813', 'Pacific/Pohnpei', 'Pohnpei (Ponape)', '+11:00', '+11:00', ''),
('', '', 'Pacific/Ponape', '', '+11:00', '+11:00', 'Link to Pacific/Pohnpei'),
('PG', '-0930+14710', 'Pacific/Port_Moresby', '', '+10:00', '+10:00', ''),
('CK', '-2114-15946', 'Pacific/Rarotonga', '', 'âˆ’10:00', 'âˆ’10:00', ''),
('MP', '+1512+14545', 'Pacific/Saipan', '', '+10:00', '+10:00', ''),
('', '', 'Pacific/Samoa', '', 'âˆ’11:00', 'âˆ’11:00', 'Link to Pacific/Pago_Pago'),
('PF', '-1732-14934', 'Pacific/Tahiti', 'Society Islands', 'âˆ’10:00', 'âˆ’10:00', ''),
('KI', '+0125+17300', 'Pacific/Tarawa', 'Gilbert Islands', '+12:00', '+12:00', ''),
('TO', '-2110-17510', 'Pacific/Tongatapu', '', '+13:00', '+13:00', ''),
('', '', 'Pacific/Truk', '', '+10:00', '+10:00', 'Link to Pacific/Chuuk'),
('UM', '+1917+16637', 'Pacific/Wake', 'Wake Island', '+12:00', '+12:00', ''),
('WF', '-1318-17610', 'Pacific/Wallis', '', '+12:00', '+12:00', ''),
('', '', 'Pacific/Yap', '', '+10:00', '+10:00', 'Link to Pacific/Chuuk'),
('', '', 'Poland', '', '+01:00', '+02:00', 'Link to Europe/Warsaw'),
('', '', 'Portugal', '', '+00:00', '+01:00', 'Link to Europe/Lisbon'),
('', '', 'PRC', '', '+08:00', '+08:00', 'Link to Asia/Shanghai'),
('', '', 'PST8PDT', '', 'âˆ’08:00', 'âˆ’07:00', ''),
('', '', 'ROC', '', '+08:00', '+08:00', 'Link to Asia/Taipei'),
('', '', 'ROK', '', '+09:00', '+09:00', 'Link to Asia/Seoul'),
('', '', 'Singapore', '', '+08:00', '+08:00', 'Link to Asia/Singapore'),
('', '', 'Turkey', '', '+02:00', '+03:00', 'Link to Europe/Istanbul'),
('', '', 'UCT', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Universal', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'US/Alaska', '', 'âˆ’09:00', 'âˆ’08:00', 'Link to America/Anchorage'),
('', '', 'US/Aleutian', '', 'âˆ’10:00', 'âˆ’09:00', 'Link to America/Adak'),
('', '', 'US/Arizona', '', 'âˆ’07:00', 'âˆ’07:00', 'Link to America/Phoenix'),
('', '', 'US/Central', '', 'âˆ’06:00', 'âˆ’05:00', 'Link to America/Chicago'),
('', '', 'US/East-Indiana', '', 'âˆ’05:00', 'âˆ’04:00', 'Link to America/Indiana/Indianapolis'),
('', '', 'US/Eastern', '', 'âˆ’05:00', 'âˆ’04:00', 'Link to America/New_York'),
('', '', 'US/Hawaii', '', 'âˆ’10:00', 'âˆ’10:00', 'Link to Pacific/Honolulu'),
('', '', 'US/Indiana-Starke', '', 'âˆ’06:00', 'âˆ’05:00', 'Link to America/Indiana/Knox'),
('', '', 'US/Michigan', '', 'âˆ’05:00', 'âˆ’04:00', 'Link to America/Detroit'),
('', '', 'US/Mountain', '', 'âˆ’07:00', 'âˆ’06:00', 'Link to America/Denver'),
('', '', 'US/Pacific', '', 'âˆ’08:00', 'âˆ’07:00', 'Link to America/Los_Angeles'),
('', '', 'US/Pacific-New', '', 'âˆ’08:00', 'âˆ’07:00', 'Link to America/Los_Angeles'),
('', '', 'US/Samoa', '', 'âˆ’11:00', 'âˆ’11:00', 'Link to Pacific/Pago_Pago'),
('', '', 'UTC', '', '+00:00', '+00:00', ''),
('', '', 'W-SU', '', '+04:00', '+04:00', 'Link to Europe/Moscow'),
('', '', 'WET', '', '+00:00', '+01:00', ''),
('', '', 'Zulu', '', '+00:00', '+00:00', 'Link to UTC');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNo` int(10) DEFAULT NULL,
  `address` tinytext DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birthday` varchar(20) DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL,
  `userImage` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `status` int(1) DEFAULT 0,
  `usertype` varchar(255) DEFAULT NULL,
  `confir_Code` int(11) DEFAULT NULL,
  `nic` varchar(13) DEFAULT NULL,
  `recoveryPassword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `userEmail`, `password`, `contactNo`, `address`, `province`, `State`, `city`, `gender`, `birthday`, `pincode`, `userImage`, `regDate`, `updationDate`, `status`, `usertype`, `confir_Code`, `nic`, `recoveryPassword`) VALUES
(4, 'Eastern Province Admin', 'e@gmail.com', 'f970e2767d0cfe75876ea857f92e319b', 634567876, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-23 08:53:27', '0000-00-00 00:00:00', 1, '2', NULL, 'admin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appealcomplaint`
--
ALTER TABLE `appealcomplaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appealremark`
--
ALTER TABLE `appealremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintremark`
--
ALTER TABLE `complaintremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintstype`
--
ALTER TABLE `complaintstype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailsetting`
--
ALTER TABLE `emailsetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footerlink`
--
ALTER TABLE `footerlink`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genaralsetting`
--
ALTER TABLE `genaralsetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `googlerecapcha`
--
ALTER TABLE `googlerecapcha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maillist`
--
ALTER TABLE `maillist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentsetting`
--
ALTER TABLE `paymentsetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settinghome`
--
ALTER TABLE `settinghome`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitemaintenance`
--
ALTER TABLE `sitemaintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliderbanner`
--
ALTER TABLE `sliderbanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`complaintNumber`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timezones`
--
ALTER TABLE `timezones`
  ADD PRIMARY KEY (`TimeZone`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appealcomplaint`
--
ALTER TABLE `appealcomplaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appealremark`
--
ALTER TABLE `appealremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;

--
-- AUTO_INCREMENT for table `complaintremark`
--
ALTER TABLE `complaintremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complaintstype`
--
ALTER TABLE `complaintstype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emailsetting`
--
ALTER TABLE `emailsetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `footerlink`
--
ALTER TABLE `footerlink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `genaralsetting`
--
ALTER TABLE `genaralsetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `googlerecapcha`
--
ALTER TABLE `googlerecapcha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `maillist`
--
ALTER TABLE `maillist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paymentsetting`
--
ALTER TABLE `paymentsetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settinghome`
--
ALTER TABLE `settinghome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sitemaintenance`
--
ALTER TABLE `sitemaintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliderbanner`
--
ALTER TABLE `sliderbanner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `complaintNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
