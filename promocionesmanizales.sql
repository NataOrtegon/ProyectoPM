-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2016 a las 17:12:07
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `promocionesmanizales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(15) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loginusuario`
--

CREATE TABLE IF NOT EXISTS `loginusuario` (
  `id_usuario` int(15) NOT NULL,
  `tipo_usuario` varchar(20) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `contrasena` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(15) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `precio_actual` float DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `id_usuEmpresa` int(15) DEFAULT NULL,
  `id_categoria` int(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_publicaciones`
--

CREATE TABLE IF NOT EXISTS `producto_publicaciones` (
  `id_producto` int(15) NOT NULL DEFAULT '0',
  `id_publicaciones` int(15) NOT NULL DEFAULT '0',
  `precio_publicacion` float DEFAULT NULL,
  `cantidad` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
  `id_publicaciones` int(15) NOT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `id_usuEmpresa` int(15) DEFAULT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos`
--

CREATE TABLE IF NOT EXISTS `puntos` (
  `id_puntos` int(15) NOT NULL,
  `tipo_puntuacion` varchar(30) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` int(10) DEFAULT NULL,
  `id_usuPromocion` int(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE IF NOT EXISTS `sucursal` (
  `id_sucursal` int(15) NOT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `telefono` int(15) DEFAULT NULL,
  `id_usuEmpresa` int(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superusuario`
--

CREATE TABLE IF NOT EXISTS `superusuario` (
  `id_super` int(15) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `id_usuario` int(15) DEFAULT NULL,
  `contrasena` varchar(20) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superusuario_publicaciones`
--

CREATE TABLE IF NOT EXISTS `superusuario_publicaciones` (
  `id_super` int(15) NOT NULL DEFAULT '0',
  `id_publicaciones` int(15) NOT NULL DEFAULT '0',
  `fecha_accion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioempresa`
--

CREATE TABLE IF NOT EXISTS `usuarioempresa` (
  `id_usuEmpresa` int(15) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `ciudad` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `direccion` varchar(40) DEFAULT NULL,
  `id_usuario` int(15) DEFAULT NULL,
  `contrasena` varchar(20) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariopromocion`
--

CREATE TABLE IF NOT EXISTS `usuariopromocion` (
  `id_usuPromocion` int(15) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `ciudad` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `id_usuario` int(15) DEFAULT NULL,
  `contrasena` varchar(20) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariopromocion_categoria`
--

CREATE TABLE IF NOT EXISTS `usuariopromocion_categoria` (
  `id_usuPromocion` int(15) NOT NULL DEFAULT '0',
  `id_categoria` int(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariopromocion_publicaciones`
--

CREATE TABLE IF NOT EXISTS `usuariopromocion_publicaciones` (
  `id_usuPromocion` int(15) NOT NULL DEFAULT '0',
  `id_publicaciones` int(15) NOT NULL DEFAULT '0',
  `fecha_accion` date DEFAULT NULL,
  `comentario` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `loginusuario`
--
ALTER TABLE `loginusuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_usuEmpresa` (`id_usuEmpresa`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `producto_publicaciones`
--
ALTER TABLE `producto_publicaciones`
  ADD PRIMARY KEY (`id_producto`,`id_publicaciones`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id_publicaciones`),
  ADD KEY `id_usuEmpresa` (`id_usuEmpresa`);

--
-- Indices de la tabla `puntos`
--
ALTER TABLE `puntos`
  ADD PRIMARY KEY (`id_puntos`),
  ADD KEY `id_usuPromocion` (`id_usuPromocion`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_sucursal`),
  ADD KEY `id_usuEmpresa` (`id_usuEmpresa`);

--
-- Indices de la tabla `superusuario`
--
ALTER TABLE `superusuario`
  ADD PRIMARY KEY (`id_super`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `superusuario_publicaciones`
--
ALTER TABLE `superusuario_publicaciones`
  ADD PRIMARY KEY (`id_super`,`id_publicaciones`);

--
-- Indices de la tabla `usuarioempresa`
--
ALTER TABLE `usuarioempresa`
  ADD PRIMARY KEY (`id_usuEmpresa`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuariopromocion`
--
ALTER TABLE `usuariopromocion`
  ADD PRIMARY KEY (`id_usuPromocion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuariopromocion_categoria`
--
ALTER TABLE `usuariopromocion_categoria`
  ADD PRIMARY KEY (`id_usuPromocion`,`id_categoria`);

--
-- Indices de la tabla `usuariopromocion_publicaciones`
--
ALTER TABLE `usuariopromocion_publicaciones`
  ADD PRIMARY KEY (`id_usuPromocion`,`id_publicaciones`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `loginusuario`
--
ALTER TABLE `loginusuario`
  MODIFY `id_usuario` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_publicaciones` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `puntos`
--
ALTER TABLE `puntos`
  MODIFY `id_puntos` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id_sucursal` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `superusuario`
--
ALTER TABLE `superusuario`
  MODIFY `id_super` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarioempresa`
--
ALTER TABLE `usuarioempresa`
  MODIFY `id_usuEmpresa` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuariopromocion`
--
ALTER TABLE `usuariopromocion`
  MODIFY `id_usuPromocion` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_usuEmpresa`) REFERENCES `usuarioempresa` (`id_usuEmpresa`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`id_usuEmpresa`) REFERENCES `usuarioempresa` (`id_usuEmpresa`);

--
-- Filtros para la tabla `puntos`
--
ALTER TABLE `puntos`
  ADD CONSTRAINT `puntos_ibfk_1` FOREIGN KEY (`id_usuPromocion`) REFERENCES `usuariopromocion` (`id_usuPromocion`);

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`id_usuEmpresa`) REFERENCES `usuarioempresa` (`id_usuEmpresa`);

--
-- Filtros para la tabla `superusuario`
--
ALTER TABLE `superusuario`
  ADD CONSTRAINT `superusuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `loginusuario` (`id_usuario`);

--
-- Filtros para la tabla `usuarioempresa`
--
ALTER TABLE `usuarioempresa`
  ADD CONSTRAINT `usuarioempresa_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `loginusuario` (`id_usuario`);

--
-- Filtros para la tabla `usuariopromocion`
--
ALTER TABLE `usuariopromocion`
  ADD CONSTRAINT `usuariopromocion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `loginusuario` (`id_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
