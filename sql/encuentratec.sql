-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3308
-- Tiempo de generación: 11-11-2024 a las 04:56:24
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
-- Base de datos: `encuentratec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acta_objeto`
--

CREATE TABLE `acta_objeto` (
  `folio_acta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `lugar` varchar(100) NOT NULL,
  `tipo` varchar(40) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `pregunta_seguridad` varchar(150) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `publicado` tinyint(1) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `acta_objeto`
--

INSERT INTO `acta_objeto` (`folio_acta`, `fecha`, `lugar`, `tipo`, `descripcion`, `pregunta_seguridad`, `foto`, `publicado`, `fecha_creacion`) VALUES
(0, '2024-11-10', 'e001', 'sudadera gris', 'sudadera gris talla g', 'estampado y seña particular', 'C:/xampp/htdocs/EncuentraTec/Fotos/logoITVER.png', 1, '2024-11-11 03:36:33'),
(0, '2024-11-10', 'e001', 'sudadera gris', 'sudadera gris talla g', 'estampado y seña particular', 'C:/xampp/htdocs/EncuentraTec/Fotos/logoITVER.png', 1, '2024-11-11 03:36:53'),
(0, '2024-11-10', 'e001', 'sudadera gris', 'sudadera gris talla g', 'estampado y seña particular', 'C:/xampp/htdocs/EncuentraTec/Fotos/logoITVER.png', 1, '2024-11-11 03:37:34'),
(0, '2024-11-10', 'e001', 'sudadera gris', 'sudadera gris talla g', 'estampado y seña particular', 'C:/xampp/htdocs/EncuentraTec/Fotos/logoITVER.png', 1, '2024-11-11 03:39:56'),
(0, '2024-11-10', 'e001', 'sudadera gris', 'sudadera gris talla g', 'estampado y seña particular', 'C:/xampp/htdocs/EncuentraTec/Fotos/logoTECNM.png', 1, '2024-11-11 03:40:07'),
(0, '2024-11-10', 'e001', 'sudadera gris', 'sudadera gris talla g', 'estampado y seña particular', 'C:/xampp/htdocs/EncuentraTec/Fotos/logoTECNM.png', 1, '2024-11-11 03:41:56'),
(0, '2024-11-10', 'e001', 'sudadera gris', 'sudadera gris talla g', 'estampado y seña particular', 'C:/xampp/htdocs/EncuentraTec/Fotos/logoTECNM.png', 1, '2024-11-11 03:43:12'),
(0, '2024-11-10', 'e001', 'sudadera gris', 'sudadera gris talla g', 'estampado y seña particular', 'C:/xampp/htdocs/EncuentraTec/Fotos/logoTECNM.png', 1, '2024-11-11 03:43:19'),
(0, '2024-11-10', 'e001', 'sudadera gris', 'sudadera gris talla g', 'estampado y seña particular', 'C:/xampp/htdocs/EncuentraTec/Fotos/logoTECNM.png', 1, '2024-11-11 03:43:21'),
(0, '2024-11-10', 'e001', 'sudadera gris', 'sudadera gris talla g', 'estampado y seña particular', 'C:/xampp/htdocs/EncuentraTec/Fotos/logoTECNM.png', 1, '2024-11-11 03:45:13'),
(0, '2024-11-10', 'e001', 'sudadera gris', 'hola probando uno dos', 'estampado y seña particular', 'C:/xampp/htdocs/EncuentraTec/Fotos/logoTECNM.png', 1, '2024-11-11 03:46:05'),
(0, '2024-11-10', 'e001', 'sudadera gris', 'hola probando uno dos', 'estampado y seña particular', 'C:/xampp/htdocs/EncuentraTec/Fotos/logoTECNM.png', 1, '2024-11-11 03:48:04'),
(0, '2024-11-10', 'e001', 'sudadera gris', 'hola probando uno dos', 'estampado y seña particular', 'C:/xampp/htdocs/EncuentraTec/Fotos/logoTECNM.png', 1, '2024-11-11 03:48:45'),
(0, '2024-11-10', 'e001', 'sudadera gris', 'hola probando uno dos', 'estampado y seña particular', 'C:/xampp/htdocs/EncuentraTec/Fotos/logoTECNM.png', 1, '2024-11-11 03:52:42'),
(0, '2024-11-10', 'e001', 'sudadera gris', 'hola probando uno dos', 'estampado y seña particular', 'C:/xampp/htdocs/EncuentraTec/Fotos/logoTECNM.png', 1, '2024-11-11 03:52:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `correoAdmin` varchar(30) NOT NULL,
  `nombreAdmin` varchar(30) NOT NULL,
  `passwordAdmin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `numero_control` varchar(8) NOT NULL,
  `nombre_com` varchar(80) NOT NULL,
  `correo_elec` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`numero_control`, `nombre_com`, `correo_elec`, `password`) VALUES
('12345634', 'joyce', 'joyce@gmail.com', '12345678'),
('12345678', 'yois', 'joyce@gmail.com', '12345678'),
('33333333', 'sayu', 'sayu333@gmail.com', '1234'),
('44444444', 'joycetahily', 'joyce@gmail.com', '987654321'),
('55555555', 'joyce', 'sayu333@gmail.com', '1234567890');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntarobjeto`
--

CREATE TABLE `preguntarobjeto` (
  `id_pregunta` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `url_foto` varchar(255) DEFAULT NULL,
  `numero_control` varchar(8) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`correoAdmin`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`numero_control`);

--
-- Indices de la tabla `preguntarobjeto`
--
ALTER TABLE `preguntarobjeto`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `numero_control` (`numero_control`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preguntarobjeto`
--
ALTER TABLE `preguntarobjeto`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `preguntarobjeto`
--
ALTER TABLE `preguntarobjeto`
  ADD CONSTRAINT `preguntarobjeto_ibfk_1` FOREIGN KEY (`numero_control`) REFERENCES `alumno` (`numero_control`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
