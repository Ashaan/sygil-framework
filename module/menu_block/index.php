<?php

$core = Core::getInstance();

// Dependance
$core->loadModule('menu_box');

// Donnée
$core->addTheme('module/menu_block/theme/default/theme.css');
$core->addScript('module/menu_block/script/script.js');

$core->addScriptUrlInit ('url_menu_block_id   = '.(isset($_GET['MenuBlockId'])?$_GET['MenuBlockId']:1).';');
$core->addScriptUrlInit ('url_menu_block_open = '.(isset($_GET['MenuBlockClose'])?0:1).';');
$core->addScriptUrlRead ('urlReadMenuBlock();');
$core->addScriptUrlWrite('data += urlWriteMenuBlock();');

$core->addInclude('module/menu_block/include/block.php');
$core->addInclude('module/menu_block/include/manager.php');
?>
