-- MySQL dump 10.13  Distrib 8.0.39, for Linux (x86_64)
--
-- Host: localhost    Database: firstnational
-- ------------------------------------------------------
-- Server version	8.0.39-0ubuntu0.24.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `code`
--

DROP TABLE IF EXISTS `code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `code` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `passcode` int NOT NULL,
  `passpin` int NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `code`
--

LOCK TABLES `code` WRITE;
/*!40000 ALTER TABLE `code` DISABLE KEYS */;
INSERT INTO `code` VALUES (1,'dollarlexo@gmail.com',8042,18231,1),(2,'alex@pegasus.org',9646,0,NULL);
/*!40000 ALTER TABLE `code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `date_opened` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) DEFAULT NULL,
  `dob` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `identity_back_data` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `account_type` varchar(100) NOT NULL,
  `instant_register` varchar(100) NOT NULL,
  `account_balance` decimal(15,2) DEFAULT NULL,
  `ip_instant_register` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'2024-10-21 17:39:54','dollarlexo@gmail.com','08/17/1963','profile','Frank','Williams','9293353821','Beaumont','513 Logan Ct','21009','Maryland','671691ea59640_336f0d744041234d934aa4557636558e.jpg','8160','9086417235','active','2024-10-21 17:39:54',7548273.90,'172.70.49.54'),(2,'2024-10-21 18:14:31','afrist@yahoo.com','09-20-2021','adigun','Adjay','Muski','347683628','Abingdon','513 Logan Ct','27001','Maryland','67169a06f3ebd_336f0d744041234d934aa4557636558e.jpg','4132','4960721583','block','2024-10-21 18:14:31',0.00,'172.70.123.111'),(3,'2024-10-22 02:49:33','adelabu@yahoo.com','09-20-2021','profile','Hallen','Hugo','347683628','Lakeville','513 Logan Ct','27001','Maryland','671712bd9c6f9_336f0d744041234d934aa4557636558e.jpg','6894','1263890745','block','2024-10-22 02:49:33',0.00,'172.70.49.64'),(4,'2024-10-22 03:06:39','masun@yahoo.de','09-12-98','profile','Benshow','Maxy','347683628','Abingdon','513 Logan Ct','21007','Maryland','671716bfe4e05_4c36bb81a7238679b6a07838e591b08f.jpg','6470','2718369045','block','2024-10-22 03:06:39',0.00,'172.70.223.33'),(5,'2024-10-22 20:32:34','alagbara@yahoo.com','09-23-1981','profile','Waheeb','Jesus','9235672311','Abingdon','513 Logan Ct','55044','Maryland','67180be28682d_4c36bb81a7238679b6a07838e591b08f.jpg','0569','4326871059','block','2024-10-22 20:32:34',0.00,'162.158.118.105'),(6,'2024-10-28 23:35:06','alex@pegasus.org','09-29-1962','ExpensiveSec2024','Alex','Brodie','9293353821','Massena','50 Old River Rd','13662','New York','67201faa7bd60_scott1.jpg','7250','6597028413','active','2024-10-28 23:35:06',7548273.90,'172.71.24.83');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `title` varchar(32) NOT NULL,
  `message` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (1,'2024-10-21 17:39:54','dollarlexo@gmail.com','Frank','Williams','Welcome','Welcome to First Nation Bank'),(2,'2024-10-21 18:14:31','afrist@yahoo.com','Adjay','Muski','Welcome','Welcome to First Nation Bank'),(3,'2024-10-21 18:14:31','afrist@yahoo.com','Adjay','Muski','Balance','Your balance is 0.00 Dollar'),(4,'2024-10-21 18:14:31','afrist@yahoo.com','Adjay','Muski','Account','Your account is activated'),(5,'2024-10-22 02:49:33','adelabu@yahoo.com','Hallen','Hugo','Welcome','Welcome to First Nation Bank'),(6,'2024-10-22 02:49:33','adelabu@yahoo.com','Hallen','Hugo','Balance','Your balance is 0.00 Dollar'),(7,'2024-10-22 02:49:33','adelabu@yahoo.com','Hallen','Hugo','Account','Your account is activated'),(8,'2024-10-22 03:06:39','masun@yahoo.de','Benshow','Maxy','Welcome','Welcome to First Nation Bank'),(9,'2024-10-22 03:06:39','masun@yahoo.de','Benshow','Maxy','Balance','Your balance is 0.00 Dollar'),(10,'2024-10-22 03:06:39','masun@yahoo.de','Benshow','Maxy','Account','Your account is activated'),(11,'2024-10-22 20:32:34','alagbara@yahoo.com','Waheeb','Jesus','Welcome','Welcome to First Nation Bank'),(12,'2024-10-22 20:32:34','alagbara@yahoo.com','Waheeb','Jesus','Balance','Your balance is 0.00 Dollar'),(13,'2024-10-22 20:32:34','alagbara@yahoo.com','Waheeb','Jesus','Account','Your account is activated'),(14,'2024-10-28 23:35:06','alex@pegasus.org','Alex','Brodie','Welcome','Welcome to First Nation Bank'),(15,'2024-10-28 23:35:06','alex@pegasus.org','Alex','Brodie','Balance','Your balance is 0.00 Dollar'),(16,'2024-10-28 23:35:06','alex@pegasus.org','Alex','Brodie','Account','Your account is activated');
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `date` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `identification` varchar(100) DEFAULT NULL,
  `trans_method` varchar(20) NOT NULL,
  `trans_status` varchar(20) NOT NULL,
  `trans_amount` varchar(20) NOT NULL,
  `user_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES ('13 Sept 2024','dollarlexo@gmail.com','Payment Reference 0X373/2024/Security/Alsphat','VG0NEW1F96LSIRZ7XOUJ2C34','Wire Transfer','active','234873',1,1),('13 Aug 2024','dollarlexo@gmail.com','Payment Reference 2024/467/38/PLC/NA','GPWCOU6159J2EQYZADHNXIMT','EFT/ACH','Completed','$350,750.00',1,3),('13 Aug 2024','dollarlexo@gmail.com','Payment Reference 2024/467/38/PLC/NA','72UFXT6VY4RDPG9CI3M0JW1K','EFT/ACH','Completed','$234,873.00',1,4),('11 Jul 2024','dollarlexo@gmail.com','Purchase of Security Chip/46/48/LNP','ELGPW6YQC30J8D1UAKZBO2NT','Swift Exchange','completed','$190,000.00',1,5),('11 Aug 2024','alex@pegasus.org','Payment Reference 0X373/2024/Security/Alsphat','46AC752LZOU0FQRMNBWJXSVE','Swift Wire','completed','497,921.48',6,6),('15 Aug 2024','alex@pegasus.org','Payment Reference 2024/467/38/PLC/NA','WPX2HQKJ7VYODG0FUN469B5S','EFT/ACH Transfer','completed','514,225.79',6,7),('21 Aug 2024','alex@pegasus.org','Purchase of Security Chip/46/48/LNP/Cable','5A6CEY9N4VWSTHOQZ2IMUK7R','Wire Transfer','completed','503,208.40',6,8),('26 Aug 2024','alex@pegasus.org','Advance Artillery Construction','SFQ4K2D3VR1IGMPXTCYOZ7NB','EFT/ACH Transfer','completed','497,536.32',6,9),('30 Aug 2024','alex@pegasus.org','CyberPegagus/363/PNC/01','5LZMHYB3GUPJ4VQI1N6DX7FW','International  Wire','completed','485,656.33',6,10),('10 Sept 2024','alex@pegasus.org','PegasusVehicular/Purc/398/30','YFJB08M1IW5OQSUGXVL7NRH9','EFT/ACH Transfer','completed','507,435.07',6,11),('15 Sept 2024','alex@pegasus.org','IronDome/Cyber/3773-01','6SLDWC5RQA3E0NZV2XO8GYHP','International  Wire','completed','487,021.66',6,12),('21 Sept 2024','alex@pegasus.org','PurchasePayment/Code/1945','0OD3KF6RAEU72WNHCIXBS8LG','Wire Transfer','completed','531,530.42',6,13),('25 Sept 2024','alex@pegasus.org','PurchasePayment/Code/1976','5F0VW2PBK3TC81HQEX9IJUDL','EFT/ACH','completed','538,575.39',6,14),('29 Sept 2024','alex@pegasus.org','CyberPegagus/389/PNC/0111','GW9NQLCMVD3O08UZ2FPYKRST','Swift Exchange','completed','481,715.55',6,15),('05 Oct 2024','alex@pegasus.org','Payment Reference 2024/500/38/PLC/PG','L29XEISUN3ZAPR8OWY06HJ4T','Wire Transfer','completed','521,726.04',6,16),('07 Oct 2024','alex@pegasus.org','Payment Reference 0X112/2024/Security/Alsphat','8G02KVTXEY6JP4SD59LO1IW7','EFT/ACH Transfer','completed','495,969.52',6,17),('15 Oct 2024','alex@pegasus.org','CyberPegagus/123/PNC/009','XVTHFEO9WR4SKP2UZAGMLIB0','International  Wire','completed','499,806.07',6,18),('18 Oct 2024','alex@pegasus.org','IronDome/Cyber/3773-01','WF8K2V16MSA7E9LXCHB3IGO0','Wire Transfer','completed','534,845.03',6,19),('22 Oct 2024','alex@pegasus.org','Advance Artillery Construction','HJ76QPL0YB1VSXZGEA2CO8R9','EFT/ACH Transfer','completed','451,100.81',6,20);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-31  7:42:39
