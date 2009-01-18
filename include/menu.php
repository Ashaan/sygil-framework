<?php

class Menu {
  private static $Count = 1;
  private $id;
  private $title;
  private $url;
  private $option;

  public function __construct($title='', $url=null) {
    $this->title = $title;
    $this->url   = $url;
    $this->option= array();
    $this->opened= 1;
    $this->id    = Menu::$Count++;
    if (isset($_GET['m'.$this->id])) {
      $this->opened = $_GET['m'.$this->id]; 	
    }
  }
 
  public function getId() {
    return $this->id;
  }

  public function addOption($option) {
    $this->option[] = $option;
  }

  public function generate() {
  	global $tplData;
    $options = '';
    foreach ($this->option as $option) {
      $options .= $option->generate();
    }

    if (!$this->opened) {
      $tplData['__PREPARE__'] .= 'menuClose('.$this->id.');';
    }
    
    $data = array(
      '__ID__'    => $this->id,
      '__TITLE__' => $this->title,
      '__URL__'   => $this->url,
      '__OPTION__'=> $options,
      '__OPENED__'=> $this->opened
    );

    return Template::get('menu',$data);
  }
}

class Option {
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

    return Template::get('option',$data);
  }
}

class Block {
  private static $Count = 1;
  private $id;
  private $title;
  private $content;
  private $active;

  public function __construct($title='') {
    $this->title   = $title;
    $this->content = array();
    $this->id      = Block::$Count;
    Block::$Count = Block::$Count + 1;
    $this->active  = false;
  }

  public function getId() {
    return $this->id;
  }

  public function addMenu($menu) {
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

    return Template::get('block',$data);
  }
}

class Blocks {
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

    return Template::get('blocks',$data);
  }
}

?>
