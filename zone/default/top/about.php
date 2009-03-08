<?php
require_once(PATH_CORE.'/include/widget/form/window.php');

$core = Core::getInstance();

$content = Template::getInstance()->get('content_about',array());

$window = new FormWindow('window_about');
$window->setTitle('A Propos de...');
$window->position->setWidth('300px');
$window->position->setHeight('200px');
$window->position->setCentered();
$window->setContent($content);

$core->setContent($window);

?>
