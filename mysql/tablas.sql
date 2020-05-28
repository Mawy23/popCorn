-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2020 a las 21:45:26
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `popcorn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombreUsuario` varchar(15) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `password` varchar(80) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombreUsuario`, `nombre`, `password`, `admin`) VALUES
(1, 'fernando', 'fernando', '$2y$10$Vh7ShnLPb42ZwdlqGXsH/Oy.wza5sFkgGyu8Ra7JgcYZbE3o56A8.', 0),
(2, 'francisco', 'francisco', '$2y$10$eZP7GWEQbEYG/Mmqz0JLged9AZFrdmdG6wjknz04jls25KtUyWBTy', 0),
(3, 'carassss', 'caraculo', '$2y$10$7FOnIytNs./nvl9BfBRDv.hG2OdM.vwtO6HkwVAr3PhYnI2Df86YC', 0),
(4, 'daniel', 'daniel', '$2y$10$4pjn0KMB1eMP.UF03t1lW.6rZb.zKgdSnWQaffDJcaOMPbuwZ891K', 0),
(5, 'daniel', 'daniel', '$2y$10$sgHYcrQ9fuS2Mpdo2wFUWuxnGuQbF.VwhOBW7OwJvxqZqPbxsGj.a', 0),
(6, 'luisin', 'luisin', '$2y$10$CbBqPbIEWAKn5pg3sBDLLO9Fez3yXiWdggOsNHl4syiEBaWI05I1a', 0),
(7, 'miguel', 'miguel', '$2y$10$vus354A63h9ndl0N7aQrpeySft74AEQ8rYOj1wP/VsksDi.RRBlxS', 0),
(8, 'tomas', 'tomas', '$2y$10$Mf5REF6UZ4abtvOGe1rwBukvLeLttvyzc7We0ikG9dlYVY4EJ2cCi', 0),
(9, 'eustaquio', 'eustaquio', '$2y$10$VFlyt37WnFb0m1k9wezly.35r73eTQQCiAb4UaL6ODD4eqDWI79Ui', 1),
(14, 'Vinicius', 'manta', '$2y$10$bLPq28c78J.e7RmtbKvi0.USiRTyHURy5RWia2qQiE1j/F5NaPoNC', 1),
(15, 'lorne Balfe', 'Lorne', '$2y$10$IgG5RYzpbbJjQJtcd5hYCOst68D0l4vv94MmWKH2jDv.PJfGwmgWa', 0),
(16, 'Final', 'Fin', '$2y$10$rsoSaq/a8UwuCH2loIC1O.2cR1842bnxJQP0dN40S9LtfcZgKfUJK', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
