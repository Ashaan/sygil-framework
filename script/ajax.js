function Ajax() {
    this.queue = [];
    this.data  = [];
    this.mode  = 'POST';
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
 			
        if (typeof XMLHttpRequest != "undefined") {
            engine = new XMLHttpRequest();
        }

        engine.ajaxref = this;
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
                engine.ajaxref.receive(engine.responseXML,engine.responseText);
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

    this.loadScript = function(filename){
        var find = false;
        for (var i=0;i<document.getElementsByTagName("script").length;i++) { 
            if (document.getElementsByTagName("script")[i].getAttribute('src') == filename) {
                find = true;
            }
        }

        if (!find) {
            var fileref=document.createElement('script');
            fileref.setAttribute("type","text/javascript");
            fileref.setAttribute("src", filename);
            document.getElementsByTagName("head")[0].appendChild(fileref);
        }
    }

    this.loadCSS = function(filename,name,alt) {
        var find = false;
        for (var i=0;i<document.getElementsByTagName("link").length;i++) { 
            if (document.getElementsByTagName("link")[i].getAttribute('href') == filename &&
		        document.getElementsByTagName("link")[i].getAttribute('title') == name) {
                find = true;
            }
        }

        if (!find) {
            var fileref=document.createElement("link");
            if (alt=='1') {
                fileref.setAttribute("rel", "alternate stylesheet");
            } else {
                fileref.setAttribute("rel", "stylesheet");
            }
            fileref.setAttribute("type", "text/css");
            fileref.setAttribute("href", filename);
            if (name) {
                fileref.setAttribute("title", name);
            }
            document.getElementsByTagName("head")[0].appendChild(fileref);
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
        var content   = '';
        var method    = null;
        var key       = null;
        var exec_data = '';
        for (var i=0;i<xmlDoc.childNodes.length;i++) {
            var child = xmlDoc.childNodes[i];
            if (child.tagName == 'target') {
                if (child.firstChild) {
                    target = child.firstChild.nodeValue;
                } else {
                    target = null;
                }
            } else
            if (child.tagName == 'content') {
                content += decode64(child.firstChild.nodeValue);
            } else
            if (child.tagName == 'theme') {
                this.loadCSS(child.firstChild.nodeValue,child.getAttribute('name'),child.getAttribute('alt'));
            } else
            if (child.tagName == 'script') {
                this.loadScript(child.firstChild.nodeValue,'');
            } else
            if (child.tagName == 'exec') {
                exec_data += child.firstChild.nodeValue;
            } else
            if (child.tagName == 'method') {
                method = child.firstChild.nodeValue;
            } else
            if (child.tagName == 'name') {
                key = child.firstChild.nodeValue;
            }
        }

        if (content) {
            divManager.add(target,method,content,key);
        } else {
            alert('ya du boulot !');
        }

        if (exec_data != '') {
            setTimeout(exec_data,500);
        }

        if (this != ajax) {
            delete this;
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

    this.open = function(name) {
        var temp = new Ajax();
        data = [['target','center'],['method','replace']];
        temp.send(name,data);

        url.frame = '';
        url.ajax  = name;
        url.save();
    }

    this.load = function (name,target,method,param) {
        var temp = new Ajax();
        param[param.length] = ['target',target];
        param[param.length] = ['method',method];
        temp.send(name,param);
    }
}

ajax = new Ajax();


Url.prototype.ajax = null;
Url.prototype.saveAjax = function() {
    if (this.ajax) {
        return '&Ajax='+this.ajax;
    }
    return '';
}
url.addSaveScript('this.saveAjax');

