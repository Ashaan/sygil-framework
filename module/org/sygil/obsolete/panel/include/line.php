<?php

class PanelLine {
    private static $Count = 1;
    private $id;
    private $content = '';
    private $background = null;

    public function __construct($id='') {
        $this->id    = $id;
    }
 
    public function setContent($content) {  
        $this->content = $content;
    } 

    public function setBackground($background) {
        $this->background = $background;
    }

    public function generate() {
        $style = '';        
        if ($this->background) {
            $style .= 'background:'.$this->background.';';
        }
    
        $data = array(
            '__ID__'      => $this->id,
            '__CONTENT__' => $this->content,
            '__STYLE__'    => $style,
        );
        return Template::getInstance()->get('line',$data,'org.sygil.base.panel');
    }
}

?>
