<?php

class Template {
    static private $instance = null;
    private $file  = array();
    static public function getInstance() {
        if (Template::$instance == null) {
            Template::$instance = new Template();
        }
        return Template::$instance;
    } 
    private function config() {
        if (class_exists('Core')) {
            return Core::getInstance()->config;
        } else {
            echo '<!-- Deprecated Template Config Call -->';
            return array(
                'path'     => '/data/www/sygil/www',
                'template' => 'default',
            );
        }
    }

    private function load($name, $module = null) {
        $key  = $module.'/'.$name;
        if (!isset($this->file[$key])) {
            $config = $this->config();
            $module = ($module)?'/module/'.$module:'';
            $path = $config['path'].$module.'/template/'.$config['template'].'/'.$name.'.tpl';
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

       return $tpl;
    }

    static public function _get($name,$data) {
        echo '<!-- Deprecated Template Get : '.$name.' -->';
        $template = Template::getInstance();

        return $template->get($name,$data);
    }
}

/**
  public  static $base = '';
  private static $file = array();

  public static function load($name) {
    if (!isset(Template::$file[$name])) {
        $f              = fopen(Template::$base.'tpl/'.$name.'.tpl','r');
        Template::$file[$name] = fread($f,filesize(Template::$base.'tpl/'.$name.'.tpl'));
        fclose($f);
    }
    return Template::$file[$name];
  }

  public static function get($name,$data) {
    $tpl = Template::load($name);

    foreach($data as $key => $value) {
      $tpl = str_replace($key,$value,$tpl);
    }

    return $tpl;
  }
*/

?>
