<?php

$core = Core::getInstance();

$core->config = array(
    'path'          => '/data/www/sygil/www',
    'url'           => 'http://www.sygil.org',
    'template'      => 'default',
    'theme'         => 'default',
    'lang'          => 'french',

    'base'          => array(
        'type'      => 'mysqli',
        'host'      => 'localhost',
        'user'      => 'sygil.org',
        'pass'      => 'Y6YHXJdMMfxAvpzz',
        'name'      => 'sygil_base',
    ),
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

?>
