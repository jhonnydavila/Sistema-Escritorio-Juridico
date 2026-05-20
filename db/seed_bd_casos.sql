-- Dump completo para bd_casos
-- Ejecutar en MySQL/MariaDB para crear la base de datos y poblarla con la estructura del MER.

DROP DATABASE IF EXISTS `bd_casos`;
CREATE DATABASE `bd_casos` CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `bd_casos`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- -------------------------------------------
-- Tablas maestras y de referencia
-- -------------------------------------------

DROP TABLE IF EXISTS `tbl_representantes`;
CREATE TABLE `tbl_representantes` (
  `cedulaRepresentante` int(11) NOT NULL,
  `nombreRepresentante` varchar(40) NOT NULL,
  `apellidoRepresentante` varchar(40) NOT NULL,
  PRIMARY KEY (`cedulaRepresentante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

DROP TABLE IF EXISTS `tbl_archivadores`;
CREATE TABLE `tbl_archivadores` (
  `numeroArchivador` varchar(20) NOT NULL,
  `descripcionArchivador` text NOT NULL,
  `estatusArchivador` varchar(20) NOT NULL,
  PRIMARY KEY (`numeroArchivador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

DROP TABLE IF EXISTS `tbl_documentos`;
CREATE TABLE `tbl_documentos` (
  `codigoDocumento` varchar(20) NOT NULL,
  `nombreDocumento` varchar(40) NOT NULL,
  `tipoDocumento` varchar(20) NOT NULL,
  `descripcionDocumento` text NOT NULL,
  `estatusDocumento` varchar(20) NOT NULL,
  PRIMARY KEY (`codigoDocumento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

DROP TABLE IF EXISTS `tbl_abogados`;
CREATE TABLE `tbl_abogados` (
  `cedulaAbogado` int(20) NOT NULL,
  `nombreAbogado` varchar(40) NOT NULL,
  `apellidoAbogado` varchar(40) NOT NULL,
  `direccionAbogado` text NOT NULL,
  `estatusAbogado` varchar(20) NOT NULL,
  `telefonoAbogado` varchar(20) NOT NULL,
  `correoAbogado` varchar(200) NOT NULL,
  PRIMARY KEY (`cedulaAbogado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

DROP TABLE IF EXISTS `tbl_clientes`;
CREATE TABLE `tbl_clientes` (
  `codigoCliente` varchar(20) NOT NULL,
  `correoCliente` varchar(200) NOT NULL,
  `direccionCliente` text NOT NULL,
  `estatusCliente` varchar(20) NOT NULL,
  `fechaRegistroCliente` date NOT NULL,
  `tipoCliente` varchar(20) NOT NULL,
  PRIMARY KEY (`codigoCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

DROP TABLE IF EXISTS `tbl_clientesnaturales`;
CREATE TABLE `tbl_clientesnaturales` (
  `codigoCliente` varchar(20) NOT NULL,
  `nombreClienteNatural` varchar(40) NOT NULL,
  `apellidoClienteNatural` varchar(40) NOT NULL,
  `cedulaClienteNatural` int(20) NOT NULL,
  `nacionalidadClienteNatural` char(1) NOT NULL,
  `fechaNacimientoClienteNatural` date NOT NULL,
  `estadoCivilClienteNatural` varchar(20) NOT NULL,
  PRIMARY KEY (`codigoCliente`),
  CONSTRAINT `fk_clientesnaturales_clientes` FOREIGN KEY (`codigoCliente`) REFERENCES `tbl_clientes` (`codigoCliente`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

DROP TABLE IF EXISTS `tbl_clientesjuridicos`;
CREATE TABLE `tbl_clientesjuridicos` (
  `codigoCliente` varchar(20) NOT NULL,
  `cedulaRepresentante` int(20) NOT NULL,
  `razonSocialClienteJuridico` varchar(100) NOT NULL,
  `fechaConstitucionClienteJuridico` date NOT NULL,
  `rifClienteJuridico` int(11) NOT NULL,
  PRIMARY KEY (`codigoCliente`),
  CONSTRAINT `fk_clientesjuridicos_clientes` FOREIGN KEY (`codigoCliente`) REFERENCES `tbl_clientes` (`codigoCliente`) ON DELETE CASCADE,
  CONSTRAINT `fk_clientesjuridicos_representantes` FOREIGN KEY (`cedulaRepresentante`) REFERENCES `tbl_representantes` (`cedulaRepresentante`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

DROP TABLE IF EXISTS `tbl_clientestelefonos`;
CREATE TABLE `tbl_clientestelefonos` (
  `idClienteTelefono` int(10) NOT NULL AUTO_INCREMENT,
  `codigoCliente` varchar(20) NOT NULL,
  `numeroClienteTelefono` varchar(20) NOT NULL,
  PRIMARY KEY (`idClienteTelefono`),
  CONSTRAINT `fk_clientestelefonos_clientes` FOREIGN KEY (`codigoCliente`) REFERENCES `tbl_clientes` (`codigoCliente`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- -------------------------------------------
-- Tablas de casos, expedientes y movimientos
-- -------------------------------------------

DROP TABLE IF EXISTS `tbl_casos`;
CREATE TABLE `tbl_casos` (
  `codigoCaso` varchar(20) NOT NULL,
  `fechaFinCaso` date DEFAULT NULL,
  `fechaInicioCaso` date NOT NULL,
  `cotizacionInicialCaso` decimal(20,2) NOT NULL,
  `estatusCaso` varchar(20) NOT NULL,
  `tipoCaso` varchar(20) NOT NULL,
  `descripcionCaso` text NOT NULL,
  `codigoCliente` varchar(20) NOT NULL,
  PRIMARY KEY (`codigoCaso`),
  CONSTRAINT `fk_casos_clientes` FOREIGN KEY (`codigoCliente`) REFERENCES `tbl_clientes` (`codigoCliente`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

DROP TABLE IF EXISTS `tbl_casosabogados`;
CREATE TABLE `tbl_casosabogados` (
  `cedulaAbogado` int(20) NOT NULL,
  `codigoCaso` varchar(20) NOT NULL,
  `fechaAsignacionCasoAbogado` date NOT NULL,
  `estatusAsignacionCasoAbogado` varchar(20) NOT NULL,
  PRIMARY KEY (`cedulaAbogado`,`codigoCaso`),
  CONSTRAINT `fk_casosabogados_abogado` FOREIGN KEY (`cedulaAbogado`) REFERENCES `tbl_abogados` (`cedulaAbogado`) ON DELETE CASCADE,
  CONSTRAINT `fk_casosabogados_casos` FOREIGN KEY (`codigoCaso`) REFERENCES `tbl_casos` (`codigoCaso`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

DROP TABLE IF EXISTS `tbl_casopagos`;
CREATE TABLE `tbl_casopagos` (
  `codigoPago` varchar(20) NOT NULL,
  `codigoCaso` varchar(20) NOT NULL,
  `estatusPago` int(20) NOT NULL,
  `observacionesPago` text DEFAULT NULL,
  `conceptoPago` varchar(100) NOT NULL,
  `montoPago` decimal(20,2) NOT NULL,
  `metodoPago` varchar(20) NOT NULL,
  `fechaPago` date NOT NULL,
  PRIMARY KEY (`codigoPago`,`codigoCaso`),
  KEY `codigoCaso` (`codigoCaso`),
  CONSTRAINT `fk_casopagos_casos` FOREIGN KEY (`codigoCaso`) REFERENCES `tbl_casos` (`codigoCaso`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

DROP TABLE IF EXISTS `tbl_casogastos`;
CREATE TABLE `tbl_casogastos` (
  `codigoGasto` varchar(20) NOT NULL,
  `codigoCaso` varchar(20) NOT NULL,
  `descripcionGasto` text NOT NULL,
  `montoGasto` decimal(20,2) NOT NULL,
  `fechaGasto` date NOT NULL,
  PRIMARY KEY (`codigoGasto`,`codigoCaso`),
  KEY `codigoCaso` (`codigoCaso`),
  CONSTRAINT `fk_casogastos_casos` FOREIGN KEY (`codigoCaso`) REFERENCES `tbl_casos` (`codigoCaso`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

DROP TABLE IF EXISTS `tbl_casoapuntes`;
CREATE TABLE `tbl_casoapuntes` (
  `idCasoApunte` int(10) NOT NULL AUTO_INCREMENT,
  `apunteCasoApunte` text NOT NULL,
  `codigoCaso` varchar(20) NOT NULL,
  PRIMARY KEY (`idCasoApunte`),
  KEY `codigoCaso` (`codigoCaso`),
  CONSTRAINT `fk_casoapuntes_casos` FOREIGN KEY (`codigoCaso`) REFERENCES `tbl_casos` (`codigoCaso`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

DROP TABLE IF EXISTS `tbl_eventos`;
CREATE TABLE `tbl_eventos` (
  `codigoEvento` varchar(20) NOT NULL,
  `descripcionEvento` text NOT NULL,
  `tituloEvento` varchar(100) NOT NULL,
  `estatusEvento` varchar(20) NOT NULL,
  `tipoEvento` varchar(20) NOT NULL,
  `fechaEvento` date NOT NULL,
  `codigoCaso` varchar(20) NOT NULL,
  PRIMARY KEY (`codigoEvento`),
  KEY `codigoCaso` (`codigoCaso`),
  CONSTRAINT `fk_eventos_casos` FOREIGN KEY (`codigoCaso`) REFERENCES `tbl_casos` (`codigoCaso`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

DROP TABLE IF EXISTS `tbl_expedientes`;
CREATE TABLE `tbl_expedientes` (
  `identificadorExpediente` varchar(20) NOT NULL,
  `numeroExpediente` varchar(20) NOT NULL,
  `descripcionExpediente` varchar(200) NOT NULL,
  `fechaAperturaExpediente` date NOT NULL,
  `accionLegalExpediente` varchar(200) NOT NULL,
  `numeroArchivador` varchar(20) NOT NULL,
  `codigoCaso` varchar(20) NOT NULL,
  PRIMARY KEY (`identificadorExpediente`),
  CONSTRAINT `fk_expedientes_archivadores` FOREIGN KEY (`numeroArchivador`) REFERENCES `tbl_archivadores` (`numeroArchivador`) ON DELETE RESTRICT,
  CONSTRAINT `fk_expedientes_casos` FOREIGN KEY (`codigoCaso`) REFERENCES `tbl_casos` (`codigoCaso`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

DROP TABLE IF EXISTS `tbl_expedientedocumentos`;
CREATE TABLE `tbl_expedientedocumentos` (
  `codigoDocumento` varchar(20) NOT NULL,
  `identificadorExpediente` varchar(20) NOT NULL,
  `fechaAnexoExpedienteDocumento` date NOT NULL,
  PRIMARY KEY (`codigoDocumento`,`identificadorExpediente`),
  CONSTRAINT `fk_expedientedocumentos_documentos` FOREIGN KEY (`codigoDocumento`) REFERENCES `tbl_documentos` (`codigoDocumento`) ON DELETE RESTRICT,
  CONSTRAINT `fk_expedientedocumentos_expedientes` FOREIGN KEY (`identificadorExpediente`) REFERENCES `tbl_expedientes` (`identificadorExpediente`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

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

-- -------------------------------------------
-- Datos de ejemplo para el seed
-- -------------------------------------------

INSERT INTO `tbl_representantes` VALUES
(1001, 'Carlos', 'García'),
(1002, 'Ana', 'Martínez');

INSERT INTO `tbl_archivadores` VALUES
('ARC-001', 'Archivador principal del despacho', 'Activo'),
('ARC-002', 'Archivador de expedientes antiguos', 'Archivado');

INSERT INTO `tbl_documentos` VALUES
('DOC-001', 'Contrato inicial', 'Contrato', 'Contrato firmado con cliente', 'Activo'),
('DOC-002', 'Prueba documental', 'Anexo', 'Documentos probatorios del caso', 'Activo');

INSERT INTO `tbl_abogados` VALUES
(12345678, 'María', 'López', 'Av. Bolívar 123', 'Activo', '04141234567', 'mlopez@firma.com'),
(87654321, 'Luis', 'Fernández', 'Calle Real 45', 'Activo', '04149876543', 'luisf@firma.com');

INSERT INTO `tbl_clientes` VALUES
('CLI-001', 'juan.perez@mail.com', 'Calle 1, Caracas', 'Activo', '2026-01-10', 'Natural'),
('CLI-002', 'empresa@juridico.com', 'Av. Libertador 800', 'Activo', '2026-02-20', 'Juridico');

INSERT INTO `tbl_clientesnaturales` VALUES
('CLI-001', 'Juan', 'Pérez', 30123456, 'V', '1984-10-12', 'Casado');

INSERT INTO `tbl_clientesjuridicos` VALUES
('CLI-002', 1001, 'Servicios Integrales C.A.', '2019-05-12', 123456789);

INSERT INTO `tbl_clientestelefonos` (`codigoCliente`, `numeroClienteTelefono`) VALUES
('CLI-001', '04141234567'),
('CLI-002', '02125551234');

INSERT INTO `tbl_casos` VALUES
('CAS-001', '2027-10-30', '2026-05-05', 1500.00, 'Abierto', 'Civil', 'Proceso de desalojo y cobranza', 'CLI-001'),
('CAS-002', NULL, '2026-03-18', 4200.00, 'En progreso', 'Laboral', 'Reclamo de indemnización laboral', 'CLI-002');

INSERT INTO `tbl_casosabogados` VALUES
(12345678, 'CAS-001', '2026-05-06', 'Activo'),
(87654321, 'CAS-002', '2026-03-19', 'Activo');

INSERT INTO `tbl_casopagos` VALUES
('PAG-001', 'CAS-001', 1, 'Pago inicial recibido', 'Honorarios iniciales', 500.00, 'Transferencia', '2026-05-07'),
('PAG-002', 'CAS-002', 0, 'Pago pendiente', 'Gastos administrativos', 4200.00, 'Efectivo', '2026-03-20');

INSERT INTO `tbl_casogastos` VALUES
('GAS-001', 'CAS-001', 'Trámites notariales', 120.00, '2026-05-08'),
('GAS-002', 'CAS-002', 'Revisión de contratos', 220.00, '2026-03-21');

INSERT INTO `tbl_casoapuntes` (`apunteCasoApunte`, `codigoCaso`) VALUES
('Se recibió respuesta del juzgado, se solicita ampliación de prueba.', 'CAS-001'),
('Se envió carta de reclamo al empleador.', 'CAS-002');

INSERT INTO `tbl_eventos` VALUES
('EVE-001', 'Audiencia preliminar en tribunal civil', 'Audiencia Civil', 'Programado', 'Audiencia', '2026-06-14', 'CAS-001'),
('EVE-002', 'Cita con cliente para revisión de documentos', 'Revisión con cliente', 'Confirmado', 'Reunión', '2026-05-22', 'CAS-002');

INSERT INTO `tbl_expedientes` VALUES
('EXP-001', 'N-2026-001', 'Expediente vivienda', '2026-05-05', 'Demanda de desalojo', 'ARC-001', 'CAS-001'),
('EXP-002', 'N-2026-002', 'Expediente laboral', '2026-03-18', 'Demanda por despido injustificado', 'ARC-002', 'CAS-002');

INSERT INTO `tbl_expedientedocumentos` VALUES
('DOC-001', 'EXP-001', '2026-05-05'),
('DOC-002', 'EXP-002', '2026-03-19');

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

COMMIT;
