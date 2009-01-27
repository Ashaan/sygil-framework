<?php

$core = Core::getInstance();

// Donnée
$core->addTheme('module/menu_box/theme/default/theme.css');
$core->addScript('module/menu_box/script/script.js');

$data = '';
if (isset($_GET['MenuBoxClose'])) {
    $lists = explode(',',$_GET['MenuBoxClose']);
    foreach ($lists as $list) {
        if ($data!='') $data .= ',';
        $data .= '['.$list.',0]';
    }
}
$core->addScriptInit ('url.menu_box_status = ['.$data.'];');


$core->addInclude('module/menu_box/include/box.php');
$core->addInclude('module/menu_box/include/option.php');

?>
