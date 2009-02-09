<?php

if (!defined('CONFIGURE')) require_once('config.php');
require_once(PATH_CORE.'/include/core.php');
require_once(PATH_CORE.'/include/db.php');
require_once(PATH_CORE.'/include/session.php');
require_once(PATH_CORE.'/include/template.php');

foreach($_POST as $name => $value) {
    $_GET[$name] = $value;
}

$core = Core::getInstance();

$core->setTemplate('ajax');

$core->load('ajax/'.$_GET['command']);

$session = Session::getInstance();
$session->save();

ob_start('ob_gzhandler');
header('Content-Type: text/xml');
echo $core->generate();

?>
