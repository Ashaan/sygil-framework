<?php

require_once(PATH_CORE.'/include/widget/form.php');

class FormWindow extends Form {
    protected $title   = '';

    public function setTitle($title) {  
        $this->title = $title;
    } 

    public function generate() {
        $data = $this->getData();
        $data['__TITLE__'] = $this->title;
        return Template::getInstance()->get('form_window',$data);
    }
}

?>
