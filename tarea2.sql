-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-12-2016 a las 04:39:16
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tarea2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cines`
--

CREATE TABLE IF NOT EXISTS `cines` (
  `id_cine` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cine`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cines`
--

INSERT INTO `cines` (`id_cine`, `Nombre`) VALUES
(1, 'Joliwud'),
(2, 'Joitz'),
(3, 'Sin Espia'),
(4, 'La Pantallita'),
(5, 'Xinetiko');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `RUT` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `RUT` (`RUT`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `Usuario`, `Pass`, `RUT`) VALUES
(1, 'Javaers', 'wazxde00', 19078156),
(2, 'dririon', 'exdi', 14235674),
(3, 'umauro', 'picopalquelee', 12345678);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `cliente_id` int(11) NOT NULL,
  `pelicula_id` int(11) NOT NULL,
  `comentario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cliente_id`,`pelicula_id`),
  KEY `pelicula_id` (`pelicula_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`cliente_id`, `pelicula_id`, `comentario`) VALUES
(2, 3, 'Fome la wea (Y)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE IF NOT EXISTS `funciones` (
  `id_funcion` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` varchar(50) NOT NULL,
  `Hora` varchar(50) NOT NULL,
  `pelicula_id` int(11) NOT NULL,
  `sala_id` int(11) NOT NULL,
  PRIMARY KEY (`id_funcion`),
  KEY `pelicula_id` (`pelicula_id`),
  KEY `sala_id` (`sala_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `funciones`
--

INSERT INTO `funciones` (`id_funcion`, `Fecha`, `Hora`, `pelicula_id`, `sala_id`) VALUES
(1, '25/3/2916', '15:45', 1, 1),
(2, '25/3/2916', '16:30', 2, 10),
(3, '25/3/2916', '18:50', 3, 2),
(4, '26/4/2096', '13:00', 4, 9),
(5, '26/4/2096', '14:55', 5, 3),
(6, '26/4/2096', '17:15', 1, 8),
(7, '26/4/2096', '20:20', 2, 4),
(8, '27/4/2096', '00:00', 3, 7),
(9, '27/4/2096', '04:20', 4, 5),
(10, '27/4/2096', '08:00', 5, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE IF NOT EXISTS `peliculas` (
  `id_pelicula` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Genero` varchar(50) NOT NULL,
  `Clasificacion` varchar(50) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Directores` varchar(50) NOT NULL,
  `Actores` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pelicula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_pelicula`, `Nombre`, `Genero`, `Clasificacion`, `Precio`, `Directores`, `Actores`) VALUES
(1, 'El Fantasma Del LDS', 'Supsenso', 'M', 918273645, 'Super Mechon', 'Palbito, Sadaka, Felipito'),
(2, 'La Barra que queria ser un Helicoptero', 'Drama', 'T', 13249786, 'Vector', 'Juan, Rex'),
(3, 'El Baile de Guiza', 'Comedia', 'E', 777666, 'Marmota', 'Guiza'),
(4, 'La Barra que queria ser un Helicoptero: El Regreso', 'Drama', 'T', 99895847, 'Vector', 'Poichito, Alan, Mauro'),
(5, 'El Fantasma del LDS contraataca', 'Terror', 'M', 89944433, 'Super Mechon', 'Felipito, MeatBoy, Palbito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula_en_cine`
--

CREATE TABLE IF NOT EXISTS `pelicula_en_cine` (
  `cine_id` int(11) NOT NULL,
  `pelicula_id` int(11) NOT NULL,
  PRIMARY KEY (`cine_id`,`pelicula_id`),
  KEY `pelicula_id` (`pelicula_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `RUT` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Sexo` varchar(50) NOT NULL,
  `Edad` int(11) NOT NULL,
  PRIMARY KEY (`RUT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`RUT`, `Nombre`, `Apellido`, `Email`, `Sexo`, `Edad`) VALUES
(12345678, 'Mauricio', 'Mauro', 'mmauro@mauro.es', 'M', 33),
(14235674, 'El', 'Dana', 'dririon@exdi.com', 'M', 23),
(17345279, 'Pantalla', 'LG', 'estoes@uncorrreo.com', 'F', 31),
(19078156, 'Javaer', 'Largo', 'java@sansanofilms.cl', 'M', 21),
(19201425, 'Victor', 'Zavala', 'elmismisimo@sansanofilms.cl', 'M', 21),
(99887766, 'Parece', 'Una Boina', 'mail@example.com', '?', 87);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectadores`
--

CREATE TABLE IF NOT EXISTS `proyectadores` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `id_proyectador` int(11) NOT NULL,
  `RUT` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  UNIQUE KEY `id_proyectador` (`id_proyectador`),
  KEY `RUT` (`RUT`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `proyectadores`
--

INSERT INTO `proyectadores` (`id_empleado`, `id_proyectador`, `RUT`) VALUES
(1, 1, 19201425),
(2, 2, 99887766);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE IF NOT EXISTS `salas` (
  `id_sala` int(11) NOT NULL AUTO_INCREMENT,
  `Asientos` int(11) NOT NULL,
  `cine_id` int(11) NOT NULL,
  PRIMARY KEY (`id_sala`),
  KEY `cine_id` (`cine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`id_sala`, `Asientos`, `cine_id`) VALUES
(1, 100, 1),
(2, 100, 1),
(3, 100, 2),
(4, 100, 2),
(5, 100, 3),
(6, 100, 3),
(7, 100, 4),
(8, 100, 4),
(9, 100, 5),
(10, 100, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id_ticket` int(11) NOT NULL AUTO_INCREMENT,
  `Asiento` varchar(50) NOT NULL,
  `Precio` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `funcion_id` int(11) NOT NULL,
  `vendedor_id` int(11) NOT NULL,
  PRIMARY KEY (`id_ticket`),
  KEY `cliente_id` (`cliente_id`),
  KEY `funcion_id` (`funcion_id`),
  KEY `vendedor_id` (`vendedor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_ol`
--

CREATE TABLE IF NOT EXISTS `ticket_ol` (
  `id_ticketol` int(11) NOT NULL AUTO_INCREMENT,
  `Asiento` int(11) NOT NULL,
  `Precio` int(11) NOT NULL,
  `funcion_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  PRIMARY KEY (`id_ticketol`),
  KEY `funcion_id` (`funcion_id`),
  KEY `cliente_id` (`cliente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `ticket_ol`
--

INSERT INTO `ticket_ol` (`id_ticketol`, `Asiento`, `Precio`, `funcion_id`, `cliente_id`) VALUES
(1, 22, 3500, 1, 1),
(2, 34, 5000, 9, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE IF NOT EXISTS `turnos` (
  `proyectador_id` int(11) NOT NULL,
  `sala_id` int(11) NOT NULL,
  `hora_inicio` varchar(50) NOT NULL,
  PRIMARY KEY (`proyectador_id`,`sala_id`),
  KEY `sala_id` (`sala_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`proyectador_id`, `sala_id`, `hora_inicio`) VALUES
(1, 1, '10'),
(1, 2, '12'),
(1, 4, '8'),
(2, 7, '23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE IF NOT EXISTS `vendedores` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `id_vendedor` int(11) NOT NULL,
  `RUT` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  UNIQUE KEY `id_vendedor` (`id_vendedor`),
  KEY `RUT` (`RUT`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`id_empleado`, `id_vendedor`, `RUT`) VALUES
(1, 1, 17345279);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`RUT`) REFERENCES `personas` (`RUT`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`id_pelicula`) ON DELETE CASCADE;

--
-- Filtros para la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD CONSTRAINT `funciones_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`id_pelicula`) ON DELETE CASCADE,
  ADD CONSTRAINT `funciones_ibfk_2` FOREIGN KEY (`sala_id`) REFERENCES `salas` (`id_sala`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pelicula_en_cine`
--
ALTER TABLE `pelicula_en_cine`
  ADD CONSTRAINT `pelicula_en_cine_ibfk_1` FOREIGN KEY (`cine_id`) REFERENCES `cines` (`id_cine`) ON DELETE CASCADE,
  ADD CONSTRAINT `pelicula_en_cine_ibfk_2` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`id_pelicula`) ON DELETE CASCADE;

--
-- Filtros para la tabla `proyectadores`
--
ALTER TABLE `proyectadores`
  ADD CONSTRAINT `proyectadores_ibfk_1` FOREIGN KEY (`RUT`) REFERENCES `personas` (`RUT`) ON DELETE CASCADE;

--
-- Filtros para la tabla `salas`
--
ALTER TABLE `salas`
  ADD CONSTRAINT `salas_ibfk_1` FOREIGN KEY (`cine_id`) REFERENCES `cines` (`id_cine`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`funcion_id`) REFERENCES `funciones` (`id_funcion`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`vendedor_id`) REFERENCES `vendedores` (`id_vendedor`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ticket_ol`
--
ALTER TABLE `ticket_ol`
  ADD CONSTRAINT `ticket_ol_ibfk_1` FOREIGN KEY (`funcion_id`) REFERENCES `funciones` (`id_funcion`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_ol_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE;

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_ibfk_1` FOREIGN KEY (`proyectador_id`) REFERENCES `proyectadores` (`id_proyectador`) ON DELETE CASCADE,
  ADD CONSTRAINT `turnos_ibfk_2` FOREIGN KEY (`sala_id`) REFERENCES `salas` (`id_sala`) ON DELETE CASCADE;

--
-- Filtros para la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD CONSTRAINT `vendedores_ibfk_1` FOREIGN KEY (`RUT`) REFERENCES `personas` (`RUT`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
