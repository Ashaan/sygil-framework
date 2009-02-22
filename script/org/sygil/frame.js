registerNamespace('org.sygil.Frame')

org.sygil.frame = function() {
    var tpl    = '<iframe id="__ID__" class="frame" src="__URL__" frameborder="0" marginheight="0" marginwidth="0"></iframe>';
    var count  = 0;

    function init() {
        element = document.getElementsByTagName('iframe');
        for (var i=0;i<element.length;i++) {
            element[i].onload = this.resize;
        }
    
        window.onresize = this.resize;
    }
    function resize() {
        var height = document.documentElement.clientHeight;

        element = document.getElementsByTagName('iframe');
        for (var i=0;i<element.length;i++) {
            height -= element[i].offsetTop;
            height -= 41;
       
            element[i].style.height = height +"px";
        }
    }

    return {
        open : function(key,info) {
            id = 'frame_' + count++;
        
            if (info) {
                if (info.innerHTML) {
                    document.getElementById('center').key = info.innerHTML.replace(/ /g,'').replace(/\r\n/g,'').replace(/\n\r/g,'').replace(/\r/g,'').replace(/\n/g,'');
                } else {
                    document.getElementById('center').key = info;
                }
            }

            document.getElementById('center').innerHTML = tpl.replace('__ID__',id).replace('__URL__',key);
            var myf = document.getElementById(id);
            myf = myf.contentWindow || myf;
            myf.location = key;

            init();
            resize();

            url.ajax  = '';
            url.frame = key;
            url.save();
        }
    };
} ();

Url.prototype.frame = null;
Url.prototype.saveFrame = function() {
    if (url.frame) {
        return '&Frame='+url.frame;
    }
    return '';
}
url.addSaveScript('this.saveFrame');
