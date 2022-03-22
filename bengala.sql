-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2022 at 11:51 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengala`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `identyUser` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `passwordUser` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `NOM_USER` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `PERFIL` int(11) NOT NULL,
  `ESTADO_USER` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`identyUser`, `passwordUser`, `NOM_USER`, `ID_EMPRESA`, `PERFIL`, `ESTADO_USER`) VALUES
('1110588476', 'cd3f0c85b158c08a2b113464991810cf2cdfc387', 'Brian', 900221406, 0, '1'),
('1110588477', 'cd3f0c85b158c08a2b113464991810cf2cdfc387', 'Steven', 830085335, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `consultas`
--

CREATE TABLE `consultas` (
  `ID_CONSULTA` int(11) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_MASCOTA` bigint(20) NOT NULL,
  `ID_PROP` bigint(20) NOT NULL,
  `CONSECUTIVO_CONSULTA` bigint(20) NOT NULL,
  `FECHA_CONSULTA` date NOT NULL,
  `HORA_CONSULTA` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `USUARIO_CONSULTA` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ANTECEDENTES` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `SINTOMAS` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `DIAGNOSTICO` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `OBSERVACIONES` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `FORMULA` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `RECETA` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ESTADO_CONSULTA` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `consultas`
--

INSERT INTO `consultas` (`ID_CONSULTA`, `ID_EMPRESA`, `ID_MASCOTA`, `ID_PROP`, `CONSECUTIVO_CONSULTA`, `FECHA_CONSULTA`, `HORA_CONSULTA`, `USUARIO_CONSULTA`, `ANTECEDENTES`, `SINTOMAS`, `DIAGNOSTICO`, `OBSERVACIONES`, `FORMULA`, `RECETA`, `ESTADO_CONSULTA`) VALUES
(18, 900221406, 1, 1110588476, 1, '2022-03-15', '21:38', '1110588476', 'antecedentes', 'sintomas', 'diagnostico', '\n														<p>FC:sd<br>\n														FR:as<br>\n														Peso (Kg):as<br>\n														C.C:asd<br>\n														Temperatura:asd<br>\n														Mucosas:asd<br>\n														Sistema Digestivo:asd<br>\n														Sistema Respiratorio: <br>\n														Sistema Circulatorio: <br>\n														Sistema Urinario: <br>\n														Sistema Genital: <br>\n														Sistema Nervioso: <br>\n														Sistema Locomotor: <br>\n														Sistema Tegumentario: <br>\n														Muestras remitidas:</p>\n													', 'Formula', 'Producto Prueba<br> <b>Dosis:</b> 1cm3<br> <b>Frecuencia:</b> 1xdia<br> <b>Dias:</b> x8dias<br> <b>Uso:</b> despeus de comer-\r\nProducto 2<br> <b>Dosis:</b> 2cm3<br> <b>Frecuencia:</b> 2xdia<br> <b>Dias:</b> x8dias<br> <b>Uso:</b> dormir', 'Realizado'),
(19, 900221406, 1, 1110588476, 2, '2022-03-16', '20:33', '1110588476', '', '', '', '', '', '', 'Cancelado'),
(20, 900221406, 1, 1110588476, 3, '2022-03-17', '20:46', '1110588476', 'a', 's', 'd', '\n														<p>FC: <br>\n														FR: <br>\n														Peso (Kg): <br>\n														C.C: <br>\n														Temperatura: <br>\n														Mucosas: <br>\n														Sistema Digestivo: <br>\n														Sistema Respiratorio: <br>\n														Sistema Circulatorio: <br>\n														Sistema Urinario: <br>\n														Sistema Genital: <br>\n														Sistema Nervioso: <br>\n														Sistema Locomotor: <br>\n														Sistema Tegumentario: <br>\n														Muestras remitidas:</p>\n													', 's', 'Producto Prueba<br> <b>Dosis:</b> 1<br> <b>Frecuencia:</b> 2<br> <b>Dias:</b> 3<br> <b>Uso:</b> 4', 'Realizado'),
(21, 900221406, 1, 1110588476, 4, '2022-03-18', '15:35', '1110588476', '', '', '', 'prueba', '', '', 'Pendiente'),
(22, 900221406, 1, 1110588476, 5, '2022-03-18', '02:17', '1110588476', 'q', 'w', 'e', '\n														<p>FC: <br>\n														FR: <br>\n														Peso (Kg): <br>\n														C.C: <br>\n														Temperatura: <br>\n														Mucosas: <br>\n														Sistema Digestivo: <br>\n														Sistema Respiratorio: <br>\n														Sistema Circulatorio: <br>\n														Sistema Urinario: <br>\n														Sistema Genital: <br>\n														Sistema Nervioso: <br>\n														Sistema Locomotor: <br>\n														Sistema Tegumentario: <br>\n														Muestras remitidas:</p>\n													', '2', 'Producto 2<br> <b>Dosis:</b> 1<br> <b>Frecuencia:</b> 2<br> <b>Dias:</b> 3<br> <b>Uso:</b> 4', 'Realizado'),
(23, 900221406, 1, 1110588476, 6, '2022-03-18', '02:04', '1110588476', 'f', 'd', 'e', '\n														<p>FC: <br>\n														FR: <br>\n														Peso (Kg): <br>\n														C.C: <br>\n														Temperatura: <br>\n														Mucosas: <br>\n														Sistema Digestivo: <br>\n														Sistema Respiratorio: <br>\n														Sistema Circulatorio: <br>\n														Sistema Urinario: <br>\n														Sistema Genital: <br>\n														Sistema Nervioso: <br>\n														Sistema Locomotor: <br>\n														Sistema Tegumentario: <br>\n														Muestras remitidas:</p>\n													', 'r', 'Producto Prueba<br> <b>Dosis:</b> 1<br> <b>Frecuencia:</b> 2<br> <b>Dias:</b> 3<br> <b>Uso:</b> 4-Producto 2<br> <b>Dosis:</b> 3<br> <b>Frecuencia:</b> 2<br> <b>Dias:</b> 45<br> <b>Uso:</b> 5', 'Realizado');

-- --------------------------------------------------------

--
-- Table structure for table `cronograma`
--

