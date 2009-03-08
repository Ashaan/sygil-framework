<?php

require_once(PATH_CORE.'/include/widget/css.php');

class CssFont extends Css {
    static public $STYLE_NORMAL   = 'normal';
    static public $STYLE_ITALIC   = 'italic';
    static public $STYLE_OBLIQUE  = 'oblique';
    static public $WEIGHT_NORMAL  = 'normal';
    static public $WEIGHT_BOLD    = 'bold';
    static public $WEIGHT_BOLDER  = 'bolder';
    static public $WEIGHT_LIGHTER = 'lighter';

    private $color    = null;
    private $size     = null;
    private $style    = null;
    private $weight   = null;

    public function setColor($color) {
        $this->color = $color;
    }

    public function setSize($size) {
        $this->size = $size;
    }

    public function setStyle($style) {
        $this->style = $style;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function getCSS($genMode=0) {
        $css  = '';

        $css .= $this->getLine('color'      , $this->color , $genMode);
        $css .= $this->getLine('font-size'  , $this->size  , $genMode);
        $css .= $this->getLine('font-style' , $this->style , $genMode);
        $css .= $this->getLine('font-weight', $this->weight, $genMode);

        return $css;
    }
}

?>
