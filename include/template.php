<?php
/**
 * Description:
 *   Template and Icon Manager 
 *
 * Author:
 *   Mathieu Chocat <mathieu@chocat.com> / Ashaan
 * Contributor:
 *   none
 *
 * Revision: $REVISION$
 *
 * Copyright(c) 2008-2009 Mathieu Chocat (or Sygil.org if applicable)
 **/

define('TBEG', '{');
define('TEND', '}');

class Template {
    static private $instance = null;
    private $file  = array();
    private $lang  = array();

    static public function getInstance() {
        try {
            if (Template::$instance == null) {
                Template::$instance = new Template();
            }
            return Template::$instance;
        } catch (Exception $exception) {
            throw $exception;
        }
    } 

    public function __construct() {
        try {
            $lang = array();
    	    include(PATH_LANGUE.'/'.DEFAULT_LANGUE.'.php');
    	    $this->lang = $lang;
        } catch (Exception $exception) {
            throw $exception;
        }
    }
    private function load($name, $module = null) {
        try {
            $key  = $module.'/'.$name;
            if (!isset($this->file[$key])) {
                $path = '';
                if ($module) {
                    $module = str_replace('.','/',$module);
                    $path   = str_replace('MODULE',$module,PATH_MODULE_TEMPLATE).'/'.DEFAULT_TEMPLATE.'/'.$name.'.tpl';
                } else {
                    $path = PATH_TEMPLATE.'/'.DEFAULT_TEMPLATE.'/'.$name.'.tpl';
                }
                $f    = fopen($path,'r');
                $this->file[$key] = fread($f,filesize($path));
                fclose($f);
            }
    
            return $this->file[$key];
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function get($name,$data, $module = '') {
        try {
            $tpl = $this->load($name,$module);
            if (strpos($tpl, '<!--TEMPLATE_V2-->')===true) {
                return $this->interpreter($tpl,$data);
            }
            
            $tpl = str_replace('__URL_ICON__',URL_ICON.'/'.DEFAULT_ICON,$tpl);
            foreach($data as $key => $value) {
                $key = '__'.str_replace('__','',strtoupper($key)).'__';
                $tpl = str_replace($key,$value,$tpl);
            }
            foreach($this->lang as $key => $value) {
                $tpl = str_replace('##'.$key.'##',$value,$tpl);
            }
    
            return $tpl;
        } catch (CoreException $exception) {
            throw new CoreException('Cannot generate Template v1 <'.$name.'> in <'.$module.'>');
        }
    }
    
    
    public function evalKey($line, $data) {
        while (strpos($line,TBEG.'key:')===true) {
            $key = substr(
                 $line,
                 strpos($line,TBEG.'key:') + 5,
                 strpos($line,TEND) - strpos($line,TBEG.'key:') + 5
            );
            $line = str_replace($line,TBEG.'key:'.$key.TEND, $data[$key]);
        }
        // {lang:key/}
        return $line;
    }
    public function evalLang($line) {
        while (strpos($line,TBEG.'lang:')===true) {
            $key = substr(
                 $line,
                 strpos($line,TBEG.'lang:') + 5,
                 strpos($line,TEND) - strpos($line,TBEG.'lang:') + 5
            );
            $line = str_replace($line,TBEG.'lang:'.$key.TEND, $this->lang[$key]);
        }
        // {lang:value/}
        return $line;
    }
    public function evalContition($condition, $data, $env) {
        // simple: data:value 
        // extend: data:value1 == data:value2 / env:size>env:count
        return true;
    }
    public function interpreter($content, $data) {
        $lines         = explode("\n", $content);
        $content       = '';
        $loopCommand   = null;
        $loopParam     = null;
        $loopContent   = null;
        foreach ($lines as $line) {
            if (!$loopCommand) {
                if (strpos($line,TBEG.'command:if ')) {
                    $loopCommand = 'if';
                    $loopContent = '';
                    $loopParam   = substr(
                        $line,
                        strpos($line,TBEG.'command:if ') + 11,
                        strpos($line,TEND) - strpos($line,TBEG.'command:if ') + 11
                    );
                } else
                if (strpos($line,TBEG.'command:while ')) {
                    $loopCommand = 'while';
                    $loopContent = '';
                    $loopParam   = substr(
                        $line,
                        strpos($line,TBEG.'command:while ') + 14,
                        strpos($line,TEND) - strpos($line,TBEG.'command:if ') + 14
                    );                 
                } else {
                    $line     = evalKey($line, $data);
                    $line     = evalLang($line);
                    $content .= $line."\n";
                }
            } else {
                if ($loopCommand == 'if') {
                    if (strpos($line,TBEG.'/command:if'.TEND)) {
                        $content     .= interpreter($loopContent, $data);
                        $loopCommand  = null;
                        $loopParam    = null;
                        $loopContent  = null;
                    } else {
                        $loopContent .= $line."\n";
                    }
                } else 
                if ($loopCommand == 'while') {
                    if (strpos($line,TBEG.'/command:while'.TEND)) {
                        foreach ($data[$loopParam] as $temp) {
                            $content .= interpreter($loopContent, array_merge($data,$temp));
                        }
                        $loopCommand  = null;
                        $loopParam    = null;
                        $loopContent  = null;
                    } else {
                        $loopContent .= $line."\n";
                    }
                } else {
                    
                }
            }
        }
    }
}

?>