CREATE TABLE `cronograma` (
  `ID_CRONO` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_MASCOTA` bigint(20) NOT NULL,
  `TIPO_CRONO` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `DETALLE` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `FEC_CRONO` datetime NOT NULL,
  `STATUS_CRONO` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(20) NOT NULL,
  `codigodepartamento` int(20) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`id`, `codigodepartamento`, `nombre`) VALUES
(1, 5, 'Antioquia'),
(2, 8, 'Atlantico'),
(3, 11, 'Bogotá D.C'),
(4, 13, 'Bolivar'),
(5, 15, 'Boyaca'),
(6, 17, 'Caldas'),
(7, 18, 'Caqueta'),
(8, 19, 'Cauca'),
(9, 20, 'Cesar'),
(10, 23, 'Cordoba'),
(11, 25, 'Cundinamarca'),
(12, 27, 'Choco'),
(13, 41, 'Huila'),
(14, 44, 'La Guajira'),
(15, 47, 'Magdalena'),
(16, 50, 'Meta'),
(17, 52, 'Nariño'),
(18, 54, 'Norte de Santander'),
(19, 63, 'Quindio'),
(20, 66, 'Risaralda'),
(21, 68, 'Santander'),
(22, 70, 'Sucre'),
(23, 73, 'Tolima'),
(24, 76, 'Valle'),
(25, 81, 'Arauca'),
(26, 85, 'Casanare'),
(27, 86, 'Putumayo'),
(28, 88, 'San Andres'),
(29, 91, 'Amazonas'),
(30, 94, 'Guainia'),
(31, 95, 'Guaviare'),
(32, 97, 'Vaupes'),
(33, 99, 'Vichada');

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

CREATE TABLE `empresa` (
  `ID_EMPRESA` bigint(20) NOT NULL,
  `DV` int(11) NOT NULL,
  `NOMBRE_EMPRESA` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `DIR_EMPRESA` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codigodepartamento` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `NOMBRE_RL` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `TEL_RL` bigint(20) NOT NULL,
  `NOM_CONTACTO` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `TEL_CONTACTO` bigint(20) NOT NULL,
  `STATUS` varbinary(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `empresa`
--

INSERT INTO `empresa` (`ID_EMPRESA`, `DV`, `NOMBRE_EMPRESA`, `DIR_EMPRESA`, `codigodepartamento`, `codigo`, `NOMBRE_RL`, `TEL_RL`, `NOM_CONTACTO`, `TEL_CONTACTO`, `STATUS`) VALUES
(900221406, 1, 'MEGADATA', 'CALLE 19 8-32', 1, 1, 'ISABELLA REYES', 123456, 'LAURA BARRAGAN', 654321, 0x01);

-- --------------------------------------------------------

--
-- Table structure for table `historial`
--

CREATE TABLE `historial` (
  `ID_HISTORIAL` bigint(20) NOT NULL,
  `FECHA_HISTORIAL` timestamp NOT NULL,
  `USUARIO_HISTORIAL` bigint(20) NOT NULL,
  `ACCION_HISTORIAL` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `historial`
--

INSERT INTO `historial` (`ID_HISTORIAL`, `FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`, `ID_EMPRESA`) VALUES
(1, '2022-03-18 06:57:34', 1110588476, 'Ha creado una peluqueria', 0),
(2, '2022-03-18 06:18:38', 1110588476, 'Ha creado una peluqueria', 900221406),
(3, '2022-03-18 06:54:40', 1110588476, 'Ha realizado la peluqueria de 6', 900221406),
(4, '2022-03-18 06:02:41', 1110588476, 'Ha Cancelado una peluqueria de 12', 900221406),
(5, '2022-03-18 07:26:27', 1110588476, 'Ha programado una vacuna para mascota id=1', 900221406),
(6, '2022-03-18 07:32:27', 1110588476, 'Ha realizado una vacuna id=', 900221406),
(7, '2022-03-18 07:09:28', 1110588476, 'Ha creado una peluqueria', 900221406),
(8, '2022-03-18 07:15:28', 1110588476, 'Ha realizado la peluqueria de id=13', 900221406),
(9, '2022-03-18 07:08:29', 1110588476, 'Ha programado una consulta con id=5', 900221406),
(10, '2022-03-18 07:02:30', 1110588476, 'Ha programado una consulta consecutivo=6', 900221406),
(11, '2022-03-18 07:23:30', 1110588476, 'Ha atendido la consulta consecutivo=', 900221406),
(12, '2022-03-18 07:51:30', 1110588476, 'Ha actualizado la mascota con id=1', 900221406),
(13, '2022-03-18 07:59:30', 1110588476, 'Ha actualizado la mascota con id=1', 900221406);

-- --------------------------------------------------------

--
-- Table structure for table `inventario_vacunas`
--

CREATE TABLE `inventario_vacunas` (
  `ID_VACUNA` int(11) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `NOMBRE_VACUNA` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `PRESENTACION` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `inventario_vacunas`
--

INSERT INTO `inventario_vacunas` (`ID_VACUNA`, `ID_EMPRESA`, `NOMBRE_VACUNA`, `PRESENTACION`) VALUES
(5, 900221406, 'Prueba Vacuna123', 'Gr'),
(6, 900221406, 'Funcionando Edit', 'Dosis'),
(7, 0, 'Working', 'Ol');

-- --------------------------------------------------------

--
-- Table structure for table `mascotas`
--

CREATE TABLE `mascotas` (
  `ID_MASCOTA` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `NOMBRE` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `SEXO` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `FEC_NAC` date NOT NULL,
  `TIPO` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `RAZA` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `COLOR` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ID_PROP` bigint(20) NOT NULL,
  `DUENO` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `TEL_DUENO` bigint(20) NOT NULL,
  `FEC_REG` date NOT NULL,
  `ESTADO_MASCOTA` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `mascotas`
--

INSERT INTO `mascotas` (`ID_MASCOTA`, `ID_EMPRESA`, `NOMBRE`, `SEXO`, `FEC_NAC`, `TIPO`, `RAZA`, `COLOR`, `ID_PROP`, `DUENO`, `TEL_DUENO`, `FEC_REG`, `ESTADO_MASCOTA`) VALUES
(1, 900221406, 'Belle', 'Hembra Esterilizada', '2021-02-20', 'Felino', 'Criollo', 'Blanco', 1110588476, 'Brian Steven Beltran Martinez', 3158289950, '2022-03-10', 'Vivo'),
(2, 830085336, 'Katie', 'Hembra Esterilizada', '2021-02-20', 'Felino', 'Siames', 'Blanco', 1110588476, 'Brian Steven Beltran Martinez', 3158289950, '2022-03-10', 'Vivo');

-- --------------------------------------------------------

--
-- Table structure for table `municipios`
--

CREATE TABLE `municipios` (
  `id` int(20) NOT NULL,
  `codigodepartamento_fk` int(20) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `municipios`
--

INSERT INTO `municipios` (`id`, `codigodepartamento_fk`, `codigo`, `nombre`) VALUES
(1, 1, 1, 'Medellin'),
(2, 1, 2, 'Abejorral'),
(3, 1, 4, 'Abriaqui'),
(4, 1, 21, 'Alejandria'),
(5, 1, 30, 'Amaga'),
(6, 1, 31, 'Amalfi'),
(7, 1, 34, 'Andes'),
(8, 1, 36, 'Angelopolis'),
(9, 1, 38, 'Angostura'),
(10, 1, 40, 'Anori'),
(11, 1, 42, 'Antioquia'),
(12, 1, 44, 'Anza'),
(13, 1, 45, 'Apartado'),
(14, 1, 51, 'Arboletes'),
(15, 1, 55, 'Argelia'),
(16, 1, 59, 'Armenia'),
(17, 1, 79, 'Barbosa'),
(18, 1, 86, 'Belmira'),
(19, 1, 88, 'Bello'),
(20, 1, 91, 'Betania'),
(21, 1, 93, 'Betulia'),
(22, 1, 101, 'Bolivar'),
(23, 1, 107, 'Briceño'),
(24, 1, 113, 'Buritica'),
(25, 1, 120, 'Caceres'),
(26, 1, 125, 'Caicedo'),
(27, 1, 129, 'Caldas'),
(28, 1, 134, 'Campamento'),
(29, 1, 138, 'Cañasgordas'),
(30, 1, 142, 'Caracoli'),
(31, 1, 145, 'Caramanta'),
(32, 1, 147, 'Carepa'),
(33, 1, 148, 'Carmen de viboral'),
(34, 1, 150, 'Carolina'),
(35, 1, 154, 'Caucasia'),
(36, 1, 172, 'Chigorodo'),
(37, 1, 190, 'Cisneros'),
(38, 1, 197, 'Cocorna'),
(39, 1, 206, 'Concepcion'),
(40, 1, 209, 'Concordia'),
(41, 1, 212, 'Copacabana'),
(42, 1, 234, 'Dabeiba'),
(43, 1, 237, 'Don matias'),
(44, 1, 240, 'Ebejico'),
(45, 1, 250, 'El bagre'),
(46, 1, 264, 'Entrerrios'),
(47, 1, 266, 'Envigado'),
(48, 1, 282, 'Fredonia'),
(49, 1, 284, 'Frontino'),
(50, 1, 306, 'Giraldo'),
(51, 1, 308, 'Girardota'),
(52, 1, 310, 'Gomez plata'),
(53, 1, 313, 'Granada'),
(54, 1, 315, 'Guadalupe'),
(55, 1, 318, 'Guarne'),
(56, 1, 321, 'Guatape'),
(57, 1, 347, 'Heliconia'),
(58, 1, 353, 'Hispania'),
(59, 1, 360, 'Itagui'),
(60, 1, 361, 'Ituango'),
(61, 1, 364, 'Jardin'),
(62, 1, 368, 'Jerico'),
(63, 1, 376, 'La ceja'),
(64, 1, 380, 'La estrella'),
(65, 1, 390, 'La pintada'),
(66, 1, 400, 'La union'),
(67, 1, 411, 'Liborina'),
(68, 1, 425, 'Maceo'),
(69, 1, 440, 'Marinilla'),
(70, 1, 467, 'Montebello'),
(71, 1, 475, 'Murindo'),
(72, 1, 480, 'Mutata'),
(73, 1, 483, 'Nariño'),
(74, 1, 490, 'Necocli'),
(75, 1, 495, 'Nechi'),
(76, 1, 501, 'Olaya'),
(77, 1, 541, 'Peñol'),
(78, 1, 543, 'Peque'),
(79, 1, 576, 'Pueblorrico'),
(80, 1, 579, 'Puerto berrio'),
(81, 1, 585, 'Puerto nare (la magdalena)'),
(82, 1, 591, 'Puerto triunfo'),
(83, 1, 604, 'Remedios'),
(84, 1, 607, 'Retiro'),
(85, 1, 615, 'Rionegro'),
(86, 1, 628, 'Sabanalarga'),
(87, 1, 631, 'Sabaneta'),
(88, 1, 642, 'Salgar'),
(89, 1, 647, 'San andres'),
(90, 1, 649, 'San carlos'),
(91, 1, 652, 'San francisco'),
(92, 1, 656, 'San jeronimo'),
(93, 1, 658, 'San jose de la montaña'),
(94, 1, 659, 'San juan de uraba'),
(95, 1, 660, 'San luis'),
(96, 1, 664, 'San pedro'),
(97, 1, 665, 'San pedro de uraba'),
(98, 1, 667, 'San rafael'),
(99, 1, 670, 'San roque'),
(100, 1, 674, 'San vicente'),
(101, 1, 679, 'Santa barbara'),
(102, 1, 686, 'Santa rosa de osos'),
(103, 1, 690, 'Santo domingo'),
(104, 1, 697, 'Santuario'),
(105, 1, 736, 'Segovia'),
(106, 1, 756, 'Sonson'),
(107, 1, 761, 'Sopetran'),
(108, 1, 789, 'Tamesis'),
(109, 1, 790, 'Taraza'),
(110, 1, 792, 'Tarso'),
(111, 1, 809, 'Titiribi'),
(112, 1, 819, 'Toledo'),
(113, 1, 837, 'Turbo'),
(114, 1, 842, 'Uramita'),
(115, 1, 847, 'Urrao'),
(116, 1, 854, 'Valdivia'),
(117, 1, 856, 'Valparaiso'),
(118, 1, 858, 'Vegachi'),
(119, 1, 861, 'Venecia'),
(120, 1, 873, 'Vigia del fuerte'),
(121, 1, 885, 'Yali'),
(122, 1, 887, 'Yarumal'),
(123, 1, 890, 'Yolombo'),
(124, 1, 893, 'Yondo'),
(125, 1, 895, 'Zaragoza'),
(126, 2, 1, 'Barranquilla (distrito especial industrial y portua'),
(127, 2, 78, 'Baranoa'),
(128, 2, 137, 'Campo de la cruz'),
(129, 2, 141, 'Candelaria'),
(130, 2, 296, 'Galapa'),
(131, 2, 372, 'Juan de acosta'),
(132, 2, 421, 'Luruaco'),
(133, 2, 433, 'Malambo'),
(134, 2, 436, 'Manati'),
(135, 2, 520, 'Palmar de varela'),
(136, 2, 549, 'Piojo'),
(137, 2, 558, 'Polo nuevo'),
(138, 2, 560, 'Ponedera'),
(139, 2, 573, 'Puerto colombia'),
(140, 2, 606, 'Repelon'),
(141, 2, 634, 'Sabanagrande'),
(142, 2, 638, 'Sabanalarga'),
(143, 2, 675, 'Santa lucia'),
(144, 2, 685, 'Santo tomas'),
(145, 2, 758, 'Soledad'),
(146, 2, 770, 'Suan'),
(147, 2, 832, 'Tubara'),
(148, 2, 849, 'Usiacuri'),
(149, 3, 1, 'Bogotá d.c'),
(150, 3, 1, 'Usaquen'),
(151, 3, 2, 'Chapinero'),
(152, 3, 3, 'Santa fe'),
(153, 3, 4, 'San cristobal'),
(154, 3, 5, 'Usme'),
(155, 3, 6, 'Tunjuelito'),
(156, 3, 7, 'Bosa'),
(157, 3, 8, 'Kennedy'),
(158, 3, 9, 'Fontibon'),
(159, 3, 10, 'Engativa'),
(160, 3, 11, 'Suba'),
(161, 3, 12, 'Barrios unidos'),
(162, 3, 13, 'Teusaquillo'),
(163, 3, 14, 'Martires'),
(164, 3, 15, 'Antonio nariño'),
(165, 3, 16, 'Puente aranda'),
(166, 3, 17, 'Candelaria'),
(167, 3, 18, 'Rafael uribe'),
(168, 3, 19, 'Ciudad bolivar'),
(169, 3, 20, 'Sumapaz'),
(170, 4, 1, 'Cartagena (distrito turistico y cultural de cartage'),
(171, 4, 6, 'Achi'),
(172, 4, 30, 'Altos del rosario'),
(173, 4, 42, 'Arenal'),
(174, 4, 52, 'Arjona'),
(175, 4, 62, 'Arroyohondo'),
(176, 4, 74, 'Barranco de loba'),
(177, 4, 140, 'Calamar'),
(178, 4, 160, 'Cantagallo'),
(179, 4, 188, 'Cicuco'),
(180, 4, 212, 'Cordoba'),
(181, 4, 222, 'Clemencia'),
(182, 4, 244, 'El carmen de bolivar'),
(183, 4, 248, 'El guamo'),
(184, 4, 268, 'El peñon'),
(185, 4, 300, 'Hatillo de loba'),
(186, 4, 430, 'Magangue'),
(187, 4, 433, 'Mahates'),
(188, 4, 440, 'Margarita'),
(189, 4, 442, 'Maria la baja'),
(190, 4, 458, 'Montecristo'),
(191, 4, 468, 'Mompos'),
(192, 4, 473, 'Morales'),
(193, 4, 549, 'Pinillos'),
(194, 4, 580, 'Regidor'),
(195, 4, 600, 'Rio viejo'),
(196, 4, 620, 'San cristobal'),
(197, 4, 647, 'San estanislao'),
(198, 4, 650, 'San fernando'),
(199, 4, 654, 'San jacinto'),
(200, 4, 655, 'San jacinto del cauca'),
(201, 4, 657, 'San juan nepomuceno'),
(202, 4, 667, 'San martin de loba'),
(203, 4, 670, 'San pablo'),
(204, 4, 673, 'Santa catalina'),
(205, 4, 683, 'Santa rosa'),
(206, 4, 688, 'Santa rosa del sur'),
(207, 4, 744, 'Simiti'),
(208, 4, 760, 'Soplaviento'),
(209, 4, 780, 'Talaigua nuevo'),
(210, 4, 810, 'Tiquisio (puerto rico)'),
(211, 4, 836, 'Turbaco'),
(212, 4, 838, 'Turbana'),
(213, 4, 873, 'Villanueva'),
(214, 4, 894, 'Zambrano'),
(215, 5, 1, 'Tunja'),
(216, 5, 22, 'Almeida'),
(217, 5, 47, 'Aquitania'),
(218, 5, 51, 'Arcabuco'),
(219, 5, 87, 'Belen'),
(220, 5, 90, 'Berbeo'),
(221, 5, 92, 'Beteitiva'),
(222, 5, 97, 'Boavita'),
(223, 5, 104, 'Boyaca'),
(224, 5, 106, 'Briceño'),
(225, 5, 109, 'Buenavista'),
(226, 5, 114, 'Busbanza'),
(227, 5, 131, 'Caldas'),
(228, 5, 135, 'Campohermoso'),
(229, 5, 162, 'Cerinza'),
(230, 5, 172, 'Chinavita'),
(231, 5, 176, 'Chiquinquira'),
(232, 5, 180, 'Chiscas'),
(233, 5, 183, 'Chita'),
(234, 5, 185, 'Chitaraque'),
(235, 5, 187, 'Chivata'),
(236, 5, 189, 'Cienega'),
(237, 5, 204, 'Combita'),
(238, 5, 212, 'Coper'),
(239, 5, 215, 'Corrales'),
(240, 5, 218, 'Covarachia'),
(241, 5, 223, 'Cubara'),
(242, 5, 224, 'Cucaita'),
(243, 5, 226, 'Cuitiva'),
(244, 5, 232, 'Chiquiza'),
(245, 5, 236, 'Chivor'),
(246, 5, 238, 'Duitama'),
(247, 5, 244, 'El cocuy'),
(248, 5, 248, 'El espino'),
(249, 5, 272, 'Firavitoba'),
(250, 5, 276, 'Floresta'),
(251, 5, 293, 'Gachantiva'),
(252, 5, 296, 'Gameza'),
(253, 5, 299, 'Garagoa'),
(254, 5, 317, 'Guacamayas'),
(255, 5, 322, 'Guateque'),
(256, 5, 325, 'Guayata'),
(257, 5, 332, 'Guican'),
(258, 5, 362, 'Iza'),
(259, 5, 367, 'Jenesano'),
(260, 5, 368, 'Jerico'),
(261, 5, 377, 'Labranzagrande'),
(262, 5, 380, 'La capilla'),
(263, 5, 401, 'La victoria'),
(264, 5, 403, 'La uvita'),
(265, 5, 407, 'Villa de leiva'),
(266, 5, 425, 'Macanal'),
(267, 5, 442, 'Maripi'),
(268, 5, 455, 'Miraflores'),
(269, 5, 464, 'Mongua'),
(270, 5, 466, 'Mongui'),
(271, 5, 469, 'Moniquira'),
(272, 5, 476, 'Motavita'),
(273, 5, 480, 'Muzo'),
(274, 5, 491, 'Nobsa'),
(275, 5, 494, 'Nuevo colon'),
(276, 5, 500, 'Oicata'),
(277, 5, 507, 'Otanche'),
(278, 5, 511, 'Pachavita'),
(279, 5, 514, 'Paez'),
(280, 5, 516, 'Paipa'),
(281, 5, 518, 'Pajarito'),
(282, 5, 522, 'Panqueba'),
(283, 5, 531, 'Pauna'),
(284, 5, 533, 'Paya'),
(285, 5, 537, 'Paz del rio'),
(286, 5, 542, 'Pesca'),
(287, 5, 550, 'Pisba'),
(288, 5, 572, 'Puerto boyaca'),
(289, 5, 580, 'Quipama'),
(290, 5, 599, 'Ramiriqui'),
(291, 5, 600, 'Raquira'),
(292, 5, 621, 'Rondon'),
(293, 5, 632, 'Saboya'),
(294, 5, 638, 'Sachica'),
(295, 5, 646, 'Samaca'),
(296, 5, 660, 'San eduardo'),
(297, 5, 664, 'San jose de pare'),
(298, 5, 667, 'San luis de gaceno'),
(299, 5, 673, 'San mateo'),
(300, 5, 676, 'San miguel de sema'),
(301, 5, 681, 'San pablo de borbur'),
(302, 5, 686, 'Santana'),
(303, 5, 690, 'Santa maria'),
(304, 5, 693, 'Santa rosa de viterbo'),
(305, 5, 696, 'Santa sofia'),
(306, 5, 720, 'Sativanorte'),
(307, 5, 723, 'Sativasur'),
(308, 5, 740, 'Siachoque'),
(309, 5, 753, 'Soata'),
(310, 5, 755, 'Socota'),
(311, 5, 757, 'Socha'),
(312, 5, 759, 'Sogamoso'),
(313, 5, 761, 'Somondoco'),
(314, 5, 762, 'Sora'),
(315, 5, 763, 'Sotaquira'),
(316, 5, 764, 'Soraca'),
(317, 5, 774, 'Susacon'),
(318, 5, 776, 'Sutamarchan'),
(319, 5, 778, 'Sutatenza'),
(320, 5, 790, 'Tasco'),
(321, 5, 798, 'Tenza'),
(322, 5, 804, 'Tibana'),
(323, 5, 806, 'Tibasosa'),
(324, 5, 808, 'Tinjaca'),
(325, 5, 810, 'Tipacoque'),
(326, 5, 814, 'Toca'),
(327, 5, 816, 'Togui'),
(328, 5, 820, 'Topaga'),
(329, 5, 822, 'Tota'),
(330, 5, 832, 'Tunungua'),
(331, 5, 835, 'Turmeque'),
(332, 5, 837, 'Tuta'),
(333, 5, 839, 'Tutasa'),
(334, 5, 842, 'Umbita'),
(335, 5, 861, 'Ventaquemada'),
(336, 5, 879, 'Viracacha'),
(337, 5, 897, 'Zetaquira'),
(338, 6, 1, 'Manizales'),
(339, 6, 13, 'Aguadas'),
(340, 6, 42, 'Anserma'),
(341, 6, 50, 'Aranzazu'),
(342, 6, 88, 'Belalcazar'),
(343, 6, 174, 'Chinchina'),
(344, 6, 272, 'Filadelfia'),
(345, 6, 380, 'La dorada'),
(346, 6, 388, 'La merced'),
(347, 6, 433, 'Manzanares'),
(348, 6, 442, 'Marmato'),
(349, 6, 444, 'Marquetalia'),
(350, 6, 446, 'Marulanda'),
(351, 6, 486, 'Neira'),
(352, 6, 495, 'Norcasia'),
(353, 6, 513, 'Pacora'),
(354, 6, 524, 'Palestina'),
(355, 6, 541, 'Pensilvania'),
(356, 6, 614, 'Riosucio'),
(357, 6, 616, 'Risaralda'),
(358, 6, 653, 'Salamina'),
(359, 6, 662, 'Samana'),
(360, 6, 665, 'San jose'),
(361, 6, 777, 'Supia'),
(362, 6, 867, 'Victoria'),
(363, 6, 873, 'Villamaria'),
(364, 6, 877, 'Viterbo'),
(365, 7, 1, 'Florencia'),
(366, 7, 29, 'Albania'),
(367, 7, 94, 'Belen de los andaquies'),
(368, 7, 150, 'Cartagena del chaira'),
(369, 7, 205, 'Curillo'),
(370, 7, 247, 'El doncello'),
(371, 7, 256, 'El paujil'),
(372, 7, 410, 'La montañita'),
(373, 7, 460, 'Milan'),
(374, 7, 479, 'Morelia'),
(375, 7, 592, 'Puerto rico'),
(376, 7, 610, 'San jose de fragua'),
(377, 7, 753, 'San vicente del caguan'),
(378, 7, 756, 'Solano'),
(379, 7, 785, 'Solita'),
(380, 7, 860, 'Valparaiso'),
(381, 8, 1, 'Popayan'),
(382, 8, 22, 'Almaguer'),
(383, 8, 50, 'Argelia'),
(384, 8, 75, 'Balboa'),
(385, 8, 100, 'Bolivar'),
(386, 8, 110, 'Buenos aires'),
(387, 8, 130, 'Cajibio'),
(388, 8, 137, 'Caldono'),
(389, 8, 142, 'Caloto'),
(390, 8, 212, 'Corinto'),
(391, 8, 256, 'El tambo'),
(392, 8, 290, 'Florencia'),
(393, 8, 318, 'Guapi'),
(394, 8, 355, 'Inza'),
(395, 8, 364, 'Jambalo'),
(396, 8, 392, 'La sierra'),
(397, 8, 397, 'La vega'),
(398, 8, 418, 'Lopez (micay)'),
(399, 8, 450, 'Mercaderes'),
(400, 8, 455, 'Miranda'),
(401, 8, 473, 'Morales'),
(402, 8, 513, 'Padilla'),
(403, 8, 517, 'Paez (belalcazar)'),
(404, 8, 532, 'Patia (el bordo)'),
(405, 8, 533, 'Piamonte'),
(406, 8, 548, 'Piendamo'),
(407, 8, 573, 'Puerto tejada'),
(408, 8, 585, 'Purace (coconuco)'),
(409, 8, 622, 'Rosas'),
(410, 8, 693, 'San sebastian'),
(411, 8, 698, 'Santander de quilichao'),
(412, 8, 701, 'Santa rosa'),
(413, 8, 743, 'Silvia'),
(414, 8, 760, 'Sotara (paispamba)'),
(415, 8, 780, 'Suarez'),
(416, 8, 807, 'Timbio'),
(417, 8, 809, 'Timbiqui'),
(418, 8, 821, 'Toribio'),
(419, 8, 824, 'Totoro'),
(420, 8, 845, 'Villarica'),
(421, 9, 1, 'Valledupar'),
(422, 9, 11, 'Aguachica'),
(423, 9, 13, 'Agustin codazzi'),
(424, 9, 32, 'Astrea'),
(425, 9, 45, 'Becerril'),
(426, 9, 60, 'Bosconia'),
(427, 9, 175, 'Chimichagua'),
(428, 9, 178, 'Chiriguana'),
(429, 9, 228, 'Curumani'),
(430, 9, 238, 'El copey'),
(431, 9, 250, 'El paso'),
(432, 9, 295, 'Gamarra'),
(433, 9, 310, 'Gonzalez'),
(434, 9, 383, 'La gloria'),
(435, 9, 400, 'La jagua ibirico'),
(436, 9, 443, 'Manaure (balcon del cesar)'),
(437, 9, 517, 'Pailitas'),
(438, 9, 550, 'Pelaya'),
(439, 9, 570, 'Pueblo bello'),
(440, 9, 614, 'Rio de oro'),
(441, 9, 621, 'La paz (robles)'),
(442, 9, 710, 'San alberto'),
(443, 9, 750, 'San diego'),
(444, 9, 770, 'San martin'),
(445, 9, 787, 'Tamalameque'),
(446, 10, 1, 'Monteria'),
(447, 10, 68, 'Ayapel'),
(448, 10, 79, 'Buenavista'),
(449, 10, 90, 'Canalete'),
(450, 10, 162, 'Cerete'),
(451, 10, 168, 'Chima'),
(452, 10, 182, 'Chinu'),
(453, 10, 189, 'Cienaga de oro'),
(454, 10, 300, 'Cotorra'),
(455, 10, 350, 'La apartada'),
(456, 10, 417, 'Lorica'),
(457, 10, 419, 'Los cordobas'),
(458, 10, 464, 'Momil'),
(459, 10, 466, 'Montelibano'),
(460, 10, 500, 'Moñitos'),
(461, 10, 555, 'Planeta rica'),
(462, 10, 570, 'Pueblo nuevo'),
(463, 10, 574, 'Puerto escondido'),
(464, 10, 580, 'Puerto libertador'),
(465, 10, 586, 'Purisima'),
(466, 10, 660, 'Sahagun'),
(467, 10, 670, 'San andres sotavento'),
(468, 10, 672, 'San antero'),
(469, 10, 675, 'San bernardo del viento'),
(470, 10, 678, 'San carlos'),
(471, 10, 686, 'San pelayo'),
(472, 10, 807, 'Tierralta'),
(473, 10, 855, 'Valencia'),
(474, 11, 1, 'Agua de dios'),
(475, 11, 19, 'Alban'),
(476, 11, 35, 'Anapoima'),
(477, 11, 40, 'Anolaima'),
(478, 11, 53, 'Arbelaez'),
(479, 11, 86, 'Beltran'),
(480, 11, 95, 'Bituima'),
(481, 11, 99, 'Bojaca'),
(482, 11, 120, 'Cabrera'),
(483, 11, 123, 'Cachipay'),
(484, 11, 126, 'Cajica'),
(485, 11, 148, 'Caparrapi'),
(486, 11, 151, 'Caqueza'),
(487, 11, 154, 'Carmen de carupa'),
(488, 11, 168, 'Chaguani'),
(489, 11, 175, 'Chia'),
(490, 11, 178, 'Chipaque'),
(491, 11, 181, 'Choachi'),
(492, 11, 183, 'Choconta'),
(493, 11, 200, 'Cogua'),
(494, 11, 214, 'Cota'),
(495, 11, 224, 'Cucunuba'),
(496, 11, 245, 'El colegio'),
(497, 11, 258, 'El peñon'),
(498, 11, 260, 'El rosal'),
(499, 11, 269, 'Facatativa'),
(500, 11, 279, 'Fomeque'),
(501, 11, 281, 'Fosca'),
(502, 11, 286, 'Funza'),
(503, 11, 288, 'Fuquene'),
(504, 11, 290, 'Fusagasuga'),
(505, 11, 293, 'Gachala'),
(506, 11, 295, 'Gachancipa'),
(507, 11, 297, 'Gacheta'),
(508, 11, 299, 'Gama'),
(509, 11, 307, 'Girardot'),
(510, 11, 312, 'Granada'),
(511, 11, 317, 'Guacheta'),
(512, 11, 320, 'Guaduas'),
(513, 11, 322, 'Guasca'),
(514, 11, 324, 'Guataqui'),
(515, 11, 326, 'Guatavita'),
(516, 11, 328, 'Guayabal de siquima'),
(517, 11, 335, 'Guayabetal'),
(518, 11, 339, 'Gutierrez'),
(519, 11, 368, 'Jerusalen'),
(520, 11, 372, 'Junin'),
(521, 11, 377, 'La calera'),
(522, 11, 386, 'La mesa'),
(523, 11, 394, 'La palma'),
(524, 11, 398, 'La peña'),
(525, 11, 402, 'La vega'),
(526, 11, 407, 'Lenguazaque'),
(527, 11, 426, 'Macheta'),
(528, 11, 430, 'Madrid'),
(529, 11, 436, 'Manta'),
(530, 11, 438, 'Medina'),
(531, 11, 473, 'Mosquera'),
(532, 11, 483, 'Nariño'),
(533, 11, 486, 'Nemocon'),
(534, 11, 488, 'Nilo'),
(535, 11, 489, 'Nimaima'),
(536, 11, 491, 'Nocaima'),
(537, 11, 506, 'Venecia (ospina perez)'),
(538, 11, 513, 'Pacho'),
(539, 11, 518, 'Paime'),
(540, 11, 524, 'Pandi'),
(541, 11, 530, 'Paratebueno'),
(542, 11, 535, 'Pasca'),
(543, 11, 572, 'Puerto salgar'),
(544, 11, 580, 'Puli'),
(545, 11, 592, 'Quebradanegra'),
(546, 11, 594, 'Quetame'),
(547, 11, 596, 'Quipile'),
(548, 11, 599, 'Apulo (rafael reyes)'),
(549, 11, 612, 'Ricaurte'),
(550, 11, 645, 'San antonio del tequendama'),
(551, 11, 649, 'San bernardo'),
(552, 11, 653, 'San cayetano'),
(553, 11, 658, 'San francisco'),
(554, 11, 662, 'San juan de rioseco'),
(555, 11, 718, 'Sasaima'),
(556, 11, 736, 'Sesquile'),
(557, 11, 740, 'Sibate'),
(558, 11, 743, 'Silvania'),
(559, 11, 745, 'Simijaca'),
(560, 11, 754, 'Soacha'),
(561, 11, 758, 'Sopo'),
(562, 11, 769, 'Subachoque'),
(563, 11, 772, 'Suesca'),
(564, 11, 777, 'Supata'),
(565, 11, 779, 'Susa'),
(566, 11, 781, 'Sutatausa'),
(567, 11, 785, 'Tabio'),
(568, 11, 793, 'Tausa'),
(569, 11, 797, 'Tena'),
(570, 11, 799, 'Tenjo'),
(571, 11, 805, 'Tibacuy'),
(572, 11, 807, 'Tibirita'),
(573, 11, 815, 'Tocaima'),
(574, 11, 817, 'Tocancipa'),
(575, 11, 823, 'Topaipi'),
(576, 11, 839, 'Ubala'),
(577, 11, 841, 'Ubaque'),
(578, 11, 843, 'Ubate'),
(579, 11, 845, 'Une'),
(580, 11, 851, 'Utica'),
(581, 11, 862, 'Vergara'),
(582, 11, 867, 'Viani'),
(583, 11, 871, 'Villagomez'),
(584, 11, 873, 'Villapinzon'),
(585, 11, 875, 'Villeta'),
(586, 11, 878, 'Viota'),
(587, 11, 885, 'Yacopi'),
(588, 11, 898, 'Zipacon'),
(589, 11, 899, 'Zipaquira'),
(590, 12, 1, 'Quibdo (san francisco de quibdo)'),
(591, 12, 6, 'Acandi'),
(592, 12, 25, 'Alto baudo (pie de pato)'),
(593, 12, 50, 'Atrato'),
(594, 12, 73, 'Bagado'),
(595, 12, 75, 'Bahia solano (mutis)'),
(596, 12, 77, 'Bajo baudo (pizarro)'),
(597, 12, 99, 'Bojaya (bellavista)'),
(598, 12, 135, 'Canton de san pablo (managru)'),
(599, 12, 205, 'Condoto'),
(600, 12, 245, 'El carmen de atrato'),
(601, 12, 250, 'Litoral del bajo san juan (santa genoveva de docord'),
(602, 12, 361, 'Istmina'),
(603, 12, 372, 'Jurado'),
(604, 12, 413, 'Lloro'),
(605, 12, 425, 'Medio atrato'),
(606, 12, 430, 'Medio baudo'),
(607, 12, 491, 'Novita'),
(608, 12, 495, 'Nuqui'),
(609, 12, 600, 'Rioquito'),
(610, 12, 615, 'Riosucio'),
(611, 12, 660, 'San jose del palmar'),
(612, 12, 745, 'Sipi'),
(613, 12, 787, 'Tado'),
(614, 12, 800, 'Unguia'),
(615, 12, 810, 'Union panamericana'),
(616, 13, 1, 'Neiva'),
(617, 13, 6, 'Acevedo'),
(618, 13, 13, 'Agrado'),
(619, 13, 16, 'Aipe'),
(620, 13, 20, 'Algeciras'),
(621, 13, 26, 'Altamira'),
(622, 13, 78, 'Baraya'),
(623, 13, 132, 'Campoalegre'),
(624, 13, 206, 'Colombia'),
(625, 13, 244, 'Elias'),
(626, 13, 298, 'Garzon'),
(627, 13, 306, 'Gigante'),
(628, 13, 319, 'Guadalupe'),
(629, 13, 349, 'Hobo'),
(630, 13, 357, 'Iquira'),
(631, 13, 359, 'Isnos (san jose de isnos)'),
(632, 13, 378, 'La argentina'),
(633, 13, 396, 'La plata'),
(634, 13, 483, 'Nataga'),
(635, 13, 503, 'Oporapa'),
(636, 13, 518, 'Paicol'),
(637, 13, 524, 'Palermo'),
(638, 13, 530, 'Palestina'),
(639, 13, 548, 'Pital'),
(640, 13, 551, 'Pitalito'),
(641, 13, 615, 'Rivera'),
(642, 13, 660, 'Saladoblanco'),
(643, 13, 668, 'San agustin'),
(644, 13, 676, 'Santa maria'),
(645, 13, 770, 'Suaza'),
(646, 13, 791, 'Tarqui'),
(647, 13, 797, 'Tesalia'),
(648, 13, 799, 'Tello'),
(649, 13, 801, 'Teruel'),
(650, 13, 807, 'Timana'),
(651, 13, 872, 'Villavieja'),
(652, 13, 885, 'Yaguara'),
(653, 14, 1, 'Riohacha'),
(654, 14, 78, 'Barrancas'),
(655, 14, 90, 'Dibulla'),
(656, 14, 98, 'Distraccion'),
(657, 14, 110, 'El molino'),
(658, 14, 279, 'Fonseca'),
(659, 14, 378, 'Hatonuevo'),
(660, 14, 420, 'La jagua del pilar'),
(661, 14, 430, 'Maicao'),
(662, 14, 560, 'Manaure'),
(663, 14, 650, 'San juan del cesar'),
(664, 14, 847, 'Uribia'),
(665, 14, 855, 'Urumita'),
(666, 14, 874, 'Villanueva'),
(667, 15, 1, 'Santa marta (distrito turistico cultural e historic'),
(668, 15, 30, 'Algarrobo'),
(669, 15, 53, 'Aracataca'),
(670, 15, 58, 'Ariguani (el dificil)'),
(671, 15, 161, 'Cerro san antonio'),
(672, 15, 170, 'Chivolo'),
(673, 15, 189, 'Cienaga'),
(674, 15, 205, 'Concordia'),
(675, 15, 245, 'El banco'),
(676, 15, 258, 'El piñon'),
(677, 15, 268, 'El reten'),
(678, 15, 288, 'Fundacion'),
(679, 15, 318, 'Guamal'),
(680, 15, 541, 'Pedraza'),
(681, 15, 545, 'Pijiño del carmen (pijiño)'),
(682, 15, 551, 'Pivijay'),
(683, 15, 555, 'Plato'),
(684, 15, 570, 'Puebloviejo'),
(685, 15, 605, 'Remolino'),
(686, 15, 660, 'Sabanas de san angel'),
(687, 15, 675, 'Salamina'),
(688, 15, 692, 'San sebastian de buenavista'),
(689, 15, 703, 'San zenon'),
(690, 15, 707, 'Santa ana'),
(691, 15, 745, 'Sitionuevo'),
(692, 15, 798, 'Tenerife'),
(693, 16, 1, 'Villavicencio'),
(694, 16, 6, 'Acacias'),
(695, 16, 110, 'Barranca de upia'),
(696, 16, 124, 'Cabuyaro'),
(697, 16, 150, 'Castilla la nueva'),
(698, 16, 223, 'San luis de cubarral'),
(699, 16, 226, 'Cumaral'),
(700, 16, 245, 'El calvario'),
(701, 16, 251, 'El castillo'),
(702, 16, 270, 'El dorado'),
(703, 16, 287, 'Fuente de oro'),
(704, 16, 313, 'Granada'),
(705, 16, 318, 'Guamal'),
(706, 16, 325, 'Mapiripan'),
(707, 16, 330, 'Mesetas'),
(708, 16, 350, 'La macarena'),
(709, 16, 370, 'La uribe'),
(710, 16, 400, 'Lejanias'),
(711, 16, 450, 'Puerto concordia'),
(712, 16, 568, 'Puerto gaitan'),
(713, 16, 573, 'Puerto lopez'),
(714, 16, 577, 'Puerto lleras'),
(715, 16, 590, 'Puerto rico'),
(716, 16, 606, 'Restrepo'),
(717, 16, 680, 'San carlos de guaroa'),
(718, 16, 683, 'San juan de arama'),
(719, 16, 686, 'San juanito'),
(720, 16, 689, 'San martin'),
(721, 16, 711, 'Vistahermosa'),
(722, 17, 1, 'Pasto (san juan de pasto)'),
(723, 17, 19, 'Alban (san jose)'),
(724, 17, 22, 'Aldana'),
(725, 17, 36, 'Ancuya'),
(726, 17, 51, 'Arboleda (berruecos)'),
(727, 17, 79, 'Barbacoas'),
(728, 17, 83, 'Belen'),
(729, 17, 110, 'Buesaco'),
(730, 17, 203, 'Colon (genova)'),
(731, 17, 207, 'Consaca'),
(732, 17, 210, 'Contadero'),
(733, 17, 215, 'Cordoba'),
(734, 17, 224, 'Cuaspud (carlosama)'),
(735, 17, 227, 'Cumbal'),
(736, 17, 233, 'Cumbitara'),
(737, 17, 240, 'Chachagui'),
(738, 17, 250, 'El charco'),
(739, 17, 254, 'El peñol'),
(740, 17, 256, 'El rosario'),
(741, 17, 258, 'El tablon'),
(742, 17, 260, 'El tambo'),
(743, 17, 287, 'Funes'),
(744, 17, 317, 'Guachucal'),
(745, 17, 320, 'Guaitarilla'),
(746, 17, 323, 'Gualmatan'),
(747, 17, 352, 'Iles'),
(748, 17, 354, 'Imues'),
(749, 17, 356, 'Ipiales'),
(750, 17, 378, 'La cruz'),
(751, 17, 381, 'La florida'),
(752, 17, 385, 'La llanada'),
(753, 17, 390, 'La tola'),
(754, 17, 399, 'La union'),
(755, 17, 405, 'Leiva'),
(756, 17, 411, 'Linares'),
(757, 17, 418, 'Los andes (sotomayor)'),
(758, 17, 427, 'Magui (payan)'),
(759, 17, 435, 'Mallama (piedrancha)'),
(760, 17, 473, 'Mosquera'),
(761, 17, 490, 'Olaya herrera (bocas de satinga)'),
(762, 17, 506, 'Ospina'),
(763, 17, 520, 'Francisco pizarro (salahonda)'),
(764, 17, 540, 'Policarpa'),
(765, 17, 560, 'Potosi'),
(766, 17, 565, 'Providencia'),
(767, 17, 573, 'Puerres'),
(768, 17, 585, 'Pupiales'),
(769, 17, 612, 'Ricaurte'),
(770, 17, 621, 'Roberto payan (san jose)'),
(771, 17, 678, 'Samaniego'),
(772, 17, 683, 'Sandona'),
(773, 17, 685, 'San bernardo'),
(774, 17, 687, 'San lorenzo'),
(775, 17, 693, 'San pablo'),
(776, 17, 694, 'San pedro de cartago'),
(777, 17, 696, 'Santa barbara (iscuande)'),
(778, 17, 699, 'Santa cruz (guachaves)'),
(779, 17, 720, 'Sapuyes'),
(780, 17, 786, 'Taminango'),
(781, 17, 788, 'Tangua'),
(782, 17, 835, 'Tumaco'),
(783, 17, 838, 'Tuquerres'),
(784, 17, 885, 'Yacuanquer'),
(785, 18, 1, 'Cucuta'),
(786, 18, 3, 'Abrego'),
(787, 18, 51, 'Arboledas'),
(788, 18, 99, 'Bochalema'),
(789, 18, 109, 'Bucarasica'),
(790, 18, 125, 'Cacota'),
(791, 18, 128, 'Cachira'),
(792, 18, 172, 'Chinacota'),
(793, 18, 174, 'Chitaga'),
(794, 18, 206, 'Convencion'),
(795, 18, 223, 'Cucutilla'),
(796, 18, 239, 'Durania'),
(797, 18, 245, 'El carmen'),
(798, 18, 250, 'El tarra'),
(799, 18, 261, 'El zulia'),
(800, 18, 313, 'Gramalote'),
(801, 18, 344, 'Hacari'),
(802, 18, 347, 'Herran'),
(803, 18, 377, 'Labateca'),
(804, 18, 385, 'La esperanza'),
(805, 18, 398, 'La playa'),
(806, 18, 405, 'Los patios'),
(807, 18, 418, 'Lourdes'),
(808, 18, 480, 'Mutiscua'),
(809, 18, 498, 'Ocaña'),
(810, 18, 518, 'Pamplona'),
(811, 18, 520, 'Pamplonita'),
(812, 18, 553, 'Puerto santander'),
(813, 18, 599, 'Ragonvalia'),
(814, 18, 660, 'Salazar'),
(815, 18, 670, 'San calixto'),
(816, 18, 673, 'San cayetano'),
(817, 18, 680, 'Santiago'),
(818, 18, 720, 'Sardinata'),
(819, 18, 743, 'Silos'),
(820, 18, 800, 'Teorama'),
(821, 18, 810, 'Tibu'),
(822, 18, 820, 'Toledo'),
(823, 18, 871, 'Villacaro'),
(824, 18, 874, 'Villa del rosario'),
(825, 19, 1, 'Armenia'),
(826, 19, 111, 'Buenavista'),
(827, 19, 130, 'Calarca'),
(828, 19, 190, 'Circasia'),
(829, 19, 212, 'Cordoba'),
(830, 19, 272, 'Filandia'),
(831, 19, 302, 'Genova'),
(832, 19, 401, 'La tebaida'),
(833, 19, 470, 'Montenegro'),
(834, 19, 548, 'Pijao'),
(835, 19, 594, 'Quimbaya'),
(836, 19, 690, 'Salento'),
(837, 20, 1, 'Pereira'),
(838, 20, 45, 'Apia'),
(839, 20, 75, 'Balboa'),
(840, 20, 88, 'Belen de umbria'),
(841, 20, 170, 'Dos quebradas'),
(842, 20, 318, 'Guatica'),
(843, 20, 383, 'La celia'),
(844, 20, 400, 'La virginia'),
(845, 20, 440, 'Marsella'),
(846, 20, 456, 'Mistrato'),
(847, 20, 572, 'Pueblo rico'),
(848, 20, 594, 'Quinchia'),
(849, 20, 682, 'Santa rosa de cabal'),
(850, 20, 687, 'Santuario'),
(851, 21, 1, 'Bucaramanga'),
(852, 21, 13, 'Aguada'),
(853, 21, 20, 'Albania'),
(854, 21, 51, 'Aratoca'),
(855, 21, 77, 'Barbosa'),
(856, 21, 79, 'Barichara'),
(857, 21, 81, 'Barrancabermeja'),
(858, 21, 92, 'Betulia'),
(859, 21, 101, 'Bolivar'),
(860, 21, 121, 'Cabrera'),
(861, 21, 132, 'California'),
(862, 21, 147, 'Capitanejo'),
(863, 21, 152, 'Carcasi'),
(864, 21, 160, 'Cepita'),
(865, 21, 162, 'Cerrito'),
(866, 21, 167, 'Charala'),
(867, 21, 169, 'Charta'),
(868, 21, 176, 'Chima'),
(869, 21, 179, 'Chipata'),
(870, 21, 190, 'Cimitarra'),
(871, 21, 207, 'Concepcion'),
(872, 21, 209, 'Confines'),
(873, 21, 211, 'Contratacion'),
(874, 21, 217, 'Coromoro'),
(875, 21, 229, 'Curiti'),
(876, 21, 235, 'El carmen de chucury'),
(877, 21, 245, 'El guacamayo'),
(878, 21, 250, 'El peñon'),
(879, 21, 255, 'El playon'),
(880, 21, 264, 'Encino'),
(881, 21, 266, 'Enciso'),
(882, 21, 271, 'Florian'),
(883, 21, 276, 'Floridablanca'),
(884, 21, 296, 'Galan'),
(885, 21, 298, 'Gambita'),
(886, 21, 307, 'Giron'),
(887, 21, 318, 'Guaca'),
(888, 21, 320, 'Guadalupe'),
(889, 21, 322, 'Guapota'),
(890, 21, 324, 'Guavata'),
(891, 21, 327, 'Guepsa'),
(892, 21, 344, 'Hato'),
(893, 21, 368, 'Jesus maria'),
(894, 21, 370, 'Jordan'),
(895, 21, 377, 'La belleza'),
(896, 21, 385, 'Landazuri'),
(897, 21, 397, 'La paz'),
(898, 21, 406, 'Lebrija'),
(899, 21, 418, 'Los santos'),
(900, 21, 425, 'Macaravita'),
(901, 21, 432, 'Malaga'),
(902, 21, 444, 'Matanza'),
(903, 21, 464, 'Mogotes'),
(904, 21, 468, 'Molagavita'),
(905, 21, 498, 'Ocamonte'),
(906, 21, 500, 'Oiba'),
(907, 21, 502, 'Onzaga'),
(908, 21, 522, 'Palmar'),
(909, 21, 524, 'Palmas del socorro'),
(910, 21, 533, 'Paramo'),
(911, 21, 547, 'Piedecuesta'),
(912, 21, 549, 'Pinchote'),
(913, 21, 572, 'Puente nacional'),
(914, 21, 573, 'Puerto parra'),
(915, 21, 575, 'Puerto wilches'),
(916, 21, 615, 'Rionegro'),
(917, 21, 655, 'Sabana de torres'),
(918, 21, 669, 'San andres'),
(919, 21, 673, 'San benito'),
(920, 21, 679, 'San gil'),
(921, 21, 682, 'San joaquin'),
(922, 21, 684, 'San jose de miranda'),
(923, 21, 686, 'San miguel'),
(924, 21, 689, 'San vicente de chucuri'),
(925, 21, 705, 'Santa barbara'),
(926, 21, 720, 'Santa helena del opon'),
(927, 21, 745, 'Simacota'),
(928, 21, 755, 'Socorro'),
(929, 21, 770, 'Suaita'),
(930, 21, 773, 'Sucre'),
(931, 21, 780, 'Surata'),
(932, 21, 820, 'Tona'),
(933, 21, 855, 'Valle san jose'),
(934, 21, 861, 'Velez'),
(935, 21, 867, 'Vetas'),
(936, 21, 872, 'Villanueva'),
(937, 21, 895, 'Zapatoca'),
(938, 22, 1, 'Sincelejo'),
(939, 22, 110, 'Buenavista'),
(940, 22, 124, 'Caimito'),
(941, 22, 204, 'Coloso (ricaurte)'),
(942, 22, 215, 'Corozal'),
(943, 22, 230, 'Chalan'),
(944, 22, 235, 'Galeras (nueva granada)'),
(945, 22, 265, 'Guaranda'),
(946, 22, 400, 'La union'),
(947, 22, 418, 'Los palmitos'),
(948, 22, 429, 'Majagual'),
(949, 22, 473, 'Morroa'),
(950, 22, 508, 'Ovejas'),
(951, 22, 523, 'Palmito'),
(952, 22, 670, 'Sampues'),
(953, 22, 678, 'San benito abad'),
(954, 22, 702, 'San juan de betulia'),
(955, 22, 708, 'San marcos'),
(956, 22, 713, 'San onofre'),
(957, 22, 717, 'San pedro'),
(958, 22, 742, 'Since'),
(959, 22, 771, 'Sucre'),
(960, 22, 820, 'Tolu'),
(961, 22, 823, 'Toluviejo'),
(962, 23, 1, 'Ibague'),
(963, 23, 24, 'Alpujarra'),
(964, 23, 26, 'Alvarado'),
(965, 23, 30, 'Ambalema'),
(966, 23, 43, 'Anzoategui'),
(967, 23, 55, 'Armero (guayabal)'),
(968, 23, 67, 'Ataco'),
(969, 23, 124, 'Cajamarca'),
(970, 23, 148, 'Carmen apicala'),
(971, 23, 152, 'Casabianca'),
(972, 23, 168, 'Chaparral'),
(973, 23, 200, 'Coello'),
(974, 23, 217, 'Coyaima'),
(975, 23, 226, 'Cunday'),
(976, 23, 236, 'Dolores'),
(977, 23, 268, 'Espinal'),
(978, 23, 270, 'Falan'),
(979, 23, 275, 'Flandes'),
(980, 23, 283, 'Fresno'),
(981, 23, 319, 'Guamo'),
(982, 23, 347, 'Herveo'),
(983, 23, 349, 'Honda'),
(984, 23, 352, 'Icononzo'),
(985, 23, 408, 'Lerida'),
(986, 23, 411, 'Libano'),
(987, 23, 443, 'Mariquita'),
(988, 23, 449, 'Melgar'),
(989, 23, 461, 'Murillo'),
(990, 23, 483, 'Natagaima'),
(991, 23, 504, 'Ortega'),
(992, 23, 520, 'Palocabildo'),
(993, 23, 547, 'Piedras'),
(994, 23, 555, 'Planadas'),
(995, 23, 563, 'Prado'),
(996, 23, 585, 'Purificacion'),
(997, 23, 616, 'Rioblanco'),
(998, 23, 622, 'Roncesvalles'),
(999, 23, 624, 'Rovira'),
(1000, 23, 671, 'Saldaña'),
(1001, 23, 675, 'San antonio'),
(1002, 23, 678, 'San luis'),
(1003, 23, 686, 'Santa isabel'),
(1004, 23, 770, 'Suarez'),
(1005, 23, 854, 'Valle de san juan'),
(1006, 23, 861, 'Venadillo'),
(1007, 23, 870, 'Villahermosa'),
(1008, 23, 873, 'Villarrica'),
(1009, 24, 1, 'Cali (santiago de cali)'),
(1010, 24, 20, 'Alcala'),
(1011, 24, 36, 'Andalucia'),
(1012, 24, 41, 'Ansermanuevo'),
(1013, 24, 54, 'Argelia'),
(1014, 24, 100, 'Bolivar'),
(1015, 24, 109, 'Buenaventura'),
(1016, 24, 111, 'Buga'),
(1017, 24, 113, 'Bugalagrande'),
(1018, 24, 122, 'Caicedonia'),
(1019, 24, 126, 'Calima (darien)'),
(1020, 24, 130, 'Candelaria'),
(1021, 24, 147, 'Cartago'),
(1022, 24, 233, 'Dagua'),
(1023, 24, 243, 'El aguila'),
(1024, 24, 246, 'El cairo'),
(1025, 24, 248, 'El cerrito'),
(1026, 24, 250, 'El dovio'),
(1027, 24, 275, 'Florida'),
(1028, 24, 306, 'Ginebra'),
(1029, 24, 318, 'Guacari'),
(1030, 24, 364, 'Jamundi'),
(1031, 24, 377, 'La cumbre'),
(1032, 24, 400, 'La union'),
(1033, 24, 403, 'La victoria'),
(1034, 24, 497, 'Obando'),
(1035, 24, 520, 'Palmira'),
(1036, 24, 563, 'Pradera'),
(1037, 24, 606, 'Restrepo'),
(1038, 24, 616, 'Riofrio'),
(1039, 24, 622, 'Roldanillo'),
(1040, 24, 670, 'San pedro'),
(1041, 24, 736, 'Sevilla'),
(1042, 24, 823, 'Toro'),
(1043, 24, 828, 'Trujillo'),
(1044, 24, 834, 'Tulua'),
(1045, 24, 845, 'Ulloa'),
(1046, 24, 863, 'Versalles'),
(1047, 24, 869, 'Vijes'),
(1048, 24, 890, 'Yotoco'),
(1049, 24, 892, 'Yumbo'),
(1050, 24, 895, 'Zarzal'),
(1051, 25, 1, 'Arauca'),
(1052, 25, 65, 'Arauquita'),
(1053, 25, 220, 'Cravo norte'),
(1054, 25, 300, 'Fortul'),
(1055, 25, 591, 'Puerto rondon'),
(1056, 25, 736, 'Saravena'),
(1057, 25, 794, 'Tame'),
(1058, 26, 1, 'Yopal'),
(1059, 26, 10, 'Aguazul'),
(1060, 26, 15, 'Chameza'),
(1061, 26, 125, 'Hato corozal'),
(1062, 26, 136, 'La salina'),
(1063, 26, 139, 'Mani'),
(1064, 26, 162, 'Monterrey'),
(1065, 26, 225, 'Nunchia'),
(1066, 26, 230, 'Orocue'),
(1067, 26, 250, 'Paz de ariporo'),
(1068, 26, 263, 'Pore'),
(1069, 26, 279, 'Recetor'),
(1070, 26, 300, 'Sabanalarga'),
(1071, 26, 315, 'Sacama'),
(1072, 26, 325, 'San luis de palenque'),
(1073, 26, 400, 'Tamara'),
(1074, 26, 410, 'Tauramena'),
(1075, 26, 430, 'Trinidad'),
(1076, 26, 440, 'Villanueva'),
(1077, 27, 1, 'Mocoa'),
(1078, 27, 219, 'Colon'),
(1079, 27, 320, 'Orito'),
(1080, 27, 568, 'Puerto asis'),
(1081, 27, 569, 'Puerto caicedo'),
(1082, 27, 571, 'Puerto guzman'),
(1083, 27, 573, 'Puerto leguizamo'),
(1084, 27, 749, 'Sibundoy'),
(1085, 27, 755, 'San francisco'),
(1086, 27, 757, 'San miguel (la dorada)'),
(1087, 27, 760, 'Santiago'),
(1088, 27, 865, 'La hormiga (valle del guamuez)'),
(1089, 27, 885, 'Villagarzon'),
(1090, 28, 1, 'San andres'),
(1091, 28, 564, 'Providencia'),
(1092, 29, 1, 'Leticia'),
(1093, 29, 263, 'El encanto'),
(1094, 29, 405, 'La chorrera'),
(1095, 29, 407, 'La pedrera'),
(1096, 29, 430, 'La victoria'),
(1097, 29, 460, 'Miriti-parana'),
(1098, 29, 530, 'Puerto alegria'),
(1099, 29, 536, 'Puerto arica'),
(1100, 29, 540, 'Puerto nariño'),
(1101, 29, 669, 'Puerto santander'),
(1102, 29, 798, 'Tarapaca'),
(1103, 30, 1, 'Puerto inirida'),
(1104, 30, 343, 'Barranco minas'),
(1105, 30, 883, 'San felipe'),
(1106, 30, 884, 'Puerto colombia'),
(1107, 30, 885, 'La guadalupe'),
(1108, 30, 886, 'Cacahual'),
(1109, 30, 887, 'Pana pana (campo alegre)'),
(1110, 30, 888, 'Morichal (morichal nuevo)'),
(1111, 31, 1, 'San jose del guaviare'),
(1112, 31, 15, 'Calamar'),
(1113, 31, 25, 'El retorno'),
(1114, 31, 200, 'Miraflores'),
(1115, 32, 1, 'Mitu'),
(1116, 32, 161, 'Caruru'),
(1117, 32, 511, 'Pacoa'),
(1118, 32, 666, 'Taraira'),
(1119, 32, 777, 'Papunaua (morichal)'),
(1120, 32, 889, 'Yavarate'),
(1121, 33, 1, 'Puerto carreño'),
(1122, 33, 524, 'La primavera'),
(1123, 33, 572, 'Santa rita'),
(1124, 33, 666, 'Santa rosalia'),
(1125, 33, 760, 'San jose de ocune'),
(1126, 33, 773, 'Cumaribo');

-- --------------------------------------------------------

--
-- Table structure for table `notas`
--

CREATE TABLE `notas` (
  `ID_NOTA` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_MASCOTA` bigint(20) NOT NULL,
  `FECHA_NOTA` date NOT NULL,
  `ID_USUARIO` bigint(11) NOT NULL,
  `NOTA` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `notas`
--

INSERT INTO `notas` (`ID_NOTA`, `ID_EMPRESA`, `ID_MASCOTA`, `FECHA_NOTA`, `ID_USUARIO`, `NOTA`) VALUES
(6, 900221406, 1, '2022-03-17', 1110588476, 'si');

-- --------------------------------------------------------

--
-- Table structure for table `peluqueria`
--

CREATE TABLE `peluqueria` (
  `ID_PELUQUERIA` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_MASCOTA` bigint(20) NOT NULL,
  `ID_PROP` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `FEC_PELUQUERIA` date NOT NULL,
  `TIPO_CORTE` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ACCESORIOS` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CORTE_UNAS` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `BANO_MEDICADO` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `DETALLE` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `PRECIO_PELUQUERIA` bigint(20) NOT NULL,
  `ESTADO_PELUQUERIA` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `peluqueria`
--

INSERT INTO `peluqueria` (`ID_PELUQUERIA`, `ID_EMPRESA`, `ID_MASCOTA`, `ID_PROP`, `FEC_PELUQUERIA`, `TIPO_CORTE`, `ACCESORIOS`, `CORTE_UNAS`, `BANO_MEDICADO`, `DETALLE`, `PRECIO_PELUQUERIA`, `ESTADO_PELUQUERIA`) VALUES
(2, 900221406, 1, '1110588476', '2022-03-18', 'Largo', 'Camiseta', 'NO', 'Si', 'prueba\r\n prueba\r\n prueba\r\n prueba\r\n prueba\r\n prueba\r\n prueba\r\n prueba\r\n ', 40000, 'Cancelado'),
(4, 900221406, 1, '1110588476', '2022-03-23', 'Largo', 'Moño', 'Si', 'Si', 'prueba2\n', 40000, 'Realizado'),
(5, 900221406, 1, '1110588476', '2022-01-01', 'Largo', 'Moño', 'Si', 'NO', 'pruebas 23', 50000, 'Realizado'),
(6, 900221406, 1, '1110588476', '2022-03-16', 'Bajo', 'Camiseta', 'Si', 'NO', 'sdasd', 40, 'Realizado'),
(12, 900221406, 1, '1110588476', '2022-03-17', 'Medio', 'Moño', 'Si', 'Si', 'aas', 1, 'Cancelado'),
(13, 900221406, 1, '1110588476', '2022-03-10', 'Medio', 'Camiseta', 'Si', 'NO', '12', 40, 'Realizado');

-- --------------------------------------------------------

--
-- Table structure for table `procedimientos`
--

CREATE TABLE `procedimientos` (
  `ID_PROCED` bigint(20) NOT NULL,
  `ID_PROC_CVP` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_MASCOTA` bigint(20) NOT NULL,
  `ID_PROP` bigint(20) NOT NULL,
  `DETALLE` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `FEC_PROCED` date NOT NULL,
  `TIPO_PROCED` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `ID_PRO` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PROD_INV` int(11) NOT NULL,
  `NOM_PRO` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ID_GRUPO` bigint(20) NOT NULL,
  `FEC_VEN` date NOT NULL,
  `CANTIDAD` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`ID_PRO`, `ID_EMPRESA`, `ID_PROD_INV`, `NOM_PRO`, `ID_GRUPO`, `FEC_VEN`, `CANTIDAD`) VALUES
(1, 900221406, 1, 'Producto Prueba', 1, '2022-03-17', 2),
(2, 900221406, 2, 'Producto 2', 1, '2022-03-15', 3);

-- --------------------------------------------------------

--
-- Table structure for table `propietarios`
--

CREATE TABLE `propietarios` (
  `ID_PROP` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `TIPO_DOC` varchar(4) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ST_NOM` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ND_NOM` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ST_APE` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ND_APE` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `DEPARTAMENTO` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CIUDAD` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `DIRECCION` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `TELEFONO` bigint(20) NOT NULL,
  `TELEFONO2` bigint(20) NOT NULL,
  `EMAIL` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `propietarios`
--

INSERT INTO `propietarios` (`ID_PROP`, `ID_EMPRESA`, `TIPO_DOC`, `ST_NOM`, `ND_NOM`, `ST_APE`, `ND_APE`, `DEPARTAMENTO`, `CIUDAD`, `DIRECCION`, `TELEFONO`, `TELEFONO2`, `EMAIL`) VALUES
(1110588476, 900221406, 'CC', 'Brian', 'Steven', 'Beltran', 'Martinez', '23', '962', 'Calle 136 #98A-32', 3158289950, 0, 'steven-0198@hotmail.com'),
(38254646, 900221406, 'CC', 'Maria', 'Ismelida', 'Martinez', '', '23', '962', 'Calle 103 #100-92', 3138967493, 0, 'maria.isme@hotmail.com'),
(11105884761, 830085336, 'CC', 'Brianss', 'Stevensss', 'Beltran', 'Martinez', '23', '962', 'Calle 136 #98A-32', 3158289950, 0, 'steven-0198@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `prop_masc`
--

CREATE TABLE `prop_masc` (
  `ID_PROP_MASC` bigint(20) NOT NULL,
  `ID_MASCOTA` bigint(20) NOT NULL,
  `ID_PROP` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `TIPO_PROP` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ESTADO_PROP_MASC` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vacunas`
--

CREATE TABLE `vacunas` (
  `ID_VACUNA_PRO` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_MASCOTA` bigint(20) NOT NULL,
  `ID_PROP` bigint(20) NOT NULL,
  `FEC_VACUNA` date NOT NULL,
  `ID_VACUNA` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `PRESENTACION` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `LOTE` bigint(20) NOT NULL,
  `VENCIMIENTO` date NOT NULL,
  `DOSIS` int(11) NOT NULL,
  `ULTIMA_VACUNA` date NOT NULL,
  `FECHA_SIG_VACUNA` date NOT NULL,
  `PROXIMA_VACUNA` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `DETALLE` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ESTADO_VACUNA` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `vacunas`
--

INSERT INTO `vacunas` (`ID_VACUNA_PRO`, `ID_EMPRESA`, `ID_MASCOTA`, `ID_PROP`, `FEC_VACUNA`, `ID_VACUNA`, `PRESENTACION`, `LOTE`, `VENCIMIENTO`, `DOSIS`, `ULTIMA_VACUNA`, `FECHA_SIG_VACUNA`, `PROXIMA_VACUNA`, `DETALLE`, `ESTADO_VACUNA`) VALUES
(11, 900221406, 1, 1110588476, '2022-12-31', '6', 'Dosis', 123, '2022-01-01', 11, '2022-01-01', '2022-12-31', 'Prueba Vacuna123', '123', 'Realizado'),
(13, 900221406, 1, 1110588476, '2022-12-31', '6', 'Dosis', 123, '2022-01-01', 456, '2022-01-01', '2022-12-31', 'Prueba Vacuna123', 'asdasd', 'Cancelado'),
(12, 900221406, 1, 1110588476, '2022-12-31', '5', 'Gr', 123, '2022-02-01', 456, '2022-01-01', '2022-12-31', 'Prueba Vacuna123', 'prueba21\n', 'Realizado'),
(14, 900221406, 1, 1110588476, '2022-03-20', '5', 'Gr', 123, '2022-03-07', 5, '2022-03-14', '2022-03-24', 'Funcionando Edit', 'eqewqe', 'Realizado');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`identyUser`);

--
-- Indexes for table `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`ID_CONSULTA`);

--
-- Indexes for table `cronograma`
--
ALTER TABLE `cronograma`
  ADD PRIMARY KEY (`ID_CRONO`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`ID_EMPRESA`);

--
-- Indexes for table `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`ID_HISTORIAL`);

--
-- Indexes for table `inventario_vacunas`
--
ALTER TABLE `inventario_vacunas`
  ADD PRIMARY KEY (`ID_VACUNA`);

--
-- Indexes for table `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`ID_MASCOTA`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`ID_NOTA`);

--
-- Indexes for table `peluqueria`
--
ALTER TABLE `peluqueria`
  ADD PRIMARY KEY (`ID_PELUQUERIA`);

--
-- Indexes for table `procedimientos`
--
ALTER TABLE `procedimientos`
  ADD PRIMARY KEY (`ID_PROCED`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_PRO`);

--
-- Indexes for table `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`ID_PROP`);

--
-- Indexes for table `prop_masc`
--
ALTER TABLE `prop_masc`
  ADD PRIMARY KEY (`ID_PROP_MASC`);

--
-- Indexes for table `vacunas`
--
ALTER TABLE `vacunas`
  ADD PRIMARY KEY (`ID_VACUNA_PRO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultas`
--
ALTER TABLE `consultas`
  MODIFY `ID_CONSULTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cronograma`
--
ALTER TABLE `cronograma`
  MODIFY `ID_CRONO` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historial`
--
ALTER TABLE `historial`
  MODIFY `ID_HISTORIAL` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `inventario_vacunas`
--
ALTER TABLE `inventario_vacunas`
  MODIFY `ID_VACUNA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `ID_MASCOTA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notas`
--
ALTER TABLE `notas`
  MODIFY `ID_NOTA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peluqueria`
--
ALTER TABLE `peluqueria`
  MODIFY `ID_PELUQUERIA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `procedimientos`
--
ALTER TABLE `procedimientos`
  MODIFY `ID_PROCED` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_PRO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prop_masc`
--
ALTER TABLE `prop_masc`
  MODIFY `ID_PROP_MASC` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `ID_VACUNA_PRO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
