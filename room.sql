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
