<?php

$core = Core::getInstance();

$content = Template::getInstance()->get('lastfm_player',
    array(
        '__RADIO__' => urlencode('user/Ashaan/personal'),
        '__TITLE__' => urlencode('Sygil.org - Radio'),
        '__THEME__' => 'blue', // grey, black,red / http://www.lastfm.fr/widgets
        '__LANG__'  => 'fr'
    )
);

$core->setData('__CONTENT__',$content);

?>
