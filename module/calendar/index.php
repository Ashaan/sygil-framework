<?php

$core = Core::getInstance();

// Donnée
$core->addTheme('module/calendar/theme/NAME/theme.css');
//$core->addScript('module/calendar/script/script.js');

if (isset($_GET['CalendarZone'])) {
    $core->addScriptUrlInit ('url.calendar_zone = \''.$_GET['CalendarZone'].'\';');
}
if (isset($_GET['CalendarDate'])) {
    $core->addScriptInit ('url.calendar_date = \''.$_GET['CalendarDate'].'\';');
}

$core->addInclude('module/calendar/include/calendar.php');


?>
