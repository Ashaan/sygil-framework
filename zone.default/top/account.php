<?php

$core = Core::getInstance();
$core->loadModule('menu_vertical');


$menu = new MenuVertical();
$menu->position->setTop  ('20px');
$menu->position->setRight('0px');
$menu->position->setWidth('150px');
$menu->position->setZ    ('150');

$menu->addOption('Langue','ajax.load(\'top/langue\',\'\',\'add\',[])');
$menu->addOption('Theme' ,'ajax.load(\'top/theme\',\'\',\'add\',[])');
$menu->addSeparator();

$session = Session::getInstance();
if (!$session->isLogged()) {
    $menu->addOption('Connection','ajax.load(\'connect\',\'\',\'replace\',[])');
    $menu->addOption('Inscription','ajax.load(\'register\',\'\',\'replace\',[])');
} else {
    $menu->addOption('Déconnection','ajax.load(\'disconnect\',\'\',\'\',[])');
}
$menu->addSeparator();
$menu->addOption('A propos..','ajax.load(\'about\',\'\',[])');
//echo $menu->generate();
$core->setData('__CONTENT__',$menu->generate());

?>
