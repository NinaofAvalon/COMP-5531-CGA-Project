-- MySQL dump 10.13  Distrib 8.0.28, for macos11 (x86_64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `group_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1023 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` VALUES (1001,'hello','m_adels','22-04-04 06:58am',NULL),(1002,'hi!!','m_adels','22-04-05 04:00pm',NULL),(1003,'hello','m_adels','22-04-06 03:11am',NULL),(1004,'hello','m_adels','22-04-06 03:14am',NULL),(1005,'hello','m_adels','22-04-06 03:41am',10),(1006,'what\'s up?','a_ulyss','22-04-06 03:42am',10),(1007,'is everything all right?','a_ulyss','22-04-06 03:42am',10),(1008,'hello ladies','k_guerr','22-04-06 03:47am',10),(1009,'hello','k_guerr','22-04-06 03:53am',10),(1010,'what\'s up','k_guerr','22-04-06 03:54am',10),(1011,'ijo','k_guerr','22-04-06 03:58am',10),(1012,'HELLO','m_adels','22-04-06 04:09am',10),(1013,'kjo','m_adels','22-04-06 04:11am',10),(1014,'jkl','a_ulyss','22-04-06 04:14am',10),(1015,'monsieur','a_ulyss','22-04-06 04:17am',10),(1016,'jhho','a_ulyss','22-04-06 04:23am',10),(1017,'hello','a_ulyss','22-04-06 04:24am',10),(1018,'hll','a_ulyss','22-04-06 04:26am',10),(1019,'hello','a_ulyss','22-04-06 04:28am',10),(1020,'hello','m_adels','22-04-07 05:47pm',10),(1021,'hello','m_adels','22-04-19 05:15am',20),(1022,'how are you doing today?','s_milla','22-04-19 05:16am',20);
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_group`
--

DROP TABLE IF EXISTS `class_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `class_group` (
  `group_id` int NOT NULL,
  `group_name` varchar(100) DEFAULT NULL,
  `leader_id` int NOT NULL,
  `course_id` int DEFAULT NULL,
  PRIMARY KEY (`group_id`),
  KEY `leader_id` (`leader_id`),
  KEY `class_group_ibfk_2` (`course_id`),
  CONSTRAINT `class_group_ibfk_1` FOREIGN KEY (`leader_id`) REFERENCES `student` (`student_id`),
  CONSTRAINT `class_group_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_group`
--

LOCK TABLES `class_group` WRITE;
/*!40000 ALTER TABLE `class_group` DISABLE KEYS */;
INSERT INTO `class_group` VALUES (10,'group 10',1005,1041),(12,'group 12',1003,1036),(20,'group 9',1011,1036);
/*!40000 ALTER TABLE `class_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) NOT NULL,
  `instructor_id` int DEFAULT NULL,
  `TA_id` int NOT NULL,
  `course_section` varchar(100) NOT NULL,
  `course_term` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_fk` (`instructor_id`),
  CONSTRAINT `course_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=1048 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1036,'COMP5567',123456,133456,'AP','Winter 2022'),(1037,'COMP5531',123457,133457,'DS','Winter 2022'),(1038,'COMP5544',123458,133458,'RT','Winter 2022'),(1039,'COMP1124',123459,133459,'SS','Winter 2022'),(1040,'ENCS6721',123460,133462,'ZP','Winter 2022'),(1041,'COMP5523',123461,133463,'AC','Winter 2022'),(1042,'COMP5567',123456,133456,'NN','Winter 2022'),(1043,'COMP5531',123457,133457,'ZP','Winter 2022'),(1044,'COMP5544',123458,133458,'RT','Winter 2022'),(1045,'COMP1124',123459,133459,'SS','Winter 2022'),(1046,'ENCS6721',123460,133462,'ZP','Winter 2022');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_enrolled`
--

DROP TABLE IF EXISTS `course_enrolled`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_enrolled` (
  `course_id` int NOT NULL,
  `student_id` int NOT NULL,
  PRIMARY KEY (`course_id`,`student_id`),
  KEY `course_enrolled_ibfk_1` (`student_id`),
  CONSTRAINT `course_enrolled_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE,
  CONSTRAINT `course_enrolled_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_enrolled`
--

LOCK TABLES `course_enrolled` WRITE;
/*!40000 ALTER TABLE `course_enrolled` DISABLE KEYS */;
INSERT INTO `course_enrolled` VALUES (1036,1001),(1036,1002),(1036,1003),(1036,1004),(1041,1005),(1041,1006),(1036,1007),(1041,1007),(1036,1010),(1036,1011);
/*!40000 ALTER TABLE `course_enrolled` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_taught`
--

DROP TABLE IF EXISTS `course_taught`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_taught` (
  `course_id` int NOT NULL,
  `instructor_id` int NOT NULL,
  PRIMARY KEY (`course_id`,`instructor_id`),
  KEY `course_taught_ibfk_1` (`instructor_id`),
  CONSTRAINT `course_taught_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`id`) ON DELETE CASCADE,
  CONSTRAINT `course_taught_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_taught`
--

LOCK TABLES `course_taught` WRITE;
/*!40000 ALTER TABLE `course_taught` DISABLE KEYS */;
INSERT INTO `course_taught` VALUES (1036,123456),(1042,123456),(1037,123457),(1043,123457),(1038,123458),(1044,123458),(1039,123459),(1045,123459),(1040,123460),(1046,123460),(1041,123461);
/*!40000 ALTER TABLE `course_taught` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discussion_board`
--

DROP TABLE IF EXISTS `discussion_board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discussion_board` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `creator` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `creation_date` varchar(100) DEFAULT NULL,
  `course_id` int DEFAULT NULL,
  `group_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `creator` (`creator`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `discussion_board_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `users` (`username`),
  CONSTRAINT `discussion_board_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1010 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussion_board`
--

LOCK TABLES `discussion_board` WRITE;
/*!40000 ALTER TABLE `discussion_board` DISABLE KEYS */;
INSERT INTO `discussion_board` VALUES (1001,'test post','m_adels','this is a test post','2022-04-04',1041,10),(1002,'This is another post','m_adels','this is another test post','22-04-06 05:13pm',1041,10),(1003,'This is another post','m_adels','this is another test post','22-04-06 05:13pm',1041,10),(1004,'let\'s talk about this','m_adels','this is interesting','22-04-06 05:18pm',1041,10),(1005,'another one','m_adels','hello','22-04-06 05:19pm',1036,20),(1006,'this is my post','m_adels','whaddup','22-04-06 05:20pm',1036,20),(1007,'Post','a_ulyss','This is my first post','22-04-07 01:36am',1041,10),(1008,'another','a_ulyss','and another one','22-04-07 01:38am',1041,10),(1009,'Let\'s about programming languages!','s_milla','What are your favorite programming languages? Let me know in the comments','22-04-19 05:47am',1036,20);
/*!40000 ALTER TABLE `discussion_board` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_title` varchar(100) NOT NULL,
  `start_time` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `group_id` int NOT NULL,
  `monthNumber` int NOT NULL,
  `dayNumber` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `class_group` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1005 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1001,'group meeting','09:30','10:30','we will discuss our project requirements',10,4,3),(1002,'Backend','19:30','21:00','Adding the backend part to the website',10,4,28),(1003,'discussion','19:30','21:30','talk about project ',10,4,15),(1004,'group meeting','02:00','04:00','we will discuss our project requirements',20,4,4);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feed`
--

DROP TABLE IF EXISTS `feed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feed` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullName` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `feedContent` text NOT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  CONSTRAINT `feed_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1005 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feed`
--

LOCK TABLES `feed` WRITE;
/*!40000 ALTER TABLE `feed` DISABLE KEYS */;
INSERT INTO `feed` VALUES (1003,'Maureen Adelson','m_adels','this is my first post',NULL),(1004,'Saski Millard','s_milla','It\'s so exciting that we have a feed!!','');
/*!40000 ALTER TABLE `feed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instructor`
--

DROP TABLE IF EXISTS `instructor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `instructor` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructor`
--

LOCK TABLES `instructor` WRITE;
/*!40000 ALTER TABLE `instructor` DISABLE KEYS */;
INSERT INTO `instructor` VALUES (123456,1007,'Derek','Daniels','1959-04-20',514610998,'derek_daniels@gmail.com'),(123457,1008,'Jack','Smith','1970-06-03',514655099,'jack_smith@gmail.com'),(123458,1009,'Malakai','Michael','1988-10-03',514655099,'malakai_michael@gmail.com'),(123459,1010,'Barbara','Blurp','1930-06-03',514655099,'barbara_blurph@gmail.com'),(123460,1011,'Andrea','Hamilton','1970-01-01',514655099,'andrea_hamilton@gmail.com'),(123461,1012,'Keisha','Jacquet','1990-02-03',514655099,'keisha_jacquet@gmail.com');
/*!40000 ALTER TABLE `instructor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL,
  `post_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `feed` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1001 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `replies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `creator` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `creation_date` varchar(100) DEFAULT NULL,
  `post_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `discussion_board` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1068 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` VALUES (1001,'m_adels','this is a test reply','2022-04-05',1001),(1002,'m_adels','hello','22-04-05 03:29am',1001),(1003,'m_adels','hello','22-04-05 03:29am',1001),(1004,'m_adels','hello','22-04-05 03:29am',1001),(1005,'m_adels','hello','22-04-05 03:30am',1001),(1006,'m_adels','hello','22-04-05 03:31am',1001),(1007,'m_adels','hello','22-04-05 03:31am',1001),(1008,'m_adels','hello','22-04-05 03:31am',1001),(1009,'m_adels','hello','22-04-05 03:32am',1001),(1010,'m_adels','','22-04-05 03:32am',1001),(1011,'m_adels','hello','22-04-05 03:32am',1001),(1012,'m_adels','hello','22-04-05 03:34am',1001),(1013,'m_adels','hello','22-04-05 03:34am',1001),(1014,'m_adels','hello','22-04-05 03:35am',1001),(1015,'m_adels','hello','22-04-05 03:39am',1001),(1016,'m_adels','comment ca va','22-04-05 03:41am',1001),(1017,'m_adels','hello','22-04-05 03:42am',1001),(1018,'m_adels','hello','22-04-05 03:42am',1001),(1019,'m_adels','hello','22-04-05 03:42am',1001),(1020,'m_adels','comment ca va','22-04-05 03:42am',1001),(1021,'m_adels','comment ca va','22-04-05 03:43am',1001),(1022,'m_adels','comment ca va','22-04-05 03:43am',1001),(1023,'m_adels','hello','22-04-05 03:43am',1001),(1024,'m_adels','comment ca va','22-04-05 03:43am',1001),(1025,'m_adels','comment ca va','22-04-05 03:44am',1001),(1026,'m_adels','hello','22-04-05 03:44am',1001),(1027,'m_adels','this is my reply','22-04-05 03:45am',1001),(1028,'m_adels','this is my reply','22-04-05 03:46am',1001),(1029,'m_adels','hello','22-04-05 03:46am',1001),(1030,'m_adels','this is my reply','22-04-05 03:46am',1001),(1031,'m_adels','this is my reply','22-04-05 03:46am',1001),(1032,'m_adels','hello','22-04-05 03:46am',1001),(1033,'m_adels','hello','22-04-05 03:46am',1001),(1034,'m_adels','comment ca va','22-04-05 03:46am',1001),(1035,'m_adels','comment ca va','22-04-05 03:49am',1001),(1036,'m_adels','hello','22-04-05 03:49am',1001),(1037,'m_adels','hello','22-04-05 03:49am',1001),(1038,'m_adels','hello','22-04-05 03:52am',1001),(1039,'m_adels','hello','22-04-05 03:52am',1001),(1040,'m_adels','hello','22-04-05 03:52am',1001),(1041,'m_adels','hello','22-04-05 03:54am',1001),(1042,'m_adels','hello','22-04-05 03:55am',1001),(1043,'m_adels','hello','22-04-05 03:55am',1001),(1044,'m_adels','hello','22-04-05 03:55am',1001),(1045,'m_adels','hello','22-04-05 03:57am',1001),(1046,'m_adels','hello','22-04-05 03:59am',1001),(1047,'m_adels','hello','22-04-05 03:59am',1001),(1048,'m_adels','hello','22-04-05 03:59am',1001),(1049,'m_adels','hello','22-04-05 04:01am',1001),(1050,'m_adels','hello','22-04-05 04:03am',1001),(1051,'m_adels','hello','22-04-05 04:04am',1001),(1052,'m_adels','he','22-04-05 04:04am',1001),(1053,'m_adels','he','22-04-05 04:08am',1001),(1054,'m_adels','is this working','22-04-05 04:08am',1001),(1055,'m_adels','boop','22-04-05 04:10am',1001),(1056,'m_adels','boop','22-04-05 04:11am',1001),(1057,'m_adels','boop','22-04-05 04:11am',1001),(1058,'m_adels','bla bla bla','22-04-05 04:11am',1001),(1059,'m_adels','this is a great post','22-04-05 04:00pm',1001),(1060,'m_adels','','22-04-07 01:09am',1002),(1061,'m_adels','hello','22-04-07 01:11am',1002),(1062,'m_adels','it\'s working','22-04-07 01:11am',1002),(1063,'m_adels','whaddup','22-04-07 01:11am',1003),(1064,'m_adels','this is a reply to this post','22-04-07 01:12am',1006),(1065,'k_guerr','this is a really long thread','22-04-07 01:21am',1001),(1066,'m_adels','this is a good post','22-04-07 03:15am',1008),(1067,'s_milla','i want to reply to this post','22-04-19 05:17am',1001);
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stud_in_group`
--

DROP TABLE IF EXISTS `stud_in_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stud_in_group` (
  `group_id` int NOT NULL,
  `student_id` int NOT NULL,
  PRIMARY KEY (`group_id`,`student_id`),
  KEY `stud_in_group_ibfk_1` (`student_id`),
  CONSTRAINT `stud_in_group_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE,
  CONSTRAINT `stud_in_group_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `class_group` (`group_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stud_in_group`
--

LOCK TABLES `stud_in_group` WRITE;
/*!40000 ALTER TABLE `stud_in_group` DISABLE KEYS */;
INSERT INTO `stud_in_group` VALUES (12,1001),(12,1002),(12,1003),(12,1004),(10,1005),(10,1006),(10,1007),(20,1007),(20,1010),(20,1011);
/*!40000 ALTER TABLE `stud_in_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `phone` int DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1012 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1001,1013,'Daniel','Burnham','1995-04-20',514666099),(1002,1014,'John','Anselme','1994-05-22',514666099),(1003,1015,'Marie','Dorvilier','1993-01-20',514666099),(1004,1016,'Becky','Hilaire','1999-03-20',514666099),(1005,1017,'Athena','Ulysse','1995-11-11',514666099),(1006,1018,'Karol','Guerrier','1996-12-01',514666099),(1007,1006,'Maureen','Adelson','1995-10-23',514666099),(1008,1025,'Natasha','Grier','1995-10-20',514666432),(1009,1026,'Portia','Simmons','1997-10-30',514908999),(1010,1027,'Mikhail','Edwards','2000-02-20',514543678),(1011,1028,'Saski','Millard','1994-09-11',514877654);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_group`
--

DROP TABLE IF EXISTS `student_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_group` (
  `group_id` int NOT NULL,
  `group_name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `leader_id` int NOT NULL,
  `course_id` int DEFAULT NULL,
  `student_id` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_group`
--

LOCK TABLES `student_group` WRITE;
/*!40000 ALTER TABLE `student_group` DISABLE KEYS */;
INSERT INTO `student_group` VALUES (10,'group 10',1005,1041,1005),(10,'group 10',1005,1041,1006),(10,'group 10',1005,1041,1007),(12,'group 12',1003,1036,1001),(12,'group 12',1003,1036,1002),(12,'group 12',1003,1036,1003),(12,'group 12',1003,1036,1004),(20,'group 9',1011,1036,1007),(20,'group 9',1011,1036,1010),(20,'group 9',1011,1036,1011);
/*!40000 ALTER TABLE `student_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TA`
--

DROP TABLE IF EXISTS `TA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TA` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `ta_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TA`
--

LOCK TABLES `TA` WRITE;
/*!40000 ALTER TABLE `TA` DISABLE KEYS */;
INSERT INTO `TA` VALUES (133456,1019,'Denzel','Moomg','1987-04-20',514666099,'denzel_moomg@gmail.com'),(133457,1020,'Jeremiah','Peterson','1987-05-20',514666099,'jeremiah_peterson@gmail.com'),(133458,1021,'May','Washington','1987-04-24',514666099,'may_washington@gmail.com'),(133459,1022,'Bella','Phillips','1987-10-20',514666099,'bella_philips@gmail.com'),(133462,1023,'Amber','Skyler','1985-03-11',514666099,'amber_skyler@gmail.com'),(133463,1024,'Kevin','Kylepson','1987-04-20',514666099,'kevin_kylepson@gmail.com');
/*!40000 ALTER TABLE `TA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `term`
--

DROP TABLE IF EXISTS `term`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `term` (
  `term_id` int NOT NULL AUTO_INCREMENT,
  `term_season` varchar(10) DEFAULT NULL,
  `term_year` varchar(10) DEFAULT NULL,
  `term_begin_date` varchar(100) DEFAULT NULL,
  `term_end_date` varchar(100) DEFAULT NULL,
  `is_term_now` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `term` (`is_term_now`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `term`
--

LOCK TABLES `term` WRITE;
/*!40000 ALTER TABLE `term` DISABLE KEYS */;
INSERT INTO `term` VALUES (1,'Winter','2021','2021-01-06','2021-04-22',NULL),(2,'Fall','2021','2021-09-06','2021-12-22',NULL),(3,'Winter','2022','2022-01-06','2022-04-23','YES');
/*!40000 ALTER TABLE `term` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uploads`
--

DROP TABLE IF EXISTS `uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `uploads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `file` varbinary(500) NOT NULL,
  `course_id` int NOT NULL,
  `file_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  CONSTRAINT `uploads_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1006 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploads`
--

LOCK TABLES `uploads` WRITE;
/*!40000 ALTER TABLE `uploads` DISABLE KEYS */;
INSERT INTO `uploads` VALUES (1004,'m_adels',_binary 'Asg4.pdf',1041,NULL),(1005,'m_adels',_binary 'Asg3.pdf',1036,NULL);
/*!40000 ALTER TABLE `uploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `profilePicture` varbinary(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1029 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1006,'m_adels','56789','maureen_adelson@hotmail.ca',_binary 'MaureenAdelson_1.jpg'),(1007,'d_daniel','12345','derek_daniels@gmail.com',NULL),(1008,'j_smith','12345','jack_smith@gmail.com',NULL),(1009,'m_micha','12345','malakai_michael@gmail.com',NULL),(1010,'b_blurp','12345','barbara_blurph@gmail.com',NULL),(1011,'a_hamilt','12345','andrea_hamilton@gmail.com',NULL),(1012,'k_jacquel','12345','keisha_jacquet@gmail.com',NULL),(1013,'d_burnh','12345','daniel_burnham@gmail.com',_binary 'mockProfile.png'),(1014,'j_anselm','12345','john_anselme@gmail.com',_binary 'mockProfile.png'),(1015,'m_dorvi','12345','marie_dorvilier@gmail.com',_binary 'mockProfile.png'),(1016,'b_hilai','12345','becky_hilaire@gmail.com',NULL),(1017,'a_ulyss','12345','athena_ulysse@gmail.com',_binary 'mockProfile.png'),(1018,'k_guerr','12345','karol_guerrier@gmail.com',_binary 'mockProfile.png'),(1019,'d_moomg','12345','denzel_moomg@gmail.com',NULL),(1020,'j_peters','12345','jeremiah_peterson@gmail.com',NULL),(1021,'m_washi','12345','may_washington@gmail.com',NULL),(1022,'b_phili','12345','bella_philips@gmail.com',NULL),(1023,'a_skyle','12345','amber_skyler@gmail.com',NULL),(1024,'k_kylep','12345','kevin_kylepson@gmail.com',NULL),(1025,'n_grier','12345','natasha_grier@gmail.com',_binary 'mockProfile.png'),(1026,'p_simmo','12345','portia_simmons@gmail.com',_binary 'mockProfile.png'),(1027,'m_edwar','12345','mikhail_edwards@gmail.com',_binary 'mockProfile.png'),(1028,'s_milla','12345','saski_millard@gmail.com',_binary 'mockProfile.png');
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

-- Dump completed on 2022-04-19 22:27:04
