-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2018 a las 21:47:31
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bodegaproyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(75) NOT NULL,
  `estado` int(11) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `fechaModificacion` date NOT NULL,
  `fechaEliminacion` date NOT NULL,
  `fecha_modificacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `estado`, `fechaRegistro`, `fechaModificacion`, `fechaEliminacion`, `fecha_modificacion`) VALUES
(14, 'soldadura', 1, '2018-05-29', '0000-00-00', '0000-00-00', NULL),
(15, 'Mecanica Industrial', 1, '2018-05-30', '0000-00-00', '0000-00-00', NULL),
(16, 'Construccion', 1, '2018-05-30', '0000-00-00', '0000-00-00', '0000-00-00'),
(17, 'Jardineria', 1, '2018-05-30', '0000-00-00', '0000-00-00', NULL),
(18, 'Equipo Pesado', 1, '2018-05-30', '0000-00-00', '0000-00-00', NULL),
(19, 'Electricidad', 1, '2018-05-30', '0000-00-00', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramienta`
--

CREATE TABLE `herramienta` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `codigo` varchar(40) DEFAULT NULL,
  `marca` varchar(70) DEFAULT NULL,
  `idCategoria` int(10) UNSIGNED NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `creacion` date NOT NULL,
  `modificacion` date NOT NULL,
  `eliminacion` date NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `herramienta`
--

