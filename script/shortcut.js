function Shortcut()
{
    this.count   = 0;
    this.page    = 0;
    this.data    = [];
    this.key     = [];
    this.command = [];


    this.add = function() {
        var center = document.getElementById('center');
          
        aKey = 'shortcut'+this.count++;
        if (center.key) {
            aKey = center.key;
        }

        for (var i=0;i<this.key.length;i++) {
            if (this.key[i]==aKey) {
                return false;
            }
        }
        this.key[this.key.length] = aKey;

        aCommand = '';
        if (center.command) {
            aCommand = center.command;
        }
        this.command[this.command.length] = aCommand;

        this.data[this.data.length] = center.innerHTML;

        this.draw();
    }

    this.del = function(what) {
        for (var i=0;i<this.key.length;i++) {
            if (this.key[i]==what) {
                this.key[i]     = '';
                this.data[i]    = '';
                this.command[i] = '';
            }
        }
        this.draw();
    }

    this.get = function(what) {
        var center = document.getElementById('center');

        for (var i=0;i<this.key.length;i++) {
            if (this.key[i]==what) {
                center.innerHTML = this.data[i];
            }
        }
    }

    this.draw = function() {
        data = '';
        for (var i=0;i<this.key.length;i++) {
            if (this.key[i] == '') continue; 
            data += '<div class="element" onclick="shortcut.get(\'' + this.key[i] + '\')" style="z-index:' + (1000-(i*10)) + ';">';
            data +=     this.key[i] + ' ';
            data +=     '<img class="del" src="icon/default/delete.png" onclick="shortcut.del(\'' + this.key[i] + '\');"/>';
            data += '</div>' ;
        }
        data = '<img class="add" src="icon/default/add.png" onclick="shortcut.add();"/>' + data;
        document.getElementById('shortcut').innerHTML = data;
    }

    this.reference = function(data) {
        return '<div id="page_' + (this.page++) + '" class="content">' + data + '</div>';
    }
}

shortcut = new Shortcut();
