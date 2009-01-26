<?php

$core = Core::getInstance();
$core->loadModule('menu_block');


$blocks = new MenuBlockManager();

$block = new MenuBlockBlock('Accueil');
$menu = new MenuBoxBox('Général');
$menu->addOption(new MenuBoxOption('Blog'                , 'ajax.open(\'blog\')'));
$block->addElement($menu);


$menu = new MenuBoxBox('Jeux');
$menu->addOption(new MenuBoxOption('World Of Warcraft'   , 'frame.open(\'http://wow.sygil.org/\', this)'));
$menu->addOption(new MenuBoxOption('Ultima Online'       , null));
$block->addElement($menu);
$menu = new MenuBoxBox('VoIP');
$menu->addOption(new MenuBoxOption('Mumble'              , 'frame.open(\'http://mumble.sygil.org/\', this)'));
$menu->addOption(new MenuBoxOption('TeamSpeak'           , null));
$menu->addOption(new MenuBoxOption('Asterisk'            , null));
$block->addElement($menu);
$menu = new MenuBoxBox('Services');
$menu->addOption(new MenuBoxOption('Webmail'             , 'frame.open(\'http://webmail.sygil.org/\', this)'));
$menu->addOption(new MenuBoxOption('Layman Gentoo'       , 'frame.open(\'http://layman.sygil.org/\', this)'));
$menu->addOption(new MenuBoxOption('Mirroir Gentoo'      , 'frame.open(\'http://gentoo.sygil.org/\', this)'));
$menu->addOption(new MenuBoxOption('FTP'                 , 'frame.open(\'ftp://ftp.sygil.org/\', this)'));
$menu->addOption(new MenuBoxOption('Jabber'              , null));
$block->addElement($menu);
$blocks->addBlock($block);

$block = new MenuBlockBlock('Projets');
$menu = new MenuBoxBox('Actif');
$menu->addOption(new MenuBoxOption('Sygil Overlay'       , 'frame.open(\'http://projects.sygil.org/p/layman/\', this)'));
$menu->addOption(new MenuBoxOption('Iptable Config'      , 'frame.open(\'http://projects.sygil.org/p/iptables/\', this)'));
$block->addElement($menu);
$menu = new MenuBoxBox('En Pause');
$menu->addOption(new MenuBoxOption('phpCV'               , 'frame.open(\'http://projects.sygil.org/p/phpcv/\', this)'));
$menu->addOption(new MenuBoxOption('Web Gallery'         , 'frame.open(\'http://projects.sygil.org/p/phpgallery/\', this)'));
$block->addElement($menu);
$menu = new MenuBoxBox('A l\'Etude');
$menu->addOption(new MenuBoxOption('Wanguard'            , null));
$menu->addOption(new MenuBoxOption('Black Mail'          , null));
$block->addElement($menu);
$menu = new MenuBoxBox('Abandonné');
$menu->addOption(new MenuBoxOption('co² Framework'       , null));
$menu->addOption(new MenuBoxOption('Sowulo'              , null));
$block->addElement($menu);  
$blocks->addBlock($block);


$block = new MenuBlockBlock('Intranet');
$menu = new MenuBoxBox('Général');
$menu->addOption(new MenuBoxOption('Accueil'             , ''));
$menu->addOption(new MenuBoxOption('Utilisateur'         , ''));
$block->addElement($menu);
$blocks->addBlock($block);


$block = new MenuBlockBlock('Famille Chocat');
$menu = new MenuBoxBox('Général');
$menu->addOption(new MenuBoxOption('Gestionnaire de Courriel', 'frame.open(\'http://webmail.chocat.com\', this)'));
$block->addElement($menu);
$menu = new MenuBoxBox('Mathieu');
$menu->addOption(new MenuBoxOption('Curriculum Vitae'    , 'frame.open(\'http://mathieu.chocat.com\', this)'));
$menu->addOption(new MenuBoxOption('Development Zome'    , 'frame.open(\'http://dev.chocat.com\', this)'));
$block->addElement($menu);
$blocks->addBlock($block);


$block = new MenuBlockBlock('Racines Dubois');
$menu = new MenuBoxBox('Général');
$menu->addOption(new MenuBoxOption('Forum'               , 'frame.open(\'http://www.racinedubois.com/\', this)'));
$menu->addOption(new MenuBoxOption('Galerie'             , 'frame.open(\'http://image.racinedubois.com/\', this)'));
$block->addElement($menu);
$menu = new MenuBoxBox('Noziéres');
$menu->addOption(new MenuBoxOption('Félicien'            , 'frame.open(\'http://felicien.racinedubois.com/\', this)'));
$menu->addOption(new MenuBoxOption('Cyprien'             , 'frame.open(\'http://cyprien.racinedubois.com/\', this)'));
$block->addElement($menu);
$menu = new MenuBoxBox('Expérimental');
$menu->addOption(new MenuBoxOption('Chat Experimental'   , 'frame.open(\'http://dev.racinedubois.com/\', this)'));
$menu->addOption(new MenuBoxOption('Galerie Experimental', 'frame.open(\'http://gdev.racinedubois.com/\', this)'));
$block->addElement($menu);
$blocks->addBlock($block);

$cacti = 'http://cacti.sygil.local/graph_view.php';
$block = new MenuBlockBlock('Monitoring');
$menu = new MenuBoxBox('Statistique System');
$menu->addOption(new MenuBoxOption('Aegis [sygil]'       , 'frame.open(\''.$cacti.'?action=tree&tree_id=2\', this)'));
$menu->addOption(new MenuBoxOption('Enae [sygil]'        , 'frame.open(\''.$cacti.'?action=tree&tree_id=3\', this)'));
$menu->addOption(new MenuBoxOption('Ashaan [sygil]'      , 'frame.open(\''.$cacti.'?action=tree&tree_id=4\', this)'));
$menu->addOption(new MenuBoxOption('Elorah [sygil]'      , null));
$menu->addOption(new MenuBoxOption('Jean-Mi [chocat]'    , 'frame.open(\''.$cacti.'?action=tree&tree_id=5\', this)'));
$menu->addOption(new MenuBoxOption('Féfé [chocat]'       , null));
$menu->addOption(new MenuBoxOption('Antonin [chocat]'    , null));
$block->addElement($menu);
$menu = new MenuBoxBox('Statistique Reseau');
$menu->addOption(new MenuBoxOption('nTop'                , 'frame.open(\'http://sygil.local:3000\', this)'));
$menu->addOption(new MenuBoxOption('Webalizer'           , 'frame.open(\'http://sygil.local/webalizer\', this)'));
$block->addElement($menu);
$menu = new MenuBoxBox('Administration');
$menu->addOption(new MenuBoxOption('phpMyAdmin'          , 'frame.open(\'http://phpmyadmin.sygil.local\', this)'));
$menu->addOption(new MenuBoxOption('WebMin'              , 'frame.open(\'https://sygil.local:10000/\', this)'));
$block->addElement($menu);
$blocks->addBlock($block);

$core->setData('__LEFT__', $blocks->generate());
?>
