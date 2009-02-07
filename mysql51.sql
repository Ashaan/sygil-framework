DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) unsigned NOT NULL,
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

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `zone` smallint(5) unsigned NOT NULL,
  `category` smallint(5) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` mediumtext NOT NULL,
  `firstdate` datetime NOT NULL,
  `firstauthor` bigint(20) NOT NULL,
  PRIMARY KEY (`firstdate`,`firstauthor`),
  KEY `zone` (`zone`,`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `news_category`;
CREATE TABLE IF NOT EXISTS `news_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `tag` varchar(16) NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

