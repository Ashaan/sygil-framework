<?php

$core = Core::getInstance();
$core->loadModule('menu_vertical');


$menu = new MenuVertical();
$menu->setTop('22px');
$menu->setBottom(null);
$menu->setLeft(null);
$menu->setRight('0px');
$menu->setWidth('150px');

$session = Session::getInstance();
if (!$session->isConnect()) {
    $menu->addElement(new MenuVerticalOption('Connection','ajax.load(\'connect\',\'\',[])'));
    $menu->addElement(new MenuVerticalOption('Inscription','ajax.load(\'register\',\'\',[])'));
} else {

}
$menu->addSeparator();
$menu->addElement(new MenuVerticalOption('A propos..','ajax.load(\'about\',\'\',[])'));

$core->setData('__CONTENT__',$menu->generate());

?>
