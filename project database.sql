-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: dif
-- ------------------------------------------------------
-- Server version	5.7.20-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `gebruiker`
--

DROP TABLE IF EXISTS `gebruiker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gebruiker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL DEFAULT '',
  `naam` varchar(20) DEFAULT '',
  `wachtwoord` varchar(60) NOT NULL DEFAULT '',
  `type` varchar(15) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gebruiker`
--

LOCK TABLES `gebruiker` WRITE;
/*!40000 ALTER TABLE `gebruiker` DISABLE KEYS */;
INSERT INTO `gebruiker` VALUES (10,'test','test','$2y$11$eTA1183i4iEnSpkLa7elgurZ0QkmOcVYjVRpKRWpbF9mMBi2qk9O2','1'),(11,'test1','test1','$2y$11$U3/ZlJWzz6wfoNPR5cdhxetSENtfKGgJ/KII379lHa2KxUxR6z2cu','0'),(12,'rene@gmail.com','rene','$2y$11$czEdtwUrylxOewKGALeDa.UXLIixRIZVTdXmEpTMjDlFKapwfoDmS','0');
/*!40000 ALTER TABLE `gebruiker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gebruiker_tel`
--

DROP TABLE IF EXISTS `gebruiker_tel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gebruiker_tel` (
  `gebruiker` int(11) NOT NULL,
  `telefoonnummer` int(11) NOT NULL,
  PRIMARY KEY (`telefoonnummer`),
  KEY `a` (`gebruiker`),
  CONSTRAINT `a` FOREIGN KEY (`gebruiker`) REFERENCES `gebruiker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gebruiker_tel`
--

LOCK TABLES `gebruiker_tel` WRITE;
/*!40000 ALTER TABLE `gebruiker_tel` DISABLE KEYS */;
/*!40000 ALTER TABLE `gebruiker_tel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservering`
--

DROP TABLE IF EXISTS `reservering`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservering` (
  `nummer` varchar(10) NOT NULL,
  `datum` date NOT NULL,
  `gebruiker` varchar(30) NOT NULL DEFAULT '',
  `tijd` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`nummer`,`datum`,`gebruiker`,`tijd`) KEY_BLOCK_SIZE=4,
  CONSTRAINT `reservering_ibfk_2` FOREIGN KEY (`nummer`) REFERENCES `room` (`nummer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservering`
--

LOCK TABLES `reservering` WRITE;
/*!40000 ALTER TABLE `reservering` DISABLE KEYS */;
INSERT INTO `reservering` VALUES ('DIF1.01','1115-01-01','test1','12:00-13:00'),('DIF1.01','1212-01-02','test','9:00-10:00'),('DIF1.01','1212-12-12','test','9:00-10:00'),('DIF1.01','1515-01-01','test','9:00-10:00'),('DIF1.01','1515-01-02','test','16:00-17:00'),('DIF2.01','1111-01-01','test1','10:00-11:00'),('DIF3.01','1414-10-10','test1','9:00-10:00');
/*!40000 ALTER TABLE `reservering` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
  `nummer` varchar(10) NOT NULL,
  `stoelen` int(11) NOT NULL,
  `tafels` int(11) NOT NULL,
  `beamer` varchar(3) NOT NULL,
  `stopcontacten` varchar(3) NOT NULL,
  PRIMARY KEY (`nummer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES ('DIF1.01',1,2,'Ja','Nee'),('DIF2.01',2,1,'Nee','Ja'),('DIF3.01',3,0,'Ja','Nee');
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-25 12:10:27
