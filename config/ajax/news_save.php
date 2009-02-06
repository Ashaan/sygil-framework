<?php

$core = Core::getInstance();
$core->loadModule('news');

$event = new NewsEvents($_GET['zone']);
$event->load();

$day = new NewsDaily($event);

$core->setData('__CONTENT__','');

?>
