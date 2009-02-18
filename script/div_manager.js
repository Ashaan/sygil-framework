function DivManager() {
    this.vid     = 0;
    this.virtual = [];
    this.real    = [];

    this.add = function(target,method,content,key) {
        if(!document.getElementById(target)) {
            if (method=='add') {
                this._VirtAdd(target,content);
            } else {
                this._VirtSet(target,content);
            }
        } else {
            if (target=='center' && key) document.getElementById(target).key = key;
            if (method=='add') {
                this._RealAdd(target,content);
            } else {
                this._RealSet(target,content);
            }
        }
    }
    this._VirtTarget = function (target) {
        if (!target || target=='') {
            target = this.vid++;
        }

        var find = null;
        for (var i=0;i<document.getElementsByTagName("sygil").length;i++) { 
            if (document.getElementsByTagName("sygil")[i].getAttribute('name') == target) {
                find = document.getElementsByTagName("sygil")[i];
            }
        }

        if (!find) {
            var find=document.createElement("sygil");
            find.setAttribute("name", target);
            document.getElementsByTagName("body")[0].appendChild(find);
        }

        return find;
    }

    this._VirtAdd = function (target,content) {
        this._VirtTarget(target).innerHTML += content;
    }

    this._VirtSet = function (target,content) {
        this._VirtTarget(target).innerHTML = content;
    }
    this._RealSet = function(target, content) {
        document.getElementById(target).innerHTML  = content;
    }
    this._RealAdd = function(target, content) {
        document.getElementById(target).innerHTML  += content;
    }
} 

divManager = new DivManager();
