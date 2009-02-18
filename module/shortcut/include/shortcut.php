<?php

class ShortCut {
    function generate() {
        return Template::getInstance()->get('shortcut',array(),'shortcut');
    }
}

?>
