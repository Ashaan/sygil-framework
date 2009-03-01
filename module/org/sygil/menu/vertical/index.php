<?php

$core = Core::getInstance();

// Donnée
$core->addTheme  ('theme.css' , 'org.sygil.menu.vertical');
$core->addInclude('box.php'   , 'org.sygil.menu.vertical');
$core->addInclude('option.php', 'org.sygil.menu.vertical');

?>
