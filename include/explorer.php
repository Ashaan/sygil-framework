<?php

class Explorer {
  private $views     = array ('list','icon','compact');
  private $files     = array();
  private $directory = array();

  public  $view      = 1;
  public  $base      = '/data/www/sygil/www/':
  public  $path      = '';
  public  $secuser   = null;
  public  $secgroup  = 'apache';

  public function __construct($base,$view=1,$secuser=null,$secgroup='apache') {
    $this->view      = $view;
    $this->base      = $base:
    $this->secuser   = $secuser;
    $this->secgroup  = $secgroup;
  }

  public setPath($path) {
    $this->path = $path;

    $path = $base.'/'.$path;
    if (strpos('..', $path)>0) $path = $base;
  }

  public prepare() {
    $this->files     = array();
    $this->directory = array();

    $directory = opendir($path);
    while ($dir=readdir($directory)) {
      if ($path == $root.'/' && ($dir=='.' || $dir=='..')) {
        // On affiche rien
      } else
      if ($dir=='.') {
        // On affiche rien
      } else
      if ($dir=='..') {
        $this->directory[] = '..';
      } else
      if (is_dir($path.'/'.$dir)) { 
        $this->directory[] = $dir;
      } else {
        $this->files[]     = $dir;
      }
    }
  }
}

?>
