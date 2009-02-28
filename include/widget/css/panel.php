<?php

require_once(PATH_CORE.'/include/widget/css/position.php');
require_once(PATH_CORE.'/include/widget/css/display.php');
require_once(PATH_CORE.'/include/widget/css/font.php');
require_once(PATH_CORE.'/include/widget/css/background.php');

class CssPanel extends Css {
    public $position    = null;
    public $display     = null;
    public $font        = null;
    public $background  = null;

    public function __construct() {
        $this->position   = new CssPosition();
        $this->display    = new CssDisplay();
        $this->font       = new CssFont();
        $this->background = new CssBackground();
    }
    public function getCSS($genMode=0) {
        $css  = '';

        $css .= $this->position->getCSS();
        $css .= $this->display->getCSS();
        $css .= $this->font->getCSS();
        $css .= $this->background->getCSS();

        return $css;
    }
}

?>
