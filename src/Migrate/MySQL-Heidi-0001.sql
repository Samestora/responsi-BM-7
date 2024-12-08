-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for kanban_app_php_mvc
CREATE DATABASE IF NOT EXISTS `Bayern` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `Bayern`;

-- Dumping structure for table kanban_app_php_mvc.accounts
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` CHAR(36) NOT NULL,
  `role_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table kanban_app_php_mvc.accounts: ~0 rows (approximately)

-- Dumping structure for table kanban_app_php_mvc.funds
CREATE TABLE IF NOT EXISTS `funds` (
  `balance` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table kanban_app_php_mvc.funds: ~1 rows (approximately)
INSERT INTO `funds` (`balance`) VALUES
	(1000000);

-- Dumping structure for table kanban_app_php_mvc.players
CREATE TABLE IF NOT EXISTS `players` (
  `id` int NOT NULL,
  `position` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `jersey` int NOT NULL,
  `value` bigint NOT NULL,
  `team_id` int NOT NULL,
  `is_foreign` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `team_id` (`team_id`),
  CONSTRAINT `players_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table kanban_app_php_mvc.players: ~19 rows (approximately)
INSERT INTO `players` (`id`, `position`, `name`, `jersey`, `value`, `team_id`, `is_foreign`) VALUES
	(1, 'Goalkeeper', 'Manuel Neuer', 1, 4000000, 1, 0),
	(2, 'Goalkeeper', 'Daniel Peretz', 18, 3100000, 1, 0),
	(3, 'Goalkeeper', 'Sven Ulreich', 26, 1600000, 1, 0),
	(4, 'Defender', 'Dayot Upamecano', 2, 30900000, 1, 0),
	(5, 'Defender', 'Minjae Kim', 3, 34300000, 1, 0),
	(6, 'Defender', 'Alphonso Davies', 19, 41100000, 1, 0),
	(7, 'Defender', 'Hiroki Ito', 21, 21600000, 1, 0),
	(8, 'Defender', 'Raphaël Guerreiro', 22, 15800000, 1, 0),
	(9, 'Defender', 'Tarek Buchmann', 28, 600000, 1, 0),
	(10, 'Midfielder', 'Joshua Kimmich', 6, 39100000, 1, 0),
	(11, 'Midfielder', 'Leon Goretzka', 8, 19500000, 1, 0),
	(12, 'Midfielder', 'Konrad Laimer', 27, 26100000, 1, 0),
	(13, 'Midfielder', 'Jamal Musiala', 42, 107300000, 1, 0),
	(14, 'Forward', 'Serge Gnabry', 7, 26700000, 1, 0),
	(15, 'Forward', 'Kingsley Coman', 11, 32000000, 1, 0),
	(16, 'Forward', 'Harry Kane', 9, 107400000, 1, 0),
	(17, 'Forward', 'Leroy Sané', 10, 43100000, 1, 0),
	(18, 'Forward', 'Mathys Tel', 39, 34700000, 1, 0),
	(19, 'Forward', 'Thomas Müller', 25, 14700000, 1, 0);

-- Dumping structure for table kanban_app_php_mvc.revenue
CREATE TABLE IF NOT EXISTS `revenue` (
  `id` int NOT NULL,
  `source` varchar(255) NOT NULL,
  `amount` bigint NOT NULL,
  `player_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `player_id` (`player_id`),
  CONSTRAINT `revenue_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table kanban_app_php_mvc.revenue: ~0 rows (approximately)

-- Dumping structure for table kanban_app_php_mvc.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table kanban_app_php_mvc.roles: ~2 rows (approximately)
INSERT INTO `roles` (`id`, `name`) VALUES
	(0, 'Manager'),
	(1, 'User');

-- Dumping structure for table kanban_app_php_mvc.teams
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `origin` char(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table kanban_app_php_mvc.teams: ~0 rows (approximately)
INSERT INTO `teams` (`id`, `name`, `origin`) VALUES
	(1, 'Bayern München', 'GER');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
