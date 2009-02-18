function DivManager() {
    this.vid     = 0;
    this.virtualName   = [];
    this.virtualObject = [];
    this.real    = [];

    this.add = function(target,method,content,key) {
        if(!document.getElementById(target) || this.isVirtual(target)) {
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

    this.isVirtual = function (target) {
        for (var i=0;i<this.virtualName.length;i++) { 
            if (this.virtualName[i]==target) {
                return true;
            }   
        }
        return false
    }

    this._VirtTarget = function (target) {
        if (!target || target=='') {
            target = this.vid++;
        }

        var object = null;
        if (this.isVirtual(target)) {
            for (var i=0;i<this.virtualObject.length;i++) { 
                if (this.virtualName[i]==target) {
                    object = this.virtualObject[i];
                }   
            }
        }

        if (!object) {
            object=document.createElement("div");
            object.setAttribute("name", target);
            document.getElementById("virtual").appendChild(object);
            this.virtualName[this.virtualName.length] = target;
            this.virtualObject[this.virtualObject.length] = object;
        } else {
            object.display = 'block';
        }

        return object;
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
