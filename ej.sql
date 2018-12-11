-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-12-2018 a las 23:33:30
-- Versión del servidor: 10.1.26-MariaDB-0+deb9u1
-- Versión de PHP: 7.0.30-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ej`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

CREATE TABLE `autos` (
  `auto_id` int(10) UNSIGNED NOT NULL,
  `make` varchar(128) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `mileage` int(11) DEFAULT NULL,
  `prueba` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`auto_id`, `make`, `year`, `mileage`, `prueba`) VALUES
(1, 'ajdjsajkamp;lt;a', 5, 8, 7),
(2, 'addasda', 4, 8, 10),
(3, 'a', 4, 3, 2),
(4, 'ivan aaaa', 565656, 455, 45454),
(5, 'adsa', 44, 4, 4),
(12, 'ivan aaaa', 565656, 5, 0),
(24, 'Vaalor', 5, 8, 3433),
(45, 'asd', 9, 9, 9),
(48, 'ivan aaaa', 565656, 5, 0),
(70, 'Vaalor', 5, 77, 3433);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enums`
--

CREATE TABLE `enums` (
  `ID` varchar(45) NOT NULL DEFAULT 'a',
  `posibilidades` enum('posibilidad 1','posibilidad 2','posibilidad 3','posibilidad 4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `enums`
--

INSERT INTO `enums` (`ID`, `posibilidades`) VALUES
('1', 'posibilidad 1'),
('2', 'posibilidad 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruedas`
--

CREATE TABLE `ruedas` (
  `clave` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ruedas`
--

INSERT INTO `ruedas` (`clave`) VALUES
(0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla`
--

CREATE TABLE `tabla` (
  `nombre` varchar(45) NOT NULL,
  `asda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indices de la tabla `enums`
--
ALTER TABLE `enums`
  ADD PRIMARY KEY (`ID`(10));

--
-- Indices de la tabla `tabla`
--
ALTER TABLE `tabla`
  ADD PRIMARY KEY (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autos`
--
ALTER TABLE `autos`
  MODIFY `auto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
