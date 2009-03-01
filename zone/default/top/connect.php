<?php

$core = Core::getInstance();

$core->loadModule('org.sygil.base.window');
$window = new Window('window_connect');
$window->setTitle('Gestionnaire de Connection');

if (Session::DATA('disconnect')) {
    $session = Session::getInstance();

    $window->position->setWidth(260);
    $window->position->setHeight(100);
    $window->position->setCentered();

    if ($session->isLogged()) {
        $window->setContent('<center>Vous étes toujours connecté<br/><input class="button" class="button" value="Ok" onclick="session.wclose();"/></center>');
    } else {
        $window->setContent('<center>Vous avez été deconnecté<br/><input class="button" class="button" value="Ok" onclick="session.wclose();"/></center>');
//        $core->addExec ('url.reload();');
        $core->addExec ('org.sygil.session.isConnect = false;');
        $core->addExec ('org.sygil.session.lastname = \'\';');  
        $core->addExec ('org.sygil.session.firstname = \'\';');
        $core->addExec ('org.sygil.session.login = \'\';');
        $core->addExec ('org.sygil.session.update();');
//        $core->addExec ('org.sygil.session.update();');
    }
} else
if (Session::DATA('username')) {
    $session = Session::getInstance();

    $window->position->setWidth(260);
    $window->position->setHeight(100);
    $window->position->setCentered();

    if ($session->isLogged()) {
        $window->setContent('<center>Vous étes maintenant connecté<br/><input class="button" class="button" value="Ok" onclick="session.wclose();"/></center>');
        $core->addExec ('url.reload();');
//        $core->addExec ('session.isConnect = true;');
//        $core->addExec ('session.lastname = \''.$session->getUser('lastname').'\';');
//        $core->addExec ('session.firstname = \''.$session->getUser('firstname').'\';');
//        $core->addExec ('session.login = \''.$session->getUser('login').'\';');
//        $core->addExec ('session.update();');
    } else {
        $window->setContent('<center>La connection a echoué<br/><input class="button" class="button" value="Ok" onclick="session.wclose();"/></center>');
    }
} else {
    $window->position->setWidth('260px');
    $window->position->setHeight('100px');
    $window->position->setCentered();
    $window->setContent(Template::getInstance()->get('index_connect',array()));
}

$core->setData('__CONTENT__',$window->generate());

?>
