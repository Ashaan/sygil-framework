<?php

class Core {
    static private $instance = null;
    public  $config   = null;
    private $template = null;
    private $script   = array();
    private $theme    = array();
    private $data     = array();
    private $exec     = array();
    private $scriptInit     = '';
    private $scriptTemplate = array();
    private $themeList = array();
    private $langList = array();

    static public function getInstance() {
        if (Core::$instance == null) {
            Core::$instance = new Core();
        }
        return Core::$instance;
    } 

    public function __construct() {
	$this->setThemeList(
	    array(
		'glossy' 		=> 'Gnome Glossy Theme',
		'aurora-midnight'	=> 'Gnome Aurora Midnight Theme',
		'green-glossy'		=> 'Gnome Green Glossy Theme'
	    )
	);
	$this->setLangList(
	    array(
		'french' 		=> '##french##',
		'english'		=> '##english##'
	    )
	);
    }

    public function setTemplate($template) {
        $this->template = $template;
    }

    public function setThemeList($list) {
        $this->themeList = $list;
    }
    public function setLangList($list) {
        $this->langList = $list;
    }
    
    public function addScript($script) {
        if (!in_array($script, $this->script)) {
            $this->script[] = $script;
        }
    }
    public function addTheme($path) {
        foreach ($this->themeList as $name => $desc) {
            $tmp = str_replace('NAME',$name,$path);
	    $key = md5($name.'|'.$path);
	    if (file_exists(CORE_PATH.'/'.$tmp)) {
                $this->theme[$key] = array($name,$tmp);
	    } else {
	        $tmp = str_replace('NAME','default',$path);
	        $key = md5($name.'|'.$path);
	        $this->theme[$key] = array($name,$tmp);
	    }
        }
    }
    public function addScriptTemplate($template) {
        if (!in_array($template, $this->scriptTemplate)) {
            $this->scriptTemplate[] = $template;
        }
    }
    public function addInclude($include) {
        require_once($include);
    }
    public function addExec($exec) {
        $this->exec[] = $exec;
    }
    public function addScriptInit($script) {
        if ($this->scriptInit!='') $this->scriptInit .= "\n";
        $this->scriptInit .= '      '.$script;
    }
    public function load($config) {
	if ($config) {
	    $path = CORE_CONFIG.'/'.$config.'.php';
	    include($path);
	}
    }

    public function loadModule($module) {
        $path = 'module/'.$module.'/index.php';
        if ($this->config) $path = CORE_PATH.'/'.$path;

        include($path);
    }

    public function setData($name,$value) {
        $this->data[$name] = $value;
    }

    
    public function generateIndex() {
        $this->data['__THEME__'] = '';
        foreach($this->theme as $theme) {
	    $style = ($theme[0]==DEFAULT_THEME || $theme[0]==null)?'stylesheet':'alternate stylesheet';	
            $this->data['__THEME__']  .= Template::getInstance()->get('index_theme' ,
		array(
		    '__NAME__'  => $theme[0]?' title="'.$theme[0].'"':'',
		    '__URL__'   => $theme[1],
		    '__STYLE__' => $style
		)
	    ); 
        }
        $this->data['__SCRIPT__'] = '';
        foreach($this->script as $script) {
            $this->data['__SCRIPT__'] .= Template::getInstance()->get('index_script',array('__URL__'=> $script)); 
        }
        $this->data['__SCRIPT_INIT__']  = $this->scriptInit; 

        $this->data['__ONLOAD__']    = 'url.load();session.update();';

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
	    $style = ($theme[0] == DEFAULT_THEME)?'stylesheet':'alternate-stylesheet';	
            $this->data['__THEME__']  .= Template::getInstance()->get('ajax_theme' ,
		array(
		    '__NAME__'  => $theme[0],
		    '__URL__'   => $theme[1],
		    '__STYLE__' => $style
		)
	    ); 
        }
        $this->data['__SCRIPT__'] = '';
        foreach($this->script as $script) {
            $this->data['__SCRIPT__'] .= Template::getInstance()->get('ajax_script',array('__URL__'=> $script)); 
        }
        $this->data['__TEMPLATE__'] = '';
        foreach($this->scriptTemplate as $name => $template) {
            $data = array(
                '__NAME'   => $name,
                '__DATA__' => base64_encode($script) // a encoder base64, max 255 caractere
            );
            $this->data['__TEMPLATE__'] .= Template::getInstance()->get('ajax_template',$data); 
        }
        if (isset($this->data['__CONTENT__'])) {
            $content = $this->data['__CONTENT__'];
            $this->data['__CONTENT__'] = '';
            $len     = strlen($content);
            for ($i=0;$i<$len/512;$i++) {
                $send    = substr($content,0,512);
                $content = substr($content,512);
                $this->data['__CONTENT__'] .= 
                    '<content part="'.$i.'">'.
                        base64_encode(utf8_decode($send)).
                    '</content>';
            }
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
