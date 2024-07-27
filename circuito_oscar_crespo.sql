-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2024 a las 03:08:59
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `circuito_oscar_crespo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `numero_vueltas` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `nombre`, `numero_vueltas`, `fecha`) VALUES
(1, 'Carrera', 36, '2024-07-26'),
(2, 'Carrera', 4, '2024-07-26'),
(3, 'Carrera', 17, '2024-07-26'),
(4, 'Carrera', 17, '2024-07-26'),
(5, 'Carrera', 63, '2024-07-26'),
(6, 'Carrera', 82, '2024-07-26'),
(7, 'Carrera', 82, '2024-07-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coche`
--

CREATE TABLE `coche` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `nombre_piloto` varchar(100) NOT NULL,
  `nombre_copiloto` varchar(100) DEFAULT NULL,
  `detalles_coche` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `coche`
--

INSERT INTO `coche` (`id`, `numero`, `nombre_piloto`, `nombre_copiloto`, `detalles_coche`) VALUES
(2, 2, 'Osvaldo Ruiz', 'Pedro Ramirez', 'Chevrolet Rojo '),
(3, 21, 'Raul', 'David', 'Nissan color azul'),
(5, 86, 'Perferendis amet an', 'Laboris in dolor deb', 'Alias excepturi aut '),
(8, 92, 'Quia adipisicing eu ', 'Et a quia omnis simi', 'Qui alias adipisicin'),
(9, 92, 'Quia adipisicing eu ', 'Et a quia omnis simi', 'Qui alias adipisicin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelta`
--

CREATE TABLE `vuelta` (
  `id` int(11) NOT NULL,
  `coche_id` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `numero_vuelta` int(11) NOT NULL,
  `hora_salida` time NOT NULL,
  `hora_llegada` time NOT NULL,
  `tiempo_vuelta` time NOT NULL,
  `velocidad` float DEFAULT NULL,
  `tiempo_acumulado` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vuelta`
--

INSERT INTO `vuelta` (`id`, `coche_id`, `carrera_id`, `numero_vuelta`, `hora_salida`, `hora_llegada`, `tiempo_vuelta`, `velocidad`, `tiempo_acumulado`) VALUES
(2, 2, 2, 1, '17:54:00', '00:00:00', '00:00:00', NULL, NULL),
(3, 3, 3, 1, '13:21:00', '00:00:00', '00:00:00', NULL, NULL),
(5, 5, 5, 1, '09:49:00', '00:00:00', '00:00:00', NULL, NULL),
(6, 8, 6, 1, '09:11:00', '00:00:00', '00:00:00', NULL, NULL),
(7, 9, 7, 1, '09:11:00', '00:00:00', '00:00:00', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coche`
--
ALTER TABLE `coche`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vuelta`
--
ALTER TABLE `vuelta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coche_id` (`coche_id`),
  ADD KEY `carrera_id` (`carrera_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `coche`
--
ALTER TABLE `coche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `vuelta`
--
ALTER TABLE `vuelta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vuelta`
--
ALTER TABLE `vuelta`
  ADD CONSTRAINT `vuelta_ibfk_1` FOREIGN KEY (`coche_id`) REFERENCES `coche` (`id`),
  ADD CONSTRAINT `vuelta_ibfk_2` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
