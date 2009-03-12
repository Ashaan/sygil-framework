<?php
/**
 * Description:
 *   Sample Configuration File for use Sygil Portal Framework
 *
 * Author:
 *   Mathieu Chocat <mathieu@chocat.com> / Ashaan
 * Contributor:
 *   Nicolas Briche <> / Maheulbeuk
 *
 * Revision: $REVISION$ 
 *
 * Copyright(c)2008-2009 Sygil.org
 **/


/**
 * CONFIGURATION PATH 
 *  - Definit les repertoire d'installation du CORE, '.' par defaut
 *  - Define CORE directory for installation, '.' by default
 **/
define('PATH_CORE'              , '.');
define('PATH_TEMPLATE'          , PATH_CORE.'/template'); 
define('PATH_THEME'             , PATH_CORE.'/theme'); 
define('PATH_ICON'              , PATH_CORE.'/icon'); 
define('PATH_LANGUE'            , PATH_CORE.'/langue'); 
define('PATH_SCRIPT'            , PATH_CORE.'/script'); 
define('PATH_INCLUDE'           , PATH_CORE.'/include'); 
define('PATH_MODULE'            , PATH_CORE.'/module'); 
define('PATH_MODULE_'           , PATH_MODULE.'/MODULE');
define('PATH_MODULE_INCLUDE'    , PATH_MODULE_.'/include'); 
define('PATH_MODULE_TEMPLATE'   , PATH_MODULE_.'/template'); 
define('PATH_MODULE_THEME'      , PATH_MODULE_.'/theme'); 
define('PATH_MODULE_SCRIPT'     , PATH_MODULE_.'/script'); 

/** Definit les repertoire d'installation des infos de votre site
 *  si  votre site est en .com mettre ./zone/com/votresite/
 **/
define('PATH_ZONE'              , './zone/org/sample'); 


/**
 * URL CONFIGURATION
 *  - URL a utiliser pour acceder au CORE (pour les script et les themes, peut etre un site distant)
 *  - URL to use to reach the CORE (for script, themes. can be a distant location)
 **/
define('URL_CORE'               , 'http://yoursite.org'); // or http://www.yoursite.org

define('URL_SCRIPT'             , URL_CORE.'/script');
define('URL_THEME'              , URL_CORE.'/theme');
define('URL_MODULE_'            , URL_CORE.'/module/MODULE');
define('URL_MODULE_SCRIPT'      , URL_MODULE_.'/script');
define('URL_MODULE_THEME'       , URL_MODULE_.'/theme');
define('URL_ICON'               , URL_CORE.'/icon');

// URL de votre site ; your site URL
define('URL_ZONE'               , 'http://www.yoursite.org');
define('URL_CACHE'              , 'cache');
define('URL_DATA'               , 'data');

/**
 * Domain faire reference au gestionnaire d'utilisateur
 * Pour que le portail communiquer avec d'autre portail
 * et pour permettre l'authentification d'utilisateur distant
 * et le partage des base de groupe et utilisateur entre portail
 **/
define('DOMAIN_NAME'               , null);   // si votre site est accessible via http://toto.com c'est toto.com, null desactive la communication inter partail
define('DOMAIN_TLS'                , false);  // si vous communiquer par https
define('DOMAIN_ID'                 , null);   // http://www.sygil.org/tools/uid.php for generate an Id

/**
 * DEFAULT CONFIGURATION
 *  - Paramatre par defaut
 **/
define('DEFAULT_LANGUE'  , 'french');
define('DEFAULT_THEME'   , 'glossy');
define('DEFAULT_TEMPLATE', 'sygil');
define('DEFAULT_ICON'	 , 'dropline-neu');

/**
 * Main Page et first load param
 **/
$preload = array(
  'org.sygil.ajax.load(\'left/menu\',\'left\',\'replace\',[[\'close\','.(isset($_GET['MenuBlockClose'])?'1':'0').'],[\'default\','.(isset($_GET['MenuBlockId'])?$_GET['MenuBlockId']:'1').']])',
  'org.sygil.ajax.load(\'right/slide\',\'right\',\'replace\',[])',
  'org.sygil.ajax.load(\'bottom/shortcut\',\'shortcut\',\'replace\',[])',
);
define('DEFAULT_CENTER','http://www.google.com');
define('WELCOME_LOGOFF','##Welcome_on## ##site_short_name##');
define('WELCOME_LOGON' ,'##Hi## ##user_firstname## ##user_lastname##');
define('MAIN_MENU'     ,'##My_Account##');

/**
 * SITE CONFIGURATION
 *  - SITE_SHORT_NAME => Name
 *  - SITE_LONG_NAME => short description of your site in english language
 *  - SITE_LONG_NAME_FR => short description of your site in french language
 *  - SITE_SEARCH_KEYWORDS => Meta keyword for referencement
 */
define('SITE_SHORT_NAME'  	, 'sygil.org');
define('SITE_LONG_NAME'   	, 'Sygil Experimental Portal and CMS');
define('SITE_LONG_NAME_FR'	, 'Portail Experimental Sygil.org');
define('SITE_DESCRIPTION'	, ''); 
define('SITE_SEARCH_KEYWORDS' 	, '');


/**
 * MYSQL CONFIGURATION
 *  - DATABASE_HOST => localhost
 *  - DATABASE_NAME => NameDB
 *  - DATABASE_USER => Login
 *  - DATABASE_PASS => Password
 *  - DATABASE_PRE  => Prefixe
 **/
define('DATABASE_HOST','localhost');
define('DATABASE_NAME','sygil_base');
define('DATABASE_USER','sygil.org'); 
define('DATABASE_PASS','Y6YHXJdMMfxAvpzz');
define('DATABASE_PRE' ,'');
define('DATABASE_TYPE','mysqli');

// Override Official Theme List dans Config 
/**
 * $configThemeList = array(
 *	'glossy' 		=> 'Gnome Glossy Theme',
 *	'aurora-midnight'	=> 'Gnome Aurora Midnight Theme',
 * 	'green-glossy'		=> 'Gnome Green Glossy Theme'
 *	'wood-brun'		=> 'Wood Brun Theme'
 *   )
 * );
 */

// Override Official Langue List
/**
 * $configLangList = array(
 *	'french' 		=> '##french##',
 *	'english'		=> '##english##'
 *   )
 * );
 */

// Caractere de retour a la ligne
define('CRLF',"/r/n");

/**
 * ADDED AFTER THE FIRST INSTALL BY THE INSTALL SCRIPT
 **/ 
define('INSTALL',true);
?>
