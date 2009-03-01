<?php

$core = Core::getInstance();
$core->loadModule('org.sygil.slide.block');
$core->loadModule('org.sygil.base.panel');

$slide = new SlideBlock();

$panel = new Panel('panel_slide');
$panel->position->setTop   (  '0px');
$panel->position->setBottom(  '0px');
$panel->position->setLeft  (  '5px');
$panel->position->setRight (  '0px');
$panel->display->setOverflow ('none');
$row = $panel->addLine('panel_slide_row1');
$row->setBackground('#6798ca');
$row = $panel->addLine('panel_slide_row2');
$row->setBackground('#6798ca');

$slide->addBlock($panel);

$core->setContent($slide);
$core->addExec('org.sygil.ajax.load(\'right/lastfm/player\',\'panel_slide_row1\',\'replace\',[]);');
$core->addExec('org.sygil.ajax.load(\'right/lastfm/latest\',\'panel_slide_row2\',\'replace\',[]);');


?>
