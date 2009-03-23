<?php

$core = Core::getInstance();

$core->loadModule('org.sygil.news');

$event = new NewsEvents(Session::DATA('module'));
$event->load();

$day = new NewsDaily($event);

$core->setContent($day);

?>
