-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2014 a las 18:22:09
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `estancia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agregardocumento`
--

CREATE TABLE IF NOT EXISTS `agregardocumento` (
  `idPdf` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  PRIMARY KEY (`idPdf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agregarslider`
--

CREATE TABLE IF NOT EXISTS `agregarslider` (
  `idSlider` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(50) NOT NULL,
  PRIMARY KEY (`idSlider`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `idAlbum` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`idAlbum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `idArticulo` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(500) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Presentaciones` varchar(500) NOT NULL,
  `Codigo` varchar(50) NOT NULL,
  PRIMARY KEY (`idArticulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`idArticulo`, `Titulo`, `Descripcion`, `Presentaciones`, `Codigo`) VALUES
(1, 'Pez Tilata', 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'dignissim ante. Donec felis lacus, venenatis ut an', 'bt1'),
(2, 'Tilata', 'dignissim ante. Donec felis lacus, venenatis ut ante sit amet, condimentum tincidunt lacus. Duis eu dapibus erat, at sagittis ', 'dignissim ante. Donec felis lacus, venenatis ut ante sit amet, condimentum tincidunt lacus. Duis eu dapibus erat, at sagittis ', 'bt1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE IF NOT EXISTS `contenido` (
  `idContenido` int(20) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Imagen` varchar(50) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Lugar` varchar(50) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directorio`
--

CREATE TABLE IF NOT EXISTS `directorio` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(250) NOT NULL,
  `Puesto` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Celular` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleo`
--

CREATE TABLE IF NOT EXISTS `empleo` (
  `idEmpleo` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Vacante` tinyint(1) NOT NULL,
  PRIMARY KEY (`idEmpleo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
  `idGaleria` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(255) NOT NULL,
  `idAlbum` int(11) NOT NULL,
  `Imagen` varchar(255) NOT NULL,
  PRIMARY KEY (`idGaleria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetario`
--

CREATE TABLE IF NOT EXISTS `recetario` (
  `idRecetario` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Ingredientes` varchar(255) NOT NULL,
  `Imagen` varchar(255) NOT NULL,
  PRIMARY KEY (`idRecetario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptor`
--

CREATE TABLE IF NOT EXISTS `suscriptor` (
  `idSuscriptor` int(20) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Aprovado` tinyint(1) NOT NULL,
  `Tiempo` datetime NOT NULL,
  PRIMARY KEY (`idSuscriptor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
