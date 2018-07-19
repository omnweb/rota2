/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.5-10.1.13-MariaDB : Database - turismo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`turismo` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `turismo`;

/*Table structure for table `pontos` */

DROP TABLE IF EXISTS `pontos`;

CREATE TABLE `pontos` (
  `idpontos` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) DEFAULT NULL,
  `cidade` varchar(40) DEFAULT NULL,
  `pais` varchar(40) DEFAULT NULL,
  `latitude` varchar(15) DEFAULT NULL,
  `longitude` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idpontos`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `pontos` */

insert  into `pontos`(`idpontos`,`nome`,`cidade`,`pais`,`latitude`,`longitude`) values (1,'Parque Jau','Jau','Brasil','-22.298313','-48.5466222'),(2,'Espaco fatec Shopping Jau','Jau','Brasil','-22.2969034','-48.5472338'),(3,'Estadio Zezinho Magalhaes','Jau','Brasil','-22.2963177','-48.5727161'),(4,'Territorio dos Calcados','Jau','Brasil','-22.3050482','-48.5911702'),(5,'Hospital Tereza Perlatti','Jau','Brasil','-22.2987611','-48.5711422');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(40) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`iduser`,`nome`,`email`,`senha`) values (1,'Nicolas de Almeida','nicolas@teste','123'),(27,'teste','teste@teste','teste');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
