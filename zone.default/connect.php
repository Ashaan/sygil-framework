<?php

$core = Core::getInstance();

$core->loadModule('window');
$window = new Window('window_connect');
$window->setTitle('Gestionnaire de Connection');

if (Session::DATA('disconnect')) {
    $session = Session::getInstance();

    $core->loadModule('panel');

    $window->setWidth(260);
    $window->setHeight(100);

    $panel = new panel('connect_panel');

    if ($session->isLogged()) {
        $panel->setContent('<center>Vous étes toujours connecté<br/><input class="button" class="button" value="Ok" onclick="session.wclose();"/></center>');
    } else {
        $panel->setContent('<center>Vous avez été deconnecté<br/><input class="button" class="button" value="Ok" onclick="session.wclose();"/></center>');
        $core->addExec ('url.reload();');
//        $core->addExec ('session.isConnect = false;');
//        $core->addExec ('session.lastname = \'\';');  
//        $core->addExec ('session.firstname = \'\';');
//        $core->addExec ('session.login = \'\';');
//        $core->addExec ('session.update();');
    }
 
    $panel->setTop('22px');
    $panel->setLeft('0px');
    $panel->setRight('0px');
    $panel->setHeight('90px');

    $window->setContent($panel->generate());
    $window->setCenter();
} else
if (Session::DATA('username')) {
    $session = Session::getInstance();

    $core->loadModule('panel');

    $window->setWidth(260);
    $window->setHeight(100);

    $panel = new panel('connect_panel');

    if ($session->isLogged()) {
        $panel->setContent('<center>Vous étes maintenant connecté<br/><input class="button" class="button" value="Ok" onclick="session.wclose();"/></center>');
        $core->addExec ('url.reload();');
//        $core->addExec ('session.isConnect = true;');
//        $core->addExec ('session.lastname = \''.$session->getUser('lastname').'\';');
//        $core->addExec ('session.firstname = \''.$session->getUser('firstname').'\';');
//        $core->addExec ('session.login = \''.$session->getUser('login').'\';');
//        $core->addExec ('session.update();');
    } else {
        $panel->setContent('<center>La connection a echoué<br/><input class="button" class="button" value="Ok" onclick="session.wclose();"/></center>');
    }

    $panel->setTop('22px');
    $panel->setLeft('0px');
    $panel->setRight('0px');
    $panel->setHeight('90px');

    $window->setContent($panel->generate());
    $window->setCenter();
} else {
    $core->loadModule('panel');

    $window->setWidth(260);
    $window->setHeight(100);

    $panel = new panel('connect_panel');
    $panel->setContent(Template::getInstance()->get('index_connect',array()));
    $panel->setTop('22px');
    $panel->setLeft('0px');
    $panel->setRight('0px');
    $panel->setHeight('90px');

    $window->setContent($panel->generate());
    $window->setCenter();
}

$core->setData('__CONTENT__',$window->generate());

?>
