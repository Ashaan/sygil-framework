<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" dir="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="php apache mysql mathieu chocat ashaan ##site_keywords##" />
  <meta name="author" content="Mathieu Chocat"/>
  <meta name="version" content="$Id: index.tpl 54 2007-02-07 10:08:48Z mathieu $"/>
  <meta name="copyright" content="(c) 2006-2009 Sygil.org"/>
  <title>##site_short_name## - ##site_long_name##</title>

  <script type="text/javascript">
    if (document.all && document.body && document.body.style && !document.body.style.maxHeight) {
      alert('##msg_ie6##');
    } else
    if (document.layers) {
      alert('##msg_ns6##');
    }
    lang_disconnect = '##Disconnect##';
    lang_connect    = '##Connect##';
    lang_register   = '##Register##';
  </script>
__THEME__
__SCRIPT__
  <script type="text/javascript">
__SCRIPT_INIT__
  </script>
</head>
<body onload="__ONLOAD__">
  <div id="header">
    <span>##Welcome_on## ##site_short_name##</span>
    <div>
      <div class="headhoption" onmouseover="setDisplay('site_list','block')" onmouseout="setDisplay('site_list','none')">Option</div>
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
    <div class="headvoption" onclick="">##Register##</div>
    <div class="headvseparator"></div>
    <div class="headvoption" onclick="ajax.load('connect',null,'replace',[])">##Connect##</div>
  </div>
  <div id="tempdiv">
  </div>
</body>
