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
) ENGINE=InnoDB AUTO_INCREMENT=1021 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` VALUES (1001,'hello','m_adels','22-04-04 06:58am',NULL),(1002,'hi!!','m_adels','22-04-05 04:00pm',NULL),(1003,'hello','m_adels','22-04-06 03:11am',NULL),(1004,'hello','m_adels','22-04-06 03:14am',NULL),(1005,'hello','m_adels','22-04-06 03:41am',10),(1006,'what\'s up?','a_ulyss','22-04-06 03:42am',10),(1007,'is everything all right?','a_ulyss','22-04-06 03:42am',10),(1008,'hello ladies','k_guerr','22-04-06 03:47am',10),(1009,'hello','k_guerr','22-04-06 03:53am',10),(1010,'what\'s up','k_guerr','22-04-06 03:54am',10),(1011,'ijo','k_guerr','22-04-06 03:58am',10),(1012,'HELLO','m_adels','22-04-06 04:09am',10),(1013,'kjo','m_adels','22-04-06 04:11am',10),(1014,'jkl','a_ulyss','22-04-06 04:14am',10),(1015,'monsieur','a_ulyss','22-04-06 04:17am',10),(1016,'jhho','a_ulyss','22-04-06 04:23am',10),(1017,'hello','a_ulyss','22-04-06 04:24am',10),(1018,'hll','a_ulyss','22-04-06 04:26am',10),(1019,'hello','a_ulyss','22-04-06 04:28am',10),(1020,'hello','m_adels','22-04-07 05:47pm',10);
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
  PRIMARY KEY (`group_id`),
  KEY `leader_id` (`leader_id`),
  CONSTRAINT `class_group_ibfk_1` FOREIGN KEY (`leader_id`) REFERENCES `student` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_group`
--

LOCK TABLES `class_group` WRITE;
/*!40000 ALTER TABLE `class_group` DISABLE KEYS */;
INSERT INTO `class_group` VALUES (10,'group 10',1005),(12,'group 12',1003);
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
  `instructor_id` int NOT NULL,
  `course_section` varchar(100) NOT NULL,
  `course_term` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_fk` (`instructor_id`),
  CONSTRAINT `course_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1048 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES(1036,'COMP5567',123456,'NN','Winter 2022'),(1037,'COMP5531',123457,'DS','Winter 2022'),(1038,'COMP5544',123458,'RT','Winter 2022'),(1039,'COMP1124',123459,'SS','Winter 2022'),(1040,'ENCS6721',123460,'ZP','Winter 2022'),(1041,'COMP5523',123461,'AC','Winter 2022'),(1042,'COMP5567',123456,'NN','Winter 2022'),(1043,'COMP5531',123457,'DS','Winter 2022'),(1044,'COMP5544',123458,'RT','Winter 2022'),(1045,'COMP1124',123459,'SS','Winter 2022'),(1046,'ENCS6721',123460,'ZP','Winter 2022');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_ta`
--

DROP TABLE IF EXISTS `course_ta`;
CREATE TABLE  `course_ta`  (
   id  int(11) NOT NULL AUTO_INCREMENT,
   course_id  int(11) NOT NULL,
   ta_id int(11) NOT NULL,
  PRIMARY KEY ( id )
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_ta`
--

LOCK TABLES `course_ta` WRITE;
insert into `course_ta`  (course_id, ta_id) values (1036,133456),(1037,133457),(1038,133458),(1039,133459),(1040,133462),(1041,133463),(1043,133463),(1042,133456),(1043,133457),(1044,133458),(1045,133459),(1046,133462);
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
  `course_id` int(11) NOT NULL, 
  PRIMARY KEY (`id`),
  KEY `creator` (`creator`),
  CONSTRAINT `discussion_board_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1009 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussion_board`
--

