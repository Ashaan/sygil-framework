<?php

$core = Core::getInstance();

$core->loadModule('window');
$window = new Window('register_windows');
$window->setTitle('Gestion des inscriptions');

    $core->loadModule('panel');

    $window->setWidth(480);
    $window->setHeight(180);

    $panel = new panel('register_panel');
    $panel->setContent(Template::getInstance()->get('index_register',array()));
    $panel->setTop('22px');
    $panel->setLeft('0px');
    $panel->setRight('0px');
    $panel->setHeight('90px');

    $window->setContent($panel->generate());
    $window->setCenter();

$core->setData('__CONTENT__',$window->generate());

?>
