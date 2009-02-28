<?php

$core = Core::getInstance();

$core->loadModule('window');

$content = str_replace("\n",'<br/>',Template::getInstance()->get('licence',array()));

$window = new Window('window_licence');
$window->setTitle('Licence');
$window->position->setWidth('500px');
$window->position->setHeight('300px');
$window->position->setCentered();
$window->setContent($content);

$core->setContent($window);

?>
