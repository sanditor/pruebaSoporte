-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.0.83-community - MySQL Community Edition (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             8.2.0.4675
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla prueba_ifactum.asignatura
DROP TABLE IF EXISTS `asignatura`;
CREATE TABLE IF NOT EXISTS `asignatura` (
  `id_asignatura` bigint(100) NOT NULL auto_increment,
  `nombre_asignatura` varchar(200) default NULL,
  `valor_pregunta_respuesta` int(100) default NULL,
  PRIMARY KEY  (`id_asignatura`),
  UNIQUE KEY `unique_id_asignatura` (`id_asignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla prueba_ifactum.asignatura: ~5 rows (aproximadamente)
DELETE FROM `asignatura`;
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
INSERT INTO `asignatura` (`id_asignatura`, `nombre_asignatura`, `valor_pregunta_respuesta`) VALUES
	(1, 'Matematicas', 5000),
	(2, 'Sociales', 6000),
	(3, 'Informatica', 8000),
	(4, 'Naturales', 7000),
	(5, 'Quimica', 5500);
/*!40000 ALTER TABLE `asignatura` ENABLE KEYS */;


-- Volcando estructura para tabla prueba_ifactum.asignatura_estudiante
DROP TABLE IF EXISTS `asignatura_estudiante`;
CREATE TABLE IF NOT EXISTS `asignatura_estudiante` (
  `id_estudiante_asignatura` int(20) NOT NULL auto_increment,
  `cc_estudiante` bigint(100) default NULL,
  `id_asignatura` bigint(100) NOT NULL,
  PRIMARY KEY  (`id_estudiante_asignatura`),
  KEY `fk_asig_cc_estu` (`cc_estudiante`),
  KEY `fk_asig_id` (`id_asignatura`),
  CONSTRAINT `fk_asig_cc_estu` FOREIGN KEY (`cc_estudiante`) REFERENCES `estudiante` (`cc_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_asig_id` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla prueba_ifactum.asignatura_estudiante: ~5 rows (aproximadamente)
DELETE FROM `asignatura_estudiante`;
/*!40000 ALTER TABLE `asignatura_estudiante` DISABLE KEYS */;
INSERT INTO `asignatura_estudiante` (`id_estudiante_asignatura`, `cc_estudiante`, `id_asignatura`) VALUES
	(1, 200, 1),
	(2, 201, 2),
	(3, 201, 3),
	(4, 201, 4),
	(5, 202, 5);
/*!40000 ALTER TABLE `asignatura_estudiante` ENABLE KEYS */;


-- Volcando estructura para tabla prueba_ifactum.asignatura_monitor
DROP TABLE IF EXISTS `asignatura_monitor`;
CREATE TABLE IF NOT EXISTS `asignatura_monitor` (
  `id_monitor_asignatura` int(20) NOT NULL auto_increment,
  `cc_monitor` bigint(100) default NULL,
  `id_asignatura` bigint(100) default NULL,
  PRIMARY KEY  (`id_monitor_asignatura`),
  KEY `fk_asig_monitor_asignatura` (`id_asignatura`),
  KEY `fk_asig_monitor_cc_monitor` (`cc_monitor`),
  CONSTRAINT `fk_asig_monitor_asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_asig_monitor_cc_monitor` FOREIGN KEY (`cc_monitor`) REFERENCES `estudiante` (`cc_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla prueba_ifactum.asignatura_monitor: ~5 rows (aproximadamente)
DELETE FROM `asignatura_monitor`;
/*!40000 ALTER TABLE `asignatura_monitor` DISABLE KEYS */;
INSERT INTO `asignatura_monitor` (`id_monitor_asignatura`, `cc_monitor`, `id_asignatura`) VALUES
	(1, 200, 2),
	(2, 201, 1),
	(3, 201, 5),
	(4, 202, 1),
	(5, 202, 2);
/*!40000 ALTER TABLE `asignatura_monitor` ENABLE KEYS */;


-- Volcando estructura para tabla prueba_ifactum.estudiante
DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE IF NOT EXISTS `estudiante` (
  `id_estudiante` int(20) NOT NULL auto_increment,
  `cc_estudiante` bigint(100) default NULL,
  `fecha_nac_estudiante` date default NULL,
  `sexo_estudiante` varchar(20) default NULL,
  `correo_estudiante` varchar(50) default NULL,
  `telefono_estudiante` bigint(100) default NULL,
  `direccion_estudiante` varchar(200) default NULL,
  `fecha_ingreso_estudiante` date default NULL,
  PRIMARY KEY  (`id_estudiante`),
  UNIQUE KEY `unique_cc_estudiante` (`cc_estudiante`),
  CONSTRAINT `fk_cc_estudiante` FOREIGN KEY (`cc_estudiante`) REFERENCES `usuario` (`codigo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla prueba_ifactum.estudiante: ~3 rows (aproximadamente)
DELETE FROM `estudiante`;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` (`id_estudiante`, `cc_estudiante`, `fecha_nac_estudiante`, `sexo_estudiante`, `correo_estudiante`, `telefono_estudiante`, `direccion_estudiante`, `fecha_ingreso_estudiante`) VALUES
	(1, 200, '2014-08-21', '1', 'estua@gmail.com', 6523017, 'Cartagena, Villa Rubia', '2014-08-06'),
	(2, 201, '2014-08-21', '2', 'estub@gmail.com', 6617100, 'Cartagena, Bocagrande', '2014-06-27'),
	(3, 202, '2014-07-25', '1', 'estuc@gmail.com', 65232017, 'Cartagena, Socorro', '2014-06-18');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;


-- Volcando estructura para tabla prueba_ifactum.pregunta
DROP TABLE IF EXISTS `pregunta`;
CREATE TABLE IF NOT EXISTS `pregunta` (
  `id_pregunta` int(100) NOT NULL auto_increment,
  `cc_estudiante` bigint(100) default NULL,
  `id_respuesta_selec` int(100) default NULL,
  `id_asignatura` bigint(100) default NULL,
  `pregunta` blob,
  `estado_pregunta` varchar(200) default NULL,
  `fecha_pregunta` date default NULL,
  PRIMARY KEY  (`id_pregunta`),
  UNIQUE KEY `unique_id_pregunta` (`id_pregunta`),
  KEY `fk_pregunta_cc_estudiante` (`cc_estudiante`),
  KEY `fk_pregunta_id_asignatura` (`id_asignatura`),
  CONSTRAINT `fk_pregunta_cc_estudiante` FOREIGN KEY (`cc_estudiante`) REFERENCES `estudiante` (`cc_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pregunta_id_asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 17408 kB; (`id_asigntura`) REFER `prueba_ifactu';

-- Volcando datos para la tabla prueba_ifactum.pregunta: ~3 rows (aproximadamente)
DELETE FROM `pregunta`;
/*!40000 ALTER TABLE `pregunta` DISABLE KEYS */;
INSERT INTO `pregunta` (`id_pregunta`, `cc_estudiante`, `id_respuesta_selec`, `id_asignatura`, `pregunta`, `estado_pregunta`, `fecha_pregunta`) VALUES
	(1, 200, 2, 1, _binary 0xC2BF4375616C206573206C61207261C3AD7A20637561647261646120646520353F, 'Resuelta', '2014-08-27'),
	(2, 202, 0, 5, _binary 0xC2BF20517569656E20696E76656E746F206C61207461626C612070657269C3B364696361203F, 'Sin Resolver', '2014-08-21'),
	(3, 202, 0, 5, _binary 0x4573746520736572C3A120656C20706572736F6E616A653F, 'Sin Resolver', '2014-08-28');
/*!40000 ALTER TABLE `pregunta` ENABLE KEYS */;


-- Volcando estructura para tabla prueba_ifactum.pregunta_estrellas
DROP TABLE IF EXISTS `pregunta_estrellas`;
CREATE TABLE IF NOT EXISTS `pregunta_estrellas` (
  `id_pregunta_estrellas` int(100) NOT NULL auto_increment,
  `cc_monitor` bigint(100) default NULL,
  `id_pregunta` int(100) default NULL,
  `n_estrellas` int(10) default NULL,
  PRIMARY KEY  (`id_pregunta_estrellas`),
  UNIQUE KEY `id_estrellas` (`cc_monitor`,`id_pregunta`),
  KEY `fk_estrella_id_pregunta` (`id_pregunta`),
  CONSTRAINT `fk_estrella_cc_monitor` FOREIGN KEY (`cc_monitor`) REFERENCES `estudiante` (`cc_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_estrella_id_pregunta` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla prueba_ifactum.pregunta_estrellas: ~3 rows (aproximadamente)
DELETE FROM `pregunta_estrellas`;
/*!40000 ALTER TABLE `pregunta_estrellas` DISABLE KEYS */;
INSERT INTO `pregunta_estrellas` (`id_pregunta_estrellas`, `cc_monitor`, `id_pregunta`, `n_estrellas`) VALUES
	(1, 202, 1, 5),
	(2, 201, 1, 3),
	(3, 201, 2, 2);
/*!40000 ALTER TABLE `pregunta_estrellas` ENABLE KEYS */;


-- Volcando estructura para tabla prueba_ifactum.respuesta
DROP TABLE IF EXISTS `respuesta`;
CREATE TABLE IF NOT EXISTS `respuesta` (
  `id_respuesta` int(100) NOT NULL auto_increment,
  `id_pregunta` int(100) default NULL,
  `cc_monitor` bigint(100) default NULL,
  `respuesta` blob,
  `fecha_respuesta` date default NULL,
  PRIMARY KEY  (`id_respuesta`),
  UNIQUE KEY `file_id` (`id_pregunta`,`cc_monitor`),
  KEY `fk_respuesta_id_pregunta` USING BTREE (`id_pregunta`),
  KEY `fk_respuesta_cc_monitor` USING BTREE (`cc_monitor`),
  CONSTRAINT `fk_respuesta_cc_monitor` FOREIGN KEY (`cc_monitor`) REFERENCES `estudiante` (`cc_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_respuesta_id_pregunta` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla prueba_ifactum.respuesta: ~3 rows (aproximadamente)
DELETE FROM `respuesta`;
/*!40000 ALTER TABLE `respuesta` DISABLE KEYS */;
INSERT INTO `respuesta` (`id_respuesta`, `id_pregunta`, `cc_monitor`, `respuesta`, `fecha_respuesta`) VALUES
	(1, 1, 202, _binary 0x3235, '2014-08-27'),
	(2, 1, 201, _binary 0x3235204372656F20796F20616361, '2014-08-27'),
	(3, 2, 201, _binary 0x4D656E64656C6576, '2014-08-27');
/*!40000 ALTER TABLE `respuesta` ENABLE KEYS */;


-- Volcando estructura para tabla prueba_ifactum.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(100) NOT NULL auto_increment,
  `codigo_usuario` bigint(100) default NULL,
  `nombres_usuario` varchar(100) default NULL,
  `apellidos_usuario` varchar(100) default NULL,
  `clave_usuario` varchar(100) default NULL,
  `tipo_usuario` int(10) default NULL,
  `fecha_registro_usuario` date default NULL,
  `estado_usuario` varchar(100) default NULL,
  PRIMARY KEY  (`id_usuario`),
  UNIQUE KEY `num_usuario` USING BTREE (`id_usuario`),
  UNIQUE KEY `cedula_usuario` (`codigo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla prueba_ifactum.usuario: ~4 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `codigo_usuario`, `nombres_usuario`, `apellidos_usuario`, `clave_usuario`, `tipo_usuario`, `fecha_registro_usuario`, `estado_usuario`) VALUES
	(1, 100, 'Administrador', 'Admin', 'e3afed0047b08059d0fada10f400c1e5', 1, '2014-04-08', 'Habilitado'),
	(2, 200, 'Julio Cesar', 'Deavila Pertuz', '202cb962ac59075b964b07152d234b70', 2, '2014-04-08', 'Habilitado'),
	(3, 201, 'Aury Pautt', 'Quiñonez', '757b505cfd34c64c85ca5b5690ee5293', 2, '2014-08-27', 'Habilitado'),
	(4, 202, 'Hector ', 'Pertuz Patron', '854d6fae5ee42911677c739ee1734486', 2, '2014-08-07', 'Habilitado');
  (5, 500, 'Sandor ', 'Luque Farfan', 'e10adc3949ba59abbe56e057f20f883e', 1, '2019-10-07', 'Habilitado');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
