<?php
require_once(PATH_CORE.'/include/widget/form/window.php');

$core = Core::getInstance();

$window = new FormWindow('window_connect');
$window->setTitle('Gestionnaire de Connection');
$window->position->setWidth('248px');
$window->position->setHeight('144px');
$window->position->setCentered();
$window->setContent(Template::getInstance()->get('index_connect',array()));

$core->setData('__CONTENT__',$window->generate());

?>
