CREATE DATABASE  IF NOT EXISTS `dbsupplier` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dbsupplier`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: dbsupplier
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `idproducts` int NOT NULL AUTO_INCREMENT,
  `prod_image` varchar(512) DEFAULT NULL,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(900) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quantity` int NOT NULL,
  `currency` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category` varchar(45) NOT NULL,
  `prod_condition` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idproducts`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (43,'Neon Genesis Evangelion Figurine.jpg','Neon Genesis Evangelion Figurine','Figurine of EVA Unit-01 in battle stance.',17,'PhP','Figurine','New','Low Stock',1800.00,'2024-07-21 08:42:11','2024-07-21 08:42:11'),(44,'JoJo’s Bizarre Adventure Plushie.jfif','JoJo’s Bizarre Adventure Plushie','Plushie of Jotaro Kujo with his hat.',12,'PhP','Plush','New','Low Stock',950.00,'2024-07-21 09:05:22','2024-07-21 09:10:39'),(45,'Cowboy Bebop Keychain.jpg','Cowboy Bebop Keychain','Keychain of Spike Spiegel’s ship.',30,'PhP','Keychain','New','In Stock',210.00,'2024-07-21 09:08:09','2024-07-21 09:08:09'),(46,'My Hero Academia Figurine.jpg','My Hero Academia Figurine','Figurine of Katsuki Bakugo in action pose.',20,'PhP','Figurine','New','Low Stock',1400.00,'2024-07-21 09:09:28','2024-07-21 09:09:28'),(47,'One Punch Man Saitama Plushie.jpg','One Punch Man Saitama Plushie','Plushie of Saitama in his hero suit.',22,'PhP','Plush','New','In Stock',750.00,'2024-07-21 09:10:21','2024-07-21 09:10:21'),(48,'Fairy Tail Keychain.jpg','Fairy Tail Keychain','Keychain featuring the Fairy Tail guild logo.',45,'PhP','Keychain','New','In Stock',220.00,'2024-07-21 09:11:35','2024-07-23 09:20:08'),(49,'Fullmetal Alchemist Figurine.jpg','Fullmetal Alchemist Figurine','Edward Elric action figure with alchemy effects.',18,'PhP','Figurine','New','Low Stock',1300.00,'2024-07-21 09:12:38','2024-07-21 09:12:38'),(50,'Demon Slayer Tanjiro Plushie.jpg','Demon Slayer Tanjiro Plushie','Plushie of Tanjiro Kamado with his signature haori.',25,'PhP','Plush','New','In Stock',850.00,'2024-07-21 09:13:47','2024-07-21 09:13:47'),(51,'Tokyo Ghoul Keychain.jpg','Tokyo Ghoul Keychain','Keychain featuring Kaneki Ken\\\'s mask.',35,'PhP','Keychain','New','In Stock',180.00,'2024-07-21 09:14:45','2024-07-21 09:14:45'),(52,'Sword Art Online Figurine.jpg','Sword Art Online Figurine','Figurine of Kirito with his Elucidator sword.',15,'PhP','Figurine','New','Low Stock',1500.00,'2024-07-21 09:18:59','2024-07-21 09:18:59'),(53,'One Piece Luffy Plushie.jpg','One Piece Luffy Plushie','Plushie of Monkey D. Luffy and other characters wearing a Hat.',20,'PhP','Plush','New','Low Stock',900.00,'2024-07-21 09:20:19','2024-07-21 09:20:19'),(54,'Attack on Titan Keychain.jpg','Attack on Titan Keychain','Keychain with the Survey Corps emblem.',40,'PhP','Keychain','New','In Stock',200.00,'2024-07-21 09:21:12','2024-07-21 09:21:12'),(55,'Naruto Shippuden Figurine.jfif','Naruto Shippuden Figurine','Action figure of Naruto in Sage Mode.',25,'PhP','Figurine','New','In Stock',1200.00,'2024-07-21 09:22:05','2024-07-21 09:22:05'),(56,'My Hero Academia Plushie.jpg','My Hero Academia Plushie','Soft plushie of Deku from My Hero Academia.',30,'PhP','Plush','New','In Stock',800.00,'2024-07-21 09:23:05','2024-07-21 09:23:05'),(57,'Dragon Ball Z Keychain.jfif','Dragon Ball Z Keychain','Dragon Ball Z themed keychain featuring Goku.',50,'PhP','Keychain','New','In Stock',150.00,'2024-07-21 09:24:07','2024-07-21 09:24:07');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_accounts`
--

DROP TABLE IF EXISTS `user_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_accounts` (
  `idusers` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `house_no` varchar(45) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `zipcode` varchar(45) DEFAULT NULL,
  `contact_no` varchar(15) NOT NULL,
  `user_type` varchar(45) NOT NULL,
  `user_role` varchar(45) DEFAULT NULL,
  `company_name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `token` varchar(255) DEFAULT NULL,
  `verified_email` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idusers`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_accounts`
--

LOCK TABLES `user_accounts` WRITE;
/*!40000 ALTER TABLE `user_accounts` DISABLE KEYS */;
INSERT INTO `user_accounts` VALUES (16,'test1','testing1','test1@mail.com','$2y$10$4Nj31GMOBiyf8bzqBV8RNugIBdMIMsV8ytQ9y39OjYhRnNN8I3Nv.',NULL,NULL,NULL,NULL,'901018421','Admin','Supplier','Cunosati Supplier Company','2024-07-21 11:27:57','2024-07-21 11:27:57',NULL,NULL),(17,'jade','tipon','jade@gmail.com','$2y$10$5mynQE9T64OlFkNzMRlKNe3QMqvNPaJboEf68DxDhKj/vxsZPKEs.',NULL,NULL,NULL,NULL,'94014021','Admin','Supplier','Cunosati Supplier Company','2024-07-23 14:27:02','2024-07-23 14:27:02',NULL,NULL),(18,'keanu','cepter','keanucepter2@gmail.com','$2y$10$QGLYtDAufB9OZY/nmfUo4eVTdO6xM.90stP3THscIGXkm.zhB.B.u',NULL,NULL,NULL,NULL,'0','Admin','Supplier','Cunosati Supplier Company','2024-07-23 15:14:45','2024-07-23 15:14:45','ya29.a0AXooCgsWDUxj8G0sz-Urc0OXvktcmld3ZuSE7anQ57RMxabWY00Vc3n-uwxJpsRJZllKlo7DQaYhmsdiWZhdgbObrLcmJXGBeo5hjspMCZSZX4FQA8cPrF9g3vZgYEfXl4_TPeriKpMR8mFsPEkPvHyW94a7o9Q674x4aCgYKAdkSARMSFQHGX2MiDVq4RUWlszhQDaKJxm4rgA0171',1);
/*!40000 ALTER TABLE `user_accounts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-24  9:10:05
