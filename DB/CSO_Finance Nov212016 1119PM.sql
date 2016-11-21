CREATE DATABASE  IF NOT EXISTS `cso_finance` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cso_finance`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cso_finance
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.16-MariaDB

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
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity` (
  `activityID` int(11) NOT NULL AUTO_INCREMENT,
  `orgID` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `dateSubmitted` datetime NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `submittedBy` varchar(100) DEFAULT NULL,
  `beginDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `dateDesc` varchar(255) NOT NULL,
  `processType` varchar(100) DEFAULT NULL,
  `PRSno` int(11) DEFAULT NULL,
  `budget` int(11) DEFAULT NULL,
  `particular` varchar(100) DEFAULT NULL,
  `payTo` varchar(100) DEFAULT NULL,
  `PCVno` int(11) DEFAULT NULL,
  `DORno` int(11) DEFAULT NULL,
  `actualRevenue` int(11) DEFAULT NULL,
  `expRevenue` int(11) DEFAULT NULL,
  `expDisburse` int(11) DEFAULT NULL,
  `netIncome` int(11) DEFAULT NULL,
  `FRAno` int(11) DEFAULT NULL,
  PRIMARY KEY (`activityID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity`
--

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
INSERT INTO `activity` VALUES (1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','Wonderwall','sdfsdfsdf','Oasis','0000-00-00','0000-00-00','Specific','RM',919295242,50000,'Yeah','De La Salle Universty',0,0,0,0,0,0,0),(2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','BUT MAYBE','dfsdsdf','YEAH','0000-00-00','0000-00-00','Term Long','COC',534533,5000,'food, venue, transportation','DLSU',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,1,'2016-11-20 10:12:39','0000-00-00 00:00:00','OMAM','adasdasd','OMAM','0000-00-00','0000-00-00','Specific','COC',423423,4111,'food, venue, transportation','DLSU',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,2,'2016-11-20 14:32:29','2016-11-20 14:32:29','AdDestroy','SEARCH AND DESTROY','Society','0000-00-00','0000-00-00','Year Long','DP',9192542,100000000,'food, venue, transportation','De La Salle University',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,2,'2016-11-20 16:38:09','2016-11-20 16:38:09','Just had my','YEAH BOI','LASARE3','2016-11-28','2016-11-28','Term Long','NE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,2,'2016-11-20 16:48:08','2016-11-20 16:48:08','All Star','Gggg Go for the moon.','Smashmouth','2016-11-30','2016-11-30','Term Long','RM',9192542,200000,'Nothing in particular, particular #1','Mark Christian Sanchez',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,2,'2016-11-20 19:39:31','2016-11-20 19:39:31','Wonderwall','BUT MAYBE','Oasis','2016-11-21','2016-11-21','Specific','LEA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,41,'2016-11-20 23:14:32','2016-11-20 23:14:32','Tawa pa','Yeah','Boi','2016-11-22','2016-11-23','Specific','CP',9192524,22,'OO OO OO OO OO OO','De La Salle University',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,5,'2016-11-21 05:11:04','2016-11-21 05:11:04','Hunger','This hunger that isn\'t you.','Of Monsters And Men','2016-11-30','2016-12-10','Year Long','CA',9192424,25000,'food, venue, transportation','De La Salle University',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,2,'2016-11-21 21:06:30','2016-11-21 21:06:30','Sila','Walang Sagoat','Sud','2016-11-30','2016-12-03','Specific','CP',9192523,666,'food, venue, transportation','De La Salle University',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,40,'2016-11-21 21:56:26','2016-11-21 21:56:26','Smilky','Under your eyes in the city lights','Smilky-kun','2016-11-30','2016-12-01','Year Long','LQ',6666666,69,'food, venue, transportation',NULL,NULL,2147483647,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fund`
--

DROP TABLE IF EXISTS `fund`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fund` (
  `fundID` int(11) NOT NULL AUTO_INCREMENT,
  `initBalance` float unsigned DEFAULT '0',
  `netChange` float DEFAULT '0',
  `currBalance` float AS ((`initBalance` - `netChange`)) VIRTUAL,
  PRIMARY KEY (`fundID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fund`
--

LOCK TABLES `fund` WRITE;
/*!40000 ALTER TABLE `fund` DISABLE KEYS */;
INSERT INTO `fund` VALUES (1,10000,0,10000),(2,10000,2500,7500),(3,10000,-20.5,10020.5),(4,0,0,0),(5,0,0,0),(6,0,0,0),(7,0,0,0),(8,0,0,0),(9,0,0,0),(10,0,0,0),(11,0,0,0),(12,0,0,0),(13,0,0,0),(14,0,0,0),(15,0,0,0),(16,0,0,0),(17,0,0,0),(18,0,0,0),(19,0,0,0),(20,0,0,0),(21,0,0,0),(22,0,0,0),(23,0,0,0),(24,0,0,0),(25,0,0,0),(26,0,0,0),(27,0,0,0),(28,0,0,0),(29,0,0,0),(30,0,0,0),(31,0,0,0),(32,0,0,0),(33,0,0,0),(34,0,0,0),(35,0,0,0),(36,0,0,0),(37,0,0,0),(38,0,0,0),(39,0,0,0),(40,0,0,0),(41,0,0,0),(42,0,0,0),(43,0,0,0);
/*!40000 ALTER TABLE `fund` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `notifID` int(11) NOT NULL AUTO_INCREMENT,
  `activityID` int(11) NOT NULL,
  `orgID` int(11) NOT NULL,
  `notifType` varchar(50) NOT NULL,
  `timedate` datetime NOT NULL,
  PRIMARY KEY (`notifID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization`
--

DROP TABLE IF EXISTS `organization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organization` (
  `orgID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `acronym` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fundID` int(11) NOT NULL,
  PRIMARY KEY (`orgID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization`
--

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
INSERT INTO `organization` VALUES (1,'Association of Computer Engineering Students','ACCESS','access@dlsu.edu.ph','access',1),(2,'AdCreate Society','AdCreate','adcreate@dlsu.edu.ph','adcreate',2),(3,'AIESEC-DLSU','AIESEC','aiesec@dlsu.edu.ph','aiesec',3),(4,'The Organization for American Studies Students','AMSTUD','amstud@dlsu.edu.ph','amstud',4),(5,'Business Management Society','BMS','bms@dlsu.edu.ph','bms',5),(6,'Behavioral Science Society','BSS','bss@dlsu.edu.ph','bss',6),(7,'Civil Engineering Society','CES','ces@dlsu.edu.ph','ces',7),(8,'Chemistry Society','ChemSoc','chemsoc@dlsu.edu.ph','chemsoc',8),(9,'Chemical Engineering Society','ChEn','chen@dlsu.edu.ph','chen',9),(10,'Cultura','Cultura','dlsucultura@gmail.com','cultura',10),(11,'Dalubhasaan ng mga Umuusbong na Mag-aaral ng Araling Filipino','DANUM','danum@dlsu.edu.ph','danum',11),(12,'Electronics and Communications Engineering Society','ECES','eces@dlsu.edu.ph','eces',12),(13,'Economics Organization','EconOrg','econorg@dlsu.edu.ph','econorg',13),(14,'ENGLICOM','ENGLICOM','englicom@dlsu.edu.ph','englicom',14),(15,'European Studies Association','ESA','esa@dlsu.edu.ph','esa',15),(16,'Gakuen Anime Soshiki','GAS','gas.dlsu.stc@gmail.com','gas',16),(17,'Industrial Management Engineering Society','IMES','imes@dlsu.edu.ph','imes',17),(18,'Junior Philippine Institute of Accountants','JPIA','jpia@dlsu.edu.ph','jpia',18),(19,'Kapatiran ng Kabataan para sa Kaunlaran','KKK','kkk@dlsu.edu.ph','kkk',19),(20,'Ley La Salle','LSS','leylasalle@dlsu.edu.ph','lss',20),(21,'La Salle Computer Society','LSCS','lscs@dlsu.edu.ph','lscs',21),(22,'Management of Financial Institution Association','MaFIA','mafia@dlsu.edu.ph','mafia',22),(23,'Mathematics Circle','Math Circle','mathcircle@dlsu.edu.ph','mathcircle',23),(24,'Mechanical Engineering Society','MES','mes@dlsu.edu.ph','mes',24),(25,'MOOMEDIA','MOOMEDIA','moomedia@dlsu.edu.ph','moomedia',25),(26,'Nihon Kenkyuu Kai','NKK','nkk@dlsu.edu.ph','nkk',26),(27,'Outdoor Club','OC','outdoor@dlsu.edu.ph','oc',27),(28,'Physics Society','PhySoc','physoc@dlsu.edu.ph','physoc',28),(29,'Samahan ng Lasalayanong Pilosopo','Pilosopo','pilosopo@dlsu.edu.ph','pilosopo',29),(30,'Political Science Society','POLISCY','poliscy@dlsu.edu.ph','poliscy',30),(31,'Rotaract Club of DLSU','ROTARACT','rotaract@dlsu.edu.ph','rotaract',31),(32,'Sociedad de Historia','SDH','sdh@dlsu.edu.ph','sdh',32),(33,'Society of Manufacturing Engineering','SME','sme@dlsu.edu.ph','sme',33),(34,'Samahan ng mga Mag-aaral sa Sikolohiya','SMS','sms@dlsu.edu.ph','sms',34),(35,'Societas Vitae','SV','sv@dlsu.edu.ph','sv',35),(36,'Team Communications','TEAMCOMM','teamcomm@dlsu.edu.ph','teamcomm',36),(37,'United International Student Organization','UNISTO','unisto@dlsu.edu.ph','unisto',37),(38,'Union of Students Inspired Towards Education','UNITED','united@dlsu.edu.ph','united',38),(39,'Writers’ Guild','WG','wg@dlsu.edu.ph','wg',39),(40,'Young Entrepreneurs Society','YES','yes@dlsu.edu.ph','yes',40),(41,'Council of Student Organizations','CSO','cso@dlsu.edu.ph','cso',41);
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remark`
--

DROP TABLE IF EXISTS `remark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `remark` (
  `remarkID` int(11) NOT NULL AUTO_INCREMENT,
  `activityID` int(11) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `revisions` varchar(500) DEFAULT NULL,
  `datePendedCSO` date DEFAULT NULL,
  `CSOremarks` varchar(500) DEFAULT NULL,
  `auditor` varchar(50) DEFAULT NULL,
  `dateAudited` date DEFAULT NULL,
  `encoder` varchar(50) DEFAULT NULL,
  `dateEncoded` date DEFAULT NULL,
  `dateReceivedSLIFE` date DEFAULT NULL,
  `dateReceivedAcc` date DEFAULT NULL,
  `datePendedSLIFE` date DEFAULT NULL,
  `SLIFEremarks` varchar(500) DEFAULT NULL,
  `datePendedAcc` date DEFAULT NULL,
  `AccRemarks` varchar(500) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`remarkID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remark`
--

LOCK TABLES `remark` WRITE;
/*!40000 ALTER TABLE `remark` DISABLE KEYS */;
INSERT INTO `remark` VALUES (1,4,'Approved',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `remark` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-21 23:19:11
