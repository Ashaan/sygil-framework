<?php

$core = Core::getInstance();

// Donnée
$core->addTheme('default','module/news/theme/default/theme.css');
$core->addScript('module/news/script/script.js');

$core->addInclude('module/news/include/event.php');
$core->addInclude('module/news/include/day.php');
$core->addInclude('module/news/include/news.php');

?>
