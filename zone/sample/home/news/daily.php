<?php

$core = Core::getInstance();

$core->loadModule('news');

$event = new NewsEvents(Session::DATA('module'));
$event->setDate(Session::DATA('date'));
$event->load();

$day = new NewsDaily($event);

$core->setData('__CONTENT__',$day->generate());


?>
