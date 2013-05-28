-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2013 a las 12:22:59
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
(7, 'Tacticas');

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
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `Titulo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Contenido` mediumtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(1000) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`idRespuesta`, `texto`, `idUsuario`, `idTema`, `f_creacion`) VALUES
(2, 'jggdfcgvg d\r\ndfgdsdfgfsdgfd\r\nfdsdfdfgfgsdfgsdg\r\n', 1, 1, '2013-04-02 10:00:00'),
(3, 'Contestacion al primer tema de prueba creado sobre el USO de VCE dentro de una party 3vs3', 2, 2, '2013-04-03 11:47:31'),
(4, 'Respuesta nueva de prueba', 2, 1, '2013-04-03 10:12:00'),
(5, 'REspuesta nuevaaaaa, probando que ya se creen todos los campos correctamente!!!!!', 1, 1, '2013-04-03 12:00:00'),
(6, 'hola que ase', 1, 1, '2013-04-17 00:00:00'),
(7, 'hola que ase', 1, 1, '2013-04-17 00:00:00'),
(8, 'hola que ase', 1, 1, '2013-04-17 00:00:00'),
(9, 'hola que ase', 1, 1, '2013-04-17 00:00:00'),
(10, 'hola que ase', 1, 1, '2013-04-17 00:00:00'),
(11, 'hola que ase', 1, 1, '2013-04-17 00:00:00'),
(12, 'hola que ase', 1, 1, '2013-04-17 00:00:00'),
(13, 'hola que ase', 1, 1, '2013-04-17 00:00:00'),
(14, 'dfdg wsdafd', 1, 1, '2013-05-14 13:30:36'),
(15, 'asdasdas', 1, 1, '2013-05-14 13:30:51'),
(16, 'asdasdas', 1, 1, '2013-05-14 13:31:19'),
(17, 'sdfsdf', 1, 1, '2013-05-14 13:31:36'),
(18, 'Probando', 1, 3, '2013-05-14 13:32:53'),
(19, 'asdasdasd asdd ', 1, 6, '2013-05-14 13:34:42'),
(20, 'askldksjad\r\n\r\nalskdjaskd k\r\n\r\nslkalkdaslñdk', 1, 10, '2013-05-14 13:59:53'),
(21, 'asdsadas\r\nsad\r\nasdas\r\ndas\r\nd\r\n\r\n\r\nasdasdasd', 1, 8, '2013-05-14 14:01:16');

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
  `cerrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idTema`),
  KEY `usuario` (`usuario`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`idTema`, `idCategoria`, `nombre`, `texto`, `f_creacion`, `usuario`, `cerrado`) VALUES
(1, 1, 'Primer tema de prueba', 'Este es el primer hilo del foro a modo de prueba.\r\n\r\nCreado el 2 de Abril de 2013', '2013-04-02 00:00:00', 1, 0),
(2, 1, 'Tema sobre VCE', 'Este es un tema de prueba sobre el uso de VCE dentro de Starcraft II', '2013-04-03 12:44:21', 2, 0),
(3, 1, 'Tema de prueba hoy', 'contenido de prueba', '2013-05-14 12:34:51', 1, 0),
(4, 1, 'sdfsdf', '', '2013-05-14 13:27:28', 1, 0),
(5, 2, 'Mi vida por Aiur', 'Pos eso, que mi vida por Aiur', '2013-05-14 13:33:18', 1, 0),
(6, 1, 'Soy unos paquetes', 'Paquetes', '2013-05-14 13:33:27', 1, 0),
(7, 1, 'asdasasd', 'asdasdasda', '2013-05-14 13:34:57', 1, 0),
(8, 1, 'asdasdasasda', 'asdasdadada', '2013-05-14 13:35:24', 1, 0),
(9, 3, 'Zerg overpowered', 'Estan mazo de op porque me matan al empezar con los 6 pull de %&$%%', '2013-05-14 13:52:47', 1, 0),
(10, 7, 'Táctica megaOP', 'Hola mensitos, tengo una táctica megarebuena para ganar todas las partiditas. \r\n\r\nLa dejo abajo:\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n8======D', '2013-05-14 13:53:55', 1, 0);

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
