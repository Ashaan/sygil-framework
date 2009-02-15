<?php

$core = Core::getInstance();
$core->loadModule('menu_vertical');


$menu = new MenuVertical();
$menu->position->setTop  ('22px');
$menu->position->setRight('0px');
$menu->position->setWidth('150px');
$menu->position->setZ    ('150');

$session = Session::getInstance();
if (!$session->isLogged()) {
    $menu->addElement(new MenuVerticalOption('Connection','ajax.load(\'connect\',\'\',[])'));
    $menu->addElement(new MenuVerticalOption('Inscription','ajax.load(\'register\',\'\',[])'));
} else {

}
//$menu->addSeparator();
$menu->addElement(new MenuVerticalOption('A propos..','ajax.load(\'about\',\'\',[])'));
echo $menu->generate();
$core->setData('__CONTENT__',$menu->generate());

?>
