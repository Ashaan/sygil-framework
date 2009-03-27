SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


DROP TABLE IF EXISTS `group`;
CREATE TABLE IF NOT EXISTS `group` (
  `id` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `group2module`;
CREATE TABLE IF NOT EXISTS `group2module` (
  `group` varchar(32) NOT NULL DEFAULT '',
  `module` varchar(32) NOT NULL,
  `perm` set('READ','WRITE') DEFAULT 'READ',
  PRIMARY KEY (`group`,`module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `group2user`;
CREATE TABLE IF NOT EXISTS `group2user` (
  `group` varchar(32) NOT NULL,
  `user` varchar(32) NOT NULL,
  `perm` set('READ','WRITE') NOT NULL DEFAULT 'READ',
  PRIMARY KEY (`group`,`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `id` varchar(32) NOT NULL,
  `type` varchar(16) NOT NULL,
  `name` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` varchar(32) NOT NULL,
  `module_id` varchar(32) NOT NULL,
  `category` smallint(5) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` mediumtext NOT NULL,
  `firstdate` datetime NOT NULL,
  `firstauthor` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `zone` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `news_category`;
CREATE TABLE IF NOT EXISTS `news_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `tag` varchar(16) NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;


DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(32) NOT NULL,
  `login` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL DEFAULT 'pam',
  `sys_user` varchar(16) DEFAULT NULL,
  `sys_group` varchar(16) DEFAULT NULL,
  `firstname` varchar(64) DEFAULT NULL,
  `lastname` varchar(64) DEFAULT NULL,
  `template` varchar(16) DEFAULT NULL,
  `theme` varchar(16) DEFAULT NULL,
  `iconset` varchar(16) DEFAULT NULL,
  `firstdate` datetime NOT NULL,
  `lastdate` datetime NOT NULL,
  `birthdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP VIEW IF EXISTS `view_group2module`;
CREATE VIEW `view_group2module` AS 
    select `G`.`name` AS `group`,`M`.`name` AS `module`,`G2M`.`perm` AS `perm` 
    from `module` `M` 
        left join `group2module` `G2M` on `G2M`.`module` = `M`.`id`
        left join `group` `G` on `G`.`id` = `G2M`.`group`;


DROP VIEW IF EXISTS `view_group2user`;
CREATE VIEW `view_group2user` AS 
    select `G`.`name` AS `group`,`U`.`login` AS `username`,`U`.`email` AS `email`,`G2U`.`perm` AS `perm` 
    from `user` `U` 
        left join `group2user` `G2U` on `G2U`.`user` = `U`.`id`
        left join `group` `G` on `G`.`id` = `G2U`.`group`;

