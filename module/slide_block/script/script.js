function SlideBlock() {
    this.width = '100px';
    this.change  = function() {
        arrow   = document.getElementById('slide_block');
        zright  = document.getElementById('right');

        if (arrow.className == 'slide_block_close') {
            arrow.className = 'slide_block_open';
            zright.style.width = slide_block.width;
            url.slide_block_open = 1;
        } else {
            arrow.className = 'slide_block_close';
            zright.style.width = 10 + 'px';
            url.slide_block_open = 0;
        }  

        url.save();
    }

    this.open  = function() {
        arrow   = document.getElementById('slide_block');
        zright  = document.getElementById('right');

        if (arrow.className == 'slide_block_close') {
            arrow.className = 'slide_block_open';
            zright.style.width = slide_block.width;
        } 
    }

    this.close  = function() {
        arrow   = document.getElementById('slide_block');
        zright  = document.getElementById('right');

        if (arrow.className != 'slide_block_close') {
            arrow.className = 'slide_block_close';
            zright.style.width = 10 + 'px';
        }  
    }

}
slide_block = new SlideBlock();

Url.prototype.slide_block_open = 0;
Url.prototype.loadSlideBlock = function() {
    if (this.slide_block_open==1) {
      	document.getElementById('slide_block').className = 'slide_block_close';
      	slide_block.change();
    }
}
Url.prototype.saveSlideBlock = function() {
    temp = '';

    if (this.slide_block_open == 1) temp += '&SlideBlockOpen';

    return temp;
}
url.addLoadScript('this.loadSlideBlock'); 
url.addSaveScript('this.saveSlideBlock');
