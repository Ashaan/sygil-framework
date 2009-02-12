function MenuBlock() {
    this.current     = 0;
    this.list        = [];

    this.init = function() {
        atop    = 0;
        abottom = 0;
        aheight = 23;
        aI      = 0;

        for (i=0;i<this.list.length;i++) {
            content = document.getElementById('menu_block_content_'+this.list[i]);
            content.style.display = 'none';
            if (this.list[i]<=this.current) {
                aI = i;
            }
        }

        for (i=0;i<=aI;i++) {
            title   = document.getElementById('menu_block_title_'+this.list[i]);
            title.style.top    = atop    + 'px';
            title.style.bottom = null;
            title.style.height = aheight + 'px';
            atop += aheight+1;
        }

        for (i=this.list.length-1;i>aI;i--) {
            title   = document.getElementById('menu_block_title_'+this.list[i]);
            title.style.bottom = abottom + 'px';
            title.style.top    = null;
            title.style.height = aheight + 'px';
            abottom += aheight + 1;
        }	

        content = document.getElementById('menu_block_content_'+this.current);
        content.style.top    = atop    + 'px';
        content.style.bottom = abottom + 'px';
        content.style.display= 'block';
  
        url.menu_block_id = this.current;
        url.save();
    }

    this.close = function() {
        arrow   = document.getElementById('menu_block_manager');
        zleft   = document.getElementById('left');
        zcenter = document.getElementById('center');

        if (arrow.className == 'menu_block_manager_close') {
            arrow.className = 'menu_block_manager_open';
            zleft.style.width  = left_width;
            zcenter.style.left = center_left;
            url.menu_block_open = 1;
        } else {
            arrow.className = 'menu_block_manager_close';
            left_width  = zleft.style.width;
            center_left =  zcenter.style.left;
            zleft.style.width = 10 + 'px';
            zcenter.style.left = 10 + 'px';
            url.menu_block_open = 0;
        }  

        url.save();
    }

    this.change = function(id) {
        this.current = id;
        this.init();
    }
}
menu_block = new MenuBlock();


Url.prototype.menu_block_id   = 0;
Url.prototype.menu_block_open = 1;
Url.prototype.loadMenuBlock = function() {
    menu_block.change(this.menu_block_id);
    if (this.menu_block_open==0) {
      	document.getElementById('menu_block_manager').className = 'menu_block_manager_open';
      	menu_block.close();
    }
}
Url.prototype.saveMenuBlock = function() {
    temp = '';

    if (this.menu_block_id   != 1) temp += '&MenuBlockId='+this.menu_block_id;
    if (this.menu_block_open == 0) temp += '&MenuBlockClose';

    return temp;
}
url.addLoadScript('this.loadMenuBlock'); 
url.addSaveScript('this.saveMenuBlock');
