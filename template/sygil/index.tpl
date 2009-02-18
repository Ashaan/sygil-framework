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
    function onLoad() {
      __EXEC__
    }
  </script>
</head>
<body onload="url.load();onLoad();__ONLOAD__">
  <div id="header">
    <span></span>
    <div>
      <div class="headhoption" onmouseout="setDisplay('vmenu_account','none')" onmouseover="if(!isExist('vmenu_account')){ajax.load('top/account','vmenu_account','replace',[]);}else{setDisplay('vmenu_account','block');}" onmouseout="">Mon Compte</div>
    </div>  
  </div>

  <div id="body">
    <div id="left"></div>
    <div id="center"></div>
    <div id="right"></div>
  </div>

  <div id="footer">Powered by  <A HREF="http://www.sygil.org"><IMG SRC="http://www.sygil.org/data/logo.png" HEIGHT="19" STYLE="vertical-align:middle;border:0px;"/></A> PHP Framework</div>
  <div id="virtual"></div>
</body>
