CREATE DATABASE IF NOT EXISTS `library`;
USE `library`;

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '0',
  `author` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
);

INSERT INTO `books` (`id`, `title`, `author`) VALUES
	(1, 'Neem een geit', 'Claudia de Breij'),
	(3, 'De Gorgels', 'Jochem Myjer'),
	(4, 'Wat ons niet zal doden', 'David Lagercrantz'),
	(5, 'De waanzinnige boomhut', 'Andy Griffiths & Terry Denton '),
	(6, 'Het meisje in de trein', 'Paula Hawkins '),
	(7, 'Hormoonbalans', 'Ralph Moorman'),
	(8, 'Het grote zonder pakjes ', 'Karin Luiten'),
	(9, 'Lieveling', 'Kim van Kooten');