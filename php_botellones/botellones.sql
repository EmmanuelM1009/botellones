-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-10-2023 a las 00:37:05
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id21364599_ejercicios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `botellones`
--

CREATE TABLE `botellones` (
  `id` int(11) NOT NULL,
  `fecha_llenado` date DEFAULT NULL,
  `hora_llenado` time DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `botellones`
--

INSERT INTO `botellones` (`id`, `fecha_llenado`, `hora_llenado`, `cantidad`) VALUES
(1, '2023-10-22', '20:19:57', 15),
(2, '2023-10-22', '20:21:25', 2),
(3, '2023-10-22', '20:22:38', 5),
(4, '2023-10-22', '20:26:26', 3),
(5, '2023-10-22', '20:28:22', 20),
(6, '2023-10-22', '20:33:31', 3),
(7, '2023-10-22', '20:34:52', 7),
(8, '2023-10-22', '20:35:01', 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `botellones`
--
ALTER TABLE `botellones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `botellones`
--
ALTER TABLE `botellones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
