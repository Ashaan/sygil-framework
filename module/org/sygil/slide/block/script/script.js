function SlideBlock() {
    this.width = '210px';

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
