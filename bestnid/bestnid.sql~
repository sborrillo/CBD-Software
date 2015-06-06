-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-06-2015 a las 05:35:50
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bestnid`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE IF NOT EXISTS `publicacion` (
  `id_publicacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `descripcion` text,
  `dni_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `foto` varchar(30) NOT NULL,
  PRIMARY KEY (`id_publicacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `numero` int(11) NOT NULL,
  `localidad` varchar(30) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `depto` varchar(3) NOT NULL,
  `piso` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `apellido`, `email`, `numero`, `localidad`, `calle`, `depto`, `piso`, `password`, `nombre_usuario`, `admin`) VALUES
(0, 'User', 'User', 'user@gmail.com', 0, 'zzz', 'zzz', '', 0, 'usuario', 'usuario', 0),
(35408572, 'Amaro', 'Darchez', 'amarodarchez@gmail.com', 453, 'Brandsen', 'Mitre', '', 0, 'amaro', 'amarodarchez', 1),
(111111111, 'Admin', 'Admin', 'admin@gmail.com', 111, 'xxx', 'xxx', '', 0, 'admin', 'admin', 1),
(123456789, 'Alexis', 'Carrarini', 'ale@gmail.com', 111, 'La Plata', '111', '', 0, 'alexis', 'alecarrarini', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