LOCK TABLES `discussion_board` WRITE;
/*!40000 ALTER TABLE `discussion_board` DISABLE KEYS */;
INSERT INTO `discussion_board` VALUES (1001,'test post','m_adels','this is a test post','2022-04-04', 1043),(1002,'This is another post','m_adels','this is another test post','22-04-06 05:13pm', 1036),(1003,'This is another post','m_adels','this is another test post','22-04-06 05:13pm', 1043),(1004,'let\'s talk about this','m_adels','this is interesting','22-04-06 05:18pm', 1043),(1005,'another one','m_adels','hello','22-04-06 05:19pm', 1036),(1006,'this is my post','m_adels','whaddup','22-04-06 05:20pm', 1036),(1007,'Post','a_ulyss','This is my first post','22-04-07 01:36am', 1038),(1008,'another','a_ulyss','and another one','22-04-07 01:38am', 1040);
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
  `student_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1004 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1001,'group meeting','13:00','15:30','we will discuss our project requirements',1007),(1002,'group meeting','03:30','16:00','we will discuss our project requirements',1007),(1003,'hello','13:30','21:00','this is a description',1007);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
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
  `instructor_course` varchar(100) DEFAULT NULL,
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
INSERT INTO `instructor` VALUES (123456,1007,'Derek','Daniels','1959-04-20',514610998,'derek_daniels@gmail.com','COMP5567'),(123457,1008,'Jack','Smith','1970-06-03',514655099,'jack_smith@gmail.com','COMP5531'),(123458,1009,'Malakai','Michael','1988-10-03',514655099,'malakai_michael@gmail.com','COMP5544'),(123459,1010,'Barbara','Blurp','1930-06-03',514655099,'barbara_blurph@gmail.com','COMP1124'),(123460,1011,'Andrea','Hamilton','1970-01-01',514655099,'andrea_hamilton@gmail.com','ENCS6721'),(123461,1012,'Keisha','Jacquet','1990-02-03',514655099,'keisha_jacquet@gmail.com','COMP5523');
/*!40000 ALTER TABLE `instructor` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=1067 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` VALUES (1001,'m_adels','this is a test reply','2022-04-05',1001),(1002,'m_adels','hello','22-04-05 03:29am',1001),(1003,'m_adels','hello','22-04-05 03:29am',1001),(1004,'m_adels','hello','22-04-05 03:29am',1001),(1005,'m_adels','hello','22-04-05 03:30am',1001),(1006,'m_adels','hello','22-04-05 03:31am',1001),(1007,'m_adels','hello','22-04-05 03:31am',1001),(1008,'m_adels','hello','22-04-05 03:31am',1001),(1009,'m_adels','hello','22-04-05 03:32am',1001),(1010,'m_adels','','22-04-05 03:32am',1001),(1011,'m_adels','hello','22-04-05 03:32am',1001),(1012,'m_adels','hello','22-04-05 03:34am',1001),(1013,'m_adels','hello','22-04-05 03:34am',1001),(1014,'m_adels','hello','22-04-05 03:35am',1001),(1015,'m_adels','hello','22-04-05 03:39am',1001),(1016,'m_adels','comment ca va','22-04-05 03:41am',1001),(1017,'m_adels','hello','22-04-05 03:42am',1001),(1018,'m_adels','hello','22-04-05 03:42am',1001),(1019,'m_adels','hello','22-04-05 03:42am',1001),(1020,'m_adels','comment ca va','22-04-05 03:42am',1001),(1021,'m_adels','comment ca va','22-04-05 03:43am',1001),(1022,'m_adels','comment ca va','22-04-05 03:43am',1001),(1023,'m_adels','hello','22-04-05 03:43am',1001),(1024,'m_adels','comment ca va','22-04-05 03:43am',1001),(1025,'m_adels','comment ca va','22-04-05 03:44am',1001),(1026,'m_adels','hello','22-04-05 03:44am',1001),(1027,'m_adels','this is my reply','22-04-05 03:45am',1001),(1028,'m_adels','this is my reply','22-04-05 03:46am',1001),(1029,'m_adels','hello','22-04-05 03:46am',1001),(1030,'m_adels','this is my reply','22-04-05 03:46am',1001),(1031,'m_adels','this is my reply','22-04-05 03:46am',1001),(1032,'m_adels','hello','22-04-05 03:46am',1001),(1033,'m_adels','hello','22-04-05 03:46am',1001),(1034,'m_adels','comment ca va','22-04-05 03:46am',1001),(1035,'m_adels','comment ca va','22-04-05 03:49am',1001),(1036,'m_adels','hello','22-04-05 03:49am',1001),(1037,'m_adels','hello','22-04-05 03:49am',1001),(1038,'m_adels','hello','22-04-05 03:52am',1001),(1039,'m_adels','hello','22-04-05 03:52am',1001),(1040,'m_adels','hello','22-04-05 03:52am',1001),(1041,'m_adels','hello','22-04-05 03:54am',1001),(1042,'m_adels','hello','22-04-05 03:55am',1001),(1043,'m_adels','hello','22-04-05 03:55am',1001),(1044,'m_adels','hello','22-04-05 03:55am',1001),(1045,'m_adels','hello','22-04-05 03:57am',1001),(1046,'m_adels','hello','22-04-05 03:59am',1001),(1047,'m_adels','hello','22-04-05 03:59am',1001),(1048,'m_adels','hello','22-04-05 03:59am',1001),(1049,'m_adels','hello','22-04-05 04:01am',1001),(1050,'m_adels','hello','22-04-05 04:03am',1001),(1051,'m_adels','hello','22-04-05 04:04am',1001),(1052,'m_adels','he','22-04-05 04:04am',1001),(1053,'m_adels','he','22-04-05 04:08am',1001),(1054,'m_adels','is this working','22-04-05 04:08am',1001),(1055,'m_adels','boop','22-04-05 04:10am',1001),(1056,'m_adels','boop','22-04-05 04:11am',1001),(1057,'m_adels','boop','22-04-05 04:11am',1001),(1058,'m_adels','bla bla bla','22-04-05 04:11am',1001),(1059,'m_adels','this is a great post','22-04-05 04:00pm',1001),(1060,'m_adels','','22-04-07 01:09am',1002),(1061,'m_adels','hello','22-04-07 01:11am',1002),(1062,'m_adels','it\'s working','22-04-07 01:11am',1002),(1063,'m_adels','whaddup','22-04-07 01:11am',1003),(1064,'m_adels','this is a reply to this post','22-04-07 01:12am',1006),(1065,'k_guerr','this is a really long thread','22-04-07 01:21am',1001),(1066,'m_adels','this is a good post','22-04-07 03:15am',1008);
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
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
  `enroll_course_id` int NOT NULL,
  `group_id` int NOT NULL,
  PRIMARY KEY (`student_id`),
  KEY `user_id` (`user_id`),
  KEY `enroll_course_id` (`enroll_course_id`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `student_ibfk_2` FOREIGN KEY (`enroll_course_id`) REFERENCES `course` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1008 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1001,1013,'Daniel','Burnham','1995-04-20',514666099,1036,12),(1002,1014,'John','Anselme','1994-05-22',514666099,1036,12),(1003,1015,'Marie','Dorvilier','1993-01-20',514666099,1036,12),(1004,1016,'Becky','Hilaire','1999-03-20',514666099,1036,12),(1005,1017,'Athena','Ulysse','1995-11-11',514666099,1041,10),(1006,1018,'Karol','Guerrier','1996-12-01',514666099,1041,10),(1007,1006,'Maureen','Adelson','1995-10-23',514666099,1041,10);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1025 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1006,'m_adels','56789','maureen_adelson@hotmail.ca'),(1007,'d_daniel','12345','derek_daniels@gmail.com'),(1008,'j_smith','12345','jack_smith@gmail.com'),(1009,'m_micha','12345','malakai_michael@gmail.com'),(1010,'b_blurp','12345','barbara_blurph@gmail.com'),(1011,'a_hamilt','12345','andrea_hamilton@gmail.com'),(1012,'k_jacquel','12345','keisha_jacquet@gmail.com'),(1013,'d_burnh','12345','daniel_burnham@gmail.com'),(1014,'j_anselm','12345','john_anselme@gmail.com'),(1015,'m_dorvi','12345','marie_dorvilier@gmail.com'),(1016,'b_hilai','12345','becky_hilaire@gmail.com'),(1017,'a_ulyss','12345','athena_ulysse@gmail.com'),(1018,'k_guerr','12345','karol_guerrier@gmail.com'),(1019,'d_moomg','12345','denzel_moomg@gmail.com'),(1020,'j_peters','12345','jeremiah_peterson@gmail.com'),(1021,'m_washi','12345','may_washington@gmail.com'),(1022,'b_phili','12345','bella_philips@gmail.com'),(1023,'a_skyle','12345','amber_skyler@gmail.com'),(1024,'k_kylep','12345','kevin_kylepson@gmail.com');
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

-- Dump completed on 2022-04-15 15:26:39
