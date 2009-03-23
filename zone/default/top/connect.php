<?php
require_once(PATH_CORE.'/include/widget/form/window.php');

$core = Core::getInstance();

$window = new FormWindow('window_connect');
$window->setTitle('Gestionnaire de Connection');

if (Session::DATA('username')) {
    $session = Session::getInstance();

    $window->position->setWidth(260);
    $window->position->setHeight(100);
    $window->position->setCentered();

    if ($session->isLogged()) {
        $window->setContent('<center>Vous étes maintenant connecté<br/><input class="button" class="button" value="Ok" onclick="session.wclose();"/></center>');
    } else {
        $window->setContent('<center>La connection a echoué<br/><input class="button" class="button" value="Ok" onclick="session.wclose();"/></center>');
    }
} else {
    $window->position->setWidth('248px');
    $window->position->setHeight('144px');
    $window->position->setCentered();
    $window->setContent(Template::getInstance()->get('index_connect',array()));
}

$core->setData('__CONTENT__',$window->generate());

?>
