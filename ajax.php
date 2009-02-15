<?php
/**
 * Description:
 *   Main script for generate an ajax response with Sygil Portal Framework
 *
 * Author:
 *   Mathieu Chocat <mathieu@chocat.com> / Ashaan
 * Contributor:
 *   none
 *
 * Revision: $REVISION$ 
 *
 * Copyright (c) 2008-2009 Sygil.org
 **/


if (!defined('CONFIGURE')) require_once('config.php');
require_once(PATH_CORE.'/include/core.php');
require_once(PATH_CORE.'/include/db.php');
require_once(PATH_CORE.'/include/session.php');
require_once(PATH_CORE.'/include/template.php');

$core    = Core::getInstance();
$session = Session::getInstance();

$core->setTemplate('ajax');
$core->load(Session::DATA('command'));
$session->save();

ob_start('ob_gzhandler');
header('Content-Type: text/xml');
echo $core->generate();

?>
