-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: chju16
-- ------------------------------------------------------
-- Server version	5.5.54-0+deb8u1-log

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
-- Temporary view structure for view `VLowStock`
--

DROP TABLE IF EXISTS `VLowStock`;
/*!50001 DROP VIEW IF EXISTS `VLowStock`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `VLowStock` AS SELECT 
 1 AS `productId`,
 1 AS `productName`,
 1 AS `loggedDate`,
 1 AS `unitsLeft`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `VOrderDetails`
--

DROP TABLE IF EXISTS `VOrderDetails`;
/*!50001 DROP VIEW IF EXISTS `VOrderDetails`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `VOrderDetails` AS SELECT 
 1 AS `OrderNumber`,
 1 AS `OrderRow`,
 1 AS `CustomerUsername`,
 1 AS `Description`,
 1 AS `Price`,
 1 AS `ItemName`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `VProductOverview`
--

DROP TABLE IF EXISTS `VProductOverview`;
/*!50001 DROP VIEW IF EXISTS `VProductOverview`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `VProductOverview` AS SELECT 
 1 AS `id`,
 1 AS `title`,
 1 AS `description`,
 1 AS `price`,
 1 AS `category`,
 1 AS `img`,
 1 AS `active_product`,
 1 AS `prodStatus`,
 1 AS `stock`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `VProductStock`
--

DROP TABLE IF EXISTS `VProductStock`;
/*!50001 DROP VIEW IF EXISTS `VProductStock`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `VProductStock` AS SELECT 
 1 AS `productId`,
 1 AS `productName`,
 1 AS `productDesc`,
 1 AS `units`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `anax_admin`
--

DROP TABLE IF EXISTS `anax_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anax_admin` (
  `admin_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `clearance` int(11) DEFAULT '1',
  PRIMARY KEY (`admin_name`),
  UNIQUE KEY `admin_name` (`admin_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anax_admin`
--

LOCK TABLES `anax_admin` WRITE;
/*!40000 ALTER TABLE `anax_admin` DISABLE KEYS */;
INSERT INTO `anax_admin` VALUES ('admin','$2y$10$Y6LZhNk0AhORKoE0Y9uQmOmQnY5rFBlKVsEbVUzz6scizWrJlg0NC',1);
/*!40000 ALTER TABLE `anax_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anax_cart`
--

DROP TABLE IF EXISTS `anax_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anax_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` char(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer` (`customer`),
  CONSTRAINT `anax_cart_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `anax_users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anax_cart`
--

LOCK TABLES `anax_cart` WRITE;
/*!40000 ALTER TABLE `anax_cart` DISABLE KEYS */;
INSERT INTO `anax_cart` VALUES (1,NULL),(2,NULL),(3,'ninjai');
/*!40000 ALTER TABLE `anax_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anax_cartRow`
--

DROP TABLE IF EXISTS `anax_cartRow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anax_cartRow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cart` int(11) DEFAULT NULL,
  `product` int(11) DEFAULT NULL,
  `units` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product` (`product`),
  KEY `cart` (`cart`),
  CONSTRAINT `anax_cartRow_ibfk_1` FOREIGN KEY (`product`) REFERENCES `anax_product` (`id`),
  CONSTRAINT `anax_cartRow_ibfk_2` FOREIGN KEY (`cart`) REFERENCES `anax_cart` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anax_cartRow`
--

LOCK TABLES `anax_cartRow` WRITE;
/*!40000 ALTER TABLE `anax_cartRow` DISABLE KEYS */;
INSERT INTO `anax_cartRow` VALUES (1,1,1,3),(2,1,2,2),(3,1,5,1),(4,1,3,2);
/*!40000 ALTER TABLE `anax_cartRow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anax_content`
--

DROP TABLE IF EXISTS `anax_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anax_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` char(120) COLLATE utf8_swedish_ci DEFAULT NULL,
  `slug` char(120) COLLATE utf8_swedish_ci DEFAULT NULL,
  `title` varchar(120) COLLATE utf8_swedish_ci DEFAULT NULL,
  `data` text COLLATE utf8_swedish_ci,
  `type` char(20) COLLATE utf8_swedish_ci DEFAULT NULL,
  `filter` varchar(80) COLLATE utf8_swedish_ci DEFAULT NULL,
  `published` datetime DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `path` (`path`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anax_content`
--

LOCK TABLES `anax_content` WRITE;
/*!40000 ALTER TABLE `anax_content` DISABLE KEYS */;
INSERT INTO `anax_content` VALUES (1,'hem','hem','Hem','Detta är min hemsida. Den är skriven i [url=http://en.wikipedia.org/wiki/BBCode]bbcode[/url] vilket innebär att man kan formattera texten till [b]bold[/b] och [i]kursiv stil[/i] samt hantera länkar.\r\n\r\nDessutom finns ett filter \'nl2br\' som lägger in <br>-element istället för \\n, det är smidigt, man kan skriva texten precis som man tänker sig att den skall visas, med radbrytningar.','page','bbcode,nl2br','2017-04-28 12:50:57','2017-04-21 12:37:31','2017-04-28 12:51:14',NULL),(2,'om',NULL,'Om','Detta är en sida om mig och min webbplats. Den är skriven i [Markdown](http://en.wikipedia.org/wiki/Markdown). Markdown innebär att du får bra kontroll över innehållet i din sida, du kan formattera och sätta rubriker, men du behöver inte bry dig om HTML.\n\nRubrik nivå 2\n-------------\n\nDu skriver enkla styrtecken för att formattera texten som **fetstil** och *kursiv*. Det finns ett speciellt sätt att länka, skapa tabeller och så vidare.\n\n###Rubrik nivå 3\n\nNär man skriver i markdown så blir det läsbart även som textfil och det är lite av tanken med markdown.','page','markdown',NULL,'2017-04-21 12:37:31',NULL,NULL),(3,'blogpost-1','valkommen-till-min-blogg','Välkommen till min blogg!','Detta är en bloggpost.\r\n\r\nNär det finns länkar till andra webbplatser så kommer de länkarna att bli klickbara.\r\n\r\nhttp://dbwebb.se är ett exempel på en länk som blir klickbar.','post','link,nl2br','2017-04-18 15:00:00','2017-04-21 12:37:31','2017-04-21 14:57:28',NULL),(4,'blogpost-2','nu-har-sommaren-kommit','Nu har sommaren kommit','Detta är en bloggpost som berättar att sommaren har kommit, ett budskap som kräver en bloggpost.','post','nl2br','2017-04-18 15:00:00','2017-04-21 12:37:31','2017-04-21 14:57:33',NULL),(5,'blogpost-3','nu-har-hosten-kommit','Nu har hösten kommit','Detta är en bloggpost som berättar att sommaren har kommit, ett budskap som kräver en bloggpost','post','nl2br','2017-04-18 15:00:00','2017-04-21 12:37:31','2017-04-21 14:57:37',NULL),(6,NULL,'triptych1','triptych1','##Innehåll\r\nAllt innehåll på denna sida är skapat av Christofer Jungberg','block','nl2br,markdown','2017-04-21 14:30:00','2017-04-21 12:38:04','2017-04-21 14:53:24',NULL),(7,NULL,'triptych2','triptych2','##anax-lite\r\nDetta är sista kursen på första läsåret av [webbprogrammering](http://dbwebb.se)','block','nl2br,markdown','2017-04-18 15:00:00','2017-04-21 12:40:05','2017-04-21 14:53:29',NULL),(8,NULL,'triptych3','triptych3','##Github repos\r\nVill du kika på koden till denna sida eller andra projekt \r\nså finns det på mitt konto [Barelydead](http://github.com/barelydead).','block','nl2br,markdown','2017-04-18 15:00:00','2017-04-21 12:41:58','2017-04-21 14:53:34',NULL),(9,NULL,NULL,'x',NULL,NULL,NULL,NULL,'2017-04-22 06:05:17',NULL,'2017-04-28 05:32:20'),(10,'tes','tes','tes','#test\r\n##test','page','markdown','2017-04-28 05:00:00','2017-04-28 03:32:46','2017-04-28 05:41:43','2017-04-28 05:36:27'),(11,'aaa','aaa','aaa','##aa\r\n\r\n###aa','block','markdown','2017-04-28 05:00:00','2017-04-28 03:35:59','2017-04-28 05:36:22','2017-05-02 05:29:16'),(12,'tttt','tttt','tttt','#tttt','page','markdown','0000-00-00 00:00:00','2017-05-02 03:29:30','2017-05-02 05:29:42','2017-05-02 05:29:57');
/*!40000 ALTER TABLE `anax_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anax_lowStockList`
--

DROP TABLE IF EXISTS `anax_lowStockList`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anax_lowStockList` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product` (`product`),
  CONSTRAINT `anax_lowStockList_ibfk_1` FOREIGN KEY (`product`) REFERENCES `anax_product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anax_lowStockList`
--

LOCK TABLES `anax_lowStockList` WRITE;
/*!40000 ALTER TABLE `anax_lowStockList` DISABLE KEYS */;
/*!40000 ALTER TABLE `anax_lowStockList` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anax_order`
--

DROP TABLE IF EXISTS `anax_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anax_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` char(40) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `canceled` timestamp NULL DEFAULT NULL,
  `delivered` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer` (`customer`),
  CONSTRAINT `anax_order_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `anax_users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anax_order`
--

LOCK TABLES `anax_order` WRITE;
/*!40000 ALTER TABLE `anax_order` DISABLE KEYS */;
INSERT INTO `anax_order` VALUES (1,'ninjai','2017-05-04 10:12:06',NULL,NULL,NULL),(2,'doe','2017-05-04 10:12:06',NULL,NULL,NULL),(3,'ninjai','2017-05-04 10:12:08',NULL,NULL,NULL);
/*!40000 ALTER TABLE `anax_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anax_orderRow`
--

DROP TABLE IF EXISTS `anax_orderRow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anax_orderRow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) DEFAULT NULL,
  `units` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product` (`product`),
  KEY `order` (`order`),
  CONSTRAINT `anax_orderRow_ibfk_1` FOREIGN KEY (`product`) REFERENCES `anax_product` (`id`),
  CONSTRAINT `anax_orderRow_ibfk_2` FOREIGN KEY (`order`) REFERENCES `anax_order` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anax_orderRow`
--

LOCK TABLES `anax_orderRow` WRITE;
/*!40000 ALTER TABLE `anax_orderRow` DISABLE KEYS */;
INSERT INTO `anax_orderRow` VALUES (1,1,NULL,1),(2,2,NULL,1),(3,3,NULL,1),(4,2,NULL,2),(5,3,NULL,2),(6,1,3,3),(7,2,2,3),(8,5,1,3),(9,3,2,3);
/*!40000 ALTER TABLE `anax_orderRow` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`chju16`@`%`*/ /*!50003 TRIGGER updateStockOnOrder
BEFORE INSERT
ON `anax_orderRow` FOR EACH ROW

	UPDATE anax_stock SET
		units = units - NEW.units
        WHERE product = NEW.product */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `anax_product`
