<?php

$core = Core::getInstance();

$core->loadModule('org.sygil.base.window');

$content = Template::getInstance()->get('about',array());

$window = new Window('window_about');
$window->setTitle('A Propos de...');
$window->position->setWidth('300px');
$window->position->setHeight('200px');
$window->position->setCentered();
$window->setContent($content);

$core->setContent($window);

?>
