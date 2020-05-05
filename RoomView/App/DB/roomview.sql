-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2020 a las 13:26:18
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `roomview`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `EMP_NO` int(4) NOT NULL,
  `NOMBRE` varchar(25) DEFAULT NULL,
  `APELLIDO` varchar(14) DEFAULT NULL,
  `CLAVE` varchar(25) DEFAULT NULL,
  `DPTO` varchar(25) DEFAULT NULL,
  `TIPO_EMP` varchar(25) DEFAULT NULL,
  `EMAIL` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`EMP_NO`, `NOMBRE`, `APELLIDO`, `CLAVE`, `DPTO`, `TIPO_EMP`, `EMAIL`) VALUES
(1000, 'ADMIN', 'ADMIN', '1000AdminA', 'ADMINISTRADOR', 'ADMIN', 'admin@gmail.com'),
(1001, 'LUIS', 'GARCIA', '1001LuisG', 'MARKETING', 'JEFE', 'luisgarcia@gmail.com'),
(1002, 'OLGA', 'PEREZ', '1002OlgaP', 'INFORMATICA', 'EMPLEADO', 'olgaperez@hotmail.com'),
(1003, 'CESAR', 'LOPEZ', '1003CesarL', 'RRHH', 'JEFE', 'cesarlopez@gmail.com'),
(1004, 'JULIAN', 'MONTES', '1004JulianM', 'ADMINISTRACION', 'EMPLEADO', 'julianmontes@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `RESERVA_NO` int(4) NOT NULL,
  `SALA_NO` int(4) DEFAULT NULL,
  `EMP_NO` int(4) DEFAULT NULL,
  `DIA` int(4) DEFAULT NULL,
  `HORA` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `SALA_NO` int(4) NOT NULL,
  `TIPO` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`SALA_NO`, `TIPO`) VALUES
(1, 'VIDEOCONFERENCIA'),
(2, 'ESTANDAR'),
(3, 'ESTANDAR'),
(4, 'VIDEOCONFERENCIA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`EMP_NO`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`RESERVA_NO`),
  ADD KEY `FK_SALA_NO` (`SALA_NO`),
  ADD KEY `FK_EMP_NO` (`EMP_NO`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`SALA_NO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
