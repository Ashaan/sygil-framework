<?php

require_once(PATH_CORE.'/include/widget/css/panel.php');

class Window extends CssPanel {
    private static $Count = 1;
    private $id;
    private $content = '';
    private $title   = '';

    public function __construct($id='') {
        CssPanel::__construct();
        $this->id    = $id;
    }
 
    public function setTitle($title) {  
        $this->title = $title;
    } 

    public function setContent($content) {  
        $this->content = $content;
    } 

    public function generate() {
        $data = array(
            '__ID__'      => $this->id,
            '__TITLE__'   => $this->title,
            '__CONTENT__' => $this->content,
            '__STYLE__'   => $this->getCss(),
        );
        return Template::getInstance()->get('window',$data,'window');
    }
}

?>
