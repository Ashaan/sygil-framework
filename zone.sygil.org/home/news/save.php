<?php

$core = Core::getInstance();
$core->loadModule('news');

$event = new NewsEvents(Session::DATA('module'));
$event->load();

$day = new NewsDaily($event);

$core->setData('__CONTENT__','');

?>
