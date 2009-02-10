<?php
foreach($_POST as $name => $value) {
    $_GET[$name] = $value;
}

// Page par default
if (!isset($_GET['Frame']) && !isset($_GET['Ajax'])) {
    $_GET['Ajax'] = 'blog';
    //$_GET['frame'] = 'http://www.google.com/';
}
// Permet d'indiquer que le site est deja configurer
define('CONFIGURE',true);
// Permet d'indiquer que le site a deja subit le script d'installation (innexistant)
define('INSTALL',true);


/*PATH CONFIGURATION
 * Definit les repertoire d'installation du CORE
 * Define CORE directory for installation
 */
define('PATH_CORE'              , 'core');
define('PATH_TEMPLATE'          , PATH_CORE.'/template'); 
define('PATH_THEME'             , PATH_CORE.'/theme'); 
define('PATH_ICON'              , PATH_CORE.'/icon'); 
define('PATH_LANGUE'            , PATH_CORE.'/langue'); 
define('PATH_SCRIPT'            , PATH_CORE.'/script'); 
define('PATH_INCLUDE'           , PATH_CORE.'/include'); 
define('PATH_MODULE'            , PATH_CORE.'/module'); 
/************************ Ne pas Editer **********************/
/**/  define('PATH_MODULE_'     , PATH_MODULE.'/MODULE');  /**/
/************************ Not to modify **********************/
define('PATH_MODULE_INCLUDE'    , PATH_MODULE_.'/include'); 
define('PATH_MODULE_TEMPLATE'   , PATH_MODULE_.'/template'); 
define('PATH_MODULE_THEME'      , PATH_MODULE_.'/theme'); 
define('PATH_MODULE_SCRIPT'     , PATH_MODULE_.'/script'); 
// Definit les repertoire d'installation des infos de votre site
define('PATH_ZONE'              , './zone'); 


/*URL CONFIGURATION
 *URL a utiliser pour acceder au CORE (pour les script et les themes, peut etre un site distant)
 *URL to use to reach the CORE (for script, themes. can be a distant location)
 */
define('URL_CORE'               , 'core');
define('URL_SCRIPT'             , URL_CORE.'/script');
define('URL_THEME'              , URL_CORE.'/theme');
/************************* Ne pas Editer ************************/
/**/ define('URL_MODULE_'       , URL_CORE.'/module/MODULE'); /**/
/************************* Not to modify ************************/
define('URL_MODULE_SCRIPT'      , URL_MODULE_.'/script');
define('URL_MODULE_THEME'       , URL_MODULE_.'/theme');
define('URL_ICON'               , URL_CORE.'/icon');
// URL de votre site ; your site URL
define('URL_ZONE'               , 'http://www.yoursite.org');
define('URL_CACHE'              , 'cache');
define('URL_DATA'               , 'data');


/*DEFAULT CONFIGURATION*/
// Paramatre par defaut
define('DEFAULT_LANGUE'  , 'french');
define('DEFAULT_THEME'   , 'glossy');
define('DEFAULT_TEMPLATE', 'sygil');
define('DEFAULT_ICON'	 , 'dropline-neu');
// Contenu d'affichage par default
define('DEFAULT_LEFT'    , 'left');
define('DEFAULT_CENTER'  , null);
define('DEFAULT_RIGHT'   , null);


/*SITE CONFIGURATION*/
 *SITE_SHORT_NAME => Name
 *SITE_LONG_NAME => short description of your site in english language
 *SITE_LONG_NAME_FR => short description of your site in french language
 *SITE_SEARCH_KEYWORDS => Meta keyword for referencement
 */
define('SITE_SHORT_NAME'  	, 'sygil.org');
define('SITE_LONG_NAME'   	, 'Sygil Experimental Portal and CMS');
define('SITE_LONG_NAME_FR'	, 'Portail Experimental Sygil.org');
define('SITE_DESCRIPTION'	, ''); 
define('SITE_SEARCH_KEYWORDS' 	, '');


/*MYSQL CONFIGURATION*/
 *DATABASE_HOST => localhost
 *DATABASE_NAME => NameDB
 *DATABASE_USER => Login
 *DATABASE_PASS => Password
 *DATABASE_PRE  => Prefixe
 */
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

?>
