<?php

$core = Core::getInstance();

$core->loadModule('calendar');

$calendar = new Calendar('panel_right_row1');
if (Session::DATA('date')) {
    $calendar->setDate(Session::DATA('date'));
} else {
    $calendar->setDate(time());
}
$calendar->setKey('home/calendar');
$calendar->setType('home/news/daily');
$calendar->setModule(Session::DATA('module'));
$calendar->setType('home/news/daily');
$calendar->setPanel('panel_left');

$core->setData('__CONTENT__',$calendar->generate());

?>
