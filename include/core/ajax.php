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
 **/
class CoreAjax extends Core {
    /**
     * Current Instance of Core
     * @return Core
     */
    static public function getInstance() {
        if (Core::$instance == null) {
            Core::$instance = new CoreAjax();
        }
        return Core::$instance;
    }
    
    private function genThemeList() {
        $themeList = '';
        foreach($this->theme as $theme) {
            $style = ($theme[0] == DEFAULT_THEME)?0:1;  

            $data = array(
                'name'  => $theme[0],
                'url'   => $theme[1],
                'alt'   => $style
            );
            
            $themeList  .= Template::getInstance()->get('ajax_theme', $data); 
        }
        
        return $themeList;
    }
    
    protected function genExecList() {
        return Core::genExecList('ajax_exec');    
    } 
    protected function genScriptList() {
        return Core::genScriptList('ajax_script');    
    }
       
    protected function splitContent() {
        $content = $this->getData('content');
        if (!$content) {
            return '<content/>';
        }

        $data = '';
        $size = strlen($content);
        for ($i=0;$i<$size/512;$i++) {
            $send    = substr($content,0,512);
            $content = substr($content,512);
            $data .= '<content part="'.$i.'">'.base64_encode(utf8_decode($send)).'</content>';
        }
        
        return $data;
    }
    
    /**
     * Load Command
     */
    public function load($config) {
        if ($config) {
            if (file_exists(PATH_ZONE.'/'.$config.'.php')) {
                $path = PATH_ZONE.'/'.$config.'.php';
            } else {
                $path = PATH_CORE.'/zone/default/'.$config.'.php';
            }
            include($path);
        }
    }

    public function generate() {
        try {
            $this->setData('exec'   , $this->genExecList());
            $this->setData('theme'  , $this->genThemeList());
            $this->setData('script' , $this->genScriptList());
            $this->setData('content', $this->splitContent());
            $this->setData('command', Session::DATA('command'));
            $this->setData('target' , Session::DATA('target'));
            $this->setData('method' , Session::DATA('method'));
            
            return Template::getInstance()->get('ajax',$this->data);
        } catch (CoreException $exception) {
            throw new CoreException("Cannot Generate Ajax Xml");
        }
    }
}