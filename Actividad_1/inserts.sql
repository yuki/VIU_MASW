-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql
-- Tiempo de generación: 13-07-2022 a las 06:42:58
-- Versión del servidor: 8.0.28
-- Versión de PHP: 8.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `actividad1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `celebrities`
--

CREATE TABLE `celebrities` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `born` date DEFAULT NULL,
  `nation` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `celebrities`
--

INSERT INTO `celebrities` (`id`, `name`, `surname`, `born`, `nation`, `url`) VALUES
(1, 'David', 'Swimmer', '1966-11-02', 'USA', 'https://www.imdb.com/name/nm0001710'),
(2, 'Jennifer', 'Aniston', '1969-02-11', 'USA', 'https://www.imdb.com/name/nm0000098'),
(3, 'Lisa', 'Kudrow', '1963-07-03', 'USA', 'https://www.imdb.com/name/nm0001435/'),
(4, 'Michael', 'C. Hall', '1971-02-01', 'USA', 'https://www.imdb.com/name/nm0355910/'),
(5, 'Damian', 'Lewis', '1971-02-11', 'UK', 'https://www.imdb.com/name/nm0507073/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `episodes`
--

CREATE TABLE `episodes` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `season` int DEFAULT NULL,
  `episode` int DEFAULT NULL,
  `sinopsis` varchar(512) DEFAULT NULL,
  `released` date DEFAULT NULL,
  `tvshow_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `episodes`
--

