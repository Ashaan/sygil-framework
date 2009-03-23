<?php

$core = Core::getInstance();
$core->loadModule('org.sygil.menu.block');

$blocks = new MenuBlockManager();

$block = new MenuBlockBlock('Accueil');

$menu = new MenuBoxBox('Accueil');
$menu->addOption(new MenuBoxOption('Accueil', 'org.sygil.ajax.open(\'home\')'));
$menu->addOption(new MenuBoxOption('Forum'               , 'org.sygil.frame.open(\'http://www.racinedubois.com/\', this)'));
$menu->addOption(new MenuBoxOption('Galerie'             , 'org.sygil.frame.open(\'http://image.racinedubois.com/\', this)'));
$block->addElement($menu);

$menu = new MenuBoxBox('Noziéres');
$menu->addOption(new MenuBoxOption('Félicien'            , 'org.sygil.frame.open(\'http://felicien.racinedubois.com/\', this)'));
$menu->addOption(new MenuBoxOption('Cyprien'             , 'org.sygil.frame.open(\'http://cyprien.racinedubois.com/\', this)'));
$block->addElement($menu);

$menu = new MenuBoxBox('Expérimental');
$menu->addOption(new MenuBoxOption('Chat Experimental'   , 'org.sygil.frame.open(\'http://dev.racinedubois.com/\', this)'));
$menu->addOption(new MenuBoxOption('Galerie Experimental', 'org.sygil.frame.open(\'http://gdev.racinedubois.com/\', this)'));
$block->addElement($menu);
$blocks->addBlock($block);




$core->setContent($blocks);
$core->addExec ('menu_block.change('.Session::DATA('default').');');
if (Session::DATA('close')) $core->addExec('menu_block.close();');
if (Session::DATA('box')  ) $core->addExec('menu_box.closes(['.Session::DATA('box').']);');

?>
