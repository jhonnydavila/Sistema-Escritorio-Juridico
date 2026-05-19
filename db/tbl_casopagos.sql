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
