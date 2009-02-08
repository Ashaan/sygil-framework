<?php

$core = Core::getInstance();

$core->loadModule('news');

$event = new NewsEvents($_GET['module']);
$event->setDate($_GET['date']);
$event->load();

$day = new NewsDaily($event);

$core->setData('__CONTENT__',$day->generate());


?>
