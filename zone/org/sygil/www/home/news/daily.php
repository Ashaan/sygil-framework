<?php

$core = Core::getInstance();

$core->loadModule('org.sygil.news');

$event = new NewsEvents(Session::DATA('module'));
$event->setDate(Session::DATA('date'));
$event->load();

$day = new NewsDaily($event);

$core->setContent($day->generate());


?>
