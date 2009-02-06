<?php

$core = Core::getInstance();

$core->config = array(
    'path'          => '/data/www/sygil/www',
    'url'           => 'http://www.sygil.org',
    'template'      => 'default',
    'theme'         => 'default',
    'lang'          => 'french',

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

define('DATABASE_HOST','localhost');
define('DATABASE_NAME','sygil_base');
define('DATABASE_USER','sygil.org');
define('DATABASE_PASS','Y6YHXJdMMfxAvpzz');
define('DATABASE_PRE' ,'');
define('DATABASE_TYPE','mysqli');

?>
