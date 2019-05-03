# ************************************************************
# Sequel Pro SQL dump
# Versión 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.38)
# Base de datos: Tienda
# Tiempo de Generación: 2015-02-09 15:33:59 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla Categorias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Categorias`;

CREATE TABLE `Categorias` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(60) DEFAULT NULL,
  `descripcion_categoria` tinytext,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Categorias` WRITE;
/*!40000 ALTER TABLE `Categorias` DISABLE KEYS */;

INSERT INTO `Categorias` (`id_cat`, `nombre_categoria`, `descripcion_categoria`)
VALUES
	(1,'Drama','AquÃ­ van las peliculas de Drama'),
	(2,'Comedia','AquÃ­ van las peliculas de Comedia');

/*!40000 ALTER TABLE `Categorias` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Productos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Productos`;

CREATE TABLE `Productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clave_producto` varchar(60) DEFAULT NULL,
  `nombre_producto` varchar(60) DEFAULT NULL,
  `descripcion_producto` tinytext,
  `imagen_producto` varchar(60) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `fecha_lanzamiento` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `relacion_productos_categorias` (`id_categoria`),
  CONSTRAINT `relacion_productos_categorias` FOREIGN KEY (`id_categoria`) REFERENCES `Categorias` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Productos` WRITE;
/*!40000 ALTER TABLE `Productos` DISABLE KEYS */;

INSERT INTO `Productos` (`id`, `clave_producto`, `nombre_producto`, `descripcion_producto`, `imagen_producto`, `precio`, `id_categoria`, `fecha_lanzamiento`)
VALUES
	(1,'sku-01','Forrest Gump','Una pelicula emotiva','forrest.jpg',189.00,1,NULL),
	(2,'SKU-20','Psycho','Una pelicula de Alfred','psycho.jpg',199.00,2,NULL),
	(3,'SKU-2000','Batman','asdf','BatmanForever.jpg<br>',189.00,1,'0000-00-00'),
	(4,'SKU-2000','Batman','asdf','BatmanForever.jpg',189.00,2,'2015-01-15'),
	(5,'SKU-03','Batman Forever','agefege','BatmanForever.jpg',79.00,1,'2015-01-31'),
	(6,'SKU-03','Batman Forever','agefege','BatmanForever.jpg',79.00,2,'2015-01-31'),
	(7,'SKU-030','fdsa','asdf','144258_BatmanForever.jpg',79.00,1,'2015-02-19'),
	(8,'SKU-128','Batman','asdf','144420_BatmanForever.jpg',79.00,2,'2015-02-18'),
	(9,'SKU-030','fdsa','asdf','151743_BatmanForever.jpg',79.00,1,'2015-02-19'),
	(10,'SKU-128','Batman','asdf','151930_BatmanForever.jpg',79.00,2,'2015-02-18'),
	(11,'SKU-128','Batman','asdf','152004_BatmanForever.jpg',79.00,1,'2015-02-18'),
	(12,'SKU-128','Batman','asdf','152300_BatmanForever.jpg',79.00,2,'2015-02-18');

/*!40000 ALTER TABLE `Productos` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
