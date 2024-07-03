-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2024 a las 10:29:12
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `votaciones_2024`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_votaciones`
--

CREATE TABLE `codigos_votaciones` (
  `id_codigo` int(11) NOT NULL,
  `medicina` int(11) NOT NULL,
  `mecanica` int(11) NOT NULL,
  `electricidad` int(11) NOT NULL,
  `informatica` int(11) NOT NULL,
  `gastronomia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `codigos_votaciones`
--

INSERT INTO `codigos_votaciones` (`id_codigo`, `medicina`, `mecanica`, `electricidad`, `informatica`, `gastronomia`) VALUES
(4721, 0, 0, 0, 0, 0),
(7629, 0, 0, 0, 0, 0),
(1493, 0, 0, 0, 0, 0),
(2316, 0, 0, 0, 3, 0),
(4416, 0, 0, 0, 0, 0),
(2866, 0, 0, 0, 0, 0),
(3818, 0, 0, 0, 0, 0),
(2733, 0, 0, 0, 0, 0),
(5552, 0, 0, 0, 0, 0),
(5460, 0, 0, 0, 0, 0),
(7543, 0, 0, 0, 0, 0),
(6574, 0, 0, 0, 0, 0),
(7022, 0, 0, 0, 0, 0),
(3379, 0, 0, 0, 0, 0),
(8860, 0, 0, 0, 0, 0),
(1563, 0, 0, 0, 0, 0),
(7964, 0, 0, 0, 0, 0),
(8525, 0, 0, 0, 0, 0),
(7084, 0, 0, 0, 0, 0),
(7494, 0, 0, 0, 0, 0),
(8117, 0, 0, 0, 0, 0),
(5399, 0, 0, 0, 0, 0),
(6559, 0, 0, 0, 0, 0),
(6560, 0, 0, 0, 0, 0),
(7315, 0, 0, 0, 0, 0),
(4379, 0, 0, 0, 0, 0),
(1037, 0, 0, 0, 0, 0),
(2362, 0, 0, 0, 0, 0),
(2232, 0, 0, 0, 0, 0),
(4102, 0, 0, 0, 0, 0),
(7523, 0, 0, 0, 0, 0),
(6798, 0, 0, 0, 0, 0),
(3765, 0, 0, 0, 0, 0),
(2209, 0, 0, 0, 0, 0),
(6956, 0, 0, 0, 0, 0),
(3671, 0, 0, 0, 0, 0),
(4959, 0, 0, 0, 0, 0),
(8598, 0, 0, 0, 0, 0),
(3912, 0, 0, 0, 0, 0),
(5000, 0, 0, 0, 0, 0),
(4292, 0, 0, 0, 0, 0),
(8394, 0, 0, 0, 0, 0),
(5029, 0, 0, 0, 0, 0),
(8447, 0, 0, 0, 0, 0),
(4375, 0, 0, 0, 0, 0),
(3050, 0, 0, 0, 0, 0),
(4235, 0, 0, 0, 0, 0),
(3544, 0, 0, 0, 0, 0),
(6133, 0, 0, 0, 0, 0),
(8915, 0, 0, 0, 0, 0),
(7194, 0, 0, 0, 0, 0),
(1767, 0, 0, 0, 0, 0),
(7793, 0, 0, 0, 0, 0),
(6622, 0, 0, 0, 0, 0),
(4161, 0, 0, 0, 0, 0),
(1377, 0, 0, 0, 0, 0),
(4839, 0, 0, 0, 0, 0),
(1747, 0, 0, 0, 0, 0),
(1783, 0, 0, 0, 0, 0),
(1300, 0, 0, 0, 0, 0),
(8158, 0, 0, 0, 0, 0),
(8347, 0, 0, 0, 0, 0),
(7312, 0, 0, 0, 0, 0),
(6664, 0, 0, 0, 0, 0),
(2004, 0, 0, 0, 0, 0),
(4069, 0, 0, 0, 0, 0),
(2126, 0, 0, 0, 0, 0),
(1496, 0, 0, 0, 0, 0),
(4657, 0, 0, 0, 0, 0),
(3114, 0, 0, 0, 0, 0),
(6060, 0, 0, 0, 0, 0),
(1350, 0, 0, 0, 0, 0),
(3564, 0, 0, 0, 0, 0),
(1458, 0, 0, 0, 0, 0),
(6801, 0, 0, 0, 0, 0),
(2207, 0, 0, 0, 0, 0),
(5946, 0, 0, 0, 0, 0),
(2879, 0, 0, 0, 0, 0),
(1489, 0, 0, 0, 0, 0),
(8062, 0, 0, 0, 0, 0),
(2030, 0, 0, 0, 0, 0),
(3053, 0, 0, 0, 0, 0),
(1852, 0, 0, 0, 0, 0),
(3926, 0, 0, 0, 0, 0),
(5940, 0, 0, 0, 0, 0),
(8940, 0, 0, 0, 0, 0),
(8146, 0, 0, 0, 0, 0),
(4920, 0, 0, 0, 0, 0),
(4524, 0, 0, 0, 0, 0),
(7941, 0, 0, 0, 0, 0),
(8281, 0, 0, 0, 0, 0),
(4429, 0, 0, 0, 0, 0),
(3240, 0, 0, 0, 0, 0),
(1783, 0, 0, 0, 0, 0),
(2211, 0, 0, 0, 0, 0),
(5518, 0, 0, 0, 0, 0),
(4360, 0, 0, 0, 0, 0),
(2782, 0, 0, 0, 0, 0),
(1195, 0, 0, 0, 0, 0),
(4145, 0, 0, 0, 0, 0),
(5922, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id_usuarios` int(11) NOT NULL,
  `carrera` varchar(250) NOT NULL,
  `contraseña` varchar(250) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_usuarios`, `carrera`, `contraseña`, `estado`) VALUES
(1, 'informatica', '12345', 1),
(2, 'mecanica', '321', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
