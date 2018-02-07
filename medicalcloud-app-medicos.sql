-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2017 a las 18:22:07
-- Versión del servidor: 5.7.11
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `medicalcloud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antfamiliares`
--

CREATE TABLE `antfamiliares` (
  `id` int(255) NOT NULL,
  `cardiopatia` varchar(1) DEFAULT NULL,
  `diabetes` varchar(1) DEFAULT NULL,
  `cancer` varchar(1) DEFAULT NULL,
  `enfcardiovasculares` varchar(1) DEFAULT NULL,
  `hipertension` varchar(1) DEFAULT NULL,
  `enfmentales` varchar(1) DEFAULT NULL,
  `tubercolosis` varchar(1) DEFAULT NULL,
  `enfinfecciosas` varchar(1) DEFAULT NULL,
  `malformacion` varchar(1) DEFAULT NULL,
  `otra` varchar(1) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `paciente` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `antfamiliares`
--

INSERT INTO `antfamiliares` (`id`, `cardiopatia`, `diabetes`, `cancer`, `enfcardiovasculares`, `hipertension`, `enfmentales`, `tubercolosis`, `enfinfecciosas`, `malformacion`, `otra`, `descripcion`, `paciente`) VALUES
(1, '2', '2', '2', '2', '2', '2', '2', '2', '2', '1', 'No posee antecedentes familiares', 1),
(2, '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '', 4),
(3, '2', '2', '2', '2', '2', '2', '2', '2', '2', '1', 'www', 5),
(4, '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '', 6),
(5, '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '', 7),
(6, '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antpersonales`
--

CREATE TABLE `antpersonales` (
  `id` int(255) NOT NULL,
  `imenarquia` int(12) DEFAULT NULL,
  `imenopausia` int(12) DEFAULT NULL,
  `vsexualactiva` varchar(255) DEFAULT NULL,
  `ciclos` int(5) DEFAULT NULL,
  `gesta` int(5) DEFAULT NULL,
  `partos` int(5) DEFAULT NULL,
  `abortos` int(1) DEFAULT NULL,
  `cesareas` int(5) DEFAULT NULL,
  `fum` date DEFAULT NULL,
  `fup` date DEFAULT NULL,
  `hvivos` int(5) DEFAULT NULL,
  `mpf` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `paciente` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `antpersonales`
--

INSERT INTO `antpersonales` (`id`, `imenarquia`, `imenopausia`, `vsexualactiva`, `ciclos`, `gesta`, `partos`, `abortos`, `cesareas`, `fum`, `fup`, `hvivos`, `mpf`, `descripcion`, `paciente`) VALUES
(1, 15, 42, 'No', 27, 18, 4, 0, 0, '2017-03-07', '2017-03-06', 4, 'No usa', 'Ninguno ', 1),
(2, 0, 0, '', 0, 0, 0, 0, 0, '2017-07-30', '2017-07-30', 0, '', ' ', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(255) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `enfactual` varchar(255) DEFAULT NULL,
  `diagnostico` varchar(255) DEFAULT NULL,
  `prescripcion` varchar(255) DEFAULT NULL,
  `paciente` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `fecha`, `enfactual`, `diagnostico`, `prescripcion`, `paciente`) VALUES
(1, '2017-03-28 01:21:00', 'Dolor de utero', 'InflamaciÃ³n del utero', 'Tomar mucha agua', 1),
(2, '2017-07-30 03:59:45', 'ssssss', 'ssssss', 'sssss', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exacomplementarios`
--

CREATE TABLE `exacomplementarios` (
  `id` int(255) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `paciente` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exacomplementarios`
--

INSERT INTO `exacomplementarios` (`id`, `fecha`, `descripcion`, `paciente`) VALUES
(1, '2017-03-28 01:21:00', 'Realizar ecografÃ­a de utero', 1),
(2, '2017-07-30 03:59:45', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exafisicos`
--

CREATE TABLE `exafisicos` (
  `id` int(255) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `cabeza` varchar(255) DEFAULT NULL,
  `cuello` varchar(255) DEFAULT NULL,
  `torax` varchar(255) DEFAULT NULL,
  `abdomen` varchar(255) DEFAULT NULL,
  `miembros` varchar(255) DEFAULT NULL,
  `genitales` varchar(255) DEFAULT NULL,
  `paciente` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exafisicos`
--

INSERT INTO `exafisicos` (`id`, `fecha`, `cabeza`, `cuello`, `torax`, `abdomen`, `miembros`, `genitales`, `paciente`) VALUES
(1, '2017-03-28 01:21:00', 'Ninguno ', 'Correcto', 'Correcto', 'Correcto', 'Correcto', 'Correcto', 1),
(2, '2017-07-30 03:59:45', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exavisuales`
--

CREATE TABLE `exavisuales` (
  `id` int(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `paciente` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exavisuales`
--

INSERT INTO `exavisuales` (`id`, `descripcion`, `paciente`) VALUES
(1, 'No usa lentes', 1),
(2, 'NO posee', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `histoclinicas`
--

CREATE TABLE `histoclinicas` (
  `id` int(255) NOT NULL,
  `fregistro` date DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `paciente` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `histoclinicas`
--

INSERT INTO `histoclinicas` (`id`, `fregistro`, `numero`, `paciente`) VALUES
(1, '2017-03-28', '0001', 1),
(2, '2017-07-30', '0002', 4),
(3, '2017-07-30', '0003', 5),
(4, '2017-07-30', '0004', 6),
(5, '2017-07-30', '0005', 7),
(6, '2017-07-30', '0006', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(255) NOT NULL,
  `cedula` varchar(255) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `ocupacion` varchar(255) DEFAULT NULL,
  `estcivil` varchar(255) DEFAULT NULL,
  `genero` varchar(1) DEFAULT NULL,
  `fnacimiento` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tposangre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `usuario` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `cedula`, `nombres`, `apellidos`, `ocupacion`, `estcivil`, `genero`, `fnacimiento`, `email`, `tposangre`, `direccion`, `usuario`) VALUES
(1, '1717213183', 'Maura de JesÃ¹s', 'RÃ­os Largo', 'Ama de Casa', 'C', 'F', '2017-03-06', 'mrios@gmail.com', 'O+', 'Sauces norte', 1),
(4, '1717213183', 'Elivar', 'Largo', 'Docente', 'C', 'M', '2017-05-15', 'elrgo@gmail.com', 'o+', 'San Pedro', 1),
(5, '0706053279', 'Priscila Beatriz', 'Morocho', 'Ingeniera', 'C', 'F', '2017-07-04', 'pbmorocho@gmail.com', '0+', 'Parque infantil', 1),
(6, '1717213183', 'Juan', 'Vargas', 'Bachiller', 'S', 'M', '2017-07-09', 'jv@gmail.com', '0-', 'Las pitas', 1),
(7, '1717213183', 'Elivar1', 'Largo', 'dd', 'S', 'M', '2017-07-16', 'elago@gmail.com', '0+', 'ddffdf', 1),
(8, '1717213183', 'dsdsd', 'sdsd', 'sdsds', 'S', 'M', '2017-07-17', 'dsd@gmil.com', 'eee', 'ewewew', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id` int(255) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `medicamentos` varchar(255) DEFAULT NULL,
  `indicaciones` varchar(255) DEFAULT NULL,
  `paciente` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id`, `fecha`, `medicamentos`, `indicaciones`, `paciente`) VALUES
(1, '2017-03-28 01:21:00', 'Tomar diclofenaco qqq tyyty\r\nuno mas dffd fffdf dfdfdf ggg dgdgdg 343434 dgdfdf\r\notro mÃ¡s', 'Una cada comida', 1),
(2, '2017-07-30 03:59:45', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sigvitales`
--

CREATE TABLE `sigvitales` (
  `id` int(255) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `prearterial` decimal(5,2) DEFAULT NULL,
  `pulso` decimal(5,2) DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `talla` decimal(5,2) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `paciente` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sigvitales`
--

INSERT INTO `sigvitales` (`id`, `fecha`, `prearterial`, `pulso`, `peso`, `talla`, `descripcion`, `paciente`) VALUES
(1, '2017-03-28 01:21:00', '10.00', '20.00', '140.00', '145.00', 'NO tiene', 1),
(2, '2017-07-30 03:59:45', '22.00', '22.00', '179.00', '22.00', 'sas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistemas`
--

CREATE TABLE `sistemas` (
  `id` int(255) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `sentidos` varchar(1) DEFAULT NULL,
  `respiratorio` varchar(1) DEFAULT NULL,
  `cardiovascular` varchar(1) DEFAULT NULL,
  `nervioso` varchar(1) DEFAULT NULL,
  `genital` varchar(1) DEFAULT NULL,
  `digestivo` varchar(1) DEFAULT NULL,
  `urinario` varchar(1) DEFAULT NULL,
  `mesqueletico` varchar(1) DEFAULT NULL,
  `endocrino` varchar(1) DEFAULT NULL,
  `linfatico` varchar(1) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `paciente` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sistemas`
--

INSERT INTO `sistemas` (`id`, `fecha`, `sentidos`, `respiratorio`, `cardiovascular`, `nervioso`, `genital`, `digestivo`, `urinario`, `mesqueletico`, `endocrino`, `linfatico`, `descripcion`, `paciente`) VALUES
(1, '2017-03-28 01:21:00', '2', '2', '2', '2', '2', '1', '2', '2', '2', '2', 'NO tiene', 1),
(2, '2017-07-30 03:59:45', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `id` int(255) NOT NULL,
  `numero` int(255) DEFAULT NULL,
  `paciente` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `pregunta` varchar(255) DEFAULT NULL,
  `respuesta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `alias`, `nombres`, `apellidos`, `email`, `clave`, `pregunta`, `respuesta`) VALUES
(1, 'elargo', 'Elivar Oswaldo Largo RÃ­os', 'Largo', 'elargor@gmail.com', '$2y$10$BxERRAbC/.uBRKD9fjgmTO8/7yqu7gV9K2rrECpabasFboVBpb0Vm', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `antfamiliares`
--
ALTER TABLE `antfamiliares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_antfamiliares_pacientes` (`paciente`);

--
-- Indices de la tabla `antpersonales`
--
ALTER TABLE `antpersonales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_antpersonales_pacientes` (`paciente`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_consultas_pacientes` (`paciente`);

--
-- Indices de la tabla `exacomplementarios`
--
ALTER TABLE `exacomplementarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_exacomplementarios_pacientes` (`paciente`);

--
-- Indices de la tabla `exafisicos`
--
ALTER TABLE `exafisicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_exafisicos_pacientes` (`paciente`);

--
-- Indices de la tabla `exavisuales`
--
ALTER TABLE `exavisuales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_exavisuales_pacientes` (`paciente`);

--
-- Indices de la tabla `histoclinicas`
--
ALTER TABLE `histoclinicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_histoclinicas_pacientes` (`paciente`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pacientes_usuarios` (`usuario`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recetas_pacientes` (`paciente`);

--
-- Indices de la tabla `sigvitales`
--
ALTER TABLE `sigvitales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sigvitales_pacientes` (`paciente`);

--
-- Indices de la tabla `sistemas`
--
ALTER TABLE `sistemas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sistemas_pacientes` (`paciente`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_telefonos_paciente` (`paciente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_uniquies_fields` (`email`,`alias`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `antfamiliares`
--
ALTER TABLE `antfamiliares`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `antpersonales`
--
ALTER TABLE `antpersonales`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `exacomplementarios`
--
ALTER TABLE `exacomplementarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `exafisicos`
--
ALTER TABLE `exafisicos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `exavisuales`
--
ALTER TABLE `exavisuales`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `histoclinicas`
--
ALTER TABLE `histoclinicas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sigvitales`
--
ALTER TABLE `sigvitales`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sistemas`
--
ALTER TABLE `sistemas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `antfamiliares`
--
ALTER TABLE `antfamiliares`
  ADD CONSTRAINT `fk_antfamiliares_pacientes` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `antpersonales`
--
ALTER TABLE `antpersonales`
  ADD CONSTRAINT `fk_antpersonales_pacientes` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `fk_consultas_pacientes` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `exacomplementarios`
--
ALTER TABLE `exacomplementarios`
  ADD CONSTRAINT `fk_exacomplementarios_pacientes` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `exafisicos`
--
ALTER TABLE `exafisicos`
  ADD CONSTRAINT `fk_exafisicos_pacientes` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `exavisuales`
--
ALTER TABLE `exavisuales`
  ADD CONSTRAINT `fk_exavisuales_pacientes` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `histoclinicas`
--
ALTER TABLE `histoclinicas`
  ADD CONSTRAINT `fk_histoclinicas_pacientes` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `fk_pacientes_usuarios` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `fk_recetas_pacientes` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `sigvitales`
--
ALTER TABLE `sigvitales`
  ADD CONSTRAINT `fk_sigvitales_pacientes` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `sistemas`
--
ALTER TABLE `sistemas`
  ADD CONSTRAINT `fk_sistemas_pacientes` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD CONSTRAINT `fk_telefonos_paciente` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
