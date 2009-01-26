<?php

$core = Core::getInstance();

$core->loadModule('block2');

$block = new Block2Horizontal('blog');
$block->setSizeLeft (null);
$block->setSizeRight('200px');

$block->addLeft ('Blablabla');
$block->addRight('');

//$core->addExec('ajaxLoad(\'calendar\',\'block2_right_blog\',\'add\',[\'zone\',0]);');
$core->addExec('ajaxLoad(\'lastfm_player\',\'block2_right_blog\',\'add\',[]);');
$core->setData('__NAME__','Accueil');
$core->setData('__CONTENT__',$block->generate());

?>
