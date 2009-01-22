var _goto   = '';
var _openlf = '';
var left_width;
var center_left;

tpl_frame = '<iframe name="frame" id="frame" frameborder="0" marginheight="0" marginwidth="0"></iframe>';

function show(name) {
  document.getElementById(name).style.display = 'block';
}
function hide(name) {
  document.getElementById(name).style.display = 'none';
}  

function loadTpl(name) {
 document.getElementById('body').innerHTML = document.getElementById(name).innerHTML;
}
function loadUrl(name) {
  if (name.length>10) {
    loadTpl('tpl_frame');
    var myf = document.getElementById("frame");
    myf = myf.contentWindow || myf;
    myf.location = url;
  } else {
    loadTpl('tpl_main');
    blockInit();
  }
}

function openLF(name) {
  document.getElementById('center').innerHTML = tpl_frame;
  frameInit();
  var myf = document.getElementById("frame");
  myf = myf.contentWindow || myf;
  myf.location = name;
  frameInit();
  frameResize();
  _openlf = name;
  redrawUrl();
}
function redrawUrl() {
  temp = '';
  if (_openlf)       temp += '&openLF='+_openlf;
  if (_blockId!=1)   temp += '&blockid='+_blockId;
  if (_blockOpen==0) temp += '&blockclose';
  for (i=0;i<_menuStatus.length;i++) {
  	temp += '&m'+_menuStatus[i][0]+'='+_menuStatus[i][1];
  }
  window.location.href = '#'+temp;
}

function frameResize() {
    var height = document.documentElement.clientHeight;
    height -= document.getElementById('frame').offsetTop;
    height -= 41;
    document.getElementById('frame').style.height = height +"px";
}
function frameInit() {
  document.getElementById('frame').onload = frameResize;
  window.onresize = frameResize;
}

function blockSwitch(id) {
  blockCurrent = id;
  blockInit();
}
function blockInit() {
  atop     = 0;
  abottom  = 0;
  aheight  = 23;
  aI   = 0;

  for (i=0;i<blockIds.length;i++) {
    content = document.getElementById('block_content_'+blockIds[i]);
    content.style.display = 'none';
    if (blockIds[i]<=blockCurrent) {
      aI = i;
    }
  }

  for (i=0;i<=aI;i++) {
    title   = document.getElementById('block_title_'+blockIds[i]);
    title.style.top    = atop    + 'px';
    title.style.bottom = null;
    title.style.height = aheight + 'px';
    atop += aheight+1;
  }

  for (i=blockIds.length-1;i>aI;i--) {
    title   = document.getElementById('block_title_'+blockIds[i]);
    title.style.bottom = abottom + 'px';
    title.style.top    = null;
    title.style.height = aheight + 'px';
    abottom += aheight + 1;
  }	

  content = document.getElementById('block_content_'+blockCurrent);
  content.style.top    = atop    + 'px';
  content.style.bottom = abottom + 'px';
  content.style.display= 'block';
  
  _blockId = blockCurrent;
  redrawUrl();
}
function menuClose(id) {
  arrow   = document.getElementById('menub'+id);
  content = document.getElementById('menu'+id);
  stat    = 1;
  if (arrow.className == 'menu_close') {
    arrow.className = 'menu_open';
    content.style.display = 'block';
    stat = 1;
  } else {
    arrow.className = 'menu_close';
    content.style.display = 'none';	
    stat = 0;
  }

  menui = _menuStatus.length;
  for (i=0;i<_menuStatus.length;i++) {
  	if (_menuStatus[i][0] == id) {
  		menui = i;
  	}
  }
  _menuStatus[menui] = [id,stat];
  redrawUrl();
}
function blocksClose() {
  arrow  = document.getElementById('blocks');
  zleft   = document.getElementById('left');
  zcenter = document.getElementById('center');
  if (arrow.className == 'blocks_close') {
    arrow.className = 'blocks_open';
    zleft.style.width  = left_width;
    zcenter.style.left = center_left;
    _blockOpen = 1;
  } else {
    arrow.className = 'blocks_close';
    left_width  = zleft.style.width;
    center_left =  zcenter.style.left;
    zleft.style.width = 10 + 'px';
    zcenter.style.left = 10 + 'px';
    _blockOpen = 0;
  }  
  redrawUrl();
}

function checkUrl() {
    pos = window.location.href.indexOf('#');
    len = window.location.href.length;
	if (pos > 0) {
	    if (pos==len) {
	    	window.location.href = '?';
	    } else {
	    	window.location.href = '?'+window.location.href.substr(pos+2);
	    }
    } else {
      blockSwitch(_blockId);
      if (_blockOpen==0) {
      	document.getElementById('blocks').className = 'blocks_open';
      	blocksClose();
      }
      prepare();
      if (_openLF != '') openLF(_openLF);
    }
}
