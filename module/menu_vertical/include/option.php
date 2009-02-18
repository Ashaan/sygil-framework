<?php

class MenuVerticalOption {
  protected $title;
  protected $url;


  public function __construct($title, $url) {
    $this->title = $title;
    $this->url   = $url;
  }

  public function generate() {
    $data = array(
      '__TITLE__' => $this->title,
      '__ACTION__'=> $this->url,
    );

    return Template::getInstance()->get('option',$data,'menu_vertical');
  }
}

class MenuVerticalSub extends MenuVerticalOption {
  protected $id;

  public function __construct($title, $id, $url) {
    $this->title = $title;
    $this->id = $id;
    $this->url   = $url;
  }
  public function generate() {
    $data = array(
      '__TITLE__' => $this->title,
      '__ACTION__'=> $this->url,
      '__ID__'    => $this->id
    );

    return Template::getInstance()->get('sub',$data,'menu_vertical');
  }
}

?>
