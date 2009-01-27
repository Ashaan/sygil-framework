<?php

$core = Core::getInstance();

// Donnée
$core->addTheme('module/panel/theme/default/theme.css');
//$core->addScript('module/2bloc/script/script.js');

//$core->addScriptUrlInit ('url_menu_box_status = ['.$data.'];');
//$core->addScriptUrlRead ('urlReadMenuBox();');
//$core->addScriptUrlWrite('data += urlWriteMenuBox();');

$core->addInclude('module/panel/include/panel.php');
$core->addInclude('module/panel/include/line.php');

?>
