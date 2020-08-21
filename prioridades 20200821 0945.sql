-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.28-rc-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema prioridades
--

CREATE DATABASE IF NOT EXISTS prioridades;
USE prioridades;

--
-- Definition of table `revistas`
--

DROP TABLE IF EXISTS `revistas`;
CREATE TABLE `revistas` (
  `rev_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rev_titulo` varchar(255) DEFAULT NULL,
  `rev_descripcion` varchar(255) DEFAULT NULL,
  `rev_portada` varchar(255) DEFAULT NULL,
  `rev_publicacion` date DEFAULT NULL,
  `rev_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rev_keywords` varchar(255) DEFAULT NULL,
  `rev_archivo` varchar(255) DEFAULT NULL,
  `rev_disponible` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`rev_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revistas`
--

/*!40000 ALTER TABLE `revistas` DISABLE KEYS */;
INSERT INTO `revistas` (`rev_id`,`rev_titulo`,`rev_descripcion`,`rev_portada`,`rev_publicacion`,`rev_registro`,`rev_keywords`,`rev_archivo`,`rev_disponible`) VALUES 
 (3,'Las relaciones','DescripciÃ³n corta.','img2.jpg','2020-01-10','2020-07-21 08:28:01','hola,mundo,una,palabras claves',NULL,NULL),
 (5,'Las finanzas','Lorem ipsum','port_5f16f3e80c75c.png','2020-06-21','2020-07-21 08:55:52','finanzas,loremp','rev_5f16f3e80f4b0.pdf',1),
 (6,'La religiÃ³n','Breveeee','port_5f16fab9eab7c.jpg','2020-05-21','2020-07-21 09:24:57','voz,sass','rev_5f16fab9eaf80.pdf',1),
 (7,'Reviw','z','port_5f16fb53ddb3f.jpg','2020-04-20','2020-07-21 09:27:31','','rev_5f16fb53de2eb.pdf',1),
 (10,'Productasos asos','Brevesss my','port_5f170bd84baee.jpg','2020-03-31','2020-07-21 09:47:04','hola,mundo,php,sd','rev_5f170bd84d331.pdf',1);
/*!40000 ALTER TABLE `revistas` ENABLE KEYS */;


--
-- Definition of table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `usr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usr_email` varchar(255) DEFAULT NULL,
  `usr_clave` varchar(45) DEFAULT NULL,
  `usr_apellidos` varchar(45) DEFAULT NULL,
  `usr_nombres` varchar(45) DEFAULT NULL,
  `usr_tipo` int(10) unsigned DEFAULT NULL,
  `usr_suscripcion` int(10) unsigned DEFAULT NULL,
  `usr_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usr_pais` int(10) unsigned DEFAULT NULL,
  `usr_ciudad` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`usr_id`,`usr_email`,`usr_clave`,`usr_apellidos`,`usr_nombres`,`usr_tipo`,`usr_suscripcion`,`usr_registro`,`usr_pais`,`usr_ciudad`) VALUES 
 (1,'jomejia@unac.edu.co','ac1ab23d6288711be64a25bf13432baf1e60b2bd','Mejia Martinez','Jhon Oderman',1,1,'2020-07-16 14:12:16',NULL,NULL),
 (3,'corozco@unac.edu.co','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','Orozco Padilla','Cristal',2,0,'2020-06-25 20:09:18',NULL,NULL),
 (4,'paolajenny@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','Mejia','Jenny',2,0,'2020-07-25 20:34:23',NULL,NULL),
 (5,'luzgi@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','Fuentes padilla','Luz Gisselle',2,1,'2020-07-26 10:10:40',NULL,NULL),
 (6,'cristhiancagajon45@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','bonilla','cristian',2,0,'2020-08-19 11:24:40',1,'Medellin'),
 (7,'jhooderman@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','bonilla','cristian',2,0,'2020-08-20 10:21:11',1,'Medellin');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
