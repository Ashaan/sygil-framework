<?php

$core = Core::getInstance();

$core->addTheme  ('theme.css', 'slide_block');
$core->addScript ('script.js', 'slide_block');
$core->addInclude('slide.php', 'slide_block');

?>