INSERT INTO `herramienta` (`id`, `nombre`, `codigo`, `marca`, `idCategoria`, `estado`, `creacion`, `modificacion`, `eliminacion`, `cantidad`) VALUES
(52, 'Concretera', '1', 'Honda', 16, '1', '2018-05-30', '0000-00-00', '0000-00-00', 1),
(53, 'Cortadora de Pavimento', '2', 'Honda', 16, '1', '2018-05-30', '0000-00-00', '0000-00-00', 3),
(54, 'Maquina de corte', '3', 'KOIKE', 14, '1', '2018-05-30', '0000-00-00', '0000-00-00', 2),
(55, 'Calibrador Vernier', '6', 'MITUTOYO', 15, '1', '2018-05-30', '0000-00-00', '0000-00-00', 10),
(56, 'Producto 1', '154', 'Kawasaki', 14, '1', '2018-05-30', '0000-00-00', '2018-05-30', 9),
(57, 'Producto 2', '458', 'Cat', 16, '1', '2018-05-30', '0000-00-00', '2018-05-30', 7),
(58, 'Producto 3', '1544', 'Stanley', 18, '1', '2018-05-30', '0000-00-00', '2018-05-30', 9),
(59, 'Pulidora', '849', 'Black &decker', 14, '1', '2018-05-30', '0000-00-00', '2018-05-30', 7),
(60, 'Alicate', '8445', 'Stanley', 19, '1', '2018-05-30', '0000-00-00', '2018-05-30', 8),
(61, 'Taladro', '15', 'Honda', 16, '1', '2018-05-30', '0000-00-00', '2018-05-30', 7),
(62, 'Podadora', '548', 'Kariwe', 17, '1', '2018-05-30', '0000-00-00', '2018-05-30', 5),
(63, 'Tractor', '5454', 'Caterpillar', 18, '1', '2018-05-30', '0000-00-00', '2018-05-30', 8),
(64, 'Moto niveladora', '545', 'Caterpillar', 18, '1', '2018-05-30', '0000-00-00', '2018-05-30', 4),
(65, 'Pulidora', '5454', 'Black & Decker', 16, '1', '2018-05-30', '0000-00-00', '2018-05-30', 10),
(66, 'Regla T', '5454', 'Gerau', 15, '1', '2018-05-30', '0000-00-00', '2018-05-30', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientaasignada`
--

CREATE TABLE `herramientaasignada` (
  `id` int(11) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `idPersonal` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `herramientaasignada`
--

INSERT INTO `herramientaasignada` (`id`, `fecha`, `idPersonal`) VALUES
(7, '2018-05-30', 1),
(8, '2018-05-31', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientaasignada_detalle`
--

CREATE TABLE `herramientaasignada_detalle` (
  `id` int(11) NOT NULL,
  `idHerramientaAsignada` int(11) NOT NULL,
  `idHerramienta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estadoPrestamo` varchar(15) NOT NULL,
  `estado` int(11) NOT NULL,
  `prestamo` date NOT NULL,
  `devolucion` date NOT NULL,
  `eliminacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `herramientaasignada_detalle`
--

INSERT INTO `herramientaasignada_detalle` (`id`, `idHerramientaAsignada`, `idHerramienta`, `cantidad`, `estadoPrestamo`, `estado`, `prestamo`, `devolucion`, `eliminacion`) VALUES
(1, 1, 39, 10, 'Prestado', 1, '0000-00-00', '0000-00-00', '0000-00-00'),
(7, 7, 52, 1, 'Prestado', 1, '2018-05-24', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `apellido` varchar(90) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  `direccion` varchar(8) NOT NULL,
  `telefono` varchar(120) NOT NULL,
  `nacimiento` date DEFAULT NULL,
  `eliminacion` date NOT NULL,
  `modificacion` date NOT NULL,
  `ingreso` date NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `fecha_registro` date NOT NULL,
  `genero` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `codigo`, `nombre`, `apellido`, `email`, `direccion`, `telefono`, `nacimiento`, `eliminacion`, `modificacion`, `ingreso`, `estado`, `fecha_registro`, `genero`) VALUES
(1, 1, 'Fernando', 'Santillana', 'fernando@gmail.com', 'San Salv', '1111-1111', '1997-01-12', '0000-00-00', '2018-05-30', '2018-06-28', '1', '2018-05-30', 'Masculino'),
(2, 2, 'Bryan ', 'Rogel', 'bryan@gmail.com', 'Santa An', '1111-1111', '1998-01-28', '0000-00-00', '0000-00-00', '2018-05-31', '1', '2018-05-30', 'Masculino'),
(3, 3, 'Jonathan', 'Rivas', 'jonathan.rivas17@itca.edu.sv', 'Sonsonat', '2222-2222', '1996-12-31', '0000-00-00', '0000-00-00', '2018-06-14', '1', '2018-05-30', 'Masculino'),
(4, 4, 'Alex', 'Rivas', 'fertheblack@gmail.com', 'Sonsonat', '1234-5678', '2000-02-02', '0000-00-00', '0000-00-00', '2018-04-30', '1', '2018-05-30', 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idPersonal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`id`, `fecha`, `idPersonal`) VALUES
(1, '0000-00-00', 5),
(2, '2018-05-26', 5),
(3, '2018-05-26', 4),
(4, '2018-05-27', 6),
(5, '2018-05-27', 3),
(6, '2018-05-28', 4),
(7, '2018-05-30', 1),
(8, '2018-05-30', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo_detalle`
--

CREATE TABLE `prestamo_detalle` (
  `id` int(11) NOT NULL,
  `idPrestamo` int(11) NOT NULL,
  `idHerramienta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estadoPrestamo` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL,
  `devolucion` date NOT NULL,
  `eliminacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prestamo_detalle`
--

INSERT INTO `prestamo_detalle` (`id`, `idPrestamo`, `idHerramienta`, `cantidad`, `estadoPrestamo`, `estado`, `devolucion`, `eliminacion`) VALUES
(9, 3, 4, 2, 'Devuelto', 1, '0000-00-00', '0000-00-00'),
(10, 7, 62, 2, 'Devuelto', 1, '2018-05-30', '0000-00-00'),
(11, 8, 54, 2, 'Prestado', 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`, `estado`) VALUES
(1, 'ADMIN', 1),
(2, 'USUARIO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `rol_id` int(11) NOT NULL,
  `creacion` datetime DEFAULT NULL,
  `modificacion` date NOT NULL,
  `eliminacion` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`, `rol_id`, `creacion`, `modificacion`, `eliminacion`, `estado`) VALUES
(1, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, '2018-05-28 00:00:00', '0000-00-00', '0000-00-00', 1),
(2, 'user', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, '2018-05-29 00:00:00', '2018-05-29', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v1_persona`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v1_persona` (
`idPrestamo` int(11)
,`codigo` int(11)
,`nombrePersonal` varchar(90)
,`apellido` varchar(90)
,`fecha` date
,`devolucion` date
,`cantidad` int(11)
,`nombreHerramienta` varchar(90)
,`estadoPrestamo` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v4_persona`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v4_persona` (
`idPrestamo` int(11)
,`idPersona` int(10) unsigned
,`codigo` int(11)
,`fecha` date
,`cantidad` int(11)
,`idHerramienta` int(10) unsigned
,`nombre` varchar(90)
,`estadoPrestamo` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v15_persona`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v15_persona` (
`idPrestamo` int(11)
,`idPersona` int(11)
,`codigo` int(11)
,`prestamo` date
,`devolucion` date
,`cantidad` int(11)
,`idHerramienta` int(10) unsigned
,`nombre` varchar(90)
,`estadoPrestamo` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v1_persona`
--
DROP TABLE IF EXISTS `v1_persona`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v1_persona`  AS  (select `pre`.`id` AS `idPrestamo`,`per`.`codigo` AS `codigo`,`per`.`nombre` AS `nombrePersonal`,`per`.`apellido` AS `apellido`,`p`.`fecha` AS `fecha`,`pre`.`devolucion` AS `devolucion`,`pre`.`cantidad` AS `cantidad`,`h`.`nombre` AS `nombreHerramienta`,`pre`.`estadoPrestamo` AS `estadoPrestamo` from (((`prestamo` `p` join `personal` `per`) join `prestamo_detalle` `pre`) join `herramienta` `h`) where ((`pre`.`idPrestamo` = `p`.`id`) and (`h`.`id` = `pre`.`idHerramienta`) and (`p`.`idPersonal` = `per`.`id`) and (`pre`.`estado` = 1) and (`pre`.`estadoPrestamo` = 'Devuelto'))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v4_persona`
--
DROP TABLE IF EXISTS `v4_persona`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v4_persona`  AS  (select `pre`.`id` AS `idPrestamo`,`per`.`id` AS `idPersona`,`per`.`codigo` AS `codigo`,`p`.`fecha` AS `fecha`,`pre`.`cantidad` AS `cantidad`,`h`.`id` AS `idHerramienta`,`h`.`nombre` AS `nombre`,`pre`.`estadoPrestamo` AS `estadoPrestamo` from (((`prestamo` `p` join `personal` `per`) join `prestamo_detalle` `pre`) join `herramienta` `h`) where ((`pre`.`idPrestamo` = `p`.`id`) and (`h`.`id` = `pre`.`idHerramienta`) and (`p`.`idPersonal` = `per`.`id`) and (`pre`.`estado` = 1) and (`pre`.`estadoPrestamo` = 'Prestado'))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v15_persona`
--
DROP TABLE IF EXISTS `v15_persona`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v15_persona`  AS  (select `det`.`id` AS `idPrestamo`,`det`.`id` AS `idPersona`,`per`.`codigo` AS `codigo`,`det`.`prestamo` AS `prestamo`,`det`.`devolucion` AS `devolucion`,`det`.`cantidad` AS `cantidad`,`h`.`id` AS `idHerramienta`,`h`.`nombre` AS `nombre`,`det`.`estadoPrestamo` AS `estadoPrestamo` from (((`herramientaasignada` `hs` join `personal` `per`) join `herramientaasignada_detalle` `det`) join `herramienta` `h`) where ((`det`.`idHerramientaAsignada` = `hs`.`id`) and (`h`.`id` = `det`.`idHerramienta`) and (`hs`.`idPersonal` = `per`.`id`) and (`det`.`estado` = 1))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `herramienta`
--
ALTER TABLE `herramienta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_herramienta_categoria` (`idCategoria`);

--
-- Indices de la tabla `herramientaasignada`
--
ALTER TABLE `herramientaasignada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_herramientaAsignada_personal` (`idPersonal`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `herramientaasignada_detalle`
--
ALTER TABLE `herramientaasignada_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idHerramientaAsignada` (`idHerramientaAsignada`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prestamo_detalle`
--
ALTER TABLE `prestamo_detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_rol_idx` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `herramienta`
--
ALTER TABLE `herramienta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `herramientaasignada`
--
ALTER TABLE `herramientaasignada`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `herramientaasignada_detalle`
--
ALTER TABLE `herramientaasignada_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `prestamo_detalle`
--
ALTER TABLE `prestamo_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `herramienta`
--
ALTER TABLE `herramienta`
  ADD CONSTRAINT `fk_herramienta_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `herramientaasignada`
--
ALTER TABLE `herramientaasignada`
  ADD CONSTRAINT `fk_personal_asignada` FOREIGN KEY (`idPersonal`) REFERENCES `personal` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
