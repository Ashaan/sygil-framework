<?php

$core = Core::getInstance();

$core->loadModule('window');
$window = new Window('window_register');
$window->setTitle('Gestion des inscriptions');

$window->position->setWidth('480px');
$window->position->setHeight('180px');
$window->position->setCentered();
$window->setContent(Template::getInstance()->get('index_register',array()));

$core->setContent($window);

?>
