<?php
  $base    = '/data/www/sygil/www';
  $remote  = 'http://www.sygil.org';
  $root    = $_SERVER['DOCUMENT_ROOT'];
  $current = $_GET['p'];
  $path    = $root.'/'.$current;
  $tplData = array();

  require_once($base.'/include/template.php');
  Template::$base = $base . '/';

  $directory = opendir($path);
  $dirlist  = array();
  $filelist = array();
  while ($dir=readdir($directory)) {
    if ($path == $root.'/' && ($dir== "." || $dir== ".." || $dir== "explorer.php")) {
      // On affiche rien
    } else
    if ($dir== ".") {
      // On affiche rien
    } else
    if ($dir== "..") {
      $dirlist[] = '..';
    } else
    if (is_dir($path.'/'.$dir)) { 
      $dirlist[] = $dir;
    } else {
      $filelist[] = $dir;
    }
  }

  asort($dirlist);
  foreach ($dirlist as $dir) {
    $data = array(
      '__ICON__' => $remote.'/theme/mime/folder.png',
      '__NAME__' => $dir,
      '__SIZE__' => '',
      '__URL__'  => '?p='.$current.'/'.$dir,
      '__TYPE__' => 'dossier',
      '__DATE__' => filemtime($path.'/'.$dir) 
    );

    if ($dir=='..') $data['__URL__'] = '?p='.substr($current,0,strrpos($current,'/'));

    $directory = opendir($path);
    $count     = 0;
    while ($tmp=readdir($directory)) {
      if ($tmp!='.' && $tmp !== '.') {
        $count++;
      }
    }
    if ($count>1) {
      $data['__SIZE__'] = $count.' éléments';
    } else {
      $data['__SIZE__'] = $count.' élément';
    }

    $tplData['__CONTENT__'] .= Template::get('explorer_element',$data);
  }


  asort($filelist);
  foreach ($filelist as $dir) {
    $data = array(
      '__ICON__' => $remote.'/theme/mime/',
      '__ALT__'  => $remote.'/theme/mime/',
      '__NAME__' => $dir,
      '__SIZE__' => filesize($path.'/'.$dir),
      '__URL__'  => $current.'/'.$dir,
      '__TYPE__' => '',
      '__DATE__' => filemtime($path.'/'.$dir) 
    );

    $info = new finfo(FILEINFO_MIME);
    $temp = explode (' ',$info->file($path.'/'.$dir));
    $mime = explode ('/',$temp[0]);
    
    $data['__ICON__'] .= $mime[0].'.png';
    $data['__TYPE__'] = $mime[0].'/'.$mime[1];

    if (file_exists($base.'/theme/mime/gnome-mime-'.$mime[0].'-'.$mime[1].'.png')) {
       $data['__ICON__'] = $remote.'/theme/mime/gnome-mime-'.$mime[0].'-'.$mime[1].'.png';
    } else {

    }

    $tplData['__CONTENT__'] .= Template::get('explorer_element',$data);
  }

  echo Template::get('explorer',$tplData);
?>
