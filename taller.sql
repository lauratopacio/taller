-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2016 a las 19:01:51
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `taller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`pk_cliente` smallint(6) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rfc` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciudad` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_proveedor`
--

CREATE TABLE IF NOT EXISTS `compras_proveedor` (
`pk_compras_proveedor` smallint(6) NOT NULL,
  `fk_proveedor` smallint(6) NOT NULL,
  `fk_producto` smallint(6) NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  `precio` float NOT NULL,
  `total` float NOT NULL,
  `fecha_compra` date NOT NULL,
  `fecha_factura` date NOT NULL,
  `no_factura` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credito`
--

CREATE TABLE IF NOT EXISTS `credito` (
`pk_credito` smallint(6) NOT NULL,
  `fk_venta` smallint(6) NOT NULL,
  `fecha` date NOT NULL,
  `estatus` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `num_cheque` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `banco` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`pk_login` smallint(6) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `privilegio` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`pk_login`, `nombre`, `clave`, `usuario`, `estado`, `privilegio`) VALUES
(5, 'Laura Topacio Valdez Morones', '12345', 'laurita', 'activo', 'administrador'),
(17, 'Cesar Ramirez Torres', '12345', 'cesar', 'activo', 'paciente'),
(18, 'topacio', '12345', 'topacio', 'activo', 'medico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_contado`
--

CREATE TABLE IF NOT EXISTS `pago_contado` (
`pk_pago` smallint(6) NOT NULL,
  `fk_venta` smallint(6) NOT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pago_contado`
--

INSERT INTO `pago_contado` (`pk_pago`, `fk_venta`, `fecha`, `cantidad`) VALUES
(1, 12, '2016-06-06', 2100),
(2, 12, '2016-06-06', 2100),
(3, 12, '2016-06-06', 2100),
(4, 12, '2016-06-06', 2100),
(5, 12, '2016-06-06', 3100),
(6, 12, '2016-06-07', 4400),
(7, 13, '2016-06-07', 800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`pk_producto` smallint(6) NOT NULL,
  `codigo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `marca_carro` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_pieza` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  `costo` float NOT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`pk_producto`, `codigo`, `marca_carro`, `nombre_pieza`, `cantidad`, `costo`, `imagen`) VALUES
(1, 'S45FGDFGH7', 'CHEVROLET', 'Radiador', 10, 900, 'radiador_chevrolet.jpg'),
(2, '44GHFRGDF9', 'CHEVROLET', 'Bomba de Gasolina', 19, 600, 'bomba_gasolina_chevrolet.jpg'),
(3, '9F849FGD03', 'CHEVROLET', 'BOBINA', 20, 500, 'bobina_ch.jpg'),
(4, '5FGHDFG756', 'CHEVROLET', 'Carburador', 16, 800, 'carburador_ch.jpg'),
(5, '2DSFGHFDS', 'CHEVROLET', 'BUJIA', 16, 60, 'bujia.jpg'),
(6, '3234DGFS534', 'CHEVROLET', 'BATERIA', 10, 1000, 'bateria.jpg'),
(7, '34TGFGUA21', 'CHEVROLET', 'Suspenciones', 6, 700, 'suspenciones_ch.jpg'),
(8, '564324567H', 'CHEVROLET', 'Amortiguadores', 5, 700, 'amortiguador.png'),
(9, 'KFJDKFKG94', 'CHEVROLET', 'Bomba de Agua', 7, 500, 'bomba_agua.jpg4'),
(10, '', '', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
`pk_proveedor` smallint(6) NOT NULL,
  `nombre_empresa` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `persona_contacto` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rfc` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tel_persona` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tel_empresa` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cod_postal` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`pk_proveedor`, `nombre_empresa`, `persona_contacto`, `rfc`, `tel_persona`, `tel_empresa`, `ciudad`, `direccion`, `cod_postal`, `correo`) VALUES
(1, 'Ley', 'Jesus  Ivan Armenta Lopez', '346FGF452', '323129396', '319100893984', 'Santiago Ixcuintlla', 'La quinta calle Sandia', '63201', 'jesus@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
`pk_venta` smallint(6) NOT NULL,
  `fecha_venta` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `fk_cliente` smallint(6) DEFAULT NULL,
  `estatus` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `TOTAL` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`pk_venta`, `fecha_venta`, `fecha_fin`, `fk_cliente`, `estatus`, `TOTAL`) VALUES
(6, '2016-06-02', '2016-06-02', NULL, 'No pagado', NULL),
(7, '2016-06-03', '2016-06-03', NULL, 'No pagado', NULL),
(8, '2016-06-03', '2016-06-03', NULL, 'No pagado', NULL),
(9, '2016-06-03', '2016-06-03', NULL, 'No pagado', NULL),
(10, '2016-06-05', '2016-06-05', NULL, 'No pagado', NULL),
(11, '2016-06-06', '2016-06-06', NULL, 'No pagado', NULL),
(12, '2016-06-06', '2016-06-06', NULL, 'Pagado', 4400),
(13, '2016-06-07', '2016-06-07', NULL, 'Pagado', 800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_productos`
--

CREATE TABLE IF NOT EXISTS `venta_productos` (
`pk_venta_producto` smallint(6) NOT NULL,
  `fk_venta` smallint(6) NOT NULL,
  `fk_producto` smallint(6) NOT NULL,
  `cantidad` float NOT NULL,
  `costo` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `venta_productos`
--

INSERT INTO `venta_productos` (`pk_venta_producto`, `fk_venta`, `fk_producto`, `cantidad`, `costo`) VALUES
(1, 6, 2, 1, 600),
(2, 6, 3, 1, 500),
(3, 6, 2, 1, 600),
(4, 6, 4, 1, 800),
(5, 6, 4, 1, 800),
(6, 6, 4, 1, 800),
(7, 6, 4, 1, 800),
(8, 6, 4, 1, 800),
(9, 6, 4, 1, 800),
(10, 6, 4, 1, 800),
(11, 6, 4, 1, 800),
(12, 6, 4, 1, 800),
(13, 6, 4, 1, 800),
(14, 6, 4, 1, 800),
(15, 6, 4, 1, 800),
(16, 6, 4, 1, 800),
(17, 6, 8, 1, 700),
(18, 6, 8, 1, 700),
(19, 6, 8, 1, 700),
(20, 6, 8, 1, 700),
(21, 6, 8, 1, 700),
(22, 6, 8, 1, 700),
(23, 6, 7, 1, 700),
(24, 6, 7, 1, 700),
(25, 6, 4, 1, 800),
(26, 6, 4, 1, 800),
(28, 6, 2, 1, 600),
(29, 6, 2, 1, 600),
(30, 6, 2, 1, 600),
(31, 6, 2, 1, 600),
(32, 7, 3, 1, 500),
(33, 7, 8, 1, 700),
(34, 7, 2, 1, 600),
(35, 8, 3, 1, 500),
(36, 8, 4, 1, 800),
(37, 9, 2, 1, 600),
(38, 9, 3, 1, 500),
(39, 9, 4, 1, 800),
(40, 10, 3, 1, 500),
(41, 10, 4, 1, 800),
(42, 10, 2, 1, 600),
(43, 10, 2, 1, 600),
(44, 11, 2, 1, 600),
(45, 11, 3, 1, 500),
(46, 11, 4, 1, 800),
(47, 12, 1, 1, 900),
(48, 12, 2, 1, 600),
(49, 12, 2, 1, 600),
(50, 12, 2, 1, 600),
(51, 12, 3, 1, 500),
(52, 12, 4, 1, 800),
(53, 12, 3, 1, 500),
(54, 12, 1, 1, 900),
(55, 13, 3, 1, 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_servicio`
--

CREATE TABLE IF NOT EXISTS `venta_servicio` (
`pk_servicio` smallint(6) NOT NULL,
  `fk_venta` smallint(6) NOT NULL,
  `mano_obra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `costo` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `venta_servicio`
--

INSERT INTO `venta_servicio` (`pk_servicio`, `fk_venta`, `mano_obra`, `costo`) VALUES
(1, 7, 'Alineacion de Carro', 500),
(2, 7, 'Alineacion de Carro', 500),
(3, 7, 'SDFSDF', 400),
(4, 7, 'Puesta de amortiguadores', 1500),
(5, 8, 'Alineacion de Carro', 1000),
(6, 10, 'cambio de llanta', 140),
(7, 11, 'cambio de llanta', 299),
(8, 11, 'Alineacion de Carro', 1000),
(9, 12, 'Puesta de amortiguadores', 400),
(10, 13, 'Puesta de amortiguadores', 300);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`pk_cliente`);

--
-- Indices de la tabla `compras_proveedor`
--
ALTER TABLE `compras_proveedor`
 ADD PRIMARY KEY (`pk_compras_proveedor`), ADD KEY `fk_proveedor` (`fk_proveedor`), ADD KEY `fk_producto` (`fk_producto`);

--
-- Indices de la tabla `credito`
--
ALTER TABLE `credito`
 ADD PRIMARY KEY (`pk_credito`), ADD KEY `fk_venta` (`fk_venta`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`pk_login`);

--
-- Indices de la tabla `pago_contado`
--
ALTER TABLE `pago_contado`
 ADD PRIMARY KEY (`pk_pago`), ADD KEY `fk_venta` (`fk_venta`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`pk_producto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
 ADD PRIMARY KEY (`pk_proveedor`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
 ADD PRIMARY KEY (`pk_venta`), ADD KEY `fk_cliente` (`fk_cliente`);

--
-- Indices de la tabla `venta_productos`
--
ALTER TABLE `venta_productos`
 ADD PRIMARY KEY (`pk_venta_producto`), ADD KEY `fk_venta` (`fk_venta`), ADD KEY `fk_producto` (`fk_producto`);

--
-- Indices de la tabla `venta_servicio`
--
ALTER TABLE `venta_servicio`
 ADD PRIMARY KEY (`pk_servicio`), ADD KEY `fk_venta` (`fk_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
MODIFY `pk_cliente` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `compras_proveedor`
--
ALTER TABLE `compras_proveedor`
MODIFY `pk_compras_proveedor` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `credito`
--
ALTER TABLE `credito`
MODIFY `pk_credito` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
MODIFY `pk_login` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `pago_contado`
--
ALTER TABLE `pago_contado`
MODIFY `pk_pago` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `pk_producto` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
MODIFY `pk_proveedor` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
MODIFY `pk_venta` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `venta_productos`
--
ALTER TABLE `venta_productos`
MODIFY `pk_venta_producto` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT de la tabla `venta_servicio`
--
ALTER TABLE `venta_servicio`
MODIFY `pk_servicio` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras_proveedor`
--
ALTER TABLE `compras_proveedor`
ADD CONSTRAINT `compras_proveedor_ibfk_1` FOREIGN KEY (`fk_proveedor`) REFERENCES `proveedor` (`pk_proveedor`),
ADD CONSTRAINT `compras_proveedor_ibfk_2` FOREIGN KEY (`fk_producto`) REFERENCES `producto` (`pk_producto`);

--
-- Filtros para la tabla `credito`
--
ALTER TABLE `credito`
ADD CONSTRAINT `credito_ibfk_1` FOREIGN KEY (`fk_venta`) REFERENCES `venta` (`pk_venta`);

--
-- Filtros para la tabla `pago_contado`
--
ALTER TABLE `pago_contado`
ADD CONSTRAINT `pago_contado_ibfk_1` FOREIGN KEY (`fk_venta`) REFERENCES `venta` (`pk_venta`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`pk_cliente`);

--
-- Filtros para la tabla `venta_productos`
--
ALTER TABLE `venta_productos`
ADD CONSTRAINT `venta_productos_ibfk_1` FOREIGN KEY (`fk_venta`) REFERENCES `venta` (`pk_venta`),
ADD CONSTRAINT `venta_productos_ibfk_2` FOREIGN KEY (`fk_producto`) REFERENCES `producto` (`pk_producto`);

--
-- Filtros para la tabla `venta_servicio`
--
ALTER TABLE `venta_servicio`
ADD CONSTRAINT `venta_servicio_ibfk_1` FOREIGN KEY (`fk_venta`) REFERENCES `venta` (`pk_venta`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
