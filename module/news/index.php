<?php

$core = Core::getInstance();

// Donnée
$core->addTheme  ('theme.css', 'news');
$core->addScript ('script.js', 'news');
$core->addInclude('event.php', 'news');
$core->addInclude('day.php'  , 'news');
$core->addInclude('news.php' , 'news');

?>
