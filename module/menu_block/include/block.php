<?php

class MenuBlockBlock {
  private static $Count = 1;
  private $id;
  private $title;
  private $content;
  private $active;

  public function __construct($title='') {
    $this->title   = $title;
    $this->content = array();
    $this->id      = MenuBlockBlock::$Count;
    MenuBlockBlock::$Count = MenuBlockBlock::$Count + 1;
    $this->active  = false;
  }

  public function getId() {
    return $this->id;
  }

  public function addElement($menu) {
    $this->content[] = $menu;
  }

  public function setActive() {
    $this->active = true;
  }

  public function generate() {
    $content = '';
    foreach($this->content as $menu) {
      $content .= $menu->generate();
    }
    $data = array(
      '__TITLE__'   => $this->title,
      '__CONTENT__' => $content,
      '__STYLE__'   => $this->active?'display:block;':'display:none;',
      '__ID__'      => $this->id
    );

    return Template::getInstance()->get('block',$data,'menu_block');
  }
}

?>
