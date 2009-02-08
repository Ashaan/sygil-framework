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
        menu   = document.getElementById('site_list');
        header = document.getElementById('header').getElementsByTagName('span')[0];
        menu.innerHTML = '';
	    if (session.isConnect) {
	         menu.innerHTML   += '<div class="option" onclick="session.disconnect()">' + lang_disconnect + '</div>';  
   	        header.innerHTML  = 'Bonjour, ' + this.lastname + ' ' + this.firstname; 
	    } else {
	        menu.innerHTML += '<div class="option" onclick="">' + lang_register +'</div>';
	        menu.innerHTML += '<div class="separator"></div>';
	        menu.innerHTML += '<div class="option" onclick="ajax.load(\'connect\',null,\'replace\',[])">' + lang_connect + '</div>';
   	        header.innerHTML  = 'Bienvenue sur Sygil.org !'; 
	    }

        for (var i=0;i<this.updateScript.length;i++) {
            var func = this.updateScript[i] + '();';
            eval(func);
        }
    }
}

session = new Session();
