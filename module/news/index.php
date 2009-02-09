<?php

$core = Core::getInstance();

// Donnée
$core->addTheme ('theme.css', 'news');
$core->addScript('script.js', 'news');

$core->addInclude('module/news/include/event.php');
$core->addInclude('module/news/include/day.php');
$core->addInclude('module/news/include/news.php');

?>
