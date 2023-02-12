-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2023 a las 15:00:00
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vouchers`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vouchers_table`
--

CREATE TABLE `vouchers_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `meal_type` enum('Almuerzo','Cena') DEFAULT NULL,
  `voucher_time` timestamp NULL DEFAULT current_timestamp(),
  `company` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vouchers_table`
--

INSERT INTO `vouchers_table` (`id`, `name`, `meal_type`, `voucher_time`, `company`) VALUES
(1, 'hernan laurel', 'Almuerzo', '2023-02-08 01:43:54', NULL),
(2, 'hernan laurel 2', 'Almuerzo', '2023-02-08 01:44:22', NULL),
(3, 'hernan laurel 2', 'Almuerzo', '2023-02-08 01:53:54', NULL),
(4, 'hernan laurel 2', 'Cena', '2023-02-08 01:56:42', NULL),
(5, 'hernan laurel 2', 'Cena', '2023-02-08 01:56:48', NULL),
(6, 'fernanda laurel', 'Cena', '2023-02-08 02:02:17', NULL),
(7, 'fernanda laurel', 'Almuerzo', '2023-02-08 02:07:53', NULL),
(8, 'fernanda laurel', 'Almuerzo', '2023-02-08 02:09:16', NULL),
(9, 'fernanda laurel', 'Almuerzo', '2023-02-08 02:09:21', NULL),
(10, 'pamela', 'Almuerzo', '2023-02-08 02:25:31', NULL),
(11, 'pamela 2', 'Almuerzo', '2023-02-08 02:34:12', NULL),
(12, 'try 2', 'Cena', '2023-02-08 20:20:57', NULL),
(13, 'hernan laurel 2', 'Cena', '2023-02-08 20:40:18', NULL),
(14, 'fernanda laurel', 'Cena', '2023-02-08 20:40:36', NULL),
(15, 'pamela 2', 'Cena', '2023-02-08 20:41:38', NULL),
(16, 'pamela 2', 'Cena', '2023-02-08 20:49:51', NULL),
(17, 'pamela 2', 'Cena', '2023-02-08 20:51:14', NULL),
(18, 'pamela 2', 'Cena', '2023-02-09 00:57:46', NULL),
(19, 'hernan laurel 2', 'Cena', '2023-02-09 00:57:49', NULL),
(20, 'pamela 2', 'Cena', '2023-02-09 00:58:03', NULL),
(21, 'hernan laurel', 'Cena', '2023-02-09 00:59:51', NULL),
(22, 'fernanda laurel', 'Cena', '2023-02-09 01:00:01', NULL),
(23, 'try 2', 'Cena', '2023-02-09 01:00:51', NULL),
(24, 'hernan laurel 2', 'Cena', '2023-02-09 01:07:00', NULL),
(25, 'try 2', 'Cena', '2023-02-08 21:13:44', NULL),
(26, 'fernanda laurel', 'Cena', '2023-02-09 01:10:16', NULL),
(27, 'hernan laurel 2', 'Cena', '2023-02-09 01:12:17', NULL),
(28, 'fernanda laurel', 'Cena', '2023-02-09 01:15:14', NULL),
(29, 'hernan laurel', 'Cena', '2023-02-09 01:16:22', NULL),
(30, 'pamela', 'Cena', '2023-02-09 01:17:50', NULL),
(31, 'fernanda laurel', 'Cena', '2023-02-09 01:17:55', NULL),
(32, 'hernan laurel 2', 'Cena', '2023-02-09 01:19:28', NULL),
(33, 'try 2', 'Cena', '2023-02-09 01:19:35', NULL),
(34, 'fernanda laurel', 'Cena', '2023-02-09 01:21:02', NULL),
(35, 'hernan laurel 2', 'Cena', '2023-02-09 01:28:28', NULL),
(36, 'hernan laurel 2', 'Cena', '2023-02-09 01:28:42', NULL),
(37, 'try 2', 'Cena', '2023-02-09 01:28:45', NULL),
(38, 'hernan laurel 2', 'Cena', '2023-02-09 01:31:47', NULL),
(39, 'nada nadia', 'Cena', '2023-02-09 01:34:13', NULL),
(40, 'fernanda laurel', 'Cena', '2023-02-08 21:38:46', NULL),
(41, 'hernan laurel 2', 'Cena', '2023-02-08 21:46:18', 'Casino'),
(42, 'hernan laurel 2', 'Cena', '2023-02-08 21:46:21', 'Casino'),
(43, 'fernanda laurel', 'Cena', '2023-02-08 21:46:35', 'Casino'),
(44, 'hernan laurel 2', 'Cena', '2023-02-08 21:46:43', 'Externo'),
(45, 'pamela', 'Cena', '2023-02-08 21:53:19', 'Grupo Clean'),
(46, 'fernanda laurel', 'Cena', '2023-02-08 22:05:59', 'Casino'),
(47, 'hernan laurel 2', 'Cena', '2023-02-08 22:14:30', 'Casino'),
(48, 'pamela', 'Cena', '2023-02-08 22:14:47', 'Hotel'),
(49, 'hernan laurel', 'Cena', '2023-02-08 22:15:08', 'Hotel'),
(50, 'no se su nombre', 'Cena', '2023-02-08 22:15:50', 'Externo'),
(51, 'hernan laurel 2', 'Cena', '2023-02-08 22:23:11', 'Casino'),
(52, 'hernan laurel 2', 'Cena', '2023-02-08 22:29:37', 'Casino'),
(53, 'hernan laurel 2', 'Cena', '2023-02-08 22:31:05', 'Casino'),
(54, 'hernan laurel 2', 'Cena', '2023-02-08 22:31:08', 'Casino'),
(55, 'hernan laurel 2', 'Cena', '2023-02-08 22:35:28', 'Casino'),
(56, 'hernan laurel 2', 'Cena', '2023-02-08 22:35:55', 'Casino'),
(57, 'fernanda laurel', 'Cena', '2023-02-08 22:35:58', 'Casino'),
(58, 'fernanda laurel', 'Cena', '2023-02-08 22:36:35', 'Casino'),
(59, 'hernan laurel 2', 'Cena', '2023-02-08 22:46:19', 'Casino'),
(60, 'pedro quintana', 'Cena', '2023-02-08 22:48:18', 'Hotel'),
(61, 'hernan laurel 2', 'Cena', '2023-02-08 23:04:06', 'Casino'),
(62, 'fernanda laurel', 'Cena', '2023-02-08 23:04:17', 'Casino'),
(63, 'hernan laurel 2', 'Cena', '2023-02-08 23:05:20', 'Casino'),
(64, 'hernan laurel 2', 'Cena', '2023-02-08 23:12:20', 'Casino'),
(65, 'hernan laurel 2', 'Cena', '2023-02-08 23:12:43', 'Casino'),
(66, 'hernan laurel 2', 'Cena', '2023-02-08 23:26:20', 'Casino'),
(67, 'hernan laurel 2', 'Cena', '2023-02-08 23:41:04', 'Casino'),
(68, 'hernan laurel 2', 'Cena', '2023-02-08 23:41:26', 'Casino'),
(69, 'pamela', 'Cena', '2023-02-08 23:42:36', 'Externo'),
(70, 'hernan laurel 2', 'Cena', '2023-02-08 23:45:08', 'Casino'),
(71, 'hernan laurel 2', 'Cena', '2023-02-08 23:52:27', 'Casino'),
(72, 'hernan laurel 2', 'Cena', '2023-02-08 23:53:24', 'Casino'),
(73, 'hernan laurel 2', 'Cena', '2023-02-08 23:58:30', 'Casino'),
(74, 'hernan laurel 2', 'Cena', '2023-02-09 00:09:35', 'Casino'),
(75, 'hernan laurel 2', 'Cena', '2023-02-09 00:16:24', 'Casino'),
(76, 'fernanda laurel', 'Cena', '2023-02-09 00:26:00', 'Casino'),
(77, 'hernan laurel 2', 'Cena', '2023-02-09 00:26:09', 'Casino'),
(78, 'hernan laurel 2', 'Cena', '2023-02-09 00:29:11', 'Casino'),
(79, 'hernan laurel 2', 'Cena', '2023-02-09 00:29:57', 'Casino'),
(80, 'hernan laurel 2', 'Cena', '2023-02-09 00:32:26', 'Casino'),
(81, 'hernan laurel 2', 'Cena', '2023-02-09 00:32:46', 'Grupo Clean'),
(82, 'try 2', 'Cena', '2023-02-09 00:33:16', 'Casino'),
(83, 'try 2', 'Cena', '2023-02-09 00:33:52', 'Casino'),
(84, 'hernan laurel 2', 'Cena', '2023-02-09 00:33:57', 'Casino'),
(85, 'try 2', 'Cena', '2023-02-09 00:34:02', 'Casino'),
(86, 'hernan laurel 2', 'Cena', '2023-02-09 00:38:16', 'Casino'),
(87, 'hernan laurel 2', 'Cena', '2023-02-09 00:41:31', 'Casino'),
(88, 'fernanda laurel', 'Cena', '2023-02-09 00:41:52', 'Grupo Clean'),
(89, 'hernan laurel 2', 'Cena', '2023-02-09 00:45:49', 'Casino'),
(90, 'try 2', 'Cena', '2023-02-09 00:46:02', 'Casino'),
(91, 'hernan laurel 2', 'Cena', '2023-02-09 00:47:17', 'Casino'),
(92, 'try 2', 'Cena', '2023-02-09 00:47:49', 'Casino'),
(93, 'fernanda laurel', 'Cena', '2023-02-09 00:48:53', 'Casino'),
(94, 'pamela', 'Cena', '2023-02-09 00:49:03', 'Grupo Clean'),
(95, 'hernan laurel 2', 'Cena', '2023-02-09 00:49:27', 'Casino'),
(96, 'fernanda laurel', 'Cena', '2023-02-09 00:51:24', 'Casino'),
(97, 'fernanda laurel', 'Cena', '2023-02-09 00:51:39', 'Casino'),
(98, 'hernan laurel 2', 'Cena', '2023-02-09 00:52:59', 'Grupo Clean'),
(99, 'hernan laurel 2', 'Cena', '2023-02-09 00:54:09', 'Casino'),
(100, 'hernan laurel', 'Cena', '2023-02-09 00:54:21', 'Casino'),
(101, 'fernanda laurel', 'Almuerzo', '2023-02-09 13:57:53', 'Casino'),
(102, 'pamela', 'Almuerzo', '2023-02-09 13:58:09', 'Grupo Clean'),
(103, 'hernan laurel', 'Almuerzo', '2023-02-09 13:59:18', 'Grupo Clean');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `vouchers_table`
--
ALTER TABLE `vouchers_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `vouchers_table`
--
ALTER TABLE `vouchers_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
