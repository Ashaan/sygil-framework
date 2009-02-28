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
    private $Z        = null;
    private $marginTop      = null;
    private $marginLeft     = null;
    private $marginBottom   = null;
    private $marginRight    = null;

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
    public function setZ($Z) {
        $this->Z = $Z;
    }
    public function setCentered() {
        $this->setPosition('absolute');
        $this->setLeft('50%');
        $this->setTop('50%');
        if ($this->width)  $this->marginLeft = '-'.($this->width/2) .'px'; 
        if ($this->height) $this->marginTop  = '-'.($this->height/1).'px';
    }

    public function getCSS($genMode=0) {
        $css  = '';

        $css .= $this->getLine('position'     , $this->position     , $genMode);
        $css .= $this->getLine('z-index'      , $this->Z            , $genMode);
        $css .= $this->getLine('top'          , $this->top          , $genMode);
        $css .= $this->getLine('left'         , $this->left         , $genMode);
        $css .= $this->getLine('bottom'       , $this->bottom       , $genMode);
        $css .= $this->getLine('right'        , $this->right        , $genMode);
        $css .= $this->getLine('width'        , $this->width        , $genMode);
        $css .= $this->getLine('height'       , $this->height       , $genMode);
        $css .= $this->getLine('margin-top'   , $this->marginTop    , $genMode);
        $css .= $this->getLine('margin-left'  , $this->marginLeft   , $genMode);
        $css .= $this->getLine('margin-bottom', $this->marginBottom , $genMode);
        $css .= $this->getLine('margin-right' , $this->marginRight  , $genMode);

        return $css;
    }
}

?>
