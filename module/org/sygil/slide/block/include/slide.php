<?php

class SlideBlock {
  private $content;

  public function __construct($title='') {
    $this->title   = $title;
    $this->content = array();
  }

  public function addBlock($menu, $default = 0) {
    $this->content[] = $menu;
  }

  public function generate() {
    $content = '';
    foreach($this->content as $menu) {
      $content .= $menu->generate();
    }
    $data = array(
      '__BLOCK__' => $content,
    );

    return Template::getInstance()->get('slide',$data,'org.sygil.slide.block');
  }
}

?>
