<?php

$core = Core::getInstance();

$content = Template::getInstance()->get('lastfm_player',array());

$core->setData('__CONTENT__',$content);

?>
