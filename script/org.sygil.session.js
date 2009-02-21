registerNamespace('org.sygil.session');

org.sygil.session = function() {
    var isConnect    = false;
    var lastname     = '';
    var firstname    = '';
    var login        = '';
    var updateScript = [];

    return {
        connect : function() {
            var param = [];
            var form  = document.getElementById('connect');

            param[param.length] = ['username',form.username.value];
            param[param.length] = ['password',form.password.value];

            org.sygil.ajax.load('connect',null,'replace',param);
        },
        disconnect : function() {
            org.sygil.ajax.load('connect',null,'replace',[['disconnect','1']]);
        },   
        update : function() {
            headers = document.getElementById('header');
        	span    = headers.getElementsByTagName('span')[0];
	        if (isConnect) {
       	        span.innerHTML  = 'Bonjour, ' + lastname + ' ' + firstname; 
	        } else {
       	        span.innerHTML  = tpl_welcom_msg; 
	        }
            for (var i=0;i<updateScript.length;i++) {
                var func = updateScript[i] + '();';
                eval(func);
            }
        }
    };
} ();
