<?php

$core = Core::getInstance();

$core->loadModule('window');

$content = Template::getInstance()->get('licence',array());

$window = new Window('window_licence');
$window->setTitle('Licence');
$window->setWidth(300);
$window->setHeight(180);
$window->setCenter();
$window->setContent($content);

$core->setContent($window);

?>
