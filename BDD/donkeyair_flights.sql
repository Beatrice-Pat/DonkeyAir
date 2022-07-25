-- MySQL dump 10.13  Distrib 8.0.29, for macos12 (x86_64)
--
-- Host: localhost    Database: donkeyair
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `flights`
--

DROP TABLE IF EXISTS `flights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `flights` (
  `id` int NOT NULL AUTO_INCREMENT,
  `from` varchar(45) NOT NULL,
  `to` varchar(45) NOT NULL,
  `schedule` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `flightduration` varchar(5) NOT NULL,
  `vol_number` varchar(5) NOT NULL,
  `price` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flights`
--

LOCK TABLES `flights` WRITE;
/*!40000 ALTER TABLE `flights` DISABLE KEYS */;
INSERT INTO `flights` VALUES (1,'Paris, France CDG','New York, USA JFK','08:30 - 10:45','2022-08-01','08h15','DA100','300€'),(2,'New York, USA JFK','Paris, France CDG','14:00 - 02:30 (+1 jour)','2022-08-01','07h20','DA101','300€'),(3,'Paris, France CDG','Pointe à Pitre, Guadeloupe PTP','08:30 - 11:20','2022-08-02','08h40','DA200','350€'),(4,'Pointe à Pitre, Guadeloupe PTP','Paris, France CDG','14:00 - 02:00 (+1 jour)','2022-08-02','08h00','DA201','350€'),(5,'Paris, France CDG','Saint Denis, Réunion RUN','08:30 - 19:30','2022-08-03','11h00','DA300','650€'),(6,'Saint Denis, Réunion RUN','Paris, France CDG','21:30 - 08:30 (+1 jour)','2022-08-03','11h20','DA301','650€'),(7,'Paris, France CDG','New York, USA JFK','08:30 - 10:45','2022-08-15','08h15','DA100','330€'),(8,'New York, USA JFK','Paris, France CDG','14:00 - 02:30 (+1 jour)','2022-08-15','07h20','DA101','360€'),(9,'Paris, France CDG','Pointe à Pitre, Guadeloupe PTP','08:30 - 11:20','2022-08-16','08h40','DA200','380€'),(10,'Pointe à Pitre, Guadeloupe PTP','Paris, France CDG','14:00 - 02:00 (+1 jour)','2022-08-16','08h00','DA201','390€'),(11,'Paris, France CDG','Saint Denis, Réunion RUN','08:30 - 19:30','2022-08-17','11h00','DA300','950€'),(12,'Saint Denis, Réunion RUN','Paris, France CDG','21:30 - 08:30 (+1 jour)','2022-08-17','11h20','DA301','1050€');
/*!40000 ALTER TABLE `flights` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-25 10:52:13
