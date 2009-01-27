<?php

$core = Core::getInstance();

$core->loadModule('news');

$news = new News();
$news->setDate($_GET['date']);
$news->setZone($_GET['zone']);

$core->setData('__CONTENT__',$news->generate());

?>
