<?php
  $temp = microtime();
  $temp = explode(" ", $temp);
  
  function  getUID()
  {
    $temp = microtime();
    $temp = explode(" ", $temp);
  
    $r1 = (string)($temp[1]);
    for($i=strlen($r1);$i<10;$i++) $r2 = '0'.$r1;

    $r2 = (string)($temp[0]*1000000);
    for($i=strlen($r2);$i<6;$i++) $r2 = '0'.$r2;
    
    $r3 = (string)rand(0,999);
    for($i=strlen($r3);$i<3;$i++) $r3 = '0'.$r3;
    
    
    
    return $r1.$r2.$r3;
  }
  
  echo '<br>MicroTime : '.getUID();
  echo '<br>Long  MD5 UUID : '.md5(uniqid(rand(), true));
  echo '<br><br><br>';
  echo '<br>short MD5 UUID : '.md5 (uniqid ());
  echo '<br>Long  MD5 UUID : '.md5(uniqid(rand(), true));

  echo '<br>short UUID : '.uniqid ();
  echo '<br>Long  UUID : '.uniqid(rand(), true);

?>