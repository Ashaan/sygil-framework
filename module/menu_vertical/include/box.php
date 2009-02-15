<?php

require_once(PATH_CORE.'/include/widget/css/position.php');

class MenuVertical {
  private static $Count = 1;
  private $id;
  private $title;
  private $option;
  public  $position;

  public function __construct($title='') {
    $this->title    = $title;
    $this->option   = array();
    $this->id       = MenuVertical::$Count++;
    $this->position = new CssPosition();
  }
 
  public function getId() {
    return $this->id;
  }

  public function addElement($option) {
    $this->option[] = $option;
  }

  public function generate() {
  	global $tplData;
    $options = '';
    foreach ($this->option as $option) {
      if (is_object($option)) {  
        $options .= $option->generate();
      } else {
        $options .= $option;
      }
    }

    if (!$this->opened) {
      $tplData['__PREPARE__'] .= 'menuClose('.$this->id.');';
    }
    
    $data = array(
      '__ID__'    => $this->id,
      '__TITLE__' => $this->title,
      '__URL__'   => $this->url,
      '__OPTION__'=> $options,
      '__OPENED__'=> $this->opened,
      '__STYLE__' => $this->position->getCSS(0),
    );

    return Template::getInstance()->get('box',$data,'menu_vertical');
  }
}

?>
