-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-06-2019 a las 14:01:49
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebaubits`
--
CREATE DATABASE IF NOT EXISTS `pruebaubits` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pruebaubits`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`) VALUES
(1, 'Pedro Perez'),
(2, 'Juan Gonzales');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `detallemascota`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `detallemascota`;
CREATE TABLE IF NOT EXISTS `detallemascota` (
`id_mascota` int(11)
,`nombre_mascota` varchar(100)
,`descripcion` varchar(100)
,`descripcion_mascota` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `informe`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `informe`;
CREATE TABLE IF NOT EXISTS `informe` (
`nombre_cliente` varchar(100)
,`nombre_mascota` varchar(100)
,`descripcion_ingreso` text
,`fecha` date
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `informe_ingresos`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `informe_ingresos`;
CREATE TABLE IF NOT EXISTS `informe_ingresos` (
`nombre_cliente` varchar(100)
,`nombre_mascota` varchar(100)
,`id_ingreso` int(11)
,`descripcion_ingreso` text
,`fecha` date
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

DROP TABLE IF EXISTS `ingresos`;
CREATE TABLE IF NOT EXISTS `ingresos` (
  `id_ingreso` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_ingreso` text COLLATE utf8_spanish_ci NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_ingreso`),
  KEY `id_mascota` (`id_mascota`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id_ingreso`, `descripcion_ingreso`, `id_mascota`, `fecha`) VALUES
(12, 'asdad', 1, '2019-06-12'),
(31, 'c nmcnx', 2, '2019-06-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

DROP TABLE IF EXISTS `mascota`;
CREATE TABLE IF NOT EXISTS `mascota` (
  `id_mascota` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `nombre_mascota` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_tamano` int(11) NOT NULL,
  `id_tipo_mascota` int(11) NOT NULL,
  PRIMARY KEY (`id_mascota`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_tamano` (`id_tamano`),
  KEY `id_tipo_mascota` (`id_tipo_mascota`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id_mascota`, `id_cliente`, `nombre_mascota`, `id_tamano`, `id_tipo_mascota`) VALUES
(1, 1, 'Morgan', 1, 1),
(2, 2, 'Lucas', 3, 1),
(3, 1, 'Masha', 1, 1),
(4, 2, 'Piter', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamanos`
--

DROP TABLE IF EXISTS `tamanos`;
CREATE TABLE IF NOT EXISTS `tamanos` (
  `id_tamano` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tamano`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tamanos`
--

INSERT INTO `tamanos` (`id_tamano`, `descripcion`) VALUES
(1, 'Pequeña'),
(2, 'Medio'),
(3, 'Grande');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_mascota`
--

DROP TABLE IF EXISTS `tipo_mascota`;
CREATE TABLE IF NOT EXISTS `tipo_mascota` (
  `id_tipo_mascota` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_mascota` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_mascota`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_mascota`
--

INSERT INTO `tipo_mascota` (`id_tipo_mascota`, `descripcion_mascota`) VALUES
(1, 'Gato'),
(2, 'Perro'),
(3, 'Pez'),
(4, 'Los Demas');

-- --------------------------------------------------------

--
-- Estructura para la vista `detallemascota`
--
DROP TABLE IF EXISTS `detallemascota`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detallemascota`  AS  select `mascota`.`id_mascota` AS `id_mascota`,`mascota`.`nombre_mascota` AS `nombre_mascota`,`tamanos`.`descripcion` AS `descripcion`,`tipo_mascota`.`descripcion_mascota` AS `descripcion_mascota` from ((`mascota` join `tamanos` on((`tamanos`.`id_tamano` = `mascota`.`id_tamano`))) join `tipo_mascota` on((`tipo_mascota`.`id_tipo_mascota` = `mascota`.`id_tipo_mascota`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `informe`
--
DROP TABLE IF EXISTS `informe`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `informe`  AS  select `clientes`.`nombre_cliente` AS `nombre_cliente`,`mascota`.`nombre_mascota` AS `nombre_mascota`,`ingresos`.`descripcion_ingreso` AS `descripcion_ingreso`,`ingresos`.`fecha` AS `fecha` from ((`ingresos` join `mascota` on((`mascota`.`id_mascota` = `ingresos`.`id_mascota`))) join `clientes` on((`clientes`.`id_cliente` = `mascota`.`id_cliente`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `informe_ingresos`
--
DROP TABLE IF EXISTS `informe_ingresos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `informe_ingresos`  AS  select `clientes`.`nombre_cliente` AS `nombre_cliente`,`mascota`.`nombre_mascota` AS `nombre_mascota`,`ingresos`.`id_ingreso` AS `id_ingreso`,`ingresos`.`descripcion_ingreso` AS `descripcion_ingreso`,`ingresos`.`fecha` AS `fecha` from ((`ingresos` join `mascota` on((`mascota`.`id_mascota` = `ingresos`.`id_mascota`))) join `clientes` on((`clientes`.`id_cliente` = `mascota`.`id_cliente`))) ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD CONSTRAINT `ingresos_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mascota_ibfk_2` FOREIGN KEY (`id_tamano`) REFERENCES `tamanos` (`id_tamano`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mascota_ibfk_3` FOREIGN KEY (`id_tipo_mascota`) REFERENCES `tipo_mascota` (`id_tipo_mascota`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
