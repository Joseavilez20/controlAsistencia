-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2019 at 07:52 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_asistencias`
--

-- --------------------------------------------------------

--
-- Table structure for table `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(11) NOT NULL,
  `codigo_estudiante` varchar(30) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asistencias`
--

INSERT INTO `asistencias` (`id`, `codigo_estudiante`, `fecha`, `foto`) VALUES
(16, '333', '2019-07-24 21:47:11', ''),
(20, '333', '2019-08-01 00:48:04', 'vistas/img.jpg'),
(21, '666', '2019-08-01 00:49:01', 'vista/img/estudiante.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `nombre_estudiante` varchar(40) NOT NULL,
  `nombre_acudiente` varchar(40) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `codigo`, `nombre_estudiante`, `nombre_acudiente`, `correo`, `foto`) VALUES
(43, '556', 'Laura Argumedo', 'Felipa Payares', 'Felipapayares@gmail.com', 'vistas/img/estudiantes/556/281.jpg'),
(44, '666', 'Carlos Mirsa', 'Ernestor Martinez', 'joseavilesmnt@gmail.com', 'vistas/img/estudiantes/666/193.jpg'),
(45, '333', 'Felipe Antonio Gonzales Ramirez', 'Oscar Gonzales Miranda', 'OscarMiranda@gmail.com', 'vistas/img/estudiantes/333/335.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `perfil` varchar(30) NOT NULL,
  `foto` text NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `key_recovery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `email`, `perfil`, `foto`, `fecha_registro`, `key_recovery`) VALUES
(1, 'Admin', 'admin123', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'admin@correo.com', 'admin', '', '2019-07-31 23:56:08', '$2a$07$asxx54ahjppf45sd87a5aueX7snoKFRoMW.q2EL3ooqwQJK8fLQ/S'),
(5, 'Admin2', 'admin', '$2a$07$asxx54ahjppf45sd87a5au6bXOknQKFttqhe/at/VzHN.sPonHPFW', 'admin2@correo.gmail.com', 'Administrador', '', '2019-07-27 19:51:34', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
