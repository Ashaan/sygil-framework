<?php

require_once(PATH_CORE.'/include/widget/css/panel.php');

class Form extends CssPanel {
    protected $name;
    protected $content  = array();

    public function __construct($name='') {
        CssPanel::__construct();
        $this->name    = $name;
    }

    public function addContent($content) {  
        if (is_array($this->content)) {
            return $this->content[] = $content;
        }
        return null;
    } 
    public function setContent($content) {  
        $this->content = $content;
    } 

    protected function getData() {
        $content = '';
        if (is_array($this->content)) {
            foreach($this->content as $line) {
                if (is_object($line)) {
                    $content .= $line->generate();
                } else {
                    $content .= $line;
                }
            }
        } else {
            $content = $this->content;
        }

        $data = array(
            '__ID__'      => $this->name,
            '__CONTENT__' => $content,
            '__STYLE__'   => $this->getCss(),
        );

        return $data;
    }

    public function generate() {
        return '';
    }
}

?>
