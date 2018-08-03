-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2018 a las 21:04:02
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `Usuario_id` int(11) NOT NULL,
  `inmueble_idinmueble` int(11) NOT NULL,
  `inmueble_usuario_id` int(11) NOT NULL,
  `fecha` timestamp(1) NULL DEFAULT CURRENT_TIMESTAMP(1),
  `comentario` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuarto`
--

CREATE TABLE `cuarto` (
  `idcuarto` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `icono` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `iddireccion` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `latitud` float NOT NULL,
  `longitud` float NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `icono` blob,
  `pais` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `distrito` varchar(20) DEFAULT NULL,
  `cod postal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios`
--

CREATE TABLE `estudios` (
  `Usuario_dni` int(11) NOT NULL,
  `institucion` varchar(45) DEFAULT NULL,
  `carrera` varchar(45) DEFAULT NULL,
  `fecha_inic` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `Producto_idalquila` int(11) NOT NULL,
  `Producto_inmueble_id` int(11) NOT NULL,
  `cuarto_idcuarto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `idimagen` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `imagen` blob NOT NULL,
  `Producto_id` int(11) NOT NULL,
  `Producto_inmueble_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE `inmueble` (
  `idinmueble` int(11) NOT NULL,
  `Usuario_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `direccion_id` int(11) NOT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble_servicios`
--

CREATE TABLE `inmueble_servicios` (
  `inmueble_idinmueble` int(11) NOT NULL,
  `servicios_idservicios` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble_uso`
--

