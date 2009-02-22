<?php

$core = Core::getInstance();
$core->loadModule('menu_vertical');


$menu = new MenuVertical(Session::DATA('target'),Session::DATA('parent'));
$menu->position->setTop  ('45px');
$menu->position->setRight('150px');
$menu->position->setWidth('150px');
$menu->position->setZ    ('151');

$themes = $core->getThemeList();
foreach($themes as $theme => $desc) {
    $menu->addOption($desc,'org.sygil.utilities.switchStyle(\''.$theme.'\');');
}

$core->setData('__CONTENT__',$menu->generate());

?>
