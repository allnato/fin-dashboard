CREATE DATABASE  IF NOT EXISTS `cso_finance` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cso_finance`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: cso_finance
-- ------------------------------------------------------
-- Server version	5.7.13-log

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
  `dateSubmitted` date DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `beginDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity`
--

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
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
  PRIMARY KEY (`orgID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization`
--

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
INSERT INTO `organization` VALUES (1,'Association of Computer Engineering Students','ACCESS','access@dlsu.edu.ph','access'),(2,'AdCreate Society','AdCreate','adcreate@dlsu.edu.ph','adcreate'),(3,'AIESEC-DLSU','AIESEC','aiesec@dlsu.edu.ph','aiesec'),(4,'The Organization for American Studies Students','AMSTUD','amstud@dlsu.edu.ph','amstud'),(5,'Business Management Society','BMS','bms@dlsu.edu.ph','bms'),(6,'Behavioral Science Society','BSS','bss@dlsu.edu.ph','bss'),(7,'Civil Engineering Society','CES','ces@dlsu.edu.ph','ces'),(8,'Chemistry Society','ChemSoc','chemsoc@dlsu.edu.ph','chemsoc'),(9,'Chemical Engineering Society','ChEn','chen@dlsu.edu.ph','chen'),(10,'Cultura','Cultura','dlsucultura@gmail.com','cultura'),(11,'Dalubhasaan ng mga Umuusbong na Mag-aaral ng Araling Filipino','DANUM','danum@dlsu.edu.ph','danum'),(12,'<wala pa>','ECCS','eccs@dlsu.edu.ph','eccs'),(13,'Economics Organization','EconOrg','econorg@dlsu.edu.ph','econorg'),(14,'ENGLICOM','ENGLICOM','englicom@dlsu.edu.ph','englicom'),(15,'European Studies Association','ESA','esa@dlsu.edu.ph','esa'),(16,'Gakuen Anime Soshiki','GAS','gas.dlsu.stc@gmail.com','gas'),(17,'Industrial Management Engineering Society','IMES','imes@dlsu.edu.ph','imes'),(18,'Junior Philippine Institute of Accountants','JPIA','jpia@dlsu.edu.ph','jpia'),(19,'Kapatiran ng Kabataan para sa Kaunlaran','KKK','kkk@dlsu.edu.ph','kkk'),(20,'Ley La Salle','LSS','leylasalle@dlsu.edu.ph','lss'),(21,'La Salle Computer Society','LSCS','lscs@dlsu.edu.ph','lscs'),(22,'Management of Financial Institution Association','MaFIA','mafia@dlsu.edu.ph','mafia'),(23,'Mathematics Circle','Math Circle','mathcircle@dlsu.edu.ph','mathcircle'),(24,'Mechanical Engineering Society','MES','mes@dlsu.edu.ph','mes'),(25,'MOOMEDIA','MOOMEDIA','moomedia@dlsu.edu.ph','moomedia'),(26,'Nihon Kenkyuu Kai','NKK','nkk@dlsu.edu.ph','nkk'),(27,'Outdoor Club','OC','outdoor@dlsu.edu.ph','oc'),(28,'Physics Society','PhySoc','physoc@dlsu.edu.ph','physoc'),(29,'Samahan ng Lasalayanong Pilosopo','Pilosopo','pilosopo@dlsu.edu.ph','pilosopo'),(30,'Political Science Society','POLISCY','poliscy@dlsu.edu.ph','poliscy'),(31,'Rotaract Club of DLSU','ROTARACT','rotaract@dlsu.edu.ph','rotaract'),(32,'Sociedad de Historia','SDH','sdh@dlsu.edu.ph','sdh'),(33,'Society of Manufacturing Engineering','SME','sme@dlsu.edu.ph','sme'),(34,'Samahan ng mga Mag-aaral sa Sikolohiya','SMS','sms@dlsu.edu.ph','sms'),(35,'Societas Vitae','SV','sv@dlsu.edu.ph','sv'),(36,'Team Communications','TEAMCOMM','teamcomm@dlsu.edu.ph','teamcomm'),(37,'United International Student Organization','UNISTO','unisto@dlsu.edu.ph','unisto'),(38,'Union of Students Inspired Towards Education','UNITED','united@dlsu.edu.ph','united'),(39,'Writers’ Guild','WG','wg@dlsu.edu.ph','wg'),(40,'Young Entrepreneurs Society','YES','yes@dlsu.edu.ph','yes');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remark`
--

LOCK TABLES `remark` WRITE;
/*!40000 ALTER TABLE `remark` DISABLE KEYS */;
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

-- Dump completed on 2016-10-15 13:34:11
