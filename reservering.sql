# Dump of table reservering
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reservering`;

CREATE TABLE `reservering` (
  `nummer` varchar(10) NOT NULL,
  `datum` date NOT NULL,
  `gebruiker` int(11) NOT NULL,
  `tijd` time NOT NULL,
  PRIMARY KEY (`nummer`,`datum`,`gebruiker`,`tijd`) KEY_BLOCK_SIZE=4,
  KEY `gebruiker` (`gebruiker`),
  CONSTRAINT `reservering_ibfk_1` FOREIGN KEY (`gebruiker`) REFERENCES `gebruiker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `reservering_ibfk_2` FOREIGN KEY (`nummer`) REFERENCES `room` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
