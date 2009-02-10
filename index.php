<?php
/**
 * Description:
 *   Main script for generate an html page with Sygil Portal Framework
 *
 * Author:
 *   Mathieu Chocat <mathieu@chocat.com> / Ashaan
 * Contributor:
 *   none
 *
 * Revision: $REVISION$ 
 *
 * Copyright(c) 2008-2009 Mathieu Chocat (or Sygil.org if applicable)
 **/

if (!defined('CONFIGURE')) require_once('config.php');
require_once(PATH_CORE.'/include/core.php');
require_once(PATH_CORE.'/include/db.php');
require_once(PATH_CORE.'/include/session.php');
require_once(PATH_CORE.'/include/template.php');

$core = Core::getInstance();

$core->setTemplate('index');

if (isset($configThemeList)) {
    $core->setThemeList($configThemeList);
}

if (isset($configLangList)) {
    $core->setLangList($configLangList);
}


$core->addTheme('theme.css');

$core->addScript('function.js');
$core->addScript('url.js');
$core->addScript('frame.js');
$core->addScript('base64.js');
$core->addScript('ajax.js');
$core->addScript('shortcut.js');
$core->addScript('session.js');
$core->addScript('ckeditor/ckeditor.js');

$core->addScriptInit ('url.frame = \''.(isset($_GET['Frame'])?$_GET['Frame']:'').'\';');
$core->addScriptInit ('url.ajax  = \''.(isset($_GET['Ajax']) ?$_GET['Ajax'] :'').'\';');

$session = Session::getInstance();

$core->load(DEFAULT_LEFT);
$core->load(DEFAULT_CENTER);
$core->load(DEFAULT_RIGHT);

$core->loadModule('window');

if ($session->isLogged()) {
    $core->addScriptInit ('session.isConnect = true;');
    $core->addScriptInit ('session.lastname = \''.$session->getUser('lastname').'\';');
    $core->addScriptInit ('session.firstname = \''.$session->getUser('firstname').'\';');
    $core->addScriptInit ('session.login = \''.$session->getUser('login').'\';');
} else {
    $core->addScriptInit ('session.isConnect = false;');
    $core->addScriptInit ('session.lastname = \'\';');
    $core->addScriptInit ('session.firstname = \'\';');
    $core->addScriptInit ('session.login = \'\';');
}
$session->save();

ob_start('ob_gzhandler');
header('Content-Type: text/html');
echo $core->generate();

?>
