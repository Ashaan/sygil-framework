<?php

require_once('include/template.php');
require_once('include/menu.php');

$tplData = array(
  '__ONLOAD__'       => 'checkUrl();',
  '__BLOCK_ID__'     => isset($_GET['blockid'])?$_GET['blockid']:1,
  '__BLOCK_OPEN__'   => isset($_GET['blockclose'])?0:1,
  '__BLOCK_STATUS__' => '',
  '__MENU_STATUS__'  => '',
  '__OPEN_LF__'      => isset($_GET['openLF'])?$_GET['openLF']:'',
  '__PREPARE__'		 => '',
  '__SHOW_ALERT__'   => 'false',
  '__ALERT__'		 => addslashes(str_replace("\n",'',print_r($_SERVER,true))),
);


$blocks = new Blocks();

$block = new Block('Accueil');
$menu = new Menu('VoIP');
$menu->addOption(new Option('Mumble'          , 'openLF(\'http://mumble.sygil.org/\')'));
$menu->addOption(new Option('TeamSpeak'       , null));
$menu->addOption(new Option('Asterisk'        , null));
$block->addMenu($menu);
$menu = new Menu('Jeux');
$menu->addOption(new Option('World Of Warcraft', 'openLF(\'http://wow.sygil.org/\')'));
$menu->addOption(new Option('Ultima Online'    , null));
$block->addMenu($menu);
$menu = new Menu('Services');
$menu->addOption(new Option('Webmail'         , 'openLF(\'http://webmail.sygil.org/\')'));
$menu->addOption(new Option('Layman Gentoo'   , 'openLF(\'http://layman.sygil.org/\')'));
$menu->addOption(new Option('Mirroir Gentoo'  , 'openLF(\'http://gentoo.sygil.org/\')'));
$menu->addOption(new Option('FTP'             , 'openLF(\'ftp://ftp.sygil.org/\')'));
$menu->addOption(new Option('Jabber'          , null));
$block->addMenu($menu);
$blocks->addBlock($block);

$block = new Block('Projets');
$menu = new Menu('Actif');
$menu->addOption(new Option('Sygil Overlay'    , 'openLF(\'http://projects.sygil.org/p/layman/\')'));
$menu->addOption(new Option('Iptable Config'   , 'openLF(\'http://projects.sygil.org/p/iptables/\')'));
$block->addMenu($menu);
$menu = new Menu('En Pause');
$menu->addOption(new Option('phpCV'            , 'openLF(\'http://projects.sygil.org/p/phpcv/\')'));
$menu->addOption(new Option('Web Gallery'      , 'openLF(\'http://projects.sygil.org/p/phpgallery/\')'));
$block->addMenu($menu);
$menu = new Menu('A l\'Etude');
$menu->addOption(new Option('Wanguard'         , null));
$menu->addOption(new Option('Black Mail'       , null));
$block->addMenu($menu);
$menu = new Menu('Abandonné');
$menu->addOption(new Option('co² Framework'    , null));
$menu->addOption(new Option('Sowulo'           , null));
$block->addMenu($menu);
$blocks->addBlock($block);


$block = new Block('Intranet');
$menu = new Menu('Général');
$menu->addOption(new Option('Accueil', ''));
$menu->addOption(new Option('Utilisateur', ''));
$block->addMenu($menu);
$blocks->addBlock($block);


$block = new Block('Famille Chocat');
$menu = new Menu('Général');
$menu->addOption(new Option('Gestionnaire de Courriel', 'openLF(\'http://webmail.chocat.com\')'));
$block->addMenu($menu);
$menu = new Menu('Mathieu');
$menu->addOption(new Option('Curriculum Vitae', 'openLF(\'http://mathieu.chocat.com\')'));
$menu->addOption(new Option('Development Zome', 'openLF(\'http://dev.chocat.com\')'));
$block->addMenu($menu);
$blocks->addBlock($block);


$block = new Block('Racines Dubois');
$menu = new Menu('Général');
$menu->addOption(new Option('Forum'  , 'openLF(\'http://www.racinedubois.com/\')'));
$menu->addOption(new Option('Galerie', 'openLF(\'http://image.racinedubois.com/\')'));
$block->addMenu($menu);
$menu = new Menu('Noziéres');
$menu->addOption(new Option('Félicien', 'openLF(\'http://felicien.racinedubois.com/\')'));
$menu->addOption(new Option('Cyprien' , 'openLF(\'http://cyprien.racinedubois.com/\')'));
$block->addMenu($menu);
$menu = new Menu('Expérimental');
$menu->addOption(new Option('Chat Experimental'   , 'openLF(\'http://dev.racinedubois.com/\')'));
$menu->addOption(new Option('Galerie Experimental', 'openLF(\'http://gdev.racinedubois.com/\')'));
$block->addMenu($menu);
$blocks->addBlock($block);


$block = new Block('Monitoring');
$menu = new Menu('Statistique System');
$menu->addOption(new Option('Aegis [sygil]'   , 'openLF(\'http://cacti.sygil.local/graph_view.php?action=tree&tree_id=2\')'));
$menu->addOption(new Option('Enae [sygil]'    , 'openLF(\'http://cacti.sygil.local/graph_view.php?action=tree&tree_id=3\')'));
$menu->addOption(new Option('Ashaan [sygil]'  , 'openLF(\'http://cacti.sygil.local/graph_view.php?action=tree&tree_id=4\')'));
$menu->addOption(new Option('Elorah [sygil]'  , null));
$menu->addOption(new Option('Jean-Mi [chocat]', 'openLF(\'http://cacti.sygil.local/graph_view.php?action=tree&tree_id=5\')'));
$menu->addOption(new Option('Féfé [chocat]'   , null));
$menu->addOption(new Option('Antonin [chocat]', null));
$block->addMenu($menu);
$menu = new Menu('Statistique Reseau');
$menu->addOption(new Option('nTop'            , 'openLF(\'http://sygil.local:3000\')'));
$menu->addOption(new Option('Webalizer'       , 'openLF(\'http://sygil.local/webalizer\')'));
$block->addMenu($menu);
$menu = new Menu('Administration');
$menu->addOption(new Option('phpMyAdmin'      , 'openLF(\'http://phpmyadmin.sygil.local\')'));
$menu->addOption(new Option('WebMin'          , 'openLF(\'https://sygil.local:10000/\')'));
$block->addMenu($menu);
$blocks->addBlock($block);


$tplData['__LEFT__'] .= $blocks->generate();


$tplData['__RIGHT__'] = '';

echo Template::get('index',$tplData);

?>
