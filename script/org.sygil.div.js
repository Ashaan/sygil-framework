registerNamespace('org.sygil.div')

org.sygil.div = function/*org.sygil.div*/() {
    var virtualId     = 0;
    var virtualName   = [];
    var virtualObject = [];
    var real          = [];

    function _VirtTarget(target) {
        if (!target || target=='') {
            target = virtualId++;
        }

        var object = null;
        if (org.sygil.div.isVirtual(target)) {
            for (var i=0;i<virtualObject.length;i++) { 
                if (virtualName[i]==target) {
                    object = virtualObject[i];
                }   
            }
        }

        if (!object) {
            object=document.createElement("div");
            object.setAttribute("name", target);
            document.getElementById("virtual").appendChild(object);
            virtualName[virtualName.length] = target;
            virtualObject[virtualObject.length] = object;
        } else {
            object.display = 'block';
        }

        return object;
    }
    function _VirtAdd(target,content) {
        _VirtTarget(target).innerHTML += content;
    }
    function _VirtSet(target,content) {
        _VirtTarget(target).innerHTML = content;
    }
    function _RealSet(target, content) {
        document.getElementById(target).innerHTML  = content;
    }
    function _RealAdd(target, content) {
        document.getElementById(target).innerHTML  += content;
    }

    return {
        add : function(target,method,content,key) {
            if(!document.getElementById(target) || org.sygil.div.isVirtual(target)) {
                if (method=='add') {
                    _VirtAdd(target,content);
                } else {
                    _VirtSet(target,content);
                }
            } else {
                if (target=='center' && key) document.getElementById(target).key = key;
                if (method=='add') {
                    _RealAdd(target,content);
                } else {
                    _RealSet(target,content);
                }
            }
        },
        isVirtual : function (target) {
            for (var i=0;i<virtualName.length;i++) { 
                if (virtualName[i]==target) {
                    return true;
                }   
            }
            return false
        }
    };
}();
