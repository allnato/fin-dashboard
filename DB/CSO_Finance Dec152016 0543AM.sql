CREATE DATABASE  IF NOT EXISTS `cso_finance` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cso_finance`;
-- MySQL dump 10.16  Distrib 10.1.16-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: cso_finance
-- ------------------------------------------------------
-- Server version	10.1.16-MariaDB

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
  `budget` double DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity`
--

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
INSERT INTO `activity` VALUES (22,15,'2016-12-12 06:30:40','2016-12-12 06:30:40','ESA Fund Raising Event','A two-day fund raising event in DLSU-M','John Locke','2016-12-21','2016-12-22','Specific','LQ',143782747,4300,'Food,Transportation, Venue',NULL,NULL,175837467,NULL,NULL,NULL,NULL,NULL),(23,2,'2016-12-12 06:39:30','2016-12-12 06:39:30','Origami 101','Origami Folding 101','Bryan Myers','2016-12-12','2016-12-12','Specific','DP',18746274,1600,'Venue, Materials','Julian Hobbes',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,2,'2016-12-12 06:48:38','2016-12-12 06:48:38','AdCreate Sport','A one week Sport Event in Razon','Henry Townshend','2016-12-20','2016-12-27','Specific','NE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,2,'2016-12-12 06:51:34','2016-12-12 06:51:34','Movie Marathon','Movie Watching!!!','Bobby Fischer','2017-01-06','2017-04-21','Term Long','RM',21857289,3000,'Venue, Food','John Ymir',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,5,'2016-12-12 07:08:13','2016-12-12 07:08:13','BMS Clean up Drive','Clean up Drive in DLSU','Sam Yeager','2016-12-29','2016-12-31','Specific','BT',146274627,4200,'Venue, Food, Transportation','Todd Great',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,18,'2016-12-12 07:11:25','2016-12-12 07:11:25','Katakana 101','Katakana Tutorial in Andrew','Rin Hideyoshi','2016-12-21','2016-12-21','Term Long','DP',15632644,4300,'Papers, many papers','Drake Cobold',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,6,'2016-12-12 07:16:46','2016-12-12 07:16:46','Slav appreciation day','Appreciating Slavs','Ivan Ivanovitch Ivanovsky','2017-01-06','2017-02-04','Term Long','RM',12174827,3000,'Addidas','Boris Yurov',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(31,32,'2016-12-12 07:21:21','2016-12-12 07:21:21','Window Shopping @ MOA','Window Shopping','Greg Morris','2016-12-27','2017-01-06','Term Long','RM',126472617,1000,'Transportion','Hong Kong',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,25,'2016-12-12 07:34:30','2016-12-12 07:34:30','MOOvie Watching','Movie Watching in the Mall of Asia','Allegori Grigori','2016-12-28','2017-01-07','Term Long','RM',13657162,6000,'Movie, Food, Transportation','Hill Jill',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(43,5,'2016-12-14 21:59:48','2016-12-14 21:59:48','Calligraphy Workshop','Calligraphy 101','Jepoy Dizon','2016-12-22','2016-12-30','Year Long','CA',81728373,3000,'Food, Venue','Erika Santos',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `billing`
--

DROP TABLE IF EXISTS `billing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `billing` (
  `billingID` int(11) NOT NULL AUTO_INCREMENT,
  `orgID` int(11) NOT NULL,
  `dateSubmitted` date DEFAULT NULL,
  `orgAcronym` varchar(50) DEFAULT NULL,
  `activityTitle` varchar(100) DEFAULT NULL,
  `activityDate` date DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `payableTo` varchar(100) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Unsettled',
  PRIMARY KEY (`billingID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billing`
--

LOCK TABLES `billing` WRITE;
/*!40000 ALTER TABLE `billing` DISABLE KEYS */;
INSERT INTO `billing` VALUES (1,1,'2016-08-16','ACCESS','General Assembly','2016-08-24',2000,'LCR','Settled'),(2,3,'2016-09-10','AIESEC','Shirt Selling','2016-10-10',1000,'PDFO','Settled'),(3,5,'2016-07-07','BMS','Management Seminar','2016-07-20',1500,'PDFO','Unsettled'),(4,6,'2016-03-30','BSS','General Assembly','2016-04-15',2000,'LCR','Unsettled'),(5,41,'2016-07-11','CSO','Annual Recruitment Week','2016-08-25',3000,'PDFO','Settled'),(6,41,'2016-11-11','CSO','Christmas Party','2016-12-10',2500,'LCR','Unsettled'),(7,10,'2016-01-15','Cultura','Earth Jam','2016-02-13',2000,'PDFO','Unsettled'),(8,20,'2016-05-19','LSS','General Assembly','2016-06-06',1500,'LCR','Settled'),(9,30,'2016-07-09','POLISCY','Lecture on the Philippine Constitution','2016-07-20',1100,'PDFO','Unsettled');
/*!40000 ALTER TABLE `billing` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fund`
--

LOCK TABLES `fund` WRITE;
/*!40000 ALTER TABLE `fund` DISABLE KEYS */;
INSERT INTO `fund` VALUES (1,10000,2000,8000),(2,10000,3500,6500),(3,10000,1000,9000),(4,10000,4200,5800),(5,10000,3000,7000),(6,10000,0,10000),(7,10000,0,10000),(8,10000,0,10000),(9,10000,0,10000),(10,10000,0,10000),(11,10000,0,10000),(12,10000,0,10000),(13,10000,0,10000),(14,10000,0,10000),(15,10000,3500,6500),(16,10000,0,10000),(17,10000,0,10000),(18,10000,750,9250),(19,10000,1500,8500),(20,10000,0,10000),(21,10000,2000,8000),(22,10000,0,10000),(23,10000,850,9150),(24,10000,0,10000),(25,10000,6000,4000),(26,10000,1200,8800),(27,10000,0,10000),(28,10000,0,10000),(29,10000,0,10000),(30,10000,0,10000),(31,10000,0,10000),(32,10000,0,10000),(33,10000,0,10000),(34,10000,0,10000),(35,10000,0,10000),(36,10000,0,10000),(37,10000,0,10000),(38,10000,0,10000),(39,10000,0,10000),(40,10000,0,10000),(41,10000,8500,1500);
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
  `typeID` int(11) NOT NULL,
  `orgID` int(11) NOT NULL,
  `notifType` varchar(50) NOT NULL,
  `timedate` datetime NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unseen',
  PRIMARY KEY (`notifID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (1,1,1,'Billing Statement','2016-08-16 00:00:00','seen'),(2,2,3,'Billing Statement','2016-09-10 00:00:00','seen'),(3,3,5,'Billing Statement','2016-07-07 00:00:00','unseen'),(4,4,6,'Billing Statement','2016-03-30 00:00:00','seen'),(5,5,41,'Billing Statement','2016-07-11 00:00:00','seen'),(6,6,41,'Billing Statement','2016-11-11 00:00:00','unseen'),(7,7,10,'Billing Statement','2016-01-15 00:00:00','seen'),(8,8,20,'Billing Statement','2016-05-19 00:00:00','seen'),(9,9,30,'Billing Statement','2016-07-09 00:00:00','unseen'),(10,24,15,'Remark','2016-12-05 00:00:00','seen'),(11,25,2,'Remark','2016-02-12 00:00:00','seen'),(12,26,2,'Remark','2016-12-07 00:00:00','unseen'),(13,27,2,'Remark','2016-01-17 00:00:00','seen'),(14,24,15,'Remark','2016-12-10 00:00:00','seen'),(15,24,15,'Remark','2016-12-15 00:00:00','unseen'),(16,22,41,'Activity','2016-12-12 06:30:40','seen'),(17,23,41,'Activity','2016-12-12 06:39:30','seen'),(18,24,41,'Activity','2016-12-12 06:48:38','seen'),(19,25,41,'Activity','2016-12-12 06:51:34','seen'),(20,26,41,'Activity','2016-12-12 07:08:13','unseen'),(21,27,41,'Activity','2016-12-12 07:11:25','unseen'),(22,28,41,'Activity','2016-12-12 07:14:31','unseen'),(23,29,41,'Activity','2016-12-12 07:16:46','unseen'),(24,30,41,'Activity','2016-12-12 07:19:05','seen'),(25,31,41,'Activity','2016-12-12 07:21:21','seen'),(26,32,41,'Activity','2016-12-12 07:34:30','seen'),(27,33,41,'Activity','2016-12-12 07:44:07','unseen'),(28,34,41,'Activity','2016-12-12 07:47:17','unseen'),(29,35,41,'Activity','2016-12-12 07:47:57','unseen'),(30,36,41,'Activity','2016-12-12 08:10:33','seen'),(31,37,41,'Activity','2016-12-12 08:13:38','seen'),(32,38,41,'Activity','2016-12-12 08:20:58','unseen'),(33,39,41,'Activity','2016-12-12 08:21:50','unseen'),(34,40,41,'Activity','2016-12-12 08:23:56','seen'),(35,41,41,'Activity','2016-12-12 08:25:02','unseen'),(36,42,41,'Activity','2016-12-12 08:28:59','seen'),(37,28,5,'Remark','2016-10-10 00:00:00','unseen');
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
  PRIMARY KEY (`orgID`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `acronym_UNIQUE` (`acronym`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
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
  `auditedBy` varchar(50) DEFAULT NULL,
  `dateAudited` date DEFAULT NULL,
  `encodedBy` varchar(50) DEFAULT NULL,
  `dateEncoded` date DEFAULT NULL,
  `dateReceivedSLIFE` date DEFAULT NULL,
  `dateReceivedAcc` date DEFAULT NULL,
  `datePendedSLIFE` date DEFAULT NULL,
  `SLIFEremarks` varchar(500) DEFAULT NULL,
  `datePendedAcc` date DEFAULT NULL,
  `AccRemarks` varchar(500) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`remarkID`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remark`
--

LOCK TABLES `remark` WRITE;
/*!40000 ALTER TABLE `remark` DISABLE KEYS */;
INSERT INTO `remark` VALUES (24,22,'Pending','3','2016-12-15','Please revise X and Y.','Ryan Tan','2016-12-22','Jose Albus','2016-12-23','0000-00-00','0000-00-00','0000-00-00','','0000-00-00','',''),(25,23,'Approved','0','2016-02-12',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,24,'Pending','1','2016-12-07','No PRS number, please revise.','','0000-00-00','','0000-00-00','0000-00-00','0000-00-00','0000-00-00','','0000-00-00','',''),(27,25,'Pending','1','2016-01-17','Kindly revise this.','','0000-00-00','','0000-00-00','0000-00-00','0000-00-00','0000-00-00','','0000-00-00','',''),(28,26,'Pending','1','2016-12-07','Please revise.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,27,'Pending','0','2016-09-15','Kindly change this report.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(31,29,'Pending','0','2016-12-16','Needs improvement.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,30,'Declined','0','2016-12-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(33,31,'Declined','0','2016-12-14',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,32,'Approved','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(45,43,'Approved','1','2016-12-16','Please Revise X and Y.','Lorenzo Hobbes','2016-12-30','Joseph Araulo','2016-12-23','2016-12-22','2016-12-23','2016-12-05','Please Revise A and B.','2017-01-05','Please Revise A, B, and C.','Please Revise A, B, and C.');
/*!40000 ALTER TABLE `remark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'cso_finance'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-15  5:43:22
