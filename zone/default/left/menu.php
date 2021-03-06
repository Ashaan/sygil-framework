<?php
//Syntax
/**
 *$block = new MenuBlockBlock('');
 *$menu = new MenuBoxBox('');
 *$menu->addOption(new MenuBoxOption(''          , 'org.sygil.frame.open(\'http:// \', this)'));
 *$block->addElement($menu);
 *$menu = new MenuBoxBox('');
 *$menu->addOption(new MenuBoxOption(''            , null));
 *$block->addElement($menu);
 *$blocks->addBlock($block);
 */

$core = Core::getInstance();
$core->loadModule('org.sygil.menu.block');


$blocks = new MenuBlockManager();

$block = new MenuBlockBlock('Accueil');
$menu = new MenuBoxBox('Accueil');
$menu->addOption(
    new MenuBoxOption(
        'Accueil',
        'org.sygil.ajax.open(\'blog\')'
    )
);
$block->addElement($menu);


$menu = new MenuBoxBox('Titre 1');
$menu->addOption(new MenuBoxOption('exemple 1 google'   , 'org.sygil.frame.open(\'http://google.fr/\', this)'));
$menu->addOption(new MenuBoxOption('exemple 2'          , null));
$block->addElement($menu);
$menu = new MenuBoxBox('Titre 2');
$menu->addOption(new MenuBoxOption('Exemple 1'            , 'org.sygil.frame.open(\'http://yousiteweb.com/\', this)'));
$menu->addOption(new MenuBoxOption('Exemple 2'            , null));
$menu->addOption(new MenuBoxOption('Exemple 3'            , null));
$block->addElement($menu);
$menu = new MenuBoxBox('Titre ..');
$menu->addOption(new MenuBoxOption('exemple 5'            , 'org.sygil.frame.open(\'http://www.yousite.org/\', this)'));
$block->addElement($menu);
$blocks->addBlock($block);

$block = new MenuBlockBlock('Block 2');
$menu = new MenuBoxBox('Titre 1');
$menu->addOption(new MenuBoxOption('exemple 1 modzilla'          , 'org.sygil.frame.open(\'http://www.mozilla-europe.org/fr/firefox/\', this)'));
$block->addElement($menu);
$menu = new MenuBoxBox('Titre 2');
$menu->addOption(new MenuBoxOption('exemple 2 youtube'            , 'org.sygil.frame.open(\'http://www.youtube.com/?gl=FR&hl=fr\', this)'));
$block->addElement($menu);
$blocks->addBlock($block);


$block = new MenuBlockBlock('Block 3');
$menu = new MenuBoxBox('Général');
$menu->addOption(new MenuBoxOption('Accueil'             , ''));
$menu->addOption(new MenuBoxOption('Utilisateur'         , ''));
$block->addElement($menu);
$blocks->addBlock($block);


//Block need identification to appear
$session = Session::getInstance();
if ($session->isLogged()) {
    $cacti = 'http://cacti.sygil.local/graph_view.php';
    $block = new MenuBlockBlock('Monitoring');
    $menu = new MenuBoxBox('Statistique System');
    $menu->addOption(new MenuBoxOption('Aegis [sygil]'       , 'org.sygil.frame.open(\''.$cacti.'?action=tree&tree_id=2\', this)'));
    $menu->addOption(new MenuBoxOption('Enae [sygil]'        , 'org.sygil.frame.open(\''.$cacti.'?action=tree&tree_id=3\', this)'));
    $menu->addOption(new MenuBoxOption('Ashaan [sygil]'      , 'org.sygil.frame.open(\''.$cacti.'?action=tree&tree_id=4\', this)'));
    $menu->addOption(new MenuBoxOption('Elorah [sygil]'      , null));
    $menu->addOption(new MenuBoxOption('Jean-Mi [chocat]'    , 'org.sygil.frame.open(\''.$cacti.'?action=tree&tree_id=5\', this)'));
    $menu->addOption(new MenuBoxOption('Féfé [chocat]'       , null));
    $menu->addOption(new MenuBoxOption('Antonin [chocat]'    , null));
    $block->addElement($menu);
    $menu = new MenuBoxBox('Statistique Reseau');
    $menu->addOption(new MenuBoxOption('nTop'                , 'org.sygil.frame.open(\'http://exemple.local:3000\', this)'));
    $menu->addOption(new MenuBoxOption('Webalizer'           , 'org.sygil.frame.open(\'http://exemple.org/webalizer\', this)'));
    $block->addElement($menu);
    $menu = new MenuBoxBox('Administration');
    $menu->addOption(new MenuBoxOption('phpMyAdmin'          , 'org.sygil.frame.open(\'http://sql.free.fr\', this)'));
    $menu->addOption(new MenuBoxOption('Teamspeak'           , 'org.sygil.frame.open(\'https://exemple.org:14534/\', this)'));
    $block->addElement($menu);
    $blocks->addBlock($block);
}

$core->setData('__CONTENT__', $blocks->generate());
$core->addExec ('menu_block.change('.Session::DATA('default').');');
if (Session::DATA('close')) $core->addExec('menu_block.close();');
if (Session::DATA('box')  ) $core->addExec('menu_box.closes(['.Session::DATA('box').']);');
?>
