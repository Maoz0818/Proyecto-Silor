-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2016 a las 01:10:03
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `silor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `nombre_categoria` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificio`
--

CREATE TABLE `edificio` (
  `edificio_id` int(11) NOT NULL,
  `nombre_edificio` varchar(80) NOT NULL,
  `ubicacion` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `equipo_id` int(11) NOT NULL,
  `nombre_equipo` varchar(100) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacio`
--

CREATE TABLE `espacio` (
  `espacio_id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `ubicacion` varchar(80) NOT NULL,
  `edificio_id` int(11) DEFAULT NULL,
  `tipo_espacio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `id` smallint(6) NOT NULL,
  `role_name` varchar(45) NOT NULL,
  `role_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id`, `role_name`, `role_value`) VALUES
(1, 'Usuario', 10),
(2, 'Administrador', 20),
(3, 'SuperUsuario', 30),
(4, 'Estudiante', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` smallint(6) NOT NULL,
  `status_name` varchar(45) NOT NULL,
  `status_value` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `status_name`, `status_value`) VALUES
(1, 'Activo', 10),
(2, 'Pendiente', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_espacio`
--

CREATE TABLE `tipo_espacio` (
  `tipo_espacio_id` int(11) NOT NULL,
  `nombre_tipo` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(255) NOT NULL,
  `cedula` varchar(35) NOT NULL,
  `telefono` varchar(32) DEFAULT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` smallint(6) NOT NULL DEFAULT '10',
  `status_id` smallint(6) NOT NULL DEFAULT '10',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre_completo`, `cedula`, `telefono`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role_id`, `status_id`, `created_at`, `updated_at`) VALUES
(16, 'Hector Mauricio Muñoz Ordoñez', '1081592595', '4747474', 'IuoOnAyR9oA96NL3HCkqtO3ts1Ynvulk', '$2y$13$miZAHJMkQQyjj99.fL9Sn.4eb3aUbKeEWYlh2s8g7ojQ8bbn8kCrS', NULL, 'maoz182009@hotmail.com', 20, 10, '2016-03-27 23:26:24', '2016-04-11 02:25:49'),
(18, 'Cristian Alegria', '321654', '47474774', 'PL896CchJw3QTJXElx8unidCadIqUmX5', '$2y$13$mAqUaWGQ0ylxhIPy.cutdOQV6ElobKNoaaXKkdg1ku9l3KfFdrpeK', '1iJeucGW8Yn7pJWorcPV26x43_LkjVU6_1460047815', 'cristian@algo.com', 30, 10, '2016-03-27 23:55:32', '2016-04-11 02:21:50'),
(24, 'Carlos Arango', '1144140904', '3176791137', 'QS2nf0PUC11NVlDGw1hh8mkQUvy9qmwK', '$2y$13$354jpFIxINkh5nsfBN1idOOwvg6eD5waPzL.dHMqyzCtsvHlEVyXW', NULL, 'carlos.f.arango@correounivalle.edu.co', 20, 10, '2016-04-11 10:14:53', '2016-04-11 10:14:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `edificio`
--
ALTER TABLE `edificio`
  ADD PRIMARY KEY (`edificio_id`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`equipo_id`),
  ADD KEY `fk_equipo_categoria_idx` (`categoria_id`);

--
-- Indices de la tabla `espacio`
--
ALTER TABLE `espacio`
  ADD PRIMARY KEY (`espacio_id`),
  ADD UNIQUE KEY `codigo_espacio_UNIQUE` (`codigo`),
  ADD KEY `fk_espacio_tipo_espacio1_idx` (`tipo_espacio_id`),
  ADD KEY `fk_espacio_edificio1_idx` (`edificio_id`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_espacio`
--
ALTER TABLE `tipo_espacio`
  ADD PRIMARY KEY (`tipo_espacio_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `edificio`
--
ALTER TABLE `edificio`
  MODIFY `edificio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `equipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `espacio`
--
ALTER TABLE `espacio`
  MODIFY `espacio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_espacio`
--
ALTER TABLE `tipo_espacio`
  MODIFY `tipo_espacio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `fk_equipo_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `espacio`
--
ALTER TABLE `espacio`
  ADD CONSTRAINT `fk_espacio_edificio` FOREIGN KEY (`edificio_id`) REFERENCES `edificio` (`edificio_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_espacio_tipo_espacio` FOREIGN KEY (`tipo_espacio_id`) REFERENCES `tipo_espacio` (`tipo_espacio_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
