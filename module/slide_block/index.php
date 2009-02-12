<?php

$core = Core::getInstance();

// Donnée
$core->addTheme ('theme.css', 'slide_block');
$core->addScript('script.js', 'slide_block');

$core->addScriptInit ('url.slide_block_open = '.(isset($_GET['SlideBlockOpen'])?1:0).';');

$core->addInclude('module/slide_block/include/slide.php');

?>
