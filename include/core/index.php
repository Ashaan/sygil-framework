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
class CoreIndex extends Core {
    /**
     * Current Instance of Core
     * @return Core
     */
    static public function getInstance() {
        if (Core::$instance == null) {
            Core::$instance = new CoreIndex();
        }
        return Core::$instance;
    } 
    
    
    private function genThemeList() {
        $themeList = '';
        foreach($this->theme as $theme) {
            $style = null;
            if ($theme[0]==DEFAULT_THEME || $theme[0]==null) {
                $style = 'stylesheet';
            }  else {
                $style = 'alternate stylesheet';
            }

            $data = array (
                'name'  => $theme[0]?' title="'.$theme[0].'"':'',
                'url'   => $theme[1],
                'style' => $style
            );
            
            $themeList  .= Template::getInstance()->get('index_theme', $data); 
        }
        
        return $themeList;
    }
    
    protected function genScriptList() {
        return Core::genScriptList('index_script');    
    }
        
    public function generate() {
        try {
            $this->setData('theme' , $this->genThemeList());
            $this->setData('script', $this->genScriptList());
            $this->setData('exec'  , $this->genExecList());
            
            return Template::getInstance()->get('index',$this->data);
        } catch (Exception $exception) {
            throw new Exception("Cannot Generate Index Html", $exception);
        }
    }
}
?>