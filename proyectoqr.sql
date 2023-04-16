-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db:3306
-- Tiempo de generación: 13-01-2023 a las 14:54:39
-- Versión del servidor: 5.7.40
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectoqr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` int(9) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, '1dam'),
(2, '2dam'),
(3, '1daw'),
(4, '2daw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schools_years`
--

CREATE TABLE `schools_years` (
  `id` int(9) NOT NULL,
  `school_year` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `schools_years`
--

INSERT INTO `schools_years` (`id`, `school_year`) VALUES
(1, '21-22'),
(2, '22-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slots`
--

CREATE TABLE `slots` (
  `id` int(9) NOT NULL,
  `slot` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `slots`
--

INSERT INTO `slots` (`id`, `slot`) VALUES
(1, 'L8:15-9:15'),
(2, 'L9:15-10:15'),
(3, 'L10:15-11:15'),
(5, 'L10:45-11:45'),
(6, 'L11:45-12:45'),
(7, 'L12:45-13:45'),
(8, 'L13:45-14:45'),
(9, 'L14:45-15:45'),
(10, 'L15:45-16:45'),
(11, 'L16:45-17:45'),
(12, 'L17:45-18:15'),
(13, 'L18:15-19:10'),
(14, 'L19:10-20:05'),
(15, 'L20:05-21:00'),
(23, 'M8:15-9:15'),
(24, 'M9:15-10:15'),
(25, 'M10:15-11:15'),
(26, 'M10:45-11:45'),
(27, 'M11:45-12:45'),
(28, 'M12:45-13:45'),
(29, 'M13:45-14:45'),
(30, 'M14:45-15:45'),
(31, 'M15:45-16:45'),
(32, 'M16:45-17:45'),
(33, 'M17:45-18:15'),
(34, 'M18:15-19:10'),
(35, 'M19:10-20:05'),
(36, 'M20:05-21:00'),
(37, 'X8:15-9:15'),
(38, 'X9:15-10:15'),
(39, 'X10:15-11:15'),
(40, 'X10:45-11:45'),
(41, 'X11:45-12:45'),
(42, 'X12:45-13:45'),
(43, 'X13:45-14:45'),
(44, 'X14:45-15:45'),
(45, 'X15:45-16:45'),
(46, 'X16:45-17:45'),
(47, 'X17:45-18:15'),
(48, 'X18:15-19:10'),
(49, 'X19:10-20:05'),
(50, 'X20:05-21:00'),
(51, 'J8:15-9:15'),
(52, 'J9:15-10:15'),
(53, 'J10:15-11:15'),
(54, 'J10:45-11:45'),
(55, 'J11:45-12:45'),
(56, 'J12:45-13:45'),
(57, 'J13:45-14:45'),
(58, 'J14:45-15:45'),
(59, 'J15:45-16:45'),
(60, 'J16:45-17:45'),
(61, 'J17:45-18:15'),
(62, 'J18:15-19:10'),
(63, 'J19:10-20:05'),
(64, 'J20:05-21:00'),
(65, 'V8:15-9:15'),
(66, 'V9:15-10:15'),
(67, 'V10:15-11:15'),
(68, 'V10:45-11:45'),
(69, 'V11:45-12:45'),
(70, 'V12:45-13:45'),
(71, 'V13:45-14:45'),
(72, 'V14:45-15:45'),
(73, 'V15:45-16:45'),
(74, 'V16:45-17:45'),
(75, 'V17:45-18:15'),
(76, 'V18:15-19:10'),
(77, 'V19:10-20:05'),
(78, 'V20:05-21:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subjects`
--

INSERT INTO `subjects` (`id`, `name`) VALUES
(1, 'Desarrollo de Interfaces'),
(2, 'HLC'),
(3, 'Sistemas de Gestión Empresarial'),
(4, 'Empresa e iniciativa Emprendedora'),
(5, 'Programación de Servicios'),
(6, 'Programación Móvil'),
(7, 'Acceso a Datos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE `teachers` (
  `id` int(9) NOT NULL,
  `cif` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `phone` int(9) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `surname1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `surname2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'inactivo',
  `id_address_teacher` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers_addresses`
--

CREATE TABLE `teachers_addresses` (
  `id` int(9) NOT NULL,
  `address` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `zip` int(5) NOT NULL,
  `province` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `times_slots`
--

CREATE TABLE `times_slots` (
  `id` int(9) NOT NULL,
  `id_slot` int(9) NOT NULL,
  `id_group` int(9) NOT NULL,
  `id_school_year` int(9) NOT NULL,
  `id_subject` int(9) NOT NULL,
  `id_teacher` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `times_slots`
--

INSERT INTO `times_slots` (`id`, `id_slot`, `id_group`, `id_school_year`, `id_subject`, `id_teacher`) VALUES
(1, 9, 1, 2, 1, 1),
(2, 10, 1, 2, 1, 1),
(3, 11, 1, 2, 1, 1),
(4, 13, 1, 2, 2, 1),
(5, 14, 1, 2, 2, 1),
(6, 15, 1, 2, 2, 1),
(7, 30, 1, 2, 1, 1),
(8, 31, 1, 2, 1, 1),
(9, 32, 1, 2, 3, 8),
(10, 34, 1, 2, 4, 8),
(11, 35, 1, 2, 1, 1),
(12, 36, 1, 2, 1, 1),
(19, 44, 1, 2, 5, 5),
(20, 45, 1, 2, 5, 5),
(21, 46, 1, 2, 5, 5),
(22, 48, 1, 2, 4, 8),
(23, 49, 1, 2, 5, 4),
(24, 50, 1, 2, 5, 4),
(25, 58, 1, 2, 7, 6),
(29, 59, 1, 2, 3, 9),
(30, 60, 1, 2, 3, 9),
(31, 62, 1, 2, 3, 9),
(32, 63, 1, 2, 6, 4),
(33, 64, 1, 2, 6, 4),
(34, 72, 1, 2, 7, 6),
(35, 73, 1, 2, 7, 6),
(39, 74, 1, 2, 7, 6),
(41, 76, 1, 2, 7, 6),
(42, 77, 1, 2, 4, 8),
(43, 78, 1, 2, 4, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `cif` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `phone` int(9) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `surname1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `surname2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'inactivo',
  `id_address_user` int(9) DEFAULT NULL,
  `id_group` int(9) DEFAULT NULL,
  `id_user` int(9) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `cif`, `email`, `password`, `phone`, `name`, `surname1`, `surname2`, `role`, `status`, `id_address_user`, `id_group`, `id_user`, `updated_at`, `created_at`) VALUES
(3, '31018613P', 'fjcamposgutierrez@gmail.com', '', 628191877, 'Francisco Javier', 'Campos', 'Gutierrez', NULL, 'inactivo', NULL, NULL, NULL, NULL, NULL),
(4, '34024464N', 'emi@gmail.com', '', 625579292, 'Emilia', 'Gutiérrez', 'Torres', NULL, 'inactivo', NULL, NULL, 3, NULL, NULL),
(6, '31018612p', 'front440@gmail.com', '$2y$10$tUO6ltDCu8qM0zy6GAhFFeRp6pqMBvjuvrfpR4zLfGSHW7bjJDprO', 628191877, 'paco', 'sanchez', 'sanchez', 'student', 'inactivo', NULL, NULL, NULL, '2023-01-08', '2023-01-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_addresses`
--

CREATE TABLE `users_addresses` (
  `id` int(9) NOT NULL,
  `address` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `zip` int(5) NOT NULL,
  `province` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_logs`
--

CREATE TABLE `users_logs` (
  `id` int(9) NOT NULL,
  `date` date NOT NULL,
  `type` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `schools_years`
--
ALTER TABLE `schools_years`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_direccion` (`id_address_teacher`);

--
-- Indices de la tabla `teachers_addresses`
--
ALTER TABLE `teachers_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `times_slots`
--
ALTER TABLE `times_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_grupo` (`id_group`),
  ADD KEY `id_asignatura` (`id_subject`),
  ADD KEY `id_profesor` (`id_teacher`),
  ADD KEY `id_año_escolar` (`id_school_year`),
  ADD KEY `id_tramo` (`id_slot`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cif` (`cif`),
  ADD KEY `id_direccion` (`id_address_user`),
  ADD KEY `id_grupo` (`id_group`),
  ADD KEY `id_alumno` (`id_user`);

--
-- Indices de la tabla `users_addresses`
--
ALTER TABLE `users_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_logs`
--
ALTER TABLE `users_logs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_usuario` (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `schools_years`
--
ALTER TABLE `schools_years`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `slots`
--
ALTER TABLE `slots`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `teachers_addresses`
--
ALTER TABLE `teachers_addresses`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `times_slots`
--
ALTER TABLE `times_slots`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users_addresses`
--
ALTER TABLE `users_addresses`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users_logs`
--
ALTER TABLE `users_logs`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`id_address_teacher`) REFERENCES `teachers_addresses` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `teachers_ibfk_2` FOREIGN KEY (`id`) REFERENCES `times_slots` (`id_teacher`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `times_slots`
--
ALTER TABLE `times_slots`
  ADD CONSTRAINT `times_slots_ibfk_1` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `times_slots_ibfk_2` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `times_slots_ibfk_4` FOREIGN KEY (`id_school_year`) REFERENCES `schools_years` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `times_slots_ibfk_5` FOREIGN KEY (`id_slot`) REFERENCES `slots` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_address_user`) REFERENCES `users_addresses` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `users_logs`
--
ALTER TABLE `users_logs`
  ADD CONSTRAINT `users_logs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
