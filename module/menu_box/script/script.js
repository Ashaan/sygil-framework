url_menu_box_status  = [];
menu_box_with_url = true;

function MenuBoxClose(id) {
    arrow   = document.getElementById('menu_box_arrow_'+id);
    content = document.getElementById('menu_box_data_'+id);
    stat    = 1;

    if (arrow.className == 'menu_box_close') {
        arrow.className = 'menu_box_open';
        content.style.display = 'block';
        stat = 1;
    } else {
        arrow.className = 'menu_box_close';
        content.style.display = 'none';	
        stat = 0;
    }

    if (menu_box_with_url) {
        menui = url_menu_box_status.length;
        for (i=0;i<url_menu_box_status.length;i++) {
  	        if (url_menu_box_status[i][0] == id) {
  	    	    menui = i;
  	        }
        }

        url_menu_box_status[menui] = [id,stat];
        urlBuild();
    }
}

function urlWriteMenuBox() {
    data = '';
    for (i=0;i<url_menu_box_status.length;i++) {
        if (url_menu_box_status[i][1]==0) {
            if (data!='') data += ','
            data += url_menu_box_status[i][0];
        }
    }
    if (data!='') {
        return '&MenuBoxClose='+data; 
    }
    return '';
}

function urlReadMenuBox() {
    menu_box_with_url = false;
    for (i=0;i<url_menu_box_status.length;i++) {
        if (url_menu_box_status[i][1]==0) {
            MenuBoxClose(url_menu_box_status[i][0]);
        }
    }
    menu_box_with_url = true;
}
