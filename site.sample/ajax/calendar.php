<?php

$core = Core::getInstance();

$core->loadModule('calendar');

$calendar = new Calendar('panel_right_row1');
if ($_GET['date']) {
    $calendar->setDate($_GET['date']);
} else {
    $calendar->setDate(time());
}
$calendar->setZone($_GET['zone']);
$calendar->setPanel('panel_left');

$core->setData('__CONTENT__',$calendar->generate());

?>
