<?php

$core = Core::getInstance();
$core->loadModule('org.sygil.lastfm');

$lastfm = new LastFM();
$lastfm->setMode('player');
$lastfm->setStation('user/Ashaan/personal');
$lastfm->setTitle('Sygil.org - Radio');
$lastfm->setTheme('blue');

$core->setContent($lastfm);

?>
