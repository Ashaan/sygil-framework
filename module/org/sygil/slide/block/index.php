<?php

$core = Core::getInstance();

$core->addTheme  ('theme.css', 'org.sygil.slide.block');
$core->addScript ('script.js', 'org.sygil.slide.block');
$core->addInclude('slide.php', 'org.sygil.slide.block');

?>
