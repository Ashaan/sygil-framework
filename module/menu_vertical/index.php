<?php

$core = Core::getInstance();

// Donnée
$core->addTheme ('theme.css', 'menu_vertical');
$core->addScript('script.js', 'menu_vertical');

$core->addInclude('module/menu_vertical/include/box.php');
$core->addInclude('module/menu_vertical/include/option.php');

?>
