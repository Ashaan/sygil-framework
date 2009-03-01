<?php

$core = Core::getInstance();

// Donnée
$core->addTheme  ('theme.css', 'org.sygil.news');
$core->addScript ('script.js', 'org.sygil.news');
$core->addInclude('event.php', 'org.sygil.news');
$core->addInclude('day.php'  , 'org.sygil.news');
$core->addInclude('news.php' , 'org.sygil.news');

?>
