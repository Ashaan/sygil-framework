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

  <script type="text/javascript">
    var warning  = 'installer un navigateur fiable :\n';
        warning += '  - Mozilla Firefox (pour un rendu optimal)\n';
        warning += '  - Google Chrome\n';
        warning += '  - Opera\n';
        warning += '  - Safari\n';

    if (document.all && document.body && document.body.style && !document.body.style.maxHeight) {
      alert('Ce site ne fonctionne pas avec Internet Explorer 6-\n\nMettez a jour Windows ou '+warning);
    } else
    if (document.layers) {
      alert('Ce site ne fonctionne pas avec Netscape 6-\n\n'+warning);
    }
  </script>
__THEME__
__SCRIPT__
  <script type="text/javascript">
__SCRIPT_INIT__
  </script>
</head>
<body onload="__ONLOAD__">
  <div id="header">
    Bienvenue sur sygil.org
    <div>
      <div class="headhoption" onclick="window.location='?goto=home';">Accueil</div>
      <div class="headhseparator"></div> 
      <div class="headhoption" onmouseover="setDisplay('site_list','block')" onmouseout="setDisplay('site_list','none')">Site</div>
    </div>  
  </div>

  <div id="body">
    <div id="left">   __LEFT__   </div>
    <div id="center"> __CENTER__ </div>
    <div id="right">  __RIGHT__  </div>
  </div>

  <div id="footer">Mathieu Chocat © Copyright 2006-2009 [Ashaan / Sygil.org]</div>
  <div id="shortcut" style="">
    <img class="add" src="theme/default/add-28x28.png" onclick="shortcut.add();"/>
  </div>

  <div id="site_list" class="hidden" onmouseover="setDisplay('site_list','block')" onmouseout="setDisplay('site_list','none')">
    <div class="headvoption" onclick="window.location='?goto=home'">     Sygil Network  </div>
    <div class="headvseparator"></div>
    <div class="headvoption" onclick="window.location='?goto=intranet'"> Intranet       </div>
    <div class="headvseparator"></div>
    <div class="headvoption" onclick="window.location='?goto=dubois'">   Racine Dubois  </div>
    <div class="headvoption" onclick="window.location='?goto=chocat'">   Famille Chocat </div>
  </div>
</body>
