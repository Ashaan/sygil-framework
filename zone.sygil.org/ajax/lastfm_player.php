<?php

$core = Core::getInstance();

$content = Template::getInstance()->get('lastfm_player',
    array(
        '__RADIO__' => 'user%2FAshaan%2Fpersonal',
        '__TITLE__' => '',
        '__THEME__' => 'blue',
        '__LANG__'  => 'fr'
    )
);

$core->setData('__CONTENT__',$content);

?>
