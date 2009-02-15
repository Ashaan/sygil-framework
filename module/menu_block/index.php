<?php

$core = Core::getInstance();

// Donnée
$core->addTheme  ('theme.css'  , 'menu_block');
$core->addScript ('script.js'  , 'menu_block');
$core->addInclude('block.php'  , 'menu_block');
$core->addInclude('manager.php', 'menu_block');

$core->loadModule('menu_box');

?>
