<?php
/**
 * Description:
 *   Main script for generate an ajax response with Sygil Portal Framework
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
    /**
     * Load Dependancy
     */
    try {
        if (!defined('CONFIGURE')) require_once('config.php');
        require_once(PATH_CORE.'/include/core.php');
        require_once(PATH_CORE.'/include/core/ajax.php');
        require_once(PATH_CORE.'/include/db.php');
        require_once(PATH_CORE.'/include/session.php');
        require_once(PATH_CORE.'/include/template.php');
    } catch (Exception $exception) {
        throw new Exception('Fatal Error: Cannot Load base file deps', $exception);
    }

    /**
     * Load Core System
     */
    $core    = null;
    try {
        $core    = CoreAjax::getInstance();
    } catch (Exception $exception) {
        throw new Exception('Fatal Error: Cannot Load Core System', $exception);
    }
        
    /**
     * Load Session
     */
    $session = null;
    try {
        $session = Session::getInstance();
    } catch (Exception $exception) {
        throw new Exception('Fatal Error: Cannot Load Session', $exception);
    }

    /**
     * Load default template
     */
    try {
        $core->load(Session::DATA('command'));
        $session->save();
    } catch (Exception $exception) {
        throw new Exception('Fatal Error: Cannot Load default template', $exception);
    }
    
    try {
        ob_start('ob_gzhandler');
        header('Content-Type: text/xml');
        echo $core->generate();
    } catch (Exception $exception) {
        throw new Exception('Fatal Error: Cannot Send Content', $exception);
    }
} catch (Exception $exception) {
    echo $exception->getTraceAsString();
}
?>
