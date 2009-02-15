<?php

$core = Core::getInstance();

// Donnée
$core->addTheme ('theme.css', 'menu_box');
$core->addScript('script.js', 'menu_box');

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
