<?php
require_once(PATH_CORE.'/include/widget/form/window.php');

$core = Core::getInstance();

$content = str_replace("\n",'<br/>',Template::getInstance()->get('content_licence',array()));

$window = new FormWindow('window_licence');
$window->setTitle('Licence');
$window->position->setWidth('500px');
$window->position->setHeight('300px');
$window->position->setCentered();
$window->setContent($content);

$core->setContent($window);

?>
