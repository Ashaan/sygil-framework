<?php

$core = Core::getInstance();
$core->loadModule('lastfm');

$lastfm = new LastFM();
$lastfm->setMode('top_artist');
$lastfm->setUser('Ashaan');
$lastfm->setTheme('blue');

$core->setContent($lastfm);

?>
