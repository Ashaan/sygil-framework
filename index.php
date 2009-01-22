<?php

require_once('include/core.php');
require_once('include/template.php');

$core = Core::getInstance();

$core->setTemplate('index');

$core->addTheme('theme/default/theme.css');

$core->addScript('script/function.js');
$core->addScript('script/url.js');
$core->addScript('script/frame.js');
$core->addScript('script/ajax.js');

$core->addScriptUrlInit ('url_frame = \''.(isset($_GET['Frame'])?$_GET['Frame']:'').'\';');
$core->addScriptUrlInit ('url_ajax  = \''.(isset($_GET['Ajax']) ?$_GET['Ajax'] :'').'\';');
$core->addScriptUrlRead ('urlReadFrame();');
$core->addScriptUrlRead ('urlReadAjax();');
$core->addScriptUrlWrite('data += urlWriteFrame();');
$core->addScriptUrlWrite('data += urlWriteAjax();');

$core->load('config');
$core->load('left');

echo $core->generate();

?>
