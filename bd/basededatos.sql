-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.19-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para zvuefoto
CREATE DATABASE IF NOT EXISTS `zvuefoto` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `zvuefoto`;

-- Volcando estructura para tabla zvuefoto.alumno
CREATE TABLE IF NOT EXISTS `alumno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `paterno` varchar(50) DEFAULT NULL,
  `materno` varchar(50) DEFAULT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla zvuefoto.alumno: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` (`id`, `dni`, `nombres`, `paterno`, `materno`, `celular`, `correo`, `foto`) VALUES
	(1, '123456', 'andres', 'reales', 'escorcia', '3135363636', 'andres@prueba.com', 'indice1.jpg'),
	(2, '236546', 'prueba', 'asd', 'asd', '31331321', 'rede@rede.com', '1558784672.jpg'),
	(3, 'asd', 'asd', 'asfas', 'asfasf', '5000000', 'asd', '1558784672.jpg'),
	(4, 'sdfsd', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', '1558784672.jpg'),
	(5, 'sdfsd', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', '1558784672.jpg'),
	(6, 'sdfsdf', 'sdfsd', 'sdfsd', 'sdfsd', 'sdfs', 'sdfsdf', '1558784672.jpg'),
	(7, 'asfasfas', 'asf', 'asfas', 'asf', 'asfasf', 'asfas', '1558784672.jpg'),
	(8, 'nuevo', 'nuevo', 'nuevo', 'nuevo', 'nuevo', 'nuevo', '1558784672.jpg'),
	(9, '6848484984', 'PRUEBA', 'PREUBA', 'PREUBA', '454455', 'SDSAOMF', 'indice1.png');
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
