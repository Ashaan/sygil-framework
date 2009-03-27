SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

INSERT INTO `group`
    (`id`, `name`, `desc`)
VALUES
    ('16e3ba46dab6fad19bc349dc277c3ffa', 'Sygil' , ''),
    ('3b078a7898a1e1db8cd570a68e90e790', 'Chocat', ''),
    ('9e50a4938972437d39b64b8afefe9086', 'Dubois', ''),
    ('e82fff91c5bb50b4d0ff83b294835901', 'Admin' , '');


INSERT INTO `group2module`
    (`group`, `module`, `perm`) 
VALUES
    (''                                , '14a6a157d8e861359729faeb72f5ca17', 'READ'),
    ('16e3ba46dab6fad19bc349dc277c3ffa', '14a6a157d8e861359729faeb72f5ca17', 'READ,WRITE');


INSERT INTO `group2user` 
    (`group`, `user`, `perm`) 
VALUES
    ('16e3ba46dab6fad19bc349dc277c3ffa', 'b2c8a48822eb16e0558c189113517a44', 'READ'),
    ('16e3ba46dab6fad19bc349dc277c3ffa', 'c10188dc849e3e91aa57e1572b84a4fd', 'READ,WRITE'),
    ('3b078a7898a1e1db8cd570a68e90e790', 'c10188dc849e3e91aa57e1572b84a4fd', 'READ,WRITE'),
    ('9e50a4938972437d39b64b8afefe9086', 'c10188dc849e3e91aa57e1572b84a4fd', 'READ,WRITE');


INSERT INTO `module` 
    (`id`, `type`, `name`) 
VALUES
    ('14a6a157d8e861359729faeb72f5ca17', 'news', 'News Sygil Accue');


INSERT INTO `news`
    (`id`, `module_id`, `category`, `title`, `text`, `firstdate`, `firstauthor`) 
VALUES
    ('23e3aa92962f229737750f0fc413945c', '14a6a157d8e861359729faeb72f5ca17', 2, 'Test', '', '2009-02-08 11:23:23', 'b2c8a48822eb16e0558c189113517a44'),
    ('4cfeacdf253c904667167719141ec56f', '14a6a157d8e861359729faeb72f5ca17', 2, 'Migration vers OpenRC', '', '2009-02-07 11:23:23', 'c10188dc849e3e91aa57e1572b84a4fd'),
    ('c2eb66f286dd7bac1bf12968ecdd414a', '14a6a157d8e861359729faeb72f5ca17', 3, 'Musique du Jour', '<center>\r\n<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/zVtFqMPeZLU&amp;autoplay=0" \r\n        codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0"\r\n        width="450" height="373">\r\n    <param name="movie" value="http://www.youtube.com/v/zVtFqMPeZLU&amp;autoplay=0" />\r\n    <param name="allowScriptAccess" value="always" />\r\n    <param name="allowNetworking" value="all" />\r\n    <param name="allowFullScreen" value="true" />\r\n    <param name="quality" value="high" />\r\n    <param name="bgcolor" value="000000" />\r\n    <param name="wmode" value="transparent" />\r\n    <param name="menu" value="false" />\r\n</object>\r\n</center>', '2009-02-08 11:56:02', 'c10188dc849e3e91aa57e1572b84a4fd'),
    ('c97c58cabaf0cb0417c99d96faa4726f', '14a6a157d8e861359729faeb72f5ca17', 1, 'Ajout du System de news', '', '2009-02-05 11:23:23', 'c10188dc849e3e91aa57e1572b84a4fd');


INSERT INTO `news_category` 
    (`id`, `name`, `tag`, `logo`) 
VALUES
    (1, 'Portail Sygil.org', '[system]', ''),
    (2, 'Server Sygil.org', '[server]', ''),
    (3, 'Musique', '[music]', ''),
    (4, 'World Of Warcraft', '[wow]', '');


INSERT INTO `user` 
    (`id`, `login`, `email`, `password`, `sys_user`, `sys_group`, `firstname`, `lastname`, `template`, `theme`, `iconset`, `firstdate`, `lastdate`, `birthdate`) 
VALUES
    ('b2c8a48822eb16e0558c189113517a44', 'Maheulbeuk', 'maheulbeuk@sygil.org', 'pam', 'nico', 'nico', NULL, 'Nico', NULL, NULL, NULL, '2009-01-25 15:19:59', '2009-01-25 15:19:59', NULL),
    ('c10188dc849e3e91aa57e1572b84a4fd', 'Ashaan', 'ashaan@sygil.org', 'pam', 'mathieu', 'mathieu', 'Chocat', 'Mathieu', NULL, NULL, NULL, '2009-01-25 15:19:59', '2009-01-25 15:19:59', '1978-07-29 00:00:00');
    
