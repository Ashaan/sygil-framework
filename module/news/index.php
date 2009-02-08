<?php

$core = Core::getInstance();

// Donnée
$core->addTheme('module/news/theme/NAME/theme.css');
$core->addScript('module/news/script/script.js');

$core->addInclude('module/news/include/event.php');
$core->addInclude('module/news/include/day.php');
$core->addInclude('module/news/include/news.php');

?>
