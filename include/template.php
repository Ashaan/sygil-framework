<?php

class Template {
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
}
?>
