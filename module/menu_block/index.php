<?php

$core = Core::getInstance();

// Donnée
$core->addTheme ('theme.css', 'menu_block');
$core->addScript('script.js', 'menu_block');

//$core->addScriptInit ('url.menu_block_id   = '.(isset($_GET['MenuBlockId'])?$_GET['MenuBlockId']:1).';');
//$core->addScriptInit ('url.menu_block_open = '.(isset($_GET['MenuBlockClose'])?0:1).';');

$core->addInclude('module/menu_block/include/block.php');
$core->addInclude('module/menu_block/include/manager.php');

// Dependance
$core->loadModule('menu_box');

?>
