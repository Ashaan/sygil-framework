<?php

class Template {
    static private $instance = null;
    private $file  = array();
    private $lang  = array();

    static public function getInstance() {
        if (Template::$instance == null) {
            Template::$instance = new Template();
        }
        return Template::$instance;
    } 

    function __construct() {
	$lang = array();
	include(CORE_PATH.'/langue/'.DEFAULT_LANGUE.'.php');
	$this->lang = $lang;
    }
    private function load($name, $module = null) {
        $key  = $module.'/'.$name;
        if (!isset($this->file[$key])) {
            $module = ($module)?'/module/'.$module:'';
            $path = CORE_PATH.$module.'/template/'.CURRENT_TEMPLATE.'/'.$name.'.tpl';
            $f    = fopen($path,'r');
            $this->file[$key] = fread($f,filesize($path));
            fclose($f);
        }

        return $this->file[$key];
    }

    public function get($name,$data, $module = '') {
       $tpl = $this->load($name,$module);

       foreach($data as $key => $value) {
          $tpl = str_replace($key,$value,$tpl);
       }
       foreach($this->lang as $key => $value) {
          $tpl = str_replace('##'.$key.'##',$value,$tpl);
       }

       return $tpl;
    }
}

?>
