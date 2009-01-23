ajax = new Ajax();

function Ajax()
{
    this.queue = [];
    this.data  = [];
    this.mode  = 'GET';
    this.stat_upload   = 0;
    this.stat_download = 0;
    this.stat_count    = 0;
    this.stat_time     = 0;

    this.getEngine = function() {
        var engine = null;
	    var msxmlhttp = new Array("Msxml2.XMLHTTP.5.0","Msxml2.XMLHTTP.4.0","Msxml2.XMLHTTP.3.0","Msxml2.XMLHTTP","Microsoft.XMLHTTP");
  	    for (var i = 0; i < msxmlhttp.length; i++) {
  		    try {
                engine = new ActiveXObject(msxmlhttp[i]);
            } catch (e) {
                engine = null;
  		    }
            if (engine != null) {
                break;
            }
  	    }
 			
        if(!engine && typeof XMLHttpRequest != "undefined") engine = new XMLHttpRequest();
//        if (!IE) {
            engine.startTime = getSecTime();
//        } else {
//          this.startTime = getSecTime();
//        }
        this.stat_count++;

        return engine;
    }

    this.send = function(command,param) {
        var i = this.queue.length;
        var engine = this.getEngine();

        this.queue[i] = engine;
        this.data[i]  = new Object();
        this.data[i].startTime = getSecTime();

        if (this.queue[i]) {
  	        this.queue[i].onreadystatechange = function() {
    		    if (engine.readyState != 4) {
	  			    return false;
                }
                if (engine.status != 200) {
                    return false;
                }
                ajax.receive(engine.responseXML,engine.responseText);
//                if (!IE) {
                    ajax.stat_time += getSecTime() - engine.startTime;
//                } else {
//                    ajax.stat_time += getSecTime() - ajax.startTime;
//                }
                ajax.updateStat();
                delete engine;
            }
    
            var uri = '';
            for (var j = 0;j < param.length;j++) {
                if (uri != '') {
                    uri += '&';
                }      
                uri += param[j][0] + '=' + param[j][1];
            }
      
            this.stat_upload += uri.length + command.length;
            if (this.mode == 'POST') {
                this.sendPOST(i,command,uri);
            } else {
                this.sendGET(i,command,uri);
            }
        }
    }

    this.sendGET = function(i,command,param) {
        this.queue[i].open('GET', 'ajax.php?command='+command+'&'+param, true);
        this.queue[i].send(null);
    }

    this.sendPOST = function(i,command,param) {
        this.queue[i].open('POST', 'ajax.php?command='+command, true);
		this.queue[i].setRequestHeader("Method", "POST ajax.php HTTP/1.1");
		this.queue[i].setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        this.queue[i].send(param);
    }

    this.updateStat = function() {
        element = document.getElementById('ajaxStatDownload');
        if (element) {
            element.innerHTML = getMySize(this.stat_download);
        }
        element = document.getElementById('ajaxStatUpload');
        if (element) {
            element.innerHTML = getMySize(this.stat_upload);
        }
        element = document.getElementById('ajaxStatTime');
        if (element) {
            element.innerHTML = getMyChrono(this.stat_time/this.stat_count)+'/'+getMyChrono(this.stat_time);
        }
    }

    this.receive = function(XML, TEXT) {
        this.stat_download += TEXT.length;
        if (!XML) {
            alert(TEXT);
            return false;
        }

        var xmlDoc  = XML.documentElement;
        if (xmlDoc.tagName != 'response') {
            return false;
        }

        var target    = null;
        var content   = null;
        var method    = null;
        var exec_data = '';
        for (var i=0;i<xmlDoc.childNodes.length;i++) {
            var child = xmlDoc.childNodes[i];
            if (child.tagName == 'target') {
                target = child.firstChild.nodeValue;
            } else
            if (child.tagName == 'content') {
                content = decode64(child.firstChild.nodeValue);
            } else
            if (child.tagName == 'theme') {
                ajaxLoadCSS(child.firstChild.nodeValue,'');
            } else
            if (child.tagName == 'exec') {
                exec_data += child.firstChild.nodeValue;
            } else
            if (child.tagName == 'method') {
                method = child.firstChild.nodeValue;
            }
        }

        if (content) {
            if (method=='add') {
                document.getElementById(target).innerHTML += content;
            } else {
                document.getElementById(target).innerHTML  = content;
            }
        } else {
            alert('ya du boulot !');
        }

        if (exec_data != '') {
            eval(exec_data);
        }

        return true;

        var command = info.getElementsByTagName("COMMAND");
        if (command.length<=0) {
            return false;
        }       

        command = command[0].firstChild.nodeValue.trim().ucfirst();

        eval('this.com'+command+'(info,data);');
        return true;
    }
}

function ajaxLoadCSS(filename,name) {
    var find = false;
    for (var i=0;i<document.getElementsByTagName("link").length;i++) { 
        if (document.getElementsByTagName("link")[i].getAttribute('href') == filename) {
            find = true;
        }
    }

    if (!find) {
        var fileref=document.createElement("link");
        fileref.setAttribute("rel", "stylesheet");
        fileref.setAttribute("type", "text/css");
        fileref.setAttribute("href", filename);
        if (name) {
            fileref.setAttribute("name", name);
        }
        document.getElementsByTagName("head")[0].appendChild(fileref);
    }
}

function ajaxLoadScript(filename){
    var fileref=document.createElement('script')
    fileref.setAttribute("type","text/javascript")
    fileref.setAttribute("src", filename)
    document.getElementsByTagName("head")[0].appendChild(fileref)
}

function ajaxOpen(name) {
    var ajax = new Ajax();
    ajax.send(name,[['target','center'],['method','replace']]);

    url_frame = '';
    url_ajax  = name;
    urlBuild();
}
function ajaxLoad(name,target,method) {
    var ajax = new Ajax();
    ajax.send(name,[['target',target],['method',method]]);
}
function urlReadAjax() {
    if (url_ajax != '') {
        ajaxOpen(url_ajax);
        url_frame = '';
    }
}

function urlWriteAjax() {
    if (url_ajax) {
        return '&Ajax='+url_ajax;
    }
    return '';
}

