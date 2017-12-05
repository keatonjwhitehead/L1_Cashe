-- MySQL dump 10.16  Distrib 10.1.29-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: l1_cashe
-- ------------------------------------------------------
-- Server version	10.1.29-MariaDB

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
-- Table structure for table `Hint`
--

DROP TABLE IF EXISTS `Hint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Hint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hintname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locat_lat` double NOT NULL,
  `locat_long` double NOT NULL,
  `points` int(11) DEFAULT NULL,
  `creator_username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_hint` int(11) DEFAULT NULL,
  `next_hint_desc` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `treasure_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_hint` (`hintname`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Hint`
--

LOCK TABLES `Hint` WRITE;
/*!40000 ALTER TABLE `Hint` DISABLE KEYS */;
INSERT INTO `Hint` VALUES (1,'Hint 1',40.0060405,-105.26148099999999,10,'suso4455@colorado.edu',2,'','Which one?','lolo',1),(2,'Hint 2',40.0502623,-105.04998169999999,10,'suso4455@colorado.edu',3,'','What','lol',1),(3,'third',40.006192999999996,-105.2613667,100,'suso4455@colorado.edu',0,'','Who?','me',1);
/*!40000 ALTER TABLE `Hint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `History`
--

DROP TABLE IF EXISTS `History`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `History` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `solver_username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `treasure_id` int(11) DEFAULT NULL,
  `hint_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `History`
--

LOCK TABLES `History` WRITE;
/*!40000 ALTER TABLE `History` DISABLE KEYS */;
INSERT INTO `History` VALUES (1,'suso4455@colorado.edu',NULL,2);
/*!40000 ALTER TABLE `History` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Treasure`
--

DROP TABLE IF EXISTS `Treasure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Treasure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `treasurename` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locat_long` double NOT NULL,
  `locat_lat` double NOT NULL,
  `points` int(11) DEFAULT NULL,
  `creator_username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solver_username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Treasure`
--

LOCK TABLES `Treasure` WRITE;
/*!40000 ALTER TABLE `Treasure` DISABLE KEYS */;
INSERT INTO `Treasure` VALUES (1,'What is my name?','Suyog','Treasure 1',-105.04998169999999,40.0502623,100,'suso4455@colorado.edu',NULL);
/*!40000 ALTER TABLE `Treasure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_user` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'suso4455@colorado.edu','$2y$10$Zht6GHv22tlUkMuI7MqMg.SvZC6omHYNVWpQlW.K1ebR3e6wJUWMm',0),(2,'suyog.soti@gmail.com','$2y$10$6mI3JF52rdWAiKVYL63YX.FqXyTVTxfYz1g97H8qrE1c/JFFLoH1G',10);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-05 14:58:41
