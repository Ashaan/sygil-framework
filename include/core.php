<?php
/**
 * Description:
 *   Core Class
 *
 * Author:
 *   Mathieu Chocat <mathieu@chocat.com> / Ashaan
 * Contributor:
 *   none
 *
 * Revision: $REVISION$ 
 *
 * Copyright(c) 2008-2009 Sygil.org
 */
class Core {
    /**
     * Current Instance of Core
     * @var Core
     */
    static protected $instance = null;
    /**
     * List of Javascript filepath to add in the page
     * @var array of String
     */
    protected $script   = array();
    /**
     * List of CSS Theme filepath to add in the page
     * @var array of String
     */
    protected $theme    = array();
    /**
     * Liste de script a executer a l'execution (Javascript)
     * @var array of String
     */
    protected $exec     = array();
    /**
     * Template Variable Liste
     * @var unknown_type
     */
    protected $data     = array();
    /**
     * Liste des Themes disponible
     * @var array of array
     */
    protected $themeList= array(
        'glossy'          => 'Glossy',
        'aurora-midnight' => 'Aurora Midnight',
        'wood-brun'       => 'Wood Beta',
        'green-glossy'    => 'Green Glossy',
        'light-blue'      => 'DEV'
    );
    /**
     * Liste des Langues disponible
     * @var array of array
     */
    private $langList = array(
        'french'          => '##french##',
        'english'         => '##english##'
    );

    /**
     * Current Instance of Core
     * @return Core
     */
    static public function getInstance() {
        if (Core::$instance == null) {
            Core::$instance = new self();
        }
        return Core::$instance;
    } 

    public function setThemeList($list) {
        $this->themeList = $list;
    }
    public function getThemeList() {
        return $this->themeList;
    }
    public function setLangList($list) {
        $this->langList = $list;
    }
    public function getLangList() {
        return $this->langList;
    }
    public function setData($name,$value) {
        $name = '__'.str_replace('__','',strtoupper($name)).'__';
        $this->data[$name] = $value;
    }
    public function getData($name) {
        $name = '__'.str_replace('__','',strtoupper($name)).'__';
        return $this->data[$name];
    }
        
    /**
     * Add JavaScript File
     * 
     * @param $name script name
     * @param $module module
     */
    public function addScript($name, $module = null) {
        if (strpos($name,'.js')<1) {
            $name = str_replace('.','/',$name).'.js';
        }

        $path = '';
        if ($module) {
            $module = str_replace('.','/',$module);
            $path   = str_replace('MODULE',$module,URL_MODULE_SCRIPT).'/'.$name;
        } else {
            $path = URL_SCRIPT.'/'.$name;
        }

        if (!in_array($path, $this->script)) {
            $this->script[] = $path;
        }
    }
    
    /**
     * Add CSS Theme File
     * 
     * @param $name theme name
     * @param $module module
     */
    public function addTheme($name, $module = null) {
        $path = '';
        $url  = '';
        if ($module) {
            $module = str_replace('.','/',$module);
            $path   = str_replace('MODULE',$module,PATH_MODULE_THEME);
            $url    = str_replace('MODULE',$module,URL_MODULE_THEME);
        } else {
            $path = PATH_THEME;
            $url  = URL_THEME;
        }

        foreach ($this->themeList as $theme => $desc) {
            $furl  = $url.'/'.$theme.'/'.$name;
            $fpath = $path.'/'.$theme.'/'.$name;
	        $key = md5($name.'|'.$fpath);
	        if (!file_exists($fpath)) {
                $furl = $url.'/default/'.$name;
	        }
            $this->theme[$key] = array($theme,$furl);
        }
    }
    
    /**
     * Add PHP Include
     * @param $include include name
     * @param $module module
     */
    public function addInclude($include, $module = null) {
        $path = '';
        if ($module) {
            $module = str_replace('.','/',$module);
            $path   = str_replace('MODULE',$module,PATH_MODULE_INCLUDE).'/'.$include;
        } else {
            $path = PATH_MODULE.'/'.$include;
        }

        require_once($path);
    }

    /**
     * Add Script to execute in client
     * @param $exec script to execute in client
     */
    public function addExec($exec) {
        $this->exec[] = $exec;
    }
    
    /**
     * Load a Module
     * @param $module module
     */
    public function loadModule($module) {
        include(PATH_MODULE.'/'.str_replace('.','/',$module).'/index.php');
    }

    /**
     * Set a data content
     * @param $value content text or content object 
     */
    public function setContent($value) {
        if (is_object($value)) {
            $this->setData('content', $value->generate());
        } else {
            $this->setData('content', $value);
        }
    }

    /**
     * Generate the javascript file list with associate template
     * @param $template tTemplate to use
     */
    protected function genScriptList($template) {
        $scriptList = '';
        foreach($this->script as $script) {
            $data = array(
                'url' => $script
            );
            $scriptList .= Template::getInstance()->get($template, $data); 
        } 
        return $scriptList;       
    }
    
    /**
     * Generate the javascript file list with associate template
     * @param $template tTemplate to use
     */
    protected function genExecList($template = NULL) {
        $execList = '';
        foreach($this->exec as $exec) {
            if ($template) {
                $data = array(
                    'exec'=> $exec
                );
                $execList .= Template::getInstance()->get($template, $data); 
            } else {
                $execList  .= $exec; 
            }
        }
        return $execList;
    }
    
}

?>
