-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-02-2012 a las 18:40:05
-- Versión del servidor: 5.1.44
-- Versión de PHP: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `costaBlanca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jos_inmo`
--

DROP TABLE IF EXISTS `#__inmo`;
CREATE TABLE IF NOT EXISTS `#__inmo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePropiedad` varchar(100) NOT NULL,
  `numeroReferencia` int(10) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `precio` int(10) DEFAULT NULL,
  `poblacion` varchar(100) DEFAULT NULL,
  `nhabitacions` int(2) DEFAULT NULL,
  `nbanyos` int(2) DEFAULT NULL,
  `m2Construidos` int(4) DEFAULT NULL,
  `m2Parcela` int(6) DEFAULT NULL,
  `anyoConstruccion` int(4) DEFAULT NULL,
  `piscina` tinyint(1) DEFAULT NULL,
  `piscinaComunitaria` tinyint(1) DEFAULT NULL,
  `vistasAlMar` tinyint(1) DEFAULT NULL,
  `comodidades` varchar(1000) DEFAULT NULL,
  `distancias` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

--
-- Volcar la base de datos para la tabla `jos_inmo`
--

INSERT INTO `#__inmo` VALUES(95, 'Chaletazo', 4, 'villa', 1000000, 'Javea', 4, 3, 150, 1000, 2005, 0, 0, 1, '', '');
INSERT INTO `#__inmo` VALUES(94, 'Bungalow India', 3, 'apartamento', 150000, 'Javea', 1, 1, 60, 80, 2004, 1, 0, 1, '', '');
INSERT INTO `#__inmo` VALUES(93, 'Bungalow Cumbre del Sol', 2, 'apartamento', 100000, 'Benitachell', 2, 1, 70, 100, 2000, 1, 0, 1, '', '');
INSERT INTO `#__inmo` VALUES(92, 'Chalet Cumbre del Sol', 1, 'adosado', 300000, 'Benitachell', 5, 2, 160, 600, 1998, 0, 1, 0, '', '');

DROP TABLE IF EXISTS `#__fotos`;
CREATE TABLE IF NOT EXISTS `#__fotos` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `casa_id` int(100) DEFAULT NULL,
  `foto_url` text,
  `portada` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31755 ;

--
-- Volcar la base de datos para la tabla `jos_fotos`
--

INSERT INTO `#__fotos` VALUES(31753, 94, '34DSC00728.JPG', 0);
INSERT INTO `#__fotos` VALUES(31750, 95, '41DSC00738.JPG', 1);
INSERT INTO `#__fotos` VALUES(31745, 92, '11DSC00726.JPG', 1);
INSERT INTO `#__fotos` VALUES(31752, 94, '33DSC00727.JPG', 0);
INSERT INTO `#__fotos` VALUES(31737, 93, '20DSC00037a.jpg', 1);
INSERT INTO `#__fotos` VALUES(31738, 93, '21DSC00038a.jpg', 0);
INSERT INTO `#__fotos` VALUES(31754, 94, '35DSC00729.JPG', 0);
INSERT INTO `#__fotos` VALUES(31740, 94, '30DSC00738.JPG', 1);
INSERT INTO `#__fotos` VALUES(31751, 94, '32DSC00726.JPG', 0);
INSERT INTO `#__fotos` VALUES(31749, 94, '32DSC00732.JPG', 0);
