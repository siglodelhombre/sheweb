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
-- Table structure for table `pedidosproveedoresentradasalmacenfallados`
--

DROP TABLE IF EXISTS `pedidosproveedoresentradasalmacenfallados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidosproveedoresentradasalmacenfallados` (
  `idpedidosproveedoresentradasalmacenfallados` int(11) NOT NULL AUTO_INCREMENT,
  `idpedidosproveedoresentradasalmacen` int(11) NOT NULL,
  `item_iditem` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `observaciones` text,
  PRIMARY KEY (`idpedidosproveedoresentradasalmacenfallados`),
  KEY `fk_pedidosproveedoresentradasalmacenfallados_pedidosproveedor1` (`idpedidosproveedoresentradasalmacen`),
  KEY `fk_pedidosproveedoresentradasalmacenfallados_item1` (`item_iditem`),
  CONSTRAINT `fk_pedidosproveedoresentradasalmacenfallados_item1` FOREIGN KEY (`item_iditem`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidosproveedoresentradasalmacenfallados_pedidosproveedor1` FOREIGN KEY (`idpedidosproveedoresentradasalmacen`) REFERENCES `pedidosproveedoresentradasalmacen` (`idpedidosproveedoresentradasalmacen`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidosproveedoresentradasalmacenfallados`
--

LOCK TABLES `pedidosproveedoresentradasalmacenfallados` WRITE;
/*!40000 ALTER TABLE `pedidosproveedoresentradasalmacenfallados` DISABLE KEYS */;
INSERT INTO `pedidosproveedoresentradasalmacenfallados` VALUES (1,1,1,1,'sdasdasd');
/*!40000 ALTER TABLE `pedidosproveedoresentradasalmacenfallados` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-01-09 16:00:06
