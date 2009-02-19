function Session() {
    this.isConnect = false;
    this.lastname  = '';
    this.firstname = '';
    this.login     = '';
    this.updateScript = [];


    this.wclose = function() {
        document.getElementById('tempdiv').innerHTML='';
    }
    
    this.connect = function() {
        var param = [];
        var form  = document.getElementById('connect');

        param[param.length] = ['username',form.username.value];
        param[param.length] = ['password',form.password.value];

        ajax.load('connect',null,'replace',param);
        this.wclose();
    }

    this.disconnect = function() {
        ajax.load('connect',null,'replace',[['disconnect','1']]);
        this.wclose();
    }

    this.update = function() {
        headers = document.getElementById('header');
	span   = headers.getElementsByTagName('span')[0];
	    if (session.isConnect) {
   	        span.innerHTML  = 'Bonjour, ' + this.lastname + ' ' + this.firstname; 
	    } else {
   	        span.innerHTML  = tpl_welcom_msg; 
	    }
        for (var i=0;i<this.updateScript.length;i++) {
            var func = this.updateScript[i] + '();';
            eval(func);
        }
    }
}

session = new Session();
