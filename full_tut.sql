-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Dez 2019 um 21:26
-- Server-Version: 10.4.8-MariaDB
-- PHP-Version: 7.3.11


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `db_tutorial` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_tutorial`;

USE `db_tutorial`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `securitytokens`
--

CREATE TABLE `securitytokens` (
                                  `id` int(10) UNSIGNED NOT NULL,
                                  `user_id` int(10) NOT NULL,
                                  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                                  `securitytoken` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                                  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `securitytokens`
--

INSERT INTO `securitytokens` (`id`, `user_id`, `identifier`, `securitytoken`, `created_at`) VALUES
(1, 1, '4f9f31ebcd6d6249872afc2390590200', '0c77c1e5991b340d777b1abe989d8c5b8ba42584', '2019-12-07 02:19:04'),
(2, 1, '63a5494c90c903467798d6bfafa6223d', '099f077e542a4c188a2195fddd06cc7f1971f512', '2019-12-07 05:35:45'),
(3, 1, '8bc6ec6a3246e7d2a1b146046bd52ccb', '4b95b148af99fd92b7463b237089047541a07cff', '2019-12-07 05:57:24'),
(4, 1, 'f52ce198ed99418d81da6ff7f235aa2d', '6c446e7729851b27ffae4b20487bb2abd0a24cac', '2019-12-07 06:23:46'),
(5, 1, '6858d3ed509e695dcd728b7f7539e225', '0d1e26eef6801d1815cfa7aa4e1c5a99db807526', '2019-12-07 06:45:48'),
(6, 1, '0ee2f9cc00c11e521f733cc1817519f0', '83e950684539ca6d50bc9452431965a72cc4df85', '2019-12-09 15:00:38'),
(7, 1, '2427641ab56ffbb651a828792a2345f2', '9a3581ac2620c33d00b2844a2b1624515caa3995', '2019-12-09 15:04:43'),
(8, 1, '3309278caa07e4a7cb486bf77fc01ebc', 'ae50b709f10aa142e569b7b6c866f8d23338ec91', '2019-12-09 15:04:49'),
(9, 2, 'f5cf608bc2ef5b79ed2d5b97cf95990d', 'af9108cf83946c94ea5eaa17d893dbece6240885', '2019-12-09 15:06:56'),
(10, 2, '90012601ded58c5c609e308b3289d56c', '0f0120327162c9ce2019e2f83926b62c424a1edc', '2019-12-09 15:07:19');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tasks`
--

CREATE TABLE `tasks` (
                         `id_task` int(11) NOT NULL,
                         `taskName` varchar(200) NOT NULL,
                         `relatedMilestone` int(11) DEFAULT NULL,
                         `taskDescription` text NOT NULL,
                         `taskDeadline` datetime DEFAULT NULL,
                         `taskCreated` datetime NOT NULL,
                         `taskUpdated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tasks`
--

INSERT INTO `tasks` (`id_task`, `taskName`, `relatedMilestone`, `taskDescription`, `taskDeadline`, `taskCreated`, `taskUpdated`) VALUES
(3, 'THIS IS THE TEST #1', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec qu', '2020-12-12 20:20:00', '2019-12-05 18:34:47', NULL),
(4, 'this is the test #2', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec qu', '2020-02-20 12:12:00', '2019-12-05 18:36:32', NULL),
(9, '4454', NULL, 'ghjgkghgzgobnol', NULL, '2019-12-06 01:11:16', NULL),
(10, '4454', NULL, '4545', NULL, '2019-12-06 01:16:00', NULL),
(11, '4454', 0, 'asdsa', '2020-12-12 12:12:00', '2019-12-06 19:39:19', NULL),
(12, 'some test', 0, 'some description', '0000-00-00 00:00:00', '2019-12-06 19:43:51', NULL),
(13, '4454', 1, '4545assa', '2002-12-20 20:20:00', '2019-12-06 23:32:43', NULL),
(14, '4454', 1, 'ghjgkghgzgobnol', '2200-02-20 12:12:00', '2019-12-07 01:11:51', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
                         `id` int(10) UNSIGNED NOT NULL,
                         `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                         `passwort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                         `vorname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
                         `nachname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
                         `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                         `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
                         `passwortcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
                         `passwortcode_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `email`, `passwort`, `vorname`, `nachname`, `created_at`, `updated_at`, `passwortcode`, `passwortcode_time`) VALUES
(1, 'phil@apemen-delights.de', '$2y$10$i52H6S7xUCOca57OWcNLMugGay1Rw.yFmzSZbUiq8COZIU6Ner2sa', 'Philip', 'Foitzik', '2019-12-09 15:06:42', '2019-12-09 15:06:42', NULL, NULL),
(2, 'demo@apemen-delights.de', '$2y$10$i52H6S7xUCOca57OWcNLMugGay1Rw.yFmzSZbUiq8COZIU6Ner2sa', 'admin', 'admin', '2019-12-09 15:06:42', '2019-12-09 15:06:42', NULL, NULL);


CREATE TABLE IF NOT EXISTS`countries` (
                                          `country` varchar(30) DEFAULT NULL,
                                          `capital` varchar(30) DEFAULT NULL,
                                          `continent` enum('Africa','Asia','Oceania','Europe','North-America','South-America')
                                                                DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO dbtutorial.countries (country, capital, continent) VALUES ('Sambia', 'Lusaka', 'Africa');
INSERT INTO dbtutorial.countries (country, capital, continent) VALUES ('Germany', 'Berlin', 'Europe');
INSERT INTO dbtutorial.countries (country, capital, continent) VALUES ('Australia', 'Canberra', 'Oceania');
INSERT INTO dbtutorial.countries (country, capital, continent) VALUES ('Italia', 'Rom', 'Europe');
INSERT INTO dbtutorial.countries (country, capital, continent) VALUES ('Thailand', 'Bangkok', 'Asia');
INSERT INTO dbtutorial.countries (country, capital, continent) VALUES ('Canada', 'Ottawa', 'North-America');
INSERT INTO dbtutorial.countries (country, capital, continent) VALUES ('Brasil', 'Brasilia', 'South-America');
INSERT INTO dbtutorial.countries (country, capital, continent) VALUES ('China', 'Peking', 'Asia');


--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `securitytokens`
--
ALTER TABLE `securitytokens`
    ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tasks`
--
ALTER TABLE `tasks`
    ADD PRIMARY KEY (`id_task`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `securitytokens`
--
ALTER TABLE `securitytokens`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `tasks`
--
ALTER TABLE `tasks`
    MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
