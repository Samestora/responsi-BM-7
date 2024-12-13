-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2024 at 11:39 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bayern`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `role_id`, `name`, `email`, `password`) VALUES
('45c94f21-6971-4afe-8ace-a64951176487', 0, 'Vincent Kompany', 'vincent@tuta.mail', '$2y$10$PHoU8AqECDXKJqlDLzuoJeJi/oJy9ufLpeFXYkYg.w4SliQwojOim');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` char(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `origin`) VALUES
(0, 'Free Agent', 'NON'),
(1, 'Bayern München', 'GER'),
(2, 'Manchester City', 'GBR'),
(3, 'Paris Saint-Germain', 'FRA');

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `balance` bigint NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `funds`
--

INSERT INTO `funds` (`balance`, `id`) VALUES
(100000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jersey` int NOT NULL,
  `value` bigint NOT NULL,
  `club_id` int NOT NULL,
  `is_foreign` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `position`, `name`, `jersey`, `value`, `club_id`, `is_foreign`) VALUES
(1, 'Goalkeeper', 'Manuel Neuer', 1, 4000000, 1, 0),
(2, 'Goalkeeper', 'Daniel Peretz', 18, 3100000, 1, 0),
(3, 'Goalkeeper', 'Sven Ulreich', 26, 1600000, 1, 0),
(4, 'Centre-Back', 'Dayot Upamecano', 2, 30900000, 1, 0),
(5, 'Centre-Back', 'Min-jae Kim', 3, 34300000, 1, 0),
(6, 'Left-Back', 'Alphonso Davies', 19, 41100000, 1, 0),
(7, 'Centre-Back', 'Hiroki Ito', 21, 21600000, 1, 0),
(8, 'Left-Back', 'Raphaël Guerreiro', 22, 15800000, 1, 0),
(9, 'Centre-Back', 'Tarek Buchmann', 28, 600000, 1, 0),
(10, 'Defensive Midfield', 'Joshua Kimmich', 6, 39100000, 1, 0),
(11, 'Central Midfield', 'Leon Goretzka', 8, 19500000, 1, 0),
(12, 'Central Midfield', 'Konrad Laimer', 27, 26100000, 1, 0),
(13, 'Attacking Midfield', 'Jamal Musiala', 42, 107300000, 1, 0),
(14, 'Right Winger', 'Serge Gnabry', 7, 26700000, 1, 0),
(15, 'Left Winger', 'Kingsley Coman', 11, 32000000, 1, 0),
(16, 'Centre-Forward', 'Harry Kane', 9, 107400000, 1, 0),
(17, 'Right Winger', 'Leroy Sané', 10, 43100000, 1, 0),
(18, 'Left Winger', 'Mathys Tel', 39, 34700000, 1, 0),
(19, 'Second Striker', 'Thomas Müller', 25, 14700000, 1, 0),
(20, 'Goalkeeper', 'Ederson', 31, 35000000, 2, 1),
(21, 'Goalkeeper', 'Stefan Ortega', 18, 9000000, 2, 1),
(22, 'Goalkeeper', 'Scott Carson', 33, 200000, 2, 1),
(23, 'Centre-Back', 'Rúben Dias', 3, 80000000, 2, 1),
(24, 'Centre-Back', 'Manuel Akanji', 25, 45000000, 2, 1),
(25, 'Centre-Back', 'Nathan Aké', 6, 40000000, 2, 1),
(26, 'Centre-Back', 'John Stones', 5, 38000000, 2, 1),
(27, 'Centre-Back', 'Jahmai Simpson-Pusey', 66, 0, 2, 1),
(28, 'Left-Back', 'Josko Gvardiol', 24, 75000000, 2, 1),
(29, 'Left-Back', 'Josh Wilson-Esbrand', 97, 4000000, 2, 1),
(30, 'Right-Back', 'Rico Lewis', 82, 40000000, 2, 1),
(31, 'Right-Back', 'Kyle Walker', 2, 13000000, 2, 1),
(32, 'Defensive Midfield', 'Rodri', 16, 130000000, 2, 1),
(33, 'Central Midfield', 'Matheus Nunes', 27, 40000000, 2, 1),
(34, 'Central Midfield', 'Mateo Kovacic', 8, 30000000, 2, 1),
(35, 'Central Midfield', 'İlkay Gündoğan', 19, 12000000, 2, 1),
(36, 'Attacking Midfield', 'Bernardo Silva', 20, 70000000, 2, 1),
(37, 'Attacking Midfield', 'Kevin De Bruyne', 17, 45000000, 2, 1),
(38, 'Attacking Midfield', 'James McAtee', 87, 12000000, 2, 1),
(39, 'Left Winger', 'Jérémy Doku', 11, 65000000, 2, 1),
(40, 'Left Winger', 'Jack Grealish', 10, 55000000, 2, 1),
(41, 'Right Winger', 'Phil Foden', 47, 150000000, 2, 1),
(42, 'Right Winger', 'Savinho', 26, 50000000, 2, 1),
(43, 'Right Winger', 'Oscar Bobb', 52, 25000000, 2, 1),
(44, 'Centre-Forward', 'Erling Haaland', 9, 200000000, 2, 1),
(45, 'Goalkeeper', 'Gianluigi Donnarumma', 1, 40000000, 3, 1),
(46, 'Goalkeeper', 'Matvey Safonov', 39, 20000000, 3, 1),
(47, 'Goalkeeper', 'Arnau Tenas', 80, 5000000, 3, 1),
(48, 'Centre-Back', 'Marquinhos', 5, 50000000, 3, 1),
(49, 'Centre-Back', 'Willian Pacho', 51, 40000000, 3, 1),
(50, 'Centre-Back', 'Lucas Beraldo', 35, 30000000, 3, 1),
(51, 'Centre-Back', 'Milan Skriniar', 37, 20000000, 3, 1),
(52, 'Centre-Back', 'Presnel Kimpembe', 3, 9000000, 3, 1),
(53, 'Left-Back', 'Nuno Mendes', 25, 55000000, 3, 1),
(54, 'Left-Back', 'Lucas Hernández', 21, 40000000, 3, 1),
(55, 'Right-Back', 'Achraf Hakimi', 2, 60000000, 3, 1),
(56, 'Right-Back', 'Yoram Zague', 42, 2500000, 3, 1),
(57, 'Right-Back', 'Naoufel El Hannach', 45, 0, 3, 1),
(58, 'Defensive Midfield', 'João Neves', 87, 60000000, 3, 1),
(59, 'Central Midfield', 'Warren Zaïre-Emery', 33, 60000000, 3, 1),
(60, 'Central Midfield', 'Vitinha', 17, 55000000, 3, 1),
(61, 'Central Midfield', 'Fabián Ruiz', 8, 35000000, 3, 1),
(62, 'Central Midfield', 'Senny Mayulu', 24, 5000000, 3, 1),
(63, 'Central Midfield', 'Ayman Kari', 44, 4000000, 3, 1),
(64, 'Attacking Midfield', 'Kang-in Lee', 19, 25000000, 3, 1),
(65, 'Left Winger', 'Bradley Barcola', 29, 65000000, 3, 1),
(66, 'Left Winger', 'Désiré Doué', 14, 40000000, 3, 1),
(67, 'Right Winger', 'Ousmane Dembélé', 10, 60000000, 3, 1),
(68, 'Right Winger', 'Marco Asensio', 11, 20000000, 3, 1),
(69, 'Right Winger', 'Ibrahim Mbaye', 49, 2000000, 3, 1),
(70, 'Centre-Forward', 'Gonçalo Ramos', 9, 50000000, 3, 1),
(71, 'Centre-Forward', 'Randal Kolo Muani', 23, 40000000, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `revenue`
--

CREATE TABLE `revenue` (
  `id` int NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` bigint NOT NULL,
  `player_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(0, 'Manager'),
(1, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `revenue`
--
ALTER TABLE `revenue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`);

--
-- Constraints for table `revenue`
--
ALTER TABLE `revenue`
  ADD CONSTRAINT `revenue_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
