<?php

require_once('include/core.php');
require_once('include/template.php');

$core = Core::getInstance();

$core->setTemplate('ajax');

$core->load('config');

$core->load('ajax'.ufirst($_GET['command']));

echo $core->generate();

?>
