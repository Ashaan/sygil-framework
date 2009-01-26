<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" dir="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="php apache mysql mathieu chocat ashaan gallery galerie galeries image images video videos vidéo vidéos photo photos album albums" />
  <meta name="author" content="Mathieu Chocat"/>
  <meta name="version" content="$Id: index.tpl 54 2007-02-07 10:08:48Z mathieu $"/>
  <meta name="copyright" content="(c) 2006-2009 Sygil.org"/>
  <title>Sygil.org - Accueil</title>
__THEME__
__SCRIPT__
  <script type="text/javascript">
__URL_INIT__
  </script>
</head>
<body onload="__ONLOAD__">
  <div id="header">
    Bienvenue sur sygil.org
    <div>
      <div class="headhoption" onclick="window.location='?goto=home';">Accueil</div>
      <div class="headhseparator"></div> 
      <div class="headhoption" onmouseover="show('site_list')" onmouseout="hide('site_list')">Site</div>
    </div>  
  </div>

  <div id="body">
    <div id="left">   __LEFT__   </div>
    <div id="center"> __CENTER__ </div>
    <div id="right">  __RIGHT__  </div>
  </div>

  <div id="footer">Mathieu Chocat © Copyright 2006-2009 [Ashaan / Sygil.org]</div>
  <div id="shortcut" style="">
    <img class="add" src="theme/default/add.png" onclick="shortcut.add();"/>
  </div>

  <div id="site_list" class="hidden" onmouseover="show('site_list')" onmouseout="hide('site_list')">
    <div class="headvoption" onclick="window.location='?goto=home'">     Sygil Network  </div>
    <div class="headvseparator"></div>
    <div class="headvoption" onclick="window.location='?goto=intranet'"> Intranet       </div>
    <div class="headvseparator"></div>
    <div class="headvoption" onclick="window.location='?goto=dubois'">   Racine Dubois  </div>
    <div class="headvoption" onclick="window.location='?goto=chocat'">   Famille Chocat </div>
  </div>
</body>
