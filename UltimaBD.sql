-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para minimarketapp
CREATE DATABASE IF NOT EXISTS `minimarketapp` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `minimarketapp`;

-- Volcando estructura para tabla minimarketapp.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(64) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla minimarketapp.marca
CREATE TABLE IF NOT EXISTS `marca` (
  `cod_marca` int(11) NOT NULL,
  `nombre_marca` varchar(50) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`cod_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla minimarketapp.perfil
CREATE TABLE IF NOT EXISTS `perfil` (
  `cod_perfil` varchar(3) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `id_estado` int(10) NOT NULL,
  PRIMARY KEY (`cod_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla minimarketapp.tipo_establecimiento
CREATE TABLE IF NOT EXISTS `tipo_establecimiento` (
  `cod_tipo_est` varchar(3) NOT NULL,
  `desc_tipo_est` varchar(20) NOT NULL,
  `estado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla minimarketapp.tipo_producto
CREATE TABLE IF NOT EXISTS `tipo_producto` (
  `cod_tipo_producto` varchar(3) NOT NULL,
  `desc_tipo_producto` varchar(20) NOT NULL,
  `estado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla minimarketapp.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` int(50) NOT NULL,
  `primer_apellido` varchar(64) NOT NULL,
  `segundo_apellido` varchar(64) NOT NULL,
  `primer_nombre` varchar(64) NOT NULL,
  `segundo_nombre` varchar(64) NOT NULL,
  `direccion` varchar(64) NOT NULL,
  `celular` varchar(64) NOT NULL,
  `telefono` varchar(64) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `correo` varchar(64) NOT NULL,
  `contrasena` varchar(128) NOT NULL,
  `cod_perfil` varchar(11) NOT NULL DEFAULT '0',
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `cod_perfil` (`cod_perfil`),
  CONSTRAINT `cod_perfil_FK` FOREIGN KEY (`cod_perfil`) REFERENCES `perfil` (`cod_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
