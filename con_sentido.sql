-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2024 a las 14:48:24
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `con_sentido`
--
CREATE DATABASE IF NOT EXISTS `con_sentido` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `con_sentido`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `Num_Cit` int(11) NOT NULL,
  `Id_Pac` int(11) DEFAULT NULL,
  `Fec_Cit` date DEFAULT NULL,
  `Hor_Cit` varchar(5) NOT NULL,
  `Fec_Sol` datetime DEFAULT current_timestamp(),
  `Id_Pla` int(11) DEFAULT NULL,
  `Cod_Pro` varchar(9) DEFAULT NULL,
  `Cod_Prf` varchar(10) DEFAULT NULL,
  `Cit_Esta` varchar(15) NOT NULL,
  `Cit_Obs` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`Num_Cit`, `Id_Pac`, `Fec_Cit`, `Hor_Cit`, `Fec_Sol`, `Id_Pla`, `Cod_Pro`, `Cod_Prf`, `Cit_Esta`, `Cit_Obs`) VALUES
(10, 13, '2019-11-13', '08:00', '2019-11-14 17:36:35', 2, '01', 'MAYERLYG', 'Cancelada', 'qwqweqweqwe'),
(11, 15, '2019-11-01', '08:00', '2019-11-14 17:36:47', 3, '01', 'MAYERLYG', 'Cancelada', 'WQEWEW'),
(12, 13, '2019-11-15', '19:00', '2019-11-14 18:12:25', 3, '04', 'LUISAN', 'Reservada', ''),
(13, 13, '2019-11-18', '08:00', '2019-11-14 18:13:17', 3, '01', 'LUISAN', 'Cancelada', 'PRUEBAS'),
(14, 18, '2024-04-19', '14:00', '2024-04-19 22:00:26', 5, '03', 'VIVIANAM', 'Cancelada', 'QWERTYUIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinica`
--

CREATE TABLE `clinica` (
  `Id_Pac` int(11) NOT NULL,
  `Id_Fol` int(11) NOT NULL,
  `Num_Cit` int(11) DEFAULT NULL,
  `Cit_Esta` varchar(20) DEFAULT NULL,
  `HC_Desc` varchar(1000) DEFAULT NULL,
  `HC_Peso` int(11) DEFAULT NULL,
  `HC_Alt` int(11) DEFAULT NULL,
  `HC_IMC` int(11) DEFAULT NULL,
  `HC_Ant` varchar(500) DEFAULT NULL,
  `HC_Fam` varchar(500) NOT NULL,
  `HC_Obs` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clinica`
--

INSERT INTO `clinica` (`Id_Pac`, `Id_Fol`, `Num_Cit`, `Cit_Esta`, `HC_Desc`, `HC_Peso`, `HC_Alt`, `HC_IMC`, `HC_Ant`, `HC_Fam`, `HC_Obs`) VALUES
(12, 1, 12, NULL, 'WERTYUI', 45, 3456, 4567, 'DFTGVYBHUJN', 'TFVGYBHNJ', 'TFGVYHBJN'),
(12, 2, 12, NULL, 'CVYBUHNI', 67, 678, 6789, 'H JKL', 'VBUHNIJMOK', 'GBHUNIJMK'),
(12, 3, 12, NULL, 'CVYBUHNI', 67, 678, 6789, 'H JKL', 'VBUHNIJMOK', 'GBHUNIJMK'),
(12, 4, 12, NULL, 'BHINJM', 67, 678, 678, 'YG HJ', 'YBUHJMIO', 'BUNIJM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `Id_Fac` int(11) NOT NULL,
  `Num_Cit` int(11) DEFAULT NULL,
  `Cod_Pro` varchar(9) DEFAULT NULL,
  `Pro_Val` int(11) DEFAULT NULL,
  `Fec_Fac` datetime DEFAULT NULL,
  `For_Pag` char(1) DEFAULT NULL,
  `Obs_Fac` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `Id_Pac` int(11) NOT NULL,
  `Tip_Doc` varchar(3) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Nro_Doc` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Nom_Pac` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Ape_Pac` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Nac_Pac` date NOT NULL,
  `Sex_Pac` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Civ_Pac` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Dir_Pac` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Bar_Pac` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Tel_Pac` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Cel_Pac` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Mai_Pac` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Reg_Pac` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`Id_Pac`, `Tip_Doc`, `Nro_Doc`, `Nom_Pac`, `Ape_Pac`, `Nac_Pac`, `Sex_Pac`, `Civ_Pac`, `Dir_Pac`, `Bar_Pac`, `Tel_Pac`, `Cel_Pac`, `Mai_Pac`, `Reg_Pac`) VALUES
(13, 'CC', '1021750847', 'ZARA DANIELA', 'RENGIFO LOPERA', '1985-03-17', 'FEMENINO', 'Soltero', 'CALLE 78 N 67-50', 'FERIAS', '3105859699', '3105859699', 'ZADA@HOTMAIL.COM', '2019-11-08 22:39:53'),
(14, 'CC', '202075010', 'CARMEN ALICIA', 'CABALLERO CALDERON', '1950-04-14', 'FEMENINO', 'Otro', 'AUTOPISTA NORTE 122-', 'CERRITO', '3215859699', '321585699', 'NO@N', '2019-11-08 22:42:28'),
(15, 'CC', '52352411', 'ANGELA MARIA', 'OLGUIN SUAREZ', '1979-09-01', 'FEMENINO', 'Soltero', 'CALLE 50 N 30-85', 'NICOLAS DE FEDERMAN', '3187859699', '3187859699', 'ANGELMA@GMAIL.COM', '2019-11-08 22:43:57'),
(16, 'CC', '1025130125', 'PAOLA', 'RODRIGUEZ', '1999-10-13', 'FEMENINO', 'Soltero', 'AV SUBA N 127-30', 'NIZA', '3214789699', '3214789699', 'PAORODRI_50@GMAIL.COM', '2019-11-08 22:45:25'),
(17, 'CC', '80021755', 'ALVARO', 'RONCANCIO', '1989-01-21', 'MASCULINO', 'Soltero', 'CALLE 13- 67-50', 'CHAPINERO', '3152541555', '3152541555', 'RONCANCIO67@GMAIL.COM', '2019-11-08 22:47:13'),
(18, 'CC', '123456764532', 'EMERSON', 'RODRIGUEZ', '1989-12-01', 'FEMENINO', 'Soltero', 'CALLL4 232 23R2', 'LAS LOMAS', '7243232352', '352521252', 'ER@DGW.COM', '2024-04-20 02:56:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_1`
--

CREATE TABLE `plan_1` (
  `Id_Pla` int(11) NOT NULL,
  `Nom_Pla` varchar(50) DEFAULT NULL,
  `Tip_Pro` int(11) DEFAULT NULL,
  `Cnt_Ses` int(11) DEFAULT NULL,
  `Pla_Val` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plan_1`
--

INSERT INTO `plan_1` (`Id_Pla`, `Nom_Pla`, `Tip_Pro`, `Cnt_Ses`, `Pla_Val`) VALUES
(2, 'PLAN REDUCCION CORPORAL GENERAL', 3, 20, NULL),
(3, 'PLAN REDUCCION CORPORAL LOCALIZADO', 3, 15, NULL),
(4, 'PLAN FACIAL MANCHAS', 4, 8, NULL),
(5, 'PLAN FACIAL REJUVENECIMIENTO', 4, 10, NULL),
(6, 'PLAN FACIAL ACNE', 4, 30, NULL),
(7, 'PLAN SPA PAREJAS', 5, 1, NULL),
(8, 'PLAN TALASOTERAPIA', 3, 5, NULL),
(9, 'PLAN POSTQUIRURGICO MAMOPLASTIA', 6, 10, NULL),
(10, 'PLAN POSTQUIRURGICO ABDOMINOPLASTIA-LIPOESCULTURA', 6, 10, NULL),
(11, 'PLAN POSTQUIRURGICO FACIAL', 6, 5, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_2`
--

CREATE TABLE `plan_2` (
  `Id_Pla` int(11) DEFAULT NULL,
  `Cod_Pro` varchar(9) DEFAULT NULL,
  `Pro_Val` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimiento`
--

CREATE TABLE `procedimiento` (
  `Cod_Pro` varchar(9) NOT NULL,
  `Nom_Pro` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `procedimiento`
--

INSERT INTO `procedimiento` (`Cod_Pro`, `Nom_Pro`) VALUES
('01', 'LIMPIEZA FACIAL PIEL NORMAL'),
('02', 'LIMPIEZA FACIAL PIEL GRASA'),
('03', 'LIMPIEZA FACIAL PIEL ALIPICA'),
('04', 'MASAJE ANTICELULITICO'),
('05', 'MASAJE TONIFICACION'),
('06', 'MASAJE RELAJANTE'),
('07', 'TERAPIA PIEDRAS VOLCANICAS'),
('08', 'TALASOTERAPIA'),
('09', 'TERAPIA BAMBU'),
('10', 'RADIOFRECUENCIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_plan`
--

CREATE TABLE `tipo_plan` (
  `Tip_Pro` int(11) NOT NULL,
  `Tip_Nom` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_plan`
--

INSERT INTO `tipo_plan` (`Tip_Pro`, `Tip_Nom`) VALUES
(3, 'CORPORAL'),
(4, 'FACIAL'),
(5, 'RELAJANTE'),
(6, 'POSTQUIRURGICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_prf`
--

CREATE TABLE `tipo_prf` (
  `Prf_Cod` int(11) NOT NULL,
  `Prf_Nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_prf`
--

INSERT INTO `tipo_prf` (`Prf_Cod`, `Prf_Nom`) VALUES
(2, 'NUTRICIONISTAS'),
(3, 'MEDICOS ESTETICISTAS'),
(4, 'ESTETICISTAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` varchar(10) CHARACTER SET utf32 COLLATE utf32_spanish2_ci NOT NULL,
  `nombre` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `nombre`, `apellido`, `tipo`, `estado`) VALUES
('YENNYG', 'YENNY', 'GUTIERREZ', 'ADMINISTRADOR', 'ACTIVO'),
('SANTIGOR', 'SANTIAGO', 'RODRIGUEZ', 'ADMINISTRADOR', 'INACTIVO'),
('MAYERLYG', 'MAYERLY ', 'GUEVARA', 'MEDICOS ESTETIC', 'ACTIVO'),
('VIVIANAM', 'VIVIANA ', 'MESA', 'NUTRICIONISTAS', 'ACTIVO'),
('LUISAN', 'LUISA FERNANDA', 'NIETO', 'ESTETICISTAS', 'ACTIVO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`Num_Cit`),
  ADD KEY `Id_Pac` (`Id_Pac`),
  ADD KEY `Id_Pla` (`Id_Pla`),
  ADD KEY `Cod_Pro` (`Cod_Pro`),
  ADD KEY `Cod_Prf` (`Cod_Prf`);

--
-- Indices de la tabla `clinica`
--
ALTER TABLE `clinica`
  ADD PRIMARY KEY (`Id_Pac`,`Id_Fol`),
  ADD KEY `Num_Cit` (`Num_Cit`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`Id_Fac`),
  ADD KEY `Num_Cit` (`Num_Cit`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`Id_Pac`);

--
-- Indices de la tabla `plan_1`
--
ALTER TABLE `plan_1`
  ADD PRIMARY KEY (`Id_Pla`),
  ADD KEY `Tip_Pro` (`Tip_Pro`);

--
-- Indices de la tabla `plan_2`
--
ALTER TABLE `plan_2`
  ADD KEY `Id_Pla` (`Id_Pla`),
  ADD KEY `Cod_Pro` (`Cod_Pro`);

--
-- Indices de la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  ADD PRIMARY KEY (`Cod_Pro`);

--
-- Indices de la tabla `tipo_plan`
--
ALTER TABLE `tipo_plan`
  ADD PRIMARY KEY (`Tip_Pro`);

--
-- Indices de la tabla `tipo_prf`
--
ALTER TABLE `tipo_prf`
  ADD PRIMARY KEY (`Prf_Cod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `Num_Cit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `Id_Fac` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `Id_Pac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `plan_1`
--
ALTER TABLE `plan_1`
  MODIFY `Id_Pla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo_plan`
--
ALTER TABLE `tipo_plan`
  MODIFY `Tip_Pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_prf`
--
ALTER TABLE `tipo_prf`
  MODIFY `Prf_Cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`Id_Pac`) REFERENCES `pacientes` (`Id_Pac`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`Num_Cit`) REFERENCES `cita` (`Num_Cit`);

--
-- Filtros para la tabla `plan_1`
--
ALTER TABLE `plan_1`
  ADD CONSTRAINT `plan_1_ibfk_1` FOREIGN KEY (`Tip_Pro`) REFERENCES `tipo_plan` (`Tip_Pro`);

--
-- Filtros para la tabla `plan_2`
--
ALTER TABLE `plan_2`
  ADD CONSTRAINT `plan_2_ibfk_1` FOREIGN KEY (`Id_Pla`) REFERENCES `plan_1` (`Id_Pla`),
  ADD CONSTRAINT `plan_2_ibfk_2` FOREIGN KEY (`Cod_Pro`) REFERENCES `procedimiento` (`Cod_Pro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
