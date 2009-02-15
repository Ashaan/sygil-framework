<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" dir="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="php apache mysql mathieu chocat ashaan ##site_keywords##" />
  <meta name="author" content="Mathieu Chocat"/>
  <meta name="version" content="$Id: index.tpl 54 2007-02-07 10:08:48Z mathieu $"/>
  <meta name="copyright" content="(c) 2006-2009 Sygil.org"/>
  <title>##site_long_name##</title>

  <script type="text/javascript">
    if (document.all && document.body && document.body.style && !document.body.style.maxHeight) {
      alert('##msg_ie6##');
    } else
    if (document.layers) {
      alert('##msg_ns6##');
    }

    tpl_url_icon    = '__URL_ICON__';
    tpl_welcom_msg  = '##Welcome_on## ##site_short_name##';
    lang_disconnect = '##Disconnect##';
    lang_connect    = '##Connect##';
    lang_register   = '##Register##';
  </script>
__THEME__
__SCRIPT__
  <script type="text/javascript">
__SCRIPT_INIT__
    function onLoad() {
__EXEC__
    }
  </script>
</head>
<body onload="url.load();onLoad();__ONLOAD__">
  <div id="header">
    <span></span>
    <div>
      <div class="headhoption" onmouseover="setDisplay('lang_list','block')" onmouseout="setDisplay('lang_list','none')">Langue</div>
      <div class="headhoption"> | </div>
      <div class="headhoption" onmouseover="setDisplay('theme_list','block')" onmouseout="setDisplay('theme_list','none')">Theme</div>
      <div class="headhoption"> | </div>
      <div class="headhoption" onmouseover="setDisplay('site_list','block')"  onmouseout="setDisplay('site_list','none')">##Option##</div>
    </div>  
  </div>

  <div id="body">
    <div id="left"></div>
    <div id="center"></div>
    <div id="right"></div>
  </div>

  <div id="footer">Copyright©2006-2009 Sygil.org</div>
  <div id="shortcut" style="">
    <img class="add" src="__URL_ICON__/add-28x28.png" onclick="shortcut.add();"/>
  </div>

  
  <div id="site_list"  class="menu_list" onmouseover="setDisplay('site_list','block')" onmouseout="setDisplay('site_list','none')"
		       style="position:absolute;top:19px;right:0px;width:150px;"></div>
  <div id="theme_list" class="menu_list" onmouseover="setDisplay('theme_list','block')" onmouseout="setDisplay('theme_list','none')"
		       style="position:absolute;top:19px;right:15px;width:150px;">
    <div class="option" onclick="switchStyle('glossy')">Glossy</div>
    <div class="option" onclick="switchStyle('aurora-midnight')">Aurora Midnight</div>
	<div class="option" onclick="switchStyle('green-glossy')">Green Glossy</div>
<div class="option" onclick="switchStyle('wood-brun')">wood</div>
  </div>
  <div id="lang_list" class="menu_list" onmouseover="setDisplay('lang_list','block')" onmouseout="setDisplay('lang_list','none')"
		       style="position:absolute;top:19px;right:80px;width:150px;">
    <div class="option" onclick="switchLang('french')">Francais</div>
    <div class="option" onclick="switchLang('english')">Anglais</div>
  </div>

  <div id="tempdiv"></div>
</body>
