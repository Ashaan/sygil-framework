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

?>