INSERT INTO `episodes` (`id`, `name`, `season`, `episode`, `sinopsis`, `released`, `tvshow_id`) VALUES
(1, 'Sin proposiciones', 9, 1, 'Rachel, Ross and Joey get together in a guyand figure out that no one was actually going to propose; Mr. Geller walks in on Monica and Chandler having sex.', '2002-09-26', 4),
(2, 'El de las Vegas', 5, 24, 'Chandler and Monica reconcile and hastily decide to get married. Ross and Rachel get drunk and roam the casino. Phoebe deals with a lurkeon the slot machines.', '1999-05-20', 4),
(3, 'Currahee', 1, 1, '', '2001-09-09', 3),
(4, 'Puntos', 1, 10, 'Los soldados reciben los puntos obtenidos durante la guerra.', NULL, 3),
(5, 'Dexter', 1, 1, '', '2006-10-01', 5),
(6, 'Cocodrilo', 1, 2, '', '2006-10-08', 5),
(7, 'Piloto', 1, 1, 'When the funeral director is killed in an accident, the family comes together to mourn and decide the fate of the funeral home.', '2001-06-03', 6),
(8, 'Piloto', 1, 1, 'A CIA case officer becomes suspicious that a Marine Sergeant war hero rescued after eight years of captivity in Afghanistan, has been turned into a sleeper agent by Al Qaeda.', '2012-04-09', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `episodes_celebrities`
--

CREATE TABLE `episodes_celebrities` (
  `episode_id` int NOT NULL,
  `celebrity_id` int NOT NULL,
  `perform_as` enum('director','actor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `episodes_celebrities`
--

INSERT INTO `episodes_celebrities` (`episode_id`, `celebrity_id`, `perform_as`) VALUES
(2, 1, 'actor'),
(3, 1, 'actor'),
(4, 1, 'actor'),
(1, 2, 'actor'),
(2, 2, 'actor'),
(1, 3, 'actor'),
(2, 3, 'actor'),
(5, 4, 'actor'),
(6, 4, 'actor'),
(7, 4, 'actor'),
(3, 5, 'actor'),
(4, 5, 'actor'),
(8, 5, 'actor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `episodes_languages`
--

CREATE TABLE `episodes_languages` (
  `episode_id` int NOT NULL,
  `language_id` int NOT NULL DEFAULT '0',
  `type` enum('audio','subtitle') NOT NULL
) ;

--
-- Volcado de datos para la tabla `episodes_languages`
--

INSERT INTO `episodes_languages` (`episode_id`, `language_id`, `type`) VALUES
(2, 1, 'audio'),
(3, 1, 'subtitle'),
(7, 1, 'audio'),
(2, 2, 'audio'),
(3, 2, 'audio'),
(3, 2, 'subtitle'),
(5, 2, 'audio'),
(8, 2, 'audio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languages`
--

CREATE TABLE `languages` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `rfc_code` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `languages`
--

INSERT INTO `languages` (`id`, `name`, `rfc_code`) VALUES
(1, 'Castellano', 'es-es'),
(2, 'English', 'en'),
(3, 'Euskera', 'eu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platforms`
--

CREATE TABLE `platforms` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `platforms`
--

INSERT INTO `platforms` (`id`, `name`) VALUES
(3, 'Amazon Prime'),
(2, 'HBO'),
(1, 'Netflix'),
(4, 'Showtime');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tvshows`
--

CREATE TABLE `tvshows` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `sinopsis` varchar(512) DEFAULT NULL,
  `platform_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tvshows`
--

INSERT INTO `tvshows` (`id`, `name`, `url`, `sinopsis`, `platform_id`) VALUES
(1, 'Stranger Things', 'https://www.imdb.com/title/tt4574334', 'Cuando un chico desaparece, su madre, el jefe de policía y sus amigos deben enfrentarse a fuerzas terroríficas para traerlo de vuelta.', 1),
(2, 'The Boys', 'https://www.imdb.com/title/tt1190634', 'Una historia de acción centrada en un escuadrón de la CIA con la misión de mantener a los superhéroes a raya a cualquier precio.', 3),
(3, 'Hermanos de sangre', 'https://www.imdb.com/title/tt0185906/', 'La historia de la Easy Company de la División Aerotransportada 101 del Ejército de los Estados Unidos y su misión en la Segunda Guerra Mundial en Europa, desde la Operación Overlord hasta el Día V-J.', 2),
(4, 'Friends', 'https://www.imdb.com/title/tt0108778/', 'La vida personal y profesional de seis amigos, de veinte a treinta y tantos años, que viven en Manhattan.', 1),
(5, 'Dexter', 'https://www.imdb.com/title/tt0773262/', 'Durante el día, Dexter es un analista para la policía de Miami. Pero por la noche, es un asesino en serie que solo ataca a otros asesinos.', 4),
(6, 'A dos metros bajo tierra', 'https://www.imdb.com/title/tt0248654/', 'Una comedia negra que sigue la vida de una disfuncional familia californiana que se dedica a llevar unas pompas fúnebres.', 2),
(7, 'Homeland', 'https://www.imdb.com/title/tt1796960', 'Un agente bipolar de la CIA se convence de que al-Qaeda ha convertido a un prisionero de guerra y planea llevar a cabo un ataque terrorista en suelo estadounidense.', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `celebrities`
--
ALTER TABLE `celebrities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tvshow_id` (`tvshow_id`);

--
-- Indices de la tabla `episodes_celebrities`
--
ALTER TABLE `episodes_celebrities`
  ADD PRIMARY KEY (`episode_id`,`celebrity_id`,`perform_as`),
  ADD KEY `celebrity_id` (`celebrity_id`);

--
-- Indices de la tabla `episodes_languages`
--
ALTER TABLE `episodes_languages`
  ADD PRIMARY KEY (`episode_id`,`language_id`,`type`),
  ADD KEY `language_id` (`language_id`);

--
-- Indices de la tabla `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `platforms`
--
ALTER TABLE `platforms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `tvshows`
--
ALTER TABLE `tvshows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `platform_id` (`platform_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `celebrities`
--
ALTER TABLE `celebrities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `platforms`
--
ALTER TABLE `platforms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tvshows`
--
ALTER TABLE `tvshows`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`tvshow_id`) REFERENCES `tvshows` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `episodes_celebrities`
--
ALTER TABLE `episodes_celebrities`
  ADD CONSTRAINT `episodes_celebrities_ibfk_1` FOREIGN KEY (`episode_id`) REFERENCES `episodes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `episodes_celebrities_ibfk_2` FOREIGN KEY (`celebrity_id`) REFERENCES `celebrities` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `episodes_languages`
--
ALTER TABLE `episodes_languages`
  ADD CONSTRAINT `episodes_languages_ibfk_1` FOREIGN KEY (`episode_id`) REFERENCES `episodes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `episodes_languages_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE SET;

--
-- Filtros para la tabla `tvshows`
--
ALTER TABLE `tvshows`
  ADD CONSTRAINT `tvshows_ibfk_1` FOREIGN KEY (`platform_id`) REFERENCES `platforms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
