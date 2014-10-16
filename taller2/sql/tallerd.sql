-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2014 a las 20:45:40
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tallerd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
  `idU` int(11) NOT NULL,
  `idP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`idU`, `idP`) VALUES
(1, 1),
(1, 1),
(17, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `idU` int(11) NOT NULL,
  `idP` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`idU`, `idP`, `fecha`) VALUES
(1, 2, '2014-10-15'),
(1, 2, '2014-10-15'),
(6, 1, '2014-10-16'),
(6, 2, '2014-10-16'),
(6, 3, '2014-10-16'),
(15, 2, '2014-10-16'),
(15, 3, '2014-10-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `nombreP` varchar(400) NOT NULL,
  `idP` int(11) NOT NULL AUTO_INCREMENT,
  `precio` int(11) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `compras` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `idT` int(11) NOT NULL,
  `info` varchar(400) NOT NULL,
  PRIMARY KEY (`idP`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`nombreP`, `idP`, `precio`, `foto`, `compras`, `tipo`, `idT`, `info`) VALUES
('cuaderno', 1, 5000, 'cuaderno1.jpg', 4, 'papelería', 1, 'esto es un cuaderno de ultima generación'),
('libro', 2, 2000, 'libro1.jpg', 2, 'papelería', 1, 'esto es un libro viejo'),
('borrador', 3, 500000, 'borrador1.jpg', 2, 'papelería', 1, 'esto es un borrador revolucionario!!!'),
('arroz', 4, 15000, 'arroz1.jpg', 3, 'comida', 3, 'unas sobras de mi almuerzo =) '),
('lupa', 5, 3000, 'lupa1.jpg', 1, 'papelería', 1, 'sirve para quemar cositas con el sol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nombre` varchar(30) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `idU` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idU`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `contrasena`, `idU`) VALUES
('juan', '123456', 1),
('pedro', '456123', 2),
('carlos', '654321', 3),
('camilo ', '1111 ', 4),
('juans ', '2222 ', 5),
('aaa ', 'aaa ', 6),
('bbb ', 'bbb ', 7),
('aaasd ', 'aaasd ', 8),
('asd ', 'asd ', 9),
('aaaaaa ', 'aaaaaaa ', 10),
('qwe ', 'qwe ', 11),
('qqq ', 'qqq ', 12),
('qqqqww ', 'qqwqqw ', 13),
('juansss ', 'sss ', 14),
('nico ', 'aaaaa ', 15),
('qqqqqqqqq ', 'qqqqqqqqqqqq ', 16),
('aaaaaaaaaaaaaaaaa ', 'aaaaaaaaaaaaaaaaaaaaaa ', 17),
('juanw ', 'www ', 18),
(' ', ' ', 19),
('aaaa ', 'aaaa ', 20);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
