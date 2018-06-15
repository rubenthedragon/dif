# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.16)
# Database: dif
# Generation Time: 2018-06-15 14:18:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table gebruiker
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gebruiker`;

CREATE TABLE `gebruiker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL DEFAULT '',
  `naam` varchar(20) DEFAULT '',
  `wachtwoord` varchar(60) NOT NULL DEFAULT '',
  `type` varchar(15) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `gebruiker` WRITE;
/*!40000 ALTER TABLE `gebruiker` DISABLE KEYS */;

INSERT INTO `gebruiker` (`id`, `email`, `naam`, `wachtwoord`, `type`)
VALUES
	(4,'test','test','$2y$11$PDIsV8DzqllCrGG6qVcWmuicPqHogL2/VHTz9HNAvKAaJlyYe7lBe','');

/*!40000 ALTER TABLE `gebruiker` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table gebruiker_tel
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gebruiker_tel`;

CREATE TABLE `gebruiker_tel` (
  `gebruiker` int(11) NOT NULL,
  `telefoonnummer` int(11) NOT NULL,
  PRIMARY KEY (`telefoonnummer`),
  KEY `a` (`gebruiker`),
  CONSTRAINT `a` FOREIGN KEY (`gebruiker`) REFERENCES `gebruiker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table reservering
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reservering`;

CREATE TABLE `reservering` (
  `nummer` varchar(10) NOT NULL,
  `datum` date NOT NULL,
  `gebruiker` varchar(30) NOT NULL DEFAULT '',
  `tijd` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`nummer`,`datum`,`gebruiker`,`tijd`) KEY_BLOCK_SIZE=4,
  CONSTRAINT `reservering_ibfk_2` FOREIGN KEY (`nummer`) REFERENCES `room` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `reservering` WRITE;
/*!40000 ALTER TABLE `reservering` DISABLE KEYS */;

INSERT INTO `reservering` (`nummer`, `datum`, `gebruiker`, `tijd`)
VALUES
	('DIF1.01','1111-11-11','test','10:00-11:00'),
	('DIF1.01','1111-11-11','test','9:00-10:00');

/*!40000 ALTER TABLE `reservering` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table room
# ------------------------------------------------------------

DROP TABLE IF EXISTS `room`;

CREATE TABLE `room` (
  `nummer` varchar(10) NOT NULL,
  `stoelen` int(11) NOT NULL,
  `tafels` int(11) NOT NULL,
  `beamer` varchar(3) NOT NULL,
  `stopcontacten` varchar(3) NOT NULL,
  PRIMARY KEY (`nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;

INSERT INTO `room` (`nummer`, `stoelen`, `tafels`, `beamer`, `stopcontacten`)
VALUES
	('DIF1.01',1,2,'Ja','Nee'),
	('DIF2.01',2,1,'Nee','Ja'),
	('DIF3.01',3,0,'Ja','Nee');

/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
