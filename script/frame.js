function Frame() {
    this.tpl    = '<iframe id="__ID__" class="frame" src="__URL__" frameborder="0" marginheight="0" marginwidth="0"></iframe>';
    this.count  = 0;

    this.init = function() {
        element = document.getElementsByTagName('iframe');
        for (var i=0;i<element.length;i++) {
            element[i].onload = this.resize;
        }
    
        window.onresize = this.resize;
    }

    this.open = function(key,info) {
        id = 'frame_' + frame.count++;
    
        if (info) {
            if (info.innerHTML) {
                document.getElementById('center').key = info.innerHTML.replace(/ /g,'').replace(/\r\n/g,'').replace(/\n\r/g,'').replace(/\r/g,'').replace(/\n/g,'');
            } else {
                document.getElementById('center').key = info;
            }
        }

        document.getElementById('center').innerHTML = shortcut.reference(this.tpl.replace('__ID__',id).replace('__URL__',key));

        var myf = document.getElementById(id);
        myf = myf.contentWindow || myf;
        myf.location = key;

        frame.init();
        frame.resize();

        url.ajax  = '';
        url.frame = key;
        url.save();
    }

    this.resize = function() {
        var height = document.documentElement.clientHeight;

        element = document.getElementsByTagName('iframe');
        for (var i=0;i<element.length;i++) {
            height -= element[i].offsetTop;
            height -= 41;
    
            element[i].style.height = height +"px";
        }
    }
}

frame = new Frame();
//tpl_frame = '<iframe id="__ID__" class="frame" src="__URL__" frameborder="0" marginheight="0" marginwidth="0"></iframe>';
//frameCount = 0;

//function frameInit() {
//    element = document.getElementsByTagName('iframe');
//    for (var i=0;i<element.length;i++) {
//        element[i].onload = frameResize;
//    }
//
//    window.onresize = frameResize;
//}

//function frameResize() {
//    var height = document.documentElement.clientHeight;
//
//    element = document.getElementsByTagName('iframe');
//    for (var i=0;i<element.length;i++) {
//        height -= element[i].offsetTop;
//        height -= 41;
//
//        element[i].style.height = height +"px";
//    }
//}




Url.prototype.frame = null;
Url.prototype.loadFrame = function() {
    if (url.frame) {
        frame.open(url.frame,null);
        url.ajax  = null;
    }
}
Url.prototype.saveFrame = function() {
    if (url.frame) {
        return '&Frame='+url.frame;
    }
    return '';
}
url.addLoadScript('this.loadFrame'); 
url.addSaveScript('this.saveFrame');
