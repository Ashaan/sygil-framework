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
 * Copyright(c) 2008-2009 Mathieu Chocat (or Sygil.org if applicable)
 **/

class db {
    static $instance = null;

    static function getInstance() {
        if (is_null(db::$instance)) {
            if ( file_exists(PATH_CORE.'/include/db/'.DATABASE_TYPE.'.php') ) {
                require_once(PATH_CORE.'/include/db/'.DATABASE_TYPE.'.php');
                $class = 'db_'.DATABASE_TYPE;
                db::$instance = new $class();
            }
        }
        return db::$instance;
    }

    function __construct() {}
    function __destruct() {}
} 

?>
