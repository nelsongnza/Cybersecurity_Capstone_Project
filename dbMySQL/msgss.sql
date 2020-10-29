-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-10-2020 a las 17:22:20
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `msgss`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_messr`
--

CREATE TABLE `tb_messr` (
  `id` bigint(20) NOT NULL COMMENT 'primary key',
  `idsender` int(11) NOT NULL COMMENT 'User sender id',
  `idreceiver` int(11) NOT NULL COMMENT 'User receiver id',
  `mssag` text COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'message',
  `datesent` datetime NOT NULL COMMENT 'Date when sent',
  `status` varchar(1) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'Estatus E for enabled D for Disabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_reclog`
--

CREATE TABLE `tb_reclog` (
  `id` bigint(20) NOT NULL COMMENT 'primary key',
  `iduser` int(11) NOT NULL COMMENT 'User id',
  `datelog` datetime NOT NULL COMMENT 'Date record',
  `action` varchar(1) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'Type of record I-ingress S-send',
  `status` varchar(1) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'status of record E-enabled D-disabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_user`
--

CREATE TABLE `tb_user` (
  `id` bigint(20) NOT NULL COMMENT 'primary key',
  `usser` text COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'md5 from user',
  `lapassw` text COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'md5 from password',
  `regdate` datetime NOT NULL COMMENT 'Insert or Registered date',
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'User estate E for enabled D for disabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_messr`
--
ALTER TABLE `tb_messr`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_reclog`
--
ALTER TABLE `tb_reclog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_messr`
--
ALTER TABLE `tb_messr`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'primary key';

--
-- AUTO_INCREMENT de la tabla `tb_reclog`
--
ALTER TABLE `tb_reclog`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'primary key';

--
-- AUTO_INCREMENT de la tabla `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'primary key';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
