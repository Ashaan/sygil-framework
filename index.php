<?php

// [BEGIN] Site Config
if (!isset($_GET['Frame']) && !isset($_GET['Ajax'])) {
    $_GET['Ajax'] = 'blog';
}
// [END] Site Config

require_once('include/core.php');
require_once('include/template.php');

$core = Core::getInstance();

$core->setTemplate('index');

$core->addTheme('theme/default/theme.css');

$core->addScript('script/function.js');
$core->addScript('script/url.js');
$core->addScript('script/frame.js');
$core->addScript('script/base64.js');
$core->addScript('script/ajax.js');
$core->addScript('script/shortcut.js');

$core->addScriptUrlInit ('url.frame = \''.(isset($_GET['Frame'])?$_GET['Frame']:'').'\';');
$core->addScriptUrlInit ('url.ajax  = \''.(isset($_GET['Ajax']) ?$_GET['Ajax'] :'').'\';');
//$core->addScriptUrlRead ('urlReadFrame();');
//$core->addScriptUrlRead ('urlReadAjax();');
//$core->addScriptUrlWrite('data += urlWriteFrame();');
//$core->addScriptUrlWrite('data += urlWriteAjax();');

$core->load('config');
$core->load('left');

ob_start('ob_gzhandler');
header('Content-Type: text/html');
echo $core->generate();

?>
