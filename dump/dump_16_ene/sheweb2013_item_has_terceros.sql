CREATE DATABASE  IF NOT EXISTS `sheweb2013` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sheweb2013`;
-- MySQL dump 10.13  Distrib 5.5.28, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: sheweb2013
-- ------------------------------------------------------
-- Server version	5.5.28-0ubuntu0.12.04.3-log

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
-- Table structure for table `item_has_terceros`
--

DROP TABLE IF EXISTS `item_has_terceros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_has_terceros` (
  `item_iditem` int(11) NOT NULL,
  `terceros_idterceros` int(11) NOT NULL,
  PRIMARY KEY (`item_iditem`,`terceros_idterceros`),
  KEY `fk_item_has_terceros_terceros1` (`terceros_idterceros`),
  KEY `fk_item_has_terceros_item1` (`item_iditem`),
  CONSTRAINT `fk_item_has_terceros_item1` FOREIGN KEY (`item_iditem`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_has_terceros_terceros1` FOREIGN KEY (`terceros_idterceros`) REFERENCES `terceros` (`idterceros`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='item - proveedores\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_has_terceros`
--

LOCK TABLES `item_has_terceros` WRITE;
/*!40000 ALTER TABLE `item_has_terceros` DISABLE KEYS */;
INSERT INTO `item_has_terceros` VALUES (1,1),(2,1),(4,1),(3,2);
/*!40000 ALTER TABLE `item_has_terceros` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-01-16 17:33:54