--

DROP TABLE IF EXISTS `anax_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anax_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(50) DEFAULT NULL,
  `description` varchar(120) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `category` char(40) DEFAULT NULL,
  `img` varchar(100) DEFAULT 'default.png',
  `active_product` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anax_product`
--

LOCK TABLES `anax_product` WRITE;
/*!40000 ALTER TABLE `anax_product` DISABLE KEYS */;
INSERT INTO `anax_product` VALUES (1,'T-Shirt','En grå t-shirt med rund krage',199.50,'kläder','default.png',1),(2,'Badbyxor','badbyxor med hawaii motiv',450.00,'kläder','default.png',0),(3,'Osthyvel','En osthyvel i stål med trähandtag',99.00,'köksartiklar','default.png',1),(4,'Stekpanna','Stekpanna i gjutjärn',1099.00,'köksartiklar','default.png',1),(5,'Mugg','Fin mugg med text på',249.00,'köksartiklar','default.png',1);
/*!40000 ALTER TABLE `anax_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anax_shop`
--

DROP TABLE IF EXISTS `anax_shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anax_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(50) DEFAULT NULL,
  `description` varchar(120) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `category` char(40) DEFAULT NULL,
  `stock` smallint(6) DEFAULT '0',
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anax_shop`
--

LOCK TABLES `anax_shop` WRITE;
/*!40000 ALTER TABLE `anax_shop` DISABLE KEYS */;
INSERT INTO `anax_shop` VALUES (1,'T-Shirt','En grå t-shirt med rund krage',199.50,'kläder',10,NULL),(2,'Badbyxor','badbyxor med hawaii motiv',450.00,'kläder',1,NULL),(3,'Osthyvel','En osthyvel i stål med trähandtag',99.00,'köksartiklar',40,NULL);
/*!40000 ALTER TABLE `anax_shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anax_stock`
--

DROP TABLE IF EXISTS `anax_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anax_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) DEFAULT NULL,
  `units` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product` (`product`),
  CONSTRAINT `anax_stock_ibfk_1` FOREIGN KEY (`product`) REFERENCES `anax_product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anax_stock`
--

LOCK TABLES `anax_stock` WRITE;
/*!40000 ALTER TABLE `anax_stock` DISABLE KEYS */;
INSERT INTO `anax_stock` VALUES (1,1,7),(2,2,8),(3,3,98),(4,4,0),(5,5,6);
/*!40000 ALTER TABLE `anax_stock` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`chju16`@`%`*/ /*!50003 TRIGGER lowStock
AFTER UPDATE
ON `anax_stock` FOR EACH ROW
	IF (NEW.units < 5) THEN
    INSERT INTO `anax_lowStockList`(`product`) 
		VALUES (OLD.product);
	ELSEIF (New.units > 5) THEN
    DELETE FROM `anax_lowStockList`
		WHERE product = OLD.product;
	END if */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `anax_users`
