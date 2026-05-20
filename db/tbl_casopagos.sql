-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2026 a las 21:50:29
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_casos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_casopagos`
--

CREATE TABLE `tbl_casopagos` (
  `codigoPago` varchar(20) NOT NULL,
  `codigoCaso` varchar(20) NOT NULL,
  `estatusPago` int(20) NOT NULL,
  `observacionesPago` text DEFAULT NULL,
  `conceptoPago` varchar(100) NOT NULL,
  `montoPago` decimal(20,2) NOT NULL,
  `metodoPago` varchar(20) NOT NULL,
  `fechaPago` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_casopagos`
--
ALTER TABLE `tbl_casopagos`
  ADD PRIMARY KEY (`codigoPago`,`codigoCaso`),
  ADD KEY `codigoCaso` (`codigoCaso`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_casopagos`
--
ALTER TABLE `tbl_casopagos`
  ADD CONSTRAINT `tbl_casopagos_ibfk_1` FOREIGN KEY (`codigoCaso`) REFERENCES `tbl_casos` (`codigoCaso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- ----------------------------------------------------------------------
-- RBAC seed: roles and users
-- ----------------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_usuarios`;
DROP TABLE IF EXISTS `tbl_roles`;

CREATE TABLE `tbl_roles` (
  `idRol` int(10) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(50) NOT NULL,
  `descripcionRol` varchar(255) NOT NULL,
  `permisosRol` json NOT NULL,
  PRIMARY KEY (`idRol`),
  UNIQUE KEY `nombreRol` (`nombreRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `tbl_usuarios` (
  `idUsuario` int(10) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(40) NOT NULL,
  `apellidoUsuario` varchar(40) NOT NULL,
  `cedulaUsuario` varchar(20) DEFAULT NULL,
  `correoUsuario` varchar(200) NOT NULL,
  `passwordHash` varchar(255) NOT NULL,
  `fechaNacimientoUsuario` date DEFAULT NULL,
  `direccionUsuario` text DEFAULT NULL,
  `idRol` int(10) NOT NULL,
  `fraseSecretaHash` varchar(255) NOT NULL,
  `estatusUsuario` varchar(20) NOT NULL DEFAULT 'Activo',
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `correoUsuario` (`correoUsuario`),
  UNIQUE KEY `cedulaUsuario` (`cedulaUsuario`),
  KEY `idRol` (`idRol`),
  CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`idRol`) REFERENCES `tbl_roles` (`idRol`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO `tbl_roles` (`nombreRol`, `descripcionRol`, `permisosRol`) VALUES
  ('administrador', 'Acceso completo al sistema', JSON_ARRAY('menuInicio', 'menuAbogado', 'menuCliente', 'menuCaso', 'menuDocumento', 'menuUsuarios', 'menuReportes')),
  ('secretaria', 'Acceso a clientes, casos y documentos', JSON_ARRAY('menuInicio', 'menuCliente', 'menuCaso', 'menuDocumento')),
  ('abogado', 'Acceso a sus casos y documentos', JSON_ARRAY('menuInicio', 'menuCaso', 'menuDocumento'));

INSERT INTO `tbl_usuarios` (
  `nombreUsuario`, `apellidoUsuario`, `cedulaUsuario`, `correoUsuario`, `passwordHash`, `fechaNacimientoUsuario`, `direccionUsuario`, `idRol`, `fraseSecretaHash`, `estatusUsuario`
) VALUES
  ('Admin', 'Sistema', '0000000000', 'admin@example.com', '$2y$10$9QYVYSXyUvqfq7sp1ROeKOzrCe9wwn0YEjq/Wx391w829z5nAwlfW', '1980-01-01', 'Oficina central', 1, '$2y$10$tHlIcbkwa7716cYOQyCBD.i2amR2BdhPnLBQCdk4WguD7STyFuj/S', 'Activo'),
  ('Secretaria', 'Principal', '1111111111', 'secretaria@example.com', '$2y$10$aOg89pUoyuQwJoNE5ZTKLOxpC8NDDLSNbtw39d1C1omEo6GFOnDCS', '1990-02-02', 'Recepción', 2, '$2y$10$YHuINOeIgnFPOIBLlzimBOCFpAlmtRcOoq4r.nZALt/rC5FrFMBhm', 'Activo'),
  ('Abogado', 'Principal', '2222222222', 'abogado@example.com', '$2y$10$f04rwnUYANQiIkIC2KKMleHbDSVBkB5FdFwWCikRdVOjietR3f1Ri', '1985-03-03', 'Despacho', 3, '$2y$10$Ng9TLfGiabtJg5HEv/fPFezN4Rvj0CC0Ip8DM5vIWnyD.jKvlX6fi', 'Activo');
