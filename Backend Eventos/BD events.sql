-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 09-09-2014 a les 15:22:41
-- Versió del servidor: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `events`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city` varchar(75) DEFAULT NULL,
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `lat` decimal(21,15) NOT NULL,
  `lng` decimal(21,15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Bolcant dades de la taula `city`
--

INSERT INTO `city` (`city`, `id`, `active`, `lat`, `lng`) VALUES
('barcelona', 1, 1, '41.405631000000000', '2.188021000000000');

-- --------------------------------------------------------

--
-- Estructura de la taula `coll_control`
--

CREATE TABLE IF NOT EXISTS `coll_control` (
  `content_to_city_id` int(12) NOT NULL,
  `shown` tinyint(1) DEFAULT '1',
  `published` tinyint(1) DEFAULT '0',
  `status` tinyint(4) DEFAULT '0' COMMENT '0 = draft',
  PRIMARY KEY (`content_to_city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `coll_control`
--

INSERT INTO `coll_control` (`content_to_city_id`, `shown`, `published`, `status`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `coll_events`
--

CREATE TABLE IF NOT EXISTS `coll_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id_event` int(15) NOT NULL,
  `parent_events_id` int(11) DEFAULT NULL COMMENT '0: parent Event',
  `has_no_collaborator` tinyint(1) DEFAULT '0',
  `collaborator_id` int(12) NOT NULL,
  `date_beg` date NOT NULL,
  `date_end` date NOT NULL,
  `shown` tinyint(1) NOT NULL DEFAULT '1',
  `has_contact` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1: _info has description text',
  `has_price_observations` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1: _info has price observations text',
  `has_price_unique` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1: price_unique',
  `outdoor` tinyint(1) NOT NULL DEFAULT '0',
  `well_dressed` tinyint(1) NOT NULL DEFAULT '0',
  `k_f` tinyint(1) NOT NULL DEFAULT '0',
  `n_l` tinyint(1) NOT NULL DEFAULT '0',
  `price_unique` float NOT NULL DEFAULT '0',
  `has_aternative_latlng` tinyint(1) NOT NULL DEFAULT '0',
  `lat` decimal(21,15) DEFAULT NULL,
  `lng` decimal(21,15) DEFAULT NULL,
  PRIMARY KEY (`id`,`city_id_event`),
  KEY `fk_coll_events_content_to_city2_idx` (`collaborator_id`),
  KEY `fk_coll_events_city1_idx` (`city_id_event`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Bolcant dades de la taula `coll_events`
--

INSERT INTO `coll_events` (`id`, `city_id_event`, `parent_events_id`, `has_no_collaborator`, `collaborator_id`, `date_beg`, `date_end`, `shown`, `has_contact`, `has_price_observations`, `has_price_unique`, `outdoor`, `well_dressed`, `k_f`, `n_l`, `price_unique`, `has_aternative_latlng`, `lat`, `lng`) VALUES
(1, 1, NULL, 0, 1, '2014-09-07', '2014-09-10', 1, 0, 0, 1, 1, 1, 1, 0, 10, 1, '41.094730000000000', '2.346720000000000');

-- --------------------------------------------------------

--
-- Estructura de la taula `coll_events_info`
--

CREATE TABLE IF NOT EXISTS `coll_events_info` (
  `events_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(75) DEFAULT NULL,
  `brief_description` varchar(200) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `description` text,
  `contact` mediumtext,
  `price_obervations` text,
  PRIMARY KEY (`events_id`,`language_id`),
  KEY `fk_coll_events_info_coll_events1_idx` (`events_id`),
  KEY `fk_coll_events_info_language1` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `coll_events_info`
--

INSERT INTO `coll_events_info` (`events_id`, `language_id`, `name`, `brief_description`, `location`, `description`, `contact`, `price_obervations`) VALUES
(1, 1, 'Picasso en el MNAC', 'Direct trade try-hard farm-to-table whatever, four loko Schlitz keytar viral mustache single-origin coffee DIY kitsch occupy twee pug.', NULL, 'Tattooed ethnic dreamcatcher High Life VHS tofu. Cliche readymade American Apparel bespoke twee, synth tattooed asymmetrical jean shorts fashion axe direct trade you probably haven''t heard of them tofu street art. Next level swag PBR, sartorial Banksy polaroid tote bag post-ironic ethical vegan try-hard fashion axe Shoreditch Brooklyn. ', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de la taula `coll_events_packs`
--

CREATE TABLE IF NOT EXISTS `coll_events_packs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `events_id` int(11) NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `pack` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`events_id`),
  KEY `fk_coll_events_packs_coll_events1_idx` (`events_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `coll_events_photo`
--

CREATE TABLE IF NOT EXISTS `coll_events_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `events_id` int(11) NOT NULL,
  `path` varchar(200) DEFAULT NULL,
  `is_cover` tinyint(1) NOT NULL DEFAULT '0',
  `copyright` varchar(45) DEFAULT NULL COMMENT 'in case the picture is not bitday''s propiety, the name of the author/owner/source of the picture',
  PRIMARY KEY (`id`,`events_id`),
  KEY `fk_coll_events_photo_coll_events1` (`events_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Bolcant dades de la taula `coll_events_photo`
--

INSERT INTO `coll_events_photo` (`id`, `events_id`, `path`, `is_cover`, `copyright`) VALUES
(1, 1, '/evt/photos/a.png', 1, '@casanovasalbert http://instagram.com/a.kujge'),
(2, 1, '/evt/photo/b.png', 0, '@username http://facebook.com/jashef/a');

-- --------------------------------------------------------

--
-- Estructura de la taula `coll_events_prices`
--

CREATE TABLE IF NOT EXISTS `coll_events_prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `events_id` int(11) NOT NULL,
  `age_beg` int(11) DEFAULT NULL COMMENT 'min = 0.',
  `age_end` int(11) DEFAULT NULL COMMENT 'MAX=100',
  `price` decimal(10,4) DEFAULT NULL,
  PRIMARY KEY (`id`,`events_id`),
  KEY `fk_coll_events_prices_coll_events2_idx` (`events_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `coll_events_schedules`
--

CREATE TABLE IF NOT EXISTS `coll_events_schedules` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `events_id` int(11) NOT NULL,
  `date_beg` date NOT NULL,
  `date_end` date NOT NULL,
  `shown` tinyint(1) NOT NULL DEFAULT '1',
  `notes` text,
  PRIMARY KEY (`id`,`events_id`,`date_beg`,`date_end`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_coll_events_schedules_coll_events1_idx` (`events_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Bolcant dades de la taula `coll_events_schedules`
--

INSERT INTO `coll_events_schedules` (`id`, `events_id`, `date_beg`, `date_end`, `shown`, `notes`) VALUES
(1, 1, '2014-09-07', '2014-09-10', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de la taula `coll_events_schedules_data`
--

CREATE TABLE IF NOT EXISTS `coll_events_schedules_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coll_events_schedules_id` int(15) NOT NULL,
  `day_id` tinyint(1) unsigned NOT NULL,
  `time_beg` time NOT NULL,
  `time_end` time NOT NULL,
  PRIMARY KEY (`id`,`coll_events_schedules_id`,`day_id`),
  KEY `fk_coll_events_schedules_data_coll_events_schedules1` (`coll_events_schedules_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Bolcant dades de la taula `coll_events_schedules_data`
--

INSERT INTO `coll_events_schedules_data` (`id`, `coll_events_schedules_id`, `day_id`, `time_beg`, `time_end`) VALUES
(1, 1, 1, '08:00:00', '12:00:00'),
(2, 1, 2, '09:00:00', '13:00:00'),
(3, 1, 3, '07:00:00', '11:00:00');

-- --------------------------------------------------------

--
-- Estructura de la taula `coll_events_topics`
--

CREATE TABLE IF NOT EXISTS `coll_events_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Bolcant dades de la taula `coll_events_topics`
--

INSERT INTO `coll_events_topics` (`id`, `topic`) VALUES
(1, 'Concierto'),
(2, 'Festival'),
(3, 'Exposición'),
(4, 'Musical'),
(5, 'Obra de teatro'),
(6, 'Feria'),
(7, 'Congreso'),
(8, 'Ópera'),
(9, 'Carrera'),
(10, 'Película'),
(11, 'Fiesta'),
(12, 'Inauguración');

-- --------------------------------------------------------

--
-- Estructura de la taula `coll_events_topics_translation`
--

CREATE TABLE IF NOT EXISTS `coll_events_topics_translation` (
  `language_id` int(11) NOT NULL,
  `topics_id` int(11) NOT NULL,
  `topic` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`language_id`,`topics_id`),
  KEY `fk_coll_events_topics_translation_language1_idx` (`language_id`),
  KEY `fk_coll_events_topics_translation_coll_events_topics1` (`topics_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `coll_events_topics_translation`
--

INSERT INTO `coll_events_topics_translation` (`language_id`, `topics_id`, `topic`) VALUES
(1, 1, 'Concert'),
(1, 2, 'Festival'),
(1, 3, 'Exhibition'),
(1, 4, 'Musical'),
(1, 5, 'Stage play'),
(1, 6, 'Fair'),
(1, 7, 'Congress'),
(1, 8, 'Opera'),
(1, 9, 'Race'),
(1, 10, 'Movie'),
(1, 11, 'Party'),
(1, 12, 'Opening'),
(2, 1, 'Concierto'),
(2, 2, 'Festival'),
(2, 3, 'Exposición'),
(2, 4, 'Musical'),
(2, 5, 'Obra de teatro'),
(2, 6, 'Feria'),
(2, 7, 'Congreso'),
(2, 8, 'Ópera'),
(2, 9, 'Carrera'),
(2, 10, 'Película'),
(2, 11, 'Fiesta'),
(2, 12, 'Inauguración');

-- --------------------------------------------------------

--
-- Estructura de la taula `coll_events_to_topics`
--

CREATE TABLE IF NOT EXISTS `coll_events_to_topics` (
  `events_id` int(11) NOT NULL,
  `topics_id` int(11) NOT NULL,
  PRIMARY KEY (`events_id`,`topics_id`),
  KEY `fk_coll_events_to_topics_coll_events1_idx` (`events_id`),
  KEY `fk_coll_events_to_topics_coll_events_topics1` (`topics_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `coll_events_to_topics`
--

INSERT INTO `coll_events_to_topics` (`events_id`, `topics_id`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Estructura de la taula `coll_filters`
--

CREATE TABLE IF NOT EXISTS `coll_filters` (
  `title` text,
  `position_lat` decimal(21,15) DEFAULT NULL,
  `position_lng` decimal(21,15) DEFAULT NULL,
  `content_to_city_id` int(12) NOT NULL,
  PRIMARY KEY (`content_to_city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `coll_filters`
--

INSERT INTO `coll_filters` (`title`, `position_lat`, `position_lng`, `content_to_city_id`) VALUES
('Lasarte', '41.408335000000000', '2.165963000000000', 1),
('7 portes', '41.417153000000000', '2.192570000000000', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `content_to_city`
--

CREATE TABLE IF NOT EXISTS `content_to_city` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `city_id` int(15) NOT NULL,
  `coll_categories_category` varchar(45) NOT NULL,
  `coll_categories_subcategory` varchar(45) NOT NULL,
  PRIMARY KEY (`id`,`city_id`),
  KEY `fk_content_to_city_city2_idx` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Bolcant dades de la taula `content_to_city`
--

INSERT INTO `content_to_city` (`id`, `city_id`, `coll_categories_category`, `coll_categories_subcategory`) VALUES
(1, 1, 'Food & Drinks', 'Bar'),
(2, 1, 'Food & Drinks', 'Restaurant');

-- --------------------------------------------------------

--
-- Estructura de la taula `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `flag` text NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Bolcant dades de la taula `language`
--

INSERT INTO `language` (`id`, `name`, `flag`, `active`) VALUES
(1, 'english', 'img/flag/eng.png', 1),
(2, 'spanish', '/img/flags/es.png', 1);

--
-- Restriccions per taules bolcades
--

--
-- Restriccions per la taula `coll_control`
--
ALTER TABLE `coll_control`
  ADD CONSTRAINT `fk_coll_control_content_to_city2` FOREIGN KEY (`content_to_city_id`) REFERENCES `content_to_city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restriccions per la taula `coll_events`
--
ALTER TABLE `coll_events`
  ADD CONSTRAINT `fk_coll_events_content_to_city2` FOREIGN KEY (`collaborator_id`) REFERENCES `content_to_city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_coll_events_city1` FOREIGN KEY (`city_id_event`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restriccions per la taula `coll_events_info`
--
ALTER TABLE `coll_events_info`
  ADD CONSTRAINT `fk_coll_events_info_language1` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_coll_events_info_coll_events1` FOREIGN KEY (`events_id`) REFERENCES `coll_events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restriccions per la taula `coll_events_packs`
--
ALTER TABLE `coll_events_packs`
  ADD CONSTRAINT `fk_coll_events_packs_coll_events1` FOREIGN KEY (`events_id`) REFERENCES `coll_events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restriccions per la taula `coll_events_photo`
--
ALTER TABLE `coll_events_photo`
  ADD CONSTRAINT `fk_coll_events_photo_coll_events1` FOREIGN KEY (`events_id`) REFERENCES `coll_events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restriccions per la taula `coll_events_prices`
--
ALTER TABLE `coll_events_prices`
  ADD CONSTRAINT `fk_coll_events_prices_coll_events2` FOREIGN KEY (`events_id`) REFERENCES `coll_events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restriccions per la taula `coll_events_schedules`
--
ALTER TABLE `coll_events_schedules`
  ADD CONSTRAINT `fk_coll_events_schedules_coll_events1` FOREIGN KEY (`events_id`) REFERENCES `coll_events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restriccions per la taula `coll_events_schedules_data`
--
ALTER TABLE `coll_events_schedules_data`
  ADD CONSTRAINT `fk_coll_events_schedules_data_coll_events_schedules1` FOREIGN KEY (`coll_events_schedules_id`) REFERENCES `coll_events_schedules` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restriccions per la taula `coll_events_topics_translation`
--
ALTER TABLE `coll_events_topics_translation`
  ADD CONSTRAINT `fk_coll_events_topics_translation_coll_events_topics1` FOREIGN KEY (`topics_id`) REFERENCES `coll_events_topics` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_coll_events_topics_translation_language1` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restriccions per la taula `coll_events_to_topics`
--
ALTER TABLE `coll_events_to_topics`
  ADD CONSTRAINT `fk_coll_events_to_topics_coll_events_topics1` FOREIGN KEY (`topics_id`) REFERENCES `coll_events_topics` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_coll_events_to_topics_coll_events1` FOREIGN KEY (`events_id`) REFERENCES `coll_events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restriccions per la taula `coll_filters`
--
ALTER TABLE `coll_filters`
  ADD CONSTRAINT `fk_coll_filters_content_to_city2` FOREIGN KEY (`content_to_city_id`) REFERENCES `content_to_city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restriccions per la taula `content_to_city`
--
ALTER TABLE `content_to_city`
  ADD CONSTRAINT `fk_content_to_city_city2` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
