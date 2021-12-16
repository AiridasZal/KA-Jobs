-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2021 m. Grd 16 d. 11:46
-- Server version: 5.7.25
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobly`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `gallery`
--

CREATE TABLE `gallery` (
  `galleryId` int(11) NOT NULL,
  `jobsId` int(11) NOT NULL,
  `imageFullName` varchar(128) NOT NULL,
  `galleryOrder` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `gallery`
--

INSERT INTO `gallery` (`galleryId`, `jobsId`, `imageFullName`, `galleryOrder`) VALUES
(4, 1, '61bb00982ada68.83516074.jpg', '1'),
(5, 1, '61bb00dd9bab75.12175101.jpg', '2'),
(6, 1, '61bb010ab3f8e1.06120337.jpg', '3'),
(7, 2, '61bb030a175d90.85068967.jpg', '1'),
(8, 2, '61bb03fa8159d4.88241936.jpg', '2'),
(9, 2, '61bb0416b25758.57353869.jpeg', '3'),
(10, 3, '61bb06562fa539.22708589.jpg', '1'),
(11, 3, '61bb06aa01e498.88125614.jpg', '2'),
(12, 3, '61bb071f5a63b9.30978559.jpg', '3');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `jobs`
--

CREATE TABLE `jobs` (
  `jobsId` int(11) NOT NULL,
  `usersId` int(11) NOT NULL,
  `jobsTitle` varchar(128) NOT NULL,
  `jobsLocation` varchar(128) NOT NULL,
  `jobsPrice` varchar(128) NOT NULL,
  `jobsCategory` varchar(128) NOT NULL,
  `jobsSubCategory` varchar(300) NOT NULL,
  `jobsDesc` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `jobs`
--

INSERT INTO `jobs` (`jobsId`, `usersId`, `jobsTitle`, `jobsLocation`, `jobsPrice`, `jobsCategory`, `jobsSubCategory`, `jobsDesc`) VALUES
(1, 1, 'Žolės pjovimas', 'Vilnius', '9.99', 'fizinis darbas', 'a', 'Žolės pjovimas Vilniuje, Antakalnio rajone egzistuojanti g. 3. Mano telefono numeris 86666666'),
(2, 1, 'Sniego kasimas', 'Alytus', '20', 'fizinis darbas', 'aaaa', 'Sniego kasimas Alytuje, Visgirio rajone tilto g. 3. Mano telefono numeris 865789659'),
(3, 1, 'Obuolių rinkimas', 'Kauno raj.', '15', 'fizinis darbas', 'aaaa', 'Obuolių rinkimas nuo medžio Kauno raj. Obelių kaime pušų g. 3. Mano telefono numeris +37065144759'),
(4, 1, 'Žolės pjovimas', 'Klaipėda', '9.99', 'fizinis darbas', 'aa', 'Žolės pjovimas Klaipėdoje, Antakalnio rajone egzistuojanti g. 3. Mano telefono numeris 86666666');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES
(1, 'Hubertas', 'hubertas.kl@gmail.com', 'Harbertas', '$2y$10$XV9dQYszRBf0VNql8Khw5utNFRHCA.KzRqNwZ0REDGYYWjoMHKc.K'),
(2, 'Petras Kurys', 'petro@gmail.com', 'Petras', '$2y$10$ZkAQAO9L8OeqK0htL0LJ3eQbr7gcKCSjspQcNVz.uknQLgmpzEuS6'),
(3, 'Antanas Antanauskas', 'randomemail@gmail.com', 'Antanas', '$2y$10$nXgmfzcMSba0U4KyJfGpzuvc7dEfc/3L/Tkn1jhVqpR5vfxcAgrWy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`galleryId`),
  ADD KEY `jobsId` (`jobsId`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobsId`),
  ADD KEY `usersId` (`usersId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `galleryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Apribojimai eksportuotom lentelėm
--

--
-- Apribojimai lentelei `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`jobsId`) REFERENCES `jobs` (`jobsId`);

--
-- Apribojimai lentelei `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`usersId`) REFERENCES `users` (`usersId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
