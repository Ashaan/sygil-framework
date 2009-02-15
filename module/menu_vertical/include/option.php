<?php

class MenuVerticalOption {
  private $title;
  private $url;
  private $color;


  public function __construct($title='', $url=null, $color='') {
    $this->title = $title;
    $this->url   = $url;
    $this->color = $color;
  }

  public function generate() {
    $data = array(
      '__TITLE__' => $this->title,
      '__ACTION__'   => $this->url,
      '__COLOR__' => ' '.$this->color
    );

    return Template::getInstance()->get('option',$data,'menu_box');
  }
}

?>
