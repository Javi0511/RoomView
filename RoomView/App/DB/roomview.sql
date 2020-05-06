-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-05-2020 a las 12:15:38
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

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
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `color` varchar(255) NOT NULL,
  `textcolor` varchar(255) NOT NULL DEFAULT 'white',
  `start` text NOT NULL,
  `sala_no` int(11) NOT NULL,
  `emp_no` int(11) NOT NULL,
  `hora` text NOT NULL,
  `dia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id`, `title`, `descripcion`, `color`, `textcolor`, `start`, `sala_no`, `emp_no`, `hora`, `dia`) VALUES
(1, 'Evento 1', 'celebrando', '#FFFF0F', '#00000', '2020-04-25 12:30', 1, 1001, '12:30', '2020-04-25'),
(2, 'evento 2', 'hola ', 'blue', 'white', '2020-04-26 12:30', 3, 1001, '12:30', '2020-04-26 '),
(3, 'pepe', 'prueba', 'red', 'white', '2020-05-01 10:30', 4, 1001, '10:30', '2020-05-01 '),
(9, 'dsfds', 'dfdff', '#00dbfe', 'white', '2020-05-15 10:30', 2, 1001, '10:30', '2020-05-15 '),
(20, 'Prueba 2', 'dsaffds', 'blue', 'white', '2020-05-14 10:30', 3, 1001, '10:30', '2020-05-14'),
(22, 'sala 4', '', '#000000', 'white', '2020-05-14 10:30', 4, 1001, '10:30', '2020-05-14'),
(23, 'cambiar', '', '#000000', 'white', '2020-05-08 12:19', 3, 1001, '12:19', '2020-05-08'),
(24, 'cambiar', '', '#0043ff', 'white', '2020-05-07 03:16', 2, 1001, '03:16', '2020-05-07');

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
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`SALA_NO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
