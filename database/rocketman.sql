-- Progettazione Web 
DROP DATABASE if exists rocketman; 
CREATE DATABASE rocketman; 
USE rocketman; 
-- MySQL dump 10.13  Distrib 5.6.20, for Win32 (x86)
--
-- Host: localhost    Database: rocketman
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `stat`
--

DROP TABLE IF EXISTS `stat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `games` int(11) NOT NULL DEFAULT '0',
  `timetot` int(11) NOT NULL DEFAULT '0',
  `best` int(11) NOT NULL DEFAULT '0',
  `bomb` int(11) NOT NULL DEFAULT '0',
  `gun` int(11) NOT NULL DEFAULT '0',
  `jump` int(11) NOT NULL DEFAULT '0',
  `sit` int(11) NOT NULL DEFAULT '0',
  `bombkill` int(11) NOT NULL DEFAULT '0',
  `gunkill` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stat`
--

LOCK TABLES `stat` WRITE;
/*!40000 ALTER TABLE `stat` DISABLE KEYS */;
INSERT INTO `stat` VALUES (1,'alberts96',32,535,292,139,88,46,118,6,26),(2,'greg91',0,0,0,0,0,0,0,0,0),(3,'tore',1,36,36,11,5,2,9,1,0),(4,'jhon',1,83,83,22,15,14,6,1,0),(5,'zerbino',1,6,6,1,1,2,6,1,0),(6,'StrH2O',9,163,60,39,26,11,56,9,0),(7,'jhonny',4,98,56,23,15,4,11,3,1),(8,'elepaga',2,98,67,28,15,12,6,0,2),(9,'argy',0,0,0,0,0,0,0,0,0),(10,'ari96',6,150,94,42,28,3,17,0,6),(11,'daniel_96',2,63,46,16,10,1,7,0,2),(12,'YuriAlbe',2,260,219,77,43,4,51,0,2);
/*!40000 ALTER TABLE `stat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `surname` varchar(60) NOT NULL,
  `nation` varchar(60) NOT NULL DEFAULT 'Italia',
  `birth` date NOT NULL,
  `genre` varchar(10) NOT NULL DEFAULT 'male',
  `first` date NOT NULL,
  `last` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'alberts96','carasau','Carlo Alberto','Carrucciu','italy','1996-04-23','M','0000-00-00','2018-02-17'),(2,'greg91','simo','gregorio','paltrinieri','italy','1991-12-09','F','2018-02-14','2018-02-17'),(3,'tore','flower','Salvatore','Solano','italy','1996-09-21','M','2018-02-14','2018-02-17'),(4,'jhon','gallura','Giovanni ','Fresi','italy','1996-04-23','M','2018-02-14','2018-02-17'),(5,'zerbino','zerbino','Lorenzo','Zerbinati','italy','1970-08-20','M','2018-02-14','2018-02-17'),(6,'StrH2O','carletto','Salvatore','Stracquadanio','italy','1996-12-08','M','2018-02-15','2018-02-17'),(7,'jhonny','begood','Giovanni','Distefano','italy','1997-04-22','F','2018-02-15','2018-02-17'),(8,'elepaga','elepaga','elena','paganucci','italy','1996-07-16','F','2018-02-15','2018-02-17'),(9,'argy','silver','Dario','Argento','italy','1800-02-13','M','2018-02-15','2018-02-17'),(10,'ari96','mangaka','Arianna','Benedetto','italy','1996-07-19','F','2018-02-15','2018-02-17'),(11,'daniel_96','sildan','Daniel','Tolve','italy','1996-03-28','M','2018-02-16','2018-02-17'),(12,'YuriAlbe','Alberini1996','Yuri','Alberini','italy','1996-06-20','M','2018-02-16','2018-02-17');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-17 15:24:39
