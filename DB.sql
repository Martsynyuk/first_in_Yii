/*
SQLyog Community v12.09 (64 bit)
MySQL - 5.5.23 : Database - user
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`user` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `user`;

/*Table structure for table `information` */

DROP TABLE IF EXISTS `information`;

CREATE TABLE `information` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(100) unsigned NOT NULL,
  `FirstName` varchar(128) DEFAULT NULL,
  `LastName` varchar(128) DEFAULT NULL,
  `Email` varchar(128) DEFAULT NULL,
  `Home` varchar(128) DEFAULT NULL,
  `Work` varchar(128) DEFAULT NULL,
  `Cell` varchar(128) DEFAULT NULL,
  `Adress1` varchar(128) DEFAULT NULL,
  `Adress2` varchar(128) DEFAULT NULL,
  `City` varchar(128) DEFAULT NULL,
  `State` varchar(128) DEFAULT NULL,
  `Zip` varchar(128) DEFAULT NULL,
  `Country` varchar(128) DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `Telephone` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=321 DEFAULT CHARSET=utf8;

/*Data for the table `information` */

insert  into `information`(`id`,`users_id`,`FirstName`,`LastName`,`Email`,`Home`,`Work`,`Cell`,`Adress1`,`Adress2`,`City`,`State`,`Zip`,`Country`,`BirthDate`,`Telephone`) values (120,101,'Terr','mass',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(121,101,'Terr','mass',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(123,101,'Terr','mass',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(122,101,'Terr','mass',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(177,51,'Amerlin','Lmerry','fdsf@gmail.com','','12-15','','adr','adr','city','state','324324','count','1916-01-01','12-15'),(124,101,'Terr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(119,101,'Terr','mass',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(242,51,'Amerry','mire','merry@gmail.com','','12-23-85','','Home','Home','Cite','statte','4543545','count','1916-01-01','12-23-85'),(246,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(248,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(320,51,'amatorr','amer','dser@gmail.com','32432','234','234','adr','Add','Cite','state','43324','count','1916-01-01','234'),(264,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(265,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(266,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(276,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(277,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(278,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(279,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(280,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(281,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(282,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(283,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(284,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(285,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(286,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(287,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(288,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(289,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(290,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(291,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(292,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(293,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(294,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(295,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(296,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(297,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(298,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(299,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(300,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(301,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(302,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(303,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(304,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(305,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85'),(306,51,'merry','','merry@gmail.com','','12-23-85','','','','','','','','1918-03-05','12-23-85');

/*Table structure for table `task` */

DROP TABLE IF EXISTS `task`;

CREATE TABLE `task` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `age` int(2) NOT NULL,
  `Fullname` varchar(30) NOT NULL,
  `skills` enum('long','short','toll','stupid') DEFAULT NULL,
  `price` decimal(5,2) NOT NULL,
  `date_creation` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `task` */

insert  into `task`(`id`,`age`,`Fullname`,`skills`,`price`,`date_creation`) values (26,1942290432,'Hphmsuvdloivlu','short','534.78','1978-08-25'),(27,877593994,'Vjrhlmwtqosuvhluqioscaggzs','short','224.68','1993-01-25'),(28,58,'Vewb','long','94.52','1996-11-23');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`login`,`password`) values (75,'pepe','9af37cfb8e1bc8b8efc46054f575c0b9'),(78,'otik','9af37cfb8e1bc8b8efc46054f575c0b9'),(51,'lolo','9af37cfb8e1bc8b8efc46054f575c0b9');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
