menu_block_current     = 0;
menu_block_list        = [];

function MenuBlockInit() {
  atop     = 0;
  abottom  = 0;
  aheight  = 23;
  aI   = 0;

  for (i=0;i<menu_block_list.length;i++) {
    content = document.getElementById('menu_block_content_'+menu_block_list[i]);
    content.style.display = 'none';
    if (menu_block_list[i]<=menu_block_current) {
      aI = i;
    }
  }

  for (i=0;i<=aI;i++) {
    title   = document.getElementById('menu_block_title_'+menu_block_list[i]);
    title.style.top    = atop    + 'px';
    title.style.bottom = null;
    title.style.height = aheight + 'px';
    atop += aheight+1;
  }

  for (i=menu_block_list.length-1;i>aI;i--) {
    title   = document.getElementById('menu_block_title_'+menu_block_list[i]);
    title.style.bottom = abottom + 'px';
    title.style.top    = null;
    title.style.height = aheight + 'px';
    abottom += aheight + 1;
  }	

  content = document.getElementById('menu_block_content_'+menu_block_current);
  content.style.top    = atop    + 'px';
  content.style.bottom = abottom + 'px';
  content.style.display= 'block';
  
  url_menu_block_id = menu_block_current;
  urlBuild();
}

function MenuBlockManagerClose() {
  arrow   = document.getElementById('menu_block_manager');
  zleft   = document.getElementById('left');
  zcenter = document.getElementById('center');
  if (arrow.className == 'menu_block_manager_close') {
    arrow.className = 'menu_block_manager_open';
    zleft.style.width  = left_width;
    zcenter.style.left = center_left;
    url_menu_block_open = 1;
  } else {
    arrow.className = 'menu_block_manager_close';
    left_width  = zleft.style.width;
    center_left =  zcenter.style.left;
    zleft.style.width = 10 + 'px';
    zcenter.style.left = 10 + 'px';
    url_menu_block_open = 0;
  }  
  urlBuild();
}

function MenuBlockSwitch(id) {
    menu_block_current = id;
    MenuBlockInit();
}


function urlReadMenuBlock() {
    MenuBlockSwitch(url_menu_block_id);
    if (url_menu_block_open==0) {
      	document.getElementById('menu_block_manager').className = 'menu_block_manager_open';
      	MenuBlockManagerClose();
    }
}
function urlWriteMenuBlock() {
    temp = '';

    if (url_menu_block_id   != 1) temp += '&MenuBlockId='+url_menu_block_id;
    if (url_menu_block_open == 0) temp += '&MenuBlockClose';

    return temp;
}
