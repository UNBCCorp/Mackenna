-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2024 a las 14:23:15
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
-- Base de datos: `mackenna`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorio_vehiculo`
--

CREATE TABLE `accesorio_vehiculo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `accesorio_vehiculo`
--

INSERT INTO `accesorio_vehiculo` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Luz led', '2024-08-03 22:30:16', '2024-08-03 22:30:16'),
(2, 'Exploradoras', '2024-08-03 22:30:28', '2024-08-03 22:30:28'),
(3, 'Gps', '2024-08-03 22:30:34', '2024-08-03 22:30:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('6a18c7c496046ee22a47b000a63c3fae', 'i:1;', 1722790934),
('6a18c7c496046ee22a47b000a63c3fae:timer', 'i:1722790934;', 1722790934);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Arica', NULL, NULL),
(2, 'Camarones', NULL, NULL),
(3, 'Putre', NULL, NULL),
(4, 'General Lagos', NULL, NULL),
(5, 'Iquique', NULL, NULL),
(6, 'Alto Hospicio', NULL, NULL),
(7, 'Pozo Almonte', NULL, NULL),
(8, 'Camiña', NULL, NULL),
(9, 'Colchane', NULL, NULL),
(10, 'Huara', NULL, NULL),
(11, 'Pica', NULL, NULL),
(12, 'Antofagasta', NULL, NULL),
(13, 'Mejillones', NULL, NULL),
(14, 'Sierra Gorda', NULL, NULL),
(15, 'Taltal', NULL, NULL),
(16, 'Calama', NULL, NULL),
(17, 'Ollagüe', NULL, NULL),
(18, 'San Pedro de Atacama', NULL, NULL),
(19, 'Tocopilla', NULL, NULL),
(20, 'María Elena', NULL, NULL),
(21, 'Copiapó', NULL, NULL),
(22, 'Caldera', NULL, NULL),
(23, 'Tierra Amarilla', NULL, NULL),
(24, 'Chañaral', NULL, NULL),
(25, 'Diego de Almagro', NULL, NULL),
(26, 'Vallenar', NULL, NULL),
(27, 'Alto del Carmen', NULL, NULL),
(28, 'Freirina', NULL, NULL),
(29, 'Huasco', NULL, NULL),
(30, 'La Serena', NULL, NULL),
(31, 'Coquimbo', NULL, NULL),
(32, 'Andacollo', NULL, NULL),
(33, 'La Higuera', NULL, NULL),
(34, 'Paiguano', NULL, NULL),
(35, 'Vicuña', NULL, NULL),
(36, 'Illapel', NULL, NULL),
(37, 'Canela', NULL, NULL),
(38, 'Los Vilos', NULL, NULL),
(39, 'Salamanca', NULL, NULL),
(40, 'Ovalle', NULL, NULL),
(41, 'Combarbalá', NULL, NULL),
(42, 'Monte Patria', NULL, NULL),
(43, 'Punitaqui', NULL, NULL),
(44, 'Río Hurtado', NULL, NULL),
(45, 'Valparaíso', NULL, NULL),
(46, 'Casablanca', NULL, NULL),
(47, 'Concón', NULL, NULL),
(48, 'Juan Fernández', NULL, NULL),
(49, 'Puchuncaví', NULL, NULL),
(50, 'Quintero', NULL, NULL),
(51, 'Viña del Mar', NULL, NULL),
(52, 'Isla de Pascua', NULL, NULL),
(53, 'Los Andes', NULL, NULL),
(54, 'Calle Larga', NULL, NULL),
(55, 'Rinconada', NULL, NULL),
(56, 'San Esteban', NULL, NULL),
(57, 'La Ligua', NULL, NULL),
(58, 'Cabildo', NULL, NULL),
(59, 'Papudo', NULL, NULL),
(60, 'Petorca', NULL, NULL),
(61, 'Zapallar', NULL, NULL),
(62, 'Quillota', NULL, NULL),
(63, 'Calera', NULL, NULL),
(64, 'Hijuelas', NULL, NULL),
(65, 'La Cruz', NULL, NULL),
(66, 'Nogales', NULL, NULL),
(67, 'San Antonio', NULL, NULL),
(68, 'Algarrobo', NULL, NULL),
(69, 'Cartagena', NULL, NULL),
(70, 'El Quisco', NULL, NULL),
(71, 'El Tabo', NULL, NULL),
(72, 'Santo Domingo', NULL, NULL),
(73, 'San Felipe', NULL, NULL),
(74, 'Catemu', NULL, NULL),
(75, 'Llaillay', NULL, NULL),
(76, 'Panquehue', NULL, NULL),
(77, 'Putaendo', NULL, NULL),
(78, 'Santa María', NULL, NULL),
(79, 'Quilpué', NULL, NULL),
(80, 'Limache', NULL, NULL),
(81, 'Olmué', NULL, NULL),
(82, 'Villa Alemana', NULL, NULL),
(83, 'Rancagua', NULL, NULL),
(84, 'Codegua', NULL, NULL),
(85, 'Coinco', NULL, NULL),
(86, 'Coltauco', NULL, NULL),
(87, 'Doñihue', NULL, NULL),
(88, 'Graneros', NULL, NULL),
(89, 'Las Cabras', NULL, NULL),
(90, 'Machalí', NULL, NULL),
(91, 'Malloa', NULL, NULL),
(92, 'Mostazal', NULL, NULL),
(93, 'Olivar', NULL, NULL),
(94, 'Peumo', NULL, NULL),
(95, 'Pichidegua', NULL, NULL),
(96, 'Quinta de Tilcoco', NULL, NULL),
(97, 'Rengo', NULL, NULL),
(98, 'Requínoa', NULL, NULL),
(99, 'San Vicente', NULL, NULL),
(100, 'Pichilemu', NULL, NULL),
(101, 'La Estrella', NULL, NULL),
(102, 'Litueche', NULL, NULL),
(103, 'Marchihue', NULL, NULL),
(104, 'Navidad', NULL, NULL),
(105, 'Paredones', NULL, NULL),
(106, 'San Fernando', NULL, NULL),
(107, 'Chépica', NULL, NULL),
(108, 'Chimbarongo', NULL, NULL),
(109, 'Lolol', NULL, NULL),
(110, 'Nancagua', NULL, NULL),
(111, 'Palmilla', NULL, NULL),
(112, 'Peralillo', NULL, NULL),
(113, 'Placilla', NULL, NULL),
(114, 'Pumanque', NULL, NULL),
(115, 'Santa Cruz', NULL, NULL),
(116, 'Talca', NULL, NULL),
(117, 'Constitución', NULL, NULL),
(118, 'Curepto', NULL, NULL),
(119, 'Empedrado', NULL, NULL),
(120, 'Maule', NULL, NULL),
(121, 'Pelarco', NULL, NULL),
(122, 'Pencahue', NULL, NULL),
(123, 'Río Claro', NULL, NULL),
(124, 'San Clemente', NULL, NULL),
(125, 'San Rafael', NULL, NULL),
(126, 'Cauquenes', NULL, NULL),
(127, 'Chanco', NULL, NULL),
(128, 'Pelluhue', NULL, NULL),
(129, 'Curicó', NULL, NULL),
(130, 'Hualañé', NULL, NULL),
(131, 'Licantén', NULL, NULL),
(132, 'Molina', NULL, NULL),
(133, 'Rauco', NULL, NULL),
(134, 'Romeral', NULL, NULL),
(135, 'Sagrada Familia', NULL, NULL),
(136, 'Teno', NULL, NULL),
(137, 'Vichuquén', NULL, NULL),
(138, 'Linares', NULL, NULL),
(139, 'Colbún', NULL, NULL),
(140, 'Longaví', NULL, NULL),
(141, 'Parral', NULL, NULL),
(142, 'Retiro', NULL, NULL),
(143, 'San Javier', NULL, NULL),
(144, 'Villa Alegre', NULL, NULL),
(145, 'Yerbas Buenas', NULL, NULL),
(146, 'Concepción', NULL, NULL),
(147, 'Coronel', NULL, NULL),
(148, 'Chiguayante', NULL, NULL),
(149, 'Florida', NULL, NULL),
(150, 'Hualqui', NULL, NULL),
(151, 'Lota', NULL, NULL),
(152, 'Penco', NULL, NULL),
(153, 'San Pedro de la Paz', NULL, NULL),
(154, 'Santa Juana', NULL, NULL),
(155, 'Talcahuano', NULL, NULL),
(156, 'Tomé', NULL, NULL),
(157, 'Hualpén', NULL, NULL),
(158, 'Lebu', NULL, NULL),
(159, 'Arauco', NULL, NULL),
(160, 'Cañete', NULL, NULL),
(161, 'Contulmo', NULL, NULL),
(162, 'Curanilahue', NULL, NULL),
(163, 'Los Álamos', NULL, NULL),
(164, 'Tirúa', NULL, NULL),
(165, 'Los Ángeles', NULL, NULL),
(166, 'Antuco', NULL, NULL),
(167, 'Cabrero', NULL, NULL),
(168, 'Laja', NULL, NULL),
(169, 'Mulchén', NULL, NULL),
(170, 'Nacimiento', NULL, NULL),
(171, 'Negrete', NULL, NULL),
(172, 'Quilaco', NULL, NULL),
(173, 'Quilleco', NULL, NULL),
(174, 'San Rosendo', NULL, NULL),
(175, 'Santa Bárbara', NULL, NULL),
(176, 'Tucapel', NULL, NULL),
(177, 'Yumbel', NULL, NULL),
(178, 'Alto Biobío', NULL, NULL),
(179, 'Chillán', NULL, NULL),
(180, 'Bulnes', NULL, NULL),
(181, 'Cobquecura', NULL, NULL),
(182, 'Coelemu', NULL, NULL),
(183, 'Coihueco', NULL, NULL),
(184, 'Chillán Viejo', NULL, NULL),
(185, 'El Carmen', NULL, NULL),
(186, 'Ninhue', NULL, NULL),
(187, 'Ñiquén', NULL, NULL),
(188, 'Pemuco', NULL, NULL),
(189, 'Pinto', NULL, NULL),
(190, 'Portezuelo', NULL, NULL),
(191, 'Quillón', NULL, NULL),
(192, 'Quirihue', NULL, NULL),
(193, 'Ránquil', NULL, NULL),
(194, 'San Carlos', NULL, NULL),
(195, 'San Fabián', NULL, NULL),
(196, 'San Ignacio', NULL, NULL),
(197, 'San Nicolás', NULL, NULL),
(198, 'Treguaco', NULL, NULL),
(199, 'Yungay', NULL, NULL),
(200, 'Temuco', NULL, NULL),
(201, 'Carahue', NULL, NULL),
(202, 'Cunco', NULL, NULL),
(203, 'Curarrehue', NULL, NULL),
(204, 'Freire', NULL, NULL),
(205, 'Galvarino', NULL, NULL),
(206, 'Gorbea', NULL, NULL),
(207, 'Lautaro', NULL, NULL),
(208, 'Loncoche', NULL, NULL),
(209, 'Melipeuco', NULL, NULL),
(210, 'Nueva Imperial', NULL, NULL),
(211, 'Padre las Casas', NULL, NULL),
(212, 'Perquenco', NULL, NULL),
(213, 'Pitrufquén', NULL, NULL),
(214, 'Pucón', NULL, NULL),
(215, 'Saavedra', NULL, NULL),
(216, 'Teodoro Schmidt', NULL, NULL),
(217, 'Toltén', NULL, NULL),
(218, 'Vilcún', NULL, NULL),
(219, 'Villarrica', NULL, NULL),
(220, 'Cholchol', NULL, NULL),
(221, 'Angol', NULL, NULL),
(222, 'Collipulli', NULL, NULL),
(223, 'Curacautín', NULL, NULL),
(224, 'Ercilla', NULL, NULL),
(225, 'Lonquimay', NULL, NULL),
(226, 'Los Sauces', NULL, NULL),
(227, 'Lumaco', NULL, NULL),
(228, 'Purén', NULL, NULL),
(229, 'Renaico', NULL, NULL),
(230, 'Traiguén', NULL, NULL),
(231, 'Victoria', NULL, NULL),
(232, 'Valdivia', NULL, NULL),
(233, 'Corral', NULL, NULL),
(234, 'Lanco', NULL, NULL),
(235, 'Los Lagos', NULL, NULL),
(236, 'Máfil', NULL, NULL),
(237, 'Mariquina', NULL, NULL),
(238, 'Paillaco', NULL, NULL),
(239, 'Panguipulli', NULL, NULL),
(240, 'La Unión', NULL, NULL),
(241, 'Futrono', NULL, NULL),
(242, 'Lago Ranco', NULL, NULL),
(243, 'Río Bueno', NULL, NULL),
(244, 'Puerto Montt', NULL, NULL),
(245, 'Calbuco', NULL, NULL),
(246, 'Cochamó', NULL, NULL),
(247, 'Fresia', NULL, NULL),
(248, 'Frutillar', NULL, NULL),
(249, 'Los Muermos', NULL, NULL),
(250, 'Llanquihue', NULL, NULL),
(251, 'Maullín', NULL, NULL),
(252, 'Puerto Varas', NULL, NULL),
(253, 'Castro', NULL, NULL),
(254, 'Ancud', NULL, NULL),
(255, 'Chonchi', NULL, NULL),
(256, 'Curaco de Vélez', NULL, NULL),
(257, 'Dalcahue', NULL, NULL),
(258, 'Puqueldón', NULL, NULL),
(259, 'Queilén', NULL, NULL),
(260, 'Quellón', NULL, NULL),
(261, 'Quemchi', NULL, NULL),
(262, 'Quinchao', NULL, NULL),
(263, 'Osorno', NULL, NULL),
(264, 'Puerto Octay', NULL, NULL),
(265, 'Purranque', NULL, NULL),
(266, 'Puyehue', NULL, NULL),
(267, 'Río Negro', NULL, NULL),
(268, 'San Juan de la Costa', NULL, NULL),
(269, 'San Pablo', NULL, NULL),
(270, 'Chaitén', NULL, NULL),
(271, 'Futaleufú', NULL, NULL),
(272, 'Hualaihué', NULL, NULL),
(273, 'Palena', NULL, NULL),
(274, 'Coyhaique', NULL, NULL),
(275, 'Lago Verde', NULL, NULL),
(276, 'Aysén', NULL, NULL),
(277, 'Cisnes', NULL, NULL),
(278, 'Guaitecas', NULL, NULL),
(279, 'Cochrane', NULL, NULL),
(280, 'O’Higgins', NULL, NULL),
(281, 'Tortel', NULL, NULL),
(282, 'Chile Chico', NULL, NULL),
(283, 'Río Ibáñez', NULL, NULL),
(284, 'Punta Arenas', NULL, NULL),
(285, 'Laguna Blanca', NULL, NULL),
(286, 'Río Verde', NULL, NULL),
(287, 'San Gregorio', NULL, NULL),
(288, 'Cabo de Hornos', NULL, NULL),
(289, 'Antártica', NULL, NULL),
(290, 'Porvenir', NULL, NULL),
(291, 'Primavera', NULL, NULL),
(292, 'Timaukel', NULL, NULL),
(293, 'Natales', NULL, NULL),
(294, 'Torres del Paine', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `tipo_cliente` varchar(255) NOT NULL,
  `tipo_identificacion` varchar(255) NOT NULL,
  `identificacion` varchar(255) NOT NULL,
  `ciudad_expedicion_identificacion` varchar(255) NOT NULL,
  `identificacion_pais` varchar(255) NOT NULL,
  `fecha_expedicion_identificacion` date NOT NULL,
  `fecha_caducidad_identificacion` date NOT NULL,
  `carnet` varchar(255) NOT NULL,
  `ciudad_expedicion_carnet` varchar(255) NOT NULL,
  `carnet_pais` varchar(255) NOT NULL,
  `carnet_fecha_expedicion` date NOT NULL,
  `carnet_fecha_caducidad` date NOT NULL,
  `tipo_carnet` varchar(255) NOT NULL,
  `ciudad_nacido` varchar(255) NOT NULL,
  `pais_nacido` varchar(255) NOT NULL,
  `fecha_nacido` date NOT NULL,
  `indicendias` text NOT NULL,
  `numero_telefonico` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto_identificacion` varchar(255) NOT NULL,
  `foto_licencia` varchar(255) NOT NULL,
  `foto_cliente` varchar(255) NOT NULL,
  `direccion_habitual` varchar(255) NOT NULL,
  `codigo_postal_habitual` varchar(255) NOT NULL,
  `municipio_habitual` varchar(255) NOT NULL,
  `provincia_habitual` varchar(255) NOT NULL,
  `pais_habitual` varchar(255) NOT NULL,
  `direccion_local` varchar(255) NOT NULL,
  `codigo_postal_local` varchar(255) NOT NULL,
  `municipio_local` varchar(255) NOT NULL,
  `provincia_local` varchar(255) NOT NULL,
  `pais_local` varchar(255) NOT NULL,
  `conductor_empresa` varchar(255) NOT NULL,
  `mailing` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `medio_pago` varchar(255) NOT NULL,
  `observaciones` varchar(255) NOT NULL,
  `avisos` varchar(255) NOT NULL,
  `canles_restringidos` varchar(255) NOT NULL,
  `consentimiento` varchar(255) NOT NULL,
  `inhabilidades` varchar(255) NOT NULL,
  `idiomas` varchar(255) NOT NULL,
  `estado_cliente` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_empresa`
--

CREATE TABLE `clientes_empresa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `tipo_cliente` varchar(255) NOT NULL,
  `cuenta_contable` varchar(255) NOT NULL,
  `razon_social` varchar(255) NOT NULL,
  `sector_economico` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `codigo_postal` varchar(255) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `provincia` varchar(255) NOT NULL,
  `tipo_documento` varchar(255) NOT NULL,
  `numero_documento` varchar(255) NOT NULL,
  `pais_documento` varchar(255) NOT NULL,
  `persona_contacto` varchar(255) NOT NULL,
  `numero_contacto` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `web` varchar(255) NOT NULL,
  `sucursal` varchar(255) NOT NULL,
  `idiomas` varchar(255) NOT NULL,
  `observaciones` varchar(255) NOT NULL,
  `medio_pago` varchar(255) NOT NULL,
  `dias_credito` int(11) NOT NULL,
  `canal` varchar(255) NOT NULL,
  `vent_dia` varchar(255) NOT NULL,
  `vehiculo_propio` varchar(255) NOT NULL,
  `acuerdos` varchar(255) NOT NULL,
  `opciones` varchar(255) NOT NULL,
  `tarifas` varchar(255) NOT NULL,
  `documento` varchar(255) NOT NULL,
  `documento2` varchar(255) NOT NULL,
  `documento3` varchar(255) NOT NULL,
  `estado_cliente` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipamiento_vehiculo`
--

CREATE TABLE `equipamiento_vehiculo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `equipamiento_vehiculo`
--

INSERT INTO `equipamiento_vehiculo` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Equipamiento 1', '2024-08-03 22:30:48', '2024-08-03 22:30:48'),
(2, 'Equipamiento 2', '2024-08-03 22:31:01', '2024-08-03 22:31:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_vehiculo`
--

CREATE TABLE `estado_vehiculo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grafico_vehiculo`
--

CREATE TABLE `grafico_vehiculo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ruta_archivo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `grafico_vehiculo`
--

INSERT INTO `grafico_vehiculo` (`id`, `nombre`, `ruta_archivo`, `created_at`, `updated_at`) VALUES
(1, 'Camioneta', '1722706273.jpg', '2024-08-03 22:31:13', '2024-08-03 22:31:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Español', NULL, NULL),
(2, 'Inglés', NULL, NULL),
(3, 'Francés', NULL, NULL),
(4, 'Portugués', NULL, NULL),
(5, 'Alemán', NULL, NULL),
(6, 'Italiano', NULL, NULL),
(7, 'Chino', NULL, NULL),
(8, 'Japonés', NULL, NULL),
(9, 'Coreano', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_vehiculo`
--

CREATE TABLE `marca_vehiculo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marca_vehiculo`
--

INSERT INTO `marca_vehiculo` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'BMW', '2024-08-03 22:31:36', '2024-08-03 22:31:36'),
(2, 'Mazda', '2024-08-03 22:31:41', '2024-08-03 22:31:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2024_07_17_192242_create_permiso_table', 3),
(10, '2024_07_17_192252_create_tipo_vehiculo_table', 3),
(12, '2024_07_17_192242_create_permisos_table', 4),
(51, '0001_01_01_000000_create_users_table', 5),
(52, '0001_01_01_000001_create_cache_table', 5),
(53, '0001_01_01_000002_create_jobs_table', 5),
(54, '2024_07_17_184139_add_two_factor_columns_to_users_table', 5),
(55, '2024_07_17_184203_create_personal_access_tokens_table', 5),
(56, '2024_07_17_184410_add_fields_to_users_table', 5),
(57, '2024_07_17_192236_create_tipo_documento_table', 5),
(58, '2024_07_17_192247_create_user_groups_table', 5),
(59, '2024_07_17_192252_create_tipo_vehiculos_table', 5),
(60, '2024_07_17_192256_create_marca_vehiculo_table', 5),
(61, '2024_07_17_204011_create_permisos_table', 5),
(62, '2024_07_18_133646_create_equipamiento_vehiculo_table', 5),
(63, '2024_07_18_133712_create_accesorio_vehiculo_table', 5),
(64, '2024_07_18_133725_create_tipo_combustible_table', 5),
(65, '2024_07_18_133738_create_tipo_caja_table', 5),
(66, '2024_07_18_133815_create_tipo_itv_table', 5),
(67, '2024_07_18_133828_create_estado_vehiculo_table', 5),
(68, '2024_07_18_133847_create_grafico_vehiculo_table', 5),
(69, '2024_07_18_134437_create_modelo_vehiculo_table', 5),
(70, '2024_07_20_204839_create_tarifas_table', 5),
(71, '2024_07_20_232820_add_modulo_to_permisos_table', 5),
(72, '2024_07_24_162332_create_clientes_table', 5),
(73, '2024_07_24_163716_create_clientes_empresa_table', 5),
(74, '2024_07_25_182742_create_paises_table', 5),
(75, '2024_07_25_191759_create_idiomas_table', 5),
(76, '2024_07_25_193333_create_sector_comercial_table', 5),
(77, '2024_07_30_151650_create_sucursales_table', 5),
(78, '2024_07_30_152043_create_ciudades_table', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo_vehiculo`
--

CREATE TABLE `modelo_vehiculo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo_combustible` varchar(255) DEFAULT NULL,
  `capacidad_combustible` varchar(255) DEFAULT NULL,
  `tipo_caja` varchar(255) DEFAULT NULL,
  `equipamiento_vehiculo` varchar(255) DEFAULT NULL,
  `accesorio_vehiculo` varchar(255) DEFAULT NULL,
  `tipo_itv` varchar(255) DEFAULT NULL,
  `grafico_vehiculo_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo_vehiculo` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modelo_vehiculo`
--

INSERT INTO `modelo_vehiculo` (`id`, `nombre`, `tipo_combustible`, `capacidad_combustible`, `tipo_caja`, `equipamiento_vehiculo`, `accesorio_vehiculo`, `tipo_itv`, `grafico_vehiculo_id`, `created_at`, `updated_at`, `tipo_vehiculo`, `marca`, `grupo`) VALUES
(2, 'CX50', '1', '65', '2', '\"[\\\"1\\\",\\\"2\\\"]\"', '\"[\\\"1\\\",\\\"2\\\",\\\"3\\\"]\"', '1', '1', '2024-08-04 23:34:57', '2024-08-05 00:26:02', '\"2\"', '2', 0),
(3, 'CX30', '1', '30', '1', '[\"1\"]', '[\"1\",\"2\",\"3\"]', '1', '1', '2024-08-04 23:35:21', '2024-08-04 23:35:21', '\"1\"', '2', 0),
(4, 'I3', '1', '20', '2', '\"[\\\"1\\\",\\\"2\\\"]\"', '\"[\\\"1\\\",\\\"2\\\",\\\"3\\\"]\"', '1', '1', '2024-08-05 02:13:02', '2024-08-05 02:27:03', '\"camion\"', '1', 1),
(5, 'i5', '1', '60', '2', '\"[\\\"2\\\"]\"', '\"[\\\"1\\\",\\\"2\\\",\\\"3\\\"]\"', '1', '1', '2024-08-05 02:18:43', '2024-08-05 02:29:58', '\"turismo\"', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Albania', NULL, NULL),
(2, 'Alemania', NULL, NULL),
(3, 'Andorra', NULL, NULL),
(4, 'Argentina', NULL, NULL),
(5, 'Armenia', NULL, NULL),
(6, 'Austria', NULL, NULL),
(7, 'Azerbaiyán', NULL, NULL),
(8, 'Bahamas', NULL, NULL),
(9, 'Barbados', NULL, NULL),
(10, 'Belice', NULL, NULL),
(11, 'Bélgica', NULL, NULL),
(12, 'Bielorrusia', NULL, NULL),
(13, 'Bolivia', NULL, NULL),
(14, 'Bosnia y Herzegovina', NULL, NULL),
(15, 'Brasil', NULL, NULL),
(16, 'Bulgaria', NULL, NULL),
(17, 'Canadá', NULL, NULL),
(18, 'Chile', NULL, NULL),
(19, 'Chipre', NULL, NULL),
(20, 'Colombia', NULL, NULL),
(21, 'Costa Rica', NULL, NULL),
(22, 'Croacia', NULL, NULL),
(23, 'Cuba', NULL, NULL),
(24, 'Dinamarca', NULL, NULL),
(25, 'Dominica', NULL, NULL),
(26, 'Ecuador', NULL, NULL),
(27, 'El Salvador', NULL, NULL),
(28, 'Eslovaquia', NULL, NULL),
(29, 'Eslovenia', NULL, NULL),
(30, 'España', NULL, NULL),
(31, 'Estados Unidos', NULL, NULL),
(32, 'Estonia', NULL, NULL),
(33, 'Finlandia', NULL, NULL),
(34, 'Francia', NULL, NULL),
(35, 'Georgia', NULL, NULL),
(36, 'Granada', NULL, NULL),
(37, 'Grecia', NULL, NULL),
(38, 'Guatemala', NULL, NULL),
(39, 'Guyana', NULL, NULL),
(40, 'Haití', NULL, NULL),
(41, 'Honduras', NULL, NULL),
(42, 'Hungría', NULL, NULL),
(43, 'Irlanda', NULL, NULL),
(44, 'Islandia', NULL, NULL),
(45, 'Italia', NULL, NULL),
(46, 'Jamaica', NULL, NULL),
(47, 'Kazajistán', NULL, NULL),
(48, 'Letonia', NULL, NULL),
(49, 'Liechtenstein', NULL, NULL),
(50, 'Lituania', NULL, NULL),
(51, 'Luxemburgo', NULL, NULL),
(52, 'Macedonia del Norte', NULL, NULL),
(53, 'Malta', NULL, NULL),
(54, 'México', NULL, NULL),
(55, 'Moldavia', NULL, NULL),
(56, 'Mónaco', NULL, NULL),
(57, 'Montenegro', NULL, NULL),
(58, 'Nicaragua', NULL, NULL),
(59, 'Noruega', NULL, NULL),
(60, 'Países Bajos', NULL, NULL),
(61, 'Panamá', NULL, NULL),
(62, 'Paraguay', NULL, NULL),
(63, 'Perú', NULL, NULL),
(64, 'Polonia', NULL, NULL),
(65, 'Portugal', NULL, NULL),
(66, 'Reino Unido', NULL, NULL),
(67, 'República Checa', NULL, NULL),
(68, 'República Dominicana', NULL, NULL),
(69, 'Rumania', NULL, NULL),
(70, 'Rusia', NULL, NULL),
(71, 'San Cristóbal y Nieves', NULL, NULL),
(72, 'San Marino', NULL, NULL),
(73, 'San Vicente y las Granadinas', NULL, NULL),
(74, 'Santa Lucía', NULL, NULL),
(75, 'Serbia', NULL, NULL),
(76, 'Suecia', NULL, NULL),
(77, 'Suiza', NULL, NULL),
(78, 'Surinam', NULL, NULL),
(79, 'Trinidad y Tobago', NULL, NULL),
(80, 'Ucrania', NULL, NULL),
(81, 'Uruguay', NULL, NULL),
(82, 'Vaticano', NULL, NULL),
(83, 'Venezuela', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('ale132402@hotmail.com', '$2y$12$dHhGUo0hlXx10WQEhDrpSellIUwW.RMsTur1ekmRBy1vX1f4znIeS', '2024-08-04 23:42:09'),
('jorrjecasanova@gmail.com', '$2y$12$MKKoG2gLW.SpYjl8sMV0X.e71U1IF9SnX5qQUYDimUNoWKs2dk.Pi', '2024-08-03 22:27:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `modulo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombre`, `modulo`, `created_at`, `updated_at`) VALUES
(1, 'crear marca', 'vehículos', '2024-07-19 22:49:57', '2024-07-19 22:49:57'),
(2, 'ver marca', 'vehículos', '2024-07-19 22:49:57', '2024-07-19 22:49:57'),
(3, 'editar marca', 'vehículos', '2024-07-19 22:49:57', '2024-07-19 22:49:57'),
(4, 'eliminar marca', 'vehículos', '2024-07-19 22:49:57', '2024-07-19 22:49:57'),
(5, 'crear clase vehículo', 'vehículos', '2024-07-19 22:49:57', '2024-07-19 22:49:57'),
(6, 'editar clase vehículo', 'vehículos', '2024-07-19 22:49:57', '2024-07-19 22:49:57'),
(7, 'ver clase vehículo', 'vehículos', '2024-07-19 22:49:57', '2024-07-19 22:49:57'),
(8, 'eliminar clase vehículo', 'vehículos', '2024-07-19 22:49:57', '2024-07-19 22:49:57'),
(9, 'crear roles', 'usuario', '2024-07-19 22:49:57', '2024-07-19 22:49:57'),
(10, 'ver roles', 'usuario', '2024-07-19 22:49:57', '2024-07-19 22:49:57'),
(11, 'editar roles', 'usuario', '2024-07-19 22:49:57', '2024-07-19 22:49:57'),
(12, 'eliminar roles', 'usuario', '2024-07-19 22:49:57', '2024-07-19 22:49:57'),
(13, 'crear tarifa', 'tarifa', NULL, NULL),
(14, 'ver tarifa', 'tarifa', NULL, NULL),
(15, 'editar tarifa', 'tarifa', NULL, NULL),
(16, 'eliminar tarifa', 'tarifa', NULL, NULL),
(17, 'ver usuario', 'usuario', NULL, NULL),
(18, 'crear usuario', 'usuario', NULL, NULL),
(19, 'editar usuario', 'usuario', NULL, NULL),
(20, 'eliminar usuario', 'usuario', NULL, NULL),
(21, 'ver sucursal', 'sucursal', NULL, NULL),
(22, 'crear sucursal', 'sucursal', NULL, NULL),
(23, 'editar sucursal', 'sucursal', NULL, NULL),
(24, 'eliminar sucursal', 'sucursal', NULL, NULL),
(25, 'ver accesorios', 'vehículos', NULL, NULL),
(26, 'crear accesorios', 'vehículos', NULL, NULL),
(27, 'editar accesorios', 'vehículos', NULL, NULL),
(28, 'eliminar accesorios', 'vehículos', NULL, NULL),
(29, 'ver equipamientos', 'vehículos', NULL, NULL),
(30, 'crear equipamientos', 'vehículos', NULL, NULL),
(31, 'editar equipamientos', 'vehículos', NULL, NULL),
(32, 'eliminar equipamientos', 'vehículos', NULL, NULL),
(33, 'ver graficos', 'vehículos', NULL, NULL),
(34, 'crear graficos', 'vehículos', NULL, NULL),
(35, 'editar graficos', 'vehículos', NULL, NULL),
(36, 'eliminar graficos', 'vehículos', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector_comercial`
--

CREATE TABLE `sector_comercial` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sector_comercial`
--

INSERT INTO `sector_comercial` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Retail (Venta al por menor)', NULL, NULL),
(2, 'Comercio Mayorista', NULL, NULL),
(3, 'Comercio Electrónico', NULL, NULL),
(4, 'Alimentación y Bebidas', NULL, NULL),
(5, 'Moda y Textiles', NULL, NULL),
(6, 'Franquicias', NULL, NULL),
(7, 'Servicios Comerciales', NULL, NULL),
(8, 'Comercio Internacional', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('O997oxKmmGT0SQU6GttwoGCkMR7qfySPTKGAXXvM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOFFjc281NWFNNTR1eElJTWsyTnB3ZXpPQ3JlZlBubTFvYVlpZlRMdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1722812593);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `tipo_sucursal` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `nombre`, `ciudad`, `direccion`, `tipo_sucursal`, `created_at`, `updated_at`) VALUES
(1, 'Rac portales', 'Osorno', 'Direccion 1', 'Sucursal', NULL, NULL),
(2, 'Rac aeropuerto ZOS', 'Osorno', 'Direccion 2', 'Sucursal', NULL, NULL),
(3, 'taller blanco encalada', 'Osorno', 'Direccion 3', 'Taller', NULL, NULL),
(4, 'bodega Pilauco', 'Osorno', 'Direccion 4', 'Bodega', NULL, NULL),
(5, 'automotriz Freire', 'Osorno', 'Direccion 5', 'Sucursal', NULL, NULL),
(6, 'bodega automotriz Freire', 'Osorno', 'Direccion 6', 'Bodega', NULL, NULL),
(7, 'Rac Pedro Aguirre cerda 18', 'Puerto Montt', 'Direccion 7', 'Sucursal', NULL, NULL),
(8, 'Rac aeropuerto Tepual', 'Puerto Montt', 'Direccion 8', 'Sucursal', NULL, NULL),
(9, 'bodega aeropuerto tepual', 'Puerto Montt', 'Direccion 9', 'Bodega', NULL, NULL),
(10, 'estacionamiento tepual', 'Puerto Montt', 'Direccion 10', 'Estacionamiento', NULL, NULL),
(11, 'estacionamiento Tepual II', 'Puerto Montt', 'Direccion 11', 'Estacionamiento', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `porcentaje` decimal(5,2) NOT NULL,
  `tipo_vehiculo` varchar(255) NOT NULL,
  `users` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`id`, `nombre`, `porcentaje`, `tipo_vehiculo`, `users`, `created_at`, `updated_at`) VALUES
(1, 'Tarifa 5', 5.00, '[\"1\",\"2\"]', '', '2024-08-03 22:32:04', '2024-08-03 23:35:34'),
(2, 'Tarifa 2%', 2.00, '[\"1\"]', '', '2024-08-03 22:32:16', '2024-08-03 22:32:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_caja`
--

CREATE TABLE `tipo_caja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_caja`
--

INSERT INTO `tipo_caja` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Manual', NULL, NULL),
(2, 'Automática', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_combustible`
--

CREATE TABLE `tipo_combustible` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_combustible`
--

INSERT INTO `tipo_combustible` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Gasolina', NULL, NULL),
(2, 'Diésel', NULL, NULL),
(3, 'Gas Licuado de Petróleo (GLP)', NULL, NULL),
(4, 'Gas Natural Comprimido (GNC)', NULL, NULL),
(5, 'Eléctrico', NULL, NULL),
(6, 'Híbrido', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'DNI', '2024-08-03 22:13:58', '2024-08-03 22:13:58'),
(2, 'Cédula de Extranjería', '2024-08-03 22:13:58', '2024-08-03 22:13:58'),
(3, 'Pasaporte', '2024-08-03 22:13:58', '2024-08-03 22:13:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_itv`
--

CREATE TABLE `tipo_itv` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_itv`
--

INSERT INTO `tipo_itv` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Inspección Técnica Anual', NULL, NULL),
(2, 'Inspección Técnica Preventiva', NULL, NULL),
(3, 'Inspección de Emisiones Contaminantes', NULL, NULL),
(4, 'Inspección de Frenos', NULL, NULL),
(5, 'Inspección de Seguridad Vehicular', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vehiculos`
--

CREATE TABLE `tipo_vehiculos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_vehiculos`
--

INSERT INTO `tipo_vehiculos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'A', '2024-08-03 22:31:25', '2024-08-03 22:31:25'),
(2, 'B', '2024-08-03 22:31:29', '2024-08-03 22:31:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `tipo_documento` varchar(255) DEFAULT NULL,
  `numero_documento` varchar(255) DEFAULT NULL,
  `numero_telefonico` varchar(255) DEFAULT NULL,
  `tipo_usuario` varchar(255) DEFAULT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `apellido`, `tipo_documento`, `numero_documento`, `numero_telefonico`, `tipo_usuario`, `estado`) VALUES
(1, 'Jorge', 'jorjecasanova@gmail.com', NULL, '$2y$12$eGffcERN7wvNq5OcVsRDFOkSW7QACTPAS3WT3.9rbkPcCZTGuQJdq', NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-03 22:27:52', '2024-08-03 22:29:11', 'Casierra', '1', '1006320237', '3046405009', '1', 'Activo'),
(2, 'Carlos', 'ale132402@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-04 23:42:09', '2024-08-04 23:42:09', 'Casierra', '1', '1006320237', '3046405009', '1', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_groups`
--

CREATE TABLE `user_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `permisos` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_groups`
--

INSERT INTO `user_groups` (`id`, `nombre`, `permisos`, `created_at`, `updated_at`) VALUES
(1, 'admin', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"9\",\"10\",\"11\",\"12\",\"17\",\"18\",\"19\",\"20\",\"13\",\"14\",\"15\",\"16\",\"21\",\"22\",\"23\",\"24\"]', NULL, '2024-08-03 22:29:34'),
(2, 'user', '[\"9\",\"10\",\"11\",\"12\"]', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesorio_vehiculo`
--
ALTER TABLE `accesorio_vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes_empresa`
--
ALTER TABLE `clientes_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipamiento_vehiculo`
--
ALTER TABLE `equipamiento_vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_vehiculo`
--
ALTER TABLE `estado_vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `grafico_vehiculo`
--
ALTER TABLE `grafico_vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marca_vehiculo`
--
ALTER TABLE `marca_vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modelo_vehiculo`
--
ALTER TABLE `modelo_vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `sector_comercial`
--
ALTER TABLE `sector_comercial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_caja`
--
ALTER TABLE `tipo_caja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_combustible`
--
ALTER TABLE `tipo_combustible`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_itv`
--
ALTER TABLE `tipo_itv`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_vehiculos`
--
ALTER TABLE `tipo_vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesorio_vehiculo`
--
ALTER TABLE `accesorio_vehiculo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes_empresa`
--
ALTER TABLE `clientes_empresa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipamiento_vehiculo`
--
ALTER TABLE `equipamiento_vehiculo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_vehiculo`
--
ALTER TABLE `estado_vehiculo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grafico_vehiculo`
--
ALTER TABLE `grafico_vehiculo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca_vehiculo`
--
ALTER TABLE `marca_vehiculo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `modelo_vehiculo`
--
ALTER TABLE `modelo_vehiculo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sector_comercial`
--
ALTER TABLE `sector_comercial`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_caja`
--
ALTER TABLE `tipo_caja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_combustible`
--
ALTER TABLE `tipo_combustible`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_itv`
--
ALTER TABLE `tipo_itv`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_vehiculos`
--
ALTER TABLE `tipo_vehiculos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
