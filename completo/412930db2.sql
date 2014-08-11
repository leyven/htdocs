-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-04-2014 a las 08:29:42
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `412930db2`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `descarga`
--

INSERT INTO `descarga` (`id_descarga`, `Url_archivoDescarga`, `num_solicitud`) VALUES
(1, 'leyven.eu5.org/1248/descargas/khalesi.jpg', 1248),
(2, 'leyven.eu5.org/1248/descargas/miko.jpg', 1248),
(3, 'leyven.eu5.org/1248/descargas/remilia.jpg', 1248),
(4, 'miko.jpg', 1249),
(5, 'remilia.jpg', 1249),
(6, 'khalesi.jpg', 1249),
(7, 'important.txt', 1249);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_anticipo`
--

CREATE TABLE IF NOT EXISTS `pago_anticipo` (
  `idPago_anticipo` int(10) NOT NULL AUTO_INCREMENT,
  `num_solicitud` int(6) NOT NULL,
  `anticipo` tinyint(1) NOT NULL,
  `pago` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPago_anticipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `pago_anticipo`
--

INSERT INTO `pago_anticipo` (`idPago_anticipo`, `num_solicitud`, `anticipo`, `pago`) VALUES
(1, 1238, 0, 1),
(2, 1238, 0, 1),
(3, 1238, 0, 1),
(4, 1241, 0, 1),
(5, 1240, 0, 1),
(6, 1238, 1, 0),
(7, 1249, 0, 1),
(8, 1249, 1, 0),
(9, 1249, 1, 0),
(10, 1249, 1, 0),
(11, 1253, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba_servidor`
--

CREATE TABLE IF NOT EXISTS `prueba_servidor` (
  `idPrueba_servidor` int(10) NOT NULL AUTO_INCREMENT,
  `ruta_archivo` varchar(150) NOT NULL,
  `num_solicitud` int(6) NOT NULL,
  `Preferencias` tinyint(1) DEFAULT NULL,
  `Comentarios` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idPrueba_servidor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `prueba_servidor`
--

INSERT INTO `prueba_servidor` (`idPrueba_servidor`, `ruta_archivo`, `num_solicitud`, `Preferencias`, `Comentarios`) VALUES
(8, 'remilia.jpg', 1249, 1, 'esta hermosa remi D:'),
(11, 'miko.jpg', 1249, 1, 'Aqui puedes poner tus comentarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `num_solicitud` int(6) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  PRIMARY KEY (`num_solicitud`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1254 ;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`num_solicitud`, `id_usuario`, `descripcion`) VALUES
(1253, 44, 'Aqui puedes poner tus comentarios'),
(1252, 43, 'Aqui puedes poner tus comentarios'),
(1251, 42, 'Aqui puedes poner tus comentarios'),
(1250, 41, 'hola como estaas'),
(1249, 40, 'i just want to go to bravoos'),
(1248, 39, 'winter is coming');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Nombre`, `Email`, `Telefono`, `id_usuario`) VALUES
('jomeli', 'cancino@hotmail.com', '912341', 44),
('jaimes', 'elcorreo@gmail.com', '6161012', 43),
('jaime', 'simel@gmail.com', '99999', 42),
('roy', 'gmatria', '9611212', 41),
('Arya', 'girlieStark@gmail.com', '9919239123', 40),
('Eddark', 'Stark@gmail.com', '9612280123', 39);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
