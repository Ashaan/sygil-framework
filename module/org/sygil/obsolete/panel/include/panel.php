<?php

require_once(PATH_CORE.'/include/widget/css/panel.php');

class Panel extends CssPanel {
    private static $Count = 1;
    private $id;
    private $content  = array();

    public function __construct($id='') {
        CssPanel::__construct();
        $this->id    = $id;
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

        $data = array(
            '__ID__'      => $this->id,
            '__CONTENT__' => $content,
            '__STYLE__'   => $this->getCss(),
        );
        return Template::getInstance()->get('panel',$data,'org.sygil.base.panel');
    }
}

?>