CREATE TABLE `inmueble_uso` (
  `Usuario_id` int(11) NOT NULL,
  `Producto_idalquila` int(11) NOT NULL,
  `Producto_inmueble_id` int(11) NOT NULL,
  `fecha_inic` datetime(1) DEFAULT CURRENT_TIMESTAMP(1),
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opinion`
--

CREATE TABLE `opinion` (
  `usuarioID` int(11) NOT NULL,
  `inmuebleID` int(11) NOT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `inmueblePropietario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE `precio` (
  `idprecio` int(11) NOT NULL,
  `intervalo` varchar(15) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `moneda` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idalquila` int(11) NOT NULL,
  `inmueble_id` int(11) NOT NULL,
  `precio_id` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `Tipo_Contrato_id` int(11) NOT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad_servicios`
--

CREATE TABLE `propiedad_servicios` (
  `inmueble_idinmueble` int(11) NOT NULL,
  `inmueble_propietario` int(11) NOT NULL,
  `servicios_idservicios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reglas_inmueble`
--

CREATE TABLE `reglas_inmueble` (
  `idreglas_casa` int(11) NOT NULL,
  `regla` varchar(100) DEFAULT NULL,
  `inmueble_idinmueble` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `Usuario_id` int(11) NOT NULL,
  `Producto_idalquila` int(11) NOT NULL,
  `Producto_inmueble_id` int(11) NOT NULL,
  `fecha` datetime(1) DEFAULT CURRENT_TIMESTAMP(1),
  `ninos` int(11) DEFAULT NULL,
  `bebe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `idservicios` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `decripcion` varchar(100) DEFAULT NULL,
  `icono` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contrato`
--

CREATE TABLE `tipo_contrato` (
  `idTipoTranscccion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `icono` blob,
  `fecha_inic` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `Usuario_dni` int(11) NOT NULL,
  `compania` varchar(45) DEFAULT NULL,
  `puesto` varchar(45) DEFAULT NULL,
  `fecha_inic` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE `transaccion` (
  `idtransaccion` int(11) NOT NULL,
  `RESERVAID` int(11) DEFAULT NULL,
  `huesped` int(11) NOT NULL,
  `fecha_inic` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `transaccioncol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dni` int(11) NOT NULL,
  `perfil` blob,
  `correo` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `moneda` varchar(20) DEFAULT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `genero` varchar(5) DEFAULT NULL,
  `fec_nac` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_Usuario_has_inmueble_Usuario2` (`Usuario_id`),
  ADD KEY `fk_Usuario_has_inmueble_inmueble3` (`inmueble_idinmueble`,`inmueble_usuario_id`);

--
-- Indices de la tabla `cuarto`
--
ALTER TABLE `cuarto`
  ADD PRIMARY KEY (`idcuarto`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`iddireccion`);

--
-- Indices de la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD PRIMARY KEY (`Usuario_dni`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`Producto_inmueble_id`,`cuarto_idcuarto`,`Producto_idalquila`),
  ADD KEY `fk_Producto_has_cuarto_Producto1` (`Producto_idalquila`,`Producto_inmueble_id`),
  ADD KEY `fk_Producto_has_cuarto_cuarto1` (`cuarto_idcuarto`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`idimagen`),
  ADD KEY `fk_imagen_Producto1` (`Producto_id`,`Producto_inmueble_id`);

--
-- Indices de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`idinmueble`,`Usuario_id`),
  ADD KEY `fk_inmueble_Usuario1` (`Usuario_id`),
  ADD KEY `fk_inmueble_direccion1` (`direccion_id`);

--
-- Indices de la tabla `inmueble_servicios`
--
ALTER TABLE `inmueble_servicios`
  ADD PRIMARY KEY (`inmueble_idinmueble`,`servicios_idservicios`),
  ADD KEY `fk_inmueble_has_servicios_servicios2` (`servicios_idservicios`);

--
-- Indices de la tabla `inmueble_uso`
--
ALTER TABLE `inmueble_uso`
  ADD PRIMARY KEY (`Usuario_id`,`Producto_idalquila`,`Producto_inmueble_id`),
  ADD KEY `fk_Usuario_has_Producto_Producto2` (`Producto_idalquila`,`Producto_inmueble_id`);

--
-- Indices de la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`usuarioID`,`inmuebleID`,`inmueblePropietario`),
  ADD KEY `fk_Usuario_has_inmueble_inmueble1` (`inmuebleID`);

--
-- Indices de la tabla `precio`
--
ALTER TABLE `precio`
  ADD PRIMARY KEY (`idprecio`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idalquila`,`inmueble_id`),
  ADD KEY `fk_Producto_inmueble1` (`inmueble_id`),
  ADD KEY `fk_Producto_precio1` (`precio_id`),
  ADD KEY `fk_Producto_Tipo_Contrato1` (`Tipo_Contrato_id`);

--
-- Indices de la tabla `propiedad_servicios`
--
ALTER TABLE `propiedad_servicios`
  ADD PRIMARY KEY (`inmueble_idinmueble`,`inmueble_propietario`,`servicios_idservicios`),
  ADD KEY `fk_inmueble_has_servicios_servicios1` (`servicios_idservicios`);

--
-- Indices de la tabla `reglas_inmueble`
--
ALTER TABLE `reglas_inmueble`
  ADD PRIMARY KEY (`idreglas_casa`),
  ADD KEY `fk_reglas_casa_inmueble1` (`inmueble_idinmueble`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`Usuario_id`,`Producto_idalquila`,`Producto_inmueble_id`),
  ADD KEY `fk_Usuario_has_Producto_Producto1` (`Producto_idalquila`,`Producto_inmueble_id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idservicios`);

--
-- Indices de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  ADD PRIMARY KEY (`idTipoTranscccion`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD PRIMARY KEY (`Usuario_dni`);

--
-- Indices de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`idtransaccion`,`huesped`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `id_UNIQUE` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuarto`
--
ALTER TABLE `cuarto`
  MODIFY `idcuarto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `iddireccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `idimagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `precio`
--
ALTER TABLE `precio`
  MODIFY `idprecio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idalquila` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idservicios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  MODIFY `idTipoTranscccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `idtransaccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_Usuario_has_inmueble_Usuario2` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_has_inmueble_inmueble3` FOREIGN KEY (`inmueble_idinmueble`,`inmueble_usuario_id`) REFERENCES `inmueble` (`idinmueble`, `Usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD CONSTRAINT `fk_estudios_Usuario1` FOREIGN KEY (`Usuario_dni`) REFERENCES `usuario` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD CONSTRAINT `fk_Producto_has_cuarto_Producto1` FOREIGN KEY (`Producto_idalquila`,`Producto_inmueble_id`) REFERENCES `producto` (`idalquila`, `inmueble_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Producto_has_cuarto_cuarto1` FOREIGN KEY (`cuarto_idcuarto`) REFERENCES `cuarto` (`idcuarto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `fk_imagen_Producto1` FOREIGN KEY (`Producto_id`,`Producto_inmueble_id`) REFERENCES `producto` (`idalquila`, `inmueble_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD CONSTRAINT `fk_inmueble_Usuario1` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inmueble_direccion1` FOREIGN KEY (`direccion_id`) REFERENCES `direccion` (`iddireccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inmueble_servicios`
--
ALTER TABLE `inmueble_servicios`
  ADD CONSTRAINT `fk_inmueble_has_servicios_inmueble2` FOREIGN KEY (`inmueble_idinmueble`) REFERENCES `inmueble` (`idinmueble`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inmueble_has_servicios_servicios2` FOREIGN KEY (`servicios_idservicios`) REFERENCES `servicios` (`idservicios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inmueble_uso`
--
ALTER TABLE `inmueble_uso`
  ADD CONSTRAINT `fk_Usuario_has_Producto_Producto2` FOREIGN KEY (`Producto_idalquila`,`Producto_inmueble_id`) REFERENCES `producto` (`idalquila`, `inmueble_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_has_Producto_Usuario2` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD CONSTRAINT `fk_Usuario_has_inmueble_inmueble1` FOREIGN KEY (`inmuebleID`) REFERENCES `inmueble` (`idinmueble`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_Producto_Tipo_Contrato1` FOREIGN KEY (`Tipo_Contrato_id`) REFERENCES `tipo_contrato` (`idTipoTranscccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Producto_inmueble1` FOREIGN KEY (`inmueble_id`) REFERENCES `inmueble` (`idinmueble`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Producto_precio1` FOREIGN KEY (`precio_id`) REFERENCES `precio` (`idprecio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `propiedad_servicios`
--
ALTER TABLE `propiedad_servicios`
  ADD CONSTRAINT `fk_inmueble_has_servicios_inmueble1` FOREIGN KEY (`inmueble_idinmueble`) REFERENCES `inmueble` (`idinmueble`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inmueble_has_servicios_servicios1` FOREIGN KEY (`servicios_idservicios`) REFERENCES `servicios` (`idservicios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reglas_inmueble`
--
ALTER TABLE `reglas_inmueble`
  ADD CONSTRAINT `fk_reglas_casa_inmueble1` FOREIGN KEY (`inmueble_idinmueble`) REFERENCES `inmueble` (`idinmueble`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_Usuario_has_Producto_Producto1` FOREIGN KEY (`Producto_idalquila`,`Producto_inmueble_id`) REFERENCES `producto` (`idalquila`, `inmueble_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_has_Producto_Usuario1` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD CONSTRAINT `fk_trabajo_Usuario1` FOREIGN KEY (`Usuario_dni`) REFERENCES `usuario` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
