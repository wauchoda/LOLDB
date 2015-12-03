-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: loldb
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.8-MariaDB

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
-- Table structure for table `champion`
--

DROP TABLE IF EXISTS `champion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `champion` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `champName` char(30) DEFAULT NULL,
  `DmgType` char(10) DEFAULT NULL,
  `Role` char(10) DEFAULT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `champName` (`champName`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `champion`
--

LOCK TABLES `champion` WRITE;
/*!40000 ALTER TABLE `champion` DISABLE KEYS */;
INSERT INTO `champion` VALUES (1,'Brand','AP','mid'),(3,'Aatrox','AD','Fighter'),(4,'Ahri','AP','Caster'),(5,'Akali','Hybrid','Assassin'),(6,'Alistar','AP','Tank'),(7,'Amumu','AP','Tank'),(8,'Anivia','AP','Caster'),(9,'Annie','AP','Caster'),(10,'Ashe','AD','Marksmen'),(11,'Azir','AP','Caster'),(12,'Bard','AP','Support'),(13,'Blitzcrank','AP','Tank'),(14,'Braum','AP','Support'),(15,'Caitlyn','AD','Marksmen'),(16,'Cassiopeia','AP','Caster'),(17,'Cho\'Gath','AP','Tank'),(18,'Corki','AD','Marksmen'),(19,'Darius','AD','Fighter'),(20,'Diana','AP','Fighter'),(21,'Dr. Mundo','AD','Fighter'),(22,'Draven','AD','Marksmen'),(23,'Ekko','AP','Assassin'),(24,'Elise','AP','Caster'),(25,'Evelynn','AP','Assassin'),(26,'Ezreal','AD','Marksmen'),(27,'Fiddlesticks','AP','Caster'),(28,'Fiora','AD','Fighter'),(29,'Fizz','AP','Assassin'),(30,'Galio','AP','Tank'),(31,'Gangplank','AD','Fighter'),(32,'Garen','AD','Fighter'),(33,'Gnar','AD','Fighter'),(34,'Gragas','AP','Fighter'),(35,'Graves','AD','Marksmen'),(36,'Hecarim','AD','Fighter'),(37,'Heimerdinger','AP','Caster'),(38,'Illaoi','AD','Fighter'),(39,'Irelia','AD','Fighter');
/*!40000 ALTER TABLE `champion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matchhist`
--

DROP TABLE IF EXISTS `matchhist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matchhist` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `champName` char(30) DEFAULT NULL,
  `win` tinyint(1) DEFAULT NULL,
  `kills` int(11) DEFAULT NULL,
  `deaths` int(11) DEFAULT NULL,
  `assists` int(11) DEFAULT NULL,
  `cs` int(11) DEFAULT NULL,
  `ranked` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`gid`),
  KEY `username` (`username`),
  KEY `champName` (`champName`),
  CONSTRAINT `matchhist_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  CONSTRAINT `matchhist_ibfk_2` FOREIGN KEY (`champName`) REFERENCES `champion` (`champName`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matchhist`
--

LOCK TABLES `matchhist` WRITE;
/*!40000 ALTER TABLE `matchhist` DISABLE KEYS */;
INSERT INTO `matchhist` VALUES (1,'manticore','Brand',1,2,22,2,2,0),(2,'manticore','Brand',1,5,5,5,5,1),(4,'twoacestwo8s','Brand',1,100,20,500,500,1),(5,'manticore','Brand',1,5,5,5,5,0);
/*!40000 ALTER TABLE `matchhist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'manticore','thelevimatusproject@gmail.com','test'),(2,'twoacestwo8s','twoacestwo8s@gmail.com','test'),(3,'newb','test','test'),(4,'anthonyD','aemail','test');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `useravgs`
--

DROP TABLE IF EXISTS `useravgs`;
/*!50001 DROP VIEW IF EXISTS `useravgs`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `useravgs` AS SELECT 
 1 AS `username`,
 1 AS `avg(kills)`,
 1 AS `avg(deaths)`,
 1 AS `avg(assists)`,
 1 AS `avg(cs)`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `userrankedstats`
--

DROP TABLE IF EXISTS `userrankedstats`;
/*!50001 DROP VIEW IF EXISTS `userrankedstats`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `userrankedstats` AS SELECT 
 1 AS `champName`,
 1 AS `win`,
 1 AS `kills`,
 1 AS `deaths`,
 1 AS `assists`,
 1 AS `cs`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'loldb'
--

--
-- Dumping routines for database 'loldb'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_createUser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_createUser`(
    IN p_username VARCHAR(20),
    IN p_email VARCHAR(50),
    IN p_password VARCHAR(16)
)
BEGIN
    if ( select exists (select 1 from user where username = p_username) ) THEN
     
        select 'Username Exists !!';
	
    elseif ( select exists (select 1 from user where email = p_email) ) THEN
     
        select 'Email Already in Use!!';
        
    ELSE
     
        insert into user
        (
            username,
            email,
            password
        )
        values
        (
            p_username,
            p_email,
            p_password
        );
     
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `useravgs`
--

/*!50001 DROP VIEW IF EXISTS `useravgs`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `useravgs` AS select `m`.`username` AS `username`,avg(`m`.`kills`) AS `avg(kills)`,avg(`m`.`deaths`) AS `avg(deaths)`,avg(`m`.`assists`) AS `avg(assists)`,avg(`m`.`cs`) AS `avg(cs)` from (`matchhist` `m` join `user` `u`) where ((`m`.`username` = `u`.`username`) and (`m`.`ranked` = 1)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `userrankedstats`
--

/*!50001 DROP VIEW IF EXISTS `userrankedstats`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `userrankedstats` AS select `matchhist`.`champName` AS `champName`,`matchhist`.`win` AS `win`,`matchhist`.`kills` AS `kills`,`matchhist`.`deaths` AS `deaths`,`matchhist`.`assists` AS `assists`,`matchhist`.`cs` AS `cs` from `matchhist` where (`matchhist`.`ranked` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-03 10:55:05
