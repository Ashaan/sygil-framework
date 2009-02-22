<?php

$core = Core::getInstance();
$core->loadModule('menu_vertical');


$menu = new MenuVertical(Session::DATA('target'),Session::DATA('parent'));
$menu->position->setTop  ('20px');
$menu->position->setRight('150px');
$menu->position->setWidth('150px');
$menu->position->setZ    ('151');

$langs = $core->getLangList();
foreach($langs as $lang => $desc) {
    $menu->addOption($desc,'switchLang(\''.$lang.'\');');
}

$core->setContent($menu);

?>
