/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.32-MariaDB : Database - chatroom
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`chatroom` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `chatroom`;

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `message_time` datetime DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `messages` */

insert  into `messages`(`message_id`,`user_id`,`message`,`message_time`) values 
(1,3,'Hello All','2024-08-15 21:49:13'),
(2,3,'Hello All','2024-08-16 00:06:31'),
(3,3,'Hello All kese ho sab','2024-08-16 00:11:14'),
(4,3,'Hello All kese ho sab','2024-08-16 00:12:16'),
(5,3,'Good Night','2024-08-16 00:14:53'),
(6,3,'Hello','2024-08-16 00:19:55'),
(7,3,'We are here','2024-08-16 00:20:11'),
(8,3,'Hiii..','2024-08-16 00:21:15'),
(9,6,'How are you doing all?','2024-08-16 00:29:22'),
(11,3,'ok','2024-08-16 00:39:27');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `profile_image` text DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `is_online` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`user_id`,`first_name`,`last_name`,`email`,`phone_number`,`country`,`gender`,`profile_image`,`password`,`is_online`) values 
(3,'Totaram','Meghwar','ram@gmail.com','03331717434','PAK','Male','images/15_08_2024_06_08_22_Untitled design (1).png','09876',0),
(4,'Raj','Kumar','rk@gmail.com','03331717434','IND','Male','images/15_08_2024_06_08_22_download.png','12345',NULL),
(5,'Jawahar ','Lal','lal@gmail.comm','03331717434','PAK','Male','images/15_08_2024_06_08_23_download.png','12345',NULL),
(6,'Sanchi','Singh','ss@gmail.com','03331717434','IND','Female','images/15_08_2024_07_08_50_download.png','12345',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
