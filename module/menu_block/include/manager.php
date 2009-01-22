<?php

class MenuBlockManager {
  private $content;
  private $default = 0;

  public function __construct($title='', $default = 0) {
    $this->title   = $title;
    $this->content = array();
    $this->default   = $default;
  }

  public function addBlock($menu, $default = 0) {
    $this->content[] = $menu;
    if ($this->default == 0) {    
      $this->default = $menu->getId();
    }
  }

  public function generate() {
    $content = '';
    $ids     = '';
    foreach($this->content as $menu) {
      if ($this->default == $menu->getId()) {
        $menu->setActive();
      }
      if ($ids!='') $ids .= ',';
      $ids     .= $menu->getId();
      $content .= $menu->generate();
    }
    $data = array(
      '__BLOCK__' => $content,
      '__IDS__'   => $ids,
      '__ID__'    => $this->default,
    );

    return Template::getInstance()->get('manager',$data,'menu_block');
  }
}

?>
