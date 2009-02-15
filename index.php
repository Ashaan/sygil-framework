<?php

require_once('config.php');
require_once(PATH_CORE.'/include/core.php');
require_once(PATH_CORE.'/include/db.php');
require_once(PATH_CORE.'/include/session.php');
require_once(PATH_CORE.'/include/template.php');

$core    = Core::getInstance();
$session = Session::getInstance();

if (isset($configThemeList)) $core->setThemeList($configThemeList);
if (isset($configLangList) ) $core->setLangList($configLangList);


$core->setTemplate('index');
$core->addTheme('theme.css');
$core->addScript('function.js');
$core->addScript('url.js');
$core->addScript('frame.js');
$core->addScript('base64.js');
$core->addScript('ajax.js');
$core->addScript('shortcut.js');
$core->addScript('session.js');
$core->addScript('ckeditor/ckeditor.js');

foreach($preload as $script) $core->addExec($script.';');


// Page central par default
if (!Session::DATA('Frame') && !Session::DATA('Ajax')) {
   $core->addExec('ajax.load(\''.DEFAULT_CENTER.'\',\'center\',\'replace\',[])');
} else
if (Session::DATA('Frame')) {
   $core->addExec('frame.open(\''.Session::DATA('Frame').'\',\'Last\')');
} else {
   $core->addExec('ajax.load(\''.Session::DATA('Ajax').'\',\'center\',\'replace\',[])');
}


/**
 * TODO a migrer en ajax
 **/
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
/**
 * TODO a migrer en ajax
 **/


$session->save();

ob_start('ob_gzhandler');
header('Content-Type: text/html');
echo $core->generate();

?>
