<?php
require_once(PATH_CORE.'/include/widget/form/window.php');

$core = Core::getInstance();

$content = Template::getInstance()->get('content_credit',array());

$window = new FormWindow('window_credit');
$window->setTitle('Crédits');
$window->position->setWidth('300px');
$window->position->setHeight('180px');
$window->position->setCentered();
$window->setContent($content);

$core->setContent($window);

?>
