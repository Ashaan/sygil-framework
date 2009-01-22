tpl_frame = '<iframe name="frame" id="frame" frameborder="0" marginheight="0" marginwidth="0"></iframe>';

function frameInit() {
    document.getElementById('frame').onload = frameResize;
    window.onresize = frameResize;
}

function frameResize() {
    var height = document.documentElement.clientHeight;

    height -= document.getElementById('frame').offsetTop;
    height -= 41;

    document.getElementById('frame').style.height = height +"px";
}

function frameOpen(name) {
    document.getElementById('center').innerHTML = tpl_frame;
    frameInit();
    var myf = document.getElementById("frame");
    myf = myf.contentWindow || myf;
    myf.location = name;
    frameInit();
    frameResize();
    url_ajax  = '';
    url_frame = name;
    urlBuild();
}

function urlReadFrame() {
    if (url_frame != '') {
        frameOpen(url_frame);
        url_ajax  = '';
    }
}
function urlWriteFrame() {
    if (url_frame) {
        return '&Frame='+url_frame;
    }
    return '';
}

