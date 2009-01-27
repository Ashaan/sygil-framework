<?php

$core = Core::getInstance();

$core->loadModule('calendar');

$calendar = new Calendar();
$calendar->setDate(time());
$calendar->setZone($_GET['zone']);
$calendar->setPanel('panel_left');

$core->setData('__CONTENT__',$calendar->generate());

?>
