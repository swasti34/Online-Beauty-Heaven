-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2025 at 10:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinebeautyheaven`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` char(50) DEFAULT NULL,
  `UserName` char(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 9800000000, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-09-18 06:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

CREATE TABLE `tblbook` (
  `ID` int(10) NOT NULL,
  `UserID` int(10) NOT NULL,
  `AptNumber` int(10) NOT NULL,
  `AptDate` date NOT NULL,
  `AptTime` time NOT NULL,
  `Message` varchar(255) NOT NULL,
  `ServiceID` int(11) NOT NULL,
  `ServiceName` varchar(100) NOT NULL,
  `BookingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Remark` varchar(250) NOT NULL,
  `Status` varchar(250) NOT NULL,
  `RemarkDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `viewed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`ID`, `UserID`, `AptNumber`, `AptDate`, `AptTime`, `Message`, `ServiceID`, `ServiceName`, `BookingDate`, `Remark`, `Status`, `RemarkDate`, `viewed`) VALUES
(1, 12, 325921427, '2024-10-04', '00:00:00', '', 0, '', '2024-11-08 01:00:09', 'Accepted', 'Selected', '2024-11-08 01:00:09', 1),
(2, 12, 524196904, '2024-10-31', '00:00:00', '', 0, '', '2024-11-08 01:00:09', '', '', '2024-11-08 01:00:09', 1),
(4, 1, 636440662, '2024-10-04', '00:00:00', '', 0, '', '2024-11-08 01:00:09', 'sorry', 'Rejected', '2024-11-08 01:00:09', 1),
(6, 1, 390968418, '2024-10-14', '00:00:00', '', 0, '', '2024-11-08 01:00:09', 'gfh', 'Selected', '2024-11-08 01:00:09', 1),
(7, 1, 339753601, '2024-10-09', '00:39:00', '', 0, '', '2024-11-08 01:00:09', 'hvh', 'Selected', '2024-11-08 01:00:09', 1),
(13, 1, 169927834, '2024-10-09', '18:20:00', '', 0, '', '2024-11-08 01:00:09', 'hey', 'Rejected', '2024-11-08 01:00:09', 1),
(63, 1, 389925498, '2024-10-19', '14:00:00', 'ghfdhg', 0, '', '2024-11-08 01:00:09', 'ghfh', 'Selected', '2024-11-08 01:00:09', 1),
(70, 1, 187806591, '2024-10-19', '10:00:00', 'hfh', 0, '', '2024-11-08 01:00:09', 'hfhj', 'Selected', '2024-11-08 01:00:09', 1),
(91, 1, 277514884, '2024-10-20', '11:00:00', 'hgfh', 0, '', '2024-11-08 01:00:09', 'nvn', 'Rejected', '2024-11-08 01:00:09', 1),
(97, 1, 715385229, '2024-10-20', '14:00:00', 'nbvn', 0, '', '2024-11-08 01:00:09', 'hello', 'Selected', '2024-11-08 01:00:09', 1),
(108, 1, 223305355, '2024-10-21', '17:30:00', 'ghh', 0, '', '2024-11-08 01:00:09', 'gh', 'Rejected', '2024-11-08 01:00:09', 1),
(110, 1, 117208299, '2024-10-20', '15:30:00', 'hgd', 0, '', '2024-11-08 01:00:09', 'gdh', 'Rejected', '2024-11-08 01:00:09', 1),
(111, 1, 924150970, '2024-10-20', '13:30:00', 'gfhd', 0, '', '2024-11-08 01:00:09', 'hf', 'Selected', '2024-11-08 01:00:09', 1),
(120, 2, 309970581, '2024-10-20', '15:00:00', 'bc', 0, '', '2024-11-08 01:00:09', 'b', 'Selected', '2024-11-08 01:00:09', 1),
(122, 1, 887499470, '2024-10-20', '15:30:00', 'hdh', 9, 'Layer Haircut', '2024-11-08 01:00:09', 'hey', 'Selected', '2024-11-08 01:00:09', 1),
(124, 1, 569820634, '2024-10-20', '15:30:00', 'mvj', 24, 'bnc', '2024-11-08 01:00:09', 'hf', 'Selected', '2024-11-08 01:00:09', 1),
(125, 1, 899760885, '2024-10-20', '17:00:00', 'hey', 16, 'Aroma Oil Massage Therapy', '2024-11-08 01:00:09', 'hey arrive on time', 'Selected', '2024-11-08 01:00:09', 1),
(128, 1, 875210589, '2024-10-20', '15:00:00', 'ghd', 12, 'Body Spa', '2024-11-08 01:00:09', 'Be on time', 'Selected', '2024-11-08 01:00:09', 1),
(130, 1, 697749422, '2024-10-21', '12:00:00', 'hey', 2, 'Facial', '2024-11-08 01:00:09', 'ggfh', 'Selected', '2024-11-08 01:00:09', 1),
(141, 1, 266124305, '2024-10-21', '10:30:00', 'hey', 12, 'Bridal Makeup', '2024-11-08 01:00:09', 'heyyy', 'Selected', '2024-11-08 01:00:09', 1),
(163, 4, 982881177, '2024-11-06', '14:00:00', 'gheyyyyyyyyyy', 1, 'Hair color', '2024-11-08 01:00:09', 'sorry this time is not avaiable', 'Rejected', '2024-11-08 01:00:09', 1),
(164, 4, 598121103, '2024-11-07', '16:30:00', 'hey ', 3, 'Facial Massage', '2024-11-08 01:00:09', 'This time is not avaiable ', 'Rejected', '2024-11-08 01:00:09', 1),
(171, 4, 860759129, '2024-11-09', '16:30:00', 'heyyyyyyyyyyyyyyo', 1, 'Hair color', '2024-11-08 01:00:09', 'be on time', 'Selected', '2024-11-08 01:00:09', 1),
(172, 4, 849426922, '2024-11-09', '14:30:00', 'aaaaaaaaaaaaaa', 5, 'Charcoal Facemask', '2024-11-08 00:57:28', 'okkkkkkkkkkk', 'Selected', '2024-11-08 00:57:28', 1),
(173, 4, 556332495, '2024-11-09', '14:30:00', 'bbbbbbbbbb', 1, 'Hair color', '2024-11-08 01:02:08', 'okkkkkkkkk', 'Selected', '2024-11-08 01:02:08', 1),
(174, 4, 934317404, '2024-11-09', '17:30:00', 'ccccccccc', 1, 'Hair color', '2024-11-08 01:01:52', '', '', '2024-11-08 01:01:52', 1),
(175, 4, 284591177, '2024-11-09', '16:00:00', 'aaaaaaaa', 5, 'Charcoal Facemask', '2024-11-08 01:03:55', '', '', '2024-11-08 01:03:55', 1),
(176, 4, 635234402, '2024-11-08', '15:00:00', 'avbnn', 6, 'Fruit Facial', '2024-11-08 01:03:55', '', '', '2024-11-08 01:03:55', 1),
(177, 4, 461195107, '2024-11-10', '16:30:00', 'hello', 1, 'Hair color', '2024-11-09 06:31:53', 'be on time', 'Selected', '2024-11-09 06:31:53', 1),
(178, 4, 809643406, '2024-11-10', '16:00:00', 'heyy', 5, 'Charcoal Facemask', '2024-11-09 06:31:28', '', '', '2024-11-09 06:31:28', 1),
(179, 1, 368606758, '2024-11-15', '17:00:00', 'heyyyyyyyyyy', 8, 'Menicure', '2024-11-15 15:49:26', 'heyyyyyyyyyyyyyy', 'Selected', '2024-11-15 15:49:26', 1),
(180, 1, 360220643, '2024-11-15', '14:00:00', 'hj', 7, 'Pedicure', '2024-11-15 16:53:14', '', '', '2024-11-15 16:53:14', 1),
(181, 1, 337323075, '2024-11-16', '15:00:00', 'hggf', 3, 'Facial Massage', '2024-11-15 17:49:09', 'sorry', 'Rejected', '2024-11-15 17:49:09', 1),
(182, 1, 914444809, '2024-11-16', '15:30:00', 'hello', 9, 'Bridal Mehendi', '2024-11-16 01:44:03', '', '', '2024-11-16 01:44:03', 1),
(183, 1, 537140049, '2024-11-17', '15:30:00', 'hffs', 5, 'Charcoal Facemask', '2024-11-16 01:44:03', '', '', '2024-11-16 01:44:03', 1),
(184, 1, 561731616, '2024-11-16', '15:30:00', 'hgfdf', 5, 'Charcoal Facemask', '2024-11-16 01:44:03', '', '', '2024-11-16 01:44:03', 1),
(185, 1, 564592157, '2024-11-17', '15:30:00', 'gdf', 5, 'Charcoal Facemask', '2024-11-16 01:44:03', '', '', '2024-11-16 01:44:03', 1),
(186, 1, 125665483, '2024-11-17', '15:30:00', 'hello', 11, 'heena', '2024-11-16 01:47:05', 'hey', 'Selected', '2024-11-16 01:47:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Phone` bigint(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Message` mediumtext NOT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `FirstName`, `LastName`, `Phone`, `Email`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(1, 'swasti', 'g', 9876543210, 'swasti@gmail.com', 'hey', '2024-10-02 11:25:59', 0),
(2, 'swasti', 'hg', 987654045, 'swasti@gmail.com', 'heyy', '2024-11-15 15:44:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

CREATE TABLE `tblinvoice` (
  `id` int(11) NOT NULL,
  `Userid` int(11) NOT NULL,
  `ServiceId` int(11) NOT NULL,
  `BillingId` int(11) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`id`, `Userid`, `ServiceId`, `BillingId`, `PostingDate`) VALUES
(1, 1, 1, 817172959, '2024-10-02 11:36:48'),
(2, 1, 11, 152933959, '2024-10-03 11:54:05'),
(3, 1, 6, 811177364, '2024-10-08 07:12:27'),
(4, 1, 7, 811177364, '2024-10-08 07:12:27'),
(5, 1, 8, 811177364, '2024-10-08 07:12:27'),
(6, 1, 11, 811177364, '2024-10-08 07:12:28'),
(7, 1, 22, 587058508, '2024-10-08 07:13:01'),
(8, 1, 23, 587058508, '2024-10-08 07:13:01'),
(9, 1, 24, 587058508, '2024-10-08 07:13:01'),
(10, 1, 7, 881800718, '2024-10-20 03:42:13'),
(11, 1, 11, 881800718, '2024-10-20 03:42:13'),
(12, 1, 18, 881800718, '2024-10-20 03:42:13'),
(13, 1, 20, 226229709, '2024-10-20 03:42:53'),
(14, 1, 21, 226229709, '2024-10-20 03:42:54'),
(15, 1, 22, 226229709, '2024-10-20 03:42:54'),
(16, 1, 23, 226229709, '2024-10-20 03:42:54'),
(17, 1, 24, 226229709, '2024-10-20 03:42:54'),
(18, 5, 1, 424297270, '2024-11-13 15:49:13'),
(19, 9, 1, 305478876, '2024-11-15 17:50:32'),
(20, 10, 6, 531368626, '2024-11-16 01:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '        Our main focus is on quality and hygiene. Our Beauty Heaven is well equipped with advanced technology equipments and provides best quality services with best products of diiferent brands. Our staff is well trained and experienced, offering advanced services in Skin, Hair and Body Shaping that will provide you with a luxurious experience that leave you feeling relaxed and stress free. The specialities in the parlour are, apart from regular bleachings and Facials, many types of hairstyles, Bridal and cine make-up and different types of Facials &amp; fashion hair colourings.', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', 'panauti-10,kavre', 'Onlinebeautyheaven@gmail.com', 9862634944, NULL, '10 am to 7 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `Stock` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `purchase_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `description`, `Stock`, `category`, `image`, `price`, `purchase_count`) VALUES
(1, 'MISERWE Skin Scrubber', 'facial cleansing tool that uses high-frequency vibrations to deep clean the skin, exfoliate, remove blackheads and dead skin.', 0, 'skincare', '295552a19b7f20b4bed3402b931c6b291730277135.png', 100, 0),
(2, 'Snails Sunscreen BB & CC Cream', 'multifunctional BB and CC cream that combines the benefits of skincare and makeup. ', 0, 'skincare', '903b6b4c350cdcc000cbb815a7e1ee7f1730277815.png', 18, 19),
(3, 'Coconut Milk Anti-Breakage Serum', ' leave-in hair treatment that helps strengthen and hydrate hair, leaving it looking healthy and glowing. ', 0, 'haircare', 'ba91c5acdd9d492f079d60caabfc4c1d1730277945.png', 10, 15),
(4, 'Lucky You', 'floral and fruity fragrance with notes of citrus, flowers, sandalwood, amber, and musk.', 0, 'fragrances', 'a9d4c262b686f1a326936e550474e8c71730278473.png', 17, 0),
(5, 'CeraVe Daily Moisturizing Lotion', 'lightweight, oil-free moisturizer that provides 24-hour hydration for normal to dry skin', 0, 'skincare', 'c1744755402352aa92e671a7483073f21730278583.png', 10, 20),
(6, 'e.l.f.', 'nourishing face primer infused with cannabis sativa seed oil', 0, 'skincare', 'b9016cfa44e6466765cbe3c7b80313081730279544.png', 10, 1),
(7, 'Mamaearth Glow Serum Foundation', 'lightweight serum foundation infused with Vitamin C and Turmeric, providing buildable coverage and a dewy finish', 0, 'makeup', 'd821c11b03de9ee318d80d3e87ccce0b1730280692.png', 10, 1),
(8, ' Live Luxe', 'fruity-floral fragrance for women', 0, 'fragrances', 'd630669f0f81a020425878df80b31a051730281252.png', 10, 12),
(9, 'Biotin & Collagen Shampoo and Conditioner', ' add volume and thickness to hair', 0, 'haircare', '65f32f24b374903c0a4f20548a499f701730281373.png', 10, 12),
(10, ' Michael Kors Wonderlust', 'a floral fragrance for women that blends luxurious blossoms with spicy notes', 0, 'fragrances', 'e447203c607668f8dd5340d326062c301730281454.png', 20, 0),
(11, 'abc', 'gd', 5, 'skincare', '11fc8eabc0733fde0e1ef2daef51008b1731237885.png', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `ID` int(255) NOT NULL,
  `ServiceName` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `ServiceDescription` varchar(255) NOT NULL,
  `Cost` int(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `service_count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`ID`, `ServiceName`, `category`, `ServiceDescription`, `Cost`, `Image`, `service_count`) VALUES
(1, 'Hair color', 'haircolor', 'Changing hair color', 20, '7527cfd49ac10295139eaae69e69d2ac1729436896.png', 7),
(2, 'Facial', 'facial', 'Close-up image of young woman getting anti-aging face treatment ', 50, '657a264aa2c89b80092dd238962853961729438032.png', 5),
(3, 'Facial Massage', 'facial', 'woman getting anti-aging face-lifting massage', 10, '6919d1bd347bb1c8f497f174e09a6d201729439198.png', 6),
(4, 'Hair Cut', 'haircut', ' offers both style and versatility, making it a popular choice for those looking to refresh their look', 50, '74ea393c7b6b593ada50e98b6a84b79d1729470704.jpg', 2),
(5, 'Charcoal Facemask', 'facial', 'deeply cleanses and detoxifies the skin, drawing out impurities and excess oil for a refreshed, radiant complexion', 50, '0de1e2ef68d19c12a8a4c6d6aff320621729470869.jpg', 6),
(6, 'Fruit Facial', 'facial', 'refreshes your skin using natural fruits to make it glow and look healthy', 20, 'b5dd317716f9e0e959d9dbe0b68933931729470996.jpg', 1),
(7, 'Pedicure', 'pedicure', 'cleans and softens your feet for a fresh and smooth feel', 20, 'afb844a993072bfc50c8c26ca97f79701729472000.jpg', 2),
(8, 'Menicure', 'menicure', 'cleaning, shaping, and moisturizing treament for hands and nails', 30, '5214207290728ef68c40d76791079ca31729472142.jpg', 3),
(9, 'Bridal Mehendi', 'heena', 'creating a stunning and traditional look for the special day', 20, '62fd8d7b8d19f789be1c7879146ab53c1729480226.png', 1),
(11, 'heena', 'heena', 'test', 20, '4c46ce6369e9f389892e7591a32d49201729481016.png', 1),
(12, 'Bridal Makeup', 'makeup', 'enhancing the natural beauty, ensuring you look radiant and stunning on your wedding day', 20, '6822b1b4e3c569e7a2db2c497f8ff24f1729481410.png', 3),
(18, 'asa', 'menicure', 'hgdhg', 10, '42e3090647b138a335b14ca9b1e8db381730335175.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `MobileNumber` bigint(10) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Password` varchar(120) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `Address`, `RegDate`) VALUES
(1, 'swasti', 'g', 9876543210, 'swasti@gmail.com', 'bf24f78289327346388bf9524a5d81b6', NULL, '2024-10-06 05:03:16'),
(2, 'sneha', 'guragain', 9876043765, 'sneha@gmail.com', '76281d4a9faf68bbce161cb21c3ce1f4', NULL, '2024-10-09 02:26:07'),
(3, 'srijal', 'guragain', 9862634944, 'srijal@gmail.com', '58473047ef3e92872dbcc678c47bd8c6', NULL, '2024-10-17 08:45:29'),
(4, 'abc', 'def', 9807050408, 'abc@gmail.com', 'b3f947379e88aab49c26f395aa0ebaee', 'panauti', '2024-10-21 05:11:57'),
(5, '', '', 9807698754, 'abcdef@gmail.com', '', '', '2024-11-06 08:18:28'),
(6, 'gfh', 'gfdh', 0, 'abg@gmail.com', 'abcd', 'fdsh', '2024-11-06 08:19:01'),
(7, 'ram', 'ram', 1, 'ram@gmail.com', '3db66ceb605c1bcb779c63e180c4f2d0', 'jh', '2024-11-09 06:14:18'),
(8, 'sam', 'sam', 9876543218, 'sam@gmail.com', 'ba0e7885b32f0b4b52c51de350069a2f', 'gdg', '2024-11-09 06:17:52'),
(9, 'ghgh', 'yf', 9756342321, 'gfh@gmail', '76d80224611fc919a5d54f0ff9fba446', 'gd', '2024-11-09 06:21:51'),
(10, 'puja', 'aa', 0, 'puja@gmail.com', 'puja@123', 'panauti', '2024-11-16 01:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `purchase_order_name` varchar(255) NOT NULL,
  `status` enum('Completed','Expired','User canceled','Failed') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_id`, `amount`, `purchase_order_name`, `status`, `created_at`) VALUES
(1, 'SEMyv63yGGsba7D2Q4xZS6', 1000.00, 'Lucky You', 'Completed', '2024-10-12 02:34:20'),
(2, 'SEMyv63yGGsba7D2Q4xZS6', 1000.00, 'Lucky You', 'Completed', '2024-10-12 02:34:21'),
(3, 'SEMyv63yGGsba7D2Q4xZS6', 1000.00, 'Lucky You', 'Completed', '2024-10-12 02:34:21'),
(4, 'SEMyv63yGGsba7D2Q4xZS6', 1000.00, 'Lucky You', 'Completed', '2024-10-12 02:34:29'),
(5, 'SEMyv63yGGsba7D2Q4xZS6', 1000.00, 'Lucky You', 'Completed', '2024-10-12 02:34:58'),
(6, 'SEMyv63yGGsba7D2Q4xZS6', 1000.00, 'Lucky You', 'Completed', '2024-10-12 02:36:00'),
(7, 'SEMyv63yGGsba7D2Q4xZS6', 1000.00, 'Lucky You', 'Completed', '2024-10-12 02:36:01'),
(8, 'SEMyv63yGGsba7D2Q4xZS6', 1000.00, 'Lucky You', 'Completed', '2024-10-12 02:36:01'),
(9, 'SEMyv63yGGsba7D2Q4xZS6', 1000.00, 'Lucky You', 'Completed', '2024-10-12 02:36:02'),
(10, '58tyDTL3Lbp9KMXQhQrvPa', 1000.00, 'Lucky You', 'Completed', '2024-10-12 02:36:36'),
(11, '58tyDTL3Lbp9KMXQhQrvPa', 1000.00, 'Lucky You', 'Completed', '2024-10-12 02:37:15'),
(12, '58tyDTL3Lbp9KMXQhQrvPa', 1000.00, 'Lucky You', 'Completed', '2024-10-12 02:39:31'),
(13, '58tyDTL3Lbp9KMXQhQrvPa', 1000.00, 'Lucky You', 'Completed', '2024-10-12 02:40:38'),
(14, 'DBfEpwc2UMHGMhoX9Lsm3f', 1000.00, 'Mascara', 'Completed', '2024-10-12 02:41:16'),
(15, 'DBfEpwc2UMHGMhoX9Lsm3f', 1000.00, 'Mascara', 'Completed', '2024-10-12 02:42:29'),
(16, 'DBfEpwc2UMHGMhoX9Lsm3f', 1000.00, 'Mascara', 'Completed', '2024-10-12 02:42:30'),
(17, 'DBfEpwc2UMHGMhoX9Lsm3f', 1000.00, 'Mascara', 'Completed', '2024-10-12 02:42:30'),
(18, 'DBfEpwc2UMHGMhoX9Lsm3f', 1000.00, 'Mascara', 'Completed', '2024-10-12 02:42:30'),
(19, 'DBfEpwc2UMHGMhoX9Lsm3f', 1000.00, 'Mascara', 'Completed', '2024-10-12 02:42:31'),
(20, 'DBfEpwc2UMHGMhoX9Lsm3f', 1000.00, 'Mascara', 'Completed', '2024-10-12 02:42:31'),
(21, 'DBfEpwc2UMHGMhoX9Lsm3f', 1000.00, 'Mascara', 'Completed', '2024-10-12 02:42:31'),
(22, 'h5hMRrYCsRDnJzjNYjr62D', 1000.00, 'e.l.f.', 'Completed', '2024-10-12 02:43:28'),
(23, 'DZiYV5t76Q94uYWkrTbXRG', 1000.00, 'Jennifer Lopez', 'Completed', '2024-10-12 02:46:51'),
(24, 'DZiYV5t76Q94uYWkrTbXRG', 1000.00, 'Jennifer Lopez', 'Completed', '2024-10-12 02:47:01'),
(25, 'DZiYV5t76Q94uYWkrTbXRG', 1000.00, 'Jennifer Lopez', 'Completed', '2024-10-12 02:47:07'),
(26, 'DZiYV5t76Q94uYWkrTbXRG', 1000.00, 'Jennifer Lopez', 'Completed', '2024-10-12 02:48:00'),
(27, 'vw3stwFvxw5iHVwCuojFLH', 2000.00, 'Michael Kors', 'Completed', '2024-10-12 02:56:20'),
(28, 'vw3stwFvxw5iHVwCuojFLH', 2000.00, 'Michael Kors', 'Completed', '2024-10-12 02:56:52'),
(29, 'vw3stwFvxw5iHVwCuojFLH', 2000.00, 'Michael Kors', 'Completed', '2024-10-12 02:58:02'),
(30, 'vw3stwFvxw5iHVwCuojFLH', 2000.00, 'Michael Kors', 'Completed', '2024-10-12 02:58:03'),
(31, '2WhWA9DtR6PDMNXJ9bUDW5', 1000.00, 'Mario Badescu', 'Completed', '2024-10-12 02:58:46'),
(32, '2WhWA9DtR6PDMNXJ9bUDW5', 1000.00, 'Mario Badescu', 'Completed', '2024-10-12 02:59:16'),
(33, '2WhWA9DtR6PDMNXJ9bUDW5', 1000.00, 'Mario Badescu', 'Completed', '2024-10-12 02:59:17'),
(34, '2WhWA9DtR6PDMNXJ9bUDW5', 1000.00, 'Mario Badescu', 'Completed', '2024-10-12 02:59:17'),
(35, '2WhWA9DtR6PDMNXJ9bUDW5', 1000.00, 'Mario Badescu', 'Completed', '2024-10-12 02:59:17'),
(36, 'GttxqHk8WoV98kMVgMgrPL', 1000.00, 'Lucky You', 'Completed', '2024-10-12 02:59:52'),
(37, 'GttxqHk8WoV98kMVgMgrPL', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:01:22'),
(38, 'GttxqHk8WoV98kMVgMgrPL', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:01:24'),
(39, 'GttxqHk8WoV98kMVgMgrPL', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:01:24'),
(40, 'GttxqHk8WoV98kMVgMgrPL', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:01:24'),
(41, 'GttxqHk8WoV98kMVgMgrPL', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:01:25'),
(42, 'GttxqHk8WoV98kMVgMgrPL', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:01:25'),
(43, 'GZhcAphZaJbZN7YuhUv6eN', 1000.00, 'Snail BB Cream', 'Completed', '2024-10-12 03:03:17'),
(44, 'ZBCiJtaNijrCkMBPDfvyuj', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:14:09'),
(45, 'ZBCiJtaNijrCkMBPDfvyuj', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:14:21'),
(46, 'ZBCiJtaNijrCkMBPDfvyuj', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:16:11'),
(47, 'ZBCiJtaNijrCkMBPDfvyuj', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:16:12'),
(48, 'ZBCiJtaNijrCkMBPDfvyuj', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:16:12'),
(49, 'ZBCiJtaNijrCkMBPDfvyuj', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:16:13'),
(50, 'ZBCiJtaNijrCkMBPDfvyuj', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:16:13'),
(51, 'ZBCiJtaNijrCkMBPDfvyuj', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:16:13'),
(52, 'ZBCiJtaNijrCkMBPDfvyuj', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:16:14'),
(53, 'jVekmCgFqD6EtLdxiGA5SM', 1000.00, 'Mascara', 'Completed', '2024-10-12 03:16:57'),
(54, 'jVekmCgFqD6EtLdxiGA5SM', 1000.00, 'Mascara', 'Completed', '2024-10-12 03:18:23'),
(55, 'jVekmCgFqD6EtLdxiGA5SM', 1000.00, 'Mascara', 'Completed', '2024-10-12 03:18:24'),
(56, 'jVekmCgFqD6EtLdxiGA5SM', 1000.00, 'Mascara', 'Completed', '2024-10-12 03:21:52'),
(57, 'jVekmCgFqD6EtLdxiGA5SM', 1000.00, 'Mascara', 'Completed', '2024-10-12 03:21:54'),
(58, 'ML7tWUKgjnb4i3kM98BUXn', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:22:32'),
(59, 'ML7tWUKgjnb4i3kM98BUXn', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:25:53'),
(60, 'ML7tWUKgjnb4i3kM98BUXn', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:25:54'),
(61, 'ML7tWUKgjnb4i3kM98BUXn', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:25:55'),
(62, 'ML7tWUKgjnb4i3kM98BUXn', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:25:55'),
(63, 'ML7tWUKgjnb4i3kM98BUXn', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:25:55'),
(64, 'ML7tWUKgjnb4i3kM98BUXn', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:25:55'),
(65, 'ML7tWUKgjnb4i3kM98BUXn', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:25:55'),
(66, 'ML7tWUKgjnb4i3kM98BUXn', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:25:56'),
(67, 'ML7tWUKgjnb4i3kM98BUXn', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:27:05'),
(68, 'ML7tWUKgjnb4i3kM98BUXn', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:28:46'),
(69, 'SJonUHNdcZ3KyxFM47odY2', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:29:19'),
(70, 'XoFLf37VEpQsYjcJzq5NJh', 1000.00, 'Michael Kors', 'Completed', '2024-10-12 03:31:05'),
(71, 'XoFLf37VEpQsYjcJzq5NJh', 1000.00, 'Michael Kors', 'Completed', '2024-10-12 03:31:10'),
(72, 'XoFLf37VEpQsYjcJzq5NJh', 1000.00, 'Michael Kors', 'Completed', '2024-10-12 03:32:08'),
(73, 'vqR7zRtVm3DyW29WyMznyB', 1000.00, 'Mascara', 'Completed', '2024-10-12 03:35:21'),
(74, 'ocYsxDmyKq6fiamBUUybsJ', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:39:22'),
(75, 'ocYsxDmyKq6fiamBUUybsJ', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:39:29'),
(76, 'ocYsxDmyKq6fiamBUUybsJ', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:42:00'),
(77, 'nSNrmhyGFp9A6cwarPkqyY', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:44:08'),
(78, 'nSNrmhyGFp9A6cwarPkqyY', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:44:13'),
(79, 'uZ33AjSjZt9YADYoJadFpb', 1000.00, 'Jennifer Lopez', 'Completed', '2024-10-12 03:45:21'),
(80, 'Dg64ZErBUuU8La3MZpZM6C', 1000.00, 'Jennifer Lopez', 'Completed', '2024-10-12 03:46:39'),
(81, 'Dg64ZErBUuU8La3MZpZM6C', 1000.00, 'Jennifer Lopez', 'Completed', '2024-10-12 03:46:44'),
(82, 'Dg64ZErBUuU8La3MZpZM6C', 1000.00, 'Jennifer Lopez', 'Completed', '2024-10-12 03:49:44'),
(83, 'Dg64ZErBUuU8La3MZpZM6C', 1000.00, 'Jennifer Lopez', 'Completed', '2024-10-12 03:49:46'),
(84, 'uurGZgeoKjREB3WNfUEpT9', 1000.00, 'CeraVe', 'Completed', '2024-10-12 03:50:24'),
(85, 'uurGZgeoKjREB3WNfUEpT9', 1000.00, 'CeraVe', 'Completed', '2024-10-12 03:50:52'),
(86, 'fa2fcMk3PSZruwhbjmSHKj', 1000.00, 'CeraVe', 'Completed', '2024-10-12 03:52:22'),
(87, 'UqWjA5nVYaVxa7DCM7bsR4', 1000.00, 'Lucky You', 'Completed', '2024-10-12 03:54:40'),
(88, 'yCMMXSN9ctBRY2E387mBVE', 1000.00, 'e.l.f.', 'Completed', '2024-10-12 03:55:53'),
(89, '5eP44U2RVDqhnonWTYiFuY', 1000.00, 'Snail BB Cream', 'Completed', '2024-10-12 03:56:32'),
(90, 'DBf5apN5i5Jatg7TZbqu8j', 1000.00, 'e.l.f.', 'Completed', '2024-10-12 03:59:10'),
(91, 'DBf5apN5i5Jatg7TZbqu8j', 1000.00, 'e.l.f.', 'Completed', '2024-10-12 03:59:20'),
(92, 'DBf5apN5i5Jatg7TZbqu8j', 1000.00, 'e.l.f.', 'Completed', '2024-10-12 03:59:25'),
(93, 'Pi2Yub4d2waXiEVz32Mndc', 4000.00, 'e.l.f.', 'Completed', '2024-10-12 04:01:46'),
(94, 'Pi2Yub4d2waXiEVz32Mndc', 4000.00, 'e.l.f.', 'Completed', '2024-10-12 04:02:02'),
(95, '77i2o9vq5Raw3UYo6SRKLJ', 1000.00, 'CeraVe', 'Completed', '2024-10-12 04:03:01'),
(96, 'zN8Nm3ntwkjJbAyJkgTJMM', 1000.00, 'Lucky You', 'Completed', '2024-10-15 14:23:37'),
(97, 'fTWhyf4ntUWin9d4YuGZXg', 2000.00, 'Jennifer Lopez', 'Completed', '2024-10-16 11:43:49'),
(98, 'GZ2p6QG3jJQbyMEqX2qXj6', 2000.00, 'Mamaearth Foundation, Lucky You', 'Completed', '2024-10-16 14:29:03'),
(99, 'bRLt7nmXkWT7Q8mYa5kduA', 3000.00, 'Lucky You', 'Completed', '2024-10-16 14:31:08'),
(100, 'xpd2TMsMGNYeN4a8dgCXf4', 1000.00, 'Mamaearth Foundation', 'Completed', '2024-10-16 14:56:54'),
(101, 'UuJSFsd8YSTvJ4RqPz5W54', 1000.00, 'Lucky You', 'Completed', '2024-10-16 15:16:53'),
(102, '26rTpor8iueDvuaGx3dviH', 2000.00, 'Jennifer Lopez', 'Completed', '2024-10-16 15:23:41'),
(103, '4PYdnurNtwS5twU2GXPKnX', 2000.00, 'CeraVe', 'Completed', '2024-10-16 15:41:19'),
(104, 'bZNMGGGJiwpiQts9grWyNP', 1000.00, 'Mario Badescu', 'Completed', '2024-10-16 15:47:01'),
(105, 'aXvofLAyqdPXdLFBgB2U8U', 1000.00, 'Michael Kors', 'Completed', '2024-10-16 16:02:56'),
(106, 'zss6po5M7LxoU98mNKuC67', 1000.00, 'e.l.f.', 'Completed', '2024-10-16 16:10:54'),
(107, 'Rd5vr5dJU8qm6kUgsJPL6S', 1000.00, 'e.l.f.', 'Completed', '2024-10-16 16:19:03'),
(108, 'N6oEZqt2Wn9E7e9KW8CrZH', 1000.00, 'Jennifer Lopez', 'Completed', '2024-10-17 06:18:48'),
(109, 'N6oEZqt2Wn9E7e9KW8CrZH', 1000.00, 'Jennifer Lopez', 'Completed', '2024-10-17 06:20:29'),
(110, 'oiWrX5w3xxGGnmLGwigmmm', 1000.00, 'Jennifer Lopez', 'Completed', '2024-10-17 06:21:17'),
(111, 'bdgr2osGw5pBsT3LB9e4jH', 1000.00, 'Lucky You', 'Completed', '2024-10-17 06:22:30'),
(112, 'bdgr2osGw5pBsT3LB9e4jH', 1000.00, 'Lucky You', 'Completed', '2024-10-17 06:22:38'),
(113, 'GfeH4hF4KWkvKDDBPh6t4C', 1000.00, 'Michael Kors', 'Completed', '2024-10-17 06:25:32'),
(114, 'GfeH4hF4KWkvKDDBPh6t4C', 1000.00, 'Michael Kors', 'Completed', '2024-10-17 06:27:09'),
(115, '6MDDHq7P2oidqhcQfSxvCU', 1000.00, 'Jennifer Lopez', 'Completed', '2024-10-17 06:33:56'),
(116, '7djNDUqxkbAZvzqFkVKZjU', 1000.00, 'Mario Badescu', 'Completed', '2024-10-17 06:39:17'),
(117, '7djNDUqxkbAZvzqFkVKZjU', 1000.00, 'Mario Badescu', 'Completed', '2024-10-17 06:40:18'),
(118, '7djNDUqxkbAZvzqFkVKZjU', 1000.00, 'Mario Badescu', 'Completed', '2024-10-17 06:40:22'),
(119, '7djNDUqxkbAZvzqFkVKZjU', 1000.00, 'Mario Badescu', 'Completed', '2024-10-17 06:41:15'),
(120, '7djNDUqxkbAZvzqFkVKZjU', 1000.00, 'Mario Badescu', 'Completed', '2024-10-17 06:42:29'),
(121, '7djNDUqxkbAZvzqFkVKZjU', 1000.00, 'Mario Badescu', 'Completed', '2024-10-17 06:42:30'),
(122, '7djNDUqxkbAZvzqFkVKZjU', 1000.00, 'Mario Badescu', 'Completed', '2024-10-17 06:42:31'),
(123, '7djNDUqxkbAZvzqFkVKZjU', 1000.00, 'Mario Badescu', 'Completed', '2024-10-17 06:42:31'),
(124, '7djNDUqxkbAZvzqFkVKZjU', 1000.00, 'Mario Badescu', 'Completed', '2024-10-17 06:42:32'),
(125, '7djNDUqxkbAZvzqFkVKZjU', 1000.00, 'Mario Badescu', 'Completed', '2024-10-17 06:43:39'),
(126, '7djNDUqxkbAZvzqFkVKZjU', 1000.00, 'Mario Badescu', 'Completed', '2024-10-17 06:43:40'),
(127, '7djNDUqxkbAZvzqFkVKZjU', 1000.00, 'Mario Badescu', 'Completed', '2024-10-17 06:43:40'),
(128, '7djNDUqxkbAZvzqFkVKZjU', 1000.00, 'Mario Badescu', 'Completed', '2024-10-17 06:43:47'),
(129, '7djNDUqxkbAZvzqFkVKZjU', 1000.00, 'Mario Badescu', 'Completed', '2024-10-17 06:43:48'),
(130, '7djNDUqxkbAZvzqFkVKZjU', 1000.00, 'Mario Badescu', 'Completed', '2024-10-17 06:43:49'),
(131, '7djNDUqxkbAZvzqFkVKZjU', 1000.00, 'Mario Badescu', 'Completed', '2024-10-17 06:43:59'),
(132, 'Ls5rTrShj4LNWKCcnoTodJ', 1000.00, 'Lucky You', 'Completed', '2024-10-17 06:49:46'),
(133, 'Ls5rTrShj4LNWKCcnoTodJ', 1000.00, 'Lucky You', 'Completed', '2024-10-17 06:51:12'),
(134, 'DKvXkSNrLoXiBUUxeHfJwi', 1000.00, 'Michael Kors', 'Completed', '2024-10-17 06:53:40'),
(135, 'o3FRrfnH8weM3X46wYsiBL', 1000.00, 'Lucky You', 'Completed', '2024-10-17 06:59:54'),
(136, 'nocRf7AUxnbnSnfETFJESA', 1000.00, 'Michael Kors', 'Completed', '2024-10-17 07:02:12'),
(137, 'WVYRxGZ2fpu7Tw4GcDS8BF', 1000.00, 'Mario Badescu', 'Completed', '2024-10-17 07:07:00'),
(138, 'fENbNmPEfNZDpC3RxL7cmQ', 1000.00, 'Biotin ', 'Completed', '2024-10-17 07:07:45'),
(139, 'e9kGhFbbMQk2Ex5cGfauhX', 1000.00, 'e.l.f.', 'Completed', '2024-10-17 07:08:28'),
(140, 'vFDKQ5fyr7d6qSDHz7Kg39', 1000.00, 'Lucky You', 'Completed', '2024-10-17 07:18:46'),
(141, 'Z4G8yJvD7zn8X4cBpyRHYR', 6000.00, 'Lucky You', 'Completed', '2024-10-17 07:46:47'),
(142, 'XKFGkriidKjPsiUThz7MnP', 4000.00, 'Lucky You', 'Completed', '2024-10-17 07:50:03'),
(143, 'yMXtpUH2hC8WYhQiwQJgiJ', 1000.00, 'Lucky You', 'Completed', '2024-10-17 07:57:12'),
(144, 'kbBKo6LhLQooYCj9kqVfkd', 7000.00, 'Snail BB Cream', 'Completed', '2024-10-17 08:37:29'),
(145, 'f62Xfvugk7TQ9HZbBRyG5S', 6000.00, 'Snail BB Cream', 'Completed', '2024-10-17 08:38:51'),
(146, 'w3ArQm6VRGaZYj5BvnUU2m', 1000.00, 'Snail BB Cream', 'Completed', '2024-10-17 08:41:07'),
(147, 'CrMeWEuGx8NjbQCfQLK2gA', 2000.00, 'Snail BB Cream', 'Completed', '2024-10-17 08:42:30'),
(148, '8micKBV5e6cqoJsK7kjniF', 2000.00, 'Jennifer Lopez, Mamaearth Foundation', 'Completed', '2024-10-17 09:40:28'),
(149, 'n9gxE8VP4nysdEze3S5ih7', 2000.00, 'e.l.f.', 'Completed', '2024-10-17 09:44:35'),
(150, 'dHgNpKmhTGtDRX96VgQKRW', 1000.00, 'Biotin ', 'Completed', '2024-10-17 14:14:32'),
(151, 'Fpe6SgkSy9pBMoUNfQMfHN', 2000.00, 'Snail BB Cream', 'Completed', '2024-10-19 05:15:52'),
(152, 'vfgR47h3da97FTM8MTdzBa', 7000.00, 'e.l.f., CeraVe', 'Completed', '2024-10-19 05:17:54'),
(153, 'WEcdpui8x3rXUsfcjTLJAf', 1000.00, 'Mamaearth Foundation', 'Completed', '2024-10-20 11:48:42'),
(154, 'ko466iypexDkDiUqaQnePi', 2000.00, 'Biotin ', 'Completed', '2024-10-21 07:07:00'),
(155, 'LnHn95rNTRrJehPQFpRqMA', 2000.00, 'Lucky You, CeraVe', 'Completed', '2024-10-21 11:06:21'),
(156, 'XdQxHtqTviPRrLhjpWqDKU', 2000.00, 'Snail BB Cream', 'Completed', '2024-10-23 03:23:31'),
(157, 'gvR3vYWRRTEG8qCMpsRCdQ', 1600.00, 'oo', 'Completed', '2024-10-29 02:46:55'),
(158, 'wKiUYDtr76ZFgRKRYRj9LQ', 5600.00, 'uu', 'Completed', '2024-10-30 06:57:43'),
(159, '85GxezwTiZzTnbHxo8h2B3', 11200.00, 'uu', 'Completed', '2024-10-30 07:05:07'),
(160, 'MaojqkcYv6LVSY6aQuK23c', 22400.00, 'uu', 'Completed', '2024-10-30 07:13:55'),
(161, '8k4kTFQJykn9Bd5e74t5xK', 11200.00, 'uu', 'Completed', '2024-10-30 07:17:53'),
(162, '5FrG58v5XBxJxHZSRbuBa7', 1600.00, 'oo', 'Completed', '2024-10-30 07:23:53'),
(163, '6yHzXwfGnZxRvV8JYFWt8g', 11200.00, 'uu', 'Completed', '2024-10-30 07:29:11'),
(164, 'pVm8vyKxx9JcjCqNGKuANd', 3000.00, 'Jennifer Lopez, Lucky You', 'Completed', '2024-10-30 07:46:19'),
(165, 'HbtSyaE6aXQTrJw7H4B5Wh', 5600.00, 'uu', 'Completed', '2024-10-30 08:01:15'),
(166, 'JidDDWC4FqipcgV2dABbLL', 5400.00, 'Snails Sunscreen BB ', 'Completed', '2024-10-30 08:49:04'),
(167, 'hwg6FP7xnrmgGU9bxZtXiW', 19800.00, 'Snails Sunscreen BB ', 'Completed', '2024-10-30 08:50:24'),
(168, 'isTqc5JzyHguj5Ao3YwktR', 13000.00, 'CeraVe Daily Moisturizing Lotion', 'Completed', '2024-10-30 09:00:30'),
(169, '8qJCDwpR3dfR39hJDg7huY', 12000.00, 'Live Luxe', 'Completed', '2024-10-31 00:47:32'),
(170, 'p96k4HSFkHPY5SJk2CXwDQ', 3600.00, 'Snails Sunscreen BB ', 'Completed', '2024-11-06 05:57:48'),
(171, 'SJCqSaN2Xjh5KZ2yHnbmze', 2000.00, 'CeraVe Daily Moisturizing Lotion, Biotin ', 'Completed', '2024-11-09 04:27:15'),
(172, 'p79wbA5opS6FEimd8KUgAD', 2000.00, 'Coconut Milk Anti-Breakage Serum, CeraVe Daily Moisturizing Lotion', 'Completed', '2024-11-15 17:48:12'),
(173, 'ZzN2KmmKpyUhqMfGFu4C9L', 11000.00, 'Biotin ', 'Completed', '2024-11-15 18:28:41'),
(174, 'yytVduzBrtBhWWF8yRWE4U', 2000.00, 'Mamaearth Glow Serum Foundation', 'Completed', '2024-11-16 01:45:47'),
(175, 'xtE6kYJfNbE6Q5phZ6Sk2e', 13000.00, 'Coconut Milk Anti-Breakage Serum', 'Completed', '2024-11-16 06:02:16'),
(176, 'jVekmCgFqD6EtLdxiGA5SM', 1000.00, 'Mascara', 'Completed', '2025-02-06 16:54:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbook`
--
ALTER TABLE `tblbook`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD CONSTRAINT `tbladmin_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `tblservices` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
