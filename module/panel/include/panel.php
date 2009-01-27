<?php

class Panel {
    private static $Count = 1;
    private $id;
    private $left    = null;
    private $right   = null;
    private $bottom  = null;
    private $top     = null;
    private $width   = null;
    private $height  = null;
    private $content = array();

    public function __construct($id='') {
        $this->id    = $id;
    }
 
    public function setLeft($left) {
        $this->left = $left;
    }
    public function setRight($right) {
        $this->right = $right;
    }
    public function setBottom($bottom) {
        $this->bottom = $bottom;
    }
    public function setTop($top) {
        $this->top = $top;
    }
    public function setWidth($width) {
        $this->width = $width;
    }
    public function setHeight($height) {
        $this->height = $height;
    }

    public function addLine($id) {  
        if (is_array($this->content)) {
            return $this->content[] = new PanelLine($id);
        }
        return null;
    } 
    public function setContent($content) {  
        $this->content = $content;
    } 

    public function generate() {
        $content = '';
        if (is_array($this->content)) {
            foreach($this->content as $line) {
                $content .= $line->generate();
            }
        } else {
            $content = $this->content;
        }

        $style = '';
        if ($this->left) $style   .= 'left:'.$this->left.';';
        if ($this->right) $style  .= 'right:'.$this->right.';';
        if ($this->bottom) $style .= 'bottom:'.$this->bottom.';';
        if ($this->top) $style    .= 'top:'.$this->top.';';
        if ($this->width) $style  .= 'width:'.$this->width.';';
        if ($this->height) $style .= 'height:'.$this->height.';';
                

        $data = array(
            '__ID__'      => $this->id,
            '__CONTENT__' => $content,
            '__STYLE__'   => $style,
        );
        return Template::getInstance()->get('panel',$data,'panel');
    }
}

?>
