<?php

$core = Core::getInstance();

$core->loadModule('news');

$event = new NewsEvents($_GET['module']);
$event->load();

$day = new NewsDaily($event);

$core->setData('__CONTENT__',$day->generate());

?>
