
function urlBuild() {
  temp = '';

  window.location.href = '#'+urlWriteScript();
}

//  for (i=0;i<url_menubox_status.length;i++) {
//  	temp += '&m'+url_menubox_status[i][0]+'='+url_menubox_status[i][1];
//  }


function urlLoad() {
    pos = window.location.href.indexOf('#');
    len = window.location.href.length;
	if (pos > 0) {
	    if (pos==len) {
	    	window.location.href = '?';
	    } else {
	    	window.location.href = '?'+window.location.href.substr(pos+2);
	    }
    } else {
        urlReadScript();
    }
}

//      prepare();


