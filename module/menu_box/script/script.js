function MenuBox() {
    this.with_url = true;

    this.close = function(id) {
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

        if (this.with_url) {
            menui = url.menu_box_status.length;
            for (i=0;i<url.menu_box_status.length;i++) {
      	        if (url.menu_box_status[i][0] == id) {
      	    	    menui = i;
      	        }
            }

            url.menu_box_status[menui] = [id,stat];
            url.save();
        }
    }

    this.closes = function(status) {
        this.with_url = false;
        for (i=0;i<status.length;i++) {
            this.close(status[i]);
        }
        this.with_url = true;
    }
}
menu_box = new MenuBox();


Url.prototype.menu_box_status = [];
Url.prototype.saveMenuBox = function() {
    data = '';

    for (i=0;i<this.menu_box_status.length;i++) {
        if (this.menu_box_status[i][1]==0) {
            if (data!='') data += ','
            data += this.menu_box_status[i][0];
        }
    }
    if (data!='') {
        return '&MenuBoxClose='+data; 
    }

    return '';
}
url.addSaveScript('this.saveMenuBox');
