-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-07-2017 a las 05:03:23
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbtest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencias_esp`
--

CREATE TABLE `competencias_esp` (
  `ID_PROGRAMA` int(11) NOT NULL,
  `COMPETENCIAS_ESPECIFICAS` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencias_trans`
--

CREATE TABLE `competencias_trans` (
  `ID_PROGRAMA` int(11) NOT NULL,
  `OBJETIVOS` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convalidacion`
--

CREATE TABLE `convalidacion` (
  `ID_PAGO` int(11) NOT NULL,
  `ID_CONVALIDACION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `ID_PRO` int(11) NOT NULL,
  `ID_EMPRESA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `ID_ENCUESTA` int(11) NOT NULL,
  `SEMESTRE` int(11) NOT NULL,
  `ID_PROGRAMA(PK)` int(11) NOT NULL,
  `MAS_RESCATABLE IF NOT EXISTS` varchar(200) NOT NULL,
  `MENOS_RESCATABLE IF NOT EXISTS` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `ID_ESTUDIANTE` int(11) NOT NULL,
  `NOMBRE` varchar(45) NOT NULL,
  `BANEADO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes_cursan`
--

CREATE TABLE `estudiantes_cursan` (
  `ID_ASIGNATURA` int(11) NOT NULL,
  `ID_ESTUDIANTE` int(11) NOT NULL,
  `SEMESTRE` int(11) NOT NULL,
  `ID_TALLER` int(11) NOT NULL,
  `IS_CONVALIDADO` int(11) NOT NULL,
  `ASISTENCIA` int(11) NOT NULL,
  `NOTAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes_proponentes`
--

CREATE TABLE `estudiantes_proponentes` (
  `ID_EPRO` int(11) NOT NULL,
  `ID_PRO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exalumnos`
--

CREATE TABLE `exalumnos` (
  `ID_PRO` int(11) NOT NULL,
  `ID_EXALUMNO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas_semanales`
--

CREATE TABLE `horas_semanales` (
  `CREDITOS` int(11) NOT NULL,
  `HORAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_sesion`
--

CREATE TABLE `info_sesion` (
  `N_SESION` int(11) NOT NULL,
  `NOMBRE_SESION` varchar(45) NOT NULL,
  `ACTIVIDAD` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodologia`
--

CREATE TABLE `metodologia` (
  `ID_PROGRAMA` int(11) NOT NULL,
  `METODOLOGIA` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monetario`
--

CREATE TABLE `monetario` (
  `ID_PAGO` int(11) NOT NULL,
  `ID_MONETARIO` int(11) NOT NULL,
  `MONTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivos`
--

CREATE TABLE `objetivos` (
  `ID_PROGRAMA` int(11) NOT NULL,
  `OBJETIVO` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `ID_PAGO` int(11) NOT NULL,
  `ID_EPRO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prereq`
--

CREATE TABLE `prereq` (
  `ID_PROGRAMA` int(11) NOT NULL,
  `PREREQUISITOS` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `ID_PRO` int(11) NOT NULL,
  `ID_PROFESOR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `ID_PROGRAMA` int(11) NOT NULL,
  `ID_PRO` int(11) NOT NULL,
  `CREDITOS` int(11) NOT NULL,
  `HORARIO` varchar(8) NOT NULL,
  `CANT_SESIONES` int(11) NOT NULL,
  `F_INICIO` varchar(8) NOT NULL,
  `F_TERMINO` varchar(8) NOT NULL,
  `DESCRIPCION` varchar(200) NOT NULL,
  `P_ASISTENCIA` int(11) NOT NULL,
  `NOTA_FINAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proponente`
--

CREATE TABLE `proponente` (
  `ID_PRO` int(11) NOT NULL,
  `NAME` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `req_ent`
--

CREATE TABLE `req_ent` (
  `ID_PROGRAMA` int(11) NOT NULL,
  `REQUISITOS_ENTRADA` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `ID_PROGRAMA` int(11) NOT NULL,
  `N_SESION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller_libre`
--

CREATE TABLE `taller_libre` (
  `ID_EPRO` int(11) NOT NULL,
  `ID_TALLER` int(11) NOT NULL,
  `ID_ENCUESTA` int(11) NOT NULL,
  `ID_PRO` int(11) NOT NULL,
  `ID_ESTUDIANTE` int(11) NOT NULL,
  `INSCRITOS` int(11) NOT NULL,
  `ESTADO` int(11) NOT NULL,
  `MOTIVO` int(11) NOT NULL,
  `PROFESOR` varchar(45) NOT NULL,
  `NAME` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `NAME` varchar(45) NOT NULL,
  `CONTRASEÑA` varchar(45) NOT NULL,
  `PRIVILEGIO` int(11) NOT NULL,
  `ID_ESTUDIANTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `privilegio` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla con usuarios';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_estudiante`, `privilegio`, `nombre`, `password`) VALUES
(121212121, 121212121, 0, 'g', '121212121');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `competencias_esp`
--
ALTER TABLE `competencias_esp`
  ADD PRIMARY KEY (`ID_PROGRAMA`,`COMPETENCIAS_ESPECIFICAS`);

--
-- Indices de la tabla `competencias_trans`
--
ALTER TABLE `competencias_trans`
  ADD PRIMARY KEY (`ID_PROGRAMA`,`OBJETIVOS`);

--
-- Indices de la tabla `convalidacion`
--
ALTER TABLE `convalidacion`
  ADD PRIMARY KEY (`ID_CONVALIDACION`,`ID_PAGO`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`ID_EMPRESA`,`ID_PRO`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`ID_ENCUESTA`,`SEMESTRE`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`ID_ESTUDIANTE`);

--
-- Indices de la tabla `estudiantes_cursan`
--
ALTER TABLE `estudiantes_cursan`
  ADD PRIMARY KEY (`ID_TALLER`,`ID_ESTUDIANTE`);

--
-- Indices de la tabla `estudiantes_proponentes`
--
ALTER TABLE `estudiantes_proponentes`
  ADD PRIMARY KEY (`ID_EPRO`,`ID_PRO`);

--
-- Indices de la tabla `exalumnos`
--
ALTER TABLE `exalumnos`
  ADD PRIMARY KEY (`ID_EXALUMNO`,`ID_PRO`);

--
-- Indices de la tabla `horas_semanales`
--
ALTER TABLE `horas_semanales`
  ADD PRIMARY KEY (`CREDITOS`);

--
-- Indices de la tabla `info_sesion`
--
ALTER TABLE `info_sesion`
  ADD PRIMARY KEY (`N_SESION`);

--
-- Indices de la tabla `metodologia`
--
ALTER TABLE `metodologia`
  ADD PRIMARY KEY (`METODOLOGIA`,`ID_PROGRAMA`);

--
-- Indices de la tabla `monetario`
--
ALTER TABLE `monetario`
  ADD PRIMARY KEY (`ID_MONETARIO`,`ID_PAGO`);

--
-- Indices de la tabla `objetivos`
--
ALTER TABLE `objetivos`
  ADD PRIMARY KEY (`ID_PROGRAMA`,`OBJETIVO`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`ID_PAGO`,`ID_EPRO`);

--
-- Indices de la tabla `prereq`
--
ALTER TABLE `prereq`
  ADD PRIMARY KEY (`ID_PROGRAMA`,`PREREQUISITOS`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`ID_PROFESOR`,`ID_PRO`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`ID_PROGRAMA`,`ID_PRO`),
  ADD KEY `PROGRAMA_FK` (`CREDITOS`);

--
-- Indices de la tabla `proponente`
--
ALTER TABLE `proponente`
  ADD PRIMARY KEY (`ID_PRO`);

--
-- Indices de la tabla `req_ent`
--
ALTER TABLE `req_ent`
  ADD PRIMARY KEY (`REQUISITOS_ENTRADA`,`ID_PROGRAMA`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`ID_PROGRAMA`,`N_SESION`);

--
-- Indices de la tabla `taller_libre`
--
ALTER TABLE `taller_libre`
  ADD PRIMARY KEY (`ID_TALLER`),
  ADD KEY `TALLER_LIBRE_FK` (`ID_EPRO`,`ID_PRO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`,`ID_ESTUDIANTE`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`,`id_estudiante`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
  ADD CONSTRAINT `PROGRAMA_FK` FOREIGN KEY (`CREDITOS`) REFERENCES `horas_semanales` (`CREDITOS`) ON DELETE CASCADE;

--
-- Filtros para la tabla `taller_libre`
--
ALTER TABLE `taller_libre`
  ADD CONSTRAINT `TALLER_LIBRE_FK` FOREIGN KEY (`ID_EPRO`,`ID_PRO`) REFERENCES `estudiantes_proponentes` (`ID_EPRO`, `ID_PRO`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
