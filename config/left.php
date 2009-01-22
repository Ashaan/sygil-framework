<?php

$core = Core::getInstance();
$core->loadModule('menu_block');


$blocks = new MenuBlockManager();

$block = new MenuBlockBlock('Accueil');
$menu = new MenuBoxBox('Général');
$menu->addOption(new MenuBoxOption('Blog', 'ajaxOpen(\'blog\')'));
$block->addElement($menu);


$menu = new MenuBoxBox('Jeux');
$menu->addOption(new MenuBoxOption('World Of Warcraft', 'frameOpen(\'http://wow.sygil.org/\')'));
$menu->addOption(new MenuBoxOption('Ultima Online'    , null));
$block->addElement($menu);
$menu = new MenuBoxBox('VoIP');
$menu->addOption(new MenuBoxOption('Mumble'          , 'frameOpen(\'http://mumble.sygil.org/\')'));
$menu->addOption(new MenuBoxOption('TeamSpeak'       , null));
$menu->addOption(new MenuBoxOption('Asterisk'        , null));
$block->addElement($menu);
$menu = new MenuBoxBox('Services');
$menu->addOption(new MenuBoxOption('Webmail'         , 'frameOpen(\'http://webmail.sygil.org/\')'));
$menu->addOption(new MenuBoxOption('Layman Gentoo'   , 'frameOpen(\'http://layman.sygil.org/\')'));
$menu->addOption(new MenuBoxOption('Mirroir Gentoo'  , 'frameOpen(\'http://gentoo.sygil.org/\')'));
$menu->addOption(new MenuBoxOption('FTP'             , 'frameOpen(\'ftp://ftp.sygil.org/\')'));
$menu->addOption(new MenuBoxOption('Jabber'          , null));
$block->addElement($menu);
$blocks->addBlock($block);

$block = new MenuBlockBlock('Projets');
$menu = new MenuBoxBox('Actif');
$menu->addOption(new MenuBoxOption('Sygil Overlay'    , 'frameOpen(\'http://projects.sygil.org/p/layman/\')'));
$menu->addOption(new MenuBoxOption('Iptable Config'   , 'frameOpen(\'http://projects.sygil.org/p/iptables/\')'));
$block->addElement($menu);
$menu = new MenuBoxBox('En Pause');
$menu->addOption(new MenuBoxOption('phpCV'            , 'frameOpen(\'http://projects.sygil.org/p/phpcv/\')'));
$menu->addOption(new MenuBoxOption('Web Gallery'      , 'frameOpen(\'http://projects.sygil.org/p/phpgallery/\')'));
$block->addElement($menu);
$menu = new MenuBoxBox('A l\'Etude');
$menu->addOption(new MenuBoxOption('Wanguard'         , null));
$menu->addOption(new MenuBoxOption('Black Mail'       , null));
$block->addElement($menu);
$menu = new MenuBoxBox('Abandonné');
$menu->addOption(new MenuBoxOption('co² Framework'    , null));
$menu->addOption(new MenuBoxOption('Sowulo'           , null));
$block->addElement($menu);
$blocks->addBlock($block);


$block = new MenuBlockBlock('Intranet');
$menu = new MenuBoxBox('Général');
$menu->addOption(new MenuBoxOption('Accueil', ''));
$menu->addOption(new MenuBoxOption('Utilisateur', ''));
$block->addElement($menu);
$blocks->addBlock($block);


$block = new MenuBlockBlock('Famille Chocat');
$menu = new MenuBoxBox('Général');
$menu->addOption(new MenuBoxOption('Gestionnaire de Courriel', 'frameOpen(\'http://webmail.chocat.com\')'));
$block->addElement($menu);
$menu = new MenuBoxBox('Mathieu');
$menu->addOption(new MenuBoxOption('Curriculum Vitae'    , 'frameOpen(\'http://mathieu.chocat.com\')'));
$menu->addOption(new MenuBoxOption('Development Zome'    , 'frameOpen(\'http://dev.chocat.com\')'));
$block->addElement($menu);
$blocks->addBlock($block);


$block = new MenuBlockBlock('Racines Dubois');
$menu = new MenuBoxBox('Général');
$menu->addOption(new MenuBoxOption('Forum'               , 'frameOpen(\'http://www.racinedubois.com/\')'));
$menu->addOption(new MenuBoxOption('Galerie'             , 'frameOpen(\'http://image.racinedubois.com/\')'));
$block->addElement($menu);
$menu = new MenuBoxBox('Noziéres');
$menu->addOption(new MenuBoxOption('Félicien'            , 'frameOpen(\'http://felicien.racinedubois.com/\')'));
$menu->addOption(new MenuBoxOption('Cyprien'             , 'frameOpen(\'http://cyprien.racinedubois.com/\')'));
$block->addElement($menu);
$menu = new MenuBoxBox('Expérimental');
$menu->addOption(new MenuBoxOption('Chat Experimental'   , 'frameOpen(\'http://dev.racinedubois.com/\')'));
$menu->addOption(new MenuBoxOption('Galerie Experimental', 'frameOpen(\'http://gdev.racinedubois.com/\')'));
$block->addElement($menu);
$blocks->addBlock($block);

$cacti = 'http://cacti.sygil.local/graph_view.php';
$block = new MenuBlockBlock('Monitoring');
$menu = new MenuBoxBox('Statistique System');
$menu->addOption(new MenuBoxOption('Aegis [sygil]'       , 'frameOpen(\''.$cacti.'?action=tree&tree_id=2\')'));
$menu->addOption(new MenuBoxOption('Enae [sygil]'        , 'frameOpen(\''.$cacti.'?action=tree&tree_id=3\')'));
$menu->addOption(new MenuBoxOption('Ashaan [sygil]'      , 'frameOpen(\''.$cacti.'?action=tree&tree_id=4\')'));
$menu->addOption(new MenuBoxOption('Elorah [sygil]'      , null));
$menu->addOption(new MenuBoxOption('Jean-Mi [chocat]'    , 'frameOpen(\''.$cacti.'?action=tree&tree_id=5\')'));
$menu->addOption(new MenuBoxOption('Féfé [chocat]'       , null));
$menu->addOption(new MenuBoxOption('Antonin [chocat]'    , null));
$block->addElement($menu);
$menu = new MenuBoxBox('Statistique Reseau');
$menu->addOption(new MenuBoxOption('nTop'                , 'frameOpen(\'http://sygil.local:3000\')'));
$menu->addOption(new MenuBoxOption('Webalizer'           , 'frameOpen(\'http://sygil.local/webalizer\')'));
$block->addElement($menu);
$menu = new MenuBoxBox('Administration');
$menu->addOption(new MenuBoxOption('phpMyAdmin'          , 'frameOpen(\'http://phpmyadmin.sygil.local\')'));
$menu->addOption(new MenuBoxOption('WebMin'              , 'frameOpen(\'https://sygil.local:10000/\')'));
$block->addElement($menu);
$blocks->addBlock($block);

$core->setData('__LEFT__', $blocks->generate());
?>
