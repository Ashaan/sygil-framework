<?php
require_once(PATH_CORE.'/include/widget/form/window.php');

$core = Core::getInstance();

$window = new FormWindow('window_connect');
$window->setTitle('Gestionnaire de Connection');

$session = Session::getInstance();

$window->position->setWidth(260);
$window->position->setHeight(100);
$window->position->setCentered();

if ($session->isLogged()) {
    $window->setContent('
        <center>
            Vous étes maintenant connecté
            <br/>
            <input class="button" type="button" value="Ok" onclick="org.sygil.utilities.setDisplay(\'window_connect\',\'none\');"/>
        </center>
    ');
} else {
    $window->setContent('
        <center>
            La connection a echoué
            <br/>
            <input class="button" type="button" value="Ok" onclick="org.sygil.utilities.setDisplay(\'window_connect\',\'none\');"/>
        </center>
    ');
}

$core->setData('__CONTENT__',$window->generate());

?>
