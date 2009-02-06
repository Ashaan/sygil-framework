<?php

class Window {
    private static $Count = 1;
    private $id;
    private $content = '';
    private $title   = '';
    private $centered= false;
    private $width   = 100;
    private $height  = 100;

    public function __construct($id='') {
        $this->id    = $id;
    }
 
    public function setTitle($title) {  
        $this->title = $title;
    } 

    public function setContent($content) {  
        $this->content = $content;
    } 

    public function setCenter() {
        $this->centered = true;
        $this->style = 'position:absolute;left:50%;margin-left:-150px;top:50px;';
    }

    public function setWidth($width) {
        $this->width = $width;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function generate() {
        $style = '';
        if ($this->width)  $style .= 'width:' .$this->width. 'px;';
        if ($this->height) $style .= 'height:'.$this->height.'px;';
        if ($this->centered) {
            $style .= 'position:absolute;left:50%;top:50%;';
            if ($this->width)  $style .= 'margin-left:-'.($this->width/2) .'px;'; 
            if ($this->height) $style .= 'margin-top:-' .($this->height/1).'px;';
        }

        $data = array(
            '__ID__'      => $this->id,
            '__TITLE__'   => $this->title,
            '__CONTENT__' => $this->content,
            '__STYLE__'   => $style,
        );
        return Template::getInstance()->get('window',$data,'window');
    }
}

?>