--

DROP TABLE IF EXISTS `anax_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anax_users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `profile` text,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anax_users`
--

LOCK TABLES `anax_users` WRITE;
/*!40000 ALTER TABLE `anax_users` DISABLE KEYS */;
INSERT INTO `anax_users` VALUES ('cj','$2y$10$C.RRnvJ5V4GSE2/.YKrvaO2oLxav/hfvbMB9lXCp1l5NFe/C41OJG','cj',20,NULL),('db','$2y$10$UeqVsGQD87mH7gFBDsLq4.ErG44MI4YgUMRE156VRjlvnQm/Ane5W',NULL,NULL,NULL),('dbb','$2y$10$YjIBsR1Ksb6jZytAIDCo0..llBxgs265MNGDBtRN8JMw.Teckxc66','dbb',2,NULL),('doe','$2y$10$SHeXx.VAWXFfosv6RE/nv.9LjYf8oe1ahaSTEQ026Cz11wSytneWC','doe',12,'fsdf'),('FirstUser','$2y$10$qJYG8Fs47aoFh4rYg0f/xe0.v6QyRTOIhtfsdlKey7x8rVUgUQUBy','hwhw',21,NULL),('litemerafrukt','$2y$10$yqd4xTJVREDFRg9m9SaVFuwPmd5jJ8T3enaXXk.pKwSQoi9yosHRS','Anders',40,NULL),('ninjai','$2y$10$4jqnijxLfFi8cXrfFnryH.kv.2PByPNOUlWFWzAtdWjXRbf/hkGqe','Christofer Jungberg',26,'Jag heter Christofer och pluggar webbutveckling'),('testuserfromadmin','$2y$10$u8hph470ui.qsBEB.eTXMeIfNbTKCsik3QGTpgMpDDd3UPzpODLXW',NULL,NULL,NULL),('x','$2y$10$lKHQZpUf3J0NoYJ97aHvGO25WaU0.LWRzYD36FtUyfJ1Iwgg0trpK',NULL,NULL,NULL);
/*!40000 ALTER TABLE `anax_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'chju16'
--
/*!50003 DROP FUNCTION IF EXISTS `checkProductStatus` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`chju16`@`%` FUNCTION `checkProductStatus`(
	activeP INT
) RETURNS char(20) CHARSET latin1
BEGIN 

	IF activeP = 0 THEN
		RETURN "inactiveProduct";
	END IF;
    
    RETURN "activeProduct";

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getUnitBalance` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`chju16`@`%` FUNCTION `getUnitBalance`(
	thisProd INT
) RETURNS int(11)
BEGIN 

RETURN (SELECT units FROM anax_stock WHERE product = thisProd);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addItemToCart` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`chju16`@`%` PROCEDURE `addItemToCart`(
    cartId INT,
    itemId INT,
    thisMany INT
)
BEGIN

INSERT INTO `anax_cartRow`(product, cart, units)
VALUES
(itemId, cartId, thisMany);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cancelOrder` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`chju16`@`%` PROCEDURE `cancelOrder`(
    orderId INT
)
BEGIN 
DECLARE n INT DEFAULT 0;
DECLARE i INT DEFAULT 0;

SELECT COUNT(*) FROM anax_orderRow 
	WHERE `order` = orderId 
		INTO n;
        
	START TRANSACTION;
		
	SET i = 0;
	WHILE i < n DO 
		UPDATE anax_stock SET
        units = units + (SELECT units FROM anax_orderRow WHERE `order` = orderId LIMIT i,1)
        WHERE product = (SELECT product FROM anax_orderRow WHERE `order` = orderId LIMIT i,1);
        
        SET i = i + 1;
    
    END WHILE;
    
    
    UPDATE `anax_order` 
    SET `canceled` = NOW()
    WHERE id = orderId;
    
    COMMIT;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cartToOrder` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`chju16`@`%` PROCEDURE `cartToOrder`(
    activeCustomer CHAR(40),
    activeCart INT
)
BEGIN
DECLARE orderId INT;
DECLARE thisProduct INT;
DECLARE orderVolume INT;
DECLARE n INT DEFAULT 0;
DECLARE i INT DEFAULT 0;


	START TRANSACTION;

		
	INSERT INTO anax_order(`customer`) VALUES 
		(activeCustomer);
		
	-- new order ID
	SET orderId = last_insert_id();


	SELECT COUNT(*) FROM anax_cartRow 
	WHERE cart = activeCart 
		INTO n;
		
	SET i = 0;
	WHILE i < n DO 
		SET thisProduct = (SELECT product FROM anax_cartRow WHERE cart = activeCart LIMIT i,1);
        SET orderVolume = (SELECT units FROM anax_cartRow WHERE cart = activeCart LIMIT i,1);
        
        IF getUnitBalance(thisproduct) < orderVolume THEN
			SELECT 'Not enough products in stock for this order';
            ROLLBACK;
		END if;
        
		INSERT INTO anax_orderRow(`product`, `order`, `units`) VALUES
        (thisProduct, orderId, orderVolume);
		
		SET i = i + 1;
	END WHILE;
    
    COMMIT;
	

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `changeStock` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`chju16`@`%` PROCEDURE `changeStock`(
	diff INT,
    prodId INT
)
BEGIN
	UPDATE `anax_stock` SET
	units = units + diff
	WHERE product = prodId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getProdOverview` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`chju16`@`%` PROCEDURE `getProdOverview`(
)
BEGIN
	SELECT P.*,
	CASE
		WHEN (P.active_product = 1) THEN 'ActiveProduct'
		WHEN (P.active_product = 0) THEN 'InactiveProduct'
	END AS status,
	CASE
		WHEN (S.units > 0) THEN 'inStock'
		WHEN (S.units <= 0) THEN 'soldOut'
	END AS stock
	FROM `anax_product` AS P
		INNER JOIN `anax_stock` AS S
			ON P.id = S.product;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `startNewCart` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`chju16`@`%` PROCEDURE `startNewCart`(
    newCustomer CHAR(40)
)
BEGIN

INSERT INTO anax_cart(`customer`) VALUES (newCustomer);

select id from anax_cart WHERE customer = newCustomer;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `VLowStock`
--

/*!50001 DROP VIEW IF EXISTS `VLowStock`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`chju16`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `VLowStock` AS select `P`.`id` AS `productId`,`P`.`title` AS `productName`,`L`.`logDate` AS `loggedDate`,`S`.`units` AS `unitsLeft` from ((`anax_lowStockList` `L` join `anax_product` `P` on((`L`.`product` = `P`.`id`))) join `anax_stock` `S` on((`P`.`id` = `S`.`product`))) group by `P`.`title` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `VOrderDetails`
--

/*!50001 DROP VIEW IF EXISTS `VOrderDetails`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`chju16`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `VOrderDetails` AS select `O`.`id` AS `OrderNumber`,`R`.`id` AS `OrderRow`,`C`.`username` AS `CustomerUsername`,`P`.`description` AS `Description`,`P`.`price` AS `Price`,`P`.`title` AS `ItemName` from (((`anax_order` `O` join `anax_orderRow` `R` on((`O`.`id` = `R`.`order`))) join `anax_product` `P` on((`R`.`product` = `P`.`id`))) join `anax_users` `C` on((`O`.`customer` = `C`.`username`))) order by `R`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `VProductOverview`
--

/*!50001 DROP VIEW IF EXISTS `VProductOverview`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`chju16`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `VProductOverview` AS select `P`.`id` AS `id`,`P`.`title` AS `title`,`P`.`description` AS `description`,`P`.`price` AS `price`,`P`.`category` AS `category`,`P`.`img` AS `img`,`P`.`active_product` AS `active_product`,`checkProductStatus`(`P`.`active_product`) AS `prodStatus`,(case when (`S`.`units` > 0) then 'inStock' when (`S`.`units` <= 0) then 'soldOut' end) AS `stock` from (`anax_product` `P` join `anax_stock` `S` on((`P`.`id` = `S`.`product`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `VProductStock`
--

/*!50001 DROP VIEW IF EXISTS `VProductStock`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`chju16`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `VProductStock` AS select `P`.`id` AS `productId`,`P`.`title` AS `productName`,`P`.`description` AS `productDesc`,`S`.`units` AS `units` from (`anax_stock` `S` join `anax_product` `P` on((`S`.`product` = `P`.`id`))) order by `P`.`id` */;
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

-- Dump completed on 2017-05-04 14:14:50
