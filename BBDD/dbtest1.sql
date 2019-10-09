-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 09-10-2019 a las 02:06:15
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbtest1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

DROP TABLE IF EXISTS `articulos`;
CREATE TABLE IF NOT EXISTS `articulos` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `articulo_titulo` varchar(230) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion_articulo` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Fecha_articulo` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `articulo_titulo`, `descripcion_articulo`, `Fecha_articulo`) VALUES
(1, 'El mago de Oz', 'Cuenta la leyenda de un mago que vivio en un bosque.', '2018-03-26'),
(2, 'El secreto de cala', 'Los grande que albergaba a cientos de familias.', '2018-03-25'),
(3, 'El mago de Boca', 'La historia mago que vivio en un bosque.', '2018-03-24'),
(4, 'El secreto encantado', 'El tesoro mas grande que albergaba a cientos de familias.', '2018-03-23'),
(5, 'El mago de class', 'El trofeo de un mago que vivio en un bosque.', '2018-03-22'),
(6, 'El secreto de las marianas', 'Secretos de magadascar', '2018-03-21'),
(7, 'El domador x', 'Los mas grandes domadores de circo', '2018-03-20'),
(8, 'El mas fuerte', 'La lista de los hombres mas fuertes', '2018-03-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

DROP TABLE IF EXISTS `asignatura`;
CREATE TABLE IF NOT EXISTS `asignatura` (
  `id_asignatura` bigint(100) NOT NULL AUTO_INCREMENT,
  `nombre_asignatura` varchar(200) DEFAULT NULL,
  `valor_pregunta_respuesta` int(100) DEFAULT NULL,
  PRIMARY KEY (`id_asignatura`),
  UNIQUE KEY `unique_id_asignatura` (`id_asignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`id_asignatura`, `nombre_asignatura`, `valor_pregunta_respuesta`) VALUES
(1, 'Matematicas', 5000),
(2, 'Sociales', 6000),
(3, 'Informatica', 8000),
(4, 'Naturales', 7000),
(5, 'Quimica', 5500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura_estudiante`
--

DROP TABLE IF EXISTS `asignatura_estudiante`;
CREATE TABLE IF NOT EXISTS `asignatura_estudiante` (
  `id_estudiante_asignatura` int(20) NOT NULL AUTO_INCREMENT,
  `cc_estudiante` bigint(100) DEFAULT NULL,
  `id_asignatura` bigint(100) NOT NULL,
  PRIMARY KEY (`id_estudiante_asignatura`),
  KEY `fk_asig_cc_estu` (`cc_estudiante`),
  KEY `fk_asig_id` (`id_asignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignatura_estudiante`
--

INSERT INTO `asignatura_estudiante` (`id_estudiante_asignatura`, `cc_estudiante`, `id_asignatura`) VALUES
(1, 200, 1),
(2, 201, 2),
(3, 201, 3),
(4, 201, 4),
(5, 202, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura_monitor`
--

DROP TABLE IF EXISTS `asignatura_monitor`;
CREATE TABLE IF NOT EXISTS `asignatura_monitor` (
  `id_monitor_asignatura` int(20) NOT NULL AUTO_INCREMENT,
  `cc_monitor` bigint(100) DEFAULT NULL,
  `id_asignatura` bigint(100) DEFAULT NULL,
  PRIMARY KEY (`id_monitor_asignatura`),
  KEY `fk_asig_monitor_asignatura` (`id_asignatura`),
  KEY `fk_asig_monitor_cc_monitor` (`cc_monitor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignatura_monitor`
--

INSERT INTO `asignatura_monitor` (`id_monitor_asignatura`, `cc_monitor`, `id_asignatura`) VALUES
(1, 200, 2),
(2, 201, 1),
(3, 201, 5),
(4, 202, 1),
(5, 202, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE IF NOT EXISTS `estudiante` (
  `id_estudiante` int(20) NOT NULL AUTO_INCREMENT,
  `cc_estudiante` bigint(100) DEFAULT NULL,
  `fecha_nac_estudiante` date DEFAULT NULL,
  `sexo_estudiante` varchar(20) DEFAULT NULL,
  `correo_estudiante` varchar(50) DEFAULT NULL,
  `telefono_estudiante` bigint(100) DEFAULT NULL,
  `direccion_estudiante` varchar(200) DEFAULT NULL,
  `fecha_ingreso_estudiante` date DEFAULT NULL,
  PRIMARY KEY (`id_estudiante`),
  UNIQUE KEY `unique_cc_estudiante` (`cc_estudiante`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `cc_estudiante`, `fecha_nac_estudiante`, `sexo_estudiante`, `correo_estudiante`, `telefono_estudiante`, `direccion_estudiante`, `fecha_ingreso_estudiante`) VALUES
(1, 200, '2014-08-21', '1', 'estua@gmail.com', 6523017, 'Cartagena, Villa Rubia', '2014-08-06'),
(2, 201, '2014-08-21', '2', 'estub@gmail.com', 6617100, 'Cartagena, Bocagrande', '2014-06-27'),
(3, 202, '2014-07-25', '1', 'estuc@gmail.com', 65232017, 'Cartagena, Socorro', '2014-06-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

DROP TABLE IF EXISTS `pregunta`;
CREATE TABLE IF NOT EXISTS `pregunta` (
  `id_pregunta` int(100) NOT NULL AUTO_INCREMENT,
  `cc_estudiante` bigint(100) DEFAULT NULL,
  `id_respuesta_selec` int(100) DEFAULT NULL,
  `id_asignatura` bigint(100) DEFAULT NULL,
  `pregunta` blob,
  `estado_pregunta` varchar(200) DEFAULT NULL,
  `fecha_pregunta` date DEFAULT NULL,
  PRIMARY KEY (`id_pregunta`),
  UNIQUE KEY `unique_id_pregunta` (`id_pregunta`),
  KEY `fk_pregunta_cc_estudiante` (`cc_estudiante`),
  KEY `fk_pregunta_id_asignatura` (`id_asignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 17408 kB; (`id_asigntura`) REFER `prueba_ifactu';

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id_pregunta`, `cc_estudiante`, `id_respuesta_selec`, `id_asignatura`, `pregunta`, `estado_pregunta`, `fecha_pregunta`) VALUES
(1, 200, 2, 1, 0xc2bf4375616c206573206c61207261c3ad7a20637561647261646120646520353f, 'Resuelta', '2014-08-27'),
(2, 202, 0, 5, 0xc2bf20517569656e20696e76656e746f206c61207461626c612070657269c3b364696361203f, 'Sin Resolver', '2014-08-21'),
(3, 202, 0, 5, 0x4573746520736572c3a120656c20706572736f6e616a653f, 'Sin Resolver', '2014-08-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_estrellas`
--

DROP TABLE IF EXISTS `pregunta_estrellas`;
CREATE TABLE IF NOT EXISTS `pregunta_estrellas` (
  `id_pregunta_estrellas` int(100) NOT NULL AUTO_INCREMENT,
  `cc_monitor` bigint(100) DEFAULT NULL,
  `id_pregunta` int(100) DEFAULT NULL,
  `n_estrellas` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_pregunta_estrellas`),
  UNIQUE KEY `id_estrellas` (`cc_monitor`,`id_pregunta`),
  KEY `fk_estrella_id_pregunta` (`id_pregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pregunta_estrellas`
--

INSERT INTO `pregunta_estrellas` (`id_pregunta_estrellas`, `cc_monitor`, `id_pregunta`, `n_estrellas`) VALUES
(1, 202, 1, 5),
(2, 201, 1, 3),
(3, 201, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

DROP TABLE IF EXISTS `respuesta`;
CREATE TABLE IF NOT EXISTS `respuesta` (
  `id_respuesta` int(100) NOT NULL AUTO_INCREMENT,
  `id_pregunta` int(100) DEFAULT NULL,
  `cc_monitor` bigint(100) DEFAULT NULL,
  `respuesta` blob,
  `fecha_respuesta` date DEFAULT NULL,
  PRIMARY KEY (`id_respuesta`),
  UNIQUE KEY `file_id` (`id_pregunta`,`cc_monitor`),
  KEY `fk_respuesta_id_pregunta` (`id_pregunta`) USING BTREE,
  KEY `fk_respuesta_cc_monitor` (`cc_monitor`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id_respuesta`, `id_pregunta`, `cc_monitor`, `respuesta`, `fecha_respuesta`) VALUES
(1, 1, 202, 0x3235, '2014-08-27'),
(2, 1, 201, 0x3235204372656f20796f20616361, '2014-08-27'),
(3, 2, 201, 0x4d656e64656c6576, '2014-08-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(100) NOT NULL AUTO_INCREMENT,
  `codigo_usuario` bigint(100) DEFAULT NULL,
  `nombres_usuario` varchar(100) DEFAULT NULL,
  `apellidos_usuario` varchar(100) DEFAULT NULL,
  `clave_usuario` varchar(100) DEFAULT NULL,
  `tipo_usuario` int(10) DEFAULT NULL,
  `fecha_registro_usuario` date DEFAULT NULL,
  `estado_usuario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `num_usuario` (`id_usuario`) USING BTREE,
  UNIQUE KEY `cedula_usuario` (`codigo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `codigo_usuario`, `nombres_usuario`, `apellidos_usuario`, `clave_usuario`, `tipo_usuario`, `fecha_registro_usuario`, `estado_usuario`) VALUES
(1, 100, 'Administrador', 'Admin', 'e3afed0047b08059d0fada10f400c1e5', 1, '2014-04-08', 'Habilitado'),
(2, 200, 'Julio Cesar', 'Deavila Pertuz', '202cb962ac59075b964b07152d234b70', 2, '2014-04-08', 'Habilitado'),
(3, 201, 'Aury Pautt', 'Quiñonez', '757b505cfd34c64c85ca5b5690ee5293', 2, '2014-08-27', 'Habilitado'),
(4, 202, 'Hector ', 'Pertuz Patron', '854d6fae5ee42911677c739ee1734486', 2, '2014-08-07', 'Habilitado'),
(5, 500, 'Sandor', 'Luque Farfan', 'e10adc3949ba59abbe56e057f20f883e', 1, '2019-10-07', 'Habilitado');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignatura_estudiante`
--
ALTER TABLE `asignatura_estudiante`
  ADD CONSTRAINT `fk_asig_cc_estu` FOREIGN KEY (`cc_estudiante`) REFERENCES `estudiante` (`cc_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asig_id` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asignatura_monitor`
--
ALTER TABLE `asignatura_monitor`
  ADD CONSTRAINT `fk_asig_monitor_asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asig_monitor_cc_monitor` FOREIGN KEY (`cc_monitor`) REFERENCES `estudiante` (`cc_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_cc_estudiante` FOREIGN KEY (`cc_estudiante`) REFERENCES `usuario` (`codigo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `fk_pregunta_cc_estudiante` FOREIGN KEY (`cc_estudiante`) REFERENCES `estudiante` (`cc_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pregunta_id_asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pregunta_estrellas`
--
ALTER TABLE `pregunta_estrellas`
  ADD CONSTRAINT `fk_estrella_cc_monitor` FOREIGN KEY (`cc_monitor`) REFERENCES `estudiante` (`cc_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estrella_id_pregunta` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fk_respuesta_cc_monitor` FOREIGN KEY (`cc_monitor`) REFERENCES `estudiante` (`cc_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_respuesta_id_pregunta` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
