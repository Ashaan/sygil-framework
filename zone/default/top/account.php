<?php

$core = Core::getInstance();
$core->loadModule('menu_vertical');


$menu = new MenuVertical(Session::DATA('target'));
$menu->position->setTop  ('19px');
$menu->position->setRight('0px');
$menu->position->setWidth('150px');
$menu->position->setZ    ('150');

$menu->addSubMenu('Langue','vmenu_langue','org.sygil.ajax.load(\'top/langue\',\'vmenu_langue\',\'replace\',[[\'parent\',\''.Session::DATA('target').'\']])');
$menu->addSubMenu('Theme' ,'vmenu_theme' ,'org.sygil.ajax.load(\'top/theme\',\'vmenu_theme\',\'replace\',[[\'parent\',\''.Session::DATA('target').'\']])');
$menu->addSeparator();

$session = Session::getInstance();
if (!$session->isLogged()) {
    $menu->addOption('Connection' ,'org.sygil.ajax.load(\'connect\',\'window_connect\',\'replace\',[])');
    $menu->addOption('Inscription','org.sygil.ajax.load(\'register\',\'\',\'replace\',[])');
} else {
    $menu->addOption('Déconnection','org.sygil.ajax.load(\'disconnect\',\'\',\'\',[])');
}
$menu->addSeparator();
$menu->addOption('A propos..','org.sygil.ajax.load(\'top/about\',\'window_about\',\'replace\',[])');

//echo $menu->generate();
$core->setContent($menu);

?>
