<?php

$core = Core::getInstance();

$core->loadModule('panel');

$left = new Panel('panel_left');
$left->setTop   (  '0px');
$left->setBottom(  '0px');
$left->setLeft  (  '0px');
$left->setRight ('205px');
$left->setOverflow ('auto');
$left->setContent('Blablabla');

$right = new Panel('panel_right');
$right->setTop   (  '0px');
$right->setBottom(  '0px');
$right->setRight (  '0px');
$right->setWidth  ('200px');
$right->addLine('panel_right_row1');
$line = $right->addLine('panel_right_row2');
$line->setBackground('#6798ca');
$line = $right->addLine('panel_right_row3');
$line->setBackground('#6798ca');

$core->addExec('ajax.load(\'news_latest\',\'panel_left\',\'replace\',[[\'module\',\'14a6a157d8e861359729faeb72f5ca17\']]);');
$core->addExec('ajax.load(\'calendar\',\'panel_right_row1\',\'replace\',[[\'module\',\'14a6a157d8e861359729faeb72f5ca17\']]);');
$core->addExec('ajax.load(\'lastfm_player\',\'panel_right_row2\',\'replace\',[]);');
$core->addExec('ajax.load(\'lastfm_latest\',\'panel_right_row3\',\'replace\',[]);');

$core->setData('__NAME__','Accueil');
$core->setData('__CONTENT__',$left->generate().$right->generate());

?>
