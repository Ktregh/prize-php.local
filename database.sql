-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.50 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных db_mine
CREATE DATABASE IF NOT EXISTS `db_mine` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_mine`;


-- Дамп структуры для таблица db_mine.money
CREATE TABLE IF NOT EXISTS `money` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sum` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы db_mine.money: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `money` DISABLE KEYS */;
INSERT INTO `money` (`id`, `sum`) VALUES
	(1, 146961);
/*!40000 ALTER TABLE `money` ENABLE KEYS */;


-- Дамп структуры для таблица db_mine.prize
CREATE TABLE IF NOT EXISTS `prize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prize` text NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы db_mine.prize: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `prize` DISABLE KEYS */;
INSERT INTO `prize` (`id`, `prize`, `quantity`) VALUES
	(1, 'мафон', 498),
	(2, 'телик', 498),
	(3, 'телефон', 500);
/*!40000 ALTER TABLE `prize` ENABLE KEYS */;


-- Дамп структуры для таблица db_mine.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `password` text NOT NULL,
  `bonus` int(11) NOT NULL DEFAULT '0',
  `card` varchar(50) NOT NULL DEFAULT '0',
  `address` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы db_mine.user: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `password`, `bonus`, `card`, `address`) VALUES
	(1, '123', '123', 9559, '1234123412341234', 'Адрес мой');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
