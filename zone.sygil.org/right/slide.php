<?php

$core = Core::getInstance();
$core->loadModule('slide_block');
$core->loadModule('panel');

$slide = new SlideBlock();

$panel = new Panel('panel_slide');
$panel->setTop   (  '0px');
$panel->setBottom(  '0px');
$panel->setLeft  (  '5px');
$panel->setRight (  '0px');
$panel->setOverflow ('none');
$row = $panel->addLine('panel_slide_row1');
$row->setBackground('#6798ca');
$row = $panel->addLine('panel_slide_row2');
$row->setBackground('#6798ca');

$slide->addBlock($panel);

$core->setContent($slide);
$core->addExec('org.sygil.ajax.load(\'right/lastfm/player\',\'panel_slide_row1\',\'replace\',[]);');
$core->addExec('org.sygil.ajax.load(\'right/lastfm/latest\',\'panel_slide_row2\',\'replace\',[]);');


?>
