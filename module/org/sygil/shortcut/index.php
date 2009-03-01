<?php

$core = Core::getInstance();
$core->addTheme  ('theme.css'   , 'org.sygil.shortcut');
$core->addScript ('shortcut.js' , 'org.sygil.shortcut');
$core->addInclude('shortcut.php', 'org.sygil.shortcut');

?>
