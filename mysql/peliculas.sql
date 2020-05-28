-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2020 a las 21:45:03
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
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `nombre` varchar(50) NOT NULL,
  `productora` varchar(50) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `edades` varchar(50) NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`nombre`, `productora`, `genero`, `edades`, `link`) VALUES
('Detective Pikachu', 'Nintendo', 'Entretenimiento', '+3', 'https://www.filmaffinity.com/es/film351741.html'),
('Gran Torino', 'Village Roadshow Pictures', 'Drama/Suspense', '+16', 'https://www.filmaffinity.com/es/film539054.html'),
('Dumbo', 'Walt Disney Pictures', 'Entretenimiento', '+3', 'https://www.filmaffinity.com/es/film740441.html'),
('Fast and Furious 5', 'Universal Pictures', 'Accion', '+12', 'https://www.filmaffinity.com/es/film296319.html'),
('Buscando a Nemo', 'Walt Disney Pictures', 'Animacion', 'Todos los publicos', 'https://www.filmaffinity.com/es/film479365.html'),
('Up', 'Walt Disney ', 'Animacion', 'Todos los publicos', 'https://www.filmaffinity.com/es/film777460.html'),
('Harry Potter y la Piedra Filosofal', 'Warner Bros. Pictures ', 'AnimaciÃ³n', '+7', 'https://www.filmaffinity.com/es/film423821.html'),
('El seÃ±or de los anillos: La comunidad del anillo', 'Wingnut Films', 'Fantastico', '+12', 'https://www.filmaffinity.com/es/film750283.html'),
('The Equalizer 2', 'Columbia Pictures', 'Thriller', '+12', 'https://www.filmaffinity.com/es/film806482.html'),
('It', 'New Line Cinema', 'Terror', '+18', 'https://www.filmaffinity.com/es/film312346.html');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
