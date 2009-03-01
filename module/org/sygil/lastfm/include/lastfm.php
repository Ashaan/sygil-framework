<?php

class LastFM {
    private $mode = 'player';
    private $station;
    private $title;
    private $theme;

    public function setMode($mode) {
        $this->mode = $mode;
    }
    public function setStation($station) {
        $this->station = $station;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    // grey, black,red / http://www.lastfm.fr/widgets
    public function setTheme($theme) {
        $this->theme = $theme;
    }
    public function setUser($user) {
        $this->user = $user;
    }

    public function generate() {
        $data = array(
            '__RADIO__' => urlencode($this->station),
            '__TITLE__' => urlencode($this->title),
            '__THEME__' => $this->theme,
            '__USER__'  => $this->user,
            '__LANG__'  => 'fr'
        );

        return Template::getInstance()->get($this->mode,$data,'org.sygil.lastfm');
    }
}

?>
