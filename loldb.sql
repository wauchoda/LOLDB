-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
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
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `champion`
--

LOCK TABLES `champion` WRITE;
/*!40000 ALTER TABLE `champion` DISABLE KEYS */;
INSERT INTO `champion` VALUES (1,'Brand','AP','mid'),(3,'Aatrox','AD','Fighter'),(4,'Ahri','AP','Caster'),(5,'Akali','Hybrid','Assassin'),(6,'Alistar','AP','Tank'),(7,'Amumu','AP','Tank'),(8,'Anivia','AP','Caster'),(9,'Annie','AP','Caster'),(10,'Ashe','AD','Marksmen'),(11,'Azir','AP','Caster'),(12,'Bard','AP','Support'),(13,'Blitzcrank','AP','Tank'),(14,'Braum','AP','Support'),(15,'Caitlyn','AD','Marksmen'),(16,'Cassiopeia','AP','Caster'),(17,'Cho\'Gath','AP','Tank'),(18,'Corki','AD','Marksmen'),(19,'Darius','AD','Fighter'),(20,'Diana','AP','Fighter'),(21,'Dr. Mundo','AD','Fighter'),(22,'Draven','AD','Marksmen'),(23,'Ekko','AP','Assassin'),(24,'Elise','AP','Caster'),(25,'Evelynn','AP','Assassin'),(26,'Ezreal','AD','Marksmen'),(27,'Fiddlesticks','AP','Caster'),(28,'Fiora','AD','Fighter'),(29,'Fizz','AP','Assassin'),(30,'Galio','AP','Tank'),(31,'Gangplank','AD','Fighter'),(32,'Garen','AD','Fighter'),(33,'Gnar','AD','Fighter'),(34,'Gragas','AP','Fighter'),(35,'Graves','AD','Marksmen'),(36,'Hecarim','AD','Fighter'),(37,'Heimerdinger','AP','Caster'),(38,'Illaoi','AD','Fighter'),(39,'Irelia','AD','Fighter'),(40,'Jax','AD','Fighter'),(41,'Jayce','AD','Fighter'),(42,'Jinx','AD','Fighter'),(43,'Kalista','AD','Fighter'),(44,'Karma','AP','Caster'),(45,'Karthus','AP','Caster'),(46,'Kassadin','AP','Assassin'),(47,'Katarina','AP','Assassin'),(48,'Kayle','AP','Fighter'),(49,'Kennen','AP','Caster'),(50,'Kha\'Zix','AD','Assassin'),(51,'Kindred','AD','Marksmen'),(52,'Kog\'Maw','AD','Marksmen'),(53,'LeBlanc','AP','Caster'),(54,'Lee Sin','AD','Fighter'),(55,'Leona','AD','Tank'),(56,'Lissandra','AP','Caster'),(57,'Lucian','AD','Marksmen'),(58,'Lulu','AP','Support'),(59,'Lux','AP','Caster'),(60,'Malphite','AP','Tank'),(61,'Malzahar','AP','Caster'),(62,'Maokai','AP','Tank'),(63,'Master Yi','AD','Fighter'),(64,'Miss Fortune','AD','Marksmen'),(65,'Mordekaiser','AP','Fighter'),(66,'Morgana','AP','Caster'),(67,'Nami','AP','Support'),(68,'Nasus','AD','Fighter'),(69,'Nautilus','AP','Tank'),(70,'Nidalee','AP','Assassin'),(71,'Nocturne','AD','Assassin'),(72,'Nunu','AP','Support'),(73,'Olaf','AD','Fighter'),(74,'Orianna','AP','Caster'),(75,'Pantheon','AD','Fighter'),(76,'Poppy','AD','Fighter'),(77,'Quinn','AD','Marksmen'),(78,'Rammus','AP','Tank'),(79,'Rek\'Sai','AD','Fighter'),(80,'Renekton','AD','Fighter'),(81,'Rengar','AD','Assassin'),(82,'Riven','AD','Fighter'),(83,'Rumble','AP','Fighter'),(84,'Ryze','AP','Caster'),(85,'Sejuani','AP','Tank'),(86,'Shaco','AD','Assassin'),(87,'Shen','AD','Tank'),(88,'Shyvana','AD','Fighter'),(89,'Singed','AP','Tank'),(90,'Sion','AD','Tank'),(91,'Sivir','AD','Marksmen'),(92,'Skarner','AD','Fighter'),(93,'Sona','AP','Support'),(94,'Soraka','AP','Support'),(95,'Swain','AP','Caster'),(96,'Syndra','AP','Caster'),(97,'Tahm Kench','AP','Support'),(98,'Talon','AD','Assassin'),(99,'Taric','AP','Support'),(100,'Teemo','AP','Marksmen'),(101,'Thresh','AP','Support'),(102,'Tristana','AD','Marksmen'),(103,'Trundle','AD','Fighter'),(104,'Tryndamere','AD','Fighter'),(105,'Twisted Fate','AP','Caster'),(106,'Twitch','AD','Caster'),(107,'Udyr','AD','Fighter'),(108,'Urgot','AD','Marksmen'),(109,'Varus','AD','Marksmen'),(110,'Vayne','AD','Marksmen'),(111,'Veigar','AP','Caster'),(112,'Vel\'Kolz','AP','Caster'),(113,'Vi','AD','Fighter'),(114,'Viktor','AP','Caster'),(115,'Vladimir','AP','Caster'),(116,'Volibear','AD','Fighter'),(117,'Warwick','AD','Fighter'),(118,'Wukong','AD','Fighter'),(119,'Xerath','AP','Caster'),(120,'Xin Zhao','AD','Fighter'),(121,'Yasuo','AD','Fighter'),(122,'Yorick','Hybrid','Fighter'),(123,'Zac','AP','Tank'),(124,'Zed','AD','Assassin'),(125,'Ziggs','AP','Caster'),(126,'Zilean','AP','Support'),(127,'Zyra','AP','Caster'),(128,'Jarvan IV','AD','Tank');
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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matchhist`
--

LOCK TABLES `matchhist` WRITE;
/*!40000 ALTER TABLE `matchhist` DISABLE KEYS */;
INSERT INTO `matchhist` VALUES (6,'manticore','Jinx',0,1,8,0,76,0),(7,'manticore','Graves',1,5,0,7,133,0),(8,'manticore','Kog\'Maw',1,12,3,2,177,0),(9,'manticore','Kog\'Maw',1,4,6,12,175,0),(10,'manticore','Kog\'Maw',1,3,3,12,125,0),(11,'manticore','Ashe',1,6,11,18,182,0),(12,'manticore','Kog\'Maw',0,0,5,1,103,0),(13,'manticore','Kog\'Maw',1,11,4,16,191,0),(14,'manticore','Kog\'Maw',0,5,3,5,236,0),(15,'manticore','LeBlanc',0,6,4,3,115,0),(16,'manticore','Graves',0,10,9,12,316,0),(17,'manticore','Kog\'Maw',0,8,7,11,184,0),(18,'manticore','LeBlanc',0,6,3,5,91,0),(19,'manticore','Veigar',1,5,4,3,82,0),(20,'manticore','Garen',0,2,6,1,112,0),(21,'manticore','Blitzcrank',1,2,2,13,22,1),(22,'manticore','Brand',0,10,8,6,123,1),(23,'manticore','Veigar',0,3,2,1,87,1),(24,'manticore','Ryze',0,2,7,7,109,1),(25,'manticore','Veigar',1,10,7,13,180,1),(26,'twoacestwo8s','Shyvana',0,1,7,0,81,0),(28,'twoacestwo8s','Maokai',1,2,2,15,51,0),(30,'twoacestwo8s','Jarvan IV',1,1,1,13,42,0),(31,'twoacestwo8s','Braum',1,3,3,15,49,0),(32,'twoacestwo8s','Maokai',1,7,3,15,42,0),(33,'twoacestwo8s','Vi',1,19,0,4,179,0),(34,'twoacestwo8s','Sion',0,8,10,11,158,0),(35,'twoacestwo8s','Garen',1,22,2,8,254,0),(36,'twoacestwo8s','Nasus',0,2,2,6,235,0),(37,'twoacestwo8s','Wukong',1,8,2,9,97,0),(38,'twoacestwo8s','Jarvan IV',0,14,7,13,188,0),(39,'twoacestwo8s','Maokai',1,8,7,25,120,0),(40,'twoacestwo8s','Jarvan IV',0,1,3,1,47,0),(41,'twoacestwo8s','Maokai',1,3,5,26,69,0),(42,'twoacestwo8s','Maokai',1,6,0,17,53,0),(43,'twoacestwo8s','Thresh',0,1,6,17,69,0),(44,'twoacestwo8s','Nautilus',1,9,5,21,68,0),(45,'twoacestwo8s','Annie',1,6,6,6,29,0),(46,'twoacestwo8s','Maokai',1,4,5,19,99,0),(47,'twoacestwo8s','Jarvan IV',1,7,7,26,143,0);
/*!40000 ALTER TABLE `matchhist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `playerunavgs`
--

DROP TABLE IF EXISTS `playerunavgs`;
/*!50001 DROP VIEW IF EXISTS `playerunavgs`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `playerunavgs` AS SELECT 
 1 AS `username`,
 1 AS `avg(kills)`,
 1 AS `avg(deaths)`*/;
SET character_set_client = @saved_cs_client;

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
INSERT INTO `user` VALUES (1,'manticore','thelevimatusproject@gmail.com','test'),(2,'twoacestwo8s','twoacestwo8s@gmail.com','test');
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
-- Final view structure for view `playerunavgs`
--

/*!50001 DROP VIEW IF EXISTS `playerunavgs`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `playerunavgs` AS select `matchhist`.`username` AS `username`,avg(`matchhist`.`kills`) AS `avg(kills)`,avg(`matchhist`.`deaths`) AS `avg(deaths)` from `matchhist` where (`matchhist`.`ranked` = 0) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

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

-- Dump completed on 2015-12-05 17:46:08
