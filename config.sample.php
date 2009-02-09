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
//directory
define('CORE_PATH'  ,'/your/site/directory'); 
//url
define('CORE_URL'   ,'http://yoursite.url');
//directory for configuration
define('CORE_CONFIG','/your/site/directory/site');

define('DEFAULT_LANGUE'  , 'french');
define('DEFAULT_THEME'   , 'glossy');
define('DEFAULT_TEMPLATE', 'sygil');
define('DEFAULT_ICON'	 , 'dropline-neu');
define('DEFAULT_LEFT'    , 'left');
define('DEFAULT_CENTER'  , null);
define('DEFAULT_RIGHT'   , null);

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
