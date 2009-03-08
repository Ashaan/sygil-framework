<?php

require_once(PATH_CORE.'/include/widget/form.php');

class FormPanel extends Form {
    protected $inline = false;

    public function __construct($name='',$inline=false) {
        Form::__construct($name);
        $this->inline = $inline;
    }

    public function addLine($name) {  
        if (is_array($this->content)) {
           return $this->content[] = new FormPanel($name,true);
        }
        return null;
    } 

    public function generate() {
        if ($this->inline) {
            return Template::getInstance()->get('form_panel_inline',$this->getData());
        } else {
            return Template::getInstance()->get('form_panel',$this->getData());
        }
    }
}

?>
