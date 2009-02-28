<?php

require_once(PATH_CORE.'/include/widget/css.php');

class CssDisplay extends Css {
    private $display  = null;
    private $hidden   = null;
    private $overflow = null;

    public function setDisplay($display) {
        $this->display = $display;
    }

    public function setHidden($hidden) {
        $this->hidden = $hidden;
    }

    public function setOverflow($overflow) {
        $this->overflow = $overflow;
    }

    public function getCSS($genMode=0) {
        $css  = '';

        $css .= $this->getLine('display' , $this->display , $genMode);
        $css .= $this->getLine('hidden'  , $this->hidden  , $genMode);
        $css .= $this->getLine('overflow', $this->overflow, $genMode);

        return $css;
    }
}

?>
