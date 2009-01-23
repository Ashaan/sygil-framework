<?php

class Block2Horizontal {
  private static $Count = 1;
  private $id;
  private $left  = array();
  private $right = array();
  private $sleft  = null;
  private $sright = null;

  public function __construct($id='') {
    $this->id    = $id;
  }
 
  public function addLeft($element) {
    $this->left[] = $element;
  }

  public function addRight($element) {
    $this->right[] = $element;
  }

  public function setSizeLeft($size) {
    $this->sleft = $size;
  }
  public function setSizeRight($size) {
    $this->sright = $size;
  }

  public function generate() {
  	global $tplData;

    $left = '';
    foreach ($this->left as $element) {
        if (is_object($element)) {
            $left .= $element->generate();
        } else {
            $left .= $element;
        }
    }

    $right = '';
    foreach ($this->right as $element) {
        if (is_object($element)) {
            $right .= $element->generate();
        } else {
            $right .= $element;
        }
    }

    if (!$this->opened) {
      $tplData['__PREPARE__'] .= 'menuClose('.$this->id.');';
    }
    
    $data = array(
      '__ID__'              => $this->id,
      '__CONTENT_LEFT__'    => $left,
      '__CONTENT_RIGHT__'   => $right,
      '__SIZE_LEFT__'       => ($this->sleft)?'width:'.$this->sleft.';':''.($this->sright)?'right:'.$this->sright.';':'',
      '__SIZE_RIGHT__'      => ($this->sleft)?'left:'.$this->sleft.';' :''.($this->sright)?'width:'.$this->sright.';':'',
    );

    return Template::getInstance()->get('horizontal',$data,'block2');
  }
}

?>
