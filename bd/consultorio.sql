-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-07-2022 a las 01:08:45
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `detalle` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_usuarios_fk` int(11) NOT NULL,
  `id_profesional_fk` int(11) NOT NULL,
  `puntaje` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `detalle`, `id_usuarios_fk`, `id_profesional_fk`, `puntaje`) VALUES
(1, 'Muy bueno.', 9, 8, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_espec` int(11) NOT NULL,
  `nombre_espec` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_espec`, `nombre_espec`) VALUES
(8, 'Pediatra'),
(9, 'Reumatologo'),
(10, 'clinico'),
(11, 'urologo'),
(12, 'obstetra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id`, `tipo`) VALUES
(1, 'admin'),
(2, 'ejecutivo'),
(3, 'operador'),
(4, 'registrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionales`
--

CREATE TABLE `profesionales` (
  `id_prof` int(11) NOT NULL,
  `nombre_prof` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dias_atencion` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_especialidad` int(11) NOT NULL,
  `imagen` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `profesionales`
--

INSERT INTO `profesionales` (`id_prof`, `nombre_prof`, `telefono`, `dias_atencion`, `id_especialidad`, `imagen`) VALUES
(5, 'paula', '22626549940', 'domingos', 9, 'https://image.shutterstock.com/image-photo/smiling-nurse-white-uniform-stethoscope-260nw-1724094595.jpg'),
(6, 'Elba', '2262539993', 'sabados por la noche', 12, NULL),
(7, 'Daniela', '22624355444', 'todos los putos dias', 8, NULL),
(8, 'Panchi', '2252359099', 'no ha atendido aun', 11, 'https://www.freepik.es/fotos-vectores-gratis/doctor'),
(10, 'Julio', '3322342343', 'lunes', 10, NULL),
(12, 'ale', '32343324', 'martes', 9, NULL),
(20, 'juan', '02262539999', 'jueves', 8, NULL),
(23, 'Mari', '32343324', 'jueves', 8, NULL),
(24, 'Mari', '32343324', 'jueves', 8, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password_usuario` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_permiso_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password_usuario`, `email`, `id_permiso_fk`) VALUES
(9, 'Paula', '$2y$10$M.DgFGt2pR6TFS6Srl7IQOvylnm9rO1/Zp3FK.P/DZT0gAV3UqMi2', 'pfiscina@hotmail.com', 1),
(10, 'Mile', '$2y$10$S1Qiiwg9zRxu8LC4bPzp.O0ITVouDWQDQ3gMqjalN1JvWMBCQZ3bm', 'milejus@hotmail.com', 2),
(12, 'Fran', '$2y$10$C/tByULK4ZwiaopUOHWOvOXw2GgCJCPQTlWmZvFV69aljaPBihBSa', 'fran@hotmail.com', 1),
(13, 'Denise', '$2y$10$LJFXxYCdnnLJ7iSNuuYC7ujaAmaSbgs/R0wPoj99N8B6FGSyQROva', 'den@hotmail.com', 2),
(14, 'Juan', '$2y$10$1jLNMf228ZS57ayCRVFd2.kVN4YKA2mu6wsvs68TzlyVp1pAYv5Su', 'pfiscina@hotmail.com', 1),
(15, 'Cutu', '$2y$10$AZlG6/eXKkGldBIOeS01SuiOBZk5N4NYAFWxweBQ3cVeM/hsIKhXC', 'cutu@hotmail.com', 4),
(16, 'elba', '$2y$10$Iwxb5vMCdpoOJkMx/KO3KePlfzwpbAyGCUzZnyEF2/Dknr8Pgjf1S', 'elba@hotmail.com', 2),
(17, 'Julio', '$2y$10$b2CDvCOq9T.Vr8hCikWkduQHyRv4vlsLK2kAsldVURupLC4RzL/sC', 'julio@hotmail.com', 3),
(19, 'dani', '$2y$10$Pgy6qNoftvD9A0jHgEn3VuiVOMPX6nT129j3lHhusahIwkdpZSmHK', 'dani@hotmail.com', 2),
(20, 'carmen', '$2y$10$0KYlBWibeNZe8eKgjaCIh.Jg2zl.8gL.N1nFgyU8H8uwYRlwCCpWW', 'dani@hotmail.com', 4),
(22, 'marta', '$2y$10$H3sMi/8KPLTncidwea9zruLkrh5soy83cDyAR3TBhx8E7WAlGrMGq', 'marta', 4),
(26, 'pancho', '$2y$10$6CtYwsmD4hqYKFXImmvqu.UJPm2EgzfZ.YrVgGMkF537xZlI4bWV2', 'pancchi@hotmail.com', 1),
(27, 'ana', '$2y$10$MxBF1ycEfhP1xBM1mjcyc.ah14z/.XTW4nOQxaF.MW94daOKY/k1m', 'pfiscina@hotmail.com', 2),
(28, 'alfredo', '$2y$10$vaaVGCTaRnG/KWFQF9sfgOdeue2nsBlAlVsdj7j4ZyAfeK8RIvOBm', 'alequequen37@hotmail.com', 3),
(29, 'oscar', '$2y$10$zRw2TbQx5JoREzKbpIBXCunuiv2eqTui/7v9vzZMGxrgwyau3qZRK', 'pddfjkjfkjlsdj', 3),
(30, 'anita', '$2y$10$CYq236szOKOJdDUSeQGpB.6UGzBFelEIcbxf5Z.Z1vXzZxuVeBN.6', 'fddfs', 4),
(31, 'fabian', '$2y$10$zSCzlSN.VImHg2HbvFyogutRdjVyJ5DJXZfnFHM10ymnmfenQ3crW', 'dffadfad', 2),
(33, 'Ana Paula', '$2y$10$ll0XwY4RXu7k2d3YtEwyru/HF5seNhWeGcPr8/fWMnrhOn6lOiYgO', 'pfiscina@hotmail.com', 4),
(34, 'Juan Francisco', '$2y$10$xH4j2VvgKCVPztVz0kPLJuUhK5E/0nsJJJm16wvsDSv.9bpT1S3RK', 'sdfdvdfv', 3),
(37, 'Matias', '$2y$10$detto5BWydgTIrroJ1E/4uTgJ2rJcv9C9A7nQLuv6RzS.O/x6Xvue', 'pfiscina@hotmail.com', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_profesional_fk` (`id_profesional_fk`),
  ADD KEY `id_usuarios_fk` (`id_usuarios_fk`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_espec`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  ADD PRIMARY KEY (`id_prof`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_permiso_fk` (`id_permiso_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_espec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_profesional_fk`) REFERENCES `profesionales` (`id_prof`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_usuarios_fk`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `profesionales`
--
ALTER TABLE `profesionales`
  ADD CONSTRAINT `profesionales_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_espec`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_permiso_fk`) REFERENCES `permiso` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
