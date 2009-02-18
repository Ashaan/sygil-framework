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
$core->addScript('div_manager.js');
$core->addScript('ajax.js');
$core->addScript('session.js');
$core->addScript('ckeditor/ckeditor.js');

/**
 * TODO a migrer en ajax
 **/
if ($session->isLogged()) {
    $core->addExec ('session.isConnect = true;');
    $core->addExec ('session.lastname = \''.$session->getUser('lastname').'\';');
    $core->addExec ('session.firstname = \''.$session->getUser('firstname').'\';');
    $core->addExec ('session.login = \''.$session->getUser('login').'\';');
    $core->addExec ('session.update();');
} else {
    $core->addExec ('session.isConnect = false;');
    $core->addExec ('session.lastname = \'\';');
    $core->addExec ('session.firstname = \'\';');
    $core->addExec ('session.login = \'\';');
    $core->addExec ('session.update();');
}
/**
 * TODO a migrer en ajax
 **/


foreach($preload as $script) $core->addExec($script.';');

// Page central par default
if (!Session::DATA('Frame') && !Session::DATA('Ajax')) {
    if (strpos(' '.DEFAULT_CENTER,'http://')>0) {
        $core->addExec('frame.open(\''.DEFAULT_CENTER.'\')');
    } else {
        $core->addExec('ajax.load(\''.DEFAULT_CENTER.'\',\'center\',\'replace\',[])');
    }
} else
if (Session::DATA('Frame')) {
   $core->addExec('frame.open(\''.Session::DATA('Frame').'\',\'Last\')');
} else {
   $core->addExec('ajax.load(\''.Session::DATA('Ajax').'\',\'center\',\'replace\',[])');
}

$session->save();

ob_start('ob_gzhandler');
header('Content-Type: text/html');
echo $core->generate();

?>
