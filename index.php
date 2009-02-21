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

$core->addScript('org.sygil.function.js');
$core->addScript('org.sygil.mouse.js');
$core->addScript('url.js');
$core->addScript('org.sygil.frame.js');
$core->addScript('org.sygil.base64.js');
$core->addScript('org.sygil.ajax.js');
$core->addScript('org.sygil.div.js');
$core->addScript('org.sygil.session.js');
$core->addScript('ckeditor/ckeditor.js');

/**
 * TODO a migrer en ajax
 **/
if ($session->isLogged()) {
    $core->addExec ('org.sygil.session.isConnect = true;');
    $core->addExec ('org.sygil.session.lastname = \''.$session->getUser('lastname').'\';');
    $core->addExec ('org.sygil.session.firstname = \''.$session->getUser('firstname').'\';');
    $core->addExec ('org.sygil.session.login = \''.$session->getUser('login').'\';');
    $core->addExec ('org.sygil.session.update();');
} else {
    $core->addExec ('org.sygil.session.isConnect = false;');
    $core->addExec ('org.sygil.session.lastname = \'\';');
    $core->addExec ('org.sygil.session.firstname = \'\';');
    $core->addExec ('org.sygil.session.login = \'\';');
    $core->addExec ('org.sygil.session.update();');
}
/**
 * TODO a migrer en ajax
 **/


foreach($preload as $script) $core->addExec($script.';');

// Page central par default
if (!Session::DATA('Frame') && !Session::DATA('Ajax')) {
    if (strpos(' '.DEFAULT_CENTER,'http://')>0) {
        $core->addExec('org.sygil.frame.open(\''.DEFAULT_CENTER.'\');');
    } else {
        $core->addExec('org.sygil.ajax.load(\''.DEFAULT_CENTER.'\',\'center\',\'replace\',[]);');
    }
} else
if (Session::DATA('Frame')) {
   $core->addExec('org.sygil.frame.open(\''.Session::DATA('Frame').'\',\'Last\');');
} else {
   $core->addExec('org.sygil.ajax.load(\''.Session::DATA('Ajax').'\',\'center\',\'replace\',[]);');
}

$session->save();

ob_start('ob_gzhandler');
header('Content-Type: text/html');
echo $core->generate();

?>
