<?php

$core = Core::getInstance();

// Donnée
$core->addTheme  ('theme.css'  , 'org.sygil.menu.block');
$core->addScript ('script.js'  , 'org.sygil.menu.block');
$core->addInclude('block.php'  , 'org.sygil.menu.block');
$core->addInclude('manager.php', 'org.sygil.menu.block');

$core->loadModule('org.sygil.menu.box');

?>
