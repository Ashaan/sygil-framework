<?php

require_once(PATH_CORE.'/include/widget/form/panel.php');

$core = Core::getInstance();

$left = new FormPanel('panel_left');
$left->position->setTop   (  '0px');
$left->position->setBottom(  '0px');
$left->position->setLeft  (  '0px');
$left->position->setRight ('205px');
$left->display->setOverflow ('auto');

$right = new FormPanel('panel_right');
$right->position->setTop   (  '0px');
$right->position->setBottom(  '0px');
$right->position->setRight (  '0px');
$right->position->setWidth  ('200px');
$right->addLine('panel_right_row1');

$core->addExec('org.sygil.ajax.load(\'home/news/latest\',\'panel_left\',\'replace\',[[\'module\',\'14a6a157d8e861359729faeb72f5ca17\']]);');
$core->addExec('org.sygil.ajax.load(\'home/calendar\',\'panel_right_row1\',\'replace\',[[\'module\',\'14a6a157d8e861359729faeb72f5ca17\']]);');

$core->setData('__NAME__'   , 'Accueil');
$core->setContent($left->generate().$right->generate());

?>
