<?php

$core = Core::getInstance();

// Donnée
$core->addTheme  ('theme.css' , 'menu_vertical');
$core->addScript ('script.js' , 'menu_vertical');
$core->addInclude('box.php'   , 'menu_vertical');
$core->addInclude('option.php', 'menu_vertical');

?>
