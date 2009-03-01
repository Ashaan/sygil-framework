<?php
/**
 * Description:
 *   Template and Icon Manager 
 *
 * Author:
 *   Mathieu Chocat <mathieu@chocat.com> / Ashaan
 * Contributor:
 *   none
 *
 * Revision: $REVISION$
 *
 * Copyright(c) 2008-2009 Mathieu Chocat (or Sygil.org if applicable)
 **/


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
	    include(PATH_LANGUE.'/'.DEFAULT_LANGUE.'.php');
	    $this->lang = $lang;
    }
    private function load($name, $module = null) {
        $key  = $module.'/'.$name;
        if (!isset($this->file[$key])) {
            $path = '';
            if ($module) {
                $module = str_replace('.','/',$module);
                $path   = str_replace('MODULE',$module,PATH_MODULE_TEMPLATE).'/'.DEFAULT_TEMPLATE.'/'.$name.'.tpl';
            } else {
                $path = PATH_TEMPLATE.'/'.DEFAULT_TEMPLATE.'/'.$name.'.tpl';
            }
            $f    = fopen($path,'r');
            $this->file[$key] = fread($f,filesize($path));
            fclose($f);
        }

        return $this->file[$key];
    }

    public function get($name,$data, $module = '') {
       $tpl = $this->load($name,$module);

         
       $tpl = str_replace('__URL_ICON__',URL_ICON.'/'.DEFAULT_ICON,$tpl);
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
