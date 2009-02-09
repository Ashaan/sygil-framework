<?php
/*****************************************************************************
 **         At the first time copy config.sample.php to config.php          **
 **                 and change the define configuration                     **
 *****************************************************************************
 ** Dans un premier temps copier le fichier config.sample.php en config.php **
 **           puis effectuer les modification propre a votre site           **
 *****************************************************************************/

foreach($_POST as $name => $value) {
    $_GET[$name] = $value;
}
if (!isset($_GET['Frame']) && !isset($_GET['Ajax'])) {
    $_GET['Ajax'] = 'blog';
}

define('CONFIGURE',true);
define('INSTALL',true);

define('PATH_CORE'              , '/data/www/sygil/www/core');
define('PATH_TEMPLATE'          , PATH_CORE.'/template'); 
define('PATH_THEME'             , PATH_CORE.'/theme'); 
define('PATH_ICON'              , PATH_CORE.'/icon'); 
define('PATH_LANGUE'            , PATH_CORE.'/langue'); 
define('PATH_SCRIPT'            , PATH_CORE.'/script'); 
define('PATH_INCLUDE'           , PATH_CORE.'/include'); 
define('PATH_MODULE'            , PATH_CORE.'/module'); 
/************************ Ne pas Editer **********************/
/**/  define('PATH_MODULE_'     , PATH_MODULE.'/MODULE');  /**/
/************************ Ne pas Editer **********************/
define('PATH_MODULE_INCLUDE'    , PATH_MODULE_.'/include'); 
define('PATH_MODULE_TEMPLATE'   , PATH_MODULE_.'/template'); 
define('PATH_MODULE_THEME'      , PATH_MODULE_.'/theme'); 
define('PATH_MODULE_SCRIPT'     , PATH_MODULE_.'/script'); 
define('PATH_ZONE'              , '/data/www/sygil/www/zone'); 

define('URL_CORE'               , 'http://www.sygil.org/core');
define('URL_SCRIPT'             , URL_CORE.'/script');
define('URL_THEME'              , URL_CORE.'/theme');
/************************* Ne pas Editer ************************/
/**/ define('URL_MODULE_'       , URL_CORE.'/module/MODULE'); /**/
/************************* Ne pas Editer ************************/
define('URL_MODULE_SCRIPT'      , URL_MODULE_.'/script');
define('URL_MODULE_THEME'       , URL_MODULE_.'/theme');
define('URL_ICON'               , URL_CORE.'/icon');
define('URL_ZONE'               , 'http://www.sygil.org/zone');
define('URL_CACHE'              , URL_ZONE.'/cache');
define('URL_DATA'               , URL_ZONE.'/data');


//Name of your site
define('SITE_SHORT_NAME'  	, 'sygil.org');
// short description of your site in english language
define('SITE_LONG_NAME'   	, 'Sygil Experimental Portal and CMS');
//short description of your site in french language
define('SITE_LONG_NAME_FR'	, 'Portail Experimental Sygil.org');
define('SITE_DESCRIPTION'	, ''); 
// Meta keyword for referencement
define('SITE_SEARCH_KEYWORDS' 	, '');

define('DATABASE_HOST','localhost');
// Your data base name
define('DATABASE_NAME','sygil_base');
// The login to log on DB
define('DATABASE_USER','sygil.org'); 
// The password to log on DB
define('DATABASE_PASS','Y6YHXJdMMfxAvpzz');
// prefixe table
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
