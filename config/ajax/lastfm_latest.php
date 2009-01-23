<?php

$core = Core::getInstance();

$content = Template::getInstance()->get('lastfm_latest',array());

$core->setData('__CONTENT__',$content);

?>
