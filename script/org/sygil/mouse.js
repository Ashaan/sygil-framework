registerNamespace('org.sygil.mouse');

org.sygil.mouse = function() {
    var initialized     = false;
    var currentX        = 0;
    var currentY        = 0;
    var selectX         = 0;
    var selectY         = 0;
    var selectObject    = null;
    var selectId        = 0;
    
    function init() {
        if (!document.all) document.captureEvents(Event.MOUSEMOVE);
        document.onmousemove = getMouse;
        document.onmouseup   = reset;
    }
    function getMouse(e) {
        if (document.all) {
            currentX = event.clientX + document.body.scrollLeft;
            currentY = event.clientY + document.body.scrollTop;
        } else {
            currentX = e.pageX;
            currentY = e.pageY;
        }
        if (currentX<0) currentX = 0;
        if (currentY<0) currentY = 0;
            
        //update();
        if (selectObject && selectObject.style) {
            selectObject.style.top  = (currentY - selectY) + 'px';
            selectObject.style.left = (currentX - selectX) + 'px';
        }
    }
    function reset() {
        selectObject = null;
        selectId     = 0;
    }
    function update() {
        if (selectObject && selectObject.style) {
            document.getElementById('footer').innerHTML = currentX + ','+currentY + '('+ (currentY - selectY) +','+ (currentX - selectX) +')';
        } else {
            document.getElementById('footer').innerHTML = currentX + ','+currentY;
        }
    }
    if(!initialized) init();

    return {
        select : function(id) {
            element  = org.sygil.utilities.getElement(id);
            //relement = org.sygil.utilities.getElement(real);
            var left = 0; 
	        var top  = 0; 
	        var temp = element;

 //    	    while (temp.offsetParent){ 
//	            left += temp.offsetLeft; 
//	            top  += temp.offsetTop; 
//	            temp  = temp.offsetParent; 
//	        } 
//alert(temp.style.height);
    	    left += temp.offsetLeft + temp.style.width.replace(/px/g,'')/2; 
    	    top  += temp.offsetTop  + temp.style.height.replace(/px/g,'')*1; 

            selectX      = currentX - left;
            selectY      = currentY - top;
            selectObject = element;
            selectId     = id;
        },
        unSelect : function() {
            selectObject = null;
            selectId     = 0;
        }
    };
} ();

