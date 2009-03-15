<?php

$core = Core::getInstance();
$core->loadModule('org.sygil.menu.block');

$blocks = new MenuBlockManager();

$cacti = 'http://cacti.sygil.local/graph_view.php';

$block = new MenuBlockBlock('Monitoring');
$menu = new MenuBoxBox('Statistique System');
$menu->addOption(new MenuBoxOption('Aegis [sygil]'       , 'org.sygil.frame.open(\''.$cacti.'?action=tree&tree_id=2\', this)'));
$menu->addOption(new MenuBoxOption('Enae [sygil]'        , 'org.sygil.frame.open(\''.$cacti.'?action=tree&tree_id=3\', this)'));
$menu->addOption(new MenuBoxOption('Ashaan [sygil]'      , 'org.sygil.frame.open(\''.$cacti.'?action=tree&tree_id=4\', this)'));
$menu->addOption(new MenuBoxOption('Elorah [sygil]'      , null));
$menu->addOption(new MenuBoxOption('Jean-Mi [chocat]'    , 'org.sygil.frame.open(\''.$cacti.'?action=tree&tree_id=5\', this)'));
$menu->addOption(new MenuBoxOption('Féfé [chocat]'       , null));
$menu->addOption(new MenuBoxOption('Antonin [chocat]'    , null));
$block->addElement($menu);
$menu = new MenuBoxBox('Statistique Reseau');
$menu->addOption(new MenuBoxOption('nTop'                , 'org.sygil.frame.open(\'http://sygil.local:3000\', this)'));
$menu->addOption(new MenuBoxOption('Webalizer'           , 'org.sygil.frame.open(\'http://sygil.local/webalizer\', this)'));
$menu->addOption(new MenuBoxOption('MailGraph'           , 'org.sygil.frame.open(\'http://sygil.local/mailgraph/mailgraph.cgi\', this)'));
$block->addElement($menu);
$menu = new MenuBoxBox('Administration');
$menu->addOption(new MenuBoxOption('phpMyAdmin'          , 'org.sygil.frame.open(\'http://phpmyadmin.sygil.local\', this)'));
$menu->addOption(new MenuBoxOption('WebMin'              , 'org.sygil.frame.open(\'https://sygil.local:10000/\', this)'));
$block->addElement($menu);
$blocks->addBlock($block);


$core->setContent($blocks);
$core->addExec ('menu_block.change('.Session::DATA('default').');');
if (Session::DATA('close')) $core->addExec('menu_block.close();');
if (Session::DATA('box')  ) $core->addExec('menu_box.closes(['.Session::DATA('box').']);');

?>
