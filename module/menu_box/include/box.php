<?php

class MenuBoxBox {
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
    $this->id    = MenuBoxBox::$Count++;
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

    return Template::getInstance()->get('box',$data,'menu_box');
  }
}

?>
