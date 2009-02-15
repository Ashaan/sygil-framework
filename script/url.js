function Url() {
    this.saveScript = [];

    this.save = function() {
        temp = '';

        for (var i=0;i<this.saveScript.length;i++) {
            var func = 'temp += ' + this.saveScript[i] + '();';
            eval(func);
        }

        window.location.href = '#'+temp;
    }

    this.load = function() {
        pos = window.location.href.indexOf('#');
        len = window.location.href.length;
	    if (pos > 0) {
	        if (pos==len) {
	        	window.location.href = '?';
	        } else {
	        	window.location.href = '?'+window.location.href.substr(pos+2);
	        }
        }
    }

    this.reload = function() {
        temp = '';

        for (var i=0;i<this.saveScript.length;i++) {
            var func = 'temp += ' + this.saveScript[i] + '();';
            eval(func);
        }

        window.location.href = '?'+temp;
    }

    this.addSaveScript = function(script) {
        this.saveScript[this.saveScript.length] = script;
    }
}

url = new Url();
