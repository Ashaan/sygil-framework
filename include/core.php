<?php

class Core {
    static private $instance = null;
    public  $config   = null;
    private $template = null;
    private $script   = array();
    private $theme    = array();
    private $data     = array();
    private $exec     = array();
    private $jsUrlInit  = '';
    private $jsUrlRead  = '';
    private $jsUrlWrite = '';
    private $jsTemplate = array();

    static public function getInstance() {
        if (Core::$instance == null) {
            Core::$instance = new Core();
        }
        return Core::$instance;
    } 

    public function setTemplate($template) {
        $this->template = $template;
    }
    
    public function addScript($script) {
        if (!in_array($script, $this->script)) {
            $this->script[] = $script;
        }
    }
    public function addTheme($theme) {
        if (!in_array($theme, $this->theme)) {
            $this->theme[] = $theme;
        }
    }
    public function addJsTemplate($template) {
        if (!in_array($template, $this->jsTemplate)) {
            $this->jsTemplate[] = $template;
        }
    }
    public function addInclude($include) {
        require_once($include);
    }
    public function addExec($exec) {
        $this->exec[] = $exec;
    }
    public function addScriptUrlInit($script) {
        if ($this->jsUrlInit!='') $this->jsUrlInit .= "\n";
        $this->jsUrlInit .= '      '.$script;
    }
    public function addScriptUrlRead($script) {
        if ($this->jsUrlRead!='') $this->jsUrlRead .= "\n";
        $this->jsUrlRead .= '      '.$script;
    }
    public function addScriptUrlWrite($script) {
        if ($this->jsUrlWrite!='') $this->jsUrlWrite .= "\n";
        $this->jsUrlWrite .= '      '.$script;
    }
    public function load($config) {
        $path = 'config/'.$config.'.php';
        if ($this->config) $path = $this->config['path'].'/'.$path;

        include($path);
    }

    public function loadModule($module) {
        $path = 'module/'.$module.'/index.php';
        if ($this->config) $path = $this->config['path'].'/'.$path;

        include($path);
    }

    public function setData($name,$value) {
        $this->data[$name] = $value;
    }

    
    public function generateIndex() {
        $this->data['__THEME__'] = '';
        foreach($this->theme as $theme) {
            $this->data['__THEME__']  .= Template::getInstance()->get('index_theme' ,array('__URL__'=> $theme)); 
        }
        $this->data['__SCRIPT__'] = '';
        foreach($this->script as $script) {
            $this->data['__SCRIPT__'] .= Template::getInstance()->get('index_script',array('__URL__'=> $script)); 
        }
        $this->data['__URL_INIT__']  = $this->jsUrlInit; 
        $this->data['__URL_READ__']  = $this->jsUrlRead; 
        $this->data['__URL_WRITE__'] = $this->jsUrlWrite; 
        $this->data['__ONLOAD__']    = 'url.load();';

        return Template::getInstance()->get($this->template,$this->data);
    }
    public function generateAjax() {
        $this->data['__COMMAND__'] = $_GET['command'];
        $this->data['__TARGET__']  = $_GET['target'];
        $this->data['__METHOD__']  = $_GET['method'];
        $this->data['__EXEC__'] = '';
        foreach($this->exec as $exec) {
            $this->data['__EXEC__']  .= Template::getInstance()->get('ajax_exec' ,array('__EXEC__'=> $exec)); 
        }
        $this->data['__THEME__'] = '';
        foreach($this->theme as $theme) {
            $this->data['__THEME__']  .= Template::getInstance()->get('ajax_theme' ,array('__URL__'=> $theme)); 
        }
        $this->data['__SCRIPT__'] = '';
        foreach($this->script as $script) {
            $this->data['__SCRIPT__'] .= Template::getInstance()->get('ajax_script',array('__URL__'=> $script)); 
        }
        $this->data['__TEMPLATE__'] = '';
        foreach($this->jsTemplate as $name => $template) {
            $data = array(
                '__NAME'   => $name,
                '__DATA__' => base64_encode($script) // a encoder base64, max 255 caractere
            );
            $this->data['__TEMPLATE__'] .= Template::getInstance()->get('ajax_template',$data); 
        }
        if (isset($this->data['__CONTENT__'])) {
            $this->data['__CONTENT__'] = '<content>'.base64_encode($this->data['__CONTENT__']).'</content>';
        } else {
            $this->data['__CONTENT__'] = '<content/>';
        }
        return Template::getInstance()->get($this->template,$this->data);
    }

    public function generate() {
        if (strpos('  '.$this->template,'index')>0) {
            return $this->generateIndex();
        } else
        if (strpos('  '.$this->template,'ajax')>0) {
            return $this->generateAjax();
        } else {
            return 'missing template ('.$this->template.')';
        }
    }
}

?>
