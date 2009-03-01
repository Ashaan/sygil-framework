<?php

$core = Core::getInstance();

// Donnée
$core->addTheme  ('theme.css' , 'org.sygil.menu.box');
$core->addScript ('script.js' , 'org.sygil.menu.box');
$core->addInclude('box.php'   , 'org.sygil.menu.box');
$core->addInclude('option.php', 'org.sygil.menu.box');

?>
