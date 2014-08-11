-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2014 a las 06:24:42
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `agenciapublicidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descarga`
--

CREATE TABLE IF NOT EXISTS `descarga` (
  `id_descarga` int(10) NOT NULL AUTO_INCREMENT,
  `Url_archivoDescarga` varchar(100) NOT NULL,
  `num_solicitud` int(6) NOT NULL,
  PRIMARY KEY (`id_descarga`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_anticipo`
--

CREATE TABLE IF NOT EXISTS `pago_anticipo` (
  `idPago_anticipo` int(10) NOT NULL AUTO_INCREMENT,
  `ruta_archivoComprobante` varchar(150) NOT NULL,
  `num_solicitud` int(6) NOT NULL,
  `anticipo` tinyint(1) NOT NULL,
  `pago` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPago_anticipo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba_servidor`
--

CREATE TABLE IF NOT EXISTS `prueba_servidor` (
  `idPrueba_servidor` int(10) NOT NULL AUTO_INCREMENT,
  `ruta_archivo` varchar(150) NOT NULL,
  `num_solicitud` int(6) NOT NULL,
  PRIMARY KEY (`idPrueba_servidor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `prueba_servidor`
--

INSERT INTO `prueba_servidor` (`idPrueba_servidor`, `ruta_archivo`, `num_solicitud`) VALUES
(1, 'www.chingatumadre.com', 1234),
(2, 'www.tumamaentanga.gob', 1234),
(3, 'c://ProgramFiles/Desktop', 1234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `num_solicitud` int(6) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  PRIMARY KEY (`num_solicitud`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1239 ;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`num_solicitud`, `id_usuario`, `descripcion`) VALUES
(1234, 123, 'Me gustaria que modifiques ciertos campos'),
(1235, 22, 'descripcion'),
(1236, 27, 'descripcion'),
(1237, 28, 'the beast is quite crazy right now '),
(1238, 28, 'the beast is quite crazy right now ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `Nombre` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `id_usuario` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Nombre`, `Email`, `Telefono`, `id_usuario`) VALUES
('khal drogo', 'nyhedgg@gmail.com', '9612280212', 22),
('khal drogo', 'nyhedgg@gmail.com', '9612280212', 21),
('khal drogo', 'nyhedgg@gmail.com', '9612280212', 20),
('khal drogo', 'nyhedgg@gmail.com', '9612280212', 19),
('khal drogo', 'Stormborn@gmail.com', '9612222512', 18),
('khal drogo', 'Stormborn@gmail.com', '9612222512', 17),
('Daenerys', 'Stormborn@gmail.com', '9612222512', 16),
('khal drogo', 'nyhedgg@gmail.com', '9612280212', 23),
('khal drogo', 'nyhedgg@gmail.com', '9612280212', 24),
('khal drogo', 'nyhedgg@gmail.com', '9612222512', 25),
('khal drogo', 'nyhedgg@gmail.com', '9612222512', 26),
('Dantaleon', 'lordofchaos@kimera.hell', '6661222281', 27),
('Leraje', 'lordofchaos@kimera.hell', '6661222281', 28),
('Leraje', 'lordofchaos@kimera.hell', '6661222281', 29);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
