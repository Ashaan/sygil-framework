<?php

$core = Core::getInstance();

$core->loadModule('window');

$content = Template::getInstance()->get('about',array());

$window = new Window('window_about');
$window->setTitle('A Propos de...');
$window->setWidth(300);
$window->setHeight(180);
$window->setCenter();
$window->setContent($content);

$core->setContent($window);

?>
