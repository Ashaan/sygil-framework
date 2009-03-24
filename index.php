<?php
/**
 * Description:
 *   Main script for generate an html response with Sygil Portal Framework
 *
 * Author:
 *   Mathieu Chocat <mathieu@chocat.com> / Ashaan
 * Contributor:
 *   none
 *
 * Revision: $REVISION$ 
 *
 * Copyright (c) 2008-2009 Sygil.org
 **/

try {
    try {
        require_once('config.php');
        require_once(PATH_CORE.'/include/core.php');
        require_once(PATH_CORE.'/include/core/index.php');
        require_once(PATH_CORE.'/include/db.php');
        require_once(PATH_CORE.'/include/session.php');
        require_once(PATH_CORE.'/include/template.php');
    } catch (Exception $exception) {
        throw new Exception('Fatal Error: Cannot Load base file deps', $exception);
    }
    
    $core = null;
    try {
        $core = CoreIndex::getInstance();
    } catch (Exception $exception) {
        throw new Exception('Fatal Error: Cannot Load Core System', $exception);
    }
        
    $session = null;
    try {
        $session = Session::getInstance();
    } catch (Exception $exception) {
        throw new Exception('Fatal Error: Cannot Load Session', $exception);
    }
    
    try {
        if (isset($configThemeList)) $core->setThemeList($configThemeList);
        if (isset($configLangList) ) $core->setLangList($configLangList);
        
        $core->addTheme('theme.css');
        $core->addScript('namespace');
        $core->addScript('org.sygil.function');
        $core->addScript('org.sygil.mouse');
        $core->addScript('url');
        $core->addScript('org.sygil.frame');
        $core->addScript('org.sygil.base64');
        $core->addScript('org.sygil.ajax');
        $core->addScript('org.sygil.div');
        $core->addScript('org.sygil.session');
        $core->addScript('ckeditor.ckeditor');
        
        /**
         * TODO a migrer en ajax
         **/
        if ($session->isLogged()) {
            $core->addExec ('org.sygil.session.isConnect = true;');
            $core->addExec ('org.sygil.session.lastname = \''.$session->getUser('lastname').'\';');
            $core->addExec ('org.sygil.session.firstname = \''.$session->getUser('firstname').'\';');
            $core->addExec ('org.sygil.session.login = \''.$session->getUser('login').'\';');
            $core->addExec ('org.sygil.session.update();');
        } else {
            $core->addExec ('org.sygil.session.isConnect = false;');
            $core->addExec ('org.sygil.session.lastname = \'\';');
            $core->addExec ('org.sygil.session.firstname = \'\';');
            $core->addExec ('org.sygil.session.login = \'\';');
            $core->addExec ('org.sygil.session.update();');
        }
        /**
         * TODO a migrer en ajax
         **/
        
        foreach($preload as $script) $core->addExec($script.';');
        
        // Page central par default
        if (!Session::DATA('Frame') && !Session::DATA('Ajax')) {
            if (strpos(' '.DEFAULT_CENTER,'http://')>0) {
                $core->addExec('org.sygil.frame.open(\''.DEFAULT_CENTER.'\');');
            } else {
                $core->addExec('org.sygil.ajax.load(\''.DEFAULT_CENTER.'\',\'center\',\'replace\',[]);');
            }
        } else
        if (Session::DATA('Frame')) {
           $core->addExec('org.sygil.frame.open(\''.Session::DATA('Frame').'\',\'Last\');');
        } else {
           $core->addExec('org.sygil.ajax.load(\''.Session::DATA('Ajax').'\',\'center\',\'replace\',[]);');
        }
    } catch (Exception $exception) {
        throw new Exception('Fatal Error: Cannot Load default template', $exception);
    }
        
    try {
        $session->save();
    } catch (Exception $exception) {
        throw new Exception('Fatal Error: Cannot Save Session', $exception);
    }
        
    try {
        ob_start('ob_gzhandler');
        header('Content-Type: text/html');
        echo $core->generate();
    } catch (Exception $exception) {
        throw new Exception('Fatal Error: Cannot Send Content', $exception);
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
    echo $exception->getTrace();
    echo $exception->getTraceAsString();
    throw new Exception('Fatal Error: Cannot Draw Index.php', $exception);
}
?>
