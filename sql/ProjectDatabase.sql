CREATE DATABASE  IF NOT EXISTS `project` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `project`;
-- MySQL dump 10.13  Distrib 8.0.28, for macos11 (x86_64)
--
-- Host: localhost    Database: project
-- ------------------------------------------------------
-- Server version	5.7.34

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
-- Table structure for table `TA`
--

DROP TABLE IF EXISTS `TA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TA` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
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
INSERT INTO `TA` VALUES (133456,1019,'Denzel','Moomg','1987-04-20','514666099','denzel_moomg@gmail.com'),(133457,1020,'Jeremiah','Peterson','1987-05-20','514666099','jeremiah_peterson@gmail.com'),(133458,1021,'May','Washington','1987-04-24','514666099','may_washington@gmail.com'),(133459,1022,'Bella','Phillips','1987-10-20','514666099','bella_philips@gmail.com'),(133462,1023,'Amber','Skyler','1985-03-11','514666099','amber_skyler@gmail.com'),(133463,1024,'Kevin','Kylepson','1987-04-20','514666099','kevin_kylepson@gmail.com');
/*!40000 ALTER TABLE `TA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1012 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_group`
--

DROP TABLE IF EXISTS `class_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `class_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(100) DEFAULT NULL,
  `leader_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`group_id`),
  KEY `leader_id` (`leader_id`),
  KEY `class_group_ibfk_2` (`course_id`),
  CONSTRAINT `class_group_ibfk_1` FOREIGN KEY (`leader_id`) REFERENCES `student` (`student_id`),
  CONSTRAINT `class_group_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_group`
--

LOCK TABLES `class_group` WRITE;
/*!40000 ALTER TABLE `class_group` DISABLE KEYS */;
INSERT INTO `class_group` VALUES (1000,'Group1',1001,1036),(1001,'Group2',1002,1036),(1002,'Group3',1003,1036),(1003,'Group4',1004,1037),(1004,'Group5',1005,1038);
/*!40000 ALTER TABLE `class_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `course_section` varchar(100) NOT NULL,
  `course_term` varchar(100) NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `course_fk` (`instructor_id`),
  CONSTRAINT `course_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=1047 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1036,'COMP5567',123456,'NN','Winter 2022'),(1037,'COMP5531',123457,'DS','Winter 2022'),(1038,'COMP5544',123458,'RT','Winter 2022'),(1039,'COMP1124',123459,'SS','Winter 2022'),(1040,'ENCS6721',123460,'ZP','Winter 2022'),(1041,'COMP5523',123461,'AC','Winter 2022'),(1042,'COMP5567',123456,'NN','Winter 2022'),(1043,'COMP5531',123457,'DS','Winter 2022'),(1044,'COMP5544',123458,'RT','Winter 2022'),(1045,'COMP1124',123459,'SS','Winter 2022'),(1046,'ENCS6721',123460,'ZP','Winter 2022');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_enrolled`
--

DROP TABLE IF EXISTS `course_enrolled`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_enrolled` (
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` int(11) DEFAULT NULL,
  PRIMARY KEY (`course_id`,`student_id`),
  KEY `course_enrolled_ibfk_1` (`student_id`),
  CONSTRAINT `course_enrolled_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE,
  CONSTRAINT `course_enrolled_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_enrolled`
--

LOCK TABLES `course_enrolled` WRITE;
/*!40000 ALTER TABLE `course_enrolled` DISABLE KEYS */;
INSERT INTO `course_enrolled` VALUES (1036,1001,77),(1036,1002,88),(1036,1003,99),(1036,1004,44),(1037,1005,55),(1037,1006,66),(1037,1007,77);
/*!40000 ALTER TABLE `course_enrolled` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_ta`
--

DROP TABLE IF EXISTS `course_ta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_ta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `ta_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_ta`
--

LOCK TABLES `course_ta` WRITE;
/*!40000 ALTER TABLE `course_ta` DISABLE KEYS */;
INSERT INTO `course_ta` VALUES (1,1036,133456),(2,1037,133457),(3,1038,133458),(4,1039,133459),(5,1040,133462),(6,1041,133463),(7,1043,133463),(8,1042,133456),(9,1043,133457),(10,1044,133458),(11,1045,133459),(12,1046,133462);
/*!40000 ALTER TABLE `course_ta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_taught`
--

DROP TABLE IF EXISTS `course_taught`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_taught` (
  `course_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`,`instructor_id`),
  KEY `course_taught_ibfk_1` (`instructor_id`),
  CONSTRAINT `course_taught_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`id`) ON DELETE CASCADE,
  CONSTRAINT `course_taught_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_taught`
--

LOCK TABLES `course_taught` WRITE;
/*!40000 ALTER TABLE `course_taught` DISABLE KEYS */;
INSERT INTO `course_taught` VALUES (1036,123456),(1037,123457),(1038,123458),(1039,123459),(1040,123460),(1041,123461);
/*!40000 ALTER TABLE `course_taught` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discussion_board`
--

DROP TABLE IF EXISTS `discussion_board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discussion_board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `creator` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `creation_date` varchar(100) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `creator` (`creator`),
  CONSTRAINT `discussion_board_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussion_board`
--

LOCK TABLES `discussion_board` WRITE;
/*!40000 ALTER TABLE `discussion_board` DISABLE KEYS */;
INSERT INTO `discussion_board` VALUES (1,'Assignment Discussion','j_smith','This is to discuss the assignment that is due next week.','2022-01-23',1036),(2,'Project Discussion','d_daniel','This is to discuss the end of semester project.','2022-01-24',1036),(3,'Class Discussion','b_blurp','This is to discuss class material.','2022-01-25',1037);
/*!40000 ALTER TABLE `discussion_board` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipient` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `email_subject` varchar(100) DEFAULT NULL,
  `email_body` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emails`
--

LOCK TABLES `emails` WRITE;
/*!40000 ALTER TABLE `emails` DISABLE KEYS */;
INSERT INTO `emails` VALUES (1,1006,1007,'Zoom meeting','Hello, this is a demand to set up a Zoom meeting. '),(2,1007,1006,'Zoome meeting','Very well. The Zoom meeting can be set up on April 25th, at 6pm.');
/*!40000 ALTER TABLE `emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(100) NOT NULL,
  `start_time` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instructor`
--

DROP TABLE IF EXISTS `instructor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `instructor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `instructor_course` varchar(100) NOT NULL,
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
INSERT INTO `instructor` VALUES (123456,1006,'Nina','Abdou','1959-04-20','514610998','n_abdo@hotmail.com','COMP5567'),(123457,1008,'Jack','Smith','1970-06-03','514655099','jack_smith@gmail.com','COMP5531'),(123458,1009,'Malakai','Michael','1988-10-03','514655099','malakai_michael@gmail.com','COMP5544'),(123459,1010,'Barbara','Blurp','1930-06-03','514655099','barbara_blurph@gmail.com','COMP1124'),(123460,1011,'Andrea','Hamilton','1970-01-01','514655099','andrea_hamilton@gmail.com','ENCS6721'),(123461,1012,'Keisha','Jacquet','1990-02-03','514655099','keisha_jacquet@gmail.com','COMP5523');
/*!40000 ALTER TABLE `instructor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creator` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `creation_date` varchar(100) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `discussion_board` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stud_in_group`
--

DROP TABLE IF EXISTS `stud_in_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stud_in_group` (
  `group_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
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
INSERT INTO `stud_in_group` VALUES (1000,1001),(1001,1002),(1002,1003),(1000,1005),(1000,1006);
/*!40000 ALTER TABLE `stud_in_group` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1008 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1001,1013,'Daniel','Burnham','1995-04-20','514666099','daniel@gmail.com'),(1002,1014,'John','Anselme','1994-05-22','514666099','john@gmail.com'),(1003,1015,'Marie','Dorvilier','1993-01-20','514666099','marie@gmail.com'),(1004,1016,'Becky','Hilaire','1999-03-20','514666099','becky@gmail.com'),(1005,1017,'Athena','Ulysse','1995-11-11','514666099','athena@gmail.com'),(1006,1018,'Karol','Guerrier','1996-12-01','514666099','karol@gmail.com'),(1007,1006,'Maureen','Adelson','1995-10-23','514666099','maureen@gmail.com');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `term`
--

DROP TABLE IF EXISTS `term`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `term` (
  `term_id` int(11) NOT NULL AUTO_INCREMENT,
  `term_season` varchar(10) DEFAULT NULL,
  `term_year` varchar(10) DEFAULT NULL,
  `term_begin_date` varchar(100) DEFAULT NULL,
  `term_end_date` varchar(100) DEFAULT NULL,
  `is_term_now` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `term` (`is_term_now`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `term`
--

LOCK TABLES `term` WRITE;
/*!40000 ALTER TABLE `term` DISABLE KEYS */;
/*!40000 ALTER TABLE `term` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uploads`
--

DROP TABLE IF EXISTS `uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `file` varbinary(500) NOT NULL,
  `course_id` int(11) NOT NULL,
  `file_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  CONSTRAINT `uploads_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploads`
--

LOCK TABLES `uploads` WRITE;
/*!40000 ALTER TABLE `uploads` DISABLE KEYS */;
/*!40000 ALTER TABLE `uploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1025 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1006,'n_abdo','nina','n_abdo@hotmail.ca'),(1007,'d_daniel','12345','derek_daniels@gmail.com'),(1008,'j_smith','12345','jack_smith@gmail.com'),(1009,'m_micha','12345','malakai_michael@gmail.com'),(1010,'b_blurp','12345','barbara_blurph@gmail.com'),(1011,'a_hamilt','12345','andrea_hamilton@gmail.com'),(1012,'k_jacquel','12345','keisha_jacquet@gmail.com'),(1013,'d_burnh','12345','daniel_burnham@gmail.com'),(1014,'j_anselm','12345','john_anselme@gmail.com'),(1015,'m_dorvi','12345','marie_dorvilier@gmail.com'),(1016,'b_hilai','12345','becky_hilaire@gmail.com'),(1017,'a_ulyss','12345','athena_ulysse@gmail.com'),(1018,'k_guerr','12345','karol_guerrier@gmail.com'),(1019,'d_moomg','12345','denzel_moomg@gmail.com'),(1020,'j_peters','12345','jeremiah_peterson@gmail.com'),(1021,'m_washi','12345','may_washington@gmail.com'),(1022,'b_phili','12345','bella_philips@gmail.com'),(1023,'a_skyle','12345','amber_skyler@gmail.com'),(1024,'k_kylep','12345','kevin_kylepson@gmail.com');
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

-- Dump completed on 2022-04-19 22:48:21
