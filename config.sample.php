<?php

/*
$core = Core::getInstance();
$core->config = array(
    'templateList'  => array(
        'default'   => 'Template par Default',
    ),
    'themeList'     => array(
        'default'   => 'Theme par Default',
    ),
    'langList'      => array(
        'french'    => 'Francais',
        'english'   => 'Anglais',
    )
);
*/

foreach($_POST as $name => $value) {
    $_GET[$name] = $value;
}
if (!isset($_GET['Frame']) && !isset($_GET['Ajax'])) {
    $_GET['Ajax'] = 'blog';
}

define('CORE_PATH'  ,'/data/www/sygil/www');
define('CORE_URL'   ,'http://www.sygil.org');
define('CORE_CONFIG','/data/www/sygil/www/config');

define('DEFAULT_LANGUE'  ,'french');
define('DEFAULT_THEME'   ,'default');
define('DEFAULT_TEMPLATE','default');
define('DEFAULT_LEFT'    ,'left');
define('DEFAULT_CENTER'  , null);
define('DEFAULT_RIGHT'   , null);

define('CURRENT_LANGUE'  ,'french');
define('CURRENT_THEME'   ,'default');
define('CURRENT_TEMPLATE','default');

define('DATABASE_HOST','localhost');
define('DATABASE_NAME','sygil_base');
define('DATABASE_USER','sygil.org');
define('DATABASE_PASS','Y6YHXJdMMfxAvpzz');
define('DATABASE_PRE' ,'');
define('DATABASE_TYPE','mysqli');

?>
