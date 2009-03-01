<?php

$core = Core::getInstance();
$core->loadModule('org.sygil.menu.block');



$blocks = new MenuBlockManager();

$block = new MenuBlockBlock('Accueil');
$menu = new MenuBoxBox('Accueil');
//$menu->addOption(new MenuBoxOption('Accueil', 'ajax.open(\'blog\')'));
//$block->addElement($menu);

$menu = new MenuBoxBox('Outil');
$menu->addOption(new MenuBoxOption('GForge'              , 'org.sygil.frame.open(\'http://gforge.mailinblack.org/\', \'GForge\')'));
$menu->addOption(new MenuBoxOption('Wiki'                , 'org.sygil.frame.open(\'http://wiki.mailinblack.org/\', \'Wiki\')'));
$menu->addOption(new MenuBoxOption('Webmail'             , 'org.sygil.frame.open(\'http://192.168.9.73/roundcubemail/\', \'Webmail\')'));
$menu->addOption(new MenuBoxOption('phpMyAdmin'		     , 'org.sygil.frame.open(\'http://192.168.9.73/phpmyadmin/\', \'phpMyAdmin\')'));
$menu->addOption(new MenuBoxOption('Mailer'              , 'org.sygil.frame.open(\'http://192.168.9.73/mibd_mailer/\', \'Mailer\')'));
$block->addElement($menu);

$menu = new MenuBoxBox('Reposit');
$menu->addOption(new MenuBoxOption('Websvn'              , 'org.sygil.frame.open(\'http://192.168.9.73/websvn/\', \'WebSVN\')'));
$menu->addOption(new MenuBoxOption('Mib in GIT'		     , 'org.sygil.frame.open(\'http://192.168.9.73/indefero/index.php/p/mib-dev/source/tree/master/\', \'MIB-GIT\')'));
$block->addElement($menu);

$menu = new MenuBoxBox('A voir');
$menu->addOption(new MenuBoxOption('XML-Config Global'   , 'org.sygil.frame.open(\'http://192.168.9.73/glob.xml\', \'GLOB.XML\')'));
$menu->addOption(new MenuBoxOption('XML-Config Server'   , 'org.sygil.frame.open(\'http://192.168.9.73/glub.xml\', \'GLUB.XML\')'));
$block->addElement($menu);

$blocks->addBlock($block);

$block = new MenuBlockBlock('MIB v4');

$menu = new MenuBoxBox('localhost');
$menu->addOption(new MenuBoxOption('Config'              , 'org.sygil.frame.open(\'http://localhost/config/\', \'Local Config\')'));
$menu->addOption(new MenuBoxOption('Web'                 , 'org.sygil.frame.open(\'http://localhost/\',\'Local Web\')'));
$block->addElement($menu);
$menu = new MenuBoxBox('Integration');
$menu->addOption(new MenuBoxOption('Continuum'           , 'org.sygil.frame.open(\'http://192.168.11.22/continuum/\', \'Continuum\')'));
$menu->addOption(new MenuBoxOption('Java Doc'            , 'org.sygil.frame.open(\'http://192.168.11.22/config/\', \'Integration Config\')'));
$block->addElement($menu);
$menu = new MenuBoxBox('Pré Production');
$menu->addOption(new MenuBoxOption('Config'              , 'org.sygil.frame.open(\'http://192.168.11.23/config/\', \'Prod Config\')'));
$menu->addOption(new MenuBoxOption('Web'                 , 'org.sygil.frame.open(\'http://192.168.11.23/\',\'Prod Web\')'));
$block->addElement($menu);
$menu = new MenuBoxBox('Mathieu');
$menu->addOption(new MenuBoxOption('Config'              , 'org.sygil.frame.open(\'http://192.168.9.73:8080/config/\', \'Mathieu Config\')'));
$menu->addOption(new MenuBoxOption('Web'                 , 'org.sygil.frame.open(\'http://192.168.9.73:8080/\',\'Mathieu Web\')'));
$block->addElement($menu);

$blocks->addBlock($block);

$block = new MenuBlockBlock('Liens');

$menu = new MenuBoxBox('Postfix');
$menu->addOption(new MenuBoxOption('PostConf'            , 'org.sygil.frame.open(\'http://www.postfix.org/postconf.5.html\', \'Local Config\')'));
$menu->addOption(new MenuBoxOption('Gentoo Gateway'      , 'org.sygil.frame.open(\'http://www.gentoo.org/doc/fr/virt-mail-howto.xml\',\'Local Web\')'));
$block->addElement($menu);

$blocks->addBlock($block);


$block = new MenuBlockBlock('Monitoring');

$menu = new MenuBoxBox('MX2');
$menu->addOption(new MenuBoxOption('Mail Graph'          , 'org.sygil.frame.open(\'http://mx2.mailinblack.com/mailgraph.cgi\', \'MX2 MailGraph\')'));
$block->addElement($menu);

$blocks->addBlock($block);



$core->setData('__CONTENT__', $blocks->generate());
$core->addExec ('menu_block.change('.Session::DATA('default').');');
if (Session::DATA('close')) $core->addExec('menu_block.close();');
if (Session::DATA('box')  ) $core->addExec('menu_box.closes(['.Session::DATA('box').']);');

?>
