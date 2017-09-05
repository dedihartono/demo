/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.10-MariaDB : Database - u872447162_demo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`u872447162_demo` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `u872447162_demo`;

/*Table structure for table `tb_kontak` */

DROP TABLE IF EXISTS `tb_kontak`;

CREATE TABLE `tb_kontak` (
  `id_kontak` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(64) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kontak` */

insert  into `tb_kontak`(`id_kontak`,`nama`,`no_hp`,`email`) values (1,'Dedi Hartono','083xxxx','xxx@mail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
