<?php

$core = Core::getInstance();

$core->loadModule('window');

//$content = Template::getInstance()->get('licence',array());

$window = new Window('window_credit');
$window->setTitle('Crédits');
$window->position->setWidth('300px');
$window->position->setHeight('180px');
$window->position->setCentered();
$window->setContent($content);

$core->setContent($window);

?>
