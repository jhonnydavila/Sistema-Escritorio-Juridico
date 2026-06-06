-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2026 a las 02:35:14
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
-- Estructura de tabla para la tabla `tbl_abogados`
--

CREATE TABLE `tbl_abogados` (
  `cedulaAbogado` int(10) NOT NULL,
  `nombreAbogado` varchar(40) NOT NULL,
  `apellidoAbogado` varchar(40) NOT NULL,
  `direccionAbogado` text NOT NULL,
  `estatusAbogado` varchar(10) NOT NULL,
  `telefonoAbogado` varchar(15) NOT NULL,
  `correoAbogado` varchar(200) NOT NULL,
  `nacionalidadAbogado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_abogados`
--

INSERT INTO `tbl_abogados` (`cedulaAbogado`, `nombreAbogado`, `apellidoAbogado`, `direccionAbogado`, `estatusAbogado`, `telefonoAbogado`, `correoAbogado`, `nacionalidadAbogado`) VALUES
(1112233, 'fernando', 'martinez', 'sss', 'Activo', '04125602321', 'nose@gmail.com', 'V'),
(12345670, 'Juan', 'Lopez', 'saasass', 'Activo', '041234567', '', 'V');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_archivadores`
--

CREATE TABLE `tbl_archivadores` (
  `codigoArchivador` varchar(10) NOT NULL,
  `nombreArchivador` varchar(40) NOT NULL,
  `descripcionArchivador` text DEFAULT NULL,
  `estatusArchivador` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_archivadores`
--

INSERT INTO `tbl_archivadores` (`codigoArchivador`, `nombreArchivador`, `descripcionArchivador`, `estatusArchivador`) VALUES
('ARC-00001', 'n', 'n', 'Activo'),
('ARC-00002', 'lado izquierdo', 'dddfd', 'Activo'),
('ARC-00003', '174628342', 'cualquier cosa', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_casoeventos`
--

CREATE TABLE `tbl_casoeventos` (
  `codigoEvento` varchar(10) NOT NULL,
  `tituloEvento` varchar(100) NOT NULL,
  `tipoEvento` varchar(20) NOT NULL,
  `descripcionEvento` text DEFAULT NULL,
  `estatusEvento` varchar(10) NOT NULL,
  `diaEvento` date NOT NULL,
  `horaEvento` time DEFAULT NULL,
  `codigoCaso` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_casoeventos`
--

INSERT INTO `tbl_casoeventos` (`codigoEvento`, `tituloEvento`, `tipoEvento`, `descripcionEvento`, `estatusEvento`, `diaEvento`, `horaEvento`, `codigoCaso`) VALUES
('EVE-00001', 'wqwq', 'Cita', 'w', 'Confirmado', '2026-06-03', NULL, 'CAS-00001'),
('EVE-00006', 'prueba', 'Audiencia', NULL, 'En Espera', '2026-06-11', NULL, 'CAS-00001'),
('EVE-00007', 'x', 'Cita', NULL, 'Confirmado', '2026-06-27', '05:20:00', 'CAS-00001'),
('EVE-00008', 'prueba', 'Cita', NULL, 'En Espera', '2026-06-19', '12:15:00', 'CAS-00002');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_casogastos`
--

CREATE TABLE `tbl_casogastos` (
  `codigoGasto` varchar(10) NOT NULL,
  `descripcionGasto` text NOT NULL,
  `montoGasto` decimal(20,2) NOT NULL,
  `fechaRegistroGasto` date NOT NULL,
  `codigoCaso` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_casos`
--

CREATE TABLE `tbl_casos` (
  `codigoCaso` varchar(10) NOT NULL,
  `fechaRegistroCaso` date NOT NULL DEFAULT current_timestamp(),
  `fechaFinCaso` date DEFAULT NULL,
  `fechaInicioCaso` date DEFAULT NULL,
  `estatusCaso` varchar(10) NOT NULL,
  `modalidadCaso` varchar(20) NOT NULL,
  `descripcionCaso` text NOT NULL,
  `codigoExpediente` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_casos`
--

INSERT INTO `tbl_casos` (`codigoCaso`, `fechaRegistroCaso`, `fechaFinCaso`, `fechaInicioCaso`, `estatusCaso`, `modalidadCaso`, `descripcionCaso`, `codigoExpediente`) VALUES
('CAS-00001', '2026-06-01', NULL, NULL, 'Activo', 'Asesoria', 'x', 'EXP-00001'),
('CAS-00002', '2026-06-03', NULL, NULL, 'Activo', 'Asesoria', 'nada', 'EXP-00001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_casosabogados`
--

CREATE TABLE `tbl_casosabogados` (
  `cedulaAbogado` int(10) NOT NULL,
  `codigoCaso` varchar(10) NOT NULL,
  `fechaAsignacionCasoAbogado` date NOT NULL,
  `fechaCierreCasoAbogado` date DEFAULT NULL,
  `estatusAsignacionCasoAbogado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_casosabogados`
--

INSERT INTO `tbl_casosabogados` (`cedulaAbogado`, `codigoCaso`, `fechaAsignacionCasoAbogado`, `fechaCierreCasoAbogado`, `estatusAsignacionCasoAbogado`) VALUES
(1112233, 'CAS-00001', '0000-00-00', '0000-00-00', 'Activa'),
(12345670, 'CAS-00002', '0000-00-00', '0000-00-00', 'Activa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_casostramites`
--

CREATE TABLE `tbl_casostramites` (
  `codigoCaso` varchar(10) NOT NULL,
  `codigoTramite` varchar(10) NOT NULL,
  `fechaInicioCasoTramite` date NOT NULL,
  `fechaFinCasoTramite` date DEFAULT NULL,
  `montoCasoTramite` decimal(20,2) NOT NULL,
  `observacionesCasoTramite` text DEFAULT NULL,
  `estatusCasoTramite` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientes`
--

CREATE TABLE `tbl_clientes` (
  `codigoCliente` varchar(10) NOT NULL,
  `correoCliente` varchar(150) NOT NULL,
  `direccionCliente` text NOT NULL,
  `tipoCliente` varchar(10) NOT NULL,
  `fechaRegistroCliente` date NOT NULL DEFAULT current_timestamp(),
  `estatusCliente` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_clientes`
--

INSERT INTO `tbl_clientes` (`codigoCliente`, `correoCliente`, `direccionCliente`, `tipoCliente`, `fechaRegistroCliente`, `estatusCliente`) VALUES
('CLI-00001', '', '', 'Natural', '2026-06-01', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientesjuridicos`
--

CREATE TABLE `tbl_clientesjuridicos` (
  `codigoCliente` varchar(10) NOT NULL,
  `fechaConstitucionClienteJuridico` date NOT NULL,
  `razonSocialClienteJuridico` varchar(100) NOT NULL,
  `tipoRifClienteJuridico` char(1) NOT NULL,
  `rifClienteJuridico` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientesnaturales`
--

CREATE TABLE `tbl_clientesnaturales` (
  `codigoCliente` varchar(10) NOT NULL,
  `nombreClienteNatural` varchar(40) NOT NULL,
  `apellidoClienteNatural` varchar(40) NOT NULL,
  `nacionalidadClienteNatural` char(1) NOT NULL,
  `cedulaClienteNatural` int(10) NOT NULL,
  `fechaNacimientoClienteNatural` date NOT NULL,
  `estadoCivilClienteNatural` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientestelefonos`
--

CREATE TABLE `tbl_clientestelefonos` (
  `codigoCliente` varchar(10) NOT NULL,
  `numeroClienteTelefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_documentos`
--

CREATE TABLE `tbl_documentos` (
  `codigoDocumento` varchar(10) NOT NULL,
  `nombreDocumento` varchar(40) NOT NULL,
  `tipoDocumento` varchar(10) NOT NULL,
  `descripcionDocumento` text NOT NULL,
  `estatusDocumento` varchar(10) NOT NULL,
  `fechaRegistroDocumento` date NOT NULL DEFAULT current_timestamp(),
  `codigoCaso` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_documentos`
--

INSERT INTO `tbl_documentos` (`codigoDocumento`, `nombreDocumento`, `tipoDocumento`, `descripcionDocumento`, `estatusDocumento`, `fechaRegistroDocumento`, `codigoCaso`) VALUES
('DOC-00001', 'kimetsu_1780681023.png', 'imagen', 'foto de tanjiro', 'Activo', '2026-06-05', NULL),
('DOC-00002', 'base_de_datos_1780681786.pdf', 'documento', 'teoria de base de datos MR', 'Activo', '2026-06-05', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_expedientes`
--

CREATE TABLE `tbl_expedientes` (
  `codigoExpediente` varchar(10) NOT NULL,
  `numeroExpediente` varchar(100) DEFAULT NULL,
  `origenExpediente` varchar(15) NOT NULL,
  `fechaAperturaExpediente` date NOT NULL DEFAULT current_timestamp(),
  `codigoCliente` varchar(10) NOT NULL,
  `codigoArchivador` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_expedientes`
--

INSERT INTO `tbl_expedientes` (`codigoExpediente`, `numeroExpediente`, `origenExpediente`, `fechaAperturaExpediente`, `codigoCliente`, `codigoArchivador`) VALUES
('EXP-00001', '232323323', '', '0000-00-00', 'CLI-00001', 'ARC-00001'),
('EXP-00002', '2342343', '', '2026-06-03', 'CLI-00001', 'ARC-00003');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_honorariopagos`
--

CREATE TABLE `tbl_honorariopagos` (
  `codigoPago` varchar(10) NOT NULL,
  `conceptoPago` varchar(100) NOT NULL,
  `montoPago` decimal(20,2) NOT NULL,
  `metodoPago` varchar(15) NOT NULL,
  `fechaRegistroPago` datetime NOT NULL DEFAULT current_timestamp(),
  `observacionesPago` text DEFAULT NULL,
  `estatusPago` varchar(10) NOT NULL,
  `codigoHonorario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_honorariopagos`
--

INSERT INTO `tbl_honorariopagos` (`codigoPago`, `conceptoPago`, `montoPago`, `metodoPago`, `fechaRegistroPago`, `observacionesPago`, `estatusPago`, `codigoHonorario`) VALUES
('PAG-00001', 'e', 443.00, 'Transferencia', '2026-06-01 17:25:12', '', 'Confirmado', 'HON-00001'),
('PAG-00002', '4000', 4000.00, 'Pago Móvil', '2026-06-01 17:25:44', '', 'Confirmado', 'HON-00001'),
('PAG-00003', 'prue', 120.00, 'Efectivo', '2026-06-02 12:04:25', NULL, 'Rechazado', 'HON-00001'),
('PAG-00004', 'prueba', 199.00, 'Transferencia', '2026-06-03 21:46:49', NULL, 'Rechazado', 'HON-00002'),
('PAG-00005', 'cualquier cosa', 120.00, 'Efectivo', '2026-06-05 13:07:49', 'nada', 'Confirmado', 'HON-00002');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_honorarios`
--

CREATE TABLE `tbl_honorarios` (
  `codigoHonorario` varchar(10) NOT NULL,
  `montoInicialHonorario` decimal(20,2) NOT NULL,
  `fechaAcuerdoHonorario` date NOT NULL DEFAULT current_timestamp(),
  `estatusHonorario` varchar(10) NOT NULL,
  `codigoCaso` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_honorarios`
--

INSERT INTO `tbl_honorarios` (`codigoHonorario`, `montoInicialHonorario`, `fechaAcuerdoHonorario`, `estatusHonorario`, `codigoCaso`) VALUES
('HON-00001', 3443.00, '2026-06-01', 'Pendiente', 'CAS-00001'),
('HON-00002', 2000.00, '2026-06-03', 'Confirmado', 'CAS-00002');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_representantes`
--

CREATE TABLE `tbl_representantes` (
  `cedulaRepresentante` int(10) NOT NULL,
  `nacionalidadRepresentante` char(1) NOT NULL,
  `nombreRepresentante` varchar(40) NOT NULL,
  `apellidoRepresentante` varchar(40) NOT NULL,
  `telefonoRepresentante` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_representantesjuridicos`
--

CREATE TABLE `tbl_representantesjuridicos` (
  `codigoCliente` varchar(10) NOT NULL,
  `cedulaRepresentante` int(10) NOT NULL,
  `rolRepresentanteJuridico` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_requisitos`
--

CREATE TABLE `tbl_requisitos` (
  `codigoRequisito` varchar(10) NOT NULL,
  `nombreRequisito` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_requisitostramites`
--

CREATE TABLE `tbl_requisitostramites` (
  `codigoTramite` varchar(10) NOT NULL,
  `codigoRequisitos` varchar(10) NOT NULL,
  `esObligatorioRequisitoTramite` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tramites`
--

CREATE TABLE `tbl_tramites` (
  `codigoTramite` varchar(10) NOT NULL,
  `nombreTramite` varchar(100) NOT NULL,
  `descripcionTramite` text DEFAULT NULL,
  `montoBaseTramite` decimal(20,2) NOT NULL,
  `estatusTramite` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_tramites`
--

INSERT INTO `tbl_tramites` (`codigoTramite`, `nombreTramite`, `descripcionTramite`, `montoBaseTramite`, `estatusTramite`) VALUES
('TRA-00003', 'tramite 54-456-ghfhfg', 'cualquier cosa', 500.00, 'Activo'),
('TRM-00001', 'Demanda', 'cualquier cosa', 250.00, 'Inactivo'),
('TRM-00002', 'compra-venta', 'cualquier cosa', 200.00, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `codigoUsuario` varchar(10) NOT NULL,
  `cedulaUsuario` varchar(20) NOT NULL,
  `nombreUsuario` varchar(40) NOT NULL,
  `apellidoUsuario` varchar(40) NOT NULL,
  `rolUsuario` varchar(20) NOT NULL,
  `claveUsuario` varchar(200) NOT NULL,
  `fechaRegistroUsuario` date NOT NULL,
  `estatusUsuario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`codigoUsuario`, `cedulaUsuario`, `nombreUsuario`, `apellidoUsuario`, `rolUsuario`, `claveUsuario`, `fechaRegistroUsuario`, `estatusUsuario`) VALUES
('USU-001', '12345678', 'admin', 'admin', 'administrador', 'admin123', '2026-06-02', 'Activo'),
('USU-002', '12345679', 'secretaria', 'secretaria', 'secretaria', 'secretaria123', '2026-06-02', 'Activo'),
('USU-003', '12345670', 'abogado', 'abogado', 'abogado', 'abogado123', '2026-06-02', 'Activo'),
('USU-004', '32266365', 'jhonny', 'davila', 'administrador', 'jhonny123', '2026-06-03', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_abogados`
--
ALTER TABLE `tbl_abogados`
  ADD PRIMARY KEY (`cedulaAbogado`);

--
-- Indices de la tabla `tbl_archivadores`
--
ALTER TABLE `tbl_archivadores`
  ADD PRIMARY KEY (`codigoArchivador`);

--
-- Indices de la tabla `tbl_casoeventos`
--
ALTER TABLE `tbl_casoeventos`
  ADD PRIMARY KEY (`codigoEvento`),
  ADD KEY `codigoCaso` (`codigoCaso`);

--
-- Indices de la tabla `tbl_casogastos`
--
ALTER TABLE `tbl_casogastos`
  ADD PRIMARY KEY (`codigoGasto`),
  ADD KEY `codigoCaso` (`codigoCaso`);

--
-- Indices de la tabla `tbl_casos`
--
ALTER TABLE `tbl_casos`
  ADD PRIMARY KEY (`codigoCaso`),
  ADD KEY `codigoExpediente` (`codigoExpediente`);

--
-- Indices de la tabla `tbl_casosabogados`
--
ALTER TABLE `tbl_casosabogados`
  ADD PRIMARY KEY (`cedulaAbogado`,`codigoCaso`),
  ADD KEY `cedulaAbogado` (`cedulaAbogado`),
  ADD KEY `codigoCaso` (`codigoCaso`);

--
-- Indices de la tabla `tbl_casostramites`
--
ALTER TABLE `tbl_casostramites`
  ADD PRIMARY KEY (`codigoCaso`,`codigoTramite`),
  ADD KEY `codigoCaso` (`codigoCaso`,`codigoTramite`),
  ADD KEY `codigoTramite` (`codigoTramite`);

--
-- Indices de la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  ADD PRIMARY KEY (`codigoCliente`);

--
-- Indices de la tabla `tbl_clientesjuridicos`
--
ALTER TABLE `tbl_clientesjuridicos`
  ADD PRIMARY KEY (`codigoCliente`),
  ADD UNIQUE KEY `rifClienteJuridico` (`rifClienteJuridico`),
  ADD KEY `codigoCliente` (`codigoCliente`);

--
-- Indices de la tabla `tbl_clientesnaturales`
--
ALTER TABLE `tbl_clientesnaturales`
  ADD PRIMARY KEY (`codigoCliente`),
  ADD UNIQUE KEY `cedulaClienteNatural` (`cedulaClienteNatural`),
  ADD KEY `codigoCliente` (`codigoCliente`);

--
-- Indices de la tabla `tbl_clientestelefonos`
--
ALTER TABLE `tbl_clientestelefonos`
  ADD PRIMARY KEY (`codigoCliente`),
  ADD KEY `codigoCliente` (`codigoCliente`);

--
-- Indices de la tabla `tbl_documentos`
--
ALTER TABLE `tbl_documentos`
  ADD PRIMARY KEY (`codigoDocumento`),
  ADD KEY `codigoCaso` (`codigoCaso`);

--
-- Indices de la tabla `tbl_expedientes`
--
ALTER TABLE `tbl_expedientes`
  ADD PRIMARY KEY (`codigoExpediente`),
  ADD UNIQUE KEY `numeroExpediente` (`numeroExpediente`),
  ADD KEY `codigoArchivador` (`codigoArchivador`),
  ADD KEY `codigoCliente` (`codigoCliente`);

--
-- Indices de la tabla `tbl_honorariopagos`
--
ALTER TABLE `tbl_honorariopagos`
  ADD PRIMARY KEY (`codigoPago`),
  ADD KEY `codigoHonorario` (`codigoHonorario`);

--
-- Indices de la tabla `tbl_honorarios`
--
ALTER TABLE `tbl_honorarios`
  ADD PRIMARY KEY (`codigoHonorario`),
  ADD UNIQUE KEY `codigoCaso_2` (`codigoCaso`),
  ADD KEY `codigoCaso` (`codigoCaso`),
  ADD KEY `codigoCaso_3` (`codigoCaso`);

--
-- Indices de la tabla `tbl_representantes`
--
ALTER TABLE `tbl_representantes`
  ADD PRIMARY KEY (`cedulaRepresentante`);

--
-- Indices de la tabla `tbl_representantesjuridicos`
--
ALTER TABLE `tbl_representantesjuridicos`
  ADD PRIMARY KEY (`codigoCliente`,`cedulaRepresentante`),
  ADD KEY `codigoCliente` (`codigoCliente`),
  ADD KEY `cedulaRepresentante` (`cedulaRepresentante`);

--
-- Indices de la tabla `tbl_requisitos`
--
ALTER TABLE `tbl_requisitos`
  ADD PRIMARY KEY (`codigoRequisito`);

--
-- Indices de la tabla `tbl_requisitostramites`
--
ALTER TABLE `tbl_requisitostramites`
  ADD PRIMARY KEY (`codigoTramite`,`codigoRequisitos`),
  ADD KEY `codigoTramite` (`codigoTramite`,`codigoRequisitos`),
  ADD KEY `codigoRequisitos` (`codigoRequisitos`);

--
-- Indices de la tabla `tbl_tramites`
--
ALTER TABLE `tbl_tramites`
  ADD PRIMARY KEY (`codigoTramite`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`codigoUsuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_casoeventos`
--
ALTER TABLE `tbl_casoeventos`
  ADD CONSTRAINT `tbl_casoeventos_ibfk_1` FOREIGN KEY (`codigoCaso`) REFERENCES `tbl_casos` (`codigoCaso`);

--
-- Filtros para la tabla `tbl_casogastos`
--
ALTER TABLE `tbl_casogastos`
  ADD CONSTRAINT `tbl_casogastos_ibfk_1` FOREIGN KEY (`codigoCaso`) REFERENCES `tbl_casos` (`codigoCaso`);

--
-- Filtros para la tabla `tbl_casos`
--
ALTER TABLE `tbl_casos`
  ADD CONSTRAINT `tbl_casos_ibfk_1` FOREIGN KEY (`codigoExpediente`) REFERENCES `tbl_expedientes` (`codigoExpediente`);

--
-- Filtros para la tabla `tbl_casosabogados`
--
ALTER TABLE `tbl_casosabogados`
  ADD CONSTRAINT `tbl_casosabogados_ibfk_1` FOREIGN KEY (`codigoCaso`) REFERENCES `tbl_casos` (`codigoCaso`),
  ADD CONSTRAINT `tbl_casosabogados_ibfk_2` FOREIGN KEY (`cedulaAbogado`) REFERENCES `tbl_abogados` (`cedulaAbogado`);

--
-- Filtros para la tabla `tbl_casostramites`
--
ALTER TABLE `tbl_casostramites`
  ADD CONSTRAINT `tbl_casostramites_ibfk_1` FOREIGN KEY (`codigoCaso`) REFERENCES `tbl_casos` (`codigoCaso`),
  ADD CONSTRAINT `tbl_casostramites_ibfk_2` FOREIGN KEY (`codigoTramite`) REFERENCES `tbl_tramites` (`codigoTramite`);

--
-- Filtros para la tabla `tbl_clientesjuridicos`
--
ALTER TABLE `tbl_clientesjuridicos`
  ADD CONSTRAINT `tbl_clientesjuridicos_ibfk_1` FOREIGN KEY (`codigoCliente`) REFERENCES `tbl_clientes` (`codigoCliente`);

--
-- Filtros para la tabla `tbl_clientesnaturales`
--
ALTER TABLE `tbl_clientesnaturales`
  ADD CONSTRAINT `tbl_clientesnaturales_ibfk_1` FOREIGN KEY (`codigoCliente`) REFERENCES `tbl_clientes` (`codigoCliente`);

--
-- Filtros para la tabla `tbl_clientestelefonos`
--
ALTER TABLE `tbl_clientestelefonos`
  ADD CONSTRAINT `tbl_clientestelefonos_ibfk_1` FOREIGN KEY (`codigoCliente`) REFERENCES `tbl_clientes` (`codigoCliente`);

--
-- Filtros para la tabla `tbl_documentos`
--
ALTER TABLE `tbl_documentos`
  ADD CONSTRAINT `tbl_documentos_ibfk_1` FOREIGN KEY (`codigoCaso`) REFERENCES `tbl_casos` (`codigoCaso`);

--
-- Filtros para la tabla `tbl_expedientes`
--
ALTER TABLE `tbl_expedientes`
  ADD CONSTRAINT `tbl_expedientes_ibfk_1` FOREIGN KEY (`codigoArchivador`) REFERENCES `tbl_archivadores` (`codigoArchivador`),
  ADD CONSTRAINT `tbl_expedientes_ibfk_2` FOREIGN KEY (`codigoCliente`) REFERENCES `tbl_clientes` (`codigoCliente`);

--
-- Filtros para la tabla `tbl_honorariopagos`
--
ALTER TABLE `tbl_honorariopagos`
  ADD CONSTRAINT `tbl_honorariopagos_ibfk_1` FOREIGN KEY (`codigoHonorario`) REFERENCES `tbl_honorarios` (`codigoHonorario`);

--
-- Filtros para la tabla `tbl_honorarios`
--
ALTER TABLE `tbl_honorarios`
  ADD CONSTRAINT `tbl_honorarios_ibfk_1` FOREIGN KEY (`codigoCaso`) REFERENCES `tbl_casos` (`codigoCaso`);

--
-- Filtros para la tabla `tbl_representantesjuridicos`
--
ALTER TABLE `tbl_representantesjuridicos`
  ADD CONSTRAINT `tbl_representantesjuridicos_ibfk_1` FOREIGN KEY (`cedulaRepresentante`) REFERENCES `tbl_representantes` (`cedulaRepresentante`),
  ADD CONSTRAINT `tbl_representantesjuridicos_ibfk_2` FOREIGN KEY (`codigoCliente`) REFERENCES `tbl_clientesjuridicos` (`codigoCliente`);

--
-- Filtros para la tabla `tbl_requisitostramites`
--
ALTER TABLE `tbl_requisitostramites`
  ADD CONSTRAINT `tbl_requisitostramites_ibfk_1` FOREIGN KEY (`codigoRequisitos`) REFERENCES `tbl_requisitos` (`codigoRequisito`),
  ADD CONSTRAINT `tbl_requisitostramites_ibfk_2` FOREIGN KEY (`codigoTramite`) REFERENCES `tbl_tramites` (`codigoTramite`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
