<?php

$core = Core::getInstance();

// Donnée
$core->addTheme('module/block2/theme/default/theme.css');
//$core->addScript('module/2bloc/script/script.js');

//$core->addScriptUrlInit ('url_menu_box_status = ['.$data.'];');
//$core->addScriptUrlRead ('urlReadMenuBox();');
//$core->addScriptUrlWrite('data += urlWriteMenuBox();');

$core->addInclude('module/block2/include/horizontal.php');
$core->addInclude('module/block2/include/vertical.php');

?>
