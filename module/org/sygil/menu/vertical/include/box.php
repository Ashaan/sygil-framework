<?php

require_once(PATH_CORE.'/include/widget/css/position.php');

class MenuVertical {
  private static $Count = 1;
  private $id;
  private $parent;
  private $name;
  private $option;
  public  $position;

  public function __construct($name='',$parent=null) {
    $this->name     = $name;
    $this->parent   = $parent;
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
  public function addOption($name,$link) {
    $this->option[] = new MenuVerticalOption($name,$link);
  }
  public function addSubMenu($name,$id,$link) {
    $this->option[] = new MenuVerticalSub($name,$id,$link);
  }
  public function addSeparator() {
    $this->option[] = Template::getInstance()->get('separator',array(),'org.sygil.menu.vertical');
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
      '__ID__'     => $this->name,
      '__OPTION__' => $options,
      '__ISSUB__'  => ($this->parent?'true':'false'),
      '__PARENT__' => ($this->parent?$this->parent:'null'),
      '__STYLE__'  => $this->position->getCSS(0),
    );

    $core = Core::getInstance();
    return Template::getInstance()->get('box',$data,'org.sygil.menu.vertical');
  }
}

?>
