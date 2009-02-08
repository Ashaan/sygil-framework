<?php

require_once('config.php');
require_once('include/core.php');
require_once('include/db.php');
require_once('include/session.php');
require_once('include/template.php');

$core = Core::getInstance();

$core->setTemplate('index');

if (isset($configThemeList)) {
    $core->setThemeList($configThemeList);
}

if (isset($configLangList)) {
    $core->setLangList($configLangList);
}


$core->addTheme('theme/NAME/theme.css');

$core->addScript('script/function.js');
$core->addScript('script/url.js');
$core->addScript('script/frame.js');
$core->addScript('script/base64.js');
$core->addScript('script/ajax.js');
$core->addScript('script/shortcut.js');
$core->addScript('script/session.js');
$core->addScript('script/ckeditor/ckeditor.js');

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
