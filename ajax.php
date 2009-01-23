<?php

require_once('include/core.php');
require_once('include/template.php');

$core = Core::getInstance();

$core->setTemplate('ajax');

$core->load('config');

$core->load('ajax/'.$_GET['command']);

ob_start('ob_gzhandler');
header('Content-Type: text/xml');
echo $core->generate();

?>
