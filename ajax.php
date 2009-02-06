<?php

require_once('include/core.php');
require_once('include/db.php');
require_once('include/session.php');
require_once('include/template.php');

foreach($_POST as $name => $value) {
    $_GET[$name] = $value;
}

$core = Core::getInstance();

$core->setTemplate('ajax');

$core->load('config');

$core->load('ajax/'.$_GET['command']);

$session = Session::getInstance();
$session->save();

ob_start('ob_gzhandler');
header('Content-Type: text/xml');
echo $core->generate();

?>
