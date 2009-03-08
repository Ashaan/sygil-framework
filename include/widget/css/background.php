<?php

require_once(PATH_CORE.'/include/widget/css.php');

class CssBackground extends Css {
    static public $STYLE_NORMAL   = 'normal';
    static public $STYLE_ITALIC   = 'italic';
    static public $STYLE_OBLIQUE  = 'oblique';
    static public $WEIGHT_NORMAL  = 'normal';
    static public $WEIGHT_BOLD    = 'bold';
    static public $WEIGHT_BOLDER  = 'bolder';
    static public $WEIGHT_LIGHTER = 'lighter';

    private $color     = null;
    private $image     = null;
    private $vertical  = null;
    private $horizontal= null;
    private $repeat    = null;

    public function setColor($color) {
        $this->color = $color;
    }

    public function setImage($image) {
        if ($image) {
            $this->image = 'url('.$image.')';
        } else {
            $this->image = null;
        }
    }

    public function setVertical($vertical) {
        $this->vertical = $vertical;
    }

    public function setHorizontal($horizontal) {
        $this->horizontal = $horizontal;
    }

    public function setRepeat($repeat) {
        $this->repeat = $repeat;
    }

    private function getPosition() {
        if ($this->vertical && $this->horizontal) {
            return $this->vertical.' '.$this->horizontal;
        } else
        if ($this->horizontal) {
            return $this->horizontal;
        } else
        if ($this->vertical) {
            return $this->vertical;
        } else {
            return '';
        }
    }

    public function getCSS($genMode=0) {
        $css  = '';

        $css .= $this->getLine('background-color'   , $this->color        , $genMode);
        $css .= $this->getLine('background-image'   , $this->image        , $genMode);
        $css .= $this->getLine('background-position', $this->getPosition(), $genMode);
        $css .= $this->getLine('background-repeat'  , $this->repeat       , $genMode);

        return $css;
    }
}

?>
