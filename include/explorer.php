<?php

class Explorer {
  private $views     = array ('list','icon','compact');
  private $files     = array();
  private $directory = array();

  public  $sysbase   = '/data/www/sygil/www/';
  public  $sysurl    = 'http://www.sygil.org/';

  public  $view      = 1;
  public  $base      = '/data/www/sygil/www';
  public  $path      = '';
  public  $cpath     = ''; 
  public  $secuser   = null;
  public  $secgroup  = 'apache';
  public  $secmask   = 0655;
  public  $sortKey   = 'name';
  public  $sortAsc   = true;

  public function __construct($base,$view=1,$secuser=null,$secgroup='apache') {
    $this->view      = $view;
    $this->base      = $base;
    $this->secuser   = $secuser;
    $this->secgroup  = $secgroup;
  }

  public function setPath($path) {

    $this->cpath = $path;
    $this->path  = $this->base.$path;
    if (strpos($this->path,'..')>0) {
      $path = str_replace('/..','',$path);
      $path = substr($path,0,strrpos($path,'/'));
      $this->cpath = $path;
      $this->path  = $this->base.$path;

      if (strpos($this->path,'..')>0) { 
        $this->cpath = '';
        $this->path = $this->base;
      }
    }
    echo 'http://'.$_SERVER['SERVER_NAME'].$this->cpath;
  }

  public function prepare() {
    $this->files     = array();
    $this->directory = array();


    $directory = opendir($this->path);
    while ($dir=readdir($directory)) {
      if ($dir=='.') continue;
      if ($dir=='..' && $this->path == $this->base.'/') continue;
      if ($dir=='..' && $this->path == $this->base) continue;

      if (is_dir($this->path.'/'.$dir)) { 
        $this->directory[] = $this->loadDirectory($dir);
      } else {
        $this->files[]     = $this->loadFile($dir);
      }
    }

    $this->directory = $this->resort($this->directory);
    $this->files     = $this->resort($this->files);
  }

  private function resort($array) {
    $new     = array();
    foreach($array as $data) {
      $sample = $data[$this->sortKey];
      $new[$sample] = $data;
    }
    if ($this->sortAsc) {
       ksort($new);
    } else {
       krsort($new);
    }

    return $new;
  }

  private function loadDirectory($directory) {
    // Calcule du nombre d'element
    $tmps  = opendir($this->path.'/'.$directory);
    $size = 0;
    while ($tmp=readdir($tmps)) {
      if ($tmp!='.' && $tmp !== '.') {
        $size++;
      }
    }

    $data = array(
      'name'  => $directory,
      'size'  => $size,
      'type'  => 'folder',
      'desc'  => 'Folder',
      'link'  => is_link($this->path.'/'.$directory),
      'last'  => filemtime($this->path.'/'.$directory),
      'user'  => posix_getpwuid(fileowner($this->path.'/'.$directory)),
      'group' => posix_getgrgid(filegroup($this->path.'/'.$directory)),
      'perms' => fileperms($this->path.'/'.$directory)
    );

    return $data;
  }

  private function loadFile($file) {
    $info = new finfo(FILEINFO_MIME,'/data/www/sygil/www/theme/mime/magic');
    $temp = explode (' ',$info->file($this->path.'/'.$file));
    $mime = $temp[0];

    $info = new finfo(FILEINFO_NONE,'/data/www/sygil/www/theme/mime/magic');
    $desk = $info->file($this->path.'/'.$file);

    $data = array(
      'name'  => $file,
      'size'  => filesize($this->path.'/'.$file),
      'type'  => $mime,
      'desc'  => $desk,
      'link'  => is_link($this->path.'/'.$file),
      'last'  => filemtime($this->path.'/'.$file),
      'user'  => posix_getpwuid(fileowner($this->path.'/'.$file)),
      'group' => posix_getgrgid(filegroup($this->path.'/'.$file)),
      'perms' => fileperms($this->path.'/'.$file)
    );

    return $data;
  }

  private function getIcon($type) {
    $mime = explode('/',$type);

    if (file_exists($this->sysbase.'theme/mime/gnome-mime-'.$mime[0].'-'.$mime[1].'.png')) {
      $icon = $this->sysurl.'/theme/mime/gnome-mime-'.$mime[0].'-'.$mime[1].'.png';
    } else
    if (file_exists($this->sysbase.'theme/mime/'.$mime[0].'-'.$mime[1].'.png')) {
      $icon = $this->sysurl.'/theme/mime/'.$mime[0].'-'.$mime[1].'.png';
    } else 
    if (file_exists($this->sysbase.'theme/mime/gnome-mime-'.$mime[0].'-generic.png')) {
      $icon = $this->sysurl.'/theme/mime/gnome-mime-'.$mime[0].'-generic.png';
    } else
    if (file_exists($this->sysbase.'theme/mime/'.$mime[0].'-generic.png')) {
      $icon = $this->sysurl.'/theme/mime/'.$mime[0].'-generic.png';
    } else
    if (file_exists($this->sysbase.'theme/mime/'.$mime[1].'.png')) {
      $icon = $this->sysurl.'/theme/mime/'.$mime[1].'.png';
     } else {
      $icon = $this->sysurl.'/theme/mime/'.$mime[0].'.png';
    }

    return $icon;
  }

  private function getSize($octet) {
    $giga = round($octet / (1024*1024*1024));
    if ($giga>=1) {
      return $giga.' Go';
    }

    $mega = round($octet / (1024*1024));
    if ($mega>=1) {
      return $mega.' Mo';
    }

    $kilo = round($octet / (1024));
    if ($kilo>=1) {
      return $kilo.' ko';
    }

    return $octet.' o';
  }

  private function getElement($size) {
    if ($size==0) return 'vide';
    if ($size==1) return '1 élément';
    return $size.' éléments';
  }

  public function generate() {
    $content = '';

    $alt = 1; 
    foreach($this->directory as $dir) {
      $data = array(
        '__ICON__' => $this->getIcon($dir['type']),
        '__ARROW__'=> $this->sysurl.'/theme/arrowlr.png',
        '__NAME__' => $dir['name'],
        '__SIZE__' => $this->getElement($dir['size']),
        '__URL__'  => '?p='.$this->cpath.'/'.$dir['name'],
        '__TYPE__' => $dir['desc'],
        '__DATE__' => $dir['last'],
        '__ALT__'  => 'alt'.$alt 
      ); 
      $alt = ($alt==1)?2:1;
      $content .= Template::_get('explorer_element',$data);
    }

    foreach($this->files as $dir) {
      $data = array(
        '__ICON__' => $this->getIcon($dir['type']),
        '__ARROW__'=> $this->sysurl.'/theme/noarrow.png',
        '__NAME__' => $dir['name'],
        '__SIZE__' => $this->getSize($dir['size']),
        '__URL__'  => $this->cpath.'/'.$dir['name'],
        '__TYPE__' => $dir['desc'],
        '__DATE__' => $dir['last'],
        '__ALT__'  => 'alt'.$alt  
      ); 
      $alt = ($alt==1)?2:1;
      $content .= Template::_get('explorer_element',$data);
    }

    return $content;
  }
}

?>
