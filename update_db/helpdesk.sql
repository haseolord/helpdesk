/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.17-log : Database - helpdesk
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`helpdesk` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `helpdesk`;

/*Table structure for table `log_ticket` */

DROP TABLE IF EXISTS `log_ticket`;

CREATE TABLE `log_ticket` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `resolve` varchar(255) NOT NULL,
  `CreatedBy` varchar(255) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(255) NOT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `IsActive` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `log_ticket` */

/*Table structure for table `m_divisi` */

DROP TABLE IF EXISTS `m_divisi`;

CREATE TABLE `m_divisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(255) NOT NULL,
  `CreatedBy` varchar(255) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` varchar(255) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `IsActive` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `m_divisi` */

insert  into `m_divisi`(`id`,`nama_divisi`,`CreatedBy`,`CreatedDate`,`ModifiedBy`,`ModifiedDate`,`IsActive`) values (1,'KASUM','wahyudwp','0000-00-00 00:00:00','wahyudwp','0000-00-00 00:00:00',1),(2,'KOM 1','wahyudwp','0000-00-00 00:00:00','wahyudwp','0000-00-00 00:00:00',1),(3,'KOM 2','wahyudwp','0000-00-00 00:00:00','wahyudwp','0000-00-00 00:00:00',1);

/*Table structure for table `m_status` */

DROP TABLE IF EXISTS `m_status`;

CREATE TABLE `m_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  `CreatedBy` varchar(255) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` varchar(255) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `IsActive` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `m_status` */

/*Table structure for table `m_user` */

DROP TABLE IF EXISTS `m_user`;

CREATE TABLE `m_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `id_divisi` int(11) NOT NULL,
  `CreatedBy` varchar(255) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` varchar(255) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `IsActive` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `m_user` */

insert  into `m_user`(`id_user`,`username`,`password`,`role`,`nama`,`id_divisi`,`CreatedBy`,`CreatedDate`,`ModifiedBy`,`ModifiedDate`,`IsActive`) values (1,'wahyudwp','4f2fd14faf576dfe839bb749bdd16161',1,'Wahyu Dwi Prasetyo',1,'wahyudwp','0000-00-00 00:00:00','wahyudwp','0000-00-00 00:00:00',1);

/*Table structure for table `t_ticket` */

DROP TABLE IF EXISTS `t_ticket`;

CREATE TABLE `t_ticket` (
  `id_ticket` int(11) NOT NULL AUTO_INCREMENT,
  `no_ticket` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `isi_ticket` varchar(255) NOT NULL,
  `CreatedBy` varchar(255) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` varchar(255) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `IsActive` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_ticket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `t_ticket` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
