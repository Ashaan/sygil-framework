<?php

require_once(PATH_CORE.'/include/widget/css.php');

class CssPosition extends Css {
    private $position = null;
    private $top      = null;
    private $left     = null;
    private $bottom   = null;
    private $right    = null;
    private $width    = null;
    private $height   = null;

    public function setPosition($position) {
        $this->position = $position;
    }
    public function setLeft($left) {
        $this->left = $left;
    }
    public function setTop($top) {
        $this->top = $top;
    }
    public function setRight($right) {
        $this->right = $right;  
    }
    public function setBottom($bottom) {
        $this->bottom = $bottom;
    }
    public function setWidth($width) {
        $this->width = $width;
    }
    public function setHeight($height) {
        $this->height = $height;
    }


    public function getCSS($genMode=0) {
        $css .= getLine('position', $this->position   , $genMode);
        $css .= getLine('top'     , $this->top   , $genMode);
        $css .= getLine('left'    , $this->left  , $genMode);
        $css .= getLine('bottom'  , $this->bottom, $genMode);
        $css .= getLine('right'   , $this->right , $genMode);
        $css .= getLine('width'   , $this->width , $genMode);
        $css .= getLine('height'  , $this->height, $genMode);

    }
}

?>
