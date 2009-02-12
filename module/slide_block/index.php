<?php

$core = Core::getInstance();

// Donnée
$core->addTheme ('theme.css', 'slide_block');
$core->addScript('script.js', 'slide_block');

$core->addScriptInit ('url.slide_block_open = '.(isset($_GET['SlideBlockOpen'])?0:1).';');

$core->addInclude('module/menu_block/include/manager.php');

?>
