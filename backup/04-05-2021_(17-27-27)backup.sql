-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: books
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_author` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'Андрей Богуславский'),(2,'Марк Саммерфильд'),(3,'М., Вильямс'),(4,'Уэс Маккинни'),(5,'Брюс Эккель'),(6,'Томас Кормен'),(7,'Чарльз Лейзерсон'),(8,'Рональд Ривест'),(9,'Клиффорд Штайн'),(10,'Дэвид Флэнаган'),(11,'Гэри Маклин Холл'),(12,'Джеймс Р. Грофф'),(13,'Люк Веллинг'),(14,'Сергей Мастицкий'),(15,'Джон Вудкок'),(16,'Джереми Блум'),(17,'А. Белов'),(18,'Сэмюэл Грингард'),(19,'Сет Гринберг'),(20,'Александр Сераков'),(21,'Тим Кедлек'),(22,'Пол Дейтел'),(23,'Харви Дейтел'),(24,'Роберт Мартин'),(25,'Энтони Грей'),(26,'Мартин Фаулер'),(27,'Прамодкумар Дж. Садаладж'),(28,'Джей Макгаврен'),(29,'Дрю Нейл');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) NOT NULL,
  `year` int NOT NULL,
  `num_pages` int NOT NULL,
  `about_book` varchar(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `deleted` datetime DEFAULT NULL,
  `views` int NOT NULL DEFAULT '0',
  `clicks` int NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (5,'Философия Java. 4-е полное изд.',2018,1,'Новая версия книги об главных вопросах программирования: отчего они возникают и какой подход применяет Java в их разрешении.',NULL,0,0,'27.jpg'),(6,'Алгоритмы: построение и анализ 3-е издание',2018,1,'Книга «Алгоритмы: построение и анализ» успешно соединяет в себе всесторонность охвата и строгость изложения материала.',NULL,0,0,'29.jpg'),(7,'JavaScript. Полное руководство',2020,1,'Справочник по самому популярному языку программирования!\r\n',NULL,0,0,'31.jpg'),(8,'Adaptive Code via C#:',2020,1,'описание',NULL,0,0,'32.jpg'),(9,'SQL: The Complete Referenc',2020,1,'описание',NULL,0,0,'33.jpg'),(10,'PHP and MySQL Web Development',2021,1,'описание',NULL,0,0,'34.jpg'),(11,'С ++ и компьютерная графика. Лекции и практикум по программированию на С ++',2003,1,'Книга предназначена для начальной подготовки программиста, владеющего языком Си++ и инструментальными средствами векторной компьютерной графики применительно к разработке программ в операционных системах (ОС) семейства Win32.',NULL,0,0,'22.jpg'),(12,'Программирование на Go. Разработка приложений XXI века',2013,1,'Данная книга представляет собой одновременно и учебник, и справочник, сводя воедино все знания, необходимые для того, чтобы продолжать освоение Go, думать на Go и писать на нем высокопроизводительные программы.\r\nАвтор приводит множество сравнений идиом программирования, демонстрируя преимущества Go перед более старыми языками и уделяя особое внимание ключевым инновациям.',NULL,3,1,'23.jpg'),(13,'Толковый словарь сетевых терминов и аббревиатур',2000,1,'описание',NULL,1,0,'25.jpg'),(14,'Python for Data Analysis',2017,1,'описание',NULL,0,0,'26.jpg'),(15,'Философия Java. 4-е полное изд.',2018,1,'Новая версия книги об главных вопросах программирования: отчего они возникают и какой подход применяет Java в их разрешении.',NULL,0,0,'27.jpg'),(16,'Алгоритмы: построение и анализ 3-е издание',2018,1,'Книга «Алгоритмы: построение и анализ» успешно соединяет в себе всесторонность охвата и строгость изложения материала.',NULL,0,0,'29.jpg'),(17,'JavaScript. Полное руководство',2020,1,'Справочник по самому популярному языку программирования!\r\n',NULL,0,0,'31.jpg'),(18,'Adaptive Code via C#:',2020,1,'описание',NULL,0,0,'32.jpg'),(19,'SQL: The Complete Referenc',2020,1,'описание',NULL,0,0,'33.jpg'),(20,'PHP and MySQL Web Development',2021,1,'описание',NULL,0,0,'34.jpg'),(21,'С ++ и компьютерная графика. Лекции и практикум по программированию на С ++',2003,1,'Книга предназначена для начальной подготовки программиста, владеющего языком Си++ и инструментальными средствами векторной компьютерной графики применительно к разработке программ в операционных системах (ОС) семейства Win32.',NULL,0,0,'22.jpg'),(22,'Программирование на Go. Разработка приложений XXI века',2013,1,'Данная книга представляет собой одновременно и учебник, и справочник, сводя воедино все знания, необходимые для того, чтобы продолжать освоение Go, думать на Go и писать на нем высокопроизводительные программы.\r\nАвтор приводит множество сравнений идиом программирования, демонстрируя преимущества Go перед более старыми языками и уделяя особое внимание ключевым инновациям.',NULL,3,1,'23.jpg'),(23,'Python for Data Analysis',2017,1,'описание',NULL,0,0,'26.jpg'),(24,'Философия Java. 4-е полное изд.',2018,1,'Новая версия книги об главных вопросах программирования: отчего они возникают и какой подход применяет Java в их разрешении.',NULL,0,0,'27.jpg'),(25,'JavaScript. Полное руководство',2020,1,'Справочник по самому популярному языку программирования!\r\n',NULL,0,0,'31.jpg'),(26,'Adaptive Code via C#:',2020,1,'описание',NULL,0,0,'32.jpg'),(27,'PHP and MySQL Web Development',2021,1,'описание',NULL,0,0,'34.jpg'),(28,'С ++ и компьютерная графика. Лекции и практикум по программированию на С ++',2003,1,'Книга предназначена для начальной подготовки программиста, владеющего языком Си++ и инструментальными средствами векторной компьютерной графики применительно к разработке программ в операционных системах (ОС) семейства Win32.',NULL,0,0,'22.jpg'),(29,'Программирование на Go. Разработка приложений XXI века',2013,1,'Данная книга представляет собой одновременно и учебник, и справочник, сводя воедино все знания, необходимые для того, чтобы продолжать освоение Go, думать на Go и писать на нем высокопроизводительные программы.\r\nАвтор приводит множество сравнений идиом программирования, демонстрируя преимущества Go перед более старыми языками и уделяя особое внимание ключевым инновациям.',NULL,3,1,'23.jpg'),(30,'Python for Data Analysis',2017,1,'описание',NULL,0,0,'26.jpg'),(31,'Философия Java. 4-е полное изд.',2018,1,'Новая версия книги об главных вопросах программирования: отчего они возникают и какой подход применяет Java в их разрешении.',NULL,0,0,'27.jpg'),(32,'JavaScript. Полное руководство',2020,1,'Справочник по самому популярному языку программирования!\r\n',NULL,0,0,'31.jpg'),(33,'SQL: The Complete Referenc',2020,1,'описание',NULL,0,0,'33.jpg'),(34,'PHP and MySQL Web Development',2021,1,'описание',NULL,0,0,'34.jpg');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relations`
--

DROP TABLE IF EXISTS `relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `relations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `book_id` int NOT NULL,
  `author_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `author_id` (`author_id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `relations_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `relations_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relations`
--

LOCK TABLES `relations` WRITE;
/*!40000 ALTER TABLE `relations` DISABLE KEYS */;
INSERT INTO `relations` VALUES (7,22,2),(8,22,5),(9,29,12),(10,21,13),(11,24,15),(12,17,29),(13,7,8),(14,32,10),(15,17,27),(16,29,9),(17,16,16),(18,33,9),(19,24,14);
/*!40000 ALTER TABLE `relations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-04 20:27:29
