<?php

$core = Core::getInstance();

$core->loadModule('panel');

// Panneau de droite pour accueillir les dernieres nouvelles
$left = new Panel('panel_left');
$left->setTop   (  '0px');
$left->setBottom(  '0px');
$left->setLeft  (  '0px');
$left->setRight ('205px');
$left->setOverflow ('auto');
$left->setContent('');

// Panneau de gauche pour accueillir les widgets (calendar, slideshow)
$right = new Panel('panel_right');
$right->setTop   (  '0px');
$right->setBottom(  '0px');
$right->setRight (  '0px');
$right->setWidth  ('200px');
$right->addLine('panel_right_row1');

$core->setData('__NAME__'   ,'Accueil');
$core->setData('__CONTENT__',$left->generate().$right->generate());

$core->addExec('ajax.load(\'home/news/latest\',\'panel_left\',\'replace\',[[\'module\',\'14a6a157d8e861359729faeb72f5ca17\']]);');
$core->addExec('ajax.load(\'home/calendar\',\'panel_right_row1\',\'replace\',[[\'module\',\'14a6a157d8e861359729faeb72f5ca17\']]);');

?>
