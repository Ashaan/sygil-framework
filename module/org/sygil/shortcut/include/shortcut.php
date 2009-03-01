<?php

class ShortCut {
    function generate() {
        return Template::getInstance()->get('shortcut',array(),'org.sygil.shortcut');
    }
}

?>
