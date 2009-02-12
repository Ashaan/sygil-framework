<?php

$core = Core::getInstance();

$content = Template::getInstance()->get('lastfm_latest',
    array(
        '__USER__'  => 'Ashaan',
        '__THEME__' => 'blue', // grey, black,red / http://www.lastfm.fr/widgets
        '__LANG__'  => 'fr'
    )
);

$core->setData('__CONTENT__',$content);

?>
