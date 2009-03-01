<?php

$core = Core::getInstance();
$core->loadModule('org.sygil.shortcut');
$shortcut = new ShortCut();

$core->setContent($shortcut);

?>
