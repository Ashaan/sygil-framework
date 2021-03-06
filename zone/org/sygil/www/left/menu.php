<?php

$core = Core::getInstance();
$core->loadModule('org.sygil.menu.block');

$blocks = new MenuBlockManager();

$block = new MenuBlockBlock('Accueil');
$menu = new MenuBoxBox('Accueil');
$menu->addOption(new MenuBoxOption('Accueil', 'org.sygil.ajax.open(\'home\')'));
$block->addElement($menu);

$menu = new MenuBoxBox('Services');
$menu->addOption(new MenuBoxOption('Webmail'             , 'org.sygil.frame.open(\'http://webmail.sygil.org/\', \'Webmail\')'));
$menu->addOption(new MenuBoxOption('Mumble'              , 'org.sygil.frame.open(\'http://mumble.sygil.org/\', \'Mumble\')'));
$menu->addOption(new MenuBoxOption('World Of Warcraft'   , 'org.sygil.frame.open(\'http://wow.sygil.org/\', \'World Of Warcraft\')'));
$menu->addOption(new MenuBoxOption('Overlay Gentoo'      , 'org.sygil.frame.open(\'http://projects.sygil.org/p/layman/page/Installation/\', \'Overlay Gentoo\')'));
$menu->addOption(new MenuBoxOption('Mirroir Gentoo'      , 'org.sygil.frame.open(\'http://gentoo.sygil.org/\', \'Mirroir Gentoo\')'));
$menu->addOption(new MenuBoxOption('FTP'                 , 'org.sygil.frame.open(\'ftp://ftp.sygil.org/\', \'Server FTP\')'));
$block->addElement($menu);
$menu = new MenuBoxBox('Faire un Don');
$menu->addOption('
<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post" style="padding:5px;padding-top:8px;">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="business" value="mathieu@chocat.com">
  <input type="hidden" name="item_name" value="Participation et Don pour le travail effectué sur Sygil.org">
  <input type="hidden" name="currency_code" value="EUR">
  <input type="hidden" name="amount" value="5.00">
  <input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-butcc-donate.gif" border="0" name="submit">
</form>
');
$block->addElement($menu);
$blocks->addBlock($block);

$block = new MenuBlockBlock('Projets');
$menu = new MenuBoxBox('Actif');
$menu->addOption(new MenuBoxOption('Portail Sygil'       , 'org.sygil.frame.open(\'http://projects.sygil.org/p/portal/\', this)'));
$menu->addOption(new MenuBoxOption('Sygil Overlay'       , 'org.sygil.frame.open(\'http://projects.sygil.org/p/layman/\', this)'));
$menu->addOption(new MenuBoxOption('Iptable Config'      , 'org.sygil.frame.open(\'http://projects.sygil.org/p/iptables/\', this)'));
$block->addElement($menu);
$menu = new MenuBoxBox('En Pause');
$menu->addOption(new MenuBoxOption('phpCV'               , 'org.sygil.frame.open(\'http://projects.sygil.org/p/phpcv/\', this)'));
$menu->addOption(new MenuBoxOption('Web Gallery'         , 'org.sygil.frame.open(\'http://projects.sygil.org/p/phpgallery/\', this)'));
$block->addElement($menu);
$menu = new MenuBoxBox('A l\'Etude');
$menu->addOption(new MenuBoxOption('Wanguard'            , null));
$menu->addOption(new MenuBoxOption('MailManager Daemon'  , null));
$block->addElement($menu);
$menu = new MenuBoxBox('Abandonné');
$menu->addOption(new MenuBoxOption('co² Framework'       , null));
$menu->addOption(new MenuBoxOption('Sowulo'              , null));
$block->addElement($menu);  
$blocks->addBlock($block);


$block = new MenuBlockBlock('Intranet');
$menu = new MenuBoxBox('Général');
$menu->addOption(new MenuBoxOption('Accueil'             , ''));
$menu->addOption(new MenuBoxOption('Utilisateur'         , ''));
$block->addElement($menu);
$blocks->addBlock($block);


$block = new MenuBlockBlock('Famille Chocat');
$menu = new MenuBoxBox('Général');
$menu->addOption(new MenuBoxOption('Gestionnaire de Courriel', 'org.sygil.frame.open(\'http://webmail.chocat.com\', this)'));
$block->addElement($menu);
$menu = new MenuBoxBox('Mathieu');
$menu->addOption(new MenuBoxOption('Curriculum Vitae'    , 'org.sygil.frame.open(\'http://mathieu.chocat.com\', this)'));
$menu->addOption(new MenuBoxOption('Development Zome'    , 'org.sygil.frame.open(\'http://dev.chocat.com\', this)'));
$block->addElement($menu);
$blocks->addBlock($block);

$session = Session::getInstance();

if ( strpos($_SERVER['SERVER_NAME'],'racinedubois.com')!==FALSE || strpos($_SERVER['SERVER_NAME'],'familledubois.org')!==FALSE || $session->inGroup('Dubois')) {
    $block = new MenuBlockBlock('Racines Dubois');
    $menu = new MenuBoxBox('Général');
    $menu->addOption(new MenuBoxOption('Forum'               , 'org.sygil.frame.open(\'http://www.racinedubois.com/\', this)'));
    $menu->addOption(new MenuBoxOption('Galerie'             , 'org.sygil.frame.open(\'http://image.racinedubois.com/\', this)'));
    $block->addElement($menu);
    $menu = new MenuBoxBox('Noziéres');
    $menu->addOption(new MenuBoxOption('Félicien'            , 'org.sygil.frame.open(\'http://felicien.racinedubois.com/\', this)'));
    $menu->addOption(new MenuBoxOption('Cyprien'             , 'org.sygil.frame.open(\'http://cyprien.racinedubois.com/\', this)'));
    $block->addElement($menu);
    $menu = new MenuBoxBox('Expérimental');
    $menu->addOption(new MenuBoxOption('Chat Experimental'   , 'org.sygil.frame.open(\'http://dev.racinedubois.com/\', this)'));
    $menu->addOption(new MenuBoxOption('Galerie Experimental', 'org.sygil.frame.open(\'http://gdev.racinedubois.com/\', this)'));
    $block->addElement($menu);
    $blocks->addBlock($block);
}

if ( strpos($_SERVER['SERVER_NAME'],'sygil.local')!==FALSE || $session->inGroup('Sygil')) {
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
    $menu->addOption(new MenuBoxOption('nTop'                , 'org.sygil.frame.open(\'http://sygil.local:3000\', this)'));
    $menu->addOption(new MenuBoxOption('Webalizer'           , 'org.sygil.frame.open(\'http://sygil.local/webalizer\', this)'));
    $block->addElement($menu);
    $menu = new MenuBoxBox('Administration');
    $menu->addOption(new MenuBoxOption('phpMyAdmin'          , 'org.sygil.frame.open(\'http://phpmyadmin.sygil.local\', this)'));
    $menu->addOption(new MenuBoxOption('WebMin'              , 'org.sygil.frame.open(\'https://sygil.local:10000/\', this)'));
    $block->addElement($menu);
    $blocks->addBlock($block);
}



$core->setContent($blocks);
$core->addExec ('menu_block.change('.Session::DATA('default').');');
if (Session::DATA('close')) $core->addExec('menu_block.close();');
if (Session::DATA('box')  ) $core->addExec('menu_box.closes(['.Session::DATA('box').']);');

?>
