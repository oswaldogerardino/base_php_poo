-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2022 a las 18:53:51
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base_php_poo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `cedula` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `genero` text NOT NULL,
  `fecha_nac` date DEFAULT NULL,
  `contrasena` text DEFAULT NULL,
  `rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `cedula`, `correo`, `genero`, `fecha_nac`, `contrasena`, `rol`) VALUES
(18, 'oswaldo', 'gerardino', 555, 'oswaldo@oswaldo.com', 'masculino', '2021-03-04', 'e10adc3949ba59abbe56e057f20f883e', ''),
(23, 'dfgdfg', 'dfgdfg', 44444444, 'oswaldo3@oswaldo.com', 'masculino', '2022-06-25', '96e79218965eb72c92a549dd5a330112', 'administrador'),
(26, 'dfgdgdf', 'gdgdfg', 23234, 'oswald3o@oswaldo.com', 'masculino', '2022-06-26', '1a100d2c0dab19c4430e7d73762b3423', ''),
(28, 'a2222222222222', '22222222222', 2147483647, 'osw222222aldo@oswaldo.com', 'masculino', '0000-00-00', '91f5167c34c400758115c2a6826ec2e3', 'administrador'),
(29, 'fdgdf', 'gdfgdfgdg', 43543534, 'osfsdfsdfsdfwaldo@oswaldo.com', 'masculino', '2022-06-26', '1a100d2c0dab19c4430e7d73762b3423', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
