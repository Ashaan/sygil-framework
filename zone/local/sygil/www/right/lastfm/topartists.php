<?php

$core = Core::getInstance();
$core->loadModule('lastfm');

$lastfm = new LastFM();
$lastfm->setMode('topartists');
$lastfm->setUser('Ashaan');
$lastfm->setTheme('blue');

$core->setContent($lastfm);

?>
