<?php

$core = Core::getInstance();

// Donnée
$core->addTheme  ('theme.css' , 'menu_box');
$core->addScript ('script.js' , 'menu_box');
$core->addInclude('box.php'   , 'menu_box');
$core->addInclude('option.php', 'menu_box');

?>
