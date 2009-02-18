<?php

$core = Core::getInstance();
$core->loadModule('shortcut');
$shortcut = new ShortCut();

$core->setData('__CONTENT__', $shortcut->generate());

?>
