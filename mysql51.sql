-- phpMyAdmin SQL Dump
-- version 2.11.9.3
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Dim 08 Février 2009 à 12:10
-- Version du serveur: 5.1.15
-- Version de PHP: 5.2.8-pl2-gentoo

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `sygil_base`
--

-- --------------------------------------------------------

--
-- Structure de la table `group`
--

DROP TABLE IF EXISTS `group`;
CREATE TABLE IF NOT EXISTS `group` (
  `id` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `group`
--

INSERT INTO `group` (`id`, `name`, `desc`) VALUES
('16e3ba46dab6fad19bc349dc277c3ffa', 'Sygil', ''),
('3b078a7898a1e1db8cd570a68e90e790', 'Chocat', ''),
('9e50a4938972437d39b64b8afefe9086', 'Dubois', ''),
('e82fff91c5bb50b4d0ff83b294835901', 'Admin', '');

-- --------------------------------------------------------

--
-- Structure de la table `group2module`
--

DROP TABLE IF EXISTS `group2module`;
CREATE TABLE IF NOT EXISTS `group2module` (
  `group` varchar(32) NOT NULL,
  `module` varchar(32) NOT NULL,
  `read` tinyint(1) NOT NULL,
  `write` tinyint(1) NOT NULL,
  PRIMARY KEY (`group`,`module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `group2module`
--


-- --------------------------------------------------------

--
-- Structure de la table `group2user`
--

DROP TABLE IF EXISTS `group2user`;
CREATE TABLE IF NOT EXISTS `group2user` (
  `group` varchar(32) NOT NULL,
  `user` varchar(32) NOT NULL,
  PRIMARY KEY (`group`,`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `group2user`
--


-- --------------------------------------------------------

--
-- Structure de la table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `id` varchar(32) NOT NULL,
  `type` varchar(16) NOT NULL,
  `name` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `module`
--

INSERT INTO `module` (`id`, `type`, `name`) VALUES
('14a6a157d8e861359729faeb72f5ca17', 'news', 'News Sygil Accue');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` varchar(32) NOT NULL,
  `module_id` varchar(32) NOT NULL,
  `category` smallint(5) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` mediumtext NOT NULL,
  `firstdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `firstauthor` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `zone` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `module_id`, `category`, `title`, `text`, `firstdate`, `firstauthor`) VALUES
('23e3aa92962f229737750f0fc413945c', '14a6a157d8e861359729faeb72f5ca17', 2, 'Test', '', '2009-02-08 11:23:23', 'b2c8a48822eb16e0558c189113517a44'),
('4cfeacdf253c904667167719141ec56f', '14a6a157d8e861359729faeb72f5ca17', 2, 'Migration vers OpenRC', '', '2009-02-07 11:23:23', 'c10188dc849e3e91aa57e1572b84a4fd'),
('c2eb66f286dd7bac1bf12968ecdd414a', '14a6a157d8e861359729faeb72f5ca17', 3, 'Musique du Jour', '<center>\r\n<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/zVtFqMPeZLU&amp;autoplay=0" \r\n        codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0"\r\n        width="450" height="373">\r\n    <param name="movie" value="http://www.youtube.com/v/zVtFqMPeZLU&amp;autoplay=0" />\r\n    <param name="allowScriptAccess" value="always" />\r\n    <param name="allowNetworking" value="all" />\r\n    <param name="allowFullScreen" value="true" />\r\n    <param name="quality" value="high" />\r\n    <param name="bgcolor" value="000000" />\r\n    <param name="wmode" value="transparent" />\r\n    <param name="menu" value="false" />\r\n</object>\r\n</center>', '2009-02-08 11:56:02', 'c10188dc849e3e91aa57e1572b84a4fd'),
('c97c58cabaf0cb0417c99d96faa4726f', '14a6a157d8e861359729faeb72f5ca17', 1, 'Ajout du System de news', '', '2009-02-05 11:23:23', 'c10188dc849e3e91aa57e1572b84a4fd');

-- --------------------------------------------------------

--
-- Structure de la table `news_category`
--

DROP TABLE IF EXISTS `news_category`;
CREATE TABLE IF NOT EXISTS `news_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `tag` varchar(16) NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `news_category`
--

INSERT INTO `news_category` (`id`, `name`, `tag`, `logo`) VALUES
(1, 'Portail Sygil.org', '[system]', ''),
(2, 'Server Sygil.org', '[server]', ''),
(3, 'Musique', '[music]', ''),
(4, 'World Of Warcraft', '[wow]', '');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(32) NOT NULL,
  `login` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL DEFAULT 'pam',
  `user` varchar(16) NOT NULL DEFAULT 'virtual',
  `group` varchar(16) NOT NULL DEFAULT 'virtual',
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `firstdate` datetime NOT NULL,
  `lastdate` datetime NOT NULL,
  `birthdate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `email`, `password`, `user`, `group`, `firstname`, `lastname`, `firstdate`, `lastdate`, `birthdate`) VALUES
('b2c8a48822eb16e0558c189113517a44', 'Maheulbeuk', '', 'pam', 'nico', 'nico', '', 'Nico', '2009-01-25 15:19:59', '2009-01-25 15:19:59', '1978-07-29 00:00:00'),
('c10188dc849e3e91aa57e1572b84a4fd', 'Ashaan', 'ashaan@sygil.org', 'pam', 'mathieu', 'mathieu', 'Chocat', 'Mathieu', '2009-01-25 15:19:59', '2009-01-25 15:19:59', '1978-07-29 00:00:00');

