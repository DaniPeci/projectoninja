-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-04-2013 a las 12:20:40
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `starcraft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombre`) VALUES
(1, 'General'),
(2, 'Protoss'),
(3, 'Zerg'),
(4, 'Terran'),
(5, 'Comunidad'),
(6, 'Ayuda'),
(7, 'Tácticas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuario`
--

CREATE TABLE IF NOT EXISTS `datos_usuario` (
  `idUsuario` int(11) NOT NULL,
  `password` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cod_postal` int(5) NOT NULL,
  `sexo` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `f_alta` date NOT NULL,
  `f_nacimiento` date NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datos_usuario`
--

INSERT INTO `datos_usuario` (`idUsuario`, `password`, `nombre`, `correo`, `direccion`, `cod_postal`, `sexo`, `f_alta`, `f_nacimiento`) VALUES
(1, 'ovkoBJkZ8UmLU', 'Overlord', 'overlord.webmaster@gmail.com', 'C\\Falsa nº8, puerta zerg', 34765, 'H', '2013-03-20', '2013-04-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE IF NOT EXISTS `respuesta` (
  `idRespuesta` int(11) NOT NULL AUTO_INCREMENT,
  `texto` longtext COLLATE utf8mb4_spanish_ci NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idTema` int(11) NOT NULL,
  `f_creacion` datetime NOT NULL,
  PRIMARY KEY (`idRespuesta`),
  KEY `idUsuario` (`idUsuario`,`idTema`),
  KEY `idTema` (`idTema`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`idRespuesta`, `texto`, `idUsuario`, `idTema`, `f_creacion`) VALUES
(2, 'jggdfcgvg d\r\ndfgdsdfgfsdgfd\r\nfdsdfdfgfgsdfgsdg\r\n', 1, 1, '2013-04-02 10:00:00'),
(3, 'Contestacion al primer tema de prueba creado sobre el USO de VCE dentro de una party 3vs3', 2, 2, '2013-04-03 11:47:31'),
(4, 'Respuesta nueva de prueba', 2, 1, '2013-04-03 10:12:00'),
(5, 'REspuesta nuevaaaaa, probando que ya se creen todos los campos correctamente!!!!!', 1, 1, '2013-04-03 12:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE IF NOT EXISTS `tema` (
  `idTema` int(11) NOT NULL AUTO_INCREMENT,
  `idCategoria` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `texto` longtext COLLATE utf8_spanish_ci NOT NULL,
  `f_creacion` datetime NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`idTema`),
  KEY `usuario` (`usuario`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`idTema`, `idCategoria`, `nombre`, `texto`, `f_creacion`, `usuario`) VALUES
(1, 1, 'Primer tema de prueba', 'Este es el primer hilo del foro a modo de prueba.\r\n\r\nCreado el 2 de Abril de 2013', '2013-04-02 00:00:00', 1),
(2, 1, 'Tema sobre VCE', 'Este es un tema de prueba sobre el uso de VCE dentro de Starcraft II', '2013-04-03 12:44:21', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Miembro',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nickname` (`nickname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nickname`, `rol`) VALUES
(1, 'overlord', 'Administrador'),
(2, 'VCE', 'Miembro');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datos_usuario`
--
ALTER TABLE `datos_usuario`
  ADD CONSTRAINT `datos_usuario_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_ibfk_2` FOREIGN KEY (`idTema`) REFERENCES `tema` (`idTema`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tema`
--
ALTER TABLE `tema`
  ADD CONSTRAINT `tema_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tema_ibfk_3` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
