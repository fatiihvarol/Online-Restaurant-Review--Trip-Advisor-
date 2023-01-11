-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: database_project
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `beverages`
--

DROP TABLE IF EXISTS `beverages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `beverages` (
  `BeverageId` int NOT NULL AUTO_INCREMENT,
  `BeverageName` varchar(45) DEFAULT NULL,
  `BeverageDescription` varchar(45) DEFAULT NULL,
  `BeveragePrice` double DEFAULT NULL,
  `isAlcoholic` tinyint(1) DEFAULT NULL,
  `RestaurantId` int NOT NULL,
  PRIMARY KEY (`BeverageId`),
  KEY `fk_beverages_restaurants1_idx` (`RestaurantId`),
  CONSTRAINT `fk_beverages_restaurants1` FOREIGN KEY (`RestaurantId`) REFERENCES `restaurants` (`RestaurantId`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beverages`
--

LOCK TABLES `beverages` WRITE;
/*!40000 ALTER TABLE `beverages` DISABLE KEYS */;
INSERT INTO `beverages` VALUES (24,'Milkshake','Refreshment',33,1,13),(25,'Water','water',32,2,13),(26,'Coffee','Espresso',20,2,13),(27,'Milkshake','Refreshment',50,2,14),(29,'İce Tea','Refreshment',132,2,14);
/*!40000 ALTER TABLE `beverages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foods`
--

DROP TABLE IF EXISTS `foods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `foods` (
  `FoodId` int NOT NULL AUTO_INCREMENT,
  `FoodName` varchar(45) DEFAULT NULL,
  `FoodDescription` varchar(45) DEFAULT NULL,
  `FoodPrice` double DEFAULT NULL,
  `isHot` tinyint(1) DEFAULT NULL,
  `RestaurantId` int NOT NULL,
  PRIMARY KEY (`FoodId`),
  KEY `fk_foods_restaurants1_idx` (`RestaurantId`),
  CONSTRAINT `fk_foods_restaurants1` FOREIGN KEY (`RestaurantId`) REFERENCES `restaurants` (`RestaurantId`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foods`
--

LOCK TABLES `foods` WRITE;
/*!40000 ALTER TABLE `foods` DISABLE KEYS */;
INSERT INTO `foods` VALUES (24,'Big-King','Double Burger',100,1,13),(25,'King Chicken','Chicken',55,1,13),(26,'Big-Mac!','Burger',100,1,14),(28,'Big Royal','Burger',156,1,14);
/*!40000 ALTER TABLE `foods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logs` (
  `LogId` int NOT NULL AUTO_INCREMENT,
  `Message` longtext,
  `UserId` int DEFAULT NULL,
  PRIMARY KEY (`LogId`),
  KEY `fk_logs_users1_idx` (`UserId`),
  CONSTRAINT `fk_logs_users1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (80,'SELECT * FROM users WHERE Username = ?',NULL),(81,'INSERT INTO users (name,surname,UserName,Password,UserType) VALUES (?,?,?,?,?)',NULL),(82,'SELECT * FROM users WHERE UserName = ? and Password = ?',16),(83,'SELECT Score FROM reviews where RestaurantId = ?',19),(84,'SELECT * FROM restaurants',NULL),(85,'INSERT INTO reviews (Message,Score,UserId,RestaurantId) VALUES (?,?,?,?)',16),(86,'SELECT * FROM restaurants',16),(87,'SELECT Score FROM reviews where RestaurantId = ?',19),(88,'SELECT * FROM restaurants',NULL),(89,'INSERT INTO reviews (Message,Score,UserId,RestaurantId) VALUES (?,?,?,?)',16),(90,'SELECT * FROM restaurants',16),(91,'SELECT Score FROM reviews where RestaurantId = ?',19),(92,'SELECT * FROM restaurants where RestaurantId = ?',NULL),(93,'INSERT INTO logs (UserId,Message) VALUES (?,?)',16),(94,'SELECT * FROM restaurants where RestaurantId = ?',NULL),(95,'INSERT INTO logs (UserId,Message) VALUES (?,?)',16),(96,'SELECT * FROM users WHERE Username = ?',NULL),(97,'INSERT INTO users (name,surname,UserName,Password,UserType) VALUES (?,?,?,?,?)',NULL),(98,'SELECT * FROM users WHERE UserName = ? and Password = ?',17),(99,'SELECT Score FROM reviews where RestaurantId = ?',19),(100,'SELECT Score FROM reviews where RestaurantId = ?',20),(101,'SELECT * FROM restaurants',NULL),(102,'INSERT INTO reviews (Message,Score,UserId,RestaurantId) VALUES (?,?,?,?)',17),(103,'SELECT * FROM restaurants',17),(104,'SELECT Score FROM reviews where RestaurantId = ?',19),(105,'SELECT Score FROM reviews where RestaurantId = ?',20),(106,'SELECT * FROM restaurants',NULL),(107,'INSERT INTO reviews (Message,Score,UserId,RestaurantId) VALUES (?,?,?,?)',17),(108,'SELECT * FROM restaurants',17),(109,'SELECT Score FROM reviews where RestaurantId = ?',19),(110,'SELECT Score FROM reviews where RestaurantId = ?',20),(111,'SELECT * FROM restaurants',NULL),(112,'INSERT INTO reviews (Message,Score,UserId,RestaurantId) VALUES (?,?,?,?)',17),(113,'SELECT * FROM restaurants',17),(114,'SELECT Score FROM reviews where RestaurantId = ?',19),(115,'SELECT Score FROM reviews where RestaurantId = ?',20),(116,'SELECT * FROM restaurants where RestaurantId = ?',NULL),(117,'INSERT INTO logs (UserId,Message) VALUES (?,?)',16),(118,'SELECT * FROM restaurants where RestaurantId = ?',NULL),(119,'INSERT INTO logs (UserId,Message) VALUES (?,?)',16),(120,'SELECT * FROM restaurants where RestaurantId = ?',NULL),(121,'INSERT INTO logs (UserId,Message) VALUES (?,?)',17),(122,'SELECT * FROM restaurants where RestaurantId = ?',NULL),(123,'INSERT INTO logs (UserId,Message) VALUES (?,?)',17),(124,'SELECT Score FROM reviews where RestaurantId = ?',19),(125,'SELECT Score FROM reviews where RestaurantId = ?',20),(126,'SELECT * FROM users WHERE UserName = ? and Password = ?',20),(127,'SELECT * FROM users WHERE UserName = ? and Password = ?',NULL),(128,'SELECT UserId from Restaurants where RestaurantId = $id',20),(129,'SELECT * FROM foods where RestaurantId = $id',20),(130,'UPDATE foods SET FoodName=\'Big-Mac!\',FoodDescription=\'Burger\',FoodPrice=\'100\',isHot=\'1\'WHERE FoodId=26',NULL),(131,'SELECT UserId from Restaurants where RestaurantId = $id',20),(132,'SELECT * FROM foods where RestaurantId = $id',20),(133,'DELETE FROM Beverages WHERE BeverageId =$id',NULL),(134,'SELECT UserId from Restaurants where RestaurantId = $id',20),(135,'SELECT * FROM foods where RestaurantId = $id',20),(136,'DELETE FROM foods WHERE FoodId =$id',NULL),(137,'SELECT UserId from Restaurants where RestaurantId = $id',20),(138,'SELECT * FROM foods where RestaurantId = $id',20),(139,'INSERT INTO foods (foodname,fooddescription,foodprice,ishot,restaurantid) VALUES (?,?,?,?,?)',NULL),(140,'SELECT UserId from Restaurants where RestaurantId = $id',20),(141,'SELECT * FROM foods where RestaurantId = $id',20),(142,'INSERT INTO beverages (Beveragename,Beveragedescription,Beverageprice,isalcoholic,restaurantid) VALUES (?,?,?,?,?)',NULL),(143,'SELECT UserId from Restaurants where RestaurantId = $id',20),(144,'SELECT * FROM foods where RestaurantId = $id',20);
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant_types`
--

DROP TABLE IF EXISTS `restaurant_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restaurant_types` (
  `TypeId` int NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(45) DEFAULT NULL,
  `TypeDescription` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant_types`
--

LOCK TABLES `restaurant_types` WRITE;
/*!40000 ALTER TABLE `restaurant_types` DISABLE KEYS */;
INSERT INTO `restaurant_types` VALUES (1,'japanese','sea foods'),(2,'mexican','taco etc.'),(3,'turkish','kebab etc.'),(4,'american','burger etc.'),(5,'italian','pizza etc.'),(6,'other','all');
/*!40000 ALTER TABLE `restaurant_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restaurants` (
  `RestaurantId` int NOT NULL AUTO_INCREMENT,
  `UserId` int DEFAULT NULL,
  `RestaurantName` varchar(50) DEFAULT NULL,
  `About` varchar(45) DEFAULT NULL,
  `ServiceScore` double DEFAULT '0',
  `TypeId` int NOT NULL,
  PRIMARY KEY (`RestaurantId`),
  KEY `fk_restaurants_restaurant_types_idx` (`TypeId`),
  CONSTRAINT `fk_restaurants_restaurant_types` FOREIGN KEY (`TypeId`) REFERENCES `restaurant_types` (`TypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurants`
--

LOCK TABLES `restaurants` WRITE;
/*!40000 ALTER TABLE `restaurants` DISABLE KEYS */;
INSERT INTO `restaurants` VALUES (13,19,'Burger King','burger,refreshments etc.',0,4),(14,20,'Mc-Donald\'s','Fast Food',0,4);
/*!40000 ALTER TABLE `restaurants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `ReviewId` int NOT NULL AUTO_INCREMENT,
  `Message` longtext,
  `Score` double DEFAULT NULL,
  `UserId` int DEFAULT NULL,
  `RestaurantId` int DEFAULT NULL,
  PRIMARY KEY (`ReviewId`),
  KEY `fk_reviews_users1_idx` (`UserId`),
  KEY `fk_reviews_restaurants1_idx` (`RestaurantId`),
  CONSTRAINT `fk_reviews_restaurants1` FOREIGN KEY (`RestaurantId`) REFERENCES `restaurants` (`RestaurantId`),
  CONSTRAINT `fk_reviews_users1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (64,'Cool!!',5,16,13),(65,'It was realy bad :(',2,16,13),(66,'Not Bad',4,17,13),(67,'Good !',5,17,13),(68,'Great place.',5,17,14);
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `UserId` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `Surname` varchar(45) DEFAULT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `UserType` int NOT NULL,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (16,'fatih','varol','fatihvarol','123',0),(17,'yavuz','yılmaz','Yavuzylmz','123',0),(18,'Safa','Çevik','Safacevik','123',0),(19,'Ali ','Cuvitoğlu','burgerking','123',1),(20,'Meltem','Yıldırım','mcdonalds','123',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-04  1:22:10
